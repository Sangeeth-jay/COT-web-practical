-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 23, 2023 at 07:16 AM
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
-- Database: `cerificate`
--

-- --------------------------------------------------------

--
-- Table structure for table `certificatr`
--

CREATE TABLE `certificatr` (
  `cid` int(11) NOT NULL,
  `certificateName` varchar(245) DEFAULT NULL,
  `type` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `certificatr`
--

INSERT INTO `certificatr` (`cid`, `certificateName`, `type`) VALUES
(1, 'ICT Graphics', 'NVQ'),
(2, 'ICT Technician NVQ level 4', 'NVQ'),
(3, 'National Certificate in ICT Technician', 'DTET');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `NIC` varchar(12) NOT NULL,
  `Name` varchar(245) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`NIC`, `Name`) VALUES
('1234', 'Sangeeth'),
('200125325421', 'A.B.C. Silva'),
('4512', 'jaye'),
('4847', 'hashen');

-- --------------------------------------------------------

--
-- Table structure for table `st_certi`
--

CREATE TABLE `st_certi` (
  `NIC` varchar(12) NOT NULL,
  `cid` int(11) NOT NULL,
  `cerNo` varchar(45) DEFAULT NULL,
  `recDate` date DEFAULT NULL,
  `Status` varchar(45) DEFAULT 'Not Issued'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `st_certi`
--

INSERT INTO `st_certi` (`NIC`, `cid`, `cerNo`, `recDate`, `Status`) VALUES
('1234', 1, '4561', '2023-03-23', 'Issued'),
('200125325421', 2, '734245', '2013-09-01', 'Received'),
('4512', 1, '546', '2023-03-23', 'Received'),
('4847', 3, '354', '2023-03-23', 'Issued');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `certificatr`
--
ALTER TABLE `certificatr`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`NIC`);

--
-- Indexes for table `st_certi`
--
ALTER TABLE `st_certi`
  ADD PRIMARY KEY (`NIC`,`cid`),
  ADD KEY `fk_student_has_Certificatr_Certificatr1_idx` (`cid`),
  ADD KEY `fk_student_has_Certificatr_student_idx` (`NIC`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `st_certi`
--
ALTER TABLE `st_certi`
  ADD CONSTRAINT `fk_student_has_Certificatr_Certificatr1` FOREIGN KEY (`cid`) REFERENCES `certificatr` (`cid`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_student_has_Certificatr_student` FOREIGN KEY (`NIC`) REFERENCES `student` (`NIC`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
