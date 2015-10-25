-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 02, 2015 at 03:33 AM
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
-- Table structure for table `admin_menus`
--

CREATE TABLE IF NOT EXISTS `admin_menus` (
  `id` int(10) unsigned NOT NULL,
  `icon` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `route` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `permission` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'read',
  `parent` int(11) NOT NULL,
  `order` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admin_menus`
--

INSERT INTO `admin_menus` (`id`, `icon`, `name`, `slug`, `link`, `route`, `permission`, `parent`, `order`, `status`, `created_at`, `updated_at`) VALUES
(33, 'fa-circle-o', 'Thông tin', 'thong-tin', '', 'admin.setting.index', 'read', 11, 5, 1, '2015-09-25 07:00:20', '2015-09-29 03:56:06'),
(34, 'fa-envelope', 'Liên hệ', 'lien-he', '', '', 'read', 0, 11, 1, '2015-09-29 03:56:00', '2015-09-29 03:56:43'),
(35, 'fa-circle-o', 'Tất cả liên hệ', 'tat-ca-lien-he', '', 'admin.contact.index', 'read', 34, 1, 1, '2015-09-29 03:57:09', '2015-09-29 04:44:43'),
(36, 'fa-android', 'Đối tác', 'doi-tac', '', '', 'read', 0, 12, 1, '2015-09-29 04:44:37', '2015-09-29 04:46:24'),
(37, 'fa-circle-o', 'Tất cả đối tác', 'tat-ca-doi-tac', '', 'admin.partner.index', 'read', 36, 100, 1, '2015-09-29 04:45:56', '2015-09-29 04:45:56');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_menus`
--
ALTER TABLE `admin_menus`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_menus`
--
ALTER TABLE `admin_menus`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=38;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
