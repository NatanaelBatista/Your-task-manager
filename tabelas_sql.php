<?php 
create table usuarios(
	id int not null AUTO_INCREMENT PRIMARY KEY,
	nome varchar(40) not null,
	login varchar(40) not null,
	senha varchar(10) not null,
	dataCadastro varchar(10) not null,
	perfil int not null
	)


create table tarefas(
	id int not null AUTO_INCREMENT PRIMARY KEY,
	titulo varchar(50) not null,
	texto text not null,
	vinculoUsuario int not null,
	dataCadastro varchar(10) not null,
	fazer int null,
    sendoFeita int null,
    feita int null,
    dataAcao varchar(10) null,
    criadorDaTarefa int not null
	)


alter table tarefas
add foreign key fk_criador_da_tarefa ( criadorDaTarefa )
references usuarios ( id )


alter table tarefas
add foreign key fk_quem_vai_fazer_a_tarefa ( vinculoUsuario )
references usuarios ( id )



create table usuariosOnline(
	id int null AUTO_INCREMENT PRIMARY KEY,
	idUsuarioOnline int null,
	)



create table recados (
	id int not null AUTO_INCREMENT PRIMARY KEY,
	idUsuarioMandouRecado int not null,
	dataRecado varchar(10) not null,
	recado text not null
	)
?>

