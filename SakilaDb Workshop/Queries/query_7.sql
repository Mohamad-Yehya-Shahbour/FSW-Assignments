/*query_7:
Find the names (first and last) of all the actors and costumers whose first name is the same as the first name of
the actor with ID 8. Do not return the actor with ID 8 himself. Note that you cannot use the name of the actor
with ID 8 as a constant (only the ID). There is more than one way to solve this question, but you need to
provide only one solution.*/


SELECT actor.first_name, actor.last_name,customer.first_name, customer.last_name
FROM actor, customer
WHERE customer.first_name IN (SELECT actor.first_name FROM actor WHERE actor.actor_id = 8)
AND actor.first_name IN (SELECT actor.first_name FROM actor WHERE actor.actor_id = 8)
AND actor.actor_id <> 8;