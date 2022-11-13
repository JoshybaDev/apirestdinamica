-- las tablas deben de estar escritas en plural y el nombre de las columnas
-- deben terminar con el nombre de la tabla en singular
-- tabla categories
-- columnas
-- id_category
-- name-category
-- date_created_category
-- date_updated_category

-- La 1ra columna debe ser un id autoincrementable
-- y las 2 ultimas columnas deben de ser la fecha de creacion y actualizacion

-- para relacionar tabla el numero del id de la tabla relacionada debe estar en una columna
-- de la tabla principal y dicha columna debe tener el siguiente orden de palabras
-- id_tabla relacionada en singular_tabla principal en sinfgular
-- tabla principal products
-- tabla relacionada categories | columna id_category_product
-- tabla relacionada stores | columna id_store_product

--para realizar autenticaciones con la api restful es indispensable que la autenticación tenga estas siempre
-- 4 columnas
-- email_sufijo
-- password_sufijo
-- token_sufijo
-- token_exp_sufijo

--insertar desde excel en formato csv
load data infile 'd:\\xampp\\tmp\\pcht.tmp' into table 'courses' fields terminated by ';' enclosed by '\"' lines terminated by '\r\n';


create table courses(
    id_course int not null auto_increment primary key,
    title_course varchar(150),
    description_course text(1000),
    id_instructor_course int,
    image_course varchar(300),
    price_course decimal(18,2),
    date_created_course datetime,
    date_updated_course timestamp default current_timestamp() 
)engine=innoDB;

ALTER TABLE `courses` CHANGE `date_updated_course` `date_updated_course` TIMESTAMP on update CURRENT_TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP; 

create table instructors(
    id_instructor int not null auto_increment primary key,
    name_instructor varchar(50),
    date_created_instructor datetime,
    date_updated_instructor timestamp default current_timestamp()
)engine=innoDB;

ALTER TABLE `instructors` CHANGE `date_updated_instructor` `date_updated_instructor` TIMESTAMP on update CURRENT_TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP; 

create table products(
    id_product int not null auto_increment primary key,
    name_product varchar(50),
    id_category_product int,
    date_created_product datetime,
    date_updated_product timestamp default current_timestamp()    
)engine=innoDB;

ALTER TABLE `products` CHANGE `date_updated_product` `date_updated_product` TIMESTAMP on update CURRENT_TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP; 

create table categories(
    id_category int not null auto_increment primary key,
    name_category varchar(50),
    date_created_category datetime,
    date_updated_category timestamp default current_timestamp()      
)engine=innoDB;
ALTER TABLE `categories` CHANGE `date_updated_category` `date_updated_category` TIMESTAMP on update CURRENT_TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP; 