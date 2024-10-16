<?php

namespace Database\Seeders;

use App\Models\SectorData;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SectorDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SectorData::factory()->count(10)->create();
    }
}
