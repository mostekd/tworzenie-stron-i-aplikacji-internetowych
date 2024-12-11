-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 05, 2024 at 05:54 PM
-- Wersja serwera: 10.4.32-MariaDB
-- Wersja PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wesolemiasteczko`
--
CREATE DATABASE IF NOT EXISTS `wesolemiasteczko` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `wesolemiasteczko`;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `atrakcje`
--

CREATE TABLE IF NOT EXISTS `atrakcje` (
  `id_atrakcji` int(11) NOT NULL AUTO_INCREMENT,
  `id_pracownika` int(11) NOT NULL,
  `nazwa` varchar(100) NOT NULL,
  `opis` text DEFAULT NULL,
  `ograniczenie_wiekowe` int(11) DEFAULT NULL,
  `cena_wejscia` decimal(10,2) NOT NULL,
  PRIMARY KEY (`id_atrakcji`),
  KEY `id_pracownika` (`id_pracownika`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `atrakcje`
--

INSERT INTO `atrakcje` (`id_atrakcji`, `id_pracownika`, `nazwa`, `opis`, `ograniczenie_wiekowe`, `cena_wejscia`) VALUES
(1, 1, 'Rollercoaster', 'Szybka i ekscytująca przejażdżka.', 12, 10.00),
(2, 2, 'Diabelski Młyn', 'Panorama całego miasteczka.', NULL, 8.00),
(3, 3, 'Dom Strachów', 'Przerażająca przygoda w nawiedzonym domu.', 16, 12.00);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `bilety`
--

CREATE TABLE IF NOT EXISTS `bilety` (
  `id_biletu` int(11) NOT NULL AUTO_INCREMENT,
  `id_klienta` int(11) NOT NULL,
  `typ_biletu` enum('Normalny','Ulgowy','VIP') NOT NULL,
  `cena` decimal(10,2) NOT NULL,
  `data_zakupu` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id_biletu`),
  KEY `id_klienta` (`id_klienta`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bilety`
--

INSERT INTO `bilety` (`id_biletu`, `id_klienta`, `typ_biletu`, `cena`, `data_zakupu`) VALUES
(1, 1, 'Normalny', 50.00, '2024-12-05 16:53:38'),
(2, 2, 'Ulgowy', 30.00, '2024-12-05 16:53:38'),
(3, 3, 'VIP', 100.00, '2024-12-05 16:53:38');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `klienci`
--

CREATE TABLE IF NOT EXISTS `klienci` (
  `id_klienta` int(11) NOT NULL AUTO_INCREMENT,
  `imie` varchar(50) NOT NULL,
  `nazwisko` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `haslo` VARCHAR(255) NOT NULL,
  `telefon` varchar(15) DEFAULT NULL,
  `data_rejestracji` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id_klienta`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `klienci`
--

INSERT INTO `klienci` (`id_klienta`, `imie`, `nazwisko`, `email`, `telefon`, `data_rejestracji`) VALUES
(1, 'Jan', 'Kowalski', 'jan.kowalski@example.com', '123456789', '2024-12-05 16:53:38'),
(2, 'Anna', 'Nowak', 'anna.nowak@example.com', '987654321', '2024-12-05 16:53:38'),
(3, 'Piotr', 'Wiśniewski', 'piotr.wisniewski@example.com', '555666777', '2024-12-05 16:53:38');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `pracownicy`
--

CREATE TABLE IF NOT EXISTS `pracownicy` (
  `id_pracownika` int(11) NOT NULL AUTO_INCREMENT,
  `imie` varchar(50) NOT NULL,
  `nazwisko` varchar(50) NOT NULL,
  `stanowisko` varchar(50) DEFAULT NULL,
  `data_zatrudnienia` date NOT NULL,
  `telefon` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`id_pracownika`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pracownicy`
--

INSERT INTO `pracownicy` (`id_pracownika`, `imie`, `nazwisko`, `stanowisko`, `data_zatrudnienia`, `telefon`) VALUES
(1, 'Marek', 'Kowalski', 'Operator atrakcji', '2022-01-15', '222333444'),
(2, 'Zofia', 'Wiśniewska', 'Kierownik', '2021-06-20', '111222333'),
(3, 'Adam', 'Nowak', 'Konserwator', '2022-05-10', '333444555');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `rezerwacje`
--

CREATE TABLE IF NOT EXISTS `rezerwacje` (
  `id_rezerwacji` int(11) NOT NULL AUTO_INCREMENT,
  `id_klienta` int(11) NOT NULL,
  `id_atrakcji` int(11) NOT NULL,
  `data_rezerwacji` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id_rezerwacji`),
  KEY `id_klienta` (`id_klienta`),
  KEY `id_atrakcji` (`id_atrakcji`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rezerwacje`
--

INSERT INTO `rezerwacje` (`id_rezerwacji`, `id_klienta`, `id_atrakcji`, `data_rezerwacji`) VALUES
(1, 1, 1, '2024-12-05 16:53:39'),
(2, 2, 3, '2024-12-05 16:53:39'),
(3, 3, 2, '2024-12-05 16:53:39');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `atrakcje`
--
ALTER TABLE `atrakcje`
  ADD CONSTRAINT `atrakcje_ibfk_1` FOREIGN KEY (`id_pracownika`) REFERENCES `pracownicy` (`id_pracownika`) ON DELETE CASCADE;

--
-- Constraints for table `bilety`
--
ALTER TABLE `bilety`
  ADD CONSTRAINT `bilety_ibfk_1` FOREIGN KEY (`id_klienta`) REFERENCES `klienci` (`id_klienta`) ON DELETE CASCADE;

--
-- Constraints for table `rezerwacje`
--
ALTER TABLE `rezerwacje`
  ADD CONSTRAINT `rezerwacje_ibfk_1` FOREIGN KEY (`id_klienta`) REFERENCES `klienci` (`id_klienta`) ON DELETE CASCADE,
  ADD CONSTRAINT `rezerwacje_ibfk_2` FOREIGN KEY (`id_atrakcji`) REFERENCES `atrakcje` (`id_atrakcji`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;