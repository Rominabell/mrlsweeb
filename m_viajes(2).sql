-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 01-09-2025 a las 21:20:46
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `m_viajes`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Carrito`
--

CREATE TABLE `Carrito` (
  `id_carrito` int(10) NOT NULL,
  `fecha_creacion` date NOT NULL,
  `estado` varchar(10) NOT NULL,
  `id_cliente` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrito_detalle`
--

CREATE TABLE `carrito_detalle` (
  `cantidad` int(10) NOT NULL,
  `id_paquete` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `id_cliente` int(10) NOT NULL,
  `nombre` varchar(10) NOT NULL,
  `edad` int(10) NOT NULL,
  `email` varchar(30) NOT NULL,
  `telefono` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paquete`
--

CREATE TABLE `paquete` (
  `id_paquete` int(10) NOT NULL,
  `nombre` varchar(10) NOT NULL,
  `tipo` int(10) NOT NULL,
  `descripcion` varchar(50) NOT NULL,
  `incluye_vuelo` varchar(5) NOT NULL,
  `estado` varchar(10) NOT NULL,
  `fecha_promocion_inicio` date NOT NULL,
  `fecha_promocion_fin` date NOT NULL,
  `fecha_viaje` date NOT NULL,
  `duracion` int(10) NOT NULL,
  `id_empresa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `paquete`
--

INSERT INTO `paquete` (`id_paquete`, `nombre`, `tipo`, `descripcion`, `incluye_vuelo`, `estado`, `fecha_promocion_inicio`, `fecha_promocion_fin`, `fecha_viaje`, `duracion`, `id_empresa`) VALUES
(1, 'Andina', 1, 'Tour en Cusco con vuelo', 'Sí', 'activo', '2025-08-01', '2025-08-15', '2025-09-01', 5, 0),
(2, 'Maya', 2, 'Ruinas mayas + hotel', 'No', 'activo', '2025-08-05', '2025-08-20', '2025-09-10', 4, 0),
(3, 'Amazonas', 3, 'Selva, lodge y excursión', 'Sí', 'activo', '2025-08-10', '2025-08-30', '2025-09-15', 7, 0),
(4, 'Glaciar', 4, 'Patagonia y trekking', 'No', 'activo', '2025-07-20', '2025-08-15', '2025-10-01', 6, 0),
(5, 'Caribe', 5, 'Playa todo incluido', 'Sí', 'activo', '2025-08-01', '2025-08-31', '2025-09-25', 5, 0),
(6, 'Inca', 1, 'Caminata al Machu Picchu', 'No', 'activo', '2025-08-10', '2025-09-01', '2025-10-10', 6, 0),
(7, 'Salar', 6, 'Salar de Uyuni full day', 'No', 'activo', '2025-08-15', '2025-09-05', '2025-10-20', 3, 0),
(8, 'Galápagos', 7, 'Tour islas y fauna marina', 'Sí', 'activo', '2025-08-18', '2025-09-10', '2025-10-25', 8, 0),
(9, 'Cataratas', 8, 'Iguazú + hotel 3 noches', 'No', 'activo', '2025-08-01', '2025-08-30', '2025-09-20', 4, 0),
(10, 'Atacama', 9, 'Desierto y observatorio', 'No', 'activo', '2025-08-10', '2025-08-25', '2025-10-05', 5, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paquete_proveedor`
--

CREATE TABLE `paquete_proveedor` (
  `cupos_disponibles` int(10) NOT NULL,
  `id_provedor` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedor`
--

CREATE TABLE `proveedor` (
  `id_provedor` int(10) NOT NULL,
  `nombre` varchar(10) NOT NULL,
  `tipo` varchar(10) NOT NULL,
  `contacto` int(10) NOT NULL,
  `id_empresa` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicio`
--

CREATE TABLE `servicio` (
  `id_servicio` int(10) NOT NULL,
  `nombre` varchar(10) NOT NULL,
  `tipo` varchar(10) NOT NULL,
  `descripcion` varchar(30) NOT NULL,
  `id_paquete` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD UNIQUE KEY `email` (`email`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
