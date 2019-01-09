# ************************************************************
# Sequel Pro SQL dump
# Version 4135
#
# http://www.sequelpro.com/
# http://code.google.com/p/sequel-pro/
#
# Host: localhost (MySQL 5.5.42)
# Database: printerous
# Generation Time: 2019-01-08 17:43:34 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table organization
# ------------------------------------------------------------

DROP TABLE IF EXISTS `organization`;

CREATE TABLE `organization` (
  `id_org` int(11) NOT NULL AUTO_INCREMENT,
  `name_org` varchar(30) DEFAULT NULL,
  `phone_org` varchar(20) DEFAULT NULL,
  `email_org` varchar(50) DEFAULT NULL,
  `web_org` varchar(50) DEFAULT NULL,
  `logo_org` varchar(100) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_org`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `organization` WRITE;
/*!40000 ALTER TABLE `organization` DISABLE KEYS */;

INSERT INTO `organization` (`id_org`, `name_org`, `phone_org`, `email_org`, `web_org`, `logo_org`, `id_user`)
VALUES
	(1,'FWD Life','02147400088','friesca@ymail.com','FWD.com','20190108_FWD Life.jpg',1),
	(6,'Kementerian Perdagangan','021837','kemendag@gmail.com','kemendag.com','201901071604.png',3);

/*!40000 ALTER TABLE `organization` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table person
# ------------------------------------------------------------

DROP TABLE IF EXISTS `person`;

CREATE TABLE `person` (
  `id_p` int(11) NOT NULL AUTO_INCREMENT,
  `name_p` varchar(30) NOT NULL DEFAULT '',
  `email_p` varchar(50) NOT NULL DEFAULT '',
  `phone_p` varchar(20) NOT NULL DEFAULT '',
  `avatar_p` varchar(100) NOT NULL DEFAULT '',
  `id_org` int(11) NOT NULL,
  PRIMARY KEY (`id_p`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Dump of table user
# ------------------------------------------------------------

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL DEFAULT '',
  `password` varchar(70) NOT NULL DEFAULT '',
  `id_org` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;

INSERT INTO `user` (`id`, `username`, `password`, `id_org`)
VALUES
	(1,'A_FWD','da39a3ee5e6b4b0d3255bfef95601890afd80709',1),
	(2,'admin','da39a3ee5e6b4b0d3255bfef95601890afd80709',0);

/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
