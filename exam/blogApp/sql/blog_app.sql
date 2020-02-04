-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 04, 2020 at 01:17 PM
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
  `b_created_at` datetime NOT NULL,
  `b_updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blog_post`
--

INSERT INTO `blog_post` (`b_id`, `u_id`, `b_title`, `b_url`, `b_content`, `b_image`, `b_category`, `b_published_at`, `b_created_at`, `b_updated_at`) VALUES
(1, 1, 'blog title', 'asddas', 'adsada', '', 'Education,TEchnology', '2020-02-06', '2020-02-03 00:00:00', '0000-00-00 00:00:00'),
(5, 2, 'Health', 'www.health.com', 'This is blog for health post.', '', 'Education,TEchnology,Automobile', '2020-02-19', '2020-02-04 00:00:00', '0000-00-00 00:00:00'),
(6, 3, 'Php Framework', 'laravel.com', 'Laravel is a php Framework', '', 'Education,TEchnology', '2020-03-04', '2020-02-04 11:59:25', '2020-02-04 11:59:25'),
(8, 5, 'Mobile', 'mobile.com', 'Mobile is now a days a daily need.', '', 'TEchnology', '2020-07-03', '2020-02-04 02:22:23', '0000-00-00 00:00:00'),
(9, 2, 'btitle', 'asd', 'sad', '', 'Entertainment', '2020-02-26', '2020-02-04 04:02:02', '0000-00-00 00:00:00'),
(10, 2, 'third', 'sss', 'sss', '', 'Technology,Automobile', '2020-02-13', '2020-02-04 04:04:17', '0000-00-00 00:00:00'),
(11, 2, 'Web Design', 'design.com', 'Designing is must for any website.', '', 'Education,Health', '2020-02-24', '2020-02-04 04:23:30', '0000-00-00 00:00:00');

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
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `c_image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`c_id`, `parent_cat_id`, `c_title`, `c_meta_title`, `c_url`, `c_content`, `created_at`, `updated_at`, `c_image`) VALUES
(3, 4, 'Health Issue', 'Ok Fine', 'health.com', 'Coronavirus', '2020-02-04 00:00:00', '0000-00-00 00:00:00', ''),
(4, 2, 'PHP', 'Frameworks', 'laravel.com', 'Category for php framework', '2020-02-04 01:12:47', '0000-00-00 00:00:00', ''),
(5, 2, 'Test', 'test File', 'test.com', 'Test Content', '2020-02-04 00:00:00', '0000-00-00 00:00:00', ''),
(6, 3, 'Test Two', 'okoko', 'testtwo.com', 'Two Testing', '2020-02-04 01:13:21', '0000-00-00 00:00:00', ''),
(7, 2, 'Laptop', 'Laptops,Uses', 'dell.com', 'Dell laptops are mostly used', '2020-02-04 01:17:02', '0000-00-00 00:00:00', ''),
(8, 5, 'Test@', '#test', 'test1.com', 'TEST@', '2020-02-04 01:20:32', '0000-00-00 00:00:00', ''),
(9, 2, 'TEst Image', 'Image', 'image.com', 'Image Testing', '2020-02-04 02:43:40', '0000-00-00 00:00:00', 'images/audi-r8-21260.jpg'),
(10, 5, 'Music App', 'music', 'saavan.com', 'saavan music app', '2020-02-04 04:52:38', '0000-00-00 00:00:00', 'images/fear_9-wallpaper-1920x1080.jpg');

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
(2, 'Technology'),
(3, 'Health'),
(4, 'Automobile'),
(5, 'Entertainment'),
(6, 'Fashion');

-- --------------------------------------------------------

--
-- Table structure for table `post_category`
--

CREATE TABLE `post_category` (
  `pc_id` int(10) NOT NULL,
  `b_id` int(10) NOT NULL,
  `c_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `post_category`
--

INSERT INTO `post_category` (`pc_id`, `b_id`, `c_id`) VALUES
(3, 10, 2),
(4, 10, 4),
(5, 11, 1),
(6, 11, 3);

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
  `u_lastlogin` datetime NOT NULL,
  `u_information` text NOT NULL,
  `u_createdate` datetime NOT NULL,
  `u_updatedat` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`u_id`, `u_fname`, `u_prefix`, `u_lname`, `u_mobile`, `u_email`, `u_password`, `u_lastlogin`, `u_information`, `u_createdate`, `u_updatedat`) VALUES
(1, 'Keyur', 'MR', 'Solanki', 7016002021, 'solankikeyur8@gmail.com', '123', '2020-02-04 04:28:56', 'hihi', '2020-02-03 00:00:00', '0000-00-00 00:00:00'),
(2, 'admin', 'Dr', 'admin', 7016002021, 'admin@gmail.com', 'admin', '2020-02-04 04:50:55', 'OHk Test USer', '2020-02-04 00:00:00', '2020-02-04 00:00:00'),
(3, 'Keyur', 'Dr', 'Solanki', 7016002021, 'ksolanki756@rku.ac.in', 'keyur', '2020-02-04 12:01:08', 'My Name is Keyur Solanki.', '2020-02-04 00:00:00', '2020-02-04 12:02:47'),
(5, 'test', 'Dr', 'test', 1234567890, 'test@gmail.com', 'test', '2020-02-04 01:29:21', 'Testing Time ', '2020-02-04 01:28:58', '2020-02-04 01:29:49');

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
  ADD PRIMARY KEY (`c_id`),
  ADD KEY `parent_cat_id` (`parent_cat_id`);

--
-- Indexes for table `parent_cat`
--
ALTER TABLE `parent_cat`
  ADD PRIMARY KEY (`parent_cat_id`);

--
-- Indexes for table `post_category`
--
ALTER TABLE `post_category`
  ADD PRIMARY KEY (`pc_id`),
  ADD KEY `b_id` (`b_id`),
  ADD KEY `c_id` (`c_id`);

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
  MODIFY `b_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `c_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `parent_cat`
--
ALTER TABLE `parent_cat`
  MODIFY `parent_cat_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `post_category`
--
ALTER TABLE `post_category`
  MODIFY `pc_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `u_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `category`
--
ALTER TABLE `category`
  ADD CONSTRAINT `category_ibfk_1` FOREIGN KEY (`parent_cat_id`) REFERENCES `parent_cat` (`parent_cat_id`);

--
-- Constraints for table `post_category`
--
ALTER TABLE `post_category`
  ADD CONSTRAINT `post_category_ibfk_1` FOREIGN KEY (`b_id`) REFERENCES `blog_post` (`b_id`),
  ADD CONSTRAINT `post_category_ibfk_2` FOREIGN KEY (`c_id`) REFERENCES `parent_cat` (`parent_cat_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
