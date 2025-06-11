<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * This seeder creates two admin users:
     * 1. 'asd@gmail.com'
     * 2. 'anotheradmin@example.com'
     *
     * It uses `firstOrCreate` to prevent creating duplicate users if the seeder is run multiple times.
     */
    public function run()
    {
        User::firstOrCreate(
            ['email' => 'asd@gmail.com'],
            [
                'name' => 'asd',
                'password' => Hash::make('12345678'),
                'is_admin' => true
            ]
        );

        User::firstOrCreate(
            ['email' => 'anotheradmin@example.com'],
            [
                'name' => 'Another Admin',
                'password' => Hash::make('securepassword'),
                'is_admin' => true
            ]
        );
    }
}
