<?php

use Illuminate\Database\Seeder;

class CinemasSeeder extends Seeder
{
    private $cities;

    function __construct()
    {
        $this->getCities();
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /**
         * Lista Multikin w Plosce
         *
         * @source https://multikino.pl/pl/wszystkie-kina
         */
        $cinemas = [
            [
                'city' => 'Bydgoszcz',
                'name' => 'Bydgoszcz',
                'address' => 'ul. Marszałka Focha 48, 85-070 Bydgoszcz'
            ],
            [
                'city' => 'Czechowice-Dziedzice',
                'name' => 'Czechowice-Dziedzice',
                'address' => 'ul. Legionów 83, 43-502 Czechowice-Dziedzice'
            ],
            [
                'city' => 'Elbląg',
                'name' => 'Elbląg',
                'address' => 'ul. płk. Stanisława Dąbka 152, 82-300 Elbląg'
            ],
            [
                'city' => 'Gdańsk',
                'name' => 'Gdańsk',
                'address' => 'Al. Zwycięstwa 14, 80-219 Gdańsk'
            ],
            [
                'city' => 'Gdynia',
                'name' => 'Gdynia',
                'address' => 'ul. Waszyngtona 21, 81-342 Gdynia'
            ],
            [
                'city' => 'Jaworzno',
                'name' => 'Jaworzno',
                'address' => 'ul. Grunwaldzka 59, 43-600 Jaworzno'
            ],
            [
                'city' => 'Katowice',
                'name' => 'Katowice',
                'address' => 'ul. 3 Maja 30, 40-097 Katowice'
            ],
            [
                'city' => 'Kielce',
                'name' => 'Kielce',
                'address' => 'ul. Warszawska 26, 25-312 Kielce'
            ],
            [
                'city' => 'Koszalin',
                'name' => 'Koszalin',
                'address' => 'ul. Paderewskiego 1, 75-736 Koszalin'
            ],
            [
                'city' => 'Kraków',
                'name' => 'Kraków',
                'address' => 'ul. Dobrego Pasterza 128, 31-416 Kraków'
            ],
            [
                'city' => 'Lublin',
                'name' => 'Lublin',
                'address' => 'Al. Spółdzielczości Pracy 36, 20-147 Lublin'
            ],
            [
                'city' => 'Łódź',
                'name' => 'Łódź',
                'address' => 'Al. Piłsudskiego 5, 90-368 Łódź'
            ],
            [
                'city' => 'Olsztyn',
                'name' => 'Olsztyn',
                'address' => 'ul. Juliana Tuwima 26, 10-748 Olsztyn'
            ],
            [
                'city' => 'Poznań',
                'name' => 'Poznań Malta',
                'address' => 'ul. Maltańska 1, 61-131 Poznań'
            ],
            [
                'city' => 'Poznań',
                'name' => 'Poznań Multikino 51',
                'address' => 'ul. Królowej Jadwigi 51, 61-872 Poznań'
            ],
            [
                'city' => 'Poznań',
                'name' => 'Poznań Stary Browar',
                'address' => 'ul. Półwiejska 42, 61-888 Poznań'
            ],
            [
                'city' => 'Radom',
                'name' => 'Radom',
                'address' => 'ul. Bolesława Chrobrego 1, 26-609 Radom'
            ],
            [
                'city' => 'Rumia',
                'name' => 'Rumia',
                'address' => 'ul. Sobieskiego 14 A, 84-230 Rumia'
            ],
            [
                'city' => 'Rybnik',
                'name' => 'Rybnik',
                'address' => 'ul. Chrobrego 1, 44-200 Rybnik'
            ],
            [
                'city' => 'Rzeszów',
                'name' => 'Rzeszów',
                'address' => 'ul. Kopisto 1, 35-315 Rzeszów'
            ],
            [
                'city' => 'Słupsk',
                'name' => 'Słupsk',
                'address' => 'ul. Szczecińska 58, 76-200 Słupsk'
            ],
            [
                'city' => 'Sopot',
                'name' => 'Sopot',
                'address' => 'ul. Boh. Monte Cassino 63, 81-767 Sopot'
            ],
            [
                'city' => 'Szczecin',
                'name' => 'Szczecin',
                'address' => 'Al. Wyzwolenia 18-20, 70-554 Szczecin'
            ],
            [
                'city' => 'Tychy',
                'name' => 'Tychy',
                'address' => 'al. Jana Pawła II 16/18, 43-100 Tychy'
            ],
            [
                'city' => 'Warszawa',
                'name' => 'Warszawa Targówek',
                'address' => 'ul. Głębocka 15, 03-287 Warszawa'
            ],
            [
                'city' => 'Warszawa',
                'name' => 'Warszawa Ursynów',
                'address' => 'Al. KEN 60, 02-777 Warszawa'
            ],
            [
                'city' => 'Warszawa',
                'name' => 'Warszawa Wola Park',
                'address' => 'ul. Górczewska 124, 01-460 Warszawa'
            ],
            [
                'city' => 'Warszawa',
                'name' => 'Warszawa Złote Tarasy',
                'address' => 'ul. Złota 59, 00-120 Warszawa'
            ],
            [
                'city' => 'Włocławek',
                'name' => 'Włocławek',
                'address' => 'ul. Pułaskiego 10-12, 87-800 Włocławek'
            ],
            [
                'city' => 'Wrocław',
                'name' => 'Wrocław Arkady',
                'address' => 'ul. Powstańców Śląskich 2-4, 53-333 Wrocław'
            ],
            [
                'city' => 'Wrocław',
                'name' => 'Wrocław Pasaż Grundwaldzki',
                'address' => 'pl. Grunwaldzki 22, 50-363 Wrocław'
            ],
            [
                'city' => 'Zabrze',
                'name' => 'Zabrze',
                'address' => 'ul. Gdańska 18, 41-800 Zabrze'
            ],
            [
                'city' => 'Zgorzelec',
                'name' => 'Zgorzelec',
                'address' => 'ul. Armii Krajowej 52a, 59-900 Zgorzelec'
            ]
        ];

        $data = [];
        foreach ($cinemas as $cinema) {
            $cinemaRaw = [
                'city_id' => $this->getCityIdByName($cinema['city']),
                'name' => $cinema['name'],
                'address' => $cinema['address']
            ];
            $data[] = $cinemaRaw;
        }

        \DB::table('cinemas')->insert($data);
    }

    private function getCities()
    {
        $this->cities = \DB::table('cities')->get();
    }

    private function getCityIdByName($name)
    {
        $city = $this->cities->where('name', $name)->first();

        if (! $city) {
            throw new \Exception("No city found {$name}");
        }

        return $city->id;
    }
}
