-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 12, 2026 at 05:46 PM
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
(3, NULL, 'colgate', 'Hygeine', 20.00, 2, '2026-04-16 08:06:55'),
(4, NULL, 'Camel', 'wants', 10.00, 14, '2026-04-16 08:22:38');

-- --------------------------------------------------------

--
-- Table structure for table `listahan`
--

CREATE TABLE `listahan` (
  `id` int(11) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `items` text DEFAULT NULL,
  `amount` decimal(10,2) NOT NULL,
  `status` enum('unpaid','paid') DEFAULT 'unpaid',
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `listahan`
--

INSERT INTO `listahan` (`id`, `customer_name`, `items`, `amount`, `status`, `created_at`, `updated_at`) VALUES
(2, 'Justin Gariando', 'water', 20.00, 'unpaid', '2026-04-16 14:56:13', '2026-04-16 14:56:13'),
(3, 'abegail gelba', 'toxino, rice', 45.00, 'unpaid', '2026-04-16 14:56:55', '2026-04-16 14:56:55'),
(6, 'Chazely Lopez', 'coke 1litter', 45.00, 'unpaid', '2026-05-12 23:27:33', '2026-05-12 23:27:33');

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
(3, 'Jayven Kim Gajo', 'gcash', 25.00, 25.00, '[{\"name\":\"Debt Settlement: royal, ice2\",\"qty\":1,\"price\":25}]', '2026-05-12 23:25:14');

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
(2, 'admin1', '$2y$10$GOUVBypwL1SyJYmFLf3s9O9ftnjmrIMXPymxLgmnMLqflI0NM3GJm', 'admin', '2026-04-15 12:11:02'),
(4, 'admin0', '$2y$10$h3d.MVndiWdQq10kvuMUWecUwFon0ZMjufDGUa303ZvA66KYrsQbC', 'admin', '2026-05-12 22:19:54');

--
-- Indexes for dumped tables
--

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
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `listahan`
--
ALTER TABLE `listahan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
