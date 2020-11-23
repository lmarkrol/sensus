/*
SQLyog Ultimate v12.5.1 (64 bit)
MySQL - 10.4.6-MariaDB : Database - sensus_penduduk
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`sensus_penduduk` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `sensus_penduduk`;

/*Table structure for table `is_users_support` */

DROP TABLE IF EXISTS `is_users_support`;

CREATE TABLE `is_users_support` (
  `id_user` smallint(6) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `nama_user` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `telepon` varchar(13) DEFAULT NULL,
  `foto` varchar(100) DEFAULT NULL,
  `hak_akses` enum('admin') NOT NULL,
  `status` enum('aktif','blokir') NOT NULL DEFAULT 'aktif',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id_user`),
  KEY `level` (`hak_akses`)
) ENGINE=InnoDB AUTO_INCREMENT=164 DEFAULT CHARSET=latin1;

/*Data for the table `is_users_support` */

insert  into `is_users_support`(`id_user`,`username`,`nama_user`,`password`,`email`,`telepon`,`foto`,`hak_akses`,`status`,`created_at`,`updated_at`) values 
(1,'admin','admin_rw','21232f297a57a5a743894a0e4a801fc3','-','-','-','admin','aktif','2020-05-01 15:42:53','2020-10-21 14:05:09');

/*Table structure for table `kk` */

DROP TABLE IF EXISTS `kk`;

CREATE TABLE `kk` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `no_kk` varchar(100) NOT NULL,
  `no_ktp` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `RT` varchar(50) NOT NULL,
  `RW` varchar(50) NOT NULL,
  `status_rumah` enum('warga','ngontrak') NOT NULL,
  `status` enum('Meninggal','aktif','KK') NOT NULL,
  `doc` varchar(100) NOT NULL,
  `jkel` enum('Laki - Laki','Perempuan') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=latin1;

/*Data for the table `kk` */

/*Table structure for table `kl` */

DROP TABLE IF EXISTS `kl`;

CREATE TABLE `kl` (
  `NO` int(10) NOT NULL AUTO_INCREMENT,
  `NO_KK` varchar(255) DEFAULT NULL,
  `NIK` varchar(255) DEFAULT NULL,
  `NAMA` varchar(255) DEFAULT NULL,
  `JK` varchar(255) DEFAULT NULL,
  `TEMPAT` varchar(255) DEFAULT NULL,
  `TANGGAL` date DEFAULT NULL,
  `AGAMA` varchar(255) DEFAULT NULL,
  `STATUS` varchar(255) DEFAULT NULL,
  `SUSUNAN` varchar(255) DEFAULT NULL,
  `PEND` varchar(255) DEFAULT NULL,
  `PERKERJAAN` varchar(255) DEFAULT NULL,
  `KET` varchar(255) DEFAULT NULL,
  `RT` varchar(255) DEFAULT NULL,
  `RW` varchar(255) DEFAULT NULL,
  `MUTASI` varchar(255) DEFAULT NULL,
  `NO_RUMAH` varchar(255) DEFAULT NULL,
  `DOC` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`NO`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `kl` */

insert  into `kl`(`NO`,`NO_KK`,`NIK`,`NAMA`,`JK`,`TEMPAT`,`TANGGAL`,`AGAMA`,`STATUS`,`SUSUNAN`,`PEND`,`PERKERJAAN`,`KET`,`RT`,`RW`,`MUTASI`,`NO_RUMAH`,`DOC`) values 
(6,'3250000000001','3250000000002','Fandi','L','Jakarta','0000-00-00','ISLAM','Menikah','KEPALA KELUARGA','S4','Swasta','TETAP','001','020',NULL,'01','kkk.jpg');

/*Table structure for table `sub` */

DROP TABLE IF EXISTS `sub`;

CREATE TABLE `sub` (
  `NO` int(255) NOT NULL AUTO_INCREMENT,
  `NO_KK` varchar(255) DEFAULT NULL,
  `NIK` varchar(255) DEFAULT NULL,
  `NAMA` varchar(255) DEFAULT NULL,
  `JK` varchar(255) DEFAULT NULL,
  `TEMPAT` varchar(255) DEFAULT NULL,
  `TANGGAL` varchar(255) DEFAULT NULL,
  `AGAMA` varchar(255) DEFAULT NULL,
  `STATUS` varchar(255) DEFAULT NULL,
  `SUSUNAN` varchar(255) DEFAULT NULL,
  `PEND` varchar(255) DEFAULT NULL,
  `PERKERJAAN` varchar(255) DEFAULT NULL,
  `KET` varchar(255) DEFAULT NULL,
  `RT` varchar(255) DEFAULT NULL,
  `RW` varchar(255) DEFAULT NULL,
  `MUTASI` varchar(255) DEFAULT NULL,
  `NO_RUMAH` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`NO`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

/*Data for the table `sub` */

insert  into `sub`(`NO`,`NO_KK`,`NIK`,`NAMA`,`JK`,`TEMPAT`,`TANGGAL`,`AGAMA`,`STATUS`,`SUSUNAN`,`PEND`,`PERKERJAAN`,`KET`,`RT`,`RW`,`MUTASI`,`NO_RUMAH`) values 
(6,'3250000000000000001','3250000000000000002','Fandi','L','Jakarta','1984-07-27','ISLAM','Menikah','KEPALA KELUARGA','S4','SWASTA','TETAP','002','020',NULL,'91'),
(7,'3250000000001','3250000000002','Fandi','L','Jakarta','1984-07-27','ISLAM','Menikah','KEPALA KELUARGA','S4','Swasta','TETAP','001','020',NULL,'01'),
(8,'3250000000001','3250000000003','Vera','P','Jakarta',NULL,'ISLAM','Menikah','ISTRI','S3','Swasta','TETAP','002','020',NULL,'01');

/*Table structure for table `sub_kk` */

DROP TABLE IF EXISTS `sub_kk`;

CREATE TABLE `sub_kk` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `no_kk` varchar(100) NOT NULL,
  `no_ktp` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `RT` varchar(100) NOT NULL,
  `RW` varchar(100) NOT NULL,
  `status` enum('Ada','Meninggal','KK') NOT NULL,
  `status_rumah` enum('warga','ngontrak') NOT NULL,
  `doc` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `sub_kk` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
