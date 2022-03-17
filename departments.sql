-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 14, 2022 at 11:08 PM
-- Server version: 5.7.37
-- PHP Version: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `prepsng_digitale`
--

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
                               `id` bigint(20) UNSIGNED NOT NULL,
                               `department_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
                               `created_at` timestamp NULL DEFAULT NULL,
                               `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `department_name`, `created_at`, `updated_at`) VALUES
                                                                                    (1, 'Licensing', '2022-02-14 09:53:57', '2022-02-14 09:53:57'),
                                                                                    (2, 'Vetting', '2022-02-14 09:54:20', '2022-02-14 09:54:20'),
                                                                                    (3, 'Frequency Planning', '2022-02-14 09:54:32', '2022-02-14 09:54:32'),
                                                                                    (4, 'Frequency Assignment', '2022-02-14 09:54:54', '2022-02-14 09:54:54'),
                                                                                    (5, 'Office of Director', '2022-02-14 09:55:11', '2022-02-14 09:55:11'),
                                                                                    (6, 'Office of Permanent Secretary', '2022-02-14 09:55:27', '2022-02-14 09:55:27'),
                                                                                    (7, 'Office of Spectrum Controller', '2022-02-14 09:55:47', '2022-02-14 09:55:47'),
                                                                                    (8, 'Office of Minister', '2022-02-14 09:56:00', '2022-02-14 09:56:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
    ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
    MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
