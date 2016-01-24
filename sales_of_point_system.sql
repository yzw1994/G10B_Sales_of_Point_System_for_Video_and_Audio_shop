-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 24, 2016 at 04:11 AM
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `sales_of_point_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE IF NOT EXISTS `cart` (
  `Cart_ID` int(15) NOT NULL,
  `Quantity` int(10) NOT NULL,
  `Added_Date` date NOT NULL,
  `Product_ID` int(15) NOT NULL,
  `User_ID` int(15) NOT NULL,
  PRIMARY KEY (`Cart_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `manage`
--

CREATE TABLE IF NOT EXISTS `manage` (
  `Manage_ID` int(15) NOT NULL,
  `Manage_Date` date NOT NULL,
  `Manage_Description` varchar(50) NOT NULL,
  `User_ID` int(15) NOT NULL,
  `Product_ID` int(15) NOT NULL,
  PRIMARY KEY (`Manage_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `Product_ID` int(15) NOT NULL,
  `Product_Name` int(20) NOT NULL,
  `Product_Description` int(100) NOT NULL,
  `Product_Type` int(15) NOT NULL,
  `Product_Category` int(15) NOT NULL,
  `Product_Price` double NOT NULL,
  `Product_Status` varchar(15) NOT NULL,
  PRIMARY KEY (`Product_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `rent`
--

CREATE TABLE IF NOT EXISTS `rent` (
  `Rent_ID` int(15) NOT NULL,
  `Rent_Type` varchar(15) NOT NULL,
  `Rent_Date` date NOT NULL,
  `Rent_Exp_Date` date NOT NULL,
  `User_ID` int(15) NOT NULL,
  `Product_ID` int(15) NOT NULL,
  PRIMARY KEY (`Rent_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sold`
--

CREATE TABLE IF NOT EXISTS `sold` (
  `Sold_ID` int(15) NOT NULL,
  `Sold_Type` varchar(10) NOT NULL,
  `Sold_Date` date NOT NULL,
  `Sold_Price` double NOT NULL,
  `Quantity` int(5) NOT NULL,
  `User_ID` int(15) NOT NULL,
  `Prodcut_ID` int(15) NOT NULL,
  PRIMARY KEY (`Sold_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `User_ID` int(15) NOT NULL,
  `User_Name` varchar(30) NOT NULL,
  `User_Password` varchar(20) NOT NULL,
  `User_Email` varchar(20) NOT NULL,
  `User_Phone` varchar(20) NOT NULL,
  `User_Address` varchar(100) NOT NULL,
  `User_Dob` date NOT NULL,
  `User_Subscribe_Status` varchar(10) NOT NULL,
  `User_Privilege` varchar(15) NOT NULL,
  PRIMARY KEY (`User_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
