-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 28, 2023 at 11:56 AM
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
-- Database: `adb004`
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
-- Table structure for table `key_farm_item`
--

CREATE TABLE `key_farm_item` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `item_id` int(11) NOT NULL,
  `item_name` varchar(20) DEFAULT NULL,
  `delete_row` int(11) DEFAULT 0,
  `created_by` varchar(10) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `update_by` varchar(10) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `key_farm_item`
--

INSERT INTO `key_farm_item` (`id`, `item_id`, `item_name`, `delete_row`, `created_by`, `created_at`, `update_by`, `updated_at`) VALUES
(1, 60010, 'Chicks', 0, 'admin', '2023-11-08 05:43:12', NULL, NULL),
(2, 60011, 'Housing', 0, 'admin', '2023-11-08 05:43:12', NULL, NULL),
(3, 60012, 'Feed', 0, 'admin', '2023-11-08 05:43:12', NULL, NULL),
(4, 60013, 'Vaccination', 0, 'admin', '2023-11-08 05:43:12', NULL, NULL),
(5, 60014, 'Medicine', 0, 'admin', '2023-11-08 05:43:12', NULL, NULL),
(6, 60015, 'Labor', 0, 'admin', '2023-11-08 05:43:12', NULL, NULL),
(7, 60016, 'Veterinary Cost', 0, 'admin', '2023-11-08 05:43:12', NULL, NULL),
(8, 60017, 'Others', 0, 'admin', '2023-11-08 05:43:12', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `key_livestock`
--

CREATE TABLE `key_livestock` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `livestock_id` int(11) NOT NULL,
  `livestock_name` varchar(20) NOT NULL,
  `delete_row` int(11) DEFAULT 0,
  `created_by` varchar(10) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `update_by` varchar(10) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `key_livestock`
--

INSERT INTO `key_livestock` (`id`, `livestock_id`, `livestock_name`, `delete_row`, `created_by`, `created_at`, `update_by`, `updated_at`) VALUES
(1, 50010, 'Cattle', 0, 'admin', '2023-11-08 04:22:35', NULL, NULL),
(2, 50011, 'Goat', 0, 'admin', '2023-11-08 04:23:15', NULL, NULL),
(3, 50012, 'Pig', 0, 'admin', '2023-11-08 04:23:38', NULL, NULL),
(4, 50013, 'Hen', 0, 'admin', '2023-11-08 04:24:20', NULL, NULL),
(5, 50014, 'Duck', 0, 'admin', '2023-11-08 04:24:37', NULL, NULL),
(6, 50015, 'Pigeon', 0, 'admin', '2023-11-08 04:25:03', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `key_watershed`
--

CREATE TABLE `key_watershed` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `watershed_id` varchar(10) NOT NULL,
  `watershed_name` varchar(50) DEFAULT NULL,
  `district` varchar(20) DEFAULT NULL,
  `area` varchar(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `key_watershed`
--

INSERT INTO `key_watershed` (`id`, `watershed_id`, `watershed_name`, `district`, `area`, `created_at`, `updated_at`) VALUES
(1, 'R114', 'Ghilachari', 'Rangamati', '1897 Ha', '2023-10-22 06:42:09', '2023-10-22 06:42:09'),
(2, 'R99', 'Bhushan Chhara', 'Rangamati', '560 Ha', '2023-10-22 06:43:11', '2023-10-22 06:43:11'),
(3, 'R65', 'Bangaltali and Rupakari', 'Rangamati ', '2498 Ha', '2023-10-22 06:43:26', '2023-10-22 06:43:26');

-- --------------------------------------------------------

--
-- Table structure for table `key_water_source`
--

CREATE TABLE `key_water_source` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `water_source_id` int(11) NOT NULL,
  `water_source_name` varchar(50) NOT NULL,
  `delete_row` int(11) DEFAULT 0,
  `created_by` varchar(10) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `update_by` varchar(10) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `key_water_source`
--

INSERT INTO `key_water_source` (`id`, `water_source_id`, `water_source_name`, `delete_row`, `created_by`, `created_at`, `update_by`, `updated_at`) VALUES
(1, 40010, 'Tube well', 0, 'admin', '2023-11-08 02:32:13', NULL, NULL),
(2, 40011, 'Ring well', 0, 'admin', '2023-11-08 02:33:50', NULL, NULL),
(3, 40012, 'Dug well', 0, 'admin', '2023-11-08 02:34:51', NULL, NULL),
(4, 40013, 'Gravity Feed System', 0, 'admin', '2023-11-08 02:35:12', NULL, NULL),
(5, 40014, 'Springs', 0, 'admin', '2023-11-08 02:35:33', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `lookup_community`
--

CREATE TABLE `lookup_community` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `community_id` varchar(10) NOT NULL,
  `community_name` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lookup_community`
--

INSERT INTO `lookup_community` (`id`, `community_id`, `community_name`, `created_at`, `updated_at`) VALUES
(1, '10010001', 'Chakma', '2023-10-19 14:06:33', '2023-10-19 14:06:33'),
(2, '10010002', 'Marma', '2023-10-19 14:07:27', '2023-10-19 14:07:27'),
(3, '10010003', 'Tripura', '2023-10-19 14:11:25', '2023-10-19 14:11:25'),
(4, '10010004', 'Mro', '2023-10-19 14:12:36', '2023-10-19 14:12:36'),
(5, '10010005', 'Tanchangya', '2023-10-19 14:13:02', '2023-10-19 14:13:02'),
(6, '10010006', 'Bawm', '2023-10-19 14:13:17', '2023-10-19 14:13:17'),
(7, '10010007', 'Chak', '2023-10-19 14:13:31', '2023-10-19 14:13:31'),
(8, '10010008', 'Khumi', '2023-10-25 03:58:52', '2023-10-25 03:58:52'),
(9, '10010009', 'Lushai', '2023-10-25 03:59:23', '2023-10-25 03:59:23'),
(10, '10010010', 'Pankhua', '2023-10-25 03:59:47', '2023-10-25 03:59:47'),
(11, '10010011', 'Non-IPs', '2023-10-25 04:00:07', '2023-10-25 04:00:07');

-- --------------------------------------------------------

--
-- Table structure for table `lookup_health_center`
--

CREATE TABLE `lookup_health_center` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `center_id` int(11) NOT NULL,
  `center_name` varchar(50) DEFAULT NULL,
  `delete_row` int(11) DEFAULT 0,
  `created_by` varchar(10) DEFAULT NULL,
  `updated_by` varchar(10) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lookup_health_center`
--

INSERT INTO `lookup_health_center` (`id`, `center_id`, `center_name`, `delete_row`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 10040001, 'Health Centres', 0, 'admin', NULL, '2023-11-01 03:04:39', '2023-11-01 03:04:39'),
(2, 10040002, 'Community Clinic (govt.)', 0, 'admin', NULL, '2023-11-01 03:05:38', '2023-11-01 03:05:38'),
(3, 10040003, 'Upazila Hospital', 0, 'admin', NULL, '2023-11-01 03:06:05', '2023-11-01 03:06:05'),
(4, 10040004, 'District Hospital', 0, 'admin', NULL, '2023-11-01 03:06:36', '2023-11-01 03:06:36'),
(5, 10040005, 'Private Hospital ', 0, 'admin', NULL, '2023-11-01 03:07:07', '2023-11-01 03:07:07'),
(6, 10040006, 'NGO-Facilitated Center ', 0, 'admin', NULL, '2023-11-01 03:07:38', '2023-11-01 03:07:38');

-- --------------------------------------------------------

--
-- Table structure for table `lookup_latrine_list`
--

CREATE TABLE `lookup_latrine_list` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `latrine_type_id` int(11) NOT NULL,
  `latrine_type_name` varchar(30) DEFAULT NULL,
  `delete_row` int(11) DEFAULT 0,
  `created_by` varchar(10) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `update_by` varchar(10) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lookup_latrine_list`
--

INSERT INTO `lookup_latrine_list` (`id`, `latrine_type_id`, `latrine_type_name`, `delete_row`, `created_by`, `created_at`, `update_by`, `updated_at`) VALUES
(1, 20001, 'Water Sealed', 0, 'admin', '2023-11-05 03:05:13', NULL, NULL),
(2, 20002, 'Ring Slab', 0, 'admin', '2023-11-05 03:05:34', NULL, NULL),
(3, 20003, 'Earthen Pit Toilet ', 0, 'admin', '2023-11-05 03:06:01', NULL, NULL),
(4, 20004, 'Open Defecation', 0, 'admin', '2023-11-05 03:06:24', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `lookup_para`
--

CREATE TABLE `lookup_para` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `para_id` varchar(10) NOT NULL,
  `para_name` varchar(100) DEFAULT NULL,
  `watershed_id` varchar(10) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lookup_para`
--

INSERT INTO `lookup_para` (`id`, `para_id`, `para_name`, `watershed_id`, `created_at`, `updated_at`) VALUES
(1, '10001', 'Shewrapara', '100100', '2023-10-22 06:48:20', '2023-10-22 06:48:20'),
(2, '10002', 'Kazipara', '100100', '2023-10-22 06:49:55', '2023-10-22 06:49:55'),
(3, '20001', 'Dhanmondhi', '100200', '2023-10-22 06:50:31', '2023-10-22 06:50:31'),
(4, '20002', 'Jigatola', '100200', '2023-10-22 06:51:35', '2023-10-22 06:51:35'),
(5, '30001', 'House Building', '100300', '2023-10-22 06:52:07', '2023-10-22 06:52:07'),
(6, '30002', 'Jasim Uddin', '100300', '2023-10-22 06:52:59', '2023-10-22 06:52:59'),
(7, '30003', 'Rajlokki', '100300', '2023-10-22 06:53:25', '2023-10-22 06:53:25');

-- --------------------------------------------------------

--
-- Table structure for table `lookup_training`
--

CREATE TABLE `lookup_training` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `training_id` int(11) NOT NULL,
  `training_name` varchar(50) DEFAULT NULL,
  `delete_row` int(11) DEFAULT 0,
  `created_by` varchar(10) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_by` varchar(10) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lookup_training`
--

INSERT INTO `lookup_training` (`id`, `training_id`, `training_name`, `delete_row`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
(1, 1010101, 'Climate change adaptation', 1, 'admin', '2023-10-31 03:29:03', NULL, NULL),
(2, 1010102, 'Livestock and poultry rearing', 1, 'admin', '2023-10-31 03:30:16', NULL, NULL),
(3, 1010103, 'Aquaculture', 1, 'admin', '2023-10-31 03:30:59', NULL, NULL),
(4, 1010104, 'Production mechanism', 1, 'admin', '2023-10-31 03:31:37', NULL, NULL),
(5, 1010105, 'Processing, marketing and quality control', 1, 'admin', '2023-10-31 03:32:08', NULL, NULL),
(6, 1010106, 'Livelihood diversification', 1, 'admin', '2023-10-31 03:33:00', NULL, NULL),
(7, 1010107, 'Agriculture training from DAE', 1, 'admin', '2023-10-31 03:33:35', NULL, NULL),
(8, 1010108, 'Use of technology for marketing/sale goods', 1, 'admin', '2023-10-31 03:34:16', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `lookup_transportation`
--

CREATE TABLE `lookup_transportation` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `transportation_id` int(11) NOT NULL,
  `transportation_name` varchar(70) DEFAULT NULL,
  `delete_row` int(11) DEFAULT 0,
  `created_by` varchar(10) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `update_by` varchar(10) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lookup_transportation`
--

INSERT INTO `lookup_transportation` (`id`, `transportation_id`, `transportation_name`, `delete_row`, `created_by`, `created_at`, `update_by`, `updated_at`) VALUES
(1, 30001, 'Bus/Motorized public vehicle (CNG, Auto, etc.)', 0, 'admin', '2023-11-05 03:26:09', NULL, NULL),
(2, 30002, 'Motorized private vehicles (Motor Bike) ', 0, 'admin', '2023-11-05 03:27:25', NULL, NULL),
(3, 30003, 'Non-motorized private vehicle (Rickshaw, Van, etc.)', 0, 'admin', '2023-11-05 03:27:48', NULL, NULL),
(4, 30004, 'Boats', 0, 'admin', '2023-11-05 03:28:11', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `lookup_watershed`
--

CREATE TABLE `lookup_watershed` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `watershed_id` varchar(10) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lookup_watershed`
--

INSERT INTO `lookup_watershed` (`id`, `watershed_id`, `created_at`, `updated_at`) VALUES
(1, '100100', '2023-10-22 06:42:09', '2023-10-22 06:42:09'),
(2, '100200', '2023-10-22 06:43:11', '2023-10-22 06:43:11'),
(3, '100300', '2023-10-22 06:43:26', '2023-10-22 06:43:26');

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
(5, '2023_08_25_040813_create_tab_receipt_master_table', 2),
(6, '2023_08_25_043104_create_tab_receipt_details_table', 3),
(7, '2023_08_26_045905_create_user_resets_table', 4),
(8, '2023_08_26_073913_create_tab_acc_codes_table', 5),
(9, '2023_09_01_050828_create_tab_doctors_table', 6),
(10, '2023_09_01_065256_create_tab_admit_bed_table', 7),
(11, '2023_09_01_120507_create_tab_admit_master_table', 8),
(12, '2023_09_02_120250_create_tab_health_status_table', 9),
(13, '2023_09_02_130900_create_tab_admit_details_table', 10),
(14, '2023_10_19_140416_create_lookup_community_table', 11),
(15, '2023_10_20_033816_create__t01_population_table', 12),
(16, '2023_10_20_035036_create_t01_populations_table', 13),
(17, '2023_10_22_064022_create_lookup_watershed_table', 14),
(18, '2023_10_22_064443_create_lookup_para_table', 15),
(19, '2023_10_25_051035_create_tbl_household_table', 16),
(20, '2023_10_26_042119_create_tbl_occupation_table', 17),
(21, '2023_10_20_035036_create_tbl_population_table', 18),
(22, '2023_10_26_092304_create_tbl_land_table', 18),
(23, '2023_10_28_042537_create_tbl_livelihood_table', 19),
(24, '2023_10_28_064150_create_tbl_income_table', 20),
(25, '2023_10_28_083952_create_tbl_expenditure_table', 21),
(26, '2023_10_29_040906_create_tbl_economic_table', 22),
(27, '2023_10_29_101805_create_tbl_education_sec_a_table', 23),
(28, '2023_10_30_081709_create_tbl_literacy_table', 24),
(29, '2023_10_31_032404_create_lookup_training_table', 25),
(30, '2023_10_31_085621_create_tbl_livelihood_training_create', 26),
(31, '2023_10_31_085844_create_tbl_livelihood_training_table', 27),
(32, '2023_11_01_030208_create_lookup_health_center_table', 28),
(33, '2023_11_01_042540_create_tbl_health_services_create', 29),
(34, '2023_11_01_042808_create_tbl_health_services_table', 30),
(35, '2023_11_01_065233_create_tbl_diseases_table', 31),
(36, '2023_11_02_044403_create_tbl_water_table', 32),
(37, '2023_11_04_014017_create_lookup_latrine_list_table', 33),
(38, '2023_11_04_111506_create_lookup_transportation_table', 33),
(39, '2023_11_05_030102_create_tbl_latrine_type_table', 33),
(40, '2023_11_05_042532_create_tbl_sanitation1_table', 34),
(41, '2023_11_05_052931_create_tbl_sanitation2_table', 35),
(42, '2023_11_05_083107_create_tbl_accessibility1_table', 36),
(43, '2023_11_05_092514_create_tbl_accessibility2_table', 37),
(44, '2023_11_05_095451_create_tbl_accessibility3_table', 38),
(45, '2023_11_06_093904_create_tbl_water_resources1_table', 39),
(46, '2023_11_07_060349_create_tbl_water_resources2_table', 40),
(47, '2023_11_08_022838_create_key_water_source_table', 41),
(48, '2023_11_08_042050_create_key_livestock_table', 42),
(49, '2023_11_08_054146_create_key_farm_item_table', 43),
(50, '2023_11_08_065458_create_tbl_livestock1_table', 44),
(51, '2023_11_08_085943_create_tbl_livestock2_table', 45),
(52, '2023_11_08_090917_create_tbl_livestock3_table', 46),
(53, '2023_11_22_042947_create_tbl_basic_info_para_boundary_table', 47),
(54, '2023_11_22_043218_create_p1_basic_info_table', 48),
(55, '2023_11_26_082856_create_tbl_active_watershed_table', 49),
(56, '2023_11_27_060211_create_tbl_para_gps_point_table', 50);

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
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_accessibility1`
--

CREATE TABLE `tbl_accessibility1` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `watershed_id` int(11) NOT NULL,
  `para_id` int(11) NOT NULL,
  `para_name` varchar(20) DEFAULT NULL,
  `transportation_id` int(11) NOT NULL,
  `transportation_name` varchar(70) DEFAULT NULL,
  `trans_condition` varchar(10) DEFAULT NULL,
  `comments` varchar(20) DEFAULT NULL,
  `created_by` varchar(10) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_by` varchar(10) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_accessibility1`
--

INSERT INTO `tbl_accessibility1` (`id`, `watershed_id`, `para_id`, `para_name`, `transportation_id`, `transportation_name`, `trans_condition`, `comments`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
(1, 100100, 10002, 'Kazipara', 30004, 'Boats', '1', 'asad', '', '2023-11-05 02:37:31', NULL, NULL),
(2, 100100, 10002, 'Kazipara', 30001, 'Bus/Motorized public vehicle (CNG, Auto, etc.)', '2', 'arft', '', '2023-11-05 02:37:31', NULL, NULL),
(3, 100100, 10002, 'Kazipara', 30002, 'Motorized private vehicles (Motor Bike) ', '1', 'gtfr', '', '2023-11-05 02:37:31', NULL, NULL),
(4, 100100, 10002, 'Kazipara', 30003, 'Non-motorized private vehicle (Rickshaw, Van, etc.)', '3', 'yufe', '', '2023-11-05 02:37:31', NULL, NULL),
(5, 100200, 20002, 'Jigatola', 30004, 'Boats', '1', 'rty', '', '2023-11-05 03:03:27', NULL, NULL),
(6, 100200, 20002, 'Jigatola', 30001, 'Bus/Motorized public vehicle (CNG, Auto, etc.)', '2', 'ygt', '', '2023-11-05 03:03:27', NULL, NULL),
(7, 100200, 20002, 'Jigatola', 30002, 'Motorized private vehicles (Motor Bike) ', '1', 'der', '', '2023-11-05 03:03:27', NULL, NULL),
(8, 100200, 20002, 'Jigatola', 30003, 'Non-motorized private vehicle (Rickshaw, Van, etc.)', '3', 'hyu', '', '2023-11-05 03:03:27', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_accessibility2`
--

CREATE TABLE `tbl_accessibility2` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `watershed_id` int(11) NOT NULL,
  `para_id` int(11) NOT NULL,
  `para_name` varchar(20) DEFAULT NULL,
  `phone_less20` varchar(6) DEFAULT NULL,
  `phone_20to40` varchar(6) DEFAULT NULL,
  `phone_up40` varchar(6) DEFAULT NULL,
  `anroid_less20` varchar(6) DEFAULT NULL,
  `anroid_20to40` varchar(6) DEFAULT NULL,
  `anroid_up40` varchar(6) DEFAULT NULL,
  `intertnet_less20` varchar(6) DEFAULT NULL,
  `intertnet_20to40` varchar(6) DEFAULT NULL,
  `intertnet_up40` varchar(6) DEFAULT NULL,
  `remarks` varchar(20) DEFAULT NULL,
  `created_by` varchar(10) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `update_by` varchar(10) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_accessibility2`
--

INSERT INTO `tbl_accessibility2` (`id`, `watershed_id`, `para_id`, `para_name`, `phone_less20`, `phone_20to40`, `phone_up40`, `anroid_less20`, `anroid_20to40`, `anroid_up40`, `intertnet_less20`, `intertnet_20to40`, `intertnet_up40`, `remarks`, `created_by`, `created_at`, `update_by`, `updated_at`) VALUES
(1, 100200, 20001, 'Dhanmondhi', '23', '12', '21', '34', '23', '23', '28', '16', '13', 'asd', 'alamin', '2023-11-05 03:30:12', NULL, NULL),
(2, 100200, 20002, 'Jigatola', '26', '15', '24', '15', '18', '19', '24', '13', '16', 'ser', 'alamin', '2023-11-05 03:32:15', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_accessibility3`
--

CREATE TABLE `tbl_accessibility3` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `watershed_id` int(11) NOT NULL,
  `para_id` int(11) NOT NULL,
  `para_name` varchar(20) DEFAULT NULL,
  `national_highway` varchar(6) DEFAULT NULL,
  `regional_highway` varchar(6) DEFAULT NULL,
  `zilla_road` varchar(6) DEFAULT NULL,
  `local_road` varchar(6) DEFAULT NULL,
  `main_transportation` varchar(15) DEFAULT NULL,
  `goods_transportation` varchar(15) DEFAULT NULL,
  `created_by` varchar(10) DEFAULT NULL,
  `updated_by` varchar(10) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_accessibility3`
--

INSERT INTO `tbl_accessibility3` (`id`, `watershed_id`, `para_id`, `para_name`, `national_highway`, `regional_highway`, `zilla_road`, `local_road`, `main_transportation`, `goods_transportation`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 100200, 20002, 'Jigatola', '30', '25', '16', '23', 'Earthen', 'Pickup Van', 'alamin', NULL, '2023-11-05 04:00:56', NULL),
(2, 100100, 10001, 'Shewrapara', '25', '23', '15', '25', 'Herringbone', 'Pickup Van', 'alamin', NULL, '2023-11-05 04:02:16', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_active_watershed`
--

CREATE TABLE `tbl_active_watershed` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_name` varchar(20) NOT NULL,
  `watershed_id` varchar(10) DEFAULT NULL,
  `watershed_name` varchar(20) DEFAULT NULL,
  `para_id` varchar(10) DEFAULT NULL,
  `para_name` varchar(20) DEFAULT NULL,
  `status` varchar(10) DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_active_watershed`
--

INSERT INTO `tbl_active_watershed` (`id`, `user_name`, `watershed_id`, `watershed_name`, `para_id`, `para_name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'user1', 'R99', 'Bhushan Chhara', '4055461611', 'asd', '1', '2023-11-28 04:10:30', NULL),
(2, 'user2', 'R99', 'Bhushan Chhara', '4055461611', 'asd', '1', '2023-11-28 04:10:30', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_diseases`
--

CREATE TABLE `tbl_diseases` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `watershed_id` int(11) NOT NULL,
  `para_id` int(11) NOT NULL,
  `para_name` varchar(20) DEFAULT NULL,
  `diarrhoeal` varchar(10) DEFAULT NULL,
  `heat_stroke` varchar(10) DEFAULT NULL,
  `malaria` varchar(10) DEFAULT NULL,
  `dengue` varchar(10) DEFAULT NULL,
  `typhoid` varchar(10) DEFAULT NULL,
  `zika_fever` varchar(10) DEFAULT NULL,
  `skin_diseases` varchar(10) DEFAULT NULL,
  `others` varchar(10) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `created_by` varchar(10) DEFAULT NULL,
  `updated_by` varchar(10) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_diseases`
--

INSERT INTO `tbl_diseases` (`id`, `watershed_id`, `para_id`, `para_name`, `diarrhoeal`, `heat_stroke`, `malaria`, `dengue`, `typhoid`, `zika_fever`, `skin_diseases`, `others`, `created_at`, `created_by`, `updated_by`, `updated_at`) VALUES
(3, 100200, 20002, 'Jigatola', '2', '3', '4', '3', '5', '4', '3', '4', '2023-11-01 03:31:20', 'alamin', NULL, NULL),
(4, 100200, 20001, 'Dhanmondhi', '2', '3', '4', '3', '5', '4', '3', '4', '2023-11-01 03:32:30', 'alamin', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_economic`
--

CREATE TABLE `tbl_economic` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `watershed_id` int(11) NOT NULL,
  `para_id` int(11) NOT NULL,
  `community_id` int(11) NOT NULL,
  `community_name` varchar(50) DEFAULT NULL,
  `very_poor` int(11) DEFAULT NULL,
  `poor` int(11) DEFAULT NULL,
  `middle_class` int(11) DEFAULT NULL,
  `better_off` int(11) DEFAULT NULL,
  `month_less3` int(11) DEFAULT NULL,
  `month_3to6` int(11) DEFAULT NULL,
  `month_6to9` int(11) DEFAULT NULL,
  `month_9to12` int(11) DEFAULT NULL,
  `month_up12` int(11) DEFAULT NULL,
  `created_by` varchar(10) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_by` varchar(10) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_economic`
--

INSERT INTO `tbl_economic` (`id`, `watershed_id`, `para_id`, `community_id`, `community_name`, `very_poor`, `poor`, `middle_class`, `better_off`, `month_less3`, `month_3to6`, `month_6to9`, `month_9to12`, `month_up12`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
(1, 100200, 20002, 10010007, 'Chak', 3, 4, 5, 4, 5, 4, 5, 4, 5, 'alamin', '2023-10-29 00:00:25', NULL, NULL),
(2, 100200, 20001, 10010007, 'Chak', 3, 3, 3, 4, 3, 3, 3, 2, 2, 'alamin', '2023-10-29 00:29:10', NULL, NULL),
(3, 100100, 10002, 10010009, 'Lushai', 2, 5, 56, 5, 5, 56, 5, 5, 5, 'alamin', '2023-10-29 02:14:31', NULL, NULL),
(4, 100100, 10002, 10010002, 'Marma', 6, 6, 6, 6, 6, 6, 7, 7, 7, 'alamin', '2023-10-29 02:14:31', NULL, NULL),
(7, 100100, 10002, 10010004, 'Mro', 3, 3, 2, 3, 2, 3, 4, 3, 3, 'alamin', '2023-10-29 03:51:57', NULL, NULL),
(8, 100100, 10002, 10010011, 'Non-IPs', 3, 4, 3, 4, 5, 4, 5, 4, 3, 'alamin', '2023-10-29 03:51:57', NULL, NULL),
(9, 100200, 20001, 10010008, 'Khumi', 4, 4, 5, 4, 5, 45, 4, 5, 4, 'alamin', '2023-10-29 21:10:08', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_expenses`
--

CREATE TABLE `tbl_expenses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `watershed_id` int(11) NOT NULL,
  `para_id` int(11) NOT NULL,
  `community_id` int(11) NOT NULL,
  `community_name` varchar(50) DEFAULT NULL,
  `avg_per_house` int(11) DEFAULT NULL,
  `expenses_1to6` int(11) DEFAULT NULL,
  `expenses_7to10` int(11) DEFAULT NULL,
  `expenses_11to15` int(11) DEFAULT NULL,
  `expenses_16to20` int(11) DEFAULT NULL,
  `expenses_21to25` int(11) DEFAULT NULL,
  `expenses_26to30` int(11) DEFAULT NULL,
  `expenses_30Up` int(11) DEFAULT NULL,
  `male` int(11) DEFAULT NULL,
  `female` int(11) DEFAULT NULL,
  `created_by` varchar(10) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_by` varchar(10) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_expenses`
--

INSERT INTO `tbl_expenses` (`id`, `watershed_id`, `para_id`, `community_id`, `community_name`, `avg_per_house`, `expenses_1to6`, `expenses_7to10`, `expenses_11to15`, `expenses_16to20`, `expenses_21to25`, `expenses_26to30`, `expenses_30Up`, `male`, `female`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
(1, 100300, 30001, 10010008, 'Khumi', 4, 4, 4, 4, 3, 4, 3, 4, 3, 4, 'alamin', '2023-10-28 03:03:56', NULL, NULL),
(2, 100300, 30001, 10010009, 'Lushai', 4, 3, 3, 3, 3, 3, 4, 3, 2, 3, 'alamin', '2023-10-28 03:05:41', NULL, NULL),
(3, 100300, 30001, 10010002, 'Marma', 5, 4, 4, 3, 4, 3, 4, 4, 3, 2, 'alamin', '2023-10-28 03:05:41', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_health_services`
--

CREATE TABLE `tbl_health_services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `watershed_id` int(11) NOT NULL,
  `para_id` int(11) NOT NULL,
  `para_name` varchar(50) DEFAULT NULL,
  `center_id` int(11) DEFAULT NULL,
  `center_name` varchar(30) DEFAULT NULL,
  `people_percentage` varchar(10) DEFAULT NULL,
  `distance` varchar(10) DEFAULT NULL,
  `service_reason` varchar(50) DEFAULT NULL,
  `created_by` varchar(10) DEFAULT NULL,
  `updated_by` varchar(10) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_health_services`
--

INSERT INTO `tbl_health_services` (`id`, `watershed_id`, `para_id`, `para_name`, `center_id`, `center_name`, `people_percentage`, `distance`, `service_reason`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(38, 100200, 20001, 'Dhanmondhi', 10040002, 'Community Clinic (govt.)', '3', '1', 'ee', 'alamin', NULL, '2023-11-01 03:50:32', NULL),
(39, 100200, 20001, 'Dhanmondhi', 10040004, 'District Hospital', '4', '1', 'tt', 'alamin', NULL, '2023-11-01 03:50:32', NULL),
(40, 100200, 20001, 'Dhanmondhi', 10040001, 'Health Centres', '5', '1', 'rfg', 'alamin', NULL, '2023-11-01 03:50:32', NULL),
(41, 100200, 20001, 'Dhanmondhi', 10040006, 'NGO-Facilitated Center ', '4', '1', 'ftt', 'alamin', NULL, '2023-11-01 03:50:32', NULL),
(42, 100200, 20001, 'Dhanmondhi', 10040005, 'Private Hospital ', '5', '1', 'fh', 'alamin', NULL, '2023-11-01 03:50:32', NULL),
(43, 100200, 20001, 'Dhanmondhi', 10040003, 'Upazila Hospital', '4', '1', 'fh', 'alamin', NULL, '2023-11-01 03:50:32', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_household`
--

CREATE TABLE `tbl_household` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `watershed_id` varchar(10) NOT NULL,
  `para_id` varchar(10) NOT NULL,
  `community_id` varchar(10) DEFAULT NULL,
  `community_name` varchar(50) DEFAULT NULL,
  `jhupri_house` int(10) DEFAULT NULL,
  `kacha_house` int(10) DEFAULT NULL,
  `semi_pacca_house` int(10) DEFAULT NULL,
  `pacca_house` int(10) DEFAULT NULL,
  `total_house` int(10) DEFAULT NULL,
  `created_by` varchar(10) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `update_by` varchar(10) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_household`
--

INSERT INTO `tbl_household` (`id`, `watershed_id`, `para_id`, `community_id`, `community_name`, `jhupri_house`, `kacha_house`, `semi_pacca_house`, `pacca_house`, `total_house`, `created_by`, `created_at`, `update_by`, `updated_at`) VALUES
(1, '100100', '10001', '10010006', 'Bawm', 6, 4, 5, 4, 19, 'talha', NULL, NULL, '2023-10-25 02:36:55'),
(3, '100100', '10002', '10010006', 'Bawm', 4, 4, 4, 4, 16, 'alamin', NULL, NULL, NULL),
(4, '100100', '10002', '10010007', 'Chak', 3, 3, 3, 3, 12, 'alamin', NULL, NULL, NULL),
(5, '100100', '10002', '10010008', 'Khumi', 3, 3, 5, 3, 14, 'alamin', NULL, NULL, NULL),
(6, '100100', '10002', '10010001', 'Chakma', 4, 5, 35, 3, 47, 'alamin', NULL, NULL, NULL),
(7, '100100', '10002', '10010009', 'Lushai', 5, 6, 5, 6, 22, 'alamin', NULL, NULL, NULL),
(8, '100100', '10002', '10010002', 'Marma', 4, 4, 5, 5, 18, 'alamin', NULL, NULL, NULL),
(9, '100200', '20001', '10010007', 'Chak', 3, 4, 3, 4, 14, 'alamin', '2023-10-27 20:16:47', NULL, NULL),
(10, '100200', '20001', '10010001', 'Chakma', 4, 5, 5, 4, 18, 'alamin', '2023-10-27 20:16:47', NULL, NULL),
(11, '100200', '20001', '10010008', 'Khumi', 5, 6, 5, 6, 22, 'alamin', '2023-10-27 20:16:47', NULL, NULL),
(12, '100200', '20002', '10010001', 'Chakma', 8, 6, 8, 9, 31, 'alamin', '2023-10-27 21:41:07', NULL, NULL),
(13, '100300', '30002', '10010001', 'Chakma', 3, 3, 2, 4, 12, 'alamin', '2023-10-27 21:48:34', NULL, NULL),
(14, '100300', '30001', '10010008', 'Khumi', 4, 5, 3, 9, 21, 'alamin', '2023-10-27 21:51:27', NULL, NULL),
(15, '100300', '30001', '10010007', 'Chak', 6, 3, 6, 6, 21, 'alamin', '2023-10-27 21:57:49', NULL, NULL),
(16, '100200', '20001', '10010009', 'Lushai', 4, 4, 4, 6, 18, 'alamin', '2023-10-27 23:13:11', NULL, NULL),
(17, '100200', '20001', '10010002', 'Marma', 33, 54, 22, 0, 109, 'alamin', '2023-11-02 04:35:07', NULL, NULL),
(18, '100200', '20001', '10010011', 'Non-IPs', 0, 22, 45, 33, 100, 'alamin', '2023-11-02 04:35:51', NULL, NULL),
(19, '100200', '20001', '10010010', 'Pankhua', 78, 35, 0, 33, 146, 'alamin', '2023-11-02 04:35:51', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_income`
--

CREATE TABLE `tbl_income` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `watershed_id` int(10) NOT NULL,
  `para_id` int(10) NOT NULL,
  `community_id` int(10) NOT NULL,
  `community_name` varchar(50) DEFAULT NULL,
  `avg_per_house` int(10) DEFAULT NULL,
  `income_1to6` int(10) DEFAULT NULL,
  `income_7to10` int(10) DEFAULT NULL,
  `income_11to15` int(10) DEFAULT NULL,
  `income_16to20` int(10) DEFAULT NULL,
  `income_21to25` int(10) DEFAULT NULL,
  `income_26to30` int(10) DEFAULT NULL,
  `income_30Up` int(10) DEFAULT NULL,
  `male` int(10) DEFAULT NULL,
  `female` int(10) DEFAULT NULL,
  `created_by` varchar(10) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_by` varchar(10) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_income`
--

INSERT INTO `tbl_income` (`id`, `watershed_id`, `para_id`, `community_id`, `community_name`, `avg_per_house`, `income_1to6`, `income_7to10`, `income_11to15`, `income_16to20`, `income_21to25`, `income_26to30`, `income_30Up`, `male`, `female`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
(1, 100200, 20001, 10010001, 'Chakma', 4, 3, 2, 4, 3, 5, 4, 3, 4, 3, 'alamin', '2023-10-28 02:07:24', NULL, NULL),
(2, 100100, 10002, 10010007, 'Chak', 34, 34, 34, 32, 2, 4, 2, 4, 4, 2, 'alamin', '2023-10-28 02:15:32', NULL, NULL),
(3, 100100, 10002, 10010001, 'Chakma', 4, 34, 3, 23, 4, 34, 34, 3, 33, 2, 'alamin', '2023-10-28 02:15:32', NULL, NULL),
(4, 100100, 10002, 10010008, 'Khumi', 45, 6, 56, 5, 6, 5, 6, 5, 5, 6, 'alamin', '2023-10-28 02:15:32', NULL, NULL),
(7, 100100, 10001, 10010007, 'Chak', 5, 5, 5, 5, 5, 5, 5, 3, 4, 3, 'alamin', '2023-10-28 02:18:20', NULL, NULL),
(8, 100100, 10001, 10010001, 'Chakma', 4, 5, 4, 3, 4, 4, 4, 4, 3, 2, 'alamin', '2023-10-28 02:18:20', NULL, NULL),
(9, 100200, 20002, 10010008, 'Khumi', 4, 3, 4, 3, 3, 2, 2, 4, 3, 3, 'alamin', '2023-10-28 02:21:52', NULL, NULL),
(10, 100300, 30002, 10010008, 'Khumi', 4, 3, 2, 3, 4, 4, 3, 2, 3, 4, 'alamin', '2023-10-28 02:23:50', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_land`
--

CREATE TABLE `tbl_land` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `watershed_id` int(10) NOT NULL,
  `para_id` int(10) NOT NULL,
  `community_id` int(10) NOT NULL,
  `community_name` varchar(50) DEFAULT NULL,
  `landless` int(10) DEFAULT NULL,
  `self_owned` int(10) DEFAULT NULL,
  `community_land` int(10) DEFAULT NULL,
  `lease` int(10) DEFAULT NULL,
  `sharecropping` int(10) DEFAULT NULL,
  `occupation_land` int(10) DEFAULT NULL,
  `grove_land` int(10) DEFAULT NULL,
  `valley` int(10) DEFAULT NULL,
  `plain_land` int(10) DEFAULT NULL,
  `hilly` int(10) DEFAULT NULL,
  `mixed` int(11) DEFAULT NULL,
  `profit_value` int(11) DEFAULT NULL,
  `profit_name` varchar(10) DEFAULT NULL,
  `created_by` varchar(10) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `update_by` varchar(10) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_land`
--

INSERT INTO `tbl_land` (`id`, `watershed_id`, `para_id`, `community_id`, `community_name`, `landless`, `self_owned`, `community_land`, `lease`, `sharecropping`, `occupation_land`, `grove_land`, `valley`, `plain_land`, `hilly`, `mixed`, `profit_value`, `profit_name`, `created_by`, `created_at`, `update_by`, `updated_at`) VALUES
(1, 100100, 10002, 10010007, 'Chak', 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, '', 'alamin', '2023-10-26 04:31:25', NULL, '2023-10-26 04:31:25'),
(2, 100100, 10002, 10010001, 'Chakma', 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 3, '', 'alamin', '2023-10-27 20:13:22', NULL, NULL),
(3, 100200, 20001, 10010009, 'Lushai', 6, 6, 6, 6, 6, 6, 67, 77, 7, 7, 6, 3, 'Partial', 'alamin', '2023-10-27 21:34:54', NULL, NULL),
(4, 100300, 30003, 10010008, 'Khumi', 4, 8, 87, 7, 7, 6, 68, 8, 7, 8, 7, 1, 'Self', 'alamin', '2023-10-27 21:37:58', NULL, NULL),
(5, 100300, 30003, 10010009, 'Lushai', 9, 76, 5, 4, 56, 5, 7, 6, 7, 6, 8, 2, 'Common', 'alamin', '2023-10-27 21:37:58', NULL, NULL),
(6, 100200, 20002, 10010002, 'Marma', 3, 3, 3, 3, 3, 3, 3, 3, 2, 2, 2, 2, 'Common', 'alamin', '2023-10-27 23:00:52', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_latrine_type`
--

CREATE TABLE `tbl_latrine_type` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_literacy`
--

CREATE TABLE `tbl_literacy` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `watershed_id` int(11) NOT NULL,
  `para_id` int(11) NOT NULL,
  `para_name` varchar(50) DEFAULT NULL,
  `male_read_write` int(11) DEFAULT NULL,
  `female_read_write` int(11) DEFAULT NULL,
  `male_primary` int(11) DEFAULT NULL,
  `female_primary` int(11) DEFAULT NULL,
  `male_ssc` int(11) DEFAULT NULL,
  `female_ssc` int(11) DEFAULT NULL,
  `male_hsc` int(11) DEFAULT NULL,
  `female_hsc` int(11) DEFAULT NULL,
  `male_graduation` int(11) DEFAULT NULL,
  `female_graduation` int(11) DEFAULT NULL,
  `male_post` int(11) DEFAULT NULL,
  `female_post` int(11) DEFAULT NULL,
  `male_total` int(11) DEFAULT NULL,
  `female_total` int(11) DEFAULT NULL,
  `income_training` varchar(100) DEFAULT NULL,
  `created_by` varchar(10) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_by` varchar(10) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_literacy`
--

INSERT INTO `tbl_literacy` (`id`, `watershed_id`, `para_id`, `para_name`, `male_read_write`, `female_read_write`, `male_primary`, `female_primary`, `male_ssc`, `female_ssc`, `male_hsc`, `female_hsc`, `male_graduation`, `female_graduation`, `male_post`, `female_post`, `male_total`, `female_total`, `income_training`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
(1, 100200, 20001, 'Dhanmondhi', 2, 3, 2, 3, 2, 3, 2, 3, 2, 3, 2, 3, 12, 18, NULL, 'alamin', '2023-10-30 07:09:17', NULL, NULL),
(2, 100100, 10002, 'Kazipara', 3, 3, 4, 4, 3, 4, 3, 3, 4, 4, 3, 4, 20, 22, '1) Test 2) Test3 3) Test4', 'alamin', '2023-10-30 08:37:07', NULL, NULL),
(3, 100300, 30001, 'House Building', 5, 6, 5, 5, 7, 4, 8, 4, 5, 9, 5, 8, 35, 36, '1) AB 2) CD 3) GHT', 'alamin', '2023-10-30 20:55:21', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_livelihood`
--

CREATE TABLE `tbl_livelihood` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `watershed_id` int(11) NOT NULL,
  `para_id` int(11) NOT NULL,
  `para_name` varchar(50) DEFAULT NULL,
  `community_id` int(11) NOT NULL,
  `community_name` varchar(20) DEFAULT NULL,
  `jhum_male` varchar(5) DEFAULT NULL,
  `jhum_female` varchar(5) DEFAULT NULL,
  `plain_land_male` varchar(5) DEFAULT NULL,
  `plain_land_female` varchar(5) DEFAULT NULL,
  `orchard_male` varchar(5) DEFAULT NULL,
  `orchard_female` varchar(5) DEFAULT NULL,
  `fuel_wood_male` varchar(5) DEFAULT NULL,
  `fuel_wood_female` varchar(5) DEFAULT NULL,
  `wage_labour_male` varchar(5) DEFAULT NULL,
  `wage_labour_female` varchar(5) DEFAULT NULL,
  `poultry_male` varchar(5) DEFAULT NULL,
  `poultry_female` varchar(5) DEFAULT NULL,
  `livestock_male` varchar(5) DEFAULT NULL,
  `livestock_female` varchar(5) DEFAULT NULL,
  `aquaculture_male` varchar(5) DEFAULT NULL,
  `aquaculture_female` varchar(5) DEFAULT NULL,
  `service_male` varchar(5) DEFAULT NULL,
  `service_female` varchar(5) DEFAULT NULL,
  `business_male` varchar(5) DEFAULT NULL,
  `business_female` varchar(5) DEFAULT NULL,
  `handicraft_male` varchar(5) DEFAULT NULL,
  `handicraft_female` varchar(5) DEFAULT NULL,
  `other_male` varchar(5) DEFAULT NULL,
  `other_female` varchar(5) DEFAULT NULL,
  `created_by` varchar(8) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_by` varchar(8) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_livelihood`
--

INSERT INTO `tbl_livelihood` (`id`, `watershed_id`, `para_id`, `para_name`, `community_id`, `community_name`, `jhum_male`, `jhum_female`, `plain_land_male`, `plain_land_female`, `orchard_male`, `orchard_female`, `fuel_wood_male`, `fuel_wood_female`, `wage_labour_male`, `wage_labour_female`, `poultry_male`, `poultry_female`, `livestock_male`, `livestock_female`, `aquaculture_male`, `aquaculture_female`, `service_male`, `service_female`, `business_male`, `business_female`, `handicraft_male`, `handicraft_female`, `other_male`, `other_female`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
(1, 100200, 20001, 'Dhanmondhi', 10010001, 'Chakma', '6', '6', '6', '6', '5', '5', '5', '5', '7', '7', '7', '7', '8', '8', '8', '8', '4', '4', '4', '4', '9', '9', '9', '9', 'alamin', '2023-11-01 09:29:24', NULL, NULL),
(3, 100100, 10001, 'Shewrapara', 10010007, 'Chak', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', 'alamin', '2023-11-01 20:36:57', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_livelihood_training`
--

CREATE TABLE `tbl_livelihood_training` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `watershed_id` int(11) NOT NULL,
  `para_id` int(11) NOT NULL,
  `training_id` int(11) DEFAULT NULL,
  `training_name` varchar(50) DEFAULT NULL,
  `training_receive` int(11) DEFAULT NULL,
  `is_useful` varchar(10) DEFAULT NULL,
  `in_future` varchar(19) DEFAULT NULL,
  `women_percentage` int(11) DEFAULT NULL,
  `govt` varchar(10) DEFAULT NULL,
  `ngo` varchar(10) DEFAULT NULL,
  `developer` varchar(10) DEFAULT NULL,
  `created_by` varchar(10) DEFAULT NULL,
  `updated_by` varchar(10) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_livelihood_training`
--

INSERT INTO `tbl_livelihood_training` (`id`, `watershed_id`, `para_id`, `training_id`, `training_name`, `training_receive`, `is_useful`, `in_future`, `women_percentage`, `govt`, `ngo`, `developer`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 100200, 20001, 1010103, 'Aquaculture', 23, 'Yes', 'No', 34, 'Yes', 'No', 'No', 'alamin', NULL, '2023-10-31 03:13:18', NULL),
(2, 100200, 20002, 1010101, 'Climate change adaptation', 30, 'Yes', 'Yes', 50, 'No', 'No', 'Yes', 'alamin', NULL, '2023-10-31 03:36:40', NULL),
(3, 100100, 10002, 1010101, 'Climate change adaptation', 4, 'Yes', 'No', 43, 'Yes', 'Yes', 'No', 'alamin', NULL, '2023-10-31 03:43:45', NULL),
(4, 100100, 10002, 1010106, 'Livelihood diversification', 5, 'No', 'No', 54, 'No', 'Yes', 'No', 'alamin', NULL, '2023-10-31 03:43:45', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_livestock1`
--

CREATE TABLE `tbl_livestock1` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `watershed_id` int(11) NOT NULL,
  `para_id` int(11) NOT NULL,
  `para_name` varchar(20) DEFAULT NULL,
  `livestock_id` int(50) NOT NULL,
  `livestock_name` varchar(10) DEFAULT NULL,
  `nos` varchar(29) DEFAULT NULL,
  `unit_value` varchar(20) DEFAULT NULL,
  `created_by` varchar(10) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_by` varchar(10) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_livestock1`
--

INSERT INTO `tbl_livestock1` (`id`, `watershed_id`, `para_id`, `para_name`, `livestock_id`, `livestock_name`, `nos`, `unit_value`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
(1, 100200, 20002, 'Jigatola', 50010, 'Cattle', 'rt', '2', '', '2023-11-08 02:19:19', NULL, NULL),
(2, 100200, 20002, 'Jigatola', 50014, 'Duck', 'tg', '3', '', '2023-11-08 02:19:19', NULL, NULL),
(3, 100200, 20002, 'Jigatola', 50011, 'Goat', 'fg', '5', '', '2023-11-08 02:19:19', NULL, NULL),
(4, 100200, 20002, 'Jigatola', 50013, 'Hen', 'rf', '2', '', '2023-11-08 02:19:19', NULL, NULL),
(5, 100200, 20002, 'Jigatola', 50012, 'Pig', 'gf', '1', '', '2023-11-08 02:19:19', NULL, NULL),
(6, 100200, 20002, 'Jigatola', 50015, 'Pigeon', 'hg', '2', '', '2023-11-08 02:19:19', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_livestock2`
--

CREATE TABLE `tbl_livestock2` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `watershed_id` int(11) NOT NULL,
  `para_id` int(11) NOT NULL,
  `para_name` varchar(20) DEFAULT NULL,
  `livestock_id` int(11) NOT NULL,
  `livestock_name` varchar(20) DEFAULT NULL,
  `diseases_name` varchar(20) DEFAULT NULL,
  `mechanism` varchar(20) DEFAULT NULL,
  `created_by` varchar(10) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_by` varchar(10) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_livestock2`
--

INSERT INTO `tbl_livestock2` (`id`, `watershed_id`, `para_id`, `para_name`, `livestock_id`, `livestock_name`, `diseases_name`, `mechanism`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
(1, 100200, 20002, 'Jigatola', 50010, 'Cattle', 'ty', '5', 'alamin', '2023-11-08 03:02:30', NULL, NULL),
(2, 100200, 20002, 'Jigatola', 50014, 'Duck', 'tr', '2', 'alamin', '2023-11-08 03:02:30', NULL, NULL),
(3, 100200, 20002, 'Jigatola', 50011, 'Goat', 'gh', '2', 'alamin', '2023-11-08 03:02:30', NULL, NULL),
(4, 100200, 20002, 'Jigatola', 50013, 'Hen', 'uj', '5', 'alamin', '2023-11-08 03:02:30', NULL, NULL),
(5, 100200, 20002, 'Jigatola', 50012, 'Pig', 'yh', '8', 'alamin', '2023-11-08 03:02:30', NULL, NULL),
(6, 100200, 20002, 'Jigatola', 50015, 'Pigeon', 'fg', '9', 'alamin', '2023-11-08 03:02:30', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_livestock3`
--

CREATE TABLE `tbl_livestock3` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `watershed_id` int(11) NOT NULL,
  `para_id` int(11) NOT NULL,
  `para_name` varchar(20) DEFAULT NULL,
  `farm_item_id` int(11) NOT NULL,
  `farm_item_name` varchar(20) DEFAULT NULL,
  `unit_cost` varchar(10) DEFAULT NULL,
  `total_cost` varchar(10) DEFAULT NULL,
  `created_by` varchar(10) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `update_by` varchar(10) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_livestock3`
--

INSERT INTO `tbl_livestock3` (`id`, `watershed_id`, `para_id`, `para_name`, `farm_item_id`, `farm_item_name`, `unit_cost`, `total_cost`, `created_by`, `created_at`, `update_by`, `updated_at`) VALUES
(1, 100100, 10002, 'Kazipara', 60010, 'Chicks', '20', '200', 'alamin', '2023-11-08 03:12:54', NULL, NULL),
(2, 100100, 10002, 'Kazipara', 60011, 'Housing', '30', '300', 'alamin', '2023-11-08 03:12:54', NULL, NULL),
(3, 100100, 10002, 'Kazipara', 60012, 'Feed', '25', '150', 'alamin', '2023-11-08 03:12:54', NULL, NULL),
(4, 100100, 10002, 'Kazipara', 60013, 'Vaccination', '45', '400', 'alamin', '2023-11-08 03:12:54', NULL, NULL),
(5, 100100, 10002, 'Kazipara', 60014, 'Medicine', '60', '200', 'alamin', '2023-11-08 03:12:54', NULL, NULL),
(6, 100100, 10002, 'Kazipara', 60015, 'Labor', '25', '400', 'alamin', '2023-11-08 03:12:54', NULL, NULL),
(7, 100100, 10002, 'Kazipara', 60016, 'Veterinary Cost', '50', '450', 'alamin', '2023-11-08 03:12:54', NULL, NULL),
(8, 100100, 10002, 'Kazipara', 60017, 'Others', '40', '260', 'alamin', '2023-11-08 03:12:54', NULL, NULL),
(9, 100100, 10001, 'Shewrapara', 60010, 'Chicks', '20', '300', 'alamin', '2023-11-08 03:15:28', NULL, NULL),
(10, 100100, 10001, 'Shewrapara', 60011, 'Housing', '30', '500', 'alamin', '2023-11-08 03:15:28', NULL, NULL),
(11, 100100, 10001, 'Shewrapara', 60012, 'Feed', '60', '500', 'alamin', '2023-11-08 03:15:28', NULL, NULL),
(12, 100100, 10001, 'Shewrapara', 60013, 'Vaccination', '40', '780', 'alamin', '2023-11-08 03:15:28', NULL, NULL),
(13, 100100, 10001, 'Shewrapara', 60014, 'Medicine', '25', '600', 'alamin', '2023-11-08 03:15:28', NULL, NULL),
(14, 100100, 10001, 'Shewrapara', 60015, 'Labor', '24', '230', 'alamin', '2023-11-08 03:15:28', NULL, NULL),
(15, 100100, 10001, 'Shewrapara', 60016, 'Veterinary Cost', '28', '621', 'alamin', '2023-11-08 03:15:28', NULL, NULL),
(16, 100100, 10001, 'Shewrapara', 60017, 'Others', '24', '580', 'alamin', '2023-11-08 03:15:28', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_occupation`
--

CREATE TABLE `tbl_occupation` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `watershed_id` int(10) NOT NULL,
  `para_id` int(10) NOT NULL,
  `community_id` int(10) DEFAULT NULL,
  `community_name` varchar(50) DEFAULT NULL,
  `jhum` int(10) DEFAULT NULL,
  `plain_land` int(10) DEFAULT NULL,
  `orchard` int(10) DEFAULT NULL,
  `fuel_wood` int(10) DEFAULT NULL,
  `wage_labour` int(10) DEFAULT NULL,
  `poultry` int(10) DEFAULT NULL,
  `livestock` int(10) DEFAULT NULL,
  `aquaculture` int(10) DEFAULT NULL,
  `service_holder` int(10) DEFAULT NULL,
  `business` int(10) DEFAULT NULL,
  `handicraft` int(10) DEFAULT NULL,
  `others` int(10) DEFAULT NULL,
  `created_by` varchar(10) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `update_by` varchar(10) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_occupation`
--

INSERT INTO `tbl_occupation` (`id`, `watershed_id`, `para_id`, `community_id`, `community_name`, `jhum`, `plain_land`, `orchard`, `fuel_wood`, `wage_labour`, `poultry`, `livestock`, `aquaculture`, `service_holder`, `business`, `handicraft`, `others`, `created_by`, `created_at`, `update_by`, `updated_at`) VALUES
(1, 100200, 20001, 10010001, 'Chakma', 5, 2, 14, 25, 41, 24, 25, 14, 26, 24, 14, 52, 'alamin', NULL, NULL, NULL),
(2, 100100, 10002, 10010006, 'Bawm', 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 'alamin', NULL, NULL, NULL),
(4, 100100, 10002, 10010004, 'Mro', 3, 3, 33, 33, 3, 3, 3, 33, 3, 3, 3, 3, 'alamin', NULL, NULL, NULL),
(6, 100100, 10002, 10010010, 'Pankhua', 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 'alamin', NULL, NULL, NULL),
(7, 100200, 20002, 10010007, 'Chak', 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 'alamin', '2023-10-25 22:59:09', NULL, '2023-10-25 22:59:09'),
(8, 100200, 20002, 10010001, 'Chakma', 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 'alamin', '2023-10-25 22:59:09', NULL, '2023-10-25 22:59:09'),
(11, 100300, 30001, 10010009, 'Lushai', 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 55, 5, 'alamin', '2023-10-26 01:46:46', NULL, '2023-10-26 01:46:46'),
(13, 100100, 10002, 10010008, 'Khumi', 6, 6, 6, 6, 6, 6, 6, 6, 6, 6, 6, 6, 'alamin', '2023-10-27 20:39:33', NULL, NULL),
(14, 100100, 10002, 10010009, 'Lushai', 8, 8, 8, 8, 8, 8, 8, 8, 8, 8, 8, 8, 'alamin', '2023-10-27 20:39:33', NULL, NULL),
(17, 100100, 10002, 10010007, 'Chak', 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 'alamin', '2023-10-28 23:18:46', NULL, NULL),
(18, 100100, 10002, 10010001, 'Chakma', 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 'alamin', '2023-10-28 23:18:46', NULL, NULL),
(19, 100100, 10002, 10010002, 'Marma', 4, 4, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 'alamin', '2023-10-28 23:20:14', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_para_basic_info`
--

CREATE TABLE `tbl_para_basic_info` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `survey_date` date DEFAULT NULL,
  `watershed_id` varchar(10) NOT NULL,
  `watershed_name` varchar(20) DEFAULT NULL,
  `para_id` varchar(10) NOT NULL,
  `para_name` varchar(20) DEFAULT NULL,
  `mouza_name` varchar(20) DEFAULT NULL,
  `union_name` varchar(20) DEFAULT NULL,
  `upozila` varchar(20) DEFAULT NULL,
  `district` varchar(20) DEFAULT NULL,
  `headman_name` varchar(20) DEFAULT NULL,
  `karbari_name` varchar(20) DEFAULT NULL,
  `chairman_name` varchar(20) DEFAULT NULL,
  `para_area` varchar(20) DEFAULT NULL,
  `any_remarks` varchar(200) DEFAULT NULL,
  `created_by` varchar(10) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `update_by` varchar(10) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_para_basic_info`
--

INSERT INTO `tbl_para_basic_info` (`id`, `survey_date`, `watershed_id`, `watershed_name`, `para_id`, `para_name`, `mouza_name`, `union_name`, `upozila`, `district`, `headman_name`, `karbari_name`, `chairman_name`, `para_area`, `any_remarks`, `created_by`, `created_at`, `update_by`, `updated_at`) VALUES
(2, '2023-11-26', 'R114', 'Gillacahri', '7184317751', 'test1', 'asd', 'ert', 'dfg', 'ert', 'fdr', 'hgt', 'hyu', '123 ha', 'erte', 'user1', '2023-11-25 23:57:15', NULL, NULL),
(3, '2023-11-27', 'R114', 'Gilacharri', '4629226458', 'test2', 'sde', 'rft', 'gty', 'dfr', 'fty', 'juh', 'ghy', '321 ha', 'ftutr', 'user1', '2023-11-26 21:18:01', NULL, NULL),
(4, '2023-11-26', 'T206', 'Sample 1', '3399206439', 'Test10', 'dfr', 'gty', 'der', 'ghy', 'def', 'ftg', 'de', '143 ha', 'gth', 'user1', '2023-11-26 21:54:33', NULL, NULL),
(5, '2023-11-27', 'R114', 'Gilacharri', '2917634481', 'test3', 'dfr', 'tfg', 'fty', 'gyh', 'ftg', 'rft', 'gty', 'dr4', 'der', 'user1', '2023-11-27 01:56:05', NULL, NULL),
(6, '2023-11-24', 'R114', 'Gilacharri', '6150455261', 'test4', 'ert', 'frt', 'dfr', 'gtf', 'drt', 'gty', 'frt', '342', 'dr', 'user1', '2023-11-27 04:11:53', NULL, NULL),
(7, '2023-11-28', 'R99', 'Bhushan Chhara', '4055461611', 'asd', 'frt', 'hyu', 'hyu', 'hu', 'ghy', 'jui', 'gtu', '123 ha', 'ftg', 'user1', '2023-11-28 04:24:43', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_para_gps_point`
--

CREATE TABLE `tbl_para_gps_point` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `watershed_id` varchar(10) NOT NULL,
  `watershed_name` varchar(20) DEFAULT NULL,
  `para_id` varchar(10) DEFAULT NULL,
  `para_name` varchar(20) DEFAULT NULL,
  `east_degree` varchar(20) DEFAULT NULL,
  `east_minute` varchar(20) DEFAULT NULL,
  `east_second` varchar(20) DEFAULT NULL,
  `north_degree` varchar(20) DEFAULT NULL,
  `north_minute` varchar(20) DEFAULT NULL,
  `north_second` varchar(20) DEFAULT NULL,
  `created_by` varchar(10) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `update_by` varchar(10) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_para_gps_point`
--

INSERT INTO `tbl_para_gps_point` (`id`, `watershed_id`, `watershed_name`, `para_id`, `para_name`, `east_degree`, `east_minute`, `east_second`, `north_degree`, `north_minute`, `north_second`, `created_by`, `created_at`, `update_by`, `updated_at`) VALUES
(1, 'T206', 'Sample 1', '3399206439', 'Test10', '5', '5', '5', '2', '2', '2', 'user1', '2023-11-27 00:14:21', NULL, NULL),
(2, 'T206', 'Sample 1', '3399206439', 'Test10', '8', '5', '5', '5', '6', '5', 'user1', '2023-11-27 00:14:21', NULL, NULL),
(3, 'T206', 'Sample 1', '3399206439', 'Test10', '5', '0', '2', '2', '2', '8', 'user1', '2023-11-27 00:14:21', NULL, NULL),
(4, 'T206', 'Sample 1', '3399206439', 'Test10', '0', '0', '0', '0', '0', '0', 'user1', '2023-11-27 00:14:21', NULL, NULL),
(5, 'T206', 'Sample 1', '3399206439', 'Test10', '0', '0', '0', '0', '0', '0', 'user1', '2023-11-27 00:14:21', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_population`
--

CREATE TABLE `tbl_population` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `WatershedId` int(10) NOT NULL,
  `ParaId` int(10) DEFAULT NULL,
  `CommunityId` int(10) NOT NULL,
  `CommunityName` varchar(50) DEFAULT NULL,
  `MaleUnder5` int(10) DEFAULT NULL,
  `Male5to14` int(10) DEFAULT NULL,
  `Male15to19` int(10) DEFAULT NULL,
  `Male20to49` int(10) DEFAULT NULL,
  `Male50to65` int(10) DEFAULT NULL,
  `Male65Up` int(10) DEFAULT NULL,
  `FemaleUnder5` int(10) DEFAULT NULL,
  `Female5to14` int(10) DEFAULT NULL,
  `Female15to19` int(10) DEFAULT NULL,
  `Female20to49` int(10) DEFAULT NULL,
  `Female50to65` int(10) DEFAULT NULL,
  `Female65Up` int(10) DEFAULT NULL,
  `Totalmale` int(10) DEFAULT NULL,
  `TotalFemale` int(10) DEFAULT NULL,
  `TotalPopulation` int(10) DEFAULT NULL,
  `DisbaleMale` int(10) DEFAULT NULL,
  `DisabledFemale` int(10) DEFAULT NULL,
  `created_by` varchar(10) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `update_by` varchar(10) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_population`
--

INSERT INTO `tbl_population` (`id`, `WatershedId`, `ParaId`, `CommunityId`, `CommunityName`, `MaleUnder5`, `Male5to14`, `Male15to19`, `Male20to49`, `Male50to65`, `Male65Up`, `FemaleUnder5`, `Female5to14`, `Female15to19`, `Female20to49`, `Female50to65`, `Female65Up`, `Totalmale`, `TotalFemale`, `TotalPopulation`, `DisbaleMale`, `DisabledFemale`, `created_by`, `created_at`, `update_by`, `updated_at`) VALUES
(33, 100300, 30003, 10010001, 'Chakma', 21, 21, 52, 54, 12, 21, 32, 25, 24, 32, 25, 25, 181, 163, 344, 2, 1, 'alamin', NULL, NULL, NULL),
(34, 100100, 10002, 10010007, 'Chak', 12, 21, 52, 21, 32, 26, 14, 25, 15, 26, 25, 24, 164, 129, 293, 2, 1, 'alamin', '2023-10-26 00:24:25', NULL, '2023-11-22 23:17:30'),
(35, 100100, 10002, 10010001, 'Chakma', 42, 21, 21, 25, 4, 19, 14, 15, 19, 25, 32, 22, 132, 127, 259, 2, 1, 'alamin', '2023-10-26 00:24:25', NULL, '2023-10-26 00:24:25'),
(36, 100100, 10002, 10010008, 'Khumi', 26, 11, 14, 15, 14, 16, 14, 18, 22, 24, 13, 9, 96, 100, 196, 2, 0, 'alamin', '2023-10-26 00:24:25', NULL, '2023-10-26 00:24:25'),
(37, 100100, 10002, 10010009, 'Lushai', 22, 26, 34, 29, 15, 14, 25, 24, 16, 25, 23, 21, 140, 134, 274, 2, 3, 'alamin', '2023-10-26 00:26:14', NULL, '2023-10-26 00:26:14'),
(58, 100200, 20002, 10010001, 'Chakma', 6, 6, 6, 6, 6, 6, 6, 6, 6, 6, 6, 6, 36, 36, 72, 6, 5, 'alamin', '2023-10-27 20:22:15', NULL, NULL),
(59, 100200, 20002, 10010008, 'Khumi', 6, 5, 6, 6, 6, 6, 6, 6, 6, 6, 6, 6, 35, 36, 71, 6, 5, 'alamin', '2023-10-27 20:22:15', NULL, NULL),
(60, 100200, 20002, 10010009, 'Lushai', 6, 6, 6, 7, 6, 7, 6, 7, 6, 7, 6, 6, 38, 38, 76, 6, 7, 'alamin', '2023-10-27 20:22:15', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sanitation1`
--

CREATE TABLE `tbl_sanitation1` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `watershed_id` int(11) NOT NULL,
  `para_id` int(11) NOT NULL,
  `para_name` varchar(20) DEFAULT NULL,
  `latrine_type_id` int(11) NOT NULL,
  `latrine_type_name` varchar(20) DEFAULT NULL,
  `own` varchar(5) DEFAULT NULL,
  `shared` varchar(5) DEFAULT NULL,
  `total` varchar(5) DEFAULT NULL,
  `comments` varchar(30) DEFAULT NULL,
  `created_by` varchar(10) DEFAULT NULL,
  `updated_by` varchar(10) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_sanitation1`
--

INSERT INTO `tbl_sanitation1` (`id`, `watershed_id`, `para_id`, `para_name`, `latrine_type_id`, `latrine_type_name`, `own`, `shared`, `total`, `comments`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 100100, 10002, 'Kazipara', 20003, 'Earthen Pit Toilet ', '52', '8', '60', NULL, '', NULL, '2023-11-04 22:52:09', NULL),
(21, 100200, 20002, 'Jigatola', 20003, 'Earthen Pit Toilet ', '5', '2', '7', '', '', NULL, '2023-11-05 01:59:01', NULL),
(22, 100200, 20002, 'Jigatola', 20004, 'Open Defecation', '5', '2', '7', '', '', NULL, '2023-11-05 01:59:01', NULL),
(23, 100200, 20002, 'Jigatola', 20002, 'Ring Slab', '5', '2', '7', '', '', NULL, '2023-11-05 01:59:01', NULL),
(24, 100200, 20002, 'Jigatola', 20001, 'Water Sealed', '5', '2', '7', '', '', NULL, '2023-11-05 01:59:01', NULL),
(25, 100200, 20001, 'Dhanmondhi', 20003, 'Earthen Pit Toilet ', '14', '2', '16', '', '', NULL, '2023-11-05 02:01:26', NULL),
(26, 100200, 20001, 'Dhanmondhi', 20004, 'Open Defecation', '16', '4', '20', '', '', NULL, '2023-11-05 02:01:26', NULL),
(27, 100200, 20001, 'Dhanmondhi', 20002, 'Ring Slab', '13', '5', '18', '', '', NULL, '2023-11-05 02:01:26', NULL),
(28, 100200, 20001, 'Dhanmondhi', 20001, 'Water Sealed', '11', '2', '13', '', '', NULL, '2023-11-05 02:01:26', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sanitation2`
--

CREATE TABLE `tbl_sanitation2` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `watershed_id` int(11) NOT NULL,
  `para_id` int(11) NOT NULL,
  `para_name` varchar(20) DEFAULT NULL,
  `per_latrine_user` varchar(5) DEFAULT NULL,
  `male_awareness` varchar(10) DEFAULT NULL,
  `female_awareness` varchar(10) DEFAULT NULL,
  `created_by` varchar(10) DEFAULT NULL,
  `updated_by` varchar(10) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_sanitation2`
--

INSERT INTO `tbl_sanitation2` (`id`, `watershed_id`, `para_id`, `para_name`, `per_latrine_user`, `male_awareness`, `female_awareness`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 100200, 20001, 'Dhanmondhi', '3', 'Yes', 'No', 'alamin', NULL, '2023-11-04 23:45:19', NULL),
(2, 100200, 20002, 'Jigatola', '5', 'No', 'Yes', 'alamin', NULL, '2023-11-04 23:47:21', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_vcf_basic_info`
--

CREATE TABLE `tbl_vcf_basic_info` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `watershed_id` varchar(10) NOT NULL,
  `watershed_name` varchar(20) DEFAULT NULL,
  `dependent_para_id` varchar(10) DEFAULT NULL,
  `dependent_para_name` varchar(50) DEFAULT NULL,
  `vcf_name` varchar(20) DEFAULT NULL,
  `vcf_group_name` varchar(20) DEFAULT NULL,
  `chairmane_name` varchar(20) DEFAULT NULL,
  `chairman_cell` varchar(20) DEFAULT NULL,
  `approx_area` varchar(20) DEFAULT NULL,
  `average_distance` varchar(20) DEFAULT NULL,
  `accessibility` varchar(20) DEFAULT NULL,
  `overall_status` varchar(20) DEFAULT NULL,
  `current_problem` varchar(300) DEFAULT NULL,
  `forest_type` varchar(300) DEFAULT NULL,
  `observed_wild_birds` varchar(300) DEFAULT NULL,
  `exist_conversation` varchar(300) DEFAULT NULL,
  `any_remarks` varchar(200) DEFAULT NULL,
  `created_by` varchar(10) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `update_by` varchar(10) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_vcf_basic_info`
--

INSERT INTO `tbl_vcf_basic_info` (`id`, `watershed_id`, `watershed_name`, `dependent_para_id`, `dependent_para_name`, `vcf_name`, `vcf_group_name`, `chairmane_name`, `chairman_cell`, `approx_area`, `average_distance`, `accessibility`, `overall_status`, `current_problem`, `forest_type`, `observed_wild_birds`, `exist_conversation`, `any_remarks`, `created_by`, `created_at`, `update_by`, `updated_at`) VALUES
(4, 'R99', 'Bhushan Chhara', '4055461611', NULL, 'drf', 'ghy', 'hyg', 'gy', 'huj', 'jui', 'Good', 'Degraded Forest', 'gyh', 'Horticulture', 'jik', 'jjyu', 'gty', 'user1', '2023-11-28 04:47:53', NULL, NULL),
(5, 'R99', 'Bhushan Chhara', '4055461611', 'asd', 'gy', 'huj', 'er4', 'gty', 'fty', 'tr5', 'Moderate', 'Degraded Forest', 'fgy', 'Agriculture', 'jui', 'kio', 'gyh', 'user1', '2023-11-28 04:51:05', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_water`
--

CREATE TABLE `tbl_water` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `watershed_id` int(11) NOT NULL,
  `para_id` int(11) NOT NULL,
  `para_name` varchar(20) DEFAULT NULL,
  `source_id` varchar(6) NOT NULL,
  `source_name` varchar(20) DEFAULT NULL,
  `preferred_source` varchar(15) DEFAULT NULL,
  `drinking_water_number` varchar(5) DEFAULT NULL,
  `distance` varchar(20) DEFAULT NULL,
  `availability` varchar(8) DEFAULT NULL,
  `quality` varchar(8) DEFAULT NULL,
  `created_by` varchar(8) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_water`
--

INSERT INTO `tbl_water` (`id`, `watershed_id`, `para_id`, `para_name`, `source_id`, `source_name`, `preferred_source`, `drinking_water_number`, `distance`, `availability`, `quality`, `created_by`, `created_at`, `updated_at`) VALUES
(8, 100200, 20001, 'Dhanmondhi', '40012', 'Dug well', '2', '2', '50-100 (meter)', 'Low', 'Bad', '', '2023-11-07 21:19:52', NULL),
(9, 100200, 20001, 'Dhanmondhi', '40013', 'Gravity Feed System', '3', '3', '50-100 (meter)', 'High', 'Bad', '', '2023-11-07 21:19:52', NULL),
(10, 100200, 20001, 'Dhanmondhi', '40011', 'Ring well', '4', '3', '50-100 (meter)', 'Medium', 'Medium', '', '2023-11-07 21:19:52', NULL),
(11, 100200, 20001, 'Dhanmondhi', '40014', 'Springs', '3', '2', '50-100 (meter)', 'Low', 'Bad', '', '2023-11-07 21:19:52', NULL),
(12, 100200, 20001, 'Dhanmondhi', '40010', 'Tube well', '4', '5', 'Less than 50 (meter)', 'Low', 'Bad', '', '2023-11-07 21:19:52', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_water_resources1`
--

CREATE TABLE `tbl_water_resources1` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `watershed_id` int(11) NOT NULL,
  `para_id` int(11) NOT NULL,
  `para_name` varchar(20) DEFAULT NULL,
  `cat_name` varchar(20) DEFAULT NULL,
  `location_north` varchar(10) DEFAULT NULL,
  `location_south` varchar(10) DEFAULT NULL,
  `source` varchar(10) DEFAULT NULL,
  `outlet` varchar(10) DEFAULT NULL,
  `distance` varchar(10) DEFAULT NULL,
  `availability_mam` varchar(10) DEFAULT NULL,
  `availability_jjas` varchar(10) DEFAULT NULL,
  `availability_on` varchar(10) DEFAULT NULL,
  `availability_djf` varchar(10) DEFAULT NULL,
  `depth_mam` varchar(10) DEFAULT NULL,
  `depth_jjas` varchar(10) DEFAULT NULL,
  `depth_on` varchar(10) DEFAULT NULL,
  `depth_djf` varchar(10) DEFAULT NULL,
  `purpose` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`purpose`)),
  `created_by` varchar(10) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_water_resources1`
--

INSERT INTO `tbl_water_resources1` (`id`, `watershed_id`, `para_id`, `para_name`, `cat_name`, `location_north`, `location_south`, `source`, `outlet`, `distance`, `availability_mam`, `availability_jjas`, `availability_on`, `availability_djf`, `depth_mam`, `depth_jjas`, `depth_on`, `depth_djf`, `purpose`, `created_by`, `created_at`, `updated_at`) VALUES
(2, 100200, 20002, 'Jigatola', 'asd', '34', '54', 'fg', '54', '34', '2', '3', '4', '4', '5', '4', '3', '4', NULL, 'alamin', '2023-11-06 03:53:52', NULL),
(3, 100200, 20001, 'Dhanmondhi', 'hoy', '32', '343', 'jkd', '343', 'gfds', '5', '2', '5', '2', '3', '4', '1', '2', '{\"purpose\":{\"drinking\":\"Drinking\",\"irrigation\":\"Irrigation\",\"cattle\":\"Cattle feeding\"}}', 'alamin', '2023-11-06 20:39:08', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_water_resources2`
--

CREATE TABLE `tbl_water_resources2` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `watershed_id` int(11) NOT NULL,
  `para_id` int(11) NOT NULL,
  `para_name` varchar(20) DEFAULT NULL,
  `current_state` varchar(100) DEFAULT NULL,
  `existing_conversation` varchar(100) DEFAULT NULL,
  `tech_used_for_transport` varchar(100) DEFAULT NULL,
  `recommendation` varchar(100) DEFAULT NULL,
  `created_by` varchar(10) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_by` varchar(10) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_water_resources2`
--

INSERT INTO `tbl_water_resources2` (`id`, `watershed_id`, `para_id`, `para_name`, `current_state`, `existing_conversation`, `tech_used_for_transport`, `recommendation`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
(1, 100200, 20001, 'Dhanmondhi', 'get a mic', 'sang a song..', 'rock and roll', 'enjoy the moment', 'alamin', '2023-11-07 00:22:54', NULL, NULL);

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
  `remember_token` varchar(100) DEFAULT NULL,
  `role` varchar(20) DEFAULT 'disabled',
  `status` varchar(20) DEFAULT 'guest',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `role`, `status`, `created_at`, `updated_at`) VALUES
(1, 'talha', 'talha@gmail.com', NULL, '$2y$10$6QvvF//XZRry6GDRF1V/UOy/lKgLyWYMNJuEo.AzFoToB00TTmFmq', NULL, 'admin', 'active', '2023-08-24 22:03:08', '2023-08-24 22:03:08'),
(2, 'alamin', 'alamin@gmail.com', NULL, '$2y$10$dGlmCLH07Md1kcvdybJMpe9mit90kkyR.SF2XAYM1B7bwmOFIzFvG', NULL, 'user', 'active', '2023-08-24 22:05:43', '2023-08-24 22:06:26'),
(5, 'imran', 'imran@gmail.com', NULL, '$2y$10$L15LC9B0S3SAUbzPEArA9ehi16XsI.cc4tWEDrMaGER64Dcl0vyzC', NULL, 'all_entry', 'active', '2023-08-26 00:16:29', '2023-08-26 01:26:15'),
(6, 'user1', 'user01@gmail.com', NULL, '$2y$10$A2BAut9WdnrCIkfLAPzJDeokVC93s07KSDwagYKhyZ1GszgyLjaT6', NULL, 'entry', 'active', '2023-11-21 03:56:21', '2023-11-21 03:56:21'),
(7, 'user2', 'user2@gmail.com', NULL, '$2y$10$xdPuWY3qcxHxWdofM5njxeIKAxS0PcngExiCCyiH.qz4eMB0i5oY2', NULL, 'entry', 'active', '2023-11-28 04:52:48', '2023-11-28 04:52:48');

-- --------------------------------------------------------

--
-- Table structure for table `user_resets`
--

CREATE TABLE `user_resets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `plain_password` varchar(30) DEFAULT NULL,
  `user_mobile` varchar(12) DEFAULT NULL,
  `user_birth_date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_resets`
--

INSERT INTO `user_resets` (`id`, `plain_password`, `user_mobile`, `user_birth_date`, `created_at`, `updated_at`) VALUES
(1, 'talha@123', '01400757584', '1992-08-14', '2023-08-26 05:12:26', '2023-08-26 05:12:26'),
(2, 'alamin@123', '01627840096', '1994-07-10', '2023-08-26 05:16:22', '2023-08-26 05:16:22'),
(5, 'imran@321', NULL, NULL, '2023-08-26 00:16:29', '2023-08-26 00:16:29'),
(7, 'user@1234', NULL, NULL, '2023-11-21 03:56:21', '2023-11-21 03:56:21'),
(8, 'user@1234', NULL, NULL, '2023-11-28 04:52:48', '2023-11-28 04:52:48');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `key_farm_item`
--
ALTER TABLE `key_farm_item`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `key_livestock`
--
ALTER TABLE `key_livestock`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `key_watershed`
--
ALTER TABLE `key_watershed`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `key_water_source`
--
ALTER TABLE `key_water_source`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lookup_community`
--
ALTER TABLE `lookup_community`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lookup_health_center`
--
ALTER TABLE `lookup_health_center`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lookup_latrine_list`
--
ALTER TABLE `lookup_latrine_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lookup_para`
--
ALTER TABLE `lookup_para`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lookup_training`
--
ALTER TABLE `lookup_training`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lookup_transportation`
--
ALTER TABLE `lookup_transportation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lookup_watershed`
--
ALTER TABLE `lookup_watershed`
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
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `tbl_accessibility1`
--
ALTER TABLE `tbl_accessibility1`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_accessibility2`
--
ALTER TABLE `tbl_accessibility2`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_accessibility3`
--
ALTER TABLE `tbl_accessibility3`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_active_watershed`
--
ALTER TABLE `tbl_active_watershed`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_diseases`
--
ALTER TABLE `tbl_diseases`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_economic`
--
ALTER TABLE `tbl_economic`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_expenses`
--
ALTER TABLE `tbl_expenses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_health_services`
--
ALTER TABLE `tbl_health_services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_household`
--
ALTER TABLE `tbl_household`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_income`
--
ALTER TABLE `tbl_income`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_land`
--
ALTER TABLE `tbl_land`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_latrine_type`
--
ALTER TABLE `tbl_latrine_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_literacy`
--
ALTER TABLE `tbl_literacy`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_livelihood`
--
ALTER TABLE `tbl_livelihood`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_livelihood_training`
--
ALTER TABLE `tbl_livelihood_training`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_livestock1`
--
ALTER TABLE `tbl_livestock1`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_livestock2`
--
ALTER TABLE `tbl_livestock2`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_livestock3`
--
ALTER TABLE `tbl_livestock3`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_occupation`
--
ALTER TABLE `tbl_occupation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_para_basic_info`
--
ALTER TABLE `tbl_para_basic_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_para_gps_point`
--
ALTER TABLE `tbl_para_gps_point`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_population`
--
ALTER TABLE `tbl_population`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_sanitation1`
--
ALTER TABLE `tbl_sanitation1`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_sanitation2`
--
ALTER TABLE `tbl_sanitation2`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_vcf_basic_info`
--
ALTER TABLE `tbl_vcf_basic_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_water`
--
ALTER TABLE `tbl_water`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_water_resources1`
--
ALTER TABLE `tbl_water_resources1`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_water_resources2`
--
ALTER TABLE `tbl_water_resources2`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_resets`
--
ALTER TABLE `user_resets`
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
-- AUTO_INCREMENT for table `key_farm_item`
--
ALTER TABLE `key_farm_item`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `key_livestock`
--
ALTER TABLE `key_livestock`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `key_watershed`
--
ALTER TABLE `key_watershed`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `key_water_source`
--
ALTER TABLE `key_water_source`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `lookup_community`
--
ALTER TABLE `lookup_community`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `lookup_health_center`
--
ALTER TABLE `lookup_health_center`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `lookup_latrine_list`
--
ALTER TABLE `lookup_latrine_list`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `lookup_para`
--
ALTER TABLE `lookup_para`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `lookup_training`
--
ALTER TABLE `lookup_training`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `lookup_transportation`
--
ALTER TABLE `lookup_transportation`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `lookup_watershed`
--
ALTER TABLE `lookup_watershed`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_accessibility1`
--
ALTER TABLE `tbl_accessibility1`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_accessibility2`
--
ALTER TABLE `tbl_accessibility2`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_accessibility3`
--
ALTER TABLE `tbl_accessibility3`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_active_watershed`
--
ALTER TABLE `tbl_active_watershed`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_diseases`
--
ALTER TABLE `tbl_diseases`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_economic`
--
ALTER TABLE `tbl_economic`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_expenses`
--
ALTER TABLE `tbl_expenses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_health_services`
--
ALTER TABLE `tbl_health_services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `tbl_household`
--
ALTER TABLE `tbl_household`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tbl_income`
--
ALTER TABLE `tbl_income`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_land`
--
ALTER TABLE `tbl_land`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_latrine_type`
--
ALTER TABLE `tbl_latrine_type`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_literacy`
--
ALTER TABLE `tbl_literacy`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_livelihood`
--
ALTER TABLE `tbl_livelihood`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_livelihood_training`
--
ALTER TABLE `tbl_livelihood_training`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_livestock1`
--
ALTER TABLE `tbl_livestock1`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_livestock2`
--
ALTER TABLE `tbl_livestock2`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_livestock3`
--
ALTER TABLE `tbl_livestock3`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tbl_occupation`
--
ALTER TABLE `tbl_occupation`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tbl_para_basic_info`
--
ALTER TABLE `tbl_para_basic_info`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_para_gps_point`
--
ALTER TABLE `tbl_para_gps_point`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_population`
--
ALTER TABLE `tbl_population`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `tbl_sanitation1`
--
ALTER TABLE `tbl_sanitation1`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `tbl_sanitation2`
--
ALTER TABLE `tbl_sanitation2`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_vcf_basic_info`
--
ALTER TABLE `tbl_vcf_basic_info`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_water`
--
ALTER TABLE `tbl_water`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_water_resources1`
--
ALTER TABLE `tbl_water_resources1`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_water_resources2`
--
ALTER TABLE `tbl_water_resources2`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user_resets`
--
ALTER TABLE `user_resets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
