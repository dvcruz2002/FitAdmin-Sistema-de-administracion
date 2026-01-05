-- MySQL dump 10.13  Distrib 8.0.44, for Win64 (x86_64)
--
-- Host: localhost    Database: appgym
-- ------------------------------------------------------
-- Server version	8.3.0

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `clases`
--

DROP TABLE IF EXISTS `clases`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `clases` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) DEFAULT NULL,
  `instructor` varchar(45) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `hora` time DEFAULT NULL,
  `lugar` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clases`
--

LOCK TABLES `clases` WRITE;
/*!40000 ALTER TABLE `clases` DISABLE KEYS */;
INSERT INTO `clases` VALUES (9,' spinning','María Rodríguez','2024-06-05','16:03:00','Salón C '),(10,'body_pump','Juan Pérez','2024-05-31','23:37:00','Salón C'),(13,' body_pump','Carlos Gómez','2024-07-18','17:00:00','Salón D '),(15,'yoga','Juan Pérez','2024-08-02','10:00:00','Salón A');
/*!40000 ALTER TABLE `clases` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `inscritas`
--

DROP TABLE IF EXISTS `inscritas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `inscritas` (
  `id` int NOT NULL AUTO_INCREMENT,
  `userId` int NOT NULL,
  `claseId` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IdU_idx` (`userId`),
  KEY `IdC_idx` (`claseId`),
  CONSTRAINT `idC` FOREIGN KEY (`claseId`) REFERENCES `clases` (`id`),
  CONSTRAINT `IdU` FOREIGN KEY (`userId`) REFERENCES `usuarios` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `inscritas`
--

LOCK TABLES `inscritas` WRITE;
/*!40000 ALTER TABLE `inscritas` DISABLE KEYS */;
INSERT INTO `inscritas` VALUES (37,50,10),(38,50,10);
/*!40000 ALTER TABLE `inscritas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `planes`
--

DROP TABLE IF EXISTS `planes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `planes` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) DEFAULT NULL,
  `cantidad` int DEFAULT NULL,
  `precio` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `planes`
--

LOCK TABLES `planes` WRITE;
/*!40000 ALTER TABLE `planes` DISABLE KEYS */;
INSERT INTO `planes` VALUES (13,'Basico',10,50),(15,' Regular',20,75),(17,' Premium',30,100),(18,'Default',0,1);
/*!40000 ALTER TABLE `planes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `suscripciones`
--

DROP TABLE IF EXISTS `suscripciones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `suscripciones` (
  `id` int NOT NULL AUTO_INCREMENT,
  `planId` int NOT NULL,
  `meses` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idSuscripciones_idx` (`planId`),
  CONSTRAINT `id` FOREIGN KEY (`planId`) REFERENCES `planes` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=107 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `suscripciones`
--

LOCK TABLES `suscripciones` WRITE;
/*!40000 ALTER TABLE `suscripciones` DISABLE KEYS */;
INSERT INTO `suscripciones` VALUES (0,18,1),(25,13,11),(26,13,11),(27,13,11),(28,13,11),(29,13,11),(30,13,11),(31,13,11),(32,13,11),(101,13,5),(102,13,5),(103,15,1),(104,13,5),(105,17,2),(106,15,2);
/*!40000 ALTER TABLE `suscripciones` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `usuarios` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(60) DEFAULT NULL,
  `apellido` varchar(60) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `admin` tinyint DEFAULT NULL,
  `token` varchar(15) DEFAULT NULL,
  `password` varchar(60) DEFAULT NULL,
  `suscripcionId` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `id_idx` (`suscripcionId`),
  CONSTRAINT `idS` FOREIGN KEY (`suscripcionId`) REFERENCES `suscripciones` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=55 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES (46,'admin','admin','cruzdaniella04@gmail.com',1,'66861effd07b6','$2y$10$iMeFIeoEMSDoMN15OJ7erOWw7G9iCHxVhgM4dDlbS2PSSJ/3dHlrO',0),(50,'user','user','user@hotmail.com',0,'668699c0627c9','$2y$10$jkeYXFnfC8aZyFbAJkLdMekOpmhsJMYDJC24FXPGgtWW6SQuAOciS',105),(52,'daniella','cruz','cruzdaniella05@gmail.com',0,'6958702e570b6','$2y$10$II4EtbtzIfOSUyFPIr2TQeLtPXqpUbKQWgtrJHev56FxBtN.fUWQm',0),(54,'daniella','cruz','daniellacruzg@gmail.com',1,'695875afea1ea','$2y$10$yFmh60gsxuVoR16dbyCrNuunBbnz/SiXUTGUI/ahPryNehBcC62VS',0);
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2026-01-05  1:16:02
