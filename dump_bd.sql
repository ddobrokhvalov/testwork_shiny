-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Хост: localhost:3306
-- Время создания: Май 24 2018 г., 20:21
-- Версия сервера: 5.6.39-83.1
-- Версия PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

--
-- База данных: `u0397755_shiny`
--

-- --------------------------------------------------------

--
-- Структура таблицы `brand_model`
--

DROP TABLE IF EXISTS `brand_model`;
CREATE TABLE `brand_model` (
  `id` int(11) NOT NULL,
  `list_id` int(11) NOT NULL,
  `brand` varchar(255) NOT NULL,
  `model` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `table_list`
--

DROP TABLE IF EXISTS `table_list`;
CREATE TABLE `table_list` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `parsed` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `table_list`
--

INSERT INTO `table_list` (`id`, `name`, `parsed`) VALUES
(18, 'Toyo H08 195/75R16C 107/105S TL Летние', 0),
(19, 'Pirelli Winter SnowControl serie 3 175/70R14 84T TL Зимние (нешипованные)', 0),
(20, 'BFGoodrich Mud-Terrain T/A KM2 235/85R16 120/116Q TL Внедорожные', 0),
(21, 'Pirelli Scorpion Ice &amp; Snow 265/45R21 104H TL Зимние (нешипованные)', 0),
(22, 'Pirelli Winter SottoZero Serie II 245/45R19 102V XL Run Flat * TL Зимние (нешипованные)', 0),
(23, 'Nokian Hakkapeliitta R2 SUV/Е 245/70R16 111R XL TL Зимние (нешипованные)', 0),
(24, 'Pirelli Winter Carving Edge 225/50R17 98T XL TL Зимние (шипованные)', 0),
(25, 'Continental ContiCrossContact LX Sport 255/55R18 105H FR MO TL Всесезонные', 0),
(26, 'BFGoodrich g-Force Stud 205/60R16 96Q XL TL Зимние (шипованные)', 0),
(27, 'BFGoodrich Winter Slalom KSI 225/60R17 99S TL Зимние (нешипованные)', 0),
(28, 'Continental ContiSportContact 5 245/45R18 96W SSR FR TL Летние', 0),
(29, 'Continental ContiWinterContact TS 830 P 205/60R16 92H SSR * TL Зимние (нешипованные)', 0),
(30, 'Continental ContiWinterContact TS 830 P 225/45R18 95V XL SSR FR * TL Зимние (нешипованные)', 0),
(31, 'Hankook Winter I*Cept Evo2 W320 255/35R19 96V XL TL/TT Зимние (нешипованные)', 0),
(32, 'Mitas Sport Force+ 120/65R17 56W TL Летние', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `table_params`
--

DROP TABLE IF EXISTS `table_params`;
CREATE TABLE `table_params` (
  `id` int(11) NOT NULL,
  `list_id` int(11) NOT NULL,
  `code` varchar(255) NOT NULL,
  `value` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `brand_model`
--
ALTER TABLE `brand_model`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `table_list`
--
ALTER TABLE `table_list`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `table_params`
--
ALTER TABLE `table_params`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `brand_model`
--
ALTER TABLE `brand_model`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `table_list`
--
ALTER TABLE `table_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT для таблицы `table_params`
--
ALTER TABLE `table_params`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;
