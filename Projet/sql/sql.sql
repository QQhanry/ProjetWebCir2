/**
 * @Author: Thibault Napoléon <Imothep>
 * @Company: ISEN Yncréa Ouest
 * @Email: thibault.napoleon@isen-ouest.yncrea.fr
 * @Created Date: 22-Jan-2018 - 14:10:27
 * @Last Modified: 29-Jan-2018 - 22:43:19
 */

#-------------------------------------------------------------------------------
#--- Change database -----------------------------------------------------------
#-------------------------------------------------------------------------------
use gestion_voyage;

#-------------------------------------------------------------------------------
#--- Database cleanup ----------------------------------------------------------
#-------------------------------------------------------------------------------
drop table if exists clients;
drop table if exists voyages;
drop table if exists pays;
drop table if exists reservation;

#-------------------------------------------------------------------------------
#--- Database creation ---------------------------------------------------------
#-------------------------------------------------------------------------------
create table clients
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

create table voyages
(
    libelle varchar(150) not null,
    descritpion varchar(500) not null,
    duree int not null,
    cout float not null ,
    ref int not null,
    code_pays varchar(2) not null,
    primary key (ref),
    foreign key (code_pays) references pays(code_pays)

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
    primary key (ref,mail),
    foreign key (mail) references clients(mail),
    foreign key (ref) references voyages(ref)
)
    engine = innodb;

#-------------------------------------------------------------------------------
#--- Populate databases --------------------------------------------------------
#-------------------------------------------------------------------------------

set autocommit = 0;
set names utf8;
