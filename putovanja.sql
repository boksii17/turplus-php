-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 11, 2023 at 11:09 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `putovanja`
--

-- --------------------------------------------------------

--
-- Table structure for table `destinacije`
--

CREATE TABLE `destinacije` (
  `id` int(11) NOT NULL,
  `naziv` varchar(255) NOT NULL,
  `datum` datetime NOT NULL,
  `trajanje` varchar(255) NOT NULL,
  `transport` varchar(255) NOT NULL,
  `userid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `destinacije`
--

INSERT INTO `destinacije` (`id`, `naziv`, `datum`, `trajanje`, `transport`, `userid`) VALUES
(66, 'Amsterdam', '2021-12-16 19:44:00', '6 dana', 'avion', 1),
(67, 'Firenca', '2021-12-18 00:00:00', '8 dana', 'avion', 1),
(69, 'Nis', '2021-12-14 02:03:00', '2 dana', 'autobus', 1),
(70, 'Zlatibor', '2023-06-14 18:19:00', '8 dana', 'autobus', 1),
(71, 'Barselona', '2023-06-15 22:24:00', '7 dana', 'avion', 1),
(72, 'Madrid', '2023-08-10 23:21:00', '6 dana', 'autobus', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`) VALUES
(1, 'lela', 'lelako99@gmail.com', '0025e89702ab006ccbb9ead4cf48f19f'),
(8, 'Bojana', 'novakovicc17@gmail.com', '8b20b902fa40bc14fbb8a0f77b5233d2'),
(9, 'Jelena', 'jelena@gmail.com', '188de5237b9bb5681c25d08476d71205'),
(10, 'Pera', 'pera@gmail.com', 'd8795f0d07280328f80e59b1e8414c49'),
(12, 'Perica', 'perica@gmail.com', '084414d6a7b8487a0e663e27b2b773ba');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `destinacije`
--
ALTER TABLE `destinacije`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userid` (`userid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `destinacije`
--
ALTER TABLE `destinacije`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `destinacije`
--
ALTER TABLE `destinacije`
  ADD CONSTRAINT `destinacije_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
