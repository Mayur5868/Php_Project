-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 13, 2025 at 01:21 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `studentdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `cty_id` int(50) NOT NULL,
  `cty_name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`cty_id`, `cty_name`) VALUES
(1, 'Surat'),
(2, 'Mumbai'),
(3, 'Ahmedabad'),
(4, 'Rajkot'),
(5, 'Baroda');

-- --------------------------------------------------------

--
-- Table structure for table `principal`
--

CREATE TABLE `principal` (
  `p_id` int(50) NOT NULL,
  `p_name` varchar(50) DEFAULT NULL,
  `p_pass` varchar(50) DEFAULT NULL,
  `p_gender` varchar(50) DEFAULT NULL,
  `p_age` int(10) DEFAULT NULL,
  `p_doj` varchar(50) DEFAULT NULL,
  `p_email` varchar(30) DEFAULT NULL,
  `p_mobile` varchar(30) DEFAULT NULL,
  `city` int(50) DEFAULT NULL,
  `Status` enum('Active','Block') NOT NULL DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `principal`
--

INSERT INTO `principal` (`p_id`, `p_name`, `p_pass`, `p_gender`, `p_age`, `p_doj`, `p_email`, `p_mobile`, `city`, `Status`) VALUES
(1, 'Mayur', '1234', 'Male', 50, '1999-07-17', 'mayurtailor@gmail.com', '9798979895', 1, 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `stu_id` int(50) NOT NULL,
  `stu_pass` varchar(50) DEFAULT NULL,
  `stu_name` varchar(50) DEFAULT NULL,
  `stu_gender` varchar(50) DEFAULT NULL,
  `stu_dob` varchar(50) DEFAULT NULL,
  `stu_email` varchar(50) DEFAULT NULL,
  `stu_mobile` varchar(20) DEFAULT NULL,
  `stu_fmobile` varchar(20) DEFAULT NULL,
  `stu_std` varchar(50) DEFAULT NULL,
  `stu_sub` varchar(50) DEFAULT NULL,
  `stu_city` int(50) DEFAULT NULL,
  `Status` enum('Active','Block') NOT NULL DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`stu_id`, `stu_pass`, `stu_name`, `stu_gender`, `stu_dob`, `stu_email`, `stu_mobile`, `stu_fmobile`, `stu_std`, `stu_sub`, `stu_city`, `Status`) VALUES
(1, '12345', 'Mayur', 'Male', '1999', 'mayurtailor994@gmail.com', '2147483647', '2147483647', '12', 'Science,Mathematics,Art,English,Social_studies,Che', 1, 'Active'),
(2, '123', 'Bhumika', 'Female', '2009-02-17', 'bhumikapatel@gmail.com', '9897969594', '8596749674', '11', 'Mathematics,English,Social_studies', 4, 'Active'),
(4, '123', 'Uday', 'Male', '2025-02-03', 'bhumikapatel123@gmail.com', '2147483647', '2147483647', '10', 'Mathematics,Chemistry,Physics', 3, 'Active'),
(8, '159', 'raj', 'Male', '2025-02-07', 'raj@gmail.com', '7989458674', '8596749674', '11', 'Science,English,Social_studies,Chemistry,Physics', 3, 'Active'),
(10, '963', 'ritik', 'Male', '2005-05-14', 'ritik@gmail.com', '8989898989', '9898989898', '10', 'Mathematics,English', 4, 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `t_id` int(50) NOT NULL,
  `t_name` varchar(50) DEFAULT NULL,
  `t_pass` varchar(50) DEFAULT NULL,
  `t_gender` varchar(50) DEFAULT NULL,
  `t_age` int(10) DEFAULT NULL,
  `t_doj` varchar(50) DEFAULT NULL,
  `t_email` varchar(50) DEFAULT NULL,
  `t_mob` varchar(20) DEFAULT NULL,
  `t_desig` varchar(50) DEFAULT NULL,
  `t_subject` varchar(50) DEFAULT NULL,
  `t_city` int(50) DEFAULT NULL,
  `Status` enum('Active','Block') NOT NULL DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`t_id`, `t_name`, `t_pass`, `t_gender`, `t_age`, `t_doj`, `t_email`, `t_mob`, `t_desig`, `t_subject`, `t_city`, `Status`) VALUES
(1, 'Mayur', '123', 'Male', 25, '2020-07-01', 'mayur123@gmail.com', '8141086991', 'Vice Principal', 'Science,Mathematics', 1, 'Active'),
(2, 'Bhumika', '12345', 'Female', 30, '2022-05-03', 'bhumika@gmail.com', '9988665544', 'Head of Department', 'Science,English,Chemistry', 3, 'Active'),
(3, 'Nita', '321', 'Female', 45, '2015-06-09', 'nita@gmail.com', '9693929194', 'Primary Head', 'Mathematics,Art', 2, 'Active'),
(5, 'Renu', '852', 'Female', 35, '2025-01-04', 'renu@gmail.com', '9895969497', 'Primary Head', 'Art,Social_studies', 4, 'Active'),
(6, 'Nikul', '456', 'Male', 55, '2015-05-01', 'nikul@hotmail.com', '9727492537', 'Head of Secondary ', 'Chemistry,Physics', 3, 'Active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`cty_id`);

--
-- Indexes for table `principal`
--
ALTER TABLE `principal`
  ADD PRIMARY KEY (`p_id`),
  ADD KEY `city` (`city`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`stu_id`),
  ADD KEY `stu_city` (`stu_city`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`t_id`),
  ADD KEY `t_city` (`t_city`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `cty_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `principal`
--
ALTER TABLE `principal`
  MODIFY `p_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `stu_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `t_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `principal`
--
ALTER TABLE `principal`
  ADD CONSTRAINT `principal_ibfk_1` FOREIGN KEY (`city`) REFERENCES `city` (`cty_id`);

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `student_ibfk_1` FOREIGN KEY (`stu_city`) REFERENCES `city` (`cty_id`);

--
-- Constraints for table `teacher`
--
ALTER TABLE `teacher`
  ADD CONSTRAINT `teacher_ibfk_1` FOREIGN KEY (`t_city`) REFERENCES `city` (`cty_id`),
  ADD CONSTRAINT `teacher_ibfk_2` FOREIGN KEY (`t_city`) REFERENCES `city` (`cty_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
