<?php

use Illuminate\Database\Seeder;

class SalesSeeder extends Seeder
{
    const SALES_COUNT = 10000;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sales = [];
        $prices = [
            19.99, 20.99, 21.99, 22.99, 23.99, 29.99, 39.99
        ];

        $showingsCount = \DB::table('showings')->count();
        $daysCount = \DB::table('days')->count();
        $cinemasCount = \DB::table('cinemas')->count();
        $paymentTypesCount = \DB::table('payment_types')->count();

        for ($i = 1; $i <= static::SALES_COUNT; $i++) {
            $price = $prices[array_rand($prices, 1)];
            $brutto = $price * (1.23);

            $sales[] = [
                'showing_id' => rand(1, $showingsCount),
                'day_id' => rand(1, $daysCount),
                'cinema_id' => rand(1, $cinemasCount),
                'payment_type_id' => rand(1, $paymentTypesCount),
                'netto_price' => $price,
                'brutto_price' => $brutto,
                'ticket_count' => rand(1, 4),
            ];

            if ($i % 300 == 0) {
                DB::table('sales')->insert($sales);
                $sales = [];
            }
        }
    }
}
