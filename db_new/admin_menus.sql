-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 30, 2015 at 11:16 AM
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
(1, 'fa-dashboard', 'Admin', 'admin', '', 'admin', 'read', 0, 1, 1, '2015-08-31 18:20:01', '2015-09-01 23:46:27'),
(2, 'fa-user', 'Tài khoản', 'tai-khoan', '', '', 'read', 0, 2, 1, '2015-08-31 18:22:27', '2015-09-01 23:46:33'),
(3, 'fa-edit', 'Bài viết', 'bai-viet', '', '', 'read', 0, 5, 1, '2015-08-31 18:38:11', '2015-09-16 00:35:22'),
(5, 'fa-circle-o', 'Tất cả Tài khoản', 'tat-ca-tai-khoan', '', 'admin.user.index', 'list_users', 2, 1, 1, '2015-08-31 20:38:04', '2015-09-01 23:39:15'),
(6, 'fa-circle-o', 'Nhóm tài khoản', 'nhom-tai-khoan', '', 'admin.user_group.index', 'manage_user_groups', 2, 2, 1, '2015-08-31 20:38:40', '2015-09-02 00:58:33'),
(7, 'fa-circle-o', 'Tất cả bài viết', 'tat-ca-bai-viet', '', 'admin.post.index', 'list_posts', 3, 1, 1, '2015-08-31 20:39:02', '2015-09-01 23:43:24'),
(8, 'fa-circle-o', 'Danh mục', 'danh-muc', '', 'admin.cat.index', 'list_cats', 3, 2, 1, '2015-08-31 20:39:23', '2015-09-02 00:59:16'),
(9, 'fa-circle-o', 'Thẻ', 'the', '', 'admin.tag.index', 'list_tags', 3, 3, 1, '2015-08-31 20:39:46', '2015-09-02 00:59:33'),
(10, 'fa-circle-o', 'Admin menu', 'admin-menu', '', 'admin.admin_menu.index', 'manage_admin_menus', 11, 2, 1, '2015-08-31 20:40:34', '2015-09-04 19:01:02'),
(11, 'fa-wrench', 'Cài đặt', 'cai-dat', '', '', 'manage_settings', 0, 13, 1, '2015-08-31 20:40:51', '2015-09-29 04:44:43'),
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
(32, 'fa-circle-o', 'Danh sách Tour', 'danh-sach-tour', '', 'admin.tours.index', 'read', 30, 2, 1, '2015-09-16 00:34:09', '2015-09-16 00:35:05'),
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
