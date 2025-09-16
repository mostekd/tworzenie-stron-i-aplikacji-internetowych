create database firma;

use firma;

create table dzialy (
    id_dzialu int primary key auto_increment,
    nazwa_dzialu varchar(50) not null,
    lokalizacja varchar(50) not null
);

create table pracownicy (
    id_pracownika int primary key auto_increment,
    imie varchar(30) not null,
    nazwisko varchar(30) not null,
    pensja decimal(10,2) not null,
    stanowisko varchar(30) not null,
    id_dzialu int,
    foreign key (id_dzialu) references dzialy (id_dzialu)
);