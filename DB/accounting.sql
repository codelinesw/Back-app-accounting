-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 19-03-2020 a las 12:56:00
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
-- Base de datos: `accounting`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ad_role`
--

CREATE TABLE `ad_role` (
  `ad_role_id` int(11) NOT NULL,
  `ad_role_type` text COLLATE utf8_spanish_ci NOT NULL,
  `ad_key_role` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `ad_role`
--

INSERT INTO `ad_role` (`ad_role_id`, `ad_role_type`, `ad_key_role`) VALUES
(1, 'administrador', 1),
(2, 'Clientes', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `c_clients`
--

CREATE TABLE `c_clients` (
  `c_client_id` int(11) NOT NULL,
  `c_value` bigint(13) NOT NULL,
  `c_name` text COLLATE utf8_spanish_ci NOT NULL,
  `c_address` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `c_phone` bigint(14) NOT NULL,
  `ad_role_id` int(11) NOT NULL,
  `c_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `c_clients`
--

INSERT INTO `c_clients` (`c_client_id`, `c_value`, `c_name`, `c_address`, `c_phone`, `ad_role_id`, `c_date`, `updated`) VALUES
(6, 212223, 'Jhon Denver Murillo', 'Cra. 33a #39-34', 3117222333, 2, '2020-01-23 03:34:00', '2020-01-22 22:34:00'),
(8, 212223, 'Jairo Alberto', 'Cra. 33a #39-34', 3218075562, 2, '2020-01-23 04:16:10', '2020-01-22 23:16:10'),
(11, 212223, 'Samir abadia', 'Cra.60 #39-34', 3117222333, 2, '2020-03-18 04:20:13', '2020-03-17 23:20:13');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `p_payment_product`
--

CREATE TABLE `p_payment_product` (
  `p_payment_product_id` int(11) NOT NULL,
  `s_sales_id` int(11) NOT NULL,
  `p_payment_product` float NOT NULL,
  `p_balance` float NOT NULL,
  `p_date_payment` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `p_payment_product`
--

INSERT INTO `p_payment_product` (`p_payment_product_id`, `s_sales_id`, `p_payment_product`, `p_balance`, `p_date_payment`) VALUES
(21, 11, 20000, 20000, '2020-01-30 00:56:38'),
(22, 14, 70000, 90000, '2020-01-30 00:55:02'),
(31, 15, 45000, 17000, '2020-03-15 15:58:15'),
(32, 18, 20000, 35000, '2020-03-16 03:45:49'),
(33, 18, 12000, 43000, '2020-03-16 03:46:22'),
(35, 19, 15000, 15000, '2020-03-16 03:47:40'),
(38, 20, 15000, 30000, '2020-03-18 04:22:14'),
(39, 20, 20000, 25000, '2020-03-18 04:22:24');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `p_products`
--

CREATE TABLE `p_products` (
  `p_products_id` int(11) NOT NULL,
  `p_name` text COLLATE utf8_spanish_ci NOT NULL,
  `p_description` text COLLATE utf8_spanish_ci NOT NULL,
  `p_price` float NOT NULL,
  `p_count` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `p_products`
--

INSERT INTO `p_products` (`p_products_id`, `p_name`, `p_description`, `p_price`, `p_count`) VALUES
(1, 'Jeans', 'Este es el producto que mas se vende', 120000, 30),
(2, 'Bermudas', 'Este producto se compra eventualmente.', 60000, 12),
(3, 'Blusas', 'Este producto se compra eventualmente.', 60000, 12),
(4, 'Boxer', 'Este producto se compra eventualmente.', 40000, 12),
(5, 'Busos Hombre', 'Este producto se compra eventualmente.', 70000, 12),
(6, 'Camisas Hombre', 'Este producto se compra eventualmente.', 90000, 12),
(7, 'Leggis', 'Este articulo lo compre donde don jovanni', 45000, 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `p_purchases`
--

CREATE TABLE `p_purchases` (
  `p_purchase_id` int(11) NOT NULL,
  `p_product_id` int(11) NOT NULL,
  `p_price` float NOT NULL,
  `p_count` int(2) NOT NULL,
  `p_purchase_date` timestamp(1) NOT NULL DEFAULT current_timestamp(1) ON UPDATE current_timestamp(1)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `s_sales`
--

CREATE TABLE `s_sales` (
  `s_sales_id` int(11) NOT NULL,
  `p_product_id` int(11) NOT NULL,
  `c_client_id` int(11) NOT NULL,
  `s_description` text COLLATE utf8_spanish_ci NOT NULL,
  `s_price` float NOT NULL,
  `s_count` int(2) NOT NULL,
  `s_sale_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `s_sales`
--

INSERT INTO `s_sales` (`s_sales_id`, `p_product_id`, `c_client_id`, `s_description`, `s_price`, `s_count`, `s_sale_date`) VALUES
(11, 6, 8, 'Venta de 1 Camisa Hombre por una valor de $50000', 50000, 1, '2028-01-28 06:00:00'),
(14, 1, 8, 'Venta de 2 Jean por una valor de $160000', 160000, 2, '2020-01-29 23:45:50'),
(15, 4, 8, 'Venta de 2 Boxer por una valor de $62000', 62000, 2, '2020-03-14 19:28:50'),
(18, 1, 6, 'Venta de 1 Jean por una valor de $55000', 55000, 1, '2020-03-16 03:45:27'),
(19, 4, 6, 'Venta de 1 Boxer por una valor de $30000', 30000, 1, '2020-03-16 03:46:46'),
(20, 1, 11, 'Venta de 1 Jean por una valor de $45000', 45000, 1, '2020-03-18 04:20:51');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `ad_role`
--
ALTER TABLE `ad_role`
  ADD PRIMARY KEY (`ad_role_id`),
  ADD UNIQUE KEY `ad_role_id` (`ad_role_id`);

--
-- Indices de la tabla `c_clients`
--
ALTER TABLE `c_clients`
  ADD PRIMARY KEY (`c_client_id`),
  ADD KEY `ad_role_id` (`ad_role_id`);

--
-- Indices de la tabla `p_payment_product`
--
ALTER TABLE `p_payment_product`
  ADD PRIMARY KEY (`p_payment_product_id`),
  ADD KEY `s_sales_id` (`s_sales_id`);

--
-- Indices de la tabla `p_products`
--
ALTER TABLE `p_products`
  ADD PRIMARY KEY (`p_products_id`);

--
-- Indices de la tabla `p_purchases`
--
ALTER TABLE `p_purchases`
  ADD PRIMARY KEY (`p_purchase_id`),
  ADD KEY `p_product_id` (`p_product_id`);

--
-- Indices de la tabla `s_sales`
--
ALTER TABLE `s_sales`
  ADD PRIMARY KEY (`s_sales_id`),
  ADD KEY `p_product_id` (`p_product_id`),
  ADD KEY `c_client_id` (`c_client_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `ad_role`
--
ALTER TABLE `ad_role`
  MODIFY `ad_role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `c_clients`
--
ALTER TABLE `c_clients`
  MODIFY `c_client_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `p_payment_product`
--
ALTER TABLE `p_payment_product`
  MODIFY `p_payment_product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT de la tabla `p_products`
--
ALTER TABLE `p_products`
  MODIFY `p_products_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `p_purchases`
--
ALTER TABLE `p_purchases`
  MODIFY `p_purchase_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `s_sales`
--
ALTER TABLE `s_sales`
  MODIFY `s_sales_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `p_payment_product`
--
ALTER TABLE `p_payment_product`
  ADD CONSTRAINT `Pagos` FOREIGN KEY (`s_sales_id`) REFERENCES `s_sales` (`s_sales_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `p_purchases`
--
ALTER TABLE `p_purchases`
  ADD CONSTRAINT `Product` FOREIGN KEY (`p_product_id`) REFERENCES `p_products` (`p_products_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `s_sales`
--
ALTER TABLE `s_sales`
  ADD CONSTRAINT `Clientes` FOREIGN KEY (`c_client_id`) REFERENCES `c_clients` (`c_client_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `Ventas_Producto` FOREIGN KEY (`p_product_id`) REFERENCES `p_products` (`p_products_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
