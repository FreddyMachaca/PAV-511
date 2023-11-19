CREATE DATABASE Restaurante;
USE Restaurante;

CREATE TABLE Empleado (
    Id INT AUTO_INCREMENT PRIMARY KEY,
    Nombre VARCHAR(255),
    Apellidos VARCHAR(255),
    Cargo VARCHAR(255),
    Dirección VARCHAR(255),
    Teléfono VARCHAR(20),
    Salario DECIMAL(10, 2)
);

-- Insertar los datos en la tabla Empleado
INSERT INTO Empleado (Nombre, Apellidos, Cargo, Dirección, Teléfono, Salario) VALUES
    ('Juan', 'Perez', 'Mensajero', 'San Pedro', '75248567', 2000.00),
    ('Marcela', 'Quenta', 'Secretaria', 'Villa Fátima', '78245524', 3500.00),
    ('Miguel', 'Perez', 'Sistemas', 'San Pedro', '75422548', 2500.00),
    ('Ximena', 'Lopez', 'Sistemas', '16 de Julio', '62564847', 3000.00),
    ('Jorge', 'Tellez', 'Contabilidad', 'San Pedro', '72035548', 0.00),
    ('Marcela', 'Yepez', 'Marketing', 'Ciudad Satélite', '71252653', 1500.00),
    ('Juan', 'Loza', 'Contabilidad', '16 de Julio', '62354585', 2000.00),
    ('María', 'Lopez', 'Marketing', 'San Pedro', '62458662', 500.00);

CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre_usuario VARCHAR(255) NOT NULL,
    contraseña VARCHAR(255) NOT NULL,
    nombre_completo VARCHAR(255),
    email VARCHAR(255)
);

-- Insertar los datos en la tabla usuarios
INSERT INTO usuarios (nombre_usuario, contraseña, nombre_completo, email) VALUES
    ('admin', 'admin', 'Administrador', 'admin@gmail.com');

INSERT INTO usuarios (nombre_usuario, contraseña, nombre_completo, email) VALUES
    ('usuario', 'usuario', 'Usuario', 'usuario@gmail.com');

select *
from usuarios;

