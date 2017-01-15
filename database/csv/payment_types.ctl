LOAD DATA
INFILE 'payment_types.csv'
APPEND INTO TABLE payment_types
fields terminated by ','
(id,name)