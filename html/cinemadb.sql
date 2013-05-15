-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 15, 2013 at 07:58 PM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `cinemadb`
--

-- --------------------------------------------------------

--
-- Table structure for table `cinema`
--

CREATE TABLE IF NOT EXISTS `cinema` (
  `idCinema` int(11) NOT NULL AUTO_INCREMENT,
  `nume` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`idCinema`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=102 ;

--
-- Dumping data for table `cinema`
--

INSERT INTO `cinema` (`idCinema`, `nume`) VALUES
(100, 'Braila'),
(101, 'Bucuresti');

-- --------------------------------------------------------

--
-- Table structure for table `filme`
--

CREATE TABLE IF NOT EXISTS `filme` (
  `idFilm` int(11) NOT NULL AUTO_INCREMENT,
  `titlu` varchar(40) NOT NULL,
  `gen` varchar(30) DEFAULT NULL,
  `an` int(11) NOT NULL,
  `timp_desf` int(11) NOT NULL,
  `descriere` text NOT NULL,
  PRIMARY KEY (`idFilm`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `filme`
--

INSERT INTO `filme` (`idFilm`, `titlu`, `gen`, `an`, `timp_desf`, `descriere`) VALUES
(1, 'Admis pe Pile', 'comedie', 2013, 110, 'În fiecare prim?var?, elevii din ultimul an de liceu a?teapt? cu ner?bdare scrisorile de acceptare din partea colegiilor care le vor pune în valoare poten?ialul. La Universitatea de la Princeton, ofi?erul responsabil cu admiterea este Portia Nathan (Tina Fey), cerber care evalueaz? sever mii de cereri de admitere. An dup? an, Portia ?i-a tr?it via?a ca dup? manual, lucrând mult, chiar ?i din casa pe care o împarte cu profesorul Mark (Michael Sheen). Când Clarence, ?eful de la admiteri, î?i anun?? apropiata retragere la pensie, candidatele cu cele mai multe ?anse s?-i ia locul sunt Portia ?i rivala sa, Corinne (Gloria Reuben). Dar Portia nu se pierde cu firea ?i î?i vede mai departe de slujba ei, c?ci imediat dup? anun?ul ?efului lor, ea trebuie s? plece iar c?utarea de poten?iali candida?i.'),
(2, 'The Hobbit', 'actiune', 2012, 170, 'Cel mai tare film'),
(4, 'King Kong', 'actiune', 2012, 150, 'Vechi dar bun'),
(5, 'Friends with benefits', 'romance', 2011, 120, 'They just wanna have fun!');

-- --------------------------------------------------------

--
-- Table structure for table `program`
--

CREATE TABLE IF NOT EXISTS `program` (
  `idProgram` int(11) NOT NULL AUTO_INCREMENT,
  `idFilm` int(11) NOT NULL,
  `idCinema` int(11) NOT NULL,
  `data` date DEFAULT NULL,
  `ora` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`idProgram`),
  KEY `idFilm` (`idFilm`),
  KEY `idCinema` (`idCinema`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=216 ;

--
-- Dumping data for table `program`
--

INSERT INTO `program` (`idProgram`, `idFilm`, `idCinema`, `data`, `ora`) VALUES
(10, 4, 100, '2013-05-13', '20:20'),
(212, 4, 100, '2013-05-13', '11:30'),
(213, 4, 100, '2013-05-13', '12:40'),
(214, 4, 100, '2013-05-14', '12:40'),
(215, 4, 100, '2013-05-14', '20:20');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `program`
--
ALTER TABLE `program`
  ADD CONSTRAINT `program_ibfk_1` FOREIGN KEY (`idFilm`) REFERENCES `filme` (`idFilm`),
  ADD CONSTRAINT `program_ibfk_2` FOREIGN KEY (`idCinema`) REFERENCES `cinema` (`idCinema`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
