SELECT title AS Title, summary AS Summary, prod_year
FROM film
WHERE id_genre = 'erotic'
ORDER BY prod_year DESC;
-- might not work like this with the actual base-student db. Others did something with INNER JOIN etc