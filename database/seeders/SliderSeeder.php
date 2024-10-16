<?php

namespace Database\Seeders;

use App\Models\Slider;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SliderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $slider = Slider::create([
            'status'        => 1 ,
        ]);

        $slider->data()->create([
            'lang_id'       => 1 ,
            'title'         => 'Slider Title' ,
            'description'   => 'Slider Description' ,
        ]);

        $slider->data()->create([
            'lang_id'       => 2 ,
            'title'         => 'Slider Title' ,
            'description'   => 'Slider Description' ,
        ]);
    }
}
