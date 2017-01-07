<?php

use Illuminate\Database\Seeder;

class StatesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('states')->insert([
            ['id' => 1, 'name' => 'Zachodniopomorskie'],
            ['id' => 2, 'name' => 'Pomorskie'],
            ['id' => 3, 'name' => 'Warmińsko-Mazurskie'],
            ['id' => 4, 'name' => 'Podlaskie'],
            ['id' => 5, 'name' => 'Lubuskie'],
            ['id' => 6, 'name' => 'Wielkopolskie'],
            ['id' => 7, 'name' => 'Mazowieckie'],
            ['id' => 8, 'name' => 'Kujawsko-Pomorskie'],
            ['id' => 9, 'name' => 'Dolnośląskie'],
            ['id' => 10, 'name' => 'Łódzkie'],
            ['id' => 11, 'name' => 'Lubelskie'],
            ['id' => 12, 'name' => 'Opolskie'],
            ['id' => 13, 'name' => 'Śląskie'],
            ['id' => 14, 'name' => 'Świętokrzyskie'],
            ['id' => 15, 'name' => 'Małopolskie'],
            ['id' => 16, 'name' => 'Podkarpackie'],
        ]);
    }
}
