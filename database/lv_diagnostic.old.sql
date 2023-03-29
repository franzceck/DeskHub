-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 31, 2023 at 04:30 PM
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
  `ailment` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`id`, `client_id`, `date_sched`, `ailment`, `status`, `date_created`) VALUES
(13, 12, '2023-01-25 13:20:00', '', 1, '2023-01-15 01:20:22'),
(14, 13, '2023-01-18 13:27:00', 'SSDWAsdQ', 2, '2023-01-15 01:27:43'),
(15, 14, '2023-01-16 13:00:00', '', 1, '2023-01-15 09:30:46'),
(16, 15, '2023-01-31 10:40:00', '', 0, '2023-01-24 22:30:15'),
(17, 16, '2023-01-27 10:19:00', '', 1, '2023-01-24 23:20:38'),
(18, 17, '2023-01-25 09:00:00', '', 0, '2023-01-25 00:04:14'),
(19, 18, '2023-01-25 10:01:00', '', 0, '2023-01-25 00:05:13'),
(20, 19, '2023-02-01 08:00:00', '', 0, '2023-01-31 19:36:11'),
(21, 20, '2023-02-01 09:00:00', '', 0, '2023-01-31 19:37:43'),
(22, 21, '2023-02-01 10:00:00', '', 0, '2023-01-31 19:38:39'),
(23, 22, '2023-02-01 11:00:00', '', 0, '2023-01-31 19:42:23'),
(24, 23, '2023-02-01 13:00:00', '', 0, '2023-01-31 19:44:32'),
(25, 24, '2023-02-03 10:00:00', '', 0, '2023-01-31 19:52:36');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `patient_list`
--

CREATE TABLE `patient_list` (
  `id` int(30) NOT NULL,
  `name` varchar(50) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `patient_list`
--

INSERT INTO `patient_list` (`id`, `name`, `date_created`) VALUES
(12, 'Francisca Suarez', '2023-01-15 01:20:22'),
(14, 'Karen Suarez', '2023-01-15 09:30:46'),
(15, 'tim', '2023-01-24 22:30:15'),
(16, 'jessa', '2023-01-24 23:20:38'),
(17, 'fd', '2023-01-25 00:04:14'),
(18, 'pj', '2023-01-25 00:05:12'),
(19, 'Emman Sunga', '2023-01-31 19:36:11'),
(20, 'Harold', '2023-01-31 19:37:43'),
(21, 'Franzceck Suarez', '2023-01-31 19:38:39'),
(22, 'mharjhay tejero', '2023-01-31 19:42:23'),
(23, 'fev af', '2023-01-31 19:44:32'),
(24, 'asfas', '2023-01-31 19:52:36');

-- --------------------------------------------------------

--
-- Table structure for table `patient_meta`
--

CREATE TABLE `patient_meta` (
  `client_id` int(30) NOT NULL,
  `meta_field` text DEFAULT NULL,
  `meta_value` text DEFAULT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `patient_meta`
--

INSERT INTO `patient_meta` (`client_id`, `meta_field`, `meta_value`, `date_created`) VALUES
(12, 'id', '13', '2023-01-20 02:28:49'),
(12, 'client_id', '12', '2023-01-20 02:28:49'),
(12, 'name', 'Francisca Suarez', '2023-01-20 02:28:49'),
(12, 'email', 'trix10_nica@yahoo.com', '2023-01-20 02:28:49'),
(12, 'contact', '09276330285', '2023-01-20 02:28:49'),
(12, 'address', 'C3400074', '2023-01-20 02:28:49'),
(14, 'id', '15', '2023-01-20 02:29:18'),
(14, 'client_id', '14', '2023-01-20 02:29:18'),
(14, 'name', 'Karen Suarez', '2023-01-20 02:29:18'),
(14, 'email', 'karen@gmail.com', '2023-01-20 02:29:18'),
(14, 'contact', '097165498451', '2023-01-20 02:29:18'),
(14, 'address', 'MS453971', '2023-01-20 02:29:18'),
(15, 'id', '', '2023-01-24 22:30:15'),
(15, 'client_id', '', '2023-01-24 22:30:15'),
(15, 'name', 'tim', '2023-01-24 22:30:15'),
(15, 'email', 'tim@gmail.com', '2023-01-24 22:30:15'),
(15, 'contact', '01111111111', '2023-01-24 22:30:15'),
(15, 'address', 'LV', '2023-01-24 22:30:15'),
(16, 'id', '', '2023-01-24 23:20:38'),
(16, 'client_id', '', '2023-01-24 23:20:38'),
(16, 'name', 'jessa', '2023-01-24 23:20:38'),
(16, 'email', 'jessa@gmail.com', '2023-01-24 23:20:38'),
(16, 'contact', '01111111111', '2023-01-24 23:20:38'),
(16, 'address', 'LV', '2023-01-24 23:20:38'),
(17, 'id', '', '2023-01-25 00:04:14'),
(17, 'client_id', '', '2023-01-25 00:04:14'),
(17, 'name', 'fd', '2023-01-25 00:04:14'),
(17, 'email', 'tim@gmail.com', '2023-01-25 00:04:14'),
(17, 'contact', '01111111111', '2023-01-25 00:04:14'),
(17, 'address', '8754', '2023-01-25 00:04:14'),
(18, 'id', '', '2023-01-25 00:05:13'),
(18, 'client_id', '', '2023-01-25 00:05:13'),
(18, 'name', 'pj', '2023-01-25 00:05:13'),
(18, 'email', 'pj@gmail.com', '2023-01-25 00:05:13'),
(18, 'contact', '01111111111', '2023-01-25 00:05:13'),
(18, 'address', 'aesi', '2023-01-25 00:05:13'),
(19, 'id', '', '2023-01-31 19:36:11'),
(19, 'client_id', '', '2023-01-31 19:36:11'),
(19, 'name', 'Emman Sunga', '2023-01-31 19:36:11'),
(19, 'email', 'emman@yahoo.com', '2023-01-31 19:36:11'),
(19, 'contact', '09223479796', '2023-01-31 19:36:11'),
(19, 'address', 'sad6436', '2023-01-31 19:36:11'),
(20, 'id', '', '2023-01-31 19:37:43'),
(20, 'client_id', '', '2023-01-31 19:37:43'),
(20, 'name', 'Harold', '2023-01-31 19:37:43'),
(20, 'email', 'a@gmail.com', '2023-01-31 19:37:43'),
(20, 'contact', '096476317569', '2023-01-31 19:37:43'),
(20, 'address', 'sadasdasfc', '2023-01-31 19:37:43'),
(21, 'id', '', '2023-01-31 19:38:39'),
(21, 'client_id', '', '2023-01-31 19:38:39'),
(21, 'name', 'Franzceck Suarez', '2023-01-31 19:38:39'),
(21, 'email', 'franzceck3@yahoo.com', '2023-01-31 19:38:39'),
(21, 'contact', '064565156464', '2023-01-31 19:38:39'),
(21, 'address', 'sada26464', '2023-01-31 19:38:39'),
(22, 'id', '', '2023-01-31 19:42:23'),
(22, 'client_id', '', '2023-01-31 19:42:23'),
(22, 'name', 'mharjhay tejero', '2023-01-31 19:42:23'),
(22, 'email', 'a@gmail.com', '2023-01-31 19:42:23'),
(22, 'contact', '034165465', '2023-01-31 19:42:23'),
(22, 'address', 'asad1654', '2023-01-31 19:42:23'),
(23, 'id', '', '2023-01-31 19:44:32'),
(23, 'client_id', '', '2023-01-31 19:44:32'),
(23, 'name', 'fev af', '2023-01-31 19:44:32'),
(23, 'email', 'faaF@hjabdkjDB', '2023-01-31 19:44:32'),
(23, 'contact', '06451', '2023-01-31 19:44:32'),
(23, 'address', 'dsafdgfv ', '2023-01-31 19:44:32'),
(24, 'id', '', '2023-01-31 19:52:36'),
(24, 'client_id', '', '2023-01-31 19:52:36'),
(24, 'name', 'asfas', '2023-01-31 19:52:36'),
(24, 'email', 'affas@adfa', '2023-01-31 19:52:36'),
(24, 'contact', '03254695498', '2023-01-31 19:52:36'),
(24, 'address', 'dsafda5461', '2023-01-31 19:52:36');

-- --------------------------------------------------------

--
-- Table structure for table `schedule_settings`
--

CREATE TABLE `schedule_settings` (
  `meta_field` text NOT NULL,
  `meta_value` text NOT NULL,
  `date_create` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `schedule_settings`
--

INSERT INTO `schedule_settings` (`meta_field`, `meta_value`, `date_create`) VALUES
('day_schedule', 'Monday,Tuesday,Wednesday,Thursday,Friday', '2023-01-24 23:56:52'),
('morning_schedule', '08:00,11:00', '2023-01-24 23:56:52'),
('afternoon_schedule', '13:00,16:00', '2023-01-24 23:56:52');

-- --------------------------------------------------------

--
-- Table structure for table `system_info`
--

CREATE TABLE `system_info` (
  `id` int(30) NOT NULL,
  `meta_field` text NOT NULL,
  `meta_value` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  `username` text NOT NULL,
  `password` text NOT NULL,
  `avatar` text DEFAULT NULL,
  `last_login` datetime DEFAULT NULL,
  `type` tinyint(1) NOT NULL DEFAULT 0,
  `date_added` datetime NOT NULL DEFAULT current_timestamp(),
  `date_updated` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `username`, `password`, `avatar`, `last_login`, `type`, `date_added`, `date_updated`) VALUES
(1, 'Franzceck', 'Suarez ADMIN ', 'franzceck', '0192023a7bbd73250516f069df18b500', 'uploads/1673712840_48426004_275596226435504_4592982329206505472_n.jpg', NULL, 1, '2021-01-20 14:02:37', '2023-01-15 09:26:16'),
(6, 'Abraham', 'Suarez', 'abraham', '248706c023957db08d14f39749879207', 'uploads/1673713140_1662549660201.jpg', NULL, 0, '2021-09-03 00:04:40', '2023-01-15 00:19:22');

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
-- Indexes for table `patient_list`
--
ALTER TABLE `patient_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patient_meta`
--
ALTER TABLE `patient_meta`
  ADD KEY `client_id` (`client_id`);

--
-- Indexes for table `system_info`
--
ALTER TABLE `system_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `location`
--
ALTER TABLE `location`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `patient_list`
--
ALTER TABLE `patient_list`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `system_info`
--
ALTER TABLE `system_info`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `patient_meta`
--
ALTER TABLE `patient_meta`
  ADD CONSTRAINT `patient_meta_ibfk_1` FOREIGN KEY (`client_id`) REFERENCES `patient_list` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
