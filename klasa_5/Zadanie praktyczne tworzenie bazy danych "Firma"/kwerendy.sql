SELECT nazwisko, pensja
FROM pracownicy
WHERE stanowisko LIKE '%kierownik%' 
AND pensja BETWEEN 3000 AND 5000;

SELECT p.nazwisko, d.nazwa_dzialu
FROM pracownicy p
JOIN dzialy d ON p.id_dzialu = d.id_dzialu;