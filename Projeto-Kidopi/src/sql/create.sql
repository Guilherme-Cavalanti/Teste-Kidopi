-- Criar o banco de dados se ainda não existir
CREATE DATABASE IF NOT EXISTS Projeto_Kidopi;

-- Usar o banco de dados criado
USE Projeto_Kidopi;

-- Criar a tabela
CREATE TABLE IF NOT EXISTS Acessos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    data DATE,
    hora TIME,
    pais VARCHAR(50)
);

-- Exemplos de valores
INSERT INTO Acessos (data, hora, pais) VALUES
('2024-04-07', '12:30:00', 'Brasil'),
('2024-04-07', '13:45:00', 'Australia'),
('2024-04-07', '15:00:00', 'Canada');