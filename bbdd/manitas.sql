-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 19-04-2023 a las 08:41:25
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `manitas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id_cliente` int(11) NOT NULL,
  `nombre_cliente` varchar(40) DEFAULT NULL,
  `apellidos_cliente` varchar(40) DEFAULT NULL,
  `dni` varchar(40) DEFAULT NULL,
  `email` varchar(40) DEFAULT NULL,
  `telefono` int(11) DEFAULT NULL,
  `calle` varchar(40) DEFAULT NULL,
  `numero` int(11) DEFAULT NULL,
  `escalera` varchar(2) DEFAULT '-',
  `piso` varchar(8) DEFAULT NULL,
  `puerta` varchar(2) DEFAULT NULL,
  `cp` int(11) DEFAULT NULL,
  `poblacion` varchar(40) DEFAULT NULL,
  `date_add` timestamp NOT NULL DEFAULT current_timestamp(),
  `date_upd` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id_cliente`, `nombre_cliente`, `apellidos_cliente`, `dni`, `email`, `telefono`, `calle`, `numero`, `escalera`, `piso`, `puerta`, `cp`, `poblacion`, `date_add`, `date_upd`) VALUES
(1, 'Maxitin', 'Bichitingo', '11111111', 'maxitingo@manitas.es', 12012012, 'Aragón', 360, '-', 'ático', '3', 8009, 'Barcelona', '2023-04-10 16:58:20', '2023-04-18 10:18:25'),
(2, 'Pepito', 'Grillo', '22222222', 'pegrillo@manitas.es', 123123123, 'Aribau', 191, '', '2', 'B', 0, 'Barcelona', '2023-04-10 17:00:08', '2023-04-11 10:27:03'),
(3, 'Stevie', 'Wonder', '33333333', '', 234234234, 'Buenavista', 11, '', '9', 'B', 0, 'Barcelona', '2023-04-10 17:00:12', '2023-04-11 10:28:02'),
(4, 'Aitor', 'Menta', '444444444', 'amenta@manitas.es', 123456789, 'Torrent de les flors', 10, '', '3', '4ª', 0, 'Barcelona', '2023-04-10 17:00:23', '2023-04-18 10:17:19'),
(5, 'Esther', 'Colero', '', '', 0, '', 0, '', '', '', 0, 'Barcelona', '2023-04-10 17:02:22', '2023-04-11 10:32:56'),
(6, 'Johny', 'Mentero', '', '', 3, '', 0, '', '', '', 0, 'Barcelona', '2023-04-10 17:12:59', '2023-04-11 10:33:08'),
(7, 'Cristina', 'Sanz', '', '', 670359848, 'Torrent de les flors', 29, '', 'Entlo', '2ª', 0, 'Barcelona', '2023-04-17 09:37:14', '2023-04-17 09:37:59'),
(8, 'Armando', 'Jaleo', '98765678', 'ajaleo@manitas.es', 987654321, 'Pendiente', 8, '', 'bajos', '', 0, 'Barcelona', '2023-04-18 10:23:20', '2023-04-18 10:24:08');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `colaboradores`
--

CREATE TABLE `colaboradores` (
  `id_colaborador` int(11) NOT NULL,
  `colaborador` varchar(40) DEFAULT NULL,
  `descripcion_colaborador` text DEFAULT NULL,
  `date_add` timestamp NOT NULL DEFAULT current_timestamp(),
  `date_upd` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `colaboradores`
--

INSERT INTO `colaboradores` (`id_colaborador`, `colaborador`, `descripcion_colaborador`, `date_add`, `date_upd`) VALUES
(1, 'Externo', '', '2022-03-17 06:17:11', '2022-06-17 07:10:33'),
(2, 'Interno', '', '2022-04-28 22:07:21', '2022-06-17 07:13:44');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estados`
--

CREATE TABLE `estados` (
  `id_estado` int(11) NOT NULL,
  `estado` varchar(40) DEFAULT '1',
  `descripcion` text DEFAULT NULL,
  `date_add` timestamp NOT NULL DEFAULT current_timestamp(),
  `date_upd` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `estados`
--

INSERT INTO `estados` (`id_estado`, `estado`, `descripcion`, `date_add`, `date_upd`) VALUES
(1, 'Registrado', 'El tiquet se ha registrado en el sistema', '2023-04-11 11:24:47', '2023-04-12 00:40:22'),
(2, 'Asignado', 'El tiquet ha sido asignado a un colaborador', '2023-04-12 00:06:27', '2023-04-12 00:40:32'),
(3, 'En proceso', 'Se están realizando las actuaciones necesarias', '2023-04-12 00:15:56', '2023-04-12 00:40:43'),
(4, 'En espera', 'La actuación se ha detenido a falta de alguna actuación por parte del cliente. Obligatorio especificar el motivo.', '2023-04-12 00:17:56', '2023-04-12 00:42:48'),
(5, 'Pendiente', 'El tiquet se encuentra a la espera de información i/o actuación interna. Es obligatorio especificar el motivo.', '2023-04-12 00:46:31', '2023-04-12 00:46:31'),
(6, 'Resuelto', 'Las actuaciones han finalizado', '2023-04-12 00:59:48', '2023-04-12 00:59:48');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fuentes`
--

CREATE TABLE `fuentes` (
  `id_fuente` int(11) NOT NULL,
  `fuente` varchar(40) NOT NULL,
  `date_add` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `fuentes`
--

INSERT INTO `fuentes` (`id_fuente`, `fuente`, `date_add`) VALUES
(1, 'amarat-bold', '0000-00-00 00:00:00'),
(2, 'arima-madurai', '0000-00-00 00:00:00'),
(3, 'catamaran', '0000-00-00 00:00:00'),
(4, 'comfortaa-bold', '2022-12-21 22:11:23'),
(5, 'comfortaa-regular', '2022-12-21 22:04:50'),
(6, 'de-valencia', '0000-00-00 00:00:00'),
(7, 'densia', '0000-00-00 00:00:00'),
(8, 'emblem', '0000-00-00 00:00:00'),
(9, 'fat-wandals', '0000-00-00 00:00:00'),
(10, 'haetten-schweiler', '0000-00-00 00:00:00'),
(11, 'lemonada', '0000-00-00 00:00:00'),
(12, 'lobster', '0000-00-00 00:00:00'),
(13, 'manrope', '0000-00-00 00:00:00'),
(14, 'monoton', '0000-00-00 00:00:00'),
(15, 'montserrat', '0000-00-00 00:00:00'),
(16, 'nunito', '0000-00-00 00:00:00'),
(17, 'oswald', '0000-00-00 00:00:00'),
(18, 'permanent-marker', '2022-12-21 22:13:57'),
(19, 'pompiere', '0000-00-00 00:00:00'),
(20, 'restu', '0000-00-00 00:00:00'),
(21, 'roboto', '0000-00-00 00:00:00'),
(22, 'robofan', '0000-00-00 00:00:00'),
(23, 'spoken', '0000-00-00 00:00:00'),
(24, 'transformer', '0000-00-00 00:00:00'),
(25, 'varela', '0000-00-00 00:00:00'),
(26, 'zanzabar', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupo_usuarios`
--

CREATE TABLE `grupo_usuarios` (
  `id_grupo` int(11) NOT NULL,
  `grupo` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `grupo_usuarios`
--

INSERT INTO `grupo_usuarios` (`id_grupo`, `grupo`) VALUES
(1, 'administrador'),
(2, 'colaborador'),
(3, 'vendedor'),
(4, 'usuario');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `movimientos_stock`
--

CREATE TABLE `movimientos_stock` (
  `id_movimiento` int(11) NOT NULL,
  `proveedor_id` int(11) DEFAULT 1,
  `destino_id` int(11) DEFAULT 1,
  `producto_id` int(11) NOT NULL,
  `stock_antes` float DEFAULT NULL,
  `recarga` float DEFAULT 0,
  `retirada` float DEFAULT 0,
  `stock_despues` float DEFAULT NULL,
  `pc` float DEFAULT NULL,
  `date_add` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `movimientos_stock`
--

INSERT INTO `movimientos_stock` (`id_movimiento`, `proveedor_id`, `destino_id`, `producto_id`, `stock_antes`, `recarga`, `retirada`, `stock_despues`, `pc`, `date_add`) VALUES
(4, 1, 1, 9, 0, 315, 0, 315, 1.8, '2022-03-29 09:18:03'),
(5, 1, 1, 9, 315, 315, 0, 630, 1.8, '2022-03-29 09:20:05'),
(6, 1, 1, 14, 0, 175, 0, 175, 2, '2022-03-29 09:20:28'),
(7, 1, 1, 11, 0, 235, 0, 235, 1.7, '2022-03-29 09:21:53'),
(8, 1, 1, 11, 235, 235, 0, 470, 1.7, '2022-03-29 09:22:18'),
(9, 1, 1, 6, 0, 476, 0, 476, 2.3, '2022-03-29 09:26:57'),
(10, 1, 1, 15, 0, 200, 0, 200, 2.5, '2022-03-30 03:40:30'),
(11, 1, 1, 7, 0, 430, 0, 430, 2.6, '2022-04-02 00:17:56'),
(15, 1, 1, 15, 0, 200, 0, 200, 2.5, '2022-03-30 03:40:30'),
(16, 1, 1, 15, 0, 200, 0, 200, 2.5, '2022-03-30 03:40:30'),
(17, 1, 2, 6, 476, 0, 25, 451, NULL, '2022-04-22 23:42:49'),
(18, 1, 2, 6, 451, 0, 25, 426, NULL, '2022-04-22 23:43:52'),
(19, 1, 1, 6, 426, 0, 15, 411, NULL, '2022-04-22 23:44:28'),
(20, 1, 1, 6, 411, 0, 15, 396, NULL, '2022-04-22 23:45:58'),
(21, 1, 2, 6, 396, 0, 100, 296, NULL, '2022-04-24 00:35:29'),
(24, 1, 2, 12, 34, 0, 10, 24, NULL, '2022-04-24 20:37:41'),
(25, 1, 2, 12, 24, 0, 10, 14, NULL, '2022-04-24 20:40:54'),
(27, 1, 2, 6, 296, 0, 30, 266, NULL, '2022-04-25 07:46:04'),
(28, 1, 1, 11, 470, 0, 20, 450, NULL, '2022-04-25 07:48:50'),
(29, 1, 1, 11, 450, 0, 0, 450, NULL, '2022-04-25 07:54:29'),
(30, 1, 1, 11, 450, 0, 0, 450, NULL, '2022-04-25 07:55:53'),
(31, 1, 1, 16, 0, 450, 0, 450, 1.8, '2022-04-25 08:21:02'),
(32, 1, 1, 16, 450, 450, 0, 900, 1.8, '2022-04-25 08:37:48'),
(36, 1, 2, 2, 30, 0, 30, 0, NULL, '2022-06-16 19:56:57'),
(37, 1, 1, 2, 0, 20, 0, 20, 1.2, '2022-06-20 19:48:41'),
(38, 1, 1, 2, 20, 100, 0, 120, 0, '2022-06-27 15:20:23'),
(39, 1, 1, 13, 0, 50, 0, 50, 0, '2022-06-27 15:21:09'),
(40, 1, 1, 7, 430, 200, 0, 630, 0, '2022-08-05 19:20:29'),
(41, 1, 1, 2, 120, 100, 0, 220, 0, '2022-11-28 21:11:21');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id_producto` int(11) NOT NULL,
  `nombre_producto` varchar(40) NOT NULL,
  `servicio_id` int(11) NOT NULL,
  `variedad_id` int(11) NOT NULL,
  `bote` float DEFAULT 0,
  `cantidad` float DEFAULT 0,
  `pvp` float DEFAULT 0,
  `pc` float DEFAULT 0,
  `dispensario` float DEFAULT 0,
  `visible_id` int(11) NOT NULL DEFAULT 1,
  `date_add` timestamp NOT NULL DEFAULT current_timestamp(),
  `date_upd` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id_producto`, `nombre_producto`, `servicio_id`, `variedad_id`, `bote`, `cantidad`, `pvp`, `pc`, `dispensario`, `visible_id`, `date_add`, `date_upd`) VALUES
(2, 'Green Poison', 1, 4, 0, 220, 9, 0, 30, 0, '2022-03-17 09:58:20', '2022-12-10 02:19:54'),
(6, 'Malawi', 1, 2, 0, 266, 10, 2.3, 30, 1, '2022-03-18 21:54:32', '2022-06-13 15:05:13'),
(7, 'Zamaldelica', 1, 3, 0, 630, 15, 0, 0, 1, '2022-03-18 21:55:41', '2022-08-05 19:20:29'),
(8, 'Bangi Haze', 1, 3, 0, 375, 13, 2.6, 0, 1, '2022-03-18 22:17:32', '2022-06-16 21:09:09'),
(9, 'Silver Haze', 1, 3, 0, 630, 8, 1.8, 0, 1, '2022-03-18 22:18:42', '2022-06-20 12:33:52'),
(10, 'China Yunnan', 1, 4, 0, 210, 0, 3.8, 0, 0, '2022-03-18 22:20:53', '2022-03-18 23:13:59'),
(11, 'Congo', 1, 2, 0, 450, 0, 1.7, 0, 0, '2022-03-18 22:24:04', '2022-04-25 07:48:50'),
(12, 'Etíope', 1, 3, 0, 14, 8, 6, 20, 1, '2022-03-18 22:24:37', '2022-04-24 20:40:54'),
(13, 'Golden Tiguer', 1, 3, 0, 50, 0, 0, 0, 1, '2022-03-18 23:08:27', '2022-06-27 15:21:09'),
(14, 'Nicole', 2, 4, 0, 175, 7, 2, 0, 1, '2022-03-23 07:54:53', '2022-04-07 20:20:39'),
(15, 'Gorila Cookies', 2, 2, 0, 200, 13, 2.5, 0, 1, '2022-03-23 19:52:37', '2022-06-09 12:23:26'),
(16, 'Skunk', 1, 4, 0, 900, 0, 1.8, 0, 1, '2022-04-07 20:29:22', '2022-12-07 16:35:17'),
(17, 'Afgani', 1, 3, 0, 0, 0, 0, 0, 0, '2022-04-07 20:30:21', '2022-04-07 20:30:21'),
(18, 'Sherblato', 1, 4, 0, 0, 0, 0, 0, 0, '2022-04-07 20:30:54', '2022-04-07 20:30:54'),
(19, 'Rainbow Chip', 1, 4, 0, 0, 0, 0, 0, 1, '2022-04-07 20:31:21', '2022-06-16 21:08:59'),
(20, 'Tropcherry', 1, 3, 0, 0, 0, 0, 0, 0, '2022-06-03 09:32:23', '2022-06-03 09:32:54'),
(22, 'Pre Rolled Weed Green Poison', 3, 1, 0, 0, 5, 0, 0, 1, '2022-06-03 09:49:00', '2022-07-10 00:11:35'),
(23, 'Pre Rolled Weed Tropicana', 3, 1, 0, 0, 7, 0, 0, 1, '2022-06-06 12:12:00', '2022-07-10 00:10:15'),
(24, 'Cali Punch', 4, 1, 0, 0, 0, 0, 0, 1, '2022-06-16 18:31:48', '2022-06-16 18:31:48');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicios`
--

CREATE TABLE `servicios` (
  `id_servicio` int(11) NOT NULL,
  `servicio` varchar(40) DEFAULT NULL,
  `descripcion_servicio` text DEFAULT NULL,
  `activo` tinyint(1) NOT NULL DEFAULT 1,
  `date_add` timestamp NOT NULL DEFAULT current_timestamp(),
  `date_upd` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `servicios`
--

INSERT INTO `servicios` (`id_servicio`, `servicio`, `descripcion_servicio`, `activo`, `date_add`, `date_upd`) VALUES
(1, 'Electricidad', 'Instalaciones Elecetricas.\r\nSustitucuón de mecanismos.\r\nActualización de cuadros.', 1, '2022-03-16 16:05:04', '2023-04-05 16:27:55'),
(2, 'Albañileria', 'Construcción y reformas en general.', 0, '2022-03-19 07:19:40', '2023-04-05 16:28:50'),
(3, 'Fontanería', 'Fugas de agua.\r\nSustitucuón de grifos.\r\nArreglos de WC', 0, '2022-04-06 17:33:25', '2023-04-05 16:29:45'),
(4, 'Calefacción', 'Mantenimiento de sistemas de calefacción (purgar circuito y revisión de válvulas)\r\nInstalación y reparación de sistemas de calefacción.', 0, '2022-04-28 21:38:24', '2023-04-05 16:31:41'),
(5, 'Carpintería', 'Arreglo de armarios.\r\nCocinas.\r\nMontaje de muebles.\r\nPuertas.', 1, '2022-07-17 20:59:43', '2023-04-05 16:33:39');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `tema_id` int(11) NOT NULL,
  `fuente_id` int(11) NOT NULL,
  `titulo_id` int(11) NOT NULL,
  `date_add` timestamp NOT NULL DEFAULT current_timestamp(),
  `date_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `settings`
--

INSERT INTO `settings` (`id`, `tema_id`, `fuente_id`, `titulo_id`, `date_add`, `date_update`) VALUES
(1, 1, 1, 1, '2021-05-21 01:07:38', '2023-04-13 10:08:17');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `temas`
--

CREATE TABLE `temas` (
  `id_tema` int(11) NOT NULL,
  `color` varchar(40) NOT NULL,
  `date_add` timestamp NOT NULL DEFAULT current_timestamp(),
  `date_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `temas`
--

INSERT INTO `temas` (`id_tema`, `color`, `date_add`, `date_update`) VALUES
(1, 'azul-1', '2021-05-02 23:51:23', '2023-04-13 08:06:37'),
(2, 'azul-2', '2021-05-02 23:51:23', '2023-04-13 08:07:07'),
(3, 'azul-3', '2021-05-02 23:51:23', '2023-04-13 08:17:23'),
(4, 'azul-4', '2021-05-02 23:51:23', '2023-04-13 08:17:28'),
(5, 'azul-5', '2021-05-02 23:51:23', '2023-04-13 08:19:24'),
(6, 'azul-6', '2021-05-02 23:51:23', '2023-04-13 08:19:33'),
(7, 'azul-7', '2021-05-02 23:51:23', '2023-04-13 08:19:40'),
(8, 'azul-8', '2021-05-02 23:51:23', '2023-04-13 08:19:52'),
(9, 'azul-9', '2021-05-02 23:51:23', '2023-04-13 08:20:01'),
(10, 'azul-10', '2021-05-02 23:51:23', '2023-04-14 10:01:03'),
(11, 'azul-rojo', '2021-05-02 23:51:23', '2023-04-14 10:03:18'),
(12, 'azul-rosa', '2021-05-02 23:51:23', '2023-04-13 08:20:31'),
(13, 'beige-1', '2021-05-02 23:51:23', '2023-04-13 08:20:48'),
(14, 'fucsia', '2021-05-02 23:51:23', '2023-04-14 10:04:22'),
(15, 'gris-1', '2021-05-02 23:51:23', '2023-04-14 10:04:37'),
(16, 'gris-2', '2021-05-02 23:51:23', '2023-04-14 10:04:45'),
(17, 'gris-3', '2021-05-02 23:51:23', '2023-04-14 10:04:51'),
(18, 'gris-4', '2021-05-02 23:51:23', '2023-04-14 10:04:58'),
(19, 'marron-1', '2021-05-02 23:51:23', '2023-04-14 10:05:14'),
(20, 'naranja-1', '2021-05-02 23:51:23', '2023-04-14 10:14:41'),
(21, 'naranja-2', '2021-05-02 23:51:23', '2023-04-14 10:14:48'),
(22, 'naranja-3', '2021-05-02 23:51:23', '2023-04-14 10:14:52'),
(23, 'naranja-4', '2021-05-02 23:51:23', '2023-04-14 10:15:00'),
(24, 'naranja-5', '2021-05-02 23:51:23', '2023-04-14 10:15:04'),
(25, 'naranja-6', '2021-05-02 23:51:23', '2023-04-14 10:15:07'),
(26, 'naranja-azul', '2021-05-02 23:51:23', '2023-04-14 10:15:16'),
(27, 'naranja-verde', '2021-05-02 23:51:23', '2023-04-14 10:15:22'),
(28, 'naranja-azul', '2021-05-02 23:51:23', '2023-04-14 10:06:37'),
(29, 'naranja-verde', '2021-05-02 23:51:23', '2023-04-14 10:06:51'),
(30, 'negro', '2021-05-02 23:51:23', '2023-04-14 10:07:02'),
(31, 'ocre-1', '2021-05-02 23:51:23', '2023-04-14 10:07:31'),
(32, 'ocre-2', '2021-05-02 23:51:23', '2023-04-14 10:07:37'),
(33, 'rojo', '2021-05-02 23:51:23', '2023-04-14 10:07:47'),
(34, 'rojo-azul', '2021-05-02 23:51:23', '2023-04-14 10:07:58'),
(35, 'rojo-verde', '2021-05-02 23:51:23', '2023-04-14 10:08:04'),
(36, 'rosa-1', '2021-05-02 23:51:23', '2023-04-14 10:08:12'),
(37, 'rosa-2', '2021-05-02 23:51:23', '2023-04-14 10:08:18'),
(38, 'rosa-3', '2021-05-02 23:51:23', '2023-04-14 10:08:24'),
(39, 'rosa-azul', '2021-05-02 23:51:23', '2023-04-14 10:08:34'),
(40, 'turquesa', '2021-05-02 23:51:23', '2023-04-14 10:08:52'),
(41, 'verde-1', '2021-05-02 23:51:23', '2023-04-14 10:09:25'),
(42, 'verde-2', '2021-05-02 23:51:23', '2023-04-14 10:09:29'),
(43, 'verde-3', '2021-05-02 23:51:23', '2023-04-14 10:09:33'),
(44, 'verde-4', '2021-05-02 23:51:23', '2023-04-14 10:09:40'),
(45, 'verde-5', '2021-05-02 23:51:23', '2023-04-14 10:09:46'),
(46, 'verde-menta', '2021-05-02 23:51:23', '2023-04-14 10:10:00'),
(47, 'verde-naranja', '2021-05-02 23:51:23', '2023-04-14 10:10:10'),
(48, 'violeta-1', '2021-05-02 23:51:23', '2023-04-14 10:10:24'),
(49, 'violeta-2', '2021-05-02 23:51:23', '2023-04-14 10:10:31'),
(50, 'violeta-3', '2021-05-02 23:51:23', '2023-04-14 10:10:40'),
(51, 'violeta-rosa', '2021-05-10 00:15:20', '2023-04-14 10:10:58');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tiquets`
--

CREATE TABLE `tiquets` (
  `id_tiquet` int(11) NOT NULL,
  `cliente_id` int(11) NOT NULL,
  `servicio_id` int(11) NOT NULL,
  `incidencia` varchar(255) NOT NULL,
  `estado_id` int(11) NOT NULL DEFAULT 1,
  `colaborador_id` int(11) DEFAULT NULL,
  `date_add` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tiquets`
--

INSERT INTO `tiquets` (`id_tiquet`, `cliente_id`, `servicio_id`, `incidencia`, `estado_id`, `colaborador_id`, `date_add`) VALUES
(1, 7, 5, 'Presupuesto cambio persianas', 3, 2, '2023-04-17 10:11:21'),
(2, 3, 3, 'instalar grifo en lavadero', 2, 2, '2023-04-18 10:04:14'),
(3, 5, 1, 'Interruptor no funciona', 1, NULL, '2023-04-18 10:21:02'),
(4, 6, 5, 'Reparar puerta de armario', 1, NULL, '2023-04-18 10:32:17'),
(5, 4, 4, 'Se ha entregado presupuesto al cliente. El tiquet queda a la espera de una respuesta del cliente.', 4, 1, '2023-04-18 10:34:43');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tiquet_1`
--

CREATE TABLE `tiquet_1` (
  `fecha` timestamp NULL DEFAULT current_timestamp(),
  `estado_id` int(11) DEFAULT 1,
  `colaborador_id` int(11) DEFAULT NULL,
  `actuacion` varchar(255) NOT NULL DEFAULT 'Apertura de tiquet',
  `comentario` varchar(255) NOT NULL DEFAULT 'Apertura de tiquet'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tiquet_1`
--

INSERT INTO `tiquet_1` (`fecha`, `estado_id`, `colaborador_id`, `actuacion`, `comentario`) VALUES
('2023-04-17 10:11:21', 1, NULL, 'Apertura de tiquet', 'Apertura de tiquet'),
('2023-04-17 10:21:28', 2, NULL, 'asignado a 2', 'Asignado a Edu para presupuestar');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tiquet_2`
--

CREATE TABLE `tiquet_2` (
  `fecha` timestamp NULL DEFAULT current_timestamp(),
  `estado_id` int(11) DEFAULT 1,
  `colaborador_id` int(11) DEFAULT NULL,
  `actuacion` varchar(255) NOT NULL DEFAULT 'Apertura de tiquet',
  `comentario` varchar(255) NOT NULL DEFAULT 'Apertura de tiquet'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tiquet_2`
--

INSERT INTO `tiquet_2` (`fecha`, `estado_id`, `colaborador_id`, `actuacion`, `comentario`) VALUES
('2023-04-18 10:04:14', 1, NULL, 'Apertura de tiquet', 'Apertura de tiquet'),
('2023-04-18 10:04:43', 2, NULL, 'asignado a 2', 'Hay que hacer presupuesto'),
('2023-04-18 10:07:07', 2, NULL, 'asignado a 2', 'Hay que hacer presupuesto');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tiquet_3`
--

CREATE TABLE `tiquet_3` (
  `fecha` timestamp NULL DEFAULT current_timestamp(),
  `estado_id` int(11) DEFAULT 1,
  `colaborador_id` int(11) DEFAULT NULL,
  `actuacion` varchar(255) NOT NULL DEFAULT 'Apertura de tiquet',
  `comentario` varchar(255) NOT NULL DEFAULT 'Apertura de tiquet'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tiquet_3`
--

INSERT INTO `tiquet_3` (`fecha`, `estado_id`, `colaborador_id`, `actuacion`, `comentario`) VALUES
('2023-04-18 10:21:02', 1, NULL, 'Apertura de tiquet', 'Apertura de tiquet');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tiquet_4`
--

CREATE TABLE `tiquet_4` (
  `fecha` timestamp NULL DEFAULT current_timestamp(),
  `estado_id` int(11) DEFAULT 1,
  `colaborador_id` int(11) DEFAULT NULL,
  `actuacion` varchar(255) NOT NULL DEFAULT 'Apertura de tiquet',
  `comentario` varchar(255) NOT NULL DEFAULT 'Apertura de tiquet'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tiquet_4`
--

INSERT INTO `tiquet_4` (`fecha`, `estado_id`, `colaborador_id`, `actuacion`, `comentario`) VALUES
('2023-04-18 10:32:17', 1, NULL, 'Apertura de tiquet', 'Apertura de tiquet');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tiquet_5`
--

CREATE TABLE `tiquet_5` (
  `fecha` timestamp NULL DEFAULT current_timestamp(),
  `estado_id` int(11) DEFAULT 1,
  `colaborador_id` int(11) DEFAULT NULL,
  `actuacion` varchar(255) NOT NULL DEFAULT 'Apertura de tiquet',
  `comentario` varchar(255) NOT NULL DEFAULT 'Apertura de tiquet'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tiquet_5`
--

INSERT INTO `tiquet_5` (`fecha`, `estado_id`, `colaborador_id`, `actuacion`, `comentario`) VALUES
('2023-04-18 10:34:43', 1, NULL, 'Apertura de tiquet', 'Apertura de tiquet'),
('2023-04-18 10:35:48', 2, NULL, 'asignado a 1', 'Hacer presupuesto de instalación de equipo de aire acondicionado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `titulos`
--

CREATE TABLE `titulos` (
  `id_titulo` int(11) NOT NULL,
  `titulo` varchar(40) NOT NULL,
  `date_add` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `titulos`
--

INSERT INTO `titulos` (`id_titulo`, `titulo`, `date_add`) VALUES
(1, 'amarat-bold', '0000-00-00 00:00:00'),
(2, 'arima-madurai', '0000-00-00 00:00:00'),
(3, 'catamaran', '0000-00-00 00:00:00'),
(4, 'comfortaa-bold', '2022-12-21 23:11:03'),
(5, 'comfortaa-regular', '2022-12-21 23:09:19'),
(6, 'de-valencia', '0000-00-00 00:00:00'),
(7, 'densia', '0000-00-00 00:00:00'),
(8, 'emblem', '0000-00-00 00:00:00'),
(9, 'fat-wandals', '0000-00-00 00:00:00'),
(10, 'haettenschweiler', '2022-12-21 23:13:27'),
(11, 'lemonada', '0000-00-00 00:00:00'),
(12, 'lobster', '0000-00-00 00:00:00'),
(13, 'manrope', '0000-00-00 00:00:00'),
(14, 'monoton', '0000-00-00 00:00:00'),
(15, 'montserrat', '0000-00-00 00:00:00'),
(16, 'nunito', '0000-00-00 00:00:00'),
(17, 'oswald', '0000-00-00 00:00:00'),
(18, 'permanent-marker', '2022-12-21 23:13:14'),
(19, 'pompiere', '0000-00-00 00:00:00'),
(20, 'restu', '0000-00-00 00:00:00'),
(21, 'roboto', '0000-00-00 00:00:00'),
(22, 'robofan', '0000-00-00 00:00:00'),
(23, 'spoken', '0000-00-00 00:00:00'),
(24, 'transformer', '0000-00-00 00:00:00'),
(25, 'varela', '0000-00-00 00:00:00'),
(26, 'zanzabar', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id_user` int(10) UNSIGNED NOT NULL,
  `username` varchar(40) NOT NULL,
  `nombre` varchar(40) DEFAULT NULL,
  `apellidos` varchar(150) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `grupo_id` int(11) NOT NULL DEFAULT 1,
  `tema_id` int(11) DEFAULT 50,
  `fuente_id` int(11) NOT NULL DEFAULT 21,
  `titulo_id` int(11) NOT NULL DEFAULT 7,
  `date_add` timestamp NOT NULL DEFAULT current_timestamp(),
  `date_upd` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id_user`, `username`, `nombre`, `apellidos`, `email`, `password`, `grupo_id`, `tema_id`, `fuente_id`, `titulo_id`, `date_add`, `date_upd`) VALUES
(1, 'admin', 'Diego', 'Perea', 'admin@ccsm.es', '$2y$10$8oktY8Sb0N3hf2FmQkP6G.FrTd6axSR26oBP5uq0Osjaa98yGCUji', 1, 33, 16, 15, '2022-03-04 23:22:50', '2023-04-18 10:02:07'),
(2, 'diesgo', '', '', 'diesgo@gmail.com', 'dimapema', 1, 49, 25, 11, '2022-03-05 07:37:48', '2022-11-27 00:07:33'),
(8, 'ddbold', '', '', 'ddbold@ccsm.es', '$2y$10$7yqCQhKvEuY7KvuUkZww8.yRjV03NviycCpkno7zSYQAZap5EIRee', 2, 5, 21, 5, '2022-05-09 10:52:01', '2022-07-16 00:07:01'),
(9, 'rafa', '', '', 'rafa@ccsm.es', '$2y$10$txknwHhEWqKCS2til953kOCK7QblIl7y4H9jPGbUX3FM7h7NBVoam', 3, 15, 20, 20, '2022-06-05 17:29:41', '2022-07-03 12:29:50'),
(10, 'invitado', 'John', 'Doe', 'invitado@ccsm.es', '$2y$10$UHBfTuw3eFydyJF/8104/uq..dj.27xnpZgt8Dg3uua60EW5ePc/u', 4, 51, 15, 4, '2022-06-18 05:33:29', '2022-09-01 19:54:41'),
(11, 'guess', '', '', 'guess@ccsm.es', '$2y$10$hSaTNUKusoCn7efe7ChHje5hdBsQfyHHZYD5.SaQuvfJiHMyEaaky', 4, 11, 3, 16, '2022-10-11 00:08:12', '2022-10-31 11:11:18');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `tratamiento` varchar(1) NOT NULL,
  `birthday` date NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `apellidos` varchar(20) NOT NULL,
  `email` varchar(40) NOT NULL,
  `password` varchar(11) NOT NULL,
  `ofertas` tinyint(1) NOT NULL,
  `boletin` tinyint(1) NOT NULL,
  `online` tinyint(1) NOT NULL,
  `date_add` timestamp NOT NULL DEFAULT current_timestamp(),
  `date_upd` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `tratamiento`, `birthday`, `nombre`, `apellidos`, `email`, `password`, `ofertas`, `boletin`, `online`, `date_add`, `date_upd`) VALUES
(1, 'h', '1973-11-11', 'Diego', 'Perea', 'diesgo@gmail.com', 'dimapema', 1, 1, 1, '2022-10-13 22:43:38', '2022-10-13 23:17:20'),
(2, 'h', '1945-12-17', 'Antonio', 'Perea Alvarez', 'pereaalvarez@gmail.com', 'andreaitor', 1, 1, 0, '2022-10-17 20:26:50', '2022-10-17 20:26:50');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id_cliente`),
  ADD KEY `rol_id` (`email`),
  ADD KEY `email` (`email`),
  ADD KEY `dni` (`dni`),
  ADD KEY `telefono` (`telefono`);

--
-- Indices de la tabla `colaboradores`
--
ALTER TABLE `colaboradores`
  ADD PRIMARY KEY (`id_colaborador`);

--
-- Indices de la tabla `estados`
--
ALTER TABLE `estados`
  ADD PRIMARY KEY (`id_estado`);

--
-- Indices de la tabla `fuentes`
--
ALTER TABLE `fuentes`
  ADD PRIMARY KEY (`id_fuente`);

--
-- Indices de la tabla `grupo_usuarios`
--
ALTER TABLE `grupo_usuarios`
  ADD PRIMARY KEY (`id_grupo`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id_producto`);

--
-- Indices de la tabla `servicios`
--
ALTER TABLE `servicios`
  ADD PRIMARY KEY (`id_servicio`);

--
-- Indices de la tabla `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tema_id` (`tema_id`),
  ADD KEY `titulo_id` (`titulo_id`),
  ADD KEY `fuente_id` (`fuente_id`);

--
-- Indices de la tabla `temas`
--
ALTER TABLE `temas`
  ADD PRIMARY KEY (`id_tema`);

--
-- Indices de la tabla `tiquets`
--
ALTER TABLE `tiquets`
  ADD PRIMARY KEY (`id_tiquet`),
  ADD KEY `estado_id` (`estado_id`),
  ADD KEY `colaborador_id` (`colaborador_id`),
  ADD KEY `cliente_id` (`cliente_id`);

--
-- Indices de la tabla `titulos`
--
ALTER TABLE `titulos`
  ADD PRIMARY KEY (`id_titulo`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `grupo_id` (`grupo_id`),
  ADD KEY `tema_id` (`tema_id`),
  ADD KEY `fuente_id` (`fuente_id`),
  ADD KEY `titulo_id` (`titulo_id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `colaboradores`
--
ALTER TABLE `colaboradores`
  MODIFY `id_colaborador` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `estados`
--
ALTER TABLE `estados`
  MODIFY `id_estado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `fuentes`
--
ALTER TABLE `fuentes`
  MODIFY `id_fuente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de la tabla `grupo_usuarios`
--
ALTER TABLE `grupo_usuarios`
  MODIFY `id_grupo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `servicios`
--
ALTER TABLE `servicios`
  MODIFY `id_servicio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `temas`
--
ALTER TABLE `temas`
  MODIFY `id_tema` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT de la tabla `tiquets`
--
ALTER TABLE `tiquets`
  MODIFY `id_tiquet` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `titulos`
--
ALTER TABLE `titulos`
  MODIFY `id_titulo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `settings`
--
ALTER TABLE `settings`
  ADD CONSTRAINT `settings_ibfk_3` FOREIGN KEY (`titulo_id`) REFERENCES `titulos` (`id_titulo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `settings_ibfk_4` FOREIGN KEY (`tema_id`) REFERENCES `temas` (`id_tema`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `settings_ibfk_5` FOREIGN KEY (`fuente_id`) REFERENCES `fuentes` (`id_fuente`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tiquets`
--
ALTER TABLE `tiquets`
  ADD CONSTRAINT `tiquets_ibfk_3` FOREIGN KEY (`estado_id`) REFERENCES `estados` (`id_estado`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tiquets_ibfk_4` FOREIGN KEY (`colaborador_id`) REFERENCES `colaboradores` (`id_colaborador`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tiquets_ibfk_5` FOREIGN KEY (`cliente_id`) REFERENCES `clientes` (`id_cliente`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`grupo_id`) REFERENCES `grupo_usuarios` (`id_grupo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `users_ibfk_2` FOREIGN KEY (`fuente_id`) REFERENCES `fuentes` (`id_fuente`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `users_ibfk_3` FOREIGN KEY (`titulo_id`) REFERENCES `titulos` (`id_titulo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `users_ibfk_4` FOREIGN KEY (`tema_id`) REFERENCES `temas` (`id_tema`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
