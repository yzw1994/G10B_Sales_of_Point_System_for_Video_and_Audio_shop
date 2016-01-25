-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 25, 2016 at 01:38 PM
-- Server version: 5.6.16
-- PHP Version: 5.5.9

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
  `Cart_ID` int(15) NOT NULL AUTO_INCREMENT,
  `Quantity` int(10) NOT NULL,
  `Added_Date` date NOT NULL,
  `Product_ID` int(15) NOT NULL,
  `User_ID` int(15) NOT NULL,
  PRIMARY KEY (`Cart_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `manage`
--

CREATE TABLE IF NOT EXISTS `manage` (
  `Manage_ID` int(15) NOT NULL AUTO_INCREMENT,
  `Manage_Date` date NOT NULL,
  `Manage_Description` varchar(500) NOT NULL,
  `User_ID` int(15) NOT NULL,
  `Product_ID` int(15) NOT NULL,
  PRIMARY KEY (`Manage_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `Product_ID` int(15) NOT NULL AUTO_INCREMENT,
  `Product_Name` varchar(300) NOT NULL,
  `Product_Description` varchar(1000) NOT NULL,
  `Product_Type` int(15) NOT NULL,
  `Product_Category` int(15) NOT NULL,
  `Product_Price` double NOT NULL,
  `Product_Status` varchar(15) NOT NULL,
  PRIMARY KEY (`Product_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `rent`
--

CREATE TABLE IF NOT EXISTS `rent` (
  `Rent_ID` int(15) NOT NULL AUTO_INCREMENT,
  `Rent_Type` varchar(150) NOT NULL,
  `Rent_Date` date NOT NULL,
  `Rent_Exp_Date` date NOT NULL,
  `User_ID` int(15) NOT NULL,
  `Product_ID` int(15) NOT NULL,
  PRIMARY KEY (`Rent_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `sold`
--

CREATE TABLE IF NOT EXISTS `sold` (
  `Sold_ID` int(15) NOT NULL AUTO_INCREMENT,
  `Sold_Type` varchar(100) NOT NULL,
  `Sold_Date` date NOT NULL,
  `Sold_Price` double NOT NULL,
  `Quantity` int(5) NOT NULL,
  `User_ID` int(15) NOT NULL,
  `Prodcut_ID` int(15) NOT NULL,
  PRIMARY KEY (`Sold_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `User_ID` int(15) NOT NULL AUTO_INCREMENT,
  `User_Name` varchar(300) NOT NULL,
  `User_Password` varchar(300) NOT NULL,
  `User_Email` varchar(300) NOT NULL,
  `User_Profile_Pic` varchar(1000) NOT NULL,
  `User_Phone` varchar(30) NOT NULL,
  `User_Address` varchar(300) NOT NULL,
  `User_Dob` date NOT NULL,
  `User_Subscribe_Status` varchar(10) NOT NULL,
  `User_Privilege` varchar(15) NOT NULL,
  PRIMARY KEY (`User_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`User_ID`, `User_Name`, `User_Password`, `User_Email`, `User_Profile_Pic`, `User_Phone`, `User_Address`, `User_Dob`, `User_Subscribe_Status`, `User_Privilege`) VALUES
(1, '', '12345', 'yapchengwei@gmail.com', '', '0109333724', 'dygsankjefvdsjfdsjdesb xiywegjxvd', '1994-06-06', '', ''),
(2, '', '123123123', 'yuanyuan0331@live.com', '', '0177601692', 'sad sad ixora ', '2194-02-11', '', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
