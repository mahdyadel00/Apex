<?php

namespace Database\Seeders;

use App\Models\Contact;
use Database\Factories\ContactFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Contact::factory()->count(10)->create();

        Contact::factory()->count(1)->create([
            'name'      => 'Contact',
            'email'     =>  'info@email.com',
            'phone'     =>  '123456789',
            'subject'   =>  'Contact Subject',
            'message'   =>  'Contact Message',
        ]);
    }
}
