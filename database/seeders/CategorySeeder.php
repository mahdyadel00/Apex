<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $category =  Category::create([

            'is_active'     => true,

        ]);

        $category->data()->create([
            'name'          => 'english',
           'lang_id'        => 1,
        ]);

        $category->data()->create([
            'name'          => 'arabic',
           'lang_id'        => 2,
        ]);
    }
}
