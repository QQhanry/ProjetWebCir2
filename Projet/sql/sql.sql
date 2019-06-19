/*==============================================================*/
/* Nom de SGBD :  Sybase SQL Anywhere 12                        */
/* Date de création :  19/06/2019 11:05:30                      */
/*==============================================================*/


if exists(select 1 from sys.sysforeignkey where role='FK_INSCRIPT_INSCRIPTI_CLIENT') then
    alter table INSCRIPTION
       delete foreign key FK_INSCRIPT_INSCRIPTI_CLIENT
end if;

if exists(select 1 from sys.sysforeignkey where role='FK_INSCRIPT_INSCRIPTI_VOYAGE') then
    alter table INSCRIPTION
       delete foreign key FK_INSCRIPT_INSCRIPTI_VOYAGE
end if;

if exists(select 1 from sys.sysforeignkey where role='FK_VOYAGE_A_LIEU_PAYS') then
    alter table VOYAGE
       delete foreign key FK_VOYAGE_A_LIEU_PAYS
end if;

drop index if exists CLIENT.CLIENT_PK;

drop table if exists CLIENT;

drop index if exists INSCRIPTION.INSCRIPTION2_FK;

drop index if exists INSCRIPTION.INSCRIPTION_FK;

drop index if exists INSCRIPTION.INSCRIPTION_PK;

drop table if exists INSCRIPTION;

drop index if exists PAYS.PAYS_PK;

drop table if exists PAYS;

drop index if exists VOYAGE.A_LIEU_FK;

drop index if exists VOYAGE.VOYAGE_PK;

drop table if exists VOYAGE;

/*==============================================================*/
/* Table : CLIENT                                               */
/*==============================================================*/
create table CLIENT 
(
   NOM                  varchar                        null,
   PRENOM               varchar                        null,
   DATE_DE_NAISSANCE    date                           null,
   TELEPHONE            integer                        null,
   ADRESSE              varchar                        null,
   MAIL                 varchar                        not null,
   constraint PK_CLIENT primary key (MAIL)
);

/*==============================================================*/
/* Index : CLIENT_PK                                            */
/*==============================================================*/
create unique index CLIENT_PK on CLIENT (
MAIL ASC
);

/*==============================================================*/
/* Table : INSCRIPTION                                          */
/*==============================================================*/
create table INSCRIPTION 
(
   MAIL                 varchar                        not null,
   "REFERENCE"          integer                        not null,
   DATE_DE_DEPART       date                           null,
   DATE_DE_RETOUR       date                           null,
   MONTANT              float                          null,
   VALIDATION           smallint                       null,
   constraint PK_INSCRIPTION primary key clustered (MAIL, "REFERENCE")
);

/*==============================================================*/
/* Index : INSCRIPTION_PK                                       */
/*==============================================================*/
create unique clustered index INSCRIPTION_PK on INSCRIPTION (
MAIL ASC,
"REFERENCE" ASC
);

/*==============================================================*/
/* Index : INSCRIPTION_FK                                       */
/*==============================================================*/
create index INSCRIPTION_FK on INSCRIPTION (
MAIL ASC
);

/*==============================================================*/
/* Index : INSCRIPTION2_FK                                      */
/*==============================================================*/
create index INSCRIPTION2_FK on INSCRIPTION (
"REFERENCE" ASC
);

/*==============================================================*/
/* Table : PAYS                                                 */
/*==============================================================*/
create table PAYS 
(
   NOM_PAYS             varchar                        not null,
   constraint PK_PAYS primary key (NOM_PAYS)
);

/*==============================================================*/
/* Index : PAYS_PK                                              */
/*==============================================================*/
create unique index PAYS_PK on PAYS (
NOM_PAYS ASC
);

/*==============================================================*/
/* Table : VOYAGE                                               */
/*==============================================================*/
create table VOYAGE 
(
   LIBELLE              varchar                        null,
   DESCRIPTION          varchar                        null,
   DUREE                integer                        null,
   COUT                 float                          null,
   "REFERENCE"          integer                        not null,
   NOM_PAYS             varchar                        not null,
   constraint PK_VOYAGE primary key ("REFERENCE")
);

/*==============================================================*/
/* Index : VOYAGE_PK                                            */
/*==============================================================*/
create unique index VOYAGE_PK on VOYAGE (
"REFERENCE" ASC
);

/*==============================================================*/
/* Index : A_LIEU_FK                                            */
/*==============================================================*/
create index A_LIEU_FK on VOYAGE (
NOM_PAYS ASC
);

alter table INSCRIPTION
   add constraint FK_INSCRIPT_INSCRIPTI_CLIENT foreign key (MAIL)
      references CLIENT (MAIL)
      on update restrict
      on delete restrict;

alter table INSCRIPTION
   add constraint FK_INSCRIPT_INSCRIPTI_VOYAGE foreign key ("REFERENCE")
      references VOYAGE ("REFERENCE")
      on update restrict
      on delete restrict;

alter table VOYAGE
   add constraint FK_VOYAGE_A_LIEU_PAYS foreign key (NOM_PAYS)
      references PAYS (NOM_PAYS)
      on update restrict
      on delete restrict;

