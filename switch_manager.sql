-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Дек 30 2021 г., 15:49
-- Версия сервера: 5.7.29-log
-- Версия PHP: 7.4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `switch_manager`
--

-- --------------------------------------------------------

--
-- Структура таблицы `switch`
--

CREATE TABLE `switch` (
  `id` int(11) NOT NULL,
  `name` varchar(225) CHARACTER SET utf8 NOT NULL,
  `ip` varchar(225) CHARACTER SET utf8 NOT NULL,
  `login` varchar(225) CHARACTER SET utf8 NOT NULL,
  `password` varchar(225) CHARACTER SET utf8 NOT NULL,
  `img` varchar(225) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `switch`
--

INSERT INTO `switch` (`id`, `name`, `ip`, `login`, `password`, `img`) VALUES
(14, 'Switch 1', '10.0.254.18', 'admin', 'YWRtaW4=', '/upload/img/10.0.254.18.jpeg'),
(16, 'Switch 2', '192.168.0.1', 'admin', 'YWRtaW4=', '/upload/img/192.168.0.1.jpeg'),
(17, 'Switch 3', '10.0.254.19', 'admin', 'YWRtaW4=', '/upload/img/10.0.254.19.png'),
(18, 'Server', '91.243.15.219', 'admin', 'YWRtaW4xMjM=', ''),
(19, 'Switch 4', '176.117.191.36', 'admin', 'YWRtaW4=', '');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `login` varchar(225) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(225) COLLATE utf8mb4_unicode_ci NOT NULL,
  `2fa_code` varchar(225) COLLATE utf8mb4_unicode_ci NOT NULL,
  `2fa_url_img` varchar(225) COLLATE utf8mb4_unicode_ci NOT NULL,
  `2fa_enable` int(1) NOT NULL DEFAULT '0',
  `avatar` varchar(225) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `password`, `2fa_code`, `2fa_url_img`, `2fa_enable`, `avatar`) VALUES
(1, 'SwitchManagerAdmin', 'YWRtaW4=', 'Y3N7JZVT4JG5NNHI', '/upload/qr_code/1.png', 0, '/upload/avatars/1.png'),
(2, 'Nazar', 'YWl3cHJ0b24=', 'UUQQG462GMY47MXW', '/upload/qr_code/2.png', 0, '/upload/avatars/2.jpeg');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `switch`
--
ALTER TABLE `switch`
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
-- AUTO_INCREMENT для таблицы `switch`
--
ALTER TABLE `switch`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
