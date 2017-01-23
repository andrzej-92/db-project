<?php

namespace App\Repositories;

use App\Models\Sale;
use File;

class SalesRepository
{
    /**
     * Pobiera wartość sprzedazy netto, brutto oraz ilość z poszczególnych miast
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getSalesRollUpByCity()
    {
        //done
        $query = File::get(__DIR__ . '/queries/1_GetSalesRollUpByCity.sql');

        return Sale::hydrateRaw($query);
    }

    /**
     * Pobiera wartosc netto, brutto oraz ilosc sprzedazy wzgledem typow seansow
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getSalesRollUpByShowingType()
    {
        // done
        $query = File::get(__DIR__ . '/queries/2_GetSalesRollUpByShowingType.sql');

        return Sale::hydrateRaw($query);
    }

    /**
     * Pobiera wartosc netto, brutto, ilosc dla poszczegolnych kin wzgledem typu seansu
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getSalesRollUpByShowingTypeForEachCinema()
    {
        // done
        $query = File::get(__DIR__ . '/queries/3_GetSalesRollUpByShowingTypeForEachCinema.sql');

        return Sale::hydrateRaw($query);
    }

    /**
     * Tworzy zestawienie wartosci netto, brutto, ilosci sprzedazy oraz ilosci sprzedanych biletow
     * dla wszystkich okresow (miesiecy oraz lat)
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getSalesRollUpDate()
    {
        // done
        $query = File::get(__DIR__ . '/queries/4_GetSalesRollUpByDate.sql');

        return Sale::hydrateRaw($query);
    }

    /**
     * Tworzy zestawienie trzech najbardziej popularnych filmow (wzgledem ilosci sprzedanych biletow)
     * dla kazdej kategorii filmow
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getMoviesRankForEachState()
    {
        //done
        $query = File::get(__DIR__ . '/queries/5_GetMoviesRankForEachState.sql');

        return Sale::hydrateRaw($query);
    }

    /**
     * Tworzy zestawienie ilosci sprzedazy oraz wartosci brutto
     * dla poszczegolnych kategorii filmow wzgledem typu seansu (2D lub 3D).
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getSalesCountCubeShowingTypeAndMovieCategory()
    {
        // done
        $query = File::get(__DIR__ . '/queries/6_GetSalesCountCubeShowingTypeAndMovieCategory.sql');

        return Sale::hydrateRaw($query);
    }

    /**
     * Tworzy zestawienie ilosci sprzedazy oraz wartosci brutto dla kazdego z wojewodztw wzgledem kategorii filmu
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getSalesCountGroupingByStateAndMovieCategory()
    {
        //done
        $query = File::get(__DIR__ . '/queries/7_GetSalesCountGroupingByStateAndMovieCategory.sql');

        return Sale::hydrateRaw($query);
    }

    /**
     * Tworzy zestawienie ilosci sprzedazy dla kazdego kina wzgledem kategorii filmu,
     * przedstawia udzial procentowy danej kategorii filmu wzgledem ilosci sprzedazy dla wybranego kina
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getSalesMoviesCategoryForEachCinema()
    {
        //done
        $query = File::get(__DIR__ . '/queries/8_GetSalesMoviesCategoryForEachCinema.sql');

        return Sale::hydrateRaw($query);
    }

    /**
     * Tworzy zestawienie ilosci sprzedazy dla poszczegolych kin, przedstawia udzial procentowy poszczegolnych
     * metod platnosci dla kazdego oddziału.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getSalesPaymentTypesForEachCinema()
    {
        $query = File::get(__DIR__ . '/queries/9_GetSalesPaymentTypesForEachCinema.sql');

        return Sale::hydrateRaw($query);
    }

    /**
     * Przedstawia sume sprzedazy brutto z poszczegolnych miesiecy
     * oraz sumaryczna wartosc sprzedazy do konca wybranego miesiaca dla kazdego roku.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getSalesValuesWithSummaryForEachMonth()
    {
        $query = File::get(__DIR__ . '/queries/10_GetSalesValuesWithSummaryForEachMonth.sql');

        return Sale::hydrateRaw($query);
    }
}