# Host: localhost  (Version 5.7.21)
# Date: 2019-02-24 16:26:48
# Generator: MySQL-Front 6.0  (Build 2.20)


#
# Structure for table "empleado_sueldo"
#

DROP TABLE IF EXISTS `empleado_sueldo`;
CREATE TABLE `empleado_sueldo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `empleado_id` int(11) NOT NULL,
  `sueldo` decimal(10,2) NOT NULL,
  `fecha` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `empleado_sueldo` (`empleado_id`),
  CONSTRAINT `empleado_sueldo` FOREIGN KEY (`empleado_id`) REFERENCES `empleado` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

#
# Data for table "empleado_sueldo"
#

INSERT INTO `empleado_sueldo` VALUES (1,1,500.00,'2016-10-29'),(2,3,300.00,'2016-10-29'),(3,1,500.00,'2015-10-29');

#
# Structure for table "profesion"
#

DROP TABLE IF EXISTS `profesion`;
CREATE TABLE `profesion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) COLLATE utf8_bin NOT NULL,
  `sueldo` decimal(10,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

#
# Data for table "profesion"
#

INSERT INTO `profesion` VALUES (1,'Publicista',5000.00),(2,'Ingeniero',5000.00),(4,'Médico',7000.00),(5,'Abogado',3500.00),(6,'Químico',8000.00),(7,'Mecánico',4500.00);

#
# Structure for table "empleado"
#

DROP TABLE IF EXISTS `empleado`;
CREATE TABLE `empleado` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) COLLATE utf8_bin NOT NULL,
  `apellido` varchar(100) COLLATE utf8_bin NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `profesion_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `empleado_profesion` (`profesion_id`),
  CONSTRAINT `empleado_profesion` FOREIGN KEY (`profesion_id`) REFERENCES `profesion` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

#
# Data for table "empleado"
#

INSERT INTO `empleado` VALUES (1,'Eduardo','Rodríguez Patilo','1989-02-11',2),(2,'Juan','Perez Lopez','1988-10-29',6),(3,'Luis','Villanueva Gomez','1980-10-29',4);
