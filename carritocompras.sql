/*
Navicat MySQL Data Transfer

Source Server         : mysql
Source Server Version : 50621
Source Host           : localhost:3306
Source Database       : carritocompras

Target Server Type    : MYSQL
Target Server Version : 50621
File Encoding         : 65001

Date: 2015-10-30 02:12:57
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
  `nombre_EN` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idcategoria`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of categoria
-- ----------------------------
INSERT INTO `categoria` VALUES ('1', 'Reposter&iacute;a', 'Pastry');
INSERT INTO `categoria` VALUES ('2', 'Decoraci&oacute;n', 'Decoration');
INSERT INTO `categoria` VALUES ('3', 'Cuberter&iacute;a', 'Cutlery');
INSERT INTO `categoria` VALUES ('4', 'Pi&ntildeatas', 'Pi&ntildeatas');
INSERT INTO `categoria` VALUES ('5', 'Dulces', 'Candy');
INSERT INTO `categoria` VALUES ('6', 'Animadores', 'Party Animators');

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
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- ----------------------------
-- Records of compras
-- ----------------------------
INSERT INTO `compras` VALUES ('10', null, null, '7', 'Bolsa de gomitas azucaradas', 'gomitas.jpg', '10.5', '1', '10.5');
INSERT INTO `compras` VALUES ('11', null, null, '8', 'Paquete dulces cute', 'cute.png', '5.99', '1', '5.99');
INSERT INTO `compras` VALUES ('12', null, null, '8', 'Globos 10 pulgadas x50', 'globos.jpg', '7.99', '1', '7.99');
INSERT INTO `compras` VALUES ('14', null, null, '9', 'Globos 10 pulgadas x50', 'globos.jpg', '7.99', '1', '7.99');
INSERT INTO `compras` VALUES ('15', null, null, '10', 'Globos 10 pulgadas x50', 'globos.jpg', '7.99', '1', '7.99');
INSERT INTO `compras` VALUES ('16', null, null, '10', 'Utensilios de mesa blancos', 'curbeteria.jpg', '3.99', '1', '3.99');
INSERT INTO `compras` VALUES ('17', null, null, '11', 'Pi&ntilde;ata de minion', 'pinata-minion.jpg', '9.99', '1', '9.99');
INSERT INTO `compras` VALUES ('18', null, null, '12', 'Pi&ntilde;ata de minion', 'pinata-minion.jpg', '9.99', '1', '9.99');
INSERT INTO `compras` VALUES ('19', null, null, '13', 'Guirnaldas Cumplea&ntilde;eras', 'guirnalda.jpg', '4.99', '1', '4.99');
INSERT INTO `compras` VALUES ('20', '6', '2', '14', 'Pi&ntilde;ata de minion', 'pinata-minion.jpg', '9.99', '1', '9.99');
INSERT INTO `compras` VALUES ('21', '8', '2', '14', 'Guirnaldas Cumplea&ntilde;eras', 'guirnalda.jpg', '4.99', '1', '4.99');
INSERT INTO `compras` VALUES ('22', '1', '2', '14', 'Bolsa de gomitas azucaradas', 'gomitas.jpg', '10.5', '1', '10.5');
INSERT INTO `compras` VALUES ('23', '5', '2', '15', 'Orden de cupcakes', 'cupcake.jpg', '9.99', '1', '9.99');

-- ----------------------------
-- Table structure for productos
-- ----------------------------
DROP TABLE IF EXISTS `productos`;
CREATE TABLE `productos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idcategoria` int(11) DEFAULT NULL,
  `nombre` text COLLATE utf8mb4_spanish_ci NOT NULL,
  `nombre_EN` varchar(255) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `descripcion` text COLLATE utf8mb4_spanish_ci NOT NULL,
  `descripcion_EN` varchar(255) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `imagen` text COLLATE utf8mb4_spanish_ci NOT NULL,
  `precio` double NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_producto_categoria` (`idcategoria`),
  CONSTRAINT `fk_producto_categoria` FOREIGN KEY (`idcategoria`) REFERENCES `categoria` (`idcategoria`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- ----------------------------
-- Records of productos
-- ----------------------------
INSERT INTO `productos` VALUES ('1', '5', 'Bolsa de gomitas azucaradas', 'Sugary Jelly Beans', 'Tan saborsas como coloridas<br>1 bolsa de 0.5 lbs de gomitas azucaradas para fiestas, aniversarios, reuniones, etc.', 'As yummy as colorful <br> 1 bag of 0.5 lbs of jelly beans for parties, anniversaries, reunions, etc.', 'gomitas.jpg', '10.5');
INSERT INTO `productos` VALUES ('2', '5', 'Paquete dulces cute', 'Cute Candies Package', 'Dulces cute, la mejor forma de expresar lo que sientes es con dulces<br>Paquete 1 lb de dulces cute <br>Sabores: <ul><li>Fresa</li><li>Uva</li><li>Melocot&oacute;n</li><li>Manzana</li></ul>', 'Cute candies, the best way of express your feelings is with candies <br> 1 lb Package of Cute candies <br> Flavours: <ul><li>Strawberry</li><li>Grape</li><li>Watermelon</li><li>Apple</li></ul>', 'cute.png', '5.99');
INSERT INTO `productos` VALUES ('3', '2', 'Globos 10 pulgadas x50', 'Ballons 10 inch x50', 'Paquete de globos de 10 pulgadas inflados para celebraciones y cumplea&ntilde;os.<br>El paquete contiene 50 unidades', 'Balloons Package of 10 inch when inflated for any kind of celebrations and birthdays. <br> The package contains 50 units', 'globos.jpg', '7.99');
INSERT INTO `productos` VALUES ('4', '3', 'Utensilios de mesa blancos', 'White Tablewares', 'Utensilios de mesa de plastico color blanco', 'Tablewares color: white', 'curbeteria.jpg', '3.99');
INSERT INTO `productos` VALUES ('5', '1', 'Orden de cupcakes', 'Cupckakes Order', 'Orden de cupcakes de chocolate con toping de caramelo, listos para servir <br> Para fiestas, celebraciones, aniversarios, bodas o por degustaci&oacute;n propia', 'Cupcakes Order of chocolate with caramel topping, ready to serve.<br> For parties, celebrations, anniversaries, weddings o just for tasting', 'cupcake.jpg', '9.99');
INSERT INTO `productos` VALUES ('6', '4', 'Pi&ntilde;ata de minion', 'Minion Piñata', 'Pi&ntilde;ata de minion para celebraciones de fiestas de cumplea&ntilde;os o aniversarios<br>Dimensiones: 0.5 m alto', 'Minion pi&ntilde;ata for celebration parties, bithday parties o arnniversaries. <br> Dimensions: 0.5 m high', 'pinata-minion.jpg', '9.99');
INSERT INTO `productos` VALUES ('7', '6', 'Animador Titiritero Don\'t Hug Me I\'m Scared', 'Animator Don\'t Hug Me I\'m Scared Puppeter', 'Titiritero con su serie de marionetas Don\'t Hug Me I\'m Scared <br> Ofrece varios actos con los titeres: <br> - Yellow Guy <br> - Red Guy y <br> - Green Guy ', 'Puppeter with the puppets of the series Don\'t Hug Me I\'m Scared <br> Offers varios performances whith the following puppets: <br>  - Yellow Guy <br> - Red Guy y <br> - Green Guy ', 'hugme.jpg', '49.99');
INSERT INTO `productos` VALUES ('8', '2', 'Guirnaldas Cumplea&ntilde;eras', 'Birthday Garlands', 'Guirnaldas para decoraci&oacute;n en fiestas de cumplea&ntilde;os, paquete surtido con distintas formas y colores', 'Garlands for birthdays celebration, this package containts various colours and shapes of garlands', 'guirnalda.jpg', '4.99');

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of usuarios
-- ----------------------------
INSERT INTO `usuarios` VALUES ('1', 'Moises', 'Montano', 'Moises', '123', 'imagen.jpg');
INSERT INTO `usuarios` VALUES ('2', 'Luis', 'Jovel', 'luis_jovel', '123456', '');
