-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 08, 2019 at 12:00 PM
-- Server version: 10.2.21-MariaDB
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `coinfieldclu_cfc`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_users`
--

CREATE TABLE `admin_users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Admin',
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `login_ip` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `last_login_ip` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `login_time` datetime DEFAULT NULL,
  `last_login_time` datetime DEFAULT NULL,
  `type` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1=admin, 2=superadmin',
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin_users`
--

INSERT INTO `admin_users` (`id`, `name`, `email`, `password`, `login_ip`, `last_login_ip`, `login_time`, `last_login_time`, `type`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@coinfieldclub.com', '$2y$10$Oo0IvbXb6CttNC9TVJQgE.xUx1/eZn5N6mCAT.Z/yfJZhgXmZKFQ.', '149.167.191.154', '149.167.191.154', '2019-02-08 06:58:25', '2019-01-23 07:06:28', 1, 1, 'mQSUrBKEheRgwv5tunQThyIaQxSGnS3ErJJ1Imnpdd54e8mX85ZowM8lni6w', '2018-11-08 23:22:57', '2019-02-08 06:58:25'),
(2, 'Super Admin', 'superadmin@coinfieldclub.com', '$2y$10$/7A1sYIBQpkQKR9BP9/RbeYNhEveUVIWqfU/mlGPv5M4EYqqTv17C', '149.167.191.154', '27.147.161.214', '2019-01-23 07:20:22', '2019-01-23 05:42:20', 2, 1, 'qBdjiK42i2adSFjGt1QOy8hA6ENPSRrT6fFNenpd9Mld2b7oJMR4oaQrat1h', '2018-11-08 23:22:57', '2019-01-23 07:20:22');

-- --------------------------------------------------------

--
-- Table structure for table `borrow`
--

CREATE TABLE `borrow` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `serial` int(11) NOT NULL DEFAULT 120,
  `amount` double(15,8) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0 COMMENT '0=pending, 1=approved, 2=sent, 3=hold, 4=rejected',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `deposit_history`
--

CREATE TABLE `deposit_history` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `order_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` double(15,8) NOT NULL,
  `user_wallet_address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `wallet_address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `deposit_history`
--

INSERT INTO `deposit_history` (`id`, `user_id`, `order_no`, `amount`, `user_wallet_address`, `wallet_address`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'CPCK0YZA9JQTX5LK9IX0WNHFYI', 0.50000000, 'Shdggshwggahhdd', 'QaWUZsUoXovdKEqNZXLh6Uvaz8PrxEPqS3', 1, '2018-11-13 10:19:30', '2018-11-13 10:26:02'),
(2, 1, 'CPCK5BDWR1LJWLZA76CUOVANNG', 0.01000000, 'Shdggshwggahhdd', '3CSiVyn2nRAQk2DLvwCN4yxfBSoYWWoLF9', 0, '2018-11-13 11:44:09', '2018-11-13 11:44:09'),
(4, 1, 'CPCK0H2L56A8AH9JN3N5MIMFLL', 0.02000000, 'Shdggshwggahhdd', '3BxSRuMmLkye67JbrZ9sn5TrNEL16KEYwW', 1, '2018-11-14 05:49:48', '2018-11-14 06:12:03'),
(5, 1, 'CPCK1FZ964VGKPARXIYBCCO1KE', 0.02000000, 'Shdggshwggahhdd', '36NAuh4YM7UgxFN3W14YLNuN767GLmeo1d', 0, '2018-11-14 05:54:20', '2018-11-14 05:54:20'),
(6, 1, 'CPCK0PGV4WQ9IQHLIDCJREZDEU', 1.00000000, 'Shdggshwggahhdd', '3M4UC6onFyYK1sWRTGt3wtMMiQMLDQpXjX', 0, '2018-11-14 16:44:29', '2018-11-14 16:44:29'),
(7, 1, 'CPCK7SV0ZQFPWUNH7UM7XSDHCU', 1.00000000, 'Shdggshwggahhdd', '3Jz686ZKwfM8bZPkUVC4RJz2dEbhFPrqn5', 0, '2018-11-14 16:45:34', '2018-11-14 16:45:34'),
(8, 8, 'DEP029430293', 50.00000000, 'Encrypted Address', 'Encrypted Address', 1, '2018-11-19 00:00:00', '2018-11-19 00:00:00'),
(9, 9, 'DEP23-90s2423423', 50.00000000, 'Encrypted Address', 'Encrypted Address', 1, '2018-11-19 00:00:00', '2018-11-19 00:00:00'),
(10, 10, 'DEPsoi2309sd09sd', 10.00000000, 'Encrypted Address', 'Encrypted Address', 1, '2018-11-19 00:00:00', '2018-11-19 00:00:00'),
(11, 11, 'DEPsduishfi2323', 10.00000000, 'Encrypted Address', 'Encrypted Address', 1, '2018-11-19 00:00:00', '2018-11-19 00:00:00'),
(12, 1, 'CPDA0ORVTNHTBQL1MHE6KNL0RI', 1.00000000, 'Shdggshwggahhdd', '3PeyBNavisx7tqsTuJDszF9Vm8mwSXeYR7', 0, '2019-01-30 03:07:31', '2019-01-30 03:07:31'),
(13, 1, 'CPDA2D1AFG1SNMJDT5FRIRULRC', 0.05000000, 'Shdggshwggahhdd', '33R9AKf8p7PiCfreAngH5mWrhJskELKkWD', 0, '2019-01-30 06:28:01', '2019-01-30 06:28:01'),
(14, 1, 'CPDA4472BHEABCJRTU34WOH5TD', 0.20000000, 'Shdggshwggahhdd', '3BZ5552DXe7mZ5Mmp6W3uHtujfdRPmJnxS', 0, '2019-01-30 15:09:39', '2019-01-30 15:09:39'),
(15, 1, 'CPDB3WHA1CO0ACTQSMTVGBY1RC', 0.01000000, 'Shdggshwggahhdd', '3MWMLZ6pnAoqugXTJmTXDc3Qmd2JZrFtCL', 0, '2019-02-08 06:56:01', '2019-02-08 06:56:01'),
(16, 1, 'CPDB34U7PNT7N1FIQZIIV2GIW5', 1.00000000, 'Shdggshwggahhdd', '36xnS1Cauabw45ci4ateH9anwPujEMmBpd', 0, '2019-02-08 06:56:04', '2019-02-08 06:56:04'),
(17, 1, 'CPDB4YQTXWJ4JHN4DNFPULMB7T', 0.01000000, 'Shdggshwggahhdd', '3CeMJAemgqEnbMaVWKq15B8uyNRcSveHar', 0, '2019-02-08 07:12:44', '2019-02-08 07:12:44');

-- --------------------------------------------------------

--
-- Table structure for table `investment_plans`
--

CREATE TABLE `investment_plans` (
  `id` int(10) UNSIGNED NOT NULL,
  `duration_start` int(11) NOT NULL,
  `duration_end` int(11) NOT NULL,
  `daily_profit` double(15,8) NOT NULL,
  `max_profit` double(15,8) NOT NULL,
  `maturity_day` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `investment_plans`
--

INSERT INTO `investment_plans` (`id`, `duration_start`, `duration_end`, `daily_profit`, `max_profit`, `maturity_day`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 30, 0.20000000, 6.00000000, 30, 1, '2018-11-08 23:23:09', '2018-11-08 23:23:09'),
(2, 31, 60, 0.30000000, 9.00000000, 0, 1, '2018-11-08 23:23:09', '2018-11-08 23:23:09'),
(3, 61, 90, 0.40000000, 12.00000000, 0, 1, '2018-11-08 23:23:09', '2018-11-08 23:23:09'),
(4, 91, 120, 0.50000000, 15.00000000, 0, 1, '2018-11-08 23:23:09', '2018-11-08 23:23:09'),
(5, 121, 10000000, 0.50000000, 15.00000000, 0, 1, '2018-11-08 23:23:09', '2018-11-08 23:23:09');

-- --------------------------------------------------------

--
-- Table structure for table `lend`
--

CREATE TABLE `lend` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `amount` double(15,8) NOT NULL,
  `day` int(11) NOT NULL,
  `serial` int(11) NOT NULL DEFAULT 120,
  `interest` double(15,8) NOT NULL,
  `released` double(15,8) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0 COMMENT '0=pending, 1=active, 2=hold, 3=done, 4=rejected',
  `last_interest_at` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `lend_interest_history`
--

CREATE TABLE `lend_interest_history` (
  `id` int(10) UNSIGNED NOT NULL,
  `lend_id` int(10) UNSIGNED NOT NULL,
  `day` int(11) NOT NULL,
  `interest_rate` double(15,8) NOT NULL,
  `interest` double(15,8) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `le_referral_bonus`
--

CREATE TABLE `le_referral_bonus` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `lend_id` int(10) UNSIGNED NOT NULL,
  `rate` double(15,8) NOT NULL,
  `amount` double(15,8) NOT NULL,
  `day` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `match`
--

CREATE TABLE `match` (
  `id` int(10) UNSIGNED NOT NULL,
  `lend_id` int(10) UNSIGNED NOT NULL,
  `borrow_id` int(10) UNSIGNED NOT NULL,
  `lend_amount` double(15,8) NOT NULL,
  `borrow_amount` double(15,8) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(10) UNSIGNED NOT NULL,
  `type_id` int(10) UNSIGNED NOT NULL,
  `from_id` int(11) NOT NULL,
  `to_id` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT 0,
  `message` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_read` tinyint(1) NOT NULL DEFAULT 0,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `message_type`
--

CREATE TABLE `message_type` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2017_03_28_103342_create_packages_table', 1),
(4, '2017_03_28_103908_create_investment_plans_table', 1),
(5, '2017_03_28_122004_create_referrals_table', 1),
(6, '2017_03_28_122145_create_uni_level_bonus_plans_table', 1),
(7, '2017_03_28_122328_create_ticket_referral_plans_table', 1),
(8, '2017_03_28_122440_create_serve_and_payback_plans_table', 1),
(9, '2017_03_28_122706_create_ticket_purchase_table', 1),
(10, '2017_03_28_122910_create_ticket_purchase_plans_table', 1),
(11, '2017_03_28_123018_create_lend_table', 1),
(12, '2017_03_28_123158_create_lend_interest_history_table', 1),
(13, '2017_03_30_091120_create_borrow_table', 1),
(14, '2017_03_30_091213_create_wallet_history_table', 1),
(15, '2017_03_30_091430_create_subscriptions_table', 1),
(16, '2017_03_30_091621_create_ticket_history_table', 1),
(17, '2017_03_30_092529_create_match_table', 1),
(18, '2017_03_30_092736_create_deposit_history_table', 1),
(19, '2017_03_30_092858_create_pairing_bonus_table', 1),
(20, '2017_03_30_093150_create_serve_and_payback_history_table', 1),
(21, '2017_04_02_065940_create_admin_users_table', 1),
(22, '2017_04_10_112423_create_ticket_referral_history_table', 1),
(23, '2017_04_11_072449_create_le_referral_bonus_table', 1),
(24, '2017_04_25_053242_create_message_type_table', 1),
(25, '2017_04_25_053301_create_message_table', 1),
(26, '2017_05_06_074851_create_news_table', 1),
(27, '2018_10_25_143241_create_statistics_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE `packages` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double(15,8) NOT NULL,
  `serial` int(11) NOT NULL DEFAULT 0,
  `pairing_bonus` double(15,8) NOT NULL,
  `pairing_bonus_plus` double(15,8) NOT NULL,
  `ticket_referral_level` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `packages`
--

INSERT INTO `packages` (`id`, `name`, `price`, `serial`, `pairing_bonus`, `pairing_bonus_plus`, `ticket_referral_level`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Silver', 0.10000000, 1, 0.10000000, 0.50000000, 1, 1, '2018-11-08 23:23:09', '2018-11-08 23:23:09'),
(2, 'SilverPlus', 0.30000000, 2, 0.30000000, 1.00000000, 2, 1, '2018-11-08 23:23:09', '2018-11-08 23:23:09'),
(3, 'Gold', 0.60000000, 3, 0.50000000, 2.00000000, 3, 1, '2018-11-08 23:23:09', '2018-11-08 23:23:09'),
(4, 'GoldPlus', 1.20000000, 4, 1.00000000, 3.00000000, 4, 1, '2018-11-08 23:23:09', '2018-11-08 23:23:09'),
(5, 'WhiteGold', 2.00000000, 5, 3.00000000, 5.00000000, 5, 1, '2018-11-08 23:23:09', '2018-11-08 23:23:09'),
(6, 'Platinum', 4.00000000, 6, 5.00000000, 7.00000000, 6, 1, '2018-11-08 23:23:09', '2018-11-08 23:23:09'),
(7, 'Diamond', 6.00000000, 7, 7.00000000, 10.00000000, 7, 1, '2018-11-08 23:23:09', '2018-11-08 23:23:09'),
(8, 'DiamondPlus', 9.00000000, 8, 10.00000000, 15.00000000, 0, 1, '2018-11-08 23:23:09', '2018-11-08 23:23:09');

-- --------------------------------------------------------

--
-- Table structure for table `pairing_bonus`
--

CREATE TABLE `pairing_bonus` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `left` double(15,8) NOT NULL,
  `center` double(15,8) NOT NULL,
  `right` double(15,8) NOT NULL,
  `pair_to` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` double(15,8) NOT NULL,
  `rate` double(15,8) NOT NULL,
  `type` int(11) NOT NULL COMMENT '1=pairing bonus 2=pairing bonus plus',
  `status` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0=pending ,1=approved, 2=rejected',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `referrals`
--

CREATE TABLE `referrals` (
  `id` int(10) UNSIGNED NOT NULL,
  `position` bigint(20) NOT NULL,
  `referral_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `referrals`
--

INSERT INTO `referrals` (`id`, `position`, `referral_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, '111111', 1, '2018-11-09 00:00:00', '2018-11-09 00:00:00'),
(2, 2, '222222', 1, '2018-11-09 00:00:00', '2018-11-09 00:00:00'),
(3, 3, '333333', 1, '2018-11-09 00:00:00', '2018-11-09 00:00:00'),
(4, 4, '444444', 1, '2018-11-09 00:00:00', '2018-11-09 00:00:00'),
(5, 8, '1541743037335', 1, '2018-11-09 05:57:17', '2018-11-09 05:57:17'),
(6, 9, '1541743037597', 1, '2018-11-09 05:57:17', '2018-11-09 05:57:17'),
(7, 10, '154174303721', 1, '2018-11-09 05:57:17', '2018-11-09 05:57:17'),
(8, 23, '154174603977', 1, '2018-11-09 06:47:19', '2018-11-09 06:47:19'),
(9, 24, '1541746039310', 1, '2018-11-09 06:47:19', '2018-11-09 06:47:19'),
(10, 25, '1541746039285', 1, '2018-11-09 06:47:19', '2018-11-09 06:47:19'),
(11, 11, '1541746896665', 1, '2018-11-09 07:01:36', '2018-11-09 07:01:36'),
(12, 12, '1541746896603', 1, '2018-11-09 07:01:36', '2018-11-09 07:01:36'),
(13, 13, '1541746896698', 1, '2018-11-09 07:01:36', '2018-11-09 07:01:36'),
(14, 35, '1541747516546', 1, '2018-11-09 07:11:56', '2018-11-09 07:11:56'),
(15, 36, '1541747516131', 1, '2018-11-09 07:11:56', '2018-11-09 07:11:56'),
(16, 37, '1541747516595', 1, '2018-11-09 07:11:56', '2018-11-09 07:11:56'),
(17, 5, '1542611969592', 1, '2018-11-19 07:19:29', '2018-11-19 07:19:29'),
(18, 6, '1542611969634', 1, '2018-11-19 07:19:29', '2018-11-19 07:19:29'),
(19, 7, '1542611969227', 1, '2018-11-19 07:19:29', '2018-11-19 07:19:29'),
(20, 14, '1542612324405', 1, '2018-11-19 07:25:24', '2018-11-19 07:25:24'),
(21, 15, '1542612324935', 1, '2018-11-19 07:25:24', '2018-11-19 07:25:24'),
(22, 16, '1542612324470', 1, '2018-11-19 07:25:24', '2018-11-19 07:25:24');

-- --------------------------------------------------------

--
-- Table structure for table `serve_and_payback_history`
--

CREATE TABLE `serve_and_payback_history` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `subscription_id` int(10) UNSIGNED NOT NULL,
  `rate` double(15,8) NOT NULL,
  `amount` double(15,8) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `serve_and_payback_plans`
--

CREATE TABLE `serve_and_payback_plans` (
  `id` int(10) UNSIGNED NOT NULL,
  `level_up_1` double NOT NULL,
  `level_up_2` double NOT NULL,
  `level_up_3` double NOT NULL,
  `next_level_distance` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `serve_and_payback_plans`
--

INSERT INTO `serve_and_payback_plans` (`id`, `level_up_1`, `level_up_2`, `level_up_3`, `next_level_distance`, `status`, `created_at`, `updated_at`) VALUES
(1, 25, 10, 5, 2, 1, '2018-11-08 23:23:10', '2018-11-08 23:23:10');

-- --------------------------------------------------------

--
-- Table structure for table `statistics`
--

CREATE TABLE `statistics` (
  `id` int(10) UNSIGNED NOT NULL,
  `total_account` int(11) NOT NULL,
  `total_deposit` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_withdrawal` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `statistics`
--

INSERT INTO `statistics` (`id`, `total_account`, `total_deposit`, `total_withdrawal`, `status`, `created_at`, `updated_at`) VALUES
(1, 0, '5000', '4924', 1, '2018-11-09 06:35:28', '2018-11-09 08:13:29');

-- --------------------------------------------------------

--
-- Table structure for table `subscriptions`
--

CREATE TABLE `subscriptions` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `package_id` int(10) UNSIGNED NOT NULL,
  `amount` double(15,8) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ticket_history`
--

CREATE TABLE `ticket_history` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `no_of_ticket` int(11) NOT NULL,
  `purpose` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ticket_purchase`
--

CREATE TABLE `ticket_purchase` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `no_of_tickets` int(11) NOT NULL,
  `sub_total` double(15,8) NOT NULL,
  `discount` double(15,8) NOT NULL,
  `total_discount` double(15,8) NOT NULL,
  `total` double(15,8) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ticket_purchase_plans`
--

CREATE TABLE `ticket_purchase_plans` (
  `id` int(10) UNSIGNED NOT NULL,
  `start` int(11) NOT NULL,
  `end` int(11) NOT NULL,
  `discount` double(15,8) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ticket_purchase_plans`
--

INSERT INTO `ticket_purchase_plans` (`id`, `start`, `end`, `discount`, `status`, `created_at`, `updated_at`) VALUES
(1, 11, 25, 5.00000000, 1, '2018-11-08 23:23:10', '2018-11-08 23:23:10'),
(2, 26, 50, 10.00000000, 1, '2018-11-08 23:23:10', '2018-11-08 23:23:10'),
(3, 51, 100, 15.00000000, 1, '2018-11-08 23:23:10', '2018-11-08 23:23:10'),
(4, 101, 100000000, 20.00000000, 1, '2018-11-08 23:23:10', '2018-11-08 23:23:10');

-- --------------------------------------------------------

--
-- Table structure for table `ticket_referral_history`
--

CREATE TABLE `ticket_referral_history` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `from_id` int(10) UNSIGNED NOT NULL,
  `rate` double(15,8) NOT NULL,
  `amount` double(15,8) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ticket_referral_plans`
--

CREATE TABLE `ticket_referral_plans` (
  `id` int(10) UNSIGNED NOT NULL,
  `level` int(11) NOT NULL,
  `amount` double(15,8) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ticket_referral_plans`
--

INSERT INTO `ticket_referral_plans` (`id`, `level`, `amount`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 10.00000000, 1, '2018-11-08 23:23:10', '2018-11-08 23:23:10'),
(2, 2, 5.00000000, 1, '2018-11-08 23:23:10', '2018-11-08 23:23:10'),
(3, 3, 3.00000000, 1, '2018-11-08 23:23:10', '2018-11-08 23:23:10'),
(4, 4, 1.00000000, 1, '2018-11-08 23:23:10', '2018-11-08 23:23:10'),
(5, 5, 0.50000000, 1, '2018-11-08 23:23:10', '2018-11-08 23:23:10'),
(6, 6, 0.10000000, 1, '2018-11-08 23:23:10', '2018-11-08 23:23:10'),
(7, 7, 0.05000000, 1, '2018-11-08 23:23:10', '2018-11-08 23:23:10'),
(8, 0, 0.01000000, 1, '2018-11-08 23:23:10', '2018-11-08 23:23:10');

-- --------------------------------------------------------

--
-- Table structure for table `uni_level_bonus_plans`
--

CREATE TABLE `uni_level_bonus_plans` (
  `id` int(10) UNSIGNED NOT NULL,
  `level` int(11) NOT NULL,
  `amount` double(15,8) NOT NULL,
  `per_days` int(11) NOT NULL,
  `total_days` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `uni_level_bonus_plans`
--

INSERT INTO `uni_level_bonus_plans` (`id`, `level`, `amount`, `per_days`, `total_days`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 1.00000000, 5, 50, 1, '2018-11-08 23:23:10', '2018-11-08 23:23:10'),
(2, 2, 1.00000000, 10, 50, 1, '2018-11-08 23:23:10', '2018-11-08 23:23:10');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'first name',
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'last name',
  `gender` int(11) NOT NULL DEFAULT 1,
  `contact` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'n/a',
  `city` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'n/a',
  `state` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'n/a',
  `zip` int(11) NOT NULL DEFAULT 0,
  `country` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `pic` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'http://coinfieldclub.com/user_assets/images/default-user.png',
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `origin_p` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `referral_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sponsor_id` bigint(20) NOT NULL DEFAULT 0,
  `ticket` int(11) NOT NULL DEFAULT 0,
  `package_id` int(11) NOT NULL DEFAULT 0,
  `pairing_bonus` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'left',
  `pairing_bonus_plus` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'left',
  `position` bigint(20) NOT NULL,
  `wallet_amount` double(15,8) NOT NULL DEFAULT 0.00000000,
  `wallet_address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `wallet_secret` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `is_email_varified` tinyint(1) NOT NULL DEFAULT 0,
  `email_validation_key` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `forgot_token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `user_agent` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ip` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `gender`, `contact`, `address`, `city`, `state`, `zip`, `country`, `pic`, `email`, `password`, `origin_p`, `referral_id`, `sponsor_id`, `ticket`, `package_id`, `pairing_bonus`, `pairing_bonus_plus`, `position`, `wallet_amount`, `wallet_address`, `wallet_secret`, `is_email_varified`, `email_validation_key`, `forgot_token`, `user_agent`, `ip`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'test', 'test', 1, '0', 'n/a', 'n/a', 'n/a', 0, 'AF', 'http://coinfieldclub.com/user_assets/images/default-user.png', 'master@coinfieldclub.com', '$2y$10$8hLo8p24E2OA1117Do8/DOQrxZRG9ULzSt5yWyk0GVXr.b6rfcnAG', '', '111111', 0, 0, 0, 'left', 'left', 1, 0.72000000, 'Shdggshwggahhdd', '0', 1, '', '0', '', '', 1, 'puuru4Xzp6bqCw4LWykbFML1qNoZmIqMTVobzUcIHf7GHQbV2WkMwVRE52de', '2018-11-09 00:00:00', '2019-01-23 07:41:18'),
(8, 'masa', '7131', 1, '0', 'n/a', 'n/a', 'n/a', 0, '0', 'http://coinfieldclub.com/user_assets/images/default-user.png', 'm09090634838@gmail.com', '$2y$10$AWGMYy3nVKvA64gFzwl9Z.DazUlO9bwkHWouml1QKH0wF3m5rp1rW', 'HDewi23432hd@', '222222', 1, 0, 0, 'left', 'left', 2, 50.00000000, '18wHsivnQHX9QECx3C2TsKxFp6hgmpvear', '0', 1, '154261196918', '0', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.77 Safari/537.36', '104.238.36.12', 1, '21YAelOCO0AtjrQPB1dJ6rjsMkmlOQ2sYcyfrCue3thgvrCDrJGSYA4zw4dt', '2018-11-19 07:19:29', '2018-11-19 09:36:04'),
(9, 'rian', '22', 1, '0', 'n/a', 'n/a', 'n/a', 0, '0', 'http://coinfieldclub.com/user_assets/images/default-user.png', 'rian16868666@gmail.com', '$2y$10$4ZlBHRztiQCUDQIHU3tvMur173cfEGuUJgNB1.M4NvgY.P61XZNU2', 'HDewi23432hd@', '333333', 1, 0, 0, 'left', 'left', 3, 50.00000000, '18wHsivnQHX9QECx3C2TsKxFp6hgmpvear', '0', 1, '1542612135900', '0', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.77 Safari/537.36', '104.238.36.12', 1, 'd1D1hSw7lal2ia3G5wxh3lne9JTiCXOnEB6Q4Ymf24XYVuUCwCIdWDXo07fE', '2018-11-19 07:22:15', '2018-11-19 11:00:00'),
(10, 'karo', '2195', 1, '0', 'n/a', 'n/a', 'n/a', 0, '0', 'http://coinfieldclub.com/user_assets/images/default-user.png', 'gmd20160524@gmail.com', '$2y$10$Dfl0VWyFD5vHd73mXyjDr.zspAiHp1pQ/aJiM6fBzEOwDWRmx1Ap2', 'HDewi23432hd@', '444444', 1, 0, 0, 'left', 'left', 4, 10.00000000, '18wHsivnQHX9QECx3C2TsKxFp6hgmpvear', '0', 1, '1542612205979', '0', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.77 Safari/537.36', '104.238.36.12', 1, NULL, '2018-11-19 07:23:25', '2018-11-19 09:36:31'),
(11, 'tou', 'roku', 1, '0', 'n/a', 'n/a', 'n/a', 0, '0', 'https://coinfieldclub.com/user_assets/uploads/profile/154469783911.jpeg', 'yosukesaitoh@gmail.com', '$2y$10$69zVuctX4E5ac8bpi4Z/euVFO/rks1HjuMxmZTPaPTEWJ0dFWjCXe', 'HDewi23432hd@', '1542611969592', 1, 0, 0, 'left', 'left', 5, 10.00000000, '18wHsivnQHX9QECx3C2TsKxFp6hgmpvear', '0', 1, '1542612324300', '0', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.77 Safari/537.36', '104.238.36.12', 1, NULL, '2018-11-19 07:25:24', '2018-12-13 10:43:59');

-- --------------------------------------------------------

--
-- Table structure for table `wallet_history`
--

CREATE TABLE `wallet_history` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `wallet_address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wallet_history`
--

INSERT INTO `wallet_history` (`id`, `user_id`, `wallet_address`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'Shdggshwggahhdd', 1, '2018-11-09 05:53:28', '2018-11-09 05:53:28'),
(4, 8, '18wHsivnQHX9QECx3C2TsKxFp6hgmpvear', 1, '2018-11-19 09:36:04', '2018-11-19 09:36:04'),
(5, 9, '18wHsivnQHX9QECx3C2TsKxFp6hgmpvear', 1, '2018-11-19 09:36:16', '2018-11-19 09:36:16'),
(6, 10, '18wHsivnQHX9QECx3C2TsKxFp6hgmpvear', 1, '2018-11-19 09:36:31', '2018-11-19 09:36:31'),
(7, 11, '18wHsivnQHX9QECx3C2TsKxFp6hgmpvear', 1, '2018-11-19 09:36:47', '2018-11-19 09:36:47');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_users`
--
ALTER TABLE `admin_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admin_users_email_unique` (`email`);

--
-- Indexes for table `borrow`
--
ALTER TABLE `borrow`
  ADD PRIMARY KEY (`id`),
  ADD KEY `borrow_user_id_foreign` (`user_id`);

--
-- Indexes for table `deposit_history`
--
ALTER TABLE `deposit_history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `deposit_history_user_id_foreign` (`user_id`);

--
-- Indexes for table `investment_plans`
--
ALTER TABLE `investment_plans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lend`
--
ALTER TABLE `lend`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lend_user_id_foreign` (`user_id`),
  ADD KEY `lend_id_user_id_created_at_status_index` (`id`,`user_id`,`created_at`,`status`);

--
-- Indexes for table `lend_interest_history`
--
ALTER TABLE `lend_interest_history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lend_interest_history_lend_id_foreign` (`lend_id`),
  ADD KEY `lend_interest_history_id_lend_id_created_at_status_index` (`id`,`lend_id`,`created_at`,`status`);

--
-- Indexes for table `le_referral_bonus`
--
ALTER TABLE `le_referral_bonus`
  ADD PRIMARY KEY (`id`),
  ADD KEY `le_referral_bonus_user_id_foreign` (`user_id`),
  ADD KEY `le_referral_bonus_lend_id_foreign` (`lend_id`);

--
-- Indexes for table `match`
--
ALTER TABLE `match`
  ADD PRIMARY KEY (`id`),
  ADD KEY `match_lend_id_foreign` (`lend_id`),
  ADD KEY `match_borrow_id_foreign` (`borrow_id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `messages_type_id_foreign` (`type_id`);

--
-- Indexes for table `message_type`
--
ALTER TABLE `message_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `packages`
--
ALTER TABLE `packages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pairing_bonus`
--
ALTER TABLE `pairing_bonus`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pairing_bonus_user_id_foreign` (`user_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `referrals`
--
ALTER TABLE `referrals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `serve_and_payback_history`
--
ALTER TABLE `serve_and_payback_history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `serve_and_payback_history_user_id_foreign` (`user_id`),
  ADD KEY `serve_and_payback_history_subscription_id_foreign` (`subscription_id`);

--
-- Indexes for table `serve_and_payback_plans`
--
ALTER TABLE `serve_and_payback_plans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `statistics`
--
ALTER TABLE `statistics`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscriptions`
--
ALTER TABLE `subscriptions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subscriptions_user_id_foreign` (`user_id`),
  ADD KEY `subscriptions_package_id_foreign` (`package_id`);

--
-- Indexes for table `ticket_history`
--
ALTER TABLE `ticket_history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ticket_history_user_id_foreign` (`user_id`);

--
-- Indexes for table `ticket_purchase`
--
ALTER TABLE `ticket_purchase`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ticket_purchase_user_id_foreign` (`user_id`);

--
-- Indexes for table `ticket_purchase_plans`
--
ALTER TABLE `ticket_purchase_plans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ticket_referral_history`
--
ALTER TABLE `ticket_referral_history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ticket_referral_history_user_id_foreign` (`user_id`),
  ADD KEY `ticket_referral_history_from_id_foreign` (`from_id`);

--
-- Indexes for table `ticket_referral_plans`
--
ALTER TABLE `ticket_referral_plans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `uni_level_bonus_plans`
--
ALTER TABLE `uni_level_bonus_plans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_referral_id_unique` (`referral_id`);

--
-- Indexes for table `wallet_history`
--
ALTER TABLE `wallet_history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `wallet_history_user_id_foreign` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_users`
--
ALTER TABLE `admin_users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `borrow`
--
ALTER TABLE `borrow`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `deposit_history`
--
ALTER TABLE `deposit_history`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `investment_plans`
--
ALTER TABLE `investment_plans`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `lend`
--
ALTER TABLE `lend`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lend_interest_history`
--
ALTER TABLE `lend_interest_history`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `le_referral_bonus`
--
ALTER TABLE `le_referral_bonus`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `match`
--
ALTER TABLE `match`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `message_type`
--
ALTER TABLE `message_type`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `pairing_bonus`
--
ALTER TABLE `pairing_bonus`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `referrals`
--
ALTER TABLE `referrals`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `serve_and_payback_history`
--
ALTER TABLE `serve_and_payback_history`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `serve_and_payback_plans`
--
ALTER TABLE `serve_and_payback_plans`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `statistics`
--
ALTER TABLE `statistics`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `subscriptions`
--
ALTER TABLE `subscriptions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ticket_history`
--
ALTER TABLE `ticket_history`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ticket_purchase`
--
ALTER TABLE `ticket_purchase`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ticket_purchase_plans`
--
ALTER TABLE `ticket_purchase_plans`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `ticket_referral_history`
--
ALTER TABLE `ticket_referral_history`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ticket_referral_plans`
--
ALTER TABLE `ticket_referral_plans`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `uni_level_bonus_plans`
--
ALTER TABLE `uni_level_bonus_plans`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `wallet_history`
--
ALTER TABLE `wallet_history`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `borrow`
--
ALTER TABLE `borrow`
  ADD CONSTRAINT `borrow_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `deposit_history`
--
ALTER TABLE `deposit_history`
  ADD CONSTRAINT `deposit_history_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `lend`
--
ALTER TABLE `lend`
  ADD CONSTRAINT `lend_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `lend_interest_history`
--
ALTER TABLE `lend_interest_history`
  ADD CONSTRAINT `lend_interest_history_lend_id_foreign` FOREIGN KEY (`lend_id`) REFERENCES `lend` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `le_referral_bonus`
--
ALTER TABLE `le_referral_bonus`
  ADD CONSTRAINT `le_referral_bonus_lend_id_foreign` FOREIGN KEY (`lend_id`) REFERENCES `lend` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `le_referral_bonus_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `match`
--
ALTER TABLE `match`
  ADD CONSTRAINT `match_borrow_id_foreign` FOREIGN KEY (`borrow_id`) REFERENCES `borrow` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `match_lend_id_foreign` FOREIGN KEY (`lend_id`) REFERENCES `lend` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `messages_type_id_foreign` FOREIGN KEY (`type_id`) REFERENCES `message_type` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `pairing_bonus`
--
ALTER TABLE `pairing_bonus`
  ADD CONSTRAINT `pairing_bonus_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `serve_and_payback_history`
--
ALTER TABLE `serve_and_payback_history`
  ADD CONSTRAINT `serve_and_payback_history_subscription_id_foreign` FOREIGN KEY (`subscription_id`) REFERENCES `subscriptions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `serve_and_payback_history_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `subscriptions`
--
ALTER TABLE `subscriptions`
  ADD CONSTRAINT `subscriptions_package_id_foreign` FOREIGN KEY (`package_id`) REFERENCES `packages` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `subscriptions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `ticket_history`
--
ALTER TABLE `ticket_history`
  ADD CONSTRAINT `ticket_history_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `ticket_purchase`
--
ALTER TABLE `ticket_purchase`
  ADD CONSTRAINT `ticket_purchase_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `ticket_referral_history`
--
ALTER TABLE `ticket_referral_history`
  ADD CONSTRAINT `ticket_referral_history_from_id_foreign` FOREIGN KEY (`from_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `ticket_referral_history_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `wallet_history`
--
ALTER TABLE `wallet_history`
  ADD CONSTRAINT `wallet_history_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
