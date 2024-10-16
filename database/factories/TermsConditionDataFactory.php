<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TermsConditionData>
 */
class TermsConditionDataFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [

            'terms_condition_id'    => $this->faker->randomNumber(1,10),
            'lang_id'               => $this->faker->randomNumber(1,2),
            'title'                 => $this->faker->word,
            'description'           => $this->faker->text,
        ];
    }
}
