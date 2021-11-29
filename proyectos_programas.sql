-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-12-2019 a las 02:57:48
-- Versión del servidor: 10.1.28-MariaDB
-- Versión de PHP: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sii2`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proyectos_programas`
--

CREATE TABLE `proyectos_programas` (
  `pro_id` int(11) NOT NULL,
  `pro_nombre` varchar(100) NOT NULL,
  `pro_tipo_id` int(11) NOT NULL,
  `pro_objetivo_general` varchar(500) NOT NULL,
  `pro_objetivos_especificos` varchar(500) NOT NULL,
  `pro_justificacion` varchar(500) NOT NULL,
  `pro_empresa_id` int(11) NOT NULL,
  `pro_fecha_inicio` date NOT NULL,
  `pro_fecha_termino` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `proyectos_programas`
--
ALTER TABLE `proyectos_programas`
  ADD PRIMARY KEY (`pro_id`),
  ADD UNIQUE KEY `pro_tipo_id` (`pro_tipo_id`),
  ADD UNIQUE KEY `pro_empresa_id` (`pro_empresa_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `proyectos_programas`
--
ALTER TABLE `proyectos_programas`
  MODIFY `pro_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
