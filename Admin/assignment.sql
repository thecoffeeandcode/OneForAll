-- phpMyAdmin SQL Dump
-- version 3.4.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 02, 2013 at 07:16 AM
-- Server version: 5.5.20
-- PHP Version: 5.3.9

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `assignment`
--

-- --------------------------------------------------------

--
-- Table structure for table `sup_tbl`
--

CREATE TABLE IF NOT EXISTS `sup_tbl` (
  `sup_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `sup_name` varchar(50) NOT NULL,
  `note` varchar(100) NOT NULL,
  PRIMARY KEY (`sup_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `sup_tbl`
--

INSERT INTO `sup_tbl` (`sup_id`, `sup_name`, `note`) VALUES
(1, 'Equinox', 'Equipments'),
(2, 'ArmsHouse', 'Weapons'),
(3, 'MedStore', 'Medical Supplies');

-- --------------------------------------------------------

--
-- Table structure for table `si_tb`
--

CREATE TABLE IF NOT EXISTS `si_tb` (
  `si_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `si_name` varchar(100) NOT NULL,
  `quantity` text NOT NULL,
  `cost` varchar(150) NOT NULL,
  PRIMARY KEY (`si_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `si_tb`
--

INSERT INTO `si_tb` (`si_id`, `si_name`, `quantity`, `cost`) VALUES
(1, 'Weapons', '3000', 'Rs. 100000');

-- --------------------------------------------------------

--
-- Table structure for table `rec_tbl`
--

CREATE TABLE IF NOT EXISTS `rec_tbl` (
  `rec_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `f_name` varchar(50) NOT NULL,
  `l_name` varchar(50) NOT NULL,
  `gender` char(10) NOT NULL,
  `dob` date NOT NULL,
  `pob` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `email` varchar(70) NOT NULL,
  `note` varchar(100) NOT NULL,
  PRIMARY KEY (`rec_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `rec_tbl`
--

INSERT INTO `rec_tbl` (`rec_id`, `f_name`, `l_name`, `gender`, `dob`, `pob`, `address`, `phone`, `email`, `note`) VALUES
(1, 'Mom', 'Vannak', 'Male', '1991-03-01', 'Takeo Province', 'Phnom Penh', '088 9 666 120', 'vannakkmum@gmail.com', 'Navy'),
(2, 'Chon', 'Phearak', 'Male', '1990-05-04', 'Takeo Province  ', 'Phnom Penh', '015 66 77 33', 'phearakchon@yahoo.com  ', 'Air Force'),
(3, 'Soa', 'Muny', 'Male', '1988-05-05', 'Takeo Province   ', 'Phnom Penh', '097 69 90 123', 'munysoa@gmail.com   ', 'Marine'),
(4, 'Sok', 'Cheatha', 'Female', '1989-06-06', 'Kompot', 'Phnom Penh', '099 77 66 55 ', 'cheatasok@gmail.com', 'Army');

-- --------------------------------------------------------

--
-- Table structure for table `req_tbl` 

CREATE TABLE IF NOT EXISTS `req_tbl` (
  `req_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `sup_id` int(10) NOT NULL,
  `sol_id` int(10) NOT NULL,
  `req_name` varchar(100) NOT NULL,
  PRIMARY KEY (`req_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `req_tbl`
--

INSERT INTO `req_tbl` (`req_id`, `sup_id`, `sol_id`, `req_name`) VALUES
(1, 2, 1, 'Weapons'),
(2, 1, 2, 'Equipments'),
(3, 2, 3, 'Weapons'),
(4, 3, 4, 'Medical Supplies'),
(5, 1, 5, 'Equipments'),
(6, 3, 6, 'Medical Supplies');

-- --------------------------------------------------------

--
-- Table structure for table `sol_tbl`
--

CREATE TABLE IF NOT EXISTS `sol_tbl` (
  `sol_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `f_name` varchar(30) NOT NULL,
  `l_name` varchar(30) NOT NULL,
  `gender` char(10) NOT NULL,
  `dob` date NOT NULL,
  `pob` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `note` varchar(100) NOT NULL,
  PRIMARY KEY (`sol_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `sol_tbl`
--

INSERT INTO `sol_tbl` (`sol_id`, `f_name`, `l_name`, `gender`, `dob`, `pob`, `address`, `phone`, `email`, `note`) VALUES
(1, 'Hang', 'Sovann', 'Male', '1985-03-05', 'Kandal Province', 'Phnom Penh', '015 871 787', 'sovannhang@gmail.com', 'Rescue'),
(2, 'Pheng', 'Tola', 'Male', '1986-03-08', 'Kompong Cham Province', 'Phnom Penh', '016 572 393', 'tolapheng@gmail.com', 'Patrol'),
(3, 'Sann', 'Vannthoeun', 'Male', '1990-07-03', 'Kandal Province', 'kankal', '087 666 55 ', 'vannthoeunsann@gmail.com', 'Guard'),
(4, 'Tang', 'Hay', 'Male', '0000-00-00', 'Kroches', 'Phnom Penh', '099 77 66 33', 'haytang@gmail.com', 'Rescue'),
(5, 'Chi', 'Kim  Y', 'Male', '0000-00-00', 'Phnom Penh', 'Phnom Penh', '097 66 55 423', 'kimychi@gmail.com', 'Guard'),
(6, 'Sann', 'Sotherath', 'Male', '1985-02-01', 'Kandal Province', 'Phnom Penh', '012 33 44 55', 'sotherathsann@gmail.com', 'Patrol');

-- --------------------------------------------------------

--
-- Table structure for table `users_tbl`
--

CREATE TABLE IF NOT EXISTS `users_tbl` (
  `u_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(30) NOT NULL,
  `type` char(10) NOT NULL,
  `note` varchar(100) NOT NULL,
  PRIMARY KEY (`u_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `users_tbl`
--

INSERT INTO `users_tbl` (`u_id`, `username`, `password`, `type`, `note`) VALUES
(1, 'admin', 'admin', 'creator', 'creator'),
(2, 'everyone', 'viewonly', 'visitor', 'visitor'),
(4, 'vannak', 'vannak', 'creator', 'assignment\r\n');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
