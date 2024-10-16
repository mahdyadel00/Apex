<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\AboutData>
 */
class AboutDataFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [

            'about_id'      =>$this->faker->numberBetween(1, 10),
            'lang_id'       =>$this->faker->numberBetween(1, 2),
            'title'         => $this->faker->sentence(),
            'description'   => $this->faker->paragraph(),

        ];
    }
}
