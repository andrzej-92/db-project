<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class DatesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $date = Carbon::now()->subYears(4)->startOfYear();
        while ($date < Carbon::now()->startOfYear()->subDay()) {
            \DB::table('years')->insert(['name' => $date->format('Y')]);
            $date->addYear();
        }

        $years = \DB::table('years')->get();
        foreach($years as $year) {
            for ($i = 1; $i <= Carbon::MONTHS_PER_YEAR; $i++) {
                \DB::table('months')->insert(['name' => $i, 'year_id' => $year->id]);
                $m = \DB::table('months')->whereName($i)->whereYearId($year->id)->first();
                $month = new Carbon();
                $month->year = $year->name;
                $month->month = $i;
                $month->startOfMonth();

                $days = [];
                while($month->month <= $i && $month->year == $year->name) {
                    $days[] = ['name' => $month->format('d'), 'month_id' => $m->id];
                    $month->addDay();
                }
                \DB::table('days')->insert($days);
            }
        }
    }
}
