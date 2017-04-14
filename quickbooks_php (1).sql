-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 13, 2017 at 10:28 PM
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
(1490726533, '2', '2', 1, 0),
(1490726533, '1', '2', 1, 0);

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
('1', '1', 43, 0, '0000-00-00'),
('1', '3', 15, 0, '0000-00-00'),
('2', '1', 99, 0, '0000-00-00'),
('2', '2', 99, 0, '0000-00-00'),
('2', '3', 100, 0, '0000-00-00'),
('1', '2', 1, 0, '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(3) NOT NULL,
  `customer_id` varchar(8) DEFAULT NULL,
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
(2, '{-4}', '2', 'uploads/1_a3ee136c41f8495f4c68ebb8fc349fee.jpg', 'uploads/2_a3ee136c41f8495f4c68ebb8fc349fee.jpg', 'uploads/3_a3ee136c41f8495f4c68ebb8fc349fee.jpg', 'uploads/4_a3ee136c41f8495f4c68ebb8fc349fee.jpg', 1, 'no description', NULL, '', NULL, NULL, ' D8 guljhgg', NULL, 'Diego Rodriguez', NULL, '13/04/2017', 'orders@gmail.com', '2017-04-13 17:45:04');

-- --------------------------------------------------------

--
-- Table structure for table `qb_cache_customer`
--

CREATE TABLE `qb_cache_customer` (
  `customer_id` varchar(8) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `customer_name` varchar(40) DEFAULT NULL,
  `billing_address` varchar(300) DEFAULT NULL,
  `mailing_address` varchar(300) NOT NULL,
  `credit_limit` float(8,2) DEFAULT NULL,
  `outstanding` float(7,2) NOT NULL DEFAULT '0.00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `qb_cache_customer`
--

INSERT INTO `qb_cache_customer` (`customer_id`, `customer_name`, `billing_address`, `mailing_address`, `credit_limit`, `outstanding`) VALUES
('{-3}', 'Cool Cars', '65 Ocean Dr.\n<br>\n<br>Half Moon Bay,  CA 94213\n<br>', 'D-8<br>Gulmohar Park<br>New Delh<br>110049', 290.00, 0.00),
('{-4}', 'Diego Rodriguez', '321 Channing\n<br>\n<br>Palo Alto,  CA 94303\n<br>', 'D-8<br>Gulmohar Park<br>New Delh<br>110049', 5000.00, 0.00),
('{-59}', 'DisplayName2792', '123 Main St\n<br>\n<br>Mountain View,  CA 94043\n<br>United States', 'D-8<br>Gulmohar Park<br>New Delh<br>110049', 0.00, 0.00),
('{-5}', 'Dukes Basketball Camp', '25 Court St.\n<br>\n<br>Tucson,  AZ 85719\n<br>', 'D-8<br>Gulmohar Park<br>New Delh<br>110049', 0.00, 0.00);

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
(3, 'DO_NOT_CHANGE_ME', '12345', 'qyprd3uJ3j1bFyqtJXV17pUGC9Sd3Gl76iV4j4EpG5zvTMMt', '7hNbjgvdingpZWiUQDaN0sm3vHRqMoG1PKXwqnfq', 'B3tFq40toINRF1Thfic7IPRe5e72kHZcVDOVN5tJOAzWmQZliRHcHfY2g/J3r7Q2YIxKe7ywOKz/ENgoPjd3+4Xw+CDendSvKa0nc/PMjzttX4ZUM8InwMrNhGMhVNkLxGHjt86JkPKW7vkiOZBJ2tdKAXNEfuoNNIbSXPF9eYvqD1TNhHndgusB49prqQ==', 'hj3xPeNypkUnXxWQ3XZ3OmQ8XkWMlwBBQSy0pzUQv2KIUBp7sv04eVq6KKYQht5Dr2O5O/G4/G4w0ET/ej2iQit3kW++qEhswKiD6bkBAVrlR3m4RoRceeM8HCE5/dEsYYI+W/0cgYyrvGobsbv7AWoyLnd5BO2/7Swu4IXbs6jsoc4dlZI=', '193514493219874', 'QBO', NULL, '2017-03-28 06:17:00', '2017-03-28 06:17:25', '2017-04-12 07:57:17');

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
(1490726533, '2', '1');

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
('Fibre Glass Ladder', '1', 'Ladder', '50', '1', '2', '20', 'Fibre Glass', 450, '250', 0),
('Aluminium Scaffold', '2', 'Scaffold', '12', '12', '12', '12', 'Aluminium', 300, '150', 0),
('Fire Extinguisher', '3', 'Fire', '10', '10', '10', '20', 'CO2', 200, '200', 0),
('desc', '5', 'Desc', '1', '1', '1', '1', NULL, 1, '1', 1);

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
  `customer_id` varchar(8) NOT NULL,
  `customer_name` char(50) NOT NULL,
  `delivery_address` varchar(300) NOT NULL,
  `delivery_date` text,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `type` char(7) NOT NULL,
  `objection` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `table_quotation`
--

INSERT INTO `table_quotation` (`s_no`, `status`, `row_total`, `sub_total`, `freight`, `tax`, `swach_bharat`, `kkc`, `total`, `createdby`, `customer_id`, `customer_name`, `delivery_address`, `delivery_date`, `timestamp`, `type`, `objection`) VALUES
(11, 'quot', 9900.00, 9925.00, 25.00, 1389.50, 49.63, 49.63, 11413.75, 'orders@gmail.com', '{-4}', 'Diego Rodriguez', 'D8 guljhgg', 'Array', '2017-04-12 16:10:15', 'Rental', 1),
(12, 'quot', 1050.00, 1075.00, 25.00, 150.50, 537.50, 537.50, 2300.50, 'orders@gmail.com', '{-4}', 'Diego Rodriguez', 'D-8 Gulmohar Park', 'Array', '2017-04-13 03:11:31', 'Rental', 1),
(13, 'quot', 1500.00, 1523.00, 23.00, 213.22, 761.50, 761.50, 3259.22, 'orders@gmail.com', '{-59}', 'DisplayName2792', 'D-8, Gulmohar Park', 'Array', '2017-04-13 07:29:19', 'Rental', 1),
(14, 'quot', 1050.00, 1150.00, 100.00, 161.00, 575.00, 575.00, 2461.00, 'orders@gmail.com', '{-3}', 'Cool Cars', 'D-8, Gulmohar Park', 'Array', '2017-04-13 07:36:30', 'Rental', 0),
(15, 'quot', 450.00, 473.00, 23.00, 66.22, 236.50, 236.50, 1012.22, 'orders@gmail.com', '{-3}', 'Cool Cars', 'D-8, gulmohar park', 'Array', '2017-04-13 15:06:27', 'Rentls', 0),
(16, 'quot', 750.00, 775.00, 25.00, 108.50, 387.50, 387.50, 1658.50, 'orders@gmail.com', '{-59}', 'DisplayName2792', 'D-8, gulmohar park', 'Array', '2017-04-13 15:10:58', 'Sales', 0);

-- --------------------------------------------------------

--
-- Table structure for table `table_quotation_item`
--

CREATE TABLE `table_quotation_item` (
  `s_no` int(11) NOT NULL,
  `type` char(7) NOT NULL,
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

INSERT INTO `table_quotation_item` (`s_no`, `type`, `desc`, `unit_price`, `qty`, `units`, `duration`, `tot`) VALUES
(8, '', 'Aluminium Scaffold', 300, 1, 'Days', 2, 600.00),
(8, '', 'Fire Extinguisher', 200, 1, '1', 2, 400.00),
(8, '', 'Fibre Glass Ladder', 450, 1, '1', 1, 450.00),
(9, '', 'Fibre Glass Ladder', 450, 1, 'Days', 2, 900.00),
(9, '', 'Aluminium Scaffold', 300, 1, '1', 3, 900.00),
(9, '', 'Fire Extinguisher', 200, 1, '1', 2, 400.00),
(10, '', 'Fibre Glass Ladder', 450, 1, 'Months', 3, 1350.00),
(10, '', 'Aluminium Scaffold', 300, 2, '1', 2, 1200.00),
(11, '', 'Fibre Glass Ladder', 450, 1, 'Days', 22, 9900.00),
(13, '', 'Fibre Glass Ladder', 450, 2, 'Days', 2, 900.00),
(13, '', 'Aluminium Scaffold', 300, 2, '1', 2, 600.00),
(14, 'Item', 'Aluminium Scaffold', 300, 2, 'Days', 2, 600.00),
(14, 'Bundle', 'Fibre Glass Ladder', 450, 1, '2', 1, 450.00),
(15, 'Item', 'Fibre Glass Ladder', 450, 1, 'Days', 3, 450.00),
(16, 'Item', 'Fibre Glass Ladder', 450, 1, NULL, NULL, 450.00),
(16, 'Item', 'Aluminium Scaffold', 300, 1, NULL, NULL, 300.00);

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
  ADD UNIQUE KEY `location_id_3` (`location_id`,`item_id`),
  ADD KEY `item_id` (`item_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `job_order` (`job_order`);

--
-- Indexes for table `qb_cache_customer`
--
ALTER TABLE `qb_cache_customer`
  ADD PRIMARY KEY (`customer_id`);

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
  ADD PRIMARY KEY (`s_no`),
  ADD KEY `customer_key` (`customer_id`);

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
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
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
  MODIFY `challan_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1490726534;
--
-- AUTO_INCREMENT for table `table_quotation`
--
ALTER TABLE `table_quotation`
  MODIFY `s_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
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
-- Constraints for table `table_quotation`
--
ALTER TABLE `table_quotation`
  ADD CONSTRAINT `customer_key` FOREIGN KEY (`customer_id`) REFERENCES `qb_cache_customer` (`customer_id`);

--
-- Constraints for table `table_quotation_item`
--
ALTER TABLE `table_quotation_item`
  ADD CONSTRAINT `serial_no` FOREIGN KEY (`s_no`) REFERENCES `table_quotation` (`s_no`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
