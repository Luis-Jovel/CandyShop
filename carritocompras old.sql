-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-10-2015 a las 19:40:50
-- Versión del servidor: 5.6.17
-- Versión de PHP: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `carritocompras`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compras`
--

CREATE TABLE IF NOT EXISTS `compras` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `idproducto` int(11) DEFAULT NULL,
  `idusuario` int(11) DEFAULT NULL,
  `numeroventa` int(11) NOT NULL,
  `nombre` text COLLATE utf8mb4_spanish_ci NOT NULL,
  `imagen` text COLLATE utf8mb4_spanish_ci NOT NULL,
  `precio` text COLLATE utf8mb4_spanish_ci NOT NULL,
  `cantidad` text COLLATE utf8mb4_spanish_ci NOT NULL,
  `subtotal` text COLLATE utf8mb4_spanish_ci NOT NULL,
  PRIMARY KEY (`Id`),
  KEY `idproducto` (`idproducto`),
  KEY `idusuario` (`idusuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci AUTO_INCREMENT=13 ;

--
-- Volcado de datos para la tabla `compras`
--

INSERT INTO `compras` (`Id`, `idproducto`, `idusuario`, `numeroventa`, `nombre`, `imagen`, `precio`, `cantidad`, `subtotal`) VALUES
(1, NULL, NULL, 1, 'Galaxy s4', 'galaxy.jpg', '9800', '2', '19600'),
(2, NULL, NULL, 1, 'cebolla', 'cebolla.jpg', '10.5', '1', '10.5'),
(3, NULL, NULL, 2, 'computadora hp', 'computadora.jpg', '7400.5', '1', '7400.5'),
(4, NULL, NULL, 2, 'Elemnt Skateboard', 'element.jpg', '700', '5', '3500'),
(5, NULL, NULL, 3, 'Jalapenos', 'jalapenos.jpg', '15', '2', '30'),
(6, NULL, NULL, 4, 'Galaxy s4', 'galaxy.jpg', '9800', '1', '9800'),
(7, NULL, NULL, 4, 'cebolla', 'cebolla.jpg', '10.5', '2', '21'),
(8, NULL, NULL, 5, 'Galaxy s4', 'galaxy.jpg', '9800', '1', '9800'),
(9, NULL, NULL, 6, 'cebolla', 'cebolla.jpg', '10.5', '2', '21'),
(10, NULL, NULL, 7, 'Bolsa de gomitas azucaradas', 'gomitas.jpg', '10.5', '1', '10.5'),
(11, NULL, NULL, 8, 'Paquete dulces cute', 'cute.png', '5.99', '1', '5.99'),
(12, NULL, NULL, 8, 'Globos 10 pulgadas x50', 'globos.jpg', '7.99', '1', '7.99');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE IF NOT EXISTS `productos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` text COLLATE utf8mb4_spanish_ci NOT NULL,
  `descripcion` text COLLATE utf8mb4_spanish_ci NOT NULL,
  `imagen` text COLLATE utf8mb4_spanish_ci NOT NULL,
  `precio` double NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `nombre`, `descripcion`, `imagen`, `precio`) VALUES
(1, 'Bolsa de gomitas azucaradas', 'Tan saborsas como coloridas<br>1 bolsa de 0.5 lbs de gomitas azucaradas para fiestas, aniversarios, reuniones, etc.', 'gomitas.jpg', 10.5),
(2, 'Paquete dulces cute', 'Dulces cute, la mejor forma de expresar lo que sientes es con dulces<br>Paquete 1 lb de dulces cute <br>Sabores: <ul><li>Fresa</li><li>Uva</li><li>Melocot&oacute;n</li><li>Manzana</li></ul>', 'cute.png', 5.99),
(3, 'Globos 10 pulgadas x50', 'Paquete de globos de 10 pulgadas para celebraciones y cumplea&ntilde;os.<br>El paquete contiene 50 unidades', 'globos.jpg', 7.99),
(4, 'Utensilios de mesa blancos', 'Utensilios de mesa de plastico color blanco', 'curbeteria.jpg', 3.99),
(5, 'Orden de cupcakes', 'Orden de cupcakes de chocolate con toping de caramelo, listos para servir <br> Para fiestas, celebraciones, aniversarios, bodas o por degustación propia', 'cupcake.jpg', 9.99);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(100) NOT NULL,
  `Apellido` varchar(100) NOT NULL,
  `Usuario` varchar(100) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `Imagen` varchar(50) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`Id`, `Nombre`, `Apellido`, `Usuario`, `Password`, `Imagen`) VALUES
(1, 'Moises', 'Montano', 'Moises', '123', 'imagen.jpg');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `compras`
--
ALTER TABLE `compras`
  ADD CONSTRAINT `fk_compras_usuarios` FOREIGN KEY (`idusuario`) REFERENCES `usuarios` (`Id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_compras_productos` FOREIGN KEY (`idproducto`) REFERENCES `productos` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
