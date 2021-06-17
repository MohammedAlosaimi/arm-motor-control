-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 17, 2021 at 06:54 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `arm_control`
--

-- --------------------------------------------------------

--
-- Table structure for table `motor_angle`
--

CREATE TABLE `motor_angle` (
  `id` int(11) NOT NULL DEFAULT 1,
  `motor1` int(11) NOT NULL DEFAULT 90,
  `motor2` int(11) NOT NULL DEFAULT 90,
  `motor3` int(11) NOT NULL DEFAULT 90,
  `motor4` int(11) NOT NULL DEFAULT 90,
  `motor5` int(11) NOT NULL DEFAULT 90,
  `motor6` int(11) NOT NULL DEFAULT 90
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `motor_angle`
--

INSERT INTO `motor_angle` (`id`, `motor1`, `motor2`, `motor3`, `motor4`, `motor5`, `motor6`) VALUES
(1, 72, 117, 58, 113, 90, 141);

-- --------------------------------------------------------

--
-- Table structure for table `run`
--

CREATE TABLE `run` (
  `id` int(11) NOT NULL DEFAULT 1,
  `on_off` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `run`
--

INSERT INTO `run` (`id`, `on_off`) VALUES
(1, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `motor_angle`
--
ALTER TABLE `motor_angle`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `run`
--
ALTER TABLE `run`
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
