<?php

namespace App\Repositories;

use App\Models\Sale;

class SalesRepository
{
    public function getAllSales()
    {
        return Sale::hydrateRaw(''.' select *  from sales');
    }

    public function getSalesRollUpByCity()
    {
        return Sale::hydrateRaw(''.'
          select round(sum(netto_price), 2) as netto, 
                 round(sum(brutto_price), 2) as brutto,
                 count(*) as count,
                 COALESCE(cities.name, \'ALL\') as city
          from sales
            join cinemas on sales.cinema_id = cinemas.id
            join cities on cinemas.city_id = cities.id
            join showings on showings.id = sales.showing_id
            join showing_types on showings.type_id = showing_types.id
            join days on sales.day_id = days.id
            join months on days.month_id = months.id
            join years on months.year_id = years.id
          group by rollup(cities.name)
        ');
    }
}