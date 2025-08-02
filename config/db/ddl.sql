CREATE DATABASE together;
 
USE together;
 
CREATE TABLE ufs(
	id int not null auto_increment primary key,
    nome varchar(50)
);
 
CREATE TABLE cidades(
	id int not null auto_increment primary key,
    nome varchar(50),
    id_uf int not null,
    foreign key(id_uf) references ufs(id)
);
 
CREATE TABLE categorias_ongs(
	id int primary key auto_increment,
	nome not null varchar(50),
	ativo not null bool
 
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
	data_nascimento date not null,
	foto_de_perfil text,
	telefone varchar (18) not null,
	email varchar(50) not null,
	ativo bool not null,
	id_uf int not null,
	id_cidade int not null,
	foreign key(id_uf) references ufs(id),
	foreign key(id_cidade) references cidades(id)
);
 
 
CREATE TABLE ongs(
	id int primary key auto_increment,
	razao_social varchar(60) not null,
	cnpj varchar(14) not null,
	email varchar(50) not null,
	dt_fundacao date not null,
	conselho_fiscal text not null,
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
	foreign key(id_categoria) references categorias_ongs(id),
 
);
 
CREATE TABLE favoritos(
	id int primary key auto_increment,
	id_usuario int not null,
	id_ong int not null,
	foreign key(id_usuario) references usuarios(id),
	foreign key(id_ong) references ongs(id)
);
 
CREATE TABLE doacoes(
	id int not primary key auto_increment,
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
	status_validacao bool not null,
	ativo bool not null,
	id_usuario int not null,
	id_ong int not null,
	foreign key(id_ususario) references usuarios(id)
); 
 
CREATE TABLE postagens(
	id int primary key auto_increment,
	titulo varchar(50) not null,
	dt_postagem date not null,
	descricao text,
	imagem_1 text,
	imagem_2 text,
	imagem_3 text,
	id_ong int not null,
	foreign key(id_ong) references ongs(id)
);

CREATE TABLE ongs(
	id int not null auto_increment primary key,
    razao_social varchar(60) not null,
    cnpj varchar(14) not null,
    email varchar(50),
    dt_fundacao date not null,
    conselho_fiscal text,
    foto_de_perfil text,
    status_validacao bool,
    ativo bool,
    id_categoria int,
    id_endereco int,
    foreign key(id_categoria) references categorias_ongs(id),
    foreign key(id_endereco) references enderecos(id)
);
 
CREATE TABLE usuarios (
	id int not null auto_increment primary key,
    nome varchar(60) not null,
    cpf varchar(14) not null,
    data_nascimento date not null,
    foto_de_perfil text,
    telefone varchar(16) not null,
    email varchar(50) not null,
    senha varchar(8) not null,
    ativo bool,
    id_endereco int,
    foreign key(id_endereco) references enderecos(id)
);
 
CREATE TABLE categorias_ongs(
	id int not null auto_increment primary key,
    nome varchar(50),
    ativo bool
); 