-- MySQL dump 10.13  Distrib 5.7.15, for Linux (i686)
--
-- Host: localhost    Database: app_ares
-- ------------------------------------------------------
-- Server version	5.7.15

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `almacen`
--

DROP TABLE IF EXISTS `almacen`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `almacen` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idtipoalmacen` int(11) NOT NULL,
  `nombre` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `almacen`
--

LOCK TABLES `almacen` WRITE;
/*!40000 ALTER TABLE `almacen` DISABLE KEYS */;
INSERT INTO `almacen` VALUES (1,1,'Depósito'),(2,2,'Tienda');
/*!40000 ALTER TABLE `almacen` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categorias`
--

DROP TABLE IF EXISTS `categorias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categorias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `imagen` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categorias`
--

LOCK TABLES `categorias` WRITE;
/*!40000 ALTER TABLE `categorias` DISABLE KEYS */;
INSERT INTO `categorias` VALUES (1,'QUESOS','/img/categorias/quesos.jpg'),(3,'Categoria 2','/img/productos/default.png'),(4,'BOLOGNAS','/img/productos/default.png'),(5,'CHISTORRAS','/img/productos/default.png'),(6,'CHORIZOS','/img/productos/default.png'),(7,'JAMONES','/img/productos/default.png'),(8,'LOMOS','/img/productos/default.png'),(9,'MANTEQUILLAS','/img/productos/default.png'),(10,'MORTADELAS','/img/productos/default.png'),(11,'PASTAS DE HIGADO','/img/productos/default.png'),(12,'PECHUGAS DE PAVO','/img/productos/default.png'),(13,'PECHUGAS DE POLLO','/img/productos/default.png'),(14,'RICOTTAS','/img/productos/default.png'),(15,'SALCHICHAS','/img/productos/default.png'),(16,'TOCINETAS','/img/productos/default.png'),(17,'OTROS','/img/productos/default.png');
/*!40000 ALTER TABLE `categorias` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `disponibilidad_x_almacen`
--

DROP TABLE IF EXISTS `disponibilidad_x_almacen`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `disponibilidad_x_almacen` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `producto` int(11) NOT NULL,
  `almacen` int(11) NOT NULL,
  `cantidad` float NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `disponibilidad_x_almacen`
--

LOCK TABLES `disponibilidad_x_almacen` WRITE;
/*!40000 ALTER TABLE `disponibilidad_x_almacen` DISABLE KEYS */;
INSERT INTO `disponibilidad_x_almacen` VALUES (1,28,1,65),(2,29,1,70),(3,50,1,5),(4,28,2,29),(5,6,1,11),(6,29,2,13),(7,50,2,0.5),(8,6,2,25);
/*!40000 ALTER TABLE `disponibilidad_x_almacen` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `disponiblidad_productos`
--

DROP TABLE IF EXISTS `disponiblidad_productos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `disponiblidad_productos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idproducto` int(11) NOT NULL,
  `disponible` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `disponiblidad_productos`
--

LOCK TABLES `disponiblidad_productos` WRITE;
/*!40000 ALTER TABLE `disponiblidad_productos` DISABLE KEYS */;
INSERT INTO `disponiblidad_productos` VALUES (1,6,1),(2,4,0),(3,5,0),(4,1,0),(5,3,0),(6,28,1),(7,29,1),(8,50,1);
/*!40000 ALTER TABLE `disponiblidad_productos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `estatus_pedido`
--

DROP TABLE IF EXISTS `estatus_pedido`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `estatus_pedido` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `msgclientes` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `msgventas` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `msgdespacho` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estatus_pedido`
--

LOCK TABLES `estatus_pedido` WRITE;
/*!40000 ALTER TABLE `estatus_pedido` DISABLE KEYS */;
INSERT INTO `estatus_pedido` VALUES (1,'ventas','Tomando el Pedido','Tomando el Pedido','Realizando Pedido'),(2,'enviado','En Cola','Enviado','Pendiente'),(3,'despacho','Atendiendo','En Despacho','Atendiendo'),(4,'finalizado','Entregado','Finalizado','Entregado'),(5,'cancelado','Cancelado','Cancelado','Cancelado');
/*!40000 ALTER TABLE `estatus_pedido` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ingreso_almacen`
--

DROP TABLE IF EXISTS `ingreso_almacen`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ingreso_almacen` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idproducto` int(11) NOT NULL,
  `idalmacen` int(11) NOT NULL,
  `cantidad` float NOT NULL,
  `fecha` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ingreso_almacen`
--

LOCK TABLES `ingreso_almacen` WRITE;
/*!40000 ALTER TABLE `ingreso_almacen` DISABLE KEYS */;
INSERT INTO `ingreso_almacen` VALUES (1,28,1,15,'2016-10-05'),(2,29,1,45,'2016-10-06'),(8,28,1,20,'2016-10-06'),(12,28,1,25,'2016-10-06'),(14,28,1,10,'2016-10-06'),(15,29,1,40,'2016-10-06'),(16,50,1,7,'2016-10-06'),(17,29,1,13,'2016-10-08'),(18,6,1,36,'2016-10-08');
/*!40000 ALTER TABLE `ingreso_almacen` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `marca`
--

DROP TABLE IF EXISTS `marca`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `marca` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `imagen` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `marca`
--

LOCK TABLES `marca` WRITE;
/*!40000 ALTER TABLE `marca` DISABLE KEYS */;
INSERT INTO `marca` VALUES (1,'PLUMROSE','img/marcas/plumrose.png'),(2,'OSCAR MAYER','img/marcas/oscar-mayer.png'),(3,'SERVIPORK','img/marcas/serivipork.png'),(4,'TACHIRA','img/marcas/tachira.png'),(5,'BELILLA','img/marcas/belilla.png'),(6,'HERMO','img/marcas/hermo.png'),(7,'SIN MARCA',''),(8,'MONTSERRATINA','/img/marca/motserratina.png'),(9,'ALPINO',''),(10,'DEL CORRAL',''),(11,'VIGOR',''),(12,'ARICHUNA',''),(13,'ALIMEX',''),(14,'AMERICA',''),(15,'FIESTA','');
/*!40000 ALTER TABLE `marca` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `merma_x_almacen`
--

DROP TABLE IF EXISTS `merma_x_almacen`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `merma_x_almacen` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idalmacen` int(11) NOT NULL,
  `idproducto` int(11) NOT NULL,
  `cantidad` float NOT NULL,
  `fecha` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `merma_x_almacen`
--

LOCK TABLES `merma_x_almacen` WRITE;
/*!40000 ALTER TABLE `merma_x_almacen` DISABLE KEYS */;
/*!40000 ALTER TABLE `merma_x_almacen` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `movimiento_almacen`
--

DROP TABLE IF EXISTS `movimiento_almacen`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `movimiento_almacen` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idalmacenmayor` int(11) NOT NULL,
  `idalmacendetal` int(11) NOT NULL,
  `idproducto` int(11) NOT NULL,
  `cantidad` float NOT NULL,
  `fecha` date NOT NULL,
  `idusuario` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `movimiento_almacen`
--

LOCK TABLES `movimiento_almacen` WRITE;
/*!40000 ALTER TABLE `movimiento_almacen` DISABLE KEYS */;
INSERT INTO `movimiento_almacen` VALUES (12,1,2,28,15,'2016-10-08',1),(13,1,2,29,15,'2016-10-08',1),(14,1,2,50,2,'2016-10-08',1),(15,1,2,6,10,'2016-10-08',1),(16,1,2,6,15,'2016-10-08',1),(17,1,2,29,3,'2016-10-08',1);
/*!40000 ALTER TABLE `movimiento_almacen` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pedidos`
--

DROP TABLE IF EXISTS `pedidos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pedidos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `codigo` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `vendedor` int(11) DEFAULT NULL,
  `preciototal` int(11) NOT NULL,
  `cliente` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `estatus` int(11) NOT NULL,
  `despachador` int(11) DEFAULT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `idalmacen` int(11) NOT NULL DEFAULT '2',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pedidos`
--

LOCK TABLES `pedidos` WRITE;
/*!40000 ALTER TABLE `pedidos` DISABLE KEYS */;
INSERT INTO `pedidos` VALUES (1,'20160922-0001',1,31375,'Carolina Bravo Castillo',4,2,'2016-09-22','15:30:00',2),(8,'20160926-0005',0,10000,'Otro Fulanito de Tal Mas',4,4,'2016-09-26','09:29:12',2),(10,'20160926-0007',0,6375,'Fulanito de Tal',4,2,'2016-09-26','09:30:39',2),(11,'20161012-0001',3,3500,'Bexandy Rodriguez',4,2,'2016-10-12','16:08:21',2),(12,'20161021-0001',3,52000,'Odaly Fernández',2,NULL,'2016-10-21','16:26:20',2),(13,'20161021-0002',3,0,'Maria Lugo',1,NULL,'2016-10-21','16:29:23',2);
/*!40000 ALTER TABLE `pedidos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permisos`
--

DROP TABLE IF EXISTS `permisos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `permisos` (
  `id_permiso` int(11) NOT NULL AUTO_INCREMENT,
  `permiso` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `nombre` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id_permiso`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permisos`
--

LOCK TABLES `permisos` WRITE;
/*!40000 ALTER TABLE `permisos` DISABLE KEYS */;
INSERT INTO `permisos` VALUES (1,'insertar_pedidos','Insertar Nuevos Pedidos'),(2,'ver_pedidos','Ver Pedidos'),(3,'modificar_pedidos','Modificar Pedidos'),(4,'borrar_pedidos','Borrar Pedidos');
/*!40000 ALTER TABLE `permisos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permisos_x_roles`
--

DROP TABLE IF EXISTS `permisos_x_roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `permisos_x_roles` (
  `id_role` int(11) NOT NULL,
  `id_permiso` int(11) NOT NULL,
  `valor` tinyint(1) NOT NULL,
  PRIMARY KEY (`id_permiso`,`id_role`),
  KEY `id_role` (`id_role`),
  CONSTRAINT `permisos_x_roles_ibfk_1` FOREIGN KEY (`id_permiso`) REFERENCES `permisos` (`id_permiso`),
  CONSTRAINT `permisos_x_roles_ibfk_2` FOREIGN KEY (`id_role`) REFERENCES `roles` (`id_role`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permisos_x_roles`
--

LOCK TABLES `permisos_x_roles` WRITE;
/*!40000 ALTER TABLE `permisos_x_roles` DISABLE KEYS */;
INSERT INTO `permisos_x_roles` VALUES (1,1,1),(2,1,0),(3,1,1),(4,1,0),(1,2,1),(2,2,1),(3,2,1),(4,2,1),(1,3,1),(2,3,1),(3,3,1),(4,3,0),(1,4,0),(2,4,0),(3,4,1),(4,4,0);
/*!40000 ALTER TABLE `permisos_x_roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permisos_x_usuarios`
--

DROP TABLE IF EXISTS `permisos_x_usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `permisos_x_usuarios` (
  `id_permiso` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `valor` int(11) NOT NULL,
  PRIMARY KEY (`id_permiso`,`id_usuario`),
  KEY `id_usuario` (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permisos_x_usuarios`
--

LOCK TABLES `permisos_x_usuarios` WRITE;
/*!40000 ALTER TABLE `permisos_x_usuarios` DISABLE KEYS */;
/*!40000 ALTER TABLE `permisos_x_usuarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `text` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `posts`
--

LOCK TABLES `posts` WRITE;
/*!40000 ALTER TABLE `posts` DISABLE KEYS */;
INSERT INTO `posts` VALUES (1,'Blog #1','Welcome to first blog post'),(2,'Blog #2','Welcome to my second blog post'),(3,'Blog #3','Welcome to my third blog post'),(4,'Blog #4','Welcome to my fourth blog post'),(5,'Blog #5','Welcome to my fifth blog post');
/*!40000 ALTER TABLE `posts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `productos`
--

DROP TABLE IF EXISTS `productos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `productos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idcategoria` int(11) NOT NULL,
  `idmarca` int(11) DEFAULT '7',
  `nombre` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `unidadmedidaventas` int(11) NOT NULL,
  `preciounidad` int(11) NOT NULL,
  `unidadmedidaalmacen` int(11) NOT NULL,
  `relacionunidad` float NOT NULL DEFAULT '1',
  `imagen` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT '/img/productos/default.png',
  PRIMARY KEY (`id`),
  KEY `idcategoria` (`idcategoria`),
  KEY `unidadmedidaventas` (`unidadmedidaventas`),
  KEY `unidadmedidaalmacen` (`unidadmedidaalmacen`)
) ENGINE=InnoDB AUTO_INCREMENT=73 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `productos`
--

LOCK TABLES `productos` WRITE;
/*!40000 ALTER TABLE `productos` DISABLE KEYS */;
INSERT INTO `productos` VALUES (1,1,7,'Producto 1',3,500,2,3,'/img/productos/default.png'),(3,1,7,'Queso Cherrito Chevré',3,500,2,1,'/img/productos/quesos/queso_cerrito_chevre.jpg'),(4,3,7,'Producto 3',3,12400,2,2,'/img/productos/default.png'),(5,3,7,'Producto de Prueba',4,4560,2,1,'/img/productos/default.png'),(6,1,7,'Prueba',2,425,2,3,'/img/productos/default.png'),(27,4,7,'BOLOGNA ALIÑADA',3,1000,2,3,'/img/productos/default.png'),(28,4,1,'BOLOGNA DE POLLO PL',3,1000,2,3,'/img/productos/default.png'),(29,4,3,'BOLOGNA DE POLLO SERVIPORK CON QUESO',3,1000,2,3,'/img/productos/default.png'),(30,4,7,'BOLOGNA DE RES',3,1000,2,3,'/img/productos/default.png'),(31,5,8,'CHISTORRA A/S MONTSERRATINA',4,1000,4,1,'/img/productos/default.png'),(32,5,7,'CHISTORRA BULK',4,1000,4,4,'/img/productos/default.png'),(33,6,2,'CHORIFRITO OM 400 GR',4,1000,4,1,'/img/productos/default.png'),(34,6,8,'CHORIZO AHUMADO BULK  MONTS',3,1000,2,4,'/img/productos/default.png'),(35,6,8,'CHORIZO AHUMADO BULK MONT A/S',3,1000,2,4,'/img/productos/default.png'),(36,6,7,'CHORIZO C/AJO',3,1000,2,4,'/img/productos/default.png'),(37,6,7,'CHORIZO CERDO PICANTE',3,1000,2,5,'/img/productos/default.png'),(38,6,8,'CHORIZO COCIDO CON AJO MONTS',3,1000,2,4,'/img/productos/default.png'),(44,6,9,'CHORIZO ESPAÑOL VELA ALPINO',4,1000,4,1,'/img/productos/default.png'),(45,17,7,'CHULETA AHUMADA',3,1000,2,15,'/img/productos/default.png'),(46,17,7,'COPPA',3,1000,2,0.8,'/img/productos/default.png'),(47,17,4,'CREMA DE LECHE TACHIRA  500 GR',4,1000,4,1,'/img/productos/default.png'),(48,17,7,'CUAJADA',4,1000,4,1,'/img/productos/default.png'),(49,17,2,'DELICIA DE JAMON Y QUESO OM 160GR',4,1000,4,1,'/img/productos/default.png'),(50,7,14,'ESPALDA AHUMADA SHOULDER AMERICA',3,1000,2,4.5,'/img/productos/default.png'),(51,17,10,'HAMBURPOLLO KG CORRAL',3,1000,2,0.7,'/img/productos/default.png'),(52,7,2,'JAMON AHUMADO OM',3,1000,2,4.5,'/img/productos/default.png'),(53,7,7,'JAMON AHUMADO Q  CARNE',3,1000,2,4.5,'/img/productos/default.png'),(54,7,5,'JAMON AHUMADO SELVA NEGRA BELILLA',3,1000,2,4.5,'/img/productos/default.png'),(55,7,3,'JAMON AHUMADO SERVIPORK',3,1000,2,4.5,'/img/productos/default.png'),(56,7,5,'JAMON AHUMADO T/ SHOULDER BELILLA',3,1000,2,4.5,'/img/productos/default.png'),(57,7,6,'JAMON COCIDO PREMIER HERMO',3,1000,2,6,'/img/productos/default.png'),(58,7,2,'JAMON COCIDO OM',3,1000,2,6,'/img/productos/default.png'),(59,7,11,'JAMON DE ESPALDA AHUMADO T/SHOULDER VIGOR',3,1000,2,6,'/img/productos/default.png'),(60,7,12,'JAMON DE ESPALDA ARICHUNA KG',3,1000,2,6,'/img/productos/default.png'),(61,7,12,'JAMON DE ESPALDA T/SHOULDER ARI',3,1000,2,6,'/img/productos/default.png'),(62,7,13,'JAMON DE PIERNA ALIMEX  COCIDO',3,1000,2,6,'/img/productos/default.png'),(63,7,14,'JAMON DE PIERNA AMERICA',3,1000,2,6,'/img/productos/default.png'),(64,7,12,'JAMON DE PIERNA ARICHUNA SUPERIOR',3,1000,2,6,'/img/productos/default.png'),(65,7,15,'JAMON DE PIERNA ESTANDAR FIESTA',3,1000,2,6,'/img/productos/default.png'),(66,7,1,'JAMON DE PIERNA ESTANDAR PL',3,1000,2,6,'/img/productos/default.png'),(67,7,6,'JAMON DE PIERNA HERMO SUPERIOR',3,1000,2,6,'/img/productos/default.png'),(68,7,8,'JAMON DE PIERNA MONTS',3,1000,2,6,'/img/productos/default.png'),(69,7,1,'JAMON DE PIERNA PL',3,1000,2,6,'/img/productos/default.png'),(70,7,3,'JAMON DE PIERNA SERVIPORK',3,1000,2,6,'/img/productos/default.png'),(71,7,11,'JAMON DE PIERNA VIGOR',3,1000,2,6,'/img/productos/default.png'),(72,7,7,'JAMON FRIO CARNES',3,1000,2,6,'/img/productos/default.png');
/*!40000 ALTER TABLE `productos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `productos_x_pedido`
--

DROP TABLE IF EXISTS `productos_x_pedido`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `productos_x_pedido` (
  `pedido` int(11) NOT NULL,
  `producto` int(11) NOT NULL,
  `cantidad` float NOT NULL,
  `subtotal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `productos_x_pedido`
--

LOCK TABLES `productos_x_pedido` WRITE;
/*!40000 ALTER TABLE `productos_x_pedido` DISABLE KEYS */;
INSERT INTO `productos_x_pedido` VALUES (10,6,15,6375),(1,28,25,25000),(8,29,10,10000),(1,6,15,6375),(11,28,1,1000),(11,29,1,1000),(11,50,1.5,1500),(12,28,2,2000),(12,29,5,5000),(12,50,45,45000);
/*!40000 ALTER TABLE `productos_x_pedido` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `role`
--

DROP TABLE IF EXISTS `role`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) DEFAULT NULL,
  `roleId` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_57698A6AB8C2FD88` (`roleId`),
  KEY `IDX_57698A6A727ACA70` (`parent_id`),
  CONSTRAINT `FK_57698A6A727ACA70` FOREIGN KEY (`parent_id`) REFERENCES `role` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `role`
--

LOCK TABLES `role` WRITE;
/*!40000 ALTER TABLE `role` DISABLE KEYS */;
INSERT INTO `role` VALUES (1,NULL,'autenticado'),(2,1,'vendedor'),(3,1,'despachador'),(4,1,'administrador'),(5,1,'cliente');
/*!40000 ALTER TABLE `role` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `roles` (
  `id_role` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id_role`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'vendedor'),(2,'despachador'),(3,'administrador'),(4,'cliente');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `task_item`
--

DROP TABLE IF EXISTS `task_item`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `task_item` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `completed` tinyint(4) NOT NULL,
  `created` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `task_item`
--

LOCK TABLES `task_item` WRITE;
/*!40000 ALTER TABLE `task_item` DISABLE KEYS */;
INSERT INTO `task_item` VALUES (1,'titulo 1',0,'2016-09-20 00:00:00'),(3,'Titulo 2',0,'2016-09-20 19:26:51');
/*!40000 ALTER TABLE `task_item` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipo_almacen`
--

DROP TABLE IF EXISTS `tipo_almacen`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipo_almacen` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipo_almacen`
--

LOCK TABLES `tipo_almacen` WRITE;
/*!40000 ALTER TABLE `tipo_almacen` DISABLE KEYS */;
INSERT INTO `tipo_almacen` VALUES (1,'Mayor'),(2,'Detal');
/*!40000 ALTER TABLE `tipo_almacen` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `unidad_medida`
--

DROP TABLE IF EXISTS `unidad_medida`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `unidad_medida` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `abreviatura` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `simbolo` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `unidad_medida`
--

LOCK TABLES `unidad_medida` WRITE;
/*!40000 ALTER TABLE `unidad_medida` DISABLE KEYS */;
INSERT INTO `unidad_medida` VALUES (2,'Piezas','Pza','Pza'),(3,'Kilogramos','Kg','Kg'),(4,'Unidades','Und','Und');
/*!40000 ALTER TABLE `unidad_medida` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_role_linker`
--

DROP TABLE IF EXISTS `user_role_linker`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_role_linker` (
  `user_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  PRIMARY KEY (`user_id`,`role_id`),
  KEY `IDX_61117899A76ED395` (`user_id`),
  KEY `IDX_61117899D60322AC` (`role_id`),
  CONSTRAINT `FK_61117899A76ED395` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  CONSTRAINT `FK_61117899D60322AC` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_role_linker`
--

LOCK TABLES `user_role_linker` WRITE;
/*!40000 ALTER TABLE `user_role_linker` DISABLE KEYS */;
INSERT INTO `user_role_linker` VALUES (1,2),(2,3),(3,4),(4,3);
/*!40000 ALTER TABLE `user_role_linker` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `displayName` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `gender` enum('1','0') COLLATE utf8_unicode_ci NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_1483A5E9E7927C74` (`email`),
  UNIQUE KEY `UNIQ_1483A5E9F85E0677` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'brodriguez','bexandy@gmail.com','Bexandy Rodríguez','$2y$14$0Zk8PHFWqeuikDDcq9BBLuxNMx2pFeUHHjmIyvD7gwDlDTXdL3KVC','1'),(2,'yandex','bexandy@yandex.com','Pedro Pérez','$2y$14$a2ArD8YHxqLS60.0K/gC.uojf2c8z0tApIyoCE6kQ7yW6qDxXv0Wu','1'),(3,'admin','admin@tucorreo.com','Simón Pineda','$2y$14$HmE5FZgHfRpvJiYvGkZYSukzhyssDVn9rIs64yr6b55hcaCvWYllC','1'),(4,'emilio','emilio@correo.com','Emilio Rodriguez','$2y$14$.0/FMrLCwQKBsPZqln2H5OJ8DA0YIzEQ.R6iAVEU9H9juqaMZ6iLW','1'),(5,'jesus','jesus@tucorreo.com',NULL,'$2y$14$/kddeLzLG/pC4UiY8sZ4relHS0pdxz1Z1j5BrqqUYX3wOqU/.t/0S','1');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `cedula` int(8) NOT NULL,
  `nombre` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `apellido` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `password` varchar(16) COLLATE utf8_unicode_ci NOT NULL,
  `foto` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `role` int(11) NOT NULL,
  `activo` tinyint(1) NOT NULL,
  `nomina` tinyint(1) NOT NULL,
  `administrador` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES (1,'bexandy',14075425,'Bexandy','Rodríguez','p3lk4x','',1,1,1,1),(2,'despachador',12345678,'Despachador','1','1234','',2,1,1,2);
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary view structure for view `view_reservado`
--

DROP TABLE IF EXISTS `view_reservado`;
/*!50001 DROP VIEW IF EXISTS `view_reservado`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `view_reservado` AS SELECT 
 1 AS `producto`,
 1 AS `idalmacen`,
 1 AS `reservado`,
 1 AS `estatus`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `vista_almacen`
--

DROP TABLE IF EXISTS `vista_almacen`;
/*!50001 DROP VIEW IF EXISTS `vista_almacen`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `vista_almacen` AS SELECT 
 1 AS `id`,
 1 AS `idtipoalmacen`,
 1 AS `nombtipoalmacen`,
 1 AS `nombre`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `vista_disponibilidad_almacen`
--

DROP TABLE IF EXISTS `vista_disponibilidad_almacen`;
/*!50001 DROP VIEW IF EXISTS `vista_disponibilidad_almacen`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `vista_disponibilidad_almacen` AS SELECT 
 1 AS `id`,
 1 AS `idalmacen`,
 1 AS `nombre`,
 1 AS `idtipoalmacen`,
 1 AS `tipoalmacen`,
 1 AS `idproducto`,
 1 AS `nombproducto`,
 1 AS `cantidad`,
 1 AS `reservado`,
 1 AS `disponible`,
 1 AS `idunidmedalmacen`,
 1 AS `unidmed`,
 1 AS `idunidmedventas`,
 1 AS `unidmeddetal`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `vista_ingresos`
--

DROP TABLE IF EXISTS `vista_ingresos`;
/*!50001 DROP VIEW IF EXISTS `vista_ingresos`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `vista_ingresos` AS SELECT 
 1 AS `id`,
 1 AS `fecha`,
 1 AS `idalmacen`,
 1 AS `nombalmacen`,
 1 AS `idproducto`,
 1 AS `nombproducto`,
 1 AS `cantidad`,
 1 AS `unidmed`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `vista_items`
--

DROP TABLE IF EXISTS `vista_items`;
/*!50001 DROP VIEW IF EXISTS `vista_items`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `vista_items` AS SELECT 
 1 AS `pedido`,
 1 AS `producto`,
 1 AS `nombproducto`,
 1 AS `unidmedprod`,
 1 AS `cantidad`,
 1 AS `subtotal`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `vista_movimientos`
--

DROP TABLE IF EXISTS `vista_movimientos`;
/*!50001 DROP VIEW IF EXISTS `vista_movimientos`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `vista_movimientos` AS SELECT 
 1 AS `id`,
 1 AS `idalmacenmayor`,
 1 AS `nombmayor`,
 1 AS `idalmacendetal`,
 1 AS `nombdetal`,
 1 AS `idproducto`,
 1 AS `nombproducto`,
 1 AS `cantidad`,
 1 AS `unidmed`,
 1 AS `fecha`,
 1 AS `idusuario`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `vista_pedidos`
--

DROP TABLE IF EXISTS `vista_pedidos`;
/*!50001 DROP VIEW IF EXISTS `vista_pedidos`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `vista_pedidos` AS SELECT 
 1 AS `id`,
 1 AS `codigo`,
 1 AS `vendedor`,
 1 AS `nombvendedor`,
 1 AS `preciototal`,
 1 AS `cliente`,
 1 AS `estatus`,
 1 AS `nombestatus`,
 1 AS `msgclientes`,
 1 AS `msgventas`,
 1 AS `msgdespacho`,
 1 AS `despachador`,
 1 AS `nombdespachador`,
 1 AS `fecha`,
 1 AS `hora`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `vista_productos`
--

DROP TABLE IF EXISTS `vista_productos`;
/*!50001 DROP VIEW IF EXISTS `vista_productos`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `vista_productos` AS SELECT 
 1 AS `id`,
 1 AS `nombre`,
 1 AS `idcategoria`,
 1 AS `nombcategoria`,
 1 AS `unidadmedidaventas`,
 1 AS `nombunidmedventas`,
 1 AS `preciounidad`,
 1 AS `unidadmedidaalmacen`,
 1 AS `nombunidmedalmacen`,
 1 AS `relacionunidad`,
 1 AS `imagen`,
 1 AS `idmarca`,
 1 AS `nombmarca`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `vista_productos_disponibles`
--

DROP TABLE IF EXISTS `vista_productos_disponibles`;
/*!50001 DROP VIEW IF EXISTS `vista_productos_disponibles`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `vista_productos_disponibles` AS SELECT 
 1 AS `id`,
 1 AS `nombre`,
 1 AS `idcategoria`,
 1 AS `nombcategoria`,
 1 AS `unidadmedidaventas`,
 1 AS `nombunidmedventas`,
 1 AS `preciounidad`,
 1 AS `unidadmedidaalmacen`,
 1 AS `nombunidmedalmacen`,
 1 AS `relacionunidad`,
 1 AS `imagen`,
 1 AS `idmarca`,
 1 AS `nombmarca`*/;
SET character_set_client = @saved_cs_client;

--
-- Final view structure for view `view_reservado`
--

/*!50001 DROP VIEW IF EXISTS `view_reservado`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_unicode_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `view_reservado` AS select `productos_x_pedido`.`producto` AS `producto`,`pedidos`.`idalmacen` AS `idalmacen`,sum(`productos_x_pedido`.`cantidad`) AS `reservado`,`pedidos`.`estatus` AS `estatus` from (`productos_x_pedido` left join `pedidos` on((`productos_x_pedido`.`pedido` = `pedidos`.`id`))) where (`pedidos`.`estatus` = 2) group by `productos_x_pedido`.`producto`,`pedidos`.`estatus`,`pedidos`.`idalmacen` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `vista_almacen`
--

/*!50001 DROP VIEW IF EXISTS `vista_almacen`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_unicode_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vista_almacen` AS select `almacen`.`id` AS `id`,`almacen`.`idtipoalmacen` AS `idtipoalmacen`,`tipo_almacen`.`nombre` AS `nombtipoalmacen`,`almacen`.`nombre` AS `nombre` from (`almacen` left join `tipo_almacen` on((`almacen`.`idtipoalmacen` = `tipo_almacen`.`id`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `vista_disponibilidad_almacen`
--

/*!50001 DROP VIEW IF EXISTS `vista_disponibilidad_almacen`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_unicode_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vista_disponibilidad_almacen` AS select `disponibilidad_x_almacen`.`id` AS `id`,`disponibilidad_x_almacen`.`almacen` AS `idalmacen`,`almacen`.`nombre` AS `nombre`,`almacen`.`idtipoalmacen` AS `idtipoalmacen`,`tipo_almacen`.`nombre` AS `tipoalmacen`,`disponibilidad_x_almacen`.`producto` AS `idproducto`,`productos`.`nombre` AS `nombproducto`,`disponibilidad_x_almacen`.`cantidad` AS `cantidad`,coalesce(`view_reservado`.`reservado`,0) AS `reservado`,(coalesce(`disponibilidad_x_almacen`.`cantidad`,0) - coalesce(`view_reservado`.`reservado`,0)) AS `disponible`,`productos`.`unidadmedidaalmacen` AS `idunidmedalmacen`,`unidmedalmacen`.`simbolo` AS `unidmed`,`productos`.`unidadmedidaventas` AS `idunidmedventas`,`unidmeddetal`.`simbolo` AS `unidmeddetal` from ((((((`disponibilidad_x_almacen` left join `almacen` on((`disponibilidad_x_almacen`.`almacen` = `almacen`.`id`))) left join `tipo_almacen` on((`almacen`.`idtipoalmacen` = `tipo_almacen`.`id`))) left join `productos` on((`disponibilidad_x_almacen`.`producto` = `productos`.`id`))) left join `unidad_medida` `unidmedalmacen` on((`productos`.`unidadmedidaalmacen` = `unidmedalmacen`.`id`))) left join `unidad_medida` `unidmeddetal` on((`productos`.`unidadmedidaventas` = `unidmeddetal`.`id`))) left join `view_reservado` on(((`disponibilidad_x_almacen`.`producto` = `view_reservado`.`producto`) and (`disponibilidad_x_almacen`.`almacen` = `view_reservado`.`idalmacen`)))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `vista_ingresos`
--

/*!50001 DROP VIEW IF EXISTS `vista_ingresos`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_unicode_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vista_ingresos` AS select `ingreso_almacen`.`id` AS `id`,`ingreso_almacen`.`fecha` AS `fecha`,`ingreso_almacen`.`idalmacen` AS `idalmacen`,`almacen`.`nombre` AS `nombalmacen`,`ingreso_almacen`.`idproducto` AS `idproducto`,`productos`.`nombre` AS `nombproducto`,`ingreso_almacen`.`cantidad` AS `cantidad`,`unidad_medida`.`simbolo` AS `unidmed` from (((`ingreso_almacen` left join `almacen` on((`ingreso_almacen`.`idalmacen` = `almacen`.`id`))) left join `productos` on((`ingreso_almacen`.`idproducto` = `productos`.`id`))) left join `unidad_medida` on((`productos`.`unidadmedidaalmacen` = `unidad_medida`.`id`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `vista_items`
--

/*!50001 DROP VIEW IF EXISTS `vista_items`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_unicode_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vista_items` AS select `productos_x_pedido`.`pedido` AS `pedido`,`productos_x_pedido`.`producto` AS `producto`,`productos`.`nombre` AS `nombproducto`,`unidad_medida`.`simbolo` AS `unidmedprod`,`productos_x_pedido`.`cantidad` AS `cantidad`,`productos_x_pedido`.`subtotal` AS `subtotal` from ((`productos_x_pedido` left join `productos` on((`productos_x_pedido`.`producto` = `productos`.`id`))) left join `unidad_medida` on((`productos`.`unidadmedidaventas` = `unidad_medida`.`id`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `vista_movimientos`
--

/*!50001 DROP VIEW IF EXISTS `vista_movimientos`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_unicode_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vista_movimientos` AS select `movimiento_almacen`.`id` AS `id`,`movimiento_almacen`.`idalmacenmayor` AS `idalmacenmayor`,`mayor`.`nombre` AS `nombmayor`,`movimiento_almacen`.`idalmacendetal` AS `idalmacendetal`,`detal`.`nombre` AS `nombdetal`,`movimiento_almacen`.`idproducto` AS `idproducto`,`productos`.`nombre` AS `nombproducto`,`movimiento_almacen`.`cantidad` AS `cantidad`,`unidad_medida`.`simbolo` AS `unidmed`,`movimiento_almacen`.`fecha` AS `fecha`,`movimiento_almacen`.`idusuario` AS `idusuario` from ((((`movimiento_almacen` left join `almacen` `mayor` on((`movimiento_almacen`.`idalmacenmayor` = `mayor`.`id`))) left join `almacen` `detal` on((`movimiento_almacen`.`idalmacendetal` = `detal`.`id`))) left join `productos` on((`movimiento_almacen`.`idproducto` = `productos`.`id`))) left join `unidad_medida` on((`productos`.`unidadmedidaalmacen` = `unidad_medida`.`id`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `vista_pedidos`
--

/*!50001 DROP VIEW IF EXISTS `vista_pedidos`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_unicode_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vista_pedidos` AS select `pedidos`.`id` AS `id`,`pedidos`.`codigo` AS `codigo`,`pedidos`.`vendedor` AS `vendedor`,`ventas`.`displayName` AS `nombvendedor`,`pedidos`.`preciototal` AS `preciototal`,`pedidos`.`cliente` AS `cliente`,`pedidos`.`estatus` AS `estatus`,`estatus_pedido`.`nombre` AS `nombestatus`,`estatus_pedido`.`msgclientes` AS `msgclientes`,`estatus_pedido`.`msgventas` AS `msgventas`,`estatus_pedido`.`msgdespacho` AS `msgdespacho`,`pedidos`.`despachador` AS `despachador`,`despacho`.`displayName` AS `nombdespachador`,`pedidos`.`fecha` AS `fecha`,`pedidos`.`hora` AS `hora` from (((`pedidos` left join `users` `ventas` on((`pedidos`.`vendedor` = `ventas`.`id`))) left join `users` `despacho` on((`pedidos`.`despachador` = `despacho`.`id`))) left join `estatus_pedido` on((`pedidos`.`estatus` = `estatus_pedido`.`id`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `vista_productos`
--

/*!50001 DROP VIEW IF EXISTS `vista_productos`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_unicode_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vista_productos` AS select `productos`.`id` AS `id`,`productos`.`nombre` AS `nombre`,`categorias`.`id` AS `idcategoria`,`categorias`.`nombre` AS `nombcategoria`,`productos`.`unidadmedidaventas` AS `unidadmedidaventas`,`ventas`.`abreviatura` AS `nombunidmedventas`,`productos`.`preciounidad` AS `preciounidad`,`productos`.`unidadmedidaalmacen` AS `unidadmedidaalmacen`,`almacen`.`abreviatura` AS `nombunidmedalmacen`,`productos`.`relacionunidad` AS `relacionunidad`,`productos`.`imagen` AS `imagen`,`productos`.`idmarca` AS `idmarca`,`marca`.`nombre` AS `nombmarca` from ((((`productos` left join `categorias` on((`productos`.`idcategoria` = `categorias`.`id`))) left join `unidad_medida` `ventas` on((`productos`.`unidadmedidaventas` = `ventas`.`id`))) left join `unidad_medida` `almacen` on((`productos`.`unidadmedidaalmacen` = `almacen`.`id`))) left join `marca` on((`productos`.`idmarca` = `marca`.`id`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `vista_productos_disponibles`
--

/*!50001 DROP VIEW IF EXISTS `vista_productos_disponibles`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_unicode_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vista_productos_disponibles` AS select `productos`.`id` AS `id`,`productos`.`nombre` AS `nombre`,`categorias`.`id` AS `idcategoria`,`categorias`.`nombre` AS `nombcategoria`,`productos`.`unidadmedidaventas` AS `unidadmedidaventas`,`ventas`.`abreviatura` AS `nombunidmedventas`,`productos`.`preciounidad` AS `preciounidad`,`productos`.`unidadmedidaalmacen` AS `unidadmedidaalmacen`,`almacen`.`abreviatura` AS `nombunidmedalmacen`,`productos`.`relacionunidad` AS `relacionunidad`,`productos`.`imagen` AS `imagen`,`productos`.`idmarca` AS `idmarca`,`marca`.`nombre` AS `nombmarca` from (((((`productos` left join `categorias` on((`productos`.`idcategoria` = `categorias`.`id`))) left join `unidad_medida` `ventas` on((`productos`.`unidadmedidaventas` = `ventas`.`id`))) left join `unidad_medida` `almacen` on((`productos`.`unidadmedidaalmacen` = `almacen`.`id`))) left join `marca` on((`productos`.`idmarca` = `marca`.`id`))) join `disponiblidad_productos` on(((`productos`.`id` = `disponiblidad_productos`.`idproducto`) and (`disponiblidad_productos`.`disponible` = 1)))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-10-24  8:23:17
