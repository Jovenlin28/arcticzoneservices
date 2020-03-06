-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 06, 2020 at 01:37 PM
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
-- Database: `articzone`
--

-- --------------------------------------------------------

--
-- Table structure for table `appliances`
--

CREATE TABLE `appliances` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL,
  `fee` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `appliances`
--

INSERT INTO `appliances` (`id`, `name`, `image`, `created_at`, `updated_at`, `deleted_at`, `fee`) VALUES
(12, 'Window', '1581989861-Window.png', '2020-02-17 17:41:57', '2020-02-18 01:37:41', NULL, NULL),
(13, 'Cassette', '1581961584.png', '2020-02-17 17:46:24', '2020-02-17 17:46:24', NULL, NULL),
(14, 'Tower', '1581961629.png', '2020-02-17 17:47:10', '2020-02-17 17:47:10', NULL, NULL),
(15, 'Split', '1581961678.png', '2020-02-17 17:47:58', '2020-02-17 17:47:58', NULL, NULL),
(16, 'Suspended', '1581961731.png', '2020-02-17 17:48:51', '2020-02-17 17:48:51', NULL, NULL),
(17, 'Concealed', '1581989941-Concealed.png', '2020-02-17 17:50:33', '2020-02-18 01:39:01', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `bank_details`
--

CREATE TABLE `bank_details` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `number` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bank_details`
--

INSERT INTO `bank_details` (`id`, `name`, `number`, `created_at`, `updated_at`) VALUES
(3, 'ARCTIC ZONE THERMO SOLUTIONS INC.', '0793-3330-00', '2020-01-18 02:20:15', '2020-02-18 15:56:27');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Samsung', '2019-11-29 09:17:04', NULL, NULL),
(2, 'Panasonic', '2020-02-07 01:53:24', NULL, NULL),
(3, 'Diakin', '2020-02-07 01:53:48', NULL, NULL),
(4, 'Asahi', '2020-02-11 16:46:33', NULL, NULL),
(5, 'Camel', '2020-02-11 16:46:33', NULL, NULL),
(6, 'Carrier', '2020-02-11 16:46:33', NULL, NULL),
(7, 'Coldfront', '2020-02-11 16:46:33', NULL, NULL),
(8, 'Condura', '2020-02-11 16:46:33', NULL, NULL),
(9, 'Daikin', '2020-02-11 16:46:33', NULL, NULL),
(10, 'Everest', '2020-02-11 16:46:33', NULL, NULL),
(11, 'Fujidenzo', '2020-02-11 16:46:33', NULL, NULL),
(12, 'Haier', '2020-02-11 16:46:33', NULL, NULL),
(13, 'Hitachi', '2020-02-11 16:46:33', NULL, NULL),
(14, 'Kelvinator', '2020-02-11 16:46:33', NULL, NULL),
(15, 'Kolin', '2020-02-11 16:46:33', NULL, NULL),
(16, 'Koppel', '2020-02-11 16:46:33', NULL, NULL),
(17, 'LG', '2020-02-11 16:46:33', NULL, NULL),
(18, 'Midea', '2020-02-11 16:46:33', NULL, NULL),
(19, 'Mitsubishi', '2020-02-11 16:46:33', NULL, NULL),
(20, 'Sharp', '2020-02-11 16:46:33', NULL, NULL),
(21, 'TCL', '2020-02-11 16:46:33', NULL, NULL),
(22, 'Union', '2020-02-11 16:46:33', NULL, NULL),
(23, 'Xtreme', '2020-02-11 16:46:33', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `client_contact_person`
--

CREATE TABLE `client_contact_person` (
  `id` int(11) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `contact_number` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `client_contact_person`
--

INSERT INTO `client_contact_person` (`id`, `firstname`, `lastname`, `contact_number`, `email`, `address`, `created_at`, `updated_at`) VALUES
(4, 'Reymark', 'Alvarez', '09168859503', 'reymart.boyo@gmail.com', 'Sta Ana Manila', '2020-02-20 03:58:33', '2020-02-20 03:58:33'),
(5, 'John', 'Doe', '09168840234', 'johndoe@gmail.com', 'refdsfsdf', '2020-02-20 13:14:55', '2020-02-20 13:14:55'),
(6, 'Jane', 'Doe', '09168859111', 'janedoe@gmail.com', 'dasdsa', '2020-02-20 13:50:38', '2020-02-20 13:50:38');

-- --------------------------------------------------------

--
-- Table structure for table `configurations`
--

CREATE TABLE `configurations` (
  `max_tech_assigned` int(2) NOT NULL DEFAULT 0,
  `max_service_request_daily` int(6) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `configurations`
--

INSERT INTO `configurations` (`max_tech_assigned`, `max_service_request_daily`) VALUES
(2, 6);

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
-- Table structure for table `horse_power`
--

CREATE TABLE `horse_power` (
  `id` int(11) UNSIGNED NOT NULL,
  `hp` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `horse_power`
--

INSERT INTO `horse_power` (`id`, `hp`, `created_at`, `updated_at`) VALUES
(1, '3.0', '2020-03-06 00:31:37', '2020-03-06 00:42:51');

-- --------------------------------------------------------

--
-- Table structure for table `horse_power_fees`
--

CREATE TABLE `horse_power_fees` (
  `id` int(10) UNSIGNED NOT NULL,
  `fee` float NOT NULL,
  `hp_id` int(10) UNSIGNED NOT NULL,
  `appliance_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `horse_power_fees`
--

INSERT INTO `horse_power_fees` (`id`, `fee`, `hp_id`, `appliance_id`, `created_at`, `updated_at`) VALUES
(1, 600, 1, 13, '2020-03-06 01:21:20', '2020-03-06 01:31:40');

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE `locations` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Quezon City', '2019-11-29 09:17:42', NULL, NULL),
(2, 'Makati City', '2020-02-07 14:18:20', NULL, NULL),
(3, 'Mandaluyong', '2020-02-07 14:18:20', NULL, NULL),
(4, 'Bonifacio Global City', '2020-02-11 04:50:29', NULL, NULL),
(5, 'Pasay City', '2020-02-11 04:50:29', NULL, NULL),
(6, 'Taguig City', '2020-02-11 04:53:38', NULL, NULL),
(7, 'Malabon City', '2020-02-11 04:53:38', NULL, NULL),
(8, 'Valenzuela City', '2020-02-11 04:53:38', NULL, NULL),
(9, 'Caloocan City', '2020-02-11 04:53:38', NULL, NULL),
(10, 'Marikina City', '2020-02-11 04:53:38', NULL, NULL),
(11, 'San Juan City', '2020-02-11 04:53:38', NULL, NULL),
(12, 'Pateros City', '2020-02-11 04:53:38', NULL, NULL),
(13, 'Pasig City', '2020-02-11 04:53:38', NULL, NULL),
(14, 'Las Pinas City', '2020-02-11 04:53:38', NULL, NULL),
(15, 'Paranaque City', '2020-02-11 04:53:38', NULL, NULL),
(16, 'Muntinlupa City', '2020-02-11 04:53:38', NULL, NULL),
(17, 'Manila City', '2020-02-11 04:54:40', NULL, NULL);

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
(1, '2014_10_12_100000_create_password_resets_table', 1),
(2, '2019_08_19_000000_create_failed_jobs_table', 1),
(3, '2018_08_08_100000_create_telescope_entries_table', 2),
(4, '2019_12_27_223934_create_notifications_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_id` bigint(20) UNSIGNED NOT NULL,
  `data` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
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

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('jp.pacinos@gmail.com', '$2y$10$E4igrIRxD46FjIxEqtkbj.qZAv8mf5i4cVFVPUDEXiFLYlTIQVMSO', '2019-12-28 14:31:45');

-- --------------------------------------------------------

--
-- Table structure for table `payments_offline`
--

CREATE TABLE `payments_offline` (
  `id` int(11) NOT NULL,
  `service_request_id` int(11) NOT NULL,
  `amount_collected` int(11) NOT NULL,
  `currency` varchar(11) NOT NULL DEFAULT 'PHP',
  `payment_method_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payments_offline`
--

INSERT INTO `payments_offline` (`id`, `service_request_id`, `amount_collected`, `currency`, `payment_method_id`, `created_at`, `updated_at`) VALUES
(1, 3, 600, 'PHP', 2, '2019-12-17 07:56:16', '2019-12-17 07:56:16'),
(2, 2, 500, 'PHP', 1, '2019-12-17 07:56:16', '2019-12-17 07:56:16'),
(3, 3, 400, 'PHP', 1, '2019-12-17 07:56:16', '2019-12-17 07:56:16');

-- --------------------------------------------------------

--
-- Table structure for table `payments_online`
--

CREATE TABLE `payments_online` (
  `id` int(11) NOT NULL,
  `service_request_id` int(11) DEFAULT NULL,
  `checkout_id` varchar(50) DEFAULT NULL,
  `payment_status` varchar(50) DEFAULT NULL,
  `card_type` varchar(50) DEFAULT NULL,
  `action_status` varchar(50) DEFAULT NULL,
  `transaction_reference_number` varchar(50) DEFAULT NULL,
  `amount_collected` varchar(15) DEFAULT NULL,
  `currency` varchar(10) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `payment_method`
--

CREATE TABLE `payment_method` (
  `id` int(11) NOT NULL,
  `name` varchar(500) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment_method`
--

INSERT INTO `payment_method` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Cash', '2019-11-29 10:49:59', NULL),
(2, 'LandBank', '2019-12-17 08:00:02', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `payment_mode`
--

CREATE TABLE `payment_mode` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment_mode`
--

INSERT INTO `payment_mode` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Full Payment', '2020-01-17 22:54:10', NULL),
(2, 'Half Payment', '2020-01-17 23:10:07', '2020-01-17 23:10:07');

-- --------------------------------------------------------

--
-- Table structure for table `property_types`
--

CREATE TABLE `property_types` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `property_types`
--

INSERT INTO `property_types` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Household', '2019-11-29 09:17:58', NULL, NULL),
(3, 'Company', '2020-02-22 02:28:21', '2020-02-22 02:28:21', NULL),
(5, 'School', '2020-02-22 02:31:10', '2020-02-22 02:31:10', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `remarks`
--

CREATE TABLE `remarks` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `service_request_id` int(11) NOT NULL,
  `technician_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `remarks`
--

INSERT INTO `remarks` (`id`, `name`, `service_request_id`, `technician_id`, `created_at`, `updated_at`) VALUES
(8, 'Easyyyyy!!', 59, 23, '2020-02-21 15:06:11', '2020-02-21 15:06:11'),
(9, 'SAMPLE', 59, 24, '2020-02-21 15:08:09', '2020-02-21 15:08:09'),
(10, 'Hello', 61, 24, '2020-03-04 23:39:47', '2020-03-04 23:39:47');

-- --------------------------------------------------------

--
-- Table structure for table `service_fees`
--

CREATE TABLE `service_fees` (
  `id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL,
  `appliance_id` int(11) NOT NULL,
  `fee` float NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `service_fees`
--

INSERT INTO `service_fees` (`id`, `service_id`, `appliance_id`, `fee`, `created_at`, `updated_at`) VALUES
(21, 1, 12, 650, '2020-02-20 00:20:11', NULL),
(22, 1, 15, 1250, '2020-02-20 00:20:11', NULL),
(23, 1, 14, 1950, '2020-02-20 00:20:11', NULL),
(24, 1, 13, 2850, '2020-02-20 00:20:11', NULL),
(25, 1, 16, 2850, '2020-02-20 00:20:11', NULL),
(26, 1, 17, 2250, '2020-02-20 00:20:11', NULL),
(27, 21, 12, 650, '2020-02-20 00:20:11', NULL),
(28, 21, 15, 1250, '2020-02-20 00:20:11', NULL),
(29, 22, 12, 650, '2020-02-20 14:40:12', '2020-02-20 14:40:12');

-- --------------------------------------------------------

--
-- Table structure for table `service_requests`
--

CREATE TABLE `service_requests` (
  `id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `service_type_id` int(11) NOT NULL,
  `location_id` int(11) NOT NULL,
  `property_id` int(11) NOT NULL,
  `timeslot_id` int(11) NOT NULL,
  `service_date` date DEFAULT NULL,
  `service_date_previous` date DEFAULT NULL COMMENT 'means, this is resched service',
  `service_address` varchar(255) DEFAULT NULL,
  `problem_desc` text DEFAULT NULL COMMENT 'client comments',
  `validated_at` timestamp NULL DEFAULT NULL,
  `completed_at` timestamp NULL DEFAULT NULL,
  `canceled_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` varchar(100) NOT NULL,
  `near_landmark` varchar(100) DEFAULT NULL,
  `special_instruction` varchar(55) DEFAULT NULL,
  `payment_mode_id` int(11) NOT NULL,
  `is_paid` tinyint(1) NOT NULL,
  `receipt_payment_file` varchar(255) DEFAULT NULL,
  `client_contact_person_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `service_requests`
--

INSERT INTO `service_requests` (`id`, `client_id`, `service_type_id`, `location_id`, `property_id`, `timeslot_id`, `service_date`, `service_date_previous`, `service_address`, `problem_desc`, `validated_at`, `completed_at`, `canceled_at`, `created_at`, `updated_at`, `status`, `near_landmark`, `special_instruction`, `payment_mode_id`, `is_paid`, `receipt_payment_file`, `client_contact_person_id`) VALUES
(2, 41, 22, 1, 1, 2, '2019-12-16', NULL, '1720 Dahlia St. Purok 17 Barangay Commonwealth Quezon City', NULL, '2020-02-16 18:17:46', NULL, '2020-02-20 06:30:01', '2019-11-29 09:34:55', '2020-02-20 06:30:01', 'cancelled', NULL, NULL, 1, 0, NULL, NULL),
(55, 41, 1, 1, 1, 3, '2020-02-20', NULL, '2508 Pasig Line Sta Ana Manila', NULL, '2020-03-02 06:59:09', '2020-03-03 07:02:36', NULL, '2020-02-19 19:58:32', '2020-03-03 07:02:36', 'completed', NULL, NULL, 1, 1, '1582219971-receipt_sample.png', 4),
(56, 41, 1, 1, 1, 3, '2020-03-28', NULL, 'cscxzc', NULL, '2020-03-03 07:28:00', NULL, NULL, '2020-02-19 19:59:21', '2020-03-03 07:29:07', 'pending', 'cczxcz', 'xcxzcxzcxz', 1, 1, '1583220387-receipt_sample.png', NULL),
(57, 41, 1, 1, 1, 2, '2020-02-28', NULL, NULL, NULL, '2020-03-03 07:31:36', NULL, NULL, '2020-02-20 05:14:55', '2020-03-03 07:31:36', 'new', NULL, NULL, 1, 1, '1583220640-receipt_sample.png', 5),
(58, 41, 1, 1, 1, 3, '2020-02-28', NULL, NULL, NULL, NULL, NULL, NULL, '2020-02-20 05:50:38', '2020-02-20 05:50:38', 'new', NULL, NULL, 1, 0, NULL, 6),
(59, 41, 21, 17, 1, 3, '2020-01-09', NULL, 'Pandacan Manila', NULL, '2020-02-21 06:52:38', '2020-02-21 07:09:07', NULL, '2020-02-21 04:31:57', '2020-02-21 07:09:07', 'completed', 'Puregold', 'Pakibilis lang ah', 1, 1, '1582267816-receipt_sample.png', NULL),
(60, 41, 1, 10, 1, 2, '2020-02-28', NULL, 'Testing Address', NULL, '2020-03-06 05:56:13', NULL, NULL, '2020-02-21 08:26:32', '2020-03-06 05:56:13', 'new', 'Seven Eleven', 'Bilisan mo gumawa ah', 1, 1, '1583474109-receipt_sample.png', NULL),
(61, 47, 1, 13, 1, 2, '2020-02-24', NULL, '1720 Dahlia St. Purok 17 Brgy. Commonwealth Quezon City', NULL, '2020-03-03 07:08:39', NULL, NULL, '2020-02-22 02:02:03', '2020-03-03 07:18:18', 'pending', 'McDonalds', NULL, 2, 1, '1582339863-receipt_sample.png', NULL),
(62, 47, 21, 14, 1, 2, '2020-02-24', NULL, '1720 Dahlia St. Purok 17 Brgy. Commonwealth Quezon City', NULL, NULL, NULL, NULL, '2020-02-22 03:34:21', '2020-02-22 03:34:21', 'new', 'McDonalds', NULL, 2, 0, NULL, NULL),
(63, 47, 1, 1, 1, 1, '2020-02-24', NULL, '1720 Dahlia St. Purok 17 Brgy Commonwealth Quezon City', NULL, NULL, NULL, NULL, '2020-02-22 04:04:29', '2020-02-22 04:20:44', 'new', 'McDonalds', NULL, 1, 0, '1582345244-receipt_sample.png', NULL),
(64, 41, 21, 2, 1, 2, '2020-03-27', NULL, 'Pasig Line St.', NULL, NULL, NULL, NULL, '2020-03-02 15:38:59', '2020-03-06 06:07:41', 'new', 'Mcdo', 'Testtt', 1, 0, NULL, NULL),
(65, 41, 21, 4, 3, 2, '2020-03-31', NULL, 'Pasig Line Sta Ana Manila', NULL, NULL, NULL, NULL, '2020-03-02 15:44:31', '2020-03-02 15:44:31', 'new', 'Mcdo', 'testtt', 1, 0, NULL, NULL),
(66, 41, 21, 2, 3, 1, '2020-03-06', NULL, 'dfgfdgfdhdfhf', NULL, NULL, NULL, NULL, '2020-03-02 15:59:21', '2020-03-02 15:59:21', 'new', 'dsfaasd', 'dsadasdasdas', 1, 0, NULL, NULL),
(67, 41, 21, 3, 5, 2, '2020-03-27', NULL, '2222 Garrido St. Sta Ana Manila', NULL, NULL, NULL, NULL, '2020-03-03 04:56:44', '2020-03-03 04:56:44', 'new', 'Jolibee', 'sffafdfds', 1, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `service_request_appliances`
--

CREATE TABLE `service_request_appliances` (
  `id` int(11) NOT NULL,
  `service_request_id` int(11) DEFAULT NULL,
  `appliance_id` int(11) DEFAULT NULL,
  `brand_id` int(11) DEFAULT NULL,
  `unit_id` int(11) DEFAULT NULL,
  `qty` int(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `service_request_appliances`
--

INSERT INTO `service_request_appliances` (`id`, `service_request_id`, `appliance_id`, `brand_id`, `unit_id`, `qty`) VALUES
(30, 2, 14, 5, 1, 1),
(31, 2, 12, 13, 2, 1),
(42, 55, 12, 1, 1, 1),
(43, 56, 12, 1, 1, 1),
(44, 57, 12, 1, 1, 1),
(45, 57, 13, 4, 2, 1),
(46, 58, 12, 1, 1, 1),
(47, 59, 12, 6, 2, 1),
(48, 59, 15, 3, 1, 1),
(49, 60, 17, 13, 1, 1),
(50, 60, 13, 13, 2, 1),
(51, 61, 13, 19, 2, 1),
(52, 61, 14, 16, 2, 1),
(53, 62, 12, 1, 1, 1),
(54, 62, 15, 20, 2, 1),
(55, 63, 12, 14, 1, 1),
(56, 64, 12, 1, 1, 1),
(57, 64, 15, 3, 1, 1),
(58, 65, 12, 1, 1, 1),
(59, 65, 15, 5, 1, 1),
(60, 66, 12, 1, 2, 1),
(61, 66, 15, 2, 1, 1),
(62, 67, 12, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `service_request_handles`
--

CREATE TABLE `service_request_handles` (
  `id` int(11) NOT NULL,
  `service_request_id` int(11) NOT NULL,
  `tech_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `service_request_handles`
--

INSERT INTO `service_request_handles` (`id`, `service_request_id`, `tech_id`) VALUES
(593, 1, 23),
(604, 1, 24),
(607, 2, 24),
(608, 2, 23),
(611, 55, 24),
(612, 55, 23),
(613, 59, 23),
(614, 59, 24),
(615, 61, 25),
(616, 61, 24),
(617, 56, 25),
(618, 56, 24);

-- --------------------------------------------------------

--
-- Table structure for table `service_request_troubles`
--

CREATE TABLE `service_request_troubles` (
  `id` int(11) NOT NULL,
  `service_request_id` int(11) NOT NULL,
  `trouble_id` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `service_request_troubles`
--

INSERT INTO `service_request_troubles` (`id`, `service_request_id`, `trouble_id`) VALUES
(66, 65, 1),
(67, 65, 8),
(68, 66, 3),
(69, 66, 9),
(70, 67, 4);

-- --------------------------------------------------------

--
-- Table structure for table `service_request_workdone`
--

CREATE TABLE `service_request_workdone` (
  `id` int(11) NOT NULL,
  `service_request_id` int(11) NOT NULL,
  `workdone_id` int(11) NOT NULL,
  `technician_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `service_request_workdone`
--

INSERT INTO `service_request_workdone` (`id`, `service_request_id`, `workdone_id`, `technician_id`) VALUES
(68, 59, 5, 23),
(69, 59, 2, 24);

-- --------------------------------------------------------

--
-- Table structure for table `service_timeslots`
--

CREATE TABLE `service_timeslots` (
  `id` int(11) NOT NULL,
  `start` time DEFAULT NULL,
  `end` time DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `service_timeslots`
--

INSERT INTO `service_timeslots` (`id`, `start`, `end`, `created_at`, `updated_at`) VALUES
(1, '09:00:00', '12:00:00', '2019-11-29 09:58:38', '2020-02-22 03:29:25'),
(2, '12:00:00', '15:00:00', '2019-11-29 09:58:38', NULL),
(3, '15:00:00', '18:00:00', '2019-11-29 09:58:38', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `service_types`
--

CREATE TABLE `service_types` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `service_types`
--

INSERT INTO `service_types` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Cleaning', '2019-11-29 09:19:40', NULL, NULL),
(21, 'Repair', '2020-01-07 10:57:47', '2020-01-07 10:57:47', NULL),
(22, 'Installation', '2020-02-03 07:01:11', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tech_info`
--

CREATE TABLE `tech_info` (
  `id` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `address` varchar(100) DEFAULT NULL,
  `contact_number` varchar(11) NOT NULL,
  `tech_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tech_info`
--

INSERT INTO `tech_info` (`id`, `firstname`, `lastname`, `address`, `contact_number`, `tech_id`, `created_at`, `updated_at`) VALUES
(5, 'Joven', 'Pancho', 'dasdsad', '09168859503', 23, '2020-02-16 01:15:39', '2020-02-16 01:15:39'),
(6, 'John', 'Doe', 'test', '09168859503', 24, '2020-02-17 02:14:01', '2020-02-17 02:14:01'),
(7, 'Jose', 'Pancho', '1720 Dahlia St. Purok 17 Brgy, Commonwealth Quezon City', '09192640851', 25, '2020-02-22 10:43:59', '2020-02-22 10:43:59');

-- --------------------------------------------------------

--
-- Table structure for table `telescope_entries`
--

CREATE TABLE `telescope_entries` (
  `sequence` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `family_hash` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `should_display_on_index` tinyint(1) NOT NULL DEFAULT 1,
  `type` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `telescope_entries_tags`
--

CREATE TABLE `telescope_entries_tags` (
  `entry_uuid` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tag` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `telescope_monitoring`
--

CREATE TABLE `telescope_monitoring` (
  `tag` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `troubles`
--

CREATE TABLE `troubles` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `troubles`
--

INSERT INTO `troubles` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Does not start or loop', '2019-12-17 08:26:10', '2020-02-22 03:18:05', NULL),
(3, 'Not cooling or fan blowing warm or hot air', '2019-12-17 08:26:10', '2020-02-22 03:18:31', NULL),
(4, 'Fan is not blowing air at all', '2019-12-17 08:26:10', '2020-02-22 03:18:49', NULL),
(5, 'Making noise', '2019-12-17 08:26:10', '2020-02-22 03:19:00', NULL),
(7, 'Leaking water', '2020-02-22 03:19:14', '2020-02-22 03:19:14', NULL),
(8, 'Coils freezing', '2020-02-22 03:21:07', '2020-02-22 03:21:07', NULL),
(9, 'Remote control not working', '2020-02-22 03:24:37', '2020-02-22 03:24:37', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `units`
--

CREATE TABLE `units` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `fee` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `units`
--

INSERT INTO `units` (`id`, `name`, `fee`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Non-inverter', '600', '2019-11-29 09:20:44', '2020-02-17 16:42:07', NULL),
(2, 'Inverter', '200', '2019-11-29 09:20:44', '2020-02-11 05:21:25', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(255) DEFAULT NULL,
  `client_id` int(11) NOT NULL,
  `avatar` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `created_at`, `updated_at`, `deleted_at`, `remember_token`, `client_id`, `avatar`) VALUES
(2, 'user1@email.com', '$2y$10$6wMLBPCmPe77sP3Q0z35SenjhPKzGK4.KKVdG5S6aENal/voBUjHy', '2020-02-03 15:23:56', '2020-02-05 14:43:00', NULL, 'dSo5w4AcJcLrbRio4wEOLNKFPII183gmRYzoQjpKW9sO6jOTK0IIpH1NHg47', 1, NULL),
(19, 'joven.pancho@ffuf.de', '$2y$10$9m9rSozaPgQZj1th4Zxbo.dnWhxd8H0a3vszagalrbf4LV.akHTJ2', '2020-02-05 22:38:15', '2020-02-17 13:56:45', NULL, 'aIYIXMaL4T2LNJD0pMsGIduLMyUv8mZrf5YWekyBNfUu8LxxLfSrcHy2VMpF', 41, '1581947805.jpg'),
(24, 'jovenlin28@gmail.com', '$2y$10$m0ZEn.fuW0sOVNc3pBCVlenPNMSn0qyrllQw7qX7dvhQSvK0w7nBS', '2020-02-17 04:51:24', '2020-02-17 04:51:24', NULL, NULL, 46, NULL),
(25, 'luxius23@gmail.com', '$2y$10$dmjpv0EMaOH1mwZczNEgnezJQGxmNMbsfqpkUIkV0MBEp0Yqp1Eri', '2020-02-22 01:45:54', '2020-02-22 02:26:34', NULL, 'GMXU98UMn3j86Evx8ADcpNhaA1z2v5IBaycsRjMIOFM2cOtkMEN9k7vkBAGP', 47, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users_admin`
--

CREATE TABLE `users_admin` (
  `id` int(11) NOT NULL,
  `users_id` int(11) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(191) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users_admin`
--

INSERT INTO `users_admin` (`id`, `users_id`, `username`, `password`, `created_at`, `updated_at`, `deleted_at`, `remember_token`) VALUES
(1, 3, 'admin', '$2y$10$t2mr.KAgIofaLCI3L1U7MuuBWBpUbItgRil1f.Psqs9kwgKMPUNWq', '2019-11-29 09:04:41', '2020-02-29 01:38:19', NULL, 'lTKTv6SjisPqVoOcwwk6YnmmduMqzjHY0mcx0VpwySiaZkClMwjaBc5YRpZp');

-- --------------------------------------------------------

--
-- Table structure for table `users_client`
--

CREATE TABLE `users_client` (
  `id` int(11) NOT NULL,
  `firstname` varchar(255) DEFAULT NULL,
  `middlename` varchar(255) DEFAULT NULL,
  `lastname` varchar(255) DEFAULT NULL,
  `contact_number` varchar(11) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `verified_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users_client`
--

INSERT INTO `users_client` (`id`, `firstname`, `middlename`, `lastname`, `contact_number`, `address`, `verified_at`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Sofia', 'Balasta', 'Valerio', '0919264085', '1720 Dahlia St. Purok 17 Brgy. Commonwealth Quezon City', NULL, '2019-11-29 09:10:00', '2020-02-07 19:12:37', NULL),
(2, 'Juan Dela', 'Rizal', 'Cruz', '09102044775', '1720 Dahlia St. Purok 17 Brgy. Commonwealth Quezon City', NULL, '2019-11-29 09:15:09', '2020-02-05 17:01:15', NULL),
(3, 'Sonia', 'Tan', 'Balasta', '09876543211', '1720 Dahlia St. Purok 17 Brgy. Commonwealth Quezon City', NULL, '2019-11-29 09:15:46', '2020-02-05 17:01:19', NULL),
(41, 'Joven', NULL, 'Pancho', '09971828629', '2508 Pasig Line Sta Ana Manila', NULL, '2020-02-05 22:38:15', '2020-02-17 07:26:16', NULL),
(42, 'bias', NULL, 'ximon', '09988111240', NULL, NULL, '2020-02-14 07:29:36', '2020-02-14 07:29:36', NULL),
(43, 'ximon', NULL, 'bias', '09168859503', NULL, NULL, '2020-02-14 07:34:22', '2020-02-14 07:34:22', NULL),
(44, 'ximon', NULL, 'bias', '09168859503', NULL, NULL, '2020-02-14 07:38:18', '2020-02-14 07:38:18', NULL),
(45, 'Johnjoe', NULL, 'Sebias', '09168859503', NULL, NULL, '2020-02-17 04:46:40', '2020-02-17 04:46:40', NULL),
(46, 'Johnjoe', NULL, 'Sebias', '09168859503', NULL, NULL, '2020-02-17 04:51:24', '2020-02-17 04:51:24', NULL),
(47, 'Ximon', NULL, 'Bias', '09192640851', '1720 Dahlia St. Purok 17 Brgy. Commonwealth Quezon City', NULL, '2020-02-22 01:45:53', '2020-02-22 02:26:34', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users_tech`
--

CREATE TABLE `users_tech` (
  `id` int(11) NOT NULL,
  `password` varchar(191) DEFAULT NULL,
  `availability_status` tinyint(1) NOT NULL DEFAULT 0,
  `profile_image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL,
  `username` varchar(50) NOT NULL,
  `remember_token` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users_tech`
--

INSERT INTO `users_tech` (`id`, `password`, `availability_status`, `profile_image`, `created_at`, `updated_at`, `deleted_at`, `username`, `remember_token`) VALUES
(23, '$2y$10$OUJTgQxnzcH2Nt030JcjyechFYRcaQvruXQPudQ9Ucn7X7h75h0ba', 0, NULL, '2020-02-15 17:15:39', '2020-03-03 16:37:06', NULL, 'jovenlin', 'hbJxce1gqpNjly6Wv8TQLutCVD4S4bzHQGsIlhbBkHyXskSKFdDFbeOxRgwR'),
(24, '$2y$10$0RLh5ae70KcAKZdjqrKWFe567BcnvVUffbMQT01Ik4VuqJY8baCzq', 1, NULL, '2020-02-16 18:14:01', '2020-02-19 17:32:44', NULL, 'johndoe', NULL),
(25, '$2y$10$c0EyFv5W1Y/f5aXRU7FE/uGxdWdx3g8KNdr/71InEvUeK8sxX4mLK', 1, NULL, '2020-02-22 02:43:59', '2020-03-03 05:31:06', NULL, 'tech1', 'wGkf6RSyvUno1O7sJIyoqGSbF1ObmP06e9ju1rxKU77myrG9CN2QfbklG4ZW');

-- --------------------------------------------------------

--
-- Table structure for table `workdone`
--

CREATE TABLE `workdone` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `workdone`
--

INSERT INTO `workdone` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'WorkDone1', '2019-12-17 08:29:07', '2019-12-17 08:29:23', NULL),
(2, 'WorkDone2', '2019-12-17 08:29:07', '2019-12-17 08:29:23', NULL),
(3, 'WorkDone3', '2019-12-17 08:29:07', '2019-12-17 08:29:23', NULL),
(4, 'WorkDone4', '2019-12-17 08:29:07', '2019-12-17 08:29:23', NULL),
(5, 'WorkDone5', '2019-12-17 08:29:07', '2019-12-17 08:29:23', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appliances`
--
ALTER TABLE `appliances`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bank_details`
--
ALTER TABLE `bank_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `client_contact_person`
--
ALTER TABLE `client_contact_person`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `horse_power`
--
ALTER TABLE `horse_power`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `horse_power_fees`
--
ALTER TABLE `horse_power_fees`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hp_id` (`hp_id`),
  ADD KEY `appliance_id` (`appliance_id`);

--
-- Indexes for table `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payments_offline`
--
ALTER TABLE `payments_offline`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payments_online`
--
ALTER TABLE `payments_online`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `checkout_id` (`checkout_id`);

--
-- Indexes for table `payment_method`
--
ALTER TABLE `payment_method`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment_mode`
--
ALTER TABLE `payment_mode`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `property_types`
--
ALTER TABLE `property_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `remarks`
--
ALTER TABLE `remarks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `remarks_ibfk_1` (`service_request_id`),
  ADD KEY `technician_id` (`technician_id`);

--
-- Indexes for table `service_fees`
--
ALTER TABLE `service_fees`
  ADD PRIMARY KEY (`id`),
  ADD KEY `service_fees_ibfk_1` (`appliance_id`),
  ADD KEY `service_fees_ibfk_2` (`service_id`);

--
-- Indexes for table `service_requests`
--
ALTER TABLE `service_requests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `client_id` (`client_id`),
  ADD KEY `service_type_id` (`service_type_id`,`location_id`,`property_id`),
  ADD KEY `timeslot_id` (`timeslot_id`),
  ADD KEY `property_id` (`property_id`),
  ADD KEY `service_requests_ibfk_2` (`location_id`),
  ADD KEY `payment_mode_id` (`payment_mode_id`),
  ADD KEY `client_contact_person_id` (`client_contact_person_id`);

--
-- Indexes for table `service_request_appliances`
--
ALTER TABLE `service_request_appliances`
  ADD PRIMARY KEY (`id`),
  ADD KEY `service_request_appliances_ibfk_1` (`appliance_id`),
  ADD KEY `service_request_id` (`service_request_id`),
  ADD KEY `brand_id` (`brand_id`),
  ADD KEY `unit_id` (`unit_id`);

--
-- Indexes for table `service_request_handles`
--
ALTER TABLE `service_request_handles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `service_request_id` (`service_request_id`),
  ADD KEY `service_request_handles_ibfk_1` (`tech_id`);

--
-- Indexes for table `service_request_troubles`
--
ALTER TABLE `service_request_troubles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `trouble_id` (`trouble_id`),
  ADD KEY `service_request_id` (`service_request_id`);

--
-- Indexes for table `service_request_workdone`
--
ALTER TABLE `service_request_workdone`
  ADD PRIMARY KEY (`id`),
  ADD KEY `service_request_workdone_ibfk_1` (`service_request_id`),
  ADD KEY `service_request_workdone_ibfk_2` (`workdone_id`);

--
-- Indexes for table `service_timeslots`
--
ALTER TABLE `service_timeslots`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `service_types`
--
ALTER TABLE `service_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tech_info`
--
ALTER TABLE `tech_info`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tech_info_ibfk_1` (`tech_id`);

--
-- Indexes for table `telescope_entries`
--
ALTER TABLE `telescope_entries`
  ADD PRIMARY KEY (`sequence`),
  ADD UNIQUE KEY `telescope_entries_uuid_unique` (`uuid`),
  ADD KEY `telescope_entries_batch_id_index` (`batch_id`),
  ADD KEY `telescope_entries_type_should_display_on_index_index` (`type`,`should_display_on_index`),
  ADD KEY `telescope_entries_family_hash_index` (`family_hash`);

--
-- Indexes for table `telescope_entries_tags`
--
ALTER TABLE `telescope_entries_tags`
  ADD KEY `telescope_entries_tags_entry_uuid_tag_index` (`entry_uuid`,`tag`),
  ADD KEY `telescope_entries_tags_tag_index` (`tag`);

--
-- Indexes for table `troubles`
--
ALTER TABLE `troubles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `units`
--
ALTER TABLE `units`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `client_id` (`client_id`);

--
-- Indexes for table `users_admin`
--
ALTER TABLE `users_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_client`
--
ALTER TABLE `users_client`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_tech`
--
ALTER TABLE `users_tech`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `workdone`
--
ALTER TABLE `workdone`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appliances`
--
ALTER TABLE `appliances`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `bank_details`
--
ALTER TABLE `bank_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `client_contact_person`
--
ALTER TABLE `client_contact_person`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `horse_power`
--
ALTER TABLE `horse_power`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `horse_power_fees`
--
ALTER TABLE `horse_power_fees`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `payments_offline`
--
ALTER TABLE `payments_offline`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `payments_online`
--
ALTER TABLE `payments_online`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payment_method`
--
ALTER TABLE `payment_method`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `payment_mode`
--
ALTER TABLE `payment_mode`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `property_types`
--
ALTER TABLE `property_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `remarks`
--
ALTER TABLE `remarks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `service_fees`
--
ALTER TABLE `service_fees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `service_requests`
--
ALTER TABLE `service_requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `service_request_appliances`
--
ALTER TABLE `service_request_appliances`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `service_request_handles`
--
ALTER TABLE `service_request_handles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=619;

--
-- AUTO_INCREMENT for table `service_request_troubles`
--
ALTER TABLE `service_request_troubles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `service_request_workdone`
--
ALTER TABLE `service_request_workdone`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `service_timeslots`
--
ALTER TABLE `service_timeslots`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `service_types`
--
ALTER TABLE `service_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `tech_info`
--
ALTER TABLE `tech_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `telescope_entries`
--
ALTER TABLE `telescope_entries`
  MODIFY `sequence` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `troubles`
--
ALTER TABLE `troubles`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `units`
--
ALTER TABLE `units`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `users_admin`
--
ALTER TABLE `users_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users_client`
--
ALTER TABLE `users_client`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `users_tech`
--
ALTER TABLE `users_tech`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `workdone`
--
ALTER TABLE `workdone`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `horse_power_fees`
--
ALTER TABLE `horse_power_fees`
  ADD CONSTRAINT `horse_power_fees_ibfk_1` FOREIGN KEY (`hp_id`) REFERENCES `horse_power` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `horse_power_fees_ibfk_2` FOREIGN KEY (`appliance_id`) REFERENCES `appliances` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `remarks`
--
ALTER TABLE `remarks`
  ADD CONSTRAINT `remarks_ibfk_1` FOREIGN KEY (`service_request_id`) REFERENCES `service_requests` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `remarks_ibfk_2` FOREIGN KEY (`technician_id`) REFERENCES `users_tech` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `service_fees`
--
ALTER TABLE `service_fees`
  ADD CONSTRAINT `service_fees_ibfk_1` FOREIGN KEY (`appliance_id`) REFERENCES `appliances` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `service_fees_ibfk_2` FOREIGN KEY (`service_id`) REFERENCES `service_types` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `service_requests`
--
ALTER TABLE `service_requests`
  ADD CONSTRAINT `service_requests_ibfk_1` FOREIGN KEY (`client_id`) REFERENCES `users_client` (`id`),
  ADD CONSTRAINT `service_requests_ibfk_2` FOREIGN KEY (`location_id`) REFERENCES `locations` (`id`),
  ADD CONSTRAINT `service_requests_ibfk_3` FOREIGN KEY (`property_id`) REFERENCES `property_types` (`id`),
  ADD CONSTRAINT `service_requests_ibfk_4` FOREIGN KEY (`timeslot_id`) REFERENCES `service_timeslots` (`id`),
  ADD CONSTRAINT `service_requests_ibfk_5` FOREIGN KEY (`payment_mode_id`) REFERENCES `payment_mode` (`id`),
  ADD CONSTRAINT `service_requests_ibfk_6` FOREIGN KEY (`client_contact_person_id`) REFERENCES `client_contact_person` (`id`);

--
-- Constraints for table `service_request_appliances`
--
ALTER TABLE `service_request_appliances`
  ADD CONSTRAINT `service_request_appliances_ibfk_1` FOREIGN KEY (`appliance_id`) REFERENCES `appliances` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `service_request_appliances_ibfk_2` FOREIGN KEY (`service_request_id`) REFERENCES `service_requests` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `service_request_appliances_ibfk_3` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`),
  ADD CONSTRAINT `service_request_appliances_ibfk_4` FOREIGN KEY (`unit_id`) REFERENCES `units` (`id`);

--
-- Constraints for table `service_request_handles`
--
ALTER TABLE `service_request_handles`
  ADD CONSTRAINT `service_request_handles_ibfk_1` FOREIGN KEY (`tech_id`) REFERENCES `users_tech` (`id`);

--
-- Constraints for table `service_request_troubles`
--
ALTER TABLE `service_request_troubles`
  ADD CONSTRAINT `service_request_troubles_ibfk_1` FOREIGN KEY (`trouble_id`) REFERENCES `troubles` (`id`),
  ADD CONSTRAINT `service_request_troubles_ibfk_2` FOREIGN KEY (`service_request_id`) REFERENCES `service_requests` (`id`);

--
-- Constraints for table `service_request_workdone`
--
ALTER TABLE `service_request_workdone`
  ADD CONSTRAINT `service_request_workdone_ibfk_1` FOREIGN KEY (`service_request_id`) REFERENCES `service_requests` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `service_request_workdone_ibfk_2` FOREIGN KEY (`workdone_id`) REFERENCES `workdone` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tech_info`
--
ALTER TABLE `tech_info`
  ADD CONSTRAINT `tech_info_ibfk_1` FOREIGN KEY (`tech_id`) REFERENCES `users_tech` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `telescope_entries_tags`
--
ALTER TABLE `telescope_entries_tags`
  ADD CONSTRAINT `telescope_entries_tags_entry_uuid_foreign` FOREIGN KEY (`entry_uuid`) REFERENCES `telescope_entries` (`uuid`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`client_id`) REFERENCES `users_client` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
