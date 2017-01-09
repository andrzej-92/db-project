LOAD DATA
INFILE 'years.csv'
APPEND INTO TABLE years
fields terminated by ','
(id,name)