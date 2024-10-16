<?php

namespace Database\Seeders;

use App\Models\CompanyData;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CompanyDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CompanyData::factory()->count(10)->create();
    }
}
