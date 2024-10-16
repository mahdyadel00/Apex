<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Service>
 */
class ServiceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id'           => 1,
            'company_id'        => 1,
            'information'       => $this->faker->text,
            'useful'            => $this->faker->boolean,
            'information_price' => $this->faker->randomFloat(2, 0, 1000),
        ];
    }
}
