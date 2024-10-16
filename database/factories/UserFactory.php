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
    public function definition(): array
    {
        return [
                'first_name'        => $this->faker->firstName,
                'last_name'         => $this->faker->lastName,
                'user_name'         => $this->faker->userName,
                'roles_name'        => $this->faker->randomElement(['admin','user']),
                'birth_date'        => $this->faker->date,
                'password'          => $this->faker->password,
                'email'             => $this->faker->unique()->safeEmail,
                'email_verified_at' => now(),
                'phone'             => $this->faker->phoneNumber,
                'address'           => $this->faker->address,
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
