<?php

namespace Database\Seeders;

use App\Models\Country;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $country = Country::create([
            'is_active'     => 1,
        ]);

        $country->data()->create([
            'country_id'    => 1,
            'lang_id'       => 1,
            'name'          => 'Country 1',
        ]);
    }
}
