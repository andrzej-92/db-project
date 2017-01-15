LOAD DATA
INFILE 'cinemas.csv'
APPEND INTO TABLE cinemas
fields terminated by ','
(id,city_id,name,address)