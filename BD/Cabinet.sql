-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 12, 2025 at 12:36 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Cabinet`
--

-- --------------------------------------------------------

--
-- Table structure for table `Appointment`
--

CREATE TABLE `Appointment` (
  `ID` int(11) NOT NULL,
  `ID_P` int(11) NOT NULL,
  `patient_name` varchar(30) NOT NULL,
  `appointment_date` date NOT NULL,
  `appointment_time` enum('9h00','9h30','10h00','10h30','11h00','11h30','12h00','13h00','13h30','14h00','14h30','15h00') NOT NULL,
  `Availbility` enum('1','2','3') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Appointment`
--

INSERT INTO `Appointment` (`ID`, `ID_P`, `patient_name`, `appointment_date`, `appointment_time`, `Availbility`) VALUES
(23, 49, 'hammouche xaxa', '2025-05-13', '13h00', '1');

-- --------------------------------------------------------

--
-- Table structure for table `Assistante`
--

CREATE TABLE `Assistante` (
  `name` varchar(50) NOT NULL,
  `family_name` varchar(50) NOT NULL,
  `sex` enum('male','female') NOT NULL,
  `email` varchar(100) NOT NULL,
  `tel` varchar(20) NOT NULL,
  `dtn` date NOT NULL,
  `situation_familial` varchar(50) NOT NULL,
  `etude` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Assistante`
--

INSERT INTO `Assistante` (`name`, `family_name`, `sex`, `email`, `tel`, `dtn`, `situation_familial`, `etude`) VALUES
('elias', 'merzougui', 'male', 'elias.merzougui@gmail.com', '0666666666', '0022-02-22', 'inconnue', 'aucune');

-- --------------------------------------------------------

--
-- Table structure for table `connexion_assistante_doc`
--

CREATE TABLE `connexion_assistante_doc` (
  `role` enum('dr','assi') NOT NULL,
  `email` varchar(100) NOT NULL,
  `psw` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `connexion_assistante_doc`
--

INSERT INTO `connexion_assistante_doc` (`role`, `email`, `psw`) VALUES
('assi', 'elias.merzougui@gmail.com', '$2y$10$E.3KwgLO3zuUNMbZjpLxbuWlvXcflzh9O9QFxm6NoGpQIB45UM1RO'),
('dr', 'M.Docteur@gamil.com', '$2y$10$wOLaHwWcU7etbtSiquoTgOVk7jQQliok1jVJswrHsdSViMmxa8zty');

-- --------------------------------------------------------

--
-- Table structure for table `connexion_patient`
--

CREATE TABLE `connexion_patient` (
  `email` varchar(100) NOT NULL,
  `psw` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `connexion_patient`
--

INSERT INTO `connexion_patient` (`email`, `psw`) VALUES
('M.Docteur@gmail.com', '$2y$10$oAmjqqmgSgZs5LLBGYLfcegxMapQRsm3NUtPGp0IoYWccLIY0X9YG'),
('Wassila@gmail.com', '$2y$10$JgPO.viEhokzysiAZw4mEu2cZNUCwx8PoCOLgYezCOUIxcWX2LKqG');

-- --------------------------------------------------------

--
-- Table structure for table `Consulatation`
--

CREATE TABLE `Consulatation` (
  `ID` int(255) NOT NULL,
  `ID_Patient` int(255) NOT NULL,
  `Pinfos` varchar(200) NOT NULL,
  `Datee` date NOT NULL,
  `Timee` time NOT NULL,
  `descrption` longtext NOT NULL,
  `Orodonnace` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Patient`
--

CREATE TABLE `Patient` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `family_name` varchar(30) NOT NULL,
  `sex` varchar(5) NOT NULL,
  `email` varchar(100) NOT NULL,
  `dtn` date NOT NULL,
  `tel` varchar(12) NOT NULL,
  `consult` enum('1','2') NOT NULL,
  `app` enum('1','2','3','0') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Patient`
--

INSERT INTO `Patient` (`id`, `name`, `family_name`, `sex`, `email`, `dtn`, `tel`, `consult`, `app`) VALUES
(49, 'xaxa', 'hammouche', 'male', 'Wassila@gmail.com', '2025-05-13', '24545024', '1', '2'),
(50, 'koussa', 'anis', 'male', 'M.Docteur@gmail.com', '2025-05-07', '0666666666', '1', '0');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Appointment`
--
ALTER TABLE `Appointment`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `Assistante`
--
ALTER TABLE `Assistante`
  ADD PRIMARY KEY (`name`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `connexion_assistante_doc`
--
ALTER TABLE `connexion_assistante_doc`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `connexion_patient`
--
ALTER TABLE `connexion_patient`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `Consulatation`
--
ALTER TABLE `Consulatation`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `Patient`
--
ALTER TABLE `Patient`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Appointment`
--
ALTER TABLE `Appointment`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `Consulatation`
--
ALTER TABLE `Consulatation`
  MODIFY `ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `Patient`
--
ALTER TABLE `Patient`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
