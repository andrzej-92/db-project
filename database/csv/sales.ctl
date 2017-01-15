LOAD DATA
INFILE 'sales.csv'
APPEND INTO TABLE sales
fields terminated by ';'
(
    id,
    showing_id,
    day_id,
    cinema_id,
    payment_type_id,
    netto_price,
    brutto_price,
    ticket_count
)