/*query_5:
Return the first and last names of actors who played in a film involving a “Crocodile” and a “Shark”, along with
the release year of the movie, sorted by the actors’ last names.*/


SELECT actor.first_name, actor.last_name, film.release_year
FROM film, film_actor, actor
WHERE film.film_id = film_actor.film_id AND film_actor.actor_id=actor.actor_id
AND film.description LIKE '%Crocodile%' AND film.description LIKE '%Shark%'
ORDER BY actor.last_name;
