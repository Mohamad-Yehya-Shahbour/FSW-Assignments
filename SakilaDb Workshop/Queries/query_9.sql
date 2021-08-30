/*query_9:
Get the top 3 customers who rented the highest number of movies within a given year.*/


SELECT customer.first_name, customer.last_name, COUNT(rental.customer_id), rental.rental_date
FROM customer, rental
WHERE rental.customer_id=customer.customer_id AND YEAR(rental.rental_date) = 2006
GROUP BY rental.customer_id
ORDER BY COUNT(rental.customer_id) DESC LIMIT 3;