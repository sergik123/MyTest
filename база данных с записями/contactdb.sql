-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Дек 04 2016 г., 18:36
-- Версия сервера: 10.1.19-MariaDB
-- Версия PHP: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `contactdb`
--

-- --------------------------------------------------------

--
-- Структура таблицы `numbers`
--

CREATE TABLE `numbers` (
  `id_numbers` int(10) NOT NULL,
  `numbers` varchar(11) NOT NULL,
  `id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `numbers`
--

INSERT INTO `numbers` (`id_numbers`, `numbers`, `id`) VALUES
(1, '1456798', 1),
(2, '325467', 2),
(3, '675434', 3),
(4, '764588', 4),
(5, '434545', 5),
(6, '675644', 6),
(7, '454345', 7),
(8, '775545', 8),
(9, '54534535', 9),
(10, '545335', 10),
(11, '543563', 11),
(12, '543654', 12),
(13, '775467', 13),
(1, '654576', 14),
(1, '553653', 15),
(7, '925467', 16);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `middlename` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `lastname`, `middlename`) VALUES
(1, 'Виктория', 'Правильная', 'Сергеевна'),
(2, 'Светлана', 'Сидорова', 'Алексеевна'),
(3, 'Игорь', 'Пантелеев', 'Игоревич'),
(4, 'Евгений', 'Петров', 'Сергеевич'),
(5, 'Петр', 'Сергеев', 'Евгеньевич'),
(6, 'Роман', 'Петров', 'Сергеевич'),
(7, 'Алексей', 'Сидоров', 'Алексеевич'),
(8, 'Валерия', 'Сидорова', 'Романовна'),
(9, 'Ирина', 'Крестова', 'Игоревна'),
(10, 'Лена', 'Кладова', 'Сергеевна'),
(11, 'Валерия', 'Кострова', 'Викторовна'),
(12, 'Никита', 'Котов', 'Евгеньевич'),
(13, 'Олег', 'Киров', 'Петрович');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `numbers`
--
ALTER TABLE `numbers`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `numbers`
--
ALTER TABLE `numbers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
