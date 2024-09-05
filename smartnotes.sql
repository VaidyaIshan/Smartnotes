-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 05, 2024 at 06:38 AM
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
-- Database: `smartnotes`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookstore`
--

CREATE TABLE `bookstore` (
  `id` int(11) NOT NULL,
  `username` text NOT NULL,
  `bookname` text NOT NULL,
  `Contact` bigint(20) NOT NULL,
  `Description` varchar(500) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bookstore`
--

INSERT INTO `bookstore` (`id`, `username`, `bookname`, `Contact`, `Description`, `date`, `price`) VALUES
(9, 'ishan', 'Computer Science ', 9765306253, 'Computer Science book for grade 12 by buddha publications\r\nEdition:2021\r\nContact me through WhatsApp for further INFORMATION ', '2024-05-16 20:16:10', 340),
(10, 'Mandira', 'Class 12 Books', 9765306253, 'Includes all class 12 books \r\nphysics pioneer\r\nchemistry pioneer\r\nnegotiable', '2024-06-17 13:54:05', 4000);

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE `files` (
  `username` varchar(20) NOT NULL,
  `subject` varchar(20) DEFAULT NULL,
  `filename` text NOT NULL,
  `id` int(11) NOT NULL,
  `Class` text DEFAULT NULL,
  `description` text NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `files`
--

INSERT INTO `files` (`username`, `subject`, `filename`, `id`, `Class`, `description`, `date`) VALUES
('Ishan', 'Physics', 'AC Current NOTES', 24, '12', 'Complete notes for alternating current', '2024-02-29'),
('Ishan', 'Mathematics', 'Sequence and Series', 25, '12', 'All exercises', '2024-02-29'),
('Ishan', 'Chemistry', 'HALOALKANES', 26, '12', 'FUll haloalkanes note', '2024-02-29'),
('Ishan', 'Physics', 'ELECTRON', 27, '12', 'MODERN PHYSICS ELECTRON', '2024-02-29'),
('Ishan', 'Mathematics', 'Differential Equation', 28, '12', 'UPDATED Assignment pdf ', '2024-02-29'),
('Ishan', 'Physics', 'THERMODYNAMICS', 29, '12', 'By ishan', '2024-02-29'),
('anil', 'Physics', 'AC ASSIGNMENT', 30, '12', 'ASSIGNMENT QUESTIONS COMPLETE', '2024-02-29'),
('anil', 'Chemistry', 'Volumetric ANALYSIS', 31, '12', 'BY ANIL', '2024-02-29'),
('ishan', 'Chemistry', 'Comp', 33, '12', 'computer', '2024-04-05'),
('Ishan', 'Phy', 'Trinity', 35, '11', 'sw', '2024-08-05'),
('Ishan', '', 'Trinity11', 36, '', 'ss', '2024-08-05');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `ID` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `username` varchar(40) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(500) NOT NULL,
  `signup_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `otp` int(11) DEFAULT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `firstname`, `lastname`, `username`, `password`, `email`, `signup_time`, `otp`, `status`) VALUES
(1, 'Ishan', 'Baidya', 'ishan', '$2y$10$09Fyzf6RGjuoVn7iXlrW3eu5CYzaoyf1aSHBzPEzmmeEXqcQSmHQa', 'baidyaishan22@gmail.com', '2024-05-23 14:33:50', 0, 'active'),
(26, 'Anil', 'Tamang', 'Anil', '$2y$10$mpbc8iSKR.EfvL21g9oYyOwyRqMxX5y2GHlEGRrDcidZp/VbMhvre', 'anilteva0717@gmail.com', '2024-05-23 14:37:05', 0, 'active'),
(36, 'Ishan', 'Baidya', 'Eshan', '$2y$10$vt0EznmjemTvX3G/gdTs4.m3zU8kbdKtjlxKIRkO3mbZsIFsPsUsm', 'digitalproductnp@gmail.com', '2024-08-01 06:27:36', NULL, 'active'),
(37, 'admin', 'baidya', 'Eeshan', '$2y$10$pXVhc7DO391QuLXBeVcDLuAnrHtXI1oxi2HvJqwvnf0Tg30/0U/Ii', 'vaidyaishan11@gmail.com', '2024-08-01 09:12:23', NULL, 'active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookstore`
--
ALTER TABLE `bookstore`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookstore`
--
ALTER TABLE `bookstore`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
