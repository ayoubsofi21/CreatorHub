<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name'=>'Creator',
            'email'=>'creator@test.com',
            'password'=>Hash::make('password'),
            'role'=>'creator'
        ]);

        User::create([
            'name'=>'Freelancer',
            'email'=>'freelancer@test.com',
            'password'=>Hash::make('password'),
            'role'=>'client'
        ]);

        User::factory(8)->create();
    }
}