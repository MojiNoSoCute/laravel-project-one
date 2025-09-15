<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create admin user
        User::create([
            'name' => 'Admin User',
            'email' => 'admin@se.npru.ac.th',
            'email_verified_at' => now(),
            'password' => Hash::make('password123'),
        ]);

        // Create test users
        User::factory(5)->create();

        $this->command->info('Created admin user and 5 test users.');
    }
}