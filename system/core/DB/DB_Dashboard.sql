CREATE DATABASE  IF NOT EXISTS `db_dashboard` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `db_dashboard`;
-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: db_dashboard
-- ------------------------------------------------------
-- Server version	5.7.29-log

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
-- Table structure for table `table_caracteristica`
--

DROP TABLE IF EXISTS `table_caracteristica`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `table_caracteristica` (
  `caract_id` int(11) NOT NULL AUTO_INCREMENT,
  `caract_idProduct` int(11) DEFAULT NULL,
  `caract_item` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`caract_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `table_caracteristica`
--

LOCK TABLES `table_caracteristica` WRITE;
/*!40000 ALTER TABLE `table_caracteristica` DISABLE KEYS */;
/*!40000 ALTER TABLE `table_caracteristica` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `table_categoria`
--

DROP TABLE IF EXISTS `table_categoria`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `table_categoria` (
  `categ_id` int(11) NOT NULL AUTO_INCREMENT,
  `categ_nombre` varchar(45) DEFAULT NULL,
  `categ_status` char(1) DEFAULT NULL,
  PRIMARY KEY (`categ_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `table_categoria`
--

LOCK TABLES `table_categoria` WRITE;
/*!40000 ALTER TABLE `table_categoria` DISABLE KEYS */;
/*!40000 ALTER TABLE `table_categoria` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `table_contacto_producto`
--

DROP TABLE IF EXISTS `table_contacto_producto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `table_contacto_producto` (
  `contacto_id` int(11) NOT NULL AUTO_INCREMENT,
  `contacto_idProducto` int(11) DEFAULT NULL,
  `contacto_nombre` varchar(45) DEFAULT NULL,
  `contacto_apellido` varchar(45) DEFAULT NULL,
  `contacto_direccion` varchar(45) DEFAULT NULL,
  `contacto_tlf` varchar(45) DEFAULT NULL,
  `contacto_tlf2` varchar(45) DEFAULT NULL,
  `contacto_email` varchar(45) DEFAULT NULL,
  `contacto_status` int(11) DEFAULT NULL,
  PRIMARY KEY (`contacto_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `table_contacto_producto`
--

LOCK TABLES `table_contacto_producto` WRITE;
/*!40000 ALTER TABLE `table_contacto_producto` DISABLE KEYS */;
/*!40000 ALTER TABLE `table_contacto_producto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `table_log`
--

DROP TABLE IF EXISTS `table_log`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `table_log` (
  `log_id` int(11) NOT NULL AUTO_INCREMENT,
  `log_idUser` int(11) DEFAULT NULL,
  `log_descripcion` text CHARACTER SET utf8,
  `log_comando` text CHARACTER SET utf8,
  `log_fecha` date DEFAULT NULL,
  PRIMARY KEY (`log_id`),
  KEY `log_idUser_idx` (`log_idUser`),
  CONSTRAINT `log_idUser` FOREIGN KEY (`log_idUser`) REFERENCES `table_user` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `table_log`
--

LOCK TABLES `table_log` WRITE;
/*!40000 ALTER TABLE `table_log` DISABLE KEYS */;
INSERT INTO `table_log` VALUES (1,1,'/index.php1','UPDATE table_user SET user_status = ? WHERE user_id = 20',NULL),(2,1,'/index.php1','UPDATE table_user SET user_status = ? WHERE user_id = 19',NULL),(3,1,'/index.php1','UPDATE table_user SET user_status = ? WHERE user_id = 21',NULL),(4,1,'/index.php1','UPDATE table_user SET user_status = ? WHERE user_id = 18',NULL),(5,1,'/index.php1','UPDATE table_user SET user_status = ? WHERE user_id = 16',NULL),(6,1,'/index.php22','INSERT INTO table_user(user_ci,user_nombres,user_apellidos, user_tlf,user_email,user_status,user_img, user_rol,user_pass) VALUES(?,?,?,?,?,?,?,?,?)',NULL),(7,1,'/index.php23','INSERT INTO table_user(user_ci,user_nombres,user_apellidos, user_tlf,user_email,user_status,user_img, user_rol,user_pass) VALUES(?,?,?,?,?,?,?,?,?)',NULL),(8,1,'/index.php24','INSERT INTO table_user(user_ci,user_nombres,user_apellidos, user_tlf,user_email,user_status,user_img, user_rol,user_pass) VALUES(?,?,?,?,?,?,?,?,?)',NULL),(9,1,'/index.php1','UPDATE table_user SET user_status = ? WHERE user_id = 24',NULL),(10,1,'/index.php1','UPDATE table_user SET user_status = ? WHERE user_id = 23',NULL),(11,1,'/index.php2','INSERT INTO table_user(user_ci,user_nombres,user_apellidos, user_tlf,user_email,user_status,user_img, user_rol,user_pass) VALUES(?,?,?,?,?,?,?,?,?)',NULL),(12,1,'/index.php3','INSERT INTO table_user(user_ci,user_nombres,user_apellidos, user_tlf,user_email,user_status,user_img, user_rol,user_pass) VALUES(?,?,?,?,?,?,?,?,?)',NULL),(13,1,'/index.php4','INSERT INTO table_user(user_ci,user_nombres,user_apellidos, user_tlf,user_email,user_status,user_img, user_rol,user_pass) VALUES(?,?,?,?,?,?,?,?,?)',NULL),(14,1,'/index.php5','INSERT INTO table_user(user_ci,user_nombres,user_apellidos, user_tlf,user_email,user_status,user_img, user_rol,user_pass) VALUES(?,?,?,?,?,?,?,?,?)',NULL),(15,1,'/index.php6','INSERT INTO table_user(user_ci,user_nombres,user_apellidos, user_tlf,user_email,user_status,user_img, user_rol,user_pass) VALUES(?,?,?,?,?,?,?,?,?)',NULL),(16,1,'/index.php7','INSERT INTO table_user(user_ci,user_nombres,user_apellidos, user_tlf,user_email,user_status,user_img, user_rol,user_pass) VALUES(?,?,?,?,?,?,?,?,?)',NULL),(17,1,'/index.php8','INSERT INTO table_user(user_ci,user_nombres,user_apellidos, user_tlf,user_email,user_status,user_img, user_rol,user_pass) VALUES(?,?,?,?,?,?,?,?,?)',NULL),(18,1,'/index.php9','INSERT INTO table_user(user_ci,user_nombres,user_apellidos, user_tlf,user_email,user_status,user_img, user_rol,user_pass) VALUES(?,?,?,?,?,?,?,?,?)',NULL),(19,1,'/index.php10','INSERT INTO table_user(user_ci,user_nombres,user_apellidos, user_tlf,user_email,user_status,user_img, user_rol,user_pass) VALUES(?,?,?,?,?,?,?,?,?)',NULL),(20,1,'/index.php11','INSERT INTO table_user(user_ci,user_nombres,user_apellidos, user_tlf,user_email,user_status,user_img, user_rol,user_pass) VALUES(?,?,?,?,?,?,?,?,?)',NULL),(21,1,'/index.php12','INSERT INTO table_user(user_ci,user_nombres,user_apellidos, user_tlf,user_email,user_status,user_img, user_rol,user_pass) VALUES(?,?,?,?,?,?,?,?,?)',NULL),(22,1,'/index.php13','INSERT INTO table_user(user_ci,user_nombres,user_apellidos, user_tlf,user_email,user_status,user_img, user_rol,user_pass) VALUES(?,?,?,?,?,?,?,?,?)',NULL),(23,1,'/index.php14','INSERT INTO table_user(user_ci,user_nombres,user_apellidos, user_tlf,user_email,user_status,user_img, user_rol,user_pass) VALUES(?,?,?,?,?,?,?,?,?)',NULL),(24,1,'/index.php1','UPDATE table_user SET user_status = ? WHERE user_id = 2',NULL),(25,1,'/index.php1','UPDATE table_user SET user_status = ? WHERE user_id = 32',NULL);
/*!40000 ALTER TABLE `table_log` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `table_menu`
--

DROP TABLE IF EXISTS `table_menu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `table_menu` (
  `id_menu` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_menu` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `descripcion` text COLLATE utf8_spanish_ci,
  `icono` text COLLATE utf8_spanish_ci,
  `status` int(11) DEFAULT NULL,
  `page_menu_open` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `page_link` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`id_menu`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `table_menu`
--

LOCK TABLES `table_menu` WRITE;
/*!40000 ALTER TABLE `table_menu` DISABLE KEYS */;
INSERT INTO `table_menu` VALUES (1,'Usuario',NULL,'far fa-user',1,'usuario','usuarios'),(2,'Menu',NULL,'fas fa-list-ul',1,'menu','menus'),(3,'Timeline',NULL,'far fa-clock',1,'timelines','times'),(4,NULL,NULL,'',NULL,NULL,NULL);
/*!40000 ALTER TABLE `table_menu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `table_menu_sub_menu`
--

DROP TABLE IF EXISTS `table_menu_sub_menu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `table_menu_sub_menu` (
  `id_menu_sub_menu` int(11) NOT NULL AUTO_INCREMENT,
  `id_menu` int(11) DEFAULT NULL,
  `id_sub_menu` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_menu_sub_menu`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `table_menu_sub_menu`
--

LOCK TABLES `table_menu_sub_menu` WRITE;
/*!40000 ALTER TABLE `table_menu_sub_menu` DISABLE KEYS */;
INSERT INTO `table_menu_sub_menu` VALUES (1,1,1),(2,1,2),(3,1,3),(4,2,4),(5,3,5),(15,2,8),(16,1,9);
/*!40000 ALTER TABLE `table_menu_sub_menu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `table_producto`
--

DROP TABLE IF EXISTS `table_producto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `table_producto` (
  `product_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_img` text,
  `product_nombre` varchar(45) DEFAULT NULL,
  `product_descripcion` text,
  `product_categoria` varchar(45) DEFAULT NULL,
  `product_precio` double DEFAULT NULL,
  `product_condicion` char(1) DEFAULT NULL,
  `product_status` char(1) DEFAULT NULL,
  `product_fechaPublicacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`product_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `table_producto`
--

LOCK TABLES `table_producto` WRITE;
/*!40000 ALTER TABLE `table_producto` DISABLE KEYS */;
/*!40000 ALTER TABLE `table_producto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `table_roles`
--

DROP TABLE IF EXISTS `table_roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `table_roles` (
  `rol_id` int(11) NOT NULL AUTO_INCREMENT,
  `rol_name` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `rol_descripcion` text COLLATE utf8_spanish_ci,
  `rol_status` int(11) DEFAULT NULL,
  PRIMARY KEY (`rol_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `table_roles`
--

LOCK TABLES `table_roles` WRITE;
/*!40000 ALTER TABLE `table_roles` DISABLE KEYS */;
INSERT INTO `table_roles` VALUES (1,'Administrador','administrador',2),(2,'Sin Asignar','No es un rol',1),(3,'Secretaria','encargada de las citas',1),(4,'Repartidor','Encargado de los envios',1),(5,'Encargado','Supervisor dl sistema',1);
/*!40000 ALTER TABLE `table_roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `table_roles_sub_menu`
--

DROP TABLE IF EXISTS `table_roles_sub_menu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `table_roles_sub_menu` (
  `id_rol_sub_menu` int(11) NOT NULL AUTO_INCREMENT,
  `id_rol` int(11) DEFAULT NULL,
  `id_sub_menu` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_rol_sub_menu`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `table_roles_sub_menu`
--

LOCK TABLES `table_roles_sub_menu` WRITE;
/*!40000 ALTER TABLE `table_roles_sub_menu` DISABLE KEYS */;
INSERT INTO `table_roles_sub_menu` VALUES (1,1,1),(2,1,2),(3,1,3),(4,1,4),(5,1,5),(16,1,8),(17,1,9);
/*!40000 ALTER TABLE `table_roles_sub_menu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `table_sub_menu`
--

DROP TABLE IF EXISTS `table_sub_menu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `table_sub_menu` (
  `id_sub_menu` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_sub_menu` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `descripcion` text COLLATE utf8_spanish_ci,
  `url` text COLLATE utf8_spanish_ci,
  `status` int(11) DEFAULT NULL,
  `page_link_activo` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`id_sub_menu`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `table_sub_menu`
--

LOCK TABLES `table_sub_menu` WRITE;
/*!40000 ALTER TABLE `table_sub_menu` DISABLE KEYS */;
INSERT INTO `table_sub_menu` VALUES (1,'Roles',NULL,'roles',1,'roles'),(2,'Lista de Usuarios',NULL,'usuarios',1,'user'),(3,'Usuarios de Alta',NULL,'Usuarios/alta',1,'alta'),(4,'Asignar menu',NULL,'menu',1,'menu'),(5,'Timeline',NULL,'timeline',1,'time'),(8,'Lista menu',NULL,'Menu/lista',1,'lista'),(9,'Pendientes',NULL,'Usuarios/pendiente',1,'pendiente');
/*!40000 ALTER TABLE `table_sub_menu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `table_timeline`
--

DROP TABLE IF EXISTS `table_timeline`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `table_timeline` (
  `time_id` int(11) NOT NULL AUTO_INCREMENT,
  `time_idUser` int(11) DEFAULT NULL,
  `time_codigo` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `time_fecha` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `time_inicio` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `time_fin` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`time_id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `table_timeline`
--

LOCK TABLES `table_timeline` WRITE;
/*!40000 ALTER TABLE `table_timeline` DISABLE KEYS */;
INSERT INTO `table_timeline` VALUES (1,1,'biCod-1-mjZb','2020-10-24','12:06:16','12:12:52'),(2,1,'biCod-1-NlGb','2020-10-24','12:13:00','02:38:00'),(4,1,'biCod-1-Fk6f','2020-10-25','09:26:39','12:27:16'),(5,1,'biCod-1-by2A','2020-10-25','12:37:12','03:11:25'),(6,1,'biCod-1-8H0W','2020-10-25','03:12:18','03:22:57'),(7,1,'biCod-1-BxiX','2020-10-25','03:24:45','08:32:29'),(12,1,'biCod-1-ICAr','2020-10-29','06:54:35','07:45:26'),(13,1,'biCod-1-bCG9','2020-10-29','04:23:46',NULL),(14,1,'biCod-1-hQDR','2020-10-29','07:24:46',''),(15,1,'biCod-1-V2dt','2020-10-29','07:26:46','07:27:29'),(16,1,'biCod-1-GgVt','2020-10-29','07:27:52','08:14:03'),(17,1,'biCod-1-mLj2','2020-10-30','08:42:15',NULL),(18,1,'biCod-1-H6Rc','2020-10-30','09:03:43',NULL),(19,1,'biCod-1-YuS5','2020-10-30','09:11:38','09:11:51');
/*!40000 ALTER TABLE `table_timeline` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `table_user`
--

DROP TABLE IF EXISTS `table_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `table_user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_ci` int(11) DEFAULT NULL,
  `user_nick` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `user_pass` text COLLATE utf8_spanish_ci,
  `user_nombres` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `user_apellidos` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `user_email` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `user_tlf` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `user_rol` int(11) DEFAULT NULL,
  `user_status` int(11) DEFAULT NULL,
  `user_img` text COLLATE utf8_spanish_ci,
  `user_registro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `user_ruta` text COLLATE utf8_spanish_ci,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `table_user`
--

LOCK TABLES `table_user` WRITE;
/*!40000 ALTER TABLE `table_user` DISABLE KEYS */;
INSERT INTO `table_user` VALUES (1,14607920,'we21','SWRrSEFnUHpvYm1kRVg4bVBjTEZKQT09','William Enrique','Infante Parra','william@gmail.com','4125181629',1,1,NULL,'2020-10-26 21:45:44',NULL),(26,1234,'JR-026','NUdvZ2IxY0w1OWJMc1FjL2tEc0V2Zz09','Jose Gregorio','Rengel','jose@gmail.com','1235467',2,1,'default.png','2020-10-27 22:48:01','system/app/Views/Docs/JR-026/'),(29,12355,'YUN-029','N2xtRkhZTVU2QW9KV21NZlhKSmorQT09','Ybet Nacari',NULL,'ybet@hotmail.com',NULL,0,1,'default.png','2020-10-27 23:48:24','system/app/Views/Docs/YUN-029/'),(30,12345678,'MUN-030','VWVMWlk5T1JEaGZKWHlQL2h6WkU2UT09','Miguel Romero',NULL,'romero@hotmail.com',NULL,0,1,'default.png','2020-10-28 00:21:30','system/app/Views/Docs/MUN-030/'),(31,987,'KI-031','eER4Z2lFWFNFTDgwelRHN21JbnZZZz09','Kamila Valentina','Infante','kami@gmail.com','34567',0,1,'default.png','2020-10-28 19:53:05','system/app/Views/Docs/KI-031/'),(32,988,'CA-032','RWJTWWQ3S0ZCNGcvOHBpYWNnTEtRZz09','Carlos','Alberto','alberto@hotmail.com','234567',4,1,'default.png','2020-10-29 21:34:27','system/app/Views/Docs/CA-032/'),(33,89888,'YG-033','RDhvUm5rQnBML3FIL2dtd0pZTklBZz09','Yorman Antonio','Gil','gil@yahoo.com','2345678',1,3,'default.png','2020-10-29 20:28:11','system/app/Views/Docs/YG-033/'),(34,345678,'PUN-034','N2xtRkhZTVU2QW9KV21NZlhKSmorQT09','Pedro Pablo',NULL,'pedro@hotmail.com',NULL,0,3,'default.png','2020-10-29 20:28:11','system/app/Views/Docs/PUN-034/'),(35,6789,NULL,'eXVodGRmK09XVVZkenpiY2h4R0Vmdz09','Daniela','Perez','daniela@gmail.com','45678',3,3,'default.png','2020-10-28 11:06:16',NULL),(36,898989,'EI-036','emNZWkgvb2UwSE9iVWhuSmI0eEo0dz09','Edgar Jose','Infante','edgar@yahoo.com','345678',2,3,'default.png','2020-10-29 20:28:11','system/app/Views/Docs/EI-036/');
/*!40000 ALTER TABLE `table_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `table_user_rol`
--

DROP TABLE IF EXISTS `table_user_rol`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `table_user_rol` (
  `id_usuario_rol` int(11) NOT NULL AUTO_INCREMENT,
  `user_nick` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `id_rol` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_usuario_rol`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `table_user_rol`
--

LOCK TABLES `table_user_rol` WRITE;
/*!40000 ALTER TABLE `table_user_rol` DISABLE KEYS */;
INSERT INTO `table_user_rol` VALUES (1,'we21',1),(12,'JR-026',2),(13,'JR-026',2),(14,'YUN-029',3),(15,'MUN-030',4),(17,'KI-031',3),(19,'CA-032',5),(21,'YG-033',5),(22,'PUN-034',2),(25,'EI-036',4);
/*!40000 ALTER TABLE `table_user_rol` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary view structure for view `v_carga_menu`
--

DROP TABLE IF EXISTS `v_carga_menu`;
/*!50001 DROP VIEW IF EXISTS `v_carga_menu`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `v_carga_menu` AS SELECT 
 1 AS `login`,
 1 AS `nombres`,
 1 AS `apellidos`,
 1 AS `rol_id`,
 1 AS `rol_name`,
 1 AS `id_menu`,
 1 AS `nombre_menu`,
 1 AS `icono`,
 1 AS `page_menu_open`,
 1 AS `page_link`,
 1 AS `id_sub_menu`,
 1 AS `nombre_sub_menu`,
 1 AS `url`,
 1 AS `page_link_activo`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `v_submenu`
--

DROP TABLE IF EXISTS `v_submenu`;
/*!50001 DROP VIEW IF EXISTS `v_submenu`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `v_submenu` AS SELECT 
 1 AS `id_menu`,
 1 AS `id_sub_menu`,
 1 AS `nombre_sub_menu`,
 1 AS `url`,
 1 AS `page_link_activo`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `v_timeline`
--

DROP TABLE IF EXISTS `v_timeline`;
/*!50001 DROP VIEW IF EXISTS `v_timeline`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `v_timeline` AS SELECT 
 1 AS `login`,
 1 AS `nombres`,
 1 AS `apellidos`,
 1 AS `rol`,
 1 AS `id`,
 1 AS `codigo`,
 1 AS `fecha`,
 1 AS `inicio`,
 1 AS `fin`*/;
SET character_set_client = @saved_cs_client;

--
-- Final view structure for view `v_carga_menu`
--

/*!50001 DROP VIEW IF EXISTS `v_carga_menu`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `v_carga_menu` AS (select `a`.`user_nick` AS `login`,`a`.`user_nombres` AS `nombres`,`a`.`user_apellidos` AS `apellidos`,`f`.`rol_id` AS `rol_id`,`f`.`rol_name` AS `rol_name`,`e`.`id_menu` AS `id_menu`,`e`.`nombre_menu` AS `nombre_menu`,`e`.`icono` AS `icono`,`e`.`page_menu_open` AS `page_menu_open`,`e`.`page_link` AS `page_link`,`g`.`id_sub_menu` AS `id_sub_menu`,`g`.`nombre_sub_menu` AS `nombre_sub_menu`,`g`.`url` AS `url`,`g`.`page_link_activo` AS `page_link_activo` from ((((((`table_user` `a` join `table_user_rol` `b`) join `table_roles_sub_menu` `c`) join `table_menu_sub_menu` `d`) join `table_menu` `e`) join `table_roles` `f`) join `table_sub_menu` `g`) where ((`a`.`user_nick` = `b`.`user_nick`) and (`b`.`id_rol` = `f`.`rol_id`) and (`f`.`rol_id` = `c`.`id_rol`) and (`c`.`id_sub_menu` = `g`.`id_sub_menu`) and (`g`.`id_sub_menu` = `d`.`id_sub_menu`) and (`e`.`id_menu` = `d`.`id_menu`) and (`e`.`status` = 1))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `v_submenu`
--

/*!50001 DROP VIEW IF EXISTS `v_submenu`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `v_submenu` AS select `e`.`id_menu` AS `id_menu`,`g`.`id_sub_menu` AS `id_sub_menu`,`g`.`nombre_sub_menu` AS `nombre_sub_menu`,`g`.`url` AS `url`,`g`.`page_link_activo` AS `page_link_activo` from ((`table_menu_sub_menu` `d` join `table_menu` `e`) join `table_sub_menu` `g`) where ((`g`.`id_sub_menu` = `d`.`id_sub_menu`) and (`e`.`id_menu` = `d`.`id_menu`)) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `v_timeline`
--

/*!50001 DROP VIEW IF EXISTS `v_timeline`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `v_timeline` AS (select `a`.`user_nick` AS `login`,`a`.`user_nombres` AS `nombres`,`a`.`user_apellidos` AS `apellidos`,`b`.`rol_name` AS `rol`,`c`.`time_id` AS `id`,`c`.`time_codigo` AS `codigo`,`c`.`time_fecha` AS `fecha`,`c`.`time_inicio` AS `inicio`,`c`.`time_fin` AS `fin` from ((`table_user` `a` join `table_roles` `b`) join `table_timeline` `c`) where ((`a`.`user_rol` = `b`.`rol_id`) and (`a`.`user_id` = `c`.`time_idUser`))) */;
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

-- Dump completed on 2020-11-06 18:13:36
