/*query_8:
Get the total and average values of rentals per month per year per store.*/


SELECT SUM(rental.rental_id), AVG(rental.rental_id), YEAR(rental.rental_date), MONTH(rental.rental_date), staff.store_id
FROM rental, staff
WHERE rental.staff_id = staff.staff_id
GROUP BY YEAR(rental.rental_date) , MONTH(rental.rental_date), staff.store_id;
