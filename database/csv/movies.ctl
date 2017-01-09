LOAD DATA
INFILE 'movies.csv'
APPEND INTO TABLE movies
fields terminated by ','
(id,category_id,name)