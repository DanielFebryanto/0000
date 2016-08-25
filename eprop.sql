-- MySQL dump 10.13  Distrib 5.6.24, for Win64 (x86_64)
--
-- Host: localhost    Database: eprop
-- ------------------------------------------------------
-- Server version	5.6.26-log

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
-- Table structure for table `ci_sessions`
--

DROP TABLE IF EXISTS `ci_sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ci_sessions` (
  `id` varchar(40) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) unsigned NOT NULL DEFAULT '0',
  `data` blob NOT NULL,
  KEY `ci_sessions_timestamp` (`timestamp`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ci_sessions`
--

LOCK TABLES `ci_sessions` WRITE;
/*!40000 ALTER TABLE `ci_sessions` DISABLE KEYS */;
/*!40000 ALTER TABLE `ci_sessions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `event`
--

DROP TABLE IF EXISTS `event`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `event` (
  `id_event` int(11) NOT NULL AUTO_INCREMENT,
  `proposal_ID` int(11) NOT NULL,
  `sponsor_ID` int(11) NOT NULL,
  `tgl_buat` date NOT NULL,
  `pesan_sponsor` text NOT NULL,
  `status` varchar(45) NOT NULL,
  PRIMARY KEY (`id_event`),
  KEY `event_proposal_idx` (`proposal_ID`),
  KEY `event_sponsor_idx` (`sponsor_ID`),
  CONSTRAINT `event_proposal` FOREIGN KEY (`proposal_ID`) REFERENCES `proposal` (`id_proposal`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `event_sponsor` FOREIGN KEY (`sponsor_ID`) REFERENCES `sponsor` (`idsponsor`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `event`
--

LOCK TABLES `event` WRITE;
/*!40000 ALTER TABLE `event` DISABLE KEYS */;
/*!40000 ALTER TABLE `event` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `industri`
--

DROP TABLE IF EXISTS `industri`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `industri` (
  `id_si` int(11) NOT NULL AUTO_INCREMENT,
  `nama_si` varchar(50) NOT NULL,
  PRIMARY KEY (`id_si`)
) ENGINE=InnoDB AUTO_INCREMENT=334 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `industri`
--

LOCK TABLES `industri` WRITE;
/*!40000 ALTER TABLE `industri` DISABLE KEYS */;
INSERT INTO `industri` VALUES (111,'Retail'),(222,'Entertain'),(333,'Komunitas');
/*!40000 ALTER TABLE `industri` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kategori_event`
--

DROP TABLE IF EXISTS `kategori_event`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `kategori_event` (
  `id_ke` int(11) NOT NULL AUTO_INCREMENT,
  `nama_ke` varchar(45) NOT NULL,
  PRIMARY KEY (`id_ke`)
) ENGINE=InnoDB AUTO_INCREMENT=56 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kategori_event`
--

LOCK TABLES `kategori_event` WRITE;
/*!40000 ALTER TABLE `kategori_event` DISABLE KEYS */;
INSERT INTO `kategori_event` VALUES (11,'Konser Musik'),(22,'Amal'),(33,'Bazar'),(44,'Olahraga'),(55,'dll');
/*!40000 ALTER TABLE `kategori_event` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `member`
--

DROP TABLE IF EXISTS `member`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `member` (
  `id_member` int(11) NOT NULL AUTO_INCREMENT,
  `nama_member` varchar(100) NOT NULL,
  `about_member` text,
  `email` varchar(50) NOT NULL,
  `phone` varchar(45) DEFAULT NULL,
  `website` varchar(45) NOT NULL,
  `alamat` varchar(45) NOT NULL,
  `username` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `tgl_gabung` date NOT NULL,
  PRIMARY KEY (`id_member`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `member`
--

LOCK TABLES `member` WRITE;
/*!40000 ALTER TABLE `member` DISABLE KEYS */;
INSERT INTO `member` VALUES (1,'Gumilang Hidayat','pencari bakat','gilang@gg.com','05241645','www.gilang.com','jl. kali deres selatan no 13','Gums','1232','2016-08-02'),(2,'Nina Zatulini','http://www.pagpug.com','nina@gmail.com','08561212589','http://www.pagpug.com','jl. wew selatan no 14','ninabobo','1232','2016-08-24');
/*!40000 ALTER TABLE `member` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `proposal`
--

DROP TABLE IF EXISTS `proposal`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `proposal` (
  `id_proposal` int(11) NOT NULL AUTO_INCREMENT,
  `member_ID` int(11) NOT NULL,
  `ke_ID` int(11) NOT NULL,
  `industri_ID` int(11) NOT NULL,
  `judul_proposal` varchar(45) NOT NULL,
  `deskripsi` text NOT NULL,
  `tgl_mulai` date NOT NULL,
  `tgl_selesai` date NOT NULL,
  `doc` varchar(100) NOT NULL,
  `project_manajer` varchar(45) NOT NULL,
  PRIMARY KEY (`id_proposal`),
  KEY `proposal_member_idx` (`member_ID`),
  KEY `proposal_kategori_idx` (`ke_ID`),
  KEY `proposal_industri_idx` (`industri_ID`),
  CONSTRAINT `proposal_indutri` FOREIGN KEY (`industri_ID`) REFERENCES `industri` (`id_si`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `proposal_kategori` FOREIGN KEY (`ke_ID`) REFERENCES `kategori_event` (`id_ke`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `proposal_member` FOREIGN KEY (`member_ID`) REFERENCES `member` (`id_member`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `proposal`
--

LOCK TABLES `proposal` WRITE;
/*!40000 ALTER TABLE `proposal` DISABLE KEYS */;
INSERT INTO `proposal` VALUES (1,1,11,111,'Pencanangan Kanal barat','huahauahau','2019-01-01','2019-01-02','ddd',''),(2,1,11,222,'sdsdsd','asdas','2016-12-29','2016-12-30','as.pptx',''),(4,1,11,333,'Event tahunan Sma negri 54','yang dateng peterpan, cherry bell dan masih banyak lagi','2016-10-29','2016-10-29','as.pptx',''),(5,1,33,333,'Bazar Standar SNI','Bazar Barang Bekas','2016-09-29','2016-09-30','Contoh Pengisian FORM.pdf','');
/*!40000 ALTER TABLE `proposal` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sponsor`
--

DROP TABLE IF EXISTS `sponsor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sponsor` (
  `idsponsor` int(11) NOT NULL AUTO_INCREMENT,
  `nama_sponsor` varchar(45) NOT NULL,
  `about_sponsor` text,
  `industri_ID` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `website` varchar(45) DEFAULT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `tgl_gabung` varchar(45) NOT NULL,
  PRIMARY KEY (`idsponsor`),
  KEY `sponsor_industri_idx` (`industri_ID`),
  CONSTRAINT `sponsor_industri` FOREIGN KEY (`industri_ID`) REFERENCES `industri` (`id_si`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sponsor`
--

LOCK TABLES `sponsor` WRITE;
/*!40000 ALTER TABLE `sponsor` DISABLE KEYS */;
INSERT INTO `sponsor` VALUES (1,'PT. Pagpug tbk','Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',333,'services@pagpug.com','http://pagpug.com','pagpug','1232','2016-08-01'),(4,'PT. Djarum tbk','Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',111,'djarum.coklat@gg.com','http://www.pagpug.com','djarum','1232','16-08-24');
/*!40000 ALTER TABLE `sponsor` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-08-25 13:19:50
