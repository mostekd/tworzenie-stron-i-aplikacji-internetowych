-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 06 Gru 2023, 00:14
-- Wersja serwera: 10.4.21-MariaDB
-- Wersja PHP: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `obuwie`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `magazyny`
--

CREATE TABLE `magazyny` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `adres` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `magazyny`
--

INSERT INTO `magazyny` (`id`, `adres`) VALUES
(1, 'Chicago, Floral Avenue 1334'),
(2, 'Chicago, Violet Street 11'),
(3, 'Montreal, Floaral Park 1'),
(4, 'Saltlake, Husky Street 23'),
(5, 'Madrid, Corrida 78/13'),
(6, 'London, Baker Street 56  ');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `obuwie`
--

CREATE TABLE `obuwie` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nazwa` varchar(50) NOT NULL,
  `producent_id` bigint(20) UNSIGNED NOT NULL,
  `rozmiar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `obuwie`
--

INSERT INTO `obuwie` (`id`, `nazwa`, `producent_id`, `rozmiar`) VALUES
(1, 'Sneak', 3, 44),
(2, 'Sneak', 3, 45),
(3, 'Zero waste', 1, 33),
(4, 'Zero waste', 1, 35),
(5, 'Zero waste', 1, 38),
(6, 'Zero waste', 1, 40),
(7, 'Yoga', 2, 43),
(8, 'Yoag', 2, 44),
(9, 'Yoga', 2, 45),
(10, 'VIPMember', 4, 30),
(11, 'VIPMember', 4, 32);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `producenci`
--

CREATE TABLE `producenci` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nazwa` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `producenci`
--

INSERT INTO `producenci` (`id`, `nazwa`) VALUES
(1, 'CCC'),
(2, 'La Coste'),
(3, 'Creek'),
(4, 'Goodland');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `towar_magazyn`
--

CREATE TABLE `towar_magazyn` (
  `obuwie_id` bigint(20) UNSIGNED NOT NULL,
  `magazyn_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `towar_magazyn`
--

INSERT INTO `towar_magazyn` (`obuwie_id`, `magazyn_id`) VALUES
(3, 2),
(3, 1),
(10, 2),
(6, 2),
(4, 2),
(2, 1),
(9, 2),
(8, 2),
(3, 10);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `magazyny`
--
ALTER TABLE `magazyny`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indeksy dla tabeli `obuwie`
--
ALTER TABLE `obuwie`
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `producent_id` (`producent_id`);

--
-- Indeksy dla tabeli `producenci`
--
ALTER TABLE `producenci`
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `magazyny`
--
ALTER TABLE `magazyny`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT dla tabeli `obuwie`
--
ALTER TABLE `obuwie`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT dla tabeli `producenci`
--
ALTER TABLE `producenci`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
