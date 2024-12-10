-- phpmyadmin sql dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- host: 127.0.0.1
-- generation time: dec 05, 2024 at 05:54 pm
-- wersja serwera: 10.4.32-mariadb
-- wersja php: 8.2.12

set sql_mode = "no_auto_value_on_zero";
start transaction;
set time_zone = "+00:00";


/*!40101 set @old_character_set_client=@@character_set_client */;
/*!40101 set @old_character_set_results=@@character_set_results */;
/*!40101 set @old_collation_connection=@@collation_connection */;
/*!40101 set names utf8mb4 */;

--
-- database: `wesolemiasteczko`
--
create database if not exists `wesolemiasteczko` default character set utf8mb4 collate utf8mb4_general_ci;
use `wesolemiasteczko`;

-- --------------------------------------------------------

--
-- struktura tabeli dla tabeli `atrakcje`
--

create table if not exists `atrakcje` (
  `id_atrakcji` int(11) not null auto_increment,
  `id_pracownika` int(11) not null,
  `nazwa` varchar(100) not null,
  `opis` text default null,
  `ograniczenie_wiekowe` int(11) default null,
  `cena_wejscia` decimal(10,2) not null,
  primary key (`id_atrakcji`),
  key `id_pracownika` (`id_pracownika`)
) engine=innodb auto_increment=4 default charset=utf8mb4 collate=utf8mb4_general_ci;

--
-- dumping data for table `atrakcje`
--

insert into `atrakcje` (`id_atrakcji`, `id_pracownika`, `nazwa`, `opis`, `ograniczenie_wiekowe`, `cena_wejscia`) values
(1, 1, 'rollercoaster', 'szybka i ekscytująca przejażdżka.', 12, 10.00),
(2, 2, 'diabelski młyn', 'panorama całego miasteczka.', null, 8.00),
(3, 3, 'dom strachów', 'przerażająca przygoda w nawiedzonym domu.', 16, 12.00);

-- --------------------------------------------------------

--
-- struktura tabeli dla tabeli `bilety`
--

create table if not exists `bilety` (
  `id_biletu` int(11) not null auto_increment,
  `id_klienta` int(11) not null,
  `typ_biletu` enum('normalny','ulgowy','vip') not null,
  `cena` decimal(10,2) not null,
  `data_zakupu` timestamp not null default current_timestamp(),
  primary key (`id_biletu`),
  key `id_klienta` (`id_klienta`)
) engine=innodb auto_increment=4 default charset=utf8mb4 collate=utf8mb4_general_ci;

--
-- dumping data for table `bilety`
--

insert into `bilety` (`id_biletu`, `id_klienta`, `typ_biletu`, `cena`, `data_zakupu`) values
(1, 1, 'normalny', 50.00, '2024-12-05 16:53:38'),
(2, 2, 'ulgowy', 30.00, '2024-12-05 16:53:38'),
(3, 3, 'vip', 100.00, '2024-12-05 16:53:38');

-- --------------------------------------------------------

--
-- struktura tabeli dla tabeli `klienci`
--

create table if not exists `klienci` (
  `id_klienta` int(11) not null auto_increment,
  `imie` varchar(50) not null,
  `nazwisko` varchar(50) not null,
  `email` varchar(100) not null,
  `haslo` varchar(255) not null,
  `telefon` varchar(15) default null,
  `data_rejestracji` timestamp not null default current_timestamp(),
  primary key (`id_klienta`),
  unique key `email` (`email`)
) engine=innodb auto_increment=4 default charset=utf8mb4 collate=utf8mb4_general_ci;

--
-- dumping data for table `klienci`
--

insert into `klienci` (`id_klienta`, `imie`, `nazwisko`, `email`, `haslo`,  `telefon`, `data_rejestracji`) values
(1, 'jan', 'kowalski', 'jan.kowalski@example.com', '123456789', 'hasdlo1231231', '2024-12-05 16:53:38'),
(2, 'anna', 'nowak', 'anna.nowak@example.com', '987654321', 'haslo1234123', '2024-12-05 16:53:38'),
(3, 'piotr', 'wiśniewski', 'piotr.wisniewski@example.com', 'haslo12', '555666777', '2024-12-05 16:53:38');

-- --------------------------------------------------------

--
-- struktura tabeli dla tabeli `pracownicy`
--

create table if not exists `pracownicy` (
  `id_pracownika` int(11) not null auto_increment,
  `imie` varchar(50) not null,
  `nazwisko` varchar(50) not null,
  `stanowisko` varchar(50) default null,
  `data_zatrudnienia` date not null,
  `telefon` varchar(15) default null,
  primary key (`id_pracownika`)
) engine=innodb auto_increment=4 default charset=utf8mb4 collate=utf8mb4_general_ci;

--
-- dumping data for table `pracownicy`
--

insert into `pracownicy` (`id_pracownika`, `imie`, `nazwisko`, `stanowisko`, `data_zatrudnienia`, `telefon`) values
(1, 'marek', 'kowalski', 'operator atrakcji', '2022-01-15', '222333444'),
(2, 'zofia', 'wiśniewska', 'kierownik', '2021-06-20', '111222333'),
(3, 'adam', 'nowak', 'konserwator', '2022-05-10', '333444555');

-- --------------------------------------------------------

--
-- struktura tabeli dla tabeli `rezerwacje`
--

create table if not exists `rezerwacje` (
  `id_rezerwacji` int(11) not null auto_increment,
  `id_klienta` int(11) not null,
  `id_atrakcji` int(11) not null,
  `data_rezerwacji` timestamp not null default current_timestamp(),
  primary key (`id_rezerwacji`),
  key `id_klienta` (`id_klienta`),
  key `id_atrakcji` (`id_atrakcji`)
) engine=innodb auto_increment=4 default charset=utf8mb4 collate=utf8mb4_general_ci;

--
-- dumping data for table `rezerwacje`
--

insert into `rezerwacje` (`id_rezerwacji`, `id_klienta`, `id_atrakcji`, `data_rezerwacji`) values
(1, 1, 1, '2024-12-05 16:53:39'),
(2, 2, 3, '2024-12-05 16:53:39'),
(3, 3, 2, '2024-12-05 16:53:39');

--
-- constraints for dumped tables
--

--
-- constraints for table `atrakcje`
--
alter table `atrakcje`
  add constraint `atrakcje_ibfk_1` foreign key (`id_pracownika`) references `pracownicy` (`id_pracownika`) on delete cascade;

--
-- constraints for table `bilety`
--
alter table `bilety`
  add constraint `bilety_ibfk_1` foreign key (`id_klienta`) references `klienci` (`id_klienta`) on delete cascade;

--
-- constraints for table `rezerwacje`
--
alter table `rezerwacje`
  add constraint `rezerwacje_ibfk_1` foreign key (`id_klienta`) references `klienci` (`id_klienta`) on delete cascade,
  add constraint `rezerwacje_ibfk_2` foreign key (`id_atrakcji`) references `atrakcje` (`id_atrakcji`) on delete cascade;
commit;

/*!40101 set character_set_client=@old_character_set_client */;
/*!40101 set character_set_results=@old_character_set_results */;
/*!40101 set collation_connection=@old_collation_connection */;