# ************************************************************
# Sequel Pro SQL dump
# Versión 4096
#
# http://www.sequelpro.com/
# http://code.google.com/p/sequel-pro/
#
# Host: 127.0.0.1 (MySQL 5.6.24)
# Base de datos: consultorio
# Tiempo de Generación: 2015-07-21 06:22:39 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Volcado de tabla cargo
# ------------------------------------------------------------

DROP TABLE IF EXISTS `cargo`;

CREATE TABLE `cargo` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(50) NOT NULL DEFAULT '',
  `Permisos` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Volcado de tabla cita
# ------------------------------------------------------------

DROP TABLE IF EXISTS `cita`;

CREATE TABLE `cita` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `Paciente` int(11) unsigned NOT NULL,
  `Horario` char(1) NOT NULL DEFAULT '' COMMENT 'M - Mañana, T-Tarde, N-Noche',
  `Fecha` date NOT NULL,
  `Observacion` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Volcado de tabla consulta
# ------------------------------------------------------------

DROP TABLE IF EXISTS `consulta`;

CREATE TABLE `consulta` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `Paciente` int(11) unsigned NOT NULL,
  `Sintomas` text NOT NULL,
  `Diagnostico` text NOT NULL,
  `Tratamiento` text NOT NULL,
  `Receta` text NOT NULL,
  `Observacion` text,
  `Medico` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Volcado de tabla consultorio
# ------------------------------------------------------------

DROP TABLE IF EXISTS `consultorio`;

CREATE TABLE `consultorio` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(50) NOT NULL DEFAULT '',
  `Activo` char(2) NOT NULL DEFAULT 'SI' COMMENT 'SI - Activo, NO - Inactivo',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `consultorio` WRITE;
/*!40000 ALTER TABLE `consultorio` DISABLE KEYS */;

INSERT INTO `consultorio` (`id`, `Nombre`, `Activo`)
VALUES
	(1,'Consultorio Dentalesco','SI'),
	(5,'Un Consultorio Mas','NO'),
	(6,'Otro Consultorio Mas','SI');

/*!40000 ALTER TABLE `consultorio` ENABLE KEYS */;
UNLOCK TABLES;


# Volcado de tabla paciente
# ------------------------------------------------------------

DROP TABLE IF EXISTS `paciente`;

CREATE TABLE `paciente` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `Documento` varchar(8) NOT NULL DEFAULT '',
  `Telefono` varchar(9) NOT NULL DEFAULT '',
  `Nombre` varchar(50) NOT NULL DEFAULT '',
  `Edad` int(2) unsigned NOT NULL,
  `Sexo` char(1) NOT NULL DEFAULT '' COMMENT 'M - Masculino, F-Femenino',
  `Departamento` int(11) NOT NULL,
  `Municipio` int(11) NOT NULL,
  `Activo` char(2) NOT NULL DEFAULT 'SI' COMMENT 'SI - Activo, NO - Inactivo',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Volcado de tabla usuario
# ------------------------------------------------------------

DROP TABLE IF EXISTS `usuario`;

CREATE TABLE `usuario` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `Documento` varchar(8) NOT NULL DEFAULT '',
  `NombreCompleto` varchar(50) NOT NULL DEFAULT '',
  `Contrasena` varchar(64) NOT NULL DEFAULT '',
  `Consultorio` int(11) unsigned NOT NULL,
  `Cargo` int(11) unsigned NOT NULL,
  `Activo` char(2) NOT NULL DEFAULT 'SI' COMMENT 'SI - Activo, NO - Inactivo',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;




/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
