<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class DomainsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('domains')->insert([
            'domain' => 'www.reddit.com',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'deleted_at' => Carbon::now()
        ]);

        DB::table('domains')->insert([
            'domain' => 'www.youtube.com',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'deleted_at' => Carbon::now()
        ]);
    }
}
