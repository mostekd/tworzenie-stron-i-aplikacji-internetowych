alter table obuwie 
add constraint fk_producent_id foreign key (producent_id) references producenci(id);
alter table towar_magazyn
add constraint fk_towar_magazyn_obuwie foreign key (obuwie_id) references obuwie(id),
add constraint fk_towar_magazyn_magazyn foreign key (magazyn_id) references magazyny(id);

select o.* from obuwie o
join towar_magazyn tm on o.id = tm.obuwie_id
join magazyny m on tm.magazyn_id = m.id
where m.adres like '%Chicago%';

delete from obuwie where rozmiar in (31,33);

alter table magazyny
add column miasto varchar(40),
add column kod_pocztowy char(6),
add column ulica varchar(50),
add column nr_budynku varchar(10),
add column nr_lokalu varchar(10);