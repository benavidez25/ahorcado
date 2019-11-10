-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 10-11-2019 a las 06:30:46
-- Versión del servidor: 5.7.24
-- Versión de PHP: 7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `hangman`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `games`
--

DROP TABLE IF EXISTS `games`;
CREATE TABLE IF NOT EXISTS `games` (
  `GAME_ID` int(11) NOT NULL AUTO_INCREMENT,
  `GAME_USER` int(11) NOT NULL,
  `GAME_WORD` varchar(100) NOT NULL,
  `GAME_PROGRESS` varchar(100) NOT NULL,
  `GAME_ONLINE` tinyint(1) NOT NULL,
  `GAME_DATE` date NOT NULL,
  PRIMARY KEY (`GAME_ID`),
  KEY `GAME_USER` (`GAME_USER`),
  KEY `GAME_USER_2` (`GAME_USER`),
  KEY `GAME_USER_3` (`GAME_USER`),
  KEY `GAME_USER_4` (`GAME_USER`)
) ENGINE=InnoDB AUTO_INCREMENT=177 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `games`
--

INSERT INTO `games` (`GAME_ID`, `GAME_USER`, `GAME_WORD`, `GAME_PROGRESS`, `GAME_ONLINE`, `GAME_DATE`) VALUES
(169, 21, 'camisa', '-A---A', 1, '2019-11-09'),
(170, 23, 'cocina', 'COCINA', 0, '2019-11-10'),
(171, 23, 'cafe', 'C-FE', 0, '2019-11-10'),
(172, 23, 'mesa', '---A', 1, '2019-11-10'),
(173, 23, 'gasolina', '', 1, '2019-11-10'),
(174, 23, 'cafe', '', 1, '2019-11-10'),
(175, 23, 'gasolina', 'G----I--', 0, '2019-11-10'),
(176, 23, 'camion', '', 1, '2019-11-10');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `messages`
--

DROP TABLE IF EXISTS `messages`;
CREATE TABLE IF NOT EXISTS `messages` (
  `MESSAGES_ID` int(11) NOT NULL AUTO_INCREMENT,
  `GAME_ID` int(11) NOT NULL,
  `MESSAGE` varchar(200) NOT NULL,
  `USER_ID` int(11) NOT NULL,
  `MESSAGES_DATE` date NOT NULL,
  PRIMARY KEY (`MESSAGES_ID`),
  KEY `USER_ID` (`USER_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `messages`
--

INSERT INTO `messages` (`MESSAGES_ID`, `GAME_ID`, `MESSAGE`, `USER_ID`, `MESSAGES_DATE`) VALUES
(16, 169, 'Pon la Z', 19, '2019-11-09'),
(17, 170, 'Coloca la W', 22, '2019-11-10');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `USER_ID` int(11) NOT NULL AUTO_INCREMENT,
  `USER_NAME` varchar(100) NOT NULL,
  `USER_EMAIL` varchar(100) NOT NULL,
  `USER_USERNAME` varchar(100) NOT NULL,
  `USER_PASSWORD` varchar(100) NOT NULL,
  `USER_SIGNIN_DATE` date NOT NULL,
  PRIMARY KEY (`USER_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`USER_ID`, `USER_NAME`, `USER_EMAIL`, `USER_USERNAME`, `USER_PASSWORD`, `USER_SIGNIN_DATE`) VALUES
(19, 'Dilver Benavidez', 'dilverbenavidez25@gmail.com', 'benavidez25', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', '2019-11-09'),
(21, 'Jose Reyes', 'prueba@gmail.com', 'prueba25', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', '2019-11-09'),
(22, 'Fernando Osorio', 'fernando@gmail.com', 'fernando', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', '2019-11-09'),
(23, 'Jose', 'jose@gmail.com', 'jose123', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', '2019-11-10');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `words`
--

DROP TABLE IF EXISTS `words`;
CREATE TABLE IF NOT EXISTS `words` (
  `WORD_ID` int(11) NOT NULL AUTO_INCREMENT,
  `WORD` varchar(100) NOT NULL,
  PRIMARY KEY (`WORD_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `words`
--

INSERT INTO `words` (`WORD_ID`, `WORD`) VALUES
(1, 'casa'),
(2, 'gato'),
(3, 'camion'),
(4, 'estacion'),
(5, 'gasolina'),
(6, 'camisa'),
(7, 'maestro'),
(8, 'ingeniero'),
(9, 'mesa'),
(10, 'supermercado'),
(11, 'niño'),
(12, 'tractor'),
(13, 'construccion'),
(14, 'espejo'),
(15, 'estufa'),
(16, 'cocina'),
(17, 'television'),
(18, 'celular'),
(19, 'vehiculo'),
(20, 'llanta'),
(21, 'mochila'),
(22, 'cafe');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `games`
--
ALTER TABLE `games`
  ADD CONSTRAINT `games_ibfk_1` FOREIGN KEY (`GAME_USER`) REFERENCES `users` (`USER_ID`);

--
-- Filtros para la tabla `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `messages_ibfk_1` FOREIGN KEY (`USER_ID`) REFERENCES `users` (`USER_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
