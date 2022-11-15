-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 08, 2022 at 05:48 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `field_hockey`
--

-- --------------------------------------------------------

--
-- Table structure for table `coaches`
--

CREATE TABLE `coaches` (
  `Coaches_id` int(11) NOT NULL,
  `Coach_Name` varchar(255) NOT NULL,
  `Coach_Surname` varchar(255) NOT NULL,
  `Team_name` varchar(45) DEFAULT NULL,
  `Gender` tinytext NOT NULL,
  `Position` mediumtext NOT NULL,
  `Experience` date NOT NULL,
  `Starting_Date` date NOT NULL,
  `Ending_Date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `coaches`
--

INSERT INTO `coaches` (`Coaches_id`, `Coach_Name`, `Coach_Surname`, `Team_name`, `Gender`, `Position`, `Experience`, `Starting_Date`, `Ending_Date`) VALUES
(1, 'Michael', 'Davies', 'Carolina Hurricanes', 'Male', 'Head', '2008-04-09', '2020-06-06', '2027-10-28'),
(2, 'Wanda', 'Martin', 'Western Cape First Team', 'Female', 'Head', '2013-09-12', '2017-02-16', '2023-08-11'),
(3, 'Jasmine', 'Du toit', 'Eastern Cape First Team', 'Female', 'Head', '2015-12-06', '2017-08-23', '2023-06-07'),
(4, 'Harry', 'Monroe', 'Free State First Team', 'Male', 'Head', '2012-04-17', '2015-08-20', '2022-08-12'),
(5, 'Arnode', 'Boyce', 'Carolina Hurricanes', 'Male', 'Assistant', '2011-05-09', '2016-03-01', '2021-02-03'),
(6, 'Amelia', 'Fisher', 'Toronto Maple Leaves', 'Female', 'Assistant', '2018-03-01', '2022-05-11', '2029-06-14'),
(7, 'Wesley', 'Snipes', 'Mpumalanga First Team', 'Male', 'Head', '2019-06-12', '2023-08-25', '2025-06-12'),
(8, 'Jeremy', 'Saints', 'Northern Cape First Team', 'Male', 'Head', '2015-02-04', '2017-05-12', '2023-09-28'),
(9, 'Jessica', 'Ramones', 'Western Cape First Team', 'Female', 'Assistant', '2014-09-05', '2016-05-17', '2024-12-12'),
(10, 'Paisley', 'McKenna', 'KZN First Team', 'Female', 'Head', '2013-04-18', '2019-02-10', '2024-02-10'),
(11, 'Sadie', 'Dyer', 'Toronto Maple Leaves', 'Female', 'Head', '2014-09-20', '2015-02-07', '2020-05-16'),
(12, 'Veronica', 'Mason', 'Eastern Cape First Team', 'Female', 'Assistant', '2007-06-07', '2012-09-28', '2026-02-28'),
(13, 'Bradley', 'Morris', 'Gauteng First Team', 'Male', 'Head', '2016-02-04', '2021-06-29', '2025-12-12'),
(14, 'Henrietta', 'Days', 'North West First Team', 'Female', 'Head', '2012-06-01', '2018-08-23', '2022-12-12');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `Game_id` int(11) UNSIGNED NOT NULL,
  `Time_of_Event` datetime NOT NULL,
  `Event_type` enum('Hits','Fouls','Shots','Substitution','Corner') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `Game_id`, `Time_of_Event`, `Event_type`) VALUES
(1, 1, '2022-06-01 22:55:25', 'Fouls'),
(2, 1, '2022-08-09 12:14:22', 'Corner'),
(3, 1, '2022-06-01 22:55:25', 'Shots'),
(4, 1, '2022-08-01 22:55:25', 'Fouls'),
(5, 1, '2022-08-09 12:14:22', 'Corner'),
(6, 1, '2022-06-01 22:55:25', 'Fouls'),
(7, 1, '2022-08-09 12:14:22', 'Corner'),
(8, 1, '2022-06-01 22:55:25', 'Substitution'),
(9, 1, '2022-11-01 05:14:12', 'Fouls'),
(10, 1, '2022-11-01 05:14:12', 'Hits'),
(11, 1, '2022-06-01 22:55:25', 'Shots'),
(12, 1, '2022-06-01 22:55:25', 'Fouls'),
(13, 1, '2022-01-25 05:14:12', 'Substitution'),
(14, 1, '2022-11-01 05:14:12', 'Hits'),
(15, 1, '2022-06-01 22:55:25', 'Shots'),
(16, 2, '2022-06-12 13:15:26', 'Fouls'),
(17, 2, '2022-07-01 12:35:25', 'Shots'),
(18, 2, '2022-03-23 12:25:13', 'Corner'),
(19, 2, '2022-12-21 12:45:12', 'Fouls'),
(20, 2, '2022-12-12 02:13:12', 'Hits'),
(21, 2, '2022-11-01 05:14:12', 'Substitution'),
(22, 2, '2022-10-14 22:15:16', 'Fouls'),
(23, 2, '2022-05-15 15:24:21', 'Hits'),
(24, 2, '2022-03-15 15:14:27', 'Corner'),
(25, 2, '2022-02-01 16:14:29', 'Substitution'),
(26, 2, '2022-02-04 12:14:22', 'Fouls'),
(27, 2, '2022-05-11 17:16:35', 'Corner'),
(28, 2, '2022-04-13 16:15:33', 'Hits'),
(29, 2, '2022-08-09 16:17:36', 'Fouls'),
(30, 2, '2022-09-09 17:29:36', 'Hits'),
(31, 3, '2022-11-14 13:23:44', 'Fouls'),
(32, 3, '2022-09-14 12:59:59', 'Shots'),
(33, 3, '2022-11-29 11:20:34', 'Fouls'),
(34, 3, '2022-10-15 15:30:59', 'Hits'),
(35, 3, '2022-07-15 13:10:34', 'Substitution'),
(36, 3, '2022-11-20 14:45:45', 'Hits'),
(37, 3, '2022-12-20 14:30:59', 'Hits'),
(38, 3, '2022-10-10 13:30:59', 'Fouls'),
(39, 3, '2022-10-07 12:30:50', 'Corner'),
(40, 3, '2022-08-25 12:59:59', 'Shots'),
(41, 3, '2022-07-31 12:30:55', 'Fouls'),
(42, 3, '2022-03-14 15:45:45', 'Hits'),
(43, 3, '2022-09-21 11:30:00', 'Fouls'),
(44, 3, '2022-09-22 13:30:00', 'Corner'),
(45, 3, '2022-10-11 15:00:00', 'Hits'),
(46, 4, '2022-06-12 05:14:12', 'Substitution'),
(47, 4, '2022-07-01 12:35:25', 'Shots'),
(48, 4, '2022-03-23 12:25:13', 'Fouls'),
(49, 4, '2022-12-21 16:14:29', 'Substitution'),
(50, 4, '2022-12-12 02:13:12', 'Hits'),
(51, 5, '2022-11-01 05:14:12', 'Substitution'),
(52, 5, '2022-10-14 12:25:13', 'Corner'),
(53, 5, '2022-05-15 15:24:21', 'Hits'),
(54, 5, '2022-03-15 15:14:27', 'Corner'),
(55, 5, '2022-02-01 17:16:35', 'Corner'),
(56, 6, '2022-02-04 12:14:22', 'Fouls'),
(57, 6, '2022-05-11 17:29:36', 'Hits'),
(58, 6, '2022-04-13 16:15:33', 'Hits'),
(59, 6, '2022-08-09 16:17:36', 'Fouls'),
(60, 6, '2022-09-09 13:23:16', 'Shots'),
(61, 7, '2022-09-09 13:23:44', 'Corner'),
(62, 7, '2022-12-21 16:14:29', 'Substitution'),
(63, 7, '2022-05-11 05:14:12', 'Fouls'),
(64, 7, '2022-09-09 16:14:29', 'Shots'),
(65, 7, '2022-12-12 02:13:12', 'Hits'),
(66, 23, '2022-06-15 23:59:47', 'Shots'),
(67, 23, '2022-11-01 13:57:57', 'Substitution'),
(68, 23, '2022-08-13 19:11:30', 'Substitution'),
(69, 23, '2022-11-30 15:30:59', 'Hits'),
(70, 23, '2022-07-30 13:10:34', 'Substitution'),
(71, 24, '2022-11-01 05:14:12', 'Substitution'),
(72, 24, '2022-05-11 16:15:33', 'Fouls'),
(73, 24, '2022-05-15 15:24:21', 'Hits'),
(74, 24, '2022-03-15 13:23:16', 'Fouls'),
(75, 24, '2022-08-09 12:14:22', 'Corner'),
(76, 25, '2022-05-09 21:22:31', 'Substitution'),
(77, 25, '2022-07-25 08:23:05', 'Shots'),
(78, 25, '2022-11-10 15:25:27', 'Fouls'),
(79, 25, '2022-03-03 02:00:44', 'Hits'),
(80, 25, '2022-10-24 00:17:17', 'Shots'),
(81, 26, '2022-11-01 17:29:36', 'Fouls'),
(82, 26, '2022-04-13 16:15:33', 'Fouls'),
(83, 26, '2022-02-09 15:24:21', 'Fouls'),
(84, 26, '2022-03-15 12:14:22', 'Shots'),
(85, 26, '2022-08-09 05:14:12', 'Shots'),
(86, 27, '2022-08-11 04:18:28', 'Fouls'),
(87, 27, '2022-11-09 04:42:19', 'Fouls'),
(88, 27, '2022-07-18 05:42:38', 'Hits'),
(89, 27, '2022-09-12 02:58:01', 'Hits'),
(90, 27, '2022-09-20 11:06:13', 'Fouls'),
(91, 28, '2022-03-15 15:14:27', 'Fouls'),
(92, 28, '2022-04-13 16:15:33', 'Substitution'),
(93, 28, '2022-12-21 15:14:27', 'Substitution'),
(94, 28, '2022-03-15 12:14:22', 'Shots'),
(95, 28, '2022-09-09 16:14:29', 'Shots'),
(96, 29, '2022-10-15 20:41:25', 'Fouls'),
(97, 29, '2022-06-26 21:56:46', 'Fouls'),
(98, 29, '2022-11-25 13:21:22', 'Substitution'),
(99, 29, '2022-07-07 08:38:35', 'Hits'),
(100, 29, '2022-03-22 13:52:41', 'Substitution'),
(101, 30, '2022-11-01 05:14:12', 'Hits'),
(102, 30, '2022-07-25 08:23:05', 'Fouls'),
(103, 30, '2022-03-15 05:04:21', 'Hits'),
(104, 30, '2022-02-15 03:03:16', 'Hits'),
(105, 30, '2022-01-09 02:04:22', 'Corner'),
(106, 31, '2019-01-13 16:21:37', 'Fouls'),
(107, 31, '2018-12-29 22:06:35', 'Substitution'),
(109, 31, '2018-11-10 16:26:51', 'Hits'),
(110, 31, '2018-11-10 16:26:51', 'Hits'),
(112, 31, '2019-01-17 15:52:07', 'Substitution'),
(113, 32, '2022-01-11 05:34:12', 'Substitution'),
(114, 32, '2022-03-21 16:45:33', 'Fouls'),
(115, 32, '2022-02-25 15:44:41', 'Hits'),
(116, 32, '2022-01-25 13:43:56', 'Fouls'),
(117, 32, '2022-08-22 13:30:00', 'Corner'),
(118, 33, '2018-12-13 06:30:59', 'Substitution'),
(119, 33, '2018-12-12 06:45:28', 'Corner'),
(120, 33, '2018-11-24 03:03:45', 'Hits'),
(121, 33, '2019-01-03 23:18:03', 'Hits'),
(122, 33, '2018-12-01 23:20:59', 'Substitution'),
(123, 34, '2018-01-11 05:12:24', 'Hits'),
(124, 34, '2019-10-21 12:21:23', 'Substitution'),
(125, 34, '2019-11-25 13:12:13', 'Hits'),
(126, 34, '2019-01-25 14:12:15', 'Fouls'),
(127, 34, '2019-01-29 15:23:53', 'Substitution'),
(128, 35, '2019-01-06 05:28:39', 'Corner'),
(129, 35, '2018-11-27 21:52:25', 'Substitution'),
(130, 35, '2018-12-04 14:28:31', 'Corner'),
(131, 35, '2019-01-28 12:59:49', 'Fouls'),
(132, 35, '2019-01-14 22:58:46', 'Substitution'),
(133, 36, '2022-08-11 04:18:28', 'Hits'),
(134, 36, '2022-05-11 16:15:33', 'Fouls'),
(135, 36, '2022-05-15 15:24:21', 'Hits'),
(136, 36, '2022-03-15 13:23:16', 'Fouls'),
(137, 36, '2022-08-09 12:14:22', 'Corner');

-- --------------------------------------------------------

--
-- Table structure for table `events_corner`
--

CREATE TABLE `events_corner` (
  `id` int(11) NOT NULL,
  `Player_id` varchar(6) NOT NULL,
  `Type_of_Corner` enum('Long Corner','Short Corner') NOT NULL,
  `Goal_scored` bit(1) NOT NULL,
  `Intercepted` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `events_corner`
--

INSERT INTO `events_corner` (`id`, `Player_id`, `Type_of_Corner`, `Goal_scored`, `Intercepted`) VALUES
(2, 'KY601', 'Long Corner', b'0', b'1'),
(5, 'CJ427', 'Long Corner', b'0', b'0'),
(7, 'GC580', 'Short Corner', b'0', b'1'),
(18, 'BT324', 'Long Corner', b'0', b'0'),
(24, 'CL596', 'Short Corner', b'0', b'0'),
(27, 'HS421', 'Short Corner', b'0', b'0'),
(39, 'GM102', 'Long Corner', b'1', b'0'),
(44, 'DO450', 'Long Corner', b'0', b'0'),
(52, 'KM111', 'Short Corner', b'0', b'1'),
(54, 'KY601', 'Long Corner', b'0', b'0'),
(55, 'BT324', 'Long Corner', b'0', b'0'),
(61, 'JM507', 'Short Corner', b'0', b'1'),
(75, 'BM479', 'Short Corner', b'0', b'0'),
(105, 'LD230', 'Short Corner', b'0', b'0'),
(117, 'GR467', 'Long Corner', b'0', b'1'),
(119, 'FL346', 'Long Corner', b'0', b'0'),
(128, 'RB567', 'Short Corner', b'1', b'0'),
(130, 'SG456', 'Long Corner', b'0', b'0'),
(137, 'TM345', 'Short Corner', b'0', b'0');

-- --------------------------------------------------------

--
-- Table structure for table `event_fouls`
--

CREATE TABLE `event_fouls` (
  `id` int(11) NOT NULL,
  `Foul_Commiter` varchar(6) NOT NULL,
  `Card_issued` tinytext NOT NULL,
  `Foul_type` enum('Travelling','Obstruction','Backstick','Highball','Above Shoulder','Advancing','Interfence','Rough Play','Blocking') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `event_fouls`
--

INSERT INTO `event_fouls` (`id`, `Foul_Commiter`, `Card_issued`, `Foul_type`) VALUES
(48, 'JB293', 'Red', 'Advancing'),
(56, 'MA582', 'Yellow', 'Advancing'),
(59, 'JM507', 'Green', 'Backstick'),
(63, 'CM439', 'Green', 'Above Shoulder'),
(71, 'CJ346', 'Green', 'Highball'),
(72, 'SR234', 'Green', 'Highball'),
(73, 'JW123', 'Red', 'Above Shoulder'),
(75, 'AS128', 'Red', 'Above Shoulder'),
(77, 'DX567', 'Red', 'Above Shoulder'),
(80, 'BW362', 'Red', 'Highball'),
(83, 'GC580', 'Red', 'Backstick'),
(86, 'JR235', 'Yellow', 'Above Shoulder'),
(90, 'FL349', 'Green', 'Advancing'),
(91, 'DC123', 'Yellow', 'Above Shoulder'),
(97, 'BB234', 'Green', 'Above Shoulder'),
(102, 'TF127', 'Green', 'Backstick'),
(106, 'JS340', 'Red', 'Highball'),
(124, 'KL212', 'Green', 'Backstick'),
(125, 'RE221', 'Yellow', 'Advancing'),
(126, 'KY601', 'Red', 'Backstick'),
(134, 'CJ427', 'Green', 'Above Shoulder'),
(136, 'BT324', 'Yellow', 'Above Shoulder'),
(137, 'CF658', 'Red', 'Highball'),
(202, 'GE457', 'Green', 'Highball'),
(204, 'IJ356', 'Red', 'Above Shoulder');

-- --------------------------------------------------------

--
-- Table structure for table `event_hits`
--

CREATE TABLE `event_hits` (
  `id` int(11) NOT NULL,
  `Player_id` varchar(6) NOT NULL,
  `Type_of_Hit` enum('16 yard hit','Free hit') NOT NULL,
  `Intercepted` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `event_hits`
--

INSERT INTO `event_hits` (`id`, `Player_id`, `Type_of_Hit`, `Intercepted`) VALUES
(10, 'LD230', 'Free hit', b'1'),
(14, 'RW705', '16 yard hit', b'0'),
(20, 'BT324', '16 yard hit', b'1'),
(23, 'CL234', 'Free hit', b'1'),
(28, 'RE221', 'Free hit', b'1'),
(30, 'JG459', '16 yard hit', b'0'),
(34, 'TF127', '16 yard hit', b'0'),
(36, 'SF201', 'Free hit', b'1'),
(37, 'MS102', 'Free hit', b'1'),
(42, 'BS567', '16 yard hit', b'1'),
(45, 'DO450', 'Free hit', b'1'),
(53, 'SL301', '16 yard hit', b'1'),
(57, 'BW362', 'Free hit', b'1'),
(58, 'JM507', '16 yard hit', b'0'),
(65, 'DO450', 'Free hit', b'1'),
(69, 'SS402', '16 yard hit', b'0'),
(73, 'SL301', '16 yard hit', b'1'),
(79, 'SS402', '16 yard hit', b'0'),
(88, 'DF878', '16 yard hit', b'0'),
(89, 'JJ245', 'Free hit', b'1'),
(99, 'GE457', 'Free hit', b'0'),
(101, 'HO108', '16 yard hit', b'1'),
(103, 'NS101', '16 yard hit', b'0'),
(104, 'NT234', 'Free hit', b'1'),
(109, 'CT443', '16 yard hit', b'1'),
(110, 'JD789', '', b'1'),
(115, 'HB450', '', b'0'),
(120, 'CL596', '', b'0'),
(121, 'SS146', '', b'1'),
(123, 'CH980', 'Free hit', b'1'),
(125, 'SD348', '', b'1'),
(133, 'EA457', '', b'0'),
(135, 'CM439', 'Free hit', b'1');

-- --------------------------------------------------------

--
-- Table structure for table `event_shots`
--

CREATE TABLE `event_shots` (
  `id` int(11) NOT NULL,
  `Shot_taker` varchar(6) NOT NULL,
  `Shot_Type` enum('Penalty','Field Goal','Penalty Stroke') NOT NULL,
  `Assisted` varchar(6) NOT NULL,
  `Shot_saved` bit(1) NOT NULL,
  `Intercepted` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `event_shots`
--

INSERT INTO `event_shots` (`id`, `Shot_taker`, `Shot_Type`, `Assisted`, `Shot_saved`, `Intercepted`) VALUES
(17, 'KY601', 'Field Goal', '1', b'0', b'1'),
(25, 'JG459', 'Penalty Stroke', '0', b'1', b'0'),
(27, 'JI563', 'Field Goal', '1', b'0', b'0'),
(28, 'CF658', 'Field Goal', '1', b'1', b'0'),
(47, 'JC378', 'Penalty Stroke', '0', b'1', b'0'),
(64, 'EA457', 'Field Goal', '0', b'0', b'1'),
(66, 'HO108', 'Field Goal', '1', b'0', b'0'),
(83, 'HS421', 'Field Goal', '0', b'0', b'1'),
(84, 'NT234', 'Field Goal', '0', b'1', b'1'),
(85, 'NM223', 'Penalty', '0', b'1', b'0'),
(94, 'CT443', 'Penalty Stroke', '0', b'0', b'1'),
(95, 'FK021', 'Penalty', '0', b'0', b'0');

-- --------------------------------------------------------

--
-- Table structure for table `event_substitution`
--

CREATE TABLE `event_substitution` (
  `id` int(11) NOT NULL,
  `Player_off` varchar(6) NOT NULL,
  `Player_on` varchar(6) NOT NULL,
  `Position` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `event_substitution`
--

INSERT INTO `event_substitution` (`id`, `Player_off`, `Player_on`, `Position`) VALUES
(20, 'KY601', 'SR234', 'Forward'),
(34, 'TS917', 'RW705', 'Fullback'),
(46, 'SL301', 'FF450', 'Midfielder'),
(49, 'CJ427', 'ML001', 'Midfielder'),
(51, 'BT324', 'HM568', 'Fullback'),
(62, 'JD134', 'JV124', 'Sweeper'),
(67, 'TF127', 'CL596', 'Fullback'),
(68, 'BK778', 'MT977', 'Right Wing'),
(70, 'MF56', 'RC534', 'Midfielder'),
(71, 'CF658', 'GH678', 'Forward'),
(76, 'FW256', 'MS102', 'Midfielder'),
(92, 'DE346', 'KL212', 'Sweeper'),
(93, 'CJ346', 'DP111', 'Forward'),
(98, 'JJ567', 'TK424', 'Forward'),
(100, 'JD789', 'MH356', 'Fullback'),
(107, 'ND349', 'TA129', 'Forward'),
(112, 'SG456', 'SJ192', 'Forward'),
(113, 'CM356', 'HO108', 'Fullback'),
(118, 'BS567', 'DF878', 'Goalie'),
(122, 'KS347', 'SK123', 'Midfielder'),
(124, 'AM120', 'TL463', 'Fullback'),
(127, 'OI901', 'CG990', 'Center Back'),
(129, 'BB234', 'GR467', 'Midfielder'),
(132, 'VL435', 'FL468', 'Fullback');

-- --------------------------------------------------------

--
-- Table structure for table `games`
--

CREATE TABLE `games` (
  `Games_id` int(11) UNSIGNED NOT NULL,
  `Umpire_licence` int(10) UNSIGNED NOT NULL,
  `tournament_id` int(5) NOT NULL,
  `Team_1` varchar(45) DEFAULT NULL,
  `Team_2` varchar(45) DEFAULT NULL,
  `Date_of_Match` date NOT NULL,
  `Alt_match_day` date NOT NULL,
  `Time_duration` int(11) DEFAULT NULL,
  `Game_round` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `games`
--

INSERT INTO `games` (`Games_id`, `Umpire_licence`, `tournament_id`, `Team_1`, `Team_2`, `Date_of_Match`, `Alt_match_day`, `Time_duration`, `Game_round`) VALUES
(1, 1005060313, 25987, 'Carolina Hurricanes', 'Eastern Cape First Team', '2021-08-13', '2021-08-18', 60, 'Quarter Final'),
(2, 1234857453, 25987, 'Free State First Team', 'Gauteng First Team', '2021-11-13', '2021-11-15', 65, 'Quarter Finals'),
(3, 4294967295, 25987, 'KZN First Team', 'Toronto Maple Leaves', '2021-11-13', '2021-11-15', 62, 'Quarter Finals'),
(4, 1005060313, 25987, 'North West First Team', 'Western Cape First Team', '2021-11-13', '2021-11-15', 66, 'Quarter Finals'),
(5, 1005060313, 25987, 'Carolina Hurricanes', 'Free State First Team', '2021-12-20', '2021-12-20', 60, 'Semifinals'),
(6, 1526849357, 25987, 'Toronto Maple Leaves', 'Western Cape First Team', '2021-12-20', '2021-12-20', 60, 'Semifinals'),
(7, 1827394445, 25987, 'Carolina Hurricanes', 'Western Cape First Team', '2022-01-20', '2022-01-25', 63, 'Final'),
(8, 1005060313, 32154, 'Northern Cape First Team', 'KZN First Team', '2022-12-10', '2022-12-15', NULL, 'Quarter Finals'),
(9, 4294967295, 32154, 'Free State First Team', 'Gauteng First Team', '2022-12-10', '2022-12-15', NULL, 'Quarter Finals'),
(10, 2036549287, 32154, 'Mpumalanga First Team', 'North West First Team', '2022-12-10', '2022-12-15', NULL, 'Quarter Finals'),
(11, 2065874697, 32154, 'Western Cape First Team', 'Eastern Cape First Team', '2022-12-10', '2022-12-15', NULL, 'Quarter Finals'),
(12, 1827394445, 32154, NULL, NULL, '2023-01-10', '2023-01-15', NULL, 'Semifinals'),
(13, 1526849357, 32154, NULL, NULL, '2023-01-10', '2023-01-15', NULL, 'Semifinals'),
(14, 1234857453, 32154, NULL, NULL, '2023-02-10', '2023-02-15', NULL, 'Final'),
(16, 1526849357, 32545, 'Free State First Team', 'Western Cape First Team', '2023-06-05', '2023-06-10', NULL, 'Quarter Finals'),
(17, 2065874697, 32545, 'Toronto Maple Leaves', 'Carolina Hurricanes', '2023-06-05', '2023-06-10', NULL, 'Quarter Finals'),
(18, 1005060313, 32545, 'Eastern Cape First Team', 'Gauteng First Team', '2023-06-05', '2023-06-10', NULL, 'Quarter Finals'),
(19, 2036549287, 32545, 'Mpumalanga First Team', 'North West First Team', '2023-06-05', '2023-06-10', NULL, 'Quarter Finals'),
(20, 1234857453, 32545, NULL, NULL, '2023-07-05', '2023-07-15', NULL, 'Semifinals'),
(21, 1526849357, 32545, NULL, NULL, '2023-07-05', '2023-07-15', NULL, 'Semifinals'),
(22, 4294967295, 32545, NULL, NULL, '2023-07-25', '2023-07-30', NULL, 'Final'),
(23, 4294967295, 45678, 'KZN First Team', 'Free State First Team', '2018-09-28', '2018-10-16', 69, 'Quarter Finals'),
(24, 2065874697, 45678, 'Mpumalanga First Team', 'Eastern Cape First Team', '2018-09-28', '2018-10-16', 65, 'Quarter Finals'),
(25, 2036549287, 45678, 'Northern Cape First Team', 'Western Cape First Team', '2018-09-28', '2018-10-16', 60, 'Quarter Finals'),
(26, 1827394445, 45678, 'Gauteng First Team', 'North West First Team', '2018-09-28', '2018-10-16', 62, 'Quarter Finals'),
(27, 1526849357, 45678, 'KZN First Team', 'Eastern Cape First Team', '2018-11-15', '2018-11-30', 61, 'Semifinals'),
(28, 1359867350, 45678, 'Northern Cape First Team', 'North West First Team', '2018-11-15', '2018-11-30', 62, 'Semifinals'),
(29, 1005060313, 45678, 'KZN First Team', 'North West First Team', '2019-01-15', '2019-01-30', 63, 'Final'),
(30, 1526849357, 56876, 'Toronto Maple Leaves', 'Eastern Cape First Team', '2019-12-01', '2020-01-05', 62, 'Quarter Finals'),
(31, 1827394445, 56876, 'Carolina Hurricanes', 'Mpumalanga First Team', '2019-12-01', '2020-01-05', 61, 'Quarter Finals'),
(32, 2036549287, 56876, 'Northern Cape First Team', 'Western Cape First Team', '2019-12-01', '2020-01-05', 60, 'Quarter Finals'),
(33, 2065874697, 56876, 'KZN First Team', 'Gauteng First Team', '2019-12-01', '2020-01-05', 60, 'Quarter Finals'),
(34, 4294967295, 56876, 'Toronto Maple Leaves', 'Carolina Hurricanes', '2020-02-02', '2020-02-15', 61, 'Semifinals'),
(35, 1005060313, 56876, 'Western Cape First Team', 'KZN First Team', '2020-02-02', '2020-02-15', 62, 'Semifinals'),
(36, 1234857453, 56876, 'Toronto Maple Leaves', 'Western Cape First Team', '2020-02-25', '2020-03-28', 63, 'Final');

-- --------------------------------------------------------

--
-- Table structure for table `game_stats`
--

CREATE TABLE `game_stats` (
  `Game_id` int(11) UNSIGNED NOT NULL,
  `Own_goals` int(10) UNSIGNED NOT NULL,
  `Yellow_cards` int(10) UNSIGNED NOT NULL,
  `Free_hits` int(10) UNSIGNED NOT NULL,
  `Short_corners` tinyint(127) UNSIGNED NOT NULL,
  `Long_corners` tinyint(127) UNSIGNED NOT NULL,
  `Total_fouls` int(10) UNSIGNED NOT NULL,
  `Red_cards` int(10) UNSIGNED NOT NULL,
  `Green_cards` int(10) UNSIGNED NOT NULL,
  `Extra_time` binary(1) NOT NULL,
  `Penalties` binary(1) NOT NULL,
  `Game_winner` varchar(255) DEFAULT NULL,
  `Game_loser` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `game_stats`
--

INSERT INTO `game_stats` (`Game_id`, `Own_goals`, `Yellow_cards`, `Free_hits`, `Short_corners`, `Long_corners`, `Total_fouls`, `Red_cards`, `Green_cards`, `Extra_time`, `Penalties`, `Game_winner`, `Game_loser`) VALUES
(1, 3, 2, 0, 0, 0, 7, 0, 0, 0x30, 0x30, 'Carolina Hurricanes', 'Eastern Cape First Team'),
(2, 0, 2, 0, 0, 0, 0, 0, 0, 0x30, 0x30, 'Free State First Team', 'Gauteng First Team'),
(3, 1, 0, 0, 0, 0, 0, 0, 3, 0x30, 0x30, 'Toronto Maple Leaves', 'KZN First Team'),
(4, 1, 4, 5, 5, 0, 0, 0, 0, 0x30, 0x30, 'Western Cape First Team', 'North West First Team'),
(5, 3, 3, 0, 0, 6, 6, 5, 0, 0x30, 0x30, 'Carolina Hurricanes', 'Free State First Team'),
(6, 4, 0, 0, 0, 6, 8, 3, 3, 0x30, 0x30, 'Western Cape First Team', 'Toronto Maple Leaves'),
(7, 3, 0, 3, 7, 0, 0, 2, 0, 0x30, 0x30, 'Western Cape First Team', 'Carolina Hurricanes'),
(8, 0, 0, 0, 0, 0, 0, 0, 0, 0x30, 0x30, NULL, NULL),
(9, 0, 0, 0, 0, 0, 0, 0, 0, 0x30, 0x30, NULL, NULL),
(10, 0, 0, 0, 0, 0, 0, 0, 0, 0x30, 0x30, NULL, NULL),
(11, 0, 0, 0, 0, 0, 0, 0, 0, 0x30, 0x30, NULL, NULL),
(12, 0, 0, 0, 0, 0, 0, 0, 0, 0x30, 0x30, NULL, NULL),
(13, 0, 0, 0, 0, 0, 0, 0, 0, 0x30, 0x30, NULL, NULL),
(14, 0, 0, 0, 0, 0, 0, 0, 0, 0x30, 0x30, NULL, NULL),
(16, 0, 0, 0, 0, 0, 0, 0, 0, 0x30, 0x30, NULL, NULL),
(17, 0, 0, 0, 0, 0, 0, 0, 0, 0x30, 0x30, NULL, NULL),
(18, 0, 0, 0, 0, 0, 0, 0, 0, 0x30, 0x30, NULL, NULL),
(19, 0, 0, 0, 0, 0, 0, 0, 0, 0x30, 0x30, NULL, NULL),
(20, 0, 0, 0, 0, 0, 0, 0, 0, 0x30, 0x30, NULL, NULL),
(21, 0, 0, 0, 0, 0, 0, 0, 0, 0x30, 0x30, NULL, NULL),
(22, 0, 0, 0, 0, 0, 0, 0, 0, 0x30, 0x30, NULL, NULL),
(23, 2, 4, 4, 2, 0, 8, 2, 3, 0x30, 0x30, 'KZN First Team', 'Free State First Team'),
(24, 3, 4, 2, 0, 1, 0, 7, 5, 0x30, 0x30, 'Eastern Cape First Team', 'Mpumalanga First Team'),
(25, 3, 2, 0, 0, 4, 0, 6, 0, 0x30, 0x30, 'Northern Cape First Team', 'Western Cape First Team'),
(26, 0, 2, 0, 1, 0, 0, 0, 0, 0x30, 0x30, 'North West First Team', 'Gauteng First Team'),
(27, 0, 0, 0, 6, 0, 0, 0, 0, 0x30, 0x30, 'KZN First Team', 'Eastern Cape First Team'),
(28, 1, 0, 4, 6, 0, 7, 0, 0, 0x30, 0x30, 'North West First Team', 'Northern Cape First Team'),
(29, 0, 0, 0, 0, 5, 0, 0, 5, 0x30, 0x30, 'KZN First Team', 'North West First Team'),
(30, 1, 0, 5, 3, 0, 0, 7, 0, 0x30, 0x30, 'Toronto Maple Leaves', 'Eastern Cape First Team'),
(31, 0, 2, 0, 2, 0, 6, 0, 0, 0x30, 0x30, 'Carolina Hurricanes', 'Mpumalanga First Team'),
(32, 0, 7, 2, 0, 0, 6, 1, 2, 0x30, 0x30, 'Western Cape First Team', 'Northern Cape First Team'),
(33, 2, 0, 4, 0, 0, 6, 2, 0, 0x30, 0x30, 'KZN First Team', 'Gauteng First Team'),
(34, 0, 1, 0, 0, 7, 7, 0, 3, 0x30, 0x30, 'Toronto Maple Leaves', 'Carolina Hurricanes'),
(35, 2, 2, 0, 3, 0, 0, 8, 0, 0x30, 0x30, 'Western Cape First Team', 'KZN First Team'),
(36, 0, 0, 0, 0, 0, 0, 0, 0, 0x30, 0x30, 'Western Cape First Team', 'Toronto Maple Leaves');

-- --------------------------------------------------------

--
-- Table structure for table `players`
--

CREATE TABLE `players` (
  `Player_id` varchar(6) NOT NULL,
  `Team_name` varchar(255) DEFAULT NULL,
  `First_Name` tinytext NOT NULL,
  `Last_Name` tinytext NOT NULL,
  `Position` varchar(15) NOT NULL,
  `Date_of_Birth` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `players`
--

INSERT INTO `players` (`Player_id`, `Team_name`, `First_Name`, `Last_Name`, `Position`, `Date_of_Birth`) VALUES
('AM120', 'Gauteng First Team', 'Aurora', 'Mikaela', 'Sweeper', '1999-05-08'),
('AS128', 'Northern Cape First Team', 'Amy', 'Santiago', 'Forward', '1997-09-28'),
('BB234', 'Northern Cape First Team', 'Bianca', 'Blouse', 'Fullback', '2000-08-03'),
('BF808', 'North West First Team', 'Bianca', 'Frees', 'Goalie', '2003-07-24'),
('BK778', 'Free State First Team', 'Brooks', 'Keith', 'Right Wing', '1997-06-16'),
('BM124', 'North West First Team', 'Bethany', 'Mota', 'Forward', '1999-06-28'),
('BM479', 'Eastern Cape First Team', 'Bailey', 'Maddisons', 'Sweeper', '2001-06-23'),
('BS567', 'KZN First Team', 'Brent', 'Stratford', 'Goalie', '2003-08-17'),
('BT324', 'Free State First Team', 'Bell', 'Thomasina', 'Back', '1986-11-04'),
('BT459', 'North West First Team', 'Bailey', 'Trents', 'Midfielder', '2001-04-23'),
('BW362', 'Western Cape First Team', 'Brent', 'Woodford', 'Fullback', '2002-01-01'),
('CF658', 'KZN First Team', 'Connor', 'Franta', 'Forward', '1998-02-25'),
('CG990', 'North West First Team', 'Chapman', 'Garyn', 'Center Back', '2002-02-04'),
('CH180', 'Eastern Cape First Team', 'Cacey', 'Hill', 'Goalie', '1995-10-11'),
('CH980', 'Carolina Hurricanes', 'Carlos', 'Hunter', 'Goalie', '2001-10-10'),
('CJ346', 'Mpumalanga First Team', 'Colby', 'Jones', 'Forward', '2003-09-06'),
('CJ427', 'Eastern Cape First Team', 'Carston', 'Jackson', 'Forward', '1987-12-07'),
('CL234', 'Toronto Maple Leaves', 'Christine', 'Lullaby', 'Midfielder', '1998-06-24'),
('CL596', 'Gauteng First Team', 'Caitlyn', 'Lubbe', 'Fullback', '2002-01-02'),
('CM356', 'KZN First Team', 'Caleb', 'McLaughlin', 'Fullback', '2003-07-13'),
('CM439', 'Western Cape First Team', 'Camryn', 'Lille', 'Fullback', '1999-08-26'),
('CM457', 'North West First Team', 'Cassidy', 'Milner', 'Midfielder', '2000-04-28'),
('CS891', 'Northern Cape First Team', 'Connor', 'Scotch', 'Fullback', '2001-04-27'),
('CT443', 'Mpumalanga First Team', 'Clive', 'Terwin', 'Midfielder', '2002-04-21'),
('DC123', 'Gauteng First Team', 'Dhyan', 'Chand', 'Goalie', '2000-02-16'),
('DE346', 'KZN First Team', 'Daisy', 'Edgar', 'Sweeper', '2005-01-23'),
('DF878', 'KZN First Team', 'Davey', 'Frost', 'Goalie', '1994-07-11'),
('DF890', 'North West First Team', 'Destiny', 'Furtado', 'Sweeper', '2001-08-29'),
('DJ567', 'North West First Team', 'Daisy', 'Jones', 'Midfielder', '2003-09-24'),
('DK875', 'Northern Cape First Team', 'Duncan', 'Kirsti', 'Goalie', '1996-05-24'),
('DM456', 'Mpumalanga First Team', 'Declan', 'Milner', 'Forward', '2001-08-24'),
('DM901', 'Toronto Maple Leaves', 'Declan', 'McKenna', 'Midfielder', '1997-02-04'),
('DO450', 'Western Cape First Team', 'Damien', 'Olivander', 'Forward', '2001-01-07'),
('DP111', 'Mpumalanga First Team', 'Dhanraj', 'Pillay', 'Forward', '1999-12-26'),
('DX567', 'Western Cape First Team', 'Dixon', 'Christophe', 'Center Back', '1992-11-30'),
('EA457', 'Western Cape First Team', 'Emilie', 'Alexander', 'Midfielder', '2000-09-23'),
('EP506', 'Carolina Hurricanes', 'Edna', 'Polk', 'Sweeper', '1999-06-16'),
('FF000', 'Northern Cape First Team', 'Freddie', 'Fredericks', 'Goalie', '2001-02-07'),
('FF450', 'Carolina Hurricanes', 'Fiona', 'Fields', 'Midfielder', '2003-06-14'),
('FI101', 'Free State First Team', 'Franco', 'Italy', 'Goalie', '2004-09-07'),
('FK021', 'Toronto Maple Leaves', 'Fergus', 'Kavanagh', 'Midfielder', '2003-04-16'),
('FL346', 'Gauteng First Team', 'Francois', 'Laubscher', 'Forward', '1997-04-01'),
('FL349', 'Toronto Maple Leaves', 'Faith', 'Louisa', 'Forward', '1997-01-27'),
('FL468', 'Northern Cape First Team', 'Faith', 'Letterman', 'Fullback', '2004-07-06'),
('FW256', 'KZN First Team', 'Finn', 'Wolfhard', 'Fullback', '2002-05-14'),
('GC580', 'Eastern Cape First Team', 'Gillian', 'Cooper', 'Goalie', '2001-08-01'),
('GD468', 'Western Cape First Team', 'Gabriella', 'da Costa', 'Midfielder', '2000-08-14'),
('GE457', 'Gauteng First Team', 'Gale', 'Effy', 'Forward', '1998-04-09'),
('GH678', 'KZN First Team', 'Gerard', 'Hein', 'Forward', '1996-09-17'),
('GM102', 'Toronto Maple Leaves', 'Gloria', 'Mendosa', 'Midfielder', '1999-12-09'),
('GM456', 'Mpumalanga First Team', 'Gaten', 'Matarazzo', 'Midfielder', '1998-06-24'),
('GR467', 'Northern Cape First Team', 'George', 'Russell', 'Midfielder', '2003-09-27'),
('GS123', 'Carolina Hurricanes', 'Gareth', 'Southgate', 'Goalie', '2000-08-07'),
('HB450', 'Northern Cape First Team', 'Hailey', 'Baldwin', 'Midfielder', '1998-08-23'),
('HB467', 'Carolina Hurricanes', 'Hannah', 'Ball', 'Sweeper', '2004-12-07'),
('HM568', 'Free State First Team', 'Hannah', 'Montana', 'Fullback', '2005-02-08'),
('HO108', 'KZN First Team', 'Hailey', 'Oklahoma', 'Fullback', '2000-06-18'),
('HS421', 'Gauteng First Team', 'Hassan', 'Sardar', 'Midfielder', '2001-12-23'),
('HS568', 'Free State First Team', 'Bailey', 'Seavies', 'Fullback', '2004-07-05'),
('IJ356', 'Free State First Team', 'Indiana', 'Jones', 'Forward', '2004-01-29'),
('JB120', 'Northern Cape First Team', 'Jackie', 'Burkheart', 'Midfielder', '1999-12-03'),
('JB293', 'Toronto Maple Leaves', 'Jackson', 'Blake', 'Fullback', '2000-05-09'),
('JC378', 'Western Cape First Team', 'Johnston', 'Claudius', 'Center Back', '2000-06-16'),
('JD134', 'Free State First Team', 'Jessica', 'Day', 'Fullback', '2003-08-27'),
('JD423', 'Toronto Maple Leaves', 'Jamie', 'Dwyer', 'Fullback', '2002-05-06'),
('JD789', 'Mpumalanga First Team', 'Jack', 'Dylan', 'Fullback', '2004-10-13'),
('JG459', 'Free State First Team', 'Jess', 'George', 'MidFielder', '2002-08-07'),
('JI563', 'Free State First Team', 'Jessica', 'Iron', 'MidFielder', '2003-07-04'),
('JJ245', 'Eastern Cape First Team', 'Jone', 'Johanna', 'Midfielder', '2003-06-07'),
('JJ567', 'Mpumalanga First Team', 'Jackson', 'Jacobs', 'Forward', '2001-05-06'),
('JK245', 'Mpumalanga First Team', 'Joe', 'Keery', 'Goalie', '2000-02-12'),
('JK254', 'Eastern Cape First Team', 'Jack', 'Kingston', 'Midfielder', '1989-02-06'),
('JM507', 'Western Cape First Team', 'Joseph', 'Martins', 'Forward', '2004-05-12'),
('JN678', 'Mpumalanga First Team', 'Jessica', 'Noels', 'Midfielder', '2000-09-07'),
('JO230', 'Mpumalanga First Team', 'Jolene', 'Olives', 'Fullback', '2001-03-29'),
('JP103', 'Eastern Cape First Team', 'Jake', 'Peralta', 'Forward', '1999-02-25'),
('JR123', 'Toronto Maple Leaves', 'Julia', 'Roberts', 'Sweeper', '2000-07-06'),
('JR235', 'Toronto Maple Leaves', 'Jeremy', 'Renner', 'Forward', '1999-06-05'),
('JS340', 'Northern Cape First Team', 'Justine', 'Skye', 'Forward', '2000-10-10'),
('JV124', 'Free State First Team', 'Jeremiah', 'Vague', 'Sweeper', '2003-02-06'),
('JW123', 'Gauteng First Team', 'James', 'Wilkins', 'Goalie', '2000-03-06'),
('KJ231', 'Toronto Maple Leaves', 'Kyler', 'Jake', 'Goalie', '2000-03-09'),
('KL212', 'KZN First Team', 'Kyle', 'Lunnon', 'Sweeper', '1998-04-26'),
('KM111', 'Carolina Hurricanes', 'Kathrine', 'Miller', 'Midfielder', '2003-06-17'),
('KM345', 'Northern Cape First Team', 'Katelyn', 'Mahoney', 'Forward', '2001-09-25'),
('KS347', 'Gauteng First Team', 'Kaya', 'Slater', 'Midfielder', '1996-02-26'),
('KY601', 'Carolina Hurricanes', 'Khali', 'Young', 'Forward', '2002-03-05'),
('LD230', 'Eastern Cape First Team', 'Liliana', 'de Freitas', 'Fullback', '2000-05-10'),
('MA582', 'Western Cape First Team', 'Marcus', 'Alexander', 'Fullback', '2002-11-17'),
('MB567', 'Mpumalanga First Team', 'Millie', 'Brown', 'Midfielder', '2003-09-26'),
('MB678', 'Free State First Team', 'Mario', 'Biscuits', 'Forward', '2001-05-06'),
('MD343', 'Eastern Cape First Team', 'Maria', 'da Costa', 'Fullback', '1998-02-25'),
('MF56', 'Gauteng First Team', 'Martin', 'Freeman', 'Midfielder', '0000-00-00'),
('MH356', 'Mpumalanga First Team', 'Maya', 'Hawke', 'Fullback', '2001-12-21'),
('ML001', 'Eastern Cape First Team', 'Mario', 'Luigi', 'Midfielder', '1998-10-08'),
('MS102', 'KZN First Team', 'Miranda', 'Singhs', 'Midfielder', '2003-07-30'),
('MT977', 'Free State First Team', 'Meyer', 'Thyra', 'Right Wing', '1997-06-16'),
('MW101', 'Eastern Cape First Team', 'Malia', 'Wilde', 'Midfielder', '2001-08-29'),
('MW567', 'Free State First Team', 'Macey', 'Williams', 'Forward', '2001-06-06'),
('ND349', 'Mpumalanga First Team', 'Natalia', 'Dyer', 'Sweeper', '1997-12-23'),
('NG780', 'North West First Team', 'Nelly', 'Grazer', 'Fullback', '2003-09-07'),
('NM223', 'North West First Team', 'Noel', 'Miller', 'Forward', '2000-01-25'),
('NS101', 'Eastern Cape First Team', 'Naomi', 'Scott', 'Forward', '2000-01-04'),
('NT234', 'Toronto Maple Leaves', 'Nooijer', 'Teun', 'Sweeper', '1996-02-01'),
('OI901', 'North West First Team', 'Oscar', 'Isaacs', 'Forward', '2000-06-29'),
('OR607', 'Carolina Hurricanes', 'Olivia', 'Rodrigo', 'Midfielder', '2003-07-06'),
('RB567', 'KZN First Team', 'Rebecca', 'Black', 'Midfielder', '2004-06-28'),
('RC534', 'Gauteng First Team', 'Ric', 'Charlesworth', 'Midfielder', '1996-12-21'),
('RE221', 'North West First Team', 'Ross', 'Emiliano', 'Back', '1992-11-06'),
('RM495', 'Western Cape First Team', 'Ronan', 'Michael', 'Midfielder', '1999-05-08'),
('RT556', 'Free State First Team', 'Ramirez', 'Taura', 'Right Wing', '1986-09-28'),
('RW705', 'Carolina Hurricanes', 'Ryan', 'Wesley', 'Fullback', '2001-09-28'),
('SB128', 'Toronto Maple Leaves', 'Susanna', 'Blades', 'Forward', '2003-07-06'),
('SB670', 'North West First Team', 'Sirius', 'Black', 'Fullback', '2001-06-29'),
('SC123', 'Eastern Cape First Team', 'Sarah', 'Chase', 'Forward', '2000-09-26'),
('SD348', 'Carolina Hurricanes', 'Sophie', 'Durandt', 'Fullback', '1998-06-04'),
('SF201', 'Toronto Maple Leaves', 'Savannah', 'Fields', 'Fullback', '2002-04-08'),
('SG456', 'KZN First Team', 'Sophie', 'Gardner', 'Forward', '1999-05-13'),
('SJ192', 'KZN First Team', 'Sarah', 'Jackman', 'Forward', '2000-05-08'),
('SK123', 'Gauteng First Team', 'Sebastian', 'King', 'Midfielder', '1999-05-08'),
('SL301', 'Carolina Hurricanes', 'Stacy', 'Long', 'Fullback', '0000-00-00'),
('SM103', 'Western Cape First Team', 'Sam', 'Markus', 'Goalie', '2000-06-12'),
('SP456', 'Gauteng First Team', 'Shannon', 'Potgieter', 'Fullback', '2000-11-23'),
('SR234', 'Carolina Hurricanes', 'Sandra', 'Reef', 'Forward', '2003-11-06'),
('SS146', 'KZN First Team', 'Sadie', 'Sink', 'Midfielder', '2000-09-21'),
('SS402', 'Free State First Team', 'Sarah', 'Silverman', 'MidFielder', '2002-11-11'),
('ST341', 'Toronto Maple Leaves', 'Sophie', 'Turner', 'Fullback', '1999-08-09'),
('SW457', 'Eastern Cape First Team', 'Serena', 'Williams', 'Fullback', '2001-02-01'),
('TA129', 'North West First Team', 'Turner', 'Angelo', 'Back', '2000-07-16'),
('TF127', 'Gauteng First Team', 'Thomas', 'Fuller', 'Forward', '1996-01-03'),
('TK424', 'Mpumalanga First Team', 'Ties', 'Kruize', 'Forward', '1997-02-24'),
('TK445', 'Northern Cape First Team', 'Holmes', 'Khalila', 'Goalie', '2002-04-09'),
('TL463', 'Gauteng First Team', 'Tamryn', 'Labuschagne', 'Fullback', '2002-05-03'),
('TM345', 'Western Cape First Team', 'Tamlyn', 'McCabe', 'Forward', '2001-08-07'),
('TM456', 'Western Cape First Team', 'Taydin', 'Marx', 'Sweeper', '2002-03-07'),
('TS917', 'Carolina Hurricanes', 'Tayla', 'Sebastian', 'Forward', '2000-03-17'),
('VL435', 'Northern Cape First Team', 'Veronica', 'Lodge', 'Sweeper', '2000-04-08'),
('VM192', 'North West First Team', 'Veronica', 'Mills', 'Fullback', '2003-07-25'),
('WA978', 'Northern Cape First Team', 'Ward', 'Anil', 'Goalie', '2002-10-30'),
('WL985', 'Carolina Hurricanes', 'William', 'Linley', 'Forward', '1999-05-09');

-- --------------------------------------------------------

--
-- Table structure for table `player_stats`
--

CREATE TABLE `player_stats` (
  `Player_id` varchar(6) NOT NULL,
  `Total_assists` int(10) NOT NULL,
  `Total_goals` int(10) NOT NULL,
  `Red_cards` int(10) NOT NULL,
  `Yellow_cards` int(10) NOT NULL,
  `Green_cards` int(10) NOT NULL,
  `Games_played` int(10) NOT NULL,
  `Player_rating` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `player_stats`
--

INSERT INTO `player_stats` (`Player_id`, `Total_assists`, `Total_goals`, `Red_cards`, `Yellow_cards`, `Green_cards`, `Games_played`, `Player_rating`) VALUES
('AM120', 30, 22, 5, 8, 20, 39, 2),
('AS128', 40, 23, 3, 10, 15, 32, 3),
('BB234', 55, 21, 15, 22, 34, 47, 2),
('BF808', 3, 22, 5, 2, 14, 76, 2),
('BM124', 53, 29, 8, 7, 25, 43, 2),
('BM479', 25, 21, 11, 0, 30, 41, 2),
('BS567', 3, 22, 5, 2, 14, 76, 2),
('BT459', 35, 16, 7, 2, 20, 42, 2),
('BW362', 22, 20, 15, 16, 34, 37, 2),
('CF658', 40, 23, 3, 10, 15, 32, 3),
('CJ346', 32, 35, 7, 12, 25, 61, 5),
('CL234', 40, 17, 1, 3, 15, 40, 3),
('CL596', 19, 13, 12, 17, 29, 33, 4),
('CM356', 29, 12, 14, 15, 34, 40, 2),
('CM439', 27, 21, 9, 24, 24, 35, 4),
('CM457', 62, 16, 3, 1, 20, 47, 2),
('CS891', 19, 13, 12, 17, 29, 33, 4),
('DE346', 12, 15, 6, 3, 20, 30, 4),
('DF890', 12, 15, 6, 3, 20, 30, 4),
('DJ567', 32, 9, 4, 3, 15, 38, 3),
('DM456', 42, 34, 9, 10, 30, 68, 2),
('DM901', 50, 16, 3, 1, 20, 47, 2),
('DO450', 32, 35, 7, 12, 25, 61, 5),
('EA457', 52, 17, 1, 3, 15, 40, 3),
('EP506', 20, 23, 3, 10, 15, 32, 3),
('FF000', 0, 15, 2, 3, 9, 72, 3),
('FF450', 32, 9, 4, 3, 15, 38, 3),
('FI101', 0, 15, 2, 3, 9, 72, 3),
('FL346', 40, 23, 3, 10, 15, 32, 3),
('FL349', 40, 23, 3, 10, 15, 32, 3),
('FL468', 19, 13, 12, 17, 29, 33, 4),
('FW256', 19, 13, 12, 17, 29, 33, 4),
('GC580', 0, 15, 2, 3, 9, 72, 3),
('GD468', 52, 17, 1, 3, 15, 40, 3),
('GE457', 40, 23, 3, 10, 15, 32, 3),
('GM102', 50, 16, 3, 1, 20, 47, 2),
('GM456', 50, 16, 3, 1, 20, 47, 2),
('GR467', 32, 9, 4, 3, 15, 38, 3),
('GS123', 20, 23, 3, 10, 15, 32, 3),
('HB450', 53, 10, 4, 2, 20, 48, 3),
('HM568', 29, 12, 14, 15, 34, 40, 2),
('HO108', 39, 21, 9, 24, 24, 35, 4),
('HS568', 22, 20, 15, 16, 34, 37, 2),
('IJ356', 32, 35, 7, 12, 25, 61, 5),
('JB120', 59, 1, 6, 14, 36, 78, 2),
('JB293', 58, 2, 14, 35, 45, 73, 2),
('JD134', 25, 1, 14, 29, 45, 63, 2),
('JD789', 25, 1, 14, 29, 45, 63, 2),
('JG459', 38, 3, 6, 15, 31, 68, 2),
('JI563', 38, 4, 6, 15, 31, 68, 2),
('JJ245', 38, 2, 6, 15, 31, 68, 2),
('JJ567', 38, 23, 9, 24, 41, 91, 2),
('JK245', 26, 11, 5, 22, 31, 62, 2),
('JM507', 48, 22, 11, 22, 46, 98, 2),
('JN678', 60, 2, 6, 16, 36, 78, 3),
('JO230', 25, 1, 14, 29, 45, 63, 2),
('JP103', 46, 11, 5, 22, 31, 62, 2),
('JR123', 38, 11, 5, 22, 31, 62, 2),
('JR235', 46, 11, 5, 22, 31, 62, 2),
('JS340', 58, 11, 5, 22, 31, 62, 2),
('JV124', 18, 3, 8, 15, 36, 60, 2),
('JW123', 26, 11, 5, 22, 31, 62, 2),
('KJ231', 20, 23, 3, 10, 15, 32, 3),
('KM111', 42, 8, 6, 1, 20, 45, 2),
('KM345', 42, 34, 9, 10, 30, 68, 2),
('KS347', 40, 17, 1, 3, 15, 40, 3),
('KY601', 32, 35, 7, 12, 25, 61, 5),
('LD230', 39, 21, 9, 24, 24, 35, 4),
('MA582', 19, 13, 12, 17, 29, 33, 4),
('MB567', 45, 2, 7, 2, 20, 46, 3),
('MB678', 45, 28, 10, 11, 30, 69, 3),
('MD343', 27, 21, 9, 24, 24, 35, 4),
('MF56', 40, 17, 1, 3, 15, 40, 3),
('MH356', 19, 13, 12, 17, 29, 33, 4),
('ML001', 40, 17, 1, 3, 15, 40, 3),
('MS102', 32, 9, 4, 3, 15, 38, 3),
('MW101', 32, 9, 4, 3, 15, 38, 3),
('MW567', 32, 35, 7, 12, 25, 61, 5),
('ND349', 20, 23, 3, 10, 15, 32, 3),
('NG780', 19, 13, 12, 17, 29, 33, 4),
('NM223', 62, 22, 5, 8, 20, 39, 2),
('NS101', 52, 23, 3, 10, 15, 32, 3),
('OI901', 52, 23, 3, 10, 15, 32, 3),
('OR607', 32, 9, 4, 3, 15, 38, 3),
('RB567', 45, 2, 7, 2, 20, 46, 3),
('RM495', 50, 16, 3, 1, 20, 47, 2),
('RW705', 19, 13, 12, 17, 29, 33, 4),
('SB128', 45, 28, 10, 11, 30, 69, 3),
('SB670', 32, 6, 15, 16, 34, 41, 3),
('SC123', 52, 23, 3, 10, 15, 32, 3),
('SD348', 27, 21, 9, 24, 24, 35, 4),
('SF201', 19, 13, 12, 17, 29, 33, 4),
('SG456', 40, 23, 3, 10, 15, 32, 3),
('SJ192', 52, 23, 3, 10, 15, 32, 3),
('SK123', 40, 17, 1, 3, 15, 40, 3),
('SL301', 27, 21, 9, 24, 24, 35, 4),
('SM103', 30, 22, 5, 8, 20, 39, 2),
('SP456', 39, 21, 9, 24, 24, 35, 4),
('SS146', 52, 17, 1, 3, 15, 40, 3),
('SS402', 32, 9, 4, 3, 15, 38, 3),
('ST341', 27, 21, 9, 24, 24, 35, 4),
('SW457', 19, 13, 12, 17, 29, 33, 4),
('TF127', 40, 23, 3, 10, 15, 32, 3),
('TL463', 19, 13, 12, 17, 29, 33, 4),
('TM345', 42, 34, 9, 10, 30, 68, 2),
('TM456', 22, 14, 8, 1, 25, 37, 2),
('TS917', 52, 23, 3, 10, 15, 32, 3),
('VL435', 32, 23, 3, 10, 15, 32, 3),
('VM192', 29, 12, 14, 15, 34, 40, 2),
('WL985', 40, 23, 3, 10, 15, 32, 3);

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE `teams` (
  `Team_name` varchar(255) NOT NULL,
  `Coach_id` int(11) NOT NULL,
  `Team_Captain` varchar(45) NOT NULL,
  `Team_Origin` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `teams`
--

INSERT INTO `teams` (`Team_name`, `Coach_id`, `Team_Captain`, `Team_Origin`) VALUES
('Carolina Hurricanes', 12, 'FF450', 'Carolina'),
('Eastern Cape First Team', 3, 'JP103', 'Eastern Cape'),
('Free State First Team', 4, 'IJ356', 'Free State'),
('Gauteng First Team', 13, 'CL596', 'Gauteng'),
('KZN First Team', 10, 'CF658', 'KwaZulu-Natal'),
('Mpumalanga First Team', 7, 'CJ346', 'Mpumalanga'),
('North West First Team', 14, 'BM124', 'North West'),
('Northern Cape First Team', 8, 'AS128', 'Northern Cape'),
('Toronto Maple Leaves', 11, 'FL349', 'Toronto'),
('Western Cape First Team', 2, 'JM507', 'Western Cape');

-- --------------------------------------------------------

--
-- Table structure for table `team_stats`
--

CREATE TABLE `team_stats` (
  `Team_Name` varchar(255) NOT NULL,
  `Cards_issued` tinyint(255) UNSIGNED NOT NULL,
  `Games_played` int(10) UNSIGNED NOT NULL,
  `Shots_on_goal` int(10) UNSIGNED NOT NULL,
  `Shots_on_target` int(10) UNSIGNED NOT NULL,
  `Goal_accuracy` float(65,1) UNSIGNED NOT NULL,
  `Team_rating` int(5) UNSIGNED NOT NULL,
  `Team_wins` int(10) UNSIGNED NOT NULL,
  `Team_loses` int(10) UNSIGNED NOT NULL,
  `Team_draws` int(10) UNSIGNED NOT NULL,
  `Goals_conceded` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `team_stats`
--

INSERT INTO `team_stats` (`Team_Name`, `Cards_issued`, `Games_played`, `Shots_on_goal`, `Shots_on_target`, `Goal_accuracy`, `Team_rating`, `Team_wins`, `Team_loses`, `Team_draws`, `Goals_conceded`) VALUES
('Carolina Hurricanes', 2, 8, 4, 7, 57.1, 3, 5, 3, 0, 8),
('Free State First Team', 2, 6, 3, 4, 75.0, 4, 4, 2, 0, 6),
('Gauteng First Team', 4, 3, 4, 5, 80.0, 4, 2, 1, 0, 4),
('KZN First Team', 2, 4, 5, 6, 83.0, 5, 4, 0, 0, 2),
('Mpumalanga First Team', 1, 3, 9, 10, 90.0, 5, 3, 0, 0, 0),
('North West First Team', 1, 7, 7, 10, 70.0, 4, 6, 1, 0, 3),
('Northern Cape First Team', 3, 1, 4, 5, 80.0, 5, 1, 0, 0, 4),
('Toronto Maple Leaves', 3, 3, 6, 7, 85.7, 4, 2, 1, 0, 4),
('Western Cape First Team', 4, 3, 6, 9, 66.6, 3, 2, 1, 0, 3);

-- --------------------------------------------------------

--
-- Table structure for table `tournement`
--

CREATE TABLE `tournement` (
  `Tournament_ID` int(5) NOT NULL,
  `Tournament_Name` mediumtext DEFAULT NULL,
  `Tournament_Season` varchar(45) NOT NULL,
  `Tournament_Location_Country` varchar(255) NOT NULL,
  `Tournament_Location_City` varchar(255) DEFAULT NULL,
  `Tournament_Winner` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tournement`
--

INSERT INTO `tournement` (`Tournament_ID`, `Tournament_Name`, `Tournament_Season`, `Tournament_Location_Country`, `Tournament_Location_City`, `Tournament_Winner`) VALUES
(25987, 'Premier League', '2022/2023', 'South Africa', 'Pretoria', 'Western Cape First Team'),
(32154, 'National Hockey Championship', '2022/2023', 'South Africa', 'Cape Town', NULL),
(32545, 'International Hockey Championships', '2023/2024', 'Canada', 'Toronto', NULL),
(45678, 'Premier League', '2018/2019', 'South Africa', 'Pretoria', 'KZN First Team'),
(56876, 'South African Hockey League', '2019/2020', 'South Africa', 'Johannesburg', 'Western Cape First Team');

-- --------------------------------------------------------

--
-- Table structure for table `umpire`
--

CREATE TABLE `umpire` (
  `Umpire_licence` int(10) UNSIGNED NOT NULL,
  `Name` mediumtext NOT NULL,
  `Surname` varchar(255) NOT NULL,
  `Games` int(11) NOT NULL,
  `Age` tinyint(60) NOT NULL,
  `Experience` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `umpire`
--

INSERT INTO `umpire` (`Umpire_licence`, `Name`, `Surname`, `Games`, `Age`, `Experience`) VALUES
(1005060313, 'Johnathon', 'Smith', 50, 45, 15),
(1234857453, 'Kathrine', 'James', 20, 30, 3),
(1359867350, 'Katie', 'Warren', 13, 26, 3),
(1526849357, 'Mariah', 'Stef', 25, 25, 6),
(1827394445, 'Matthew', 'Mole', 15, 36, 6),
(2036549287, 'Joseph', 'Grant', 13, 28, 2),
(2065874697, 'Emily', 'Blunt', 22, 30, 8),
(4294967295, 'Tammy', 'Wilkins', 30, 56, 16);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `First_Name` varchar(45) NOT NULL,
  `Last_Name` varchar(45) NOT NULL,
  `Email` varchar(45) NOT NULL,
  `Password` varchar(300) NOT NULL,
  `is_admin` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `First_Name`, `Last_Name`, `Email`, `Password`, `is_admin`) VALUES
(16, 'Eunice', 'Ntjana', 'e.ntjana@yahoo.com', '$2y$10$fAHe3n6rRlKseSUfBw1Z9upgy7LowrdtFltwzsGjdPzJ.EehujvuS', 'No'),
(17, 'Lenny', 'Thobejane', 'Lennythobejane@gmail.com', '$2y$10$f/CsKOLSssLCZ6WzDhh.WufkmP9o/HDehjizyjR/aoivV9OxvBORK', 'Yes');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `coaches`
--
ALTER TABLE `coaches`
  ADD PRIMARY KEY (`Coaches_id`),
  ADD KEY `fk_team_name_idx` (`Team_name`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_Events_game_id_idx` (`Game_id`);

--
-- Indexes for table `events_corner`
--
ALTER TABLE `events_corner`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_corner_player_id_idx` (`Player_id`);

--
-- Indexes for table `event_fouls`
--
ALTER TABLE `event_fouls`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_event_foul_type_idx` (`Foul_type`),
  ADD KEY `fk_event_fouls_foul_commiter_idx` (`Foul_Commiter`);

--
-- Indexes for table `event_hits`
--
ALTER TABLE `event_hits`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_hit_event_player_id_idx` (`Player_id`);

--
-- Indexes for table `event_shots`
--
ALTER TABLE `event_shots`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_shots_shot_taker_idx` (`Shot_taker`);

--
-- Indexes for table `event_substitution`
--
ALTER TABLE `event_substitution`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_Subs_player_off_idx` (`Player_off`),
  ADD KEY `fk_Subs_player_on_idx` (`Player_on`);

--
-- Indexes for table `games`
--
ALTER TABLE `games`
  ADD PRIMARY KEY (`Games_id`),
  ADD KEY `fk_umpire_licence_idx` (`Umpire_licence`),
  ADD KEY `fk_tournement_id_idx` (`tournament_id`),
  ADD KEY `fk_team1_idx` (`Team_1`),
  ADD KEY `fk_team2_idx` (`Team_2`);

--
-- Indexes for table `game_stats`
--
ALTER TABLE `game_stats`
  ADD PRIMARY KEY (`Game_id`),
  ADD KEY `fk_game_winner_idx` (`Game_winner`),
  ADD KEY `fk_game_loser_idx` (`Game_loser`);

--
-- Indexes for table `players`
--
ALTER TABLE `players`
  ADD PRIMARY KEY (`Player_id`),
  ADD KEY `fk_team_name_idx` (`Team_name`),
  ADD KEY `fk_teamname_idx` (`Team_name`);

--
-- Indexes for table `player_stats`
--
ALTER TABLE `player_stats`
  ADD PRIMARY KEY (`Player_id`);

--
-- Indexes for table `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`Team_name`),
  ADD KEY `fk_coaches_id_idx` (`Coach_id`),
  ADD KEY `fk_captain_idx` (`Team_Captain`);

--
-- Indexes for table `team_stats`
--
ALTER TABLE `team_stats`
  ADD PRIMARY KEY (`Team_Name`);

--
-- Indexes for table `tournement`
--
ALTER TABLE `tournement`
  ADD PRIMARY KEY (`Tournament_ID`);

--
-- Indexes for table `umpire`
--
ALTER TABLE `umpire`
  ADD PRIMARY KEY (`Umpire_licence`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `Password_UNIQUE` (`Password`),
  ADD UNIQUE KEY `Email_UNIQUE` (`Email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `coaches`
--
ALTER TABLE `coaches`
  MODIFY `Coaches_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=138;

--
-- AUTO_INCREMENT for table `events_corner`
--
ALTER TABLE `events_corner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=138;

--
-- AUTO_INCREMENT for table `event_fouls`
--
ALTER TABLE `event_fouls`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=205;

--
-- AUTO_INCREMENT for table `event_shots`
--
ALTER TABLE `event_shots`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

--
-- AUTO_INCREMENT for table `event_substitution`
--
ALTER TABLE `event_substitution`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=133;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `coaches`
--
ALTER TABLE `coaches`
  ADD CONSTRAINT `fk_team_name` FOREIGN KEY (`Team_name`) REFERENCES `teams` (`Team_name`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `events`
--
ALTER TABLE `events`
  ADD CONSTRAINT `fk_Events_game_id` FOREIGN KEY (`Game_id`) REFERENCES `games` (`Games_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `events_corner`
--
ALTER TABLE `events_corner`
  ADD CONSTRAINT `fk_corner_player_id` FOREIGN KEY (`Player_id`) REFERENCES `players` (`Player_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_events_key` FOREIGN KEY (`id`) REFERENCES `events` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `event_fouls`
--
ALTER TABLE `event_fouls`
  ADD CONSTRAINT `fk_event_fouls_foul_commiter` FOREIGN KEY (`Foul_Commiter`) REFERENCES `players` (`Player_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `event_hits`
--
ALTER TABLE `event_hits`
  ADD CONSTRAINT `fk_events_id1` FOREIGN KEY (`id`) REFERENCES `events` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_hit_event_player_id` FOREIGN KEY (`Player_id`) REFERENCES `players` (`Player_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `event_substitution`
--
ALTER TABLE `event_substitution`
  ADD CONSTRAINT `fk_Subs_player_off` FOREIGN KEY (`Player_off`) REFERENCES `players` (`Player_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Subs_player_on` FOREIGN KEY (`Player_on`) REFERENCES `players` (`Player_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_events_id` FOREIGN KEY (`id`) REFERENCES `events` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `games`
--
ALTER TABLE `games`
  ADD CONSTRAINT `fk_team1` FOREIGN KEY (`Team_1`) REFERENCES `teams` (`Team_name`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_team2` FOREIGN KEY (`Team_2`) REFERENCES `teams` (`Team_name`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tournement_id` FOREIGN KEY (`tournament_id`) REFERENCES `tournement` (`Tournament_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_umpire_licence` FOREIGN KEY (`Umpire_licence`) REFERENCES `umpire` (`Umpire_licence`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `game_stats`
--
ALTER TABLE `game_stats`
  ADD CONSTRAINT `fk_Stats_game_id` FOREIGN KEY (`Game_id`) REFERENCES `games` (`Games_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_game_loser` FOREIGN KEY (`Game_loser`) REFERENCES `teams` (`Team_name`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_game_winner` FOREIGN KEY (`Game_winner`) REFERENCES `teams` (`Team_name`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `players`
--
ALTER TABLE `players`
  ADD CONSTRAINT `fk_teamname` FOREIGN KEY (`Team_name`) REFERENCES `teams` (`Team_name`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `player_stats`
--
ALTER TABLE `player_stats`
  ADD CONSTRAINT `fk_Stats_player_id` FOREIGN KEY (`Player_id`) REFERENCES `players` (`Player_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `teams`
--
ALTER TABLE `teams`
  ADD CONSTRAINT `fk_captain` FOREIGN KEY (`Team_Captain`) REFERENCES `players` (`Player_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_coaches_id` FOREIGN KEY (`Coach_id`) REFERENCES `coaches` (`Coaches_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `team_stats`
--
ALTER TABLE `team_stats`
  ADD CONSTRAINT `fk_Stat_teamName` FOREIGN KEY (`Team_Name`) REFERENCES `teams` (`Team_name`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
