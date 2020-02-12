-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 24, 2020 at 08:30 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e_school`
--

-- --------------------------------------------------------

--
-- Table structure for table `cards`
--

CREATE TABLE `cards` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(66, '2014_10_12_000000_create_users_table', 1),
(67, '2014_10_12_100000_create_password_resets_table', 1),
(68, '2016_06_01_000001_create_oauth_auth_codes_table', 1),
(69, '2016_06_01_000002_create_oauth_access_tokens_table', 1),
(70, '2016_06_01_000003_create_oauth_refresh_tokens_table', 1),
(71, '2016_06_01_000004_create_oauth_clients_table', 1),
(72, '2016_06_01_000005_create_oauth_personal_access_clients_table', 1),
(73, '2019_08_19_000000_create_failed_jobs_table', 1),
(74, '2020_01_20_155039_create_students_table', 1),
(75, '2020_01_20_155350_create_schools_table', 1),
(76, '2020_01_20_155456_create_parents_table', 1),
(77, '2020_01_20_155839_create_cards_table', 1),
(78, '2020_01_22_123822_teachers', 2);

-- --------------------------------------------------------

--
-- Table structure for table `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_access_tokens`
--

INSERT INTO `oauth_access_tokens` (`id`, `user_id`, `client_id`, `name`, `scopes`, `revoked`, `created_at`, `updated_at`, `expires_at`) VALUES
('029ebeb33bdec9b261320fbbe53e7daea73d94baf4eece1561403bf12e981b8997ff055ff183babb', 5, 1, 'Personal Access Token', '[]', 0, '2020-01-22 12:31:39', '2020-01-22 12:31:39', '2021-01-22 13:31:39'),
('1243787cf9a6b27433ac2d9ff7fd3173121b6cca2e02ff8cc829989fe25be1380e203a814025ad2b', 5, 1, 'Personal Access Token', '[]', 0, '2020-01-23 09:57:45', '2020-01-23 09:57:45', '2021-01-23 10:57:45'),
('17e81fa268a736b4296800a18580c34ee681c6925bafccfb41d73bfc47e0d583a91feeabbe3a95f6', 5, 1, 'Personal Access Token', '[]', 0, '2020-01-23 09:52:15', '2020-01-23 09:52:15', '2021-01-23 10:52:15'),
('183d2963bf656e4825b6ae659ce9c4ba29289519d98162fc108d17acdc91b862ee38aa8dab869dca', 2, 1, 'Personal Access Token', '[]', 0, '2020-01-22 08:34:53', '2020-01-22 08:34:53', '2021-01-22 09:34:53'),
('2042f4b4a6472f5325cb87d3fd8a9cdf20729f35729d56a3869d8a2e1e9112dd94b593a89d477152', 2, 1, 'Personal Access Token', '[]', 0, '2020-01-22 08:51:17', '2020-01-22 08:51:17', '2021-01-22 09:51:17'),
('2259035ef96ca6ca7239b40281ccaf78631b083965ad14a498bfbd6aea345af6770d2517923aa5ea', 5, 1, 'Personal Access Token', '[]', 0, '2020-01-23 09:58:14', '2020-01-23 09:58:14', '2021-01-23 10:58:14'),
('39511c017c6e7bf85a97c792241c77b9ee8755ced4f2491ead6392ff981ec98727d7221362db0589', 5, 1, 'Personal Access Token', '[]', 0, '2020-01-23 07:29:27', '2020-01-23 07:29:27', '2021-01-23 08:29:27'),
('496f407ee1a92dc94c7437edc5ddf8410f47a1696fb74ca6d8d372a097c12ca2f9618abaddfd2c52', 1, 1, 'Personal Access Token', '[]', 0, '2020-01-22 11:13:03', '2020-01-22 11:13:03', '2021-01-22 12:13:03'),
('523b5d2e3f0392cd3bfc141b8acebbfaef5c521eb6e1b0848bf4715501b3ca074ca30c4134324f3b', 5, 1, 'Personal Access Token', '[]', 0, '2020-01-23 11:43:14', '2020-01-23 11:43:14', '2021-01-23 12:43:14'),
('52f1f85174e7df0cee2147b11975a0719c749cb1376104f43cb031548a45389f72f081e9ec0db69c', 5, 1, 'Personal Access Token', '[]', 0, '2020-01-23 10:04:55', '2020-01-23 10:04:55', '2021-01-23 11:04:55'),
('5889c959cd46c4650b965ca611722149b33f0e75d04a9c20eb403b0fbb8c616949cae22e91c791eb', 5, 1, 'Personal Access Token', '[]', 0, '2020-01-23 10:01:08', '2020-01-23 10:01:08', '2021-01-23 11:01:08'),
('6d65c7bbff7b32fd07690fd7629fceb800b6678cdd9773763ea4daaf238604b8520e3b1fcf5b4586', 5, 1, 'Personal Access Token', '[]', 0, '2020-01-23 10:01:59', '2020-01-23 10:01:59', '2021-01-23 11:01:59'),
('6f22440ed12607064db9b2386b453e13273e5df6ebcfba7d0b6cba766b39921f21f200c2f177e997', 5, 1, 'Personal Access Token', '[]', 0, '2020-01-22 12:32:07', '2020-01-22 12:32:07', '2021-01-22 13:32:07'),
('a9e06c505de32e61ce9a1c886f2b30532fcb738e14efdb8613c6aad3318000f28be8ea6441a805e9', 5, 1, 'Personal Access Token', '[]', 0, '2020-01-23 09:58:56', '2020-01-23 09:58:56', '2021-01-23 10:58:56'),
('ae39df947fff55546b5729af202ff9b826c1235b7a3f0480a2fdabf80f0445cd239ed11dc9d22998', 5, 1, 'Personal Access Token', '[]', 0, '2020-01-22 12:37:10', '2020-01-22 12:37:10', '2021-01-22 13:37:10'),
('af51c49cf026ebfcff36674eab1f616979ed551fd09ee011624a3050447eb0324290f3d95c52c56b', 5, 1, 'Personal Access Token', '[]', 0, '2020-01-23 09:59:52', '2020-01-23 09:59:52', '2021-01-23 10:59:52'),
('c3c68740b9d826b48e0e4bc933cecd60b347e179b138321bec1a7a5ef86e88d21e3e6207cc5f6b13', 1, 1, 'Personal Access Token', '[]', 0, '2020-01-22 07:40:56', '2020-01-22 07:40:56', '2021-01-22 08:40:56'),
('c7ec9c08ddf4336403bd538859c55e8ece75ddad1a8f65e327288680b84cb63f157905fdf7afccae', 5, 1, 'Personal Access Token', '[]', 0, '2020-01-23 10:02:35', '2020-01-23 10:02:35', '2021-01-23 11:02:35'),
('ca8eb93575945346eff811822939a9fe6b1edef081ed86a57439731362919be6ef83a9ce816e8617', 5, 1, 'Personal Access Token', '[]', 0, '2020-01-24 06:04:20', '2020-01-24 06:04:20', '2021-01-24 07:04:20'),
('d35526bb1007c2ee7da4de6d08e045fec1a9fe2ae9044f99c3e33c705ede8dd2d0efda919fbf8d99', 5, 1, 'Personal Access Token', '[]', 0, '2020-01-24 06:15:57', '2020-01-24 06:15:57', '2021-01-24 07:15:57'),
('e1625d226e7ff6f847cf8be8a3fdf1be743266d9b52c3f68fa62f8947afbf26247ca4c527ab8e796', 5, 1, 'Personal Access Token', '[]', 0, '2020-01-23 09:33:29', '2020-01-23 09:33:29', '2021-01-23 10:33:29'),
('e95508ae421ea36de05bbde91fb89e14f8960cc1f763a4c8bfe6177e434ec95d96c5b1ebf0375e1e', 5, 1, 'Personal Access Token', '[]', 0, '2020-01-23 09:57:03', '2020-01-23 09:57:03', '2021-01-23 10:57:03'),
('f6132c3cd3a2a310ca0e0c0124e561245748f9a55503f9fcb5d749a1ffdfb4ef04ef0529100a69a1', 2, 1, 'Personal Access Token', '[]', 0, '2020-01-22 09:31:16', '2020-01-22 09:31:16', '2021-01-22 10:31:16'),
('f7774b4e804523a274b8842ba59078092709df6c1a4b8715ba641f1839c7f0f88fda3287df33136b', 5, 1, 'Personal Access Token', '[]', 0, '2020-01-23 10:54:47', '2020-01-23 10:54:47', '2021-01-23 11:54:47'),
('f8dcf0a1103621496a291f7536994ed716e7429f6eec997b801e983f0290436864ecb813171ce9d6', 5, 1, 'Personal Access Token', '[]', 0, '2020-01-23 11:54:00', '2020-01-23 11:54:00', '2021-01-23 12:54:00');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_clients`
--

INSERT INTO `oauth_clients` (`id`, `user_id`, `name`, `secret`, `redirect`, `personal_access_client`, `password_client`, `revoked`, `created_at`, `updated_at`) VALUES
(1, NULL, 'E-school', 'B0a13soZz280tRegQJ5q7t2k3eAdqySnUm0KpN7R', 'http://localhost', 1, 0, 0, '2020-01-22 07:40:43', '2020-01-22 07:40:43');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` int(10) UNSIGNED NOT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_personal_access_clients`
--

INSERT INTO `oauth_personal_access_clients` (`id`, `client_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2020-01-22 07:40:43', '2020-01-22 07:40:43');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_refresh_tokens`
--

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `parents`
--

CREATE TABLE `parents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `phone_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sex` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `occupation` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state_of_origin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `school_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `schools`
--

CREATE TABLE `schools` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `school_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `motto` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 0,
  `phone_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `schools`
--

INSERT INTO `schools` (`id`, `school_name`, `motto`, `email`, `address`, `email_verified_at`, `active`, `phone_number`, `created_at`, `updated_at`, `deleted_at`) VALUES
(5, 'alaye', 'gbefun', 'charles12@gmail.com', 'bolade', NULL, 0, '911', '2020-01-22 11:19:56', '2020-01-22 11:19:56', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `firstname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sex` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `father_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mother_id` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `school_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `class_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `card_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_of_birth` date NOT NULL,
  `nationality` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `State_of_origin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `local_govt` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `home_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Religion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `primary_contact_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `primary_contact_rel` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secondary_contact_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secondary_contact_rel` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `present_status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `firstname`, `lastname`, `sex`, `father_id`, `mother_id`, `school_id`, `class_name`, `card_number`, `date_of_birth`, `nationality`, `State_of_origin`, `local_govt`, `home_address`, `Religion`, `primary_contact_id`, `primary_contact_rel`, `secondary_contact_id`, `secondary_contact_rel`, `present_status`, `created_at`, `updated_at`) VALUES
(2, 'filller', 'adf', 'male', '3', 'null', '5', 'jss4', '4234', '1993-12-09', 'kenya', 'bolade', 'busi', 'kela', 'christain', '3', 'father', '3', 'father', 1, '2020-01-22 12:50:29', '2020-01-22 15:06:04');

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `assigned_class_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`id`, `created_at`, `updated_at`, `name`, `email`, `assigned_class_name`) VALUES
(4, '2020-01-22 12:47:19', '2020-01-22 12:47:19', 'ade', 'ade@gam.com', 'jss3');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `external_table_id` int(11) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 0,
  `activation_token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_category` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `external_table_id`, `email_verified_at`, `active`, `activation_token`, `user_category`, `password`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'ogu', 'orafucs2311@school.com', 0, NULL, 0, 'HCWT5ZKxpzRfpiYzRkoapI5Trh8t8dpgKhLG6PwTfiiX7MKMMN3uHuqWoYF4', '77889', '$2y$10$Kbuq7rZW0BwpPzMoFz1FY.J2gAhnpxmyEBhJCZKaQw7bgMBk6ri/K', NULL, '2020-01-22 07:29:03', '2020-01-22 07:29:03', NULL),
(5, 'alaye', 'charles12@gmail.com', 5, NULL, 0, 'X6LyqXReqvXbUf7JyQjt8FB2ivyHiJAxg0CQaDldE1gjWE5UX50tJNNH0n0v', '33445', '$2y$10$LAXiOO7QIU60Lqsg2ZOsl.PejF2KUKHB3bd2.4CNNIQfXPJ8WOAg6', NULL, '2020-01-22 11:19:56', '2020-01-22 11:19:56', NULL),
(7, 'ade', 'ade@gam.com', 4, NULL, 0, '1EIuzCbZk1ykupzQs4aPwGIgQQcljmK7p5k0HUwUsklvQXi35G7JBvn5IjpP', '11223', '$2y$10$b4HkAdFzC2kh5N.6JvBIaev7mLU/jWOMuSWwYS4PzhCfe2y8Byxc.', NULL, '2020-01-22 12:47:19', '2020-01-22 12:47:19', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cards`
--
ALTER TABLE `cards`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `oauth_access_tokens`
--
ALTER TABLE `oauth_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_access_tokens_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_auth_codes`
--
ALTER TABLE `oauth_auth_codes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_clients_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_personal_access_clients_client_id_index` (`client_id`);

--
-- Indexes for table `oauth_refresh_tokens`
--
ALTER TABLE `oauth_refresh_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`);

--
-- Indexes for table `parents`
--
ALTER TABLE `parents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `schools`
--
ALTER TABLE `schools`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `schools_email_unique` (`email`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
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
-- AUTO_INCREMENT for table `cards`
--
ALTER TABLE `cards`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `parents`
--
ALTER TABLE `parents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `schools`
--
ALTER TABLE `schools`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
