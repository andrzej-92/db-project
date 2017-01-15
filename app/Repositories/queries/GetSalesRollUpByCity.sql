select round(sum(netto_price), 2) as netto,
       round(sum(brutto_price), 2) as brutto,
       count(*) as count,
       COALESCE(cities.name, 'ALL') as city
from sales
  join cinemas on sales.cinema_id = cinemas.id
  join cities on cinemas.city_id = cities.id
group by cities.name with rollup