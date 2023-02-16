-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Фев 16 2023 г., 18:55
-- Версия сервера: 8.0.24
-- Версия PHP: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `competitions`
--

-- --------------------------------------------------------

--
-- Структура таблицы `athletes`
--

CREATE TABLE `athletes` (
  `id` int NOT NULL,
  `athlete_name` char(128) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `countries`
--

CREATE TABLE `countries` (
  `id` int NOT NULL,
  `country_name` char(128) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `medals`
--

CREATE TABLE `medals` (
  `id` int NOT NULL,
  `medal_type_id` int DEFAULT NULL,
  `country_id` int NOT NULL,
  `sport_id` int DEFAULT NULL,
  `athlete_name1` int DEFAULT NULL,
  `athlete_name2` int DEFAULT NULL,
  `athlete_name3` int DEFAULT NULL,
  `athlete_name4` int DEFAULT NULL,
  `athlete_name5` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `medal_types`
--

CREATE TABLE `medal_types` (
  `id` int NOT NULL,
  `medal_type` char(64) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `medal_types`
--

INSERT INTO `medal_types` (`id`, `medal_type`) VALUES
(3, 'Бронзовая'),
(1, 'Золотая'),
(2, 'Серебряная');

-- --------------------------------------------------------

--
-- Структура таблицы `sports`
--

CREATE TABLE `sports` (
  `id` int NOT NULL,
  `sport_name` char(128) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Дублирующая структура для представления `view_competitions`
-- (См. Ниже фактическое представление)
--
CREATE TABLE `view_competitions` (
`a` bigint
,`a_type` int
,`al` bigint
,`b` bigint
,`b_type` int
,`country_id` int
,`country_name` char(128)
,`g` bigint
,`g_type` int
,`place` bigint unsigned
);

-- --------------------------------------------------------

--
-- Дублирующая структура для представления `view_medals`
-- (См. Ниже фактическое представление)
--
CREATE TABLE `view_medals` (
`athlete_name1` varchar(128)
,`athlete_name2` varchar(128)
,`athlete_name3` varchar(128)
,`athlete_name4` varchar(128)
,`athlete_name5` varchar(128)
,`country_id` int
,`country_name` char(128)
,`id` int
,`medal_type` char(64)
,`medal_type_id` int
,`sport_name` char(128)
);

-- --------------------------------------------------------

--
-- Структура для представления `view_competitions`
--
DROP TABLE IF EXISTS `view_competitions`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`127.0.0.1` SQL SECURITY DEFINER VIEW `view_competitions`  AS SELECT row_number()  (ORDER BY `t`.`g` desc,`t`.`a` desc,`t`.`b` desc ) AS `OVER` FROM (select `c`.`id` AS `country_id`,`c`.`country_name` AS `country_name`,count(`mt1`.`id`) AS `g`,1 AS `g_type`,count(`mt2`.`id`) AS `a`,2 AS `a_type`,count(`mt3`.`id`) AS `b`,3 AS `b_type`,count(0) AS `al` from ((((`medals` `md` join `countries` `c` on((`c`.`id` = `md`.`country_id`))) left join `medal_types` `mt1` on(((`md`.`medal_type_id` = 1) and (`md`.`medal_type_id` = `mt1`.`id`)))) left join `medal_types` `mt2` on(((`md`.`medal_type_id` = 2) and (`md`.`medal_type_id` = `mt2`.`id`)))) left join `medal_types` `mt3` on(((`md`.`medal_type_id` = 3) and (`md`.`medal_type_id` = `mt3`.`id`)))) group by `c`.`country_name`) AS `t` ;

-- --------------------------------------------------------

--
-- Структура для представления `view_medals`
--
DROP TABLE IF EXISTS `view_medals`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`127.0.0.1` SQL SECURITY DEFINER VIEW `view_medals`  AS SELECT `md`.`id` AS `id`, `ctrs`.`id` AS `country_id`, `ctrs`.`country_name` AS `country_name`, `mdtype`.`id` AS `medal_type_id`, `sprts`.`sport_name` AS `sport_name`, `mdtype`.`medal_type` AS `medal_type`, coalesce(`ath`.`athlete_name`,'') AS `athlete_name1`, coalesce(`ath1`.`athlete_name`,'') AS `athlete_name2`, coalesce(`ath2`.`athlete_name`,'') AS `athlete_name3`, coalesce(`ath3`.`athlete_name`,'') AS `athlete_name4`, coalesce(`ath4`.`athlete_name`,'') AS `athlete_name5` FROM ((((((((`medals` `md` join `countries` `ctrs` on((`ctrs`.`id` = `md`.`country_id`))) join `sports` `sprts` on((`sprts`.`id` = `md`.`sport_id`))) join `medal_types` `mdtype` on((`mdtype`.`id` = `md`.`medal_type_id`))) left join `athletes` `ath` on((`ath`.`id` = `md`.`athlete_name1`))) left join `athletes` `ath1` on((`ath1`.`id` = `md`.`athlete_name2`))) left join `athletes` `ath2` on((`ath2`.`id` = `md`.`athlete_name3`))) left join `athletes` `ath3` on((`ath3`.`id` = `md`.`athlete_name4`))) left join `athletes` `ath4` on((`ath4`.`id` = `md`.`athlete_name5`))) ;

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `athletes`
--
ALTER TABLE `athletes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `athlete_name` (`athlete_name`),
  ADD KEY `athletes_id_index` (`id`);

--
-- Индексы таблицы `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `country_name` (`country_name`),
  ADD KEY `countries_id_index` (`id`);

--
-- Индексы таблицы `medals`
--
ALTER TABLE `medals`
  ADD PRIMARY KEY (`id`),
  ADD KEY `medal_type_id` (`medal_type_id`),
  ADD KEY `country_id` (`country_id`),
  ADD KEY `medals_id_index` (`id`),
  ADD KEY `medals_ibfk_3` (`sport_id`),
  ADD KEY `medals_ibfk_4` (`athlete_name1`),
  ADD KEY `medals_ibfk_5` (`athlete_name2`),
  ADD KEY `medals_ibfk_6` (`athlete_name3`),
  ADD KEY `medals_ibfk_7` (`athlete_name4`),
  ADD KEY `medals_ibfk_8` (`athlete_name5`);

--
-- Индексы таблицы `medal_types`
--
ALTER TABLE `medal_types`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `medal_type` (`medal_type`);

--
-- Индексы таблицы `sports`
--
ALTER TABLE `sports`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `sport_name` (`sport_name`),
  ADD KEY `sports_id_index` (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `athletes`
--
ALTER TABLE `athletes`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `medals`
--
ALTER TABLE `medals`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT для таблицы `medal_types`
--
ALTER TABLE `medal_types`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `sports`
--
ALTER TABLE `sports`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `medals`
--
ALTER TABLE `medals`
  ADD CONSTRAINT `medals_ibfk_1` FOREIGN KEY (`medal_type_id`) REFERENCES `medal_types` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `medals_ibfk_2` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `medals_ibfk_3` FOREIGN KEY (`sport_id`) REFERENCES `sports` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  ADD CONSTRAINT `medals_ibfk_4` FOREIGN KEY (`athlete_name1`) REFERENCES `athletes` (`id`) ON DELETE SET NULL ON UPDATE RESTRICT,
  ADD CONSTRAINT `medals_ibfk_5` FOREIGN KEY (`athlete_name2`) REFERENCES `athletes` (`id`) ON DELETE SET NULL ON UPDATE RESTRICT,
  ADD CONSTRAINT `medals_ibfk_6` FOREIGN KEY (`athlete_name3`) REFERENCES `athletes` (`id`) ON DELETE SET NULL ON UPDATE RESTRICT,
  ADD CONSTRAINT `medals_ibfk_7` FOREIGN KEY (`athlete_name4`) REFERENCES `athletes` (`id`) ON DELETE SET NULL ON UPDATE RESTRICT,
  ADD CONSTRAINT `medals_ibfk_8` FOREIGN KEY (`athlete_name5`) REFERENCES `athletes` (`id`) ON DELETE SET NULL ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
