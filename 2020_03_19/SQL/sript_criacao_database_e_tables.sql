# Criação do Database Contatos.
create database dbContatos20201B;

# Ativa o database a ser utilizado.
use dbcontatos20201B;

# Cria a tabela de estados (tblEstados) dentro do database dbcontatos20201B,
#lembrando que antes foi necessário entrar nele.
create table tblEstados(
	idEstado int not null auto_increment primary key,
    sigla varchar(2) not null,
    nome varchar(100) not null
);

# Cria a tabela de contatos
create table tblContatos(
	idContato int not null auto_increment,
    nome varchar(100) not null,
    endereco varchar(150),
    bairro varchar(50),
    cep varchar(10),
    idEstado int not null,
    telefone varchar(14) not null,
    celular varchar(15) not null,
    email varchar(100) not null,
    dtNasc date not null,
    sexo varchar(1) not null,
    obs text,
	primary key (idContato),
    constraint FK_estados_contatos foreign key (idEstado)
    references tblEstados (idEstado)
);

show tables;