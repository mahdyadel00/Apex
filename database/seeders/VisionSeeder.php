<?php

namespace Database\Seeders;

use App\Models\Vision;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class VisionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $vision = Vision::create([
            'status'        => 1,
        ]);

        $vision->data()->create([
            'lang_id'       => 1, // 'en'
            'training_courses'   =>   'Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                Quisquam, voluptatum. Quisquam, voluptatum. Quisquam, voluptatum.
                                 Quisquam, voluptatum. Quisquam, voluptatum. Quisquam, voluptatum.',
            'quality_policy'       =>   'Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                Quisquam, voluptatum. Quisquam, voluptatum. Quisquam, voluptatum.
                                 Quisquam, voluptatum. Quisquam, voluptatum. Quisquam, voluptatum.',
            'social_responsibility'    =>   'Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                Quisquam, voluptatum. Quisquam, voluptatum. Quisquam, voluptatum.
                                 Quisquam, voluptatum. Quisquam, voluptatum. Quisquam, voluptatum.',
            'communication'    =>   'Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                Quisquam, voluptatum. Quisquam, voluptatum. Quisquam, voluptatum.
                                 Quisquam, voluptatum. Quisquam, voluptatum. Quisquam, voluptatum.',
        ]);

        $vision->data()->create([
            'lang_id'       => 2, // 'ar'
            'training_courses'   => 'Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                Quisquam, voluptatum. Quisquam, voluptatum. Quisquam, voluptatum.
                                    Quisquam, voluptatum. Quisquam, voluptatum. Quisquam, voluptatum.',
            'quality_policy'       => 'Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                Quisquam, voluptatum. Quisquam, voluptatum. Quisquam, voluptatum.
                                 Quisquam, voluptatum. Quisquam, voluptatum. Quisquam, voluptatum.',
            'social_responsibility'    =>   'Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                Quisquam, voluptatum. Quisquam, voluptatum. Quisquam, voluptatum.
                                 Quisquam, voluptatum. Quisquam, voluptatum. Quisquam, voluptatum.',
            'communication'    =>   'Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                Quisquam, voluptatum. Quisquam, voluptatum. Quisquam, voluptatum.
                                 Quisquam, voluptatum. Quisquam, voluptatum. Quisquam, voluptatum.',
        ]);
    }
}
