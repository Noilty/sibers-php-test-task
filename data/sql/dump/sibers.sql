-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июл 24 2020 г., 10:06
-- Версия сервера: 5.5.62
-- Версия PHP: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `sibers`
--

-- --------------------------------------------------------

--
-- Структура таблицы `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL COMMENT 'Идентификатор роли',
  `role` varchar(50) NOT NULL COMMENT 'Имя роли',
  `description` text NOT NULL COMMENT 'Описание роли'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `roles`
--

INSERT INTO `roles` (`id`, `role`, `description`) VALUES
(1, 'Администратор', 'description role'),
(2, 'Участник', 'description role');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` bigint(20) NOT NULL COMMENT 'Идентификатор',
  `login` varchar(30) NOT NULL COMMENT 'Никнейм',
  `password` varchar(255) NOT NULL COMMENT 'Пароль',
  `name` varchar(50) DEFAULT NULL COMMENT 'Имя',
  `surname` varchar(50) DEFAULT NULL COMMENT 'Фамилия',
  `gender` varchar(24) NOT NULL COMMENT 'Пол',
  `birthday` datetime DEFAULT NULL COMMENT 'День рождение',
  `reg_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Дата регистрации'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `password`, `name`, `surname`, `gender`, `birthday`, `reg_date`) VALUES
(1, 'Root', '$2y$10$dLIR0YahRwc1c4sCkmsoJOzJB.TYL1bsgq7SDJXHaBLgsr7rRsROa', 'User', 'Root', 'Мужчина', '1970-01-01 00:00:00', '2020-07-23 17:00:00'),
(2, 'anton', '$2y$10$qpEa1v1cD5bjSpj0Xmpn0u3h.6FYEfvEWkgfeWCz6ax/nTG7eMH5G', 'Антон', 'Евтушенко', 'Мужчина', '2018-05-06 00:00:00', '2020-07-23 17:00:00'),
(3, 'alex0079', '$2y$10$EFMwAO7eb9P0zKI57eskVOzHuE0TWlHk34sCiDe9T53NAfH5PRAhi', 'Алексей', 'Истов', 'Мужчина', '1961-07-02 00:00:00', '2020-07-23 17:00:00'),
(4, 'alex007', '$2y$10$0zoXEYYLnNoA2qr5M7c0qOzIxfOm0LI4OfSZSRHkFzeUYDLXhcyl6', 'Александр', 'Киселев', 'Мужчина', '1980-12-09 00:00:00', '2020-07-23 17:00:00'),
(5, 'natalia', '$2y$10$d4oIOYSzMFXNjlXSx42jEuRKbf8d0cXDN3a7qFz4c6unJc7EUcFYS', 'Наталья', 'Хохлова', 'Женщина', '2018-08-06 00:00:00', '2020-07-23 17:00:00'),
(6, 'gerg23', '$2y$10$IrTFgwB6DSq/MUV0pWym/OuwcTdKs7ts.9lyQqk5BFZvFssZHJGZG', 'Алексей', 'Орешков', 'Мужчина', '1996-02-12 00:00:00', '2020-07-23 17:00:00'),
(7, 'vlads', '$2y$10$XxdZW4BAOpbkq908EpmxMOC1AoVJF1SgW2XJ0K85LtGntDTzS2Xia', 'Влад', 'Мутаев', 'Мужчина', '1999-02-03 00:00:00', '2020-07-23 17:00:00'),
(8, 'tuk-tuk', '$2y$10$nK6uYnUZxw7WuLMrqEyKcu0/titXY670CWCue.h37mOJBRtlg23cG', 'Алина', 'Тупарева', 'Женщина', '2000-02-02 00:00:00', '2020-07-23 17:00:00'),
(9, 'artur-2000', '$2y$10$9516nKvWBijV6w47pNM5h.Qbzj5aCQygEFRl5ebR3qj0HYF..XT/K', 'Артур', 'Кишенев', 'Мужчина', '2002-05-05 00:00:00', '2020-07-23 17:00:00'),
(10, 'vlada-e', '$2y$10$Wquq2.du3J7NpILAGFK4MuepxqlUh1HsvuCEqPbw4U0oWdV7RPCQe', 'Влада', 'Именова', 'Женщина', '1992-07-03 00:00:00', '2020-07-23 17:00:00'),
(11, 'alina-e', '$2y$10$8TS9QZ0VmAeWO3vXnaUs8OVi7K8p7.bbpWLLJ70jkDw7JkJJIulUO', 'Алина', 'Тупарева', 'Женщина', '1955-05-15 00:00:00', '2020-07-23 17:00:00');

-- --------------------------------------------------------

--
-- Структура таблицы `user__role`
--

CREATE TABLE `user__role` (
  `id` int(11) NOT NULL,
  `user_id` bigint(20) NOT NULL COMMENT 'Идентификатор пользователя',
  `role_id` int(11) NOT NULL COMMENT 'Идентификатор роли'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `user__role`
--

INSERT INTO `user__role` (`id`, `user_id`, `role_id`) VALUES
(1, 1, 2),
(2, 1, 1),
(3, 2, 2),
(4, 3, 2),
(5, 4, 2),
(6, 5, 2),
(7, 6, 2),
(8, 7, 2),
(9, 8, 2),
(10, 9, 2),
(11, 10, 2),
(12, 11, 2);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_role_uindex` (`role`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_login_uindex` (`login`);

--
-- Индексы таблицы `user__role`
--
ALTER TABLE `user__role`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Идентификатор роли', AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT COMMENT 'Идентификатор', AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT для таблицы `user__role`
--
ALTER TABLE `user__role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
