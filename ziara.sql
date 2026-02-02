-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 02, 2026 at 10:03 AM
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
-- Database: `ziara`
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

--
-- Dumping data for table `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('laravel-cache-77de68daecd823babbb58edb1c8e14d7106e83bb', 'i:1;', 1769935709),
('laravel-cache-77de68daecd823babbb58edb1c8e14d7106e83bb:timer', 'i:1769935709;', 1769935709),
('laravel-cache-87633dfbd178cbd1c9d1db54c90f173d', 'i:1;', 1770021545),
('laravel-cache-87633dfbd178cbd1c9d1db54c90f173d:timer', 'i:1770021545;', 1770021545),
('laravel-cache-dc44958e29ffba8b810d21377ae366b5', 'i:1;', 1769958900),
('laravel-cache-dc44958e29ffba8b810d21377ae366b5:timer', 'i:1769958900;', 1769958900),
('laravel-cache-dcb2be08cc69c6ff8f2fe07a9001bca7', 'i:1;', 1769935408),
('laravel-cache-dcb2be08cc69c6ff8f2fe07a9001bca7:timer', 'i:1769935408;', 1769935408);

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
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `user_id`, `product_id`, `quantity`, `created_at`, `updated_at`) VALUES
(4, 1, 16, 4, '2026-01-31 07:14:29', '2026-02-01 09:09:27'),
(6, 1, 11, 5, '2026-02-01 09:09:41', '2026-02-02 03:08:15'),
(7, 1, 12, 1, '2026-02-02 03:08:20', '2026-02-02 03:08:20');

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
(4, '2025_12_24_125844_create_categories_table', 1),
(5, '2025_12_24_125859_create_products_table', 1),
(6, '2025_12_24_125915_create_carts_table', 1),
(7, '2025_12_24_125928_create_orders_table', 1),
(8, '2025_12_24_125953_create_order_items_table', 1),
(9, '2025_12_24_130013_create_wishlists_table', 1),
(10, '2025_12_24_154010_create_personal_access_tokens_table', 1),
(11, '2026_01_24_022455_add_two_factor_columns_to_users_table', 1),
(12, '2026_01_25_023334_add_user_type_to_users_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `total_amount` decimal(10,2) NOT NULL,
  `payment_method` varchar(255) DEFAULT NULL,
  `shipping_address` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT 1,
  `price` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` text NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `personal_access_tokens`
--

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `expires_at`, `created_at`, `updated_at`) VALUES
(1, 'App\\Models\\User', 3, 'register_token', '3fd06f8a1aedc60de708191ebf372bde623740948984574f8239f07472c1a19a', '[\"*\"]', '2026-01-28 01:21:38', NULL, '2026-01-28 00:36:21', '2026-01-28 01:21:38'),
(2, 'App\\Models\\User', 1, 'register_token', '3237be07f48064d31729d18bac2e2c11f968b50880aa6d1f49dc99ab7562acf6', '[\"*\"]', '2026-01-29 08:29:32', NULL, '2026-01-29 08:27:30', '2026-01-29 08:29:32'),
(3, 'App\\Models\\User', 3, 'register_token', '4b1bcbc36ef3ebfdb9c75e457be06c503615da46f28e98c3413cc8a89c48ba6d', '[\"*\"]', '2026-01-29 08:31:07', NULL, '2026-01-29 08:30:42', '2026-01-29 08:31:07'),
(4, 'App\\Models\\User', 1, 'test', 'c074910e927f8a165eb7af70bd61123d1cc4a0e1786fc5614c32073e149ec542', '[\"*\"]', '2026-01-31 07:28:02', NULL, '2026-01-30 02:42:09', '2026-01-31 07:28:02'),
(5, 'App\\Models\\User', 1, 'register_token', '89b7624301b09b7186cb18a33a4809ecaee87859d75ade9f294e034572f3072d', '[\"*\"]', '2026-02-01 02:04:01', NULL, '2026-02-01 01:41:45', '2026-02-01 02:04:01'),
(6, 'App\\Models\\User', 1, 'register_token', 'fe940e3269b0b9b09dc13add8dd0c608993b1c5d806cc61df0c794bf641dd582', '[\"*\"]', '2026-02-01 04:07:18', NULL, '2026-02-01 04:05:15', '2026-02-01 04:07:18'),
(7, 'App\\Models\\User', 3, 'register_token', '2502e228ae64d810ca83cf78689d491679bff261253262e8f168e574940d29b1', '[\"*\"]', NULL, NULL, '2026-02-01 07:31:29', '2026-02-01 07:31:29'),
(8, 'App\\Models\\User', 1, 'register_token', '0c67d0ccd8d7035c561a042ae133e21c460d7e87dd5e5d97c082bb56bde6e525', '[\"*\"]', NULL, NULL, '2026-02-01 08:43:05', '2026-02-01 08:43:05'),
(9, 'App\\Models\\User', 1, 'register_token', '3fa43c7b70b8e8309bb5d3778445d924cdbcf44064f643884450517fa4910ac1', '[\"*\"]', '2026-02-01 09:09:27', NULL, '2026-02-01 08:58:47', '2026-02-01 09:09:27'),
(10, 'App\\Models\\User', 1, 'register_token', '8adcaa36e1c258cccde7934e1131d53421cb37a6a51ac236dd8d093476e64e42', '[\"*\"]', NULL, NULL, '2026-02-02 03:11:04', '2026-02-02 03:11:04'),
(11, 'App\\Models\\User', 3, 'register_token', '63e373bef77295190aea3038deaa7fafba3288820e4e9e2f5aa3b209df22a4fd', '[\"*\"]', NULL, NULL, '2026-02-02 03:11:29', '2026-02-02 03:11:29');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `gender` enum('Women','Men') NOT NULL,
  `description` text DEFAULT NULL,
  `category` varchar(255) NOT NULL,
  `brand` varchar(255) DEFAULT NULL,
  `tag` enum('None','Popular','Best Selling','Featured','New Arrival') NOT NULL DEFAULT 'None',
  `discount_price` decimal(10,2) DEFAULT NULL,
  `discount_percent` decimal(5,2) DEFAULT NULL,
  `stock` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `gender`, `description`, `category`, `brand`, `tag`, `discount_price`, `discount_percent`, `stock`, `image`, `created_at`, `updated_at`) VALUES
(10, 'Floral Maxi Dress', 4500.00, 'Women', 'Flowing maxi dress with floral print, ideal for evening parties', 'Dresses', 'Mango', 'None', NULL, 10.00, 40, 'products/xLeToc3vplMgRGvE52iMYOFRu5EmM2BuMgpBsWih.jpg', '2026-01-30 08:55:43', '2026-01-30 08:55:43'),
(11, 'Sequin Evening Gown', 5500.00, 'Women', 'Elegant gown with sequin detail, perfect for special occasions', 'Dresses', 'H & M', 'Best Selling', 5300.00, NULL, 24, 'products/C9WT9P1DEUzmONCI4Rxys04zLNmikhUOIHi6vikj.jpg', '2026-01-30 08:56:27', '2026-01-30 08:56:27'),
(12, 'Sequin Evening Gown', 5500.00, 'Women', NULL, 'Dresses', 'H & M', 'None', NULL, NULL, 24, 'products/2QXWe7Vk7y5hfnZnlyRfhLOtO4wVvPJf57jaNVA1.jpg', '2026-01-30 08:57:10', '2026-01-30 08:57:10'),
(13, 'Casual Shirts', 6700.00, 'Men', 'Comfortable cotton shirt for office and casual wear.', 'Shirts', 'Uniqlo', 'Popular', NULL, 10.00, 60, 'products/e8MmXbGWLMH7kOw4WsTEetNeXbrKGDc0bLPAyx1c.jpg', '2026-01-30 08:57:58', '2026-01-30 08:57:58'),
(14, 'Leather Jacket', 9900.00, 'Men', 'Premium leather jacket with a classic biker design.', 'Shirts', 'H & M', 'None', NULL, 20.00, 45, 'products/XYwMSVYpBJUHjLu7yDgWPeurIBDtm5t06SCLVkIJ.jpg', '2026-01-30 08:58:47', '2026-01-30 08:58:47'),
(15, 'Classic shoes', 10400.00, 'Men', NULL, 'Men Shoes', 'Clarks', 'Featured', 10200.00, 20.00, 34, 'products/ZzRTomOgntwU8M8SXYAAt7kYm36D0XRCbwCrmRsO.jpg', '2026-01-30 08:59:38', '2026-01-30 08:59:38'),
(16, 'Men watch', 8900.00, 'Men', NULL, 'Men Accessories', 'Tissot', 'New Arrival', NULL, NULL, 2, 'products/uVBq1vpI8x1VJBjF9hvLEYOPjILPKsvwbfjzAV8C.jpg', '2026-01-30 09:00:30', '2026-01-30 09:00:30'),
(17, 'Women sneakers', 6700.00, 'Women', NULL, 'Women Shoes', 'Nike', 'Best Selling', NULL, NULL, 89, 'products/UFzDwpUO2SbCMozPM9K9ljx8Tp7dPQmd3OKdGMiu.jpg', '2026-02-01 03:37:44', '2026-02-01 03:37:44');

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
('BS1iXIoyCqID1HBJHFpQHNVZcIQwkfl9w2WkBwiT', NULL, '127.0.0.1', 'PostmanRuntime/7.51.1', 'YToyOntzOjY6Il90b2tlbiI7czo0MDoiU0RzdXFFcHdvVW9rQ1pWWFRYdzBVSkdtdEVMUmZyN05meThvOTc0USI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1769956474),
('LZizM7cs7QPrBHS7pu8F6a1HNUnEbRvnpn1EfPBm', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/144.0.0.0 Safari/537.36 Edg/144.0.0.0', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoieVVXZzdPVk5WeTFJNHNnaGtCQU1zVkoydjBZRk1obHAzSGdZbjU0TiI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MzA6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9wcm9kdWN0cyI7czo1OiJyb3V0ZSI7czoxNDoicHJvZHVjdHMuaW5kZXgiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO3M6MjE6InBhc3N3b3JkX2hhc2hfc2FuY3R1bSI7czo2NDoiNjVlYWYxODA2ZDlhYzAxMDUwYzI3NTQ4OGRkM2I1MTVkOTAxODkwYjQ1N2U5NjAyYTYxNzUxOWMxOTk0OGFhOSI7fQ==', 1770021501),
('NQgHKUbMBkwmOZtyOS6y4NgdO3nk388VihkRgasz', 3, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/144.0.0.0 Safari/537.36 Edg/144.0.0.0', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiQTVPYnBtZE1OMUpuTnRXbmpRMmxYWlFIRFJxOXQzMU01NnB3bUFuOSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6Mzc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hZG1pbi9kYXNoYm9hcmQiO3M6NToicm91dGUiO3M6MTU6ImFkbWluLmRhc2hib2FyZCI7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjM7czoyMToicGFzc3dvcmRfaGFzaF9zYW5jdHVtIjtzOjY0OiI2YjYzMGEzN2Y5ODAwZTY4Mjg2MTg1YzRjYmQ0NzU5MTA4YTE2MzU0NjllYmZmZGIyZDY3ZmFmMjIyZDEwMGQwIjt9', 1769959310),
('Ob1sFyyiq4RvIWD7PthGnLGS4SlHVbIa8T2n1f9y', NULL, '127.0.0.1', 'PostmanRuntime/7.51.1', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiTXVYZkM5U01XR2Nid3JvSElGQWoxMEFtNEIwaVhVa1ZsdFVlQ3BBeSI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MzM6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9wcm9kdWN0cy8xNiI7czo1OiJyb3V0ZSI7czoxMzoicHJvZHVjdHMuc2hvdyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1770021847);

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
  `two_factor_secret` text DEFAULT NULL,
  `two_factor_recovery_codes` text DEFAULT NULL,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` varchar(2048) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_type` enum('admin','customer') NOT NULL DEFAULT 'customer'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `two_factor_confirmed_at`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`, `user_type`) VALUES
(1, 'Shahima', 'shahimamuzammildeen@gmail.com', NULL, '$2y$12$BJISmH15X3LhrHfocoRW/OU1qZBxB/eaIXvwIWM/uj3KexIMNePXS', NULL, NULL, NULL, NULL, NULL, NULL, '2026-01-24 21:21:07', '2026-01-24 21:21:07', 'customer'),
(3, 'Admin', 'admin@example.com', NULL, '$2y$12$S/mliw3IhuYkaaCeGY2VNOtsVt2JY7SHaBmZxXhbM0Mvv.PrXe0.y', NULL, NULL, NULL, NULL, NULL, NULL, '2026-01-24 21:31:44', '2026-01-24 21:31:44', 'admin'),
(4, 'Max Hill', 'maxhill@gmail.com', NULL, '$2y$12$FNB.plF4OlQdNfvzuNKLneLGgPqZm/E7YaHUd2bq.40wrQTT3FLEq', NULL, NULL, NULL, NULL, NULL, NULL, '2026-02-01 03:06:03', '2026-02-01 03:06:03', 'customer');

-- --------------------------------------------------------

--
-- Table structure for table `wishlists`
--

CREATE TABLE `wishlists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `carts_user_id_product_id_unique` (`user_id`,`product_id`),
  ADD KEY `carts_product_id_foreign` (`product_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_user_id_foreign` (`user_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_items_order_id_foreign` (`order_id`),
  ADD KEY `order_items_product_id_foreign` (`product_id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`),
  ADD KEY `personal_access_tokens_expires_at_index` (`expires_at`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `wishlists`
--
ALTER TABLE `wishlists`
  ADD PRIMARY KEY (`id`),
  ADD KEY `wishlists_user_id_foreign` (`user_id`),
  ADD KEY `wishlists_product_id_foreign` (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `wishlists`
--
ALTER TABLE `wishlists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `carts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_items_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `wishlists`
--
ALTER TABLE `wishlists`
  ADD CONSTRAINT `wishlists_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `wishlists_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
