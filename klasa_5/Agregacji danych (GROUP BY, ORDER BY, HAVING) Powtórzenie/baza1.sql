CREATE DATABASE firma;
USE firma;

CREATE TABLE dzialy (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nazwa VARCHAR(50)
);

CREATE TABLE pracownicy (
    id INT AUTO_INCREMENT PRIMARY KEY,
    imie VARCHAR(50),
    nazwisko VARCHAR(50),
    dzial_id INT,
    pensja DECIMAL(10,2),
    data_zatrudnienia DATE,
    FOREIGN KEY (dzial_id) REFERENCES dzialy(id)
);

INSERT INTO dzialy (nazwa) VALUES
('IT'),
('HR'),
('Sprzedaż'),
('Marketing'),
('Finanse');

INSERT INTO pracownicy (imie, nazwisko, dzial_id, pensja, data_zatrudnienia) VALUES
('Jan', 'Kowalski', 1, 7200.00, '2020-03-15'),
('Anna', 'Nowak', 1, 8500.00, '2018-07-22'),
('Piotr', 'Wiśniewski', 2, 5600.00, '2019-11-10'),
('Maria', 'Zielińska', 3, 4900.00, '2021-02-05'),
('Krzysztof', 'Mazur', 3, 6700.00, '2017-09-18'),
('Ewa', 'Kaczmarek', 4, 7500.00, '2016-05-12'),
('Tomasz', 'Lewandowski', 5, 9100.00, '2015-04-03'),
('Alicja', 'Jankowska', 1, 6400.00, '2022-06-01'),
('Paweł', 'Wójcik', 4, 5800.00, '2020-09-21'),
('Karolina', 'Szymańska', 2, 6200.00, '2019-01-30');