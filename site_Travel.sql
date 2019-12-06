-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Апр 21 2017 г., 17:31
-- Версия сервера: 5.5.53
-- Версия PHP: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `site_Travel`
--

-- --------------------------------------------------------

--
-- Структура таблицы `Cities`
--

CREATE TABLE `Cities` (
  `id` int(11) NOT NULL,
  `city` varchar(64) DEFAULT NULL,
  `countryid` int(11) DEFAULT NULL,
  `ucity` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `Cities`
--

INSERT INTO `Cities` (`id`, `city`, `countryid`, `ucity`) VALUES
(2, 'Palanga', 4, NULL),
(3, 'Kiyv', 1, NULL),
(5, 'Klaipeda', 4, NULL),
(6, 'Fresno', 2, NULL),
(7, 'Warsaw', 3, NULL),
(8, 'Lisbon', 12, NULL),
(9, 'Zaporizhzhya', 1, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `Countries`
--

CREATE TABLE `Countries` (
  `id` int(11) NOT NULL,
  `country` varchar(64) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `Countries`
--

INSERT INTO `Countries` (`id`, `country`) VALUES
(4, 'Lithuania'),
(3, 'Poland'),
(12, 'Portugal'),
(1, 'Ukraine'),
(2, 'USA');

-- --------------------------------------------------------

--
-- Структура таблицы `Hotels`
--

CREATE TABLE `Hotels` (
  `id` int(11) NOT NULL,
  `hotel` varchar(64) DEFAULT NULL,
  `cityid` int(11) DEFAULT NULL,
  `countryid` int(11) DEFAULT NULL,
  `stars` int(11) DEFAULT NULL,
  `cost` int(11) DEFAULT NULL,
  `info` varchar(1024) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `Hotels`
--

INSERT INTO `Hotels` (`id`, `hotel`, `cityid`, `countryid`, `stars`, `cost`, `info`) VALUES
(2, 'Valverde Hotel', 8, 12, 3, 120, 'Located in the Avenida da Liberdade, in the most noble of Lisbon, Valverde Hotel opened its doors in September 2014.\r\nIt reminds us of London and New-York Town Houses, with its classic and elegant style, it\'s contemporary furniture, works of art and antiques.\r\nIts warm colours, the comfort of its fabrics and materials, its homey arrangement of space, are what distinguishes the Valverde Hotel from any other hotel in the surrounding area, an &quot;Oasis of comfort and discreet luxury.&quot;\r\nValverde Hotel welcomes leisure and business guests in a deeply intimate setting.'),
(3, 'Palanga Spa Luxury', 2, 4, 4, 150, 'Palanga SPA Luxury Hotel, situated on a peaceful Birutės Alley in the midst of a graceful pinewood, is charming with its luxury and cosy elegance. The view of the pinewood seen through the large panoramic windows changes with each passing season and seems to merge with the teak prevailing in the interior, which makes the hotel a genuine oasis of nature and tranquillity.'),
(4, 'Polonia Palace Hotel', 7, 3, 5, 230, 'Being one of the oldest hotels in Warsaw - Polonia Palace Hotel - was opened on 14th July 1913. Count Konstanty Przeździecki had invested 1100 000 rubles in its premises and managed the hotel till 1939. His family had already been known for administering European Hotel in Warsaw, built by his grandfather, Aleksander. The name ‘Polonia Palace’ was not a random choice – this was a Period of Partition and such a strong patriotic accent in the heart of Vistula Land’s capital was supposed to raise the spirits of its inhabitants.');

-- --------------------------------------------------------

--
-- Структура таблицы `Images`
--

CREATE TABLE `Images` (
  `id` int(11) NOT NULL,
  `imagepath` varchar(255) DEFAULT NULL,
  `hotelid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `Images`
--

INSERT INTO `Images` (`id`, `imagepath`, `hotelid`) VALUES
(1, 'images/lisboa.jpg', 2),
(2, 'images/lisboa2.jpg', 2),
(3, 'images/palanga.png', 3),
(4, 'images/palanga2.jpg', 3),
(5, 'images/warsaw.jpg', 4),
(6, 'images/warsaw2.jpg', 4);

-- --------------------------------------------------------

--
-- Структура таблицы `Roles`
--

CREATE TABLE `Roles` (
  `id` int(11) NOT NULL,
  `role` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `Users`
--

CREATE TABLE `Users` (
  `id` int(11) NOT NULL,
  `login` varchar(30) DEFAULT NULL,
  `pass` varchar(512) DEFAULT NULL,
  `email` varchar(128) DEFAULT NULL,
  `roleid` int(11) DEFAULT NULL,
  `discount` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `Users`
--

INSERT INTO `Users` (`id`, `login`, `pass`, `email`, `roleid`, `discount`) VALUES
(1, 'vica', '202cb962ac59075b964b07152d234b70', 'vica99@mail.ru', NULL, NULL),
(2, 'tatyana', '202cb962ac59075b964b07152d234b70', 'tat@mail.ru', NULL, NULL),
(3, 'roman', 'caf1a3dfb505ffed0d024130f58c5cfa', 'rom@mail.ru', NULL, NULL),
(4, 'abc', '289dff07669d7a23de0ef88d2f7129e7', 'abc@123.com', NULL, NULL),
(6, 'top', '289dff07669d7a23de0ef88d2f7129e7', 'ab@123.ru', NULL, NULL),
(7, 'prog', '99c5e07b4d5de9d18c350cdf64c5aa3d', 'php@fm.ua', NULL, NULL);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `Cities`
--
ALTER TABLE `Cities`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ucity` (`city`,`countryid`),
  ADD KEY `countryid` (`countryid`);

--
-- Индексы таблицы `Countries`
--
ALTER TABLE `Countries`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `country` (`country`);

--
-- Индексы таблицы `Hotels`
--
ALTER TABLE `Hotels`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cityid` (`cityid`),
  ADD KEY `countryid` (`countryid`);

--
-- Индексы таблицы `Images`
--
ALTER TABLE `Images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hotelid` (`hotelid`);

--
-- Индексы таблицы `Roles`
--
ALTER TABLE `Roles`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `Users`
--
ALTER TABLE `Users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `login` (`login`),
  ADD KEY `roleid` (`roleid`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `Cities`
--
ALTER TABLE `Cities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT для таблицы `Countries`
--
ALTER TABLE `Countries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT для таблицы `Hotels`
--
ALTER TABLE `Hotels`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT для таблицы `Images`
--
ALTER TABLE `Images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT для таблицы `Roles`
--
ALTER TABLE `Roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `Users`
--
ALTER TABLE `Users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `Cities`
--
ALTER TABLE `Cities`
  ADD CONSTRAINT `cities_ibfk_1` FOREIGN KEY (`countryid`) REFERENCES `countries` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `Hotels`
--
ALTER TABLE `Hotels`
  ADD CONSTRAINT `hotels_ibfk_1` FOREIGN KEY (`cityid`) REFERENCES `cities` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `hotels_ibfk_2` FOREIGN KEY (`countryid`) REFERENCES `countries` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `Images`
--
ALTER TABLE `Images`
  ADD CONSTRAINT `images_ibfk_1` FOREIGN KEY (`hotelid`) REFERENCES `hotels` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `Users`
--
ALTER TABLE `Users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`roleid`) REFERENCES `Roles` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
