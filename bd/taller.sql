-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-05-2023 a las 16:26:54
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
-- Base de datos: `taller`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `id` int(11) NOT NULL,
  `nombre` varchar(150) NOT NULL,
  `apellido` varchar(150) NOT NULL,
  `marca_vehiculo` varchar(150) NOT NULL,
  `modelo_vehiculo` varchar(150) NOT NULL,
  `placa_vehiculo` varchar(150) NOT NULL,
  `telefono` varchar(10) NOT NULL,
  `fecha_registro` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`id`, `nombre`, `apellido`, `marca_vehiculo`, `modelo_vehiculo`, `placa_vehiculo`, `telefono`, `fecha_registro`) VALUES
(1, 'Pedro', 'Parker', 'Toyota', 'Tacoma', 'P7889A8', '7578-4132', '2023-04-11'),
(2, 'Michael', 'Jordan', 'Toyota', 'Yaris', 'P78ASD5', '6969-7777', '2023-04-11'),
(5, 'Luis', 'Ayala', 'Toyota', 'Yaris', 'P7845A0', '7548-9875', '2023-05-03'),
(6, 'Ricardo', 'Arjona', 'Hyundai', 'Elantra', 'P745QE9', '7548-8999', '2023-05-29'),
(7, 'Gerson', 'Muñoz', 'Toyota', 'Corolla', 'P999666', '7676-8989', '2023-05-29'),
(8, 'Pedro', 'Parker', 'Kia', 'Soul', 'PZ9EE78', '6121-3141', '2023-05-29'),
(9, 'Alejandra ', 'Gomez', 'Kia ', 'Picanto', 'P01235HFD', '7548-8999', '2023-05-29');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado_rep`
--

CREATE TABLE `estado_rep` (
  `id_est` int(11) NOT NULL,
  `estado` varchar(155) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `estado_rep`
--

INSERT INTO `estado_rep` (`id_est`, `estado`) VALUES
(4, 'Inactivo'),
(5, 'En proceso'),
(6, 'Finalizado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `facturacion`
--

CREATE TABLE `facturacion` (
  `id_factura` int(11) NOT NULL,
  `id_reparacion` int(11) NOT NULL,
  `cliente` varchar(150) NOT NULL,
  `marcaveh` varchar(200) NOT NULL,
  `modelveh` varchar(200) NOT NULL,
  `placaveh` varchar(200) NOT NULL,
  `telefonoclient` varchar(10) NOT NULL,
  `descripcionrepa` varchar(255) NOT NULL,
  `fecha_reparacion` date NOT NULL,
  `gastorep` decimal(10,2) NOT NULL,
  `montorep` decimal(10,2) NOT NULL,
  `pagototal` decimal(10,2) NOT NULL,
  `codebarra` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `facturacion`
--

INSERT INTO `facturacion` (`id_factura`, `id_reparacion`, `cliente`, `marcaveh`, `modelveh`, `placaveh`, `telefonoclient`, `descripcionrepa`, `fecha_reparacion`, `gastorep`, `montorep`, `pagototal`, `codebarra`) VALUES
(2, 22, 'Alejandra  Gomez', 'Kia ', 'Picanto', 'P01235HFD', '7548-8999', 'Se reparo XD', '2023-05-31', 225.00, 100.00, 325.00, 'COD6474B46085B26');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reparaciones`
--

CREATE TABLE `reparaciones` (
  `id_rep` int(11) NOT NULL,
  `id_clientes` int(11) NOT NULL,
  `fallas` varchar(255) NOT NULL,
  `fecha_ingreso` date NOT NULL,
  `imagen` text DEFAULT NULL,
  `estado_rep` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `reparaciones`
--

INSERT INTO `reparaciones` (`id_rep`, `id_clientes`, `fallas`, `fecha_ingreso`, `imagen`, `estado_rep`) VALUES
(19, 1, 'Una lavadita y como nuevo gg', '2023-05-25', '2023-05-28-09-07-47__carrochocado.jpg', 5),
(20, 2, 'Escape roto, salio malo de fabrica', '2023-05-23', '2023-05-28-11-17-56__escaperoto.jpg', 6),
(21, 8, 'Falla de riadiador', '2023-05-17', '2023-05-29-08-12-27__motor_soul.jpg', 4),
(22, 9, 'Choque frontal', '2023-05-30', '2023-05-29-08-18-11__17854934_1746824768942679_3989891127454711388_o.jpg', 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id_rol` int(11) NOT NULL,
  `rol` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id_rol`, `rol`) VALUES
(1, 'Administrador'),
(2, 'Empleado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` text NOT NULL,
  `correo` varchar(255) NOT NULL,
  `token` varchar(100) NOT NULL,
  `id_rol` int(11) NOT NULL,
  `fecha_creacion` datetime NOT NULL,
  `fecha_actualizacion` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `username`, `password`, `correo`, `token`, `id_rol`, `fecha_creacion`, `fecha_actualizacion`) VALUES
(6, 'manuel', '$2y$10$T5ZTyE9xsCAsUHXD2BV6xe0eE.tN/1L.smMf2mcVC8.SY.3cdaJZq', 'manuel@gmail.com', '', 1, '2023-04-09 23:12:11', '2023-05-27 09:13:04'),
(7, 'carlos', '$2y$10$YPyqPp6RBcwSffwnlgQxMuAl6pHYoC5yy0PXJWKOSDIXpHl4KPaPC', 'carlos@gmail.com', '', 2, '2023-04-09 23:32:02', '0000-00-00 00:00:00'),
(16, 'fabian', '$2y$10$BGrWCIlpRgu.NFF4rivOtutHTFD1i.Ipjjl3p/WHsdS5gekNkAPh2', 'fabian@gmail.com', '', 2, '2023-04-11 16:17:05', '2023-05-02 21:02:05'),
(17, 'natividad', '$2y$10$XrZoAx5RrcDNP2zSY2E5XuczJpzn1c7ZfQBuTSB0d/d3fehLIMqPu', 'natividad@gmail.com', '', 1, '2023-04-11 21:07:52', '0000-00-00 00:00:00'),
(23, 'julio', '$2y$10$U5FpxxxqSxmxR6oq1HT3q.YW/cVDZZ0WJQTquxTn9jl7CS7xZxdeG', 'julio@gmail.com', '', 2, '2023-04-24 22:14:22', '0000-00-00 00:00:00'),
(24, 'brandon', '$2y$10$rCCkYpaMtACngCYAoS81/OHzjRxL24AYEXDr1dGlM2xzotf.B.wa.', 'brandon@gmail.com', '', 2, '2023-05-02 20:17:01', '0000-00-00 00:00:00'),
(26, 'luisayala', '$2y$10$LoEsSKvHCBXRijY9d.wmD.h8gPfxCZoFFF.J.VL9o4.SIwvKZQX9q', 'luisayala@unab.edu.sv', '', 2, '2023-05-29 08:13:45', '0000-00-00 00:00:00');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `estado_rep`
--
ALTER TABLE `estado_rep`
  ADD PRIMARY KEY (`id_est`);

--
-- Indices de la tabla `facturacion`
--
ALTER TABLE `facturacion`
  ADD PRIMARY KEY (`id_factura`),
  ADD KEY `id_reparacion` (`id_reparacion`);

--
-- Indices de la tabla `reparaciones`
--
ALTER TABLE `reparaciones`
  ADD PRIMARY KEY (`id_rep`),
  ADD KEY `id_clientes` (`id_clientes`),
  ADD KEY `estado_rep` (`estado_rep`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id_rol`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `id_rol` (`id_rol`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `estado_rep`
--
ALTER TABLE `estado_rep`
  MODIFY `id_est` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `facturacion`
--
ALTER TABLE `facturacion`
  MODIFY `id_factura` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `reparaciones`
--
ALTER TABLE `reparaciones`
  MODIFY `id_rep` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id_rol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `facturacion`
--
ALTER TABLE `facturacion`
  ADD CONSTRAINT `facturacion_ibfk_1` FOREIGN KEY (`id_reparacion`) REFERENCES `reparaciones` (`id_rep`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `reparaciones`
--
ALTER TABLE `reparaciones`
  ADD CONSTRAINT `reparaciones_ibfk_1` FOREIGN KEY (`id_clientes`) REFERENCES `cliente` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `reparaciones_ibfk_2` FOREIGN KEY (`estado_rep`) REFERENCES `estado_rep` (`id_est`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`id_rol`) REFERENCES `roles` (`id_rol`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
