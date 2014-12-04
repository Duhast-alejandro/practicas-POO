/*
SQLyog Ultimate v9.02 
MySQL - 5.6.16 : Database - 5to
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`5to` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `5to`;

/*Table structure for table `maestro_materia` */

DROP TABLE IF EXISTS `maestro_materia`;

CREATE TABLE `maestro_materia` (
  `id` int(22) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(22) DEFAULT NULL,
  `id_materia` int(22) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

/*Data for the table `maestro_materia` */

LOCK TABLES `maestro_materia` WRITE;

insert  into `maestro_materia`(`id`,`id_usuario`,`id_materia`) values (1,3,1),(2,4,3),(3,4,2),(7,4,4);

UNLOCK TABLES;

/*Table structure for table `materia` */

DROP TABLE IF EXISTS `materia`;

CREATE TABLE `materia` (
  `id_materia` int(33) NOT NULL,
  `materia` varchar(33) DEFAULT NULL,
  PRIMARY KEY (`id_materia`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `materia` */

LOCK TABLES `materia` WRITE;

insert  into `materia`(`id_materia`,`materia`) values (1,'Lectura'),(2,'Matematicas'),(3,'Programación'),(4,'Optativa');

UNLOCK TABLES;

/*Table structure for table `usuarios` */

DROP TABLE IF EXISTS `usuarios`;

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(55) DEFAULT NULL,
  `ap_pat` varchar(55) DEFAULT NULL,
  `ap_mat` varchar(55) DEFAULT NULL,
  `telefono` int(11) DEFAULT NULL,
  `calle` varchar(55) DEFAULT NULL,
  `exterior` int(11) DEFAULT NULL,
  `interior` int(11) DEFAULT NULL,
  `colonia` varchar(55) DEFAULT NULL,
  `municipio` varchar(55) DEFAULT NULL,
  `estado` varchar(55) DEFAULT NULL,
  `cp` int(11) DEFAULT NULL,
  `correo` varchar(55) DEFAULT NULL,
  `usuario` varchar(55) DEFAULT NULL,
  `pass` varchar(55) DEFAULT NULL,
  `nivel` varchar(55) DEFAULT NULL,
  `estatus` varchar(55) DEFAULT NULL,
  PRIMARY KEY (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `usuarios` */

LOCK TABLES `usuarios` WRITE;

insert  into `usuarios`(`id_usuario`,`nombre`,`ap_pat`,`ap_mat`,`telefono`,`calle`,`exterior`,`interior`,`colonia`,`municipio`,`estado`,`cp`,`correo`,`usuario`,`pass`,`nivel`,`estatus`) values (1,'Alejandro','Acosta','Ayala',67868687,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Administrador','1'),(2,'Valeria','Tellez','Morales',696897698,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Alumno','2'),(3,'Leticia','Martinez','Caballero',689767697,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Maestro','1'),(4,'Joel','Herrera','Hernandez',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Maestro','2');

UNLOCK TABLES;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
