-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 06, 2018 at 05:42 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `first_db1`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

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
(10, 'php@php.net', 'phpuser', '$2y$10$rpETPxUSPlzZDgOrdLQTA.xZ/PDOK7MB/9iT/ofATSpmUV8wS.S3W', 15.22, 2),
(11, 'tester@gmail.com', 'testboy2', '$2y$10$XsPnNoS1InsA7aGBK0Ryiu3Ceb1kckE6UsWztJ87TzuSkdklrfM1.', 50.25, 1),
(12, 'php@php.net', '12345', '$2y$10$Fm1sAC/OnE.fS7bUtA9oqO/KoFJGDtEWrURQjZvKV2iqYw55A1bZi', 150.00, 1),
(13, 'test@testmail.com', 'testing', '$2y$10$HfoQ6OcQ6zOHcsb8bppARemR9YmmhdeOqwtkTZ/kZyNPyyBOL53W6', 55.22, 1),
(24, 'user@mail.com', 'user', '$2y$10$Ftn6FDWTqy92AcsOyLxd7O0FuNfeKAE8I3JneHCSVKILWpRFpF15q', 1000000.00, 1),
(25, 'user1@gmail.com', 'user1', '$2y$10$KoOUTfRXq98GSifxuKdfP.GSjADZdiYCHiCNaeCTBZqN1N39yn/l.', 35.00, 1),
(26, '1234@gmail.com', '1234', '$2y$10$beHvd6NIROn7iu.EQv7LrupF1XksCoyfgufyjiKF6w8BkJDWL699.', 15.33, 1),
(27, 'newONe@yahoo.com', 'newOne', '$2y$10$m17tOiAaYGLc7SYleoBk4ORgxvE.rrI1I/A0R9YYlfV4vAGOVL8yi', 0.00, 1);

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `transaction_id` int(13) NOT NULL,
  `account_id` int(13) NOT NULL,
  `recipient` varchar(255) NOT NULL,
  `amount` float(11,2) NOT NULL,
  `transaction_type` varchar(255) NOT NULL,
  `date_of_transaction` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`transaction_id`, `account_id`, `recipient`, `amount`, `transaction_type`, `date_of_transaction`) VALUES
(7, 10, 'phpuser', 15.22, 'Deposit', '2018-12-06 00:15:38'),
(8, 24, 'user', 24.00, 'Deposit', '2018-12-06 00:15:43'),
(9, 11, 'Wal-Mart', 200.00, 'Withdraw', '2018-12-06 01:59:10'),
(10, 12, '12345', 200.00, 'Deposit', '2018-12-06 01:59:56'),
(11, 13, 'testing', 150.00, 'Deposit', '2018-12-06 02:00:24'),
(12, 24, 'Target', 1000.00, 'Deposit', '2018-12-06 14:54:00'),
(13, 24, 'McDonalds', 500.00, 'Withdraw', '2018-12-06 14:53:31'),
(14, 25, 'userr1', 50.00, 'Deposit', '2018-12-06 02:02:03'),
(15, 25, 'userr1', 50.00, 'Deposit', '2018-12-06 02:02:03'),
(16, 26, 'McDonalds', 5000.00, 'Withdraw', '2018-12-06 02:02:50'),
(17, 24, 'Kroger', 27.00, 'Deposit', '2018-12-06 14:54:08');

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
  MODIFY `account_id` int(13) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `transaction_id` int(13) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `transaction`
--
ALTER TABLE `transaction`
  ADD CONSTRAINT `FOREIGN KEY` FOREIGN KEY (`account_id`) REFERENCES `account` (`account_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
