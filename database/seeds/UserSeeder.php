<?php

use Illuminate\Database\Seeder;

use \App\User;
use Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'name'  => 'Muhammad Aditya Nurdin',
                'email' => 'adityanurdin0@gmail.com',
                'password' => Hash::make('1q@w3e4r5t6y'),
                'role'     => 'ADMIN',
                'status'   => 'active'
            ],
            [
                'name'  => 'Admin GINUMERIK',
                'email' => 'admin@ginumerik.com',
                'password' => Hash::make('1q@w3e4r5t6y'),
                'role'     => 'ADMIN',
                'status'   => 'active'
            ]
        ];

        User::create($users);
    }
}
