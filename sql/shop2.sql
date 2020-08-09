-- phpMyAdmin SQL Dump
-- version 4.9.3
-- https://www.phpmyadmin.net/
--
-- Хост: localhost:3306
-- Время создания: Июл 28 2020 г., 15:30
-- Версия сервера: 5.7.26
-- Версия PHP: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- База данных: `laravel_shop2`
--

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alias` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc` text COLLATE utf8mb4_unicode_ci,
  `img` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`id`, `title`, `alias`, `desc`, `img`, `created_at`, `updated_at`) VALUES
(1, 'Мобильные телефоны', 'mobile-phone', 'В этом разделе вы найдёте самые популярные мобильные телефонамы по отличным ценам!', 'categories/mobile-phone_mobile.jpg', NULL, '2020-07-21 11:21:31'),
(2, 'Портативная техника', 'portable', 'Раздел с портативной техникой.', 'categories/portable_portable.jpg', NULL, '2020-07-21 11:21:42'),
(3, 'Бытовая техника', 'household', 'Раздел с бытовой техникой.', 'categories/household_appliance.jpg', NULL, '2020-07-21 11:20:37'),
(4, 'Книги', 'books', 'Новая категория книг!', 'categories/books_books-icon-symbol-6649973.jpg', '2020-07-19 07:40:59', '2020-07-21 11:19:14');

-- --------------------------------------------------------

--
-- Структура таблицы `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2020_07_15_144529_create_categories_table', 1),
(8, '2020_07_15_144540_create_products_table', 2),
(9, '2020_07_16_123928_create_orders_table', 3),
(10, '2020_07_16_124209_create_order_product_table', 3),
(13, '2020_07_18_182327_add_user_id_orders_table', 4),
(14, '2020_07_18_182518_add_is_admin_users_table', 4),
(16, '2020_07_21_183355_add_lable_in_products_table', 5);

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`id`, `status`, `name`, `phone`, `created_at`, `updated_at`, `user_id`) VALUES
(1, 0, NULL, NULL, '2020-07-16 10:31:04', '2020-07-16 10:31:04', NULL),
(2, 0, NULL, NULL, '2020-07-16 10:31:06', '2020-07-16 10:31:06', NULL),
(3, 0, NULL, NULL, '2020-07-16 10:31:07', '2020-07-16 10:31:07', NULL),
(4, 0, NULL, NULL, '2020-07-16 10:31:08', '2020-07-16 10:31:08', NULL),
(5, 0, NULL, NULL, '2020-07-16 10:31:09', '2020-07-16 10:31:09', NULL),
(6, 0, NULL, NULL, '2020-07-16 10:31:10', '2020-07-16 10:31:10', NULL),
(7, 0, NULL, NULL, '2020-07-16 10:31:11', '2020-07-16 10:31:11', NULL),
(8, 0, NULL, NULL, '2020-07-16 10:31:12', '2020-07-16 10:31:12', NULL),
(9, 0, NULL, NULL, '2020-07-16 10:32:25', '2020-07-16 10:32:25', NULL),
(13, 0, NULL, NULL, '2020-07-17 06:50:33', '2020-07-17 06:50:33', NULL),
(14, 0, NULL, NULL, '2020-07-17 11:57:52', '2020-07-17 11:57:52', NULL),
(15, 0, NULL, NULL, '2020-07-18 07:03:06', '2020-07-18 07:03:06', NULL),
(17, 0, NULL, NULL, '2020-07-18 15:08:19', '2020-07-18 15:08:19', NULL),
(18, 1, 'Ваня', '89781231232', '2020-07-18 15:47:54', '2020-07-18 15:48:05', 2),
(19, 1, 'Алекандр', '+79182154653', '2020-07-19 06:43:34', '2020-07-19 11:27:16', 1),
(21, 1, 'Иван', '89781253456', '2020-07-20 08:54:44', '2020-07-20 08:55:00', 2),
(23, 1, 'anront', '123421342142', '2020-07-20 09:14:57', '2020-07-20 09:23:14', 1),
(24, 1, 'Антон', '89242457566', '2020-07-20 11:40:34', '2020-07-20 11:41:26', 1),
(27, 1, 'qweweq', '342423424324', '2020-07-22 15:28:31', '2020-07-22 15:35:03', NULL),
(28, 1, 'wefwe', '213214212424124', '2020-07-22 15:35:20', '2020-07-22 15:42:21', NULL),
(29, 1, '2132', '23123231123213', '2020-07-22 15:42:25', '2020-07-22 15:42:33', NULL),
(30, 0, NULL, NULL, '2020-07-22 15:45:02', '2020-07-22 15:45:02', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `order_product`
--

CREATE TABLE `order_product` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `count` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `order_product`
--

INSERT INTO `order_product` (`id`, `order_id`, `product_id`, `count`, `created_at`, `updated_at`) VALUES
(17, 9, 12, 3, '2020-07-16 11:14:33', '2020-07-16 11:35:19'),
(18, 9, 8, 1, '2020-07-16 11:35:35', '2020-07-16 11:35:35'),
(49, 10, 1, 1, '2020-07-17 05:23:53', '2020-07-17 05:23:53'),
(50, 11, 6, 1, '2020-07-17 05:42:43', '2020-07-17 05:42:43'),
(51, 12, 2, 1, '2020-07-17 05:42:55', '2020-07-17 05:42:55'),
(52, 13, 1, 1, '2020-07-17 06:50:33', '2020-07-17 06:50:33'),
(53, 14, 2, 2, '2020-07-17 11:57:52', '2020-07-17 12:00:22'),
(55, 16, 1, 1, '2020-07-18 10:32:05', '2020-07-18 10:32:05'),
(60, 18, 10, 1, '2020-07-18 15:47:54', '2020-07-18 15:47:54'),
(62, 19, 9, 1, '2020-07-19 11:22:46', '2020-07-19 11:22:46'),
(63, 19, 20, 1, '2020-07-19 11:26:18', '2020-07-19 11:26:18'),
(64, 19, 13, 1, '2020-07-19 11:26:27', '2020-07-19 11:26:27'),
(65, 19, 2, 1, '2020-07-19 11:26:46', '2020-07-19 11:26:46'),
(66, 20, 10, 1, '2020-07-19 14:03:17', '2020-07-19 14:03:17'),
(67, 21, 20, 1, '2020-07-20 08:54:44', '2020-07-20 08:54:44'),
(68, 22, 13, 1, '2020-07-20 08:56:10', '2020-07-20 08:56:10'),
(69, 23, 15, 1, '2020-07-20 09:14:57', '2020-07-20 09:14:57'),
(70, 24, 2, 5, '2020-07-20 11:40:34', '2020-07-20 11:40:35'),
(71, 24, 20, 1, '2020-07-20 11:40:40', '2020-07-20 11:40:40'),
(72, 24, 15, 1, '2020-07-20 11:40:43', '2020-07-20 11:40:43'),
(73, 24, 13, 2, '2020-07-20 11:40:45', '2020-07-20 11:40:46'),
(81, 27, 20, 1, '2020-07-22 15:34:53', '2020-07-22 15:34:53'),
(86, 28, 20, 4, '2020-07-22 15:37:06', '2020-07-22 15:41:49'),
(87, 28, 13, 1, '2020-07-22 15:37:12', '2020-07-22 15:37:12'),
(88, 29, 20, 2, '2020-07-22 15:42:25', '2020-07-22 15:42:27'),
(89, 30, 10, 1, '2020-07-22 15:45:02', '2020-07-22 15:45:02');

-- --------------------------------------------------------

--
-- Структура таблицы `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alias` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL DEFAULT '0',
  `desc` text COLLATE utf8mb4_unicode_ci,
  `img` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `new` tinyint(1) NOT NULL DEFAULT '0',
  `recommend` tinyint(1) NOT NULL DEFAULT '0',
  `hit` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`id`, `category_id`, `title`, `alias`, `price`, `desc`, `img`, `new`, `recommend`, `hit`, `created_at`, `updated_at`) VALUES
(2, 1, 'iPhone X 256GB', 'iPhone-X-256GB', 89990, 'Отличный продвинутый телефон с памятью на 256 gb', 'products/iPhone-X-256GB_iphone_x_silver.jpg', 1, 1, 1, NULL, '2020-07-22 09:04:53'),
(3, 1, 'HTC One S', 'HTC-One-S', 12490, 'Зачем платить за лишнее? Легендарный HTC One S', 'products/bxhc3ujooR9T2zGX1klcc5O13mIBuV9ORmqScVS5.png', 0, 0, 0, NULL, '2020-07-19 11:07:20'),
(4, 1, 'iPhone 5SE', 'iPhone-5SE', 17221, 'Отличный классический iPhone', 'products/OwqLzH60lPmWxOeH04W2ocP9HLVJyOSAsG6e1ALz.jpeg', 0, 0, 1, NULL, '2020-07-22 09:04:46'),
(5, 1, 'Samsung Galaxy J6', 'Samsung-Galaxy-J6', 11980, 'Современный телефон начального уровня', 'products/Samsung-Galaxy-J6_samsung_j6.jpg', 0, 1, 0, NULL, '2020-07-22 09:04:58'),
(6, 3, 'Кофемашина DeLongi', 'DeLongi', 25200, 'Хорошее утро начинается с хорошего кофе!', 'products/pk8XJLQ6GfzciqqS9Bu2uSTqa9zYwrhwhH02Xq8S.jpeg', 0, 0, 1, NULL, '2020-07-22 09:05:05'),
(7, 3, 'Холодильник Haier', 'Haier', 40200, 'Для большой семьи большой холодильник!', 'products/CqAyh6TyQRGmSko90xW6E4yVTeLb1L2qB7lXDfln.jpeg', 0, 0, 0, NULL, '2020-07-19 11:19:53'),
(8, 3, 'Блендер Moulinex', 'Moulinex', 4200, 'Для самых смелых идей', 'products/MCh3eqQvo57zkUoqskQrL9tO9TYx8UQ69bMMDn8m.jpeg', 0, 0, 0, NULL, '2020-07-19 11:20:12'),
(9, 3, 'Мясорубка Bosch', 'Bosch', 9200, 'Любите домашние котлеты? Вам определенно стоит посмотреть на эту мясорубку!', 'products/Bosch_bosch.jpg', 0, 1, 1, NULL, '2020-07-22 09:05:17'),
(10, 2, 'Наушники Beats Audio', 'Beats-Audio', 20221, 'Отличный звук от Dr. Dre', 'products/lO0WpxGJDlrtkY0SAG5FqBtQOlD3jXZV0wJpxmla.jpeg', 1, 0, 0, NULL, '2020-07-22 09:05:20'),
(11, 2, 'Камера Panasonic HC-V770', 'Panasonic-HC-V770', 27900, 'Для серьёзной видео съемки нужна серьёзная камера. Panasonic HC-V770 для этих целей лучший выбор!', 'products/P0FIhUjLGeep4dmIIwSAQ6v9CQy7RNfO2nAFgfXS.jpeg', 0, 0, 0, NULL, '2020-07-19 11:23:19'),
(12, 2, 'Камера GoPro', 'GoPro', 12000, 'Снимай самые яркие моменты с помощью этой камеры', 'products/4CbrPIVoSP7O1B7Wg012G49hklspfl9NOETXNZUX.jpeg', 0, 0, 0, NULL, '2020-07-19 11:23:28'),
(13, 2, 'AirPods 2', 'airpods', 12990, 'Наушники нового поколения!', 'products/airpods_scale_1200.jpeg', 0, 0, 1, '2020-07-19 09:41:55', '2020-07-22 09:05:45'),
(15, 4, 'Атлант расправил плечи', 'atlant-raspravil-plechi', 1200, 'Атлант расправил плечи за 1200 рублей', 'products/jgrAR0qoz6DoZ7YzpaSQFmVRXdmXCBGmsPuIeb4x.jpeg', 0, 0, 0, '2020-07-19 10:08:18', '2020-07-19 11:24:53'),
(20, 4, 'Шерлок Холмс', 'sherlock', 790, 'Приключения Шерлока Холмса и доктора Ватсона', 'products/b9c5WbnPLy4YEquTdJkMbB3o8bkVIsH1AydOZM8K.jpeg', 1, 1, 0, '2020-07-19 11:25:32', '2020-07-22 09:05:32');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `is_admin`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Антон', 'aglanton31@gmail.com', NULL, '$2y$10$rBag2.oYKjGVFEi3Peki6uyKJM0LCOxdBXxYvsK6L0SJ0acCPuoky', 1, NULL, '2020-07-18 06:43:04', '2020-07-18 06:43:04'),
(2, 'Иван', 'ivan@mail.com', NULL, '$2y$10$zgYaEPfxyOEJX0iLGqx7AOW./9.Otq9wqECn3E.QO32C/D97Gudia', 0, NULL, '2020-07-18 15:34:59', '2020-07-18 15:34:59');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `order_product`
--
ALTER TABLE `order_product`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Индексы таблицы `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT для таблицы `order_product`
--
ALTER TABLE `order_product`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
