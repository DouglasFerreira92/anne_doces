
create table tb_admin(

	idadmin int not null primary key auto_increment,
    desnome varchar(40) not null ,
    deslogin varchar(30) not null,
    dessenha varchar(256) not null,
    inadmin boolean not null
    
)ENGINE=INNODB DEFAULT CHARSET=UTF8;



create table tb_client(

	idclient int not null primary key auto_increment,
    desnome varchar(40) not null,
    destel varchar(14) not null,
    cdate DATE DEFAULT CURRENT_TIMESTAMP
    
)ENGINE=INNODB DEFAULT CHARSET=UTF8;

create table tb_ender(

	idender int not null auto_increment primary key,
    descidade varchar(40)not null,
    desrua varchar(30) not null,
    desnum varchar(10)
    
)ENGINE=INNODB DEFAULT CHARSET=UTF8;

create table tb_compra(

    idcompra int not null primary key auto_increment ,
	descricao varchar(500) not null,
    desqtn varchar(10) not null,
    desvalor varchar(10) not null,
    vdate DATE DEFAULT CURRENT_TIMESTAMP
    
    
)ENGINE=INNODB DEFAULT CHARSET=UTF8;

ALTER TABLE tb_client 
ADD COLUMN fidender int ;

ALTER TABLE tb_client
ADD FOREIGN KEY (fidender)
REFERENCES tb_ender(idender);

ALTER TABLE tb_compra
ADD COLUMN fidclient int;

ALTER TABLE tb_compra
ADD FOREIGN KEY (fidclient)
REFERENCES tb_client(idclient);
