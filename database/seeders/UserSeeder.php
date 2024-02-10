<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'name' => 'Shellgrow Admin',
                'email' => 'biomid22@gmail.com',
                'password' => '123123',
                'dob' => Carbon::create(2001, 5, 4),
                'phone' => '89319610360',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'role' => 'admin'
            ],
            [
                'name' => 'Shellgrow Agent',
                'email' => 'test@test.com',
                'password' => '123123',
                'dob' => Carbon::create(2001, 2, 19),
                'phone' => '89910467141',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'role' => 'agent'
            ],
            [
                'name' => 'Shellgrow Owner',
                'email' => 'maxZin@gmail.com',
                'password' => '123123',
                'dob' => Carbon::create(2001, 2, 19),
                'phone' => '89045576420',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'role' => 'owner'
            ]
        ];

        foreach($users as $user) {
            $created_user = User::create([
                'name' => $user['name'],
                'email' => $user['email'],
                'password' => Hash::make($user['password']),
                'dob' => $user['dob'],
                'phone' => $user['phone'],
            ]);

            $created_user->assignRole($user['role']);
        }
    }
}
