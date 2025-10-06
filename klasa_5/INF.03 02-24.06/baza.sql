-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Paź 10, 2024 at 10:48 AM
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
-- Database: `chat`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `logowanie`
--

CREATE TABLE `logowanie` (
  `id` int(10) UNSIGNED NOT NULL,
  `nick` varchar(15) DEFAULT NULL,
  `haslo` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `logowanie`
--

INSERT INTO `logowanie` (`id`, `nick`, `haslo`) VALUES
(1, 'Jolka', 'Jol123'),
(2, 'Krzysiek', 'Krz123'),
(3, 'Jeremi', 'Jer123');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `uczestnicy`
--

CREATE TABLE `uczestnicy` (
  `id` int(10) UNSIGNED NOT NULL,
  `logowanie_id` int(10) UNSIGNED NOT NULL,
  `imie` varchar(10) DEFAULT NULL,
  `nazwisko` varchar(20) DEFAULT NULL,
  `rokUr` year(4) DEFAULT NULL,
  `opis` text DEFAULT NULL,
  `zdjecie` varchar(50) DEFAULT NULL,
  `email` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `uczestnicy`
--

INSERT INTO `uczestnicy` (`id`, `logowanie_id`, `imie`, `nazwisko`, `rokUr`, `opis`, `zdjecie`, `email`) VALUES
(1, 1, 'Jolanta', 'Nowak', '2002', '', 'jolka.jpg', 'jolka@poczta.pl'),
(2, 2, 'Krzysztof', 'Łukasiński', '2001', '', 'krzysiek.jpg', 'krzysiek@poczta.pl'),
(3, 3, 'Jeremi', 'Kowalski', '2000', '', 'jeremi.jpg', 'jeremi@poczta.pl');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `logowanie`
--
ALTER TABLE `logowanie`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `uczestnicy`
--
ALTER TABLE `uczestnicy`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `uczestnicy`
--
ALTER TABLE `uczestnicy`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
