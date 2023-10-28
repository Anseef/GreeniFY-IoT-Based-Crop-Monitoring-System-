-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 23, 2023 at 06:07 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `demo`
--

-- --------------------------------------------------------

--
-- Table structure for table `AdminDetails`
--

CREATE TABLE `AdminDetails` (
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `phone_number` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `AdminDetails`
--

INSERT INTO `AdminDetails` (`username`, `password`, `email`, `phone_number`) VALUES
('Zack', 'admin@123', 'admin@greeniFY.com', '8585858585');

-- --------------------------------------------------------

--
-- Table structure for table `Beans`
--

CREATE TABLE `Beans` (
  `id` int(11) NOT NULL,
  `farmID` varchar(20) DEFAULT NULL,
  `dates` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` int(11) DEFAULT NULL,
  `mvalue` int(11) DEFAULT NULL,
  `tvalue` int(11) DEFAULT NULL,
  `hvalue` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Beans`
--

INSERT INTO `Beans` (`id`, `farmID`, `dates`, `status`, `mvalue`, `tvalue`, `hvalue`) VALUES
(1, '3', '2023-10-02 02:30:00', 0, 35, 25, 60),
(2, '3', '2023-10-02 04:00:00', 0, 40, 23, 55),
(3, '3', '2023-10-02 05:15:00', 0, 42, 24, 58),
(4, '3', '2023-10-02 06:45:00', 0, 38, 27, 62),
(5, '3', '2023-10-02 08:00:00', 0, 45, 22, 63),
(6, '3', '2023-10-02 09:15:00', 0, 37, 26, 59),
(7, '3', '2023-10-02 10:30:00', 0, 41, 24, 61),
(8, '3', '2023-10-02 11:45:00', 0, 39, 23, 57),
(9, '3', '2023-10-02 13:00:00', 0, 36, 28, 64),
(10, '3', '2023-10-02 14:15:00', 0, 44, 21, 56),
(11, NULL, '2023-10-05 15:41:58', 1, 24, 36, 70),
(12, NULL, '2023-10-08 05:02:19', 1, 24, 38, 68),
(13, NULL, '2023-10-08 05:23:50', 1, 20, 36, 54),
(14, NULL, '2023-10-08 05:25:14', 1, 24, 36, 70),
(15, NULL, '2023-10-10 04:15:26', 1, 24, 38, 70),
(16, NULL, '2023-10-10 06:47:00', 1, 24, 34, 68),
(17, NULL, '2023-10-10 02:30:00', 1, 24, 34, 68),
(18, NULL, '2023-10-10 04:45:00', 1, 25, 35, 69),
(19, NULL, '2023-10-10 07:00:00', 1, 26, 36, 70),
(20, NULL, '2023-10-10 09:15:00', 1, 27, 37, 71),
(24, NULL, '2023-10-18 14:04:05', 1, 50, 38, 68),
(25, NULL, '2023-10-20 15:31:49', 1, 50, 34, 68),
(31, NULL, '2023-10-21 13:12:59', 1, 24, 38, 68),
(32, NULL, '2023-10-21 13:13:15', 0, 29, 38, 70),
(33, NULL, '2023-10-21 13:13:27', 0, 35, 40, 68),
(34, NULL, '2023-10-21 13:13:52', 1, 20, 40, 68),
(35, NULL, '2023-10-21 13:14:04', 1, 22, 40, 68),
(36, NULL, '2023-10-22 06:25:26', 0, 50, 34, 70),
(37, NULL, '2023-10-22 06:25:40', 0, 40, 36, 68),
(38, NULL, '2023-10-22 14:06:38', 0, 50, 34, 68),
(39, NULL, '2023-10-22 14:13:25', 0, 53, 34, 68),
(40, NULL, '2023-10-22 14:15:12', 0, 58, 34, 68),
(41, NULL, '2023-10-22 14:29:27', 0, 45, 34, 68),
(42, NULL, '2023-10-22 14:49:08', 0, 40, 34, 68),
(43, NULL, '2023-10-22 15:03:06', 0, 50, 34, 70),
(44, NULL, '2023-10-22 15:05:12', 0, 42, 30, 70),
(45, NULL, '2023-10-22 15:18:13', 0, 60, 34, 70);

-- --------------------------------------------------------

--
-- Table structure for table `Brinjal`
--

CREATE TABLE `Brinjal` (
  `id` int(11) NOT NULL,
  `farmID` varchar(20) DEFAULT NULL,
  `dates` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` int(11) DEFAULT NULL,
  `mvalue` int(11) DEFAULT NULL,
  `tvalue` int(11) DEFAULT NULL,
  `hvalue` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Brinjal`
--

INSERT INTO `Brinjal` (`id`, `farmID`, `dates`, `status`, `mvalue`, `tvalue`, `hvalue`) VALUES
(1, NULL, '2023-10-21 14:05:28', 1, 24, 38, 70),
(2, NULL, '2023-10-21 14:06:29', 1, 24, 38, 54),
(3, NULL, '2023-10-21 14:09:46', 1, 24, 38, 70),
(4, NULL, '2023-10-21 14:10:11', 1, 24, 38, 70),
(5, NULL, '2023-10-21 14:10:27', 1, 24, 38, 70),
(6, NULL, '2023-10-22 15:44:20', 0, 50, 38, 70);

-- --------------------------------------------------------

--
-- Table structure for table `Carrot`
--

CREATE TABLE `Carrot` (
  `id` int(11) NOT NULL,
  `farmID` varchar(20) DEFAULT NULL,
  `dates` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` int(11) DEFAULT NULL,
  `mvalue` int(11) DEFAULT NULL,
  `tvalue` int(11) DEFAULT NULL,
  `hvalue` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `FarmDetails`
--

CREATE TABLE `FarmDetails` (
  `farmID` varchar(20) NOT NULL,
  `farmName` varchar(20) NOT NULL,
  `cropName` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `FarmDetails`
--

INSERT INTO `FarmDetails` (`farmID`, `farmName`, `cropName`) VALUES
('111', 'Potato Farm', 'Potato'),
('21', 'Grape Farm', 'Grapes'),
('24', 'Tomato Farm', 'Tomato'),
('3', 'Beans Farm', 'Beans'),
('4', 'Brinjal Farm', 'Brinjal'),
('6', 'Pineapple Farm', 'Pineapple'),
('77', 'Carrot Farm', 'Carrot'),
('88', 'Pumpkin Farm', 'Pumpkin');

-- --------------------------------------------------------

--
-- Table structure for table `Grapes`
--

CREATE TABLE `Grapes` (
  `id` int(11) NOT NULL,
  `farmID` varchar(20) DEFAULT NULL,
  `dates` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` int(11) DEFAULT NULL,
  `mvalue` int(11) DEFAULT NULL,
  `tvalue` int(11) DEFAULT NULL,
  `hvalue` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Grapes`
--

INSERT INTO `Grapes` (`id`, `farmID`, `dates`, `status`, `mvalue`, `tvalue`, `hvalue`) VALUES
(1, NULL, '2023-10-22 12:17:40', 0, 50, 34, 71),
(2, NULL, '2023-10-22 12:18:26', 1, 18, 34, 68);

-- --------------------------------------------------------

--
-- Table structure for table `Pineapple`
--

CREATE TABLE `Pineapple` (
  `id` int(11) NOT NULL,
  `farmID` varchar(20) DEFAULT NULL,
  `dates` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` int(11) DEFAULT NULL,
  `mvalue` int(11) DEFAULT NULL,
  `tvalue` int(11) DEFAULT NULL,
  `hvalue` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Potato`
--

CREATE TABLE `Potato` (
  `id` int(11) NOT NULL,
  `farmID` varchar(20) DEFAULT NULL,
  `dates` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` int(11) DEFAULT NULL,
  `mvalue` int(11) DEFAULT NULL,
  `tvalue` int(11) DEFAULT NULL,
  `hvalue` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Pumpkin`
--

CREATE TABLE `Pumpkin` (
  `id` int(11) NOT NULL,
  `farmID` varchar(20) DEFAULT NULL,
  `dates` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` int(11) DEFAULT NULL,
  `mvalue` int(11) DEFAULT NULL,
  `tvalue` int(11) DEFAULT NULL,
  `hvalue` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `signup`
--

CREATE TABLE `signup` (
  `id` int(11) NOT NULL,
  `farmID` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `mobilenumber` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `DOJ` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `signup`
--

INSERT INTO `signup` (`id`, `farmID`, `username`, `mobilenumber`, `password`, `DOJ`) VALUES
(29, '3', 'Anoop', '9999999999', 'Anoop@1234', '2023-10-20'),
(32, '4', 'Amrutha', '9387826381', 'kochu@123', '2023-10-22');

-- --------------------------------------------------------

--
-- Table structure for table `Tomato`
--

CREATE TABLE `Tomato` (
  `id` int(11) NOT NULL,
  `farmID` varchar(20) DEFAULT NULL,
  `dates` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` int(11) DEFAULT NULL,
  `mvalue` int(11) DEFAULT NULL,
  `tvalue` int(11) DEFAULT NULL,
  `hvalue` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Beans`
--
ALTER TABLE `Beans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `farmID` (`farmID`);

--
-- Indexes for table `Brinjal`
--
ALTER TABLE `Brinjal`
  ADD PRIMARY KEY (`id`),
  ADD KEY `farmID` (`farmID`);

--
-- Indexes for table `Carrot`
--
ALTER TABLE `Carrot`
  ADD PRIMARY KEY (`id`),
  ADD KEY `farmID` (`farmID`);

--
-- Indexes for table `FarmDetails`
--
ALTER TABLE `FarmDetails`
  ADD PRIMARY KEY (`farmID`);

--
-- Indexes for table `Grapes`
--
ALTER TABLE `Grapes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `farmID` (`farmID`);

--
-- Indexes for table `Pineapple`
--
ALTER TABLE `Pineapple`
  ADD PRIMARY KEY (`id`),
  ADD KEY `farmID` (`farmID`);

--
-- Indexes for table `Potato`
--
ALTER TABLE `Potato`
  ADD PRIMARY KEY (`id`),
  ADD KEY `farmID` (`farmID`);

--
-- Indexes for table `Pumpkin`
--
ALTER TABLE `Pumpkin`
  ADD PRIMARY KEY (`id`),
  ADD KEY `farmID` (`farmID`);

--
-- Indexes for table `signup`
--
ALTER TABLE `signup`
  ADD PRIMARY KEY (`id`),
  ADD KEY `UserLogin` (`farmID`);

--
-- Indexes for table `Tomato`
--
ALTER TABLE `Tomato`
  ADD PRIMARY KEY (`id`),
  ADD KEY `farmID` (`farmID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Beans`
--
ALTER TABLE `Beans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `Brinjal`
--
ALTER TABLE `Brinjal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `Carrot`
--
ALTER TABLE `Carrot`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Grapes`
--
ALTER TABLE `Grapes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `Pineapple`
--
ALTER TABLE `Pineapple`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Potato`
--
ALTER TABLE `Potato`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Pumpkin`
--
ALTER TABLE `Pumpkin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `signup`
--
ALTER TABLE `signup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `Tomato`
--
ALTER TABLE `Tomato`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Beans`
--
ALTER TABLE `Beans`
  ADD CONSTRAINT `Beans_ibfk_1` FOREIGN KEY (`farmID`) REFERENCES `FarmDetails` (`farmID`);

--
-- Constraints for table `Brinjal`
--
ALTER TABLE `Brinjal`
  ADD CONSTRAINT `Brinjal_ibfk_1` FOREIGN KEY (`farmID`) REFERENCES `FarmDetails` (`farmID`);

--
-- Constraints for table `Carrot`
--
ALTER TABLE `Carrot`
  ADD CONSTRAINT `Carrot_ibfk_1` FOREIGN KEY (`farmID`) REFERENCES `FarmDetails` (`farmID`);

--
-- Constraints for table `Grapes`
--
ALTER TABLE `Grapes`
  ADD CONSTRAINT `Grapes_ibfk_1` FOREIGN KEY (`farmID`) REFERENCES `FarmDetails` (`farmID`);

--
-- Constraints for table `Pineapple`
--
ALTER TABLE `Pineapple`
  ADD CONSTRAINT `Pineapple_ibfk_1` FOREIGN KEY (`farmID`) REFERENCES `FarmDetails` (`farmID`);

--
-- Constraints for table `Potato`
--
ALTER TABLE `Potato`
  ADD CONSTRAINT `Potato_ibfk_1` FOREIGN KEY (`farmID`) REFERENCES `FarmDetails` (`farmID`);

--
-- Constraints for table `Pumpkin`
--
ALTER TABLE `Pumpkin`
  ADD CONSTRAINT `Pumpkin_ibfk_1` FOREIGN KEY (`farmID`) REFERENCES `FarmDetails` (`farmID`);

--
-- Constraints for table `signup`
--
ALTER TABLE `signup`
  ADD CONSTRAINT `UserLogin` FOREIGN KEY (`farmID`) REFERENCES `FarmDetails` (`farmID`);

--
-- Constraints for table `Tomato`
--
ALTER TABLE `Tomato`
  ADD CONSTRAINT `Tomato_ibfk_1` FOREIGN KEY (`farmID`) REFERENCES `FarmDetails` (`farmID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
