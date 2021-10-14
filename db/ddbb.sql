-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: mysqldb
-- Tiempo de generación: 09-09-2021 a las 20:00:39
-- Versión del servidor: 8.0.26
-- Versión de PHP: 7.4.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "-03:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tpedb`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para las tablas
--
CREATE TABLE `fabricante` (
  `id_fabricante` int(11) NOT NULL,
  `descripcion` varchar(200) NOT NULL,
  `pais` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `producto` (
  `id_producto` int(11) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `precio` int NOT NULL,
  `id_fabricante` int NOT NULL 
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `usuario` (
  `id_usuario` bigint UNSIGNED NOT NULL,
  `email` varchar(200) NOT NULL,
  `pass` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos
--

INSERT INTO `fabricante` (`id_fabricante`, `descripcion`, `pais`) VALUES
(1, 'Stanley', 'Estados Unidos'),
(2, 'Hellmans', 'Argentina'),
(3, 'Gloria', 'Argentina');

INSERT INTO `producto` (`id_producto`, `nombre`, `precio`, `id_fabricante`) VALUES
(1, 'Termo 500ml', 1700, 1),
(2, 'Mayonesa 1000gr', 250, 2),
(3, 'Cuaderno 80 hojas rayadas', 100, 3);

INSERT INTO `usuario` (`id_usuario`, `email`, `pass`) VALUES
(1, 'admin@admin.com', '$2y$10$wFO3LGHuNpv6RPKPXASmI..fgim4JtaD2IfUYSbadkHRWrtlRF./m');


--
-- Índices para tablas volcadas
--

ALTER TABLE `producto`
  ADD PRIMARY KEY (`id_producto`),
  ADD UNIQUE KEY `id_producto` (`id_producto`);

ALTER TABLE `fabricante`
  ADD PRIMARY KEY (`id_fabricante`),
  ADD UNIQUE KEY `id_fabricante` (`id_fabricante`);

ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `id_usuario` (`id_usuario`);




--
-- AUTO_INCREMENT de las tablas volcadas
--


ALTER TABLE `producto`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

ALTER TABLE `usuario`
  MODIFY `id_usuario` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

ALTER TABLE `fabricante`
  MODIFY `id_fabricante` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

ALTER TABLE `producto`
  ADD CONSTRAINT `producto_idfk1` FOREIGN KEY (`id_fabricante`) REFERENCES `fabricante` (`id_fabricante`);

  COMMIT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;


