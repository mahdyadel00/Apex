<?php

namespace Database\Factories;

use App\Models\Company;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CompanyData>
 */
class CompanyDataFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'company_id'    => Company::factory(),
            'lang_id'       => $this->faker->randomElement([1, 2]),
            'name'          => $this->faker->company,
        ];
    }
}
