/*query_6:
Find all the film categories in which there are between 55 and 65 films. Return the names of these categories
and the number of films per category, sorted by the number of films. If there are no categories between 55 and
65, return the highest available counts.*/


SELECT category.name, COUNT(film_category.film_id)
FROM category, film_category
WHERE category.category_id = film_category.category_id
GROUP BY category.category_id
HAVING COUNT(film_category.film_id) BETWEEN 55 AND 65
ORDER BY COUNT(film_category.film_id);