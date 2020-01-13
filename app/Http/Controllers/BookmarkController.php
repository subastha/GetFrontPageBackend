<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Response\ApiResponse;
use App\Models\Bookmark;
use App\Models\Domain;

class BookmarkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user = $request->user();

        $result = $user->bookmarks;

        // $result = Bookmark::all();

		$response = [
            'user' => $user,
            'data' => $result
		];

        return ApiResponse::success($response);
    }

    /**
     * Create a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'url' => 'required|string',
            'image_url' => 'nullable|string'
        ]);
        $user = $request->user();

        $domain = $this->findOrCreate($request->url);

        $bookmark = new Bookmark([
            'name' => $request->name,
            'url' => $request->url,
            'image_url' => $request->image_url,
            'visits' => 0,
            'user_id' => $user->id,
            'domain_id' => $domain->id
        ]);

        $bookmark->save();

        return ApiResponse::success([
            'data' => $bookmark
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'url' => 'required|string',
            'image_url' => 'nullable|string'
        ]);

        $user = $request->user();

        $bookmark = Bookmark::where('user_id', '=', $user->id)
            ->findOrFail($id);

        if($request->url !== $bookmark->url){
            $domain = $this->findOrCreate($request->url);
            $bookmark->domain_id = $domain->id;
        }

        $bookmark->name = $request->name;
        $bookmark->url = $request->url;
        $bookmark->image_url = $request->image_url;
        $bookmark->save();

        return ApiResponse::success([
            'data' => $bookmark
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, int $id)
    {
        $user = $request->user();
        
        $bookmark = Bookmark::where('user_id', '=', $user->id)
            ->findOrFail($id)
            ->delete();

        return ApiResponse::success([
            'message' => 'Bookmark deleted'
        ]);
    }

    /**
     * Find domain or create a new one
     *
     * @param string $url
     * @return \App\Models\Domain
     * @throws Exception
     */
    private function findOrCreate(string $url){
        $domainName = $this->getDomain($url);
        if($domainName){
            return Domain::firstOrCreate([
                'domain' => $domainName
            ]);
        }
        throw new Exception('Invalid url. Cannot extract domain name.');
    }

    /**
     * Get domain name from url
     *
     * @param string $url
     * @return string|bool
     */
    private function getDomain(string $url){
        $pieces = parse_url($url);
        $domain = isset($pieces['host']) ? $pieces['host'] : '';
        if(preg_match('/(?P<domain>[a-z0-9][a-z0-9\-]{1,63}\.[a-z\.]{2,6})$/i', $domain, $regs)){
            return $regs['domain'];
        }
        return false;
    }
}
