-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 02, 2018 at 07:02 PM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `first_db`
--
DROP DATABASE IF EXISTS `first_db`;
CREATE DATABASE IF NOT EXISTS `first_db` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `first_db`;

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

DROP TABLE IF EXISTS `account`;
CREATE TABLE IF NOT EXISTS `account` (
  `account_id` int(13) NOT NULL AUTO_INCREMENT,
  `email` varchar(30) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(255) NOT NULL,
  `balance` float(11,2) NOT NULL,
  `role` int(1) NOT NULL,
  PRIMARY KEY (`account_id`),
  UNIQUE KEY `email` (`email`,`username`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`account_id`, `email`, `username`, `password`, `balance`, `role`) VALUES
(10, 'php@php.net', 'phpuser', '$2y$10$rpETPxUSPlzZDgOrdLQTA.xZ/PDOK7MB/9iT/ofATSpmUV8wS.S3W', 0.00, 2),
(11, 'test@gmail.com', 'testboy', '$2y$10$XsPnNoS1InsA7aGBK0Ryiu3Ceb1kckE6UsWztJ87TzuSkdklrfM1.', 0.00, 1),
(12, 'php@php.net', '12345', '$2y$10$Fm1sAC/OnE.fS7bUtA9oqO/KoFJGDtEWrURQjZvKV2iqYw55A1bZi', 0.00, 1),
(13, 'test@testmail.com', 'testing', '$2y$10$HfoQ6OcQ6zOHcsb8bppARemR9YmmhdeOqwtkTZ/kZyNPyyBOL53W6', 0.00, 1);

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

DROP TABLE IF EXISTS `transaction`;
CREATE TABLE IF NOT EXISTS `transaction` (
  `transaction_id` int(13) NOT NULL AUTO_INCREMENT,
  `account_id` int(13) NOT NULL,
  `amount` float(11,2) NOT NULL,
  `transaction_type` tinyint(1) NOT NULL,
  `date_of_transaction` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`transaction_id`),
  KEY `FOREIGN KEY` (`account_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`transaction_id`, `account_id`, `amount`, `transaction_type`, `date_of_transaction`) VALUES
(7, 10, 15.22, 1, '2018-11-29 17:14:23');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `transaction`
--
ALTER TABLE `transaction`
  ADD CONSTRAINT `FOREIGN KEY` FOREIGN KEY (`account_id`) REFERENCES `account` (`account_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
