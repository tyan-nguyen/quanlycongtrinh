-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 06, 2024 at 03:29 AM
-- Server version: 5.7.40
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `qlvt_3`
--

-- --------------------------------------------------------

--
-- Table structure for table `auth_assignment`
--

DROP TABLE IF EXISTS `auth_assignment`;
CREATE TABLE IF NOT EXISTS `auth_assignment` (
  `item_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`item_name`,`user_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `auth_assignment`
--

INSERT INTO `auth_assignment` (`item_name`, `user_id`, `created_at`) VALUES
('Admin', 1, 1556454369),
('Admin', 8, 1713233584),
('Default', 1, 1556454369),
('Default', 2, 1712216542),
('Default', 3, 1712216581),
('Default', 8, 1713233584),
('DuyetPhieuXuatKho', 4, 1712216618),
('DuyetPhieuXuatKho', 5, 1712216789),
('DuyetPhieuXuatKho', 8, 1713233584),
('QuanLyCongTrinh', 6, 1712216845),
('QuanLyCongTrinh', 7, 1712216886),
('QuanLyCongTrinh', 8, 1713233584),
('TaoPhieuXuatKho', 2, 1712216542),
('TaoPhieuXuatKho', 3, 1712216581),
('TaoPhieuXuatKho', 8, 1713233584);

-- --------------------------------------------------------

--
-- Table structure for table `auth_item`
--

DROP TABLE IF EXISTS `auth_item`;
CREATE TABLE IF NOT EXISTS `auth_item` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `type` int(11) NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `rule_name` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `data` text COLLATE utf8_unicode_ci,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `group_code` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`name`),
  KEY `rule_name` (`rule_name`),
  KEY `idx-auth_item-type` (`type`),
  KEY `fk_auth_item_group_code` (`group_code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `auth_item`
--

INSERT INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`, `group_code`) VALUES
('/*', 3, NULL, NULL, NULL, 1426062189, 1426062189, NULL),
('/admin/*', 3, NULL, NULL, NULL, 1555604426, 1555604426, NULL),
('/admin/catelogies/*', 3, NULL, NULL, NULL, 1664291122, 1664291122, NULL),
('/admin/catelogies/bulk-delete', 3, NULL, NULL, NULL, 1664291122, 1664291122, NULL),
('/admin/catelogies/create', 3, NULL, NULL, NULL, 1664291122, 1664291122, NULL),
('/admin/catelogies/delete', 3, NULL, NULL, NULL, 1664291122, 1664291122, NULL),
('/admin/catelogies/index', 3, NULL, NULL, NULL, 1664291122, 1664291122, NULL),
('/admin/catelogies/update', 3, NULL, NULL, NULL, 1664291122, 1664291122, NULL),
('/admin/catelogies/view', 3, NULL, NULL, NULL, 1664291122, 1664291122, NULL),
('/admin/default/*', 3, NULL, NULL, NULL, 1570283031, 1570283031, NULL),
('/admin/default/index', 3, NULL, NULL, NULL, 1570283031, 1570283031, NULL),
('/admin/links/*', 3, NULL, NULL, NULL, 1664291122, 1664291122, NULL),
('/admin/links/bulk-delete', 3, NULL, NULL, NULL, 1664291122, 1664291122, NULL),
('/admin/links/create', 3, NULL, NULL, NULL, 1664291122, 1664291122, NULL),
('/admin/links/delete', 3, NULL, NULL, NULL, 1664291122, 1664291122, NULL),
('/admin/links/index', 3, NULL, NULL, NULL, 1664291122, 1664291122, NULL),
('/admin/links/update', 3, NULL, NULL, NULL, 1664291122, 1664291122, NULL),
('/admin/links/view', 3, NULL, NULL, NULL, 1664291122, 1664291122, NULL),
('/admin/news/*', 3, NULL, NULL, NULL, 1664291122, 1664291122, NULL),
('/admin/news/bulk-delete', 3, NULL, NULL, NULL, 1664291122, 1664291122, NULL),
('/admin/news/create', 3, NULL, NULL, NULL, 1664291122, 1664291122, NULL),
('/admin/news/del-folder-not-used', 3, NULL, NULL, NULL, 1664291122, 1664291122, NULL),
('/admin/news/delete', 3, NULL, NULL, NULL, 1664291122, 1664291122, NULL),
('/admin/news/index', 3, NULL, NULL, NULL, 1664291122, 1664291122, NULL),
('/admin/news/update', 3, NULL, NULL, NULL, 1664291122, 1664291122, NULL),
('/admin/news/view', 3, NULL, NULL, NULL, 1664291122, 1664291122, NULL),
('/admin/settings/*', 3, NULL, NULL, NULL, 1664291122, 1664291122, NULL),
('/admin/settings/bulk-delete', 3, NULL, NULL, NULL, 1664291122, 1664291122, NULL),
('/admin/settings/create', 3, NULL, NULL, NULL, 1664291122, 1664291122, NULL),
('/admin/settings/delete', 3, NULL, NULL, NULL, 1664291122, 1664291122, NULL),
('/admin/settings/index', 3, NULL, NULL, NULL, 1664291122, 1664291122, NULL),
('/admin/settings/update', 3, NULL, NULL, NULL, 1664291122, 1664291122, NULL),
('/admin/settings/view', 3, NULL, NULL, NULL, 1664291122, 1664291122, NULL),
('/admin/socials/*', 3, NULL, NULL, NULL, 1664291122, 1664291122, NULL),
('/admin/socials/bulk-delete', 3, NULL, NULL, NULL, 1664291122, 1664291122, NULL),
('/admin/socials/create', 3, NULL, NULL, NULL, 1664291122, 1664291122, NULL),
('/admin/socials/delete', 3, NULL, NULL, NULL, 1664291122, 1664291122, NULL),
('/admin/socials/index', 3, NULL, NULL, NULL, 1664291122, 1664291122, NULL),
('/admin/socials/update', 3, NULL, NULL, NULL, 1664291122, 1664291122, NULL),
('/admin/socials/view', 3, NULL, NULL, NULL, 1664291122, 1664291122, NULL),
('/admin/thong-ke-truy-cap/*', 3, NULL, NULL, NULL, 1586086805, 1586086805, NULL),
('/admin/thong-ke-truy-cap/bulk-delete', 3, NULL, NULL, NULL, 1586086805, 1586086805, NULL),
('/admin/thong-ke-truy-cap/create', 3, NULL, NULL, NULL, 1586086805, 1586086805, NULL),
('/admin/thong-ke-truy-cap/delete', 3, NULL, NULL, NULL, 1586086805, 1586086805, NULL),
('/admin/thong-ke-truy-cap/index', 3, NULL, NULL, NULL, 1586086805, 1586086805, NULL),
('/admin/thong-ke-truy-cap/update', 3, NULL, NULL, NULL, 1586086805, 1586086805, NULL),
('/admin/thong-ke-truy-cap/view', 3, NULL, NULL, NULL, 1586086805, 1586086805, NULL),
('/gii/*', 3, NULL, NULL, NULL, 1426062189, 1426062189, NULL),
('/gii/default/*', 3, NULL, NULL, NULL, 1426062189, 1426062189, NULL),
('/gii/default/action', 3, NULL, NULL, NULL, 1426062189, 1426062189, NULL),
('/gii/default/diff', 3, NULL, NULL, NULL, 1426062189, 1426062189, NULL),
('/gii/default/index', 3, NULL, NULL, NULL, 1426062189, 1426062189, NULL),
('/gii/default/preview', 3, NULL, NULL, NULL, 1426062189, 1426062189, NULL),
('/gii/default/view', 3, NULL, NULL, NULL, 1426062189, 1426062189, NULL),
('/gridview/*', 3, NULL, NULL, NULL, 1570121547, 1570121547, NULL),
('/gridview/export/*', 3, NULL, NULL, NULL, 1570121547, 1570121547, NULL),
('/gridview/export/download', 3, NULL, NULL, NULL, 1570121547, 1570121547, NULL),
('/page/*', 3, NULL, NULL, NULL, 1664291122, 1664291122, NULL),
('/page/about-us', 3, NULL, NULL, NULL, 1664291122, 1664291122, NULL),
('/page/captcha', 3, NULL, NULL, NULL, 1664291122, 1664291122, NULL),
('/page/contact', 3, NULL, NULL, NULL, 1664291122, 1664291122, NULL),
('/site/*', 3, NULL, NULL, NULL, 1555604424, 1555604424, NULL),
('/site/cat', 3, NULL, NULL, NULL, 1664291122, 1664291122, NULL),
('/site/index', 3, NULL, NULL, NULL, 1555604425, 1555604425, NULL),
('/site/news', 3, NULL, NULL, NULL, 1664291122, 1664291122, NULL),
('/site/newsletter', 3, NULL, NULL, NULL, 1664291122, 1664291122, NULL),
('/site/not-found', 3, NULL, NULL, NULL, 1664291122, 1664291122, NULL),
('/site/search', 3, NULL, NULL, NULL, 1664291122, 1664291122, NULL),
('/user-management/*', 3, NULL, NULL, NULL, 1426062189, 1426062189, NULL),
('/user-management/auth-item-group/*', 3, NULL, NULL, NULL, 1426062189, 1426062189, NULL),
('/user-management/auth-item-group/bulk-activate', 3, NULL, NULL, NULL, 1426062189, 1426062189, NULL),
('/user-management/auth-item-group/bulk-deactivate', 3, NULL, NULL, NULL, 1426062189, 1426062189, NULL),
('/user-management/auth-item-group/bulk-delete', 3, NULL, NULL, NULL, 1426062189, 1426062189, NULL),
('/user-management/auth-item-group/create', 3, NULL, NULL, NULL, 1426062189, 1426062189, NULL),
('/user-management/auth-item-group/delete', 3, NULL, NULL, NULL, 1426062189, 1426062189, NULL),
('/user-management/auth-item-group/grid-page-size', 3, NULL, NULL, NULL, 1426062189, 1426062189, NULL),
('/user-management/auth-item-group/grid-sort', 3, NULL, NULL, NULL, 1426062189, 1426062189, NULL),
('/user-management/auth-item-group/index', 3, NULL, NULL, NULL, 1426062189, 1426062189, NULL),
('/user-management/auth-item-group/toggle-attribute', 3, NULL, NULL, NULL, 1426062189, 1426062189, NULL),
('/user-management/auth-item-group/update', 3, NULL, NULL, NULL, 1426062189, 1426062189, NULL),
('/user-management/auth-item-group/view', 3, NULL, NULL, NULL, 1426062189, 1426062189, NULL),
('/user-management/auth/*', 3, NULL, NULL, NULL, 1426062189, 1426062189, NULL),
('/user-management/auth/captcha', 3, NULL, NULL, NULL, 1426062189, 1426062189, NULL),
('/user-management/auth/change-own-password', 3, NULL, NULL, NULL, 1426062189, 1426062189, NULL),
('/user-management/auth/confirm-email', 3, NULL, NULL, NULL, 1426062189, 1426062189, NULL),
('/user-management/auth/confirm-email-receive', 3, NULL, NULL, NULL, 1426062189, 1426062189, NULL),
('/user-management/auth/confirm-registration-email', 3, NULL, NULL, NULL, 1426062189, 1426062189, NULL),
('/user-management/auth/login', 3, NULL, NULL, NULL, 1426062189, 1426062189, NULL),
('/user-management/auth/logout', 3, NULL, NULL, NULL, 1426062189, 1426062189, NULL),
('/user-management/auth/password-recovery', 3, NULL, NULL, NULL, 1426062189, 1426062189, NULL),
('/user-management/auth/password-recovery-receive', 3, NULL, NULL, NULL, 1426062189, 1426062189, NULL),
('/user-management/auth/registration', 3, NULL, NULL, NULL, 1426062189, 1426062189, NULL),
('/user-management/permission/*', 3, NULL, NULL, NULL, 1426062189, 1426062189, NULL),
('/user-management/permission/bulk-activate', 3, NULL, NULL, NULL, 1426062189, 1426062189, NULL),
('/user-management/permission/bulk-deactivate', 3, NULL, NULL, NULL, 1426062189, 1426062189, NULL),
('/user-management/permission/bulk-delete', 3, NULL, NULL, NULL, 1426062189, 1426062189, NULL),
('/user-management/permission/create', 3, NULL, NULL, NULL, 1426062189, 1426062189, NULL),
('/user-management/permission/delete', 3, NULL, NULL, NULL, 1426062189, 1426062189, NULL),
('/user-management/permission/grid-page-size', 3, NULL, NULL, NULL, 1426062189, 1426062189, NULL),
('/user-management/permission/grid-sort', 3, NULL, NULL, NULL, 1426062189, 1426062189, NULL),
('/user-management/permission/index', 3, NULL, NULL, NULL, 1426062189, 1426062189, NULL),
('/user-management/permission/refresh-routes', 3, NULL, NULL, NULL, 1426062189, 1426062189, NULL),
('/user-management/permission/set-child-permissions', 3, NULL, NULL, NULL, 1426062189, 1426062189, NULL),
('/user-management/permission/set-child-routes', 3, NULL, NULL, NULL, 1426062189, 1426062189, NULL),
('/user-management/permission/toggle-attribute', 3, NULL, NULL, NULL, 1426062189, 1426062189, NULL),
('/user-management/permission/update', 3, NULL, NULL, NULL, 1426062189, 1426062189, NULL),
('/user-management/permission/view', 3, NULL, NULL, NULL, 1426062189, 1426062189, NULL),
('/user-management/role/*', 3, NULL, NULL, NULL, 1426062189, 1426062189, NULL),
('/user-management/role/bulk-activate', 3, NULL, NULL, NULL, 1426062189, 1426062189, NULL),
('/user-management/role/bulk-deactivate', 3, NULL, NULL, NULL, 1426062189, 1426062189, NULL),
('/user-management/role/bulk-delete', 3, NULL, NULL, NULL, 1426062189, 1426062189, NULL),
('/user-management/role/create', 3, NULL, NULL, NULL, 1426062189, 1426062189, NULL),
('/user-management/role/delete', 3, NULL, NULL, NULL, 1426062189, 1426062189, NULL),
('/user-management/role/grid-page-size', 3, NULL, NULL, NULL, 1426062189, 1426062189, NULL),
('/user-management/role/grid-sort', 3, NULL, NULL, NULL, 1426062189, 1426062189, NULL),
('/user-management/role/index', 3, NULL, NULL, NULL, 1426062189, 1426062189, NULL),
('/user-management/role/set-child-permissions', 3, NULL, NULL, NULL, 1426062189, 1426062189, NULL),
('/user-management/role/set-child-roles', 3, NULL, NULL, NULL, 1426062189, 1426062189, NULL),
('/user-management/role/toggle-attribute', 3, NULL, NULL, NULL, 1426062189, 1426062189, NULL),
('/user-management/role/update', 3, NULL, NULL, NULL, 1426062189, 1426062189, NULL),
('/user-management/role/view', 3, NULL, NULL, NULL, 1426062189, 1426062189, NULL),
('/user-management/user-permission/*', 3, NULL, NULL, NULL, 1426062189, 1426062189, NULL),
('/user-management/user-permission/set', 3, NULL, NULL, NULL, 1426062189, 1426062189, NULL),
('/user-management/user-permission/set-roles', 3, NULL, NULL, NULL, 1426062189, 1426062189, NULL),
('/user-management/user-visit-log/*', 3, NULL, NULL, NULL, 1426062189, 1426062189, NULL),
('/user-management/user-visit-log/bulk-activate', 3, NULL, NULL, NULL, 1426062189, 1426062189, NULL),
('/user-management/user-visit-log/bulk-deactivate', 3, NULL, NULL, NULL, 1426062189, 1426062189, NULL),
('/user-management/user-visit-log/bulk-delete', 3, NULL, NULL, NULL, 1426062189, 1426062189, NULL),
('/user-management/user-visit-log/create', 3, NULL, NULL, NULL, 1426062189, 1426062189, NULL),
('/user-management/user-visit-log/delete', 3, NULL, NULL, NULL, 1426062189, 1426062189, NULL),
('/user-management/user-visit-log/grid-page-size', 3, NULL, NULL, NULL, 1426062189, 1426062189, NULL),
('/user-management/user-visit-log/grid-sort', 3, NULL, NULL, NULL, 1426062189, 1426062189, NULL),
('/user-management/user-visit-log/index', 3, NULL, NULL, NULL, 1426062189, 1426062189, NULL),
('/user-management/user-visit-log/toggle-attribute', 3, NULL, NULL, NULL, 1426062189, 1426062189, NULL),
('/user-management/user-visit-log/update', 3, NULL, NULL, NULL, 1426062189, 1426062189, NULL),
('/user-management/user-visit-log/view', 3, NULL, NULL, NULL, 1426062189, 1426062189, NULL),
('/user-management/user/*', 3, NULL, NULL, NULL, 1426062189, 1426062189, NULL),
('/user-management/user/bulk-activate', 3, NULL, NULL, NULL, 1426062189, 1426062189, NULL),
('/user-management/user/bulk-deactivate', 3, NULL, NULL, NULL, 1426062189, 1426062189, NULL),
('/user-management/user/bulk-delete', 3, NULL, NULL, NULL, 1426062189, 1426062189, NULL),
('/user-management/user/change-password', 3, NULL, NULL, NULL, 1426062189, 1426062189, NULL),
('/user-management/user/create', 3, NULL, NULL, NULL, 1426062189, 1426062189, NULL),
('/user-management/user/delete', 3, NULL, NULL, NULL, 1426062189, 1426062189, NULL),
('/user-management/user/grid-page-size', 3, NULL, NULL, NULL, 1426062189, 1426062189, NULL),
('/user-management/user/grid-sort', 3, NULL, NULL, NULL, 1426062189, 1426062189, NULL),
('/user-management/user/index', 3, NULL, NULL, NULL, 1426062189, 1426062189, NULL),
('/user-management/user/toggle-attribute', 3, NULL, NULL, NULL, 1426062189, 1426062189, NULL),
('/user-management/user/update', 3, NULL, NULL, NULL, 1426062189, 1426062189, NULL),
('/user-management/user/view', 3, NULL, NULL, NULL, 1426062189, 1426062189, NULL),
('Admin', 1, 'Admin', NULL, NULL, 1426062189, 1426062189, NULL),
('assignRolesToUsers', 2, 'Assign roles to users', NULL, NULL, 1426062189, 1426062189, 'userManagement'),
('bindUserToIp', 2, 'Bind user to IP', NULL, NULL, 1426062189, 1426062189, 'userManagement'),
('cauhinh', 2, 'Cấu hình', NULL, NULL, 1570156160, 1570156160, 'userCommonPermissions'),
('changeOwnPassword', 2, 'Change own password', NULL, NULL, 1426062189, 1426062189, 'userCommonPermissions'),
('changeUserPassword', 2, 'Change user password', NULL, NULL, 1426062189, 1426062189, 'userManagement'),
('commonPermission', 2, 'Common permission', NULL, NULL, 1426062188, 1426062188, NULL),
('createUsers', 2, 'Create users', NULL, NULL, 1426062189, 1426062189, 'userManagement'),
('dangtin', 2, 'Đăng tin', NULL, NULL, 1570156034, 1570156034, 'userCommonPermissions'),
('Default', 1, 'Mặc định', NULL, NULL, 1555604497, 1712111041, NULL),
('deleteUsers', 2, 'Delete users', NULL, NULL, 1426062189, 1426062189, 'userManagement'),
('DuyetPhieuXuatKho', 1, 'Duyệt phiếu xuất kho', NULL, NULL, 1712113481, 1712113542, NULL),
('editUserEmail', 2, 'Edit user email', NULL, NULL, 1426062189, 1426062189, 'userManagement'),
('editUsers', 2, 'Edit users', NULL, NULL, 1426062189, 1426062189, 'userManagement'),
('per_dashboard', 2, 'Access Dashboard', NULL, NULL, 1664291118, 1664291118, 'userManagement'),
('permission_thongketruycap', 2, 'Thống kê truy cập', NULL, NULL, 1586086798, 1586086798, 'userCommonPermissions'),
('qltaikhoan', 2, 'Quản lý tài khoản', NULL, NULL, 1570156229, 1570156229, 'userManagement'),
('QuanLyCongTrinh', 1, 'Quản lý công trình', NULL, NULL, 1712113565, 1712113565, NULL),
('TaoPhieuXuatKho', 1, 'Tạo phiếu xuất kho', NULL, NULL, 1712113519, 1712113701, NULL),
('truycaptrangadmin', 2, 'Truy cập trang admin', NULL, NULL, 1570121444, 1570121444, 'userCommonPermissions'),
('user-default', 2, 'user-default', NULL, NULL, 1555604419, 1555604419, 'userCommonPermissions'),
('viewRegistrationIp', 2, 'View registration IP', NULL, NULL, 1426062189, 1426062189, 'userManagement'),
('viewUserEmail', 2, 'View user email', NULL, NULL, 1426062189, 1426062189, 'userManagement'),
('viewUserRoles', 2, 'View user roles', NULL, NULL, 1426062189, 1426062189, 'userManagement'),
('viewUsers', 2, 'View users', NULL, NULL, 1426062189, 1426062189, 'userManagement'),
('viewVisitLog', 2, 'View visit log', NULL, NULL, 1426062189, 1426062189, 'userManagement');

-- --------------------------------------------------------

--
-- Table structure for table `auth_item_child`
--

DROP TABLE IF EXISTS `auth_item_child`;
CREATE TABLE IF NOT EXISTS `auth_item_child` (
  `parent` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `child` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`parent`,`child`),
  KEY `child` (`child`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `auth_item_child`
--

INSERT INTO `auth_item_child` (`parent`, `child`) VALUES
('per_dashboard', '/admin/*'),
('per_dashboard', '/admin/catelogies/*'),
('per_dashboard', '/admin/default/*'),
('truycaptrangadmin', '/admin/default/*'),
('user-default', '/admin/default/*'),
('user-default', '/admin/default/index'),
('per_dashboard', '/admin/links/*'),
('per_dashboard', '/admin/news/*'),
('per_dashboard', '/admin/settings/*'),
('per_dashboard', '/admin/socials/*'),
('per_dashboard', '/admin/thong-ke-truy-cap/*'),
('permission_thongketruycap', '/admin/thong-ke-truy-cap/*'),
('user-default', '/site/*'),
('qltaikhoan', '/user-management/*'),
('changeOwnPassword', '/user-management/auth/change-own-password'),
('assignRolesToUsers', '/user-management/user-permission/set'),
('assignRolesToUsers', '/user-management/user-permission/set-roles'),
('viewVisitLog', '/user-management/user-visit-log/grid-page-size'),
('viewVisitLog', '/user-management/user-visit-log/index'),
('viewVisitLog', '/user-management/user-visit-log/view'),
('editUsers', '/user-management/user/bulk-activate'),
('editUsers', '/user-management/user/bulk-deactivate'),
('deleteUsers', '/user-management/user/bulk-delete'),
('changeUserPassword', '/user-management/user/change-password'),
('createUsers', '/user-management/user/create'),
('deleteUsers', '/user-management/user/delete'),
('viewUsers', '/user-management/user/grid-page-size'),
('viewUsers', '/user-management/user/index'),
('editUsers', '/user-management/user/update'),
('viewUsers', '/user-management/user/view'),
('Admin', 'assignRolesToUsers'),
('Admin', 'cauhinh'),
('Admin', 'changeOwnPassword'),
('user-default', 'changeOwnPassword'),
('Admin', 'changeUserPassword'),
('Admin', 'createUsers'),
('Admin', 'dangtin'),
('DuyetPhieuXuatKho', 'Default'),
('QuanLyCongTrinh', 'Default'),
('TaoPhieuXuatKho', 'Default'),
('Admin', 'deleteUsers'),
('Admin', 'editUsers'),
('Admin', 'permission_thongketruycap'),
('Default', 'permission_thongketruycap'),
('Admin', 'qltaikhoan'),
('Admin', 'truycaptrangadmin'),
('Default', 'truycaptrangadmin'),
('Admin', 'user-default'),
('Default', 'user-default'),
('editUserEmail', 'viewUserEmail'),
('assignRolesToUsers', 'viewUserRoles'),
('Admin', 'viewUsers'),
('assignRolesToUsers', 'viewUsers'),
('changeUserPassword', 'viewUsers'),
('createUsers', 'viewUsers'),
('deleteUsers', 'viewUsers'),
('editUsers', 'viewUsers');

-- --------------------------------------------------------

--
-- Table structure for table `auth_item_group`
--

DROP TABLE IF EXISTS `auth_item_group`;
CREATE TABLE IF NOT EXISTS `auth_item_group` (
  `code` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `auth_item_group`
--

INSERT INTO `auth_item_group` (`code`, `name`, `created_at`, `updated_at`) VALUES
('userCommonPermissions', 'User common permission', 1426062189, 1426062189),
('userManagement', 'User management', 1426062189, 1426062189);

-- --------------------------------------------------------

--
-- Table structure for table `auth_rule`
--

DROP TABLE IF EXISTS `auth_rule`;
CREATE TABLE IF NOT EXISTS `auth_rule` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `data` text COLLATE utf8_unicode_ci,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cong_trinh`
--

DROP TABLE IF EXISTS `cong_trinh`;
CREATE TABLE IF NOT EXISTS `cong_trinh` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ten_cong_trinh` varchar(255) NOT NULL,
  `dia_diem` varchar(255) DEFAULT NULL,
  `tg_bat_dau` date DEFAULT NULL,
  `tg_ket_thuc` date DEFAULT NULL,
  `p_id` int(11) DEFAULT NULL,
  `trang_thai` varchar(20) DEFAULT NULL,
  `trang_thai_boc_tach` varchar(20) DEFAULT NULL,
  `ghi_chu` text,
  `create_date` datetime DEFAULT NULL,
  `create_user` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `p_id` (`p_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cong_trinh`
--

INSERT INTO `cong_trinh` (`id`, `ten_cong_trinh`, `dia_diem`, `tg_bat_dau`, `tg_ket_thuc`, `p_id`, `trang_thai`, `trang_thai_boc_tach`, `ghi_chu`, `create_date`, `create_user`) VALUES
(1, 'Công trình thảm nhựa chống thấm đường Cây ăn trái', 'Càng Long, Châu Thành, tỉnh Trà Vinh', '2024-07-03', '2024-08-02', NULL, 'KHOI_TAO', 'SOAN_THAO', 'Đây là ghi chú cho công trình 11', '2024-03-07 05:44:36', 1),
(2, 'Công trình B', 'Châu Thành', '2024-04-19', '2024-03-29', 1, 'HOAN_THANH', 'SOAN_THAO', '', '2024-03-12 08:36:23', 1),
(3, 'Công trình C', 'Châu Thành', '2024-03-16', '2024-03-31', 1, 'THUC_HIEN', 'SOAN_THAO', NULL, '2024-03-12 16:32:29', 1),
(4, 'Công trình D', 'Châu Đốc, An Giang', '2024-03-10', '2024-05-04', NULL, '0', 'SOAN_THAO', NULL, '2024-03-12 16:34:57', 1),
(5, 'Công trình E', 'Châu Đốc, An Giang', '2024-03-15', '2024-04-28', 4, '0', 'SOAN_THAO', NULL, '2024-03-12 17:14:23', 1),
(6, 'Công trình J', 'Vĩnh Long', '2024-03-09', '2024-04-27', NULL, '0', 'SOAN_THAO', NULL, '2024-03-12 18:12:17', 1),
(7, 'Dự án 123', 'Càng Long', '2024-04-10', '2024-04-11', NULL, 'KHOI_TAO', 'SOAN_THAO', '', '2024-04-10 13:41:31', 1),
(8, 'Công trình 123-1', 'Càng Long', '2024-04-10', '2024-04-12', 7, 'KHOI_TAO', 'SOAN_THAO', 'Hạng mục 123 của công trình 123', '2024-04-10 13:51:52', 1),
(9, 'Công trình mới', 'TP Trà Vinh', '2024-04-10', '2024-04-12', NULL, 'KHOI_TAO', 'SOAN_THAO', 'ghi chú ct..', '2024-04-10 14:02:44', 1),
(10, 'Công trình Tý An', 'Càng Long', '2024-05-01', '2024-05-09', NULL, 'KHOI_TAO', 'SOAN_THAO', '', '2024-04-30 14:39:11', 1);

-- --------------------------------------------------------

--
-- Table structure for table `cong_trinh_phan_quyen`
--

DROP TABLE IF EXISTS `cong_trinh_phan_quyen`;
CREATE TABLE IF NOT EXISTS `cong_trinh_phan_quyen` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_cong_trinh` int(11) NOT NULL,
  `id_nguoi_dung` int(11) NOT NULL,
  `quyen` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `ngung_phu_trach` tinyint(1) DEFAULT NULL,
  `create_date` datetime DEFAULT NULL,
  `create_user` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_cong_trinh` (`id_cong_trinh`),
  KEY `id_nguoi_dung` (`id_nguoi_dung`)
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `cong_trinh_phan_quyen`
--

INSERT INTO `cong_trinh_phan_quyen` (`id`, `id_cong_trinh`, `id_nguoi_dung`, `quyen`, `ngung_phu_trach`, `create_date`, `create_user`) VALUES
(10, 1, 2, 'TAO_XUAT_KHO', 0, '2024-04-04 22:24:42', 1),
(19, 1, 3, 'TAO_XUAT_KHO', 0, '2024-04-05 14:45:00', 1),
(23, 1, 2, 'DUYET_XUAT_KHO', 0, '2024-04-05 14:49:15', 1),
(24, 2, 7, 'DUYET_XUAT_KHO', 0, '2024-04-05 14:49:22', 1),
(25, 1, 4, 'QUAN_LY_CHUNG', 0, '2024-04-08 15:21:22', 1),
(26, 1, 6, 'QUAN_LY_CHUNG', 0, '2024-04-08 15:21:22', 1),
(27, 1, 5, 'DUYET_XUAT_KHO', 0, '2024-04-08 15:33:03', 1),
(28, 9, 1, 'QUAN_LY_CHUNG', 0, '2024-04-10 14:04:20', 1),
(29, 9, 7, 'QUAN_LY_CHUNG', 0, '2024-04-10 14:04:20', 1),
(30, 9, 2, 'TAO_XUAT_KHO', 0, '2024-04-10 14:04:20', 1),
(31, 9, 3, 'TAO_XUAT_KHO', 0, '2024-04-10 14:04:20', 1),
(32, 9, 4, 'DUYET_XUAT_KHO', 0, '2024-04-10 14:04:20', 1),
(33, 9, 5, 'DUYET_XUAT_KHO', 0, '2024-04-10 14:04:20', 1),
(34, 1, 1, 'QUAN_LY_CHUNG', 0, '2024-04-15 15:12:45', 1),
(36, 3, 8, 'DUYET_XUAT_KHO', 0, '2024-04-16 10:07:57', 1),
(37, 1, 8, 'TAO_XUAT_KHO', 0, '2024-04-27 15:14:09', 1),
(38, 1, 1, 'DUYET_XUAT_KHO', 0, '2024-04-29 09:40:30', 1),
(40, 10, 2, 'TAO_XUAT_KHO', 0, '2024-04-30 14:39:27', 1),
(41, 10, 4, 'TAO_XUAT_KHO', 1, '2024-04-30 14:39:27', 1),
(42, 10, 1, 'TAO_XUAT_KHO', 0, '2024-04-30 14:50:12', 1),
(43, 10, 8, 'DUYET_XUAT_KHO', 0, '2024-05-02 08:50:28', 1),
(44, 10, 8, 'TAO_XUAT_KHO', 1, '2024-05-04 10:33:29', 1),
(45, 10, 1, 'DUYET_XUAT_KHO', 0, '2024-05-04 14:37:02', 1),
(46, 10, 1, 'QUAN_LY_CHUNG', 0, '2024-05-06 10:12:27', 1);

-- --------------------------------------------------------

--
-- Table structure for table `don_vi_tinh`
--

DROP TABLE IF EXISTS `don_vi_tinh`;
CREATE TABLE IF NOT EXISTS `don_vi_tinh` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ma_dvt` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `ten_dvt` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `don_vi_tinh`
--

INSERT INTO `don_vi_tinh` (`id`, `ma_dvt`, `ten_dvt`) VALUES
(1, 'Tấn', 'Tấn'),
(2, 'Kg', 'Kilogram'),
(3, 'cái', 'cái'),
(4, 'bộ', 'bộ'),
(5, 'm3', 'm3'),
(6, 'm', 'm'),
(7, 'kg', 'kg'),
(8, 'đoạn', 'đoạn'),
(9, 'gối', 'Gối'),
(10, 'm2', 'm2'),
(11, 'cây', 'cây'),
(12, 'cọc', 'cọc'),
(13, 'cột', 'cột'),
(14, 'tủ', 'tủ'),
(15, 'tấm', 'tấm');

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

DROP TABLE IF EXISTS `history`;
CREATE TABLE IF NOT EXISTS `history` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `loai` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `id_tham_chieu` int(11) NOT NULL,
  `noi_dung` text COLLATE utf8_unicode_ci NOT NULL,
  `thoi_gian_tao` datetime DEFAULT NULL,
  `nguoi_tao` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ke_hoach_phan_quyen`
--

DROP TABLE IF EXISTS `ke_hoach_phan_quyen`;
CREATE TABLE IF NOT EXISTS `ke_hoach_phan_quyen` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_ke_hoach` int(11) NOT NULL,
  `id_nguoi_dung` int(11) NOT NULL,
  `quyen` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `ngung_phu_trach` tinyint(1) DEFAULT NULL,
  `create_date` datetime DEFAULT NULL,
  `create_user` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_cong_trinh` (`id_ke_hoach`),
  KEY `id_nguoi_dung` (`id_nguoi_dung`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ke_hoach_xuat_kho`
--

DROP TABLE IF EXISTS `ke_hoach_xuat_kho`;
CREATE TABLE IF NOT EXISTS `ke_hoach_xuat_kho` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `so_phieu` int(11) DEFAULT NULL,
  `nam` int(4) DEFAULT NULL,
  `thoi_gian_yeu_cau` datetime DEFAULT NULL,
  `id_cong_trinh` int(11) NOT NULL,
  `id_bo_phan_yc` int(11) DEFAULT NULL,
  `ly_do` text,
  `ngay_nghiem_thu` date DEFAULT NULL,
  `ghi_chu_nghiem_thu` text,
  `id_nguoi_nghiem_thu` int(11) DEFAULT NULL,
  `thoi_gian_nhap_nghiem_thu` datetime DEFAULT NULL,
  `nguoi_ky` text,
  `id_nguoi_gui` int(11) DEFAULT NULL,
  `id_nguoi_duyet` int(11) DEFAULT NULL,
  `trang_thai` varchar(20) DEFAULT NULL,
  `y_kien_nguoi_gui` text,
  `y_kien_nguoi_duyet` text,
  `thoi_gian_duyet` datetime DEFAULT NULL,
  `tao_khong_qui_trinh` tinyint(1) DEFAULT NULL,
  `xuat_khong_qui_trinh` tinyint(1) DEFAULT NULL,
  `edit_mode` tinyint(1) DEFAULT NULL,
  `create_date` datetime DEFAULT NULL,
  `create_user` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `yeu_cau` (`id_bo_phan_yc`),
  KEY `nguoi_duyet` (`id_nguoi_duyet`),
  KEY `cong_trinh` (`id_cong_trinh`)
) ENGINE=InnoDB AUTO_INCREMENT=149 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ke_hoach_xuat_kho`
--

INSERT INTO `ke_hoach_xuat_kho` (`id`, `so_phieu`, `nam`, `thoi_gian_yeu_cau`, `id_cong_trinh`, `id_bo_phan_yc`, `ly_do`, `ngay_nghiem_thu`, `ghi_chu_nghiem_thu`, `id_nguoi_nghiem_thu`, `thoi_gian_nhap_nghiem_thu`, `nguoi_ky`, `id_nguoi_gui`, `id_nguoi_duyet`, `trang_thai`, `y_kien_nguoi_gui`, `y_kien_nguoi_duyet`, `thoi_gian_duyet`, `tao_khong_qui_trinh`, `xuat_khong_qui_trinh`, `edit_mode`, `create_date`, `create_user`) VALUES
(1, NULL, 2024, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'BAN_NHAP', NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-22 15:35:25', 8),
(121, NULL, 2024, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'BAN_NHAP', NULL, NULL, NULL, NULL, 0, NULL, '2024-04-24 08:45:23', 8),
(123, NULL, 2024, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'BAN_NHAP', NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-26 17:08:53', 1),
(124, NULL, 2024, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'BAN_NHAP', NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-26 17:09:05', 1),
(125, NULL, 2024, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'BAN_NHAP', NULL, NULL, NULL, 1, 0, NULL, '2024-04-29 09:02:24', 8),
(126, NULL, 2024, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'BAN_NHAP', NULL, NULL, NULL, 1, 0, NULL, '2024-04-29 09:02:53', 8),
(127, NULL, 2024, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'BAN_NHAP', NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-29 09:03:27', 8),
(128, NULL, 2024, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'BAN_NHAP', NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-29 09:05:07', 8),
(129, NULL, 2024, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'BAN_NHAP', NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-29 09:05:15', 8),
(130, NULL, 2024, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'BAN_NHAP', NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-29 09:33:12', 8),
(131, NULL, 2024, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'BAN_NHAP', NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-29 09:33:34', 8),
(132, NULL, 2024, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'BAN_NHAP', NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-29 09:36:12', 8),
(133, NULL, 2024, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'BAN_NHAP', NULL, NULL, NULL, 0, 0, NULL, '2024-04-29 09:40:05', 8),
(134, NULL, 2024, '2024-04-29 10:31:57', 1, 2, 'fdasf', NULL, NULL, NULL, NULL, NULL, 1, 1, 'DA_DUYET', 'fasdf', 'fasdf', '2024-04-29 10:33:46', 1, 0, NULL, '2024-04-29 09:41:26', 1),
(135, NULL, 2024, '2024-04-29 10:16:04', 1, 3, 'fdasf', '2024-04-30', 'gioa hàng', 8, '2024-04-29 10:22:29', NULL, 8, 1, 'DA_HOAN_THANH', 'fsadf', 'Duyệt phiếu', '2024-04-29 10:22:04', 0, 0, NULL, '2024-04-29 10:15:29', 8),
(136, NULL, 2024, '2024-04-29 15:36:01', 1, 2, 'ádf', '2024-04-30', '2222', 1, '2024-04-29 16:41:33', NULL, 8, 1, 'DA_HOAN_THANH', 'fasdf', 'ávasvas', '2024-04-29 15:44:31', 1, 0, NULL, '2024-04-29 14:59:05', 1),
(137, NULL, 2024, '2024-05-02 08:49:38', 10, 2, 'fsdafdas', '2024-05-02', 'đã nghiệm thu kế hoạch hoàn thành', 1, '2024-05-02 08:53:48', NULL, 1, 8, 'DA_HOAN_THANH', 'fadsfa', 'dsgsfdgdsg', '2024-05-02 08:50:52', 0, 1, NULL, '2024-04-30 15:23:37', 1),
(138, NULL, 2024, '2024-05-02 09:49:43', 10, 2, 'fs', '2024-05-02', 'fsafasf', 1, '2024-05-02 09:51:28', NULL, 1, 8, 'DA_HOAN_THANH', 'ff', 'ggg', '2024-05-02 09:50:44', 0, 0, NULL, '2024-05-02 09:48:58', 1),
(139, NULL, 2024, '2024-05-02 09:55:43', 10, 2, 'fasdf', NULL, NULL, NULL, NULL, NULL, 1, 8, 'DA_DUYET', 'fasfd', 'fadsfasfa', '2024-05-03 09:26:57', 0, 0, NULL, '2024-05-02 09:52:02', 1),
(140, NULL, 2024, '2024-05-04 13:43:57', 10, 4, 'dDS', NULL, NULL, NULL, NULL, NULL, 1, NULL, 'CHO_DUYET', 'Dads', NULL, NULL, 0, 0, NULL, '2024-05-02 16:07:57', 1),
(143, NULL, 2024, '2024-05-04 13:48:00', 10, 3, 'g', NULL, NULL, NULL, NULL, NULL, 8, 8, 'DA_DUYET', 'g', 'Duyệt tự động không qua qui trình', '2024-05-04 13:48:00', 1, 0, NULL, '2024-05-04 10:33:34', 8),
(144, NULL, 2024, '2024-05-04 13:51:25', 10, 3, 'fasf', NULL, NULL, NULL, NULL, NULL, 1, NULL, 'CHO_DUYET', 'fasf', NULL, NULL, 0, 0, NULL, '2024-05-04 13:51:14', 1),
(145, NULL, 2024, '2024-05-04 13:55:53', 10, 4, 'vv', NULL, NULL, NULL, NULL, NULL, 8, 8, 'DA_DUYET', 'vv', 'Duyệt tự động không qua qui trình', '2024-05-04 13:55:53', 1, 0, NULL, '2024-05-04 13:55:42', 8),
(146, NULL, 2024, '2024-05-04 13:57:01', 10, 3, 'cc', NULL, NULL, NULL, NULL, NULL, 8, 8, 'DA_DUYET', 'cc', 'Duyệt tự động không qua qui trình', '2024-05-04 13:57:01', 1, 0, NULL, '2024-05-04 13:56:35', 8),
(147, NULL, 2024, '2024-05-04 14:21:24', 10, 4, 'vv', NULL, NULL, NULL, NULL, NULL, 8, 8, 'DA_DUYET', 'vv', 'Duyệt tự động không qua qui trình', '2024-05-04 14:21:24', 1, 0, NULL, '2024-05-04 14:21:13', 8),
(148, NULL, 2024, NULL, 10, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'BAN_NHAP', NULL, NULL, NULL, 1, 0, NULL, '2024-05-04 14:52:35', 1);

-- --------------------------------------------------------

--
-- Table structure for table `loai_vat_tu`
--

DROP TABLE IF EXISTS `loai_vat_tu`;
CREATE TABLE IF NOT EXISTS `loai_vat_tu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ten_loai_vat_tu` varchar(255) NOT NULL,
  `create_date` datetime DEFAULT NULL,
  `create_user` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `loai_vat_tu`
--

INSERT INTO `loai_vat_tu` (`id`, `ten_loai_vat_tu`, `create_date`, `create_user`) VALUES
(1, 'Đá 201', '2024-03-07 09:16:13', 1),
(2, 'Cát 373', '2024-03-13 07:49:27', 1),
(3, 'Chưa phân loại', NULL, NULL),
(4, 'Bê tông nhựa', '2024-04-18 09:55:14', NULL),
(5, 'Bao bố', '2024-04-18 09:56:19', NULL),
(6, 'Biển báo', '2024-04-18 09:56:19', NULL),
(7, 'Cát', '2024-04-18 10:53:00', NULL),
(8, 'Đá', '2024-04-18 10:53:00', NULL),
(9, 'Cừ tràm', '2024-04-18 10:53:00', NULL),
(10, 'Đất', '2024-04-18 10:53:00', NULL),
(11, 'Thép', '2024-04-18 10:53:00', NULL),
(12, 'Nhựa', '2024-04-18 10:53:00', NULL),
(13, 'Ống cống bê tông', '2024-04-18 10:53:00', NULL),
(14, 'Ống nhựa', '2024-04-18 10:53:00', NULL),
(15, 'Gioăng cao su', '2024-04-18 10:53:00', NULL),
(16, 'Sắt', '2024-04-18 10:53:00', NULL),
(17, 'Que hàn', '2024-04-18 10:53:00', NULL),
(18, 'Sơn', '2024-04-18 10:53:00', NULL),
(19, 'Vải', '2024-04-18 10:53:00', NULL),
(20, 'Chắn rác', '2024-04-18 10:53:00', NULL),
(21, 'Vôi', '2024-04-18 10:53:00', NULL),
(22, 'Xi măng', '2024-04-18 10:53:00', NULL),
(23, 'Gạch', '2024-04-18 10:53:00', NULL),
(24, 'Khí gas', '2024-04-18 10:53:00', NULL),
(25, 'Hố ga', '2024-04-18 10:53:00', NULL),
(26, 'Chất lỏng', '2024-04-18 10:53:00', NULL),
(27, 'Cây kiểng', '2024-04-18 10:53:00', NULL),
(28, 'Bê tông', '2024-04-18 10:53:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migration`
--

DROP TABLE IF EXISTS `migration`;
CREATE TABLE IF NOT EXISTS `migration` (
  `version` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1480859869),
('m140209_132017_init', 1480859873),
('m140403_174025_create_account_table', 1480859874),
('m140504_113157_update_tables', 1480859876),
('m140504_130429_create_token_table', 1480859876),
('m140506_102106_rbac_init', 1480867652),
('m140830_171933_fix_ip_field', 1480859877),
('m140830_172703_change_account_table_name', 1480859877),
('m141222_110026_update_ip_field', 1480859877),
('m141222_135246_alter_username_length', 1480859877),
('m150425_012013_init', 1570158165),
('m150425_082737_redirects', 1570158165),
('m150614_103145_update_social_account_table', 1480859878),
('m150623_212711_fix_username_notnull', 1480859878),
('m151218_234654_add_timezone_to_profile', 1480859878);

-- --------------------------------------------------------

--
-- Table structure for table `nguoi_dung`
--

DROP TABLE IF EXISTS `nguoi_dung`;
CREATE TABLE IF NOT EXISTS `nguoi_dung` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ten_nguoi_dung` varchar(255) NOT NULL,
  `vai_tro` int(11) NOT NULL,
  `create_date` datetime NOT NULL,
  `create_user` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pcounter_by_day`
--

DROP TABLE IF EXISTS `pcounter_by_day`;
CREATE TABLE IF NOT EXISTS `pcounter_by_day` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `day` date NOT NULL,
  `user` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=125 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `pcounter_by_day`
--

INSERT INTO `pcounter_by_day` (`id`, `day`, `user`) VALUES
(5, '2020-04-04', 10),
(6, '2020-04-03', 15),
(7, '2020-04-02', 10),
(8, '2020-04-05', 1),
(9, '2020-04-07', 0),
(10, '2020-04-08', 1),
(11, '2020-04-09', 1),
(12, '2020-04-11', 0),
(13, '2020-04-12', 1),
(14, '2020-04-13', 1),
(15, '2020-04-14', 1),
(16, '2020-04-15', 1),
(17, '2020-05-11', 0),
(18, '2020-05-18', 0),
(19, '2020-06-07', 0),
(20, '2020-06-08', 1),
(21, '2020-06-24', 0),
(22, '2020-06-25', 1),
(23, '2020-07-08', 0),
(24, '2020-11-02', 0),
(25, '2020-11-03', 1),
(26, '2020-11-04', 1),
(27, '2020-11-05', 1),
(28, '2020-11-08', 0),
(29, '2021-02-24', 0),
(30, '2021-02-26', 0),
(31, '2021-03-08', 0),
(32, '2021-03-09', 1),
(33, '2021-03-10', 1),
(34, '2021-03-11', 1),
(35, '2021-06-03', 0),
(36, '2021-06-04', 1),
(37, '2021-06-05', 1),
(38, '2021-06-06', 1),
(39, '2021-07-11', 0),
(40, '2021-11-16', 0),
(41, '2021-11-18', 0),
(42, '2021-11-21', 0),
(43, '2021-11-22', 1),
(44, '2021-11-23', 1),
(45, '2021-11-24', 1),
(46, '2021-11-25', 1),
(47, '2021-12-01', 0),
(48, '2022-01-19', 0),
(49, '2022-02-07', 0),
(50, '2022-02-10', 0),
(51, '2022-02-11', 1),
(52, '2022-02-12', 1),
(53, '2022-02-13', 1),
(54, '2022-09-12', 0),
(55, '2022-09-17', 0),
(56, '2022-09-18', 1),
(57, '2022-09-23', 0),
(58, '2022-09-24', 1),
(59, '2022-09-25', 1),
(60, '2022-09-26', 1),
(61, '2022-09-27', 2),
(62, '2022-09-28', 1),
(63, '2022-09-30', 0),
(64, '2022-10-01', 1),
(65, '2022-10-04', 0),
(66, '2022-10-05', 1),
(67, '2022-10-06', 1),
(68, '2022-10-07', 1),
(69, '2022-10-09', 0),
(70, '2022-10-27', 0),
(71, '2022-12-18', 0),
(72, '2023-02-15', 0),
(73, '2023-02-16', 1),
(74, '2023-02-18', 0),
(75, '2023-02-19', 1),
(76, '2023-02-20', 1),
(77, '2023-02-21', 1),
(78, '2023-02-22', 1),
(79, '2023-02-23', 1),
(80, '2023-02-25', 0),
(81, '2023-02-26', 1),
(82, '2023-02-27', 1),
(83, '2023-02-28', 1),
(84, '2023-03-01', 1),
(85, '2023-03-13', 0),
(86, '2023-03-15', 0),
(87, '2023-03-16', 1),
(88, '2023-03-17', 2),
(89, '2023-04-06', 0),
(90, '2023-04-08', 0),
(91, '2023-05-02', 0),
(92, '2023-05-04', 0),
(93, '2023-06-13', 0),
(94, '2023-06-18', 0),
(95, '2023-07-17', 0),
(96, '2023-07-19', 0),
(97, '2023-07-21', 0),
(98, '2023-07-31', 0),
(99, '2023-08-02', 0),
(100, '2023-08-06', 0),
(101, '2023-08-09', 0),
(102, '2023-08-13', 0),
(103, '2023-08-17', 0),
(104, '2023-08-23', 0),
(105, '2023-08-26', 0),
(106, '2023-08-27', 1),
(107, '2023-09-05', 0),
(108, '2023-11-20', 0),
(109, '2024-01-07', 0),
(110, '2024-01-08', 1),
(111, '2024-01-09', 1),
(112, '2024-01-11', 0),
(113, '2024-01-12', 1),
(114, '2024-01-14', 0),
(115, '2024-01-16', 0),
(116, '2024-01-23', 0),
(117, '2024-01-30', 0),
(118, '2024-01-31', 1),
(119, '2024-02-01', 1),
(120, '2024-02-04', 0),
(121, '2024-02-19', 0),
(122, '2024-02-20', 1),
(123, '2024-02-22', 0),
(124, '2024-03-04', 0);

-- --------------------------------------------------------

--
-- Table structure for table `pcounter_save`
--

DROP TABLE IF EXISTS `pcounter_save`;
CREATE TABLE IF NOT EXISTS `pcounter_save` (
  `save_name` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `save_value` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`save_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `pcounter_save`
--

INSERT INTO `pcounter_save` (`save_name`, `save_value`) VALUES
('counter', 73),
('day_time', 2460375),
('max_count', 126),
('max_time', 1585890000),
('yesterday', 0);

-- --------------------------------------------------------

--
-- Table structure for table `pcounter_users`
--

DROP TABLE IF EXISTS `pcounter_users`;
CREATE TABLE IF NOT EXISTS `pcounter_users` (
  `user_ip` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_time` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`user_ip`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `pcounter_users`
--

INSERT INTO `pcounter_users` (`user_ip`, `user_time`) VALUES
('837ec5754f503cfaaee0929fd48974e7', 1709627770);

-- --------------------------------------------------------

--
-- Table structure for table `phieu_xuat_kho`
--

DROP TABLE IF EXISTS `phieu_xuat_kho`;
CREATE TABLE IF NOT EXISTS `phieu_xuat_kho` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `so_phieu` int(11) DEFAULT NULL,
  `nam` int(4) DEFAULT NULL,
  `thoi_gian_yeu_cau` datetime DEFAULT NULL,
  `id_cong_trinh` int(11) NOT NULL,
  `id_ke_hoach` int(11) DEFAULT NULL,
  `id_bo_phan_yc` int(11) DEFAULT NULL,
  `ly_do` text,
  `id_tai_xe` int(11) DEFAULT NULL,
  `id_xe` int(11) DEFAULT NULL,
  `ngay_giao_hang` date DEFAULT NULL,
  `ghi_chu_giao_hang` text,
  `id_nguoi_nhap_giao_hang` int(11) DEFAULT NULL,
  `thoi_gian_nhap_giao_hang` datetime DEFAULT NULL,
  `nguoi_ky` text,
  `id_nguoi_gui` int(11) DEFAULT NULL,
  `id_nguoi_duyet` int(11) DEFAULT NULL,
  `don_gia` double DEFAULT NULL,
  `trang_thai` varchar(20) DEFAULT NULL,
  `y_kien_nguoi_gui` text,
  `y_kien_nguoi_duyet` text,
  `thoi_gian_duyet` datetime DEFAULT NULL,
  `create_date` datetime DEFAULT NULL,
  `create_user` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `xe` (`id_xe`),
  KEY `yeu_cau` (`id_bo_phan_yc`),
  KEY `nguoi_duyet` (`id_nguoi_duyet`),
  KEY `tai_xe` (`id_tai_xe`),
  KEY `cong_trinh` (`id_cong_trinh`),
  KEY `id_ke_hoach` (`id_ke_hoach`)
) ENGINE=InnoDB AUTO_INCREMENT=125 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `phieu_xuat_kho`
--

INSERT INTO `phieu_xuat_kho` (`id`, `so_phieu`, `nam`, `thoi_gian_yeu_cau`, `id_cong_trinh`, `id_ke_hoach`, `id_bo_phan_yc`, `ly_do`, `id_tai_xe`, `id_xe`, `ngay_giao_hang`, `ghi_chu_giao_hang`, `id_nguoi_nhap_giao_hang`, `thoi_gian_nhap_giao_hang`, `nguoi_ky`, `id_nguoi_gui`, `id_nguoi_duyet`, `don_gia`, `trang_thai`, `y_kien_nguoi_gui`, `y_kien_nguoi_duyet`, `thoi_gian_duyet`, `create_date`, `create_user`) VALUES
(1, NULL, 2024, '2024-04-09 09:38:01', 1, 1, 1, 'sfsdaf88', 1, 13, '2024-04-10', '66', 1, '2024-04-09 15:32:37', '', NULL, 1, 1000, 'DA_GIAO_HANG', 'kkkkkkkkkkk', 'đ', '2024-04-09 14:21:59', '2024-03-23 14:37:18', 1),
(42, NULL, 2024, '2024-04-08 15:09:12', 1, 1, 3, '  b bb', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'KHONG_DUYET', 'oo', 'không duyệt', '2024-04-10 08:57:03', '2024-04-05 09:49:05', 1),
(94, NULL, 2024, NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'BAN_NHAP', NULL, NULL, NULL, '2024-04-08 08:55:42', 1),
(97, NULL, 2024, '2024-04-16 09:59:59', 1, 1, 1, 'sà', NULL, NULL, NULL, '', NULL, NULL, NULL, 1, NULL, NULL, 'CHO_DUYET', 'fasdfa', NULL, NULL, '2024-04-08 14:59:37', 1),
(98, NULL, 2024, '2024-04-10 09:12:01', 1, 1, 1, 'fdsf', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'DA_DUYET', 'fsdaf', 'cccc', '2024-04-10 09:35:35', '2024-04-08 15:36:40', 1),
(100, NULL, 2024, NULL, 7, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'BAN_NHAP', NULL, NULL, NULL, '2024-04-10 13:50:55', 1),
(101, NULL, 2024, '2024-04-10 14:11:50', 9, 1, 4, 'xx', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, NULL, 'DA_DUYET', 'xx', 'bbb', '2024-04-10 14:56:32', '2024-04-10 14:07:47', 1),
(102, NULL, 2024, '2024-04-10 14:10:08', 9, 1, 3, 'xuất để đổ nền...', 1, 13, '2024-04-11', 'xxx..', 1, '2024-04-10 14:21:06', NULL, 1, 1, NULL, 'DA_GIAO_HANG', 'gửi duyệt phiếu', 'cát ....', '2024-04-10 14:11:01', '2024-04-10 14:07:54', 1),
(103, NULL, 2024, '2024-04-12 16:43:29', 9, 1, 2, 'xx', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, 'CHO_DUYET', 'xx', NULL, NULL, '2024-04-10 14:27:00', 1),
(104, NULL, 2024, NULL, 2, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'BAN_NHAP', NULL, NULL, NULL, '2024-04-16 10:02:14', 1),
(105, NULL, 2024, NULL, 2, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'BAN_NHAP', NULL, NULL, NULL, '2024-04-16 10:02:59', 1),
(106, NULL, 2024, '2024-04-16 10:07:28', 3, 1, 3, 'sđfá', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, 'CHO_DUYET', 'fasdfa', NULL, NULL, '2024-04-16 10:07:16', 1),
(107, NULL, 2024, NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'BAN_NHAP', NULL, NULL, NULL, '2024-04-18 14:00:13', NULL),
(108, NULL, 2024, NULL, 1, 121, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'BAN_NHAP', NULL, NULL, NULL, '2024-04-26 14:17:39', 1),
(109, NULL, 2024, NULL, 1, 121, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'BAN_NHAP', NULL, NULL, NULL, '2024-04-26 15:00:45', 1),
(110, NULL, 2024, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'BAN_NHAP', NULL, NULL, NULL, '2024-04-26 17:10:13', 1),
(111, NULL, 2024, '2024-04-29 10:24:50', 1, 135, 2, 'gádgsa', 1, 13, '2024-04-02', 'fasfasfd', 1, '2024-04-29 10:25:18', NULL, 1, 1, NULL, 'DA_GIAO_HANG', 'agsdg', 'gádgasdga', '2024-04-29 10:25:06', '2024-04-29 10:24:15', 1),
(112, NULL, 2024, NULL, 1, 135, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'BAN_NHAP', NULL, NULL, NULL, '2024-04-29 14:50:49', 1),
(113, NULL, 2024, NULL, 1, 135, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'BAN_NHAP', NULL, NULL, NULL, '2024-04-29 14:58:42', 8),
(114, NULL, 2024, '2024-05-02 16:01:38', 10, 138, 2, 'bdb', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, NULL, 'DA_DUYET', 'dgdsfg', 'gdsgfsdg', '2024-05-02 16:02:01', '2024-05-02 16:01:23', 1),
(115, NULL, 2024, '2024-05-03 15:08:43', 10, 138, 2, 'Á', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, 'CHO_DUYET', 'FDSFDS', NULL, NULL, '2024-05-03 15:07:57', 1),
(116, NULL, 2024, '2024-05-03 15:51:04', 10, 138, 2, 'dss', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, NULL, 'DA_DUYET', 'fsafasfd', 'sfsfssfs', '2024-05-03 15:51:15', '2024-05-03 15:16:38', 1),
(117, NULL, 2024, '2024-05-03 15:20:34', 10, 139, 1, 'dgd', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, NULL, 'DA_DUYET', 'ggg', 'fdgdg', '2024-05-03 15:21:06', '2024-05-03 15:20:12', 1),
(118, NULL, 2024, '2024-05-03 15:53:22', 10, 138, 3, 'fsdfs', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, NULL, 'DA_DUYET', 'fsdf', 'fsdfasf', '2024-05-03 15:53:30', '2024-05-03 15:53:10', 1),
(119, NULL, 2024, NULL, 10, 139, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'BAN_NHAP', NULL, NULL, NULL, '2024-05-04 10:31:52', 1),
(120, NULL, 2024, NULL, 10, 147, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'BAN_NHAP', NULL, NULL, NULL, '2024-05-04 14:23:35', 1),
(122, NULL, 2024, '2024-05-04 14:36:27', 10, 147, 4, 'cc', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, NULL, 'DA_DUYET', 'cc', 'Duyệt tự động không qua qui trình', '2024-05-04 14:36:27', '2024-05-04 14:26:02', 1),
(123, NULL, 2024, '2024-05-04 14:34:16', 10, 147, 4, 'vv', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, NULL, 'DA_DUYET', 'vv', NULL, '2024-05-04 14:34:16', '2024-05-04 14:34:02', 1),
(124, NULL, 2024, '2024-05-04 14:46:02', 10, 147, 3, 'fdsaf', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, 'CHO_DUYET', 'fasf', NULL, NULL, '2024-05-04 14:45:54', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tai_xe`
--

DROP TABLE IF EXISTS `tai_xe`;
CREATE TABLE IF NOT EXISTS `tai_xe` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ho_ten` varchar(255) NOT NULL,
  `dia_chi` varchar(255) DEFAULT NULL,
  `so_dien_thoai` varchar(15) DEFAULT NULL,
  `cccd` varchar(20) DEFAULT NULL,
  `create_date` datetime DEFAULT NULL,
  `create_user` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tai_xe`
--

INSERT INTO `tai_xe` (`id`, `ho_ten`, `dia_chi`, `so_dien_thoai`, `cccd`, `create_date`, `create_user`) VALUES
(1, 'Lê Văn Thành', 'Châu Thành', '0922511234', '335011267', '2024-03-07 10:03:45', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `confirmation_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `superadmin` smallint(1) DEFAULT '0',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `registration_ip` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bind_to_ip` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email_confirmed` smallint(1) NOT NULL DEFAULT '0',
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `id_phong` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `confirmation_token`, `status`, `superadmin`, `created_at`, `updated_at`, `registration_ip`, `bind_to_ip`, `email`, `email_confirmed`, `name`, `phone`, `address`, `id_phong`) VALUES
(1, 'superadmin@gmail.com', 'kz2px152FAWlkHbkZoCiXgBAd-S8SSjF', '$2y$13$DSISRUJSkr4CPeb3Ciwl1u3ubaGF50gXzzgTaDmpi5ph2Hie8JL9q', NULL, 1, 1, 1426062188, 1712218473, NULL, '', 'superadmin@gmail.com', 1, 'Mr. Admin 1', '374711908', 'Càng Long - Trà Vinh 1', 2),
(2, 'kho1', 'kW6ddluNcl8lUmfL4LLv9dscJWBU4HJz', '$2y$13$lUB.byNU2XVkej28JZg5Gug.ykHqKbAgm6w05EV92DdoxcY6u4XXe', NULL, 1, 0, 1712216526, 1712218114, '::1', '', '', 0, 'Thủ kho 1', '10234567890', 'Càng Long, Trà Vinh', 4),
(3, 'kho2', 'Au2-AMVH_AbVDO5az7WV2VUZs6WO8SdC', '$2y$13$02kg1F.GdvhETRa82oWPVepkVHJUF8zGJZf9SxXfkBClePkxZcXKK', NULL, 1, 0, 1712216572, 1712218123, '::1', '', '', 0, 'Quản lý kho 2', '0123456789', 'Tp Trà Vinh, tỉnh Trà VInh', 4),
(4, 'duyet1', 'cSdTgJRymd7d8vfyZCBDuMfq4z21ibh3', '$2y$13$wlWW.JY3CcX9F8Iwz5qbH.mDXz8m8icI.sNa/mlubAuYaJj9g.mhi', NULL, 1, 0, 1712216612, 1712218130, '::1', '', '', 0, 'Tài khoản duyệt', '0123456', 'Càng Long, Trà Vinh', 1),
(5, 'duyet2', 'UYf5m3hhffZkeIdLmhI9_KWeF5dHejH0', '$2y$13$XvWDh4fGPK9nwwBtFRAaP.mdIRiZ.KykS4OPvyZcNmnOGUGUNqniq', NULL, 1, 0, 1712216786, 1712218139, '::1', '', '', 0, 'Tài khoản duyệt 2', '01234567890', 'Phường 9, TP. Trà Vinh', 1),
(6, 'quantri1', '-iS-d2Awe6qoK8AKAFHH1uS17l97HMgZ', '$2y$13$T6wTEY69aSu5IiXrfcMUW.gYAd/iKEIEy0hfvX31UH8xwKBg8PsdS', NULL, 1, 0, 1712216835, 1712218149, '::1', '', '', 0, 'Nguyễn Văn B', '01234567890', 'Phòng Las', 1),
(7, 'quantri2', 'MJXFo_b51DJvLMiB2lPeR_WcQY6n8jMl', '$2y$13$A7EV2dBtQhO6lxv.EECixevxHfrD38D8dCrnu6Mc2SHvb9HbdhDYe', NULL, 1, 0, 1712216882, 1712218156, '::1', '', '', 0, 'Nguyễn Văn C', '01234567890', 'Văn phòng', 2),
(8, 'admin', 'wuXpTa3zZQkVmh5hdq324QA6yUSY31eg', '$2y$13$Z5cM9qvcSxOhjgJqgU.LTehATjBpXTD93SqT52lfhGO.AE7qASxA.', NULL, 1, 1, 1713233578, 1713233578, '::1', '', '', 0, 'Quản trị', '01234567890', 'Trà Vinh', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_room`
--

DROP TABLE IF EXISTS `user_room`;
CREATE TABLE IF NOT EXISTS `user_room` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `room_name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user_room`
--

INSERT INTO `user_room` (`id`, `room_name`) VALUES
(1, 'Văn phòng'),
(2, 'Phòng Las'),
(3, 'Trạm Bê tông KCN'),
(4, 'Kho Long Đức');

-- --------------------------------------------------------

--
-- Table structure for table `user_visit_log`
--

DROP TABLE IF EXISTS `user_visit_log`;
CREATE TABLE IF NOT EXISTS `user_visit_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ip` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `language` char(2) COLLATE utf8_unicode_ci NOT NULL,
  `user_agent` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `visit_time` int(11) NOT NULL,
  `browser` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `os` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=305 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user_visit_log`
--

INSERT INTO `user_visit_log` (`id`, `token`, `ip`, `language`, `user_agent`, `user_id`, `visit_time`, `browser`, `os`) VALUES
(1, '594b942a08db7', '::1', 'en', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 1, 1498125354, 'Chrome', 'Windows'),
(2, '594e6c6038079', '::1', 'en', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 1, 1498311776, 'Chrome', 'Windows'),
(3, '594f4139aedb5', '::1', 'en', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 1, 1498366265, 'Chrome', 'Windows'),
(4, '595ef7d44d1b0', '::1', 'en', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.115 Safari/537.36', 1, 1499396052, 'Chrome', 'Windows'),
(5, '59e8a6d8a9558', '::1', 'en', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36', 1, 1508419288, 'Chrome', 'Windows'),
(6, '59ee962cb327d', '::1', 'en', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36', 1, 1508808236, 'Chrome', 'Windows'),
(7, '59ef5ebdeec13', '::1', 'en', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36', 1, 1508859581, 'Chrome', 'Windows'),
(8, '59ef6a5ad7e55', '::1', 'en', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36', 1, 1508862554, 'Chrome', 'Windows'),
(9, '59ef70a2e9811', '::1', 'en', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36', 1, 1508864162, 'Chrome', 'Windows'),
(10, '59f0b2e7171a8', '::1', 'en', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36', 1, 1508946663, 'Chrome', 'Windows'),
(11, '59f0cd9d161a9', '::1', 'en', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36', 1, 1508953501, 'Chrome', 'Windows'),
(12, '59f1304f26745', '::1', 'en', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36', 1, 1508978767, 'Chrome', 'Windows'),
(13, '59f1456cbea96', '::1', 'en', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36', 1, 1508984172, 'Chrome', 'Windows'),
(14, '59f1807420d18', '::1', 'en', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36', 1, 1508999284, 'Chrome', 'Windows'),
(15, '59f29d6be7ea5', '::1', 'en', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36', 1, 1509072235, 'Chrome', 'Windows'),
(16, '59f2e74688480', '::1', 'en', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36', 1, 1509091142, 'Chrome', 'Windows'),
(17, '59f3d7d1bcc8f', '::1', 'en', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36', 1, 1509152721, 'Chrome', 'Windows'),
(18, '59f688a11dd11', '::1', 'en', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36', 1, 1509329057, 'Chrome', 'Windows'),
(19, '59f6c6b702579', '::1', 'en', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36', 1, 1509344951, 'Chrome', 'Windows'),
(20, '59f747ceb4e37', '::1', 'en', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36', 1, 1509377998, 'Chrome', 'Windows'),
(21, '59f992dfa3650', '::1', 'en', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36', 1, 1509528287, 'Chrome', 'Windows'),
(22, '59f9e7bbac6f9', '::1', 'en', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36', 1, 1509550011, 'Chrome', 'Windows'),
(23, '59fff730e5ab3', '::1', 'en', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36', 1, 1509947184, 'Chrome', 'Windows'),
(24, '5a005c828502a', '::1', 'en', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36', 1, 1509973122, 'Chrome', 'Windows'),
(25, '5a00833f42ef8', '::1', 'en', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36', 1, 1509983039, 'Chrome', 'Windows'),
(26, '5a008bd985854', '::1', 'en', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36', 1, 1509985241, 'Chrome', 'Windows'),
(27, '5a032315d55e7', '::1', 'en', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36', 1, 1510155029, 'Chrome', 'Windows'),
(28, '5a09a9c638959', '::1', 'en', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36', 1, 1510582726, 'Chrome', 'Windows'),
(29, '5a0bcc8d46ae1', '::1', 'en', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36', 1, 1510722701, 'Chrome', 'Windows'),
(30, '5a0c507c1bbc0', '::1', 'en', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36', 1, 1510756476, 'Chrome', 'Windows'),
(31, '5a158ee83c3a5', '::1', 'en', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/62.0.3202.94 Safari/537.36', 1, 1511362280, 'Chrome', 'Windows'),
(32, '5a16e76aac9a0', '::1', 'en', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/62.0.3202.94 Safari/537.36', 1, 1511450474, 'Chrome', 'Windows'),
(33, '5a1c03e4e7758', '::1', 'en', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/62.0.3202.94 Safari/537.36', 1, 1511785444, 'Chrome', 'Windows'),
(34, '5a1c2a002fa8d', '::1', 'en', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/62.0.3202.94 Safari/537.36', 1, 1511795200, 'Chrome', 'Windows'),
(35, '5a1d8a8b23e08', '::1', 'en', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/62.0.3202.94 Safari/537.36', 1, 1511885451, 'Chrome', 'Windows'),
(36, '5a202b327efa1', '::1', 'en', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/62.0.3202.94 Safari/537.36', 1, 1512057650, 'Chrome', 'Windows'),
(37, '5a24d16ba2ee7', '::1', 'en', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/62.0.3202.94 Safari/537.36', 1, 1512362347, 'Chrome', 'Windows'),
(38, '5a256932f0cc3', '::1', 'en', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/62.0.3202.94 Safari/537.36', 1, 1512401202, 'Chrome', 'Windows'),
(39, '5a26c795b5a20', '::1', 'en', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/62.0.3202.94 Safari/537.36', 1, 1512490901, 'Chrome', 'Windows'),
(40, '5a2ab2d0d270e', '::1', 'en', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/62.0.3202.94 Safari/537.36', 1, 1512747728, 'Chrome', 'Windows'),
(41, '5a2e1341e8e0e', '::1', 'en', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/62.0.3202.94 Safari/537.36', 1, 1512969025, 'Chrome', 'Windows'),
(42, '5a329a097ad3f', '::1', 'en', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/63.0.3239.84 Safari/537.36', 1, 1513265673, 'Chrome', 'Windows'),
(43, '5a33e86702cf4', '::1', 'en', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/63.0.3239.84 Safari/537.36', 1, 1513351271, 'Chrome', 'Windows'),
(44, '5b8566d214a65', '::1', 'en', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', 1, 1535469266, 'Chrome', 'Windows'),
(45, '5b878bb8d24fd', '::1', 'en', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', 1, 1535609784, 'Chrome', 'Windows'),
(46, '5b880eecbba11', '::1', 'en', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', 1, 1535643372, 'Chrome', 'Windows'),
(47, '5b8c87273a4fc', '::1', 'en', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', 1, 1535936295, 'Chrome', 'Windows'),
(48, '5b8d23079177c', '::1', 'en', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', 1, 1535976199, 'Chrome', 'Windows'),
(49, '5b8ddf31af79a', '::1', 'en', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', 1, 1536024369, 'Chrome', 'Windows'),
(50, '5b8e819351601', '::1', 'en', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', 1, 1536065939, 'Chrome', 'Windows'),
(51, '5b8e9d9d98f1c', '::1', 'en', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', 1, 1536073117, 'Chrome', 'Windows'),
(52, '5b8ea8323c5b1', '::1', 'en', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', 1, 1536075826, 'Chrome', 'Windows'),
(53, '5b8ea9e478538', '::1', 'en', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', 1, 1536076260, 'Chrome', 'Windows'),
(54, '5b8f277b1677c', '::1', 'en', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', 1, 1536108411, 'Chrome', 'Windows'),
(55, '5b8f76b89e150', '::1', 'en', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', 1, 1536128696, 'Chrome', 'Windows'),
(56, '5b908f32ac6d8', '::1', 'en', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', 1, 1536200498, 'Chrome', 'Windows'),
(57, '5b9a80b80c904', '::1', 'en', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', NULL, 1536852152, 'Chrome', 'Windows'),
(58, '5b9a812bb36a9', '::1', 'en', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', 1, 1536852267, 'Chrome', 'Windows'),
(59, '5b9a860f21927', '::1', 'en', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', NULL, 1536853519, 'Chrome', 'Windows'),
(60, '5b9a876886dcd', '::1', 'en', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', NULL, 1536853864, 'Chrome', 'Windows'),
(61, '5b9a881b4ba36', '::1', 'en', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', NULL, 1536854043, 'Chrome', 'Windows'),
(62, '5b9a89a9e4cc1', '::1', 'en', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', NULL, 1536854441, 'Chrome', 'Windows'),
(63, '5b9bbc7979e36', '::1', 'en', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', 1, 1536932985, 'Chrome', 'Windows'),
(64, '5b9e6fa2dcd51', '::1', 'en', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', 1, 1537109922, 'Chrome', 'Windows'),
(65, '5ba1eeb6c9155', '::1', 'en', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', 1, 1537339062, 'Chrome', 'Windows'),
(66, '5ba7187e1e6ea', '::1', 'en', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.81 Safari/537.36 Avast/69.0.792.81', 1, 1537677438, 'Chrome', 'Windows'),
(67, '5ba7195ab7712', '::1', 'en', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, 1537677658, 'Chrome', 'Windows'),
(68, '5ba8816455e8d', '::1', 'en', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, 1537769828, 'Chrome', 'Windows'),
(69, '5baa542ec53a9', '::1', 'en', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, 1537889326, 'Chrome', 'Windows'),
(70, '5baa55d7d6912', '::1', 'vi', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:56.0) Gecko/20100101 Firefox/56.0', 1, 1537889751, 'Firefox', 'Windows'),
(71, '5bac244e659d1', '::1', 'en', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, 1538008142, 'Chrome', 'Windows'),
(72, '5bb1734b8dffa', '::1', 'en', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, 1538356043, 'Chrome', 'Windows'),
(73, '5bb433d544aad', '::1', 'en', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, 1538536405, 'Chrome', 'Windows'),
(74, '5c2037ee33982', '::1', 'en', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/71.0.3578.98 Safari/537.36', 1, 1545615342, 'Chrome', 'Windows'),
(75, '5ca93b363c1d5', '::1', 'en', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.86 Safari/537.36', 1, 1554594614, 'Chrome', 'Windows'),
(76, '5cb881f5a13b5', '::1', 'en', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.103 Safari/537.36', 1, 1555595765, 'Chrome', 'Windows'),
(77, '5cb8a07a1a58a', '::1', 'en', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.103 Safari/537.36', 1, 1555603578, 'Chrome', 'Windows'),
(78, '5cb8a3345894c', '::1', 'en', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.103 Safari/537.36', NULL, 1555604276, 'Chrome', 'Windows'),
(79, '5cb8a46ceb412', '::1', 'en', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.103 Safari/537.36', NULL, 1555604588, 'Chrome', 'Windows'),
(80, '5cb8a4db8e4e6', '::1', 'en', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.103 Safari/537.36', NULL, 1555604699, 'Chrome', 'Windows'),
(81, '5cb8a81ce9027', '::1', 'en', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.103 Safari/537.36', NULL, 1555605532, 'Chrome', 'Windows'),
(82, '5cb8ad0e4d571', '::1', 'en', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.103 Safari/537.36', NULL, 1555606798, 'Chrome', 'Windows'),
(83, '5cb8ad3a61129', '::1', 'en', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.103 Safari/537.36', NULL, 1555606842, 'Chrome', 'Windows'),
(84, '5cb9245bd697b', '::1', 'en', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.103 Safari/537.36', NULL, 1555637339, 'Chrome', 'Windows'),
(85, '5cb94239a8a3c', '::1', 'en', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.103 Safari/537.36', NULL, 1555644985, 'Chrome', 'Windows'),
(86, '5cb9431be7c4e', '::1', 'en', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.103 Safari/537.36', NULL, 1555645211, 'Chrome', 'Windows'),
(87, '5cb943c69bec8', '::1', 'en', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.103 Safari/537.36', 1, 1555645382, 'Chrome', 'Windows'),
(88, '5cb9f703675a5', '::1', 'en', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.103 Safari/537.36', 1, 1555691267, 'Chrome', 'Windows'),
(89, '5cba88e7ab1b0', '::1', 'en', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.103 Safari/537.36', 1, 1555728615, 'Chrome', 'Windows'),
(90, '5cbb34767942f', '::1', 'en', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.103 Safari/537.36', 1, 1555772534, 'Chrome', 'Windows'),
(91, '5cc11ae1685bb', '::1', 'en', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.103 Safari/537.36', 1, 1556159201, 'Chrome', 'Windows'),
(92, '5cc2b15586208', '::1', 'en', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.103 Safari/537.36', 1, 1556263253, 'Chrome', 'Windows'),
(93, '5cc3f0f405d84', '::1', 'en', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.103 Safari/537.36', 1, 1556345076, 'Chrome', 'Windows'),
(94, '5cc84741d0fbb', '::1', 'en', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.103 Safari/537.36', 1, 1556629313, 'Chrome', 'Windows'),
(95, '5d4974633a124', '127.0.0.1', 'en', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.142 Safari/537.36', 1, 1565095011, 'Chrome', 'Windows'),
(96, '5d4e27b421051', '127.0.0.1', 'en', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.100 Safari/537.36', 1, 1565403060, 'Chrome', 'Windows'),
(97, '5d50b845dd0c4', '127.0.0.1', 'en', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.100 Safari/537.36', 1, 1565571141, 'Chrome', 'Windows'),
(98, '5d538429662db', '127.0.0.1', 'en', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.100 Safari/537.36', 1, 1565754409, 'Chrome', 'Windows'),
(99, '5d53854e94bdc', '127.0.0.1', 'en', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.100 Safari/537.36', 1, 1565754702, 'Chrome', 'Windows'),
(100, '5d5388a9aed8b', '127.0.0.1', 'en', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.100 Safari/537.36', 1, 1565755561, 'Chrome', 'Windows'),
(101, '5d53abcf46651', '127.0.0.1', 'en', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.100 Safari/537.36', 1, 1565764559, 'Chrome', 'Windows'),
(102, '5d779315820f5', '127.0.0.1', 'en', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36', 1, 1568117525, 'Chrome', 'Windows'),
(103, '5d78a4f3c95dd', '127.0.0.1', 'en', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36', 1, 1568187635, 'Chrome', 'Windows'),
(104, '5d95b078d3259', '127.0.0.1', 'en', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.90 Safari/537.36', 1, 1570091128, 'Chrome', 'Windows'),
(105, '5d96268fc2554', '127.0.0.1', 'en', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.90 Safari/537.36', 1, 1570121359, 'Chrome', 'Windows'),
(106, '5d96269ed67ee', '127.0.0.1', 'en', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.90 Safari/537.36', NULL, 1570121374, 'Chrome', 'Windows'),
(107, '5d96f34b0fc1e', '127.0.0.1', 'en', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.90 Safari/537.36', 1, 1570173771, 'Chrome', 'Windows'),
(108, '5d989cad3a601', '127.0.0.1', 'en', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.90 Safari/537.36', 1, 1570282669, 'Chrome', 'Windows'),
(109, '5da82e7283d94', '127.0.0.1', 'en', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.120 Safari/537.36', 1, 1571303026, 'Chrome', 'Windows'),
(110, '5da97c8d06f4e', '127.0.0.1', 'en', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.120 Safari/537.36', 1, 1571388557, 'Chrome', 'Windows'),
(111, '5dafaddb87cd8', '127.0.0.1', 'en', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.120 Safari/537.36', 1, 1571794395, 'Chrome', 'Windows'),
(112, '5dbe1b954efdc', '127.0.0.1', 'en', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.120 Safari/537.36', 1, 1572739989, 'Chrome', 'Windows'),
(113, '5e4debc821c02', '127.0.0.1', 'en', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.116 Safari/537.36', 1, 1582164936, 'Chrome', 'Windows'),
(114, '5e549263d8fb4', '127.0.0.1', 'en', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.116 Safari/537.36', 1, 1582600803, 'Chrome', 'Windows'),
(115, '5e5dad753e106', '127.0.0.1', 'en', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.122 Safari/537.36', 1, 1583197557, 'Chrome', 'Windows'),
(116, '5e5f53a1b905f', '127.0.0.1', 'en', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.122 Safari/537.36', 1, 1583305633, 'Chrome', 'Windows'),
(117, '5e60722a6bedf', '127.0.0.1', 'en', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.122 Safari/537.36', 1, 1583378986, 'Chrome', 'Windows'),
(118, '5e6116f3a4287', '127.0.0.1', 'en', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.122 Safari/537.36', 1, 1583421171, 'Chrome', 'Windows'),
(119, '5e61f1a59e18a', '127.0.0.1', 'en', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.132 Safari/537.36', 1, 1583477157, 'Chrome', 'Windows'),
(120, '5e6607738f7eb', '10.202.27.243', 'en', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.132 Safari/537.36', 1, 1583744883, 'Chrome', 'Windows'),
(121, '5e6659e348e5d', '10.202.27.243', 'en', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.132 Safari/537.36', 1, 1583765987, 'Chrome', 'Windows'),
(122, '5e674a99468e5', '10.202.27.243', 'en', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.132 Safari/537.36', 1, 1583827609, 'Chrome', 'Windows'),
(123, '5e686bcb64f52', '10.202.27.243', 'en', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.132 Safari/537.36', 1, 1583901643, 'Chrome', 'Windows'),
(124, '5e698721e44b9', '10.202.27.243', 'en', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.132 Safari/537.36', 1, 1583974177, 'Chrome', 'Windows'),
(125, '5e69a03b878af', '10.202.27.243', 'en', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.132 Safari/537.36', 1, 1583980603, 'Chrome', 'Windows'),
(126, '5e6ad745790df', '10.202.27.243', 'en', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.132 Safari/537.36', 1, 1584060229, 'Chrome', 'Windows'),
(127, '5e6afa6675f2c', '10.202.27.243', 'en', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.132 Safari/537.36', 1, 1584069222, 'Chrome', 'Windows'),
(128, '5e6ecce078976', '10.202.27.243', 'en', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.132 Safari/537.36', 1, 1584319712, 'Chrome', 'Windows'),
(129, '5e71c528c782c', '10.202.27.243', 'en', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.132 Safari/537.36', 1, 1584514344, 'Chrome', 'Windows'),
(130, '5e71c56635718', '10.202.27.243', 'en', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.132 Safari/537.36', NULL, 1584514406, 'Chrome', 'Windows'),
(131, '5e71c820cbd73', '10.202.27.243', 'en', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.132 Safari/537.36', 1, 1584515104, 'Chrome', 'Windows'),
(132, '5e71d255f30c1', '10.202.27.243', 'en', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.132 Safari/537.36', NULL, 1584517717, 'Chrome', 'Windows'),
(133, '5e72c6a32ed18', '10.202.27.243', 'en', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.132 Safari/537.36', 1, 1584580259, 'Chrome', 'Windows'),
(134, '5e742c60879d0', '10.202.27.243', 'en', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.132 Safari/537.36', 1, 1584671840, 'Chrome', 'Windows'),
(135, '5e78118d82a5c', '10.202.27.243', 'en', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.149 Safari/537.36', 1, 1584927117, 'Chrome', 'Windows'),
(136, '5e78667e3345d', '10.202.27.243', 'en', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.149 Safari/537.36', 1, 1584948862, 'Chrome', 'Windows'),
(137, '5e795d15dc80c', '10.202.27.243', 'en', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.149 Safari/537.36', 1, 1585011989, 'Chrome', 'Windows'),
(138, '5e7d6b5f90456', '10.202.27.243', 'en', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.149 Safari/537.36', 1, 1585277791, 'Chrome', 'Windows'),
(139, '5e81a6f53943d', '10.202.27.243', 'en', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.149 Safari/537.36', 1, 1585555189, 'Chrome', 'Windows'),
(140, '5e829a6cdb25e', '10.202.27.243', 'en', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.149 Safari/537.36', 1, 1585617516, 'Chrome', 'Windows'),
(141, '5e8448e4e9c92', '10.202.27.243', 'en', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.149 Safari/537.36', 1, 1585727716, 'Chrome', 'Windows'),
(142, '5e848206686ae', '10.202.27.243', 'en', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.149 Safari/537.36', 1, 1585742342, 'Chrome', 'Windows'),
(143, '5e86b5b0e7d81', '10.202.27.243', 'en', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.149 Safari/537.36', 1, 1585886640, 'Chrome', 'Windows'),
(144, '5e86f3cc5e02c', '10.202.27.243', 'en', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.162 Safari/537.36', 1, 1585902540, 'Chrome', 'Windows'),
(145, '5e87060000c41', '10.202.27.243', 'en', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.162 Safari/537.36', 1, 1585907200, 'Chrome', 'Windows'),
(146, '5e88323f677a6', '10.202.27.243', 'en', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.162 Safari/537.36', 1, 1585984063, 'Chrome', 'Windows'),
(147, '5e8836c203a18', '10.202.27.243', 'en', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.162 Safari/537.36', 1, 1585985218, 'Chrome', 'Windows'),
(148, '5e884af3b7e61', '10.202.27.243', 'en', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.149 Safari/537.36', 1, 1585990387, 'Chrome', 'Windows'),
(149, '5e88600ddd2db', '10.202.27.243', 'en', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.163 Safari/537.36', 1, 1585995789, 'Chrome', 'Windows'),
(150, '5e892beb48615', '10.202.27.243', 'en', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.163 Safari/537.36', 1, 1586047979, 'Chrome', 'Windows'),
(151, '5e8932ae84461', '10.202.27.243', 'en', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.163 Safari/537.36', 1, 1586049710, 'Chrome', 'Windows'),
(152, '5e89331dd420c', '10.202.27.243', 'en', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.163 Safari/537.36', 1, 1586049821, 'Chrome', 'Windows'),
(153, '5e8939720c509', '127.0.0.1', 'en', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.149 Safari/537.36', 1, 1586051442, 'Chrome', 'Windows'),
(154, '5e89c3f053845', '127.0.0.1', 'en', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.149 Safari/537.36', NULL, 1586086896, 'Chrome', 'Windows'),
(155, '5e8d3f40373d6', '127.0.0.1', 'en', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.149 Safari/537.36', 1, 1586315072, 'Chrome', 'Windows'),
(156, '5e8d3f6a1189d', '127.0.0.1', 'en', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.149 Safari/537.36', NULL, 1586315114, 'Chrome', 'Windows'),
(157, '5e9080ca1b2ca', '127.0.0.1', 'en', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.163 Safari/537.36', 1, 1586528458, 'Chrome', 'Windows'),
(158, '5e9256944d3d3', '127.0.0.1', 'en', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.163 Safari/537.36', 1, 1586648724, 'Chrome', 'Windows'),
(159, '5e957a1cdb486', '127.0.0.1', 'en', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.163 Safari/537.36', 1, 1586854428, 'Chrome', 'Windows'),
(160, '5e97bffb6e420', '127.0.0.1', 'en', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.163 Safari/537.36', 1, 1587003387, 'Chrome', 'Windows'),
(161, '5eba4bcdba14c', '127.0.0.1', 'en', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 1, 1589267405, 'Chrome', 'Windows'),
(162, '5edd850fb15a0', '127.0.0.1', 'en', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, 1591575823, 'Chrome', 'Windows'),
(163, '5edd868884ab7', '127.0.0.1', 'en', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', NULL, 1591576200, 'Chrome', 'Windows'),
(164, '5edda481d9e66', '127.0.0.1', 'en', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', NULL, 1591583873, 'Chrome', 'Windows'),
(165, '5edee38066441', '127.0.0.1', 'en', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, 1591665536, 'Chrome', 'Windows'),
(166, '5edee3c6c76b1', '127.0.0.1', 'en', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', NULL, 1591665606, 'Chrome', 'Windows'),
(167, '5edee506e4fec', '127.0.0.1', 'en', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', NULL, 1591665926, 'Chrome', 'Windows'),
(168, '5ef4c54e40700', '127.0.0.1', 'en', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36', 1, 1593099598, 'Chrome', 'Windows'),
(169, '5ef550a2613b5', '127.0.0.1', 'en', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36', 1, 1593135266, 'Chrome', 'Windows'),
(170, '5f067152e1d34', '127.0.0.1', 'en', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36', 1, 1594257746, 'Chrome', 'Windows'),
(171, '5f06719fc5bb6', '127.0.0.1', 'en', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36', NULL, 1594257823, 'Chrome', 'Windows'),
(172, '5fa257308e037', '127.0.0.1', 'en', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/86.0.4240.183 Safari/537.36', 1, 1604474672, 'Chrome', 'Windows'),
(173, '5fa4b80680060', '127.0.0.1', 'en', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/86.0.4240.183 Safari/537.36', 1, 1604630534, 'Chrome', 'Windows'),
(174, '60372d29b9962', '127.0.0.1', 'vi', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/88.0.4324.182 Safari/537.36', 1, 1614228777, 'Chrome', 'Windows'),
(175, '60372d6f5b7d8', '127.0.0.1', 'vi', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/88.0.4324.182 Safari/537.36', NULL, 1614228847, 'Chrome', 'Windows'),
(176, '6046e9137ab3f', '127.0.0.1', 'vi', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/88.0.4324.190 Safari/537.36', 1, 1615259923, 'Chrome', 'Windows'),
(177, '604819f5303f1', '127.0.0.1', 'vi', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/88.0.4324.190 Safari/537.36', 1, 1615337973, 'Chrome', 'Windows'),
(178, '6049d8e5dd6b4', '127.0.0.1', 'vi', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/88.0.4324.190 Safari/537.36', 1, 1615452389, 'Chrome', 'Windows'),
(179, '6049dbfee39a9', '127.0.0.1', 'vi', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/88.0.4324.190 Safari/537.36', NULL, 1615453182, 'Chrome', 'Windows'),
(180, '604ac159e6b22', '127.0.0.1', 'vi', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/88.0.4324.190 Safari/537.36', 1, 1615511897, 'Chrome', 'Windows'),
(181, '60b9e1083005c', '127.0.0.1', 'vi', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.77 Safari/537.36', 1, 1622794504, 'Chrome', 'Windows'),
(182, '60bae34d258f6', '127.0.0.1', 'vi', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.77 Safari/537.36', 1, 1622860621, 'Chrome', 'Windows'),
(183, '60bae52d0535a', '127.0.0.1', 'vi', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.77 Safari/537.36', 1, 1622861101, 'Chrome', 'Windows'),
(184, '60bd8da9800d5', '127.0.0.1', 'vi', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.77 Safari/537.36', 1, 1623035305, 'Chrome', 'Windows'),
(185, '60eba51ba1bb3', '127.0.0.1', 'vi', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36', 1, 1626055963, 'Chrome', 'Windows'),
(186, '60eba6ba36295', '127.0.0.1', 'vi', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36', NULL, 1626056378, 'Chrome', 'Windows'),
(187, '60eba751bbf8b', '127.0.0.1', 'vi', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36', NULL, 1626056529, 'Chrome', 'Windows'),
(188, '60eba7aa864ac', '127.0.0.1', 'vi', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36', NULL, 1626056618, 'Chrome', 'Windows'),
(189, '60eba8330509e', '127.0.0.1', 'vi', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36', NULL, 1626056755, 'Chrome', 'Windows'),
(190, '60eba8ccdb5ac', '127.0.0.1', 'vi', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36', NULL, 1626056908, 'Chrome', 'Windows'),
(191, '6194ce72de6c5', '127.0.0.1', 'vi', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.69 Safari/537.36', 1, 1637142130, 'Chrome', 'Windows'),
(192, '619746aa90c09', '127.0.0.1', 'vi', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.69 Safari/537.36', 1, 1637303978, 'Chrome', 'Windows'),
(193, '619751d50efb4', '127.0.0.1', 'vi', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.69 Safari/537.36', 1, 1637306837, 'Chrome', 'Windows'),
(194, '619ae916a5efa', '127.0.0.1', 'vi', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.45 Safari/537.36', 1, 1637542166, 'Chrome', 'Windows'),
(195, '619d151c20277', '127.0.0.1', 'vi', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.45 Safari/537.36', 1, 1637684508, 'Chrome', 'Windows'),
(196, '619e714974085', '127.0.0.1', 'vi', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.45 Safari/537.36', 1, 1637773641, 'Chrome', 'Windows'),
(197, '619f3511248ca', '127.0.0.1', 'vi', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.45 Safari/537.36', 1, 1637823761, 'Chrome', 'Windows'),
(198, '61a03438d06ce', '127.0.0.1', 'vi', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.45 Safari/537.36', 1, 1637889080, 'Chrome', 'Windows'),
(199, '61e8db9c551ae', '127.0.0.1', 'vi', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/97.0.4692.71 Safari/537.36', 1, 1642650524, 'Chrome', 'Windows'),
(200, '62067ec846026', '127.0.0.1', 'vi', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/98.0.4758.82 Safari/537.36', 1, 1644592840, 'Chrome', 'Windows'),
(201, '6320160e8ed28', '::1', 'en', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/105.0.0.0 Safari/537.36', 1, 1663047182, 'Chrome', 'Windows'),
(202, '6326dc416dd21', '::1', 'en', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/105.0.0.0 Safari/537.36', 1, 1663491137, 'Chrome', 'Windows'),
(203, '632eb85c535fa', '127.0.0.1', 'en', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/105.0.0.0 Safari/537.36', 1, 1664006236, 'Chrome', 'Windows'),
(204, '632fe04cd5313', '127.0.0.1', 'en', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/105.0.0.0 Safari/537.36', 1, 1664081996, 'Chrome', 'Windows'),
(205, '63331bf466694', '113.182.184.9', 'en', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/105.0.0.0 Safari/537.36', NULL, 1664293876, 'Chrome', 'Windows'),
(206, '63331cd3edcd6', '113.182.184.9', 'en', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/105.0.0.0 Safari/537.36', NULL, 1664294099, 'Chrome', 'Windows'),
(207, '63342574185ac', '113.182.184.9', 'en', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/105.0.0.0 Safari/537.36', 1, 1664361844, 'Chrome', 'Windows'),
(208, '63382ff1e92e5', '14.191.61.205', 'en', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36', 1, 1664626673, 'Chrome', 'Windows'),
(209, '633cefca2fdcc', '123.23.13.149', 'en', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36', 1, 1664937930, 'Chrome', 'Windows'),
(210, '633fd7b3d7141', '118.68.56.13', 'en', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36', 1, 1665128371, 'Chrome', 'Windows'),
(211, '635b6b16f0db1', '127.0.0.1', 'en', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36', 1, 1666935574, 'Chrome', 'Windows'),
(212, '63a06823b2435', '127.0.0.1', 'en', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 1, 1671456803, 'Chrome', 'Windows'),
(213, '63ee404a622f1', '127.0.0.1', 'en', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/110.0.0.0 Safari/537.36', 1, 1676558410, 'Chrome', 'Windows'),
(214, '63ef01ab72671', '127.0.0.1', 'en', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/110.0.0.0 Safari/537.36', 1, 1676607915, 'Chrome', 'Windows'),
(215, '63f1c3c13350a', '127.0.0.1', 'en', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/110.0.0.0 Safari/537.36', 1, 1676788673, 'Chrome', 'Windows'),
(216, '63fdf6a9c8ce8', '127.0.0.1', 'en', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/110.0.0.0 Safari/537.36', 1, 1677588137, 'Chrome', 'Windows'),
(217, '63fe0639a9d95', '127.0.0.1', 'en', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/110.0.0.0 Safari/537.36', 1, 1677592121, 'Chrome', 'Windows'),
(218, '63fe0fc3cb2e3', '127.0.0.1', 'en', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/110.0.0.0 Safari/537.36', 1, 1677594563, 'Chrome', 'Windows'),
(219, '63fe8683cb897', '127.0.0.1', 'en', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/110.0.0.0 Safari/537.36', 1, 1677624963, 'Chrome', 'Windows'),
(220, '64002a2aa8f01', '2001:ee0:56e8:8', 'en', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/110.0.0.0 Safari/537.36', 1, 1677732394, 'Chrome', 'Windows'),
(221, '64003618c41db', '2001:ee0:56e8:8', 'en', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/110.0.0.0 Safari/537.36', 1, 1677735448, 'Chrome', 'Windows'),
(222, '64003f4ad1878', '171.247.108.233', 'en', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/110.0.0.0 Safari/537.36 Edg/110.0.1587.57', 1, 1677737802, 'Chrome', 'Windows'),
(223, '64101d5c9879f', '14.224.160.12', 'en', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/110.0.0.0 Safari/537.36 Edg/110.0.1587.69', 1, 1678777692, 'Chrome', 'Windows'),
(224, '6412b1078c242', '1.52.109.14', 'en', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Safari/537.36', 1, 1678946567, 'Chrome', 'Windows'),
(225, '6413d22105926', '42.115.229.57', 'en', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Safari/537.36', 1, 1679020577, 'Chrome', 'Windows'),
(226, '642fbff3254ee', '14.224.160.12', 'en', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Safari/537.36 Edg/111.0.1661.62', 1, 1680850931, 'Chrome', 'Windows'),
(227, '642fc1e3791b1', '14.224.160.12', 'en', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Safari/537.36 Edg/111.0.1661.62', 1, 1680851427, 'Chrome', 'Windows'),
(228, '642fd39ece936', '113.188.229.40', 'en', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Safari/537.36', 1, 1680855966, 'Chrome', 'Windows'),
(229, '64322f2ef2155', '27.3.193.217', 'en', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Safari/537.36', 1, 1681010478, 'Chrome', 'Windows'),
(230, '64521421f2784', '113.183.205.19', 'en', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/112.0.0.0 Safari/537.36', 1, 1683100705, 'Chrome', 'Windows'),
(231, '6489b99276bfe', '222.254.222.131', 'en', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36', 1, 1686747538, 'Chrome', 'Windows'),
(232, '648fbe8196ce8', '2402:800:63e5:b', 'en', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36', 1, 1687142017, 'Chrome', 'Windows'),
(233, '64b644ea0dc65', '14.224.160.12', 'vi', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36', 1, 1689666794, 'Chrome', 'Windows'),
(234, '64b64661f3649', '14.224.160.12', 'en', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36', 1, 1689667169, 'Chrome', 'Windows'),
(235, '64b8a6eee72b4', '2402:800:63e5:f', 'en', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36', 1, 1689822958, 'Chrome', 'Windows'),
(236, '64b8a87199516', '113.177.113.64', 'en', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36 Edg/114.0.1823.82', 1, 1689823345, 'Chrome', 'Windows'),
(237, '64bb4adf327cf', '14.224.160.12', 'vi', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36 Edg/114.0.1823.82', 1, 1689995999, 'Chrome', 'Windows'),
(238, '64bb51934194d', '2402:800:63e5:f', 'en', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36', 1, 1689997715, 'Chrome', 'Windows'),
(239, '64c8ad0b4788c', '14.224.160.12', 'vi', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36 Edg/115.0.1901.188', 1, 1690873099, 'Chrome', 'Windows'),
(240, '64cb67a9bddf2', '2402:800:63e5:f', 'en', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36', 1, 1691051945, 'Chrome', 'Windows'),
(241, '64cb69950703a', '14.224.160.12', 'vi', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36 Edg/115.0.1901.188', 1, 1691052437, 'Chrome', 'Windows'),
(242, '64d091b6611ec', '14.224.160.12', 'vi', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36 Edg/115.0.1901.188', 1, 1691390390, 'Chrome', 'Windows'),
(243, '64d4fcb32ead7', '223.27.111.153', 'vi', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36 Edg/115.0.1901.200', 1, 1691679923, 'Chrome', 'Windows'),
(244, '64d9d76a8d941', '14.224.160.12', 'vi', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36 Edg/115.0.1901.200', 1, 1691998058, 'Chrome', 'Windows'),
(245, '64deeb60a2bb6', '2402:800:63e5:f', 'en', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', 1, 1692330848, 'Chrome', 'Windows'),
(246, '64e6c2cdeb4a9', '14.224.160.12', 'vi', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36 Edg/115.0.1901.203', 1, 1692844749, 'Chrome', 'Windows'),
(247, '64eb1941d6052', '223.27.111.153', 'vi', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36 Edg/116.0.1938.54', 1, 1693129025, 'Chrome', 'Windows'),
(248, '64ec5153ad1e1', '14.224.160.12', 'vi', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36 Edg/116.0.1938.62', 1, 1693208915, 'Chrome', 'Windows'),
(249, '64f83ca087454', '14.224.160.12', 'vi', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36 Edg/116.0.1938.69', 1, 1693990048, 'Chrome', 'Windows'),
(250, '655c5cde66819', '::1', 'en', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/119.0.0.0 Safari/537.36', 1, 1700551902, 'Chrome', 'Windows'),
(251, '655c6b108dc70', '::1', 'en', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/119.0.0.0 Safari/537.36', 1, 1700555536, 'Chrome', 'Windows'),
(252, '655c6b689f7b8', '::1', 'en', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/119.0.0.0 Safari/537.36', 1, 1700555624, 'Chrome', 'Windows'),
(253, '659bac63dde29', '::1', 'en', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, 1704701027, 'Chrome', 'Windows'),
(254, '65a77eb9e64ea', '::1', 'en', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, 1705475769, 'Chrome', 'Windows'),
(255, '65b11d8dd7270', '::1', 'en', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, 1706106253, 'Chrome', 'Windows'),
(256, '65b9f23eb3fa9', '::1', 'en', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, 1706684990, 'Chrome', 'Windows');
INSERT INTO `user_visit_log` (`id`, `token`, `ip`, `language`, `user_agent`, `user_id`, `visit_time`, `browser`, `os`) VALUES
(257, '65be159aef6cb', '::1', 'en', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, 1706956187, 'Chrome', 'Windows'),
(258, '65d45cf8bead5', '::1', 'en', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/121.0.0.0 Safari/537.36', 1, 1708416248, 'Chrome', 'Windows'),
(259, '65d45d13e9cbe', '::1', 'en', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/121.0.0.0 Safari/537.36', 1, 1708416275, 'Chrome', 'Windows'),
(260, '65d57006d5478', '::1', 'en', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/121.0.0.0 Safari/537.36', 1, 1708486662, 'Chrome', 'Windows'),
(261, '65d5b60e91649', '::1', 'en', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/121.0.0.0 Safari/537.36', 1, 1708504590, 'Chrome', 'Windows'),
(262, '65d6a615e9dc8', '::1', 'en', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/121.0.0.0 Safari/537.36', 1, 1708566037, 'Chrome', 'Windows'),
(263, '65d9aa7a93d94', '::1', 'en', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/121.0.0.0 Safari/537.36', 1, 1708763770, 'Chrome', 'Windows'),
(264, '65e6d8967c4cc', '::1', 'en', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/122.0.0.0 Safari/537.36', 1, 1709627542, 'Chrome', 'Windows'),
(265, '65e6d8ece255e', '::1', 'en', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/122.0.0.0 Safari/537.36', 1, 1709627628, 'Chrome', 'Windows'),
(266, '65e6d9abc656d', '::1', 'en', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/122.0.0.0 Safari/537.36', 1, 1709627819, 'Chrome', 'Windows'),
(267, '65e6db478df06', '::1', 'en', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/122.0.0.0 Safari/537.36', 1, 1709628231, 'Chrome', 'Windows'),
(268, '65e6dcb8c2e68', '::1', 'en', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/122.0.0.0 Safari/537.36', 1, 1709628600, 'Chrome', 'Windows'),
(269, '65e6e7434b658', '::1', 'vi', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/122.0.0.0 Safari/537.36', 1, 1709631299, 'Chrome', 'Windows'),
(270, '65e6e7e13fc23', '::1', 'vi', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/122.0.0.0 Safari/537.36', 1, 1709631457, 'Chrome', 'Windows'),
(271, '65e7bf5846433', '::1', 'vi', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/122.0.0.0 Safari/537.36', 1, 1709686616, 'Chrome', 'Windows'),
(272, '65e7c0b7f05cd', '::1', 'vi', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/122.0.0.0 Safari/537.36', 1, 1709686967, 'Chrome', 'Windows'),
(273, '65e819dce6961', '::1', 'vi', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/122.0.0.0 Safari/537.36', 1, 1709709788, 'Chrome', 'Windows'),
(274, '65e84175ec616', '::1', 'vi', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/122.0.0.0 Safari/537.36', 1, 1709719925, 'Chrome', 'Windows'),
(275, '65e8ebb79cf03', '::1', 'vi', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/122.0.0.0 Safari/537.36', 1, 1709763511, 'Chrome', 'Windows'),
(276, '65e9182f3765f', '::1', 'vi', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/122.0.0.0 Safari/537.36', 1, 1709774895, 'Chrome', 'Windows'),
(277, '65e966e552f66', '::1', 'vi', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/122.0.0.0 Safari/537.36', 1, 1709795045, 'Chrome', 'Windows'),
(278, '65eda2d2ed406', '::1', 'vi', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/122.0.0.0 Safari/537.36', 1, 1710072531, 'Chrome', 'Windows'),
(279, '65ede075d8974', '::1', 'vi', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/122.0.0.0 Safari/537.36', 1, 1710088309, 'Chrome', 'Windows'),
(280, '65efae05d8051', '::1', 'vi', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/122.0.0.0 Safari/537.36', 1, 1710206469, 'Chrome', 'Windows'),
(281, '65f01b19e2647', '::1', 'vi', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/122.0.0.0 Safari/537.36', 1, 1710234393, 'Chrome', 'Windows'),
(282, '65f0f324a5a06', '::1', 'vi', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/122.0.0.0 Safari/537.36', 1, 1710289700, 'Chrome', 'Windows'),
(283, '66061a24d1f59', '::1', 'en', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/123.0.0.0 Safari/537.36', 1, 1711675940, 'Chrome', 'Windows'),
(284, '660767e99771e', '::1', 'en', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/123.0.0.0 Safari/537.36', 1, 1711761385, 'Chrome', 'Windows'),
(285, '660782599bf61', '::1', 'en', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/123.0.0.0 Safari/537.36', 1, 1711768153, 'Chrome', 'Windows'),
(286, '660cbd5ee81d6', '::1', 'en', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/123.0.0.0 Safari/537.36', 1, 1712110942, 'Chrome', 'Windows'),
(287, '660e57f38a45d', '::1', 'en', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/123.0.0.0 Safari/537.36', 1, 1712216051, 'Chrome', 'Windows'),
(288, '660fbd5a1de84', '::1', 'en', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/123.0.0.0 Safari/537.36', 1, 1712307546, 'Chrome', 'Windows'),
(289, '66160b94623b7', '::1', 'en', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/123.0.0.0 Safari/537.36', 1, 1712720788, 'Chrome', 'Windows'),
(290, '66189e5bc0c2e', '::1', 'en', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/123.0.0.0 Safari/537.36', 1, 1712889435, 'Chrome', 'Windows'),
(291, '661dec4a2b3cf', '::1', 'en', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/123.0.0.0 Safari/537.36', 8, 1713237066, 'Chrome', 'Windows'),
(292, '661dec7bf37dd', '::1', 'en', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/123.0.0.0 Safari/537.36', 1, 1713237115, 'Chrome', 'Windows'),
(293, '661dec8c97569', '::1', 'en', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/123.0.0.0 Safari/537.36', 8, 1713237132, 'Chrome', 'Windows'),
(294, '6620cef09198d', '::1', 'en', 'Mozilla/5.0 (iPhone; CPU iPhone OS 16_6 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/16.6 Mobile/15E148 Safari/604.1', 1, 1713426160, 'iPhone', 'iPhone'),
(295, '6625c133cf5a0', '::1', 'en', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/123.0.0.0 Safari/537.36', 8, 1713750323, 'Chrome', 'Windows'),
(296, '662874f90fddc', '::1', 'en', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/123.0.0.0 Safari/537.36', 1, 1713927417, 'Chrome', 'Windows'),
(297, '662879c7501a4', '::1', 'en', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/123.0.0.0 Safari/537.36', 1, 1713928647, 'Chrome', 'Windows'),
(298, '662894a284193', '::1', 'en', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/123.0.0.0 Safari/537.36', 1, 1713935522, 'Chrome', 'Windows'),
(299, '66289cf4c1b9b', '::1', 'en', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/123.0.0.0 Safari/537.36', 1, 1713937652, 'Chrome', 'Windows'),
(300, '6628a9a81c083', '::1', 'en', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/123.0.0.0 Safari/537.36', 1, 1713940904, 'Chrome', 'Windows'),
(301, '662c74680a82a', '::1', 'en', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', 8, 1714189416, 'Chrome', 'Windows'),
(302, '662efc5c9a303', '::1', 'en', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', 8, 1714355292, 'Chrome', 'Windows'),
(303, '66344aed8c014', '::1', 'en', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', 1, 1714703085, 'Chrome', 'Windows'),
(304, '66344b5f20684', '::1', 'en', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', 8, 1714703199, 'Chrome', 'Windows');

-- --------------------------------------------------------

--
-- Table structure for table `vat_tu`
--

DROP TABLE IF EXISTS `vat_tu`;
CREATE TABLE IF NOT EXISTS `vat_tu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ma_vat_tu` varchar(20) DEFAULT NULL,
  `ten_vat_tu` varchar(255) NOT NULL,
  `so_luong` float NOT NULL,
  `don_gia` float NOT NULL,
  `don_vi_tinh` int(11) DEFAULT NULL,
  `id_loai_vat_tu` int(11) NOT NULL,
  `create_date` datetime DEFAULT NULL,
  `create_user` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `loai_vat_tu` (`id_loai_vat_tu`),
  KEY `don_vi_tinh` (`don_vi_tinh`)
) ENGINE=InnoDB AUTO_INCREMENT=86 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vat_tu`
--

INSERT INTO `vat_tu` (`id`, `ma_vat_tu`, `ten_vat_tu`, `so_luong`, `don_gia`, `don_vi_tinh`, `id_loai_vat_tu`, `create_date`, `create_user`) VALUES
(1, NULL, 'Đá', 3.8, 500000, 1, 1, '2024-03-07 10:58:05', 1),
(2, NULL, 'Đá nhỏ', 3.7, 850000, 1, 1, '2024-03-12 08:51:51', 1),
(3, NULL, 'Cát', 4.2, 7600000, 1, 2, '2024-03-13 07:49:52', 1),
(4, NULL, 'Bê tông nhựa C ≤ 12,5', 0, 2000000, 1, 4, '2024-04-18 09:55:14', NULL),
(5, NULL, 'Bao bố 100x60cm', 0, 20000, 3, 5, '2024-04-18 09:56:19', NULL),
(6, NULL, 'Biển báo tam giác ', 0, 500000, 4, 6, '2024-04-18 09:56:19', NULL),
(7, NULL, 'Biển báo tròn ', 0, 700000, 4, 6, '2024-04-18 09:56:19', NULL),
(8, NULL, 'Cát mịn ML=0,7÷1,4', 0, 0, 5, 7, '2024-04-18 10:53:00', NULL),
(9, NULL, 'Cát mịn ML=1,5÷2,0', 0, 0, 5, 7, '2024-04-18 10:53:00', NULL),
(10, NULL, 'Cát nền', 0, 0, 5, 7, '2024-04-18 10:53:00', NULL),
(11, NULL, 'Cát vàng', 0, 0, 5, 7, '2024-04-18 10:53:00', NULL),
(12, NULL, 'Cấp phối đá dăm loại 1 Dmax=25mm', 0, 0, 5, 8, '2024-04-18 10:53:00', NULL),
(13, NULL, 'CPĐ D loại 2, Dmax=37,5mm', 0, 0, 5, 8, '2024-04-18 10:53:00', NULL),
(14, NULL, 'cừ tràm L cừ =2,7m, ĐK ngọn 4,0-4,4cm', 0, 0, 6, 9, '2024-04-18 10:53:00', NULL),
(15, NULL, 'Cừ   tràm L=4,5 ĐK ngọn 4-4,4cm', 0, 0, 6, 9, '2024-04-18 10:53:00', NULL),
(16, NULL, 'Đá 0,5-1', 0, 0, 5, 8, '2024-04-18 10:53:00', NULL),
(17, NULL, 'Đá 2x4', 0, 0, 5, 8, '2024-04-18 10:53:00', NULL),
(18, NULL, 'Đá 4x6', 0, 0, 5, 8, '2024-04-18 10:53:00', NULL),
(19, NULL, 'Đá 1x2', 0, 0, 5, 8, '2024-04-18 10:53:00', NULL),
(20, NULL, 'Đất dính', 0, 0, 5, 10, '2024-04-18 10:53:00', NULL),
(21, NULL, 'Dây thép', 0, 0, 7, 11, '2024-04-18 10:53:00', NULL),
(22, NULL, 'Nhựa đường', 0, 0, 7, 12, '2024-04-18 10:53:00', NULL),
(23, NULL, 'Nhựa bitum', 0, 0, 7, 12, '2024-04-18 10:53:00', NULL),
(24, NULL, 'Ống bê tông D 300mm- H10, L=4m', 0, 0, 8, 13, '2024-04-18 10:53:00', NULL),
(25, NULL, 'Ống cống bê tông D600mm-H10, L=4m', 0, 0, 8, 13, '2024-04-18 10:53:00', NULL),
(26, NULL, 'Ống cống bê tông D600mm-H30, L=4m', 0, 0, 8, 13, '2024-04-18 10:53:00', NULL),
(27, NULL, 'Ống cống bê tông D800 - H10, L=4m', 0, 0, 8, 13, '2024-04-18 10:53:00', NULL),
(28, NULL, 'Ống cống bê tông D800, H30, L=4m', 0, 0, 8, 13, '2024-04-18 10:53:00', NULL),
(29, NULL, 'Ống nhựa UPVC D180mm dày 6.9mm', 0, 0, 6, 14, '2024-04-18 10:53:00', NULL),
(30, NULL, 'Gioăng cao su D300mm', 0, 0, 3, 15, '2024-04-18 10:53:00', NULL),
(31, NULL, 'Gioăng cao su D600mm', 0, 0, 3, 15, '2024-04-18 10:53:00', NULL),
(32, NULL, 'Gioăng cao su D800mm', 0, 0, 3, 15, '2024-04-18 10:53:00', NULL),
(33, NULL, 'Gối cống D800', 0, 0, 9, 13, '2024-04-18 10:53:00', NULL),
(34, NULL, 'Gối cống D600', 0, 0, 3, 13, '2024-04-18 10:53:00', NULL),
(35, NULL, 'Gối cống ĐK ống 300mm', 0, 0, 3, 13, '2024-04-18 10:53:00', NULL),
(36, NULL, 'Ống sắt tráng kẽm D88 x2,0mm', 0, 0, 6, 16, '2024-04-18 10:53:00', NULL),
(37, NULL, 'Que hàn', 0, 0, 7, 17, '2024-04-18 10:53:00', NULL),
(38, NULL, 'Sơn trắng, đỏ', 0, 0, 7, 18, '2024-04-18 10:53:00', NULL),
(39, NULL, 'Sơn dẻo nhiệt', 0, 0, 7, 18, '2024-04-18 10:53:00', NULL),
(40, NULL, 'Sơn lót', 0, 0, 7, 18, '2024-04-18 10:53:00', NULL),
(41, NULL, 'Thép D6 ', 0, 0, 7, 11, '2024-04-18 10:53:00', NULL),
(42, NULL, 'Thép hình', 0, 0, 7, 11, '2024-04-18 10:53:00', NULL),
(43, NULL, 'Thép hình, thép tấm', 0, 0, 7, 11, '2024-04-18 10:53:00', NULL),
(44, NULL, 'Thép tấm', 0, 0, 7, 11, '2024-04-18 10:53:00', NULL),
(45, NULL, 'Thép tròn Fi ≤10mm', 0, 0, 7, 11, '2024-04-18 10:53:00', NULL),
(46, NULL, 'Vải địa kỹ thuật R17Kn', 0, 0, 10, 19, '2024-04-18 10:53:00', NULL),
(47, NULL, 'Vải ni long', 0, 0, 10, 19, '2024-04-18 10:53:00', NULL),
(48, NULL, 'Bộ song chắn rác bó vỉa bằng gang tải trọng 250KN', 0, 0, 4, 20, '2024-04-18 10:53:00', NULL),
(49, NULL, 'lưới chắn rác bằng Composite tải trọng 250KN', 0, 0, 4, 20, '2024-04-18 10:53:00', NULL),
(50, NULL, 'Van cửa lật ngăn mùi HDPE  DN200', 0, 0, 4, 3, '2024-04-18 10:53:00', NULL),
(51, NULL, 'Vôi cục', 0, 0, 7, 21, '2024-04-18 10:53:00', NULL),
(52, NULL, 'Xi măng PCB40', 0, 0, 7, 22, '2024-04-18 10:53:00', NULL),
(53, NULL, 'gạch Tarazo màu vỉa hè-KT 300x300x50mm', 0, 0, 10, 23, '2024-04-18 10:53:00', NULL),
(54, NULL, 'Khí gas', 0, 0, 7, 24, '2024-04-18 10:53:00', NULL),
(55, NULL, 'Mỡ bôi trơn', 0, 0, 7, 3, '2024-04-18 10:53:00', NULL),
(56, NULL, 'Nắp hố ga bằng gang tải trọng 250KN', 0, 0, 4, 25, '2024-04-18 10:53:00', NULL),
(57, NULL, 'Nắp hố ga bằng gang tải trọng 400KN', 0, 0, 4, 25, '2024-04-18 10:53:00', NULL),
(58, NULL, 'Dầu hỏa', 0, 0, 7, 26, '2024-04-18 10:53:00', NULL),
(59, NULL, 'Cây cảnh, kiểng trổ hoa', 0, 0, 11, 27, '2024-04-18 10:53:00', NULL),
(60, NULL, 'Cây chống', 0, 0, 11, 3, '2024-04-18 10:53:00', NULL),
(61, NULL, 'Cọc chống dài bq 2,5m', 0, 0, 12, 3, '2024-04-18 10:53:00', NULL),
(62, NULL, 'Cót ép', 0, 0, 6, 3, '2024-04-18 10:53:00', NULL),
(63, NULL, 'Dây nilon', 0, 0, 7, 3, '2024-04-18 10:53:00', NULL),
(64, NULL, 'Phân hữu cơ', 0, 0, 7, 27, '2024-04-18 10:53:00', NULL),
(65, NULL, 'Tro trấu, xơ dừa', 0, 0, 5, 27, '2024-04-18 10:53:00', NULL),
(66, NULL, 'Lắp đặt trụ bác giác STK cao 6m + bulong khung móng làm sẵn', 0, 0, 13, 3, '2024-04-18 10:53:00', NULL),
(67, NULL, 'Lắp cần đèn STK 060, chiều cao 2m, vươn xa 1,5m', 0, 0, 4, 3, '2024-04-18 10:53:00', NULL),
(68, NULL, 'Lắp bóng Led cao áp 125W', 0, 0, 4, 3, '2024-04-18 10:53:00', NULL),
(69, NULL, 'Cầu nối dây cửa cột', 0, 0, 3, 3, '2024-04-18 10:53:00', NULL),
(70, NULL, 'Lắp đặt dây dẫn 2 ruột Duplex 2x10mm2', 0, 0, 6, 3, '2024-04-18 10:53:00', NULL),
(71, NULL, 'Lắp đặt dây dẫn 2 ruột Duplex 2x16mm2', 0, 0, 6, 3, '2024-04-18 10:53:00', NULL),
(72, NULL, 'Rải cáp ngầm Cu/PVC/CXV/DSTA 2x10mm2', 0, 0, 6, 3, '2024-04-18 10:53:00', NULL),
(73, NULL, 'Rải cáp ngầm Cu/PVC/CXV/DSTA 2x16mm2', 0, 0, 6, 3, '2024-04-18 10:53:00', NULL),
(74, NULL, 'Luồn dây lên đèn Cu/PVC/VVCm 2x2,5mm2', 0, 0, 6, 3, '2024-04-18 10:53:00', NULL),
(75, NULL, 'Lắp đặt các aptomat loại 1 pha cửa cột, cường độ dòng điện 6Ampe', 0, 0, 3, 3, '2024-04-18 10:53:00', NULL),
(76, NULL, 'Lắp đặt ống nhựa HDPE gân xoắn bảo vệ cáp ngầm L40/50mm', 0, 0, 6, 3, '2024-04-18 10:53:00', NULL),
(77, NULL, 'Kéo rải dây tiếp địa 25mm2', 0, 0, 6, 3, '2024-04-18 10:53:00', NULL),
(78, NULL, 'Đóng cọc tiếp địa mạ đồng L16, L=2,4m', 0, 0, 12, 3, '2024-04-18 10:53:00', NULL),
(79, NULL, 'Lắp đặt tủ điện điều khiển chiếu sáng tự động', 0, 0, 14, 3, '2024-04-18 10:53:00', NULL),
(80, NULL, 'Băng cảnh báo cáp ngầm', 0, 0, 6, 3, '2024-04-18 10:53:00', NULL),
(81, NULL, 'Ván cốp pha đen', 0, 0, 15, 3, '2024-04-18 10:53:00', NULL),
(82, NULL, 'Ván phủ phim 18li  (1,22x2,44)', 0, 0, 15, 3, '2024-04-18 10:53:00', NULL),
(83, NULL, 'Bê tông Mác 250 R28', 0, 0, 5, 28, '2024-04-18 10:53:00', NULL),
(84, NULL, 'Bê tông Mác 200 R28', 0, 0, 5, 28, '2024-04-18 10:53:00', NULL),
(85, NULL, 'Bê tông Mác 150 R28', 0, 0, 5, 28, '2024-04-18 10:53:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `vat_tu_boc_tach`
--

DROP TABLE IF EXISTS `vat_tu_boc_tach`;
CREATE TABLE IF NOT EXISTS `vat_tu_boc_tach` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `so_luong` float NOT NULL,
  `don_gia` double DEFAULT NULL,
  `id_cong_trinh` int(11) NOT NULL,
  `id_vat_tu` int(11) NOT NULL,
  `create_date` datetime DEFAULT NULL,
  `create_user` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `vat_tu` (`id_vat_tu`),
  KEY `id_cong_trinh` (`id_cong_trinh`)
) ENGINE=InnoDB AUTO_INCREMENT=104 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vat_tu_boc_tach`
--

INSERT INTO `vat_tu_boc_tach` (`id`, `so_luong`, `don_gia`, `id_cong_trinh`, `id_vat_tu`, `create_date`, `create_user`) VALUES
(4, 4999, 500000, 1, 1, '2024-04-10 08:29:25', 1),
(7, 1001, 850000, 1, 2, '2024-04-10 09:56:53', NULL),
(8, 99, 7600000, 1, 3, '2024-04-10 10:00:53', NULL),
(9, 1000, 500000, 9, 1, '2024-04-10 14:04:51', 1),
(10, 500, 7600000, 9, 3, '2024-04-10 14:05:03', 1),
(11, 1000, 500000, 3, 1, '2024-04-16 10:04:47', 1),
(12, 1000, 850000, 3, 2, '2024-04-16 10:05:14', 1),
(13, 1879.09, 0, 9, 4, '2024-04-18 09:56:19', NULL),
(14, 268, 0, 9, 5, '2024-04-18 09:56:19', NULL),
(15, 60, 0, 9, 6, '2024-04-18 09:56:19', NULL),
(16, 10, 0, 9, 7, '2024-04-18 09:56:19', NULL),
(17, 1879.09, 2000000, 1, 4, '2024-04-18 10:01:00', NULL),
(18, 268, 20000, 1, 5, '2024-04-18 10:01:00', NULL),
(19, 60, 500000, 1, 6, '2024-04-18 10:01:00', NULL),
(20, 10, 700000, 1, 7, '2024-04-18 10:01:00', NULL),
(21, 1879.09, 2000000, 1, 4, '2024-04-18 10:53:00', NULL),
(22, 268, 20000, 1, 5, '2024-04-18 10:53:00', NULL),
(23, 60, 500000, 1, 6, '2024-04-18 10:53:00', NULL),
(24, 10, 700000, 1, 7, '2024-04-18 10:53:00', NULL),
(25, 13.2867, 0, 1, 8, '2024-04-18 10:53:00', NULL),
(26, 450.711, 0, 1, 9, '2024-04-18 10:53:00', NULL),
(27, 17142.2, 0, 1, 10, '2024-04-18 10:53:00', NULL),
(28, 1682.58, 0, 1, 11, '2024-04-18 10:53:00', NULL),
(29, 3009.59, 0, 1, 12, '2024-04-18 10:53:00', NULL),
(30, 2325.77, 0, 1, 13, '2024-04-18 10:53:00', NULL),
(31, 31723.7, 0, 1, 14, '2024-04-18 10:53:00', NULL),
(32, 17235, 0, 1, 15, '2024-04-18 10:53:00', NULL),
(33, 91.9521, 0, 1, 16, '2024-04-18 10:53:00', NULL),
(34, 6.3671, 0, 1, 17, '2024-04-18 10:53:00', NULL),
(35, 239.776, 0, 1, 18, '2024-04-18 10:53:00', NULL),
(36, 2406.1, 0, 1, 19, '2024-04-18 10:53:00', NULL),
(37, 1895.37, 0, 1, 20, '2024-04-18 10:53:00', NULL),
(38, 487.819, 0, 1, 21, '2024-04-18 10:53:00', NULL),
(39, 8578.57, 0, 1, 22, '2024-04-18 10:53:00', NULL),
(40, 12176.3, 0, 1, 23, '2024-04-18 10:53:00', NULL),
(41, 30, 0, 1, 24, '2024-04-18 10:53:00', NULL),
(42, 1388, 0, 1, 25, '2024-04-18 10:53:00', NULL),
(43, 30, 0, 1, 26, '2024-04-18 10:53:00', NULL),
(44, 146, 0, 1, 27, '2024-04-18 10:53:00', NULL),
(45, 8, 0, 1, 28, '2024-04-18 10:53:00', NULL),
(46, 256.944, 0, 1, 29, '2024-04-18 10:53:00', NULL),
(47, 284, 0, 1, 30, '2024-04-18 10:53:00', NULL),
(48, 937, 0, 1, 31, '2024-04-18 10:53:00', NULL),
(49, 128, 0, 1, 32, '2024-04-18 10:53:00', NULL),
(50, 256, 0, 1, 33, '2024-04-18 10:53:00', NULL),
(51, 2394, 0, 1, 34, '2024-04-18 10:53:00', NULL),
(52, 48, 0, 1, 35, '2024-04-18 10:53:00', NULL),
(53, 151.1, 0, 1, 36, '2024-04-18 10:53:00', NULL),
(54, 488.455, 0, 1, 37, '2024-04-18 10:53:00', NULL),
(55, 37.163, 0, 1, 38, '2024-04-18 10:53:00', NULL),
(56, 1551.55, 0, 1, 39, '2024-04-18 10:53:00', NULL),
(57, 74.7375, 0, 1, 40, '2024-04-18 10:53:00', NULL),
(58, 82.96, 0, 1, 41, '2024-04-18 10:53:00', NULL),
(59, 4521.51, 0, 1, 42, '2024-04-18 10:53:00', NULL),
(60, 107.828, 0, 1, 43, '2024-04-18 10:53:00', NULL),
(61, 6321.11, 0, 1, 44, '2024-04-18 10:53:00', NULL),
(62, 11.224, 0, 1, 44, '2024-04-18 10:53:00', NULL),
(63, 29557.7, 0, 1, 45, '2024-04-18 10:53:00', NULL),
(64, 18295.1, 0, 1, 46, '2024-04-18 10:53:00', NULL),
(65, 27126.7, 0, 1, 47, '2024-04-18 10:53:00', NULL),
(66, 210, 0, 1, 48, '2024-04-18 10:53:00', NULL),
(67, 56, 0, 1, 49, '2024-04-18 10:53:00', NULL),
(68, 411, 0, 1, 50, '2024-04-18 10:53:00', NULL),
(69, 101.658, 0, 1, 51, '2024-04-18 10:53:00', NULL),
(70, 957732, 0, 1, 52, '2024-04-18 10:53:00', NULL),
(71, 15208.5, 0, 1, 53, '2024-04-18 10:53:00', NULL),
(72, 45.4404, 0, 1, 54, '2024-04-18 10:53:00', NULL),
(73, 90.61, 0, 1, 55, '2024-04-18 10:53:00', NULL),
(74, 244, 0, 1, 56, '2024-04-18 10:53:00', NULL),
(75, 1, 0, 1, 57, '2024-04-18 10:53:00', NULL),
(76, 4969.61, 0, 1, 58, '2024-04-18 10:53:00', NULL),
(77, 32, 0, 1, 59, '2024-04-18 10:53:00', NULL),
(78, 169, 0, 1, 60, '2024-04-18 10:53:00', NULL),
(79, 201, 0, 1, 61, '2024-04-18 10:53:00', NULL),
(80, 268, 0, 1, 62, '2024-04-18 10:53:00', NULL),
(81, 272.69, 0, 1, 63, '2024-04-18 10:53:00', NULL),
(82, 904.5, 0, 1, 64, '2024-04-18 10:53:00', NULL),
(83, 10.05, 0, 1, 65, '2024-04-18 10:53:00', NULL),
(84, 140, 0, 1, 66, '2024-04-18 10:53:00', NULL),
(85, 140, 0, 1, 67, '2024-04-18 10:53:00', NULL),
(86, 140, 0, 1, 68, '2024-04-18 10:53:00', NULL),
(87, 140, 0, 1, 69, '2024-04-18 10:53:00', NULL),
(88, 70, 0, 1, 70, '2024-04-18 10:53:00', NULL),
(89, 10, 0, 1, 71, '2024-04-18 10:53:00', NULL),
(90, 3852.94, 0, 1, 72, '2024-04-18 10:53:00', NULL),
(91, 763.28, 0, 1, 73, '2024-04-18 10:53:00', NULL),
(92, 1366.19, 0, 1, 74, '2024-04-18 10:53:00', NULL),
(93, 158, 0, 1, 75, '2024-04-18 10:53:00', NULL),
(94, 4623, 0, 1, 76, '2024-04-18 10:53:00', NULL),
(95, 312, 0, 1, 77, '2024-04-18 10:53:00', NULL),
(96, 151, 0, 1, 78, '2024-04-18 10:53:00', NULL),
(97, 8, 0, 1, 79, '2024-04-18 10:53:00', NULL),
(98, 4047.82, 0, 1, 80, '2024-04-18 10:53:00', NULL),
(99, 0, 0, 1, 81, '2024-04-18 10:53:00', NULL),
(100, 0, 0, 1, 82, '2024-04-18 10:53:00', NULL),
(101, 1435.06, 0, 1, 83, '2024-04-18 10:53:00', NULL),
(102, 345.505, 0, 1, 84, '2024-04-18 10:53:00', NULL),
(103, 1388, 0, 1, 85, '2024-04-18 10:53:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `vat_tu_ke_hoach`
--

DROP TABLE IF EXISTS `vat_tu_ke_hoach`;
CREATE TABLE IF NOT EXISTS `vat_tu_ke_hoach` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `so_luong_yeu_cau` float NOT NULL,
  `so_luong_duoc_duyet` float DEFAULT NULL,
  `id_phieu_xuat_kho` int(11) NOT NULL,
  `id_vat_tu` int(11) NOT NULL,
  `don_gia` double DEFAULT NULL,
  `ghi_chu` text,
  `id_nguoi_duyet` int(11) DEFAULT NULL,
  `trang_thai` varchar(15) NOT NULL,
  `create_date` datetime DEFAULT NULL,
  `create_user` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_phieu_xuat_kho` (`id_phieu_xuat_kho`),
  KEY `id_nguoi_duyet` (`id_nguoi_duyet`),
  KEY `id_vat_tu` (`id_vat_tu`)
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vat_tu_ke_hoach`
--

INSERT INTO `vat_tu_ke_hoach` (`id`, `so_luong_yeu_cau`, `so_luong_duoc_duyet`, `id_phieu_xuat_kho`, `id_vat_tu`, `don_gia`, `ghi_chu`, `id_nguoi_duyet`, `trang_thai`, `create_date`, `create_user`) VALUES
(36, 2, NULL, 121, 1, 500000, '', NULL, 'MOI', '2024-04-24 10:31:13', 1),
(37, 1, NULL, 121, 3, 7600000, '', NULL, 'MOI', '2024-04-26 09:39:31', 1),
(38, 1, 1, 135, 1, 500000, '', NULL, 'DA_DUYET', '2024-04-29 10:15:50', 8),
(39, 100, 100, 135, 2, 850000, '', NULL, 'DA_DUYET', '2024-04-29 10:15:56', 8),
(40, 1, 1, 134, 1, 500000, '', NULL, 'DA_DUYET', '2024-04-29 10:31:52', 1),
(41, 1, 1, 136, 1, 500000, '', NULL, 'DA_DUYET', '2024-04-29 15:35:55', 8),
(42, 100, 100, 137, 1, 500000, '', NULL, 'DA_DUYET', '2024-05-02 08:47:07', 1),
(43, 100, 50, 138, 1, 500000, '', NULL, 'DA_DUYET', '2024-05-02 09:49:08', 1),
(44, 200, 100, 138, 2, 850000, '', NULL, 'DA_DUYET', '2024-05-02 09:49:15', 1),
(45, 1, 1, 139, 1, 500000, '', NULL, 'DA_DUYET', '2024-05-02 09:52:06', 1),
(46, 10, 10, 140, 1, 500000, '', NULL, 'DA_DUYET', '2024-05-02 16:08:04', 1),
(47, 1, NULL, 143, 1, 500000, '', NULL, 'MOI', '2024-05-04 10:33:48', 8),
(48, 1, 1, 144, 1, 500000, '', NULL, 'DA_DUYET', '2024-05-04 13:51:19', 1),
(49, 1, 1, 145, 1, 500000, '', NULL, 'MOI', '2024-05-04 13:55:48', 8),
(50, 1, 1, 146, 1, 500000, '', NULL, 'MOI', '2024-05-04 13:56:40', 8),
(51, 10, 10, 147, 2, 850000, '', NULL, 'MOI', '2024-05-04 14:21:18', 8),
(52, 100, NULL, 148, 1, 500000, '', NULL, 'MOI', '2024-05-04 14:52:39', 1);

-- --------------------------------------------------------

--
-- Table structure for table `vat_tu_xuat`
--

DROP TABLE IF EXISTS `vat_tu_xuat`;
CREATE TABLE IF NOT EXISTS `vat_tu_xuat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `so_luong_yeu_cau` float NOT NULL,
  `so_luong_duoc_duyet` float DEFAULT NULL,
  `id_phieu_xuat_kho` int(11) NOT NULL,
  `id_vat_tu` int(11) NOT NULL,
  `don_gia` double DEFAULT NULL,
  `ghi_chu` text,
  `id_nguoi_duyet` int(11) DEFAULT NULL,
  `trang_thai` varchar(15) NOT NULL,
  `create_date` datetime DEFAULT NULL,
  `create_user` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_phieu_xuat_kho` (`id_phieu_xuat_kho`),
  KEY `id_nguoi_duyet` (`id_nguoi_duyet`),
  KEY `id_vat_tu` (`id_vat_tu`)
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vat_tu_xuat`
--

INSERT INTO `vat_tu_xuat` (`id`, `so_luong_yeu_cau`, `so_luong_duoc_duyet`, `id_phieu_xuat_kho`, `id_vat_tu`, `don_gia`, `ghi_chu`, `id_nguoi_duyet`, `trang_thai`, `create_date`, `create_user`) VALUES
(1, 100, 15, 1, 1, 100000, '', 1, 'MOI', NULL, NULL),
(12, 105, 105, 1, 2, 850000, '', NULL, 'DA_DUYET', '2024-04-01 09:58:33', 1),
(18, 1, NULL, 42, 1, 500000, '', NULL, 'moi', '2024-04-05 10:39:03', 1),
(20, 150, NULL, 94, 1, 500000, '', NULL, 'MOI', '2024-04-08 08:56:00', 1),
(21, 1, 0, 1, 3, 7600000, '', NULL, 'MOI', '2024-04-08 14:54:25', 1),
(22, 101, NULL, 97, 1, 500000, '', NULL, 'MOI', '2024-04-08 14:59:47', 1),
(25, 3, NULL, 97, 2, 850000, '', NULL, 'MOI', '2024-04-08 15:19:36', 1),
(26, 1, 1, 98, 1, 500000, '', NULL, 'DA_DUYET', '2024-04-10 09:11:56', NULL),
(27, 1, NULL, 97, 3, 7600000, '', NULL, 'MOI', '2024-04-10 09:50:47', NULL),
(28, 100, 100, 102, 1, 500000, '', NULL, 'DA_DUYET', '2024-04-10 14:08:43', 1),
(29, 50, 25, 102, 3, 7600000, '', NULL, 'DA_DUYET', '2024-04-10 14:09:40', 1),
(30, 1000, 1000, 101, 1, 500000, '', NULL, 'DA_DUYET', '2024-04-10 14:11:30', 1),
(31, 50, 50, 101, 3, 7600000, '', NULL, 'DA_DUYET', '2024-04-10 14:11:39', 1),
(32, 1, NULL, 103, 1, 500000, '', NULL, 'MOI', '2024-04-10 15:04:01', 1),
(33, 1, NULL, 104, 1, 500000, '', NULL, 'MOI', '2024-04-16 10:02:19', 1),
(34, 10, NULL, 105, 2, 850000, '', NULL, 'MOI', '2024-04-16 10:03:10', 1),
(35, 100, NULL, 106, 1, 500000, '', NULL, 'MOI', '2024-04-16 10:07:22', 1),
(38, 1, NULL, 107, 1, 500000, '', NULL, 'MOI', '2024-04-24 12:47:49', 1),
(40, 1, NULL, 107, 2, 850000, '', NULL, 'MOI', '2024-04-24 13:42:18', 1),
(41, 2, NULL, 108, 1, 500000, '', NULL, 'MOI', '2024-04-26 14:24:07', 1),
(42, 1, 1, 111, 1, 500000, '', NULL, 'DA_DUYET', '2024-04-29 10:24:40', 1),
(43, 1, 1, 111, 2, 850000, '', NULL, 'DA_DUYET', '2024-04-29 10:24:43', 1),
(44, 50, 50, 114, 1, 500000, '', NULL, 'DA_DUYET', '2024-05-02 16:01:30', 1),
(45, 2, NULL, 115, 1, 500000, '', NULL, 'MOI', '2024-05-03 15:08:03', 1),
(46, 10, 10, 116, 1, 500000, '', NULL, 'DA_DUYET', '2024-05-03 15:16:44', 1),
(47, 1, 1, 117, 1, 500000, '', NULL, 'DA_DUYET', '2024-05-03 15:20:18', 1),
(48, 30, 30, 118, 1, 500000, '', NULL, 'DA_DUYET', '2024-05-03 15:53:17', 1),
(49, 1, 1, 122, 1, 500000, '', NULL, 'MOI', '2024-05-04 14:26:08', 1),
(50, 1, 1, 122, 2, 850000, '', NULL, 'MOI', '2024-05-04 14:26:23', 1),
(51, 5, 5, 123, 2, 850000, '', NULL, 'MOI', '2024-05-04 14:34:10', 1),
(52, 1, NULL, 124, 2, 850000, '', NULL, 'MOI', '2024-05-04 14:45:57', 1);

-- --------------------------------------------------------

--
-- Table structure for table `xe`
--

DROP TABLE IF EXISTS `xe`;
CREATE TABLE IF NOT EXISTS `xe` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `hieu_xe` varchar(255) NOT NULL,
  `hang_xe` varchar(255) DEFAULT NULL,
  `nam_san_xuat` year(4) DEFAULT NULL,
  `bien_so_xe` varchar(15) NOT NULL,
  `hinh_xe` varchar(255) DEFAULT NULL,
  `create_date` datetime DEFAULT NULL,
  `create_user` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `xe`
--

INSERT INTO `xe` (`id`, `hieu_xe`, `hang_xe`, `nam_san_xuat`, `bien_so_xe`, `hinh_xe`, `create_date`, `create_user`) VALUES
(13, 'Jaki', 'Yamaha', 1996, '84F1-55722', 'images/1710144883_logo1.jpg', '2024-03-11 15:14:43', NULL),
(14, 'Yasaki', 'Toyota', 1998, '84K1-552.03', 'images/1710158740_xe01.jfif', '2024-03-11 19:05:40', NULL),
(15, 'JTK', 'ToYota', 1999, '84F1-53201', 'images/1710158797_xe02.jfif', '2024-03-11 19:06:37', NULL);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD CONSTRAINT `auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `auth_assignment_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `auth_item`
--
ALTER TABLE `auth_item`
  ADD CONSTRAINT `auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_auth_item_group_code` FOREIGN KEY (`group_code`) REFERENCES `auth_item_group` (`code`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD CONSTRAINT `auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `cong_trinh`
--
ALTER TABLE `cong_trinh`
  ADD CONSTRAINT `cong_trinh_ibfk_1` FOREIGN KEY (`p_id`) REFERENCES `cong_trinh` (`id`);

--
-- Constraints for table `ke_hoach_phan_quyen`
--
ALTER TABLE `ke_hoach_phan_quyen`
  ADD CONSTRAINT `ke_hoach_phan_quyen_ibfk_1` FOREIGN KEY (`id_ke_hoach`) REFERENCES `ke_hoach_xuat_kho` (`id`),
  ADD CONSTRAINT `ke_hoach_phan_quyen_ibfk_2` FOREIGN KEY (`id_nguoi_dung`) REFERENCES `user` (`id`);

--
-- Constraints for table `ke_hoach_xuat_kho`
--
ALTER TABLE `ke_hoach_xuat_kho`
  ADD CONSTRAINT `ke_hoach_xuat_kho_ibfk_1` FOREIGN KEY (`id_cong_trinh`) REFERENCES `cong_trinh` (`id`);

--
-- Constraints for table `phieu_xuat_kho`
--
ALTER TABLE `phieu_xuat_kho`
  ADD CONSTRAINT `cong_trinh` FOREIGN KEY (`id_cong_trinh`) REFERENCES `cong_trinh` (`id`),
  ADD CONSTRAINT `nguoi_duyet` FOREIGN KEY (`id_nguoi_duyet`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `phieu_xuat_kho_ibfk_1` FOREIGN KEY (`id_ke_hoach`) REFERENCES `ke_hoach_xuat_kho` (`id`),
  ADD CONSTRAINT `tai_xe` FOREIGN KEY (`id_tai_xe`) REFERENCES `tai_xe` (`id`),
  ADD CONSTRAINT `xe` FOREIGN KEY (`id_xe`) REFERENCES `xe` (`id`),
  ADD CONSTRAINT `yeu_cau` FOREIGN KEY (`id_bo_phan_yc`) REFERENCES `user` (`id`);

--
-- Constraints for table `user_visit_log`
--
ALTER TABLE `user_visit_log`
  ADD CONSTRAINT `user_visit_log_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `vat_tu`
--
ALTER TABLE `vat_tu`
  ADD CONSTRAINT `loai_vat_tu` FOREIGN KEY (`id_loai_vat_tu`) REFERENCES `loai_vat_tu` (`id`),
  ADD CONSTRAINT `vat_tu_ibfk_1` FOREIGN KEY (`don_vi_tinh`) REFERENCES `don_vi_tinh` (`id`);

--
-- Constraints for table `vat_tu_boc_tach`
--
ALTER TABLE `vat_tu_boc_tach`
  ADD CONSTRAINT `id_cong_trinh` FOREIGN KEY (`id_cong_trinh`) REFERENCES `cong_trinh` (`id`),
  ADD CONSTRAINT `vat_tu` FOREIGN KEY (`id_vat_tu`) REFERENCES `vat_tu` (`id`);

--
-- Constraints for table `vat_tu_ke_hoach`
--
ALTER TABLE `vat_tu_ke_hoach`
  ADD CONSTRAINT `vat_tu_ke_hoach_ibfk_1` FOREIGN KEY (`id_phieu_xuat_kho`) REFERENCES `ke_hoach_xuat_kho` (`id`),
  ADD CONSTRAINT `vat_tu_ke_hoach_ibfk_2` FOREIGN KEY (`id_vat_tu`) REFERENCES `vat_tu` (`id`);

--
-- Constraints for table `vat_tu_xuat`
--
ALTER TABLE `vat_tu_xuat`
  ADD CONSTRAINT `id_nguoi_duyet` FOREIGN KEY (`id_nguoi_duyet`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `id_phieu_xuat_kho` FOREIGN KEY (`id_phieu_xuat_kho`) REFERENCES `phieu_xuat_kho` (`id`),
  ADD CONSTRAINT `id_vat_tu` FOREIGN KEY (`id_vat_tu`) REFERENCES `vat_tu` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
