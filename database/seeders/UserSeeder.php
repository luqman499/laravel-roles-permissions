<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'user_type' => '1',
            'password' => 'admin123', // Always hash passwords
        ]);

        User::create([
            'name' => 'Normal User',
            'email' => 'user@example.com',
            'user_type' => '2',
            'password' => 'admin123',
        ]);

        User::create([
            'name' => 'article',
            'email' => 'article@example.com',
            'user_type'=>'4',
           'password' => 'admin123'
        ]);
    }
}
