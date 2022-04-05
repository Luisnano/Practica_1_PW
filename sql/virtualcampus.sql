-- phpMyAdmin SQL Dump
-- version 5.2.0-dev+20211010.2e1971e258
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 04-04-2022 a las 22:02:23
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
-- Base de datos: `virtualcampus`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignatura`
--

CREATE TABLE `asignatura` (
  `id_asignatura` int(5) UNSIGNED NOT NULL,
  `id_grado` int(5) UNSIGNED NOT NULL,
  `nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `asignatura`
--

INSERT INTO `asignatura` (`id_asignatura`, `id_grado`, `nombre`) VALUES
(1, 1, 'Ingles para Ingenieros'),
(2, 1, 'Estructura de Datos No Lineales'),
(3, 2, 'Como Cobrar el Paro'),
(4, 2, 'Tuercas y Tornillos II');

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
(1, 'raularcos', 'Raul', 'Arcos Herrera', '$2y$10$6GyjapT9RtHEAK516t99DeGckuw0MBP5OLJZMYjBGhrCrghrxd3Ci'),
(2, 'antonioroldan', 'Antonio', 'Roldan Andrade', '$2y$10$mRXRfxSUyzGGcZf30JL0WOE2bvYja1nYR88dux3jM5GDwET8b0spy'),
(5, 'luistorres', 'Luis', 'Torres Moya', '$2y$10$Sii19B4hclmzzyuToeYyiuUNyisEv8T33PdLfeXRAfoR3hYP8hExm'),
(6, 'jesuslag', 'Jesús ', 'Lagares Galán', '$2y$10$LBYn64yOsTfe.hxSTi9QVOfYV4zw5kiiFb9Qi7XekCTDqMGQQR4Eq'),
(7, 'luisf', 'Luis', 'Flecha Carpintero', '$2y$10$yDMvzg4Odm7YXD5S/K4P.OKysOlLhBVqIHj73HeN5GC.stJa836vW'),
(8, 'josemolo', 'Jose Luis', 'Moreno Gamero', '$2y$10$BkBFG/4FwHNUOO1E/rqFzOkOrRMMxxzvUXhex0zXMMSIKOkvx7dwq'),
(9, 'pablov', 'Pablo', 'Velicias Barquín', '$2y$10$mKpWEwyJdgHI34d.yaPTg.r9/rIbKGr6W.BNputftpK4nUEE34XXS'),
(10, 'teresasuper', 'Teresa', 'Supervielle Sanchez', '$2y$10$8GrKfLEoJVivJNGExK59XOXWws8ec0PrwFrbOLq.qPiCCdwDmocoa'),
(11, 'patrigalvez', 'Patricia', 'Gálvez Entrena', '$2y$10$reSoCwl4A7kIqxp.aeb7ZueEsIs.xbEpSFs1m/xeepz7fISq1xOi.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `examen`
--

CREATE TABLE `examen` (
  `id_examen` int(5) UNSIGNED NOT NULL,
  `id_alumno` int(5) UNSIGNED NOT NULL,
  `id_asignatura` int(5) UNSIGNED NOT NULL,
  `id_preguntas` varchar(200) NOT NULL,
  `nota_examen` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `examen`
--

INSERT INTO `examen` (`id_examen`, `id_alumno`, `id_asignatura`, `id_preguntas`, `nota_examen`) VALUES
(1, 1, 2, '1,2', 5),
(5, 9, 2, '14,1,7,', 10),
(6, 7, 2, '1,2', 2),
(7, 11, 2, '1,2', 7),
(8, 6, 2, '14,1,7,', 1),
(9, 8, 2, '14,1,7,', 8),
(10, 2, 2, '14,1,7,', 3),
(11, 10, 2, '14,1,7,', 7),
(12, 9, 2, '14,1,7,', 8),
(13, 1, 1, '3,4,', 5);

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
-- Estructura de tabla para la tabla `matricula`
--

CREATE TABLE `matricula` (
  `id_asignatura` int(5) UNSIGNED NOT NULL,
  `id_estudiante` int(5) UNSIGNED NOT NULL,
  `nota_final` float UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `matricula`
--

INSERT INTO `matricula` (`id_asignatura`, `id_estudiante`, `nota_final`) VALUES
(1, 1, 5),
(2, 1, 5),
(2, 2, 3),
(2, 5, 6),
(2, 6, 1),
(2, 7, 2),
(2, 8, 8),
(2, 9, 9),
(2, 10, 7),
(2, 11, 7);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pregunta`
--

CREATE TABLE `pregunta` (
  `id_pregunta` int(5) UNSIGNED NOT NULL,
  `id_asignatura` int(5) UNSIGNED NOT NULL,
  `texto_pregunta` varchar(200) NOT NULL,
  `r1` varchar(200) NOT NULL,
  `r2` varchar(200) NOT NULL,
  `r3` varchar(200) NOT NULL,
  `r4` varchar(200) NOT NULL,
  `correcta` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `tema` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `pregunta`
--

INSERT INTO `pregunta` (`id_pregunta`, `id_asignatura`, `texto_pregunta`, `r1`, `r2`, `r3`, `r4`, `correcta`, `tema`) VALUES
(1, 2, '¿Cuantos nodos tiene un arbol binario?', '1', '2', '3', '4', '2', 'Arboles'),
(3, 1, '¿Is this a computer?', 'yes', 'no', 'maybe', 'lol', 'yes', 'Computer'),
(4, 1, '¿How is a computer?', 'fine', 'what?', '4', 'bababoye', '4', 'Computer'),
(7, 2, '¿Cuantos Nodos tiene un Arbol General?', 'Ninguno ', 'Pregunta trampa', '3', '2', 'Pregunta trampa', 'Arboles'),
(14, 2, '¿Es la implementación Vectorial más eficiente que la de Listas en los Árboles Binarios?', 'No le hagas caso a las respuestas porque me las estoy inventando', 'Si', 'No', 'Depende de la profundidad', 'No', 'Arboles'),
(15, 2, '¿Es un grafo real, ¿Real??', 'No', 'Si', 'Tal vez?', 'Ninguna de las Anteriores', 'Si', 'Grafos'),
(16, 2, 'Si haces Hash a una contraseña, ¿Sabrías decir el número de dígitos que tiene tu tarjeta de Crédito?', 'Si', '12', 'No', 'Eso es Imposible excepto que seas el Banquero', 'No', 'Hash');

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
(1, 'joseantoniodelahuerta', 2, b'1', 'Jose Antonio de La Huerta', '$2y$10$e.cfdYiU5zwR0YR3Djkq0OD4qPgWBHIMTUXcPAJFvG6Vyl5DAXGRC'),
(2, 'pacodediscreta', 1, b'1', 'Paco el de Discreta', '$2y$10$CJ8wuanRYhos4LO2oSrIQO3PxKH.n8L9DlWT3gXD/u2yzjQzUBaPC');

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
-- Indices de la tabla `examen`
--
ALTER TABLE `examen`
  ADD PRIMARY KEY (`id_examen`),
  ADD KEY `id_alumno` (`id_alumno`),
  ADD KEY `id_asignatura` (`id_asignatura`);

--
-- Indices de la tabla `grado`
--
ALTER TABLE `grado`
  ADD PRIMARY KEY (`id_grado`),
  ADD KEY `id_centro` (`id_centro`);

--
-- Indices de la tabla `matricula`
--
ALTER TABLE `matricula`
  ADD PRIMARY KEY (`id_asignatura`,`id_estudiante`),
  ADD KEY `id_estudiante` (`id_estudiante`);

--
-- Indices de la tabla `pregunta`
--
ALTER TABLE `pregunta`
  ADD PRIMARY KEY (`id_pregunta`),
  ADD KEY `id_asignatura` (`id_asignatura`);

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
  MODIFY `id_estudiante` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `examen`
--
ALTER TABLE `examen`
  MODIFY `id_examen` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `grado`
--
ALTER TABLE `grado`
  MODIFY `id_grado` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `pregunta`
--
ALTER TABLE `pregunta`
  MODIFY `id_pregunta` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `profesor`
--
ALTER TABLE `profesor`
  MODIFY `id_profesor` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `asignatura`
--
ALTER TABLE `asignatura`
  ADD CONSTRAINT `asignatura_ibfk_1` FOREIGN KEY (`id_grado`) REFERENCES `grado` (`id_grado`);

--
-- Filtros para la tabla `examen`
--
ALTER TABLE `examen`
  ADD CONSTRAINT `examen_ibfk_1` FOREIGN KEY (`id_alumno`) REFERENCES `estudiante` (`id_estudiante`),
  ADD CONSTRAINT `examen_ibfk_2` FOREIGN KEY (`id_asignatura`) REFERENCES `asignatura` (`id_asignatura`);

--
-- Filtros para la tabla `grado`
--
ALTER TABLE `grado`
  ADD CONSTRAINT `grado_ibfk_1` FOREIGN KEY (`id_centro`) REFERENCES `centro` (`id_centro`);

--
-- Filtros para la tabla `matricula`
--
ALTER TABLE `matricula`
  ADD CONSTRAINT `matricula_ibfk_1` FOREIGN KEY (`id_asignatura`) REFERENCES `asignatura` (`id_asignatura`),
  ADD CONSTRAINT `matricula_ibfk_2` FOREIGN KEY (`id_estudiante`) REFERENCES `estudiante` (`id_estudiante`);

--
-- Filtros para la tabla `pregunta`
--
ALTER TABLE `pregunta`
  ADD CONSTRAINT `pregunta_ibfk_1` FOREIGN KEY (`id_asignatura`) REFERENCES `asignatura` (`id_asignatura`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
