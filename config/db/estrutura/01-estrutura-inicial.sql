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
    dt_criacao date,
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

CREATE TABLE ongs (
    id INT PRIMARY KEY AUTO_INCREMENT,
    id_usuario INT UNIQUE,
    razao_social VARCHAR(255) UNIQUE NOT NULL,
    cnpj VARCHAR(14) UNIQUE NOT NULL,
    telefone varchar(18) not null,
    dt_criacao DATE NOT NULL DEFAULT (CURDATE()),
    status_validacao ENUM('pendente', 'aprovado', 'rejeitado') DEFAULT 'pendente',
    ativo BOOLEAN DEFAULT TRUE,
    id_endereco INT,
    id_categoria INT,
    id_imagem_de_perfil INT,
    FOREIGN KEY(id_usuario) REFERENCES usuarios(id),
    FOREIGN KEY(id_endereco) REFERENCES enderecos(id),
    FOREIGN KEY(id_categoria) REFERENCES categorias_ongs(id),
    FOREIGN KEY(id_imagem_de_perfil) REFERENCES imagens(id)
);


-- 8 

CREATE TABLE postagens(
	id int primary key auto_increment,
    titulo varchar(50) not null,
    dt_postagem date,
    descricao text,
    link text,
    id_imagem int,
    id_ong int,
    foreign key(id_imagem) references imagens(id),
    foreign key(id_ong) references ongs(id)
);

-- 9

CREATE TABLE patrocinadores(
	id int primary key auto_increment,
    nome varchar(50),
    dt_criacao date,
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


-- 12 

CREATE TABLE desenvolvedores(
    id int primary key,
    nome varchar(127),
    link_github varchar(255),
    link_linkedin varchar(255),
    link_foto varchar(255)
);