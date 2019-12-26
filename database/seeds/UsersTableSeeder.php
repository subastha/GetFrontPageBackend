<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use App\Utilities\AuthUtil as Util;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'mailtrap',
            'email' => '7b0ba760dd-ecf39a@inbox.mailtrap.io',
            'password' => bcrypt('12345'),
            'email_verified_at' => Carbon::now(),
            'active' => 1,
            'activation_token' => Util::generateRandomString(60),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('users')->insert([
            'name' => 'test',
            'email' => 'test@gmail.com',
            'password' => bcrypt('12345'),
            'email_verified_at' => Carbon::now(),
            'active' => 1,
            'activation_token' => Util::generateRandomString(60),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('users')->insert([
            'name' => 'example',
            'email' => 'example@gmail.com',
            'password' => bcrypt('12345'),
            'email_verified_at' => Carbon::now(),
            'active' => 1,
            'activation_token' => Util::generateRandomString(60),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
    }
}
