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
            'name' => 'ผู้ดูแลระบบ',
            'email' => 'admin@se.npru.ac.th',
            'email_verified_at' => now(),
            'password' => Hash::make('password123'),
        ]);

        // Create test users with Thai names
        $thaiNames = [
            'สมชาย ใจดี',
            'สมหญิง รักเรียน',
            'ประวิทย์ พัฒน์ชัย',
            'สุนทรี สว่างจิต',
            'ธนากร วิเศษชัย'
        ];

        foreach ($thaiNames as $name) {
            User::create([
                'name' => $name,
                'email' => strtolower(str_replace(' ', '.', $name)) . '@student.npru.ac.th',
                'email_verified_at' => now(),
                'password' => Hash::make('password123'),
            ]);
        }

        $this->command->info('สร้างผู้ใช้ผู้ดูแลระบบ 1 ราย และผู้ใช้ทดสอบ 5 ราย');
    }
}
