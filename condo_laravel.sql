-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 29, 2020 at 08:36 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `condo_laravel`
--

-- --------------------------------------------------------

--
-- Table structure for table `buildings`
--

CREATE TABLE `buildings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'ชื่อ',
  `detail` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'รายละเอียด',
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'ที่อยู่',
  `amphur` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'อำเภอ',
  `district` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'ตำบล',
  `province` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'จังหวัด',
  `postcode` int(11) NOT NULL COMMENT 'รหัสไปรษณีย์',
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'เบอร์โทรศัพท์',
  `juristic_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `buildings`
--

INSERT INTO `buildings` (`id`, `name`, `detail`, `address`, `amphur`, `district`, `province`, `postcode`, `phone`, `juristic_id`, `created_at`, `updated_at`) VALUES
(1, 'ตึกเกษมสำราญ', 'ตึกขนาดใหญ่ สูง 7 ชั้น', 'เลขที่ 6 หมู่ที่ 66', 'เมือง', 'เมือง', 'นครปฐม', 1150, '0255555555', 1, '2020-06-23 03:05:07', '2020-06-23 03:32:09');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `contact_no` bigint(20) NOT NULL DEFAULT 0 COMMENT 'เลขที่สัญญา',
  `create_date` date NOT NULL COMMENT 'วันเริ่มทำสัญญา',
  `end_date` date NOT NULL COMMENT 'วันที่สิ้นสุดสัญญา',
  `price` double(22,2) NOT NULL COMMENT 'ราคาห้อง',
  `earnest` double(22,2) NOT NULL COMMENT 'ค่ามัดจำ',
  `status` int(11) NOT NULL COMMENT 'สถานะสัญญา 1 รออนุมัติ , 2 อนุมัติ',
  `confirm_at` date NOT NULL COMMENT 'วันที่ทำสัญญา',
  `cancel_at` date DEFAULT NULL COMMENT 'วันที่ยกเลิกสัญญา',
  `room_id` bigint(20) UNSIGNED NOT NULL COMMENT 'ไอดีห้อง',
  `type_id` bigint(20) UNSIGNED NOT NULL COMMENT 'ประเภทสัญญา 1 = เช่า , 2 = ขาย',
  `customer_id` bigint(20) UNSIGNED NOT NULL COMMENT 'รหัสลูกค้า',
  `user_id` bigint(20) UNSIGNED NOT NULL COMMENT 'รหัสพนักงาน',
  `building_id` bigint(20) UNSIGNED NOT NULL COMMENT 'รหัสตึก',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `contact_no`, `create_date`, `end_date`, `price`, `earnest`, `status`, `confirm_at`, `cancel_at`, `room_id`, `type_id`, `customer_id`, `user_id`, `building_id`, `created_at`, `updated_at`) VALUES
(1, 260620200000, '2020-06-26', '2021-06-26', 7500.00, 7500.00, 1, '2020-06-26', NULL, 1, 1, 2, 1, 1, '2020-06-25 23:16:33', '2020-06-25 23:16:33'),
(2, 260620200001, '2020-06-26', '2021-06-26', 7500.00, 7500.00, 1, '2020-06-26', NULL, 1, 1, 2, 1, 1, '2020-06-25 23:19:07', '2020-06-25 23:19:07'),
(3, 260620200002, '2020-06-26', '2020-06-27', 500.00, 1000.00, 1, '2020-06-26', NULL, 2, 1, 2, 1, 1, '2020-06-25 23:27:09', '2020-06-25 23:27:09');

-- --------------------------------------------------------

--
-- Table structure for table `contact_types`
--

CREATE TABLE `contact_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'อักษรนำหน้าเลขสัญญา',
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'รายละเอียด',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contact_types`
--

INSERT INTO `contact_types` (`id`, `title`, `description`, `created_at`, `updated_at`) VALUES
(1, 'R', 'เช่า', '2020-06-24 21:57:02', '2020-06-24 21:57:02'),
(2, 'B', 'ซื้อ / ขาย', '2020-06-24 21:57:32', '2020-06-24 21:57:32');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `firstname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'ชื่อ',
  `lastname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'นามสกุล',
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'ที่อยู่',
  `aumphur` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'อำเภอ',
  `district` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'ตำบล',
  `province` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'จังหวัด',
  `postcode` int(11) NOT NULL COMMENT 'รหัสไปรณีย์',
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'เบอร์โทรศัพท์',
  `birthdate` date NOT NULL COMMENT 'วันเกิด',
  `idcard` bigint(20) NOT NULL DEFAULT 0 COMMENT 'รหัสบัตรประชาชน',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `firstname`, `lastname`, `address`, `aumphur`, `district`, `province`, `postcode`, `phone`, `birthdate`, `idcard`, `created_at`, `updated_at`) VALUES
(1, 'ลูกค้า', 'คนแรก', 'เลขที่ 6 หมู่ที่ 66', 'เมือง', 'เมือง', 'นครปฐม', 73120, '0211111111', '2020-06-17', 1234567891011, '2020-06-24 00:30:03', '2020-06-24 01:49:31'),
(2, 'เจ้าหญิง', 'อาราเร่', 'บ้านเลขที่ 555', 'เมือง', 'เมือง', 'สมุทรปราการ', 10270, '0245678978', '2020-06-01', 1354649879876, '2020-06-25 00:43:28', '2020-06-25 00:43:28');

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
-- Table structure for table `juristics`
--

CREATE TABLE `juristics` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'ชื่อ',
  `lastname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'นามสกุล',
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'ที่อยู่',
  `aumphur` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'อำเภอ',
  `district` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'ตำบล',
  `province` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'จังหวัด',
  `postcode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'รหัสไปรณีย์',
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'เบอร์โทรศัพท์',
  `birthdate` date NOT NULL COMMENT 'วันเกิด',
  `idcard` bigint(13) NOT NULL DEFAULT 0 COMMENT 'รหัสบัตรประชาชน',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `juristics`
--

INSERT INTO `juristics` (`id`, `name`, `lastname`, `address`, `aumphur`, `district`, `province`, `postcode`, `phone`, `birthdate`, `idcard`, `created_at`, `updated_at`) VALUES
(1, 'นิติ', 'คนแรก', 'บ้านเลขที่ 11 หมู่ที่ 11', 'เมือง', 'บางเมือง', 'ขอนแก่น', '40240', '0812345678', '2020-06-01', 6463131312312, '2020-06-22 03:15:26', '2020-06-22 03:15:26');

-- --------------------------------------------------------

--
-- Table structure for table `meter_logs`
--

CREATE TABLE `meter_logs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'หมายเหตุ',
  `meter_current` int(11) NOT NULL COMMENT 'เลขมิเตอร์ปัจจุบัน',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `meter_logs`
--

INSERT INTO `meter_logs` (`id`, `description`, `meter_current`, `created_at`, `updated_at`) VALUES
(1, 'ห้อง101', 0, '2020-06-23 23:22:46', '2020-06-23 23:22:46'),
(2, 'ห้อง102', 0, '2020-06-23 23:37:25', '2020-06-23 23:37:25'),
(3, 'ห้อง103', 0, '2020-06-23 23:37:49', '2020-06-23 23:37:49'),
(4, 'ห้อง104', 0, '2020-06-23 23:38:00', '2020-06-23 23:38:00'),
(5, 'ห้อง105', 0, '2020-06-23 23:38:08', '2020-06-23 23:38:08'),
(6, 'ห้อง201', 0, '2020-06-23 23:38:20', '2020-06-23 23:38:20'),
(7, 'ห้อง202', 0, '2020-06-23 23:38:31', '2020-06-23 23:38:31'),
(8, 'ห้อง203', 0, '2020-06-23 23:38:38', '2020-06-23 23:38:38'),
(9, 'ห้อง204', 0, '2020-06-23 23:39:09', '2020-06-23 23:39:09'),
(10, 'ห้อง205', 0, '2020-06-23 23:39:17', '2020-06-23 23:39:17'),
(11, 'ห้อง301', 0, '2020-06-23 23:39:23', '2020-06-23 23:39:23'),
(12, 'ห้อง302', 0, '2020-06-23 23:39:32', '2020-06-23 23:39:32'),
(13, 'ห้อง303', 0, '2020-06-23 23:39:40', '2020-06-23 23:39:40'),
(14, 'ห้อง304', 0, '2020-06-23 23:39:47', '2020-06-23 23:39:47'),
(15, 'ห้อง305', 0, '2020-06-23 23:39:57', '2020-06-23 23:39:57');

-- --------------------------------------------------------

--
-- Table structure for table `meter_log_details`
--

CREATE TABLE `meter_log_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `old_number` int(11) NOT NULL COMMENT 'เลขน้ำครั้งเก่า',
  `new_number` int(11) NOT NULL COMMENT 'เลขน้ำครั้งใหม่',
  `date_check` date NOT NULL COMMENT 'วันที่ทำการเช็ค',
  `price_water` double(8,2) NOT NULL COMMENT 'ค่าน้ำ',
  `month` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'เดือน',
  `year` int(11) NOT NULL COMMENT 'ปี',
  `meter_log_id` bigint(20) UNSIGNED NOT NULL COMMENT 'รหัสมิเตอร์น้ำ',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2019_08_19_000000_create_failed_jobs_table', 1),
(3, '2020_06_18_084245_create_many_table', 1),
(4, '2020_06_18_085315_create_foreignkey_table', 1),
(5, '2014_10_12_100000_create_password_resets_table', 2),
(6, '2020_06_23_070216_add_column_users', 2);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `total_price` double(22,2) NOT NULL COMMENT 'จำนวนเงินรวม',
  `order_date` date NOT NULL COMMENT 'วันที่ออกบิล',
  `status` int(11) NOT NULL COMMENT 'สถานะ 0 คือยังไม่ชำระ , 1 คือชำระแล้ว',
  `payment_at` date DEFAULT NULL COMMENT 'วันที่ชำระ',
  `month` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'เดือน',
  `year` int(11) NOT NULL COMMENT 'ปี',
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'หมายเหตุ',
  `room_id` bigint(20) UNSIGNED NOT NULL COMMENT 'รหัสห้อง',
  `customer_id` bigint(20) UNSIGNED NOT NULL COMMENT 'รหัสลูกค้า',
  `juristic_id` bigint(20) UNSIGNED NOT NULL COMMENT 'รหัสนิติบุคคล',
  `user_id` bigint(20) UNSIGNED NOT NULL COMMENT 'รหัสพนักงาน',
  `meter_log_id` bigint(20) UNSIGNED NOT NULL COMMENT 'รหัสมิเตอร์น้ำ',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `total_price`, `order_date`, `status`, `payment_at`, `month`, `year`, `description`, `room_id`, `customer_id`, `juristic_id`, `user_id`, `meter_log_id`, `created_at`, `updated_at`) VALUES
(1, 15000.00, '2020-06-26', 0, NULL, 'June', 2020, NULL, 1, 2, 1, 1, 1, '2020-06-25 23:16:33', '2020-06-25 23:16:33'),
(2, 15000.00, '2020-06-26', 0, NULL, 'June', 2020, NULL, 1, 2, 1, 1, 1, '2020-06-25 23:19:07', '2020-06-25 23:19:07'),
(3, 1500.00, '2020-06-26', 0, NULL, 'June', 2020, NULL, 2, 2, 1, 1, 2, '2020-06-25 23:27:10', '2020-06-25 23:27:10');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `amount` double(22,0) NOT NULL COMMENT 'จำนวน',
  `price` double(22,2) NOT NULL COMMENT 'จำนวนเงิน',
  `total` double(22,2) NOT NULL COMMENT 'รวมเป็นเงิน',
  `service_id` bigint(20) UNSIGNED NOT NULL COMMENT 'รหัสค่าบริการ',
  `order_id` bigint(20) UNSIGNED NOT NULL COMMENT 'รหัสบิล',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `amount`, `price`, `total`, `service_id`, `order_id`, `created_at`, `updated_at`) VALUES
(1, 1, 500.00, 500.00, 1, 3, '2020-06-25 23:27:10', '2020-06-25 23:27:10'),
(2, 1, 1000.00, 1000.00, 4, 3, '2020-06-25 23:27:10', '2020-06-25 23:27:10');

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
-- Table structure for table `repairs`
--

CREATE TABLE `repairs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `detail` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'รายละเอียด',
  `price` double(22,2) NOT NULL COMMENT 'ราคา',
  `date_call` date NOT NULL COMMENT 'วันที่แจ้ง',
  `date_do` date NOT NULL COMMENT 'วันที่ทำการซ่อม',
  `month` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'เดือน',
  `year` int(11) NOT NULL COMMENT 'ปี',
  `service_id` bigint(20) UNSIGNED NOT NULL COMMENT 'รหัสบริการ',
  `room_id` bigint(20) UNSIGNED NOT NULL COMMENT 'รหัสห้อง',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` int(11) NOT NULL COMMENT 'เลขห้อง',
  `floor` int(11) NOT NULL COMMENT 'ชั้น',
  `water_price` int(11) NOT NULL COMMENT 'ราคาค่าน้ำ',
  `building_id` bigint(20) UNSIGNED DEFAULT NULL COMMENT 'รหัสตึก',
  `customer_id` bigint(20) UNSIGNED DEFAULT NULL COMMENT 'รหัสลูกค้า',
  `meter_log_id` bigint(20) UNSIGNED DEFAULT NULL COMMENT 'รหัสมิเตอร์น้ำ',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `name`, `floor`, `water_price`, `building_id`, `customer_id`, `meter_log_id`, `created_at`, `updated_at`) VALUES
(1, 101, 1, 12, 1, 2, 1, '2020-06-23 23:29:52', '2020-06-25 23:16:33'),
(2, 102, 1, 12, 1, 2, 2, '2020-06-23 23:37:26', '2020-06-25 23:27:10'),
(3, 103, 1, 12, 1, NULL, 3, '2020-06-23 23:37:49', '2020-06-23 23:37:49'),
(4, 104, 1, 12, 1, NULL, 4, '2020-06-23 23:38:01', '2020-06-23 23:38:01'),
(5, 105, 1, 12, 1, NULL, 5, '2020-06-23 23:38:08', '2020-06-23 23:38:08'),
(6, 201, 2, 12, 1, NULL, 6, '2020-06-23 23:38:20', '2020-06-23 23:38:20'),
(7, 202, 2, 12, 1, NULL, 7, '2020-06-23 23:38:31', '2020-06-23 23:38:31'),
(8, 203, 2, 12, 1, NULL, 8, '2020-06-23 23:38:38', '2020-06-23 23:38:38'),
(9, 204, 2, 12, 1, NULL, 9, '2020-06-23 23:39:09', '2020-06-23 23:39:09'),
(10, 205, 2, 12, 1, NULL, 10, '2020-06-23 23:39:17', '2020-06-23 23:39:17'),
(11, 301, 3, 12, 1, NULL, 11, '2020-06-23 23:39:23', '2020-06-23 23:39:23'),
(12, 302, 3, 12, 1, NULL, 12, '2020-06-23 23:39:32', '2020-06-23 23:39:32'),
(13, 303, 3, 12, 1, NULL, 13, '2020-06-23 23:39:40', '2020-06-23 23:39:40'),
(14, 304, 3, 12, 1, NULL, 14, '2020-06-23 23:39:47', '2020-06-23 23:39:47'),
(15, 305, 3, 12, 1, NULL, 15, '2020-06-23 23:39:57', '2020-06-23 23:39:57');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'ชื่อบริการ',
  `unit` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'หน่วยนับ',
  `price` double(8,2) DEFAULT NULL COMMENT 'ราคา',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `name`, `unit`, `price`, `created_at`, `updated_at`) VALUES
(1, 'ค่าเช่า', 'เดือน', NULL, '2020-06-22 01:21:46', '2020-06-22 01:21:46'),
(2, 'ค่าน้ำประปา', 'หน่วย', NULL, '2020-06-22 01:22:55', '2020-06-22 01:22:55'),
(3, 'ค่าซื้อขายห้อง', '-', NULL, '2020-06-22 01:23:31', '2020-06-22 01:23:31'),
(4, 'ค่ามัดจำ', '-', NULL, '2020-06-22 01:25:11', '2020-06-22 01:25:11'),
(5, 'ซ่อมบำรุง', '-', NULL, '2020-06-22 01:25:28', '2020-06-22 01:25:28'),
(6, 'ซักรีด', '-', NULL, '2020-06-22 01:25:40', '2020-06-22 01:25:40'),
(7, 'ล้างรถ', '-', NULL, '2020-06-22 01:25:52', '2020-06-22 01:25:52'),
(8, 'กุญแจ / คีย์การ์ด', '-', NULL, '2020-06-22 01:26:05', '2020-06-22 01:26:05');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `lastname`, `email`, `email_verified_at`, `username`, `password`, `level`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'หัวหน้า', 'ห้าหนัว', 'crazyPower@gmail.com', NULL, 'admin', '$2y$10$a8rMBFdNy2v/5A.tI3aKnebJpu2WoVSWj8nw0wTHupNSmVcfQC/ai', 'Admin', NULL, '2020-06-23 00:15:13', '2020-06-23 01:30:54'),
(2, 'พนักงาน', 'พนักงานคนแรก', 'Employee@gmail.com', NULL, 'employee', '$2y$10$Vz6/BmoHDtoSApoLf/Meuu5Bjfa9Bt3n2c02lFKajW0HDhLzYalGa', 'Employee', NULL, '2020-06-23 01:52:31', '2020-06-23 01:52:52'),
(3, 'พนักงาน', 'คนที่สอง', 'Song@gmail.com', NULL, 'SongSong', '$2y$10$.xkYiAuI1oTqgJlzTBZhW.kgKf.PoigewFHgxc52t/9ggs.5ZUnwy', 'Employee', NULL, '2020-06-23 01:54:05', '2020-06-23 01:55:00'),
(4, 'พนักงาน', 'คนที่สาม', 'SamSam@gmail.com', NULL, 'samsam55', '$2y$10$/cUrDkntDZ72rrB3BX5wSONnTFrSf3g6olD6DAY2tTMULapAYiOlO', 'Employee', NULL, '2020-06-23 01:55:23', '2020-06-23 04:17:41');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buildings`
--
ALTER TABLE `buildings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `buildings_juristic_id_foreign` (`juristic_id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `contacts_room_id_foreign` (`room_id`),
  ADD KEY `contacts_type_id_foreign` (`type_id`),
  ADD KEY `contacts_customer_id_foreign` (`customer_id`),
  ADD KEY `contacts_user_id_foreign` (`user_id`),
  ADD KEY `contacts_building_id_foreign` (`building_id`);

--
-- Indexes for table `contact_types`
--
ALTER TABLE `contact_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `juristics`
--
ALTER TABLE `juristics`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `meter_logs`
--
ALTER TABLE `meter_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `meter_log_details`
--
ALTER TABLE `meter_log_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `meter_log_details_meter_log_id_foreign` (`meter_log_id`);

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
  ADD KEY `orders_room_id_foreign` (`room_id`),
  ADD KEY `orders_customer_id_foreign` (`customer_id`),
  ADD KEY `orders_juristic_id_foreign` (`juristic_id`),
  ADD KEY `orders_user_id_foreign` (`user_id`),
  ADD KEY `orders_meter_log_id_foreign` (`meter_log_id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_details_service_id_foreign` (`service_id`),
  ADD KEY `order_details_order_id_foreign` (`order_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `repairs`
--
ALTER TABLE `repairs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `repairs_service_id_foreign` (`service_id`),
  ADD KEY `repairs_room_id_foreign` (`room_id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rooms_building_id_foreign` (`building_id`),
  ADD KEY `rooms_customer_id_foreign` (`customer_id`),
  ADD KEY `rooms_meter_log_id_foreign` (`meter_log_id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
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
-- AUTO_INCREMENT for table `buildings`
--
ALTER TABLE `buildings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `contact_types`
--
ALTER TABLE `contact_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `juristics`
--
ALTER TABLE `juristics`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `meter_logs`
--
ALTER TABLE `meter_logs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `meter_log_details`
--
ALTER TABLE `meter_log_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `repairs`
--
ALTER TABLE `repairs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `buildings`
--
ALTER TABLE `buildings`
  ADD CONSTRAINT `buildings_juristic_id_foreign` FOREIGN KEY (`juristic_id`) REFERENCES `juristics` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `contacts`
--
ALTER TABLE `contacts`
  ADD CONSTRAINT `contacts_building_id_foreign` FOREIGN KEY (`building_id`) REFERENCES `buildings` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `contacts_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `contacts_room_id_foreign` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `contacts_type_id_foreign` FOREIGN KEY (`type_id`) REFERENCES `contact_types` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `contacts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `meter_log_details`
--
ALTER TABLE `meter_log_details`
  ADD CONSTRAINT `meter_log_details_meter_log_id_foreign` FOREIGN KEY (`meter_log_id`) REFERENCES `meter_logs` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `orders_juristic_id_foreign` FOREIGN KEY (`juristic_id`) REFERENCES `juristics` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `orders_meter_log_id_foreign` FOREIGN KEY (`meter_log_id`) REFERENCES `meter_logs` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `orders_room_id_foreign` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_details_service_id_foreign` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `repairs`
--
ALTER TABLE `repairs`
  ADD CONSTRAINT `repairs_room_id_foreign` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `repairs_service_id_foreign` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `rooms`
--
ALTER TABLE `rooms`
  ADD CONSTRAINT `rooms_building_id_foreign` FOREIGN KEY (`building_id`) REFERENCES `buildings` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `rooms_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `rooms_meter_log_id_foreign` FOREIGN KEY (`meter_log_id`) REFERENCES `meter_logs` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
