-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 29, 2020 at 05:52 PM
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
-- Table structure for table `bercastock`
--

CREATE TABLE `bercastock` (
  `principal_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `PRINCIPAL` varchar(22) NOT NULL,
  `PRODUCT_CODE_PN` varchar(11) NOT NULL,
  `DESCRIPTION` varchar(47) NOT NULL,
  `QTY_STOCK` int(11) NOT NULL,
  `LOCATION` varchar(6) NOT NULL,
  `PO_NUMBER` int(11) NOT NULL,
  `PO_DATE` varchar(30) DEFAULT NULL,
  `LPB_NUMBER` varchar(30) DEFAULT NULL,
  `LPB_DATE` varchar(30) DEFAULT NULL,
  `purchase_order_date` date NOT NULL DEFAULT '0000-00-00',
  `SN` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bercastock`
--

INSERT INTO `bercastock` (`principal_id`, `product_id`, `PRINCIPAL`, `PRODUCT_CODE_PN`, `DESCRIPTION`, `QTY_STOCK`, `LOCATION`, `PO_NUMBER`, `PO_DATE`, `LPB_NUMBER`, `LPB_DATE`, `purchase_order_date`, `SN`) VALUES
(1, 1, 'Philips Ind.commercial', '863352', 'Central CMS200 (16beds) - 863352', 3, '021-DM', 702252, '0000-00-00', '', '22/07/2020', '2020-07-22', 'CN62001242'),
(1, 1, 'Philips Ind.commercial', '863352', 'Central CMS200 (16beds) - 863352', 0, '021-DM', 702252, '0000-00-00', '', '22/07/2020', '2020-07-22', 'CN62001243'),
(1, 1, 'Philips Ind.commercial', '863352', 'Central CMS200 (16beds) - 863352', 0, '021-DM', 702252, '0000-00-00', '', '22/07/2020', '2020-07-22', 'CN62001244'),
(1, 2, 'Philips Ind.commercial', '866389', 'Central PIIC IX 16 beds with caregiver - 866389', 1, '021-DM', 792492, '0000-00-00', '', '13/04/2020', '2020-04-13', '612V-1VNP-5'),
(1, 3, 'Philips Ind.commercial', '866389', 'Central PIIC IX 16 beds ecat- 866389', 1, '021-DM', 792072, '0000-00-00', '', '16/10/2019', '2019-10-16', '0B3D-1AHM-J'),
(3, 4, 'Philips', 'FUS6884', 'Lumify S4-1 Bundle (Sector) - FUS6884', 4, '021-DM', 702319, '0000-00-00', '', '06/08/2020', '2020-08-06', 'US420L1853'),
(3, 4, 'Philips', 'FUS6884', 'Lumify S4-1 Bundle (Sector) - FUS6884', 0, '021-DM', 702319, '0000-00-00', '', '06/08/2020', '2020-08-06', 'US520L1067'),
(3, 4, 'Philips', 'FUS6884', 'Lumify S4-1 Bundle (Sector) - FUS6884', 0, '021-DM', 702319, '0000-00-00', '', '06/08/2020', '2020-08-06', 'US520L1068'),
(3, 4, 'Philips', 'FUS6884', 'Lumify S4-1 Bundle (Sector) - FUS6884', 0, '021-DM', 702319, '0000-00-00', '', '06/08/2020', '2020-08-06', 'US520L1069'),
(4, 5, 'Steris', 'CMAXT2L413W', 'CMAX T2L Table Configuration - CMAXT2L413W', 1, '021-DM', 550477, '0000-00-00', '', '11/10/2017', '2017-10-11', '65312'),
(4, 6, 'Steris', 'CMAXS2L413W', 'CMAX Table with Accessories - CMAXS2L413W', 1, '021-DM', 550478, '0000-00-00', '', '11/10/2017', '2017-10-11', '62730');

-- --------------------------------------------------------

--
-- Table structure for table `bercastock_product`
--

CREATE TABLE `bercastock_product` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `bercastock_product`
--

INSERT INTO `bercastock_product` (`id`, `name`) VALUES
(1, 'Central CMS200 (16beds) - 863352'),
(2, 'Central PIIC IX 16 beds with caregiver - 866389'),
(3, 'Central PIIC IX 16 beds ecat- 866389'),
(4, 'Lumify S4-1 Bundle (Sector) - FUS6884'),
(5, 'CMAX T2L Table Configuration - CMAXT2L413W'),
(6, 'CMAX Table with Accessories - CMAXS2L413W');

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
('3c919b683b20e7f7f2adb8ee59131e1be4a82877', '127.0.0.1', 1601382412, 0x5f5f63695f6c6173745f726567656e65726174657c693a313630313338323431323b),
('c16739aac3a2e7fcb347b74dd3f582871bd9025a', '127.0.0.1', 1601394673, 0x5f5f63695f6c6173745f726567656e65726174657c693a313630313339333332333b61696e646f5f62657263617c613a373a7b733a323a226964223b733a313a2231223b733a383a22757365726e616d65223b733a353a2261646d696e223b733a343a22726f6c65223b733a313a2231223b733a393a22726f6c655f6e616d65223b733a31393a2253757065722041646d696e6973747261746f72223b733a31353a22726f6c655f6964656e746966696572223b733a31303a22737570657261646d696e223b733a383a226c6f636174696f6e223b733a313a2231223b733a393a2276616c696461746564223b623a313b7d61696e646f5f62657263615f6c6f636174696f6e7c613a363a7b733a323a226964223b733a313a2231223b733a343a22636f6465223b733a31333a224c4f4330303030303030303031223b733a343a226e616d65223b733a31303a224c6f636174696f6e2031223b733a373a2261646472657373223b733a32323a22416464726573732031612c2041646472657373203162223b733a353a2270686f6e65223b733a31383a2250686f6e652031612c2050686f6e65203162223b733a31343a226c6f636174696f6e5f67726f7570223b733a313a2230223b7d62616e6e65645f70616765737c613a303a7b7d6d6573736167657c4e3b6e6f74696669636174696f6e7c4e3b);

-- --------------------------------------------------------

--
-- Table structure for table `csv_sample_stock`
--

CREATE TABLE `csv_sample_stock` (
  `principal_id` int(11) NOT NULL,
  `PRINCIPAL` varchar(22) NOT NULL,
  `product_id` int(11) NOT NULL,
  `PRODUCT_CODE` varchar(23) NOT NULL,
  `DESCRIPTION` varchar(108) NOT NULL,
  `QTY_STOCK` int(11) NOT NULL,
  `LOCATION` varchar(6) NOT NULL,
  `PO_NUMBER` int(11) NOT NULL,
  `PO_DATE` varchar(30) DEFAULT NULL,
  `LPB_NUMBER` varchar(30) DEFAULT NULL,
  `LPB_DATE` varchar(10) NOT NULL,
  `date` date NOT NULL DEFAULT '0000-00-00',
  `purchase_order_date` date NOT NULL DEFAULT '0000-00-00',
  `SN` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `csv_sample_stock`
--

INSERT INTO `csv_sample_stock` (`principal_id`, `PRINCIPAL`, `product_id`, `PRODUCT_CODE`, `DESCRIPTION`, `QTY_STOCK`, `LOCATION`, `PO_NUMBER`, `PO_DATE`, `LPB_NUMBER`, `LPB_DATE`, `date`, `purchase_order_date`, `SN`) VALUES
(1, 'Philips Ind.commercial', 1, '863352', 'Central CMS200 (16beds) - 863352', 3, '021-DM', 702252, NULL, NULL, '22/07/2020', '0000-00-00', '2020-07-22', 'CN62001242'),
(1, 'Philips Ind.commercial', 1, '863352', 'Central CMS200 (16beds) - 863352', 0, '021-DM', 702252, NULL, NULL, '22/07/2020', '0000-00-00', '2020-07-22', 'CN62001243'),
(1, 'Philips Ind.commercial', 1, '863352', 'Central CMS200 (16beds) - 863352', 0, '021-DM', 702252, NULL, NULL, '22/07/2020', '0000-00-00', '2020-07-22', 'CN62001244'),
(1, 'Philips Ind.commercial', 3, '866389', 'Central PIIC IX 16 beds with caregiver - 866389', 1, '021-DM', 792492, NULL, NULL, '13/04/2020', '0000-00-00', '2020-04-13', '612V-1VNP-5'),
(1, 'Philips Ind.commercial', 4, '866389', 'Central PIIC IX 16 beds ecat- 866389', 1, '021-DM', 792072, NULL, NULL, '16/10/2019', '0000-00-00', '2019-10-16', '0B3D-1AHM-J'),
(1, 'Philips Ind.commercial', 5, '866199', 'DFM100 SpO2 e-cat - 866199', 33, '021-DM', 782058, NULL, NULL, '10/01/2019', '0000-00-00', '2019-01-10', 'CN32620427'),
(1, 'Philips Ind.commercial', 5, '866199', 'DFM100 SpO2 e-cat - 866199', 0, '021-DM', 782058, NULL, NULL, '10/01/2019', '0000-00-00', '2019-01-10', 'CN32620428'),
(1, 'Philips Ind.commercial', 5, '866199', 'DFM100 SpO2 e-cat - 866199', 0, '021-DM', 792046, NULL, NULL, '08/08/2019', '0000-00-00', '2019-08-08', 'CN32628545'),
(1, 'Philips Ind.commercial', 5, '866199', 'DFM100 SpO2 e-cat - 866199', 0, '021-DM', 792046, NULL, NULL, '08/08/2019', '0000-00-00', '2019-08-08', 'CN32628546'),
(1, 'Philips Ind.commercial', 5, '866199', 'DFM100 SpO2 e-cat - 866199', 0, '021-DM', 792046, NULL, NULL, '08/08/2019', '0000-00-00', '2019-08-08', 'CN32628547'),
(1, 'Philips Ind.commercial', 5, '866199', 'DFM100 SpO2 e-cat - 866199', 0, '021-DM', 792046, NULL, NULL, '08/08/2019', '0000-00-00', '2019-08-08', 'CN32628548'),
(1, 'Philips Ind.commercial', 5, '866199', 'DFM100 SpO2 e-cat - 866199', 0, '021-DM', 792046, NULL, NULL, '08/08/2019', '0000-00-00', '2019-08-08', 'CN32628549'),
(1, 'Philips Ind.commercial', 5, '866199', 'DFM100 SpO2 e-cat - 866199', 0, '021-DM', 792047, NULL, NULL, '16/09/2019', '0000-00-00', '2019-09-16', 'CN32629742'),
(1, 'Philips Ind.commercial', 5, '866199', 'DFM100 SpO2 e-cat - 866199', 0, '021-DM', 792047, NULL, NULL, '16/09/2019', '0000-00-00', '2019-09-16', 'CN32629743'),
(1, 'Philips Ind.commercial', 5, '866199', 'DFM100 SpO2 e-cat - 866199', 0, '021-DM', 792047, NULL, NULL, '16/09/2019', '0000-00-00', '2019-09-16', 'CN32629744'),
(1, 'Philips Ind.commercial', 5, '866199', 'DFM100 SpO2 e-cat - 866199', 0, '021-DM', 792047, NULL, NULL, '16/09/2019', '0000-00-00', '2019-09-16', 'CN32629745'),
(1, 'Philips Ind.commercial', 5, '866199', 'DFM100 SpO2 e-cat - 866199', 0, '021-DM', 792047, NULL, NULL, '16/09/2019', '0000-00-00', '2019-09-16', 'CN32629746'),
(1, 'Philips Ind.commercial', 5, '866199', 'DFM100 SpO2 e-cat - 866199', 0, '021-DM', 792047, NULL, NULL, '16/09/2019', '0000-00-00', '2019-09-16', 'CN32629747'),
(1, 'Philips Ind.commercial', 5, '866199', 'DFM100 SpO2 e-cat - 866199', 0, '021-DM', 792047, NULL, NULL, '16/09/2019', '0000-00-00', '2019-09-16', 'CN32629748'),
(1, 'Philips Ind.commercial', 5, '866199', 'DFM100 SpO2 e-cat - 866199', 0, '021-DM', 792047, NULL, NULL, '16/09/2019', '0000-00-00', '2019-09-16', 'CN32629749'),
(1, 'Philips Ind.commercial', 5, '866199', 'DFM100 SpO2 e-cat - 866199', 0, '021-DM', 792047, NULL, NULL, '16/09/2019', '0000-00-00', '2019-09-16', 'CN32629750'),
(1, 'Philips Ind.commercial', 5, '866199', 'DFM100 SpO2 e-cat - 866199', 0, '021-DM', 792047, NULL, NULL, '16/09/2019', '0000-00-00', '2019-09-16', 'CN32629751'),
(1, 'Philips Ind.commercial', 5, '866199', 'DFM100 SpO2 e-cat - 866199', 0, '021-DM', 792298, NULL, NULL, '03/10/2019', '0000-00-00', '2019-10-03', 'CN32630576'),
(1, 'Philips Ind.commercial', 5, '866199', 'DFM100 SpO2 e-cat - 866199', 0, '021-DM', 792463, NULL, NULL, '20/12/2019', '0000-00-00', '2019-12-20', 'CN32633864'),
(1, 'Philips Ind.commercial', 5, '866199', 'DFM100 SpO2 e-cat - 866199', 0, '021-DM', 792463, NULL, NULL, '20/12/2019', '0000-00-00', '2019-12-20', 'CN32633865'),
(1, 'Philips Ind.commercial', 5, '866199', 'DFM100 SpO2 e-cat - 866199', 0, '021-DM', 792463, NULL, NULL, '20/12/2019', '0000-00-00', '2019-12-20', 'CN32633866'),
(1, 'Philips Ind.commercial', 5, '866199', 'DFM100 SpO2 e-cat - 866199', 0, '021-DM', 792463, NULL, NULL, '20/12/2019', '0000-00-00', '2019-12-20', 'CN32633867'),
(1, 'Philips Ind.commercial', 5, '866199', 'DFM100 SpO2 e-cat - 866199', 0, '021-DM', 792463, NULL, NULL, '20/12/2019', '0000-00-00', '2019-12-20', 'CN32633868'),
(1, 'Philips Ind.commercial', 5, '866199', 'DFM100 SpO2 e-cat - 866199', 0, '021-DM', 792463, NULL, NULL, '20/12/2019', '0000-00-00', '2019-12-20', 'CN32633869'),
(1, 'Philips Ind.commercial', 5, '866199', 'DFM100 SpO2 e-cat - 866199', 0, '021-DM', 792463, NULL, NULL, '20/12/2019', '0000-00-00', '2019-12-20', 'CN32633870'),
(1, 'Philips Ind.commercial', 5, '866199', 'DFM100 SpO2 e-cat - 866199', 0, '021-DM', 792463, NULL, NULL, '20/12/2019', '0000-00-00', '2019-12-20', 'CN32633871'),
(1, 'Philips Ind.commercial', 5, '866199', 'DFM100 SpO2 e-cat - 866199', 0, '021-DM', 792463, NULL, NULL, '20/12/2019', '0000-00-00', '2019-12-20', 'CN32633872'),
(1, 'Philips Ind.commercial', 5, '866199', 'DFM100 SpO2 e-cat - 866199', 0, '021-DM', 792463, NULL, NULL, '20/12/2019', '0000-00-00', '2019-12-20', 'CN32633873'),
(1, 'Philips Ind.commercial', 5, '866199', 'DFM100 SpO2 e-cat - 866199', 0, '021-DM', 792463, NULL, NULL, '20/12/2019', '0000-00-00', '2019-12-20', 'CN32633874'),
(1, 'Philips Ind.commercial', 5, '866199', 'DFM100 SpO2 e-cat - 866199', 0, '021-DM', 792463, NULL, NULL, '20/12/2019', '0000-00-00', '2019-12-20', 'CN32633875'),
(1, 'Philips Ind.commercial', 5, '866199', 'DFM100 SpO2 e-cat - 866199', 0, '021-DM', 792463, NULL, NULL, '20/12/2019', '0000-00-00', '2019-12-20', 'CN32633876'),
(1, 'Philips Ind.commercial', 5, '866199', 'DFM100 SpO2 e-cat - 866199', 0, '021-DM', 792463, NULL, NULL, '20/12/2019', '0000-00-00', '2019-12-20', 'CN32633877'),
(1, 'Philips Ind.commercial', 5, '866199', 'DFM100 SpO2 e-cat - 866199', 0, '021-DM', 792463, NULL, NULL, '20/12/2019', '0000-00-00', '2019-12-20', 'CN32633878'),
(1, 'Philips Ind.commercial', 8, '860343', 'ST80i - 860343', 4, '021-DM', 702117, NULL, NULL, '16/06/2020', '0000-00-00', '2020-06-16', 'US52010166'),
(1, 'Philips Ind.commercial', 8, '860343', 'ST80i - 860343', 0, '021-DM', 702117, NULL, NULL, '07/07/2020', '0000-00-00', '2020-07-07', 'US62010200'),
(1, 'Philips Ind.commercial', 8, '860343', 'ST80i - 860343', 0, '021-DM', 702252, NULL, NULL, '22/07/2020', '0000-00-00', '2020-07-22', 'US62010201'),
(1, 'Philips Ind.commercial', 8, '860343', 'ST80i - 860343', 0, '021-DM', 702252, NULL, NULL, '22/07/2020', '0000-00-00', '2020-07-22', 'US62010202'),
(1, 'Philips Ind.commercial', 9, '860392', 'TC10 - 860392', 4, '021-DM', 792315, NULL, NULL, '03/10/2019', '0000-00-00', '2019-10-03', 'CN91912660'),
(1, 'Philips Ind.commercial', 9, '860392', 'TC10 - 860392', 0, '021-DM', 792315, NULL, NULL, '03/10/2019', '0000-00-00', '2019-10-03', 'CN91912661'),
(1, 'Philips Ind.commercial', 9, '860392', 'TC10 - 860392', 0, '021-DM', 702186, NULL, NULL, '16/06/2020', '0000-00-00', '2020-06-16', 'CN52015510'),
(1, 'Philips Ind.commercial', 9, '860392', 'TC10 - 860392', 0, '021-DM', 702186, NULL, NULL, '16/06/2020', '0000-00-00', '2020-06-16', 'CN52015511'),
(1, 'Philips Ind.commercial', 10, '860332', 'TC20 - 860332', 2, '021-DM', 742203, NULL, NULL, '12/03/2015', '0000-00-00', '2015-03-12', 'CN11506444'),
(1, 'Philips Ind.commercial', 10, '860332', 'TC20 - 860332', 0, '021-DM', 742203, NULL, NULL, '12/03/2015', '0000-00-00', '2015-03-12', 'CN11506445'),
(1, 'Philips Ind.commercial', 11, '860310', 'TC50 - 860310', 17, '021-DM', 772281, NULL, NULL, '10/08/2017', '0000-00-00', '2017-08-10', 'US71732322'),
(1, 'Philips Ind.commercial', 11, '860310', 'TC50 - 860310', 0, '021-DM', 702048, NULL, NULL, '02/06/2020', '0000-00-00', '2020-06-02', 'US52042991'),
(1, 'Philips Ind.commercial', 11, '860310', 'TC50 - 860310', 0, '021-DM', 702048, NULL, NULL, '02/06/2020', '0000-00-00', '2020-06-02', 'US52042992'),
(1, 'Philips Ind.commercial', 11, '860310', 'TC50 - 860310', 0, '021-DM', 702048, NULL, NULL, '02/06/2020', '0000-00-00', '2020-06-02', 'US52042993'),
(1, 'Philips Ind.commercial', 11, '860310', 'TC50 - 860310', 0, '021-DM', 702048, NULL, NULL, '02/06/2020', '0000-00-00', '2020-06-02', 'US52042994'),
(1, 'Philips Ind.commercial', 11, '860310', 'TC50 - 860310', 0, '021-DM', 702048, NULL, NULL, '02/06/2020', '0000-00-00', '2020-06-02', 'US52042995'),
(1, 'Philips Ind.commercial', 11, '860310', 'TC50 - 860310', 0, '021-DM', 702048, NULL, NULL, '02/06/2020', '0000-00-00', '2020-06-02', 'US52042988'),
(1, 'Philips Ind.commercial', 11, '860310', 'TC50 - 860310', 0, '021-DM', 702048, NULL, NULL, '02/06/2020', '0000-00-00', '2020-06-02', 'US52042989'),
(1, 'Philips Ind.commercial', 11, '860310', 'TC50 - 860310', 0, '021-DM', 702117, NULL, NULL, '03/06/2020', '0000-00-00', '2020-06-03', 'US52043009'),
(1, 'Philips Ind.commercial', 11, '860310', 'TC50 - 860310', 0, '021-DM', 702117, NULL, NULL, '03/06/2020', '0000-00-00', '2020-06-03', 'US52043010'),
(1, 'Philips Ind.commercial', 11, '860310', 'TC50 - 860310', 0, '021-DM', 702117, NULL, NULL, '03/06/2020', '0000-00-00', '2020-06-03', 'US52043013'),
(1, 'Philips Ind.commercial', 11, '860310', 'TC50 - 860310', 0, '021-DM', 702117, NULL, NULL, '03/06/2020', '0000-00-00', '2020-06-03', 'US52043015'),
(1, 'Philips Ind.commercial', 11, '860310', 'TC50 - 860310', 0, '021-DM', 702117, NULL, NULL, '03/06/2020', '0000-00-00', '2020-06-03', 'US52403016'),
(1, 'Philips Ind.commercial', 11, '860310', 'TC50 - 860310', 0, '021-DM', 702117, NULL, NULL, '03/06/2020', '0000-00-00', '2020-06-03', 'US52043017'),
(1, 'Philips Ind.commercial', 11, '860310', 'TC50 - 860310', 0, '021-DM', 702117, NULL, NULL, '03/06/2020', '0000-00-00', '2020-06-03', 'US52043018'),
(1, 'Philips Ind.commercial', 11, '860310', 'TC50 - 860310', 0, '021-DM', 702117, NULL, NULL, '03/06/2020', '0000-00-00', '2020-06-03', 'US52043019'),
(1, 'Philips Ind.commercial', 11, '860310', 'TC50 - 860310', 0, '021-DM', 702117, NULL, NULL, '03/06/2020', '0000-00-00', '2020-06-03', 'US52043020'),
(1, 'Philips Ind.commercial', 12, '1054096', 'Trilogy 100 - 1054096', 13, '021-DM', 702279, NULL, NULL, '23/03/2020', '0000-00-00', '2020-03-23', 'TV12002202C'),
(1, 'Philips Ind.commercial', 12, '1054096', 'Trilogy 100 - 1054096', 0, '021-DM', 702279, NULL, NULL, '23/06/2020', '0000-00-00', '2020-06-23', 'TV12005141E'),
(1, 'Philips Ind.commercial', 12, '1054096', 'Trilogy 100 - 1054096', 0, '021-DM', 702279, NULL, NULL, '23/06/2020', '0000-00-00', '2020-06-23', 'TV12005121F'),
(1, 'Philips Ind.commercial', 12, '1054096', 'Trilogy 100 - 1054096', 0, '021-DM', 702366, NULL, NULL, '29/07/2020', '0000-00-00', '2020-07-29', 'TV12005152E'),
(1, 'Philips Ind.commercial', 12, '1054096', 'Trilogy 100 - 1054096', 0, '021-DM', 702366, NULL, NULL, '29/07/2020', '0000-00-00', '2020-07-29', 'TV120051519'),
(1, 'Philips Ind.commercial', 12, '1054096', 'Trilogy 100 - 1054096', 0, '021-DM', 702366, NULL, NULL, '29/07/2020', '0000-00-00', '2020-07-29', 'TV120051532'),
(1, 'Philips Ind.commercial', 12, '1054096', 'Trilogy 100 - 1054096', 0, '021-DM', 702366, NULL, NULL, '29/07/2020', '0000-00-00', '2020-07-29', 'TV120051518'),
(1, 'Philips Ind.commercial', 12, '1054096', 'Trilogy 100 - 1054096', 0, '021-DM', 702366, NULL, NULL, '29/07/2020', '0000-00-00', '2020-07-29', 'TV120051430'),
(1, 'Philips Ind.commercial', 12, '1054096', 'Trilogy 100 - 1054096', 0, '021-DM', 702366, NULL, NULL, '29/07/2020', '0000-00-00', '2020-07-29', 'TV120051538'),
(1, 'Philips Ind.commercial', 12, '1054096', 'Trilogy 100 - 1054096', 0, '021-DM', 702366, NULL, NULL, '29/07/2020', '0000-00-00', '2020-07-29', 'TV120051434'),
(1, 'Philips Ind.commercial', 12, '1054096', 'Trilogy 100 - 1054096', 0, '021-DM', 702366, NULL, NULL, '29/07/2020', '0000-00-00', '2020-07-29', 'TV12005163D'),
(1, 'Philips Ind.commercial', 12, '1054096', 'Trilogy 100 - 1054096', 0, '021-DM', 702366, NULL, NULL, '29/07/2020', '0000-00-00', '2020-07-29', 'TV120051428'),
(1, 'Philips Ind.commercial', 12, '1054096', 'Trilogy 100 - 1054096', 0, '021-DM', 702366, NULL, NULL, '29/07/2020', '0000-00-00', '2020-07-29', 'TV120051424'),
(1, 'Philips Ind.commercial', 14, '863283', 'VS4 e-Cat - 863283', 2, '021-DM', 772096, NULL, NULL, '19/06/2017', '0000-00-00', '2017-06-19', 'US42746648'),
(1, 'Philips Ind.commercial', 14, '863283', 'VS4 e-Cat - 863283', 0, '021-DM', 772096, NULL, NULL, '19/06/2017', '0000-00-00', '2017-06-19', 'US42746650'),
(3, 'Philips', 15, 'FUS6884', 'Lumify S4-1 Bundle (Sector) - FUS6884', 4, '021-DM', 702319, NULL, NULL, '06/08/2020', '0000-00-00', '2020-08-06', 'US420L1853'),
(3, 'Philips', 15, 'FUS6884', 'Lumify S4-1 Bundle (Sector) - FUS6884', 0, '021-DM', 702319, NULL, NULL, '06/08/2020', '0000-00-00', '2020-08-06', 'US520L1067'),
(3, 'Philips', 15, 'FUS6884', 'Lumify S4-1 Bundle (Sector) - FUS6884', 0, '021-DM', 702319, NULL, NULL, '06/08/2020', '0000-00-00', '2020-08-06', 'US520L1068'),
(3, 'Philips', 15, 'FUS6884', 'Lumify S4-1 Bundle (Sector) - FUS6884', 0, '021-DM', 702319, NULL, NULL, '06/08/2020', '0000-00-00', '2020-08-06', 'US520L1069'),
(3, 'Philips', 16, 'FUS6881', 'Lumify C5-2 Bundle (Convex) - FUS6881', 3, '021-DM', 702235, NULL, NULL, '06/08/2020', '0000-00-00', '2020-08-06', 'US620L1195'),
(3, 'Philips', 16, 'FUS6881', 'Lumify C5-2 Bundle (Convex) - FUS6881', 0, '021-DM', 702235, NULL, NULL, '06/08/2020', '0000-00-00', '2020-08-06', 'US791L0260'),
(3, 'Philips', 16, 'FUS6881', 'Lumify C5-2 Bundle (Convex) - FUS6881', 0, '021-DM', 702235, NULL, NULL, '06/08/2020', '0000-00-00', '2020-08-06', 'US791L0259'),
(3, 'Philips', 17, 'FUS6882', 'Lumify L12-3 Bundle (Linear) - FUS6882', 4, '021-DM', 702319, NULL, NULL, '06/08/2020', '0000-00-00', '2020-08-06', 'US719L0261'),
(3, 'Philips', 17, 'FUS6882', 'Lumify L12-3 Bundle (Linear) - FUS6882', 0, '021-DM', 702319, NULL, NULL, '06/08/2020', '0000-00-00', '2020-08-06', 'US719L0262'),
(3, 'Philips', 17, 'FUS6882', 'Lumify L12-3 Bundle (Linear) - FUS6882', 0, '021-DM', 702319, NULL, NULL, '06/08/2020', '0000-00-00', '2020-08-06', 'US420L3095'),
(3, 'Philips', 17, 'FUS6882', 'Lumify L12-3 Bundle (Linear) - FUS6882', 0, '021-DM', 702319, NULL, NULL, '06/08/2020', '0000-00-00', '2020-08-06', 'US420L3094'),
(4, 'Steris', 18, 'DJ060144131', 'Warming Cabinet Std Glass Single 24 in 230V - DJ060144131', 8, '021-DM', 521584, NULL, NULL, '14/07/2020', '0000-00-00', '2020-07-14', '410020207'),
(4, 'Steris', 18, 'DJ060144131', 'Warming Cabinet Std Glass Single 24 in 230V - DJ060144131', 0, '021-DM', 521584, NULL, NULL, '14/07/2020', '0000-00-00', '2020-07-14', '410020208'),
(4, 'Steris', 18, 'DJ060144131', 'Warming Cabinet Std Glass Single 24 in 230V - DJ060144131', 0, '021-DM', 521584, NULL, NULL, '14/07/2020', '0000-00-00', '2020-07-14', '410020209'),
(4, 'Steris', 18, 'DJ060144131', 'Warming Cabinet Std Glass Single 24 in 230V - DJ060144131', 0, '021-DM', 521584, NULL, NULL, '14/07/2020', '0000-00-00', '2020-07-14', '410020210'),
(4, 'Steris', 18, 'DJ060144131', 'Warming Cabinet Std Glass Single 24 in 230V - DJ060144131', 0, '021-DM', 521584, NULL, NULL, '14/07/2020', '0000-00-00', '2020-07-14', '410020211'),
(4, 'Steris', 18, 'DJ060144131', 'Warming Cabinet Std Glass Single 24 in 230V - DJ060144131', 0, '021-DM', 521584, NULL, NULL, '14/07/2020', '0000-00-00', '2020-07-14', '410020212'),
(4, 'Steris', 18, 'DJ060144131', 'Warming Cabinet Std Glass Single 24 in 230V - DJ060144131', 0, '021-DM', 521584, NULL, NULL, '14/07/2020', '0000-00-00', '2020-07-14', '410020219'),
(4, 'Steris', 18, 'DJ060144131', 'Warming Cabinet Std Glass Single 24 in 230V - DJ060144131', 0, '021-DM', 521584, NULL, NULL, '14/07/2020', '0000-00-00', '2020-07-14', '410020220'),
(4, 'Steris', 19, 'HIMAX2512W', 'Himax Table Configuration + Otrho - HIMAX2512W', 1, '021-DM', 521535, NULL, NULL, '23/08/2019', '0000-00-00', '2019-08-23', '129294'),
(4, 'Steris', 20, 'XLD3300DXCT', '2XLED Color Dual Cardanic 3 Spot Including 1 HD Camera ready with adjustable color temperature - XLD3300DXCT', 2, '021-DM', 521550, NULL, NULL, '01/11/2019', '0000-00-00', '2019-11-01', '146362'),
(4, 'Steris', 20, 'XLD3300DXCT', '2XLED Color Dual Cardanic 3 Spot Including 1 HD Camera ready with adjustable color temperature - XLD3300DXCT', 0, '021-DM', 521550, NULL, NULL, '01/11/2019', '0000-00-00', '2019-11-01', '146363'),
(4, 'Steris', 21, 'CMAXT2L413W', 'CMAX T2L Table Configuration - CMAXT2L413W', 1, '021-DM', 550477, NULL, NULL, '11/10/2017', '0000-00-00', '2017-10-11', '65312'),
(4, 'Steris', 22, 'CMAXS2L413W', 'CMAX Table with Accessories - CMAXS2L413W', 1, '021-DM', 550478, NULL, NULL, '11/10/2017', '0000-00-00', '2017-10-11', '62730');

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

--
-- Dumping data for table `logs`
--

INSERT INTO `logs` (`id`, `time`, `username`, `activity`, `system_log_id`) VALUES
(1, '2020-09-26 12:27:49', 'admin', 'User \'admin ()\' login  @ 2020-09-26 12:27:49', 1),
(2, '2020-09-26 13:56:59', 'admin', 'User \'admin\' add Product-In. \'PDI00000001\' @ 2020-09-26 13:56:59', 2),
(3, '2020-09-26 13:56:59', 'admin', 'User \'admin\' add Product-In. \'PDI00000001\' @ 2020-09-26 13:56:59', 3),
(4, '2020-09-26 13:56:59', 'admin', 'User \'admin\' add Product-In. \'PDI00000001\' @ 2020-09-26 13:56:59', 4),
(5, '2020-09-26 13:56:59', 'admin', 'User \'admin\' add Product-In. \'PDI00000001\' @ 2020-09-26 13:56:59', 5),
(6, '2020-09-26 13:56:59', 'admin', 'User \'admin\' add Product-In. \'PDI00000001\' @ 2020-09-26 13:56:59', 6),
(7, '2020-09-26 13:56:59', 'admin', 'User \'admin\' add Product-In. \'PDI00000001\' @ 2020-09-26 13:56:59', 7),
(8, '2020-09-26 13:56:59', 'admin', 'User \'admin\' edit Product \'PDI00000001\' @ 2020-09-26 13:56:59', 8),
(9, '2020-09-26 13:56:59', 'admin', 'User \'admin\' add Product-In \'PDI00000001\' @ 2020-09-26 13:56:59', 9),
(10, '2020-09-26 13:57:35', 'admin', 'User \'admin\' edit Product-Out. \'PDO00000001\' @ 2020-09-26 13:57:35', 10),
(11, '2020-09-26 13:57:35', 'admin', 'User \'admin\' edit Product-Out. \'PDO00000001\' @ 2020-09-26 13:57:35', 11),
(12, '2020-09-26 13:57:35', 'admin', 'User \'admin\' edit Product \'PDO00000001\' @ 2020-09-26 13:57:35', 12),
(13, '2020-09-26 13:57:35', 'admin', 'User \'admin\' add Product-Out \'PDO00000001\' @ 2020-09-26 13:57:35', 13),
(14, '2020-09-28 07:36:05', 'admin', 'User \'admin ()\' login  @ 2020-09-28 07:36:05', 14),
(15, '2020-09-29 19:25:41', 'admin', 'User \'admin\' login  @ 2020-09-29 19:25:41', 15),
(16, '2020-09-29 19:26:21', 'admin', 'User \'admin\' edit Product-Out. \'PDO00000002\' @ 2020-09-29 19:26:21', 16),
(17, '2020-09-29 19:26:21', 'admin', 'User \'admin\' edit Product \'PDO00000002\' @ 2020-09-29 19:26:21', 17),
(18, '2020-09-29 19:26:21', 'admin', 'User \'admin\' add Product-Out \'PDO00000002\' @ 2020-09-29 19:26:21', 18),
(19, '2020-09-29 19:26:34', 'admin', 'User \'admin\' edit Product \'PDO00000002\' @ 2020-09-29 19:26:34', 19),
(20, '2020-09-29 19:26:34', 'admin', 'User \'admin\' edit Product-Out. \'PDO00000002\' @ 2020-09-29 19:26:34', 20),
(21, '2020-09-29 19:26:34', 'admin', 'User \'admin\' edit Product-Out. \'PDO00000002\' @ 2020-09-29 19:26:34', 21),
(22, '2020-09-29 19:26:34', 'admin', 'User \'admin\' edit Product \'PDO00000002\' @ 2020-09-29 19:26:34', 22),
(23, '2020-09-29 19:26:34', 'admin', 'User \'admin\' edit Product-Out \'PDO00000002\' @ 2020-09-29 19:26:34', 23),
(24, '2020-09-29 19:26:41', 'admin', 'User \'admin\' edit Product \'PDO00000002\' @ 2020-09-29 19:26:41', 24),
(25, '2020-09-29 19:26:41', 'admin', 'User \'admin\' edit Product-Out. \'PDO00000002\' @ 2020-09-29 19:26:41', 25),
(26, '2020-09-29 19:26:41', 'admin', 'User \'admin\' delete Product-Out \'PDO00000002\' @ 2020-09-29 19:26:41', 26),
(27, '2020-09-29 22:28:46', 'admin', 'User \'admin\' login  @ 2020-09-29 22:28:46', 27);

-- --------------------------------------------------------

--
-- Table structure for table `m_principals`
--

CREATE TABLE `m_principals` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL DEFAULT '',
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
-- Dumping data for table `m_principals`
--

INSERT INTO `m_principals` (`id`, `name`, `location`, `deleted`, `deleted_by`, `deleted_date`, `created_by`, `created_date`, `modified_by`, `modified_date`) VALUES
(1, 'Philips Ind.commercial', 1, 0, 'system', '0000-00-00 00:00:00', 'system', '0000-00-00 00:00:00', 'system', '0000-00-00 00:00:00'),
(2, 'GCX', 1, 0, 'system', '0000-00-00 00:00:00', 'system', '0000-00-00 00:00:00', 'system', '0000-00-00 00:00:00'),
(3, 'Philips', 1, 0, 'system', '0000-00-00 00:00:00', 'system', '0000-00-00 00:00:00', 'system', '0000-00-00 00:00:00'),
(4, 'Steris', 1, 0, 'system', '0000-00-00 00:00:00', 'system', '0000-00-00 00:00:00', 'system', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `m_products`
--

CREATE TABLE `m_products` (
  `id` int(11) NOT NULL,
  `location` int(11) NOT NULL DEFAULT 1,
  `principal` int(11) NOT NULL DEFAULT 0,
  `name` varchar(255) NOT NULL DEFAULT '',
  `product_number` varchar(50) NOT NULL DEFAULT '',
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

INSERT INTO `m_products` (`id`, `location`, `principal`, `name`, `product_number`, `quantity`, `notes`, `deleted`, `deleted_by`, `deleted_date`, `created_by`, `created_date`, `modified_by`, `modified_date`) VALUES
(1, 1, 1, 'Central CMS200 (16beds) - 863352', '863352', 3, '', 0, 'system', '0000-00-00 00:00:00', 'system', '0000-00-00 00:00:00', 'system', '0000-00-00 00:00:00'),
(2, 1, 1, 'Central PIIC IX 16 beds with caregiver - 866389', '866389', 1, '', 0, 'system', '0000-00-00 00:00:00', 'system', '0000-00-00 00:00:00', 'system', '0000-00-00 00:00:00'),
(3, 1, 1, 'Central PIIC IX 16 beds ecat- 866389', '866389', 1, '', 0, 'system', '0000-00-00 00:00:00', 'system', '0000-00-00 00:00:00', 'system', '0000-00-00 00:00:00'),
(4, 1, 3, 'Lumify S4-1 Bundle (Sector) - FUS6884', 'FUS6884', 4, '', 0, 'system', '0000-00-00 00:00:00', 'system', '0000-00-00 00:00:00', 'system', '0000-00-00 00:00:00'),
(5, 1, 4, 'CMAX T2L Table Configuration - CMAXT2L413W', 'CMAXT2L413W', 1, '', 0, 'system', '0000-00-00 00:00:00', 'system', '0000-00-00 00:00:00', 'system', '0000-00-00 00:00:00'),
(6, 1, 4, 'CMAX Table with Accessories - CMAXS2L413W', 'CMAXS2L413W', 1, '', 0, 'system', '0000-00-00 00:00:00', 'system', '0000-00-00 00:00:00', 'system', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `m_products_sample_stock`
--

CREATE TABLE `m_products_sample_stock` (
  `id` int(11) NOT NULL,
  `location` int(11) NOT NULL DEFAULT 1,
  `principal` int(11) NOT NULL DEFAULT 0,
  `name` varchar(255) NOT NULL DEFAULT '',
  `product_number` varchar(50) NOT NULL DEFAULT '',
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
-- Dumping data for table `m_products_sample_stock`
--

INSERT INTO `m_products_sample_stock` (`id`, `location`, `principal`, `name`, `product_number`, `quantity`, `notes`, `deleted`, `deleted_by`, `deleted_date`, `created_by`, `created_date`, `modified_by`, `modified_date`) VALUES
(1, 1, 1, 'Central CMS200 (16beds) - 863352', '863352', 0, '', 0, 'system', '0000-00-00 00:00:00', 'system', '0000-00-00 00:00:00', 'system', '0000-00-00 00:00:00'),
(2, 1, 1, 'Central PIIC IX 12 Beds - 866389', '866389', 0, '', 0, 'system', '0000-00-00 00:00:00', 'system', '0000-00-00 00:00:00', 'system', '0000-00-00 00:00:00'),
(3, 1, 1, 'Central PIIC IX 16 beds with caregiver - 866389', '866389', 0, '', 0, 'system', '0000-00-00 00:00:00', 'system', '0000-00-00 00:00:00', 'system', '0000-00-00 00:00:00'),
(4, 1, 1, 'Central PIIC IX 16 beds ecat- 866389', '866389', 0, '', 0, 'system', '0000-00-00 00:00:00', 'system', '0000-00-00 00:00:00', 'system', '0000-00-00 00:00:00'),
(5, 1, 1, 'DFM100 SpO2 e-cat - 866199', '866199', 0, '', 0, 'system', '0000-00-00 00:00:00', 'system', '0000-00-00 00:00:00', 'system', '0000-00-00 00:00:00'),
(6, 1, 2, 'Rollstand Lumify-RS-0014-14', 'RS-0014-14', 0, '', 0, 'system', '0000-00-00 00:00:00', 'system', '0000-00-00 00:00:00', 'system', '0000-00-00 00:00:00'),
(7, 1, 2, 'Rollstand Suresign Premium - PH-0058-72/989803176601', 'PH-0058-72/989803176601', 0, '', 0, 'system', '0000-00-00 00:00:00', 'system', '0000-00-00 00:00:00', 'system', '0000-00-00 00:00:00'),
(8, 1, 1, 'ST80i - 860343', '860343', 0, '', 0, 'system', '0000-00-00 00:00:00', 'system', '0000-00-00 00:00:00', 'system', '0000-00-00 00:00:00'),
(9, 1, 1, 'TC10 - 860392', '860392', 0, '', 0, 'system', '0000-00-00 00:00:00', 'system', '0000-00-00 00:00:00', 'system', '0000-00-00 00:00:00'),
(10, 1, 1, 'TC20 - 860332', '860332', 0, '', 0, 'system', '0000-00-00 00:00:00', 'system', '0000-00-00 00:00:00', 'system', '0000-00-00 00:00:00'),
(11, 1, 1, 'TC50 - 860310', '860310', 0, '', 0, 'system', '0000-00-00 00:00:00', 'system', '0000-00-00 00:00:00', 'system', '0000-00-00 00:00:00'),
(12, 1, 1, 'Trilogy 100 - 1054096', '1054096', 0, '', 0, 'system', '0000-00-00 00:00:00', 'system', '0000-00-00 00:00:00', 'system', '0000-00-00 00:00:00'),
(13, 1, 1, 'V60 - 1053614', '1053614', 0, '', 0, 'system', '0000-00-00 00:00:00', 'system', '0000-00-00 00:00:00', 'system', '0000-00-00 00:00:00'),
(14, 1, 1, 'VS4 e-Cat - 863283', '863283', 0, '', 0, 'system', '0000-00-00 00:00:00', 'system', '0000-00-00 00:00:00', 'system', '0000-00-00 00:00:00'),
(15, 1, 3, 'Lumify S4-1 Bundle (Sector) - FUS6884', 'FUS6884', 0, '', 0, 'system', '0000-00-00 00:00:00', 'system', '0000-00-00 00:00:00', 'system', '0000-00-00 00:00:00'),
(16, 1, 3, 'Lumify C5-2 Bundle (Convex) - FUS6881', 'FUS6881', 0, '', 0, 'system', '0000-00-00 00:00:00', 'system', '0000-00-00 00:00:00', 'system', '0000-00-00 00:00:00'),
(17, 1, 3, 'Lumify L12-3 Bundle (Linear) - FUS6882', 'FUS6882', 0, '', 0, 'system', '0000-00-00 00:00:00', 'system', '0000-00-00 00:00:00', 'system', '0000-00-00 00:00:00'),
(18, 1, 4, 'Warming Cabinet Std Glass Single 24 in 230V - DJ060144131', 'DJ060144131', 0, '', 0, 'system', '0000-00-00 00:00:00', 'system', '0000-00-00 00:00:00', 'system', '0000-00-00 00:00:00'),
(19, 1, 4, 'Himax Table Configuration + Otrho - HIMAX2512W', 'HIMAX2512W', 0, '', 0, 'system', '0000-00-00 00:00:00', 'system', '0000-00-00 00:00:00', 'system', '0000-00-00 00:00:00'),
(20, 1, 4, '2XLED Color Dual Cardanic 3 Spot Including 1 HD Camera ready with adjustable color temperature - XLD3300DXCT', 'XLD3300DXCT', 0, '', 0, 'system', '0000-00-00 00:00:00', 'system', '0000-00-00 00:00:00', 'system', '0000-00-00 00:00:00'),
(21, 1, 4, 'CMAX T2L Table Configuration - CMAXT2L413W', 'CMAXT2L413W', 0, '', 0, 'system', '0000-00-00 00:00:00', 'system', '0000-00-00 00:00:00', 'system', '0000-00-00 00:00:00'),
(22, 1, 4, 'CMAX Table with Accessories - CMAXS2L413W', 'CMAXS2L413W', 0, '', 0, 'system', '0000-00-00 00:00:00', 'system', '0000-00-00 00:00:00', 'system', '0000-00-00 00:00:00');

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
(1, '021-DM', 1, 0, 'system', '0000-00-00 00:00:00', 'system', '0000-00-00 00:00:00', 'system', '0000-00-00 00:00:00');

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

--
-- Dumping data for table `system_logs`
--

INSERT INTO `system_logs` (`id`, `time`, `username`, `activity`) VALUES
(1, '2020-09-26 12:27:49', 'admin', 'UPDATE `s_users` SET `last_login_date` = \'2020-09-26 12:27:49\', `modified_by` = \'admin\', `modified_date` = \'2020-09-26 12:27:49\'\nWHERE `id` = \'1\''),
(2, '2020-09-26 13:56:59', 'admin', 'INSERT INTO `t_product_items` (`location`, `product_in`, `product_in_by`, `product_in_date`, `selected_product_in`, `warehouse`, `serial_number`, `warranty_expiration_date`, `created_by`, `created_date`, `modified_by`, `modified_date`) VALUES (\'1\', \'1\', \'admin\', \'2020-09-26 13:56:59\', \'1\', \'1\', \'123451\', \'2020-09-26\', \'admin\', \'2020-09-26 13:56:59\', \'admin\', \'2020-09-26 13:56:59\')'),
(3, '2020-09-26 13:56:59', 'admin', 'INSERT INTO `t_product_items` (`location`, `product_in`, `product_in_by`, `product_in_date`, `selected_product_in`, `warehouse`, `serial_number`, `warranty_expiration_date`, `created_by`, `created_date`, `modified_by`, `modified_date`) VALUES (\'1\', \'1\', \'admin\', \'2020-09-26 13:56:59\', \'1\', \'2\', \'123452\', \'2020-09-27\', \'admin\', \'2020-09-26 13:56:59\', \'admin\', \'2020-09-26 13:56:59\')'),
(4, '2020-09-26 13:56:59', 'admin', 'INSERT INTO `t_product_items` (`location`, `product_in`, `product_in_by`, `product_in_date`, `selected_product_in`, `warehouse`, `serial_number`, `warranty_expiration_date`, `created_by`, `created_date`, `modified_by`, `modified_date`) VALUES (\'1\', \'1\', \'admin\', \'2020-09-26 13:56:59\', \'1\', \'3\', \'123453\', \'2020-09-28\', \'admin\', \'2020-09-26 13:56:59\', \'admin\', \'2020-09-26 13:56:59\')'),
(5, '2020-09-26 13:56:59', 'admin', 'INSERT INTO `t_product_items` (`location`, `product_in`, `product_in_by`, `product_in_date`, `selected_product_in`, `warehouse`, `serial_number`, `warranty_expiration_date`, `created_by`, `created_date`, `modified_by`, `modified_date`) VALUES (\'1\', \'1\', \'admin\', \'2020-09-26 13:56:59\', \'1\', \'1\', \'123454\', \'2020-09-29\', \'admin\', \'2020-09-26 13:56:59\', \'admin\', \'2020-09-26 13:56:59\')'),
(6, '2020-09-26 13:56:59', 'admin', 'INSERT INTO `t_product_items` (`location`, `product_in`, `product_in_by`, `product_in_date`, `selected_product_in`, `warehouse`, `serial_number`, `warranty_expiration_date`, `created_by`, `created_date`, `modified_by`, `modified_date`) VALUES (\'1\', \'1\', \'admin\', \'2020-09-26 13:56:59\', \'1\', \'1\', \'123455\', \'2020-09-30\', \'admin\', \'2020-09-26 13:56:59\', \'admin\', \'2020-09-26 13:56:59\')'),
(7, '2020-09-26 13:56:59', 'admin', 'INSERT INTO `t_product_items` (`location`, `product_in`, `product_in_by`, `product_in_date`, `selected_product_in`, `warehouse`, `serial_number`, `warranty_expiration_date`, `created_by`, `created_date`, `modified_by`, `modified_date`) VALUES (\'1\', \'1\', \'admin\', \'2020-09-26 13:56:59\', \'1\', \'1\', \'123456\', \'2020-10-01\', \'admin\', \'2020-09-26 13:56:59\', \'admin\', \'2020-09-26 13:56:59\')'),
(8, '2020-09-26 13:56:59', 'admin', 'UPDATE `m_products` SET `quantity` = 6, `modified_by` = \'admin\', `modified_date` = \'2020-09-26 13:56:59\'\nWHERE `id` = \'1\''),
(9, '2020-09-26 13:56:59', 'admin', 'INSERT INTO `t_product_ins` (`code`, `location`, `date`, `product`, `fast_code`, `purchase_order_number`, `quantity`, `created_by`, `created_date`, `modified_by`, `modified_date`) VALUES (\'PDI00000001\', \'1\', \'2020-09-26\', \'1\', \'FC12345\', \'LPB12345\', 6, \'admin\', \'2020-09-26 13:56:59\', \'admin\', \'2020-09-26 13:56:59\')'),
(10, '2020-09-26 13:57:35', 'admin', 'UPDATE `t_product_items` SET `location` = \'1\', `product_out` = \'1\', `product_out_by` = \'admin\', `product_out_date` = \'2020-09-26 13:57:35\', `selected_product_out` = \'1\', `modified_by` = \'admin\', `modified_date` = \'2020-09-26 13:57:35\'\nWHERE `id` = \'1\''),
(11, '2020-09-26 13:57:35', 'admin', 'UPDATE `t_product_items` SET `location` = \'1\', `product_out` = \'1\', `product_out_by` = \'admin\', `product_out_date` = \'2020-09-26 13:57:35\', `selected_product_out` = \'1\', `modified_by` = \'admin\', `modified_date` = \'2020-09-26 13:57:35\'\nWHERE `id` = \'2\''),
(12, '2020-09-26 13:57:35', 'admin', 'UPDATE `m_products` SET `quantity` = 4, `modified_by` = \'admin\', `modified_date` = \'2020-09-26 13:57:35\'\nWHERE `id` = \'1\''),
(13, '2020-09-26 13:57:35', 'admin', 'INSERT INTO `t_product_outs` (`code`, `location`, `date`, `product`, `fast_code`, `sales_order_number`, `quantity`, `created_by`, `created_date`, `modified_by`, `modified_date`) VALUES (\'PDO00000001\', \'1\', \'2020-09-26\', \'1\', \'FC12345\', \'SO12345\', 2, \'admin\', \'2020-09-26 13:57:35\', \'admin\', \'2020-09-26 13:57:35\')'),
(14, '2020-09-28 07:36:05', 'admin', 'UPDATE `s_users` SET `last_login_date` = \'2020-09-28 07:36:05\', `modified_by` = \'admin\', `modified_date` = \'2020-09-28 07:36:05\'\nWHERE `id` = \'1\''),
(15, '2020-09-29 19:25:41', 'admin', 'UPDATE `s_users` SET `last_login_date` = \'2020-09-29 19:25:41\', `modified_by` = \'admin\', `modified_date` = \'2020-09-29 19:25:41\'\nWHERE `id` = \'1\''),
(16, '2020-09-29 19:26:21', 'admin', 'UPDATE `t_product_items` SET `location` = \'1\', `product_out` = \'2\', `product_out_by` = \'admin\', `product_out_date` = \'2020-09-29 19:26:21\', `selected_product_out` = \'1\', `modified_by` = \'admin\', `modified_date` = \'2020-09-29 19:26:21\'\nWHERE `id` = \'3\''),
(17, '2020-09-29 19:26:21', 'admin', 'UPDATE `m_products` SET `quantity` = 3, `modified_by` = \'admin\', `modified_date` = \'2020-09-29 19:26:21\'\nWHERE `id` = \'1\''),
(18, '2020-09-29 19:26:21', 'admin', 'INSERT INTO `t_product_outs` (`code`, `location`, `date`, `product`, `fast_code`, `sales_order_number`, `quantity`, `created_by`, `created_date`, `modified_by`, `modified_date`) VALUES (\'PDO00000002\', \'1\', \'2020-09-29\', \'1\', \'FC12345\', \'SO12345\', 1, \'admin\', \'2020-09-29 19:26:21\', \'admin\', \'2020-09-29 19:26:21\')'),
(19, '2020-09-29 19:26:34', 'admin', 'UPDATE `m_products` SET `quantity` = 4, `modified_by` = \'admin\', `modified_date` = \'2020-09-29 19:26:34\'\nWHERE `id` = \'1\''),
(20, '2020-09-29 19:26:34', 'admin', 'UPDATE `t_product_items` SET `product_out` = 0, `product_out_by` = \'\', `product_out_date` = \'0000-00-00 00:00:00\', `selected_product_out` = 0, `modified_by` = \'admin\', `modified_date` = \'2020-09-29 19:26:34\'\nWHERE `id` = \'3\''),
(21, '2020-09-29 19:26:34', 'admin', 'UPDATE `t_product_items` SET `product_out` = \'2\', `product_out_by` = \'admin\', `product_out_date` = \'2020-09-29 19:26:34\', `selected_product_out` = \'1\', `modified_by` = \'admin\', `modified_date` = \'2020-09-29 19:26:34\'\nWHERE `id` = \'6\''),
(22, '2020-09-29 19:26:34', 'admin', 'UPDATE `m_products` SET `quantity` = 3, `modified_by` = \'admin\', `modified_date` = \'2020-09-29 19:26:34\'\nWHERE `id` = \'1\''),
(23, '2020-09-29 19:26:34', 'admin', 'UPDATE `t_product_outs` SET `date` = \'2020-09-29\', `product` = \'1\', `fast_code` = \'FC12345\', `sales_order_number` = \'SO12345\', `quantity` = 1, `modified_by` = \'admin\', `modified_date` = \'2020-09-29 19:26:34\'\nWHERE `id` = \'2\''),
(24, '2020-09-29 19:26:41', 'admin', 'UPDATE `m_products` SET `quantity` = 4, `modified_by` = \'admin\', `modified_date` = \'2020-09-29 19:26:41\'\nWHERE `id` = \'1\''),
(25, '2020-09-29 19:26:41', 'admin', 'UPDATE `t_product_items` SET `product_out` = 0, `product_out_by` = \'\', `product_out_date` = \'0000-00-00 00:00:00\', `selected_product_out` = 0, `modified_by` = \'admin\', `modified_date` = \'2020-09-29 19:26:41\'\nWHERE `id` = \'6\''),
(26, '2020-09-29 19:26:41', 'admin', 'UPDATE `t_product_outs` SET `deleted` = 1, `deleted_by` = \'admin\', `deleted_date` = \'2020-09-29 19:26:41\'\nWHERE `id` = \'2\''),
(27, '2020-09-29 22:28:46', 'admin', 'UPDATE `s_users` SET `last_login_date` = \'2020-09-29 22:28:46\', `modified_by` = \'admin\', `modified_date` = \'2020-09-29 22:28:46\'\nWHERE `id` = \'1\'');

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
(1, 1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 1, '2020-09-29 22:28:46', 'status_active', 0, '', '0000-00-00 00:00:00', 'system', '2017-01-01 00:00:00', 'admin', '2020-09-29 22:28:46'),
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
  `code` varchar(20) NOT NULL DEFAULT '',
  `date` date NOT NULL DEFAULT '0000-00-00',
  `fast_code` varchar(50) NOT NULL DEFAULT '',
  `purchase_order_number` varchar(50) NOT NULL DEFAULT '',
  `purchase_order_date` date NOT NULL DEFAULT '0000-00-00',
  `quantity` int(11) NOT NULL DEFAULT 0,
  `locked` tinyint(1) NOT NULL DEFAULT 0,
  `deleted` tinyint(1) NOT NULL DEFAULT 0,
  `deleted_by` varchar(20) NOT NULL DEFAULT 'system',
  `deleted_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` varchar(20) NOT NULL DEFAULT 'system',
  `created_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified_by` varchar(20) NOT NULL DEFAULT 'system',
  `modified_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `t_product_ins`
--

INSERT INTO `t_product_ins` (`id`, `location`, `product`, `code`, `date`, `fast_code`, `purchase_order_number`, `purchase_order_date`, `quantity`, `locked`, `deleted`, `deleted_by`, `deleted_date`, `created_by`, `created_date`, `modified_by`, `modified_date`) VALUES
(1, 1, 1, '', '2020-01-01', '702252', '', '2020-07-22', 3, 0, 0, 'system', '0000-00-00 00:00:00', 'system', '0000-00-00 00:00:00', 'system', '0000-00-00 00:00:00'),
(2, 1, 2, '', '2020-01-01', '792492', '', '2020-04-13', 1, 0, 0, 'system', '0000-00-00 00:00:00', 'system', '0000-00-00 00:00:00', 'system', '0000-00-00 00:00:00'),
(3, 1, 3, '', '2020-01-01', '792072', '', '2019-10-16', 1, 0, 0, 'system', '0000-00-00 00:00:00', 'system', '0000-00-00 00:00:00', 'system', '0000-00-00 00:00:00'),
(4, 1, 4, '', '2020-01-01', '702319', '', '2020-08-06', 4, 0, 0, 'system', '0000-00-00 00:00:00', 'system', '0000-00-00 00:00:00', 'system', '0000-00-00 00:00:00'),
(5, 1, 5, '', '2020-01-01', '550477', '', '2017-10-11', 1, 0, 0, 'system', '0000-00-00 00:00:00', 'system', '0000-00-00 00:00:00', 'system', '0000-00-00 00:00:00'),
(6, 1, 6, '', '2020-01-01', '550478', '', '2017-10-11', 1, 0, 0, 'system', '0000-00-00 00:00:00', 'system', '0000-00-00 00:00:00', 'system', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `t_product_items`
--

CREATE TABLE `t_product_items` (
  `id` int(11) NOT NULL,
  `location` int(11) NOT NULL DEFAULT 1,
  `selected_product_in` int(11) NOT NULL DEFAULT 0,
  `selected_product_out` int(11) NOT NULL DEFAULT 0,
  `warehouse` int(11) NOT NULL DEFAULT 0,
  `serial_number` varchar(20) NOT NULL DEFAULT '',
  `warranty_expiration_date` date NOT NULL DEFAULT '0000-00-00',
  `product_in` int(11) NOT NULL DEFAULT 0,
  `product_in_by` varchar(20) NOT NULL DEFAULT '',
  `product_in_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `product_out` int(11) NOT NULL DEFAULT 0,
  `product_out_by` varchar(20) NOT NULL DEFAULT '',
  `product_out_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted` tinyint(1) NOT NULL DEFAULT 0,
  `deleted_by` varchar(20) NOT NULL DEFAULT 'system',
  `deleted_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` varchar(20) NOT NULL DEFAULT 'system',
  `created_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified_by` varchar(20) NOT NULL DEFAULT 'system',
  `modified_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `t_product_items`
--

INSERT INTO `t_product_items` (`id`, `location`, `selected_product_in`, `selected_product_out`, `warehouse`, `serial_number`, `warranty_expiration_date`, `product_in`, `product_in_by`, `product_in_date`, `product_out`, `product_out_by`, `product_out_date`, `deleted`, `deleted_by`, `deleted_date`, `created_by`, `created_date`, `modified_by`, `modified_date`) VALUES
(1, 1, 1, 0, 1, 'CN62001242', '0000-00-00', 1, 'admin', '2020-07-22 00:00:00', 0, '', '0000-00-00 00:00:00', 0, 'system', '0000-00-00 00:00:00', 'system', '0000-00-00 00:00:00', 'system', '0000-00-00 00:00:00'),
(2, 1, 1, 0, 1, 'CN62001243', '0000-00-00', 1, 'admin', '2020-07-22 00:00:00', 0, '', '0000-00-00 00:00:00', 0, 'system', '0000-00-00 00:00:00', 'system', '0000-00-00 00:00:00', 'system', '0000-00-00 00:00:00'),
(3, 1, 1, 0, 1, 'CN62001244', '0000-00-00', 1, 'admin', '2020-07-22 00:00:00', 0, '', '0000-00-00 00:00:00', 0, 'system', '0000-00-00 00:00:00', 'system', '0000-00-00 00:00:00', 'system', '0000-00-00 00:00:00'),
(4, 1, 2, 0, 1, '612V-1VNP-5', '0000-00-00', 2, 'admin', '2020-04-13 00:00:00', 0, '', '0000-00-00 00:00:00', 0, 'system', '0000-00-00 00:00:00', 'system', '0000-00-00 00:00:00', 'system', '0000-00-00 00:00:00'),
(5, 1, 3, 0, 1, '0B3D-1AHM-J', '0000-00-00', 3, 'admin', '2019-10-16 00:00:00', 0, '', '0000-00-00 00:00:00', 0, 'system', '0000-00-00 00:00:00', 'system', '0000-00-00 00:00:00', 'system', '0000-00-00 00:00:00'),
(6, 1, 4, 0, 1, 'US420L1853', '0000-00-00', 4, 'admin', '2020-08-06 00:00:00', 0, '', '0000-00-00 00:00:00', 0, 'system', '0000-00-00 00:00:00', 'system', '0000-00-00 00:00:00', 'system', '0000-00-00 00:00:00'),
(7, 1, 4, 0, 1, 'US520L1067', '0000-00-00', 4, 'admin', '2020-08-06 00:00:00', 0, '', '0000-00-00 00:00:00', 0, 'system', '0000-00-00 00:00:00', 'system', '0000-00-00 00:00:00', 'system', '0000-00-00 00:00:00'),
(8, 1, 4, 0, 1, 'US520L1068', '0000-00-00', 4, 'admin', '2020-08-06 00:00:00', 0, '', '0000-00-00 00:00:00', 0, 'system', '0000-00-00 00:00:00', 'system', '0000-00-00 00:00:00', 'system', '0000-00-00 00:00:00'),
(9, 1, 4, 0, 1, 'US520L1069', '0000-00-00', 4, 'admin', '2020-08-06 00:00:00', 0, '', '0000-00-00 00:00:00', 0, 'system', '0000-00-00 00:00:00', 'system', '0000-00-00 00:00:00', 'system', '0000-00-00 00:00:00'),
(10, 1, 5, 0, 1, '65312', '0000-00-00', 5, 'admin', '2017-10-11 00:00:00', 0, '', '0000-00-00 00:00:00', 0, 'system', '0000-00-00 00:00:00', 'system', '0000-00-00 00:00:00', 'system', '0000-00-00 00:00:00'),
(11, 1, 6, 0, 1, '62730', '0000-00-00', 6, 'admin', '2017-10-11 00:00:00', 0, '', '0000-00-00 00:00:00', 0, 'system', '0000-00-00 00:00:00', 'system', '0000-00-00 00:00:00', 'system', '0000-00-00 00:00:00');

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
-- Indexes for table `bercastock_product`
--
ALTER TABLE `bercastock_product`
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
-- Indexes for table `m_principals`
--
ALTER TABLE `m_principals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `m_products`
--
ALTER TABLE `m_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `m_products_sample_stock`
--
ALTER TABLE `m_products_sample_stock`
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
-- AUTO_INCREMENT for table `bercastock_product`
--
ALTER TABLE `bercastock_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `m_principals`
--
ALTER TABLE `m_principals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `m_products`
--
ALTER TABLE `m_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `m_products_sample_stock`
--
ALTER TABLE `m_products_sample_stock`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `m_warehouses`
--
ALTER TABLE `m_warehouses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `system_logs`
--
ALTER TABLE `system_logs`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `t_product_items`
--
ALTER TABLE `t_product_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `t_product_outs`
--
ALTER TABLE `t_product_outs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
