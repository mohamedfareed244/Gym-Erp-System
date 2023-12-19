-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 19, 2023 at 12:53 PM
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
(1, 1, '2023-12-21', '20:30:00', '22:00:00', 'Free', 0, 3, 20, 20),
(2, 1, '2023-12-24', '20:30:00', '22:00:00', 'Free', 0, 3, 20, 20),
(3, 2, '2023-12-26', '11:30:00', '00:45:00', 'NotFree', 150, 3, 10, 10),
(4, 6, '2023-12-26', '18:30:00', '20:00:00', 'NotFree', 200, 2, 10, 10),
(5, 7, '2023-12-20', '17:30:00', '18:45:00', 'Free', 0, 2, 15, 13),
(6, 5, '2023-12-24', '19:30:00', '20:30:00', 'Free', 0, 2, 20, 19);

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `ID` int(11) NOT NULL,
  `EmployeeId` int(11) NOT NULL,
  `Day` date NOT NULL,
  `Status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(19, 'HR', 'Add Employees', '../views/addEmployee.php'),
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
(1, 'Zumba', 'Zumba is a dance-based fitness class that incorporates Latin and international music. It combines energetic dance moves with cardiovascular exercises to create a fun and engaging workout.', 'public/Images/zumba2.jpg'),
(2, 'Yoga', 'Yoga classes focus on improving flexibility, strength, and mental well-being through a combination of physical postures, breath control, and meditation.', 'public/Images/yoga.jpg'),
(3, 'Pilates', 'Pilates focuses on core strength, flexibility, and overall body awareness. It involves precise movements and controlled breathing to improve posture and build long, lean muscles.', 'public/Images/pilates.jpg'),
(4, 'Aqua Aerobics', 'Aqua aerobics takes traditional aerobic exercises into the pool. The water provides resistance, making it a low-impact yet effective workout that improves cardiovascular fitness and muscle strength.', 'public/Images/aerobics1.jpg'),
(5, 'Mind-Body Fusion', 'Classes like Barre combine elements of ballet, Pilates, and yoga. They target small muscle groups through isometric movements, promoting strength, balance, and flexibility.', 'public/Images/mind.jpg'),
(6, 'Circuit Training', 'Circuit training involves moving through a series of different exercises at stations with minimal rest. It combines strength and cardiovascular training for an efficient and effective workout.', 'public/Images/circuit.jpg'),
(7, 'Parkour', 'Parkour classes teach participants to navigate obstacles and urban environments with fluid movements. It improves agility, strength, and spatial awareness.', 'public/Images/parkour.jpg'),
(8, 'Strength and Conditioning', 'Strength and conditioning classes focus on improving overall athletic performance. They incorporate a mix of weightlifting, plyometrics, and agility drills to enhance strength and power.', 'public/Images/strength.jpg'),
(9, 'Aerial Yoga', 'Aerial yoga combines traditional yoga poses with the use of silk hammocks suspended from the ceiling. It adds an element of suspension and flexibility, enhancing strength and balance.', 'public/Images/aerial.jpg');

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
(1, 'Thursday'),
(1, 'Sunday'),
(2, 'Saturday'),
(2, 'Tuesday'),
(3, 'Wednesday'),
(4, 'Friday'),
(4, 'Saturday'),
(5, 'Sunday'),
(6, 'Tuesday'),
(7, 'Wednesday'),
(8, 'Saturday'),
(9, 'Saturday');

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
(1, 'Jana', 'Hani', 20, 'female', '0', '0', 'janahani.nbis@gmail.com', '$2y$10$6rfifOSwq3.zxmOMecimduSU5tISMgk5NbY5OJO9FkbjxNXUeTsCO', '01091119866'),
(2, 'laila', 'nabil', 20, 'female', '0', '0', 'lailanabil@gmail.com', '$2y$10$h/17cxJykzL.PgytAoU8zOUsAaKH663Q/Mpke1.W61DW3tFsOHdEq', '01016542378'),
(3, 'Malak', 'Helmy', 19, 'female', '0', '0', 'malakhelmy@gmail.com', '$2y$10$A40F17EUeNKg.SprRyQVJ.ku2qhjIB7bYXqtd9fGKB3qOqKlezMAq', '01054678921'),
(4, 'Fatemah', 'Hatem', 20, 'female', '0', '0', 'fatemahhatem@gmail.com', '$2y$10$dkP2BzsaLAvTCUKtnlPe6eY71yeatJStJzJnUCPi22JQSI6drVp.a', '01023456789'),
(5, 'Mohamed', 'Fareed', 20, 'male', '0', '0', 'mohamedfareed@gmail.com', '$2y$10$guqQVIeHmX5ZQWeetlbzQuVZLxn7z.XzmKN38n3gX8/znjxIXnVXC', '01032674590');

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
(1, 'Jana Hani', 'janahani.nbis@gmail.com', '01091119866', 5000, 'Nasr City', '3', '$2y$10$BtSQjyK9B7q/lE6VIr63PemDYW.rz5QZkTkPLFGfEB1ogLRwWIU42', '../public/Images/01091119866.jpg'),
(2, 'Mohamed Fareed', 'mohamedfareed@gmail.com', '01072347856', 4000, 'Fifth Settlement', '4', '$2y$10$D7A9cTpxUCyBJMea97kZr.bW9XuI1OMAo6QEJ7kXAL9AmWS8kKotK', '../public/Images/01072347856.jpg'),
(3, 'Malak Helmy', 'malakhelmy@gmail.com', '01045213489', 4500, 'Fifth Settlement', '5', '$2y$10$FpyUIBni7ED1BhxXRSXu7uFncS7P9qyO8iwUc2KwUVQN3g.XIelcm', '../public/Images/01045213489.jpg'),
(4, 'Laila Nabil', 'lailanabil@gmail.com', '01026782390', 3500, 'Nasr City', '1', '$2y$10$VGtcfAm3Fi3XpDO6zP5roeXec2zJiBbp0XTJGwue3qtc5OrKShlJy', '../public/Images/01026782390.jpg'),
(5, 'Fatemah Hatem', 'fatemahhatem@gmail.com', '01012876231', 2500, 'Fifth Settlement', '2', '$2y$10$y/fYHvWisGEInngA1TTOA.9wptLWtjqEIzD76EgfXfWZoOR0//y7m', '../public/Images/01012876231.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `employee authorities`
--

CREATE TABLE `employee authorities` (
  `JobTitleID` int(20) NOT NULL,
  `AuthorityID` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee authorities`
--

INSERT INTO `employee authorities` (`JobTitleID`, `AuthorityID`) VALUES
(4, 16),
(4, 17),
(3, 1),
(3, 2),
(3, 3),
(3, 4),
(3, 6),
(3, 7),
(3, 8),
(3, 9),
(3, 11),
(3, 12),
(3, 13),
(3, 18),
(3, 19),
(3, 20),
(3, 21),
(3, 22),
(5, 8),
(5, 7),
(5, 16),
(5, 17),
(1, 9),
(1, 10),
(1, 19),
(1, 6),
(2, 1),
(2, 2),
(2, 3),
(2, 4),
(2, 5);

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
(1, 1, 1, '2023-12-19', '2024-01-19', 0, 2, 1, 1, 10, 0, 'Activated'),
(2, 2, 2, '2023-12-19', '2024-02-19', 0, 4, 2, 2, 20, 0, 'Activated'),
(3, 3, 4, '2023-12-19', '2024-06-19', 0, 5, 3, 3, 30, 0, 'Activated');

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
(1, '1 Month', 1, 'limited', 20, 10, 2, 1, 1, 600, 'Activated'),
(2, '2 Months', 2, 'limited', 45, 20, 4, 2, 2, 800, 'Activated'),
(3, '3 Months', 3, 'unlimited', 0, 30, 5, 3, 3, 1100, 'Activated'),
(4, '4 Months + 2 Months Free', 6, 'unlimited', 0, 30, 5, 3, 3, 2500, 'Activated'),
(5, '6 Months + 3 Months Free', 9, 'unlimited', 0, 70, 7, 6, 6, 3400, 'Activated');

-- --------------------------------------------------------

--
-- Table structure for table `private training membership`
--

CREATE TABLE `private training membership` (
  `ID` int(11) NOT NULL,
  `ClientID` int(11) NOT NULL,
  `CoachID` int(11) NOT NULL,
  `PrivateTrainingPackageID` int(11) NOT NULL,
  `SessionsCount` int(50) NOT NULL,
  `isActivated` varchar(30) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `private training membership`
--

INSERT INTO `private training membership` (`ID`, `ClientID`, `CoachID`, `PrivateTrainingPackageID`, `SessionsCount`, `isActivated`, `date`) VALUES
(1, 2, 2, 1, 10, 'Activated', '0000-00-00'),
(2, 3, 2, 2, 30, 'Activated', '0000-00-00');

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
(1, 'Beginners', 10, 1, 1000, 'Activated'),
(2, 'Intermediate', 30, 3, 2800, 'Activated'),
(3, 'Advanced', 50, 6, 4300, 'Activated'),
(4, 'For 1 Month', 15, 1, 1500, 'Activated'),
(5, 'For 2 Months', 25, 2, 2400, 'Activated'),
(6, 'For 3 Months', 35, 3, 3300, 'Activated'),
(7, 'For 4 Months', 45, 4, 4200, 'Activated');

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
(1, 5, 2, 1, '', 'Activated'),
(2, 5, 2, 2, '', 'Activated'),
(3, 4, 2, 2, '', 'Activated'),
(4, 6, 2, 3, '', 'Activated'),
(5, 3, 3, 3, '', 'Activated');

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
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ClassID` (`ClassID`),
  ADD KEY `CoachID` (`CoachID`);

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `EmployeeId` (`EmployeeId`);

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
  ADD KEY `ClassID` (`ClassID`);

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
  ADD KEY `test` (`AuthorityID`),
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
  ADD KEY `ClientID` (`ClientID`),
  ADD KEY `PackageID` (`PackageID`);

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
  ADD PRIMARY KEY (`ID`);

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
  ADD KEY `AssignedClassID` (`AssignedClassID`),
  ADD KEY `ClientID` (`ClientID`),
  ADD KEY `CoachID` (`CoachID`);

--
-- Indexes for table `scheduled_unfreeze`
--
ALTER TABLE `scheduled_unfreeze`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `membership_id` (`membership_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assignedclass`
--
ALTER TABLE `assignedclass`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `authority`
--
ALTER TABLE `authority`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `class`
--
ALTER TABLE `class`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `job_titles`
--
ALTER TABLE `job_titles`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `membership`
--
ALTER TABLE `membership`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `private training package`
--
ALTER TABLE `private training package`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `reserved class`
--
ALTER TABLE `reserved class`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `scheduled_unfreeze`
--
ALTER TABLE `scheduled_unfreeze`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `assignedclass`
--
ALTER TABLE `assignedclass`
  ADD CONSTRAINT `assignedclass_ibfk_1` FOREIGN KEY (`ClassID`) REFERENCES `class` (`ID`),
  ADD CONSTRAINT `assignedclass_ibfk_2` FOREIGN KEY (`CoachID`) REFERENCES `employee` (`ID`);

--
-- Constraints for table `attendance`
--
ALTER TABLE `attendance`
  ADD CONSTRAINT `attendance_ibfk_1` FOREIGN KEY (`EmployeeId`) REFERENCES `employee` (`ID`);

--
-- Constraints for table `class_days`
--
ALTER TABLE `class_days`
  ADD CONSTRAINT `class_days_ibfk_1` FOREIGN KEY (`ClassID`) REFERENCES `class` (`ID`);

--
-- Constraints for table `employee authorities`
--
ALTER TABLE `employee authorities`
  ADD CONSTRAINT `employee authorities_ibfk_1` FOREIGN KEY (`AuthorityID`) REFERENCES `authority` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `employee authorities_ibfk_2` FOREIGN KEY (`JobTitleID`) REFERENCES `job_titles` (`Id`);

--
-- Constraints for table `membership`
--
ALTER TABLE `membership`
  ADD CONSTRAINT `membership_ibfk_1` FOREIGN KEY (`ClientID`) REFERENCES `client` (`ID`),
  ADD CONSTRAINT `membership_ibfk_2` FOREIGN KEY (`PackageID`) REFERENCES `package` (`ID`);

--
-- Constraints for table `menu_items`
--
ALTER TABLE `menu_items`
  ADD CONSTRAINT `menu_items_ibfk_1` FOREIGN KEY (`parent_id`) REFERENCES `menu_items` (`id`);

--
-- Constraints for table `reserved class`
--
ALTER TABLE `reserved class`
  ADD CONSTRAINT `reserved class_ibfk_1` FOREIGN KEY (`AssignedClassID`) REFERENCES `assignedclass` (`ID`),
  ADD CONSTRAINT `reserved class_ibfk_2` FOREIGN KEY (`ClientID`) REFERENCES `client` (`ID`),
  ADD CONSTRAINT `reserved class_ibfk_3` FOREIGN KEY (`CoachID`) REFERENCES `employee` (`ID`);

--
-- Constraints for table `scheduled_unfreeze`
--
ALTER TABLE `scheduled_unfreeze`
  ADD CONSTRAINT `scheduled_unfreeze_ibfk_1` FOREIGN KEY (`membership_id`) REFERENCES `membership` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
