insert into klient (imie, nazwisko) values
('anna', 'nowak'),
('jan', 'kowalski'),
('piotr', 'wiśniewski');

insert into produkt (nazwa, cena) values
('telefon', 999.99),
('laptop', 2999.99),
('klawiatura', 199.99);

insert into zamowienie (data_zamowienia, klient_id) values
(curdate(), 2);

insert into produkt_zamowienie (zamowienie_id, produkt_id, ilosc) values
(1, 2, 1),
(1, 3, 2);

insert into platnosc (zamowienie_id, metoda, status) values
(1, 'karta', 'oplacone'),
(1, 'blik', 'oczekuje');