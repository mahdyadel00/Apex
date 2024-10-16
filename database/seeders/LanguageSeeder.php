<?php

namespace Database\Seeders;

use App\Models\Language;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Language::create([

            'title' => 'English',
            'code' => 'en',
            'flag' => 'https://www.google.com/images/branding/googlelogo/1x/googlelogo_color_272x92dp.png',

        ]);
        Language::create([

            'title' => 'Arabic',
            'code' => 'ar',
            'flag' => 'https://www.google.com/images/branding/googlelogo/1x/googlelogo_color_272x92dp.png',

        ]);
    }
}
