-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 25, 2020 at 03:11 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aindo_berca`
--

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE `ci_sessions` (
  `id` varchar(128) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `data` blob NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ci_sessions`
--

INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES
('c813a703f144158238a3c60166f90af47db9d76a', '::1', 1601039437, 0x5f5f63695f6c6173745f726567656e65726174657c693a313630313033393433373b),
('ef4aa161133f4c4c467e590574b673cc1988af3c', '::1', 1601038040, 0x5f5f63695f6c6173745f726567656e65726174657c693a313630313033383034303b61696e646f5f62657263617c613a373a7b733a323a226964223b733a313a2231223b733a383a22757365726e616d65223b733a353a2261646d696e223b733a343a22726f6c65223b733a313a2231223b733a393a22726f6c655f6e616d65223b733a31393a2253757065722041646d696e6973747261746f72223b733a31353a22726f6c655f6964656e746966696572223b733a31303a22737570657261646d696e223b733a383a226c6f636174696f6e223b733a313a2231223b733a393a2276616c696461746564223b623a313b7d61696e646f5f62657263615f6c6f636174696f6e7c613a363a7b733a323a226964223b733a313a2231223b733a343a22636f6465223b733a31333a224c4f4330303030303030303031223b733a343a226e616d65223b733a31303a224c6f636174696f6e2031223b733a373a2261646472657373223b733a32323a22416464726573732031612c2041646472657373203162223b733a353a2270686f6e65223b733a31383a2250686f6e652031612c2050686f6e65203162223b733a31343a226c6f636174696f6e5f67726f7570223b733a313a2230223b7d62616e6e65645f70616765737c613a303a7b7d),
('c6cc0854b1aacfe5b8b40048fee29d74f672b735', '::1', 1601027367, 0x5f5f63695f6c6173745f726567656e65726174657c693a313630313032363736353b61696e646f5f62657263617c613a373a7b733a323a226964223b733a313a2231223b733a383a22757365726e616d65223b733a353a2261646d696e223b733a343a22726f6c65223b733a313a2231223b733a393a22726f6c655f6e616d65223b733a31393a2253757065722041646d696e6973747261746f72223b733a31353a22726f6c655f6964656e746966696572223b733a31303a22737570657261646d696e223b733a383a226c6f636174696f6e223b733a313a2231223b733a393a2276616c696461746564223b623a313b7d61696e646f5f62657263615f6c6f636174696f6e7c613a363a7b733a323a226964223b733a313a2231223b733a343a22636f6465223b733a31333a224c4f4330303030303030303031223b733a343a226e616d65223b733a31303a224c6f636174696f6e2031223b733a373a2261646472657373223b733a32323a22416464726573732031612c2041646472657373203162223b733a353a2270686f6e65223b733a31383a2250686f6e652031612c2050686f6e65203162223b733a31343a226c6f636174696f6e5f67726f7570223b733a313a2230223b7d62616e6e65645f70616765737c613a303a7b7d73657373696f6e5f70726f647563745f6f75747c613a353a7b733a373a2270726f64756374223b733a313a2231223b733a343a2264617465223b733a31303a22323032302d30392d3239223b733a393a22666173745f636f6465223b733a383a224643313233343578223b733a31383a2273616c65735f6f726465725f6e756d626572223b733a383a22534f313233343578223b733a31333a2270726f647563745f6974656d73223b613a323a7b693a303b613a363a7b733a323a226964223b693a303b733a353a2264625f6964223b733a313a2231223b733a31323a2270726f647563745f6974656d223b733a313a2231223b733a31343a2277617265686f7573655f6e616d65223b733a31323a2257617265686f757365203031223b733a31333a2273657269616c5f6e756d626572223b733a373a2231323334353031223b733a32343a2277617272616e74795f65787069726174696f6e5f64617465223b733a31303a2232342d30392d32303230223b7d693a313b613a363a7b733a323a226964223b693a313b733a353a2264625f6964223b733a313a2233223b733a31323a2270726f647563745f6974656d223b733a313a2233223b733a31343a2277617265686f7573655f6e616d65223b733a31323a2257617265686f757365203031223b733a31333a2273657269616c5f6e756d626572223b733a373a2231323334363033223b733a32343a2277617272616e74795f65787069726174696f6e5f64617465223b733a31303a2232352d30392d32303230223b7d7d7d),
('abf8889d52c1b641ad83446c58f4689a8860570a', '::1', 1601026765, 0x5f5f63695f6c6173745f726567656e65726174657c693a313630313032363736353b61696e646f5f62657263617c613a373a7b733a323a226964223b733a313a2231223b733a383a22757365726e616d65223b733a353a2261646d696e223b733a343a22726f6c65223b733a313a2231223b733a393a22726f6c655f6e616d65223b733a31393a2253757065722041646d696e6973747261746f72223b733a31353a22726f6c655f6964656e746966696572223b733a31303a22737570657261646d696e223b733a383a226c6f636174696f6e223b733a313a2231223b733a393a2276616c696461746564223b623a313b7d61696e646f5f62657263615f6c6f636174696f6e7c613a363a7b733a323a226964223b733a313a2231223b733a343a22636f6465223b733a31333a224c4f4330303030303030303031223b733a343a226e616d65223b733a31303a224c6f636174696f6e2031223b733a373a2261646472657373223b733a32323a22416464726573732031612c2041646472657373203162223b733a353a2270686f6e65223b733a31383a2250686f6e652031612c2050686f6e65203162223b733a31343a226c6f636174696f6e5f67726f7570223b733a313a2230223b7d62616e6e65645f70616765737c613a303a7b7d6d6573736167657c733a36393a2250726f647563742d4f7574202750444f3030303030303031272074656c616820626572686173696c20646974616d6261686b616e21205b434f444520533030302d3030315d223b5f5f63695f766172737c613a323a7b733a373a226d657373616765223b733a333a226f6c64223b733a31323a226e6f74696669636174696f6e223b733a333a226f6c64223b7d6e6f74696669636174696f6e7c733a373a2273756363657373223b),
('b6dfca9d671d7e2cfef8ef426ef5e8b2d5f08ad0', '::1', 1601007765, 0x5f5f63695f6c6173745f726567656e65726174657c693a313630313030373736353b61696e646f5f62657263617c613a373a7b733a323a226964223b733a313a2231223b733a383a22757365726e616d65223b733a353a2261646d696e223b733a343a22726f6c65223b733a313a2231223b733a393a22726f6c655f6e616d65223b733a31393a2253757065722041646d696e6973747261746f72223b733a31353a22726f6c655f6964656e746966696572223b733a31303a22737570657261646d696e223b733a383a226c6f636174696f6e223b733a313a2231223b733a393a2276616c696461746564223b623a313b7d61696e646f5f62657263615f6c6f636174696f6e7c613a363a7b733a323a226964223b733a313a2231223b733a343a22636f6465223b733a31333a224c4f4330303030303030303031223b733a343a226e616d65223b733a31303a224c6f636174696f6e2031223b733a373a2261646472657373223b733a32323a22416464726573732031612c2041646472657373203162223b733a353a2270686f6e65223b733a31383a2250686f6e652031612c2050686f6e65203162223b733a31343a226c6f636174696f6e5f67726f7570223b733a313a2230223b7d62616e6e65645f70616765737c613a303a7b7d6d6573736167657c4e3b6e6f74696669636174696f6e7c4e3b73657373696f6e5f70726f647563745f6f75747c613a333a7b733a31333a2270726f647563745f6974656d73223b613a303a7b7d733a31363a2264656c657465645f64625f6974656d73223b613a303a7b7d733a373a2270726f64756374223b733a313a2231223b7d),
('e0a943f96aa04f8910fe28df9e2b708273e308af', '::1', 1601009392, 0x5f5f63695f6c6173745f726567656e65726174657c693a313630313030373736353b61696e646f5f62657263617c613a373a7b733a323a226964223b733a313a2231223b733a383a22757365726e616d65223b733a353a2261646d696e223b733a343a22726f6c65223b733a313a2231223b733a393a22726f6c655f6e616d65223b733a31393a2253757065722041646d696e6973747261746f72223b733a31353a22726f6c655f6964656e746966696572223b733a31303a22737570657261646d696e223b733a383a226c6f636174696f6e223b733a313a2231223b733a393a2276616c696461746564223b623a313b7d61696e646f5f62657263615f6c6f636174696f6e7c613a363a7b733a323a226964223b733a313a2231223b733a343a22636f6465223b733a31333a224c4f4330303030303030303031223b733a343a226e616d65223b733a31303a224c6f636174696f6e2031223b733a373a2261646472657373223b733a32323a22416464726573732031612c2041646472657373203162223b733a353a2270686f6e65223b733a31383a2250686f6e652031612c2050686f6e65203162223b733a31343a226c6f636174696f6e5f67726f7570223b733a313a2230223b7d62616e6e65645f70616765737c613a303a7b7d6d6573736167657c4e3b6e6f74696669636174696f6e7c4e3b73657373696f6e5f70726f647563745f6f75747c613a333a7b733a373a2270726f64756374223b733a313a2231223b733a31333a2270726f647563745f6974656d73223b613a323a7b693a303b613a353a7b733a323a226964223b733a313a2231223b733a31333a2273657269616c5f6e756d626572223b733a373a2231323334353031223b733a31343a2277617265686f7573655f6e616d65223b733a31323a2257617265686f757365203031223b733a32343a2277617272616e74795f65787069726174696f6e5f64617465223b733a31303a22323032302d30392d3234223b733a31323a2270726f647563745f6974656d223b733a313a2231223b7d693a313b613a353a7b733a323a226964223b733a313a2232223b733a31333a2273657269616c5f6e756d626572223b733a373a2231323334353032223b733a31343a2277617265686f7573655f6e616d65223b733a31323a2257617265686f757365203032223b733a32343a2277617272616e74795f65787069726174696f6e5f64617465223b733a31303a22323032302d30392d3235223b733a31323a2270726f647563745f6974656d223b733a313a2232223b7d7d733a31363a2264656c657465645f64625f6974656d73223b613a303a7b7d7d),
('87ae5501a889a191b95d8889488f1640aa998735', '::1', 1601024005, 0x5f5f63695f6c6173745f726567656e65726174657c693a313630313032343030353b61696e646f5f62657263617c613a373a7b733a323a226964223b733a313a2231223b733a383a22757365726e616d65223b733a353a2261646d696e223b733a343a22726f6c65223b733a313a2231223b733a393a22726f6c655f6e616d65223b733a31393a2253757065722041646d696e6973747261746f72223b733a31353a22726f6c655f6964656e746966696572223b733a31303a22737570657261646d696e223b733a383a226c6f636174696f6e223b733a313a2231223b733a393a2276616c696461746564223b623a313b7d61696e646f5f62657263615f6c6f636174696f6e7c613a363a7b733a323a226964223b733a313a2231223b733a343a22636f6465223b733a31333a224c4f4330303030303030303031223b733a343a226e616d65223b733a31303a224c6f636174696f6e2031223b733a373a2261646472657373223b733a32323a22416464726573732031612c2041646472657373203162223b733a353a2270686f6e65223b733a31383a2250686f6e652031612c2050686f6e65203162223b733a31343a226c6f636174696f6e5f67726f7570223b733a313a2230223b7d62616e6e65645f70616765737c613a303a7b7d73657373696f6e5f70726f647563745f6f75747c613a353a7b733a373a2270726f64756374223b733a313a2231223b733a343a2264617465223b733a31303a2233302d30392d32303230223b733a393a22666173745f636f6465223b733a373a2246433132333435223b733a31383a2273616c65735f6f726465725f6e756d626572223b733a373a22534f3132333435223b733a31333a2270726f647563745f6974656d73223b613a323a7b693a303b613a363a7b733a323a226964223b733a313a2231223b733a31333a2273657269616c5f6e756d626572223b733a373a2231323334353031223b733a393a2277617265686f757365223b733a313a2231223b733a31343a2277617265686f7573655f6e616d65223b733a31323a2257617265686f757365203031223b733a32343a2277617272616e74795f65787069726174696f6e5f64617465223b733a31303a22323032302d30392d3234223b733a31323a2270726f647563745f6974656d223b733a313a2231223b7d693a313b613a363a7b733a323a226964223b733a313a2233223b733a31333a2273657269616c5f6e756d626572223b733a373a2231323334363033223b733a393a2277617265686f757365223b733a313a2231223b733a31343a2277617265686f7573655f6e616d65223b733a31323a2257617265686f757365203031223b733a32343a2277617272616e74795f65787069726174696f6e5f64617465223b733a31303a22323032302d30392d3235223b733a31323a2270726f647563745f6974656d223b733a313a2233223b7d7d7d);

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `id` int(20) NOT NULL,
  `time` datetime NOT NULL,
  `username` varchar(20) NOT NULL,
  `activity` text NOT NULL,
  `system_log_id` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `m_products`
--

CREATE TABLE `m_products` (
  `id` int(11) NOT NULL,
  `location` int(11) NOT NULL DEFAULT 1,
  `name` varchar(50) NOT NULL DEFAULT '',
  `product_number` varchar(20) NOT NULL DEFAULT '',
  `quantity` int(11) NOT NULL DEFAULT 0,
  `notes` varchar(255) NOT NULL DEFAULT '',
  `deleted` tinyint(1) NOT NULL DEFAULT 0,
  `deleted_by` varchar(20) NOT NULL DEFAULT 'system',
  `deleted_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` varchar(20) NOT NULL DEFAULT 'system',
  `created_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified_by` varchar(20) NOT NULL DEFAULT 'system',
  `modified_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `m_products`
--

INSERT INTO `m_products` (`id`, `location`, `name`, `product_number`, `quantity`, `notes`, `deleted`, `deleted_by`, `deleted_date`, `created_by`, `created_date`, `modified_by`, `modified_date`) VALUES
(1, 1, 'Product 01', 'P0001', 0, 'no notes', 0, 'system', '0000-00-00 00:00:00', 'admin', '2020-09-24 10:35:09', 'admin', '2020-09-25 20:03:57'),
(2, 1, 'Product 02', 'P0002', 0, 'no notes', 0, 'system', '0000-00-00 00:00:00', 'admin', '2020-09-24 10:35:41', 'admin', '2020-09-24 18:57:09'),
(3, 1, 'Product 03', 'P0003', 0, 'no notes', 0, 'system', '0000-00-00 00:00:00', 'admin', '2020-09-24 10:35:49', 'admin', '2020-09-24 18:57:09');

-- --------------------------------------------------------

--
-- Table structure for table `m_warehouses`
--

CREATE TABLE `m_warehouses` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL DEFAULT '',
  `location` int(11) NOT NULL DEFAULT 1,
  `deleted` tinyint(1) NOT NULL DEFAULT 0,
  `deleted_by` varchar(20) NOT NULL DEFAULT 'system',
  `deleted_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` varchar(20) NOT NULL DEFAULT 'system',
  `created_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified_by` varchar(20) NOT NULL DEFAULT 'system',
  `modified_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `m_warehouses`
--

INSERT INTO `m_warehouses` (`id`, `name`, `location`, `deleted`, `deleted_by`, `deleted_date`, `created_by`, `created_date`, `modified_by`, `modified_date`) VALUES
(1, 'Warehouse 01', 1, 0, 'system', '0000-00-00 00:00:00', 'admin', '2020-09-24 10:27:23', 'admin', '2020-09-24 10:27:23'),
(2, 'Warehouse 02', 1, 0, 'system', '0000-00-00 00:00:00', 'admin', '2020-09-24 10:27:27', 'admin', '2020-09-24 10:27:27'),
(3, 'Warehouse 03', 1, 0, 'system', '0000-00-00 00:00:00', 'admin', '2020-09-24 10:27:32', 'admin', '2020-09-24 10:27:32');

-- --------------------------------------------------------

--
-- Table structure for table `system_logs`
--

CREATE TABLE `system_logs` (
  `id` int(20) NOT NULL,
  `time` datetime NOT NULL,
  `username` varchar(20) NOT NULL,
  `activity` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `s_field_requirements`
--

CREATE TABLE `s_field_requirements` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `module` varchar(30) NOT NULL,
  `required` tinyint(1) NOT NULL DEFAULT 0,
  `min_length` int(5) NOT NULL,
  `max_length` int(5) NOT NULL,
  `superedit` tinyint(1) NOT NULL,
  `type` tinyint(1) NOT NULL COMMENT '1:field, 2:combobox, 3:textarea, 4:image, 5:radio, 6:checkbox',
  `deleted` tinyint(1) NOT NULL DEFAULT 0,
  `deleted_date` datetime NOT NULL,
  `created_by` varchar(20) NOT NULL,
  `created_date` datetime NOT NULL,
  `modified_by` varchar(20) NOT NULL,
  `modified_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `s_locations`
--

CREATE TABLE `s_locations` (
  `id` int(11) NOT NULL,
  `location_group` tinyint(2) NOT NULL,
  `code` varchar(20) NOT NULL,
  `name` varchar(100) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `notes` text NOT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT 0,
  `deleted_by` varchar(50) NOT NULL,
  `deleted_date` datetime NOT NULL,
  `created_by` varchar(20) NOT NULL,
  `created_date` datetime NOT NULL,
  `modified_by` varchar(20) NOT NULL,
  `modified_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `s_locations`
--

INSERT INTO `s_locations` (`id`, `location_group`, `code`, `name`, `address`, `phone`, `notes`, `deleted`, `deleted_by`, `deleted_date`, `created_by`, `created_date`, `modified_by`, `modified_date`) VALUES
(0, 0, 'LOC0000000000', 'Location Global', 'Address, Address', 'Phone, Phone', 'no notes', 0, '', '0000-00-00 00:00:00', 'admin', '2017-01-01 00:00:00', 'admin', '2017-01-01 00:00:00'),
(1, 0, 'LOC0000000001', 'Location 1', 'Address 1a, Address 1b', 'Phone 1a, Phone 1b', 'no notes', 0, '', '0000-00-00 00:00:00', 'admin', '2017-01-01 00:00:00', 'admin', '2017-01-01 00:00:00'),
(2, 0, 'LOC0000000001', 'Location 2', 'Address 2a, Address 2b', 'Phone 2a, Phone 2b', 'no notes', 0, '', '0000-00-00 00:00:00', 'admin', '2017-01-01 00:00:00', 'admin', '2017-01-01 00:00:00'),
(3, 0, 'LOC0000000001', 'Location 3', 'Address 3a, Address 3b', 'Phone 3a, Phone 3b', 'no notes', 0, '', '0000-00-00 00:00:00', 'admin', '2017-01-01 00:00:00', 'admin', '2017-01-01 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `s_permissions`
--

CREATE TABLE `s_permissions` (
  `id` int(11) NOT NULL,
  `banned_page_name` varchar(50) NOT NULL,
  `superadmin` tinyint(1) NOT NULL DEFAULT 0,
  `supervisor` tinyint(1) NOT NULL DEFAULT 0,
  `employee` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `s_permissions`
--

INSERT INTO `s_permissions` (`id`, `banned_page_name`, `superadmin`, `supervisor`, `employee`) VALUES
(1, 'manage_user', 0, 0, 0),
(2, 'add_user', 0, 0, 0),
(3, 'superedit_user', 0, 0, 0),
(4, 'edit_user', 0, 0, 0),
(5, 'delete_user', 0, 0, 0),
(6, 'view_user', 0, 0, 0),
(7, 'manage_backup_restore', 0, 0, 0),
(8, 'manage_log', 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `s_roles`
--

CREATE TABLE `s_roles` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `identifier` varchar(20) NOT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT 0,
  `deleted_by` varchar(20) NOT NULL,
  `deleted_date` datetime NOT NULL,
  `created_by` varchar(20) NOT NULL,
  `created_date` datetime NOT NULL,
  `modified_by` varchar(20) NOT NULL,
  `modified_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `s_roles`
--

INSERT INTO `s_roles` (`id`, `name`, `identifier`, `deleted`, `deleted_by`, `deleted_date`, `created_by`, `created_date`, `modified_by`, `modified_date`) VALUES
(1, 'Super Administrator', 'superadmin', 0, '', '0000-00-00 00:00:00', 'system', '2014-01-01 00:00:00', 'system', '2014-01-01 00:00:00'),
(2, 'Supervisor', 'supervisor', 0, '', '0000-00-00 00:00:00', 'system', '2014-01-01 00:00:00', 'admin', '2014-01-01 00:00:00'),
(3, 'Employee', 'employee', 0, '', '0000-00-00 00:00:00', 'system', '2014-01-01 00:00:00', 'admin', '2014-01-01 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `s_settings`
--

CREATE TABLE `s_settings` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `value` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `s_settings`
--

INSERT INTO `s_settings` (`id`, `name`, `value`) VALUES
(1, 'maintenance_mode', '0');

-- --------------------------------------------------------

--
-- Table structure for table `s_users`
--

CREATE TABLE `s_users` (
  `id` int(11) NOT NULL,
  `location` int(11) NOT NULL DEFAULT 1,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` int(11) NOT NULL DEFAULT 0,
  `last_login_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `status` varchar(20) NOT NULL DEFAULT 'status_pending' COMMENT 'status_pending, status_active, status_inactive',
  `deleted` tinyint(1) NOT NULL DEFAULT 0,
  `deleted_by` varchar(20) NOT NULL DEFAULT 'system',
  `deleted_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` varchar(20) NOT NULL DEFAULT 'system',
  `created_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified_by` varchar(20) NOT NULL DEFAULT 'system',
  `modified_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `s_users`
--

INSERT INTO `s_users` (`id`, `location`, `username`, `password`, `role`, `last_login_date`, `status`, `deleted`, `deleted_by`, `deleted_date`, `created_by`, `created_date`, `modified_by`, `modified_date`) VALUES
(1, 1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 1, '2020-09-25 19:17:21', 'status_active', 0, '', '0000-00-00 00:00:00', 'system', '2017-01-01 00:00:00', 'admin', '2020-09-25 19:17:21'),
(2, 1, 'supervisor', '21232f297a57a5a743894a0e4a801fc3', 2, '0000-00-00 00:00:00', 'status_active', 0, '', '0000-00-00 00:00:00', 'system', '2017-01-01 00:00:00', 'system', '2017-01-01 00:00:00'),
(3, 1, 'employee', '21232f297a57a5a743894a0e4a801fc3', 3, '0000-00-00 00:00:00', 'status_active', 0, '', '0000-00-00 00:00:00', 'system', '2017-01-01 00:00:00', 'system', '2017-01-01 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `s_user_details`
--

CREATE TABLE `s_user_details` (
  `id` int(11) NOT NULL,
  `location` int(11) NOT NULL DEFAULT 1,
  `code` varchar(50) NOT NULL,
  `user` int(11) NOT NULL DEFAULT 0,
  `name` varchar(50) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `notes` text NOT NULL,
  `birthdate` date NOT NULL,
  `photo` varchar(20) NOT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT 0,
  `deleted_by` varchar(20) NOT NULL,
  `deleted_date` datetime NOT NULL,
  `created_by` varchar(20) NOT NULL,
  `created_date` datetime NOT NULL,
  `modified_by` varchar(20) NOT NULL,
  `modified_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `s_user_details`
--

INSERT INTO `s_user_details` (`id`, `location`, `code`, `user`, `name`, `address`, `phone`, `email`, `notes`, `birthdate`, `photo`, `deleted`, `deleted_by`, `deleted_date`, `created_by`, `created_date`, `modified_by`, `modified_date`) VALUES
(1, 1, '', 1, 'Mr. Administrator', '', '', '', '', '0000-00-00', '', 0, '', '0000-00-00 00:00:00', 'system', '2017-01-01 00:00:00', 'system', '2017-01-01 00:00:00'),
(2, 1, '', 2, 'Mr . Supervisor', '', '', '', '', '0000-00-00', '', 0, '', '0000-00-00 00:00:00', 'system', '2017-01-01 00:00:00', 'system', '2017-01-01 00:00:00'),
(3, 1, '', 3, 'Mr. Employee', '', '', '', '', '0000-00-00', '', 0, '', '0000-00-00 00:00:00', 'system', '2017-01-01 00:00:00', 'system', '2017-01-01 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `t_product_ins`
--

CREATE TABLE `t_product_ins` (
  `id` int(11) NOT NULL,
  `location` int(11) NOT NULL DEFAULT 1,
  `product` int(11) NOT NULL DEFAULT 0,
  `code` varchar(20) NOT NULL,
  `date` date NOT NULL DEFAULT '0000-00-00',
  `fast_code` varchar(50) NOT NULL DEFAULT '',
  `purchase_order_number` varchar(50) NOT NULL DEFAULT '',
  `quantity` int(11) NOT NULL DEFAULT 0,
  `locked` tinyint(1) NOT NULL DEFAULT 0,
  `status` varchar(20) NOT NULL DEFAULT 'status_open',
  `deleted` tinyint(1) NOT NULL DEFAULT 0,
  `deleted_by` varchar(20) NOT NULL DEFAULT 'system',
  `deleted_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` varchar(20) NOT NULL DEFAULT 'system',
  `created_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified_by` varchar(20) NOT NULL DEFAULT 'system',
  `modified_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `t_product_items`
--

CREATE TABLE `t_product_items` (
  `id` int(11) NOT NULL,
  `location` int(11) NOT NULL DEFAULT 1,
  `product_in` int(11) NOT NULL DEFAULT 0,
  `product_in_by` varchar(20) NOT NULL DEFAULT '',
  `product_in_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `selected_product_in` int(11) NOT NULL DEFAULT 0,
  `product_out` int(11) NOT NULL DEFAULT 0,
  `product_out_by` varchar(20) NOT NULL DEFAULT '',
  `product_out_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `selected_product_out` int(11) NOT NULL DEFAULT 0,
  `warehouse` int(11) NOT NULL DEFAULT 0,
  `serial_number` varchar(20) NOT NULL DEFAULT '',
  `warranty_expiration_date` date NOT NULL DEFAULT '0000-00-00',
  `deleted` tinyint(1) NOT NULL DEFAULT 0,
  `deleted_by` varchar(20) NOT NULL DEFAULT 'system',
  `deleted_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` varchar(20) NOT NULL DEFAULT 'system',
  `created_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified_by` varchar(20) NOT NULL DEFAULT 'system',
  `modified_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `t_product_outs`
--

CREATE TABLE `t_product_outs` (
  `id` int(11) NOT NULL,
  `location` int(11) NOT NULL DEFAULT 1,
  `product` int(11) NOT NULL DEFAULT 0,
  `code` varchar(20) NOT NULL DEFAULT '',
  `date` date NOT NULL DEFAULT '0000-00-00',
  `fast_code` varchar(50) NOT NULL DEFAULT '',
  `sales_order_number` varchar(50) NOT NULL DEFAULT '',
  `quantity` int(11) NOT NULL DEFAULT 0,
  `locked` tinyint(1) NOT NULL DEFAULT 0,
  `status` varchar(20) NOT NULL DEFAULT 'status_open',
  `deleted` tinyint(1) NOT NULL DEFAULT 0,
  `deleted_by` varchar(20) NOT NULL DEFAULT 'system',
  `deleted_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` varchar(20) NOT NULL DEFAULT 'system',
  `created_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified_by` varchar(20) NOT NULL DEFAULT 'system',
  `modified_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ci_sessions`
--
ALTER TABLE `ci_sessions`
  ADD KEY `ci_sessions_timestamp` (`timestamp`);

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `m_products`
--
ALTER TABLE `m_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `m_warehouses`
--
ALTER TABLE `m_warehouses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `system_logs`
--
ALTER TABLE `system_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `s_field_requirements`
--
ALTER TABLE `s_field_requirements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `s_locations`
--
ALTER TABLE `s_locations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `s_permissions`
--
ALTER TABLE `s_permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `s_roles`
--
ALTER TABLE `s_roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `s_settings`
--
ALTER TABLE `s_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `s_users`
--
ALTER TABLE `s_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `s_user_details`
--
ALTER TABLE `s_user_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_product_ins`
--
ALTER TABLE `t_product_ins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_product_items`
--
ALTER TABLE `t_product_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_product_outs`
--
ALTER TABLE `t_product_outs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `m_products`
--
ALTER TABLE `m_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `m_warehouses`
--
ALTER TABLE `m_warehouses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `system_logs`
--
ALTER TABLE `system_logs`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `s_field_requirements`
--
ALTER TABLE `s_field_requirements`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `s_locations`
--
ALTER TABLE `s_locations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `s_permissions`
--
ALTER TABLE `s_permissions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT for table `s_roles`
--
ALTER TABLE `s_roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `s_settings`
--
ALTER TABLE `s_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `s_users`
--
ALTER TABLE `s_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `s_user_details`
--
ALTER TABLE `s_user_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `t_product_ins`
--
ALTER TABLE `t_product_ins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `t_product_items`
--
ALTER TABLE `t_product_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `t_product_outs`
--
ALTER TABLE `t_product_outs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
