<?php

namespace Database\Seeders;

use App\Models\OurBusiness;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OurBusinessSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $our_businesses = OurBusiness::create();

        $our_businesses->data()->create([
            'lang_id'           => 1,
            'title'             => 'Our Business',
            'description'       => 'Our Business Description',
        ]);

        $our_businesses->data()->create([
            'lang_id'           => 2,
            'title'             => 'Our Business',
            'description'       => 'Our Business Description',
        ]);
    }
}
