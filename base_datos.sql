-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         10.1.37-MariaDB - mariadb.org binary distribution
-- SO del servidor:              Win32
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

-- Volcando datos para la tabla tfg.asignatura: ~0 rows (aproximadamente)
DELETE FROM `asignatura`;
/*!40000 ALTER TABLE `asignatura` DISABLE KEYS */;
INSERT INTO `asignatura` (`id_asignatura`, `nombre`, `curso`, `cuatrimestre`) VALUES
	(1, 'Redes', 2, 2),
	(2, 'Prueba', 1, 1);
/*!40000 ALTER TABLE `asignatura` ENABLE KEYS */;

-- Volcando estructura para tabla tfg.flashcard
CREATE TABLE IF NOT EXISTS `flashcard` (
  `id_fc` int(11) NOT NULL AUTO_INCREMENT,
  `id_tema` int(11) DEFAULT NULL,
  `pregunta` varchar(50) COLLATE latin1_spanish_ci DEFAULT NULL,
  `r1` varchar(50) COLLATE latin1_spanish_ci DEFAULT NULL,
  `r2` varchar(50) COLLATE latin1_spanish_ci DEFAULT NULL,
  `r3` varchar(50) COLLATE latin1_spanish_ci DEFAULT NULL,
  `r4` varchar(50) COLLATE latin1_spanish_ci DEFAULT NULL,
  `cuerpo` varchar(500) COLLATE latin1_spanish_ci DEFAULT NULL,
  `val` int(1) NOT NULL,
  PRIMARY KEY (`id_fc`),
  KEY `FK_flashcard_temas` (`id_tema`),
  CONSTRAINT `FK_flashcard_temas` FOREIGN KEY (`id_tema`) REFERENCES `temas` (`id_tema`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

-- Volcando datos para la tabla tfg.flashcard: ~4 rows (aproximadamente)
DELETE FROM `flashcard`;
/*!40000 ALTER TABLE `flashcard` DISABLE KEYS */;
INSERT INTO `flashcard` (`id_fc`, `id_tema`, `pregunta`, `r1`, `r2`, `r3`, `r4`, `cuerpo`, `val`) VALUES
	(2, 1, 'Titul         ', 'esta es', 'd2', 'f3', 'r4', 'wsdafafqfeqwffqwefqfqefq', 3),
	(3, 1, 'titulo2', '4444', NULL, NULL, NULL, 'CUERPASO\r\n', 2),
	(4, 1, 'Titulo1111111111', '44444', NULL, NULL, NULL, '1111111111111111', 1),
	(5, 1, 'Titulo FINAL', 'RESPUESTA 1 ', 'RESPUESTA 2', 'RESPUESTA 3', 'RESPUESTA 4', 'QUE RESPUESTA ES LA WENA?', 3),
	(6, 1, 'pregunta', 'resp1', 'respr1', 'reps4', 'fafao34', 'Cuerpazo', 1),
	(7, 1, 'wefq', 'wefqwf', 'qwerfqwef', 'qwefqwef', 'qwerfq', 'qwer', 2);
/*!40000 ALTER TABLE `flashcard` ENABLE KEYS */;

-- Volcando estructura para tabla tfg.log
CREATE TABLE IF NOT EXISTS `log` (
  `id_log` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) NOT NULL,
  `consulta` varchar(500) NOT NULL,
  `fecha` datetime NOT NULL,
  PRIMARY KEY (`id_log`),
  KEY `FK_log_usuarios` (`id_usuario`),
  CONSTRAINT `FK_log_usuarios` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla tfg.log: ~3 rows (aproximadamente)
DELETE FROM `log`;
/*!40000 ALTER TABLE `log` DISABLE KEYS */;
INSERT INTO `log` (`id_log`, `id_usuario`, `consulta`, `fecha`) VALUES
	(1, 2, 'INSERT INTO recurso(id_tema,enlace) VALUES(:id_tema, :enlace) ', '0000-00-00 00:00:00'),
	(2, 2, 'INSERT INTO recurso(id_tema,enlace) VALUES(:id_tema, :enlace) ', '0000-00-00 00:00:00'),
	(3, 2, 'INSERT INTO recurso(id_tema,enlace) VALUES(:id_tema, :enlace) ', '2019-03-14 00:18:26');
/*!40000 ALTER TABLE `log` ENABLE KEYS */;

-- Volcando estructura para tabla tfg.permisos
CREATE TABLE IF NOT EXISTS `permisos` (
  `id_permiso` int(11) NOT NULL AUTO_INCREMENT,
  `funcionalidad` varchar(50) NOT NULL DEFAULT '0',
  `roles` varchar(50) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_permiso`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla tfg.permisos: ~2 rows (aproximadamente)
DELETE FROM `permisos`;
/*!40000 ALTER TABLE `permisos` DISABLE KEYS */;
INSERT INTO `permisos` (`id_permiso`, `funcionalidad`, `roles`) VALUES
	(1, 'nueva_flashcard', '[2,3]'),
	(2, 'nuevo_recurso', '[2,3]');
/*!40000 ALTER TABLE `permisos` ENABLE KEYS */;

-- Volcando estructura para tabla tfg.recurso
CREATE TABLE IF NOT EXISTS `recurso` (
  `id_recurso` int(11) NOT NULL AUTO_INCREMENT,
  `id_tema` int(11) NOT NULL,
  `enlace` varchar(200) COLLATE latin1_spanish_ci NOT NULL,
  PRIMARY KEY (`id_recurso`),
  KEY `FK_recurso_visual_temas` (`id_tema`),
  CONSTRAINT `FK_recurso_visual_temas` FOREIGN KEY (`id_tema`) REFERENCES `temas` (`id_tema`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

-- Volcando datos para la tabla tfg.recurso: ~8 rows (aproximadamente)
DELETE FROM `recurso`;
/*!40000 ALTER TABLE `recurso` DISABLE KEYS */;
INSERT INTO `recurso` (`id_recurso`, `id_tema`, `enlace`) VALUES
	(1, 1, 'https://www.youtube.com/embed/fNn7icMJjU0'),
	(3, 1, 'https://www.youtube.com/embed/cHMwzsmioi4'),
	(7, 2, 'https://www.youtube.com/embed/fNn7icMJjU0'),
	(8, 1, 'enlace de prueba del log'),
	(9, 1, 'fasdfaweqfqqwef'),
	(10, 1, 'fasdfaweqfqqwef222'),
	(11, 1, 'fasdfaweqfqqwef222212'),
	(12, 1, 'fasdfaweqfqqwef2222122212');
/*!40000 ALTER TABLE `recurso` ENABLE KEYS */;

-- Volcando estructura para tabla tfg.temas
CREATE TABLE IF NOT EXISTS `temas` (
  `id_tema` int(11) NOT NULL AUTO_INCREMENT,
  `id_asignatura` int(11) NOT NULL DEFAULT '0',
  `titulo` varchar(50) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_tema`),
  KEY `FK_temas_asignatura` (`id_asignatura`),
  CONSTRAINT `FK_temas_asignatura` FOREIGN KEY (`id_asignatura`) REFERENCES `asignatura` (`id_asignatura`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla tfg.temas: ~3 rows (aproximadamente)
DELETE FROM `temas`;
/*!40000 ALTER TABLE `temas` DISABLE KEYS */;
INSERT INTO `temas` (`id_tema`, `id_asignatura`, `titulo`) VALUES
	(1, 1, 'Tema 1: Introduccion'),
	(2, 1, 'Tema 2: Pruebas'),
	(5, 2, 'Tema de Prueba');
/*!40000 ALTER TABLE `temas` ENABLE KEYS */;

-- Volcando estructura para tabla tfg.usuarioasignatura
CREATE TABLE IF NOT EXISTS `usuarioasignatura` (
  `id_usuario` int(11) NOT NULL,
  `id_asignatura` int(11) NOT NULL,
  PRIMARY KEY (`id_usuario`,`id_asignatura`),
  KEY `FK_usuarios-asignatura_asignatura` (`id_asignatura`),
  CONSTRAINT `FK_usuarios-asignatura_asignatura` FOREIGN KEY (`id_asignatura`) REFERENCES `asignatura` (`id_asignatura`),
  CONSTRAINT `FK_usuarios-asignatura_usuarios` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla tfg.usuarioasignatura: ~6 rows (aproximadamente)
DELETE FROM `usuarioasignatura`;
/*!40000 ALTER TABLE `usuarioasignatura` DISABLE KEYS */;
INSERT INTO `usuarioasignatura` (`id_usuario`, `id_asignatura`) VALUES
	(1, 2),
	(2, 1),
	(2, 2),
	(4, 1),
	(4, 2),
	(5, 1);
/*!40000 ALTER TABLE `usuarioasignatura` ENABLE KEYS */;

-- Volcando estructura para tabla tfg.usuarioflashcard
CREATE TABLE IF NOT EXISTS `usuarioflashcard` (
  `id_usuario` int(11) NOT NULL,
  `id_fc` int(11) NOT NULL,
  `respuesta` int(1) NOT NULL,
  `acierto` int(1) NOT NULL,
  `fecha` datetime DEFAULT NULL,
  PRIMARY KEY (`id_usuario`,`id_fc`),
  KEY `FK_usuarios-asignatura_asignatura` (`id_fc`),
  CONSTRAINT `usuarioflashcard_ibfk_1` FOREIGN KEY (`id_fc`) REFERENCES `flashcard` (`id_fc`),
  CONSTRAINT `usuarioflashcard_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- Volcando datos para la tabla tfg.usuarioflashcard: ~0 rows (aproximadamente)
DELETE FROM `usuarioflashcard`;
/*!40000 ALTER TABLE `usuarioflashcard` DISABLE KEYS */;
/*!40000 ALTER TABLE `usuarioflashcard` ENABLE KEYS */;

-- Volcando estructura para tabla tfg.usuariorecurso
CREATE TABLE IF NOT EXISTS `usuariorecurso` (
  `id_usuario` int(11) NOT NULL,
  `id_recurso` int(11) NOT NULL,
  PRIMARY KEY (`id_usuario`,`id_recurso`),
  KEY `FK_usuarios-asignatura_asignatura` (`id_recurso`),
  CONSTRAINT `usuariorecurso_ibfk_1` FOREIGN KEY (`id_recurso`) REFERENCES `recurso` (`id_recurso`),
  CONSTRAINT `usuariorecurso_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- Volcando datos para la tabla tfg.usuariorecurso: ~0 rows (aproximadamente)
DELETE FROM `usuariorecurso`;
/*!40000 ALTER TABLE `usuariorecurso` DISABLE KEYS */;
/*!40000 ALTER TABLE `usuariorecurso` ENABLE KEYS */;

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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

-- Volcando datos para la tabla tfg.usuarios: ~5 rows (aproximadamente)
DELETE FROM `usuarios`;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` (`id_usuario`, `nombre`, `apellidos`, `email`, `password`, `activa`, `rol`) VALUES
	(1, 'Administrador', NULL, 'admin@ujaen.es', 'admin', 0, 3),
	(2, 'Profesor', NULL, 'profesor@ujaen.es', 'profesor', 0, 2),
	(3, 'Estudiante NO activo', '               ', 'estudiante@ujaen.es', 'estudiante', 0, 0),
	(4, 'Estudiante SI activo', '    ', 'estudiante1@ujaen.es', 'estudiante', 0, 1),
	(5, 'Prueba¡', 'de prueba      ', 'prueba@ujaen.es', '123', 0, 1);
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
