<?php

namespace App\Repositories;

use App\Models\Sale;
use File;

class SalesRepository
{
    public function getAllSales()
    {
        return Sale::hydrateRaw("SELECT * FROM SALES");
    }

    public function getSalesRollUpByCity()
    {
        $query = File::get(__DIR__ . '/queries/GetSalesRollUpByCity.sql');

        return Sale::hydrateRaw($query);
    }

    public function getSalesRollUpByShowingType()
    {
        $query = File::get(__DIR__ . '/queries/GetSalesRollUpByShowingType.sql');

        return Sale::hydrateRaw($query);
    }

    public function getSalesRollUpByShowingTypeForEachCinema()
    {
        $query = File::get(__DIR__ . '/queries/GetSalesRollUpByShowingTypeForEachCinema.sql');

        return Sale::hydrateRaw($query);
    }

    public function getSalesRollUpDate()
    {
        $query = File::get(__DIR__ . '/queries/GetSalesRollUpByDate.sql');

        return Sale::hydrateRaw($query);
    }
}