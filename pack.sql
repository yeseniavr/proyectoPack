-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-11-2021 a las 21:37:57
-- Versión del servidor: 10.4.16-MariaDB
-- Versión de PHP: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `pack`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bulto`
--

CREATE TABLE `bulto` (
  `id_bulto` int(11) NOT NULL,
  `guia_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cod_pais`
--

CREATE TABLE `cod_pais` (
  `id_pais` int(11) NOT NULL,
  `codigo` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cod_pais`
--

INSERT INTO `cod_pais` (`id_pais`, `codigo`) VALUES
(13, 'VEN'),
(32, 'CUB'),
(6201, 'maturin');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalles_bulto`
--

CREATE TABLE `detalles_bulto` (
  `id_detalle` int(11) NOT NULL,
  `descripcion` varchar(20) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio_unitario` float NOT NULL,
  `bulto_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `factura`
--

CREATE TABLE `factura` (
  `id_factura` int(11) NOT NULL,
  `fecha` date NOT NULL DEFAULT current_timestamp(),
  `precio_fuel` decimal(5,2) DEFAULT 0.05,
  `importe_fuel` decimal(5,2) DEFAULT 3.67,
  `guia_id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `guia_embarque`
--

CREATE TABLE `guia_embarque` (
  `id_guia` int(11) NOT NULL,
  `cod_origen` int(11) NOT NULL,
  `fecha_emb` date NOT NULL,
  `valor_mercancia` decimal(10,0) NOT NULL,
  `peso_real` float NOT NULL,
  `tipo_bulto` varchar(20) NOT NULL,
  `descripcion` varchar(20) NOT NULL,
  `empaquetado` char(2) NOT NULL,
  `peso_volumetrico` float NOT NULL,
  `incotem` varchar(25) NOT NULL,
  `domicilio` char(2) NOT NULL,
  `personasEnv_id` int(11) NOT NULL,
  `personasDest_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `guia_embarque`
--

INSERT INTO `guia_embarque` (`id_guia`, `cod_origen`, `fecha_emb`, `valor_mercancia`, `peso_real`, `tipo_bulto`, `descripcion`, `empaquetado`, `peso_volumetrico`, `incotem`, `domicilio`, `personasEnv_id`, `personasDest_id`) VALUES
(1, 13, '2021-11-02', '23000', 1, '2', 'eerewr', 'ee', 23, 'ee', 'su', 2, 3),
(5, 13, '2021-11-03', '34', 2, 'e', '2', 'ee', 54, 'rgrtg', 'gg', 2, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personas`
--

CREATE TABLE `personas` (
  `id_persona` int(11) NOT NULL,
  `dni` int(11) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `apellidos` varchar(20) NOT NULL,
  `direccion` varchar(50) NOT NULL,
  `tel` varchar(50) NOT NULL,
  `pais` varchar(20) NOT NULL,
  `departamento` varchar(50) NOT NULL,
  `cod_postal` int(11) NOT NULL,
  `correo` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `personas`
--

INSERT INTO `personas` (`id_persona`, `dni`, `nombre`, `apellidos`, `direccion`, `tel`, `pais`, `departamento`, `cod_postal`, `correo`) VALUES
(2, 15203027, 'maria ', 'brito', 'bolivar', '000', 'colmbia', 'asd', 13, 'y@gmail.com'),
(3, 14358123, 'olga', 'velasquez', 'paris', '099', 'paris', 'ddd', 32, 'c@gmail.com'),
(4, 15483062, 'jose', 'ortiz', 'ererew', '333', 'ewfref', '4rfr', 32, 'yu@gmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `nombre_usuario` varchar(20) NOT NULL,
  `pass` varchar(20) NOT NULL,
  `roll` varchar(20) DEFAULT NULL,
  `personas_id` int(11) NOT NULL,
  `imagen` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nombre_usuario`, `pass`, `roll`, `personas_id`, `imagen`) VALUES
(1, 'desarrollo', '123', NULL, 4, NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `bulto`
--
ALTER TABLE `bulto`
  ADD PRIMARY KEY (`id_bulto`),
  ADD KEY `guia_id` (`guia_id`);

--
-- Indices de la tabla `cod_pais`
--
ALTER TABLE `cod_pais`
  ADD PRIMARY KEY (`id_pais`);

--
-- Indices de la tabla `detalles_bulto`
--
ALTER TABLE `detalles_bulto`
  ADD PRIMARY KEY (`id_detalle`),
  ADD KEY `bulto_id` (`bulto_id`);

--
-- Indices de la tabla `factura`
--
ALTER TABLE `factura`
  ADD PRIMARY KEY (`id_factura`),
  ADD KEY `factura_usuario` (`usuario_id`),
  ADD KEY `guia_id` (`guia_id`);

--
-- Indices de la tabla `guia_embarque`
--
ALTER TABLE `guia_embarque`
  ADD PRIMARY KEY (`id_guia`),
  ADD KEY `cod_origen` (`cod_origen`),
  ADD KEY `personas_id` (`personasEnv_id`),
  ADD KEY `personasDest_id` (`personasDest_id`);

--
-- Indices de la tabla `personas`
--
ALTER TABLE `personas`
  ADD PRIMARY KEY (`id_persona`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `personas_usuario` (`personas_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `bulto`
--
ALTER TABLE `bulto`
  MODIFY `id_bulto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `factura`
--
ALTER TABLE `factura`
  MODIFY `id_factura` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `guia_embarque`
--
ALTER TABLE `guia_embarque`
  MODIFY `id_guia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `personas`
--
ALTER TABLE `personas`
  MODIFY `id_persona` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `bulto`
--
ALTER TABLE `bulto`
  ADD CONSTRAINT `bulto_guia` FOREIGN KEY (`guia_id`) REFERENCES `guia_embarque` (`id_guia`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `detalles_bulto`
--
ALTER TABLE `detalles_bulto`
  ADD CONSTRAINT `detalle_bulto` FOREIGN KEY (`bulto_id`) REFERENCES `bulto` (`id_bulto`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `factura`
--
ALTER TABLE `factura`
  ADD CONSTRAINT `factura_ibfk_1` FOREIGN KEY (`guia_id`) REFERENCES `guia_embarque` (`id_guia`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `factura_usuario` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `guia_embarque`
--
ALTER TABLE `guia_embarque`
  ADD CONSTRAINT `destinatario` FOREIGN KEY (`personasDest_id`) REFERENCES `personas` (`id_persona`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `guia_pais` FOREIGN KEY (`cod_origen`) REFERENCES `cod_pais` (`id_pais`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `remitente` FOREIGN KEY (`personasEnv_id`) REFERENCES `personas` (`id_persona`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `personas_usuario` FOREIGN KEY (`personas_id`) REFERENCES `personas` (`id_persona`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `personas_usuarios` FOREIGN KEY (`personas_id`) REFERENCES `personas` (`id_persona`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
