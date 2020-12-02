-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Дек 02 2020 г., 14:07
-- Версия сервера: 10.4.14-MariaDB
-- Версия PHP: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `candy_shop`
--

-- --------------------------------------------------------

--
-- Структура таблицы `candys`
--

CREATE TABLE `candys` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `description` text NOT NULL,
  `price` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `candys`
--

INSERT INTO `candys` (`id`, `name`, `description`, `price`) VALUES
(5, 'Конфета2', 'Вкусная', 45),
(6, 'торт', 'песочный', 225),
(7, 'Печенье &#34;Юбилейное&#34;', 'Идеально с кофе', 120),
(8, 'Конфета3', 'qw131', 450);

-- --------------------------------------------------------

--
-- Структура таблицы `candy_invoice`
--

CREATE TABLE `candy_invoice` (
  `id` int(11) NOT NULL,
  `id_invoice` int(15) NOT NULL,
  `id_candy` int(15) NOT NULL,
  `quantity` int(15) NOT NULL,
  `total` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `firms`
--

CREATE TABLE `firms` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `address` text NOT NULL,
  `phone` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `firms`
--

INSERT INTO `firms` (`id`, `name`, `address`, `phone`) VALUES
(1, 'Весёлый молочник', 'Улица Комарова 25', '+74551224134'),
(2, 'Грустный Кондитер', 'Ул Пушкина 5', '7941345352'),
(3, 'Конфетный Барон', 'Москва', '24155312'),
(6, 'Антохины тортики', 'Площадь Уныния', '6666666666'),
(7, 'VOVAS', 'Московский проспект 2', '12331421421');

-- --------------------------------------------------------

--
-- Структура таблицы `invoices`
--

CREATE TABLE `invoices` (
  `id` int(11) NOT NULL,
  `number` varchar(30) NOT NULL,
  `id_firm` int(20) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `invoices`
--

INSERT INTO `invoices` (`id`, `number`, `id_firm`, `date`) VALUES
(1, '134523', 1, '2020-09-16');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `login` varchar(15) NOT NULL,
  `password` varchar(32) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `password`, `name`) VALUES
(1, 'admin', '2676e51141d909d6556963de893a8b73', 'admin'),
(4, '', '530773b2026940bb9326156350ee16b0', '');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `candys`
--
ALTER TABLE `candys`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `candy_invoice`
--
ALTER TABLE `candy_invoice`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_invoice` (`id_invoice`),
  ADD KEY `id_candy` (`id_candy`);

--
-- Индексы таблицы `firms`
--
ALTER TABLE `firms`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_firm` (`id_firm`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `candys`
--
ALTER TABLE `candys`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `candy_invoice`
--
ALTER TABLE `candy_invoice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `firms`
--
ALTER TABLE `firms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `candy_invoice`
--
ALTER TABLE `candy_invoice`
  ADD CONSTRAINT `candy_invoice_ibfk_1` FOREIGN KEY (`id_candy`) REFERENCES `candys` (`id`),
  ADD CONSTRAINT `candy_invoice_ibfk_2` FOREIGN KEY (`id_invoice`) REFERENCES `invoices` (`id`);

--
-- Ограничения внешнего ключа таблицы `invoices`
--
ALTER TABLE `invoices`
  ADD CONSTRAINT `invoices_ibfk_1` FOREIGN KEY (`id_firm`) REFERENCES `firms` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
