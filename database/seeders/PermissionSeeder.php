<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            [
                "name" => "view-blogs"
            ],
            [
                "name" => "view-blog"
            ],
            [
                "name" => "create-blog"
            ],
            [
                "name" => "edit-blog"
            ],
            [
                "name" => "delete-blog"
            ],
        ];

        DB::table('permissions')->insert($permissions);
    }
}
