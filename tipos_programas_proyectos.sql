-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-12-2019 a las 02:58:09
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
-- Estructura de tabla para la tabla `tipos_programas_proyectos`
--

CREATE TABLE `tipos_programas_proyectos` (
  `tipo_pro_id` int(11) NOT NULL,
  `tipo_pro_nombre` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tipos_programas_proyectos`
--

INSERT INTO `tipos_programas_proyectos` (`tipo_pro_id`, `tipo_pro_nombre`) VALUES
(1, 'Residencia Profesional'),
(2, 'Servicio Social'),
(3, 'Modelo dual');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tipos_programas_proyectos`
--
ALTER TABLE `tipos_programas_proyectos`
  ADD PRIMARY KEY (`tipo_pro_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tipos_programas_proyectos`
--
ALTER TABLE `tipos_programas_proyectos`
  MODIFY `tipo_pro_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
