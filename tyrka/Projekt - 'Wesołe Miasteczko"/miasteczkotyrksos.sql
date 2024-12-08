CREATE DATABASE IF NOT EXISTS miasteczkotyrksos;
USE miasteczkotyrksos;
CREATE TABLE Uzytkownicy (
    id_uzytkownika INT AUTO_INCREMENT PRIMARY KEY,
    imie VARCHAR(50),
    nazwisko VARCHAR(50),
    email VARCHAR(100),
    haslo VARCHAR(255),
    rola ENUM('klient', 'pracownik') NOT NULL
);

CREATE TABLE Atrakcje (
    id_atrakcji INT AUTO_INCREMENT PRIMARY KEY,
    nazwa VARCHAR(100),
    opis TEXT,
    minimalny_wiek INT,
    czas_trwania TIME
);

CREATE TABLE Bilety (
    id_biletu INT AUTO_INCREMENT PRIMARY KEY,
    id_uzytkownika INT,
    typ_biletu ENUM('dzień', 'noc', 'sezonowy') NOT NULL,
    cena DECIMAL(10, 2) NOT NULL,
    czas_zakupu DATETIME DEFAULT CURRENT_TIMESTAMP,
    status ENUM('kupiony', 'anulowany') DEFAULT 'kupiony',
    FOREIGN KEY (id_uzytkownika) REFERENCES Uzytkownicy(id_uzytkownika)
);

CREATE TABLE Wydarzenia (
    id_wydarzenia INT AUTO_INCREMENT PRIMARY KEY,
    nazwa VARCHAR(100),
    opis TEXT,
    data_wydarzenia DATETIME,
    czas_trwania TIME
);

CREATE TABLE Sklep_pamiatki (
    id_transakcji INT AUTO_INCREMENT PRIMARY KEY,
    id_uzytkownika INT,
    nazwa_produktu VARCHAR(100),
    ilosc INT,
    cena DECIMAL(10, 2),
    czas_zakupu DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (id_uzytkownika) REFERENCES Uzytkownicy(id_uzytkownika)
);

INSERT INTO Uzytkownicy (imie, nazwisko, email, rola) VALUES
('Szymon', 'zcyreny', 'szymon.cyrena@gmail.com', 'klient'),
('Dawid', 'Mostowski', 'dawid.mosiu@gmail.com', 'klient'),
('Joshep', 'Gebels', 'komando.SS@gmail.com', 'pracownik');

INSERT INTO Atrakcje (nazwa, opis, minimalny_wiek, czas_trwania) VALUES
('Kolejka Górska', 'Szybka kolejka z ostrymi zakrętami.', 12, '00:05:00'),
('Karuzela', 'Klasyczna karuzela dla całej rodziny.', 0, '00:03:00'),
('Dom Strachów', 'Atrakcja pełna niespodzianek i strachu.', 15, '00:10:00');

INSERT INTO Bilety (id_uzytkownika, typ_biletu, cena, status) VALUES
(1, 'dzień', 50.00, 'kupiony'),
(2, 'noc', 70.00, 'kupiony');

INSERT INTO Wydarzenia (nazwa, opis, data_wydarzenia, czas_trwania) VALUES
('Pokaz Fajerwerków', 'Spektakularny pokaz fajerwerków na zakończenie dnia.', '2024-12-25 20:00:00', '00:30:00'),
('Koncert na żywo', 'Występ zespołu muzycznego.', '2024-12-31 21:00:00', '01:00:00');

INSERT INTO Sklep_pamiatki (id_uzytkownika, nazwa_produktu, ilosc, cena) VALUES
(1, 'Pluszak Kolejka Górska', 1, 25.00),
(2, 'Magnes Wesołe Miasteczko', 2, 10.00),
(1, 'Czapka z logo', 1, 15.00);

CREATE USER 'tyrka'@'localhost' IDENTIFIED BY '123';
GRANT SELECT, INSERT, UPDATE, DELETE, CREATE, DROP ON miasteczkotyrksos TO 'tyrka'@'localhost';
