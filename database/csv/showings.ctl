LOAD DATA
INFILE 'showings.csv'
APPEND INTO TABLE showings
fields terminated by ','
(id,type_id,movie_id,start_at,room_number)