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
        $permissionNames = [
            'view-blogs',
            'view-blog',
            'create-blog',
            'edit-blog',
            'delete-blog',
        ];

        $permissions = array_map(fn($name) => ['name' => $name], $permissionNames);

        DB::table('permissions')->insert($permissions);
    }
}
