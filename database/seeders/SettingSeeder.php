<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $setting = Setting::create([
            'logo'                  => 'logo.png',
            'favicon'               => 'favicon.png',
            'email'                 => 'admin@admin.com',
            'facebook'              => 'facebook.com',
            'twitter'               => 'twitter.com',
            'instagram'             => 'instagram.com',
            'youtube'               => 'youtube.com',
            'phone'                 => '01122907742',
            'phone_2'               => '01065839463',
            'whats_app'             => '01065839463',
            'km_price'              => 10,
            'working_hours_from'    => now(),
            'working_hours_to'      => now(),
        ]);

        $setting->data()->create([
            'lang_id'       => 1,
            'name'          => 'Taosel',
            'address'       => 'Egypt',
            'description'   => 'Taosel',
        ]);

        $setting->data()->create([
            'lang_id'       => 2,
            'name'          => 'توصيل',
            'address'       => 'مصر',
            'description'   => 'توصيل',
        ]);
    }
}
