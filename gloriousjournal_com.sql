-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 11, 2026 at 02:22 PM
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
-- Database: `gloriousjournal_com`
--

-- --------------------------------------------------------

--
-- Table structure for table `current_issue`
--

CREATE TABLE `current_issue` (
  `id` int(11) NOT NULL,
  `publish_date` date DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `author_description` text DEFAULT NULL,
  `volume` varchar(255) DEFAULT NULL,
  `issue` int(11) NOT NULL DEFAULT 0,
  `country` varchar(255) DEFAULT 'India',
  `doi_no` varchar(255) DEFAULT NULL,
  `doi_link` text DEFAULT NULL,
  `abstract` text DEFAULT NULL,
  `keywords` text DEFAULT NULL,
  `attachment` varchar(255) DEFAULT NULL,
  `add_field_1` text DEFAULT NULL,
  `add_field_2` text DEFAULT NULL,
  `display_order` int(11) NOT NULL DEFAULT 0,
  `created_at` datetime DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `active_status` varchar(4) NOT NULL DEFAULT 'Y',
  `deleted_status` varchar(4) NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `current_issue`
--

INSERT INTO `current_issue` (`id`, `publish_date`, `title`, `author_description`, `volume`, `issue`, `country`, `doi_no`, `doi_link`, `abstract`, `keywords`, `attachment`, `add_field_1`, `add_field_2`, `display_order`, `created_at`, `updated_at`, `active_status`, `deleted_status`) VALUES
(5, '2026-05-11', '11112222', '22211', '22111', 0, 'India', NULL, '1222', NULL, NULL, NULL, NULL, NULL, 0, NULL, '2026-05-11 06:22:24', 'Y', 'N'),
(6, '2026-05-11', '11112222', '22211', '22111', 0, 'India', NULL, '1222', NULL, NULL, NULL, NULL, NULL, 0, NULL, '2026-05-11 06:22:38', 'Y', 'N'),
(7, '2026-05-11', '33333333333', '33333333333', '33333333333', 0, 'India', NULL, '33333333333', NULL, NULL, NULL, NULL, NULL, 0, NULL, '2026-05-11 06:22:48', 'Y', 'N'),
(8, '2026-05-11', '11', '11', '11', 11, 'India', '11', '11', '111111111', '11', '', NULL, NULL, 0, NULL, '2026-05-11 10:25:50', 'Y', 'N'),
(9, '2026-05-11', '22', '22', '22', 22, 'India', '22', '22', '222', '22', '', NULL, NULL, 0, NULL, '2026-05-11 10:26:25', 'Y', 'N'),
(10, '2026-05-11', '111', '222', '222', 11, 'India', '11', '11', '11', '11', '', NULL, NULL, 0, NULL, '2026-05-11 10:28:29', 'Y', 'N'),
(11, '2026-05-11', '11', '11', '11', 11, 'India', '11', '11', '111', '11', '1778495510_Screenshot from 2026-05-09 15-20-39.png', NULL, NULL, 0, NULL, '2026-05-11 10:31:50', 'Y', 'N'),
(12, '2026-05-11', 'Lorem Ipsum', 'Lorem Ipsum', '2320', 29, 'India', 'fdfsadfsfs', 'dfsdfdsfdfs', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\n', 'Lorem Ipsum', '1778496179_Screenshot from 2026-05-09 10-33-46.png', NULL, NULL, 0, NULL, '2026-05-11 10:42:59', 'Y', 'N'),
(13, '2026-05-11', '01', '01', '02', 3, 'India', '102', '102', '\r\nddsds\r\nfds\r\nfsa\r\nfsafsdfsdf', '', '', NULL, NULL, 0, NULL, '2026-05-11 11:21:39', 'Y', 'N'),
(14, '2026-05-11', '33333333333', '33333333333', '33333333333', 23, 'India', '33333333333', '33333333333', '3333333333333333333333\r\n33333333333\r\n333333333333333333333333333333333\r\n33333333333\r\n33333333333', '', '', NULL, NULL, 0, NULL, '2026-05-11 11:23:32', 'Y', 'N');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `display_status` varchar(255) DEFAULT 'Y'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_name`, `email`, `password`, `display_status`) VALUES
(1, 'admin', 'gloriousjournal@yopmail.com', 'Z2xvcmlvdXNqb3VybmFsQHlvcG1haWwuY29t', 'Y');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `current_issue`
--
ALTER TABLE `current_issue`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `current_issue`
--
ALTER TABLE `current_issue`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
