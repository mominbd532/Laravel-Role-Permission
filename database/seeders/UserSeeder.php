<?php

namespace Database\Seeders;


use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = [
          "name" => "Admin",
          "email" => "admin@gmail.com",
          "password" => bcrypt('12345678'),
          "email_verified_at" => now(),
          "is_admin" => 1,
          "is_admin" => 1,
          "remember_token" => null,
          "created_at" => now(),
          "updated_at" => now(),
          
        ];

        DB::table('users')->insert($user);
    }
}
