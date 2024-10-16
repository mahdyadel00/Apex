<?php

namespace Database\Seeders;

use App\Models\TermsCondition;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TermsConditionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $terms_condition = TermsCondition::create([

            'status' => 0,
        ]);


        $terms_condition->data()->create([
            'lang_id'       => 1,
            'title'         => 'Terms & Conditions',
            'description'   => 'Terms & Conditions',
        ]);

        $terms_condition->data()->create([
            'lang_id'       => 2,
            'title'         => 'الشروط والأحكام',
            'description'   => 'الشروط والأحكام',
        ]);
    }
}
