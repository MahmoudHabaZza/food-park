<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        User::insert([
            [
                'name' => 'Super Admin',
                'email' => 'superadmin@foodpark.com',
                'avatar' => asset('assets/Admin/img/avatar/avatar-1.png'),
                'role' => 'admin',
                'password' => bcrypt('password')
            ],
            [
                'name' => 'User',
                'avatar' => asset('assets/Admin/img/avatar/avatar-1.png'),
                'email' => 'user@gmail.com',
                'role' => 'user',
                'password' => bcrypt('password')
            ]
        ]);
    }
}
