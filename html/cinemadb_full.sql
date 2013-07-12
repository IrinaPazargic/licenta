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
) ENGINE=InnoDB AUTO_INCREMENT=110 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cinema`
--

LOCK TABLES `cinema` WRITE;
/*!40000 ALTER TABLE `cinema` DISABLE KEYS */;
INSERT INTO `cinema` VALUES (100,'Galati'),(101,'Bucuresti'),(109,'Tecuci');
/*!40000 ALTER TABLE `cinema` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `detalii_membri`
--

DROP TABLE IF EXISTS `detalii_membri`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `detalii_membri` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nume` varchar(40) NOT NULL,
  `prenume` varchar(30) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `adresa` varchar(100) NOT NULL,
  `telefon` int(15) DEFAULT NULL,
  `id_users` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_users` (`id_users`),
  CONSTRAINT `detalii_membri_ibfk_1` FOREIGN KEY (`id_users`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `detalii_membri`
--

LOCK TABLES `detalii_membri` WRITE;
/*!40000 ALTER TABLE `detalii_membri` DISABLE KEYS */;
INSERT INTO `detalii_membri` VALUES (45,'Pazargic','Irina','pazargic_irina@yahoo.com','Galati, Micro 17, Str. Barbosi, Nr. 61, Bl. B1',743032157,44),(46,'Boeru','Aida','aida_gaby@yahoo.com','Galati, Micro 17, Str. Barbosi, Nr. 61, Bl. B1',743032157,45),(47,'Pazargic','Antonel','antonel.pazargic@gmail.com','Galati, Micro 17, Str. Barbosi, Nr. 61, Bl. B1',743032157,46);
/*!40000 ALTER TABLE `detalii_membri` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `filme`
--

DROP TABLE IF EXISTS `filme`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `filme` (
  `idFilm` int(11) NOT NULL AUTO_INCREMENT,
  `titlu` varchar(40) NOT NULL,
  `an` int(11) NOT NULL,
  `timp_desf` int(11) NOT NULL,
  `descriere` text NOT NULL,
  `regia` varchar(30) DEFAULT NULL,
  `imagine` varchar(50) DEFAULT NULL,
  `roluri_principale` varchar(100) DEFAULT NULL,
  `idGen` int(11) DEFAULT NULL,
  PRIMARY KEY (`idFilm`),
  KEY `idGen` (`idGen`),
  CONSTRAINT `gen_film_ibfk_1` FOREIGN KEY (`idGen`) REFERENCES `gen_film` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `filme`
--

LOCK TABLES `filme` WRITE;
/*!40000 ALTER TABLE `filme` DISABLE KEYS */;
INSERT INTO `filme` VALUES (13,'True Blood',1990,120,'                            Unul dintre cele bune','dana','uploads/bg.jpg','Irina Pazargic',1),(14,'Robbin',1231,0,'                            asda','asda','uploads/bg.jpg','Irina Pazargic',2),(15,'Friends',2005,200,'                            bun','Mama Mea','uploads/BackButton.jpg','Irina Pazargic',1),(16,'Hangover 3',2013,110,'                            Comedie buna','Mama ','uploads/lone_ranger.jpg','Dana matei',4),(17,'Toy story',2009,110,'Desene animate','Robbin williams','uploads/snitch-landscape_s.jpg','Dana matei',2),(18,'Godzilla',2001,120,'                            as','Robbin williams','uploads/world_war.jpg','Irina Pazargic',1),(19,'Mummy',2001,100,'                            asda','Dana','uploads/top_navi.jpg','Irina Pazargic',9),(20,'',0,0,'                            ','','uploads/top_navi.jpg','',1),(21,'',0,0,'                            ','','uploads/top_navi.jpg','',1),(22,'',0,0,'                            ','','uploads/top_navi.jpg','',1),(23,'',0,0,'                            ','','uploads/top_navi.jpg','',1),(24,'',0,0,'                            ','','uploads/top_navi.jpg','',1),(25,'',0,0,'                            ','','uploads/top_navi.jpg','',1),(26,'',0,0,'                            ','','uploads/top_navi.jpg','',1),(27,'',0,0,'                            ','','uploads/top_navi.jpg','',1),(28,'',0,0,'                            ','','uploads/top_navi.jpg','',1);
/*!40000 ALTER TABLE `filme` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gen_film`
--

DROP TABLE IF EXISTS `gen_film`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gen_film` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nume_gen` varchar(15) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nume_gen` (`nume_gen`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gen_film`
--

LOCK TABLES `gen_film` WRITE;
/*!40000 ALTER TABLE `gen_film` DISABLE KEYS */;
INSERT INTO `gen_film` VALUES (1,'actiune'),(2,'animatie'),(3,'aventura'),(4,'comedie'),(5,'crima'),(18,'documentar'),(6,'drama'),(7,'familie'),(8,'fantastic'),(9,'horror'),(10,'istoric'),(11,'mister'),(12,'muzical'),(13,'razboi'),(14,'romantic'),(15,'sf'),(16,'thriller'),(17,'western');
/*!40000 ALTER TABLE `gen_film` ENABLE KEYS */;
UNLOCK TABLES;

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
  CONSTRAINT `locuri_rezervate_ibfk_1` FOREIGN KEY (`id_rezervare`) REFERENCES `rezervare` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `locuri_rezervate_ibfk_2` FOREIGN KEY (`idReducere`) REFERENCES `reduceri` (`idReducere`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `locuri_rezervate`
--

LOCK TABLES `locuri_rezervate` WRITE;
/*!40000 ALTER TABLE `locuri_rezervate` DISABLE KEYS */;
INSERT INTO `locuri_rezervate` VALUES (1,3,1,4),(2,6,2,2),(3,6,3,2),(4,6,4,3);
/*!40000 ALTER TABLE `locuri_rezervate` ENABLE KEYS */;
UNLOCK TABLES;

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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `persoane`
--

LOCK TABLES `persoane` WRITE;
/*!40000 ALTER TABLE `persoane` DISABLE KEYS */;
INSERT INTO `persoane` VALUES (1,'pazargic','irina','chitbulitza2005@yahoo.com','0743032157'),(2,'paza','iri','chitbulitza2005@yahoo.com','466778'),(3,'irina','pazargic','chitbulitza2005@yahoo.com','2234333'),(4,'pazargic','valeria','chinesse_dana@yahoo.com','0234242'),(5,'','','',''),(6,'aaaaa','aa','antonel.pazargic@gmail.com','aaaaa'),(7,'a','a','antonel.pazargic@gmail.com','a');
/*!40000 ALTER TABLE `persoane` ENABLE KEYS */;
UNLOCK TABLES;

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
  CONSTRAINT `program_ibfk_1` FOREIGN KEY (`idFilm`) REFERENCES `filme` (`idFilm`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `program_ibfk_2` FOREIGN KEY (`idCinema`) REFERENCES `cinema` (`idCinema`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `program_ibfk_3` FOREIGN KEY (`idSala`) REFERENCES `sali` (`idSala`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `program`
--

LOCK TABLES `program` WRITE;
/*!40000 ALTER TABLE `program` DISABLE KEYS */;
INSERT INTO `program` VALUES (1,13,100,'2013-07-12','12:00',1),(2,14,101,'2013-07-12','14:50',1),(3,13,101,'2013-07-12','14:50',1),(4,13,100,'2013-07-12','15:50',1),(5,14,100,'2013-07-12','20:30',1),(6,14,100,'2013-07-12','22:00',1),(7,13,100,'2013-07-13','20:00',1),(8,13,100,'2013-07-13','10:00',1),(9,15,100,'2013-07-13','12:00',1),(10,17,100,'2013-07-13','12:00',1),(11,14,101,'2013-07-13','12:00',1),(12,14,100,'2013-07-12','12:00',1);
/*!40000 ALTER TABLE `program` ENABLE KEYS */;
UNLOCK TABLES;

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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reduceri`
--

LOCK TABLES `reduceri` WRITE;
/*!40000 ALTER TABLE `reduceri` DISABLE KEYS */;
INSERT INTO `reduceri` VALUES (3,'Pensionari',15.5),(4,'Studenti',15.5),(6,'Copii',15.5),(7,'Normal',18.5);
/*!40000 ALTER TABLE `reduceri` ENABLE KEYS */;
UNLOCK TABLES;

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
  CONSTRAINT `rezervare_ibfk_1` FOREIGN KEY (`id_persoana`) REFERENCES `persoane` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `rezervare_ibfk_2` FOREIGN KEY (`id_program`) REFERENCES `program` (`idProgram`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rezervare`
--

LOCK TABLES `rezervare` WRITE;
/*!40000 ALTER TABLE `rezervare` DISABLE KEYS */;
INSERT INTO `rezervare` VALUES (1,5,1,''),(2,6,8,'1_1|1_2'),(3,7,9,'1_1|1_2'),(4,1,9,'1_1|1_2|1_3');
/*!40000 ALTER TABLE `rezervare` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sali`
--

DROP TABLE IF EXISTS `sali`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sali` (
  `idSala` int(11) NOT NULL AUTO_INCREMENT,
  `nr_sala` int(11) NOT NULL,
  `idTip` int(11) NOT NULL,
  PRIMARY KEY (`idSala`),
  KEY `idTip` (`idTip`),
  CONSTRAINT `sali_ibfk_1` FOREIGN KEY (`idTip`) REFERENCES `tip_sala` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sali`
--

LOCK TABLES `sali` WRITE;
/*!40000 ALTER TABLE `sali` DISABLE KEYS */;
INSERT INTO `sali` VALUES (1,1,1),(33,500,3);
/*!40000 ALTER TABLE `sali` ENABLE KEYS */;
UNLOCK TABLES;

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

--
-- Dumping data for table `status_seats`
--

LOCK TABLES `status_seats` WRITE;
/*!40000 ALTER TABLE `status_seats` DISABLE KEYS */;
INSERT INTO `status_seats` VALUES (1,'images/YellowSeat.png','Locuri disponibile'),(2,'images/SeatGreen.png','Locuri indisponibile'),(3,'images/GraySeat.png','Locuri selectate');
/*!40000 ALTER TABLE `status_seats` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tip_sala`
--

DROP TABLE IF EXISTS `tip_sala`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tip_sala` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nume_tip` varchar(10) NOT NULL,
  `randuri` int(11) NOT NULL,
  `locuri` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nume_tip` (`nume_tip`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tip_sala`
--

LOCK TABLES `tip_sala` WRITE;
/*!40000 ALTER TABLE `tip_sala` DISABLE KEYS */;
INSERT INTO `tip_sala` VALUES (1,'mica',5,50),(2,'medie',7,70),(3,'mare',15,150);
/*!40000 ALTER TABLE `tip_sala` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(40) NOT NULL,
  `password` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (44,'DanaMatei','1fe6653445e194a899d99f46451fdd64'),(45,'AidaBoeru','1fe6653445e194a899d99f46451fdd64'),(46,'AntonelPazargic','95d5f157f46c2d45b3b661830782575c');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2013-07-12 23:39:43
