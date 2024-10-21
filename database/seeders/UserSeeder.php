<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'firstname' => 'Admin',
            'lastname'  => 'System',
            'email'     => 'admin@gmail.com',
            'phone'     => '0541424301',
            'password'  => 'admin123456',
            'role'      => config('constant.ROLE.ADMIN'),
            'status'    => config('constant.STATUS.ACTIVE'),
        ]);

        User::create([
            'firstname' => 'Admin',
            'lastname'  => 'System 2',
            'email'     => 'admin2@gmail.com',
            'phone'     => '0541424322',
            'password'  => 'admin123456',
            'role'      => config('constant.ROLE.ADMIN'),
            'status'    => config('constant.STATUS.INACTIVE'),
        ]);


        User::create([
            'firstname' => 'User',
            'lastname' => 'Test A',
            'email' => 'user@gmail.com',
            'phone' => '0541424302',
            'password' => 'user12345',
            'role' => config('constant.ROLE.USER'),
            'status'=> config('constant.STATUS.ACTIVE'),
        ]);

        User::create([
            'firstname' => 'User',
            'lastname' => 'Test B',
            'email' => 'user2@gmail.com',
            'phone' => '0541424303',
            'password' => 'user12345',
            'role' => config('constant.ROLE.USER'),
            'status'=> config('constant.STATUS.ACTIVE'),
        ]);

        User::create([
            'firstname' => 'User',
            'lastname' => 'Test C',
            'email' => 'user3@gmail.com',
            'phone' => '0541424304',
            'password' => 'user12345',
            'role' => config('constant.ROLE.USER'),
            'status'=> config('constant.STATUS.ACTIVE'),
        ]);

        User::create([
            'firstname' => 'User',
            'lastname' => 'Test D',
            'email' => 'user4@gmail.com',
            'phone' => '0541424305',
            'password' => 'user12345',
            'role' => config('constant.ROLE.USER'),
            'status'=> config('constant.STATUS.INACTIVE'),
        ]);

        User::create([
            'firstname' => 'User',
            'lastname' => 'Test E',
            'email' => 'user5@gmail.com',
            'phone' => '0541424306',
            'password' => 'user12345',
            'role' => config('constant.ROLE.USER'),
            'status'=> config('constant.STATUS.INACTIVE'),
        ]);
    }
}
