-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 16, 2023 at 11:12 AM
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
  `EMAIL` varchar(255) NOT NULL,
  `PASSWORD` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `creator`
--

INSERT INTO `creator` (`ID`, `USERNAME`, `EMAIL`, `PASSWORD`) VALUES
(1, 'karim', 'rusakaa7@gmail.com', '123456'),
(2, 'buba', 'rusakaa7@gmail.com', '123456'),
(3, 'kobe', 'businessforkarim@gmail.com', '456123'),
(4, 'wqweqrqwrqwr', 'rusakaa7@gmail.com', '1234'),
(5, 'ncuti', '257kaso@gmail.com', '12456'),
(6, 'ncutie', '257kaso@gmail.com', '12456'),
(7, 'jason', 'rusakaa7@gmail.com', 'T@tookarim123'),
(8, 'karim 1', 'rusakaa7@gmail.com', '123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `creator`
--
ALTER TABLE `creator`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `creator`
--
ALTER TABLE `creator`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
