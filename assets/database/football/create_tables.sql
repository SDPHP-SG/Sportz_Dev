-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 12, 2013 at 09:49 PM
-- Server version: 5.5.24-log
-- PHP Version: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `sportz`
--

-- --------------------------------------------------------

--
-- Table structure for table `ftbl_people`
--

DROP TABLE IF EXISTS `ftbl_people`;
CREATE TABLE IF NOT EXISTS `ftbl_people` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(30) DEFAULT NULL,
  `last_name` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- Table structure for table `ftbl_person_stats`
--

DROP TABLE IF EXISTS `ftbl_person_stats`;
CREATE TABLE IF NOT EXISTS `ftbl_person_stats` (
  `person_id` int(11) NOT NULL,
  `wins` int(4) DEFAULT NULL,
  `losses` int(4) DEFAULT NULL,
  PRIMARY KEY (`person_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ftbl_teams`
--

DROP TABLE IF EXISTS `ftbl_teams`;
CREATE TABLE IF NOT EXISTS `ftbl_teams` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) DEFAULT NULL,
  `city` varchar(30) DEFAULT NULL,
  `state` varchar(30) DEFAULT NULL,
  `date_start` date DEFAULT NULL,
  `date_end` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

-- --------------------------------------------------------

--
-- Table structure for table `ftbl_team_stats`
--

DROP TABLE IF EXISTS `ftbl_team_stats`;
CREATE TABLE IF NOT EXISTS `ftbl_team_stats` (
  `team_id` int(11) NOT NULL,
  `wins` int(4) DEFAULT NULL,
  `losses` int(4) DEFAULT NULL,
  PRIMARY KEY (`team_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ftbl_team_to_person`
--

DROP TABLE IF EXISTS `ftbl_team_to_person`;
CREATE TABLE IF NOT EXISTS `ftbl_team_to_person` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `team_id` int(11) DEFAULT NULL,
  `person_id` int(11) DEFAULT NULL,
  `status` char(2) DEFAULT NULL,
  `date_start` date DEFAULT NULL,
  `date_end` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_person_idx` (`person_id`),
  KEY `fk_team_idx` (`team_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='\n' AUTO_INCREMENT=3 ;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ftbl_person_stats`
--
ALTER TABLE `ftbl_person_stats`
  ADD CONSTRAINT `fk_person_stats_person` FOREIGN KEY (`person_id`) REFERENCES `ftbl_people` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `ftbl_team_stats`
--
ALTER TABLE `ftbl_team_stats`
  ADD CONSTRAINT `fk_ftbl_team_stats_ftbl_team_master` FOREIGN KEY (`team_id`) REFERENCES `ftbl_teams` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `ftbl_team_to_person`
--
ALTER TABLE `ftbl_team_to_person`
  ADD CONSTRAINT `fk_person` FOREIGN KEY (`person_id`) REFERENCES `ftbl_people` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_team` FOREIGN KEY (`team_id`) REFERENCES `ftbl_teams` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
