CREATE DATABASE IF NOT EXISTS registro;
USE registro;
CREATE TABLE IF NOT EXISTS tablon(
    id int auto_increment primary key,
    usuario varchar(100),
    correo varchar(100),
    contraseña varchar(100),
    nombre varchar(100),
    apellido varchar(100)
);