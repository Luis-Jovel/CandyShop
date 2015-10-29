/*
Navicat MySQL Data Transfer

Source Server         : mysql
Source Server Version : 50621
Source Host           : localhost:3306
Source Database       : carritocompras

Target Server Type    : MYSQL
Target Server Version : 50621
File Encoding         : 65001

Date: 2015-10-29 00:35:29
*/
SET FOREIGN_KEY_CHECKS=0;
drop database if exists carritocompras;
create database carritocompras;
use carritocompras;
-- ----------------------------
-- Table structure for categoria
-- ----------------------------
DROP TABLE IF EXISTS `categoria`;
CREATE TABLE `categoria` (
  `idcategoria` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idcategoria`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of categoria
-- ----------------------------
INSERT INTO `categoria` VALUES ('1', 'Reposter&iacute;a');
INSERT INTO `categoria` VALUES ('2', 'Decoraci&oacute;n');
INSERT INTO `categoria` VALUES ('3', 'Cuberter&iacute;a');
INSERT INTO `categoria` VALUES ('4', 'Pi&ntildeatas');
INSERT INTO `categoria` VALUES ('5', 'Dulces');
INSERT INTO `categoria` VALUES ('6', 'Animadores');

-- ----------------------------
-- Table structure for compras
-- ----------------------------
DROP TABLE IF EXISTS `compras`;
CREATE TABLE `compras` (
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
  KEY `idusuario` (`idusuario`),
  CONSTRAINT `fk_compras_productos` FOREIGN KEY (`idproducto`) REFERENCES `productos` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `fk_compras_usuarios` FOREIGN KEY (`idusuario`) REFERENCES `usuarios` (`Id`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- ----------------------------
-- Records of compras
-- ----------------------------
INSERT INTO `compras` VALUES ('1', null, null, '1', 'Galaxy s4', 'galaxy.jpg', '9800', '2', '19600');
INSERT INTO `compras` VALUES ('2', null, null, '1', 'cebolla', 'cebolla.jpg', '10.5', '1', '10.5');
INSERT INTO `compras` VALUES ('3', null, null, '2', 'computadora hp', 'computadora.jpg', '7400.5', '1', '7400.5');
INSERT INTO `compras` VALUES ('4', null, null, '2', 'Elemnt Skateboard', 'element.jpg', '700', '5', '3500');
INSERT INTO `compras` VALUES ('5', null, null, '3', 'Jalapenos', 'jalapenos.jpg', '15', '2', '30');
INSERT INTO `compras` VALUES ('6', null, null, '4', 'Galaxy s4', 'galaxy.jpg', '9800', '1', '9800');
INSERT INTO `compras` VALUES ('7', null, null, '4', 'cebolla', 'cebolla.jpg', '10.5', '2', '21');
INSERT INTO `compras` VALUES ('8', null, null, '5', 'Galaxy s4', 'galaxy.jpg', '9800', '1', '9800');
INSERT INTO `compras` VALUES ('9', null, null, '6', 'cebolla', 'cebolla.jpg', '10.5', '2', '21');
INSERT INTO `compras` VALUES ('10', null, null, '7', 'Bolsa de gomitas azucaradas', 'gomitas.jpg', '10.5', '1', '10.5');
INSERT INTO `compras` VALUES ('11', null, null, '8', 'Paquete dulces cute', 'cute.png', '5.99', '1', '5.99');
INSERT INTO `compras` VALUES ('12', null, null, '8', 'Globos 10 pulgadas x50', 'globos.jpg', '7.99', '1', '7.99');

-- ----------------------------
-- Table structure for productos
-- ----------------------------
DROP TABLE IF EXISTS `productos`;
CREATE TABLE `productos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idcategoria` int(11) DEFAULT NULL,
  `nombre` text COLLATE utf8mb4_spanish_ci NOT NULL,
  `descripcion` text COLLATE utf8mb4_spanish_ci NOT NULL,
  `imagen` text COLLATE utf8mb4_spanish_ci NOT NULL,
  `precio` double NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_producto_categoria` (`idcategoria`),
  CONSTRAINT `fk_producto_categoria` FOREIGN KEY (`idcategoria`) REFERENCES `categoria` (`idcategoria`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- ----------------------------
-- Records of productos
-- ----------------------------
INSERT INTO `productos` VALUES ('1', '5', 'Bolsa de gomitas azucaradas', 'Tan saborsas como coloridas<br>1 bolsa de 0.5 lbs de gomitas azucaradas para fiestas, aniversarios, reuniones, etc.', 'gomitas.jpg', '10.5');
INSERT INTO `productos` VALUES ('2', '5', 'Paquete dulces cute', 'Dulces cute, la mejor forma de expresar lo que sientes es con dulces<br>Paquete 1 lb de dulces cute <br>Sabores: <ul><li>Fresa</li><li>Uva</li><li>Melocot&oacute;n</li><li>Manzana</li></ul>', 'cute.png', '5.99');
INSERT INTO `productos` VALUES ('3', '2', 'Globos 10 pulgadas x50', 'Paquete de globos de 10 pulgadas para celebraciones y cumplea&ntilde;os.<br>El paquete contiene 50 unidades', 'globos.jpg', '7.99');
INSERT INTO `productos` VALUES ('4', '3', 'Utensilios de mesa blancos', 'Utensilios de mesa de plastico color blanco', 'curbeteria.jpg', '3.99');
INSERT INTO `productos` VALUES ('5', '1', 'Orden de cupcakes', 'Orden de cupcakes de chocolate con toping de caramelo, listos para servir <br> Para fiestas, celebraciones, aniversarios, bodas o por degustaci&oacute;n propia', 'cupcake.jpg', '9.99');
INSERT INTO `productos` VALUES ('6', '4', 'Pi&ntilde;ata de minion', 'Pi&ntilde;ata de minion para celebraciones de fiestas de cumplea&ntilde;os o aniversarios<br>Dimensiones: 0.5 m alto', 'pinata-minion.jpg', '9.99');
INSERT INTO `productos` VALUES ('7', '6', 'Animador Titiritero Don\'t Hug Me I\'m Scared', 'Titiritero con su serie de marionetas Don\'t Hug Me I\'m Scared <br> Ofrece varios actos con los titeres: <br> - Yellow Guy <br> - Red Guy y <br> - Green Guy ', 'hugme.jpg', '49.99');

-- ----------------------------
-- Table structure for usuarios
-- ----------------------------
DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE `usuarios` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(100) NOT NULL,
  `Apellido` varchar(100) NOT NULL,
  `Usuario` varchar(100) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `Imagen` varchar(50) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of usuarios
-- ----------------------------
INSERT INTO `usuarios` VALUES ('1', 'Moises', 'Montano', 'Moises', '123', 'imagen.jpg');
