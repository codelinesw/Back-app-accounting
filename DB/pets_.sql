-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 04-12-2019 a las 04:13:36
-- Versión del servidor: 10.4.8-MariaDB
-- Versión de PHP: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `pets_`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `r_rol`
--

CREATE TABLE `r_rol` (
  `id` int(11) NOT NULL,
  `name` text COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `r_rol`
--

INSERT INTO `r_rol` (`id`, `name`) VALUES
(1, 'Admin'),
(2, 'User');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `u_profile`
--

CREATE TABLE `u_profile` (
  `id` int(11) NOT NULL,
  `name` text COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `u_profile`
--

INSERT INTO `u_profile` (`id`, `name`) VALUES
(1, 'Prestador'),
(2, 'Propietario');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `u_users`
--

CREATE TABLE `u_users` (
  `id` int(11) NOT NULL,
  `name` text COLLATE utf8_spanish_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `id_rol` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `u_users`
--

INSERT INTO `u_users` (`id`, `name`, `email`, `password`, `created`, `updated`, `id_rol`) VALUES
(1, 'Jhon Denver Murillo', 'jhondember0424@gmail.com', '$2y$10$cJcTtTkX.UXDulsv92ze2O0eGlLjdkoQ3oY4x7D.uuRDvAPMnRVbW', '2019-11-23 03:31:30', '2019-11-23 03:31:30', 2),
(3, 'Carolina Gonzales Velasco', 'murillovelascoc@gmail.com', '$2y$10$6wAV65OvP.zVb9Ub3p26b.fKDHUG7AGlZz758Py76EaXWPKYZx9DO', '2019-11-24 09:25:23', '2019-11-24 09:25:23', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `u_users_info`
--

CREATE TABLE `u_users_info` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `value` bigint(13) NOT NULL,
  `birthday` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `gender` char(1) COLLATE utf8_spanish_ci NOT NULL,
  `city` text COLLATE utf8_spanish_ci NOT NULL,
  `neigh_service` text COLLATE utf8_spanish_ci NOT NULL,
  `phone` bigint(13) NOT NULL,
  `picture` text COLLATE utf8_spanish_ci NOT NULL,
  `status` text COLLATE utf8_spanish_ci NOT NULL,
  `id_u_profile` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `r_rol`
--
ALTER TABLE `r_rol`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `u_profile`
--
ALTER TABLE `u_profile`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `u_users`
--
ALTER TABLE `u_users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_rol` (`id_rol`);

--
-- Indices de la tabla `u_users_info`
--
ALTER TABLE `u_users_info`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_u_profile` (`id_u_profile`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `r_rol`
--
ALTER TABLE `r_rol`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `u_profile`
--
ALTER TABLE `u_profile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `u_users`
--
ALTER TABLE `u_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `u_users_info`
--
ALTER TABLE `u_users_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `u_users`
--
ALTER TABLE `u_users`
  ADD CONSTRAINT `u_users_ibfk_1` FOREIGN KEY (`id_rol`) REFERENCES `r_rol` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `u_users_info`
--
ALTER TABLE `u_users_info`
  ADD CONSTRAINT `u_users_info_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `u_users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `u_users_info_ibfk_2` FOREIGN KEY (`id_u_profile`) REFERENCES `u_profile` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
