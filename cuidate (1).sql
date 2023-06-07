-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-06-2023 a las 23:45:44
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
-- Base de datos: `cuidate`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `anadirmedicamentos`
--

CREATE TABLE `anadirmedicamentos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `descripcion` varchar(300) NOT NULL,
  `imagen` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `anadirmedicamentos`
--

INSERT INTO `anadirmedicamentos` (`id`, `nombre`, `descripcion`, `imagen`) VALUES
(5, 'alprazolam', 'Medicamento utilizado para tratar los trastornos de ansiedad y los trastornos de pánico.', 'img/uploads/alprazolam.png'),
(6, 'Aspirina', 'Medicamento utilizado como analgésico y antipirético para aliviar el dolor y reducir la fiebre.', 'img/uploads/aspirina.png'),
(7, 'Atorvastina', 'Medicamento utilizado para reducir los niveles de colesterol en la sangre y prevenir enfermedades cardiovasculares.', 'img/uploads/atorvastina.png'),
(8, 'Frenadol', 'Medicamento utilizado para el alivio de los síntomas de los resfriados y la gripe, como la congestión nasal, el dolor de cabeza y la fiebre.', 'img/uploads/frenadol.png'),
(9, 'gelocatil', 'Medicamento utilizado para el alivio del dolor y la reducción de la fiebre.', 'img/uploads/gelocatil.png'),
(10, 'Metformina', 'Medicamento utilizado para tratar la diabetes tipo 2 al mejorar la sensibilidad a la insulina y controlar los niveles de glucosa en la sangre.', 'img/uploads/metformina.png'),
(11, 'Omeprazol', 'Medicamento utilizado para reducir la producción de ácido en el estómago y tratar las úlceras gástricas, el reflujo ácido y otras condiciones relacionadas', 'img/uploads/omeprazol.png'),
(13, 'Paracetamol', 'Medicamento utilizado como analgésico y antipirético para aliviar el dolor y reducir la fiebre.', 'img/uploads/paracetamol.png'),
(14, 'Vitamina C', 'Suplemento vitamínico utilizado para fortalecer el sistema inmunológico y prevenir enfermedades.', 'img/uploads/vitaminad.png'),
(15, 'Simvastatina', 'sfsdgsg', 'img/uploads/simvastatina.png'),
(16, 'prueba ', 'sfszdgvds', 'img/uploads/atorvastina.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `citas`
--

CREATE TABLE `citas` (
  `id` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `especialidad` varchar(200) NOT NULL,
  `comentario` varchar(300) NOT NULL,
  `lugar` varchar(200) NOT NULL,
  `motivo` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `citas`
--

INSERT INTO `citas` (`id`, `fecha`, `hora`, `especialidad`, `comentario`, `lugar`, `motivo`) VALUES
(55, '0111-11-11', '11:11:00', 'Traumatología', '', 'f', 'f'),
(56, '2222-02-22', '22:22:00', 'traumatología', '', 'g', 'g'),
(57, '3333-03-31', '03:33:00', 'endocrinología', '', 'f', 'f'),
(58, '0444-04-04', '04:44:00', 'endocrinologia', '', 'f', 'f'),
(59, '5555-05-05', '05:55:00', 'oncologia', '', 'f', 'f'),
(60, '6666-06-06', '06:59:00', 'Oncología', '', 'trt', 'te'),
(61, '4544-05-04', '04:04:00', 'cardiologia', '', 'h', 'h'),
(62, '8555-07-05', '07:57:00', 'Cardiologia', '', 'f', 'f');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horarios`
--

CREATE TABLE `horarios` (
  `id` int(11) NOT NULL,
  `medicamentos_id` int(11) DEFAULT NULL,
  `horario` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `horarios`
--

INSERT INTO `horarios` (`id`, `medicamentos_id`, `horario`) VALUES
(3, 5, 'mañana'),
(4, 6, 'mediodia'),
(5, 7, 'almuerzo'),
(6, 8, 'merienda'),
(7, 9, 'cena'),
(8, 10, 'noche'),
(9, 11, 'mañana'),
(11, 13, 'cena'),
(12, 13, 'merienda'),
(13, 14, 'mediodia'),
(14, 14, 'almuerzo'),
(15, 15, 'noche'),
(16, 16, 'merienda');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registrar`
--

CREATE TABLE `registrar` (
  `id` int(11) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `contraseña` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `contraseña` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `anadirmedicamentos`
--
ALTER TABLE `anadirmedicamentos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `citas`
--
ALTER TABLE `citas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `horarios`
--
ALTER TABLE `horarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `medicamentos_id` (`medicamentos_id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `anadirmedicamentos`
--
ALTER TABLE `anadirmedicamentos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `citas`
--
ALTER TABLE `citas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT de la tabla `horarios`
--
ALTER TABLE `horarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `horarios`
--
ALTER TABLE `horarios`
  ADD CONSTRAINT `horarios_ibfk_1` FOREIGN KEY (`medicamentos_id`) REFERENCES `anadirmedicamentos` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
