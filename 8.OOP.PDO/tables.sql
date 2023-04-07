CREATE TABLE cars 
(
	id int unsigned AUTO_INCREMENT,
    brand varchar(32),
    model varchar(32),
    year YEAR,
    
    CONSTRAINT PRIMARY KEY(id)
);



 CREATE TABLE brands 
(
    id int unsigned AUTO_INCREMENT,
    name varchar(32),
    
    constraint primary key(id)
 -- constraint syntax for primarry key, here i used constraint because below will have one foreign key
    
);

alter table cars 
add column brand_id_fk int unsigned after id


alter table cars  
add CONSTRAINT foreign key (brand_id_fk) REFERENCES brands (id);


SELECT * FROM `cars` 
INNER JOIN brands ON cars.brand_id_fk = brands.id
