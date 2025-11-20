<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Pet;
use Illuminate\Support\Facades\Hash;

class TestUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // // test user (client)
        // $user = User::create([
        //     'name' => 'Test User',
        //     'email' => 'user@test.com',
        //     'password' => Hash::make('password'),
        //     'phone' => '081234567899',
        //     'role' => 'klien',
        // ]);

        // // pets untuk test user
        // Pet::create([
        //     'user_id' => $user->id,
        //     'name' => 'Buddy',
        //     'species' => 'Dog',
        //     'breed' => 'Golden Retriever',
        //     'dob' => '2020-05-15',
        //     'gender' => 'male',
        // ]);

        // Pet::create([
        //     'user_id' => $user->id,
        //     'name' => 'Whiskers',
        //     'species' => 'Cat',
        //     'breed' => 'Persian',
        //     'dob' => '2021-03-20',
        //     'gender' => 'female',
        // ]);
    }
}
