-- phpMyAdmin SQL Dump
-- version 4.6.2
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 28-11-2016 a las 23:39:30
-- Versión del servidor: 5.7.15
-- Versión de PHP: 5.6.22-0+deb8u1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `app_ares`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `almacen`
--

DROP TABLE IF EXISTS `almacen`;
CREATE TABLE `almacen` (
  `id` int(11) NOT NULL,
  `idtipoalmacen` int(11) NOT NULL,
  `nombre` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `almacen`
--

INSERT INTO `almacen` (`id`, `idtipoalmacen`, `nombre`) VALUES
(1, 1, 'Depósito'),
(2, 2, 'Tienda');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

DROP TABLE IF EXISTS `categorias`;
CREATE TABLE `categorias` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `imagen` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `nombre`, `imagen`) VALUES
(1, 'QUESOS', '/img/categorias/quesos.jpg'),
(3, 'Categoria 2', '/img/productos/default.png'),
(4, 'BOLOGNAS', '/img/productos/default.png'),
(5, 'CHISTORRAS', '/img/productos/default.png'),
(6, 'CHORIZOS', '/img/productos/default.png'),
(7, 'JAMONES', '/img/productos/default.png'),
(8, 'LOMOS', '/img/productos/default.png'),
(9, 'MANTEQUILLAS', '/img/productos/default.png'),
(10, 'MORTADELAS', '/img/productos/default.png'),
(11, 'PASTAS DE HIGADO', '/img/productos/default.png'),
(12, 'PECHUGAS DE PAVO', '/img/productos/default.png'),
(13, 'PECHUGAS DE POLLO', '/img/productos/default.png'),
(14, 'RICOTTAS', '/img/productos/default.png'),
(15, 'SALCHICHAS', '/img/productos/default.png'),
(16, 'TOCINETAS', '/img/productos/default.png'),
(17, 'OTROS', '/img/productos/default.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `disponibilidad_x_almacen`
--

DROP TABLE IF EXISTS `disponibilidad_x_almacen`;
CREATE TABLE `disponibilidad_x_almacen` (
  `id` int(11) NOT NULL,
  `producto` int(11) NOT NULL,
  `almacen` int(11) NOT NULL,
  `cantidad` float NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `disponibilidad_x_almacen`
--

INSERT INTO `disponibilidad_x_almacen` (`id`, `producto`, `almacen`, `cantidad`) VALUES
(1, 28, 1, 165),
(3, 50, 1, 5),
(4, 28, 2, 29),
(5, 6, 1, 111),
(7, 50, 2, 0.5),
(8, 6, 2, 16),
(9, 783, 1, 100),
(10, 239, 1, 150),
(11, 1549, 1, 160),
(12, 69, 1, 100),
(13, 66, 1, 100),
(14, 413, 1, 100),
(15, 383, 1, 100),
(16, 343, 1, 100),
(17, 152, 1, 100),
(18, 134, 1, 100),
(19, 3, 1, 100),
(20, 1, 1, 100),
(21, 1553, 1, 190),
(22, 789, 1, 100),
(23, 786, 1, 100),
(24, 65, 1, 100),
(25, 1549, 2, 88),
(26, 1552, 1, 90),
(27, 1551, 1, 90),
(28, 1550, 1, 90),
(29, 1548, 1, 90),
(30, 1547, 1, 90),
(31, 5, 1, 90),
(32, 4, 1, 90),
(33, 4, 2, 0),
(34, 5, 2, -10),
(35, 1547, 2, 30),
(36, 1548, 2, 30),
(37, 1550, 2, 10),
(38, 1551, 2, 10),
(39, 1552, 2, 10),
(40, 1553, 2, 10),
(41, 1, 2, -0.056),
(42, 3, 2, -5.5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `disponiblidad_productos`
--

DROP TABLE IF EXISTS `disponiblidad_productos`;
CREATE TABLE `disponiblidad_productos` (
  `id` int(11) NOT NULL,
  `idproducto` int(11) NOT NULL,
  `disponible` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `disponiblidad_productos`
--

INSERT INTO `disponiblidad_productos` (`id`, `idproducto`, `disponible`) VALUES
(1, 6, 1),
(2, 4, 0),
(3, 5, 0),
(4, 1, 0),
(5, 3, 0),
(6, 28, 1),
(7, 29, 1),
(8, 50, 1),
(9, 1549, 1),
(10, 1547, 1),
(11, 1548, 1),
(12, 1550, 1),
(13, 1551, 1),
(14, 1552, 1),
(15, 1553, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estatus_pedido`
--

DROP TABLE IF EXISTS `estatus_pedido`;
CREATE TABLE `estatus_pedido` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `msgclientes` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `msgventas` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `msgdespacho` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `estatus_pedido`
--

INSERT INTO `estatus_pedido` (`id`, `nombre`, `msgclientes`, `msgventas`, `msgdespacho`) VALUES
(1, 'ventas', 'Tomando el Pedido', 'Tomando el Pedido', 'Realizando Pedido'),
(2, 'enviado', 'En Cola', 'Enviado', 'Pendiente'),
(3, 'despacho', 'Atendiendo', 'En Despacho', 'Atendiendo'),
(4, 'finalizado', 'Entregado', 'Finalizado', 'Entregado'),
(5, 'cancelado', 'Cancelado', 'Cancelado', 'Cancelado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ingreso_almacen`
--

DROP TABLE IF EXISTS `ingreso_almacen`;
CREATE TABLE `ingreso_almacen` (
  `id` int(11) NOT NULL,
  `idproducto` int(11) NOT NULL,
  `idalmacen` int(11) NOT NULL,
  `cantidad` float NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `ingreso_almacen`
--

INSERT INTO `ingreso_almacen` (`id`, `idproducto`, `idalmacen`, `cantidad`, `fecha`) VALUES
(1, 28, 1, 15, '2016-10-05'),
(8, 28, 1, 20, '2016-10-06'),
(12, 28, 1, 25, '2016-10-06'),
(14, 28, 1, 10, '2016-10-06'),
(16, 50, 1, 7, '2016-10-06'),
(18, 6, 1, 36, '2016-10-08'),
(19, 783, 1, 100, '2016-11-27'),
(20, 239, 1, 100, '2016-11-27'),
(21, 1549, 1, 100, '2016-11-27'),
(22, 239, 1, 50, '2016-11-27'),
(23, 69, 1, 100, '2016-11-27'),
(24, 66, 1, 100, '2016-11-27'),
(25, 28, 1, 100, '2016-11-27'),
(26, 413, 1, 100, '2016-11-27'),
(27, 383, 1, 100, '2016-11-27'),
(28, 343, 1, 100, '2016-11-27'),
(29, 152, 1, 100, '2016-11-27'),
(30, 134, 1, 100, '2016-11-27'),
(31, 3, 1, 100, '2016-11-27'),
(32, 1, 1, 100, '2016-11-27'),
(33, 6, 1, 100, '2016-11-27'),
(34, 1553, 1, 100, '2016-11-27'),
(35, 789, 1, 100, '2016-11-27'),
(36, 786, 1, 100, '2016-11-27'),
(37, 65, 1, 100, '2016-11-27'),
(38, 1553, 1, 100, '2016-11-28'),
(39, 1552, 1, 100, '2016-11-28'),
(40, 1551, 1, 100, '2016-11-28'),
(41, 1550, 1, 100, '2016-11-28'),
(42, 1548, 1, 100, '2016-11-28'),
(43, 1547, 1, 100, '2016-11-28'),
(44, 1549, 1, 100, '2016-11-28'),
(45, 5, 1, 100, '2016-11-28'),
(46, 4, 1, 100, '2016-11-28');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marca`
--

DROP TABLE IF EXISTS `marca`;
CREATE TABLE `marca` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `imagen` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `marca`
--

INSERT INTO `marca` (`id`, `nombre`, `imagen`) VALUES
(1, 'PLUMROSE', 'img/marcas/plumrose.png'),
(2, 'OSCAR MAYER', 'img/marcas/oscar-mayer.png'),
(3, 'SERVIPORK', 'img/marcas/serivipork.png'),
(4, 'TACHIRA', 'img/marcas/tachira.png'),
(5, 'BELILLA', 'img/marcas/belilla.png'),
(6, 'HERMO', 'img/marcas/hermo.png'),
(7, 'SIN MARCA', ''),
(8, 'MONTSERRATINA', '/img/marca/motserratina.png'),
(9, 'ALPINO', ''),
(10, 'DEL CORRAL', ''),
(11, 'VIGOR', ''),
(12, 'ARICHUNA', ''),
(13, 'ALIMEX', ''),
(14, 'AMERICA', ''),
(15, 'FIESTA', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `merma_x_almacen`
--

DROP TABLE IF EXISTS `merma_x_almacen`;
CREATE TABLE `merma_x_almacen` (
  `id` int(11) NOT NULL,
  `idalmacen` int(11) NOT NULL,
  `idproducto` int(11) NOT NULL,
  `cantidad` float NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `movimiento_almacen`
--

DROP TABLE IF EXISTS `movimiento_almacen`;
CREATE TABLE `movimiento_almacen` (
  `id` int(11) NOT NULL,
  `idalmacenmayor` int(11) NOT NULL,
  `idalmacendetal` int(11) NOT NULL,
  `idproducto` int(11) NOT NULL,
  `cantidad` float NOT NULL,
  `fecha` date NOT NULL,
  `idusuario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `movimiento_almacen`
--

INSERT INTO `movimiento_almacen` (`id`, `idalmacenmayor`, `idalmacendetal`, `idproducto`, `cantidad`, `fecha`, `idusuario`) VALUES
(12, 1, 2, 28, 15, '2016-10-08', 1),
(14, 1, 2, 50, 2, '2016-10-08', 1),
(15, 1, 2, 6, 10, '2016-10-08', 1),
(16, 1, 2, 6, 15, '2016-10-08', 1),
(18, 1, 2, 1549, 10, '2016-11-28', 3),
(19, 1, 2, 4, 10, '2016-11-28', 3),
(20, 1, 2, 5, 10, '2016-11-28', 3),
(21, 1, 2, 1547, 10, '2016-11-28', 3),
(22, 1, 2, 1548, 10, '2016-11-28', 3),
(23, 1, 2, 1550, 10, '2016-11-28', 3),
(24, 1, 2, 1551, 10, '2016-11-28', 3),
(25, 1, 2, 1552, 10, '2016-11-28', 3),
(26, 1, 2, 1553, 10, '2016-11-28', 3),
(27, 1, 2, 1549, 10, '2016-11-28', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

DROP TABLE IF EXISTS `pedidos`;
CREATE TABLE `pedidos` (
  `id` int(11) NOT NULL,
  `codigo` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `vendedor` int(11) DEFAULT NULL,
  `preciototal` int(11) NOT NULL,
  `cliente` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `estatus` int(11) NOT NULL,
  `despachador` int(11) DEFAULT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `idalmacen` int(11) NOT NULL DEFAULT '2'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `pedidos`
--

INSERT INTO `pedidos` (`id`, `codigo`, `vendedor`, `preciototal`, `cliente`, `estatus`, `despachador`, `fecha`, `hora`, `idalmacen`) VALUES
(1, '20160922-0001', 1, 31375, 'Carolina Bravo Castillo', 4, 2, '2016-09-22', '15:30:00', 2),
(8, '20160926-0005', 0, 10000, 'Otro Fulanito de Tal Mas', 4, 4, '2016-09-26', '09:29:12', 2),
(10, '20160926-0007', 0, 6375, 'Fulanito de Tal', 4, 2, '2016-09-26', '09:30:39', 2),
(11, '20161012-0001', 3, 3500, 'Bexandy Rodriguez', 4, 2, '2016-10-12', '16:08:21', 2),
(12, '20161021-0001', 3, 52000, 'Odaly Fernández', 5, 4, '2016-10-21', '16:26:20', 2),
(13, '20161021-0002', 3, 21700, 'Maria Lugo', 4, 2, '2016-10-21', '16:29:23', 2),
(15, '20160922-0001', 1, 31375, 'Carolina Bravo Castillo', 4, 2, '2016-09-22', '15:30:00', 2),
(16, '20160926-0005', 0, 10000, 'Otro Fulanito de Tal Mas', 4, 4, '2016-09-26', '09:29:12', 2),
(17, '20160926-0007', 0, 6375, 'Fulanito de Tal', 4, 2, '2016-09-26', '09:30:39', 2),
(18, '20161012-0001', 3, 3500, 'Bexandy Rodriguez', 4, 2, '2016-10-12', '16:08:21', 2),
(19, '20161021-0001', 3, 52000, 'Odaly Fernández', 5, 4, '2016-10-21', '16:26:20', 2),
(20, '20161021-0002', 3, 0, 'Maria Lugo', 4, 5, '2016-10-21', '16:29:23', 2),
(21, '20161101-0001', 3, 0, 'Andres Garcia', 4, 5, '2016-11-01', '16:53:12', 2),
(22, '20160922-0001', 1, 31375, 'Carolina Bravo Castillo', 4, 2, '2016-09-01', '15:30:00', 2),
(23, '20160926-0005', 0, 10000, 'Otro Fulanito de Tal Mas', 4, 4, '2016-09-01', '09:29:12', 2),
(24, '20160926-0007', 0, 6375, 'Fulanito de Tal', 4, 2, '2016-09-01', '09:30:39', 2),
(25, '20161012-0001', 3, 3500, 'Bexandy Rodriguez', 4, 2, '2016-09-01', '16:08:21', 2),
(26, '20161021-0001', 3, 52000, 'Odaly Fernández', 4, 4, '2016-09-01', '16:26:20', 2),
(27, '20161021-0002', 3, 0, 'Maria Lugo', 4, 5, '2016-09-01', '16:29:23', 2),
(28, '20161101-0001', 3, 0, NULL, 4, 5, '2016-09-01', '16:53:12', 2),
(29, '20160922-0001', 1, 31375, 'Carolina Bravo Castillo', 4, 2, '2016-09-22', '15:30:00', 2),
(30, '20160926-0005', 0, 10000, 'Otro Fulanito de Tal Mas', 4, 4, '2016-09-26', '09:29:12', 2),
(31, '20160926-0007', 0, 6375, 'Fulanito de Tal', 4, 2, '2016-09-26', '09:30:39', 2),
(32, '20161012-0001', 3, 3500, 'Bexandy Rodriguez', 4, 2, '2016-10-12', '16:08:21', 2),
(33, '20161021-0001', 3, 52000, 'Odaly Fernández', 5, 4, '2016-10-21', '16:26:20', 2),
(34, '20161021-0002', 3, 0, 'Maria Lugo', 4, 5, '2016-10-21', '16:29:23', 2),
(35, '20161101-0001', 3, 0, 'Andres Garcia', 4, 5, '2016-11-01', '16:53:12', 2),
(36, '20160922-0001', 1, 31375, 'Carolina Bravo Castillo', 4, 2, '2016-09-01', '15:30:00', 2),
(37, '20160926-0005', 0, 10000, 'Otro Fulanito de Tal Mas', 4, 4, '2016-09-01', '09:29:12', 2),
(38, '20160926-0007', 0, 6375, 'Fulanito de Tal', 4, 2, '2016-09-01', '09:30:39', 2),
(39, '20161012-0001', 3, 3500, 'Bexandy Rodriguez', 4, 2, '2016-09-01', '16:08:21', 2),
(40, '20161021-0001', 3, 52000, 'Odaly Fernández', 4, 4, '2016-09-01', '16:26:20', 2),
(41, '20161021-0002', 3, 0, 'Maria Lugo', 4, 5, '2016-09-01', '16:29:23', 2),
(42, '20161101-0001', 3, 0, NULL, 4, 5, '2016-09-01', '16:53:12', 2),
(43, '20160922-0001', 1, 31375, 'Carolina Bravo Castillo', 4, 2, '2016-09-22', '15:30:00', 2),
(44, '20160926-0005', 0, 10000, 'Otro Fulanito de Tal Mas', 4, 4, '2016-09-26', '09:29:12', 2),
(45, '20160926-0007', 0, 6375, 'Fulanito de Tal', 4, 2, '2016-09-26', '09:30:39', 2),
(46, '20161012-0001', 3, 3500, 'Bexandy Rodriguez', 4, 2, '2016-10-12', '16:08:21', 2),
(47, '20161021-0001', 3, 52000, 'Odaly Fernández', 5, 4, '2016-10-21', '16:26:20', 2),
(48, '20161021-0002', 3, 0, 'Maria Lugo', 4, 5, '2016-10-21', '16:29:23', 2),
(49, '20161101-0001', 3, 0, 'Andres Garcia', 4, 5, '2016-11-01', '16:53:12', 2),
(50, '20160922-0001', 1, 31375, 'Carolina Bravo Castillo', 4, 2, '2016-09-01', '15:30:00', 2),
(51, '20160926-0005', 0, 10000, 'Otro Fulanito de Tal Mas', 4, 4, '2016-09-01', '09:29:12', 2),
(52, '20160926-0007', 0, 6375, 'Fulanito de Tal', 4, 2, '2016-09-01', '09:30:39', 2),
(53, '20161012-0001', 3, 3500, 'Bexandy Rodriguez', 4, 2, '2016-09-01', '16:08:21', 2),
(54, '20161021-0001', 3, 52000, 'Odaly Fernández', 4, 4, '2016-09-01', '16:26:20', 2),
(55, '20161021-0002', 3, 0, 'Maria Lugo', 4, 5, '2016-09-01', '16:29:23', 2),
(56, '20161101-0001', 3, 0, NULL, 4, 5, '2016-09-01', '16:53:12', 2),
(57, '20160922-0001', 1, 31375, 'Carolina Bravo Castillo', 4, 2, '2016-09-22', '15:30:00', 2),
(58, '20160922-0001', 1, 31375, 'Carolina Bravo Castillo', 4, 2, '2016-09-22', '15:30:00', 2),
(59, '20160922-0001', 1, 31375, 'Carolina Bravo Castillo', 4, 2, '2016-09-22', '15:30:00', 2),
(60, '20160926-0005', 0, 10000, 'Otro Fulanito de Tal Mas', 4, 4, '2016-09-26', '09:29:12', 2),
(61, '20160926-0007', 0, 6375, 'Fulanito de Tal', 4, 2, '2016-09-26', '09:30:39', 2),
(62, '20161012-0001', 3, 3500, 'Bexandy Rodriguez', 4, 2, '2016-10-12', '16:08:21', 2),
(63, '20161021-0001', 3, 52000, 'Odaly Fernández', 5, 4, '2016-10-21', '16:26:20', 2),
(64, '20161021-0002', 3, 0, 'Maria Lugo', 4, 5, '2016-10-21', '16:29:23', 2),
(65, '20161101-0001', 3, 0, 'Andres Garcia', 4, 5, '2016-11-01', '16:53:12', 2),
(66, '20160922-0001', 1, 31375, 'Carolina Bravo Castillo', 4, 2, '2016-09-01', '15:30:00', 2),
(67, '20160926-0005', 0, 10000, 'Otro Fulanito de Tal Mas', 4, 4, '2016-09-01', '09:29:12', 2),
(68, '20160926-0007', 0, 6375, 'Fulanito de Tal', 4, 2, '2016-09-01', '09:30:39', 2),
(69, '20161012-0001', 3, 3500, 'Bexandy Rodriguez', 4, 2, '2016-09-01', '16:08:21', 2),
(70, '20161021-0001', 3, 52000, 'Odaly Fernández', 4, 4, '2016-09-01', '16:26:20', 2),
(71, '20161021-0002', 3, 0, 'Maria Lugo', 4, 5, '2016-09-01', '16:29:23', 2),
(72, '20161101-0001', 3, 0, NULL, 4, 5, '2016-09-01', '16:53:12', 2),
(73, '20160922-0001', 1, 31375, 'Carolina Bravo Castillo', 4, 2, '2016-09-05', '15:30:00', 2),
(74, '20160926-0005', 0, 10000, 'Otro Fulanito de Tal Mas', 4, 4, '2016-09-05', '09:29:12', 2),
(75, '20160926-0007', 0, 6375, 'Fulanito de Tal', 4, 2, '2016-09-05', '09:30:39', 2),
(76, '20161012-0001', 3, 3500, 'Bexandy Rodriguez', 4, 2, '2016-09-05', '16:08:21', 2),
(77, '20161021-0001', 3, 52000, 'Odaly Fernández', 4, 4, '2016-09-05', '16:26:20', 2),
(78, '20161021-0002', 3, 0, 'Maria Lugo', 4, 5, '2016-09-05', '16:29:23', 2),
(79, '20161101-0001', 3, 0, NULL, 4, 5, '2016-09-05', '16:53:12', 2),
(80, '20160922-0001', 1, 31375, 'Carolina Bravo Castillo', 4, 2, '2016-09-10', '15:30:00', 2),
(81, '20160926-0005', 0, 10000, 'Otro Fulanito de Tal Mas', 4, 4, '2016-09-10', '09:29:12', 2),
(82, '20160926-0007', 0, 6375, 'Fulanito de Tal', 4, 2, '2016-09-10', '09:30:39', 2),
(83, '20161012-0001', 3, 3500, 'Bexandy Rodriguez', 4, 2, '2016-09-10', '16:08:21', 2),
(84, '20161021-0001', 3, 52000, 'Odaly Fernández', 4, 4, '2016-09-10', '16:26:20', 2),
(85, '20161021-0002', 3, 0, 'Maria Lugo', 4, 5, '2016-09-10', '16:29:23', 2),
(87, '20160922-0001', 1, 31375, 'Carolina Bravo Castillo', 4, 2, '2016-09-12', '15:30:00', 2),
(88, '20160926-0005', 0, 10000, 'Otro Fulanito de Tal Mas', 4, 4, '2016-09-12', '09:29:12', 2),
(89, '20160926-0007', 0, 6375, 'Fulanito de Tal', 4, 2, '2016-09-12', '09:30:39', 2),
(90, '20161012-0001', 3, 3500, 'Bexandy Rodriguez', 4, 2, '2016-09-12', '16:08:21', 2),
(91, '20161021-0001', 3, 52000, 'Odaly Fernández', 4, 4, '2016-09-12', '16:26:20', 2),
(92, '20161021-0002', 3, 0, 'Maria Lugo', 4, 5, '2016-09-12', '16:29:23', 2),
(93, '20161101-0001', 3, 0, NULL, 4, 5, '2016-09-12', '16:53:12', 2),
(94, '20160922-0001', 1, 31375, 'Carolina Bravo Castillo', 4, 2, '2016-09-14', '15:30:00', 2),
(95, '20160926-0005', 0, 10000, 'Otro Fulanito de Tal Mas', 4, 4, '2016-09-14', '09:29:12', 2),
(96, '20160926-0007', 0, 6375, 'Fulanito de Tal', 4, 2, '2016-09-14', '09:30:39', 2),
(97, '20161012-0001', 3, 3500, 'Bexandy Rodriguez', 4, 2, '2016-09-14', '16:08:21', 2),
(98, '20161021-0001', 3, 52000, 'Odaly Fernández', 4, 4, '2016-09-14', '16:26:20', 2),
(99, '20161021-0002', 3, 0, 'Maria Lugo', 4, 5, '2016-09-14', '16:29:23', 2),
(100, '20161101-0001', 3, 0, NULL, 4, 5, '2016-09-14', '16:53:12', 2),
(101, '20160922-0001', 1, 31375, 'Carolina Bravo Castillo', 4, 2, '2016-09-16', '15:30:00', 2),
(102, '20160926-0005', 0, 10000, 'Otro Fulanito de Tal Mas', 4, 4, '2016-09-16', '09:29:12', 2),
(103, '20160926-0007', 0, 6375, 'Fulanito de Tal', 4, 2, '2016-09-16', '09:30:39', 2),
(104, '20161012-0001', 3, 3500, 'Bexandy Rodriguez', 4, 2, '2016-09-16', '16:08:21', 2),
(105, '20161021-0001', 3, 52000, 'Odaly Fernández', 4, 4, '2016-09-16', '16:26:20', 2),
(106, '20161021-0002', 3, 0, 'Maria Lugo', 4, 5, '2016-09-16', '16:29:23', 2),
(107, '20161101-0001', 3, 0, NULL, 4, 5, '2016-09-16', '16:53:12', 2),
(108, '20160922-0001', 1, 31375, 'Carolina Bravo Castillo', 4, 2, '2016-09-16', '15:30:00', 2),
(109, '20160926-0005', 0, 10000, 'Otro Fulanito de Tal Mas', 4, 4, '2016-09-16', '09:29:12', 2),
(110, '20160926-0007', 0, 6375, 'Fulanito de Tal', 4, 2, '2016-09-16', '09:30:39', 2),
(111, '20161012-0001', 3, 3500, 'Bexandy Rodriguez', 4, 2, '2016-09-16', '16:08:21', 2),
(112, '20161021-0001', 3, 52000, 'Odaly Fernández', 4, 4, '2016-09-16', '16:26:20', 2),
(113, '20161021-0002', 3, 0, 'Maria Lugo', 4, 5, '2016-09-16', '16:29:23', 2),
(114, '20161101-0001', 3, 0, NULL, 4, 5, '2016-09-16', '16:53:12', 2),
(115, '20160922-0001', 1, 31375, 'Carolina Bravo Castillo', 4, 2, '2016-09-22', '15:30:00', 2),
(116, '20160926-0005', 0, 10000, 'Otro Fulanito de Tal Mas', 4, 4, '2016-09-26', '09:29:12', 2),
(117, '20160926-0007', 0, 6375, 'Fulanito de Tal', 4, 2, '2016-09-26', '09:30:39', 2),
(118, '20161012-0001', 3, 3500, 'Bexandy Rodriguez', 4, 2, '2016-10-12', '16:08:21', 2),
(119, '20161021-0001', 3, 52000, 'Odaly Fernández', 4, 4, '2016-10-21', '16:26:20', 2),
(120, '20161021-0002', 3, 0, 'Maria Lugo', 4, 5, '2016-10-21', '16:29:23', 2),
(121, '20161101-0001', 3, 0, NULL, 4, 5, '2016-11-01', '16:53:12', 2),
(122, '20160922-0001', 1, 31375, 'Carolina Bravo Castillo', 4, 2, '2016-09-22', '15:30:00', 2),
(123, '20160926-0005', 0, 10000, 'Otro Fulanito de Tal Mas', 4, 4, '2016-09-26', '09:29:12', 2),
(124, '20160926-0007', 0, 6375, 'Fulanito de Tal', 4, 2, '2016-09-26', '09:30:39', 2),
(125, '20161012-0001', 3, 3500, 'Bexandy Rodriguez', 4, 2, '2016-10-12', '16:08:21', 2),
(126, '20161021-0001', 3, 52000, 'Odaly Fernández', 4, 4, '2016-10-21', '16:26:20', 2),
(127, '20161021-0002', 3, 0, 'Maria Lugo', 4, 5, '2016-10-21', '16:29:23', 2),
(128, '20161101-0001', 3, 0, NULL, 4, 5, '2016-11-01', '16:53:12', 2),
(129, '20160922-0001', 1, 31375, 'Carolina Bravo Castillo', 4, 2, '2016-09-22', '15:30:00', 2),
(130, '20160926-0005', 0, 10000, 'Otro Fulanito de Tal Mas', 4, 4, '2016-09-26', '09:29:12', 2),
(131, '20160926-0007', 0, 6375, 'Fulanito de Tal', 4, 2, '2016-09-26', '09:30:39', 2),
(132, '20161012-0001', 3, 3500, 'Bexandy Rodriguez', 4, 2, '2016-10-12', '16:08:21', 2),
(133, '20161021-0001', 3, 52000, 'Odaly Fernández', 4, 4, '2016-10-21', '16:26:20', 2),
(134, '20161021-0002', 3, 0, 'Maria Lugo', 4, 5, '2016-10-21', '16:29:23', 2),
(135, '20161101-0001', 3, 0, NULL, 4, 5, '2016-11-01', '16:53:12', 2),
(136, '20160922-0001', 1, 31375, 'Carolina Bravo Castillo', 4, 2, '2016-09-22', '15:30:00', 2),
(137, '20160926-0005', 0, 10000, 'Otro Fulanito de Tal Mas', 4, 4, '2016-09-26', '09:29:12', 2),
(138, '20160926-0007', 0, 6375, 'Fulanito de Tal', 4, 2, '2016-09-26', '09:30:39', 2),
(139, '20161012-0001', 3, 3500, 'Bexandy Rodriguez', 4, 2, '2016-10-12', '16:08:21', 2),
(140, '20161021-0001', 3, 52000, 'Odaly Fernández', 4, 4, '2016-10-21', '16:26:20', 2),
(141, '20161021-0002', 3, 0, 'Maria Lugo', 4, 5, '2016-10-21', '16:29:23', 2),
(143, '20160922-0001', 1, 31375, 'Carolina Bravo Castillo', 4, 2, '2016-10-22', '15:30:00', 2),
(144, '20160926-0005', 0, 10000, 'Otro Fulanito de Tal Mas', 4, 4, '2016-10-26', '09:29:12', 2),
(145, '20160926-0007', 0, 6375, 'Fulanito de Tal', 4, 2, '2016-10-26', '09:30:39', 2),
(146, '20161012-0001', 3, 3500, 'Bexandy Rodriguez', 4, 2, '2016-10-12', '16:08:21', 2),
(147, '20161021-0001', 3, 52000, 'Odaly Fernández', 5, 4, '2016-10-21', '16:26:20', 2),
(148, '20161021-0002', 3, 0, 'Maria Lugo', 4, 5, '2016-10-21', '16:29:23', 2),
(149, '20161101-0001', 3, 0, 'Andres Garcia', 4, 5, '2016-10-01', '16:53:12', 2),
(150, '20160922-0001', 1, 31375, 'Carolina Bravo Castillo', 4, 2, '2016-10-01', '15:30:00', 2),
(151, '20160926-0005', 0, 10000, 'Otro Fulanito de Tal Mas', 4, 4, '2016-10-01', '09:29:12', 2),
(152, '20160926-0007', 0, 6375, 'Fulanito de Tal', 4, 2, '2016-10-01', '09:30:39', 2),
(153, '20161012-0001', 3, 3500, 'Bexandy Rodriguez', 4, 2, '2016-10-01', '16:08:21', 2),
(154, '20161021-0001', 3, 52000, 'Odaly Fernández', 4, 4, '2016-10-01', '16:26:20', 2),
(155, '20161021-0002', 3, 0, 'Maria Lugo', 4, 5, '2016-10-01', '16:29:23', 2),
(156, '20161101-0001', 3, 0, NULL, 4, 5, '2016-10-01', '16:53:12', 2),
(157, '20160922-0001', 1, 31375, 'Carolina Bravo Castillo', 4, 2, '2016-10-05', '15:30:00', 2),
(158, '20160926-0005', 0, 10000, 'Otro Fulanito de Tal Mas', 4, 4, '2016-10-05', '09:29:12', 2),
(159, '20160926-0007', 0, 6375, 'Fulanito de Tal', 4, 2, '2016-10-05', '09:30:39', 2),
(160, '20161012-0001', 3, 3500, 'Bexandy Rodriguez', 4, 2, '2016-10-05', '16:08:21', 2),
(161, '20161021-0001', 3, 52000, 'Odaly Fernández', 4, 4, '2016-10-05', '16:26:20', 2),
(162, '20161021-0002', 3, 0, 'Maria Lugo', 4, 5, '2016-10-05', '16:29:23', 2),
(163, '20161101-0001', 3, 0, NULL, 4, 5, '2016-10-05', '16:53:12', 2),
(164, '20160922-0001', 1, 31375, 'Carolina Bravo Castillo', 4, 2, '2016-10-10', '15:30:00', 2),
(165, '20160926-0005', 0, 10000, 'Otro Fulanito de Tal Mas', 4, 4, '2016-10-10', '09:29:12', 2),
(166, '20160926-0007', 0, 6375, 'Fulanito de Tal', 4, 2, '2016-10-10', '09:30:39', 2),
(167, '20161012-0001', 3, 3500, 'Bexandy Rodriguez', 4, 2, '2016-10-10', '16:08:21', 2),
(168, '20161021-0001', 3, 52000, 'Odaly Fernández', 4, 4, '2016-10-10', '16:26:20', 2),
(169, '20161021-0002', 3, 0, 'Maria Lugo', 4, 5, '2016-10-10', '16:29:23', 2),
(171, '20160922-0001', 1, 31375, 'Carolina Bravo Castillo', 4, 2, '2016-10-12', '15:30:00', 2),
(172, '20160926-0005', 0, 10000, 'Otro Fulanito de Tal Mas', 4, 4, '2016-10-12', '09:29:12', 2),
(173, '20160926-0007', 0, 6375, 'Fulanito de Tal', 4, 2, '2016-10-12', '09:30:39', 2),
(174, '20161012-0001', 3, 3500, 'Bexandy Rodriguez', 4, 2, '2016-10-12', '16:08:21', 2),
(175, '20161021-0001', 3, 52000, 'Odaly Fernández', 4, 4, '2016-10-12', '16:26:20', 2),
(176, '20161021-0002', 3, 0, 'Maria Lugo', 4, 5, '2016-10-12', '16:29:23', 2),
(177, '20161101-0001', 3, 0, NULL, 4, 5, '2016-10-12', '16:53:12', 2),
(178, '20160922-0001', 1, 31375, 'Carolina Bravo Castillo', 4, 2, '2016-10-14', '15:30:00', 2),
(179, '20160926-0005', 0, 10000, 'Otro Fulanito de Tal Mas', 4, 4, '2016-10-14', '09:29:12', 2),
(180, '20160926-0007', 0, 6375, 'Fulanito de Tal', 4, 2, '2016-10-14', '09:30:39', 2),
(181, '20161012-0001', 3, 3500, 'Bexandy Rodriguez', 4, 2, '2016-10-14', '16:08:21', 2),
(182, '20161021-0001', 3, 52000, 'Odaly Fernández', 4, 4, '2016-10-14', '16:26:20', 2),
(183, '20161021-0002', 3, 0, 'Maria Lugo', 4, 5, '2016-10-14', '16:29:23', 2),
(184, '20161101-0001', 3, 0, NULL, 4, 5, '2016-10-14', '16:53:12', 2),
(185, '20160922-0001', 1, 31375, 'Carolina Bravo Castillo', 4, 2, '2016-10-16', '15:30:00', 2),
(186, '20160926-0005', 0, 10000, 'Otro Fulanito de Tal Mas', 4, 4, '2016-10-16', '09:29:12', 2),
(187, '20160926-0007', 0, 6375, 'Fulanito de Tal', 4, 2, '2016-10-16', '09:30:39', 2),
(188, '20161012-0001', 3, 3500, 'Bexandy Rodriguez', 4, 2, '2016-10-16', '16:08:21', 2),
(189, '20161021-0001', 3, 52000, 'Odaly Fernández', 4, 4, '2016-10-16', '16:26:20', 2),
(190, '20161021-0002', 3, 0, 'Maria Lugo', 4, 5, '2016-10-16', '16:29:23', 2),
(191, '20161101-0001', 3, 0, NULL, 4, 5, '2016-10-16', '16:53:12', 2),
(192, '20160922-0001', 1, 31375, 'Carolina Bravo Castillo', 4, 2, '2016-10-16', '15:30:00', 2),
(193, '20160926-0005', 0, 10000, 'Otro Fulanito de Tal Mas', 4, 4, '2016-10-16', '09:29:12', 2),
(194, '20160926-0007', 0, 6375, 'Fulanito de Tal', 4, 2, '2016-10-16', '09:30:39', 2),
(195, '20161012-0001', 3, 3500, 'Bexandy Rodriguez', 4, 2, '2016-10-16', '16:08:21', 2),
(196, '20161021-0001', 3, 52000, 'Odaly Fernández', 4, 4, '2016-10-16', '16:26:20', 2),
(197, '20161021-0002', 3, 0, 'Maria Lugo', 4, 5, '2016-10-16', '16:29:23', 2),
(198, '20161101-0001', 3, 0, NULL, 4, 5, '2016-10-16', '16:53:12', 2),
(199, '20160922-0001', 1, 31375, 'Carolina Bravo Castillo', 4, 2, '2016-10-22', '15:30:00', 2),
(200, '20160926-0005', 0, 10000, 'Otro Fulanito de Tal Mas', 4, 4, '2016-10-26', '09:29:12', 2),
(201, '20160926-0007', 0, 6375, 'Fulanito de Tal', 4, 2, '2016-10-26', '09:30:39', 2),
(202, '20161012-0001', 3, 3500, 'Bexandy Rodriguez', 4, 2, '2016-10-12', '16:08:21', 2),
(203, '20161021-0001', 3, 52000, 'Odaly Fernández', 4, 4, '2016-10-21', '16:26:20', 2),
(204, '20161021-0002', 3, 0, 'Maria Lugo', 4, 5, '2016-10-21', '16:29:23', 2),
(205, '20161101-0001', 3, 0, NULL, 4, 5, '2016-10-01', '16:53:12', 2),
(206, '20160922-0001', 1, 31375, 'Carolina Bravo Castillo', 4, 2, '2016-10-22', '15:30:00', 2),
(207, '20160926-0005', 0, 10000, 'Otro Fulanito de Tal Mas', 4, 4, '2016-10-26', '09:29:12', 2),
(208, '20160926-0007', 0, 6375, 'Fulanito de Tal', 4, 2, '2016-10-26', '09:30:39', 2),
(209, '20161012-0001', 3, 3500, 'Bexandy Rodriguez', 4, 2, '2016-10-12', '16:08:21', 2),
(210, '20161021-0001', 3, 52000, 'Odaly Fernández', 4, 4, '2016-10-21', '16:26:20', 2),
(211, '20161021-0002', 3, 0, 'Maria Lugo', 4, 5, '2016-10-21', '16:29:23', 2),
(212, '20161101-0001', 3, 0, NULL, 4, 5, '2016-10-01', '16:53:12', 2),
(213, '20160922-0001', 1, 31375, 'Carolina Bravo Castillo', 4, 2, '2016-10-22', '15:30:00', 2),
(214, '20160926-0005', 0, 10000, 'Otro Fulanito de Tal Mas', 4, 4, '2016-10-26', '09:29:12', 2),
(215, '20160926-0007', 0, 6375, 'Fulanito de Tal', 4, 2, '2016-10-26', '09:30:39', 2),
(216, '20161012-0001', 3, 3500, 'Bexandy Rodriguez', 4, 2, '2016-10-12', '16:08:21', 2),
(217, '20161021-0001', 3, 52000, 'Odaly Fernández', 4, 4, '2016-10-21', '16:26:20', 2),
(218, '20161021-0002', 3, 0, 'Maria Lugo', 4, 5, '2016-10-21', '16:29:23', 2),
(219, '20161101-0001', 3, 0, NULL, 4, 5, '2016-10-01', '16:53:12', 2),
(220, '20160922-0001', 1, 31375, 'Carolina Bravo Castillo', 4, 2, '2016-10-22', '15:30:00', 2),
(221, '20160926-0005', 0, 10000, 'Otro Fulanito de Tal Mas', 4, 4, '2016-10-26', '09:29:12', 2),
(222, '20160926-0007', 0, 6375, 'Fulanito de Tal', 4, 2, '2016-10-26', '09:30:39', 2),
(223, '20161012-0001', 3, 3500, 'Bexandy Rodriguez', 4, 2, '2016-10-12', '16:08:21', 2),
(224, '20161021-0001', 3, 52000, 'Odaly Fernández', 4, 4, '2016-10-21', '16:26:20', 2),
(225, '20161021-0002', 3, 0, 'Maria Lugo', 4, 5, '2016-10-21', '16:29:23', 2),
(227, '20161128-0001', 3, 110750, 'Petrolina Sinforosa', 4, 4, '2016-11-28', '15:51:02', 2),
(228, '20161128-0002', 3, 149050, 'Señor X', 4, 2, '2016-11-28', '20:43:21', 2),
(229, '20161128-0003', 3, 270000, 'Mister Y', 4, 4, '2016-11-28', '20:54:36', 2),
(230, '20161128-0004', 3, 3000, 'jojo', 2, NULL, '2016-11-28', '21:43:26', 2),
(231, '20161128-0005', 3, 3000, 'ferrari', 2, NULL, '2016-11-28', '22:17:51', 2),
(232, '20161128-0006', 3, 0, NULL, 1, NULL, '2016-11-28', '22:29:47', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permisos`
--

DROP TABLE IF EXISTS `permisos`;
CREATE TABLE `permisos` (
  `id_permiso` int(11) NOT NULL,
  `permiso` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `nombre` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `permisos`
--

INSERT INTO `permisos` (`id_permiso`, `permiso`, `nombre`) VALUES
(1, 'insertar_pedidos', 'Insertar Nuevos Pedidos'),
(2, 'ver_pedidos', 'Ver Pedidos'),
(3, 'modificar_pedidos', 'Modificar Pedidos'),
(4, 'borrar_pedidos', 'Borrar Pedidos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permisos_x_roles`
--

DROP TABLE IF EXISTS `permisos_x_roles`;
CREATE TABLE `permisos_x_roles` (
  `id_role` int(11) NOT NULL,
  `id_permiso` int(11) NOT NULL,
  `valor` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `permisos_x_roles`
--

INSERT INTO `permisos_x_roles` (`id_role`, `id_permiso`, `valor`) VALUES
(1, 1, 1),
(2, 1, 0),
(3, 1, 1),
(4, 1, 0),
(1, 2, 1),
(2, 2, 1),
(3, 2, 1),
(4, 2, 1),
(1, 3, 1),
(2, 3, 1),
(3, 3, 1),
(4, 3, 0),
(1, 4, 0),
(2, 4, 0),
(3, 4, 1),
(4, 4, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permisos_x_usuarios`
--

DROP TABLE IF EXISTS `permisos_x_usuarios`;
CREATE TABLE `permisos_x_usuarios` (
  `id_permiso` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `valor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `posts`
--

DROP TABLE IF EXISTS `posts`;
CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `title` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `text` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `posts`
--

INSERT INTO `posts` (`id`, `title`, `text`) VALUES
(1, 'Blog #1', 'Welcome to first blog post'),
(2, 'Blog #2', 'Welcome to my second blog post'),
(3, 'Blog #3', 'Welcome to my third blog post'),
(4, 'Blog #4', 'Welcome to my fourth blog post'),
(5, 'Blog #5', 'Welcome to my fifth blog post');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

DROP TABLE IF EXISTS `productos`;
CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `idcategoria` int(11) NOT NULL DEFAULT '17',
  `idmarca` int(11) DEFAULT '7',
  `nombre` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `unidadmedidaventas` int(11) NOT NULL DEFAULT '3',
  `preciounidad` int(11) NOT NULL,
  `unidadmedidaalmacen` int(11) NOT NULL DEFAULT '2',
  `relacionunidad` float NOT NULL DEFAULT '1',
  `imagen` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT '/img/productos/default.png',
  `codpremium` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `modificado` date DEFAULT NULL,
  `vencimiento` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `idcategoria`, `idmarca`, `nombre`, `unidadmedidaventas`, `preciounidad`, `unidadmedidaalmacen`, `relacionunidad`, `imagen`, `codpremium`, `modificado`, `vencimiento`) VALUES
(1, 1, 7, 'Producto 1', 3, 9000, 2, 3, '/img/productos/default.png', '', '2016-11-10', '0000-00-00'),
(3, 1, 7, 'Queso Cherrito Chevré', 3, 12500, 2, 1, '/img/productos/thumb_queso_cerrito_chevre.jpg', '', '2016-11-25', '2017-01-29'),
(4, 3, 7, 'Producto 3', 3, 10000, 2, 2, '/img/productos/default.png', '', '2016-11-27', '0000-00-00'),
(5, 3, 7, 'Producto de Prueba', 4, 10000, 2, 1, '/img/productos/default.png', '', '2016-11-27', '0000-00-00'),
(6, 1, 7, 'Prueba', 2, 1000, 2, 3, '/img/productos/default.png', '', '2016-11-10', '0000-00-00'),
(27, 4, 7, 'BOLOGNA ALIÑADA', 3, 1000, 2, 3, '/img/productos/default.png', '', '0000-00-00', '0000-00-00'),
(28, 4, 1, 'BOLOGNA DE POLLO PL', 3, 1500, 2, 3, '/img/productos/default.png', '', '2016-11-10', '0000-00-00'),
(33, 6, 2, 'CHORIFRITO OM 400 GR', 4, 1000, 4, 1, '/img/productos/default.png', '', '0000-00-00', '0000-00-00'),
(34, 6, 8, 'CHORIZO AHUMADO BULK  MONTS', 3, 1500, 2, 4, '/img/productos/default.png', '', '2016-11-10', '0000-00-00'),
(35, 6, 8, 'CHORIZO AHUMADO BULK MONT A/S', 3, 1000, 2, 4, '/img/productos/default.png', '', '0000-00-00', '0000-00-00'),
(36, 6, 7, 'CHORIZO C/AJO', 3, 1000, 2, 4, '/img/productos/default.png', '', '0000-00-00', '0000-00-00'),
(37, 6, 7, 'CHORIZO CERDO PICANTE', 3, 1000, 2, 5, '/img/productos/default.png', '', '0000-00-00', '0000-00-00'),
(38, 6, 8, 'CHORIZO COCIDO CON AJO MONTS', 3, 1000, 2, 4, '/img/productos/default.png', '', '0000-00-00', '0000-00-00'),
(44, 6, 9, 'CHORIZO ESPAÑOL VELA ALPINO', 4, 1000, 4, 1, '/img/productos/default.png', '', '0000-00-00', '0000-00-00'),
(45, 17, 7, 'CHULETA AHUMADA', 3, 1000, 2, 15, '/img/productos/default.png', '', '0000-00-00', '0000-00-00'),
(46, 17, 7, 'COPPA', 3, 1000, 2, 0.8, '/img/productos/default.png', '', '0000-00-00', '0000-00-00'),
(48, 17, 7, 'CUAJADA', 4, 1000, 4, 1, '/img/productos/default.png', '', '0000-00-00', '0000-00-00'),
(49, 17, 2, 'DELICIA DE JAMON Y QUESO OM 160GR', 4, 1000, 4, 1, '/img/productos/default.png', '', '0000-00-00', '0000-00-00'),
(50, 7, 14, 'ESPALDA AHUMADA SHOULDER AMERICA', 3, 1000, 2, 4.5, '/img/productos/default.png', '', '0000-00-00', '0000-00-00'),
(52, 7, 2, 'JAMON AHUMADO OM', 3, 2000, 2, 4.5, '/img/productos/default.png', '', '2016-11-10', '0000-00-00'),
(53, 7, 7, 'JAMON AHUMADO Q  CARNE', 3, 1000, 2, 4.5, '/img/productos/default.png', '', '0000-00-00', '0000-00-00'),
(54, 7, 5, 'JAMON AHUMADO SELVA NEGRA BELILLA', 3, 1000, 2, 4.5, '/img/productos/default.png', '', '0000-00-00', '0000-00-00'),
(55, 7, 3, 'JAMON AHUMADO SERVIPORK', 3, 1000, 2, 4.5, '/img/productos/default.png', '', '0000-00-00', '0000-00-00'),
(56, 7, 5, 'JAMON AHUMADO T/ SHOULDER BELILLA', 3, 1000, 2, 4.5, '/img/productos/default.png', '', '0000-00-00', '0000-00-00'),
(57, 7, 6, 'JAMON COCIDO PREMIER HERMO', 3, 1000, 2, 6, '/img/productos/default.png', '', '0000-00-00', '0000-00-00'),
(58, 7, 2, 'JAMON COCIDO OM', 3, 1500, 2, 6, '/img/productos/default.png', '', '2016-11-10', '0000-00-00'),
(59, 7, 11, 'JAMON DE ESPALDA AHUMADO T/SHOULDER VIGOR', 3, 1000, 2, 6, '/img/productos/default.png', '', '0000-00-00', '0000-00-00'),
(60, 7, 12, 'JAMON DE ESPALDA ARICHUNA KG', 3, 1000, 2, 6, '/img/productos/default.png', '', '0000-00-00', '0000-00-00'),
(61, 7, 12, 'JAMON DE ESPALDA T/SHOULDER ARI', 3, 1000, 2, 6, '/img/productos/default.png', '', '0000-00-00', '0000-00-00'),
(62, 7, 13, 'JAMON DE PIERNA ALIMEX  COCIDO', 3, 1000, 2, 6, '/img/productos/default.png', '', '0000-00-00', '0000-00-00'),
(63, 7, 14, 'JAMON DE PIERNA AMERICA', 3, 1000, 2, 6, '/img/productos/default.png', '', '0000-00-00', '0000-00-00'),
(64, 7, 12, 'JAMON DE PIERNA ARICHUNA SUPERIOR', 3, 1000, 2, 6, '/img/productos/default.png', '', '0000-00-00', '0000-00-00'),
(65, 7, 15, 'JAMON DE PIERNA ESTANDAR FIESTA', 3, 1000, 2, 6, '/img/productos/default.png', '', '0000-00-00', '0000-00-00'),
(66, 7, 1, 'JAMON DE PIERNA ESTANDAR PL', 3, 1000, 2, 6, '/img/productos/default.png', '', '0000-00-00', '0000-00-00'),
(67, 7, 6, 'JAMON DE PIERNA HERMO SUPERIOR', 3, 1000, 2, 6, '/img/productos/default.png', '', '0000-00-00', '0000-00-00'),
(68, 7, 8, 'JAMON DE PIERNA MONTS', 3, 1000, 2, 6, '/img/productos/default.png', '', '0000-00-00', '0000-00-00'),
(69, 7, 1, 'JAMON DE PIERNA PL', 3, 1000, 2, 6, '/img/productos/default.png', '', '0000-00-00', '0000-00-00'),
(70, 7, 3, 'JAMON DE PIERNA SERVIPORK', 3, 1000, 2, 6, '/img/productos/default.png', '', '0000-00-00', '0000-00-00'),
(71, 7, 11, 'JAMON DE PIERNA VIGOR', 3, 1000, 2, 6, '/img/productos/default.png', '', '0000-00-00', '0000-00-00'),
(72, 7, 7, 'JAMON FRIO CARNES', 3, 1000, 2, 6, '/img/productos/default.png', '', '0000-00-00', '0000-00-00'),
(134, 1, 7, 'QUESO SEMIGRASO', 3, 4278, 2, 1, '/img/productos/default.png', '', '0000-00-00', '0000-00-00'),
(145, 17, 7, 'MOZARELLA PAISA', 3, 3870, 2, 1, '/img/productos/default.png', '', '0000-00-00', '0000-00-00'),
(151, 17, 7, 'QUESO AREPERO', 3, 2323, 2, 1, '/img/productos/default.png', '', '0000-00-00', '0000-00-00'),
(152, 1, 7, 'QUESO URUGUAYO', 3, 3330, 2, 1, '/img/productos/default.png', '', '0000-00-00', '0000-00-00'),
(154, 17, 7, 'QUESO DURO ARTESANAL', 3, 3312, 2, 1, '/img/productos/default.png', '', '0000-00-00', '0000-00-00'),
(155, 17, 7, 'QUESO SEMI DURO', 3, 3640, 2, 1, '/img/productos/default.png', '', '0000-00-00', '0000-00-00'),
(159, 17, 7, 'QUESO MADURADO CONCHA ROJA', 3, 4472, 2, 1, '/img/productos/default.png', '', '0000-00-00', '0000-00-00'),
(174, 17, 7, 'QUESO MADURADO CONCHA NEGRA', 3, 4148, 2, 1, '/img/productos/default.png', '', '0000-00-00', '0000-00-00'),
(206, 17, 7, 'JAMON DE PIERNA SERVIPORK', 3, 5077, 2, 1, '/img/productos/default.png', '', '0000-00-00', '0000-00-00'),
(211, 17, 7, 'QUESO CACHAPERO', 3, 5850, 2, 1, '/img/productos/default.png', '', '0000-00-00', '0000-00-00'),
(213, 17, 7, 'MOZARELLA 500GR TUBBING', 3, 2854, 2, 1, '/img/productos/default.png', '', '0000-00-00', '0000-00-00'),
(214, 17, 7, 'QUESO PARMESANO RALLADO 5 KG', 3, 57280, 2, 1, '/img/productos/default.png', '', '0000-00-00', '0000-00-00'),
(217, 6, 7, 'CHORIZO CERDO PICANTE', 3, 5023, 2, 1, '/img/productos/default.png', '', '0000-00-00', '0000-00-00'),
(218, 15, 7, 'SALCHICHA C FINAS HIERBAS', 3, 9244, 2, 1, '/img/productos/default.png', '', '0000-00-00', '0000-00-00'),
(219, 6, 8, 'CHORIZO AHUMADO BULK  MONTS', 3, 5549, 2, 1, '/img/productos/default.png', '', '0000-00-00', '0000-00-00'),
(220, 5, 8, 'CHISTORRA A/S MONTSERRATINA', 4, 9682, 4, 1, '/img/productos/default.png', '', '0000-00-00', '0000-00-00'),
(228, 17, 7, 'MORTADELA ESPECIAL 1KG ARICHUNA', 3, 2730, 2, 1, '/img/productos/default.png', '', '0000-00-00', '0000-00-00'),
(229, 17, 7, 'GUASACACA REZEPT 310', 3, 700, 2, 1, '/img/productos/default.png', '', '0000-00-00', '0000-00-00'),
(239, 15, 1, 'SALCHICHA POLACA  PL DELI 450GR', 3, 3824, 2, 1, '/img/productos/default.png', '', '0000-00-00', '0000-00-00'),
(240, 17, 7, 'POLLO ENTERO', 3, 1893, 2, 1, '/img/productos/default.png', '', '0000-00-00', '0000-00-00'),
(271, 4, 7, 'BOLOGNA DE POLLO PL', 3, 3567, 2, 1, '/img/productos/default.png', '', '0000-00-00', '0000-00-00'),
(273, 4, 7, 'BOLOGNA ALIÑADA', 3, 2640, 2, 1, '/img/productos/default.png', '', '0000-00-00', '0000-00-00'),
(287, 4, 3, 'BOLOGNA DE POLLO SERVIPORK  CON QUESO', 3, 1210, 2, 3, '/img/productos/default.png', '', '0000-00-00', '0000-00-00'),
(289, 4, 7, 'BOLOGNA DE RES', 3, 1540, 2, 3, '/img/productos/default.png', '', '0000-00-00', '0000-00-00'),
(290, 17, 7, 'JAMON DE PIERNA ESTANDAR PL', 3, 5495, 2, 1, '/img/productos/default.png', '', '0000-00-00', '0000-00-00'),
(292, 17, 7, 'CHULETA AHUMADA', 3, 2340, 2, 1, '/img/productos/default.png', '', '0000-00-00', '0000-00-00'),
(293, 17, 7, 'QUESO PECORINO C/P', 3, 11473, 2, 1, '/img/productos/default.png', '', '0000-00-00', '0000-00-00'),
(297, 17, 7, 'QUESO PECORINO S/P', 3, 10935, 2, 1, '/img/productos/default.png', '', '0000-00-00', '0000-00-00'),
(298, 17, 7, 'SALCHICHON NAPOLI  ALPINO', 3, 17002, 2, 1, '/img/productos/default.png', '', '0000-00-00', '0000-00-00'),
(299, 17, 7, 'SALCHICHON MILANO', 3, 14133, 2, 1, '/img/productos/default.png', '', '0000-00-00', '0000-00-00'),
(300, 17, 7, 'SALAMI', 3, 13836, 2, 1, '/img/productos/default.png', '', '0000-00-00', '0000-00-00'),
(302, 17, 7, 'CHORIZO ESPAÑOL VELA ALPINO', 3, 18547, 2, 1, '/img/productos/default.png', '', '0000-00-00', '0000-00-00'),
(304, 17, 7, 'PECHUGA DE PAVO BANQUETE', 3, 2790, 2, 1, '/img/productos/default.png', '', '0000-00-00', '0000-00-00'),
(309, 17, 7, 'PECHUGA DE POLLO PL', 3, 9046, 2, 1, '/img/productos/default.png', '', '0000-00-00', '0000-00-00'),
(311, 15, 12, 'SALCHICHA COCIDA T/ BOLOGNA ARICHUNA', 3, 2642, 2, 1, '/img/productos/default.png', '', '0000-00-00', '0000-00-00'),
(313, 17, 7, 'JAMON DE PIERNA ESTANDAR FIESTA', 3, 5702, 2, 1, '/img/productos/default.png', '', '0000-00-00', '0000-00-00'),
(317, 16, 7, 'TOCINETA', 3, 5796, 2, 1, '/img/productos/default.png', '', '0000-00-00', '0000-00-00'),
(322, 17, 7, 'QUESO DE CABRA', 3, 3450, 2, 1, '/img/productos/default.png', '', '0000-00-00', '0000-00-00'),
(323, 17, 7, 'PECHUGA DE PAVO AHUMADO MONTS', 3, 10896, 2, 1, '/img/productos/default.png', '', '0000-00-00', '0000-00-00'),
(326, 17, 7, 'MORTADELA EXTRA TAPARA HERMO-OM', 3, 4656, 2, 1, '/img/productos/default.png', '', '0000-00-00', '0000-00-00'),
(333, 17, 7, 'QUESO FRAILES FLOR DE ARACUA', 3, 9189, 2, 1, '/img/productos/default.png', '', '0000-00-00', '0000-00-00'),
(334, 17, 7, 'QUESO GUAYANES', 3, 3825, 2, 1, '/img/productos/default.png', '', '0000-00-00', '0000-00-00'),
(335, 17, 7, 'GUINDAS MARRASQUINO ROJAS', 3, 6594, 2, 1, '/img/productos/default.png', '', '0000-00-00', '0000-00-00'),
(342, 17, 7, 'QUESO MOZARELLA PARAMO', 3, 3450, 2, 1, '/img/productos/default.png', '', '0000-00-00', '0000-00-00'),
(343, 1, 7, 'QUESO TELITA', 3, 3658, 2, 1, '/img/productos/default.png', '', '0000-00-00', '0000-00-00'),
(344, 17, 7, 'QUESO MOZARELLA', 3, 3588, 2, 1, '/img/productos/default.png', '', '0000-00-00', '0000-00-00'),
(345, 17, 7, 'JAMON VISKING MONT', 3, 0, 2, 1, '/img/productos/default.png', '', '0000-00-00', '0000-00-00'),
(346, 7, 12, 'JAMON DE ESPALDA T/SHOULDER ARI', 3, 4500, 2, 1, '/img/productos/default.png', '', '0000-00-00', '0000-00-00'),
(347, 17, 7, 'PECHUGA DE PAVO SERVIPORK', 3, 5871, 2, 1, '/img/productos/default.png', '', '0000-00-00', '0000-00-00'),
(351, 17, 7, 'PECHUGA DE POLLO SERVIPORK', 3, 1940, 2, 1, '/img/productos/default.png', '', '0000-00-00', '0000-00-00'),
(357, 17, 7, 'SALCHICHON TIPO ESPAÑOL', 3, 5225, 2, 1, '/img/productos/default.png', '', '0000-00-00', '0000-00-00'),
(359, 17, 7, 'PEPPERONI', 3, 5498, 2, 1, '/img/productos/default.png', '', '0000-00-00', '0000-00-00'),
(362, 17, 7, 'ROAST BEEF', 3, 6740, 2, 1, '/img/productos/default.png', '', '0000-00-00', '0000-00-00'),
(363, 17, 7, 'QUESO PROVOLETTA', 3, 5244, 2, 1, '/img/productos/default.png', '', '0000-00-00', '0000-00-00'),
(364, 17, 7, 'JAMON SERRANO', 3, 11880, 2, 1, '/img/productos/default.png', '', '0000-00-00', '0000-00-00'),
(366, 17, 7, 'QUESO AHUMADO LEÑADOR', 3, 9289, 2, 1, '/img/productos/default.png', '', '0000-00-00', '0000-00-00'),
(375, 17, 7, 'QUESO MANCHEGO', 3, 6910, 2, 1, '/img/productos/default.png', '', '0000-00-00', '0000-00-00'),
(376, 17, 7, 'QUESO AZUL PAISA', 3, 5654, 2, 1, '/img/productos/default.png', '', '0000-00-00', '0000-00-00'),
(378, 17, 7, 'NUGGETS INSTITUCIONAL CORRAL KG', 3, 5148, 2, 1, '/img/productos/default.png', '', '0000-00-00', '0000-00-00'),
(380, 17, 7, 'PECHUGA DE PAVO TUNAL', 3, 2440, 2, 1, '/img/productos/default.png', '', '0000-00-00', '0000-00-00'),
(381, 17, 7, 'QUESO CREMA PAISA- GABY', 3, 4312, 2, 1, '/img/productos/default.png', '', '0000-00-00', '0000-00-00'),
(382, 17, 7, 'PECHUGA DE PAVO MONTSERRATINA', 3, 6515, 2, 1, '/img/productos/default.png', '', '0000-00-00', '0000-00-00'),
(383, 1, 7, 'QUESO TENTACION', 3, 9289, 2, 1, '/img/productos/default.png', '', '0000-00-00', '0000-00-00'),
(386, 17, 7, 'QUESO PARMESANO', 3, 12365, 2, 1, '/img/productos/default.png', '', '0000-00-00', '0000-00-00'),
(387, 17, 7, 'JAMON DE PIERNA VIGOR', 3, 4892, 2, 1, '/img/productos/default.png', '', '0000-00-00', '0000-00-00'),
(389, 17, 7, 'QUESO DE AÑO MARACAY', 3, 1240, 2, 1, '/img/productos/default.png', '', '0000-00-00', '0000-00-00'),
(392, 17, 7, 'JAMON DE PIERNA ARICHUNA SUPERIOR', 3, 4380, 2, 1, '/img/productos/default.png', '', '0000-00-00', '0000-00-00'),
(394, 17, 7, 'PECHUGA DE POLLO AHUMADO MONTS', 3, 5200, 2, 1, '/img/productos/default.png', '', '0000-00-00', '0000-00-00'),
(396, 14, 7, 'RICOTTA PAISA', 3, 1984, 2, 1, '/img/productos/default.png', '', '0000-00-00', '0000-00-00'),
(398, 17, 7, 'JAMON DE PIERNA PL', 3, 7138, 2, 1, '/img/productos/default.png', '', '0000-00-00', '0000-00-00'),
(399, 17, 7, 'LOMO EMBUCHADO', 3, 6410, 2, 1, '/img/productos/default.png', '', '0000-00-00', '0000-00-00'),
(401, 17, 7, 'COPPA', 3, 23207, 2, 1, '/img/productos/default.png', '', '0000-00-00', '0000-00-00'),
(404, 17, 7, 'MORTADELA TAPARA OM', 3, 0, 2, 1, '/img/productos/default.png', '', '0000-00-00', '0000-00-00'),
(405, 17, 7, 'PECHUGA DE POLLO CORRAL', 3, 6815, 2, 1, '/img/productos/default.png', '', '0000-00-00', '0000-00-00'),
(407, 7, 5, 'JAMON AHUMADO T/ SHOULDER BELILLA', 3, 3364, 2, 1, '/img/productos/default.png', '', '0000-00-00', '0000-00-00'),
(408, 17, 7, 'CUAJADA', 3, 55200, 2, 1, '/img/productos/default.png', '', '0000-00-00', '0000-00-00'),
(410, 17, 7, 'FILETES DE ANCHOAS BOQUEMAR', 3, 30665, 2, 1, '/img/productos/default.png', '', '0000-00-00', '0000-00-00'),
(411, 7, 13, 'JAMON DE PIERNA ALIMEX  COCIDO', 3, 2870, 2, 1, '/img/productos/default.png', '', '0000-00-00', '0000-00-00'),
(413, 1, 7, 'QUESO TORONDOY', 3, 8541, 2, 1, '/img/productos/default.png', '', '0000-00-00', '0000-00-00'),
(416, 17, 7, 'PECHUGA DE PAVO LOUIS RICH', 3, 3590, 2, 1, '/img/productos/default.png', '', '0000-00-00', '0000-00-00'),
(417, 17, 7, 'QUESO PALMITA', 3, 3726, 2, 1, '/img/productos/default.png', '', '0000-00-00', '0000-00-00'),
(418, 7, 2, 'JAMON AHUMADO OM', 3, 8988, 2, 1, '/img/productos/default.png', '', '0000-00-00', '0000-00-00'),
(419, 5, 7, 'CHISTORRA BULK', 4, 9482, 4, 4, '/img/productos/default.png', '', '0000-00-00', '0000-00-00'),
(420, 6, 8, 'CHORIZO AHUMADO BULK MONT A/S', 3, 5708, 2, 1, '/img/productos/default.png', '', '0000-00-00', '0000-00-00'),
(421, 17, 7, 'PECHUGA DE PAVO MONTS', 3, 4560, 2, 1, '/img/productos/default.png', '', '0000-00-00', '0000-00-00'),
(422, 17, 7, 'QUESO MOZZARELA NAPOLITANA', 3, 6866, 2, 1, '/img/productos/default.png', '', '0000-00-00', '0000-00-00'),
(423, 17, 7, 'JAMON DE PIERNA MONTS', 3, 5031, 2, 1, '/img/productos/default.png', '', '0000-00-00', '0000-00-00'),
(424, 7, 2, 'JAMON COPCIDO OM', 3, 5709, 2, 1, '/img/productos/default.png', '', '0000-00-00', '0000-00-00'),
(426, 17, 7, 'MORTADELA EXTRA PLUMROSE', 3, 1130, 2, 1, '/img/productos/default.png', '', '0000-00-00', '0000-00-00'),
(427, 17, 7, 'MORTADELA EXTRA ARICHUNA', 3, 2060, 2, 1, '/img/productos/default.png', '', '0000-00-00', '0000-00-00'),
(428, 7, 3, 'JAMON AHUMADO SERVIPORK', 3, 2150, 2, 1, '/img/productos/default.png', '', '0000-00-00', '0000-00-00'),
(429, 6, 7, 'CHORIZO C/AJO', 3, 3964, 2, 1, '/img/productos/default.png', '', '0000-00-00', '0000-00-00'),
(432, 17, 7, 'LOMO AHUMADO', 3, 5542, 2, 1, '/img/productos/default.png', '', '0000-00-00', '0000-00-00'),
(434, 17, 7, 'PECHUGA DE PAVO ALPINO', 3, 2660, 2, 1, '/img/productos/default.png', '', '0000-00-00', '0000-00-00'),
(437, 7, 7, 'JAMON AHUMADO Q  CARNE', 3, 1890, 2, 1, '/img/productos/default.png', '', '0000-00-00', '0000-00-00'),
(438, 17, 7, 'MILANESA INSTITUCIONAL CORRAL KG', 3, 46773, 2, 1, '/img/productos/default.png', '', '0000-00-00', '0000-00-00'),
(442, 17, 7, 'JAMON DE PIERNA HERMO SUPERIOR', 3, 4328, 2, 1, '/img/productos/default.png', '', '0000-00-00', '0000-00-00'),
(445, 17, 7, 'JAMON IBERICO', 3, 1950, 2, 1, '/img/productos/default.png', '', '0000-00-00', '0000-00-00'),
(446, 17, 7, 'PECHUGA DE POLLO IBERICO', 3, 6096, 2, 1, '/img/productos/default.png', '', '0000-00-00', '0000-00-00'),
(451, 17, 7, 'HAMBURPOLLO KG CORRAL', 3, 6507, 2, 1, '/img/productos/default.png', '', '0000-00-00', '0000-00-00'),
(452, 17, 7, 'QUESO CHEDDAR', 3, 6030, 2, 1, '/img/productos/default.png', '', '0000-00-00', '0000-00-00'),
(453, 17, 7, 'MORCILLA CON ARROZ Y CEBOLLA PICANTE MONTS', 3, 3524, 2, 1, '/img/productos/default.png', '', '0000-00-00', '0000-00-00'),
(455, 17, 7, 'SALCHICHON TIPO FUET MONTS', 3, 6830, 2, 1, '/img/productos/default.png', '', '0000-00-00', '0000-00-00'),
(456, 17, 7, 'PECHUGA DE PAVO PL', 3, 10136, 2, 1, '/img/productos/default.png', '', '0000-00-00', '0000-00-00'),
(458, 17, 7, 'PECHUGA DE PAVO PREMIER', 3, 6976, 2, 1, '/img/productos/default.png', '', '0000-00-00', '0000-00-00'),
(460, 16, 7, 'TOCINETA PL', 3, 2189, 2, 1, '/img/productos/default.png', '', '0000-00-00', '0000-00-00'),
(461, 17, 7, 'QUESO MARIBO', 3, 8658, 2, 1, '/img/productos/default.png', '', '0000-00-00', '0000-00-00'),
(462, 17, 7, 'GUINDAS MARRASQUINO VERDE', 3, 11300, 2, 1, '/img/productos/default.png', '', '0000-00-00', '0000-00-00'),
(463, 17, 7, 'PECHUGA DE POLLO PREMIER', 3, 5929, 2, 1, '/img/productos/default.png', '', '0000-00-00', '0000-00-00'),
(472, 17, 7, 'COSTILLA PRE-COCIDA BBQ', 3, 2305, 2, 1, '/img/productos/default.png', '', '0000-00-00', '0000-00-00'),
(484, 7, 6, 'JAMON COCIDO PREMIER HERMO', 3, 4331, 2, 1, '/img/productos/default.png', '', '0000-00-00', '0000-00-00'),
(488, 17, 7, 'PECHUGA DE POLLO MONTSERRATINA', 3, 5773, 2, 1, '/img/productos/default.png', '', '0000-00-00', '0000-00-00'),
(493, 17, 7, 'PECHUGA DE POLLO FIESTA', 3, 2060, 2, 1, '/img/productos/default.png', '', '0000-00-00', '0000-00-00'),
(494, 17, 7, 'JAMON FRIO CARNES', 3, 1025, 2, 1, '/img/productos/default.png', '', '0000-00-00', '0000-00-00'),
(496, 17, 7, 'PECHUGA DE PAVO GIACOMELLO', 3, 2350, 2, 1, '/img/productos/default.png', '', '0000-00-00', '0000-00-00'),
(509, 17, 7, 'PECHUGA VISKING S TINA', 3, 5564, 2, 1, '/img/productos/default.png', '', '0000-00-00', '0000-00-00'),
(513, 7, 11, 'JAMON DE ESPALDA AHUMADO T/SHOULDER VIGOR', 3, 4213, 2, 1, '/img/productos/default.png', '', '0000-00-00', '0000-00-00'),
(514, 15, 10, 'SALCHICHA ECONOMICA CORRAL', 3, 3621, 2, 1, '/img/productos/default.png', '', '0000-00-00', '0000-00-00'),
(516, 7, 5, 'JAMON AHUMADO SELVA NEGRA BELILLA', 3, 4799, 2, 1, '/img/productos/default.png', '', '0000-00-00', '0000-00-00'),
(517, 7, 12, 'JAMON DE ESPALDA ARICHUNA KG', 3, 3311, 2, 1, '/img/productos/default.png', '', '0000-00-00', '0000-00-00'),
(518, 17, 7, 'ESPALDA AHUMADA SHOULDER AMERICA', 3, 4464, 2, 1, '/img/productos/default.png', '', '0000-00-00', '0000-00-00'),
(738, 17, 7, 'QUESO BOOM CHEESE', 3, 454, 2, 1, '/img/productos/default.png', '', '0000-00-00', '0000-00-00'),
(739, 17, 7, 'QUESO CREMA FINLANDIA', 3, 454, 2, 1, '/img/productos/default.png', '', '0000-00-00', '0000-00-00'),
(778, 17, 7, 'JAMON ENDIABLADO PLUMROSE 60GR', 3, 332, 2, 1, '/img/productos/default.png', '', '0000-00-00', '0000-00-00'),
(779, 17, 7, 'JAMON ENDIABLADO PLUMROSE 100GR', 3, 535, 2, 1, '/img/productos/default.png', '', '0000-00-00', '0000-00-00'),
(780, 17, 7, 'JAMON ENDIABLADO PL 115GR LATA', 3, 535, 2, 1, '/img/productos/default.png', '', '0000-00-00', '0000-00-00'),
(781, 15, 7, 'SALCHICHAS TIPO WIENERS PL 225 GR', 3, 1996, 2, 1, '/img/productos/default.png', '', '0000-00-00', '0000-00-00'),
(782, 15, 7, 'SALCHICHAS TIPO WIENERS PL 450 GR', 3, 3802, 2, 1, '/img/productos/default.png', '', '0000-00-00', '0000-00-00'),
(783, 15, 1, 'SALCHICHA WIENER PL 800GR', 3, 5827, 2, 1, '/img/productos/default.png', '', '0000-00-00', '0000-00-00'),
(784, 17, 7, 'MORTADELA ESPECIAL PL 1 KG', 3, 2781, 2, 1, '/img/productos/default.png', '', '0000-00-00', '0000-00-00'),
(785, 16, 7, 'TOCINETA REBANADA PL 300GR A/S', 3, 2253, 2, 1, '/img/productos/default.png', '', '0000-00-00', '0000-00-00'),
(786, 15, 15, 'SALCHICHAS T VIENA FIESTA 450 GR', 3, 3165, 2, 1, '/img/productos/default.png', '', '0000-00-00', '0000-00-00'),
(787, 15, 7, 'SALCHICHAS T/VIENA FIESTA 800 GR', 3, 4343, 2, 1, '/img/productos/default.png', '', '0000-00-00', '0000-00-00'),
(788, 15, 7, 'SALCHICHAS COCIDAS DE POLLO ECONOMICAS 450GR', 3, 3164, 2, 1, '/img/productos/default.png', '', '0000-00-00', '0000-00-00'),
(789, 15, 15, 'SALCHICHAS COCIDAS DE POLLO ECONOMICA FIESTA 800GR', 3, 1893, 2, 1, '/img/productos/default.png', '', '0000-00-00', '0000-00-00'),
(818, 16, 7, 'TOCINETA A/S OSCAR M', 3, 2371, 2, 1, '/img/productos/default.png', '', '0000-00-00', '0000-00-00'),
(821, 17, 7, 'DELICIA DE JAMON Y QUESO OM 160GR', 3, 1445, 2, 1, '/img/productos/default.png', '', '0000-00-00', '0000-00-00'),
(822, 15, 2, 'SALCHCIHAS SUPERIOR T WIENERS OM 225G', 3, 1374, 2, 1, '/img/productos/default.png', '', '0000-00-00', '0000-00-00'),
(823, 17, 7, 'SALCHICHAS T/ WIENERS 225GR OM', 3, 1905, 2, 1, '/img/productos/default.png', '', '0000-00-00', '0000-00-00'),
(824, 15, 7, 'SALCHICHAS COCIDAS SUPERIOR TIPO WIENERS 800GR', 3, 5144, 2, 1, '/img/productos/default.png', '', '0000-00-00', '0000-00-00'),
(825, 15, 2, 'SALCHICHAS SUPERIOR TIPO WIENERS OM 450GR', 3, 3604, 2, 1, '/img/productos/default.png', '', '0000-00-00', '0000-00-00'),
(826, 6, 2, 'CHORIFRITO OM 400 GR', 3, 3161, 2, 1, '/img/productos/default.png', '', '0000-00-00', '0000-00-00'),
(827, 17, 7, 'JAMON ENDIABLADO OM 50 GR', 3, 310, 2, 1, '/img/productos/default.png', '', '0000-00-00', '0000-00-00'),
(828, 17, 7, 'JAMON ENDIABLADO OM 100 GR', 3, 750, 2, 1, '/img/productos/default.png', '', '0000-00-00', '0000-00-00'),
(889, 17, 7, 'SUERO DE LECHE PICANTE FUERTE 162GR', 3, 568, 2, 1, '/img/productos/default.png', '', '0000-00-00', '0000-00-00'),
(928, 17, 7, 'QUESO CREMA  200 PAISA', 3, 1120, 2, 1, '/img/productos/default.png', '', '0000-00-00', '0000-00-00'),
(929, 17, 7, 'QUESO CREMA DIP AJO PAISA 200 GR', 3, 820, 2, 1, '/img/productos/default.png', '', '0000-00-00', '0000-00-00'),
(931, 17, 7, 'QUESO CREMA DIP TOCINETA PAISA 200 GR', 3, 820, 2, 1, '/img/productos/default.png', '', '0000-00-00', '0000-00-00'),
(1013, 17, 7, 'GUASACACA CRIOLLA 155GR EL COCINERITO', 3, 352, 2, 1, '/img/productos/default.png', '', '0000-00-00', '0000-00-00'),
(1014, 17, 7, 'GUASACASA CRIOLLA EL COCINERITO 310 GR', 3, 701, 2, 1, '/img/productos/default.png', '', '0000-00-00', '0000-00-00'),
(1015, 17, 7, 'GUASACACA PICANTE EL COCINERITO 155GR', 3, 376, 2, 1, '/img/productos/default.png', '', '0000-00-00', '0000-00-00'),
(1016, 17, 7, 'GUASACACA PICANTE EL COCINERITO 310 GR', 3, 709, 2, 1, '/img/productos/default.png', '', '0000-00-00', '0000-00-00'),
(1024, 17, 7, 'SALCHIPOLLO 450GR 20 UND', 3, 3734, 2, 1, '/img/productos/default.png', '', '0000-00-00', '0000-00-00'),
(1032, 17, 7, 'GUASACACA PICANTE REZ. 155GR', 3, 376, 2, 1, '/img/productos/default.png', '', '0000-00-00', '0000-00-00'),
(1035, 17, 7, 'GUASACACA PICANTE 310 GR REZEPT', 3, 462, 2, 1, '/img/productos/default.png', '', '0000-00-00', '0000-00-00'),
(1037, 17, 7, 'GUASACACA CRIOLLA REZEPT 155 GR', 3, 352, 2, 1, '/img/productos/default.png', '', '0000-00-00', '0000-00-00'),
(1038, 17, 7, 'GUASACACA CRIOLLA REZEPT 310 GR', 3, 432, 2, 1, '/img/productos/default.png', '', '0000-00-00', '0000-00-00'),
(1052, 17, 7, 'QUESO CREMA GABY', 3, 1127, 2, 1, '/img/productos/default.png', '', '0000-00-00', '0000-00-00'),
(1053, 15, 6, 'SALCHICHAS T VIENA HERMO 450 GR', 3, 1204, 2, 1, '/img/productos/default.png', '', '0000-00-00', '0000-00-00'),
(1054, 17, 7, 'SALCHICHAS T WIENERS HERMO KIDS 450 GR', 3, 1636, 2, 1, '/img/productos/default.png', '', '0000-00-00', '0000-00-00'),
(1184, 17, 7, 'QUESO DE AÑO  FRITZ 180 GR', 3, 1643, 2, 1, '/img/productos/default.png', '', '0000-00-00', '0000-00-00'),
(1256, 17, 7, 'CARNE DE HAMBURGUESA QUEEN 200GR', 3, 347, 2, 1, '/img/productos/default.png', '', '0000-00-00', '0000-00-00'),
(1257, 17, 7, 'CARNE DE HAMBURGUESA QUEEN 450GR', 3, 705, 2, 1, '/img/productos/default.png', '', '0000-00-00', '0000-00-00'),
(1314, 17, 7, 'QUESO PARMESANO RESCA 180GR', 3, 1895, 2, 1, '/img/productos/default.png', '', '0000-00-00', '0000-00-00'),
(1315, 17, 7, 'QUESO DE AÑO 180GR RESCA', 3, 955, 2, 1, '/img/productos/default.png', '', '0000-00-00', '0000-00-00'),
(1436, 14, 7, 'RICOTA LIGH 1K INLACA', 3, 1430, 2, 1, '/img/productos/default.png', '', '0000-00-00', '0000-00-00'),
(1445, 14, 7, 'RICOTTA TUBBING PAISA 250 GR', 3, 440, 2, 1, '/img/productos/default.png', '', '0000-00-00', '0000-00-00'),
(1511, 17, 7, 'MORTADELA FONTANA 1 KG', 3, 3264, 2, 1, '/img/productos/default.png', '', '0000-00-00', '0000-00-00'),
(1546, 17, 7, 'FILETES DE ANCHOA MEDITERRANEO 200GR', 3, 1912, 2, 1, '/img/productos/default.png', '', '0000-00-00', '0000-00-00'),
(1547, 3, 9, 'Bexandy', 3, 15000, 2, 3, '/img/productos/thumb_queso_parmesano_torondoy.jpg', '', '2016-11-25', '2017-03-05'),
(1548, 3, 14, 'Producto con foto', 3, 15000, 2, 3, '/img/productos/thumb_plumrose.png', '', '2016-11-25', '2016-11-24'),
(1549, 3, 1, 'Otro Producto', 3, 1500, 2, 3, '/img/productos/tmp/thumb_jamon-selva-negra.jpg', NULL, '2016-11-24', NULL),
(1550, 3, 9, 'gaby', 3, 20000, 2, 1, '/img/productos/thumb_cm_gaby_quesocrema.jpg', '', '2016-11-25', NULL),
(1551, 3, 13, 'mozarella', 3, 2000, 2, 1, '/img/productos/thumb_queso-mozarella-paramo.jpg', '', '2016-11-25', NULL),
(1552, 3, 4, 'queso crema', 4, 2000, 4, 1, '/img/productos/thumb_queso-crema-gaby.jpg', '', '2016-11-25', NULL),
(1553, 3, 15, 'productico', 4, 5000, 4, 1, 'img/productos/default.png', '', '2016-11-25', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos_x_pedido`
--

DROP TABLE IF EXISTS `productos_x_pedido`;
CREATE TABLE `productos_x_pedido` (
  `id` int(11) NOT NULL,
  `pedido` int(11) NOT NULL,
  `producto` int(11) NOT NULL,
  `cantidad` float NOT NULL,
  `subtotal` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `productos_x_pedido`
--

INSERT INTO `productos_x_pedido` (`id`, `pedido`, `producto`, `cantidad`, `subtotal`) VALUES
(1, 171, 5, 7, 55717),
(2, 59, 206, 3, 5029),
(3, 43, 72, 8, 12046),
(4, 52, 72, 13, 22118),
(5, 44, 27, 10, 59860),
(6, 90, 72, 1, 55459),
(7, 65, 174, 14, 3248),
(8, 111, 134, 4, 33277),
(9, 129, 159, 12, 1131),
(10, 52, 311, 14, 38922),
(11, 213, 311, 16, 27291),
(12, 136, 239, 6, 29657),
(13, 183, 347, 9, 5521),
(14, 202, 828, 9, 8280),
(15, 110, 827, 20, 23226),
(16, 192, 494, 18, 35247),
(17, 156, 413, 10, 16269),
(18, 196, 68, 16, 54563),
(19, 148, 362, 11, 34119),
(20, 212, 287, 18, 45338),
(21, 25, 323, 12, 4130),
(22, 114, 783, 10, 10124),
(23, 119, 309, 12, 4307),
(24, 78, 304, 10, 18604),
(25, 126, 375, 10, 52432),
(26, 32, 463, 11, 8915),
(27, 34, 460, 7, 29094),
(28, 51, 44, 8, 3030),
(29, 151, 323, 19, 30922),
(30, 128, 145, 4, 26332),
(31, 108, 1032, 16, 47564),
(32, 78, 787, 12, 54050),
(33, 98, 1016, 11, 50128),
(34, 175, 1015, 11, 33572),
(35, 224, 64, 12, 31880),
(36, 15, 59, 15, 12722),
(37, 124, 1314, 15, 52162),
(38, 208, 509, 11, 36598),
(39, 141, 240, 8, 42384),
(40, 51, 347, 5, 12883),
(41, 95, 55, 3, 41948),
(42, 173, 1014, 7, 28855),
(43, 224, 240, 12, 26309),
(44, 108, 380, 9, 50694),
(46, 110, 781, 14, 13366),
(47, 77, 460, 12, 58674),
(48, 203, 220, 6, 46658),
(49, 47, 416, 12, 17314),
(50, 147, 152, 2, 20540),
(51, 91, 359, 9, 35610),
(52, 51, 44, 15, 35329),
(53, 59, 493, 6, 57956),
(54, 193, 389, 13, 25653),
(55, 132, 778, 12, 21966),
(56, 217, 408, 8, 6729),
(57, 222, 416, 1, 1481),
(58, 67, 786, 1, 16097),
(59, 49, 787, 10, 41474),
(60, 158, 1013, 10, 24054),
(62, 189, 27, 2, 44100),
(63, 26, 428, 15, 3374),
(64, 73, 488, 13, 48596),
(65, 10, 66, 18, 8315),
(66, 82, 297, 17, 6670),
(67, 163, 513, 5, 22379),
(68, 173, 461, 20, 22796),
(69, 146, 823, 20, 13747),
(70, 100, 789, 13, 39715),
(71, 47, 460, 7, 22384),
(72, 194, 484, 15, 58874),
(73, 21, 311, 12, 16127),
(74, 225, 1015, 16, 56246),
(75, 108, 346, 5, 39697),
(76, 72, 1014, 5, 34548),
(77, 77, 60, 7, 7439),
(78, 77, 64, 14, 55979),
(79, 174, 513, 11, 30671),
(80, 102, 429, 17, 5535),
(81, 206, 463, 1, 5030),
(82, 95, 309, 14, 58343),
(83, 17, 494, 5, 59697),
(84, 41, 781, 7, 19760),
(85, 194, 420, 5, 15737),
(87, 223, 214, 10, 19499),
(88, 126, 382, 5, 29083),
(89, 37, 34, 11, 26276),
(90, 92, 509, 6, 53396),
(91, 130, 322, 6, 15439),
(92, 166, 66, 19, 48535),
(93, 145, 357, 3, 11197),
(94, 39, 313, 6, 24717),
(95, 199, 49, 10, 31550),
(96, 115, 309, 17, 42908),
(97, 80, 240, 7, 23778),
(98, 133, 789, 3, 18484),
(99, 168, 823, 20, 54678),
(100, 197, 292, 1, 55918),
(101, 209, 387, 14, 33563),
(102, 174, 342, 2, 59527),
(103, 203, 419, 17, 4208),
(104, 111, 420, 6, 48867),
(105, 222, 438, 11, 51521),
(106, 202, 342, 13, 42250),
(107, 183, 58, 7, 58923),
(108, 141, 1, 16, 13327),
(109, 157, 513, 15, 27599),
(110, 88, 317, 5, 19817),
(111, 80, 442, 12, 31101),
(112, 15, 52, 18, 23943),
(113, 192, 37, 11, 11850),
(114, 222, 392, 13, 36203),
(115, 186, 1035, 3, 12714),
(116, 93, 322, 14, 11706),
(117, 80, 494, 16, 43493),
(118, 209, 33, 13, 35698),
(119, 132, 359, 8, 42445),
(120, 188, 218, 17, 9208),
(121, 58, 48, 19, 30141),
(122, 101, 446, 13, 33581),
(123, 186, 516, 10, 23975),
(124, 59, 1052, 8, 19508),
(125, 163, 782, 4, 45491),
(126, 71, 484, 14, 33760),
(127, 144, 214, 6, 7463),
(128, 37, 1013, 8, 10554),
(129, 122, 421, 11, 46464),
(130, 43, 461, 10, 52989),
(131, 208, 509, 2, 25657),
(132, 106, 818, 19, 13293),
(133, 153, 57, 18, 52964),
(134, 12, 55, 8, 14840),
(135, 93, 297, 10, 15009),
(136, 70, 52, 9, 46169),
(137, 175, 344, 17, 19942),
(138, 29, 1511, 17, 54832),
(139, 156, 217, 11, 23271),
(140, 68, 366, 8, 58415),
(141, 18, 334, 2, 35728),
(142, 154, 1184, 14, 31822),
(143, 146, 513, 6, 59871),
(144, 108, 421, 16, 11272),
(145, 53, 309, 14, 45961),
(146, 205, 63, 5, 41050),
(147, 218, 739, 7, 24544),
(148, 52, 5, 6, 52304),
(149, 178, 1032, 4, 57896),
(150, 62, 818, 5, 43277),
(151, 103, 271, 6, 58158),
(152, 199, 49, 4, 58776),
(153, 22, 1315, 11, 55915),
(154, 156, 239, 2, 5382),
(155, 54, 28, 7, 58241),
(156, 93, 1032, 4, 18453),
(157, 28, 67, 7, 49403),
(158, 122, 228, 12, 1247),
(159, 121, 55, 15, 27602),
(160, 141, 427, 8, 44874),
(161, 92, 451, 7, 28195),
(162, 106, 783, 10, 20920),
(163, 164, 311, 6, 14335),
(164, 128, 154, 15, 23294),
(165, 168, 446, 19, 17119),
(166, 169, 36, 17, 3164),
(168, 172, 287, 2, 34363),
(169, 105, 67, 17, 47136),
(170, 183, 437, 16, 30487),
(171, 43, 398, 20, 17396),
(172, 104, 438, 16, 24709),
(173, 144, 931, 7, 30775),
(174, 178, 271, 6, 17732),
(175, 118, 781, 15, 28563),
(176, 40, 304, 20, 11570),
(177, 141, 518, 6, 26344),
(178, 127, 404, 20, 49912),
(179, 17, 364, 5, 51476),
(181, 45, 67, 1, 42828),
(183, 164, 818, 13, 18512),
(184, 140, 218, 8, 7022),
(185, 83, 738, 15, 13602),
(186, 104, 145, 12, 47437),
(187, 91, 211, 14, 52956),
(188, 141, 5, 7, 31015),
(189, 81, 827, 8, 19221),
(190, 114, 488, 19, 1864),
(191, 92, 33, 2, 45669),
(192, 223, 889, 20, 15404),
(193, 224, 780, 2, 11661),
(194, 114, 240, 8, 43589),
(195, 113, 488, 4, 49583),
(196, 15, 322, 9, 52929),
(197, 111, 58, 13, 18785),
(198, 102, 411, 13, 59047),
(199, 15, 174, 14, 36651),
(200, 224, 1037, 19, 36217),
(201, 42, 289, 14, 41668),
(202, 59, 28, 13, 18527),
(203, 218, 387, 10, 10874),
(204, 71, 825, 7, 44677),
(205, 167, 60, 16, 56020),
(206, 168, 451, 7, 45048),
(207, 94, 429, 10, 43331),
(208, 124, 392, 1, 48720),
(209, 96, 1314, 4, 42358),
(210, 186, 828, 11, 27267),
(211, 152, 155, 2, 46114),
(212, 73, 513, 7, 44212),
(213, 109, 213, 11, 50231),
(214, 27, 784, 1, 15087),
(215, 102, 381, 6, 29064),
(216, 34, 416, 1, 52973),
(217, 30, 364, 11, 39297),
(218, 210, 34, 11, 16527),
(219, 43, 50, 11, 21943),
(220, 54, 493, 5, 6645),
(221, 53, 151, 14, 10151),
(222, 188, 420, 6, 34021),
(223, 173, 62, 19, 5875),
(224, 12, 779, 1, 26426),
(225, 163, 297, 1, 46151),
(226, 207, 780, 17, 30250),
(227, 212, 445, 4, 34618),
(228, 62, 417, 5, 39577),
(229, 69, 451, 4, 48137),
(230, 195, 1013, 14, 23987),
(231, 45, 826, 18, 56012),
(232, 119, 239, 19, 48031),
(233, 91, 34, 3, 18685),
(234, 151, 292, 15, 30576),
(235, 135, 401, 6, 6870),
(236, 149, 451, 4, 40371),
(237, 121, 1436, 19, 18330),
(238, 131, 789, 15, 26097),
(239, 46, 787, 1, 51089),
(240, 117, 416, 20, 5656),
(241, 92, 421, 5, 40194),
(242, 64, 404, 9, 17092),
(243, 223, 429, 2, 50066),
(244, 102, 929, 10, 54495),
(245, 120, 429, 20, 28201),
(246, 137, 929, 11, 5884),
(247, 223, 818, 19, 41830),
(248, 119, 423, 2, 7196),
(249, 188, 36, 12, 30941),
(250, 206, 1035, 7, 50971),
(251, 117, 382, 17, 58645),
(252, 167, 1511, 20, 42335),
(253, 182, 311, 6, 31532),
(254, 95, 154, 13, 26538),
(255, 158, 357, 16, 33952),
(256, 148, 418, 18, 12406),
(257, 130, 1052, 10, 39561),
(258, 19, 68, 20, 10521),
(259, 189, 64, 6, 13819),
(260, 29, 65, 16, 8394),
(261, 168, 366, 7, 20085),
(262, 29, 6, 11, 29093),
(263, 73, 1037, 14, 30272),
(264, 83, 300, 13, 9829),
(265, 222, 461, 7, 21989),
(266, 187, 823, 5, 51815),
(267, 75, 401, 12, 31766),
(268, 49, 411, 20, 9378),
(269, 92, 45, 17, 27000),
(270, 182, 38, 6, 5414),
(271, 207, 174, 6, 24364),
(272, 149, 155, 13, 44462),
(273, 129, 509, 16, 16172),
(274, 15, 1014, 8, 15043),
(275, 138, 311, 1, 17481),
(276, 22, 427, 6, 21965),
(277, 164, 394, 7, 37759),
(278, 185, 1184, 10, 32442),
(279, 190, 65, 5, 50670),
(280, 182, 1436, 19, 19269),
(281, 182, 432, 19, 19031),
(282, 25, 154, 7, 25503),
(283, 149, 239, 4, 34464),
(284, 40, 311, 20, 24322),
(285, 24, 411, 3, 22247),
(286, 174, 239, 8, 17827),
(287, 135, 437, 2, 55727),
(288, 26, 826, 9, 13854),
(289, 130, 299, 8, 13880),
(290, 53, 69, 5, 47385),
(291, 213, 420, 6, 10754),
(292, 75, 66, 16, 22113),
(293, 27, 326, 13, 50278),
(294, 60, 462, 18, 31756),
(295, 182, 27, 19, 15806),
(296, 98, 65, 6, 43695),
(297, 73, 780, 4, 56030),
(298, 174, 784, 15, 29260),
(299, 82, 366, 7, 50252),
(300, 165, 28, 10, 11496),
(301, 144, 363, 16, 38788),
(302, 116, 1436, 10, 19828),
(303, 33, 929, 13, 2129),
(304, 93, 36, 11, 5125),
(305, 167, 931, 19, 20507),
(306, 222, 1315, 20, 34714),
(307, 15, 54, 20, 33363),
(308, 40, 416, 8, 17253),
(309, 210, 422, 13, 2938),
(310, 98, 1016, 13, 1683),
(311, 88, 787, 20, 42721),
(312, 117, 387, 13, 20053),
(313, 164, 423, 7, 22185),
(314, 127, 65, 4, 48581),
(315, 47, 217, 2, 21878),
(316, 73, 213, 10, 28680),
(317, 22, 214, 11, 30376),
(318, 154, 335, 15, 34983),
(319, 168, 404, 17, 42262),
(320, 101, 271, 17, 3251),
(321, 102, 362, 19, 35201),
(322, 135, 411, 19, 18041),
(323, 25, 35, 5, 26944),
(324, 96, 359, 5, 48095),
(325, 208, 6, 19, 31157),
(326, 126, 273, 17, 21815),
(327, 181, 422, 14, 53416),
(328, 28, 317, 10, 6064),
(329, 26, 65, 4, 40775),
(330, 115, 413, 7, 17148),
(331, 117, 1546, 7, 45281),
(332, 55, 289, 11, 44855),
(333, 220, 446, 11, 58057),
(334, 190, 399, 17, 26781),
(335, 69, 67, 4, 42426),
(336, 38, 343, 14, 7027),
(337, 38, 445, 17, 50581),
(338, 224, 1014, 3, 25092),
(339, 144, 418, 11, 54098),
(340, 157, 33, 4, 39205),
(341, 59, 437, 14, 12401),
(342, 188, 220, 4, 37267),
(343, 43, 824, 11, 22038),
(344, 84, 65, 15, 11613),
(345, 79, 151, 1, 4227),
(346, 198, 514, 16, 41913),
(347, 221, 1257, 16, 49839),
(348, 95, 782, 5, 19351),
(349, 196, 429, 18, 50755),
(350, 53, 71, 2, 28293),
(351, 95, 219, 13, 57748),
(352, 118, 446, 18, 14224),
(353, 31, 424, 7, 48004),
(354, 181, 821, 2, 31118),
(355, 85, 346, 1, 7970),
(356, 137, 416, 10, 2348),
(357, 56, 343, 17, 14305),
(358, 29, 417, 9, 59553),
(359, 24, 273, 8, 24670),
(360, 216, 317, 10, 42114),
(361, 150, 304, 3, 33414),
(362, 125, 53, 5, 39397),
(363, 132, 494, 16, 34436),
(364, 79, 1257, 20, 24728),
(365, 163, 424, 16, 34686),
(366, 79, 273, 6, 54210),
(367, 178, 396, 15, 14463),
(368, 62, 1035, 13, 26118),
(369, 217, 357, 19, 33263),
(370, 135, 1053, 18, 8026),
(371, 132, 54, 14, 10230),
(372, 214, 335, 10, 11992),
(373, 92, 174, 14, 39680),
(374, 43, 333, 18, 6996),
(375, 22, 292, 1, 53755),
(376, 171, 1054, 12, 56971),
(377, 43, 516, 13, 50602),
(378, 113, 214, 14, 2088),
(379, 12, 38, 17, 32772),
(380, 123, 463, 12, 39459),
(381, 52, 37, 5, 17606),
(382, 197, 174, 6, 12162),
(383, 99, 779, 20, 27852),
(384, 152, 346, 7, 54359),
(385, 195, 513, 6, 47650),
(386, 196, 69, 18, 23851),
(387, 98, 1511, 18, 30100),
(388, 202, 62, 10, 16202),
(389, 182, 380, 20, 51290),
(390, 154, 421, 2, 37998),
(391, 165, 420, 5, 2170),
(392, 11, 345, 12, 3109),
(393, 22, 38, 17, 2754),
(394, 75, 5, 10, 13930),
(395, 92, 824, 11, 35864),
(396, 221, 366, 6, 31872),
(397, 16, 68, 1, 7967),
(399, 218, 48, 12, 22056),
(400, 44, 50, 2, 23662),
(401, 106, 421, 18, 38356),
(402, 146, 429, 6, 21332),
(403, 158, 818, 1, 34656),
(404, 181, 739, 1, 49642),
(405, 102, 460, 6, 30980),
(406, 10, 1052, 18, 42455),
(407, 216, 458, 14, 10059),
(408, 207, 779, 10, 57646),
(409, 223, 381, 3, 50876),
(410, 24, 445, 3, 3839),
(411, 96, 46, 6, 7141),
(412, 83, 451, 10, 11546),
(413, 220, 134, 8, 2180),
(414, 68, 484, 1, 8362),
(415, 75, 929, 12, 13324),
(416, 189, 322, 15, 27269),
(417, 171, 72, 6, 56329),
(418, 128, 826, 11, 21572),
(420, 171, 152, 1, 21247),
(421, 172, 387, 10, 1494),
(422, 143, 513, 17, 22730),
(423, 87, 1546, 20, 21534),
(424, 102, 394, 6, 27248),
(425, 221, 326, 10, 35376),
(426, 80, 779, 19, 5685),
(427, 116, 300, 1, 45193),
(428, 66, 293, 6, 15975),
(429, 115, 218, 17, 5662),
(430, 67, 1032, 16, 22582),
(431, 98, 446, 19, 40146),
(432, 198, 421, 12, 32971),
(433, 140, 1184, 8, 40995),
(434, 210, 389, 13, 35152),
(435, 95, 151, 4, 35675),
(436, 135, 416, 19, 9985),
(437, 22, 33, 10, 35295),
(438, 168, 54, 6, 57042),
(439, 181, 494, 14, 26968),
(440, 66, 456, 14, 41793),
(441, 161, 6, 12, 7992),
(442, 92, 49, 8, 37975),
(443, 154, 381, 12, 11305),
(444, 148, 438, 11, 1526),
(445, 113, 1013, 3, 27416),
(446, 166, 788, 7, 2031),
(447, 106, 420, 8, 5781),
(448, 42, 739, 4, 23283),
(449, 104, 1315, 1, 22433),
(450, 34, 218, 20, 50733),
(451, 90, 401, 12, 4734),
(452, 42, 438, 19, 15552),
(453, 38, 404, 8, 33859),
(454, 118, 44, 7, 50853),
(455, 100, 437, 17, 6191),
(456, 56, 297, 5, 17595),
(457, 44, 827, 9, 41310),
(458, 11, 420, 1, 43564),
(459, 120, 322, 15, 45280),
(460, 117, 413, 10, 18630),
(461, 38, 889, 6, 6385),
(462, 75, 1256, 20, 52714),
(464, 209, 364, 18, 34489),
(465, 141, 1314, 11, 32594),
(466, 174, 154, 17, 21159),
(467, 39, 782, 14, 22790),
(468, 107, 44, 4, 18269),
(469, 75, 334, 9, 15040),
(470, 181, 739, 19, 23389),
(471, 79, 484, 18, 29791),
(472, 211, 34, 11, 35704),
(473, 173, 56, 14, 2099),
(474, 81, 462, 9, 17995),
(475, 96, 50, 3, 42874),
(476, 45, 386, 7, 46508),
(477, 32, 304, 7, 33260),
(478, 67, 344, 2, 34169),
(479, 73, 152, 3, 38293),
(480, 191, 35, 19, 58350),
(481, 89, 378, 8, 3940),
(482, 39, 738, 2, 54957),
(483, 178, 37, 3, 14672),
(484, 111, 387, 9, 2203),
(485, 121, 228, 16, 43906),
(486, 94, 62, 17, 55806),
(487, 40, 50, 6, 38934),
(488, 106, 56, 17, 38919),
(489, 25, 28, 17, 29676),
(490, 167, 824, 19, 15746),
(491, 108, 287, 5, 39400),
(492, 168, 410, 16, 14004),
(493, 105, 134, 2, 25511),
(494, 31, 46, 6, 16973),
(495, 135, 1315, 5, 19807),
(497, 177, 323, 20, 23753),
(498, 16, 292, 19, 32890),
(499, 162, 404, 6, 14080),
(500, 89, 33, 14, 25387),
(501, 141, 344, 9, 33315),
(502, 132, 378, 13, 40796),
(503, 140, 411, 6, 32464),
(504, 58, 323, 19, 30111),
(505, 29, 386, 1, 28007),
(506, 215, 460, 15, 39706),
(507, 54, 69, 11, 2394),
(508, 102, 28, 13, 47867),
(509, 198, 299, 4, 46345),
(510, 209, 28, 2, 59722),
(511, 100, 72, 7, 31712),
(512, 22, 64, 14, 41126),
(514, 79, 5, 5, 5255),
(515, 90, 382, 12, 19399),
(516, 95, 928, 16, 41964),
(517, 78, 785, 3, 26412),
(518, 15, 434, 7, 30061),
(519, 62, 509, 15, 8889),
(520, 91, 211, 2, 42709),
(521, 40, 387, 3, 32697),
(522, 29, 738, 19, 52228),
(523, 45, 785, 6, 25907),
(524, 143, 357, 17, 11882),
(525, 180, 438, 9, 19262),
(526, 218, 33, 6, 45052),
(527, 71, 424, 14, 30415),
(528, 215, 159, 2, 2927),
(529, 44, 1445, 20, 31862),
(530, 154, 493, 15, 8250),
(531, 113, 376, 15, 49893),
(532, 70, 518, 2, 22627),
(533, 115, 424, 16, 43874),
(534, 205, 317, 15, 4142),
(535, 103, 1436, 19, 21910),
(536, 41, 828, 13, 44978),
(537, 53, 323, 19, 47495),
(538, 45, 28, 16, 26027),
(539, 76, 455, 8, 31670),
(540, 119, 56, 8, 55296),
(541, 54, 783, 4, 56962),
(542, 215, 398, 12, 19594),
(543, 211, 145, 2, 1293),
(544, 126, 428, 20, 31019),
(545, 128, 45, 1, 40534),
(546, 37, 432, 8, 15822),
(547, 81, 4, 20, 34199),
(548, 103, 407, 4, 41808),
(549, 138, 426, 1, 16307),
(550, 212, 56, 3, 38453),
(551, 76, 404, 11, 20607),
(552, 129, 404, 14, 5943),
(553, 84, 46, 17, 29904),
(554, 139, 416, 9, 58786),
(555, 45, 38, 1, 34741),
(556, 187, 422, 15, 10106),
(557, 43, 1035, 17, 45644),
(558, 199, 38, 2, 42140),
(559, 164, 60, 2, 22216),
(560, 165, 1015, 15, 21350),
(561, 76, 1038, 1, 8807),
(562, 72, 789, 19, 29813),
(563, 96, 426, 6, 5623),
(564, 133, 35, 2, 4829),
(565, 87, 33, 7, 23731),
(566, 167, 293, 3, 24120),
(567, 215, 416, 1, 41570),
(568, 91, 780, 2, 35129),
(569, 211, 134, 18, 45040),
(570, 166, 37, 12, 21283),
(571, 95, 783, 10, 23404),
(572, 35, 789, 2, 59299),
(573, 216, 344, 5, 2622),
(574, 202, 428, 15, 31129),
(575, 57, 218, 15, 41343),
(576, 167, 54, 17, 12688),
(577, 169, 342, 17, 18428),
(578, 184, 1014, 2, 45096),
(579, 191, 65, 16, 23945),
(580, 114, 72, 10, 26185),
(581, 63, 427, 10, 40259),
(582, 157, 423, 20, 1549),
(583, 44, 451, 18, 12989),
(584, 190, 273, 18, 31634),
(585, 214, 451, 7, 3091),
(586, 134, 271, 12, 12307),
(587, 192, 228, 18, 31245),
(589, 22, 401, 6, 7332),
(590, 133, 825, 9, 37141),
(591, 60, 297, 9, 47860),
(592, 192, 1038, 11, 30678),
(593, 80, 427, 19, 14543),
(594, 77, 151, 4, 17302),
(595, 214, 422, 8, 28037),
(596, 133, 323, 2, 57050),
(597, 187, 423, 6, 35477),
(598, 57, 398, 17, 55984),
(599, 148, 386, 13, 20992),
(600, 169, 455, 6, 44925),
(601, 33, 408, 3, 3879),
(602, 199, 1436, 16, 18435),
(603, 75, 351, 13, 56820),
(604, 33, 334, 2, 48124),
(605, 200, 427, 15, 29518),
(606, 115, 1257, 17, 45903),
(607, 87, 1054, 20, 48769),
(608, 58, 347, 13, 5814),
(609, 221, 159, 4, 54834),
(610, 134, 786, 11, 24268),
(611, 133, 273, 12, 9862),
(612, 201, 789, 19, 42630),
(613, 135, 380, 1, 18101),
(614, 188, 411, 2, 38420),
(615, 176, 416, 20, 1348),
(616, 13, 6, 1.5, 1500),
(617, 13, 4, 2, 20000),
(618, 13, 5, 0.02, 200.5),
(619, 227, 6, 2.5, 2500),
(620, 227, 4, 1.5, 15000),
(621, 227, 5, 2, 20000),
(622, 227, 1, 0.167, 1500.5),
(623, 227, 1549, 2, 3000),
(624, 227, 3, 5.5, 68750),
(625, 228, 5, 7.98, 79800),
(626, 228, 1, 0.056, 500.5),
(627, 228, 3, 5.5, 68750),
(628, 229, 5, 10, 100000),
(629, 229, 4, 16.5, 165000),
(630, 229, 6, 5, 5000),
(631, 230, 4, 0.3, 3000),
(632, 231, 6, 3, 3000);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `role`
--

DROP TABLE IF EXISTS `role`;
CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `roleId` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `role`
--

INSERT INTO `role` (`id`, `parent_id`, `roleId`) VALUES
(1, NULL, 'autenticado'),
(2, 1, 'vendedor'),
(3, 1, 'despachador'),
(4, 1, 'administrador'),
(5, 1, 'cliente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles` (
  `id_role` int(11) NOT NULL,
  `nombre` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id_role`, `nombre`) VALUES
(1, 'vendedor'),
(2, 'despachador'),
(3, 'administrador'),
(4, 'cliente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `stickynotes`
--

DROP TABLE IF EXISTS `stickynotes`;
CREATE TABLE `stickynotes` (
  `id` int(11) NOT NULL,
  `note` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `stickynotes`
--

INSERT INTO `stickynotes` (`id`, `note`, `created`) VALUES
(1, 'This is a sticky note you can type and edit.', '2016-10-29 04:29:29'),
(2, 'Let\'s see if it will work with my Iphone', '2016-10-29 04:29:29'),
(4, 'Hola soledad como estas', '2016-10-31 14:03:17');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `task_item`
--

DROP TABLE IF EXISTS `task_item`;
CREATE TABLE `task_item` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `completed` tinyint(4) NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `task_item`
--

INSERT INTO `task_item` (`id`, `title`, `completed`, `created`) VALUES
(1, 'titulo 1', 0, '2016-09-20 00:00:00'),
(3, 'Titulo 2', 0, '2016-09-20 19:26:51');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_almacen`
--

DROP TABLE IF EXISTS `tipo_almacen`;
CREATE TABLE `tipo_almacen` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `tipo_almacen`
--

INSERT INTO `tipo_almacen` (`id`, `nombre`) VALUES
(1, 'Mayor'),
(2, 'Detal');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `unidad_medida`
--

DROP TABLE IF EXISTS `unidad_medida`;
CREATE TABLE `unidad_medida` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `abreviatura` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `simbolo` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `unidad_medida`
--

INSERT INTO `unidad_medida` (`id`, `nombre`, `abreviatura`, `simbolo`) VALUES
(2, 'Piezas', 'Pza', 'Pza'),
(3, 'Kilogramos', 'Kg', 'Kg'),
(4, 'Unidades', 'Und', 'Und');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `displayName` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `gender` enum('1','0') COLLATE utf8_unicode_ci NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `displayName`, `password`, `gender`) VALUES
(1, 'brodriguez', 'bexandy@gmail.com', 'Bexandy Rodríguez', '$2y$14$0Zk8PHFWqeuikDDcq9BBLuxNMx2pFeUHHjmIyvD7gwDlDTXdL3KVC', '1'),
(2, 'yandex', 'bexandy@yandex.com', 'Pedro Perez', '$2y$14$a2ArD8YHxqLS60.0K/gC.uojf2c8z0tApIyoCE6kQ7yW6qDxXv0Wu', '1'),
(3, 'admin', 'admin@tucorreo.com', 'Simón Pineda', '$2y$14$HmE5FZgHfRpvJiYvGkZYSukzhyssDVn9rIs64yr6b55hcaCvWYllC', '1'),
(4, 'emilio', 'emilio@correo.com', 'Emilio Rodriguez', '$2y$14$.0/FMrLCwQKBsPZqln2H5OJ8DA0YIzEQ.R6iAVEU9H9juqaMZ6iLW', '1'),
(5, 'jesus', 'jesus@tucorreo.com', 'Jesus Padila', '$2y$14$/kddeLzLG/pC4UiY8sZ4relHS0pdxz1Z1j5BrqqUYX3wOqU/.t/0S', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user_role_linker`
--

DROP TABLE IF EXISTS `user_role_linker`;
CREATE TABLE `user_role_linker` (
  `user_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `user_role_linker`
--

INSERT INTO `user_role_linker` (`user_id`, `role_id`) VALUES
(1, 2),
(2, 3),
(3, 4),
(4, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `usuario` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `cedula` int(8) NOT NULL,
  `nombre` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `apellido` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `password` varchar(16) COLLATE utf8_unicode_ci NOT NULL,
  `foto` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `role` int(11) NOT NULL,
  `activo` tinyint(1) NOT NULL,
  `nomina` tinyint(1) NOT NULL,
  `administrador` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `usuario`, `cedula`, `nombre`, `apellido`, `password`, `foto`, `role`, `activo`, `nomina`, `administrador`) VALUES
(1, 'bexandy', 14075425, 'Bexandy', 'Rodríguez', 'p3lk4x', '', 1, 1, 1, 1),
(2, 'despachador', 12345678, 'Despachador', '1', '1234', '', 2, 1, 1, 2);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `view_reservado`
-- (Véase abajo para la vista actual)
--
DROP VIEW IF EXISTS `view_reservado`;
CREATE TABLE `view_reservado` (
`producto` int(11)
,`idalmacen` int(11)
,`reservado` double
,`estatus` int(11)
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `vista_almacen`
-- (Véase abajo para la vista actual)
--
DROP VIEW IF EXISTS `vista_almacen`;
CREATE TABLE `vista_almacen` (
`id` int(11)
,`idtipoalmacen` int(11)
,`nombtipoalmacen` varchar(100)
,`nombre` varchar(100)
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `vista_disponibilidad_almacen`
-- (Véase abajo para la vista actual)
--
DROP VIEW IF EXISTS `vista_disponibilidad_almacen`;
CREATE TABLE `vista_disponibilidad_almacen` (
`id` int(11)
,`idalmacen` int(11)
,`nombre` varchar(100)
,`idtipoalmacen` int(11)
,`tipoalmacen` varchar(100)
,`idproducto` int(11)
,`nombproducto` varchar(100)
,`cantidad` float
,`reservado` double
,`disponible` double
,`idunidmedalmacen` int(11)
,`unidmed` varchar(50)
,`idunidmedventas` int(11)
,`unidmeddetal` varchar(50)
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `vista_ingresos`
-- (Véase abajo para la vista actual)
--
DROP VIEW IF EXISTS `vista_ingresos`;
CREATE TABLE `vista_ingresos` (
`id` int(11)
,`fecha` date
,`idalmacen` int(11)
,`nombalmacen` varchar(100)
,`idproducto` int(11)
,`nombproducto` varchar(100)
,`cantidad` float
,`unidmed` varchar(50)
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `vista_items`
-- (Véase abajo para la vista actual)
--
DROP VIEW IF EXISTS `vista_items`;
CREATE TABLE `vista_items` (
`pedido` int(11)
,`producto` int(11)
,`nombproducto` varchar(100)
,`unidmedprod` varchar(50)
,`cantidad` float
,`subtotal` float
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `vista_movimientos`
-- (Véase abajo para la vista actual)
--
DROP VIEW IF EXISTS `vista_movimientos`;
CREATE TABLE `vista_movimientos` (
`id` int(11)
,`idalmacenmayor` int(11)
,`nombmayor` varchar(100)
,`idalmacendetal` int(11)
,`nombdetal` varchar(100)
,`idproducto` int(11)
,`nombproducto` varchar(100)
,`cantidad` float
,`unidmed` varchar(50)
,`fecha` date
,`idusuario` int(11)
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `vista_pedidos`
-- (Véase abajo para la vista actual)
--
DROP VIEW IF EXISTS `vista_pedidos`;
CREATE TABLE `vista_pedidos` (
`id` int(11)
,`codigo` varchar(15)
,`vendedor` int(11)
,`nombvendedor` varchar(50)
,`preciototal` int(11)
,`cliente` varchar(100)
,`estatus` int(11)
,`nombestatus` varchar(100)
,`msgclientes` varchar(100)
,`msgventas` varchar(100)
,`msgdespacho` varchar(100)
,`despachador` int(11)
,`nombdespachador` varchar(50)
,`fecha` date
,`hora` time
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `vista_productos`
-- (Véase abajo para la vista actual)
--
DROP VIEW IF EXISTS `vista_productos`;
CREATE TABLE `vista_productos` (
`id` int(11)
,`nombre` varchar(100)
,`idcategoria` int(11)
,`nombcategoria` varchar(100)
,`unidadmedidaventas` int(11)
,`nombunidmedventas` varchar(50)
,`preciounidad` int(11)
,`unidadmedidaalmacen` int(11)
,`nombunidmedalmacen` varchar(50)
,`relacionunidad` float
,`imagen` varchar(100)
,`idmarca` int(11)
,`nombmarca` varchar(100)
,`codpremium` varchar(25)
,`modificado` date
,`vencimiento` date
,`disponible` tinyint(1)
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `vista_productos_disponibles`
-- (Véase abajo para la vista actual)
--
DROP VIEW IF EXISTS `vista_productos_disponibles`;
CREATE TABLE `vista_productos_disponibles` (
`id` int(11)
,`nombre` varchar(100)
,`idcategoria` int(11)
,`nombcategoria` varchar(100)
,`unidadmedidaventas` int(11)
,`nombunidmedventas` varchar(50)
,`preciounidad` int(11)
,`unidadmedidaalmacen` int(11)
,`nombunidmedalmacen` varchar(50)
,`relacionunidad` float
,`imagen` varchar(100)
,`idmarca` int(11)
,`nombmarca` varchar(100)
,`codpremium` varchar(25)
,`modificado` date
,`vencimiento` date
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `vista_productos_traslado`
-- (Véase abajo para la vista actual)
--
DROP VIEW IF EXISTS `vista_productos_traslado`;
CREATE TABLE `vista_productos_traslado` (
`id` int(11)
,`idalmacen` int(11)
,`nombre` varchar(100)
,`idmarca` int(11)
,`nombmarca` varchar(100)
,`idcategoria` int(11)
,`nombcategoria` varchar(100)
,`idproducto` int(11)
,`nombproducto` varchar(100)
,`disponible` float
,`unidmed` varchar(50)
);
