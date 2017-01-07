<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(PaymentTypesSeeder::class);
        $this->call(StatesSeeder::class);
        $this->call(CitiesSeeder::class);
        $this->call(DatesSeeder::class);
        $this->call(CinemasSeeder::class);
        $this->call(MoviesAndMoviesCategoriesSeeder::class);
        $this->call(ShowingsSeeder::class);
        $this->call(SalesSeeder::class);
    }
}
