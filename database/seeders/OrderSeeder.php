<?php

namespace Database\Seeders;

use App\Models\Order;
use Database\Factories\OrderFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Order::create([
            'order_number' => '1',
            'client_id' => 1,
            'driver_id' => 1,
            'address_id' => 1,
            'order_status' => 'pending',
            'order_date' => '2021-09-16',
            'total' => 100,
            'discount' => 0,
            'notes' => 'test',
        ]);
    }
}
