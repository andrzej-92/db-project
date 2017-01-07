<?php

use Illuminate\Database\Seeder;

class CitiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::transaction(function () {
            \DB::table('cities')->insert([
                ['id' => 1, 'state_id' => 2, 'name' => 'Bydgoszcz'],
                ['id' => 2, 'state_id' => 13, 'name' => 'Czechowice-Dziedzice'],
                ['id' => 3, 'state_id' => 3, 'name' => 'Elbląg'],
                ['id' => 4, 'state_id' => 2, 'name' => 'Gdańsk'],
                ['id' => 5, 'state_id' => 2, 'name' => 'Gdynia'],
                ['id' => 6, 'state_id' => 13, 'name' => 'Jaworzno'],
                ['id' => 7, 'state_id' => 13, 'name' => 'Katowice'],
                ['id' => 8, 'state_id' => 14, 'name' => 'Kielce'],
                ['id' => 9, 'state_id' => 1, 'name' => 'Koszalin'],
                ['id' => 10, 'state_id' => 15, 'name' => 'Kraków'],
                ['id' => 11, 'state_id' => 11, 'name' => 'Lublin'],
                ['id' => 12, 'state_id' => 10, 'name' => 'Łódź'],
                ['id' => 13, 'state_id' => 3, 'name' => 'Olsztyn'],
                ['id' => 14, 'state_id' => 6, 'name' => 'Poznań'],
                ['id' => 15, 'state_id' => 7, 'name' => 'Radom'],
                ['id' => 16, 'state_id' => 2, 'name' => 'Rumia'],
                ['id' => 17, 'state_id' => 13, 'name' => 'Rybnik'],
                ['id' => 18, 'state_id' => 16, 'name' => 'Rzeszów'],
                ['id' => 19, 'state_id' => 2, 'name' => 'Słupsk'],
                ['id' => 20, 'state_id' => 2, 'name' => 'Sopot'],
                ['id' => 21, 'state_id' => 1, 'name' => 'Szczecin'],
                ['id' => 22, 'state_id' => 13, 'name' => 'Tychy'],
                ['id' => 23, 'state_id' => 7, 'name' => 'Warszawa'],
                ['id' => 24, 'state_id' => 8, 'name' => 'Włocławek'],
                ['id' => 25, 'state_id' => 9, 'name' => 'Wrocław'],
                ['id' => 26, 'state_id' => 13, 'name' => 'Zabrze'],
                ['id' => 27, 'state_id' => 9, 'name' => 'Zgorzelec'],
            ]);
        });
    }
}
