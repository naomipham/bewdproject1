-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Aug 31, 2021 at 09:10 AM
-- Server version: 5.7.24
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bewdproject1`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `created_at`) VALUES
(1, 'naomipham', '$2y$10$tSgIDzSs5GAlfp5WxkXIpenOTfLTxVHvro5wO0bym4.AYnX27yiSa', '2021-08-29 16:32:55'),
(2, 'jennipham', '$2y$10$F3rb6bqMPP0lOz7C.eyPB.y6LpY1qTWgVzjAuWIv.fiH3m/k7fCtW', '2021-08-29 17:38:05'),
(3, 'matthewmo', '$2y$10$50txaiDS.uVxs9e9XTzQyO3Mi22jU5viHMVvbFEFjdgCZDpxueLIy', '2021-08-30 10:42:30'),
(4, 'matthew', '$2y$10$KjY46M6R5jG7.HchQA2acucmqWMl7G97yjZDrbfnPV3oGeGCCKdia', '2021-08-30 20:01:02'),
(5, 'kaylee', '$2y$10$T8.0wJTspGMxiZLgBbhG7OeXxgroGs9KubWDCcYuEI4zSGqtWvyA.', '2021-08-31 14:58:45'),
(6, 'nick', '$2y$10$ZKHXdL9skBJMrEv/rs7W7eTLtyHHvoE1h4mFmh3KQjkztyIpQ1Qpa', '2021-08-31 14:59:03'),
(7, 'jack', '$2y$10$fuOM/sDjYByMgnqnkO.7SOK9Sl10FTIIwa3Ut9RDQLS5eCPLenWZq', '2021-08-31 14:59:55'),
(8, 'angus', '$2y$10$dBh3qS5EEk.XLdukO7gXP.deeeIRbKU.P/c/4FHEeOuDelQ7djWtK', '2021-08-31 15:01:32'),
(9, 'jenpham', '$2y$10$nyF.ptwTGJVJ1wXTY3n3D.kDc6yPeSOnGtUrc5dDsMEtQL8jhqoA2', '2021-08-31 15:09:00');

-- --------------------------------------------------------

--
-- Table structure for table `works`
--

CREATE TABLE `works` (
  `id` int(10) UNSIGNED NOT NULL,
  `userid` int(11) NOT NULL,
  `class` varchar(30) NOT NULL,
  `assignmentname` varchar(50) NOT NULL,
  `duedate` varchar(30) DEFAULT NULL,
  `weighing` varchar(30) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `works`
--

INSERT INTO `works` (`id`, `userid`, `class`, `assignmentname`, `duedate`, `weighing`, `date`) VALUES
(1, 1, 'Business management', 'Project 1', '2021-09-12', '15%', '2021-08-30 00:40:32'),
(2, 3, 'Interaction Design', 'Project 1', '2021-09-30', '30%', '2021-08-30 01:03:14'),
(3, 3, 'Interaction Design', 'Quiz', '2021-08-29', '20%', '2021-08-30 01:03:39'),
(5, 3, 'Graphic', 'Project 2', '2021-09-12', '30%', '2021-08-30 01:32:40'),
(6, 3, 'Graphic', 'Project 2', '2021-09-12', '20%', '2021-08-30 01:33:03'),
(7, 1, 'Business management', 'Project 1', '2021-10-09', '15%', '2021-08-30 01:40:03'),
(12, 2, 'Business management', 'Project 1', '2021-09-12', '15%', '2021-08-30 04:37:21'),
(14, 2, 'interaction', 'Project 2', '2021-08-30', '15%', '2021-08-30 05:40:19'),
(16, 2, 'Business management', 'Project 1', '2021-10-29', '20%', '2021-08-30 05:52:30'),
(17, 2, 'interaction', 'Project 1', '2021-09-22', '20%', '2021-08-30 05:52:41'),
(22, 1, 'Interaction', 'pp2', '2021-10-08', '20%', '2021-08-30 07:38:29'),
(25, 4, 'interaction', 'Project 1', '2021-08-03', '20%', '2021-08-30 10:07:02'),
(26, 1, 'Business management', 'Project 1', '2021-08-31', '20%', '2021-08-31 03:25:30'),
(28, 9, 'Business management', 'pp2', '2021-09-30', '15%', '2021-08-31 05:10:27'),
(29, 9, 'Interaction', 'Quiz', '2021-08-11', '20%', '2021-08-31 05:10:37'),
(30, 9, 'Interaction Design', 'Project 2', '2021-09-15', '20%', '2021-08-31 05:10:48');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `works`
--
ALTER TABLE `works`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `works`
--
ALTER TABLE `works`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
