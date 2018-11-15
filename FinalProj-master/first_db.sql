-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 13, 2018 at 09:47 PM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.2.5

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
  `password` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`account_id`, `email`, `username`, `password`) VALUES
(1, 'testboy@gmail.com', 'user', 'user'),
(2, 'guy@gmail.com', 'user1', 'user'),
(3, 'raynorhere@hotmail.com', 'James T Raynor', 'ThisIsJimmy'),
(4, 'skerr@gmail.com', 'Sarah A Kerrigan', 'QueenOfBlades'),
(5, 'amenethil@yahoo.com', 'Arthas L Menethil', 'PurgeThisAccount');

-- --------------------------------------------------------

--
-- Table structure for table `balance`
--

DROP TABLE IF EXISTS `balance`;
CREATE TABLE `balance` (
  `balance_id` int(13) NOT NULL,
  `account_id` int(13) NOT NULL,
  `balance_total` decimal(11,2) NOT NULL,
  `last_update` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `balance`
--

INSERT INTO `balance` (`balance_id`, `account_id`, `balance_total`, `last_update`) VALUES
(1, 1, '35.55', '2018-11-09 18:38:08.119572'),
(2, 2, '23.33', '2018-11-13 20:18:29.821419'),
(4, 3, '500.00', '2018-11-13 20:21:25.476375'),
(6, 4, '0.05', '2018-11-13 20:33:54.863520'),
(7, 5, '1000000.00', '2018-11-13 20:34:13.965876');

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

DROP TABLE IF EXISTS `transaction`;
CREATE TABLE `transaction` (
  `transaction_id` int(13) NOT NULL,
  `balance_id` int(13) NOT NULL,
  `deposit` float(11,2) DEFAULT NULL,
  `withdraw` float(11,2) DEFAULT NULL,
  `date_of_transaction` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`transaction_id`, `balance_id`, `deposit`, `withdraw`, `date_of_transaction`) VALUES
(1, 1, 55.55, NULL, '2018-11-10 22:16:04'),
(2, 1, NULL, 20.00, '2018-11-13 20:28:20'),
(3, 7, 1000000.00, NULL, '2018-11-13 20:36:00'),
(4, 6, NULL, 99.95, '2018-11-13 20:36:58'),
(5, 4, 500.00, NULL, '2018-11-13 20:37:35');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`account_id`);

--
-- Indexes for table `balance`
--
ALTER TABLE `balance`
  ADD PRIMARY KEY (`balance_id`),
  ADD UNIQUE KEY `account_id` (`account_id`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`transaction_id`),
  ADD KEY `account_id` (`balance_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `account_id` int(13) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `balance`
--
ALTER TABLE `balance`
  MODIFY `balance_id` int(13) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `transaction_id` int(13) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `balance`
--
ALTER TABLE `balance`
  ADD CONSTRAINT `balance_ibfk_1` FOREIGN KEY (`account_id`) REFERENCES `account` (`account_id`);

--
-- Constraints for table `transaction`
--
ALTER TABLE `transaction`
  ADD CONSTRAINT `transaction_ibfk_1` FOREIGN KEY (`balance_id`) REFERENCES `balance` (`balance_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
