<?php

namespace Database\Factories;

use App\Models\Language;
use App\Models\State;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\StateData>
 */
class StateDataFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'state_id'      => State::factory(),
            'lang_id'       => 1,
            'name'          => $this->faker->name,

        ];
    }
}
