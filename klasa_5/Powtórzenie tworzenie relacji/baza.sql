create database if not exists baza_relacje;
use baza_relacje;

create table klient (
    klient_id int auto_increment primary key,
    imie varchar(50) not null,
    nazwisko varchar(50) not null
);

create table produkt (
    produkt_id int auto_increment primary key,
    nazwa varchar(100) not null,
    cena decimal(10,2) not null
);

create table zamowienie (
    zamowienie_id int auto_increment primary key,
    data_zamowienia date not null,
    klient_id int not null,
    foreign key (klient_id) references klient(klient_id)
);

create table produkt_zamowienie (
    zamowienie_id int not null,
    produkt_id int not null,
    ilosc int not null,
    foreign key (zamowienie_id) references zamowienie(zamowienie_id),
    foreign key (produkt_id) references produkt(produkt_id)
);

create table platnosc (
    platnosc_id int auto_increment primary key,
    zamowienie_id int not null,
    metoda VARCHAR(50) not null,
    status VARCHAR(20) not null,
    foreign key (zamowienie_id) references zamowienie(zamowienie_id)
);
