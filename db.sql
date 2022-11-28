CREATE DATABASE db_escola;

USE db_escola;

CREATE TABLE tb_alunos (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(100) NOT NULL,
    matricula VARCHAR(20) UNIQUE NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    status TINYINT NOT NULL,
    genero VARCHAR(100) NOT NULL,
    dataNascimento DATE NOT NULL,
    cpf CHAR(11) UNIQUE NOT NULL
);


INSERT INTO tb_alunos(nome, matricula, email, status, genero, dataNascimento, cpf)
VALUES('Maria', '1234', 'maria@email.com', true, 'feminino', '2001-01-12', '01234567890');

SELECT * FROM tb_alunos;

CREATE TABLE tb_professores (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(100) NOT NULL,
    cpf CHAR(11) UNIQUE NOT NULL,
    endereco VARCHAR(100) NOT NULL,
    formacao VARCHAR(100) NOT NULL,
    status TINYINT NOT NULL,
    horariosDisponiveis VARCHAR(100) NOT NULL
);

INSERT INTO tb_professores(nome, cpf, endereco, formacao, status, horariosDisponiveis)
VALUES ('João', '09876543210', 'Rua Teste, 2000', 'Analista de sistema', true, '00-00-00');

CREATE TABLE tb_cursos (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(100) NOT NULL,
    cargaHoraria VARCHAR(100) NOT NULL,
    descricao VARCHAR(100) NOT NULL,
    status TINYINT NOT NULL,
    categoria_id INT NOT NULL,
    FOREIGN KEY (categoria_id) REFERENCES tb_categorias(id)
);

CREATE TABLE tb_categorias (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(100) NOT NULL
);


CREATE TABLE tb_usuarios (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    senha VARCHAR(255) NOT NULL,
    perfil VARCHAR(100) NOT NULL
);


