CREATE DATABASE IF NOT EXISTS provap1;
USE provap1;

CREATE TABLE IF NOT EXISTS Canetas (
    can_cod INT AUTO_INCREMENT PRIMARY KEY,
    can_descricao VARCHAR(30),
    can_marca VARCHAR(15),
    can_preco FLOAT,
    can_cor VARCHAR(15)
);