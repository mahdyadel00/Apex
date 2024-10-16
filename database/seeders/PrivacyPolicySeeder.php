<?php

namespace Database\Seeders;

use App\Models\PrivacyPolicy;
use App\Models\PrivacyPolicyData;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PrivacyPolicySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $privacy_policy = PrivacyPolicy::create([

            'status' => 0,
        ]);

        $privacy_policy->data()->create([
            'privacy_policy_id'     => $privacy_policy->id,
            'lang_id'               => 1,
            'title'                 => 'Title EN',
            'description'           => 'Description EN',
        ]);

        $privacy_policy->data()->create([
            'privacy_policy_id'     => $privacy_policy->id,
            'lang_id'               => 2,
            'title'                 => 'Title AR',
            'description'           => 'Description AR',
        ]);
    }
}
