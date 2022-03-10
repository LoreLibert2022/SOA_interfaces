-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 03-02-2022 a las 10:12:05
-- Versión del servidor: 10.3.16-MariaDB
-- Versión de PHP: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `di21`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `menu`
--

CREATE TABLE menu (
    id_Opcion int NOT NULL AUTO_INCREMENT,
    Nombre varchar(20) NOT NULL,
    id_Padre int,
	activo VARCHAR2(1);
    PRIMARY KEY (id_Opcion)
);

--
-- Volcado de datos para la tabla `menu`
--

INSERT INTO menu(Nombre, id_Padre, activo) VALUES ("Inicio",0, "S");
INSERT INTO menu(Nombre, id_Padre, activo) VALUES ("Contacto",0, "S");
INSERT INTO menu(Nombre, id_Padre, activo) VALUES ("Categorías",0, "S");
INSERT INTO menu(Nombre, id_Padre, activo) VALUES ("Mtto. Datos",0, "S");
INSERT INTO menu(Nombre, id_Padre, activo) VALUES ("Perfumería",3, "S");
INSERT INTO menu(Nombre, id_Padre, activo) VALUES ("Conservas",3, "S");
INSERT INTO menu(Nombre, id_Padre, activo) VALUES ("Limpieza",3, "S");
INSERT INTO menu(Nombre, id_Padre, activo) VALUES ("Productos",4, "S");
INSERT INTO menu(Nombre, id_Padre, activo) VALUES ("Categorias",4, "S");
INSERT INTO menu(Nombre, id_Padre, activo) VALUES ("Ofertas",4, "S");
