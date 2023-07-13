-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         8.0.30 - MySQL Community Server - GPL
-- SO del servidor:              Win64
-- HeidiSQL Versión:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Volcando estructura de base de datos para cafeteria_konecta
CREATE DATABASE IF NOT EXISTS `cafeteria_konecta` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `cafeteria_konecta`;

-- Volcando estructura para tabla cafeteria_konecta.categorias
CREATE TABLE IF NOT EXISTS `categorias` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(100) NOT NULL DEFAULT '',
  `fecha_creacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fecha modificacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla cafeteria_konecta.categorias: ~3 rows (aproximadamente)
DELETE FROM `categorias`;
INSERT INTO `categorias` (`id`, `descripcion`, `fecha_creacion`, `fecha modificacion`) VALUES
	(1, 'DULCES', '2023-07-13 15:43:00', '2023-07-13 15:43:00'),
	(2, 'BEBIDAS', '2023-07-13 15:43:15', '2023-07-13 15:43:15'),
	(3, 'PANADERIA', '2023-07-13 15:43:27', '2023-07-13 15:43:27');

-- Volcando estructura para tabla cafeteria_konecta.productos
CREATE TABLE IF NOT EXISTS `productos` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT '',
  `referencia` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT '',
  `precio` int unsigned NOT NULL DEFAULT '0',
  `peso` int unsigned NOT NULL DEFAULT '0',
  `id_categoria` int unsigned NOT NULL DEFAULT '0',
  `stock` int unsigned NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `id_categoria` (`id_categoria`) USING BTREE,
  CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`id_categoria`) REFERENCES `categorias` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla cafeteria_konecta.productos: ~5 rows (aproximadamente)
DELETE FROM `productos`;
INSERT INTO `productos` (`id`, `nombre`, `referencia`, `precio`, `peso`, `id_categoria`, `stock`, `created_at`, `updated_at`) VALUES
	(1, 'Pan de  Bono', 'Pan', 100, 1, 3, 10, '2023-07-13 19:07:44', '2023-07-14 03:21:03'),
	(2, 'Dona', 'bbb', 50, 1, 1, 9, '2023-07-14 01:36:21', '2023-07-14 04:22:29'),
	(3, 'Cafe Latte', 'bbb', 30, 1, 2, 8, '2023-07-14 01:44:31', '2023-07-14 01:44:31'),
	(4, 'Cafe Capuchino', 'bbb', 30, 1, 2, 7, '2023-07-14 02:06:02', '2023-07-14 02:06:02'),
	(5, 'Galleta', 'bbb', 10, 1, 1, 6, '2023-07-14 02:07:17', '2023-07-14 02:07:17');

-- Volcando estructura para tabla cafeteria_konecta.ventas
CREATE TABLE IF NOT EXISTS `ventas` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `id_producto` int unsigned NOT NULL,
  `cantidad` int unsigned NOT NULL DEFAULT '0',
  `precio_unidad` int unsigned NOT NULL DEFAULT '0',
  `total` int unsigned NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `id_producto` (`id_producto`) USING BTREE,
  CONSTRAINT `ventas_ibfk_1` FOREIGN KEY (`id_producto`) REFERENCES `productos` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla cafeteria_konecta.ventas: ~3 rows (aproximadamente)
DELETE FROM `ventas`;
INSERT INTO `ventas` (`id`, `id_producto`, `cantidad`, `precio_unidad`, `total`, `created_at`, `updated_at`) VALUES
	(1, 2, 4, 50, 200, '2023-07-14 04:00:10', '2023-07-14 04:00:10'),
	(2, 5, 1, 30, 30, '2023-07-14 04:19:06', '2023-07-14 04:19:06'),
	(7, 5, 6, 30, 180, '2023-07-13 23:48:12', '2023-07-13 23:48:12');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
