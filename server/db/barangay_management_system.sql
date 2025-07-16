-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 19, 2025 at 01:00 AM
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
-- Database: `barangay_management_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `blotter`
--

CREATE TABLE `blotter` (
  `id` int(11) NOT NULL,
  `complainant` varchar(100) DEFAULT NULL,
  `respondent` varchar(100) DEFAULT NULL,
  `victim` varchar(100) DEFAULT NULL,
  `type` varchar(100) DEFAULT NULL,
  `location` varchar(100) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `time` time DEFAULT NULL,
  `details` varchar(10000) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `blotter`
--

INSERT INTO `blotter` (`id`, `complainant`, `respondent`, `victim`, `type`, `location`, `date`, `time`, `details`, `status`, `created_at`) VALUES
(20, 'Kayzel', 'Mario', 'Kayzel', 'Incident', 'Quezon City', '2021-01-07', '00:12:00', 'Iwan Ko', 'Settled', '2025-06-02 07:09:43'),
(22, 'Juan dela Cruz', 'Peter', 'Juan', 'Amicable', 'Manila', '2021-01-01', '22:16:00', '   ayaw magbayad ng utang.. hehhheee   ', 'Active', '2025-06-02 07:09:43'),
(26, 'Ron', 'Cajan', 'ROn Cajan', 'Amicable', 'Looc', '2021-04-30', '13:09:00', 'Donec sollicitudin molestie malesuada. Curabitur non nulla sit amet nisl tempus convallis quis ac lectus. Sed porttitor lectus nibh. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec velit neque, auctor sit amet aliquam vel, ullamcorper sit amet ligula.', 'Active', '2025-06-02 07:09:43');

-- --------------------------------------------------------

--
-- Table structure for table `brgy_info`
--

CREATE TABLE `brgy_info` (
  `id` int(11) NOT NULL,
  `province` varchar(100) DEFAULT NULL,
  `town` varchar(100) DEFAULT NULL,
  `brgy_name` varchar(50) DEFAULT NULL,
  `number` varchar(50) DEFAULT NULL,
  `city_logo` varchar(100) DEFAULT NULL,
  `brgy_logo` varchar(100) DEFAULT NULL,
  `mission` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `vision` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `brgy_info`
--

INSERT INTO `brgy_info` (`id`, `province`, `town`, `brgy_name`, `number`, `city_logo`, `brgy_logo`, `mission`, `vision`) VALUES
(1, 'Camarines Sur', 'Bula', 'Salvacion (Pob.)', '09163447342', 'IMG-684cd34493cd35.97528327.png', 'IMG-684cd34493ce36.29847013.png', 'Highly committed to accountable public service, shall formulate policies, programs, optimize generation and management resources, deliver equitably basic services thru participatory development process, promote industry and investment opportunities.', 'A progressive province with empowered people of distinct drive for sustained socio-economic growth tru agro-industrialization, enhanced tourism development and rational utilization of naturally endowed resources towards national and global competitive.');

-- --------------------------------------------------------

--
-- Table structure for table `chairmanship`
--

CREATE TABLE `chairmanship` (
  `id` int(11) NOT NULL,
  `title` varchar(45) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `chairmanship`
--

INSERT INTO `chairmanship` (`id`, `title`, `created_at`, `updated_at`) VALUES
(2, 'Presiding Officer', '2025-05-31 07:26:40', '2025-06-11 06:51:37'),
(3, 'Committee on Appropriation', '2025-05-31 07:26:40', '2025-06-10 04:51:31'),
(4, 'Committee on Peace & Order', '2025-05-31 07:26:40', '2025-05-31 07:26:40'),
(5, 'Committee on Health', '2025-05-31 07:26:40', '2025-05-31 07:26:40'),
(6, 'Committee on Education', '2025-05-31 07:26:40', '2025-05-31 07:26:40'),
(7, 'Committee on Rules', '2025-05-31 07:26:40', '2025-05-31 07:26:40'),
(8, 'Committee on Infra', '2025-05-31 07:26:40', '2025-05-31 07:26:40'),
(9, 'Committee on Solid Waste', '2025-05-31 07:26:40', '2025-05-31 07:26:40'),
(10, 'Committee on Sports', '2025-05-31 07:26:40', '2025-05-31 07:26:40');

-- --------------------------------------------------------

--
-- Table structure for table `officials`
--

CREATE TABLE `officials` (
  `id` int(11) NOT NULL,
  `status` enum('Active','Inactive') NOT NULL DEFAULT 'Active',
  `chairmanship_id` int(11) NOT NULL,
  `position_id` int(11) NOT NULL,
  `term_id` int(11) NOT NULL,
  `resident_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `officials`
--

INSERT INTO `officials` (`id`, `status`, `chairmanship_id`, `position_id`, `term_id`, `resident_id`, `created_at`, `updated_at`) VALUES
(34, 'Active', 6, 17, 4, 52, '2025-06-10 05:20:29', '2025-06-11 06:38:18'),
(37, 'Active', 9, 2, 4, 58, '2025-06-10 05:47:47', '2025-06-11 06:36:42'),
(38, 'Active', 7, 14, 4, 60, '2025-06-14 01:53:15', '2025-06-14 01:53:15');

-- --------------------------------------------------------

--
-- Table structure for table `official_term`
--

CREATE TABLE `official_term` (
  `id` int(11) NOT NULL,
  `start_term` date NOT NULL,
  `end_term` date NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `official_term`
--

INSERT INTO `official_term` (`id`, `start_term`, `end_term`, `created_at`, `updated_at`) VALUES
(4, '2025-06-20', '2025-06-25', '2025-06-10 05:01:22', '2025-06-11 06:48:17'),
(5, '2025-07-25', '2025-07-23', '2025-06-10 05:21:33', '2025-06-10 05:21:37');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(11) NOT NULL,
  `user` varchar(45) NOT NULL,
  `name` varchar(45) NOT NULL,
  `details` text NOT NULL,
  `amounts` decimal(10,2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `user`, `name`, `details`, `amounts`, `created_at`, `updated_at`) VALUES
(1, 'Zurick', 'ZurickShop', 'Certificate Of Indigency', 123.00, '2025-06-01 01:40:23', '2025-06-01 01:40:23'),
(2, 'Heize', 'ZurickShop', 'Barangay Certificate', 100.00, '2025-06-06 01:57:11', '2025-06-06 01:57:11');

-- --------------------------------------------------------

--
-- Table structure for table `permit`
--

CREATE TABLE `permit` (
  `id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `owner` text NOT NULL,
  `nature` varchar(45) NOT NULL,
  `applied` date NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `permit`
--

INSERT INTO `permit` (`id`, `name`, `owner`, `nature`, `applied`, `created_at`, `updated_at`) VALUES
(2, 'HeizeStore', 'Zurick Buita', 'E-commerce', '2025-06-18', '2025-06-01 12:16:05', '2025-06-11 06:40:29');

-- --------------------------------------------------------

--
-- Table structure for table `position`
--

CREATE TABLE `position` (
  `id` int(11) NOT NULL,
  `position` varchar(45) NOT NULL,
  `order` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `position`
--

INSERT INTO `position` (`id`, `position`, `order`, `created_at`, `updated_at`) VALUES
(2, 'Councilor 1', 2, '2025-05-31 07:29:12', '2025-06-10 04:30:23'),
(3, 'Councilor 2', 3, '2025-05-31 07:29:12', '2025-05-31 07:29:12'),
(9, 'Councilor 3', 4, '2025-05-31 07:29:12', '2025-05-31 07:29:12'),
(10, 'Councilor 4', 5, '2025-05-31 07:29:12', '2025-05-31 07:29:12'),
(11, 'Councilor 5', 6, '2025-05-31 07:29:12', '2025-05-31 07:29:12'),
(12, 'Councilor 6', 7, '2025-05-31 07:29:12', '2025-05-31 07:29:12'),
(13, 'Councilor 7', 8, '2025-05-31 07:29:12', '2025-05-31 07:29:12'),
(14, 'Secretary', 9, '2025-05-31 07:29:12', '2025-06-10 01:26:10'),
(16, 'Treasurer', 11, '2025-05-31 07:29:12', '2025-05-31 07:29:12'),
(17, 'Captain', 1, '2025-05-31 06:52:56', '2025-06-11 06:46:21');

-- --------------------------------------------------------

--
-- Table structure for table `purok`
--

CREATE TABLE `purok` (
  `id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `details` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `purok`
--

INSERT INTO `purok` (`id`, `name`, `details`, `created_at`, `updated_at`) VALUES
(26, '1', 'Purok 1', '2025-05-31 06:52:32', '2025-06-11 06:43:41'),
(27, '2', 'Purok 2', '2025-05-31 06:52:44', '2025-06-09 07:51:37'),
(28, '3', 'Purok 3', '2025-05-31 07:53:31', '2025-06-09 11:58:19'),
(29, '4', 'Purok 4', '2025-05-31 23:51:11', '2025-05-31 23:51:11'),
(30, '5', 'Purok 5', '2025-05-31 23:51:23', '2025-05-31 23:51:23');

-- --------------------------------------------------------

--
-- Table structure for table `residents`
--

CREATE TABLE `residents` (
  `id` int(11) NOT NULL,
  `national_id` varchar(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `citizenship` varchar(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `img` varchar(45) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `firstname` varchar(45) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `middlename` varchar(45) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `lastname` varchar(45) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `birthdate` date NOT NULL,
  `age` int(11) NOT NULL,
  `civilstatus` enum('single','married','widow') CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT 'single',
  `sex` enum('male','female') CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT 'male',
  `is_voter` enum('yes','no') NOT NULL DEFAULT 'no',
  `email` varchar(45) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `occupation` varchar(45) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `address` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `is_deceased` enum('yes','no') NOT NULL DEFAULT 'no',
  `purok_id` int(11) NOT NULL,
  `is_indigenous` enum('yes','no') NOT NULL DEFAULT 'yes',
  `salary` varchar(45) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `residents`
--

INSERT INTO `residents` (`id`, `national_id`, `citizenship`, `img`, `firstname`, `middlename`, `lastname`, `birthdate`, `age`, `civilstatus`, `sex`, `is_voter`, `email`, `occupation`, `address`, `is_deceased`, `purok_id`, `is_indigenous`, `salary`, `created_at`, `updated_at`) VALUES
(52, 'nid001', 'philippines', NULL, 'Koenji', 'michael', 'doe', '1990-01-01', 33, 'married', 'male', 'yes', 'john.doe1@example.com', 'engineer', '123 main st', 'no', 29, 'no', '50000', '2025-03-12 01:38:46', '2025-06-14 00:59:54'),
(53, 'nid002', 'philippines', NULL, 'jane', 'elizabeth', 'smith', '1985-02-02', 38, 'married', 'female', 'yes', 'jane.smith2@example.com', 'doctor', '456 elm st', 'no', 26, 'yes', '70000', '2025-02-06 01:38:46', '2025-06-06 01:38:46'),
(54, 'nid003', 'philippines', NULL, 'alice', 'marie', 'johnson', '1992-03-03', 31, 'single', 'female', 'yes', 'alice.johnson3@example.com', 'teacher', '789 oak st', 'no', 27, 'no', '40000', '2025-03-06 01:38:46', '2025-06-11 06:09:59'),
(55, 'nid004', 'philippines', NULL, 'bob', 'anthony', 'brown', '1980-04-04', 43, 'married', 'male', 'yes', 'bob.brown4@example.com', 'artist', '321 pine st', 'no', 27, 'no', '30000', '2025-02-06 01:38:46', '2025-06-06 01:38:46'),
(56, 'nid005', 'philippines', NULL, 'charlie', 'david', 'davis', '1975-05-05', 48, 'widow', 'male', 'no', 'charlie.davis5@example.com', 'chef', '654 maple st', 'no', 28, 'yes', '45000', '2025-02-06 01:38:46', '2025-06-06 01:38:46'),
(57, 'nid006', 'philippines', NULL, 'emily', 'rose', 'garcia', '1995-06-06', 28, 'single', 'female', 'yes', 'emily.garcia6@example.com', 'nurse', '147 spruce st', 'no', 28, 'no', '38000', '2025-03-06 01:38:46', '2025-06-06 01:38:46'),
(58, 'nid007', 'philippines', NULL, 'frank', 'james', 'martinez', '1988-07-07', 35, 'married', 'male', 'yes', 'frank.martinez7@example.com', 'electrician', '258 cedar st', 'no', 29, 'yes', '42000', '2025-05-06 01:38:46', '2025-06-06 01:38:46'),
(59, 'nid008', 'philippines', NULL, 'grace', 'ann', 'lopez', '1993-08-08', 30, 'single', 'female', 'yes', 'grace.lopez8@example.com', 'pharmacist', '369 fir st', 'no', 29, 'no', '55000', '2025-03-04 01:38:46', '2025-06-06 01:38:46'),
(60, 'nid009', 'philippines', NULL, 'henry', 'william', 'gonzalez', '1981-09-09', 42, 'single', 'male', 'yes', 'henry.gonzalez9@example.com', 'mechanic', '741 redwood st', 'no', 30, 'no', '47000', '2025-06-06 01:38:46', '2025-06-11 05:21:53'),
(61, 'nid010', 'philippines', NULL, 'isla', 'marie', 'wilson', '1996-10-10', 27, 'single', 'female', 'yes', 'isla.wilson10@example.com', 'designer', '852 willow st', 'no', 30, 'yes', '43000', '2025-05-06 01:38:46', '2025-06-11 05:59:01'),
(63, 'nid012', 'philippines', NULL, 'katie', 'louise', 'thomas', '1992-12-12', 31, 'single', 'female', 'yes', 'katie.thomas12@example.com', 'architect', '159 elmwood st', 'no', 26, 'yes', '58000', '2025-04-06 01:38:46', '2025-06-06 01:38:46'),
(64, 'nid013', 'philippines', NULL, 'leo', 'alexander', 'jackson', '1987-01-13', 36, 'married', 'male', 'yes', 'leo.jackson13@example.com', 'pilot', '753 poplar st', 'no', 27, 'no', '65000', '2025-05-10 01:38:46', '2025-06-06 01:38:46'),
(65, 'nid014', 'philippines', NULL, 'mia', 'sophia', 'white', '1994-02-14', 29, 'single', 'female', 'yes', 'mia.white14@example.com', 'writer', '357 birch st', 'no', 27, 'no', '40000', '2025-02-06 01:38:46', '2025-06-06 01:38:46'),
(66, 'nid015', 'philippines', NULL, 'nathan', 'paul', 'harris', '1985-03-15', 38, 'married', 'male', 'yes', 'nathan.harris15@example.com', 'chef', '951 maplewood st', 'no', 28, 'no', '46000', '2025-01-06 01:38:46', '2025-06-06 01:38:46'),
(67, 'nid016', 'philippines', NULL, 'olivia', 'grace', 'martin', '1991-04-16', 32, 'single', 'female', 'yes', 'olivia.martin16@example.com', 'teacher', '357 juniper st', 'no', 28, 'yes', '42000', '2025-01-06 01:38:46', '2025-06-06 01:38:46'),
(68, 'nid017', 'philippines', NULL, 'paul', 'edward', 'lee', '1989-05-17', 34, 'married', 'male', 'yes', 'paul.lee17@example.com', 'engineer', '258 redwood st', 'no', 29, 'no', '50000', '2025-01-06 01:38:46', '2025-06-06 01:38:46'),
(69, 'nid018', 'philippines', NULL, 'quinn', 'isabella', 'perez', '1993-06-18', 30, 'single', 'female', 'yes', 'quinn.perez18@example.com', 'nurse', '852 pinecone st', 'no', 29, 'yes', '39000', '2025-03-06 01:38:46', '2025-06-06 01:38:46'),
(70, 'nid019', 'philippines', NULL, 'ryan', 'matthew', 'clark', '1984-07-19', 39, 'married', 'male', 'yes', 'ryan.clark19@example.com', 'mechanic', '147 willow st', 'no', 30, 'no', '47000', '2025-01-06 01:38:46', '2025-06-06 01:38:46'),
(71, 'nid020', 'philippines', NULL, 'sophia', 'lynn', 'lewis', '1995-08-20', 28, 'single', 'female', 'yes', 'sophia.lewis20@example.com', 'designer', '369 chestnut st', 'no', 30, 'no', '43000', '2025-04-06 01:38:46', '2025-06-06 01:38:46'),
(72, 'nid021', 'philippines', NULL, 'thomas', 'henry', 'robinson', '1988-09-21', 35, 'married', 'male', 'yes', 'thomas.robinson21@example.com', 'developer', '741 spruce st', 'no', 26, 'no', '60000', '2025-05-06 01:38:46', '2025-06-06 01:38:46'),
(73, 'nid022', 'philippines', NULL, 'uma', 'victoria', 'walker', '1991-10-22', 32, 'single', 'female', 'yes', 'uma.walker22@example.com', 'architect', '963 elm st', 'no', 26, 'yes', '58000', '2025-01-06 01:38:46', '2025-06-06 01:38:46'),
(74, 'nid023', 'philippines', NULL, 'victor', 'james', 'young', '1986-11-23', 37, 'married', 'male', 'yes', 'victor.young23@example.com', 'pilot', '159 aspen st', 'no', 27, 'no', '65000', '2025-01-06 01:38:46', '2025-06-06 01:38:46'),
(75, 'nid024', 'philippines', NULL, 'wendy', 'anne', 'allen', '1994-12-24', 29, 'single', 'female', 'yes', 'wendy.allen24@example.com', 'writer', '753 juniper st', 'no', 27, 'no', '40000', '2025-01-06 01:38:46', '2025-06-06 01:38:46'),
(76, 'nid025', 'philippines', NULL, 'xavier', 'john', 'king', '1987-01-25', 36, 'married', 'male', 'yes', 'xavier.king25@example.com', 'chef', '357 redwood st', 'no', 28, 'no', '46000', '2025-05-06 01:38:46', '2025-06-06 01:38:46'),
(77, 'nid026', 'philippines', NULL, 'yara', 'nicole', 'scott', '1992-02-26', 31, 'single', 'female', 'yes', 'yara.scott26@example.com', 'teacher', '951 pine st', 'no', 28, 'yes', '42000', '2025-06-06 01:38:46', '2025-06-06 01:38:46'),
(78, 'nid027', 'philippines', NULL, 'zach', 'daniel', 'green', '1989-03-27', 34, 'married', 'male', 'yes', 'zach.green27@example.com', 'engineer', '258 elmwood st', 'no', 29, 'no', '50000', '2025-06-06 01:38:46', '2025-06-06 01:38:46'),
(79, 'nid028', 'philippines', NULL, 'amy', 'claire', 'adams', '1995-04-28', 28, 'single', 'female', 'yes', 'amy.adams28@example.com', 'nurse', '852 cedar st', 'no', 29, 'no', '39000', '2025-06-06 01:38:46', '2025-06-06 01:38:46'),
(80, 'nid029', 'philippines', NULL, 'brian', 'joseph', 'baker', '1984-05-29', 39, 'married', 'male', 'yes', 'brian.baker29@example.com', 'mechanic', '147 fir st', 'no', 30, 'yes', '47000', '2025-06-06 01:38:46', '2025-06-06 01:38:46'),
(81, 'nid030', 'philippines', NULL, 'catherine', 'elena', 'nelson', '1996-06-30', 27, 'single', 'female', 'yes', 'catherine.nelson30@example.com', 'designer', '369 redwood st', 'no', 30, 'no', '43000', '2025-06-06 01:38:46', '2025-06-06 01:38:46'),
(82, 'nid031', 'philippines', NULL, 'david', 'christopher', 'carter', '1990-07-01', 33, 'married', 'male', 'yes', 'david.carter31@example.com', 'developer', '741 juniper st', 'no', 26, 'no', '60000', '2025-06-06 01:38:46', '2025-06-06 01:38:46'),
(83, 'nid032', 'philippines', NULL, 'ella', 'grace', 'mitchell', '1993-08-02', 30, 'single', 'female', 'yes', 'ella.mitchell32@example.com', 'architect', '963 pinecone st', 'no', 26, 'yes', '58000', '2025-06-06 01:38:46', '2025-06-06 01:38:46'),
(84, 'nid033', 'philippines', NULL, 'fred', 'samuel', 'perez', '1987-09-03', 36, 'married', 'male', 'yes', 'fred.perez33@example.com', 'pilot', '159 willow st', 'no', 27, 'no', '65000', '2025-06-06 01:38:46', '2025-06-06 01:38:46'),
(85, 'nid034', 'philippines', NULL, 'gina', 'marie', 'roberts', '1994-10-04', 29, 'single', 'female', 'yes', 'gina.roberts34@example.com', 'writer', '753 chestnut st', 'no', 27, 'no', '40000', '2025-06-06 01:38:46', '2025-06-06 01:38:46'),
(86, 'nid035', 'philippines', NULL, 'harry', 'edward', 'turner', '1985-11-05', 38, 'married', 'male', 'yes', 'harry.turner35@example.com', 'chef', '357 spruce st', 'no', 28, 'no', '46000', '2025-06-06 01:38:46', '2025-06-06 01:38:46'),
(87, 'nid036', 'philippines', NULL, 'ivy', 'lynn', 'phillips', '1991-12-06', 32, 'single', 'female', 'yes', 'ivy.phillips36@example.com', 'teacher', '951 elmwood st', 'no', 28, 'yes', '42000', '2025-06-06 01:38:46', '2025-06-06 01:38:46'),
(88, 'nid037', 'philippines', NULL, 'jason', 'michael', 'campbell', '1989-01-07', 34, 'married', 'male', 'yes', 'jason.campbell37@example.com', 'engineer', '258 aspen st', 'no', 29, 'no', '50000', '2025-06-06 01:38:46', '2025-06-06 01:38:46'),
(89, 'nid038', 'philippines', NULL, 'kelly', 'anne', 'evans', '1995-02-08', 28, 'single', 'female', 'yes', 'kelly.evans38@example.com', 'nurse', '852 juniper st', 'no', 29, 'no', '39000', '2025-06-06 01:38:46', '2025-06-06 01:38:46'),
(90, 'nid039', 'philippines', NULL, 'liam', 'joseph', 'edwards', '1984-03-09', 39, 'married', 'male', 'yes', 'liam.edwards39@example.com', 'mechanic', '147 redwood st', 'no', 30, 'yes', '47000', '2025-06-06 01:38:46', '2025-06-06 01:38:46'),
(91, 'nid040', 'philippines', NULL, 'zoe', 'marie', 'williams', '2000-12-31', 22, 'single', 'female', 'yes', 'zoe.williams40@example.com', 'student', '999 birch st', 'no', 30, 'no', '20000', '2025-06-06 01:38:46', '2025-06-06 01:38:46');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `user_type` enum('admin','staff') NOT NULL DEFAULT 'admin',
  `avatar` varchar(45) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `user_type`, `avatar`, `created_at`, `updated_at`) VALUES
(11, 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'admin', 'IMG-68418c7501ea66.33696771.png', '2025-05-31 06:45:34', '2025-05-31 06:45:34'),
(37, 'zurick', '601be8a7db4306eb055f0f8849faac411c1814e7', 'staff', NULL, '2025-06-15 08:10:03', '2025-06-15 08:10:03');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blotter`
--
ALTER TABLE `blotter`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brgy_info`
--
ALTER TABLE `brgy_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chairmanship`
--
ALTER TABLE `chairmanship`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `officials`
--
ALTER TABLE `officials`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_officials_chairmanship` (`chairmanship_id`),
  ADD KEY `fk_officials_position1` (`position_id`),
  ADD KEY `fk_officials_term1` (`term_id`);

--
-- Indexes for table `official_term`
--
ALTER TABLE `official_term`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permit`
--
ALTER TABLE `permit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `position`
--
ALTER TABLE `position`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purok`
--
ALTER TABLE `purok`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `residents`
--
ALTER TABLE `residents`
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
-- AUTO_INCREMENT for table `blotter`
--
ALTER TABLE `blotter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `brgy_info`
--
ALTER TABLE `brgy_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `chairmanship`
--
ALTER TABLE `chairmanship`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `officials`
--
ALTER TABLE `officials`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `official_term`
--
ALTER TABLE `official_term`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `permit`
--
ALTER TABLE `permit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `position`
--
ALTER TABLE `position`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `purok`
--
ALTER TABLE `purok`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `residents`
--
ALTER TABLE `residents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `officials`
--
ALTER TABLE `officials`
  ADD CONSTRAINT `fk_officials_chairmanship` FOREIGN KEY (`chairmanship_id`) REFERENCES `chairmanship` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_officials_position1` FOREIGN KEY (`position_id`) REFERENCES `position` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_officials_term1` FOREIGN KEY (`term_id`) REFERENCES `official_term` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
