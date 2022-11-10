-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 10-11-2022 a las 23:09:11
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
('Iris', '$2y$10$4eq8KryY9x.QLP7KDAuDFOi0Od0CV/hZPdc9OC/sisghTmSdTE6Em', '/opt/lampp/temp/', '5764d683a4913c6397f65926f97add22', 'Iris'),
('Laiss', '$2y$10$t1yiZwjYoVtyq7cCVjzQM.8Q4XxTW8.P/e5RssjSfR.YbyD5rZpYG', '/opt/lampp/temp/', '3c1a2fee6960450811f24d6ad1ca9669', 'Laiss'),
('Notsk', '$2y$10$ge15pWgweJ0HOkNnjd7oa.pThPbFDgaedHXCldUylIbtX6ObjbVtC', '/opt/lampp/temp/', '173fe10b7c5d1324c16211e598de0665', 'Notsk'),
('Ösdeln', '$2y$10$X0eu7pWc7aESqowWw.e2UO3RVlNm5dRlf83L6jCtUp6.bK9rxEVce', '/opt/lampp/temp/', '2b2076f18d39c84513fcf3d1c32b9086', 'Ösdeln'),
('Therthes', '$2y$10$VJUhGVskTgB.2blt6xdNIOyQPxBcGOMVBqr1e5aHUIV0AyNZNo57e', '/opt/lampp/temp/', 'ba542dd4de1068ecd7c1143f09f65910', 'PHPSESSID'),
('Vargann', '$2y$10$7M3TuHBCaDiXlSujMklosef9sYYgR15grwdnXe9PXLUny5NBF3Yvq', '/opt/lampp/temp/', 'd34580e9776ad9aa934d4f4cdb7cf1b6', 'Vargann');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`nombre`),
  ADD UNIQUE KEY `nombre` (`nombre`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
