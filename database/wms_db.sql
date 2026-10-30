-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 30, 2026 at 08:32 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wms_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Elektronik', NULL, '2026-10-29 02:17:22', '2026-10-29 02:17:22'),
(2, 'Alat Tulis', NULL, '2026-10-29 02:17:22', '2026-10-29 02:17:22'),
(3, 'Makanan & Minuman', NULL, '2026-10-29 02:17:22', '2026-10-29 02:17:22'),
(4, 'Peralatan Rumah Tangga', NULL, '2026-10-29 02:17:22', '2026-10-29 02:17:22');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2026_10_29_065048_create_categories_table', 1),
(5, '2026_10_29_065105_create_suppliers_table', 1),
(6, '2026_10_29_065127_create_products_table', 1),
(7, '2026_10_29_065148_create_stock_transactions_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `supplier_id` bigint(20) UNSIGNED NOT NULL,
  `sku` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `unit` varchar(20) NOT NULL DEFAULT 'pcs',
  `stock` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `min_stock` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `price` decimal(12,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `supplier_id`, `sku`, `name`, `description`, `unit`, `stock`, `min_stock`, `price`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'ELK-001', 'Mouse Wireless', NULL, 'pcs', 29, 20, 85000.00, '2026-10-29 02:17:22', '2026-10-29 02:17:23'),
(2, 1, 2, 'ELK-002', 'Keyboard USB', NULL, 'pcs', 110, 20, 150000.00, '2026-10-29 02:17:22', '2026-10-29 02:17:23'),
(3, 2, 3, 'ATK-001', 'Pulpen Hitam (Box)', NULL, 'box', 45, 20, 36000.00, '2026-10-29 02:17:22', '2026-10-29 02:17:23'),
(4, 2, 1, 'ATK-002', 'Kertas A4 80gsm', NULL, 'rim', 74, 20, 52000.00, '2026-10-29 02:17:22', '2026-10-29 02:17:23'),
(5, 3, 2, 'MKN-001', 'Air Mineral 600ml (Dus)', NULL, 'dus', 30, 20, 48000.00, '2026-10-29 02:17:22', '2026-10-29 02:17:23'),
(6, 3, 3, 'MKN-002', 'Mie Instan (Dus)', NULL, 'dus', 57, 20, 110000.00, '2026-10-29 02:17:22', '2026-10-29 23:36:19'),
(7, 4, 1, 'RT-001', 'Sapu Lantai', NULL, 'pcs', 52, 20, 25000.00, '2026-10-29 02:17:22', '2026-10-29 02:17:23'),
(8, 4, 2, 'RT-002', 'Ember Plastik', NULL, 'pcs', 54, 20, 18000.00, '2026-10-29 02:17:22', '2026-10-29 02:17:23');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('6UcxtLFrKSb7v0qAxYfXKezcUWsrj7n9pffKdzHf', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/156.0.0.0 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoiU1hHOWthSXloV1NRV3RsM0RYdHc1Q0lSME9OY29KMnBLNDVHd2w5MiI7czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjI6e3M6MzoidXJsIjtzOjMxOiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvZGFzaGJvYXJkIjtzOjU6InJvdXRlIjtzOjk6ImRhc2hib2FyZCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7czoxNzoicGFzc3dvcmRfaGFzaF93ZWIiO3M6NjQ6ImE0NWRmOGVlYzJiZTExYjBiYzk1ZjVmNTQ4MGRhOTBkMzg3ZGNmMWUzNmM5ZDg4MjE4NzMyMjQ4NWY5MjA4M2YiO30=', 1793344587),
('YdzceJOrK7BIUgkfZwYtgGBhBhVTW7IcHFKO9y34', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/156.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiUllneXV4QUJIMnAzTlNQWmZsVnB0R0lXVzU0RU9mMlU5aEg5UW1xWiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MzE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9kYXNoYm9hcmQiO3M6NToicm91dGUiO3M6OToiZGFzaGJvYXJkIjt9czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTtzOjE3OiJwYXNzd29yZF9oYXNoX3dlYiI7czo2NDoiYTQ1ZGY4ZWVjMmJlMTFiMGJjOTVmNWY1NDgwZGE5MGQzODdkY2YxZTM2YzlkODgyMTg3MzIyNDg1ZjkyMDgzZiI7fQ==', 1793344305);

-- --------------------------------------------------------

--
-- Table structure for table `stock_transactions`
--

CREATE TABLE `stock_transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `type` enum('in','out') NOT NULL,
  `quantity` int(10) UNSIGNED NOT NULL,
  `note` text DEFAULT NULL,
  `transaction_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `stock_transactions`
--

INSERT INTO `stock_transactions` (`id`, `product_id`, `user_id`, `type`, `quantity`, `note`, `transaction_date`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'in', 67, 'Stok awal', '2026-10-22', '2026-10-29 02:17:23', '2026-10-29 02:17:23'),
(2, 1, 2, 'out', 38, 'Pengiriman pesanan', '2026-10-27', '2026-10-29 02:17:23', '2026-10-29 02:17:23'),
(3, 2, 1, 'in', 139, 'Stok awal', '2026-10-22', '2026-10-29 02:17:23', '2026-10-29 02:17:23'),
(4, 2, 2, 'out', 29, 'Pengiriman pesanan', '2026-10-27', '2026-10-29 02:17:23', '2026-10-29 02:17:23'),
(5, 3, 1, 'in', 85, 'Stok awal', '2026-10-22', '2026-10-29 02:17:23', '2026-10-29 02:17:23'),
(6, 3, 2, 'out', 40, 'Pengiriman pesanan', '2026-10-27', '2026-10-29 02:17:23', '2026-10-29 02:17:23'),
(7, 4, 1, 'in', 91, 'Stok awal', '2026-10-22', '2026-10-29 02:17:23', '2026-10-29 02:17:23'),
(8, 4, 2, 'out', 17, 'Pengiriman pesanan', '2026-10-27', '2026-10-29 02:17:23', '2026-10-29 02:17:23'),
(9, 5, 1, 'in', 63, 'Stok awal', '2026-10-22', '2026-10-29 02:17:23', '2026-10-29 02:17:23'),
(10, 5, 2, 'out', 33, 'Pengiriman pesanan', '2026-10-27', '2026-10-29 02:17:23', '2026-10-29 02:17:23'),
(11, 6, 1, 'in', 113, 'Stok awal', '2026-10-22', '2026-10-29 02:17:23', '2026-10-29 02:17:23'),
(12, 6, 2, 'out', 33, 'Pengiriman pesanan', '2026-10-27', '2026-10-29 02:17:23', '2026-10-29 02:17:23'),
(13, 7, 1, 'in', 76, 'Stok awal', '2026-10-22', '2026-10-29 02:17:23', '2026-10-29 02:17:23'),
(14, 7, 2, 'out', 24, 'Pengiriman pesanan', '2026-10-27', '2026-10-29 02:17:23', '2026-10-29 02:17:23'),
(15, 8, 1, 'in', 83, 'Stok awal', '2026-10-22', '2026-10-29 02:17:23', '2026-10-29 02:17:23'),
(16, 8, 2, 'out', 29, 'Pengiriman pesanan', '2026-10-27', '2026-10-29 02:17:23', '2026-10-29 02:17:23'),
(17, 6, 1, 'in', 10, NULL, '2026-10-30', '2026-10-29 23:20:26', '2026-10-29 23:20:26'),
(18, 6, 1, 'in', 12, NULL, '2026-10-30', '2026-10-29 23:22:09', '2026-10-29 23:22:09'),
(19, 6, 1, 'out', 15, NULL, '2026-10-30', '2026-10-29 23:23:10', '2026-10-29 23:23:10'),
(20, 6, 1, 'out', 45, NULL, '2026-10-30', '2026-10-29 23:23:41', '2026-10-29 23:23:41'),
(21, 6, 1, 'in', 15, NULL, '2026-10-30', '2026-10-29 23:36:19', '2026-10-29 23:36:19');

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`id`, `name`, `phone`, `email`, `address`, `created_at`, `updated_at`) VALUES
(1, 'PT Sumber Makmur', '021555001', 'sales@sumbermakmur.test', 'Jakarta', '2026-10-29 02:17:22', '2026-10-29 02:17:22'),
(2, 'CV Maju Jaya', '022555002', 'info@majujaya.test', 'Bandung', '2026-10-29 02:17:22', '2026-10-29 02:17:22'),
(3, 'UD Berkah Abadi', '031555003', 'order@berkahabadi.test', 'Surabaya', '2026-10-29 02:17:22', '2026-10-29 02:17:22');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','staff') NOT NULL DEFAULT 'staff',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Hulu', 'huluaja@gmail.com', NULL, '$2y$12$WmO..sN0AkOaTMBvBXhyQukofKRUxKDGuUdDbf.S52O0uDE/b9f/e', 'admin', NULL, '2026-10-29 02:17:22', '2026-10-29 02:17:22'),
(2, 'Staff Gudang', 'staff@gmail.com', NULL, '$2y$12$gWlLhLHkrpk2vbXGc1ttU.fjNy52gffjIxABKiQGDqNKL7aRzT7Ni', 'staff', NULL, '2026-10-29 02:17:22', '2026-10-29 02:17:22');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_expiration_index` (`expiration`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_locks_expiration_index` (`expiration`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_name_unique` (`name`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `products_sku_unique` (`sku`),
  ADD KEY `products_category_id_foreign` (`category_id`),
  ADD KEY `products_supplier_id_foreign` (`supplier_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `stock_transactions`
--
ALTER TABLE `stock_transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `stock_transactions_product_id_foreign` (`product_id`),
  ADD KEY `stock_transactions_user_id_foreign` (`user_id`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `stock_transactions`
--
ALTER TABLE `stock_transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `products_supplier_id_foreign` FOREIGN KEY (`supplier_id`) REFERENCES `suppliers` (`id`);

--
-- Constraints for table `stock_transactions`
--
ALTER TABLE `stock_transactions`
  ADD CONSTRAINT `stock_transactions_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `stock_transactions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
