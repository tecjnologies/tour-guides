<?php

namespace Database\Seeders; // Add the namespace to match the file path

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; // Add this if it's not already included

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
            'role_id' => 1,
            'name' => 'John Doe',
            'email' => 'superadmin@gmail.com',
            'contact' => '01670605075',
            'password' => bcrypt('rootadmin'),
            'created_at' => '2020-09-01 21:18:10',
            'email_verified_at' => '2020-09-01 21:18:10',
            'updated_at' => '2020-09-01 21:18:10',
        ]);

        DB::table('users')->insert([
            'role_id' => 2,
            'name' => 'Brain Stocks',
            'email' => 'user@gmail.com',
            'contact' => '01712121212',
            'password' => bcrypt('rootuser'),
            'created_at' => '2020-09-01 21:18:10',
            'email_verified_at' => '2020-09-01 21:18:10',
            'updated_at' => '2020-09-01 21:18:10',
        ]);
    }
}
