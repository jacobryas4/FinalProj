-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 15, 2018 at 06:28 PM
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
CREATE TABLE `account` (
  `account_id` int(13) NOT NULL,
  `email` varchar(30) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL,
  `balance` float(11,2) NOT NULL,
  `role` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`account_id`, `email`, `username`, `password`, `balance`, `role`) VALUES
(1, 'testboy@gmail.com', 'user', 'user', 1555.00, 2),
(2, 'guy@gmail.com', 'user1', 'user', 88.98, 1),
(3, 'raynorhere@hotmail.com', 'James T Raynor', 'ThisIsJimmy', 15.22, 1),
(4, 'skerr@gmail.com', 'Sarah A Kerrigan', 'QueenOfBlades', 15.99, 1),
(5, 'amenethil@yahoo.com', 'Arthas L Menethil', 'PurgeThisAccount', 200.00, 1);

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

DROP TABLE IF EXISTS `transaction`;
CREATE TABLE `transaction` (
  `transaction_id` int(13) NOT NULL,
  `account_id` int(13) NOT NULL,
  `date_of_transaction` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `transaction_type` float(11,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`transaction_id`, `account_id`, `date_of_transaction`, `transaction_type`) VALUES
(1, 1, '2018-11-15 17:24:16', 11.22),
(2, 2, '2018-11-15 17:24:19', 12.86),
(3, 3, '2018-11-15 17:24:22', -50.55),
(4, 4, '2018-11-15 17:24:26', -12.10),
(5, 5, '2018-11-15 17:24:29', 59.55),
(6, 2, '2018-11-15 17:26:49', -55.21);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`account_id`);

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
  MODIFY `account_id` int(13) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `transaction_id` int(13) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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
