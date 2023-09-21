-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 21, 2023 at 11:08 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `podvibes`
--

-- --------------------------------------------------------

--
-- Table structure for table `creator`
--

CREATE TABLE `creator` (
  `ID` int(11) NOT NULL,
  `USERNAME` varchar(255) NOT NULL,
  `MEMBERSHIP` text NOT NULL,
  `EMAIL` varchar(255) NOT NULL,
  `PASSWORD` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `creator`
--

INSERT INTO `creator` (`ID`, `USERNAME`, `MEMBERSHIP`, `EMAIL`, `PASSWORD`) VALUES
(1, 'karim', 'Premium', 'rusakaa@gmail.com', '123456'),
(12, 'bush', 'Classic', 'bush@mail.com', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `episode`
--

CREATE TABLE `episode` (
  `ID` int(11) NOT NULL,
  `TITLE` text NOT NULL,
  `COVER` text NOT NULL,
  `TRACK` text NOT NULL,
  `USER` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `episode`
--

INSERT INTO `episode` (`ID`, `TITLE`, `COVER`, `TRACK`, `USER`) VALUES
(2, 'Tanasha X Diamond Platnumz - Gere (Official Music Video)', '5172_pic17.jpg', '4789_Tanasha_X_Diamond_Platnumz_-_Gere_(Official_Music_Video)_SMS_SKIZA_8548744_to_811.mp3', 'Karim'),
(4, 'Major Lazer  Blow that Smoke feat Tove Lo', '5787_71732374.jpeg', '6846_Major_Lazer__Blow_that_Smoke_feat_Tove_Lo.mp3', 'karim'),
(5, 'y2mate.com - Chris Brown  Drunk Texting ft Jhene Aiko', '5385_Screenshot_from_2023-09-21_14-23-22.png', '7308_Chris_Brown__Drunk_Texting_ft_Jhene_Aiko.mp3', 'karim');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `creator`
--
ALTER TABLE `creator`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `episode`
--
ALTER TABLE `episode`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `creator`
--
ALTER TABLE `creator`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `episode`
--
ALTER TABLE `episode`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
