#-------------------------------------------------------------------------------
#--- Change database -----------------------------------------------------------
#-------------------------------------------------------------------------------
drop database if exists gestion_voyage;
create database gestion_voyage;
use gestion_voyage;

#-------------------------------------------------------------------------------
#--- Database cleanup ----------------------------------------------------------
#-------------------------------------------------------------------------------
drop table if exists client;
drop table if exists voyage;
drop table if exists pays;
drop table if exists reservation;

#-------------------------------------------------------------------------------
#--- Database creation ---------------------------------------------------------
#-------------------------------------------------------------------------------
create table client
(
    nom varchar(100) not null,
    prenom varchar(100) not null,
    date_naissance date not null,
    telephone int not null,
    adresse varchar(100) not null,
    mail varchar(100) not null,

    primary key (mail)

)
    engine = innodb;

create table voyage
(
    libelle varchar(150) not null,
    description varchar(500) not null,
    duree int not null,
    cout float not null ,
    ref int not null,
    image varchar(100) not null,
    code_pays varchar(2) not null,

    primary key (ref)

)
    engine = innodb;

create table pays
(
    code_pays varchar(2) not null ,

    primary key (code_pays)

)
    engine = innodb;


create table inscription
(
    date_retour date not null,
    date_depart date not null,
    montant float not null ,
    validation smallint not null,
    mail varchar(100) not null,
    ref int not null,

    primary key (ref,mail)
)
    engine = innodb;

#ALTER TABLE client ADD CONSTRAINT FK_CLIENT_PAYS FOREIGN KEY client(code_pays)
 #   REFERENCES pays(code_pays) ON DELETE RESTRICT ON UPDATE CASCADE;

ALTER TABLE voyage ADD CONSTRAINT FK_voyage_pays FOREIGN KEY voyage(code_pays)
    REFERENCES pays(code_pays) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE inscription ADD CONSTRAINT FK_inscription_voyage FOREIGN KEY inscription(ref)
    REFERENCES voyage(ref) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE inscription ADD CONSTRAINT FK_inscription_client FOREIGN KEY inscription(mail)
    REFERENCES client(mail) ON DELETE CASCADE ON UPDATE CASCADE;

drop user if exists 'Quentin'@'localhost';
create user 'Quentin'@'localhost' IDENTIFIED BY 'Qhrt22';
grant all privileges ON gestion_voyage.* TO 'Quentin'@'localhost';

set autocommit = 0;
set names utf8;
