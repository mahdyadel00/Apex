<?php

namespace Database\Seeders;

use App\Models\City;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $city = City::create([
            'country_id'    => 1,
            'is_active'     => 1,
        ]);

        $city->data()->create([

            'city_id'       => 1,
            'lang_id'       => 1,
            'name'          => 'City 1',
        ]);
    }
}
