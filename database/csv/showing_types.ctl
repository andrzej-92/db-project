LOAD DATA
INFILE 'showing_types.csv'
APPEND INTO TABLE showing_types
fields terminated by ','
(id,name)