-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 03, 2018 at 04:49 AM
-- Server version: 5.7.19
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `url_pb`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_login`
--

DROP TABLE IF EXISTS `tbl_login`;
CREATE TABLE IF NOT EXISTS `tbl_login` (
  `lid` int(11) NOT NULL AUTO_INCREMENT,
  `regid` int(11) NOT NULL,
  `password` varchar(50) NOT NULL,
  `utype` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`lid`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_login`
--

INSERT INTO `tbl_login` (`lid`, `regid`, `password`, `utype`, `status`) VALUES
(1, 1, 'admin', 0, 0),
(2, 2, 'ajil', 1, 0),
(3, 3, 'user', 1, 0),
(4, 4, 'a', 1, 0),
(5, 5, '', 1, 0),
(6, 6, 'ss', 1, 0),
(7, 7, 'd', 1, 0),
(8, 8, 'f', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_registration`
--

DROP TABLE IF EXISTS `tbl_registration`;
CREATE TABLE IF NOT EXISTS `tbl_registration` (
  `rid` int(11) NOT NULL AUTO_INCREMENT,
  `fname` varchar(20) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  PRIMARY KEY (`rid`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `username` (`username`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_registration`
--

INSERT INTO `tbl_registration` (`rid`, `fname`, `lname`, `email`, `username`) VALUES
(1, 'admin', 'admin', 'admin@gmail.com', 'admin'),
(2, 'ajil', 'sunny', 'ajil@gmail.com', 'ajil007'),
(3, 'user', 'user', 'user@m.com', 'user123'),
(4, 'aaa', 'aaa', 't2@n.com', 'hghhhh'),
(5, '', '', '', ''),
(6, 'ssss', 'ssss', 'a@b.com', 'ssssss'),
(7, 'ddd', 'ddd', 'aaaaaaaa@ddd.com', 'dddddd'),
(8, 'fff', 'fff', 'ssss@sss.in', 'ffffff');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
