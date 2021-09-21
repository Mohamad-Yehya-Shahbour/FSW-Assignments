-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 21, 2021 at 11:12 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `facebookdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `connections`
--

CREATE TABLE `connections` (
  `Id` int(11) NOT NULL,
  `User_Id` varchar(100) NOT NULL,
  `Friend_Id` varchar(100) NOT NULL,
  `IsPending` tinyint(4) NOT NULL,
  `IsBlocked` tinyint(4) NOT NULL,
  `IsDeclined` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `connections`
--

INSERT INTO `connections` (`Id`, `User_Id`, `Friend_Id`, `IsPending`, `IsBlocked`, `IsDeclined`) VALUES
(38, '2', '6', 0, 0, 1),
(39, '1', '5', 0, 0, 1),
(40, '1', '4', 0, 1, 0),
(43, '3', '1', 0, 1, 0),
(44, '7', '1', 0, 0, 0),
(45, '1', '8', 0, 0, 0),
(46, '8', '7', 0, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `Id` int(11) NOT NULL,
  `User_Id` int(11) NOT NULL,
  `Message` varchar(100) NOT NULL,
  `Friend_Id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`Id`, `User_Id`, `Message`, `Friend_Id`) VALUES
(7, 1, 'accept', 6),
(8, 2, 'decline', 6),
(9, 1, 'decline', 5),
(10, 1, 'accept', 4),
(11, 3, 'accept', 1),
(12, 7, 'accept', 1),
(13, 1, 'accept', 8);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `Id` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Pass` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`Id`, `Name`, `Email`, `Pass`) VALUES
(1, 'yehya', 'yehya@gmail.com', 'b994334782e66b7facf0404023e3b63ba8186fa18a5a5870e04c9a060cafc42f'),
(2, 'yehya1', 'yehya1@gmail.com', 'b994334782e66b7facf0404023e3b63ba8186fa18a5a5870e04c9a060cafc42f'),
(3, 'yehya2', 'yehya2@gmail.com', 'b994334782e66b7facf0404023e3b63ba8186fa18a5a5870e04c9a060cafc42f'),
(4, 'yehya3', 'yehya3@gmail.com', 'b994334782e66b7facf0404023e3b63ba8186fa18a5a5870e04c9a060cafc42f'),
(5, 'yehya4', 'yehya4@gmail.com', 'b994334782e66b7facf0404023e3b63ba8186fa18a5a5870e04c9a060cafc42f'),
(6, 'yehya5', 'yehya5@gmail.com', 'b994334782e66b7facf0404023e3b63ba8186fa18a5a5870e04c9a060cafc42f'),
(7, 'yehya6', 'yehya6@gmail.com', 'b994334782e66b7facf0404023e3b63ba8186fa18a5a5870e04c9a060cafc42f'),
(8, 'yehya7', 'yehya7@gmail.com', 'b994334782e66b7facf0404023e3b63ba8186fa18a5a5870e04c9a060cafc42f'),
(9, 'yehya8', 'yehya8@gmail.com', 'b994334782e66b7facf0404023e3b63ba8186fa18a5a5870e04c9a060cafc42f');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `connections`
--
ALTER TABLE `connections`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `connections`
--
ALTER TABLE `connections`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
