-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-01-2014 a las 04:57:10
-- Versión del servidor: 5.6.14
-- Versión de PHP: 5.5.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `tienda`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE IF NOT EXISTS `clientes` (
  `nombre` varchar(20) NOT NULL,
  `apellido1` varchar(20) NOT NULL,
  `apellido2` varchar(20) NOT NULL,
  `email` varchar(40) NOT NULL,
  `password` varchar(16) NOT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`nombre`, `apellido1`, `apellido2`, `email`, `password`) VALUES
('aaa', 'aaa', 'aaa', 'aaa@gmail.com', 'aaa'),
('carlos', 'fdez', 'villa', 'cfvillahermosa@gmail.com', 'aaa');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE IF NOT EXISTS `pedidos` (
  `id_pedido` int(10) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `fecha` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `id_producto_pedido` int(10) NOT NULL,
  `imagen_pedido` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `cantidad` int(10) NOT NULL,
  PRIMARY KEY (`id_pedido`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `pedidos`
--

INSERT INTO `pedidos` (`id_pedido`, `usuario`, `fecha`, `id_producto_pedido`, `imagen_pedido`, `cantidad`) VALUES
(1, 'cfvillahermosa@gmail.com', '0000-00-00 00:00:00', 4, 'images/productos/iphone.jpg', 1),
(2, 'aaa@gmail.com', '0000-00-00 00:00:00', 4, 'images/productos/iphone.jpg', 1),
(3, 'aaa@gmail.com', '0000-00-00 00:00:00', 1, 'images/productos/gamepad.jpg', 1),
(4, 'aaa@gmail.com', '0000-00-00 00:00:00', 7, 'images/productos/multifuncion.jpg', 2),
(5, 'aaa@gmail.com', '0000-00-00 00:00:00', 1, 'images/productos/gamepad.jpg', 1),
(6, 'cfvillahermosa@gmail.com', '0000-00-00 00:00:00', 1, 'images/productos/gamepad.jpg', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE IF NOT EXISTS `productos` (
  `id_producto` int(10) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` varchar(150) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `stock` int(10) NOT NULL,
  `precio` int(10) NOT NULL,
  `imagen` varchar(100) NOT NULL,
  PRIMARY KEY (`id_producto`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id_producto`, `nombre`, `descripcion`, `stock`, `precio`, `imagen`) VALUES
(1, 'Gamepad PC', 'Anatomico y moderno gamepad para PC', 0, 50, 'images/productos/gamepad.jpg'),
(2, 'Tarjeta Grafica', 'Potente tarjeta grafica para gamers', 3, 200, 'images/productos/grafica.jpg'),
(3, 'Ipad', 'Moderna tableta de la casa apple', 4, 200, 'images/productos/ipad.jpg'),
(4, 'Iphone', 'Smartphone de la casa apple', 5, 500, 'images/productos/iphone.jpg'),
(5, 'Portatil Alienware', 'Potente portatil para gamers de la casa Alienware', 8, 1200, 'images/productos/laptopalienware.jpg'),
(6, 'Monitor Curvo', 'Monitor curvo para gamers', 5, 1000, 'images/productos/monitorcurvo.jpg'),
(7, 'Impresora Multifuncion', 'Impresora Multifuncion con escaner', 1, 100, 'images/productos/multifuncion.jpg'),
(8, 'Pendrive', 'Pendrive 3.0 256GB capacidad', 10, 65, 'images/productos/pendrive.jpg'),
(9, 'Razer Naga', 'Raton para gamers con teclado numerico', 12, 70, 'images/productos/ratonnaga.jpg'),
(10, 'Sobremesa', 'Sobremesa Acer Predator para gamers', 16, 1500, 'images/productos/sobremesa.jpg'),
(11, 'Disco solido', 'Disco SSD ', 0, 120, 'images/productos/ssd.jpg'),
(12, 'Teclado Mecanico', 'Teclado con membrana mecanica para gamers de la casa Razer', 8, 150, 'images/productos/tecladorazer.jpg');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
