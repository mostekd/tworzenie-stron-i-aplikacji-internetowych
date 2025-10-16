drop database if exists wbudowanefunkcjemysql;
create database wbudowanefunkcjemysql;
use wbudowanefunkcjemysql;

create table klienci (
    id int primary key auto_increment,
    imie varchar(50),
    nazwisko varchar(50),
    email varchar(100)
);

create table zamowienia (
    id int primary key auto_increment,
    klient_id int,
    data_zamowienia date,
    kwota decimal(10,2),
    foreign key (klient_id) references klienci(id)
);

create table produkty (
    id int primary key auto_increment,
    nazwa varchar(50),
    cena decimal(10,2)
);

create table pozycje_zamowienia (
    id int primary key auto_increment,
    zamowienie_id int,
    produkt_id int,
    ilosc int,
    foreign key (zamowienie_id) references zamowienia(id),
    foreign key (produkt_id) references produkty(id)
);

insert into klienci (imie, nazwisko, email) values
('jan', 'kowalski', 'jan.kowalski@gmail.com'),
('anna', 'nowak', 'anna.nowak@yahoo.com'),
('piotr', 'zielinski', null),
('katarzyna', 'wiśniewska', 'kasia.wisniewska@wp.pl'),
('michał', 'wojcik', 'michal.wojcik@onet.pl');

insert into produkty (nazwa, cena) values
('klawiatura', 120.50),
('mysz', 60.99),
('monitor', 899.99),
('drukarka', 450.00),
('pendrive', 49.90);

insert into zamowienia (klient_id, data_zamowienia, kwota) values
(1, '2025-10-10', 120.50),
(2, '2025-10-11', 960.98),
(3, '2025-10-12', 49.90),
(1, '2025-09-15', 450.00),
(4, '2025-10-16', 1010.89);

insert into pozycje_zamowienia (zamowienie_id, produkt_id, ilosc) values
(1, 1, 1),
(2, 3, 1),
(2, 2, 1),
(3, 5, 1),
(4, 4, 1),
(5, 3, 1),
(5, 2, 1);

create view widok_klienci as
select id, concat(imie, ' ', nazwisko) as pelne_nazwisko, email
from klienci;

create view widok_zamowienia as
select z.id as id_zamowienia, z.klient_id, z.data_zamowienia, z.kwota, concat(k.imie, ' ', k.nazwisko) as klient
from zamowienia z
join klienci k on z.klient_id = k.id;

create view widok_pozycje as
select pz.id as id_pozycji, pz.zamowienie_id, pz.produkt_id, pz.ilosc, pr.nazwa, pr.cena
from pozycje_zamowienia pz
join produkty pr on pz.produkt_id = pr.id;

select * from widok_klienci;
select substring_index(email, '@', -1) as domena from klienci where email is not null;
select left(nazwisko, 3) as trzy_litery from klienci;

select id_zamowienia, kwota, round(kwota) as zaokraglenie from widok_zamowienia;
select id_zamowienia, mod(kwota, 100) as reszta from widok_zamowienia;
select avg(cena) as srednia_cena from widok_pozycje;

select id_zamowienia, data_zamowienia, year(data_zamowienia) as rok from widok_zamowienia;
select id_zamowienia, datediff(curdate(), data_zamowienia) as dni_od_zamowienia from widok_zamowienia;
select * from widok_zamowienia where month(data_zamowienia) = month(curdate()) and year(data_zamowienia) = year(curdate());

select klient_id, count(*) as liczba_zamowien from widok_zamowienia group by klient_id;
select klient_id, sum(kwota) as laczna_kwota from widok_zamowienia group by klient_id;
select max(kwota) as najwieksze_zamowienie from widok_zamowienia;
select zamowienie_id, avg(cena) as srednia_cena_zamowienia from widok_pozycje group by zamowienie_id;

select id_zamowienia, kwota, if(kwota>500,'drogie zamowienie','tanie zamowienie') as opis from widok_zamowienia;
select id, ifnull(email,'brak emaila') as email from widok_klienci;
select klient_id,
case
when count(*)=0 then 'brak'
when count(*) between 1 and 2 then 'malo aktywny'
when count(*)>=3 then 'aktywny'
end as kategoria
from widok_zamowienia
group by klient_id;
