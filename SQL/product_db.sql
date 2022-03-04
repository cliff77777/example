-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2022-03-04 07:12:37
-- 伺服器版本： 10.4.22-MariaDB
-- PHP 版本： 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫: `product_db`
--

-- --------------------------------------------------------

--
-- 資料表結構 `brand_list`
--

CREATE TABLE `brand_list` (
  `id` tinyint(100) UNSIGNED NOT NULL,
  `brand_name` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `brand_list`
--

INSERT INTO `brand_list` (`id`, `brand_name`) VALUES
(1, '自有品牌');

-- --------------------------------------------------------

--
-- 資料表結構 `category`
--

CREATE TABLE `category` (
  `id` tinyint(100) UNSIGNED NOT NULL,
  `category` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `category`
--

INSERT INTO `category` (`id`, `category`) VALUES
(1, '切片蛋糕'),
(2, '杯子蛋糕'),
(3, '其他');

-- --------------------------------------------------------

--
-- 資料表結構 `orderdata`
--

CREATE TABLE `orderdata` (
  `id` tinyint(100) UNSIGNED NOT NULL,
  `order_number` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_member` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_date` date NOT NULL,
  `product_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_count` tinyint(10) UNSIGNED NOT NULL,
  `product_price` int(255) UNSIGNED NOT NULL,
  `amount` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- 資料表結構 `product`
--

CREATE TABLE `product` (
  `id` tinyint(100) UNSIGNED NOT NULL,
  `product_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` int(255) UNSIGNED DEFAULT NULL,
  `descript` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `count` tinyint(10) UNSIGNED NOT NULL,
  `order_count` tinyint(10) UNSIGNED NOT NULL,
  `picture` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` tinyint(10) UNSIGNED NOT NULL,
  `valid` tinyint(1) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `product`
--

INSERT INTO `product` (`id`, `product_name`, `brand`, `price`, `descript`, `count`, `order_count`, `picture`, `category`, `valid`) VALUES
(1, '藍莓切片蛋糕', '自有品牌', 120, '這是藍莓切片蛋糕', 19, 1, 'pexels-anna-belousova-10414167.jpg', 1, 1),
(2, '藍莓切片蛋糕', '自有品牌', 120, '這是藍莓切片蛋糕', 20, 0, 'pexels-anna-belousova-10414167.jpg', 1, 0),
(3, '磅蛋糕', '自有品牌', 70, '這是好吃的磅蛋糕', 0, 1, 'pexels-daria-klimova-9928321.jpg', 1, 1),
(4, '堤拉米蘇', '自有品牌', 90, '這是好吃的提拉米蘇蛋糕', 27, 1, 'pexels-elli-1854652.jpg', 1, 1),
(5, '可麗路', '自有品牌', 40, '這是可麗路', 25, 1, 'pexels-geraud-pfeiffer-6605313.jpg', 3, 1),
(6, '生巧克力', '自有品牌', 25, '這是苦苦的巧克力', 26, 1, 'pexels-marta-dzedyshko-2067396.jpg', 3, 1),
(7, '檸檬抹茶千層', '自有品牌', 100, '好吃的檸檬抹茶千層', 18, 1, 'pexels-pixabay-264939.jpg', 1, 1),
(8, '這是手做餅乾', '自有品牌', 50, '這是一包手做餅乾，一包共五片', 17, 1, 'pexels-polina-tankilevitch-4110541.jpg', 3, 1),
(9, '抹茶起司蛋糕', '自有品牌', 100, '好吃的蛋糕', 17, 1, 'pexels-sena-10964755.jpg', 1, 1),
(10, '香草杯子蛋糕', '自有品牌', 60, '唯一的杯子蛋糕', 20, 0, 'pexels-shvets-production-7525116.jpg', 2, 1);

-- --------------------------------------------------------

--
-- 資料表結構 `product_picture_list`
--

CREATE TABLE `product_picture_list` (
  `id` tinyint(100) NOT NULL,
  `picture` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` tinyint(100) NOT NULL,
  `valid` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `product_picture_list`
--

INSERT INTO `product_picture_list` (`id`, `picture`, `product_id`, `valid`) VALUES
(1, 'pexels-anna-belousova-10414167.jpg', 1, 1),
(2, 'pexels-anna-belousova-10414167.jpg', 2, 1),
(3, 'pexels-daria-klimova-9928321.jpg', 3, 1),
(4, 'pexels-elli-1854652.jpg', 4, 1),
(5, 'pexels-geraud-pfeiffer-6605313.jpg', 5, 1),
(6, 'pexels-marta-dzedyshko-2067396.jpg', 6, 1),
(7, 'pexels-pixabay-264939.jpg', 7, 1),
(8, 'pexels-polina-tankilevitch-4110541.jpg', 8, 1),
(9, 'pexels-sena-10964755.jpg', 9, 1),
(10, 'pexels-shvets-production-7525116.jpg', 10, 1);

-- --------------------------------------------------------

--
-- 資料表結構 `users`
--

CREATE TABLE `users` (
  `id` smallint(100) UNSIGNED NOT NULL,
  `role` tinyint(2) NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `account` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `createTime` datetime(6) NOT NULL,
  `valid` tinyint(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `users`
--

INSERT INTO `users` (`id`, `role`, `name`, `account`, `password`, `email`, `phone`, `createTime`, `valid`) VALUES
(1, 0, '管理員', 'admin001', '$2y$10$29nezgjUdJDViF5HXrZPVuQHOXQg3zVDJVfjBcU22Yc57g13QU.oG', 'admin001@test.com', '0911222587', '2022-03-02 18:47:16.000000', 1),
(2, 1, '一般會員一', 'member1', '$2y$10$DBSj0RHbZivQKCipkVXguevkWRt5nDoMO8PeWn4Y978hnrP1JTQPS', 'member1@test.com', '0988777451', '2022-03-02 18:51:31.000000', 1);

-- --------------------------------------------------------

--
-- 資料表結構 `user_order`
--

CREATE TABLE `user_order` (
  `id` tinyint(100) UNSIGNED NOT NULL,
  `user_id` tinyint(100) UNSIGNED NOT NULL,
  `order_time` date NOT NULL,
  `orderNumber` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `user_order`
--

INSERT INTO `user_order` (`id`, `user_id`, `order_time`, `orderNumber`) VALUES
(11, 2, '2022-03-02', '202203021859172');

-- --------------------------------------------------------

--
-- 資料表結構 `user_order_detail`
--

CREATE TABLE `user_order_detail` (
  `id` tinyint(100) UNSIGNED NOT NULL,
  `order_id` tinyint(100) UNSIGNED NOT NULL,
  `product_id` tinyint(100) UNSIGNED NOT NULL,
  `amount` tinyint(100) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `user_order_detail`
--

INSERT INTO `user_order_detail` (`id`, `order_id`, `product_id`, `amount`) VALUES
(24, 11, 4, 1),
(25, 11, 5, 1),
(26, 11, 9, 1),
(27, 11, 7, 1);

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `brand_list`
--
ALTER TABLE `brand_list`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `orderdata`
--
ALTER TABLE `orderdata`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `product_picture_list`
--
ALTER TABLE `product_picture_list`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `user_order`
--
ALTER TABLE `user_order`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `user_order_detail`
--
ALTER TABLE `user_order_detail`
  ADD PRIMARY KEY (`id`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `brand_list`
--
ALTER TABLE `brand_list`
  MODIFY `id` tinyint(100) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `category`
--
ALTER TABLE `category`
  MODIFY `id` tinyint(100) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `orderdata`
--
ALTER TABLE `orderdata`
  MODIFY `id` tinyint(100) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `product`
--
ALTER TABLE `product`
  MODIFY `id` tinyint(100) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `product_picture_list`
--
ALTER TABLE `product_picture_list`
  MODIFY `id` tinyint(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `users`
--
ALTER TABLE `users`
  MODIFY `id` smallint(100) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `user_order`
--
ALTER TABLE `user_order`
  MODIFY `id` tinyint(100) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `user_order_detail`
--
ALTER TABLE `user_order_detail`
  MODIFY `id` tinyint(100) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
