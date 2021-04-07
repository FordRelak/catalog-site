-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Апр 07 2021 г., 21:44
-- Версия сервера: 8.0.19
-- Версия PHP: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `catalog-site`
--

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

CREATE TABLE `categories` (
  `id` int NOT NULL,
  `category_name` varchar(20) NOT NULL,
  `description_short` text NOT NULL,
  `description_full` text NOT NULL,
  `is_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `description_short`, `description_full`, `is_activity`) VALUES
(1, 'Category_12', 'Кратное_Описание_1', 'Полное_Описание_1', 1),
(2, 'Category_2', 'Кратное_Описание_2', 'Полное_Описание_2', 1),
(4, 'Category_42', 'Кратное_Описание_4', 'Полное_Описание_4', 1),
(5, 'Category_5', 'Кратное_Описание_5', 'Полное_Описание_5', 1),
(6, 'Category_6', 'Кратное_Описание_6', 'Полное_Описание_6', 1),
(7, 'Category_7', 'Кратное_Описание_7', 'Полное_Описание_7', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `category_product`
--

CREATE TABLE `category_product` (
  `id` int NOT NULL,
  `category_id` int NOT NULL,
  `product_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `category_product`
--

INSERT INTO `category_product` (`id`, `category_id`, `product_id`) VALUES
(7, 2, 7),
(14, 1, 5),
(15, 1, 10),
(16, 1, 7),
(34, 1, 1),
(35, 4, 1),
(36, 1, 4),
(37, 2, 4),
(38, 4, 4),
(39, 5, 4),
(48, 1, 16),
(49, 2, 16),
(50, 4, 16),
(51, 5, 16);

-- --------------------------------------------------------

--
-- Структура таблицы `goods`
--

CREATE TABLE `goods` (
  `id` int NOT NULL,
  `product_name` varchar(20) NOT NULL,
  `description_short` text NOT NULL,
  `description_full` text NOT NULL,
  `activity_count` int NOT NULL,
  `is_stock` int NOT NULL,
  `is_ordering_out_of_stock` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `goods`
--

INSERT INTO `goods` (`id`, `product_name`, `description_short`, `description_full`, `activity_count`, `is_stock`, `is_ordering_out_of_stock`) VALUES
(1, 'Продукт_1', 'Краткое_Описание_1', 'Полное_Описание_1', 2, 1, 1),
(4, 'Продукт_4', 'Краткое_Описание_4', 'Полное_Описание_4', 2, 1, 1),
(5, 'Продукт_5', 'Краткое_Описание_5', 'Полное_Описание_5', 6, 0, 0),
(7, 'Продукт_7', 'Краткое_Описание_7', 'Полное_Описание_7', 4, 0, 1),
(10, 'Продукт_10', 'Краткое_Описание_10', 'Полное_Описание_10', 4, 1, 1),
(16, 'asfasf', 'asfasf', 'asfasfasf', 0, 0, 1);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `category_name` (`category_name`);

--
-- Индексы таблицы `category_product`
--
ALTER TABLE `category_product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_product_ibfk_1` (`category_id`),
  ADD KEY `category_product_ibfk_2` (`product_id`);

--
-- Индексы таблицы `goods`
--
ALTER TABLE `goods`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблицы `category_product`
--
ALTER TABLE `category_product`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT для таблицы `goods`
--
ALTER TABLE `goods`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `category_product`
--
ALTER TABLE `category_product`
  ADD CONSTRAINT `category_product_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  ADD CONSTRAINT `category_product_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `goods` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
