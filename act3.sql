-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 25, 2021 at 03:20 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `act3`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `id` int(11) NOT NULL,
  `User` varchar(25) NOT NULL,
  `Pass` varchar(25) NOT NULL,
  `email` varchar(25) NOT NULL,
  `secret_value` int(10) NOT NULL,
  `answer` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`id`, `User`, `Pass`, `email`, `secret_value`, `answer`) VALUES
(1, 'ADMIN', 'Admin123.', 'admin@gmail.com', 1, 'tabitabi'),
(2, 'Ran', 'Ran123', 'Ran@gmail.com', 1, 'kama'),
(18, 'Test1', 'Test.123', 'Test@gmail.com', 3, 'asd'),
(19, 'Test2', 'Test2123.', 'Test2@gmail.com', 1, 'kanto');

-- --------------------------------------------------------

--
-- Table structure for table `activity_log`
--

CREATE TABLE `activity_log` (
  `E_ID` int(100) NOT NULL,
  `ACTIVITY` varchar(255) NOT NULL,
  `USER_ID` int(50) NOT NULL,
  `DATE_TIME` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `activity_log`
--

INSERT INTO `activity_log` (`E_ID`, `ACTIVITY`, `USER_ID`, `DATE_TIME`) VALUES
(1, 'Login-FAILED', 1, '2021/04/24 02:47:55'),
(5, 'Login-ATTEMPT', 1, '2021/04/24 03:07:58'),
(6, 'Login-SUCCESS', 1, '2021/04/24 03:08:03'),
(7, 'Login-ATTEMPT', 2, '2021/04/24 03:11:48'),
(8, 'Login-SUCCESS', 2, '2021/04/24 03:11:55'),
(9, 'Login-ATTEMPT', 1, '2021/04/24 03:17:03'),
(10, 'Login-ATTEMPT', 1, '2021/04/24 03:17:06'),
(11, 'Login-SUCCESS', 1, '2021/04/24 03:17:14'),
(12, 'Login-ATTEMPT', 1, '2021/04/24 03:25:33'),
(13, 'Login-SUCCESS', 1, '2021/04/24 03:25:39'),
(14, 'Logout', 1, '2021/04/24 03:46:12'),
(15, 'Logout', 1, '2021/04/24 03:46:41'),
(16, 'Login-ATTEMPT', 1, '2021/04/24 03:46:59'),
(17, 'Login-SUCCESS', 1, '2021/04/24 03:47:06'),
(18, 'Logout', 1, '2021/04/24 03:47:54'),
(19, 'Login-ATTEMPT', 1, '2021/04/24 03:55:49'),
(20, 'Login-ATTEMPT', 1, '2021/04/24 03:55:52'),
(21, 'Login-SUCCESS', 1, '2021/04/24 03:55:58'),
(22, 'Logout', 1, '2021/04/24 04:36:48'),
(23, 'Password Recovery', 2, '2021/04/25 05:40:16'),
(24, 'Password Recovery', 2, '2021/04/25 06:44:10'),
(25, 'Password Recovery', 1, '2021/04/25 06:46:20'),
(26, 'Password Reset', 1, '2021/04/25 06:53:33'),
(27, 'Password Recovery', 1, '2021/04/25 06:55:51'),
(28, 'Password Recovery', 1, '2021/04/25 06:59:13'),
(29, 'Password Reset', 1, '2021/04/25 07:00:34'),
(30, 'Password Recovery', 1, '2021/04/25 07:05:19'),
(31, 'Password Recovery', 1, '2021/04/25 07:07:17'),
(32, 'Password Recovery', 1, '2021/04/25 07:07:39'),
(33, 'Password Reset', 1, '2021/04/25 07:13:10'),
(34, 'Password Reset', 1, '2021/04/25 07:13:34'),
(35, 'Password Recovery', 1, '2021/04/25 07:14:11'),
(36, 'Password Reset', 1, '2021/04/25 07:14:19'),
(37, 'Login-ATTEMPT', 1, '2021/04/25 09:34:49'),
(38, 'Login-SUCCESS', 1, '2021/04/25 09:34:54'),
(39, 'Login-ATTEMPT', 1, '2021/04/25 11:11:07'),
(40, 'Login-SUCCESS', 1, '2021/04/25 11:11:12'),
(41, 'Login-ATTEMPT', 1, '2021/04/25 11:21:00'),
(42, 'Login-SUCCESS', 1, '2021/04/25 11:21:06'),
(43, 'Logout', 1, '2021/04/25 11:40:42'),
(44, 'Login-ATTEMPT', 1, '2021/04/25 11:41:53'),
(45, 'Login-FAILED', 1, '2021/04/25 11:41:53'),
(46, 'Login-ATTEMPT', 1, '2021/04/25 11:42:08'),
(47, 'Login-SUCCESS', 1, '2021/04/25 11:42:12'),
(48, 'Login-ATTEMPT', 1, '2021/04/25 12:02:48'),
(49, 'Login-SUCCESS', 1, '2021/04/25 12:02:53'),
(50, 'Change Password', 1, '2021/04/25 12:03:12'),
(51, 'Change Password', 1, '2021/04/25 12:08:08'),
(52, 'Change Password', 1, '2021/04/25 12:08:40'),
(53, 'Change Password', 1, '2021/04/25 12:10:36'),
(54, 'Change Password', 1, '2021/04/25 12:11:26'),
(55, 'Logout', 1, '2021/04/25 12:14:41'),
(56, 'Login-ATTEMPT', 2, '2021/04/25 12:14:59'),
(57, 'Login-SUCCESS', 2, '2021/04/25 12:15:07'),
(58, 'Logout', 2, '2021/04/25 12:15:23'),
(59, 'Password Recovery', 1, '2021/04/25 03:09:31'),
(60, 'Password Reset', 1, '2021/04/25 03:09:40'),
(61, 'Login-ATTEMPT', 1, '2021/04/25 03:10:02'),
(62, 'Login-SUCCESS', 1, '2021/04/25 03:10:14'),
(63, 'Change Password', 1, '2021/04/25 03:11:12'),
(64, 'Logout', 1, '2021/04/25 03:11:26'),
(65, 'Login-ATTEMPT', 2, '2021/04/25 03:11:49'),
(66, 'Login-ATTEMPT', 1, '2021/04/25 03:13:45'),
(67, 'Login-FAILED', 1, '2021/04/25 03:13:45'),
(68, 'Password Recovery', 1, '2021/04/25 03:14:37'),
(69, 'Password Reset', 1, '2021/04/25 03:14:44'),
(70, 'Login-ATTEMPT', 1, '2021/04/25 03:15:11'),
(71, 'Login-FAILED', 1, '2021/04/25 03:15:11'),
(72, 'Login-ATTEMPT', 1, '2021/04/25 03:15:27'),
(73, 'Login-SUCCESS', 1, '2021/04/25 03:15:33'),
(74, 'Change Password', 1, '2021/04/25 03:16:28'),
(75, 'Logout', 1, '2021/04/25 03:16:44'),
(76, 'Login-ATTEMPT', 2, '2021/04/25 03:16:59'),
(77, 'Login-SUCCESS', 2, '2021/04/25 03:17:04');

-- --------------------------------------------------------

--
-- Table structure for table `authentication_code`
--

CREATE TABLE `authentication_code` (
  `ID` int(11) NOT NULL,
  `UserID` varchar(25) NOT NULL,
  `Code` int(11) NOT NULL,
  `CreatedTime` varchar(50) NOT NULL,
  `ExpirationTime` varchar(50) NOT NULL,
  `isUsed` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `authentication_code`
--

INSERT INTO `authentication_code` (`ID`, `UserID`, `Code`, `CreatedTime`, `ExpirationTime`, `isUsed`) VALUES
(1, '1', 288485, '2021/03/22 02:03:59', '2021/03/22 02:08:59', -1),
(2, '2', 550217, '2021/03/22 02:04:18', '2021/03/22 02:09:18', 1),
(3, '18', 160667, '2021/03/22 02:04:28', '2021/03/22 02:09:28', -1),
(4, '2', 490395, '2021/03/22 02:05:11', '2021/03/22 02:10:11', 1),
(5, '1', 818131, '2021/03/22 02:19:17', '2021/03/22 02:24:17', 1),
(6, '1', 570464, '2021/03/22 02:20:48', '2021/03/22 02:25:48', 1),
(7, '1', 456290, '2021/03/22 02:21:54', '2021/03/22 02:26:54', -1),
(8, '1', 922981, '2021/03/22 02:28:41', '2021/03/22 02:33:41', 1),
(9, '1', 857900, '2021/03/22 02:29:31', '2021/03/22 02:34:31', -1),
(10, '1', 609181, '2021/03/22 02:39:19', '2021/03/22 02:44:19', 1),
(11, '1', 585107, '2021/03/22 02:40:36', '2021/03/22 02:45:36', -1),
(12, '1', 286880, '2021/03/22 02:46:21', '2021/03/22 02:51:21', 1),
(13, '1', 164872, '2021/04/24 02:49:25', '2021/04/24 02:54:25', 1),
(14, '1', 748984, '2021/04/24 02:58:42', '2021/04/24 03:03:42', 1),
(15, '1', 432897, '2021/04/24 03:07:58', '2021/04/24 03:12:58', 1),
(16, '2', 560854, '2021/04/24 03:11:49', '2021/04/24 03:16:49', 1),
(17, '1', 674486, '2021/04/24 03:17:04', '2021/04/24 03:22:04', 1),
(18, '1', 403146, '2021/04/24 03:25:34', '2021/04/24 03:30:34', 1),
(19, '1', 284078, '2021/04/24 03:46:59', '2021/04/24 03:51:59', 1),
(20, '1', 885832, '2021/04/24 03:55:49', '2021/04/24 04:00:49', 1),
(21, '1', 234507, '2021/04/25 09:34:49', '2021/04/25 09:39:49', 1),
(22, '1', 283299, '2021/04/25 11:11:07', '2021/04/25 11:16:07', 1),
(23, '1', 562232, '2021/04/25 11:21:01', '2021/04/25 11:26:01', 1),
(24, '1', 691127, '2021/04/25 11:42:08', '2021/04/25 11:47:08', 1),
(25, '1', 582019, '2021/04/25 12:02:48', '2021/04/25 12:07:48', 1),
(26, '2', 403241, '2021/04/25 12:14:59', '2021/04/25 12:19:59', 1),
(27, '1', 453853, '2021/04/25 03:10:02', '2021/04/25 03:15:02', 1),
(28, '2', 335968, '2021/04/25 03:11:49', '2021/04/25 03:16:49', -1),
(29, '1', 389463, '2021/04/25 03:15:27', '2021/04/25 03:20:27', 1),
(30, '2', 451366, '2021/04/25 03:16:59', '2021/04/25 03:21:59', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `activity_log`
--
ALTER TABLE `activity_log`
  ADD PRIMARY KEY (`E_ID`);

--
-- Indexes for table `authentication_code`
--
ALTER TABLE `authentication_code`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `activity_log`
--
ALTER TABLE `activity_log`
  MODIFY `E_ID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `authentication_code`
--
ALTER TABLE `authentication_code`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
