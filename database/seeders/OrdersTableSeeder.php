<?php

namespace Database\Seeders;

use App\Models\Order;
use Carbon\Carbon;
use Faker\Factory;
use Illuminate\Database\Seeder;

class OrdersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Order::truncate();

        $faker = Factory::create();

        for ($i=0; $i < 50; $i++) {
            Order::create([
                'an_pos' => [
                    'an' => $faker->randomNumber(7, true),
                    'pos' => $faker->randomNumber(2, true),
                    'pos2' => $faker->randomNumber(1, true),
                ],
                'bestelldatum' => $faker->date(Carbon::now()),
                'article_id' => $faker->randomNumber(5, true),
                'article_desc' => $faker->text(15),
                'marke' => $faker->text(10),
                'menge' => [
                    'pos1' => $faker->numberBetween(0, 1),
                    'pos2' => $faker->numberBetween(0, 1),
                    'pos3' => $faker->numberBetween(0, 1),
                ],
                'lieferdatum' => $faker->date(Carbon::now()),
                'bestellnummer' => $faker->randomNumber(7, true),
                ]);
        };
    }
}
