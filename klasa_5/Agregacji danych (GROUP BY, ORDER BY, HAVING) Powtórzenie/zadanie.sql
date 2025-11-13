use firma;

select d.nazwa as dzial, avg(p.pensja) as srednia_pensja
from pracownicy p
join dzialy d on p.dzial_id = d.id
group by d.nazwa
order by srednia_pensja desc;

select d.nazwa as dzial, count(p.id) as liczba_pracownikow
from pracownicy p
join dzialy d on p.dzial_id = d.id
group by d.nazwa
order by liczba_pracownikow asc;

select d.nazwa as dzial, sum(p.pensja) as suma_pensji
from pracownicy p
join dzialy d on p.dzial_id = d.id
group by d.nazwa
order by suma_pensji desc;

select d.nazwa as dzial, max(p.pensja) as najwyzsza, min(p.pensja) as najnizsza
from pracownicy p
join dzialy d on p.dzial_id = d.id
group by d.nazwa;

select d.nazwa as dzial, count(*) as liczba_pracownikow
from pracownicy p
join dzialy d on p.dzial_id = d.id
where p.pensja > 6000
group by d.nazwa;

select d.nazwa as dzial, avg(p.pensja) as srednia_pensja
from pracownicy p
join dzialy d on p.dzial_id = d.id
where p.data_zatrudnienia > '2019-01-01'
group by d.nazwa
order by srednia_pensja desc;

select d.nazwa as dzial, avg(p.pensja) as srednia_pensja
from pracownicy p
join dzialy d on p.dzial_id = d.id
group by d.nazwa
having avg(p.pensja) > 7000;

select d.nazwa as dzial, avg(p.pensja) as srednia_pensja, count(*) as liczba_pracownikow
from pracownicy p
join dzialy d on p.dzial_id = d.id
group by d.nazwa
having count(*) >= 2;

select year(p.data_zatrudnienia) as rok, avg(p.pensja) as srednia_pensja
from pracownicy p
group by year(p.data_zatrudnienia)
order by rok;

select d.nazwa as dzial, max(p.pensja) as najwyzsza_pensja
from pracownicy p
join dzialy d on p.dzial_id = d.id
group by d.nazwa
having max(p.pensja) > 8000
order by najwyzsza_pensja desc;

use sklep;

select k.imie, k.nazwisko, sum(z.ilosc * p.cena) as laczna_wartosc
from zamowienia z
join klienci k on z.klient_id = k.id
join produkty p on z.produkt_id = p.id
group by k.id
order by laczna_wartosc desc;

select k.imie, k.nazwisko, count(z.id) as liczba_zamowien
from zamowienia z
join klienci k on z.klient_id = k.id
group by k.id;

select kategoria, avg(cena) as srednia_cena
from produkty
group by kategoria
order by srednia_cena desc;

select k.miasto, sum(z.ilosc * p.cena) as wartosc_miasta
from zamowienia z
join klienci k on z.klient_id = k.id
join produkty p on z.produkt_id = p.id
group by k.miasto;

select p.nazwa, sum(z.ilosc) as laczna_ilosc
from zamowienia z
join produkty p on z.produkt_id = p.id
group by p.id
having sum(z.ilosc) > 3;

select k.imie, k.nazwisko, sum(z.ilosc * p.cena) as laczna_wartosc
from zamowienia z
join klienci k on z.klient_id = k.id
join produkty p on z.produkt_id = p.id
group by k.id
having sum(z.ilosc * p.cena) > 5000;

select p.kategoria, sum(z.ilosc) as liczba_sprzedanych
from zamowienia z
join produkty p on z.produkt_id = p.id
group by p.kategoria
order by liczba_sprzedanych desc;

select date_format(z.data_zamowienia, '%y-%m') as miesiac, avg(z.ilosc * p.cena) as srednia_wartosc
from zamowienia z
join produkty p on z.produkt_id = p.id
group by date_format(z.data_zamowienia, '%y-%m')
order by miesiac;

select k.miasto, count(distinct k.id) as liczba_klientow
from klienci k
join zamowienia z on k.id = z.klient_id
group by k.miasto
order by liczba_klientow desc
limit 1;

select p.nazwa, avg(z.ilosc) as srednia_ilosc
from zamowienia z
join produkty p on z.produkt_id = p.id
group by p.id
having avg(z.ilosc) > 2;
