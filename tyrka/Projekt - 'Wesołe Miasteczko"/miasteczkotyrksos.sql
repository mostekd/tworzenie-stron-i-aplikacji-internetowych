DROP DATABASE IF EXISTS miasteczkotyrksos;
CREATE DATABASE miasteczkotyrksos;
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
    id_atrakcji INT PRIMARY KEY AUTO_INCREMENT,
    nazwa VARCHAR(100) NOT NULL,
    opis TEXT,
    minimalny_wiek INT,
    czas_trwania VARCHAR(50),
    typ VARCHAR(50),
    status ENUM('aktywna', 'w_konserwacji', 'nieaktywna') DEFAULT 'aktywna',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
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
    id_wydarzenia INT PRIMARY KEY AUTO_INCREMENT,
    nazwa VARCHAR(100) NOT NULL,
    opis TEXT,
    data_wydarzenia DATETIME,
    czas_trwania VARCHAR(50),
    max_uczestnikow INT,
    status ENUM('planowane', 'w_trakcie', 'zakonczone') DEFAULT 'planowane',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
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

INSERT INTO Atrakcje (nazwa, opis, minimalny_wiek, czas_trwania, typ) VALUES
('Roller Coaster', 'Ekscytująca przejażdżka kolejką górską', 12, '5 minut', 'ekstremalne'),
('Karuzela', 'Tradycyjna karuzela dla całej rodziny', 3, '5 minut', 'rodzinne'),
('Dom Strachów', 'Straszny dom pełen niespodzianek', 10, '10 minut', 'ekstremalne'),
('Diabelski Młyn', 'Panoramiczny widok na całe miasteczko', 5, '15 minut', 'rodzinne');

INSERT INTO Bilety (id_uzytkownika, typ_biletu, cena, status) VALUES
(1, 'dzień', 50.00, 'kupiony'),
(2, 'noc', 70.00, 'kupiony');

INSERT INTO Wydarzenia (nazwa, opis, data_wydarzenia, czas_trwania, max_uczestnikow) VALUES
('Pokaz Świateł', 'Spektakularny pokaz świateł i laserów', '2024-02-14 20:00:00', '45 minut', 200),
('Parada Postaci', 'Parada z udziałem znanych postaci z bajek', '2024-02-15 16:00:00', '60 minut', 500),
('Warsztaty Cyrkowe', 'Nauka żonglowania i innych sztuczek cyrkowych', '2024-02-16 14:00:00', '120 minut', 30);

INSERT INTO Sklep_pamiatki (id_uzytkownika, nazwa_produktu, ilosc, cena) VALUES
(1, 'Pluszak Kolejka Górska', 1, 25.00),
(2, 'Magnes Wesołe Miasteczko', 2, 10.00),
(1, 'Czapka z logo', 1, 15.00);

CREATE USER 'tyrka'@'localhost' IDENTIFIED BY '123';
GRANT SELECT, INSERT, UPDATE, DELETE, CREATE, DROP ON miasteczkotyrksos TO 'tyrka'@'localhost';
