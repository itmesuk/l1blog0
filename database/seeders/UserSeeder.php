<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // $user = new User();
        // $user->name = 'Admin Lavravel10';
        // $user->email = 'laravel10@email.com';
        // $user->password = Hash::make('password');
        // $user->save();

        // $user = new User();
        // $user->name = 'user1';
        // $user->email = 'user1@email.com';
        // $user->password = Hash::make('password');
        // $user->save();

        User::factory()->count(20)->create();
    }
}
