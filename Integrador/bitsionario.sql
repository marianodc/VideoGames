-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 08-11-2012 a las 00:07:49
-- Versión del servidor: 5.5.24-log
-- Versión de PHP: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `bitsionario`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `autores`
--

CREATE TABLE IF NOT EXISTS `autores` (
  `id_autor` int(11) NOT NULL AUTO_INCREMENT,
  `autor` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_autor`),
  KEY `autor` (`autor`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=9 ;

--
-- Volcado de datos para la tabla `autores`
--

INSERT INTO `autores` (`id_autor`, `autor`) VALUES
(7, 'Alexis Gutierrez'),
(4, 'Analia Furez mori'),
(6, 'Diego Antonio Rodriguez'),
(5, 'Fabian Sanchez'),
(2, 'Jorge Luis Borgues'),
(3, 'Jose Antionio Morales'),
(8, 'Marianela Estigarribia ');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE IF NOT EXISTS `categorias` (
  `id_categoria` int(11) NOT NULL AUTO_INCREMENT,
  `categoria` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_categoria`),
  KEY `categoria` (`categoria`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=13 ;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id_categoria`, `categoria`) VALUES
(2, 'Bigrafias'),
(6, 'Biologia'),
(8, 'Cocina'),
(9, 'Derecho'),
(12, 'Fisica'),
(3, 'Geografia'),
(4, 'Historia'),
(7, 'Informatica'),
(10, 'Ingenieria'),
(1, 'Literatura Infantil'),
(5, 'Matematicas'),
(11, 'Quimica ');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compras`
--

CREATE TABLE IF NOT EXISTS `compras` (
  `nro_compra` int(11) NOT NULL AUTO_INCREMENT,
  `correo_usuario` varchar(50) NOT NULL,
  `tarjeta` varchar(20) NOT NULL,
  `num_tarjeta` int(11) NOT NULL,
  `titular_tarjeta` varchar(50) NOT NULL,
  `fecha` date NOT NULL,
  `importe_total` float NOT NULL,
  PRIMARY KEY (`nro_compra`),
  UNIQUE KEY `tarjeta` (`tarjeta`),
  UNIQUE KEY `num_tarjeta` (`num_tarjeta`),
  UNIQUE KEY `titular_tarjeta` (`titular_tarjeta`),
  UNIQUE KEY `fecha` (`fecha`),
  UNIQUE KEY `importe_total` (`importe_total`),
  UNIQUE KEY `correo_usuario` (`correo_usuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `compras`
--

INSERT INTO `compras` (`nro_compra`, `correo_usuario`, `tarjeta`, `num_tarjeta`, `titular_tarjeta`, `fecha`, `importe_total`) VALUES
(5, 'diegomarianocantero@hotmail.com', 'master', 1112223332, 'Hugo Marcelo', '2012-11-07', 500);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalles_compra`
--

CREATE TABLE IF NOT EXISTS `detalles_compra` (
  `id_compra` int(11) NOT NULL AUTO_INCREMENT,
  `id_producto` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio` float NOT NULL,
  PRIMARY KEY (`id_compra`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `detalles_compra`
--

INSERT INTO `detalles_compra` (`id_compra`, `id_producto`, `cantidad`, `precio`) VALUES
(1, 123123122, 1, 250),
(2, 221222, 1, 205),
(4, 123123122, 1, 250),
(5, 123123122, 2, 250);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libros`
--

CREATE TABLE IF NOT EXISTS `libros` (
  `id_libro` int(11) NOT NULL AUTO_INCREMENT,
  `ISBN` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `nombre` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `editorial` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `anio` int(4) NOT NULL,
  `descripcion` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `precio` float NOT NULL,
  `categoria` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `autor` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `imagen` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_libro`),
  KEY `categoria` (`categoria`,`autor`),
  KEY `autor` (`autor`),
  KEY `categoria_2` (`categoria`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `libros`
--

INSERT INTO `libros` (`id_libro`, `ISBN`, `nombre`, `editorial`, `anio`, `descripcion`, `precio`, `categoria`, `autor`, `imagen`) VALUES
(2, '5455-321321-3413', 'Quimica Organica I', 'Estrada', 2005, 'sdfsdf', 200, 'Quimica ', 'Alexis Gutierrez', 'Imagenes/DER_PCEmergencia.PNG'),
(4, '221222', 'Las mil y una noches', 'Lanus', 2550, 'asasdasd', 205, 'Literatura Infantil', 'Alexis Gutierrez', 'Imagenes/las-mil-noches-y-una-noche.jpg'),
(5, '123123122', 'Steve Jobs - Biografia', 'Laaiiaia', 2009, 'Biografia de uno de los mas grandes genios de la informatica y las tecnologias.', 250, 'Bigrafias', 'Marianela Estigarribia ', 'Imagenes/Biografia-Steve-Jobs.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mensajes`
--

CREATE TABLE IF NOT EXISTS `mensajes` (
  `nroMensaje` int(11) NOT NULL AUTO_INCREMENT,
  `consulta` varchar(200) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `telfijo` int(11) DEFAULT NULL,
  `telcel` int(11) DEFAULT NULL,
  `domicilio` varchar(50) DEFAULT NULL,
  `fecha` date NOT NULL,
  PRIMARY KEY (`nroMensaje`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `mensajes`
--

INSERT INTO `mensajes` (`nroMensaje`, `consulta`, `usuario`, `telfijo`, `telcel`, `domicilio`, `fecha`) VALUES
(2, 'ertertert', 'pedro', 453453, 345345, 'retert', '2012-11-07'),
(3, 'asdhkkkkkkkkkkakjdhakjdhakjdhakjdhakjdhaskjdhaskjdahskjdahskjdhaskjahkahskjahdkjhdakshdajdhadhakjhdasdasdasdasdasd', 'pedro', 2223333, 23423423, 'wsdfsdf', '2012-11-07');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id_usuarios` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(50) CHARACTER SET latin1 NOT NULL,
  `password` varchar(30) CHARACTER SET latin1 NOT NULL,
  `correo` varchar(50) CHARACTER SET latin1 NOT NULL,
  `categ` int(11) NOT NULL,
  PRIMARY KEY (`id_usuarios`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=11 ;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuarios`, `usuario`, `password`, `correo`, `categ`) VALUES
(1, 'diego', 'diego', 'diegomarianocantero@hotmail.com', 0),
(10, 'pedro', 'pedro', 'pedro@pedro.com', 1);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `libros`
--
ALTER TABLE `libros`
  ADD CONSTRAINT `libros_ibfk_1` FOREIGN KEY (`categoria`) REFERENCES `categorias` (`categoria`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `libros_ibfk_2` FOREIGN KEY (`autor`) REFERENCES `autores` (`autor`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
