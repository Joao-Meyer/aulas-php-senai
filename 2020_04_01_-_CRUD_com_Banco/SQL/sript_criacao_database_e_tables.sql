# Criando o database 
create database dbContatos20201A;

# Ativa a database a ser utilizada
use dbContatos20201A;

# Cria a tabela de estados
create table tblEstados(
	idEstado int not null auto_increment primary key,
    sigla varchar(2) not null,
    nome varchar(100) not null
);

# Cria a tabela de contatos
create table tblContatos(
	idContato int auto_increment not null,
    nome varchar(100) not null,
    endereco varchar(150),
    bairro varchar(50),
    cep varchar(10),
    idEstado int not null,
    telefone varchar(14) not null,
    celular varchar(15) not null,
    email varchar(100) not null,
    dtNasc date not null,
    sexo varchar(1),
    obs text,
    primary key (idContato),
    
    constraint FK_estados_contatos
    foreign key (idEstado)
    references tblEstados (idEstado)
);

# Permite visualizar todas as tabelas que foram criadas no DataBase
show tables;

# Permite visualizar a estrutura de uma tabela
desc tblContatos;

# Para visualizar os dados da tabela temos várias opções:
# Op1:
select * from tblEstados;

# Op2:
select tblEstados.* from tblEstados;

# Op3:
select tblEstados.idEstado, tblEstados.sigla, tblEstados.nome from tblEstados;

# Op4:
select idEstado, sigla, nome from tblEstados;

# Inserindo dados dentro de uma tabela
insert into tblEstados ( sigla, nome ) values ( 'RJ', 'Rio de Janeiro' );

select tblEstados.* from tblEstados;

# Deletando dados de dentro da tabela
delete from tblEstados where idEstado = 2;

# Atualizando dado de dentro da tabela
update tblEstados set nome = 'SÃO PAULO' where idEstado = 1;

# Inserindo dados dentro de uma tabela EM UPPER CASE
insert into tblEstados ( sigla, nome ) values ( 'RJ', ucase('Rio de Janeiro') );

# CRUD ( CREATE, READ, UPDATE, DELETE )

# Script para permitir o acesso direto da aplicação com o usuário ROOT
ALTER USER 'root'@'localhost' IDENTIFIED WITH mysql_native_password BY 'bcd127';

