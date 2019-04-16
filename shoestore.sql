-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 09, 2017 at 04:06 AM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shoestore`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `U_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`U_ID`) VALUES
(2),
(4);

-- --------------------------------------------------------

--
-- Table structure for table `bought`
--

CREATE TABLE `bought` (
  `U_ID` int(11) NOT NULL,
  `P_ID` int(11) NOT NULL,
  `SIZE` int(11) NOT NULL,
  `QUANTITY` int(11) NOT NULL,
  `TRANSACTION_ID` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bought`
--

INSERT INTO `bought` (`U_ID`, `P_ID`, `SIZE`, `QUANTITY`, `TRANSACTION_ID`) VALUES
(1, 1, 5, 12, '2147483647'),
(1, 2, 7, 21, '2147483647'),
(1, 12, 9, 9, '2147483647'),
(2, 13, 6, 2, '2147483647'),
(2, 17, 7, 11, '2147483647'),
(2, 26, 8, 20, '2147483647'),
(2, 31, 5, 1, '2147483647'),
(3, 12, 9, 13, '2147483647'),
(3, 23, 5, 6, '2147483647'),
(4, 4, 10, 15, '2147483647'),
(4, 11, 6, 2, '2147483647'),
(4, 11, 8, 1, '2147483647');

--
-- Triggers `bought`
--
DELIMITER $$
CREATE TRIGGER `order_success` AFTER INSERT ON `bought` FOR EACH ROW delete from cart where U_ID = NEW.U_ID
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `B_ID` int(11) NOT NULL,
  `B_NAME` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`B_ID`, `B_NAME`) VALUES
(1, 'Puma'),
(2, 'Adidas'),
(3, 'Reebok'),
(4, 'Nike');

-- --------------------------------------------------------

--
-- Table structure for table `card_validation`
--

CREATE TABLE `card_validation` (
  `CARD_NO` varchar(255) NOT NULL,
  `EXP_DATE` date NOT NULL,
  `CVV` int(11) NOT NULL,
  `CARD_TYPE` varchar(255) NOT NULL,
  `PIN` int(11) NOT NULL,
  `BALANCE` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `card_validation`
--

INSERT INTO `card_validation` (`CARD_NO`, `EXP_DATE`, `CVV`, `CARD_TYPE`, `PIN`, `BALANCE`) VALUES
('11112222333334444', '2018-01-01', 111, 'Credit', 1234, 5000),
('1234123412341234', '2018-01-01', 111, 'Credit', 1000, 500),
('1234567812345678', '2018-01-01', 111, 'Debit', 1000, 20000),
('2222333344445555', '2018-01-01', 111, 'Debit', 1234, 15000);

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `U_ID` int(11) NOT NULL,
  `P_ID` int(11) NOT NULL,
  `SIZE` int(11) NOT NULL,
  `QUANTITY` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`U_ID`, `P_ID`, `SIZE`, `QUANTITY`) VALUES
(1, 11, 6, 3),
(2, 23, 8, 12),
(3, 21, 4, 5),
(4, 23, 6, 7);

-- --------------------------------------------------------

--
-- Table structure for table `gender_type`
--

CREATE TABLE `gender_type` (
  `GENDER_TYPE_ID` int(11) NOT NULL,
  `GENDER` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gender_type`
--

INSERT INTO `gender_type` (`GENDER_TYPE_ID`, `GENDER`) VALUES
(1, 'Men'),
(2, 'Women'),
(3, 'Unisex');

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `P_ID` int(11) NOT NULL,
  `SIZE` int(11) NOT NULL,
  `QUANTITY` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`P_ID`, `SIZE`, `QUANTITY`) VALUES
(1, 5, 2),
(1, 6, 4),
(1, 7, 5),
(1, 8, 3),
(1, 9, 6),
(1, 10, 3),
(2, 5, 4),
(2, 6, 2),
(2, 7, 5),
(2, 8, 6),
(2, 9, 2),
(2, 10, 3),
(3, 5, 2),
(3, 6, 3),
(3, 7, 2),
(3, 8, 4),
(3, 9, 6),
(3, 10, 2),
(4, 5, 2),
(4, 6, 0),
(4, 7, 2),
(4, 8, 3),
(4, 9, 6),
(4, 10, 3),
(5, 5, 2),
(5, 6, 4),
(5, 7, 2),
(5, 8, 3),
(5, 9, 6),
(5, 10, 3),
(6, 5, 2),
(6, 6, 4),
(6, 7, 2),
(6, 8, 3),
(6, 9, 6),
(6, 10, 3),
(7, 5, 2),
(7, 6, 4),
(7, 7, 2),
(7, 8, 3),
(7, 9, 6),
(7, 10, 3),
(8, 5, 2),
(8, 6, 4),
(8, 7, 2),
(8, 8, 3),
(8, 9, 6),
(8, 10, 3),
(9, 5, 2),
(9, 6, 4),
(9, 7, 2),
(9, 8, 3),
(9, 9, 6),
(9, 10, 3),
(10, 5, 2),
(10, 6, 4),
(10, 7, 2),
(10, 8, 3),
(10, 9, 6),
(10, 10, 3),
(11, 5, 2),
(11, 6, 4),
(11, 7, 2),
(11, 8, 3),
(11, 9, 6),
(11, 10, 3),
(12, 5, 2),
(12, 6, 4),
(12, 7, 2),
(12, 8, 3),
(12, 9, 6),
(12, 10, 3),
(13, 5, 2),
(13, 6, 4),
(13, 7, 2),
(13, 8, 3),
(13, 9, 6),
(13, 10, 3),
(14, 5, 2),
(14, 6, 4),
(14, 7, 2),
(14, 8, 3),
(14, 9, 6),
(14, 10, 3),
(15, 5, 2),
(15, 6, 4),
(15, 7, 2),
(15, 8, 3),
(15, 9, 6),
(15, 10, 3),
(16, 5, 2),
(16, 6, 4),
(16, 7, 2),
(16, 8, 3),
(16, 9, 6),
(16, 10, 3),
(17, 5, 2),
(17, 6, 4),
(17, 7, 2),
(17, 8, 3),
(17, 9, 6),
(17, 10, 3),
(18, 5, 2),
(18, 6, 4),
(18, 7, 2),
(18, 8, 3),
(18, 9, 6),
(18, 10, 3),
(19, 5, 2),
(19, 6, 4),
(19, 7, 2),
(19, 8, 3),
(19, 9, 6),
(19, 10, 3),
(20, 5, 2),
(20, 6, 4),
(20, 7, 2),
(20, 8, 3),
(20, 9, 6),
(20, 10, 3),
(21, 5, 2),
(21, 6, 4),
(21, 7, 2),
(21, 8, 3),
(21, 9, 6),
(21, 10, 3),
(22, 5, 2),
(22, 6, 4),
(22, 7, 2),
(22, 8, 3),
(22, 9, 6),
(22, 10, 3),
(23, 5, 2),
(23, 6, 4),
(23, 7, 2),
(23, 8, 3),
(23, 9, 6),
(23, 10, 3),
(24, 5, 2),
(24, 6, 4),
(24, 7, 2),
(24, 8, 3),
(24, 9, 6),
(24, 10, 3),
(25, 5, 2),
(25, 6, 4),
(25, 7, 2),
(25, 8, 3),
(25, 9, 6),
(25, 10, 3),
(26, 5, 2),
(26, 6, 4),
(26, 7, 2),
(26, 8, 3),
(26, 9, 6),
(26, 10, 3),
(27, 5, 2),
(27, 6, 4),
(27, 7, 2),
(27, 8, 3),
(27, 9, 6),
(27, 10, 3),
(28, 5, 2),
(28, 6, 4),
(28, 7, 2),
(28, 8, 3),
(28, 9, 6),
(28, 10, 3),
(29, 5, 2),
(29, 6, 4),
(29, 7, 2),
(29, 8, 3),
(29, 9, 6),
(29, 10, 3),
(30, 5, 7),
(30, 6, 4),
(30, 7, 2),
(30, 8, 3),
(30, 9, 6),
(30, 10, 3),
(31, 5, 2),
(31, 6, 4),
(31, 7, 2),
(31, 8, 3),
(31, 9, 6),
(31, 10, 3),
(32, 5, 2),
(32, 6, 4),
(32, 7, 2),
(32, 8, 4),
(32, 9, 6),
(32, 10, 3),
(33, 5, 2),
(33, 6, 4),
(33, 7, 3),
(33, 8, 3),
(33, 9, 6),
(33, 10, 3),
(34, 5, 2),
(34, 6, 4),
(34, 7, 2),
(34, 8, 3),
(34, 9, 6),
(34, 10, 3),
(35, 5, 6),
(35, 6, 4),
(35, 7, 2),
(35, 8, 3),
(35, 9, 6),
(35, 10, 3),
(36, 5, 5),
(36, 6, 4),
(36, 7, 2),
(36, 8, 3),
(36, 9, 6),
(36, 10, 3),
(37, 5, -15),
(37, 6, -15),
(37, 7, -15),
(37, 8, -15),
(37, 9, -15),
(37, 10, -15),
(38, 5, -15),
(38, 6, -15),
(38, 7, -15),
(38, 8, -15),
(38, 9, -15),
(38, 10, -15),
(39, 5, -15),
(39, 6, -15),
(39, 7, -15),
(39, 8, -15),
(39, 9, -15),
(39, 10, -15),
(40, 5, -15),
(40, 6, -15),
(40, 7, -15),
(40, 8, -15),
(40, 9, -15),
(40, 10, -15);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `P_ID` int(11) NOT NULL,
  `P_NAME` varchar(255) NOT NULL,
  `P_COST` int(11) NOT NULL,
  `B_ID` int(11) NOT NULL,
  `P_TYPE_ID` int(11) NOT NULL,
  `P_DESC` text NOT NULL,
  `GENDER_TYPE_ID` int(11) NOT NULL,
  `P_COST_BOUGHT` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`P_ID`, `P_NAME`, `P_COST`, `B_ID`, `P_TYPE_ID`, `P_DESC`, `GENDER_TYPE_ID`, `P_COST_BOUGHT`) VALUES
(1, 'Reebok Mens Casual R1231', 55, 3, 1, 'One of the best Reebok Casual. These are Ultra-light', 1, 0),
(2, 'Reebok Womens Casual R1679', 65, 3, 1, 'Women\'s casual shoes with a good modern look', 2, 60),
(3, 'Puma P578 Mens MOSTRO Sneakers', 95, 1, 1, 'The iconic Mostro is taken to new heights in the Sirsa with a fashionable boot upper offering a snug fit, combined with the iconic zig -zag strap closure.', 1, 0),
(4, 'Puma P428 Womens MOSTRO Sneakers', 105, 1, 1, 'The iconic Mostro is taken to new heights in the Sirsa with a fashionable boot upper offering a snug fit, combined with the iconic zig -zag strap closure.', 2, 10),
(5, 'Adidas Mens A574 Sneaker', 93, 2, 1, 'Low-top brushed leather sneakers in white. Round textured rubber cap toe. Tonal lace-up closure. Logo stamp in black and gold-tone at padded tongue.', 1, 0),
(6, 'Adidas Womens A574 Sneaker', 103, 2, 1, 'Low-top brushed leather sneakers in white. Round textured rubber cap toe. Tonal lace-up closure. Logo stamp in black and gold-tone at padded tongue.', 2, 10),
(7, 'Nike Mens Casual N7279', 85, 4, 1, 'Nike\'s shoes are best in Casual Or Sneakers range', 1, 0),
(8, 'Nike Womens Casual N9320', 55, 4, 1, 'Nike\'s shoes are best in Casual Or Sneakers range', 2, 0),
(9, 'Puma Mens Formal P4982', 75, 1, 2, 'Puma\'s good Formal are best for job interviews', 1, 0),
(10, 'Puma Womens Formal P9923', 93, 1, 2, 'Puma\'s good Formal are best for job interviews', 2, 0),
(11, 'Adidas Mens Formal A3489', 47, 2, 2, 'Adidas\'s good Formal are best for job interviews', 1, 0),
(12, 'Adidas Womens Formal A3782', 39, 2, 2, 'Adidas\'s good Formal are best for job interviews', 2, 0),
(13, 'Reebok Mens Formal R5416', 73, 3, 2, 'Reebok\'s good Formal are best for job interviews', 1, 0),
(14, 'Reebok Womens Formal R3213', 63, 3, 2, 'Reebok\'s good Formal are best for job interviews', 2, 0),
(15, 'Nike Mens Formal R3213', 83, 4, 2, 'Nike\'s good Formal are best for job interviews', 1, 0),
(16, 'Nike Womens Formal R3213', 95, 4, 2, 'Nike\'s good Formal are best for job interviews', 2, 20),
(17, 'Puma Mens Running P7982', 85, 1, 3, 'Attack the pavement, trails or any route with men\'s running shoes equipped with the latest Puma footwear technologies.', 1, 0),
(18, 'Puma Womens Running P7923', 83, 1, 3, 'Attack the pavement, trails or any route with women\'s running shoes equipped with the latest Puma footwear technologies.', 2, 0),
(19, 'Adidas Mens Running A7489', 57, 2, 3, 'Attack the pavement, trails or any route with men\'s running shoes equipped with the latest Adidas footwear technologies.', 1, 0),
(20, 'Adidas Womens Running A7782', 59, 2, 3, 'Attack the pavement, trails or any route with women\'s running shoes equipped with the latest Adidas footwear technologies.', 2, 0),
(21, 'Reebok Mens Running R7416', 53, 3, 3, 'Attack the pavement, trails or any route with men\'s running shoes equipped with the latest Reebok footwear technologies.', 1, 0),
(22, 'Reebok Womens Running R7213', 33, 3, 3, 'Attack the pavement, trails or any route with women\'s running shoes equipped with the latest Reebok footwear technologies.', 2, 0),
(23, 'Nike Mens Running R7213', 63, 4, 3, 'Attack the pavement, trails or any route with men\'s running shoes equipped with the latest Nike footwear technologies.', 1, 0),
(24, 'Nike Womens Running R7213', 85, 4, 3, 'Attack the pavement, trails or any route with women\'s running shoes equipped with the latest Nike footwear technologies.', 2, 0),
(25, 'Reebok Unisex Casual R1231', 75, 3, 1, 'One of the best Reebok Casual. These are Ultra-light', 3, 0),
(26, 'Puma P578 Unisex MOSTRO Sneakers', 65, 1, 1, 'The iconic Mostro is taken to new heights in the Sirsa with a fashionable boot upper offering a snug fit, combined with the iconic zig -zag strap closure.', 3, 0),
(27, 'Adidas Unisex A574 Sneaker', 73, 2, 1, 'Low-top brushed leather sneakers in white. Round textured rubber cap toe. Tonal lace-up closure. Logo stamp in black and gold-tone at padded tongue.', 3, 0),
(28, 'Nike Unisex Casual N7279', 75, 4, 1, 'Nike\'s shoes are best in Casual Or Sneakers range', 3, 0),
(29, 'Puma Unisex Formal P4982', 95, 1, 2, 'Puma\'s good Formal are best for job interviews', 3, 0),
(30, 'Adidas Unisex Formal A3489', 79, 2, 2, 'Adidas\'s good Formal are best for job interviews', 3, 0),
(31, 'Reebok Unisex Formal R5416', 69, 3, 2, 'Reebok\'s good Formal are best for job interviews', 3, 0),
(32, 'Nike Unisex Formal R3213', 59, 4, 2, 'Nike\'s good Formal are best for job interviews', 3, 0),
(33, 'Puma Unisex Running P7982', 80, 1, 3, 'Attack the pavement, trails or any route with running shoes equipped with the latest Puma footwear technologies.', 3, 0),
(34, 'Adidas Unisex Running A7489', 49, 2, 3, 'Attack the pavement, trails or any route with running shoes equipped with the latest Adidas footwear technologies.', 3, 0),
(35, 'Reebok Unisex Running R7416', 39, 3, 3, 'Attack the pavement, trails or any route with  running shoes equipped with the latest Reebok footwear technologies.', 3, 0),
(36, 'Nike Unisex Running R7213', 29, 4, 3, 'Attack the pavement, trails or any route with running shoes equipped with the latest Nike footwear technologies.', 3, 0),
(37, 'Reebok M8761 Casual', 99, 3, 1, 'Brand new Reeboks', 1, 0),
(38, 'dwd1', 120, 1, 1, '1', 1, 0),
(39, 'Reebok M8fre761 Casual', 22, 2, 2, 'weq', 2, 0),
(40, 'Reebok Running Mens R3124', 99, 3, 3, 'Best Running shoes', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `p_type`
--

CREATE TABLE `p_type` (
  `P_TYPE_ID` int(11) NOT NULL,
  `P_TYPE_NAME` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `p_type`
--

INSERT INTO `p_type` (`P_TYPE_ID`, `P_TYPE_NAME`) VALUES
(1, 'Casual'),
(2, 'Formal'),
(3, 'Running');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `R_ID` int(11) NOT NULL,
  `U_ID` int(11) NOT NULL,
  `P_ID` int(11) NOT NULL,
  `REVIEW` text NOT NULL,
  `AUTHORIZE` int(11) NOT NULL,
  `TIME` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `RATINGS` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`R_ID`, `U_ID`, `P_ID`, `REVIEW`, `AUTHORIZE`, `TIME`, `RATINGS`) VALUES
(1, 4, 11, 'A very good product', 1, '2017-12-08 02:16:21', 10),
(2, 4, 11, 'Good product', 1, '2017-12-08 02:24:41', 5),
(3, 1, 1, 'Wow amazing product', 0, '2017-12-08 14:44:12', 7),
(4, 2, 12, 'Best product to buy', 0, '2017-12-08 14:44:12', 8),
(5, 2, 1, 'Wow amazing product', 0, '2017-12-08 14:45:10', 5),
(6, 3, 12, 'Best product to buy', 1, '2017-12-08 14:45:10', 6),
(7, 7, 5, 'Bad product', 1, '2017-12-08 14:47:26', 1),
(8, 13, 13, 'Worst product', 1, '2017-12-08 14:47:26', 1);

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `TRANSACTION_ID` varchar(25) NOT NULL,
  `TIME` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ACTUAL_AMOUNT` float NOT NULL,
  `CARD_TYPE` varchar(255) NOT NULL,
  `CARD_NUMBER` varchar(255) NOT NULL,
  `C_NAME` varchar(100) NOT NULL,
  `RESULT` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`TRANSACTION_ID`, `TIME`, `ACTUAL_AMOUNT`, `CARD_TYPE`, `CARD_NUMBER`, `C_NAME`, `RESULT`) VALUES
('15127262264', '2017-12-08 04:43:46', 103, 'debit', '4444333322221111', 'Omkar Sawant', 'FAILED'),
('15127266434', '2017-12-08 04:50:43', 103, 'debit', '4444333322221111', 'Omkar Sawant', 'SUCCESS'),
('15127269544', '2017-12-08 04:55:54', 103, 'debit', '4444333322221111', 'Omkar Sawant', 'SUCCESS'),
('15127275974', '2017-12-08 05:06:37', 103, 'debit', '4444333322221111', 'Omkar Sawant', 'SUCCESS'),
('15127277394', '2017-12-08 05:08:59', 103, 'debit', '4444333322221111', 'Omkar Sawant', 'SUCCESS'),
('2147483647', '2017-12-04 06:54:25', 309, 'debit', '4444333322221111', 'test', 'SUCCESS');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `U_ID` int(11) NOT NULL,
  `U_EMAIL` varchar(255) NOT NULL,
  `U_GENDER` varchar(255) NOT NULL,
  `U_PASSWORD` varchar(255) NOT NULL,
  `U_FIRST_NAME` varchar(255) NOT NULL,
  `U_LAST_NAME` varchar(255) NOT NULL,
  `U_DOB` date NOT NULL,
  `U_MOBILE_NUMBER` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`U_ID`, `U_EMAIL`, `U_GENDER`, `U_PASSWORD`, `U_FIRST_NAME`, `U_LAST_NAME`, `U_DOB`, `U_MOBILE_NUMBER`) VALUES
(1, 'rohit.surana3008@gmail.com', 'M', '1', 'Rohit', 'Surana', '1995-08-30', 2147483647),
(2, 'pratik@gmail.com', 'M', '1', 'Pratik', 'Thakkar', '1995-08-30', 2147483647),
(3, 'omkar@gmail.com', 'M', '12345', 'Omkar', 'Sawant', '1996-01-30', 2147483647),
(4, 'joe@friends.com', 'Male', 'aaa', 'Joe', 'Tribiani', '1991-03-14', 2147483647);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`U_ID`);

--
-- Indexes for table `bought`
--
ALTER TABLE `bought`
  ADD PRIMARY KEY (`U_ID`,`P_ID`,`SIZE`,`TRANSACTION_ID`) USING BTREE,
  ADD KEY `USER_PID_FK` (`P_ID`),
  ADD KEY `USER_TRANSACTION_FK` (`TRANSACTION_ID`) USING BTREE;

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`B_ID`);

--
-- Indexes for table `card_validation`
--
ALTER TABLE `card_validation`
  ADD PRIMARY KEY (`CARD_NO`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`U_ID`,`P_ID`,`SIZE`),
  ADD KEY `foreign_pid` (`P_ID`);

--
-- Indexes for table `gender_type`
--
ALTER TABLE `gender_type`
  ADD PRIMARY KEY (`GENDER_TYPE_ID`);

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`P_ID`,`SIZE`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`P_ID`),
  ADD KEY `PRODUCTS_BRAND_FK` (`B_ID`),
  ADD KEY `PRODUCTS_TYPE_FK` (`P_TYPE_ID`),
  ADD KEY `PRODUCTS_GENDER_FK` (`GENDER_TYPE_ID`);

--
-- Indexes for table `p_type`
--
ALTER TABLE `p_type`
  ADD PRIMARY KEY (`P_TYPE_ID`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`R_ID`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`TRANSACTION_ID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`U_ID`),
  ADD UNIQUE KEY `U_EMAIL` (`U_EMAIL`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `B_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `gender_type`
--
ALTER TABLE `gender_type`
  MODIFY `GENDER_TYPE_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `P_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT for table `p_type`
--
ALTER TABLE `p_type`
  MODIFY `P_TYPE_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `U_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `bought`
--
ALTER TABLE `bought`
  ADD CONSTRAINT `FK_TRANSACTION` FOREIGN KEY (`TRANSACTION_ID`) REFERENCES `transaction` (`TRANSACTION_ID`),
  ADD CONSTRAINT `USER_PID_FK` FOREIGN KEY (`P_ID`) REFERENCES `products` (`P_ID`) ON DELETE CASCADE,
  ADD CONSTRAINT `USER__FK` FOREIGN KEY (`U_ID`) REFERENCES `user` (`U_ID`) ON DELETE CASCADE;

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`U_ID`) REFERENCES `user` (`U_ID`) ON DELETE CASCADE,
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`P_ID`) REFERENCES `products` (`P_ID`) ON DELETE CASCADE;

--
-- Constraints for table `inventory`
--
ALTER TABLE `inventory`
  ADD CONSTRAINT `INVENTORY_FK` FOREIGN KEY (`P_ID`) REFERENCES `products` (`P_ID`) ON DELETE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `PRODUCTS_BRAND_FK` FOREIGN KEY (`B_ID`) REFERENCES `brand` (`B_ID`) ON DELETE CASCADE,
  ADD CONSTRAINT `PRODUCTS_GENDER_FK` FOREIGN KEY (`GENDER_TYPE_ID`) REFERENCES `gender_type` (`GENDER_TYPE_ID`) ON DELETE CASCADE,
  ADD CONSTRAINT `PRODUCTS_TYPE_FK` FOREIGN KEY (`P_TYPE_ID`) REFERENCES `p_type` (`P_TYPE_ID`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
