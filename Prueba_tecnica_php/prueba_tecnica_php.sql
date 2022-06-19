-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-06-2022 a las 08:45:57
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `prueba_tecnica_php`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL,
  `nombre` varchar(250) NOT NULL,
  `apellidoP` varchar(250) NOT NULL,
  `apellidoM` varchar(250) NOT NULL,
  `edad` int(11) NOT NULL,
  `genero` varchar(250) NOT NULL,
  `sucursal` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id`, `nombre`, `apellidoP`, `apellidoM`, `edad`, `genero`, `sucursal`) VALUES
(32, 'holo', 'weq', 'qwe', 33, 'qwe', 'Sucursal 3'),
(35, 'blenderssad', 'weq', 'qwe', 33, 'qwe', 'Sucursal 4'),
(36, 'blenderssad', 'weq', 'qwe', 33, 'Hombre', 'Sucursal 2'),
(37, 'holo', 'weq', 'qwe', 33, 'Mujer', 'Sucursal 2'),
(38, 'holo', 'weq', 'qwe', 33, 'Hombre', 'Sucursal 1'),
(39, 'holo', 'weq', 'qwe', 33, 'Hombre', 'Sucursal 1'),
(40, 'holo', 'weq', 'qwe', 33, 'Hombre', 'Sucursal 1'),
(41, 'holo', 'weq', 'qwe', 33, 'Hombre', 'Sucursal 1'),
(42, 'holo', 'weq', 'qwe', 33, 'Hombre', 'Sucursal 1'),
(43, 'holo', 'weq', 'qwe', 33, 'Hombre', 'Sucursal 1'),
(44, 'holo', 'weq', 'qwe', 33, 'Hombre', 'Sucursal 1'),
(45, 'holo', 'weq', 'qwe', 33, 'Hombre', 'Sucursal 2'),
(46, 'holo', 'weq', 'qwe', 33, 'Hombre', 'Sucursal 2'),
(47, 'holo', 'weq', 'qwe', 33, 'Hombre', 'Sucursal 2'),
(48, 'holo', 'weq', 'qwe', 33, 'Hombre', 'Sucursal 2'),
(49, 'blenderssad', 'weq', 'qwe', 33, 'Mujer', 'Sucursal 2'),
(50, 'blenderssad', 'weq', 'qwe', 33, 'Mujer', 'Sucursal 2');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
