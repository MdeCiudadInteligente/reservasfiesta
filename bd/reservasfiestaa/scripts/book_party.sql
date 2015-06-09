-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 24-07-2014 a las 17:57:01
-- Versión del servidor: 5.5.32
-- Versión de PHP: 5.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `book_party`
--
CREATE DATABASE IF NOT EXISTS `book_party` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
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
('0000000000', 'InstituciÃ³n Educativa Privada', 0, 2),
('123456', 'InstituciÃ³n Educativa Privada', 0, 6),
('1234567890', 'InstituciÃ³n Educativa Privada', 0, 11);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entity`
--

CREATE TABLE IF NOT EXISTS `entity` (
  `id_entity` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(256) NOT NULL,
  `description` varchar(256) NOT NULL,
  PRIMARY KEY (`id_entity`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=74 ;

--
-- Volcado de datos para la tabla `entity`
--

INSERT INTO `entity` (`id_entity`, `name`, `description`) VALUES
(38, 'Alianza AMA, SecretarÃ­a de EducaciÃ³n de  MedellÃ­n y de Antioquia', 'www.alianzamedellinantioquiaeducacion.com/'),
(39, 'Biblioteca PÃºblica Piloto', 'www.bibliotecapiloto.gov.co'),
(40, 'Buen Comienzo Antioquia', 'http://www.antioquia.gov.co/index.php/secretaria15/noticias151/21835-en-antioquia,-la-educaci%C3%B3n-de-calidad-se-brinda-desde-la-primera-infancia'),
(41, 'Buen  Comienzo MedellÃ­n', 'es-es.facebook.com/ProgramaBuenComienzo'),
(42, 'Cantoalegre', 'www.cantoalegre.org'),
(43, 'Colectivo Cultural Zona 2', '.'),
(44, 'Comfenalco Antioquia                         ', 'www.comfenalcoantioquia.com'),
(45, 'ComitÃ© de NarraciÃ³n Oral de MedellÃ­n', 'www.vivapalabra.com'),
(46, 'FundaciÃ³n Crea', 'http://www.fundacioncrea.com'),
(47, 'Primera Infancia, FundaciÃ³n Taller de Letras Jordi Sierra i Fabra', 'http://www.sierraifabra.com/ant/secciones/Fundacion_Taller_JSF/'),
(48, 'Universidad EAFIT, Universidad de los niÃ±os         ', 'www.eafit.edu.co/ninos'),
(49, 'Grupo EPM â€“ FundaciÃ³n EPM', 'www.fundacionepm.org.co'),
(50, 'Comfama', 'www.comfama.com'),
(51, 'CorporaciÃ³n Ideas y Palabras', 'https://www.facebook.com/CorporacionIdeasYPalabras'),
(52, 'FundaciÃ³n Imaginar                                                               ', 'www.fundacionimaginar.org/'),
(53, 'Inder MedellÃ­n', 'www.inder.gov.co'),
(54, 'FundaciÃ³n JardÃ­n BotÃ¡nico de MedellÃ­n ', 'www.botanicomedellin.org'),
(55, 'CorporaciÃ³n Museo de Arte Moderno de MedellÃ­n (MAMM)', 'www.elmamm.org'),
(56, 'El Morenito INC', 'www.elmorenitoinc.com'),
(57, 'MundoCreible', 'http://mundocreible.wix.com/estudio#!'),
(58, 'PabellÃ³n MultilingÃ¼e. Alianza Francesa - Universidad de Antioquia', 'medellin.alianzafrancesa.org.co/'),
(59, 'EL Colombiano, Prensa Escuela  ', 'http://www.ecbloguer.com/prensaescuela/'),
(60, 'FundaciÃ³n RatÃ³n de Biblioteca', 'www.ratondebiblioteca.com'),
(61, 'Red de Escritores, Universidad de Antioquia', 'www.reddebibliotecas.org.co/redescritores'),
(62, 'CorporaciÃ³n SalÃ³n del CÃ³mic MedellÃ­n', '.'),
(63, 'Sistema de Bibliotecas PÃºblicas de MedellÃ­n.', 'www.reddebibliotecas.org.co/.../Paginas/Abuelos_Cuenta_Cuentos.aspx'),
(64, 'Parque ZoolÃ³gico Santa Fe', 'www.zoologicosantafe.com'),
(65, 'FundaciÃ³n Universitaria Bellas Artes', 'www.bellasartesmed.edu.co'),
(66, 'Carpa de los Enamorados, FundaciÃ³n Taller de Letras Jordi Sierra i Fabra ', 'www.sierraifabra.com/ant/secciones/Fundacion_Taller_JSF/'),
(67, 'Museo Casa de la Memoria Y Sentimiento y palabra          ', 'www.museocasadelamemoria.org/'),
(68, 'FundaMundo', 'http://www.fundamundo.org/'),
(69, 'Crecer con Dignidad, SecretarÃ­a de InclusiÃ³n social y familia.', 'http://www.cis.org.co/index.php/mm-pry/mm-udea/mm-udeacrecercondignidad'),
(70, 'FundaciÃ³n Trash Art', ' https://es-la.facebook.com/fundacion.trashart'),
(71, 'CorporaciÃ³n EntreviÃ±etas', 'http://www.entrevinetas.com/'),
(72, 'Plasart Escuela de CÃ³mic y Desarrollo Creativo! ', 'https://es-la.facebook.com/pages/PLASART-Escuela.../26915549540');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `institution`
--

CREATE TABLE IF NOT EXISTS `institution` (
  `id_institution` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `mail` varchar(45) NOT NULL,
  `address` varchar(45) NOT NULL,
  `phone` int(10) NOT NULL,
  `neighborhood` varchar(45) NOT NULL,
  `comune` varchar(45) NOT NULL,
  `city` varchar(45) NOT NULL,
  `members_number` int(11) NOT NULL,
  `age_range` varchar(45) NOT NULL,
  `public_type_id` int(11) NOT NULL,
  `institution_type` varchar(45) NOT NULL,
  PRIMARY KEY (`id_institution`),
  KEY `public_type_id` (`public_type_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Volcado de datos para la tabla `institution`
--

INSERT INTO `institution` (`id_institution`, `name`, `mail`, `address`, `phone`, `neighborhood`, `comune`, `city`, `members_number`, `age_range`, `public_type_id`, `institution_type`) VALUES
(2, 'Federiko', 'laflordelilola@gmail.com', 'Calle 26A # 70 - 35 apto 204', 2569002, 'BelÃ©n San Bernardo', 'Comuna 16 - BelÃ©n', 'Medellin', 5, '', 1, 'InstituciÃ³n Educativa'),
(3, 'prueba2', 'yoddi.pino@gmail.com', 'cra-45 cordoba', 4444444, 'cualquiera', 'Comuna 14 - El Poblado', 'Medellin', 10, '', 2, 'InstituciÃ³n Educativa'),
(4, 'pablinho', 'pololo345@gmail.com', 'Calle del amor con carrera de la ilusiÃ³n', 4444444, 'poblado', 'Comuna 14 - El Poblado', 'Medellin', 10, '', 4, 'Grupo'),
(5, 'prueba3', 'prueba@prueba.com', 'calle prueba', 5555555, 'El de la loma', 'Comuna 11 - Laureles - Estadio: ', 'Medellin', 5, '', 1, 'Grupo'),
(6, 'AlejandraC', 'aleygallo@gmail.com', 'CRA 50 #59-06', 2147483647, 'prado', 'Comuna 10 - La Candelaria', 'Medellin', 40, '', 1, 'InstituciÃ³n Educativa'),
(7, 'AlejandraG', 'aleygallo@gmail.com', 'cra 43 a # 9-60', 2147483647, 'poblado', 'Comuna 14 - El Poblado', 'Medellin', 30, '', 8, 'Grupo'),
(8, 'asdasdasda', 'yoddi.pino@gmail.com', 'carrera 50 # 59 - 06 ', 234234, 'asdasdasda', 'Comuna 13 - San Javier', 'Medellin', 5, '', 1, 'Grupo'),
(9, 'prueba4', 'prueba@prueba.com', 'calle prueba', 5555555, 'El de la loma', 'Comuna 2 - Santa Cruz', 'Medellin', 5, '', 1, 'Grupo'),
(10, 'Club de Lectura Internacional ', 'plan.lectura@medellin.gov.co', 'Calle 44 # 52 - 165 ', 3855039, 'La Candelaria ', 'Comuna 10 - La Candelaria', 'Medellin', 20, '', 4, 'Grupo'),
(11, 'Colegio Palermo de San JosÃ©', 'nathalicrespo@hotmail.com', 'carrera 51 D N 85 24', 2147483647, 'Los Ãlamos ', 'Comuna 4 - Aranjuez', 'Medellin', 40, '', 5, 'InstituciÃ³n Educativa');

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
(5, 1),
(5, 2),
(5, 6),
(6, 1),
(8, 1),
(11, 4),
(11, 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `public_type`
--

CREATE TABLE IF NOT EXISTS `public_type` (
  `id_public_type` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id_public_type`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Volcado de datos para la tabla `public_type`
--

INSERT INTO `public_type` (`id_public_type`, `name`) VALUES
(1, '0 - 6 Primera infancia'),
(2, '7 - 12 NiÃ±os'),
(3, '13 - 18 JÃ³venes'),
(4, '19 - 26 JÃ³venes'),
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
(47, 1),
(47, 2),
(47, 3),
(47, 4),
(47, 5),
(47, 8),
(48, 1),
(48, 2),
(48, 3),
(48, 4),
(48, 5),
(48, 6),
(48, 7),
(48, 8),
(49, 1),
(49, 2),
(49, 8),
(50, 1),
(50, 8),
(51, 1),
(51, 2),
(51, 3),
(51, 4),
(51, 5),
(51, 8),
(52, 3),
(52, 4),
(52, 5),
(52, 8),
(53, 1),
(53, 8),
(54, 1),
(54, 2),
(54, 3),
(54, 4),
(54, 5),
(54, 6),
(54, 7),
(54, 8),
(55, 1),
(55, 2),
(55, 3),
(55, 4),
(55, 8),
(56, 1),
(56, 8),
(57, 2),
(57, 3),
(57, 4),
(57, 5),
(57, 6),
(57, 7),
(57, 8),
(58, 1),
(58, 2),
(58, 3),
(58, 4),
(58, 5),
(58, 6),
(58, 7),
(58, 8),
(59, 2),
(59, 4),
(59, 5),
(59, 6),
(59, 7),
(60, 1),
(60, 2),
(60, 3),
(60, 4),
(61, 2),
(61, 3),
(61, 4),
(61, 5),
(61, 6),
(61, 7),
(61, 8),
(62, 1),
(62, 2),
(62, 3),
(62, 4),
(62, 5),
(62, 6),
(62, 7),
(62, 8),
(63, 1),
(63, 2),
(63, 3),
(63, 4),
(63, 6),
(63, 7),
(63, 8),
(64, 2),
(64, 8),
(65, 2),
(65, 3),
(65, 5),
(65, 6),
(65, 7),
(65, 8),
(66, 1),
(66, 8),
(67, 2),
(67, 3),
(67, 5),
(67, 6),
(67, 7),
(67, 8),
(68, 1),
(68, 2),
(68, 3),
(68, 4),
(68, 5),
(68, 6),
(68, 7),
(68, 8),
(69, 1),
(70, 2),
(70, 3),
(70, 4),
(70, 8),
(71, 2),
(71, 3),
(71, 4),
(71, 5),
(72, 2),
(72, 3),
(72, 4),
(72, 5),
(72, 6),
(72, 7),
(72, 8),
(73, 1),
(73, 2),
(73, 3),
(73, 4),
(73, 5),
(73, 8),
(74, 1),
(74, 2),
(74, 3),
(74, 6),
(74, 7),
(75, 3),
(75, 4),
(75, 5),
(75, 6),
(75, 7),
(76, 2),
(76, 3),
(76, 5),
(76, 6),
(76, 7),
(77, 2),
(77, 3),
(77, 4),
(78, 2),
(78, 3),
(78, 4),
(78, 5),
(78, 8),
(79, 2),
(79, 3),
(79, 4),
(79, 5),
(80, 2),
(80, 3),
(80, 4),
(80, 5),
(81, 1),
(81, 2),
(81, 3),
(81, 4),
(81, 5),
(81, 6),
(81, 7),
(81, 8);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `register`
--

CREATE TABLE IF NOT EXISTS `register` (
  `id_register` int(11) NOT NULL AUTO_INCREMENT,
  `date` varchar(30) NOT NULL,
  `user` varchar(45) NOT NULL,
  `estado` varchar(45) NOT NULL,
  `workshop` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_register`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=39 ;

--
-- Volcado de datos para la tabla `register`
--

INSERT INTO `register` (`id_register`, `date`, `user`, `estado`, `workshop`) VALUES
(1, '2014-07-22 15:43:47:8532', 'Federiko', 'Inscrito', 'Alianza AMA'),
(2, '2014-07-22 15:45:07:6167', 'prueba1', 'Inscrito', 'Biblioteca PÃºblica Piloto'),
(3, '2014-07-22 15:53:01:5753', 'prueba2', 'Inscrito', 'Biblioteca PÃºblica Piloto'),
(4, '2014-07-22 15:53:49:1073', 'prueba2', 'Cancelado', 'Biblioteca PÃºblica Piloto'),
(5, '2014-07-22 15:55:05:6945', 'pablinho', 'Inscrito', 'Alianza AMA'),
(6, '2014-07-22 16:04:57:5579', 'prueba1', 'Cancelado', 'Biblioteca PÃºblica Piloto'),
(7, '2014-07-22 16:05:03:5660', 'prueba1', 'Inscrito', 'Biblioteca PÃºblica Piloto'),
(8, '2014-07-22 16:05:41:7795', 'prueba2', 'Inscrito', 'Alianza AMA'),
(9, '2014-07-22 16:06:11:8228', 'pablinho', 'Cancelado', 'Alianza AMA'),
(10, '2014-07-22 16:32:48:8613', 'prueba1', 'Cancelado', 'Biblioteca PÃºblica Piloto'),
(11, '2014-07-23 14:07:57:1372', 'prueba1', 'Inscrito', 'Biblioteca PÃºblica Piloto'),
(12, '2014-07-23 14:09:21:5424', 'prueba1', 'Cancelado', 'Biblioteca PÃºblica Piloto'),
(13, '2014-07-23 14:09:27:1611', 'prueba1', 'Inscrito', 'Biblioteca PÃºblica Piloto'),
(14, '2014-07-23 14:10:03:3374', 'prueba1', 'Cancelado', 'Biblioteca PÃºblica Piloto'),
(15, '2014-07-23 14:10:08:6037', 'prueba1', 'Inscrito', 'Biblioteca PÃºblica Piloto'),
(16, '2014-07-23 14:10:21:8805', 'prueba1', 'Cancelado', 'Biblioteca PÃºblica Piloto'),
(17, '2014-07-23 15:05:46:7245', 'prueba1', 'Inscrito', 'Biblioteca PÃºblica Piloto'),
(18, '2014-07-23 15:05:49:6508', 'prueba1', 'Cancelado', 'Biblioteca PÃºblica Piloto'),
(19, '2014-07-23 16:17:18:4399', 'prueba1', 'Inscrito', 'Biblioteca PÃºblica Piloto'),
(20, '2014-07-23 16:17:28:4317', 'prueba1', 'Cancelado', 'Biblioteca PÃºblica Piloto'),
(21, '2014-07-23 16:21:05:8559', 'prueba1', 'Inscrito', 'Biblioteca PÃºblica Piloto'),
(22, '2014-07-23 16:21:14:2143', 'prueba1', 'Cancelado', 'Biblioteca PÃºblica Piloto'),
(23, '2014-07-23 16:21:42:0791', 'prueba1', 'Inscrito', 'Biblioteca PÃºblica Piloto'),
(24, '2014-07-23 16:30:56:2706', 'prueba1', 'Cancelado', 'Biblioteca PÃºblica Piloto'),
(25, '2014-07-23 16:31:06:8627', 'prueba1', 'Inscrito', 'Biblioteca PÃºblica Piloto'),
(26, '2014-07-23 16:31:15:3001', 'prueba1', 'Cancelado', 'Biblioteca PÃºblica Piloto'),
(27, '2014-07-23 16:31:25:4753', 'prueba1', 'Inscrito', 'Biblioteca PÃºblica Piloto'),
(28, '2014-07-23 16:31:30:8372', 'prueba1', 'Cancelado', 'Biblioteca PÃºblica Piloto'),
(29, '2014-07-23 18:53:52:5327', 'prueba3', 'Inscrito', 'Biblioteca PÃºblica Piloto'),
(30, '2014-07-23 18:54:11:5175', 'prueba3', 'Cancelado', 'Biblioteca PÃºblica Piloto'),
(31, '2014-07-24 16:05:29:9971', 'AlejandraC', 'Inscrito', 'BIBLIOTECA PÃšBLICA PILOTO'),
(32, '2014-07-24 16:18:40:5406', 'yuliana', 'Inscrito', 'Cantoalegre'),
(33, '2014-07-24 16:52:23:3422', 'yuliana', 'Cancelado', 'Cantoalegre'),
(34, '2014-07-24 16:58:31:1799', 'AlejandraC', 'Cancelado', 'BIBLIOTECA PÃšBLICA PILOTO'),
(35, '2014-07-24 17:22:34:7180', 'AlejandraG', 'Inscrito', 'Buen  Comienzo MedellÃ­n'),
(36, '2014-07-24 17:23:43:8514', 'Natha', 'Inscrito', 'Cantoalegre'),
(37, '2014-07-24 17:34:52:1311', 'Natha', 'Cancelado', 'Cantoalegre'),
(38, '2014-07-24 17:35:20:1380', 'Natha', 'Inscrito', 'BIBLIOTECA PÃšBLICA PILOTO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `responsible`
--

CREATE TABLE IF NOT EXISTS `responsible` (
  `id_responsible` varchar(45) NOT NULL,
  `name` varchar(45) NOT NULL,
  `celular` varchar(10) NOT NULL,
  `mail` varchar(45) NOT NULL,
  `institution_id` int(11) NOT NULL,
  PRIMARY KEY (`id_responsible`),
  UNIQUE KEY `institution_id` (`institution_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `responsible`
--

INSERT INTO `responsible` (`id_responsible`, `name`, `celular`, `mail`, `institution_id`) VALUES
('1020394514', 'Federiko', '3014027405', 'federiko@federiko.com', 2),
('102209123', 'adsdasdas', '1232132312', 'yoddi.pino@hotmail.com', 8),
('1037587079', 'pablinho', '3147984567', 'pololo345@gmail.com', 4),
('1127228879', 'Alejandra', '3012169301', 'aleygallo@gmail.com', 7),
('1234533333', 'prueba1', '3136547898', 'yoddi.pino@gmail.com', 1),
('1234554321', 'Alejandra C', '3136547898', 'aleygallo@gmail.com', 6),
('1234567', 'Responsable', '6666666666', 'correo@correo.com', 9),
('1234567222', 'liliana', '3114325436', 'yoddi.pino@gmail.com', 3),
('3225789000', 'Nathalia Ortega', '3016428240', 'nathalicrespo@hotmail.com', 11),
('43869343', 'Margarita Villada Monsalve', '3003460208', 'margarita.villada@medellin.gov.co', 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `specific_condition`
--

CREATE TABLE IF NOT EXISTS `specific_condition` (
  `id_specific_condition` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  PRIMARY KEY (`id_specific_condition`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Volcado de datos para la tabla `specific_condition`
--

INSERT INTO `specific_condition` (`id_specific_condition`, `name`) VALUES
(1, 'Invidentes'),
(2, 'Discapacidad Cognitiva'),
(3, 'DÃ©ficit de atenciÃ³n'),
(4, 'Movilidad reducida'),
(5, 'Sordos'),
(6, 'PoblaciÃ³n vulnerable o en riesgo social');

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
(48, 1),
(48, 6),
(51, 3),
(51, 2),
(51, 1),
(51, 4),
(51, 6),
(52, 4),
(54, 3),
(54, 2),
(54, 1),
(54, 4),
(54, 6),
(54, 5),
(55, 3),
(55, 6),
(57, 3),
(57, 2),
(57, 4),
(57, 6),
(58, 6),
(61, 3),
(61, 2),
(61, 1),
(61, 4),
(61, 6),
(61, 5),
(62, 3),
(62, 2),
(62, 1),
(62, 4),
(62, 6),
(62, 5),
(64, 1),
(64, 6),
(65, 6),
(67, 1),
(67, 4),
(67, 6),
(68, 1),
(68, 4),
(68, 6),
(71, 3),
(71, 4),
(72, 1),
(72, 5),
(73, 2),
(73, 6),
(73, 5),
(74, 3),
(74, 2),
(74, 1),
(74, 6),
(75, 4),
(75, 6),
(76, 3),
(76, 1),
(76, 4),
(76, 6),
(78, 6),
(79, 6),
(79, 5),
(81, 3),
(81, 2),
(81, 1),
(81, 4),
(81, 6),
(81, 5);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=97 ;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `permission_level`, `institution_id`) VALUES
(60, 'Administrador', 'b91c64d9189708dfc87b58d5ee7524c4a07c5bb0', 1, 0),
(86, 'prueba1', 'bee7937e4d5ce1ca31a08c1bf799a0e77386e0f3', 2, 1),
(87, 'Federiko', '5b158e17949d243d277e252c77327ebb8f3c1325', 2, 2),
(88, 'prueba2', 'b024a41a94dedbc507b42c14961b739af9dbfea8', 2, 3),
(89, 'pablinho', 'ec7073559161cdca2b63afba9a6b35f138e48810', 2, 4),
(90, 'prueba3', '54981efefc514705e6c8a184936a36d0e823370d', 2, 5),
(91, 'AlejandraC', 'be66b3fda4cc085c1c49a9044b68168566821dd5', 2, 6),
(92, 'AlejandraG', '0f9a3b77bca3df7a136eeaa8d68fbcbeb3f0c379', 2, 7),
(93, 'yuliana', 'be66b3fda4cc085c1c49a9044b68168566821dd5', 2, 8),
(94, 'prueba4', 'cfb383b9e3408411d76b4ef17eaa43631f2cc9c0', 2, 9),
(95, 'Margarita Villada Monsalve ', '406ab93ed1e2d04aa0ba152cf05a5d57c750e54f', 2, 10),
(96, 'Natha', 'e9da90b82b3b76390ffd6ce1ba420e2fbb8c5ada', 2, 11);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `workshop`
--

CREATE TABLE IF NOT EXISTS `workshop` (
  `id_workshop` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(256) NOT NULL,
  `description` varchar(500) NOT NULL,
  `entity_id` int(11) NOT NULL,
  PRIMARY KEY (`id_workshop`),
  KEY `entity_id` (`entity_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=82 ;

--
-- Volcado de datos para la tabla `workshop`
--

INSERT INTO `workshop` (`id_workshop`, `name`, `description`, `entity_id`) VALUES
(47, 'Alianza AMA', 'Alianza AMA', 38),
(48, 'BIBLIOTECA PÃšBLICA PILOTO', 'BIBLIOTECA PÃšBLICA PILOTO', 39),
(49, 'Buen Comienzo Antioquia', 'Buen Comienzo Antioquia', 40),
(50, 'Buen  Comienzo MedellÃ­n', 'Buen  Comienzo MedellÃ­n', 41),
(51, 'Cantoalegre', 'Cantoalegre', 42),
(52, 'Cartas de Vida', 'Cartas de Vida', 43),
(53, 'Bebeteca ', 'Bebeteca', 44),
(54, 'ComitÃ© de NarraciÃ³n Oral', 'ComitÃ© de NarraciÃ³n Oral', 45),
(55, 'Crea', 'Crea', 46),
(56, '1ra. Infancia', '1ra. Infancia', 47),
(57, 'Universidad de los NiÃ±os', 'Universidad de los NiÃ±os', 48),
(58, 'EPM', 'EPM', 49),
(59, 'Comfama', 'Comfama', 50),
(60, 'CorporaciÃ³n Ideas y Palabras', 'CorporaciÃ³n Ideas y Palabras', 51),
(61, 'FundaciÃ³n Imaginar', 'FundaciÃ³n Imaginar', 52),
(62, 'INDER', 'INDER', 53),
(63, 'FundaciÃ³n JardÃ­n BotÃ¡nico de MedellÃ­n ', 'FundaciÃ³n JardÃ­n BotÃ¡nico de MedellÃ­n ', 54),
(64, 'MAMM', 'MAMM', 55),
(65, 'El Morenito INC', 'El Morenito INC', 56),
(66, 'MundoCreible', 'MundoCreible', 57),
(67, 'PabellÃ³n', 'PabellÃ³n', 58),
(68, 'Prensa escuela', 'Prensa escuela', 59),
(69, 'RatÃ³n de biblioteca', 'RatÃ³n de biblioteca', 60),
(70, 'En tu bosque mis pasos', 'En tu bosque mis pasos', 61),
(71, 'SalÃ³n del cÃ³mic', 'SalÃ³n del cÃ³mic', 62),
(72, 'Abuelos cuenta cuentos', 'Abuelos cuenta cuentos', 63),
(73, 'Zoo', 'Zoo', 64),
(74, 'Bellas Artes', 'Bellas Artes', 65),
(75, 'Carpa de los enamorados', 'Carpa de los enamorados', 66),
(76, 'Sentimiento y Palabra', 'Sentimiento y Palabra', 67),
(77, 'Fundamundo', 'Fundamundo', 68),
(78, 'Crecer con dignidad', 'crecer con dignidad', 69),
(79, 'TrashArt', 'TrashArt', 70),
(80, 'EntreviÃ±etas', 'EntreviÃ±etas', 71),
(81, 'Plasart', 'Plasart', 72);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `workshop_session`
--

CREATE TABLE IF NOT EXISTS `workshop_session` (
  `id_workshop_session` int(11) NOT NULL AUTO_INCREMENT,
  `workshop_day` date NOT NULL,
  `workshop_time` time NOT NULL,
  `travel_time` time NOT NULL,
  `workshop_id` int(11) NOT NULL,
  `institution_id` int(11) NOT NULL,
  `seleccionar_archivo` varchar(225) DEFAULT NULL,
  PRIMARY KEY (`id_workshop_session`),
  KEY `workshop_id` (`workshop_id`),
  KEY `workshop_id_2` (`workshop_id`),
  KEY `institution_id` (`institution_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=398 ;

--
-- Volcado de datos para la tabla `workshop_session`
--

INSERT INTO `workshop_session` (`id_workshop_session`, `workshop_day`, `workshop_time`, `travel_time`, `workshop_id`, `institution_id`, `seleccionar_archivo`) VALUES
(1, '0000-00-00', '00:00:00', '00:00:00', 0, 0, 'Carga1_47_48_49_50_51.csv'),
(2, '2014-09-12', '10:00:00', '11:00:00', 47, 0, NULL),
(3, '2014-09-12', '11:00:00', '10:00:00', 47, 0, NULL),
(4, '2014-09-12', '12:00:00', '13:00:00', 47, 0, NULL),
(5, '2014-09-12', '13:00:00', '12:00:00', 47, 0, NULL),
(6, '2014-09-12', '14:00:00', '15:00:00', 47, 0, NULL),
(7, '2014-09-12', '15:00:00', '14:00:00', 47, 0, NULL),
(8, '2014-09-12', '16:00:00', '17:00:00', 47, 0, NULL),
(9, '2014-09-12', '17:00:00', '16:00:00', 47, 0, NULL),
(10, '2014-09-13', '10:00:00', '11:00:00', 47, 0, NULL),
(11, '2014-09-13', '11:00:00', '10:00:00', 47, 0, NULL),
(12, '2014-09-13', '12:00:00', '13:00:00', 47, 0, NULL),
(13, '2014-09-13', '13:00:00', '12:00:00', 47, 0, NULL),
(14, '2014-09-13', '14:00:00', '15:00:00', 47, 0, NULL),
(15, '2014-09-13', '15:00:00', '14:00:00', 47, 0, NULL),
(16, '2014-09-13', '16:00:00', '17:00:00', 47, 0, NULL),
(17, '2014-09-13', '17:00:00', '16:00:00', 47, 0, NULL),
(18, '2014-09-14', '11:00:00', '10:00:00', 47, 0, NULL),
(19, '2014-09-14', '12:00:00', '13:00:00', 47, 0, NULL),
(20, '2014-09-14', '13:00:00', '12:00:00', 47, 0, NULL),
(21, '2014-09-14', '14:00:00', '15:00:00', 47, 0, NULL),
(22, '2014-09-14', '15:00:00', '14:00:00', 47, 0, NULL),
(23, '2014-09-14', '16:00:00', '17:00:00', 47, 0, NULL),
(24, '2014-09-14', '17:00:00', '16:00:00', 47, 0, NULL),
(25, '2014-09-15', '10:00:00', '11:00:00', 47, 0, NULL),
(26, '2014-09-15', '11:00:00', '10:00:00', 47, 0, NULL),
(27, '2014-09-15', '12:00:00', '13:00:00', 47, 0, NULL),
(28, '2014-09-15', '13:00:00', '12:00:00', 47, 0, NULL),
(29, '2014-09-15', '14:00:00', '15:00:00', 47, 0, NULL),
(30, '2014-09-15', '15:00:00', '14:00:00', 47, 0, NULL),
(31, '2014-09-15', '16:00:00', '17:00:00', 47, 0, NULL),
(32, '2014-09-15', '17:00:00', '16:00:00', 47, 0, NULL),
(33, '2014-09-16', '10:00:00', '11:00:00', 47, 0, NULL),
(34, '2014-09-16', '11:00:00', '10:00:00', 47, 0, NULL),
(35, '2014-09-16', '12:00:00', '13:00:00', 47, 0, NULL),
(36, '2014-09-16', '13:00:00', '12:00:00', 47, 0, NULL),
(37, '2014-09-16', '14:00:00', '15:00:00', 47, 0, NULL),
(38, '2014-09-16', '15:00:00', '14:00:00', 47, 0, NULL),
(39, '2014-09-16', '16:00:00', '17:00:00', 47, 0, NULL),
(40, '2014-09-16', '17:00:00', '16:00:00', 47, 0, NULL),
(41, '2014-09-17', '10:00:00', '11:00:00', 47, 0, NULL),
(42, '2014-09-17', '11:00:00', '10:00:00', 47, 0, NULL),
(43, '2014-09-17', '12:00:00', '13:00:00', 47, 0, NULL),
(44, '2014-09-17', '13:00:00', '12:00:00', 47, 0, NULL),
(45, '2014-09-17', '14:00:00', '15:00:00', 47, 0, NULL),
(46, '2014-09-17', '15:00:00', '14:00:00', 47, 0, NULL),
(47, '2014-09-17', '16:00:00', '17:00:00', 47, 0, NULL),
(48, '2014-09-17', '17:00:00', '16:00:00', 47, 0, NULL),
(49, '2014-09-18', '10:00:00', '11:00:00', 47, 0, NULL),
(50, '2014-09-18', '11:00:00', '10:00:00', 47, 0, NULL),
(51, '2014-09-18', '12:00:00', '13:00:00', 47, 0, NULL),
(52, '2014-09-18', '13:00:00', '12:00:00', 47, 0, NULL),
(53, '2014-09-18', '14:00:00', '15:00:00', 47, 0, NULL),
(54, '2014-09-18', '15:00:00', '14:00:00', 47, 0, NULL),
(55, '2014-09-18', '16:00:00', '17:00:00', 47, 0, NULL),
(56, '2014-09-18', '17:00:00', '16:00:00', 47, 0, NULL),
(57, '2014-09-19', '10:00:00', '11:00:00', 47, 0, NULL),
(58, '2014-09-19', '11:00:00', '10:00:00', 47, 0, NULL),
(59, '2014-09-19', '12:00:00', '13:00:00', 47, 0, NULL),
(60, '2014-09-19', '13:00:00', '12:00:00', 47, 0, NULL),
(61, '2014-09-19', '14:00:00', '15:00:00', 47, 0, NULL),
(62, '2014-09-19', '15:00:00', '14:00:00', 47, 0, NULL),
(63, '2014-09-19', '16:00:00', '17:00:00', 47, 0, NULL),
(64, '2014-09-19', '17:00:00', '16:00:00', 47, 0, NULL),
(65, '2014-09-20', '10:00:00', '11:00:00', 47, 0, NULL),
(66, '2014-09-20', '11:00:00', '10:00:00', 47, 0, NULL),
(67, '2014-09-20', '12:00:00', '13:00:00', 47, 0, NULL),
(68, '2014-09-20', '13:00:00', '12:00:00', 47, 0, NULL),
(69, '2014-09-20', '14:00:00', '15:00:00', 47, 0, NULL),
(70, '2014-09-20', '15:00:00', '14:00:00', 47, 0, NULL),
(71, '2014-09-20', '16:00:00', '17:00:00', 47, 0, NULL),
(72, '2014-09-20', '17:00:00', '16:00:00', 47, 0, NULL),
(73, '2014-09-21', '10:00:00', '11:00:00', 47, 0, NULL),
(74, '2014-09-21', '11:00:00', '10:00:00', 47, 0, NULL),
(75, '2014-09-21', '12:00:00', '13:00:00', 47, 0, NULL),
(76, '2014-09-21', '13:00:00', '12:00:00', 47, 0, NULL),
(77, '2014-09-21', '14:00:00', '15:00:00', 47, 0, NULL),
(78, '2014-09-21', '15:00:00', '14:00:00', 47, 0, NULL),
(79, '2014-09-21', '16:00:00', '17:00:00', 47, 0, NULL),
(80, '2014-09-21', '17:00:00', '16:00:00', 47, 0, NULL),
(81, '2014-09-12', '10:00:00', '11:00:00', 48, 0, NULL),
(82, '2014-09-12', '11:00:00', '10:00:00', 48, 0, NULL),
(83, '2014-09-12', '12:00:00', '13:00:00', 48, 0, NULL),
(84, '2014-09-12', '13:00:00', '12:00:00', 48, 0, NULL),
(85, '2014-09-12', '14:00:00', '15:00:00', 48, 0, NULL),
(86, '2014-09-12', '15:00:00', '14:00:00', 48, 0, NULL),
(87, '2014-09-12', '16:00:00', '17:00:00', 48, 0, NULL),
(88, '2014-09-12', '17:00:00', '16:00:00', 48, 0, NULL),
(89, '2014-09-13', '10:00:00', '11:00:00', 48, 0, NULL),
(90, '2014-09-13', '11:00:00', '10:00:00', 48, 0, NULL),
(91, '2014-09-13', '12:00:00', '13:00:00', 48, 0, NULL),
(92, '2014-09-13', '13:00:00', '12:00:00', 48, 0, NULL),
(93, '2014-09-13', '14:00:00', '15:00:00', 48, 0, NULL),
(94, '2014-09-13', '15:00:00', '14:00:00', 48, 0, NULL),
(95, '2014-09-13', '16:00:00', '17:00:00', 48, 0, NULL),
(96, '2014-09-13', '17:00:00', '16:00:00', 48, 0, NULL),
(97, '2014-09-14', '11:00:00', '10:00:00', 48, 0, NULL),
(98, '2014-09-14', '12:00:00', '13:00:00', 48, 0, NULL),
(99, '2014-09-14', '13:00:00', '12:00:00', 48, 0, NULL),
(100, '2014-09-14', '14:00:00', '15:00:00', 48, 0, NULL),
(101, '2014-09-14', '15:00:00', '14:00:00', 48, 0, NULL),
(102, '2014-09-14', '16:00:00', '17:00:00', 48, 0, NULL),
(103, '2014-09-14', '17:00:00', '16:00:00', 48, 0, NULL),
(104, '2014-09-15', '10:00:00', '11:00:00', 48, 0, NULL),
(105, '2014-09-15', '11:00:00', '10:00:00', 48, 0, NULL),
(106, '2014-09-15', '12:00:00', '13:00:00', 48, 0, NULL),
(107, '2014-09-15', '13:00:00', '12:00:00', 48, 0, NULL),
(108, '2014-09-15', '14:00:00', '15:00:00', 48, 0, NULL),
(109, '2014-09-15', '15:00:00', '14:00:00', 48, 0, NULL),
(110, '2014-09-15', '16:00:00', '17:00:00', 48, 0, NULL),
(111, '2014-09-15', '17:00:00', '16:00:00', 48, 0, NULL),
(112, '2014-09-16', '10:00:00', '11:00:00', 48, 11, NULL),
(113, '2014-09-16', '11:00:00', '10:00:00', 48, 0, NULL),
(114, '2014-09-16', '12:00:00', '13:00:00', 48, 0, NULL),
(115, '2014-09-16', '13:00:00', '12:00:00', 48, 0, NULL),
(116, '2014-09-16', '14:00:00', '15:00:00', 48, 0, NULL),
(117, '2014-09-16', '15:00:00', '14:00:00', 48, 0, NULL),
(118, '2014-09-16', '16:00:00', '17:00:00', 48, 0, NULL),
(119, '2014-09-16', '17:00:00', '16:00:00', 48, 0, NULL),
(120, '2014-09-17', '10:00:00', '11:00:00', 48, 0, NULL),
(121, '2014-09-17', '11:00:00', '10:00:00', 48, 0, NULL),
(122, '2014-09-17', '12:00:00', '13:00:00', 48, 0, NULL),
(123, '2014-09-17', '13:00:00', '12:00:00', 48, 0, NULL),
(124, '2014-09-17', '14:00:00', '15:00:00', 48, 0, NULL),
(125, '2014-09-17', '15:00:00', '14:00:00', 48, 0, NULL),
(126, '2014-09-17', '16:00:00', '17:00:00', 48, 0, NULL),
(127, '2014-09-17', '17:00:00', '16:00:00', 48, 0, NULL),
(128, '2014-09-18', '10:00:00', '11:00:00', 48, 0, NULL),
(129, '2014-09-18', '11:00:00', '10:00:00', 48, 0, NULL),
(130, '2014-09-18', '12:00:00', '13:00:00', 48, 0, NULL),
(131, '2014-09-18', '13:00:00', '12:00:00', 48, 0, NULL),
(132, '2014-09-18', '14:00:00', '15:00:00', 48, 0, NULL),
(133, '2014-09-18', '15:00:00', '14:00:00', 48, 0, NULL),
(134, '2014-09-18', '16:00:00', '17:00:00', 48, 0, NULL),
(135, '2014-09-18', '17:00:00', '16:00:00', 48, 0, NULL),
(136, '2014-09-19', '10:00:00', '11:00:00', 48, 0, NULL),
(137, '2014-09-19', '11:00:00', '10:00:00', 48, 0, NULL),
(138, '2014-09-19', '12:00:00', '13:00:00', 48, 0, NULL),
(139, '2014-09-19', '13:00:00', '12:00:00', 48, 0, NULL),
(140, '2014-09-19', '14:00:00', '15:00:00', 48, 0, NULL),
(141, '2014-09-19', '15:00:00', '14:00:00', 48, 0, NULL),
(142, '2014-09-19', '16:00:00', '17:00:00', 48, 0, NULL),
(143, '2014-09-19', '17:00:00', '16:00:00', 48, 0, NULL),
(144, '2014-09-20', '10:00:00', '11:00:00', 48, 0, NULL),
(145, '2014-09-20', '11:00:00', '10:00:00', 48, 0, NULL),
(146, '2014-09-20', '12:00:00', '13:00:00', 48, 0, NULL),
(147, '2014-09-20', '13:00:00', '12:00:00', 48, 0, NULL),
(148, '2014-09-20', '14:00:00', '15:00:00', 48, 0, NULL),
(149, '2014-09-20', '15:00:00', '14:00:00', 48, 0, NULL),
(150, '2014-09-20', '16:00:00', '17:00:00', 48, 0, NULL),
(151, '2014-09-20', '17:00:00', '16:00:00', 48, 0, NULL),
(152, '2014-09-21', '10:00:00', '11:00:00', 48, 0, NULL),
(153, '2014-09-21', '11:00:00', '10:00:00', 48, 0, NULL),
(154, '2014-09-21', '12:00:00', '13:00:00', 48, 0, NULL),
(155, '2014-09-21', '13:00:00', '12:00:00', 48, 0, NULL),
(156, '2014-09-21', '14:00:00', '15:00:00', 48, 0, NULL),
(157, '2014-09-21', '15:00:00', '14:00:00', 48, 0, NULL),
(158, '2014-09-21', '16:00:00', '17:00:00', 48, 0, NULL),
(159, '2014-09-21', '17:00:00', '16:00:00', 48, 0, NULL),
(160, '2014-09-12', '10:00:00', '11:00:00', 49, 0, NULL),
(161, '2014-09-12', '11:00:00', '10:00:00', 49, 0, NULL),
(162, '2014-09-12', '12:00:00', '13:00:00', 49, 0, NULL),
(163, '2014-09-12', '13:00:00', '12:00:00', 49, 0, NULL),
(164, '2014-09-12', '14:00:00', '15:00:00', 49, 0, NULL),
(165, '2014-09-12', '15:00:00', '14:00:00', 49, 0, NULL),
(166, '2014-09-12', '16:00:00', '17:00:00', 49, 0, NULL),
(167, '2014-09-12', '17:00:00', '16:00:00', 49, 0, NULL),
(168, '2014-09-13', '10:00:00', '11:00:00', 49, 0, NULL),
(169, '2014-09-13', '11:00:00', '10:00:00', 49, 0, NULL),
(170, '2014-09-13', '12:00:00', '13:00:00', 49, 0, NULL),
(171, '2014-09-13', '13:00:00', '12:00:00', 49, 0, NULL),
(172, '2014-09-13', '14:00:00', '15:00:00', 49, 0, NULL),
(173, '2014-09-13', '15:00:00', '14:00:00', 49, 0, NULL),
(174, '2014-09-13', '16:00:00', '17:00:00', 49, 0, NULL),
(175, '2014-09-13', '17:00:00', '16:00:00', 49, 0, NULL),
(176, '2014-09-14', '11:00:00', '10:00:00', 49, 0, NULL),
(177, '2014-09-14', '12:00:00', '13:00:00', 49, 0, NULL),
(178, '2014-09-14', '13:00:00', '12:00:00', 49, 0, NULL),
(179, '2014-09-14', '14:00:00', '15:00:00', 49, 0, NULL),
(180, '2014-09-14', '15:00:00', '14:00:00', 49, 0, NULL),
(181, '2014-09-14', '16:00:00', '17:00:00', 49, 0, NULL),
(182, '2014-09-14', '17:00:00', '16:00:00', 49, 0, NULL),
(183, '2014-09-15', '10:00:00', '11:00:00', 49, 0, NULL),
(184, '2014-09-15', '11:00:00', '10:00:00', 49, 0, NULL),
(185, '2014-09-15', '12:00:00', '13:00:00', 49, 0, NULL),
(186, '2014-09-15', '13:00:00', '12:00:00', 49, 0, NULL),
(187, '2014-09-15', '14:00:00', '15:00:00', 49, 0, NULL),
(188, '2014-09-15', '15:00:00', '14:00:00', 49, 0, NULL),
(189, '2014-09-15', '16:00:00', '17:00:00', 49, 0, NULL),
(190, '2014-09-15', '17:00:00', '16:00:00', 49, 0, NULL),
(191, '2014-09-16', '10:00:00', '11:00:00', 49, 0, NULL),
(192, '2014-09-16', '11:00:00', '10:00:00', 49, 0, NULL),
(193, '2014-09-16', '12:00:00', '13:00:00', 49, 0, NULL),
(194, '2014-09-16', '13:00:00', '12:00:00', 49, 0, NULL),
(195, '2014-09-16', '14:00:00', '15:00:00', 49, 0, NULL),
(196, '2014-09-16', '15:00:00', '14:00:00', 49, 0, NULL),
(197, '2014-09-16', '16:00:00', '17:00:00', 49, 0, NULL),
(198, '2014-09-16', '17:00:00', '16:00:00', 49, 0, NULL),
(199, '2014-09-17', '10:00:00', '11:00:00', 49, 0, NULL),
(200, '2014-09-17', '11:00:00', '10:00:00', 49, 0, NULL),
(201, '2014-09-17', '12:00:00', '13:00:00', 49, 0, NULL),
(202, '2014-09-17', '13:00:00', '12:00:00', 49, 0, NULL),
(203, '2014-09-17', '14:00:00', '15:00:00', 49, 0, NULL),
(204, '2014-09-17', '15:00:00', '14:00:00', 49, 0, NULL),
(205, '2014-09-17', '16:00:00', '17:00:00', 49, 0, NULL),
(206, '2014-09-17', '17:00:00', '16:00:00', 49, 0, NULL),
(207, '2014-09-18', '10:00:00', '11:00:00', 49, 0, NULL),
(208, '2014-09-18', '11:00:00', '10:00:00', 49, 0, NULL),
(209, '2014-09-18', '12:00:00', '13:00:00', 49, 0, NULL),
(210, '2014-09-18', '13:00:00', '12:00:00', 49, 0, NULL),
(211, '2014-09-18', '14:00:00', '15:00:00', 49, 0, NULL),
(212, '2014-09-18', '15:00:00', '14:00:00', 49, 0, NULL),
(213, '2014-09-18', '16:00:00', '17:00:00', 49, 0, NULL),
(214, '2014-09-18', '17:00:00', '16:00:00', 49, 0, NULL),
(215, '2014-09-19', '10:00:00', '11:00:00', 49, 0, NULL),
(216, '2014-09-19', '11:00:00', '10:00:00', 49, 0, NULL),
(217, '2014-09-19', '12:00:00', '13:00:00', 49, 0, NULL),
(218, '2014-09-19', '13:00:00', '12:00:00', 49, 0, NULL),
(219, '2014-09-19', '14:00:00', '15:00:00', 49, 0, NULL),
(220, '2014-09-19', '15:00:00', '14:00:00', 49, 0, NULL),
(221, '2014-09-19', '16:00:00', '17:00:00', 49, 0, NULL),
(222, '2014-09-19', '17:00:00', '16:00:00', 49, 0, NULL),
(223, '2014-09-20', '10:00:00', '11:00:00', 49, 0, NULL),
(224, '2014-09-20', '11:00:00', '10:00:00', 49, 0, NULL),
(225, '2014-09-20', '12:00:00', '13:00:00', 49, 0, NULL),
(226, '2014-09-20', '13:00:00', '12:00:00', 49, 0, NULL),
(227, '2014-09-20', '14:00:00', '15:00:00', 49, 0, NULL),
(228, '2014-09-20', '15:00:00', '14:00:00', 49, 0, NULL),
(229, '2014-09-20', '16:00:00', '17:00:00', 49, 0, NULL),
(230, '2014-09-20', '17:00:00', '16:00:00', 49, 0, NULL),
(231, '2014-09-21', '10:00:00', '11:00:00', 49, 0, NULL),
(232, '2014-09-21', '11:00:00', '10:00:00', 49, 0, NULL),
(233, '2014-09-21', '12:00:00', '13:00:00', 49, 0, NULL),
(234, '2014-09-21', '13:00:00', '12:00:00', 49, 0, NULL),
(235, '2014-09-21', '14:00:00', '15:00:00', 49, 0, NULL),
(236, '2014-09-21', '15:00:00', '14:00:00', 49, 0, NULL),
(237, '2014-09-21', '16:00:00', '17:00:00', 49, 0, NULL),
(238, '2014-09-21', '17:00:00', '16:00:00', 49, 0, NULL),
(239, '2014-09-12', '10:00:00', '11:00:00', 50, 0, NULL),
(240, '2014-09-12', '11:00:00', '10:00:00', 50, 0, NULL),
(241, '2014-09-12', '12:00:00', '13:00:00', 50, 0, NULL),
(242, '2014-09-12', '13:00:00', '12:00:00', 50, 0, NULL),
(243, '2014-09-12', '14:00:00', '15:00:00', 50, 0, NULL),
(244, '2014-09-12', '15:00:00', '14:00:00', 50, 0, NULL),
(245, '2014-09-12', '16:00:00', '17:00:00', 50, 0, NULL),
(246, '2014-09-12', '17:00:00', '16:00:00', 50, 0, NULL),
(247, '2014-09-13', '10:00:00', '11:00:00', 50, 0, NULL),
(248, '2014-09-13', '11:00:00', '10:00:00', 50, 0, NULL),
(249, '2014-09-13', '12:00:00', '13:00:00', 50, 0, NULL),
(250, '2014-09-13', '13:00:00', '12:00:00', 50, 0, NULL),
(251, '2014-09-13', '14:00:00', '15:00:00', 50, 0, NULL),
(252, '2014-09-13', '15:00:00', '14:00:00', 50, 0, NULL),
(253, '2014-09-13', '16:00:00', '17:00:00', 50, 0, NULL),
(254, '2014-09-13', '17:00:00', '16:00:00', 50, 0, NULL),
(255, '2014-09-14', '11:00:00', '10:00:00', 50, 0, NULL),
(256, '2014-09-14', '12:00:00', '13:00:00', 50, 0, NULL),
(257, '2014-09-14', '13:00:00', '12:00:00', 50, 0, NULL),
(258, '2014-09-14', '14:00:00', '15:00:00', 50, 0, NULL),
(259, '2014-09-14', '15:00:00', '14:00:00', 50, 0, NULL),
(260, '2014-09-14', '16:00:00', '17:00:00', 50, 0, NULL),
(261, '2014-09-14', '17:00:00', '16:00:00', 50, 0, NULL),
(262, '2014-09-15', '10:00:00', '11:00:00', 50, 7, NULL),
(263, '2014-09-15', '11:00:00', '10:00:00', 50, 0, NULL),
(264, '2014-09-15', '12:00:00', '13:00:00', 50, 0, NULL),
(265, '2014-09-15', '13:00:00', '12:00:00', 50, 0, NULL),
(266, '2014-09-15', '14:00:00', '15:00:00', 50, 0, NULL),
(267, '2014-09-15', '15:00:00', '14:00:00', 50, 0, NULL),
(268, '2014-09-15', '16:00:00', '17:00:00', 50, 0, NULL),
(269, '2014-09-15', '17:00:00', '16:00:00', 50, 0, NULL),
(270, '2014-09-16', '10:00:00', '11:00:00', 50, 0, NULL),
(271, '2014-09-16', '11:00:00', '10:00:00', 50, 0, NULL),
(272, '2014-09-16', '12:00:00', '13:00:00', 50, 0, NULL),
(273, '2014-09-16', '13:00:00', '12:00:00', 50, 0, NULL),
(274, '2014-09-16', '14:00:00', '15:00:00', 50, 0, NULL),
(275, '2014-09-16', '15:00:00', '14:00:00', 50, 0, NULL),
(276, '2014-09-16', '16:00:00', '17:00:00', 50, 0, NULL),
(277, '2014-09-16', '17:00:00', '16:00:00', 50, 0, NULL),
(278, '2014-09-17', '10:00:00', '11:00:00', 50, 0, NULL),
(279, '2014-09-17', '11:00:00', '10:00:00', 50, 0, NULL),
(280, '2014-09-17', '12:00:00', '13:00:00', 50, 0, NULL),
(281, '2014-09-17', '13:00:00', '12:00:00', 50, 0, NULL),
(282, '2014-09-17', '14:00:00', '15:00:00', 50, 0, NULL),
(283, '2014-09-17', '15:00:00', '14:00:00', 50, 0, NULL),
(284, '2014-09-17', '16:00:00', '17:00:00', 50, 0, NULL),
(285, '2014-09-17', '17:00:00', '16:00:00', 50, 0, NULL),
(286, '2014-09-18', '10:00:00', '11:00:00', 50, 0, NULL),
(287, '2014-09-18', '11:00:00', '10:00:00', 50, 0, NULL),
(288, '2014-09-18', '12:00:00', '13:00:00', 50, 0, NULL),
(289, '2014-09-18', '13:00:00', '12:00:00', 50, 0, NULL),
(290, '2014-09-18', '14:00:00', '15:00:00', 50, 0, NULL),
(291, '2014-09-18', '15:00:00', '14:00:00', 50, 0, NULL),
(292, '2014-09-18', '16:00:00', '17:00:00', 50, 0, NULL),
(293, '2014-09-18', '17:00:00', '16:00:00', 50, 0, NULL),
(294, '2014-09-19', '10:00:00', '11:00:00', 50, 0, NULL),
(295, '2014-09-19', '11:00:00', '10:00:00', 50, 0, NULL),
(296, '2014-09-19', '12:00:00', '13:00:00', 50, 0, NULL),
(297, '2014-09-19', '13:00:00', '12:00:00', 50, 0, NULL),
(298, '2014-09-19', '14:00:00', '15:00:00', 50, 0, NULL),
(299, '2014-09-19', '15:00:00', '14:00:00', 50, 0, NULL),
(300, '2014-09-19', '16:00:00', '17:00:00', 50, 0, NULL),
(301, '2014-09-19', '17:00:00', '16:00:00', 50, 0, NULL),
(302, '2014-09-20', '10:00:00', '11:00:00', 50, 0, NULL),
(303, '2014-09-20', '11:00:00', '10:00:00', 50, 0, NULL),
(304, '2014-09-20', '12:00:00', '13:00:00', 50, 0, NULL),
(305, '2014-09-20', '13:00:00', '12:00:00', 50, 0, NULL),
(306, '2014-09-20', '14:00:00', '15:00:00', 50, 0, NULL),
(307, '2014-09-20', '15:00:00', '14:00:00', 50, 0, NULL),
(308, '2014-09-20', '16:00:00', '17:00:00', 50, 0, NULL),
(309, '2014-09-20', '17:00:00', '16:00:00', 50, 0, NULL),
(310, '2014-09-21', '10:00:00', '11:00:00', 50, 0, NULL),
(311, '2014-09-21', '11:00:00', '10:00:00', 50, 0, NULL),
(312, '2014-09-21', '12:00:00', '13:00:00', 50, 0, NULL),
(313, '2014-09-21', '13:00:00', '12:00:00', 50, 0, NULL),
(314, '2014-09-21', '14:00:00', '15:00:00', 50, 0, NULL),
(315, '2014-09-21', '15:00:00', '14:00:00', 50, 0, NULL),
(316, '2014-09-21', '16:00:00', '17:00:00', 50, 0, NULL),
(317, '2014-09-21', '17:00:00', '16:00:00', 50, 0, NULL),
(318, '2014-09-12', '10:00:00', '11:00:00', 51, 0, NULL),
(319, '2014-09-12', '11:00:00', '10:00:00', 51, 0, NULL),
(320, '2014-09-12', '12:00:00', '13:00:00', 51, 0, NULL),
(321, '2014-09-12', '13:00:00', '12:00:00', 51, 0, NULL),
(322, '2014-09-12', '14:00:00', '15:00:00', 51, 0, NULL),
(323, '2014-09-12', '15:00:00', '14:00:00', 51, 0, NULL),
(324, '2014-09-12', '16:00:00', '17:00:00', 51, 0, NULL),
(325, '2014-09-12', '17:00:00', '16:00:00', 51, 0, NULL),
(326, '2014-09-13', '10:00:00', '11:00:00', 51, 0, NULL),
(327, '2014-09-13', '11:00:00', '10:00:00', 51, 0, NULL),
(328, '2014-09-13', '12:00:00', '13:00:00', 51, 0, NULL),
(329, '2014-09-13', '13:00:00', '12:00:00', 51, 0, NULL),
(330, '2014-09-13', '14:00:00', '15:00:00', 51, 0, NULL),
(331, '2014-09-13', '15:00:00', '14:00:00', 51, 0, NULL),
(332, '2014-09-13', '16:00:00', '17:00:00', 51, 0, NULL),
(333, '2014-09-13', '17:00:00', '16:00:00', 51, 0, NULL),
(334, '2014-09-14', '11:00:00', '10:00:00', 51, 0, NULL),
(335, '2014-09-14', '12:00:00', '13:00:00', 51, 0, NULL),
(336, '2014-09-14', '13:00:00', '12:00:00', 51, 0, NULL),
(337, '2014-09-14', '14:00:00', '15:00:00', 51, 0, NULL),
(338, '2014-09-14', '15:00:00', '14:00:00', 51, 0, NULL),
(339, '2014-09-14', '16:00:00', '17:00:00', 51, 0, NULL),
(340, '2014-09-14', '17:00:00', '16:00:00', 51, 0, NULL),
(341, '2014-09-15', '10:00:00', '11:00:00', 51, 0, NULL),
(342, '2014-09-15', '11:00:00', '10:00:00', 51, 0, NULL),
(343, '2014-09-15', '12:00:00', '13:00:00', 51, 0, NULL),
(344, '2014-09-15', '13:00:00', '12:00:00', 51, 0, NULL),
(345, '2014-09-15', '14:00:00', '15:00:00', 51, 0, NULL),
(346, '2014-09-15', '15:00:00', '14:00:00', 51, 0, NULL),
(347, '2014-09-15', '16:00:00', '17:00:00', 51, 0, NULL),
(348, '2014-09-15', '17:00:00', '16:00:00', 51, 0, NULL),
(349, '2014-09-16', '10:00:00', '11:00:00', 51, 0, NULL),
(350, '2014-09-16', '11:00:00', '10:00:00', 51, 0, NULL),
(351, '2014-09-16', '12:00:00', '13:00:00', 51, 0, NULL),
(352, '2014-09-16', '13:00:00', '12:00:00', 51, 0, NULL),
(353, '2014-09-16', '14:00:00', '15:00:00', 51, 0, NULL),
(354, '2014-09-16', '15:00:00', '14:00:00', 51, 0, NULL),
(355, '2014-09-16', '16:00:00', '17:00:00', 51, 0, NULL),
(356, '2014-09-16', '17:00:00', '16:00:00', 51, 0, NULL),
(357, '2014-09-17', '10:00:00', '11:00:00', 51, 0, NULL),
(358, '2014-09-17', '11:00:00', '10:00:00', 51, 0, NULL),
(359, '2014-09-17', '12:00:00', '13:00:00', 51, 0, NULL),
(360, '2014-09-17', '13:00:00', '12:00:00', 51, 0, NULL),
(361, '2014-09-17', '14:00:00', '15:00:00', 51, 0, NULL),
(362, '2014-09-17', '15:00:00', '14:00:00', 51, 0, NULL),
(363, '2014-09-17', '16:00:00', '17:00:00', 51, 0, NULL),
(364, '2014-09-17', '17:00:00', '16:00:00', 51, 0, NULL),
(365, '2014-09-18', '10:00:00', '11:00:00', 51, 0, NULL),
(366, '2014-09-18', '11:00:00', '10:00:00', 51, 0, NULL),
(367, '2014-09-18', '12:00:00', '13:00:00', 51, 0, NULL),
(368, '2014-09-18', '13:00:00', '12:00:00', 51, 0, NULL),
(369, '2014-09-18', '14:00:00', '15:00:00', 51, 0, NULL),
(370, '2014-09-18', '15:00:00', '14:00:00', 51, 0, NULL),
(371, '2014-09-18', '16:00:00', '17:00:00', 51, 0, NULL),
(372, '2014-09-18', '17:00:00', '16:00:00', 51, 0, NULL),
(373, '2014-09-19', '10:00:00', '11:00:00', 51, 0, NULL),
(374, '2014-09-19', '11:00:00', '10:00:00', 51, 0, NULL),
(375, '2014-09-19', '12:00:00', '13:00:00', 51, 0, NULL),
(376, '2014-09-19', '13:00:00', '12:00:00', 51, 0, NULL),
(377, '2014-09-19', '14:00:00', '15:00:00', 51, 0, NULL),
(378, '2014-09-19', '15:00:00', '14:00:00', 51, 0, NULL),
(379, '2014-09-19', '16:00:00', '17:00:00', 51, 0, NULL),
(380, '2014-09-19', '17:00:00', '16:00:00', 51, 0, NULL),
(381, '2014-09-20', '10:00:00', '11:00:00', 51, 0, NULL),
(382, '2014-09-20', '11:00:00', '10:00:00', 51, 0, NULL),
(383, '2014-09-20', '12:00:00', '13:00:00', 51, 0, NULL),
(384, '2014-09-20', '13:00:00', '12:00:00', 51, 0, NULL),
(385, '2014-09-20', '14:00:00', '15:00:00', 51, 0, NULL),
(386, '2014-09-20', '15:00:00', '14:00:00', 51, 0, NULL),
(387, '2014-09-20', '16:00:00', '17:00:00', 51, 0, NULL),
(388, '2014-09-20', '17:00:00', '16:00:00', 51, 0, NULL),
(389, '2014-09-21', '10:00:00', '11:00:00', 51, 0, NULL),
(390, '2014-09-21', '11:00:00', '10:00:00', 51, 0, NULL),
(391, '2014-09-21', '12:00:00', '13:00:00', 51, 0, NULL),
(392, '2014-09-21', '13:00:00', '12:00:00', 51, 0, NULL),
(393, '2014-09-21', '14:00:00', '15:00:00', 51, 0, NULL),
(394, '2014-09-21', '15:00:00', '14:00:00', 51, 0, NULL),
(395, '2014-09-21', '16:00:00', '17:00:00', 51, 0, NULL),
(396, '2014-09-21', '17:00:00', '16:00:00', 51, 0, NULL);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `specific_condition_workshop`
--
ALTER TABLE `specific_condition_workshop`
  ADD CONSTRAINT `specific_condition_workshop_ibfk_2` FOREIGN KEY (`specific_condition_id`) REFERENCES `specific_condition` (`id_specific_condition`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `specific_condition_workshop_ibfk_1` FOREIGN KEY (`workshop_id`) REFERENCES `workshop` (`id_workshop`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
