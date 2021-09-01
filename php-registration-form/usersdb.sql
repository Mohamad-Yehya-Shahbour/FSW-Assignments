-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 01, 2021 at 05:43 AM
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
-- Database: `usersdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `Id` int(11) NOT NULL,
  `FullName` varchar(250) NOT NULL,
  `Email` varchar(250) NOT NULL,
  `Pass` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`Id`, `FullName`, `Email`, `Pass`) VALUES
(18, 'yehya', 'yehya@gmail.com', 'b994334782e66b7facf0404023e3b63ba8186fa18a5a5870e04c9a060cafc42f'),
(19, 'yehya2', 'yehya2@gmail.com', 'b994334782e66b7facf0404023e3b63ba8186fa18a5a5870e04c9a060cafc42f'),
(20, 'yehya', 'yehya3@gmail.com', 'b994334782e66b7facf0404023e3b63ba8186fa18a5a5870e04c9a060cafc42f'),
(23, 'yehya', 'yehya4@gmail.com', 'b994334782e66b7facf0404023e3b63ba8186fa18a5a5870e04c9a060cafc42f'),
(24, 'yehya', 'yehya5@gmail.com', 'b994334782e66b7facf0404023e3b63ba8186fa18a5a5870e04c9a060cafc42f'),
(25, 'yehya', 'yehya30@gmail.com', 'b994334782e66b7facf0404023e3b63ba8186fa18a5a5870e04c9a060cafc42f'),
(26, 'yehya', 'yehya40@gmail.com', 'b994334782e66b7facf0404023e3b63ba8186fa18a5a5870e04c9a060cafc42f');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
