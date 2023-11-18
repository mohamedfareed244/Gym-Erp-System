-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 18, 2023 at 12:55 PM
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
-- Database: `profit-gym`
--

-- --------------------------------------------------------

--
-- Table structure for table `authority`
--

CREATE TABLE `authority` (
  `ID` int(11) NOT NULL,
  `FriendlyName` varchar(50) NOT NULL,
  `LinkAddress` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `authority`
--

INSERT INTO `authority` (`ID`, `FriendlyName`, `LinkAddress`) VALUES
(1, 'Dashboard', '../views/admindashboard.php'),
(2, 'Add clients', '../views/addclient.php'),
(3, 'edit clients', '../views/editclient.php'),
(4, 'client details', '../views/clientdetails.php'),
(5, 'client check-in', '../views/clientin.php'),
(6, 'View Coaches', '../views/coachesadmin.php'),
(7, 'View Pt Clients', '../views/ptsessions.php'),
(8, 'View Classes', '../views/admin-classes.php'),
(9, 'View Employees', '../views/employeesadmin.php'),
(10, 'Attendance', '../views/attendance.php'),
(11, 'Sales Report', '../views/salesreport.php'),
(12, 'View Packages', '../views/viewpackagesadmin.php'),
(13, 'Add Packages', '../views/addPackageadmin.php'),
(14, 'View Private sessions', '../views/viewptadmin.php'),
(15, 'Add Private sessions', '../views/addptadmin.php'),
(16, 'my classes ', '../views/myclasses.php'),
(17, 'my pt clients ', '../views/myptclients.php');

-- --------------------------------------------------------

--
-- Table structure for table `available slots`
--

CREATE TABLE `available slots` (
  `ID` int(11) NOT NULL,
  `StartTime` time(6) NOT NULL,
  `EndTime` time(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `ID` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Date` date NOT NULL,
  `StartTime` time(6) NOT NULL,
  `EndTime` time(6) NOT NULL,
  `Price` int(50) NOT NULL,
  `Coach` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `ID` int(11) NOT NULL,
  `FirstName` varchar(50) NOT NULL,
  `LastName` varchar(50) NOT NULL,
  `Age` int(11) NOT NULL,
  `Gender` varchar(50) NOT NULL,
  `Weight` decimal(50,0) NOT NULL,
  `Height` decimal(50,0) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Phone` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`ID`, `FirstName`, `LastName`, `Age`, `Gender`, `Weight`, `Height`, `Email`, `Password`, `Phone`) VALUES
(26, 'jana', 'hani', 20, 'female', 0, 0, 'janahani.nbis@gmail.com', '$2y$10$ng6oDea6CzWkFawUDBJ9vOxMBQr.GaoQ1gps6cu7eQkPLplDvCzNK', '01091119866'),
(28, 'rania', 'kamal', 40, 'female', 0, 0, 'raniakamal@gmail.com', '$2y$10$YMVK11OFNpBH3/RJJPNmOuO3qhpIj.s2adzWuEJrvy9ZwGo1zJYri', '01091119868'),
(29, 'mo', 'dd', 90, 'mal', 90, 90, 'm@gm.com', '', 'ddd');

-- --------------------------------------------------------

--
-- Table structure for table `coach`
--

CREATE TABLE `coach` (
  `ID` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `PhoneNumber` varchar(50) NOT NULL,
  `Salary` int(50) NOT NULL,
  `Address` varchar(100) NOT NULL,
  `Ismanager` int(1) NOT NULL,
  `Password` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `coach available days`
--

CREATE TABLE `coach available days` (
  `CoachID` int(50) NOT NULL,
  `Days` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `coach available slots`
--

CREATE TABLE `coach available slots` (
  `CoachID` int(50) NOT NULL,
  `SlotID` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `ID` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `PhoneNumber` varchar(50) NOT NULL,
  `Salary` int(50) NOT NULL,
  `Address` varchar(100) NOT NULL,
  `JobTitle` varchar(50) NOT NULL,
  `Password` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`ID`, `Name`, `Email`, `PhoneNumber`, `Salary`, `Address`, `JobTitle`, `Password`) VALUES
(1, 'mohamed', 'mohamedfareed429@gmail.com', 'mohamedfareed429@gmail.com', 1900, 'egypt', 'Sales Person', 'Mohamed');

-- --------------------------------------------------------

--
-- Table structure for table `employee authorities`
--

CREATE TABLE `employee authorities` (
  `ID` int(11) NOT NULL,
  `AuthorityID` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_titles`
--

CREATE TABLE `job_titles` (
  `Id` int(11) NOT NULL,
  `Name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `job_titles`
--

INSERT INTO `job_titles` (`Id`, `Name`) VALUES
(1, 'HR'),
(2, 'Sales'),
(3, 'ADMIN'),
(4, 'Coach'),
(5, 'Fitness-manager');

-- --------------------------------------------------------

--
-- Table structure for table `membership`
--

CREATE TABLE `membership` (
  `ClientID` int(50) NOT NULL,
  `PackageID` int(50) NOT NULL,
  `StartDate` date NOT NULL,
  `EndDate` date NOT NULL,
  `VisitsCount` int(50) NOT NULL,
  `InvitationsCount` int(50) NOT NULL,
  `InbodyCount` int(50) NOT NULL,
  `PrivatTrainingSessionsCount` int(50) NOT NULL,
  `FreezeCount` int(50) NOT NULL,
  `Freezed` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `package`
--

CREATE TABLE `package` (
  `ID` int(11) NOT NULL,
  `Title` varchar(100) NOT NULL,
  `NumOfMonths` int(11) NOT NULL,
  `isVisitsLimited` varchar(20) NOT NULL,
  `VisitsLimit` int(50) NOT NULL,
  `FreezeLimit` int(50) NOT NULL,
  `NumOfInvitations` int(50) NOT NULL,
  `NumOfInbodySessions` int(50) NOT NULL,
  `NumOfPrivateTrainingSessions` int(50) NOT NULL,
  `Price` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `package`
--

INSERT INTO `package` (`ID`, `Title`, `NumOfMonths`, `isVisitsLimited`, `VisitsLimit`, `FreezeLimit`, `NumOfInvitations`, `NumOfInbodySessions`, `NumOfPrivateTrainingSessions`, `Price`) VALUES
(7, '1 Month', 1, 'limited', 20, 10, 2, 1, 1, 600),
(8, '2 Months', 2, 'limited', 45, 20, 4, 2, 2, 800),
(9, '3 Months', 3, 'unlimited', 0, 30, 5, 3, 3, 1100),
(10, '4 Months + 2 Months Free', 6, 'unlimited', 0, 50, 6, 5, 5, 2500),
(11, '6 Months + 3 Months Free', 9, 'unlimited', 0, 80, 7, 6, 6, 3400),
(12, 'mohamed', 3, 'unlimited', 0, 30, 3, 4, 4, 400);

-- --------------------------------------------------------

--
-- Table structure for table `private training membership`
--

CREATE TABLE `private training membership` (
  `ClientID` int(50) NOT NULL,
  `CoachID` int(50) NOT NULL,
  `PrivateTrainingPackageID` int(50) NOT NULL,
  `SessionsCount` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `private training package`
--

CREATE TABLE `private training package` (
  `ID` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `NumOfSessions` int(50) NOT NULL,
  `MinPackageMonths` int(50) NOT NULL,
  `Price` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reserved class`
--

CREATE TABLE `reserved class` (
  `ClassID` int(50) NOT NULL,
  `CoachID` int(50) NOT NULL,
  `ClientID` int(50) NOT NULL,
  `Attended` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reserved private training free session`
--

CREATE TABLE `reserved private training free session` (
  `ID` int(11) NOT NULL,
  `ClientID` int(50) NOT NULL,
  `CoachID` int(50) NOT NULL,
  `Date` date NOT NULL,
  `SlotID` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `authority`
--
ALTER TABLE `authority`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `available slots`
--
ALTER TABLE `available slots`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `coach`
--
ALTER TABLE `coach`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `coach available days`
--
ALTER TABLE `coach available days`
  ADD KEY `test12` (`CoachID`);

--
-- Indexes for table `coach available slots`
--
ALTER TABLE `coach available slots`
  ADD KEY `test13` (`CoachID`),
  ADD KEY `test14` (`SlotID`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `employee authorities`
--
ALTER TABLE `employee authorities`
  ADD KEY `test` (`AuthorityID`),
  ADD KEY `ID` (`ID`) USING BTREE;

--
-- Indexes for table `job_titles`
--
ALTER TABLE `job_titles`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `membership`
--
ALTER TABLE `membership`
  ADD KEY `test1` (`ClientID`),
  ADD KEY `test2` (`PackageID`);

--
-- Indexes for table `package`
--
ALTER TABLE `package`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `private training membership`
--
ALTER TABLE `private training membership`
  ADD KEY `test3` (`ClientID`),
  ADD KEY `test4` (`CoachID`),
  ADD KEY `test5` (`PrivateTrainingPackageID`);

--
-- Indexes for table `private training package`
--
ALTER TABLE `private training package`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `reserved class`
--
ALTER TABLE `reserved class`
  ADD KEY `test8` (`ClassID`),
  ADD KEY `test9` (`ClientID`),
  ADD KEY `test10` (`CoachID`);

--
-- Indexes for table `reserved private training free session`
--
ALTER TABLE `reserved private training free session`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `test6` (`ClientID`),
  ADD KEY `test7` (`CoachID`),
  ADD KEY `test11` (`SlotID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `authority`
--
ALTER TABLE `authority`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `available slots`
--
ALTER TABLE `available slots`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `class`
--
ALTER TABLE `class`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `coach`
--
ALTER TABLE `coach`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `job_titles`
--
ALTER TABLE `job_titles`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `package`
--
ALTER TABLE `package`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `private training package`
--
ALTER TABLE `private training package`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reserved private training free session`
--
ALTER TABLE `reserved private training free session`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `coach available days`
--
ALTER TABLE `coach available days`
  ADD CONSTRAINT `test12` FOREIGN KEY (`CoachID`) REFERENCES `coach` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `coach available slots`
--
ALTER TABLE `coach available slots`
  ADD CONSTRAINT `test13` FOREIGN KEY (`CoachID`) REFERENCES `coach` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `test14` FOREIGN KEY (`SlotID`) REFERENCES `available slots` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `employee authorities`
--
ALTER TABLE `employee authorities`
  ADD CONSTRAINT `test` FOREIGN KEY (`AuthorityID`) REFERENCES `authority` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `membership`
--
ALTER TABLE `membership`
  ADD CONSTRAINT `test1` FOREIGN KEY (`ClientID`) REFERENCES `client` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `test2` FOREIGN KEY (`PackageID`) REFERENCES `package` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `private training membership`
--
ALTER TABLE `private training membership`
  ADD CONSTRAINT `test3` FOREIGN KEY (`ClientID`) REFERENCES `client` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `test4` FOREIGN KEY (`CoachID`) REFERENCES `coach` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `test5` FOREIGN KEY (`PrivateTrainingPackageID`) REFERENCES `private training package` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `reserved class`
--
ALTER TABLE `reserved class`
  ADD CONSTRAINT `test10` FOREIGN KEY (`CoachID`) REFERENCES `coach` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `test8` FOREIGN KEY (`ClassID`) REFERENCES `class` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `test9` FOREIGN KEY (`ClientID`) REFERENCES `client` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `reserved private training free session`
--
ALTER TABLE `reserved private training free session`
  ADD CONSTRAINT `test11` FOREIGN KEY (`SlotID`) REFERENCES `available slots` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `test6` FOREIGN KEY (`ClientID`) REFERENCES `client` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `test7` FOREIGN KEY (`CoachID`) REFERENCES `coach` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
