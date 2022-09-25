<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $languages = [1, 2, 3, 4, 5, 6, 7, 8];
        $interests = [1, 2, 3, 4, 5, 6, 7, 8, 9];

        return [
            'name' => fake()->firstName(),
            'surname' => fake()->lastName(),
            'id_number' => fake()->randomNumber(),
            'mobile' => fake()->randomNumber(),
            'email' => fake()->unique()->safeEmail(),
            'dob' => fake()->date(),
            'language' => $languages[array_rand($languages)],
            'interests' => $interests[array_rand($interests)] . "," . $interests[array_rand($interests)] . "," . $interests[array_rand($interests)],
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return static
     */
    public function unverified()
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
