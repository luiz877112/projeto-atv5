CREATE DATABASE bd_sistema_empresa;
USE bd_sistema_empresa;

CREATE TABLE tb_func (
    matricula INT AUTO_INCREMENT PRIMARY KEY, 
    nome VARCHAR(255) NOT NULL,           
    situacao ENUM('Ativo', 'Inativo') NOT NULL DEFAULT 'Ativo',
    setor ENUM('Financeiro', 'Administrativo', 'Suporte') NOT NULL
);