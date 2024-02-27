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
        DB::table('users')->insert([

            [
                'name' => 'Admin',
                'username' => 'adminuser',
                'email' => 'admin@gmail.com',
                'role' => 'admin',
                'status' => 'active',
                'password' => bcrypt('password')
            ],


            [
                'name' => 'company',
                'username' => 'companyuser',
                'email' => 'company@gmail.com',
                'role' => 'company',
                'status' => 'active',
                'password' => bcrypt('password')
            ],
            
            [
                'name' => 'candidate',
                'username' => 'candidateuser',
                'email' => 'candidate@gmail.com',
                'role' => 'candidate',
                'status' => 'active',
                'password' => bcrypt('password')
            ]

        ]);
    }
}
