/*
SQLyog Community v13.1.9 (64 bit)
MySQL - 10.11.4-MariaDB : Database - db_monitoring_prod_ads
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`db_monitoring_prod_ads` /*!40100 DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci */;

USE `db_monitoring_prod_ads`;

/*Table structure for table `trx_prod_in` */

DROP TABLE IF EXISTS `trx_prod_in`;

CREATE TABLE `trx_prod_in` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `no_wo` varchar(255) DEFAULT NULL,
  `pcs` int(11) DEFAULT NULL,
  `kg` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `last_update` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

/*Data for the table `trx_prod_in` */

insert  into `trx_prod_in`(`id`,`no_wo`,`pcs`,`kg`,`date`,`last_update`) values 
(1,'wo-151023-0001',1000,10,'2023-10-15','2023-10-15 17:17:05'),
(2,'wo-151023-0001',100000,100,'2023-10-15','2023-10-15 18:23:40'),
(3,'wo-1717-0002',4000,4,'2023-10-15','2023-10-15 19:37:56');

/*Table structure for table `trx_prod_out` */

DROP TABLE IF EXISTS `trx_prod_out`;

CREATE TABLE `trx_prod_out` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `no_wo` varchar(255) DEFAULT NULL,
  `pcs` int(11) DEFAULT NULL,
  `kg` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `last_update` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

/*Data for the table `trx_prod_out` */

insert  into `trx_prod_out`(`id`,`no_wo`,`pcs`,`kg`,`date`,`last_update`) values 
(1,'wo-151023-0001',19000,100,'2023-10-15','2023-10-15 18:26:24'),
(2,'wo-1717-0002',4000,4,'2023-10-15','2023-10-15 19:40:36'),
(3,'wo-151023-0001',5000,5,'2023-10-15','2023-10-15 19:47:39');

/*Table structure for table `trx_prod_sisa` */

DROP TABLE IF EXISTS `trx_prod_sisa`;

CREATE TABLE `trx_prod_sisa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `no_wo` varchar(255) DEFAULT NULL,
  `pcs` int(11) DEFAULT NULL,
  `kg` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `last_update` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

/*Data for the table `trx_prod_sisa` */

insert  into `trx_prod_sisa`(`id`,`no_wo`,`pcs`,`kg`,`date`,`last_update`) values 
(1,'wo-151023-0001',5000,50,'2023-10-15','2023-10-15 18:27:13');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
