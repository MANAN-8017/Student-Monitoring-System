-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 01, 2025 at 08:34 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sql`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `id` int(11) NOT NULL,
  `student_id` varchar(100) DEFAULT NULL,
  `subject` varchar(50) NOT NULL,
  `Total` int(11) DEFAULT NULL,
  `Present` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`id`, `student_id`, `subject`, `Total`, `Present`) VALUES
(1, '24CEUOZ105', 'Maths', 42, 38),
(2, '24CEUOZ105', 'SCP', 53, 40),
(3, '24CEUOZ105', 'PPS', 78, 62),
(4, '24CEUOZ105', 'HW', 31, 29),
(5, '24CEUOZ105', 'English', 39, 30),
(6, '24CEUOZ105', 'EVS', 18, 12),
(7, '24CEUBS113', 'Maths', 42, 41),
(8, '24CEUBS113', 'SCP', 53, 52),
(9, '24CEUBS113', 'PPS', 78, 78),
(10, '24CEUBS113', 'HW', 31, 29),
(11, '24CEUBS113', 'English', 39, 37),
(12, '24CEUBS113', 'EVS', 18, 18);

-- --------------------------------------------------------

--
-- Table structure for table `faculties`
--

CREATE TABLE `faculties` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `faculties`
--

INSERT INTO `faculties` (`id`, `name`, `email`, `password`) VALUES
(1, 'Name', 'Faculty@ddu.ac.in', 'Faculty123');

-- --------------------------------------------------------

--
-- Table structure for table `grades`
--

CREATE TABLE `grades` (
  `id` int(11) NOT NULL,
  `student_id` varchar(100) DEFAULT NULL,
  `subject` varchar(50) DEFAULT NULL,
  `Total_Marks` int(11) NOT NULL,
  `Obtained_Marks` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `grades`
--

INSERT INTO `grades` (`id`, `student_id`, `subject`, `Total_Marks`, `Obtained_Marks`) VALUES
(1, '24CEUOZ105', 'Maths', 100, 100),
(2, '24CEUOZ105', 'SCP', 100, 80),
(10, '24CEUOZ105', 'PPS', 100, 95),
(11, '24CEUOZ105', 'HW', 100, 90),
(12, '24CEUOZ105', 'English', 100, 85),
(13, '24CEUOZ105', 'EVS', 100, 75),
(14, '24CEUBS113', 'Maths', 100, 100),
(15, '24CEUBS113', 'SCP', 100, 90),
(16, '24CEUBS113', 'PPS', 100, 90),
(17, '24CEUBS113', 'HW', 100, 90),
(18, '24CEUBS113', 'English', 100, 85),
(19, '24CEUBS113', 'EVS', 100, 75);

-- --------------------------------------------------------

--
-- Table structure for table `material`
--

CREATE TABLE `material` (
  `id` int(11) NOT NULL,
  `file_path` varchar(255) DEFAULT NULL,
  `subject` varchar(100) DEFAULT NULL,
  `student_id` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `material`
--

INSERT INTO `material` (`id`, `file_path`, `subject`, `student_id`) VALUES
(1, 'Uploaded/PPSII_B2__CE111_LAB6 .pdf', 'PPS', NULL),
(2, 'Uploaded/PPSII_B2__CE111_LAB7.pdf', 'PPS', NULL),
(3, 'Uploaded/PPSII_B2_CE111_LAB8.pdf', 'PPS', NULL),
(4, 'Uploaded/PPSII_B2_CE111_LAB9.pdf', 'PPS', NULL),
(5, 'Uploaded/chapter 5_B_light_semiconductor interaction (2).pdf', 'SCP', NULL),
(6, 'Uploaded/HW 1 Lab 1.pdf', 'HW', NULL),
(8, 'Uploaded/HW I - Lab 8.pdf', 'HW', NULL),
(9, 'Uploaded/DDU SSIP PPT template(4).pdf', 'ENGLISH', NULL),
(10, 'Uploaded/Unit_1.pdf', 'EVS', NULL),
(11, 'Uploaded/Unit_2.pdf', 'EVS', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `student_id` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `mobile_num` varchar(15) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`student_id`, `name`, `mobile_num`, `email`, `password`) VALUES
('24CEUBS113', 'Samarth Patel', NULL, 'Samarth@ddu.ac.in', 'Samarth123'),
('24CEUOZ105', 'Manan Patel', NULL, 'Manan@ddu.ac.in', 'Manan123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_id` (`student_id`);

--
-- Indexes for table `faculties`
--
ALTER TABLE `faculties`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `grades`
--
ALTER TABLE `grades`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_id` (`student_id`);

--
-- Indexes for table `material`
--
ALTER TABLE `material`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_id` (`student_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`student_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `faculties`
--
ALTER TABLE `faculties`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `grades`
--
ALTER TABLE `grades`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `material`
--
ALTER TABLE `material`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attendance`
--
ALTER TABLE `attendance`
  ADD CONSTRAINT `attendance_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `students` (`student_id`) ON DELETE CASCADE;

--
-- Constraints for table `grades`
--
ALTER TABLE `grades`
  ADD CONSTRAINT `grades_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `students` (`student_id`) ON DELETE CASCADE;

--
-- Constraints for table `material`
--
ALTER TABLE `material`
  ADD CONSTRAINT `material_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `students` (`student_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
