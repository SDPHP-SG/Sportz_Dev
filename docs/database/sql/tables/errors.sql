-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 01, 2013 at 12:11 AM
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
-- Table structure for table `errors`
--

DROP TABLE IF EXISTS `errors`;
CREATE TABLE IF NOT EXISTS `errors` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `err_num` int(3) NOT NULL,
  `err_str` varchar(500) NOT NULL,
  `err_file` varchar(100) NOT NULL,
  `err_line` int(5) NOT NULL,
  `get_vars` varchar(500) NOT NULL,
  `post_vars` varchar(4000) NOT NULL,
  `cookie_vars` varchar(4000) NOT NULL,
  `env_vars` varchar(4000) DEFAULT NULL,
  `server_vars` varchar(4000) DEFAULT NULL,
  `back_trace` varchar(4000) DEFAULT NULL,
  `user_ip` varchar(20) DEFAULT NULL,
  `url_referer` varchar(500) DEFAULT NULL,
  `browser` varchar(500) DEFAULT NULL,
  `browser_version` varchar(100) DEFAULT NULL,
  `os` varchar(100) DEFAULT NULL,
  `os_version` varchar(100) DEFAULT NULL,
  `sessions_id` int(10) unsigned DEFAULT NULL,
  `users_id` int(10) unsigned DEFAULT NULL,
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
