<?php

namespace Database\Seeders;

use App\Models\Order;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');

        // random order data seed
        for ($i = 0; $i <= 100; $i++) {
            Order::create([
                'number' => $faker->uuid(),
            ]);
        }
    }
}
