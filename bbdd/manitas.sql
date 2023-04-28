-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 28-04-2023 a las 08:17:08
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
(4, 'Aitor', 'Menta', '444444444', 'amenta@manitas.es', 123456789, 'Torrent de les flors', 10, '', '3', '4ª', 8070, 'Barcelona', '2023-04-10 17:00:23', '2023-04-25 09:12:52'),
(5, 'Esther', 'Colero', '', '', 0, '', 0, '', '', '', 0, 'Barcelona', '2023-04-10 17:02:22', '2023-04-11 10:32:56'),
(6, 'Johny', 'Mentero', '', '', 3, '', 0, '', '', '', 0, 'Barcelona', '2023-04-10 17:12:59', '2023-04-11 10:33:08'),
(7, 'Cristina', 'Sanz', '', '', 670359848, 'Torrent de les flors', 29, '', 'Entlo', '2ª', 0, 'Barcelona', '2023-04-17 09:37:14', '2023-04-17 09:37:59'),
(8, 'Armando', 'Jaleo', '98765678', 'ajaleo@manitas.es', 987654321, 'Pendiente', 8, '', 'bajos', '', 0, 'Barcelona', '2023-04-18 10:23:20', '2023-04-18 10:24:08'),
(9, 'Felipe', 'Epilef', '157456359', 'felipe@manitas.es', 321597456, 'Miranda', 2, '', '5', '', 8054, 'Barcelona', '2023-04-21 05:20:35', '2023-04-21 05:20:35'),
(10, 'Sandra', 'Lopez', '', '', 321569785, '', 0, '', '', '', 0, '', '2023-04-21 05:37:00', '2023-04-21 05:37:00'),
(11, 'Santiago', 'Segura', '', '', 555444111, '', 0, '', '', '', 0, '', '2023-04-21 05:38:58', '2023-04-21 05:38:58'),
(12, 'Carmen ', 'Avila Blosca', '', '', 648, 'Travessera de dalt', 83, '', '3ª', '2ª', 0, '', '2023-04-21 13:48:17', '2023-04-21 13:48:17'),
(13, 'Teresa', 'García Fuster', '', 'tgfuste12@gmail.com', 639, 'Avenida Riera de cassoles ', 50, '', '2n', '2ª', 8012, 'Barcelona', '2023-04-21 14:30:34', '2023-04-21 14:30:34'),
(14, 'Enrique', 'Villareal', '', '', 658215479, 'Libertad', 10, '', '', '', 0, 'Barcelona', '2023-04-25 10:38:50', '2023-04-25 10:38:50');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `colaboradores`
--

CREATE TABLE `colaboradores` (
  `id_colaborador` int(11) NOT NULL,
  `colaborador` varchar(40) DEFAULT NULL,
  `telefono_colaborador` varchar(11) CHARACTER SET utf8mb4 NOT NULL,
  `servicio_id` int(11) NOT NULL,
  `descripcion_colaborador` varchar(255) CHARACTER SET utf8mb4 DEFAULT NULL,
  `date_add` timestamp NOT NULL DEFAULT current_timestamp(),
  `date_upd` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `colaboradores`
--

INSERT INTO `colaboradores` (`id_colaborador`, `colaborador`, `telefono_colaborador`, `servicio_id`, `descripcion_colaborador`, `date_add`, `date_upd`) VALUES
(1, 'Externo', '654789123', 0, '', '2022-03-17 06:17:11', '2023-04-26 11:03:37'),
(2, 'Interno', '456789321', 0, '', '2022-04-28 22:07:21', '2023-04-26 11:03:48'),
(3, 'Andres Segovia', '6541213369', 0, '', '2023-04-26 11:07:45', '2023-04-26 11:07:45'),
(4, 'Ernesto Sevilla', '6541213369', 0, '', '2023-04-26 11:08:20', '2023-04-26 11:08:52'),
(5, 'Carpintero', '123456789', 6, '', '2023-04-26 11:09:49', '2023-04-26 11:09:49'),
(6, 'Electricista', '444555666', 2, '', '2023-04-26 11:10:07', '2023-04-26 11:10:07'),
(7, 'Fontanero', '777888999', 4, '', '2023-04-26 11:10:28', '2023-04-26 11:10:28'),
(8, 'Paleta', '123456665', 3, '', '2023-04-26 11:10:59', '2023-04-26 11:10:59'),
(9, 'Calefaccion', '444888222', 5, '', '2023-04-26 11:12:00', '2023-04-26 11:12:12');

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
(1, 'Registrado', 'El tiquet se ha registrado en el sistema', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'Asignado', 'El tiquet ha sido asignado a un colaborador', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'En proceso', 'Se están realizando las actuaciones necesarias', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 'En espera', 'La actuación se ha detenido a falta de alguna actuación por parte del cliente. Obligatorio especificar el motivo.', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 'Pendiente', 'El tiquet se encuentra a la espera de información i/o actuación interna. Es obligatorio especificar el motivo.', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 'Resuelto', 'Las actuaciones han finalizado', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

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
-- Estructura de tabla para la tabla `servicios`
--

CREATE TABLE `servicios` (
  `id_servicio` int(11) NOT NULL,
  `servicio` varchar(40) DEFAULT NULL,
  `icono` varchar(255) CHARACTER SET utf8mb4 DEFAULT '<i class="fas fa-question"></i>',
  `descripcion_servicio` varchar(255) CHARACTER SET utf8mb4 DEFAULT NULL,
  `date_add` timestamp NOT NULL DEFAULT current_timestamp(),
  `date_upd` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `servicios`
--

INSERT INTO `servicios` (`id_servicio`, `servicio`, `icono`, `descripcion_servicio`, `date_add`, `date_upd`) VALUES
(1, 'Sin determinar', '<i class=\"fas fa-question\"></i>', 'Pendiente definir el servicio', '2023-04-20 10:50:23', '2023-04-20 10:50:23'),
(2, 'Electricidad', '<i class=\"fas fa-bolt\"></i>', 'Instalaciones Elecetricas.\r\nSustitución de mecanismos.\r\nActualización de cuadros.', '2022-03-16 16:05:04', '2023-04-24 09:38:07'),
(3, 'Albañileria', '<i class=\"fas fa-hard-hat\"></i> ', 'Construcción y reformas en general.', '2022-03-19 07:19:40', '2023-04-24 10:59:40'),
(4, 'Fontanería', '<i class=\"fas fa-faucet\"></i>', 'Fugas de agua.\r\nSustitución de grifos.\r\nArreglos de WC', '2022-04-06 17:33:25', '2023-04-24 09:38:48'),
(5, 'Calefacción', '<i class=\"fab fa-hotjar\"></i>', 'Mantenimiento de sistemas de calefacción (purgar circuito y revisión de válvulas)\r\nInstalación y reparación de sistemas de calefacción.', '2022-04-28 21:38:24', '2023-04-24 09:40:49'),
(6, 'Carpintería', '<i class=\"fas fa-hammer\"></i>', 'Arreglo de armarios.\r\nCocinas.\r\nMontaje de muebles.\r\nPuertas.', '2022-07-17 20:59:43', '2023-04-24 09:43:56');

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
  `servicio_id` int(11) DEFAULT 1,
  `actuacion` varchar(255) NOT NULL,
  `estado_id` int(11) NOT NULL DEFAULT 1,
  `colaborador_id` int(11) DEFAULT NULL,
  `date_add` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tiquets`
--

INSERT INTO `tiquets` (`id_tiquet`, `cliente_id`, `servicio_id`, `actuacion`, `estado_id`, `colaborador_id`, `date_add`) VALUES
(1, 6, 6, 'cambiar ventanas', 2, 1, '2023-04-20 20:36:22'),
(2, 1, 4, 'El baño pierde agua.', 2, 2, '2023-04-20 20:43:15'),
(3, 10, 4, 'Tiene una fuga', 1, NULL, '2023-04-21 05:37:00'),
(4, 11, 1, 'No tiene pelo', 1, NULL, '2023-04-21 05:38:58'),
(5, 9, 3, 'Quiero hacer un escondite secreto para guardar mi fortuna.', 3, NULL, '2023-04-21 05:49:15'),
(6, 12, 4, 'Desague Ducha. Hay que mirar la pèrduda en la tuberia de agua.', 2, 7, '2023-04-21 13:49:37'),
(7, 13, 1, 'Nuevo piso y hay que colocar 2 marcos de puertas, manillas, paños (5) y algunos marcos nuevos de puerta.\r\nEllas tienen pensado lo que quieren colocar, preguntar primero.\r\nTeresa està disponible al mediodia o a partir de las 18:00h.', 1, NULL, '2023-04-21 14:34:50'),
(8, 4, 1, '', 1, NULL, '2023-04-25 09:14:17'),
(9, 7, 1, '', 1, NULL, '2023-04-25 09:14:56'),
(10, 14, 1, 'El calentador no funciona', 1, NULL, '2023-04-25 10:38:51');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tiquet_1`
--

CREATE TABLE `tiquet_1` (
  `fecha` timestamp NOT NULL DEFAULT current_timestamp(),
  `estado_id` int(11) DEFAULT 1,
  `colaborador_id` int(11) DEFAULT 1,
  `comentario` varchar(255) NOT NULL DEFAULT 'Apertura de tiquet'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tiquet_1`
--

INSERT INTO `tiquet_1` (`fecha`, `estado_id`, `colaborador_id`, `comentario`) VALUES
('2023-04-20 20:36:22', 1, 1, 'Apertura de tiquet'),
('2023-04-21 06:26:47', 2, 1, 'Asignado a carpinteria de aluminio'),
('2023-04-25 10:12:53', 2, 1, 'Asignado a  la flauta de bartolo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tiquet_2`
--

CREATE TABLE `tiquet_2` (
  `fecha` timestamp NOT NULL DEFAULT current_timestamp(),
  `estado_id` int(11) DEFAULT 1,
  `colaborador_id` int(11) DEFAULT 1,
  `comentario` varchar(255) NOT NULL DEFAULT 'Apertura de tiquet'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tiquet_2`
--

INSERT INTO `tiquet_2` (`fecha`, `estado_id`, `colaborador_id`, `comentario`) VALUES
('2023-04-20 20:43:15', 1, 1, 'Apertura de tiquet'),
('2023-04-21 06:26:26', 2, 2, 'Asignado a Edu');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tiquet_3`
--

CREATE TABLE `tiquet_3` (
  `fecha` timestamp NOT NULL DEFAULT current_timestamp(),
  `estado_id` int(11) DEFAULT 1,
  `colaborador_id` int(11) DEFAULT 1,
  `comentario` varchar(255) NOT NULL DEFAULT 'Apertura de tiquet'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tiquet_3`
--

INSERT INTO `tiquet_3` (`fecha`, `estado_id`, `colaborador_id`, `comentario`) VALUES
('2023-04-21 05:37:00', 1, 1, 'Apertura de tiquet');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tiquet_4`
--

CREATE TABLE `tiquet_4` (
  `fecha` timestamp NOT NULL DEFAULT current_timestamp(),
  `estado_id` int(11) DEFAULT 1,
  `colaborador_id` int(11) DEFAULT 1,
  `comentario` varchar(255) NOT NULL DEFAULT 'Apertura de tiquet'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tiquet_4`
--

INSERT INTO `tiquet_4` (`fecha`, `estado_id`, `colaborador_id`, `comentario`) VALUES
('2023-04-21 05:38:58', 1, 1, 'Apertura de tiquet');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tiquet_5`
--

CREATE TABLE `tiquet_5` (
  `fecha` timestamp NOT NULL DEFAULT current_timestamp(),
  `estado_id` int(11) DEFAULT 1,
  `colaborador_id` int(11) DEFAULT 1,
  `comentario` varchar(255) NOT NULL DEFAULT 'Apertura de tiquet'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tiquet_5`
--

INSERT INTO `tiquet_5` (`fecha`, `estado_id`, `colaborador_id`, `comentario`) VALUES
('2023-04-21 05:49:15', 1, 1, 'Apertura de tiquet');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tiquet_6`
--

CREATE TABLE `tiquet_6` (
  `fecha` timestamp NOT NULL DEFAULT current_timestamp(),
  `estado_id` int(11) DEFAULT 1,
  `colaborador_id` int(11) DEFAULT 1,
  `comentario` varchar(255) NOT NULL DEFAULT 'Apertura de tiquet'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tiquet_6`
--

INSERT INTO `tiquet_6` (`fecha`, `estado_id`, `colaborador_id`, `comentario`) VALUES
('2023-04-21 13:49:38', 1, 1, 'Apertura de tiquet'),
('2023-04-27 18:39:43', 2, 7, 'Asignado a Fontanero');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tiquet_7`
--

CREATE TABLE `tiquet_7` (
  `fecha` timestamp NOT NULL DEFAULT current_timestamp(),
  `estado_id` int(11) DEFAULT 1,
  `colaborador_id` int(11) DEFAULT 1,
  `comentario` varchar(255) NOT NULL DEFAULT 'Apertura de tiquet'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tiquet_7`
--

INSERT INTO `tiquet_7` (`fecha`, `estado_id`, `colaborador_id`, `comentario`) VALUES
('2023-04-21 14:34:51', 1, 1, 'Apertura de tiquet');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tiquet_8`
--

CREATE TABLE `tiquet_8` (
  `fecha` timestamp NOT NULL DEFAULT current_timestamp(),
  `estado_id` int(11) DEFAULT 1,
  `colaborador_id` int(11) DEFAULT 1,
  `comentario` varchar(255) NOT NULL DEFAULT 'Apertura de tiquet'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tiquet_8`
--

INSERT INTO `tiquet_8` (`fecha`, `estado_id`, `colaborador_id`, `comentario`) VALUES
('2023-04-25 09:14:18', 1, 1, 'Apertura de tiquet');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tiquet_9`
--

CREATE TABLE `tiquet_9` (
  `fecha` timestamp NOT NULL DEFAULT current_timestamp(),
  `estado_id` int(11) DEFAULT 1,
  `colaborador_id` int(11) DEFAULT 1,
  `comentario` varchar(255) NOT NULL DEFAULT 'Apertura de tiquet'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tiquet_9`
--

INSERT INTO `tiquet_9` (`fecha`, `estado_id`, `colaborador_id`, `comentario`) VALUES
('2023-04-25 09:14:56', 1, 1, 'Apertura de tiquet');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tiquet_10`
--

CREATE TABLE `tiquet_10` (
  `fecha` timestamp NOT NULL DEFAULT current_timestamp(),
  `estado_id` int(11) DEFAULT 1,
  `colaborador_id` int(11) DEFAULT 1,
  `comentario` varchar(255) NOT NULL DEFAULT 'Apertura de tiquet'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tiquet_10`
--

INSERT INTO `tiquet_10` (`fecha`, `estado_id`, `colaborador_id`, `comentario`) VALUES
('2023-04-25 10:38:51', 1, 1, 'Apertura de tiquet');

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
  `telefono` varchar(11) CHARACTER SET utf8mb4 DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `grupo_id` int(11) NOT NULL DEFAULT 1,
  `servicio_id` int(11) DEFAULT 1,
  `tema_id` int(11) DEFAULT 50,
  `fuente_id` int(11) DEFAULT 21,
  `titulo_id` int(11) DEFAULT 7,
  `date_add` timestamp NOT NULL DEFAULT current_timestamp(),
  `date_upd` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id_user`, `username`, `nombre`, `apellidos`, `email`, `telefono`, `password`, `grupo_id`, `servicio_id`, `tema_id`, `fuente_id`, `titulo_id`, `date_add`, `date_upd`) VALUES
(1, 'admin', 'Diego', 'Perea', 'admin@ccsm.es', '', '$2y$10$8oktY8Sb0N3hf2FmQkP6G.FrTd6axSR26oBP5uq0Osjaa98yGCUji', 1, 1, 33, 16, 15, '2022-03-04 23:22:50', '2023-04-28 06:04:09'),
(2, 'diesgo', '', '', 'diesgo@gmail.com', '', '$2y$10$nMyWQPkygkN6mq0J3s8e0OYsCQYwwURnOy5iAZWnU/KdFz4Cnj9DW', 1, 1, 49, 25, 11, '2022-03-05 07:37:48', '2023-04-28 06:04:19'),
(8, 'ddbold', '', '', 'ddbold@ccsm.es', '', '$2y$10$7yqCQhKvEuY7KvuUkZww8.yRjV03NviycCpkno7zSYQAZap5EIRee', 2, NULL, 5, 21, 5, '2022-05-09 10:52:01', '2022-07-16 00:07:01'),
(9, 'rafa', '', '', 'rafa@ccsm.es', '', '$2y$10$txknwHhEWqKCS2til953kOCK7QblIl7y4H9jPGbUX3FM7h7NBVoam', 3, NULL, 15, 20, 20, '2022-06-05 17:29:41', '2022-07-03 12:29:50'),
(10, 'invitado', 'John', 'Doe', 'invitado@ccsm.es', '', '$2y$10$UHBfTuw3eFydyJF/8104/uq..dj.27xnpZgt8Dg3uua60EW5ePc/u', 4, NULL, 51, 15, 4, '2022-06-18 05:33:29', '2022-09-01 19:54:41'),
(11, 'guess', '', '', 'guess@ccsm.es', '', '$2y$10$hSaTNUKusoCn7efe7ChHje5hdBsQfyHHZYD5.SaQuvfJiHMyEaaky', 4, NULL, 11, 3, 16, '2022-10-11 00:08:12', '2023-04-27 18:30:27'),
(12, 'fontanero', '', '', 'fontanero@manitas.es', '', '$2y$10$jmfqbS5jwnb07FLDFsOT8eopr4awfmV2A6Z6hakiJ7KF1JG2siyl.', 2, 4, 50, 21, 7, '2023-04-27 14:57:04', '2023-04-28 06:03:26'),
(13, 'carpintero', '', '', 'carpintero@manitas.es', '', '$2y$10$6nhOIFeRnYSASwIHroo7Y.MHfZORAe1bdsDuiAi7gNU2DqugNFbVy', 2, 6, 50, 21, 7, '2023-04-27 15:05:45', '2023-04-28 06:03:06'),
(16, 'paleta', NULL, NULL, 'paleta@manitas.es', '', '$2y$10$sAyq6WQMXYMof0hnZ86e8O5QiP5TbczxLBsZnpojZicLD.49F3BIO', 2, 3, 50, 21, 7, '2023-04-27 17:43:16', '2023-04-28 06:03:48'),
(17, 'calefaccion', NULL, NULL, 'calefaccion@manitas.es', '658987412', '$2y$10$NSqulYED3nL/fcLvDRpuQOOg4fYwPw6/zrctHC99DPOXPN4DBJBvG', 2, 5, 50, 21, 7, '2023-04-27 22:51:04', '2023-04-27 22:51:04');

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
  ADD PRIMARY KEY (`id_colaborador`),
  ADD KEY `servicio_id` (`servicio_id`);

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
  ADD KEY `cliente_id` (`cliente_id`),
  ADD KEY `servicio_id` (`servicio_id`);

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
  ADD KEY `titulo_id` (`titulo_id`),
  ADD KEY `servicio_id` (`servicio_id`);

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
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `colaboradores`
--
ALTER TABLE `colaboradores`
  MODIFY `id_colaborador` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

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
  MODIFY `id_servicio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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
  MODIFY `id_tiquet` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `titulos`
--
ALTER TABLE `titulos`
  MODIFY `id_titulo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

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
  ADD CONSTRAINT `tiquets_ibfk_5` FOREIGN KEY (`cliente_id`) REFERENCES `clientes` (`id_cliente`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tiquets_ibfk_6` FOREIGN KEY (`servicio_id`) REFERENCES `servicios` (`id_servicio`) ON DELETE CASCADE ON UPDATE CASCADE;

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
