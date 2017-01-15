LOAD DATA
INFILE 'states.csv'
APPEND INTO TABLE states
fields terminated by ','
(id,name)