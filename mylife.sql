-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 03, 2021 at 05:45 PM
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
-- Database: `mylife`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `post_id` bigint(20) UNSIGNED NOT NULL,
  `comment` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'text',
  `parent_id` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `user_id`, `post_id`, `comment`, `type`, `parent_id`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 'Tiền nào của nấy thôi bạn ơi', 'text', 0, '2021-05-21 15:58:42', '2021-05-21 15:58:42'),
(2, 1, 1, 'OK, mình đồng ý với bạn', 'text', 0, '2021-05-23 15:58:42', '2021-05-23 15:58:42'),
(3, 1, 11, 'A4 HBT', 'text', 0, '2021-05-24 07:31:17', '2021-05-24 07:31:17'),
(4, 1, 9, 'Nhìn mặt sao quạo thế', 'text', 0, '2021-05-24 07:36:59', '2021-05-24 07:36:59'),
(5, 1, 9, 'Haha', 'text', 0, '2021-05-24 07:37:11', '2021-05-24 07:37:11'),
(6, 1, 11, 'A4', 'text', 0, '2021-05-24 07:53:43', '2021-05-24 07:53:43'),
(7, 1, 11, 'HBt', 'text', 0, '2021-05-24 07:57:17', '2021-05-24 07:57:17'),
(9, 1, 3, 'Naruto', 'text', 0, '2021-05-24 08:07:40', '2021-05-24 08:07:40'),
(10, 1, 11, 'store/comments/1621843824.jpg', 'image', 0, '2021-05-24 08:10:24', '2021-05-24 08:10:24'),
(11, 1, 11, 'store/comments/1621844124.jpg', 'image', 0, '2021-05-24 08:15:24', '2021-05-24 08:15:24'),
(12, 17, 12, 'Ảnh đẹp lắm', 'text', 0, '2021-05-24 09:33:51', '2021-05-24 09:33:51'),
(13, 17, 12, 'store/comments/1621848844.jpg', 'image', 0, '2021-05-24 09:34:04', '2021-05-24 09:34:04'),
(14, 1, 12, 'store/comments/1621856328.jpg', 'image', 0, '2021-05-24 11:38:48', '2021-05-24 11:38:48'),
(15, 1, 11, 'hello', 'text', 0, '2021-05-26 08:38:26', '2021-05-26 08:38:26'),
(16, 1, 11, 'store/comments/1622018306.jpg', 'image', 0, '2021-05-26 08:38:26', '2021-05-26 08:38:26'),
(17, 1, 5, 'Hello cậu', 'text', 0, '2021-05-28 09:41:47', '2021-05-28 09:41:47'),
(18, 19, 12, 'Xin chào', 'text', 0, '2021-05-29 01:33:40', '2021-05-29 01:33:40'),
(19, 1, 1, 'Hello', 'text', 0, '2021-05-31 18:15:45', '2021-05-31 18:15:45'),
(20, 1, 23, 'store/comments/1622485563.jpg', 'image', 0, '2021-05-31 18:26:03', '2021-05-31 18:26:03'),
(21, 21, 26, 'Đi chơi cho lắm coi chừng cách ly tiếp á😌😌', 'text', 0, '2021-06-01 13:34:54', '2021-06-01 13:34:54'),
(22, 20, 26, 'Ảnh mình chụp lâu rồi bạn eiii', 'text', 0, '2021-06-01 13:46:18', '2021-06-01 13:46:18'),
(23, 21, 29, 'Nhân cách thứ hai của em đó quý dị:>>>', 'text', 0, '2021-06-01 14:11:23', '2021-06-01 14:11:23'),
(24, 21, 29, 'Em hổng có biết gì hết á😔', 'text', 0, '2021-06-01 14:11:57', '2021-06-01 14:11:57'),
(25, 23, 29, 'Bà Giang là bà nào🙄...', 'text', 0, '2021-06-01 14:50:07', '2021-06-01 14:50:07'),
(26, 23, 28, '🙄🙄🙄', 'text', 0, '2021-06-01 14:50:52', '2021-06-01 14:50:52'),
(27, 23, 28, '...', 'text', 0, '2021-06-01 14:50:57', '2021-06-01 14:50:57'),
(28, 23, 28, 'Bà này tui biết nè. Bà Nga đúng ko👍👍', 'text', 0, '2021-06-01 14:51:44', '2021-06-01 14:51:44'),
(29, 23, 30, 'Ông nào vào comment lung tung tôi ban hết', 'text', 0, '2021-06-01 14:56:47', '2021-06-01 14:56:47'),
(30, 23, 30, 'Chốt câu cuối thấy ông nào tui kick ông đó', 'text', 0, '2021-06-01 14:58:33', '2021-06-01 14:58:33'),
(31, 23, 25, 'Trẩu=)))', 'text', 0, '2021-06-01 15:00:29', '2021-06-01 15:00:29'),
(32, 23, 11, 'Nói đi. Ta cho phép con ước🙄', 'text', 0, '2021-06-01 15:02:09', '2021-06-01 15:02:09'),
(33, 20, 30, 'Nếu có haha mình in phép nhấp 3 lần để thể hiện cảm xúc lúc này🥴🥴', 'text', 0, '2021-06-01 15:08:07', '2021-06-01 15:08:07'),
(34, 20, 30, 'Vì chỉ cấm ông nên bà comment vô tư nha:))). Đừng dỗi😌', 'text', 0, '2021-06-01 15:09:18', '2021-06-01 15:09:18'),
(35, 20, 29, 'M thì có khi nào không khịa người. Làm như hiền lắm vậy🙄🙄', 'text', 0, '2021-06-01 15:12:05', '2021-06-01 15:12:05'),
(36, 20, 29, 'Nhẫn nó học gần hết hai năm giờ hỏi Giang là bà nào:))) Khóc đi Giang:v còn gì nữa đâu mà khóc với sầu~~', 'text', 0, '2021-06-01 15:14:24', '2021-06-01 15:14:24'),
(37, 1, 25, 'store/comments/1622573144.jpg', 'image', 0, '2021-06-01 18:45:44', '2021-06-01 18:45:44'),
(38, 1, 13, 'store/comments/1622573454.jpg', 'image', 0, '2021-06-01 18:50:54', '2021-06-01 18:50:54'),
(39, 2, 31, 'Ngầu nhở 😎', 'text', 0, '2021-06-01 19:41:52', '2021-06-01 19:41:52');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `occur` datetime NOT NULL,
  `creater_id` int(11) NOT NULL,
  `content` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `privacy` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `event_attenders`
--

CREATE TABLE `event_attenders` (
  `id` int(10) UNSIGNED NOT NULL,
  `event_id` int(11) NOT NULL,
  `attender_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `friends`
--

CREATE TABLE `friends` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id1` int(11) NOT NULL,
  `user_id2` int(11) NOT NULL,
  `isAccept` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `friends`
--

INSERT INTO `friends` (`id`, `user_id1`, `user_id2`, `isAccept`, `created_at`, `updated_at`) VALUES
(15, 14, 1, 2, '2021-05-24 15:44:05', '2021-05-26 08:39:08'),
(16, 1, 2, 1, '2021-05-28 13:09:26', '2021-05-28 13:09:26'),
(17, 19, 2, 2, '2021-05-29 01:34:02', '2021-05-29 01:34:35'),
(18, 1, 13, 1, '2021-06-01 10:57:45', '2021-06-01 10:57:45'),
(19, 20, 1, 2, '2021-06-01 12:19:26', '2021-06-02 03:26:33'),
(20, 21, 20, 2, '2021-06-01 13:36:24', '2021-06-01 13:42:57'),
(21, 23, 2, 1, '2021-06-01 15:03:16', '2021-06-01 15:03:16'),
(22, 23, 20, 2, '2021-06-01 15:04:31', '2021-06-01 15:15:28'),
(23, 23, 21, 1, '2021-06-01 15:05:10', '2021-06-01 15:05:10');

-- --------------------------------------------------------

--
-- Table structure for table `helps`
--

CREATE TABLE `helps` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `content` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `post_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `likes`
--

INSERT INTO `likes` (`id`, `post_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 1, 2, '2021-05-21 16:00:02', '2021-05-21 16:00:02'),
(3, 8, 13, '2021-05-23 09:20:51', '2021-05-23 09:20:51'),
(5, 4, 1, '2021-05-23 09:42:01', '2021-05-23 09:42:01'),
(7, 8, 1, '2021-05-23 10:42:20', '2021-05-23 10:42:20'),
(8, 9, 14, '2021-05-23 10:48:39', '2021-05-23 10:48:39'),
(9, 8, 14, '2021-05-23 10:49:14', '2021-05-23 10:49:14'),
(10, 7, 14, '2021-05-23 10:49:17', '2021-05-23 10:49:17'),
(11, 9, 1, '2021-05-23 10:55:21', '2021-05-23 10:55:21'),
(12, 9, 13, '2021-05-23 11:44:15', '2021-05-23 11:44:15'),
(13, 7, 13, '2021-05-23 11:44:24', '2021-05-23 11:44:24'),
(17, 1, 1, '2021-05-23 16:56:21', '2021-05-23 16:56:21'),
(19, 12, 17, '2021-05-24 09:34:19', '2021-05-24 09:34:19'),
(22, 12, 1, '2021-05-24 11:58:57', '2021-05-24 11:58:57'),
(23, 11, 1, '2021-05-24 12:00:15', '2021-05-24 12:00:15'),
(27, 12, 2, '2021-05-27 17:11:42', '2021-05-27 17:11:42'),
(28, 5, 1, '2021-05-28 09:41:49', '2021-05-28 09:41:49'),
(29, 11, 2, '2021-05-28 13:11:10', '2021-05-28 13:11:10'),
(32, 23, 1, '2021-05-31 18:25:51', '2021-05-31 18:25:51'),
(33, 25, 13, '2021-06-01 09:14:20', '2021-06-01 09:14:20'),
(34, 13, 20, '2021-06-01 12:21:04', '2021-06-01 12:21:04'),
(35, 26, 20, '2021-06-01 12:38:41', '2021-06-01 12:38:41'),
(36, 26, 21, '2021-06-01 13:32:57', '2021-06-01 13:32:57'),
(37, 27, 21, '2021-06-01 13:35:18', '2021-06-01 13:35:18'),
(38, 25, 21, '2021-06-01 13:35:28', '2021-06-01 13:35:28'),
(39, 27, 20, '2021-06-01 13:43:12', '2021-06-01 13:43:12'),
(40, 29, 21, '2021-06-01 14:10:16', '2021-06-01 14:10:16'),
(41, 28, 21, '2021-06-01 14:12:38', '2021-06-01 14:12:38'),
(42, 29, 23, '2021-06-01 14:48:43', '2021-06-01 14:48:43'),
(43, 28, 23, '2021-06-01 14:50:33', '2021-06-01 14:50:33'),
(44, 30, 23, '2021-06-01 14:59:33', '2021-06-01 14:59:33'),
(45, 27, 23, '2021-06-01 14:59:50', '2021-06-01 14:59:50'),
(46, 26, 23, '2021-06-01 14:59:57', '2021-06-01 14:59:57'),
(47, 25, 23, '2021-06-01 15:00:13', '2021-06-01 15:00:13'),
(48, 11, 23, '2021-06-01 15:01:17', '2021-06-01 15:01:17'),
(49, 30, 20, '2021-06-01 15:06:26', '2021-06-01 15:06:26'),
(50, 29, 20, '2021-06-01 15:10:02', '2021-06-01 15:10:02'),
(51, 28, 20, '2021-06-01 15:14:46', '2021-06-01 15:14:46'),
(53, 28, 1, '2021-06-01 18:45:25', '2021-06-01 18:45:25'),
(54, 26, 1, '2021-06-01 18:45:29', '2021-06-01 18:45:29'),
(55, 13, 1, '2021-06-01 18:51:04', '2021-06-01 18:51:04'),
(56, 31, 24, '2021-06-01 18:56:56', '2021-06-01 18:56:56'),
(57, 31, 2, '2021-06-01 19:40:43', '2021-06-01 19:40:43'),
(59, 31, 1, '2021-06-02 09:28:15', '2021-06-02 09:28:15'),
(60, 32, 1, '2021-06-02 11:23:35', '2021-06-02 11:23:35'),
(61, 27, 1, '2021-06-02 11:59:01', '2021-06-02 11:59:01'),
(62, 32, 13, '2021-06-02 12:36:47', '2021-06-02 12:36:47'),
(63, 31, 13, '2021-06-02 12:36:50', '2021-06-02 12:36:50'),
(64, 30, 13, '2021-06-02 12:36:52', '2021-06-02 12:36:52');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(10) UNSIGNED NOT NULL,
  `room_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `message` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'text',
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `room_id`, `user_id`, `message`, `type`, `status`, `created_at`, `updated_at`) VALUES
(1, 12, 1, 'Hello, xin chào cậu nha', 'text', 1, '2021-05-21 17:33:50', '2021-05-21 17:33:50'),
(2, 12, 1, 'Cậu ở đâu thế nhỉ', 'text', 1, '2021-05-21 17:34:43', '2021-05-21 17:34:43'),
(3, 12, 2, 'Mình ở Huế nha bạn', 'text', 1, '2021-05-21 18:13:12', '2021-05-21 18:13:12'),
(4, 12, 2, 'store/messages/1621621141.jpg', 'image', 1, '2021-05-21 18:19:01', '2021-05-21 18:19:01'),
(5, 17, 1, 'Xin chào, cho mình làm quen nhé', 'text', 1, '2021-05-24 15:33:39', '2021-05-24 15:33:39'),
(6, 12, 1, 'Mình cũng ở Huế á', 'text', 1, '2021-05-26 06:58:53', '2021-05-26 06:58:53'),
(7, 12, 1, 'Bạn ở chỗ nào', 'text', 1, '2021-05-26 07:00:20', '2021-05-26 07:00:20'),
(8, 12, 1, 'Alo\nalo\nalo', 'text', 1, '2021-05-26 07:11:19', '2021-05-26 07:11:19'),
(9, 12, 1, 'store/messages/1622015330.jpg', 'image', 1, '2021-05-26 07:48:50', '2021-05-26 07:48:50'),
(10, 20, 1, 'Avatar mèo dễ thương đó', 'text', 1, '2021-05-26 08:24:50', '2021-05-26 08:24:50'),
(11, 12, 1, 'Đẹp không :v', 'text', 1, '2021-05-26 08:45:29', '2021-05-26 08:45:29'),
(12, 12, 2, 'cũng được á bạn', 'text', 1, '2021-05-26 08:50:35', '2021-05-26 08:50:35'),
(13, 12, 2, 'mình xin nha', 'text', 1, '2021-05-26 08:52:12', '2021-05-26 08:52:12'),
(14, 12, 2, 'Cám ơn bạn trước nha', 'text', 1, '2021-05-26 08:54:24', '2021-05-26 08:54:24'),
(15, 12, 2, 'Hello', 'text', 1, '2021-05-26 08:57:35', '2021-05-26 08:57:35'),
(16, 12, 2, 'Hi', 'text', 1, '2021-05-26 08:58:56', '2021-05-26 08:58:56'),
(17, 12, 2, 'What\'s up?', 'text', 1, '2021-05-26 08:59:17', '2021-05-26 08:59:17'),
(18, 12, 1, 'Sao hả bạn', 'text', 1, '2021-05-26 09:00:08', '2021-05-26 09:00:08'),
(29, 12, 1, 'Eeee', 'text', 1, '2021-05-26 09:14:09', '2021-05-26 09:14:09'),
(30, 12, 1, 'Gấp gấp', 'text', 1, '2021-05-26 09:14:19', '2021-05-26 09:14:19'),
(31, 12, 1, 'Nhanh bạn ơi', 'text', 1, '2021-05-26 09:15:25', '2021-05-26 09:15:25'),
(32, 17, 1, 'store/messages/1622022560.jpg', 'image', 1, '2021-05-26 09:49:20', '2021-05-26 09:49:20'),
(33, 17, 1, 'Tặng bạn', 'text', 1, '2021-05-26 09:49:34', '2021-05-26 09:49:34'),
(80, 12, 2, 'Co chuyen gi ma gap the', 'text', 1, '2021-05-26 16:23:27', '2021-05-26 16:23:27'),
(81, 20, 1, 'Eee, nói nayd', 'text', 1, '2021-05-26 16:24:10', '2021-05-26 16:24:10'),
(82, 12, 1, 'store/messages/1622046267.jpg', 'image', 1, '2021-05-26 16:24:27', '2021-05-26 16:24:27'),
(83, 12, 1, 'đẹp ko', 'text', 1, '2021-05-26 16:24:35', '2021-05-26 16:24:35'),
(84, 20, 14, 'Sao a', 'text', 1, '2021-05-26 17:17:51', '2021-05-26 17:17:51'),
(85, 20, 1, 'Mèo đẹp á', 'text', 1, '2021-05-26 17:24:09', '2021-05-26 17:24:09'),
(86, 20, 1, 'Haha', 'text', 1, '2021-05-26 17:26:31', '2021-05-26 17:26:31'),
(87, 20, 14, 'Cam on nghe', 'text', 1, '2021-05-26 17:28:24', '2021-05-26 17:28:24'),
(88, 20, 1, 'Không có chi', 'text', 1, '2021-05-26 17:28:54', '2021-05-26 17:28:54'),
(89, 20, 14, 'Okok', 'text', 1, '2021-05-26 17:29:06', '2021-05-26 17:29:06'),
(90, 20, 1, '❤️❤️❤️', 'text', 1, '2021-05-27 15:14:11', '2021-05-27 15:14:11'),
(244, 22, 18, 'Xin chào', 'text', 1, '2021-05-29 01:28:28', '2021-05-29 01:28:28'),
(245, 22, 2, 'Hi', 'text', 1, '2021-05-29 01:28:51', '2021-05-29 01:28:51'),
(246, 22, 18, 'hello', 'text', 1, '2021-05-29 01:28:57', '2021-05-29 01:28:57'),
(247, 23, 19, 'Hi', 'text', 1, '2021-05-29 01:36:32', '2021-05-29 01:36:32'),
(248, 23, 19, 'Hi', 'text', 1, '2021-05-29 01:36:48', '2021-05-29 01:36:48'),
(249, 23, 2, 'Xin chao', 'text', 1, '2021-05-29 01:36:55', '2021-05-29 01:36:55'),
(250, 23, 19, 'Hello', 'text', 1, '2021-05-29 01:46:31', '2021-05-29 01:46:31'),
(251, 23, 19, 'store/messages/1622252804.jpg', 'image', 1, '2021-05-29 01:46:45', '2021-05-29 01:46:45'),
(252, 12, 1, 'store/messages/1622485468.jpg', 'image', 1, '2021-05-31 18:24:28', '2021-05-31 18:24:28'),
(253, 12, 2, 'Hi', 'text', 1, '2021-06-01 04:28:10', '2021-06-01 04:28:10'),
(254, 24, 13, 'Anh Phong', 'text', 1, '2021-06-01 09:10:58', '2021-06-01 09:10:58'),
(255, 24, 1, 'store/messages/1622545920.jpg', 'image', 1, '2021-06-01 11:12:00', '2021-06-01 11:12:00'),
(256, 25, 20, '-__________-', 'text', 1, '2021-06-01 12:20:12', '2021-06-01 12:20:12'),
(257, 25, 20, 'store/messages/1622550033.jpg', 'image', 1, '2021-06-01 12:20:33', '2021-06-01 12:20:33'),
(258, 26, 21, 'Ê Huyền', 'text', 1, '2021-06-01 13:37:25', '2021-06-01 13:37:25'),
(259, 26, 21, 'M thi ltdđ chưa:v', 'text', 1, '2021-06-01 13:37:46', '2021-06-01 13:37:46'),
(260, 26, 21, 'Lớp t thi hôm qua có drama to đùng luôn haha', 'text', 1, '2021-06-01 13:40:26', '2021-06-01 13:40:26'),
(261, 26, 20, 'T nghe rồi:v', 'text', 1, '2021-06-01 13:48:19', '2021-06-01 13:48:19'),
(262, 26, 20, 'Xợ hãi các thứ:v', 'text', 1, '2021-06-01 13:48:49', '2021-06-01 13:48:49'),
(263, 26, 20, 'Mà lớp t chưa thi á', 'text', 1, '2021-06-01 13:49:10', '2021-06-01 13:49:10'),
(264, 17, 1, 'lâu ngày', 'text', 1, '2021-06-02 10:11:04', '2021-06-02 10:11:04'),
(265, 24, 1, 'Hello', 'text', 1, '2021-06-02 12:35:58', '2021-06-02 12:35:58'),
(266, 24, 13, 'hi pig', 'text', 1, '2021-06-02 12:36:08', '2021-06-02 12:36:08'),
(267, 24, 13, 'store/messages/1622637440.jpg', 'image', 1, '2021-06-02 12:37:20', '2021-06-02 12:37:20'),
(268, 24, 13, 'store/messages/1622637545.jpg', 'image', 1, '2021-06-02 12:39:05', '2021-06-02 12:39:05');

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
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2021_02_04_142628_create_posts_table', 1),
(5, '2021_02_04_143602_create_comments_table', 1),
(6, '2021_02_04_143628_create_likes_table', 1),
(7, '2021_04_24_064926_create_friends_table', 1),
(8, '2021_04_24_065237_create_notifications_table', 1),
(9, '2021_04_24_065338_create_reports_table', 1),
(10, '2021_04_24_065659_create_helps_table', 1),
(11, '2021_04_24_065726_create_rooms_table', 1),
(12, '2021_04_24_065757_create_participants_table', 1),
(13, '2021_04_24_065817_create_messages_table', 1),
(14, '2021_04_24_065840_create_notification_types_table', 1),
(15, '2021_04_24_065919_create_user_infor_table', 1),
(16, '2021_04_24_065945_create_relationships_table', 1),
(17, '2021_04_24_070013_create_events_table', 1),
(18, '2021_04_24_070036_create_events_attenders_table', 1),
(19, '2021_04_24_070059_create_tasks_table', 1),
(20, '2021_04_24_070121_create_task_receivers_table', 1),
(21, '2021_04_24_073241_create_privacies_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` int(10) UNSIGNED NOT NULL,
  `sender_id` int(11) NOT NULL,
  `content` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `receiver_id` int(11) NOT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` int(11) NOT NULL,
  `isSeen` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `sender_id`, `content`, `receiver_id`, `link`, `image`, `type`, `isSeen`, `created_at`, `updated_at`) VALUES
(50, 14, '<b>Trần Văn A</b> đã gửi cho bạn lời mời kết bạn', 1, '14', 'store/profiles/1621766865.jpg', 1, 1, '2021-05-24 15:44:05', '2021-05-24 15:44:05'),
(51, 1, '<b>Thanh Phong</b> đã chấp nhận lời mời kết bạn của bạn', 14, '1', 'store/profiles/1621001165.jpg', 4, 1, '2021-05-26 08:39:08', '2021-05-26 08:39:08'),
(52, 2, '<b>Hồ Thanh Phong</b> đã thích bài viết của bạn', 17, '12', 'store/profiles/nouser1.png', 3, 1, '2021-05-27 17:11:02', '2021-05-27 17:11:02'),
(53, 2, '<b>Hồ Thanh Phong</b> đã thích bài viết của bạn', 17, '12', 'store/profiles/nouser1.png', 3, 1, '2021-05-27 17:11:07', '2021-05-27 17:11:07'),
(54, 2, '<b>Hồ Thanh Phong</b> đã thích bài viết của bạn', 17, '12', 'store/profiles/nouser1.png', 3, 1, '2021-05-27 17:11:38', '2021-05-27 17:11:38'),
(55, 2, '<b>Hồ Thanh Phong</b> đã thích bài viết của bạn', 17, '12', 'store/profiles/nouser1.png', 3, 1, '2021-05-27 17:11:42', '2021-05-27 17:11:42'),
(56, 1, '<b>Thanh Phong</b> đã bình luận một bài viết của bạn', 2, '5', 'store/profiles/1621001165.jpg', 2, 1, '2021-05-28 09:41:47', '2021-05-28 09:41:47'),
(57, 1, '<b>Thanh Phong</b> đã thích bài viết của bạn', 2, '5', 'store/profiles/1621001165.jpg', 3, 1, '2021-05-28 09:41:49', '2021-05-28 09:41:49'),
(58, 1, '<b>Thanh Phong</b> đã gửi cho bạn lời mời kết bạn', 2, '1', 'store/profiles/1621001165.jpg', 1, 1, '2021-05-28 13:09:26', '2021-05-28 13:09:26'),
(59, 2, '<b>Hồ Thanh Phong</b> đã thích bài viết của bạn', 1, '1', 'store/profiles/nouser1.png', 3, 1, '2021-05-28 13:11:10', '2021-05-28 13:11:10'),
(60, 19, '<b>Nguyễn Văn C</b> đã thích bài viết của bạn', 17, '12', 'store/profiles/1622251996.jpg', 3, 1, '2021-05-29 01:33:28', '2021-05-29 01:33:28'),
(61, 19, '<b>Nguyễn Văn C</b> đã bình luận một bài viết của bạn', 17, '12', 'store/profiles/1622251996.jpg', 2, 1, '2021-05-29 01:33:40', '2021-05-29 01:33:40'),
(62, 19, '<b>Nguyễn Văn C</b> đã thích bài viết của bạn', 17, '12', 'store/profiles/1622251996.jpg', 3, 1, '2021-05-29 01:33:46', '2021-05-29 01:33:46'),
(63, 19, '<b>Nguyễn Văn C</b> đã gửi cho bạn lời mời kết bạn', 2, '19', 'store/profiles/1622251996.jpg', 1, 1, '2021-05-29 01:34:02', '2021-05-29 01:34:02'),
(64, 2, '<b>Hồ Thanh Phong</b> đã chấp nhận lời mời kết bạn của bạn', 19, '2', 'store/profiles/nouser1.png', 4, 1, '2021-05-29 01:34:35', '2021-05-29 01:34:35'),
(65, 13, '<b>Hồ Thị Minh Trang</b> đã thích bài viết của bạn', 1, '7', 'store/profiles/1621757890.jpg', 3, 1, '2021-06-01 09:14:20', '2021-06-01 09:14:20'),
(66, 1, '<b>Thanh Phong</b> đã gửi cho bạn lời mời kết bạn', 13, '1', 'store/profiles/1621001165.jpg', 1, 1, '2021-06-01 10:57:45', '2021-06-01 10:57:45'),
(67, 20, '<b>Nguyễn Thị Cẩm Huyền</b> đã gửi cho bạn lời mời kết bạn', 1, '20', 'store/profiles/1622549839.jpg', 1, 1, '2021-06-01 12:19:26', '0000-00-00 00:00:00'),
(68, 20, '<b>Nguyễn Thị Cẩm Huyền</b> đã thích bài viết của bạn', 19, '13', 'store/profiles/1622549839.jpg', 3, 1, '2021-06-01 12:21:04', '2021-06-01 12:21:04'),
(69, 21, '<b>Hương Giang</b> đã thích bài viết của bạn', 20, '26', 'store/profiles/1622554352.jpg', 3, 1, '2021-06-01 13:32:57', '2021-06-01 13:32:57'),
(70, 21, '<b>Hương Giang</b> đã bình luận một bài viết của bạn', 20, '26', 'store/profiles/1622554352.jpg', 2, 1, '2021-06-01 13:34:54', '2021-06-01 13:34:54'),
(71, 21, '<b>Hương Giang</b> đã thích bài viết của bạn', 20, '28', 'store/profiles/1622554352.jpg', 3, 1, '2021-06-01 13:35:18', '2021-06-01 13:35:18'),
(72, 21, '<b>Hương Giang</b> đã thích bài viết của bạn', 1, '25', 'store/profiles/1622554352.jpg', 3, 1, '2021-06-01 13:35:28', '2021-06-01 13:35:28'),
(73, 21, '<b>Hương Giang</b> đã gửi cho bạn lời mời kết bạn', 20, '21', 'store/profiles/1622554352.jpg', 1, 1, '2021-06-01 13:36:24', '2021-06-01 13:36:24'),
(74, 20, '<b>Nguyễn Thị Cẩm Huyền</b> đã chấp nhận lời mời kết bạn của bạn', 21, '20', 'store/profiles/1622549839.jpg', 4, 1, '2021-06-01 13:42:57', '2021-06-01 13:42:57'),
(75, 21, '<b>Hương Giang</b> đã thích bài viết của bạn', 20, '27', 'store/profiles/1622554352.jpg', 3, 1, '2021-06-01 14:12:38', '2021-06-01 14:12:38'),
(76, 23, '<b>Nguyễn Ngọc Nhẫn</b> đã thích bài viết của bạn', 21, '29', 'store/profiles/1622558802.jpg', 3, 1, '2021-06-01 14:48:43', '2021-06-01 14:48:43'),
(77, 23, '<b>Nguyễn Ngọc Nhẫn</b> đã bình luận một bài viết của bạn', 21, '29', 'store/profiles/1622558802.jpg', 2, 1, '2021-06-01 14:50:07', '2021-06-01 14:50:07'),
(78, 23, '<b>Nguyễn Ngọc Nhẫn</b> đã thích bài viết của bạn', 20, '26', 'store/profiles/1622558802.jpg', 3, 1, '2021-06-01 14:50:33', '2021-06-01 14:50:33'),
(79, 23, '<b>Nguyễn Ngọc Nhẫn</b> đã bình luận một bài viết của bạn', 20, '27', 'store/profiles/1622558802.jpg', 2, 1, '2021-06-01 14:50:52', '2021-06-01 14:50:52'),
(80, 23, '<b>Nguyễn Ngọc Nhẫn</b> đã bình luận một bài viết của bạn', 20, '26', 'store/profiles/1622558802.jpg', 2, 1, '2021-06-01 14:50:57', '2021-06-01 14:50:57'),
(81, 23, '<b>Nguyễn Ngọc Nhẫn</b> đã bình luận một bài viết của bạn', 20, '28', 'store/profiles/1622558802.jpg', 2, 1, '2021-06-01 14:51:44', '2021-06-01 14:51:44'),
(82, 23, '<b>Nguyễn Ngọc Nhẫn</b> đã thích bài viết của bạn', 20, '27', 'store/profiles/1622558802.jpg', 3, 1, '2021-06-01 14:59:50', '2021-06-01 14:59:50'),
(83, 23, '<b>Nguyễn Ngọc Nhẫn</b> đã thích bài viết của bạn', 20, '28', 'store/profiles/1622558802.jpg', 3, 1, '2021-06-01 14:59:57', '2021-06-01 14:59:57'),
(84, 23, '<b>Nguyễn Ngọc Nhẫn</b> đã thích bài viết của bạn', 1, '25', 'store/profiles/1622558802.jpg', 3, 1, '2021-06-01 15:00:13', '2021-06-01 15:00:13'),
(85, 23, '<b>Nguyễn Ngọc Nhẫn</b> đã bình luận một bài viết của bạn', 1, '11', 'store/profiles/1622558802.jpg', 2, 1, '2021-06-01 15:00:29', '2021-06-01 15:00:29'),
(86, 23, '<b>Nguyễn Ngọc Nhẫn</b> đã thích bài viết của bạn', 1, '11', 'store/profiles/1622558802.jpg', 3, 1, '2021-06-01 15:01:17', '2021-06-01 15:01:17'),
(87, 23, '<b>Nguyễn Ngọc Nhẫn</b> đã bình luận một bài viết của bạn', 1, '25', 'store/profiles/1622558802.jpg', 2, 1, '2021-06-01 15:02:09', '2021-06-01 15:02:09'),
(88, 23, '<b>Nguyễn Ngọc Nhẫn</b> đã gửi cho bạn lời mời kết bạn', 2, '23', 'store/profiles/1622558802.jpg', 1, 1, '2021-06-01 15:03:16', '2021-06-01 15:03:16'),
(89, 23, '<b>Nguyễn Ngọc Nhẫn</b> đã gửi cho bạn lời mời kết bạn', 20, '23', 'store/profiles/1622558802.jpg', 1, 1, '2021-06-01 15:04:31', '2021-06-01 15:04:31'),
(90, 23, '<b>Nguyễn Ngọc Nhẫn</b> đã gửi cho bạn lời mời kết bạn', 21, '23', 'store/profiles/1622558802.jpg', 1, 1, '2021-06-01 15:05:10', '2021-06-01 15:05:10'),
(91, 20, '<b>Nguyễn Thị Cẩm Huyền</b> đã thích bài viết của bạn', 23, '30', 'store/profiles/1622549839.jpg', 3, 1, '2021-06-01 15:06:26', '2021-06-01 15:06:26'),
(92, 20, '<b>Nguyễn Thị Cẩm Huyền</b> đã bình luận một bài viết của bạn', 23, '30', 'store/profiles/1622549839.jpg', 2, 1, '2021-06-01 15:08:07', '2021-06-01 15:08:07'),
(93, 20, '<b>Nguyễn Thị Cẩm Huyền</b> đã bình luận một bài viết của bạn', 23, '30', 'store/profiles/1622549839.jpg', 2, 1, '2021-06-01 15:09:18', '2021-06-01 15:09:18'),
(94, 20, '<b>Nguyễn Thị Cẩm Huyền</b> đã thích bài viết của bạn', 21, '29', 'store/profiles/1622549839.jpg', 3, 1, '2021-06-01 15:10:02', '2021-06-01 15:10:02'),
(95, 20, '<b>Nguyễn Thị Cẩm Huyền</b> đã bình luận một bài viết của bạn', 21, '29', 'store/profiles/1622549839.jpg', 2, 1, '2021-06-01 15:12:05', '2021-06-01 15:12:05'),
(96, 20, '<b>Nguyễn Thị Cẩm Huyền</b> đã bình luận một bài viết của bạn', 21, '29', 'store/profiles/1622549839.jpg', 2, 1, '2021-06-01 15:14:24', '2021-06-01 15:14:24'),
(97, 20, '<b>Nguyễn Thị Cẩm Huyền</b> đã chấp nhận lời mời kết bạn của bạn', 23, '20', 'store/profiles/1622549839.jpg', 4, 1, '2021-06-01 15:15:28', '2021-06-01 15:15:28'),
(98, 1, '<b>Thanh Phong</b> đã thích bài viết của bạn', 20, '26', 'store/profiles/1621001165.jpg', 3, 1, '2021-06-01 18:45:19', '2021-06-01 18:45:19'),
(99, 1, '<b>Thanh Phong</b> đã thích bài viết của bạn', 20, '28', 'store/profiles/1621001165.jpg', 3, 1, '2021-06-01 18:45:25', '2021-06-01 18:45:25'),
(100, 1, '<b>Thanh Phong</b> đã thích bài viết của bạn', 20, '26', 'store/profiles/1621001165.jpg', 3, 1, '2021-06-01 18:45:29', '2021-06-01 18:45:29'),
(101, 1, '<b>Thanh Phong</b> đã bình luận một bài viết của bạn', 19, '13', 'store/profiles/1621001165.jpg', 2, 1, '2021-06-01 18:50:54', '2021-06-01 18:50:54'),
(102, 1, '<b>Thanh Phong</b> đã thích bài viết của bạn', 19, '13', 'store/profiles/1621001165.jpg', 3, 1, '2021-06-01 18:51:04', '2021-06-01 18:51:04'),
(103, 2, '<b>Hồ Thanh Phong</b> đã thích bài viết của bạn', 24, '31', 'store/profiles/nouser1.png', 3, 1, '2021-06-01 19:40:43', '2021-06-01 19:40:43'),
(104, 2, '<b>Hồ Thanh Phong</b> đã bình luận một bài viết của bạn', 24, '31', 'store/profiles/1622576478.jpg', 2, 1, '2021-06-01 19:41:52', '2021-06-01 19:41:52'),
(105, 1, '<b>Thanh Phong</b> đã thích bài viết của bạn', 24, '31', 'store/profiles/1621001165.jpg', 3, 1, '2021-06-02 03:25:43', '2021-06-02 03:25:43'),
(106, 1, '<b>Thanh Phong</b> đã chấp nhận lời mời kết bạn của bạn', 20, '1', 'store/profiles/1621001165.jpg', 4, 1, '2021-06-02 03:26:33', '2021-06-02 03:26:33'),
(107, 1, '<b>Thanh Phong</b> đã thích bài viết của bạn', 24, '31', 'store/profiles/1621001165.jpg', 3, 1, '2021-06-02 09:28:15', '2021-06-02 09:28:15'),
(108, 1, '<b>Thanh Phong</b> đã thích bài viết của bạn', 2, '32', 'store/profiles/1621001165.jpg', 3, 1, '2021-06-02 11:23:35', '2021-06-02 11:23:35'),
(109, 1, '<b>Thanh Phong</b> đã thích bài viết của bạn', 20, '27', 'store/profiles/1621001165.jpg', 3, 1, '2021-06-02 11:59:01', '2021-06-02 11:59:01'),
(110, 13, '<b>Hồ Thị Minh Trang</b> đã thích bài viết của bạn', 2, '32', 'store/profiles/1621757890.jpg', 3, 1, '2021-06-02 12:36:47', '2021-06-02 12:36:47'),
(111, 13, '<b>Hồ Thị Minh Trang</b> đã thích bài viết của bạn', 24, '31', 'store/profiles/1621757890.jpg', 3, 1, '2021-06-02 12:36:50', '2021-06-02 12:36:50'),
(112, 13, '<b>Hồ Thị Minh Trang</b> đã thích bài viết của bạn', 23, '30', 'store/profiles/1621757890.jpg', 3, 1, '2021-06-02 12:36:52', '2021-06-02 12:36:52');

-- --------------------------------------------------------

--
-- Table structure for table `notification_types`
--

CREATE TABLE `notification_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notification_types`
--

INSERT INTO `notification_types` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Gửi lời mời kết bạn', '2021-05-20 17:00:00', '2021-05-20 17:00:00'),
(2, 'Bình luận bài viết', '2021-05-20 17:00:00', '2021-05-20 17:00:00'),
(3, 'Thích bài viết', '2021-05-20 17:00:00', '2021-05-20 17:00:00'),
(4, 'Đồng ý lời mời kết bạn', '2021-05-20 17:00:00', '2021-05-20 17:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `participants`
--

CREATE TABLE `participants` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `nickname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `room_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `participants`
--

INSERT INTO `participants` (`id`, `user_id`, `nickname`, `room_id`, `created_at`, `updated_at`) VALUES
(14, 2, 'Thanh Phong Ho', 12, '2021-05-21 17:30:47', '2021-05-28 14:27:19'),
(15, 1, 'Thanh Phong', 12, '2021-05-21 17:30:47', '2021-05-21 17:30:47'),
(22, 17, '1 bạn giấu mặt', 17, '2021-05-24 15:24:53', '2021-05-24 15:24:53'),
(23, 1, 'Thanh Phong', 17, '2021-05-24 15:24:53', '2021-05-24 15:24:53'),
(26, 17, 'Nguyễn Văn B', 19, '2021-05-26 08:13:05', '2021-05-26 08:13:05'),
(27, 14, 'Trần Văn A', 19, '2021-05-26 08:13:05', '2021-05-26 08:13:05'),
(28, 14, 'Trần Văn A', 20, '2021-05-26 08:24:40', '2021-05-26 08:24:40'),
(29, 1, 'Thanh Phong', 20, '2021-05-26 08:24:40', '2021-05-26 08:24:40'),
(30, 17, 'Nguyễn Văn B', 21, '2021-05-26 16:04:39', '2021-05-26 16:04:39'),
(31, 2, 'Hồ Thanh Phong', 21, '2021-05-26 16:04:39', '2021-05-26 16:04:39'),
(32, 2, 'Hồ Thanh Phong', 22, '2021-05-29 01:28:10', '2021-05-29 01:28:10'),
(33, 18, 'test2@gmail.com', 22, '2021-05-29 01:28:10', '2021-05-29 01:28:10'),
(34, 2, 'Phong Ho', 23, '2021-05-29 01:36:26', '2021-05-29 01:37:11'),
(35, 19, 'Nguyễn Văn C', 23, '2021-05-29 01:36:26', '2021-05-29 01:36:26'),
(36, 1, 'Heo 🐷', 24, '2021-06-01 09:10:51', '2021-06-01 09:13:53'),
(37, 13, 'Hồ Thị Minh Trang', 24, '2021-06-01 09:10:51', '2021-06-01 09:10:51'),
(38, 1, 'Thanh Phong', 25, '2021-06-01 12:19:50', '2021-06-01 12:19:50'),
(39, 20, 'Nguyễn Thị Cẩm Huyền', 25, '2021-06-01 12:19:50', '2021-06-01 12:52:20'),
(40, 20, 'Nguyễn Thị Cẩm Huyền', 26, '2021-06-01 13:36:51', '2021-06-01 13:36:51'),
(41, 21, 'Hương Giang', 26, '2021-06-01 13:36:51', '2021-06-01 13:36:51');

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
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `user_id`, `description`, `photo`, `created_at`, `updated_at`) VALUES
(1, 1, 'Nước dừa ngon nhưng đắt', 'store/posts/1621001456.jpg', '2021-05-13 17:10:56', '2021-05-14 14:10:56'),
(2, 1, 'Lag quá đi', 'store/posts/1621845407.jpg', '2021-05-13 17:13:17', '2021-05-14 14:13:17'),
(3, 1, 'Triệu hồi chi thuật', 'store/posts/1621274716.jpg', '2021-05-17 18:05:16', '2021-05-17 18:05:16'),
(4, 1, 'A4 ❤️', 'store/posts/1621274825.jpg', '2021-05-17 18:07:05', '2021-05-17 18:07:05'),
(5, 2, 'Xin chào mọi người', 'store/posts/1621358290.jpg', '2021-05-18 17:17:53', '2021-05-18 17:17:53'),
(7, 1, 'Mận ngon ngọt', 'store/posts/1621707965.jpg', '2021-05-22 18:26:05', '2021-05-22 18:26:05'),
(8, 13, 'Trường THPT Hai Bà Trưng - Huế', 'store/posts/1619372977.jpg', '2021-05-23 08:23:35', '2021-05-23 08:23:35'),
(9, 14, 'Cập nhật ảnh đại diện', 'store/posts/1621766909.jpg', '2021-05-23 10:48:29', '2021-05-23 10:48:29'),
(11, 1, 'Máy bay mơ ước', 'store/posts/1621839600.jpg', '2021-05-24 07:00:00', '2021-05-24 07:00:00'),
(12, 17, 'Quà tặng từ thiên nhiên', 'store/posts/1622252133.jpg', '2021-05-24 08:36:47', '2021-05-24 08:36:47'),
(13, 19, 'Thiên nhiên', 'store/posts/1622252133.jpg', '2021-05-29 01:35:33', '2021-05-29 01:35:33'),
(23, 1, 'Meow', 'store/posts/1621766909.jpg', '2021-05-31 15:05:40', '2021-05-31 15:05:40'),
(25, 1, 'meow meow', '/store/posts/1622476944.jpg', '2021-05-31 16:02:24', '2021-05-31 16:02:24'),
(26, 20, '📷📸: Hà Phạm', '/store/posts/1622550332.jpg', '2021-06-01 12:25:32', '2021-06-01 12:25:32'),
(27, 20, '🌸 🛵 🌏 📷\n❤❤❤', '/store/posts/1622550700.jpg', '2021-06-01 12:31:40', '2021-06-01 12:31:40'),
(28, 20, 'Lâu lâu cũng muốn uống trà\nTiếc rằng đắng quá vẫn là nên thôi🍵\n📷: Ha Pham', '/store/posts/1622555938.jpg', '2021-06-01 13:58:58', '2021-06-01 13:58:58'),
(29, 21, 'Giang này không giống Giang xưa\nThích đăng status, lại ưa khịa người😌😌', '/store/posts/1622556600.jpg', '2021-06-01 14:10:00', '2021-06-01 14:10:00'),
(30, 23, 'Đừng gọi tôi là Nhẫn Wibu. Wibu là Nhẫn, Nhẫn chính là tôi🙄🙄', '/store/posts/1622559274.jpg', '2021-06-01 14:54:34', '2021-06-01 14:54:34'),
(31, 24, 'Nếu đẹp trai là một tội ác\nThì anh đây đáng tội tử hình', '/store/posts/1622573793.jpg', '2021-06-01 18:56:33', '2021-06-01 18:56:33'),
(32, 2, 'Đã cập nhật ảnh đại diện', 'store/profiles/1622576478.jpg', '2021-06-01 19:41:18', '2021-06-01 19:41:18');

-- --------------------------------------------------------

--
-- Table structure for table `privacies`
--

CREATE TABLE `privacies` (
  `id` int(10) UNSIGNED NOT NULL,
  `privacy` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `relationships`
--

CREATE TABLE `relationships` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id1` int(11) NOT NULL,
  `user_id2` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `id` int(10) UNSIGNED NOT NULL,
  `reporter_id` int(11) NOT NULL,
  `content` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `receiver_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'individual',
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `name`, `type`, `photo`, `created_at`, `updated_at`) VALUES
(12, 'Phòng chat', 'individual', 'store/profiles/1621001165.jpg', '2021-05-21 17:30:47', '2021-05-21 17:30:47'),
(17, 'Phòng chat', 'individual', 'store/profiles/1621001165.jpg', '2021-05-24 15:24:53', '2021-05-24 15:24:53'),
(19, 'Phòng chat', 'individual', 'store/profiles/1621766865.jpg', '2021-05-26 08:13:05', '2021-05-26 08:13:05'),
(20, 'Phòng chat', 'individual', 'store/profiles/1621001165.jpg', '2021-05-26 08:24:40', '2021-05-26 08:24:40'),
(21, 'Phòng chat', 'individual', 'store/profiles/nouser1.png', '2021-05-26 16:04:39', '2021-05-26 16:04:39'),
(22, 'Phòng chat', 'individual', 'store/profiles/nouser1.png', '2021-05-29 01:28:10', '2021-05-29 01:28:10'),
(23, 'Phòng chat', 'individual', 'store/profiles/1622251996.jpg', '2021-05-29 01:36:26', '2021-05-29 01:36:26'),
(24, 'Phòng chat', 'individual', 'store/profiles/1621757890.jpg', '2021-06-01 09:10:51', '2021-06-01 09:10:51'),
(25, 'Phòng chat', 'individual', 'store/profiles/1622549839.jpg', '2021-06-01 12:19:50', '2021-06-01 12:19:50'),
(26, 'Phòng chat', 'individual', 'store/profiles/1622554352.jpg', '2021-06-01 13:36:51', '2021-06-01 13:36:51');

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `creater_id` int(11) NOT NULL,
  `receiver_id` int(11) NOT NULL,
  `room_id` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deadline` datetime NOT NULL,
  `note` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `isSubmitted` int(11) NOT NULL DEFAULT 1,
  `submitted_at` datetime DEFAULT NULL,
  `isCompleted` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`id`, `title`, `creater_id`, `receiver_id`, `room_id`, `content`, `deadline`, `note`, `file`, `isSubmitted`, `submitted_at`, `isCompleted`, `created_at`, `updated_at`) VALUES
(11, 'Cuối kì môn android', 1, 2, '12', 'Các chức năng chưa hoàn thiện\n- Gọi điện\n- Giao công việc\n- Tạo sự kiện', '2021-06-03 04:34:00', 'Đã hoàn thành chức năng video call và giao công việc', NULL, 2, '2021-06-03 21:28:16', 2, '2021-05-30 11:34:23', '2021-06-03 15:13:00'),
(13, 'Assignment Final Android', 1, 2, '12', '- Hoàn thành các chức năng của ứng dụng Android cho bài thi cuối kỳ\n- Quay video demo ứng dụng', '2021-06-04 06:30:00', NULL, NULL, 1, NULL, 1, '2021-06-02 13:45:21', '2021-06-02 13:45:21'),
(14, 'Assignment Final Android', 1, 1, '12', '- Hoàn thành các chức năng của ứng dụng Android cho bài thi cuối kỳ\n- Quay video demo ứng dụng', '2021-06-05 06:30:00', NULL, NULL, 1, NULL, 1, '2021-06-02 13:45:21', '2021-06-02 13:45:21'),
(15, 'Nộp báo cáo VDK', 1, 2, '12', '- Làm slide trình chiếu và hoàn thành báo cáo VDK\n- Nộp lên hệ thống elearning', '2021-06-03 23:59:00', NULL, NULL, 1, NULL, 1, '2021-06-02 13:49:06', '2021-06-02 13:49:06');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'store/profiles/nouser1.png',
  `cover` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'store/covers/default.jpg',
  `isActive` int(11) NOT NULL DEFAULT 1,
  `stringeeToken` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `avatar`, `cover`, `isActive`, `stringeeToken`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Thanh Phong', 'htphong01@gmail.com', NULL, '$2y$10$KesgZqbOJH5Q6m3Urby0euStByayK2qlyYcV/BpGgjV0jyP3qLUQe', 'store/profiles/1621001165.jpg', 'store/covers/default.jpg', 1, 'eyJjdHkiOiJzdHJpbmdlZS1hcGk7dj0xIiwidHlwIjoiSldUIiwiYWxnIjoiSFMyNTYifQ.eyJqdGkiOiJTSzJmQ29oeFRHZkx6ZkNac01YOVFHbldwSVZiYnphQzgtMTYyMjUzOTYwMSIsImlzcyI6IlNLMmZDb2h4VEdmTHpmQ1pzTVg5UUduV3BJVmJiemFDOCIsImV4cCI6MTYyNTEzMTYwMSwidXNlcklkIjoiMSJ9.IpQsU0n0pEc9nUtttsWnchgqrh7hJXxEqUrlp44S4sI', NULL, '2021-05-14 14:04:45', '2021-05-14 14:06:05'),
(2, 'Hồ Thanh Phong', 'htphong02@gmail.com', NULL, '$2y$10$LWtMq.lh.QEscJA8jh5ya.rqLpUxcep9bVUS1sFEyNuNzUqI43.MO', 'store/profiles/1622576478.jpg', 'store/covers/default.jpg', 1, 'eyJjdHkiOiJzdHJpbmdlZS1hcGk7dj0xIiwidHlwIjoiSldUIiwiYWxnIjoiSFMyNTYifQ.eyJqdGkiOiJTSzJmQ29oeFRHZkx6ZkNac01YOVFHbldwSVZiYnphQzgtMTYyMjUzOTY1NCIsImlzcyI6IlNLMmZDb2h4VEdmTHpmQ1pzTVg5UUduV3BJVmJiemFDOCIsImV4cCI6MTYyNTEzMTY1NCwidXNlcklkIjoiMiJ9._ARlNCqV2TIj4Xx2t47ASVQ-5w7g4XGdX27Icvxrn3Y', NULL, '2021-05-14 14:17:18', '2021-06-01 19:41:18'),
(13, 'Hồ Thị Minh Trang', 'htmtrang@gmail.com', NULL, '$2y$10$HE9DgmTfCFlgqELXIc1yJuCtAchH4psQ4Dz/iau1A2pAKwq0vKgfe', 'store/profiles/1621757890.jpg', 'store/covers/default.jpg', 1, 'eyJjdHkiOiJzdHJpbmdlZS1hcGk7dj0xIiwidHlwIjoiSldUIiwiYWxnIjoiSFMyNTYifQ.eyJqdGkiOiJTSzJmQ29oeFRHZkx6ZkNac01YOVFHbldwSVZiYnphQzgtMTYyMjUzOTY2NyIsImlzcyI6IlNLMmZDb2h4VEdmTHpmQ1pzTVg5UUduV3BJVmJiemFDOCIsImV4cCI6MTYyNTEzMTY2NywidXNlcklkIjoiMTMifQ.Jurx1gxlhF97W1XC8cPf-kYtMQSvEzJwkvoW5jUcwt8', NULL, '2021-05-23 08:17:24', '2021-05-23 08:18:10'),
(14, 'Trần Văn A', 'test@gmail.com', NULL, '$2y$10$Ny3kxQOoPHGERyWflLV8cOQaI2NT1yg/AKhGcjLVrAHrlkybYvDia', 'store/profiles/1621766865.jpg', 'store/covers/default.jpg', 1, 'eyJjdHkiOiJzdHJpbmdlZS1hcGk7dj0xIiwidHlwIjoiSldUIiwiYWxnIjoiSFMyNTYifQ.eyJqdGkiOiJTSzJmQ29oeFRHZkx6ZkNac01YOVFHbldwSVZiYnphQzgtMTYyMjUzOTY4MiIsImlzcyI6IlNLMmZDb2h4VEdmTHpmQ1pzTVg5UUduV3BJVmJiemFDOCIsImV4cCI6MTYyNTEzMTY4MiwidXNlcklkIjoiMTQifQ.0yeUg-gekAySkAdU6cZlZMo6Z0y8Kbi8wEPEZVCDYO8', NULL, '2021-05-23 10:46:51', '2021-05-23 10:47:46'),
(15, 'Hồ Thanh Phong', 'thanhphong@gmail.com', NULL, '$2y$10$GRxna8PBkknSgWG19vuI8.RVT1Ci8Jmm9bl2RsYqsHgvKGNSdA1e6', 'store/profiles/1621839466.jpg', 'store/covers/default.jpg', 1, 'eyJjdHkiOiJzdHJpbmdlZS1hcGk7dj0xIiwidHlwIjoiSldUIiwiYWxnIjoiSFMyNTYifQ.eyJqdGkiOiJTSzJmQ29oeFRHZkx6ZkNac01YOVFHbldwSVZiYnphQzgtMTYyMjUzOTY5MiIsImlzcyI6IlNLMmZDb2h4VEdmTHpmQ1pzTVg5UUduV3BJVmJiemFDOCIsImV4cCI6MTYyNTEzMTY5MiwidXNlcklkIjoiMTUifQ.ZL4xVxaQDLZd1TpY1pcw5jbLhW23v8uC5POwBvA-uYg', NULL, '2021-05-24 06:56:51', '2021-05-24 06:57:46'),
(17, 'Nguyễn Văn B', 'test1@gmail.com', NULL, '$2y$10$M5E7nsKHZMFLSf5/R/F3zOtE93FoP/O2qgnvMxnkjT8cSlttbn5lG', 'store/profiles/1621845371.jpg', 'store/covers/default.jpg', 1, 'eyJjdHkiOiJzdHJpbmdlZS1hcGk7dj0xIiwidHlwIjoiSldUIiwiYWxnIjoiSFMyNTYifQ.eyJqdGkiOiJTSzJmQ29oeFRHZkx6ZkNac01YOVFHbldwSVZiYnphQzgtMTYyMjUzOTcwOSIsImlzcyI6IlNLMmZDb2h4VEdmTHpmQ1pzTVg5UUduV3BJVmJiemFDOCIsImV4cCI6MTYyNTEzMTcwOSwidXNlcklkIjoiMTcifQ.vh4jmDstvnm5rtSrE-7YcABGIi8qHdbeIOhaafzRn4g', NULL, '2021-05-24 08:35:34', '2021-05-24 08:36:11'),
(18, 'test2@gmail.com', 'test2@gmail.com', NULL, '$2y$10$17ZOHD9YIy4Sr/PhHXmxqeX28OMVaRKyimQyAe.rGRkWi8AoPloma', 'store/profiles/nouser1.png', 'store/covers/default.jpg', 1, 'eyJjdHkiOiJzdHJpbmdlZS1hcGk7dj0xIiwidHlwIjoiSldUIiwiYWxnIjoiSFMyNTYifQ.eyJqdGkiOiJTSzJmQ29oeFRHZkx6ZkNac01YOVFHbldwSVZiYnphQzgtMTYyMjUzOTcxNyIsImlzcyI6IlNLMmZDb2h4VEdmTHpmQ1pzTVg5UUduV3BJVmJiemFDOCIsImV4cCI6MTYyNTEzMTcxNywidXNlcklkIjoiMTgifQ.Gq2tFJGNzBbkBCSx3INkZDB2GShf33KJCN5GbZVC4LU', NULL, '2021-05-29 01:25:24', '2021-05-29 01:25:24'),
(19, 'Nguyễn Văn C', 'test3@gmail.com', NULL, '$2y$10$TXw8sylGRDc9kIuQyH9zjeuHE4tYSm3civnBqvEnCPfG2.ziDk2Ly', 'store/profiles/1622251996.jpg', 'store/covers/default.jpg', 1, 'eyJjdHkiOiJzdHJpbmdlZS1hcGk7dj0xIiwidHlwIjoiSldUIiwiYWxnIjoiSFMyNTYifQ.eyJqdGkiOiJTSzJmQ29oeFRHZkx6ZkNac01YOVFHbldwSVZiYnphQzgtMTYyMjUzOTcyNSIsImlzcyI6IlNLMmZDb2h4VEdmTHpmQ1pzTVg5UUduV3BJVmJiemFDOCIsImV4cCI6MTYyNTEzMTcyNSwidXNlcklkIjoiMTkifQ.z5m3strE3gnInLGdjqFtG8O31nZy6j8A8cJLGaIPnaw', NULL, '2021-05-29 01:32:30', '2021-05-29 01:33:17'),
(20, 'Nguyễn Thị Cẩm Huyền', 'ntchuyen.19it1@vku.udn.vn', NULL, '$2y$10$L9zlDce17w/x3i75E9PkBu6W.FeiEAUKCm4NfzFgBl9k8nXQamZ0S', 'store/profiles/1622549839.jpg', 'store/covers/default.jpg', 1, 'eyJjdHkiOiJzdHJpbmdlZS1hcGk7dj0xIiwidHlwIjoiSldUIiwiYWxnIjoiSFMyNTYifQ.eyJqdGkiOiJTSzJmQ29oeFRHZkx6ZkNac01YOVFHbldwSVZiYnphQzgtMTYyMjU1MDU4MSIsImlzcyI6IlNLMmZDb2h4VEdmTHpmQ1pzTVg5UUduV3BJVmJiemFDOCIsImV4cCI6MTYyNTE0MjU4MSwidXNlcklkIjoiMjAifQ.LdQRf2dp1Rdf4zvoYKeB8QPZkyc_PqTryHjUml3bpr0', NULL, '2021-06-01 12:16:06', '2021-06-01 12:17:19'),
(21, 'Hương Giang', 'nthgiang.19it1@vku.udn.vn', NULL, '$2y$10$l0szfIXTO4cQqspSvsYKaO/3fpYQmJwSSkbzF4tjaLhS/0IWspeK.', 'store/profiles/1622554352.jpg', 'store/covers/default.jpg', 1, 'eyJjdHkiOiJzdHJpbmdlZS1hcGk7dj0xIiwidHlwIjoiSldUIiwiYWxnIjoiSFMyNTYifQ.eyJqdGkiOiJTSzJmQ29oeFRHZkx6ZkNac01YOVFHbldwSVZiYnphQzgtMTYyMjU1NjA1MyIsImlzcyI6IlNLMmZDb2h4VEdmTHpmQ1pzTVg5UUduV3BJVmJiemFDOCIsImV4cCI6MTYyNTE0ODA1MywidXNlcklkIjoiMjEifQ.Z6amFJzd8QNv_cQMa2yFRvOELebYLap3xKYTSmuE_qg', NULL, '2021-06-01 13:29:08', '2021-06-01 13:32:32'),
(23, 'Nguyễn Ngọc Nhẫn', 'nnnhan.19it1@vku.ud.vn', NULL, '$2y$10$XdPwhGT0IvZS0UqpIq87BegNXw2XzLmptpQSYMvKVUStM9U0FfuXq', 'store/profiles/1622558802.jpg', 'store/covers/default.jpg', 1, 'eyJjdHkiOiJzdHJpbmdlZS1hcGk7dj0xIiwidHlwIjoiSldUIiwiYWxnIjoiSFMyNTYifQ.eyJqdGkiOiJTSzJmQ29oeFRHZkx6ZkNac01YOVFHbldwSVZiYnphQzgtMTYyMjU3NjIwMCIsImlzcyI6IlNLMmZDb2h4VEdmTHpmQ1pzTVg5UUduV3BJVmJiemFDOCIsImV4cCI6MTYyNTE2ODIwMCwidXNlcklkIjoiMjMifQ.9E40KQMBGUO0NtOgqES3mF8AidiYAchHU9E-u5xvZKQ', NULL, '2021-06-01 14:45:22', '2021-06-01 14:46:42'),
(24, 'Nguyễn Quang Chung', 'nqchung.19it1@vku.udn.vn', NULL, '$2y$10$ntUS/f9is4nFD32AwYjazetBzywnsEN0PAzMKnQUMVUgB37rhDmJS', 'store/profiles/1622576141.jpg', 'store/covers/default.jpg', 1, 'eyJjdHkiOiJzdHJpbmdlZS1hcGk7dj0xIiwidHlwIjoiSldUIiwiYWxnIjoiSFMyNTYifQ.eyJqdGkiOiJTSzJmQ29oeFRHZkx6ZkNac01YOVFHbldwSVZiYnphQzgtMTYyMjU3NjIwNyIsImlzcyI6IlNLMmZDb2h4VEdmTHpmQ1pzTVg5UUduV3BJVmJiemFDOCIsImV4cCI6MTYyNTE2ODIwNywidXNlcklkIjoiMjQifQ.ow_oZFwLF0kv2uqaHQKAOjGaTNXHsVRExVTgfc9VRmg', NULL, '2021-06-01 18:53:41', '2021-06-01 19:35:41');

-- --------------------------------------------------------

--
-- Table structure for table `user_infors`
--

CREATE TABLE `user_infors` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `dateOfBirth` date DEFAULT NULL,
  `gender` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `education` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `work` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phoneNumber` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `relationship` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_infors`
--

INSERT INTO `user_infors` (`id`, `user_id`, `dateOfBirth`, `gender`, `address`, `education`, `work`, `phoneNumber`, `relationship`, `created_at`, `updated_at`) VALUES
(1, 1, '2001-07-06', 'Nam', '1/12/62 Hoàng Thị Loan, Huế', 'VKU', 'Đà Nẵng', '0795525037', NULL, '2021-05-14 14:04:45', '2021-05-31 18:29:13'),
(2, 2, '2001-07-06', 'Nam', '470 Trần Đại Nghĩa, Đà Nẵng', 'Trường Đại học Công nghệ thông tin và Truyền thông Việt Hàn', NULL, '0795525037', NULL, '2021-05-14 14:17:18', '2021-05-20 11:52:57'),
(13, 13, '2002-11-20', 'Nữ', NULL, NULL, NULL, NULL, NULL, '2021-05-23 08:17:24', '2021-05-23 08:48:57'),
(14, 14, '2001-03-03', 'Nam', NULL, NULL, NULL, NULL, NULL, '2021-05-23 10:46:51', '2021-05-23 10:47:46'),
(15, 15, '2001-07-06', 'Nam', NULL, NULL, NULL, NULL, NULL, '2021-05-24 06:56:51', '2021-05-24 06:57:46'),
(16, 17, '2001-07-06', 'Nam', NULL, NULL, NULL, NULL, NULL, '2021-05-24 08:35:34', '2021-05-24 08:36:11'),
(17, 18, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-05-29 01:25:24', '2021-05-29 01:25:24'),
(18, 19, '2001-07-06', 'Nam', 'Huế, Việt Nam', 'VKU', NULL, NULL, NULL, '2021-05-29 01:32:30', '2021-05-29 01:35:10'),
(19, 20, '2001-07-07', 'Nữ', 'Cam Lộ', 'Trường ĐH Công nghệ thông tin & Truyền thông Việt Hàn', 'Đà Nẵng', '0123456789', NULL, '2021-06-01 12:16:06', '2021-06-01 12:18:54'),
(20, 21, '2001-03-05', 'Nữ', NULL, NULL, NULL, NULL, NULL, '2021-06-01 13:29:08', '2021-06-01 13:32:32'),
(21, 22, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-06-01 14:41:16', '2021-06-01 14:41:16'),
(22, 23, '2001-04-28', 'Nam', NULL, NULL, NULL, NULL, NULL, '2021-06-01 14:45:22', '2021-06-01 14:46:42'),
(23, 24, '2001-01-09', 'Nam', NULL, NULL, NULL, NULL, NULL, '2021-06-01 18:53:41', '2021-06-01 18:55:05');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_user_id_foreign` (`user_id`),
  ADD KEY `comments_post_id_foreign` (`post_id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event_attenders`
--
ALTER TABLE `event_attenders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `friends`
--
ALTER TABLE `friends`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `helps`
--
ALTER TABLE `helps`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `likes_user_id_foreign` (`user_id`),
  ADD KEY `likes_post_id_foreign` (`post_id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
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
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notification_types`
--
ALTER TABLE `notification_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `participants`
--
ALTER TABLE `participants`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `posts_user_id_foreign` (`user_id`);

--
-- Indexes for table `privacies`
--
ALTER TABLE `privacies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `relationships`
--
ALTER TABLE `relationships`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_infors`
--
ALTER TABLE `user_infors`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `event_attenders`
--
ALTER TABLE `event_attenders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `friends`
--
ALTER TABLE `friends`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `helps`
--
ALTER TABLE `helps`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=269;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;

--
-- AUTO_INCREMENT for table `notification_types`
--
ALTER TABLE `notification_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `participants`
--
ALTER TABLE `participants`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `privacies`
--
ALTER TABLE `privacies`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `relationships`
--
ALTER TABLE `relationships`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `user_infors`
--
ALTER TABLE `user_infors`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `comments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `likes`
--
ALTER TABLE `likes`
  ADD CONSTRAINT `likes_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `likes_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
