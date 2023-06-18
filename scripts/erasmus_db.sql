-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 18, 2023 at 12:13 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `erasmus_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `applications_date`
--

CREATE TABLE `applications_date` (
  `start_d` date DEFAULT NULL,
  `end_d` date DEFAULT NULL,
  `announce` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `applications_date`
--

INSERT INTO `applications_date` (`start_d`, `end_d`, `announce`) VALUES
('2023-06-12', '2023-06-17', 1);

-- --------------------------------------------------------

--
-- Table structure for table `universities`
--

CREATE TABLE `universities` (
  `uni_id` bigint(20) UNSIGNED NOT NULL,
  `uni_name` varchar(20) NOT NULL,
  `country` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `universities`
--

INSERT INTO `universities` (`uni_id`, `uni_name`, `country`) VALUES
(1, 'Michigan', 'USA'),
(2, 'Harvard', 'USA'),
(3, 'M.I.T.', 'USA'),
(4, 'Oxford', 'England'),
(5, 'Cambridge', 'England'),
(6, 'Stanford', 'USA');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `fname` varchar(20) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `a_m` varchar(13) NOT NULL,
  `tel` varchar(10) NOT NULL,
  `email` varchar(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `pass` varchar(15) NOT NULL,
  `user_type_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `fname`, `lname`, `a_m`, `tel`, `email`, `username`, `pass`, `user_type_id`) VALUES
(1, 'Vasilis', 'Koulouris', '2022202000101', '6981386632', 'dit20101@go.uop.gr', 'kouvas', 'kouvas$', 2),
(4, 'A', 'B', '2022202000945', '6987451234', 'A@B.AB', 'AB', 'BASILOPOULOS!', 2),
(6, 'gdrkurhuego', 'ehthe', '2022202000690', '6918229822', 'a@ksubf.gr', 'lol', '!lol123', 2),
(7, 'default_admin', '-', '2022999999999', '--', 'admin@mail.gr', 'default_admin', 'def_admin_p!', 3);

-- --------------------------------------------------------

--
-- Table structure for table `user_types`
--

CREATE TABLE `user_types` (
  `user_type_id` bigint(20) UNSIGNED NOT NULL,
  `user_type` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_types`
--

INSERT INTO `user_types` (`user_type_id`, `user_type`) VALUES
(1, 'guest'),
(2, 'registered'),
(3, 'administrator');

-- --------------------------------------------------------

--
-- Table structure for table `usr_aplications`
--

CREATE TABLE `usr_aplications` (
  `application_id` bigint(20) UNSIGNED NOT NULL,
  `fname` varchar(20) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `a_m` varchar(13) NOT NULL,
  `pass_perc` float NOT NULL,
  `avrg` float NOT NULL,
  `eng_lan_certif` varchar(2) NOT NULL,
  `xtr_lang_cert` varchar(3) DEFAULT NULL,
  `f_choice` varchar(40) NOT NULL,
  `s_choice` varchar(40) DEFAULT NULL,
  `t_choice` varchar(40) DEFAULT NULL,
  `marks` varchar(40) NOT NULL,
  `eng_lan_certif_file` varchar(40) NOT NULL,
  `xtr_lang_cert_file` text DEFAULT NULL,
  `approved` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `usr_aplications`
--

INSERT INTO `usr_aplications` (`application_id`, `fname`, `lname`, `a_m`, `pass_perc`, `avrg`, `eng_lan_certif`, `xtr_lang_cert`, `f_choice`, `s_choice`, `t_choice`, `marks`, `eng_lan_certif_file`, `xtr_lang_cert_file`, `approved`) VALUES
(23, 'Vasilis', 'Koulouris', '2022202000101', 50, 5, 'A1', 'no', 'Michigan', '', '', 'eramsus-logo.png', 'EU-logo.png', 'download_button.png,eramsus-logo.png,erasmus.png', 0),
(27, 'A', 'B', '2022202000945', 70.3, 8.4, 'B2', 'yes', 'Michigan', 'Cambridge', '', 'eramsus-logo.png', 'EU-logo.png', 'download_button.png,uoplogo.png', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `universities`
--
ALTER TABLE `universities`
  ADD UNIQUE KEY `uni_id` (`uni_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD UNIQUE KEY `user_id` (`user_id`);

--
-- Indexes for table `user_types`
--
ALTER TABLE `user_types`
  ADD UNIQUE KEY `user_type_id` (`user_type_id`);

--
-- Indexes for table `usr_aplications`
--
ALTER TABLE `usr_aplications`
  ADD UNIQUE KEY `application_id` (`application_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `universities`
--
ALTER TABLE `universities`
  MODIFY `uni_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user_types`
--
ALTER TABLE `user_types`
  MODIFY `user_type_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `usr_aplications`
--
ALTER TABLE `usr_aplications`
  MODIFY `application_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
