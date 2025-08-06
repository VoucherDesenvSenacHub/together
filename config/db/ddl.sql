--DROP DATABASE IF EXISTS together;

CREATE DATABASE together;
 
USE together;
 
CREATE TABLE ufs(
	id int auto_increment primary key,
    nome varchar(50)
);
 
CREATE TABLE cidades(
	id int auto_increment primary key,
    nome varchar(50),
    id_uf int not null,
    foreign key(id_uf) references ufs(id)
);
 
CREATE TABLE categorias_ongs(
	id int primary key auto_increment,
	nome varchar(50) not null,
	ativo bool not null
);
 
CREATE TABLE patrocinadores(
	id int primary key auto_increment,
	nome varchar(50) not null,
	dt_validade date,
	rede_social text,
	img text,
	ativo bool not null
);
 
CREATE TABLE usuarios(
	id int primary key auto_increment,
	nome varchar(60) not null,
	cpf varchar(11) not null unique,
    email varchar(50) unique not null,
    senha varchar(255) not null,
	data_nascimento date,
	foto_de_perfil text,
	telefone varchar (18) not null,
	ativo bool not null,
	id_uf int,
	id_cidade int,
	foreign key(id_uf) references ufs(id),
	foreign key(id_cidade) references cidades(id)
);
 
 
CREATE TABLE ongs(
	id int primary key auto_increment,
	razao_social varchar(60) not null,
	cnpj varchar(14) not null,
	email varchar(50) not null,
	dt_fundacao date,
	conselho_fiscal text,
	cep varchar(10) not null,
	logradouro varchar(255) not null,
	numero int not null,
	complemento text,
	bairro varchar(255) not null,
	foto_de_perfil text,
	status_validacao text,
	ativo bool not null,
	id_cidade int not null,
	id_uf int not null,
	id_categoria int not null,
	foreign key(id_cidade) references cidades(id),
	foreign key(id_uf) references ufs(id),
	foreign key(id_categoria) references categorias_ongs(id) 
);
 
CREATE TABLE favoritos(
	id int primary key auto_increment,
	id_usuario int not null,
	id_ong int not null,
	foreign key(id_usuario) references usuarios(id),
	foreign key(id_ong) references ongs(id)
);
 
CREATE TABLE doacoes(
	id int primary key auto_increment,
	valor float not null,
	anonimo bool not null,
	id_usuario int not null,
	foreign key(id_usuario) references usuarios(id)
);
 
CREATE TABLE patrocinios(
	id int primary key auto_increment,
	status bool not null,
	dt_inicio date not null,
	dt_conclusao date,
	id_patrocinador int not null,
	id_ong int not null,
	foreign key(id_patrocinador) references patrocinadores(id),
	foreign key(id_ong) references ongs(id)
 
);
 
CREATE TABLE voluntarios(
	id int primary key auto_increment,
	dt_associacao date not null,
	status_validacao varchar(30) not null,
	ativo bool not null,
	id_usuario int not null,
	id_ong int not null,
	foreign key(id_usuario) references usuarios(id)
); 
 
CREATE TABLE postagens(
	id int primary key auto_increment,
	titulo varchar(50) not null,
	dt_postagem date not null,
	descricao text not null,
	imagem_1 text,
	imagem_2 text,
	imagem_3 text,
	id_ong int not null,
	foreign key(id_ong) references ongs(id)
);
