-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Apr 19, 2019 at 08:35 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `attendance`
--

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `cId` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`cId`) VALUES
('cs101'),
('psy101'),
(''),
('dsfs'),
(''),
('cs101'),
('cs101'),
('ps101');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `eId` varchar(20) NOT NULL,
  `sDate` date DEFAULT NULL,
  `eDate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`eId`, `sDate`, `eDate`) VALUES
('alpha', '2019-04-01', '2019-04-26'),
('beta', '2019-04-01', '2019-04-30'),
('gamma', '2019-04-01', '2019-05-02'),
('HackLeague', '2019-03-10', '2019-10-10'),
('iCode', '2019-03-10', '2019-04-02'),
('something', '2019-03-13', '2019-04-12');

-- --------------------------------------------------------

--
-- Table structure for table `event_role`
--

CREATE TABLE `event_role` (
  `eId` varchar(20) DEFAULT NULL,
  `role` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `event_role`
--

INSERT INTO `event_role` (`eId`, `role`) VALUES
('HackLeague', 'arts'),
('HackLeague', 'draft'),
('HackLeague', 'tech'),
('HackLeague', 'logi'),
('HackLeague', 'tech'),
('HackLeague', 'account'),
('something', 'tech'),
('something', 'logi'),
('HackLeague', 'management');

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE `faculty` (
  `fId` int(11) NOT NULL,
  `fName` varchar(30) DEFAULT NULL,
  `gmailId` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`fId`, `fName`, `gmailId`) VALUES
(1, 'a', 'hatevineeth@gmail.com'),
(2, 'a', 'hatevineeth@gmail.com'),
(3, 'b', 'hatevineeth@gmail.com'),
(4, 'b', 'hatevineeth@gmail.com'),
(6, 'as', 'hatevineeth@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `faculty_event`
--

CREATE TABLE `faculty_event` (
  `fId` int(11) DEFAULT NULL,
  `eId` varchar(20) NOT NULL,
  `role` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faculty_event`
--

INSERT INTO `faculty_event` (`fId`, `eId`, `role`) VALUES
(1, 'HackLeague', 'Coordinator'),
(2, 'HackLeague', 'AttendanceIncharge'),
(1, 'HackLeague', 'AttendanceIncharge'),
(2, 'HackLeague', 'Coordinator'),
(3, 'HackLeague', 'Coordinator'),
(4, 'HackLeague', 'AttendanceIncharge'),
(1, 'asd', 'asd'),
(1, 'asd', 'asda');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `sId` int(11) NOT NULL,
  `gmailId` varchar(30) DEFAULT NULL,
  `sName` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`sId`, `gmailId`, `sName`) VALUES
(1, 'hatevineeth@gmail.com', 'a'),
(2, 'hatevineeth@gmail.com', 'aa'),
(10, 'sowmyamudunuri15@gmail.com', 'b');

-- --------------------------------------------------------

--
-- Table structure for table `student_event`
--

CREATE TABLE `student_event` (
  `sId` int(11) DEFAULT NULL,
  `eId` varchar(20) DEFAULT NULL,
  `role` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_event`
--

INSERT INTO `student_event` (`sId`, `eId`, `role`) VALUES
(1, 'HackLeague', 'tech'),
(1, 'HackLeague', 'draft'),
(1, 'HackLeague', 'draft'),
(1, 'HackLeague', 'draft'),
(10, 'HackLeague', 'tech'),
(1, 'HackLeague', 'tech'),
(2, 'HackLeague', 'tech'),
(1, 'something', 'tech'),
(1, 'something', 'tech'),
(1, 'something', 'draft');

-- --------------------------------------------------------

--
-- Table structure for table `student_event_details`
--

CREATE TABLE `student_event_details` (
  `entryId` bigint(20) NOT NULL,
  `cCode` varchar(20) DEFAULT NULL,
  `fId` int(11) DEFAULT NULL,
  `sNum` int(5) DEFAULT NULL,
  `sId` int(11) DEFAULT NULL,
  `slot` int(5) DEFAULT NULL,
  `dates` date DEFAULT NULL,
  `status` varchar(10) DEFAULT NULL,
  `role` varchar(10) NOT NULL,
  `aStatus` varchar(10) DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_event_details`
--

INSERT INTO `student_event_details` (`entryId`, `cCode`, `fId`, `sNum`, `sId`, `slot`, `dates`, `status`, `role`, `aStatus`) VALUES
(1, 'cs101', 1, 1, 1, 5, '2019-04-04', 'Approved', 'tech', 'Approved'),
(2, 'cs101', 1, 1, 1, 7, '2019-04-04', 'Approved', 'tech', 'Approved');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`eId`);

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`fId`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`sId`);

--
-- Indexes for table `student_event_details`
--
ALTER TABLE `student_event_details`
  ADD PRIMARY KEY (`entryId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `student_event_details`
--
ALTER TABLE `student_event_details`
  MODIFY `entryId` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
