-- phpMyAdmin SQL Dump
-- version 4.6.6deb4
-- https://www.phpmyadmin.net/
--
-- Хост: localhost:3306
-- Время создания: Мар 27 2019 г., 23:09
-- Версия сервера: 10.1.37-MariaDB-0+deb9u1
-- Версия PHP: 7.0.33-0+deb9u3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `shop2`
--

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `status` int(2) UNSIGNED DEFAULT NULL,
  `name` varchar(512) DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`id`, `created_at`, `updated_at`, `status`, `name`, `parent_id`) VALUES
(1, NULL, NULL, 1, 'Category 1', 0),
(2, NULL, NULL, 1, 'Category 2', 1),
(3, NULL, NULL, 1, 'Category 3', 1),
(4, NULL, NULL, 1, 'Category 4', 0),
(5, NULL, NULL, 1, 'Category 5', 2),
(6, NULL, NULL, 1, 'Category 6', 5);

-- --------------------------------------------------------

--
-- Структура таблицы `fabric`
--

CREATE TABLE `fabric` (
  `id` int(11) NOT NULL,
  `name` varchar(256) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `fabric`
--

INSERT INTO `fabric` (`id`, `name`, `description`) VALUES
(1, 'Лен', 'Мягкий. Применяется для подушек.'),
(2, 'Хлопок', 'Мягкий. Применяется для подушек.');

-- --------------------------------------------------------

--
-- Структура таблицы `feedbacks`
--

CREATE TABLE `feedbacks` (
  `id` int(11) NOT NULL,
  `productid` int(11) NOT NULL,
  `header` varchar(256) NOT NULL,
  `comment` text NOT NULL,
  `username` varchar(256) NOT NULL,
  `date` date NOT NULL,
  `updated` date NOT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `feedbacks`
--

INSERT INTO `feedbacks` (`id`, `productid`, `header`, `comment`, `username`, `date`, `updated`, `deleted`) VALUES
(1, 1, 'Отзыв хороший', 'Какой-то хороший отзыв много текста', 'имя1', '2019-02-04', '0000-00-00', 0),
(2, 1, 'Отзыв нормальный', 'Какой-то отзыв много текста', 'имядругое', '2019-02-03', '0000-00-00', 0),
(3, 2, 'Отзыв нормальный', 'Какой-то отзыв много текстаrtrtrtrt', 'имядругое', '2019-01-01', '2019-02-10', 0),
(5, 1, 'new comment', 'правкаправкаправкаправкаправкаправка', 'user', '2019-02-10', '2019-02-10', 0),
(7, 1, 'rrr', 'ewewwe', 'rrr', '2019-02-10', '2019-02-10', 1),
(8, 2, 'new comment', 'erererer', 'user', '2019-02-10', '2019-02-10', 0),
(9, 1, '444444', '54454544', 'gffgfgfg', '2019-02-12', '2019-02-12', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `gallery`
--

CREATE TABLE `gallery` (
  `id` int(11) NOT NULL,
  `filepath` varchar(256) NOT NULL,
  `filesize` int(11) NOT NULL DEFAULT '0',
  `name` varchar(256) NOT NULL DEFAULT 'название картинки',
  `views` int(11) NOT NULL DEFAULT '0',
  `description` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `gallery`
--

INSERT INTO `gallery` (`id`, `filepath`, `filesize`, `name`, `views`, `description`) VALUES
(1, 'img/product1.jpg', 30213, 'Маленькая подушка', 5, 'Описание маленькой декоративной подушки'),
(3, 'img/product2.jpg', 29602, 'Большая подушка', 18, 'Описание большой подушки'),
(5, 'img/product3.jpg', 15057, 'Прямоугольная подушка', 15, 'Описание прямоугольной подушки'),
(8, 'img/empty.jpg', 0, 'название картинки', 1, 'пустая картинка'),
(10, 'img/bd4bd7efa8a9143cfd709aaa336c1286.jpg', 60890, 'другая картинка', 2, 'другое описание');

-- --------------------------------------------------------

--
-- Структура таблицы `goods`
--

CREATE TABLE `goods` (
  `id` int(11) NOT NULL,
  `name` varchar(256) NOT NULL,
  `img` varchar(256) NOT NULL,
  `imgsmall` varchar(256) NOT NULL,
  `imgbig` varchar(256) NOT NULL,
  `intro` text NOT NULL,
  `description` text NOT NULL,
  `size` varchar(16) NOT NULL,
  `fabricid` int(11) NOT NULL,
  `paintid` int(11) NOT NULL,
  `views` int(11) NOT NULL DEFAULT '0',
  `price` decimal(20,0) NOT NULL,
  `status` int(11) NOT NULL,
  `article` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `goods`
--

INSERT INTO `goods` (`id`, `name`, `img`, `imgsmall`, `imgbig`, `intro`, `description`, `size`, `fabricid`, `paintid`, `views`, `price`, `status`, `article`) VALUES
(1, 'Подушка декоративная большая', 'products/product1/product1.jpg', 'products/product1/small/product1.jpg', 'products/product1/big/product1.jpg', 'Краткое описание Подушки декоративной большой', 'Мягкий лен Lorem ipsum dolor sit amet. Лебяжий пух Lorem ipsum dolor sit amet.', '60х60 см', 1, 1, 73, '100', 1, ''),
(2, 'Подушка декоративная маленькая', 'products/product2/product2.jpg', 'products/product2/small/product2.jpg', 'products/product2/big/product2.jpg', 'Краткое описание Подушки декоративной маленькой', 'Мягкий лен Lorem ipsum dolor sit amet. Лебяжий пух Lorem ipsum dolor sit amet.', '30х30 см', 1, 1, 18, '54', 1, ''),
(3, 'Подушка декоративная прямоугольная', 'products/product3/product3.jpg', 'products/product3/small/product3.jpg', 'products/product3/big/product3.jpg', 'Краткое описание Подушки декоративной прямоугольной', 'Мягкий лен Lorem ipsum dolor sit amet. Лебяжий пух Lorem ipsum dolor sit amet.', '30х90 см', 2, 1, 3, '75', 1, ''),
(4, 'strings of code', '', '', '', '', '', '', 0, 0, 0, '16', 1, '43-7559'),
(5, 'test strings', '', '', '', '', '', '', 0, 0, 0, '0', 1, ''),
(6, 'little soft pillow', '', '', '', '', '', '', 0, 0, 0, '56', 1, '45-7889');

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `id_user` int(11) NOT NULL,
  `status` int(2) UNSIGNED DEFAULT NULL,
  `phone` varchar(512) DEFAULT NULL,
  `address` varchar(512) DEFAULT NULL,
  `email` varchar(256) DEFAULT NULL,
  `comment` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`id`, `created_at`, `updated_at`, `id_user`, `status`, `phone`, `address`, `email`, `comment`) VALUES
(27, '2019-03-24 16:04:02', NULL, 11, 2, '+71112225588', 'Город улица дом 4', 'user1@test.tr', 'wwwwww'),
(28, '2019-03-24 16:09:31', NULL, 11, 4, '+71115552233', 'Город улица дом 34', 'user3@test.tr', 'wwww'),
(29, '2019-03-24 16:23:19', NULL, 11, 4, '+71115552233', 'Город улица дом 34', 'user3@test.tr', 'wwwwwwww');

-- --------------------------------------------------------

--
-- Структура таблицы `order_products`
--

CREATE TABLE `order_products` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_count` int(11) NOT NULL,
  `product_price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `order_products`
--

INSERT INTO `order_products` (`id`, `order_id`, `product_id`, `product_count`, `product_price`) VALUES
(1, 17, 1, 1, 100),
(2, 17, 2, 5, 75),
(3, 18, 2, 5, 75),
(4, 1, 2, 1, 54),
(5, 1, 1, 2, 100),
(6, 1, 3, 3, 75),
(7, 2, 2, 1, 54),
(8, 2, 1, 2, 100),
(9, 2, 3, 3, 75),
(10, 3, 2, 1, 54),
(11, 3, 1, 2, 100),
(12, 3, 3, 3, 75),
(13, 4, 2, 1, 54),
(14, 4, 1, 2, 100),
(15, 4, 3, 3, 75),
(16, 5, 2, 1, 54),
(17, 5, 1, 2, 100),
(18, 5, 3, 3, 75),
(19, 6, 2, 1, 54),
(20, 6, 1, 2, 100),
(21, 6, 3, 3, 75),
(22, 7, 2, 1, 54),
(23, 7, 1, 2, 100),
(24, 7, 3, 3, 75),
(25, 8, 2, 1, 54),
(26, 8, 1, 2, 100),
(27, 8, 3, 3, 75),
(28, 9, 1, 1, 100),
(29, 9, 2, 2, 54),
(30, 9, 3, 3, 75),
(31, 10, 1, 1, 100),
(32, 10, 2, 2, 54),
(33, 10, 3, 3, 75),
(34, 11, 1, 1, 100),
(35, 11, 2, 2, 54),
(36, 11, 3, 3, 75),
(37, 12, 1, 1, 100),
(38, 12, 2, 2, 54),
(39, 12, 3, 3, 75),
(40, 13, 1, 1, 100),
(41, 13, 2, 2, 54),
(42, 13, 3, 3, 75),
(43, 14, 1, 1, 100),
(44, 14, 2, 2, 54),
(45, 14, 3, 3, 75),
(46, 15, 1, 1, 100),
(47, 16, 1, 1, 100),
(48, 17, 1, 1, 100),
(49, 18, 1, 1, 100),
(50, 19, 1, 1, 100),
(51, 20, 2, 1, 54),
(52, 21, 2, 1, 54),
(53, 22, 2, 1, 54),
(54, 23, 2, 1, 54),
(55, 24, 2, 1, 54),
(56, 25, 2, 1, 54),
(57, 26, 2, 1, 54),
(58, 27, 1, 1, 100),
(59, 28, 2, 1, 54),
(60, 29, 1, 1, 100),
(61, 29, 2, 1, 54),
(62, 29, 3, 1, 75);

-- --------------------------------------------------------

--
-- Структура таблицы `order_status`
--

CREATE TABLE `order_status` (
  `id` int(11) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `order_status`
--

INSERT INTO `order_status` (`id`, `status`) VALUES
(1, 'Новый'),
(2, 'Оплачен'),
(3, 'Доставлен'),
(4, 'Отменен');

-- --------------------------------------------------------

--
-- Структура таблицы `pages`
--

CREATE TABLE `pages` (
  `id` int(11) NOT NULL,
  `name` varchar(256) NOT NULL,
  `title` varchar(50) NOT NULL,
  `description` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `pages`
--

INSERT INTO `pages` (`id`, `name`, `title`, `description`) VALUES
(1, 'index', 'Главная', 'Мы что-то продаем'),
(2, 'about', '', ''),
(3, 'contacts', 'Контакты', 'Что-то о контактах'),
(4, 'user', 'Пользователь', 'можно редактировать свои заказы'),
(5, 'goods', 'Товар', 'Что-то про товар'),
(6, 'cart', 'Корзина', 'Корзина корзина'),
(7, 'test', 'Тесты', 'Здесь тесты');

-- --------------------------------------------------------

--
-- Структура таблицы `paint`
--

CREATE TABLE `paint` (
  `id` int(11) NOT NULL,
  `name` varchar(256) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `paint`
--

INSERT INTO `paint` (`id`, `name`, `description`) VALUES
(1, 'Латексная', 'Не пахнет'),
(2, 'Термотрансферная', 'Дешевая, нужна сушка');

-- --------------------------------------------------------

--
-- Структура таблицы `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `role`
--

INSERT INTO `role` (`id`, `name`) VALUES
(1, 'admin'),
(2, 'user');

-- --------------------------------------------------------

--
-- Структура таблицы `shop_users`
--

CREATE TABLE `shop_users` (
  `id_user` int(11) NOT NULL,
  `user_name` varchar(256) NOT NULL,
  `user_login` varchar(50) NOT NULL,
  `user_password` varchar(256) NOT NULL,
  `user_email` varchar(256) NOT NULL,
  `user_address` varchar(256) NOT NULL,
  `user_phone` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `shop_users`
--

INSERT INTO `shop_users` (`id_user`, `user_name`, `user_login`, `user_password`, `user_email`, `user_address`, `user_phone`) VALUES
(2, 'user2', 'user2', '$2y$10$RzsB9yAIsszWANAk4KKUoutVCw2Z8rFjmdS.MRu36GAxjsQ/TlhjS', 'email@test.tr', 'Город улица дом 3', '+78889996644'),
(11, 'user3', 'user3', '$2y$10$vqgBo6Esa9Ht2sh1CHeMuuxmS7Mt/BE.ivPqY1RaUVwlcvp7mFeLq', 'user3@test.tr', 'Город улица дом 34', '+71115552233');

-- --------------------------------------------------------

--
-- Структура таблицы `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `user_role`
--

INSERT INTO `user_role` (`id`, `id_user`, `id_role`) VALUES
(1, 2, 1),
(5, 3, 2);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `fabric`
--
ALTER TABLE `fabric`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `feedbacks`
--
ALTER TABLE `feedbacks`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`),
  ADD KEY `name` (`name`(191)),
  ADD KEY `description` (`description`(191));

--
-- Индексы таблицы `goods`
--
ALTER TABLE `goods`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `order_products`
--
ALTER TABLE `order_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_products_join` (`product_id`),
  ADD KEY `orders_orders_join` (`order_id`);

--
-- Индексы таблицы `order_status`
--
ALTER TABLE `order_status`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `paint`
--
ALTER TABLE `paint`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `shop_users`
--
ALTER TABLE `shop_users`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `user_login` (`user_login`);

--
-- Индексы таблицы `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`),
  ADD KEY `users_roles_join` (`id_user`),
  ADD KEY `roles_names_join` (`id_role`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT для таблицы `fabric`
--
ALTER TABLE `fabric`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT для таблицы `feedbacks`
--
ALTER TABLE `feedbacks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT для таблицы `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT для таблицы `goods`
--
ALTER TABLE `goods`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT для таблицы `order_products`
--
ALTER TABLE `order_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;
--
-- AUTO_INCREMENT для таблицы `order_status`
--
ALTER TABLE `order_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT для таблицы `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT для таблицы `paint`
--
ALTER TABLE `paint`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT для таблицы `shop_users`
--
ALTER TABLE `shop_users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT для таблицы `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
