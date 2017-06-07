-- phpMyAdmin SQL Dump
-- version 4.5.5.1
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Июн 07 2017 г., 16:03
-- Версия сервера: 5.7.11
-- Версия PHP: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `studycenter`
--

-- --------------------------------------------------------

--
-- Структура таблицы `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `login` varchar(50) NOT NULL,
  `password` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `admin`
--

INSERT INTO `admin` (`id`, `login`, `password`) VALUES
(1, 'admin', '12345');

-- --------------------------------------------------------

--
-- Структура таблицы `class`
--

CREATE TABLE `class` (
  `id` int(11) NOT NULL,
  `name_group` varchar(50) NOT NULL,
  `teacher_id` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `class`
--

INSERT INTO `class` (`id`, `name_group`, `teacher_id`) VALUES
(1, 'English A1', 3),
(2, 'English A2', 4),
(3, 'Math A1', 3),
(4, 'Daniyartanu', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `relation_cs`
--

CREATE TABLE `relation_cs` (
  `id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `relation_cs`
--

INSERT INTO `relation_cs` (`id`, `class_id`, `student_id`) VALUES
(1, 1, 1),
(2, 2, 1),
(10, 3, 12),
(9, 3, 11),
(8, 2, 11),
(7, 1, 11);

-- --------------------------------------------------------

--
-- Структура таблицы `relation_ts`
--

CREATE TABLE `relation_ts` (
  `id` int(4) NOT NULL,
  `id_t` int(4) NOT NULL,
  `id_s` int(4) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Структура таблицы `student`
--

CREATE TABLE `student` (
  `id` int(11) NOT NULL,
  `firstname` text NOT NULL,
  `lastname` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `student`
--

INSERT INTO `student` (`id`, `firstname`, `lastname`) VALUES
(1, 'Biket', 'Nurdaulet'),
(6, 'Danilo', 'Neko'),
(12, 'Lil ', 'Wayne'),
(11, 'kaz', 'Kaz');

-- --------------------------------------------------------

--
-- Структура таблицы `subject`
--

CREATE TABLE `subject` (
  `id` int(4) NOT NULL,
  `name` varchar(60) NOT NULL,
  `description` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Структура таблицы `teacher`
--

CREATE TABLE `teacher` (
  `id` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `iin` varchar(15) NOT NULL,
  `telephone` varchar(20) NOT NULL,
  `subject` int(4) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `teacher`
--

INSERT INTO `teacher` (`id`, `firstname`, `lastname`, `iin`, `telephone`, `subject`) VALUES
(1, 'Meruert', 'Temirbolatova', '', '', 0),
(3, 'Aibolat', 'Abolatov', '', '', 0),
(4, 'Mukhiddin', 'Mukhiddinov', '', '', 0),
(5, 'Bruno', 'Mars', '', '', 0),
(7, 'Daniyar', 'Gilymov', '', '', 0);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `relation_cs`
--
ALTER TABLE `relation_cs`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `relation_ts`
--
ALTER TABLE `relation_ts`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `class`
--
ALTER TABLE `class`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT для таблицы `relation_cs`
--
ALTER TABLE `relation_cs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT для таблицы `relation_ts`
--
ALTER TABLE `relation_ts`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `student`
--
ALTER TABLE `student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT для таблицы `subject`
--
ALTER TABLE `subject`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `teacher`
--
ALTER TABLE `teacher`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
