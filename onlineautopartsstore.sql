-- phpMyAdmin SQL Dump
-- version 4.4.15.5
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Dec 06, 2016 at 03:49 PM
-- Server version: 5.5.49-log
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `onlineautopartsstore`
--
CREATE DATABASE IF NOT EXISTS `onlineautopartsstore` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `onlineautopartsstore`;

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE IF NOT EXISTS `cart` (
  `user_ID` int(11) NOT NULL,
  `item_ID` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`user_ID`, `item_ID`, `quantity`) VALUES
(2, 9, 1),
(6, 15, 1);

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE IF NOT EXISTS `item` (
  `item_ID` int(11) NOT NULL,
  `item_name` varchar(100) NOT NULL,
  `price` float NOT NULL,
  `num_available` int(11) NOT NULL,
  `category` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `tags` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`item_ID`, `item_name`, `price`, `num_available`, `category`, `description`, `tags`) VALUES
(3, 'Duralast Break Pads', 24.99, 24, 'brake', 'This is a test brake', 'brake brakes duralast'),
(4, 'Duralast Break Rotors', 39.99, 13, 'brake', 'This is a test rotor', 'brake brakes duralast rotor rotors'),
(5, 'Duralast Break Hose', 13.5, 2, 'brake', 'This is a test brake hose', 'brake brakes duralast hose front'),
(6, 'Surefire Engine', 499.99, 12, 'engine mechanical', 'This is a test engine', 'engine surefire sure fire '),
(7, 'Valvoline Engine Oil', 6, 24, 'engine mechanical', 'This is a test engine oil', 'engine oil valvoline'),
(8, 'Surefire Engine Cylinder Head', 500.99, 4, 'engine mechanical', 'This is a test engine head', 'engine sure fire surefire head cylinder'),
(9, 'Walker Exhaust Pipe', 14.99, 3, 'exhaust', 'This is a test exhaust pipe', 'walker exhaust pipe'),
(10, 'Thrush Turbo Exhaust Muffler', 13.99, 24, 'exhaust', 'This is a test exhaust muffler', 'exhaust'),
(12, 'Wheel', 10.75, 9, 'steering', 'This is a test wheel', 'Tags'),
(14, 'Autozone Transmission Fluid\r\n', 5.99, 22, 'transmission', 'This is a test transmission fluid ', 'transmission fluid automatic'),
(15, 'Valvoline Transmission Fluid\r\n', 6.99, 17, 'transmission', 'transmission fluid test', 'transmission fluid test');

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE IF NOT EXISTS `transaction` (
  `transaction_ID` int(11) NOT NULL,
  `date` varchar(100) NOT NULL,
  `total_price` float NOT NULL,
  `address` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL,
  `Zip` int(11) NOT NULL,
  `credit_card` int(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`transaction_ID`, `date`, `total_price`, `address`, `city`, `state`, `Zip`, `credit_card`) VALUES
(31, 'test date', 216500, '2800 Waterview Parkway', 'Richardson', 'Texas', 0, 0),
(32, 'test date', 108250, '1234 royal lane', 'dallas', 'texas', 0, 0),
(33, 'test date', 108261, '100 prince view', 'bedford', 'texas', 0, 0),
(34, 'test date', 108250, 'ok', 'ok', 'ok', 0, 0),
(35, 'test date', 108250, 'k', 'k', 'sa', 0, 0),
(36, 'Monday 28th of November 2016 10:21:10 PM', 108250, 'date test', 'date test', 'date test', 0, 0),
(37, 'Thursday 1st of December 2016 01:03:44 AM', 108261, 'ok test', 'ok test', 'ok test', 0, 0),
(38, 'Thursday 1st of December 2016 02:02:42 AM', 108250, 'testing again', 'testting again', 'testing again', 0, 0),
(39, 'Thursday 1st of December 2016 02:05:11 AM', 108250, 'one final time', 'one final time', 'one final time', 0, 0),
(40, 'Thursday 1st of December 2016 02:05:12 AM', 108250, 'one final time', 'one final time', 'one final time', 0, 0),
(41, 'Thursday 1st of December 2016 02:09:26 AM', 108250, 'Another test again', 'Another test again', 'Another test again', 0, 0),
(42, 'Sunday 4th of December 2016 07:37:22 PM', 15.1442, 'ok', 'ok', 'ok', 0, 0),
(43, 'Monday 5th of December 2016 07:10:55 PM', 7.56668, 'test', 'tes', 'test', 0, 0),
(44, 'Monday 5th of December 2016 07:14:42 PM', 20.535, 'ok', 'ok', 'ok', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `transaction_items`
--

CREATE TABLE IF NOT EXISTS `transaction_items` (
  `transaction_ID` int(11) NOT NULL,
  `item_ID` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaction_items`
--

INSERT INTO `transaction_items` (`transaction_ID`, `item_ID`, `quantity`) VALUES
(42, 10, 1),
(43, 15, 1),
(44, 14, 1),
(44, 15, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `user_ID` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `hashed_password` varchar(200) NOT NULL,
  `phone_number` varchar(12) NOT NULL,
  `is_admin` tinyint(1) NOT NULL,
  `street_address` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `state` varchar(20) NOT NULL,
  `zip` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_ID`, `first_name`, `last_name`, `email`, `hashed_password`, `phone_number`, `is_admin`, `street_address`, `city`, `state`, `zip`) VALUES
(1, 'John', 'Smith', 'John.Smith@gmail.com', 'password', '1234567891', 0, '1234 fake', 'dallas', 'texas', 75021),
(2, 'elon', 'musk', 'elon@tesla.com', 'password', '', 1, '', '', '', 0),
(3, 'bill', 'gates', 'bill.gates@microsoft.com', '12345678', '', 0, '', '', '', 0),
(6, 'admin', 'admin', 'admin@gmail.com', '$2y$10$xHKgwjfRMmpsQ5fC3ZJIWedjvaGuXBQGzr6rTZwmHC4MfptYQk52a', '', 1, '', '', '', 0),
(7, 'User', 'User', 'user@gmail.com', '$2y$10$fNr9IF65vj.rLAMB/3/pkuwp2Jq6BvRS7mg4G1ug1kZ8dHtshIfN2', '', 0, '', '', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_transactions`
--

CREATE TABLE IF NOT EXISTS `user_transactions` (
  `user_ID` int(11) NOT NULL,
  `transaction_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_transactions`
--

INSERT INTO `user_transactions` (`user_ID`, `transaction_ID`) VALUES
(2, 34),
(2, 35),
(2, 36),
(2, 38),
(2, 39),
(2, 40),
(2, 41),
(2, 42),
(7, 43),
(6, 44);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`user_ID`,`item_ID`),
  ADD KEY `Cart Item Foreign Key` (`item_ID`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`item_ID`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`transaction_ID`),
  ADD KEY `user_ID` (`date`);

--
-- Indexes for table `transaction_items`
--
ALTER TABLE `transaction_items`
  ADD PRIMARY KEY (`transaction_ID`,`item_ID`) USING BTREE,
  ADD KEY `Transaction_Items Item Foreign Key` (`item_ID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_ID`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `user_transactions`
--
ALTER TABLE `user_transactions`
  ADD PRIMARY KEY (`user_ID`,`transaction_ID`),
  ADD KEY `User_Transactions Transaction Foreign Key` (`transaction_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `item_ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `transaction_ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=45;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `Cart Item Foreign Key` FOREIGN KEY (`item_ID`) REFERENCES `item` (`item_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Cart User Foreign Key` FOREIGN KEY (`user_ID`) REFERENCES `user` (`user_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `transaction_items`
--
ALTER TABLE `transaction_items`
  ADD CONSTRAINT `Transaction_Items Item Foreign Key` FOREIGN KEY (`item_ID`) REFERENCES `item` (`item_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Transaction_Items Transaction Foreign Key` FOREIGN KEY (`transaction_ID`) REFERENCES `transaction` (`transaction_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_transactions`
--
ALTER TABLE `user_transactions`
  ADD CONSTRAINT `User_Transactions Transaction Foreign Key` FOREIGN KEY (`transaction_ID`) REFERENCES `transaction` (`transaction_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `User_Transactions User Foreign Key` FOREIGN KEY (`user_ID`) REFERENCES `user` (`user_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
