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

/*Table structure for table `mst_machine` */

DROP TABLE IF EXISTS `mst_machine`;

CREATE TABLE `mst_machine` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `type` enum('CUTTING','MACHINING') DEFAULT NULL,
  `update_by` int(11) DEFAULT NULL,
  `is_active` int(11) DEFAULT NULL,
  `last_update` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

/*Data for the table `mst_machine` */

insert  into `mst_machine`(`id`,`name`,`type`,`update_by`,`is_active`,`last_update`) values 
(1,'C1','CUTTING',1,1,'2023-10-29 19:04:24'),
(2,'C2','CUTTING',1,1,'2023-10-29 19:04:24'),
(3,'C3','CUTTING',1,1,'2023-10-29 19:04:24'),
(4,'C4','CUTTING',1,1,'2023-10-29 19:04:24'),
(5,'C5','CUTTING',1,1,'2023-10-29 19:04:24'),
(6,'C6','CUTTING',1,1,'2023-10-29 19:04:24'),
(7,'C7','CUTTING',1,1,'2023-10-29 19:04:24'),
(8,'C8','CUTTING',1,1,'2023-10-29 19:04:24'),
(9,'C9','CUTTING',1,1,'2023-10-29 19:04:24'),
(10,'C10','CUTTING',1,1,'2023-10-29 19:04:24'),
(11,'C11','CUTTING',1,1,'2023-10-29 19:04:24'),
(12,'C12','CUTTING',1,1,'2023-10-29 19:04:24'),
(13,'C13','CUTTING',1,1,'2023-10-29 19:04:24'),
(14,'C14','CUTTING',1,1,'2023-10-29 19:04:24'),
(15,'C15','CUTTING',1,1,'2023-10-29 19:04:24'),
(16,'C16','CUTTING',1,1,'2023-10-29 19:04:24'),
(17,'C17','CUTTING',1,1,'2023-10-29 19:04:24'),
(18,'C18','CUTTING',1,1,'2023-10-29 19:04:24'),
(19,'M1','MACHINING',1,1,'2023-10-29 19:04:24'),
(20,'M2','MACHINING',1,1,'2023-10-29 19:04:24'),
(21,'M3','MACHINING',1,1,'2023-10-29 19:04:24'),
(22,'M4','MACHINING',1,1,'2023-10-29 19:04:24'),
(23,'M5','MACHINING',1,1,'2023-10-29 19:04:24'),
(24,'M6','MACHINING',1,1,'2023-10-29 19:04:24');

/*Table structure for table `mst_man_power` */

DROP TABLE IF EXISTS `mst_man_power`;

CREATE TABLE `mst_man_power` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nik` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `update_by` int(11) DEFAULT NULL,
  `is_active` int(11) DEFAULT NULL,
  `last_update` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

/*Data for the table `mst_man_power` */

insert  into `mst_man_power`(`id`,`nik`,`name`,`update_by`,`is_active`,`last_update`) values 
(1,'5582','RAHMAT NUGROHO',1,1,'2023-10-29 18:47:12'),
(2,'5541','UMAR HADI',1,1,'2023-10-29 18:47:50'),
(3,'5472',' YUSUF SYAFAAT',1,1,'2023-10-29 18:52:51'),
(4,'5646',' SABAR WASIRAN',1,1,'2023-10-29 18:52:51'),
(5,'5546',' KARYA WIJAYA',1,1,'2023-10-29 18:52:51'),
(6,'5544',' JAKARIA',1,1,'2023-10-29 18:52:51'),
(7,'1111',' YANUARDIN',1,1,'2023-10-29 18:52:51'),
(8,'5397',' RUSITO',1,1,'2023-10-29 18:52:51'),
(9,'5466',' SEPTIADI PRATOMO',1,1,'2023-10-29 18:52:51'),
(10,'5419',' RUKMAN',1,1,'2023-10-29 18:52:51'),
(11,'5536',' JAKA RARA SUKMA',1,1,'2023-10-29 18:52:51'),
(12,'5532',' ANDI SANTOSO',1,1,'2023-10-29 18:52:51'),
(13,'5535',' AGUNG PANGESTU YUSUF',1,1,'2023-10-29 18:52:51'),
(14,'5564',' NUR SUPRIYANTO',1,1,'2023-10-29 18:52:51'),
(15,'5425',' DASUKI',1,1,'2023-10-29 18:52:51'),
(16,'5264',' NURSAID',1,1,'2023-10-29 18:52:51'),
(17,'5600',' AGUS ROSIDIN',1,1,'2023-10-29 18:52:51'),
(18,'5489',' MIFTAKHUROHMAN',1,1,'2023-10-29 18:52:51'),
(19,'5542',' HAERUL IKHSAN',1,1,'2023-10-29 18:52:51'),
(20,'5569',' HENDRIO',1,1,'2023-10-29 18:52:51');

/*Table structure for table `trx_act_manpower` */

DROP TABLE IF EXISTS `trx_act_manpower`;

CREATE TABLE `trx_act_manpower` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_mc` int(11) DEFAULT NULL,
  `man_power` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `last_update` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

/*Data for the table `trx_act_manpower` */

insert  into `trx_act_manpower`(`id`,`id_mc`,`man_power`,`date`,`last_update`) values 
(1,1,2,'2023-10-29','2023-10-30 04:18:33'),
(2,3,5,'2023-10-29','2023-10-30 04:28:10');

/*Table structure for table `trx_eff_machine` */

DROP TABLE IF EXISTS `trx_eff_machine`;

CREATE TABLE `trx_eff_machine` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_mc` int(11) DEFAULT NULL,
  `shift` int(11) DEFAULT NULL,
  `waktu` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `last_update` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

/*Data for the table `trx_eff_machine` */

insert  into `trx_eff_machine`(`id`,`id_mc`,`shift`,`waktu`,`date`,`last_update`) values 
(1,1,1,7,'2023-10-29','2023-10-30 02:47:06'),
(2,1,2,5,'2023-10-29','2023-10-30 02:47:09'),
(3,3,1,8,'2023-10-29','2023-10-30 03:11:47');

/*Table structure for table `trx_prod_in` */

DROP TABLE IF EXISTS `trx_prod_in`;

CREATE TABLE `trx_prod_in` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_mc` int(11) DEFAULT NULL,
  `jml_wo` int(11) DEFAULT NULL,
  `pcs` int(11) DEFAULT NULL,
  `kg` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `last_update` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

/*Data for the table `trx_prod_in` */

insert  into `trx_prod_in`(`id`,`id_mc`,`jml_wo`,`pcs`,`kg`,`date`,`last_update`) values 
(1,1,50,100,110,'2023-10-29','2023-10-29 23:49:22'),
(2,3,60,120,120,'2023-10-29','2023-10-29 21:48:17'),
(3,2,30,30,30,'2023-10-29','2023-10-30 00:48:26'),
(4,4,60,60,60,'2023-10-29','2023-10-30 00:49:13'),
(5,5,50,50,50,'2023-10-29','2023-10-30 00:50:37');

/*Table structure for table `trx_prod_out` */

DROP TABLE IF EXISTS `trx_prod_out`;

CREATE TABLE `trx_prod_out` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_mc` int(11) DEFAULT NULL,
  `jml_wo` int(11) DEFAULT NULL,
  `pcs` int(11) DEFAULT NULL,
  `kg` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `last_update` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

/*Data for the table `trx_prod_out` */

insert  into `trx_prod_out`(`id`,`id_mc`,`jml_wo`,`pcs`,`kg`,`date`,`last_update`) values 
(1,1,60,110,110,'2023-10-29','2023-10-29 23:37:19'),
(2,3,110,170,170,NULL,'2023-10-29 23:38:13'),
(3,5,50,50,50,'2023-10-29','2023-10-30 00:53:54');

/*Table structure for table `trx_prod_sisa` */

DROP TABLE IF EXISTS `trx_prod_sisa`;

CREATE TABLE `trx_prod_sisa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_mc` int(11) DEFAULT NULL,
  `jml_wo` int(11) DEFAULT NULL,
  `pcs` int(11) DEFAULT NULL,
  `kg` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `last_update` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

/*Data for the table `trx_prod_sisa` */

insert  into `trx_prod_sisa`(`id`,`id_mc`,`jml_wo`,`pcs`,`kg`,`date`,`last_update`) values 
(1,1,10,10,10,'2023-10-29','2023-10-29 23:35:22'),
(2,3,50,50,50,'2023-10-29','2023-10-29 23:36:15');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
