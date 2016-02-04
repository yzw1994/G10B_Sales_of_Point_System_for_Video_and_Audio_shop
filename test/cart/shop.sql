-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 04, 2016 at 03:54 PM
-- Server version: 5.5.32
-- PHP Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `shop`
--
CREATE DATABASE IF NOT EXISTS `shop` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `shop`;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `admin_id` int(11) NOT NULL AUTO_INCREMENT,
  `admin_name` varchar(50) NOT NULL,
  `admin_password` varchar(50) NOT NULL,
  `ad_username` varchar(50) NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_name`, `admin_password`, `ad_username`) VALUES
(1, '    Koh Jin Yi 444 7ttt77ttt  ', '12345', 'jykoh');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE IF NOT EXISTS `cart` (
  `Cart_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Product_Name` mediumtext NOT NULL,
  `Product_ID` int(11) NOT NULL,
  `Product_Price` decimal(10,0) NOT NULL,
  `Product_Quantity` int(111) NOT NULL,
  `Customer_ID` int(100) NOT NULL,
  PRIMARY KEY (`Cart_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=32 ;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`Cart_ID`, `Product_Name`, `Product_ID`, `Product_Price`, `Product_Quantity`, `Customer_ID`) VALUES
(28, 'q', 5, '33', 2, 0),
(29, 'qr', 6, '33', 1, 1),
(30, 'qr', 6, '33', 1, 1),
(31, 'dd', 8, '44', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE IF NOT EXISTS `customer` (
  `customer_id` int(100) NOT NULL,
  `customer_name` varchar(1000) NOT NULL,
  `customer_password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `customer_name`, `customer_password`) VALUES
(1, 'admin', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `image`
--

CREATE TABLE IF NOT EXISTS `image` (
  `product_id` int(11) NOT NULL AUTO_INCREMENT,
  `image` varchar(1000) NOT NULL,
  PRIMARY KEY (`product_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `image`
--

INSERT INTO `image` (`product_id`, `image`) VALUES
(1, 'd2Z4CEba6jBiWnhm.gif.gif');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `Product_ID` int(15) NOT NULL AUTO_INCREMENT,
  `Product_Name` varchar(20) NOT NULL,
  `Product_Description` varchar(100) NOT NULL,
  `Product_Type` varchar(15) NOT NULL,
  `Product_Category` varchar(15) NOT NULL,
  `Product_Price` decimal(10,0) NOT NULL,
  `Product_Status` varchar(15) NOT NULL,
  `Product_Quantity` int(111) NOT NULL,
  `total` decimal(10,0) NOT NULL,
  PRIMARY KEY (`Product_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`Product_ID`, `Product_Name`, `Product_Description`, `Product_Type`, `Product_Category`, `Product_Price`, `Product_Status`, `Product_Quantity`, `total`) VALUES
(5, 'q', '33', '33', '33', '2', 'active', 33, '0'),
(6, 'qr', '33', '33', '33', '3', 'unactive', 33, '0'),
(8, 'dd', '44', '44', '4', '4', 'active', 4, '0'),
(9, 'ee', '44', '44', '4', '5', 'active', 4, '0');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` text,
  `price` double NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `price`) VALUES
(1, 'noon', 'nai', 2),
(2, 'noon2', 'affaf', 3);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `User_ID` int(15) NOT NULL,
  `User_Name` varchar(30) NOT NULL,
  `User_Password` varchar(20) NOT NULL,
  `User_Email` varchar(100) NOT NULL,
  `User_Phone` varchar(20) NOT NULL,
  `User_Address` varchar(100) NOT NULL,
  `User_Dob` date NOT NULL,
  `User_Subscribe_Status` varchar(10) NOT NULL,
  `User_Privilege` varchar(15) NOT NULL,
  PRIMARY KEY (`User_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`User_ID`, `User_Name`, `User_Password`, `User_Email`, `User_Phone`, `User_Address`, `User_Dob`, `User_Subscribe_Status`, `User_Privilege`) VALUES
(1, 'admin', '12345', 'jinyi_313@hotmail.co', '0183130800', '3,jln damai', '1994-03-13', 'none', 'none');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
