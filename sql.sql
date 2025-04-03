create database if not exists desenvolvimento;

use desenvolvimento;

create table if not exists usuario(
	id int auto_increment not null primary key,
	nome varchar(150) not null,
	email varchar(150) not null,
	senha varchar(100) not null
);

create table if not exists usuario_cargo(
	id int auto_increment not null primary key,
	descricao varchar(100) not null
);

alter table usuario
add unique (email), add unique (ID); 

alter table usuario
add column cargo int;

alter table usuario
add foreign key (cargo) references usuario_cargo (id);