-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 18, 2020 at 07:17 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hospital`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `user` varchar(100) NOT NULL,
  `pass` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `user`, `pass`) VALUES
(1, 'admin@gmail.com', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `appt`
--

CREATE TABLE `appt` (
  `ano` int(11) NOT NULL,
  `adoctor` int(11) NOT NULL,
  `apatient` int(11) NOT NULL,
  `atime` varchar(11) NOT NULL,
  `ashow` varchar(1) NOT NULL DEFAULT 'Y',
  `adate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `appt`
--

INSERT INTO `appt` (`ano`, `adoctor`, `apatient`, `atime`, `ashow`, `adate`) VALUES
(3, 4, 3, '12:10', 'Y', '2016-12-05'),
(13, 5, 6, '12:45', 'Y', '2020-11-25'),
(14, 8, 4, '01:03', 'Y', '2020-11-10'),
(19, 5, 2, '20:53', 'Y', '2020-11-15'),
(25, 5, 4, '21:23', 'Y', '2020-11-16'),
(29, 8, 4, '01:51', 'Y', '2020-11-16'),
(31, 4, 28, '21:56', 'Y', '2020-11-18'),
(46, 7, 5, '15:33', 'Y', '2020-11-28'),
(47, 7, 5, '15:33', 'N', '2020-11-28'),
(48, 10, 12, '11:38', 'N', '2020-12-01'),
(49, 4, 28, '14:37', 'Y', '2020-12-12'),
(50, 9, 22, '03:42', 'Y', '2020-12-07');

-- --------------------------------------------------------

--
-- Table structure for table `doct`
--

CREATE TABLE `doct` (
  `dno` int(11) NOT NULL,
  `dname` varchar(30) NOT NULL,
  `dspec` varchar(30) NOT NULL,
  `dshow` varchar(1) NOT NULL DEFAULT 'Y'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doct`
--

INSERT INTO `doct` (`dno`, `dname`, `dspec`, `dshow`) VALUES
(1, 'Dr. Sonu Singh', 'Heart', 'Y'),
(2, 'Dr. Sanjay Mishra', 'Brain', 'Y'),
(4, 'Dr. Renu Mishra', 'Haddi', 'Y'),
(5, 'Dr. Mehta Paswan', 'Kirni', 'Y'),
(6, 'Dr. Rama Shankar', 'Braind', 'Y'),
(7, 'Dr. Renu Shina', 'Heart', 'Y'),
(8, 'Dr. Priyanka Gupta', 'Heart', 'Y'),
(9, 'Dr. Utpalkant Singh', 'Ridh', 'Y'),
(10, 'Dr. Suddha Yadav', 'Heart', 'Y'),
(18, 'Dr. Sasi Bhusan Singh', 'Braind', 'Y'),
(19, 'Dr. Amit Gupta', 'Kirni', 'N'),
(20, 'Dr. Pinki Singh', 'Skin', 'N');

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `pno` int(11) NOT NULL,
  `pname` varchar(30) NOT NULL,
  `paddr` varchar(30) NOT NULL,
  `psex` varchar(1) NOT NULL,
  `pshow` varchar(1) NOT NULL DEFAULT 'Y'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`pno`, `pname`, `paddr`, `psex`, `pshow`) VALUES
(1, 'Mr. Ajay Tiwari', 'Patna', 'M', 'Y'),
(2, 'Silpi Kumari', 'Patna', 'F', 'Y'),
(3, 'Abhijeet Singh', 'Delhi Ncr', 'M', 'Y'),
(4, 'Dinesh kumar', 'Siwan', 'M', 'Y'),
(5, 'Rahul Yadav', 'Gopalganj', 'M', 'Y'),
(6, 'Kumar Sanu', 'Patna, Bihar', 'M', 'Y'),
(7, 'Suman Kumari', 'Utter Pradesh', 'F', 'Y'),
(12, 'Suman Kumari', 'Punjab', 'F', 'Y'),
(14, 'Santi Devi', 'Jharkhand', 'F', 'N'),
(20, 'Deelip Kumar', 'Punjab', 'M', 'Y'),
(22, 'Kushum Kumari', 'Gopalganj', 'F', 'Y'),
(25, 'Anand Kumar', 'Delhi', 'M', 'Y'),
(26, 'Shobha Kumari', 'Patna', 'F', 'N'),
(28, 'Dinesh yadav', 'Siwan, Bihar', 'M', 'Y'),
(31, 'Pinki kumari', 'Patna', 'F', 'Y'),
(32, 'Rahul Kumar', 'Gorakhpur', 'M', 'Y'),
(34, 'Arti Kumari', 'Siwan', 'F', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `slot`
--

CREATE TABLE `slot` (
  `sno` int(11) NOT NULL,
  `stime` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `appt`
--
ALTER TABLE `appt`
  ADD PRIMARY KEY (`ano`);

--
-- Indexes for table `doct`
--
ALTER TABLE `doct`
  ADD PRIMARY KEY (`dno`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`pno`);

--
-- Indexes for table `slot`
--
ALTER TABLE `slot`
  ADD PRIMARY KEY (`sno`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `appt`
--
ALTER TABLE `appt`
  MODIFY `ano` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `doct`
--
ALTER TABLE `doct`
  MODIFY `dno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `pno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `slot`
--
ALTER TABLE `slot`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
