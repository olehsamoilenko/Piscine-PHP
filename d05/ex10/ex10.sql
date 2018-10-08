SELECT film.title AS 'Title', film.summary AS 'Summary', film.prod_year
FROM film INNER JOIN genre ON genre.id_genre = film.id_genre
WHERE genre.name = 'erotic'
ORDER BY film.prod_year DESC;