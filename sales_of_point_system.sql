-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 03, 2016 at 06:02 AM
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
  `Product_Pic` varchar(1000) NOT NULL DEFAULT '../images/default_album.jpg',
  `Product_Type` int(15) NOT NULL,
  `Product_Category` varchar(500) NOT NULL,
  `Product_Price` double NOT NULL,
  `Product_Rent_Price` double NOT NULL DEFAULT '10',
  `Product_Status` varchar(15) NOT NULL,
  PRIMARY KEY (`Product_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`Product_ID`, `Product_Name`, `Product_Description`, `Product_Pic`, `Product_Type`, `Product_Category`, `Product_Price`, `Product_Rent_Price`, `Product_Status`) VALUES
(1, 'adellssssssssssssssssssssssssssss', 'yasfcvbayvs,bs,gkiu,bxh,sjbxgjgxbsd', '../images/default_album.jpg', 2, 'jazz', 35.99, 10, '1'),
(2, 'Unorthodox Jukebox', 'usygabxlisabx,d,jashsaybgxkxhasbyxusygabxlisabx,d,jashsaybgxkxhasbyxusygabxlisabx,d,jashsaybgxkxhasbyxusygabxlisabx,d,jashsaybgxkxhasbyxusygabxlisabx,d,jashsaybgxkxhasbyxusygabxlisabx,d,jashsaybgxkxhasbyxusygabxlisabx,d,jashsaybgxkxhasbyxusygabxlisabx,d,jashsaybgxkxhasbyxusygabxlisabx,d,jashsaybgxkxhasbyxusygabxlisabx,d,jashsaybgxkxhasbyxusygabxlisabx,d,jashsaybgxkxhasbyxusygabxlisabx,d,jashsaybgxkxhasbyxusygabxlisabx,d,jashsaybgxkxhasbyxusygabxlisabx,d,jashsaybgxkxhasbyxusygabxlisabx,d,jashsaybgxkxhasbyxusygabxlisabx,d,jashsaybgxkxhasbyxusygabxlisabx,d,jashsaybgxkxhasbyxusygabxlisabx,d,jashsaybgxkxhasbyxusygabxlisabx,d,jashsaybgxkxhasbyxusygabxlisabx,d,jashsaybgxkxhasbyxusygabxlisabx,d,jashsaybgxkxhasbyxusygabxlisabx,d,jashsaybgxkxhasbyxllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllll', '../images/default_album.jpg', 2, 'jazz', 49.9, 11.99, '1'),
(3, 'The Avengers', 'Avengerssdcfvgbhnkjmerctvgbuhnkjgvhaskxivkjygxybsdahjbclhfuywebd', '../images/default_album.jpg', 1, 'Adventure', 59.99, 29.99, '1'),
(4, 'Avengers: Age of Ultron', 'AvengerssdcfvgbhnkjmerctvgbuhnkjgvhaskxivkjygxybsdahjbclhfuywebdAvengerssdcfvgbhnkjmerctvgbuhnkjgvhaskxivkjygxybsdahjbclhfuywebd', '../images/default_album.jpg', 1, 'Adventure', 67.99, 27.99, '1'),
(5, 'Batman v Superman: Dawn of Justice', 'Batman v Superman: Dawn of Justiceafdgzna bv ??Xv ZMHGXv as bx,jhb xmnzbxmn sx,vh,xasv x XnZ???????????????????DFDS CSSCS', '../images/default_album.jpg', 1, 'Action', 60, 30, '3'),
(6, 'Suicide Squad ', 'Suicide Squadqskwnsijanuxbaskxb,kjasb,kgvausdvjsvxkh,vdcgulewvhb,sjdab,abedkjgewldv,sdgvg awgeksxhvc,j,sgai.dewdwedewdewe', '../images/default_album.jpg', 1, 'Action', 60.99, 29.99, '3'),
(9, 'London Has Fallen', 'Actionsahjveufbgugbzuygfoub fgyakevufegkufgqk fugkuyqfdwefefearf', '../images/default_album.jpg', 1, 'Action', 99.99, 10, '3'),
(10, 'Triple 9', 'dwedwedweaferhrtgretafef', '../images/default_album.jpg', 1, 'Fantasy', 19.99, 10, '3'),
(11, 'Miracles from Heaven', 'FAGHZJXJVASHBJXHMSAVHJXB,HSGYXJHB SXHSGUJASXXSSAXSAX', '../images/default_album.jpg', 1, 'Story', 40.99, 10, '3'),
(12, 'I Saw the Light', 'qstrwqhnisqwfcsuwqxebuwegwbdnlwbgzydtg wuad5wafeDYyfiyesgdcdbskhjdcsd', '../images/default_album.jpg', 1, 'Story', 39.99, 10, '3'),
(13, 'Doctor Strange', '12twf12ygwyt2fe7qhuzerzwigbxuetrfliegryxfrkzezgvwtfdfewhxferfer', '../images/default_album.jpg', 1, 'Sci-fi', 88.99, 10, '3'),
(14, 'Fantastic Beasts and Where to Find Them', 'qwhguwgeuydvbeuhfbgiyetgfoigeyitgbwuzhbwegfduegqfyrgfbouyqrgfuerbqgffiyerfzerferfqerfer', '../images/default_album.jpg', 1, 'Fantasy', 90.99, 10, '3'),
(15, 'The Founder ', 'hwgvyzvweyidwugfiywgfuwgfqyurbqerybedhvayiubzhdszyibchbajzcbkjdgfkcbjhflb fuebfuakengbfefaerferfref', '../images/default_album.jpg', 1, 'Drama', 67.99, 10, '3');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `rent`
--

INSERT INTO `rent` (`Rent_ID`, `Rent_Type`, `Rent_Date`, `Rent_Exp_Date`, `Rent_Price`, `User_ID`, `Product_ID`) VALUES
(1, '1', '2016-01-31', '2016-02-14', 35.97, 1, 2),
(3, '1', '2016-01-31', '2016-02-14', 10, 1, 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `sold`
--

INSERT INTO `sold` (`Sold_ID`, `Sold_Type`, `Sold_Date`, `Sold_Price`, `Quantity`, `User_ID`, `Prodcut_ID`) VALUES
(1, '1', '0000-00-00', 35.99, 3, 1, 1),
(2, '1', '2016-01-31', 35.99, 4, 1, 1),
(3, '1', '2016-01-31', 49.9, 3, 1, 2),
(4, '1', '2016-01-31', 49.9, 3, 1, 2),
(5, '1', '2016-01-31', 0, 3, 1, 2),
(6, '1', '2016-01-31', 149.7, 3, 1, 2),
(7, '1', '2016-01-31', 149.7, 3, 1, 2);

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
  `User_Privilege` varchar(15) NOT NULL,
  PRIMARY KEY (`User_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`User_ID`, `User_Name`, `User_Password`, `User_Email`, `User_Profile_Pic`, `User_Phone`, `User_Address`, `User_Dob`, `User_Subscribe_Status`, `User_Privilege`) VALUES
(1, 'Yap Cheng Wei', '', 'yapchengwei@gmail.com', '../user/profile_picture/1U18071.jpg', '0109333724', 'dygsankjefvdsjfdsjdesb xiywegjxvd', '1994-06-06', '', ''),
(2, 'Koh Chee Guan ', '123123123', 'yuanyuan0331@live.com', '../images/default_pic.jpg', '0177601692', 'sad sad ixora ', '2194-02-11', '', ''),
(3, 'yyy', '123', 'kkk@hsa', '../images/default_pic.jpg', '000000000', 'kajsinmajslas', '0001-06-06', '1', '2');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
