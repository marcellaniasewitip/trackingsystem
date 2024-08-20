-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 10, 2023 at 05:23 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `trackingsystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `adminID` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `llg`
--

CREATE TABLE `llg` (
  `id` int(11) NOT NULL,
  `LLGID` varchar(100) NOT NULL,
  `llgName` varchar(100) NOT NULL,
  `wardID` varchar(100) NOT NULL,
  `projectID` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `llg`
--

INSERT INTO `llg` (`id`, `LLGID`, `llgName`, `wardID`, `projectID`) VALUES
(1, 'NN102', 'Nuku', 'NN02', 'OT105'),
(2, 'NY104', 'Yangkok', 'NN02', 'RD103');

-- --------------------------------------------------------

--
-- Table structure for table `officer`
--

CREATE TABLE `officer` (
  `id` int(11) NOT NULL,
  `officerID` varchar(100) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `officerDoB` date NOT NULL,
  `officerRole` varchar(100) NOT NULL,
  `officerContact` varchar(100) NOT NULL,
  `officerEmail` varchar(255) NOT NULL,
  `officerGender` varchar(10) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `officer`
--

INSERT INTO `officer` (`id`, `officerID`, `fullname`, `officerDoB`, `officerRole`, `officerContact`, `officerEmail`, `officerGender`, `username`, `password`) VALUES
(1, 'N001', 'John Paul', '1977-01-01', 'Project Manager', '82429007', 'johnpaul12@gmail.com', 'male', 'john', 'john123');

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE `project` (
  `id` int(11) NOT NULL,
  `projectID` varchar(100) NOT NULL,
  `projectName` varchar(255) NOT NULL,
  `projectType` varchar(50) NOT NULL,
  `projectDescription` text NOT NULL,
  `projectCost` varchar(100) NOT NULL,
  `officerID` varchar(100) NOT NULL,
  `scheduleID` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`id`, `projectID`, `projectName`, `projectType`, `projectDescription`, `projectCost`, `officerID`, `scheduleID`) VALUES
(7, 'OT105', 'Water Supply', 'Others', 'Water Supply', 'K12050', 'N001', 'SC001'),
(8, 'RD103', 'bridge Damage', 'Road/Bridge', 'Building a bridge', 'K12040', 'N001', 'SC002');

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE `schedule` (
  `id` int(11) NOT NULL,
  `scheduleID` varchar(100) NOT NULL,
  `startDate` date NOT NULL,
  `endDate` date NOT NULL,
  `duration` varchar(100) NOT NULL,
  `status` varchar(50) NOT NULL,
  `percentComplete` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `schedule`
--

INSERT INTO `schedule` (`id`, `scheduleID`, `startDate`, `endDate`, `duration`, `status`, `percentComplete`) VALUES
(1, 'SC001', '2023-09-11', '2023-09-30', '20days', 'In Progress', '19%'),
(2, 'SC002', '2023-09-11', '2023-09-30', '18days', 'Initiation', '19%');

-- --------------------------------------------------------

--
-- Table structure for table `ward`
--

CREATE TABLE `ward` (
  `id` int(11) NOT NULL,
  `wardID` varchar(100) NOT NULL,
  `wardName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ward`
--

INSERT INTO `ward` (`id`, `wardID`, `wardName`) VALUES
(1, 'NN01', 'Wati'),
(2, 'NN02', 'Siliput');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminID`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `llg`
--
ALTER TABLE `llg`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_LLGID` (`LLGID`),
  ADD KEY `idx_projectID` (`projectID`),
  ADD KEY `wardID` (`wardID`);

--
-- Indexes for table `officer`
--
ALTER TABLE `officer`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `officerID` (`officerID`);

--
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`id`),
  ADD KEY `projectID` (`projectID`),
  ADD KEY `officeID` (`officerID`,`scheduleID`),
  ADD KEY `scheduleID` (`scheduleID`);

--
-- Indexes for table `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`id`),
  ADD KEY `scheduleID` (`scheduleID`);

--
-- Indexes for table `ward`
--
ALTER TABLE `ward`
  ADD PRIMARY KEY (`id`),
  ADD KEY `wardID` (`wardID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `llg`
--
ALTER TABLE `llg`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `officer`
--
ALTER TABLE `officer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `project`
--
ALTER TABLE `project`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `schedule`
--
ALTER TABLE `schedule`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ward`
--
ALTER TABLE `ward`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `llg`
--
ALTER TABLE `llg`
  ADD CONSTRAINT `llg_ibfk_1` FOREIGN KEY (`projectID`) REFERENCES `project` (`projectID`),
  ADD CONSTRAINT `llg_ibfk_2` FOREIGN KEY (`wardID`) REFERENCES `ward` (`wardID`);

--
-- Constraints for table `project`
--
ALTER TABLE `project`
  ADD CONSTRAINT `project_ibfk_2` FOREIGN KEY (`officerID`) REFERENCES `officer` (`officerID`);

--
-- Constraints for table `schedule`
--
ALTER TABLE `schedule`
  ADD CONSTRAINT `schedule_ibfk_1` FOREIGN KEY (`scheduleID`) REFERENCES `project` (`scheduleID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
