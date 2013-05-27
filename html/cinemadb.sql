-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 28, 2013 at 08:03 AM
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
(100, 'Galati'),
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
  `regia` varchar(30) DEFAULT NULL,
  `imagine` varchar(50) DEFAULT NULL,
  `roluri_principale` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`idFilm`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `filme`
--

INSERT INTO `filme` (`idFilm`, `titlu`, `gen`, `an`, `timp_desf`, `descriere`, `regia`, `imagine`, `roluri_principale`) VALUES
(1, 'Admis pe Pile', 'comedie', 2013, 110, 'razi in hohote\n', 'Will Smith', 'images/killing-time-landscape_s.jpg', NULL),
(2, 'The Hobbit', 'actiune', 2012, 170, 'Cel mai tare film', NULL, NULL, NULL),
(4, 'King Kong', 'actiune', 2012, 150, 'Vechi dar bun', NULL, NULL, NULL),
(5, 'Friends with benefits', 'romance', 2011, 120, 'They just wanna have fun!', NULL, NULL, NULL);

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
  `idSala` int(11) NOT NULL,
  PRIMARY KEY (`idProgram`),
  KEY `idFilm` (`idFilm`),
  KEY `idCinema` (`idCinema`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=221 ;

--
-- Dumping data for table `program`
--

INSERT INTO `program` (`idProgram`, `idFilm`, `idCinema`, `data`, `ora`, `idSala`) VALUES
(10, 4, 100, '2013-05-13', '20:20', 3),
(212, 4, 100, '2013-05-13', '11:30', 0),
(213, 4, 100, '2013-05-13', '12:40', 0),
(214, 4, 100, '2013-05-14', '12:40', 0),
(215, 4, 100, '2013-05-14', '20:20', 0),
(216, 4, 100, '2013-05-20', '20:40', 0),
(217, 2, 100, '2013-05-21', '20:40', 0),
(218, 4, 100, '2013-05-22', '10:40', 0),
(219, 2, 100, '2013-05-23', '10:40', 0),
(220, 4, 100, '2013-05-27', '12:40', 2);

-- --------------------------------------------------------

--
-- Table structure for table `reduceri`
--

CREATE TABLE IF NOT EXISTS `reduceri` (
  `idReducere` int(11) NOT NULL AUTO_INCREMENT,
  `tip` varchar(55) NOT NULL,
  `pret` varchar(20) NOT NULL,
  PRIMARY KEY (`idReducere`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `reduceri`
--

INSERT INTO `reduceri` (`idReducere`, `tip`, `pret`) VALUES
(1, 'Copii', '13 Lei'),
(2, 'Normal', '16.5 Lei'),
(3, 'Pensionari', '13.50 Lei'),
(4, 'Studenti', '13.50 Lei');

-- --------------------------------------------------------

--
-- Table structure for table `sali`
--

CREATE TABLE IF NOT EXISTS `sali` (
  `idSala` int(11) NOT NULL AUTO_INCREMENT,
  `nr_sala` int(11) NOT NULL,
  `randuri` int(11) NOT NULL,
  `locuri` int(11) NOT NULL,
  PRIMARY KEY (`idSala`),
  UNIQUE KEY `nr_sala` (`nr_sala`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `sali`
--

INSERT INTO `sali` (`idSala`, `nr_sala`, `randuri`, `locuri`) VALUES
(1, 1, 15, 200),
(3, 2, 15, 200);

-- --------------------------------------------------------

--
-- Table structure for table `status_seats`
--

CREATE TABLE IF NOT EXISTS `status_seats` (
  `idSeats` int(11) NOT NULL AUTO_INCREMENT,
  `imagine` varchar(60) NOT NULL,
  `tip_loc` varchar(75) NOT NULL,
  PRIMARY KEY (`idSeats`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `status_seats`
--

INSERT INTO `status_seats` (`idSeats`, `imagine`, `tip_loc`) VALUES
(1, 'images/SeatGreen.png', 'Locuri disponibile'),
(2, 'images/GraySeat.png', 'Locuri indisponibile'),
(3, 'images/YellowSeat.png', 'Locuri selectate');

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
