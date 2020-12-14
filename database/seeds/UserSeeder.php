<?php

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    { 
        $user = DB::table('users')->insert([
            'id' => Str::random(36),
            'name' => 'Admin2',
            'email' => 'admin2@gmail.test',
            'email_verified_at' => now(),
            'password' => Hash::make('123'),
            'remember_token' => Str::random(10),
            'role_id' => 'bVaw7GVFRfsjei0DK6eYUBfDGX5vJIhesCNG',
        ]);
    }
}
