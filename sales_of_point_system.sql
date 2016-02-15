-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 15, 2016 at 07:49 AM
-- Server version: 5.6.14
-- PHP Version: 5.5.6

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
  `Quantity` int(10) NOT NULL DEFAULT '1',
  `Added_Date` date NOT NULL,
  `Product_ID` int(15) NOT NULL,
  `User_ID` int(15) NOT NULL,
  PRIMARY KEY (`Cart_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`Cart_ID`, `Quantity`, `Added_Date`, `Product_ID`, `User_ID`) VALUES
(1, 1, '2016-02-10', 10, 4),
(3, 1, '2016-02-10', 9, 4),
(4, 1, '2016-02-10', 15, 4);

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
  `Product_Name` varchar(255) NOT NULL,
  `Product_Description` varchar(255) NOT NULL,
  `Product_Pic` varchar(255) NOT NULL DEFAULT '../images/default_album.jpg',
  `Product_Type` int(15) NOT NULL,
  `Product_Category` varchar(255) NOT NULL,
  `Product_Price` double NOT NULL,
  `Product_Rent_Price` double NOT NULL DEFAULT '10',
  `Product_Stock` int(11) NOT NULL,
  `Product_Date` date NOT NULL,
  `Product_Status` varchar(15) NOT NULL,
  PRIMARY KEY (`Product_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=89 ;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`Product_ID`, `Product_Name`, `Product_Description`, `Product_Pic`, `Product_Type`, `Product_Category`, `Product_Price`, `Product_Rent_Price`, `Product_Stock`, `Product_Date`, `Product_Status`) VALUES
(1, 'Batman Begins ', 'After training with his mentor, Batman begins his war on crime to free the crime-ridden Gotham City from corruption that the Scarecrow and the League of Shadows have cast upon it.', '../images/product/2Ubatman.jpg', 0, ' Action, Adventure ', 0, 0, 8, '2014-06-10', 'Active'),
(80, 'Batman v Superman: Dawn of Justice', ' Action, Adventure, Fantasy', '../images/product/2Ubatmanvssuperman.jpg', 0, ' Action, Adventure, Fantasy', 20, 25, 2, '2016-02-10', 'Active'),
(81, 'Batman v Superman: Dawn of Justice', ' Action, Adventure, Fantasy', '../images/product/2Ubatmanvssuperman.jpg', 0, ' Action, Adventure, Fantasy', 20, 25, 2, '2016-02-10', 'Active'),
(82, 'Spider-Man', 'When bitten by a genetically modified spider, a nerdy, shy, and awkward high school student gains spider-like abilities that he eventually must use to fight evil as a superhero after tragedy befalls his family.', '../images/product/2Uspiderman.jpg', 0, ' Action, Adventure ', 15, 10, 20, '2002-07-16', 'Active'),
(83, 'Ant-Man', 'Armed with a super-suit with the astonishing ability to shrink in scale but increase in strength, cat burglar Scott Lang must embrace his inner hero and help his mentor, Dr. Hank Pym, plan and pull off a heist that will save the world.', '../images/product/2Uantman.jpg', 0, ' Action, Adventure, Sci-Fi', 25, 22, 10, '2015-11-18', 'Active'),
(84, 'The Amazing Spider-Man ', 'When New York is put under siege by Oscorp, it is up to Spider-Man to save the city he swore to protect as well as his loved ones.', '../images/product/2Uthe amazing spiderman.jpg', 0, ' Action, Adventure, Fantasy', 23, 18, 5, '2015-07-15', 'Active'),
(85, 'Fantastic Four', 'Four young outsiders teleport to an alternate and dangerous universe which alters their physical form in shocking ways. The four must learn to harness their new abilities and work together to save Earth from a former friend turned enemy.', '../images/product/2Ufantasyfour.jpg', 0, ' Action, Adventure, Sci-Fi', 24, 20, 15, '2016-02-17', 'Active'),
(86, 'Deadpool   ', 'A former Special Forces operative turned mercenary is subjected to a rogue experiment that leaves him with accelerated healing powers, adopting the alter ego Deadpool.', '../images/product/2Udeadpool.jpg', 0, ' Action, Adventure, Comedy ', 20, 15, 15, '2016-02-15', 'Unactive'),
(87, 'Warcraft   ', 'An epic fantasy/adventure based on the popular video game series.', '../images/product/2UWarcraft.jpg', 0, ' Action, Adventure, Fantasy', 25, 18, 5, '2016-02-11', 'Coming Soon'),
(88, 'The Conjuring 2', 'Lorraine and Ed Warren travel to north London to help a single mother raising four children alone in a house plagued by malicious spirits.', '../images/product/2UThe Conjuring 2.jpg', 0, 'Horror', 30, 20, 0, '2016-02-29', 'Coming Soon');

-- --------------------------------------------------------

--
-- Table structure for table `rent`
--

CREATE TABLE IF NOT EXISTS `rent` (
  `Rent_ID` int(15) NOT NULL AUTO_INCREMENT,
  `Rent_Type` varchar(150) NOT NULL,
  `Rent_Date` date NOT NULL,
  `Rent_Exp_Date` date NOT NULL,
  `Rent_Price` double NOT NULL,
  `User_ID` int(15) NOT NULL,
  `Product_ID` int(15) NOT NULL,
  PRIMARY KEY (`Rent_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `rent`
--

INSERT INTO `rent` (`Rent_ID`, `Rent_Type`, `Rent_Date`, `Rent_Exp_Date`, `Rent_Price`, `User_ID`, `Product_ID`) VALUES
(1, '1', '2016-02-10', '2016-02-24', 30, 4, 10),
(2, '1', '2016-02-10', '2016-02-24', 20, 4, 9);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `sold`
--

INSERT INTO `sold` (`Sold_ID`, `Sold_Type`, `Sold_Date`, `Sold_Price`, `Quantity`, `User_ID`, `Prodcut_ID`) VALUES
(1, '1', '2016-02-10', 107.97, 3, 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `User_ID` int(15) NOT NULL AUTO_INCREMENT,
  `User_Name` varchar(300) NOT NULL,
  `User_Password` varchar(300) NOT NULL,
  `User_Email` varchar(300) NOT NULL,
  `User_Profile_Pic` varchar(1000) NOT NULL DEFAULT '../images/default_pic.jpg',
  `User_Phone` varchar(30) NOT NULL,
  `User_Address` varchar(300) NOT NULL,
  `User_Dob` date NOT NULL,
  `User_Subscribe_Status` varchar(10) NOT NULL,
  `User_Rent_Limit` int(11) NOT NULL DEFAULT '0',
  `User_Privilege` varchar(15) NOT NULL,
  `User_Date` date NOT NULL,
  PRIMARY KEY (`User_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`User_ID`, `User_Name`, `User_Password`, `User_Email`, `User_Profile_Pic`, `User_Phone`, `User_Address`, `User_Dob`, `User_Subscribe_Status`, `User_Rent_Limit`, `User_Privilege`, `User_Date`) VALUES
(1, 'Yap Cheng Wei', '', 'yapchengwei@gmail.com', '../user/profile_picture/1U18071.jpg', '0109333724', 'dygsankjefvdsjfdsjdesb xiywegjxvd', '1994-06-06', 'Disable', 0, '2', '0000-00-00'),
(2, 'Koh Chee Guan', '202cb962ac59075b964b07152d234b70', 'yuanyuan0331@live.com', '../user/profile_picture/2Ulogo_red.png', '0177601692', 'sad sad ixora ', '2194-02-11', 'Enable', 0, '1', '0000-00-00'),
(3, 'yyy', '123', 'kkk@hsa', '../images/default_pic.jpg', '000000000', 'kajsinmajslas', '0001-06-06', 'Enable', 0, '1', '0000-00-00'),
(4, 'BLUycw', '827ccb0eea8a706c4c34a16891f84e7b', 'cheng.wei1@hotmail.com', '../user/profile_picture/4U10418372_4799357158319_3118693698156310696_n.jpg', '0109333724', 'wasdrfgyufdsgjhjesdfghjigdgfghjkidsfgh', '1994-06-06', 'Disable', 0, '2', '0000-00-00');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
