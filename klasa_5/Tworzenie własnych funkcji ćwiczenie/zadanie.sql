-- 1. Funkcja obliczająca wiek
DELIMITER $$
CREATE FUNCTION oblicz_wiek(data_ur DATE)
RETURNS INT
DETERMINISTIC
BEGIN
    RETURN FLOOR(DATEDIFF(CURDATE(), data_ur) / 365);
END$$

-- 2. Funkcja sprawdzająca czy liczba jest parzysta
CREATE FUNCTION czy_parzysta(liczba INT)
RETURNS VARCHAR(3)
DETERMINISTIC
BEGIN
    IF liczba % 2 = 0 THEN
        RETURN 'TAK';
    ELSE
        RETURN 'NIE';
    END IF;
END$$

-- 3. Funkcja obliczająca różnicę dni między datami
CREATE FUNCTION roznica_dni(data1 DATE, data2 DATE)
RETURNS INT
DETERMINISTIC
BEGIN
    RETURN ABS(DATEDIFF(data1, data2));
END$$

-- 4. Funkcja zwracająca inicjały
CREATE FUNCTION inicjaly(imie VARCHAR(50), nazwisko VARCHAR(50))
RETURNS VARCHAR(5)
DETERMINISTIC
BEGIN
    RETURN CONCAT(LEFT(imie, 1), '.', LEFT(nazwisko, 1), '.');
END$$

-- 5. Funkcja sprawdzająca czy data przypada na weekend
CREATE FUNCTION czy_weekend(data DATE)
RETURNS VARCHAR(3)
DETERMINISTIC
BEGIN
    IF DAYOFWEEK(data) IN (1, 7) THEN
        RETURN 'TAK';
    ELSE
        RETURN 'NIE';
    END IF;
END$$

DELIMITER ;

-- Przykłady użycia:
/*
SELECT oblicz_wiek('1990-01-01') AS wiek;
SELECT czy_parzysta(4) AS czy_parzysta;
SELECT roznica_dni('2023-01-01', '2023-12-31') AS roznica_dni;
SELECT inicjaly('Jan', 'Kowalski') AS inicjaly;
SELECT czy_weekend('2023-10-21') AS czy_weekend;
*/
