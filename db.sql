-- comando para listar os banco de dados --
SHOW DATABASES;

-- para criar um banco de dados --
CREATE DATABASE db_name;

-- para excluir um banco --
DROP DATABASE db_name;

-- para selecionar um banco --
USE db_name; 

-- listar as tabelas de um banco --
SHOW TABLES;

-- para criar uma tabela --
CREATE TABLE tb_contatos (
    id INT(11) UNSIGNED PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(30) NOT NULL,
    email VARCHAR(50),
    telefone VARCHAR(15) NOT NULL,
    data_cadastro VARCHAR(20) NOT NULL
);

-- detalhar a estrutura de uma tabela --
DESC tb_contatos;

-- excluir uma tabela --
DROP TABLE tb_contatos;

-- pra alterar uma tabela, add ou remover colunas --
ALTER TABLE tb_contatos ADD COLUMN cidade VARCHAR(10);
ALTER TABLE tb_contatos DROP COLUMN cidade;