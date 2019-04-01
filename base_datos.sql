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
) ENGINE=InnoDB AUTO_INCREMENT=60 DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

-- Volcando datos para la tabla tfg.flashcard: ~5 rows (aproximadamente)
DELETE FROM `flashcard`;
/*!40000 ALTER TABLE `flashcard` DISABLE KEYS */;
INSERT INTO `flashcard` (`id_fc`, `id_tema`, `pregunta`, `r1`, `r2`, `r3`, `r4`, `cuerpo`, `val`) VALUES
	(52, 1, ' Pregunta de pruebas', 'respuesta 1', 'respuesta 2', 'respuesta 3', 'respuesta 4', 'Cual es la respuesta correcta? es la 4 jeje', 4),
	(56, 1, '', '', '', '', '', '', 2),
	(57, 2, '', '', '', '', '', '', 1),
	(58, 2, '', '', '', '', '', '', 1),
	(59, 5, '', '', '', '', '', '', 1);
/*!40000 ALTER TABLE `flashcard` ENABLE KEYS */;

-- Volcando estructura para tabla tfg.history
CREATE TABLE IF NOT EXISTS `history` (
  `id_usuario` int(11) NOT NULL,
  `id_asignatura` int(11) NOT NULL,
  `bien` int(11) NOT NULL,
  `mal` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla tfg.history: ~9 rows (aproximadamente)
DELETE FROM `history`;
/*!40000 ALTER TABLE `history` DISABLE KEYS */;
INSERT INTO `history` (`id_usuario`, `id_asignatura`, `bien`, `mal`, `date`) VALUES
	(0, 558922, -2, 2, '2018-03-10 17:54:31'),
	(0, 5589741, -2, 4, '2018-03-10 17:58:40'),
	(0, 55897338, 1, 3, '2018-03-10 17:58:57'),
	(0, 558922, -2, 2, '2018-03-10 17:59:10'),
	(0, 558920, 1, 1, '2019-03-28 14:19:53'),
	(0, 5589741, -2, 4, '2019-03-28 14:23:48'),
	(0, 55897338, -1, 1, '2019-03-28 14:26:39'),
	(0, 558920, 1, 1, '2019-03-28 14:28:51'),
	(0, 5589741, -3, 5, '2019-03-28 15:44:23');
/*!40000 ALTER TABLE `history` ENABLE KEYS */;

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

-- Volcando datos para la tabla tfg.log: ~2 rows (aproximadamente)
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

-- Volcando datos para la tabla tfg.recurso: ~3 rows (aproximadamente)
DELETE FROM `recurso`;
/*!40000 ALTER TABLE `recurso` DISABLE KEYS */;
INSERT INTO `recurso` (`id_recurso`, `id_tema`, `enlace`) VALUES
	(1, 1, 'https://www.youtube.com/embed/fNn7icMJjU0'),
	(3, 1, 'https://www.youtube.com/embed/cHMwzsmioi4'),
	(7, 2, 'https://www.youtube.com/embed/fNn7icMJjU0');
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

-- Volcando datos para la tabla tfg.usuarioasignatura: ~5 rows (aproximadamente)
DELETE FROM `usuarioasignatura`;
/*!40000 ALTER TABLE `usuarioasignatura` DISABLE KEYS */;
INSERT INTO `usuarioasignatura` (`id_usuario`, `id_asignatura`) VALUES
	(1, 1),
	(2, 1),
	(2, 2),
	(4, 1),
	(4, 2);
/*!40000 ALTER TABLE `usuarioasignatura` ENABLE KEYS */;

-- Volcando estructura para tabla tfg.usuarioflashcard
CREATE TABLE IF NOT EXISTS `usuarioflashcard` (
  `id_usuario` int(11) NOT NULL,
  `id_fc` int(11) NOT NULL,
  `respuesta` int(1) NOT NULL,
  `fecha` datetime DEFAULT NULL,
  KEY `FK_usuarios-asignatura_asignatura` (`id_fc`)
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

-- Volcando datos para la tabla tfg.usuarios: ~3 rows (aproximadamente)
DELETE FROM `usuarios`;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` (`id_usuario`, `nombre`, `apellidos`, `email`, `password`, `activa`, `rol`) VALUES
	(1, 'Administrador', NULL, 'admin@ujaen.es', 'admin', 0, 3),
	(2, 'Profesor', '           ', 'profesor@ujaen.es', 'profesor', 0, 2),
	(4, 'Estudiante SI activo', '    ', 'estudiante@ujaen.es', 'estudiante', 0, 1);
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
