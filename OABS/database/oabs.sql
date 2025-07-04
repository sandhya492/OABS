-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 02, 2024 at 05:34 PM
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
-- Database: `oabs`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `mobile` bigint(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `mobile`) VALUES
(1, 'Admin User', 'admin@gmail.com', 'admin@123', 9898989898);

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `age` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mobile` bigint(20) NOT NULL,
  `date` date NOT NULL,
  `time` varchar(25) NOT NULL,
  `speciality` varchar(50) NOT NULL,
  `doctor` varchar(50) NOT NULL,
  `appointment` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`id`, `name`, `age`, `email`, `mobile`, `date`, `time`, `speciality`, `doctor`, `appointment`) VALUES
(12, 'Patient Name 2', 28, 'patient2@gmail.com', 9999999999, '2024-01-03', 'morning', 'Obstetrics and Gynaecology', 'Dr. Hemlata Patidar', '10:10'),
(13, 'Patient Name 3', 32, 'patient3@gmail.com', 8888888888, '2024-01-05', 'evening', 'Urologist', 'Dr. Kaushal Goyal', '13:0'),
(15, 'Patient Name 4', 18, 'patient4@gmail.com', 9999999999, '2024-01-05', 'morning', 'Urologist', 'Dr. Kaushal Goyal', '10:0'),
(16, 'Patient Name 1', 26, 'patient1@gmail.com', 9999999999, '2024-01-04', 'morning', 'Obstetrics and Gynaecology', 'Dr. Hemlata Patidar', '10:0');

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `speciality` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(25) DEFAULT NULL,
  `mobile` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`id`, `name`, `speciality`, `email`, `password`, `mobile`) VALUES
(1, 'Dr. Hemlata Patidar', 'Obstetrics and Gynaecology', 'hemlata@gmail.com', 'hem@123', 9898989898),
(2, 'Dr. Jyoti Garg', 'Consultant ENT Surgeon', 'jyoti.garg@gmail.com', 'jyo@123', 9898989899),
(3, 'Dr. Pooja Chitlangia', 'Obstetrics and Gynaecology', 'pooja185@gmail.com', NULL, 9999999999),
(4, 'Dr. Rangoli Mathur', 'Obstetrics and Gynaecology', 'mathur.rangoli@gmail.com', NULL, 9898989898),
(5, 'Dr. Kaushal Goyal', 'Urologist', 'goyal.kaushal@gmail.com', NULL, 9999999999),
(7, 'Dr. Saket Jain', 'Urologist', 'saket.jain85@gmail.com', NULL, 9999999998),
(8, 'Dr. Rohit Sharma', 'Pediatrician', 'rohit@gmail.com', NULL, 9999999999);

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

CREATE TABLE `patients` (
  `pid` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `age` int(11) NOT NULL,
  `mobile` bigint(20) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`pid`, `name`, `age`, `mobile`, `email`) VALUES
(1, 'Ashok Kumar', 25, 7825463512, 'ashok.kumar@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `specialities`
--

CREATE TABLE `specialities` (
  `id` int(11) NOT NULL,
  `speciality` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `specialities`
--

INSERT INTO `specialities` (`id`, `speciality`) VALUES
(1, 'Obstetrics and Gynaecology'),
(2, 'Urologist'),
(3, 'Consultant ENT Surgeon'),
(4, 'Pediatrician');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `specialities`
--
ALTER TABLE `specialities`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `specialities`
--
ALTER TABLE `specialities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
