SELECT
  COALESCE(CINEMAS.NAME, 'ALL')       AS CINEMA,
  COALESCE(SHOWING_TYPES.NAME, 'ALL') AS SHOWING_TYPE,
  round(sum(NETTO_PRICE), 2)          AS NETTO,
  round(sum(BRUTTO_PRICE), 2)         AS BRUTTO,
  count(*)                            AS COUNT
FROM SALES
  JOIN SHOWINGS ON SHOWINGS.ID = SALES.SHOWING_ID
  JOIN SHOWING_TYPES ON SHOWINGS.TYPE_ID = SHOWING_TYPES.ID
  JOIN CINEMAS ON SALES.CINEMA_ID = CINEMAS.ID
GROUP BY ROLLUP (CINEMAS.NAME, SHOWING_TYPES.NAME)
ORDER BY CINEMA, SHOWING_TYPE, COUNT