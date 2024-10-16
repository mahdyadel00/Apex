<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Company>
 */
class CompanyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'sector_id' => $this->faker->numberBetween(1, 10),
            'email'     => $this->faker->unique()->safeEmail,
            'phone'     => $this->faker->phoneNumber,
            'password'  => $this->faker->password,
            'type'      => $this->faker->randomElement(['step', 'student', 'certificate']),
        ];
    }
}
