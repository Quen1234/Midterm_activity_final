-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 13, 2026 at 05:40 PM
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
(32, 4, 'admin0', 'Email Notice Sent', 'Sent payment reminder to Joy Mae Pearl Hambre (hjoymaepearl@gmail.com)', '::1', '2026-05-13 23:28:40');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(5) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Hygeine', '2026-05-07 09:18:31', '2026-05-07 09:18:31');

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
(3, '', 'colgate', 'Hygeine', 20.00, 19, '2026-04-16 08:06:55'),
(4, NULL, 'Camel', 'wants', 10.00, 9, '2026-04-16 08:22:38');

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
(20, 'Joy Mae Pearl Hambre', 'hjoymaepearl@gmail.com', '09919510217', 'RedHorse', 500.00, '2026-06-01', 'unpaid', '2026-05-13 23:28:05', '2026-05-13 23:28:05');

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
(23, 'Jayven gajo', 'gcash', 20.00, 20.00, '[{\"name\":\"Debt Settlement: cofee\\r\\n\",\"qty\":1,\"price\":20}]', '2026-05-13 23:25:17');

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
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `listahan`
--
ALTER TABLE `listahan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
