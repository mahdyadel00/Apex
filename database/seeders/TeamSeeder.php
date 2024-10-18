<?php

namespace Database\Seeders;

use App\Models\Team;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TeamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $team = Team::create([
            'name'      => 'John Doe',
            'position'  => 'CEO',
            'facebook'  => 'https://www.facebook.com',
            'twitter'   => 'https://www.twitter.com',
            'linkedin'  => 'https://www.linkedin.com',
        ]);
    }
}
