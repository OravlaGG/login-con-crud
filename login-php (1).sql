-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-01-2026 a las 16:23:19
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `login-php`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tripulantes`
--

CREATE TABLE `tripulantes` (
  `numTri` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `apellidos` varchar(60) NOT NULL,
  `fechaNacimiento` datetime NOT NULL,
  `submarino` varchar(60) NOT NULL,
  `viaja` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tripulantes`
--

INSERT INTO `tripulantes` (`numTri`, `nombre`, `apellidos`, `fechaNacimiento`, `submarino`, `viaja`) VALUES
(9, 'Angel', 'Barba Fernondo', '2000-01-13 18:30:41', 'Balaro', 1),
(11, 'Juan', 'Garcí', '2000-10-10 00:00:00', 'Seawolf', 0),
(12, 'Kiko', 'Gonzalez Moromana', '2000-02-01 00:00:00', 'Iowa', 1),
(13, 'Pepe', 'Perez', '2002-12-10 00:00:00', 'King', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `coduser` int(11) NOT NULL,
  `idusuario` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `apellidos` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`coduser`, `idusuario`, `password`, `nombre`, `apellidos`) VALUES
(11, 'Alvaro', '$2y$10$ztODERf/AGuaj1dYjjAB3eqoc4cl09ziTD7LGF.seSuXG0OxFoFz.', 'Alvaro', 'Gomez Gozalez');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tripulantes`
--
ALTER TABLE `tripulantes`
  ADD PRIMARY KEY (`numTri`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`coduser`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tripulantes`
--
ALTER TABLE `tripulantes`
  MODIFY `numTri` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
