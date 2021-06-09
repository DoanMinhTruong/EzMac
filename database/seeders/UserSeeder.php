<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            ['name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('123'),
            'role' => 1],
            ['name' => 'user1',
            'email' => 'user1@gmail.com',
            'password' => bcrypt('123'),
            'role' => 2],
            ['name' => 'user2',
            'email' => 'user2@gmail.com',
            'password' => bcrypt('123'),
            'role' => 2],
        ]);
    }
}
