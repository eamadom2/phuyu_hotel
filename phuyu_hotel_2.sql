-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 18-05-2018 a las 17:46:36
-- Versión del servidor: 10.1.21-MariaDB
-- Versión de PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
-- Estructura de tabla para la tabla `access_module_rol`
--

CREATE TABLE `access_module_rol` (
  `idaccess_module_rol` int(11) NOT NULL,
  `idmodule` int(11) NOT NULL,
  `idrol` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `booking`
--

CREATE TABLE `booking` (
  `idbooking` int(11) NOT NULL,
  `status` int(1) DEFAULT NULL,
  `date_start` datetime DEFAULT NULL,
  `date_end` datetime DEFAULT NULL,
  `code` varchar(12) DEFAULT NULL,
  `idcustomer` int(11) NOT NULL,
  `idroom` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cleaning`
--

CREATE TABLE `cleaning` (
  `idcleaning` int(11) NOT NULL,
  `date_creation` datetime DEFAULT NULL,
  `date_start` datetime DEFAULT NULL,
  `date_finish` datetime DEFAULT NULL,
  `type` int(1) DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  `comments` text,
  `idroom` int(11) NOT NULL,
  `iduser` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `company`
--

CREATE TABLE `company` (
  `idcompany` int(11) NOT NULL,
  `idcustomer` int(11) NOT NULL,
  `company_name` varchar(100) DEFAULT NULL,
  `company_number` varchar(25) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `company`
--

INSERT INTO `company` (`idcompany`, `idcustomer`, `company_name`, `company_number`, `address`, `phone`, `email`) VALUES
(1, 2, 'Complexless', '20543314529', 'Av. Aramburú 856 Oficina 302', '4214059', 'sales@complexless.com'),
(2, 6, 'Federación', '', 'Atletismo', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `config`
--

CREATE TABLE `config` (
  `id` int(11) NOT NULL,
  `parameter` varchar(200) DEFAULT NULL,
  `value` varchar(200) DEFAULT NULL,
  `status` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `customer`
--

CREATE TABLE `customer` (
  `idcustomer` int(11) NOT NULL,
  `status` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `customer`
--

INSERT INTO `customer` (`idcustomer`, `status`) VALUES
(1, 1),
(2, 2),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(10, 1),
(11, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `file`
--

CREATE TABLE `file` (
  `idfile` int(11) NOT NULL,
  `filename` varchar(200) DEFAULT NULL,
  `file` blob
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hotel`
--

CREATE TABLE `hotel` (
  `idhotel` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `phone` varchar(11) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `num_floors` int(2) DEFAULT NULL,
  `url_facebook` varchar(255) DEFAULT NULL,
  `api_facebook` varchar(255) DEFAULT NULL,
  `ruc` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `hotel`
--

INSERT INTO `hotel` (`idhotel`, `name`, `address`, `phone`, `email`, `num_floors`, `url_facebook`, `api_facebook`, `ruc`) VALUES
(1, 'Suites Hotel Sudamérica', 'Av. San Luis 1087', '717-4779', 'suiteshotelsudamerica@hotmail.com', 7, NULL, NULL, 2147483647);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inventory_item`
--

CREATE TABLE `inventory_item` (
  `idtransaction` int(11) NOT NULL,
  `iduser` int(11) NOT NULL,
  `iditem` int(11) NOT NULL,
  `transaction_date` datetime DEFAULT NULL,
  `transaction_type` int(1) DEFAULT NULL,
  `transaction_reason` int(1) DEFAULT NULL,
  `transaction_description` text,
  `transaction_inventory` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `inventory_item`
--

INSERT INTO `inventory_item` (`idtransaction`, `iduser`, `iditem`, `transaction_date`, `transaction_type`, `transaction_reason`, `transaction_description`, `transaction_inventory`) VALUES
(1, 1, 30, '2018-05-07 18:01:32', 1, 1, ' Stock Inicial', '10.00'),
(2, 1, 30, '2018-05-08 12:35:15', 2, 9, 'Acondicionador abierto', '-1.00'),
(3, 1, 30, '2018-05-08 12:38:58', 1, 1, 'Compra', '10.00'),
(4, 1, 30, '2018-05-08 12:44:12', 2, 2, 'Traslado', '-15.00'),
(5, 1, 30, '2018-05-08 13:24:23', 1, 1, 'Ingreso mercaderia', '20.00'),
(6, 1, 30, '2018-05-08 13:27:49', 2, 3, 'Traslado ', '-10.00'),
(7, 1, 30, '2018-05-08 13:30:51', 1, 1, ' Compra por mayor', '50.00'),
(8, 1, 30, '2018-05-08 17:03:57', 2, 9, 'Devolución', '-50.00'),
(9, 1, 30, '2018-05-08 17:09:42', 1, 3, 'Habitación 301', '2.00'),
(10, 1, 30, '2018-05-08 17:11:22', 2, 1, 'Venta a trabajador', '-1.00'),
(11, 1, 30, '2018-05-08 17:13:30', 1, 1, 'Compra ', '10.00'),
(12, 1, 59, '2018-05-12 06:59:27', 1, 1, 'Stock inicial', '10.00'),
(13, 1, 60, '2018-05-12 07:00:51', 1, 1, 'Stock inicial', '10.00'),
(14, 1, 62, '2018-05-17 05:29:10', 1, 1, 'Stock inicial', '20.00'),
(15, 1, 63, '2018-05-17 05:29:31', 1, 1, 'Stock inicial', '10.00'),
(16, 1, 30, '2018-05-17 17:51:14', 2, 3, ' Traslado almacén sauna', '-10.00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `item`
--

CREATE TABLE `item` (
  `iditem` int(11) NOT NULL,
  `item_name` varchar(100) DEFAULT NULL,
  `unit_price` decimal(10,2) DEFAULT NULL,
  `cost_price` decimal(10,2) DEFAULT NULL,
  `quantity` int(4) DEFAULT NULL,
  `type_item` int(1) DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  `is_service` int(1) DEFAULT NULL,
  `is_for_sale` int(1) DEFAULT NULL,
  `room_number` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `item`
--

INSERT INTO `item` (`iditem`, `item_name`, `unit_price`, `cost_price`, `quantity`, `type_item`, `status`, `is_service`, `is_for_sale`, `room_number`) VALUES
(1, 'Jugo de papaya', '7.00', '4.00', 0, 1, 1, 0, 1, NULL),
(2, 'Jugo de naranja', '7.00', '4.00', 0, 1, 1, 0, 1, NULL),
(3, 'Jugo de Piña', '6.00', '3.00', 0, 1, 1, 0, 1, NULL),
(4, 'Jugo especial', '8.00', '5.00', 0, 1, 1, 0, 1, NULL),
(5, 'Juego surtido', '8.00', '5.00', 0, 1, 1, 0, 1, NULL),
(6, 'Jugo fresa con leche', '8.00', '5.00', 0, 1, 1, 0, 1, NULL),
(7, 'Ensalada de fruta', '9.00', '6.00', 0, 1, 1, 0, 1, NULL),
(8, 'Desayuno continental', '10.00', '7.00', 0, 1, 1, 0, 1, NULL),
(9, 'Desayuno americano', '10.00', '7.00', 0, 1, 1, 0, 1, NULL),
(10, 'Mixto simple', '5.00', '3.00', 0, 1, 1, 0, 1, NULL),
(11, 'Sandwich con pollo', '5.00', '3.00', 0, 1, 1, 0, 1, NULL),
(12, 'Sandwich con hot dog', '3.00', '1.50', 0, 1, 1, 0, 1, NULL),
(13, 'Sandwich con huevo', '3.00', '1.50', 0, 1, 1, 0, 1, NULL),
(14, 'Sandwich aceituna', '3.00', '1.50', 0, 1, 1, 0, 1, NULL),
(15, 'Menú ejecutivo', '12.00', '8.00', 0, 1, 1, 0, 1, NULL),
(16, 'Pollo a la plancha', '18.00', '12.00', 0, 1, 1, 0, 1, NULL),
(17, 'Bisteck a lo pobre', '18.00', '12.00', 0, 1, 1, 0, 1, NULL),
(18, 'Bisteck con papas fritas', '18.00', '12.00', 0, 1, 1, 0, 1, NULL),
(19, 'Lomo saltado', '18.00', '12.00', 0, 1, 1, 0, 1, NULL),
(20, 'Pollo Saltado', '18.00', '12.00', 0, 1, 1, 0, 1, NULL),
(21, 'Limonada en jarra', '8.00', '4.00', 0, 1, 1, 0, 1, NULL),
(22, 'Maracuyá en jarra', '8.00', '4.00', 0, 1, 1, 0, 1, NULL),
(23, 'Emoliente en jarra', '8.00', '4.00', 0, 1, 1, 0, 1, NULL),
(24, 'Café con leche', '4.00', '2.00', 0, 1, 1, 0, 1, NULL),
(25, 'Infusiones', '3.00', '1.50', 0, 1, 1, 0, 1, NULL),
(26, 'Jabón', '3.00', '2.00', 0, 2, 1, 0, 1, NULL),
(27, 'Cepillo', '3.00', '2.00', 0, 2, 1, 0, 1, NULL),
(28, 'Preservativo', '5.00', '3.00', 0, 2, 1, 0, 1, NULL),
(29, 'Shampoo chico', '1.00', '0.80', 0, 2, 1, 0, 1, NULL),
(30, 'Acondicionador', '1.00', '0.80', 15, 2, 1, 0, 1, NULL),
(31, 'Desodorante', '2.00', '1.50', 0, 2, 1, 0, 1, NULL),
(32, 'Prestobarba', '3.00', '2.00', 0, 2, 1, 0, 1, NULL),
(33, 'Kolinos grande', '4.00', '2.50', 0, 2, 1, 0, 1, NULL),
(34, 'Kolinos chico', '3.00', '2.00', 0, 2, 1, 0, 1, NULL),
(35, 'Shampoo grande', '2.00', '1.20', 0, 2, 1, 0, 1, NULL),
(36, 'Cerveza Pilsen', '8.00', '4.50', 0, 3, 1, 0, 1, NULL),
(37, 'Cerveza Cristal', '8.00', '4.50', 0, 3, 1, 0, 1, NULL),
(38, 'Cerveza negra', '8.00', '5.00', 0, 3, 1, 0, 1, NULL),
(39, 'Gaseosa 1 1/2Lt', '8.00', '5.00', 0, 3, 1, 0, 1, NULL),
(40, 'Gatorade', '4.00', '3.00', 0, 3, 1, 0, 1, NULL),
(41, 'Frugos Litro', '6.00', '4.00', 0, 3, 1, 0, 1, NULL),
(42, 'Frugos Botella', '3.00', '2.00', 0, 3, 1, 0, 1, NULL),
(43, 'Agua 1/2 Lt', '3.00', '2.00', 0, 3, 1, 0, 1, NULL),
(44, 'Agua 2 Lt', '6.00', '4.00', 0, 3, 1, 0, 1, NULL),
(45, 'Gaseosa 1/2', '3.00', '2.00', 0, 3, 1, 0, 1, NULL),
(46, 'Guaraná Lata', '2.00', '3.00', 0, 3, 1, 0, 1, NULL),
(47, 'Tampico barril', '3.00', '4.00', 0, 3, 1, 0, 1, NULL),
(48, 'Volt', '3.00', '2.00', 0, 3, 1, 0, 1, NULL),
(49, 'Maltin', '3.00', '2.00', 0, 3, 1, 0, 1, NULL),
(50, 'Red Bull', '8.00', '6.00', 0, 3, 1, 0, 1, NULL),
(51, 'Cerveza Lata', '4.00', '3.00', 0, 3, 1, 0, 1, NULL),
(52, 'Free Te', '3.00', '2.00', 0, 3, 1, 0, 1, NULL),
(53, 'Vino', '25.00', '20.00', 0, 3, 1, 0, 1, NULL),
(54, 'Sangría', '15.00', '12.00', 0, 3, 1, 0, 1, NULL),
(55, 'Sauna Habitación', '30.00', NULL, NULL, 4, 1, 1, 1, NULL),
(56, 'Sauna', '30.00', NULL, NULL, 4, 1, 1, 1, NULL),
(57, 'Cerveza cusqueña', '10.00', '8.00', 0, 3, 3, 0, 1, NULL),
(58, 'Cusqueña Trigo', '10.00', '8.00', 0, 3, 3, 0, 0, NULL),
(59, 'Cusqueña red lager', '10.00', '8.00', 10, 3, 1, 0, 1, NULL),
(60, 'Cusqueña quinua', '10.00', '8.00', 10, 3, 1, 0, 1, NULL),
(61, 'Papel Higiénico', NULL, NULL, 0, 5, 1, NULL, NULL, NULL),
(62, 'Jabón con caja', '0.00', '0.00', 20, 5, 3, 0, 0, NULL),
(63, 'Jabón sin caja', '0.00', '0.00', 10, 5, 3, 0, 0, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `module`
--

CREATE TABLE `module` (
  `idmodule` int(11) NOT NULL,
  `module` varchar(100) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `order` int(2) DEFAULT NULL,
  `route` varchar(100) DEFAULT NULL,
  `icon` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `module`
--

INSERT INTO `module` (`idmodule`, `module`, `name`, `order`, `route`, `icon`) VALUES
(1, 'hotel', 'Hotel', 1, 'hotel', 'fa-building-o'),
(2, 'roomtype', 'Tipo Habitación', 2, 'roomtype', 'fa-tag'),
(3, 'room', 'Habitaciones', 3, 'room', 'fa-bed'),
(4, 'booking', 'Reservas', 4, 'booking', 'fa-book'),
(5, 'rent', 'Venta', 5, 'rent', 'fa-calendar'),
(6, 'items', 'Items', 6, 'item', 'fa-hdd-o'),
(7, 'cleaning', 'Limpieza', 7, 'cleaning', 'fa-icon fa-key');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permission`
--

CREATE TABLE `permission` (
  `idpermission` int(11) NOT NULL,
  `permission` varchar(100) DEFAULT NULL,
  `idmodule` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `permission`
--

INSERT INTO `permission` (`idpermission`, `permission`, `idmodule`) VALUES
(1, 'view_hotel', 1),
(2, 'edit_hotel', 1),
(3, 'delete_hotel', 1),
(4, 'view_rent', 5),
(5, 'add_rent', 5),
(6, 'edit_rent', 5),
(7, 'delete_rent', 5),
(8, 'add_items', 5),
(9, 'do_checkout', 5),
(10, 'list_items', 6),
(11, 'view_item', 6),
(12, 'add_items', 6),
(13, 'do_inventory', 6),
(14, 'delete_item', 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permission_module`
--

CREATE TABLE `permission_module` (
  `rol_idrol` int(11) NOT NULL,
  `idpermission` int(11) NOT NULL,
  `idmodule` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `person`
--

CREATE TABLE `person` (
  `idperson` int(11) NOT NULL,
  `idcustomer` int(11) NOT NULL,
  `document_number` varchar(12) DEFAULT NULL,
  `first_name` varchar(100) DEFAULT NULL,
  `last_name` varchar(100) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `person`
--

INSERT INTO `person` (`idperson`, `idcustomer`, `document_number`, `first_name`, `last_name`, `city`) VALUES
(1, 1, '42206711', 'carlos', 'condori carrillo', 'Lima'),
(2, 3, '10234567', 'Francisco', 'Gonzales', 'Lima'),
(3, 4, '41234587', 'Susana', 'Inga', ''),
(4, 5, '42890000', 'Martin', 'Vizcarra', 'Lima'),
(5, 7, '42145678', 'Paolita', 'De Souza', ''),
(6, 8, '43588925', '43588925', 'Martin', ''),
(7, 9, '43588925', '43588925', 'Martin', ''),
(8, 10, '43588925', '43588925', 'Martin', ''),
(9, 11, '42890000', 'Martin', 'Vizcarra', 'Lima');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `register_log`
--

CREATE TABLE `register_log` (
  `idregister_log` int(11) NOT NULL,
  `start_date` datetime DEFAULT NULL,
  `finish_date` datetime DEFAULT NULL,
  `close_register` int(1) DEFAULT NULL,
  `iduser_opening` int(11) NOT NULL,
  `iduser_closing` int(11) NOT NULL,
  `incomes_cash` decimal(10,2) DEFAULT NULL,
  `expenses_cash` decimal(10,2) DEFAULT NULL,
  `incomes_debit_card` decimal(10,2) DEFAULT NULL,
  `incomes_credit_card` decimal(10,2) DEFAULT NULL,
  `incomes_transfers` decimal(10,2) DEFAULT NULL,
  `incomes_sales_products` decimal(10,2) DEFAULT NULL,
  `subtotal` decimal(10,2) DEFAULT NULL,
  `incomes_restaurante` decimal(10,2) DEFAULT NULL,
  `incomes_sauna` decimal(10,2) DEFAULT NULL,
  `incomes_farmacia` decimal(10,2) DEFAULT NULL,
  `ocuppied_rooms` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rent`
--

CREATE TABLE `rent` (
  `idrent` int(11) NOT NULL,
  `start_date` datetime DEFAULT NULL,
  `finish_date` datetime DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  `idroom` int(11) NOT NULL,
  `idbooking` int(11) DEFAULT NULL,
  `num_guest` int(1) DEFAULT NULL,
  `idsale` int(11) NOT NULL,
  `description` text,
  `customer_idcustomer` int(11) NOT NULL,
  `room_price` decimal(10,2) DEFAULT NULL,
  `discount` decimal(10,2) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `room_number` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `rent`
--

INSERT INTO `rent` (`idrent`, `start_date`, `finish_date`, `status`, `idroom`, `idbooking`, `num_guest`, `idsale`, `description`, `customer_idcustomer`, `room_price`, `discount`, `quantity`, `room_number`) VALUES
(1, '2018-05-17 11:24:29', '2018-05-18 11:24:29', 2, 47, NULL, NULL, 1, NULL, 1, '130.00', '0.00', 1, '508'),
(2, '2018-05-17 11:24:29', '2018-05-18 11:24:29', 2, 48, NULL, NULL, 1, NULL, 1, '60.00', '0.00', 1, '509'),
(3, '2018-05-17 11:25:16', '2018-05-18 11:25:16', 2, 47, NULL, NULL, 2, NULL, 1, '130.00', '0.00', 1, '508'),
(4, '2018-05-17 11:25:16', '2018-05-18 11:25:16', 2, 48, NULL, NULL, 2, NULL, 1, '60.00', '0.00', 1, '509'),
(5, '2018-05-17 11:38:07', '2018-05-18 11:38:07', 2, 33, NULL, NULL, 3, NULL, 4, '60.00', '0.00', 1, '412'),
(6, '2018-05-17 11:38:07', '2018-05-18 11:38:07', 2, 54, NULL, NULL, 3, NULL, 4, '60.00', '0.00', 1, '515'),
(7, '2018-05-17 11:40:38', '2018-05-18 11:40:38', 2, 33, NULL, NULL, 4, NULL, 4, '60.00', '0.00', 1, '412'),
(8, '2018-05-17 11:40:38', '2018-05-18 11:40:38', 2, 54, NULL, NULL, 4, NULL, 4, '60.00', '0.00', 1, '515'),
(9, '2018-05-17 12:19:59', '2018-05-18 12:19:59', 2, 20, NULL, NULL, 5, NULL, 4, '120.00', '0.00', 1, '318'),
(10, '2018-05-17 12:19:59', '2018-05-18 12:19:59', 2, 55, NULL, NULL, 5, NULL, 4, '60.00', '0.00', 1, '516'),
(11, '2018-05-17 15:49:22', '2018-05-18 15:49:22', 2, 43, NULL, NULL, 6, NULL, 1, '60.00', '0.00', 1, '504'),
(12, '2018-05-17 15:51:53', '2018-05-18 15:51:53', 2, 57, NULL, NULL, 7, NULL, 4, '130.00', '0.00', 1, '518'),
(13, '2018-05-17 15:53:15', '2018-05-18 15:53:15', 2, 32, NULL, NULL, 8, NULL, 5, '60.00', '0.00', 1, '411'),
(14, '2018-05-17 15:53:15', '2018-05-18 15:53:15', 2, 31, NULL, NULL, 8, NULL, 5, '130.00', '0.00', 1, '410'),
(15, '2018-05-17 15:59:10', '2018-05-18 15:59:10', 5, 23, NULL, NULL, 9, NULL, 6, '60.00', '0.00', 1, '402'),
(16, '2018-05-17 15:59:10', '2018-05-18 15:59:10', 5, 25, NULL, NULL, 9, NULL, 6, '60.00', '0.00', 1, '404'),
(17, '2018-05-17 15:59:10', '2018-05-18 15:59:10', 5, 25, NULL, NULL, 9, NULL, 6, '60.00', '0.00', 1, '404'),
(18, '2018-05-17 16:04:34', '2018-05-18 16:04:34', 2, 34, NULL, NULL, 10, NULL, 7, '130.00', '0.00', 1, '413'),
(19, '2018-05-17 16:13:49', '2018-05-19 16:13:49', 2, 56, NULL, NULL, 11, NULL, 5, '60.00', '10.00', 2, '517'),
(20, '2018-05-17 16:16:03', '2018-05-19 16:16:03', 2, 56, NULL, NULL, 12, NULL, 5, '60.00', '10.00', 2, '517');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `idrol` int(11) NOT NULL,
  `rol_name` varchar(45) DEFAULT NULL,
  `status` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`idrol`, `rol_name`, `status`) VALUES
(1, 'administrator', 1),
(2, 'reception', 1),
(3, 'cleaning', 1);

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
(1, 201, 2, 2, 55, NULL, 1),
(2, 300, 3, 2, 56, NULL, 1),
(3, 301, 3, 1, 1, NULL, 1),
(4, 302, 3, 1, 2, NULL, 1),
(5, 303, 3, 1, 3, NULL, 1),
(6, 304, 3, 1, 4, NULL, 1),
(7, 305, 3, 1, 5, 1, 1),
(8, 306, 3, 8, 6, 1, 1),
(9, 307, 3, 7, 7, 1, 1),
(10, 308, 3, 6, 8, 1, 4),
(11, 309, 3, 5, 9, 1, 1),
(12, 310, 3, 4, 10, 1, 1),
(13, 311, 3, 3, 11, 1, 1),
(14, 312, 3, 3, 12, NULL, 1),
(15, 313, 3, 2, 13, NULL, 1),
(16, 314, 3, 1, 14, NULL, 1),
(17, 315, 3, 1, 15, NULL, 1),
(18, 316, 3, 1, 16, NULL, 1),
(19, 317, 3, 1, 17, NULL, 1),
(20, 318, 3, 2, 18, NULL, 2),
(21, 400, 4, 1, 57, NULL, 1),
(22, 401, 4, 1, 19, NULL, 1),
(23, 402, 4, 5, 20, NULL, 1),
(24, 403, 4, 1, 21, NULL, 1),
(25, 404, 4, 5, 22, NULL, 1),
(26, 405, 4, 1, 23, 1, 1),
(27, 406, 4, 1, 24, 1, 4),
(28, 407, 4, 1, 25, 1, 1),
(29, 408, 4, 1, 26, 1, 4),
(30, 409, 4, 1, 27, 1, 1),
(31, 410, 4, 2, 28, 1, 4),
(32, 411, 4, 2, 29, 1, 1),
(33, 412, 4, 2, 30, 1, 1),
(34, 413, 4, 2, 31, NULL, 4),
(35, 414, 4, 1, 32, NULL, 1),
(36, 415, 4, 2, 33, NULL, 1),
(37, 416, 4, 1, 34, NULL, 1),
(38, 417, 4, 2, 35, NULL, 1),
(39, 418, 4, 1, 36, NULL, 2),
(40, 501, 5, 1, 37, NULL, 1),
(41, 502, 5, 1, 38, NULL, 1),
(42, 503, 5, 1, 39, NULL, 4),
(43, 504, 5, 2, 40, NULL, 1),
(44, 505, 5, 1, 41, 1, 1),
(45, 506, 5, 1, 42, 1, 4),
(46, 507, 5, 1, 43, 1, 1),
(47, 508, 5, 2, 44, 1, 4),
(48, 509, 5, 2, 45, 1, 1),
(49, 510, 5, 1, 46, 1, 4),
(50, 511, 5, 1, 47, 1, 1),
(51, 512, 5, 1, 48, NULL, 1),
(52, 513, 5, 1, 49, NULL, 4),
(53, 514, 5, 1, 50, NULL, 1),
(54, 515, 5, 2, 51, NULL, 1),
(55, 516, 5, 2, 52, NULL, 1),
(56, 517, 5, 2, 53, NULL, 1),
(57, 518, 5, 2, 54, NULL, 4),
(58, 603, 6, 1, 58, NULL, 2),
(59, 604, 6, 4, 59, NULL, 2),
(60, 605, 6, 5, 60, NULL, 1),
(61, 701, 7, 2, 61, NULL, 3),
(62, 702, 7, 2, 62, NULL, 3),
(63, 703, 7, 2, 63, NULL, 3),
(64, 704, 7, 4, 64, NULL, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roomtype`
--

CREATE TABLE `roomtype` (
  `idroomtype` int(11) NOT NULL,
  `name` varchar(200) DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  `abreviation` varchar(45) DEFAULT NULL,
  `idhotel` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `roomtype`
--

INSERT INTO `roomtype` (`idroomtype`, `name`, `status`, `abreviation`, `idhotel`) VALUES
(1, 'Matrimonial', 1, 'MAT', 1),
(2, 'Matrimonial con jacuzzi', 1, 'JACZ', 1),
(3, 'Triple', 1, 'TPL', 1),
(4, 'Doble', 1, 'DWD', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sale`
--

CREATE TABLE `sale` (
  `idsale` int(11) NOT NULL,
  `date_created` datetime DEFAULT NULL,
  `date_modified` datetime DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  `iduser_creation` int(11) NOT NULL,
  `iduser_modified` int(11) NOT NULL,
  `idcustomer` int(11) DEFAULT NULL,
  `amount` decimal(10,2) DEFAULT NULL,
  `amount_paid` decimal(10,2) NOT NULL,
  `comment` text,
  `tipo_comprobante` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `sale`
--

INSERT INTO `sale` (`idsale`, `date_created`, `date_modified`, `status`, `iduser_creation`, `iduser_modified`, `idcustomer`, `amount`, `amount_paid`, `comment`, `tipo_comprobante`) VALUES
(1, '2018-05-17 11:05:29', '2018-05-17 11:05:29', 1, 1, 1, 1, '197.00', '97.00', NULL, NULL),
(2, '2018-05-17 11:05:16', '2018-05-17 11:05:16', 1, 1, 1, 1, '197.00', '97.00', NULL, NULL),
(3, '2018-05-17 11:05:07', '2018-05-17 11:05:07', 1, 1, 1, 4, '123.00', '23.00', NULL, NULL),
(4, '2018-05-17 11:05:38', '2018-05-17 11:05:38', 1, 1, 1, 4, '123.00', '23.00', NULL, NULL),
(5, '2018-05-17 12:05:59', '2018-05-17 12:05:59', 1, 1, 1, 4, '187.00', '107.00', NULL, NULL),
(6, '2018-05-17 15:05:22', '2018-05-17 15:05:22', 1, 1, 1, 1, '60.00', '0.00', NULL, NULL),
(7, '2018-05-17 15:05:53', '2018-05-17 15:05:53', 1, 1, 1, 4, '166.00', '86.00', NULL, NULL),
(8, '2018-05-17 15:05:15', '2018-05-17 15:05:15', 1, 1, 1, 5, '195.00', '115.00', NULL, NULL),
(9, '2018-05-17 15:05:10', '2018-05-17 15:05:10', 1, 1, 1, 6, '180.00', '90.00', NULL, NULL),
(10, '2018-05-17 16:05:34', '2018-05-17 16:05:34', 1, 1, 1, 7, '130.00', '30.00', NULL, NULL),
(11, '2018-05-17 16:05:49', '2018-05-17 16:05:49', 1, 1, 1, 5, '110.00', '90.00', NULL, NULL),
(12, '2018-05-17 16:05:03', '2018-05-17 16:05:03', 1, 1, 1, 5, '110.00', '90.00', NULL, NULL),
(13, '2018-05-17 16:05:44', '2018-05-17 16:05:44', 1, 1, 1, 8, '60.00', '10.00', NULL, NULL),
(14, '2018-05-17 16:05:06', '2018-05-17 16:05:06', 1, 1, 1, 8, '60.00', '10.00', NULL, NULL),
(15, '2018-05-17 16:05:09', '2018-05-17 16:05:09', 1, 1, 1, 8, '60.00', '10.00', NULL, NULL),
(16, '2018-05-17 17:05:24', '2018-05-17 17:05:24', 1, 1, 1, 5, '130.00', '0.00', NULL, NULL),
(17, '2018-05-18 10:05:22', '2018-05-18 10:05:22', 1, 1, 1, 5, '60.00', '60.00', NULL, NULL),
(18, '2018-05-18 10:05:42', '2018-05-18 10:05:42', 1, 1, 1, 5, '60.00', '60.00', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sales_payment`
--

CREATE TABLE `sales_payment` (
  `idsales_payment` int(11) NOT NULL,
  `idsale` int(11) NOT NULL,
  `payment_type` int(1) DEFAULT NULL,
  `payment_amount` decimal(10,2) DEFAULT NULL,
  `payment_date` datetime DEFAULT NULL,
  `iduser` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `sales_payment`
--

INSERT INTO `sales_payment` (`idsales_payment`, `idsale`, `payment_type`, `payment_amount`, `payment_date`, `iduser`) VALUES
(1, 4, 1, '100.00', '2018-05-17 11:40:39', 1),
(2, 5, 1, '80.00', '2018-05-17 12:19:59', 1),
(3, 6, 1, '60.00', '2018-05-17 15:49:23', 1),
(4, 7, 1, '80.00', '2018-05-17 15:51:53', 1),
(5, 8, 1, '80.00', '2018-05-17 15:53:16', 1),
(6, 9, 2, '90.00', '2018-05-17 15:59:10', 1),
(7, 10, 1, '100.00', '2018-05-17 16:04:34', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sale_item`
--

CREATE TABLE `sale_item` (
  `idsale_item` int(11) NOT NULL,
  `idsale` int(11) NOT NULL,
  `item_unit_price` decimal(10,2) DEFAULT NULL,
  `quantity` int(3) DEFAULT NULL,
  `iditem` int(11) NOT NULL,
  `idrent` int(11) DEFAULT NULL,
  `subtotal` decimal(10,2) DEFAULT NULL,
  `discount` decimal(10,2) DEFAULT NULL,
  `total` decimal(10,2) DEFAULT NULL,
  `iduser` int(11) NOT NULL,
  `item_name` varchar(100) DEFAULT NULL,
  `room_number` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `sale_item`
--

INSERT INTO `sale_item` (`idsale_item`, `idsale`, `item_unit_price`, `quantity`, `iditem`, `idrent`, `subtotal`, `discount`, `total`, `iduser`, `item_name`, `room_number`) VALUES
(1, 4, '3.00', 1, 32, NULL, '3.00', '0.00', '3.00', 1, 'Prestobarba', ''),
(2, 5, '7.00', 1, 1, NULL, '7.00', '0.00', '7.00', 1, 'Jugo de papaya', ''),
(3, 5, '5.00', 1, 28, NULL, '5.00', '0.00', '5.00', 1, 'Preservativo', ''),
(4, 7, '18.00', 2, 19, NULL, '36.00', '0.00', '36.00', 1, 'Lomo saltado', ''),
(5, 8, '5.00', 1, 28, NULL, '5.00', '0.00', '5.00', 1, 'Preservativo', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tariff`
--

CREATE TABLE `tariff` (
  `idtariff` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `status` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tariff`
--

INSERT INTO `tariff` (`idtariff`, `name`, `status`) VALUES
(1, 'Por día', 1),
(2, 'Por Horas', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tariff_roomtype`
--

CREATE TABLE `tariff_roomtype` (
  `idtariff_roomtype` int(11) NOT NULL,
  `idroomtype` int(11) NOT NULL,
  `idtariff` int(11) NOT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `promotional_price` decimal(10,2) DEFAULT NULL,
  `promotional_price_date_start` datetime DEFAULT NULL,
  `promotional_price_date_end` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tariff_roomtype`
--

INSERT INTO `tariff_roomtype` (`idtariff_roomtype`, `idroomtype`, `idtariff`, `price`, `promotional_price`, `promotional_price_date_start`, `promotional_price_date_end`) VALUES
(1, 1, 1, '60.00', NULL, NULL, NULL),
(2, 2, 1, '120.00', NULL, NULL, NULL),
(3, 3, 1, '130.00', NULL, NULL, NULL),
(4, 4, 1, '130.00', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `iduser` int(11) NOT NULL,
  `username` varchar(45) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  `name` varchar(45) DEFAULT NULL,
  `lastname` varchar(45) DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `first_login` int(1) DEFAULT NULL,
  `idrol` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`iduser`, `username`, `password`, `name`, `lastname`, `status`, `email`, `first_login`, `idrol`) VALUES
(1, 'admin', '0f7bb769791083e600ac50f3b550df71', 'Administrador', 'Hotel Sudamerica', 1, NULL, 0, 1),
(2, 'susana.inga', 'dde6e32dfd53bf2253a923ee4f2260a7', 'Susana', 'Inga', 1, NULL, 0, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `access_module_rol`
--
ALTER TABLE `access_module_rol`
  ADD PRIMARY KEY (`idaccess_module_rol`),
  ADD KEY `fk_access_module_rol_module1_idx` (`idmodule`),
  ADD KEY `fk_access_module_rol_rol1_idx` (`idrol`);

--
-- Indices de la tabla `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`idbooking`),
  ADD KEY `fk_booking_customer1_idx` (`idcustomer`),
  ADD KEY `fk_booking_room1_idx` (`idroom`);

--
-- Indices de la tabla `cleaning`
--
ALTER TABLE `cleaning`
  ADD PRIMARY KEY (`idcleaning`),
  ADD KEY `fk_cleaning_room1_idx` (`idroom`),
  ADD KEY `fk_cleaning_user1_idx` (`iduser`);

--
-- Indices de la tabla `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`idcompany`,`idcustomer`),
  ADD KEY `fk_company_customer1_idx` (`idcustomer`);

--
-- Indices de la tabla `config`
--
ALTER TABLE `config`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`idcustomer`);

--
-- Indices de la tabla `file`
--
ALTER TABLE `file`
  ADD PRIMARY KEY (`idfile`);

--
-- Indices de la tabla `hotel`
--
ALTER TABLE `hotel`
  ADD PRIMARY KEY (`idhotel`);

--
-- Indices de la tabla `inventory_item`
--
ALTER TABLE `inventory_item`
  ADD PRIMARY KEY (`idtransaction`),
  ADD KEY `fk_inventory_item_user1_idx` (`iduser`),
  ADD KEY `fk_inventory_item_item1_idx` (`iditem`);

--
-- Indices de la tabla `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`iditem`);

--
-- Indices de la tabla `module`
--
ALTER TABLE `module`
  ADD PRIMARY KEY (`idmodule`);

--
-- Indices de la tabla `permission`
--
ALTER TABLE `permission`
  ADD PRIMARY KEY (`idpermission`,`idmodule`),
  ADD KEY `fk_permission_module1_idx` (`idmodule`);

--
-- Indices de la tabla `permission_module`
--
ALTER TABLE `permission_module`
  ADD KEY `fk_permission_module_rol1_idx` (`rol_idrol`),
  ADD KEY `fk_permission_module_permission1_idx` (`idpermission`,`idmodule`);

--
-- Indices de la tabla `person`
--
ALTER TABLE `person`
  ADD PRIMARY KEY (`idperson`,`idcustomer`),
  ADD KEY `fk_person_customer1_idx` (`idcustomer`);

--
-- Indices de la tabla `register_log`
--
ALTER TABLE `register_log`
  ADD PRIMARY KEY (`idregister_log`),
  ADD KEY `fk_register_log_user1_idx` (`iduser_opening`),
  ADD KEY `fk_register_log_user2_idx` (`iduser_closing`);

--
-- Indices de la tabla `rent`
--
ALTER TABLE `rent`
  ADD PRIMARY KEY (`idrent`),
  ADD KEY `fk_rent_room1_idx` (`idroom`),
  ADD KEY `fk_rent_booking1_idx` (`idbooking`),
  ADD KEY `fk_rent_sale1_idx` (`idsale`),
  ADD KEY `fk_rent_customer1_idx` (`customer_idcustomer`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`idrol`);

--
-- Indices de la tabla `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`idroom`),
  ADD KEY `fk_room_roomtype1_idx` (`idroomtype`);

--
-- Indices de la tabla `roomtype`
--
ALTER TABLE `roomtype`
  ADD PRIMARY KEY (`idroomtype`),
  ADD KEY `fk_roomtype_hotel_idx` (`idhotel`);

--
-- Indices de la tabla `sale`
--
ALTER TABLE `sale`
  ADD PRIMARY KEY (`idsale`,`amount_paid`),
  ADD KEY `fk_sale_user1_idx` (`iduser_creation`),
  ADD KEY `fk_sale_user2_idx` (`iduser_modified`),
  ADD KEY `fk_sale_customer1_idx` (`idcustomer`);

--
-- Indices de la tabla `sales_payment`
--
ALTER TABLE `sales_payment`
  ADD PRIMARY KEY (`idsales_payment`),
  ADD KEY `fk_sales_payment_sale1_idx` (`idsale`),
  ADD KEY `fk_sales_payment_user1_idx` (`iduser`);

--
-- Indices de la tabla `sale_item`
--
ALTER TABLE `sale_item`
  ADD PRIMARY KEY (`idsale_item`,`idsale`),
  ADD KEY `fk_sale_item_sale1_idx` (`idsale`),
  ADD KEY `fk_sale_item_item1_idx` (`iditem`),
  ADD KEY `fk_sale_item_rent1_idx` (`idrent`),
  ADD KEY `fk_sale_item_user1_idx` (`iduser`);

--
-- Indices de la tabla `tariff`
--
ALTER TABLE `tariff`
  ADD PRIMARY KEY (`idtariff`);

--
-- Indices de la tabla `tariff_roomtype`
--
ALTER TABLE `tariff_roomtype`
  ADD PRIMARY KEY (`idtariff_roomtype`),
  ADD KEY `fk_table1_roomtype1_idx` (`idroomtype`),
  ADD KEY `fk_table1_tariff1_idx` (`idtariff`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`iduser`),
  ADD KEY `fk_user_rol1_idx` (`idrol`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `access_module_rol`
--
ALTER TABLE `access_module_rol`
  MODIFY `idaccess_module_rol` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `booking`
--
ALTER TABLE `booking`
  MODIFY `idbooking` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `cleaning`
--
ALTER TABLE `cleaning`
  MODIFY `idcleaning` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `company`
--
ALTER TABLE `company`
  MODIFY `idcompany` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `config`
--
ALTER TABLE `config`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `customer`
--
ALTER TABLE `customer`
  MODIFY `idcustomer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT de la tabla `file`
--
ALTER TABLE `file`
  MODIFY `idfile` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `hotel`
--
ALTER TABLE `hotel`
  MODIFY `idhotel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `inventory_item`
--
ALTER TABLE `inventory_item`
  MODIFY `idtransaction` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT de la tabla `item`
--
ALTER TABLE `item`
  MODIFY `iditem` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;
--
-- AUTO_INCREMENT de la tabla `module`
--
ALTER TABLE `module`
  MODIFY `idmodule` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `permission`
--
ALTER TABLE `permission`
  MODIFY `idpermission` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT de la tabla `person`
--
ALTER TABLE `person`
  MODIFY `idperson` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT de la tabla `register_log`
--
ALTER TABLE `register_log`
  MODIFY `idregister_log` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `rent`
--
ALTER TABLE `rent`
  MODIFY `idrent` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `idrol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `room`
--
ALTER TABLE `room`
  MODIFY `idroom` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;
--
-- AUTO_INCREMENT de la tabla `roomtype`
--
ALTER TABLE `roomtype`
  MODIFY `idroomtype` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `sale`
--
ALTER TABLE `sale`
  MODIFY `idsale` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT de la tabla `sales_payment`
--
ALTER TABLE `sales_payment`
  MODIFY `idsales_payment` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `sale_item`
--
ALTER TABLE `sale_item`
  MODIFY `idsale_item` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `tariff`
--
ALTER TABLE `tariff`
  MODIFY `idtariff` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `tariff_roomtype`
--
ALTER TABLE `tariff_roomtype`
  MODIFY `idtariff_roomtype` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `iduser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `access_module_rol`
--
ALTER TABLE `access_module_rol`
  ADD CONSTRAINT `fk_access_module_rol_module1` FOREIGN KEY (`idmodule`) REFERENCES `module` (`idmodule`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_access_module_rol_rol1` FOREIGN KEY (`idrol`) REFERENCES `rol` (`idrol`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `fk_booking_customer1` FOREIGN KEY (`idcustomer`) REFERENCES `customer` (`idcustomer`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_booking_room1` FOREIGN KEY (`idroom`) REFERENCES `room` (`idroom`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `cleaning`
--
ALTER TABLE `cleaning`
  ADD CONSTRAINT `fk_cleaning_room1` FOREIGN KEY (`idroom`) REFERENCES `room` (`idroom`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_cleaning_user1` FOREIGN KEY (`iduser`) REFERENCES `user` (`iduser`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `company`
--
ALTER TABLE `company`
  ADD CONSTRAINT `fk_company_customer1` FOREIGN KEY (`idcustomer`) REFERENCES `customer` (`idcustomer`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `inventory_item`
--
ALTER TABLE `inventory_item`
  ADD CONSTRAINT `fk_inventory_item_item1` FOREIGN KEY (`iditem`) REFERENCES `item` (`iditem`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_inventory_item_user1` FOREIGN KEY (`iduser`) REFERENCES `user` (`iduser`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `permission`
--
ALTER TABLE `permission`
  ADD CONSTRAINT `fk_permission_module1` FOREIGN KEY (`idmodule`) REFERENCES `module` (`idmodule`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `permission_module`
--
ALTER TABLE `permission_module`
  ADD CONSTRAINT `fk_permission_module_permission1` FOREIGN KEY (`idpermission`,`idmodule`) REFERENCES `permission` (`idpermission`, `idmodule`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_permission_module_rol1` FOREIGN KEY (`rol_idrol`) REFERENCES `rol` (`idrol`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `person`
--
ALTER TABLE `person`
  ADD CONSTRAINT `fk_person_customer1` FOREIGN KEY (`idcustomer`) REFERENCES `customer` (`idcustomer`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `register_log`
--
ALTER TABLE `register_log`
  ADD CONSTRAINT `fk_register_log_user1` FOREIGN KEY (`iduser_opening`) REFERENCES `user` (`iduser`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_register_log_user2` FOREIGN KEY (`iduser_closing`) REFERENCES `user` (`iduser`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `rent`
--
ALTER TABLE `rent`
  ADD CONSTRAINT `fk_rent_booking1` FOREIGN KEY (`idbooking`) REFERENCES `booking` (`idbooking`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_rent_customer1` FOREIGN KEY (`customer_idcustomer`) REFERENCES `customer` (`idcustomer`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_rent_room1` FOREIGN KEY (`idroom`) REFERENCES `room` (`idroom`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_rent_sale1` FOREIGN KEY (`idsale`) REFERENCES `sale` (`idsale`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `room`
--
ALTER TABLE `room`
  ADD CONSTRAINT `fk_room_roomtype1` FOREIGN KEY (`idroomtype`) REFERENCES `roomtype` (`idroomtype`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `roomtype`
--
ALTER TABLE `roomtype`
  ADD CONSTRAINT `fk_roomtype_hotel` FOREIGN KEY (`idhotel`) REFERENCES `hotel` (`idhotel`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `sale`
--
ALTER TABLE `sale`
  ADD CONSTRAINT `fk_sale_customer1` FOREIGN KEY (`idcustomer`) REFERENCES `customer` (`idcustomer`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_sale_user1` FOREIGN KEY (`iduser_creation`) REFERENCES `user` (`iduser`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_sale_user2` FOREIGN KEY (`iduser_modified`) REFERENCES `user` (`iduser`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `sales_payment`
--
ALTER TABLE `sales_payment`
  ADD CONSTRAINT `fk_sales_payment_sale1` FOREIGN KEY (`idsale`) REFERENCES `sale` (`idsale`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_sales_payment_user1` FOREIGN KEY (`iduser`) REFERENCES `user` (`iduser`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `sale_item`
--
ALTER TABLE `sale_item`
  ADD CONSTRAINT `fk_sale_item_item1` FOREIGN KEY (`iditem`) REFERENCES `item` (`iditem`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_sale_item_rent1` FOREIGN KEY (`idrent`) REFERENCES `rent` (`idrent`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_sale_item_sale1` FOREIGN KEY (`idsale`) REFERENCES `sale` (`idsale`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_sale_item_user1` FOREIGN KEY (`iduser`) REFERENCES `user` (`iduser`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tariff_roomtype`
--
ALTER TABLE `tariff_roomtype`
  ADD CONSTRAINT `fk_table1_roomtype1` FOREIGN KEY (`idroomtype`) REFERENCES `roomtype` (`idroomtype`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_table1_tariff1` FOREIGN KEY (`idtariff`) REFERENCES `tariff` (`idtariff`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `fk_user_rol1` FOREIGN KEY (`idrol`) REFERENCES `rol` (`idrol`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
