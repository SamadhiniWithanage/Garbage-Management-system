-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 26, 2020 at 04:41 PM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webtwo`
--

-- --------------------------------------------------------

--
-- Table structure for table `admint`
--

CREATE TABLE `admint` (
  `adminId` int(5) NOT NULL,
  `emailadmin` varchar(50) NOT NULL,
  `passwordadmin` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admint`
--

INSERT INTO `admint` (`adminId`, `emailadmin`, `passwordadmin`) VALUES
(1, 'sama@gmail.com', 'f92a922cb384f57e797231d91a6528ad');

-- --------------------------------------------------------

--
-- Table structure for table `qty`
--

CREATE TABLE `qty` (
  `id` int(5) NOT NULL,
  `plasticQty` int(10) NOT NULL,
  `metalQty` int(10) NOT NULL,
  `buildingQty` int(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `qty`
--

INSERT INTO `qty` (`id`, `plasticQty`, `metalQty`, `buildingQty`) VALUES
(1, 100, 100, 100),
(2, 200, 600, 800),
(3, 200, 600, 800);

-- --------------------------------------------------------

--
-- Table structure for table `solditems`
--

CREATE TABLE `solditems` (
  `recodeNumber` int(5) NOT NULL,
  `plasticQty` float NOT NULL,
  `metalQty` decimal(10,0) NOT NULL,
  `buildingQty` float NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `solditems`
--

INSERT INTO `solditems` (`recodeNumber`, `plasticQty`, `metalQty`, `buildingQty`) VALUES
(8, 45, '85', 89),
(7, 56, '52', 85),
(6, 10, '20', 30),
(5, 95, '85', 96);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userId` int(10) NOT NULL,
  `fName` varchar(30) NOT NULL,
  `lName` varchar(30) NOT NULL,
  `email` varchar(60) NOT NULL,
  `nic` varchar(12) NOT NULL,
  `password` varchar(150) NOT NULL,
  `address` varchar(100) NOT NULL,
  `phoneNo` int(10) NOT NULL,
  `userType` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userId`, `fName`, `lName`, `email`, `nic`, `password`, `address`, `phoneNo`, `userType`) VALUES
(17, 'samadhini', 'withanage', 'neth@gmail.com', '789635231v', '14b9700a52c47dd35899a936cf34aef7', 'ssfs nsmjhs', 220123652, 'Saller'),
(16, 'yuvin', 'withanage', 'yuvin@gmail.com', '456985236v', 'e948b96609a712e1d8ae2f970413db4c', 'nsd ksho', 445632150, 'Saller'),
(15, 'sama', 'withanage', 'uda@gmail.com', '362365236v', 'cad7c7a47ea0d67d6921864008d01f51', 'ansv bajkdh', 110123652, 'Buyer'),
(13, 'ghjdk', 'gsdhjk', 'scs@gmail.com', '562365236v', 'cad7c7a47ea0d67d6921864008d01f51', 's,hjcgslj', 112035230, 'Buyer'),
(14, 'cSDV', 'sdcfSDf', 'lasmdl@gmail.com', '895632145v', '760a375809f790ffe8624ab6f45e4b39', 'sdcsd', 770719740, 'Buyer'),
(12, 'kusum', 'kalansooriya', 'kasha@gmail.com', '945463376v', '8dc6e5eb225147476bd01b2d4a17f5a4', 'aranayake', 770719740, 'Saller'),
(11, 'sdfsdfsdff', 'wedwd', 'hjsd@gmail.com', '985632658v', '1aabac6d068eef6a7bad3fdf50a05cc8', 'wedwe', 110123652, 'Saller');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admint`
--
ALTER TABLE `admint`
  ADD PRIMARY KEY (`adminId`);

--
-- Indexes for table `qty`
--
ALTER TABLE `qty`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `solditems`
--
ALTER TABLE `solditems`
  ADD PRIMARY KEY (`recodeNumber`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admint`
--
ALTER TABLE `admint`
  MODIFY `adminId` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `qty`
--
ALTER TABLE `qty`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `solditems`
--
ALTER TABLE `solditems`
  MODIFY `recodeNumber` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
