<?php

namespace Database\Seeders;

use App\Models\StateData;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StateDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        StateData::factory()->count(10)->create();
    }
}
