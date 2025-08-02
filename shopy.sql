-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 01, 2025 at 08:10 AM
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
-- Database: `shopy`
--

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_12_27_071010_create_users_table', 2),
(6, '2024_01_02_132431_create_user_registers_table', 3),
(7, '2024_01_04_031550_create_user_registers_table', 4),
(8, '2024_01_08_123738_create_users_table', 5),
(9, '2024_01_08_194727_create_bill_shops_table', 6),
(10, '2024_01_09_103716_create_user_roles_table', 7),
(11, '2024_01_23_113533_create_bill_products_table', 8),
(12, '2024_01_23_123149_create_bill_products_table', 9),
(13, '2024_01_23_123517_create_bill_products_table', 10),
(14, '2024_01_23_222636_create_bill_products_table', 11),
(15, '2024_03_28_183524_create_bill_shop_types_table', 12),
(16, '2024_03_29_112216_create_bill_shop_plans_table', 13),
(17, '2024_04_02_112611_create_bill_shop_plan_durations_table', 14),
(18, '2024_04_02_113005_create_bill_shop_plan_durations_table', 15),
(19, '2024_04_04_180213_create_bill_shops_table', 16),
(20, '2024_04_04_184529_create_bill_shops_table', 17),
(21, '2024_07_27_130708_create_courses_table', 18),
(22, '2024_07_27_235054_create_courses_table', 19),
(23, '2024_07_28_021940_create_courses_table', 20),
(24, '2024_07_28_120844_create_course_topics_table', 21),
(25, '2024_07_28_131726_create_course_topics_table', 22),
(26, '2024_08_05_005441_add_active_to_users_table', 23),
(27, '2024_08_11_150940_create_course_users_table', 24),
(28, '2025_05_22_100255_create_districts_table', 25),
(29, '2025_05_22_100956_create_districts_table', 26),
(30, '2025_05_22_111415_create_user_registers_table', 27),
(31, '2025_05_22_124850_create_users_table', 28),
(32, '2025_05_22_131101_create_users_table', 29),
(33, '2025_06_06_162112_create_user_detail_changes_table', 30),
(34, '2025_06_09_144609_create_user_images_table', 31),
(35, '2025_06_11_162944_create_payments_table', 32),
(36, '2025_06_17_142923_create_sessions_table', 33),
(37, '2025_06_19_130309_add_user_code_to_users_table', 34),
(38, '2025_06_20_092834_add_referrer_code_to_user_registers_table', 35),
(39, '2025_06_20_093022_add_referrer_code_to_users_table', 36),
(40, '2025_07_02_120203_create_lead_statuses_table', 37),
(41, '2025_07_02_123737_create_leads_table', 38),
(42, '2025_07_17_134530_create_tracks_table', 39),
(43, '2025_07_24_143811_add_last_activity_to_users_table', 40),
(44, '2025_07_24_153020_add_location_columns_to_tracks_table', 41),
(45, '2025_07_30_160807_create_products_table', 42),
(46, '2025_07_31_165644_create_orders_table', 43);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_json` varchar(255) NOT NULL,
  `address1` varchar(255) DEFAULT NULL,
  `address2` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `zip` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
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
  `name` varchar(255) NOT NULL,
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
(7, 'App\\Models\\User', 2, 'AuthToken', '9ae56836baa4eb5e2b1d66c75c8732c75aa13ab2df1558791df9e8b35ce4086c', '[\"*\"]', NULL, NULL, '2024-04-26 09:03:55', '2024-04-26 09:03:55'),
(8, 'App\\Models\\User', 2, 'AuthToken', 'c1e01d97b24feba3a61b72f720f256ee17b3932ba9a7dee559d9cd86318cf4af', '[\"*\"]', NULL, NULL, '2024-04-26 09:04:16', '2024-04-26 09:04:16'),
(9, 'App\\Models\\User', 2, 'AuthToken', 'f7c549ed435e0753e460c8024e16eeeb25231f4a854608e02b7459e780ff684d', '[\"*\"]', NULL, NULL, '2024-04-26 09:07:35', '2024-04-26 09:07:35'),
(10, 'App\\Models\\User', 2, 'AuthToken', 'c87e9c3583e5b92add416498cd1cd5ffc9af2a9077583d36a6bcbc9015273621', '[\"*\"]', NULL, NULL, '2024-04-26 10:02:20', '2024-04-26 10:02:20'),
(11, 'App\\Models\\User', 2, 'AuthToken', 'b78c169b32bd399b40f5c29b662419d8c571d9524b302fe825cf8fdfd8ed07c5', '[\"*\"]', '2024-04-26 14:22:48', NULL, '2024-04-26 12:40:31', '2024-04-26 14:22:48'),
(7, 'App\\Models\\User', 2, 'AuthToken', '9ae56836baa4eb5e2b1d66c75c8732c75aa13ab2df1558791df9e8b35ce4086c', '[\"*\"]', NULL, NULL, '2024-04-26 09:03:55', '2024-04-26 09:03:55'),
(8, 'App\\Models\\User', 2, 'AuthToken', 'c1e01d97b24feba3a61b72f720f256ee17b3932ba9a7dee559d9cd86318cf4af', '[\"*\"]', NULL, NULL, '2024-04-26 09:04:16', '2024-04-26 09:04:16'),
(9, 'App\\Models\\User', 2, 'AuthToken', 'f7c549ed435e0753e460c8024e16eeeb25231f4a854608e02b7459e780ff684d', '[\"*\"]', NULL, NULL, '2024-04-26 09:07:35', '2024-04-26 09:07:35'),
(10, 'App\\Models\\User', 2, 'AuthToken', 'c87e9c3583e5b92add416498cd1cd5ffc9af2a9077583d36a6bcbc9015273621', '[\"*\"]', NULL, NULL, '2024-04-26 10:02:20', '2024-04-26 10:02:20'),
(11, 'App\\Models\\User', 2, 'AuthToken', 'b78c169b32bd399b40f5c29b662419d8c571d9524b302fe825cf8fdfd8ed07c5', '[\"*\"]', '2024-04-26 14:22:48', NULL, '2024-04-26 12:40:31', '2024-04-26 14:22:48'),
(7, 'App\\Models\\User', 2, 'AuthToken', '9ae56836baa4eb5e2b1d66c75c8732c75aa13ab2df1558791df9e8b35ce4086c', '[\"*\"]', NULL, NULL, '2024-04-26 09:03:55', '2024-04-26 09:03:55'),
(8, 'App\\Models\\User', 2, 'AuthToken', 'c1e01d97b24feba3a61b72f720f256ee17b3932ba9a7dee559d9cd86318cf4af', '[\"*\"]', NULL, NULL, '2024-04-26 09:04:16', '2024-04-26 09:04:16'),
(9, 'App\\Models\\User', 2, 'AuthToken', 'f7c549ed435e0753e460c8024e16eeeb25231f4a854608e02b7459e780ff684d', '[\"*\"]', NULL, NULL, '2024-04-26 09:07:35', '2024-04-26 09:07:35'),
(10, 'App\\Models\\User', 2, 'AuthToken', 'c87e9c3583e5b92add416498cd1cd5ffc9af2a9077583d36a6bcbc9015273621', '[\"*\"]', NULL, NULL, '2024-04-26 10:02:20', '2024-04-26 10:02:20'),
(11, 'App\\Models\\User', 2, 'AuthToken', 'b78c169b32bd399b40f5c29b662419d8c571d9524b302fe825cf8fdfd8ed07c5', '[\"*\"]', '2024-04-26 14:22:48', NULL, '2024-04-26 12:40:31', '2024-04-26 14:22:48'),
(7, 'App\\Models\\User', 2, 'AuthToken', '9ae56836baa4eb5e2b1d66c75c8732c75aa13ab2df1558791df9e8b35ce4086c', '[\"*\"]', NULL, NULL, '2024-04-26 09:03:55', '2024-04-26 09:03:55'),
(8, 'App\\Models\\User', 2, 'AuthToken', 'c1e01d97b24feba3a61b72f720f256ee17b3932ba9a7dee559d9cd86318cf4af', '[\"*\"]', NULL, NULL, '2024-04-26 09:04:16', '2024-04-26 09:04:16'),
(9, 'App\\Models\\User', 2, 'AuthToken', 'f7c549ed435e0753e460c8024e16eeeb25231f4a854608e02b7459e780ff684d', '[\"*\"]', NULL, NULL, '2024-04-26 09:07:35', '2024-04-26 09:07:35'),
(10, 'App\\Models\\User', 2, 'AuthToken', 'c87e9c3583e5b92add416498cd1cd5ffc9af2a9077583d36a6bcbc9015273621', '[\"*\"]', NULL, NULL, '2024-04-26 10:02:20', '2024-04-26 10:02:20'),
(11, 'App\\Models\\User', 2, 'AuthToken', 'b78c169b32bd399b40f5c29b662419d8c571d9524b302fe825cf8fdfd8ed07c5', '[\"*\"]', '2024-04-26 14:22:48', NULL, '2024-04-26 12:40:31', '2024-04-26 14:22:48');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `price` varchar(255) DEFAULT '0',
  `stock_quantity` varchar(255) DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `price`, `stock_quantity`, `created_at`, `updated_at`) VALUES
(6, 'apple', 'sweet apple', '120', '6', '2025-07-30 12:03:29', '2025-08-01 05:31:27'),
(7, 'banana', 'sweet banana', '34', '110', '2025-07-30 12:09:18', '2025-08-01 06:07:26'),
(8, 'cat', 'nice a cat', '100', '40', '2025-07-31 04:35:43', '2025-08-01 06:07:26');

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
('whdOHRz0NUUyXMTBtErPH92rZ0igtmuhjHwt2uJN', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiblFES3Z4cU1xaGNqSHZVdXNCczB5QzYyeDV1MHg0M2tOYmQ4OVdFWCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjg6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9vcmRlcnMiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO30=', 1754028603);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `role_id` int(11) NOT NULL DEFAULT 2,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `password`, `role_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'santhosh raja', NULL, 'admin@gmail.com', '$2y$12$CfA7n5Pe/IXbAkQxVYwO/.TiGrbbrEm2oG1vQML.oE/9lB1npeU.m', 1, 1, '2025-06-23 19:14:05', '2025-07-31 05:57:24'),
(14, 'raja', 'rani', 'raja@gmail.com', '$2y$12$epsXb7T7.axMHffRfJ.Z3u7Mwbz9K3t2sGerIjUcMPaXLLM33IJj2', 2, 1, '2025-07-30 08:42:47', '2025-07-31 12:57:48'),
(16, 'kizhore', 'cool', 'kizhore@gmail.com', '$2y$12$4oEuDmwfaWQU7G3M8zoaeuttpm.EBXAxLjVZQG.wJYykxLaU84F7q', 2, 1, '2025-07-31 05:23:37', '2025-08-01 05:10:06');

-- --------------------------------------------------------

--
-- Table structure for table `user_roles`
--

CREATE TABLE `user_roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_roles`
--

INSERT INTO `user_roles` (`id`, `role_id`, `name`, `created_at`, `updated_at`) VALUES
(1, 1, 'admin', NULL, NULL),
(2, 2, 'customer', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
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
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_roles`
--
ALTER TABLE `user_roles`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `user_roles`
--
ALTER TABLE `user_roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
