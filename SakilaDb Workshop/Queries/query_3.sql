/*query_3:
What are the top 3 countries from which customers are originating?*/


SELECT country.country, COUNT(country.country_id)
FROM customer, address, city, country
WHERE customer.address_id = address.address_id
AND address.city_id = city.country_id
AND city.country_id = country.country_id
GROUP BY country.country_id
ORDER BY COUNT(country.country_id) DESC
LIMIT 3;