create database dbHonkerBurger;

use dbHonkerBurger;	

create table tblFaleConosco (
	idFaleConosco int(11) not null auto_increment primary key,
	nome varchar(200) not null,
    telefone varchar(24) not null,
    celular varchar(24) not null,
    email varchar(200) not null,
    homePage varchar(200),
    linkFacebook varchar(200),
    profissao varchar(100),
    intuito char(1) not null,
    mensagem text not null,
    genero char(1) not null
);

show tables;

select * from tblFaleConosco;

insert into tblFaleConosco (
	nome, telefone, celular, email, homePage,
    linkFacebook, profissao, intuito, mensagem, genero
)
values (
	"Testevaldo", "11 1111-1111", "11 91111-1111", "testevaldo@teste.com", "testevaldo.blog.com",
    "face.com/Testevaldo_Silva", "Tecnico de Informatica", "s",
    "Vocês poderiam adicionar recursos de acessibilidade.", "m"
);

show databases;

select * from tblFaleConosco;

delete from tblFaleConosco where idFaleConosco = 4;

select * from tblFaleConosco where intuito = 's';

show tables;


create table tblNivelAcesso (
	idNivelAcesso int(11) not null auto_increment primary key,
    nomeNivel varchar(200) not null,
    acessoConteudo boolean not null,
    acessoFaleConosco boolean not null,
    acessoProduto boolean not null,
    acessoUsuarios boolean not null
);

create table tblUsuario (
	idUsuario int(11) not null auto_increment primary key,
    nome varchar(200) not null,
    login varchar(200) not null,
    senha varchar(100) not null,
    idNivelAcesso int(11) not null,
    constraint FK_idNivelAcesso_tblUsuario foreign key (idNivelAcesso)
    references tblNivelAcesso (idNivelAcesso)
);

insert into tblNivelAcesso (
	nomeNivel, acessoConteudo, acessoFaleConosco, acessoProduto, acessoUsuarios)
    values (
		'Nivel de teste', '1', '1', '1', '1');

insert into tblNivelAcesso (
	nomeNivel, acessoConteudo, acessoFaleConosco, acessoProduto, acessoUsuarios)
    values (
		'Nivel aluno', '1', '0', '0', '0');

select * from tblNivelAcesso;

insert into tblUsuario (
	nome, login, senha, idNivelAcesso) 
    values (
		'Teste', 'teste', '123', '1');

insert into tblUsuario (
	nome, login, senha, idNivelAcesso) 
    values (
		'Convidado', 'aluno', '123', '2');
        
select * from tblUsuario;

show tables;

delete from tblNivelAcesso where idNivelAcesso = 2;

create table tblConteudo (
	idConteudo int(11) not null auto_increment primary key,
    titulo varchar(200),
    imagem varchar(200),
    texto text not null,
    visibilidade boolean not null,
    destino char(1) not null
);

select * from tblConteudo;

insert into tblConteudo ( titulo, imagem, texto, visibilidade, destino )
	values ( 'Teste titulo', '69a06e118e55974cf439146ea8f4b26a.png', 'Teste texto que seja grande pelo menos um pouco', 1, 'c' );
    
update tblConteudo set imagem = '69a06e118e55974cf439146ea8f4b26a.png' where idConteudo = 1;

update tblConteudo set visibilidade = 0 where idConteudo = 1;

delete from tblConteudo where idConteudo = 3;