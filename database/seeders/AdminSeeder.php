<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::insert([
            [
                'name'     => 'Admin',
                'email'    => 'admin@example.org',
                'password' => bcrypt('secret'),
                'email_verified_at' => now(),
                'role' => 1,
                'remember_token' => Str::random(10),
            ], [
                'name'     => 'User',
                'email'    => 'user@example.org',
                'password' => bcrypt('password'),
                'email_verified_at' => now(),
                'role' => 2,
                'remember_token' => Str::random(10),
            ]
        ]);
    }
}
