-- phpMyAdmin SQL Dump
-- version 5.2.0-dev+20211010.2e1971e258
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 31-03-2022 a las 15:23:16
-- Versión del servidor: 8.0.17
-- Versión de PHP: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `test`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignatura`
--

CREATE TABLE `asignatura` (
  `id_asignatura` int(5) UNSIGNED NOT NULL,
  `id_grado` int(5) UNSIGNED NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `alumnos_matriculados` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `asignatura`
--

INSERT INTO `asignatura` (`id_asignatura`, `id_grado`, `nombre`, `alumnos_matriculados`) VALUES
(1, 1, 'Ingles para Ingenieros', 10),
(2, 1, 'Estructura de Datos No Lineales', 457),
(3, 2, 'Como Cobrar el Paro', 200),
(4, 2, 'Tuercas y Tornillos II', 3682);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `centro`
--

CREATE TABLE `centro` (
  `id_centro` int(5) UNSIGNED NOT NULL,
  `nombre_centro` varchar(50) NOT NULL,
  `localidad` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `centro`
--

INSERT INTO `centro` (`id_centro`, `nombre_centro`, `localidad`) VALUES
(1, 'Escuela Superior de Ingeniería', 'Puerto Real'),
(2, 'Facultad de Derecho', 'Jerez de la Frontera'),
(3, 'Facultad de Medicina', 'Cádiz'),
(4, 'Escuela de Arte', 'Jerez de La Frontera'),
(5, 'CASEM', 'Puerto Real');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiante`
--

CREATE TABLE `estudiante` (
  `id_estudiante` int(5) UNSIGNED NOT NULL,
  `user_alum` varchar(50) NOT NULL,
  `nombre_estudiante` varchar(50) DEFAULT NULL,
  `apellido_estudiante` varchar(50) DEFAULT NULL,
  `contraseña_estudiante` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `estudiante`
--

INSERT INTO `estudiante` (`id_estudiante`, `user_alum`, `nombre_estudiante`, `apellido_estudiante`, `contraseña_estudiante`) VALUES
(1, 'raularcos', 'Raul', 'Arcos Herrera', '$2y$10$mRXRfxSUyzGGcZf30JL0WOE2bvYja1nYR88dux3jM5GDwET8b0spy'),
(2, 'antonioroldan', 'Antonio', 'Roldan Andrade', '$2y$10$mRXRfxSUyzGGcZf30JL0WOE2bvYja1nYR88dux3jM5GDwET8b0spy');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grado`
--

CREATE TABLE `grado` (
  `id_grado` int(5) UNSIGNED NOT NULL,
  `id_centro` int(5) UNSIGNED DEFAULT NULL,
  `nombre_grado` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `grado`
--

INSERT INTO `grado` (`id_grado`, `id_centro`, `nombre_grado`) VALUES
(1, 1, 'Grado de Ingeniería Informática'),
(2, 1, 'Grado en Mecánica'),
(3, 2, 'Grado en Administracion y Direccion de Empresas'),
(4, 2, 'Grado en Derecho'),
(5, 3, 'Grado en Medicina'),
(6, 4, 'Grado en Paro'),
(7, 5, 'Grado en Ciencias Medioambientales');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profesor`
--

CREATE TABLE `profesor` (
  `id_profesor` int(5) UNSIGNED NOT NULL,
  `user_prof` varchar(50) NOT NULL,
  `id_asignatura` int(5) UNSIGNED NOT NULL,
  `es_coordinador` bit(1) NOT NULL,
  `nombre_profesor` varchar(50) NOT NULL,
  `contraseña_profesor` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `profesor`
--

INSERT INTO `profesor` (`id_profesor`, `user_prof`, `id_asignatura`, `es_coordinador`, `nombre_profesor`, `contraseña_profesor`) VALUES
(1, 'joseantoniodelahuerta', 2, b'1', 'Jose Alonso de La Huerta', '$2y$10$mRXRfxSUyzGGcZf30JL0WOE2bvYja1nYR88dux3jM5GDwET8b0spy'),
(2, 'eneas', 1, b'1', 'Eneas Sanchez DonPerignon', '$2y$10$mRXRfxSUyzGGcZf30JL0WOE2bvYja1nYR88dux3jM5GDwET8b0spy');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `asignatura`
--
ALTER TABLE `asignatura`
  ADD PRIMARY KEY (`id_asignatura`),
  ADD KEY `id_grado` (`id_grado`);

--
-- Indices de la tabla `centro`
--
ALTER TABLE `centro`
  ADD PRIMARY KEY (`id_centro`);

--
-- Indices de la tabla `estudiante`
--
ALTER TABLE `estudiante`
  ADD PRIMARY KEY (`id_estudiante`);

--
-- Indices de la tabla `grado`
--
ALTER TABLE `grado`
  ADD PRIMARY KEY (`id_grado`),
  ADD KEY `id_centro` (`id_centro`);

--
-- Indices de la tabla `profesor`
--
ALTER TABLE `profesor`
  ADD PRIMARY KEY (`id_profesor`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `asignatura`
--
ALTER TABLE `asignatura`
  MODIFY `id_asignatura` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `centro`
--
ALTER TABLE `centro`
  MODIFY `id_centro` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `estudiante`
--
ALTER TABLE `estudiante`
  MODIFY `id_estudiante` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `grado`
--
ALTER TABLE `grado`
  MODIFY `id_grado` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `profesor`
--
ALTER TABLE `profesor`
  MODIFY `id_profesor` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `asignatura`
--
ALTER TABLE `asignatura`
  ADD CONSTRAINT `asignatura_ibfk_1` FOREIGN KEY (`id_grado`) REFERENCES `grado` (`id_grado`);

--
-- Filtros para la tabla `grado`
--
ALTER TABLE `grado`
  ADD CONSTRAINT `grado_ibfk_1` FOREIGN KEY (`id_centro`) REFERENCES `centro` (`id_centro`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
