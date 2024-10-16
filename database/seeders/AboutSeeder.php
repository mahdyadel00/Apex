<?php

namespace Database\Seeders;

use App\Models\About;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AboutSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $about = About::create([
            'status'        => 1,
        ]);

        $about->data()->create([
            'lang_id'       => 1, // 'en'
            'title'         => 'About Us',
            'description'   =>   'Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                Quisquam, voluptatum. Quisquam, voluptatum. Quisquam, voluptatum.
                                 Quisquam, voluptatum. Quisquam, voluptatum. Quisquam, voluptatum.',
            'history'       =>   'Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                Quisquam, voluptatum. Quisquam, voluptatum. Quisquam, voluptatum.
                                 Quisquam, voluptatum. Quisquam, voluptatum. Quisquam, voluptatum.',
            'objectives'    =>   'Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                Quisquam, voluptatum. Quisquam, voluptatum. Quisquam, voluptatum.
                                 Quisquam, voluptatum. Quisquam, voluptatum. Quisquam, voluptatum.',
        ]);

        $about->data()->create([
            'lang_id'       => 2, // 'ar'
            'title'         => 'من نحن',
            'description'   => 'Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                Quisquam, voluptatum. Quisquam, voluptatum. Quisquam, voluptatum.
                                    Quisquam, voluptatum. Quisquam, voluptatum. Quisquam, voluptatum.',
            'history'       => 'Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                Quisquam, voluptatum. Quisquam, voluptatum. Quisquam, voluptatum.
                                 Quisquam, voluptatum. Quisquam, voluptatum. Quisquam, voluptatum.',
            'objectives'    =>   'Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                Quisquam, voluptatum. Quisquam, voluptatum. Quisquam, voluptatum.
                                 Quisquam, voluptatum. Quisquam, voluptatum. Quisquam, voluptatum.',
        ]);
    }
}
