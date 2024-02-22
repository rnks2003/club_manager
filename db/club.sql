-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 21, 2024 at 10:27 AM
-- Server version: 8.3.0
-- PHP Version: 8.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `club`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `usn` varchar(10) NOT NULL,
  `aDate` date NOT NULL,
  `aTime` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`usn`, `aDate`, `aTime`) VALUES
('4VP21AI043', '2024-02-20', '14:56:44'),
('4VP21AI043', '2024-02-21', '15:03:51');

-- --------------------------------------------------------

--
-- Table structure for table `figures`
--

CREATE TABLE `figures` (
  `usn` varchar(10) NOT NULL,
  `role` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `figures`
--

INSERT INTO `figures` (`usn`, `role`) VALUES
('4VP21AI043', 'Secretary'),
('4VP21AI057', 'Co-Ordinator'),
('4VP21CD053', 'Finance Manager'),
('4VP21CS087', 'Joint-Secretary');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `username` varchar(10) NOT NULL,
  `password` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`username`, `password`) VALUES
('4VP21AI005', 'Ananya'),
('4VP21AI008', 'Apeksha'),
('4VP21AI043', 'admin'),
('4VP21AI053', 'Shrinidi'),
('4VP21AI057', 'Suhas'),
('4VP21CD034', 'Prajna'),
('4VP21CD040', 'Tejas'),
('4VP21CD053', 'Subrahmanya'),
('4VP21CS087', 'Shailesh');

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `usn` varchar(10) NOT NULL,
  `name` varchar(30) DEFAULT NULL,
  `branch` varchar(2) DEFAULT NULL,
  `phoneNumber` bigint DEFAULT NULL,
  `emailID` varchar(30) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `dayCount` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`usn`, `name`, `branch`, `phoneNumber`, `emailID`, `address`, `dayCount`) VALUES
('4VP21AI005', 'Ananya K ', 'AI', 7019513273, '4vp21ai005@vcetputtur.ac.in', 'Kallage House, Nadugallu post, Nalkooru village, Sulya TQ, Dakshina Kannada, 574218', 0),
('4VP21AI008', 'Apeksha D', 'AI', 9448305374, '4vp21ai008@vcetputtur.ac.in', 'Dembala House, Manila Village, Muruva Post, Bantwal TQ, Dakshina Kannada, 574243', 0),
('4VP21AI043', 'Ravi Narayana K S', 'AI', 9606374803, '4vp21ai043@gmail.com', '#XI/173, Sodankooru, Anekallu PO, Manjeshwara TQ, Kasaragod, 671323', 2),
('4VP21AI053', 'Shrinidhi D V', 'AI', 9900883066, '4vp21ai053@vcetputtur.ac.in', 'DVR Auto Agency, Shivamogga road, Hosanagara TQ, Shivamogga, 577418', 0),
('4VP21AI057', 'Subrahmanya Shivaram Hegde', 'AI', 7019742330, '4vp21ai057@vcetputtur.ac.in', '#219, Haragi, Itagi, Siddapur, Uttara Kannada, 581322', 0),
('4VP21CD034', 'Prajnashankari M N', 'CD', 9482812466, '4vp21cd034@vcetputtur.a.cin', 'Madakatte, Bantwal TQ, 574243 ', 0),
('4VP21CD040', 'S U Tejas', 'CD', 8277318798, '4vp21cd040@vcetputtur.ac.in', 'Madikeri', 0),
('4VP21CD053', 'Subrahmanya Prasad P S', 'CD', 7656435080, '4vp21cd053@vcetputtur.ac.in', 'Kanchigaradiddu House, Ball Post & Village, Sulya TQ, Dakshina Kannada, 574212 ', 0),
('4VP21CS087', 'Shailesh Sharma K', 'CS', 6235053469, '4vp21cs087@vcetputtur.ac.in', 'Kayyar', 0);

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `pName` varchar(30) NOT NULL,
  `pID` int NOT NULL,
  `pDescription` varchar(100) DEFAULT NULL,
  `leadUSN` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`pName`, `pID`, `pDescription`, `leadUSN`) VALUES
('Flower Classification', 2365, 'Machine Learning, Deep Learning, Image Processing', '4VP21AI057'),
('Line Follower', 2314, 'Sensors and Actuators, TinkerCAD, IoT', '4VP21CD040');

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE `teams` (
  `mUSN` varchar(10) NOT NULL,
  `leadUSN` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `teams`
--

INSERT INTO `teams` (`mUSN`, `leadUSN`) VALUES
('4VP21AI005', '4VP21AI057'),
('4VP21AI008', '4VP21AI057'),
('4VP21AI043', '4VP21AI057'),
('4VP21AI057', '4VP21AI057'),
('4VP21CD034', '4VP21CD040'),
('4VP21CD040', '4VP21CD040'),
('4VP21CD053', '4VP21CD040'),
('4VP21CS087', '4VP21CD040');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`usn`,`aDate`);

--
-- Indexes for table `figures`
--
ALTER TABLE `figures`
  ADD PRIMARY KEY (`usn`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`usn`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`pName`,`pID`),
  ADD KEY `leadUSN` (`leadUSN`);

--
-- Indexes for table `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`mUSN`),
  ADD KEY `leadUSN` (`leadUSN`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attendance`
--
ALTER TABLE `attendance`
  ADD CONSTRAINT `attendance_ibfk_1` FOREIGN KEY (`usn`) REFERENCES `members` (`usn`);

--
-- Constraints for table `figures`
--
ALTER TABLE `figures`
  ADD CONSTRAINT `figures_ibfk_1` FOREIGN KEY (`usn`) REFERENCES `members` (`usn`);

--
-- Constraints for table `login`
--
ALTER TABLE `login`
  ADD CONSTRAINT `login_ibfk_1` FOREIGN KEY (`username`) REFERENCES `members` (`usn`);

--
-- Constraints for table `projects`
--
ALTER TABLE `projects`
  ADD CONSTRAINT `projects_ibfk_1` FOREIGN KEY (`leadUSN`) REFERENCES `members` (`usn`);

--
-- Constraints for table `teams`
--
ALTER TABLE `teams`
  ADD CONSTRAINT `teams_ibfk_1` FOREIGN KEY (`mUSN`) REFERENCES `members` (`usn`),
  ADD CONSTRAINT `teams_ibfk_2` FOREIGN KEY (`leadUSN`) REFERENCES `projects` (`leadUSN`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
