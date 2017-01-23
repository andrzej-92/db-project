SELECT
  SHOWING_TYPES.NAME AS TYPE,
  MOVIES_CATEGORY.NAME AS CATEGORY,
  COUNT(*) AS COUNT,
  SUM(SALES.BRUTTO_PRICE) AS BRUTTO_VALUE
FROM SALES
  JOIN SHOWINGS ON SALES.SHOWING_ID = SHOWINGS.ID
  JOIN MOVIES ON SHOWINGS.MOVIE_ID = MOVIES.ID
  JOIN MOVIES_CATEGORY ON MOVIES.CATEGORY_ID = MOVIES_CATEGORY.ID
  JOIN SHOWING_TYPES ON SHOWINGS.TYPE_ID = SHOWING_TYPES.ID
GROUP BY CUBE(SHOWING_TYPES.NAME, MOVIES_CATEGORY.NAME)