-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 11, 2015 at 11:54 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `lar_default`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_menus`
--

CREATE TABLE IF NOT EXISTS `admin_menus` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
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
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=30 ;

--
-- Dumping data for table `admin_menus`
--

INSERT INTO `admin_menus` (`id`, `icon`, `name`, `slug`, `link`, `route`, `permission`, `parent`, `order`, `status`, `created_at`, `updated_at`) VALUES
(1, 'fa-dashboard', 'Admin', 'admin', '', 'admin', 'read', 0, 1, 1, '2015-08-31 18:20:01', '2015-09-01 23:46:27'),
(2, 'fa-user', 'Tài khoản', 'tai-khoan', '', '', 'read', 0, 2, 1, '2015-08-31 18:22:27', '2015-09-01 23:46:33'),
(3, 'fa-edit', 'Bài viết', 'bai-viet', '', '', 'read', 0, 4, 1, '2015-08-31 18:38:11', '2015-09-01 23:48:29'),
(5, 'fa-circle-o', 'Tất cả Tài khoản', 'tat-ca-tai-khoan', '', 'admin.user.index', 'list_users', 2, 1, 1, '2015-08-31 20:38:04', '2015-09-01 23:39:15'),
(6, 'fa-circle-o', 'Nhóm tài khoản', 'nhom-tai-khoan', '', 'admin.user_group.index', 'manage_user_groups', 2, 2, 1, '2015-08-31 20:38:40', '2015-09-02 00:58:33'),
(7, 'fa-circle-o', 'Tất cả bài viết', 'tat-ca-bai-viet', '', 'admin.post.index', 'list_posts', 3, 1, 1, '2015-08-31 20:39:02', '2015-09-01 23:43:24'),
(8, 'fa-circle-o', 'Danh mục', 'danh-muc', '', 'admin.cat.index', 'list_cats', 3, 2, 1, '2015-08-31 20:39:23', '2015-09-02 00:59:16'),
(9, 'fa-circle-o', 'Thẻ', 'the', '', 'admin.tag.index', 'list_tags', 3, 3, 1, '2015-08-31 20:39:46', '2015-09-02 00:59:33'),
(10, 'fa-circle-o', 'Admin menu', 'admin-menu', '', 'admin.admin_menu.index', 'manage_admin_menus', 11, 2, 1, '2015-08-31 20:40:34', '2015-09-04 19:01:02'),
(11, 'fa-wrench', 'Cài đặt', 'cai-dat', '', '', 'manage_settings', 0, 10, 1, '2015-08-31 20:40:51', '2015-09-10 19:28:20'),
(12, 'fa-circle-o', 'Ngôn ngữ', 'ngon-ngu', '', 'admin.language.index', 'manage_languages', 11, 3, 1, '2015-08-31 20:41:24', '2015-09-04 19:01:02'),
(13, 'fa-copy', 'Trang', 'trang', '', '', 'read', 0, 3, 1, '2015-09-01 23:48:16', '2015-09-01 23:51:52'),
(14, 'fa-circle-o', 'Tất cả trang', 'tat-ca-trang', '', 'admin.page.index', 'list_pages', 13, 1, 1, '2015-09-01 23:50:14', '2015-09-02 05:14:59'),
(15, 'fa-picture-o', 'Giao diện', 'giao-dien', '', '', 'read', 0, 8, 1, '2015-09-02 05:14:37', '2015-09-10 19:28:20'),
(16, 'fa-list', 'Menu', 'menu', '', 'admin.menu_group.index', 'list_menu_groups', 15, 1, 1, '2015-09-02 05:17:41', '2015-09-02 05:18:07'),
(17, 'fa-circle-o', 'Nhóm slider', 'nhom-slider', '', 'admin.slider.index', 'manage_sliders', 15, 3, 1, '2015-09-03 01:38:55', '2015-09-04 18:16:58'),
(18, 'fa-circle-o', 'Nhóm Banner', 'nhom-banner', '', 'admin.banner_group.index', 'manage_banners', 15, 2, 1, '2015-09-03 11:10:29', '2015-09-04 18:16:58'),
(19, 'fa-circle-o', 'Tùy chỉnh', 'tuy-chinh', '', 'admin.option.index', 'manage_options', 11, 1, 1, '2015-09-04 18:16:48', '2015-09-04 18:16:59'),
(20, 'fa-camera', 'Thư viện', 'thu-vien', '', 'admin.filemanager', 'read', 0, 7, 1, '2015-09-04 19:10:50', '2015-09-10 19:28:20'),
(21, 'fa-circle-o', 'Khách hàng', 'khach-hang', '', 'admin.subs.index', 'manage_customers', 0, 9, 1, '2015-09-05 11:13:30', '2015-09-10 19:28:20'),
(25, 'fa-circle-o', 'Quốc gia', 'quoc-gia', '', 'admin.country.index', 'manage_locations', 0, 5, 1, '2015-09-07 01:50:24', '2015-09-09 08:15:07'),
(26, 'fa-circle-o', 'Danh sách trạng thái', 'danh-sach-trang-thai', '', 'admin.status.index', 'manage_status', 11, 4, 1, '2015-09-10 18:24:20', '2015-09-10 19:28:20'),
(27, 'fa-home', 'Quản lý khách sạn', 'quan-ly-khach-san', '', 'admin.hotel.index', 'manage_hotels', 28, 1, 1, '2015-09-10 19:28:03', '2015-09-10 21:35:05'),
(28, 'fa-home', 'Khách sạn', 'khach-san', '', '', 'manage_hotels', 0, 6, 1, '2015-09-10 21:34:50', '2015-09-10 21:35:04'),
(29, 'fa-circle-o', 'Loại phòng', 'loai-phong', '', 'admin.roomtype.index', 'manage_hotels', 28, 100, 1, '2015-09-10 21:48:45', '2015-09-10 21:50:06');

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE IF NOT EXISTS `banners` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `open_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '_blank',
  `order` int(11) NOT NULL DEFAULT '10',
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `image`, `link`, `open_type`, `order`, `status`, `created_at`, `updated_at`) VALUES
(1, '/uploads/CNqtSflWoAEJUlO.png', 'http://google.com.vn', '', 10, 1, '2015-09-03 11:44:06', '2015-09-03 11:54:22'),
(2, '/uploads/898738174_397136704.JPG', '', '', 10, 1, '2015-09-03 11:48:36', '2015-09-03 19:03:43'),
(3, '/uploads/1053755918_451425990.jpg', 'http://google.com.vn', '_blank', 10, 1, '2015-09-03 19:00:15', '2015-09-03 19:00:15');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `object_id` int(11) NOT NULL,
  `cm_author_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cm_author_email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cm_author_url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cm_author_ip` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cm_content` text COLLATE utf8_unicode_ci NOT NULL,
  `cm_agent` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cm_parent` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE IF NOT EXISTS `countries` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `icon` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `visa_1` decimal(15,2) NOT NULL,
  `visa_2` decimal(15,2) NOT NULL,
  `type` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'country',
  `parent` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `icon`, `status`, `visa_1`, `visa_2`, `type`, `parent`, `created_at`, `updated_at`) VALUES
(1, 'vi.png', 1, '1000000.00', '2000000.00', 'country', 0, '2015-09-07 02:04:50', '2015-09-07 02:18:41'),
(2, 'th.png', 1, '2000000.00', '3000000.00', 'country', 1, '2015-09-07 02:12:54', '2015-09-09 07:55:57'),
(3, 'JP.png', 1, '2000000.00', '3000000.00', 'country', 0, '2015-09-07 02:45:00', '2015-09-10 23:39:30');

-- --------------------------------------------------------

--
-- Table structure for table `country_lang`
--

CREATE TABLE IF NOT EXISTS `country_lang` (
  `country_lang_id` int(11) NOT NULL AUTO_INCREMENT,
  `country_id` int(11) NOT NULL,
  `lang_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lang_type` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`country_lang_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=27 ;

--
-- Dumping data for table `country_lang`
--

INSERT INTO `country_lang` (`country_lang_id`, `country_id`, `lang_id`, `name`, `slug`, `lang_type`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Việt Nam', 'viet-nam', 'App\\Model\\Country', '2015-09-07 09:04:50', '2015-09-07 09:04:50'),
(2, 1, 2, 'Vietnam', 'vietnam', 'App\\Model\\Country', '2015-09-07 09:04:50', '2015-09-07 09:04:50'),
(3, 2, 1, 'Singapo', 'singapo', 'App\\Model\\Country', '2015-09-07 09:12:54', '2015-09-07 09:12:54'),
(4, 2, 2, 'Singapo', 'singapo', 'App\\Model\\Country', '2015-09-07 09:12:54', '2015-09-07 09:12:54'),
(5, 3, 1, 'Nhật bản', 'nhat-ban', 'App\\Model\\Country', '2015-09-07 09:45:00', '2015-09-07 09:45:00'),
(6, 3, 2, 'Japan', 'japan', 'App\\Model\\Country', '2015-09-07 09:45:00', '2015-09-07 09:45:00'),
(13, 2, 1, 'Hà Nội', 'ha-noi', 'App\\Model\\Province', '2015-09-09 14:44:54', '2015-09-09 14:44:54'),
(14, 2, 2, 'Ha Noi', 'ha-noi', 'App\\Model\\Province', '2015-09-09 14:44:54', '2015-09-09 14:44:54'),
(15, 3, 1, 'TP Hồ Chí Minh', 'tp-ho-chi-minh', 'App\\Model\\Province', '2015-09-09 14:51:22', '2015-09-09 14:51:22'),
(16, 3, 2, 'Ho Chi Minh City', 'ho-chi-minh-city', 'App\\Model\\Province', '2015-09-09 14:51:22', '2015-09-09 14:51:22'),
(17, 4, 1, 'Tỉnh 1', 'tinh-1', 'App\\Model\\Province', '2015-09-11 03:38:58', '2015-09-11 03:38:58'),
(18, 4, 2, 'Province', 'province', 'App\\Model\\Province', '2015-09-11 03:38:58', '2015-09-11 03:38:58'),
(19, 5, 1, 'Tỉnh 2', 'tinh-2', 'App\\Model\\Province', '2015-09-11 03:39:16', '2015-09-11 03:39:16'),
(20, 5, 2, 'Province 2', 'province-2', 'App\\Model\\Province', '2015-09-11 03:39:16', '2015-09-11 03:39:16'),
(25, 6, 1, 'Khánh Hòa', 'khanh-hoa', 'App\\Model\\Province', '2015-09-11 08:52:35', '2015-09-11 08:52:35'),
(26, 6, 2, 'Khanh Hoa', 'khanh-hoa', 'App\\Model\\Province', '2015-09-11 08:52:35', '2015-09-11 08:52:35');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE IF NOT EXISTS `customers` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `fullname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'unconfirmed',
  `key_active` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ip` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `fullname`, `email`, `phone`, `address`, `status`, `key_active`, `description`, `ip`, `created_at`, `updated_at`) VALUES
(1, 'Nguyễn Văn A', 'nguyenvana@gmail.com', '08384732374', 'Nghệ An', 'confirmed', '68f5f844896ee7a4626da5678045ec26', '', '::1', '2015-09-05 11:22:26', '2015-09-05 11:22:26'),
(2, 'Họ Văn Tên', 'customer@gmail.com', '0985265478', 'Hà Nội', 'unconfirmed', '70402dcd961a2361cbae772294e3eb63', '', '::1', '2015-09-05 11:24:19', '2015-09-05 11:27:00');

-- --------------------------------------------------------

--
-- Table structure for table `hotels`
--

CREATE TABLE IF NOT EXISTS `hotels` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `province_id` int(11) DEFAULT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `images` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `hotline` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fax` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `star` smallint(6) DEFAULT '1',
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Dumping data for table `hotels`
--

INSERT INTO `hotels` (`id`, `province_id`, `image`, `images`, `hotline`, `email`, `fax`, `phone`, `star`, `status`, `created_at`, `updated_at`) VALUES
(3, 2, '/uploads/08-2015-488842_15062215140030247836.jpg', NULL, '0985214562', 'hotel1@gmail.com', '874125756', '0978567899', 5, 2, '2015-09-10 20:59:30', '2015-09-10 21:27:42'),
(4, 3, '/uploads/08-2015-898738174_397136704-1.JPG', NULL, '0235624812', 'hotel2@gmail.com', '8426535841', '0845236589', 4, 2, '2015-09-10 21:08:16', '2015-09-10 21:27:53');

-- --------------------------------------------------------

--
-- Table structure for table `hotel_lang`
--

CREATE TABLE IF NOT EXISTS `hotel_lang` (
  `hotel_lang_id` int(11) NOT NULL AUTO_INCREMENT,
  `object_id` int(11) NOT NULL,
  `lang_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `note` text COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lang_type` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`hotel_lang_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=17 ;

--
-- Dumping data for table `hotel_lang`
--

INSERT INTO `hotel_lang` (`hotel_lang_id`, `object_id`, `lang_id`, `name`, `slug`, `content`, `note`, `address`, `lang_type`, `created_at`, `updated_at`) VALUES
(5, 3, 1, 'Khách sạn 1', 'khach-san-1', '<p>Since all types of Eloquent relationships are defined via functions, you may call those functions to obtain an instance of the relationship without actually executing the relationship queries. In addition</p>', 'Since all types of Eloquent relationships are defined via functions, you may call those functions to obtain an instance of the relationship without actually executing the relationship queries. In addition', 'Nguyễn Trãi - Thanh Xuân', 'App\\Model\\Hotel', '2015-09-11 03:59:30', '2015-09-11 03:59:30'),
(6, 3, 2, 'Hotel 1', 'hotel-1', '<p>Since all types of Eloquent relationships are defined via functions, you may call those functions to obtain an instance of the relationship without actually executing the relationship queries. In addition</p>', 'Since all types of Eloquent relationships are defined via functions, you may call those functions to obtain an instance of the relationship without actually executing the relationship queries. In addition', '', 'App\\Model\\Hotel', '2015-09-11 03:59:30', '2015-09-11 03:59:30'),
(7, 4, 1, 'Khách sạn 2', 'khach-san-2', '<p>Since all types of Eloquent relationships are defined via functions, you may call those functions to obtain an instance of the relationship without actually executing the relationship queries. In addition</p>', 'Since all types of Eloquent relationships are defined via functions, you may call those functions to obtain an instance of the relationship without actually executing the relationship queries. In addition', 'Thanh xuân', 'App\\Model\\Hotel', '2015-09-11 04:08:16', '2015-09-11 04:08:16'),
(8, 4, 2, 'Hotel 2', 'hotel-2', '<p>Since all types of Eloquent relationships are defined via functions, you may call those functions to obtain an instance of the relationship without actually executing the relationship queries. In addition</p>', 'Since all types of Eloquent relationships are defined via functions, you may call those functions to obtain an instance of the relationship without actually executing the relationship queries. In addition', 'Thanh xuan', 'App\\Model\\Hotel', '2015-09-11 04:08:16', '2015-09-11 04:08:16'),
(11, 1, 1, 'Phòng cao cấp ms01', 'phong-cao-cap-ms01', '<p>&nbsp;Sometimes you may need to eager load a relationship after the parent model has already been retrieved. For example, this may be useful if you need to dynamically decide whether to load related models:</p>', '', '', 'App\\Model\\Room', '2015-09-11 07:55:23', '2015-09-11 07:55:23'),
(12, 1, 2, 'Premium room ms01', 'premium-room-ms01', '<p>&nbsp;Sometimes you may need to eager load a relationship after the parent model has already been retrieved. For example, this may be useful if you need to dynamically decide whether to load related models:</p>', '', '', 'App\\Model\\Room', '2015-09-11 07:55:23', '2015-09-11 07:55:23'),
(13, 2, 1, 'Phòng số 32', 'phong-so-32', '', '', '', 'App\\Model\\Room', '2015-09-11 08:26:30', '2015-09-11 08:26:30'),
(14, 2, 2, 'Room number 32', 'room-number-32', '', '', '', 'App\\Model\\Room', '2015-09-11 08:26:30', '2015-09-11 08:26:30');

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE IF NOT EXISTS `languages` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `lang_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `icon` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `folder` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `order` int(11) NOT NULL,
  `unit` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `ratio_currency` double(8,2) NOT NULL DEFAULT '1.00',
  `default` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`id`, `lang_name`, `code`, `icon`, `folder`, `status`, `order`, `unit`, `ratio_currency`, `default`, `created_at`, `updated_at`) VALUES
(1, 'Việt Nam', 'vi', 'vi.png', 'vi', 1, 0, 'VNĐ', 1.00, 1, '2015-08-26 11:39:56', '2015-08-26 11:51:20'),
(2, 'English', 'en', 'en.png', 'en', 1, 0, '$', 22345.00, 0, '2015-08-26 11:42:13', '2015-08-26 11:51:20');

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE IF NOT EXISTS `menus` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `group_id` int(11) NOT NULL,
  `parent` int(11) NOT NULL,
  `type` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `type_id` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `icon` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `open_type` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `order` int(11) NOT NULL DEFAULT '100',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=19 ;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `group_id`, `parent`, `type`, `type_id`, `status`, `icon`, `open_type`, `order`, `created_at`, `updated_at`) VALUES
(10, 15, 0, 'cat', 4, 1, 'fa-circle-o', '', 2, '2015-09-02 19:08:43', '2015-09-09 08:11:32'),
(11, 15, 0, 'page', 1, 1, 'fa-circle-o', '', 8, '2015-09-02 19:10:55', '2015-09-09 08:11:32'),
(12, 15, 0, 'custom', 0, 1, 'fa-circle-o', '_blank', 6, '2015-09-02 19:12:33', '2015-09-09 08:11:32'),
(13, 15, 0, 'cat', 14, 1, 'fa-circle-o', '', 7, '2015-09-03 01:28:36', '2015-09-09 08:11:32'),
(14, 15, 0, 'cat', 3, 1, 'fa-circle-o', '', 3, '2015-09-04 22:14:42', '2015-09-09 08:11:32'),
(15, 15, 0, 'page', 2, 1, 'fa-circle-o', '', 9, '2015-09-05 08:11:13', '2015-09-09 08:11:32'),
(16, 15, 0, 'custom', 0, 1, 'fa-circle-o', '', 1, '2015-09-05 11:52:38', '2015-09-06 11:16:42'),
(17, 15, 0, 'custom', 0, 1, 'fa-circle-o', '', 4, '2015-09-06 10:56:11', '2015-09-09 08:11:32'),
(18, 15, 0, 'custom', 0, 1, 'fa-circle-o', '', 5, '2015-09-06 10:56:29', '2015-09-09 08:11:32');

-- --------------------------------------------------------

--
-- Table structure for table `menu_desc`
--

CREATE TABLE IF NOT EXISTS `menu_desc` (
  `menu_id` int(11) NOT NULL,
  `lang_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `menu_desc`
--

INSERT INTO `menu_desc` (`menu_id`, `lang_id`, `name`, `slug`, `link`, `created_at`, `updated_at`) VALUES
(10, 1, 'Tin Tức', '', 'http://localhost:8000/tin-tuc/cat-4', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(10, 2, 'News', '', 'http://localhost:8000/news/cat-4', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(11, 1, 'Giới thiệu', '', 'http://localhost:8000/gioi-thieu/page-1', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(11, 2, 'About', '', 'http://localhost:8000/about/page-1', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(12, 1, 'Diễn đàn', '', 'https://google.com.vn', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(12, 2, 'Forums', '', 'http://google.com.vn', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(13, 1, 'Bóng đá', '', 'http://localhost:8000/bong-da/cat-14', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(13, 2, 'Football', '', 'http://localhost:8000/football/cat-14', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(14, 1, 'Sự kiện', '', 'http://localhost:8000/su-kien/cat-3', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(14, 2, 'Events', '', 'http://localhost:8000/events/cat-3', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(15, 1, 'Liên hệ', '', 'http://localhost:8000/lien-he/page-2', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(15, 2, 'Contact', '', 'http://localhost:8000/contact/page-2', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(16, 1, 'Trang chủ', '', 'http://localhost:8000', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(16, 2, 'Home', '', 'http://localhost:8000', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(17, 1, 'Sản phẩm', '', 'http://localhost:8000/product/all', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(17, 2, 'Products', '', 'http://localhost:8000/product/all', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(18, 1, 'Blogs', '', 'http://localhost:8000/blogs', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(18, 2, 'Blogs', '', 'http://localhost:8000/blogs', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1),
('2015_08_19_170312_create_tbl_languages', 2),
('2015_08_27_152622_create_post_tbl', 3),
('2015_08_27_153607_create_cat_tbl', 3),
('2015_08_31_150508_create_page_tbl', 4),
('2015_09_01_002453_create_admin_menu_tbl', 5),
('2015_09_02_140306_create_menus_tbl', 6),
('2015_09_03_090748_create_slides_tbl', 7),
('2015_09_03_181356_create_banners_tbl', 8),
('2015_09_04_072310_create_options_tbl', 9),
('2015_09_05_173103_customers', 10),
('2015_09_06_034714_create_products_tbl', 11),
('2015_09_07_061442_create_comments_tbl', 12);

-- --------------------------------------------------------

--
-- Table structure for table `options`
--

CREATE TABLE IF NOT EXISTS `options` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `lang_id` int(11) NOT NULL,
  `key` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `value` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=14 ;

--
-- Dumping data for table `options`
--

INSERT INTO `options` (`id`, `lang_id`, `key`, `name`, `value`, `created_at`, `updated_at`) VALUES
(4, 0, '_paginate', 'Phân trang', '20', '2015-09-04 01:47:14', '2015-09-04 09:32:38'),
(11, 1, 'site_title', 'Tiêu đề trang', 'Laravel cms', '2015-09-04 09:32:24', '2015-09-04 09:32:31'),
(12, 2, 'site_title', 'Tiêu đề trang', 'Laravel cms English', '2015-09-04 09:32:24', '2015-09-04 09:32:24'),
(13, 0, 'mainmenu', 'Menu chính', '15', '2015-09-04 21:35:28', '2015-09-04 21:35:28');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE IF NOT EXISTS `pages` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image_ids` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `author_id` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `template` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `views` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `image`, `image_ids`, `author_id`, `status`, `template`, `views`, `created_at`, `updated_at`) VALUES
(1, '/uploads/1053755918_451425990.jpg', '', 1, 2, '', 0, '2015-08-31 09:15:59', '2015-08-31 09:15:59'),
(2, '/uploads/898738174_397136704.JPG', '', 1, 2, 'contact', 0, '2015-09-04 20:04:02', '2015-09-04 20:09:42');

-- --------------------------------------------------------

--
-- Table structure for table `page_desc`
--

CREATE TABLE IF NOT EXISTS `page_desc` (
  `page_id` int(11) NOT NULL,
  `lang_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `excerpt` text COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `custom` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `page_desc`
--

INSERT INTO `page_desc` (`page_id`, `lang_id`, `name`, `slug`, `excerpt`, `content`, `custom`, `created_at`, `updated_at`) VALUES
(1, 1, 'Giới thiệu', 'gioi-thieu', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(1, 2, 'About', 'about', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 1, 'Liên hệ', 'lien-he', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 2, 'Contact', 'contact', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image_ids` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `author_id` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `comment_status` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '1',
  `comment_count` int(11) NOT NULL DEFAULT '0',
  `post_type` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'post',
  `views` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `image`, `image_ids`, `author_id`, `status`, `comment_status`, `comment_count`, `post_type`, `views`, `created_at`, `updated_at`) VALUES
(4, '/uploads/898738174_397136704.JPG', '', 1, 2, '', 0, '', 0, '2015-08-30 15:37:40', '2015-09-03 21:13:15'),
(5, '/uploads/CNqtSflWoAEJUlO.png', '', 1, 2, '', 0, '', 0, '2015-08-31 04:10:33', '2015-09-03 10:47:34'),
(6, '/uploads/105181.jpg', '', 1, 2, '', 0, '', 0, '2015-08-31 04:20:38', '2015-08-31 04:20:38');

-- --------------------------------------------------------

--
-- Table structure for table `post_desc`
--

CREATE TABLE IF NOT EXISTS `post_desc` (
  `post_id` int(11) NOT NULL,
  `lang_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `excerpt` text COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `custom` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `post_desc`
--

INSERT INTO `post_desc` (`post_id`, `lang_id`, `name`, `slug`, `excerpt`, `content`, `custom`, `created_at`, `updated_at`) VALUES
(4, 1, 'Bãi Biển Nha Trang', 'bai-bien-nha-trang', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 2, '', '', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 1, 'CĐV nhí há hốc mồm, nhìn Rooney như vật thể lạ', 'cdv-nhi-ha-hoc-mom,-nhin-rooney-nhu-vat-the-la', 'Có lẽ, việc lần đầu tiên chứng kiến “ngôi sao” Wayne Rooney bằng xương bằng thịt đã khiến cậu bé này không kìm được cảm xúc. Điều đáng nói là “gã Shrek” không hề hay biết về sự xuất hiện của chú bé đang nhìn anh với ánh mắt tò mò', '<table border="0" width="100%" cellspacing="0" cellpadding="0">\r\n<tbody>\r\n<tr>\r\n<td>\r\n<div class="art_brief">\r\n<h5>C&oacute; lẽ, lần đầu chứng kiến &ldquo;ng&ocirc;i sao&rdquo; Wayne Rooney bằng xương bằng thịt m&agrave; cậu b&eacute; mascots của Swansea đ&atilde; c&oacute; h&agrave;nh động&hellip; bất thường.</h5>\r\n</div>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td class="style6" align="left" valign="top">\r\n<div class="art_content">\r\n<div style="text-align: justify;"><span style="font-family: arial; font-size: small;">&nbsp;</span></div>\r\n<div style="text-align: justify;"><span style="font-family: arial; font-size: small;">Một đoạn video trong đường hầm SVĐ Liberty ghi lại cảnh cậu b&eacute; mascots của Swansea đ&atilde; &ldquo;mắt chữ A, mồm chữ O&rdquo; khi chứng kiến sự xuất hiện của Wayne Rooney. Kh&ocirc;ng chỉ vậy, cậu b&eacute; &ldquo;kh&aacute;m ph&aacute;&rdquo; tiền đạo người Anh như vật thể lạ.</span></div>\r\n<div style="text-align: justify;"><span style="font-family: arial; font-size: small;">&nbsp;</span></div>\r\n<div style="text-align: center;"><img src="https://pbs.twimg.com/media/CNqtSflWoAEJUlO.png" alt="" width="500" align="none" /></div>\r\n<div style="text-align: center;"><span style="color: #0000cc; font-family: arial; font-size: small;"><em>Phản ứng của CĐV nh&iacute; khi gặp Wayne Rooney</em></span></div>\r\n<div style="text-align: justify;"><span style="font-family: arial; font-size: small;">&nbsp;</span></div>\r\n<div style="text-align: justify;"><span style="font-family: arial; font-size: small;">C&oacute; lẽ, việc lần đầu ti&ecirc;n chứng kiến &ldquo;ng&ocirc;i sao&rdquo; Wayne Rooney bằng xương bằng thịt đ&atilde; khiến cậu b&eacute; n&agrave;y kh&ocirc;ng k&igrave;m được cảm x&uacute;c. Điều đ&aacute;ng n&oacute;i l&agrave; &ldquo;g&atilde; Shrek&rdquo; kh&ocirc;ng hề hay biết về sự xuất hiện của ch&uacute; b&eacute; đang nh&igrave;n anh với &aacute;nh mắt t&ograve; m&ograve;.</span></div>\r\n<div style="text-align: justify;"><span style="font-family: arial; font-size: small;">&nbsp;</span></div>\r\n<div style="text-align: justify;"><span style="font-family: arial; font-size: small;">Trong trận đấu ở Liberty h&ocirc;m qua, Wayne Rooney đ&atilde; c&oacute; trận đấu kh&ocirc;ng th&agrave;nh c&ocirc;ng. Đ&acirc;y l&agrave; trận đấu thứ 10 li&ecirc;n tiếp ở Premier League, tiền đạo n&agrave;y kh&ocirc;ng thể chọc thủng lưới đối phương, chuỗi trận tồi tệ nhất của Wayne Rooney kể từ th&aacute;ng 12/2003.</span></div>\r\n</div>\r\n</td>\r\n</tr>\r\n</tbody>\r\n</table>', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 2, '', '', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 1, 'Sau vòng 4 Premier League: Khó cưỡng', 'sau-vong-4-premier-league:-kho-cuong', '', '<table border="0" width="100%" cellspacing="0" cellpadding="0">\r\n<tbody>\r\n<tr>\r\n<td>\r\n<div class="art_brief">\r\n<h5>Man City tiếp tục thể hiện sức mạnh tuyệt đối tại Premier League trong bối cảnh c&aacute;c &ocirc;ng lớn kh&aacute;c thay nhau ng&atilde; ngựa v&agrave; g&acirc;y thất vọng.</h5>\r\n</div>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td class="style6" align="left" valign="top">\r\n<div class="art_content">\r\n<div style="text-align: justify;"><span style="font-family: arial; font-size: small;">&nbsp;</span></div>\r\n<div style="text-align: justify;"><span style="font-family: arial; font-size: small;">V&ograve;ng thứ 4 li&ecirc;n tiếp, Man City to&agrave;n thắng v&agrave; kh&ocirc;ng để thủng lưới. Tr&ecirc;n s&acirc;n nh&agrave; Etihad, đội b&oacute;ng &aacute;o xanh nhẹ nh&agrave;ng vượt qua t&acirc;n binh Watford với tỉ số 2-0. Điều đ&aacute;ng n&oacute;i l&agrave; trong khi Sergio Aguero bất ngờ tỏ ra v&ocirc; duy&ecirc;n, Yaya Toure vừa đ&aacute; vừa đi bộ th&igrave; The Citizens vẫn c&ograve;n c&aacute;c ng&ocirc;i sao kh&aacute;c sẵn s&agrave;ng tỏa s&aacute;ng như Raheem Sterling hay David Silva.</span></div>\r\n<div style="text-align: justify;"><span style="font-family: arial; font-size: small;">&nbsp;</span></div>\r\n<div style="text-align: center;"><span style="font-family: arial; font-size: small;"><img src="http://i.dailymail.co.uk/i/pix/2015/08/30/13/2BC5DF2500000578-0-image-a-41_1440939261687.jpg" alt="" width="500" align="none" /></span></div>\r\n<div style="text-align: center;"><em><span style="color: #0000cc; font-family: arial; font-size: small;">Man City đang bay cao</span></em></div>\r\n<div style="text-align: justify;"><span style="font-family: arial; font-size: small;">&nbsp;</span></div>\r\n<div style="text-align: justify;"><span style="font-family: arial; font-size: small;">4 trận đ&atilde; qua l&agrave; 4 lần Man City đụng độ c&aacute;c &ldquo;đối tượng&rdquo; kh&aacute;c nhau tại Premier League, từ Chelsea cho đến Watford, họ đều thể hiện được sự vượt trội trong mặt tấn c&ocirc;ng. Duy nhất Everton &iacute;t nhiều tạo ra kh&oacute; khăn cho The Citizens nhưng vẫn kh&ocirc;ng thể cưỡng lại sức mạnh của đội b&oacute;ng n&agrave;y.</span></div>\r\n<div style="text-align: justify;"><span style="font-family: arial; font-size: small;">&nbsp;</span></div>\r\n<div style="text-align: justify;"><span style="font-family: arial; font-size: small;">Khởi đầu ho&agrave;n hảo th&ocirc;i chưa đủ, Man City c&ograve;n khiến tất cả phải e sợ khi tiếp tục ph&aacute; kỷ lục chi&ecirc;u mộ Kevin de Bruyne. Trước đ&oacute;, họ đ&atilde; mua trung vệ &ldquo;xịn&rdquo; Nicolas Otamendi nhưng chưa thể sử dụng. Khi 2 t&acirc;n binh n&agrave;y sẵn s&agrave;ng, Man City c&oacute; thể sẽ c&oacute; đội h&igrave;nh ho&agrave;n hảo nhất trong nhiều năm trở lại đ&acirc;y v&agrave; tất nhi&ecirc;n, họ chắc chắn l&agrave; ứng cử vi&ecirc;n v&ocirc; địch số 1 ở m&ugrave;a giải n&agrave;y.</span></div>\r\n<div style="text-align: justify;"><span style="font-family: arial; font-size: small;">&nbsp;</span></div>\r\n<div style="text-align: justify;"><span style="font-family: arial; font-size: small;">Chắc chắn bởi lẽ, kh&ocirc;ng những Man City đ&aacute; qu&aacute; hay m&agrave; c&aacute;c đối thủ trực tiếp của họ như Chelsea, Arsenal, Man Utd hay Liverpool đều bộc lộ một loạt vấn đề.&nbsp;</span></div>\r\n<div style="text-align: justify;"><span style="font-family: arial; font-size: small;">&nbsp;</span></div>\r\n<div style="text-align: justify;"><span style="font-family: arial; font-size: small;">Tr&ecirc;n s&acirc;n nh&agrave;, Chelsea thua t&acirc;m phục khẩu phục Crystal Palace trong một trận đấu m&agrave; Jose Mourinho ước rằng &ocirc;ng c&oacute; thể thay &iacute;t nhất 4 người. N&oacute;i đơn giản, Chelsea đang gặp vấn đề ở 4 vị tr&iacute; kh&aacute;c nhau l&agrave; hậu vệ phải, trung vệ, tiền vệ trung t&acirc;m v&agrave; tiền đạo. &nbsp;</span></div>\r\n<div style="text-align: justify;"><span style="font-family: arial; font-size: small;">&nbsp;</span></div>\r\n<div style="text-align: justify;"><span style="font-family: arial; font-size: small;">Trong khi sự sa s&uacute;t của The Blues khiến nhiều người bất ngờ th&igrave; c&aacute;c thất bại của Liverpool hay Man Utd kh&ocirc;ng khiến nhiều người ngạc nhi&ecirc;n, cho d&ugrave; trước đ&oacute; họ l&agrave; những đội chưa từng thủng lưới ở m&ugrave;a giải n&agrave;y.</span></div>\r\n<div style="text-align: justify;"><span style="font-family: arial; font-size: small;">&nbsp;</span></div>\r\n<div style="text-align: justify;"><span style="font-family: arial; font-size: small;">Tại Anfield, Liverpool thua trắng West Ham 3 b&agrave;n kh&ocirc;ng gỡ. Thẻ đỏ của Coutinho kh&ocirc;ng phải l&yacute; do dẫn đến thất bại n&agrave;y, bởi lẽ trước khi ng&ocirc;i sao người Brazil bị đuổi, The Reds đ&atilde; để đối thủ ghi 2 b&agrave;n thắng ngay trong hiệp 1. Vấn đề của họ vẫn l&agrave; những c&acirc;u chuyện cũ, đ&oacute; l&agrave; h&agrave;ng ph&ograve;ng ngự lỏng lẻo với điểm đen Lovren, h&agrave;ng tiền vệ thiếu kết d&iacute;nh khi Henderson vắng mặt, v&agrave; h&agrave;ng c&ocirc;ng thiếu &yacute; tưởng khi tiền đạo cắm duy nhất (Benteke) tỏ ra kh&ocirc;ng th&iacute;ch nghi với lối chơi của to&agrave;n đội.&nbsp;</span></div>\r\n<div style="text-align: justify;"><span style="font-family: arial; font-size: small;">&nbsp;</span></div>\r\n<div style="text-align: center;"><span style="font-family: arial; font-size: small;"><img src="http://i.dailymail.co.uk/i/pix/2015/08/30/23/2BC74CBD00000578-0-image-m-7_1440975227098.jpg" alt="" width="500" align="none" /></span></div>\r\n<div style="text-align: justify;"><span style="font-family: arial; font-size: small;">&nbsp;</span></div>\r\n<div style="text-align: justify;"><span style="font-family: arial; font-size: small;">Về ph&iacute;a Man Utd, d&ugrave; thi đấu kh&ocirc;ng qu&aacute; tệ như Liverpool nhưng thất bại trước Swansea đ&atilde; phơi b&agrave;y bộ mặt thật của họ, đặc biệt ở vị tr&iacute; thủ m&ocirc;n của Romero v&agrave; bộ đ&ocirc;i trung vệ &ldquo;chắp v&aacute;&rdquo; Smalling - Blind. Ri&ecirc;ng phong độ k&eacute;m cỏi của Rooney đ&atilde; l&agrave; c&acirc;u chuyện qu&aacute; quen thuộc v&agrave; kh&ocirc;ng cần nhắc nhiều th&ecirc;m.</span></div>\r\n<div style="text-align: justify;"><span style="font-family: arial; font-size: small;">&nbsp;</span></div>\r\n<div style="text-align: justify;"><span style="font-family: arial; font-size: small;">Trong khi đ&oacute;, Arsenal d&ugrave; thắng trận trước Newcastle nhưng vẫn chịu kh&aacute; nhiều chỉ tr&iacute;ch v&igrave; c&aacute;ch tấn c&ocirc;ng bế tắc v&agrave; thiếu &yacute; tưởng. Trong ng&agrave;y Mesut Ozil vắng mặt, c&aacute;c đường l&ecirc;n b&oacute;ng của Ph&aacute;o thủ thiếu đi sự mềm mại v&agrave; đột biến cần thiết. Ch&iacute;nh v&igrave; thế, họ phải cần đến sự may mắn để chọc thủng h&agrave;ng ph&ograve;ng ngự của Newcastle cho d&ugrave; được thi đấu hơn người ngay từ ph&uacute;t thứ 5.</span></div>\r\n<div style="text-align: justify;"><span style="font-family: arial; font-size: small;">&nbsp;</span></div>\r\n<div style="text-align: justify;"><span style="font-family: arial; font-size: small;">Vấn đề lớn nhất của Arsenal giống như Man Utd, nằm ở vị tr&iacute; tiền đạo. Ở v&ograve;ng đấu n&agrave;y, HLV Wenger tiếp tục xoay v&ograve;ng giữa Theo Walcott v&agrave; Oliver Giroud nhưng kh&ocirc;ng đem lại kết quả. Nếu kh&ocirc;ng bổ sung một ch&acirc;n s&uacute;t đẳng cấp trong ng&agrave;y cuối c&ugrave;ng của kỳ chuyển nhượng, kh&oacute; ai c&oacute; thể đặt niềm tin rằng Arsenal sẽ cạnh tranh chức v&ocirc; địch v&agrave;o cuối m&ugrave;a giải n&agrave;y.</span></div>\r\n<div style="text-align: justify;"><span style="font-family: arial; font-size: small;">&nbsp;</span></div>\r\n<div style="text-align: justify;"><span style="font-family: arial; font-size: small;">Ở c&aacute;c trận đấu kh&aacute;c, Tottenham tiếp tục g&acirc;y thất vọng với trận h&ograve;a 0-0 với Everton tr&ecirc;n s&acirc;n nh&agrave; White Hart Lane. Sau 4 v&ograve;ng đấu, đội b&oacute;ng &aacute;o trắng vẫn chưa biết m&ugrave;i chiến thắng v&agrave; tụt xuống vị tr&iacute; thứ 16 tr&ecirc;n BXH. Trong khi đ&oacute;, Southampton c&oacute; được chiến thắng đầu tay khi đ&egrave; bẹp Norwich 3-0, Leicester nối d&agrave;i mạch bất bại với trận h&ograve;a 1-1 tr&ecirc;n s&acirc;n Bournemouth, Stoke thua trận thứ 2 tr&ecirc;n s&acirc;n nh&agrave; trước West Brom trong bối cảnh bị đuổi 2 người ngay trong hiệp 1.</span></div>\r\n</div>\r\n</td>\r\n</tr>\r\n</tbody>\r\n</table>', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 2, '', '', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `provincial`
--

CREATE TABLE IF NOT EXISTS `provincial` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `order` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Dumping data for table `provincial`
--

INSERT INTO `provincial` (`id`, `parent`, `status`, `order`, `created_at`, `updated_at`) VALUES
(2, 1, 1, 0, '2015-09-09 07:44:54', '2015-09-09 07:44:54'),
(3, 1, 1, 1, '2015-09-09 07:51:22', '2015-09-09 07:58:20'),
(4, 2, 1, 0, '2015-09-10 20:38:58', '2015-09-10 20:38:58'),
(5, 2, 1, 0, '2015-09-10 20:39:16', '2015-09-10 20:39:16'),
(6, 1, 1, 0, '2015-09-11 01:52:35', '2015-09-11 01:52:35');

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE IF NOT EXISTS `rooms` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `hotel_id` int(11) NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `images` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `type_id` int(11) NOT NULL,
  `price` decimal(15,2) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `hotel_id`, `image`, `images`, `type_id`, `price`, `status`, `created_at`, `updated_at`) VALUES
(1, 4, '/uploads/1053755918_451425990.jpg', '', 30, '4500000.00', 2, '2015-09-11 00:55:23', '2015-09-11 00:55:23'),
(2, 3, '/uploads/08-2015-898738174_397136704-1.JPG', '', 29, '2300000.00', 2, '2015-09-11 01:26:29', '2015-09-11 01:26:29');

-- --------------------------------------------------------

--
-- Table structure for table `slides`
--

CREATE TABLE IF NOT EXISTS `slides` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `group_id` int(11) NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `open_type` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT '_blank',
  `order` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `params` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `slides`
--

INSERT INTO `slides` (`id`, `group_id`, `image`, `link`, `open_type`, `order`, `status`, `params`, `created_at`, `updated_at`) VALUES
(1, 18, 'http://localhost:8000/uploads/CNqtSflWoAEJUlO.png', 'http://google.com.vn', '_blank', 10, 1, '', '2015-09-03 09:26:44', '2015-09-03 09:26:44'),
(2, 18, 'http://localhost:8000/uploads/105181.jpg', 'http://google.com.vn', '_blank', 10, 1, '', '2015-09-03 09:28:19', '2015-09-03 09:28:19');

-- --------------------------------------------------------

--
-- Table structure for table `slide_desc`
--

CREATE TABLE IF NOT EXISTS `slide_desc` (
  `slide_id` int(11) NOT NULL,
  `lang_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `custom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `slide_desc`
--

INSERT INTO `slide_desc` (`slide_id`, `lang_id`, `name`, `description`, `custom`, `created_at`, `updated_at`) VALUES
(1, 1, 'slide 11', 'mo ta slide 11', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(1, 2, 'slide1', 'slide 1 description', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 1, 'slide2', 'mo ta slide 2', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 2, 'slide2', 'slide2 description', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE IF NOT EXISTS `status` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `status_id` int(11) NOT NULL,
  `lang_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`id`, `status_id`, `lang_id`, `name`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Bật', '2015-09-10 18:26:11', '2015-09-10 18:26:11'),
(2, 1, 2, 'Enable', '2015-09-10 18:26:11', '2015-09-10 18:26:11'),
(3, 2, 1, 'Tắt', '2015-09-10 18:26:24', '2015-09-10 18:26:24'),
(4, 2, 2, 'Disable', '2015-09-10 18:26:24', '2015-09-10 18:26:24');

-- --------------------------------------------------------

--
-- Table structure for table `taxs`
--

CREATE TABLE IF NOT EXISTS `taxs` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'cat',
  `dfname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `dfslug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `order` int(11) NOT NULL,
  `parent` int(11) NOT NULL DEFAULT '0',
  `count` int(11) NOT NULL DEFAULT '0',
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=32 ;

--
-- Dumping data for table `taxs`
--

INSERT INTO `taxs` (`id`, `image`, `type`, `dfname`, `dfslug`, `order`, `parent`, `count`, `status`, `created_at`, `updated_at`) VALUES
(2, '', 'cat', '', '', 0, 4, 0, 1, '2015-08-28 20:28:11', '2015-08-29 23:48:01'),
(3, '', 'cat', '', '', 0, 2, 0, 1, '2015-08-29 23:27:48', '2015-09-03 20:52:47'),
(4, '', 'cat', '', '', 0, 0, 0, 1, '2015-08-29 23:43:19', '2015-08-29 23:43:19'),
(8, '', 'tag', 'Tin tức', 'tin-tuc', 0, 0, 0, 1, '2015-08-30 07:53:12', '2015-08-30 08:13:56'),
(9, '', 'tag', 'Bóng đá', 'bong-da', 0, 0, 0, 1, '2015-08-30 07:53:34', '2015-08-30 10:03:37'),
(10, '', 'tag', 'Giáo dục', 'giao-duc', 0, 0, 0, 1, '2015-08-30 07:58:52', '2015-08-30 08:14:40'),
(11, '', 'tag', 'Xã hội', 'xa-hoi', 0, 0, 0, 1, '2015-08-30 07:59:00', '2015-08-30 07:59:00'),
(12, '', 'tag', 'khách sạn', 'khach-san', 0, 0, 0, 0, '2015-08-31 05:03:26', '2015-08-31 05:03:26'),
(14, '', 'cat', '', '', 0, 4, 0, 1, '2015-09-02 01:28:16', '2015-09-02 01:28:16'),
(15, '', 'menugroup', 'Primary Menu', 'primary-menu', 0, 0, 0, 1, '2015-09-02 06:46:23', '2015-09-02 06:46:23'),
(16, '', 'menugroup', 'Footer Menu', 'footer-menu', 0, 0, 0, 1, '2015-09-02 06:48:31', '2015-09-02 06:48:31'),
(18, '', 'slider', 'Main Slider', 'main-slider', 0, 0, 0, 1, '2015-09-03 01:45:52', '2015-09-03 01:45:52'),
(19, '', 'banner', 'Sidebar banner 1', 'sidebar-banner-1', 0, 0, 0, 1, '2015-09-03 11:22:07', '2015-09-03 11:22:07'),
(20, '', 'banner', 'Footer banner', 'footer-banner', 0, 0, 0, 1, '2015-09-03 18:54:35', '2015-09-03 18:54:35'),
(21, '', 'productcat', '', '', 0, 0, 0, 1, '2015-09-05 22:03:18', '2015-09-05 22:03:18'),
(22, '', 'productcat', '', '', 0, 0, 0, 1, '2015-09-05 22:03:56', '2015-09-05 22:03:56'),
(23, '', 'productcat', '', '', 0, 21, 0, 1, '2015-09-05 22:04:37', '2015-09-05 22:04:37'),
(24, '', 'productcat', '', '', 0, 21, 0, 1, '2015-09-05 22:05:01', '2015-09-05 22:05:01'),
(25, '', 'productcat', '', '', 0, 22, 0, 1, '2015-09-05 22:05:16', '2015-09-05 22:05:16'),
(27, '', 'tag', 'dieu hoa', 'dieu-hoa', 0, 0, 0, 0, '2015-09-05 23:22:31', '2015-09-05 23:22:31'),
(28, '', 'tag', 'laptop', 'laptop', 0, 0, 0, 0, '2015-09-05 23:27:31', '2015-09-05 23:27:31'),
(29, '', 'roomtype', '', '', 0, 0, 0, 1, '2015-09-10 21:57:02', '2015-09-10 21:57:02'),
(30, '', 'roomtype', '', '', 0, 0, 0, 1, '2015-09-10 21:58:32', '2015-09-10 21:58:32');

-- --------------------------------------------------------

--
-- Table structure for table `tax_banner`
--

CREATE TABLE IF NOT EXISTS `tax_banner` (
  `tax_id` int(11) NOT NULL,
  `banner_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tax_banner`
--

INSERT INTO `tax_banner` (`tax_id`, `banner_id`, `created_at`, `updated_at`) VALUES
(19, 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(20, 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(20, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(19, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tax_desc`
--

CREATE TABLE IF NOT EXISTS `tax_desc` (
  `tdid` int(11) NOT NULL AUTO_INCREMENT,
  `tax_id` int(11) NOT NULL,
  `lang_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`tdid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=26 ;

--
-- Dumping data for table `tax_desc`
--

INSERT INTO `tax_desc` (`tdid`, `tax_id`, `lang_id`, `name`, `slug`, `description`, `created_at`, `updated_at`) VALUES
(2, 2, 1, 'Bản tin', 'ban-tin', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 2, 2, 'News1', 'news1', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 3, 1, 'Sự kiện', 'su-kien', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 3, 2, 'Events', 'events', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 4, 1, 'Tin Tức', 'tin-tuc', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 4, 2, 'News', 'news', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, 14, 1, 'Bóng đá', 'bong-da', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, 14, 2, 'Football', 'football', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(10, 21, 1, 'Hàng công nghệ', 'hang-cong-nghe', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(11, 21, 2, 'Technology', 'technology', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(12, 22, 1, 'Thời trang', 'thoi-trang', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(13, 22, 2, 'Fashion', 'fashion', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(14, 23, 1, 'Máy tính để bàn', 'may-tinh-de-ban', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(15, 23, 2, 'Desktop', 'desktop', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(16, 24, 1, 'Laptop', 'laptop', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(17, 24, 2, 'Laptop', 'laptop', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(18, 25, 1, 'Giày dép', 'giay-dep', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(19, 25, 2, 'Shoes', 'shoes', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(20, 29, 1, 'Phòng Vip', 'phong-vip', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(21, 29, 2, 'Vip room', 'vip-room', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(22, 30, 1, 'Phòng cao cấp', 'phong-cao-cap', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(23, 30, 2, 'Premium Room', 'premium-room', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tax_post`
--

CREATE TABLE IF NOT EXISTS `tax_post` (
  `tax_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tax_post`
--

INSERT INTO `tax_post` (`tax_id`, `post_id`, `created_at`, `updated_at`) VALUES
(3, 4, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(12, 4, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 5, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(14, 6, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tax_product`
--

CREATE TABLE IF NOT EXISTS `tax_product` (
  `tax_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tax_product`
--

INSERT INTO `tax_product` (`tax_id`, `product_id`, `created_at`, `updated_at`) VALUES
(21, 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(23, 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(24, 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(22, 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(25, 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(27, 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(21, 5, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(23, 5, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(24, 5, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(22, 5, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(25, 5, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(21, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(24, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(28, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(21, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(27, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nicename` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `permission` text COLLATE utf8_unicode_ci NOT NULL,
  `group_id` int(11) NOT NULL,
  `admin` tinyint(4) NOT NULL,
  `active` tinyint(4) NOT NULL,
  `active_code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_login` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `reset_pass_code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_username_unique` (`username`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `nicename`, `email`, `password`, `avatar`, `permission`, `group_id`, `admin`, `active`, `active_code`, `last_login`, `reset_pass_code`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'Admin', 'admin@gmail.com', '$2y$10$6msaFh.jR8frbiQbD/NC3ueM/hct5cXbeBlcA2JDdM8jKUI3ZlsrS', '', '', 1, 1, 1, '', '', '', 'ZkNXF9IRDwDP7rMKDbSzXTZs4N4b17BYPnbXEhN1tUhp49vz1d1ZwtoVjva3', '0000-00-00 00:00:00', '2015-09-05 21:48:56'),
(2, 'SkyFrost', '', 'skyfrost.07@gmail.com', '$2y$10$m06I8asfnfJEZw7VlrTWCeuO8HhXNVE7dNkQ8PcoS2e4WJJQqC7UC', '', '', 7, 0, 1, '', '', '', 'QQ9XUm9shGMDmEhsWrbcX3f5mKUOnxAbnagkaBSjzSX3HLdHPaDqGCcsTz8D', '2015-08-19 11:39:15', '2015-09-04 00:18:34'),
(4, 'customer', '', 'customer@gmail.com', '$2y$10$pT3ZuP4upVzkj/mAK8x/iu1oDJm48UIJz0NfwLrEulYao5w.2x.Ki', '', '', 8, 0, 1, '', '', '', NULL, '2015-08-20 03:56:09', '2015-08-27 08:06:42'),
(5, 'editor', '', 'editor@gmail.com', '$2y$10$dL6QclqoUUw9SYpDRp51POiyPlrUanT4raVVir7Gd0MlfQuOVOcXa', '', '', 3, 0, 1, '', '', '', NULL, '2015-08-20 11:15:06', '2015-08-27 08:07:27'),
(6, 'author', '', 'author@gmail.com', '$2y$10$Gmj33oWJBnJ/TLJrymecB.XUsamryrtcNtqsiGa0jJdmRmVlL.Coe', '', '', 6, 0, 1, '', '', '', 'sJu36ak4XOLtkSiyha33sVDryLKZyfF8hjzbkmFrU7ydpE1CfAdikH7sU2XY', '2015-08-20 11:16:49', '2015-09-02 05:12:05');

-- --------------------------------------------------------

--
-- Table structure for table `user_groups`
--

CREATE TABLE IF NOT EXISTS `user_groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `permission` text COLLATE utf8_unicode_ci NOT NULL,
  `active` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=9 ;

--
-- Dumping data for table `user_groups`
--

INSERT INTO `user_groups` (`id`, `name`, `slug`, `permission`, `active`, `created_at`, `updated_at`) VALUES
(1, 'Quản lý', 'quan-ly', 'a:35:{i:0;s:10:"list_users";i:1;s:12:"create_users";i:2;s:10:"edit_users";i:3;s:17:"edit_others_users";i:4;s:12:"delete_users";i:5;s:19:"delete_others_users";i:6;s:15:"edit_role_users";i:7;s:18:"manage_user_groups";i:8;s:18:"manage_admin_menus";i:9;s:16:"manage_languages";i:10;s:12:"manage_menus";i:11;s:14:"manage_sliders";i:12;s:14:"manage_banners";i:13;s:16:"manage_customers";i:14;s:16:"manage_locations";i:15;s:9:"list_cats";i:16;s:11:"create_cats";i:17;s:9:"edit_cats";i:18;s:11:"delete_cats";i:19;s:9:"list_tags";i:20;s:11:"create_tags";i:21;s:9:"edit_tags";i:22;s:11:"delete_tags";i:23;s:10:"list_posts";i:24;s:12:"create_posts";i:25;s:10:"edit_posts";i:26;s:17:"edit_others_posts";i:27;s:12:"delete_posts";i:28;s:19:"delete_others_posts";i:29;s:10:"list_pages";i:30;s:12:"create_pages";i:31;s:10:"edit_pages";i:32;s:17:"edit_others_pages";i:33;s:12:"delete_pages";i:34;s:19:"delete_others_pages";}', 1, '2015-08-20 11:57:10', '2015-09-09 08:13:56'),
(3, 'Biên tập viên', 'bien-tap-vien', 'a:22:{i:0;s:10:"list_users";i:1;s:10:"edit_users";i:2;s:9:"list_cats";i:3;s:11:"create_cats";i:4;s:9:"edit_cats";i:5;s:11:"delete_cats";i:6;s:9:"list_tags";i:7;s:11:"create_tags";i:8;s:9:"edit_tags";i:9;s:11:"delete_tags";i:10;s:10:"list_posts";i:11;s:12:"create_posts";i:12;s:10:"edit_posts";i:13;s:17:"edit_others_posts";i:14;s:12:"delete_posts";i:15;s:19:"delete_others_posts";i:16;s:10:"list_pages";i:17;s:12:"create_pages";i:18;s:10:"edit_pages";i:19;s:17:"edit_others_pages";i:20;s:12:"delete_pages";i:21;s:19:"delete_others_pages";}', 1, '2015-08-20 12:00:32', '2015-09-03 21:54:56'),
(6, 'Tác giả', 'tac-gia', 'a:17:{i:0;s:10:"list_users";i:1;s:10:"edit_users";i:2;s:9:"list_cats";i:3;s:11:"create_cats";i:4;s:9:"edit_cats";i:5;s:9:"list_tags";i:6;s:11:"create_tags";i:7;s:9:"edit_tags";i:8;s:11:"delete_tags";i:9;s:10:"list_posts";i:10;s:12:"create_posts";i:11;s:10:"edit_posts";i:12;s:12:"delete_posts";i:13;s:10:"list_pages";i:14;s:12:"create_pages";i:15;s:10:"edit_pages";i:16;s:12:"delete_pages";}', 1, '2015-08-27 08:06:04', '2015-09-03 10:16:27'),
(7, 'Thành viên', 'thanh-vien', 'a:15:{i:0;s:10:"list_users";i:1;s:10:"edit_users";i:2;s:9:"list_cats";i:3;s:11:"create_cats";i:4;s:9:"edit_cats";i:5;s:9:"list_tags";i:6;s:11:"create_tags";i:7;s:9:"edit_tags";i:8;s:10:"list_posts";i:9;s:12:"create_posts";i:10;s:10:"edit_posts";i:11;s:10:"list_pages";i:12;s:10:"edit_pages";i:13;s:17:"edit_others_pages";i:14;s:12:"delete_pages";}', 1, '2015-08-27 08:06:14', '2015-09-03 21:55:57'),
(8, 'Khách hàng', 'khach-hang', 'a:1:{i:0;s:10:"list_users";}', 1, '2015-08-27 08:06:25', '2015-09-03 10:17:06');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
