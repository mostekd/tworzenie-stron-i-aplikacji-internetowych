select 
    k.imie,
    k.nazwisko,
    z.data_zamowienia,
    p.nazwa as produkt,
    pz.ilosc,
    p.cena,
    (pz.ilosc * p.cena) as wartosc_czesciowa,
    sum(pz.ilosc * p.cena) over (partition by z.zamowienie_id) as laczna_wartosc
from zamowienie z
join klient k on z.klient_id = k.klient_id
join produkt_zamowienie pz on z.zamowienie_id = pz.zamowienie_id
join produkt p on pz.produkt_id = p.produkt_id
where z.zamowienie_id = 1;

select 
    z.zamowienie_id,
    k.imie,
    k.nazwisko,
    z.data_zamowienia,
    p.metoda,
    p.status,
    sum(pz.ilosc * pr.cena) as kwota_zamowienia
from zamowienie z
join klient k on z.klient_id = k.klient_id
left join platnosc p on z.zamowienie_id = p.zamowienie_id
join produkt_zamowienie pz on z.zamowienie_id = pz.zamowienie_id
join produkt pr on pz.produkt_id = pr.produkt_id
group by z.zamowienie_id, k.imie, k.nazwisko, z.data_zamowienia, p.metoda, p.status;

select 
    k.imie,
    k.nazwisko,
    z.zamowienie_id,
    z.data_zamowienia,
    p.status
from klient k
join zamowienie z on k.klient_id = z.klient_id
join platnosc p on z.zamowienie_id = p.zamowienie_id
where p.status = 'oczekuje';

select 
    metoda,
    count(*) as liczba_uzyc
from platnosc
group by metoda
order by liczba_uzyc desc
limit 1;