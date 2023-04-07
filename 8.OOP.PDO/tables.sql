CREATE TABLE cars 
(
	id int unsigned AUTO_INCREMENT,
    brand varchar(32),
    model varchar(32),
    year YEAR,
    
    CONSTRAINT PRIMARY KEY(id)
);

 -- what is unsigned, CONSTRAINT

 CREATE TABLE brands 
(
    id int unsigned AUTO_INCREMENT,
    name varchar(32),
    
    constraint primary key(id)
 -- constraint syntax for primarry key, here i used constraint because below will have one foreign key
    
);

alter table cars 
add column brand_id_fk int unsigned after id
/* 
after id znaci posle id kolonata da ga stavi ovaa kolona brand_id_fk

 ova ke ima pod tip int unsigned zatoa sto sakame da go vrzime 
 so id-to na brand tabelata, mora da bidat od ist podatocen tip 

 ako id-to e unsigned na cars mora i brand_id_fk da e unsigned 
 za da se vrzat 2te id-ja 
 
 */





alter table cars --  alter table cars -> smeni ja tabelata cars 
add CONSTRAINT foreign key (brand_id_fk) REFERENCES brands (id);
-- dodaj fk na brand_id_fk kolonata //
-- i ja referencija brands(tabelata) id-kolonata na brands 
-- t.e. pokazuva kon idto na brands tabelata 





/*sto ni se vrzani so primary key od (cars) 
i fk od (brands) treba da napravime joins na 2te tabeli za da se vidat podatocite 
na aplikacijata t,e, da ne se pokazuva id tuku imeto_t.e. AUDI,BMW,Golf itn ..*/




SELECT * FROM `cars` 
INNER JOIN brands ON cars.brand_id_fk = brands.id
-- INNER JOIN brands ON cars.brand_id_fk = brands.id spojuvanje na 2 tabeli so fk i primary key id
-- ON cars.brand_id_fk = brands.id --> brand_id od cars da e === so brands.id so primary id od brands 





















/*

go izbrisav brand row od cars 
ALTER TABLE cars
DROP COLUMN brand 

*/



/*
The “unsigned” in MySQL is a data type. 
Whenever we write an unsigned to any column that means you cannot insert negative numbers 
*/



/*
ALTER TABLE  e sekogas koga se upotrebuva add,insert,update,delete and so on 
columnds in existing table 
*/



-- insert into brands (name) values ('Golf'), ('BMW');
