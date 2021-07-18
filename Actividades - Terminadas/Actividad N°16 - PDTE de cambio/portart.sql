-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 01-07-2021 a las 07:41:53
-- Versión del servidor: 10.4.19-MariaDB
-- Versión de PHP: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `portart`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`) VALUES
(1, 'Lalo', '1232', 'juegoslalo1@gmail.com'),
(2, '2331', '$2y$10$8ziKALNrRQNL9p53QRcqwecXnmZTEStBoRrEhZ5WMs4aIec8RoZ7m', 'juegoslalo2@gmail.com'),
(3, 'pepe', '$2y$10$pX6QRocwvXLuDof9OCgm/O65U9pLgectb3Nt3sQUAvid6UuPndvIy', 'juegosl@gma.com'),
(4, 'Alvaro', '$2y$10$SjnF2BPFWOKqp5LbtLxpfeI9UUlQqBgjzIMHCBty55aEJPJ/BVm9G', 'gatitamimosa@hotmail.com'),
(5, 'Rodrigo', '$2y$10$HdUVJgn6omXqXjLOhdRu7.fB8kFVbFBUDYxNezPozQ6G8wjmes416', 'pepe1@gmail.com'),
(6, 'Pepe3', '$2y$10$r4mflmmrA.jYD8Viu9/3QOUZtqa1/ikcM8v1PakM2tlt6IofiFVI.', 'aaaa@gg.cl');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
