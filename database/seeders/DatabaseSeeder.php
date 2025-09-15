<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Run all seeders in proper order
        $this->call([
            ImageSeeder::class,  // Create images first
            UserSeeder::class,   // Then users
            PostSeeder::class,   // Finally posts (which reference images)
        ]);

        $this->command->info('Database seeding completed successfully!');
    }
}
