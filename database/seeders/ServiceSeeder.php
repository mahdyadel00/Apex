<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $service = Service::create();

        $service->data()->create([
            'title'         => 'Service 1',
            'lang_id'       => 1,
            'description'   => 'Description for service 1'
        ]);

        $service->data()->create([
            'title'         => 'Service 2',
            'lang_id'       => 2,
            'description'   => 'Description for service 2'
        ]);
    }
}
