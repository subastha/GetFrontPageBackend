<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class ApplicationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('applications')->insert([
            'display_name' => 'Bookmarks',
            'identifier' => 'BOOKMARK',
            'description' => 'Site bookmarks',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
    }
}
