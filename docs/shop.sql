-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost
-- Thời gian đã tạo: Th5 10, 2023 lúc 08:34 AM
-- Phiên bản máy phục vụ: 8.0.30
-- Phiên bản PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `shop`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admins`
--

CREATE TABLE `admins` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'admin'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`, `role`) VALUES
(1, 'Admin', 'admin@gmail.com', '$2y$10$vLbaJJ2xxVEHrAUzYCCOpuWAMWuAPV7zLeaCb.auB6pg9pcOJ.Hd2', NULL, NULL, NULL, 'admin');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `blogs`
--

CREATE TABLE `blogs` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `thumb` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_blog_id` int NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isDeleted` tinyint(1) NOT NULL DEFAULT '0',
  `active` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `carts`
--

CREATE TABLE `carts` (
  `id` bigint UNSIGNED NOT NULL,
  `customer_id` bigint UNSIGNED NOT NULL,
  `status` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `carts`
--

INSERT INTO `carts` (`id`, `customer_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 2, 1, '2023-05-04 00:57:44', '2023-05-04 01:48:00'),
(2, 2, 1, '2023-05-04 01:00:52', '2023-05-04 01:51:18'),
(3, 2, 1, '2023-05-04 01:02:31', '2023-05-04 01:51:55'),
(5, 2, 1, '2023-05-04 01:10:55', '2023-05-04 01:52:14'),
(6, 2, 1, '2023-05-04 01:12:24', '2023-05-04 01:52:22'),
(7, 2, 1, '2023-05-04 01:13:03', '2023-05-04 01:52:34'),
(8, 2, 1, '2023-05-04 01:20:05', '2023-05-04 01:52:41'),
(9, 2, 0, '2023-05-04 01:21:12', '2023-05-04 01:21:12'),
(10, 2, 0, '2023-05-04 01:22:00', '2023-05-04 01:22:00'),
(15, 4, 0, '2023-05-09 06:58:07', '2023-05-09 06:58:07'),
(16, 4, 0, '2023-05-10 01:27:49', '2023-05-10 01:27:49'),
(17, 2, 0, '2023-05-10 01:31:32', '2023-05-10 01:31:32');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart_details`
--

CREATE TABLE `cart_details` (
  `id` bigint UNSIGNED NOT NULL,
  `cart_id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `qty` int NOT NULL,
  `price` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `cart_details`
--

INSERT INTO `cart_details` (`id`, `cart_id`, `product_id`, `qty`, `price`, `created_at`, `updated_at`) VALUES
(1, 1, 12, 4, 100000, '2023-05-04 00:57:45', '2023-05-04 00:57:45'),
(2, 2, 11, 4, 250000, '2023-05-04 01:00:52', '2023-05-04 01:00:52'),
(3, 3, 7, 4, 350000, '2023-05-04 01:02:31', '2023-05-04 01:02:31'),
(4, 4, 10, 5, 300000, '2023-05-04 01:04:36', '2023-05-04 01:04:36'),
(5, 5, 6, 4, 400000, '2023-05-04 01:10:55', '2023-05-04 01:10:55'),
(6, 6, 11, 6, 250000, '2023-05-04 01:12:24', '2023-05-04 01:12:24'),
(7, 7, 10, 6, 300000, '2023-05-04 01:13:03', '2023-05-04 01:13:03'),
(8, 8, 12, 5, 100000, '2023-05-04 01:20:05', '2023-05-04 01:20:05'),
(9, 9, 10, 6, 300000, '2023-05-04 01:21:12', '2023-05-04 01:21:12'),
(10, 10, 12, 5, 100000, '2023-05-04 01:22:00', '2023-05-04 01:22:00'),
(11, 15, 12, 3, 100000, '2023-05-09 06:58:07', '2023-05-09 06:58:07'),
(12, 16, 12, 6, 100000, '2023-05-10 01:27:49', '2023-05-10 01:27:49'),
(13, 17, 11, 5, 250000, '2023-05-10 01:31:32', '2023-05-10 01:31:32');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category_blogs`
--

CREATE TABLE `category_blogs` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` int NOT NULL,
  `thumb` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isDeleted` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `employees`
--

CREATE TABLE `employees` (
  `id` int NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `phone` bigint DEFAULT NULL,
  `position` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Đang đổ dữ liệu cho bảng `employees`
--

INSERT INTO `employees` (`id`, `name`, `address`, `phone`, `position`, `created_at`, `updated_at`) VALUES
(4, 'grhjhr', 'rretret', 5555, '55555', '2023-05-04 05:20:58', '2023-05-04 05:20:58');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `flights`
--

CREATE TABLE `flights` (
  `age` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `menus`
--

CREATE TABLE `menus` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` int NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` int NOT NULL,
  `thumb` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isDeleted` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `menus`
--

INSERT INTO `menus` (`id`, `name`, `parent_id`, `description`, `content`, `slug`, `active`, `thumb`, `isDeleted`, `created_at`, `updated_at`) VALUES
(5, 'Cây cảnh phong thủy', 0, 'Cây cảnh phong thủy', '<p>C&acirc;y cảnh phong thủy&nbsp;C&acirc;y cảnh phong thủy&nbsp;C&acirc;y cảnh phong thủy</p>', 'cay-canh-phong-thuy', 1, '/storage/uploads/2023/05/04/1683185208-Cay-kim-ngan-thuy-sinh-to-255x255.jpg.jpg', 0, '2023-05-04 00:27:01', '2023-05-04 00:27:01'),
(6, 'Cây cảnh trong nhà', 0, 'Cây cảnh trong nhà', '<p>C&acirc;y cảnh trong nh&agrave;&nbsp;C&acirc;y cảnh trong nh&agrave;&nbsp;C&acirc;y cảnh trong nh&agrave;</p>', 'cay-canh-trong-nha', 1, '/storage/uploads/2023/05/04/1683185293-cay-kim-ngan-cu-to-255x255.jpg.jpg', 0, '2023-05-04 00:28:18', '2023-05-04 00:28:18'),
(7, 'Cây cảnh văn phòng', 0, 'Cây cảnh văn phòng Cây cảnh văn phòng Cây cảnh văn phòng', '<p>C&acirc;y cảnh văn ph&ograve;ng&nbsp;C&acirc;y cảnh văn ph&ograve;ng&nbsp;C&acirc;y cảnh văn ph&ograve;ng</p>', 'cay-canh-van-phong', 1, '/storage/uploads/2023/05/04/1683185383-duoi-cong-van-vang-dep-255x255.jpg.jpg', 0, '2023-05-04 00:29:45', '2023-05-04 00:29:45'),
(8, 'Cây thủy sinh', 0, 'Cây thủy sinh Cây thủy sinh', '<p>C&acirc;y thủy sinh&nbsp;C&acirc;y thủy sinh&nbsp;C&acirc;y thủy sinh</p>', 'cay-thuy-sinh', 1, '/storage/uploads/2023/05/04/1683185415-Cay-kim-ngan-thuy-sinh-to-255x255 (1).jpg.jpg', 0, '2023-05-04 00:30:17', '2023-05-04 00:30:17');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_edit1_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2022_08_27_070056_edit_thumb_menus_table', 1),
(7, '2022_08_29_040608_edit_slug_products_table', 1),
(8, '2022_08_30_074359_create_sliders_table', 1),
(9, '2022_09_02_080924_edit_flights_table', 2),
(10, '2022_09_08_020650_create_blogs_table', 2),
(11, '2022_09_08_021111_create_category_blogs_table', 2),
(12, '2022_09_09_142126_create2_carts_table', 2),
(13, '2022_09_11_071829_create_jobs_table', 2),
(14, '2022_09_12_092419_create_sessions_table', 2),
(15, '2022_09_18_014827_edit_admins_table', 2),
(16, '2022_09_20_071307_create_thong_kes_table', 2),
(17, '2022_09_20_072336_edit_cart_details_table', 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `thumb` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `menu_id` bigint UNSIGNED NOT NULL,
  `price` int NOT NULL,
  `price_sale` int NOT NULL,
  `active` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isDeleted` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `content`, `thumb`, `menu_id`, `price`, `price_sale`, `active`, `created_at`, `updated_at`, `slug`, `isDeleted`) VALUES
(1, 'Cây Lan Ý Thuỷ Sinh', 'Cây Lan Ý Thuỷ Sinh', '<p>C&acirc;y Lan &Yacute; Thuỷ Sinh&nbsp;C&acirc;y Lan &Yacute; Thuỷ Sinh&nbsp;C&acirc;y Lan &Yacute; Thuỷ Sinh</p>', '/storage/uploads/2023/05/04/1683183801-lanythuysinh.jpg.jpg', 1, 200000, 0, 1, '2023-05-04 00:03:21', '2023-05-04 00:23:56', 'cay-lan-y-thuy-sinh', 1),
(2, 'Cây Lưỡi Hổ Thủy Sinh', 'Cây Lưỡi Hổ Thủy Sinh', '<p>C&acirc;y Lưỡi Hổ Thủy Sinh&nbsp;C&acirc;y Lưỡi Hổ Thủy Sinh&nbsp;C&acirc;y Lưỡi Hổ Thủy Sinh</p>', '/storage/uploads/2023/05/04/1683183849-cay-luoi-ho-091219-400x400.jpg.jpg', 2, 190000, 0, 1, '2023-05-04 00:04:12', '2023-05-04 00:24:00', 'cay-luoi-ho-thuy-sinh', 1),
(3, 'Cây Kim Ngân củ to', 'Cây Kim Ngân củ to phong thủy', '<p>C&acirc;y Kim Ng&acirc;n củ to phong thủy</p>', '/storage/uploads/2023/05/04/1683185479-cay-kim-ngan-cu-to-255x255.jpg.jpg', 5, 200000, 0, 1, '2023-05-04 00:31:22', '2023-05-04 05:22:50', 'cay-kim-ngan-cu-to', 1),
(4, 'Cây phú quý để bàn', 'Cây phú quý để bàn Cây phú quý để bàn', '<p>C&acirc;y ph&uacute; qu&yacute; để b&agrave;n&nbsp;C&acirc;y ph&uacute; qu&yacute; để b&agrave;n</p>', '/storage/uploads/2023/05/04/1683185521-cay-phu-quy-de-ban-dep-255x255.jpg.jpg', 5, 250000, 0, 1, '2023-05-04 00:32:03', '2023-05-04 00:32:03', 'cay-phu-quy-de-ban', 0),
(5, 'Cây nhất mạc hương', 'Cây nhất mạc hương Cây nhất mạc hương', '<p>C&acirc;y nhất mạc hương&nbsp;C&acirc;y nhất mạc hương&nbsp;C&acirc;y nhất mạc hương</p>', '/storage/uploads/2023/05/04/1683185565-cay-nhat-mat-huong-255x255.jpg.jpg', 5, 300000, 0, 1, '2023-05-04 00:32:49', '2023-05-04 00:32:49', 'cay-nhat-mac-huong', 0),
(6, 'Cây Kim ngân thủy sinh', 'Cây Kim ngân thủy sinh Cây Kim ngân thủy sinh Cây Kim ngân thủy sinh', '<p>C&acirc;y Kim ng&acirc;n thủy sinh&nbsp;C&acirc;y Kim ng&acirc;n thủy sinh&nbsp;C&acirc;y Kim ng&acirc;n thủy sinh&nbsp;</p>', '/storage/uploads/2023/05/04/1683185635-Cay-kim-ngan-thuy-sinh-to-255x255 (1).jpg.jpg', 6, 400000, 0, 1, '2023-05-04 00:33:57', '2023-05-04 00:33:57', 'cay-kim-ngan-thuy-sinh', 0),
(7, 'Cây hạnh phúc thủy sinh', 'Cây hạnh phúc thủy sinh Cây hạnh phúc thủy sinh Cây hạnh phúc thủy sinh', '<p>C&acirc;y hạnh ph&uacute;c thủy sinh&nbsp;C&acirc;y hạnh ph&uacute;c thủy sinh&nbsp;C&acirc;y hạnh ph&uacute;c thủy sinh&nbsp;C&acirc;y hạnh ph&uacute;c thủy sinh</p>', '/storage/uploads/2023/05/04/1683185693-cay-hanh-phuc-thuy-sinh-255x255.jpg.jpg', 6, 350000, 0, 1, '2023-05-04 00:34:54', '2023-05-04 00:34:54', 'cay-hanh-phuc-thuy-sinh', 0),
(8, 'Cây lưỡi hổ đại', 'Cây lưỡi hổ đại Cây lưỡi hổ đại Cây lưỡi hổ đại', '<p>C&acirc;y lưỡi hổ đại&nbsp;C&acirc;y lưỡi hổ đại&nbsp;C&acirc;y lưỡi hổ đại&nbsp;C&acirc;y lưỡi hổ đại</p>', '/storage/uploads/2023/05/04/1683185749-cay-luoi-ho-dai-255x255.jpg.jpg', 6, 100000, 0, 1, '2023-05-04 00:35:50', '2023-05-04 00:35:50', 'cay-luoi-ho-dai', 0),
(9, 'Cây trúc nhật', 'Cây trúc nhật Cây trúc nhật', '<p>C&acirc;y tr&uacute;c nhật&nbsp;C&acirc;y tr&uacute;c nhật&nbsp;C&acirc;y tr&uacute;c nhật</p>', '/storage/uploads/2023/05/04/1683185822-cay-truc-nhat-dep-255x255.jpg.jpg', 7, 1900000, 0, 1, '2023-05-04 00:37:03', '2023-05-04 00:37:03', 'cay-truc-nhat', 0),
(10, 'Cây cau lụa vàng', 'Cây cau lụa vàng Cây cau lụa vàng Cây cau lụa vàng', '<p>C&acirc;y cau lụa v&agrave;ng&nbsp;C&acirc;y cau lụa v&agrave;ng&nbsp;C&acirc;y cau lụa v&agrave;ng</p>', '/storage/uploads/2023/05/04/1683185863-cay-cau-vang-255x255.jpg.jpg', 7, 300000, 0, 1, '2023-05-04 00:37:45', '2023-05-04 00:37:45', 'cay-cau-lua-vang', 0),
(11, 'Cây kim tiền', 'Cây kim tiền Cây kim tiền Cây kim tiền', '<p>C&acirc;y kim tiền&nbsp;C&acirc;y kim tiền&nbsp;C&acirc;y kim tiền&nbsp;C&acirc;y kim tiền</p>', '/storage/uploads/2023/05/04/1683185913-kim-tien-de-ban-bui-to-255x255.jpg.jpg', 7, 250000, 0, 1, '2023-05-04 00:38:36', '2023-05-04 00:38:36', 'cay-kim-tien', 0),
(12, 'Cây kim ngân', 'Cây kim ngân Cây kim ngân Cây kim ngân', '<p>C&acirc;y kim ng&acirc;n&nbsp;C&acirc;y kim ng&acirc;n&nbsp;C&acirc;y kim ng&acirc;nC&acirc;y kim ng&acirc;n</p>', '/storage/uploads/2023/05/04/1683185959-cay-kim-ngan-3-than-255x255.jpg.jpg', 7, 400000, 100000, 1, '2023-05-04 00:39:24', '2023-05-04 00:39:24', 'cay-kim-ngan', 0),
(13, 'Cây kim ngân xoắn', 'Cây kim ngân xoắn Cây kim ngân xoắn Cây kim ngân xoắn', '<p>C&acirc;y kim ng&acirc;n xoắn&nbsp;C&acirc;y kim ng&acirc;n xoắn&nbsp;C&acirc;y kim ng&acirc;n xoắn</p>', '/storage/uploads/2023/05/04/1683186004-cay-kim-ngan-that-bim-to-1-255x255.jpg.jpg', 7, 400000, 200000, 1, '2023-05-04 00:40:07', '2023-05-04 00:40:07', 'cay-kim-ngan-xoan', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('D0ZlVXydxxTj8IQ1oAjgO0g2obhbLq50tBabJLDG', 4, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/112.0.0.0 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoiWDZMM1dLQXAwRVAyYnhPa01ZYVUzTjQ3UnZIcm5meGZWdThQM2VxbyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzM6Imh0dHA6Ly90aHVjdGFwY3VvaWtob2EyLmNvbS9jYXJ0cyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6OToidXNlcl9uYW1lIjtzOjE2OiJQaGFuIE5o4bqtdCBMaW5oIjtzOjEwOiJ1c2VyX2VtYWlsIjtzOjMwOiJwbmxpbmhfMjB0aEBzdHVkZW50LmFndS5lZHUudm4iO3M6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjQ7fQ==', 1683707277),
('Fd4yPaxLchZFTLY4yWjhXyRdECL3cFFiNkXevbbi', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/112.0.0.0 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoidk9aZnB6c3RoTGdiSVdBeDhISXdsWmhHTUxhemZXcGk2M3dIM0x6OCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzM6Imh0dHA6Ly90aHVjdGFwY3VvaWtob2EyLmNvbS9jYXJ0cyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjI7czo5OiJ1c2VyX25hbWUiO3M6OToiTGluaCBQaGFuIjtzOjEwOiJ1c2VyX2VtYWlsIjtzOjI0OiJwaGFubGluaDA2MDIxOUBnbWFpbC5jb20iO30=', 1683707495);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `thumb` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sort_by` int NOT NULL,
  `active` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `sliders`
--

INSERT INTO `sliders` (`id`, `name`, `url`, `thumb`, `sort_by`, `active`, `created_at`, `updated_at`) VALUES
(2, 'Cây cảnh văn phòng', NULL, '/storage/uploads/2023/05/04/1683184474-caycanh1.jpeg.jpeg', 1, 1, '2023-05-04 00:14:38', '2023-05-04 00:14:38'),
(3, 'Cây cảnh nội thất', NULL, '/storage/uploads/2023/05/04/1683184578-caycanh.jpeg.jpeg', 2, 1, '2023-05-04 00:16:21', '2023-05-04 00:16:21');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thong_kes`
--

CREATE TABLE `thong_kes` (
  `id` bigint UNSIGNED NOT NULL,
  `ngaydat` date NOT NULL,
  `donhang` int NOT NULL,
  `doanhthu` bigint NOT NULL,
  `soluong` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `thong_kes`
--

INSERT INTO `thong_kes` (`id`, `ngaydat`, `donhang`, `doanhthu`, `soluong`, `created_at`, `updated_at`) VALUES
(1, '2023-05-04', 8, 9700000, 38, '2023-05-04 01:48:00', '2023-05-04 01:52:41');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` bigint UNSIGNED DEFAULT NULL,
  `profile_photo_path` varchar(2048) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '09123',
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'viet nam',
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `two_factor_confirmed_at`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`, `phone`, `address`, `role`) VALUES
(1, 'User', 'user@gmail.com', NULL, '$2y$10$vXLGZ61rcdUARBmpRigVCOu5ri0HNGmYGLyQh.AFsaynYN5/5RPQy', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '09123', 'viet nam', 'user'),
(2, 'Linh Phan', 'phanlinh060219@gmail.com', NULL, '$2y$10$HPzJfCGtZhWjR6w1KZl6xeh079S/axaiItaQqwSevQ8MrIAs0aDSG', NULL, NULL, NULL, NULL, NULL, 'https://lh3.googleusercontent.com/a/AGNmyxZFr3BaNslfjbqhNk7MXW_TQtNFMDQYyGeISClh=s96-c', '2023-05-03 23:45:50', '2023-05-03 23:45:50', '09123', 'viet nam', 'user'),
(3, 'Linh Phan', 'nguyentoan280719@gmail.com', NULL, '$2y$10$rizzoszszQM9RF3K8ngIiOJDcqD.Zv2MLiYdxBdNuzch3SkDfC.Ca', NULL, NULL, NULL, NULL, NULL, 'https://lh3.googleusercontent.com/a/AGNmyxYwVfOnSbmbbJF6FYDwLmYvpbUnWubNU88plaKN=s96-c', '2023-05-04 19:15:31', '2023-05-04 19:15:31', '09123', 'viet nam', 'user'),
(4, 'Phan Nhật Linh', 'pnlinh_20th@student.agu.edu.vn', NULL, '$2y$10$gBJtwPcGDkQUmIvx38aS6e.9LMHJ1rbilB3Y7PijMpEVXMD/afrNO', NULL, NULL, NULL, NULL, NULL, 'https://lh3.googleusercontent.com/a/AGNmyxZiIunYQOe2QCf69oQ1kh0h-PzMxxk_Zr4mjMuY=s96-c', '2023-05-09 06:52:47', '2023-05-09 06:52:47', '09123', 'viet nam', 'user');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Chỉ mục cho bảng `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `carts_customer_id_foreign` (`customer_id`);

--
-- Chỉ mục cho bảng `cart_details`
--
ALTER TABLE `cart_details`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `category_blogs`
--
ALTER TABLE `category_blogs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `category_blogs_slug_unique` (`slug`);

--
-- Chỉ mục cho bảng `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Chỉ mục cho bảng `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Chỉ mục cho bảng `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `menus_slug_unique` (`slug`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Chỉ mục cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Chỉ mục cho bảng `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `thong_kes`
--
ALTER TABLE `thong_kes`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT cho bảng `cart_details`
--
ALTER TABLE `cart_details`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `category_blogs`
--
ALTER TABLE `category_blogs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `menus`
--
ALTER TABLE `menus`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `thong_kes`
--
ALTER TABLE `thong_kes`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `cart_details`
--
ALTER TABLE `cart_details`
  ADD CONSTRAINT `cart_details_ibfk_1` FOREIGN KEY (`id`) REFERENCES `products` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
