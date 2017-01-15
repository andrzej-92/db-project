LOAD DATA
INFILE 'movies_category.csv'
APPEND INTO TABLE movies_category
fields terminated by ','
(id,name)