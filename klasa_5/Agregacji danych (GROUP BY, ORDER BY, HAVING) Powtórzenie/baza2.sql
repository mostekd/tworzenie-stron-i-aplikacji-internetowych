CREATE DATABASE IF NOT EXISTS sklep;
USE sklep;


CREATE TABLE klienci (
    id INT AUTO_INCREMENT PRIMARY KEY,
    imie VARCHAR(50),
    nazwisko VARCHAR(50),
    miasto VARCHAR(50)
);


CREATE TABLE produkty (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nazwa VARCHAR(100),
    kategoria VARCHAR(50),
    cena DECIMAL(10,2)
);


CREATE TABLE zamowienia (
    id INT AUTO_INCREMENT PRIMARY KEY,
    klient_id INT,
    produkt_id INT,
    ilosc INT,
    data_zamowienia DATE,
    FOREIGN KEY (klient_id) REFERENCES klienci(id),
    FOREIGN KEY (produkt_id) REFERENCES produkty(id)
);


INSERT INTO klienci (imie, nazwisko, miasto) VALUES
('Jan', 'Kowalski', 'Warszawa'),
('Anna', 'Nowak', 'Kraków'),
('Piotr', 'Wiśniewski', 'Poznań'),
('Ewa', 'Kaczmarek', 'Gdańsk'),
('Marek', 'Zieliński', 'Warszawa');


INSERT INTO produkty (nazwa, kategoria, cena) VALUES
('Laptop Lenovo', 'Elektronika', 3500.00),
('Smartfon Samsung', 'Elektronika', 2800.00),
('Książka SQL', 'Książki', 70.00),
('Fotel biurowy', 'Meble', 600.00),
('Monitor LG', 'Elektronika', 950.00);


INSERT INTO zamowienia (klient_id, produkt_id, ilosc, data_zamowienia) VALUES
(1, 1, 2, '2023-04-10'),
(2, 2, 1, '2023-05-03'),
(3, 3, 5, '2023-06-14'),
(1, 5, 1, '2023-07-01'),
(4, 4, 3, '2023-07-21'),
(5, 1, 1, '2023-08-10'),
(5, 2, 2, '2023-09-02'),
(2, 3, 3, '2023-09-15'),
(3, 5, 1, '2023-10-05'),
(4, 1, 1, '2023-10-20');