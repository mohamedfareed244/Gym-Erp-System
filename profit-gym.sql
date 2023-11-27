-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 27, 2023 at 04:22 PM
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
-- Table structure for table `assignedclass`
--

CREATE TABLE `assignedclass` (
  `ID` int(11) NOT NULL,
  `ClassID` int(11) NOT NULL,
  `Date` varchar(30) NOT NULL,
  `StartTime` time NOT NULL,
  `EndTime` time NOT NULL,
  `isFree` varchar(20) NOT NULL,
  `Price` int(50) NOT NULL,
  `CoachID` int(10) NOT NULL,
  `NumOfAttendants` int(11) NOT NULL,
  `AvailablePlaces` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `assignedclass`
--

INSERT INTO `assignedclass` (`ID`, `ClassID`, `Date`, `StartTime`, `EndTime`, `isFree`, `Price`, `CoachID`, `NumOfAttendants`, `AvailablePlaces`) VALUES
(5, 12, '2023-12-01', '19:00:00', '20:30:00', 'Free', 0, 3, 20, 17),
(6, 14, '2023-12-04', '17:30:00', '19:00:00', 'NotFree', 200, 4, 15, 15),
(7, 15, '2023-12-02', '14:00:00', '15:30:00', 'Free', 0, 3, 10, 7),
(8, 15, '2023-11-30', '14:00:00', '15:30:00', 'Free', 0, 3, 10, 8);

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
  `Name` varchar(30) NOT NULL,
  `Description` varchar(500) NOT NULL,
  `imgPath` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`ID`, `Name`, `Description`, `imgPath`) VALUES
(12, 'Zumba', 'Zumba is a dance-based fitness class that incorporates Latin and international music. It combines energetic dance moves with cardiovascular exercises to create a fun and engaging workout.', 'public/Images/zumba2.jpg'),
(13, 'Yoga', 'Yoga classes focus on improving flexibility, strength, and mental well-being through a combination of physical postures, breath control, and meditation.', 'public/Images/yoga.jpg'),
(14, 'Pilates', 'Pilates focuses on core strength, flexibility, and overall body awareness. It involves precise movements and controlled breathing to improve posture and build long, lean muscles.', 'public/Images/pilates.jpg'),
(15, 'Aqua Aerobics', 'Aqua aerobics takes traditional aerobic exercises into the pool. The water provides resistance, making it a low-impact yet effective workout that improves cardiovascular fitness and muscle strength.', 'public/Images/aerobics1.jpg'),
(16, 'Mind-Body Fusion', 'Classes like Barre combine elements of ballet, Pilates, and yoga. They target small muscle groups through isometric movements, promoting strength, balance, and flexibility.', 'public/Images/mind.jpg'),
(17, 'Circuit Training', 'Circuit training involves moving through a series of different exercises at stations with minimal rest. It combines strength and cardiovascular training for an efficient and effective workout.', 'public/Images/circuit.jpg'),
(18, 'Parkour', 'Parkour classes teach participants to navigate obstacles and urban environments with fluid movements. It improves agility, strength, and spatial awareness.', 'public/Images/parkour.jpg'),
(19, 'Strength and Conditioning', 'Strength and conditioning classes focus on improving overall athletic performance. They incorporate a mix of weightlifting, plyometrics, and agility drills to enhance strength and power.', 'public/Images/strength.jpg'),
(20, 'Aerial Yoga', 'Aerial yoga combines traditional yoga poses with the use of silk hammocks suspended from the ceiling. It adds an element of suspension and flexibility, enhancing strength and balance.', 'public/Images/aerial.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `class_days`
--

CREATE TABLE `class_days` (
  `ClassID` int(11) NOT NULL,
  `Day` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `class_days`
--

INSERT INTO `class_days` (`ClassID`, `Day`) VALUES
(12, 'Friday'),
(12, 'Tuesday'),
(13, 'Sunday'),
(13, 'Wednesday'),
(14, 'Monday'),
(15, 'Saturday'),
(15, 'Thursday'),
(16, 'Sunday'),
(17, 'Wednesday'),
(18, 'Monday'),
(19, 'Saturday'),
(20, 'Saturday');

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
(37, 'laila', 'nabil', 20, 'female', 0, 0, 'lailanabil@gmail.com', '$2y$10$VoPwyiscGCXCqbanwH9/nuBMSa3TmmF5tr.fs.7pzBsFkzLF8cezu', '01016542378'),
(44, 'omar', 'omran', 25, 'male', 0, 0, 'omaromran@gmail.com', '$2y$10$FtrUm7owwXQpOH9CvunRge/eacZZR.S2QN2ZmI4zCFkeIrOHKv6ee', '01023876543'),
(45, 'jana', 'omran', 20, 'female', 0, 0, 'janahani.nbis@gmail.com', '$2y$10$aVoXddxNbjd09/egCDebtOK2xmrK/YFxL23xA41vgh7WrjrYHGut2', '01091119866'),
(46, 'rania', 'kamal', 40, 'female', 0, 0, 'raniakamal@gmail.com', '$2y$10$b2WpY5G/aA5pMDt5.D9ji.HcYd20c0yP05qKKFiAy6Oag1M3CLY0C', '01091119866');

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
  `Password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`ID`, `Name`, `Email`, `PhoneNumber`, `Salary`, `Address`, `JobTitle`, `Password`) VALUES
(1, 'mohamed', 'mohamedfareed429@gmail.com', 'mohamedfareed429@gmail.com', 1900, 'egypt', 'Sales Person', 'Mohamed'),
(3, 'Jana Hani', 'janahani.nbis@gmail.com', '01091119866', 3000, 'Nasr City', '4', '$2y$10$I51zRdy5H37xXp0GR3MJyej3j7nys2phNDDvU/GTtag.nzchJ3X1K'),
(4, 'Laila Nabil', 'lailanabil@gmail.com', '01108764532', 2000, 'Nasr City', '5', '$2y$10$KHQimzPxygAfLiwJgNc9MuzpjArfbTEqkgZ6afascIodNXs5bR/3q');

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
  `ID` int(11) NOT NULL,
  `ClientID` int(50) NOT NULL,
  `PackageID` int(50) NOT NULL,
  `StartDate` date NOT NULL,
  `EndDate` date NOT NULL,
  `VisitsCount` int(50) NOT NULL,
  `InvitationsCount` int(50) NOT NULL,
  `InbodyCount` int(50) NOT NULL,
  `PrivateTrainingSessionsCount` int(50) NOT NULL,
  `FreezeCount` int(50) NOT NULL,
  `Freezed` tinyint(1) NOT NULL,
  `isActivated` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `membership`
--

INSERT INTO `membership` (`ID`, `ClientID`, `PackageID`, `StartDate`, `EndDate`, `VisitsCount`, `InvitationsCount`, `InbodyCount`, `PrivateTrainingSessionsCount`, `FreezeCount`, `Freezed`, `isActivated`) VALUES
(8, 28, 14, '2023-11-24', '2024-02-24', 0, 5, 3, 3, 30, 0, 'Activated'),
(9, 26, 13, '2023-11-25', '2024-01-25', 0, 4, 2, 2, 20, 0, 'Activated');

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
  `Price` int(50) NOT NULL,
  `isActivated` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `package`
--

INSERT INTO `package` (`ID`, `Title`, `NumOfMonths`, `isVisitsLimited`, `VisitsLimit`, `FreezeLimit`, `NumOfInvitations`, `NumOfInbodySessions`, `NumOfPrivateTrainingSessions`, `Price`, `isActivated`) VALUES
(12, '1 Month', 1, 'limited', 20, 10, 2, 1, 1, 600, 'Deactivated'),
(13, '2 Months', 2, 'limited', 45, 20, 4, 2, 2, 800, 'Activated'),
(14, '3 Months', 3, 'unlimited', 0, 30, 5, 3, 3, 1100, 'Activated'),
(15, '4 Months + 2 Months Free', 6, 'unlimited', 0, 30, 5, 3, 3, 2500, 'Activated'),
(16, '6 Months + 3 Months Free', 9, 'unlimited', 0, 70, 7, 6, 6, 3400, 'Activated');

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
  `Price` int(50) NOT NULL,
  `isActivated` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `private training package`
--

INSERT INTO `private training package` (`ID`, `Name`, `NumOfSessions`, `MinPackageMonths`, `Price`, `isActivated`) VALUES
(9, 'Beginners', 10, 1, 1000, 'Activated'),
(10, 'Intermediate', 30, 3, 2800, 'Activated'),
(11, 'Advanced', 50, 6, 4300, 'Activated'),
(12, 'For 1 Month', 15, 1, 1500, 'Activated'),
(13, 'For 2 Months', 25, 2, 2400, 'Activated'),
(14, 'For 3 Months', 35, 3, 3300, 'Activated'),
(15, 'For 4 Months', 45, 4, 4200, 'Activated');

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

-- --------------------------------------------------------

--
-- Table structure for table `reserved_class`
--

CREATE TABLE `reserved_class` (
  `ID` int(11) NOT NULL,
  `AssignedClassID` int(50) NOT NULL,
  `CoachID` int(50) NOT NULL,
  `ClientID` int(50) NOT NULL,
  `Attended` varchar(20) NOT NULL,
  `isActivated` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reserved_class`
--

INSERT INTO `reserved_class` (`ID`, `AssignedClassID`, `CoachID`, `ClientID`, `Attended`, `isActivated`) VALUES
(20, 5, 3, 45, '', 'Activated'),
(21, 7, 3, 46, '', 'Activated'),
(22, 8, 3, 46, '', 'Activated'),
(23, 7, 3, 44, '', 'Activated');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assignedclass`
--
ALTER TABLE `assignedclass`
  ADD PRIMARY KEY (`ID`);

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
-- Indexes for table `class_days`
--
ALTER TABLE `class_days`
  ADD PRIMARY KEY (`ClassID`,`Day`);

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
  ADD PRIMARY KEY (`ID`),
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
-- Indexes for table `reserved private training free session`
--
ALTER TABLE `reserved private training free session`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `test6` (`ClientID`),
  ADD KEY `test7` (`CoachID`),
  ADD KEY `test11` (`SlotID`);

--
-- Indexes for table `reserved_class`
--
ALTER TABLE `reserved_class`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `test8` (`AssignedClassID`),
  ADD KEY `test9` (`ClientID`),
  ADD KEY `test10` (`CoachID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assignedclass`
--
ALTER TABLE `assignedclass`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

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
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `coach`
--
ALTER TABLE `coach`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `job_titles`
--
ALTER TABLE `job_titles`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `membership`
--
ALTER TABLE `membership`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `package`
--
ALTER TABLE `package`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `private training package`
--
ALTER TABLE `private training package`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `reserved private training free session`
--
ALTER TABLE `reserved private training free session`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reserved_class`
--
ALTER TABLE `reserved_class`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

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
-- Constraints for table `private training membership`
--
ALTER TABLE `private training membership`
  ADD CONSTRAINT `test3` FOREIGN KEY (`ClientID`) REFERENCES `client` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `test4` FOREIGN KEY (`CoachID`) REFERENCES `coach` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `test5` FOREIGN KEY (`PrivateTrainingPackageID`) REFERENCES `private training package` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
