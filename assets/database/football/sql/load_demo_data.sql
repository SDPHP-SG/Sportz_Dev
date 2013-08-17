-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 17, 2013 at 10:29 PM
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

--
-- Dumping data for table `ftbl_people`
--

INSERT INTO `ftbl_people` (`id`, `first_name`, `last_name`) VALUES
(1, 'Jack', 'Kemp');

--
-- Dumping data for table `ftbl_teams`
--

INSERT INTO `ftbl_teams` (`id`, `team_id`, `name`, `city`, `state`, `date_start`, `date_end`) VALUES
(1, 1, 'Chargers', 'Los Angeles', 'CA', '1959-01-01', NULL);

--
-- Dumping data for table `ftbl_team_master`
--

INSERT INTO `ftbl_team_master` (`id`, `description`, `date_established`, `date_terminated`) VALUES
(1, 'Established 1959 as the Los Angeles Chargers', '1959-01-01', NULL);

--
-- Dumping data for table `ftbl_team_to_person`
--

INSERT INTO `ftbl_team_to_person` (`id`, `team_id`, `person_id`, `status`, `date_start`, `date_end`) VALUES
(1, 1, 1, 'A', '1959-01-01', '1962-01-01');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
