create database if not exists crud_dikdas2021;

use crud_dikdas2021;

create table if not exists akun (
id int(11) not null auto_increment,
nama varchar(100) not null,
email varchar(100) not null,
mobile varchar(20) not null,
password varchar(20) not null,
primary key (id)
);

alter table akun add column hobi varchar(100);

alter table akun add column jsnKel bool after nama;

