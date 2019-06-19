-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         10.1.40-MariaDB - mariadb.org binary distribution
-- SO del servidor:              Win64
-- HeidiSQL Versión:             10.1.0.5464
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Volcando estructura de base de datos para tfg
CREATE DATABASE IF NOT EXISTS `tfg` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `tfg`;

-- Volcando estructura para tabla tfg.asignatura
CREATE TABLE IF NOT EXISTS `asignatura` (
  `id_asignatura` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) COLLATE latin1_spanish_ci NOT NULL,
  `curso` int(11) NOT NULL,
  `cuatrimestre` int(11) NOT NULL,
  PRIMARY KEY (`id_asignatura`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

-- La exportación de datos fue deseleccionada.
-- Volcando estructura para tabla tfg.flashcard
CREATE TABLE IF NOT EXISTS `flashcard` (
  `id_fc` int(11) NOT NULL AUTO_INCREMENT,
  `id_tema` int(11) DEFAULT NULL,
  `pregunta` varchar(100) COLLATE latin1_spanish_ci DEFAULT NULL,
  `r1` varchar(200) COLLATE latin1_spanish_ci DEFAULT NULL,
  `r2` varchar(200) COLLATE latin1_spanish_ci DEFAULT NULL,
  `r3` varchar(200) COLLATE latin1_spanish_ci DEFAULT NULL,
  `r4` varchar(200) COLLATE latin1_spanish_ci DEFAULT NULL,
  `cuerpo` varchar(500) COLLATE latin1_spanish_ci DEFAULT NULL,
  `val` int(1) NOT NULL,
  PRIMARY KEY (`id_fc`),
  KEY `FK_flashcard_temas` (`id_tema`),
  CONSTRAINT `FK_flashcard_temas` FOREIGN KEY (`id_tema`) REFERENCES `temas` (`id_tema`)
) ENGINE=InnoDB AUTO_INCREMENT=95 DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

-- La exportación de datos fue deseleccionada.
-- Volcando estructura para tabla tfg.log
CREATE TABLE IF NOT EXISTS `log` (
  `id_log` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) NOT NULL,
  `consulta` varchar(500) NOT NULL,
  `fecha` datetime NOT NULL,
  PRIMARY KEY (`id_log`),
  KEY `FK_log_usuarios` (`id_usuario`),
  CONSTRAINT `FK_log_usuarios` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- La exportación de datos fue deseleccionada.
-- Volcando estructura para tabla tfg.porcentajes
CREATE TABLE IF NOT EXISTS `porcentajes` (
  `id_porcentaje` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) DEFAULT NULL,
  `id_tema` int(11) DEFAULT NULL,
  `porcentaje` int(3) DEFAULT NULL,
  `fecha` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_porcentaje`),
  KEY `FK_porcentajes_usuarios` (`id_usuario`),
  KEY `FK_porcentajes_temas` (`id_tema`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=latin1;

-- La exportación de datos fue deseleccionada.
-- Volcando estructura para tabla tfg.recurso
CREATE TABLE IF NOT EXISTS `recurso` (
  `id_recurso` int(11) NOT NULL AUTO_INCREMENT,
  `id_tema` int(11) NOT NULL,
  `enlace` varchar(200) COLLATE latin1_spanish_ci NOT NULL,
  `titulo` varchar(200) COLLATE latin1_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`id_recurso`),
  KEY `FK_recurso_visual_temas` (`id_tema`),
  CONSTRAINT `FK_recurso_visual_temas` FOREIGN KEY (`id_tema`) REFERENCES `temas` (`id_tema`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

-- La exportación de datos fue deseleccionada.
-- Volcando estructura para tabla tfg.temas
CREATE TABLE IF NOT EXISTS `temas` (
  `id_tema` int(11) NOT NULL AUTO_INCREMENT,
  `id_asignatura` int(11) NOT NULL DEFAULT '0',
  `titulo` varchar(50) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_tema`),
  KEY `FK_temas_asignatura` (`id_asignatura`),
  CONSTRAINT `FK_temas_asignatura` FOREIGN KEY (`id_asignatura`) REFERENCES `asignatura` (`id_asignatura`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- La exportación de datos fue deseleccionada.
-- Volcando estructura para tabla tfg.usuarioasignatura
CREATE TABLE IF NOT EXISTS `usuarioasignatura` (
  `id_usuario` int(11) NOT NULL,
  `id_asignatura` int(11) NOT NULL,
  PRIMARY KEY (`id_usuario`,`id_asignatura`),
  KEY `FK_usuarios-asignatura_asignatura` (`id_asignatura`),
  CONSTRAINT `FK_usuarios-asignatura_asignatura` FOREIGN KEY (`id_asignatura`) REFERENCES `asignatura` (`id_asignatura`),
  CONSTRAINT `FK_usuarios-asignatura_usuarios` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- La exportación de datos fue deseleccionada.
-- Volcando estructura para tabla tfg.usuarioflashcard
CREATE TABLE IF NOT EXISTS `usuarioflashcard` (
  `id_us_fc` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) NOT NULL,
  `id_fc` int(11) NOT NULL,
  `respuesta` int(1) NOT NULL,
  `score` int(2) NOT NULL,
  `fecha` datetime DEFAULT NULL,
  PRIMARY KEY (`id_us_fc`),
  KEY `FK_usuarioflashcard_usuarios` (`id_usuario`),
  KEY `FK_usuarioflashcard_flashcard` (`id_fc`),
  CONSTRAINT `FK_usuarioflashcard_flashcard` FOREIGN KEY (`id_fc`) REFERENCES `flashcard` (`id_fc`),
  CONSTRAINT `FK_usuarioflashcard_usuarios` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=140 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- La exportación de datos fue deseleccionada.
-- Volcando estructura para tabla tfg.usuariorecurso
CREATE TABLE IF NOT EXISTS `usuariorecurso` (
  `id_usuario` int(11) NOT NULL,
  `id_recurso` int(11) NOT NULL,
  PRIMARY KEY (`id_usuario`,`id_recurso`),
  KEY `FK_usuarios-asignatura_asignatura` (`id_recurso`),
  CONSTRAINT `usuariorecurso_ibfk_1` FOREIGN KEY (`id_recurso`) REFERENCES `recurso` (`id_recurso`),
  CONSTRAINT `usuariorecurso_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- La exportación de datos fue deseleccionada.
-- Volcando estructura para tabla tfg.usuarios
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(25) COLLATE latin1_spanish_ci NOT NULL,
  `apellidos` varchar(50) COLLATE latin1_spanish_ci DEFAULT NULL,
  `email` varchar(50) COLLATE latin1_spanish_ci NOT NULL,
  `password` varchar(50) COLLATE latin1_spanish_ci NOT NULL,
  `activa` int(10) unsigned NOT NULL DEFAULT '0',
  `rol` int(1) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

INSERT INTO `usuarios` (`id_usuario`, `nombre`, `apellidos`, `email`, `password`, `rol`) VALUES
	(1, 'Administrador', NULL, 'admin@ujaen.es', 'admin', 3);
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;

-- La exportación de datos fue deseleccionada.
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
