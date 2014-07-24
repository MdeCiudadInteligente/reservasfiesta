-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-05-2014 a las 23:06:29
-- Versión del servidor: 5.5.32
-- Versión de PHP: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `book_party`
--
CREATE DATABASE IF NOT EXISTS `book_party` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `book_party`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `educational_institution`
--

CREATE TABLE IF NOT EXISTS `educational_institution` (
  `code` varchar(45) NOT NULL,
  `type` varchar(45) NOT NULL,
  `grade` int(11) NOT NULL,
  `institution_id` int(11) NOT NULL,
  PRIMARY KEY (`code`),
  KEY `institution_id` (`institution_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `educational_institution`
--

INSERT INTO `educational_institution` (`code`, `type`, `grade`, `institution_id`) VALUES
('234', 'SDGSDG', 2, 1234),
('23424', 'Institución Educativa Pública', 0, 555566),
('3333', 'publica', 3, 555561),
('34534', 'Institución Educativa Pública', 0, 555568),
('345435', 'Institución Educativa Privada', 0, 555569),
('asd', 'asdad', 3, 12343),
('asda', 'asdasd', 2, 666),
('sdfdf', 'sdfsdf', 2, 666),
('sdfsdf', 'Institución Educativa Pública', 0, 555572);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entity`
--

CREATE TABLE IF NOT EXISTS `entity` (
  `id_entity` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  PRIMARY KEY (`id_entity`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `entity`
--

INSERT INTO `entity` (`id_entity`, `name`) VALUES
(1, 'sadasdasdasd'),
(2, 'sadasdasdasd'),
(3, 'carmelitas'),
(4, 'klalalal');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `institution`
--

CREATE TABLE IF NOT EXISTS `institution` (
  `id_institution` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `mail` varchar(45) NOT NULL,
  `address` varchar(45) NOT NULL,
  `phone` varchar(45) NOT NULL,
  `neighborhood` varchar(45) NOT NULL,
  `comune` varchar(45) NOT NULL,
  `city` varchar(45) NOT NULL,
  `members_number` int(11) NOT NULL,
  `age_range` varchar(45) NOT NULL,
  `public_type_id` int(11) NOT NULL,
  `institution_type` varchar(45) NOT NULL,
  PRIMARY KEY (`id_institution`),
  KEY `public_type_id` (`public_type_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=555573 ;

--
-- Volcado de datos para la tabla `institution`
--

INSERT INTO `institution` (`id_institution`, `name`, `mail`, `address`, `phone`, `neighborhood`, `comune`, `city`, `members_number`, `age_range`, `public_type_id`, `institution_type`) VALUES
(0, 'boba yodis', 'hello@hotmail.com', 'asdasdasdasda', '12423423423423', 'asdas<dsa', 'Comuna 10 - La Candelaria', 'Medellin', 3, '0 - 6 Primera infancia', 1, 'Institución Educativa'),
(1, 'hgjhgjh', 'y@hotmail.com', 'asdaasdas', '56756576', 'hgjhgjhgk', '', 'Otras', 56, '13 - 18 Jóvenes', 2, 'Institución Educativa'),
(54, 'asdas', 'hello@hotmail.com', 'asdasdasdasda', '12423423423423', 'ewrwerwerwer', 'Comuna 16 - Belï¿½n', 'Medellin', 2, '15-30', 2, 'werwrwr'),
(333, 'boba yodi', 'johana@hotmail.com', 'asda<sd', '12423423423423', 'ewrwerwerwer', 'Comuna 15 - Guayabal', 'Medellin', 3, '15-30', 0, 'sdgsdgg'),
(555, 'lalalal', 'hello@hotmail.com', 'asdasdasdasda', 'asdasda', 'ewrwerwerwer', 'Comuna 14 - El Poblado', 'Medellin', 3, '15-30', 0, 'sdgsdgg'),
(666, 'lolo', 'hello@hotmail.com', 'asdasdasdasda', '12423423423423', 'ewrwerwerwer', 'Comuna 1 - Popular', 'Medellin', 4, '15-30', 0, 'sdgsdgg'),
(1234, 'boba yodi', 'hello@hotmail.com', 'asdasd', '12423423423423', 'jkhjhj', 'Comuna 16 - Belï¿½n', 'Medellin', 65, '34', 1, 'werwrwr'),
(2222, 'boba yodi', 'hello@hotmail.com', 'asdasd', 'asdasda', 'asdas<dsa', 'Comuna 11 - Laureles - Estadio: ', 'Medellin', 2, '15-30', 0, 'sdgsdgg'),
(12343, 'yodi la mejor', 'johana@hotmail.com', 'asdasd', '234234', 'asdas<dsa', '', 'Otras', 2, '33', 0, 'dd'),
(555555, 'Ã±oÃ±a', 'hello@hotmail.com', 'asdasdasdasda', '12423423423423', 'ewrwerwerwer', 'Comuna 6 - Doce de Octubre', 'Medellin', 4, '15-30', 0, 'sdgsdgg'),
(555556, 'asdasdsd', 'y@hotmail.com', 'sdasdas', '2323232', 'asdasdasd', '', 'Otras', 22, '27 - 40 Adultos', 2, 'Grupo'),
(555558, 'asdasdasdsasdasd', 'yf@gmail.com', 'asdasd', '3432342', 'asdasdasd', '', 'Otras', 35, '13 - 18 Jóvenes', 3, 'Institución Educativa'),
(555561, 'las carmelitas', 'hello@hotmail.com', 'la calle del corazón', '3518543', 'cualquiera', 'Comuna 1 - Popular', 'Medellin', 11, '7 - 12 Niños', 3, 'Institución Educativa'),
(555562, 'boba yodi', 'hello@hotmail.com', 'asdasdasdasda', '234234', 'cualquiera', 'Comuna 11 - Laureles - Estadio: ', 'Medellin', 4, '0 - 6 Primera infancia', 1, 'Grupo'),
(555563, 'una prueba', 'hello@hotmail.com', 'asdasdasdasda', '12423423423423', 'ewrwerwerwer', 'Comuna 13 - San Javier', 'Medellin', 8, '0 - 6 Primera infancia', 1, 'Grupo'),
(555564, 'una prueba', 'hello@hotmail.com', 'asdasdasdasda', '12423423423423', 'ewrwerwerwer', 'Comuna 2 - Santa Cruz', 'Medellin', 3, '7 - 12 Niños', 1, 'Grupo'),
(555565, 'una prueba', 'hello@hotmail.com', 'asdasdasdasda', '12423423423423', 'ewrwerwerwer', 'Comuna 8 - Villa hermosa', 'Medellin', 5, '', 1, 'Grupo'),
(555566, 'una prueba', 'hello@hotmail.com', 'asdasdasdasda', '12423423423423', 'ewrwerwerwer', 'Comuna 11 - Laureles - Estadio: ', 'Medellin', 5, '', 2, 'Institución Educativa'),
(555567, 'una prueba', 'johana@hotmail.com', 'asdasd', '12423423423423', 'ewrwerwerwer', 'Comuna 14 - El Poblado', 'Medellin', 5, '', 3, 'Grupo'),
(555568, 'una prueba', 'yy@hotmail.com', 'asdasdasdasda', '12423423423423', 'ewrwerwerwer', 'Comuna 3 - Manrique', 'Medellin', 18, '', 1, 'Institución Educativa'),
(555569, 'boba yodi', 'hello@hotmail.com', 'asdasdasdasda', '12423423423423', 'ewrwerwerwer', 'Comuna 5 - Castilla', 'Medellin', 5, '', 1, 'Institución Educativa'),
(555572, 'boba yodi', 'hello@hotmail.com', 'asdasdasdasda', '12423423423423', 'ewrwerwerwer', 'Comuna 15 - Guayabal', 'Medellin', 5, '', 1, 'Institución Educativa');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `institution_specific_condition`
--

CREATE TABLE IF NOT EXISTS `institution_specific_condition` (
  `institution_id` int(11) NOT NULL,
  `specific_condition_id` int(11) NOT NULL,
  KEY `institution_id` (`institution_id`,`specific_condition_id`),
  KEY `specific_condition_id` (`specific_condition_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `institution_specific_condition`
--

INSERT INTO `institution_specific_condition` (`institution_id`, `specific_condition_id`) VALUES
(1, 1),
(1, 5),
(54, 1),
(1234, 1),
(1234, 2),
(555556, 2),
(555556, 3),
(555558, 1),
(555562, 2),
(555562, 3),
(555563, 4),
(555564, 4),
(555565, 1),
(555565, 2),
(555566, 2),
(555566, 4),
(555567, 2),
(555567, 4),
(555568, 2),
(555568, 4),
(555569, 1),
(555569, 4),
(555572, 2),
(555572, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `public_type`
--

CREATE TABLE IF NOT EXISTS `public_type` (
  `id_public_type` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  PRIMARY KEY (`id_public_type`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Volcado de datos para la tabla `public_type`
--

INSERT INTO `public_type` (`id_public_type`, `name`) VALUES
(1, '0 - 6 Primera infancia'),
(2, '7 - 12 Niños'),
(3, '13 - 18 Jóvenes'),
(4, '19 - 26 Jóvenes'),
(5, '27 - 40 Adultos'),
(6, '41 - 65 Adultos'),
(7, '66 - ... Adultos mayores'),
(8, 'Grupos Familiares o Amigos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `public_type_workshop`
--

CREATE TABLE IF NOT EXISTS `public_type_workshop` (
  `workshop_id` int(11) NOT NULL,
  `public_type_id` int(11) NOT NULL,
  KEY `workshop_id` (`workshop_id`),
  KEY `public_type_id` (`public_type_id`),
  KEY `workshop_id_2` (`workshop_id`),
  KEY `public_type_id_2` (`public_type_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `public_type_workshop`
--

INSERT INTO `public_type_workshop` (`workshop_id`, `public_type_id`) VALUES
(2, 2),
(1, 3),
(1, 2),
(3, 1),
(3, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `responsible`
--

CREATE TABLE IF NOT EXISTS `responsible` (
  `id_responsible` varchar(45) NOT NULL,
  `name` varchar(45) NOT NULL,
  `celular` varchar(45) NOT NULL,
  `mail` varchar(45) NOT NULL,
  `institution_id` int(11) NOT NULL,
  PRIMARY KEY (`id_responsible`),
  UNIQUE KEY `institution_id` (`institution_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `responsible`
--

INSERT INTO `responsible` (`id_responsible`, `name`, `celular`, `mail`, `institution_id`) VALUES
('1234567333', 'adsad', '23423423', 'y@hotmail.com', 555572),
('12345673334', 'liliana', '23423423', 'y@hotmail.com', 555561),
('234234234234', 'ewrwer', '234234234', 'y@hotmail.com', 555566);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `specific_condition`
--

CREATE TABLE IF NOT EXISTS `specific_condition` (
  `id_specific_condition` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  PRIMARY KEY (`id_specific_condition`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `specific_condition`
--

INSERT INTO `specific_condition` (`id_specific_condition`, `name`) VALUES
(1, 'Invidentes'),
(2, 'Discapacidad Cognitiva'),
(3, 'Déficit de atención'),
(4, 'Movilidad reducida'),
(5, 'Sordos'),
(6, 'Población vulnerable o en riesgo social');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `specific_condition_workshop`
--

CREATE TABLE IF NOT EXISTS `specific_condition_workshop` (
  `workshop_id` int(11) NOT NULL,
  `specific_condition_id` int(11) NOT NULL,
  KEY `workshop_id` (`workshop_id`),
  KEY `workshop_id_2` (`workshop_id`),
  KEY `workshop_id_3` (`workshop_id`),
  KEY `workshop_id_4` (`workshop_id`),
  KEY `specific_condition_id` (`specific_condition_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `specific_condition_workshop`
--

INSERT INTO `specific_condition_workshop` (`workshop_id`, `specific_condition_id`) VALUES
(1, 1),
(2, 1),
(2, 2),
(3, 1),
(3, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `permission_level` int(11) NOT NULL,
  `institution_id` int(11) NOT NULL,
  PRIMARY KEY (`id_user`),
  KEY `institution_id` (`institution_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `permission_level`, `institution_id`) VALUES
(1, 'johana', 'c66587f2061d1d66eb2c28df2a8bda028b665b7d', 1, 1),
(2, 'liliana', 'c66587f2061d1d66eb2c28df2a8bda028b665b7d', 1, 54),
(4, 'carmelita', '4584fcab9d04e6412bfcdb2ff820c8778010a090', 2, 555561),
(5, 'johana', 'c66587f2061d1d66eb2c28df2a8bda028b665b7d', 2, 555565),
(6, 'johana', 'c66587f2061d1d66eb2c28df2a8bda028b665b7d', 2, 555566),
(7, 'johana', 'c66587f2061d1d66eb2c28df2a8bda028b665b7d', 2, 555567),
(8, 'yodi', '883cae0cb09153ae3b3ffbb4382149f69a217a00', 2, 555568),
(9, 'johana', 'c66587f2061d1d66eb2c28df2a8bda028b665b7d', 2, 555569),
(10, 'asdasd', 'f33f4303ae4de5272fcf8a6176e76b1f7ee61a4f', 2, 555570),
(11, 'administrador', '9feecd26bd5d5b9ece8dbda9f66e744dd049098a', 2, 555571),
(12, 'yodi', '883cae0cb09153ae3b3ffbb4382149f69a217a00', 2, 555572);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `workshop`
--

CREATE TABLE IF NOT EXISTS `workshop` (
  `id_workshop` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `description` varchar(500) NOT NULL,
  `entity_id` int(11) NOT NULL,
  PRIMARY KEY (`id_workshop`),
  KEY `entity_id` (`entity_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `workshop`
--

INSERT INTO `workshop` (`id_workshop`, `name`, `description`, `entity_id`) VALUES
(1, 'Cocina', 'cocinar', 1),
(2, 'Desarrollo', 'Dasarrollar\r\n', 1),
(3, 'las carmelitas', 'es muy', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `workshop_session`
--

CREATE TABLE IF NOT EXISTS `workshop_session` (
  `id_workshop_session` int(11) NOT NULL AUTO_INCREMENT,
  `workshop_day` varchar(45) NOT NULL,
  `workshop_time` varchar(45) NOT NULL,
  `travel_time` varchar(45) NOT NULL,
  `state` varchar(45) NOT NULL,
  `workshop_id` int(11) NOT NULL,
  `institution_id` int(11) NOT NULL,
  PRIMARY KEY (`id_workshop_session`),
  KEY `workshop_id` (`workshop_id`),
  KEY `workshop_id_2` (`workshop_id`),
  KEY `institution_id` (`institution_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `workshop_session`
--

INSERT INTO `workshop_session` (`id_workshop_session`, `workshop_day`, `workshop_time`, `travel_time`, `state`, `workshop_id`, `institution_id`) VALUES
(1, '05-05-2014', '12am', '10am', 'inactivo', 1, 0),
(2, '10-05-2014', '10am', '11am', 'activo', 2, 0),
(3, '6-06-2014', '4am', '5am', 'Activo', 1, 0),
(4, '24-06-2014', '10am', '11am', 'activo', 1, 555569),
(5, '24-06-2014', '3pm', '4pm', 'activo', 1, 0),
(6, '05-05-2014', '10pm', '11pm', 'Activo', 1, 1);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `educational_institution`
--
ALTER TABLE `educational_institution`
  ADD CONSTRAINT `educational_institution_ibfk_1` FOREIGN KEY (`institution_id`) REFERENCES `institution` (`id_institution`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `institution_specific_condition`
--
ALTER TABLE `institution_specific_condition`
  ADD CONSTRAINT `institution_specific_condition_ibfk_1` FOREIGN KEY (`institution_id`) REFERENCES `institution` (`id_institution`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `institution_specific_condition_ibfk_2` FOREIGN KEY (`specific_condition_id`) REFERENCES `specific_condition` (`id_specific_condition`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `public_type_workshop`
--
ALTER TABLE `public_type_workshop`
  ADD CONSTRAINT `public_type_workshop_ibfk_1` FOREIGN KEY (`workshop_id`) REFERENCES `workshop` (`id_workshop`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `public_type_workshop_ibfk_2` FOREIGN KEY (`public_type_id`) REFERENCES `public_type` (`id_public_type`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `responsible`
--
ALTER TABLE `responsible`
  ADD CONSTRAINT `responsible_ibfk_1` FOREIGN KEY (`institution_id`) REFERENCES `institution` (`id_institution`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `specific_condition_workshop`
--
ALTER TABLE `specific_condition_workshop`
  ADD CONSTRAINT `specific_condition_workshop_ibfk_1` FOREIGN KEY (`workshop_id`) REFERENCES `workshop` (`id_workshop`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `specific_condition_workshop_ibfk_2` FOREIGN KEY (`specific_condition_id`) REFERENCES `specific_condition` (`id_specific_condition`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `workshop`
--
ALTER TABLE `workshop`
  ADD CONSTRAINT `workshop_ibfk_1` FOREIGN KEY (`entity_id`) REFERENCES `entity` (`id_entity`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `workshop_session`
--
ALTER TABLE `workshop_session`
  ADD CONSTRAINT `workshop_session_ibfk_1` FOREIGN KEY (`workshop_id`) REFERENCES `workshop` (`id_workshop`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `workshop_session_ibfk_3` FOREIGN KEY (`institution_id`) REFERENCES `institution` (`id_institution`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
