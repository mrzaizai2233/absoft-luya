-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1:3306
-- Thời gian đã tạo: Th1 07, 2019 lúc 10:44 AM
-- Phiên bản máy phục vụ: 5.7.21
-- Phiên bản PHP: 7.0.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `luya`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin_auth`
--

DROP TABLE IF EXISTS `admin_auth`;
CREATE TABLE IF NOT EXISTS `admin_auth` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `alias_name` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `module_name` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `is_crud` tinyint(1) DEFAULT '0',
  `route` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `api` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `index_route` (`route`),
  KEY `index_api` (`api`)
) ENGINE=MyISAM AUTO_INCREMENT=51 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `admin_auth`
--

INSERT INTO `admin_auth` (`id`, `alias_name`, `module_name`, `is_crud`, `route`, `api`) VALUES
(1, 'menu_access_item_user', 'admin', 1, '0', 'api-admin-user'),
(2, 'menu_access_item_apiuser', 'admin', 1, '0', 'api-admin-apiuser'),
(3, 'menu_access_item_group', 'admin', 1, '0', 'api-admin-group'),
(4, 'menu_system_item_config', 'admin', 1, '0', 'api-admin-config'),
(5, 'menu_system_item_language', 'admin', 1, '0', 'api-admin-lang'),
(6, 'menu_system_item_tags', 'admin', 1, '0', 'api-admin-tag'),
(7, 'menu_system_logger', 'admin', 1, '0', 'api-admin-logger'),
(8, 'menu_images_item_effects', 'admin', 1, '0', 'api-admin-effect'),
(9, 'menu_images_item_filters', 'admin', 1, '0', 'api-admin-filter'),
(10, 'menu_group_contentproxy_machines', 'admin', 1, '0', 'api-admin-proxymachine'),
(11, 'menu_group_contentproxy_builds', 'admin', 1, '0', 'api-admin-proxybuild'),
(12, 'menu_node_filemanager', 'admin', 0, 'admin/storage/index', '0'),
(13, 'module_permission_page_blocks', 'cmsadmin', 1, '0', 'api-cms-navitempageblockitem'),
(14, 'module_permission_page', 'cmsadmin', 1, '0', 'api-cms-navitempage'),
(15, 'menu_group_item_env_container', 'cmsadmin', 1, '0', 'api-cms-navcontainer'),
(16, 'menu_group_item_env_layouts', 'cmsadmin', 1, '0', 'api-cms-layout'),
(17, 'menu_group_item_env_redirections', 'cmsadmin', 1, '0', 'api-cms-redirect'),
(18, 'menu_group_item_elements_group', 'cmsadmin', 1, '0', 'api-cms-blockgroup'),
(19, 'menu_group_item_elements_blocks', 'cmsadmin', 1, '0', 'api-cms-block'),
(20, 'module_permission_add_new_page', 'cmsadmin', 0, 'cmsadmin/page/create', '0'),
(21, 'module_permission_update_pages', 'cmsadmin', 0, 'cmsadmin/page/update', '0'),
(22, 'module_permission_delete_pages', 'cmsadmin', 0, 'cmsadmin/page/delete', '0'),
(23, 'module_permission_edit_drafts', 'cmsadmin', 0, 'cmsadmin/page/drafts', '0'),
(24, 'menu_group_item_env_config', 'cmsadmin', 0, 'cmsadmin/config/index', '0'),
(25, 'menu_node_cms', 'cmsadmin', 0, 'cmsadmin/default/index', '0'),
(26, 'menu_group_item_env_permission', 'cmsadmin', 0, 'cmsadmin/permission/index', '0'),
(44, 'Producers', 'estoreadmin', 1, '0', 'api-estore-producer'),
(43, 'Currencies', 'estoreadmin', 1, '0', 'api-estore-currency'),
(42, 'Prices', 'estoreadmin', 1, '0', 'api-estore-articleprice'),
(41, 'Articles', 'estoreadmin', 1, '0', 'api-estore-article'),
(40, 'Products', 'estoreadmin', 1, '0', 'api-estore-product'),
(39, 'Groups', 'estoreadmin', 1, '0', 'api-estore-group'),
(35, 'article', 'newsadmin', 1, '0', 'api-news-article'),
(36, 'cat', 'newsadmin', 1, '0', 'api-news-cat'),
(45, 'Sets', 'estoreadmin', 1, '0', 'api-estore-set'),
(46, 'Attributes', 'estoreadmin', 1, '0', 'api-estore-setattribute'),
(50, 'Stats Controller', 'shopadmin', 0, 'shopadmin/product/index', '0');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin_config`
--

DROP TABLE IF EXISTS `admin_config`;
CREATE TABLE IF NOT EXISTS `admin_config` (
  `name` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `value` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `is_system` tinyint(1) DEFAULT '1',
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`),
  KEY `index_name` (`name`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `admin_config`
--

INSERT INTO `admin_config` (`name`, `value`, `is_system`, `id`) VALUES
('100genericBlockUpdate', '1', 1, 1),
('last_import_timestamp', '1545793662', 1, 2),
('installer_vendor_timestamp', '1545464678', 1, 3),
('setup_command_timestamp', '1545280884', 1, 4);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin_group`
--

DROP TABLE IF EXISTS `admin_group`;
CREATE TABLE IF NOT EXISTS `admin_group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `text` text COLLATE utf8_unicode_ci,
  `is_deleted` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `admin_group`
--

INSERT INTO `admin_group` (`id`, `name`, `text`, `is_deleted`) VALUES
(1, 'Administrator', 'Administrator Accounts have full access to all Areas and can create, update and delete all data records.', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin_group_auth`
--

DROP TABLE IF EXISTS `admin_group_auth`;
CREATE TABLE IF NOT EXISTS `admin_group_auth` (
  `group_id` int(11) DEFAULT NULL,
  `auth_id` int(11) DEFAULT NULL,
  `crud_create` smallint(4) DEFAULT NULL,
  `crud_update` smallint(4) DEFAULT NULL,
  `crud_delete` smallint(4) DEFAULT NULL,
  KEY `index_group_id` (`group_id`),
  KEY `index_auth_id` (`auth_id`),
  KEY `index_group_id_auth_id` (`group_id`,`auth_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `admin_group_auth`
--

INSERT INTO `admin_group_auth` (`group_id`, `auth_id`, `crud_create`, `crud_update`, `crud_delete`) VALUES
(1, 50, 1, 1, 1),
(1, 46, 1, 1, 1),
(1, 45, 1, 1, 1),
(1, 44, 1, 1, 1),
(1, 43, 1, 1, 1),
(1, 42, 1, 1, 1),
(1, 41, 1, 1, 1),
(1, 40, 1, 1, 1),
(1, 39, 1, 1, 1),
(1, 36, 1, 1, 1),
(1, 35, 1, 1, 1),
(1, 26, 1, 1, 1),
(1, 25, 1, 1, 1),
(1, 24, 1, 1, 1),
(1, 23, 1, 1, 1),
(1, 22, 1, 1, 1),
(1, 21, 1, 1, 1),
(1, 20, 1, 1, 1),
(1, 19, 1, 1, 1),
(1, 18, 1, 1, 1),
(1, 17, 1, 1, 1),
(1, 16, 1, 1, 1),
(1, 15, 1, 1, 1),
(1, 14, 1, 1, 1),
(1, 13, 1, 1, 1),
(1, 12, 1, 1, 1),
(1, 11, 1, 1, 1),
(1, 10, 1, 1, 1),
(1, 9, 1, 1, 1),
(1, 8, 1, 1, 1),
(1, 7, 1, 1, 1),
(1, 6, 1, 1, 1),
(1, 5, 1, 1, 1),
(1, 4, 1, 1, 1),
(1, 3, 1, 1, 1),
(1, 2, 1, 1, 1),
(1, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin_lang`
--

DROP TABLE IF EXISTS `admin_lang`;
CREATE TABLE IF NOT EXISTS `admin_lang` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `short_code` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_default` tinyint(1) DEFAULT '0',
  `is_deleted` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `index_short_code` (`short_code`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `admin_lang`
--

INSERT INTO `admin_lang` (`id`, `name`, `short_code`, `is_default`, `is_deleted`) VALUES
(1, 'English', 'en', 1, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin_logger`
--

DROP TABLE IF EXISTS `admin_logger`;
CREATE TABLE IF NOT EXISTS `admin_logger` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `time` int(11) NOT NULL,
  `message` text COLLATE utf8_unicode_ci NOT NULL,
  `type` int(11) NOT NULL,
  `trace_file` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `trace_line` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `trace_function` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `trace_function_args` text COLLATE utf8_unicode_ci,
  `group_identifier` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `group_identifier_index` int(11) DEFAULT NULL,
  `get` text COLLATE utf8_unicode_ci,
  `post` text COLLATE utf8_unicode_ci,
  `session` text COLLATE utf8_unicode_ci,
  `server` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin_ngrest_log`
--

DROP TABLE IF EXISTS `admin_ngrest_log`;
CREATE TABLE IF NOT EXISTS `admin_ngrest_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `timestamp_create` int(11) NOT NULL,
  `route` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `api` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `is_update` tinyint(1) DEFAULT '0',
  `is_insert` tinyint(1) DEFAULT '0',
  `attributes_json` text COLLATE utf8_unicode_ci NOT NULL,
  `attributes_diff_json` text COLLATE utf8_unicode_ci,
  `pk_value` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `table_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_delete` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `index_user_id` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `admin_ngrest_log`
--

INSERT INTO `admin_ngrest_log` (`id`, `user_id`, `timestamp_create`, `route`, `api`, `is_update`, `is_insert`, `attributes_json`, `attributes_diff_json`, `pk_value`, `table_name`, `is_delete`) VALUES
(1, 1, 1545444596, '', 'api-estore-producer', 0, 1, '{\"id\":1,\"name\":\"{\\\"en\\\":\\\"Apple\\\"}\"}', NULL, '1', 'estore_producer', 0),
(2, 1, 1545444604, '', 'api-estore-producer', 0, 1, '{\"id\":2,\"name\":\"{\\\"en\\\":\\\"Samsung\\\"}\"}', NULL, '2', 'estore_producer', 0),
(3, 1, 1545444618, '', 'api-estore-set', 0, 1, '{\"id\":1,\"name\":\"{\\\"en\\\":\\\"phone\\\"}\"}', NULL, '1', 'estore_set', 0),
(4, 1, 1545444656, '', 'api-estore-setattribute', 0, 1, '{\"id\":1,\"type\":1,\"input\":\"zaa-select\",\"name\":\"{\\\"en\\\":\\\"Core\\\"}\",\"values\":\"{\\\"en\\\":\\\"4\\\"}\",\"is_i18n\":\"0\"}', NULL, '1', 'estore_set_attribute', 0),
(5, 1, 1545444678, '', 'api-estore-setattribute', 0, 1, '{\"id\":2,\"type\":1,\"input\":\"zaa-select\",\"name\":\"{\\\"en\\\":\\\"ram\\\"}\",\"values\":\"{\\\"en\\\":\\\"4\\\"}\",\"is_i18n\":1}', NULL, '2', 'estore_set_attribute', 0),
(6, 1, 1545444703, '', 'api-estore-setattribute', 1, 0, '{\"id\":1,\"type\":1,\"input\":\"zaa-select\",\"name\":\"{\\\"en\\\":\\\"CPU\\\"}\",\"values\":\"{\\\"en\\\":\\\"Snapdragon 450\\\"}\",\"is_i18n\":0}', '{\"name\":\"{\\\"en\\\":\\\"Core\\\"}\",\"values\":\"{\\\"en\\\":\\\"4\\\"}\"}', '1', 'estore_set_attribute', 0),
(7, 1, 1545444712, '', 'api-estore-set', 1, 0, '{\"id\":1,\"name\":\"{\\\"en\\\":\\\"phone\\\"}\"}', '[]', '1', 'estore_set', 0),
(8, 1, 1545444778, '', 'api-estore-group', 0, 1, '{\"id\":1,\"parent_group_id\":0,\"cover_image_id\":0,\"images_list\":\"{\\\"en\\\":[]}\",\"name\":\"{\\\"en\\\":\\\"Dien thoai\\\"}\",\"teaser\":null,\"text\":null}', NULL, '1', 'estore_group', 0),
(9, 1, 1545444799, '', 'api-estore-product', 0, 1, '{\"id\":1,\"name\":\"{\\\"en\\\":\\\"Samsung note 8\\\"}\",\"producer_id\":2}', NULL, '1', 'estore_product', 0),
(10, 1, 1545445139, '', 'api-estore-article', 0, 1, '{\"id\":1,\"product_id\":1,\"name\":\"{\\\"en\\\":\\\"Samsung note8\\\"}\",\"sku\":\"{\\\"en\\\":\\\"ss-n8\\\"}\",\"qty_available\":10}', NULL, '1', 'estore_article', 0),
(11, 1, 1545445205, '', 'api-estore-article', 0, 1, '{\"id\":2,\"product_id\":\"0\",\"name\":\"{\\\"en\\\":\\\"Samsung note8 korea\\\"}\",\"sku\":\"{\\\"en\\\":\\\"ss-n8k\\\"}\",\"qty_available\":10}', NULL, '2', 'estore_article', 0),
(12, 1, 1545445274, '', 'api-estore-currency', 0, 1, '{\"id\":1,\"is_base\":1,\"name\":\"{\\\"en\\\":\\\"dolar\\\"}\",\"value\":10}', NULL, '1', 'estore_currency', 0),
(13, 1, 1545445307, '', 'api-estore-currency', 0, 1, '{\"id\":2,\"is_base\":\"0\",\"name\":\"{\\\"en\\\":\\\"VNĐ\\\"}\",\"value\":10}', NULL, '2', 'estore_currency', 0),
(14, 1, 1545445321, '', 'api-estore-articleprice', 0, 1, '{\"article_id\":1,\"currency_id\":1,\"qty\":0,\"price\":10}', NULL, '1-1-0', 'estore_article_price', 0),
(15, 1, 1545445334, '', 'api-estore-articleprice', 1, 0, '{\"article_id\":1,\"currency_id\":1,\"qty\":10,\"price\":10}', '{\"qty\":0,\"price\":10}', '1-1-10', 'estore_article_price', 0),
(16, 1, 1545448730, '', 'api-news-article', 0, 1, '{\"id\":1,\"title\":\"{\\\"en\\\":\\\"1212\\\"}\",\"text\":\"{\\\"en\\\":\\\"2121212\\\"}\",\"cat_id\":\"0\",\"image_id\":0,\"image_list\":\"{\\\"en\\\":[]}\",\"file_list\":\"[]\",\"create_user_id\":1,\"update_user_id\":1,\"timestamp_create\":1545448730,\"timestamp_update\":1545448730,\"timestamp_display_from\":1545448730,\"timestamp_display_until\":null,\"is_deleted\":null,\"is_display_limit\":\"0\",\"teaser_text\":\"{\\\"en\\\":\\\"2121\\\"}\"}', NULL, '1', 'news_article', 0),
(17, 1, 1545471524, '', 'api-news-cat', 0, 1, '{\"id\":1,\"title\":\"{\\\"en\\\":\\\"ABC\\\"}\"}', NULL, '1', 'news_cat', 0),
(18, 1, 1545474485, '', 'api-admin-apiuser', 0, 1, '{\"id\":2,\"firstname\":\"Dat\",\"lastname\":\"Truong\",\"title\":null,\"email\":\"dat@gmail.com\",\"password\":\"$2y$13$2ucyZ0qf8mVtRF/QOxRYn.ElAHpO19SfOtUJxbxKzYtOnUEbNJETe\",\"password_salt\":\"h_XYGu1U7Se1Ye9sfJnr6LR6KmExgoon\",\"auth_token\":\"f8475a0da67662241d38a33f4c2f64be93589f700e7b6421618aaf74ddbdcdf8yj4AgtTmiAON-gUED-oZELFRmD0pagpy\",\"is_deleted\":false,\"secure_token\":null,\"secure_token_timestamp\":null,\"force_reload\":null,\"settings\":null,\"cookie_token\":null,\"is_api_user\":true,\"api_rate_limit\":null,\"api_allowed_ips\":null,\"api_last_activity\":null,\"email_verification_token\":null,\"email_verification_token_timestamp\":null,\"login_attempt\":null,\"login_attempt_lock_expiration\":null}', NULL, '2', 'admin_user', 0),
(19, 1, 1545474549, '', 'api-admin-apiuser', 1, 0, '{\"id\":2,\"firstname\":\"Dat\",\"lastname\":\"Truong\",\"title\":null,\"email\":\"dat@gmail.com\",\"password\":\"$2y$13$2ucyZ0qf8mVtRF/QOxRYn.ElAHpO19SfOtUJxbxKzYtOnUEbNJETe\",\"password_salt\":\"h_XYGu1U7Se1Ye9sfJnr6LR6KmExgoon\",\"auth_token\":\"d4d0af115610cfe6234ae9ff6bb0803d8ad3f2a28d140d17d0988cd9824ad274nUJuWuz4Ut1JOJCz5ca0sjGOrkX5Av_N\",\"is_deleted\":0,\"secure_token\":null,\"secure_token_timestamp\":0,\"force_reload\":0,\"settings\":null,\"cookie_token\":null,\"is_api_user\":true,\"api_rate_limit\":null,\"api_allowed_ips\":null,\"api_last_activity\":null,\"email_verification_token\":null,\"email_verification_token_timestamp\":null,\"login_attempt\":null,\"login_attempt_lock_expiration\":null}', '{\"is_api_user\":1}', '2', 'admin_user', 0),
(20, 1, 1545474577, '', 'api-admin-group', 1, 0, '{\"id\":1,\"name\":\"Administrator\",\"text\":\"Administrator Accounts have full access to all Areas and can create, update and delete all data records.\",\"is_deleted\":0}', '[]', '1', 'admin_group', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin_property`
--

DROP TABLE IF EXISTS `admin_property`;
CREATE TABLE IF NOT EXISTS `admin_property` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `module_name` varchar(120) COLLATE utf8_unicode_ci DEFAULT NULL,
  `var_name` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `class_name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `var_name` (`var_name`),
  KEY `index_var_name` (`var_name`),
  KEY `index_class_name` (`class_name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin_proxy_build`
--

DROP TABLE IF EXISTS `admin_proxy_build`;
CREATE TABLE IF NOT EXISTS `admin_proxy_build` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `machine_id` int(11) NOT NULL,
  `timestamp` int(11) NOT NULL,
  `build_token` varchar(190) COLLATE utf8_unicode_ci NOT NULL,
  `config` text COLLATE utf8_unicode_ci NOT NULL,
  `is_complet` tinyint(1) DEFAULT '0',
  `expiration_time` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `build_token` (`build_token`),
  KEY `index_machine_id` (`machine_id`),
  KEY `index_build_token` (`build_token`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin_proxy_machine`
--

DROP TABLE IF EXISTS `admin_proxy_machine`;
CREATE TABLE IF NOT EXISTS `admin_proxy_machine` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `access_token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `identifier` varchar(190) COLLATE utf8_unicode_ci NOT NULL,
  `is_deleted` tinyint(1) DEFAULT '0',
  `is_disabled` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `identifier` (`identifier`),
  KEY `index_access_token` (`access_token`),
  KEY `index_identifier` (`identifier`),
  KEY `index_is_deleted` (`is_deleted`),
  KEY `index_identifier_is_deleted` (`identifier`,`is_deleted`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin_search_data`
--

DROP TABLE IF EXISTS `admin_search_data`;
CREATE TABLE IF NOT EXISTS `admin_search_data` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `timestamp_create` int(11) NOT NULL,
  `query` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `num_rows` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin_storage_effect`
--

DROP TABLE IF EXISTS `admin_storage_effect`;
CREATE TABLE IF NOT EXISTS `admin_storage_effect` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `identifier` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `imagine_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `imagine_json_params` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`),
  UNIQUE KEY `identifier` (`identifier`),
  KEY `index_identifier` (`identifier`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `admin_storage_effect`
--

INSERT INTO `admin_storage_effect` (`id`, `identifier`, `name`, `imagine_name`, `imagine_json_params`) VALUES
(1, 'thumbnail', 'Thumbnail', 'thumbnail', '{\"vars\":[{\"var\":\"width\",\"label\":\"Breit in Pixel\"},{\"var\":\"height\",\"label\":\"Hoehe in Pixel\"},{\"var\":\"mode\",\"label\":\"outbound or inset\"},{\"var\":\"saveOptions\",\"label\":\"save options\"}]}'),
(2, 'crop', 'Crop', 'crop', '{\"vars\":[{\"var\":\"width\",\"label\":\"Breit in Pixel\"},{\"var\":\"height\",\"label\":\"Hoehe in Pixel\"},{\"var\":\"saveOptions\",\"label\":\"save options\"}]}');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin_storage_file`
--

DROP TABLE IF EXISTS `admin_storage_file`;
CREATE TABLE IF NOT EXISTS `admin_storage_file` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `is_hidden` tinyint(1) DEFAULT '0',
  `folder_id` int(11) DEFAULT '0',
  `name_original` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name_new` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name_new_compound` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mime_type` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `extension` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `hash_file` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `hash_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `upload_timestamp` int(11) DEFAULT NULL,
  `file_size` int(11) DEFAULT '0',
  `upload_user_id` int(11) DEFAULT '0',
  `is_deleted` tinyint(1) DEFAULT '0',
  `passthrough_file` tinyint(1) DEFAULT '0',
  `passthrough_file_password` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL,
  `passthrough_file_stats` int(11) DEFAULT '0',
  `caption` text COLLATE utf8_unicode_ci,
  `inline_disposition` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `admin_storage_file_index1` (`folder_id`,`is_hidden`,`is_deleted`,`name_original`),
  KEY `admin_storage_file_index2` (`is_deleted`,`id`),
  KEY `index_upload_user_id` (`upload_user_id`),
  KEY `index_id_hash_name_is_deleted` (`id`,`hash_name`,`is_deleted`),
  KEY `index_name_new_compound` (`name_new_compound`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin_storage_filter`
--

DROP TABLE IF EXISTS `admin_storage_filter`;
CREATE TABLE IF NOT EXISTS `admin_storage_filter` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `identifier` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `identifier` (`identifier`),
  KEY `index_identifier` (`identifier`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `admin_storage_filter`
--

INSERT INTO `admin_storage_filter` (`id`, `identifier`, `name`) VALUES
(1, 'large-crop', 'Crop large (800x800)'),
(2, 'large-thumbnail', 'Thumbnail large (800xnull)'),
(3, 'medium-crop', 'Crop medium (300x300)'),
(4, 'medium-thumbnail', 'Thumbnail medium (300xnull)'),
(5, 'small-crop', 'Crop small (100x100)'),
(6, 'small-landscape', 'Landscape small (150x50)'),
(7, 'small-thumbnail', 'Thumbnail small (100xnull)'),
(8, 'tiny-crop', 'Crop tiny (40x40)'),
(9, 'tiny-thumbnail', 'Thumbnail tiny (40xnull)');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin_storage_filter_chain`
--

DROP TABLE IF EXISTS `admin_storage_filter_chain`;
CREATE TABLE IF NOT EXISTS `admin_storage_filter_chain` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sort_index` int(11) DEFAULT NULL,
  `filter_id` int(11) DEFAULT NULL,
  `effect_id` int(11) DEFAULT NULL,
  `effect_json_values` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`),
  KEY `index_filter_id` (`filter_id`),
  KEY `index_effect_id` (`effect_id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `admin_storage_filter_chain`
--

INSERT INTO `admin_storage_filter_chain` (`id`, `sort_index`, `filter_id`, `effect_id`, `effect_json_values`) VALUES
(1, NULL, 1, 1, '{\"width\":800,\"height\":800}'),
(2, NULL, 2, 1, '{\"width\":800,\"height\":null}'),
(3, NULL, 3, 1, '{\"width\":300,\"height\":300}'),
(4, NULL, 4, 1, '{\"width\":300,\"height\":null}'),
(5, NULL, 5, 1, '{\"width\":100,\"height\":100}'),
(6, NULL, 6, 1, '{\"width\":150,\"height\":50}'),
(7, NULL, 7, 1, '{\"width\":100,\"height\":null}'),
(8, NULL, 8, 1, '{\"width\":40,\"height\":40}'),
(9, NULL, 9, 1, '{\"width\":40,\"height\":null}');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin_storage_folder`
--

DROP TABLE IF EXISTS `admin_storage_folder`;
CREATE TABLE IF NOT EXISTS `admin_storage_folder` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `timestamp_create` int(11) DEFAULT NULL,
  `is_deleted` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin_storage_image`
--

DROP TABLE IF EXISTS `admin_storage_image`;
CREATE TABLE IF NOT EXISTS `admin_storage_image` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `file_id` int(11) DEFAULT NULL,
  `filter_id` int(11) DEFAULT NULL,
  `resolution_width` int(11) DEFAULT NULL,
  `resolution_height` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `admin_storage_image_index1` (`file_id`),
  KEY `index_filter_id` (`filter_id`),
  KEY `index_file_id_filter_id` (`file_id`,`filter_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin_tag`
--

DROP TABLE IF EXISTS `admin_tag`;
CREATE TABLE IF NOT EXISTS `admin_tag` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(120) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin_tag_relation`
--

DROP TABLE IF EXISTS `admin_tag_relation`;
CREATE TABLE IF NOT EXISTS `admin_tag_relation` (
  `tag_id` int(11) NOT NULL,
  `table_name` varchar(120) COLLATE utf8_unicode_ci NOT NULL,
  `pk_id` int(11) NOT NULL,
  KEY `index_tag_id` (`tag_id`),
  KEY `index_table_name` (`table_name`),
  KEY `index_pk_id` (`pk_id`),
  KEY `index_table_name_pk_id` (`table_name`,`pk_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin_user`
--

DROP TABLE IF EXISTS `admin_user`;
CREATE TABLE IF NOT EXISTS `admin_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lastname` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `title` smallint(1) DEFAULT NULL,
  `email` varchar(120) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password_salt` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `auth_token` varchar(190) COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_deleted` tinyint(1) DEFAULT '0',
  `secure_token` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL,
  `secure_token_timestamp` int(11) DEFAULT '0',
  `force_reload` tinyint(1) DEFAULT '0',
  `settings` text COLLATE utf8_unicode_ci,
  `cookie_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_api_user` tinyint(1) DEFAULT '0',
  `api_rate_limit` int(11) DEFAULT NULL,
  `api_allowed_ips` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `api_last_activity` int(11) DEFAULT NULL,
  `email_verification_token` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email_verification_token_timestamp` int(11) DEFAULT NULL,
  `login_attempt` int(11) DEFAULT NULL,
  `login_attempt_lock_expiration` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `auth_token` (`auth_token`),
  KEY `index_email` (`email`),
  KEY `index_auth_token` (`auth_token`),
  KEY `index_is_deleted_auth_token` (`is_deleted`,`auth_token`),
  KEY `index_is_deleted_id` (`is_deleted`,`id`),
  KEY `index_api_last_activity_id` (`api_last_activity`,`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `admin_user`
--

INSERT INTO `admin_user` (`id`, `firstname`, `lastname`, `title`, `email`, `password`, `password_salt`, `auth_token`, `is_deleted`, `secure_token`, `secure_token_timestamp`, `force_reload`, `settings`, `cookie_token`, `is_api_user`, `api_rate_limit`, `api_allowed_ips`, `api_last_activity`, `email_verification_token`, `email_verification_token_timestamp`, `login_attempt`, `login_attempt_lock_expiration`) VALUES
(1, 'dat', 'truong', 1, 'dat@absoft.com.vn', '$2y$13$9jxuTTuzQb5iHbUVcktnlezqwioWtw3JL/NIB5Makv7UzXYdc73Ma', 'LToNf9OjQX5DJyIJrRJF9J4HsJ-U5l1A', 'ed42726c32b59f23dfd446ff515e1087586a33e9232bda760a5da3d2fe2d9b1fuM2ozIl66QtHWd0XaSbVrhPurb617hzS', 0, NULL, 0, 0, '{\"togglecat\":{\"1\":0}}', NULL, 0, NULL, NULL, 1546844243, NULL, NULL, 0, NULL),
(2, 'Dat', 'Truong', NULL, 'dat@gmail.com', '$2y$13$2ucyZ0qf8mVtRF/QOxRYn.ElAHpO19SfOtUJxbxKzYtOnUEbNJETe', 'h_XYGu1U7Se1Ye9sfJnr6LR6KmExgoon', 'd4d0af115610cfe6234ae9ff6bb0803d8ad3f2a28d140d17d0988cd9824ad274nUJuWuz4Ut1JOJCz5ca0sjGOrkX5Av_N', 0, NULL, 0, 1, NULL, NULL, 1, NULL, NULL, 1545792958, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin_user_group`
--

DROP TABLE IF EXISTS `admin_user_group`;
CREATE TABLE IF NOT EXISTS `admin_user_group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `group_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `index_user_id` (`user_id`),
  KEY `index_group_id` (`group_id`),
  KEY `index_user_id_group_id` (`user_id`,`group_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `admin_user_group`
--

INSERT INTO `admin_user_group` (`id`, `user_id`, `group_id`) VALUES
(2, 1, 1),
(3, 2, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin_user_login`
--

DROP TABLE IF EXISTS `admin_user_login`;
CREATE TABLE IF NOT EXISTS `admin_user_login` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `timestamp_create` int(11) NOT NULL,
  `auth_token` varchar(120) COLLATE utf8_unicode_ci NOT NULL,
  `ip` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `is_destroyed` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `index_user_id` (`user_id`),
  KEY `index_ip` (`ip`),
  KEY `index_auth_token` (`auth_token`),
  KEY `index_is_destroyed` (`is_destroyed`),
  KEY `index_user_id_timestamp_create` (`user_id`,`timestamp_create`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `admin_user_login`
--

INSERT INTO `admin_user_login` (`id`, `user_id`, `timestamp_create`, `auth_token`, `ip`, `is_destroyed`) VALUES
(1, 1, 1545295949, 'f9dd258a9cd54af15f6a307282b0b0c6c9b57703eb5b92ef1778d48900a44c68j26KLRDqzOSmt7x9fMmQLd7R4IuyvKvn', '::1', 1),
(2, 1, 1545444525, '318a29ba03bd932a063c712c680ca71738407a7d955eec7c1c8c4ff043bc2cc7vHPMSOqdYxtdQ6a3ZbjLNfvmU4duEy-g', '::1', 1),
(3, 1, 1545463491, '9c5cd6b4bf47d11158b13b0654306044b9702e9329c272c22ef3a59df2b1eb05c8FWZRW3I2dHvR50TNp2x7RuNGfQFDer', '::1', 1),
(4, 1, 1545468302, '59489d4a6b8a72d3532864dda2b8bc1bf422bcbd87db68ff834c36f2a8d44ee5Ss2ZaUn_JhtNiZRyKHoHdaKbzcidWPPy', '::1', 1),
(5, 1, 1545470838, '193d78aca0ef8a3ab7565ad9a2db84c2298f6533b9c2b55fe3edd94b31bcfb65k-svaY1dSx5CC_c5S2NakIUM7Jz3jnV4', '::1', 1),
(6, 1, 1545615714, '2f906d9ae57cb40dadc7a377b93caa36319e1c5da66d7afc2075a8b9aaae7757v_eI1XBmFN3sOy2sbgVwYwEK_7FOi1yZ', '::1', 1),
(7, 1, 1545638015, '9d80a75c6d3845a56007b736509f6e24e4d5e06f11da3ad0b1320f4492a44cc3qh5jzPcM3smp2PIbxIA8rndXKVe9F8TC', '::1', 1),
(8, 1, 1545788809, '629905a578f99d56c317e5faf3256570fcd9526f5bd4e3bf313e52f5486d26cdkRqsXMYpdAcRGqVAUDBnY0SVEg_Uj8eK', '::1', 1),
(9, 1, 1545793395, 'd55603e604bc9aa706b0f80dd77114af39c113ba9b10234c43fcf9d9a520b7f4E7HdZ24E1Dd-wWjWmfyxb9NXKGJQP3Cj', '::1', 1),
(10, 1, 1545793568, '2f08f06f24197e1c1b43baaa8a424e84cc29385e67b4ee195b0d5bdd14d2bb83whA4dw7T8LEiOAW2gzzvzCA1y7WXRtEu', '::1', 1),
(11, 1, 1546765947, '1c03ea7287051a42773acecb2b4bf1be5dc109e37d89dd58f54d493a10e7b467fnes6T9w2wMkhh3CKbx0-Ogkgm59DlQp', '::1', 1),
(12, 1, 1546844216, 'ed42726c32b59f23dfd446ff515e1087586a33e9232bda760a5da3d2fe2d9b1fuM2ozIl66QtHWd0XaSbVrhPurb617hzS', '::1', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin_user_online`
--

DROP TABLE IF EXISTS `admin_user_online`;
CREATE TABLE IF NOT EXISTS `admin_user_online` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `last_timestamp` int(11) NOT NULL,
  `invoken_route` varchar(120) COLLATE utf8_unicode_ci NOT NULL,
  `lock_pk` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lock_table` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lock_translation` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lock_translation_args` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `index_user_id` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `admin_user_online`
--

INSERT INTO `admin_user_online` (`id`, `user_id`, `last_timestamp`, `invoken_route`, `lock_pk`, `lock_table`, `lock_translation`, `lock_translation_args`) VALUES
(12, 1, 1546844228, 'shopadmin/product/index', '', '', '', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `catalog_product_entity`
--

DROP TABLE IF EXISTS `catalog_product_entity`;
CREATE TABLE IF NOT EXISTS `catalog_product_entity` (
  `entity_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Entity ID',
  `attribute_set_id` smallint(5) UNSIGNED NOT NULL DEFAULT '0' COMMENT 'Attribute Set ID',
  `type_id` varchar(32) NOT NULL DEFAULT 'simple' COMMENT 'Type ID',
  `sku` varchar(64) DEFAULT NULL COMMENT 'SKU',
  `has_options` smallint(6) NOT NULL DEFAULT '0' COMMENT 'Has Options',
  `required_options` smallint(5) UNSIGNED NOT NULL DEFAULT '0' COMMENT 'Required Options',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Creation Time',
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'Update Time',
  PRIMARY KEY (`entity_id`),
  KEY `CATALOG_PRODUCT_ENTITY_ATTRIBUTE_SET_ID` (`attribute_set_id`),
  KEY `CATALOG_PRODUCT_ENTITY_SKU` (`sku`)
) ENGINE=InnoDB AUTO_INCREMENT=88 DEFAULT CHARSET=utf8 COMMENT='Catalog Product Table';

--
-- Đang đổ dữ liệu cho bảng `catalog_product_entity`
--

INSERT INTO `catalog_product_entity` (`entity_id`, `attribute_set_id`, `type_id`, `sku`, `has_options`, `required_options`, `created_at`, `updated_at`) VALUES
(20, 4, 'simple', 'iphone4s', 0, 0, '2019-01-07 08:09:22', '2019-01-07 08:09:22'),
(21, 4, 'simple', 'iphone4s', 0, 0, '2019-01-07 08:09:27', '2019-01-07 08:09:27'),
(22, 4, 'simple', 'iphone4s', 0, 0, '2019-01-07 08:30:11', '2019-01-07 08:30:11'),
(23, 4, 'simple', 'iphone4s', 0, 0, '2019-01-07 08:30:56', '2019-01-07 08:30:56'),
(24, 4, 'simple', 'iphone4s', 0, 0, '2019-01-07 08:31:59', '2019-01-07 08:31:59'),
(25, 4, 'simple', 'iphone4s', 0, 0, '2019-01-07 08:32:01', '2019-01-07 08:32:01'),
(26, 4, 'simple', 'iphone4s', 0, 0, '2019-01-07 08:32:03', '2019-01-07 08:32:03'),
(27, 4, 'simple', 'iphone4s', 0, 0, '2019-01-07 08:32:44', '2019-01-07 08:32:44'),
(28, 4, 'simple', 'iphone4s', 0, 0, '2019-01-07 09:08:53', '2019-01-07 09:08:53'),
(29, 4, 'simple', 'iphone4s', 0, 0, '2019-01-07 09:09:17', '2019-01-07 09:09:17'),
(30, 4, 'simple', 'iphone4s', 0, 0, '2019-01-07 09:09:56', '2019-01-07 09:09:56'),
(31, 4, 'simple', 'iphone4s', 0, 0, '2019-01-07 09:11:59', '2019-01-07 09:11:59'),
(32, 4, 'simple', 'iphone4s', 0, 0, '2019-01-07 09:12:00', '2019-01-07 09:12:00'),
(33, 4, 'simple', 'iphone4s', 0, 0, '2019-01-07 09:12:04', '2019-01-07 09:12:04'),
(34, 4, 'simple', 'iphone4s', 0, 0, '2019-01-07 09:13:11', '2019-01-07 09:13:11'),
(35, 4, 'simple', 'iphone4s', 0, 0, '2019-01-07 09:13:36', '2019-01-07 09:13:36'),
(36, 4, 'simple', 'iphone4s', 0, 0, '2019-01-07 09:17:31', '2019-01-07 09:17:31'),
(37, 4, 'simple', 'iphone4s', 0, 0, '2019-01-07 09:17:32', '2019-01-07 09:17:32'),
(38, 4, 'simple', 'iphone4s', 0, 0, '2019-01-07 09:18:02', '2019-01-07 09:18:02'),
(39, 4, 'simple', 'iphone4s', 0, 0, '2019-01-07 09:18:18', '2019-01-07 09:18:18'),
(40, 4, 'simple', 'iphone4s', 0, 0, '2019-01-07 09:18:19', '2019-01-07 09:18:19'),
(41, 4, 'simple', 'iphone4s', 0, 0, '2019-01-07 09:18:36', '2019-01-07 09:18:36'),
(42, 4, 'simple', 'iphone4s', 0, 0, '2019-01-07 09:23:32', '2019-01-07 09:23:32'),
(43, 4, 'simple', 'iphone4s', 0, 0, '2019-01-07 09:23:33', '2019-01-07 09:23:33'),
(44, 4, 'simple', 'iphone4s', 0, 0, '2019-01-07 09:26:18', '2019-01-07 09:26:18'),
(45, 4, 'simple', 'iphone4s', 0, 0, '2019-01-07 09:27:52', '2019-01-07 09:27:52'),
(46, 4, 'simple', 'iphone4s', 0, 0, '2019-01-07 09:28:24', '2019-01-07 09:28:24'),
(47, 4, 'simple', 'iphone4s', 0, 0, '2019-01-07 09:29:30', '2019-01-07 09:29:30'),
(48, 4, 'simple', 'iphone4s', 0, 0, '2019-01-07 09:29:53', '2019-01-07 09:29:53'),
(49, 4, 'simple', 'iphone4s', 0, 0, '2019-01-07 09:30:14', '2019-01-07 09:30:14'),
(50, 4, 'simple', 'iphone4s', 0, 0, '2019-01-07 09:32:22', '2019-01-07 09:32:22'),
(51, 4, 'simple', 'iphone4s', 0, 0, '2019-01-07 09:32:36', '2019-01-07 09:32:36'),
(52, 4, 'simple', 'iphone4s', 0, 0, '2019-01-07 09:33:01', '2019-01-07 09:33:01'),
(53, 4, 'simple', 'iphone4s', 0, 0, '2019-01-07 09:33:14', '2019-01-07 09:33:14'),
(54, 4, 'simple', 'iphone4s', 0, 0, '2019-01-07 09:34:13', '2019-01-07 09:34:13'),
(55, 4, 'simple', 'iphone4s', 0, 0, '2019-01-07 09:34:18', '2019-01-07 09:34:18'),
(56, 4, 'simple', 'iphone4s', 0, 0, '2019-01-07 09:35:02', '2019-01-07 09:35:02'),
(57, 4, 'simple', 'iphone4s', 0, 0, '2019-01-07 09:36:51', '2019-01-07 09:36:51'),
(58, 4, 'simple', 'iphone4s', 0, 0, '2019-01-07 09:37:26', '2019-01-07 09:37:26'),
(59, 4, 'simple', 'iphone4s', 0, 0, '2019-01-07 09:38:20', '2019-01-07 09:38:20'),
(60, 4, 'simple', 'iphone4s', 0, 0, '2019-01-07 09:38:59', '2019-01-07 09:38:59'),
(61, 4, 'simple', 'iphone4s', 0, 0, '2019-01-07 09:40:01', '2019-01-07 09:40:01'),
(62, 4, 'simple', 'iphone4s', 0, 0, '2019-01-07 09:41:45', '2019-01-07 09:41:45'),
(63, 4, 'simple', 'iphone4s', 0, 0, '2019-01-07 09:41:59', '2019-01-07 09:41:59'),
(64, 4, 'simple', 'iphone4s', 0, 0, '2019-01-07 09:42:32', '2019-01-07 09:42:32'),
(65, 4, 'simple', 'iphone4s', 0, 0, '2019-01-07 09:44:16', '2019-01-07 09:44:16'),
(66, 4, 'simple', 'iphone4s', 0, 0, '2019-01-07 09:44:29', '2019-01-07 09:44:29'),
(67, 4, 'simple', 'iphone4s', 0, 0, '2019-01-07 09:52:59', '2019-01-07 09:52:59'),
(68, 4, 'simple', 'iphone4s', 0, 0, '2019-01-07 09:57:28', '2019-01-07 09:57:28'),
(69, 4, 'simple', 'iphone4s', 0, 0, '2019-01-07 09:57:32', '2019-01-07 09:57:32'),
(70, 4, 'simple', 'iphone4s', 0, 0, '2019-01-07 09:57:32', '2019-01-07 09:57:32'),
(71, 4, 'simple', 'iphone4s', 0, 0, '2019-01-07 09:57:33', '2019-01-07 09:57:33'),
(72, 4, 'simple', 'iphone4s', 0, 0, '2019-01-07 09:57:33', '2019-01-07 09:57:33'),
(73, 4, 'simple', 'iphone4s', 0, 0, '2019-01-07 09:57:34', '2019-01-07 09:57:34'),
(74, 4, 'simple', 'iphone4s', 0, 0, '2019-01-07 09:57:34', '2019-01-07 09:57:34'),
(75, 4, 'simple', 'iphone4s', 0, 0, '2019-01-07 10:27:04', '2019-01-07 10:27:04'),
(76, 4, 'simple', 'iphone4s', 0, 0, '2019-01-07 10:27:32', '2019-01-07 10:27:32'),
(77, 4, 'simple', 'iphone4s', 0, 0, '2019-01-07 10:27:45', '2019-01-07 10:27:45'),
(78, 4, 'simple', 'iphone4s', 0, 0, '2019-01-07 10:29:24', '2019-01-07 10:29:24'),
(79, 4, 'simple', 'iphone4s', 0, 0, '2019-01-07 10:30:36', '2019-01-07 10:30:36'),
(80, 4, 'simple', 'iphone4s', 0, 0, '2019-01-07 10:31:35', '2019-01-07 10:31:35'),
(81, 4, 'simple', 'iphone4s', 0, 0, '2019-01-07 10:31:56', '2019-01-07 10:31:56'),
(82, 4, 'simple', 'iphone4s', 0, 0, '2019-01-07 10:32:07', '2019-01-07 10:32:07'),
(83, 4, 'simple', 'iphone4s', 0, 0, '2019-01-07 10:32:26', '2019-01-07 10:32:26'),
(84, 4, 'simple', 'iphone4s', 0, 0, '2019-01-07 10:32:38', '2019-01-07 10:32:38'),
(85, 4, 'simple', 'iphone4s', 0, 0, '2019-01-07 10:35:17', '2019-01-07 10:35:17'),
(86, 4, 'simple', 'iphone4s', 0, 0, '2019-01-07 10:40:19', '2019-01-07 10:40:19'),
(87, 4, 'simple', 'iphone4s', 0, 0, '2019-01-07 10:43:21', '2019-01-07 10:43:21');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `catalog_product_entity_datetime`
--

DROP TABLE IF EXISTS `catalog_product_entity_datetime`;
CREATE TABLE IF NOT EXISTS `catalog_product_entity_datetime` (
  `value_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Value ID',
  `attribute_id` smallint(5) UNSIGNED NOT NULL DEFAULT '0' COMMENT 'Attribute ID',
  `store_id` smallint(5) UNSIGNED NOT NULL DEFAULT '0' COMMENT 'Store ID',
  `entity_id` int(10) UNSIGNED NOT NULL DEFAULT '0' COMMENT 'Entity ID',
  `value` datetime DEFAULT NULL COMMENT 'Value',
  PRIMARY KEY (`value_id`),
  UNIQUE KEY `CATALOG_PRODUCT_ENTITY_DATETIME_ENTITY_ID_ATTRIBUTE_ID_STORE_ID` (`entity_id`,`attribute_id`,`store_id`),
  KEY `CATALOG_PRODUCT_ENTITY_DATETIME_ATTRIBUTE_ID` (`attribute_id`),
  KEY `CATALOG_PRODUCT_ENTITY_DATETIME_STORE_ID` (`store_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COMMENT='Catalog Product Datetime Attribute Backend Table';

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `catalog_product_entity_decimal`
--

DROP TABLE IF EXISTS `catalog_product_entity_decimal`;
CREATE TABLE IF NOT EXISTS `catalog_product_entity_decimal` (
  `value_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Value ID',
  `attribute_id` smallint(5) UNSIGNED NOT NULL DEFAULT '0' COMMENT 'Attribute ID',
  `store_id` smallint(5) UNSIGNED NOT NULL DEFAULT '0' COMMENT 'Store ID',
  `entity_id` int(10) UNSIGNED NOT NULL DEFAULT '0' COMMENT 'Entity ID',
  `value` decimal(12,4) DEFAULT NULL COMMENT 'Value',
  PRIMARY KEY (`value_id`),
  UNIQUE KEY `CATALOG_PRODUCT_ENTITY_DECIMAL_ENTITY_ID_ATTRIBUTE_ID_STORE_ID` (`entity_id`,`attribute_id`,`store_id`),
  KEY `CATALOG_PRODUCT_ENTITY_DECIMAL_STORE_ID` (`store_id`),
  KEY `CATALOG_PRODUCT_ENTITY_DECIMAL_ATTRIBUTE_ID` (`attribute_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3923 DEFAULT CHARSET=utf8 COMMENT='Catalog Product Decimal Attribute Backend Table';

--
-- Đang đổ dữ liệu cho bảng `catalog_product_entity_decimal`
--

INSERT INTO `catalog_product_entity_decimal` (`value_id`, `attribute_id`, `store_id`, `entity_id`, `value`) VALUES
(3920, 77, 1, 19, '59.0000'),
(3921, 77, 1, 20, '59.0000'),
(3922, 77, 1, 21, '59.0000');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `catalog_product_entity_int`
--

DROP TABLE IF EXISTS `catalog_product_entity_int`;
CREATE TABLE IF NOT EXISTS `catalog_product_entity_int` (
  `value_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Value ID',
  `attribute_id` smallint(5) UNSIGNED NOT NULL DEFAULT '0' COMMENT 'Attribute ID',
  `store_id` smallint(5) UNSIGNED NOT NULL DEFAULT '0' COMMENT 'Store ID',
  `entity_id` int(10) UNSIGNED NOT NULL DEFAULT '0' COMMENT 'Entity ID',
  `value` int(11) DEFAULT NULL COMMENT 'Value',
  PRIMARY KEY (`value_id`),
  UNIQUE KEY `CATALOG_PRODUCT_ENTITY_INT_ENTITY_ID_ATTRIBUTE_ID_STORE_ID` (`entity_id`,`attribute_id`,`store_id`),
  KEY `CATALOG_PRODUCT_ENTITY_INT_ATTRIBUTE_ID` (`attribute_id`),
  KEY `CATALOG_PRODUCT_ENTITY_INT_STORE_ID` (`store_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12741 DEFAULT CHARSET=utf8 COMMENT='Catalog Product Integer Attribute Backend Table';

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `catalog_product_entity_text`
--

DROP TABLE IF EXISTS `catalog_product_entity_text`;
CREATE TABLE IF NOT EXISTS `catalog_product_entity_text` (
  `value_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Value ID',
  `attribute_id` smallint(5) UNSIGNED NOT NULL DEFAULT '0' COMMENT 'Attribute ID',
  `store_id` smallint(5) UNSIGNED NOT NULL DEFAULT '0' COMMENT 'Store ID',
  `entity_id` int(10) UNSIGNED NOT NULL DEFAULT '0' COMMENT 'Entity ID',
  `value` text COMMENT 'Value',
  PRIMARY KEY (`value_id`),
  UNIQUE KEY `CATALOG_PRODUCT_ENTITY_TEXT_ENTITY_ID_ATTRIBUTE_ID_STORE_ID` (`entity_id`,`attribute_id`,`store_id`),
  KEY `CATALOG_PRODUCT_ENTITY_TEXT_ATTRIBUTE_ID` (`attribute_id`),
  KEY `CATALOG_PRODUCT_ENTITY_TEXT_STORE_ID` (`store_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COMMENT='Catalog Product Text Attribute Backend Table';

--
-- Đang đổ dữ liệu cho bảng `catalog_product_entity_text`
--

INSERT INTO `catalog_product_entity_text` (`value_id`, `attribute_id`, `store_id`, `entity_id`, `value`) VALUES
(4, 75, 1, 20, 'Điện thoại xin nhất Việt Nam'),
(5, 76, 1, 20, 'Điện thoại xin nhất Việt Nam'),
(6, 75, 1, 21, 'Điện thoại xin nhất Việt Nam'),
(7, 76, 1, 21, 'Điện thoại xin nhất Việt Nam');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `catalog_product_entity_varchar`
--

DROP TABLE IF EXISTS `catalog_product_entity_varchar`;
CREATE TABLE IF NOT EXISTS `catalog_product_entity_varchar` (
  `value_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Value ID',
  `attribute_id` smallint(5) UNSIGNED NOT NULL DEFAULT '0' COMMENT 'Attribute ID',
  `store_id` smallint(5) UNSIGNED NOT NULL DEFAULT '0' COMMENT 'Store ID',
  `entity_id` int(10) UNSIGNED NOT NULL DEFAULT '0' COMMENT 'Entity ID',
  `value` varchar(255) DEFAULT NULL COMMENT 'Value',
  PRIMARY KEY (`value_id`),
  UNIQUE KEY `CATALOG_PRODUCT_ENTITY_VARCHAR_ENTITY_ID_ATTRIBUTE_ID_STORE_ID` (`entity_id`,`attribute_id`,`store_id`),
  KEY `CATALOG_PRODUCT_ENTITY_VARCHAR_ATTRIBUTE_ID` (`attribute_id`),
  KEY `CATALOG_PRODUCT_ENTITY_VARCHAR_STORE_ID` (`store_id`)
) ENGINE=InnoDB AUTO_INCREMENT=15254 DEFAULT CHARSET=utf8 COMMENT='Catalog Product Varchar Attribute Backend Table';

--
-- Đang đổ dữ liệu cho bảng `catalog_product_entity_varchar`
--

INSERT INTO `catalog_product_entity_varchar` (`value_id`, `attribute_id`, `store_id`, `entity_id`, `value`) VALUES
(15252, 73, 1, 20, 'Iphone 4s'),
(15253, 73, 1, 21, 'Iphone 4s');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cms_block`
--

DROP TABLE IF EXISTS `cms_block`;
CREATE TABLE IF NOT EXISTS `cms_block` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `group_id` int(11) NOT NULL,
  `class` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `is_disabled` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `index_group_id` (`group_id`),
  KEY `index_class` (`class`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `cms_block`
--

INSERT INTO `cms_block` (`id`, `group_id`, `class`, `is_disabled`) VALUES
(1, 1, '\\luya\\cms\\frontend\\blocks\\HtmlBlock', 0),
(2, 1, '\\luya\\cms\\frontend\\blocks\\ModuleBlock', 0),
(3, 2, '\\luya\\news\\frontend\\blocks\\LatestNews', 0),
(4, 3, '\\vavepl\\portfolio\\frontend\\blocks\\PortfolioBlock', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cms_block_group`
--

DROP TABLE IF EXISTS `cms_block_group`;
CREATE TABLE IF NOT EXISTS `cms_block_group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `is_deleted` tinyint(1) DEFAULT '0',
  `identifier` varchar(120) COLLATE utf8_unicode_ci NOT NULL,
  `created_timestamp` int(11) DEFAULT '0',
  `class` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `cms_block_group`
--

INSERT INTO `cms_block_group` (`id`, `name`, `is_deleted`, `identifier`, `created_timestamp`, `class`) VALUES
(1, 'block_group_dev_elements', 0, 'development-group', 1545280856, '\\luya\\cms\\frontend\\blockgroups\\DevelopmentGroup'),
(2, 'block_group_basic_elements', 0, 'main-group', 1545448686, '\\luya\\cms\\frontend\\blockgroups\\MainGroup'),
(3, 'block_group_project_elements', 1, 'project-group', 1545640342, '\\luya\\cms\\frontend\\blockgroups\\ProjectGroup');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cms_config`
--

DROP TABLE IF EXISTS `cms_config`;
CREATE TABLE IF NOT EXISTS `cms_config` (
  `name` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `value` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cms_layout`
--

DROP TABLE IF EXISTS `cms_layout`;
CREATE TABLE IF NOT EXISTS `cms_layout` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `json_config` text COLLATE utf8_unicode_ci,
  `view_file` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `cms_layout`
--

INSERT INTO `cms_layout` (`id`, `name`, `json_config`, `view_file`) VALUES
(1, 'Main', '{\"placeholders\":[[{\"cols\":12,\"var\":\"content\",\"label\":\"Main Container\"}]]}', 'main.php'),
(2, '2columns', '{\"placeholders\":[[{\"cols\":8,\"var\":\"left\",\"label\":\"Main content Left\"},{\"cols\":4,\"var\":\"right\",\"label\":\"Sidebar Right\"}]]}', '2columns.php');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cms_log`
--

DROP TABLE IF EXISTS `cms_log`;
CREATE TABLE IF NOT EXISTS `cms_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT '0',
  `is_insertion` tinyint(1) DEFAULT '0',
  `is_update` tinyint(1) DEFAULT '0',
  `is_deletion` tinyint(1) DEFAULT '0',
  `timestamp` int(11) NOT NULL,
  `message` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `data_json` text COLLATE utf8_unicode_ci,
  `table_name` varchar(120) COLLATE utf8_unicode_ci DEFAULT NULL,
  `row_id` int(11) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `index_user_id` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=33 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `cms_log`
--

INSERT INTO `cms_log` (`id`, `user_id`, `is_insertion`, `is_update`, `is_deletion`, `timestamp`, `message`, `data_json`, `table_name`, `row_id`) VALUES
(1, 1, 1, 0, 0, 1545448771, '{\"tableName\":\"cms_nav\",\"action\":\"insert\",\"row\":2}', '{\"parent_nav_id\":\"0\",\"nav_container_id\":\"1\",\"is_hidden\":true,\"is_offline\":true,\"sort_index\":1,\"id\":2}', 'cms_nav', 2),
(2, 1, 1, 0, 0, 1545448771, '{\"tableName\":\"cms_nav_item\",\"action\":\"insert\",\"row\":2}', '{\"lang_id\":\"1\",\"title\":\"news-1\",\"alias\":\"news-1\",\"description\":null,\"nav_item_type\":2,\"nav_item_type_id\":1,\"nav_id\":2,\"timestamp_create\":1545448771,\"timestamp_update\":0,\"create_user_id\":1,\"update_user_id\":1,\"id\":2}', 'cms_nav_item', 2),
(3, 1, 0, 1, 0, 1545448787, '{\"tableName\":\"cms_nav\",\"action\":\"update\",\"row\":2}', '{\"id\":2,\"nav_container_id\":1,\"parent_nav_id\":0,\"sort_index\":2,\"is_deleted\":0,\"is_hidden\":\"0\",\"is_home\":0,\"is_offline\":1,\"is_draft\":0,\"layout_file\":null,\"publish_from\":null,\"publish_till\":null}', 'cms_nav', 2),
(4, 1, 0, 1, 0, 1545448787, '{\"tableName\":\"cms_nav\",\"action\":\"update\",\"row\":2}', '{\"id\":2,\"nav_container_id\":1,\"parent_nav_id\":0,\"sort_index\":2,\"is_deleted\":0,\"is_hidden\":0,\"is_home\":0,\"is_offline\":\"0\",\"is_draft\":0,\"layout_file\":null,\"publish_from\":null,\"publish_till\":null}', 'cms_nav', 2),
(5, 1, 1, 0, 0, 1545449279, '{\"tableName\":\"cms_nav\",\"action\":\"insert\",\"row\":3}', '{\"parent_nav_id\":\"0\",\"nav_container_id\":\"1\",\"is_hidden\":true,\"is_offline\":true,\"sort_index\":3,\"id\":3}', 'cms_nav', 3),
(6, 1, 1, 0, 0, 1545449279, '{\"tableName\":\"cms_nav_item\",\"action\":\"insert\",\"row\":3}', '{\"lang_id\":\"1\",\"title\":\"1231312\",\"alias\":\"1231312\",\"description\":null,\"nav_item_type\":2,\"nav_item_type_id\":2,\"nav_id\":3,\"timestamp_create\":1545449279,\"timestamp_update\":0,\"create_user_id\":1,\"update_user_id\":1,\"id\":3}', 'cms_nav_item', 3),
(7, 1, 0, 1, 0, 1545449292, '{\"tableName\":\"cms_nav\",\"action\":\"update\",\"row\":3}', '{\"id\":3,\"nav_container_id\":1,\"parent_nav_id\":0,\"sort_index\":3,\"is_deleted\":0,\"is_hidden\":\"0\",\"is_home\":0,\"is_offline\":1,\"is_draft\":0,\"layout_file\":null,\"publish_from\":null,\"publish_till\":null}', 'cms_nav', 3),
(8, 1, 0, 1, 0, 1545449292, '{\"tableName\":\"cms_nav\",\"action\":\"update\",\"row\":3}', '{\"id\":3,\"nav_container_id\":1,\"parent_nav_id\":0,\"sort_index\":3,\"is_deleted\":0,\"is_hidden\":0,\"is_home\":0,\"is_offline\":\"0\",\"is_draft\":0,\"layout_file\":null,\"publish_from\":null,\"publish_till\":null}', 'cms_nav', 3),
(9, 1, 0, 1, 0, 1545449401, '{\"tableName\":\"cms_nav_item\",\"action\":\"update\",\"row\":3}', '{\"id\":3,\"nav_id\":3,\"lang_id\":1,\"nav_item_type\":2,\"nav_item_type_id\":2,\"create_user_id\":1,\"update_user_id\":1,\"timestamp_create\":\"1545449279\",\"timestamp_update\":1545449401,\"title\":\"1231312\",\"alias\":\"1231312\",\"description\":\"\",\"keywords\":\"\",\"title_tag\":\"\"}', 'cms_nav_item', 3),
(10, 1, 1, 0, 0, 1545615732, '{\"tableName\":\"cms_nav_item_page_block_item\",\"action\":\"insert\",\"row\":1,\"pageTitle\":\"Homepage\",\"blockName\":\"Module\"}', '[]', 'cms_nav_item_page_block_item', 1),
(11, 1, 0, 1, 0, 1545615757, '{\"tableName\":\"cms_nav_item_page_block_item\",\"action\":\"update\",\"row\":1,\"pageTitle\":\"Homepage\",\"blockName\":\"Module\"}', '[]', 'cms_nav_item_page_block_item', 1),
(12, 1, 1, 0, 0, 1545617037, '{\"tableName\":\"cms_nav\",\"action\":\"insert\",\"row\":4}', '{\"parent_nav_id\":\"0\",\"nav_container_id\":\"1\",\"is_hidden\":true,\"is_offline\":true,\"is_draft\":\"1\",\"sort_index\":4,\"id\":4}', 'cms_nav', 4),
(13, 1, 1, 0, 0, 1545617037, '{\"tableName\":\"cms_nav_item\",\"action\":\"insert\",\"row\":4}', '{\"lang_id\":\"1\",\"title\":\"test my module\",\"alias\":\"test-my-module\",\"description\":null,\"nav_item_type\":1,\"nav_item_type_id\":2,\"nav_id\":4,\"timestamp_create\":1545617037,\"timestamp_update\":0,\"create_user_id\":1,\"update_user_id\":1,\"id\":4}', 'cms_nav_item', 4),
(14, 1, 1, 0, 0, 1545617118, '{\"tableName\":\"cms_nav\",\"action\":\"insert\",\"row\":5}', '{\"parent_nav_id\":\"0\",\"nav_container_id\":\"1\",\"is_hidden\":true,\"is_offline\":true,\"sort_index\":5,\"id\":5}', 'cms_nav', 5),
(15, 1, 1, 0, 0, 1545617118, '{\"tableName\":\"cms_nav_item\",\"action\":\"insert\",\"row\":5}', '{\"lang_id\":\"1\",\"title\":\"my-modules\",\"alias\":\"my-modules\",\"description\":null,\"nav_item_type\":2,\"nav_item_type_id\":3,\"nav_id\":5,\"timestamp_create\":1545617118,\"timestamp_update\":0,\"create_user_id\":1,\"update_user_id\":1,\"id\":5}', 'cms_nav_item', 5),
(16, 1, 0, 1, 0, 1545617121, '{\"tableName\":\"cms_nav\",\"action\":\"update\",\"row\":5}', '{\"id\":5,\"nav_container_id\":1,\"parent_nav_id\":0,\"sort_index\":5,\"is_deleted\":0,\"is_hidden\":\"0\",\"is_home\":0,\"is_offline\":1,\"is_draft\":0,\"layout_file\":null,\"publish_from\":null,\"publish_till\":null}', 'cms_nav', 5),
(17, 1, 0, 1, 0, 1545617123, '{\"tableName\":\"cms_nav\",\"action\":\"update\",\"row\":5}', '{\"id\":5,\"nav_container_id\":1,\"parent_nav_id\":0,\"sort_index\":5,\"is_deleted\":0,\"is_hidden\":0,\"is_home\":0,\"is_offline\":\"0\",\"is_draft\":0,\"layout_file\":null,\"publish_from\":null,\"publish_till\":null}', 'cms_nav', 5),
(18, 1, 0, 1, 0, 1545617147, '{\"tableName\":\"cms_nav_item\",\"action\":\"update\",\"row\":5}', '{\"id\":5,\"nav_id\":5,\"lang_id\":1,\"nav_item_type\":2,\"nav_item_type_id\":3,\"create_user_id\":1,\"update_user_id\":1,\"timestamp_create\":\"1545617118\",\"timestamp_update\":1545617147,\"title\":\"my-modules\",\"alias\":\"my-modules\",\"description\":\"my module\",\"keywords\":\"my module\",\"title_tag\":\"my module\"}', 'cms_nav_item', 5),
(19, 1, 1, 0, 0, 1545640164, '{\"tableName\":\"cms_nav_item_page_block_item\",\"action\":\"insert\",\"row\":2,\"pageTitle\":\"test my module\",\"blockName\":\"News: Latest Headlines\"}', '[]', 'cms_nav_item_page_block_item', 2),
(20, 1, 0, 0, 1, 1545640172, '{\"tableName\":\"cms_nav_item_page_block_item\",\"action\":\"delete\",\"row\":2,\"pageTitle\":\"test my module\",\"blockName\":\"News: Latest Headlines\"}', '[]', 'cms_nav_item_page_block_item', 2),
(21, 1, 1, 0, 0, 1545640175, '{\"tableName\":\"cms_nav_item_page_block_item\",\"action\":\"insert\",\"row\":3,\"pageTitle\":\"test my module\",\"blockName\":\"HTML\"}', '[]', 'cms_nav_item_page_block_item', 3),
(22, 1, 0, 1, 0, 1545640209, '{\"tableName\":\"cms_nav_item_page_block_item\",\"action\":\"update\",\"row\":3,\"pageTitle\":\"test my module\",\"blockName\":\"HTML\"}', '[]', 'cms_nav_item_page_block_item', 3),
(23, 1, 0, 0, 1, 1545640243, '{\"tableName\":\"cms_nav_item_page_block_item\",\"action\":\"delete\",\"row\":3,\"pageTitle\":\"test my module\",\"blockName\":\"HTML\"}', '[]', 'cms_nav_item_page_block_item', 3),
(24, 1, 1, 0, 0, 1545640494, '{\"tableName\":\"cms_nav\",\"action\":\"insert\",\"row\":6}', '{\"parent_nav_id\":\"0\",\"nav_container_id\":\"1\",\"is_hidden\":true,\"is_offline\":true,\"is_draft\":\"0\",\"sort_index\":6,\"id\":6}', 'cms_nav', 6),
(25, 1, 1, 0, 0, 1545640494, '{\"tableName\":\"cms_nav_item\",\"action\":\"insert\",\"row\":6}', '{\"lang_id\":\"1\",\"title\":\"1231321\",\"alias\":\"1231321\",\"description\":null,\"nav_item_type\":1,\"nav_item_type_id\":3,\"nav_id\":6,\"timestamp_create\":1545640494,\"timestamp_update\":0,\"create_user_id\":1,\"update_user_id\":1,\"id\":6}', 'cms_nav_item', 6),
(26, 1, 0, 1, 0, 1545640498, '{\"tableName\":\"cms_nav\",\"action\":\"update\",\"row\":6}', '{\"id\":6,\"nav_container_id\":1,\"parent_nav_id\":0,\"sort_index\":6,\"is_deleted\":0,\"is_hidden\":\"0\",\"is_home\":0,\"is_offline\":1,\"is_draft\":0,\"layout_file\":null,\"publish_from\":null,\"publish_till\":null}', 'cms_nav', 6),
(27, 1, 0, 1, 0, 1545640499, '{\"tableName\":\"cms_nav\",\"action\":\"update\",\"row\":6}', '{\"id\":6,\"nav_container_id\":1,\"parent_nav_id\":0,\"sort_index\":6,\"is_deleted\":0,\"is_hidden\":0,\"is_home\":0,\"is_offline\":\"0\",\"is_draft\":0,\"layout_file\":null,\"publish_from\":null,\"publish_till\":null}', 'cms_nav', 6),
(28, 1, 1, 0, 0, 1545640657, '{\"tableName\":\"cms_nav_item_page_block_item\",\"action\":\"insert\",\"row\":4,\"pageTitle\":\"1231321\",\"blockName\":\"HTML\"}', '[]', 'cms_nav_item_page_block_item', 4),
(29, 1, 0, 1, 0, 1545640669, '{\"tableName\":\"cms_nav_item_page_block_item\",\"action\":\"update\",\"row\":4,\"pageTitle\":\"1231321\",\"blockName\":\"HTML\"}', '[]', 'cms_nav_item_page_block_item', 4),
(30, 1, 0, 1, 0, 1545640684, '{\"tableName\":\"cms_nav_item_page_block_item\",\"action\":\"update\",\"row\":4,\"pageTitle\":\"1231321\",\"blockName\":\"HTML\"}', '[]', 'cms_nav_item_page_block_item', 4),
(31, 1, 1, 0, 0, 1545640688, '{\"tableName\":\"cms_nav_item_page_block_item\",\"action\":\"insert\",\"row\":5,\"pageTitle\":\"1231321\",\"blockName\":\"HTML\"}', '[]', 'cms_nav_item_page_block_item', 5),
(32, 1, 0, 1, 0, 1545640725, '{\"tableName\":\"cms_nav_item_page_block_item\",\"action\":\"update\",\"row\":5,\"pageTitle\":\"1231321\",\"blockName\":\"HTML\"}', '[]', 'cms_nav_item_page_block_item', 5);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cms_nav`
--

DROP TABLE IF EXISTS `cms_nav`;
CREATE TABLE IF NOT EXISTS `cms_nav` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nav_container_id` int(11) NOT NULL,
  `parent_nav_id` int(11) NOT NULL,
  `sort_index` int(11) NOT NULL,
  `is_deleted` tinyint(1) DEFAULT '0',
  `is_hidden` tinyint(1) DEFAULT '0',
  `is_home` tinyint(1) DEFAULT '0',
  `is_offline` tinyint(1) DEFAULT '0',
  `is_draft` tinyint(1) DEFAULT '0',
  `layout_file` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `publish_from` int(11) DEFAULT NULL,
  `publish_till` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `index_nav_container` (`nav_container_id`),
  KEY `index_parent_nav_id` (`parent_nav_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `cms_nav`
--

INSERT INTO `cms_nav` (`id`, `nav_container_id`, `parent_nav_id`, `sort_index`, `is_deleted`, `is_hidden`, `is_home`, `is_offline`, `is_draft`, `layout_file`, `publish_from`, `publish_till`) VALUES
(1, 1, 0, 1, 0, 0, 1, 0, 0, NULL, NULL, NULL),
(2, 1, 0, 2, 0, 0, 0, 0, 0, NULL, NULL, NULL),
(3, 1, 0, 3, 0, 0, 0, 0, 0, NULL, NULL, NULL),
(4, 1, 0, 4, 0, 1, 0, 1, 1, NULL, NULL, NULL),
(5, 1, 0, 5, 0, 0, 0, 0, 0, NULL, NULL, NULL),
(6, 1, 0, 6, 0, 0, 0, 0, 0, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cms_nav_container`
--

DROP TABLE IF EXISTS `cms_nav_container`;
CREATE TABLE IF NOT EXISTS `cms_nav_container` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `alias` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `is_deleted` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `cms_nav_container`
--

INSERT INTO `cms_nav_container` (`id`, `name`, `alias`, `is_deleted`) VALUES
(1, 'Default Container', 'default', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cms_nav_item`
--

DROP TABLE IF EXISTS `cms_nav_item`;
CREATE TABLE IF NOT EXISTS `cms_nav_item` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nav_id` int(11) NOT NULL,
  `lang_id` int(11) NOT NULL,
  `nav_item_type` int(11) NOT NULL,
  `nav_item_type_id` int(11) NOT NULL,
  `create_user_id` int(11) NOT NULL,
  `update_user_id` int(11) NOT NULL,
  `timestamp_create` int(11) DEFAULT '0',
  `timestamp_update` int(11) DEFAULT '0',
  `title` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `alias` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `keywords` text COLLATE utf8_unicode_ci,
  `title_tag` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `index_alias` (`alias`),
  KEY `index_nav_id` (`nav_id`),
  KEY `index_lang_id` (`lang_id`),
  KEY `index_nav_item_type_id` (`nav_item_type_id`),
  KEY `index_create_user_id` (`create_user_id`),
  KEY `index_update_user_id` (`update_user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `cms_nav_item`
--

INSERT INTO `cms_nav_item` (`id`, `nav_id`, `lang_id`, `nav_item_type`, `nav_item_type_id`, `create_user_id`, `update_user_id`, `timestamp_create`, `timestamp_update`, `title`, `alias`, `description`, `keywords`, `title_tag`) VALUES
(1, 1, 1, 1, 1, 1, 1, 1545280884, 1545615757, 'Homepage', 'homepage', NULL, NULL, NULL),
(2, 2, 1, 2, 1, 1, 1, 1545448771, 0, 'news-1', 'news-1', NULL, NULL, NULL),
(3, 3, 1, 2, 2, 1, 1, 1545449279, 1545449401, '1231312', '1231312', '', '', ''),
(4, 4, 1, 1, 2, 1, 1, 1545617037, 1545640243, 'test my module', 'test-my-module', NULL, NULL, NULL),
(5, 5, 1, 2, 3, 1, 1, 1545617118, 1545617147, 'my-modules', 'my-modules', 'my module', 'my module', 'my module'),
(6, 6, 1, 1, 3, 1, 1, 1545640494, 1545640725, '1231321', '1231321', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cms_nav_item_module`
--

DROP TABLE IF EXISTS `cms_nav_item_module`;
CREATE TABLE IF NOT EXISTS `cms_nav_item_module` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `module_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `cms_nav_item_module`
--

INSERT INTO `cms_nav_item_module` (`id`, `module_name`) VALUES
(1, 'news'),
(2, 'apifrontend'),
(3, 'api');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cms_nav_item_page`
--

DROP TABLE IF EXISTS `cms_nav_item_page`;
CREATE TABLE IF NOT EXISTS `cms_nav_item_page` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `layout_id` int(11) NOT NULL,
  `nav_item_id` int(11) NOT NULL,
  `timestamp_create` int(11) NOT NULL,
  `create_user_id` int(11) NOT NULL,
  `version_alias` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `index_layout_id` (`layout_id`),
  KEY `index_nav_item_id` (`nav_item_id`),
  KEY `index_create_user_id` (`create_user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `cms_nav_item_page`
--

INSERT INTO `cms_nav_item_page` (`id`, `layout_id`, `nav_item_id`, `timestamp_create`, `create_user_id`, `version_alias`) VALUES
(1, 1, 1, 1545280884, 1, 'Initial'),
(2, 1, 4, 1545617037, 1, 'Initial'),
(3, 2, 6, 1545640494, 1, 'Initial');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cms_nav_item_page_block_item`
--

DROP TABLE IF EXISTS `cms_nav_item_page_block_item`;
CREATE TABLE IF NOT EXISTS `cms_nav_item_page_block_item` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `block_id` int(11) NOT NULL,
  `placeholder_var` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `nav_item_page_id` int(11) DEFAULT NULL,
  `prev_id` int(11) DEFAULT NULL,
  `json_config_values` text COLLATE utf8_unicode_ci,
  `json_config_cfg_values` text COLLATE utf8_unicode_ci,
  `is_dirty` tinyint(1) DEFAULT '0',
  `create_user_id` int(11) DEFAULT '0',
  `update_user_id` int(11) DEFAULT '0',
  `timestamp_create` int(11) DEFAULT '0',
  `timestamp_update` int(11) DEFAULT '0',
  `sort_index` int(11) DEFAULT '0',
  `is_hidden` tinyint(1) DEFAULT '0',
  `variation` varchar(255) COLLATE utf8_unicode_ci DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `index_block_id` (`block_id`),
  KEY `index_placeholder_var` (`placeholder_var`),
  KEY `index_nav_item_page_id` (`nav_item_page_id`),
  KEY `index_prev_id` (`prev_id`),
  KEY `index_create_user_id` (`create_user_id`),
  KEY `index_update_user_id` (`update_user_id`),
  KEY `index_nipi_pv_pi_ih_si` (`nav_item_page_id`,`placeholder_var`,`prev_id`,`is_hidden`,`sort_index`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `cms_nav_item_page_block_item`
--

INSERT INTO `cms_nav_item_page_block_item` (`id`, `block_id`, `placeholder_var`, `nav_item_page_id`, `prev_id`, `json_config_values`, `json_config_cfg_values`, `is_dirty`, `create_user_id`, `update_user_id`, `timestamp_create`, `timestamp_update`, `sort_index`, `is_hidden`, `variation`) VALUES
(1, 2, 'content', 1, 0, '{\"moduleName\":\"api\"}', '{\"moduleController\":\"\",\"strictRender\":\"\"}', 1, 1, 1, 1545615732, 1545615757, 0, 0, '0'),
(5, 1, 'right', 3, 0, '{\"html\":\"<h1>left<\\/h1>\"}', '{\"raw\":1}', 1, 1, 1, 1545640688, 1545640725, 0, 0, '0'),
(4, 1, 'left', 3, 0, '{\"html\":\"<h1>Xin chao<\\/h1>\"}', '{\"raw\":1}', 1, 1, 1, 1545640657, 1545640684, 0, 0, '0');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cms_nav_item_redirect`
--

DROP TABLE IF EXISTS `cms_nav_item_redirect`;
CREATE TABLE IF NOT EXISTS `cms_nav_item_redirect` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` int(11) NOT NULL,
  `value` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cms_nav_permission`
--

DROP TABLE IF EXISTS `cms_nav_permission`;
CREATE TABLE IF NOT EXISTS `cms_nav_permission` (
  `group_id` int(11) NOT NULL,
  `nav_id` int(11) NOT NULL,
  `inheritance` tinyint(1) DEFAULT '0',
  KEY `index_group_id` (`group_id`),
  KEY `index_nav_id` (`nav_id`),
  KEY `index_group_id_nav_id` (`group_id`,`nav_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cms_nav_property`
--

DROP TABLE IF EXISTS `cms_nav_property`;
CREATE TABLE IF NOT EXISTS `cms_nav_property` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nav_id` int(11) NOT NULL,
  `admin_prop_id` int(11) NOT NULL,
  `value` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`),
  KEY `index_nav_id` (`nav_id`),
  KEY `index_admin_prop_id` (`admin_prop_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cms_redirect`
--

DROP TABLE IF EXISTS `cms_redirect`;
CREATE TABLE IF NOT EXISTS `cms_redirect` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `timestamp_create` int(11) DEFAULT NULL,
  `catch_path` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `redirect_path` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `redirect_status_code` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `eav_attribute`
--

DROP TABLE IF EXISTS `eav_attribute`;
CREATE TABLE IF NOT EXISTS `eav_attribute` (
  `attribute_id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Attribute Id',
  `entity_type_id` smallint(5) UNSIGNED DEFAULT '0' COMMENT 'Entity Type Id',
  `attribute_code` varchar(255) NOT NULL COMMENT 'Attribute Code',
  `attribute_model` varchar(255) DEFAULT NULL COMMENT 'Attribute Model',
  `backend_model` varchar(255) DEFAULT NULL COMMENT 'Backend Model',
  `backend_type` varchar(8) NOT NULL DEFAULT 'static' COMMENT 'Backend Type',
  `backend_table` varchar(255) DEFAULT NULL COMMENT 'Backend Table',
  `frontend_model` varchar(255) DEFAULT NULL COMMENT 'Frontend Model',
  `frontend_input` varchar(50) DEFAULT NULL COMMENT 'Frontend Input',
  `frontend_label` varchar(255) DEFAULT NULL COMMENT 'Frontend Label',
  `frontend_class` varchar(255) DEFAULT NULL COMMENT 'Frontend Class',
  `source_model` varchar(255) DEFAULT NULL COMMENT 'Source Model',
  `is_required` smallint(5) UNSIGNED NOT NULL DEFAULT '0' COMMENT 'Defines Is Required',
  `is_user_defined` smallint(5) UNSIGNED NOT NULL DEFAULT '0' COMMENT 'Defines Is User Defined',
  `default_value` text COMMENT 'Default Value',
  `is_unique` smallint(5) UNSIGNED NOT NULL DEFAULT '0' COMMENT 'Defines Is Unique',
  `note` varchar(255) DEFAULT NULL COMMENT 'Note',
  PRIMARY KEY (`attribute_id`),
  UNIQUE KEY `EAV_ATTRIBUTE_ENTITY_TYPE_ID_ATTRIBUTE_CODE` (`entity_type_id`,`attribute_code`)
) ENGINE=InnoDB AUTO_INCREMENT=158 DEFAULT CHARSET=utf8 COMMENT='Eav Attribute';

--
-- Đang đổ dữ liệu cho bảng `eav_attribute`
--

INSERT INTO `eav_attribute` (`attribute_id`, `entity_type_id`, `attribute_code`, `attribute_model`, `backend_model`, `backend_type`, `backend_table`, `frontend_model`, `frontend_input`, `frontend_label`, `frontend_class`, `source_model`, `is_required`, `is_user_defined`, `default_value`, `is_unique`, `note`) VALUES
(73, 4, 'name', NULL, NULL, 'varchar', NULL, NULL, 'text', 'Product Name', 'validate-length maximum-length-255', NULL, 1, 0, NULL, 0, NULL),
(74, 4, 'sku', 'Magento\\Catalog\\Model\\ResourceModel\\Eav\\Attribute', 'Magento\\Catalog\\Model\\Product\\Attribute\\Backend\\Sku', 'static', NULL, NULL, 'text', 'SKU', 'validate-length maximum-length-64', NULL, 1, 0, NULL, 1, NULL),
(75, 4, 'description', NULL, NULL, 'text', NULL, NULL, 'textarea', 'Description', NULL, NULL, 0, 0, NULL, 0, NULL),
(76, 4, 'short_description', NULL, NULL, 'text', NULL, NULL, 'textarea', 'Short Description', NULL, NULL, 0, 0, NULL, 0, NULL),
(77, 4, 'price', NULL, 'Magento\\Catalog\\Model\\Product\\Attribute\\Backend\\Price', 'decimal', NULL, NULL, 'price', 'Price', NULL, NULL, 1, 0, NULL, 0, NULL),
(78, 4, 'special_price', NULL, 'Magento\\Catalog\\Model\\Product\\Attribute\\Backend\\Price', 'decimal', NULL, NULL, 'price', 'Special Price', NULL, NULL, 0, 0, NULL, 0, NULL),
(79, 4, 'special_from_date', NULL, 'Magento\\Catalog\\Model\\Attribute\\Backend\\Startdate', 'datetime', NULL, NULL, 'date', 'Special Price From Date', NULL, NULL, 0, 0, NULL, 0, NULL),
(80, 4, 'special_to_date', NULL, 'Magento\\Eav\\Model\\Entity\\Attribute\\Backend\\Datetime', 'datetime', NULL, NULL, 'date', 'Special Price To Date', NULL, NULL, 0, 0, NULL, 0, NULL),
(81, 4, 'cost', NULL, 'Magento\\Catalog\\Model\\Product\\Attribute\\Backend\\Price', 'decimal', NULL, NULL, 'price', 'Cost', NULL, NULL, 0, 1, NULL, 0, NULL),
(82, 4, 'weight', NULL, 'Magento\\Catalog\\Model\\Product\\Attribute\\Backend\\Weight', 'decimal', NULL, NULL, 'weight', 'Weight', NULL, NULL, 0, 0, NULL, 0, NULL),
(83, 4, 'manufacturer', NULL, NULL, 'int', NULL, NULL, 'select', 'Manufacturer', NULL, NULL, 0, 1, NULL, 0, NULL),
(84, 4, 'meta_title', NULL, NULL, 'varchar', NULL, NULL, 'text', 'Meta Title', NULL, NULL, 0, 0, NULL, 0, NULL),
(85, 4, 'meta_keyword', NULL, NULL, 'text', NULL, NULL, 'textarea', 'Meta Keywords', NULL, NULL, 0, 0, NULL, 0, NULL),
(86, 4, 'meta_description', NULL, NULL, 'varchar', NULL, NULL, 'textarea', 'Meta Description', NULL, NULL, 0, 0, NULL, 0, 'Maximum 255 chars. Meta Description should optimally be between 150-160 characters'),
(87, 4, 'image', NULL, NULL, 'varchar', NULL, 'Magento\\Catalog\\Model\\Product\\Attribute\\Frontend\\Image', 'media_image', 'Base', NULL, NULL, 0, 0, NULL, 0, NULL),
(88, 4, 'small_image', NULL, NULL, 'varchar', NULL, 'Magento\\Catalog\\Model\\Product\\Attribute\\Frontend\\Image', 'media_image', 'Small', NULL, NULL, 0, 0, NULL, 0, NULL),
(89, 4, 'thumbnail', NULL, NULL, 'varchar', NULL, 'Magento\\Catalog\\Model\\Product\\Attribute\\Frontend\\Image', 'media_image', 'Thumbnail', NULL, NULL, 0, 0, NULL, 0, NULL),
(90, 4, 'media_gallery', NULL, NULL, 'static', NULL, NULL, 'gallery', 'Media Gallery', NULL, NULL, 0, 0, NULL, 0, NULL),
(91, 4, 'old_id', NULL, NULL, 'int', NULL, NULL, 'text', NULL, NULL, NULL, 0, 0, NULL, 0, NULL),
(92, 4, 'tier_price', NULL, 'Magento\\Catalog\\Model\\Product\\Attribute\\Backend\\Tierprice', 'decimal', NULL, NULL, 'text', 'Tier Price', NULL, NULL, 0, 0, NULL, 0, NULL),
(93, 4, 'color', 'Magento\\Catalog\\Model\\ResourceModel\\Eav\\Attribute', NULL, 'int', NULL, NULL, 'select', 'Color', NULL, NULL, 0, 1, '49', 0, NULL),
(94, 4, 'news_from_date', NULL, 'Magento\\Catalog\\Model\\Attribute\\Backend\\Startdate', 'datetime', NULL, NULL, 'date', 'Set Product as New from Date', NULL, NULL, 0, 0, NULL, 0, NULL),
(95, 4, 'news_to_date', NULL, 'Magento\\Eav\\Model\\Entity\\Attribute\\Backend\\Datetime', 'datetime', NULL, NULL, 'date', 'Set Product as New to Date', NULL, NULL, 0, 0, NULL, 0, NULL),
(96, 4, 'gallery', NULL, NULL, 'varchar', NULL, NULL, 'gallery', 'Image Gallery', NULL, NULL, 0, 0, NULL, 0, NULL),
(97, 4, 'status', NULL, NULL, 'int', NULL, NULL, 'select', 'Enable Product', NULL, 'Magento\\Catalog\\Model\\Product\\Attribute\\Source\\Status', 0, 0, '1', 0, NULL),
(98, 4, 'minimal_price', NULL, NULL, 'decimal', NULL, NULL, 'price', 'Minimal Price', NULL, NULL, 0, 0, NULL, 0, NULL),
(99, 4, 'visibility', NULL, NULL, 'int', NULL, NULL, 'select', 'Visibility', NULL, 'Magento\\Catalog\\Model\\Product\\Visibility', 0, 0, '4', 0, NULL),
(100, 4, 'custom_design', NULL, NULL, 'varchar', NULL, NULL, 'select', 'New Theme', NULL, 'Magento\\Theme\\Model\\Theme\\Source\\Theme', 0, 0, NULL, 0, NULL),
(101, 4, 'custom_design_from', NULL, 'Magento\\Catalog\\Model\\Attribute\\Backend\\Startdate', 'datetime', NULL, NULL, 'date', 'Active From', NULL, NULL, 0, 0, NULL, 0, NULL),
(102, 4, 'custom_design_to', NULL, 'Magento\\Eav\\Model\\Entity\\Attribute\\Backend\\Datetime', 'datetime', NULL, NULL, 'date', 'Active To', NULL, NULL, 0, 0, NULL, 0, NULL),
(103, 4, 'custom_layout_update', NULL, 'Magento\\Catalog\\Model\\Attribute\\Backend\\Customlayoutupdate', 'text', NULL, NULL, 'textarea', 'Layout Update XML', NULL, NULL, 0, 0, NULL, 0, NULL),
(104, 4, 'page_layout', NULL, NULL, 'varchar', NULL, NULL, 'select', 'Layout', NULL, 'Magento\\Catalog\\Model\\Product\\Attribute\\Source\\Layout', 0, 0, NULL, 0, NULL),
(105, 4, 'category_ids', NULL, 'Magento\\Catalog\\Model\\Product\\Attribute\\Backend\\Category', 'static', NULL, NULL, 'text', 'Categories', NULL, NULL, 0, 0, NULL, 0, NULL),
(106, 4, 'options_container', NULL, NULL, 'varchar', NULL, NULL, 'select', 'Display Product Options In', NULL, 'Magento\\Catalog\\Model\\Entity\\Product\\Attribute\\Design\\Options\\Container', 0, 0, 'container2', 0, NULL),
(107, 4, 'required_options', NULL, NULL, 'static', NULL, NULL, 'text', NULL, NULL, NULL, 0, 0, NULL, 0, NULL),
(108, 4, 'has_options', NULL, NULL, 'static', NULL, NULL, 'text', NULL, NULL, NULL, 0, 0, NULL, 0, NULL),
(109, 4, 'image_label', NULL, NULL, 'varchar', NULL, NULL, 'text', 'Image Label', NULL, NULL, 0, 0, NULL, 0, NULL),
(110, 4, 'small_image_label', NULL, NULL, 'varchar', NULL, NULL, 'text', 'Small Image Label', NULL, NULL, 0, 0, NULL, 0, NULL),
(111, 4, 'thumbnail_label', NULL, NULL, 'varchar', NULL, NULL, 'text', 'Thumbnail Label', NULL, NULL, 0, 0, NULL, 0, NULL),
(112, 4, 'created_at', NULL, NULL, 'static', NULL, NULL, 'date', NULL, NULL, NULL, 1, 0, NULL, 0, NULL),
(113, 4, 'updated_at', NULL, NULL, 'static', NULL, NULL, 'date', NULL, NULL, NULL, 1, 0, NULL, 0, NULL),
(114, 4, 'country_of_manufacture', NULL, NULL, 'varchar', NULL, NULL, 'select', 'Country of Manufacture', NULL, 'Magento\\Catalog\\Model\\Product\\Attribute\\Source\\Countryofmanufacture', 0, 0, NULL, 0, NULL),
(115, 4, 'quantity_and_stock_status', NULL, 'Magento\\Catalog\\Model\\Product\\Attribute\\Backend\\Stock', 'int', NULL, NULL, 'select', 'Quantity', NULL, 'Magento\\CatalogInventory\\Model\\Source\\Stock', 0, 0, '1', 0, NULL),
(116, 4, 'custom_layout', NULL, NULL, 'varchar', NULL, NULL, 'select', 'New Layout', NULL, 'Magento\\Catalog\\Model\\Product\\Attribute\\Source\\Layout', 0, 0, NULL, 0, NULL),
(117, 4, 'msrp', NULL, 'Magento\\Catalog\\Model\\Product\\Attribute\\Backend\\Price', 'decimal', NULL, NULL, 'price', 'Manufacturer\'s Suggested Retail Price', NULL, NULL, 0, 0, NULL, 0, NULL),
(118, 4, 'msrp_display_actual_price_type', NULL, 'Magento\\Catalog\\Model\\Product\\Attribute\\Backend\\Boolean', 'varchar', NULL, NULL, 'select', 'Display Actual Price', NULL, 'Magento\\Msrp\\Model\\Product\\Attribute\\Source\\Type\\Price', 0, 0, '0', 0, NULL),
(119, 4, 'price_type', NULL, NULL, 'int', NULL, NULL, 'boolean', 'Dynamic Price', NULL, NULL, 1, 0, '0', 0, NULL),
(120, 4, 'sku_type', NULL, NULL, 'int', NULL, NULL, 'boolean', 'Dynamic SKU', NULL, NULL, 1, 0, '0', 0, NULL),
(121, 4, 'weight_type', NULL, NULL, 'int', NULL, NULL, 'boolean', 'Dynamic Weight', NULL, NULL, 1, 0, '0', 0, NULL),
(122, 4, 'price_view', NULL, NULL, 'int', NULL, NULL, 'select', 'Price View', NULL, 'Magento\\Bundle\\Model\\Product\\Attribute\\Source\\Price\\View', 1, 0, NULL, 0, NULL),
(123, 4, 'shipment_type', NULL, NULL, 'int', NULL, NULL, 'select', 'Ship Bundle Items', NULL, 'Magento\\Bundle\\Model\\Product\\Attribute\\Source\\Shipment\\Type', 1, 0, '0', 0, NULL),
(126, 4, 'url_key', NULL, NULL, 'varchar', NULL, NULL, 'text', 'URL Key', NULL, NULL, 0, 0, NULL, 0, NULL),
(127, 4, 'url_path', NULL, NULL, 'varchar', NULL, NULL, 'text', NULL, NULL, NULL, 0, 0, NULL, 0, NULL),
(128, 4, 'links_purchased_separately', NULL, NULL, 'int', NULL, NULL, NULL, 'Links can be purchased separately', NULL, NULL, 1, 0, NULL, 0, NULL),
(129, 4, 'samples_title', NULL, NULL, 'varchar', NULL, NULL, NULL, 'Samples title', NULL, NULL, 1, 0, NULL, 0, NULL),
(130, 4, 'links_title', NULL, NULL, 'varchar', NULL, NULL, NULL, 'Links title', NULL, NULL, 1, 0, NULL, 0, NULL),
(131, 4, 'links_exist', NULL, NULL, 'int', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, '0', 0, NULL),
(132, 4, 'tax_class_id', NULL, NULL, 'int', NULL, NULL, 'select', 'Tax Class', NULL, 'Magento\\Tax\\Model\\TaxClass\\Source\\Product', 0, 0, '2', 0, NULL),
(133, 4, 'gift_message_available', NULL, 'Magento\\Catalog\\Model\\Product\\Attribute\\Backend\\Boolean', 'varchar', NULL, NULL, 'select', 'Allow Gift Message', NULL, 'Magento\\Catalog\\Model\\Product\\Attribute\\Source\\Boolean', 0, 0, NULL, 0, NULL),
(134, 4, 'activity', NULL, 'Magento\\Eav\\Model\\Entity\\Attribute\\Backend\\ArrayBackend', 'varchar', NULL, NULL, 'multiselect', 'Activity', NULL, NULL, 0, 1, '', 0, NULL),
(135, 4, 'style_bags', NULL, 'Magento\\Eav\\Model\\Entity\\Attribute\\Backend\\ArrayBackend', 'varchar', NULL, NULL, 'multiselect', 'Style Bags', NULL, NULL, 0, 1, '', 0, NULL),
(136, 4, 'material', NULL, 'Magento\\Eav\\Model\\Entity\\Attribute\\Backend\\ArrayBackend', 'varchar', NULL, NULL, 'multiselect', 'Material', NULL, NULL, 0, 1, '', 0, NULL),
(137, 4, 'strap_bags', NULL, 'Magento\\Eav\\Model\\Entity\\Attribute\\Backend\\ArrayBackend', 'varchar', NULL, NULL, 'multiselect', 'Strap/Handle', NULL, NULL, 0, 1, '', 0, NULL),
(138, 4, 'features_bags', NULL, 'Magento\\Eav\\Model\\Entity\\Attribute\\Backend\\ArrayBackend', 'varchar', NULL, NULL, 'multiselect', 'Features', NULL, NULL, 0, 1, '', 0, NULL),
(139, 4, 'gender', NULL, 'Magento\\Eav\\Model\\Entity\\Attribute\\Backend\\ArrayBackend', 'varchar', NULL, NULL, 'multiselect', 'Gender', NULL, NULL, 0, 1, '', 0, NULL),
(140, 4, 'category_gear', NULL, 'Magento\\Eav\\Model\\Entity\\Attribute\\Backend\\ArrayBackend', 'varchar', NULL, NULL, 'multiselect', 'Category Gear', NULL, NULL, 0, 1, '', 0, NULL),
(141, 4, 'size', NULL, NULL, 'int', NULL, NULL, 'select', 'Size', NULL, NULL, 0, 1, '91', 0, NULL),
(142, 4, 'eco_collection', NULL, NULL, 'int', NULL, NULL, 'boolean', 'Eco Collection', NULL, 'Magento\\Eav\\Model\\Entity\\Attribute\\Source\\Boolean', 0, 1, '', 0, NULL),
(143, 4, 'performance_fabric', NULL, NULL, 'int', NULL, NULL, 'boolean', 'Performance Fabric', NULL, 'Magento\\Eav\\Model\\Entity\\Attribute\\Source\\Boolean', 0, 1, '', 0, NULL),
(144, 4, 'erin_recommends', NULL, NULL, 'int', NULL, NULL, 'boolean', 'Erin Recommends', NULL, 'Magento\\Eav\\Model\\Entity\\Attribute\\Source\\Boolean', 0, 1, '', 0, NULL),
(145, 4, 'new', NULL, NULL, 'int', NULL, NULL, 'boolean', 'New', NULL, 'Magento\\Eav\\Model\\Entity\\Attribute\\Source\\Boolean', 0, 1, '', 0, NULL),
(146, 4, 'sale', NULL, NULL, 'int', NULL, NULL, 'boolean', 'Sale', NULL, 'Magento\\Eav\\Model\\Entity\\Attribute\\Source\\Boolean', 0, 1, '', 0, NULL),
(147, 4, 'format', NULL, NULL, 'int', NULL, NULL, 'select', 'Format', NULL, 'Magento\\Eav\\Model\\Entity\\Attribute\\Source\\Table', 0, 1, '', 0, NULL),
(148, 4, 'style_bottom', NULL, 'Magento\\Eav\\Model\\Entity\\Attribute\\Backend\\ArrayBackend', 'varchar', NULL, NULL, 'multiselect', 'Style Bottom', NULL, NULL, 0, 1, '', 0, NULL),
(149, 4, 'style_general', NULL, 'Magento\\Eav\\Model\\Entity\\Attribute\\Backend\\ArrayBackend', 'varchar', NULL, NULL, 'multiselect', 'Style General', NULL, NULL, 0, 1, '', 0, NULL),
(150, 4, 'sleeve', NULL, 'Magento\\Eav\\Model\\Entity\\Attribute\\Backend\\ArrayBackend', 'varchar', NULL, NULL, 'multiselect', 'Sleeve', NULL, NULL, 0, 1, '', 0, NULL),
(151, 4, 'collar', NULL, 'Magento\\Eav\\Model\\Entity\\Attribute\\Backend\\ArrayBackend', 'varchar', NULL, NULL, 'multiselect', 'Collar', NULL, NULL, 0, 1, '', 0, NULL),
(152, 4, 'pattern', NULL, 'Magento\\Eav\\Model\\Entity\\Attribute\\Backend\\ArrayBackend', 'varchar', NULL, NULL, 'multiselect', 'Pattern', NULL, NULL, 0, 1, '', 0, NULL),
(153, 4, 'climate', NULL, 'Magento\\Eav\\Model\\Entity\\Attribute\\Backend\\ArrayBackend', 'varchar', NULL, NULL, 'multiselect', 'Climate', NULL, NULL, 0, 1, '', 0, NULL),
(154, 4, 'swatch_image', NULL, NULL, 'varchar', NULL, 'Magento\\Catalog\\Model\\Product\\Attribute\\Frontend\\Image', 'media_image', 'Swatch', NULL, NULL, 0, 0, NULL, 0, NULL),
(155, 4, 'wallcatalog_type', NULL, NULL, 'varchar', NULL, NULL, 'select', 'Wall Catalog Type', NULL, 'Absoft\\WallCatalog\\Model\\Config\\Source\\Options', 0, 0, NULL, 0, NULL),
(156, 4, 'allow_preview', NULL, NULL, 'int', NULL, NULL, 'boolean', 'Allow view on Visualizer', NULL, 'Magento\\Eav\\Model\\Entity\\Attribute\\Source\\Boolean', 0, 0, NULL, 0, NULL),
(157, 4, 'is_customizable', NULL, NULL, 'int', NULL, NULL, 'boolean', 'Is Customizable', NULL, 'Magento\\Eav\\Model\\Entity\\Attribute\\Source\\Boolean', 0, 0, NULL, 0, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `eav_attribute_group`
--

DROP TABLE IF EXISTS `eav_attribute_group`;
CREATE TABLE IF NOT EXISTS `eav_attribute_group` (
  `attribute_group_id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Attribute Group Id',
  `attribute_set_id` smallint(5) UNSIGNED NOT NULL DEFAULT '0' COMMENT 'Attribute Set Id',
  `attribute_group_name` varchar(255) DEFAULT NULL COMMENT 'Attribute Group Name',
  `sort_order` smallint(6) NOT NULL DEFAULT '0' COMMENT 'Sort Order',
  `default_id` smallint(5) UNSIGNED DEFAULT '0' COMMENT 'Default Id',
  `attribute_group_code` varchar(255) NOT NULL COMMENT 'Attribute Group Code',
  `tab_group_code` varchar(255) DEFAULT NULL COMMENT 'Tab Group Code',
  PRIMARY KEY (`attribute_group_id`),
  UNIQUE KEY `CATALOG_CATEGORY_PRODUCT_ATTRIBUTE_SET_ID_ATTRIBUTE_GROUP_CODE` (`attribute_set_id`,`attribute_group_code`),
  UNIQUE KEY `EAV_ATTRIBUTE_GROUP_ATTRIBUTE_SET_ID_ATTRIBUTE_GROUP_NAME` (`attribute_set_id`,`attribute_group_name`),
  KEY `EAV_ATTRIBUTE_GROUP_ATTRIBUTE_SET_ID_SORT_ORDER` (`attribute_set_id`,`sort_order`)
) ENGINE=InnoDB AUTO_INCREMENT=93 DEFAULT CHARSET=utf8 COMMENT='Eav Attribute Group';

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `eav_attribute_label`
--

DROP TABLE IF EXISTS `eav_attribute_label`;
CREATE TABLE IF NOT EXISTS `eav_attribute_label` (
  `attribute_label_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Attribute Label Id',
  `attribute_id` smallint(5) UNSIGNED NOT NULL DEFAULT '0' COMMENT 'Attribute Id',
  `store_id` smallint(5) UNSIGNED NOT NULL DEFAULT '0' COMMENT 'Store Id',
  `value` varchar(255) DEFAULT NULL COMMENT 'Value',
  PRIMARY KEY (`attribute_label_id`),
  KEY `EAV_ATTRIBUTE_LABEL_STORE_ID` (`store_id`),
  KEY `EAV_ATTRIBUTE_LABEL_ATTRIBUTE_ID_STORE_ID` (`attribute_id`,`store_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Eav Attribute Label';

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `eav_attribute_option`
--

DROP TABLE IF EXISTS `eav_attribute_option`;
CREATE TABLE IF NOT EXISTS `eav_attribute_option` (
  `option_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Option Id',
  `attribute_id` smallint(5) UNSIGNED NOT NULL DEFAULT '0' COMMENT 'Attribute Id',
  `sort_order` smallint(5) UNSIGNED NOT NULL DEFAULT '0' COMMENT 'Sort Order',
  PRIMARY KEY (`option_id`),
  KEY `EAV_ATTRIBUTE_OPTION_ATTRIBUTE_ID` (`attribute_id`)
) ENGINE=InnoDB AUTO_INCREMENT=213 DEFAULT CHARSET=utf8 COMMENT='Eav Attribute Option';

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `eav_attribute_option_value`
--

DROP TABLE IF EXISTS `eav_attribute_option_value`;
CREATE TABLE IF NOT EXISTS `eav_attribute_option_value` (
  `value_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Value Id',
  `option_id` int(10) UNSIGNED NOT NULL DEFAULT '0' COMMENT 'Option Id',
  `store_id` smallint(5) UNSIGNED NOT NULL DEFAULT '0' COMMENT 'Store Id',
  `value` varchar(255) DEFAULT NULL COMMENT 'Value',
  PRIMARY KEY (`value_id`),
  KEY `EAV_ATTRIBUTE_OPTION_VALUE_OPTION_ID` (`option_id`),
  KEY `EAV_ATTRIBUTE_OPTION_VALUE_STORE_ID` (`store_id`)
) ENGINE=InnoDB AUTO_INCREMENT=239 DEFAULT CHARSET=utf8 COMMENT='Eav Attribute Option Value';

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `eav_attribute_set`
--

DROP TABLE IF EXISTS `eav_attribute_set`;
CREATE TABLE IF NOT EXISTS `eav_attribute_set` (
  `attribute_set_id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Attribute Set Id',
  `entity_type_id` smallint(5) UNSIGNED NOT NULL DEFAULT '0' COMMENT 'Entity Type Id',
  `attribute_set_name` varchar(255) DEFAULT NULL COMMENT 'Attribute Set Name',
  `sort_order` smallint(6) NOT NULL DEFAULT '0' COMMENT 'Sort Order',
  PRIMARY KEY (`attribute_set_id`),
  UNIQUE KEY `EAV_ATTRIBUTE_SET_ENTITY_TYPE_ID_ATTRIBUTE_SET_NAME` (`entity_type_id`,`attribute_set_name`),
  KEY `EAV_ATTRIBUTE_SET_ENTITY_TYPE_ID_SORT_ORDER` (`entity_type_id`,`sort_order`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='Eav Attribute Set';

--
-- Đang đổ dữ liệu cho bảng `eav_attribute_set`
--

INSERT INTO `eav_attribute_set` (`attribute_set_id`, `entity_type_id`, `attribute_set_name`, `sort_order`) VALUES
(4, 4, 'Default', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `eav_entity_attribute`
--

DROP TABLE IF EXISTS `eav_entity_attribute`;
CREATE TABLE IF NOT EXISTS `eav_entity_attribute` (
  `entity_attribute_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Entity Attribute Id',
  `entity_type_id` smallint(5) UNSIGNED NOT NULL DEFAULT '0' COMMENT 'Entity Type Id',
  `attribute_set_id` smallint(5) UNSIGNED NOT NULL DEFAULT '0' COMMENT 'Attribute Set Id',
  `attribute_group_id` smallint(5) UNSIGNED NOT NULL DEFAULT '0' COMMENT 'Attribute Group Id',
  `attribute_id` smallint(5) UNSIGNED NOT NULL DEFAULT '0' COMMENT 'Attribute Id',
  `sort_order` smallint(6) NOT NULL DEFAULT '0' COMMENT 'Sort Order',
  PRIMARY KEY (`entity_attribute_id`),
  UNIQUE KEY `EAV_ENTITY_ATTRIBUTE_ATTRIBUTE_SET_ID_ATTRIBUTE_ID` (`attribute_set_id`,`attribute_id`),
  UNIQUE KEY `EAV_ENTITY_ATTRIBUTE_ATTRIBUTE_GROUP_ID_ATTRIBUTE_ID` (`attribute_group_id`,`attribute_id`),
  KEY `EAV_ENTITY_ATTRIBUTE_ATTRIBUTE_SET_ID_SORT_ORDER` (`attribute_set_id`,`sort_order`),
  KEY `EAV_ENTITY_ATTRIBUTE_ATTRIBUTE_ID` (`attribute_id`)
) ENGINE=InnoDB AUTO_INCREMENT=701 DEFAULT CHARSET=utf8 COMMENT='Eav Entity Attributes';

--
-- Đang đổ dữ liệu cho bảng `eav_entity_attribute`
--

INSERT INTO `eav_entity_attribute` (`entity_attribute_id`, `entity_type_id`, `attribute_set_id`, `attribute_group_id`, `attribute_id`, `sort_order`) VALUES
(73, 4, 4, 7, 73, 10),
(74, 4, 4, 7, 74, 20),
(75, 4, 4, 13, 75, 90),
(76, 4, 4, 13, 76, 100),
(77, 4, 4, 7, 77, 30),
(78, 4, 4, 8, 78, 3),
(79, 4, 4, 8, 79, 4),
(80, 4, 4, 8, 80, 5),
(81, 4, 4, 8, 81, 6),
(82, 4, 4, 7, 82, 70),
(83, 4, 4, 9, 84, 20),
(84, 4, 4, 9, 85, 30),
(85, 4, 4, 9, 86, 40),
(86, 4, 4, 10, 87, 1),
(87, 4, 4, 10, 88, 2),
(88, 4, 4, 10, 89, 3),
(89, 4, 4, 10, 90, 4),
(90, 4, 4, 7, 91, 6),
(91, 4, 4, 8, 92, 7),
(92, 4, 4, 7, 94, 90),
(93, 4, 4, 7, 95, 100),
(94, 4, 4, 10, 96, 5),
(95, 4, 4, 7, 97, 5),
(96, 4, 4, 8, 98, 8),
(97, 4, 4, 7, 99, 80),
(98, 4, 4, 14, 100, 40),
(99, 4, 4, 14, 101, 20),
(100, 4, 4, 14, 102, 30),
(101, 4, 4, 11, 103, 10),
(102, 4, 4, 11, 104, 5),
(103, 4, 4, 7, 105, 80),
(104, 4, 4, 11, 106, 6),
(105, 4, 4, 7, 107, 14),
(106, 4, 4, 7, 108, 15),
(107, 4, 4, 7, 109, 16),
(108, 4, 4, 7, 110, 17),
(109, 4, 4, 7, 111, 18),
(110, 4, 4, 7, 112, 19),
(111, 4, 4, 7, 113, 20),
(112, 4, 4, 7, 114, 110),
(113, 4, 4, 7, 115, 60),
(114, 4, 4, 14, 116, 50),
(115, 4, 4, 8, 117, 9),
(116, 4, 4, 8, 118, 10),
(117, 4, 4, 7, 119, 31),
(118, 4, 4, 7, 120, 21),
(119, 4, 4, 7, 121, 71),
(120, 4, 4, 8, 122, 11),
(121, 4, 4, 15, 123, 1),
(124, 4, 4, 9, 126, 10),
(125, 4, 4, 7, 127, 11),
(126, 4, 4, 7, 128, 111),
(127, 4, 4, 7, 129, 112),
(128, 4, 4, 7, 130, 113),
(129, 4, 4, 7, 131, 114),
(130, 4, 4, 7, 132, 40),
(131, 4, 4, 20, 133, 10),
(659, 4, 4, 10, 154, 3),
(667, 4, 4, 7, 155, 115),
(675, 4, 4, 7, 156, 116),
(683, 4, 4, 7, 157, 117);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `eav_entity_type`
--

DROP TABLE IF EXISTS `eav_entity_type`;
CREATE TABLE IF NOT EXISTS `eav_entity_type` (
  `entity_type_id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Entity Type Id',
  `entity_type_code` varchar(50) NOT NULL COMMENT 'Entity Type Code',
  `entity_model` varchar(255) NOT NULL COMMENT 'Entity Model',
  `attribute_model` varchar(255) DEFAULT NULL COMMENT 'Attribute Model',
  `entity_table` varchar(255) DEFAULT NULL COMMENT 'Entity Table',
  `value_table_prefix` varchar(255) DEFAULT NULL COMMENT 'Value Table Prefix',
  `entity_id_field` varchar(255) DEFAULT NULL COMMENT 'Entity Id Field',
  `is_data_sharing` smallint(5) UNSIGNED NOT NULL DEFAULT '1' COMMENT 'Defines Is Data Sharing',
  `data_sharing_key` varchar(100) DEFAULT 'default' COMMENT 'Data Sharing Key',
  `default_attribute_set_id` smallint(5) UNSIGNED NOT NULL DEFAULT '0' COMMENT 'Default Attribute Set Id',
  `increment_model` varchar(255) DEFAULT NULL COMMENT 'Increment Model',
  `increment_per_store` smallint(5) UNSIGNED NOT NULL DEFAULT '0' COMMENT 'Increment Per Store',
  `increment_pad_length` smallint(5) UNSIGNED NOT NULL DEFAULT '8' COMMENT 'Increment Pad Length',
  `increment_pad_char` varchar(1) NOT NULL DEFAULT '0' COMMENT 'Increment Pad Char',
  `additional_attribute_table` varchar(255) DEFAULT NULL COMMENT 'Additional Attribute Table',
  `entity_attribute_collection` varchar(255) DEFAULT NULL COMMENT 'Entity Attribute Collection',
  PRIMARY KEY (`entity_type_id`),
  KEY `EAV_ENTITY_TYPE_ENTITY_TYPE_CODE` (`entity_type_code`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COMMENT='Eav Entity Type';

--
-- Đang đổ dữ liệu cho bảng `eav_entity_type`
--

INSERT INTO `eav_entity_type` (`entity_type_id`, `entity_type_code`, `entity_model`, `attribute_model`, `entity_table`, `value_table_prefix`, `entity_id_field`, `is_data_sharing`, `data_sharing_key`, `default_attribute_set_id`, `increment_model`, `increment_per_store`, `increment_pad_length`, `increment_pad_char`, `additional_attribute_table`, `entity_attribute_collection`) VALUES
(1, 'customer', 'Magento\\Customer\\Model\\ResourceModel\\Customer', 'Magento\\Customer\\Model\\Attribute', 'customer_entity', NULL, NULL, 1, 'default', 1, 'Magento\\Eav\\Model\\Entity\\Increment\\NumericValue', 0, 8, '0', 'customer_eav_attribute', 'Magento\\Customer\\Model\\ResourceModel\\Attribute\\Collection'),
(2, 'customer_address', 'Magento\\Customer\\Model\\ResourceModel\\Address', 'Magento\\Customer\\Model\\Attribute', 'customer_address_entity', NULL, NULL, 1, 'default', 2, NULL, 0, 8, '0', 'customer_eav_attribute', 'Magento\\Customer\\Model\\ResourceModel\\Address\\Attribute\\Collection'),
(3, 'catalog_category', 'Magento\\Catalog\\Model\\ResourceModel\\Category', 'Magento\\Catalog\\Model\\ResourceModel\\Eav\\Attribute', 'catalog_category_entity', NULL, NULL, 1, 'default', 3, NULL, 0, 8, '0', 'catalog_eav_attribute', 'Magento\\Catalog\\Model\\ResourceModel\\Category\\Attribute\\Collection'),
(4, 'catalog_product', 'Magento\\Catalog\\Model\\ResourceModel\\Product', 'Magento\\Catalog\\Model\\ResourceModel\\Eav\\Attribute', 'catalog_product_entity', NULL, NULL, 1, 'default', 4, NULL, 0, 8, '0', 'catalog_eav_attribute', 'Magento\\Catalog\\Model\\ResourceModel\\Product\\Attribute\\Collection'),
(5, 'order', 'Magento\\Sales\\Model\\ResourceModel\\Order', NULL, 'sales_order', NULL, NULL, 1, 'default', 5, 'Magento\\Eav\\Model\\Entity\\Increment\\NumericValue', 1, 8, '0', NULL, NULL),
(6, 'invoice', 'Magento\\Sales\\Model\\ResourceModel\\Order', NULL, 'sales_invoice', NULL, NULL, 1, 'default', 6, 'Magento\\Eav\\Model\\Entity\\Increment\\NumericValue', 1, 8, '0', NULL, NULL),
(7, 'creditmemo', 'Magento\\Sales\\Model\\ResourceModel\\Order\\Creditmemo', NULL, 'sales_creditmemo', NULL, NULL, 1, 'default', 7, 'Magento\\Eav\\Model\\Entity\\Increment\\NumericValue', 1, 8, '0', NULL, NULL),
(8, 'shipment', 'Magento\\Sales\\Model\\ResourceModel\\Order\\Shipment', NULL, 'sales_shipment', NULL, NULL, 1, 'default', 8, 'Magento\\Eav\\Model\\Entity\\Increment\\NumericValue', 1, 8, '0', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `estore_article`
--

DROP TABLE IF EXISTS `estore_article`;
CREATE TABLE IF NOT EXISTS `estore_article` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) DEFAULT NULL,
  `name` text COLLATE utf8_unicode_ci NOT NULL,
  `sku` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `qty_available` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `estore_article`
--

INSERT INTO `estore_article` (`id`, `product_id`, `name`, `sku`, `qty_available`) VALUES
(1, 1, '{\"en\":\"Samsung note8\"}', '{\"en\":\"ss-n8\"}', 10),
(2, 0, '{\"en\":\"Samsung note8 korea\"}', '{\"en\":\"ss-n8k\"}', 10);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `estore_article_attribute_value`
--

DROP TABLE IF EXISTS `estore_article_attribute_value`;
CREATE TABLE IF NOT EXISTS `estore_article_attribute_value` (
  `article_id` int(11) NOT NULL,
  `set_id` int(11) NOT NULL,
  `attribute_id` int(11) NOT NULL,
  `value` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`article_id`,`attribute_id`,`set_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `estore_article_price`
--

DROP TABLE IF EXISTS `estore_article_price`;
CREATE TABLE IF NOT EXISTS `estore_article_price` (
  `article_id` int(11) NOT NULL,
  `currency_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `price` float NOT NULL,
  PRIMARY KEY (`article_id`,`currency_id`,`qty`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `estore_article_price`
--

INSERT INTO `estore_article_price` (`article_id`, `currency_id`, `qty`, `price`) VALUES
(1, 1, 10, 10);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `estore_currency`
--

DROP TABLE IF EXISTS `estore_currency`;
CREATE TABLE IF NOT EXISTS `estore_currency` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `is_base` tinyint(1) DEFAULT '0',
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `value` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `estore_currency`
--

INSERT INTO `estore_currency` (`id`, `is_base`, `name`, `value`) VALUES
(1, 1, '{\"en\":\"dolar\"}', 10),
(2, 0, '{\"en\":\"VNĐ\"}', 10);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `estore_group`
--

DROP TABLE IF EXISTS `estore_group`;
CREATE TABLE IF NOT EXISTS `estore_group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_group_id` int(11) DEFAULT '0',
  `cover_image_id` int(11) DEFAULT NULL,
  `images_list` text COLLATE utf8_unicode_ci,
  `name` text COLLATE utf8_unicode_ci NOT NULL,
  `teaser` text COLLATE utf8_unicode_ci,
  `text` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `estore_group`
--

INSERT INTO `estore_group` (`id`, `parent_group_id`, `cover_image_id`, `images_list`, `name`, `teaser`, `text`) VALUES
(1, 0, 0, '{\"en\":[]}', '{\"en\":\"Dien thoai\"}', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `estore_producer`
--

DROP TABLE IF EXISTS `estore_producer`;
CREATE TABLE IF NOT EXISTS `estore_producer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `estore_producer`
--

INSERT INTO `estore_producer` (`id`, `name`) VALUES
(1, '{\"en\":\"Apple\"}'),
(2, '{\"en\":\"Samsung\"}');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `estore_product`
--

DROP TABLE IF EXISTS `estore_product`;
CREATE TABLE IF NOT EXISTS `estore_product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text COLLATE utf8_unicode_ci NOT NULL,
  `producer_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `estore_product`
--

INSERT INTO `estore_product` (`id`, `name`, `producer_id`) VALUES
(1, '{\"en\":\"Samsung note 8\"}', 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `estore_product_group_ref`
--

DROP TABLE IF EXISTS `estore_product_group_ref`;
CREATE TABLE IF NOT EXISTS `estore_product_group_ref` (
  `group_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  PRIMARY KEY (`group_id`,`product_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `estore_product_group_ref`
--

INSERT INTO `estore_product_group_ref` (`group_id`, `product_id`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `estore_product_set_ref`
--

DROP TABLE IF EXISTS `estore_product_set_ref`;
CREATE TABLE IF NOT EXISTS `estore_product_set_ref` (
  `product_id` int(11) NOT NULL,
  `set_id` int(11) NOT NULL,
  PRIMARY KEY (`product_id`,`set_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `estore_product_set_ref`
--

INSERT INTO `estore_product_set_ref` (`product_id`, `set_id`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `estore_set`
--

DROP TABLE IF EXISTS `estore_set`;
CREATE TABLE IF NOT EXISTS `estore_set` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `estore_set`
--

INSERT INTO `estore_set` (`id`, `name`) VALUES
(1, '{\"en\":\"phone\"}');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `estore_set_attribute`
--

DROP TABLE IF EXISTS `estore_set_attribute`;
CREATE TABLE IF NOT EXISTS `estore_set_attribute` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` int(11) DEFAULT NULL,
  `input` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `values` text COLLATE utf8_unicode_ci,
  `is_i18n` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `estore_set_attribute`
--

INSERT INTO `estore_set_attribute` (`id`, `type`, `input`, `name`, `values`, `is_i18n`) VALUES
(1, 1, 'zaa-select', '{\"en\":\"CPU\"}', '{\"en\":\"Snapdragon 450\"}', 0),
(2, 1, 'zaa-select', '{\"en\":\"ram\"}', '{\"en\":\"4\"}', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `estore_set_attribute_ref`
--

DROP TABLE IF EXISTS `estore_set_attribute_ref`;
CREATE TABLE IF NOT EXISTS `estore_set_attribute_ref` (
  `set_id` int(11) NOT NULL,
  `attribute_id` int(11) NOT NULL,
  PRIMARY KEY (`set_id`,`attribute_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `estore_set_attribute_ref`
--

INSERT INTO `estore_set_attribute_ref` (`set_id`, `attribute_id`) VALUES
(1, 1),
(1, 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migration`
--

DROP TABLE IF EXISTS `migration`;
CREATE TABLE IF NOT EXISTS `migration` (
  `version` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1545280828),
('m141104_104622_admin_group', 1545280832),
('m141104_104631_admin_user_group', 1545280832),
('m141104_114809_admin_user', 1545280832),
('m141203_121042_admin_lang', 1545280832),
('m141203_143052_cms_cat', 1545280833),
('m141203_143059_cms_nav', 1545280833),
('m141203_143111_cms_nav_item', 1545280833),
('m141208_134038_cms_nav_item_page', 1545280833),
('m150106_095003_cms_layout', 1545280833),
('m150108_154017_cms_block', 1545280833),
('m150108_155009_cms_nav_item_page_block_item', 1545280833),
('m150122_125429_cms_nav_item_module', 1545280833),
('m150205_141350_block_group', 1545280833),
('m150304_152220_admin_storage_folder', 1545280833),
('m150304_152238_admin_storage_file', 1545280833),
('m150304_152244_admin_storage_filter', 1545280833),
('m150304_152250_admin_storage_effect', 1545280833),
('m150304_152256_admin_storage_image', 1545280833),
('m150309_142652_admin_storage_filter_chain', 1545280833),
('m150323_125407_admin_auth', 1545280833),
('m150323_132625_admin_group_auth', 1545280833),
('m150331_125022_admin_ngrest_log', 1545280833),
('m150615_094744_admin_user_login', 1545280833),
('m150617_200836_admin_user_online', 1545280833),
('m150626_084948_admin_search_data', 1545280833),
('m150915_081559_admin_config', 1545280833),
('m150924_112309_cms_nav_prop', 1545280833),
('m150924_120914_admin_prop', 1545280833),
('m151012_072207_cms_log', 1545280833),
('m151022_143429_cms_nav_item_redirect', 1545280833),
('m151026_161841_admin_tag', 1545280833),
('m160629_092417_cmspermissiontable', 1545280833),
('m160915_081618_create_admin_logger_table', 1545280833),
('m161219_150240_admin_lang_soft_delete', 1545280833),
('m161220_183300_lcp_base_tables', 1545280833),
('m170116_120553_cms_block_variation_field', 1545280833),
('m170131_104109_user_model_updates', 1545280833),
('m170218_215610_cms_nav_layout_file', 1545280833),
('m170301_084325_cms_config', 1545280833),
('m170619_103728_cms_blocksettings', 1545280833),
('m170926_144137_add_admin_user_session_id_column', 1545280833),
('m170926_164913_add_ngrest_log_diff_data', 1545280833),
('m171003_065811_add_class_column_to_block_group_table', 1545280833),
('m171009_083835_add_admin_user_login_destroy_info', 1545280833),
('m171121_170909_add_publish_at_date', 1545280833),
('m171129_104706_config_add_system_type', 1545280834),
('m171206_113949_cms_redirection_table', 1545280834),
('m180214_134657_system_user_ngrest_deletion', 1545280834),
('m180326_170839_file_disposition', 1545280834),
('m180412_092824_user_security_columns_v12', 1545280834),
('m180527_225613_user_login_ipv6', 1545280834),
('m180619_134519_indexes', 1545280834),
('m180723_120432_indexes', 1545280835),
('m180723_123237_indexes', 1545280835),
('m181113_120432_user_index', 1545280835),
('m170515_115236_basetables', 1545444370),
('m150204_144806_news_article', 1545448681),
('m150428_095829_news_cat', 1545448681),
('m161212_084323_add_teaser_field', 1545448681),
('m171222_121554_portfolio_migrate', 1545465321);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `news_article`
--

DROP TABLE IF EXISTS `news_article`;
CREATE TABLE IF NOT EXISTS `news_article` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` text COLLATE utf8_unicode_ci,
  `text` text COLLATE utf8_unicode_ci,
  `cat_id` int(11) DEFAULT '0',
  `image_id` int(11) DEFAULT '0',
  `image_list` text COLLATE utf8_unicode_ci,
  `file_list` text COLLATE utf8_unicode_ci,
  `create_user_id` int(11) DEFAULT '0',
  `update_user_id` int(11) DEFAULT '0',
  `timestamp_create` int(11) DEFAULT '0',
  `timestamp_update` int(11) DEFAULT '0',
  `timestamp_display_from` int(11) DEFAULT '0',
  `timestamp_display_until` int(11) DEFAULT '0',
  `is_deleted` tinyint(1) DEFAULT '0',
  `is_display_limit` tinyint(1) DEFAULT '0',
  `teaser_text` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `news_article`
--

INSERT INTO `news_article` (`id`, `title`, `text`, `cat_id`, `image_id`, `image_list`, `file_list`, `create_user_id`, `update_user_id`, `timestamp_create`, `timestamp_update`, `timestamp_display_from`, `timestamp_display_until`, `is_deleted`, `is_display_limit`, `teaser_text`) VALUES
(1, '{\"en\":\"1212\"}', '{\"en\":\"2121212\"}', 0, 0, '{\"en\":[]}', '[]', 1, 1, 1545448730, 1545448730, 1545448730, NULL, 0, 0, '{\"en\":\"2121\"}');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `news_cat`
--

DROP TABLE IF EXISTS `news_cat`;
CREATE TABLE IF NOT EXISTS `news_cat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `news_cat`
--

INSERT INTO `news_cat` (`id`, `title`) VALUES
(1, '{\"en\":\"ABC\"}');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `portfolio_group`
--

DROP TABLE IF EXISTS `portfolio_group`;
CREATE TABLE IF NOT EXISTS `portfolio_group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `group_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT '0',
  `priority` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `portfolio_item`
--

DROP TABLE IF EXISTS `portfolio_item`;
CREATE TABLE IF NOT EXISTS `portfolio_item` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `group_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `color` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `link` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `img_max_id` int(11) DEFAULT NULL,
  `img_min_id` int(11) DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT '0',
  `priority` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `store`
--

DROP TABLE IF EXISTS `store`;
CREATE TABLE IF NOT EXISTS `store` (
  `store_id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Store Id',
  `code` varchar(32) DEFAULT NULL COMMENT 'Code',
  `website_id` smallint(5) UNSIGNED NOT NULL DEFAULT '0' COMMENT 'Website Id',
  `group_id` smallint(5) UNSIGNED NOT NULL DEFAULT '0' COMMENT 'Group Id',
  `name` varchar(255) NOT NULL COMMENT 'Store Name',
  `sort_order` smallint(5) UNSIGNED NOT NULL DEFAULT '0' COMMENT 'Store Sort Order',
  `is_active` smallint(5) UNSIGNED NOT NULL DEFAULT '0' COMMENT 'Store Activity',
  PRIMARY KEY (`store_id`),
  UNIQUE KEY `STORE_CODE` (`code`),
  KEY `STORE_WEBSITE_ID` (`website_id`),
  KEY `STORE_IS_ACTIVE_SORT_ORDER` (`is_active`,`sort_order`),
  KEY `STORE_GROUP_ID` (`group_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='Stores';

--
-- Đang đổ dữ liệu cho bảng `store`
--

INSERT INTO `store` (`store_id`, `code`, `website_id`, `group_id`, `name`, `sort_order`, `is_active`) VALUES
(1, 'default', 0, 0, 'default', 0, 1);

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `catalog_product_entity`
--
ALTER TABLE `catalog_product_entity`
  ADD CONSTRAINT `CAT_PRD_ENTT_ATTR_SET_ID_EAV_ATTR_SET_ATTR_SET_ID` FOREIGN KEY (`attribute_set_id`) REFERENCES `eav_attribute_set` (`attribute_set_id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `catalog_product_entity_datetime`
--
ALTER TABLE `catalog_product_entity_datetime`
  ADD CONSTRAINT `CATALOG_PRODUCT_ENTITY_DATETIME_STORE_ID_STORE_STORE_ID` FOREIGN KEY (`store_id`) REFERENCES `wallcatalog`.`store` (`store_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `CAT_PRD_ENTT_DTIME_ATTR_ID_EAV_ATTR_ATTR_ID` FOREIGN KEY (`attribute_id`) REFERENCES `wallcatalog`.`eav_attribute` (`attribute_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `CAT_PRD_ENTT_DTIME_ENTT_ID_CAT_PRD_ENTT_ENTT_ID` FOREIGN KEY (`entity_id`) REFERENCES `wallcatalog`.`catalog_product_entity` (`entity_id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `catalog_product_entity_decimal`
--
ALTER TABLE `catalog_product_entity_decimal`
  ADD CONSTRAINT `CATALOG_PRODUCT_ENTITY_DECIMAL_STORE_ID_STORE_STORE_ID` FOREIGN KEY (`store_id`) REFERENCES `wallcatalog`.`store` (`store_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `CAT_PRD_ENTT_DEC_ATTR_ID_EAV_ATTR_ATTR_ID` FOREIGN KEY (`attribute_id`) REFERENCES `wallcatalog`.`eav_attribute` (`attribute_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `CAT_PRD_ENTT_DEC_ENTT_ID_CAT_PRD_ENTT_ENTT_ID` FOREIGN KEY (`entity_id`) REFERENCES `wallcatalog`.`catalog_product_entity` (`entity_id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `catalog_product_entity_int`
--
ALTER TABLE `catalog_product_entity_int`
  ADD CONSTRAINT `CATALOG_PRODUCT_ENTITY_INT_STORE_ID_STORE_STORE_ID` FOREIGN KEY (`store_id`) REFERENCES `wallcatalog`.`store` (`store_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `CAT_PRD_ENTT_INT_ATTR_ID_EAV_ATTR_ATTR_ID` FOREIGN KEY (`attribute_id`) REFERENCES `wallcatalog`.`eav_attribute` (`attribute_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `CAT_PRD_ENTT_INT_ENTT_ID_CAT_PRD_ENTT_ENTT_ID` FOREIGN KEY (`entity_id`) REFERENCES `wallcatalog`.`catalog_product_entity` (`entity_id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `catalog_product_entity_text`
--
ALTER TABLE `catalog_product_entity_text`
  ADD CONSTRAINT `CATALOG_PRODUCT_ENTITY_TEXT_STORE_ID_STORE_STORE_ID` FOREIGN KEY (`store_id`) REFERENCES `store` (`store_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `CAT_PRD_ENTT_TEXT_ATTR_ID_EAV_ATTR_ATTR_ID` FOREIGN KEY (`attribute_id`) REFERENCES `eav_attribute` (`attribute_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `CAT_PRD_ENTT_TEXT_ENTT_ID_CAT_PRD_ENTT_ENTT_ID` FOREIGN KEY (`entity_id`) REFERENCES `catalog_product_entity` (`entity_id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `catalog_product_entity_varchar`
--
ALTER TABLE `catalog_product_entity_varchar`
  ADD CONSTRAINT `CATALOG_PRODUCT_ENTITY_VARCHAR_STORE_ID_STORE_STORE_ID` FOREIGN KEY (`store_id`) REFERENCES `wallcatalog`.`store` (`store_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `CAT_PRD_ENTT_VCHR_ATTR_ID_EAV_ATTR_ATTR_ID` FOREIGN KEY (`attribute_id`) REFERENCES `wallcatalog`.`eav_attribute` (`attribute_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `CAT_PRD_ENTT_VCHR_ENTT_ID_CAT_PRD_ENTT_ENTT_ID` FOREIGN KEY (`entity_id`) REFERENCES `wallcatalog`.`catalog_product_entity` (`entity_id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `eav_attribute_group`
--
ALTER TABLE `eav_attribute_group`
  ADD CONSTRAINT `EAV_ATTR_GROUP_ATTR_SET_ID_EAV_ATTR_SET_ATTR_SET_ID` FOREIGN KEY (`attribute_set_id`) REFERENCES `wallcatalog`.`eav_attribute_set` (`attribute_set_id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `eav_attribute_label`
--
ALTER TABLE `eav_attribute_label`
  ADD CONSTRAINT `EAV_ATTRIBUTE_LABEL_ATTRIBUTE_ID_EAV_ATTRIBUTE_ATTRIBUTE_ID` FOREIGN KEY (`attribute_id`) REFERENCES `eav_attribute` (`attribute_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `EAV_ATTRIBUTE_LABEL_STORE_ID_STORE_STORE_ID` FOREIGN KEY (`store_id`) REFERENCES `store` (`store_id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `eav_attribute_option`
--
ALTER TABLE `eav_attribute_option`
  ADD CONSTRAINT `EAV_ATTRIBUTE_OPTION_ATTRIBUTE_ID_EAV_ATTRIBUTE_ATTRIBUTE_ID` FOREIGN KEY (`attribute_id`) REFERENCES `wallcatalog`.`eav_attribute` (`attribute_id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `eav_attribute_option_value`
--
ALTER TABLE `eav_attribute_option_value`
  ADD CONSTRAINT `EAV_ATTRIBUTE_OPTION_VALUE_STORE_ID_STORE_STORE_ID` FOREIGN KEY (`store_id`) REFERENCES `wallcatalog`.`store` (`store_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `EAV_ATTR_OPT_VAL_OPT_ID_EAV_ATTR_OPT_OPT_ID` FOREIGN KEY (`option_id`) REFERENCES `wallcatalog`.`eav_attribute_option` (`option_id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `eav_entity_attribute`
--
ALTER TABLE `eav_entity_attribute`
  ADD CONSTRAINT `EAV_ENTITY_ATTRIBUTE_ATTRIBUTE_ID_EAV_ATTRIBUTE_ATTRIBUTE_ID` FOREIGN KEY (`attribute_id`) REFERENCES `wallcatalog`.`eav_attribute` (`attribute_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `EAV_ENTT_ATTR_ATTR_GROUP_ID_EAV_ATTR_GROUP_ATTR_GROUP_ID` FOREIGN KEY (`attribute_group_id`) REFERENCES `wallcatalog`.`eav_attribute_group` (`attribute_group_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
