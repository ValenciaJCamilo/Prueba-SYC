-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-04-2023 a las 20:22:02
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `prueba_desarrollo`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL,
  `nume_doc` int(18) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `direccion` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id`, `nume_doc`, `nombre`, `direccion`) VALUES
(1, 1005163899, 'Juan Camilo Valencia Silva', 'Nueva Foresta'),
(2, 1005109890, 'Laura Juliana Lozano Calderón', 'San Bernardo'),
(3, 1098801911, 'David Silva', 'San Alonso');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estados_factura`
--

CREATE TABLE `estados_factura` (
  `codi_estado` int(2) NOT NULL,
  `descripcion` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `estados_factura`
--

INSERT INTO `estados_factura` (`codi_estado`, `descripcion`) VALUES
(1, 'VIGENTE'),
(2, 'PAGADA'),
(3, 'VENCIDA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `factura`
--

CREATE TABLE `factura` (
  `id_factura` bigint(18) NOT NULL,
  `valor_fac` bigint(18) NOT NULL,
  `fecha_fac` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `id_cliente` int(11) NOT NULL,
  `codi_estado` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `factura`
--

INSERT INTO `factura` (`id_factura`, `valor_fac`, `fecha_fac`, `id_cliente`, `codi_estado`) VALUES
(1, 150000, '2023-04-26 17:51:30', 1, 2),
(2, 250000, '2023-04-26 17:51:42', 1, 1),
(3, 300000, '2023-04-26 17:51:53', 1, 2),
(4, 50000, '2023-04-26 17:52:07', 1, 1),
(5, 250000, '2023-04-26 17:52:15', 1, NULL),
(6, 500000, '2023-04-26 17:54:27', 3, 1),
(7, 450000, '2023-04-26 17:54:44', 2, 3),
(8, 300000, '2023-04-26 17:55:03', 3, 1),
(9, 50000, '2023-04-26 17:55:24', 2, 3),
(10, 150000, '2023-04-26 18:15:13', 3, 2),
(11, 50000, '2023-04-26 18:15:53', 2, 3),
(12, 250000, '2023-04-26 18:16:35', 3, 3);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `estados_factura`
--
ALTER TABLE `estados_factura`
  ADD PRIMARY KEY (`codi_estado`);

--
-- Indices de la tabla `factura`
--
ALTER TABLE `factura`
  ADD PRIMARY KEY (`id_factura`),
  ADD KEY `id_cliente` (`id_cliente`),
  ADD KEY `codi_estado` (`codi_estado`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `estados_factura`
--
ALTER TABLE `estados_factura`
  MODIFY `codi_estado` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `factura`
--
ALTER TABLE `factura`
  MODIFY `id_factura` bigint(18) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `factura`
--
ALTER TABLE `factura`
  ADD CONSTRAINT `factura_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `clientes` (`id`),
  ADD CONSTRAINT `factura_ibfk_2` FOREIGN KEY (`codi_estado`) REFERENCES `estados_factura` (`codi_estado`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
