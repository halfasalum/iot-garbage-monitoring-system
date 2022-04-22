-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 22, 2022 at 02:58 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gms`
--

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `version` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`version`) VALUES
(20220416174301);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_companies`
--

CREATE TABLE `tbl_companies` (
  `company_id` int(11) NOT NULL,
  `company_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `company_phone` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `company_email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `company_address` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `company_created` date DEFAULT NULL,
  `company_status` int(11) DEFAULT 1,
  `payment_status` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_companies`
--

INSERT INTO `tbl_companies` (`company_id`, `company_name`, `company_phone`, `company_email`, `company_address`, `company_created`, `company_status`, `payment_status`) VALUES
(1, 'ROOT', '255656183285', 'halfa.salum@infominds.tech', 'KIMARA', '2021-02-10', 1, 0),
(16, 'ahbab', '255657183285', 'ahbabrasul@icloud.com', 'Dar es salaam', '2021-08-21', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_company_config`
--

CREATE TABLE `tbl_company_config` (
  `config_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `manual_loan_increment` tinyint(4) DEFAULT 0,
  `loan_increment` decimal(10,2) DEFAULT 0.00,
  `manual_loan_decrement` tinyint(4) DEFAULT 0,
  `loan_decrement` decimal(10,2) DEFAULT 0.00,
  `auto_startup_loan_calculation` tinyint(4) DEFAULT 1,
  `loan_penalty_after_due_date` tinyint(4) DEFAULT 0,
  `collection_type` int(1) DEFAULT 1 COMMENT '1 = daily, 2 = weekly',
  `collection_days` int(3) DEFAULT 26,
  `skip_weekend` tinyint(1) DEFAULT 1,
  `penalty_type` int(1) NOT NULL DEFAULT 1 COMMENT '1 = fixed amount, 2 = in %',
  `penalty_in_percent` int(3) DEFAULT 10,
  `penalty_fixed` decimal(11,2) DEFAULT 2000.00,
  `loan_interest` int(3) DEFAULT 30,
  `missed_days` int(3) DEFAULT 3,
  `startup_percent` int(3) DEFAULT 75,
  `loan_request_approval` tinyint(1) DEFAULT 1,
  `loan_submission_approval` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_company_config`
--

INSERT INTO `tbl_company_config` (`config_id`, `company_id`, `manual_loan_increment`, `loan_increment`, `manual_loan_decrement`, `loan_decrement`, `auto_startup_loan_calculation`, `loan_penalty_after_due_date`, `collection_type`, `collection_days`, `skip_weekend`, `penalty_type`, `penalty_in_percent`, `penalty_fixed`, `loan_interest`, `missed_days`, `startup_percent`, `loan_request_approval`, `loan_submission_approval`) VALUES
(1, 15, 0, '0.00', 0, '0.00', 1, 0, 1, 26, 1, 1, 10, '2000.00', 30, 3, 75, 1, 1),
(2, 16, 0, '50000.00', 0, '50000.00', 1, 0, 1, 26, 1, 2, 10, '2000.00', 30, 3, 75, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_company_service`
--

CREATE TABLE `tbl_company_service` (
  `company_service_id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL,
  `company_service_status` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_company_subscription`
--

CREATE TABLE `tbl_company_subscription` (
  `company_subscription_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `license_id` int(11) NOT NULL,
  `subscription_id` int(11) NOT NULL,
  `sms_offered` int(3) NOT NULL,
  `sms_used` int(3) DEFAULT 0,
  `users_offered` int(3) NOT NULL,
  `branch_offered` int(3) NOT NULL,
  `branch_used` int(3) DEFAULT 0,
  `users_used` int(3) DEFAULT 1,
  `zones_offered` int(3) NOT NULL,
  `zones_used` int(3) DEFAULT 0,
  `company_subscription_status` int(11) DEFAULT 1,
  `transaction_id` varchar(128) DEFAULT NULL,
  `reference_id` varchar(128) DEFAULT NULL,
  `customers_offered` int(11) NOT NULL,
  `customer_used` int(11) DEFAULT 0,
  `sub_start` date NOT NULL,
  `sub_end` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_company_subscription`
--

INSERT INTO `tbl_company_subscription` (`company_subscription_id`, `company_id`, `license_id`, `subscription_id`, `sms_offered`, `sms_used`, `users_offered`, `branch_offered`, `branch_used`, `users_used`, `zones_offered`, `zones_used`, `company_subscription_status`, `transaction_id`, `reference_id`, `customers_offered`, `customer_used`, `sub_start`, `sub_end`) VALUES
(3, 4, 4, 1, 100, 0, 5, 1, 0, 1, 2, 0, 1, NULL, NULL, 50, 0, '2020-09-16', '2020-10-16'),
(4, 5, 5, 1, 100, 0, 5, 1, 0, 1, 2, 0, 1, NULL, NULL, 50, 0, '2020-09-16', '2020-10-16'),
(5, 1, 1, 1, 100, 0, 5, 1, 0, 1, 2, 0, 1, NULL, NULL, 50, 0, '2021-02-10', '2021-03-10'),
(6, 3, 3, 1, 100, 0, 5, 1, 0, 2, 2, 0, 1, NULL, NULL, 50, 0, '2021-02-10', '2021-03-10'),
(7, 4, 4, 1, 100, 0, 5, 1, 0, 1, 2, 0, 1, NULL, NULL, 50, 0, '2021-02-10', '2021-03-10'),
(8, 5, 5, 1, 100, 0, 5, 1, 0, 1, 2, 0, 1, NULL, NULL, 50, 0, '2021-02-10', '2021-03-10'),
(9, 6, 6, 1, 100, 0, 5, 1, 0, 1, 2, 0, 1, '43987bd4-c9dd-4fa8-8a75-687a3a730b2d', '1115', 50, 0, '2021-02-10', '2021-03-10'),
(10, 7, 7, 1, 100, 0, 5, 1, 0, 1, 2, 0, 1, 'beb5cc07-c62d-4ce3-a58f-69605d2f5084', '8811', 50, 0, '2021-02-10', '2021-03-10'),
(11, 9, 9, 1, 100, 0, 5, 1, 1, 2, 2, 2, 1, 'ee7f885c-2906-46e9-8b62-608e65a2c8d7', '2755', 50, 0, '2021-02-10', '2021-03-10'),
(12, 10, 10, 1, 100, 0, 5, 1, 0, 1, 2, 0, 1, NULL, NULL, 50, 0, '2021-02-10', '2021-03-10'),
(13, 11, 11, 1, 100, 0, 5, 1, 0, 1, 2, 0, 1, NULL, NULL, 50, 0, '2021-02-10', '2021-03-10'),
(14, 12, 12, 1, 100, 0, 5, 1, 0, 1, 2, 0, 1, NULL, NULL, 50, 0, '2021-02-10', '2021-03-10'),
(15, 13, 13, 1, 100, 0, 5, 1, 1, 3, 2, 1, 1, NULL, NULL, 50, 0, '2021-03-14', '2021-04-14'),
(16, 15, 15, 1, 100, 0, 5, 1, 0, 1, 2, 0, 1, NULL, NULL, 50, 0, '2021-08-21', '2021-09-21'),
(17, 16, 16, 1, 100, 0, 5, 1, 0, 1, 2, 0, 1, NULL, NULL, 50, 0, '2021-08-21', '2021-09-21');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_daily_config`
--

CREATE TABLE `tbl_daily_config` (
  `dconfig_id` int(11) NOT NULL,
  `collection_days` int(3) DEFAULT 26,
  `skip_weekend` tinyint(4) DEFAULT 1,
  `company_id` int(11) DEFAULT NULL,
  `penalty_value` int(11) DEFAULT 0,
  `penalty_in_amount` tinyint(4) DEFAULT 1,
  `loan_interest` int(3) DEFAULT 30,
  `penaltyType` int(1) DEFAULT 1 COMMENT '1 for fixed price | 2 for percentage'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_daily_config`
--

INSERT INTO `tbl_daily_config` (`dconfig_id`, `collection_days`, `skip_weekend`, `company_id`, `penalty_value`, `penalty_in_amount`, `loan_interest`, `penaltyType`) VALUES
(1, 26, 1, 15, 0, 1, 30, 1),
(2, 26, 1, 16, 0, 1, 30, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_errors`
--

CREATE TABLE `tbl_errors` (
  `error_id` int(11) NOT NULL,
  `error_code` int(11) NOT NULL,
  `error_description` text NOT NULL,
  `error_function` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_module`
--

CREATE TABLE `tbl_module` (
  `module_id` int(11) NOT NULL,
  `module_icon` text COLLATE utf8_unicode_ci NOT NULL,
  `module_class` text COLLATE utf8_unicode_ci NOT NULL,
  `module_desc` text COLLATE utf8_unicode_ci NOT NULL,
  `module_tooltip` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `module_access_key` int(11) DEFAULT 0,
  `module_status` int(11) NOT NULL DEFAULT 1,
  `is_global` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_module`
--

INSERT INTO `tbl_module` (`module_id`, `module_icon`, `module_class`, `module_desc`, `module_tooltip`, `module_access_key`, `module_status`, `is_global`) VALUES
(1, 'si-settings', 'Manage', 'Management', 'View users, register new users and application role, assign shops and roles to users and others', 0, 1, 1),
(4, 'si-wrench', 'Modules', 'Modules', 'View modules and controls, register new control and controls', 0, 1, 0),
(6, 'si-magnifier', 'Audit', 'Audit', 'View recently actions performed by users', 0, 1, 1),
(11, 'si-basket-loaded', 'Stock', 'Stock', 'Add new product, product categories, product unit, product brand, register shops, store and others...', 0, 4, 1),
(12, 'si-basket', 'Sales', 'Sales', 'Add new sales, view sales, receive due payments..', 0, 4, 1),
(13, 'si-wallet', 'Expense', 'Expenses', 'Add new expense, view expenses', 0, 4, 1),
(14, 'si-users', 'Customer', 'Customers & Groups', 'Add new customer, view customers and manage customers groups in your company', 0, 4, 1),
(15, 'si-folder-alt', 'Reports', 'Reports', 'View sales report, products reports, expenses report and so many', 0, 4, 1),
(16, 'si-badge', 'Subscription', 'Subscriptions', 'View subscription, Add new subscription', 55, 4, 1),
(17, 'si-grid', 'Branch', 'Branches & Zones', 'Create, Edit and manage branches and ones in your company', 0, 4, 1),
(18, 'si-wallet', 'Loans', 'Loans & Returns', 'Manage customer loans and returns, alter loans settings and much more...', 0, 4, 1),
(19, 'si-refresh', 'Services', 'Services', 'Access system services', 0, 1, 1),
(20, 'si-notebook', 'Company', 'Companies', 'Manage system companies', 0, 4, 0),
(21, 'si-trash', 'Trash', 'Trash', 'Manage all system trashes', 0, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_module_control`
--

CREATE TABLE `tbl_module_control` (
  `control_id` int(11) NOT NULL,
  `control_name` text COLLATE utf8_unicode_ci NOT NULL,
  `control_status` int(11) NOT NULL DEFAULT 1,
  `module_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_module_control`
--

INSERT INTO `tbl_module_control` (`control_id`, `control_name`, `control_status`, `module_id`) VALUES
(1, 'View Roles', 1, 1),
(2, 'Add new Role', 1, 1),
(3, 'Edit Roles', 1, 1),
(4, 'Delete Roles', 1, 1),
(5, 'View Modules', 1, 4),
(6, 'Edit Module', 1, 4),
(7, 'Delete Module', 1, 4),
(8, 'Add Module', 1, 4),
(9, 'Membership Report', 1, 5),
(10, 'Membeship Request', 1, 5),
(12, 'View Audit Report', 1, 6),
(13, 'Download Audit Report', 1, 6),
(14, 'Run Audt Report', 1, 6),
(15, 'View Modules Control', 1, 4),
(16, 'Add new Module', 1, 4),
(17, 'Add new Module Control', 1, 4),
(18, 'Edit Module Control', 1, 4),
(19, 'Delete Module Control', 1, 4),
(20, 'View Contribution Request', 1, 9),
(21, 'Approve Contribution Request', 1, 9),
(22, 'Refuse Contribution Request', 1, 9),
(23, 'Collect Contributions', 1, 9),
(24, 'View Invoices', 1, 8),
(25, 'Print Invoices', 1, 8),
(26, 'View Expenses', 1, 8),
(27, 'Print Expenses', 1, 8),
(28, 'Invoice Deposits', 1, 8),
(29, 'Expense Deposits', 1, 8),
(30, 'View Financial Reports', 1, 8),
(31, 'Print Financial Reports', 1, 8),
(32, 'view result', 1, 10),
(33, 'View Loan Request', 1, 7),
(34, 'Approve Loan Request', 1, 7),
(35, 'Reject Loan Request', 1, 7),
(36, 'View Loan Repost', 1, 7),
(37, 'Print Loan Reports', 1, 7),
(38, 'Access Loan Repayments', 1, 7),
(39, 'Access Loan Settings', 1, 7),
(40, 'Add Product', 1, 11),
(41, 'Edit Product', 1, 11),
(42, 'Register Product Category', 1, 11),
(43, 'Edit Product Category', 1, 11),
(44, 'Register Product Brand', 1, 11),
(45, 'Edit Product Brand', 1, 11),
(46, 'Register Customer', 1, 14),
(47, 'Edit Customer Bio Data', 1, 14),
(48, 'Delete Customer', 1, 14),
(49, 'Register Expense', 1, 13),
(50, 'Edit Expense', 1, 13),
(51, 'Delete Expense', 1, 13),
(52, 'Add Sale', 1, 12),
(53, 'View Reports', 1, 15),
(54, 'Add subscription', 1, 16),
(55, 'Access Subscription', 1, 16),
(56, 'Access Reports', 1, 15),
(57, 'Access sales', 1, 12),
(58, 'Access Customers', 1, 14),
(59, 'Access Shops', 1, 17),
(60, 'Access Stores', 1, 18),
(61, 'Add User', 1, 1),
(62, 'Edit User', 1, 1),
(63, 'Assign Shop', 1, 1),
(64, 'Delete User', 1, 1),
(65, 'Assign User Role', 1, 1),
(66, 'Delete Product Category', 1, 11),
(67, 'Register Unit', 1, 11),
(68, 'Edit Product Unit', 1, 11),
(69, 'Delete Product Unit', 1, 11),
(70, 'Delete Product', 1, 12),
(71, 'Register Product  Brand', 1, 11),
(72, 'Delete Product Brand', 1, 11),
(73, 'Register Shop', 1, 11),
(74, 'Edit Shop', 1, 11),
(75, 'Delete Shop', 1, 11),
(76, 'Add Store', 1, 11),
(77, 'Edit Store', 1, 11),
(78, 'Delete Store', 1, 11),
(79, 'Edit Sale', 1, 12),
(80, 'View Sale', 1, 12),
(81, 'Reverce Sale', 1, 12),
(82, 'Add Expense', 1, 13),
(83, 'View Customer Report', 1, 14),
(84, 'View Inventory In-Hand Report', 1, 15),
(85, 'Low Stock Report', 1, 15),
(86, 'Sales Summary Report', 1, 15),
(87, 'Sales Per Customer Report', 1, 15),
(88, 'Sales Per Product Report', 1, 15),
(89, 'Expense Details Report', 1, 15),
(90, 'Receive Balance', 1, 12),
(91, 'Access Branches and zones', 1, 17),
(92, 'Access Loan', 1, 18),
(93, 'Intermediate Loan Request Approval', 1, 18),
(94, 'Intermediate Loan Return Approval', 1, 18),
(95, 'Final Loan Request Approval', 1, 18),
(96, 'Final Loan Return Approval', 1, 18),
(97, 'Request Loan', 1, 18),
(98, 'Higher Approval', 1, 18),
(99, 'Access Services', 1, 19),
(100, 'Access Companies', 1, 20),
(101, 'Manage Return Schedules', 1, 18),
(102, 'Access Officer Report', 1, 15),
(103, 'Access Manager Reports', 1, 15),
(104, 'Access Managent Reports', 1, 15),
(105, 'Access Trashes', 1, 21);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_role`
--

CREATE TABLE `tbl_role` (
  `role_id` int(11) NOT NULL,
  `role_name` text COLLATE utf8_unicode_ci NOT NULL,
  `is_default` tinyint(1) DEFAULT 0,
  `role_status` int(11) NOT NULL DEFAULT 1,
  `is_global` tinyint(1) DEFAULT 0,
  `role_company` int(11) DEFAULT 0,
  `system_reserved` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_role`
--

INSERT INTO `tbl_role` (`role_id`, `role_name`, `is_default`, `role_status`, `is_global`, `role_company`, `system_reserved`) VALUES
(1, 'Super Admin(SA)', 0, 1, 0, 1, 0),
(2, 'Admin', 0, 1, 1, 1, 0),
(3, 'Manager', 0, 1, 0, 16, 0),
(4, 'Branch Manager', 0, 1, 0, 16, 0),
(5, 'Loan Officer', 0, 1, 0, 16, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_roles`
--

CREATE TABLE `tbl_roles` (
  `role_id` int(11) NOT NULL,
  `role_name` varchar(128) NOT NULL,
  `role_controller` varchar(128) NOT NULL,
  `role_status` int(11) DEFAULT 1,
  `role_created` datetime NOT NULL,
  `role_nav` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_roles`
--

INSERT INTO `tbl_roles` (`role_id`, `role_name`, `role_controller`, `role_status`, `role_created`, `role_nav`) VALUES
(1, 'ROOT', 'Root', 1, '2020-09-16 15:42:14', 'root'),
(2, 'Support', 'Support', 1, '2020-09-16 15:39:10', 'support'),
(3, 'Accountant', 'Accountant', 1, '2020-09-16 15:39:10', 'accountant'),
(4, 'Manager', 'Manager', 1, '2020-09-16 15:40:43', 'manager'),
(5, 'Supervisor', 'Supervisor', 1, '2020-09-16 15:40:43', 'supervisor'),
(6, 'Loan Officer', 'Officer', 1, '2020-09-16 15:40:43', 'officer');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_role_control`
--

CREATE TABLE `tbl_role_control` (
  `role_control_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `control_id` int(11) NOT NULL,
  `role_control_status` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_role_control`
--

INSERT INTO `tbl_role_control` (`role_control_id`, `role_id`, `control_id`, `role_control_status`) VALUES
(1, 1, 1, 4),
(2, 1, 2, 4),
(3, 1, 3, 4),
(4, 1, 4, 4),
(5, 1, 61, 4),
(6, 1, 62, 4),
(7, 1, 63, 4),
(8, 1, 64, 4),
(9, 1, 65, 4),
(10, 1, 54, 4),
(11, 1, 55, 4),
(12, 1, 53, 4),
(13, 1, 56, 4),
(14, 1, 84, 4),
(15, 1, 85, 4),
(16, 1, 86, 4),
(17, 1, 87, 4),
(18, 1, 88, 4),
(19, 1, 89, 4),
(20, 1, 12, 4),
(21, 1, 13, 4),
(22, 1, 14, 4),
(23, 1, 5, 4),
(24, 1, 6, 4),
(25, 1, 7, 4),
(26, 1, 8, 4),
(27, 1, 15, 4),
(28, 1, 16, 4),
(29, 1, 17, 4),
(30, 1, 18, 4),
(31, 1, 19, 4),
(32, 1, 1, 4),
(33, 1, 2, 4),
(34, 1, 3, 4),
(35, 1, 4, 4),
(36, 1, 61, 4),
(37, 1, 62, 4),
(38, 1, 63, 4),
(39, 1, 64, 4),
(40, 1, 65, 4),
(41, 1, 60, 4),
(42, 1, 0, 4),
(43, 1, 59, 4),
(44, 1, 0, 4),
(45, 1, 54, 4),
(46, 1, 55, 4),
(47, 1, 53, 4),
(48, 1, 56, 4),
(49, 1, 84, 4),
(50, 1, 85, 4),
(51, 1, 86, 4),
(52, 1, 87, 4),
(53, 1, 88, 4),
(54, 1, 89, 4),
(55, 1, 46, 4),
(56, 1, 47, 4),
(57, 1, 48, 4),
(58, 1, 58, 4),
(59, 1, 83, 4),
(60, 1, 49, 4),
(61, 1, 50, 4),
(62, 1, 51, 4),
(63, 1, 82, 4),
(64, 1, 12, 4),
(65, 1, 13, 4),
(66, 1, 14, 4),
(67, 1, 5, 4),
(68, 1, 6, 4),
(69, 1, 7, 4),
(70, 1, 8, 4),
(71, 1, 15, 4),
(72, 1, 16, 4),
(73, 1, 17, 4),
(74, 1, 18, 4),
(75, 1, 19, 4),
(76, 1, 1, 4),
(77, 1, 2, 4),
(78, 1, 3, 4),
(79, 1, 4, 4),
(80, 1, 61, 4),
(81, 1, 62, 4),
(82, 1, 63, 4),
(83, 1, 64, 4),
(84, 1, 65, 4),
(85, 2, 12, 4),
(86, 2, 13, 4),
(87, 2, 14, 4),
(88, 2, 1, 4),
(89, 2, 2, 4),
(90, 2, 3, 4),
(91, 2, 4, 4),
(92, 2, 61, 4),
(93, 2, 62, 4),
(94, 2, 63, 4),
(95, 2, 64, 4),
(96, 2, 65, 4),
(97, 3, 60, 4),
(98, 3, 0, 4),
(99, 3, 59, 4),
(100, 3, 0, 4),
(101, 3, 53, 4),
(102, 3, 56, 4),
(103, 3, 84, 4),
(104, 3, 85, 4),
(105, 3, 86, 4),
(106, 3, 87, 4),
(107, 3, 88, 4),
(108, 3, 89, 4),
(109, 3, 46, 4),
(110, 3, 47, 4),
(111, 3, 48, 4),
(112, 3, 58, 4),
(113, 3, 83, 4),
(114, 3, 49, 4),
(115, 3, 50, 4),
(116, 3, 51, 4),
(117, 3, 82, 4),
(118, 3, 97, 4),
(119, 3, 92, 4),
(120, 3, 59, 4),
(121, 3, 89, 4),
(122, 3, 88, 4),
(123, 3, 87, 4),
(124, 3, 86, 4),
(125, 3, 85, 4),
(126, 3, 84, 4),
(127, 3, 56, 4),
(128, 3, 53, 4),
(129, 3, 83, 4),
(130, 3, 58, 4),
(131, 3, 48, 4),
(132, 3, 47, 4),
(133, 3, 46, 4),
(134, 3, 82, 4),
(135, 3, 51, 4),
(136, 3, 50, 4),
(137, 3, 49, 4),
(138, 4, 94, 4),
(139, 4, 93, 4),
(140, 4, 92, 4),
(141, 4, 91, 4),
(142, 4, 58, 4),
(143, 5, 97, 4),
(144, 5, 92, 4),
(145, 5, 91, 4),
(146, 5, 58, 4),
(147, 5, 46, 4),
(148, 4, 97, 4),
(149, 4, 94, 4),
(150, 4, 93, 4),
(151, 4, 92, 4),
(152, 4, 91, 4),
(153, 4, 58, 4),
(154, 4, 94, 4),
(155, 4, 93, 4),
(156, 4, 92, 4),
(157, 4, 91, 4),
(158, 4, 58, 4),
(159, 4, 97, 4),
(160, 4, 94, 4),
(161, 4, 93, 4),
(162, 4, 92, 4),
(163, 4, 91, 4),
(164, 4, 58, 4),
(165, 4, 94, 4),
(166, 4, 93, 4),
(167, 4, 92, 4),
(168, 4, 91, 4),
(169, 4, 58, 4),
(170, 4, 97, 4),
(171, 4, 94, 4),
(172, 4, 93, 4),
(173, 4, 92, 4),
(174, 4, 91, 4),
(175, 4, 58, 4),
(176, 3, 97, 4),
(177, 3, 96, 4),
(178, 3, 95, 4),
(179, 3, 92, 4),
(180, 3, 59, 4),
(181, 3, 89, 4),
(182, 3, 88, 4),
(183, 3, 87, 4),
(184, 3, 86, 4),
(185, 3, 85, 4),
(186, 3, 84, 4),
(187, 3, 56, 4),
(188, 3, 53, 4),
(189, 3, 83, 4),
(190, 3, 58, 4),
(191, 3, 48, 4),
(192, 3, 47, 4),
(193, 3, 46, 4),
(194, 3, 82, 4),
(195, 3, 51, 4),
(196, 3, 50, 4),
(197, 3, 49, 4),
(198, 4, 97, 4),
(199, 4, 96, 4),
(200, 4, 95, 4),
(201, 4, 94, 4),
(202, 4, 93, 4),
(203, 4, 92, 4),
(204, 4, 91, 4),
(205, 4, 58, 4),
(206, 4, 97, 4),
(207, 4, 94, 4),
(208, 4, 93, 4),
(209, 4, 92, 4),
(210, 4, 91, 4),
(211, 4, 58, 4),
(212, 3, 98, 4),
(213, 3, 96, 4),
(214, 3, 95, 4),
(215, 3, 92, 4),
(216, 3, 59, 4),
(217, 3, 89, 4),
(218, 3, 88, 4),
(219, 3, 87, 4),
(220, 3, 86, 4),
(221, 3, 85, 4),
(222, 3, 84, 4),
(223, 3, 56, 4),
(224, 3, 53, 4),
(225, 3, 83, 4),
(226, 3, 58, 4),
(227, 3, 48, 4),
(228, 3, 47, 4),
(229, 3, 46, 4),
(230, 3, 82, 4),
(231, 3, 51, 4),
(232, 3, 50, 4),
(233, 3, 49, 4),
(234, 3, 98, 4),
(235, 3, 96, 4),
(236, 3, 95, 4),
(237, 3, 92, 4),
(238, 3, 59, 4),
(239, 3, 89, 4),
(240, 3, 88, 4),
(241, 3, 87, 4),
(242, 3, 86, 4),
(243, 3, 85, 4),
(244, 3, 84, 4),
(245, 3, 56, 4),
(246, 3, 53, 4),
(247, 3, 83, 4),
(248, 3, 58, 4),
(249, 3, 48, 4),
(250, 3, 47, 4),
(251, 3, 46, 4),
(252, 3, 82, 4),
(253, 3, 51, 4),
(254, 3, 50, 4),
(255, 3, 49, 4),
(256, 3, 65, 4),
(257, 3, 64, 4),
(258, 3, 63, 4),
(259, 3, 62, 4),
(260, 3, 61, 4),
(261, 3, 4, 4),
(262, 3, 3, 4),
(263, 3, 2, 4),
(264, 3, 1, 4),
(265, 1, 99, 4),
(266, 1, 60, 4),
(267, 1, 59, 4),
(268, 1, 55, 4),
(269, 1, 54, 4),
(270, 1, 89, 4),
(271, 1, 88, 4),
(272, 1, 87, 4),
(273, 1, 86, 4),
(274, 1, 85, 4),
(275, 1, 84, 4),
(276, 1, 56, 4),
(277, 1, 53, 4),
(278, 1, 83, 4),
(279, 1, 58, 4),
(280, 1, 48, 4),
(281, 1, 47, 4),
(282, 1, 46, 4),
(283, 1, 82, 4),
(284, 1, 51, 4),
(285, 1, 50, 4),
(286, 1, 49, 4),
(287, 1, 14, 4),
(288, 1, 13, 4),
(289, 1, 12, 4),
(290, 1, 19, 4),
(291, 1, 18, 4),
(292, 1, 17, 4),
(293, 1, 16, 4),
(294, 1, 15, 4),
(295, 1, 8, 4),
(296, 1, 7, 4),
(297, 1, 6, 4),
(298, 1, 5, 4),
(299, 1, 65, 4),
(300, 1, 64, 4),
(301, 1, 63, 4),
(302, 1, 62, 4),
(303, 1, 61, 4),
(304, 1, 4, 4),
(305, 1, 3, 4),
(306, 1, 2, 4),
(307, 1, 1, 4),
(308, 3, 99, 4),
(309, 3, 98, 4),
(310, 3, 96, 4),
(311, 3, 95, 4),
(312, 3, 92, 4),
(313, 3, 59, 4),
(314, 3, 89, 4),
(315, 3, 88, 4),
(316, 3, 87, 4),
(317, 3, 86, 4),
(318, 3, 85, 4),
(319, 3, 84, 4),
(320, 3, 56, 4),
(321, 3, 53, 4),
(322, 3, 83, 4),
(323, 3, 58, 4),
(324, 3, 48, 4),
(325, 3, 47, 4),
(326, 3, 46, 4),
(327, 3, 82, 4),
(328, 3, 51, 4),
(329, 3, 50, 4),
(330, 3, 49, 4),
(331, 3, 65, 4),
(332, 3, 64, 4),
(333, 3, 63, 4),
(334, 3, 62, 4),
(335, 3, 61, 4),
(336, 3, 4, 4),
(337, 3, 3, 4),
(338, 3, 2, 4),
(339, 3, 1, 4),
(340, 5, 97, 4),
(341, 5, 92, 4),
(342, 5, 58, 4),
(343, 5, 46, 4),
(344, 1, 100, 4),
(345, 1, 99, 4),
(346, 1, 60, 4),
(347, 1, 59, 4),
(348, 1, 55, 4),
(349, 1, 54, 4),
(350, 1, 89, 4),
(351, 1, 88, 4),
(352, 1, 87, 4),
(353, 1, 86, 4),
(354, 1, 85, 4),
(355, 1, 84, 4),
(356, 1, 56, 4),
(357, 1, 53, 4),
(358, 1, 83, 4),
(359, 1, 58, 4),
(360, 1, 48, 4),
(361, 1, 47, 4),
(362, 1, 46, 4),
(363, 1, 82, 4),
(364, 1, 51, 4),
(365, 1, 50, 4),
(366, 1, 49, 4),
(367, 1, 14, 4),
(368, 1, 13, 4),
(369, 1, 12, 4),
(370, 1, 19, 4),
(371, 1, 18, 4),
(372, 1, 17, 4),
(373, 1, 16, 4),
(374, 1, 15, 4),
(375, 1, 8, 4),
(376, 1, 7, 4),
(377, 1, 6, 4),
(378, 1, 5, 4),
(379, 1, 65, 4),
(380, 1, 64, 4),
(381, 1, 63, 4),
(382, 1, 62, 4),
(383, 1, 61, 4),
(384, 1, 4, 4),
(385, 1, 3, 4),
(386, 1, 2, 4),
(387, 1, 1, 4),
(388, 4, 101, 4),
(389, 4, 97, 4),
(390, 4, 94, 4),
(391, 4, 93, 4),
(392, 4, 92, 4),
(393, 4, 91, 4),
(394, 4, 58, 4),
(395, 4, 97, 1),
(396, 4, 94, 1),
(397, 4, 93, 1),
(398, 4, 92, 1),
(399, 4, 91, 1),
(400, 4, 58, 1),
(401, 3, 99, 1),
(402, 3, 101, 1),
(403, 3, 98, 1),
(404, 3, 96, 1),
(405, 3, 95, 1),
(406, 3, 92, 1),
(407, 3, 59, 1),
(408, 3, 89, 1),
(409, 3, 88, 1),
(410, 3, 87, 1),
(411, 3, 86, 1),
(412, 3, 85, 1),
(413, 3, 84, 1),
(414, 3, 56, 1),
(415, 3, 53, 1),
(416, 3, 83, 1),
(417, 3, 58, 1),
(418, 3, 48, 1),
(419, 3, 47, 1),
(420, 3, 46, 1),
(421, 3, 82, 1),
(422, 3, 51, 1),
(423, 3, 50, 1),
(424, 3, 49, 1),
(425, 3, 65, 1),
(426, 3, 64, 1),
(427, 3, 63, 1),
(428, 3, 62, 1),
(429, 3, 61, 1),
(430, 3, 4, 1),
(431, 3, 3, 1),
(432, 3, 2, 1),
(433, 3, 1, 1),
(434, 5, 97, 1),
(435, 5, 92, 1),
(436, 5, 102, 1),
(437, 5, 58, 1),
(438, 5, 46, 1),
(439, 1, 105, 1),
(440, 1, 99, 1),
(441, 1, 14, 1),
(442, 1, 13, 1),
(443, 1, 12, 1),
(444, 1, 19, 1),
(445, 1, 18, 1),
(446, 1, 17, 1),
(447, 1, 16, 1),
(448, 1, 15, 1),
(449, 1, 8, 1),
(450, 1, 7, 1),
(451, 1, 6, 1),
(452, 1, 5, 1),
(453, 1, 65, 1),
(454, 1, 64, 1),
(455, 1, 63, 1),
(456, 1, 62, 1),
(457, 1, 61, 1),
(458, 1, 4, 1),
(459, 1, 3, 1),
(460, 1, 2, 1),
(461, 1, 1, 1),
(462, 2, 105, 1),
(463, 2, 14, 1),
(464, 2, 13, 1),
(465, 2, 12, 1),
(466, 2, 65, 1),
(467, 2, 64, 1),
(468, 2, 63, 1),
(469, 2, 62, 1),
(470, 2, 61, 1),
(471, 2, 4, 1),
(472, 2, 3, 1),
(473, 2, 2, 1),
(474, 2, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_services`
--

CREATE TABLE `tbl_services` (
  `service_id` int(11) NOT NULL,
  `service_company` int(11) DEFAULT 1,
  `service_last_run` datetime DEFAULT current_timestamp(),
  `service_type` int(11) DEFAULT NULL,
  `service_run` time NOT NULL,
  `service_status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_services`
--

INSERT INTO `tbl_services` (`service_id`, `service_company`, `service_last_run`, `service_type`, `service_run`, `service_status`) VALUES
(1, 1, '2022-04-03 03:00:12', 1, '03:00:00', 1),
(2, 16, '2022-04-02 12:20:04', 2, '12:20:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_service_type`
--

CREATE TABLE `tbl_service_type` (
  `type_id` int(11) NOT NULL,
  `type_name` varchar(255) NOT NULL,
  `type_url` varchar(255) NOT NULL,
  `isGlobal` tinyint(1) DEFAULT 1,
  `type_status` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_service_type`
--

INSERT INTO `tbl_service_type` (`type_id`, `type_name`, `type_url`, `isGlobal`, `type_status`) VALUES
(1, 'Application Backup', 'BackupDatabase', 0, 1),
(2, 'Daily Collection', 'dailyCollection', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_settings`
--

CREATE TABLE `tbl_settings` (
  `settingId` int(11) NOT NULL,
  `smtpHost` text NOT NULL,
  `smtpPort` int(11) NOT NULL,
  `smtpUser` varchar(256) NOT NULL,
  `smtpPass` text NOT NULL,
  `loanIncrement` decimal(65,2) DEFAULT 50000.00,
  `loanDecrement` decimal(65,2) DEFAULT 50000.00,
  `allowManualInput` tinyint(1) DEFAULT 0,
  `maxLoan` decimal(65,2) DEFAULT 200000.00,
  `interest` int(2) DEFAULT 30,
  `scheduleDays` int(2) DEFAULT 28,
  `penaltyDays` int(3) DEFAULT 3,
  `dayPenalty` decimal(65,2) DEFAULT 2000.00,
  `infoEmail` text NOT NULL,
  `collectionType` int(11) DEFAULT 1,
  `skipWeekEnd` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_settings`
--

INSERT INTO `tbl_settings` (`settingId`, `smtpHost`, `smtpPort`, `smtpUser`, `smtpPass`, `loanIncrement`, `loanDecrement`, `allowManualInput`, `maxLoan`, `interest`, `scheduleDays`, `penaltyDays`, `dayPenalty`, `infoEmail`, `collectionType`, `skipWeekEnd`) VALUES
(1, 'https://mail.ahbab.co.tz', 465, 'info@ahbab.co.tz', 'info@2021', '50000.00', '50000.00', 0, '200000.00', 20, 26, 3, '2000.00', 'ahbabrasul@icloud.com', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_status`
--

CREATE TABLE `tbl_status` (
  `status_id` int(11) NOT NULL,
  `status_name` varchar(45) NOT NULL,
  `status_created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_status`
--

INSERT INTO `tbl_status` (`status_id`, `status_name`, `status_created`) VALUES
(1, 'Active', '2020-07-18 14:11:04'),
(2, 'In active', '0000-00-00 00:00:00'),
(3, 'Blocked', '0000-00-00 00:00:00'),
(4, 'Deleted', '0000-00-00 00:00:00'),
(5, 'Expired', '0000-00-00 00:00:00'),
(6, 'Complete', '0000-00-00 00:00:00'),
(7, 'In-Complete', '0000-00-00 00:00:00'),
(8, 'Pending', '0000-00-00 00:00:00'),
(9, 'Returned', '0000-00-00 00:00:00'),
(10, 'Not returned', '0000-00-00 00:00:00'),
(11, 'Submitted', '0000-00-00 00:00:00'),
(12, 'Approved', '0000-00-00 00:00:00'),
(13, 'Rejected', '2022-01-25 19:23:23');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_trash`
--

CREATE TABLE `tbl_trash` (
  `device_id` int(11) UNSIGNED NOT NULL,
  `device_location` varchar(255) NOT NULL,
  `device_lat` varchar(2555) NOT NULL,
  `device_lon` varchar(2555) NOT NULL,
  `device_status` varchar(2555) NOT NULL DEFAULT '1',
  `device_number` varchar(255) NOT NULL,
  `device_state` int(3) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_trash`
--

INSERT INTO `tbl_trash` (`device_id`, `device_location`, `device_lat`, `device_lon`, `device_status`, `device_number`, `device_state`) VALUES
(1, 'Kimba A', '123.67', '2324.79', '1', '1234', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `last_login` datetime DEFAULT NULL,
  `user_status` int(11) DEFAULT 1,
  `user_company` int(11) NOT NULL,
  `is_online` tinyint(4) DEFAULT 0,
  `user_fullname` varchar(255) DEFAULT NULL,
  `user_role` int(11) DEFAULT NULL,
  `user_phone` varchar(15) DEFAULT NULL,
  `user_email` varchar(128) DEFAULT NULL,
  `user_image` varchar(128) DEFAULT 'avata.jpg',
  `user_branch` int(11) DEFAULT NULL,
  `user_zone` int(11) DEFAULT NULL,
  `user_created` date DEFAULT NULL,
  `pass_token` varchar(255) DEFAULT NULL,
  `token_inserted` datetime DEFAULT NULL,
  `managerial` tinyint(1) DEFAULT 0,
  `intro` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`user_id`, `username`, `password`, `last_login`, `user_status`, `user_company`, `is_online`, `user_fullname`, `user_role`, `user_phone`, `user_email`, `user_image`, `user_branch`, `user_zone`, `user_created`, `pass_token`, `token_inserted`, `managerial`, `intro`) VALUES
(1, 'sa', '$2y$10$GBiHXrffUwJauk20TPgcPOiPhKSBPv.TQQJyKJiehpo7bJFi9TGxu', '2022-04-16 17:53:49', 1, 1, 0, 'Halfa Salum', 1, '2', 'zemburetheson@gmail.com', 'avata.jpg', 1, 1, NULL, NULL, NULL, 1, 1),
(9, '57uZjmw6', '$2y$10$PyvSinEWuzN49usHdSUSaec7G607Sh6/5et9JAXeGCZ6sSh1L5POC', '2021-02-10 08:55:26', 4, 1, 0, 'Halfa Salum', 4, NULL, NULL, 'avata.jpg', 1, 1, NULL, NULL, NULL, 0, 1),
(10, 'fEIjgQqp', '$2y$10$L3qKIlBiXl/JMJxCWeveseBw1dYW8T8tkuwPn82g48iq6PKZ58Y9C', '2021-03-14 00:44:31', 4, 3, 0, 'Halfa Salum', 4, NULL, NULL, 'avata.jpg', 1, 1, NULL, NULL, NULL, 0, 1),
(11, 'AyphmwZ5', '$2y$10$byaRRWkOCXj62LYN2jjoAe7/Fn1HDsUz0wylYhrTtii4qlDOcBwPu', '2021-02-10 11:36:53', 4, 4, 0, 'Halfa Salum', 4, NULL, NULL, 'avata.jpg', 1, 1, NULL, NULL, NULL, 0, 1),
(12, 'RrE9xXzW', '$2y$10$zkNY8C/tnimhWwPkdgtpaurS3O5Lmy.F3ZEkQrnoIPFl0qOMXEzk6', '2021-02-10 11:58:32', 4, 5, 0, 'Halfa Salum', 4, NULL, NULL, 'avata.jpg', 1, 1, NULL, NULL, NULL, 0, 1),
(13, 'PqGQar8b', '$2y$10$VM3zGldV0FJxsC8ObG4YjOBgcBdMTVRLp9VaF/ilycWuHPy/3ar9.', '2021-02-10 12:05:55', 4, 6, 0, 'Halfa Salum', 4, NULL, NULL, 'avata.jpg', 1, 1, NULL, NULL, NULL, 0, 1),
(14, 'GO9jQApg', '$2y$10$pgMFxmAJorcrsJQvhfUacO7f3H6h1SEqHDZw4/KWZVpjVCOFBIG6q', '2021-02-10 12:09:48', 4, 7, 0, 'Halfa Salum', 4, NULL, NULL, 'avata.jpg', 1, 1, NULL, NULL, NULL, 0, 1),
(15, 'TJgNLnw3', '$2y$10$E1xog3wOeiojmXQGpB246.CwF8CwA.2O3863cYWjwd4EhpOXdtUBW', '2021-02-10 12:24:58', 4, 9, 0, 'Halfa Salum', 4, NULL, NULL, 'avata.jpg', 1, 1, NULL, NULL, NULL, 0, 1),
(16, 'vFZnoSRj', '$2y$10$KguOKsDLxbITWpE.eWZ1Ueq4bKrHwMCUfLt/U2Dm1XS9VoKnIqOZW', '2021-02-10 12:25:20', 4, 10, 0, 'Halfa Salum', 4, NULL, NULL, 'avata.jpg', 1, 1, NULL, NULL, NULL, 0, 1),
(17, 'zvtTayLp', '$2y$10$jjLw5mqMYPbep1logXSdyeA71oSn.oRri6G3P9Dbxs0DLOllOctxy', '2021-02-10 12:26:32', 4, 11, 0, 'Halfa Salum', 4, NULL, NULL, 'avata.jpg', 1, 1, NULL, NULL, NULL, 0, 1),
(18, 'uIpfzP6C', '$2y$10$CnIfysR3aiL7Z1y2kkON6O0sEH6kKguoOrz5GPPSyuc8Q7fxHY3/O', '2021-02-10 12:28:31', 4, 12, 0, 'Halfa Salum', 4, NULL, NULL, 'avata.jpg', 1, 1, NULL, NULL, NULL, 0, 1),
(19, 'Bm0v5Mk4', '$2y$10$.8Gs3deHs5yaPcYiL2iQH.KQC140UDu2MtV.3AD9Q.iLwTNCXQ2cG', '2021-03-14 00:44:13', 4, 9, 0, 'officer', 5, '255657183286', 'officer@infominds.tech', 'avata.jpg', 11, 6, '2021-02-10', NULL, NULL, 0, 1),
(20, 'JhogFcMD', '$2y$10$OpcBzwQoKE33YNvXh8kdr.GT4j5q6RAFYZDcj1GIoK6aOWoo4xq2O', '2021-03-14 00:44:44', 4, 3, 0, 'officer', 6, '255557158724', 'zemburetheson@gmail.com', 'avata.jpg', 10, 2, '2021-02-12', '961293', '2021-06-13 18:22:10', 0, 1),
(21, 'hashawa_admin', '$2y$10$IDsXd/Tusnxml0kPO3AvEeOaxSJYZDJGdTt5MFacfcGEeYyDGqM1O', '2021-03-14 16:41:15', 4, 13, 0, 'Halfa Salum', 4, NULL, NULL, 'avata.jpg', 1, 1, NULL, NULL, NULL, 0, 1),
(22, 'hashawa_supervisor', '$2y$10$prfWCm.M1RBRU1faBXC9E.vmXsWkv10b42j/5rcvoUEbq8qVGnJ.2', '2021-03-20 01:04:59', 4, 13, 0, 'Hashawa_supervisor', 5, '255557158724', 'head@infominds.tech', 'avata.jpg', 12, 1, '2021-03-14', NULL, NULL, 0, 1),
(23, 'hashawa_officer', '$2y$10$5.OWIDH1J2XW7PEZkyf8j.6k5Lme4V3aFHXjrjGC4Uf.Yi8ZhM.i2', '2021-03-14 01:20:58', 4, 13, 0, 'hashaawa_officer', 6, '255658162060', 'supervisor@infominds.tech', 'avata.jpg', 12, 7, '2021-03-14', NULL, NULL, 0, 1),
(25, 'ahbabrasul', '$2y$10$2/WWSKNRdeCEspQM4r/96OSgQT.XyDYyWTFU4d9Ub6MKIfgBBttpi', '2022-04-02 13:27:15', 1, 16, 0, 'Admin', NULL, '255657183285', 'zemburetheson@gmail.com', 'avata.jpg', NULL, NULL, NULL, '604031', '2022-03-23 09:54:45', 0, 1),
(26, 'manager', '$2y$10$jhlaH85hdBvhOszKThKTKOo6GRqzMpiumrcqo4dwnHpUYXvkPWX8W', '2022-03-31 22:58:33', 1, 16, 0, 'Manager', NULL, '255657183285', 'zemburetheson@gmail.com', 'avata.jpg', NULL, NULL, NULL, NULL, NULL, 0, 1),
(27, 'officer', '$2y$10$VETpLSaVlrQTsT5OgV0JsuBsE2sIB7r58Jsu/lidWOxZRnot5wo1K', '2022-03-31 22:57:49', 1, 16, 0, 'Officer', NULL, '255657183285', 'zemburetheson@gmail.com', 'avata.jpg', NULL, NULL, NULL, NULL, NULL, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users_logs`
--

CREATE TABLE `tbl_users_logs` (
  `log_id` int(11) NOT NULL,
  `log_action` varchar(45) NOT NULL,
  `log_ip` varchar(45) NOT NULL,
  `log_description` text NOT NULL,
  `log_user` int(11) NOT NULL,
  `log_company` int(11) DEFAULT NULL,
  `log_branch` int(11) DEFAULT NULL,
  `log_zone` int(11) DEFAULT NULL,
  `log_time` datetime NOT NULL,
  `log_status` int(11) NOT NULL DEFAULT 1,
  `log_browser` varchar(128) NOT NULL,
  `log_platform` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_users_logs`
--

INSERT INTO `tbl_users_logs` (`log_id`, `log_action`, `log_ip`, `log_description`, `log_user`, `log_company`, `log_branch`, `log_zone`, `log_time`, `log_status`, `log_browser`, `log_platform`) VALUES
(1, 'CREATE', '41.222.181.74', 'ROOT has create Hashawa Credit Company', 1, 5, 1, 1, '2020-09-16 08:31:25', 1, 'Firefox - 74.0', 'Windows 10'),
(2, 'CREATE', '41.222.181.74', 'ROOT has create daily configuration for Hashawa Credit Company', 1, 5, 1, 1, '2020-09-16 08:31:25', 1, 'Firefox - 74.0', 'Windows 10'),
(3, 'CREATE', '41.222.181.74', 'ROOT has create general company configuration for Hashawa Credit Company', 1, 5, 1, 1, '2020-09-16 08:31:25', 1, 'Firefox - 74.0', 'Windows 10'),
(4, 'ASSIGN', '41.222.181.74', 'ROOT has assign subscription to Hashawa Credit Company', 1, 5, 1, 1, '2020-09-16 08:31:25', 1, 'Firefox - 74.0', 'Windows 10'),
(5, 'CREATE', '41.222.181.74', 'ROOT has create manager account for Hashawa Credit Company', 1, 5, 1, 1, '2020-09-16 08:31:25', 1, 'Firefox - 74.0', 'Windows 10'),
(6, 'CREATE', '41.59.198.111', 'Halfa Salum has create account for Sabrina Salum Abdallah', 5, 5, 0, 0, '2020-09-17 05:56:03', 1, 'Firefox - 74.0', 'Windows 10'),
(7, 'CREATE', '41.59.198.111', 'Halfa Salum has create account for Pantaleo Massawe', 5, 5, 0, 0, '2020-09-17 06:08:45', 1, 'Firefox - 74.0', 'Windows 10'),
(8, 'UPDATE', '41.59.198.111', 'Halfa Salum has update bio data{username and password}  of  LvTw8mpi account', 5, 5, 0, 0, '2020-09-18 03:18:36', 1, 'Firefox - 74.0', 'Windows 10'),
(9, 'UPDATE', '41.59.198.111', 'Halfa Salum has update bio data{username and password}  of  FazHj345 account', 5, 5, 0, 0, '2020-09-18 03:31:13', 1, 'Firefox - 74.0', 'Windows 10'),
(10, 'UPDATE', '41.59.198.111', 'Halfa Salum has update bio data{password}  of  ahbabrasul account', 5, 5, 0, 0, '2020-09-18 03:33:31', 1, 'Firefox - 74.0', 'Windows 10'),
(11, 'UPDATE', '41.59.198.111', 'Halfa Salum has update bio data{password}  of  wisegirl123 account', 5, 5, 0, 0, '2020-09-18 03:44:09', 1, 'Firefox - 74.0', 'Windows 10'),
(12, 'UPDATE', '41.59.198.111', 'Halfa Salum has update bio data{username and password}  of  u5a8oZEb account', 5, 5, 0, 0, '2020-09-18 03:47:20', 1, 'Firefox - 74.0', 'Windows 10'),
(13, 'UPDATE', '41.222.180.51', 'Halfa Salum has update bio data{password}  of  Halfa Salum account', 5, 5, 0, 0, '2020-09-19 07:32:10', 1, 'Firefox - 74.0', 'Windows 10'),
(14, 'UPDATE', '41.59.198.111', 'Halfa Salum has update customer bio data with reference number4', 5, 5, 0, 0, '2020-10-09 01:02:57', 1, 'Firefox - 74.0', 'Windows 10'),
(15, 'UPDATE', '41.222.181.66', 'Halfa Salum has update bio data{password}  of  Sabrina Salum Abdallah account', 5, 5, 0, 0, '2020-10-09 08:15:15', 1, 'Firefox - 74.0', 'Windows 10'),
(16, 'REGISTER', '41.222.181.144', 'Sabrina Salum Abdallah  has process new loan', 7, 5, 0, 0, '2020-10-11 01:05:12', 1, 'Firefox - 74.0', 'Windows 10'),
(17, 'REGISTER', '41.222.181.144', 'Sabrina Salum Abdallah  has process new loan', 7, 5, 0, 0, '2020-10-11 01:15:20', 1, 'Firefox - 74.0', 'Windows 10'),
(18, 'REGISTER', '41.222.181.144', 'Sabrina Salum Abdallah  has process new loan', 7, 5, 0, 0, '2020-10-11 01:29:52', 1, 'Firefox - 74.0', 'Windows 10'),
(19, 'REGISTER', '41.222.181.144', 'Sabrina Salum Abdallah  has process new loan', 7, 5, 0, 0, '2020-10-11 01:38:47', 1, 'Firefox - 74.0', 'Windows 10'),
(20, 'REGISTER', '41.222.181.144', 'Sabrina Salum Abdallah  has process new loan', 7, 5, 0, 0, '2020-10-11 02:19:23', 1, 'Firefox - 74.0', 'Windows 10'),
(21, 'REGISTER', '41.222.181.144', 'Sabrina Salum Abdallah has register new customer with reference number6', 7, 5, 0, 0, '2020-10-11 07:52:41', 1, 'Firefox - 74.0', 'Windows 10'),
(22, 'REGISTER', '197.250.230.236', 'Pantaleo Massawe  has process new loan', 8, 5, 0, 0, '2020-10-14 09:08:32', 1, 'Firefox - 74.0', 'Windows 10'),
(23, 'REGISTER', '197.250.230.236', 'Pantaleo Massawe  has process new loan', 8, 5, 0, 0, '2020-10-14 09:12:43', 1, 'Firefox - 74.0', 'Windows 10'),
(24, 'CREATE', '41.222.181.183', 'ROOT has create INFOMINDS', 1, 1, 1, 1, '2021-02-10 08:55:26', 1, 'Firefox - 81.0', 'Linux'),
(25, 'CREATE', '41.222.181.183', 'ROOT has create daily configuration for INFOMINDS', 1, 1, 1, 1, '2021-02-10 08:55:26', 1, 'Firefox - 81.0', 'Linux'),
(26, 'CREATE', '41.222.181.183', 'ROOT has create general company configuration for INFOMINDS', 1, 1, 1, 1, '2021-02-10 08:55:26', 1, 'Firefox - 81.0', 'Linux'),
(27, 'ASSIGN', '41.222.181.183', 'ROOT has assign subscription to INFOMINDS', 1, 1, 1, 1, '2021-02-10 08:55:26', 1, 'Firefox - 81.0', 'Linux'),
(28, 'CREATE', '41.222.181.183', 'ROOT has create manager account for INFOMINDS', 1, 1, 1, 1, '2021-02-10 08:55:26', 1, 'Firefox - 81.0', 'Linux'),
(29, 'CREATE', '41.222.181.183', 'ROOT has create INFOMINDS', 1, 3, 1, 1, '2021-02-10 09:13:07', 1, 'Firefox - 81.0', 'Linux'),
(30, 'CREATE', '41.222.181.183', 'ROOT has create daily configuration for INFOMINDS', 1, 3, 1, 1, '2021-02-10 09:13:07', 1, 'Firefox - 81.0', 'Linux'),
(31, 'CREATE', '41.222.181.183', 'ROOT has create general company configuration for INFOMINDS', 1, 3, 1, 1, '2021-02-10 09:13:07', 1, 'Firefox - 81.0', 'Linux'),
(32, 'ASSIGN', '41.222.181.183', 'ROOT has assign subscription to INFOMINDS', 1, 3, 1, 1, '2021-02-10 09:13:07', 1, 'Firefox - 81.0', 'Linux'),
(33, 'CREATE', '41.222.181.183', 'ROOT has create manager account for INFOMINDS', 1, 3, 1, 1, '2021-02-10 09:13:07', 1, 'Firefox - 81.0', 'Linux'),
(34, 'CREATE', '41.222.181.183', 'ROOT has create xyz', 1, 4, 1, 1, '2021-02-10 11:36:53', 1, 'Chrome - 88.0.4324.150', 'Linux'),
(35, 'CREATE', '41.222.181.183', 'ROOT has create daily configuration for xyz', 1, 4, 1, 1, '2021-02-10 11:36:53', 1, 'Chrome - 88.0.4324.150', 'Linux'),
(36, 'CREATE', '41.222.181.183', 'ROOT has create general company configuration for xyz', 1, 4, 1, 1, '2021-02-10 11:36:53', 1, 'Chrome - 88.0.4324.150', 'Linux'),
(37, 'ASSIGN', '41.222.181.183', 'ROOT has assign subscription to xyz', 1, 4, 1, 1, '2021-02-10 11:36:53', 1, 'Chrome - 88.0.4324.150', 'Linux'),
(38, 'CREATE', '41.222.181.183', 'ROOT has create manager account for xyz', 1, 4, 1, 1, '2021-02-10 11:36:53', 1, 'Chrome - 88.0.4324.150', 'Linux'),
(39, 'CREATE', '41.222.181.183', 'ROOT has create xyzv', 1, 5, 1, 1, '2021-02-10 11:58:32', 1, 'Chrome - 88.0.4324.150', 'Linux'),
(40, 'CREATE', '41.222.181.183', 'ROOT has create daily configuration for xyzv', 1, 5, 1, 1, '2021-02-10 11:58:32', 1, 'Chrome - 88.0.4324.150', 'Linux'),
(41, 'CREATE', '41.222.181.183', 'ROOT has create general company configuration for xyzv', 1, 5, 1, 1, '2021-02-10 11:58:32', 1, 'Chrome - 88.0.4324.150', 'Linux'),
(42, 'ASSIGN', '41.222.181.183', 'ROOT has assign subscription to xyzv', 1, 5, 1, 1, '2021-02-10 11:58:32', 1, 'Chrome - 88.0.4324.150', 'Linux'),
(43, 'CREATE', '41.222.181.183', 'ROOT has create manager account for xyzv', 1, 5, 1, 1, '2021-02-10 11:58:32', 1, 'Chrome - 88.0.4324.150', 'Linux'),
(44, 'CREATE', '41.222.181.183', 'ROOT has create xyzk', 1, 6, 1, 1, '2021-02-10 12:05:55', 1, 'Chrome - 88.0.4324.150', 'Linux'),
(45, 'CREATE', '41.222.181.183', 'ROOT has create daily configuration for xyzk', 1, 6, 1, 1, '2021-02-10 12:05:55', 1, 'Chrome - 88.0.4324.150', 'Linux'),
(46, 'CREATE', '41.222.181.183', 'ROOT has create general company configuration for xyzk', 1, 6, 1, 1, '2021-02-10 12:05:55', 1, 'Chrome - 88.0.4324.150', 'Linux'),
(47, 'ASSIGN', '41.222.181.183', 'ROOT has assign subscription to xyzk', 1, 6, 1, 1, '2021-02-10 12:05:55', 1, 'Chrome - 88.0.4324.150', 'Linux'),
(48, 'CREATE', '41.222.181.183', 'ROOT has create manager account for xyzk', 1, 6, 1, 1, '2021-02-10 12:05:55', 1, 'Chrome - 88.0.4324.150', 'Linux'),
(49, 'CREATE', '41.222.181.183', 'ROOT has create xyzkh', 1, 7, 1, 1, '2021-02-10 12:09:48', 1, 'Chrome - 88.0.4324.150', 'Linux'),
(50, 'CREATE', '41.222.181.183', 'ROOT has create daily configuration for xyzkh', 1, 7, 1, 1, '2021-02-10 12:09:48', 1, 'Chrome - 88.0.4324.150', 'Linux'),
(51, 'CREATE', '41.222.181.183', 'ROOT has create general company configuration for xyzkh', 1, 7, 1, 1, '2021-02-10 12:09:48', 1, 'Chrome - 88.0.4324.150', 'Linux'),
(52, 'ASSIGN', '41.222.181.183', 'ROOT has assign subscription to xyzkh', 1, 7, 1, 1, '2021-02-10 12:09:48', 1, 'Chrome - 88.0.4324.150', 'Linux'),
(53, 'CREATE', '41.222.181.183', 'ROOT has create manager account for xyzkh', 1, 7, 1, 1, '2021-02-10 12:09:48', 1, 'Chrome - 88.0.4324.150', 'Linux'),
(54, 'CREATE', '41.222.181.183', 'ROOT has create xyzkl', 1, 9, 1, 1, '2021-02-10 12:15:25', 1, 'Chrome - 88.0.4324.150', 'Linux'),
(55, 'CREATE', '41.222.181.183', 'ROOT has create daily configuration for xyzkl', 1, 9, 1, 1, '2021-02-10 12:15:25', 1, 'Chrome - 88.0.4324.150', 'Linux'),
(56, 'CREATE', '41.222.181.183', 'ROOT has create general company configuration for xyzkl', 1, 9, 1, 1, '2021-02-10 12:15:25', 1, 'Chrome - 88.0.4324.150', 'Linux'),
(57, 'ASSIGN', '41.222.181.183', 'ROOT has assign subscription to xyzkl', 1, 9, 1, 1, '2021-02-10 12:15:25', 1, 'Chrome - 88.0.4324.150', 'Linux'),
(58, 'CREATE', '41.222.181.183', 'ROOT has create manager account for xyzkl', 1, 9, 1, 1, '2021-02-10 12:15:25', 1, 'Chrome - 88.0.4324.150', 'Linux'),
(59, 'CREATE', '41.222.181.183', 'ROOT has create xyzkv', 1, 10, 1, 1, '2021-02-10 12:25:20', 1, 'Chrome - 88.0.4324.150', 'Linux'),
(60, 'CREATE', '41.222.181.183', 'ROOT has create daily configuration for xyzkv', 1, 10, 1, 1, '2021-02-10 12:25:20', 1, 'Chrome - 88.0.4324.150', 'Linux'),
(61, 'CREATE', '41.222.181.183', 'ROOT has create general company configuration for xyzkv', 1, 10, 1, 1, '2021-02-10 12:25:20', 1, 'Chrome - 88.0.4324.150', 'Linux'),
(62, 'ASSIGN', '41.222.181.183', 'ROOT has assign subscription to xyzkv', 1, 10, 1, 1, '2021-02-10 12:25:20', 1, 'Chrome - 88.0.4324.150', 'Linux'),
(63, 'CREATE', '41.222.181.183', 'ROOT has create manager account for xyzkv', 1, 10, 1, 1, '2021-02-10 12:25:20', 1, 'Chrome - 88.0.4324.150', 'Linux'),
(64, 'CREATE', '41.222.181.183', 'ROOT has create xyzklh', 1, 11, 1, 1, '2021-02-10 12:26:32', 1, 'Chrome - 88.0.4324.150', 'Linux'),
(65, 'CREATE', '41.222.181.183', 'ROOT has create daily configuration for xyzklh', 1, 11, 1, 1, '2021-02-10 12:26:32', 1, 'Chrome - 88.0.4324.150', 'Linux'),
(66, 'CREATE', '41.222.181.183', 'ROOT has create general company configuration for xyzklh', 1, 11, 1, 1, '2021-02-10 12:26:32', 1, 'Chrome - 88.0.4324.150', 'Linux'),
(67, 'ASSIGN', '41.222.181.183', 'ROOT has assign subscription to xyzklh', 1, 11, 1, 1, '2021-02-10 12:26:32', 1, 'Chrome - 88.0.4324.150', 'Linux'),
(68, 'CREATE', '41.222.181.183', 'ROOT has create manager account for xyzklh', 1, 11, 1, 1, '2021-02-10 12:26:32', 1, 'Chrome - 88.0.4324.150', 'Linux'),
(69, 'CREATE', '41.222.181.183', 'ROOT has create xyzkvl', 1, 12, 1, 1, '2021-02-10 12:28:31', 1, 'Chrome - 88.0.4324.150', 'Linux'),
(70, 'CREATE', '41.222.181.183', 'ROOT has create daily configuration for xyzkvl', 1, 12, 1, 1, '2021-02-10 12:28:31', 1, 'Chrome - 88.0.4324.150', 'Linux'),
(71, 'CREATE', '41.222.181.183', 'ROOT has create general company configuration for xyzkvl', 1, 12, 1, 1, '2021-02-10 12:28:31', 1, 'Chrome - 88.0.4324.150', 'Linux'),
(72, 'ASSIGN', '41.222.181.183', 'ROOT has assign subscription to xyzkvl', 1, 12, 1, 1, '2021-02-10 12:28:31', 1, 'Chrome - 88.0.4324.150', 'Linux'),
(73, 'CREATE', '41.222.181.183', 'ROOT has create manager account for xyzkvl', 1, 12, 1, 1, '2021-02-10 12:28:31', 1, 'Chrome - 88.0.4324.150', 'Linux'),
(74, 'CREATE', '41.222.181.173', 'Halfa Salum has create account for officer', 15, 9, 0, 0, '2021-02-10 06:21:49', 1, 'Chrome - 88.0.4324.150', 'Linux'),
(75, 'REGISTER', '41.222.181.173', 'officer has register new customer with reference number1', 19, 9, 0, 0, '2021-02-10 06:32:12', 1, 'Firefox - 81.0', 'Linux'),
(76, 'CREATE', '41.59.198.111', 'Halfa Salum has create account for officer', 10, 3, 0, 0, '2021-02-12 12:59:27', 1, 'Firefox - 81.0', 'Linux'),
(77, 'REGISTER', '41.222.181.58', 'officer has register new customer with reference number5', 20, 3, 0, 0, '2021-02-13 12:09:14', 1, 'Firefox - 81.0', 'Linux'),
(78, 'REGISTER', '41.222.181.178', 'officer  has process new loan', 20, 3, 0, 0, '2021-03-14 12:43:25', 1, 'Firefox - 86.0', 'Linux'),
(79, 'CREATE', '41.222.181.178', 'ROOT has create Hashawa', 1, 13, 1, 1, '2021-03-14 12:46:42', 1, 'Firefox - 86.0', 'Linux'),
(80, 'CREATE', '41.222.181.178', 'ROOT has create daily configuration for Hashawa', 1, 13, 1, 1, '2021-03-14 12:46:42', 1, 'Firefox - 86.0', 'Linux'),
(81, 'CREATE', '41.222.181.178', 'ROOT has create general company configuration for Hashawa', 1, 13, 1, 1, '2021-03-14 12:46:42', 1, 'Firefox - 86.0', 'Linux'),
(82, 'ASSIGN', '41.222.181.178', 'ROOT has assign subscription to Hashawa', 1, 13, 1, 1, '2021-03-14 12:46:42', 1, 'Firefox - 86.0', 'Linux'),
(83, 'CREATE', '41.222.181.178', 'ROOT has create manager account for Hashawa', 1, 13, 1, 1, '2021-03-14 12:46:42', 1, 'Firefox - 86.0', 'Linux'),
(84, 'UPDATE', '41.222.181.178', 'Halfa Salum has update bio data{username and password}  of  Halfa Salum account', 21, 13, 0, 0, '2021-03-14 12:53:44', 1, 'Firefox - 86.0', 'Linux'),
(85, 'UPDATE', '41.222.181.178', 'Halfa Salum has update bio data{password}  of  Halfa Salum account', 21, 13, 0, 0, '2021-03-14 12:54:31', 1, 'Firefox - 86.0', 'Linux'),
(86, 'UPDATE', '41.222.181.178', 'Halfa Salum has update bio data{password}  of  Halfa Salum account', 21, 13, 0, 0, '2021-03-14 01:00:19', 1, 'Firefox - 86.0', 'Linux'),
(87, 'CREATE', '41.222.181.178', 'Halfa Salum has create account for Hashawa_supervisor', 21, 13, 0, 0, '2021-03-14 01:11:50', 1, 'Firefox - 86.0', 'Linux'),
(88, 'UPDATE', '41.222.181.178', 'Halfa Salum has update bio data{username and password}  of  Hashawa_supervisor account', 21, 13, 0, 0, '2021-03-14 01:13:46', 1, 'Firefox - 86.0', 'Linux'),
(89, 'CREATE', '41.222.181.178', 'Halfa Salum has create account for hashaawa_officer', 21, 13, 0, 0, '2021-03-14 01:15:55', 1, 'Firefox - 86.0', 'Linux'),
(90, 'UPDATE', '41.222.181.178', 'Halfa Salum has update bio data{username and password}  of  hashaawa_officer account', 21, 13, 0, 0, '2021-03-14 01:16:33', 1, 'Firefox - 86.0', 'Linux'),
(91, 'REGISTER', '41.222.181.178', 'hashaawa_officer has register new customer with reference number7', 23, 13, 0, 0, '2021-03-14 01:19:05', 1, 'Firefox - 86.0', 'Linux'),
(92, 'REGISTER', '41.222.181.178', 'hashaawa_officer  has process new loan', 23, 13, 0, 0, '2021-03-14 01:20:32', 1, 'Firefox - 86.0', 'Linux'),
(93, 'REGISTER', '41.222.181.178', 'Hashawa_supervisor has register new customer with reference number8', 22, 13, 0, 0, '2021-03-14 09:04:05', 1, 'Firefox - 86.0', 'Linux'),
(94, 'REGISTER', '41.222.181.178', 'Hashawa_supervisor  has process new loan', 22, 13, 0, 0, '2021-03-14 09:05:32', 1, 'Firefox - 86.0', 'Linux'),
(95, 'REGISTER', '41.222.181.178', 'Hashawa_supervisor has register new customer with reference number9', 22, 13, 0, 0, '2021-03-14 04:36:54', 1, 'Firefox - 86.0', 'Linux'),
(96, 'REGISTER', '41.222.181.178', 'Hashawa_supervisor  has process new loan', 22, 13, 0, 0, '2021-03-14 04:40:15', 1, 'Firefox - 86.0', 'Linux'),
(97, 'ADD', '154.74.127.83', 'Hashawa_supervisor has added officer missing restoration with reference number3 dated 2021-03-17', 22, 13, 0, 0, '2021-03-20 01:18:46', 1, 'Firefox - 86.0', 'Linux'),
(98, 'LOGIN', '196.249.97.101', 'Halfa Salum has login', 1, NULL, NULL, NULL, '2021-06-13 18:33:19', 1, 'Firefox - 87.0', 'Linux'),
(99, 'LOG OUT', '196.249.97.101', 'Halfa Salum has log out', 1, NULL, NULL, NULL, '2021-06-13 18:34:11', 1, 'Firefox - 87.0', 'Linux'),
(100, 'LOGIN', '169.255.185.181', 'Halfa Salum has login', 1, NULL, NULL, NULL, '2021-06-14 00:28:57', 1, 'Firefox - 87.0', 'Linux'),
(101, 'LOGIN', '41.59.198.111', 'Halfa Salum has login', 1, NULL, NULL, NULL, '2021-06-22 16:19:47', 1, 'Firefox - 87.0', 'Linux'),
(102, 'LOG OUT', '41.59.198.111', 'Halfa Salum has log out', 1, NULL, NULL, NULL, '2021-06-22 16:19:54', 1, 'Firefox - 87.0', 'Linux'),
(103, 'LOGIN', '41.59.198.111', 'Halfa Salum has login', 1, NULL, NULL, NULL, '2021-06-22 16:20:23', 1, 'Firefox - 87.0', 'Linux'),
(104, 'UPDATE', '41.59.198.111', 'Halfa Salum has update role for the user with ref number (1)', 1, NULL, NULL, NULL, '2021-06-22 16:38:49', 1, 'Firefox - 87.0', 'Linux'),
(105, 'LOG OUT', '41.59.198.111', 'Halfa Salum has log out', 1, NULL, NULL, NULL, '2021-06-22 16:38:57', 1, 'Firefox - 87.0', 'Linux'),
(106, 'LOGIN', '41.59.198.111', 'Halfa Salum has login', 1, NULL, NULL, NULL, '2021-06-22 16:39:02', 1, 'Firefox - 87.0', 'Linux'),
(107, 'CREATE', '41.59.198.111', 'Halfa Salum has create new role (Super Admin(SA))', 1, NULL, NULL, NULL, '2021-06-22 16:46:30', 1, 'Firefox - 87.0', 'Linux'),
(108, 'UPDATE', '41.59.198.111', 'Halfa Salum has update role for the user with ref number (1)', 1, NULL, NULL, NULL, '2021-06-22 16:47:00', 1, 'Firefox - 87.0', 'Linux'),
(109, 'LOG OUT', '41.59.198.111', 'Halfa Salum has log out', 1, NULL, NULL, NULL, '2021-06-22 16:47:06', 1, 'Firefox - 87.0', 'Linux'),
(110, 'LOGIN', '41.59.198.111', 'Halfa Salum has login', 1, NULL, NULL, NULL, '2021-06-22 16:47:10', 1, 'Firefox - 87.0', 'Linux'),
(111, 'LOG OUT', '41.59.198.111', 'Halfa Salum has log out', 1, NULL, NULL, NULL, '2021-06-22 16:51:32', 1, 'Firefox - 87.0', 'Linux'),
(112, 'LOGIN', '41.59.198.111', 'Halfa Salum has login', 1, NULL, NULL, NULL, '2021-06-22 16:51:37', 1, 'Firefox - 87.0', 'Linux'),
(113, 'LOG OUT', '41.59.198.111', 'Halfa Salum has log out', 1, NULL, NULL, NULL, '2021-06-22 17:12:57', 1, 'Firefox - 87.0', 'Linux'),
(114, 'LOGIN', '169.255.184.206', 'Halfa Salum has login', 1, NULL, NULL, NULL, '2021-07-10 19:23:29', 1, 'Firefox - 87.0', 'Linux'),
(115, 'LOGIN', '169.255.185.39', 'Halfa Salum has login', 1, NULL, NULL, NULL, '2021-07-16 19:29:19', 1, 'Firefox - 87.0', 'Linux'),
(116, 'LOG OUT', '169.255.185.39', 'Halfa Salum has log out', 1, NULL, NULL, NULL, '2021-07-16 19:29:47', 1, 'Firefox - 87.0', 'Linux'),
(117, 'LOGIN', '41.59.198.111', 'Halfa Salum has login', 1, NULL, NULL, NULL, '2021-08-06 14:32:21', 1, 'Firefox - 87.0', 'Linux'),
(118, 'LOG OUT', '41.59.198.111', 'Halfa Salum has log out', 1, NULL, NULL, NULL, '2021-08-06 14:33:56', 1, 'Firefox - 87.0', 'Linux'),
(119, 'LOGIN', '41.59.198.111', 'Halfa Salum has login', 1, NULL, NULL, NULL, '2021-08-06 14:34:09', 1, 'Firefox - 87.0', 'Linux'),
(120, 'LOG OUT', '41.59.198.111', 'Halfa Salum has log out', 1, NULL, NULL, NULL, '2021-08-06 14:34:14', 1, 'Firefox - 87.0', 'Linux'),
(121, 'LOGIN', '41.59.198.111', 'Halfa Salum has login', 1, NULL, NULL, NULL, '2021-08-11 16:01:44', 1, 'Firefox - 87.0', 'Linux'),
(122, 'LOG OUT', '41.59.198.111', 'Halfa Salum has log out', 1, NULL, NULL, NULL, '2021-08-11 16:12:11', 1, 'Firefox - 87.0', 'Linux'),
(123, 'LOGIN', '169.255.185.227', 'Halfa Salum has login', 1, NULL, NULL, NULL, '2021-08-11 19:42:15', 1, 'Firefox - 87.0', 'Linux'),
(124, 'LOG OUT', '169.255.185.227', 'Halfa Salum has log out', 1, NULL, NULL, NULL, '2021-08-11 19:51:50', 1, 'Firefox - 87.0', 'Linux'),
(125, 'LOGIN', '169.255.185.227', 'Halfa Salum has login', 1, 1, NULL, NULL, '2021-08-11 19:55:15', 1, 'Firefox - 87.0', 'Linux'),
(126, 'LOGIN', '41.59.198.111', 'Halfa Salum has login', 1, 1, NULL, NULL, '2021-08-12 07:47:41', 1, 'Firefox - 87.0', 'Linux'),
(127, 'UPDATE', '41.59.198.111', 'Halfa Salum has update role (Super Admin(SA))', 1, 1, NULL, NULL, '2021-08-12 07:57:54', 1, 'Firefox - 87.0', 'Linux'),
(128, 'LOGIN', '41.59.198.111', ' has login from lock screen', 1, 1, NULL, NULL, '2021-08-12 08:04:03', 1, 'Firefox - 87.0', 'Linux'),
(129, 'LOGIN', '41.59.198.111', 'Halfa Salum has login from lock screen', 1, 1, NULL, NULL, '2021-08-12 08:05:49', 1, 'Firefox - 87.0', 'Linux'),
(130, 'LOG OUT', '41.59.198.111', 'Halfa Salum has log out', 1, 1, NULL, NULL, '2021-08-12 08:06:23', 1, 'Firefox - 87.0', 'Linux'),
(131, 'LOGIN', '41.59.198.111', 'Halfa Salum has login', 1, 1, NULL, NULL, '2021-08-12 08:06:28', 1, 'Firefox - 87.0', 'Linux'),
(132, 'UPDATE', '41.59.198.111', 'Halfa Salum has update role for the user with ref number (1)', 1, 1, NULL, NULL, '2021-08-12 08:12:16', 1, 'Firefox - 87.0', 'Linux'),
(133, 'LOG OUT', '41.59.198.111', 'Halfa Salum has log out', 1, 1, NULL, NULL, '2021-08-12 08:25:47', 1, 'Firefox - 87.0', 'Linux'),
(134, 'LOGIN', '41.59.198.111', 'Halfa Salum has login', 1, 1, NULL, NULL, '2021-08-12 08:31:31', 1, 'Firefox - 87.0', 'Linux'),
(135, 'UPDATE', '41.59.198.111', 'Halfa Salum has update role (Super Admin(SA))', 1, 1, NULL, NULL, '2021-08-12 08:33:49', 1, 'Firefox - 87.0', 'Linux'),
(136, 'LOG OUT', '41.59.198.111', 'Halfa Salum has log out', 1, 1, NULL, NULL, '2021-08-12 08:34:00', 1, 'Firefox - 87.0', 'Linux'),
(137, 'LOGIN', '41.59.198.111', 'Halfa Salum has login', 1, 1, NULL, NULL, '2021-08-12 08:34:06', 1, 'Firefox - 87.0', 'Linux'),
(138, 'LOGIN', '41.59.198.111', 'Halfa Salum has login from lock screen', 1, 1, NULL, NULL, '2021-08-12 08:42:44', 1, 'Firefox - 87.0', 'Linux'),
(139, 'UPDATE', '41.222.181.190', 'Halfa Salum has delete module with ref number (11)', 1, 1, NULL, NULL, '2021-08-12 09:16:55', 1, 'Firefox - 87.0', 'Linux'),
(140, 'UPDATE', '41.222.181.190', 'Halfa Salum has delete module with ref number (12)', 1, 1, NULL, NULL, '2021-08-12 09:17:10', 1, 'Firefox - 87.0', 'Linux'),
(141, 'CREATE', '41.222.181.190', 'Halfa Salum has create new module (Branches & Zones)', 1, 1, NULL, NULL, '2021-08-12 09:21:09', 1, 'Firefox - 87.0', 'Linux'),
(142, 'UPDATE', '41.222.181.190', 'Halfa Salum has update module (Customers & Groups)', 1, 1, NULL, NULL, '2021-08-12 09:22:25', 1, 'Firefox - 87.0', 'Linux'),
(143, 'CREATE', '41.222.181.190', 'Halfa Salum has create new module control (Access Branches and zones)', 1, 1, NULL, NULL, '2021-08-12 09:23:05', 1, 'Firefox - 87.0', 'Linux'),
(144, 'CREATE', '41.222.181.190', 'Halfa Salum has create new module (Loans & Returns)', 1, 1, NULL, NULL, '2021-08-12 09:27:46', 1, 'Firefox - 87.0', 'Linux'),
(145, 'CREATE', '41.222.181.190', 'Halfa Salum has create new module control (Access Loan)', 1, 1, NULL, NULL, '2021-08-12 09:28:21', 1, 'Firefox - 87.0', 'Linux'),
(146, 'UPDATE', '41.222.181.190', 'Halfa Salum has update module (Loans & Returns)', 1, 1, NULL, NULL, '2021-08-12 09:28:43', 1, 'Firefox - 87.0', 'Linux'),
(147, 'UPDATE', '41.222.181.190', 'Halfa Salum has update module (Branches & Zones)', 1, 1, NULL, NULL, '2021-08-12 09:28:53', 1, 'Firefox - 87.0', 'Linux'),
(148, 'UPDATE', '41.222.181.190', 'Halfa Salum has update role (Super Admin(SA))', 1, 1, NULL, NULL, '2021-08-12 09:29:35', 1, 'Firefox - 87.0', 'Linux'),
(149, 'LOG OUT', '41.222.181.190', 'Halfa Salum has log out', 1, 1, NULL, NULL, '2021-08-12 09:29:45', 1, 'Firefox - 87.0', 'Linux'),
(150, 'LOGIN', '41.222.181.190', 'Halfa Salum has login', 1, 1, NULL, NULL, '2021-08-12 09:29:50', 1, 'Firefox - 87.0', 'Linux'),
(151, 'LOGIN', '41.222.181.190', 'Halfa Salum has login from lock screen', 1, 1, NULL, NULL, '2021-08-12 09:38:07', 1, 'Firefox - 87.0', 'Linux'),
(152, 'LOGIN', '41.222.181.190', 'Halfa Salum has login from lock screen', 1, 1, NULL, NULL, '2021-08-12 09:55:18', 1, 'Firefox - 87.0', 'Linux'),
(153, 'LOG OUT', '41.222.181.190', 'Halfa Salum has log out', 1, 1, NULL, NULL, '2021-08-12 10:06:05', 1, 'Firefox - 87.0', 'Linux'),
(154, 'LOGIN', '41.59.198.111', 'Halfa Salum has login', 1, 1, NULL, NULL, '2021-08-21 14:35:52', 1, 'Firefox - 87.0', 'Linux'),
(155, 'LOG OUT', '41.59.198.111', 'Halfa Salum has log out', 1, 1, NULL, NULL, '2021-08-21 14:46:04', 1, 'Firefox - 87.0', 'Linux'),
(156, 'LOGIN', '41.59.198.111', ' has login', 25, 16, NULL, NULL, '2021-08-21 14:53:06', 1, 'Chrome - 92.0.4515.131', 'Windows 10'),
(157, 'LOGIN', '41.59.198.111', 'Halfa Salum has login', 1, 1, NULL, NULL, '2021-08-21 14:54:35', 1, 'Firefox - 87.0', 'Linux'),
(158, 'CREATE', '41.59.198.111', 'Halfa Salum has create new role (Admin)', 1, 1, NULL, NULL, '2021-08-21 14:55:53', 1, 'Firefox - 87.0', 'Linux'),
(159, 'LOGIN', '41.59.198.111', ' has login from lock screen', 25, 16, NULL, NULL, '2021-08-21 14:58:44', 1, 'Chrome - 92.0.4515.131', 'Windows 10'),
(160, 'LOG OUT', '41.59.198.111', ' has log out', 25, 16, NULL, NULL, '2021-08-21 15:01:09', 1, 'Chrome - 92.0.4515.131', 'Windows 10'),
(161, 'LOGIN', '41.59.198.111', ' has login', 25, 16, NULL, NULL, '2021-08-21 15:01:17', 1, 'Chrome - 92.0.4515.131', 'Windows 10'),
(162, 'LOG OUT', '41.59.198.111', 'Halfa Salum has log out', 1, 1, NULL, NULL, '2021-08-21 15:09:14', 1, 'Firefox - 87.0', 'Linux'),
(163, 'LOG OUT', '41.59.198.111', ' has log out', 25, 16, NULL, NULL, '2021-08-21 15:12:22', 1, 'Chrome - 92.0.4515.131', 'Windows 10'),
(164, 'LOGIN', '41.59.198.111', ' has login', 25, 16, NULL, NULL, '2021-08-21 15:14:30', 1, 'Chrome - 92.0.4515.131', 'Windows 10'),
(165, 'LOGIN', '41.59.198.111', 'Halfa Salum has login', 1, 1, NULL, NULL, '2021-08-21 15:18:53', 1, 'Firefox - 87.0', 'Linux'),
(166, 'CREATE', '41.59.198.111', ' has create new role (Manager)', 25, 16, NULL, NULL, '2021-08-21 15:20:53', 1, 'Chrome - 92.0.4515.131', 'Windows 10'),
(167, 'UPDATE', '41.59.198.111', ' has update role for the user with ref number (25)', 25, 16, NULL, NULL, '2021-08-21 15:21:31', 1, 'Chrome - 92.0.4515.131', 'Windows 10'),
(168, 'LOG OUT', '41.59.198.111', ' has log out', 25, 16, NULL, NULL, '2021-08-21 15:33:16', 1, 'Chrome - 92.0.4515.131', 'Windows 10'),
(169, 'LOG OUT', '41.59.198.111', 'Halfa Salum has log out', 1, 1, NULL, NULL, '2021-08-21 15:34:12', 1, 'Firefox - 87.0', 'Linux'),
(170, 'LOGIN', '41.59.81.32', 'Halfa Salum has login', 1, 1, NULL, NULL, '2021-08-23 15:29:41', 1, 'Firefox - 87.0', 'Linux'),
(171, 'LOG OUT', '41.59.81.32', 'Halfa Salum has log out', 1, 1, NULL, NULL, '2021-08-23 15:34:49', 1, 'Firefox - 87.0', 'Linux'),
(172, 'LOGIN', '41.59.81.32', ' has login', 25, 16, NULL, NULL, '2021-08-23 15:36:03', 1, 'Firefox - 87.0', 'Linux'),
(173, 'LOG OUT', '41.59.81.32', ' has log out', 25, 16, NULL, NULL, '2021-08-23 15:37:32', 1, 'Firefox - 87.0', 'Linux'),
(174, 'LOGIN', '41.59.81.32', ' has login', 25, 16, NULL, NULL, '2021-08-23 15:37:49', 1, 'Firefox - 87.0', 'Linux'),
(175, 'LOG OUT', '41.59.81.32', ' has log out', 25, 16, NULL, NULL, '2021-08-23 16:02:40', 1, 'Firefox - 87.0', 'Linux'),
(176, 'LOGIN', '41.59.198.111', ' has login', 25, 16, NULL, NULL, '2021-08-27 12:29:59', 1, 'Firefox - 87.0', 'Linux'),
(177, 'LOG OUT', '41.59.198.111', ' has log out', 25, 16, NULL, NULL, '2021-08-27 12:40:03', 1, 'Firefox - 87.0', 'Linux'),
(178, 'LOGIN', '169.255.185.233', ' has login', 25, 16, NULL, NULL, '2021-09-02 22:02:29', 1, 'Firefox - 87.0', 'Linux'),
(179, 'LOGIN', '169.255.185.233', ' has login from lock screen', 25, 16, NULL, NULL, '2021-09-02 22:40:51', 1, 'Firefox - 87.0', 'Linux'),
(180, 'LOGIN', '169.255.185.233', ' has login from lock screen', 25, 16, NULL, NULL, '2021-09-02 22:57:15', 1, 'Firefox - 87.0', 'Linux'),
(181, 'LOG OUT', '169.255.185.233', ' has log out', 25, 16, NULL, NULL, '2021-09-02 23:07:05', 1, 'Firefox - 87.0', 'Linux'),
(182, 'LOGIN', '169.255.185.233', ' has login', 25, 16, NULL, NULL, '2021-09-02 23:07:11', 1, 'Firefox - 87.0', 'Linux'),
(183, 'LOG OUT', '169.255.185.233', ' has log out', 25, 16, NULL, NULL, '2021-09-02 23:12:21', 1, 'Firefox - 87.0', 'Linux'),
(184, 'LOGIN', '169.255.185.233', 'Halfa Salum has login', 1, 1, NULL, NULL, '2021-09-02 23:12:33', 1, 'Firefox - 87.0', 'Linux'),
(185, 'LOG OUT', '169.255.185.233', 'Halfa Salum has log out', 1, 1, NULL, NULL, '2021-09-02 23:13:06', 1, 'Firefox - 87.0', 'Linux'),
(186, 'LOGIN', '169.255.185.233', ' has login', 25, 16, NULL, NULL, '2021-09-02 23:13:16', 1, 'Firefox - 87.0', 'Linux'),
(187, 'LOGIN', '169.255.185.65', ' has login', 25, 16, NULL, NULL, '2021-09-04 09:29:13', 1, 'Firefox - 87.0', 'Linux'),
(188, 'CREATE', '169.255.185.65', ' has create new module (Branch A)', 25, 16, NULL, NULL, '2021-09-04 09:37:28', 1, 'Firefox - 87.0', 'Linux'),
(189, 'LOGIN', '169.255.185.65', ' has login from lock screen', 25, 16, NULL, NULL, '2021-09-04 09:53:43', 1, 'Firefox - 87.0', 'Linux'),
(190, 'LOG OUT', '169.255.185.65', ' has log out', 25, 16, NULL, NULL, '2021-09-04 09:56:00', 1, 'Firefox - 87.0', 'Linux'),
(191, 'LOGIN', '169.255.185.65', ' has login', 25, 16, NULL, NULL, '2021-09-04 09:56:06', 1, 'Firefox - 87.0', 'Linux'),
(192, 'LOG OUT', '169.255.185.65', ' has log out', 25, 16, NULL, NULL, '2021-09-04 11:29:21', 1, 'Firefox - 87.0', 'Linux'),
(193, 'LOGIN', '41.222.181.56', ' has login', 25, 16, NULL, NULL, '2021-09-22 12:20:29', 1, 'Firefox - 87.0', 'Linux'),
(194, 'LOG OUT', '41.222.181.56', ' has log out', 25, 16, NULL, NULL, '2021-09-22 12:30:44', 1, 'Firefox - 87.0', 'Linux'),
(195, 'LOGIN', '41.222.181.56', ' has login', 25, 16, NULL, NULL, '2021-09-22 12:34:06', 1, 'Firefox - 87.0', 'Linux'),
(196, 'LOG OUT', '41.222.181.56', ' has log out', 25, 16, NULL, NULL, '2021-09-22 12:45:10', 1, 'Firefox - 87.0', 'Linux'),
(197, 'LOGIN', '41.222.181.56', ' has login', 25, 16, NULL, NULL, '2021-09-22 12:51:50', 1, 'Firefox - 87.0', 'Linux'),
(198, 'LOGIN', '41.222.181.56', ' has login from lock screen', 25, 16, NULL, NULL, '2021-09-22 13:03:30', 1, 'Firefox - 87.0', 'Linux'),
(199, 'LOGIN', '41.222.181.56', ' has login from lock screen', 25, 16, NULL, NULL, '2021-09-22 13:08:53', 1, 'Firefox - 87.0', 'Linux'),
(200, 'CREATE', '41.222.181.56', ' has create new zone (Zone A)', 25, 16, NULL, NULL, '2021-09-22 13:09:19', 1, 'Firefox - 87.0', 'Linux'),
(201, 'LOG OUT', '41.222.181.56', ' has log out', 25, 16, NULL, NULL, '2021-09-22 13:37:16', 1, 'Firefox - 87.0', 'Linux'),
(202, 'LOGIN', '41.222.181.56', ' has login', 25, 16, NULL, NULL, '2021-09-22 13:42:57', 1, 'Firefox - 87.0', 'Linux'),
(203, 'LOG OUT', '41.222.181.56', ' has log out', 25, 16, NULL, NULL, '2021-09-22 14:00:41', 1, 'Firefox - 87.0', 'Linux'),
(204, 'LOGIN', '41.59.198.111', ' has login', 25, 16, NULL, NULL, '2021-10-09 12:44:10', 1, 'Chrome - 92.0.4515.131', 'Linux'),
(205, 'LOG OUT', '41.59.198.111', ' has log out', 25, 16, NULL, NULL, '2021-10-09 12:54:59', 1, 'Chrome - 92.0.4515.131', 'Linux'),
(206, 'LOGIN', '41.59.198.111', ' has login', 25, 16, NULL, NULL, '2021-10-09 13:34:19', 1, 'Chrome - 92.0.4515.131', 'Linux'),
(207, 'LOG OUT', '41.59.198.111', ' has log out', 25, 16, NULL, NULL, '2021-10-09 13:40:41', 1, 'Chrome - 92.0.4515.131', 'Linux'),
(208, 'LOGIN', '41.59.198.111', ' has login', 25, 16, NULL, NULL, '2021-10-09 13:40:47', 1, 'Chrome - 92.0.4515.131', 'Linux'),
(209, 'LOGIN', '41.59.198.111', ' has login from lock screen', 25, 16, NULL, NULL, '2021-10-09 13:46:33', 1, 'Chrome - 92.0.4515.131', 'Linux'),
(210, 'LOGIN', '41.59.198.111', ' has login from lock screen', 25, 16, NULL, NULL, '2021-10-09 13:52:06', 1, 'Chrome - 92.0.4515.131', 'Linux'),
(211, 'LOGIN', '41.59.198.111', ' has login', 25, 16, NULL, NULL, '2021-10-09 13:54:31', 1, 'Firefox - 92.0', 'Windows 10'),
(212, 'LOGIN', '41.59.198.111', ' has login from lock screen', 25, 16, NULL, NULL, '2021-10-09 14:00:40', 1, 'Firefox - 92.0', 'Windows 10'),
(213, 'LOG OUT', '41.59.198.111', ' has log out', 25, 16, NULL, NULL, '2021-10-09 14:02:08', 1, 'Chrome - 92.0.4515.131', 'Linux'),
(214, 'LOGIN', '41.59.198.111', ' has login from lock screen', 25, 16, NULL, NULL, '2021-10-09 14:08:04', 1, 'Firefox - 92.0', 'Windows 10'),
(215, 'UPDATE', '41.59.198.111', ' has update user branch for the user with ref number (25)', 25, 16, NULL, NULL, '2021-10-09 14:10:25', 1, 'Firefox - 92.0', 'Windows 10'),
(216, 'UPDATE', '41.59.198.111', ' has update user branch for the user with ref number (25)', 25, 16, NULL, NULL, '2021-10-09 14:16:47', 1, 'Firefox - 92.0', 'Windows 10'),
(217, 'UPDATE', '41.59.198.111', ' has update user branch for the user with ref number (25)', 25, 16, NULL, NULL, '2021-10-09 14:22:28', 1, 'Firefox - 92.0', 'Windows 10'),
(218, 'UPDATE', '41.59.198.111', ' has update user assigned zone for the user with ref number (25)', 25, 16, NULL, NULL, '2021-10-09 14:23:30', 1, 'Firefox - 92.0', 'Windows 10'),
(219, 'UPDATE', '41.59.198.111', ' has update user branch for the user with ref number (25)', 25, 16, NULL, NULL, '2021-10-09 14:23:35', 1, 'Firefox - 92.0', 'Windows 10'),
(220, 'UPDATE', '41.59.198.111', ' has update user assigned zone for the user with ref number (25)', 25, 16, NULL, NULL, '2021-10-09 14:23:35', 1, 'Firefox - 92.0', 'Windows 10'),
(221, 'UPDATE', '41.59.198.111', ' has update user assigned zone for the user with ref number (25)', 25, 16, NULL, NULL, '2021-10-09 14:23:39', 1, 'Firefox - 92.0', 'Windows 10'),
(222, 'UPDATE', '41.59.198.111', ' has update user branch for the user with ref number (25)', 25, 16, NULL, NULL, '2021-10-09 14:44:46', 1, 'Firefox - 92.0', 'Windows 10'),
(223, 'REGISTER', '41.59.198.111', ' has register new customer (Halfa Salum)', 25, 16, NULL, NULL, '2021-10-09 15:05:57', 1, 'Firefox - 92.0', 'Windows 10'),
(224, 'REGISTER', '41.59.198.111', ' has register new customer (ahbabrasul@icloud.com)', 25, 16, NULL, NULL, '2021-10-09 15:09:44', 1, 'Firefox - 92.0', 'Windows 10'),
(225, 'REGISTER', '41.59.198.111', ' has register new customer (Halfa Salum)', 25, 16, NULL, NULL, '2021-10-09 15:11:34', 1, 'Firefox - 92.0', 'Windows 10'),
(226, 'REGISTER', '41.59.198.111', ' has register new customer (Halfa Salum)', 25, 16, NULL, NULL, '2021-10-09 15:13:39', 1, 'Firefox - 92.0', 'Windows 10'),
(227, 'LOGIN', '41.59.198.111', ' has login from lock screen', 25, 16, NULL, NULL, '2021-10-09 15:32:49', 1, 'Firefox - 92.0', 'Windows 10'),
(228, 'LOGIN', '41.59.198.111', ' has login from lock screen', 25, 16, NULL, NULL, '2021-10-09 15:39:57', 1, 'Firefox - 92.0', 'Windows 10'),
(229, 'LOG OUT', '41.59.198.111', ' has log out', 25, 16, NULL, NULL, '2021-10-09 15:50:01', 1, 'Firefox - 92.0', 'Windows 10'),
(230, 'LOGIN', '41.59.198.111', ' has login', 25, 16, NULL, NULL, '2021-10-09 16:02:53', 1, 'Firefox - 92.0', 'Windows 10'),
(231, 'LOGIN', '41.59.198.111', ' has login', 25, 16, NULL, NULL, '2021-10-09 16:09:57', 1, 'Firefox - 92.0', 'Windows 10'),
(232, 'LOGIN', '41.59.198.111', ' has login from lock screen', 25, 16, NULL, NULL, '2021-10-09 16:14:41', 1, 'Firefox - 92.0', 'Windows 10'),
(233, 'LOG OUT', '41.59.198.111', ' has log out', 25, 16, NULL, NULL, '2021-10-09 16:24:43', 1, 'Firefox - 92.0', 'Windows 10'),
(234, 'LOGIN', '41.59.198.111', ' has login', 25, 16, NULL, NULL, '2021-10-09 16:49:05', 1, 'Firefox - 92.0', 'Windows 10'),
(235, 'LOG OUT', '41.59.198.111', ' has log out', 25, 16, NULL, NULL, '2021-10-09 17:00:15', 1, 'Firefox - 92.0', 'Windows 10'),
(236, 'LOGIN', '169.255.184.24', ' has login', 25, 16, NULL, NULL, '2021-10-09 18:42:14', 1, 'Chrome - 92.0.4515.131', 'Linux'),
(237, 'LOG OUT', '169.255.184.24', ' has log out', 25, 16, NULL, NULL, '2021-10-09 18:52:19', 1, 'Chrome - 92.0.4515.131', 'Linux'),
(238, 'LOGIN', '169.255.184.24', ' has login', 25, 16, NULL, NULL, '2021-10-09 19:32:22', 1, 'Chrome - 92.0.4515.131', 'Linux'),
(239, 'LOG OUT', '169.255.184.24', ' has log out', 25, 16, NULL, NULL, '2021-10-09 19:44:42', 1, 'Chrome - 92.0.4515.131', 'Linux'),
(240, 'LOGIN', '169.255.184.24', ' has login', 25, 16, NULL, NULL, '2021-10-09 19:54:18', 1, 'Chrome - 92.0.4515.131', 'Linux'),
(241, 'LOG OUT', '169.255.184.24', ' has log out', 25, 16, NULL, NULL, '2021-10-09 19:54:52', 1, 'Chrome - 92.0.4515.131', 'Linux'),
(242, 'LOGIN', '169.255.184.24', 'Halfa Salum has login', 1, 1, NULL, NULL, '2021-10-09 19:55:30', 1, 'Chrome - 92.0.4515.131', 'Linux'),
(243, 'UPDATE', '169.255.184.24', 'Halfa Salum has update module (Loans & Returns)', 1, 1, NULL, NULL, '2021-10-09 19:57:24', 1, 'Chrome - 92.0.4515.131', 'Linux'),
(244, 'DELETE', '169.255.184.24', 'Halfa Salum has delete user with ref number (23)', 1, 1, NULL, NULL, '2021-10-09 20:01:01', 1, 'Chrome - 92.0.4515.131', 'Linux'),
(245, 'DELETE', '169.255.184.24', 'Halfa Salum has delete user with ref number (22)', 1, 1, NULL, NULL, '2021-10-09 20:01:26', 1, 'Chrome - 92.0.4515.131', 'Linux'),
(246, 'DELETE', '169.255.184.24', 'Halfa Salum has delete user with ref number (21)', 1, 1, NULL, NULL, '2021-10-09 20:01:37', 1, 'Chrome - 92.0.4515.131', 'Linux'),
(247, 'DELETE', '169.255.184.24', 'Halfa Salum has delete user with ref number (20)', 1, 1, NULL, NULL, '2021-10-09 20:01:48', 1, 'Chrome - 92.0.4515.131', 'Linux'),
(248, 'DELETE', '169.255.184.24', 'Halfa Salum has delete user with ref number (19)', 1, 1, NULL, NULL, '2021-10-09 20:02:00', 1, 'Chrome - 92.0.4515.131', 'Linux'),
(249, 'DELETE', '169.255.184.24', 'Halfa Salum has delete user with ref number (18)', 1, 1, NULL, NULL, '2021-10-09 20:02:10', 1, 'Chrome - 92.0.4515.131', 'Linux'),
(250, 'DELETE', '169.255.184.24', 'Halfa Salum has delete user with ref number (17)', 1, 1, NULL, NULL, '2021-10-09 20:02:25', 1, 'Chrome - 92.0.4515.131', 'Linux'),
(251, 'DELETE', '169.255.184.24', 'Halfa Salum has delete user with ref number (16)', 1, 1, NULL, NULL, '2021-10-09 20:02:43', 1, 'Chrome - 92.0.4515.131', 'Linux'),
(252, 'DELETE', '169.255.184.24', 'Halfa Salum has delete user with ref number (15)', 1, 1, NULL, NULL, '2021-10-09 20:02:52', 1, 'Chrome - 92.0.4515.131', 'Linux'),
(253, 'DELETE', '169.255.184.24', 'Halfa Salum has delete user with ref number (14)', 1, 1, NULL, NULL, '2021-10-09 20:03:01', 1, 'Chrome - 92.0.4515.131', 'Linux'),
(254, 'DELETE', '169.255.184.24', 'Halfa Salum has delete user with ref number (13)', 1, 1, NULL, NULL, '2021-10-09 20:03:13', 1, 'Chrome - 92.0.4515.131', 'Linux'),
(255, 'DELETE', '169.255.184.24', 'Halfa Salum has delete user with ref number (12)', 1, 1, NULL, NULL, '2021-10-09 20:03:26', 1, 'Chrome - 92.0.4515.131', 'Linux'),
(256, 'DELETE', '169.255.184.24', 'Halfa Salum has delete user with ref number (11)', 1, 1, NULL, NULL, '2021-10-09 20:03:44', 1, 'Chrome - 92.0.4515.131', 'Linux'),
(257, 'DELETE', '169.255.184.24', 'Halfa Salum has delete user with ref number (10)', 1, 1, NULL, NULL, '2021-10-09 20:03:53', 1, 'Chrome - 92.0.4515.131', 'Linux'),
(258, 'DELETE', '169.255.184.24', 'Halfa Salum has delete user with ref number (9)', 1, 1, NULL, NULL, '2021-10-09 20:04:05', 1, 'Chrome - 92.0.4515.131', 'Linux'),
(259, 'LOG OUT', '169.255.184.24', 'Halfa Salum has log out', 1, 1, NULL, NULL, '2021-10-09 20:07:03', 1, 'Chrome - 92.0.4515.131', 'Linux'),
(260, 'LOGIN', '169.255.184.24', ' has login', 25, 16, NULL, NULL, '2021-10-09 20:07:34', 1, 'Chrome - 92.0.4515.131', 'Linux'),
(261, 'LOG OUT', '169.255.184.24', ' has log out', 25, 16, NULL, NULL, '2021-10-09 20:20:07', 1, 'Chrome - 92.0.4515.131', 'Linux'),
(262, 'LOGIN', '169.255.184.24', ' has login', 25, 16, NULL, NULL, '2021-10-09 20:21:43', 1, 'Chrome - 92.0.4515.131', 'Linux'),
(263, 'LOG OUT', '169.255.184.24', ' has log out', 25, 16, NULL, NULL, '2021-10-09 20:40:17', 1, 'Chrome - 92.0.4515.131', 'Linux'),
(264, 'LOGIN', '169.255.184.24', ' has login', 25, 16, NULL, NULL, '2021-10-09 20:40:27', 1, 'Chrome - 92.0.4515.131', 'Linux'),
(265, 'LOGIN', '169.255.184.24', ' has login from lock screen', 25, 16, NULL, NULL, '2021-10-09 20:56:42', 1, 'Chrome - 92.0.4515.131', 'Linux'),
(266, 'LOG OUT', '169.255.184.24', ' has log out', 25, 16, NULL, NULL, '2021-10-09 21:09:38', 1, 'Chrome - 92.0.4515.131', 'Linux'),
(267, 'LOGIN', '169.255.185.217', ' has login', 25, 16, NULL, NULL, '2021-10-11 07:48:40', 1, 'Firefox - 87.0', 'Linux'),
(268, 'LOGIN', '169.255.185.217', ' has login from lock screen', 25, 16, NULL, NULL, '2021-10-11 07:58:22', 1, 'Firefox - 87.0', 'Linux'),
(269, 'LOG OUT', '169.255.185.217', ' has log out', 25, 16, NULL, NULL, '2021-10-11 08:09:32', 1, 'Firefox - 87.0', 'Linux'),
(270, 'LOGIN', '169.255.185.217', ' has login', 25, 16, NULL, NULL, '2021-10-11 08:10:24', 1, 'Firefox - 87.0', 'Linux'),
(271, 'LOGIN', '169.255.185.217', ' has login from lock screen', 25, 16, NULL, NULL, '2021-10-11 08:19:18', 1, 'Firefox - 87.0', 'Linux'),
(272, 'LOG OUT', '169.255.185.217', ' has log out', 25, 16, NULL, NULL, '2021-10-11 08:32:34', 1, 'Firefox - 87.0', 'Linux'),
(273, 'LOGIN', '169.255.185.217', ' has login', 25, 16, NULL, NULL, '2021-10-11 09:24:26', 1, 'Firefox - 87.0', 'Linux'),
(274, 'LOGIN', '169.255.185.217', ' has login from lock screen', 25, 16, NULL, NULL, '2021-10-11 09:36:36', 1, 'Firefox - 87.0', 'Linux'),
(275, 'LOG OUT', '169.255.185.217', ' has log out', 25, 16, NULL, NULL, '2021-10-11 09:48:36', 1, 'Firefox - 87.0', 'Linux'),
(276, 'LOGIN', '169.255.185.217', ' has login', 25, 16, NULL, NULL, '2021-10-11 15:35:10', 1, 'Firefox - 87.0', 'Linux'),
(277, 'LOGIN', '169.255.185.217', ' has login from lock screen', 25, 16, NULL, NULL, '2021-10-11 15:44:01', 1, 'Firefox - 87.0', 'Linux'),
(278, 'LOGIN', '169.255.185.217', ' has login from lock screen', 25, 16, NULL, NULL, '2021-10-11 15:54:33', 1, 'Firefox - 87.0', 'Linux'),
(279, 'LOGIN', '169.255.185.217', ' has login from lock screen', 25, 16, NULL, NULL, '2021-10-11 16:03:45', 1, 'Firefox - 87.0', 'Linux'),
(280, 'LOGIN', '169.255.185.217', ' has login', 25, 16, NULL, NULL, '2021-10-11 22:39:22', 1, 'Firefox - 87.0', 'Linux'),
(281, 'LOG OUT', '169.255.185.217', ' has log out', 25, 16, NULL, NULL, '2021-10-11 23:05:17', 1, 'Firefox - 87.0', 'Linux'),
(282, 'LOGIN', '41.59.198.111', ' has login', 25, 16, NULL, NULL, '2021-10-12 08:20:18', 1, 'Firefox - 87.0', 'Linux'),
(283, 'LOG OUT', '41.59.198.111', ' has log out', 25, 16, NULL, NULL, '2021-10-12 08:31:32', 1, 'Firefox - 87.0', 'Linux'),
(284, 'LOGIN', '41.59.81.125', ' has login', 25, 16, NULL, NULL, '2021-10-12 10:49:27', 1, 'Firefox - 87.0', 'Linux'),
(285, 'UPDATE', '41.59.81.125', ' has update user assigned zone for the user with ref number (25)', 25, 16, NULL, NULL, '2021-10-12 10:50:46', 1, 'Firefox - 87.0', 'Linux'),
(286, 'LOG OUT', '41.59.81.125', ' has log out', 25, 16, NULL, NULL, '2021-10-12 11:05:39', 1, 'Firefox - 87.0', 'Linux'),
(287, 'LOGIN', '41.59.81.125', ' has login', 25, 16, NULL, NULL, '2021-10-12 11:10:38', 1, 'Firefox - 87.0', 'Linux'),
(288, 'LOG OUT', '41.59.81.125', ' has log out', 25, 16, NULL, NULL, '2021-10-12 11:22:09', 1, 'Firefox - 87.0', 'Linux'),
(289, 'LOGIN', '41.59.81.125', ' has login', 25, 16, NULL, NULL, '2021-10-12 16:35:09', 1, 'Firefox - 87.0', 'Linux'),
(290, 'LOGIN', '41.222.177.161', ' has login from lock screen', 25, 16, NULL, NULL, '2021-10-12 16:56:57', 1, 'Firefox - 87.0', 'Linux'),
(291, 'LOG OUT', '41.222.177.161', ' has log out', 25, 16, NULL, NULL, '2021-10-12 17:27:10', 1, 'Firefox - 87.0', 'Linux'),
(292, 'LOGIN', '41.222.177.161', ' has login', 25, 16, NULL, NULL, '2021-10-12 17:27:18', 1, 'Firefox - 87.0', 'Linux'),
(293, 'LOG OUT', '41.222.177.161', ' has log out', 25, 16, NULL, NULL, '2021-10-12 17:29:23', 1, 'Firefox - 87.0', 'Linux'),
(294, 'LOGIN', '41.222.177.161', ' has login', 25, 16, NULL, NULL, '2021-10-12 17:29:30', 1, 'Firefox - 87.0', 'Linux'),
(295, 'LOGIN', '169.255.185.152', ' has login', 25, 16, NULL, NULL, '2021-10-12 18:19:56', 1, 'Chrome - 94.0.4606.71', 'Android'),
(296, 'LOG OUT', '169.255.185.152', ' has log out', 25, 16, NULL, NULL, '2021-10-12 18:20:34', 1, 'Chrome - 94.0.4606.71', 'Android'),
(297, 'LOGIN', '169.255.185.152', ' has login', 25, 16, NULL, NULL, '2021-10-12 21:06:45', 1, 'Firefox - 87.0', 'Linux'),
(298, 'UPDATE', '169.255.185.152', ' has update user branch for the user with ref number (25)', 25, 16, NULL, NULL, '2021-10-12 21:07:15', 1, 'Firefox - 87.0', 'Linux'),
(299, 'UPDATE', '169.255.185.152', ' has update user assigned zone for the user with ref number (25)', 25, 16, NULL, NULL, '2021-10-12 21:08:15', 1, 'Firefox - 87.0', 'Linux'),
(300, 'LOGIN', '41.59.198.111', ' has login', 25, 16, NULL, NULL, '2021-10-13 08:32:29', 1, 'Firefox - 87.0', 'Linux'),
(301, 'LOG OUT', '41.59.81.113', ' has log out', 25, 16, NULL, NULL, '2021-10-13 08:43:00', 1, 'Firefox - 87.0', 'Linux'),
(302, 'LOGIN', '41.59.81.113', ' has login', 25, 16, NULL, NULL, '2021-10-13 08:56:50', 1, 'Firefox - 87.0', 'Linux'),
(303, 'LOG OUT', '41.59.81.113', ' has log out', 25, 16, NULL, NULL, '2021-10-13 09:07:12', 1, 'Firefox - 87.0', 'Linux'),
(304, 'LOGIN', '41.59.81.113', ' has login', 25, 16, NULL, NULL, '2021-10-13 16:12:26', 1, 'Firefox - 87.0', 'Linux'),
(305, 'LOGIN', '41.59.81.113', ' has login from lock screen', 25, 16, NULL, NULL, '2021-10-13 16:20:36', 1, 'Firefox - 87.0', 'Linux'),
(306, 'LOG OUT', '41.59.81.113', ' has log out', 25, 16, NULL, NULL, '2021-10-13 16:34:27', 1, 'Firefox - 87.0', 'Linux'),
(307, 'LOGIN', '41.59.81.113', ' has login', 25, 16, NULL, NULL, '2021-10-13 16:39:49', 1, 'Firefox - 87.0', 'Linux'),
(308, 'LOG OUT', '41.59.198.111', ' has log out', 25, 16, NULL, NULL, '2021-10-13 17:07:36', 1, 'Firefox - 87.0', 'Linux'),
(309, 'LOGIN', '196.249.98.119', ' has login', 25, 16, NULL, NULL, '2021-10-14 08:30:10', 1, 'Firefox - 87.0', 'Linux'),
(310, 'LOGIN', '196.249.98.119', ' has login from lock screen', 25, 16, NULL, NULL, '2021-10-14 08:35:36', 1, 'Firefox - 87.0', 'Linux'),
(311, 'LOGIN', '196.249.98.119', ' has login from lock screen', 25, 16, NULL, NULL, '2021-10-14 08:54:39', 1, 'Firefox - 87.0', 'Linux'),
(312, 'LOG OUT', '196.249.98.119', ' has log out', 25, 16, NULL, NULL, '2021-10-14 09:08:36', 1, 'Firefox - 87.0', 'Linux'),
(313, 'LOGIN', '41.59.81.175', ' has login', 25, 16, NULL, NULL, '2021-11-25 09:38:38', 1, 'Firefox - 87.0', 'Linux'),
(314, 'LOG OUT', '41.59.81.175', ' has log out', 25, 16, NULL, NULL, '2021-11-25 09:38:43', 1, 'Firefox - 87.0', 'Linux'),
(315, 'LOGIN', '41.59.193.231', ' has login', 25, 16, NULL, NULL, '2022-01-11 18:32:47', 1, 'Firefox - 87.0', 'Linux'),
(316, 'LOGIN', '169.255.185.223', ' has login', 25, 16, NULL, NULL, '2022-01-12 07:13:46', 1, 'Firefox - 87.0', 'Linux'),
(317, 'LOG OUT', '169.255.185.223', ' has log out', 25, 16, NULL, NULL, '2022-01-12 07:33:55', 1, 'Firefox - 87.0', 'Linux'),
(318, 'LOGIN', '169.255.185.223', ' has login', 25, 16, NULL, NULL, '2022-01-12 07:43:03', 1, 'Firefox - 87.0', 'Linux'),
(319, 'LOGIN', '169.255.185.223', ' has login from lock screen', 25, 16, NULL, NULL, '2022-01-12 07:55:13', 1, 'Firefox - 87.0', 'Linux'),
(320, 'LOG OUT', '169.255.185.223', ' has log out', 25, 16, NULL, NULL, '2022-01-12 09:03:13', 1, 'Firefox - 87.0', 'Linux'),
(321, 'LOGIN', '169.255.185.223', ' has login', 25, 16, NULL, NULL, '2022-01-12 09:11:23', 1, 'Firefox - 87.0', 'Linux'),
(322, 'LOG OUT', '169.255.185.223', ' has log out', 25, 16, NULL, NULL, '2022-01-12 09:40:58', 1, 'Firefox - 87.0', 'Linux'),
(323, 'LOGIN', '169.255.185.223', ' has login', 25, 16, NULL, NULL, '2022-01-12 09:53:11', 1, 'Firefox - 87.0', 'Linux'),
(324, 'LOG OUT', '169.255.185.223', ' has log out', 25, 16, NULL, NULL, '2022-01-12 10:33:17', 1, 'Firefox - 87.0', 'Linux'),
(325, 'LOGIN', '169.255.185.223', ' has login', 25, 16, NULL, NULL, '2022-01-12 11:51:55', 1, 'Firefox - 87.0', 'Linux'),
(326, 'LOGIN', '169.255.185.223', ' has login from lock screen', 25, 16, NULL, NULL, '2022-01-12 12:09:22', 1, 'Firefox - 87.0', 'Linux'),
(327, 'LOGIN', '169.255.185.223', ' has login from lock screen', 25, 16, NULL, NULL, '2022-01-12 12:22:08', 1, 'Firefox - 87.0', 'Linux'),
(328, 'LOG OUT', '169.255.185.223', ' has log out', 25, 16, NULL, NULL, '2022-01-12 12:33:22', 1, 'Firefox - 87.0', 'Linux'),
(329, 'LOGIN', '169.255.185.223', ' has login', 25, 16, NULL, NULL, '2022-01-12 12:38:52', 1, 'Firefox - 87.0', 'Linux'),
(330, 'LOGIN', '169.255.185.223', ' has login from lock screen', 25, 16, NULL, NULL, '2022-01-12 12:50:42', 1, 'Firefox - 87.0', 'Linux'),
(331, 'LOG OUT', '169.255.185.223', ' has log out', 25, 16, NULL, NULL, '2022-01-12 13:48:33', 1, 'Firefox - 87.0', 'Linux'),
(332, 'LOGIN', '169.255.185.223', ' has login', 25, 16, NULL, NULL, '2022-01-12 16:53:13', 1, 'Firefox - 87.0', 'Linux'),
(333, 'LOGIN', '41.59.193.231', ' has login', 25, 16, NULL, NULL, '2022-01-13 15:07:36', 1, 'Firefox - 87.0', 'Linux'),
(334, 'LOGIN', '41.59.193.231', ' has login from lock screen', 25, 16, NULL, NULL, '2022-01-13 15:23:16', 1, 'Firefox - 87.0', 'Linux'),
(335, 'LOGIN', '41.59.193.231', ' has login from lock screen', 25, 16, NULL, NULL, '2022-01-13 15:40:19', 1, 'Firefox - 87.0', 'Linux'),
(336, 'LOG OUT', '41.59.193.231', ' has log out', 25, 16, NULL, NULL, '2022-01-13 16:31:17', 1, 'Firefox - 87.0', 'Linux'),
(337, 'LOGIN', '41.59.193.231', ' has login', 25, 16, NULL, NULL, '2022-01-13 16:39:29', 1, 'Firefox - 87.0', 'Linux'),
(338, 'REGISTER', '41.59.193.231', ' has register new customer (ahbabrasul)', 25, 16, NULL, NULL, '2022-01-13 16:44:10', 1, 'Firefox - 87.0', 'Linux'),
(339, 'LOG OUT', '41.59.193.231', ' has log out', 25, 16, NULL, NULL, '2022-01-13 17:36:27', 1, 'Firefox - 87.0', 'Linux'),
(340, 'LOGIN', '41.59.193.231', ' has login', 25, 16, NULL, NULL, '2022-01-13 17:40:55', 1, 'Firefox - 87.0', 'Linux'),
(341, 'LOGIN', '197.250.198.22', ' has login', 25, 16, NULL, NULL, '2022-01-19 17:02:43', 1, 'Firefox - 87.0', 'Linux'),
(342, 'LOGIN', '197.250.198.22', ' has login from lock screen', 25, 16, NULL, NULL, '2022-01-19 17:59:52', 1, 'Firefox - 87.0', 'Linux'),
(343, 'LOGIN', '197.250.198.22', ' has login from lock screen', 25, 16, NULL, NULL, '2022-01-19 18:15:04', 1, 'Firefox - 87.0', 'Linux'),
(344, 'LOG OUT', '197.250.198.22', ' has log out', 25, 16, NULL, NULL, '2022-01-19 18:32:04', 1, 'Firefox - 87.0', 'Linux'),
(345, 'LOGIN', '197.250.198.22', ' has login', 25, 16, NULL, NULL, '2022-01-19 18:36:33', 1, 'Firefox - 87.0', 'Linux'),
(346, 'LOG OUT', '197.250.198.22', ' has log out', 25, 16, NULL, NULL, '2022-01-19 18:48:01', 1, 'Firefox - 87.0', 'Linux'),
(347, 'LOGIN', '197.250.198.22', ' has login', 25, 16, NULL, NULL, '2022-01-20 11:57:36', 1, 'Firefox - 87.0', 'Linux'),
(348, 'LOG OUT', '197.250.198.22', ' has log out', 25, 16, NULL, NULL, '2022-01-20 12:16:44', 1, 'Firefox - 87.0', 'Linux'),
(349, 'LOGIN', '197.250.198.22', ' has login', 25, 16, NULL, NULL, '2022-01-20 12:44:55', 1, 'Firefox - 87.0', 'Linux'),
(350, 'LOG OUT', '197.250.198.22', ' has log out', 25, 16, NULL, NULL, '2022-01-20 12:57:02', 1, 'Firefox - 87.0', 'Linux'),
(351, 'LOGIN', '197.250.198.22', ' has login', 25, 16, NULL, NULL, '2022-01-20 13:07:39', 1, 'Firefox - 87.0', 'Linux'),
(352, 'LOGIN', '197.250.198.22', ' has login from lock screen', 25, 16, NULL, NULL, '2022-01-20 13:21:42', 1, 'Firefox - 87.0', 'Linux'),
(353, 'LOGIN', '197.250.198.22', ' has login from lock screen', 25, 16, NULL, NULL, '2022-01-20 13:41:12', 1, 'Firefox - 87.0', 'Linux'),
(354, 'LOG OUT', '197.250.198.22', ' has log out', 25, 16, NULL, NULL, '2022-01-20 13:56:43', 1, 'Firefox - 87.0', 'Linux'),
(355, 'LOGIN', '197.250.198.22', ' has login', 25, 16, NULL, NULL, '2022-01-20 14:14:04', 1, 'Firefox - 87.0', 'Linux');
INSERT INTO `tbl_users_logs` (`log_id`, `log_action`, `log_ip`, `log_description`, `log_user`, `log_company`, `log_branch`, `log_zone`, `log_time`, `log_status`, `log_browser`, `log_platform`) VALUES
(356, 'LOGIN', '197.250.198.22', ' has login from lock screen', 25, 16, NULL, NULL, '2022-01-20 14:23:58', 1, 'Firefox - 87.0', 'Linux'),
(357, 'LOG OUT', '197.250.198.22', ' has log out', 25, 16, NULL, NULL, '2022-01-20 14:40:03', 1, 'Firefox - 87.0', 'Linux'),
(358, 'LOGIN', '197.250.198.22', ' has login', 25, 16, NULL, NULL, '2022-01-20 14:51:40', 1, 'Firefox - 87.0', 'Linux'),
(359, 'LOGIN', '197.250.198.22', ' has login from lock screen', 25, 16, NULL, NULL, '2022-01-20 14:58:01', 1, 'Firefox - 87.0', 'Linux'),
(360, 'LOGIN', '197.250.198.22', ' has login from lock screen', 25, 16, NULL, NULL, '2022-01-20 15:11:00', 1, 'Firefox - 87.0', 'Linux'),
(361, 'LOG OUT', '197.250.198.22', ' has log out', 25, 16, NULL, NULL, '2022-01-20 15:21:15', 1, 'Firefox - 87.0', 'Linux'),
(362, 'LOGIN', '197.250.198.22', 'Halfa Salum has login', 1, 1, NULL, NULL, '2022-01-20 15:21:21', 1, 'Firefox - 87.0', 'Linux'),
(363, 'LOGIN', '197.250.198.22', 'Halfa Salum has login from lock screen', 1, 1, NULL, NULL, '2022-01-20 15:31:13', 1, 'Firefox - 87.0', 'Linux'),
(364, 'CREATE', '197.250.198.22', 'Halfa Salum has create new module control (Intermediate Loan Request Approval)', 1, 1, NULL, NULL, '2022-01-20 15:35:11', 1, 'Firefox - 87.0', 'Linux'),
(365, 'CREATE', '197.250.198.22', 'Halfa Salum has create new module control (Intermediate Loan Return Approval)', 1, 1, NULL, NULL, '2022-01-20 15:37:30', 1, 'Firefox - 87.0', 'Linux'),
(366, 'CREATE', '197.250.198.22', 'Halfa Salum has create new module control (Final Loan Request Approval)', 1, 1, NULL, NULL, '2022-01-20 15:38:05', 1, 'Firefox - 87.0', 'Linux'),
(367, 'CREATE', '197.250.198.22', 'Halfa Salum has create new module control (Final Loan Return Approval)', 1, 1, NULL, NULL, '2022-01-20 15:38:24', 1, 'Firefox - 87.0', 'Linux'),
(368, 'LOG OUT', '197.250.198.22', 'Halfa Salum has log out', 1, 1, NULL, NULL, '2022-01-20 15:39:54', 1, 'Firefox - 87.0', 'Linux'),
(369, 'LOGIN', '197.250.198.22', ' has login', 25, 16, NULL, NULL, '2022-01-20 15:39:59', 1, 'Firefox - 87.0', 'Linux'),
(370, 'LOG OUT', '197.250.198.22', ' has log out', 25, 16, NULL, NULL, '2022-01-20 15:49:13', 1, 'Firefox - 87.0', 'Linux'),
(371, 'LOGIN', '197.250.198.22', 'Halfa Salum has login', 1, 1, NULL, NULL, '2022-01-20 15:49:20', 1, 'Firefox - 87.0', 'Linux'),
(372, 'CREATE', '197.250.198.22', 'Halfa Salum has create new module control (Request Loan)', 1, 1, NULL, NULL, '2022-01-20 15:54:13', 1, 'Firefox - 87.0', 'Linux'),
(373, 'LOG OUT', '197.250.198.22', 'Halfa Salum has log out', 1, 1, NULL, NULL, '2022-01-20 15:58:05', 1, 'Firefox - 87.0', 'Linux'),
(374, 'LOGIN', '197.250.198.22', ' has login', 25, 16, NULL, NULL, '2022-01-20 15:58:10', 1, 'Firefox - 87.0', 'Linux'),
(375, 'UPDATE', '197.250.198.22', ' has update role (Manager)', 25, 16, NULL, NULL, '2022-01-20 15:59:14', 1, 'Firefox - 87.0', 'Linux'),
(376, 'LOG OUT', '197.250.198.22', ' has log out', 25, 16, NULL, NULL, '2022-01-20 15:59:22', 1, 'Firefox - 87.0', 'Linux'),
(377, 'LOGIN', '197.250.198.22', ' has login', 25, 16, NULL, NULL, '2022-01-20 15:59:28', 1, 'Firefox - 87.0', 'Linux'),
(378, 'CREATE', '197.250.198.22', ' has create new role (Branch Manager)', 25, 16, NULL, NULL, '2022-01-20 16:03:04', 1, 'Firefox - 87.0', 'Linux'),
(379, 'CREATE', '197.250.198.22', ' has create new role (Loan Officer)', 25, 16, NULL, NULL, '2022-01-20 16:04:01', 1, 'Firefox - 87.0', 'Linux'),
(380, 'UPDATE', '197.250.198.22', ' has update role for the user with ref number (25)', 25, 16, NULL, NULL, '2022-01-20 16:05:32', 1, 'Firefox - 87.0', 'Linux'),
(381, 'LOG OUT', '197.250.198.22', ' has log out', 25, 16, NULL, NULL, '2022-01-20 16:06:25', 1, 'Firefox - 87.0', 'Linux'),
(382, 'LOGIN', '197.250.198.22', 'Halfa Salum has login', 1, 1, NULL, NULL, '2022-01-20 16:06:30', 1, 'Firefox - 87.0', 'Linux'),
(383, 'UPDATE', '197.250.198.22', 'Halfa Salum has update role for the user with ref number (25)', 1, 1, NULL, NULL, '2022-01-20 16:08:48', 1, 'Firefox - 87.0', 'Linux'),
(384, 'LOG OUT', '197.250.198.22', 'Halfa Salum has log out', 1, 1, NULL, NULL, '2022-01-20 16:09:01', 1, 'Firefox - 87.0', 'Linux'),
(385, 'LOGIN', '197.250.198.22', ' has login', 25, 16, NULL, NULL, '2022-01-20 16:09:08', 1, 'Firefox - 87.0', 'Linux'),
(386, 'UPDATE', '197.250.198.22', ' has update role for the user with ref number (25)', 25, 16, NULL, NULL, '2022-01-20 16:09:32', 1, 'Firefox - 87.0', 'Linux'),
(387, 'LOG OUT', '197.250.198.22', ' has log out', 25, 16, NULL, NULL, '2022-01-20 16:12:53', 1, 'Firefox - 87.0', 'Linux'),
(388, 'LOGIN', '197.250.198.22', ' has login', 25, 16, NULL, NULL, '2022-01-20 16:12:58', 1, 'Firefox - 87.0', 'Linux'),
(389, 'LOG OUT', '197.250.198.22', ' has log out', 25, 16, NULL, NULL, '2022-01-20 16:16:26', 1, 'Firefox - 87.0', 'Linux'),
(390, 'LOGIN', '197.250.198.22', 'Halfa Salum has login', 1, 1, NULL, NULL, '2022-01-20 16:16:31', 1, 'Firefox - 87.0', 'Linux'),
(391, 'CREATE', '197.250.198.22', 'Halfa Salum has create new module control (Higher Approval)', 1, 1, NULL, NULL, '2022-01-20 16:17:02', 1, 'Firefox - 87.0', 'Linux'),
(392, 'LOG OUT', '197.250.198.22', 'Halfa Salum has log out', 1, 1, NULL, NULL, '2022-01-20 16:20:33', 1, 'Firefox - 87.0', 'Linux'),
(393, 'LOGIN', '197.250.198.22', ' has login', 25, 16, NULL, NULL, '2022-01-20 16:20:40', 1, 'Firefox - 87.0', 'Linux'),
(394, 'UPDATE', '197.250.198.22', ' has update role (Branch Manager)', 25, 16, NULL, NULL, '2022-01-20 16:21:16', 1, 'Firefox - 87.0', 'Linux'),
(395, 'LOG OUT', '197.250.198.22', ' has log out', 25, 16, NULL, NULL, '2022-01-20 16:21:21', 1, 'Firefox - 87.0', 'Linux'),
(396, 'LOGIN', '197.250.198.22', ' has login', 25, 16, NULL, NULL, '2022-01-20 16:21:26', 1, 'Firefox - 87.0', 'Linux'),
(397, 'UPDATE', '197.250.198.22', ' has update role (Branch Manager)', 25, 16, NULL, NULL, '2022-01-20 16:22:19', 1, 'Firefox - 87.0', 'Linux'),
(398, 'LOG OUT', '197.250.198.22', ' has log out', 25, 16, NULL, NULL, '2022-01-20 16:22:53', 1, 'Firefox - 87.0', 'Linux'),
(399, 'LOGIN', '197.250.198.22', ' has login', 25, 16, NULL, NULL, '2022-01-20 16:22:58', 1, 'Firefox - 87.0', 'Linux'),
(400, 'LOG OUT', '197.250.198.22', ' has log out', 25, 16, NULL, NULL, '2022-01-20 16:23:25', 1, 'Firefox - 87.0', 'Linux'),
(401, 'LOGIN', '197.250.198.22', 'Halfa Salum has login', 1, 1, NULL, NULL, '2022-01-20 16:23:32', 1, 'Firefox - 87.0', 'Linux'),
(402, 'LOG OUT', '197.250.198.22', 'Halfa Salum has log out', 1, 1, NULL, NULL, '2022-01-20 16:25:55', 1, 'Firefox - 87.0', 'Linux'),
(403, 'LOGIN', '197.250.198.22', ' has login', 25, 16, NULL, NULL, '2022-01-20 16:26:01', 1, 'Firefox - 87.0', 'Linux'),
(404, 'LOG OUT', '197.250.198.22', ' has log out', 25, 16, NULL, NULL, '2022-01-20 16:38:55', 1, 'Firefox - 87.0', 'Linux'),
(405, 'LOGIN', '197.250.198.22', ' has login', 25, 16, NULL, NULL, '2022-01-20 16:50:02', 1, 'Firefox - 87.0', 'Linux'),
(406, 'LOG OUT', '197.250.198.22', ' has log out', 25, 16, NULL, NULL, '2022-01-20 17:03:20', 1, 'Firefox - 87.0', 'Linux'),
(407, 'LOGIN', '197.250.198.22', ' has login', 25, 16, NULL, NULL, '2022-01-20 17:16:42', 1, 'Firefox - 87.0', 'Linux'),
(408, 'UPDATE', '197.250.198.22', ' has update user branch for the user with ref number (25)', 25, 16, NULL, NULL, '2022-01-20 17:17:25', 1, 'Firefox - 87.0', 'Linux'),
(409, 'UPDATE', '197.250.198.22', ' has update user assigned zone for the user with ref number (25)', 25, 16, NULL, NULL, '2022-01-20 17:17:25', 1, 'Firefox - 87.0', 'Linux'),
(410, 'LOGIN', '197.250.198.22', ' has login from lock screen', 25, 16, NULL, NULL, '2022-01-20 17:31:24', 1, 'Firefox - 87.0', 'Linux'),
(411, 'LOGIN', '197.250.198.22', ' has login from lock screen', 25, 16, NULL, NULL, '2022-01-20 17:48:16', 1, 'Firefox - 87.0', 'Linux'),
(412, 'LOGIN', '197.250.198.22', ' has login from lock screen', 25, 16, NULL, NULL, '2022-01-20 17:56:28', 1, 'Firefox - 87.0', 'Linux'),
(413, 'UPDATE', '197.250.198.22', ' has update role (Branch Manager)', 25, 16, NULL, NULL, '2022-01-20 18:01:16', 1, 'Firefox - 87.0', 'Linux'),
(414, 'LOG OUT', '197.250.198.22', ' has log out', 25, 16, NULL, NULL, '2022-01-20 18:01:23', 1, 'Firefox - 87.0', 'Linux'),
(415, 'LOGIN', '197.250.198.22', ' has login', 25, 16, NULL, NULL, '2022-01-20 18:01:29', 1, 'Firefox - 87.0', 'Linux'),
(416, 'LOG OUT', '197.250.198.22', ' has log out', 25, 16, NULL, NULL, '2022-01-20 18:13:40', 1, 'Firefox - 87.0', 'Linux'),
(417, 'LOGIN', '197.250.198.22', ' has login', 25, 16, NULL, NULL, '2022-01-20 18:15:51', 1, 'Firefox - 87.0', 'Linux'),
(418, 'UPDATE', '197.250.198.22', ' has update role (Branch Manager)', 25, 16, NULL, NULL, '2022-01-20 18:16:18', 1, 'Firefox - 87.0', 'Linux'),
(419, 'LOG OUT', '197.250.198.22', ' has log out', 25, 16, NULL, NULL, '2022-01-20 18:16:22', 1, 'Firefox - 87.0', 'Linux'),
(420, 'LOGIN', '197.250.198.22', ' has login', 25, 16, NULL, NULL, '2022-01-20 18:16:27', 1, 'Firefox - 87.0', 'Linux'),
(421, 'UPDATE', '197.250.198.22', ' has update role (Branch Manager)', 25, 16, NULL, NULL, '2022-01-20 18:16:55', 1, 'Firefox - 87.0', 'Linux'),
(422, 'LOG OUT', '197.250.198.22', ' has log out', 25, 16, NULL, NULL, '2022-01-20 18:17:25', 1, 'Firefox - 87.0', 'Linux'),
(423, 'LOGIN', '197.250.198.22', ' has login', 25, 16, NULL, NULL, '2022-01-20 18:17:32', 1, 'Firefox - 87.0', 'Linux'),
(424, 'LOGIN', '197.250.198.22', ' has login from lock screen', 25, 16, NULL, NULL, '2022-01-20 18:43:46', 1, 'Firefox - 87.0', 'Linux'),
(425, 'LOGIN', '197.250.198.22', ' has login', 25, 16, NULL, NULL, '2022-01-21 10:08:00', 1, 'Firefox - 87.0', 'Linux'),
(426, 'LOG OUT', '197.250.198.22', ' has log out', 25, 16, NULL, NULL, '2022-01-21 10:19:08', 1, 'Firefox - 87.0', 'Linux'),
(427, 'LOGIN', '197.250.198.22', ' has login', 25, 16, NULL, NULL, '2022-01-21 10:21:59', 1, 'Firefox - 87.0', 'Linux'),
(428, 'LOGIN', '197.250.198.22', ' has login from lock screen', 25, 16, NULL, NULL, '2022-01-21 10:31:06', 1, 'Firefox - 87.0', 'Linux'),
(429, 'LOG OUT', '197.250.198.22', ' has log out', 25, 16, NULL, NULL, '2022-01-21 10:50:41', 1, 'Firefox - 87.0', 'Linux'),
(430, 'LOGIN', '197.250.198.22', ' has login', 25, 16, NULL, NULL, '2022-01-21 10:53:25', 1, 'Firefox - 87.0', 'Linux'),
(431, 'LOG OUT', '197.250.198.22', ' has log out', 25, 16, NULL, NULL, '2022-01-21 11:08:31', 1, 'Firefox - 87.0', 'Linux'),
(432, 'LOGIN', '197.250.198.22', ' has login', 25, 16, NULL, NULL, '2022-01-21 11:24:35', 1, 'Firefox - 87.0', 'Linux'),
(433, 'LOG OUT', '197.250.198.22', ' has log out', 25, 16, NULL, NULL, '2022-01-21 11:35:22', 1, 'Firefox - 87.0', 'Linux'),
(434, 'LOGIN', '197.250.198.22', ' has login', 25, 16, NULL, NULL, '2022-01-21 11:42:33', 1, 'Firefox - 87.0', 'Linux'),
(435, 'LOG OUT', '197.250.198.22', ' has log out', 25, 16, NULL, NULL, '2022-01-21 14:47:56', 1, 'Firefox - 87.0', 'Linux'),
(436, 'LOGIN', '197.250.198.22', ' has login', 25, 16, NULL, NULL, '2022-01-21 14:58:36', 1, 'Firefox - 87.0', 'Linux'),
(437, 'LOG OUT', '197.250.198.22', ' has log out', 25, 16, NULL, NULL, '2022-01-21 16:20:41', 1, 'Firefox - 87.0', 'Linux'),
(438, 'LOGIN', '197.250.198.22', ' has login', 25, 16, NULL, NULL, '2022-01-21 16:31:56', 1, 'Firefox - 87.0', 'Linux'),
(439, 'LOGIN', '197.250.198.22', ' has login from lock screen', 25, 16, NULL, NULL, '2022-01-21 17:01:54', 1, 'Firefox - 87.0', 'Linux'),
(440, 'LOGIN', '197.250.198.22', ' has login from lock screen', 25, 16, NULL, NULL, '2022-01-21 17:36:54', 1, 'Firefox - 87.0', 'Linux'),
(441, 'LOGIN', '197.250.198.22', ' has login from lock screen', 25, 16, NULL, NULL, '2022-01-21 17:42:03', 1, 'Firefox - 87.0', 'Linux'),
(442, 'LOGIN', '197.250.198.22', ' has login from lock screen', 25, 16, NULL, NULL, '2022-01-21 18:02:11', 1, 'Firefox - 87.0', 'Linux'),
(443, 'LOG OUT', '197.250.198.22', ' has log out', 25, 16, NULL, NULL, '2022-01-21 18:16:15', 1, 'Firefox - 87.0', 'Linux'),
(444, 'LOGIN', '197.250.198.22', ' has login', 25, 16, NULL, NULL, '2022-01-21 18:28:39', 1, 'Firefox - 87.0', 'Linux'),
(445, 'LOGIN', '197.250.198.22', ' has login from lock screen', 25, 16, NULL, NULL, '2022-01-21 18:48:17', 1, 'Firefox - 87.0', 'Linux'),
(446, 'LOGIN', '197.250.198.22', ' has login from lock screen', 25, 16, NULL, NULL, '2022-01-21 19:02:11', 1, 'Firefox - 87.0', 'Linux'),
(447, 'LOGIN', '169.255.184.132', ' has login', 25, 16, NULL, NULL, '2022-01-21 22:07:32', 1, 'Firefox - 87.0', 'Linux'),
(448, 'LOGIN', '169.255.184.132', ' has login from lock screen', 25, 16, NULL, NULL, '2022-01-21 22:16:16', 1, 'Firefox - 87.0', 'Linux'),
(449, 'LOG OUT', '169.255.184.132', ' has log out', 25, 16, NULL, NULL, '2022-01-21 22:32:28', 1, 'Firefox - 87.0', 'Linux'),
(450, 'LOGIN', '169.255.184.132', ' has login', 25, 16, NULL, NULL, '2022-01-21 22:50:28', 1, 'Firefox - 87.0', 'Linux'),
(451, 'LOGIN', '169.255.184.132', ' has login from lock screen', 25, 16, NULL, NULL, '2022-01-21 23:02:04', 1, 'Firefox - 87.0', 'Linux'),
(452, 'LOGIN', '196.249.97.171', ' has login', 25, 16, NULL, NULL, '2022-01-22 06:32:46', 1, 'Firefox - 87.0', 'Linux'),
(453, 'LOGIN', '196.249.97.171', ' has login from lock screen', 25, 16, NULL, NULL, '2022-01-22 07:19:33', 1, 'Firefox - 87.0', 'Linux'),
(454, 'LOGIN', '196.249.97.171', ' has login from lock screen', 25, 16, NULL, NULL, '2022-01-22 07:33:53', 1, 'Firefox - 87.0', 'Linux'),
(455, 'LOGIN', '196.249.97.171', ' has login from lock screen', 25, 16, NULL, NULL, '2022-01-22 07:44:19', 1, 'Firefox - 87.0', 'Linux'),
(456, 'LOG OUT', '196.249.97.171', ' has log out', 25, 16, NULL, NULL, '2022-01-22 08:12:32', 1, 'Firefox - 87.0', 'Linux'),
(457, 'LOGIN', '196.249.97.171', ' has login', 25, 16, NULL, NULL, '2022-01-22 08:14:27', 1, 'Firefox - 87.0', 'Linux'),
(458, 'LOG OUT', '196.249.97.171', ' has log out', 25, 16, NULL, NULL, '2022-01-22 08:25:40', 1, 'Firefox - 87.0', 'Linux'),
(459, 'LOGIN', '196.249.97.171', ' has login', 25, 16, NULL, NULL, '2022-01-22 08:33:32', 1, 'Firefox - 87.0', 'Linux'),
(460, 'LOGIN', '197.250.198.22', ' has login', 25, 16, NULL, NULL, '2022-01-22 11:40:31', 1, 'Firefox - 87.0', 'Linux'),
(461, 'LOGIN', '197.250.198.22', ' has login from lock screen', 25, 16, NULL, NULL, '2022-01-22 11:54:15', 1, 'Firefox - 87.0', 'Linux'),
(462, 'LOGIN', '197.250.198.22', ' has login from lock screen', 25, 16, NULL, NULL, '2022-01-22 12:04:30', 1, 'Firefox - 87.0', 'Linux'),
(463, 'LOGIN', '197.250.198.22', ' has login from lock screen', 25, 16, NULL, NULL, '2022-01-22 12:23:18', 1, 'Firefox - 87.0', 'Linux'),
(464, 'LOG OUT', '197.250.198.22', ' has log out', 25, 16, NULL, NULL, '2022-01-22 12:34:31', 1, 'Firefox - 87.0', 'Linux'),
(465, 'LOGIN', '196.249.98.85', ' has login', 25, 16, NULL, NULL, '2022-01-22 20:14:59', 1, 'Firefox - 87.0', 'Linux'),
(466, 'LOG OUT', '196.249.98.85', ' has log out', 25, 16, NULL, NULL, '2022-01-22 20:26:35', 1, 'Firefox - 87.0', 'Linux'),
(467, 'LOGIN', '196.249.97.82', ' has login', 25, 16, NULL, NULL, '2022-01-23 07:46:07', 1, 'Firefox - 87.0', 'Linux'),
(468, 'LOGIN', '196.249.97.82', ' has login from lock screen', 25, 16, NULL, NULL, '2022-01-23 08:01:04', 1, 'Firefox - 87.0', 'Linux'),
(469, 'LOG OUT', '196.249.97.82', ' has log out', 25, 16, NULL, NULL, '2022-01-23 08:24:41', 1, 'Firefox - 87.0', 'Linux'),
(470, 'LOGIN', '169.255.184.160', ' has login', 25, 16, NULL, NULL, '2022-01-23 14:04:19', 1, 'Chrome - 92.0.4515.131', 'Linux'),
(471, 'LOG OUT', '169.255.184.160', ' has log out', 25, 16, NULL, NULL, '2022-01-23 14:15:58', 1, 'Chrome - 92.0.4515.131', 'Linux'),
(472, 'LOGIN', '169.255.184.160', ' has login', 25, 16, NULL, NULL, '2022-01-23 17:51:07', 1, 'Firefox - 87.0', 'Linux'),
(473, 'LOG OUT', '169.255.184.160', ' has log out', 25, 16, NULL, NULL, '2022-01-23 18:01:20', 1, 'Firefox - 87.0', 'Linux'),
(474, 'LOGIN', '41.75.223.216', ' has login', 25, 16, NULL, NULL, '2022-01-25 12:44:53', 1, 'Chrome - 97.0.4692.99', 'Windows 10'),
(475, 'LOG OUT', '41.75.223.216', ' has log out', 25, 16, NULL, NULL, '2022-01-25 12:45:49', 1, 'Chrome - 97.0.4692.99', 'Windows 10'),
(476, 'LOGIN', '41.59.193.231', ' has login', 25, 16, NULL, NULL, '2022-01-25 19:03:37', 1, 'Firefox - 87.0', 'Linux'),
(477, 'LOG OUT', '41.59.193.231', ' has log out', 25, 16, NULL, NULL, '2022-01-25 19:13:43', 1, 'Firefox - 87.0', 'Linux'),
(478, 'LOGIN', '41.59.193.231', ' has login', 25, 16, NULL, NULL, '2022-01-25 19:15:57', 1, 'Firefox - 87.0', 'Linux'),
(479, 'LOGIN', '41.59.193.231', ' has login from lock screen', 25, 16, NULL, NULL, '2022-01-25 19:21:55', 1, 'Firefox - 87.0', 'Linux'),
(480, 'LOGIN', '41.59.193.231', ' has login from lock screen', 25, 16, NULL, NULL, '2022-01-25 19:28:08', 1, 'Firefox - 87.0', 'Linux'),
(481, 'UPDATE', '41.59.193.231', ' has update role for the user with ref number (25)', 25, 16, NULL, NULL, '2022-01-25 19:53:06', 1, 'Firefox - 87.0', 'Linux'),
(482, 'LOG OUT', '41.59.193.231', ' has log out', 25, 16, NULL, NULL, '2022-01-25 19:53:17', 1, 'Firefox - 87.0', 'Linux'),
(483, 'LOGIN', '41.59.193.231', ' has login', 25, 16, NULL, NULL, '2022-01-25 19:53:21', 1, 'Firefox - 87.0', 'Linux'),
(484, 'UPDATE', '41.59.193.231', ' has update role (Manager)', 25, 16, NULL, NULL, '2022-01-25 19:53:55', 1, 'Firefox - 87.0', 'Linux'),
(485, 'LOG OUT', '41.59.193.231', ' has log out', 25, 16, NULL, NULL, '2022-01-25 19:53:59', 1, 'Firefox - 87.0', 'Linux'),
(486, 'LOGIN', '41.59.193.231', ' has login', 25, 16, NULL, NULL, '2022-01-25 19:54:02', 1, 'Firefox - 87.0', 'Linux'),
(487, 'UPDATE', '41.59.193.231', ' has update role for the user with ref number (25)', 25, 16, NULL, NULL, '2022-01-25 19:54:22', 1, 'Firefox - 87.0', 'Linux'),
(488, 'LOG OUT', '41.59.193.231', ' has log out', 25, 16, NULL, NULL, '2022-01-25 19:54:40', 1, 'Firefox - 87.0', 'Linux'),
(489, 'LOGIN', '41.59.193.231', ' has login', 25, 16, NULL, NULL, '2022-01-25 19:54:44', 1, 'Firefox - 87.0', 'Linux'),
(490, 'UPDATE', '41.59.193.231', ' has update role (Branch Manager)', 25, 16, NULL, NULL, '2022-01-25 19:55:43', 1, 'Firefox - 87.0', 'Linux'),
(491, 'LOG OUT', '41.59.193.231', ' has log out', 25, 16, NULL, NULL, '2022-01-25 19:55:59', 1, 'Firefox - 87.0', 'Linux'),
(492, 'LOGIN', '41.59.193.231', ' has login', 25, 16, NULL, NULL, '2022-01-25 19:56:03', 1, 'Firefox - 87.0', 'Linux'),
(493, 'LOG OUT', '41.59.193.231', ' has log out', 25, 16, NULL, NULL, '2022-01-25 19:56:11', 1, 'Firefox - 87.0', 'Linux'),
(494, 'LOGIN', '41.59.193.231', 'Halfa Salum has login', 1, 1, NULL, NULL, '2022-01-25 19:56:15', 1, 'Firefox - 87.0', 'Linux'),
(495, 'LOG OUT', '41.59.193.231', 'Halfa Salum has log out', 1, 1, NULL, NULL, '2022-01-25 19:56:35', 1, 'Firefox - 87.0', 'Linux'),
(496, 'LOGIN', '41.59.193.231', ' has login', 25, 16, NULL, NULL, '2022-01-25 19:56:41', 1, 'Firefox - 87.0', 'Linux'),
(497, 'UPDATE', '41.59.193.231', ' has update role (Branch Manager)', 25, 16, NULL, NULL, '2022-01-25 19:56:59', 1, 'Firefox - 87.0', 'Linux'),
(498, 'UPDATE', '41.59.193.231', ' has update role (Manager)', 25, 16, NULL, NULL, '2022-01-25 19:57:10', 1, 'Firefox - 87.0', 'Linux'),
(499, 'UPDATE', '41.59.193.231', ' has update role (Manager)', 25, 16, NULL, NULL, '2022-01-25 19:57:30', 1, 'Firefox - 87.0', 'Linux'),
(500, 'UPDATE', '41.59.193.231', ' has update role for the user with ref number (25)', 25, 16, NULL, NULL, '2022-01-25 19:57:55', 1, 'Firefox - 87.0', 'Linux'),
(501, 'LOG OUT', '41.59.193.231', ' has log out', 25, 16, NULL, NULL, '2022-01-25 19:57:58', 1, 'Firefox - 87.0', 'Linux'),
(502, 'LOGIN', '41.59.193.231', ' has login', 25, 16, NULL, NULL, '2022-01-25 19:58:02', 1, 'Firefox - 87.0', 'Linux'),
(503, 'LOGIN', '41.59.193.231', ' has login', 25, 16, NULL, NULL, '2022-01-26 16:37:29', 1, 'Firefox - 87.0', 'Linux'),
(504, 'LOG OUT', '41.59.193.231', ' has log out', 25, 16, NULL, NULL, '2022-01-26 16:47:07', 1, 'Firefox - 87.0', 'Linux'),
(505, 'LOGIN', '41.59.193.231', 'Halfa Salum has login', 1, 1, NULL, NULL, '2022-01-26 16:47:12', 1, 'Firefox - 87.0', 'Linux'),
(506, 'LOG OUT', '41.59.193.231', 'Halfa Salum has log out', 1, 1, NULL, NULL, '2022-01-26 16:47:37', 1, 'Firefox - 87.0', 'Linux'),
(507, 'LOGIN', '41.59.193.231', ' has login', 25, 16, NULL, NULL, '2022-01-26 16:47:41', 1, 'Firefox - 87.0', 'Linux'),
(508, 'LOG OUT', '41.59.193.231', ' has log out', 25, 16, NULL, NULL, '2022-01-26 17:02:48', 1, 'Firefox - 87.0', 'Linux'),
(509, 'LOG OUT', '41.59.193.231', ' has log out', 25, 16, NULL, NULL, '2022-01-26 17:03:33', 1, 'Firefox - 87.0', 'Linux'),
(510, 'LOGIN', '41.59.193.231', ' has login', 25, 16, NULL, NULL, '2022-01-27 20:05:21', 1, 'Firefox - 96.0', 'Windows 10'),
(511, 'LOG OUT', '41.59.193.231', ' has log out', 25, 16, NULL, NULL, '2022-01-27 20:05:41', 1, 'Firefox - 96.0', 'Windows 10'),
(512, 'LOGIN', '41.59.193.231', ' has login', 25, 16, NULL, NULL, '2022-01-28 20:04:02', 1, 'Firefox - 96.0', 'Windows 10'),
(513, 'LOG OUT', '41.59.193.231', ' has log out', 25, 16, NULL, NULL, '2022-01-28 20:14:27', 1, 'Firefox - 96.0', 'Windows 10'),
(514, 'LOGIN', '41.59.84.240', ' has login', 25, 16, NULL, NULL, '2022-02-22 21:14:46', 1, 'Firefox - 96.0', 'Windows 10'),
(515, 'LOG OUT', '41.59.84.240', ' has log out', 25, 16, NULL, NULL, '2022-02-22 21:15:48', 1, 'Firefox - 96.0', 'Windows 10'),
(516, 'LOGIN', '197.250.198.22', ' has login', 25, 16, NULL, NULL, '2022-02-23 12:33:30', 1, 'Firefox - 96.0', 'Windows 10'),
(517, 'LOG OUT', '197.250.198.22', ' has log out', 25, 16, NULL, NULL, '2022-02-23 12:34:44', 1, 'Firefox - 96.0', 'Windows 10'),
(518, 'LOGIN', '41.59.84.148', 'Halfa Salum has login', 1, 1, NULL, NULL, '2022-02-24 21:53:07', 1, 'Firefox - 96.0', 'Windows 10'),
(519, 'CREATE', '41.59.84.148', 'Halfa Salum has create new module (Services)', 1, 1, NULL, NULL, '2022-02-24 21:53:37', 1, 'Firefox - 96.0', 'Windows 10'),
(520, 'CREATE', '41.59.84.148', 'Halfa Salum has create new module control (Access Services)', 1, 1, NULL, NULL, '2022-02-24 21:54:04', 1, 'Firefox - 96.0', 'Windows 10'),
(521, 'LOG OUT', '41.59.84.148', 'Halfa Salum has log out', 1, 1, NULL, NULL, '2022-02-24 21:59:22', 1, 'Firefox - 96.0', 'Windows 10'),
(522, 'LOGIN', '41.59.84.148', ' has login', 25, 16, NULL, NULL, '2022-02-24 21:59:26', 1, 'Firefox - 96.0', 'Windows 10'),
(523, 'LOG OUT', '41.59.84.148', ' has log out', 25, 16, NULL, NULL, '2022-02-24 22:10:11', 1, 'Firefox - 96.0', 'Windows 10'),
(524, 'LOGIN', '41.59.84.148', 'Halfa Salum has login', 1, 1, NULL, NULL, '2022-02-24 22:31:15', 1, 'Firefox - 96.0', 'Windows 10'),
(525, 'UPDATE', '41.59.84.148', 'Halfa Salum has update role (Super Admin(SA))', 1, 1, NULL, NULL, '2022-02-24 22:31:33', 1, 'Firefox - 96.0', 'Windows 10'),
(526, 'LOG OUT', '41.59.84.148', 'Halfa Salum has log out', 1, 1, NULL, NULL, '2022-02-24 22:31:39', 1, 'Firefox - 96.0', 'Windows 10'),
(527, 'LOGIN', '41.59.84.148', 'Halfa Salum has login', 1, 1, NULL, NULL, '2022-02-24 22:31:49', 1, 'Firefox - 96.0', 'Windows 10'),
(528, 'LOG OUT', '41.59.84.148', 'Halfa Salum has log out', 1, 1, NULL, NULL, '2022-02-24 22:41:54', 1, 'Firefox - 96.0', 'Windows 10'),
(529, 'LOGIN', '41.59.84.148', 'Halfa Salum has login', 1, 1, NULL, NULL, '2022-02-24 22:42:01', 1, 'Firefox - 96.0', 'Windows 10'),
(530, 'LOGIN', '41.59.84.148', 'Halfa Salum has login from lock screen', 1, 1, NULL, NULL, '2022-02-24 22:59:01', 1, 'Firefox - 96.0', 'Windows 10'),
(531, 'LOG OUT', '41.59.84.148', 'Halfa Salum has log out', 1, 1, NULL, NULL, '2022-02-24 23:17:09', 1, 'Firefox - 96.0', 'Windows 10'),
(532, 'LOGIN', '41.59.84.148', ' has login', 25, 16, NULL, NULL, '2022-02-24 23:29:05', 1, 'Firefox - 96.0', 'Windows 10'),
(533, 'LOG OUT', '41.59.84.148', ' has log out', 25, 16, NULL, NULL, '2022-02-24 23:29:12', 1, 'Firefox - 96.0', 'Windows 10'),
(534, 'LOGIN', '41.59.84.148', 'Halfa Salum has login', 1, 1, NULL, NULL, '2022-02-24 23:29:16', 1, 'Firefox - 96.0', 'Windows 10'),
(535, 'LOGIN', '41.59.84.148', 'Halfa Salum has login from lock screen', 1, 1, NULL, NULL, '2022-02-24 23:43:55', 1, 'Firefox - 96.0', 'Windows 10'),
(536, 'LOGIN', '41.59.84.148', 'Halfa Salum has login from lock screen', 1, 1, NULL, NULL, '2022-02-24 23:55:19', 1, 'Firefox - 96.0', 'Windows 10'),
(537, 'LOGIN', '41.59.84.148', 'Halfa Salum has login from lock screen', 1, 1, NULL, NULL, '2022-02-25 00:16:22', 1, 'Firefox - 96.0', 'Windows 10'),
(538, 'LOGIN', '41.59.84.148', 'Halfa Salum has login from lock screen', 1, 1, NULL, NULL, '2022-02-25 00:54:40', 1, 'Firefox - 96.0', 'Windows 10'),
(539, 'LOGIN', '41.59.84.148', 'Halfa Salum has login from lock screen', 1, 1, NULL, NULL, '2022-02-25 01:51:23', 1, 'Firefox - 96.0', 'Windows 10'),
(540, 'LOGIN', '197.250.198.21', 'Halfa Salum has login', 1, 1, NULL, NULL, '2022-02-25 10:22:39', 1, 'Firefox - 96.0', 'Windows 10'),
(541, 'LOG OUT', '197.250.198.21', 'Halfa Salum has log out', 1, 1, NULL, NULL, '2022-02-25 10:25:22', 1, 'Firefox - 96.0', 'Windows 10'),
(542, 'LOGIN', '197.250.198.21', ' has login', 25, 16, NULL, NULL, '2022-02-25 10:25:38', 1, 'Firefox - 96.0', 'Windows 10'),
(543, 'UPDATE', '197.250.198.21', ' has update role (Manager)', 25, 16, NULL, NULL, '2022-02-25 10:25:57', 1, 'Firefox - 96.0', 'Windows 10'),
(544, 'LOG OUT', '197.250.198.21', ' has log out', 25, 16, NULL, NULL, '2022-02-25 10:26:09', 1, 'Firefox - 96.0', 'Windows 10'),
(545, 'LOGIN', '197.250.198.21', ' has login', 25, 16, NULL, NULL, '2022-02-25 10:26:27', 1, 'Firefox - 96.0', 'Windows 10'),
(546, 'LOGIN', '197.250.198.21', ' has login from lock screen', 25, 16, NULL, NULL, '2022-02-25 10:55:04', 1, 'Firefox - 96.0', 'Windows 10'),
(547, 'LOGIN', '197.250.198.21', ' has login from lock screen', 25, 16, NULL, NULL, '2022-02-25 11:15:49', 1, 'Firefox - 96.0', 'Windows 10'),
(548, 'LOGIN', '197.250.198.21', ' has login from lock screen', 25, 16, NULL, NULL, '2022-02-25 11:22:39', 1, 'Firefox - 96.0', 'Windows 10'),
(549, 'LOGIN', '197.250.198.21', ' has login from lock screen', 25, 16, NULL, NULL, '2022-02-25 11:30:06', 1, 'Firefox - 96.0', 'Windows 10'),
(550, 'LOG OUT', '197.250.198.21', ' has log out', 25, 16, NULL, NULL, '2022-02-25 11:38:29', 1, 'Firefox - 96.0', 'Windows 10'),
(551, 'LOGIN', '197.250.198.21', ' has login', 25, 16, NULL, NULL, '2022-02-25 11:38:33', 1, 'Firefox - 96.0', 'Windows 10'),
(552, 'CREATE', '197.250.198.21', ' has create new user (Manager)', 25, 16, NULL, NULL, '2022-02-25 11:41:12', 1, 'Firefox - 96.0', 'Windows 10'),
(553, 'LOG OUT', '197.250.198.21', ' has log out', 25, 16, NULL, NULL, '2022-02-25 11:45:01', 1, 'Firefox - 96.0', 'Windows 10'),
(554, 'LOGIN', '41.59.94.53', ' has login', 25, 16, NULL, NULL, '2022-02-27 18:32:43', 1, 'Firefox - 96.0', 'Windows 10'),
(555, 'LOG OUT', '41.59.94.53', ' has log out', 25, 16, NULL, NULL, '2022-02-27 18:52:25', 1, 'Firefox - 96.0', 'Windows 10'),
(556, 'LOGIN', '197.250.198.22', ' has login', 25, 16, NULL, NULL, '2022-03-02 10:38:19', 1, 'Firefox - 97.0', 'Windows 10'),
(557, 'UPDATE', '197.250.198.22', ' has update role for the user with ref number (25)', 25, 16, NULL, NULL, '2022-03-02 10:45:54', 1, 'Firefox - 97.0', 'Windows 10'),
(558, 'LOG OUT', '197.250.198.22', ' has log out', 25, 16, NULL, NULL, '2022-03-02 10:45:59', 1, 'Firefox - 97.0', 'Windows 10'),
(559, 'LOGIN', '197.250.198.22', ' has login', 25, 16, NULL, NULL, '2022-03-02 10:46:08', 1, 'Firefox - 97.0', 'Windows 10'),
(560, 'LOGIN', '197.250.198.22', ' has login from lock screen', 25, 16, NULL, NULL, '2022-03-02 11:21:09', 1, 'Firefox - 97.0', 'Windows 10'),
(561, 'LOGIN', '197.250.198.22', ' has login', 25, 16, NULL, NULL, '2022-03-02 11:25:50', 1, 'Firefox - 97.0', 'Windows 10'),
(562, 'LOG OUT', '197.250.198.22', ' has log out', 25, 16, NULL, NULL, '2022-03-02 11:29:19', 1, 'Firefox - 97.0', 'Windows 10'),
(563, 'LOGIN', '197.250.198.22', 'Halfa Salum has login', 1, 1, NULL, NULL, '2022-03-02 11:29:23', 1, 'Firefox - 97.0', 'Windows 10'),
(564, 'LOG OUT', '197.250.198.22', 'Halfa Salum has log out', 1, 1, NULL, NULL, '2022-03-02 11:39:29', 1, 'Firefox - 97.0', 'Windows 10'),
(565, 'LOGIN', '197.250.198.22', ' has login', 25, 16, NULL, NULL, '2022-03-02 12:01:57', 1, 'Firefox - 97.0', 'Windows 10'),
(566, 'LOGIN', '197.250.198.22', ' has login from lock screen', 25, 16, NULL, NULL, '2022-03-02 12:29:20', 1, 'Firefox - 97.0', 'Windows 10'),
(567, 'LOGIN', '197.250.198.22', ' has login from lock screen', 25, 16, NULL, NULL, '2022-03-02 12:37:04', 1, 'Firefox - 97.0', 'Windows 10'),
(568, 'LOG OUT', '197.250.198.22', ' has log out', 25, 16, NULL, NULL, '2022-03-02 12:47:22', 1, 'Firefox - 97.0', 'Windows 10'),
(569, 'LOGIN', '197.250.198.22', ' has login', 25, 16, NULL, NULL, '2022-03-02 13:21:23', 1, 'Firefox - 97.0', 'Windows 10'),
(570, 'LOG OUT', '197.250.198.22', ' has log out', 25, 16, NULL, NULL, '2022-03-02 13:56:19', 1, 'Firefox - 97.0', 'Windows 10'),
(571, 'LOGIN', '197.250.198.22', ' has login', 25, 16, NULL, NULL, '2022-03-02 14:07:48', 1, 'Firefox - 97.0', 'Windows 10'),
(572, 'LOG OUT', '197.250.198.22', ' has log out', 25, 16, NULL, NULL, '2022-03-02 14:21:45', 1, 'Firefox - 97.0', 'Windows 10'),
(573, 'LOGIN', '41.222.179.30', ' has login', 25, 16, NULL, NULL, '2022-03-02 18:20:17', 1, 'Firefox - 97.0', 'Windows 10'),
(574, 'LOGIN', '41.222.181.223', ' has login from lock screen', 25, 16, NULL, NULL, '2022-03-02 18:46:50', 1, 'Firefox - 97.0', 'Windows 10'),
(575, 'LOGIN', '41.222.181.223', ' has login from lock screen', 25, 16, NULL, NULL, '2022-03-02 19:03:39', 1, 'Firefox - 97.0', 'Windows 10'),
(576, 'LOGIN', '41.222.181.223', ' has login', 25, 16, NULL, NULL, '2022-03-02 19:17:01', 1, 'Safari - 604.1', 'iOS'),
(577, 'LOG OUT', '41.222.181.223', ' has log out', 25, 16, NULL, NULL, '2022-03-02 19:21:37', 1, 'Safari - 604.1', 'iOS'),
(578, 'LOGIN', '41.59.94.214', ' has login', 25, 16, NULL, NULL, '2022-03-05 13:08:27', 1, 'Firefox - 97.0', 'Windows 10'),
(579, 'LOG OUT', '41.59.94.214', ' has log out', 25, 16, NULL, NULL, '2022-03-05 13:39:12', 1, 'Firefox - 97.0', 'Windows 10'),
(580, 'LOGIN', '41.59.94.214', ' has login', 25, 16, NULL, NULL, '2022-03-05 13:40:02', 1, 'Firefox - 97.0', 'Windows 10'),
(581, 'LOG OUT', '41.59.94.214', ' has log out', 25, 16, NULL, NULL, '2022-03-05 14:06:29', 1, 'Firefox - 97.0', 'Windows 10'),
(582, 'LOGIN', '41.59.202.151', ' has login', 25, 16, NULL, NULL, '2022-03-11 16:50:10', 1, 'Firefox - 97.0', 'Windows 10'),
(583, 'LOG OUT', '41.59.202.151', ' has log out', 25, 16, NULL, NULL, '2022-03-11 17:07:30', 1, 'Firefox - 97.0', 'Windows 10'),
(584, 'LOGIN', '41.222.180.190', ' has login', 25, 16, NULL, NULL, '2022-03-17 22:50:02', 1, 'Firefox - 98.0', 'Windows 10'),
(585, 'LOG OUT', '41.222.180.190', ' has log out', 25, 16, NULL, NULL, '2022-03-17 22:54:46', 1, 'Firefox - 98.0', 'Windows 10'),
(586, 'LOGIN', '41.222.180.190', 'Halfa Salum has login', 1, 1, NULL, NULL, '2022-03-17 23:03:27', 1, 'Firefox - 98.0', 'Windows 10'),
(587, 'LOG OUT', '41.222.180.190', 'Halfa Salum has log out', 1, 1, NULL, NULL, '2022-03-17 23:03:49', 1, 'Firefox - 98.0', 'Windows 10'),
(588, 'LOGIN', '41.59.193.231', ' has login', 25, 16, NULL, NULL, '2022-03-23 09:52:00', 1, 'Firefox - 98.0', 'Windows 10'),
(589, 'LOG OUT', '41.59.193.231', ' has log out', 25, 16, NULL, NULL, '2022-03-23 09:52:23', 1, 'Firefox - 98.0', 'Windows 10'),
(590, 'LOGIN', '41.59.193.231', ' has login', 25, 16, NULL, NULL, '2022-03-23 10:26:50', 1, 'Firefox - 98.0', 'Windows 10'),
(591, 'LOG OUT', '41.59.193.231', ' has log out', 25, 16, NULL, NULL, '2022-03-23 10:29:02', 1, 'Firefox - 98.0', 'Windows 10'),
(592, 'LOGIN', '41.59.193.231', 'Halfa Salum has login', 1, 1, NULL, NULL, '2022-03-23 10:29:11', 1, 'Firefox - 98.0', 'Windows 10'),
(593, 'LOGIN', '41.59.193.231', 'Halfa Salum has login from lock screen', 1, 1, NULL, NULL, '2022-03-23 10:30:20', 1, 'Firefox - 98.0', 'Windows 10'),
(594, 'UPDATE', '41.59.193.231', 'Halfa Salum has update module (Services)', 1, 1, NULL, NULL, '2022-03-23 10:33:26', 1, 'Firefox - 98.0', 'Windows 10'),
(595, 'LOG OUT', '41.59.193.231', 'Halfa Salum has log out', 1, 1, NULL, NULL, '2022-03-23 10:33:47', 1, 'Firefox - 98.0', 'Windows 10'),
(596, 'LOGIN', '41.59.193.231', ' has login', 25, 16, NULL, NULL, '2022-03-23 10:33:55', 1, 'Firefox - 98.0', 'Windows 10'),
(597, 'LOGIN', '41.59.193.231', ' has login from lock screen', 25, 16, NULL, NULL, '2022-03-23 10:49:25', 1, 'Firefox - 98.0', 'Windows 10'),
(598, 'LOG OUT', '41.59.193.231', ' has log out', 25, 16, NULL, NULL, '2022-03-23 11:00:31', 1, 'Firefox - 98.0', 'Windows 10'),
(599, 'LOGIN', '41.59.193.231', ' has login', 25, 16, NULL, NULL, '2022-03-23 11:23:20', 1, 'Firefox - 98.0', 'Windows 10'),
(600, 'UPDTE', '41.59.193.231', ' has update user (Manager) bio data', 25, 16, NULL, NULL, '2022-03-23 11:37:48', 1, 'Firefox - 98.0', 'Windows 10'),
(601, 'UPDTE', '41.59.193.231', ' has update user (Manager3) bio data', 25, 16, NULL, NULL, '2022-03-23 11:37:56', 1, 'Firefox - 98.0', 'Windows 10'),
(602, 'UPDTE', '41.59.193.231', ' has update user (Manager) bio data', 25, 16, NULL, NULL, '2022-03-23 11:38:05', 1, 'Firefox - 98.0', 'Windows 10'),
(603, 'LOG OUT', '41.59.193.231', ' has log out', 25, 16, NULL, NULL, '2022-03-23 11:49:50', 1, 'Firefox - 98.0', 'Windows 10'),
(604, 'LOGIN', '41.59.193.231', ' has login', 25, 16, NULL, NULL, '2022-03-23 11:52:27', 1, 'Firefox - 98.0', 'Windows 10'),
(605, 'UPDATE', '41.59.193.231', ' has update user with id : 26 username', 25, 16, NULL, NULL, '2022-03-23 11:52:51', 1, 'Firefox - 98.0', 'Windows 10'),
(606, 'UPDATE', '41.59.193.231', ' has update user with id : 26 username', 25, 16, NULL, NULL, '2022-03-23 11:54:25', 1, 'Firefox - 98.0', 'Windows 10'),
(607, 'UPDATE', '41.59.193.231', ' has update user with id : 26 username', 25, 16, NULL, NULL, '2022-03-23 11:54:45', 1, 'Firefox - 98.0', 'Windows 10'),
(608, 'UPDATE', '41.59.193.231', ' has update user with id : 26 password', 25, 16, NULL, NULL, '2022-03-23 11:55:31', 1, 'Firefox - 98.0', 'Windows 10'),
(609, 'LOG OUT', '41.59.193.231', ' has log out', 25, 16, NULL, NULL, '2022-03-23 11:55:40', 1, 'Firefox - 98.0', 'Windows 10'),
(610, 'LOGIN', '197.250.198.22', ' has login', 25, 16, NULL, NULL, '2022-03-24 09:32:23', 1, 'Firefox - 98.0', 'Windows 10'),
(611, 'UPDATE', '197.250.198.22', ' has update user with id : 26 password', 25, 16, NULL, NULL, '2022-03-24 09:33:03', 1, 'Firefox - 98.0', 'Windows 10'),
(612, 'LOG OUT', '197.250.198.22', ' has log out', 25, 16, NULL, NULL, '2022-03-24 09:33:15', 1, 'Firefox - 98.0', 'Windows 10'),
(613, 'LOGIN', '197.250.198.22', 'Manager has login', 26, 16, NULL, NULL, '2022-03-24 09:35:39', 1, 'Firefox - 98.0', 'Windows 10'),
(614, 'LOG OUT', '197.250.198.22', 'Manager has log out', 26, 16, NULL, NULL, '2022-03-24 09:36:48', 1, 'Firefox - 98.0', 'Windows 10'),
(615, 'LOGIN', '197.250.198.22', ' has login', 25, 16, NULL, NULL, '2022-03-24 09:36:55', 1, 'Firefox - 98.0', 'Windows 10'),
(616, 'UPDATE', '197.250.198.22', ' has update role for the user with ref number (26)', 25, 16, NULL, NULL, '2022-03-24 09:37:31', 1, 'Firefox - 98.0', 'Windows 10'),
(617, 'UPDATE', '197.250.198.22', ' has update user branch for the user with ref number (26)', 25, 16, NULL, NULL, '2022-03-24 09:37:41', 1, 'Firefox - 98.0', 'Windows 10'),
(618, 'CREATE', '197.250.198.22', ' has create new user (Officer)', 25, 16, NULL, NULL, '2022-03-24 09:38:16', 1, 'Firefox - 98.0', 'Windows 10'),
(619, 'LOG OUT', '197.250.198.22', ' has log out', 25, 16, NULL, NULL, '2022-03-24 09:39:15', 1, 'Firefox - 98.0', 'Windows 10'),
(620, 'LOGIN', '197.250.198.22', ' has login', 25, 16, NULL, NULL, '2022-03-24 09:39:22', 1, 'Firefox - 98.0', 'Windows 10'),
(621, 'UPDATE', '197.250.198.22', ' has update user (Admin) bio data', 25, 16, NULL, NULL, '2022-03-24 09:40:40', 1, 'Firefox - 98.0', 'Windows 10'),
(622, 'LOG OUT', '197.250.198.22', ' has log out', 25, 16, NULL, NULL, '2022-03-24 09:40:55', 1, 'Firefox - 98.0', 'Windows 10'),
(623, 'LOGIN', '197.250.198.22', 'Manager has login', 26, 16, NULL, NULL, '2022-03-24 09:41:02', 1, 'Firefox - 98.0', 'Windows 10'),
(624, 'LOG OUT', '197.250.198.22', 'Manager has log out', 26, 16, NULL, NULL, '2022-03-24 09:41:11', 1, 'Firefox - 98.0', 'Windows 10'),
(625, 'LOGIN', '197.250.198.22', 'Admin has login', 25, 16, NULL, NULL, '2022-03-24 09:41:18', 1, 'Firefox - 98.0', 'Windows 10'),
(626, 'UPDATE', '197.250.198.22', 'Admin has update user with id : 27 username', 25, 16, NULL, NULL, '2022-03-24 09:42:08', 1, 'Firefox - 98.0', 'Windows 10'),
(627, 'UPDATE', '197.250.198.22', 'Admin has update user with id : 27 password', 25, 16, NULL, NULL, '2022-03-24 09:42:27', 1, 'Firefox - 98.0', 'Windows 10'),
(628, 'LOG OUT', '197.250.198.22', 'Admin has log out', 25, 16, NULL, NULL, '2022-03-24 09:43:12', 1, 'Firefox - 98.0', 'Windows 10'),
(629, 'LOGIN', '197.250.198.22', 'Officer has login', 27, 16, NULL, NULL, '2022-03-24 09:44:06', 1, 'Firefox - 98.0', 'Windows 10'),
(630, 'LOG OUT', '197.250.198.22', 'Officer has log out', 27, 16, NULL, NULL, '2022-03-24 09:44:13', 1, 'Firefox - 98.0', 'Windows 10'),
(631, 'LOGIN', '197.250.198.22', 'Admin has login', 25, 16, NULL, NULL, '2022-03-24 09:44:18', 1, 'Firefox - 98.0', 'Windows 10'),
(632, 'UPDATE', '197.250.198.22', 'Admin has update role for the user with ref number (27)', 25, 16, NULL, NULL, '2022-03-24 09:44:33', 1, 'Firefox - 98.0', 'Windows 10'),
(633, 'LOG OUT', '197.250.198.22', 'Admin has log out', 25, 16, NULL, NULL, '2022-03-24 09:44:53', 1, 'Firefox - 98.0', 'Windows 10'),
(634, 'LOGIN', '197.250.198.22', 'Admin has login', 25, 16, NULL, NULL, '2022-03-24 09:48:11', 1, 'Firefox - 98.0', 'Windows 10'),
(635, 'LOG OUT', '197.250.198.22', 'Admin has log out', 25, 16, NULL, NULL, '2022-03-24 09:59:15', 1, 'Firefox - 98.0', 'Windows 10'),
(636, 'LOGIN', '197.250.198.22', 'Admin has login', 25, 16, NULL, NULL, '2022-03-24 10:12:04', 1, 'Firefox - 98.0', 'Windows 10'),
(637, 'LOG OUT', '197.250.198.22', 'Admin has log out', 25, 16, NULL, NULL, '2022-03-24 10:13:25', 1, 'Firefox - 98.0', 'Windows 10'),
(638, 'LOGIN', '197.250.198.22', 'Halfa Salum has login', 1, 1, NULL, NULL, '2022-03-24 10:13:30', 1, 'Firefox - 98.0', 'Windows 10'),
(639, 'LOGIN', '197.250.198.22', 'Halfa Salum has login from lock screen', 1, 1, NULL, NULL, '2022-03-24 10:22:46', 1, 'Firefox - 98.0', 'Windows 10'),
(640, 'LOG OUT', '197.250.198.22', 'Halfa Salum has log out', 1, 1, NULL, NULL, '2022-03-24 10:32:49', 1, 'Firefox - 98.0', 'Windows 10'),
(641, 'LOGIN', '197.250.198.22', 'Admin has login', 25, 16, NULL, NULL, '2022-03-24 12:49:03', 1, 'Firefox - 98.0', 'Windows 10'),
(642, 'LOG OUT', '197.250.198.22', 'Admin has log out', 25, 16, NULL, NULL, '2022-03-24 12:52:33', 1, 'Firefox - 98.0', 'Windows 10'),
(643, 'LOGIN', '197.250.198.22', 'Halfa Salum has login', 1, 1, NULL, NULL, '2022-03-24 12:52:38', 1, 'Firefox - 98.0', 'Windows 10'),
(644, 'LOGIN', '197.250.198.22', 'Halfa Salum has login from lock screen', 1, 1, NULL, NULL, '2022-03-24 12:58:47', 1, 'Firefox - 98.0', 'Windows 10'),
(645, 'LOG OUT', '197.250.198.22', 'Halfa Salum has log out', 1, 1, NULL, NULL, '2022-03-24 13:02:13', 1, 'Firefox - 98.0', 'Windows 10'),
(646, 'LOGIN', '197.250.198.22', 'Admin has login', 25, 16, NULL, NULL, '2022-03-24 13:02:21', 1, 'Firefox - 98.0', 'Windows 10'),
(647, 'UPDATE', '197.250.198.22', 'Admin has update user assigned zone for the user with ref number (27)', 25, 16, NULL, NULL, '2022-03-24 13:03:05', 1, 'Firefox - 98.0', 'Windows 10'),
(648, 'UPDATE', '197.250.198.22', 'Admin has update role for the user with ref number (25)', 25, 16, NULL, NULL, '2022-03-24 13:03:45', 1, 'Firefox - 98.0', 'Windows 10'),
(649, 'LOG OUT', '197.250.198.22', 'Admin has log out', 25, 16, NULL, NULL, '2022-03-24 13:03:49', 1, 'Firefox - 98.0', 'Windows 10'),
(650, 'LOGIN', '197.250.198.22', 'Officer has login', 27, 16, NULL, NULL, '2022-03-24 13:03:58', 1, 'Firefox - 98.0', 'Windows 10'),
(651, 'LOG OUT', '197.250.198.22', 'Officer has log out', 27, 16, NULL, NULL, '2022-03-24 13:04:26', 1, 'Firefox - 98.0', 'Windows 10'),
(652, 'LOGIN', '197.250.198.22', 'Admin has login', 25, 16, NULL, NULL, '2022-03-24 13:04:39', 1, 'Firefox - 98.0', 'Windows 10'),
(653, 'UPDATE', '197.250.198.22', 'Admin has update role (Loan Officer)', 25, 16, NULL, NULL, '2022-03-24 13:06:01', 1, 'Firefox - 98.0', 'Windows 10'),
(654, 'LOG OUT', '197.250.198.22', 'Admin has log out', 25, 16, NULL, NULL, '2022-03-24 13:06:05', 1, 'Firefox - 98.0', 'Windows 10'),
(655, 'LOGIN', '197.250.198.22', 'Officer has login', 27, 16, NULL, NULL, '2022-03-24 13:06:10', 1, 'Firefox - 98.0', 'Windows 10'),
(656, 'REGISTER', '197.250.198.22', 'Officer has register new customer (customer 1)', 27, 16, NULL, NULL, '2022-03-24 13:08:20', 1, 'Firefox - 98.0', 'Windows 10'),
(657, 'LOG OUT', '197.250.198.22', 'Officer has log out', 27, 16, NULL, NULL, '2022-03-24 13:10:43', 1, 'Firefox - 98.0', 'Windows 10'),
(658, 'LOGIN', '197.250.198.22', 'Admin has login', 25, 16, NULL, NULL, '2022-03-24 13:10:58', 1, 'Firefox - 98.0', 'Windows 10'),
(659, 'LOG OUT', '197.250.198.22', 'Admin has log out', 25, 16, NULL, NULL, '2022-03-24 13:11:35', 1, 'Firefox - 98.0', 'Windows 10'),
(660, 'LOGIN', '197.250.198.22', 'Manager has login', 26, 16, NULL, NULL, '2022-03-24 13:11:48', 1, 'Firefox - 98.0', 'Windows 10'),
(661, 'LOG OUT', '197.250.198.22', 'Manager has log out', 26, 16, NULL, NULL, '2022-03-24 13:12:36', 1, 'Firefox - 98.0', 'Windows 10'),
(662, 'LOGIN', '197.250.198.22', 'Admin has login', 25, 16, NULL, NULL, '2022-03-24 13:12:45', 1, 'Firefox - 98.0', 'Windows 10'),
(663, 'LOG OUT', '197.250.198.22', 'Admin has log out', 25, 16, NULL, NULL, '2022-03-24 13:13:43', 1, 'Firefox - 98.0', 'Windows 10'),
(664, 'LOGIN', '197.250.198.22', 'Officer has login', 27, 16, NULL, NULL, '2022-03-24 13:13:50', 1, 'Firefox - 98.0', 'Windows 10'),
(665, 'LOGIN', '197.250.198.22', 'Officer has login from lock screen', 27, 16, NULL, NULL, '2022-03-24 13:21:08', 1, 'Firefox - 98.0', 'Windows 10'),
(666, 'LOGIN', '197.250.198.22', 'Officer has login from lock screen', 27, 16, NULL, NULL, '2022-03-24 13:33:29', 1, 'Firefox - 98.0', 'Windows 10'),
(667, 'LOG OUT', '197.250.198.22', 'Officer has log out', 27, 16, NULL, NULL, '2022-03-24 13:38:59', 1, 'Firefox - 98.0', 'Windows 10'),
(668, 'LOGIN', '197.250.198.22', 'Manager has login', 26, 16, NULL, NULL, '2022-03-24 13:39:07', 1, 'Firefox - 98.0', 'Windows 10'),
(669, 'LOG OUT', '197.250.198.22', 'Manager has log out', 26, 16, NULL, NULL, '2022-03-24 13:43:10', 1, 'Firefox - 98.0', 'Windows 10'),
(670, 'LOGIN', '197.250.198.22', 'Halfa Salum has login', 1, 1, NULL, NULL, '2022-03-24 13:44:00', 1, 'Firefox - 98.0', 'Windows 10'),
(671, 'LOGIN', '197.250.198.22', 'Halfa Salum has login from lock screen', 1, 1, NULL, NULL, '2022-03-24 13:52:45', 1, 'Firefox - 98.0', 'Windows 10'),
(672, 'CREATE', '197.250.198.22', 'Halfa Salum has create new module (Companies)', 1, 1, NULL, NULL, '2022-03-24 13:54:47', 1, 'Firefox - 98.0', 'Windows 10'),
(673, 'CREATE', '197.250.198.22', 'Halfa Salum has create new module control (Access Companies)', 1, 1, NULL, NULL, '2022-03-24 13:55:09', 1, 'Firefox - 98.0', 'Windows 10'),
(674, 'UPDATE', '197.250.198.22', 'Halfa Salum has update role (Super Admin(SA))', 1, 1, NULL, NULL, '2022-03-24 13:56:45', 1, 'Firefox - 98.0', 'Windows 10'),
(675, 'LOG OUT', '197.250.198.22', 'Halfa Salum has log out', 1, 1, NULL, NULL, '2022-03-24 13:57:56', 1, 'Firefox - 98.0', 'Windows 10'),
(676, 'LOGIN', '197.250.198.22', 'Manager has login', 26, 16, NULL, NULL, '2022-03-24 13:58:00', 1, 'Firefox - 98.0', 'Windows 10'),
(677, 'LOG OUT', '197.250.198.22', 'Manager has log out', 26, 16, NULL, NULL, '2022-03-24 13:58:55', 1, 'Firefox - 98.0', 'Windows 10'),
(678, 'LOGIN', '197.250.198.22', 'Admin has login', 25, 16, NULL, NULL, '2022-03-24 13:59:09', 1, 'Firefox - 98.0', 'Windows 10'),
(679, 'UPDATE', '197.250.198.22', 'Admin has update user branch for the user with ref number (26)', 25, 16, NULL, NULL, '2022-03-24 13:59:23', 1, 'Firefox - 98.0', 'Windows 10'),
(680, 'UPDATE', '197.250.198.22', 'Admin has update user assigned zone for the user with ref number (26)', 25, 16, NULL, NULL, '2022-03-24 13:59:23', 1, 'Firefox - 98.0', 'Windows 10'),
(681, 'LOG OUT', '197.250.198.22', 'Admin has log out', 25, 16, NULL, NULL, '2022-03-24 13:59:26', 1, 'Firefox - 98.0', 'Windows 10'),
(682, 'LOGIN', '197.250.198.22', 'Manager has login', 26, 16, NULL, NULL, '2022-03-24 13:59:31', 1, 'Firefox - 98.0', 'Windows 10'),
(683, 'LOG OUT', '197.250.198.22', 'Manager has log out', 26, 16, NULL, NULL, '2022-03-24 14:08:25', 1, 'Firefox - 98.0', 'Windows 10'),
(684, 'LOGIN', '197.250.198.22', 'Admin has login', 25, 16, NULL, NULL, '2022-03-24 14:08:32', 1, 'Firefox - 98.0', 'Windows 10'),
(685, 'LOG OUT', '197.250.198.22', 'Admin has log out', 25, 16, NULL, NULL, '2022-03-24 14:12:42', 1, 'Firefox - 98.0', 'Windows 10'),
(686, 'LOGIN', '197.250.198.22', 'Halfa Salum has login', 1, 1, NULL, NULL, '2022-03-24 14:12:49', 1, 'Firefox - 98.0', 'Windows 10'),
(687, 'LOG OUT', '197.250.198.22', 'Halfa Salum has log out', 1, 1, NULL, NULL, '2022-03-24 14:13:13', 1, 'Firefox - 98.0', 'Windows 10'),
(688, 'LOGIN', '197.250.198.22', 'Admin has login', 25, 16, NULL, NULL, '2022-03-24 14:13:18', 1, 'Firefox - 98.0', 'Windows 10'),
(689, 'LOG OUT', '197.250.198.22', 'Admin has log out', 25, 16, NULL, NULL, '2022-03-24 14:14:17', 1, 'Firefox - 98.0', 'Windows 10'),
(690, 'LOGIN', '197.250.198.22', 'Manager has login', 26, 16, NULL, NULL, '2022-03-24 14:14:21', 1, 'Firefox - 98.0', 'Windows 10'),
(691, 'LOGIN', '197.250.198.22', 'Manager has login from lock screen', 26, 16, NULL, NULL, '2022-03-24 14:25:04', 1, 'Firefox - 98.0', 'Windows 10'),
(692, 'LOG OUT', '197.250.198.22', 'Manager has log out', 26, 16, NULL, NULL, '2022-03-24 14:25:11', 1, 'Firefox - 98.0', 'Windows 10'),
(693, 'LOGIN', '197.250.198.22', 'Admin has login', 25, 16, NULL, NULL, '2022-03-24 14:25:16', 1, 'Firefox - 98.0', 'Windows 10'),
(694, 'LOG OUT', '197.250.198.22', 'Admin has log out', 25, 16, NULL, NULL, '2022-03-24 14:44:32', 1, 'Firefox - 98.0', 'Windows 10'),
(695, 'LOGIN', '197.250.198.22', 'Admin has login', 25, 16, NULL, NULL, '2022-03-24 16:05:14', 1, 'Firefox - 98.0', 'Windows 10'),
(696, 'LOG OUT', '197.250.198.22', 'Admin has log out', 25, 16, NULL, NULL, '2022-03-24 16:05:51', 1, 'Firefox - 98.0', 'Windows 10'),
(697, 'LOGIN', '197.250.198.22', 'Admin has login', 25, 16, NULL, NULL, '2022-03-24 16:08:52', 1, 'Firefox - 98.0', 'Windows 10'),
(698, 'LOGIN', '197.250.198.22', 'Admin has login from lock screen', 25, 16, NULL, NULL, '2022-03-24 16:20:15', 1, 'Firefox - 98.0', 'Windows 10'),
(699, 'LOG OUT', '197.250.198.22', 'Admin has log out', 25, 16, NULL, NULL, '2022-03-24 16:47:56', 1, 'Firefox - 98.0', 'Windows 10'),
(700, 'LOGIN', '197.250.198.22', 'Admin has login', 25, 16, NULL, NULL, '2022-03-24 16:49:54', 1, 'Firefox - 98.0', 'Windows 10'),
(701, 'LOG OUT', '197.250.198.22', 'Admin has log out', 25, 16, NULL, NULL, '2022-03-24 17:04:48', 1, 'Firefox - 98.0', 'Windows 10'),
(702, 'LOGIN', '197.250.198.22', 'Admin has login', 25, 16, NULL, NULL, '2022-03-24 17:23:40', 1, 'Firefox - 98.0', 'Windows 10'),
(703, 'LOGIN', '197.250.198.22', 'Admin has login from lock screen', 25, 16, NULL, NULL, '2022-03-24 17:31:46', 1, 'Firefox - 98.0', 'Windows 10'),
(704, 'LOGIN', '197.250.198.22', 'Admin has login from lock screen', 25, 16, NULL, NULL, '2022-03-24 17:41:58', 1, 'Firefox - 98.0', 'Windows 10'),
(705, 'LOGIN', '197.250.198.22', 'Admin has login from lock screen', 25, 16, NULL, NULL, '2022-03-24 17:49:04', 1, 'Firefox - 98.0', 'Windows 10'),
(706, 'LOG OUT', '197.250.198.22', 'Admin has log out', 25, 16, NULL, NULL, '2022-03-24 18:08:04', 1, 'Firefox - 98.0', 'Windows 10'),
(707, 'LOGIN', '197.250.198.22', 'Officer has login', 27, 16, NULL, NULL, '2022-03-24 18:08:09', 1, 'Firefox - 98.0', 'Windows 10'),
(708, 'LOGIN', '41.222.181.145', 'Officer has login', 27, 16, NULL, NULL, '2022-03-25 05:55:25', 1, 'Safari - 604.1', 'iOS'),
(709, 'LOGIN', '41.222.181.35', 'Officer has login', 27, 16, NULL, NULL, '2022-03-26 07:37:15', 1, 'Firefox - 98.0', 'Windows 10'),
(710, 'LOGIN', '41.222.181.35', 'Officer has login from lock screen', 27, 16, NULL, NULL, '2022-03-26 07:42:50', 1, 'Firefox - 98.0', 'Windows 10'),
(711, 'LOG OUT', '41.222.181.35', 'Officer has log out', 27, 16, NULL, NULL, '2022-03-26 07:43:03', 1, 'Firefox - 98.0', 'Windows 10'),
(712, 'LOGIN', '41.222.181.35', 'Admin has login', 25, 16, NULL, NULL, '2022-03-26 07:43:11', 1, 'Firefox - 98.0', 'Windows 10'),
(713, 'UPDATE', '41.222.181.35', 'Admin has update user branch for the user with ref number (26)', 25, 16, NULL, NULL, '2022-03-26 07:44:05', 1, 'Firefox - 98.0', 'Windows 10'),
(714, 'LOG OUT', '41.222.181.35', 'Admin has log out', 25, 16, NULL, NULL, '2022-03-26 07:49:36', 1, 'Firefox - 98.0', 'Windows 10'),
(715, 'LOGIN', '41.222.181.35', 'Admin has login', 25, 16, NULL, NULL, '2022-03-26 08:04:51', 1, 'Firefox - 98.0', 'Windows 10'),
(716, 'LOG OUT', '41.222.181.35', 'Admin has log out', 25, 16, NULL, NULL, '2022-03-26 08:06:49', 1, 'Firefox - 98.0', 'Windows 10'),
(717, 'LOGIN', '41.222.181.35', 'Manager has login', 26, 16, NULL, NULL, '2022-03-26 08:06:55', 1, 'Firefox - 98.0', 'Windows 10'),
(718, 'LOG OUT', '41.222.181.35', 'Manager has log out', 26, 16, NULL, NULL, '2022-03-26 08:09:21', 1, 'Firefox - 98.0', 'Windows 10'),
(719, 'LOGIN', '41.222.181.35', 'Halfa Salum has login', 1, 1, NULL, NULL, '2022-03-26 08:09:28', 1, 'Firefox - 98.0', 'Windows 10'),
(720, 'CREATE', '41.222.181.35', 'Halfa Salum has create new module control (Manage Return Schedules)', 1, 1, NULL, NULL, '2022-03-26 08:10:10', 1, 'Firefox - 98.0', 'Windows 10'),
(721, 'LOG OUT', '41.222.181.35', 'Halfa Salum has log out', 1, 1, NULL, NULL, '2022-03-26 08:14:15', 1, 'Firefox - 98.0', 'Windows 10'),
(722, 'LOGIN', '41.222.181.35', 'Admin has login', 25, 16, NULL, NULL, '2022-03-26 08:14:21', 1, 'Firefox - 98.0', 'Windows 10'),
(723, 'UPDATE', '41.222.181.35', 'Admin has update role (Branch Manager)', 25, 16, NULL, NULL, '2022-03-26 08:14:39', 1, 'Firefox - 98.0', 'Windows 10'),
(724, 'LOG OUT', '41.222.181.35', 'Admin has log out', 25, 16, NULL, NULL, '2022-03-26 08:14:46', 1, 'Firefox - 98.0', 'Windows 10'),
(725, 'LOGIN', '41.222.181.35', 'Manager has login', 26, 16, NULL, NULL, '2022-03-26 08:14:53', 1, 'Firefox - 98.0', 'Windows 10'),
(726, 'LOGIN', '41.222.181.35', 'Manager has login from lock screen', 26, 16, NULL, NULL, '2022-03-26 08:39:26', 1, 'Firefox - 98.0', 'Windows 10');
INSERT INTO `tbl_users_logs` (`log_id`, `log_action`, `log_ip`, `log_description`, `log_user`, `log_company`, `log_branch`, `log_zone`, `log_time`, `log_status`, `log_browser`, `log_platform`) VALUES
(727, 'LOG OUT', '41.222.181.35', 'Manager has log out', 26, 16, NULL, NULL, '2022-03-26 08:39:33', 1, 'Firefox - 98.0', 'Windows 10'),
(728, 'LOGIN', '41.222.181.35', 'Admin has login', 25, 16, NULL, NULL, '2022-03-26 08:39:56', 1, 'Firefox - 98.0', 'Windows 10'),
(729, 'UPDATE', '41.222.181.35', 'Admin has update role (Branch Manager)', 25, 16, NULL, NULL, '2022-03-26 08:40:17', 1, 'Firefox - 98.0', 'Windows 10'),
(730, 'UPDATE', '41.222.181.35', 'Admin has update role (Manager)', 25, 16, NULL, NULL, '2022-03-26 08:40:26', 1, 'Firefox - 98.0', 'Windows 10'),
(731, 'LOG OUT', '41.222.181.35', 'Admin has log out', 25, 16, NULL, NULL, '2022-03-26 08:40:30', 1, 'Firefox - 98.0', 'Windows 10'),
(732, 'LOGIN', '41.222.181.35', 'Manager has login', 26, 16, NULL, NULL, '2022-03-26 08:40:37', 1, 'Firefox - 98.0', 'Windows 10'),
(733, 'LOG OUT', '41.222.181.35', 'Manager has log out', 26, 16, NULL, NULL, '2022-03-26 08:40:43', 1, 'Firefox - 98.0', 'Windows 10'),
(734, 'LOGIN', '41.222.181.35', 'Admin has login', 25, 16, NULL, NULL, '2022-03-26 08:40:54', 1, 'Firefox - 98.0', 'Windows 10'),
(735, 'LOG OUT', '41.222.181.35', 'Admin has log out', 25, 16, NULL, NULL, '2022-03-26 08:48:56', 1, 'Firefox - 98.0', 'Windows 10'),
(736, 'LOGIN', '41.222.181.35', 'Officer has login', 27, 16, NULL, NULL, '2022-03-26 08:49:02', 1, 'Firefox - 98.0', 'Windows 10'),
(737, 'LOG OUT', '41.222.181.35', 'Officer has log out', 27, 16, NULL, NULL, '2022-03-26 08:52:06', 1, 'Firefox - 98.0', 'Windows 10'),
(738, 'LOGIN', '41.222.181.35', 'Manager has login', 26, 16, NULL, NULL, '2022-03-26 08:52:12', 1, 'Firefox - 98.0', 'Windows 10'),
(739, 'LOG OUT', '41.222.181.35', 'Manager has log out', 26, 16, NULL, NULL, '2022-03-26 08:52:21', 1, 'Firefox - 98.0', 'Windows 10'),
(740, 'LOGIN', '41.222.181.35', 'Admin has login', 25, 16, NULL, NULL, '2022-03-26 08:52:28', 1, 'Firefox - 98.0', 'Windows 10'),
(741, 'LOGIN', '41.222.181.35', 'Admin has login from lock screen', 25, 16, NULL, NULL, '2022-03-26 09:15:41', 1, 'Firefox - 98.0', 'Windows 10'),
(742, 'LOGIN', '41.222.181.35', 'Admin has login from lock screen', 25, 16, NULL, NULL, '2022-03-26 09:21:33', 1, 'Firefox - 98.0', 'Windows 10'),
(743, 'LOG OUT', '41.222.181.35', 'Admin has log out', 25, 16, NULL, NULL, '2022-03-26 09:22:50', 1, 'Firefox - 98.0', 'Windows 10'),
(744, 'LOGIN', '41.222.181.35', 'Officer has login', 27, 16, NULL, NULL, '2022-03-26 09:22:55', 1, 'Firefox - 98.0', 'Windows 10'),
(745, 'LOGIN', '41.222.181.35', 'Officer has login from lock screen', 27, 16, NULL, NULL, '2022-03-26 09:30:07', 1, 'Firefox - 98.0', 'Windows 10'),
(746, 'LOG OUT', '41.222.181.35', 'Officer has log out', 27, 16, NULL, NULL, '2022-03-26 10:08:49', 1, 'Firefox - 98.0', 'Windows 10'),
(747, 'LOGIN', '41.222.181.35', 'Manager has login', 26, 16, NULL, NULL, '2022-03-26 10:08:58', 1, 'Firefox - 98.0', 'Windows 10'),
(748, 'LOG OUT', '41.222.181.35', 'Manager has log out', 26, 16, NULL, NULL, '2022-03-26 10:23:07', 1, 'Firefox - 98.0', 'Windows 10'),
(749, 'LOGIN', '41.222.181.35', 'Halfa Salum has login', 1, 1, NULL, NULL, '2022-03-26 11:14:35', 1, 'Firefox - 98.0', 'Windows 10'),
(750, 'LOG OUT', '41.222.181.35', 'Halfa Salum has log out', 1, 1, NULL, NULL, '2022-03-26 11:26:15', 1, 'Firefox - 98.0', 'Windows 10'),
(751, 'LOGIN', '41.222.181.35', 'Admin has login', 25, 16, NULL, NULL, '2022-03-26 11:33:07', 1, 'Firefox - 98.0', 'Windows 10'),
(752, 'LOGIN', '41.222.181.35', 'Admin has login from lock screen', 25, 16, NULL, NULL, '2022-03-26 11:38:45', 1, 'Firefox - 98.0', 'Windows 10'),
(753, 'LOGIN', '41.222.181.35', 'Admin has login from lock screen', 25, 16, NULL, NULL, '2022-03-26 11:50:03', 1, 'Firefox - 98.0', 'Windows 10'),
(754, 'LOGIN', '41.222.181.35', 'Admin has login from lock screen', 25, 16, NULL, NULL, '2022-03-26 12:05:21', 1, 'Firefox - 98.0', 'Windows 10'),
(755, 'LOG OUT', '41.222.181.35', 'Admin has log out', 25, 16, NULL, NULL, '2022-03-26 12:05:42', 1, 'Firefox - 98.0', 'Windows 10'),
(756, 'LOGIN', '41.222.181.35', 'Admin has login', 25, 16, NULL, NULL, '2022-03-26 12:05:49', 1, 'Firefox - 98.0', 'Windows 10'),
(757, 'LOG OUT', '41.222.181.35', 'Admin has log out', 25, 16, NULL, NULL, '2022-03-26 12:05:54', 1, 'Firefox - 98.0', 'Windows 10'),
(758, 'LOGIN', '41.222.181.35', 'Officer has login', 27, 16, NULL, NULL, '2022-03-26 12:05:59', 1, 'Firefox - 98.0', 'Windows 10'),
(759, 'LOG OUT', '41.222.181.35', 'Officer has log out', 27, 16, NULL, NULL, '2022-03-26 12:48:07', 1, 'Firefox - 98.0', 'Windows 10'),
(760, 'LOGIN', '41.222.181.35', 'Admin has login', 25, 16, NULL, NULL, '2022-03-26 13:12:54', 1, 'Firefox - 98.0', 'Windows 10'),
(761, 'LOG OUT', '41.222.181.35', 'Admin has log out', 25, 16, NULL, NULL, '2022-03-26 13:13:17', 1, 'Firefox - 98.0', 'Windows 10'),
(762, 'LOGIN', '41.222.181.35', 'Officer has login', 27, 16, NULL, NULL, '2022-03-26 13:13:39', 1, 'Firefox - 98.0', 'Windows 10'),
(763, 'LOGIN', '41.222.181.35', 'Officer has login from lock screen', 27, 16, NULL, NULL, '2022-03-26 13:19:54', 1, 'Firefox - 98.0', 'Windows 10'),
(764, 'LOG OUT', '41.222.181.35', 'Officer has log out', 27, 16, NULL, NULL, '2022-03-26 13:45:12', 1, 'Firefox - 98.0', 'Windows 10'),
(765, 'LOGIN', '41.222.181.35', 'Officer has login', 27, 16, NULL, NULL, '2022-03-26 13:45:22', 1, 'Firefox - 98.0', 'Windows 10'),
(766, 'LOG OUT', '41.222.181.35', 'Officer has log out', 27, 16, NULL, NULL, '2022-03-26 14:00:38', 1, 'Firefox - 98.0', 'Windows 10'),
(767, 'LOGIN', '41.222.181.35', 'Admin has login', 25, 16, NULL, NULL, '2022-03-26 14:00:47', 1, 'Firefox - 98.0', 'Windows 10'),
(768, 'LOG OUT', '41.222.181.35', 'Admin has log out', 25, 16, NULL, NULL, '2022-03-26 14:15:17', 1, 'Firefox - 98.0', 'Windows 10'),
(769, 'LOGIN', '41.222.181.35', 'Officer has login', 27, 16, NULL, NULL, '2022-03-26 14:20:32', 1, 'Safari - 604.1', 'iOS'),
(770, 'LOG OUT', '41.222.181.35', 'Officer has log out', 27, 16, NULL, NULL, '2022-03-26 14:23:52', 1, 'Safari - 604.1', 'iOS'),
(771, 'LOGIN', '41.222.181.210', 'Admin has login', 25, 16, NULL, NULL, '2022-03-26 22:12:47', 1, 'Firefox - 98.0', 'Windows 10'),
(772, 'LOGIN', '41.222.181.210', 'Admin has login from lock screen', 25, 16, NULL, NULL, '2022-03-26 22:18:12', 1, 'Firefox - 98.0', 'Windows 10'),
(773, 'LOGIN', '41.222.181.210', 'Admin has login from lock screen', 25, 16, NULL, NULL, '2022-03-26 22:27:23', 1, 'Firefox - 98.0', 'Windows 10'),
(774, 'LOG OUT', '41.222.181.210', 'Admin has log out', 25, 16, NULL, NULL, '2022-03-26 22:29:55', 1, 'Firefox - 98.0', 'Windows 10'),
(775, 'LOGIN', '41.222.181.210', 'Officer has login', 27, 16, NULL, NULL, '2022-03-26 22:30:03', 1, 'Firefox - 98.0', 'Windows 10'),
(776, 'LOG OUT', '41.222.181.210', 'Officer has log out', 27, 16, NULL, NULL, '2022-03-26 22:33:14', 1, 'Firefox - 98.0', 'Windows 10'),
(777, 'LOGIN', '41.222.181.210', 'Admin has login', 25, 16, NULL, NULL, '2022-03-26 22:33:21', 1, 'Firefox - 98.0', 'Windows 10'),
(778, 'LOG OUT', '41.222.181.210', 'Admin has log out', 25, 16, NULL, NULL, '2022-03-26 22:33:38', 1, 'Firefox - 98.0', 'Windows 10'),
(779, 'LOGIN', '41.222.181.210', 'Admin has login', 25, 16, NULL, NULL, '2022-03-26 22:33:45', 1, 'Firefox - 98.0', 'Windows 10'),
(780, 'LOG OUT', '41.222.181.210', 'Admin has log out', 25, 16, NULL, NULL, '2022-03-26 22:33:56', 1, 'Firefox - 98.0', 'Windows 10'),
(781, 'LOGIN', '41.222.181.210', 'Officer has login', 27, 16, NULL, NULL, '2022-03-26 22:34:03', 1, 'Firefox - 98.0', 'Windows 10'),
(782, 'LOG OUT', '41.222.181.210', 'Officer has log out', 27, 16, NULL, NULL, '2022-03-26 22:44:13', 1, 'Firefox - 98.0', 'Windows 10'),
(783, 'LOGIN', '41.222.181.210', 'Admin has login', 25, 16, NULL, NULL, '2022-03-26 22:47:18', 1, 'Safari - 604.1', 'iOS'),
(784, 'LOGIN', '41.222.180.184', 'Admin has login', 25, 16, NULL, NULL, '2022-03-27 08:42:17', 1, 'Safari - 604.1', 'iOS'),
(785, 'LOGIN', '41.222.180.184', 'Admin has login', 25, 16, NULL, NULL, '2022-03-27 08:47:07', 1, 'Firefox - 98.0', 'Windows 10'),
(786, 'LOG OUT', '41.222.180.184', 'Admin has log out', 25, 16, NULL, NULL, '2022-03-27 08:48:56', 1, 'Firefox - 98.0', 'Windows 10'),
(787, 'LOGIN', '41.222.180.184', 'Officer has login', 27, 16, NULL, NULL, '2022-03-27 08:49:03', 1, 'Firefox - 98.0', 'Windows 10'),
(788, 'LOG OUT', '41.222.180.184', 'Officer has log out', 27, 16, NULL, NULL, '2022-03-27 08:53:11', 1, 'Firefox - 98.0', 'Windows 10'),
(789, 'LOGIN', '41.222.180.184', 'Admin has login', 25, 16, NULL, NULL, '2022-03-27 08:53:19', 1, 'Firefox - 98.0', 'Windows 10'),
(790, 'LOG OUT', '41.222.180.184', 'Admin has log out', 25, 16, NULL, NULL, '2022-03-27 08:54:07', 1, 'Firefox - 98.0', 'Windows 10'),
(791, 'LOGIN', '41.222.180.184', 'Officer has login', 27, 16, NULL, NULL, '2022-03-27 08:54:17', 1, 'Firefox - 98.0', 'Windows 10'),
(792, 'LOG OUT', '41.222.180.184', 'Officer has log out', 27, 16, NULL, NULL, '2022-03-27 09:02:29', 1, 'Firefox - 98.0', 'Windows 10'),
(793, 'LOGIN', '41.222.180.184', 'Manager has login', 26, 16, NULL, NULL, '2022-03-27 09:02:38', 1, 'Firefox - 98.0', 'Windows 10'),
(794, 'LOGIN', '41.222.180.184', 'Manager has login from lock screen', 26, 16, NULL, NULL, '2022-03-27 09:08:50', 1, 'Firefox - 98.0', 'Windows 10'),
(795, 'LOG OUT', '41.222.180.184', 'Manager has log out', 26, 16, NULL, NULL, '2022-03-27 09:08:55', 1, 'Firefox - 98.0', 'Windows 10'),
(796, 'LOGIN', '41.222.180.184', 'Admin has login', 25, 16, NULL, NULL, '2022-03-27 09:09:03', 1, 'Firefox - 98.0', 'Windows 10'),
(797, 'LOG OUT', '41.222.180.184', 'Admin has log out', 25, 16, NULL, NULL, '2022-03-27 09:09:24', 1, 'Firefox - 98.0', 'Windows 10'),
(798, 'LOGIN', '41.222.180.184', 'Officer has login', 27, 16, NULL, NULL, '2022-03-27 09:09:31', 1, 'Firefox - 98.0', 'Windows 10'),
(799, 'LOG OUT', '41.222.180.184', 'Officer has log out', 27, 16, NULL, NULL, '2022-03-27 09:10:27', 1, 'Firefox - 98.0', 'Windows 10'),
(800, 'LOGIN', '41.222.180.184', 'Manager has login', 26, 16, NULL, NULL, '2022-03-27 09:10:35', 1, 'Firefox - 98.0', 'Windows 10'),
(801, 'LOG OUT', '41.222.180.184', 'Manager has log out', 26, 16, NULL, NULL, '2022-03-27 09:23:49', 1, 'Firefox - 98.0', 'Windows 10'),
(802, 'LOGIN', '41.222.180.184', 'Manager has login', 26, 16, NULL, NULL, '2022-03-27 09:24:53', 1, 'Firefox - 98.0', 'Windows 10'),
(803, 'LOG OUT', '41.222.180.184', 'Admin has log out', 25, 16, NULL, NULL, '2022-03-27 11:35:41', 1, 'Safari - 604.1', 'iOS'),
(804, 'LOGIN', '41.222.181.188', 'Admin has login', 25, 16, NULL, NULL, '2022-03-30 20:48:21', 1, 'Firefox - 98.0', 'Windows 10'),
(805, 'LOG OUT', '41.222.181.188', 'Admin has log out', 25, 16, NULL, NULL, '2022-03-30 20:48:38', 1, 'Firefox - 98.0', 'Windows 10'),
(806, 'LOGIN', '41.222.181.188', 'Officer has login', 27, 16, NULL, NULL, '2022-03-30 20:48:45', 1, 'Firefox - 98.0', 'Windows 10'),
(807, 'LOG OUT', '41.222.181.188', 'Officer has log out', 27, 16, NULL, NULL, '2022-03-30 21:11:04', 1, 'Firefox - 98.0', 'Windows 10'),
(808, 'LOGIN', '41.222.181.188', 'Admin has login', 25, 16, NULL, NULL, '2022-03-30 21:11:27', 1, 'Firefox - 98.0', 'Windows 10'),
(809, 'LOG OUT', '41.222.181.188', 'Admin has log out', 25, 16, NULL, NULL, '2022-03-30 21:12:05', 1, 'Firefox - 98.0', 'Windows 10'),
(810, 'LOGIN', '41.222.181.188', 'Halfa Salum has login', 1, 1, NULL, NULL, '2022-03-30 21:12:09', 1, 'Firefox - 98.0', 'Windows 10'),
(811, 'CREATE', '41.222.181.188', 'Halfa Salum has create new module control (Access Officer Report)', 1, 1, NULL, NULL, '2022-03-30 21:12:59', 1, 'Firefox - 98.0', 'Windows 10'),
(812, 'CREATE', '41.222.181.188', 'Halfa Salum has create new module control (Access Manager Reports)', 1, 1, NULL, NULL, '2022-03-30 21:13:35', 1, 'Firefox - 98.0', 'Windows 10'),
(813, 'CREATE', '41.222.181.188', 'Halfa Salum has create new module control (Access Managent Reports)', 1, 1, NULL, NULL, '2022-03-30 21:14:12', 1, 'Firefox - 98.0', 'Windows 10'),
(814, 'LOG OUT', '41.222.181.188', 'Halfa Salum has log out', 1, 1, NULL, NULL, '2022-03-30 21:14:19', 1, 'Firefox - 98.0', 'Windows 10'),
(815, 'LOGIN', '41.222.181.188', 'Admin has login', 25, 16, NULL, NULL, '2022-03-30 21:14:26', 1, 'Firefox - 98.0', 'Windows 10'),
(816, 'UPDATE', '41.222.181.188', 'Admin has update role (Loan Officer)', 25, 16, NULL, NULL, '2022-03-30 21:14:40', 1, 'Firefox - 98.0', 'Windows 10'),
(817, 'LOG OUT', '41.222.181.188', 'Admin has log out', 25, 16, NULL, NULL, '2022-03-30 21:14:53', 1, 'Firefox - 98.0', 'Windows 10'),
(818, 'LOGIN', '41.222.181.188', 'Halfa Salum has login', 1, 1, NULL, NULL, '2022-03-30 21:14:59', 1, 'Firefox - 98.0', 'Windows 10'),
(819, 'LOG OUT', '41.222.181.188', 'Halfa Salum has log out', 1, 1, NULL, NULL, '2022-03-30 21:20:24', 1, 'Firefox - 98.0', 'Windows 10'),
(820, 'LOGIN', '41.222.181.188', 'Officer has login', 27, 16, NULL, NULL, '2022-03-30 21:20:29', 1, 'Firefox - 98.0', 'Windows 10'),
(821, 'LOG OUT', '41.222.181.188', 'Officer has log out', 27, 16, NULL, NULL, '2022-03-30 21:51:27', 1, 'Firefox - 98.0', 'Windows 10'),
(822, 'LOGIN', '41.222.181.188', 'Officer has login', 27, 16, NULL, NULL, '2022-03-30 21:54:49', 1, 'Firefox - 98.0', 'Windows 10'),
(823, 'LOG OUT', '41.222.181.188', 'Officer has log out', 27, 16, NULL, NULL, '2022-03-30 22:09:33', 1, 'Firefox - 98.0', 'Windows 10'),
(824, 'LOGIN', '41.222.181.188', 'Officer has login', 27, 16, NULL, NULL, '2022-03-30 22:10:13', 1, 'Firefox - 98.0', 'Windows 10'),
(825, 'LOG OUT', '41.222.179.234', 'Officer has log out', 27, 16, NULL, NULL, '2022-03-30 23:50:59', 1, 'Firefox - 98.0', 'Windows 10'),
(826, 'LOGIN', '41.222.181.213', 'Officer has login', 27, 16, NULL, NULL, '2022-03-31 14:52:41', 1, 'Firefox - 98.0', 'Windows 10'),
(827, 'LOG OUT', '41.222.181.213', 'Officer has log out', 27, 16, NULL, NULL, '2022-03-31 15:03:59', 1, 'Firefox - 98.0', 'Windows 10'),
(828, 'LOGIN', '41.222.181.213', 'Officer has login', 27, 16, NULL, NULL, '2022-03-31 15:09:48', 1, 'Firefox - 98.0', 'Windows 10'),
(829, 'LOG OUT', '41.222.181.213', 'Officer has log out', 27, 16, NULL, NULL, '2022-03-31 15:10:18', 1, 'Firefox - 98.0', 'Windows 10'),
(830, 'LOGIN', '41.222.181.213', 'Manager has login', 26, 16, NULL, NULL, '2022-03-31 15:10:24', 1, 'Firefox - 98.0', 'Windows 10'),
(831, 'LOGIN', '41.222.181.213', 'Manager has login from lock screen', 26, 16, NULL, NULL, '2022-03-31 15:19:35', 1, 'Firefox - 98.0', 'Windows 10'),
(832, 'LOG OUT', '41.222.181.213', 'Manager has log out', 26, 16, NULL, NULL, '2022-03-31 15:29:42', 1, 'Firefox - 98.0', 'Windows 10'),
(833, 'LOGIN', '41.222.181.211', 'Manager has login', 26, 16, NULL, NULL, '2022-03-31 22:30:55', 1, 'Firefox - 98.0', 'Windows 10'),
(834, 'LOG OUT', '41.222.181.211', 'Manager has log out', 26, 16, NULL, NULL, '2022-03-31 22:41:04', 1, 'Firefox - 98.0', 'Windows 10'),
(835, 'LOGIN', '41.222.181.211', 'Manager has login', 26, 16, NULL, NULL, '2022-03-31 22:43:20', 1, 'Firefox - 98.0', 'Windows 10'),
(836, 'LOG OUT', '41.222.181.211', 'Manager has log out', 26, 16, NULL, NULL, '2022-03-31 22:50:00', 1, 'Firefox - 98.0', 'Windows 10'),
(837, 'LOGIN', '41.222.181.211', 'Officer has login', 27, 16, NULL, NULL, '2022-03-31 22:50:07', 1, 'Firefox - 98.0', 'Windows 10'),
(838, 'LOGIN', '41.222.181.211', 'Officer has login from lock screen', 27, 16, NULL, NULL, '2022-03-31 22:57:49', 1, 'Firefox - 98.0', 'Windows 10'),
(839, 'LOG OUT', '41.222.181.211', 'Officer has log out', 27, 16, NULL, NULL, '2022-03-31 22:58:26', 1, 'Firefox - 98.0', 'Windows 10'),
(840, 'LOGIN', '41.222.181.211', 'Manager has login', 26, 16, NULL, NULL, '2022-03-31 22:58:33', 1, 'Firefox - 98.0', 'Windows 10'),
(841, 'LOGIN', '41.59.202.151', 'Admin has login', 25, 16, NULL, NULL, '2022-04-02 13:27:15', 1, 'Firefox - 98.0', 'Windows 10'),
(842, 'LOG OUT', '41.59.193.231', 'Admin has log out', 25, 16, NULL, NULL, '2022-04-02 13:39:03', 1, 'Firefox - 98.0', 'Windows 10'),
(843, 'LOGIN', '127.0.0.1', 'Halfa Salum has login', 1, 1, NULL, NULL, '2022-04-16 12:40:01', 1, 'Firefox - 99.0', 'Windows 10'),
(844, 'LOG OUT', '127.0.0.1', 'Halfa Salum has log out', 1, 1, NULL, NULL, '2022-04-16 12:52:20', 1, 'Firefox - 99.0', 'Windows 10'),
(845, 'LOGIN', '127.0.0.1', 'Halfa Salum has login', 1, 1, NULL, NULL, '2022-04-16 13:11:59', 1, 'Firefox - 99.0', 'Windows 10'),
(846, 'UPDATE', '127.0.0.1', 'Halfa Salum has delete module with ref number (20)', 1, 1, NULL, NULL, '2022-04-16 13:21:46', 1, 'Firefox - 99.0', 'Windows 10'),
(847, 'UPDATE', '127.0.0.1', 'Halfa Salum has delete module with ref number (18)', 1, 1, NULL, NULL, '2022-04-16 13:21:55', 1, 'Firefox - 99.0', 'Windows 10'),
(848, 'UPDATE', '127.0.0.1', 'Halfa Salum has delete module with ref number (17)', 1, 1, NULL, NULL, '2022-04-16 13:22:01', 1, 'Firefox - 99.0', 'Windows 10'),
(849, 'UPDATE', '127.0.0.1', 'Halfa Salum has delete module with ref number (16)', 1, 1, NULL, NULL, '2022-04-16 13:22:07', 1, 'Firefox - 99.0', 'Windows 10'),
(850, 'UPDATE', '127.0.0.1', 'Halfa Salum has delete module with ref number (14)', 1, 1, NULL, NULL, '2022-04-16 13:22:47', 1, 'Firefox - 99.0', 'Windows 10'),
(851, 'UPDATE', '127.0.0.1', 'Halfa Salum has delete module with ref number (13)', 1, 1, NULL, NULL, '2022-04-16 13:22:52', 1, 'Firefox - 99.0', 'Windows 10'),
(852, 'UPDATE', '127.0.0.1', 'Halfa Salum has delete module with ref number (15)', 1, 1, NULL, NULL, '2022-04-16 13:23:47', 1, 'Firefox - 99.0', 'Windows 10'),
(853, 'LOG OUT', '127.0.0.1', 'Halfa Salum has log out', 1, 1, NULL, NULL, '2022-04-16 13:24:07', 1, 'Firefox - 99.0', 'Windows 10'),
(854, 'LOGIN', '127.0.0.1', 'Halfa Salum has login', 1, 1, NULL, NULL, '2022-04-16 13:24:20', 1, 'Firefox - 99.0', 'Windows 10'),
(855, 'CREATE', '127.0.0.1', 'Halfa Salum has create new module (Trash)', 1, 1, NULL, NULL, '2022-04-16 13:28:42', 1, 'Firefox - 99.0', 'Windows 10'),
(856, 'LOG OUT', '127.0.0.1', 'Halfa Salum has log out', 1, 1, NULL, NULL, '2022-04-16 13:40:43', 1, 'Firefox - 99.0', 'Windows 10'),
(857, 'LOGIN', '127.0.0.1', 'Halfa Salum has login', 1, 1, NULL, NULL, '2022-04-16 13:40:47', 1, 'Firefox - 99.0', 'Windows 10'),
(858, 'CREATE', '127.0.0.1', 'Halfa Salum has create new module control (Access Trashes)', 1, 1, NULL, NULL, '2022-04-16 13:41:15', 1, 'Firefox - 99.0', 'Windows 10'),
(859, 'UPDATE', '127.0.0.1', 'Halfa Salum has update role (Super Admin(SA))', 1, 1, NULL, NULL, '2022-04-16 13:41:33', 1, 'Firefox - 99.0', 'Windows 10'),
(860, 'UPDATE', '127.0.0.1', 'Halfa Salum has update role (Admin)', 1, 1, NULL, NULL, '2022-04-16 13:41:42', 1, 'Firefox - 99.0', 'Windows 10'),
(861, 'LOG OUT', '127.0.0.1', 'Halfa Salum has log out', 1, 1, NULL, NULL, '2022-04-16 13:41:47', 1, 'Firefox - 99.0', 'Windows 10'),
(862, 'LOGIN', '127.0.0.1', 'Halfa Salum has login', 1, 1, NULL, NULL, '2022-04-16 13:41:50', 1, 'Firefox - 99.0', 'Windows 10'),
(863, 'LOGIN', '127.0.0.1', 'Halfa Salum has login from lock screen', 1, 1, NULL, NULL, '2022-04-16 13:53:36', 1, 'Firefox - 99.0', 'Windows 10'),
(864, 'LOG OUT', '127.0.0.1', 'Halfa Salum has log out', 1, 1, NULL, NULL, '2022-04-16 14:16:20', 1, 'Firefox - 99.0', 'Windows 10'),
(865, 'LOGIN', '127.0.0.1', 'Halfa Salum has login', 1, 1, NULL, NULL, '2022-04-16 15:46:50', 1, 'Firefox - 99.0', 'Windows 10'),
(866, 'LOGIN', '127.0.0.1', 'Halfa Salum has login from lock screen', 1, 1, NULL, NULL, '2022-04-16 15:57:39', 1, 'Firefox - 99.0', 'Windows 10'),
(867, 'REGISTER', '127.0.0.1', 'Halfa Salum has register new trash with number : (1234)', 1, 1, NULL, NULL, '2022-04-16 15:58:34', 1, 'Firefox - 99.0', 'Windows 10'),
(868, 'LOGIN', '127.0.0.1', 'Halfa Salum has login from lock screen', 1, 1, NULL, NULL, '2022-04-16 16:05:57', 1, 'Firefox - 99.0', 'Windows 10'),
(869, 'LOGIN', '127.0.0.1', 'Halfa Salum has login from lock screen', 1, 1, NULL, NULL, '2022-04-16 16:11:38', 1, 'Firefox - 99.0', 'Windows 10'),
(870, 'LOGIN', '127.0.0.1', 'Halfa Salum has login from lock screen', 1, 1, NULL, NULL, '2022-04-16 16:17:44', 1, 'Firefox - 99.0', 'Windows 10'),
(871, 'LOGIN', '127.0.0.1', 'Halfa Salum has login from lock screen', 1, 1, NULL, NULL, '2022-04-16 16:24:40', 1, 'Firefox - 99.0', 'Windows 10'),
(872, 'LOGIN', '127.0.0.1', 'Halfa Salum has login from lock screen', 1, 1, NULL, NULL, '2022-04-16 16:31:06', 1, 'Firefox - 99.0', 'Windows 10'),
(873, 'LOGIN', '127.0.0.1', 'Halfa Salum has login from lock screen', 1, 1, NULL, NULL, '2022-04-16 16:37:52', 1, 'Firefox - 99.0', 'Windows 10'),
(874, 'LOG OUT', '127.0.0.1', 'Halfa Salum has log out', 1, 1, NULL, NULL, '2022-04-16 16:47:53', 1, 'Firefox - 99.0', 'Windows 10'),
(875, 'LOGIN', '127.0.0.1', 'Halfa Salum has login', 1, 1, NULL, NULL, '2022-04-16 17:22:06', 1, 'Firefox - 99.0', 'Windows 10'),
(876, 'LOG OUT', '127.0.0.1', 'Halfa Salum has log out', 1, 1, NULL, NULL, '2022-04-16 17:33:12', 1, 'Firefox - 99.0', 'Windows 10'),
(877, 'LOGIN', '127.0.0.1', 'Halfa Salum has login', 1, 1, NULL, NULL, '2022-04-16 17:34:04', 1, 'Firefox - 99.0', 'Windows 10'),
(878, 'LOGIN', '127.0.0.1', 'Halfa Salum has login from lock screen', 1, 1, NULL, NULL, '2022-04-16 17:45:37', 1, 'Firefox - 99.0', 'Windows 10'),
(879, 'LOGIN', '127.0.0.1', 'Halfa Salum has login from lock screen', 1, 1, NULL, NULL, '2022-04-16 17:53:49', 1, 'Firefox - 99.0', 'Windows 10'),
(880, 'LOG OUT', '127.0.0.1', 'Halfa Salum has log out', 1, 1, NULL, NULL, '2022-04-16 18:06:54', 1, 'Firefox - 99.0', 'Windows 10');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_role`
--

CREATE TABLE `tbl_user_role` (
  `user_role_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `user_role_status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_user_role`
--

INSERT INTO `tbl_user_role` (`user_role_id`, `user_id`, `role_id`, `user_role_status`) VALUES
(1, 1, 1, 1),
(20, 6, 4, 1),
(27, 5, 1, 1),
(41, 8, 5, 1),
(47, 9, 5, 1),
(48, 10, 5, 1),
(49, 25, 2, 4),
(50, 25, 3, 4),
(51, 25, 2, 4),
(52, 25, 4, 4),
(53, 25, 2, 4),
(54, 25, 4, 4),
(55, 25, 2, 4),
(56, 25, 4, 4),
(57, 25, 3, 4),
(58, 25, 2, 4),
(59, 25, 4, 4),
(60, 25, 3, 4),
(61, 25, 2, 4),
(62, 25, 3, 4),
(63, 25, 2, 4),
(64, 25, 5, 4),
(65, 25, 4, 4),
(66, 25, 3, 4),
(67, 25, 2, 4),
(68, 26, 4, 1),
(69, 27, 5, 1),
(70, 25, 3, 1),
(71, 25, 2, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_companies`
--
ALTER TABLE `tbl_companies`
  ADD PRIMARY KEY (`company_id`),
  ADD UNIQUE KEY `company_name_UNIQUE` (`company_name`),
  ADD KEY `company_status` (`company_status`);

--
-- Indexes for table `tbl_company_config`
--
ALTER TABLE `tbl_company_config`
  ADD PRIMARY KEY (`config_id`),
  ADD UNIQUE KEY `company_id_UNIQUE` (`company_id`);

--
-- Indexes for table `tbl_company_service`
--
ALTER TABLE `tbl_company_service`
  ADD PRIMARY KEY (`company_service_id`);

--
-- Indexes for table `tbl_company_subscription`
--
ALTER TABLE `tbl_company_subscription`
  ADD PRIMARY KEY (`company_subscription_id`);

--
-- Indexes for table `tbl_daily_config`
--
ALTER TABLE `tbl_daily_config`
  ADD PRIMARY KEY (`dconfig_id`),
  ADD KEY `company_ref_fbk_1_idx` (`company_id`);

--
-- Indexes for table `tbl_errors`
--
ALTER TABLE `tbl_errors`
  ADD PRIMARY KEY (`error_id`);

--
-- Indexes for table `tbl_module`
--
ALTER TABLE `tbl_module`
  ADD PRIMARY KEY (`module_id`);

--
-- Indexes for table `tbl_module_control`
--
ALTER TABLE `tbl_module_control`
  ADD PRIMARY KEY (`control_id`);

--
-- Indexes for table `tbl_role`
--
ALTER TABLE `tbl_role`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `tbl_roles`
--
ALTER TABLE `tbl_roles`
  ADD PRIMARY KEY (`role_id`),
  ADD KEY `role_status_fbk_idx` (`role_status`);

--
-- Indexes for table `tbl_role_control`
--
ALTER TABLE `tbl_role_control`
  ADD PRIMARY KEY (`role_control_id`);

--
-- Indexes for table `tbl_services`
--
ALTER TABLE `tbl_services`
  ADD PRIMARY KEY (`service_id`);

--
-- Indexes for table `tbl_service_type`
--
ALTER TABLE `tbl_service_type`
  ADD PRIMARY KEY (`type_id`);

--
-- Indexes for table `tbl_settings`
--
ALTER TABLE `tbl_settings`
  ADD PRIMARY KEY (`settingId`);

--
-- Indexes for table `tbl_status`
--
ALTER TABLE `tbl_status`
  ADD PRIMARY KEY (`status_id`),
  ADD UNIQUE KEY `status_name_UNIQUE` (`status_name`);

--
-- Indexes for table `tbl_trash`
--
ALTER TABLE `tbl_trash`
  ADD KEY `device_id` (`device_id`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username_UNIQUE` (`username`),
  ADD KEY `user_company_fbk_1_idx` (`user_company`),
  ADD KEY `user_status_fbk_idx` (`user_status`),
  ADD KEY `user_role_fbk_idx` (`user_role`);

--
-- Indexes for table `tbl_users_logs`
--
ALTER TABLE `tbl_users_logs`
  ADD PRIMARY KEY (`log_id`),
  ADD KEY `log_status_fbk_idx` (`log_status`);

--
-- Indexes for table `tbl_user_role`
--
ALTER TABLE `tbl_user_role`
  ADD PRIMARY KEY (`user_role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_companies`
--
ALTER TABLE `tbl_companies`
  MODIFY `company_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tbl_company_config`
--
ALTER TABLE `tbl_company_config`
  MODIFY `config_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_company_service`
--
ALTER TABLE `tbl_company_service`
  MODIFY `company_service_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_company_subscription`
--
ALTER TABLE `tbl_company_subscription`
  MODIFY `company_subscription_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tbl_daily_config`
--
ALTER TABLE `tbl_daily_config`
  MODIFY `dconfig_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_errors`
--
ALTER TABLE `tbl_errors`
  MODIFY `error_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_module`
--
ALTER TABLE `tbl_module`
  MODIFY `module_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tbl_module_control`
--
ALTER TABLE `tbl_module_control`
  MODIFY `control_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

--
-- AUTO_INCREMENT for table `tbl_role`
--
ALTER TABLE `tbl_role`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_roles`
--
ALTER TABLE `tbl_roles`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_role_control`
--
ALTER TABLE `tbl_role_control`
  MODIFY `role_control_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=475;

--
-- AUTO_INCREMENT for table `tbl_services`
--
ALTER TABLE `tbl_services`
  MODIFY `service_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_service_type`
--
ALTER TABLE `tbl_service_type`
  MODIFY `type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_settings`
--
ALTER TABLE `tbl_settings`
  MODIFY `settingId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_status`
--
ALTER TABLE `tbl_status`
  MODIFY `status_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_trash`
--
ALTER TABLE `tbl_trash`
  MODIFY `device_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `tbl_users_logs`
--
ALTER TABLE `tbl_users_logs`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=881;

--
-- AUTO_INCREMENT for table `tbl_user_role`
--
ALTER TABLE `tbl_user_role`
  MODIFY `user_role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_companies`
--
ALTER TABLE `tbl_companies`
  ADD CONSTRAINT `company_status` FOREIGN KEY (`company_status`) REFERENCES `tbl_status` (`status_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
