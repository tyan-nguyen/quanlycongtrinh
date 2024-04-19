-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 05, 2024 at 08:52 AM
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
-- Database: `qlvt_2`
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
('bientapvien', 1, 1570155479),
('Default', 1, 1556454369),
('thongketruycap', 1, 1687142184);

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
('bientapvien', 1, 'Biên tập viên', NULL, NULL, 1570120917, 1570120917, NULL),
('bindUserToIp', 2, 'Bind user to IP', NULL, NULL, 1426062189, 1426062189, 'userManagement'),
('cauhinh', 2, 'Cấu hình', NULL, NULL, 1570156160, 1570156160, 'userCommonPermissions'),
('changeOwnPassword', 2, 'Change own password', NULL, NULL, 1426062189, 1426062189, 'userCommonPermissions'),
('changeUserPassword', 2, 'Change user password', NULL, NULL, 1426062189, 1426062189, 'userManagement'),
('commonPermission', 2, 'Common permission', NULL, NULL, 1426062188, 1426062188, NULL),
('createUsers', 2, 'Create users', NULL, NULL, 1426062189, 1426062189, 'userManagement'),
('dangtin', 2, 'Đăng tin', NULL, NULL, 1570156034, 1570156034, 'userCommonPermissions'),
('Default', 1, 'Default', NULL, NULL, 1555604497, 1555604497, NULL),
('deleteUsers', 2, 'Delete users', NULL, NULL, 1426062189, 1426062189, 'userManagement'),
('duyettin', 1, 'Duyệt tin', NULL, NULL, 1570120962, 1570120962, NULL),
('editUserEmail', 2, 'Edit user email', NULL, NULL, 1426062189, 1426062189, 'userManagement'),
('editUsers', 2, 'Edit users', NULL, NULL, 1426062189, 1426062189, 'userManagement'),
('per_dashboard', 2, 'Access Dashboard', NULL, NULL, 1664291118, 1664291118, 'userManagement'),
('permission_thongketruycap', 2, 'Thống kê truy cập', NULL, NULL, 1586086798, 1586086798, 'userCommonPermissions'),
('qltaikhoan', 2, 'Quản lý tài khoản', NULL, NULL, 1570156229, 1570156229, 'userManagement'),
('thongketruycap', 1, 'Thống kê truy cập', NULL, NULL, 1586086766, 1586086766, NULL),
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
('bientapvien', 'changeOwnPassword'),
('duyettin', 'changeOwnPassword'),
('user-default', 'changeOwnPassword'),
('Admin', 'changeUserPassword'),
('Admin', 'createUsers'),
('Admin', 'dangtin'),
('bientapvien', 'dangtin'),
('duyettin', 'dangtin'),
('Admin', 'deleteUsers'),
('Admin', 'editUsers'),
('bientapvien', 'per_dashboard'),
('thongketruycap', 'permission_thongketruycap'),
('Admin', 'qltaikhoan'),
('Default', 'thongketruycap'),
('Admin', 'truycaptrangadmin'),
('bientapvien', 'truycaptrangadmin'),
('Default', 'truycaptrangadmin'),
('duyettin', 'truycaptrangadmin'),
('Admin', 'user-default'),
('bientapvien', 'user-default'),
('Default', 'user-default'),
('duyettin', 'user-default'),
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `confirmation_token`, `status`, `superadmin`, `created_at`, `updated_at`, `registration_ip`, `bind_to_ip`, `email`, `email_confirmed`, `name`, `phone`, `address`, `id_phong`) VALUES
(1, 'superadmin@gmail.com', 'kz2px152FAWlkHbkZoCiXgBAd-S8SSjF', '$2y$13$DSISRUJSkr4CPeb3Ciwl1u3ubaGF50gXzzgTaDmpi5ph2Hie8JL9q', NULL, 1, 1, 1426062188, 1586049758, NULL, '', 'superadmin@gmail.com', 1, 'Mr. Admin 1', '374711908', 'Càng Long - Trà Vinh 1', 1);

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
) ENGINE=InnoDB AUTO_INCREMENT=269 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
(268, '65e6dcb8c2e68', '::1', 'en', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/122.0.0.0 Safari/537.36', 1, 1709628600, 'Chrome', 'Windows');

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
-- Constraints for table `user_visit_log`
--
ALTER TABLE `user_visit_log`
  ADD CONSTRAINT `user_visit_log_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
