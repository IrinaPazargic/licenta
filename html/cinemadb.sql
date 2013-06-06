-- MySQL dump 10.13  Distrib 5.5.31, for debian-linux-gnu (i686)
--
-- Host: localhost    Database: cinemadb
-- ------------------------------------------------------
-- Server version	5.5.31-0ubuntu0.13.04.1

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
-- Table structure for table `cinema`
--

DROP TABLE IF EXISTS `cinema`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cinema` (
  `idCinema` int(11) NOT NULL AUTO_INCREMENT,
  `nume` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`idCinema`)
) ENGINE=InnoDB AUTO_INCREMENT=102 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `filme`
--

DROP TABLE IF EXISTS `filme`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `filme` (
  `idFilm` int(11) NOT NULL AUTO_INCREMENT,
  `titlu` varchar(40) NOT NULL,
  `gen` varchar(30) DEFAULT NULL,
  `an` int(11) NOT NULL,
  `timp_desf` int(11) NOT NULL,
  `descriere` text NOT NULL,
  `regia` varchar(30) DEFAULT NULL,
  `imagine` varchar(50) DEFAULT NULL,
  `roluri_principale` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`idFilm`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `locuri_rezervate`
--

DROP TABLE IF EXISTS `locuri_rezervate`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `locuri_rezervate` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idReducere` int(11) NOT NULL,
  `id_rezervare` int(11) NOT NULL,
  `nr_locuri` int(2) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_rezervare` (`id_rezervare`),
  KEY `idReducere` (`idReducere`),
  CONSTRAINT `locuri_rezervate_ibfk_1` FOREIGN KEY (`id_rezervare`) REFERENCES `rezervare` (`id`),
  CONSTRAINT `locuri_rezervate_ibfk_2` FOREIGN KEY (`idReducere`) REFERENCES `reduceri` (`idReducere`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `persoane`
--

DROP TABLE IF EXISTS `persoane`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `persoane` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nume` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `prenume` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `telefon` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `program`
--

DROP TABLE IF EXISTS `program`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `program` (
  `idProgram` int(11) NOT NULL AUTO_INCREMENT,
  `idFilm` int(11) NOT NULL,
  `idCinema` int(11) NOT NULL,
  `data` date DEFAULT NULL,
  `ora` varchar(20) DEFAULT NULL,
  `idSala` int(11) NOT NULL,
  PRIMARY KEY (`idProgram`),
  KEY `idFilm` (`idFilm`),
  KEY `idCinema` (`idCinema`),
  KEY `program_ibfk_3` (`idSala`),
  CONSTRAINT `program_ibfk_1` FOREIGN KEY (`idFilm`) REFERENCES `filme` (`idFilm`),
  CONSTRAINT `program_ibfk_2` FOREIGN KEY (`idCinema`) REFERENCES `cinema` (`idCinema`),
  CONSTRAINT `program_ibfk_3` FOREIGN KEY (`idSala`) REFERENCES `sali` (`idSala`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `reduceri`
--

DROP TABLE IF EXISTS `reduceri`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `reduceri` (
  `idReducere` int(11) NOT NULL AUTO_INCREMENT,
  `tip` varchar(55) NOT NULL,
  `pret` double DEFAULT NULL,
  PRIMARY KEY (`idReducere`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `rezervare`
--

DROP TABLE IF EXISTS `rezervare`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rezervare` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_persoana` int(11) NOT NULL,
  `id_program` int(11) NOT NULL,
  `locuri` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_persoana` (`id_persoana`),
  KEY `id_program` (`id_program`),
  CONSTRAINT `rezervare_ibfk_1` FOREIGN KEY (`id_persoana`) REFERENCES `persoane` (`id`),
  CONSTRAINT `rezervare_ibfk_2` FOREIGN KEY (`id_program`) REFERENCES `program` (`idProgram`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `sali`
--

DROP TABLE IF EXISTS `sali`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sali` (
  `idSala` int(11) NOT NULL AUTO_INCREMENT,
  `nr_sala` int(11) NOT NULL,
  `randuri` int(11) NOT NULL,
  `locuri` int(11) NOT NULL,
  PRIMARY KEY (`idSala`),
  UNIQUE KEY `nr_sala` (`nr_sala`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `status_seats`
--

DROP TABLE IF EXISTS `status_seats`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `status_seats` (
  `idSeats` int(11) NOT NULL AUTO_INCREMENT,
  `imagine` varchar(60) NOT NULL,
  `tip_loc` varchar(75) NOT NULL,
  PRIMARY KEY (`idSeats`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2013-06-06 16:56:36
