create database sga;
use sga;
create table usuario(
	id int auto_increment not null,
	nome varchar(200) not null,
	email varchar(200) not null,
	senha varchar(200) not null,
	primary key(id)
);
create table logs(
	id int auto_increment not null,
	data_i varchar(200) not null,
	acao varchar(200) not null,
	id_usuario int not null,
	primary key(id),
	foreign key(id_usuario) references usuario(id)
);

create table propriedade(
	id int auto_increment not null,
	rua varchar(200) not null,
	numero varchar(200) not null,
	bairro varchar(200) not null,
	cidade varchar(200) not null,
	cep varchar(200) not null,
	situacao varchar(200) not null,
	observacao varchar(200),
	id_proprietario int not null,
	primary key(id),
	foreign key(id_proprietario) references usuario(id)
);

create table iquilino(
	id int auto_increment not null,
	nome varchar(200) not null,
	email varchar(200) not null,
	telefone varchar(200) not null,
	id_usuario int not null,
	primary key(id),
	foreign key(id_usuario) references usuario(id)
);

create table mensalidade(
	id int auto_increment not null,
	id_iquilino int not null,
	id_propriedade int not null,
	mes varchar(200) not null,
	valor double not null,
	situacao varchar(200),
	primary key(id),
	foreign key(id_iquilino) references iquilino(id),
	foreign key(id_propriedade) references propriedade(id)
);