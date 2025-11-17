-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3307
-- Tiempo de generación: 17-11-2025 a las 01:57:12
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
-- Base de datos: `web_resenas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(10) NOT NULL,
  `username` varchar(50) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellido` varchar(100) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `rol` enum('usuario','admin','superusuario') NOT NULL DEFAULT 'usuario',
  `estado` enum('activo','inactivo') DEFAULT 'activo',
  `fecha_registro` datetime NOT NULL DEFAULT current_timestamp(),
  `celular` varchar(10) NOT NULL,
  `session_token` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `username`, `nombre`, `apellido`, `user_password`, `email`, `rol`, `estado`, `fecha_registro`, `celular`, `session_token`) VALUES
(3, 'ajosue48', 'Anderson', 'Escobar', '$2y$10$AE2KsUvhH8BKF6Peg.Gzpe3LI1biuVZCn3WbX6MqbxIc6jz.DreEu', 'anderson64@gmail.com', 'usuario', 'activo', '2025-11-16 04:53:29', '0999909999', NULL),
(4, 'anderson2', 'Anderson', 'Escobar', '$2y$10$VVaL3YISDsYZHp/3nf9ITesyJ1Kpn6Xe0pDuY5VqBjv976i11pvtW', 'anderson4@gmail.com', 'usuario', 'activo', '2025-11-16 15:53:24', '0991909999', NULL),
(5, 'andersonescobar1', 'Anderson Josue', 'Escobar', '$2y$10$syS/uUPdCEexPgAfAcMJ7.OXTO8R6hd38qKGpjmZ9h1AZ/SYVAMg6', 'ajescobar4@utpl.edu.ec', 'usuario', 'inactivo', '2025-11-16 18:25:41', '0999944332', NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `celular` (`celular`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `celular_2` (`celular`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
