CREATE DATABASE db_escola;

USE db_escola;

CREATE TABLE tb_alunos (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(100) NOT NULL,
    matricula VARCHAR(20) UNIQUE NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    status TINYINT NOT NULL,
    genero VARCHAR(20) NOT NULL,
    dataNascimento DATETIME NOT NULL,
    cpf CHAR(11) UNIQUE NOT NULL
);

INSERT INTO tb_alunos(nome, matricula, email, status, genero, dataNascimento, cpf)
VALUES('Maria', '1234', 'maria@email.com', true, 'feminino', '2001-01-12', '01234567890');

SELECT * FROM tb_alunos;