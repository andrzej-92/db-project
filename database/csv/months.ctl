LOAD DATA
INFILE 'months.csv'
APPEND INTO TABLE months
fields terminated by ','
(id,year_id,name)