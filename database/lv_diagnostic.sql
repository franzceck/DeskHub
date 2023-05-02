-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 27, 2023 at 02:52 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lv_diagnostic`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `id` int(30) NOT NULL,
  `client_id` int(30) NOT NULL,
  `date_sched` datetime NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`id`, `client_id`, `date_sched`, `status`, `date_created`) VALUES
(13, 12, '2023-01-25 13:20:00', 1, '2023-01-15 01:20:22'),
(14, 13, '2023-01-18 13:27:00', 2, '2023-01-15 01:27:43'),
(16, 15, '2023-01-31 10:40:00', 0, '2023-01-24 22:30:15'),
(17, 16, '2023-01-27 10:19:00', 1, '2023-01-24 23:20:38'),
(18, 17, '2023-01-25 09:00:00', 0, '2023-01-25 00:04:14'),
(19, 18, '2023-01-25 10:01:00', 0, '2023-01-25 00:05:13'),
(20, 19, '2023-02-01 08:00:00', 0, '2023-01-31 19:36:11'),
(21, 20, '2023-02-01 09:00:00', 0, '2023-01-31 19:37:43'),
(22, 21, '2023-02-01 10:00:00', 0, '2023-01-31 19:38:39'),
(23, 22, '2023-02-01 11:00:00', 0, '2023-01-31 19:42:23'),
(24, 23, '2023-02-01 13:00:00', 0, '2023-01-31 19:44:32'),
(25, 24, '2023-02-03 10:00:00', 0, '2023-01-31 19:52:36'),
(26, 7, '2023-02-16 08:50:00', 1, '2023-02-02 12:52:47'),
(27, 7, '2023-02-09 08:08:00', 0, '2023-02-02 13:08:54'),
(28, 7, '2023-02-09 10:08:00', 0, '2023-02-02 13:15:48'),
(29, 6, '2023-02-14 09:43:00', 0, '2023-02-02 23:46:03'),
(30, 6, '2023-02-16 08:51:00', 0, '2023-02-02 12:52:47'),
(31, 6, '2023-02-09 08:08:00', 0, '2023-02-02 13:08:54'),
(32, 6, '2023-02-09 10:08:00', 0, '2023-02-02 13:15:48'),
(33, 6, '2023-02-09 10:30:00', 0, '2023-02-04 00:30:46'),
(34, 6, '2023-02-16 09:30:00', 0, '2023-02-04 00:31:06'),
(36, 1, '2023-02-16 10:29:00', 0, '2023-02-04 00:32:56'),
(37, 1, '2023-02-16 10:33:00', 2, '2023-02-04 00:33:46'),
(38, 7, '2023-02-16 09:41:00', 0, '2023-02-04 00:41:21'),
(40, 8, '2023-03-17 08:00:00', 0, '2023-03-16 17:08:17'),
(41, 9, '2023-03-17 09:00:00', 0, '2023-03-16 17:11:01');

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE `location` (
  `id` int(30) NOT NULL,
  `location` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `max_a_day` int(5) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `date_updated` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `role_desc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `role_desc`) VALUES
(1, 'User'),
(2, 'Administrator');

-- --------------------------------------------------------

--
-- Table structure for table `schedule_settings`
--

CREATE TABLE `schedule_settings` (
  `meta_field` text NOT NULL,
  `meta_value` text NOT NULL,
  `date_create` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `schedule_settings`
--

INSERT INTO `schedule_settings` (`meta_field`, `meta_value`, `date_create`) VALUES
('day_schedule', 'Monday,Tuesday,Wednesday,Thursday,Friday', '2023-01-24 23:56:52'),
('morning_schedule', '08:00,11:00', '2023-01-24 23:56:52'),
('afternoon_schedule', '13:00,16:00', '2023-01-24 23:56:52'),
('max_bookings_per_day', '15', '2023-02-04 01:00:08');

-- --------------------------------------------------------

--
-- Table structure for table `system_info`
--

CREATE TABLE `system_info` (
  `id` int(30) NOT NULL,
  `meta_field` text NOT NULL,
  `meta_value` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `system_info`
--

INSERT INTO `system_info` (`id`, `meta_field`, `meta_value`) VALUES
(1, 'name', '“Use time and space; grow slowly into your dreams, infinity will fill you with peace.”'),
(6, 'short_name', 'DeskHub'),
(11, 'logo', 'uploads/1674402720_1673696760_Untitled design (2).png'),
(14, 'cover', 'uploads/1674151140_Background.png');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(50) NOT NULL,
  `firstname` varchar(250) NOT NULL,
  `lastname` varchar(250) NOT NULL,
  `name` text GENERATED ALWAYS AS (concat(`firstname`,' ',`lastname`)) VIRTUAL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `email` text NOT NULL,
  `contact` text NOT NULL,
  `address` text NOT NULL,
  `role_id` int(11) NOT NULL,
  `avatar` text DEFAULT NULL,
  `last_login` datetime DEFAULT NULL,
  `type` tinyint(1) NOT NULL DEFAULT 0,
  `date_added` datetime NOT NULL DEFAULT current_timestamp(),
  `date_updated` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `username`, `password`, `email`, `contact`, `address`, `role_id`, `avatar`, `last_login`, `type`, `date_added`, `date_updated`) VALUES
(1, 'Franzceck', 'Suarez ADMIN ', 'franzceck', '0192023a7bbd73250516f069df18b500', 'franzceck@gmail.com', '', '', 2, 'uploads/1673712840_48426004_275596226435504_4592982329206505472_n.jpg', NULL, 1, '2021-01-20 14:02:37', '2023-02-03 02:20:58'),
(6, 'Abraham', 'Suarez', 'abraham', '248706c023957db08d14f39749879207', '', '', '', 1, 'uploads/1673713140_1662549660201.jpg', NULL, 0, '2021-09-03 00:04:40', '2023-02-03 02:20:54'),
(7, 'TestA', 'bc', 'test', '47bce5c74f589f4867dbd57e9ca9f808', 'aaa', 'a', 'a', 1, NULL, NULL, 0, '2023-02-03 01:49:53', '2023-02-03 14:55:01'),
(8, 'Jessa', 'David', '', 'a5b85dcc021937f1fb0148939ede8cf3', 'jessa@gmail.com', '0923156489', 'Pampanga', 1, NULL, NULL, 0, '2023-03-16 17:03:13', NULL),
(9, 'Tim', 'Bundalian', '', 'b15d47e99831ee63e3f47cf3d4478e9a', 'tim@gmail.com', '0923123456', 'Cavite', 1, NULL, NULL, 0, '2023-03-16 17:09:10', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `system_info`
--
ALTER TABLE `system_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`) USING HASH;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `location`
--
ALTER TABLE `location`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `system_info`
--
ALTER TABLE `system_info`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
