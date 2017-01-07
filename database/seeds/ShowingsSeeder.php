<?php

use Illuminate\Database\Seeder;

class ShowingsSeeder extends Seeder
{
    const SHOWINGS_COUNT = 4000;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $showingTypesRaw = [
            '2D', '3D'
        ];

        foreach ($showingTypesRaw as $type) {
            \DB::table('showing_types')->insert([
                'name' => $type
            ]);
        }

        $moviesCount = \DB::table('movies')->count();
        $showings = [];

        for ($i = 1; $i <= static::SHOWINGS_COUNT; $i++) {
            $hour = new \Carbon\Carbon();
            $hour->hour = rand(7, 21);
            $hour->minute = rand(0, 19) * 5;

            $showings[] = [
                'type_id' => rand(1, count($showingTypesRaw)),
                'movie_id' => rand(1, $moviesCount),
                'start_at' => $hour->format('H:i'),
                'room_number' => rand(1, 14)
            ];
        }

        \DB::table('showings')->insert($showings);
    }
}
