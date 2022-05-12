-- MariaDB dump 10.19  Distrib 10.4.24-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: farmacia
-- ------------------------------------------------------
-- Server version	10.4.24-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `categoria`
--

DROP TABLE IF EXISTS `categoria`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categoria` (
  `idcategoria` int(11) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `descripcion` text DEFAULT NULL,
  PRIMARY KEY (`idcategoria`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categoria`
--

LOCK TABLES `categoria` WRITE;
/*!40000 ALTER TABLE `categoria` DISABLE KEYS */;
INSERT INTO `categoria` VALUES (333736,'Medicamentos','Jarabes, pastillas'),(343836,'Belleza','Productos para la belleza'),(373330,'Higiene','Productos para la higiene'),(393032,'Preservativos','Condones, pastillas');
/*!40000 ALTER TABLE `categoria` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `detalle_pedido`
--

DROP TABLE IF EXISTS `detalle_pedido`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `detalle_pedido` (
  `id` int(11) NOT NULL,
  `idpedido` int(11) DEFAULT NULL,
  `idproducto` int(11) DEFAULT NULL,
  `precio` float DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idpedido` (`idpedido`),
  KEY `idproducto` (`idproducto`),
  CONSTRAINT `detalle_pedido_ibfk_1` FOREIGN KEY (`idpedido`) REFERENCES `pedido` (`idpedido`),
  CONSTRAINT `detalle_pedido_ibfk_2` FOREIGN KEY (`idproducto`) REFERENCES `producto` (`idproducto`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `detalle_pedido`
--

LOCK TABLES `detalle_pedido` WRITE;
/*!40000 ALTER TABLE `detalle_pedido` DISABLE KEYS */;
/*!40000 ALTER TABLE `detalle_pedido` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `detalle_temp`
--

DROP TABLE IF EXISTS `detalle_temp`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `detalle_temp` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idpersona` int(11) NOT NULL,
  `idproducto` int(11) DEFAULT NULL,
  `precio` float DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `imagen` varchar(100) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idproducto` (`idproducto`),
  KEY `FK_idpersona` (`idpersona`),
  CONSTRAINT `FK_idpersona` FOREIGN KEY (`idpersona`) REFERENCES `persona` (`idpersona`),
  CONSTRAINT `detalle_temp_ibfk_1` FOREIGN KEY (`idproducto`) REFERENCES `producto` (`idproducto`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `detalle_temp`
--

LOCK TABLES `detalle_temp` WRITE;
/*!40000 ALTER TABLE `detalle_temp` DISABLE KEYS */;
INSERT INTO `detalle_temp` VALUES (11,383734,373537,576,1,'img_cbc3bb3596765c3d3c3b434484f83867.jpg',1),(13,383734,3732,87,1,'img_646e0dcbfd8181836576726bcc144763.jpg',1),(14,363339,333034,432,1,'img_0512851e11a92436a8a3d7c3691f9aa3.jpg',1);
/*!40000 ALTER TABLE `detalle_temp` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `modulo`
--

DROP TABLE IF EXISTS `modulo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `modulo` (
  `idmodulo` int(11) NOT NULL,
  `titulo` varchar(50) DEFAULT NULL,
  `descripcion` text DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`idmodulo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `modulo`
--

LOCK TABLES `modulo` WRITE;
/*!40000 ALTER TABLE `modulo` DISABLE KEYS */;
INSERT INTO `modulo` VALUES (1,'Dashboard','Dashboard',1),(2,'Cliente','Clientes',1),(3,'Punto de Venta','Punto de Venta',1),(4,'Reportes','Reportes',1);
/*!40000 ALTER TABLE `modulo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pedido`
--

DROP TABLE IF EXISTS `pedido`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pedido` (
  `idpedido` int(11) NOT NULL,
  `idpersona` int(11) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `monto` float DEFAULT NULL,
  `tipopagoid` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`idpedido`),
  KEY `idpersona` (`idpersona`),
  CONSTRAINT `pedido_ibfk_1` FOREIGN KEY (`idpersona`) REFERENCES `persona` (`idpersona`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pedido`
--

LOCK TABLES `pedido` WRITE;
/*!40000 ALTER TABLE `pedido` DISABLE KEYS */;
INSERT INTO `pedido` VALUES (1,383734,'2022-04-30',351,1,1),(2,383337,'2022-05-03',780.8,1,2),(3,393030,'2022-05-02',657,1,1),(4,363339,'2022-04-14',1256,1,1),(5,383734,'2022-05-03',5434,1,0);
/*!40000 ALTER TABLE `pedido` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permisos`
--

DROP TABLE IF EXISTS `permisos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `permisos` (
  `idpermiso` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `idrol` int(11) DEFAULT NULL,
  `moduloid` int(11) DEFAULT NULL,
  `r` int(11) DEFAULT NULL,
  `w` int(11) DEFAULT NULL,
  `u` int(11) DEFAULT NULL,
  `d` int(11) DEFAULT NULL,
  PRIMARY KEY (`idpermiso`),
  UNIQUE KEY `idpermiso` (`idpermiso`),
  KEY `idrol` (`idrol`),
  KEY `moduloid` (`moduloid`),
  CONSTRAINT `permisos_ibfk_1` FOREIGN KEY (`idrol`) REFERENCES `rol` (`idrol`),
  CONSTRAINT `permisos_ibfk_2` FOREIGN KEY (`moduloid`) REFERENCES `modulo` (`idmodulo`)
) ENGINE=InnoDB AUTO_INCREMENT=74 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permisos`
--

LOCK TABLES `permisos` WRITE;
/*!40000 ALTER TABLE `permisos` DISABLE KEYS */;
INSERT INTO `permisos` VALUES (26,313230,1,1,1,1,0),(27,313230,2,1,1,1,0),(28,313230,3,1,1,1,0),(29,313230,4,1,1,1,0),(54,393336,1,0,0,0,0),(55,393336,2,0,0,0,0),(56,393336,3,0,0,0,0),(57,393336,4,1,0,0,0),(58,363335,1,1,1,1,1),(59,363335,2,1,1,1,1),(60,363335,3,1,1,1,1),(61,363335,4,1,1,1,1),(66,313830,1,0,0,0,0),(67,313830,2,1,1,1,0),(68,313830,3,0,0,0,0),(69,313830,4,1,0,0,0),(70,313038,1,1,0,0,0),(71,313038,2,0,0,0,0),(72,313038,3,0,0,0,0),(73,313038,4,1,0,0,0);
/*!40000 ALTER TABLE `permisos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `persona`
--

DROP TABLE IF EXISTS `persona`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `persona` (
  `idpersona` int(11) NOT NULL,
  `nombres` varchar(60) DEFAULT NULL,
  `apellido` varchar(60) DEFAULT NULL,
  `telefono` bigint(20) DEFAULT NULL,
  `email_user` varchar(50) DEFAULT NULL,
  `password` varchar(90) DEFAULT NULL,
  `idrol` int(11) DEFAULT NULL,
  `token` varchar(100) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`idpersona`),
  KEY `idrol` (`idrol`),
  CONSTRAINT `persona_ibfk_1` FOREIGN KEY (`idrol`) REFERENCES `rol` (`idrol`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `persona`
--

LOCK TABLES `persona` WRITE;
/*!40000 ALTER TABLE `persona` DISABLE KEYS */;
INSERT INTO `persona` VALUES (3738,'Horacio','Bonilla',9621456453,'horacio@hotmail.com','6baad6f126fa53233f5120dd32225d4a9eeaea26dce58789f0b3b6efcdb0dadb',363335,NULL,1),(363339,'Kelly','Campos Acevedo',962150412,'kelly@hotmail.com','15e2b0d3c33891ebb0f1ef609ec419420c20e320ce94c65fbc8c3312448eb225',393336,NULL,1),(383337,'Carlos Alberto','Marroquín',9621504312,'carlitos123@hotmail.com','5994471abb01112afcc18159f6cc74b4f511b99806da59b3caf5a9c173cacfc5',313830,NULL,1),(383734,'Hugo Rafael','Rosales Meléndez',9621705041,'rosalesrafael1@hotmail.com','5994471abb01112afcc18159f6cc74b4f511b99806da59b3caf5a9c173cacfc5',363335,'',1),(393030,'Ana Lucia','Marroquín',52,'lucia@hotmail.com','15e2b0d3c33891ebb0f1ef609ec419420c20e320ce94c65fbc8c3312448eb225',393336,NULL,1);
/*!40000 ALTER TABLE `persona` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `producto`
--

DROP TABLE IF EXISTS `producto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `producto` (
  `idproducto` int(11) NOT NULL,
  `nombrep` varchar(70) DEFAULT NULL,
  `idcategoria` int(11) DEFAULT NULL,
  `descripcion` text DEFAULT NULL,
  `stock` int(11) DEFAULT NULL,
  `caducidad` date DEFAULT NULL,
  `precio` float DEFAULT NULL,
  `imagen` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`idproducto`),
  KEY `idcategoria` (`idcategoria`),
  CONSTRAINT `producto_ibfk_1` FOREIGN KEY (`idcategoria`) REFERENCES `categoria` (`idcategoria`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `producto`
--

LOCK TABLES `producto` WRITE;
/*!40000 ALTER TABLE `producto` DISABLE KEYS */;
INSERT INTO `producto` VALUES (3139,'Tylenol',333736,'Analgésico 20 tabletas',333,'2024-07-17',89.5,'img_c89edbe48fc567d93f3f8c62548fb801.jpg'),(3732,'Aderogyl EFE',333736,'10 Tabletas',321,'2022-05-07',87,'img_646e0dcbfd8181836576726bcc144763.jpg'),(313230,'Crema Mustela Rozaduras Bebe',343836,'100 ml',45,'2023-11-15',146,'img_e4e201bcc172e43e418a626d22393553.jpg'),(333034,'Floratil',333736,'200 mg 12 Capsulas',55,'2022-05-06',432,'img_0512851e11a92436a8a3d7c3691f9aa3.jpg'),(333036,'Eucerin',343836,'pH5 250 ml',65,'2024-11-15',364,'img_ce237a1258aebef50232861160b5d5f9.jpg'),(333530,'Medicasp',373330,'Gel 400 ml',323,'2022-05-18',43.7,'img_157c355d903d2996c7b831b4fb2617ca.jpg'),(333838,'Mascarilla',373330,'Mascarilla',60,'2022-05-03',60.7,'img_fd753eb4b865df2830fb4ec3dae5e22c.jpg'),(343139,'Pack bioderma sensibio h2o',343836,'500 ml + 250 ml',64,'2024-11-22',654.5,'img_ba193180b8a303a3d0bd93e50b33f292.jpg'),(343233,'Tebonin',333736,'100 mg oral 30 tabletas',50,'2022-05-05',74,'img_719e9008d2946254f05f85cf0212910f.jpg'),(353034,'Gelicart Trivance',343836,'Colágeno Hidrolizado',54,'2024-11-13',999.9,'img_b55c271bf2b776bb5bb84ff27ba9dea1.jpg'),(353832,'Prudence',393032,'Anticonceptivo',10,'2024-06-18',68.5,'default.png'),(363134,'Phlebodia',333736,'600 mg 30 comprimidos',66,'2022-06-09',440,'img_b8e1569e5a9dd2ac0e6b20fc23ac4546.jpg'),(373537,'Dalacin C',333736,'300 Mg. Oral 16 Capsulas',43,'2024-12-04',576,'img_cbc3bb3596765c3d3c3b434484f83867.jpg'),(373732,'PostDay',393032,'1.5 mg 1 tableta',44,'2022-06-10',149.5,'img_a57733b441e959ea18a690bd6f6e622a.jpg'),(373734,'Vick VapoRub',333736,'Ungüento 50 gr',5,'2022-05-06',55,'img_9a45bf4ff7f2c8d3a630be72897b48a6.jpg'),(383231,'HELIOCARE 360° WATER',343836,'GEL SPF50+ 50ML',54,'2024-11-06',654,'img_bb4ace1d6fdcebebcfac8896df8479fb.jpg'),(383339,'Ibuprofeno',333736,'200 mg 10 capsulas',77,'2025-06-11',41,'img_695e9008d2946254f05f85cf0212910f.jpg'),(393231,'Viagra',333736,'100 mg comprimidos',342,'2023-06-29',86.5,'img_643e9008d2946254f05f85cf0212910f.jpg');
/*!40000 ALTER TABLE `producto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rol`
--

DROP TABLE IF EXISTS `rol`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rol` (
  `idrol` int(11) NOT NULL,
  `nombrerol` varchar(30) DEFAULT NULL,
  `descripcion` text DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`idrol`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rol`
--

LOCK TABLES `rol` WRITE;
/*!40000 ALTER TABLE `rol` DISABLE KEYS */;
INSERT INTO `rol` VALUES (3432,'Inventario','rqwe',0),(313038,'Conserge','Limpia',1),(313230,'Encargado','Encargado',1),(313830,'Gerente','Gerente',1),(363335,'Administrador','Administradores',1),(393336,'Cliente','Cliente',1);
/*!40000 ALTER TABLE `rol` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-05-11 20:27:57
