LOAD DATA
INFILE 'days.csv'
APPEND INTO TABLE days
fields terminated by ','
(id,month_id,name)