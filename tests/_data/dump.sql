-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Мар 22 2015 г., 22:30
-- Версия сервера: 5.6.17
-- Версия PHP: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `photogallery`
--

-- --------------------------------------------------------

--
-- Структура таблицы `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `photo_id` int(11) NOT NULL,
  `rating` smallint(6) NOT NULL,
  `message` text,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=23 ;

--
-- Дамп данных таблицы `comments`
--

INSERT INTO `comments` (`id`, `photo_id`, `rating`, `message`, `user_id`, `name`, `email`, `created_at`, `updated_at`) VALUES
(1, 2, 5, 'tse', NULL, 'set', 'ste@tets.et', 0, 0),
(2, 2, 4, 'testtestset', 1, 'Test', 'test@local.host', 0, 0),
(3, 15, 1, 'Test', 1, 'Test', 'test@local.host', 0, 0),
(4, 15, 1, 'Test', 1, 'Test', 'test@local.host', 0, 0),
(5, 15, 5, '6', 1, 'Test', 'test@local.host', 0, 0),
(6, 2, 1, 'test', 1, 'Test', 'test@local.host', 0, 0),
(7, 2, 1, 'tes', 1, 'Test', 'test@local.host', 0, 0),
(8, 15, 2, 'set', 1, 'Test', 'test@local.host', 0, 0),
(9, 15, 1, 'test', NULL, 'Andrey', 'test@test.test', 0, 0),
(10, 3, 5, '', 2, 'Vasiliy', 'test@test.test', 0, 0),
(11, 3, 5, '', 2, 'Vasiliy', 'test@test.test', 0, 0),
(12, 3, 5, '', 2, 'Vasiliy', 'test@test.test', 0, 0),
(13, 3, 3, '', 2, 'Vasiliy', 'test@test.test', 0, 0),
(14, 10, 5, '', 2, 'Vasiliy', 'test@test.test', 0, 0),
(15, 3, 2, 'ta', 2, 'Vasiliy', 'test@test.test', 0, 0),
(16, 3, 4, 'twet', 2, 'Vasiliy', 'test@test.test', 0, 0),
(17, 3, 5, 'tetsast', 2, 'Vasiliy', 'test@test.test', 0, 0),
(18, 3, 4, 'last', 2, 'Vasiliy', 'test@test.test', 0, 0),
(19, 3, 1, 'test', 2, 'Vasiliy', 'test@test.test', 0, 0),
(20, 3, 4, 'last', 2, 'Vasiliy', 'test@test.test', 1427055522, 1427055522),
(21, 3, 5, 'last last', 2, 'Vasiliy', 'test@test.test', 1427055532, 1427055532),
(22, 10, 4, 'sa', 2, 'Vasiliy', 'test@test.test', 1427055603, 1427055603);

-- --------------------------------------------------------

--
-- Структура таблицы `migration`
--

DROP TABLE IF EXISTS `migration`;
CREATE TABLE IF NOT EXISTS `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1426949244),
('m150321_141219_create_users_table', 1426957106),
('m150321_141523_create_photos_table', 1426957106),
('m150321_143603_create_comments_table', 1426977185),
('m150322_200115_add_time_columns_photos_table', 1427055398);

-- --------------------------------------------------------

--
-- Структура таблицы `photos`
--

DROP TABLE IF EXISTS `photos`;
CREATE TABLE IF NOT EXISTS `photos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `file_path` varchar(255) NOT NULL,
  `description` text,
  `rating` float NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;

--
-- Дамп данных таблицы `photos`
--

INSERT INTO `photos` (`id`, `file_path`, `description`, `rating`, `created_at`, `updated_at`) VALUES
(2, 'ZchXqe56jK.jpg', 'test', 2.75, 0, 0),
(3, 'PrID2jIqgB.jpg', 'cat', 3.9091, 0, 1427055532),
(4, '72bwCybYWF.jpg', 'catcat', 0, 0, 0),
(5, 'U1Km-5pQQj.jpg', 'cat', 0, 0, 0),
(6, 'PZxUHSZ8Kd.jpg', 'another cat', 0, 0, 0),
(7, 'iIR_Tc1oII.jpg', 's', 0, 0, 0),
(8, 'do-p4LsGqf.jpg', 'cat', 0, 0, 0),
(9, 'v9vl3mXHcs.jpg', 'as', 0, 0, 0),
(10, 'IJ7ZqqpkvM.jpg', 'g', 4.5, 0, 1427055603),
(11, 'OF5umklnbc.jpg', 'h', 0, 0, 0),
(12, 'x8cuM3odWg.jpg', 'e', 0, 0, 0),
(13, '9HAn1hVL9X.jpg', 't', 0, 0, 0),
(14, 'Eg0KKUYOI9.jpg', 'e', 0, 0, 0),
(15, 'AV1tz1OKtZ.jpg', 'e', 2, 0, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(255) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `auth_key` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `password_hash`, `auth_key`, `name`, `created_at`, `updated_at`) VALUES
(1, 'test@local.host', '$2y$13$FQwKvOG3p3zt6YQJbfxPGeiD6cbj08pMIGNzFpSgFWX0wqVGPi17m', 'YQOqoP-KFmDOXqr0Lw-T698lWeXNOczt', 'Test', 0, 0),
(2, 'test@test.test', '$2y$13$78Wdi5D5avfFd.sb0S606uXS4s5cf1h8Dib4v9NB.8VAlC9j3oPeW', '3L6uSRPKwfYogQOalSmfdoLh5IH8CXT-', 'Vasiliy', 0, 0),
(3, 'test@test.test1', '$2y$13$Uy6zTk4XJvZxk5QgNzwqTO9k878BkmgIqZWSbtlWuyxI0DUolMX/.', '2k8YwydyeToUM7_RpLtKoNGS1iov0OCp', 'testtest', 1427056588, 1427056588),
(4, 'cep@cept.cept', '$2y$13$.BwzFibvmfWaB1YfUPWkV.emJ54GvoB8s9LJDfHFrrDt4KT6Cp9N.', 'QH56TI4W_eaWjPM1k0KLjtw_fIsAevcz', 'Miles', 1427057747, 1427057747),
(5, 'cept@cept.cept', '$2y$13$i1ii0Bdh2ftSkqrkCzajFuNqjV5Eg7l7RBPQs0LJ3w0TKCqoYFd3m', 'ra5uKOkopN9gEwXH935DZqgibPXfjlHa', 'Miles', 1427058576, 1427058576),
(6, 'ceptt@cept.cept', '$2y$13$ylPv4dtDFBqfvvmwgRvhnumBL0Fc.rxh4sHaepJ1OxmobeBeVFix.', 'tZxZm-5s2x5wLEWnAAhIRywbPLz0AuLA', 'Miles', 1427058610, 1427058610),
(7, '1@cept.cept', '$2y$13$dUD7QuwxuVw16BbYPWHSmuT9S8l8SksSBP2IMDgJCzNEDNNaedr7e', '-Q_VsSW3Wf4G6sW4r1yHEypRo-aTxnfX', 'Miles', 1427058942, 1427058942);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
