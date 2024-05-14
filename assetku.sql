-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 14, 2024 at 10:50 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `assetku`
--

-- --------------------------------------------------------

--
-- Table structure for table `assets_management`
--

CREATE TABLE `assets_management` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `asset_number` varchar(255) NOT NULL,
  `service_tag` varchar(255) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `specification` varchar(255) DEFAULT NULL,
  `category_id` int(11) NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `status_checkin` int(11) NOT NULL,
  `purchase_date` datetime NOT NULL,
  `warranty` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `conditions` varchar(250) NOT NULL,
  `image` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `assets_management`
--

INSERT INTO `assets_management` (`id`, `asset_number`, `service_tag`, `product_name`, `specification`, `category_id`, `uuid`, `quantity`, `status`, `status_checkin`, `purchase_date`, `warranty`, `created_by`, `updated_by`, `created_at`, `updated_at`, `conditions`, `image`) VALUES
(1, 'LPTCMIJKTOPR002', '6XH35P2', 'ASUS ROG', NULL, 1, '4976ad07-b0f5-4a10-a695-948266c38f95', 1, 4, 2, '2024-05-15 00:00:00', 3, 1, NULL, '2024-05-03 02:46:06', '2024-05-03 02:55:00', 'Casing,Tas', '202405030946LPTCMIJKTOPR002.jpeg'),
(2, '1234', '1234', 'TEST', 'sdjasdhjasdhjsadhashd', 1, '95ee22d2-556e-47d2-8911-144e7ccfcd5c', 1, 4, 2, '2024-05-03 00:00:00', 12, 1, NULL, '2024-05-03 02:48:22', '2024-05-14 01:39:36', 'Casing', '2024050309481234.jpeg'),
(3, '065/LTP/JKT-CMI/05/2023', '2BVTLG3', 'LAPTOP', 'LPTCMIPRMTJKT002	Laptop	Dell	Latitude 3420	2BVTLG3	Intel Core i5	8 GB	SSD 512GB', 1, 'aad426c8-968a-4d1c-ac0d-951f6a30b8fc', 1, 4, 2, '2024-05-06 00:00:00', 0, 1, NULL, '2024-05-05 21:26:55', '2024-05-05 21:27:38', 'Adaptor,Tas', '202405060426065/LTP/JKT-CMI/05/2023.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `asset_transaction`
--

CREATE TABLE `asset_transaction` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `asset_id` int(11) NOT NULL,
  `transaction_date` datetime NOT NULL,
  `user` varchar(255) NOT NULL,
  `department_id` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `email` varchar(250) DEFAULT NULL,
  `phone` varchar(100) DEFAULT NULL,
  `needed` varchar(100) DEFAULT NULL,
  `end_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `asset_transaction`
--

INSERT INTO `asset_transaction` (`id`, `asset_id`, `transaction_date`, `user`, `department_id`, `type`, `created_by`, `updated_by`, `created_at`, `updated_at`, `email`, `phone`, `needed`, `end_date`) VALUES
(1, 1, '2024-05-03 00:00:00', 'MUHAMMAD EKKY', '3', 'CHECKOUT', 1, 1, '2024-05-03 02:55:00', '2024-05-03 02:57:38', 'muhanif91@gmail.com', '+62 852-7770-6007', 'Dinas  Ke Site', '2024-05-03'),
(2, 3, '2024-05-06 00:00:00', 'RISANG NISA', '1', 'CHECKOUT', 1, 1, '2024-05-05 21:27:38', '2024-05-14 01:22:04', 'risang.nisa@marinabara.com', '+62 812-8020-2215', 'Kerja (HO Jakarta)', '2024-05-16'),
(3, 2, '2024-05-18 00:00:00', 'LU S', '1', 'CHECKOUT', 1, 1, '2024-05-14 01:17:47', '2024-05-14 01:20:27', 'admin@mail.com', '+62 852-7770-6007', 'Dinas  Ke Site', '2024-05-09'),
(4, 2, '2023-12-01 00:00:00', 'LU S', '1', 'CHECKIN', 1, NULL, '2024-05-14 01:23:24', '2024-05-14 01:23:24', NULL, NULL, NULL, NULL),
(5, 2, '2023-12-29 00:00:00', 'TEST', '1', 'CHECKOUT', 1, NULL, '2024-05-14 01:36:43', '2024-05-14 01:36:43', 'test@mail.com', '+62 812-8020-2215', 'Dinas  Ke Site', '1970-01-01'),
(6, 2, '2024-01-22 00:00:00', 'LU S', '1', 'CHECKIN', 1, NULL, '2024-05-14 01:38:12', '2024-05-14 01:38:12', NULL, NULL, NULL, NULL),
(7, 2, '2023-11-08 00:00:00', 'MUHAMMAD EKKY', '1', 'CHECKOUT', 1, NULL, '2024-05-14 01:39:36', '2024-05-14 01:39:36', 'admin@mail.com', '+62 852-7770-6007', 'Kerja (HO Jakarta)', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `desc` varchar(255) NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `desc`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'LAPTOP', '', 1, NULL, '2024-05-03 02:34:51', '2024-05-03 02:34:51');

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE `companies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `desc` varchar(255) NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`id`, `name`, `desc`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'PT CITA MINERAL INVESTINDO', '', 1, NULL, '2024-05-03 02:36:32', '2024-05-03 02:36:32'),
(2, 'PT MBL', '', 1, NULL, '2024-05-03 02:48:57', '2024-05-03 02:48:57');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `id_company` int(11) NOT NULL,
  `desc` varchar(255) NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `name`, `id_company`, `desc`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'PERMIT', 1, '', 1, NULL, '2024-05-03 02:37:10', '2024-05-03 02:37:10'),
(2, 'IT', 1, '', 1, NULL, '2024-05-03 02:48:44', '2024-05-03 02:48:44'),
(3, 'MBL - LEGAL', 1, '', 1, NULL, '2024-05-03 02:55:31', '2024-05-03 02:55:31');

-- --------------------------------------------------------

--
-- Table structure for table `detail_inventory`
--

CREATE TABLE `detail_inventory` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_product` int(11) NOT NULL,
  `desc` varchar(255) NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
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
-- Table structure for table `inventories`
--

CREATE TABLE `inventories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `no_doc` varchar(255) NOT NULL,
  `id_department` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `date_in` datetime NOT NULL,
  `date_out` datetime NOT NULL,
  `status` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
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
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_03_04_093403_create_categories_table', 1),
(6, '2022_03_04_093423_create_products_table', 1),
(7, '2022_03_04_093446_create_inventory_table', 1),
(8, '2022_03_04_093456_create_detail_inventory_table', 1),
(9, '2022_03_04_093509_create_department_table', 1),
(10, '2022_03_04_093526_create_companies_table', 1),
(11, '2022_08_16_155701_create_assets_management_table', 1),
(12, '2022_08_17_044413_create_asset_transaction_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `id_category` int(11) NOT NULL,
  `desc` varchar(255) NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `created_by` int(11) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `username`, `email_verified_at`, `password`, `created_by`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Muhammad Hanif', 'm.hanif@haritamineral.com', 'hanif', NULL, '$2a$12$KhRvdsj0KWbzw7P.tYU4T.3hr/aLlHUbN7k0yNNuMJqpzrmV.p72i', 0, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assets_management`
--
ALTER TABLE `assets_management`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `asset_transaction`
--
ALTER TABLE `asset_transaction`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `detail_inventory`
--
ALTER TABLE `detail_inventory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `inventories`
--
ALTER TABLE `inventories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_username_unique` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assets_management`
--
ALTER TABLE `assets_management`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `asset_transaction`
--
ALTER TABLE `asset_transaction`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `detail_inventory`
--
ALTER TABLE `detail_inventory`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `inventories`
--
ALTER TABLE `inventories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
