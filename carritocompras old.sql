/*
Navicat MySQL Data Transfer

Source Server         : mysql
Source Server Version : 50621
Source Host           : localhost:3306
Source Database       : carritocompras

Target Server Type    : MYSQL
Target Server Version : 50621
File Encoding         : 65001

Date: 2015-10-13 04:43:44
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for compras
-- ----------------------------
DROP TABLE IF EXISTS `compras`;
CREATE TABLE `compras` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `numeroventa` int(11) NOT NULL,
  `nombre` text COLLATE utf8mb4_spanish_ci NOT NULL,
  `imagen` text COLLATE utf8mb4_spanish_ci NOT NULL,
  `precio` text COLLATE utf8mb4_spanish_ci NOT NULL,
  `cantidad` text COLLATE utf8mb4_spanish_ci NOT NULL,
  `subtotal` text COLLATE utf8mb4_spanish_ci NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- ----------------------------
-- Records of compras
-- ----------------------------
INSERT INTO `compras` VALUES ('1', '1', 'Galaxy s4', 'galaxy.jpg', '9800', '2', '19600');
INSERT INTO `compras` VALUES ('2', '1', 'cebolla', 'cebolla.jpg', '10.5', '1', '10.5');
INSERT INTO `compras` VALUES ('3', '2', 'computadora hp', 'computadora.jpg', '7400.5', '1', '7400.5');
INSERT INTO `compras` VALUES ('4', '2', 'Elemnt Skateboard', 'element.jpg', '700', '5', '3500');
INSERT INTO `compras` VALUES ('5', '3', 'Jalapenos', 'jalapenos.jpg', '15', '2', '30');
INSERT INTO `compras` VALUES ('6', '4', 'Galaxy s4', 'galaxy.jpg', '9800', '1', '9800');
INSERT INTO `compras` VALUES ('7', '4', 'cebolla', 'cebolla.jpg', '10.5', '2', '21');
INSERT INTO `compras` VALUES ('8', '5', 'Galaxy s4', 'galaxy.jpg', '9800', '1', '9800');
INSERT INTO `compras` VALUES ('9', '6', 'cebolla', 'cebolla.jpg', '10.5', '2', '21');

-- ----------------------------
-- Table structure for productos
-- ----------------------------
DROP TABLE IF EXISTS `productos`;
CREATE TABLE `productos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` text COLLATE utf8mb4_spanish_ci NOT NULL,
  `descripcion` text COLLATE utf8mb4_spanish_ci NOT NULL,
  `imagen` text COLLATE utf8mb4_spanish_ci NOT NULL,
  `precio` double NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- ----------------------------
-- Records of productos
-- ----------------------------
INSERT INTO `productos` VALUES ('1', 'Bolsa de gomitas azucaradas', 'Tan saborsas como coloridas<br>1 bolsa de 0.5 lbs de gomitas azucaradas para fiestas, aniversarios, reuniones, etc.', 'gomitas.jpg', '10.5');
INSERT INTO `productos` VALUES ('2', 'Paquete dulces cute', 'Dulces cute, la mejor forma de expresar lo que sientes es con dulces<br>Paquete 1 lb de dulces cute <br>Sabores: <ul><lo>Fresa</lo><lo>Uva</lo><lo>Melocotón</lo><lo>Manzana</lo></ul>', 'cute.png', '5.99');
INSERT INTO `productos` VALUES ('3', 'Globos 10 pulgadas x50', 'Paquete de globos de 10 pulgadas para celebraciones y cumpleaños.<br>El paquete contiene 50 unidades', 'globos.jpg', '7.99');
INSERT INTO `productos` VALUES ('4', 'Utensilios de mesa blancos', 'Utensilios de mesa de plastico color blanco', 'curbeteria.jpg', '3.99');
INSERT INTO `productos` VALUES ('5', 'Orden de cupcakes', 'Orden de cupcakes de chocolate con toping de caramelo, listos para servir <br> Para fiestas, celebraciones, aniversarios, bodas o por degustación propia', 'cupcake.jpg', '9.99');

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
