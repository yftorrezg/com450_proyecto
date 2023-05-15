
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

CREATE TABLE `libros` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `codigo` varchar(255) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `imagen` varchar(255) NOT NULL,
  `ganancia` decimal(5,2) NOT NULL,
  `precio_venta` decimal(5,2) NOT NULL,
  `precio_compra` decimal(5,2) NOT NULL,
  `existencia` decimal(5,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

INSERT INTO `libros` (`id`, `codigo`, `nombre`, `imagen`, `ganancia`, `precio_venta`, `precio_compra`, `existencia`) VALUES
(8, '1', '100 años de soledad', '1682234454_5c373a08327e3cfa52a3.png', '20.00', '50.00', '30.00', '5.00'),
(11, '2', 'Las vidas de marie', '1682231533_5dfab58006ff6f79e042.jpg', '20.00', '50.00', '30.00', '5.00'),
(16, '3', 'Animales fantasticos', '1682272504_bb5f6aee9f610a6dd457.png', '20.00', '50.00', '30.00', '5.00'),
(17, '4', 'Cuentos infantiles', '1682272518_0506fd1350dfaa80d34c.png', '20.00', '50.00', '30.00', '5.00'),
(18, '5', 'El camino de la miseria', '1682272593_da38dbd18a6bcc565208.jpeg', '20.00', '50.00', '30.00', '5.00'),
(20, '6', 'Yafer', '1683073052_4dbc495d82130f0cc173.png', '30.00', '60.00', '30.00', '5.00'),
(21, '10', 'yafer', '1683108406_a7ac73046b1eaf0e0c2a.png', '100.00', '200.00', '100.00', '10.00'),
(22, '100', 'fercho', '1683121187_209ed6e9bf6859b27001.jpg', '999.99', '999.99', '999.99', '10.00');


CREATE TABLE `productos_vendidos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_producto` bigint(20) UNSIGNED NOT NULL,
  `cantidad` bigint(20) UNSIGNED NOT NULL,
  `precio` decimal(5,2) NOT NULL,
  `id_venta` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;



CREATE TABLE `ventas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fecha` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

ALTER TABLE `libros`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `productos_vendidos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_producto` (`id_producto`),
  ADD KEY `id_venta` (`id_venta`);

ALTER TABLE `ventas`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `libros`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

ALTER TABLE `productos_vendidos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

ALTER TABLE `ventas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

ALTER TABLE `productos_vendidos`
  ADD CONSTRAINT `productos_vendidos_ibfk_1` FOREIGN KEY (`id_producto`) REFERENCES `libros` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `productos_vendidos_ibfk_2` FOREIGN KEY (`id_venta`) REFERENCES `ventas` (`id`) ON DELETE CASCADE;
COMMIT;

