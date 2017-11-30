CREATE DATABASE avaliacao; 

CREATE TABLE tbl_categorias (
    id_categoria int(11) PRIMARY KEY AUTO_INCREMENT,
    nome varchar(255),
    status int(1)
);

CREATE TABLE tbl_clientes(
    id_cliente int(11) PRIMARY KEY AUTO_INCREMENT,
     nome varchar(255), 
    idade int(3),
    telefone varchar(25),
    endereco varchar(255),
    id_categoria int(11),
     FOREIGN KEY (id_categoria) REFERENCES tbl_categoria(id_categoria)
);

