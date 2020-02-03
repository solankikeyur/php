-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 03, 2020 at 01:09 PM
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
-- Database: `blog_app`
--

-- --------------------------------------------------------

--
-- Table structure for table `blog_post`
--

CREATE TABLE `blog_post` (
  `b_id` int(10) NOT NULL,
  `u_id` int(10) NOT NULL,
  `b_title` varchar(55) NOT NULL,
  `b_url` text NOT NULL,
  `b_content` text NOT NULL,
  `b_image` text NOT NULL,
  `b_category` varchar(55) NOT NULL,
  `b_published_at` date NOT NULL,
  `b_created_at` date NOT NULL,
  `b_updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blog_post`
--

INSERT INTO `blog_post` (`b_id`, `u_id`, `b_title`, `b_url`, `b_content`, `b_image`, `b_category`, `b_published_at`, `b_created_at`, `b_updated_at`) VALUES
(1, 0, 'blog title', 'asddas', 'adsada', '', 'Education,TEchnology', '2020-02-07', '2020-02-03', '0000-00-00'),
(4, 2, 'fourth', 'adsd', 'asdad', '', 'Automobile', '2020-02-12', '2020-02-03', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `c_id` int(10) NOT NULL,
  `parent_cat_id` int(10) NOT NULL,
  `c_title` varchar(55) NOT NULL,
  `c_meta_title` varchar(55) NOT NULL,
  `c_url` text NOT NULL,
  `c_content` text NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`c_id`, `parent_cat_id`, `c_title`, `c_meta_title`, `c_url`, `c_content`, `created_at`, `updated_at`) VALUES
(2, 5, 'Entertainment', 'enter', 'entertainment.com', 'This is entertainmetn', '2020-02-03', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `parent_cat`
--

CREATE TABLE `parent_cat` (
  `parent_cat_id` int(10) NOT NULL,
  `cat_name` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `parent_cat`
--

INSERT INTO `parent_cat` (`parent_cat_id`, `cat_name`) VALUES
(1, 'Education'),
(2, 'TEchnology'),
(3, 'Health'),
(4, 'Automobile'),
(5, 'Entertainment');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `u_id` int(10) NOT NULL,
  `u_fname` varchar(55) NOT NULL,
  `u_prefix` varchar(55) NOT NULL,
  `u_lname` varchar(55) NOT NULL,
  `u_mobile` bigint(20) NOT NULL,
  `u_email` varchar(55) NOT NULL,
  `u_password` varchar(55) NOT NULL,
  `u_lastlogin` date NOT NULL,
  `u_information` text NOT NULL,
  `u_createdate` date NOT NULL,
  `u_updatedat` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`u_id`, `u_fname`, `u_prefix`, `u_lname`, `u_mobile`, `u_email`, `u_password`, `u_lastlogin`, `u_information`, `u_createdate`, `u_updatedat`) VALUES
(1, 'Keyur', 'MR', 'Solanki', 7016002021, 'solankikeyur8@gmail.com', '123', '0000-00-00', 'hihi', '2020-02-03', '0000-00-00'),
(2, 'Keyur', 'Dr', 'Solanki', 7016002021, 'admin@gmail.com', 'admin', '0000-00-00', 'OHk Test USer', '2020-02-03', '0000-00-00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blog_post`
--
ALTER TABLE `blog_post`
  ADD PRIMARY KEY (`b_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `parent_cat`
--
ALTER TABLE `parent_cat`
  ADD PRIMARY KEY (`parent_cat_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`u_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blog_post`
--
ALTER TABLE `blog_post`
  MODIFY `b_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `c_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `parent_cat`
--
ALTER TABLE `parent_cat`
  MODIFY `parent_cat_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `u_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
