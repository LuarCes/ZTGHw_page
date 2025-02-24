-- Crear la base de datos si no existe
CREATE DATABASE IF NOT EXISTS ztghw;
USE ztghw;

-- Crear la tabla 'productos' si no existe
CREATE TABLE IF NOT EXISTS productos (
    id INT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    precio DECIMAL(10,2) NOT NULL,
    descripcion VARCHAR(255),
    categoria VARCHAR(15),
    stock INT DEFAULT 0,
    destacado BOOLEAN DEFAULT FALSE,
    cantidad INT DEFAULT 1
);

-- Crear la tabla 'users' si no existe
CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    pass VARCHAR(20) NOT NULL
);



-- Visualizar tabla --
SELECT * FROM ztghw.productos;





