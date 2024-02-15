<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class CreateUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        //
        $user = [
            [
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'is_admin' => '1',
            'password' => bcrypt('1234')
            ],
            [
                'name' => 'User',
                'email' => 'user@user.com',
                'is_admin' => '0',
                'password' => bcrypt('1234')
            ]
            ];
        foreach($user as $key => $value){
            User::create($value);
        }
    }
}
