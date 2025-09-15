-- 1. Utworzenie użytkownika
CREATE USER 'w3schools_user'@'localhost' IDENTIFIED BY 'secure_password';

-- 2. Nadanie dwóch uprawnień (SELECT i INSERT)
GRANT SELECT, INSERT ON w3schools.* TO 'w3schools_user'@'localhost';

-- 3. Wyświetlenie uprawnień użytkownika
SHOW GRANTS FOR 'w3schools_user'@'localhost';

-- 4. Usunięcie jednego uprawnienia (INSERT)
REVOKE INSERT ON w3schools.* FROM 'w3schools_user'@'localhost';

-- 5. Ponowne wyświetlenie uprawnień
SHOW GRANTS FOR 'w3schools_user'@'localhost';

-- 6. Nadanie wszystkich uprawnień
GRANT ALL PRIVILEGES ON w3schools.* TO 'w3schools_user'@'localhost';

-- 7. Wyświetlenie uprawnień po nadaniu wszystkich
SHOW GRANTS FOR 'w3schools_user'@'localhost';

-- 8. Usunięcie wszystkich uprawnień
REVOKE ALL PRIVILEGES ON w3schools.* FROM 'w3schools_user'@'localhost';

-- 9. Wyświetlenie uprawnień po odebraniu wszystkich
SHOW GRANTS FOR 'w3schools_user'@'localhost';

-- 10. Usunięcie konta użytkownika
DROP USER 'w3schools_user'@'localhost';