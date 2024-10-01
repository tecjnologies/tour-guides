<?php

namespace Database\Seeders; // Add this to match the file path

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; // Add this if not already included

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            'name' => 'Admin',
            'slug' => 'admin',
        ]);

        DB::table('roles')->insert([
            'name' => 'User',
            'slug' => 'user',
        ]);
    }
}