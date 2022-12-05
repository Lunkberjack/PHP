-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 05-12-2022 a las 17:57:34
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `login`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagen`
--

CREATE TABLE `imagen` (
  `nombre` varchar(100) NOT NULL,
  `nombre_usuario` varchar(83) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `imagen`
--

INSERT INTO `imagen` (`nombre`, `nombre_usuario`) VALUES
('fresquito.webp', 'Könnar'),
('sif.jpg', 'Notsk'),
('Obsidian-1.0.3.AppImage.icon', 'ösdeln');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `nombre` varchar(83) NOT NULL,
  `pass` varchar(83) NOT NULL,
  `savepath` varchar(300) NOT NULL,
  `sessionid` varchar(300) NOT NULL,
  `sessionname` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`nombre`, `pass`, `savepath`, `sessionid`, `sessionname`) VALUES
('Ekaterini', '$2y$10$4RgONKsoO4QQSCkEcP13ee5bBVnWh3EWLlgJPqOEYQcTbp2Hqjuvq', '/opt/lampp/temp/', 'a2ced5c4a5359a8c81fc2adc1c84664c', 'Ekaterini'),
('Könnar', '$2y$10$RBnnXnSXw8rw1ViBBssFbeTatYxCVHjJP4MqEAdf6gPqePgEoLUa.', '/opt/lampp/temp/', '7e2b612484c034240c47d62156119cf6', 'Könnar'),
('Notsk', '$2y$10$URperPXpMjeHz4xudGc8POG9wZaOkJmy0dgIOTaA3aBNpdHJWel5m', '/opt/lampp/temp/', '158af070f6b6898e9b6202e1fb6cfc6b', 'Notsk'),
('Ösdeln', '$2y$10$X0eu7pWc7aESqowWw.e2UO3RVlNm5dRlf83L6jCtUp6.bK9rxEVce', '/opt/lampp/temp/', '2b2076f18d39c84513fcf3d1c32b9086', 'Ösdeln');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `imagen`
--
ALTER TABLE `imagen`
  ADD UNIQUE KEY `nombre` (`nombre`),
  ADD KEY `FK_imagenUsuario` (`nombre_usuario`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`nombre`),
  ADD UNIQUE KEY `nombre` (`nombre`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `imagen`
--
ALTER TABLE `imagen`
  ADD CONSTRAINT `FK_imagenUsuario` FOREIGN KEY (`nombre_usuario`) REFERENCES `usuario` (`nombre`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
