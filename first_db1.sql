-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 05, 2018 at 09:48 PM
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
-- Database: `first_db1`
--
CREATE DATABASE IF NOT EXISTS `first_db1` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `first_db1`;

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

DROP TABLE IF EXISTS `account`;
CREATE TABLE `account` (
  `account_id` int(13) NOT NULL,
  `email` varchar(30) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(255) NOT NULL,
  `balance` float(11,2) NOT NULL,
  `role` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`account_id`, `email`, `username`, `password`, `balance`, `role`) VALUES
(10, 'php@php.net', 'phpuser', '$2y$10$rpETPxUSPlzZDgOrdLQTA.xZ/PDOK7MB/9iT/ofATSpmUV8wS.S3W', 0.00, 2),
(11, 'test@gmail.com', 'testboy', '$2y$10$XsPnNoS1InsA7aGBK0Ryiu3Ceb1kckE6UsWztJ87TzuSkdklrfM1.', 0.00, 1),
(12, 'php@php.net', '12345', '$2y$10$Fm1sAC/OnE.fS7bUtA9oqO/KoFJGDtEWrURQjZvKV2iqYw55A1bZi', 0.00, 1),
(13, 'test@testmail.com', 'testing', '$2y$10$HfoQ6OcQ6zOHcsb8bppARemR9YmmhdeOqwtkTZ/kZyNPyyBOL53W6', 0.00, 1),
(24, 'user@mail.com', 'user', '$2y$10$Ftn6FDWTqy92AcsOyLxd7O0FuNfeKAE8I3JneHCSVKILWpRFpF15q', 0.00, 1),
(25, 'user1@gmail.com', 'user1', '$2y$10$KoOUTfRXq98GSifxuKdfP.GSjADZdiYCHiCNaeCTBZqN1N39yn/l.', 0.00, 1);

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

DROP TABLE IF EXISTS `transaction`;
CREATE TABLE `transaction` (
  `transaction_id` int(13) NOT NULL,
  `account_id` int(13) NOT NULL,
  `recipient` varchar(255) NOT NULL,
  `amount` float(11,2) NOT NULL,
  `transaction_type` tinyint(1) NOT NULL,
  `date_of_transaction` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`transaction_id`, `account_id`, `recipient`, `amount`, `transaction_type`, `date_of_transaction`) VALUES
(7, 10, 'phpuser', 15.22, 1, '2018-12-05 20:43:31'),
(8, 24, 'user', 24.00, 1, '2018-12-05 20:43:34');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`account_id`),
  ADD UNIQUE KEY `email` (`email`,`username`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`transaction_id`),
  ADD KEY `FOREIGN KEY` (`account_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `account_id` int(13) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `transaction_id` int(13) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

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
