-- copy base-student.sql into your container and then run "source base-student.sql" in your mysql window to import the database.
INSERT INTO ft_table (login, `group`, creation_date)
SELECT last_name, 'other', birthdate FROM user_card
WHERE last_name LIKE "%a%" AND CHAR_LENGTH(last_name) < 9
ORDER BY last_name
LIMIT 10;
