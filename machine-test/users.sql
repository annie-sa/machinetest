-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 24, 2024 at 03:52 PM
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
-- Database: `users`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(54) NOT NULL,
  `username` varchar(34) NOT NULL,
  `email` varchar(450) NOT NULL,
  `password` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`) VALUES
(1, 'akhila', 'akhila@gmail.com', '$2y$10$Qsoc6GKym0SIxeAK.UNbQO6DaKpgUAZV/c.Wxr'),
(2, 'Anooja', 'anooja@gmail.com', '$2y$10$jiUTj3Ne8eJhYcDpqU6YZuQpcplXb9hQoKZgkz'),
(3, 'Anoop', 'anoop@gmail.com', '$2y$10$OQSc/rkfX9PlvdH24M0KOetZa47Hwqgidtv1mX'),
(4, 'Anjali', 'anjal@gmail.com', '$2y$10$9/h8ATLXLkJBoVGEf.NAO.eWi10c5r8GZ3YvHJ'),
(5, 'Anu', 'anu@gmail.com', '$2y$10$9cWMJMY7A7uyy4hKU3L07e1KTkXK7xZ8udmexo'),
(6, 'Asha', 'asha@gmail.com', '$2y$10$F7oASCJ5Y/OujjAZv5kcG.Q1R3F9PTZkgZpnfR'),
(7, 'Abi', 'abi@gmail.com', '$2y$10$kwCEaRWj4D7S1gw7TDgGmuBVy/ZUh2zUaRs7nv'),
(8, 'Arun', 'arun@gmail.com', '$2y$10$Z6GqMS/1Lh4pSYf5nMSF/eVTXvfo4.qOrv/DfB'),
(9, 'amal', 'amal@gmail.com', '$2y$10$PnFwf8ZyRqGpjdlFWi4ccu3.n.jOO3ewbXMA8M'),
(10, 'anju', 'anju@gmail.com', '$2y$10$9bT2G2Sn0G4desBAS9ObweFhy0huvvh6NRtF1.'),
(11, 'anand', 'anand@gmail.com', '$2y$10$BGt8Sb6pSldTFB/MFGlf7.T3x7yavFsDLaxvNg'),
(12, 'appu', 'appu@gmail.com', '$2y$10$LTRJbwfizEoKjAHxy9/eGeDBNut0j3vjMKCNOm'),
(13, 'ammu', 'ammu@gmail.com', '$2y$10$e3obbp6yrBQEulQ85ocuku7gqAWh/WbGZDDpZl'),
(14, 'aki', 'aki@gmail.com', '$2y$10$vujJUa5sOe9a9k8EIxqNxeOMOwfWKThUbAT2LV'),
(15, 'Achu', 'achu@gmail.com', '$2y$10$nJXwwK64hnMofphTjFmNCOoKoTNaXCuhAuIWVQ');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(54) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
