-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 30, 2015 at 11:15 AM
-- Server version: 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `attravel`
--

-- --------------------------------------------------------

--
-- Table structure for table `partner`
--

CREATE TABLE IF NOT EXISTS `partner` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `logo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `partner`
--

INSERT INTO `partner` (`id`, `name`, `logo`, `link`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Seabank', 'http://localhost:8000/uploads/seabank-100x60.png', 'http://seabank.com.vn', 1, '2015-09-29 07:22:31', '2015-09-29 09:10:18'),
(2, 'PTI', 'http://localhost:8000/uploads/PTI-100x60.png', 'http://dantri.com.vn', 1, '2015-09-29 09:13:58', '2015-09-29 09:13:58'),
(3, 'Hd Bank', 'http://localhost:8000/uploads/hdbank-100x60.png', 'http://hdbank.com.vn', 1, '2015-09-29 09:14:41', '2015-09-29 09:14:41'),
(4, 'BIDV', 'http://localhost:8000/uploads/bidv-100x60.png', 'http://bidv.com.vn', 1, '2015-09-29 09:15:11', '2015-09-29 09:15:11'),
(5, 'Bảo Việt', 'http://localhost:8000/uploads/baoviet-100x60.png', 'http://baoviet.com.vn', 1, '2015-09-29 09:15:38', '2015-09-29 09:15:38'),
(6, 'Agribank', 'http://localhost:8000/uploads/agribank-100x60.png', 'http://agribank.com.vn', 1, '2015-09-29 09:16:09', '2015-09-29 09:16:09'),
(7, 'GP Bank', 'http://localhost:8000/uploads/gpbank-100x60.png', 'http://gpbank.com.vn', 1, '2015-09-29 09:16:39', '2015-09-29 09:16:39'),
(8, 'PetroVietnam', 'http://localhost:8000/uploads/petro-100x60.png', 'http://petrovietnam.com.vn', 1, '2015-09-29 09:21:23', '2015-09-29 09:21:23'),
(9, 'VIB Bank', 'http://localhost:8000/uploads/vib-100x60.png', 'http://vibbank.com.vn', 1, '2015-09-29 09:21:55', '2015-09-29 09:21:55'),
(10, 'Bảo Minh', 'http://localhost:8000/uploads/baominh-100x60_1.png', 'http://baominh.com.vn', 1, '2015-09-29 09:22:17', '2015-09-29 09:22:17');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `partner`
--
ALTER TABLE `partner`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `partner`
--
ALTER TABLE `partner`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
