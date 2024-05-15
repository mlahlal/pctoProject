/*
create type user_type as enum (
  'delegate',
  'student',
  'teacher',
  'parent'
);

create type school_type as enum (
  'liceo scientifico',
  'liceo classico',
  'liceo linguistico',
  'liceo delle scienze umane',
  'liceo artistico',
  'istituto tecnico tecnologico',
  'istituto tecnico economico',
  'istituto professionale'
);

create type analytic_type as enum (
  'click',
  'contact'
);
*/


create database pcto;
use pcto;

create table if not exists school (
  id_school varchar(255) primary key, -- corrisponde al codice meccanografico
  name varchar(255),
  email varchar(255),
  pec varchar(255),
  website varchar(255),
  -- type school_type,
  province varchar(255),
  mail_domain varchar(255) -- dominio della scuola per collegare automaticamente gli studenti alla scuola
);

create table if not exists users (
  id_user varchar(255) primary key default (uuid()),
  name varchar(64),
  surname varchar(64),
  type varchar(64), -- student, delegate, school
  email varchar(255),
  telephone varchar(255),
  password varchar(255),
  province varchar(255),
  id_school varchar(255),
  id_business varchar(255),
  field_of_study varchar(255),
  foreign key (id_school) references school (id_school),
  foreign key (id_business) references business (id_business)
);

create table if not exists business (
  id_business varchar(255) primary key default (uuid()),
  name varchar(255), -- ragione sociale dell'azienda
  piva varchar(255), -- partita iva
  id_user varchar(255), -- !FOREIGN KEY! rappresentante dell'azienda, colui con cui ci si interfaccia nelle comunicazioni
  field varchar(255), -- ambito economico in cui opera l'azienda (informatica, medicina, agricoltura)
  type varchar(255), -- tipo di azienda (es. cartoleria, fabbrica, negozio vestiti)
  logo varchar(255), -- link al logo (probabilmente salvato in uno storage di supabase)
  email varchar(255),
  telephone varchar(255),
  created_at date,
  nstudent integer,
  region varchar(255),
  province varchar(255),
  city varchar(255),
  address varchar(255),
  postal_code integer,
  house_number integer,
  banner text,
  foreign key (id_user) references users (id_user)
);

create table if not exists project (
  id_project varchar(255) primary key default (uuid()),
  title varchar(255),
  description text,
  accepted boolean,
  id_business varchar(255),
  foreign key (id_business) references business (id_business)
);

create table if not exists requests (
  id_request varchar(255) primary key default (uuid()),
  accepted boolean,
  id_project varchar(255),
  id_user varchar(255),
  foreign key (id_project) references project (id_project),
  foreign key (id_user) references users (id_user)
);

create table if not exists pcto (
  id_pcto varchar(255) primary key default (uuid()),
  id_business varchar(255),
  id_project varchar(255),
  id_user varchar(255),
  foreign key (id_business) references business (id_business),
  foreign key (id_project) references project (id_project),
  foreign key (id_user) references users (id_user)
);

create table if not exists analytic (
  id_analytic varchar(255) primary key default (uuid()),
  --type analytic_type,
  id_business varchar(255),
  id_school varchar(255),
  created_at date,
  foreign key (id_business) references business (id_business),
  foreign key (id_school) references school (id_school)
);


insert into users ( name, surname, email, telephone, password, province, field_of_study ) values ( "Mouad", "Lahlal", "mlahlal@cerebotani.it", "3331767634", "password", "Brescia", "Informatica" );

insert into school values ( "", "IIS Cerebotani", "segreteria@cerebotani.it", "pec@cerebotani.it", "cerebotani.it", "Brescia", "cerebotani.it" );

insert into business ( name, piva, field, type, logo, email, telephone, created_at, nstudent, region, province, city, address, postal_code, house_number, banner ) values ( "Alba Consulting", "0000000000", "Informatica", "Software House", "logo_link", "info@albaconsulting.it", "0301547352", "created_at", "46", "Lombardia", "Brescia", "Brescia", "Via Solferino", "20564", "16", "banner_link" );

-- insert into project