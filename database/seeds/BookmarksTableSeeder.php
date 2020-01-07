<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class BookmarksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('bookmarks')->insert([
            'user_id' => 1,
            'name' => 'reddit',
            'url' => 'https://www.reddit.com',
            'domain_id' => 1,
            'visits' => 1,
            'image_url' => null,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'deleted_at' => Carbon::now()
        ]);

        DB::table('bookmarks')->insert([
            'user_id' => 1,
            'name' => 'youtube',
            'url' => 'https://www.youtube.com',
            'domain_id' => 2,
            'visits' => 1,
            'image_url' => null,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'deleted_at' => Carbon::now()
        ]);
    }
}
