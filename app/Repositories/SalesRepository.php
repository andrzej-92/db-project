<?php

namespace App\Repositories;

use App\Models\Sale;

class SalesRepository
{
    public function getAllSales()
    {
        return Sale::hydrateRaw("select *  from sales");
    }
}