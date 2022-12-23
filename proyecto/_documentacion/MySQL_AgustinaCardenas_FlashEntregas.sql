-- MySQL dump 10.13  Distrib 5.5.62, for Win64 (AMD64)
--
-- Host: localhost    Database: trabajofinal
-- ------------------------------------------------------
-- Server version	5.7.33

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
-- Table structure for table `ciudades`
--

DROP TABLE IF EXISTS `ciudades`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ciudades` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `ciudad` varchar(30) DEFAULT NULL,
  `departamento` enum('Artigas','Canelones','Cerro Largo','Colonia','Durazno','Flores','Florida','Lavalleja','Maldonado','Montevideo','Paysandu','Rio Negro','Rivera','Rocha','Salto','San Jose','Soriano','Tacuarembo','Treinta y Tres') DEFAULT NULL,
  `estado` tinyint(3) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=169 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ciudades`
--

LOCK TABLES `ciudades` WRITE;
/*!40000 ALTER TABLE `ciudades` DISABLE KEYS */;
INSERT INTO `ciudades` VALUES (113,'Canelones Ciudad','Canelones',1),(114,'Ciudad de la Costa','Canelones',1),(115,'La Floresta','Canelones',1),(116,'Cuchilla Alta','Canelones',1),(117,'Santa Rosa','Canelones',1),(118,'Pando','Canelones',1),(119,'Las Piedras','Canelones',1),(120,'Tres Cruces','Montevideo',1),(121,'Carrasco','Montevideo',1),(122,'Prado','Montevideo',1),(123,'Colon','Montevideo',1),(124,'Paso de la Arena','Montevideo',1),(125,'Piriapolis','Maldonado',1),(126,'Punta del Este','Maldonado',1),(127,'Maldonado Ciudad','Maldonado',1),(128,'San Carlos','Maldonado',1),(129,'Jose Ignacio','Maldonado',1),(130,'San Jose de Mayo','San Jose',1),(131,'Libertad','San Jose',1),(132,'Ciudad del Plata','San Jose',1),(133,'Castillos','Rocha',1),(134,'Rocha Ciudad','Rocha',1),(135,'Chuy','Rocha',1),(136,'Colonia del Sacramento','Colonia',1),(137,'Nueva Helvecia','Colonia',1),(138,'Carmelo','Colonia',1),(139,'Cardona','Soriano',1),(140,'Dolores','Soriano',1),(141,'Mercedes','Soriano',1),(142,'Trinidad','Flores',1),(143,'Ismael Cortinas','Flores',1),(144,'Florida Ciudad','Florida',1),(145,'Sarandi Grande','Florida',1),(146,'Fray Marcos','Florida',1),(147,'Durazno Ciudad','Durazno',1),(148,'Paso de los Toros','Durazno',1),(149,'Sarandi del Yi','Durazno',1),(150,'Minas','Lavalleja',1),(151,'Jose Pedro Varela','Lavalleja',1),(152,'Treinta y Tres Ciudad','Treinta y Tres',1),(153,'Santa Clara de Olimar','Treinta y Tres',1),(154,'Vergara','Treinta y Tres',1),(155,'Melo','Cerro Largo',1),(156,'Rio Branco','Cerro Largo',1),(157,'Tacuarembo Ciudad','Tacuarembo',1),(158,'San Gregorio del Polanco','Tacuarembo',1),(159,'Rivera Ciudad','Rivera',1),(160,'Tranqueras','Rivera',1),(161,'Artigas Ciudad','Artigas',1),(162,'Bella Union','Artigas',1),(163,'Salto Ciudad','Salto',1),(164,'Belen','Salto',1),(165,'Paysandu Ciudad','Paysandu',1),(166,'Quebracho','Paysandu',1),(167,'Fray Bentos','Rio Negro',1),(168,'Young','Rio Negro',1);
/*!40000 ALTER TABLE `ciudades` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `clientes`
--

DROP TABLE IF EXISTS `clientes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `clientes` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `documento` int(10) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `apellido` varchar(30) DEFAULT NULL,
  `telefono` char(10) NOT NULL,
  `estado` tinyint(3) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clientes`
--

LOCK TABLES `clientes` WRITE;
/*!40000 ALTER TABLE `clientes` DISABLE KEYS */;
INSERT INTO `clientes` VALUES (1,54635214,'Guzman','Mendez','095864753',1),(2,46512435,'Romina','Sanchez','095478632',0),(3,14526352,'Miguel','Ramirez','099475862',0),(4,27541253,'Camila','Suarez','096857485',0),(5,24516859,'Luciano','Torres','098588655',0),(6,41574862,'Manuel','Nieves','097485662',1),(7,54781245,'Romina','Pereyra','092578463',0),(8,52417844,'Camila ','Lopez','095847565',1),(9,46652153,'Micaela','Torres','092334112',1),(10,27541253,'Diego','Sanchez','095889461',1),(11,54879658,'Mariela','Vazquez','098254139',1),(12,25417845,'Mirta','Lodeiro','098586957',1),(13,42215632,'Florencia ','Piriz','099586442',1);
/*!40000 ALTER TABLE `clientes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `envio`
--

DROP TABLE IF EXISTS `envio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `envio` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `id_cliente` int(10) NOT NULL,
  `id_usuario` int(10) NOT NULL,
  `codigoEnvio` varchar(10) NOT NULL,
  `fechaRecepcion` datetime DEFAULT NULL,
  `nombreDestinatario` varchar(30) NOT NULL,
  `telefonoDestinatario` char(10) NOT NULL,
  `id_ciudad` int(10) NOT NULL,
  `calle` varchar(30) NOT NULL,
  `numeroPuerta` varchar(8) NOT NULL,
  `apartamento` varchar(8) DEFAULT NULL,
  `fechaAsignacion` datetime DEFAULT NULL,
  `fechaHoraEntrega` datetime DEFAULT NULL,
  `estado` enum('Pendiente','Reparto','Entregado','Borrado') DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_cliente` (`id_cliente`),
  KEY `id_usuario` (`id_usuario`),
  KEY `id_ciudad` (`id_ciudad`),
  CONSTRAINT `fk_idCiudad_id` FOREIGN KEY (`id_ciudad`) REFERENCES `ciudades` (`id`),
  CONSTRAINT `fk_idCliente_id` FOREIGN KEY (`id_cliente`) REFERENCES `clientes` (`id`),
  CONSTRAINT `fk_idUsuario_id` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `envio`
--

LOCK TABLES `envio` WRITE;
/*!40000 ALTER TABLE `envio` DISABLE KEYS */;
INSERT INTO `envio` VALUES (2,10,6,'FE3E4B','2022-12-23 14:11:11','Ruben Solari','096587429',118,'Uruguay','2451','202','2022-12-23 14:29:10',NULL,'Reparto'),(3,10,6,'68AED1','2022-12-23 14:11:50','Tatiana Bermudez','094781475',129,'Los Caracoles','2311','101','2022-12-23 14:21:18','2022-12-23 15:00:00','Entregado'),(4,11,6,'A14B61','2022-12-23 14:12:26','Sebastian Medina ','093685994',165,'Leandro Gomez','1332','203','2022-12-23 14:29:29',NULL,'Reparto'),(5,1,6,'B1533D','2022-12-23 14:13:31','Fatima Estevez','096368995',126,'Solari','1526','209','2022-12-23 14:22:51','2022-12-23 10:35:00','Entregado'),(6,6,6,'41B07C','2022-12-23 14:14:12','Soledad Piriz','091748533',138,'Francia','1352','101','2022-12-23 14:27:37','2022-12-23 08:50:00','Entregado'),(7,8,6,'C50737','2022-12-23 14:14:52','Nicolas Rolando ','096574481',168,'Cerrito','1289','103','2022-12-23 14:27:15','2022-12-23 13:20:00','Entregado'),(8,11,6,'E7BF54','2022-12-23 14:15:42','Ana Batista','096685322',164,'Av.Salto','1452','202','2022-12-23 14:22:44','2022-12-23 17:20:00','Entregado'),(9,9,6,'7BE0F4','2022-12-23 14:16:55','Ludmila Garcia ','094774856',160,'Rio Negro ','1336','104','2022-12-23 14:29:30','2022-12-23 07:45:00','Entregado'),(10,13,6,'666949','2022-12-23 14:18:46','Gonzalo Ferreira','094885776',123,'Saturno ','1958','404','2022-12-23 14:29:12',NULL,'Reparto'),(11,1,6,'1CD727','2022-12-23 14:19:45','Sofia Rodriguez','095776142',117,'Calandrias','1375','102','2022-12-23 14:29:08',NULL,'Reparto'),(12,12,6,'A4FE6D','2022-12-23 14:20:10','Emilia Queirolo','096338512',145,'Jazmines','1723','204','2022-12-23 14:27:13',NULL,'Reparto'),(13,8,6,'76D868','2022-12-23 14:25:43','Francisco Romano','092856335',149,'Uruguay','2135','105','2022-12-23 14:29:14',NULL,'Reparto'),(14,10,6,'90AAC0','2022-12-23 14:26:33','Romina Vidal ','096581224',127,'Roosevelt','3512','406','2022-12-23 14:27:21','2022-12-23 14:55:00','Entregado'),(19,12,6,'194EA2','2022-12-23 14:53:05','Alfredo Soca ','096335267',129,'Paraiso','2145','202',NULL,NULL,'Pendiente'),(20,13,6,'7543F0','2022-12-23 14:53:27','Gabriela Pereyra','096338594',144,'Cerro Largo ','2451','201','2022-12-23 15:02:48',NULL,'Reparto'),(21,10,6,'3B07AA','2022-12-23 14:53:55','Emiliano Latorre','094578112',123,'Egipto','2236','106',NULL,NULL,'Pendiente'),(22,6,6,'13C812','2022-12-23 14:54:41','Francisco Silva','093566288',128,'Saturno','2148','105',NULL,NULL,'Pendiente'),(23,11,6,'9512C0','2022-12-23 14:55:37','Matias Canobio ','091412566',151,'Colon','1145','204','2022-12-23 14:59:35',NULL,'Reparto'),(24,1,6,'81E356','2022-12-23 14:56:08','Stephanie Perez','094775812',159,'Brasil','2366','205',NULL,NULL,'Pendiente'),(25,8,6,'A2BBB3','2022-12-23 14:56:42','Fernanda Larrosa','095822641',161,'18 de Julio','2562','101',NULL,NULL,'Pendiente'),(26,10,6,'B678F6','2022-12-23 14:57:31','Romina Alvarez','096332581',133,'Marte','1331','204',NULL,NULL,'Pendiente'),(27,11,6,'C98257','2022-12-23 15:00:12','Gaston Mendoza','098775621',145,'Ferreira','2145','204',NULL,NULL,'Pendiente'),(28,1,6,'8B9940','2022-12-23 15:00:40','Lucia Ramirez','096335440',143,'Artigas','2417','203',NULL,NULL,'Pendiente'),(29,13,6,'52415F','2022-12-23 15:01:25','Nicole Gimenez','094177825',124,'Tabanos','2546','103','2022-12-23 15:02:47',NULL,'Reparto');
/*!40000 ALTER TABLE `envio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuarios` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `nombreUsuario` varchar(20) NOT NULL,
  `clave` varchar(100) NOT NULL,
  `perfil` enum('Recepcionista','Encargado','Repartidor') DEFAULT NULL,
  `estado` tinyint(3) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES (1,'repartidor1','5a88d63fd93f290e284815bd61847ba6','Repartidor',1),(2,'repartidor2','8a7434f36ddf156c816087f61fc82f8f','Repartidor',1),(3,'repartidor3','7b51e8cecf6a5238f4fdcfe1b0b69425','Repartidor',1),(4,'repartidor4','8e01bd245c7cb77af6a14bfafd4cd58f','Repartidor',1),(5,'repartidor5','f338a690b58fd3a4f30079efe58769ad','Repartidor',1),(6,'recepcionista1','eb7192d0248e29bd16c1cb03494328b8','Recepcionista',1),(7,'recepcionista2','b7995772cedecb520986a04362b3c0c7','Recepcionista',1),(8,'recepcionista3','1754e1b8b69b3a54c605995f0d665134','Recepcionista',1),(9,'encargado1','5351f27d2fc2f926ce33fc025ab51488','Encargado',1);
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'trabajofinal'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-12-23 12:03:52
