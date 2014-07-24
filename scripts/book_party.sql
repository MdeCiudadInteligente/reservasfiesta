-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-06-2014 a las 00:05:03
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
('234234', 'Institución Educativa Privada', 0, 555586),
('23424', 'Institución Educativa Pública', 0, 555566),
('3333', 'publica', 3, 555561),
('34534', 'Institución Educativa Pública', 0, 555568),
('345435', 'Institución Educativa Privada', 0, 555569),
('asd', 'asdad', 3, 12343),
('asda', 'asdasd', 2, 666),
('prueba', 'Institución Educativa Pública', 0, 555585),
('sdfdf', 'sdfsdf', 2, 666),
('sdfsdf', 'Institución Educativa Privada', 0, 555573);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entity`
--

CREATE TABLE IF NOT EXISTS `entity` (
  `id_entity` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  PRIMARY KEY (`id_entity`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Volcado de datos para la tabla `entity`
--

INSERT INTO `entity` (`id_entity`, `name`) VALUES
(1, 'sadasdasdasd'),
(2, 'sadasdasdasd'),
(3, 'carmelitas'),
(4, 'klalalal'),
(6, ''),
(7, ''),
(8, ''),
(9, ''),
(10, ''),
(11, ''),
(12, 'Fundación Crea '),
(13, 'Pabellón Multilingüe Alianza Francesa Cultura'),
(14, 'Parque Zoológico Santa Fe'),
(15, 'Comité de Naracción Oral de Medellón. Represe'),
(16, 'Corporación Ideas y palabras'),
(17, 'El Morenito INC -  Trinity Corp.');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=555592 ;

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
(555572, 'boba yodi', 'hello@hotmail.com', 'asdasdasdasda', '12423423423423', 'ewrwerwerwer', 'Comuna 15 - Guayabal', 'Medellin', 5, '', 1, 'Institución Educativa'),
(555573, 'boba yodi', 'hello@hotmail.com', 'asdasdasdasda', '12423423423423', 'ewrwerwerwer', 'Comuna 12 - La América', 'Medellin', 5, '', 1, 'Institución Educativa'),
(555574, 'asxcasc', 'yy@hotmail.com', 'asdasdasdasda', '12423423423423', 'ewrwerwerwer', 'Comuna 11 - Laureles - Estadio: ', 'Medellin', 5, '', 2, 'Grupo'),
(555575, 'una prueba', 'hello@hotmail.com', 'asdasdasdasda', '234234', 'ewrwerwerwer', 'Comuna 5 - Castilla', 'Medellin', 36, '', 3, 'Grupo'),
(555576, 'una prueba', 'yy@hotmail.com', 'asdasdasdasda', '12423423423423', 'ewrwerwerwer', 'Comuna 10 - La Candelaria', 'Medellin', 5, '', 5, 'Grupo'),
(555577, 'una prueba', 'hello@hotmail.com', 'asdasdasdasda', '12423423423423', 'asdas<dsa', 'Selecione la comuna', 'Medellin', 5, '', 1, 'Grupo'),
(555578, 'una prueba', 'yy@hotmail.com', 'asdasdasdasda', '12423423423423', 'ewrwerwerwer', 'Comuna 14 - El Poblado', 'Medellin', 5, '', 2, 'Grupo'),
(555579, 'una prueba', 'johana@hotmail.com', 'asdasdasdasda', '12423423423423', 'ewrwerwerwer', '', 'Seleccione una ciudad', 7, '', 2, 'Grupo'),
(555580, 'una prueba', 'hello@hotmail.com', 'asdasd', '12423423423423', 'asdas<dsa', 'Comuna 10 - La Candelaria', 'Medellin', 5, '', 1, 'Grupo'),
(555581, 'una prueba', 'hello@hotmail.com', 'asdasdasdasda', '12423423423423', 'asdas<dsa', 'Comuna 10 - La Candelaria', 'Medellin', 5, '', 1, 'Grupo'),
(555582, 'una prueba', 'johana@hotmail.com', 'asdasd', '12423423423423', 'ewrwerwerwer', 'Comuna 2 - Santa Cruz', 'Medellin', 5, '', 1, 'Grupo'),
(555583, 'una prueba', 'hello@hotmail.com', 'asdasdasdasda', '234234', 'ewrwerwerwer', 'Comuna 11 - Laureles - Estadio: ', 'Medellin', 5, '', 1, 'Grupo'),
(555584, 'una prueba', 'hello@hotmail.com', 'asdasdasdasda', '234234', 'ewrwerwerwer', '', 'Medellin', 5, '', 1, 'Grupo'),
(555585, 'prueba', 'prueba@prueba.com', 'direprueba', 'prueba', 'prueba', 'Comuna 3 - Manrique', 'Medellin', 19, '', 3, 'Institución Educativa'),
(555586, 'una prueba', 'yy@hotmail.com', 'asdasd', '3518543', 'ewrwerwerwer', 'Comuna 9 - Buenos Aires', 'Medellin', 17, '', 3, 'InstituciÃ³n Educativa'),
(555587, 'sdfsdf', 'y@hotmail.com', 'sadasd', '324324', 'asdasdasd', '', 'Otras', 39, '', 6, 'Grupo'),
(555588, 'pruebayodi', 'y@hotmail.com', 'asdasd', '234234', 'asdasdasd', '', 'Otras', 24, '', 6, 'Grupo'),
(555589, 'asdsad', 'yf@gmail.com', 'sdfsdf', '3423342', 'dfsfdsf', '', 'Otras', 5, '', 1, 'Grupo'),
(555590, 'yodiiiii', 'yypv@hotmail.com', 'qqqqqq', '123456', 'cordoba', '', 'Otras', 40, '', 2, 'Grupo'),
(555591, 'yulli', 'y@hotmail.com', 'eeee', '1231232', 'sadsdsad', '', 'Otras', 22, '', 5, 'Grupo');

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
(555572, 3),
(555573, 3),
(555573, 5),
(555574, 2),
(555574, 4),
(555575, 4),
(555575, 6),
(555576, 2),
(555576, 4),
(555577, 3),
(555577, 5),
(555578, 2),
(555578, 4),
(555579, 1),
(555579, 2),
(555579, 4),
(555580, 2),
(555580, 3),
(555581, 4),
(555581, 6),
(555582, 3),
(555582, 4),
(555583, 4),
(555583, 5),
(555584, 2),
(555585, 1),
(555585, 3),
(555586, 3),
(555586, 4),
(555587, 1),
(555587, 3),
(555588, 2),
(555588, 3),
(555589, 1),
(555590, 1),
(555591, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `public_type`
--

CREATE TABLE IF NOT EXISTS `public_type` (
  `id_public_type` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  PRIMARY KEY (`id_public_type`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

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
('10220964331', 'qeqwew', '3136547898', 'yy@hotmail.com', 1),
('1212121212', 'rrrrrr', '21232312', 'yyee@hotmail.com', 555566),
('123123123', 'adasdasda', '231231', 'yyee@hotmail.com', 555585),
('123454312', 'aaaaaaaaawwww', '123123123', 'yy@hotmail.com', 555564),
('12984376', 'Dprueba', '3136547898', 'yyrr@hotmail.com', 1234),
('2132131', 'aadsadsadda', '2324423432', 'yyee@hotmail.com', 555567),
('2222222', 'eeeee', '222222221111', 'yy@hotmail.com', 555580),
('222223123123', 'diego fernando', '12323123', 'yypv27@hotmail.com', 555583),
('222233333', 'asdsdas', '123123123', 'yddy@hotmail.com', 555),
('2312321', 'adsdasdas', '12312321', 'yyee@hotmail.com', 555573),
('23123212', 'qeqwew', '12321323123', 'yyee@hotmail.com', 0),
('323232323', 'diego fernando', '3136547898', 'yypv27@hotmail.com', 555587),
('343242432', 'ewrewrer', '2343423423423', 'yyer@hotmail.com', 555579),
('422534234', 'trtwer', '4324234324', 'yy@hotmail.com', 555568),
('42342424', 'fdfs', '23423423', 'yyee@hotmail.com', 12343),
('4444444444', 'yodiiiii', '3136547898', 'yyer@hotmail.com', 555574),
('44445678', 'diegooo', '342434242', 'yypv27@hotmail.com', 555562),
('4445555', 'ewwqewqe', 'asdasdsd', 'yypvd27@hotmail.com', 555556),
('4545454545', 'trtrtrtrtrt', '3136547898', 'yyer@hotmail.com', 666),
('56456456', 'johana ñoña', '55354', 'yyee@hotmail.com', 555565),
('56767567', 'eqwerwer', '343243', 'yyee@hotmail.com', 555563);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=30 ;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `permission_level`, `institution_id`) VALUES
(1, 'johana', 'c66587f2061d1d66eb2c28df2a8bda028b665b7d', 1, 1),
(2, 'liliana', 'c66587f2061d1d66eb2c28df2a8bda028b665b7d', 1, 54),
(4, 'carmelita', '4584fcab9d04e6412bfcdb2ff820c8778010a090', 2, 555561),
(5, 'johana', 'c66587f2061d1d66eb2c28df2a8bda028b665b7d', 1, 555565),
(6, 'johana', 'c66587f2061d1d66eb2c28df2a8bda028b665b7d', 1, 555566),
(7, 'johana', 'c66587f2061d1d66eb2c28df2a8bda028b665b7d', 1, 555567),
(8, 'yodi', '883cae0cb09153ae3b3ffbb4382149f69a217a00', 1, 555568),
(9, 'johana', 'c66587f2061d1d66eb2c28df2a8bda028b665b7d', 2, 555569),
(10, 'asdasd', 'f33f4303ae4de5272fcf8a6176e76b1f7ee61a4f', 2, 555570),
(11, 'administrador', '9feecd26bd5d5b9ece8dbda9f66e744dd049098a', 2, 555571),
(12, 'yodi', '883cae0cb09153ae3b3ffbb4382149f69a217a00', 2, 555572),
(13, 'la prueba', '22426c7bfa73cdbe0de82093e438776f96e2d54b', 2, 555573),
(14, 'lalo', 'eee965dbebcc05acf8457ee5dea4170f7e001f95', 2, 555574),
(15, 'jojo', '2d4a1d827b217dc7df66588c140c1eeeaae84681', 2, 555575),
(16, 'joji', 'a474f7771cd8bf8a6642e95329b32108c65e2f63', 2, 555576),
(17, 'johanas', '36e605f1f13e4a4ba78129d41ad4c5ea806230df', 2, 555577),
(18, 'lala', '0153e2d16dfbce89663601c4be8de0d101962ced', 2, 555578),
(19, 'lulo', 'afaae09767a742963a3a932017e800bb8d46abe1', 2, 555579),
(20, 'yoyo', '3cfd8765a5cfef63e6982bedd39059f2c5b10423', 2, 555580),
(21, 'yodis', '43d6c8edbc5dc310663ab2c03840cbba203e843c', 2, 555581),
(26, 'yoyos', '514446540143e817829ba34342648dede76e562a', 2, 555582),
(27, 'jaji', '377168148fa44481fdf28ebaee5980b9e5d89672', 2, 555584),
(28, 'prueba', '7a9fbaa3d1e19726de16c9817f4990f14af54c1e', 2, 555585),
(29, 'lulu', '2ed06e905e34d63a9493beeb6653a9286a51b600', 2, 555586);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

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
  `workshop_id` int(11) NOT NULL,
  `institution_id` int(11) NOT NULL,
  `Seleccionar Archivo` varchar(225) NOT NULL,
  PRIMARY KEY (`id_workshop_session`),
  KEY `workshop_id` (`workshop_id`),
  KEY `workshop_id_2` (`workshop_id`),
  KEY `institution_id` (`institution_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Volcado de datos para la tabla `workshop_session`
--

INSERT INTO `workshop_session` (`id_workshop_session`, `workshop_day`, `workshop_time`, `travel_time`, `workshop_id`, `institution_id`, `Seleccionar Archivo`) VALUES
(10, '', '', '', 0, 0, 'workshop_session-0.csv'),
(11, 'Enero-05-2014', '08am', '10am', 0, 0, ''),
(12, 'Mayo-05-2014', '12am', '12am', 0, 0, ''),
(13, 'Junio-05-2014', '10am', '08am', 0, 0, ''),
(14, '', '', '', 0, 0, 'workshop_session-1.csv'),
(15, 'Enero-05-2014', '08am', '10am', 0, 0, ''),
(16, 'Mayo-05-2014', '12am', '12am', 0, 0, ''),
(17, 'Junio-05-2014', '10am', '08am', 0, 0, ''),
(18, '', '', '', 0, 0, 'workshop_session-2.csv'),
(19, 'Enero-05-2014', '08am', '10am', 0, 0, ''),
(20, 'Mayo-05-2014', '12am', '12am', 0, 0, ''),
(21, 'Junio-05-2014', '10am', '08am', 0, 0, '');

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

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
