-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Май 30 2020 г., 16:57
-- Версия сервера: 5.7.25
-- Версия PHP: 7.1.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `std_1301`
--

-- --------------------------------------------------------

--
-- Структура таблицы `goods`
--

CREATE TABLE `goods` (
  `id` int(11) NOT NULL,
  `title` varchar(250) NOT NULL,
  `type` int(11) NOT NULL,
  `manufacturer` int(11) NOT NULL,
  `price` int(5) NOT NULL,
  `description` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `goods`
--

INSERT INTO `goods` (`id`, `title`, `type`, `manufacturer`, `price`, `description`) VALUES
(1, 'Ultra light 10/46', 1, 1, 250, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Non ratione omnis, tempora incidunt ipsum nam odio voluptatem ea optio, id consequuntur reprehenderit, eos ullam aut quidem perferendis neque sequi maxime?'),
(2, 'Silver medium', 2, 2, 140, 'medium ext strings 11/52');

-- --------------------------------------------------------

--
-- Структура таблицы `manufactures`
--

CREATE TABLE `manufactures` (
  `id` int(11) NOT NULL,
  `title` varchar(250) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `manufactures`
--

INSERT INTO `manufactures` (`id`, `title`) VALUES
(1, 'Альтия'),
(2, 'GHS');

-- --------------------------------------------------------

--
-- Структура таблицы `types`
--

CREATE TABLE `types` (
  `id` int(11) NOT NULL,
  `type` varchar(250) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `types`
--

INSERT INTO `types` (`id`, `type`) VALUES
(1, 'Классическая гитара'),
(2, 'Электрогитара');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `login` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `name` varchar(250) NOT NULL,
  `surname` varchar(250) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(250) CHARACTER SET utf16 NOT NULL,
  `city` varchar(250) NOT NULL,
  `street` varchar(250) NOT NULL,
  `house` varchar(30) NOT NULL,
  `post_index` int(6) NOT NULL,
  `isAdmin` int(1) NOT NULL DEFAULT '0',
  `reg_date` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `password`, `name`, `surname`, `phone`, `email`, `city`, `street`, `house`, `post_index`, `isAdmin`, `reg_date`) VALUES
(1, 'login', 'password', 'Виталий', 'Мартынов', '89165540003', 'moment54@ya.ru', 'Москва', 'Окская', '48/2', 109457, 1, ''),
(2, 'enot', 'ladyday26', 'Лилия', 'Юрьевна', '8913843913', 'liya@mail.ru', 'Томск', 'Лесная', '51', 666777, 0, '');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `goods`
--
ALTER TABLE `goods`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `manufactures`
--
ALTER TABLE `manufactures`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `types`
--
ALTER TABLE `types`
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
-- AUTO_INCREMENT для таблицы `goods`
--
ALTER TABLE `goods`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `manufactures`
--
ALTER TABLE `manufactures`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `types`
--
ALTER TABLE `types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
