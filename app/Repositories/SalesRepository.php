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
          group by rollup(cities.name)
        ');
    }

    public function getSalesRollUpByShowingType()
    {
        return Sale::hydrateRaw(''.'
          select round(sum(netto_price), 2) as netto, 
                 round(sum(brutto_price), 2) as brutto,
                 count(*) as count,
                 COALESCE(showing_types.name, \'ALL\') as showing_type
          from sales
            join showings on showings.id = sales.showing_id
            join showing_types on showings.type_id = showing_types.id
          group by rollup(showing_types.name)
        ');
    }

    public function getSalesRollUpByShowingTypeForEachCinema()
    {
        return Sale::hydrateRaw(''.'
          select round(sum(netto_price), 2) as netto, 
                 round(sum(brutto_price), 2) as brutto,
                 count(*) as count,
                 COALESCE(showing_types.name, \'ALL\') as showing_type,
                 COALESCE(cinemas.name, \'ALL\') as cinema
          from sales
            join showings on showings.id = sales.showing_id
            join showing_types on showings.type_id = showing_types.id
            join cinemas on sales.cinema_id = cinemas.id
          group by rollup(cinemas.name, showing_types.name)
          order by cinema, showing_type, count
        ');
    }
}