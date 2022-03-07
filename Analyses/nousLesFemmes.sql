-- MySQL dump 10.13  Distrib 8.0.28, for Linux (x86_64)
--
-- Host: localhost    Database: nousLesFemmes_database
-- ------------------------------------------------------
-- Server version	8.0.28-0ubuntu0.20.04.3

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Current Database: `nousLesFemmes_database`
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `nousLesFemmes_database` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;

USE `nousLesFemmes_database`;

--
-- Table structure for table `Nlf_Admin`
--

DROP TABLE IF EXISTS `Nlf_Admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `Nlf_Admin` (
  `id_admin` int NOT NULL AUTO_INCREMENT,
  `admin_naiss` date NOT NULL,
  `admin_pers` int NOT NULL,
  `admin_cpt` int NOT NULL,
  PRIMARY KEY (`id_admin`),
  UNIQUE KEY `admin_cpt` (`admin_cpt`),
  KEY `FK_admin_pers` (`admin_pers`),
  CONSTRAINT `FK_admin_cpt` FOREIGN KEY (`admin_cpt`) REFERENCES `Nlf_Comptes` (`id_cpt`),
  CONSTRAINT `FK_admin_pers` FOREIGN KEY (`admin_pers`) REFERENCES `Nlf_Personnes` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Nlf_Admin`
--

LOCK TABLES `Nlf_Admin` WRITE;
/*!40000 ALTER TABLE `Nlf_Admin` DISABLE KEYS */;
INSERT INTO `Nlf_Admin` VALUES (1,'1999-02-12',1,1),(2,'2022-03-16',11,16),(3,'2022-03-02',12,17),(4,'2022-03-30',15,24),(5,'1998-03-17',17,26);
/*!40000 ALTER TABLE `Nlf_Admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Nlf_Communes`
--

DROP TABLE IF EXISTS `Nlf_Communes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `Nlf_Communes` (
  `id_com` int NOT NULL AUTO_INCREMENT,
  `com_nom` varchar(100) NOT NULL,
  `com_dpt` int NOT NULL,
  PRIMARY KEY (`id_com`),
  KEY `FK_com_dpt` (`com_dpt`),
  CONSTRAINT `FK_com_dpt` FOREIGN KEY (`com_dpt`) REFERENCES `Nlf_Departements` (`id_dpt`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Nlf_Communes`
--

LOCK TABLES `Nlf_Communes` WRITE;
/*!40000 ALTER TABLE `Nlf_Communes` DISABLE KEYS */;
INSERT INTO `Nlf_Communes` VALUES (1,'KÉBÉMER',1),(2,'Ndande',1);
/*!40000 ALTER TABLE `Nlf_Communes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Nlf_Comptes`
--

DROP TABLE IF EXISTS `Nlf_Comptes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `Nlf_Comptes` (
  `id_cpt` int NOT NULL AUTO_INCREMENT,
  `cpt_pseudo` varchar(100) NOT NULL,
  `cpt_mail` varchar(100) NOT NULL,
  `cpt_motDePasse` varchar(255) NOT NULL,
  `cpt_dateCreation` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `cpt_admin` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id_cpt`),
  UNIQUE KEY `cpt_pseudo` (`cpt_pseudo`),
  UNIQUE KEY `cpt_mail` (`cpt_mail`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Nlf_Comptes`
--

LOCK TABLES `Nlf_Comptes` WRITE;
/*!40000 ALTER TABLE `Nlf_Comptes` DISABLE KEYS */;
INSERT INTO `Nlf_Comptes` VALUES (1,'milkzo83','malickkebe83@gmail.com','$2y$10$EgyjBVjnAO8dXPtYKDRUru10cksfwCpbrOgDkH/u31v0P7gPmZr9C','2022-03-04 01:33:25',1),(2,'zall83','cheikhtalla@gmail.com','$2y$10$IHHOJ3.FUw7LMn3lWlaKiuWW5aI5JEu5tbvoquDD5jP6uuLCMsUOK','2022-03-04 01:34:55',0),(11,'medzo83','dieyemouhamet1@gmail.com','$2y$10$oDNjZ0fWiaEQf/Rr.Vjsd.FbviyyqPQ.u9hntH7ow37fdUkHklqUW','2022-03-04 14:45:57',2),(16,'son\'h83','sonhibousimplon@gmail.com','$2y$10$ey0VbcQ3yrJpCvUsekjQROvsrbkI3BiLAoLdtXSaUy5Pu88q3BMoO','2022-03-05 15:40:13',1),(17,'Koumbiss83','ramataka@gmail.com','$2y$10$Obd4yqzLKzqgorlg8Evry.OFRt9q2wNFU2D4dH6cwSt7NWWK1aL2u','2022-03-05 16:04:37',1),(22,'you83','youssoupha83@gmail.com','$2y$10$dmQIv.UdlD9rL.w0bExqQeVmyMwFzUeZGod7gdUVcMRIzuFzbRdxW','2022-03-05 22:30:18',2),(23,'jacqui83','jacque@gmail.com','$2y$10$cOOwJA05GKadziiVc01fPOAiTP/XylznQ15L8MHdQiPA.d8IztUrm','2022-03-05 22:37:30',2),(24,'kheuss83','cheikhsow@gmail.com','$2y$10$v/a2nGsbQlVyBTD0FKp7QOffg0ZCXdhSnpwObXAf85YtSC5c5xQBK','2022-03-05 22:41:49',1),(25,'mounass83','maimouna@gmail.com','$2y$10$8pUh5eWV9GXpfUNf2d0jAunBBBOIAkR4UAGlhHz5DtAmW0Ob9gJMK','2022-03-05 23:06:28',2),(26,'dioks83','diorkama@gmail.com','$2y$10$8rYIP5nci2gWeQf6swqwOegNGsV/DoEXR2cgUJhQoLlHf7iNcqrBG','2022-03-05 23:35:15',1);
/*!40000 ALTER TABLE `Nlf_Comptes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Nlf_Departements`
--

DROP TABLE IF EXISTS `Nlf_Departements`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `Nlf_Departements` (
  `id_dpt` int NOT NULL AUTO_INCREMENT,
  `dpt_nom` varchar(100) NOT NULL,
  `dpt_reg` int NOT NULL,
  PRIMARY KEY (`id_dpt`),
  KEY `FK_dpt_reg` (`dpt_reg`),
  CONSTRAINT `FK_dpt_reg` FOREIGN KEY (`dpt_reg`) REFERENCES `Nlf_Regions` (`id_reg`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Nlf_Departements`
--

LOCK TABLES `Nlf_Departements` WRITE;
/*!40000 ALTER TABLE `Nlf_Departements` DISABLE KEYS */;
INSERT INTO `Nlf_Departements` VALUES (1,'KÉBÉMER',1),(2,'Linguére',1),(3,'Louga',1),(4,'Pikine',2),(5,'Rufisque',2),(6,'Guédiawaye',2),(7,'Dakar',2);
/*!40000 ALTER TABLE `Nlf_Departements` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Nlf_Employees`
--

DROP TABLE IF EXISTS `Nlf_Employees`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `Nlf_Employees` (
  `id_emp` int NOT NULL AUTO_INCREMENT,
  `emp_naiss` date NOT NULL,
  `emp_role` varchar(100) NOT NULL,
  `emp_pers` int NOT NULL,
  `emp_cpt` int NOT NULL,
  PRIMARY KEY (`id_emp`),
  UNIQUE KEY `emp_cpt` (`emp_cpt`),
  KEY `FK_emp_pers` (`emp_pers`),
  CONSTRAINT `FK_emp_cpt` FOREIGN KEY (`emp_cpt`) REFERENCES `Nlf_Comptes` (`id_cpt`),
  CONSTRAINT `FK_emp_pers` FOREIGN KEY (`emp_pers`) REFERENCES `Nlf_Personnes` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Nlf_Employees`
--

LOCK TABLES `Nlf_Employees` WRITE;
/*!40000 ALTER TABLE `Nlf_Employees` DISABLE KEYS */;
INSERT INTO `Nlf_Employees` VALUES (1,'1998-07-11','Agent Terrain',2,2),(2,'2022-03-02','collectionneur',7,11),(3,'2022-03-16','secretaire',13,22),(4,'2022-03-08','Agent terrain',14,23),(5,'2022-03-16','collectionneur',16,25);
/*!40000 ALTER TABLE `Nlf_Employees` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Nlf_Entreprises`
--

DROP TABLE IF EXISTS `Nlf_Entreprises`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `Nlf_Entreprises` (
  `id_ent` int NOT NULL AUTO_INCREMENT,
  `ent_nom` varchar(100) NOT NULL,
  `ent_GPS` varchar(100) NOT NULL,
  `ent_dateCreation` date NOT NULL,
  `ent_regimeJuridique` enum('GIE','SA','SARL','SUARL','EI') NOT NULL,
  `ent_registreCom` int NOT NULL,
  `ent_type` tinyint(1) NOT NULL,
  `ent_secteur` enum('Commerce(C)','Commerce de motocyclette et accessoires(C.1.1)','Commerce en magasinage(C.2)') NOT NULL,
  `ent_pageWeb` varchar(100) NOT NULL,
  `ent_nombreEmp` enum('0','<5','5 à 10','10 à 20','=20') NOT NULL,
  `ent_contratFormel` tinyint(1) NOT NULL,
  `ent_organigramme` tinyint(1) NOT NULL,
  `ent_dispositifForm` tinyint(1) NOT NULL,
  `ent_cotisationSoc` enum('Oui','Non','Partiellement') NOT NULL,
  `ent_rep` int NOT NULL,
  `ent_sg` int NOT NULL,
  PRIMARY KEY (`id_ent`),
  KEY `FK_ent_rep` (`ent_rep`),
  KEY `FK_ent_sg` (`ent_sg`),
  CONSTRAINT `FK_ent_rep` FOREIGN KEY (`ent_rep`) REFERENCES `Nlf_Repondants` (`id_rep`),
  CONSTRAINT `FK_ent_sg` FOREIGN KEY (`ent_sg`) REFERENCES `Nlf_Sieges` (`id_sg`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Nlf_Entreprises`
--

LOCK TABLES `Nlf_Entreprises` WRITE;
/*!40000 ALTER TABLE `Nlf_Entreprises` DISABLE KEYS */;
INSERT INTO `Nlf_Entreprises` VALUES (1,'Shadow enterprise','Avenue les jambars','2020-03-12','SARL',19484342,1,'Commerce(C)','https://www.shadowenterprise.com','5 à 10',0,1,1,'Oui',1,1);
/*!40000 ALTER TABLE `Nlf_Entreprises` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Nlf_Personnes`
--

DROP TABLE IF EXISTS `Nlf_Personnes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `Nlf_Personnes` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(100) NOT NULL,
  `prenom` varchar(100) NOT NULL,
  `telephone` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `telephone` (`telephone`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Nlf_Personnes`
--

LOCK TABLES `Nlf_Personnes` WRITE;
/*!40000 ALTER TABLE `Nlf_Personnes` DISABLE KEYS */;
INSERT INTO `Nlf_Personnes` VALUES (1,'KÉBÉ','Malick','771234567'),(2,'TALLA','Cheikh Serigne Saliou','771234561'),(7,'DIEYE','Mouhamed','709876787'),(11,'SÉNE','Serigne Sonibou','778796543'),(12,'KA','Ramata','770932676'),(13,'THIAM','Youssoup','768765489'),(14,'NDIAYE','Jacques Etiennes','789809867'),(15,'SOW','Cheikh','789867654'),(16,'DIALLO','Maîmouna','789876765'),(17,'KAMA','Dior','709878987'),(18,'GUEYE','Rokhaya','750981209');
/*!40000 ALTER TABLE `Nlf_Personnes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Nlf_Quartiers`
--

DROP TABLE IF EXISTS `Nlf_Quartiers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `Nlf_Quartiers` (
  `id_quartier` int NOT NULL AUTO_INCREMENT,
  `quartier_nom` varchar(100) NOT NULL,
  `quartier_com` int NOT NULL,
  PRIMARY KEY (`id_quartier`),
  KEY `FK_quartier_com` (`quartier_com`),
  CONSTRAINT `FK_quartier_com` FOREIGN KEY (`quartier_com`) REFERENCES `Nlf_Communes` (`id_com`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Nlf_Quartiers`
--

LOCK TABLES `Nlf_Quartiers` WRITE;
/*!40000 ALTER TABLE `Nlf_Quartiers` DISABLE KEYS */;
INSERT INTO `Nlf_Quartiers` VALUES (1,'MBABOU',1),(2,'Galla',1),(3,'HLM',1),(4,'Escale',1);
/*!40000 ALTER TABLE `Nlf_Quartiers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Nlf_Regions`
--

DROP TABLE IF EXISTS `Nlf_Regions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `Nlf_Regions` (
  `id_reg` int NOT NULL AUTO_INCREMENT,
  `reg_nom` varchar(100) NOT NULL,
  PRIMARY KEY (`id_reg`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Nlf_Regions`
--

LOCK TABLES `Nlf_Regions` WRITE;
/*!40000 ALTER TABLE `Nlf_Regions` DISABLE KEYS */;
INSERT INTO `Nlf_Regions` VALUES (1,'Louga'),(2,'Dakar'),(3,'Fatick');
/*!40000 ALTER TABLE `Nlf_Regions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Nlf_Repondants`
--

DROP TABLE IF EXISTS `Nlf_Repondants`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `Nlf_Repondants` (
  `id_rep` int NOT NULL AUTO_INCREMENT,
  `rep_mail` varchar(100) NOT NULL,
  `rep_pers` int NOT NULL,
  PRIMARY KEY (`id_rep`),
  UNIQUE KEY `rep_mail` (`rep_mail`),
  KEY `FK_rep_pers` (`rep_pers`),
  CONSTRAINT `FK_rep_pers` FOREIGN KEY (`rep_pers`) REFERENCES `Nlf_Personnes` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Nlf_Repondants`
--

LOCK TABLES `Nlf_Repondants` WRITE;
/*!40000 ALTER TABLE `Nlf_Repondants` DISABLE KEYS */;
INSERT INTO `Nlf_Repondants` VALUES (1,'rokhydaaba@gmail.com',18);
/*!40000 ALTER TABLE `Nlf_Repondants` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Nlf_Sieges`
--

DROP TABLE IF EXISTS `Nlf_Sieges`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `Nlf_Sieges` (
  `id_sg` int NOT NULL AUTO_INCREMENT,
  `sg_nom` varchar(100) NOT NULL,
  `sg_quartier` int NOT NULL,
  PRIMARY KEY (`id_sg`),
  KEY `FK_sg_quartier` (`sg_quartier`),
  CONSTRAINT `FK_sg_quartier` FOREIGN KEY (`sg_quartier`) REFERENCES `Nlf_Quartiers` (`id_quartier`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Nlf_Sieges`
--

LOCK TABLES `Nlf_Sieges` WRITE;
/*!40000 ALTER TABLE `Nlf_Sieges` DISABLE KEYS */;
INSERT INTO `Nlf_Sieges` VALUES (1,'myCompany',1),(2,'theStore',1);
/*!40000 ALTER TABLE `Nlf_Sieges` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-03-07  9:09:56
