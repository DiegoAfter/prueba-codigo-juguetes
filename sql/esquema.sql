CREATE DATABASE catalogo_juguetes;
USE catalogo_juguetes;

CREATE TABLE juguetes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100),
    descripcion TEXT,
    genero VARCHAR(10), -- 'niño', 'niña'
    imagen_url VARCHAR(255)
);

INSERT INTO juguetes (nombre, descripcion, genero, imagen_url) VALUES
('Auto', 'Auto rápido de carreras', 'niño', 'img/auto.png'),
('Muñeca', 'Muñeca para jugar', 'niña', 'img/muñeca.png');
