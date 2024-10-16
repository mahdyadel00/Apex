<?php

namespace Database\Seeders;

use App\Models\Testimonial;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TestimonialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $testimonial = Testimonial::create([
            'status' => true,
        ]);

        $testimonial->data()->create([
           'title'              => 'Testimonial',
           'description'        => 'Testimonial Description',
            'new_title'            => 'Testimonial',
            'new_description'      => 'Testimonial Description',
            'lang_id'           => 1,
        ]);

        $testimonial->data()->create([
            'title'             => 'Testimonial',
            'description'       => 'Testimonial Description',
            'new_title'            => 'Testimonial',
            'new_description'      => 'Testimonial Description',
            'lang_id'           => 2,
        ]);
    }
}
