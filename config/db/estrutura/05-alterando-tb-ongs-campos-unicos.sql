CREATE DATABASE together;
 
USE together;

CREATE TABLE enderecos(
	id int primary key auto_increment,
    logradouro varchar(255),
    numero int,
    cep varchar(8),
    complemento text,
    bairro varchar(255),
    cidade varchar(255),
    estado varchar(255)
);

CREATE TABLE imagens(
	id int primary key auto_increment,
    link text not null
);

CREATE TABLE usuarios(
	id int primary key auto_increment,
    nome varchar(60) not null,
    cpf varchar(11) unique not null,
    dt_nascimento date,
    telefone varchar(18) not null,
    email varchar(255) not null unique,
    senha varchar(255) not null,
    ativo bool,
    id_endereco int,
    id_imagem_de_perfil int,
    tipo_perfil varchar(50) not null,
    foreign key (id_endereco) references enderecos(id),
    foreign key (id_imagem_de_perfil) references imagens(id)    
);

CREATE TABLE categorias_ongs(
	id int primary key auto_increment,
    nome varchar(50)
);

CREATE TABLE ongs(
	id int primary key auto_increment,
    id_usuario int unique,
    razao_social varchar(255) unique not null,
    cnpj varchar(14) unique not null,
    dt_fundacao date not null,
    conselho_fiscal text,
    status_validacao bool,
    ativo bool,
    id_endereco int,
    id_categoria int,
    id_imagem_de_perfil int,
    foreign key(id_usuario) references usuarios(id),
    foreign key(id_endereco) references enderecos(id),
    foreign key(id_categoria) references categorias_ongs(id),
    foreign key(id_imagem_de_perfil) references imagens(id));

-- 8 

CREATE TABLE postagens(
	id int primary key auto_increment,
    titulo varchar(50) not null,
    dt_postagem date,
    descricao text,
    id_imagem int,
    id_ong int,
    foreign key(id_imagem) references imagens(id),
    foreign key(id_ong) references ongs(id)
);

-- 9

CREATE TABLE patrocinadores(
	id int primary key auto_increment,
    nome varchar(50),
    dt_validade date,
    rede_social text,
    ativo bool,
    id_imagem_icon int,
    foreign key(id_imagem_icon) references imagens(id)
);

-- 10

CREATE TABLE voluntarios(
	id int primary key auto_increment,
    dt_associacao date,
    status_validacao bool,
    ativo bool,
    id_usuario int,
    id_ong int,
    foreign key(id_usuario) references usuarios(id),
    foreign key(id_ong) references ongs(id)
);

-- 11

CREATE TABLE doacoes(
	id int primary key auto_increment,
    valor float not null,
    anonimo bool not null,
    dt_doacao date,
    id_usuario int,
    id_ong int,
    foreign key(id_usuario) references usuarios(id),
    foreign key(id_ong) references ongs(id)
);
