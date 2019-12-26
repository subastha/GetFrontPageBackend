<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class UserXApplicationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user_x_application')->insert([
            'user_id' => 1,
            'application_id' => 1,
            'access_granted' => true,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('user_x_application')->insert([
            'user_id' => 2,
            'application_id' => 1,
            'access_granted' => true,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('user_x_application')->insert([
            'user_id' => 3,
            'application_id' => 1,
            'access_granted' => true,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
    }
}
