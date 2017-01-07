<?php

use Illuminate\Database\Seeder;

class PaymentTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('payment_types')->insert([
            ['id' => 1, 'name' => 'Gotówka'],
            ['id' => 2, 'name' => 'Karta Kredytowa'],
            ['id' => 3, 'name' => 'Karta Płatnicza'],
            ['id' => 4, 'name' => 'Przelew Online'],
            ['id' => 5, 'name' => 'Kupon płatniczy']
        ]);
    }
}
