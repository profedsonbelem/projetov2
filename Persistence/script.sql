drop database BDRel;
create database BDRel;
use BDRel;
 
drop table user;
create table user(id  int primary key auto_increment,
 nome varchar (50) not null,
 senha varchar (250) not null,
 email varchar (50) unique not null
  );







create table aluno(idAluno  int primary key auto_increment,
 nome varchar (50),
 nomeCompleto varchar (50),
 email varchar (50) unique,
 perfil  int,
 senha varchar (250),
 disciplina varchar (50) default 'none',
 nota1 double default 0,
 nota2 double default 0,
 id_user int,
foreign key (id_user) references user(id)  on delete cascade 
);


 




delimiter $$
create trigger gatInsertUSer
after insert on user
 for each row
 begin
  set @numero =2;
    insert into aluno (nome,nomecompleto,email,perfil,senha,id_user)
          values (new.nome,new.nomeCompleto ,new.email, @numero ,
            md5(new.senha), new.id );
 end;
 $$
delimiter ;
 

insert into user values (10,'lu','luciana','lu@gmail.com', 1, md5('123456'));


# usuario e independente 
# aluno depende

 


 SET FOREIGN_KEY_CHECKS = 1;


select * from user;
select * from aluno;
