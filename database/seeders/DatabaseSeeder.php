<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Contact;
use App\Models\OrderType;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $this->call([
            LanguageSeeder::class,
            PermissionSeeder::class,
            CountrySeeder::class,
            StateSeeder::class,
            StateDataSeeder::class,
            UserSeeder::class,
            SettingSeeder::class,
            SliderSeeder::class,
            PrivacyPolicySeeder::class,
            TermsConditionSeeder::class,
            AboutSeeder::class,
            ContactSeeder::class,
            ContactSeeder::class,
            CitySeeder::class,
            ServiceSeeder::class,
            OurBusinessSeeder::class,
        ]);
    }
}
