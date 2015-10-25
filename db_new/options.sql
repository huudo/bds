-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 30, 2015 at 11:32 AM
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
-- Table structure for table `options`
--

CREATE TABLE IF NOT EXISTS `options` (
  `id` int(10) unsigned NOT NULL,
  `lang_id` int(11) NOT NULL,
  `key` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `value` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=121 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `options`
--

INSERT INTO `options` (`id`, `lang_id`, `key`, `name`, `value`, `created_at`, `updated_at`) VALUES
(4, 0, '_paginate', 'Phân trang', '20', '2015-09-04 01:47:14', '2015-09-04 09:32:38'),
(11, 1, 'site_title', 'Tiêu đề trang', 'Laravel cms', '2015-09-04 09:32:24', '2015-09-04 09:32:31'),
(12, 2, 'site_title', 'Tiêu đề trang', 'Laravel cms English', '2015-09-04 09:32:24', '2015-09-04 09:32:24'),
(13, 0, 'mainmenu', 'Menu chính', '15', '2015-09-04 21:35:28', '2015-09-04 21:35:28'),
(14, 1, '_logo', NULL, 'http://localhost:8000/uploads/logo.png', '2015-09-25 08:36:13', '2015-09-30 04:10:28'),
(15, 1, 'news_widget_title', NULL, 'Xem nhiều', '2015-09-25 08:36:13', '2015-09-30 04:10:28'),
(16, 1, 'news_widget_number', NULL, '4', '2015-09-25 08:36:13', '2015-09-30 04:10:29'),
(17, 1, 'news_widget_order', NULL, 'desc', '2015-09-25 08:36:13', '2015-09-30 04:10:29'),
(18, 1, 'news_widget_length', NULL, '10', '2015-09-25 08:36:13', '2015-09-30 04:10:29'),
(19, 1, 'news_widget_cat', NULL, '4', '2015-09-25 09:27:39', '2015-09-30 04:10:28'),
(20, 1, 'news_widget_orderby', NULL, 'views', '2015-09-25 09:57:53', '2015-09-30 04:10:29'),
(22, 1, 'banner_widget_title', NULL, 'Quảng cáo', '2015-09-26 04:51:19', '2015-09-30 04:10:29'),
(23, 1, 'banner_widget_group', NULL, '20', '2015-09-26 04:51:19', '2015-09-30 04:10:29'),
(24, 1, 'banner_widget_number', NULL, '5', '2015-09-26 05:01:30', '2015-09-30 04:10:29'),
(25, 1, 'banner_widget_orderby', NULL, 'created_at', '2015-09-26 05:01:30', '2015-09-30 04:10:29'),
(26, 1, 'banner_widget_order', NULL, 'desc', '2015-09-26 05:01:30', '2015-09-30 04:10:29'),
(27, 1, '_title', NULL, '', '2015-09-29 03:04:53', '2015-09-30 04:10:28'),
(28, 1, '_desc', NULL, '', '2015-09-29 03:04:53', '2015-09-30 04:10:28'),
(29, 1, '_per_page', NULL, '', '2015-09-29 03:04:53', '2015-09-30 04:10:28'),
(30, 1, '_compnany_name', NULL, 'Công ty TNHH Dịch vụ và Du lịch Phố Việt', '2015-09-29 03:04:54', '2015-09-30 04:10:29'),
(31, 1, '_compnany_headquarter', NULL, 'Số 5B2 Phố Cảm Hội, Phường Đống Mác, Hai Bà Trưng, Hà Nội', '2015-09-29 03:04:54', '2015-09-30 04:10:30'),
(32, 1, '_compnany_office', NULL, 'Số nhà 14 Ngõ 99/3 Nguyễn Chí Thanh, Láng Hạ, Đống Đa, Hà Nội', '2015-09-29 03:04:54', '2015-09-30 04:10:30'),
(33, 1, '_address', NULL, 'Số nhà 14 Ngõ 99/3 Nguyễn Chí Thanh, Láng Hạ, Đống Đa, Hà Nội', '2015-09-29 03:04:54', '2015-09-30 04:10:30'),
(34, 1, '_email', NULL, 'Vndang86@gmail.com', '2015-09-29 03:04:54', '2015-09-30 04:10:30'),
(35, 1, '_website', NULL, 'attravel.com.vn', '2015-09-29 03:04:54', '2015-09-30 04:10:30'),
(36, 1, '_yahoo', NULL, '', '2015-09-29 03:04:54', '2015-09-30 03:09:10'),
(37, 1, '_skype', NULL, '', '2015-09-29 03:04:54', '2015-09-30 03:09:10'),
(38, 1, '_fax', NULL, '', '2015-09-29 03:04:54', '2015-09-30 04:10:30'),
(39, 1, '_phone', NULL, ' (+84) 4 32 32 1866', '2015-09-29 03:04:54', '2015-09-30 04:10:30'),
(40, 1, '_phone_t1', NULL, '0978787878', '2015-09-29 03:04:54', '2015-09-30 04:10:30'),
(41, 1, '_phone_t2', NULL, '', '2015-09-29 03:04:54', '2015-09-30 04:10:30'),
(42, 1, '_tax_code', NULL, '', '2015-09-29 03:04:54', '2015-09-30 04:10:30'),
(43, 1, '_latitude', NULL, '21.0226967', '2015-09-29 03:04:54', '2015-09-30 04:10:30'),
(44, 1, '_longtitide', NULL, '105.8369637', '2015-09-29 03:04:54', '2015-09-30 04:10:30'),
(45, 2, '_title', NULL, '', '2015-09-29 03:04:54', '2015-09-30 04:10:30'),
(46, 2, '_desc', NULL, '', '2015-09-29 03:04:54', '2015-09-30 04:10:30'),
(47, 2, 'news_widget_title', NULL, 'Xem nhiều', '2015-09-29 03:04:54', '2015-09-30 04:10:30'),
(48, 2, 'news_widget_cat', NULL, '4', '2015-09-29 03:04:54', '2015-09-30 04:10:30'),
(49, 2, 'news_widget_number', NULL, '4', '2015-09-29 03:04:54', '2015-09-30 04:10:30'),
(50, 2, 'news_widget_orderby', NULL, 'views', '2015-09-29 03:04:54', '2015-09-30 04:10:30'),
(51, 2, 'news_widget_order', NULL, 'desc', '2015-09-29 03:04:54', '2015-09-30 04:10:30'),
(52, 2, 'news_widget_length', NULL, '10', '2015-09-29 03:04:54', '2015-09-30 04:10:30'),
(53, 2, 'banner_widget_title', NULL, 'Quảng cáo', '2015-09-29 03:04:54', '2015-09-30 04:10:30'),
(54, 2, 'banner_widget_group', NULL, '20', '2015-09-29 03:04:54', '2015-09-30 04:10:30'),
(55, 2, 'banner_widget_number', NULL, '5', '2015-09-29 03:04:54', '2015-09-30 04:10:30'),
(56, 2, 'banner_widget_orderby', NULL, 'created_at', '2015-09-29 03:04:54', '2015-09-30 04:10:30'),
(57, 2, 'banner_widget_order', NULL, 'desc', '2015-09-29 03:04:54', '2015-09-30 04:10:30'),
(58, 2, '_compnany_name', NULL, '', '2015-09-29 03:04:54', '2015-09-30 04:10:31'),
(59, 2, '_compnany_headquarter', NULL, '', '2015-09-29 03:04:54', '2015-09-30 04:10:31'),
(60, 2, '_compnany_office', NULL, '', '2015-09-29 03:04:54', '2015-09-30 04:10:31'),
(61, 2, '_address', NULL, '', '2015-09-29 03:04:54', '2015-09-30 04:10:31'),
(70, 1, 'partner_widget_title', NULL, 'Đối tác của chúng tôi', '2015-09-29 08:58:25', '2015-09-30 04:10:29'),
(71, 1, 'partner_widget_number', NULL, '10', '2015-09-29 08:58:25', '2015-09-30 04:10:29'),
(72, 1, 'partner_widget_orderby', NULL, 'created_at', '2015-09-29 08:58:25', '2015-09-30 04:10:29'),
(73, 1, 'partner_widget_order', NULL, 'desc', '2015-09-29 08:58:25', '2015-09-30 04:10:29'),
(74, 2, 'partner_widget_title', NULL, 'Đối tác của chúng tôi', '2015-09-29 09:01:52', '2015-09-30 04:10:30'),
(75, 2, 'partner_widget_number', NULL, '10', '2015-09-29 09:01:52', '2015-09-30 04:10:30'),
(76, 2, 'partner_widget_orderby', NULL, 'created_at', '2015-09-29 09:01:52', '2015-09-30 04:10:30'),
(77, 2, 'partner_widget_order', NULL, 'desc', '2015-09-29 09:01:52', '2015-09-30 04:10:31'),
(78, 1, 'partner_widget_target', NULL, '_blank', '2015-09-29 09:08:40', '2015-09-30 04:10:29'),
(79, 2, 'partner_widget_target', NULL, '_blank', '2015-09-29 09:08:41', '2015-09-30 04:10:31'),
(80, 1, 'link_footer_widget_title', NULL, 'Liên kết', '2015-09-30 01:46:34', '2015-09-30 04:10:29'),
(81, 1, 'link_footer_widget_number', NULL, '5', '2015-09-30 01:46:35', '2015-09-30 04:10:29'),
(82, 2, 'link_footer_widget_title', NULL, 'Liên kết', '2015-09-30 01:46:36', '2015-09-30 04:10:31'),
(83, 1, 'link_footer_widget_title1', NULL, 'Báo điện tử Dân trí', '2015-09-30 01:52:18', '2015-09-30 04:10:29'),
(84, 1, 'link_footer_widget_link1', NULL, 'http://dantri.com.vn', '2015-09-30 01:52:18', '2015-09-30 04:10:29'),
(85, 1, 'link_footer_widget_title2', NULL, 'Báo điện tử Viet Nam Net', '2015-09-30 01:52:18', '2015-09-30 04:10:29'),
(86, 1, 'link_footer_widget_link2', NULL, 'http://vietnamnet.vn', '2015-09-30 01:52:18', '2015-09-30 04:10:29'),
(87, 1, 'link_footer_widget_title3', NULL, 'Báo Bóng Đá', '2015-09-30 01:52:18', '2015-09-30 04:10:29'),
(88, 1, 'link_footer_widget_link3', NULL, 'http://bongdaplus.vn', '2015-09-30 01:52:18', '2015-09-30 04:10:29'),
(89, 1, 'link_footer_widget_title4', NULL, 'Báo điện tử VNexpress', '2015-09-30 01:52:18', '2015-09-30 04:10:29'),
(90, 1, 'link_footer_widget_link4', NULL, 'http://vnexpress.net', '2015-09-30 01:52:18', '2015-09-30 04:10:29'),
(91, 2, 'link_footer_widget_title1', NULL, 'Báo điện tử Dân trí', '2015-09-30 01:52:20', '2015-09-30 04:10:31'),
(92, 2, 'link_footer_widget_link1', NULL, 'http://dantri.com.vn', '2015-09-30 01:52:20', '2015-09-30 04:10:31'),
(93, 2, 'link_footer_widget_title2', NULL, 'Báo điện tử Viet Nam Net', '2015-09-30 01:52:20', '2015-09-30 04:10:31'),
(94, 2, 'link_footer_widget_link2', NULL, 'http://vietnamnet.vn', '2015-09-30 01:52:20', '2015-09-30 04:10:31'),
(95, 2, 'link_footer_widget_title3', NULL, 'Báo Bóng Đá', '2015-09-30 01:52:20', '2015-09-30 04:10:31'),
(96, 2, 'link_footer_widget_link3', NULL, 'http://bongdaplus.vn', '2015-09-30 01:52:20', '2015-09-30 04:10:31'),
(97, 2, 'link_footer_widget_title4', NULL, 'Báo điện tử VNexpress', '2015-09-30 01:52:20', '2015-09-30 04:10:31'),
(98, 2, 'link_footer_widget_link4', NULL, 'http://vnexpress.net', '2015-09-30 01:52:20', '2015-09-30 04:10:31'),
(99, 1, 'link_footer_widget_title5', NULL, 'Facebook', '2015-09-30 02:01:20', '2015-09-30 04:10:29'),
(100, 1, 'link_footer_widget_link5', NULL, 'http://facebook.com.vn', '2015-09-30 02:01:21', '2015-09-30 04:10:29'),
(101, 2, 'link_footer_widget_title5', NULL, 'Facebook', '2015-09-30 02:01:22', '2015-09-30 04:10:31'),
(102, 2, 'link_footer_widget_link5', NULL, 'http://facebook.com.vn', '2015-09-30 02:01:22', '2015-09-30 04:10:31'),
(103, 1, 'fanpage_footer_widget_title', NULL, 'Fanpage', '2015-09-30 02:12:22', '2015-09-30 04:10:29'),
(104, 1, 'fanpage_footer_widget_name', NULL, 'Ebook Hay', '2015-09-30 02:12:22', '2015-09-30 04:10:29'),
(105, 1, 'fanpage_footer_widget_link', NULL, 'https://www.facebook.com/ebook.hay.tk', '2015-09-30 02:12:22', '2015-09-30 04:10:29'),
(106, 2, 'fanpage_footer_widget_title', NULL, 'Fanpage', '2015-09-30 02:12:24', '2015-09-30 04:10:31'),
(107, 1, '_about', NULL, 'Bạn có thể tìm được các tour hấp dẫn và phù hợp với nhu cầu du lịch, khám phá, trải nghiệm... Mang đến cho bạn nhiều lợi ích và thông tin bổ ích cho các chuyến đi an toàn và thú vị hơn.', '2015-09-30 02:21:44', '2015-09-30 04:10:30'),
(108, 2, '_about', NULL, '', '2015-09-30 02:21:45', '2015-09-30 04:10:31'),
(109, 1, 'about_footer_widget_title', NULL, 'Giới thiệu về công ty', '2015-09-30 02:28:48', '2015-09-30 04:10:29'),
(110, 2, 'about_footer_widget_title', NULL, 'Giới thiệu về công ty', '2015-09-30 02:28:50', '2015-09-30 04:10:31'),
(113, 1, 'about_footer_widget_logo', NULL, '1', '2015-09-30 02:54:40', '2015-09-30 04:10:29'),
(114, 1, 'about_footer_widget_about', NULL, '1', '2015-09-30 02:54:40', '2015-09-30 04:10:29'),
(115, 1, 'about_footer_widget_hotline', NULL, '1', '2015-09-30 02:54:40', '2015-09-30 04:10:29'),
(116, 1, 'about_footer_widget_social', NULL, '1', '2015-09-30 02:54:40', '2015-09-30 04:10:29'),
(117, 1, '_facebook', NULL, '#', '2015-09-30 03:15:35', '2015-09-30 04:10:30'),
(118, 1, '_twitter', NULL, '#', '2015-09-30 03:15:35', '2015-09-30 04:10:30'),
(119, 1, '_pinterest', NULL, '#', '2015-09-30 03:15:35', '2015-09-30 04:10:30'),
(120, 1, '_linkedin', NULL, '#', '2015-09-30 03:15:35', '2015-09-30 04:10:30');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `options`
--
ALTER TABLE `options`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `options`
--
ALTER TABLE `options`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=121;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
