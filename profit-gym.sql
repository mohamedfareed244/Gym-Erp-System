-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 18, 2023 at 06:05 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `assignedclass`
--

INSERT INTO `assignedclass` (`ID`, `ClassID`, `Date`, `StartTime`, `EndTime`, `isFree`, `Price`, `CoachID`, `NumOfAttendants`, `AvailablePlaces`) VALUES
(5, 12, '2023-12-01', '19:00:00', '20:30:00', 'Free', 0, 3, 20, 19),
(6, 14, '2023-12-04', '17:30:00', '19:00:00', 'NotFree', 200, 4, 15, 14),
(7, 15, '2023-12-30', '14:00:00', '15:30:00', 'Free', 0, 3, 10, 8),
(8, 15, '2023-11-30', '14:00:00', '15:30:00', 'Free', 0, 3, 10, 9);

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `EmployeeId` int(11) NOT NULL,
  `Day` date NOT NULL,
  `Status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`EmployeeId`, `Day`, `Status`) VALUES
(1, '2023-11-29', 0),
(1, '2023-11-30', 0),
(3, '2023-11-29', 0),
(3, '2023-11-30', 0),
(4, '2023-11-29', 0),
(4, '2023-11-30', 0),
(3, '2023-12-18', 0),
(4, '2023-12-18', 0),
(6, '2023-12-18', 0);

-- --------------------------------------------------------

--
-- Table structure for table `authority`
--

CREATE TABLE `authority` (
  `ID` int(11) NOT NULL,
  `Header` varchar(50) NOT NULL,
  `FriendlyName` varchar(50) NOT NULL,
  `LinkAddress` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `authority`
--

INSERT INTO `authority` (`ID`, `Header`, `FriendlyName`, `LinkAddress`) VALUES
(1, 'Dashboard', 'Dashboard', '../views/admindashboard.php'),
(2, 'Clients', 'Add', '../views/addclient.php'),
(3, 'Clients', 'Details', '../views/allclients.php'),
(4, 'Clients', 'Memberships', '../views/clientdetails.php'),
(5, 'Clients', 'Check in', '../views/clientin.php'),
(6, 'Coaches', 'View Coaches', '../views/coachesadmin.php'),
(7, 'Coaches', 'View Pt Clients', '../views/ptclients.php'),
(8, 'Coaches', 'View Classes', '../views/admin-classes.php'),
(9, 'HR', 'View Employees', '../views/employeesadmin.php'),
(10, 'HR', 'Attendance', '../views/attendance.php'),
(11, 'Admin', 'Sales Report', '../views/salesreport.php'),
(12, 'Packages', 'View Packages', '../views/viewpackagesadmin.php'),
(13, 'Packages', 'Add Package', '../views/addPackageadmin.php'),
(16, 'Coaches', 'My Classes ', '../views/myclasses.php'),
(17, 'Coaches', 'My Pt Clients ', '../views/myptclients.php'),
(18, 'Coaches', 'Add Classes', '../views/addClass.php'),
(19, 'HR', 'Add Employees', '../views/addEmployees.php'),
(20, 'Packages', 'Add PT Package', '../views/addPTpackage.php'),
(21, 'Packages', 'View PT Packages', '../views/viewPTpackage.php'),
(22, 'Requests', 'Requests', '../views/requests.php');

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `ID` int(11) NOT NULL,
  `Name` varchar(30) NOT NULL,
  `Description` varchar(500) NOT NULL,
  `imgPath` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(20, 'Saturday'),
(21, 'Saturday'),
(21, 'Sunday');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`ID`, `FirstName`, `LastName`, `Age`, `Gender`, `Weight`, `Height`, `Email`, `Password`, `Phone`) VALUES
(37, 'laila', 'nabil', 20, 'female', '0', '0', 'lailanabil@gmail.com', '$2y$10$VoPwyiscGCXCqbanwH9/nuBMSa3TmmF5tr.fs.7pzBsFkzLF8cezu', '01016542378'),
(44, 'omar', 'omran', 25, 'male', '0', '0', 'omaromran@gmail.com', '$2y$10$FtrUm7owwXQpOH9CvunRge/eacZZR.S2QN2ZmI4zCFkeIrOHKv6ee', '01023876543'),
(45, 'jana', 'omran', 20, 'female', '0', '0', 'janahani.nbis@gmail.com', '$2y$10$aVoXddxNbjd09/egCDebtOK2xmrK/YFxL23xA41vgh7WrjrYHGut2', '01091119866'),
(46, 'rania', 'kamal', 40, 'female', '0', '0', 'raniakamal@gmail.com', '$2y$10$b2WpY5G/aA5pMDt5.D9ji.HcYd20c0yP05qKKFiAy6Oag1M3CLY0C', '01091119866'),
(52, 'sara', 'khaled', 21, 'female', '0', '0', 'sarakhaled@gmail.com', '$2y$10$62KO.jACd81j6mRgIaSNjOIZuCtx3dtg0LsBvdbYANLa7YAtOkbMW', '01076532345'),
(53, 'khaled', 'ahmed', 20, 'male', '0', '0', 'khaledahmed@gmail.com', '$2y$10$AZfylTeX0Tv1cVcKuWAJgu7EaibIpl1KlsJ33yYx9piHDYnCOSiCq', '01076547890'),
(54, 'tara', 'emad', 24, 'female', '0', '0', 'taraemad@gmail.com', '$2y$10$QynZ.SLDqy7XdB.nj6B/wulHsV2vS.tHx/eUOKbEyHoNDEfl1x.yK', '01029876543');

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
  `Password` varchar(255) NOT NULL,
  `Img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`ID`, `Name`, `Email`, `PhoneNumber`, `Salary`, `Address`, `JobTitle`, `Password`, `Img`) VALUES
(3, 'Jana Hani', 'janahani.nbis@gmail.com', '01091119866', 3000, 'Nasr City', '4', '$2y$10$I51zRdy5H37xXp0GR3MJyej3j7nys2phNDDvU/GTtag.nzchJ3X1K', 'public/Images/user.jpeg'),
(4, 'Laila Nabil', 'lailanabil@gmail.com', '01108764532', 2000, 'Nasr City', '5', '$2y$10$KHQimzPxygAfLiwJgNc9MuzpjArfbTEqkgZ6afascIodNXs5bR/3q', 'public/Images/user.jpeg'),
(6, 'Fatemah Hatem', 'fatemahhatem@gmail.com', '01045456789', 6000, 'Fifth Settlement', '3', '$2y$10$VC9KfmU1UbK7vk3GTTm6S.bVThJQPjHH3E1NXtsMTWx0l4l3Dn/pa', '../public/Images/01045456789.png');

-- --------------------------------------------------------

--
-- Table structure for table `employee authorities`
--

CREATE TABLE `employee authorities` (
  `ID` int(11) NOT NULL,
  `JobTitleID` int(20) NOT NULL,
  `AuthorityID` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee authorities`
--

INSERT INTO `employee authorities` (`ID`, `JobTitleID`, `AuthorityID`) VALUES
(1, 4, 16),
(2, 4, 17),
(3, 3, 1),
(4, 3, 2),
(5, 3, 3),
(6, 3, 4),
(7, 3, 6),
(8, 3, 7),
(9, 3, 8),
(10, 3, 9),
(11, 3, 11),
(12, 3, 12),
(13, 3, 13),
(14, 3, 18),
(15, 3, 19),
(16, 3, 20),
(17, 3, 21),
(18, 3, 22),
(19, 5, 8),
(20, 5, 7),
(21, 5, 16),
(22, 5, 17),
(23, 1, 9),
(24, 1, 10),
(25, 1, 19),
(26, 1, 6),
(27, 2, 1),
(28, 2, 2),
(29, 2, 3),
(30, 2, 4),
(31, 2, 5);

-- --------------------------------------------------------

--
-- Table structure for table `job_titles`
--

CREATE TABLE `job_titles` (
  `Id` int(11) NOT NULL,
  `Name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `membership`
--

INSERT INTO `membership` (`ID`, `ClientID`, `PackageID`, `StartDate`, `EndDate`, `VisitsCount`, `InvitationsCount`, `InbodyCount`, `PrivateTrainingSessionsCount`, `FreezeCount`, `Freezed`, `isActivated`) VALUES
(10, 45, 13, '2023-11-28', '2024-01-28', 1, 4, 2, 2, 20, 0, 'Activated'),
(11, 46, 14, '2023-11-29', '2024-02-29', 0, 5, 3, 3, 30, 0, 'Activated'),
(12, 54, 14, '2023-12-16', '2024-03-16', 0, 5, 3, 3, 30, 0, 'Activated');

-- --------------------------------------------------------

--
-- Table structure for table `menu_items`
--

CREATE TABLE `menu_items` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `status` enum('enable','disable') DEFAULT 'enable',
  `menu_link` varchar(50) NOT NULL,
  `parent_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `menu_items`
--

INSERT INTO `menu_items` (`id`, `title`, `status`, `menu_link`, `parent_id`) VALUES
(1, 'Home', 'enable', '../views/index.php', NULL),
(2, 'Classes', 'enable', '../views/classes.php', NULL),
(3, 'Memberships', 'enable', '../views/memberships.php', NULL),
(4, 'Facilities', 'enable', '../views/facilities.php', NULL),
(5, 'About Us', 'enable', '../views/aboutus.php', NULL),
(6, 'Contact Us', 'enable', '../views/contactus.php', 5);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `ID` int(11) NOT NULL,
  `ClientID` int(50) NOT NULL,
  `CoachID` int(50) NOT NULL,
  `PrivateTrainingPackageID` int(50) NOT NULL,
  `SessionsCount` int(50) NOT NULL,
  `isActivated` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `private training membership`
--

INSERT INTO `private training membership` (`ID`, `ClientID`, `CoachID`, `PrivateTrainingPackageID`, `SessionsCount`, `isActivated`) VALUES
(22, 45, 3, 9, 10, 'Activated'),
(23, 54, 3, 9, 10, 'Activated');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
-- Table structure for table `reserved class`
--

CREATE TABLE `reserved class` (
  `ID` int(11) NOT NULL,
  `AssignedClassID` int(50) NOT NULL,
  `CoachID` int(50) NOT NULL,
  `ClientID` int(50) NOT NULL,
  `Attended` varchar(20) NOT NULL,
  `isActivated` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reserved class`
--

INSERT INTO `reserved class` (`ID`, `AssignedClassID`, `CoachID`, `ClientID`, `Attended`, `isActivated`) VALUES
(20, 5, 3, 45, '', 'Activated'),
(21, 7, 3, 46, '', 'Activated'),
(22, 8, 3, 46, '', 'Activated'),
(23, 7, 3, 44, '', 'Activated'),
(24, 6, 4, 45, '', 'Activated');

-- --------------------------------------------------------

--
-- Table structure for table `scheduled_unfreeze`
--

CREATE TABLE `scheduled_unfreeze` (
  `ID` int(11) NOT NULL,
  `membership_id` int(11) NOT NULL,
  `freezeEndDate` date NOT NULL,
  `freezeStartDate` date NOT NULL,
  `freezeCount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `employee authorities`
--
ALTER TABLE `employee authorities`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `test` (`AuthorityID`),
  ADD KEY `ID` (`ID`) USING BTREE,
  ADD KEY `test30` (`JobTitleID`);

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
-- Indexes for table `menu_items`
--
ALTER TABLE `menu_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `parent_id` (`parent_id`);

--
-- Indexes for table `package`
--
ALTER TABLE `package`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `private training membership`
--
ALTER TABLE `private training membership`
  ADD PRIMARY KEY (`ID`),
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
  ADD PRIMARY KEY (`ID`),
  ADD KEY `test8` (`AssignedClassID`),
  ADD KEY `test9` (`ClientID`),
  ADD KEY `test10` (`CoachID`);

--
-- Indexes for table `scheduled_unfreeze`
--
ALTER TABLE `scheduled_unfreeze`
  ADD KEY `fk-membership` (`membership_id`);

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
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `class`
--
ALTER TABLE `class`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `employee authorities`
--
ALTER TABLE `employee authorities`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `job_titles`
--
ALTER TABLE `job_titles`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `membership`
--
ALTER TABLE `membership`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `menu_items`
--
ALTER TABLE `menu_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `package`
--
ALTER TABLE `package`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `private training membership`
--
ALTER TABLE `private training membership`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `private training package`
--
ALTER TABLE `private training package`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `reserved class`
--
ALTER TABLE `reserved class`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `employee authorities`
--
ALTER TABLE `employee authorities`
  ADD CONSTRAINT `test` FOREIGN KEY (`AuthorityID`) REFERENCES `authority` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `test30` FOREIGN KEY (`JobTitleID`) REFERENCES `job_titles` (`Id`);

--
-- Constraints for table `menu_items`
--
ALTER TABLE `menu_items`
  ADD CONSTRAINT `menu_items_ibfk_1` FOREIGN KEY (`parent_id`) REFERENCES `menu_items` (`id`);

--
-- Constraints for table `private training membership`
--
ALTER TABLE `private training membership`
  ADD CONSTRAINT `test3` FOREIGN KEY (`ClientID`) REFERENCES `client` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `test4` FOREIGN KEY (`CoachID`) REFERENCES `employee` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `test5` FOREIGN KEY (`PrivateTrainingPackageID`) REFERENCES `private training package` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `scheduled_unfreeze`
--
ALTER TABLE `scheduled_unfreeze`
  ADD CONSTRAINT `fk-membership` FOREIGN KEY (`membership_id`) REFERENCES `membership` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
