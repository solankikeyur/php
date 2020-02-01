-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 01, 2020 at 01:37 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `student_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `login_details`
--

CREATE TABLE `login_details` (
  `log_id` int(10) NOT NULL,
  `log_email` varchar(55) NOT NULL,
  `log_password` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login_details`
--

INSERT INTO `login_details` (`log_id`, `log_email`, `log_password`) VALUES
(1, 'admin@gmail.com', 'admin'),
(2, 'k@gmail.com', 'keyur'),
(5, 'nikunj@gmail.com', 'nikunj');

-- --------------------------------------------------------

--
-- Table structure for table `stu_classes`
--

CREATE TABLE `stu_classes` (
  `class_id` int(10) NOT NULL,
  `class_name` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stu_classes`
--

INSERT INTO `stu_classes` (`class_id`, `class_name`) VALUES
(1, 'Class 1'),
(2, 'Class 2'),
(3, 'Class 3'),
(4, 'Class 4'),
(5, 'Class 5'),
(6, 'Class 6'),
(7, 'Class 7'),
(8, 'Class 8'),
(9, 'Class 9'),
(10, 'Class 10'),
(11, 'Class 11'),
(12, 'Class 12');

-- --------------------------------------------------------

--
-- Table structure for table `stu_data`
--

CREATE TABLE `stu_data` (
  `stu_id` int(10) NOT NULL,
  `stu_name` varchar(55) NOT NULL,
  `stu_email` varchar(55) NOT NULL,
  `stu_address` varchar(55) NOT NULL,
  `stu_class` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stu_data`
--

INSERT INTO `stu_data` (`stu_id`, `stu_name`, `stu_email`, `stu_address`, `stu_class`) VALUES
(1, 'Keyur 7071', 'solankikeyur@gmail.com', 'Lad Society, Vastrapur', 'Class 12');

-- --------------------------------------------------------

--
-- Table structure for table `user_log`
--

CREATE TABLE `user_log` (
  `login_id` int(10) NOT NULL,
  `login_user` varchar(55) NOT NULL,
  `login_time` time NOT NULL,
  `logout_time` time NOT NULL DEFAULT current_timestamp(),
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_log`
--

INSERT INTO `user_log` (`login_id`, `login_user`, `login_time`, `logout_time`, `date`) VALUES
(1, 'admin@gmail.com', '10:51:00', '15:21:45', '2020-02-01'),
(2, 'k@gmail.com', '10:53:00', '15:23:38', '2020-02-01'),
(3, 'admin@gmail.com', '11:06:00', '15:36:25', '2020-02-01'),
(4, 'k@gmail.com', '11:06:00', '15:36:38', '2020-02-01'),
(5, 'k@gmail.com', '11:08:00', '15:42:15', '2020-02-01'),
(6, 'admin@gmail.com', '11:31:00', '16:01:26', '2020-02-01'),
(7, 'admin@gmail.com', '12:28:00', '16:59:25', '2020-02-01'),
(8, 'nikunj@gmail.com', '12:53:00', '17:23:30', '2020-02-01'),
(9, 'admin@gmail.com', '12:56:00', '17:29:29', '2020-02-01'),
(10, 'nikunj@gmail.com', '05:29:00', '17:30:05', '2020-02-01'),
(11, 'admin@gmail.com', '05:30:00', '17:33:12', '2020-02-01'),
(12, 'k@gmail.com', '05:33:00', '17:34:04', '2020-02-01'),
(13, 'admin@gmail.com', '05:34:00', '17:35:25', '2020-02-01'),
(14, 'admin@gmail.com', '05:47:00', '18:05:56', '2020-02-01'),
(15, 'admin@gmail.com', '06:06:00', '18:07:15', '2020-02-01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `login_details`
--
ALTER TABLE `login_details`
  ADD PRIMARY KEY (`log_id`);

--
-- Indexes for table `stu_classes`
--
ALTER TABLE `stu_classes`
  ADD PRIMARY KEY (`class_id`);

--
-- Indexes for table `stu_data`
--
ALTER TABLE `stu_data`
  ADD PRIMARY KEY (`stu_id`);

--
-- Indexes for table `user_log`
--
ALTER TABLE `user_log`
  ADD PRIMARY KEY (`login_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `login_details`
--
ALTER TABLE `login_details`
  MODIFY `log_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `stu_classes`
--
ALTER TABLE `stu_classes`
  MODIFY `class_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `stu_data`
--
ALTER TABLE `stu_data`
  MODIFY `stu_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_log`
--
ALTER TABLE `user_log`
  MODIFY `login_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
