<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;


class CreateUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            [
               'name'=>'Admin',
               'user_name'=>'admin123',
               'email'=>'admin@email.com',
                'is_admin'=>'1',
               'password'=> bcrypt('admin123'),
            ],
            [
               'name'=>'User',
               'user_name'=>'user_123',
               'email'=>'user@email.com',
                'is_admin'=>'0',
               'password'=> bcrypt('123456'),
            ],
        ];

        foreach ($user as $key => $value) {
            User::create($value);
        }
    }
}
