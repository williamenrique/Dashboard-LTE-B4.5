CREATE DATABASE  IF NOT EXISTS `framework` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `db_dashboard_lte`;
-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: localhost    Database: framework
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
-- Table structure for table `table_log`
--

DROP TABLE IF EXISTS `table_log`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `table_log` (
  `log_id` int(11) NOT NULL AUTO_INCREMENT,
  `log_idUser` int(11) DEFAULT NULL,
  `log_descripcion` text,
  `log_comando` text,
  `log_fecha` date DEFAULT NULL,
  PRIMARY KEY (`log_id`),
  KEY `log_idUser_idx` (`log_idUser`),
  CONSTRAINT `log_idUser` FOREIGN KEY (`log_idUser`) REFERENCES `table_user` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `table_log`
--

LOCK TABLES `table_log` WRITE;
/*!40000 ALTER TABLE `table_log` DISABLE KEYS */;
INSERT INTO `table_log` VALUES (1,1,'[/framework/index.php] ','SELECT * FROM table_user WHERE user_email = ~ttt@h.com~ or user_ci = 12345678','2020-10-09'),(2,1,'/framework/index.php8','INSERT INTO table_user(user_ci,user_nombres,user_apellidos, user_tlf,user_email,user_status, user_rol,user_pass) VALUES(?,?,?,?,?,?,?,?)',NULL),(3,1,'/framework/index.php1','UPDATE table_user SET user_status = ? WHERE user_id = 5',NULL),(4,1,'/framework/index.php9','INSERT INTO table_user(user_ci,user_nombres,user_apellidos, user_tlf,user_email,user_status, user_rol,user_pass) VALUES(?,?,?,?,?,?,?,?)',NULL),(5,1,'/framework/index.php10','INSERT INTO table_user(user_ci,user_nombres,user_apellidos, user_tlf,user_email,user_status, user_rol,user_pass) VALUES(?,?,?,?,?,?,?,?)',NULL),(6,1,'/framework/index.php11','INSERT INTO table_user(user_ci,user_nombres,user_apellidos, user_tlf,user_email,user_status, user_rol,user_pass) VALUES(?,?,?,?,?,?,?,?)',NULL),(7,1,'/framework/index.php12','INSERT INTO table_user(user_ci,user_nombres,user_apellidos, user_tlf,user_email,user_status, user_rol,user_pass) VALUES(?,?,?,?,?,?,?,?)',NULL),(8,1,'/framework/index.php13','INSERT INTO table_user(user_ci,user_nombres,user_apellidos, user_tlf,user_email,user_status, user_rol,user_pass) VALUES(?,?,?,?,?,?,?,?)',NULL),(9,1,'/framework/index.php14','INSERT INTO table_user(user_ci,user_nombres,user_apellidos, user_tlf,user_email,user_status, user_rol,user_pass) VALUES(?,?,?,?,?,?,?,?)',NULL),(10,1,'/framework/index.php15','INSERT INTO table_user(user_ci,user_nombres,user_apellidos, user_tlf,user_email,user_status,user_img, user_rol,user_pass) VALUES(?,?,?,?,?,?,?,?,?)',NULL),(11,1,'/framework/index.php16','INSERT INTO table_user(user_ci,user_nombres,user_apellidos, user_tlf,user_email,user_status,user_img, user_rol,user_pass) VALUES(?,?,?,?,?,?,?,?,?)',NULL),(12,1,'/framework/index.php17','INSERT INTO table_user(user_ci,user_nombres,user_apellidos, user_tlf,user_email,user_status,user_img, user_rol,user_pass) VALUES(?,?,?,?,?,?,?,?,?)',NULL),(13,1,'/framework/index.php18','INSERT INTO table_user(user_ci,user_nombres,user_apellidos, user_tlf,user_email,user_status,user_img, user_rol,user_pass) VALUES(?,?,?,?,?,?,?,?,?)',NULL),(14,1,'/framework/index.php19','INSERT INTO table_user(user_ci,user_nombres,user_apellidos, user_tlf,user_email,user_status,user_img, user_rol,user_pass) VALUES(?,?,?,?,?,?,?,?,?)',NULL),(15,1,'/framework/index.php20','INSERT INTO table_user(user_ci,user_nombres,user_apellidos, user_tlf,user_email,user_status,user_img, user_rol,user_pass) VALUES(?,?,?,?,?,?,?,?,?)',NULL),(16,1,'/framework/index.php21','INSERT INTO table_user(user_ci,user_nombres,user_apellidos, user_tlf,user_email,user_status,user_img, user_rol,user_pass) VALUES(?,?,?,?,?,?,?,?,?)',NULL);
/*!40000 ALTER TABLE `table_log` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `table_menu`
--

DROP TABLE IF EXISTS `table_menu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `table_menu` (
  `menu_id` int(11) NOT NULL AUTO_INCREMENT,
  `menu` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `menu_icon` text COLLATE utf8_spanish_ci,
  PRIMARY KEY (`menu_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `table_menu`
--

LOCK TABLES `table_menu` WRITE;
/*!40000 ALTER TABLE `table_menu` DISABLE KEYS */;
INSERT INTO `table_menu` VALUES (1,'Dashboard','<i class=\"fas fa-home mr-2\" style=\"font-size :18px\"></i>'),(2,'Usuarios','<i class=\"fas fa-users mr-2\" style=\"font-size :18px\"></i>');
/*!40000 ALTER TABLE `table_menu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `table_menu_usuario`
--

DROP TABLE IF EXISTS `table_menu_usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `table_menu_usuario` (
  `id_rol` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL,
  KEY `id_rol_idx` (`id_rol`),
  KEY `id_menu_idx` (`id_menu`),
  CONSTRAINT `id_menu` FOREIGN KEY (`id_menu`) REFERENCES `table_menu` (`menu_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `id_rol` FOREIGN KEY (`id_rol`) REFERENCES `table_roles` (`rol_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `table_menu_usuario`
--

LOCK TABLES `table_menu_usuario` WRITE;
/*!40000 ALTER TABLE `table_menu_usuario` DISABLE KEYS */;
INSERT INTO `table_menu_usuario` VALUES (1,2),(1,1);
/*!40000 ALTER TABLE `table_menu_usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `table_person`
--

DROP TABLE IF EXISTS `table_person`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `table_person` (
  `person_id` int(11) NOT NULL AUTO_INCREMENT,
  `person_ci` int(11) DEFAULT NULL,
  `person_nombres` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `person_apellidos` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `person_tlf` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `person_email` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `person_status` int(11) DEFAULT NULL,
  `person_rol` int(11) DEFAULT NULL,
  `person_pass` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `person_registro` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`person_id`),
  KEY `person_rol_idx` (`person_rol`),
  CONSTRAINT `person_rol` FOREIGN KEY (`person_rol`) REFERENCES `table_roles` (`rol_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `table_person`
--

LOCK TABLES `table_person` WRITE;
/*!40000 ALTER TABLE `table_person` DISABLE KEYS */;
INSERT INTO `table_person` VALUES (1,12345,'William Enrique','Infante','987654321','william@gmail.com',1,1,'4a10f98cac8e80e025ee40b9f9585e1565f394c12e8a5d2d36a5039d83ff28aa','2020-10-02 15:06:01'),(2,345678,'Jose Gregorio','Rengel','34567','rengel@gmail.com',2,2,'5f59349ba081142cf9280d5fef756a3a37f5af69951b3231aaeca159b2c36769','2020-10-02 18:06:05');
/*!40000 ALTER TABLE `table_person` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `table_roles`
--

DROP TABLE IF EXISTS `table_roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `table_roles` (
  `rol_id` int(11) NOT NULL AUTO_INCREMENT,
  `rol_name` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `rol_descripcion` text COLLATE utf8_spanish_ci NOT NULL,
  `rol_status` int(11) NOT NULL,
  PRIMARY KEY (`rol_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `table_roles`
--

LOCK TABLES `table_roles` WRITE;
/*!40000 ALTER TABLE `table_roles` DISABLE KEYS */;
INSERT INTO `table_roles` VALUES (1,'Administrador','administrador del sitio ',2),(2,'Asistente','Encargado de los sitemas',1),(3,'Secretaria','Nuevo',1),(4,'Barrendero','personal encargado de la limpieza.',1),(5,'seguridad','seguridad',1);
/*!40000 ALTER TABLE `table_roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `table_submenu`
--

DROP TABLE IF EXISTS `table_submenu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `table_submenu` (
  `submenu_id` int(11) NOT NULL AUTO_INCREMENT,
  `submenu` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `submenu_menuId` int(11) DEFAULT NULL,
  PRIMARY KEY (`submenu_id`),
  KEY `fk_submenu_menuID_idx` (`submenu_menuId`),
  CONSTRAINT `fk_submenu_menuID` FOREIGN KEY (`submenu_menuId`) REFERENCES `table_menu` (`menu_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `table_submenu`
--

LOCK TABLES `table_submenu` WRITE;
/*!40000 ALTER TABLE `table_submenu` DISABLE KEYS */;
INSERT INTO `table_submenu` VALUES (1,'usuarios',2),(2,'roles',2);
/*!40000 ALTER TABLE `table_submenu` ENABLE KEYS */;
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
  PRIMARY KEY (`user_id`),
  KEY `id_roles_idx` (`user_rol`),
  CONSTRAINT `rol_id` FOREIGN KEY (`user_rol`) REFERENCES `table_roles` (`rol_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `table_user`
--

LOCK TABLES `table_user` WRITE;
/*!40000 ALTER TABLE `table_user` DISABLE KEYS */;
INSERT INTO `table_user` VALUES (1,14607920,'we21','SWRrSEFnUHpvYm1kRVg4bVBjTEZKQT09','William Enrique','Infante Parra','william@gmail.com','4125181629',1,1,NULL,'2020-10-08 22:11:07',NULL),(2,15769775,'ybet','SWRrSEFnUHpvYm1kRVg4bVBjTEZKQT09','Ybet Nacari','Acosta','ybet.naca@gmail.com','4120586489',3,1,NULL,'2020-10-08 22:14:15',NULL),(3,12345,'migue','VWVMWlk5T1JEaGZKWHlQL2h6WkU2UT09','Miguel Jose','Romero','romero@hotmail.com','12345678',2,2,NULL,'2020-10-10 13:27:00',NULL),(14,157697755,'YA-014','cnRvVzMvVVBPNExTemJvM0FOdzFLQT09','Ybet','Acosta','acosta@hotmail.com','345678',1,2,NULL,'2020-10-09 22:34:34',NULL),(15,123456,'JR-015','cExoNDVwbi8yWWVYQTZ4SHNYSm5iQT09','Jose Gregorio','Rengel','rengel@gmail.com','2345678',2,1,'default.png','2020-10-10 23:49:59',NULL),(16,34567,'HU-016','bnp4T0JTMDM2UmxETlllb2RGZmVLdz09','Hgygbyug','Uugug','gg@j.com','3456789',1,1,'default.png','2020-10-10 23:51:18',NULL),(17,34567545,'HU-017','YWpDOG9sL3M4aitFWHIzK1FRdTROUT09','Hgygbyug','Uugug','g4g@j.com','3456789',1,1,'default.png','2020-10-10 23:52:50',NULL),(18,9999999,'JB-018','OEJJc1hTVmRQd1l3ZWM4eFB4YVVVdz09','Jbhjbhjb','Bbub','h@jk.com','56789',1,1,'default.png','2020-10-10 23:54:46',NULL),(19,0,'UY-019','UmsyU3hkWnE4KzJLeWZyY0FjNW9VQT09','Ugyy','Ygyg','g@g.com','4567890',1,1,'default.png','2020-10-10 23:58:22',NULL),(20,111111,'BH-020','U1hueUswZ2dmZUQyc3Q0aTdqa2NNdz09','Bhb','Hvhv','hhhhhhh@q.com','456789',1,1,'default.png','2020-10-10 23:59:48',NULL),(21,798778,'KJ-021','QmNVTSt2TjhNUnE4UXNmSlRablBkQT09','Knjb','Jbhjbhb','r@h.com','465',1,1,'default.png','2020-10-11 00:03:10',NULL);
/*!40000 ALTER TABLE `table_user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-10-10 20:09:12
