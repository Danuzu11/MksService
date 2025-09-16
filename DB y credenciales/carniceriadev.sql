-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-09-2025 a las 22:59:19
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `carniceriadev`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL,
  `tipo_producto` varchar(50) NOT NULL,
  `descripcion` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `tipo_producto`, `descripcion`) VALUES
(1, 'carne de primera', 'Productos carnicos de primera'),
(2, 'charcuterias', 'Productos de charcutería de todo tipo de embutidos'),
(4, 'harina', 'productos basado en harina');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cierrecajas`
--

CREATE TABLE `cierrecajas` (
  `id` int(11) NOT NULL,
  `fecha_cierre` date NOT NULL,
  `total_efectivo` decimal(10,2) DEFAULT NULL,
  `total_tarjeta` decimal(10,2) DEFAULT NULL,
  `total_divisas` decimal(10,2) DEFAULT NULL,
  `total_punto` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `cierrecajas`
--

INSERT INTO `cierrecajas` (`id`, `fecha_cierre`, `total_efectivo`, `total_tarjeta`, `total_divisas`, `total_punto`) VALUES
(11, '2024-05-11', 12445.00, 620.50, 12.50, 5.00),
(17, '2024-05-02', 500.50, 5.50, 1.00, 200.50),
(18, '2024-05-01', 1.00, 1.00, 1.00, 1.00),
(28, '2024-05-13', 2.00, 4.00, 14.50, 20.00),
(29, '2024-05-14', 0.00, 0.00, 0.00, 0.00),
(30, '2024-05-14', 0.00, 0.00, 0.00, 0.00);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `direccion` varchar(100) NOT NULL,
  `tlf` varchar(20) NOT NULL,
  `deuda` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id`, `nombre`, `direccion`, `tlf`, `deuda`) VALUES
(1, 'cliente corriente', '0', '0', 0.00),
(2, 'David Alejandro Rondon Alvarez', '12321', '123213', 1.00),
(29, 'daniel', 'direccion 1 1', '05846161900859', 20.00);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `distribuidores`
--

CREATE TABLE `distribuidores` (
  `id` int(11) NOT NULL,
  `tlf` varchar(20) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  `direccion` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `distribuidores`
--

INSERT INTO `distribuidores` (`id`, `tlf`, `nombre`, `descripcion`, `direccion`) VALUES
(3, '046161900859', 'David Alejandro Rondon Alvarez', 'descripcion1', 'av7'),
(4, '0416190859', 'rodrigo', 'descripcion2', 'av78'),
(5, '0416190859', 'Daniel', 'descripcion3', 'direccion 1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleados`
--

CREATE TABLE `empleados` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `salario` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `empleados`
--

INSERT INTO `empleados` (`id`, `nombre`, `salario`) VALUES
(1, 'nombre', 5.60),
(2, 'David Alejandro ', 23.00),
(3, 'empleado', 20.00);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `importes`
--

CREATE TABLE `importes` (
  `id` int(11) NOT NULL,
  `id_distribuidor` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `productos` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `importes`
--

INSERT INTO `importes` (`id`, `id_distribuidor`, `fecha`, `precio`, `productos`) VALUES
(1, 5, '2024-04-26', 4.50, '[\"1kg carne\"]'),
(2, 3, '2024-04-27', 123.00, '[\"huevos\",\"harina\"]'),
(4, 3, '2024-05-12', 123546.00, '[\"jamon\",\"queso\",\"salchichas\"]'),
(5, 3, '2024-05-12', 123.00, '[\"pan\",\"harina\",\"azucar\"]'),
(6, 3, '2024-05-12', 123.00, '[\"pan\",\"harina\",\"azucar\"]'),
(7, 3, '2024-05-12', 123.00, '[\"manzana\",\"manaza\"]'),
(8, 4, '2024-05-13', 1.00, '[\"pan\",\"azucar\",\"harina\",\"jamon\",\"chorizo\",\"cochino\",\"tocino\",\"huevos\",\"spagueti\",\"chicharon\"]'),
(9, 3, '2024-05-13', 10.00, '[\"azucar\",\"carne\",\"jamon\",\"queso\"]'),
(12, 3, '2024-05-13', 123.00, '[\"producto 1\",\"producto 2\",\"producto 3\"]'),
(13, 5, '2024-05-13', 400.00, '[\"Descripcion Producto 1\",\"Descripcion Producto 2\"]');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE `pedidos` (
  `id` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `fecha_pedido` date NOT NULL,
  `tipoPago` varchar(50) NOT NULL,
  `precio_total` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `pedidos`
--

INSERT INTO `pedidos` (`id`, `id_cliente`, `fecha_pedido`, `tipoPago`, `precio_total`) VALUES
(1, 1, '2024-05-11', 'Efectivo', 12345.00),
(2, 1, '2024-05-11', 'Efectivo', 100.00),
(4, 2, '2024-05-11', 'Divisas', 7.50),
(5, 1, '2024-05-11', 'Tarjeta', 600.00),
(6, 2, '2024-05-11', 'Tarjeta', 20.50),
(7, 2, '2024-05-11', 'Punto', 100.00),
(8, 2, '2024-05-11', 'Punto', 100.50),
(9, 1, '2024-05-11', 'Efectivo', 10.00),
(10, 1, '2024-05-13', 'Divisas', 10.00),
(11, 1, '2024-05-13', 'Divisas', 4.50),
(12, 1, '2024-05-13', 'Efectivo', 1.00),
(13, 1, '2024-05-13', 'Efectivo', 1.00),
(14, 1, '2024-05-13', 'Tarjeta', 2.00),
(15, 1, '2024-05-13', 'Tarjeta', 2.00),
(16, 2, '2024-05-13', 'Punto', 10.00);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `stock` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `id_categoria`, `nombre`, `descripcion`, `precio`, `stock`) VALUES
(2, 1, 'BISTECK', 'carne calidad Alta', 12.10, 12.10),
(3, 4, 'harina juana', 'asdasdas', 123.00, 231.00);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `nombre_rol` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `nombre_rol`) VALUES
(1, 'admin'),
(2, 'cajero');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `id_rol` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `id_rol`) VALUES
(4, 'gerente', '$2y$10$OgNDGkcOZnJ/Lwujpke.GuQaxZGeZ5u/xsKnZ5LmnyI.5jpRT1wVu', 1),
(5, 'cajero', '$2y$10$DKKrqIoBlCa8ezSKdJ.kP.49DtvlcfNPiNbR9kEASxNRRwAYwDamG', 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cierrecajas`
--
ALTER TABLE `cierrecajas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `distribuidores`
--
ALTER TABLE `distribuidores`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `importes`
--
ALTER TABLE `importes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_distribuidor` (`id_distribuidor`);

--
-- Indices de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_cliente` (`id_cliente`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_categoria` (`id_categoria`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_rol` (`id_rol`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `cierrecajas`
--
ALTER TABLE `cierrecajas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT de la tabla `distribuidores`
--
ALTER TABLE `distribuidores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `empleados`
--
ALTER TABLE `empleados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `importes`
--
ALTER TABLE `importes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `importes`
--
ALTER TABLE `importes`
  ADD CONSTRAINT `importes_ibfk_1` FOREIGN KEY (`id_distribuidor`) REFERENCES `distribuidores` (`id`);

--
-- Filtros para la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD CONSTRAINT `pedidos_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `clientes` (`id`);

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`id_categoria`) REFERENCES `categorias` (`id`);

--
-- Filtros para la tabla `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`id_rol`) REFERENCES `roles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
