-- phpMyAdmin SQL Dump
-- version 4.6.2
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 08-11-2016 a las 15:40:08
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
CREATE DATABASE IF NOT EXISTS `app_ares` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `app_ares`;

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
(1, 28, 1, 65),
(2, 29, 1, 70),
(3, 50, 1, 5),
(4, 28, 2, 29),
(5, 6, 1, 11),
(6, 29, 2, 13),
(7, 50, 2, 0.5),
(8, 6, 2, 25);

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
(8, 50, 1);

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
(2, 29, 1, 45, '2016-10-06'),
(8, 28, 1, 20, '2016-10-06'),
(12, 28, 1, 25, '2016-10-06'),
(14, 28, 1, 10, '2016-10-06'),
(15, 29, 1, 40, '2016-10-06'),
(16, 50, 1, 7, '2016-10-06'),
(17, 29, 1, 13, '2016-10-08'),
(18, 6, 1, 36, '2016-10-08');

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
(13, 1, 2, 29, 15, '2016-10-08', 1),
(14, 1, 2, 50, 2, '2016-10-08', 1),
(15, 1, 2, 6, 10, '2016-10-08', 1),
(16, 1, 2, 6, 15, '2016-10-08', 1),
(17, 1, 2, 29, 3, '2016-10-08', 1);

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
(12, '20161021-0001', 3, 52000, 'Odaly Fernández', 2, NULL, '2016-10-21', '16:26:20', 2),
(13, '20161021-0002', 3, 0, 'Maria Lugo', 1, NULL, '2016-10-21', '16:29:23', 2),
(14, '20161101-0001', 3, 0, NULL, 1, NULL, '2016-11-01', '16:53:12', 2);

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
  `imagen` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT '/img/productos/default.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `idcategoria`, `idmarca`, `nombre`, `unidadmedidaventas`, `preciounidad`, `unidadmedidaalmacen`, `relacionunidad`, `imagen`) VALUES
(1, 1, 7, 'Producto 1', 3, 500, 2, 3, '/img/productos/default.png'),
(3, 1, 7, 'Queso Cherrito Chevré', 3, 500, 2, 1, '/img/productos/quesos/queso_cerrito_chevre.jpg'),
(4, 3, 7, 'Producto 3', 3, 12400, 2, 2, '/img/productos/default.png'),
(5, 3, 7, 'Producto de Prueba', 4, 4560, 2, 1, '/img/productos/default.png'),
(6, 1, 7, 'Prueba', 2, 425, 2, 3, '/img/productos/default.png'),
(27, 4, 7, 'BOLOGNA ALIÑADA', 3, 1000, 2, 3, '/img/productos/default.png'),
(28, 4, 1, 'BOLOGNA DE POLLO PL', 3, 1000, 2, 3, '/img/productos/default.png'),
(33, 6, 2, 'CHORIFRITO OM 400 GR', 4, 1000, 4, 1, '/img/productos/default.png'),
(34, 6, 8, 'CHORIZO AHUMADO BULK  MONTS', 3, 1000, 2, 4, '/img/productos/default.png'),
(35, 6, 8, 'CHORIZO AHUMADO BULK MONT A/S', 3, 1000, 2, 4, '/img/productos/default.png'),
(36, 6, 7, 'CHORIZO C/AJO', 3, 1000, 2, 4, '/img/productos/default.png'),
(37, 6, 7, 'CHORIZO CERDO PICANTE', 3, 1000, 2, 5, '/img/productos/default.png'),
(38, 6, 8, 'CHORIZO COCIDO CON AJO MONTS', 3, 1000, 2, 4, '/img/productos/default.png'),
(44, 6, 9, 'CHORIZO ESPAÑOL VELA ALPINO', 4, 1000, 4, 1, '/img/productos/default.png'),
(45, 17, 7, 'CHULETA AHUMADA', 3, 1000, 2, 15, '/img/productos/default.png'),
(46, 17, 7, 'COPPA', 3, 1000, 2, 0.8, '/img/productos/default.png'),
(48, 17, 7, 'CUAJADA', 4, 1000, 4, 1, '/img/productos/default.png'),
(49, 17, 2, 'DELICIA DE JAMON Y QUESO OM 160GR', 4, 1000, 4, 1, '/img/productos/default.png'),
(50, 7, 14, 'ESPALDA AHUMADA SHOULDER AMERICA', 3, 1000, 2, 4.5, '/img/productos/default.png'),
(51, 17, 10, '', 3, 1000, 2, 0.7, '/img/productos/default.png'),
(52, 7, 2, 'JAMON AHUMADO OM', 3, 1000, 2, 4.5, '/img/productos/default.png'),
(53, 7, 7, 'JAMON AHUMADO Q  CARNE', 3, 1000, 2, 4.5, '/img/productos/default.png'),
(54, 7, 5, 'JAMON AHUMADO SELVA NEGRA BELILLA', 3, 1000, 2, 4.5, '/img/productos/default.png'),
(55, 7, 3, 'JAMON AHUMADO SERVIPORK', 3, 1000, 2, 4.5, '/img/productos/default.png'),
(56, 7, 5, 'JAMON AHUMADO T/ SHOULDER BELILLA', 3, 1000, 2, 4.5, '/img/productos/default.png'),
(57, 7, 6, 'JAMON COCIDO PREMIER HERMO', 3, 1000, 2, 6, '/img/productos/default.png'),
(58, 7, 2, 'JAMON COCIDO OM', 3, 1000, 2, 6, '/img/productos/default.png'),
(59, 7, 11, 'JAMON DE ESPALDA AHUMADO T/SHOULDER VIGOR', 3, 1000, 2, 6, '/img/productos/default.png'),
(60, 7, 12, 'JAMON DE ESPALDA ARICHUNA KG', 3, 1000, 2, 6, '/img/productos/default.png'),
(61, 7, 12, 'JAMON DE ESPALDA T/SHOULDER ARI', 3, 1000, 2, 6, '/img/productos/default.png'),
(62, 7, 13, 'JAMON DE PIERNA ALIMEX  COCIDO', 3, 1000, 2, 6, '/img/productos/default.png'),
(63, 7, 14, 'JAMON DE PIERNA AMERICA', 3, 1000, 2, 6, '/img/productos/default.png'),
(64, 7, 12, 'JAMON DE PIERNA ARICHUNA SUPERIOR', 3, 1000, 2, 6, '/img/productos/default.png'),
(65, 7, 15, 'JAMON DE PIERNA ESTANDAR FIESTA', 3, 1000, 2, 6, '/img/productos/default.png'),
(66, 7, 1, 'JAMON DE PIERNA ESTANDAR PL', 3, 1000, 2, 6, '/img/productos/default.png'),
(67, 7, 6, 'JAMON DE PIERNA HERMO SUPERIOR', 3, 1000, 2, 6, '/img/productos/default.png'),
(68, 7, 8, 'JAMON DE PIERNA MONTS', 3, 1000, 2, 6, '/img/productos/default.png'),
(69, 7, 1, 'JAMON DE PIERNA PL', 3, 1000, 2, 6, '/img/productos/default.png'),
(70, 7, 3, 'JAMON DE PIERNA SERVIPORK', 3, 1000, 2, 6, '/img/productos/default.png'),
(71, 7, 11, 'JAMON DE PIERNA VIGOR', 3, 1000, 2, 6, '/img/productos/default.png'),
(72, 7, 7, 'JAMON FRIO CARNES', 3, 1000, 2, 6, '/img/productos/default.png'),
(134, 1, 7, 'QUESO SEMIGRASO', 3, 4278, 2, 1, '/img/productos/default.png'),
(145, 17, 7, 'MOZARELLA PAISA', 3, 3870, 2, 1, '/img/productos/default.png'),
(151, 17, 7, 'QUESO AREPERO', 3, 2323, 2, 1, '/img/productos/default.png'),
(152, 1, 7, 'QUESO URUGUAYO', 3, 3330, 2, 1, '/img/productos/default.png'),
(154, 17, 7, 'QUESO DURO ARTESANAL', 3, 3312, 2, 1, '/img/productos/default.png'),
(155, 17, 7, 'QUESO SEMI DURO', 3, 3640, 2, 1, '/img/productos/default.png'),
(159, 17, 7, 'QUESO MADURADO CONCHA ROJA', 3, 4472, 2, 1, '/img/productos/default.png'),
(174, 17, 7, 'QUESO MADURADO CONCHA NEGRA', 3, 4148, 2, 1, '/img/productos/default.png'),
(206, 17, 7, 'JAMON DE PIERNA SERVIPORK', 3, 5077, 2, 1, '/img/productos/default.png'),
(211, 17, 7, 'QUESO CACHAPERO', 3, 5850, 2, 1, '/img/productos/default.png'),
(213, 17, 7, 'MOZARELLA 500GR TUBBING', 3, 2854, 2, 1, '/img/productos/default.png'),
(214, 17, 7, 'QUESO PARMESANO RALLADO 5 KG', 3, 57280, 2, 1, '/img/productos/default.png'),
(217, 6, 7, 'CHORIZO CERDO PICANTE', 3, 5023, 2, 1, '/img/productos/default.png'),
(218, 15, 7, 'SALCHICHA C FINAS HIERBAS', 3, 9244, 2, 1, '/img/productos/default.png'),
(219, 6, 8, 'CHORIZO AHUMADO BULK  MONTS', 3, 5549, 2, 1, '/img/productos/default.png'),
(220, 5, 8, 'CHISTORRA A/S MONTSERRATINA', 4, 9682, 4, 1, '/img/productos/default.png'),
(228, 17, 7, 'MORTADELA ESPECIAL 1KG ARICHUNA', 3, 2730, 2, 1, '/img/productos/default.png'),
(229, 17, 7, 'GUASACACA REZEPT 310', 3, 700, 2, 1, '/img/productos/default.png'),
(239, 15, 1, 'SALCHICHA POLACA  PL DELI 450GR', 3, 3824, 2, 1, '/img/productos/default.png'),
(240, 17, 7, 'POLLO ENTERO', 3, 1893, 2, 1, '/img/productos/default.png'),
(271, 4, 7, 'BOLOGNA DE POLLO PL', 3, 3567, 2, 1, '/img/productos/default.png'),
(273, 4, 7, 'BOLOGNA ALIÑADA', 3, 2640, 2, 1, '/img/productos/default.png'),
(287, 4, 3, 'BOLOGNA DE POLLO SERVIPORK  CON QUESO', 3, 1210, 2, 3, '/img/productos/default.png'),
(289, 4, 7, 'BOLOGNA DE RES', 3, 1540, 2, 3, '/img/productos/default.png'),
(290, 17, 7, 'JAMON DE PIERNA ESTANDAR PL', 3, 5495, 2, 1, '/img/productos/default.png'),
(292, 17, 7, 'CHULETA AHUMADA', 3, 2340, 2, 1, '/img/productos/default.png'),
(293, 17, 7, 'QUESO PECORINO C/P', 3, 11473, 2, 1, '/img/productos/default.png'),
(297, 17, 7, 'QUESO PECORINO S/P', 3, 10935, 2, 1, '/img/productos/default.png'),
(298, 17, 7, 'SALCHICHON NAPOLI  ALPINO', 3, 17002, 2, 1, '/img/productos/default.png'),
(299, 17, 7, 'SALCHICHON MILANO', 3, 14133, 2, 1, '/img/productos/default.png'),
(300, 17, 7, 'SALAMI', 3, 13836, 2, 1, '/img/productos/default.png'),
(302, 17, 7, 'CHORIZO ESPAÑOL VELA ALPINO', 3, 18547, 2, 1, '/img/productos/default.png'),
(304, 17, 7, 'PECHUGA DE PAVO BANQUETE', 3, 2790, 2, 1, '/img/productos/default.png'),
(309, 17, 7, 'PECHUGA DE POLLO PL', 3, 9046, 2, 1, '/img/productos/default.png'),
(311, 15, 12, 'SALCHICHA COCIDA T/ BOLOGNA ARICHUNA', 3, 2642, 2, 1, '/img/productos/default.png'),
(313, 17, 7, 'JAMON DE PIERNA ESTANDAR FIESTA', 3, 5702, 2, 1, '/img/productos/default.png'),
(317, 16, 7, 'TOCINETA', 3, 5796, 2, 1, '/img/productos/default.png'),
(322, 17, 7, 'QUESO DE CABRA', 3, 3450, 2, 1, '/img/productos/default.png'),
(323, 17, 7, 'PECHUGA DE PAVO AHUMADO MONTS', 3, 10896, 2, 1, '/img/productos/default.png'),
(326, 17, 7, 'MORTADELA EXTRA TAPARA HERMO-OM', 3, 4656, 2, 1, '/img/productos/default.png'),
(333, 17, 7, 'QUESO FRAILES FLOR DE ARACUA', 3, 9189, 2, 1, '/img/productos/default.png'),
(334, 17, 7, 'QUESO GUAYANES', 3, 3825, 2, 1, '/img/productos/default.png'),
(335, 17, 7, 'GUINDAS MARRASQUINO ROJAS', 3, 6594, 2, 1, '/img/productos/default.png'),
(342, 17, 7, 'QUESO MOZARELLA PARAMO', 3, 3450, 2, 1, '/img/productos/default.png'),
(343, 1, 7, 'QUESO TELITA', 3, 3658, 2, 1, '/img/productos/default.png'),
(344, 17, 7, 'QUESO MOZARELLA', 3, 3588, 2, 1, '/img/productos/default.png'),
(345, 17, 7, 'JAMON VISKING MONT', 3, 0, 2, 1, '/img/productos/default.png'),
(346, 7, 12, 'JAMON DE ESPALDA T/SHOULDER ARI', 3, 4500, 2, 1, '/img/productos/default.png'),
(347, 17, 7, 'PECHUGA DE PAVO SERVIPORK', 3, 5871, 2, 1, '/img/productos/default.png'),
(351, 17, 7, 'PECHUGA DE POLLO SERVIPORK', 3, 1940, 2, 1, '/img/productos/default.png'),
(357, 17, 7, 'SALCHICHON TIPO ESPAÑOL', 3, 5225, 2, 1, '/img/productos/default.png'),
(359, 17, 7, 'PEPPERONI', 3, 5498, 2, 1, '/img/productos/default.png'),
(362, 17, 7, 'ROAST BEEF', 3, 6740, 2, 1, '/img/productos/default.png'),
(363, 17, 7, 'QUESO PROVOLETTA', 3, 5244, 2, 1, '/img/productos/default.png'),
(364, 17, 7, 'JAMON SERRANO', 3, 11880, 2, 1, '/img/productos/default.png'),
(366, 17, 7, 'QUESO AHUMADO LEÑADOR', 3, 9289, 2, 1, '/img/productos/default.png'),
(375, 17, 7, 'QUESO MANCHEGO', 3, 6910, 2, 1, '/img/productos/default.png'),
(376, 17, 7, 'QUESO AZUL PAISA', 3, 5654, 2, 1, '/img/productos/default.png'),
(378, 17, 7, 'NUGGETS INSTITUCIONAL CORRAL KG', 3, 5148, 2, 1, '/img/productos/default.png'),
(380, 17, 7, 'PECHUGA DE PAVO TUNAL', 3, 2440, 2, 1, '/img/productos/default.png'),
(381, 17, 7, 'QUESO CREMA PAISA- GABY', 3, 4312, 2, 1, '/img/productos/default.png'),
(382, 17, 7, 'PECHUGA DE PAVO MONTSERRATINA', 3, 6515, 2, 1, '/img/productos/default.png'),
(383, 1, 7, 'QUESO TENTACION', 3, 9289, 2, 1, '/img/productos/default.png'),
(386, 17, 7, 'QUESO PARMESANO', 3, 12365, 2, 1, '/img/productos/default.png'),
(387, 17, 7, 'JAMON DE PIERNA VIGOR', 3, 4892, 2, 1, '/img/productos/default.png'),
(389, 17, 7, 'QUESO DE AÑO MARACAY', 3, 1240, 2, 1, '/img/productos/default.png'),
(392, 17, 7, 'JAMON DE PIERNA ARICHUNA SUPERIOR', 3, 4380, 2, 1, '/img/productos/default.png'),
(394, 17, 7, 'PECHUGA DE POLLO AHUMADO MONTS', 3, 5200, 2, 1, '/img/productos/default.png'),
(396, 14, 7, 'RICOTTA PAISA', 3, 1984, 2, 1, '/img/productos/default.png'),
(398, 17, 7, 'JAMON DE PIERNA PL', 3, 7138, 2, 1, '/img/productos/default.png'),
(399, 17, 7, 'LOMO EMBUCHADO', 3, 6410, 2, 1, '/img/productos/default.png'),
(401, 17, 7, 'COPPA', 3, 23207, 2, 1, '/img/productos/default.png'),
(404, 17, 7, 'MORTADELA TAPARA OM', 3, 0, 2, 1, '/img/productos/default.png'),
(405, 17, 7, 'PECHUGA DE POLLO CORRAL', 3, 6815, 2, 1, '/img/productos/default.png'),
(407, 7, 5, 'JAMON AHUMADO T/ SHOULDER BELILLA', 3, 3364, 2, 1, '/img/productos/default.png'),
(408, 17, 7, 'CUAJADA', 3, 55200, 2, 1, '/img/productos/default.png'),
(410, 17, 7, 'FILETES DE ANCHOAS BOQUEMAR', 3, 30665, 2, 1, '/img/productos/default.png'),
(411, 7, 13, 'JAMON DE PIERNA ALIMEX  COCIDO', 3, 2870, 2, 1, '/img/productos/default.png'),
(413, 1, 7, 'QUESO TORONDOY', 3, 8541, 2, 1, '/img/productos/default.png'),
(416, 17, 7, 'PECHUGA DE PAVO LOUIS RICH', 3, 3590, 2, 1, '/img/productos/default.png'),
(417, 17, 7, 'QUESO PALMITA', 3, 3726, 2, 1, '/img/productos/default.png'),
(418, 7, 2, 'JAMON AHUMADO OM', 3, 8988, 2, 1, '/img/productos/default.png'),
(419, 5, 7, 'CHISTORRA BULK', 4, 9482, 4, 4, '/img/productos/default.png'),
(420, 6, 8, 'CHORIZO AHUMADO BULK MONT A/S', 3, 5708, 2, 1, '/img/productos/default.png'),
(421, 17, 7, 'PECHUGA DE PAVO MONTS', 3, 4560, 2, 1, '/img/productos/default.png'),
(422, 17, 7, 'QUESO MOZZARELA NAPOLITANA', 3, 6866, 2, 1, '/img/productos/default.png'),
(423, 17, 7, 'JAMON DE PIERNA MONTS', 3, 5031, 2, 1, '/img/productos/default.png'),
(424, 7, 2, 'JAMON COPCIDO OM', 3, 5709, 2, 1, '/img/productos/default.png'),
(426, 17, 7, 'MORTADELA EXTRA PLUMROSE', 3, 1130, 2, 1, '/img/productos/default.png'),
(427, 17, 7, 'MORTADELA EXTRA ARICHUNA', 3, 2060, 2, 1, '/img/productos/default.png'),
(428, 7, 3, 'JAMON AHUMADO SERVIPORK', 3, 2150, 2, 1, '/img/productos/default.png'),
(429, 6, 7, 'CHORIZO C/AJO', 3, 3964, 2, 1, '/img/productos/default.png'),
(432, 17, 7, 'LOMO AHUMADO', 3, 5542, 2, 1, '/img/productos/default.png'),
(434, 17, 7, 'PECHUGA DE PAVO ALPINO', 3, 2660, 2, 1, '/img/productos/default.png'),
(437, 7, 7, 'JAMON AHUMADO Q  CARNE', 3, 1890, 2, 1, '/img/productos/default.png'),
(438, 17, 7, 'MILANESA INSTITUCIONAL CORRAL KG', 3, 46773, 2, 1, '/img/productos/default.png'),
(442, 17, 7, 'JAMON DE PIERNA HERMO SUPERIOR', 3, 4328, 2, 1, '/img/productos/default.png'),
(445, 17, 7, 'JAMON IBERICO', 3, 1950, 2, 1, '/img/productos/default.png'),
(446, 17, 7, 'PECHUGA DE POLLO IBERICO', 3, 6096, 2, 1, '/img/productos/default.png'),
(451, 17, 7, 'HAMBURPOLLO KG CORRAL', 3, 6507, 2, 1, '/img/productos/default.png'),
(452, 17, 7, 'QUESO CHEDDAR', 3, 6030, 2, 1, '/img/productos/default.png'),
(453, 17, 7, 'MORCILLA CON ARROZ Y CEBOLLA PICANTE MONTS', 3, 3524, 2, 1, '/img/productos/default.png'),
(455, 17, 7, 'SALCHICHON TIPO FUET MONTS', 3, 6830, 2, 1, '/img/productos/default.png'),
(456, 17, 7, 'PECHUGA DE PAVO PL', 3, 10136, 2, 1, '/img/productos/default.png'),
(458, 17, 7, 'PECHUGA DE PAVO PREMIER', 3, 6976, 2, 1, '/img/productos/default.png'),
(460, 16, 7, 'TOCINETA PL', 3, 2189, 2, 1, '/img/productos/default.png'),
(461, 17, 7, 'QUESO MARIBO', 3, 8658, 2, 1, '/img/productos/default.png'),
(462, 17, 7, 'GUINDAS MARRASQUINO VERDE', 3, 11300, 2, 1, '/img/productos/default.png'),
(463, 17, 7, 'PECHUGA DE POLLO PREMIER', 3, 5929, 2, 1, '/img/productos/default.png'),
(472, 17, 7, 'COSTILLA PRE-COCIDA BBQ', 3, 2305, 2, 1, '/img/productos/default.png'),
(484, 7, 6, 'JAMON COCIDO PREMIER HERMO', 3, 4331, 2, 1, '/img/productos/default.png'),
(488, 17, 7, 'PECHUGA DE POLLO MONTSERRATINA', 3, 5773, 2, 1, '/img/productos/default.png'),
(493, 17, 7, 'PECHUGA DE POLLO FIESTA', 3, 2060, 2, 1, '/img/productos/default.png'),
(494, 17, 7, 'JAMON FRIO CARNES', 3, 1025, 2, 1, '/img/productos/default.png'),
(496, 17, 7, 'PECHUGA DE PAVO GIACOMELLO', 3, 2350, 2, 1, '/img/productos/default.png'),
(507, 7, 14, '', 3, 4777, 2, 1, '/img/productos/default.png'),
(509, 17, 7, 'PECHUGA VISKING S TINA', 3, 5564, 2, 1, '/img/productos/default.png'),
(513, 7, 11, 'JAMON DE ESPALDA AHUMADO T/SHOULDER VIGOR', 3, 4213, 2, 1, '/img/productos/default.png'),
(514, 15, 10, 'SALCHICHA ECONOMICA CORRAL', 3, 3621, 2, 1, '/img/productos/default.png'),
(516, 7, 5, 'JAMON AHUMADO SELVA NEGRA BELILLA', 3, 4799, 2, 1, '/img/productos/default.png'),
(517, 7, 12, 'JAMON DE ESPALDA ARICHUNA KG', 3, 3311, 2, 1, '/img/productos/default.png'),
(518, 17, 7, 'ESPALDA AHUMADA SHOULDER AMERICA', 3, 4464, 2, 1, '/img/productos/default.png'),
(738, 17, 7, 'QUESO BOOM CHEESE', 3, 454, 2, 1, '/img/productos/default.png'),
(739, 17, 7, 'QUESO CREMA FINLANDIA', 3, 454, 2, 1, '/img/productos/default.png'),
(778, 17, 7, 'JAMON ENDIABLADO PLUMROSE 60GR', 3, 332, 2, 1, '/img/productos/default.png'),
(779, 17, 7, 'JAMON ENDIABLADO PLUMROSE 100GR', 3, 535, 2, 1, '/img/productos/default.png'),
(780, 17, 7, 'JAMON ENDIABLADO PL 115GR LATA', 3, 535, 2, 1, '/img/productos/default.png'),
(781, 15, 7, 'SALCHICHAS TIPO WIENERS PL 225 GR', 3, 1996, 2, 1, '/img/productos/default.png'),
(782, 15, 7, 'SALCHICHAS TIPO WIENERS PL 450 GR', 3, 3802, 2, 1, '/img/productos/default.png'),
(783, 15, 1, 'SALCHICHA WIENER PL 800GR', 3, 5827, 2, 1, '/img/productos/default.png'),
(784, 17, 7, 'MORTADELA ESPECIAL PL 1 KG', 3, 2781, 2, 1, '/img/productos/default.png'),
(785, 16, 7, 'TOCINETA REBANADA PL 300GR A/S', 3, 2253, 2, 1, '/img/productos/default.png'),
(786, 15, 15, 'SALCHICHAS T VIENA FIESTA 450 GR', 3, 3165, 2, 1, '/img/productos/default.png'),
(787, 15, 7, 'SALCHICHAS T/VIENA FIESTA 800 GR', 3, 4343, 2, 1, '/img/productos/default.png'),
(788, 15, 7, 'SALCHICHAS COCIDAS DE POLLO ECONOMICAS 450GR', 3, 3164, 2, 1, '/img/productos/default.png'),
(789, 15, 15, 'SALCHICHAS COCIDAS DE POLLO ECONOMICA FIESTA 800GR', 3, 1893, 2, 1, '/img/productos/default.png'),
(818, 16, 7, 'TOCINETA A/S OSCAR M', 3, 2371, 2, 1, '/img/productos/default.png'),
(821, 17, 7, 'DELICIA DE JAMON Y QUESO OM 160GR', 3, 1445, 2, 1, '/img/productos/default.png'),
(822, 15, 2, 'SALCHCIHAS SUPERIOR T WIENERS OM 225G', 3, 1374, 2, 1, '/img/productos/default.png'),
(823, 17, 7, 'SALCHICHAS T/ WIENERS 225GR OM', 3, 1905, 2, 1, '/img/productos/default.png'),
(824, 15, 7, 'SALCHICHAS COCIDAS SUPERIOR TIPO WIENERS 800GR', 3, 5144, 2, 1, '/img/productos/default.png'),
(825, 15, 2, 'SALCHICHAS SUPERIOR TIPO WIENERS OM 450GR', 3, 3604, 2, 1, '/img/productos/default.png'),
(826, 6, 2, 'CHORIFRITO OM 400 GR', 3, 3161, 2, 1, '/img/productos/default.png'),
(827, 17, 7, 'JAMON ENDIABLADO OM 50 GR', 3, 310, 2, 1, '/img/productos/default.png'),
(828, 17, 7, 'JAMON ENDIABLADO OM 100 GR', 3, 750, 2, 1, '/img/productos/default.png'),
(889, 17, 7, 'SUERO DE LECHE PICANTE FUERTE 162GR', 3, 568, 2, 1, '/img/productos/default.png'),
(928, 17, 7, 'QUESO CREMA  200 PAISA', 3, 1120, 2, 1, '/img/productos/default.png'),
(929, 17, 7, 'QUESO CREMA DIP AJO PAISA 200 GR', 3, 820, 2, 1, '/img/productos/default.png'),
(931, 17, 7, 'QUESO CREMA DIP TOCINETA PAISA 200 GR', 3, 820, 2, 1, '/img/productos/default.png'),
(1013, 17, 7, 'GUASACACA CRIOLLA 155GR EL COCINERITO', 3, 352, 2, 1, '/img/productos/default.png'),
(1014, 17, 7, 'GUASACASA CRIOLLA EL COCINERITO 310 GR', 3, 701, 2, 1, '/img/productos/default.png'),
(1015, 17, 7, 'GUASACACA PICANTE EL COCINERITO 155GR', 3, 376, 2, 1, '/img/productos/default.png'),
(1016, 17, 7, 'GUASACACA PICANTE EL COCINERITO 310 GR', 3, 709, 2, 1, '/img/productos/default.png'),
(1024, 17, 7, 'SALCHIPOLLO 450GR 20 UND', 3, 3734, 2, 1, '/img/productos/default.png'),
(1032, 17, 7, 'GUASACACA PICANTE REZ. 155GR', 3, 376, 2, 1, '/img/productos/default.png'),
(1035, 17, 7, 'GUASACACA PICANTE 310 GR REZEPT', 3, 462, 2, 1, '/img/productos/default.png'),
(1037, 17, 7, 'GUASACACA CRIOLLA REZEPT 155 GR', 3, 352, 2, 1, '/img/productos/default.png'),
(1038, 17, 7, 'GUASACACA CRIOLLA REZEPT 310 GR', 3, 432, 2, 1, '/img/productos/default.png'),
(1052, 17, 7, 'QUESO CREMA GABY', 3, 1127, 2, 1, '/img/productos/default.png'),
(1053, 15, 6, 'SALCHICHAS T VIENA HERMO 450 GR', 3, 1204, 2, 1, '/img/productos/default.png'),
(1054, 17, 7, 'SALCHICHAS T WIENERS HERMO KIDS 450 GR', 3, 1636, 2, 1, '/img/productos/default.png'),
(1184, 17, 7, 'QUESO DE AÑO  FRITZ 180 GR', 3, 1643, 2, 1, '/img/productos/default.png'),
(1256, 17, 7, 'CARNE DE HAMBURGUESA QUEEN 200GR', 3, 347, 2, 1, '/img/productos/default.png'),
(1257, 17, 7, 'CARNE DE HAMBURGUESA QUEEN 450GR', 3, 705, 2, 1, '/img/productos/default.png'),
(1314, 17, 7, 'QUESO PARMESANO RESCA 180GR', 3, 1895, 2, 1, '/img/productos/default.png'),
(1315, 17, 7, 'QUESO DE AÑO 180GR RESCA', 3, 955, 2, 1, '/img/productos/default.png'),
(1436, 14, 7, 'RICOTA LIGH 1K INLACA', 3, 1430, 2, 1, '/img/productos/default.png'),
(1445, 14, 7, 'RICOTTA TUBBING PAISA 250 GR', 3, 440, 2, 1, '/img/productos/default.png'),
(1511, 17, 7, 'MORTADELA FONTANA 1 KG', 3, 3264, 2, 1, '/img/productos/default.png'),
(1546, 17, 7, 'FILETES DE ANCHOA MEDITERRANEO 200GR', 3, 1912, 2, 1, '/img/productos/default.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos_x_pedido`
--

DROP TABLE IF EXISTS `productos_x_pedido`;
CREATE TABLE `productos_x_pedido` (
  `pedido` int(11) NOT NULL,
  `producto` int(11) NOT NULL,
  `cantidad` float NOT NULL,
  `subtotal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `productos_x_pedido`
--

INSERT INTO `productos_x_pedido` (`pedido`, `producto`, `cantidad`, `subtotal`) VALUES
(10, 6, 15, 6375),
(1, 28, 25, 25000),
(8, 29, 10, 10000),
(1, 6, 15, 6375),
(11, 28, 1, 1000),
(11, 29, 1, 1000),
(11, 50, 1.5, 1500),
(12, 28, 2, 2000),
(12, 29, 5, 5000),
(12, 50, 45, 45000);

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
(2, 'yandex', 'bexandy@yandex.com', 'Pedro Pérez', '$2y$14$a2ArD8YHxqLS60.0K/gC.uojf2c8z0tApIyoCE6kQ7yW6qDxXv0Wu', '1'),
(3, 'admin', 'admin@tucorreo.com', 'Simón Pineda', '$2y$14$HmE5FZgHfRpvJiYvGkZYSukzhyssDVn9rIs64yr6b55hcaCvWYllC', '1'),
(4, 'emilio', 'emilio@correo.com', 'Emilio Rodriguez', '$2y$14$.0/FMrLCwQKBsPZqln2H5OJ8DA0YIzEQ.R6iAVEU9H9juqaMZ6iLW', '1'),
(5, 'jesus', 'jesus@tucorreo.com', NULL, '$2y$14$/kddeLzLG/pC4UiY8sZ4relHS0pdxz1Z1j5BrqqUYX3wOqU/.t/0S', '1');

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

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `almacen`
--
ALTER TABLE `almacen`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `disponibilidad_x_almacen`
--
ALTER TABLE `disponibilidad_x_almacen`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `disponiblidad_productos`
--
ALTER TABLE `disponiblidad_productos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `estatus_pedido`
--
ALTER TABLE `estatus_pedido`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ingreso_almacen`
--
ALTER TABLE `ingreso_almacen`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `marca`
--
ALTER TABLE `marca`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `merma_x_almacen`
--
ALTER TABLE `merma_x_almacen`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `movimiento_almacen`
--
ALTER TABLE `movimiento_almacen`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `permisos`
--
ALTER TABLE `permisos`
  ADD PRIMARY KEY (`id_permiso`);

--
-- Indices de la tabla `permisos_x_roles`
--
ALTER TABLE `permisos_x_roles`
  ADD PRIMARY KEY (`id_permiso`,`id_role`),
  ADD KEY `id_role` (`id_role`);

--
-- Indices de la tabla `permisos_x_usuarios`
--
ALTER TABLE `permisos_x_usuarios`
  ADD PRIMARY KEY (`id_permiso`,`id_usuario`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idcategoria` (`idcategoria`),
  ADD KEY `unidadmedidaventas` (`unidadmedidaventas`),
  ADD KEY `unidadmedidaalmacen` (`unidadmedidaalmacen`);

--
-- Indices de la tabla `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_57698A6AB8C2FD88` (`roleId`),
  ADD KEY `IDX_57698A6A727ACA70` (`parent_id`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id_role`);

--
-- Indices de la tabla `stickynotes`
--
ALTER TABLE `stickynotes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`);

--
-- Indices de la tabla `task_item`
--
ALTER TABLE `task_item`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tipo_almacen`
--
ALTER TABLE `tipo_almacen`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `unidad_medida`
--
ALTER TABLE `unidad_medida`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_1483A5E9E7927C74` (`email`),
  ADD UNIQUE KEY `UNIQ_1483A5E9F85E0677` (`username`);

--
-- Indices de la tabla `user_role_linker`
--
ALTER TABLE `user_role_linker`
  ADD PRIMARY KEY (`user_id`,`role_id`),
  ADD KEY `IDX_61117899A76ED395` (`user_id`),
  ADD KEY `IDX_61117899D60322AC` (`role_id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `almacen`
--
ALTER TABLE `almacen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT de la tabla `disponibilidad_x_almacen`
--
ALTER TABLE `disponibilidad_x_almacen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de la tabla `disponiblidad_productos`
--
ALTER TABLE `disponiblidad_productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de la tabla `estatus_pedido`
--
ALTER TABLE `estatus_pedido`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `ingreso_almacen`
--
ALTER TABLE `ingreso_almacen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT de la tabla `marca`
--
ALTER TABLE `marca`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT de la tabla `merma_x_almacen`
--
ALTER TABLE `merma_x_almacen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `movimiento_almacen`
--
ALTER TABLE `movimiento_almacen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT de la tabla `permisos`
--
ALTER TABLE `permisos`
  MODIFY `id_permiso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1547;
--
-- AUTO_INCREMENT de la tabla `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `stickynotes`
--
ALTER TABLE `stickynotes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `task_item`
--
ALTER TABLE `task_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `tipo_almacen`
--
ALTER TABLE `tipo_almacen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `unidad_medida`
--
ALTER TABLE `unidad_medida`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `permisos_x_roles`
--
ALTER TABLE `permisos_x_roles`
  ADD CONSTRAINT `permisos_x_roles_ibfk_1` FOREIGN KEY (`id_permiso`) REFERENCES `permisos` (`id_permiso`),
  ADD CONSTRAINT `permisos_x_roles_ibfk_2` FOREIGN KEY (`id_role`) REFERENCES `roles` (`id_role`);

--
-- Filtros para la tabla `role`
--
ALTER TABLE `role`
  ADD CONSTRAINT `FK_57698A6A727ACA70` FOREIGN KEY (`parent_id`) REFERENCES `role` (`id`);

--
-- Filtros para la tabla `user_role_linker`
--
ALTER TABLE `user_role_linker`
  ADD CONSTRAINT `FK_61117899A76ED395` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `FK_61117899D60322AC` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;