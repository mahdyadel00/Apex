<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SliderData>
 */
class SliderDataFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [

            'slider_id'     => $this->faker->numberBetween(1, 10),
            'lang_id'       => $this->faker->numberBetween(1, 2),
            'title'         => $this->faker->sentence(3),
            'description'   => $this->faker->paragraph(3),
        ];
    }
}
