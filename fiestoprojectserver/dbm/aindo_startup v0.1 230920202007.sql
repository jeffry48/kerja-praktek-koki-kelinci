-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 23, 2020 at 03:06 PM
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
-- Database: `aindo_startup`
--

-- --------------------------------------------------------

--
-- Table structure for table `basic_table_setup`
--

CREATE TABLE `basic_table_setup` (
  `id` int(11) NOT NULL,
  `location` int(11) NOT NULL DEFAULT 1,
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
-- Table structure for table `ci_sessions`
--

CREATE TABLE `ci_sessions` (
  `id` varchar(128) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `data` blob NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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
(1, 1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 1, '0000-00-00 00:00:00', 'status_active', 0, '', '0000-00-00 00:00:00', 'system', '2017-01-01 00:00:00', 'system', '2017-01-01 00:00:00'),
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

--
-- Indexes for dumped tables
--

--
-- Indexes for table `basic_table_setup`
--
ALTER TABLE `basic_table_setup`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `basic_table_setup`
--
ALTER TABLE `basic_table_setup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT;

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
