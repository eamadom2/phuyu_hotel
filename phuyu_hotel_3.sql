-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 18-05-2018 a las 18:15:21
-- Versión del servidor: 10.1.31-MariaDB
-- Versión de PHP: 7.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `phuyu_hotel`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `room`
--

CREATE TABLE `room` (
  `idroom` int(11) NOT NULL,
  `number` int(4) DEFAULT NULL,
  `floor` int(3) DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  `order` int(3) DEFAULT NULL,
  `window` int(1) DEFAULT NULL,
  `idroomtype` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `room`
--

INSERT INTO `room` (`idroom`, `number`, `floor`, `status`, `order`, `window`, `idroomtype`) VALUES
(1, 201, 2, 1, 55, NULL, 1),
(2, 300, 3, 1, 56, NULL, 1),
(3, 301, 3, 1, 1, NULL, 1),
(4, 302, 3, 1, 2, NULL, 1),
(5, 303, 3, 1, 3, NULL, 1),
(6, 304, 3, 1, 4, NULL, 1),
(7, 305, 3, 1, 5, 1, 1),
(8, 306, 3, 1, 6, 1, 1),
(9, 307, 3, 1, 7, 1, 1),
(10, 308, 3, 1, 8, 1, 4),
(11, 309, 3, 1, 9, 1, 1),
(12, 310, 3, 1, 10, 1, 1),
(13, 311, 3, 1, 11, 1, 1),
(14, 312, 3, 1, 12, NULL, 1),
(15, 313, 3, 1, 13, NULL, 1),
(16, 314, 3, 1, 14, NULL, 1),
(17, 315, 3, 1, 15, NULL, 1),
(18, 316, 3, 1, 16, NULL, 1),
(19, 317, 3, 1, 17, NULL, 1),
(20, 318, 3, 1, 18, NULL, 2),
(21, 400, 4, 1, 57, NULL, 1),
(22, 401, 4, 1, 19, NULL, 1),
(23, 402, 4, 1, 20, NULL, 1),
(24, 403, 4, 1, 21, NULL, 1),
(25, 404, 4, 1, 22, NULL, 1),
(26, 405, 4, 1, 23, 1, 1),
(27, 406, 4, 1, 24, 1, 4),
(28, 407, 4, 1, 25, 1, 1),
(29, 408, 4, 1, 26, 1, 4),
(30, 409, 4, 1, 27, 1, 1),
(31, 410, 4, 1, 28, 1, 4),
(32, 411, 4, 1, 29, 1, 1),
(33, 412, 4, 1, 30, 1, 1),
(34, 413, 4, 1, 31, NULL, 4),
(35, 414, 4, 1, 32, NULL, 1),
(36, 415, 4, 1, 33, NULL, 1),
(37, 416, 4, 1, 34, NULL, 1),
(38, 417, 4, 1, 35, NULL, 1),
(39, 418, 4, 1, 36, NULL, 2),
(40, 501, 5, 1, 37, NULL, 1),
(41, 502, 5, 1, 38, NULL, 1),
(42, 503, 5, 1, 39, NULL, 4),
(43, 504, 5, 1, 40, NULL, 1),
(44, 505, 5, 1, 41, 1, 1),
(45, 506, 5, 1, 42, 1, 4),
(46, 507, 5, 1, 43, 1, 1),
(47, 508, 5, 1, 44, 1, 4),
(48, 509, 5, 1, 45, 1, 1),
(49, 510, 5, 1, 46, 1, 4),
(50, 511, 5, 1, 47, 1, 1),
(51, 512, 5, 1, 48, NULL, 1),
(52, 513, 5, 1, 49, NULL, 4),
(53, 514, 5, 1, 50, NULL, 1),
(54, 515, 5, 1, 51, NULL, 1),
(55, 516, 5, 1, 52, NULL, 1),
(56, 517, 5, 1, 53, NULL, 1),
(57, 518, 5, 1, 54, NULL, 4),
(58, 603, 6, 1, 58, NULL, 2),
(59, 604, 6, 1, 59, NULL, 2),
(60, 605, 6, 1, 60, NULL, 1),
(61, 701, 7, 1, 61, NULL, 3),
(62, 702, 7, 1, 62, NULL, 3),
(63, 703, 7, 1, 63, NULL, 3),
(64, 704, 7, 1, 64, NULL, 3);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`idroom`),
  ADD KEY `fk_room_roomtype1_idx` (`idroomtype`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `room`
--
ALTER TABLE `room`
  MODIFY `idroom` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `room`
--
ALTER TABLE `room`
  ADD CONSTRAINT `fk_room_roomtype1` FOREIGN KEY (`idroomtype`) REFERENCES `roomtype` (`idroomtype`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
