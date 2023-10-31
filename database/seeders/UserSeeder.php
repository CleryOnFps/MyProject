<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // creation de deux utilisateur le premier est un administrateur le second est un utilisateur normal

        // Seed the first user
        DB::table('users')->insert([
            'name' => 'Admin Test',
            'email' => 'admin@test.com',
            'email_verified_at' => now(),
            'password' => Hash::make('12345678'),
            'is_admin' => false, // Or set it to true if you want this user to be an admin
            'remember_token' => Str::random(10),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Seed the second user
        DB::table('users')->insert([
            'name' => 'User Test',
            'email' => 'user@test.com',
            'email_verified_at' => now(),
            'password' => Hash::make('1234578'),
            'is_admin' => false, // Or set it to true if you want this user to be an admin
            'remember_token' => Str::random(10),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
