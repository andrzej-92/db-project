LOAD DATA
INFILE 'cities.csv'
APPEND INTO TABLE cities
fields terminated by ','
(id,state_id,name)