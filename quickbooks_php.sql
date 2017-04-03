-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 03, 2017 at 02:05 PM
-- Server version: 5.6.35
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quickbooks_php`
--

-- --------------------------------------------------------

--
-- Table structure for table `bundle_item_relation`
--

CREATE TABLE `bundle_item_relation` (
  `bundle_id` varchar(10) DEFAULT NULL,
  `item_id` varchar(10) DEFAULT NULL,
  `quantity` int(9) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `bundle_item_relation`
--

INSERT INTO `bundle_item_relation` (`bundle_id`, `item_id`, `quantity`) VALUES
('2', '1', 3),
('2', '3', 3),
('3', '1', 8),
('3', '2', 4),
('3', '3', 5),
('4', '2', 3),
('4', '3', 33);

-- --------------------------------------------------------

--
-- Table structure for table `challan_items`
--

CREATE TABLE `challan_items` (
  `id` int(4) DEFAULT NULL,
  `challan_id` varchar(50) DEFAULT NULL,
  `item_code` varchar(20) DEFAULT NULL,
  `item_description` varchar(100) DEFAULT NULL,
  `item_quantity` int(5) DEFAULT NULL,
  `app_price` varchar(10) DEFAULT NULL,
  `total_price` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `challan_items`
--

INSERT INTO `challan_items` (`id`, `challan_id`, `item_code`, `item_description`, `item_quantity`, `app_price`, `total_price`) VALUES
(1, '1', '2', 'no dec', 2, '55', '110'),
(2, '1', '3', 'descrio', 3, '10', '30');

-- --------------------------------------------------------

--
-- Table structure for table `challan_item_relation`
--

CREATE TABLE `challan_item_relation` (
  `challan_id` int(6) NOT NULL,
  `item_id` varchar(10) NOT NULL,
  `job_order` varchar(20) DEFAULT NULL,
  `quantity` int(9) NOT NULL,
  `total_price` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `challan_item_relation`
--

INSERT INTO `challan_item_relation` (`challan_id`, `item_id`, `job_order`, `quantity`, `total_price`) VALUES
(1, '1', 'HI206', 2, 0),
(1, '2', 'HI206', 2, 325),
(1, '3', 'HI206', 5, 55),
(1490726463, '1', 'HI206', 5, 0),
(1490726523, '1', 'HI206', 5, 0),
(1490726524, '3', 'HI206', 2, 0),
(1490726525, '3', 'HI206', 3, 0),
(1490726526, '1', 'HI206', 5, 0),
(1490726526, '2', 'HI206', 4, 0),
(1490726527, '1', 'HI206', 7, 0),
(1490726527, '2', 'HI206', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `location_category_relation`
--

CREATE TABLE `location_category_relation` (
  `location_id` varchar(10) DEFAULT NULL,
  `location_category_id` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `location_category_relation`
--

INSERT INTO `location_category_relation` (`location_id`, `location_category_id`) VALUES
('1', '1'),
('2', '3');

-- --------------------------------------------------------

--
-- Table structure for table `location_item_relation`
--

CREATE TABLE `location_item_relation` (
  `location_id` varchar(10) DEFAULT NULL,
  `item_id` varchar(10) DEFAULT NULL,
  `quantity` int(9) DEFAULT '0',
  `opening_qty` int(4) NOT NULL,
  `opening_qty_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `location_item_relation`
--

INSERT INTO `location_item_relation` (`location_id`, `item_id`, `quantity`, `opening_qty`, `opening_qty_date`) VALUES
('1', '1', 42, 0, '0000-00-00'),
('1', '2', 3, 0, '0000-00-00'),
('1', '3', 15, 0, '0000-00-00'),
('2', '1', 31, 0, '0000-00-00'),
('2', '2', 2, 0, '0000-00-00'),
('2', '3', 5, 0, '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(3) NOT NULL,
  `customer_id` int(5) DEFAULT NULL,
  `job_order` varchar(20) DEFAULT NULL,
  `work_order_image` varchar(100) DEFAULT NULL,
  `security_letter_image` varchar(100) NOT NULL,
  `rental_payment_image` varchar(100) NOT NULL,
  `security_neg_image` varchar(100) NOT NULL,
  `status` int(2) DEFAULT NULL,
  `description` varchar(100) DEFAULT NULL,
  `invoice_no` varchar(30) DEFAULT NULL,
  `reason` varchar(200) NOT NULL,
  `billing_add` varchar(100) DEFAULT NULL,
  `mailing_add` varchar(100) DEFAULT NULL,
  `delivery_add` varchar(100) DEFAULT NULL,
  `phone` varchar(11) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `date` varchar(15) DEFAULT NULL,
  `created_by` varchar(30) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `customer_id`, `job_order`, `work_order_image`, `security_letter_image`, `rental_payment_image`, `security_neg_image`, `status`, `description`, `invoice_no`, `reason`, `billing_add`, `mailing_add`, `delivery_add`, `phone`, `name`, `email`, `date`, `created_by`, `timestamp`) VALUES
(1, 4, 'HI206', 'uploads/1_f2d088707a7a523c3a9e35c35129e53f.jpg', 'uploads/2_f2d088707a7a523c3a9e35c35129e53f.jpg', 'uploads/3_f2d088707a7a523c3a9e35c35129e53f.jpg', 'uploads/4_f2d088707a7a523c3a9e35c35129e53f.jpg', 1, 'This is a test', NULL, '', '1', '1', '1', '0', 'Vikas', 'example@email.com', '31/03/2017', '', '2017-04-03 16:44:42'),
(2, NULL, NULL, 'uploads/1_744860e49e3b6fdc50fbe60aa8ed602d.jpg', 'uploads/2_744860e49e3b6fdc50fbe60aa8ed602d.jpg', 'uploads/3_744860e49e3b6fdc50fbe60aa8ed602d.jpg', 'uploads/4_744860e49e3b6fdc50fbe60aa8ed602d.jpg', 0, 'Another Delivery', NULL, '', '1', '1', '1', '0', 'Vikas', 'example@email.com', '31/03/2017', '', '2017-04-03 16:44:42'),
(3, NULL, NULL, 'uploads/1_9700d18bae3fc8fa418de962f75746e3.jpg', 'uploads/2_9700d18bae3fc8fa418de962f75746e3.jpg', 'uploads/3_9700d18bae3fc8fa418de962f75746e3.jpg', 'uploads/4_9700d18bae3fc8fa418de962f75746e3.jpg', 0, 'asdad', NULL, '', 'dsfsd', 'asda', 'dfsf', NULL, 'sdfsdf', NULL, '27/04/2017', '', '2017-04-03 16:44:42'),
(4, NULL, NULL, 'uploads/1_b6fa6107a6bff236f715069378492bac.jpeg', 'uploads/2_b6fa6107a6bff236f715069378492bac.jpg', 'uploads/3_b6fa6107a6bff236f715069378492bac.jpg', 'uploads/4_b6fa6107a6bff236f715069378492bac.jpg', 0, 'hgjhnmnb', NULL, '', 'fdgd', 'hhjghj', 'dsfsf', NULL, 'fsdf', NULL, '18/04/2017', '', '2017-04-03 16:44:42'),
(5, NULL, NULL, 'uploads/1_b108d9566454055647f41a44a2326806.jpg', 'uploads/2_b108d9566454055647f41a44a2326806.jpg', 'uploads/3_b108d9566454055647f41a44a2326806.jpg', 'uploads/4_b108d9566454055647f41a44a2326806.jpg', 0, 'dgd', NULL, '', 'hfhf', 'ghfq', 'th', NULL, 'rh', NULL, '04/05/2017', '', '2017-04-03 16:44:42'),
(6, NULL, NULL, 'uploads/1_ee1daff9b0a235054b957dc4fb35fe27.jpg', 'uploads/2_ee1daff9b0a235054b957dc4fb35fe27.jpg', 'uploads/3_ee1daff9b0a235054b957dc4fb35fe27.jpg', 'uploads/4_ee1daff9b0a235054b957dc4fb35fe27.jpg', 0, 'fsd', NULL, '', 'qaew', 'wewe', 'ewrwr', NULL, 'gggggggggg', NULL, '01/04/2017', '', '2017-04-03 16:44:42'),
(7, NULL, NULL, 'uploads/1_bbbbe4219e00e3947ca152116118d11b.jpg', 'uploads/2_bbbbe4219e00e3947ca152116118d11b.jpg', 'uploads/3_bbbbe4219e00e3947ca152116118d11b.jpg', 'uploads/4_bbbbe4219e00e3947ca152116118d11b.jpg', 0, 'vikas', NULL, '', 'aadd', 'sadad', 'adasd', NULL, 'qweq', NULL, '01/04/2017', '', '2017-04-03 16:44:42'),
(8, NULL, NULL, 'uploads/1_bdd7071a569c47095867897d85b738d7.png', 'uploads/2_bdd7071a569c47095867897d85b738d7.png', 'uploads/3_bdd7071a569c47095867897d85b738d7.png', 'uploads/4_bdd7071a569c47095867897d85b738d7.png', 0, 'vikas1', NULL, '', 'DASD', 'DASD', 'SDAD', NULL, 'ADASD', NULL, '01/04/2017', '', '2017-04-03 16:44:42'),
(9, NULL, NULL, 'uploads/1_d455d6801e48600ec736ec777a5d224b.png', 'uploads/2_d455d6801e48600ec736ec777a5d224b.png', 'uploads/3_d455d6801e48600ec736ec777a5d224b.png', 'uploads/4_d455d6801e48600ec736ec777a5d224b.png', 0, 'vikas3', NULL, '', 'sdad', 'dasd', 'sadasd', NULL, 'adad', NULL, '01/04/2017', '', '2017-04-03 16:44:42'),
(10, NULL, NULL, 'uploads/1_3636fb6570d6fac8b5754bddfde88344.png', 'uploads/2_3636fb6570d6fac8b5754bddfde88344.png', 'uploads/3_3636fb6570d6fac8b5754bddfde88344.png', 'uploads/4_3636fb6570d6fac8b5754bddfde88344.png', 0, 'hello world', NULL, '', 'ffsdf', 'adasd', 'dfs', NULL, 'ddsd', NULL, '01/04/2017', '', '2017-04-03 16:44:42'),
(11, NULL, NULL, 'uploads/1_cbcc7d97779120602c0655713f47d304.png', 'uploads/2_cbcc7d97779120602c0655713f47d304.png', 'uploads/3_cbcc7d97779120602c0655713f47d304.png', 'uploads/4_cbcc7d97779120602c0655713f47d304.png', 0, 'testing', NULL, '', 'sfsfd', 'erwer', 'dfsdf', NULL, 'tesing', NULL, '01/04/2017', '', '2017-04-03 16:44:42'),
(12, NULL, NULL, 'uploads/1_0d024db2bd1b5325c1a220e22b7807c7.jpg', 'uploads/2_0d024db2bd1b5325c1a220e22b7807c7.jpg', 'uploads/3_0d024db2bd1b5325c1a220e22b7807c7.jpg', 'uploads/4_0d024db2bd1b5325c1a220e22b7807c7.jpg', 0, 'testing123', NULL, '', 'weqwe', 'wqeqew', 'qweawe', NULL, 'eas', NULL, '01/04/2017', '', '2017-04-03 16:44:42'),
(13, NULL, NULL, 'uploads/1_85ba4a89b9b19639c38eaac9b8ac159d.jpg', 'uploads/2_85ba4a89b9b19639c38eaac9b8ac159d.jpg', 'uploads/3_85ba4a89b9b19639c38eaac9b8ac159d.jpg', 'uploads/4_85ba4a89b9b19639c38eaac9b8ac159d.jpg', 0, 'testing123', NULL, '', 'weqwe', 'wqeqew', 'qweawe', NULL, 'eas', NULL, '01/04/2017', '', '2017-04-03 16:44:42'),
(14, 534, NULL, 'uploads/1_164680e61dfe7f4a9729e633bd5fd7b5.png', 'uploads/2_164680e61dfe7f4a9729e633bd5fd7b5.png', 'uploads/3_164680e61dfe7f4a9729e633bd5fd7b5.png', 'uploads/4_164680e61dfe7f4a9729e633bd5fd7b5.png', 0, 'testing1234', NULL, '', 'fsdfwe', 'fsdf', 'dfsdfs', NULL, 'vikas', NULL, '29/04/2017', '', '2017-04-03 16:44:42'),
(15, NULL, NULL, 'uploads/1_ffbec3e5c3288f019efe15db2594e385.png', 'uploads/2_ffbec3e5c3288f019efe15db2594e385.png', 'uploads/3_ffbec3e5c3288f019efe15db2594e385.png', 'uploads/4_ffbec3e5c3288f019efe15db2594e385.png', 0, 'ladders and chairs', NULL, '', 'gulmoher park', 'sriniwaspuri', 'sahoday', NULL, 'vikas', NULL, '12/04/2017', '', '2017-04-03 16:44:42'),
(16, NULL, NULL, 'uploads/1_dfeac5f4df1150e76ec30fcefb4164ef.png', 'uploads/2_dfeac5f4df1150e76ec30fcefb4164ef.png', 'uploads/3_dfeac5f4df1150e76ec30fcefb4164ef.png', 'uploads/4_dfeac5f4df1150e76ec30fcefb4164ef.png', 0, 'ladders and chairs', NULL, '', 'gulmoher park', 'sriniwaspuri', 'sahoday', NULL, 'vikas', NULL, '12/04/2017', '', '2017-04-03 16:44:42'),
(17, NULL, NULL, 'uploads/1_33531e4c647916eaa22c07dfd920102b.png', 'uploads/2_33531e4c647916eaa22c07dfd920102b.png', 'uploads/3_33531e4c647916eaa22c07dfd920102b.png', 'uploads/4_33531e4c647916eaa22c07dfd920102b.png', 0, 'ladders and chairs', NULL, '', 'gulmoher park', 'sriniwaspuri', 'sahoday', NULL, 'vikas', NULL, '12/04/2017', '', '2017-04-03 16:44:42'),
(18, 0, NULL, 'uploads/1_7023fd406620dc05f44bcd8e9308f223.jpg', 'uploads/2_7023fd406620dc05f44bcd8e9308f223.jpg', 'uploads/3_7023fd406620dc05f44bcd8e9308f223.jpg', 'uploads/4_7023fd406620dc05f44bcd8e9308f223.jpg', 0, 'Description', NULL, '', NULL, NULL, ' Noida Sector 18, <br> Starbucks', NULL, '', NULL, '', 'dealinghand', '2017-04-03 17:38:26'),
(19, 0, NULL, 'uploads/1_347554b8c24f1251166885673f14e9d6.jpg', 'uploads/2_347554b8c24f1251166885673f14e9d6.jpg', 'uploads/3_347554b8c24f1251166885673f14e9d6.jpg', 'uploads/4_347554b8c24f1251166885673f14e9d6.jpg', 0, 'Description', NULL, '', NULL, NULL, ' Noida Sector 18, <br> Starbucks', NULL, '', NULL, '', 'dealinghand', '2017-04-03 17:39:17'),
(20, 0, NULL, 'uploads/1_37ea54e67cbbcead59ae1b43f8b0287c.jpg', 'uploads/2_37ea54e67cbbcead59ae1b43f8b0287c.jpg', 'uploads/3_37ea54e67cbbcead59ae1b43f8b0287c.jpg', 'uploads/4_37ea54e67cbbcead59ae1b43f8b0287c.png', 0, 'This is a description', NULL, '', NULL, NULL, ' Noida Sector 18, <br> Starbucks', NULL, '', NULL, '', 'dealinghand', '2017-04-03 17:42:09'),
(21, 54, NULL, 'uploads/1_eddd568ff7aad0fb9b88d3c63354a584.jpg', 'uploads/2_eddd568ff7aad0fb9b88d3c63354a584.jpg', 'uploads/3_eddd568ff7aad0fb9b88d3c63354a584.jpg', 'uploads/4_eddd568ff7aad0fb9b88d3c63354a584.jpg', 0, 'This is a description', NULL, '', NULL, NULL, ' Noida Sector 18, <br> Starbucks', NULL, 'Vanjul Jain', NULL, ' 12/03/2016', 'dealinghand', '2017-04-03 17:45:35');

-- --------------------------------------------------------

--
-- Table structure for table `qb_cache_customer`
--

CREATE TABLE `qb_cache_customer` (
  `customer_id` int(6) NOT NULL,
  `customer_name` varchar(40) NOT NULL,
  `billing_address` varchar(300) NOT NULL,
  `credit_limit` float(8,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `qb_cache_customer`
--

INSERT INTO `qb_cache_customer` (`customer_id`, `customer_name`, `billing_address`, `credit_limit`) VALUES
(1, 'Vikas Prasad Mahato', 'D-8\r\nGulmohar Park', 400000.00),
(2, 'Vanjul Jain', 'Greater Noida', 500000.00);

-- --------------------------------------------------------

--
-- Table structure for table `quickbooks_config`
--

CREATE TABLE `quickbooks_config` (
  `quickbooks_config_id` int(10) UNSIGNED NOT NULL,
  `qb_username` varchar(40) NOT NULL,
  `module` varchar(40) NOT NULL,
  `cfgkey` varchar(40) NOT NULL,
  `cfgval` varchar(40) NOT NULL,
  `cfgtype` varchar(40) NOT NULL,
  `cfgopts` text NOT NULL,
  `write_datetime` datetime NOT NULL,
  `mod_datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `quickbooks_log`
--

CREATE TABLE `quickbooks_log` (
  `quickbooks_log_id` int(10) UNSIGNED NOT NULL,
  `quickbooks_ticket_id` int(10) UNSIGNED DEFAULT NULL,
  `batch` int(10) UNSIGNED NOT NULL,
  `msg` text NOT NULL,
  `log_datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `quickbooks_oauth`
--

CREATE TABLE `quickbooks_oauth` (
  `quickbooks_oauth_id` int(10) UNSIGNED NOT NULL,
  `app_username` varchar(255) NOT NULL,
  `app_tenant` varchar(255) NOT NULL,
  `oauth_request_token` varchar(255) DEFAULT NULL,
  `oauth_request_token_secret` varchar(255) DEFAULT NULL,
  `oauth_access_token` varchar(255) DEFAULT NULL,
  `oauth_access_token_secret` varchar(255) DEFAULT NULL,
  `qb_realm` varchar(32) DEFAULT NULL,
  `qb_flavor` varchar(12) DEFAULT NULL,
  `qb_user` varchar(64) DEFAULT NULL,
  `request_datetime` datetime NOT NULL,
  `access_datetime` datetime DEFAULT NULL,
  `touch_datetime` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `quickbooks_oauth`
--

INSERT INTO `quickbooks_oauth` (`quickbooks_oauth_id`, `app_username`, `app_tenant`, `oauth_request_token`, `oauth_request_token_secret`, `oauth_access_token`, `oauth_access_token_secret`, `qb_realm`, `qb_flavor`, `qb_user`, `request_datetime`, `access_datetime`, `touch_datetime`) VALUES
(3, 'DO_NOT_CHANGE_ME', '12345', 'qyprd3uJ3j1bFyqtJXV17pUGC9Sd3Gl76iV4j4EpG5zvTMMt', '7hNbjgvdingpZWiUQDaN0sm3vHRqMoG1PKXwqnfq', 'B3tFq40toINRF1Thfic7IPRe5e72kHZcVDOVN5tJOAzWmQZliRHcHfY2g/J3r7Q2YIxKe7ywOKz/ENgoPjd3+4Xw+CDendSvKa0nc/PMjzttX4ZUM8InwMrNhGMhVNkLxGHjt86JkPKW7vkiOZBJ2tdKAXNEfuoNNIbSXPF9eYvqD1TNhHndgusB49prqQ==', 'hj3xPeNypkUnXxWQ3XZ3OmQ8XkWMlwBBQSy0pzUQv2KIUBp7sv04eVq6KKYQht5Dr2O5O/G4/G4w0ET/ej2iQit3kW++qEhswKiD6bkBAVrlR3m4RoRceeM8HCE5/dEsYYI+W/0cgYyrvGobsbv7AWoyLnd5BO2/7Swu4IXbs6jsoc4dlZI=', '193514493219874', 'QBO', NULL, '2017-03-28 06:17:00', '2017-03-28 06:17:25', '2017-03-31 19:18:46');

-- --------------------------------------------------------

--
-- Table structure for table `quickbooks_queue`
--

CREATE TABLE `quickbooks_queue` (
  `quickbooks_queue_id` int(10) UNSIGNED NOT NULL,
  `quickbooks_ticket_id` int(10) UNSIGNED DEFAULT NULL,
  `qb_username` varchar(40) NOT NULL,
  `qb_action` varchar(32) NOT NULL,
  `ident` varchar(40) NOT NULL,
  `extra` text,
  `qbxml` text,
  `priority` int(10) UNSIGNED DEFAULT '0',
  `qb_status` char(1) NOT NULL,
  `msg` text,
  `enqueue_datetime` datetime NOT NULL,
  `dequeue_datetime` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `quickbooks_recur`
--

CREATE TABLE `quickbooks_recur` (
  `quickbooks_recur_id` int(10) UNSIGNED NOT NULL,
  `qb_username` varchar(40) NOT NULL,
  `qb_action` varchar(32) NOT NULL,
  `ident` varchar(40) NOT NULL,
  `extra` text,
  `qbxml` text,
  `priority` int(10) UNSIGNED DEFAULT '0',
  `run_every` int(10) UNSIGNED NOT NULL,
  `recur_lasttime` int(10) UNSIGNED NOT NULL,
  `enqueue_datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `quickbooks_ticket`
--

CREATE TABLE `quickbooks_ticket` (
  `quickbooks_ticket_id` int(10) UNSIGNED NOT NULL,
  `qb_username` varchar(40) NOT NULL,
  `ticket` char(36) NOT NULL,
  `processed` int(10) UNSIGNED DEFAULT '0',
  `lasterror_num` varchar(32) DEFAULT NULL,
  `lasterror_msg` varchar(255) DEFAULT NULL,
  `ipaddr` char(15) NOT NULL,
  `write_datetime` datetime NOT NULL,
  `touch_datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `quickbooks_user`
--

CREATE TABLE `quickbooks_user` (
  `qb_username` varchar(40) NOT NULL,
  `qb_password` varchar(255) NOT NULL,
  `qb_company_file` varchar(255) DEFAULT NULL,
  `qbwc_wait_before_next_update` int(10) UNSIGNED DEFAULT '0',
  `qbwc_min_run_every_n_seconds` int(10) UNSIGNED DEFAULT '0',
  `status` char(1) NOT NULL,
  `write_datetime` datetime NOT NULL,
  `touch_datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `table_bundle`
--

CREATE TABLE `table_bundle` (
  `bundle_id` varchar(10) NOT NULL DEFAULT '',
  `bundle_name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `table_bundle`
--

INSERT INTO `table_bundle` (`bundle_id`, `bundle_name`) VALUES
('1', 'test'),
('2', 'test2'),
('3', 'test3'),
('4', 'test4');

-- --------------------------------------------------------

--
-- Table structure for table `table_challan`
--

CREATE TABLE `table_challan` (
  `challan_id` int(6) NOT NULL,
  `pickup_loc_id` varchar(10) DEFAULT NULL,
  `delivery_loc_id` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `table_challan`
--

INSERT INTO `table_challan` (`challan_id`, `pickup_loc_id`, `delivery_loc_id`) VALUES
(1, '1', '2'),
(1490726463, '1', '2'),
(1490726523, '1', '2'),
(1490726524, '1', '2'),
(1490726525, '1', '2'),
(1490726526, '2', '1'),
(1490726527, '1', '2');

-- --------------------------------------------------------

--
-- Table structure for table `table_challan_category`
--

CREATE TABLE `table_challan_category` (
  `challan_category_id` varchar(10) NOT NULL DEFAULT '',
  `name` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `table_challan_category`
--

INSERT INTO `table_challan_category` (`challan_category_id`, `name`) VALUES
('1', 'Delivery Challan'),
('2', 'Pickup Challan'),
('3', 'Sales Challan');

-- --------------------------------------------------------

--
-- Table structure for table `table_item`
--

CREATE TABLE `table_item` (
  `name` varchar(100) DEFAULT NULL,
  `item_code` varchar(10) NOT NULL DEFAULT '',
  `category` char(10) DEFAULT NULL,
  `length` varchar(10) DEFAULT NULL,
  `breadth` varchar(10) DEFAULT NULL,
  `height` varchar(10) DEFAULT NULL,
  `weight` varchar(10) DEFAULT NULL,
  `material` varchar(20) DEFAULT NULL,
  `value` bigint(8) DEFAULT NULL,
  `selling_value` varchar(9) DEFAULT NULL,
  `HSN` bigint(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `table_item`
--

INSERT INTO `table_item` (`name`, `item_code`, `category`, `length`, `breadth`, `height`, `weight`, `material`, `value`, `selling_value`, `HSN`) VALUES
('Fibre Glass Ladder', '1', NULL, '50', '1', '2', '20', 'Fibre Glass', 450, '250', 0),
('Aluminium Scaffold', '2', NULL, '12', '12', '12', '12', 'Aluminium', 300, '150', 0),
('Fire Extinguisher', '3', NULL, '10', '10', '10', '20', 'CO2', 200, '200', 0),
('desc', '5', '1', '1', '1', '1', '1', NULL, 1, '1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `table_item_category`
--

CREATE TABLE `table_item_category` (
  `category_id` varchar(10) NOT NULL DEFAULT '',
  `category_name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `table_item_category`
--

INSERT INTO `table_item_category` (`category_id`, `category_name`) VALUES
('1', 'Ladders'),
('2', 'Fire'),
('3', 'Ropes'),
('4', 'Wheel Barrows'),
('5', 'Scaffolds');

-- --------------------------------------------------------

--
-- Table structure for table `table_item_category_relation`
--

CREATE TABLE `table_item_category_relation` (
  `item_id` varchar(10) DEFAULT NULL,
  `category_id` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `table_item_category_relation`
--

INSERT INTO `table_item_category_relation` (`item_id`, `category_id`) VALUES
('1', '1'),
('2', '5'),
('3', '2');

-- --------------------------------------------------------

--
-- Table structure for table `table_location`
--

CREATE TABLE `table_location` (
  `location_id` varchar(10) NOT NULL DEFAULT '',
  `address` varchar(300) DEFAULT NULL,
  `state` char(15) DEFAULT NULL,
  `pincode` int(6) DEFAULT NULL,
  `name` varchar(30) DEFAULT NULL,
  `mobile` varchar(13) DEFAULT NULL,
  `alt_mobile` varchar(10) DEFAULT NULL,
  `email` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `table_location`
--

INSERT INTO `table_location` (`location_id`, `address`, `state`, `pincode`, `name`, `mobile`, `alt_mobile`, `email`) VALUES
('1', 'D-8, Gulmohar Park, New Delhi-110049', 'delhi', 110049, 'Vikas', '9650043051', '0', 'vikasmahato0@gmail.com'),
('2', 'Greater Noida', 'Uttar Pradesh', 452222, 'Vanjul Jain', '987654321', '0', 'vanjul@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `table_location_category`
--

CREATE TABLE `table_location_category` (
  `location_category_id` varchar(10) NOT NULL DEFAULT '',
  `name` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `table_location_category`
--

INSERT INTO `table_location_category` (`location_category_id`, `name`) VALUES
('1', 'Rental'),
('2', 'Warehose'),
('3', 'Sales'),
('4', 'Damaged'),
('5', 'Godown');

-- --------------------------------------------------------

--
-- Table structure for table `table_quotation`
--

CREATE TABLE `table_quotation` (
  `s_no` int(11) NOT NULL,
  `status` char(10) NOT NULL,
  `row_total` float(7,2) NOT NULL,
  `sub_total` float(7,2) NOT NULL,
  `freight` float(7,2) NOT NULL,
  `tax` float(7,2) NOT NULL,
  `swach_bharat` float(7,2) NOT NULL,
  `kkc` float(7,2) NOT NULL,
  `total` float(7,2) NOT NULL,
  `createdby` varchar(50) NOT NULL,
  `customer_id` int(5) NOT NULL,
  `customer_name` char(50) NOT NULL,
  `delivery_address` varchar(300) NOT NULL,
  `delivery_date` text,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `table_quotation`
--

INSERT INTO `table_quotation` (`s_no`, `status`, `row_total`, `sub_total`, `freight`, `tax`, `swach_bharat`, `kkc`, `total`, `createdby`, `customer_id`, `customer_name`, `delivery_address`, `delivery_date`, `timestamp`) VALUES
(1, 'Customer', 56.00, 66.00, 66.00, 66.00, 66.00, 66.00, 256.00, 'orders@gmail.com', 2, 'Vanjul Jain', 'Noida Sector 18, <br> Starbucks', '12/03/2016', '2017-04-03 10:04:34'),
(2, 'Customer', 2.00, 2.00, 2.00, 2.00, 2.00, 2.00, 2.00, 'orders@gmail.com', 1, 'Vikas Prasad Mahato', 'D-8, Gulmohar Park', '29/04/1935', '2017-04-03 10:09:11');

-- --------------------------------------------------------

--
-- Table structure for table `table_quotation_item`
--

CREATE TABLE `table_quotation_item` (
  `s_no` int(11) NOT NULL,
  `desc` varchar(100) DEFAULT NULL,
  `unit_price` int(6) DEFAULT NULL,
  `qty` int(5) DEFAULT NULL,
  `units` char(7) DEFAULT NULL,
  `duration` int(5) DEFAULT NULL,
  `tot` float(7,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `table_quotation_item`
--

INSERT INTO `table_quotation_item` (`s_no`, `desc`, `unit_price`, `qty`, `units`, `duration`, `tot`) VALUES
(1, 'Ladder', 2, 2, 'Days', 2, 2.00),
(2, 'Scaffolds', 12, 2, 'Days', 22, 212.00);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `username` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL,
  `name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `password`, `name`) VALUES
('dispatch@gmail.com', '123456', 'dispatch'),
('finance_account@gmail.com', '123456', ''),
('finance_credit@gmail.com', '123456', 'finance'),
('marketing@gmail.com', '123456', 'marketing'),
('orders@gmail.com', '123456', 'orders'),
('planning@gmail.com', '123456', 'planning'),
('vikas', '123456', ''),
('vikasmahato0@gmail.com', '123456', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bundle_item_relation`
--
ALTER TABLE `bundle_item_relation`
  ADD UNIQUE KEY `bundle_id` (`bundle_id`,`item_id`),
  ADD UNIQUE KEY `bundle_id_2` (`bundle_id`,`item_id`),
  ADD KEY `item_id` (`item_id`);

--
-- Indexes for table `challan_item_relation`
--
ALTER TABLE `challan_item_relation`
  ADD KEY `item_id` (`item_id`),
  ADD KEY `challan_id` (`challan_id`);

--
-- Indexes for table `location_category_relation`
--
ALTER TABLE `location_category_relation`
  ADD KEY `location_id` (`location_id`),
  ADD KEY `location_category_id` (`location_category_id`);

--
-- Indexes for table `location_item_relation`
--
ALTER TABLE `location_item_relation`
  ADD UNIQUE KEY `location_id` (`location_id`,`item_id`),
  ADD UNIQUE KEY `location_id_2` (`location_id`,`item_id`),
  ADD KEY `item_id` (`item_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `job_order` (`job_order`);

--
-- Indexes for table `quickbooks_config`
--
ALTER TABLE `quickbooks_config`
  ADD PRIMARY KEY (`quickbooks_config_id`);

--
-- Indexes for table `quickbooks_log`
--
ALTER TABLE `quickbooks_log`
  ADD PRIMARY KEY (`quickbooks_log_id`),
  ADD KEY `quickbooks_ticket_id` (`quickbooks_ticket_id`),
  ADD KEY `batch` (`batch`);

--
-- Indexes for table `quickbooks_oauth`
--
ALTER TABLE `quickbooks_oauth`
  ADD PRIMARY KEY (`quickbooks_oauth_id`);

--
-- Indexes for table `quickbooks_queue`
--
ALTER TABLE `quickbooks_queue`
  ADD PRIMARY KEY (`quickbooks_queue_id`),
  ADD KEY `quickbooks_ticket_id` (`quickbooks_ticket_id`),
  ADD KEY `priority` (`priority`),
  ADD KEY `qb_username` (`qb_username`,`qb_action`,`ident`,`qb_status`),
  ADD KEY `qb_status` (`qb_status`);

--
-- Indexes for table `quickbooks_recur`
--
ALTER TABLE `quickbooks_recur`
  ADD PRIMARY KEY (`quickbooks_recur_id`),
  ADD KEY `qb_username` (`qb_username`,`qb_action`,`ident`),
  ADD KEY `priority` (`priority`);

--
-- Indexes for table `quickbooks_ticket`
--
ALTER TABLE `quickbooks_ticket`
  ADD PRIMARY KEY (`quickbooks_ticket_id`),
  ADD KEY `ticket` (`ticket`);

--
-- Indexes for table `quickbooks_user`
--
ALTER TABLE `quickbooks_user`
  ADD PRIMARY KEY (`qb_username`);

--
-- Indexes for table `table_bundle`
--
ALTER TABLE `table_bundle`
  ADD PRIMARY KEY (`bundle_id`);

--
-- Indexes for table `table_challan`
--
ALTER TABLE `table_challan`
  ADD PRIMARY KEY (`challan_id`);

--
-- Indexes for table `table_challan_category`
--
ALTER TABLE `table_challan_category`
  ADD PRIMARY KEY (`challan_category_id`);

--
-- Indexes for table `table_item`
--
ALTER TABLE `table_item`
  ADD PRIMARY KEY (`item_code`);

--
-- Indexes for table `table_item_category`
--
ALTER TABLE `table_item_category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `table_item_category_relation`
--
ALTER TABLE `table_item_category_relation`
  ADD UNIQUE KEY `item_id` (`item_id`,`category_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `table_location`
--
ALTER TABLE `table_location`
  ADD PRIMARY KEY (`location_id`);

--
-- Indexes for table `table_location_category`
--
ALTER TABLE `table_location_category`
  ADD PRIMARY KEY (`location_category_id`);

--
-- Indexes for table `table_quotation`
--
ALTER TABLE `table_quotation`
  ADD PRIMARY KEY (`s_no`);

--
-- Indexes for table `table_quotation_item`
--
ALTER TABLE `table_quotation_item`
  ADD KEY `serial_no` (`s_no`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `quickbooks_config`
--
ALTER TABLE `quickbooks_config`
  MODIFY `quickbooks_config_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `quickbooks_log`
--
ALTER TABLE `quickbooks_log`
  MODIFY `quickbooks_log_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `quickbooks_oauth`
--
ALTER TABLE `quickbooks_oauth`
  MODIFY `quickbooks_oauth_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `quickbooks_queue`
--
ALTER TABLE `quickbooks_queue`
  MODIFY `quickbooks_queue_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `quickbooks_recur`
--
ALTER TABLE `quickbooks_recur`
  MODIFY `quickbooks_recur_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `quickbooks_ticket`
--
ALTER TABLE `quickbooks_ticket`
  MODIFY `quickbooks_ticket_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `table_challan`
--
ALTER TABLE `table_challan`
  MODIFY `challan_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1490726528;
--
-- AUTO_INCREMENT for table `table_quotation`
--
ALTER TABLE `table_quotation`
  MODIFY `s_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `bundle_item_relation`
--
ALTER TABLE `bundle_item_relation`
  ADD CONSTRAINT `bundle_item_relation_ibfk_1` FOREIGN KEY (`bundle_id`) REFERENCES `table_bundle` (`bundle_id`),
  ADD CONSTRAINT `bundle_item_relation_ibfk_2` FOREIGN KEY (`item_id`) REFERENCES `table_item` (`item_code`);

--
-- Constraints for table `challan_item_relation`
--
ALTER TABLE `challan_item_relation`
  ADD CONSTRAINT `challan_item_relation_ibfk_2` FOREIGN KEY (`item_id`) REFERENCES `table_item` (`item_code`),
  ADD CONSTRAINT `challan_item_relation_ibfk_3` FOREIGN KEY (`challan_id`) REFERENCES `table_challan` (`challan_id`);

--
-- Constraints for table `location_category_relation`
--
ALTER TABLE `location_category_relation`
  ADD CONSTRAINT `location_category_relation_ibfk_1` FOREIGN KEY (`location_id`) REFERENCES `table_location` (`location_id`),
  ADD CONSTRAINT `location_category_relation_ibfk_2` FOREIGN KEY (`location_category_id`) REFERENCES `table_location_category` (`location_category_id`);

--
-- Constraints for table `location_item_relation`
--
ALTER TABLE `location_item_relation`
  ADD CONSTRAINT `location_item_relation_ibfk_1` FOREIGN KEY (`location_id`) REFERENCES `table_location` (`location_id`),
  ADD CONSTRAINT `location_item_relation_ibfk_2` FOREIGN KEY (`item_id`) REFERENCES `table_item` (`item_code`);

--
-- Constraints for table `table_item_category_relation`
--
ALTER TABLE `table_item_category_relation`
  ADD CONSTRAINT `table_item_category_relation_ibfk_1` FOREIGN KEY (`item_id`) REFERENCES `table_item` (`item_code`),
  ADD CONSTRAINT `table_item_category_relation_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `table_item_category` (`category_id`);

--
-- Constraints for table `table_quotation_item`
--
ALTER TABLE `table_quotation_item`
  ADD CONSTRAINT `serial_no` FOREIGN KEY (`s_no`) REFERENCES `table_quotation` (`s_no`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
