-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 14, 2026 at 07:06 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `livys_sari_store`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity_logs`
--

CREATE TABLE `activity_logs` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `username` varchar(100) NOT NULL,
  `action` varchar(255) NOT NULL,
  `details` text DEFAULT NULL,
  `ip_address` varchar(45) NOT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `activity_logs`
--

INSERT INTO `activity_logs` (`id`, `user_id`, `username`, `action`, `details`, `ip_address`, `created_at`) VALUES
(1, 4, 'admin0', 'Debt Settled', 'Full payment received from Lisa Gajo via gcash', '::1', '2026-05-12 18:09:38'),
(2, 4, 'admin0', 'Debt Partial Payment', 'Received ₱15 from Li. Remaining: ₱15', '::1', '2026-05-12 18:12:35'),
(3, 4, 'admin0', 'POS Transaction', 'Sold items to Lisa Gajo via UTANG (Total: ₱30.00)', '::1', '2026-05-12 18:17:33'),
(4, 4, 'admin0', 'Inventory Update', 'Updated product details for: colgate', '::1', '2026-05-12 18:17:59'),
(5, 4, 'admin0', 'Login', 'User successfully logged into the system', '::1', '2026-05-12 23:38:30'),
(6, 4, 'admin0', 'Email Notice Sent', 'Sent payment reminder to Chazely Lopez (chazelymaelopez@gmail.com)', '::1', '2026-05-12 23:46:53'),
(7, 4, 'admin0', 'Listahan Add', 'Added new credit record for Jaspher Magbo-o (₱500)', '::1', '2026-05-12 23:49:12'),
(8, 4, 'admin0', 'Listahan Add', 'Added new credit record for Lourd Ian Rentino (₱100)', '::1', '2026-05-12 23:50:00'),
(9, 4, 'admin0', 'Listahan Add', 'Added new credit record for Jayca Hermosura (₱60)', '::1', '2026-05-12 23:52:46'),
(10, 4, 'admin0', 'Email Notice Sent', 'Sent payment reminder to Jayca Hermosura (hermosurajayca420@gmail.com)', '::1', '2026-05-12 23:53:20'),
(11, 4, 'admin0', 'Email Notice Sent', 'Sent payment reminder to Lourd Ian Rentino (lourdianrentinoakol@gmail.com)', '::1', '2026-05-12 23:55:47'),
(12, 4, 'admin0', 'Debt Settled', 'Full payment received from Li via gcash', '::1', '2026-05-13 08:02:25'),
(13, 4, 'admin0', 'Email Notice Sent', 'Sent payment reminder to Jaspher Magbo-o (lordmiloy@gmail.com)', '::1', '2026-05-13 08:40:48'),
(14, 4, 'admin0', 'Listahan Add', 'Added new credit record for Jayven gajo (₱20)', '::1', '2026-05-13 08:56:45'),
(15, 4, 'admin0', 'Debt Settled', 'Full payment received from Jayven gajo via gcash', '::1', '2026-05-13 08:59:21'),
(16, 4, 'admin0', 'Login', 'User successfully logged into the system', '::1', '2026-05-13 17:52:15'),
(17, 4, 'admin0', 'Email Notice Sent', 'Sent payment reminder to Jayven Gajo (javyenkim@gmail.com)', '::1', '2026-05-13 17:56:28'),
(18, 4, 'admin0', 'Login', 'User successfully logged into the system', '::1', '2026-05-13 23:15:28'),
(19, 4, 'admin0', 'Listahan Add', 'Added new credit record for Jayven gajo (₱20)', '::1', '2026-05-13 23:24:10'),
(20, 4, 'admin0', 'Debt Settled', 'Full payment received from Nyve Gajo via cash', '::1', '2026-05-13 23:24:24'),
(21, 4, 'admin0', 'Debt Settled', 'Full payment received from Justin Gariando via cash', '::1', '2026-05-13 23:24:32'),
(22, 4, 'admin0', 'Debt Settled', 'Full payment received from Chazely Lopez via cash', '::1', '2026-05-13 23:24:35'),
(23, 4, 'admin0', 'Debt Settled', 'Full payment received from Josev Kiervin Gajo via gcash', '::1', '2026-05-13 23:24:42'),
(24, 4, 'admin0', 'Debt Settled', 'Full payment received from Jayca Hermosura via gcash', '::1', '2026-05-13 23:24:47'),
(25, 4, 'admin0', 'Debt Settled', 'Full payment received from Lourd Ian Rentino via cash', '::1', '2026-05-13 23:24:54'),
(26, 4, 'admin0', 'Debt Settled', 'Full payment received from Lisa Gajo via gcash', '::1', '2026-05-13 23:25:04'),
(27, 4, 'admin0', 'Debt Settled', 'Full payment received from Jaspher Magbo-o via gcash', '::1', '2026-05-13 23:25:09'),
(28, 4, 'admin0', 'Debt Settled', 'Full payment received from Jayven Gajo via gcash', '::1', '2026-05-13 23:25:14'),
(29, 4, 'admin0', 'Debt Settled', 'Full payment received from Jayven gajo via gcash', '::1', '2026-05-13 23:25:17'),
(30, 4, 'admin0', 'Listahan Add', 'Added new credit record for Jayven Kim Gajo (₱70)', '::1', '2026-05-13 23:25:45'),
(31, 4, 'admin0', 'Listahan Add', 'Added new credit record for Joy Mae Pearl Hambre (₱500)', '::1', '2026-05-13 23:28:05'),
(32, 4, 'admin0', 'Email Notice Sent', 'Sent payment reminder to Joy Mae Pearl Hambre (hjoymaepearl@gmail.com)', '::1', '2026-05-13 23:28:40'),
(33, 4, 'admin0', 'Listahan Add', 'Added new credit record for Abegail Gelba (₱30)', '::1', '2026-05-13 23:43:05'),
(34, 4, 'admin0', 'Email Notice Sent', 'Sent payment reminder to Abegail Gelba (gelbaabegail54@gmail.com)', '::1', '2026-05-13 23:43:19'),
(35, 4, 'admin0', 'Login', 'User successfully logged into the system', '::1', '2026-05-14 00:12:50'),
(36, 4, 'admin0', 'Login', 'User successfully logged into the system', '::1', '2026-05-14 12:01:46'),
(37, 4, 'admin0', 'Email Notice Sent', 'Sent payment reminder to Abegail Gelba (gelbaabegail54@gmail.com)', '::1', '2026-05-14 12:02:14'),
(38, NULL, 'Guest', 'Listahan Add', 'Added new credit record for Justin Gariando (₱300)', '::1', '2026-05-14 12:05:25'),
(39, 4, 'admin0', 'Login', 'User successfully logged into the system', '::1', '2026-05-14 12:08:15'),
(40, 4, 'admin0', 'POS Transaction', 'Sold items to Guest via GCASH (Total: ₱30.00)', '::1', '2026-05-14 12:16:33'),
(41, 4, 'admin0', 'Login', 'User successfully logged into the system', '::1', '2026-05-14 12:53:31'),
(42, 4, 'admin0', 'Listahan Add', 'Added new credit record for Justin John Mata (₱100)', '::1', '2026-05-14 12:55:16'),
(43, NULL, 'Guest', 'Debt Settled', 'Full payment received from Justin Gariando via gcash', '::1', '2026-05-14 12:56:47'),
(44, 4, 'admin0', 'Login', 'User successfully logged into the system', '::1', '2026-05-14 13:04:48'),
(45, 4, 'admin0', 'Listahan Add', 'Added new credit record for Ronelo Dacillo (₱60)', '::1', '2026-05-14 13:08:30'),
(46, 4, 'admin0', 'Listahan Add', 'Added new credit record for Ronelo Dacillo (₱60)', '::1', '2026-05-14 13:08:30'),
(47, 4, 'admin0', 'Listahan Add', 'Added new credit record for Jayca  (₱70)', '::1', '2026-05-14 13:13:49'),
(48, 4, 'admin0', 'Debt Settled', 'Full payment received from Jayca  via gcash', '::1', '2026-05-14 13:14:50'),
(49, 4, 'admin0', 'Debt Settled', 'Full payment received from Ronelo Dacillo via cash', '::1', '2026-05-14 13:20:00'),
(50, 4, 'admin0', 'Debt Settled', 'Full payment received from Ronelo Dacillo via gcash', '::1', '2026-05-14 13:20:32'),
(51, 4, 'admin0', 'Debt Partial Payment', 'Received ₱20 from Justin John Mata. Remaining: ₱80', '::1', '2026-05-14 13:20:50'),
(52, 4, 'admin0', 'Login', 'User successfully logged into the system', '::1', '2026-05-14 13:25:33'),
(53, 4, 'admin0', 'Debt Partial Payment', 'Received ₱30 from Justin John Mata. Remaining: ₱50', '::1', '2026-05-14 13:26:20'),
(54, 4, 'admin0', 'Listahan Add', 'Added new credit record for Jayca  (₱70)', '::1', '2026-05-14 13:30:44'),
(55, 4, 'admin0', 'Debt Settled', 'Full payment received from Jayca  via gcash', '::1', '2026-05-14 13:33:17'),
(56, 4, 'admin0', 'Listahan Add', 'Added new credit record for jayca  (₱50)', '::1', '2026-05-14 13:35:01'),
(57, 4, 'admin0', 'Listahan Add', 'Added new credit record for jayca  (₱50)', '::1', '2026-05-14 13:35:04'),
(58, 4, 'admin0', 'Debt Settled', 'Full payment received from jayca  via cash', '::1', '2026-05-14 13:35:55'),
(59, 4, 'admin0', 'Debt Settled', 'Full payment received from jayca  via cash', '::1', '2026-05-14 13:36:45'),
(60, 4, 'admin0', 'Email Notice Sent', 'Sent payment reminder to Jayven Kim Gajo (javyenkim@gmail.com)', '::1', '2026-05-14 13:38:25'),
(61, 4, 'admin0', 'Inventory Add', 'Added new product: yakult (Stock: 500)', '::1', '2026-05-14 13:41:07'),
(62, 4, 'admin0', 'POS Transaction', 'Sold items to reyshel via UTANG (Total: ₱60.00)', '::1', '2026-05-14 13:42:19'),
(63, 4, 'admin0', 'Inventory Delete', 'Deleted product: Camel', '::1', '2026-05-14 13:55:42'),
(64, 4, 'admin0', 'Inventory Delete', 'Deleted product: yakult', '::1', '2026-05-14 13:55:48'),
(65, 4, 'admin0', 'Inventory Add', 'Added new product: coke (Stock: 30)', '::1', '2026-05-14 13:59:11'),
(66, 4, 'admin0', 'Inventory Add', 'Added new product: corned beef (Stock: 18)', '::1', '2026-05-14 14:01:29'),
(67, 4, 'admin0', 'Inventory Add', 'Added new product: 555 (Stock: 34)', '::1', '2026-05-14 14:02:37'),
(68, 4, 'admin0', 'Inventory Add', 'Added new product: paracetamol (Stock: 24)', '::1', '2026-05-14 14:03:02'),
(69, 4, 'admin0', 'Inventory Add', 'Added new product: brilliant set (Stock: 27)', '::1', '2026-05-14 14:03:44'),
(70, 4, 'admin0', 'Inventory Add', 'Added new product: yellow pad (Stock: 15)', '::1', '2026-05-14 14:04:24'),
(71, 4, 'admin0', 'Inventory Add', 'Added new product: regular load (Stock: 1000)', '::1', '2026-05-14 14:06:52'),
(72, 4, 'admin0', 'Inventory Delete', 'Deleted product: regular load', '::1', '2026-05-14 14:07:25'),
(73, 4, 'admin0', 'POS Transaction', 'Sold items to Guest via GCASH (Total: ₱50.00)', '::1', '2026-05-14 14:08:36'),
(74, 4, 'admin0', 'Listahan Add', 'Added new credit record for Mariel Libre (₱100)', '::1', '2026-05-14 14:28:32'),
(75, 4, 'admin0', 'Debt Settled', 'Full payment received from Mariel Libre via gcash', '::1', '2026-05-14 14:34:22'),
(76, 4, 'admin0', 'Login', 'User successfully logged into the system', '::1', '2026-05-14 22:23:03'),
(77, 4, 'admin0', 'POS Transaction', 'Sold items to Guest via CASH (Total: ₱395.00)', '::1', '2026-05-14 22:28:24'),
(78, 4, 'admin0', 'POS Transaction', 'Sold items to Mariel Libre via PARTIAL (Total: ₱45.00)', '::1', '2026-05-14 22:37:04'),
(79, 4, 'admin0', 'POS Transaction', 'Sold items to Guest via CASH (Total: ₱65.00)', '::1', '2026-05-14 22:38:19'),
(80, 4, 'admin0', 'POS Transaction', 'Sold items to Guest via CASH (Total: ₱90.00)', '::1', '2026-05-14 22:46:54'),
(81, 4, 'admin0', 'Debt Settled', 'Full payment received from Mariel Libre via cash', '::1', '2026-05-14 22:56:12'),
(82, 4, 'admin0', 'POS Transaction', 'Sold items to Guest via CASH (Total: ₱45.00)', '::1', '2026-05-14 22:56:25'),
(83, 4, 'admin0', 'POS Transaction', 'Sold items to Jayven Kim Gajo via CASH (Total: ₱350.00)', '::1', '2026-05-14 22:57:26'),
(84, 4, 'admin0', 'POS Transaction', 'Sold items to Guest via CASH (Total: ₱350.00)', '::1', '2026-05-14 23:00:38'),
(85, 4, 'admin0', 'POS Transaction', 'Sold items to Jayven Kim Gajo via CASH (Total: ₱350.00)', '::1', '2026-05-14 23:03:05'),
(86, 4, 'admin0', 'Debt Settled', 'Full payment received from reyshel via cash', '::1', '2026-05-14 23:07:08'),
(87, 4, 'admin0', 'POS Transaction', 'Sold items to Jayven Kim Gajo via CASH (Total: ₱45.00)', '::1', '2026-05-14 23:07:41'),
(88, 4, 'admin0', 'POS Transaction', 'Sold items to Jayven Kim Gajo via CASH (Total: ₱350.00)', '::1', '2026-05-14 23:09:45'),
(89, 4, 'admin0', 'POS Transaction', 'Sold items to Jayven Kim Gajo via CASH (Total: ₱355.00)', '::1', '2026-05-14 23:13:27'),
(90, 4, 'admin0', 'Debt Settled', 'Full payment received from Justin John Mata via cash', '::1', '2026-05-14 23:13:56'),
(91, 4, 'admin0', 'POS Transaction', 'Sold items to Jayven Kim Gajo via CASH (Total: ₱375.00)', '::1', '2026-05-14 23:14:10'),
(92, 4, 'admin0', 'POS Transaction', 'Sold items to Jayven Kim Gajo via CASH (Total: ₱350.00)', '::1', '2026-05-14 23:15:59'),
(93, 4, 'admin0', 'POS Transaction', 'Sold items to Jayven Kim Gajo via CASH (Total: ₱400.00)', '::1', '2026-05-14 23:18:20'),
(94, 4, 'admin0', 'POS Transaction', 'Sold items to Jayven Kim Gajo via CASH (Total: ₱350.00)', '::1', '2026-05-14 23:25:33'),
(95, 4, 'admin0', 'Login', 'User successfully logged into the system', '::1', '2026-05-14 23:28:14'),
(96, 4, 'admin0', 'POS Transaction', 'Sold items to Jayven Kim Gajo via CASH (Total: ₱40.00)', '::1', '2026-05-14 23:32:53'),
(97, 4, 'admin0', 'POS Transaction', 'Sold items to Jayven Kim Gajo via CASH (Total: ₱350.00)', '::1', '2026-05-14 23:35:51'),
(98, 4, 'admin0', 'POS Transaction', 'Sold items to Jayven Kim Gajo via CASH (Total: ₱40.00)', '::1', '2026-05-14 23:40:48'),
(99, 4, 'admin0', 'POS Transaction', 'Sold items to Jayven Kim Gajo via CASH (Total: ₱45.00)', '::1', '2026-05-14 23:44:45'),
(100, 4, 'admin0', 'POS Transaction', 'Sold items to Jayven Kim Gajo via CASH (Total: ₱100.00)', '::1', '2026-05-14 23:49:51'),
(101, 4, 'admin0', 'Login', 'User successfully logged into the system', '::1', '2026-05-14 23:58:55'),
(102, 4, 'admin0', 'Inventory Add', 'Added new product: C2 (Stock: 16)', '::1', '2026-05-15 00:10:31'),
(103, 4, 'admin0', 'Login', 'User successfully logged into the system', '::1', '2026-05-15 00:18:14'),
(104, 4, 'admin0', 'POS Transaction', 'Sold items to Guest via CASH (Total: ₱15.00)', '::1', '2026-05-15 00:46:34'),
(105, 4, 'admin0', 'POS Transaction', 'Sold items to Jayven Kim Gajo via CASH (Total: ₱15.00)', '::1', '2026-05-15 00:50:11'),
(106, 4, 'admin0', 'Inventory Delete', 'Deleted product: Yakult', '::1', '2026-05-15 00:55:31'),
(107, 4, 'admin0', 'Inventory Delete', 'Deleted product: C2', '::1', '2026-05-15 00:55:49'),
(108, 4, 'admin0', 'POS Transaction', 'Sold items to Jayven Kim Gajo via UTANG (Total: ₱45.00)', '::1', '2026-05-15 00:57:17'),
(109, 4, 'admin0', 'Debt Partial Payment', 'Received ₱20 from Jayven Kim Gajo. Remaining: ₱25', '::1', '2026-05-15 00:59:04'),
(110, 4, 'admin0', 'Debt Settled', 'Full payment received from Jayven Kim Gajo via gcash', '::1', '2026-05-15 00:59:49'),
(111, 4, 'admin0', 'POS Transaction', 'Sold items to Jayven Kim Gajo via GCASH (Total: ₱45.00)', '::1', '2026-05-15 01:03:04'),
(112, 4, 'admin0', 'POS Transaction', 'Sold items to Jayven Kim Gajo via CASH (Total: ₱45.00)', '::1', '2026-05-15 01:03:13'),
(113, 4, 'admin0', 'POS Transaction', 'Sold items to Jayven Kim Gajo via UTANG (Total: ₱45.00)', '::1', '2026-05-15 01:03:20'),
(114, 4, 'admin0', 'POS Transaction', 'Sold items to Jayven Kim Gajo via PARTIAL (Total: ₱45.00)', '::1', '2026-05-15 01:03:33');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `icon` varchar(50) DEFAULT 'fas fa-box',
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `icon`, `created_at`, `updated_at`) VALUES
(1, 'School Supplies', 'fas fa-pencil-alt', '2026-05-14 13:46:35', '2026-05-15 00:44:23'),
(2, 'Beverages', 'fas fa-coffee', '2026-05-14 13:56:05', '2026-05-15 00:44:07'),
(3, 'Wants', 'fas fa-heart', '2026-05-14 13:56:12', '2026-05-15 00:44:31'),
(4, 'Beauty Products', 'fas fa-spray-can', '2026-05-14 13:56:40', '2026-05-15 00:44:49'),
(5, 'Canned Goods', 'fas fa-utensils', '2026-05-14 13:59:34', '2026-05-15 00:45:04'),
(6, 'Medicines', 'fas fa-medkit', '2026-05-14 14:00:01', '2026-05-15 00:45:20'),
(7, 'Hygeine', 'fas fa-soap', '2026-05-07 09:18:31', '2026-05-15 00:43:57');

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `id` int(11) NOT NULL,
  `barcode` varchar(50) DEFAULT NULL,
  `item_name` varchar(255) NOT NULL,
  `category` varchar(100) DEFAULT NULL,
  `price` decimal(10,2) NOT NULL,
  `stock` int(11) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`id`, `barcode`, `item_name`, `category`, `price`, `stock`, `created_at`) VALUES
(3, '', 'colgate', 'Hygeine', 20.00, 10, '2026-04-16 08:06:55'),
(6, NULL, 'coke', 'Beverages', 20.00, 14, '2026-05-14 13:59:10'),
(7, NULL, 'corned beef', 'Canned Goods', 25.00, 9, '2026-05-14 14:01:29'),
(8, NULL, '555', 'Canned Goods', 45.00, 33, '2026-05-14 14:02:37'),
(9, NULL, 'paracetamol', 'Medicines', 5.00, 11, '2026-05-14 14:03:02'),
(10, NULL, 'brilliant set', 'Beauty Products', 350.00, 16, '2026-05-14 14:03:44'),
(11, NULL, 'yellow pad', 'School Supplies', 30.00, 15, '2026-05-14 14:04:24');

-- --------------------------------------------------------

--
-- Table structure for table `listahan`
--

CREATE TABLE `listahan` (
  `id` int(11) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone_number` varchar(20) DEFAULT NULL,
  `items` text DEFAULT NULL,
  `amount` decimal(10,2) NOT NULL,
  `due_date` date DEFAULT NULL,
  `status` enum('unpaid','paid') DEFAULT 'unpaid',
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `listahan`
--

INSERT INTO `listahan` (`id`, `customer_name`, `email`, `phone_number`, `items`, `amount`, `due_date`, `status`, `created_at`, `updated_at`) VALUES
(19, 'Jayven Kim Gajo', 'javyenkim@gmail.com', '09196531256', 'Coke 1litter', 70.00, '2026-05-30', 'unpaid', '2026-05-13 23:25:45', '2026-05-13 23:25:45'),
(20, 'Joy Mae Pearl Hambre', 'hjoymaepearl@gmail.com', '09919510217', 'RedHorse', 500.00, '2026-06-01', 'unpaid', '2026-05-13 23:28:05', '2026-05-13 23:28:05'),
(21, 'Abegail Gelba', 'gelbaabegail54@gmail.com', '', 'Shampoo', 30.00, '2026-05-15', 'unpaid', '2026-05-13 23:43:05', '2026-05-13 23:43:05'),
(34, 'Jayven Kim Gajo', NULL, NULL, '1x corned beef, 1x coke', 45.00, NULL, 'unpaid', '2026-05-15 01:03:20', '2026-05-15 01:03:20'),
(35, 'Jayven Kim Gajo', NULL, NULL, '1x corned beef, 1x coke', 25.00, NULL, 'unpaid', '2026-05-15 01:03:33', '2026-05-15 01:03:33');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(1, '2026-05-07-000000', 'App\\Database\\Migrations\\AddBarcodeToInventory', 'default', 'App', 1778595768, 1),
(2, '2026-05-07-000001', 'App\\Database\\Migrations\\CreateTransactionsTable', 'default', 'App', 1778595768, 1);

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` int(11) UNSIGNED NOT NULL,
  `customer_name` varchar(255) DEFAULT NULL,
  `payment_method` enum('cash','gcash','partial','utang') NOT NULL DEFAULT 'cash',
  `total_amount` decimal(10,2) NOT NULL,
  `amount_paid` decimal(10,2) NOT NULL,
  `items_json` text NOT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `customer_name`, `payment_method`, `total_amount`, `amount_paid`, `items_json`, `created_at`) VALUES
(1, 'Guest', 'cash', 50.00, 50.00, '[{\"id\":4,\"name\":\"Camel\",\"qty\":1,\"price\":10},{\"id\":3,\"name\":\"colgate\",\"qty\":2,\"price\":20}]', '2026-05-12 23:03:29'),
(2, 'Jayven Kim Gajo', 'partial', 50.00, 25.00, '[{\"name\":\"Partial Debt Settlement: royal, ice2\",\"qty\":1,\"price\":25}]', '2026-05-12 23:24:59'),
(3, 'Jayven Kim Gajo', 'gcash', 25.00, 25.00, '[{\"name\":\"Debt Settlement: royal, ice2\",\"qty\":1,\"price\":25}]', '2026-05-12 23:25:14'),
(4, 'Jayven Gajo', 'cash', 50.00, 50.00, '[{\"name\":\"Debt Settlement: bread\",\"qty\":1,\"price\":50}]', '2026-05-13 00:39:47'),
(5, 'abegail gelba', 'cash', 45.00, 45.00, '[{\"name\":\"Debt Settlement: toxino, rice\",\"qty\":1,\"price\":45}]', '2026-05-13 01:40:31'),
(6, 'Lisa Gajo', 'utang', 30.00, 30.00, '[{\"id\":3,\"name\":\"colgate\",\"qty\":1,\"price\":20},{\"id\":4,\"name\":\"Camel\",\"qty\":1,\"price\":10}]', '2026-05-13 02:01:59'),
(7, 'Lisa Gajo', 'gcash', 30.00, 30.00, '[{\"name\":\"Debt Settlement: 1x colgate, 1x Camel\",\"qty\":1,\"price\":30}]', '2026-05-13 02:09:38'),
(8, 'Li', 'utang', 30.00, 30.00, '[{\"id\":3,\"name\":\"colgate\",\"qty\":1,\"price\":20},{\"id\":4,\"name\":\"Camel\",\"qty\":1,\"price\":10}]', '2026-05-13 02:10:22'),
(9, 'Lisa Gajo', 'cash', 20.00, 20.00, '[{\"id\":4,\"name\":\"Camel\",\"qty\":2,\"price\":10}]', '2026-05-13 02:10:45'),
(10, 'Li', 'partial', 30.00, 15.00, '[{\"name\":\"Partial Debt Settlement: 1x colgate, 1x Camel\",\"qty\":1,\"price\":15}]', '2026-05-13 02:12:35'),
(11, 'Lisa Gajo', 'utang', 30.00, 30.00, '[{\"id\":4,\"name\":\"Camel\",\"qty\":1,\"price\":10},{\"id\":3,\"name\":\"colgate\",\"qty\":1,\"price\":20}]', '2026-05-13 02:17:33'),
(12, 'Li', 'gcash', 15.00, 15.00, '[{\"name\":\"Debt Settlement: 1x colgate, 1x Camel\",\"qty\":1,\"price\":15}]', '2026-05-13 08:02:25'),
(13, 'Jayven gajo', 'gcash', 20.00, 20.00, '[{\"name\":\"Debt Settlement: kape\",\"qty\":1,\"price\":20}]', '2026-05-13 08:59:21'),
(14, 'Nyve Gajo', 'cash', 20.00, 20.00, '[{\"name\":\"Debt Settlement: tinapa\",\"qty\":1,\"price\":20}]', '2026-05-13 23:24:24'),
(15, 'Justin Gariando', 'cash', 20.00, 20.00, '[{\"name\":\"Debt Settlement: water\",\"qty\":1,\"price\":20}]', '2026-05-13 23:24:31'),
(16, 'Chazely Lopez', 'cash', 45.00, 45.00, '[{\"name\":\"Debt Settlement: coke 1litter\",\"qty\":1,\"price\":45}]', '2026-05-13 23:24:35'),
(17, 'Josev Kiervin Gajo', 'gcash', 30.00, 30.00, '[{\"name\":\"Debt Settlement: coffee\",\"qty\":1,\"price\":30}]', '2026-05-13 23:24:42'),
(18, 'Jayca Hermosura', 'gcash', 60.00, 60.00, '[{\"name\":\"Debt Settlement: corned beef\",\"qty\":1,\"price\":60}]', '2026-05-13 23:24:47'),
(19, 'Lourd Ian Rentino', 'cash', 100.00, 100.00, '[{\"name\":\"Debt Settlement: coffee\",\"qty\":1,\"price\":100}]', '2026-05-13 23:24:54'),
(20, 'Lisa Gajo', 'gcash', 30.00, 30.00, '[{\"name\":\"Debt Settlement: 1x Camel, 1x colgate\",\"qty\":1,\"price\":30}]', '2026-05-13 23:25:04'),
(21, 'Jaspher Magbo-o', 'gcash', 500.00, 500.00, '[{\"name\":\"Debt Settlement: 2kg rice\",\"qty\":1,\"price\":500}]', '2026-05-13 23:25:09'),
(22, 'Jayven Gajo', 'gcash', 50.00, 50.00, '[{\"name\":\"Debt Settlement: coke\",\"qty\":1,\"price\":50}]', '2026-05-13 23:25:14'),
(23, 'Jayven gajo', 'gcash', 20.00, 20.00, '[{\"name\":\"Debt Settlement: cofee\\r\\n\",\"qty\":1,\"price\":20}]', '2026-05-13 23:25:17'),
(24, 'Guest', 'gcash', 30.00, 30.00, '[{\"id\":4,\"name\":\"Camel\",\"qty\":1,\"price\":10},{\"id\":3,\"name\":\"colgate\",\"qty\":1,\"price\":20}]', '2026-05-14 12:16:33'),
(25, 'Justin Gariando', 'gcash', 300.00, 300.00, '[{\"name\":\"Debt Settlement: Condom\",\"qty\":1,\"price\":300}]', '2026-05-14 12:56:46'),
(26, 'Jayca ', 'gcash', 70.00, 70.00, '[{\"name\":\"Debt Settlement: 2kg rice\",\"qty\":1,\"price\":70}]', '2026-05-14 13:14:50'),
(27, 'Ronelo Dacillo', 'cash', 60.00, 60.00, '[{\"name\":\"Debt Settlement: 1L Coke\",\"qty\":1,\"price\":60}]', '2026-05-14 13:20:00'),
(28, 'Ronelo Dacillo', 'gcash', 60.00, 60.00, '[{\"name\":\"Debt Settlement: 1L Coke\",\"qty\":1,\"price\":60}]', '2026-05-14 13:20:32'),
(29, 'Justin John Mata', 'partial', 100.00, 20.00, '[{\"name\":\"Partial Debt Settlement: Load\",\"qty\":1,\"price\":20}]', '2026-05-14 13:20:50'),
(30, 'Justin John Mata', 'partial', 80.00, 30.00, '[{\"name\":\"Partial Debt Settlement: Load\",\"qty\":1,\"price\":30}]', '2026-05-14 13:26:20'),
(31, 'Jayca ', 'gcash', 70.00, 70.00, '[{\"name\":\"Debt Settlement: rice\",\"qty\":1,\"price\":70}]', '2026-05-14 13:33:17'),
(32, 'jayca ', 'cash', 50.00, 50.00, '[{\"name\":\"Debt Settlement: napkin\",\"qty\":1,\"price\":50}]', '2026-05-14 13:35:55'),
(33, 'jayca ', 'cash', 50.00, 50.00, '[{\"name\":\"Debt Settlement: napkin\",\"qty\":1,\"price\":50}]', '2026-05-14 13:36:45'),
(34, 'reyshel', 'utang', 60.00, 60.00, '[{\"id\":4,\"name\":\"Camel\",\"qty\":6,\"price\":10}]', '2026-05-14 13:42:19'),
(35, 'Guest', 'gcash', 50.00, 50.00, '[{\"id\":9,\"name\":\"paracetamol\",\"qty\":10,\"price\":5}]', '2026-05-14 14:08:36'),
(36, 'Mariel Libre', 'gcash', 100.00, 100.00, '[{\"name\":\"Debt Settlement: Coffee\",\"qty\":1,\"price\":100}]', '2026-05-14 14:34:22'),
(37, 'Guest', 'cash', 395.00, 395.00, '[{\"id\":7,\"name\":\"corned beef\",\"qty\":1,\"price\":25},{\"id\":6,\"name\":\"coke\",\"qty\":1,\"price\":20},{\"id\":10,\"name\":\"brilliant set\",\"qty\":1,\"price\":350}]', '2026-05-14 22:28:24'),
(38, 'Mariel Libre', 'partial', 45.00, 15.00, '[{\"id\":7,\"name\":\"corned beef\",\"qty\":1,\"price\":25},{\"id\":3,\"name\":\"colgate\",\"qty\":1,\"price\":20}]', '2026-05-14 22:37:04'),
(39, 'Guest', 'cash', 65.00, 65.00, '[{\"id\":3,\"name\":\"colgate\",\"qty\":1,\"price\":20},{\"id\":6,\"name\":\"coke\",\"qty\":1,\"price\":20},{\"id\":7,\"name\":\"corned beef\",\"qty\":1,\"price\":25}]', '2026-05-14 22:38:19'),
(40, 'Guest', 'cash', 90.00, 90.00, '[{\"id\":7,\"name\":\"corned beef\",\"qty\":2,\"price\":25},{\"id\":6,\"name\":\"coke\",\"qty\":1,\"price\":20},{\"id\":3,\"name\":\"colgate\",\"qty\":1,\"price\":20}]', '2026-05-14 22:46:54'),
(41, 'Mariel Libre', 'cash', 30.00, 30.00, '[{\"name\":\"Debt Settlement: 1x corned beef, 1x colgate\",\"qty\":1,\"price\":30}]', '2026-05-14 22:56:12'),
(42, 'Guest', 'cash', 45.00, 45.00, '[{\"id\":7,\"name\":\"corned beef\",\"qty\":1,\"price\":25},{\"id\":6,\"name\":\"coke\",\"qty\":1,\"price\":20}]', '2026-05-14 22:56:25'),
(43, 'Jayven Kim Gajo', 'cash', 350.00, 350.00, '[{\"id\":10,\"name\":\"brilliant set\",\"qty\":1,\"price\":350}]', '2026-05-14 22:57:26'),
(44, 'Guest', 'cash', 350.00, 350.00, '[{\"id\":10,\"name\":\"brilliant set\",\"qty\":1,\"price\":350}]', '2026-05-14 23:00:38'),
(45, 'Jayven Kim Gajo', 'cash', 350.00, 350.00, '[{\"id\":10,\"name\":\"brilliant set\",\"qty\":1,\"price\":350}]', '2026-05-14 23:03:05'),
(46, 'reyshel', 'cash', 60.00, 60.00, '[{\"name\":\"Debt Settlement: 6x Camel\",\"qty\":1,\"price\":60}]', '2026-05-14 23:07:07'),
(47, 'Jayven Kim Gajo', 'cash', 45.00, 45.00, '[{\"id\":7,\"name\":\"corned beef\",\"qty\":1,\"price\":25},{\"id\":6,\"name\":\"coke\",\"qty\":1,\"price\":20}]', '2026-05-14 23:07:41'),
(48, 'Jayven Kim Gajo', 'cash', 350.00, 350.00, '[{\"id\":10,\"name\":\"brilliant set\",\"qty\":1,\"price\":350}]', '2026-05-14 23:09:45'),
(49, 'Jayven Kim Gajo', 'cash', 355.00, 355.00, '[{\"id\":10,\"name\":\"brilliant set\",\"qty\":1,\"price\":350},{\"id\":9,\"name\":\"paracetamol\",\"qty\":1,\"price\":5}]', '2026-05-14 23:13:27'),
(50, 'Justin John Mata', 'cash', 50.00, 50.00, '[{\"name\":\"Debt Settlement: Load\",\"qty\":1,\"price\":50}]', '2026-05-14 23:13:56'),
(51, 'Jayven Kim Gajo', 'cash', 375.00, 375.00, '[{\"id\":7,\"name\":\"corned beef\",\"qty\":1,\"price\":25},{\"id\":10,\"name\":\"brilliant set\",\"qty\":1,\"price\":350}]', '2026-05-14 23:14:10'),
(52, 'Jayven Kim Gajo', 'cash', 350.00, 350.00, '[{\"id\":10,\"name\":\"brilliant set\",\"qty\":1,\"price\":350}]', '2026-05-14 23:15:59'),
(53, 'Jayven Kim Gajo', 'cash', 400.00, 400.00, '[{\"id\":10,\"name\":\"brilliant set\",\"qty\":1,\"price\":350},{\"id\":9,\"name\":\"paracetamol\",\"qty\":1,\"price\":5},{\"id\":8,\"name\":\"555\",\"qty\":1,\"price\":45}]', '2026-05-14 23:18:20'),
(54, 'Jayven Kim Gajo', 'cash', 350.00, 350.00, '[{\"id\":10,\"name\":\"brilliant set\",\"qty\":1,\"price\":350}]', '2026-05-14 23:25:33'),
(55, 'Jayven Kim Gajo', 'cash', 40.00, 40.00, '[{\"id\":6,\"name\":\"coke\",\"qty\":1,\"price\":20},{\"id\":3,\"name\":\"colgate\",\"qty\":1,\"price\":20}]', '2026-05-14 23:32:52'),
(56, 'Jayven Kim Gajo', 'cash', 350.00, 350.00, '[{\"id\":10,\"name\":\"brilliant set\",\"qty\":1,\"price\":350}]', '2026-05-14 23:35:51'),
(57, 'Jayven Kim Gajo', 'cash', 40.00, 40.00, '[{\"id\":3,\"name\":\"colgate\",\"qty\":1,\"price\":20},{\"id\":6,\"name\":\"coke\",\"qty\":1,\"price\":20}]', '2026-05-14 23:40:48'),
(58, 'Jayven Kim Gajo', 'cash', 45.00, 45.00, '[{\"id\":6,\"name\":\"coke\",\"qty\":1,\"price\":20},{\"id\":3,\"name\":\"colgate\",\"qty\":1,\"price\":20},{\"id\":9,\"name\":\"paracetamol\",\"qty\":1,\"price\":5}]', '2026-05-14 23:44:45'),
(59, 'Jayven Kim Gajo', 'cash', 100.00, 100.00, '[{\"id\":6,\"name\":\"coke\",\"qty\":3,\"price\":20},{\"id\":3,\"name\":\"colgate\",\"qty\":2,\"price\":20}]', '2026-05-14 23:49:51'),
(60, 'Guest', 'cash', 15.00, 15.00, '[{\"id\":-1778777187204,\"name\":\"Yakult\",\"qty\":1,\"price\":15}]', '2026-05-15 00:46:34'),
(61, 'Jayven Kim Gajo', 'cash', 15.00, 15.00, '[{\"id\":-1778777399699,\"name\":\"Yakult\",\"qty\":1,\"price\":15,\"category\":\"Beverages\",\"saveToInventory\":true}]', '2026-05-15 00:50:11'),
(62, 'Jayven Kim Gajo', 'utang', 45.00, 45.00, '[{\"id\":7,\"name\":\"corned beef\",\"qty\":1,\"price\":25,\"category\":\"\",\"saveToInventory\":false},{\"id\":6,\"name\":\"coke\",\"qty\":1,\"price\":20,\"category\":\"\",\"saveToInventory\":false}]', '2026-05-15 00:57:17'),
(63, 'Jayven Kim Gajo', 'partial', 45.00, 20.00, '[{\"name\":\"Partial Debt Settlement: 1x corned beef, 1x coke\",\"qty\":1,\"price\":20}]', '2026-05-15 00:59:04'),
(64, 'Jayven Kim Gajo', 'gcash', 25.00, 25.00, '[{\"name\":\"Debt Settlement: 1x corned beef, 1x coke\",\"qty\":1,\"price\":25}]', '2026-05-15 00:59:49'),
(65, 'Jayven Kim Gajo', 'gcash', 45.00, 45.00, '[{\"id\":7,\"name\":\"corned beef\",\"qty\":1,\"price\":25,\"category\":\"\",\"saveToInventory\":false},{\"id\":6,\"name\":\"coke\",\"qty\":1,\"price\":20,\"category\":\"\",\"saveToInventory\":false}]', '2026-05-15 01:03:04'),
(66, 'Jayven Kim Gajo', 'cash', 45.00, 45.00, '[{\"id\":7,\"name\":\"corned beef\",\"qty\":1,\"price\":25,\"category\":\"\",\"saveToInventory\":false},{\"id\":6,\"name\":\"coke\",\"qty\":1,\"price\":20,\"category\":\"\",\"saveToInventory\":false}]', '2026-05-15 01:03:13'),
(67, 'Jayven Kim Gajo', 'utang', 45.00, 45.00, '[{\"id\":7,\"name\":\"corned beef\",\"qty\":1,\"price\":25,\"category\":\"\",\"saveToInventory\":false},{\"id\":6,\"name\":\"coke\",\"qty\":1,\"price\":20,\"category\":\"\",\"saveToInventory\":false}]', '2026-05-15 01:03:20'),
(68, 'Jayven Kim Gajo', 'partial', 45.00, 20.00, '[{\"id\":7,\"name\":\"corned beef\",\"qty\":1,\"price\":25,\"category\":\"\",\"saveToInventory\":false},{\"id\":6,\"name\":\"coke\",\"qty\":1,\"price\":20,\"category\":\"\",\"saveToInventory\":false}]', '2026-05-15 01:03:33');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','user') NOT NULL DEFAULT 'user',
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`, `created_at`) VALUES
(4, 'admin0', '$2y$10$h3d.MVndiWdQq10kvuMUWecUwFon0ZMjufDGUa303ZvA66KYrsQbC', 'admin', '2026-05-12 22:19:54'),
(5, 'admin', '$2y$10$4A/gbqVTOzN1I3.7kq2.ROd34wFCCFpJZqRB6PGvGpIwF3oBrx5eS', 'user', '2026-05-13 02:01:12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity_logs`
--
ALTER TABLE `activity_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `listahan`
--
ALTER TABLE `listahan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity_logs`
--
ALTER TABLE `activity_logs`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=115;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `listahan`
--
ALTER TABLE `listahan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
