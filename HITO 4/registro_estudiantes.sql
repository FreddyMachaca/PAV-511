CREATE DATABASE IF NOT EXISTS registro_estudiantes;
USE registro_estudiantes;

-- Crear la tabla de estudiantes
CREATE TABLE IF NOT EXISTS estudiantes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(50) NOT NULL,
    apellidos VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL,
    celular VARCHAR(15) NOT NULL
);

-- Insertar algunos registros de ejemplo
INSERT INTO estudiantes (nombre, apellidos, email, celular) VALUES
('Juan', 'Perez', 'juan@example.com', '123456789'),
('María', 'Gomez', 'maria@example.com', '987654321');