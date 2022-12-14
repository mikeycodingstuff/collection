# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.7.38)
# Database: album-collection
# Generation Time: 2022-08-03 13:59:23 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table albums
# ------------------------------------------------------------

DROP TABLE IF EXISTS `albums`;

CREATE TABLE `albums` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(1000) NOT NULL DEFAULT '',
  `artist` varchar(1000) NOT NULL DEFAULT '',
  `tracks` int(100) NOT NULL,
  `length` varchar(15) NOT NULL DEFAULT '',
  `deleted` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `albums` WRITE;
/*!40000 ALTER TABLE `albums` DISABLE KEYS */;

INSERT INTO `albums` (`id`, `name`, `artist`, `tracks`, `length`, `deleted`)
VALUES
	(1,'American Football','American Football',9,'40:52',0),
	(2,'Good Kid, M.A.A.D City','Kendrick Lamar',12,'68:23',0),
	(3,'Madvillainy','Madvillain',22,'46:08',0),
	(4,'Ys','Joanna Newsom',5,'55:38',0),
	(5,'The Money Store','Death Grips',13,'41:23',0),
	(6,'OK Computer','Radiohead',12,'53:21',0),
	(7,'Helplessness Blues','Fleet Foxes',12,'49:56',0),
	(8,'Floral Shoppe','Macintosh Plus',11,'47:47',0),
	(9,'Another One','Mac DeMarco',8,'23:46',0),
	(10,'Lift Your Skinny Fists Like Antennas to Heaven','Godspeed You! Black Emperor',4,'87:21',0);

/*!40000 ALTER TABLE `albums` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
