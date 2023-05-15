-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-05-2023 a las 23:36:57
-- Versión del servidor: 10.4.25-MariaDB
-- Versión de PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bibliotecaci`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libros`
--

CREATE TABLE `libros` (
  `id` int(11) UNSIGNED NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `imagen` varchar(255) NOT NULL,
  `precio_venta` decimal(5,2) NOT NULL,
  `precio_compra` decimal(5,2) NOT NULL,
  `ganancia` decimal(5,2) NOT NULL,
  `existencia` decimal(5,2) NOT NULL,
  `codigo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `libros`
--

INSERT INTO `libros` (`id`, `nombre`, `imagen`, `precio_venta`, `precio_compra`, `ganancia`, `existencia`, `codigo`) VALUES
(8, '100 años de soledad', '1682234454_5c373a08327e3cfa52a3.png', '50.00', '30.00', '20.00', '5.00', '1'),
(11, 'Las vidas de marie', '1682231533_5dfab58006ff6f79e042.jpg', '50.00', '30.00', '20.00', '5.00', '2'),
(16, 'Animales fantasticos', '1682272504_bb5f6aee9f610a6dd457.png', '50.00', '30.00', '20.00', '5.00', '3'),
(17, 'Cuentos infantiles', '1682272518_0506fd1350dfaa80d34c.png', '50.00', '30.00', '20.00', '5.00', '4'),
(18, 'El camino de la miseria', '1682272593_da38dbd18a6bcc565208.jpeg', '50.00', '30.00', '20.00', '5.00', '5'),
(20, 'Yafer', '1683073052_4dbc495d82130f0cc173.png', '60.00', '30.00', '30.00', '5.00', '6'),
(21, 'yafer', '1683108406_a7ac73046b1eaf0e0c2a.png', '200.00', '100.00', '100.00', '10.00', '10');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos_vendidos`
--

CREATE TABLE `productos_vendidos` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_libros` int(11) UNSIGNED NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio` decimal(5,2) NOT NULL,
  `id_venta` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `id` int(10) UNSIGNED NOT NULL,
  `fecha` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `libros`
--
ALTER TABLE `libros`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ganancia_index` (`ganancia`);

--
-- Indices de la tabla `productos_vendidos`
--
ALTER TABLE `productos_vendidos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_ventas` (`id_venta`) USING BTREE,
  ADD KEY `id_libros` (`id_libros`) USING BTREE;

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `libros`
--
ALTER TABLE `libros`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `productos_vendidos`
--
ALTER TABLE `productos_vendidos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `productos_vendidos`
--
ALTER TABLE `productos_vendidos`
  ADD CONSTRAINT `productos_vendidos_ibfk_2` FOREIGN KEY (`id_venta`) REFERENCES `ventas` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `productos_vendidos_ibfk_3` FOREIGN KEY (`id_libros`) REFERENCES `libros` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
