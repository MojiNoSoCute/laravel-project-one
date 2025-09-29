<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // Thai first names
        $thaiFirstNames = [
            'สมชาย',
            'สมหญิง',
            'ประวิทย์',
            'สุนทรี',
            'ธนากร',
            'วิชัย',
            'นภา',
            'กิตติ',
            'อรอุมา',
            'พิชัย',
            'ธนพล',
            'จิราภรณ์',
            'สุรชัย',
            'อภิรดี',
            'วราภรณ์'
        ];

        // Thai last names
        $thaiLastNames = [
            'ใจดี',
            'รักเรียน',
            'พัฒน์ชัย',
            'สว่างจิต',
            'วิเศษชัย',
            'ทองคำ',
            'มณีรัตน์',
            'สุขสบาย',
            'เจริญผล',
            'อุดมศักดิ์',
            'สุวรรณ',
            'มงคล',
            'พงษ์ศักดิ์',
            'ธนทรัพย์',
            'ปัญญาดี'
        ];

        // Randomly select Thai first and last names
        $firstName = $this->faker->randomElement($thaiFirstNames);
        $lastName = $this->faker->randomElement($thaiLastNames);
        $fullName = $firstName . ' ' . $lastName;

        return [
            'name' => $fullName,
            'email' => strtolower($firstName . '.' . $lastName) . '@student.npru.ac.th',
            'email_verified_at' => now(),
            'password' => static::$password ??= Hash::make('password123'),
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn(array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
