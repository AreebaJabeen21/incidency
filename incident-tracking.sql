-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 17, 2019 at 07:41 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `incident-tracking`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(255) NOT NULL,
  `category_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`) VALUES
(1, 'Road Accident'),
(2, 'Road Construction'),
(3, 'Snatching Incident'),
(4, 'Environment Incident'),
(5, 'Unlawful Activity'),
(6, 'Danger Zone'),
(7, 'Other');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `comment_id` int(255) NOT NULL,
  `report_id` int(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  `comment_date` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6) ON UPDATE CURRENT_TIMESTAMP(6),
  `comment_text` varchar(5000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`comment_id`, `report_id`, `user_id`, `comment_date`, `comment_text`) VALUES
(1, 123, 160, '2019-11-16 08:02:01.179098', 'nice\r\n'),
(2, 123, 160, '2019-11-16 08:02:08.980221', 'thnks'),
(24, 123, 159, '2019-11-16 10:32:36.941209', 'I also see that that was epic'),
(25, 123, 159, '2019-11-16 10:34:47.763506', 'container'),
(26, 124, 160, '2019-11-16 10:41:21.770879', 'omg'),
(27, 125, 160, '2019-11-17 07:12:58.651550', 'Omg '),
(28, 125, 162, '2019-11-17 17:28:04.092543', 'Rain'),
(29, 125, 162, '2019-11-17 17:29:17.641525', 'l');

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE `location` (
  `report_id` int(255) NOT NULL,
  `latitude` varchar(255) NOT NULL,
  `longitude` varchar(255) NOT NULL,
  `loc_name` varchar(255) NOT NULL,
  `country_code` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`report_id`, `latitude`, `longitude`, `loc_name`, `country_code`) VALUES
(125, '<script>var latitude = results[0].geometry.location.lat();</script>', ' <script>var longitude = results[0].geometry.location.lat();</script> ', 'Aisha Manzil', '2'),
(126, '<script>var latitude = results[0].geometry.location.lat();</script>', ' <script>var longitude = results[0].geometry.location.lat();</script> ', 'Kemari Town', '2'),
(128, '<script>var latitude = results[0].geometry.location.lat();</script>', ' <script>var longitude = results[0].geometry.location.lat();</script> ', 'Gulshan-e-Iqbal Town', '2');

-- --------------------------------------------------------

--
-- Table structure for table `rate`
--

CREATE TABLE `rate` (
  `rate_id` int(255) NOT NULL,
  `report_id` int(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  `artical_rate` int(255) NOT NULL,
  `user_rate` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE `rating` (
  `id` int(11) NOT NULL,
  `id_item` int(11) NOT NULL,
  `ip` varchar(25) NOT NULL,
  `rate` int(1) NOT NULL,
  `dt_rated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

CREATE TABLE `report` (
  `report_id` int(255) NOT NULL,
  `category_id` int(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  `report_desc` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `published` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `report`
--

INSERT INTO `report` (`report_id`, `category_id`, `user_id`, `report_desc`, `image`, `published`, `created_at`, `updated_at`) VALUES
(125, 2, 161, 'post ', 'screencapture-localhost-project-incidency-index-php-2019-11-14-16_02_58.png', 1, '2019-11-17 06:57:01', '2019-11-17 06:57:01'),
(126, 2, 160, 'Mr Khan revealed how Pakistanis reacted with sorrow after the princess died in a car', 'r0_0_3977_2298_w1200_h678_fmax.jpg', 1, '2019-11-17 07:12:08', '2019-11-17 07:12:08'),
(128, 5, 159, '20 min of heavy rain takes toll at Lucky One Mall Karachi', '531502_9945688_13_updates.jpg', 1, '2019-11-17 16:06:11', '2019-11-17 16:06:11');

-- --------------------------------------------------------

--
-- Table structure for table `report_user`
--

CREATE TABLE `report_user` (
  `id` int(255) NOT NULL,
  `report_id` int(255) NOT NULL,
  `user_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(255) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `email` varchar(50) NOT NULL,
  `user_role` text NOT NULL,
  `gender` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `password`, `image`, `email`, `user_role`, `gender`) VALUES
(159, 'Areeba Jabeen', '0313', 'images/profile.png', 'areeba.jabeen21@gmail.com', 'user', 'female'),
(160, 'Muniba Javaid', '0313', 'images/mu.jpg', 'muniba@gmail.com', 'user', 'female'),
(161, 'Hafsa Habib', '0313', 'images/ava.png', 'hafsahabib76@yahoo.com', 'user', 'female'),
(162, 'Ayesha khan', '0313', 'images/profile.png', 'ayesha@yahoo.com', 'user', 'female');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `location`
--
ALTER TABLE `location`
  ADD UNIQUE KEY `report_id` (`report_id`);

--
-- Indexes for table `rate`
--
ALTER TABLE `rate`
  ADD PRIMARY KEY (`rate_id`),
  ADD UNIQUE KEY `report_id` (`report_id`),
  ADD UNIQUE KEY `user_id` (`user_id`),
  ADD UNIQUE KEY `user_id_2` (`user_id`);

--
-- Indexes for table `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `report`
--
ALTER TABLE `report`
  ADD PRIMARY KEY (`report_id`);

--
-- Indexes for table `report_user`
--
ALTER TABLE `report_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `comment_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `rate`
--
ALTER TABLE `rate`
  MODIFY `rate_id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rating`
--
ALTER TABLE `rating`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `report`
--
ALTER TABLE `report`
  MODIFY `report_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=129;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=163;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `location`
--
ALTER TABLE `location`
  ADD CONSTRAINT `location_ibfk_1` FOREIGN KEY (`report_id`) REFERENCES `report` (`report_id`);

--
-- Constraints for table `rate`
--
ALTER TABLE `rate`
  ADD CONSTRAINT `rate_ibfk_1` FOREIGN KEY (`report_id`) REFERENCES `report` (`report_id`),
  ADD CONSTRAINT `rate_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
