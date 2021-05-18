-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 04, 2021 at 08:21 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `enrollment`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_payment`
--

CREATE TABLE `tbl_payment` (
  `payment_id` int(11) NOT NULL,
  `payment_reference_no` varchar(100) NOT NULL,
  `student_id` int(11) NOT NULL,
  `transaction_status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_payment`
--

INSERT INTO `tbl_payment` (`payment_id`, `payment_reference_no`, `student_id`, `transaction_status`) VALUES
(1, '0000000001', 1, 0),
(15, '0000000002', 2, 1),
(17, '0000000003', 3, 0),
(18, '0000000004', 4, 1),
(23, '0000000005', 4, 0),
(24, '0000000006', 1, 0),
(26, '0000000007', 6, 0),
(25, '0000000008', 5, 0),
(29, '0000000009', 6, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_student`
--

CREATE TABLE `tbl_student` (
  `student_id` int(10) NOT NULL,
  `first_name` varchar(45) NOT NULL,
  `middle_name` varchar(45) NOT NULL,
  `last_name` varchar(45) NOT NULL,
  `birthdate` date DEFAULT current_timestamp(),
  `gender` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `contact_no` varchar(11) NOT NULL,
  `program` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_student`
--

INSERT INTO `tbl_student` (`student_id`, `first_name`, `middle_name`, `last_name`, `birthdate`, `gender`, `email`, `contact_no`, `program`) VALUES
(1, 'test', '', 'test', '1993-12-12', 1, 'TEST@GMAIL.COM', '12345678901', 'BS Information Technology'),
(2, 'test', 'test', 'test', '1993-12-12', 1, 'sto.domingo_jordan@yahoo.com', '12345678901', 'BS Information Technology'),
(3, 'test', 'te', 'test', '1993-12-12', 1, 'sto.domingo_jordan@yahoo.com', '12312312312', 'BS Information Technology'),
(4, 'test', '', 'TEST', '1994-12-12', 1, 'sto.domingo_jordan@yahoo.com', '12345678901', 'BS Information Technology'),
(5, 'teetett', 'tetet', 'tete`', '1992-12-12', 1, 'sto.domingo_jordan@yahoo.com', '45645645665', 'BS Information Technology'),
(6, 'test', '', 'test', '1992-12-12', 1, 'TEST@GMAIL.COM', '12312312312', 'BS Information Technology');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_payment`
--
ALTER TABLE `tbl_payment`
  ADD PRIMARY KEY (`payment_reference_no`),
  ADD UNIQUE KEY `payment_id` (`payment_id`);

--
-- Indexes for table `tbl_student`
--
ALTER TABLE `tbl_student`
  ADD PRIMARY KEY (`student_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_payment`
--
ALTER TABLE `tbl_payment`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `tbl_student`
--
ALTER TABLE `tbl_student`
  MODIFY `student_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
