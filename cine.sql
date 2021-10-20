-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 19-10-2021 a las 18:41:18
-- Versión del servidor: 5.7.21
-- Versión de PHP: 5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `cine`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actores`
--

DROP TABLE IF EXISTS `actores`;
CREATE TABLE IF NOT EXISTS `actores` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `actores`
--

INSERT INTO `actores` (`id`, `nombre`) VALUES
(1, 'Kang-ho Song'),
(2, 'Sun-kyun Lee'),
(3, 'Yeo-jeong Cho'),
(4, 'Viggo Mortensen'),
(5, 'Mahershala Ali'),
(6, 'Linda Cardellini'),
(7, 'Sally Hawkins'),
(8, 'Octavia Spencer'),
(9, 'Michael Shannon'),
(10, 'Naomie Harris'),
(11, 'Trevante Rhodes'),
(12, 'Mark Ruffalo'),
(13, 'Michael Keaton'),
(14, 'Rachel McAdams'),
(15, 'Zach Galifianakis'),
(16, 'Edward Norton'),
(17, 'Chiwetel Ejiofor'),
(18, 'Michael Kenneth Williams'),
(19, 'Michael Fassbender'),
(20, 'Ben Affleck'),
(21, 'Brian Cranston'),
(22, 'John Goodman'),
(23, 'Jean Dujardin'),
(24, 'Berénice Bejo'),
(25, 'Colin Firth'),
(26, 'Geoffrey Rush'),
(27, 'Helena Bonham Carter'),
(28, 'Frances McDormand'),
(29, 'David Strathairn'),
(30, 'Linda May');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actorespelicula`
--

DROP TABLE IF EXISTS `actorespelicula`;
CREATE TABLE IF NOT EXISTS `actorespelicula` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idactor` int(11) NOT NULL,
  `idpelicula` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idactor` (`idactor`),
  KEY `idpelicula` (`idpelicula`),
  KEY `idactor_2` (`idactor`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `actorespelicula`
--

INSERT INTO `actorespelicula` (`id`, `idactor`, `idpelicula`) VALUES
(1, 1, 1),
(2, 2, 1),
(3, 3, 1),
(4, 4, 2),
(5, 5, 2),
(6, 6, 2),
(9, 7, 4),
(10, 8, 4),
(11, 9, 4),
(16, 5, 5),
(17, 10, 5),
(18, 11, 5),
(19, 12, 8),
(20, 13, 8),
(21, 14, 8),
(22, 13, 9),
(23, 15, 9),
(24, 16, 9),
(25, 17, 10),
(26, 18, 10),
(27, 19, 10),
(28, 20, 11),
(29, 21, 11),
(30, 22, 11),
(31, 23, 12),
(32, 24, 12),
(33, 22, 12),
(34, 25, 13),
(35, 26, 13),
(36, 27, 13),
(37, 28, 14),
(38, 29, 14),
(39, 30, 14);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

DROP TABLE IF EXISTS `categorias`;
CREATE TABLE IF NOT EXISTS `categorias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `nombre`) VALUES
(1, 'Drama'),
(2, 'Biografía'),
(3, 'Fantasía'),
(4, 'Comedia'),
(5, 'Animación');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `directores`
--

DROP TABLE IF EXISTS `directores`;
CREATE TABLE IF NOT EXISTS `directores` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `directores`
--

INSERT INTO `directores` (`id`, `nombre`) VALUES
(1, 'Bong Joon-ho'),
(2, 'Peter Farrely'),
(3, 'Guillermo del Toro'),
(4, 'Barry Jenkins'),
(5, 'Tom McCarthy'),
(6, 'Alejandro González Iñárritu'),
(7, 'Steve McQueen'),
(8, 'Ben Affleck'),
(9, 'Tom Hopper'),
(10, 'Michel Hazanavicius'),
(11, 'Chloé Zhao');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `peliculas`
--

DROP TABLE IF EXISTS `peliculas`;
CREATE TABLE IF NOT EXISTS `peliculas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(30) NOT NULL,
  `anio` int(11) NOT NULL,
  `duracion` int(11) NOT NULL,
  `idDirector` int(11) NOT NULL,
  `IMDB` decimal(10,2) NOT NULL,
  `idCategoria` int(11) NOT NULL,
  `caratula` varchar(50) NOT NULL,
  `cantidad` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idDirector` (`idDirector`),
  KEY `idCategoria` (`idCategoria`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `peliculas`
--

INSERT INTO `peliculas` (`id`, `nombre`, `anio`, `duracion`, `idDirector`, `IMDB`, `idCategoria`, `caratula`, `cantidad`) VALUES
(1, 'Parasite', 2019, 132, 1, '8.60', 3, 'parasite.jpg', 100),
(2, 'Green Book', 2018, 130, 2, '8.20', 2, 'greenbook.jpg', 100),
(4, 'La forma del agua', 2017, 123, 3, '7.30', 3, 'laformadelagua.jpg', 100),
(5, 'Moonlight', 2016, 111, 4, '7.40', 1, 'moonlight.jpg', 100),
(8, 'Spotlight', 2015, 139, 5, '8.10', 2, 'spotlight.jpg', 100),
(9, 'Birdman', 2014, 119, 6, '7.70', 4, 'birdman.jpg', 100),
(10, '12 años de esclavitud', 2013, 134, 7, '8.10', 2, '12aniosesclavitud.jpg', 99),
(11, 'Argo', 2012, 120, 8, '7.70', 1, 'argo.jpg', 98),
(12, 'El Artista', 2011, 100, 10, '7.90', 4, 'theartist.jpg', 100),
(13, 'El discurso del rey', 2010, 118, 9, '8.00', 1, 'eldiscursodelrey.jpg', 99),
(14, 'Nomadland', 2020, 107, 11, '7.40', 1, 'Nomadland.jpg', 100);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reservas`
--

DROP TABLE IF EXISTS `reservas`;
CREATE TABLE IF NOT EXISTS `reservas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idUsuario` int(11) NOT NULL,
  `fecha` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idUsuario` (`idUsuario`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `reservas`
--

INSERT INTO `reservas` (`id`, `idUsuario`, `fecha`) VALUES
(1, 14, '2021-10-19');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `respeliculas`
--

DROP TABLE IF EXISTS `respeliculas`;
CREATE TABLE IF NOT EXISTS `respeliculas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idReserva` int(11) NOT NULL,
  `idPelicula` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idPelicula` (`idPelicula`),
  KEY `idReserva` (`idReserva`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `respeliculas`
--

INSERT INTO `respeliculas` (`id`, `idReserva`, `idPelicula`, `cantidad`) VALUES
(1, 1, 10, 1),
(2, 1, 11, 2),
(3, 1, 13, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(8) NOT NULL,
  `clave` varchar(32) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `usuario`, `clave`, `nombre`, `email`) VALUES
(4, 'david', '80d01b9b48225f2666a6f68f324cd1b9', 'Sklar David', 'sklar@gmail.com'),
(5, 'adam', '1d7c2923c1684726dc23d2901c4d8157', 'Trachtemberg Adam', 'adam@gmail.com'),
(14, 'luis', '2db95e8e1a9267b7a1188556b2013b33', 'Tettamanti Luis Eduardo', 'ltettamanti@hotmail.com');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `actorespelicula`
--
ALTER TABLE `actorespelicula`
  ADD CONSTRAINT `actorespelicula_ibfk_1` FOREIGN KEY (`idpelicula`) REFERENCES `peliculas` (`id`),
  ADD CONSTRAINT `actorespelicula_ibfk_2` FOREIGN KEY (`idactor`) REFERENCES `actores` (`id`);

--
-- Filtros para la tabla `peliculas`
--
ALTER TABLE `peliculas`
  ADD CONSTRAINT `peliculas_ibfk_2` FOREIGN KEY (`idDirector`) REFERENCES `directores` (`id`),
  ADD CONSTRAINT `peliculas_ibfk_3` FOREIGN KEY (`idCategoria`) REFERENCES `categorias` (`id`);

--
-- Filtros para la tabla `reservas`
--
ALTER TABLE `reservas`
  ADD CONSTRAINT `reservas_ibfk_2` FOREIGN KEY (`idUsuario`) REFERENCES `usuarios` (`id`);

--
-- Filtros para la tabla `respeliculas`
--
ALTER TABLE `respeliculas`
  ADD CONSTRAINT `respeliculas_ibfk_1` FOREIGN KEY (`idPelicula`) REFERENCES `peliculas` (`id`),
  ADD CONSTRAINT `respeliculas_ibfk_2` FOREIGN KEY (`idReserva`) REFERENCES `reservas` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
