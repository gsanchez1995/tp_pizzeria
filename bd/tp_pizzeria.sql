-- phpMyAdmin SQL Dump
-- version 4.4.12
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-11-2015 a las 18:25:44
-- Versión del servidor: 5.6.25
-- Versión de PHP: 5.6.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tp_pizzeria`
--
CREATE DATABASE IF NOT EXISTS `tp_pizzeria` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `tp_pizzeria`;

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `BorrarProducto`(IN `paramId` INT)
    NO SQL
DELETE FROM productos WHERE id=paramId$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `BorrarUsuario`(IN `paramId` INT)
    NO SQL
DELETE FROM usuarios WHERE id=paramId$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `InsertarProducto`(IN `paramNombre` VARCHAR(100), IN `paramPrecio` INT, IN `paramFoto` VARCHAR(100))
INSERT INTO productos(nombre,precio,foto) VALUES (paramNombre,paramPrecio,paramFoto)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `InsertarReseteo`(IN `paramMail` VARCHAR(50), IN `paramToken` VARCHAR(200))
    NO SQL
INSERT INTO reseteopassword (mail, token, creado) VALUES(paramMail,paramToken,NOW())$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `InsertarUsuario`(IN `paramNombre` VARCHAR(50), IN `paramMail` VARCHAR(50), IN `paramClave` VARCHAR(50), IN `paramTipo` VARCHAR(50))
INSERT INTO usuarios(nombre,mail,clave,tipo) VALUES (paramNombre,paramMail,paramClave,paramTipo)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `InsertarVenta`(IN `paramPedido` VARCHAR(200), IN `paramPrecio` INT, IN `paramProvincia` VARCHAR(100), IN `paramLocalidad` VARCHAR(100), IN `paramDireccion` VARCHAR(100), IN `paramTipo` VARCHAR(50), IN `paramPromocion` VARCHAR(50), IN `paramId_vendedor` INT)
INSERT INTO ventas(pedido,precio,provincia,localidad,direccion,tipo,promocion,id_vendedor) VALUES (paramPedido,paramPrecio,paramProvincia,paramLocalidad,paramDireccion,paramTipo,paramPromocion,paramId_vendedor)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ModificarProducto`(IN `paramNombre` VARCHAR(100), IN `paramPrecio` INT, IN `paramFoto` VARCHAR(100), IN `paramId` INT)
    MODIFIES SQL DATA
UPDATE productos SET nombre=paramNombre,precio=paramPrecio,foto=paramFoto WHERE id=paramId$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ModificarUsuario`(IN `paramNombre` VARCHAR(50), IN `paramMail` VARCHAR(50), IN `paramClave` VARCHAR(50), IN `paramId` VARCHAR(50))
    MODIFIES SQL DATA
UPDATE usuarios SET nombre=paramNombre,mail=paramMail,clave=paramClave WHERE id=paramId$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `TraerProductoPorId`(IN `paramId` INT)
    READS SQL DATA
SELECT * FROM productos WHERE id=paramId$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `TraerReseteoPorToken`(IN `paramToken` VARCHAR(200))
    NO SQL
SELECT * FROM reseteopassword WHERE token=paramToken$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `TraerTodasLasVentas`()
    READS SQL DATA
SELECT v.id,v.pedido,v.precio,v.provincia,v.localidad,v.direccion,v.tipo,v.promocion,u.nombre as vendedor
FROM ventas as v, usuarios as u
WHERE v.id_vendedor = u.id$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `TraerTodosLosProductos`()
    READS SQL DATA
SELECT * FROM productos$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `TraerTodosLosReseteos`()
    NO SQL
select * from reseteopassword$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `TraerTodosLosUsuarios`()
    READS SQL DATA
SELECT * FROM usuarios$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `TraerUsuarioPorId`(IN `paramId` INT)
    READS SQL DATA
SELECT * FROM usuarios WHERE id=paramId$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `TraerUsuarioPorMail`(IN `paramMail` VARCHAR(50))
    READS SQL DATA
SELECT * FROM usuarios WHERE mail=paramMail$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE IF NOT EXISTS `productos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `precio` int(11) NOT NULL,
  `foto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reseteopassword`
--

CREATE TABLE IF NOT EXISTS `reseteopassword` (
  `id` int(11) NOT NULL,
  `mail` varchar(50) NOT NULL,
  `token` varchar(200) NOT NULL,
  `creado` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `reseteopassword`
--

INSERT INTO `reseteopassword` (`id`, `mail`, `token`, `creado`) VALUES
(24, 'user10@user.com.ar', '491c1d00ce801a2ff9de4fd862faafd1', '2015-11-17 17:16:42'),
(25, 'admin2@admin.com.ar', 'ab46461f29b2982fe9e0f0f493ba28b4', '2015-11-17 17:20:30'),
(26, 'user3@user.com.ar', 'a641232129e3b498a29b66a4d231d928', '2015-11-17 17:22:19');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `mail` varchar(50) NOT NULL,
  `clave` varchar(50) NOT NULL,
  `tipo` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `mail`, `clave`, `tipo`) VALUES
(8, 'user2', 'user2@user.com.ar', 'e00cf25ad42683b3df678c61f42c6bda', 'user'),
(9, 'user3', 'user3@user.com.ar', '92877af70a45fd6a2ed7fe81e1236b78', 'user'),
(10, 'admin1', 'admin1@admin.com.ar', 'e00cf25ad42683b3df678c61f42c6bda', 'admin'),
(11, 'admin2', 'admin2@admin.com.ar', 'c84258e9c39059a89ab77d846ddab909', 'admin'),
(12, 'user1', 'user1@user.com.ar', '24c9e15e52afc47c225b757e7bee1f9d', 'user'),
(13, 'user10', 'user10@user.com.ar', 'ddb2ffcbd5bd0c0bc400c5f14c41b166', 'user');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE IF NOT EXISTS `ventas` (
  `id` int(11) NOT NULL,
  `pedido` varchar(200) NOT NULL,
  `precio` int(11) NOT NULL,
  `provincia` varchar(100) NOT NULL,
  `localidad` varchar(100) NOT NULL,
  `direccion` varchar(100) NOT NULL,
  `tipo` varchar(50) NOT NULL,
  `promocion` varchar(50) NOT NULL,
  `id_vendedor` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`id`, `pedido`, `precio`, `provincia`, `localidad`, `direccion`, `tipo`, `promocion`, `id_vendedor`) VALUES
(7, '3 de jamon y morrones', 165, 'Buenos Aires', 'Avellaneda', 'Mitre 750', 'Empresa', 'si', 10),
(8, '2 de jamon y morrones, 2 de producto nuevo', 130, 'Buenos Aires', 'Lanus', 'san martin 500', 'Empresa', 'no', 10),
(9, '01 de jamon y morrones, 1 de producto nuevo, 2 de prod mod', 291, 'Capital', 'La Boca', 'sarmiento 100', 'Particular', 'si', 10);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `reseteopassword`
--
ALTER TABLE `reseteopassword`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `reseteopassword`
--
ALTER TABLE `reseteopassword`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
DELIMITER $$
--
-- Eventos
--
CREATE DEFINER=`root`@`localhost` EVENT `MiEvento` ON SCHEDULE EVERY 1 DAY STARTS '2015-11-11 13:41:15' ON COMPLETION NOT PRESERVE ENABLE DO DELETE FROM reseteopassword WHERE creado <= DATE_SUB(CURTIME(), INTERVAL 2 DAY)$$

DELIMITER ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
