<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PrivacyPolicyData>
 */
class PrivacyPolicyDataFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'privacy_policy_id' => $this->faker->numberBetween(1, 10),
            'lang_id'           => $this->faker->numberBetween(1, 2),
            'title'             => $this->faker->text(10),
            'description'       => $this->faker->text(100),
        ];
    }
}
