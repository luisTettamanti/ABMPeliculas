-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 10-11-2021 a las 21:30:54
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
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=latin1;

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
(30, 'Linda May'),
(31, 'Michael J. Fox'),
(32, 'Cristopher Lloyd'),
(33, 'Lea Thompson');

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
  KEY `idpelicula` (`idpelicula`)
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=latin1;

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
(39, 30, 14),
(40, 31, 15),
(41, 32, 15),
(42, 33, 15);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

DROP TABLE IF EXISTS `categorias`;
CREATE TABLE IF NOT EXISTS `categorias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `nombre`) VALUES
(1, 'Drama'),
(2, 'Biografía'),
(3, 'Fantasía'),
(4, 'Comedia'),
(5, 'Animación'),
(6, 'Aventura');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `directores`
--

DROP TABLE IF EXISTS `directores`;
CREATE TABLE IF NOT EXISTS `directores` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

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
(11, 'Chloé Zhao'),
(12, 'Robert Zemeckis');

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
  `resenia` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idDirector` (`idDirector`),
  KEY `idCategoria` (`idCategoria`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `peliculas`
--

INSERT INTO `peliculas` (`id`, `nombre`, `anio`, `duracion`, `idDirector`, `IMDB`, `idCategoria`, `caratula`, `cantidad`, `resenia`) VALUES
(1, 'Parasite', 2019, 132, 1, '8.60', 3, 'parasite.jpg', 100, 'Ki-taek (Interpretado por Kang-ho Song) es el padre de una familia pobre que malvive en un piso bajo en Seúl, pagando las facturas a base de trabajos precarios y robando el wi-fi de los vecinos. Su situación cambia un día en el que su hijo logra que le recomienden para dar clases particulares de inglés en casa de los Park, una familia millonaria. Utilizando su ingenio, el joven conseguirá ganarse la confianza de la señora de la casa, y así irá introduciendo, poco a poco, al resto de sus familiares en distintos trabajos del servicio doméstico. Será el comienzo de un engranaje incontrolable, del cual nadie saldrá realmente indemne.'),
(2, 'Green Book', 2018, 130, 2, '8.20', 2, 'greenbook.jpg', 100, 'Estados Unidos, años 60. Tony Lip (Viggo Mortensen) es un brusco y malhablado italoamericano que consigue trabajo como conductor del Dr. Don Shirley (Mahershala Ali), un refinado y conocido pianista afroamericano. Juntos, realizarán una gira de conciertos desde Manhattan hasta los conservadores estados del Sur. Lip acompañará y protegerá al pianista durante este tour musical, en el que se guiarán por ‘El Libro Verde’, una guía con los alojamientos de los estados sureños donde los ciudadanos negros podían pasar la noche. Con el racismo y el peligro de fondo, esta inusual pareja se verá obligada a dejar de lado sus diferencias para salir adelante en el que será el viaje de su vida.'),
(4, 'La forma del agua', 2017, 123, 3, '7.30', 3, 'laformadelagua.jpg', 100, 'La forma del agua, una de las películas más laureadas de su año, provoca sensaciones encontradas; por un lado, es obvio su valor cinematográfico. La música de Alexandre Desplat es sencillamente maravillosa. La realización de Guillermo del Toro es la que siempre ofrece el mexicano, un virtuoso de la imagen y de la imaginación en cámara. Sólo él (y quizás también Tim Burton, aunque de otra manera) hubiera podido hacer esta película y contar esta historia. La fotografía oscura de Dan Laustsen otorga un carácter siniestro a la propuesta que le viene muy bien. Y sobre todo, el trabajo de todo su reparto, y muy especialmente de Sally Hawkins y Richard Jenkins, es soberbio. Hawkins lo dice todo con los ojos y el cuerpo, sin necesidad de palabras, y resulta memorable. Jenkins, por su parte, está encantador y adorable en un personaje que inspira mucha ternura en su devoción por la protagonista. Mención especial para Doug Jones, el mejor actor del mundo para dotar de vida y emociones reales a personajes de este tipo, como ya demostró en El laberinto del fauno o Hellboy.\r\nSin embargo, la película es el típico caso de cinta inflada por las buenas críticas, o dicho de otro modo: es buena, pero no tanto como se ha dicho, y eso juega en su contra, porque se espera más de lo que realmente da. Más emotividad, más originalidad, más emoción. Tiene de todo eso, desde luego, pero no tanto como cabía esperar o como se ha dicho en las críticas. Además, ciertas decisiones de guión son cuestionables.'),
(5, 'Moonlight', 2016, 111, 4, '7.40', 1, 'moonlight.jpg', 100, 'Conocerás la historia de Chiron un joven afroamericano que como muchos otros posee una difícil infancia y adolescencia. La razón por la cual ha tenido que sobrepasar estos terribles momentos, es a causa de crecer en una zona conflictiva de Miami. Sin embargo, a medida que pasan los años, el joven se descubre a sí mismo intentando sobrevivir en diferentes situaciones. Durante todo ese tiempo, Chirón tendrá que hacer frente a la drogadicción de su madre, mientras, halla la forma de pasar por alto el violento ambiente de su colegio y su barrio.'),
(8, 'Spotlight', 2015, 139, 5, '8.10', 2, 'spotlight.jpg', 100, 'Spotlight es una historia basada en hechos reales. La sección Spotlight del periódico The Boston Globe estaba formada por un grupo de periodistas expertos en hacer reportajes en profundidad. Ante la llegada de un nuevo director, buscan un caso de peso, poniendo a los mejores de sus periodistas al frente. Es el año 2002, se trata de un periódico de los de antes, sin Twitter, y lo que comienza con un proyecto de artículo sobre varios curas acusados por sus víctimas de haber abusado de ellos durante su infancia, se convierte en una minuciosa investigación por parte de este equipo de periodistas.En su vibrante camino hacia la verdad, el equipo de reporteros encontrarán una senda plagada de obstáculos. '),
(9, 'Birdman', 2014, 119, 6, '7.70', 4, 'birdman.jpg', 100, 'En «Birdman o (la inesperada virtud de la ignorancia)», la comedia negra de Alejandro G. Iñárritu, Riggan Thomson espera que encabezando una nueva y ambiciosa obra en Broadway logrará, entre otras cosas, dar nueva vida a su moribunda carrera. En muchos sentidos es un iniciativa profundamente insensata, pero el antiguo superhéroe del cine tiene grandes esperanzas de que este ardid creativo le legitimará como artista y demostrará a todos -incluido él mismo- que es algo más que una vieja gloria de Hollywood. Al aproximarse la noche de estreno de la obra, el actor principal de Riggan resulta herido en un insólito accidente durante los ensayos y tiene que ser sustituido rápidamente. A sugerencia de la primera actriz, Lesley, y ante la insistencia de su mejor amigo y productor, Jake, Riggan contrata de mala gana a Mike Shiner, un elemento peligroso que garantiza la venta de entradas y una elogiosa crítica de la obra. Mientras se apresta a debutar en escena, Riggan debe vérselas con su novia y coprotagonista, Laura; con su hija, recién salida de un tratamiento de rehabilitación, y con su ayudante personal, Sam, así como con su ex esposa, Sylvia, que aparece de vez en cuando para dejarse ver, con la intención de estabilizar la situación.'),
(10, '12 años de esclavitud', 2013, 134, 7, '8.10', 2, '12aniosesclavitud.jpg', 99, 'Basada en un hecho real ocurrido en 1850, narra la historia de Solomon Northup, un culto músico negro -y hombre libre- que vivía con su familia en Nueva York. Tras compartir una copa con dos desconocidos, Solomon descubre que ha sido drogado y secuestrado para ser vendido como esclavo en el Sur en una plantación de Louisiana. Renunciando a abandonar la esperanza, Solomon contempla cómo todos a su alrededor sucumben a la violencia, al abuso emocional y a la desesperanza. Entonces decide correr riesgos increíbles y confiar en la gente menos aparente para intentar recuperar su libertad y reunirse con su familia.'),
(11, 'Argo', 2012, 120, 8, '7.70', 1, 'argo.jpg', 98, 'Irán, año 1979. Cuando la embajada de los Estados Unidos en Teherán es ocupada por seguidores del Ayatolá Jomeini para pedir la extradición del Sha de Persia, la CIA y el gobierno canadiense organizaron una operación para rescatar a seis diplomáticos estadounidenses que se habían refugiado en la casa del embajador de Canadá. Con este fin se recurrió a un experto en rescatar rehenes y se preparó el escenario para el rodaje de una película de ciencia-ficción, de título «Argo», en la que participaba un equipo de cazatalentos de Hollywood. La misión: ir a Teherán y hacer pasar a los diplomáticos por un equipo de filmación canadiense para traerlos de vuelta a casa.'),
(12, 'El Artista', 2011, 100, 10, '7.90', 4, 'theartist.jpg', 100, 'En los años veinte, el actor George Valentin es un ídolo del cine que tiene muchos fanáticos. Mientras trabaja en su último filme, George se enamora de una mujer ingenua llamada Peppy Miller, y al parecer ella siente lo mismo. Pero George no quiere engañar a su esposa con la hermosa y joven actriz. La creciente popularidad del sonido en las películas separa a los amantes potenciales, cuando la carrera de George viene a menos y la de Penny asciende.'),
(13, 'El discurso del rey', 2010, 118, 9, '8.00', 1, 'eldiscursodelrey.jpg', 99, 'Tras la muerte de su padre, el rey Jorge V (Michael Gambon), y la escandalosa abdicación del príncipe Eduardo VII (Guy Pearce), Bertie (Colin Firth), afectado desde siempre de un angustioso tartamudeo, asciende de pronto al trono como Jorge VI de Inglaterra. Su país se encuentra al borde de la guerra y necesita desesperadamente un líder, por lo que su esposa Isabel (Helena Bonham Carter), la futura reina madre, le pone en contacto con un excéntrico logopeda llamado Lionel Logue (Geoffrey Rush). A pesar del choque inicial, los dos se sumergen de lleno en una terapia poco ortodoxa que les llevará a establecer un vínculo inquebrantable. Con el apoyo de Logue, su familia, su gobierno y Winston Churchill (Timothy Spall), el rey supera su afección y pronuncia un discurso radiofónico que inspirará a su pueblo y lo unirá en la batalla.'),
(14, 'Nomadland', 2020, 107, 11, '7.40', 1, 'Nomadland.jpg', 100, 'Nomadland, Fern (Frances McDormand) es una mujer en sus sesenta que perdió todo en la gran crisis del principio de siglo, y que decide embarcarse en un viaje a través de Oeste Americano. Viviendo en una caravana como un nómada de la actualidad, Fern se cruzará con todo tipo de personas que cambiarán su viaje y a su persona.'),
(15, 'Volver al Futuro', 1985, 116, 12, '8.50', 6, 'volveralfuturo.jpg', 100, 'La historia comienza en 1985 con Marty McFly, un joven normal de diecisiete años de edad que vive con su familia en la ficticia Hill Valley, California. Su padre es un hombre fracasado, tímido y de poco carácter con un empleo mal pagado donde tiene que soportar los constantes abusos de su jefe, Biff Tannen, quien desde la preparatoria le ha hecho la vida imposible. Asimismo, uno de sus tíos tiene antecedentes penales y ha sido arrestado en múltiples ocasiones y su familia tiene muchas deudas.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reservas`
--

DROP TABLE IF EXISTS `reservas`;
CREATE TABLE IF NOT EXISTS `reservas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idUsuario` int(11) NOT NULL,
  `fecha` timestamp NOT NULL,
  `idEstado` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idUsuario` (`idUsuario`),
  KEY `idEstado` (`idEstado`)
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `reservas`
--

INSERT INTO `reservas` (`id`, `idUsuario`, `fecha`, `idEstado`) VALUES
(11, 14, '2021-10-21 03:00:00', 1),
(12, 14, '2021-10-21 03:00:00', 1),
(13, 5, '2021-10-25 03:00:00', 1),
(14, 4, '2021-10-26 03:00:00', 1),
(15, 14, '2021-10-27 03:00:00', 1),
(16, 14, '2021-10-27 03:00:00', 1),
(17, 14, '2021-10-27 03:00:00', 1),
(18, 14, '2021-10-27 03:00:00', 1),
(19, 14, '2021-11-02 03:00:00', 1),
(20, 5, '2021-11-02 03:00:00', 1),
(21, 5, '2021-11-02 03:00:00', 1),
(22, 5, '2021-11-02 03:00:00', 1),
(23, 14, '2021-11-03 03:00:00', 1),
(24, 14, '2021-11-03 03:00:00', 2),
(25, 14, '2021-11-03 03:00:00', 1),
(26, 14, '2021-11-04 01:32:07', 1),
(27, 14, '2021-11-04 01:34:08', 1),
(28, 14, '2021-11-04 01:42:29', 4),
(29, 5, '2021-11-04 02:03:54', 4),
(30, 14, '2021-11-04 03:28:17', 3),
(31, 14, '2021-11-07 21:47:08', 2),
(32, 14, '2021-11-08 04:46:05', 1),
(33, 14, '2021-11-08 19:29:51', 2),
(34, 5, '2021-11-09 03:39:25', 3),
(35, 5, '2021-11-09 00:52:28', 1),
(36, 14, '2021-11-09 21:47:17', 4),
(37, 14, '2021-11-09 22:11:33', 1),
(38, 14, '2021-11-09 22:14:44', 1),
(39, 5, '2021-11-09 22:27:21', 1),
(40, 5, '2021-11-09 23:29:35', 1),
(41, 5, '2021-11-09 23:48:44', 3),
(42, 5, '2021-11-10 00:30:52', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `resestados`
--

DROP TABLE IF EXISTS `resestados`;
CREATE TABLE IF NOT EXISTS `resestados` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(20) NOT NULL,
  `color` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `resestados`
--

INSERT INTO `resestados` (`id`, `nombre`, `color`) VALUES
(1, 'En Preparación', 'LightCyan'),
(2, 'Enviado', 'SandyBrown'),
(3, 'Entregado', 'LightSeaGreen'),
(4, 'Cancelado', 'Crimson');

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
) ENGINE=InnoDB AUTO_INCREMENT=94 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `respeliculas`
--

INSERT INTO `respeliculas` (`id`, `idReserva`, `idPelicula`, `cantidad`) VALUES
(22, 11, 5, 1),
(23, 11, 8, 1),
(24, 11, 4, 2),
(25, 12, 14, 1),
(26, 12, 12, 1),
(27, 12, 9, 3),
(28, 12, 5, 1),
(29, 12, 13, 1),
(30, 12, 8, 1),
(31, 12, 11, 1),
(32, 12, 14, 1),
(33, 12, 8, 1),
(34, 12, 4, 1),
(35, 12, 15, 1),
(36, 12, 9, 1),
(37, 12, 10, 1),
(38, 12, 1, 1),
(39, 12, 12, 1),
(40, 13, 14, 1),
(41, 13, 5, 1),
(42, 14, 1, 1),
(43, 14, 11, 1),
(44, 14, 10, 1),
(45, 15, 11, 1),
(46, 15, 5, 1),
(47, 16, 13, 1),
(48, 16, 5, 1),
(49, 16, 9, 1),
(50, 16, 12, 1),
(51, 19, 4, 1),
(52, 19, 11, 1),
(53, 20, 12, 1),
(54, 20, 5, 1),
(55, 20, 10, 2),
(56, 21, 15, 2),
(57, 21, 1, 2),
(58, 22, 11, 1),
(59, 23, 14, 1),
(60, 23, 9, 2),
(61, 23, 2, 1),
(62, 24, 14, 1),
(63, 24, 8, 1),
(64, 24, 9, 1),
(65, 25, 5, 3),
(66, 26, 13, 1),
(67, 27, 10, 2),
(68, 28, 4, 1),
(69, 29, 11, 1),
(70, 30, 15, 1),
(71, 30, 14, 1),
(72, 31, 9, 1),
(73, 31, 5, 1),
(74, 31, 8, 1),
(75, 31, 13, 1),
(76, 32, 2, 1),
(77, 33, 4, 1),
(78, 33, 9, 1),
(79, 33, 2, 1),
(80, 34, 5, 1),
(81, 35, 11, 1),
(82, 36, 11, 1),
(83, 37, 14, 1),
(84, 37, 2, 1),
(85, 38, 9, 1),
(86, 38, 12, 1),
(87, 39, 8, 1),
(88, 39, 4, 1),
(89, 40, 10, 1),
(90, 40, 8, 1),
(91, 41, 11, 1),
(92, 42, 11, 2),
(93, 42, 13, 1);

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
  ADD CONSTRAINT `reservas_ibfk_2` FOREIGN KEY (`idUsuario`) REFERENCES `usuarios` (`id`),
  ADD CONSTRAINT `reservas_ibfk_3` FOREIGN KEY (`idEstado`) REFERENCES `resestados` (`id`);

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
