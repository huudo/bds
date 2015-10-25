-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Jeu 24 Septembre 2015 à 10:31
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `attravel`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin_menus`
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=33 ;

--
-- Contenu de la table `admin_menus`
--

INSERT INTO `admin_menus` (`id`, `icon`, `name`, `slug`, `link`, `route`, `permission`, `parent`, `order`, `status`, `created_at`, `updated_at`) VALUES
(1, 'fa-dashboard', 'Admin', 'admin', '', 'admin', 'read', 0, 1, 1, '2015-08-31 18:20:01', '2015-09-01 23:46:27'),
(2, 'fa-user', 'Tài khoản', 'tai-khoan', '', '', 'read', 0, 2, 1, '2015-08-31 18:22:27', '2015-09-01 23:46:33'),
(3, 'fa-edit', 'Bài viết', 'bai-viet', '', '', 'read', 0, 5, 1, '2015-08-31 18:38:11', '2015-09-16 00:35:22'),
(5, 'fa-circle-o', 'Tất cả Tài khoản', 'tat-ca-tai-khoan', '', 'admin.user.index', 'list_users', 2, 1, 1, '2015-08-31 20:38:04', '2015-09-01 23:39:15'),
(6, 'fa-circle-o', 'Nhóm tài khoản', 'nhom-tai-khoan', '', 'admin.user_group.index', 'manage_user_groups', 2, 2, 1, '2015-08-31 20:38:40', '2015-09-02 00:58:33'),
(7, 'fa-circle-o', 'Tất cả bài viết', 'tat-ca-bai-viet', '', 'admin.post.index', 'list_posts', 3, 1, 1, '2015-08-31 20:39:02', '2015-09-01 23:43:24'),
(8, 'fa-circle-o', 'Danh mục', 'danh-muc', '', 'admin.cat.index', 'list_cats', 3, 2, 1, '2015-08-31 20:39:23', '2015-09-02 00:59:16'),
(9, 'fa-circle-o', 'Thẻ', 'the', '', 'admin.tag.index', 'list_tags', 3, 3, 1, '2015-08-31 20:39:46', '2015-09-02 00:59:33'),
(10, 'fa-circle-o', 'Admin menu', 'admin-menu', '', 'admin.admin_menu.index', 'manage_admin_menus', 11, 2, 1, '2015-08-31 20:40:34', '2015-09-04 19:01:02'),
(11, 'fa-wrench', 'Cài đặt', 'cai-dat', '', '', 'manage_settings', 0, 11, 1, '2015-08-31 20:40:51', '2015-09-16 00:35:22'),
(12, 'fa-circle-o', 'Ngôn ngữ', 'ngon-ngu', '', 'admin.language.index', 'manage_languages', 11, 3, 1, '2015-08-31 20:41:24', '2015-09-04 19:01:02'),
(13, 'fa-copy', 'Trang', 'trang', '', '', 'read', 0, 4, 1, '2015-09-01 23:48:16', '2015-09-16 00:35:22'),
(14, 'fa-circle-o', 'Tất cả trang', 'tat-ca-trang', '', 'admin.page.index', 'list_pages', 13, 1, 1, '2015-09-01 23:50:14', '2015-09-02 05:14:59'),
(15, 'fa-picture-o', 'Giao diện', 'giao-dien', '', '', 'read', 0, 9, 1, '2015-09-02 05:14:37', '2015-09-16 00:35:22'),
(16, 'fa-list', 'Menu', 'menu', '', 'admin.menu_group.index', 'list_menu_groups', 15, 1, 1, '2015-09-02 05:17:41', '2015-09-02 05:18:07'),
(17, 'fa-circle-o', 'Nhóm slider', 'nhom-slider', '', 'admin.slider.index', 'manage_sliders', 15, 3, 1, '2015-09-03 01:38:55', '2015-09-04 18:16:58'),
(18, 'fa-circle-o', 'Nhóm Banner', 'nhom-banner', '', 'admin.banner_group.index', 'manage_banners', 15, 2, 1, '2015-09-03 11:10:29', '2015-09-04 18:16:58'),
(19, 'fa-circle-o', 'Tùy chỉnh', 'tuy-chinh', '', 'admin.option.index', 'manage_options', 11, 1, 1, '2015-09-04 18:16:48', '2015-09-04 18:16:59'),
(20, 'fa-camera', 'Thư viện', 'thu-vien', '', 'admin.filemanager', 'read', 0, 8, 1, '2015-09-04 19:10:50', '2015-09-16 00:35:22'),
(21, 'fa-circle-o', 'Khách hàng', 'khach-hang', '', 'admin.subs.index', 'manage_customers', 0, 10, 1, '2015-09-05 11:13:30', '2015-09-16 00:35:22'),
(25, 'fa-circle-o', 'Quốc gia', 'quoc-gia', '', 'admin.country.index', 'manage_locations', 0, 6, 1, '2015-09-07 01:50:24', '2015-09-16 00:35:22'),
(26, 'fa-circle-o', 'Danh sách trạng thái', 'danh-sach-trang-thai', '', 'admin.status.index', 'manage_status', 11, 4, 1, '2015-09-10 18:24:20', '2015-09-10 19:28:20'),
(27, 'fa-home', 'Quản lý khách sạn', 'quan-ly-khach-san', '', 'admin.hotel.index', 'manage_hotels', 28, 1, 1, '2015-09-10 19:28:03', '2015-09-10 21:35:05'),
(28, 'fa-home', 'Khách sạn', 'khach-san', '', '', 'manage_hotels', 0, 7, 1, '2015-09-10 21:34:50', '2015-09-16 00:35:22'),
(29, 'fa-circle-o', 'Loại phòng', 'loai-phong', '', 'admin.roomtype.index', 'manage_hotels', 28, 2, 1, '2015-09-10 21:48:45', '2015-09-16 00:34:57'),
(30, 'fa-circle-o', 'Khai báo Tour', 'khai-bao-tour', '', '', 'read', 0, 3, 1, '2015-09-14 00:43:01', '2015-09-16 00:35:22'),
(31, 'fa-circle-o', 'Danh mục Tour', 'danh-muc-tour', '', 'admin.tour-cat.index', 'read', 30, 1, 1, '2015-09-14 00:48:44', '2015-09-14 00:48:44'),
(32, 'fa-circle-o', 'Danh sách Tour', 'danh-sach-tour', '', 'admin.tours.index', 'read', 30, 2, 1, '2015-09-16 00:34:09', '2015-09-16 00:35:05');

-- --------------------------------------------------------

--
-- Structure de la table `banners`
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
-- Contenu de la table `banners`
--

INSERT INTO `banners` (`id`, `image`, `link`, `open_type`, `order`, `status`, `created_at`, `updated_at`) VALUES
(1, '/uploads/CNqtSflWoAEJUlO.png', 'http://google.com.vn', '', 10, 1, '2015-09-03 11:44:06', '2015-09-03 11:54:22'),
(2, '/uploads/898738174_397136704.JPG', '', '', 10, 1, '2015-09-03 11:48:36', '2015-09-03 19:03:43'),
(3, '/uploads/1053755918_451425990.jpg', 'http://google.com.vn', '_blank', 10, 1, '2015-09-03 19:00:15', '2015-09-03 19:00:15');

-- --------------------------------------------------------

--
-- Structure de la table `comments`
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
-- Structure de la table `countries`
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Contenu de la table `countries`
--

INSERT INTO `countries` (`id`, `icon`, `status`, `visa_1`, `visa_2`, `type`, `parent`, `created_at`, `updated_at`) VALUES
(1, 'vi.png', 1, '1000000.00', '2000000.00', 'country', 0, '2015-09-07 02:04:50', '2015-09-07 02:18:41'),
(2, 'th.png', 1, '2000000.00', '3000000.00', 'country', 1, '2015-09-07 02:12:54', '2015-09-09 07:55:57'),
(3, 'JP.png', 1, '2000000.00', '3000000.00', 'country', 0, '2015-09-07 02:45:00', '2015-09-10 23:39:30');

-- --------------------------------------------------------

--
-- Structure de la table `country_lang`
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
-- Contenu de la table `country_lang`
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
-- Structure de la table `customers`
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
-- Contenu de la table `customers`
--

INSERT INTO `customers` (`id`, `fullname`, `email`, `phone`, `address`, `status`, `key_active`, `description`, `ip`, `created_at`, `updated_at`) VALUES
(1, 'Nguyễn Văn A', 'nguyenvana@gmail.com', '08384732374', 'Nghệ An', 'confirmed', '68f5f844896ee7a4626da5678045ec26', '', '::1', '2015-09-05 11:22:26', '2015-09-05 11:22:26'),
(2, 'Họ Văn Tên', 'customer@gmail.com', '0985265478', 'Hà Nội', 'unconfirmed', '70402dcd961a2361cbae772294e3eb63', '', '::1', '2015-09-05 11:24:19', '2015-09-05 11:27:00');

-- --------------------------------------------------------

--
-- Structure de la table `hotels`
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Contenu de la table `hotels`
--

INSERT INTO `hotels` (`id`, `province_id`, `image`, `images`, `hotline`, `email`, `fax`, `phone`, `star`, `status`, `created_at`, `updated_at`) VALUES
(3, 2, '/uploads/08-2015-488842_15062215140030247836.jpg', NULL, '0985214562', 'hotel1@gmail.com', '874125756', '0978567899', 5, 2, '2015-09-10 20:59:30', '2015-09-10 21:27:42'),
(4, 3, '/uploads/08-2015-898738174_397136704-1.JPG', NULL, '0235624812', 'hotel2@gmail.com', '8426535841', '0845236589', 4, 2, '2015-09-10 21:08:16', '2015-09-10 21:27:53');

-- --------------------------------------------------------

--
-- Structure de la table `hotel_lang`
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=15 ;

--
-- Contenu de la table `hotel_lang`
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
-- Structure de la table `languages`
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
-- Contenu de la table `languages`
--

INSERT INTO `languages` (`id`, `lang_name`, `code`, `icon`, `folder`, `status`, `order`, `unit`, `ratio_currency`, `default`, `created_at`, `updated_at`) VALUES
(1, 'Việt Nam', 'vi', 'vi.png', 'vi', 1, 0, 'VNĐ', 1.00, 1, '2015-08-26 11:39:56', '2015-08-26 11:51:20'),
(2, 'English', 'en', 'en.png', 'en', 1, 0, '$', 22345.00, 0, '2015-08-26 11:42:13', '2015-08-26 11:51:20');

-- --------------------------------------------------------

--
-- Structure de la table `menus`
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
-- Contenu de la table `menus`
--

INSERT INTO `menus` (`id`, `group_id`, `parent`, `type`, `type_id`, `status`, `icon`, `open_type`, `order`, `created_at`, `updated_at`) VALUES
(10, 15, 0, 'cat', 4, 1, 'fa-newspaper-o', '', 2, '2015-09-02 19:08:43', '2015-09-16 18:24:01'),
(11, 15, 0, 'page', 1, 1, 'fa-info-circle', '', 8, '2015-09-02 19:10:55', '2015-09-16 18:29:50'),
(12, 15, 0, 'custom', 0, 1, 'fa-circle-o', '_blank', 6, '2015-09-02 19:12:33', '2015-09-09 08:11:32'),
(13, 15, 0, 'cat', 14, 1, 'fa-picture-o', '', 7, '2015-09-03 01:28:36', '2015-09-16 18:27:06'),
(14, 15, 0, 'cat', 3, 1, 'fa-calendar-times-o', '', 3, '2015-09-04 22:14:42', '2015-09-16 18:25:10'),
(15, 15, 0, 'page', 2, 1, 'fa-phone-square', '', 9, '2015-09-05 08:11:13', '2015-09-16 18:26:20'),
(16, 15, 0, 'custom', 0, 1, 'fa-home', '', 1, '2015-09-05 11:52:38', '2015-09-16 07:14:52'),
(18, 15, 0, 'custom', 0, 1, 'fa-bed', '', 5, '2015-09-06 10:56:29', '2015-09-16 18:29:09');

-- --------------------------------------------------------

--
-- Structure de la table `menu_desc`
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
-- Contenu de la table `menu_desc`
--

INSERT INTO `menu_desc` (`menu_id`, `lang_id`, `name`, `slug`, `link`, `created_at`, `updated_at`) VALUES
(10, 1, 'Tin Tức', '', 'http://localhost:8000/tin-tuc/cat-4', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(10, 2, 'News', '', 'http://localhost:8000/news/cat-4', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(11, 1, 'Giới thiệu', '', 'http://localhost:8000/gioi-thieu/page-1', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(11, 2, 'About', '', 'http://localhost:8000/about/page-1', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(12, 1, 'Diễn đàn', '', 'https://google.com.vn', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(12, 2, 'Forums', '', 'http://google.com.vn', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(13, 1, 'Thư viện', '', 'http://localhost:8000/bong-da/cat-14', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(13, 2, 'Football', '', 'http://localhost:8000/football/cat-14', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(14, 1, 'Sự kiện', '', 'http://localhost:8000/su-kien/cat-3', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(14, 2, 'Events', '', 'http://localhost:8000/events/cat-3', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(15, 1, 'Liên hệ', '', 'http://localhost:8000/lien-he/page-2', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(15, 2, 'Contact', '', 'http://localhost:8000/contact/page-2', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(16, 1, 'Trang chủ', '', 'http://localhost:8000', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(16, 2, 'Home', '', 'http://localhost:8000', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(18, 1, 'Khách sạn', '', 'http://localhost:8000/blogs', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(18, 2, 'Blogs', '', 'http://localhost:8000/blogs', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `migrations`
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
('2015_09_07_061442_create_comments_tbl', 12),
('2015_09_14_075227_create_tour_cat_table', 13),
('2015_09_16_025838_create_tour_place_table', 14);

-- --------------------------------------------------------

--
-- Structure de la table `options`
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
-- Contenu de la table `options`
--

INSERT INTO `options` (`id`, `lang_id`, `key`, `name`, `value`, `created_at`, `updated_at`) VALUES
(4, 0, '_paginate', 'Phân trang', '20', '2015-09-04 01:47:14', '2015-09-04 09:32:38'),
(11, 1, 'site_title', 'Tiêu đề trang', 'Laravel cms', '2015-09-04 09:32:24', '2015-09-04 09:32:31'),
(12, 2, 'site_title', 'Tiêu đề trang', 'Laravel cms English', '2015-09-04 09:32:24', '2015-09-04 09:32:24'),
(13, 0, 'mainmenu', 'Menu chính', '15', '2015-09-04 21:35:28', '2015-09-04 21:35:28');

-- --------------------------------------------------------

--
-- Structure de la table `pages`
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
-- Contenu de la table `pages`
--

INSERT INTO `pages` (`id`, `image`, `image_ids`, `author_id`, `status`, `template`, `views`, `created_at`, `updated_at`) VALUES
(1, '/uploads/1053755918_451425990.jpg', '', 1, 2, '', 0, '2015-08-31 09:15:59', '2015-08-31 09:15:59'),
(2, '/uploads/898738174_397136704.JPG', '', 1, 2, 'contact', 0, '2015-09-04 20:04:02', '2015-09-04 20:09:42');

-- --------------------------------------------------------

--
-- Structure de la table `page_desc`
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
-- Contenu de la table `page_desc`
--

INSERT INTO `page_desc` (`page_id`, `lang_id`, `name`, `slug`, `excerpt`, `content`, `custom`, `created_at`, `updated_at`) VALUES
(1, 1, 'Giới thiệu', 'gioi-thieu', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(1, 2, 'About', 'about', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 1, 'Liên hệ', 'lien-he', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 2, 'Contact', 'contact', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `places`
--

CREATE TABLE IF NOT EXISTS `places` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `image_url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `location` int(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=29 ;

--
-- Contenu de la table `places`
--

INSERT INTO `places` (`id`, `user_id`, `image_url`, `created_at`, `updated_at`, `location`) VALUES
(3, 1, '', '2015-08-06 10:02:55', '2015-08-12 19:50:52', 0),
(4, 1, '', '2015-08-06 10:14:13', '2015-08-12 19:51:00', 0),
(5, 1, '', '2015-08-06 19:39:35', '2015-08-12 19:51:06', 0),
(6, 1, '', '2015-08-10 22:00:51', '2015-08-12 19:51:11', 0),
(7, 1, '', '2015-08-10 22:02:25', '2015-08-12 19:51:20', 0),
(8, 1, '', '2015-08-11 00:15:08', '2015-08-12 19:51:31', 0),
(9, 1, '', '2015-08-11 00:15:31', '2015-08-12 19:54:09', 0),
(12, 1, '', '2015-08-11 00:16:01', '2015-08-12 19:54:26', 0),
(13, 1, '', '2015-08-11 00:16:18', '2015-08-12 19:54:33', 0),
(14, 1, '', '2015-08-11 00:16:32', '2015-08-12 19:54:38', 0),
(15, 1, '', '2015-08-11 00:59:00', '2015-08-12 19:54:43', 0),
(16, 1, '', '2015-08-12 01:15:33', '2015-08-12 19:54:51', 1),
(17, 1, '', '2015-08-12 01:16:21', '2015-08-12 19:54:59', 1),
(18, 1, '', '2015-08-12 01:16:51', '2015-08-12 19:55:06', 1),
(19, 1, '', '2015-09-04 19:53:48', '2015-09-04 19:53:48', 1),
(20, 1, '', '2015-09-05 02:41:36', '2015-09-05 02:41:36', 0),
(21, 1, '', '2015-09-05 06:03:03', '2015-09-05 06:03:03', 0),
(22, 1, '', '2015-09-05 10:03:20', '2015-09-05 10:03:20', 0),
(23, 1, '', '2015-09-05 10:03:48', '2015-09-05 10:03:48', 0),
(24, 1, '', '2015-09-10 01:25:48', '2015-09-10 01:25:48', 0),
(25, 1, '', '2015-09-10 01:26:29', '2015-09-10 01:26:29', 0),
(26, 1, '', '2015-09-10 01:27:20', '2015-09-10 01:27:20', 0),
(27, 1, '', '2015-09-10 01:27:38', '2015-09-10 01:27:38', 0),
(28, 1, '', '2015-09-10 01:27:59', '2015-09-10 01:27:59', 0);

-- --------------------------------------------------------

--
-- Structure de la table `place_lang`
--

CREATE TABLE IF NOT EXISTS `place_lang` (
  `place_id` int(11) NOT NULL,
  `lang_id` int(11) NOT NULL,
  `name` longtext COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `slug` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `keyword` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `place_lang`
--

INSERT INTO `place_lang` (`place_id`, `lang_id`, `name`, `created_at`, `updated_at`, `slug`, `keyword`) VALUES
(3, 1, 'Hà Nội', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'ha-noi', 'ha noi'),
(3, 2, 'Ha Noi Eng', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'ha-noi', 'ha noi eng'),
(4, 1, 'Hạ Long', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'ha-long', 'ha long'),
(4, 2, 'Ha Long Bay', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'ha-long-bay', 'ha long bay'),
(5, 1, 'Tp. Hồ Chí Minh', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'tp.-ho-chi-minh', 'tp. ho chi minh'),
(5, 2, 'Ho Chi Minh City', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'ho-chi-minh-city', 'ho chi minh city'),
(6, 1, 'Vũng Tàu', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'vung-tau', 'vung tau'),
(6, 2, 'Vung Tau', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'vung-tau', 'vung tau'),
(7, 1, 'Buôn Mê Thuột', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'buon-me-thuot', 'buon me thuot'),
(7, 2, 'Buon Me Thuot', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'buon-me-thuot', 'buon me thuot'),
(8, 1, 'Nha Trang', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'nha-trang', 'nha trang'),
(8, 2, 'Nha Trang', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'nha-trang', 'nha trang'),
(9, 1, 'Đà Nẵng', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'da-nang', 'đa nang'),
(9, 2, 'Da Nang', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'da-nang', 'da nang'),
(12, 1, 'Phú Quốc', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'phu-quoc', 'phu quoc'),
(12, 2, 'Phu Quoc', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'phu-quoc', 'phu quoc'),
(13, 1, 'Huế', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'hue', 'hue'),
(13, 2, 'Hue', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'hue', 'hue'),
(14, 1, 'Côn Đảo', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'con-dao', 'con đao'),
(14, 2, 'Con Dao', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'con-dao', 'con dao'),
(15, 1, 'Sapa', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'sapa', 'sapa'),
(15, 2, 'Sapa', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'sapa', 'sapa'),
(16, 1, 'Singapore', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'singapore', 'singapore'),
(16, 2, 'Singapore', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'singapore', 'singapore'),
(17, 1, 'Thái Lan', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'thai-lan', 'thai lan'),
(17, 2, 'Thailand', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'thailand', 'thailand'),
(18, 1, 'HongKong', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'hongkong', 'hongkong'),
(18, 2, 'HongKong', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'hongkong', 'hongkong'),
(19, 1, 'Paris', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'paris', 'paris'),
(19, 2, 'Paris', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'paris', 'paris'),
(20, 1, 'Hà Giang', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'ha-giang', 'ha giang'),
(20, 2, 'Hà Giang', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'ha-giang', 'ha giang'),
(21, 1, 'Mộc Châu', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'moc-chau', 'moc chau'),
(21, 2, 'Moc Chau', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'moc-chau', 'moc chau'),
(22, 1, 'Quan Lạn', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'quan-lan', 'quan lan'),
(22, 2, 'Quan Lan Island', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'quan-lan-island', 'quan lan island'),
(23, 1, 'Cô Tô', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'co-to', 'co to'),
(23, 2, 'Co To Island', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'co-to-island', 'co to island'),
(24, 1, 'Cao Bằng', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'cao-bang', 'cao bang'),
(24, 2, 'Cao Bang', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'cao-bang', 'cao bang'),
(25, 1, 'Bắc Kan', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'bac-kan-kan', 'bac kan'),
(25, 2, 'Bac Kan', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'bac-kan', 'bac kan'),
(26, 1, 'Sơn La', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'son-la', 'son la'),
(26, 2, 'Sơn La', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'son-la', 'son la'),
(27, 1, 'Điện Biên', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'dien-bien', 'đien bien'),
(27, 2, 'Dien Bien', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'dien-bien', 'dien bien'),
(28, 1, 'Lào Cai', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'lao-cai', 'lao cai'),
(28, 2, 'Lao Cai', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'lao-cai', 'lao cai');

-- --------------------------------------------------------

--
-- Structure de la table `posts`
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
-- Contenu de la table `posts`
--

INSERT INTO `posts` (`id`, `image`, `image_ids`, `author_id`, `status`, `comment_status`, `comment_count`, `post_type`, `views`, `created_at`, `updated_at`) VALUES
(4, '/uploads/898738174_397136704.JPG', '', 1, 2, '', 0, '', 0, '2015-08-30 15:37:40', '2015-09-03 21:13:15'),
(5, '/uploads/CNqtSflWoAEJUlO.png', '', 1, 2, '', 0, '', 0, '2015-08-31 04:10:33', '2015-09-03 10:47:34'),
(6, '/uploads/105181.jpg', '', 1, 2, '', 0, '', 0, '2015-08-31 04:20:38', '2015-08-31 04:20:38');

-- --------------------------------------------------------

--
-- Structure de la table `post_desc`
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
-- Contenu de la table `post_desc`
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
-- Structure de la table `provincial`
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
-- Contenu de la table `provincial`
--

INSERT INTO `provincial` (`id`, `parent`, `status`, `order`, `created_at`, `updated_at`) VALUES
(2, 1, 1, 0, '2015-09-09 07:44:54', '2015-09-09 07:44:54'),
(3, 1, 1, 1, '2015-09-09 07:51:22', '2015-09-09 07:58:20'),
(4, 2, 1, 0, '2015-09-10 20:38:58', '2015-09-10 20:38:58'),
(5, 2, 1, 0, '2015-09-10 20:39:16', '2015-09-10 20:39:16'),
(6, 1, 1, 0, '2015-09-11 01:52:35', '2015-09-11 01:52:35');

-- --------------------------------------------------------

--
-- Structure de la table `rooms`
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Contenu de la table `rooms`
--

INSERT INTO `rooms` (`id`, `hotel_id`, `image`, `images`, `type_id`, `price`, `status`, `created_at`, `updated_at`) VALUES
(1, 4, '/uploads/1053755918_451425990.jpg', '', 30, '4500000.00', 2, '2015-09-11 00:55:23', '2015-09-11 00:55:23'),
(2, 3, '/uploads/08-2015-898738174_397136704-1.JPG', '', 29, '2300000.00', 2, '2015-09-11 01:26:29', '2015-09-11 01:26:29');

-- --------------------------------------------------------

--
-- Structure de la table `slides`
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
-- Contenu de la table `slides`
--

INSERT INTO `slides` (`id`, `group_id`, `image`, `link`, `open_type`, `order`, `status`, `params`, `created_at`, `updated_at`) VALUES
(1, 18, '/uploads/slide_1.jpg', 'http://google.com.vn', '_blank', 10, 1, '', '2015-09-03 09:26:44', '2015-09-22 08:21:02'),
(2, 18, '/uploads/slide_1.jpg', 'http://google.com.vn', '_blank', 10, 1, '', '2015-09-03 09:28:19', '2015-09-22 08:21:58');

-- --------------------------------------------------------

--
-- Structure de la table `slide_desc`
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
-- Contenu de la table `slide_desc`
--

INSERT INTO `slide_desc` (`slide_id`, `lang_id`, `name`, `description`, `custom`, `created_at`, `updated_at`) VALUES
(1, 1, 'slide 11', 'mo ta slide 11', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(1, 2, 'slide1', 'slide 1 description', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 1, 'slide2', 'mo ta slide 2', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 2, 'slide2', 'slide2 description', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `status`
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
-- Contenu de la table `status`
--

INSERT INTO `status` (`id`, `status_id`, `lang_id`, `name`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Bật', '2015-09-10 18:26:11', '2015-09-10 18:26:11'),
(2, 1, 2, 'Enable', '2015-09-10 18:26:11', '2015-09-10 18:26:11'),
(3, 2, 1, 'Tắt', '2015-09-10 18:26:24', '2015-09-10 18:26:24'),
(4, 2, 2, 'Disable', '2015-09-10 18:26:24', '2015-09-10 18:26:24');

-- --------------------------------------------------------

--
-- Structure de la table `taxs`
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=31 ;

--
-- Contenu de la table `taxs`
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
-- Structure de la table `tax_banner`
--

CREATE TABLE IF NOT EXISTS `tax_banner` (
  `tax_id` int(11) NOT NULL,
  `banner_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `tax_banner`
--

INSERT INTO `tax_banner` (`tax_id`, `banner_id`, `created_at`, `updated_at`) VALUES
(19, 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(20, 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(20, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(19, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `tax_desc`
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=24 ;

--
-- Contenu de la table `tax_desc`
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
-- Structure de la table `tax_post`
--

CREATE TABLE IF NOT EXISTS `tax_post` (
  `tax_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `tax_post`
--

INSERT INTO `tax_post` (`tax_id`, `post_id`, `created_at`, `updated_at`) VALUES
(3, 4, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(12, 4, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 5, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(14, 6, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `tax_product`
--

CREATE TABLE IF NOT EXISTS `tax_product` (
  `tax_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `tax_product`
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
-- Structure de la table `tours`
--

CREATE TABLE IF NOT EXISTS `tours` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `start_date` int(11) NOT NULL,
  `price_company` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `image_url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `days` int(2) DEFAULT NULL,
  `nights` int(2) DEFAULT NULL,
  `start_id` int(5) DEFAULT NULL,
  `end_id` int(5) DEFAULT NULL,
  `vehicle` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `start_every` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` int(2) DEFAULT NULL,
  `price_child` int(11) DEFAULT NULL,
  `price_baby` int(11) DEFAULT NULL,
  `price_single` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=40 ;

--
-- Contenu de la table `tours`
--

INSERT INTO `tours` (`id`, `start_date`, `price_company`, `price`, `user_id`, `image_url`, `created_at`, `updated_at`, `code`, `days`, `nights`, `start_id`, `end_id`, `vehicle`, `start_every`, `status`, `price_child`, `price_baby`, `price_single`) VALUES
(34, 1440410400, 4200000, 3800000, 1, '/uploads/400-3.jpg', '2015-09-16 00:39:26', '2015-09-16 00:42:19', 'HN-SG-0203', 4, 3, 13, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(35, 1441188000, 10000000, 8700000, 1, '/uploads/400-2.jpg', '2015-09-16 00:40:31', '2015-09-16 00:42:01', 'SG-HK-002', 10, 9, 13, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(36, 1441188000, 12000000, 10800000, 1, '/uploads/400-4.jpg', '2015-09-16 00:43:21', '2015-09-16 00:43:21', 'HK-GM-02010114', 4, 3, 13, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(37, 1441188000, 3000000, 22000000, 1, '/uploads/400-5.jpg', '2015-09-16 00:44:17', '2015-09-16 02:08:30', 'TM-HM-0201007', 6, 8, 15, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(38, 1441188000, 4200000, 2700000, 1, '/uploads/898738174_397136704.JPG', '2015-09-16 02:09:38', '2015-09-16 08:36:19', 'HK-SM-09134131', 5, 4, 13, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(39, 1443063600, 3200000, 2900000, 1, '/uploads/400-2.jpg', '2015-09-22 09:06:52', '2015-09-22 09:06:52', 'HN-EB-04114', 4, 3, 13, NULL, NULL, NULL, NULL, 1500000, 500000, 750000);

-- --------------------------------------------------------

--
-- Structure de la table `tours_lang`
--

CREATE TABLE IF NOT EXISTS `tours_lang` (
  `tour_id` int(11) NOT NULL,
  `lang_id` int(11) NOT NULL,
  `schedule` longtext COLLATE utf8_unicode_ci NOT NULL,
  `desc` text COLLATE utf8_unicode_ci NOT NULL,
  `detail` longtext COLLATE utf8_unicode_ci NOT NULL,
  `notice` longtext COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `keyword` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `intro` longtext COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `tours_lang`
--

INSERT INTO `tours_lang` (`tour_id`, `lang_id`, `schedule`, `desc`, `detail`, `notice`, `created_at`, `updated_at`, `name`, `keyword`, `intro`) VALUES
(34, 1, '<p><strong>Ng&agrave;y 01&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; H&Agrave; NỘI &ndash;&nbsp; SEOUL&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(Ăn tối)</strong></p>\r\n<p><strong>11h40:</strong> Qu&yacute; kh&aacute;ch tập trung tại Nh&agrave; h&aacute;t lớn (Đ/c: Số 1 Tr&agrave;ng Tiền &ndash; H&agrave; Nội), xe v&agrave; HDV đ&oacute;n v&agrave; đưa đo&agrave;n ra <strong>s&acirc;n bay Nội B&agrave;i</strong> đ&aacute;p chuyến bay HANOI &ndash; SEOUL <strong>VN 9416</strong> <strong>(15:15 &ndash; 21 :20).</strong></p>\r\n<p><strong>21:20:&nbsp; </strong>Đến <strong>s&acirc;n bay Quốc tế Incheon</strong>, Xe v&agrave; HDV đ&oacute;n Qu&yacute; kh&aacute;ch về kh&aacute;ch sạn tại Seoul nghỉ ngơi.&nbsp; Qu&yacute; kh&aacute;ch nghỉ đ&ecirc;m tại kh&aacute;ch sạn Benhur&nbsp; 3* hoặc tương đương</p>\r\n<p><strong>Ng&agrave;y 02&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; SEOUL - EVERLAND&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(Ăn S&aacute;ng, Trưa, Tối)</strong></p>\r\n<p><strong>S&aacute;ng</strong>&nbsp;&nbsp;&nbsp; Sau khi ăn s&aacute;ng, xe v&agrave; HDV đi tham quan:</p>\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>Nh&agrave; Xanh &ndash;</strong> <em>Phủ Tổng Thống</em></p>\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>Cung đi</strong><strong>ện ho&agrave;ng gia Kyong bok</strong> - <em>nơi m&agrave; c&aacute;c vua ch&uacute;a <strong>triều đại Jocheon</strong> từng ngự trị.</em></p>\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>B</strong><strong>ảo t&agrave;ng d&acirc;n gian quốc gia</strong> - <em>l&agrave; bảo t&agrave;ng quốc gia duy nhất về văn h&oacute;a d&acirc;n gian, trưng b&agrave;y khoảng 4.000 hiện vật về đời sống văn h&oacute;a</em></p>\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>Qu</strong><strong>ảng trường Gwanghawamun</strong> v&agrave; d&ograve;ng suối nh&acirc;n tạo Chonggye</p>\r\n<p><strong>Trưa</strong>&nbsp;&nbsp; Kết th&uacute;c chương tr&igrave;nh tham quan buổi s&aacute;ng Qu&yacute; kh&aacute;ch d&ugrave;ng bữa trưa tại nh&agrave; h&agrave;ng.</p>\r\n<p><strong>Chiều</strong>&nbsp; Sau khi ăn trưa v&agrave; nghỉ ngơi Qu&yacute; kh&aacute;ch tiếp tục đi thăm quan <strong>c&ocirc;ng vi&ecirc;n Everland</strong> &ndash; <em>c&ocirc;ng vi&ecirc;n lớn nhất ở H&agrave;n Quốc</em>, được xếp vị tr&iacute; thứ 8 trong danh s&aacute;ch 10 c&ocirc;ng vi&ecirc;n giải tr&iacute; thu h&uacute;t đ&ocirc;ng kh&aacute;ch nhất thế giới tại đ&acirc;y Qu&yacute; kh&aacute;ch sẽ tham gia c&aacute;c tr&ograve; chơi hấp dẫn c&oacute; bao gồm trong v&eacute; v&agrave;o cửa.</p>\r\n<p><strong>Tối</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Qu&yacute; kh&aacute;ch nghỉ đ&ecirc;m tại kh&aacute;ch sạn Benhur&nbsp; 3* hoặc tương đương v&agrave; tự do t&igrave;m hiểu SEOUL về đ&ecirc;m.</p>\r\n<p><strong>Ng&agrave;y 03&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; SEOUL &ndash; NAMI &ndash; C&Ocirc;NG VI&Ecirc;N NƯỚC&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(Ăn S&aacute;ng, Trưa, Tối)</strong></p>\r\n<p><strong>S&aacute;ng</strong>&nbsp;&nbsp;&nbsp; Sau &nbsp;ăn s&aacute;ng Qu&yacute; kh&aacute;ch tham quan <strong>Đảo Nami</strong>: <em>h&ograve;n đảo l&atilde;ng mạn &ndash; nơi đ&atilde; từng quay bộ phim nổi tiếng &ldquo; Bản t&igrave;nh ca M&ugrave;a Đ&ocirc;ng&rdquo; với những h&agrave;ng c&acirc;y cao v&uacute;t v&agrave; bức tượng t&igrave;nh y&ecirc;u vĩnh cửu.</em>Qu&yacute; kh&aacute;ch nghỉ ngơi v&agrave; d&ugrave;ng bữa trưa tại nh&agrave; h&agrave;ng.</p>\r\n<p><strong>Chiều</strong> Qu&yacute; kh&aacute;ch trải nhiệm <strong>tắm Sauna kiểu H&agrave;n Quốc</strong> v&agrave; vui chơi tại <strong>Trung T&acirc;m Sealala v&agrave; C&ocirc;ng vi&ecirc;n nước</strong>. Kết th&uacute;c một ng&agrave;y vui vẻ Qu&yacute; kh&aacute;ch nghỉ đ&ecirc;m tại kh&aacute;ch sạn Benhur&nbsp; 3* (hoặc tương đương) v&agrave; tự do tham quan.</p>\r\n<p><strong>Ng&agrave;y 04&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; SEOUL&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(Ăn S&aacute;ng, Trưa, Tối)</strong></p>\r\n<p><strong>S&aacute;ng</strong>&nbsp;&nbsp;&nbsp; Sau khi ăn s&aacute;ng, xe v&agrave; HDV đưa Qu&yacute; kh&aacute;ch tham quan v&agrave; mua sắm tại tinh dầu th&ocirc;ng đỏ, Goryo Garden, cửa h&agrave;ng s&acirc;m tươi v&agrave; Nấm Linh Chi v&agrave; ăn trưa tại nh&agrave; h&agrave;ng.</p>\r\n<p><strong>Chiều</strong>&nbsp; Qu&yacute; kh&aacute;ch tham quan <strong>Ch&ugrave;a Joggyesa</strong> &ndash; <em>ng&ocirc;i ch&ugrave;a lớn nhất thủ đ&ocirc; Seoul.</em> Đo&agrave;n tham mua sắm tại cửa h&agrave;ng miễn thuế, khu phố thời trang MyeongDong. Qu&yacute; kh&aacute;ch nghỉ đ&ecirc;m tại kh&aacute;ch sạn Benhur&nbsp; 3* hoặc tương đương</p>\r\n<p><strong>Ng&agrave;y 5 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; SEOUL &ndash; HANOI&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Ăn s&aacute;ng</strong></p>\r\n<p>Qu&yacute; kh&aacute;ch ăn s&aacute;ng, l&agrave;m thủ tục trả ph&ograve;ng. Sau đ&oacute;, xe đưa Qu&yacute; kh&aacute;ch ra s&acirc;n bay đ&aacute;p chuyến bay <strong>VN9417 (10:50-13:20) SEOUL &ndash; HANOI</strong>. Tới s&acirc;n bay Nội B&agrave;i, xe đ&oacute;n v&agrave; đưa kh&aacute;ch về trung t&acirc;m th&agrave;nh phố, chia tay kết th&uacute;c chương tr&igrave;nh.</p>\r\n<p>&nbsp;</p>\r\n<p><strong>Gi&aacute; trọn g&oacute;i d&agrave;nh cho 01 kh&aacute;ch:&nbsp;11.900.000 VND</strong></p>\r\n<p>&nbsp;(Gi&aacute; d&agrave;nh cho đo&agrave;n 15 kh&aacute;ch trở l&ecirc;n)</p>\r\n<p>(Chương tr&igrave;nh c&oacute; thể thay đổi tuy nhi&ecirc;n vẫn&nbsp; đảm bảo c&aacute;c điểm tham quan)</p>\r\n<p><strong>GI&Aacute; TOUR BAO GỒM:</strong></p>\r\n<ol>\r\n<li>V&eacute; m&aacute;y bay khứ hồi bay thẳng H&agrave; nội &ndash; Seoul &ndash; H&agrave; nội của h&atilde;ng h&agrave;ng kh&ocirc;ng Vietnam Airline + thuế v&agrave; phụ thu nhi&ecirc;n liệu c&aacute;c chặng bay v&agrave; lệ ph&iacute; s&acirc;n bay</li>\r\n<li>Xe &ocirc;t&ocirc; chất lượng cao phục vụ kh&aacute;ch theo suốt chương tr&igrave;nh</li>\r\n<li>01 Hướng dẫn vi&ecirc;n du lịch nhiệt t&igrave;nh, kinh nghiệm, th&ocirc;ng thạo tiếng Việt đi theo đo&agrave;n từ Việt Nam v&agrave; 01 hướng dẫn vi&ecirc;n nhiệt t&igrave;nh, kinh nghiệm, th&ocirc;ng thạo tiếng Việt &ndash; H&agrave;n tại H&agrave;n Quốc.</li>\r\n<li>V&eacute; tham quan thắng cảnh tại c&aacute;c điểm du lịch trong chương tr&igrave;nh.</li>\r\n<li>Nghỉ đ&ecirc;m tại kh&aacute;ch sạn 3* ở Seoul (02 người/ph&ograve;ng, đo&agrave;n lẻ nam hoặc nữ sẽ xếp 3 người/ ph&ograve;ng)</li>\r\n<li>C&aacute;c bữa ăn trọn g&oacute;i đ&atilde; ghi trong chương tr&igrave;nh</li>\r\n<li>Lệ ph&iacute; Visa nhập cảnh H&agrave;n Quốc + Ph&iacute; dịch thuật hồ sơ</li>\r\n<li>Bảo hiểm du lịch quốc tế.</li>\r\n<li>Qu&agrave; tặng: mũ, vỏ hộ chiếu</li>\r\n<li>Tặng ngay Voucher mua sắm tại H&agrave;n Quốc trị gi&aacute; đến 1.000.000đ</li>\r\n<li>Bảo hiểm Du lịch mức đền b&ugrave; cao nhất 210 triệu đồng.</li>\r\n</ol>\r\n<p><strong>GI&Aacute; TOUR KH&Ocirc;NG BAO GỒM:</strong></p>\r\n<ol>\r\n<li>Ph&iacute; l&agrave;m hộ chiếu</li>\r\n<li>Cước h&agrave;nh l&yacute; qu&aacute; tải, đồ uống, giặt l&agrave;, điện thoại</li>\r\n<li>Ngủ ph&ograve;ng đơn, chi ph&iacute; c&aacute; nh&acirc;n kh&aacute;c ngo&agrave;i chương tr&igrave;nh&hellip;..</li>\r\n<li>Tiền tip cho HDV v&agrave; l&aacute;i xe: 06 USD/kh&aacute;ch/ng&agrave;y (chi ph&iacute; bắt buộc)</li>\r\n<li>Visa t&aacute;i nhập Việt Nam.</li>\r\n<li>H&agrave;nh l&yacute; qu&aacute; cước qui định v&agrave; c&aacute;c chi ph&iacute; c&aacute; nh&acirc;n ph&aacute;t sinh ngo&agrave;i chương tr&igrave;nh.</li>\r\n</ol>\r\n<p><strong>LƯU &Yacute;:</strong></p>\r\n<ol>\r\n<li>Bất cứ một h&igrave;nh thức bỏ hoặc kh&ocirc;ng sử dụng dịch vụ g&igrave; tại nước ngo&agrave;i đều kh&ocirc;ng được ho&agrave;n lại tiền v&igrave; mọi dịch vụ đ&atilde; được thanh to&aacute;n trước. Theo chương tr&igrave;nh khuyến mại đ&atilde; k&yacute; với đối t&aacute;c H&agrave;n Quốc, qu&yacute; kh&aacute;ch sẽ đi theo tour suốt chương tr&igrave;nh. Qu&yacute; kh&aacute;ch n&agrave;o t&aacute;ch đo&agrave;n vui l&ograve;ng b&aacute;o trước v&agrave; trả th&ecirc;m 2.500.000 VNĐ/kh&aacute;ch/ lần.</li>\r\n<li>Lịch tr&igrave;nh của chương tr&igrave;nh c&oacute; thể thay đổi tuỳ theo thời tiết v&agrave; điều kiện giao th&ocirc;ng tại H&agrave;n Quốc</li>\r\n<li>Kinh ph&iacute; tr&ecirc;n &aacute;p dụng cho kh&aacute;ch h&agrave;ng mang hộ chiếu Việt nam (hộ chiếu c&ograve;n gi&aacute; trị từ 6 th&aacute;ng trở l&ecirc;n kể từ ng&agrave;y khởi h&agrave;nh). Kh&aacute;ch mang hộ chiếu nước ngo&agrave;i, vui l&ograve;ng kiểm tra lại.</li>\r\n<li>Chương tr&igrave;nh tr&ecirc;n c&oacute; thể thay đổi về thời gian v&agrave; lịch tr&igrave;nh, nhưng vẫn đảm bảo c&aacute;c điểm thăm quan như tr&ecirc;n.</li>\r\n<li>V&eacute; m&aacute;y bay theo lịch tr&igrave;nh cả đo&agrave;n, nếu c&oacute; sự thay đổi sau khi xuất v&eacute;, v&eacute; sẽ kh&ocirc;ng c&ograve;n gi&aacute; trị. Giờ giấc cuối c&ugrave;ng phụ thuộc v&agrave;o h&atilde;ng h&agrave;ng kh&ocirc;ng.</li>\r\n<li>C&aacute;c phần dịch vụ kh&ocirc;ng sử dụng đến m&agrave; kh&ocirc;ng b&aacute;o trước khi đăng k&yacute; sẽ kh&ocirc;ng được ho&agrave;n lại.</li>\r\n<li>Chương tr&igrave;nh tr&ecirc;n l&agrave; chương tr&igrave;nh du lịch thuần tu&yacute;, Qu&yacute; kh&aacute;ch c&oacute; nhu cầu kết hợp l&agrave;m việc, đề nghị th&ocirc;ng b&aacute;o r&otilde; khi l&agrave;m thủ tục đăng k&yacute;</li>\r\n<li>Trẻ em từ 2 đến dưới 11 tuổi: 80 % gi&aacute; tour (ngủ chung gường với cha mẹ).</li>\r\n<li>Trẻ em dưới 02 tuổi :&nbsp; 30 % gi&aacute; tour (ngủ chung giường với cha mẹ).</li>\r\n<li>Trẻ em từ 12 tuổi &nbsp;: Gi&aacute; tour thu như người lớn</li>\r\n<li>Tỷ gi&aacute; tiền thanh to&aacute;n c&oacute; thể thay đổi v&agrave;o thời điểm thanh to&aacute;n &aacute;p dụng tỉ gi&aacute; b&aacute;n ra của thị trường tự do.</li>\r\n<li>Tiền thuế c&oacute; thể thay đổi v&agrave;o thời điểm xuất v&eacute;.</li>\r\n<li>Trong trường hợp chỉ c&oacute; 01 kh&aacute;ch (người lớn) đi với 01 b&eacute; (dưới 12 tuổi), qu&yacute; kh&aacute;ch vui l&ograve;ng đ&oacute;ng tiền tour cho B&eacute; ngủ giường ri&ecirc;ng.</li>\r\n<li>Ch&uacute;ng t&ocirc;i kh&ocirc;ng nhận kh&aacute;ch nữ c&oacute; thai từ 5 th&aacute;ng trở l&ecirc;n tham gia c&aacute;c tour du lịch nước ngo&agrave;i.</li>\r\n<li>Qu&yacute; kh&aacute;ch từ 70 tuổi trở l&ecirc;n vui l&ograve;ng đ&oacute;ng th&ecirc;m ph&iacute; bảo hiểm cao cấp (ph&iacute; thay đổi t&ugrave;y theo tour)</li>\r\n<li>Qu&yacute; kh&aacute;ch từ 75 tuổi trở l&ecirc;n y&ecirc;u cầu phải c&oacute; giấy x&aacute;c nhận đầy đủ sức khỏe để đi du lịch nước ngo&agrave;i của B&aacute;c sĩ v&agrave; phải c&oacute; người th&acirc;n dưới 60 tuổi (đầy đủ sức khỏe) đi theo.</li>\r\n<li>Trong trường hợp bất khả kh&aacute;ng do thời tiết, thi&ecirc;n tai, đ&igrave;nh c&ocirc;ng, bạo động, ph&aacute; hoại, chiến tranh, dịch bệnh, chuyến bay bị tr&igrave; ho&atilde;n hay bị hủy do thời tiết hoặc do kỹ thuật&hellip;..dẫn đến tour kh&ocirc;ng thể thực hiện tiếp tục được, ch&uacute;ng t&ocirc;i sẽ ho&agrave;n trả lại tiền tour cho qu&yacute; kh&aacute;ch sau khi đ&atilde; trừ lại c&aacute;c chi ph&iacute; dịch vụ đ&atilde; thực hiện như ph&iacute; l&agrave;m visa,&hellip; v&agrave; kh&ocirc;ng chịu tr&aacute;ch nhiệm bồi thường th&ecirc;m bất kỳ chi ph&iacute; n&agrave;o kh&aacute;c.</li>\r\n</ol>\r\n<p>Thủ tục đăng k&yacute; (xin visa):</p>\r\n<ol>\r\n<li>Hộ chiếu c&ograve;n hạn sử dụng tr&ecirc;n 6 th&aacute;ng (hộ chiếu cũ k&egrave;m theo nếu c&oacute;) với 02 ảnh 3x4 chụp tr&ecirc;n nền ph&ocirc;ng trắng trong v&ograve;ng 6 th&aacute;ng gần đ&acirc;y (hộ chiếu cũ k&egrave;m theo nếu c&oacute;) + bản ph&ocirc; t&ocirc; CMND</li>\r\n<li>Bản c&ocirc;ng chứng phường sở tại Sổ hộ khẩu, giấy đăng k&yacute; kết h&ocirc;n, giấy khai sinh của con (nếu đi theo gia đ&igrave;nh)</li>\r\n<li>Với những kh&aacute;ch h&agrave;ng c&oacute; ng&agrave;y th&aacute;ng năm sinh từ năm 1940 l&ugrave;i về trước phải c&oacute; giấy kh&aacute;m sức khỏe k&egrave;m theo</li>\r\n<li>Với những kh&aacute;ch h&agrave;ng đ&atilde; từng đi c&aacute;c nước trong th&agrave;nh vi&ecirc;n OECD (Nhật, Ch&acirc;u &Acirc;u, &Uacute;c, Mỹ&hellip;) trong v&ograve;ng 3 năm trở lại đ&acirc;y sẽ được miễn chứng minh t&agrave;i ch&iacute;nh</li>\r\n</ol>\r\n<p>* Về chứng minh t&agrave;i ch&iacute;nh, Qu&yacute; kh&aacute;ch nộp những giấy tờ sau:</p>\r\n<ol start="5">\r\n<li>Photo Sổ tiết kiệm trị gi&aacute; tối thiểu 5000 USD/ người hoặc 100.000.000đ tiền Việt thời hạn gửi trước khi xin visa tối thiểu 03 th&aacute;ng (y&ecirc;u cầu bắt buộc)+ x&aacute;c nhận số dư sổ tiết kiệm bản gốc tại ng&acirc;n h&agrave;ng ở thời điểm gần nhất (c&oacute; gi&aacute; trị trong v&ograve;ng 1 tuần kể từ ng&agrave;y xin x&aacute;c nhận )</li>\r\n<li>Nếu sổ tiết kiệm chưa gửi đủ 3 th&aacute;ng (với điều kiện đ&atilde; gửi đủ 1 th&aacute;ng t&iacute;nh đến ng&agrave;y xin visa, kỳ hạn gửi tối thiểu 3 th&aacute;ng) k&egrave;m theo Bản c&ocirc;ng chứng phường sở tại Sổ đỏ nh&agrave; đất hoặc đăng k&yacute; &ocirc; t&ocirc; trong v&ograve;ng 5 năm trở lại đ&acirc;y</li>\r\n</ol>\r\n<p>* Về chứng minh c&ocirc;ng việc:</p>\r\n<ol start="7">\r\n<li>Đối với kh&aacute;ch h&agrave;ng đang đi l&agrave;m:</li>\r\n</ol>\r\n<p>o&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Bản photo của Hợp đồng lao động hoặc quyết định bổ nhiệm hoặc quyết định tăng lương.</p>\r\n<p>o&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; X&aacute;c nhận c&ocirc;ng việc tại thời điểm hiện tại</p>\r\n<p>o&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; X&aacute;c nhận mức lương hoặc bảng lương 3 th&aacute;ng gần nhất hoặc sao k&ecirc; t&agrave;i khoản ng&acirc;n h&agrave;ng 3 th&aacute;ng gần nhất (Nếu c&ocirc;ng ty trả lương bằng h&igrave;nh thức chuyển khoản)</p>\r\n<ol start="8">\r\n<li>Đối với kh&aacute;ch h&agrave;ng l&agrave; chủ doanh nghệp: Bản sao c&ocirc;ng chứng tại phường sở tại Giấy ph&eacute;p đăng k&yacute; kinh doanh</li>\r\n<li>Đối với kh&aacute;ch h&agrave;ng l&agrave; hưu tr&iacute;: Bản sao thẻ hưu tr&iacute;</li>\r\n<li>Đối với khach h&agrave;ng l&agrave; học sinh/ sinh vi&ecirc;n: Bản photo thẻ học sinh/ sinh vi&ecirc;n. Hoặc bản photo giấy khen học kỳ gần nhất hoặc bản gốc x&aacute;c nhận của trường đang theo học</li>\r\n</ol>', 'Hàn Quốc nổi tiếng với những danh lam thắng cảnh như: Nam Mi thơ mộng được biết đến qua bộ phim " Bản tình ca Mùa Đông", hay công viên Everland là công viên giải trí hiện đại và lớn nhất Hàn Quốc, nằm tọa lạc tại Yongin thuộc tỉnh Gyeonggi-do. Seoul là thành phố lớn nhất ở Hàn Quốc và được biết đến là thành phố không bao giờ ngủ ở châu Á. Bất cứ điều gì mà bạn đang tìm kiếm ở địa điểm du lịch này, từ cung điện truyền thống đến những khu mua sắm hiện đại, nghệ thuật và âm nhạc hay các tuyến đường văn hóa, Seoul luôn có nhiều lựa chọn cho bạn.', '<p>&nbsp;</p>\r\n<p><strong>&nbsp;</strong><strong>H&Agrave; NỘI &ndash; CỐ Đ&Ocirc; HOA LƯ &ndash; TAM CỐC &ndash; H&Agrave; NỘI (ăn trưa)</strong></p>\r\n<p><strong>07h30</strong>: Xe v&agrave; hướng dẫn vi&ecirc;n c&ocirc;ng ty du lịch Vietstreet đ&oacute;n qu&yacute; kh&aacute;ch tại điểm hẹn, khởi h&agrave;nh đi Ninh B&igrave;nh (100km c&aacute;ch thủ đ&ocirc; H&agrave; nội), ngắm cảnh v&ugrave;ng n&ocirc;ng th&ocirc;n Vi&ecirc;̣t nam. Qu&yacute; kh&aacute;ch thăm <strong>cố đ&ocirc; Hoa Lư</strong>, <strong>thăm đền vua Đinh, vua L&ecirc;</strong>, được nghe HDV giới thiều về c&aacute;c danh thắng, con người, mảnh đất nơi đ&acirc;y. Ăn trưa tại nh&agrave; h&agrave;ng.</p>\r\n<p><strong>13h00</strong>: Q&uacute;y kh&aacute;ch l&ecirc;n thuy&ecirc;̀n đi dọc theo su&ocirc;́i giữa c&aacute;nh đ&ocirc;̀ng l&uacute;a thăm quan <strong>đ&ocirc;̣ng Tam C&ocirc;́c</strong> (G&ocirc;̀m ba hang: <strong>Hang Cả, Hang Hai , Hang Ba</strong>).</p>\r\n<p><strong>15h30</strong>: Qu&yacute; kh&aacute;ch l&ecirc;n xe trở về H&agrave; nội tr&ecirc;n đường đo&agrave;n dừng mua đặc sản D&ecirc; N&uacute;i, Cơm Ch&aacute;y về l&agrave;m qu&agrave; cho người th&acirc;n.</p>\r\n<p>18h30: Về đến H&agrave; Nội, chia tay qu&yacute; kh&aacute;ch. Kết th&uacute;c chuyến du lịch, hẹn gặp qu&yacute; kh&aacute;ch trong chuyến đi tới.</p>\r\n<p><strong>&nbsp;</strong></p>\r\n<p><strong>BẢNG GI&Aacute; TOUR CHO 1 KH&Aacute;CH GH&Eacute;P ĐO&Agrave;N</strong>:<strong> 650.000</strong> <strong>VND</strong></p>\r\n<p><strong>&nbsp;</strong></p>\r\n<ul>\r\n<li><strong>GI&Aacute; TOUR BAO GỒM:</strong></li>\r\n</ul>\r\n<ul>\r\n<li>Xe du lịch sang trọng, l&aacute;i xe chuy&ecirc;n nghiệp, văn minh, lịch sự phục vụ theo h&agrave;nh tr&igrave;nh.</li>\r\n<li>01 bữa ch&iacute;nh</li>\r\n<li>Hướng dẫn vi&ecirc;n chuy&ecirc;n nghiệp phục vụ nhiệt t&igrave;nh chu đ&aacute;o suốt chuyến đi.</li>\r\n</ul>\r\n<ul>\r\n<li>V&eacute; thăm quan c&aacute;c điểm thăm quan theo h&agrave;nh tr&igrave;nh.</li>\r\n</ul>\r\n<ul>\r\n<li>Nước uống, khăn lạnh phục vụ tr&ecirc;n xe ti&ecirc;u chuẩn 02 chai nước suối/ng&agrave;y thăm quan.</li>\r\n</ul>\r\n<ul>\r\n<li><strong>GI&Aacute; TOUR CHƯA BAO GỒM:</strong></li>\r\n</ul>\r\n<ul>\r\n<li>Đồ uống: rượu, bia, nước ngọt v&agrave; c&aacute;c loại đồ uống c&aacute; nh&acirc;n kh&ocirc;ng đề cập.</li>\r\n<li>C&aacute;c chi ph&iacute; c&aacute; nh&acirc;n: mua sắm, điện thoại, thăm quan ngo&agrave;i h&agrave;nh tr&igrave;nh.</li>\r\n<li>Thuế gi&aacute; trị gia tăng VAT&nbsp;10%.</li>\r\n</ul>\r\n<ul>\r\n<li><strong>CH&Iacute;NH S&Aacute;CH GI&Aacute; TRẺ EM:</strong></li>\r\n</ul>\r\n<ul>\r\n<li>Trẻ em từ 10 tuổi trở l&ecirc;n mua 01 v&eacute;;</li>\r\n<li>Trẻ em từ 04 - 09 tuổi mua&nbsp;75% gi&aacute; v&eacute; người lớn.</li>\r\n<li>02 người lớn chỉ được k&egrave;m 01 trẻ em từ 03 tuổi trở xuống, nếu trẻ em đi k&egrave;m nhiều hơn th&igrave; từ em thứ 02 trở l&ecirc;n phải mua &frac12; v&eacute;.</li>\r\n</ul>\r\n<p><strong>&nbsp;</strong></p>', '<p>&nbsp;</p>\r\n<p><strong>&nbsp;</strong><strong>H&Agrave; NỘI &ndash; CỐ Đ&Ocirc; HOA LƯ &ndash; TAM CỐC &ndash; H&Agrave; NỘI (ăn trưa)</strong></p>\r\n<p><strong>07h30</strong>: Xe v&agrave; hướng dẫn vi&ecirc;n c&ocirc;ng ty du lịch Vietstreet đ&oacute;n qu&yacute; kh&aacute;ch tại điểm hẹn, khởi h&agrave;nh đi Ninh B&igrave;nh (100km c&aacute;ch thủ đ&ocirc; H&agrave; nội), ngắm cảnh v&ugrave;ng n&ocirc;ng th&ocirc;n Vi&ecirc;̣t nam. Qu&yacute; kh&aacute;ch thăm <strong>cố đ&ocirc; Hoa Lư</strong>, <strong>thăm đền vua Đinh, vua L&ecirc;</strong>, được nghe HDV giới thiều về c&aacute;c danh thắng, con người, mảnh đất nơi đ&acirc;y. Ăn trưa tại nh&agrave; h&agrave;ng.</p>\r\n<p><strong>13h00</strong>: Q&uacute;y kh&aacute;ch l&ecirc;n thuy&ecirc;̀n đi dọc theo su&ocirc;́i giữa c&aacute;nh đ&ocirc;̀ng l&uacute;a thăm quan <strong>đ&ocirc;̣ng Tam C&ocirc;́c</strong> (G&ocirc;̀m ba hang: <strong>Hang Cả, Hang Hai , Hang Ba</strong>).</p>\r\n<p><strong>15h30</strong>: Qu&yacute; kh&aacute;ch l&ecirc;n xe trở về H&agrave; nội tr&ecirc;n đường đo&agrave;n dừng mua đặc sản D&ecirc; N&uacute;i, Cơm Ch&aacute;y về l&agrave;m qu&agrave; cho người th&acirc;n.</p>\r\n<p>18h30: Về đến H&agrave; Nội, chia tay qu&yacute; kh&aacute;ch. Kết th&uacute;c chuyến du lịch, hẹn gặp qu&yacute; kh&aacute;ch trong chuyến đi tới.</p>\r\n<p><strong>&nbsp;</strong></p>\r\n<p><strong>BẢNG GI&Aacute; TOUR CHO 1 KH&Aacute;CH GH&Eacute;P ĐO&Agrave;N</strong>:<strong> 650.000</strong> <strong>VND</strong></p>\r\n<p><strong>&nbsp;</strong></p>\r\n<ul>\r\n<li><strong>GI&Aacute; TOUR BAO GỒM:</strong></li>\r\n</ul>\r\n<ul>\r\n<li>Xe du lịch sang trọng, l&aacute;i xe chuy&ecirc;n nghiệp, văn minh, lịch sự phục vụ theo h&agrave;nh tr&igrave;nh.</li>\r\n<li>01 bữa ch&iacute;nh</li>\r\n<li>Hướng dẫn vi&ecirc;n chuy&ecirc;n nghiệp phục vụ nhiệt t&igrave;nh chu đ&aacute;o suốt chuyến đi.</li>\r\n</ul>\r\n<ul>\r\n<li>V&eacute; thăm quan c&aacute;c điểm thăm quan theo h&agrave;nh tr&igrave;nh.</li>\r\n</ul>\r\n<ul>\r\n<li>Nước uống, khăn lạnh phục vụ tr&ecirc;n xe ti&ecirc;u chuẩn 02 chai nước suối/ng&agrave;y thăm quan.</li>\r\n</ul>\r\n<ul>\r\n<li><strong>GI&Aacute; TOUR CHƯA BAO GỒM:</strong></li>\r\n</ul>\r\n<ul>\r\n<li>Đồ uống: rượu, bia, nước ngọt v&agrave; c&aacute;c loại đồ uống c&aacute; nh&acirc;n kh&ocirc;ng đề cập.</li>\r\n<li>C&aacute;c chi ph&iacute; c&aacute; nh&acirc;n: mua sắm, điện thoại, thăm quan ngo&agrave;i h&agrave;nh tr&igrave;nh.</li>\r\n<li>Thuế gi&aacute; trị gia tăng VAT&nbsp;10%.</li>\r\n</ul>\r\n<ul>\r\n<li><strong>CH&Iacute;NH S&Aacute;CH GI&Aacute; TRẺ EM:</strong></li>\r\n</ul>\r\n<ul>\r\n<li>Trẻ em từ 10 tuổi trở l&ecirc;n mua 01 v&eacute;;</li>\r\n<li>Trẻ em từ 04 - 09 tuổi mua&nbsp;75% gi&aacute; v&eacute; người lớn.</li>\r\n<li>02 người lớn chỉ được k&egrave;m 01 trẻ em từ 03 tuổi trở xuống, nếu trẻ em đi k&egrave;m nhiều hơn th&igrave; từ em thứ 02 trở l&ecirc;n phải mua &frac12; v&eacute;.</li>\r\n</ul>\r\n<p><strong>&nbsp;</strong></p>', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Tour Hà Nội - Mộc Châu mùa hoa cải trắng', 'tour ha noi - moc chau mua hoa cai trang', NULL),
(34, 2, '', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'TOUR HÀ NỘI - MỘC CHÂU MÙA HOA CẢI TRẮNG', 'tour hà nội - mộc châu mùa hoa cải trắng', NULL),
(35, 1, '<p><strong>Ng&agrave;y 01&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; H&Agrave; NỘI &ndash;&nbsp; SEOUL&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(Ăn tối)</strong></p>\r\n<p><strong>11h40:</strong> Qu&yacute; kh&aacute;ch tập trung tại Nh&agrave; h&aacute;t lớn (Đ/c: Số 1 Tr&agrave;ng Tiền &ndash; H&agrave; Nội), xe v&agrave; HDV đ&oacute;n v&agrave; đưa đo&agrave;n ra <strong>s&acirc;n bay Nội B&agrave;i</strong> đ&aacute;p chuyến bay HANOI &ndash; SEOUL <strong>VN 9416</strong> <strong>(15:15 &ndash; 21 :20).</strong></p>\r\n<p><strong>21:20:&nbsp; </strong>Đến <strong>s&acirc;n bay Quốc tế Incheon</strong>, Xe v&agrave; HDV đ&oacute;n Qu&yacute; kh&aacute;ch về kh&aacute;ch sạn tại Seoul nghỉ ngơi.&nbsp; Qu&yacute; kh&aacute;ch nghỉ đ&ecirc;m tại kh&aacute;ch sạn Benhur&nbsp; 3* hoặc tương đương</p>\r\n<p><strong>Ng&agrave;y 02&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; SEOUL - EVERLAND&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(Ăn S&aacute;ng, Trưa, Tối)</strong></p>\r\n<p><strong>S&aacute;ng</strong>&nbsp;&nbsp;&nbsp; Sau khi ăn s&aacute;ng, xe v&agrave; HDV đi tham quan:</p>\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>Nh&agrave; Xanh &ndash;</strong> <em>Phủ Tổng Thống</em></p>\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>Cung đi</strong><strong>ện ho&agrave;ng gia Kyong bok</strong> - <em>nơi m&agrave; c&aacute;c vua ch&uacute;a <strong>triều đại Jocheon</strong> từng ngự trị.</em></p>\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>B</strong><strong>ảo t&agrave;ng d&acirc;n gian quốc gia</strong> - <em>l&agrave; bảo t&agrave;ng quốc gia duy nhất về văn h&oacute;a d&acirc;n gian, trưng b&agrave;y khoảng 4.000 hiện vật về đời sống văn h&oacute;a</em></p>\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>Qu</strong><strong>ảng trường Gwanghawamun</strong> v&agrave; d&ograve;ng suối nh&acirc;n tạo Chonggye</p>\r\n<p><strong>Trưa</strong>&nbsp;&nbsp; Kết th&uacute;c chương tr&igrave;nh tham quan buổi s&aacute;ng Qu&yacute; kh&aacute;ch d&ugrave;ng bữa trưa tại nh&agrave; h&agrave;ng.</p>\r\n<p><strong>Chiều</strong>&nbsp; Sau khi ăn trưa v&agrave; nghỉ ngơi Qu&yacute; kh&aacute;ch tiếp tục đi thăm quan <strong>c&ocirc;ng vi&ecirc;n Everland</strong> &ndash; <em>c&ocirc;ng vi&ecirc;n lớn nhất ở H&agrave;n Quốc</em>, được xếp vị tr&iacute; thứ 8 trong danh s&aacute;ch 10 c&ocirc;ng vi&ecirc;n giải tr&iacute; thu h&uacute;t đ&ocirc;ng kh&aacute;ch nhất thế giới tại đ&acirc;y Qu&yacute; kh&aacute;ch sẽ tham gia c&aacute;c tr&ograve; chơi hấp dẫn c&oacute; bao gồm trong v&eacute; v&agrave;o cửa.</p>\r\n<p><strong>Tối</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Qu&yacute; kh&aacute;ch nghỉ đ&ecirc;m tại kh&aacute;ch sạn Benhur&nbsp; 3* hoặc tương đương v&agrave; tự do t&igrave;m hiểu SEOUL về đ&ecirc;m.</p>\r\n<p><strong>Ng&agrave;y 03&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; SEOUL &ndash; NAMI &ndash; C&Ocirc;NG VI&Ecirc;N NƯỚC&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(Ăn S&aacute;ng, Trưa, Tối)</strong></p>\r\n<p><strong>S&aacute;ng</strong>&nbsp;&nbsp;&nbsp; Sau &nbsp;ăn s&aacute;ng Qu&yacute; kh&aacute;ch tham quan <strong>Đảo Nami</strong>: <em>h&ograve;n đảo l&atilde;ng mạn &ndash; nơi đ&atilde; từng quay bộ phim nổi tiếng &ldquo; Bản t&igrave;nh ca M&ugrave;a Đ&ocirc;ng&rdquo; với những h&agrave;ng c&acirc;y cao v&uacute;t v&agrave; bức tượng t&igrave;nh y&ecirc;u vĩnh cửu.</em>Qu&yacute; kh&aacute;ch nghỉ ngơi v&agrave; d&ugrave;ng bữa trưa tại nh&agrave; h&agrave;ng.</p>\r\n<p><strong>Chiều</strong> Qu&yacute; kh&aacute;ch trải nhiệm <strong>tắm Sauna kiểu H&agrave;n Quốc</strong> v&agrave; vui chơi tại <strong>Trung T&acirc;m Sealala v&agrave; C&ocirc;ng vi&ecirc;n nước</strong>. Kết th&uacute;c một ng&agrave;y vui vẻ Qu&yacute; kh&aacute;ch nghỉ đ&ecirc;m tại kh&aacute;ch sạn Benhur&nbsp; 3* (hoặc tương đương) v&agrave; tự do tham quan.</p>\r\n<p><strong>Ng&agrave;y 04&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; SEOUL&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(Ăn S&aacute;ng, Trưa, Tối)</strong></p>\r\n<p><strong>S&aacute;ng</strong>&nbsp;&nbsp;&nbsp; Sau khi ăn s&aacute;ng, xe v&agrave; HDV đưa Qu&yacute; kh&aacute;ch tham quan v&agrave; mua sắm tại tinh dầu th&ocirc;ng đỏ, Goryo Garden, cửa h&agrave;ng s&acirc;m tươi v&agrave; Nấm Linh Chi v&agrave; ăn trưa tại nh&agrave; h&agrave;ng.</p>\r\n<p><strong>Chiều</strong>&nbsp; Qu&yacute; kh&aacute;ch tham quan <strong>Ch&ugrave;a Joggyesa</strong> &ndash; <em>ng&ocirc;i ch&ugrave;a lớn nhất thủ đ&ocirc; Seoul.</em> Đo&agrave;n tham mua sắm tại cửa h&agrave;ng miễn thuế, khu phố thời trang MyeongDong. Qu&yacute; kh&aacute;ch nghỉ đ&ecirc;m tại kh&aacute;ch sạn Benhur&nbsp; 3* hoặc tương đương</p>\r\n<p><strong>Ng&agrave;y 5 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; SEOUL &ndash; HANOI&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Ăn s&aacute;ng</strong></p>\r\n<p>Qu&yacute; kh&aacute;ch ăn s&aacute;ng, l&agrave;m thủ tục trả ph&ograve;ng. Sau đ&oacute;, xe đưa Qu&yacute; kh&aacute;ch ra s&acirc;n bay đ&aacute;p chuyến bay <strong>VN9417 (10:50-13:20) SEOUL &ndash; HANOI</strong>. Tới s&acirc;n bay Nội B&agrave;i, xe đ&oacute;n v&agrave; đưa kh&aacute;ch về trung t&acirc;m th&agrave;nh phố, chia tay kết th&uacute;c chương tr&igrave;nh.</p>\r\n<p>&nbsp;</p>\r\n<p><strong>Gi&aacute; trọn g&oacute;i d&agrave;nh cho 01 kh&aacute;ch:&nbsp;11.900.000 VND</strong></p>\r\n<p>&nbsp;(Gi&aacute; d&agrave;nh cho đo&agrave;n 15 kh&aacute;ch trở l&ecirc;n)</p>\r\n<p>(Chương tr&igrave;nh c&oacute; thể thay đổi tuy nhi&ecirc;n vẫn&nbsp; đảm bảo c&aacute;c điểm tham quan)</p>\r\n<p><strong>GI&Aacute; TOUR BAO GỒM:</strong></p>\r\n<ol>\r\n<li>V&eacute; m&aacute;y bay khứ hồi bay thẳng H&agrave; nội &ndash; Seoul &ndash; H&agrave; nội của h&atilde;ng h&agrave;ng kh&ocirc;ng Vietnam Airline + thuế v&agrave; phụ thu nhi&ecirc;n liệu c&aacute;c chặng bay v&agrave; lệ ph&iacute; s&acirc;n bay</li>\r\n<li>Xe &ocirc;t&ocirc; chất lượng cao phục vụ kh&aacute;ch theo suốt chương tr&igrave;nh</li>\r\n<li>01 Hướng dẫn vi&ecirc;n du lịch nhiệt t&igrave;nh, kinh nghiệm, th&ocirc;ng thạo tiếng Việt đi theo đo&agrave;n từ Việt Nam v&agrave; 01 hướng dẫn vi&ecirc;n nhiệt t&igrave;nh, kinh nghiệm, th&ocirc;ng thạo tiếng Việt &ndash; H&agrave;n tại H&agrave;n Quốc.</li>\r\n<li>V&eacute; tham quan thắng cảnh tại c&aacute;c điểm du lịch trong chương tr&igrave;nh.</li>\r\n<li>Nghỉ đ&ecirc;m tại kh&aacute;ch sạn 3* ở Seoul (02 người/ph&ograve;ng, đo&agrave;n lẻ nam hoặc nữ sẽ xếp 3 người/ ph&ograve;ng)</li>\r\n<li>C&aacute;c bữa ăn trọn g&oacute;i đ&atilde; ghi trong chương tr&igrave;nh</li>\r\n<li>Lệ ph&iacute; Visa nhập cảnh H&agrave;n Quốc + Ph&iacute; dịch thuật hồ sơ</li>\r\n<li>Bảo hiểm du lịch quốc tế.</li>\r\n<li>Qu&agrave; tặng: mũ, vỏ hộ chiếu</li>\r\n<li>Tặng ngay Voucher mua sắm tại H&agrave;n Quốc trị gi&aacute; đến 1.000.000đ</li>\r\n<li>Bảo hiểm Du lịch mức đền b&ugrave; cao nhất 210 triệu đồng.</li>\r\n</ol>\r\n<p><strong>GI&Aacute; TOUR KH&Ocirc;NG BAO GỒM:</strong></p>\r\n<ol>\r\n<li>Ph&iacute; l&agrave;m hộ chiếu</li>\r\n<li>Cước h&agrave;nh l&yacute; qu&aacute; tải, đồ uống, giặt l&agrave;, điện thoại</li>\r\n<li>Ngủ ph&ograve;ng đơn, chi ph&iacute; c&aacute; nh&acirc;n kh&aacute;c ngo&agrave;i chương tr&igrave;nh&hellip;..</li>\r\n<li>Tiền tip cho HDV v&agrave; l&aacute;i xe: 06 USD/kh&aacute;ch/ng&agrave;y (chi ph&iacute; bắt buộc)</li>\r\n<li>Visa t&aacute;i nhập Việt Nam.</li>\r\n<li>H&agrave;nh l&yacute; qu&aacute; cước qui định v&agrave; c&aacute;c chi ph&iacute; c&aacute; nh&acirc;n ph&aacute;t sinh ngo&agrave;i chương tr&igrave;nh.</li>\r\n</ol>\r\n<p><strong>LƯU &Yacute;:</strong></p>\r\n<ol>\r\n<li>Bất cứ một h&igrave;nh thức bỏ hoặc kh&ocirc;ng sử dụng dịch vụ g&igrave; tại nước ngo&agrave;i đều kh&ocirc;ng được ho&agrave;n lại tiền v&igrave; mọi dịch vụ đ&atilde; được thanh to&aacute;n trước. Theo chương tr&igrave;nh khuyến mại đ&atilde; k&yacute; với đối t&aacute;c H&agrave;n Quốc, qu&yacute; kh&aacute;ch sẽ đi theo tour suốt chương tr&igrave;nh. Qu&yacute; kh&aacute;ch n&agrave;o t&aacute;ch đo&agrave;n vui l&ograve;ng b&aacute;o trước v&agrave; trả th&ecirc;m 2.500.000 VNĐ/kh&aacute;ch/ lần.</li>\r\n<li>Lịch tr&igrave;nh của chương tr&igrave;nh c&oacute; thể thay đổi tuỳ theo thời tiết v&agrave; điều kiện giao th&ocirc;ng tại H&agrave;n Quốc</li>\r\n<li>Kinh ph&iacute; tr&ecirc;n &aacute;p dụng cho kh&aacute;ch h&agrave;ng mang hộ chiếu Việt nam (hộ chiếu c&ograve;n gi&aacute; trị từ 6 th&aacute;ng trở l&ecirc;n kể từ ng&agrave;y khởi h&agrave;nh). Kh&aacute;ch mang hộ chiếu nước ngo&agrave;i, vui l&ograve;ng kiểm tra lại.</li>\r\n<li>Chương tr&igrave;nh tr&ecirc;n c&oacute; thể thay đổi về thời gian v&agrave; lịch tr&igrave;nh, nhưng vẫn đảm bảo c&aacute;c điểm thăm quan như tr&ecirc;n.</li>\r\n<li>V&eacute; m&aacute;y bay theo lịch tr&igrave;nh cả đo&agrave;n, nếu c&oacute; sự thay đổi sau khi xuất v&eacute;, v&eacute; sẽ kh&ocirc;ng c&ograve;n gi&aacute; trị. Giờ giấc cuối c&ugrave;ng phụ thuộc v&agrave;o h&atilde;ng h&agrave;ng kh&ocirc;ng.</li>\r\n<li>C&aacute;c phần dịch vụ kh&ocirc;ng sử dụng đến m&agrave; kh&ocirc;ng b&aacute;o trước khi đăng k&yacute; sẽ kh&ocirc;ng được ho&agrave;n lại.</li>\r\n<li>Chương tr&igrave;nh tr&ecirc;n l&agrave; chương tr&igrave;nh du lịch thuần tu&yacute;, Qu&yacute; kh&aacute;ch c&oacute; nhu cầu kết hợp l&agrave;m việc, đề nghị th&ocirc;ng b&aacute;o r&otilde; khi l&agrave;m thủ tục đăng k&yacute;</li>\r\n<li>Trẻ em từ 2 đến dưới 11 tuổi: 80 % gi&aacute; tour (ngủ chung gường với cha mẹ).</li>\r\n<li>Trẻ em dưới 02 tuổi :&nbsp; 30 % gi&aacute; tour (ngủ chung giường với cha mẹ).</li>\r\n<li>Trẻ em từ 12 tuổi &nbsp;: Gi&aacute; tour thu như người lớn</li>\r\n<li>Tỷ gi&aacute; tiền thanh to&aacute;n c&oacute; thể thay đổi v&agrave;o thời điểm thanh to&aacute;n &aacute;p dụng tỉ gi&aacute; b&aacute;n ra của thị trường tự do.</li>\r\n<li>Tiền thuế c&oacute; thể thay đổi v&agrave;o thời điểm xuất v&eacute;.</li>\r\n<li>Trong trường hợp chỉ c&oacute; 01 kh&aacute;ch (người lớn) đi với 01 b&eacute; (dưới 12 tuổi), qu&yacute; kh&aacute;ch vui l&ograve;ng đ&oacute;ng tiền tour cho B&eacute; ngủ giường ri&ecirc;ng.</li>\r\n<li>Ch&uacute;ng t&ocirc;i kh&ocirc;ng nhận kh&aacute;ch nữ c&oacute; thai từ 5 th&aacute;ng trở l&ecirc;n tham gia c&aacute;c tour du lịch nước ngo&agrave;i.</li>\r\n<li>Qu&yacute; kh&aacute;ch từ 70 tuổi trở l&ecirc;n vui l&ograve;ng đ&oacute;ng th&ecirc;m ph&iacute; bảo hiểm cao cấp (ph&iacute; thay đổi t&ugrave;y theo tour)</li>\r\n<li>Qu&yacute; kh&aacute;ch từ 75 tuổi trở l&ecirc;n y&ecirc;u cầu phải c&oacute; giấy x&aacute;c nhận đầy đủ sức khỏe để đi du lịch nước ngo&agrave;i của B&aacute;c sĩ v&agrave; phải c&oacute; người th&acirc;n dưới 60 tuổi (đầy đủ sức khỏe) đi theo.</li>\r\n<li>Trong trường hợp bất khả kh&aacute;ng do thời tiết, thi&ecirc;n tai, đ&igrave;nh c&ocirc;ng, bạo động, ph&aacute; hoại, chiến tranh, dịch bệnh, chuyến bay bị tr&igrave; ho&atilde;n hay bị hủy do thời tiết hoặc do kỹ thuật&hellip;..dẫn đến tour kh&ocirc;ng thể thực hiện tiếp tục được, ch&uacute;ng t&ocirc;i sẽ ho&agrave;n trả lại tiền tour cho qu&yacute; kh&aacute;ch sau khi đ&atilde; trừ lại c&aacute;c chi ph&iacute; dịch vụ đ&atilde; thực hiện như ph&iacute; l&agrave;m visa,&hellip; v&agrave; kh&ocirc;ng chịu tr&aacute;ch nhiệm bồi thường th&ecirc;m bất kỳ chi ph&iacute; n&agrave;o kh&aacute;c.</li>\r\n</ol>\r\n<p>Thủ tục đăng k&yacute; (xin visa):</p>\r\n<ol>\r\n<li>Hộ chiếu c&ograve;n hạn sử dụng tr&ecirc;n 6 th&aacute;ng (hộ chiếu cũ k&egrave;m theo nếu c&oacute;) với 02 ảnh 3x4 chụp tr&ecirc;n nền ph&ocirc;ng trắng trong v&ograve;ng 6 th&aacute;ng gần đ&acirc;y (hộ chiếu cũ k&egrave;m theo nếu c&oacute;) + bản ph&ocirc; t&ocirc; CMND</li>\r\n<li>Bản c&ocirc;ng chứng phường sở tại Sổ hộ khẩu, giấy đăng k&yacute; kết h&ocirc;n, giấy khai sinh của con (nếu đi theo gia đ&igrave;nh)</li>\r\n<li>Với những kh&aacute;ch h&agrave;ng c&oacute; ng&agrave;y th&aacute;ng năm sinh từ năm 1940 l&ugrave;i về trước phải c&oacute; giấy kh&aacute;m sức khỏe k&egrave;m theo</li>\r\n<li>Với những kh&aacute;ch h&agrave;ng đ&atilde; từng đi c&aacute;c nước trong th&agrave;nh vi&ecirc;n OECD (Nhật, Ch&acirc;u &Acirc;u, &Uacute;c, Mỹ&hellip;) trong v&ograve;ng 3 năm trở lại đ&acirc;y sẽ được miễn chứng minh t&agrave;i ch&iacute;nh</li>\r\n</ol>\r\n<p>* Về chứng minh t&agrave;i ch&iacute;nh, Qu&yacute; kh&aacute;ch nộp những giấy tờ sau:</p>\r\n<ol start="5">\r\n<li>Photo Sổ tiết kiệm trị gi&aacute; tối thiểu 5000 USD/ người hoặc 100.000.000đ tiền Việt thời hạn gửi trước khi xin visa tối thiểu 03 th&aacute;ng (y&ecirc;u cầu bắt buộc)+ x&aacute;c nhận số dư sổ tiết kiệm bản gốc tại ng&acirc;n h&agrave;ng ở thời điểm gần nhất (c&oacute; gi&aacute; trị trong v&ograve;ng 1 tuần kể từ ng&agrave;y xin x&aacute;c nhận )</li>\r\n<li>Nếu sổ tiết kiệm chưa gửi đủ 3 th&aacute;ng (với điều kiện đ&atilde; gửi đủ 1 th&aacute;ng t&iacute;nh đến ng&agrave;y xin visa, kỳ hạn gửi tối thiểu 3 th&aacute;ng) k&egrave;m theo Bản c&ocirc;ng chứng phường sở tại Sổ đỏ nh&agrave; đất hoặc đăng k&yacute; &ocirc; t&ocirc; trong v&ograve;ng 5 năm trở lại đ&acirc;y</li>\r\n</ol>\r\n<p>* Về chứng minh c&ocirc;ng việc:</p>\r\n<ol start="7">\r\n<li>Đối với kh&aacute;ch h&agrave;ng đang đi l&agrave;m:</li>\r\n</ol>\r\n<p>o&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Bản photo của Hợp đồng lao động hoặc quyết định bổ nhiệm hoặc quyết định tăng lương.</p>\r\n<p>o&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; X&aacute;c nhận c&ocirc;ng việc tại thời điểm hiện tại</p>\r\n<p>o&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; X&aacute;c nhận mức lương hoặc bảng lương 3 th&aacute;ng gần nhất hoặc sao k&ecirc; t&agrave;i khoản ng&acirc;n h&agrave;ng 3 th&aacute;ng gần nhất (Nếu c&ocirc;ng ty trả lương bằng h&igrave;nh thức chuyển khoản)</p>\r\n<ol start="8">\r\n<li>Đối với kh&aacute;ch h&agrave;ng l&agrave; chủ doanh nghệp: Bản sao c&ocirc;ng chứng tại phường sở tại Giấy ph&eacute;p đăng k&yacute; kinh doanh</li>\r\n<li>Đối với kh&aacute;ch h&agrave;ng l&agrave; hưu tr&iacute;: Bản sao thẻ hưu tr&iacute;</li>\r\n<li>Đối với khach h&agrave;ng l&agrave; học sinh/ sinh vi&ecirc;n: Bản photo thẻ học sinh/ sinh vi&ecirc;n. Hoặc bản photo giấy khen học kỳ gần nhất hoặc bản gốc x&aacute;c nhận của trường đang theo học</li>\r\n</ol>', 'Hàn Quốc nổi tiếng với những danh lam thắng cảnh như: Nam Mi thơ mộng được biết đến qua bộ phim " Bản tình ca Mùa Đông", hay công viên Everland là công viên giải trí hiện đại và lớn nhất Hàn Quốc, nằm tọa lạc tại Yongin thuộc tỉnh Gyeonggi-do. Seoul là thành phố lớn nhất ở Hàn Quốc và được biết đến là thành phố không bao giờ ngủ ở châu Á. Bất cứ điều gì mà bạn đang tìm kiếm ở địa điểm du lịch này, từ cung điện truyền thống đến những khu mua sắm hiện đại, nghệ thuật và âm nhạc hay các tuyến đường văn hóa, Seoul luôn có nhiều lựa chọn cho bạn.', '<p>&nbsp;</p>\r\n<p><strong>&nbsp;</strong><strong>H&Agrave; NỘI &ndash; CỐ Đ&Ocirc; HOA LƯ &ndash; TAM CỐC &ndash; H&Agrave; NỘI (ăn trưa)</strong></p>\r\n<p><strong>07h30</strong>: Xe v&agrave; hướng dẫn vi&ecirc;n c&ocirc;ng ty du lịch Vietstreet đ&oacute;n qu&yacute; kh&aacute;ch tại điểm hẹn, khởi h&agrave;nh đi Ninh B&igrave;nh (100km c&aacute;ch thủ đ&ocirc; H&agrave; nội), ngắm cảnh v&ugrave;ng n&ocirc;ng th&ocirc;n Vi&ecirc;̣t nam. Qu&yacute; kh&aacute;ch thăm <strong>cố đ&ocirc; Hoa Lư</strong>, <strong>thăm đền vua Đinh, vua L&ecirc;</strong>, được nghe HDV giới thiều về c&aacute;c danh thắng, con người, mảnh đất nơi đ&acirc;y. Ăn trưa tại nh&agrave; h&agrave;ng.</p>\r\n<p><strong>13h00</strong>: Q&uacute;y kh&aacute;ch l&ecirc;n thuy&ecirc;̀n đi dọc theo su&ocirc;́i giữa c&aacute;nh đ&ocirc;̀ng l&uacute;a thăm quan <strong>đ&ocirc;̣ng Tam C&ocirc;́c</strong> (G&ocirc;̀m ba hang: <strong>Hang Cả, Hang Hai , Hang Ba</strong>).</p>\r\n<p><strong>15h30</strong>: Qu&yacute; kh&aacute;ch l&ecirc;n xe trở về H&agrave; nội tr&ecirc;n đường đo&agrave;n dừng mua đặc sản D&ecirc; N&uacute;i, Cơm Ch&aacute;y về l&agrave;m qu&agrave; cho người th&acirc;n.</p>\r\n<p>18h30: Về đến H&agrave; Nội, chia tay qu&yacute; kh&aacute;ch. Kết th&uacute;c chuyến du lịch, hẹn gặp qu&yacute; kh&aacute;ch trong chuyến đi tới.</p>\r\n<p><strong>&nbsp;</strong></p>\r\n<p><strong>BẢNG GI&Aacute; TOUR CHO 1 KH&Aacute;CH GH&Eacute;P ĐO&Agrave;N</strong>:<strong> 650.000</strong> <strong>VND</strong></p>\r\n<p><strong>&nbsp;</strong></p>\r\n<ul>\r\n<li><strong>GI&Aacute; TOUR BAO GỒM:</strong></li>\r\n</ul>\r\n<ul>\r\n<li>Xe du lịch sang trọng, l&aacute;i xe chuy&ecirc;n nghiệp, văn minh, lịch sự phục vụ theo h&agrave;nh tr&igrave;nh.</li>\r\n<li>01 bữa ch&iacute;nh</li>\r\n<li>Hướng dẫn vi&ecirc;n chuy&ecirc;n nghiệp phục vụ nhiệt t&igrave;nh chu đ&aacute;o suốt chuyến đi.</li>\r\n</ul>\r\n<ul>\r\n<li>V&eacute; thăm quan c&aacute;c điểm thăm quan theo h&agrave;nh tr&igrave;nh.</li>\r\n</ul>\r\n<ul>\r\n<li>Nước uống, khăn lạnh phục vụ tr&ecirc;n xe ti&ecirc;u chuẩn 02 chai nước suối/ng&agrave;y thăm quan.</li>\r\n</ul>\r\n<ul>\r\n<li><strong>GI&Aacute; TOUR CHƯA BAO GỒM:</strong></li>\r\n</ul>\r\n<ul>\r\n<li>Đồ uống: rượu, bia, nước ngọt v&agrave; c&aacute;c loại đồ uống c&aacute; nh&acirc;n kh&ocirc;ng đề cập.</li>\r\n<li>C&aacute;c chi ph&iacute; c&aacute; nh&acirc;n: mua sắm, điện thoại, thăm quan ngo&agrave;i h&agrave;nh tr&igrave;nh.</li>\r\n<li>Thuế gi&aacute; trị gia tăng VAT&nbsp;10%.</li>\r\n</ul>\r\n<ul>\r\n<li><strong>CH&Iacute;NH S&Aacute;CH GI&Aacute; TRẺ EM:</strong></li>\r\n</ul>\r\n<ul>\r\n<li>Trẻ em từ 10 tuổi trở l&ecirc;n mua 01 v&eacute;;</li>\r\n<li>Trẻ em từ 04 - 09 tuổi mua&nbsp;75% gi&aacute; v&eacute; người lớn.</li>\r\n<li>02 người lớn chỉ được k&egrave;m 01 trẻ em từ 03 tuổi trở xuống, nếu trẻ em đi k&egrave;m nhiều hơn th&igrave; từ em thứ 02 trở l&ecirc;n phải mua &frac12; v&eacute;.</li>\r\n</ul>\r\n<p><strong>&nbsp;</strong></p>', '<p>&nbsp;</p>\r\n<p><strong>&nbsp;</strong><strong>H&Agrave; NỘI &ndash; CỐ Đ&Ocirc; HOA LƯ &ndash; TAM CỐC &ndash; H&Agrave; NỘI (ăn trưa)</strong></p>\r\n<p><strong>07h30</strong>: Xe v&agrave; hướng dẫn vi&ecirc;n c&ocirc;ng ty du lịch Vietstreet đ&oacute;n qu&yacute; kh&aacute;ch tại điểm hẹn, khởi h&agrave;nh đi Ninh B&igrave;nh (100km c&aacute;ch thủ đ&ocirc; H&agrave; nội), ngắm cảnh v&ugrave;ng n&ocirc;ng th&ocirc;n Vi&ecirc;̣t nam. Qu&yacute; kh&aacute;ch thăm <strong>cố đ&ocirc; Hoa Lư</strong>, <strong>thăm đền vua Đinh, vua L&ecirc;</strong>, được nghe HDV giới thiều về c&aacute;c danh thắng, con người, mảnh đất nơi đ&acirc;y. Ăn trưa tại nh&agrave; h&agrave;ng.</p>\r\n<p><strong>13h00</strong>: Q&uacute;y kh&aacute;ch l&ecirc;n thuy&ecirc;̀n đi dọc theo su&ocirc;́i giữa c&aacute;nh đ&ocirc;̀ng l&uacute;a thăm quan <strong>đ&ocirc;̣ng Tam C&ocirc;́c</strong> (G&ocirc;̀m ba hang: <strong>Hang Cả, Hang Hai , Hang Ba</strong>).</p>\r\n<p><strong>15h30</strong>: Qu&yacute; kh&aacute;ch l&ecirc;n xe trở về H&agrave; nội tr&ecirc;n đường đo&agrave;n dừng mua đặc sản D&ecirc; N&uacute;i, Cơm Ch&aacute;y về l&agrave;m qu&agrave; cho người th&acirc;n.</p>\r\n<p>18h30: Về đến H&agrave; Nội, chia tay qu&yacute; kh&aacute;ch. Kết th&uacute;c chuyến du lịch, hẹn gặp qu&yacute; kh&aacute;ch trong chuyến đi tới.</p>\r\n<p><strong>&nbsp;</strong></p>\r\n<p><strong>BẢNG GI&Aacute; TOUR CHO 1 KH&Aacute;CH GH&Eacute;P ĐO&Agrave;N</strong>:<strong> 650.000</strong> <strong>VND</strong></p>\r\n<p><strong>&nbsp;</strong></p>\r\n<ul>\r\n<li><strong>GI&Aacute; TOUR BAO GỒM:</strong></li>\r\n</ul>\r\n<ul>\r\n<li>Xe du lịch sang trọng, l&aacute;i xe chuy&ecirc;n nghiệp, văn minh, lịch sự phục vụ theo h&agrave;nh tr&igrave;nh.</li>\r\n<li>01 bữa ch&iacute;nh</li>\r\n<li>Hướng dẫn vi&ecirc;n chuy&ecirc;n nghiệp phục vụ nhiệt t&igrave;nh chu đ&aacute;o suốt chuyến đi.</li>\r\n</ul>\r\n<ul>\r\n<li>V&eacute; thăm quan c&aacute;c điểm thăm quan theo h&agrave;nh tr&igrave;nh.</li>\r\n</ul>\r\n<ul>\r\n<li>Nước uống, khăn lạnh phục vụ tr&ecirc;n xe ti&ecirc;u chuẩn 02 chai nước suối/ng&agrave;y thăm quan.</li>\r\n</ul>\r\n<ul>\r\n<li><strong>GI&Aacute; TOUR CHƯA BAO GỒM:</strong></li>\r\n</ul>\r\n<ul>\r\n<li>Đồ uống: rượu, bia, nước ngọt v&agrave; c&aacute;c loại đồ uống c&aacute; nh&acirc;n kh&ocirc;ng đề cập.</li>\r\n<li>C&aacute;c chi ph&iacute; c&aacute; nh&acirc;n: mua sắm, điện thoại, thăm quan ngo&agrave;i h&agrave;nh tr&igrave;nh.</li>\r\n<li>Thuế gi&aacute; trị gia tăng VAT&nbsp;10%.</li>\r\n</ul>\r\n<ul>\r\n<li><strong>CH&Iacute;NH S&Aacute;CH GI&Aacute; TRẺ EM:</strong></li>\r\n</ul>\r\n<ul>\r\n<li>Trẻ em từ 10 tuổi trở l&ecirc;n mua 01 v&eacute;;</li>\r\n<li>Trẻ em từ 04 - 09 tuổi mua&nbsp;75% gi&aacute; v&eacute; người lớn.</li>\r\n<li>02 người lớn chỉ được k&egrave;m 01 trẻ em từ 03 tuổi trở xuống, nếu trẻ em đi k&egrave;m nhiều hơn th&igrave; từ em thứ 02 trở l&ecirc;n phải mua &frac12; v&eacute;.</li>\r\n</ul>\r\n<p><strong>&nbsp;</strong></p>', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Tour Hà Nội - Hoa Lư - Tam Cốc', 'tour ha noi - hoa lu - tam coc', NULL),
(35, 2, '', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'TOUR HÀ NỘI - HOA LƯ - TAM CỐC', 'tour hà nội - hoa lư - tam cốc', NULL);
INSERT INTO `tours_lang` (`tour_id`, `lang_id`, `schedule`, `desc`, `detail`, `notice`, `created_at`, `updated_at`, `name`, `keyword`, `intro`) VALUES
(36, 1, '<p><strong>Ng&agrave;y 01&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; H&Agrave; NỘI &ndash;&nbsp; SEOUL&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(Ăn tối)</strong></p>\r\n<p><strong>11h40:</strong> Qu&yacute; kh&aacute;ch tập trung tại Nh&agrave; h&aacute;t lớn (Đ/c: Số 1 Tr&agrave;ng Tiền &ndash; H&agrave; Nội), xe v&agrave; HDV đ&oacute;n v&agrave; đưa đo&agrave;n ra <strong>s&acirc;n bay Nội B&agrave;i</strong> đ&aacute;p chuyến bay HANOI &ndash; SEOUL <strong>VN 9416</strong> <strong>(15:15 &ndash; 21 :20).</strong></p>\r\n<p><strong>21:20:&nbsp; </strong>Đến <strong>s&acirc;n bay Quốc tế Incheon</strong>, Xe v&agrave; HDV đ&oacute;n Qu&yacute; kh&aacute;ch về kh&aacute;ch sạn tại Seoul nghỉ ngơi.&nbsp; Qu&yacute; kh&aacute;ch nghỉ đ&ecirc;m tại kh&aacute;ch sạn Benhur&nbsp; 3* hoặc tương đương</p>\r\n<p><strong>Ng&agrave;y 02&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; SEOUL - EVERLAND&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(Ăn S&aacute;ng, Trưa, Tối)</strong></p>\r\n<p><strong>S&aacute;ng</strong>&nbsp;&nbsp;&nbsp; Sau khi ăn s&aacute;ng, xe v&agrave; HDV đi tham quan:</p>\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>Nh&agrave; Xanh &ndash;</strong> <em>Phủ Tổng Thống</em></p>\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>Cung đi</strong><strong>ện ho&agrave;ng gia Kyong bok</strong> - <em>nơi m&agrave; c&aacute;c vua ch&uacute;a <strong>triều đại Jocheon</strong> từng ngự trị.</em></p>\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>B</strong><strong>ảo t&agrave;ng d&acirc;n gian quốc gia</strong> - <em>l&agrave; bảo t&agrave;ng quốc gia duy nhất về văn h&oacute;a d&acirc;n gian, trưng b&agrave;y khoảng 4.000 hiện vật về đời sống văn h&oacute;a</em></p>\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>Qu</strong><strong>ảng trường Gwanghawamun</strong> v&agrave; d&ograve;ng suối nh&acirc;n tạo Chonggye</p>\r\n<p><strong>Trưa</strong>&nbsp;&nbsp; Kết th&uacute;c chương tr&igrave;nh tham quan buổi s&aacute;ng Qu&yacute; kh&aacute;ch d&ugrave;ng bữa trưa tại nh&agrave; h&agrave;ng.</p>\r\n<p><strong>Chiều</strong>&nbsp; Sau khi ăn trưa v&agrave; nghỉ ngơi Qu&yacute; kh&aacute;ch tiếp tục đi thăm quan <strong>c&ocirc;ng vi&ecirc;n Everland</strong> &ndash; <em>c&ocirc;ng vi&ecirc;n lớn nhất ở H&agrave;n Quốc</em>, được xếp vị tr&iacute; thứ 8 trong danh s&aacute;ch 10 c&ocirc;ng vi&ecirc;n giải tr&iacute; thu h&uacute;t đ&ocirc;ng kh&aacute;ch nhất thế giới tại đ&acirc;y Qu&yacute; kh&aacute;ch sẽ tham gia c&aacute;c tr&ograve; chơi hấp dẫn c&oacute; bao gồm trong v&eacute; v&agrave;o cửa.</p>\r\n<p><strong>Tối</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Qu&yacute; kh&aacute;ch nghỉ đ&ecirc;m tại kh&aacute;ch sạn Benhur&nbsp; 3* hoặc tương đương v&agrave; tự do t&igrave;m hiểu SEOUL về đ&ecirc;m.</p>\r\n<p><strong>Ng&agrave;y 03&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; SEOUL &ndash; NAMI &ndash; C&Ocirc;NG VI&Ecirc;N NƯỚC&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(Ăn S&aacute;ng, Trưa, Tối)</strong></p>\r\n<p><strong>S&aacute;ng</strong>&nbsp;&nbsp;&nbsp; Sau &nbsp;ăn s&aacute;ng Qu&yacute; kh&aacute;ch tham quan <strong>Đảo Nami</strong>: <em>h&ograve;n đảo l&atilde;ng mạn &ndash; nơi đ&atilde; từng quay bộ phim nổi tiếng &ldquo; Bản t&igrave;nh ca M&ugrave;a Đ&ocirc;ng&rdquo; với những h&agrave;ng c&acirc;y cao v&uacute;t v&agrave; bức tượng t&igrave;nh y&ecirc;u vĩnh cửu.</em>Qu&yacute; kh&aacute;ch nghỉ ngơi v&agrave; d&ugrave;ng bữa trưa tại nh&agrave; h&agrave;ng.</p>\r\n<p><strong>Chiều</strong> Qu&yacute; kh&aacute;ch trải nhiệm <strong>tắm Sauna kiểu H&agrave;n Quốc</strong> v&agrave; vui chơi tại <strong>Trung T&acirc;m Sealala v&agrave; C&ocirc;ng vi&ecirc;n nước</strong>. Kết th&uacute;c một ng&agrave;y vui vẻ Qu&yacute; kh&aacute;ch nghỉ đ&ecirc;m tại kh&aacute;ch sạn Benhur&nbsp; 3* (hoặc tương đương) v&agrave; tự do tham quan.</p>\r\n<p><strong>Ng&agrave;y 04&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; SEOUL&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(Ăn S&aacute;ng, Trưa, Tối)</strong></p>\r\n<p><strong>S&aacute;ng</strong>&nbsp;&nbsp;&nbsp; Sau khi ăn s&aacute;ng, xe v&agrave; HDV đưa Qu&yacute; kh&aacute;ch tham quan v&agrave; mua sắm tại tinh dầu th&ocirc;ng đỏ, Goryo Garden, cửa h&agrave;ng s&acirc;m tươi v&agrave; Nấm Linh Chi v&agrave; ăn trưa tại nh&agrave; h&agrave;ng.</p>\r\n<p><strong>Chiều</strong>&nbsp; Qu&yacute; kh&aacute;ch tham quan <strong>Ch&ugrave;a Joggyesa</strong> &ndash; <em>ng&ocirc;i ch&ugrave;a lớn nhất thủ đ&ocirc; Seoul.</em> Đo&agrave;n tham mua sắm tại cửa h&agrave;ng miễn thuế, khu phố thời trang MyeongDong. Qu&yacute; kh&aacute;ch nghỉ đ&ecirc;m tại kh&aacute;ch sạn Benhur&nbsp; 3* hoặc tương đương</p>\r\n<p><strong>Ng&agrave;y 5 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; SEOUL &ndash; HANOI&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Ăn s&aacute;ng</strong></p>\r\n<p>Qu&yacute; kh&aacute;ch ăn s&aacute;ng, l&agrave;m thủ tục trả ph&ograve;ng. Sau đ&oacute;, xe đưa Qu&yacute; kh&aacute;ch ra s&acirc;n bay đ&aacute;p chuyến bay <strong>VN9417 (10:50-13:20) SEOUL &ndash; HANOI</strong>. Tới s&acirc;n bay Nội B&agrave;i, xe đ&oacute;n v&agrave; đưa kh&aacute;ch về trung t&acirc;m th&agrave;nh phố, chia tay kết th&uacute;c chương tr&igrave;nh.</p>\r\n<p>&nbsp;</p>\r\n<p><strong>Gi&aacute; trọn g&oacute;i d&agrave;nh cho 01 kh&aacute;ch:&nbsp;11.900.000 VND</strong></p>\r\n<p>&nbsp;(Gi&aacute; d&agrave;nh cho đo&agrave;n 15 kh&aacute;ch trở l&ecirc;n)</p>\r\n<p>(Chương tr&igrave;nh c&oacute; thể thay đổi tuy nhi&ecirc;n vẫn&nbsp; đảm bảo c&aacute;c điểm tham quan)</p>\r\n<p><strong>GI&Aacute; TOUR BAO GỒM:</strong></p>\r\n<ol>\r\n<li>V&eacute; m&aacute;y bay khứ hồi bay thẳng H&agrave; nội &ndash; Seoul &ndash; H&agrave; nội của h&atilde;ng h&agrave;ng kh&ocirc;ng Vietnam Airline + thuế v&agrave; phụ thu nhi&ecirc;n liệu c&aacute;c chặng bay v&agrave; lệ ph&iacute; s&acirc;n bay</li>\r\n<li>Xe &ocirc;t&ocirc; chất lượng cao phục vụ kh&aacute;ch theo suốt chương tr&igrave;nh</li>\r\n<li>01 Hướng dẫn vi&ecirc;n du lịch nhiệt t&igrave;nh, kinh nghiệm, th&ocirc;ng thạo tiếng Việt đi theo đo&agrave;n từ Việt Nam v&agrave; 01 hướng dẫn vi&ecirc;n nhiệt t&igrave;nh, kinh nghiệm, th&ocirc;ng thạo tiếng Việt &ndash; H&agrave;n tại H&agrave;n Quốc.</li>\r\n<li>V&eacute; tham quan thắng cảnh tại c&aacute;c điểm du lịch trong chương tr&igrave;nh.</li>\r\n<li>Nghỉ đ&ecirc;m tại kh&aacute;ch sạn 3* ở Seoul (02 người/ph&ograve;ng, đo&agrave;n lẻ nam hoặc nữ sẽ xếp 3 người/ ph&ograve;ng)</li>\r\n<li>C&aacute;c bữa ăn trọn g&oacute;i đ&atilde; ghi trong chương tr&igrave;nh</li>\r\n<li>Lệ ph&iacute; Visa nhập cảnh H&agrave;n Quốc + Ph&iacute; dịch thuật hồ sơ</li>\r\n<li>Bảo hiểm du lịch quốc tế.</li>\r\n<li>Qu&agrave; tặng: mũ, vỏ hộ chiếu</li>\r\n<li>Tặng ngay Voucher mua sắm tại H&agrave;n Quốc trị gi&aacute; đến 1.000.000đ</li>\r\n<li>Bảo hiểm Du lịch mức đền b&ugrave; cao nhất 210 triệu đồng.</li>\r\n</ol>\r\n<p><strong>GI&Aacute; TOUR KH&Ocirc;NG BAO GỒM:</strong></p>\r\n<ol>\r\n<li>Ph&iacute; l&agrave;m hộ chiếu</li>\r\n<li>Cước h&agrave;nh l&yacute; qu&aacute; tải, đồ uống, giặt l&agrave;, điện thoại</li>\r\n<li>Ngủ ph&ograve;ng đơn, chi ph&iacute; c&aacute; nh&acirc;n kh&aacute;c ngo&agrave;i chương tr&igrave;nh&hellip;..</li>\r\n<li>Tiền tip cho HDV v&agrave; l&aacute;i xe: 06 USD/kh&aacute;ch/ng&agrave;y (chi ph&iacute; bắt buộc)</li>\r\n<li>Visa t&aacute;i nhập Việt Nam.</li>\r\n<li>H&agrave;nh l&yacute; qu&aacute; cước qui định v&agrave; c&aacute;c chi ph&iacute; c&aacute; nh&acirc;n ph&aacute;t sinh ngo&agrave;i chương tr&igrave;nh.</li>\r\n</ol>\r\n<p><strong>LƯU &Yacute;:</strong></p>\r\n<ol>\r\n<li>Bất cứ một h&igrave;nh thức bỏ hoặc kh&ocirc;ng sử dụng dịch vụ g&igrave; tại nước ngo&agrave;i đều kh&ocirc;ng được ho&agrave;n lại tiền v&igrave; mọi dịch vụ đ&atilde; được thanh to&aacute;n trước. Theo chương tr&igrave;nh khuyến mại đ&atilde; k&yacute; với đối t&aacute;c H&agrave;n Quốc, qu&yacute; kh&aacute;ch sẽ đi theo tour suốt chương tr&igrave;nh. Qu&yacute; kh&aacute;ch n&agrave;o t&aacute;ch đo&agrave;n vui l&ograve;ng b&aacute;o trước v&agrave; trả th&ecirc;m 2.500.000 VNĐ/kh&aacute;ch/ lần.</li>\r\n<li>Lịch tr&igrave;nh của chương tr&igrave;nh c&oacute; thể thay đổi tuỳ theo thời tiết v&agrave; điều kiện giao th&ocirc;ng tại H&agrave;n Quốc</li>\r\n<li>Kinh ph&iacute; tr&ecirc;n &aacute;p dụng cho kh&aacute;ch h&agrave;ng mang hộ chiếu Việt nam (hộ chiếu c&ograve;n gi&aacute; trị từ 6 th&aacute;ng trở l&ecirc;n kể từ ng&agrave;y khởi h&agrave;nh). Kh&aacute;ch mang hộ chiếu nước ngo&agrave;i, vui l&ograve;ng kiểm tra lại.</li>\r\n<li>Chương tr&igrave;nh tr&ecirc;n c&oacute; thể thay đổi về thời gian v&agrave; lịch tr&igrave;nh, nhưng vẫn đảm bảo c&aacute;c điểm thăm quan như tr&ecirc;n.</li>\r\n<li>V&eacute; m&aacute;y bay theo lịch tr&igrave;nh cả đo&agrave;n, nếu c&oacute; sự thay đổi sau khi xuất v&eacute;, v&eacute; sẽ kh&ocirc;ng c&ograve;n gi&aacute; trị. Giờ giấc cuối c&ugrave;ng phụ thuộc v&agrave;o h&atilde;ng h&agrave;ng kh&ocirc;ng.</li>\r\n<li>C&aacute;c phần dịch vụ kh&ocirc;ng sử dụng đến m&agrave; kh&ocirc;ng b&aacute;o trước khi đăng k&yacute; sẽ kh&ocirc;ng được ho&agrave;n lại.</li>\r\n<li>Chương tr&igrave;nh tr&ecirc;n l&agrave; chương tr&igrave;nh du lịch thuần tu&yacute;, Qu&yacute; kh&aacute;ch c&oacute; nhu cầu kết hợp l&agrave;m việc, đề nghị th&ocirc;ng b&aacute;o r&otilde; khi l&agrave;m thủ tục đăng k&yacute;</li>\r\n<li>Trẻ em từ 2 đến dưới 11 tuổi: 80 % gi&aacute; tour (ngủ chung gường với cha mẹ).</li>\r\n<li>Trẻ em dưới 02 tuổi :&nbsp; 30 % gi&aacute; tour (ngủ chung giường với cha mẹ).</li>\r\n<li>Trẻ em từ 12 tuổi &nbsp;: Gi&aacute; tour thu như người lớn</li>\r\n<li>Tỷ gi&aacute; tiền thanh to&aacute;n c&oacute; thể thay đổi v&agrave;o thời điểm thanh to&aacute;n &aacute;p dụng tỉ gi&aacute; b&aacute;n ra của thị trường tự do.</li>\r\n<li>Tiền thuế c&oacute; thể thay đổi v&agrave;o thời điểm xuất v&eacute;.</li>\r\n<li>Trong trường hợp chỉ c&oacute; 01 kh&aacute;ch (người lớn) đi với 01 b&eacute; (dưới 12 tuổi), qu&yacute; kh&aacute;ch vui l&ograve;ng đ&oacute;ng tiền tour cho B&eacute; ngủ giường ri&ecirc;ng.</li>\r\n<li>Ch&uacute;ng t&ocirc;i kh&ocirc;ng nhận kh&aacute;ch nữ c&oacute; thai từ 5 th&aacute;ng trở l&ecirc;n tham gia c&aacute;c tour du lịch nước ngo&agrave;i.</li>\r\n<li>Qu&yacute; kh&aacute;ch từ 70 tuổi trở l&ecirc;n vui l&ograve;ng đ&oacute;ng th&ecirc;m ph&iacute; bảo hiểm cao cấp (ph&iacute; thay đổi t&ugrave;y theo tour)</li>\r\n<li>Qu&yacute; kh&aacute;ch từ 75 tuổi trở l&ecirc;n y&ecirc;u cầu phải c&oacute; giấy x&aacute;c nhận đầy đủ sức khỏe để đi du lịch nước ngo&agrave;i của B&aacute;c sĩ v&agrave; phải c&oacute; người th&acirc;n dưới 60 tuổi (đầy đủ sức khỏe) đi theo.</li>\r\n<li>Trong trường hợp bất khả kh&aacute;ng do thời tiết, thi&ecirc;n tai, đ&igrave;nh c&ocirc;ng, bạo động, ph&aacute; hoại, chiến tranh, dịch bệnh, chuyến bay bị tr&igrave; ho&atilde;n hay bị hủy do thời tiết hoặc do kỹ thuật&hellip;..dẫn đến tour kh&ocirc;ng thể thực hiện tiếp tục được, ch&uacute;ng t&ocirc;i sẽ ho&agrave;n trả lại tiền tour cho qu&yacute; kh&aacute;ch sau khi đ&atilde; trừ lại c&aacute;c chi ph&iacute; dịch vụ đ&atilde; thực hiện như ph&iacute; l&agrave;m visa,&hellip; v&agrave; kh&ocirc;ng chịu tr&aacute;ch nhiệm bồi thường th&ecirc;m bất kỳ chi ph&iacute; n&agrave;o kh&aacute;c.</li>\r\n</ol>\r\n<p>Thủ tục đăng k&yacute; (xin visa):</p>\r\n<ol>\r\n<li>Hộ chiếu c&ograve;n hạn sử dụng tr&ecirc;n 6 th&aacute;ng (hộ chiếu cũ k&egrave;m theo nếu c&oacute;) với 02 ảnh 3x4 chụp tr&ecirc;n nền ph&ocirc;ng trắng trong v&ograve;ng 6 th&aacute;ng gần đ&acirc;y (hộ chiếu cũ k&egrave;m theo nếu c&oacute;) + bản ph&ocirc; t&ocirc; CMND</li>\r\n<li>Bản c&ocirc;ng chứng phường sở tại Sổ hộ khẩu, giấy đăng k&yacute; kết h&ocirc;n, giấy khai sinh của con (nếu đi theo gia đ&igrave;nh)</li>\r\n<li>Với những kh&aacute;ch h&agrave;ng c&oacute; ng&agrave;y th&aacute;ng năm sinh từ năm 1940 l&ugrave;i về trước phải c&oacute; giấy kh&aacute;m sức khỏe k&egrave;m theo</li>\r\n<li>Với những kh&aacute;ch h&agrave;ng đ&atilde; từng đi c&aacute;c nước trong th&agrave;nh vi&ecirc;n OECD (Nhật, Ch&acirc;u &Acirc;u, &Uacute;c, Mỹ&hellip;) trong v&ograve;ng 3 năm trở lại đ&acirc;y sẽ được miễn chứng minh t&agrave;i ch&iacute;nh</li>\r\n</ol>\r\n<p>* Về chứng minh t&agrave;i ch&iacute;nh, Qu&yacute; kh&aacute;ch nộp những giấy tờ sau:</p>\r\n<ol start="5">\r\n<li>Photo Sổ tiết kiệm trị gi&aacute; tối thiểu 5000 USD/ người hoặc 100.000.000đ tiền Việt thời hạn gửi trước khi xin visa tối thiểu 03 th&aacute;ng (y&ecirc;u cầu bắt buộc)+ x&aacute;c nhận số dư sổ tiết kiệm bản gốc tại ng&acirc;n h&agrave;ng ở thời điểm gần nhất (c&oacute; gi&aacute; trị trong v&ograve;ng 1 tuần kể từ ng&agrave;y xin x&aacute;c nhận )</li>\r\n<li>Nếu sổ tiết kiệm chưa gửi đủ 3 th&aacute;ng (với điều kiện đ&atilde; gửi đủ 1 th&aacute;ng t&iacute;nh đến ng&agrave;y xin visa, kỳ hạn gửi tối thiểu 3 th&aacute;ng) k&egrave;m theo Bản c&ocirc;ng chứng phường sở tại Sổ đỏ nh&agrave; đất hoặc đăng k&yacute; &ocirc; t&ocirc; trong v&ograve;ng 5 năm trở lại đ&acirc;y</li>\r\n</ol>\r\n<p>* Về chứng minh c&ocirc;ng việc:</p>\r\n<ol start="7">\r\n<li>Đối với kh&aacute;ch h&agrave;ng đang đi l&agrave;m:</li>\r\n</ol>\r\n<p>o&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Bản photo của Hợp đồng lao động hoặc quyết định bổ nhiệm hoặc quyết định tăng lương.</p>\r\n<p>o&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; X&aacute;c nhận c&ocirc;ng việc tại thời điểm hiện tại</p>\r\n<p>o&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; X&aacute;c nhận mức lương hoặc bảng lương 3 th&aacute;ng gần nhất hoặc sao k&ecirc; t&agrave;i khoản ng&acirc;n h&agrave;ng 3 th&aacute;ng gần nhất (Nếu c&ocirc;ng ty trả lương bằng h&igrave;nh thức chuyển khoản)</p>\r\n<ol start="8">\r\n<li>Đối với kh&aacute;ch h&agrave;ng l&agrave; chủ doanh nghệp: Bản sao c&ocirc;ng chứng tại phường sở tại Giấy ph&eacute;p đăng k&yacute; kinh doanh</li>\r\n<li>Đối với kh&aacute;ch h&agrave;ng l&agrave; hưu tr&iacute;: Bản sao thẻ hưu tr&iacute;</li>\r\n<li>Đối với khach h&agrave;ng l&agrave; học sinh/ sinh vi&ecirc;n: Bản photo thẻ học sinh/ sinh vi&ecirc;n. Hoặc bản photo giấy khen học kỳ gần nhất hoặc bản gốc x&aacute;c nhận của trường đang theo học</li>\r\n</ol>', 'Hàn Quốc nổi tiếng với những danh lam thắng cảnh như: Nam Mi thơ mộng được biết đến qua bộ phim " Bản tình ca Mùa Đông", hay công viên Everland là công viên giải trí hiện đại và lớn nhất Hàn Quốc, nằm tọa lạc tại Yongin thuộc tỉnh Gyeonggi-do. Seoul là thành phố lớn nhất ở Hàn Quốc và được biết đến là thành phố không bao giờ ngủ ở châu Á. Bất cứ điều gì mà bạn đang tìm kiếm ở địa điểm du lịch này, từ cung điện truyền thống đến những khu mua sắm hiện đại, nghệ thuật và âm nhạc hay các tuyến đường văn hóa, Seoul luôn có nhiều lựa chọn cho bạn.', '<p>&nbsp;</p>\r\n<p><strong>&nbsp;</strong><strong>H&Agrave; NỘI &ndash; CỐ Đ&Ocirc; HOA LƯ &ndash; TAM CỐC &ndash; H&Agrave; NỘI (ăn trưa)</strong></p>\r\n<p><strong>07h30</strong>: Xe v&agrave; hướng dẫn vi&ecirc;n c&ocirc;ng ty du lịch Vietstreet đ&oacute;n qu&yacute; kh&aacute;ch tại điểm hẹn, khởi h&agrave;nh đi Ninh B&igrave;nh (100km c&aacute;ch thủ đ&ocirc; H&agrave; nội), ngắm cảnh v&ugrave;ng n&ocirc;ng th&ocirc;n Vi&ecirc;̣t nam. Qu&yacute; kh&aacute;ch thăm <strong>cố đ&ocirc; Hoa Lư</strong>, <strong>thăm đền vua Đinh, vua L&ecirc;</strong>, được nghe HDV giới thiều về c&aacute;c danh thắng, con người, mảnh đất nơi đ&acirc;y. Ăn trưa tại nh&agrave; h&agrave;ng.</p>\r\n<p><strong>13h00</strong>: Q&uacute;y kh&aacute;ch l&ecirc;n thuy&ecirc;̀n đi dọc theo su&ocirc;́i giữa c&aacute;nh đ&ocirc;̀ng l&uacute;a thăm quan <strong>đ&ocirc;̣ng Tam C&ocirc;́c</strong> (G&ocirc;̀m ba hang: <strong>Hang Cả, Hang Hai , Hang Ba</strong>).</p>\r\n<p><strong>15h30</strong>: Qu&yacute; kh&aacute;ch l&ecirc;n xe trở về H&agrave; nội tr&ecirc;n đường đo&agrave;n dừng mua đặc sản D&ecirc; N&uacute;i, Cơm Ch&aacute;y về l&agrave;m qu&agrave; cho người th&acirc;n.</p>\r\n<p>18h30: Về đến H&agrave; Nội, chia tay qu&yacute; kh&aacute;ch. Kết th&uacute;c chuyến du lịch, hẹn gặp qu&yacute; kh&aacute;ch trong chuyến đi tới.</p>\r\n<p><strong>&nbsp;</strong></p>\r\n<p><strong>BẢNG GI&Aacute; TOUR CHO 1 KH&Aacute;CH GH&Eacute;P ĐO&Agrave;N</strong>:<strong> 650.000</strong> <strong>VND</strong></p>\r\n<p><strong>&nbsp;</strong></p>\r\n<ul>\r\n<li><strong>GI&Aacute; TOUR BAO GỒM:</strong></li>\r\n</ul>\r\n<ul>\r\n<li>Xe du lịch sang trọng, l&aacute;i xe chuy&ecirc;n nghiệp, văn minh, lịch sự phục vụ theo h&agrave;nh tr&igrave;nh.</li>\r\n<li>01 bữa ch&iacute;nh</li>\r\n<li>Hướng dẫn vi&ecirc;n chuy&ecirc;n nghiệp phục vụ nhiệt t&igrave;nh chu đ&aacute;o suốt chuyến đi.</li>\r\n</ul>\r\n<ul>\r\n<li>V&eacute; thăm quan c&aacute;c điểm thăm quan theo h&agrave;nh tr&igrave;nh.</li>\r\n</ul>\r\n<ul>\r\n<li>Nước uống, khăn lạnh phục vụ tr&ecirc;n xe ti&ecirc;u chuẩn 02 chai nước suối/ng&agrave;y thăm quan.</li>\r\n</ul>\r\n<ul>\r\n<li><strong>GI&Aacute; TOUR CHƯA BAO GỒM:</strong></li>\r\n</ul>\r\n<ul>\r\n<li>Đồ uống: rượu, bia, nước ngọt v&agrave; c&aacute;c loại đồ uống c&aacute; nh&acirc;n kh&ocirc;ng đề cập.</li>\r\n<li>C&aacute;c chi ph&iacute; c&aacute; nh&acirc;n: mua sắm, điện thoại, thăm quan ngo&agrave;i h&agrave;nh tr&igrave;nh.</li>\r\n<li>Thuế gi&aacute; trị gia tăng VAT&nbsp;10%.</li>\r\n</ul>\r\n<ul>\r\n<li><strong>CH&Iacute;NH S&Aacute;CH GI&Aacute; TRẺ EM:</strong></li>\r\n</ul>\r\n<ul>\r\n<li>Trẻ em từ 10 tuổi trở l&ecirc;n mua 01 v&eacute;;</li>\r\n<li>Trẻ em từ 04 - 09 tuổi mua&nbsp;75% gi&aacute; v&eacute; người lớn.</li>\r\n<li>02 người lớn chỉ được k&egrave;m 01 trẻ em từ 03 tuổi trở xuống, nếu trẻ em đi k&egrave;m nhiều hơn th&igrave; từ em thứ 02 trở l&ecirc;n phải mua &frac12; v&eacute;.</li>\r\n</ul>\r\n<p><strong>&nbsp;</strong></p>', '<p>&nbsp;</p>\r\n<p><strong>&nbsp;</strong><strong>H&Agrave; NỘI &ndash; CỐ Đ&Ocirc; HOA LƯ &ndash; TAM CỐC &ndash; H&Agrave; NỘI (ăn trưa)</strong></p>\r\n<p><strong>07h30</strong>: Xe v&agrave; hướng dẫn vi&ecirc;n c&ocirc;ng ty du lịch Vietstreet đ&oacute;n qu&yacute; kh&aacute;ch tại điểm hẹn, khởi h&agrave;nh đi Ninh B&igrave;nh (100km c&aacute;ch thủ đ&ocirc; H&agrave; nội), ngắm cảnh v&ugrave;ng n&ocirc;ng th&ocirc;n Vi&ecirc;̣t nam. Qu&yacute; kh&aacute;ch thăm <strong>cố đ&ocirc; Hoa Lư</strong>, <strong>thăm đền vua Đinh, vua L&ecirc;</strong>, được nghe HDV giới thiều về c&aacute;c danh thắng, con người, mảnh đất nơi đ&acirc;y. Ăn trưa tại nh&agrave; h&agrave;ng.</p>\r\n<p><strong>13h00</strong>: Q&uacute;y kh&aacute;ch l&ecirc;n thuy&ecirc;̀n đi dọc theo su&ocirc;́i giữa c&aacute;nh đ&ocirc;̀ng l&uacute;a thăm quan <strong>đ&ocirc;̣ng Tam C&ocirc;́c</strong> (G&ocirc;̀m ba hang: <strong>Hang Cả, Hang Hai , Hang Ba</strong>).</p>\r\n<p><strong>15h30</strong>: Qu&yacute; kh&aacute;ch l&ecirc;n xe trở về H&agrave; nội tr&ecirc;n đường đo&agrave;n dừng mua đặc sản D&ecirc; N&uacute;i, Cơm Ch&aacute;y về l&agrave;m qu&agrave; cho người th&acirc;n.</p>\r\n<p>18h30: Về đến H&agrave; Nội, chia tay qu&yacute; kh&aacute;ch. Kết th&uacute;c chuyến du lịch, hẹn gặp qu&yacute; kh&aacute;ch trong chuyến đi tới.</p>\r\n<p><strong>&nbsp;</strong></p>\r\n<p><strong>BẢNG GI&Aacute; TOUR CHO 1 KH&Aacute;CH GH&Eacute;P ĐO&Agrave;N</strong>:<strong> 650.000</strong> <strong>VND</strong></p>\r\n<p><strong>&nbsp;</strong></p>\r\n<ul>\r\n<li><strong>GI&Aacute; TOUR BAO GỒM:</strong></li>\r\n</ul>\r\n<ul>\r\n<li>Xe du lịch sang trọng, l&aacute;i xe chuy&ecirc;n nghiệp, văn minh, lịch sự phục vụ theo h&agrave;nh tr&igrave;nh.</li>\r\n<li>01 bữa ch&iacute;nh</li>\r\n<li>Hướng dẫn vi&ecirc;n chuy&ecirc;n nghiệp phục vụ nhiệt t&igrave;nh chu đ&aacute;o suốt chuyến đi.</li>\r\n</ul>\r\n<ul>\r\n<li>V&eacute; thăm quan c&aacute;c điểm thăm quan theo h&agrave;nh tr&igrave;nh.</li>\r\n</ul>\r\n<ul>\r\n<li>Nước uống, khăn lạnh phục vụ tr&ecirc;n xe ti&ecirc;u chuẩn 02 chai nước suối/ng&agrave;y thăm quan.</li>\r\n</ul>\r\n<ul>\r\n<li><strong>GI&Aacute; TOUR CHƯA BAO GỒM:</strong></li>\r\n</ul>\r\n<ul>\r\n<li>Đồ uống: rượu, bia, nước ngọt v&agrave; c&aacute;c loại đồ uống c&aacute; nh&acirc;n kh&ocirc;ng đề cập.</li>\r\n<li>C&aacute;c chi ph&iacute; c&aacute; nh&acirc;n: mua sắm, điện thoại, thăm quan ngo&agrave;i h&agrave;nh tr&igrave;nh.</li>\r\n<li>Thuế gi&aacute; trị gia tăng VAT&nbsp;10%.</li>\r\n</ul>\r\n<ul>\r\n<li><strong>CH&Iacute;NH S&Aacute;CH GI&Aacute; TRẺ EM:</strong></li>\r\n</ul>\r\n<ul>\r\n<li>Trẻ em từ 10 tuổi trở l&ecirc;n mua 01 v&eacute;;</li>\r\n<li>Trẻ em từ 04 - 09 tuổi mua&nbsp;75% gi&aacute; v&eacute; người lớn.</li>\r\n<li>02 người lớn chỉ được k&egrave;m 01 trẻ em từ 03 tuổi trở xuống, nếu trẻ em đi k&egrave;m nhiều hơn th&igrave; từ em thứ 02 trở l&ecirc;n phải mua &frac12; v&eacute;.</li>\r\n</ul>\r\n<p><strong>&nbsp;</strong></p>', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Ba Bể - Bản Giốc - Ngườm Ngao - Pác Pó', 'ba be - ban gioc - nguom ngao - pac po', NULL),
(36, 2, '', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'BA BỂ - BẢN GIỐC -NGƯỜM NGAO - HANG PÁC BÓ', 'ba bể - bản giốc -ngườm ngao - hang pác bó', NULL),
(37, 1, '<p><strong>Ng&agrave;y 01&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; H&Agrave; NỘI &ndash;&nbsp; SEOUL&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(Ăn tối)</strong></p>\r\n<p><strong>11h40:</strong> Qu&yacute; kh&aacute;ch tập trung tại Nh&agrave; h&aacute;t lớn (Đ/c: Số 1 Tr&agrave;ng Tiền &ndash; H&agrave; Nội), xe v&agrave; HDV đ&oacute;n v&agrave; đưa đo&agrave;n ra <strong>s&acirc;n bay Nội B&agrave;i</strong> đ&aacute;p chuyến bay HANOI &ndash; SEOUL <strong>VN 9416</strong> <strong>(15:15 &ndash; 21 :20).</strong></p>\r\n<p><strong>21:20:&nbsp; </strong>Đến <strong>s&acirc;n bay Quốc tế Incheon</strong>, Xe v&agrave; HDV đ&oacute;n Qu&yacute; kh&aacute;ch về kh&aacute;ch sạn tại Seoul nghỉ ngơi.&nbsp; Qu&yacute; kh&aacute;ch nghỉ đ&ecirc;m tại kh&aacute;ch sạn Benhur&nbsp; 3* hoặc tương đương</p>\r\n<p><strong>Ng&agrave;y 02&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; SEOUL - EVERLAND&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(Ăn S&aacute;ng, Trưa, Tối)</strong></p>\r\n<p><strong>S&aacute;ng</strong>&nbsp;&nbsp;&nbsp; Sau khi ăn s&aacute;ng, xe v&agrave; HDV đi tham quan:</p>\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>Nh&agrave; Xanh &ndash;</strong> <em>Phủ Tổng Thống</em></p>\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>Cung đi</strong><strong>ện ho&agrave;ng gia Kyong bok</strong> - <em>nơi m&agrave; c&aacute;c vua ch&uacute;a <strong>triều đại Jocheon</strong> từng ngự trị.</em></p>\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>B</strong><strong>ảo t&agrave;ng d&acirc;n gian quốc gia</strong> - <em>l&agrave; bảo t&agrave;ng quốc gia duy nhất về văn h&oacute;a d&acirc;n gian, trưng b&agrave;y khoảng 4.000 hiện vật về đời sống văn h&oacute;a</em></p>\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>Qu</strong><strong>ảng trường Gwanghawamun</strong> v&agrave; d&ograve;ng suối nh&acirc;n tạo Chonggye</p>\r\n<p><strong>Trưa</strong>&nbsp;&nbsp; Kết th&uacute;c chương tr&igrave;nh tham quan buổi s&aacute;ng Qu&yacute; kh&aacute;ch d&ugrave;ng bữa trưa tại nh&agrave; h&agrave;ng.</p>\r\n<p><strong>Chiều</strong>&nbsp; Sau khi ăn trưa v&agrave; nghỉ ngơi Qu&yacute; kh&aacute;ch tiếp tục đi thăm quan <strong>c&ocirc;ng vi&ecirc;n Everland</strong> &ndash; <em>c&ocirc;ng vi&ecirc;n lớn nhất ở H&agrave;n Quốc</em>, được xếp vị tr&iacute; thứ 8 trong danh s&aacute;ch 10 c&ocirc;ng vi&ecirc;n giải tr&iacute; thu h&uacute;t đ&ocirc;ng kh&aacute;ch nhất thế giới tại đ&acirc;y Qu&yacute; kh&aacute;ch sẽ tham gia c&aacute;c tr&ograve; chơi hấp dẫn c&oacute; bao gồm trong v&eacute; v&agrave;o cửa.</p>\r\n<p><strong>Tối</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Qu&yacute; kh&aacute;ch nghỉ đ&ecirc;m tại kh&aacute;ch sạn Benhur&nbsp; 3* hoặc tương đương v&agrave; tự do t&igrave;m hiểu SEOUL về đ&ecirc;m.</p>\r\n<p><strong>Ng&agrave;y 03&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; SEOUL &ndash; NAMI &ndash; C&Ocirc;NG VI&Ecirc;N NƯỚC&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(Ăn S&aacute;ng, Trưa, Tối)</strong></p>\r\n<p><strong>S&aacute;ng</strong>&nbsp;&nbsp;&nbsp; Sau &nbsp;ăn s&aacute;ng Qu&yacute; kh&aacute;ch tham quan <strong>Đảo Nami</strong>: <em>h&ograve;n đảo l&atilde;ng mạn &ndash; nơi đ&atilde; từng quay bộ phim nổi tiếng &ldquo; Bản t&igrave;nh ca M&ugrave;a Đ&ocirc;ng&rdquo; với những h&agrave;ng c&acirc;y cao v&uacute;t v&agrave; bức tượng t&igrave;nh y&ecirc;u vĩnh cửu.</em>Qu&yacute; kh&aacute;ch nghỉ ngơi v&agrave; d&ugrave;ng bữa trưa tại nh&agrave; h&agrave;ng.</p>\r\n<p><strong>Chiều</strong> Qu&yacute; kh&aacute;ch trải nhiệm <strong>tắm Sauna kiểu H&agrave;n Quốc</strong> v&agrave; vui chơi tại <strong>Trung T&acirc;m Sealala v&agrave; C&ocirc;ng vi&ecirc;n nước</strong>. Kết th&uacute;c một ng&agrave;y vui vẻ Qu&yacute; kh&aacute;ch nghỉ đ&ecirc;m tại kh&aacute;ch sạn Benhur&nbsp; 3* (hoặc tương đương) v&agrave; tự do tham quan.</p>\r\n<p><strong>Ng&agrave;y 04&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; SEOUL&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(Ăn S&aacute;ng, Trưa, Tối)</strong></p>\r\n<p><strong>S&aacute;ng</strong>&nbsp;&nbsp;&nbsp; Sau khi ăn s&aacute;ng, xe v&agrave; HDV đưa Qu&yacute; kh&aacute;ch tham quan v&agrave; mua sắm tại tinh dầu th&ocirc;ng đỏ, Goryo Garden, cửa h&agrave;ng s&acirc;m tươi v&agrave; Nấm Linh Chi v&agrave; ăn trưa tại nh&agrave; h&agrave;ng.</p>\r\n<p><strong>Chiều</strong>&nbsp; Qu&yacute; kh&aacute;ch tham quan <strong>Ch&ugrave;a Joggyesa</strong> &ndash; <em>ng&ocirc;i ch&ugrave;a lớn nhất thủ đ&ocirc; Seoul.</em> Đo&agrave;n tham mua sắm tại cửa h&agrave;ng miễn thuế, khu phố thời trang MyeongDong. Qu&yacute; kh&aacute;ch nghỉ đ&ecirc;m tại kh&aacute;ch sạn Benhur&nbsp; 3* hoặc tương đương</p>\r\n<p><strong>Ng&agrave;y 5 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; SEOUL &ndash; HANOI&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Ăn s&aacute;ng</strong></p>\r\n<p>Qu&yacute; kh&aacute;ch ăn s&aacute;ng, l&agrave;m thủ tục trả ph&ograve;ng. Sau đ&oacute;, xe đưa Qu&yacute; kh&aacute;ch ra s&acirc;n bay đ&aacute;p chuyến bay <strong>VN9417 (10:50-13:20) SEOUL &ndash; HANOI</strong>. Tới s&acirc;n bay Nội B&agrave;i, xe đ&oacute;n v&agrave; đưa kh&aacute;ch về trung t&acirc;m th&agrave;nh phố, chia tay kết th&uacute;c chương tr&igrave;nh.</p>\r\n<p>&nbsp;</p>\r\n<p><strong>Gi&aacute; trọn g&oacute;i d&agrave;nh cho 01 kh&aacute;ch:&nbsp;11.900.000 VND</strong></p>\r\n<p>&nbsp;(Gi&aacute; d&agrave;nh cho đo&agrave;n 15 kh&aacute;ch trở l&ecirc;n)</p>\r\n<p>(Chương tr&igrave;nh c&oacute; thể thay đổi tuy nhi&ecirc;n vẫn&nbsp; đảm bảo c&aacute;c điểm tham quan)</p>\r\n<p><strong>GI&Aacute; TOUR BAO GỒM:</strong></p>\r\n<ol>\r\n<li>V&eacute; m&aacute;y bay khứ hồi bay thẳng H&agrave; nội &ndash; Seoul &ndash; H&agrave; nội của h&atilde;ng h&agrave;ng kh&ocirc;ng Vietnam Airline + thuế v&agrave; phụ thu nhi&ecirc;n liệu c&aacute;c chặng bay v&agrave; lệ ph&iacute; s&acirc;n bay</li>\r\n<li>Xe &ocirc;t&ocirc; chất lượng cao phục vụ kh&aacute;ch theo suốt chương tr&igrave;nh</li>\r\n<li>01 Hướng dẫn vi&ecirc;n du lịch nhiệt t&igrave;nh, kinh nghiệm, th&ocirc;ng thạo tiếng Việt đi theo đo&agrave;n từ Việt Nam v&agrave; 01 hướng dẫn vi&ecirc;n nhiệt t&igrave;nh, kinh nghiệm, th&ocirc;ng thạo tiếng Việt &ndash; H&agrave;n tại H&agrave;n Quốc.</li>\r\n<li>V&eacute; tham quan thắng cảnh tại c&aacute;c điểm du lịch trong chương tr&igrave;nh.</li>\r\n<li>Nghỉ đ&ecirc;m tại kh&aacute;ch sạn 3* ở Seoul (02 người/ph&ograve;ng, đo&agrave;n lẻ nam hoặc nữ sẽ xếp 3 người/ ph&ograve;ng)</li>\r\n<li>C&aacute;c bữa ăn trọn g&oacute;i đ&atilde; ghi trong chương tr&igrave;nh</li>\r\n<li>Lệ ph&iacute; Visa nhập cảnh H&agrave;n Quốc + Ph&iacute; dịch thuật hồ sơ</li>\r\n<li>Bảo hiểm du lịch quốc tế.</li>\r\n<li>Qu&agrave; tặng: mũ, vỏ hộ chiếu</li>\r\n<li>Tặng ngay Voucher mua sắm tại H&agrave;n Quốc trị gi&aacute; đến 1.000.000đ</li>\r\n<li>Bảo hiểm Du lịch mức đền b&ugrave; cao nhất 210 triệu đồng.</li>\r\n</ol>\r\n<p><strong>GI&Aacute; TOUR KH&Ocirc;NG BAO GỒM:</strong></p>\r\n<ol>\r\n<li>Ph&iacute; l&agrave;m hộ chiếu</li>\r\n<li>Cước h&agrave;nh l&yacute; qu&aacute; tải, đồ uống, giặt l&agrave;, điện thoại</li>\r\n<li>Ngủ ph&ograve;ng đơn, chi ph&iacute; c&aacute; nh&acirc;n kh&aacute;c ngo&agrave;i chương tr&igrave;nh&hellip;..</li>\r\n<li>Tiền tip cho HDV v&agrave; l&aacute;i xe: 06 USD/kh&aacute;ch/ng&agrave;y (chi ph&iacute; bắt buộc)</li>\r\n<li>Visa t&aacute;i nhập Việt Nam.</li>\r\n<li>H&agrave;nh l&yacute; qu&aacute; cước qui định v&agrave; c&aacute;c chi ph&iacute; c&aacute; nh&acirc;n ph&aacute;t sinh ngo&agrave;i chương tr&igrave;nh.</li>\r\n</ol>\r\n<p><strong>LƯU &Yacute;:</strong></p>\r\n<ol>\r\n<li>Bất cứ một h&igrave;nh thức bỏ hoặc kh&ocirc;ng sử dụng dịch vụ g&igrave; tại nước ngo&agrave;i đều kh&ocirc;ng được ho&agrave;n lại tiền v&igrave; mọi dịch vụ đ&atilde; được thanh to&aacute;n trước. Theo chương tr&igrave;nh khuyến mại đ&atilde; k&yacute; với đối t&aacute;c H&agrave;n Quốc, qu&yacute; kh&aacute;ch sẽ đi theo tour suốt chương tr&igrave;nh. Qu&yacute; kh&aacute;ch n&agrave;o t&aacute;ch đo&agrave;n vui l&ograve;ng b&aacute;o trước v&agrave; trả th&ecirc;m 2.500.000 VNĐ/kh&aacute;ch/ lần.</li>\r\n<li>Lịch tr&igrave;nh của chương tr&igrave;nh c&oacute; thể thay đổi tuỳ theo thời tiết v&agrave; điều kiện giao th&ocirc;ng tại H&agrave;n Quốc</li>\r\n<li>Kinh ph&iacute; tr&ecirc;n &aacute;p dụng cho kh&aacute;ch h&agrave;ng mang hộ chiếu Việt nam (hộ chiếu c&ograve;n gi&aacute; trị từ 6 th&aacute;ng trở l&ecirc;n kể từ ng&agrave;y khởi h&agrave;nh). Kh&aacute;ch mang hộ chiếu nước ngo&agrave;i, vui l&ograve;ng kiểm tra lại.</li>\r\n<li>Chương tr&igrave;nh tr&ecirc;n c&oacute; thể thay đổi về thời gian v&agrave; lịch tr&igrave;nh, nhưng vẫn đảm bảo c&aacute;c điểm thăm quan như tr&ecirc;n.</li>\r\n<li>V&eacute; m&aacute;y bay theo lịch tr&igrave;nh cả đo&agrave;n, nếu c&oacute; sự thay đổi sau khi xuất v&eacute;, v&eacute; sẽ kh&ocirc;ng c&ograve;n gi&aacute; trị. Giờ giấc cuối c&ugrave;ng phụ thuộc v&agrave;o h&atilde;ng h&agrave;ng kh&ocirc;ng.</li>\r\n<li>C&aacute;c phần dịch vụ kh&ocirc;ng sử dụng đến m&agrave; kh&ocirc;ng b&aacute;o trước khi đăng k&yacute; sẽ kh&ocirc;ng được ho&agrave;n lại.</li>\r\n<li>Chương tr&igrave;nh tr&ecirc;n l&agrave; chương tr&igrave;nh du lịch thuần tu&yacute;, Qu&yacute; kh&aacute;ch c&oacute; nhu cầu kết hợp l&agrave;m việc, đề nghị th&ocirc;ng b&aacute;o r&otilde; khi l&agrave;m thủ tục đăng k&yacute;</li>\r\n<li>Trẻ em từ 2 đến dưới 11 tuổi: 80 % gi&aacute; tour (ngủ chung gường với cha mẹ).</li>\r\n<li>Trẻ em dưới 02 tuổi :&nbsp; 30 % gi&aacute; tour (ngủ chung giường với cha mẹ).</li>\r\n<li>Trẻ em từ 12 tuổi &nbsp;: Gi&aacute; tour thu như người lớn</li>\r\n<li>Tỷ gi&aacute; tiền thanh to&aacute;n c&oacute; thể thay đổi v&agrave;o thời điểm thanh to&aacute;n &aacute;p dụng tỉ gi&aacute; b&aacute;n ra của thị trường tự do.</li>\r\n<li>Tiền thuế c&oacute; thể thay đổi v&agrave;o thời điểm xuất v&eacute;.</li>\r\n<li>Trong trường hợp chỉ c&oacute; 01 kh&aacute;ch (người lớn) đi với 01 b&eacute; (dưới 12 tuổi), qu&yacute; kh&aacute;ch vui l&ograve;ng đ&oacute;ng tiền tour cho B&eacute; ngủ giường ri&ecirc;ng.</li>\r\n<li>Ch&uacute;ng t&ocirc;i kh&ocirc;ng nhận kh&aacute;ch nữ c&oacute; thai từ 5 th&aacute;ng trở l&ecirc;n tham gia c&aacute;c tour du lịch nước ngo&agrave;i.</li>\r\n<li>Qu&yacute; kh&aacute;ch từ 70 tuổi trở l&ecirc;n vui l&ograve;ng đ&oacute;ng th&ecirc;m ph&iacute; bảo hiểm cao cấp (ph&iacute; thay đổi t&ugrave;y theo tour)</li>\r\n<li>Qu&yacute; kh&aacute;ch từ 75 tuổi trở l&ecirc;n y&ecirc;u cầu phải c&oacute; giấy x&aacute;c nhận đầy đủ sức khỏe để đi du lịch nước ngo&agrave;i của B&aacute;c sĩ v&agrave; phải c&oacute; người th&acirc;n dưới 60 tuổi (đầy đủ sức khỏe) đi theo.</li>\r\n<li>Trong trường hợp bất khả kh&aacute;ng do thời tiết, thi&ecirc;n tai, đ&igrave;nh c&ocirc;ng, bạo động, ph&aacute; hoại, chiến tranh, dịch bệnh, chuyến bay bị tr&igrave; ho&atilde;n hay bị hủy do thời tiết hoặc do kỹ thuật&hellip;..dẫn đến tour kh&ocirc;ng thể thực hiện tiếp tục được, ch&uacute;ng t&ocirc;i sẽ ho&agrave;n trả lại tiền tour cho qu&yacute; kh&aacute;ch sau khi đ&atilde; trừ lại c&aacute;c chi ph&iacute; dịch vụ đ&atilde; thực hiện như ph&iacute; l&agrave;m visa,&hellip; v&agrave; kh&ocirc;ng chịu tr&aacute;ch nhiệm bồi thường th&ecirc;m bất kỳ chi ph&iacute; n&agrave;o kh&aacute;c.</li>\r\n</ol>\r\n<p>Thủ tục đăng k&yacute; (xin visa):</p>\r\n<ol>\r\n<li>Hộ chiếu c&ograve;n hạn sử dụng tr&ecirc;n 6 th&aacute;ng (hộ chiếu cũ k&egrave;m theo nếu c&oacute;) với 02 ảnh 3x4 chụp tr&ecirc;n nền ph&ocirc;ng trắng trong v&ograve;ng 6 th&aacute;ng gần đ&acirc;y (hộ chiếu cũ k&egrave;m theo nếu c&oacute;) + bản ph&ocirc; t&ocirc; CMND</li>\r\n<li>Bản c&ocirc;ng chứng phường sở tại Sổ hộ khẩu, giấy đăng k&yacute; kết h&ocirc;n, giấy khai sinh của con (nếu đi theo gia đ&igrave;nh)</li>\r\n<li>Với những kh&aacute;ch h&agrave;ng c&oacute; ng&agrave;y th&aacute;ng năm sinh từ năm 1940 l&ugrave;i về trước phải c&oacute; giấy kh&aacute;m sức khỏe k&egrave;m theo</li>\r\n<li>Với những kh&aacute;ch h&agrave;ng đ&atilde; từng đi c&aacute;c nước trong th&agrave;nh vi&ecirc;n OECD (Nhật, Ch&acirc;u &Acirc;u, &Uacute;c, Mỹ&hellip;) trong v&ograve;ng 3 năm trở lại đ&acirc;y sẽ được miễn chứng minh t&agrave;i ch&iacute;nh</li>\r\n</ol>\r\n<p>* Về chứng minh t&agrave;i ch&iacute;nh, Qu&yacute; kh&aacute;ch nộp những giấy tờ sau:</p>\r\n<ol start="5">\r\n<li>Photo Sổ tiết kiệm trị gi&aacute; tối thiểu 5000 USD/ người hoặc 100.000.000đ tiền Việt thời hạn gửi trước khi xin visa tối thiểu 03 th&aacute;ng (y&ecirc;u cầu bắt buộc)+ x&aacute;c nhận số dư sổ tiết kiệm bản gốc tại ng&acirc;n h&agrave;ng ở thời điểm gần nhất (c&oacute; gi&aacute; trị trong v&ograve;ng 1 tuần kể từ ng&agrave;y xin x&aacute;c nhận )</li>\r\n<li>Nếu sổ tiết kiệm chưa gửi đủ 3 th&aacute;ng (với điều kiện đ&atilde; gửi đủ 1 th&aacute;ng t&iacute;nh đến ng&agrave;y xin visa, kỳ hạn gửi tối thiểu 3 th&aacute;ng) k&egrave;m theo Bản c&ocirc;ng chứng phường sở tại Sổ đỏ nh&agrave; đất hoặc đăng k&yacute; &ocirc; t&ocirc; trong v&ograve;ng 5 năm trở lại đ&acirc;y</li>\r\n</ol>\r\n<p>* Về chứng minh c&ocirc;ng việc:</p>\r\n<ol start="7">\r\n<li>Đối với kh&aacute;ch h&agrave;ng đang đi l&agrave;m:</li>\r\n</ol>\r\n<p>o&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Bản photo của Hợp đồng lao động hoặc quyết định bổ nhiệm hoặc quyết định tăng lương.</p>\r\n<p>o&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; X&aacute;c nhận c&ocirc;ng việc tại thời điểm hiện tại</p>\r\n<p>o&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; X&aacute;c nhận mức lương hoặc bảng lương 3 th&aacute;ng gần nhất hoặc sao k&ecirc; t&agrave;i khoản ng&acirc;n h&agrave;ng 3 th&aacute;ng gần nhất (Nếu c&ocirc;ng ty trả lương bằng h&igrave;nh thức chuyển khoản)</p>\r\n<ol start="8">\r\n<li>Đối với kh&aacute;ch h&agrave;ng l&agrave; chủ doanh nghệp: Bản sao c&ocirc;ng chứng tại phường sở tại Giấy ph&eacute;p đăng k&yacute; kinh doanh</li>\r\n<li>Đối với kh&aacute;ch h&agrave;ng l&agrave; hưu tr&iacute;: Bản sao thẻ hưu tr&iacute;</li>\r\n<li>Đối với khach h&agrave;ng l&agrave; học sinh/ sinh vi&ecirc;n: Bản photo thẻ học sinh/ sinh vi&ecirc;n. Hoặc bản photo giấy khen học kỳ gần nhất hoặc bản gốc x&aacute;c nhận của trường đang theo học</li>\r\n</ol>', 'Hàn Quốc nổi tiếng với những danh lam thắng cảnh như: Nam Mi thơ mộng được biết đến qua bộ phim " Bản tình ca Mùa Đông", hay công viên Everland là công viên giải trí hiện đại và lớn nhất Hàn Quốc, nằm tọa lạc tại Yongin thuộc tỉnh Gyeonggi-do. Seoul là thành phố lớn nhất ở Hàn Quốc và được biết đến là thành phố không bao giờ ngủ ở châu Á. Bất cứ điều gì mà bạn đang tìm kiếm ở địa điểm du lịch này, từ cung điện truyền thống đến những khu mua sắm hiện đại, nghệ thuật và âm nhạc hay các tuyến đường văn hóa, Seoul luôn có nhiều lựa chọn cho bạn.', '<p>&nbsp;</p>\r\n<p><strong>&nbsp;</strong><strong>H&Agrave; NỘI &ndash; CỐ Đ&Ocirc; HOA LƯ &ndash; TAM CỐC &ndash; H&Agrave; NỘI (ăn trưa)</strong></p>\r\n<p><strong>07h30</strong>: Xe v&agrave; hướng dẫn vi&ecirc;n c&ocirc;ng ty du lịch Vietstreet đ&oacute;n qu&yacute; kh&aacute;ch tại điểm hẹn, khởi h&agrave;nh đi Ninh B&igrave;nh (100km c&aacute;ch thủ đ&ocirc; H&agrave; nội), ngắm cảnh v&ugrave;ng n&ocirc;ng th&ocirc;n Vi&ecirc;̣t nam. Qu&yacute; kh&aacute;ch thăm <strong>cố đ&ocirc; Hoa Lư</strong>, <strong>thăm đền vua Đinh, vua L&ecirc;</strong>, được nghe HDV giới thiều về c&aacute;c danh thắng, con người, mảnh đất nơi đ&acirc;y. Ăn trưa tại nh&agrave; h&agrave;ng.</p>\r\n<p><strong>13h00</strong>: Q&uacute;y kh&aacute;ch l&ecirc;n thuy&ecirc;̀n đi dọc theo su&ocirc;́i giữa c&aacute;nh đ&ocirc;̀ng l&uacute;a thăm quan <strong>đ&ocirc;̣ng Tam C&ocirc;́c</strong> (G&ocirc;̀m ba hang: <strong>Hang Cả, Hang Hai , Hang Ba</strong>).</p>\r\n<p><strong>15h30</strong>: Qu&yacute; kh&aacute;ch l&ecirc;n xe trở về H&agrave; nội tr&ecirc;n đường đo&agrave;n dừng mua đặc sản D&ecirc; N&uacute;i, Cơm Ch&aacute;y về l&agrave;m qu&agrave; cho người th&acirc;n.</p>\r\n<p>18h30: Về đến H&agrave; Nội, chia tay qu&yacute; kh&aacute;ch. Kết th&uacute;c chuyến du lịch, hẹn gặp qu&yacute; kh&aacute;ch trong chuyến đi tới.</p>\r\n<p><strong>&nbsp;</strong></p>\r\n<p><strong>BẢNG GI&Aacute; TOUR CHO 1 KH&Aacute;CH GH&Eacute;P ĐO&Agrave;N</strong>:<strong> 650.000</strong> <strong>VND</strong></p>\r\n<p><strong>&nbsp;</strong></p>\r\n<ul>\r\n<li><strong>GI&Aacute; TOUR BAO GỒM:</strong></li>\r\n</ul>\r\n<ul>\r\n<li>Xe du lịch sang trọng, l&aacute;i xe chuy&ecirc;n nghiệp, văn minh, lịch sự phục vụ theo h&agrave;nh tr&igrave;nh.</li>\r\n<li>01 bữa ch&iacute;nh</li>\r\n<li>Hướng dẫn vi&ecirc;n chuy&ecirc;n nghiệp phục vụ nhiệt t&igrave;nh chu đ&aacute;o suốt chuyến đi.</li>\r\n</ul>\r\n<ul>\r\n<li>V&eacute; thăm quan c&aacute;c điểm thăm quan theo h&agrave;nh tr&igrave;nh.</li>\r\n</ul>\r\n<ul>\r\n<li>Nước uống, khăn lạnh phục vụ tr&ecirc;n xe ti&ecirc;u chuẩn 02 chai nước suối/ng&agrave;y thăm quan.</li>\r\n</ul>\r\n<ul>\r\n<li><strong>GI&Aacute; TOUR CHƯA BAO GỒM:</strong></li>\r\n</ul>\r\n<ul>\r\n<li>Đồ uống: rượu, bia, nước ngọt v&agrave; c&aacute;c loại đồ uống c&aacute; nh&acirc;n kh&ocirc;ng đề cập.</li>\r\n<li>C&aacute;c chi ph&iacute; c&aacute; nh&acirc;n: mua sắm, điện thoại, thăm quan ngo&agrave;i h&agrave;nh tr&igrave;nh.</li>\r\n<li>Thuế gi&aacute; trị gia tăng VAT&nbsp;10%.</li>\r\n</ul>\r\n<ul>\r\n<li><strong>CH&Iacute;NH S&Aacute;CH GI&Aacute; TRẺ EM:</strong></li>\r\n</ul>\r\n<ul>\r\n<li>Trẻ em từ 10 tuổi trở l&ecirc;n mua 01 v&eacute;;</li>\r\n<li>Trẻ em từ 04 - 09 tuổi mua&nbsp;75% gi&aacute; v&eacute; người lớn.</li>\r\n<li>02 người lớn chỉ được k&egrave;m 01 trẻ em từ 03 tuổi trở xuống, nếu trẻ em đi k&egrave;m nhiều hơn th&igrave; từ em thứ 02 trở l&ecirc;n phải mua &frac12; v&eacute;.</li>\r\n</ul>\r\n<p><strong>&nbsp;</strong></p>', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Tour Sài Gòn - Cần Thơ - An Giang', 'tour sai gon - can tho - an giang', NULL),
(37, 2, '', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'TOUR HÀ NỘI – SEOUL – NAMI - EVERLAND', 'tour hà nội – seoul – nami - everland', NULL);
INSERT INTO `tours_lang` (`tour_id`, `lang_id`, `schedule`, `desc`, `detail`, `notice`, `created_at`, `updated_at`, `name`, `keyword`, `intro`) VALUES
(38, 1, '<p><strong>Ng&agrave;y 01&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; H&Agrave; NỘI &ndash;&nbsp; SEOUL&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(Ăn tối)</strong></p>\r\n<p><strong>11h40:</strong> Qu&yacute; kh&aacute;ch tập trung tại Nh&agrave; h&aacute;t lớn (Đ/c: Số 1 Tr&agrave;ng Tiền &ndash; H&agrave; Nội), xe v&agrave; HDV đ&oacute;n v&agrave; đưa đo&agrave;n ra <strong>s&acirc;n bay Nội B&agrave;i</strong> đ&aacute;p chuyến bay HANOI &ndash; SEOUL <strong>VN 9416</strong> <strong>(15:15 &ndash; 21 :20).</strong></p>\r\n<p><strong>21:20:&nbsp; </strong>Đến <strong>s&acirc;n bay Quốc tế Incheon</strong>, Xe v&agrave; HDV đ&oacute;n Qu&yacute; kh&aacute;ch về kh&aacute;ch sạn tại Seoul nghỉ ngơi.&nbsp; Qu&yacute; kh&aacute;ch nghỉ đ&ecirc;m tại kh&aacute;ch sạn Benhur&nbsp; 3* hoặc tương đương</p>\r\n<p><strong>Ng&agrave;y 02&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; SEOUL - EVERLAND&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(Ăn S&aacute;ng, Trưa, Tối)</strong></p>\r\n<p><strong>S&aacute;ng</strong>&nbsp;&nbsp;&nbsp; Sau khi ăn s&aacute;ng, xe v&agrave; HDV đi tham quan:</p>\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>Nh&agrave; Xanh &ndash;</strong> <em>Phủ Tổng Thống</em></p>\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>Cung đi</strong><strong>ện ho&agrave;ng gia Kyong bok</strong> - <em>nơi m&agrave; c&aacute;c vua ch&uacute;a <strong>triều đại Jocheon</strong> từng ngự trị.</em></p>\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>B</strong><strong>ảo t&agrave;ng d&acirc;n gian quốc gia</strong> - <em>l&agrave; bảo t&agrave;ng quốc gia duy nhất về văn h&oacute;a d&acirc;n gian, trưng b&agrave;y khoảng 4.000 hiện vật về đời sống văn h&oacute;a</em></p>\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>Qu</strong><strong>ảng trường Gwanghawamun</strong> v&agrave; d&ograve;ng suối nh&acirc;n tạo Chonggye</p>\r\n<p><strong>Trưa</strong>&nbsp;&nbsp; Kết th&uacute;c chương tr&igrave;nh tham quan buổi s&aacute;ng Qu&yacute; kh&aacute;ch d&ugrave;ng bữa trưa tại nh&agrave; h&agrave;ng.</p>\r\n<p><strong>Chiều</strong>&nbsp; Sau khi ăn trưa v&agrave; nghỉ ngơi Qu&yacute; kh&aacute;ch tiếp tục đi thăm quan <strong>c&ocirc;ng vi&ecirc;n Everland</strong> &ndash; <em>c&ocirc;ng vi&ecirc;n lớn nhất ở H&agrave;n Quốc</em>, được xếp vị tr&iacute; thứ 8 trong danh s&aacute;ch 10 c&ocirc;ng vi&ecirc;n giải tr&iacute; thu h&uacute;t đ&ocirc;ng kh&aacute;ch nhất thế giới tại đ&acirc;y Qu&yacute; kh&aacute;ch sẽ tham gia c&aacute;c tr&ograve; chơi hấp dẫn c&oacute; bao gồm trong v&eacute; v&agrave;o cửa.</p>\r\n<p><strong>Tối</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Qu&yacute; kh&aacute;ch nghỉ đ&ecirc;m tại kh&aacute;ch sạn Benhur&nbsp; 3* hoặc tương đương v&agrave; tự do t&igrave;m hiểu SEOUL về đ&ecirc;m.</p>\r\n<p><strong>Ng&agrave;y 03&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; SEOUL &ndash; NAMI &ndash; C&Ocirc;NG VI&Ecirc;N NƯỚC&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(Ăn S&aacute;ng, Trưa, Tối)</strong></p>\r\n<p><strong>S&aacute;ng</strong>&nbsp;&nbsp;&nbsp; Sau &nbsp;ăn s&aacute;ng Qu&yacute; kh&aacute;ch tham quan <strong>Đảo Nami</strong>: <em>h&ograve;n đảo l&atilde;ng mạn &ndash; nơi đ&atilde; từng quay bộ phim nổi tiếng &ldquo; Bản t&igrave;nh ca M&ugrave;a Đ&ocirc;ng&rdquo; với những h&agrave;ng c&acirc;y cao v&uacute;t v&agrave; bức tượng t&igrave;nh y&ecirc;u vĩnh cửu.</em>Qu&yacute; kh&aacute;ch nghỉ ngơi v&agrave; d&ugrave;ng bữa trưa tại nh&agrave; h&agrave;ng.</p>\r\n<p><strong>Chiều</strong> Qu&yacute; kh&aacute;ch trải nhiệm <strong>tắm Sauna kiểu H&agrave;n Quốc</strong> v&agrave; vui chơi tại <strong>Trung T&acirc;m Sealala v&agrave; C&ocirc;ng vi&ecirc;n nước</strong>. Kết th&uacute;c một ng&agrave;y vui vẻ Qu&yacute; kh&aacute;ch nghỉ đ&ecirc;m tại kh&aacute;ch sạn Benhur&nbsp; 3* (hoặc tương đương) v&agrave; tự do tham quan.</p>\r\n<p><strong>Ng&agrave;y 04&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; SEOUL&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(Ăn S&aacute;ng, Trưa, Tối)</strong></p>\r\n<p><strong>S&aacute;ng</strong>&nbsp;&nbsp;&nbsp; Sau khi ăn s&aacute;ng, xe v&agrave; HDV đưa Qu&yacute; kh&aacute;ch tham quan v&agrave; mua sắm tại tinh dầu th&ocirc;ng đỏ, Goryo Garden, cửa h&agrave;ng s&acirc;m tươi v&agrave; Nấm Linh Chi v&agrave; ăn trưa tại nh&agrave; h&agrave;ng.</p>\r\n<p><strong>Chiều</strong>&nbsp; Qu&yacute; kh&aacute;ch tham quan <strong>Ch&ugrave;a Joggyesa</strong> &ndash; <em>ng&ocirc;i ch&ugrave;a lớn nhất thủ đ&ocirc; Seoul.</em> Đo&agrave;n tham mua sắm tại cửa h&agrave;ng miễn thuế, khu phố thời trang MyeongDong. Qu&yacute; kh&aacute;ch nghỉ đ&ecirc;m tại kh&aacute;ch sạn Benhur&nbsp; 3* hoặc tương đương</p>\r\n<p><strong>Ng&agrave;y 5 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; SEOUL &ndash; HANOI&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Ăn s&aacute;ng</strong></p>\r\n<p>Qu&yacute; kh&aacute;ch ăn s&aacute;ng, l&agrave;m thủ tục trả ph&ograve;ng. Sau đ&oacute;, xe đưa Qu&yacute; kh&aacute;ch ra s&acirc;n bay đ&aacute;p chuyến bay <strong>VN9417 (10:50-13:20) SEOUL &ndash; HANOI</strong>. Tới s&acirc;n bay Nội B&agrave;i, xe đ&oacute;n v&agrave; đưa kh&aacute;ch về trung t&acirc;m th&agrave;nh phố, chia tay kết th&uacute;c chương tr&igrave;nh.</p>\r\n<p>&nbsp;</p>\r\n<p><strong>Gi&aacute; trọn g&oacute;i d&agrave;nh cho 01 kh&aacute;ch:&nbsp;11.900.000 VND</strong></p>\r\n<p>&nbsp;(Gi&aacute; d&agrave;nh cho đo&agrave;n 15 kh&aacute;ch trở l&ecirc;n)</p>\r\n<p>(Chương tr&igrave;nh c&oacute; thể thay đổi tuy nhi&ecirc;n vẫn&nbsp; đảm bảo c&aacute;c điểm tham quan)</p>\r\n<p><strong>GI&Aacute; TOUR BAO GỒM:</strong></p>\r\n<ol>\r\n<li>V&eacute; m&aacute;y bay khứ hồi bay thẳng H&agrave; nội &ndash; Seoul &ndash; H&agrave; nội của h&atilde;ng h&agrave;ng kh&ocirc;ng Vietnam Airline + thuế v&agrave; phụ thu nhi&ecirc;n liệu c&aacute;c chặng bay v&agrave; lệ ph&iacute; s&acirc;n bay</li>\r\n<li>Xe &ocirc;t&ocirc; chất lượng cao phục vụ kh&aacute;ch theo suốt chương tr&igrave;nh</li>\r\n<li>01 Hướng dẫn vi&ecirc;n du lịch nhiệt t&igrave;nh, kinh nghiệm, th&ocirc;ng thạo tiếng Việt đi theo đo&agrave;n từ Việt Nam v&agrave; 01 hướng dẫn vi&ecirc;n nhiệt t&igrave;nh, kinh nghiệm, th&ocirc;ng thạo tiếng Việt &ndash; H&agrave;n tại H&agrave;n Quốc.</li>\r\n<li>V&eacute; tham quan thắng cảnh tại c&aacute;c điểm du lịch trong chương tr&igrave;nh.</li>\r\n<li>Nghỉ đ&ecirc;m tại kh&aacute;ch sạn 3* ở Seoul (02 người/ph&ograve;ng, đo&agrave;n lẻ nam hoặc nữ sẽ xếp 3 người/ ph&ograve;ng)</li>\r\n<li>C&aacute;c bữa ăn trọn g&oacute;i đ&atilde; ghi trong chương tr&igrave;nh</li>\r\n<li>Lệ ph&iacute; Visa nhập cảnh H&agrave;n Quốc + Ph&iacute; dịch thuật hồ sơ</li>\r\n<li>Bảo hiểm du lịch quốc tế.</li>\r\n<li>Qu&agrave; tặng: mũ, vỏ hộ chiếu</li>\r\n<li>Tặng ngay Voucher mua sắm tại H&agrave;n Quốc trị gi&aacute; đến 1.000.000đ</li>\r\n<li>Bảo hiểm Du lịch mức đền b&ugrave; cao nhất 210 triệu đồng.</li>\r\n</ol>\r\n<p><strong>GI&Aacute; TOUR KH&Ocirc;NG BAO GỒM:</strong></p>\r\n<ol>\r\n<li>Ph&iacute; l&agrave;m hộ chiếu</li>\r\n<li>Cước h&agrave;nh l&yacute; qu&aacute; tải, đồ uống, giặt l&agrave;, điện thoại</li>\r\n<li>Ngủ ph&ograve;ng đơn, chi ph&iacute; c&aacute; nh&acirc;n kh&aacute;c ngo&agrave;i chương tr&igrave;nh&hellip;..</li>\r\n<li>Tiền tip cho HDV v&agrave; l&aacute;i xe: 06 USD/kh&aacute;ch/ng&agrave;y (chi ph&iacute; bắt buộc)</li>\r\n<li>Visa t&aacute;i nhập Việt Nam.</li>\r\n<li>H&agrave;nh l&yacute; qu&aacute; cước qui định v&agrave; c&aacute;c chi ph&iacute; c&aacute; nh&acirc;n ph&aacute;t sinh ngo&agrave;i chương tr&igrave;nh.</li>\r\n</ol>\r\n<p><strong>LƯU &Yacute;:</strong></p>\r\n<ol>\r\n<li>Bất cứ một h&igrave;nh thức bỏ hoặc kh&ocirc;ng sử dụng dịch vụ g&igrave; tại nước ngo&agrave;i đều kh&ocirc;ng được ho&agrave;n lại tiền v&igrave; mọi dịch vụ đ&atilde; được thanh to&aacute;n trước. Theo chương tr&igrave;nh khuyến mại đ&atilde; k&yacute; với đối t&aacute;c H&agrave;n Quốc, qu&yacute; kh&aacute;ch sẽ đi theo tour suốt chương tr&igrave;nh. Qu&yacute; kh&aacute;ch n&agrave;o t&aacute;ch đo&agrave;n vui l&ograve;ng b&aacute;o trước v&agrave; trả th&ecirc;m 2.500.000 VNĐ/kh&aacute;ch/ lần.</li>\r\n<li>Lịch tr&igrave;nh của chương tr&igrave;nh c&oacute; thể thay đổi tuỳ theo thời tiết v&agrave; điều kiện giao th&ocirc;ng tại H&agrave;n Quốc</li>\r\n<li>Kinh ph&iacute; tr&ecirc;n &aacute;p dụng cho kh&aacute;ch h&agrave;ng mang hộ chiếu Việt nam (hộ chiếu c&ograve;n gi&aacute; trị từ 6 th&aacute;ng trở l&ecirc;n kể từ ng&agrave;y khởi h&agrave;nh). Kh&aacute;ch mang hộ chiếu nước ngo&agrave;i, vui l&ograve;ng kiểm tra lại.</li>\r\n<li>Chương tr&igrave;nh tr&ecirc;n c&oacute; thể thay đổi về thời gian v&agrave; lịch tr&igrave;nh, nhưng vẫn đảm bảo c&aacute;c điểm thăm quan như tr&ecirc;n.</li>\r\n<li>V&eacute; m&aacute;y bay theo lịch tr&igrave;nh cả đo&agrave;n, nếu c&oacute; sự thay đổi sau khi xuất v&eacute;, v&eacute; sẽ kh&ocirc;ng c&ograve;n gi&aacute; trị. Giờ giấc cuối c&ugrave;ng phụ thuộc v&agrave;o h&atilde;ng h&agrave;ng kh&ocirc;ng.</li>\r\n<li>C&aacute;c phần dịch vụ kh&ocirc;ng sử dụng đến m&agrave; kh&ocirc;ng b&aacute;o trước khi đăng k&yacute; sẽ kh&ocirc;ng được ho&agrave;n lại.</li>\r\n<li>Chương tr&igrave;nh tr&ecirc;n l&agrave; chương tr&igrave;nh du lịch thuần tu&yacute;, Qu&yacute; kh&aacute;ch c&oacute; nhu cầu kết hợp l&agrave;m việc, đề nghị th&ocirc;ng b&aacute;o r&otilde; khi l&agrave;m thủ tục đăng k&yacute;</li>\r\n<li>Trẻ em từ 2 đến dưới 11 tuổi: 80 % gi&aacute; tour (ngủ chung gường với cha mẹ).</li>\r\n<li>Trẻ em dưới 02 tuổi :&nbsp; 30 % gi&aacute; tour (ngủ chung giường với cha mẹ).</li>\r\n<li>Trẻ em từ 12 tuổi &nbsp;: Gi&aacute; tour thu như người lớn</li>\r\n<li>Tỷ gi&aacute; tiền thanh to&aacute;n c&oacute; thể thay đổi v&agrave;o thời điểm thanh to&aacute;n &aacute;p dụng tỉ gi&aacute; b&aacute;n ra của thị trường tự do.</li>\r\n<li>Tiền thuế c&oacute; thể thay đổi v&agrave;o thời điểm xuất v&eacute;.</li>\r\n<li>Trong trường hợp chỉ c&oacute; 01 kh&aacute;ch (người lớn) đi với 01 b&eacute; (dưới 12 tuổi), qu&yacute; kh&aacute;ch vui l&ograve;ng đ&oacute;ng tiền tour cho B&eacute; ngủ giường ri&ecirc;ng.</li>\r\n<li>Ch&uacute;ng t&ocirc;i kh&ocirc;ng nhận kh&aacute;ch nữ c&oacute; thai từ 5 th&aacute;ng trở l&ecirc;n tham gia c&aacute;c tour du lịch nước ngo&agrave;i.</li>\r\n<li>Qu&yacute; kh&aacute;ch từ 70 tuổi trở l&ecirc;n vui l&ograve;ng đ&oacute;ng th&ecirc;m ph&iacute; bảo hiểm cao cấp (ph&iacute; thay đổi t&ugrave;y theo tour)</li>\r\n<li>Qu&yacute; kh&aacute;ch từ 75 tuổi trở l&ecirc;n y&ecirc;u cầu phải c&oacute; giấy x&aacute;c nhận đầy đủ sức khỏe để đi du lịch nước ngo&agrave;i của B&aacute;c sĩ v&agrave; phải c&oacute; người th&acirc;n dưới 60 tuổi (đầy đủ sức khỏe) đi theo.</li>\r\n<li>Trong trường hợp bất khả kh&aacute;ng do thời tiết, thi&ecirc;n tai, đ&igrave;nh c&ocirc;ng, bạo động, ph&aacute; hoại, chiến tranh, dịch bệnh, chuyến bay bị tr&igrave; ho&atilde;n hay bị hủy do thời tiết hoặc do kỹ thuật&hellip;..dẫn đến tour kh&ocirc;ng thể thực hiện tiếp tục được, ch&uacute;ng t&ocirc;i sẽ ho&agrave;n trả lại tiền tour cho qu&yacute; kh&aacute;ch sau khi đ&atilde; trừ lại c&aacute;c chi ph&iacute; dịch vụ đ&atilde; thực hiện như ph&iacute; l&agrave;m visa,&hellip; v&agrave; kh&ocirc;ng chịu tr&aacute;ch nhiệm bồi thường th&ecirc;m bất kỳ chi ph&iacute; n&agrave;o kh&aacute;c.</li>\r\n</ol>\r\n<p>Thủ tục đăng k&yacute; (xin visa):</p>\r\n<ol>\r\n<li>Hộ chiếu c&ograve;n hạn sử dụng tr&ecirc;n 6 th&aacute;ng (hộ chiếu cũ k&egrave;m theo nếu c&oacute;) với 02 ảnh 3x4 chụp tr&ecirc;n nền ph&ocirc;ng trắng trong v&ograve;ng 6 th&aacute;ng gần đ&acirc;y (hộ chiếu cũ k&egrave;m theo nếu c&oacute;) + bản ph&ocirc; t&ocirc; CMND</li>\r\n<li>Bản c&ocirc;ng chứng phường sở tại Sổ hộ khẩu, giấy đăng k&yacute; kết h&ocirc;n, giấy khai sinh của con (nếu đi theo gia đ&igrave;nh)</li>\r\n<li>Với những kh&aacute;ch h&agrave;ng c&oacute; ng&agrave;y th&aacute;ng năm sinh từ năm 1940 l&ugrave;i về trước phải c&oacute; giấy kh&aacute;m sức khỏe k&egrave;m theo</li>\r\n<li>Với những kh&aacute;ch h&agrave;ng đ&atilde; từng đi c&aacute;c nước trong th&agrave;nh vi&ecirc;n OECD (Nhật, Ch&acirc;u &Acirc;u, &Uacute;c, Mỹ&hellip;) trong v&ograve;ng 3 năm trở lại đ&acirc;y sẽ được miễn chứng minh t&agrave;i ch&iacute;nh</li>\r\n</ol>\r\n<p>* Về chứng minh t&agrave;i ch&iacute;nh, Qu&yacute; kh&aacute;ch nộp những giấy tờ sau:</p>\r\n<ol start="5">\r\n<li>Photo Sổ tiết kiệm trị gi&aacute; tối thiểu 5000 USD/ người hoặc 100.000.000đ tiền Việt thời hạn gửi trước khi xin visa tối thiểu 03 th&aacute;ng (y&ecirc;u cầu bắt buộc)+ x&aacute;c nhận số dư sổ tiết kiệm bản gốc tại ng&acirc;n h&agrave;ng ở thời điểm gần nhất (c&oacute; gi&aacute; trị trong v&ograve;ng 1 tuần kể từ ng&agrave;y xin x&aacute;c nhận )</li>\r\n<li>Nếu sổ tiết kiệm chưa gửi đủ 3 th&aacute;ng (với điều kiện đ&atilde; gửi đủ 1 th&aacute;ng t&iacute;nh đến ng&agrave;y xin visa, kỳ hạn gửi tối thiểu 3 th&aacute;ng) k&egrave;m theo Bản c&ocirc;ng chứng phường sở tại Sổ đỏ nh&agrave; đất hoặc đăng k&yacute; &ocirc; t&ocirc; trong v&ograve;ng 5 năm trở lại đ&acirc;y</li>\r\n</ol>\r\n<p>* Về chứng minh c&ocirc;ng việc:</p>\r\n<ol start="7">\r\n<li>Đối với kh&aacute;ch h&agrave;ng đang đi l&agrave;m:</li>\r\n</ol>\r\n<p>o&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Bản photo của Hợp đồng lao động hoặc quyết định bổ nhiệm hoặc quyết định tăng lương.</p>\r\n<p>o&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; X&aacute;c nhận c&ocirc;ng việc tại thời điểm hiện tại</p>\r\n<p>o&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; X&aacute;c nhận mức lương hoặc bảng lương 3 th&aacute;ng gần nhất hoặc sao k&ecirc; t&agrave;i khoản ng&acirc;n h&agrave;ng 3 th&aacute;ng gần nhất (Nếu c&ocirc;ng ty trả lương bằng h&igrave;nh thức chuyển khoản)</p>\r\n<ol start="8">\r\n<li>Đối với kh&aacute;ch h&agrave;ng l&agrave; chủ doanh nghệp: Bản sao c&ocirc;ng chứng tại phường sở tại Giấy ph&eacute;p đăng k&yacute; kinh doanh</li>\r\n<li>Đối với kh&aacute;ch h&agrave;ng l&agrave; hưu tr&iacute;: Bản sao thẻ hưu tr&iacute;</li>\r\n<li>Đối với khach h&agrave;ng l&agrave; học sinh/ sinh vi&ecirc;n: Bản photo thẻ học sinh/ sinh vi&ecirc;n. Hoặc bản photo giấy khen học kỳ gần nhất hoặc bản gốc x&aacute;c nhận của trường đang theo học</li>\r\n</ol>', 'Hàn Quốc nổi tiếng với những danh lam thắng cảnh như: Nam Mi thơ mộng được biết đến qua bộ phim " Bản tình ca Mùa Đông", hay công viên Everland là công viên giải trí hiện đại và lớn nhất Hàn Quốc, nằm tọa lạc tại Yongin thuộc tỉnh Gyeonggi-do. Seoul là thành phố lớn nhất ở Hàn Quốc và được biết đến là thành phố không bao giờ ngủ ở châu Á. Bất cứ điều gì mà bạn đang tìm kiếm ở địa điểm du lịch này, từ cung điện truyền thống đến những khu mua sắm hiện đại, nghệ thuật và âm nhạc hay các tuyến đường văn hóa, Seoul luôn có nhiều lựa chọn cho bạn.', '<p>&nbsp;</p>\r\n<p><strong>&nbsp;</strong><strong>H&Agrave; NỘI &ndash; CỐ Đ&Ocirc; HOA LƯ &ndash; TAM CỐC &ndash; H&Agrave; NỘI (ăn trưa)</strong></p>\r\n<p><strong>07h30</strong>: Xe v&agrave; hướng dẫn vi&ecirc;n c&ocirc;ng ty du lịch Vietstreet đ&oacute;n qu&yacute; kh&aacute;ch tại điểm hẹn, khởi h&agrave;nh đi Ninh B&igrave;nh (100km c&aacute;ch thủ đ&ocirc; H&agrave; nội), ngắm cảnh v&ugrave;ng n&ocirc;ng th&ocirc;n Vi&ecirc;̣t nam. Qu&yacute; kh&aacute;ch thăm <strong>cố đ&ocirc; Hoa Lư</strong>, <strong>thăm đền vua Đinh, vua L&ecirc;</strong>, được nghe HDV giới thiều về c&aacute;c danh thắng, con người, mảnh đất nơi đ&acirc;y. Ăn trưa tại nh&agrave; h&agrave;ng.</p>\r\n<p><strong>13h00</strong>: Q&uacute;y kh&aacute;ch l&ecirc;n thuy&ecirc;̀n đi dọc theo su&ocirc;́i giữa c&aacute;nh đ&ocirc;̀ng l&uacute;a thăm quan <strong>đ&ocirc;̣ng Tam C&ocirc;́c</strong> (G&ocirc;̀m ba hang: <strong>Hang Cả, Hang Hai , Hang Ba</strong>).</p>\r\n<p><strong>15h30</strong>: Qu&yacute; kh&aacute;ch l&ecirc;n xe trở về H&agrave; nội tr&ecirc;n đường đo&agrave;n dừng mua đặc sản D&ecirc; N&uacute;i, Cơm Ch&aacute;y về l&agrave;m qu&agrave; cho người th&acirc;n.</p>\r\n<p>18h30: Về đến H&agrave; Nội, chia tay qu&yacute; kh&aacute;ch. Kết th&uacute;c chuyến du lịch, hẹn gặp qu&yacute; kh&aacute;ch trong chuyến đi tới.</p>\r\n<p><strong>&nbsp;</strong></p>\r\n<p><strong>BẢNG GI&Aacute; TOUR CHO 1 KH&Aacute;CH GH&Eacute;P ĐO&Agrave;N</strong>:<strong> 650.000</strong> <strong>VND</strong></p>\r\n<p><strong>&nbsp;</strong></p>\r\n<ul>\r\n<li><strong>GI&Aacute; TOUR BAO GỒM:</strong></li>\r\n</ul>\r\n<ul>\r\n<li>Xe du lịch sang trọng, l&aacute;i xe chuy&ecirc;n nghiệp, văn minh, lịch sự phục vụ theo h&agrave;nh tr&igrave;nh.</li>\r\n<li>01 bữa ch&iacute;nh</li>\r\n<li>Hướng dẫn vi&ecirc;n chuy&ecirc;n nghiệp phục vụ nhiệt t&igrave;nh chu đ&aacute;o suốt chuyến đi.</li>\r\n</ul>\r\n<ul>\r\n<li>V&eacute; thăm quan c&aacute;c điểm thăm quan theo h&agrave;nh tr&igrave;nh.</li>\r\n</ul>\r\n<ul>\r\n<li>Nước uống, khăn lạnh phục vụ tr&ecirc;n xe ti&ecirc;u chuẩn 02 chai nước suối/ng&agrave;y thăm quan.</li>\r\n</ul>\r\n<ul>\r\n<li><strong>GI&Aacute; TOUR CHƯA BAO GỒM:</strong></li>\r\n</ul>\r\n<ul>\r\n<li>Đồ uống: rượu, bia, nước ngọt v&agrave; c&aacute;c loại đồ uống c&aacute; nh&acirc;n kh&ocirc;ng đề cập.</li>\r\n<li>C&aacute;c chi ph&iacute; c&aacute; nh&acirc;n: mua sắm, điện thoại, thăm quan ngo&agrave;i h&agrave;nh tr&igrave;nh.</li>\r\n<li>Thuế gi&aacute; trị gia tăng VAT&nbsp;10%.</li>\r\n</ul>\r\n<ul>\r\n<li><strong>CH&Iacute;NH S&Aacute;CH GI&Aacute; TRẺ EM:</strong></li>\r\n</ul>\r\n<ul>\r\n<li>Trẻ em từ 10 tuổi trở l&ecirc;n mua 01 v&eacute;;</li>\r\n<li>Trẻ em từ 04 - 09 tuổi mua&nbsp;75% gi&aacute; v&eacute; người lớn.</li>\r\n<li>02 người lớn chỉ được k&egrave;m 01 trẻ em từ 03 tuổi trở xuống, nếu trẻ em đi k&egrave;m nhiều hơn th&igrave; từ em thứ 02 trở l&ecirc;n phải mua &frac12; v&eacute;.</li>\r\n</ul>\r\n<p><strong>&nbsp;</strong></p>', '<p>&nbsp;</p>\r\n<p><strong>&nbsp;</strong><strong>H&Agrave; NỘI &ndash; CỐ Đ&Ocirc; HOA LƯ &ndash; TAM CỐC &ndash; H&Agrave; NỘI (ăn trưa)</strong></p>\r\n<p><strong>07h30</strong>: Xe v&agrave; hướng dẫn vi&ecirc;n c&ocirc;ng ty du lịch Vietstreet đ&oacute;n qu&yacute; kh&aacute;ch tại điểm hẹn, khởi h&agrave;nh đi Ninh B&igrave;nh (100km c&aacute;ch thủ đ&ocirc; H&agrave; nội), ngắm cảnh v&ugrave;ng n&ocirc;ng th&ocirc;n Vi&ecirc;̣t nam. Qu&yacute; kh&aacute;ch thăm <strong>cố đ&ocirc; Hoa Lư</strong>, <strong>thăm đền vua Đinh, vua L&ecirc;</strong>, được nghe HDV giới thiều về c&aacute;c danh thắng, con người, mảnh đất nơi đ&acirc;y. Ăn trưa tại nh&agrave; h&agrave;ng.</p>\r\n<p><strong>13h00</strong>: Q&uacute;y kh&aacute;ch l&ecirc;n thuy&ecirc;̀n đi dọc theo su&ocirc;́i giữa c&aacute;nh đ&ocirc;̀ng l&uacute;a thăm quan <strong>đ&ocirc;̣ng Tam C&ocirc;́c</strong> (G&ocirc;̀m ba hang: <strong>Hang Cả, Hang Hai , Hang Ba</strong>).</p>\r\n<p><strong>15h30</strong>: Qu&yacute; kh&aacute;ch l&ecirc;n xe trở về H&agrave; nội tr&ecirc;n đường đo&agrave;n dừng mua đặc sản D&ecirc; N&uacute;i, Cơm Ch&aacute;y về l&agrave;m qu&agrave; cho người th&acirc;n.</p>\r\n<p>18h30: Về đến H&agrave; Nội, chia tay qu&yacute; kh&aacute;ch. Kết th&uacute;c chuyến du lịch, hẹn gặp qu&yacute; kh&aacute;ch trong chuyến đi tới.</p>\r\n<p><strong>&nbsp;</strong></p>\r\n<p><strong>BẢNG GI&Aacute; TOUR CHO 1 KH&Aacute;CH GH&Eacute;P ĐO&Agrave;N</strong>:<strong> 650.000</strong> <strong>VND</strong></p>\r\n<p><strong>&nbsp;</strong></p>\r\n<ul>\r\n<li><strong>GI&Aacute; TOUR BAO GỒM:</strong></li>\r\n</ul>\r\n<ul>\r\n<li>Xe du lịch sang trọng, l&aacute;i xe chuy&ecirc;n nghiệp, văn minh, lịch sự phục vụ theo h&agrave;nh tr&igrave;nh.</li>\r\n<li>01 bữa ch&iacute;nh</li>\r\n<li>Hướng dẫn vi&ecirc;n chuy&ecirc;n nghiệp phục vụ nhiệt t&igrave;nh chu đ&aacute;o suốt chuyến đi.</li>\r\n</ul>\r\n<ul>\r\n<li>V&eacute; thăm quan c&aacute;c điểm thăm quan theo h&agrave;nh tr&igrave;nh.</li>\r\n</ul>\r\n<ul>\r\n<li>Nước uống, khăn lạnh phục vụ tr&ecirc;n xe ti&ecirc;u chuẩn 02 chai nước suối/ng&agrave;y thăm quan.</li>\r\n</ul>\r\n<ul>\r\n<li><strong>GI&Aacute; TOUR CHƯA BAO GỒM:</strong></li>\r\n</ul>\r\n<ul>\r\n<li>Đồ uống: rượu, bia, nước ngọt v&agrave; c&aacute;c loại đồ uống c&aacute; nh&acirc;n kh&ocirc;ng đề cập.</li>\r\n<li>C&aacute;c chi ph&iacute; c&aacute; nh&acirc;n: mua sắm, điện thoại, thăm quan ngo&agrave;i h&agrave;nh tr&igrave;nh.</li>\r\n<li>Thuế gi&aacute; trị gia tăng VAT&nbsp;10%.</li>\r\n</ul>\r\n<ul>\r\n<li><strong>CH&Iacute;NH S&Aacute;CH GI&Aacute; TRẺ EM:</strong></li>\r\n</ul>\r\n<ul>\r\n<li>Trẻ em từ 10 tuổi trở l&ecirc;n mua 01 v&eacute;;</li>\r\n<li>Trẻ em từ 04 - 09 tuổi mua&nbsp;75% gi&aacute; v&eacute; người lớn.</li>\r\n<li>02 người lớn chỉ được k&egrave;m 01 trẻ em từ 03 tuổi trở xuống, nếu trẻ em đi k&egrave;m nhiều hơn th&igrave; từ em thứ 02 trở l&ecirc;n phải mua &frac12; v&eacute;.</li>\r\n</ul>\r\n<p><strong>&nbsp;</strong></p>', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Tour Hà Nội - Nha Trang - Phan Thiết', 'tour ha noi - nha trang - phan thiet', NULL),
(38, 2, '', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'TOUR HÀ NỘI - SINGAPORE - MALAYSIA', 'tour hà nội - singapore - malaysia', NULL),
(39, 1, '', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Tour Hà Nội - Mộc Châu - Sơn La - Điện Biên', 'tour ha noi - moc chau - son la - đien bien', NULL);
INSERT INTO `tours_lang` (`tour_id`, `lang_id`, `schedule`, `desc`, `detail`, `notice`, `created_at`, `updated_at`, `name`, `keyword`, `intro`) VALUES
(39, 2, '<p><strong>Ng&agrave;y 01&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; H&Agrave; NỘI &ndash;&nbsp; SEOUL&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(Ăn tối)</strong></p>\r\n<p><strong>11h40:</strong> Qu&yacute; kh&aacute;ch tập trung tại Nh&agrave; h&aacute;t lớn (Đ/c: Số 1 Tr&agrave;ng Tiền &ndash; H&agrave; Nội), xe v&agrave; HDV đ&oacute;n v&agrave; đưa đo&agrave;n ra <strong>s&acirc;n bay Nội B&agrave;i</strong> đ&aacute;p chuyến bay HANOI &ndash; SEOUL <strong>VN 9416</strong> <strong>(15:15 &ndash; 21 :20).</strong></p>\r\n<p><strong>21:20:&nbsp; </strong>Đến <strong>s&acirc;n bay Quốc tế Incheon</strong>, Xe v&agrave; HDV đ&oacute;n Qu&yacute; kh&aacute;ch về kh&aacute;ch sạn tại Seoul nghỉ ngơi.&nbsp; Qu&yacute; kh&aacute;ch nghỉ đ&ecirc;m tại kh&aacute;ch sạn Benhur&nbsp; 3* hoặc tương đương</p>\r\n<p><strong>Ng&agrave;y 02&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; SEOUL - EVERLAND&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(Ăn S&aacute;ng, Trưa, Tối)</strong></p>\r\n<p><strong>S&aacute;ng</strong>&nbsp;&nbsp;&nbsp; Sau khi ăn s&aacute;ng, xe v&agrave; HDV đi tham quan:</p>\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>Nh&agrave; Xanh &ndash;</strong> <em>Phủ Tổng Thống</em></p>\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>Cung đi</strong><strong>ện ho&agrave;ng gia Kyong bok</strong> - <em>nơi m&agrave; c&aacute;c vua ch&uacute;a <strong>triều đại Jocheon</strong> từng ngự trị.</em></p>\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>B</strong><strong>ảo t&agrave;ng d&acirc;n gian quốc gia</strong> - <em>l&agrave; bảo t&agrave;ng quốc gia duy nhất về văn h&oacute;a d&acirc;n gian, trưng b&agrave;y khoảng 4.000 hiện vật về đời sống văn h&oacute;a</em></p>\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>Qu</strong><strong>ảng trường Gwanghawamun</strong> v&agrave; d&ograve;ng suối nh&acirc;n tạo Chonggye</p>\r\n<p><strong>Trưa</strong>&nbsp;&nbsp; Kết th&uacute;c chương tr&igrave;nh tham quan buổi s&aacute;ng Qu&yacute; kh&aacute;ch d&ugrave;ng bữa trưa tại nh&agrave; h&agrave;ng.</p>\r\n<p><strong>Chiều</strong>&nbsp; Sau khi ăn trưa v&agrave; nghỉ ngơi Qu&yacute; kh&aacute;ch tiếp tục đi thăm quan <strong>c&ocirc;ng vi&ecirc;n Everland</strong> &ndash; <em>c&ocirc;ng vi&ecirc;n lớn nhất ở H&agrave;n Quốc</em>, được xếp vị tr&iacute; thứ 8 trong danh s&aacute;ch 10 c&ocirc;ng vi&ecirc;n giải tr&iacute; thu h&uacute;t đ&ocirc;ng kh&aacute;ch nhất thế giới tại đ&acirc;y Qu&yacute; kh&aacute;ch sẽ tham gia c&aacute;c tr&ograve; chơi hấp dẫn c&oacute; bao gồm trong v&eacute; v&agrave;o cửa.</p>\r\n<p><strong>Tối</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Qu&yacute; kh&aacute;ch nghỉ đ&ecirc;m tại kh&aacute;ch sạn Benhur&nbsp; 3* hoặc tương đương v&agrave; tự do t&igrave;m hiểu SEOUL về đ&ecirc;m.</p>\r\n<p><strong>Ng&agrave;y 03&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; SEOUL &ndash; NAMI &ndash; C&Ocirc;NG VI&Ecirc;N NƯỚC&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(Ăn S&aacute;ng, Trưa, Tối)</strong></p>\r\n<p><strong>S&aacute;ng</strong>&nbsp;&nbsp;&nbsp; Sau &nbsp;ăn s&aacute;ng Qu&yacute; kh&aacute;ch tham quan <strong>Đảo Nami</strong>: <em>h&ograve;n đảo l&atilde;ng mạn &ndash; nơi đ&atilde; từng quay bộ phim nổi tiếng &ldquo; Bản t&igrave;nh ca M&ugrave;a Đ&ocirc;ng&rdquo; với những h&agrave;ng c&acirc;y cao v&uacute;t v&agrave; bức tượng t&igrave;nh y&ecirc;u vĩnh cửu.</em>Qu&yacute; kh&aacute;ch nghỉ ngơi v&agrave; d&ugrave;ng bữa trưa tại nh&agrave; h&agrave;ng.</p>\r\n<p><strong>Chiều</strong> Qu&yacute; kh&aacute;ch trải nhiệm <strong>tắm Sauna kiểu H&agrave;n Quốc</strong> v&agrave; vui chơi tại <strong>Trung T&acirc;m Sealala v&agrave; C&ocirc;ng vi&ecirc;n nước</strong>. Kết th&uacute;c một ng&agrave;y vui vẻ Qu&yacute; kh&aacute;ch nghỉ đ&ecirc;m tại kh&aacute;ch sạn Benhur&nbsp; 3* (hoặc tương đương) v&agrave; tự do tham quan.</p>\r\n<p><strong>Ng&agrave;y 04&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; SEOUL&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(Ăn S&aacute;ng, Trưa, Tối)</strong></p>\r\n<p><strong>S&aacute;ng</strong>&nbsp;&nbsp;&nbsp; Sau khi ăn s&aacute;ng, xe v&agrave; HDV đưa Qu&yacute; kh&aacute;ch tham quan v&agrave; mua sắm tại tinh dầu th&ocirc;ng đỏ, Goryo Garden, cửa h&agrave;ng s&acirc;m tươi v&agrave; Nấm Linh Chi v&agrave; ăn trưa tại nh&agrave; h&agrave;ng.</p>\r\n<p><strong>Chiều</strong>&nbsp; Qu&yacute; kh&aacute;ch tham quan <strong>Ch&ugrave;a Joggyesa</strong> &ndash; <em>ng&ocirc;i ch&ugrave;a lớn nhất thủ đ&ocirc; Seoul.</em> Đo&agrave;n tham mua sắm tại cửa h&agrave;ng miễn thuế, khu phố thời trang MyeongDong. Qu&yacute; kh&aacute;ch nghỉ đ&ecirc;m tại kh&aacute;ch sạn Benhur&nbsp; 3* hoặc tương đương</p>\r\n<p><strong>Ng&agrave;y 5 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; SEOUL &ndash; HANOI&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Ăn s&aacute;ng</strong></p>\r\n<p>Qu&yacute; kh&aacute;ch ăn s&aacute;ng, l&agrave;m thủ tục trả ph&ograve;ng. Sau đ&oacute;, xe đưa Qu&yacute; kh&aacute;ch ra s&acirc;n bay đ&aacute;p chuyến bay <strong>VN9417 (10:50-13:20) SEOUL &ndash; HANOI</strong>. Tới s&acirc;n bay Nội B&agrave;i, xe đ&oacute;n v&agrave; đưa kh&aacute;ch về trung t&acirc;m th&agrave;nh phố, chia tay kết th&uacute;c chương tr&igrave;nh.</p>\r\n<p>&nbsp;</p>\r\n<p><strong>Gi&aacute; trọn g&oacute;i d&agrave;nh cho 01 kh&aacute;ch:&nbsp;11.900.000 VND</strong></p>\r\n<p>&nbsp;(Gi&aacute; d&agrave;nh cho đo&agrave;n 15 kh&aacute;ch trở l&ecirc;n)</p>\r\n<p>(Chương tr&igrave;nh c&oacute; thể thay đổi tuy nhi&ecirc;n vẫn&nbsp; đảm bảo c&aacute;c điểm tham quan)</p>\r\n<p><strong>GI&Aacute; TOUR BAO GỒM:</strong></p>\r\n<ol>\r\n<li>V&eacute; m&aacute;y bay khứ hồi bay thẳng H&agrave; nội &ndash; Seoul &ndash; H&agrave; nội của h&atilde;ng h&agrave;ng kh&ocirc;ng Vietnam Airline + thuế v&agrave; phụ thu nhi&ecirc;n liệu c&aacute;c chặng bay v&agrave; lệ ph&iacute; s&acirc;n bay</li>\r\n<li>Xe &ocirc;t&ocirc; chất lượng cao phục vụ kh&aacute;ch theo suốt chương tr&igrave;nh</li>\r\n<li>01 Hướng dẫn vi&ecirc;n du lịch nhiệt t&igrave;nh, kinh nghiệm, th&ocirc;ng thạo tiếng Việt đi theo đo&agrave;n từ Việt Nam v&agrave; 01 hướng dẫn vi&ecirc;n nhiệt t&igrave;nh, kinh nghiệm, th&ocirc;ng thạo tiếng Việt &ndash; H&agrave;n tại H&agrave;n Quốc.</li>\r\n<li>V&eacute; tham quan thắng cảnh tại c&aacute;c điểm du lịch trong chương tr&igrave;nh.</li>\r\n<li>Nghỉ đ&ecirc;m tại kh&aacute;ch sạn 3* ở Seoul (02 người/ph&ograve;ng, đo&agrave;n lẻ nam hoặc nữ sẽ xếp 3 người/ ph&ograve;ng)</li>\r\n<li>C&aacute;c bữa ăn trọn g&oacute;i đ&atilde; ghi trong chương tr&igrave;nh</li>\r\n<li>Lệ ph&iacute; Visa nhập cảnh H&agrave;n Quốc + Ph&iacute; dịch thuật hồ sơ</li>\r\n<li>Bảo hiểm du lịch quốc tế.</li>\r\n<li>Qu&agrave; tặng: mũ, vỏ hộ chiếu</li>\r\n<li>Tặng ngay Voucher mua sắm tại H&agrave;n Quốc trị gi&aacute; đến 1.000.000đ</li>\r\n<li>Bảo hiểm Du lịch mức đền b&ugrave; cao nhất 210 triệu đồng.</li>\r\n</ol>\r\n<p><strong>GI&Aacute; TOUR KH&Ocirc;NG BAO GỒM:</strong></p>\r\n<ol>\r\n<li>Ph&iacute; l&agrave;m hộ chiếu</li>\r\n<li>Cước h&agrave;nh l&yacute; qu&aacute; tải, đồ uống, giặt l&agrave;, điện thoại</li>\r\n<li>Ngủ ph&ograve;ng đơn, chi ph&iacute; c&aacute; nh&acirc;n kh&aacute;c ngo&agrave;i chương tr&igrave;nh&hellip;..</li>\r\n<li>Tiền tip cho HDV v&agrave; l&aacute;i xe: 06 USD/kh&aacute;ch/ng&agrave;y (chi ph&iacute; bắt buộc)</li>\r\n<li>Visa t&aacute;i nhập Việt Nam.</li>\r\n<li>H&agrave;nh l&yacute; qu&aacute; cước qui định v&agrave; c&aacute;c chi ph&iacute; c&aacute; nh&acirc;n ph&aacute;t sinh ngo&agrave;i chương tr&igrave;nh.</li>\r\n</ol>\r\n<p><strong>LƯU &Yacute;:</strong></p>\r\n<ol>\r\n<li>Bất cứ một h&igrave;nh thức bỏ hoặc kh&ocirc;ng sử dụng dịch vụ g&igrave; tại nước ngo&agrave;i đều kh&ocirc;ng được ho&agrave;n lại tiền v&igrave; mọi dịch vụ đ&atilde; được thanh to&aacute;n trước. Theo chương tr&igrave;nh khuyến mại đ&atilde; k&yacute; với đối t&aacute;c H&agrave;n Quốc, qu&yacute; kh&aacute;ch sẽ đi theo tour suốt chương tr&igrave;nh. Qu&yacute; kh&aacute;ch n&agrave;o t&aacute;ch đo&agrave;n vui l&ograve;ng b&aacute;o trước v&agrave; trả th&ecirc;m 2.500.000 VNĐ/kh&aacute;ch/ lần.</li>\r\n<li>Lịch tr&igrave;nh của chương tr&igrave;nh c&oacute; thể thay đổi tuỳ theo thời tiết v&agrave; điều kiện giao th&ocirc;ng tại H&agrave;n Quốc</li>\r\n<li>Kinh ph&iacute; tr&ecirc;n &aacute;p dụng cho kh&aacute;ch h&agrave;ng mang hộ chiếu Việt nam (hộ chiếu c&ograve;n gi&aacute; trị từ 6 th&aacute;ng trở l&ecirc;n kể từ ng&agrave;y khởi h&agrave;nh). Kh&aacute;ch mang hộ chiếu nước ngo&agrave;i, vui l&ograve;ng kiểm tra lại.</li>\r\n<li>Chương tr&igrave;nh tr&ecirc;n c&oacute; thể thay đổi về thời gian v&agrave; lịch tr&igrave;nh, nhưng vẫn đảm bảo c&aacute;c điểm thăm quan như tr&ecirc;n.</li>\r\n<li>V&eacute; m&aacute;y bay theo lịch tr&igrave;nh cả đo&agrave;n, nếu c&oacute; sự thay đổi sau khi xuất v&eacute;, v&eacute; sẽ kh&ocirc;ng c&ograve;n gi&aacute; trị. Giờ giấc cuối c&ugrave;ng phụ thuộc v&agrave;o h&atilde;ng h&agrave;ng kh&ocirc;ng.</li>\r\n<li>C&aacute;c phần dịch vụ kh&ocirc;ng sử dụng đến m&agrave; kh&ocirc;ng b&aacute;o trước khi đăng k&yacute; sẽ kh&ocirc;ng được ho&agrave;n lại.</li>\r\n<li>Chương tr&igrave;nh tr&ecirc;n l&agrave; chương tr&igrave;nh du lịch thuần tu&yacute;, Qu&yacute; kh&aacute;ch c&oacute; nhu cầu kết hợp l&agrave;m việc, đề nghị th&ocirc;ng b&aacute;o r&otilde; khi l&agrave;m thủ tục đăng k&yacute;</li>\r\n<li>Trẻ em từ 2 đến dưới 11 tuổi: 80 % gi&aacute; tour (ngủ chung gường với cha mẹ).</li>\r\n<li>Trẻ em dưới 02 tuổi :&nbsp; 30 % gi&aacute; tour (ngủ chung giường với cha mẹ).</li>\r\n<li>Trẻ em từ 12 tuổi &nbsp;: Gi&aacute; tour thu như người lớn</li>\r\n<li>Tỷ gi&aacute; tiền thanh to&aacute;n c&oacute; thể thay đổi v&agrave;o thời điểm thanh to&aacute;n &aacute;p dụng tỉ gi&aacute; b&aacute;n ra của thị trường tự do.</li>\r\n<li>Tiền thuế c&oacute; thể thay đổi v&agrave;o thời điểm xuất v&eacute;.</li>\r\n<li>Trong trường hợp chỉ c&oacute; 01 kh&aacute;ch (người lớn) đi với 01 b&eacute; (dưới 12 tuổi), qu&yacute; kh&aacute;ch vui l&ograve;ng đ&oacute;ng tiền tour cho B&eacute; ngủ giường ri&ecirc;ng.</li>\r\n<li>Ch&uacute;ng t&ocirc;i kh&ocirc;ng nhận kh&aacute;ch nữ c&oacute; thai từ 5 th&aacute;ng trở l&ecirc;n tham gia c&aacute;c tour du lịch nước ngo&agrave;i.</li>\r\n<li>Qu&yacute; kh&aacute;ch từ 70 tuổi trở l&ecirc;n vui l&ograve;ng đ&oacute;ng th&ecirc;m ph&iacute; bảo hiểm cao cấp (ph&iacute; thay đổi t&ugrave;y theo tour)</li>\r\n<li>Qu&yacute; kh&aacute;ch từ 75 tuổi trở l&ecirc;n y&ecirc;u cầu phải c&oacute; giấy x&aacute;c nhận đầy đủ sức khỏe để đi du lịch nước ngo&agrave;i của B&aacute;c sĩ v&agrave; phải c&oacute; người th&acirc;n dưới 60 tuổi (đầy đủ sức khỏe) đi theo.</li>\r\n<li>Trong trường hợp bất khả kh&aacute;ng do thời tiết, thi&ecirc;n tai, đ&igrave;nh c&ocirc;ng, bạo động, ph&aacute; hoại, chiến tranh, dịch bệnh, chuyến bay bị tr&igrave; ho&atilde;n hay bị hủy do thời tiết hoặc do kỹ thuật&hellip;..dẫn đến tour kh&ocirc;ng thể thực hiện tiếp tục được, ch&uacute;ng t&ocirc;i sẽ ho&agrave;n trả lại tiền tour cho qu&yacute; kh&aacute;ch sau khi đ&atilde; trừ lại c&aacute;c chi ph&iacute; dịch vụ đ&atilde; thực hiện như ph&iacute; l&agrave;m visa,&hellip; v&agrave; kh&ocirc;ng chịu tr&aacute;ch nhiệm bồi thường th&ecirc;m bất kỳ chi ph&iacute; n&agrave;o kh&aacute;c.</li>\r\n</ol>\r\n<p>Thủ tục đăng k&yacute; (xin visa):</p>\r\n<ol>\r\n<li>Hộ chiếu c&ograve;n hạn sử dụng tr&ecirc;n 6 th&aacute;ng (hộ chiếu cũ k&egrave;m theo nếu c&oacute;) với 02 ảnh 3x4 chụp tr&ecirc;n nền ph&ocirc;ng trắng trong v&ograve;ng 6 th&aacute;ng gần đ&acirc;y (hộ chiếu cũ k&egrave;m theo nếu c&oacute;) + bản ph&ocirc; t&ocirc; CMND</li>\r\n<li>Bản c&ocirc;ng chứng phường sở tại Sổ hộ khẩu, giấy đăng k&yacute; kết h&ocirc;n, giấy khai sinh của con (nếu đi theo gia đ&igrave;nh)</li>\r\n<li>Với những kh&aacute;ch h&agrave;ng c&oacute; ng&agrave;y th&aacute;ng năm sinh từ năm 1940 l&ugrave;i về trước phải c&oacute; giấy kh&aacute;m sức khỏe k&egrave;m theo</li>\r\n<li>Với những kh&aacute;ch h&agrave;ng đ&atilde; từng đi c&aacute;c nước trong th&agrave;nh vi&ecirc;n OECD (Nhật, Ch&acirc;u &Acirc;u, &Uacute;c, Mỹ&hellip;) trong v&ograve;ng 3 năm trở lại đ&acirc;y sẽ được miễn chứng minh t&agrave;i ch&iacute;nh</li>\r\n</ol>\r\n<p>* Về chứng minh t&agrave;i ch&iacute;nh, Qu&yacute; kh&aacute;ch nộp những giấy tờ sau:</p>\r\n<ol start="5">\r\n<li>Photo Sổ tiết kiệm trị gi&aacute; tối thiểu 5000 USD/ người hoặc 100.000.000đ tiền Việt thời hạn gửi trước khi xin visa tối thiểu 03 th&aacute;ng (y&ecirc;u cầu bắt buộc)+ x&aacute;c nhận số dư sổ tiết kiệm bản gốc tại ng&acirc;n h&agrave;ng ở thời điểm gần nhất (c&oacute; gi&aacute; trị trong v&ograve;ng 1 tuần kể từ ng&agrave;y xin x&aacute;c nhận )</li>\r\n<li>Nếu sổ tiết kiệm chưa gửi đủ 3 th&aacute;ng (với điều kiện đ&atilde; gửi đủ 1 th&aacute;ng t&iacute;nh đến ng&agrave;y xin visa, kỳ hạn gửi tối thiểu 3 th&aacute;ng) k&egrave;m theo Bản c&ocirc;ng chứng phường sở tại Sổ đỏ nh&agrave; đất hoặc đăng k&yacute; &ocirc; t&ocirc; trong v&ograve;ng 5 năm trở lại đ&acirc;y</li>\r\n</ol>\r\n<p>* Về chứng minh c&ocirc;ng việc:</p>\r\n<ol start="7">\r\n<li>Đối với kh&aacute;ch h&agrave;ng đang đi l&agrave;m:</li>\r\n</ol>\r\n<p>o&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Bản photo của Hợp đồng lao động hoặc quyết định bổ nhiệm hoặc quyết định tăng lương.</p>\r\n<p>o&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; X&aacute;c nhận c&ocirc;ng việc tại thời điểm hiện tại</p>\r\n<p>o&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; X&aacute;c nhận mức lương hoặc bảng lương 3 th&aacute;ng gần nhất hoặc sao k&ecirc; t&agrave;i khoản ng&acirc;n h&agrave;ng 3 th&aacute;ng gần nhất (Nếu c&ocirc;ng ty trả lương bằng h&igrave;nh thức chuyển khoản)</p>\r\n<ol start="8">\r\n<li>Đối với kh&aacute;ch h&agrave;ng l&agrave; chủ doanh nghệp: Bản sao c&ocirc;ng chứng tại phường sở tại Giấy ph&eacute;p đăng k&yacute; kinh doanh</li>\r\n<li>Đối với kh&aacute;ch h&agrave;ng l&agrave; hưu tr&iacute;: Bản sao thẻ hưu tr&iacute;</li>\r\n<li>Đối với khach h&agrave;ng l&agrave; học sinh/ sinh vi&ecirc;n: Bản photo thẻ học sinh/ sinh vi&ecirc;n. Hoặc bản photo giấy khen học kỳ gần nhất hoặc bản gốc x&aacute;c nhận của trường đang theo học</li>\r\n</ol>', 'Hàn Quốc nổi tiếng với những danh lam thắng cảnh như: Nam Mi thơ mộng được biết đến qua bộ phim " Bản tình ca Mùa Đông", hay công viên Everland là công viên giải trí hiện đại và lớn nhất Hàn Quốc, nằm tọa lạc tại Yongin thuộc tỉnh Gyeonggi-do. Seoul là thành phố lớn nhất ở Hàn Quốc và được biết đến là thành phố không bao giờ ngủ ở châu Á. Bất cứ điều gì mà bạn đang tìm kiếm ở địa điểm du lịch này, từ cung điện truyền thống đến những khu mua sắm hiện đại, nghệ thuật và âm nhạc hay các tuyến đường văn hóa, Seoul luôn có nhiều lựa chọn cho bạn.', '<p><strong>H&Agrave; NỘI &ndash; CỐ Đ&Ocirc; HOA LƯ &ndash; TAM CỐC &ndash; H&Agrave; NỘI (ăn trưa)</strong></p>\r\n<p><strong>07h30</strong>: Xe v&agrave; hướng dẫn vi&ecirc;n c&ocirc;ng ty du lịch Vietstreet đ&oacute;n qu&yacute; kh&aacute;ch tại điểm hẹn, khởi h&agrave;nh đi Ninh B&igrave;nh (100km c&aacute;ch thủ đ&ocirc; H&agrave; nội), ngắm cảnh v&ugrave;ng n&ocirc;ng th&ocirc;n Vi&ecirc;̣t nam. Qu&yacute; kh&aacute;ch thăm <strong>cố đ&ocirc; Hoa Lư</strong>, <strong>thăm đền vua Đinh, vua L&ecirc;</strong>, được nghe HDV giới thiều về c&aacute;c danh thắng, con người, mảnh đất nơi đ&acirc;y. Ăn trưa tại nh&agrave; h&agrave;ng.</p>\r\n<p><strong>13h00</strong>: Q&uacute;y kh&aacute;ch l&ecirc;n thuy&ecirc;̀n đi dọc theo su&ocirc;́i giữa c&aacute;nh đ&ocirc;̀ng l&uacute;a thăm quan <strong>đ&ocirc;̣ng Tam C&ocirc;́c</strong> (G&ocirc;̀m ba hang: <strong>Hang Cả, Hang Hai , Hang Ba</strong>).</p>\r\n<p><strong>15h30</strong>: Qu&yacute; kh&aacute;ch l&ecirc;n xe trở về H&agrave; nội tr&ecirc;n đường đo&agrave;n dừng mua đặc sản D&ecirc; N&uacute;i, Cơm Ch&aacute;y về l&agrave;m qu&agrave; cho người th&acirc;n.</p>\r\n<p>18h30: Về đến H&agrave; Nội, chia tay qu&yacute; kh&aacute;ch. Kết th&uacute;c chuyến du lịch, hẹn gặp qu&yacute; kh&aacute;ch trong chuyến đi tới.</p>\r\n<p><strong>&nbsp;</strong></p>\r\n<p><strong>BẢNG GI&Aacute; TOUR CHO 1 KH&Aacute;CH GH&Eacute;P ĐO&Agrave;N</strong>:<strong> 650.000</strong> <strong>VND</strong></p>\r\n<p><strong>&nbsp;</strong></p>\r\n<ul>\r\n<li><strong>GI&Aacute; TOUR BAO GỒM:</strong></li>\r\n</ul>\r\n<ul>\r\n<li>Xe du lịch sang trọng, l&aacute;i xe chuy&ecirc;n nghiệp, văn minh, lịch sự phục vụ theo h&agrave;nh tr&igrave;nh.</li>\r\n<li>01 bữa ch&iacute;nh</li>\r\n<li>Hướng dẫn vi&ecirc;n chuy&ecirc;n nghiệp phục vụ nhiệt t&igrave;nh chu đ&aacute;o suốt chuyến đi.</li>\r\n</ul>\r\n<ul>\r\n<li>V&eacute; thăm quan c&aacute;c điểm thăm quan theo h&agrave;nh tr&igrave;nh.</li>\r\n</ul>\r\n<ul>\r\n<li>Nước uống, khăn lạnh phục vụ tr&ecirc;n xe ti&ecirc;u chuẩn 02 chai nước suối/ng&agrave;y thăm quan.</li>\r\n</ul>\r\n<ul>\r\n<li><strong>GI&Aacute; TOUR CHƯA BAO GỒM:</strong></li>\r\n</ul>\r\n<ul>\r\n<li>Đồ uống: rượu, bia, nước ngọt v&agrave; c&aacute;c loại đồ uống c&aacute; nh&acirc;n kh&ocirc;ng đề cập.</li>\r\n<li>C&aacute;c chi ph&iacute; c&aacute; nh&acirc;n: mua sắm, điện thoại, thăm quan ngo&agrave;i h&agrave;nh tr&igrave;nh.</li>\r\n<li>Thuế gi&aacute; trị gia tăng VAT&nbsp;10%.</li>\r\n</ul>\r\n<ul>\r\n<li><strong>CH&Iacute;NH S&Aacute;CH GI&Aacute; TRẺ EM:</strong></li>\r\n</ul>\r\n<ul>\r\n<li>Trẻ em từ 10 tuổi trở l&ecirc;n mua 01 v&eacute;;</li>\r\n<li>Trẻ em từ 04 - 09 tuổi mua&nbsp;75% gi&aacute; v&eacute; người lớn.</li>\r\n<li>02 người lớn chỉ được k&egrave;m 01 trẻ em từ 03 tuổi trở xuống, nếu trẻ em đi k&egrave;m nhiều hơn th&igrave; từ em thứ 02 trở l&ecirc;n phải mua &frac12; v&eacute;.</li>\r\n</ul>\r\n<p><strong>&nbsp;</strong></p>', '<p><strong>Ng&agrave;y 01&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; H&Agrave; NỘI &ndash;&nbsp; SEOUL&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(Ăn tối)</strong></p>\r\n<p><strong>11h40:</strong> Qu&yacute; kh&aacute;ch tập trung tại Nh&agrave; h&aacute;t lớn (Đ/c: Số 1 Tr&agrave;ng Tiền &ndash; H&agrave; Nội), xe v&agrave; HDV đ&oacute;n v&agrave; đưa đo&agrave;n ra <strong>s&acirc;n bay Nội B&agrave;i</strong> đ&aacute;p chuyến bay HANOI &ndash; SEOUL <strong>VN 9416</strong> <strong>(15:15 &ndash; 21 :20).</strong></p>\r\n<p><strong>21:20:&nbsp; </strong>Đến <strong>s&acirc;n bay Quốc tế Incheon</strong>, Xe v&agrave; HDV đ&oacute;n Qu&yacute; kh&aacute;ch về kh&aacute;ch sạn tại Seoul nghỉ ngơi.&nbsp; Qu&yacute; kh&aacute;ch nghỉ đ&ecirc;m tại kh&aacute;ch sạn Benhur&nbsp; 3* hoặc tương đương</p>\r\n<p><strong>Ng&agrave;y 02&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; SEOUL - EVERLAND&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(Ăn S&aacute;ng, Trưa, Tối)</strong></p>\r\n<p><strong>S&aacute;ng</strong>&nbsp;&nbsp;&nbsp; Sau khi ăn s&aacute;ng, xe v&agrave; HDV đi tham quan:</p>\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>Nh&agrave; Xanh &ndash;</strong> <em>Phủ Tổng Thống</em></p>\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>Cung đi</strong><strong>ện ho&agrave;ng gia Kyong bok</strong> - <em>nơi m&agrave; c&aacute;c vua ch&uacute;a <strong>triều đại Jocheon</strong> từng ngự trị.</em></p>\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>B</strong><strong>ảo t&agrave;ng d&acirc;n gian quốc gia</strong> - <em>l&agrave; bảo t&agrave;ng quốc gia duy nhất về văn h&oacute;a d&acirc;n gian, trưng b&agrave;y khoảng 4.000 hiện vật về đời sống văn h&oacute;a</em></p>\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>Qu</strong><strong>ảng trường Gwanghawamun</strong> v&agrave; d&ograve;ng suối nh&acirc;n tạo Chonggye</p>\r\n<p><strong>Trưa</strong>&nbsp;&nbsp; Kết th&uacute;c chương tr&igrave;nh tham quan buổi s&aacute;ng Qu&yacute; kh&aacute;ch d&ugrave;ng bữa trưa tại nh&agrave; h&agrave;ng.</p>\r\n<p><strong>Chiều</strong>&nbsp; Sau khi ăn trưa v&agrave; nghỉ ngơi Qu&yacute; kh&aacute;ch tiếp tục đi thăm quan <strong>c&ocirc;ng vi&ecirc;n Everland</strong> &ndash; <em>c&ocirc;ng vi&ecirc;n lớn nhất ở H&agrave;n Quốc</em>, được xếp vị tr&iacute; thứ 8 trong danh s&aacute;ch 10 c&ocirc;ng vi&ecirc;n giải tr&iacute; thu h&uacute;t đ&ocirc;ng kh&aacute;ch nhất thế giới tại đ&acirc;y Qu&yacute; kh&aacute;ch sẽ tham gia c&aacute;c tr&ograve; chơi hấp dẫn c&oacute; bao gồm trong v&eacute; v&agrave;o cửa.</p>\r\n<p><strong>Tối</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Qu&yacute; kh&aacute;ch nghỉ đ&ecirc;m tại kh&aacute;ch sạn Benhur&nbsp; 3* hoặc tương đương v&agrave; tự do t&igrave;m hiểu SEOUL về đ&ecirc;m.</p>\r\n<p><strong>Ng&agrave;y 03&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; SEOUL &ndash; NAMI &ndash; C&Ocirc;NG VI&Ecirc;N NƯỚC&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(Ăn S&aacute;ng, Trưa, Tối)</strong></p>\r\n<p><strong>S&aacute;ng</strong>&nbsp;&nbsp;&nbsp; Sau &nbsp;ăn s&aacute;ng Qu&yacute; kh&aacute;ch tham quan <strong>Đảo Nami</strong>: <em>h&ograve;n đảo l&atilde;ng mạn &ndash; nơi đ&atilde; từng quay bộ phim nổi tiếng &ldquo; Bản t&igrave;nh ca M&ugrave;a Đ&ocirc;ng&rdquo; với những h&agrave;ng c&acirc;y cao v&uacute;t v&agrave; bức tượng t&igrave;nh y&ecirc;u vĩnh cửu.</em>Qu&yacute; kh&aacute;ch nghỉ ngơi v&agrave; d&ugrave;ng bữa trưa tại nh&agrave; h&agrave;ng.</p>\r\n<p><strong>Chiều</strong> Qu&yacute; kh&aacute;ch trải nhiệm <strong>tắm Sauna kiểu H&agrave;n Quốc</strong> v&agrave; vui chơi tại <strong>Trung T&acirc;m Sealala v&agrave; C&ocirc;ng vi&ecirc;n nước</strong>. Kết th&uacute;c một ng&agrave;y vui vẻ Qu&yacute; kh&aacute;ch nghỉ đ&ecirc;m tại kh&aacute;ch sạn Benhur&nbsp; 3* (hoặc tương đương) v&agrave; tự do tham quan.</p>\r\n<p><strong>Ng&agrave;y 04&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; SEOUL&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(Ăn S&aacute;ng, Trưa, Tối)</strong></p>\r\n<p><strong>S&aacute;ng</strong>&nbsp;&nbsp;&nbsp; Sau khi ăn s&aacute;ng, xe v&agrave; HDV đưa Qu&yacute; kh&aacute;ch tham quan v&agrave; mua sắm tại tinh dầu th&ocirc;ng đỏ, Goryo Garden, cửa h&agrave;ng s&acirc;m tươi v&agrave; Nấm Linh Chi v&agrave; ăn trưa tại nh&agrave; h&agrave;ng.</p>\r\n<p><strong>Chiều</strong>&nbsp; Qu&yacute; kh&aacute;ch tham quan <strong>Ch&ugrave;a Joggyesa</strong> &ndash; <em>ng&ocirc;i ch&ugrave;a lớn nhất thủ đ&ocirc; Seoul.</em> Đo&agrave;n tham mua sắm tại cửa h&agrave;ng miễn thuế, khu phố thời trang MyeongDong. Qu&yacute; kh&aacute;ch nghỉ đ&ecirc;m tại kh&aacute;ch sạn Benhur&nbsp; 3* hoặc tương đương</p>\r\n<p><strong>Ng&agrave;y 5 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; SEOUL &ndash; HANOI&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Ăn s&aacute;ng</strong></p>\r\n<p>Qu&yacute; kh&aacute;ch ăn s&aacute;ng, l&agrave;m thủ tục trả ph&ograve;ng. Sau đ&oacute;, xe đưa Qu&yacute; kh&aacute;ch ra s&acirc;n bay đ&aacute;p chuyến bay <strong>VN9417 (10:50-13:20) SEOUL &ndash; HANOI</strong>. Tới s&acirc;n bay Nội B&agrave;i, xe đ&oacute;n v&agrave; đưa kh&aacute;ch về trung t&acirc;m th&agrave;nh phố, chia tay kết th&uacute;c chương tr&igrave;nh.</p>\r\n<p>&nbsp;</p>\r\n<p><strong>Gi&aacute; trọn g&oacute;i d&agrave;nh cho 01 kh&aacute;ch:&nbsp;11.900.000 VND</strong></p>\r\n<p>&nbsp;(Gi&aacute; d&agrave;nh cho đo&agrave;n 15 kh&aacute;ch trở l&ecirc;n)</p>\r\n<p>(Chương tr&igrave;nh c&oacute; thể thay đổi tuy nhi&ecirc;n vẫn&nbsp; đảm bảo c&aacute;c điểm tham quan)</p>\r\n<p><strong>GI&Aacute; TOUR BAO GỒM:</strong></p>\r\n<ol>\r\n<li>V&eacute; m&aacute;y bay khứ hồi bay thẳng H&agrave; nội &ndash; Seoul &ndash; H&agrave; nội của h&atilde;ng h&agrave;ng kh&ocirc;ng Vietnam Airline + thuế v&agrave; phụ thu nhi&ecirc;n liệu c&aacute;c chặng bay v&agrave; lệ ph&iacute; s&acirc;n bay</li>\r\n<li>Xe &ocirc;t&ocirc; chất lượng cao phục vụ kh&aacute;ch theo suốt chương tr&igrave;nh</li>\r\n<li>01 Hướng dẫn vi&ecirc;n du lịch nhiệt t&igrave;nh, kinh nghiệm, th&ocirc;ng thạo tiếng Việt đi theo đo&agrave;n từ Việt Nam v&agrave; 01 hướng dẫn vi&ecirc;n nhiệt t&igrave;nh, kinh nghiệm, th&ocirc;ng thạo tiếng Việt &ndash; H&agrave;n tại H&agrave;n Quốc.</li>\r\n<li>V&eacute; tham quan thắng cảnh tại c&aacute;c điểm du lịch trong chương tr&igrave;nh.</li>\r\n<li>Nghỉ đ&ecirc;m tại kh&aacute;ch sạn 3* ở Seoul (02 người/ph&ograve;ng, đo&agrave;n lẻ nam hoặc nữ sẽ xếp 3 người/ ph&ograve;ng)</li>\r\n<li>C&aacute;c bữa ăn trọn g&oacute;i đ&atilde; ghi trong chương tr&igrave;nh</li>\r\n<li>Lệ ph&iacute; Visa nhập cảnh H&agrave;n Quốc + Ph&iacute; dịch thuật hồ sơ</li>\r\n<li>Bảo hiểm du lịch quốc tế.</li>\r\n<li>Qu&agrave; tặng: mũ, vỏ hộ chiếu</li>\r\n<li>Tặng ngay Voucher mua sắm tại H&agrave;n Quốc trị gi&aacute; đến 1.000.000đ</li>\r\n<li>Bảo hiểm Du lịch mức đền b&ugrave; cao nhất 210 triệu đồng.</li>\r\n</ol>\r\n<p><strong>GI&Aacute; TOUR KH&Ocirc;NG BAO GỒM:</strong></p>\r\n<ol>\r\n<li>Ph&iacute; l&agrave;m hộ chiếu</li>\r\n<li>Cước h&agrave;nh l&yacute; qu&aacute; tải, đồ uống, giặt l&agrave;, điện thoại</li>\r\n<li>Ngủ ph&ograve;ng đơn, chi ph&iacute; c&aacute; nh&acirc;n kh&aacute;c ngo&agrave;i chương tr&igrave;nh&hellip;..</li>\r\n<li>Tiền tip cho HDV v&agrave; l&aacute;i xe: 06 USD/kh&aacute;ch/ng&agrave;y (chi ph&iacute; bắt buộc)</li>\r\n<li>Visa t&aacute;i nhập Việt Nam.</li>\r\n<li>H&agrave;nh l&yacute; qu&aacute; cước qui định v&agrave; c&aacute;c chi ph&iacute; c&aacute; nh&acirc;n ph&aacute;t sinh ngo&agrave;i chương tr&igrave;nh.</li>\r\n</ol>\r\n<p><strong>LƯU &Yacute;:</strong></p>\r\n<ol>\r\n<li>Bất cứ một h&igrave;nh thức bỏ hoặc kh&ocirc;ng sử dụng dịch vụ g&igrave; tại nước ngo&agrave;i đều kh&ocirc;ng được ho&agrave;n lại tiền v&igrave; mọi dịch vụ đ&atilde; được thanh to&aacute;n trước. Theo chương tr&igrave;nh khuyến mại đ&atilde; k&yacute; với đối t&aacute;c H&agrave;n Quốc, qu&yacute; kh&aacute;ch sẽ đi theo tour suốt chương tr&igrave;nh. Qu&yacute; kh&aacute;ch n&agrave;o t&aacute;ch đo&agrave;n vui l&ograve;ng b&aacute;o trước v&agrave; trả th&ecirc;m 2.500.000 VNĐ/kh&aacute;ch/ lần.</li>\r\n<li>Lịch tr&igrave;nh của chương tr&igrave;nh c&oacute; thể thay đổi tuỳ theo thời tiết v&agrave; điều kiện giao th&ocirc;ng tại H&agrave;n Quốc</li>\r\n<li>Kinh ph&iacute; tr&ecirc;n &aacute;p dụng cho kh&aacute;ch h&agrave;ng mang hộ chiếu Việt nam (hộ chiếu c&ograve;n gi&aacute; trị từ 6 th&aacute;ng trở l&ecirc;n kể từ ng&agrave;y khởi h&agrave;nh). Kh&aacute;ch mang hộ chiếu nước ngo&agrave;i, vui l&ograve;ng kiểm tra lại.</li>\r\n<li>Chương tr&igrave;nh tr&ecirc;n c&oacute; thể thay đổi về thời gian v&agrave; lịch tr&igrave;nh, nhưng vẫn đảm bảo c&aacute;c điểm thăm quan như tr&ecirc;n.</li>\r\n<li>V&eacute; m&aacute;y bay theo lịch tr&igrave;nh cả đo&agrave;n, nếu c&oacute; sự thay đổi sau khi xuất v&eacute;, v&eacute; sẽ kh&ocirc;ng c&ograve;n gi&aacute; trị. Giờ giấc cuối c&ugrave;ng phụ thuộc v&agrave;o h&atilde;ng h&agrave;ng kh&ocirc;ng.</li>\r\n<li>C&aacute;c phần dịch vụ kh&ocirc;ng sử dụng đến m&agrave; kh&ocirc;ng b&aacute;o trước khi đăng k&yacute; sẽ kh&ocirc;ng được ho&agrave;n lại.</li>\r\n<li>Chương tr&igrave;nh tr&ecirc;n l&agrave; chương tr&igrave;nh du lịch thuần tu&yacute;, Qu&yacute; kh&aacute;ch c&oacute; nhu cầu kết hợp l&agrave;m việc, đề nghị th&ocirc;ng b&aacute;o r&otilde; khi l&agrave;m thủ tục đăng k&yacute;</li>\r\n<li>Trẻ em từ 2 đến dưới 11 tuổi: 80 % gi&aacute; tour (ngủ chung gường với cha mẹ).</li>\r\n<li>Trẻ em dưới 02 tuổi :&nbsp; 30 % gi&aacute; tour (ngủ chung giường với cha mẹ).</li>\r\n<li>Trẻ em từ 12 tuổi &nbsp;: Gi&aacute; tour thu như người lớn</li>\r\n<li>Tỷ gi&aacute; tiền thanh to&aacute;n c&oacute; thể thay đổi v&agrave;o thời điểm thanh to&aacute;n &aacute;p dụng tỉ gi&aacute; b&aacute;n ra của thị trường tự do.</li>\r\n<li>Tiền thuế c&oacute; thể thay đổi v&agrave;o thời điểm xuất v&eacute;.</li>\r\n<li>Trong trường hợp chỉ c&oacute; 01 kh&aacute;ch (người lớn) đi với 01 b&eacute; (dưới 12 tuổi), qu&yacute; kh&aacute;ch vui l&ograve;ng đ&oacute;ng tiền tour cho B&eacute; ngủ giường ri&ecirc;ng.</li>\r\n<li>Ch&uacute;ng t&ocirc;i kh&ocirc;ng nhận kh&aacute;ch nữ c&oacute; thai từ 5 th&aacute;ng trở l&ecirc;n tham gia c&aacute;c tour du lịch nước ngo&agrave;i.</li>\r\n<li>Qu&yacute; kh&aacute;ch từ 70 tuổi trở l&ecirc;n vui l&ograve;ng đ&oacute;ng th&ecirc;m ph&iacute; bảo hiểm cao cấp (ph&iacute; thay đổi t&ugrave;y theo tour)</li>\r\n<li>Qu&yacute; kh&aacute;ch từ 75 tuổi trở l&ecirc;n y&ecirc;u cầu phải c&oacute; giấy x&aacute;c nhận đầy đủ sức khỏe để đi du lịch nước ngo&agrave;i của B&aacute;c sĩ v&agrave; phải c&oacute; người th&acirc;n dưới 60 tuổi (đầy đủ sức khỏe) đi theo.</li>\r\n<li>Trong trường hợp bất khả kh&aacute;ng do thời tiết, thi&ecirc;n tai, đ&igrave;nh c&ocirc;ng, bạo động, ph&aacute; hoại, chiến tranh, dịch bệnh, chuyến bay bị tr&igrave; ho&atilde;n hay bị hủy do thời tiết hoặc do kỹ thuật&hellip;..dẫn đến tour kh&ocirc;ng thể thực hiện tiếp tục được, ch&uacute;ng t&ocirc;i sẽ ho&agrave;n trả lại tiền tour cho qu&yacute; kh&aacute;ch sau khi đ&atilde; trừ lại c&aacute;c chi ph&iacute; dịch vụ đ&atilde; thực hiện như ph&iacute; l&agrave;m visa,&hellip; v&agrave; kh&ocirc;ng chịu tr&aacute;ch nhiệm bồi thường th&ecirc;m bất kỳ chi ph&iacute; n&agrave;o kh&aacute;c.</li>\r\n</ol>\r\n<p>Thủ tục đăng k&yacute; (xin visa):</p>\r\n<ol>\r\n<li>Hộ chiếu c&ograve;n hạn sử dụng tr&ecirc;n 6 th&aacute;ng (hộ chiếu cũ k&egrave;m theo nếu c&oacute;) với 02 ảnh 3x4 chụp tr&ecirc;n nền ph&ocirc;ng trắng trong v&ograve;ng 6 th&aacute;ng gần đ&acirc;y (hộ chiếu cũ k&egrave;m theo nếu c&oacute;) + bản ph&ocirc; t&ocirc; CMND</li>\r\n<li>Bản c&ocirc;ng chứng phường sở tại Sổ hộ khẩu, giấy đăng k&yacute; kết h&ocirc;n, giấy khai sinh của con (nếu đi theo gia đ&igrave;nh)</li>\r\n<li>Với những kh&aacute;ch h&agrave;ng c&oacute; ng&agrave;y th&aacute;ng năm sinh từ năm 1940 l&ugrave;i về trước phải c&oacute; giấy kh&aacute;m sức khỏe k&egrave;m theo</li>\r\n<li>Với những kh&aacute;ch h&agrave;ng đ&atilde; từng đi c&aacute;c nước trong th&agrave;nh vi&ecirc;n OECD (Nhật, Ch&acirc;u &Acirc;u, &Uacute;c, Mỹ&hellip;) trong v&ograve;ng 3 năm trở lại đ&acirc;y sẽ được miễn chứng minh t&agrave;i ch&iacute;nh</li>\r\n</ol>\r\n<p>* Về chứng minh t&agrave;i ch&iacute;nh, Qu&yacute; kh&aacute;ch nộp những giấy tờ sau:</p>\r\n<ol start="5">\r\n<li>Photo Sổ tiết kiệm trị gi&aacute; tối thiểu 5000 USD/ người hoặc 100.000.000đ tiền Việt thời hạn gửi trước khi xin visa tối thiểu 03 th&aacute;ng (y&ecirc;u cầu bắt buộc)+ x&aacute;c nhận số dư sổ tiết kiệm bản gốc tại ng&acirc;n h&agrave;ng ở thời điểm gần nhất (c&oacute; gi&aacute; trị trong v&ograve;ng 1 tuần kể từ ng&agrave;y xin x&aacute;c nhận )</li>\r\n<li>Nếu sổ tiết kiệm chưa gửi đủ 3 th&aacute;ng (với điều kiện đ&atilde; gửi đủ 1 th&aacute;ng t&iacute;nh đến ng&agrave;y xin visa, kỳ hạn gửi tối thiểu 3 th&aacute;ng) k&egrave;m theo Bản c&ocirc;ng chứng phường sở tại Sổ đỏ nh&agrave; đất hoặc đăng k&yacute; &ocirc; t&ocirc; trong v&ograve;ng 5 năm trở lại đ&acirc;y</li>\r\n</ol>\r\n<p>* Về chứng minh c&ocirc;ng việc:</p>\r\n<ol start="7">\r\n<li>Đối với kh&aacute;ch h&agrave;ng đang đi l&agrave;m:</li>\r\n</ol>\r\n<p>o&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Bản photo của Hợp đồng lao động hoặc quyết định bổ nhiệm hoặc quyết định tăng lương.</p>\r\n<p>o&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; X&aacute;c nhận c&ocirc;ng việc tại thời điểm hiện tại</p>\r\n<p>o&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; X&aacute;c nhận mức lương hoặc bảng lương 3 th&aacute;ng gần nhất hoặc sao k&ecirc; t&agrave;i khoản ng&acirc;n h&agrave;ng 3 th&aacute;ng gần nhất (Nếu c&ocirc;ng ty trả lương bằng h&igrave;nh thức chuyển khoản)</p>\r\n<ol start="8">\r\n<li>Đối với kh&aacute;ch h&agrave;ng l&agrave; chủ doanh nghệp: Bản sao c&ocirc;ng chứng tại phường sở tại Giấy ph&eacute;p đăng k&yacute; kinh doanh</li>\r\n<li>Đối với kh&aacute;ch h&agrave;ng l&agrave; hưu tr&iacute;: Bản sao thẻ hưu tr&iacute;</li>\r\n<li>Đối với khach h&agrave;ng l&agrave; học sinh/ sinh vi&ecirc;n: Bản photo thẻ học sinh/ sinh vi&ecirc;n. Hoặc bản photo giấy khen học kỳ gần nhất hoặc bản gốc x&aacute;c nhận của trường đang theo học</li>\r\n</ol>', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Tour Hà Nội - Mộc Châu - Sơn La - Điện Biên', 'tour ha noi - moc chau - son la - đien bien', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `tour_cat`
--

CREATE TABLE IF NOT EXISTS `tour_cat` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `parent_id` double NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `user_id` int(5) DEFAULT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=29 ;

--
-- Contenu de la table `tour_cat`
--

INSERT INTO `tour_cat` (`id`, `parent_id`, `created_at`, `updated_at`, `user_id`, `image`) VALUES
(27, 1.01e18, '2015-09-15 19:09:38', '2015-09-15 19:09:38', 1, '/uploads/898738174_397136704.JPG'),
(28, 1.0101e18, '2015-09-15 19:10:07', '2015-09-15 19:10:07', 1, '/uploads/08-2015-488842_15062215140030247836.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `tour_cat_lang`
--

CREATE TABLE IF NOT EXISTS `tour_cat_lang` (
  `cat_id` int(11) NOT NULL,
  `lang_id` int(11) NOT NULL,
  `name` longtext COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `slug` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `excerpt` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `tour_cat_lang`
--

INSERT INTO `tour_cat_lang` (`cat_id`, `lang_id`, `name`, `created_at`, `updated_at`, `slug`, `excerpt`) VALUES
(27, 1, 'Tour miền bắc', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'tour-mien-bac', ''),
(27, 2, 'Tour North', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'tour-north', ''),
(28, 1, 'Ninh Bình', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'ninh-binh', ''),
(28, 2, 'Ninh Binh', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'ninh-binh', '');

-- --------------------------------------------------------

--
-- Structure de la table `tour_cat_tour`
--

CREATE TABLE IF NOT EXISTS `tour_cat_tour` (
  `tour_id` int(10) unsigned NOT NULL,
  `cat_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  KEY `tour_cat_tour_tour_id_index` (`tour_id`),
  KEY `tour_cat_tour_cat_id_index` (`cat_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `tour_cat_tour`
--

INSERT INTO `tour_cat_tour` (`tour_id`, `cat_id`, `created_at`, `updated_at`) VALUES
(34, 27, '2015-09-16 00:39:26', '2015-09-16 00:39:26'),
(34, 28, '2015-09-16 00:39:26', '2015-09-16 00:39:26'),
(36, 27, '2015-09-16 00:43:21', '2015-09-16 00:43:21'),
(36, 28, '2015-09-16 00:43:21', '2015-09-16 00:43:21');

-- --------------------------------------------------------

--
-- Structure de la table `tour_place`
--

CREATE TABLE IF NOT EXISTS `tour_place` (
  `tour_id` int(11) NOT NULL,
  `place_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `tour_place`
--

INSERT INTO `tour_place` (`tour_id`, `place_id`, `created_at`, `updated_at`) VALUES
(32, 15, '2015-09-15 20:59:36', '2015-09-15 20:59:36'),
(32, 25, '2015-09-15 20:59:36', '2015-09-15 20:59:36'),
(33, 13, '2015-09-15 21:14:10', '2015-09-15 21:14:10'),
(33, 15, '2015-09-15 21:14:10', '2015-09-15 21:14:10'),
(33, 17, '2015-09-15 21:14:10', '2015-09-15 21:14:10'),
(34, 25, '2015-09-16 00:39:26', '2015-09-16 00:39:26'),
(35, 15, '2015-09-16 00:40:31', '2015-09-16 00:40:31'),
(36, 15, '2015-09-16 00:43:21', '2015-09-16 00:43:21'),
(37, 25, '2015-09-16 00:44:17', '2015-09-16 00:44:17'),
(38, 15, '2015-09-16 02:09:38', '2015-09-16 02:09:38'),
(38, 19, '2015-09-16 02:09:38', '2015-09-16 02:09:38'),
(39, 15, '2015-09-22 09:06:52', '2015-09-22 09:06:52'),
(39, 19, '2015-09-22 09:06:52', '2015-09-22 09:06:52');

-- --------------------------------------------------------

--
-- Structure de la table `users`
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
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `username`, `nicename`, `email`, `password`, `avatar`, `permission`, `group_id`, `admin`, `active`, `active_code`, `last_login`, `reset_pass_code`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'Admin', 'admin@gmail.com', '$2y$10$6msaFh.jR8frbiQbD/NC3ueM/hct5cXbeBlcA2JDdM8jKUI3ZlsrS', '', '', 1, 1, 1, '', '', '', 'ZkNXF9IRDwDP7rMKDbSzXTZs4N4b17BYPnbXEhN1tUhp49vz1d1ZwtoVjva3', '0000-00-00 00:00:00', '2015-09-05 21:48:56'),
(2, 'SkyFrost', '', 'skyfrost.07@gmail.com', '$2y$10$m06I8asfnfJEZw7VlrTWCeuO8HhXNVE7dNkQ8PcoS2e4WJJQqC7UC', '', '', 7, 0, 1, '', '', '', 'QQ9XUm9shGMDmEhsWrbcX3f5mKUOnxAbnagkaBSjzSX3HLdHPaDqGCcsTz8D', '2015-08-19 11:39:15', '2015-09-04 00:18:34'),
(4, 'customer', '', 'customer@gmail.com', '$2y$10$pT3ZuP4upVzkj/mAK8x/iu1oDJm48UIJz0NfwLrEulYao5w.2x.Ki', '', '', 8, 0, 1, '', '', '', NULL, '2015-08-20 03:56:09', '2015-08-27 08:06:42'),
(5, 'editor', '', 'editor@gmail.com', '$2y$10$dL6QclqoUUw9SYpDRp51POiyPlrUanT4raVVir7Gd0MlfQuOVOcXa', '', '', 3, 0, 1, '', '', '', NULL, '2015-08-20 11:15:06', '2015-08-27 08:07:27'),
(6, 'author', '', 'author@gmail.com', '$2y$10$Gmj33oWJBnJ/TLJrymecB.XUsamryrtcNtqsiGa0jJdmRmVlL.Coe', '', '', 6, 0, 1, '', '', '', 'sJu36ak4XOLtkSiyha33sVDryLKZyfF8hjzbkmFrU7ydpE1CfAdikH7sU2XY', '2015-08-20 11:16:49', '2015-09-02 05:12:05');

-- --------------------------------------------------------

--
-- Structure de la table `user_groups`
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
-- Contenu de la table `user_groups`
--

INSERT INTO `user_groups` (`id`, `name`, `slug`, `permission`, `active`, `created_at`, `updated_at`) VALUES
(1, 'Quản lý', 'quan-ly', 'a:35:{i:0;s:10:"list_users";i:1;s:12:"create_users";i:2;s:10:"edit_users";i:3;s:17:"edit_others_users";i:4;s:12:"delete_users";i:5;s:19:"delete_others_users";i:6;s:15:"edit_role_users";i:7;s:18:"manage_user_groups";i:8;s:18:"manage_admin_menus";i:9;s:16:"manage_languages";i:10;s:12:"manage_menus";i:11;s:14:"manage_sliders";i:12;s:14:"manage_banners";i:13;s:16:"manage_customers";i:14;s:16:"manage_locations";i:15;s:9:"list_cats";i:16;s:11:"create_cats";i:17;s:9:"edit_cats";i:18;s:11:"delete_cats";i:19;s:9:"list_tags";i:20;s:11:"create_tags";i:21;s:9:"edit_tags";i:22;s:11:"delete_tags";i:23;s:10:"list_posts";i:24;s:12:"create_posts";i:25;s:10:"edit_posts";i:26;s:17:"edit_others_posts";i:27;s:12:"delete_posts";i:28;s:19:"delete_others_posts";i:29;s:10:"list_pages";i:30;s:12:"create_pages";i:31;s:10:"edit_pages";i:32;s:17:"edit_others_pages";i:33;s:12:"delete_pages";i:34;s:19:"delete_others_pages";}', 1, '2015-08-20 11:57:10', '2015-09-09 08:13:56'),
(3, 'Biên tập viên', 'bien-tap-vien', 'a:22:{i:0;s:10:"list_users";i:1;s:10:"edit_users";i:2;s:9:"list_cats";i:3;s:11:"create_cats";i:4;s:9:"edit_cats";i:5;s:11:"delete_cats";i:6;s:9:"list_tags";i:7;s:11:"create_tags";i:8;s:9:"edit_tags";i:9;s:11:"delete_tags";i:10;s:10:"list_posts";i:11;s:12:"create_posts";i:12;s:10:"edit_posts";i:13;s:17:"edit_others_posts";i:14;s:12:"delete_posts";i:15;s:19:"delete_others_posts";i:16;s:10:"list_pages";i:17;s:12:"create_pages";i:18;s:10:"edit_pages";i:19;s:17:"edit_others_pages";i:20;s:12:"delete_pages";i:21;s:19:"delete_others_pages";}', 1, '2015-08-20 12:00:32', '2015-09-03 21:54:56'),
(6, 'Tác giả', 'tac-gia', 'a:17:{i:0;s:10:"list_users";i:1;s:10:"edit_users";i:2;s:9:"list_cats";i:3;s:11:"create_cats";i:4;s:9:"edit_cats";i:5;s:9:"list_tags";i:6;s:11:"create_tags";i:7;s:9:"edit_tags";i:8;s:11:"delete_tags";i:9;s:10:"list_posts";i:10;s:12:"create_posts";i:11;s:10:"edit_posts";i:12;s:12:"delete_posts";i:13;s:10:"list_pages";i:14;s:12:"create_pages";i:15;s:10:"edit_pages";i:16;s:12:"delete_pages";}', 1, '2015-08-27 08:06:04', '2015-09-03 10:16:27'),
(7, 'Thành viên', 'thanh-vien', 'a:15:{i:0;s:10:"list_users";i:1;s:10:"edit_users";i:2;s:9:"list_cats";i:3;s:11:"create_cats";i:4;s:9:"edit_cats";i:5;s:9:"list_tags";i:6;s:11:"create_tags";i:7;s:9:"edit_tags";i:8;s:10:"list_posts";i:9;s:12:"create_posts";i:10;s:10:"edit_posts";i:11;s:10:"list_pages";i:12;s:10:"edit_pages";i:13;s:17:"edit_others_pages";i:14;s:12:"delete_pages";}', 1, '2015-08-27 08:06:14', '2015-09-03 21:55:57'),
(8, 'Khách hàng', 'khach-hang', 'a:1:{i:0;s:10:"list_users";}', 1, '2015-08-27 08:06:25', '2015-09-03 10:17:06');

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `tour_cat_tour`
--
ALTER TABLE `tour_cat_tour`
  ADD CONSTRAINT `tour_cat_tour_cat_id_foreign` FOREIGN KEY (`cat_id`) REFERENCES `tour_cat` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tour_cat_tour_tour_id_foreign` FOREIGN KEY (`tour_id`) REFERENCES `tours` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
