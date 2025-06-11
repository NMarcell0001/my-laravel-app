<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User; // Adjust if your User model is elsewhere
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name' => 'asd',
            'email' => 'asd@gmail.com',
            'password' => Hash::make('12345678'),
            'is_admin' => true,
        ]);
    }
}
