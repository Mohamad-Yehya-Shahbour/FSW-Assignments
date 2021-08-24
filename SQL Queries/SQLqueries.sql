SELECT degree FROM degrees;

SELECT FisrtName
FROM instructors , degrees
WHERE degrees.instructors_Id = instructors.Id AND degrees.degree = 'MS in CS';

DELETE FROM instructors;

INSERT INTO instructors (FisrtName, LastName) VALUES ("mohamad", "yehya");
INSERT INTO degrees (degree, year, university, instructors_Id) VALUES ("PhD in CS", "2020", "LU", 6);