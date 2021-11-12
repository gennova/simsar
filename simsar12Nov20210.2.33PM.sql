/*
SQLyog Ultimate v13.1.1 (64 bit)
MySQL - 10.4.16-MariaDB : Database - simsar
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`simsar` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `simsar`;

/*Table structure for table `ci_admin` */

DROP TABLE IF EXISTS `ci_admin`;

CREATE TABLE `ci_admin` (
  `admin_id` int(11) NOT NULL AUTO_INCREMENT,
  `admin_role_id` int(11) NOT NULL,
  `username` varchar(100) CHARACTER SET utf8 NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile_no` varchar(255) NOT NULL,
  `image` varchar(300) NOT NULL,
  `password` varchar(255) NOT NULL,
  `last_login` datetime NOT NULL,
  `is_verify` tinyint(4) NOT NULL DEFAULT 1,
  `is_admin` tinyint(4) NOT NULL DEFAULT 1,
  `is_active` tinyint(4) NOT NULL DEFAULT 0,
  `is_supper` tinyint(4) NOT NULL DEFAULT 0,
  `token` varchar(255) NOT NULL,
  `password_reset_code` varchar(255) NOT NULL,
  `last_ip` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `unit` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

/*Data for the table `ci_admin` */

insert  into `ci_admin`(`admin_id`,`admin_role_id`,`username`,`firstname`,`lastname`,`email`,`mobile_no`,`image`,`password`,`last_login`,`is_verify`,`is_admin`,`is_active`,`is_supper`,`token`,`password_reset_code`,`last_ip`,`created_at`,`updated_at`,`unit`) values 
(2,2,'admin','Admin','User','admin@gmail.com','544354353','','$2y$10$ejewXkbluc6ysl7TUSbhgO9dkMBEjH7eIxXVNIfjsen2eGbbURPrS','2019-01-09 00:00:00',1,1,1,0,'','','','2018-03-19 00:00:00','2019-01-16 23:33:26','BDG'),
(6,1,'antoniusdede','Antonius Dede','Bandung','antoniusdede@gmail.com','0123456789','','$2y$10$eM9jXrr.1FWAHEvJMrvl1ufAYxBwsc2DNRc/FPp0hmKLdDN6sZpT2','0000-00-00 00:00:00',1,1,1,0,'','','','2019-11-21 00:00:00','2021-09-15 00:00:00','bdg'),
(7,5,'ypiisarpras','Sarpras','Yayasan','sarprasypii@gmail.com','12345','','$2y$10$uPBmwZeHwK0GnP6NQBZrOuTsGZiEyELUvmmPVRCBcSBAzuFViK2zW','0000-00-00 00:00:00',1,1,1,0,'','','','2020-08-25 00:00:00','2020-11-05 00:00:00','bdg'),
(8,2,'ypiipusat','ypii pusat','semarang','ypii@mail.id','081888888888','','$2y$10$tyu75hY95ZPP4jxsp/YXfuObw3CvO73MvBzSbeE5nOTLYAobm5Di6','0000-00-00 00:00:00',1,1,1,0,'','','','2021-01-31 00:00:00','2021-01-31 00:00:00','bdg'),
(10,2,'PriskaBDG209','Sr Priska','SDP','srpriskasdp@smpwaringinbdg.sch.id','082136160269','','$2y$10$KY6xw9txEQF7XJdpudNp/uOZ1004JokWHUbz4d4olVoarkAbcu4O2','0000-00-00 00:00:00',1,1,1,0,'','','','2021-08-08 00:00:00','2021-08-08 00:00:00','bdg'),
(11,2,'adminsmg','Admin YPII','Semarang','admin@gmail.com','544354353','','$2y$10$ejewXkbluc6ysl7TUSbhgO9dkMBEjH7eIxXVNIfjsen2eGbbURPrS','2019-01-09 00:00:00',1,1,1,0,'','','','2018-03-19 00:00:00','2019-01-16 23:33:26','P01'),
(12,1,'adminbali','bali','bali','bali@yahoo.com','0999000000','','$2y$10$KemW9/wSwO/u0RYvaZNoLuFa5D3ghYjdoWvB8Nqhs.HOYtaxO/zci','0000-00-00 00:00:00',1,1,1,0,'','','','2021-11-11 00:00:00','2021-11-12 00:00:00','S15'),
(13,2,'tksinarmatahari','TK Sinar Matahari','Semarang','sarprasypii@gmail.com','12345678','','$2y$10$c1I/Q773Yqfp5pMIuMDuNeFi3I32h1E7CP6dMPgeP1T7JB2szeWUa','0000-00-00 00:00:00',1,1,1,0,'','','','2021-11-12 00:00:00','2021-11-12 00:00:00','S02'),
(14,5,'sarpraspusat','Sarpras YPII Pusat','Semarang','sarprasypii@gmail.com','12345678','','$2y$10$tTXodnJdRuuSfG57U5x8YuYYGbg8s9fSknOs7v4YEKk5nUquezHGa','0000-00-00 00:00:00',1,1,1,0,'','','','2021-11-12 00:00:00','2021-11-12 00:00:00','P01');

/*Table structure for table `ci_admin_roles` */

DROP TABLE IF EXISTS `ci_admin_roles`;

CREATE TABLE `ci_admin_roles` (
  `admin_role_id` int(11) NOT NULL AUTO_INCREMENT,
  `admin_role_title` varchar(30) CHARACTER SET utf8 NOT NULL,
  `admin_role_status` int(11) NOT NULL,
  `admin_role_created_by` int(1) NOT NULL,
  `admin_role_created_on` datetime NOT NULL,
  `admin_role_modified_by` int(11) NOT NULL,
  `admin_role_modified_on` datetime NOT NULL,
  PRIMARY KEY (`admin_role_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `ci_admin_roles` */

insert  into `ci_admin_roles`(`admin_role_id`,`admin_role_title`,`admin_role_status`,`admin_role_created_by`,`admin_role_created_on`,`admin_role_modified_by`,`admin_role_modified_on`) values 
(1,'Super Admin',1,0,'2018-03-15 12:48:04',0,'2018-03-17 12:53:16'),
(2,'Admin',1,0,'2018-03-15 12:53:19',0,'2019-01-26 08:27:34'),
(5,'sarpras',1,0,'2019-09-30 05:30:38',0,'2020-08-25 04:42:59');

/*Table structure for table `ci_users` */

DROP TABLE IF EXISTS `ci_users`;

CREATE TABLE `ci_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mobile_no` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `role` tinyint(4) NOT NULL DEFAULT 1,
  `is_active` tinyint(4) NOT NULL DEFAULT 1,
  `is_verify` tinyint(4) NOT NULL DEFAULT 0,
  `is_admin` tinyint(4) NOT NULL DEFAULT 0,
  `token` varchar(255) NOT NULL,
  `password_reset_code` varchar(255) NOT NULL,
  `last_ip` varchar(30) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=38 DEFAULT CHARSET=utf8;

/*Data for the table `ci_users` */

insert  into `ci_users`(`id`,`username`,`firstname`,`lastname`,`email`,`mobile_no`,`password`,`address`,`role`,`is_active`,`is_verify`,`is_admin`,`token`,`password_reset_code`,`last_ip`,`created_at`,`updated_at`) values 
(3,'admin','admin','admin','admin@admin.com','12345','$2y$10$qlAzDhBEqkKwP3OykqA7N.ZQk6T67fxD9RHfdv3zToxa9Mtwu9C/e','27 new jersey - Level 58 - CA 444 \r\nUnited State ',1,1,1,1,'','','','2017-09-29 10:09:44','2017-12-14 10:12:41'),
(32,'user','user','user','user@user.com','44897866462','$2y$10$sU5msVdifYie7cZbCEnyku6hLH8Sef0VCHqO9UIOg6rsBsDtsLcyS','',1,1,1,0,'352fe25daf686bdb4edca223c921acea','','','2018-04-24 07:04:07','2019-01-26 03:01:30'),
(33,'john123','john','smith','johnsmith@gmail.com','445889654656','$2y$10$CcBiQrcW597s5muOP2blhOev48gzBv2VvAVp83NsXbLo7cZM7tjGm','USA',7,1,0,0,'','','','2018-04-25 06:04:25','2019-01-24 04:01:33'),
(34,'naumancs','nauman','ahmed','nacreativeprogrammer@gmail.com','4456545632215','$2y$10$Mo6FHIusHr9oDWZxJPaTC.DWZBRom7SfEryk66BbXs25OLYsmKkrK','',1,1,1,0,'','','','2018-04-25 07:04:12','2018-04-25 07:04:28'),
(35,'alire','ali','raza','ali@gmail.com','12345','$2y$10$fq5VZXpOxnzv7uZADBSBA.cg1fip8xRDuoTAsuLC8O5SHGYTjgZXG','wwe',1,1,0,0,'','','','2019-01-24 05:01:14','2019-01-24 05:01:14'),
(36,'zohaib','zohaib','rana','zohaibrana@gmail.com','12345988444','$2y$10$UGpdlIob/e1gBsE2yQ/OEeqKwGGymuYFlhHogw19/SgQYRo2OqA/S','wwe',1,1,0,0,'','','','2019-01-24 05:01:01','2019-01-24 05:01:01'),
(37,'talenta','Talenta','School','talenta@gmail.com','12345678','$2y$10$TTKaVTbe4ArM2ircEqGL3uRD0A26wIftZCJnrN9WSYFMp4Cmvhlwe','123',1,1,0,0,'','','','2019-11-11 00:00:00','2019-11-11 00:00:00');

/*Table structure for table `module` */

DROP TABLE IF EXISTS `module`;

CREATE TABLE `module` (
  `module_id` int(11) NOT NULL AUTO_INCREMENT,
  `module_name` varchar(255) NOT NULL,
  `controller_name` varchar(255) NOT NULL,
  `fa_icon` varchar(100) NOT NULL,
  `operation` text NOT NULL,
  `sort_order` tinyint(4) NOT NULL,
  PRIMARY KEY (`module_id`)
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=latin1;

/*Data for the table `module` */

insert  into `module`(`module_id`,`module_name`,`controller_name`,`fa_icon`,`operation`,`sort_order`) values 
(1,'Admin List','admin','','view|add|edit|delete|change_status|access',0),
(2,'Role & Permissions','admin_roles','','view|add|edit|delete|change_status|access',0),
(9,'Kategori','kategori','','access',0),
(10,'Subkategori','subkategori','','access',0),
(11,'Jenis Barang','jenis','','access',0),
(12,'Kondisi','mkondisi','','access',0),
(13,'Unit','munit','','access',0),
(14,'Lokasi','mlokasi','','access',0),
(15,'Status','mstatus','','access',0),
(16,'Barang','barang','','access',0),
(17,'VLokasi','vlokasi','','access',0),
(18,'Laporan','laporan','','access',0),
(19,'Vsumbarang','vsumbarang','','access',0),
(20,'Vbarangrusak','vbarangrusak','','access',0),
(21,'Komputer','barangkomputer','','access',0),
(22,'Motherboard','mmotherboard','','access',0),
(23,'Processor','mprocessor','','access',0),
(24,'OS','mos','','access',0),
(25,'Sumber Dana','msumberdana','','access',0),
(26,'Data per Kategori','vperkategori','','access',0),
(27,'Peminjaman Barang','peminjaman','','access',0),
(28,'VBarangbos','vbarangbos','','access',0),
(29,'VBarangyys','vbarangyys','','access',0),
(30,'VBarangsum','vbarangsum','','access',0),
(31,'VBarangpinjam','vbarangpinjam','','access',0),
(32,'Barang Meubel','barangmeubel','','access',0),
(33,'Barang Elektronik','barangelektronik','','access',0),
(34,'Barang Perlengkapan Lain','baranglain','','access',0),
(35,'Barang Alat Musik','barangmusik','','access',0),
(36,'Barang Alat Olahraga','barangolahraga','','access',0),
(37,'Barang Kendaraan','barangkendaraan','','access',0),
(38,'Barang Teknopreneur','barangteknopreneur','','access',0),
(39,'Pengajuan Barang','pengajuan','','access',0),
(40,'Cetak Pengajuan','vtglpengajuan','','access',0),
(41,'Cetak Per Tahun','vbarangtahun','','access',0),
(42,'Barang Laboratorium','baranglaboratorium','','access',0);

/*Table structure for table `module_access` */

DROP TABLE IF EXISTS `module_access`;

CREATE TABLE `module_access` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `admin_role_id` int(11) NOT NULL,
  `module` varchar(255) NOT NULL,
  `operation` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `RoleId` (`admin_role_id`)
) ENGINE=InnoDB AUTO_INCREMENT=223 DEFAULT CHARSET=latin1;

/*Data for the table `module_access` */

insert  into `module_access`(`id`,`admin_role_id`,`module`,`operation`) values 
(1,1,'admin','view'),
(2,1,'admin','add'),
(3,1,'admin','edit'),
(4,1,'admin','delete'),
(5,1,'admin','change_status'),
(6,1,'admin','access'),
(7,1,'admin_roles','view'),
(8,1,'admin_roles','add'),
(9,1,'admin_roles','edit'),
(10,1,'admin_roles','delete'),
(11,1,'admin_roles','change_status'),
(12,1,'admin_roles','access'),
(13,1,'users','view'),
(14,1,'users','add'),
(15,1,'users','edit'),
(16,1,'users','delete'),
(17,1,'users','change_status'),
(18,1,'users','access'),
(23,1,'invoices','view'),
(24,1,'invoices','add'),
(25,1,'invoices','edit'),
(26,1,'invoices','delete'),
(27,1,'invoices','access'),
(28,1,'example','access'),
(29,1,'joins','access'),
(30,1,'export','access'),
(62,4,'users','view'),
(63,4,'users','add'),
(64,4,'users','edit'),
(65,4,'users','delete'),
(66,4,'users','access'),
(67,4,'users','change_status'),
(68,4,'invoices','view'),
(69,4,'invoices','add'),
(70,4,'invoices','edit'),
(71,4,'invoices','delete'),
(72,4,'invoices','access'),
(73,4,'example','access'),
(74,4,'joins','access'),
(75,4,'export','access'),
(77,1,'kategori','access'),
(78,1,'kategori','view'),
(79,1,'kategori','add'),
(80,1,'kategori','edit'),
(81,1,'kategori','delete'),
(82,2,'kategori','view'),
(83,2,'kategori','add'),
(84,2,'kategori','edit'),
(85,2,'kategori','delete'),
(86,2,'kategori','access'),
(99,1,'subkategori','access'),
(100,2,'subkategori','access'),
(101,1,'jenis','access'),
(102,2,'jenis','access'),
(104,1,'mkondisi','access'),
(107,1,'kondisi','access'),
(108,2,'kondisi','access'),
(109,2,'mkondisi','access'),
(110,1,'munit','access'),
(111,1,'mlokasi','access'),
(112,1,'mstatus','access'),
(113,1,'mtahun','access'),
(114,1,'barang','access'),
(115,2,'mlokasi','access'),
(116,2,'munit','access'),
(117,2,'mstatus','access'),
(118,2,'barang','access'),
(120,5,'barang','access'),
(121,5,'mstatus','access'),
(122,5,'mlokasi','access'),
(123,5,'munit','access'),
(124,5,'mkondisi','access'),
(125,5,'jenis','access'),
(126,5,'subkategori','access'),
(130,2,'admin','view'),
(131,2,'admin','access'),
(133,5,'kategori','access'),
(134,2,'admin','add'),
(141,1,'lokasi','access'),
(142,1,'laporan','access'),
(143,2,'lokasi','access'),
(144,2,'laporan','access'),
(145,5,'lokasi','access'),
(146,5,'laporan','access'),
(147,1,'vlokasi','access'),
(148,5,'vlokasi','access'),
(149,1,'vsumbarang','access'),
(150,5,'vsumbarang','access'),
(151,2,'vlokasi','access'),
(152,2,'vsumbarang','access'),
(153,1,'vbarangrusak','access'),
(154,2,'vbarangrusak','access'),
(155,5,'vbarangrusak','access'),
(156,1,'vbarangkomputer','access'),
(157,1,'barangkomputer','access'),
(158,2,'barangkomputer','access'),
(159,1,'mmotherboard','access'),
(160,2,'mmotherboard','access'),
(161,1,'mprocessor','access'),
(162,2,'mprocessor','access'),
(163,1,'mos','access'),
(164,2,'mos','access'),
(165,1,'msumberdana','access'),
(166,2,'msumberdana','access'),
(167,1,'vperkategori','access'),
(168,2,'vperkategori','access'),
(169,1,'peminjaman','access'),
(170,2,'peminjaman','access'),
(171,1,'vbarangbos','access'),
(172,2,'vbarangbos','access'),
(173,1,'vbarangyys','access'),
(174,1,'vbarangsum','access'),
(175,2,'vbarangyys','access'),
(176,2,'vbarangsum','access'),
(177,1,'vbarangpinjam','access'),
(178,2,'vbarangpinjam','access'),
(179,1,'barangmeubel','access'),
(180,2,'barangmeubel','access'),
(181,1,'barangelektronik','access'),
(182,2,'barangelektronik','access'),
(183,1,'baranglain','access'),
(184,1,'barangmusik','access'),
(185,1,'barangolahraga','access'),
(186,1,'barangkendaraan','access'),
(187,1,'barangteknopreneur','access'),
(188,2,'baranglain','access'),
(189,2,'barangmusik','access'),
(190,2,'barangolahraga','access'),
(192,2,'barangteknopreneur','access'),
(193,5,'barangkomputer','access'),
(194,5,'mmotherboard','access'),
(195,5,'mprocessor','access'),
(196,5,'mos','access'),
(197,5,'msumberdana','access'),
(198,5,'vperkategori','access'),
(199,5,'peminjaman','access'),
(200,5,'vbarangbos','access'),
(201,5,'vbarangyys','access'),
(202,5,'vbarangsum','access'),
(203,5,'vbarangpinjam','access'),
(204,5,'barangmeubel','access'),
(205,5,'barangelektronik','access'),
(206,5,'baranglain','access'),
(207,5,'barangmusik','access'),
(208,5,'barangolahraga','access'),
(209,5,'barangkendaraan','access'),
(210,5,'barangteknopreneur','access'),
(211,2,'barangkendaraan','access'),
(212,1,'pengajuan','access'),
(213,1,'vtglpengajuan','access'),
(214,2,'pengajuan','access'),
(215,2,'vtglpengajuan','access'),
(216,5,'pengajuan','access'),
(217,5,'vtglpengajuan','access'),
(218,1,'vbarangtahun','access'),
(219,2,'vbarangtahun','access'),
(220,5,'vbarangtahun','access'),
(221,1,'baranglaboratorium','access'),
(222,2,'baranglaboratorium','access');

/*Table structure for table `tblbarang` */

DROP TABLE IF EXISTS `tblbarang`;

CREATE TABLE `tblbarang` (
  `idbarang` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `kdkategori` char(1) DEFAULT NULL,
  `kdsubkategori` char(3) DEFAULT NULL,
  `idjenis` int(11) DEFAULT NULL,
  `kdlokasi` char(7) DEFAULT NULL,
  `kdprefix` varchar(10) DEFAULT NULL,
  `kdsumberdana` varchar(3) DEFAULT NULL,
  `nourut` char(10) DEFAULT NULL,
  `kdbarang` varchar(50) NOT NULL,
  `namabarang` varchar(50) DEFAULT NULL,
  `harga` double DEFAULT NULL,
  `tipe` varchar(50) DEFAULT NULL,
  `serialnumber` varchar(100) DEFAULT NULL,
  `tglmasuk` date DEFAULT NULL,
  `invoice` varchar(100) DEFAULT NULL,
  `idkondisi` int(11) DEFAULT NULL,
  `keterangan` text DEFAULT NULL,
  `motherboard` varchar(50) DEFAULT NULL,
  `processor` varchar(50) DEFAULT NULL,
  `tipedisk` enum('HDD','SSD') DEFAULT NULL,
  `sizedisk` varchar(50) DEFAULT NULL,
  `tiperam` enum('DDR2','DDR3','DDR4','SODIMM') DEFAULT NULL,
  `sizeram` int(11) DEFAULT NULL,
  `namaos` varchar(50) DEFAULT NULL,
  `unit` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`idbarang`,`kdbarang`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `tblbarang` */

insert  into `tblbarang`(`idbarang`,`kdkategori`,`kdsubkategori`,`idjenis`,`kdlokasi`,`kdprefix`,`kdsumberdana`,`nourut`,`kdbarang`,`namabarang`,`harga`,`tipe`,`serialnumber`,`tglmasuk`,`invoice`,`idkondisi`,`keterangan`,`motherboard`,`processor`,`tipedisk`,`sizedisk`,`tiperam`,`sizeram`,`namaos`,`unit`) values 
(1,'B','KOM',46,'R-00001','B-KOM-S02-','YYS','0000000001','B-KOM-S02-YYS-0000000001-2017','PC Kepala Sekolah',5000000,'Acer',NULL,'2017-11-14',NULL,1,NULL,'12','3','HDD','500','DDR3',4,'3','S02'),
(2,'B','KOM',47,'R-00003','B-KOM-P01-','YYS','0000000002','B-KOM-P01-YYS-0000000002-2019','Laptop Teknisi Toshiba',5000000,'Toshiba','X9F5015395','2019-11-13',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'P01'),
(3,'B','KOM',47,'R-00001','B-KOM-S02-','YYS','0000000003','B-KOM-S02-YYS-0000000003-2020','Laptop Kepala Sekolah',4500000,'Lenovo',NULL,'2020-11-09',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'S02'),
(4,'A','KRS',8,'R-00003','A-KRS-P01-','YYS','0000000004','A-KRS-P01-YYS-0000000004-2013','Kursi Chitose Teknisi',NULL,NULL,NULL,'2013-04-09',NULL,2,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'P01');

/*Table structure for table `tbljenis` */

DROP TABLE IF EXISTS `tbljenis`;

CREATE TABLE `tbljenis` (
  `kdkategori` varchar(3) DEFAULT NULL,
  `kdsubkategori` char(3) DEFAULT NULL,
  `idjenis` int(11) NOT NULL AUTO_INCREMENT,
  `namajenis` varchar(50) DEFAULT NULL,
  `ket` text DEFAULT NULL,
  PRIMARY KEY (`idjenis`)
) ENGINE=InnoDB AUTO_INCREMENT=425 DEFAULT CHARSET=latin1;

/*Data for the table `tbljenis` */

insert  into `tbljenis`(`kdkategori`,`kdsubkategori`,`idjenis`,`namajenis`,`ket`) values 
('A','KRS',6,'Kursi Siswa','<p>\r\n	Kursi Siswa di Kelas</p>\r\n'),
('A','KRS',7,'Kursi Lipat Chitose',NULL),
('A','KRS',8,'Kursi Guru',NULL),
('A','KRS',9,'Kursi Kuliah',NULL),
('A','KRS',10,'Kursi Roda putar',NULL),
('A','KRS',11,'Kursi Sofa',NULL),
('A','KRS',12,'Kursi bundar Lab',NULL),
('A','KRS',13,'Kursi Bangku panjang',NULL),
('A','LMR',14,'Lemari Kayu 2 Pintu',NULL),
('A','LMR',15,'Lemari Kayu 2 Pintu Kaca',NULL),
('A','LMR',16,'Lemari Kayu 3 Pintu',NULL),
('A','LMR',17,'Lemari Kayu 3 Pintu Kaca',NULL),
('A','LMR',18,'Lemari Kayu 4 Pintu',NULL),
('A','LMR',19,'Lemari Arsip',NULL),
('A','MJA',20,'Meja siswa',NULL),
('A','MJA',21,'Meja Kantor',NULL),
('A','MJA',22,'Meja 1/2 biro',NULL),
('A','MJA',23,'Meja Resepsionis',NULL),
('A','MJA',24,'Meja Komputer',NULL),
('A','MJA',25,'Meja Makan',NULL),
('A','MJA',26,'Meja Lab',NULL),
('A','MJA',27,'Meja Rapat',NULL),
('A','PAN',28,'Papan tulis whiteboard',NULL),
('A','PAN',29,'Papan Administrasi',NULL),
('A','LOK',30,'Loker arsip',NULL),
('A','LOK',31,'Loker kecil',NULL),
('A','LOK',32,'Loker besar',NULL),
('A','RAK',33,'Rak Buku Kayu',NULL),
('A','RAK',34,'Rak Besi',NULL),
('A','RAK',35,'Rak Sepatu Kayu',NULL),
('B','MUL',36,'Amplifier',NULL),
('B','MUL',37,'Kamera',NULL),
('B','MUL',38,'CD/DVD-Compact/Player',NULL),
('B','MUL',39,'Handycam',NULL),
('B','MUL',40,'Speaker Aktif',NULL),
('B','MUL',41,'Mikrofon',NULL),
('B','MUL',42,'Radio Tape Kaset',NULL),
('B','MUL',43,'Megaphone (TOA)',NULL),
('B','MUL',44,'Screen',NULL),
('B','MUL',45,'TV',NULL),
('B','KOM',46,'PC',NULL),
('B','KOM',47,'Laptop',NULL),
('B','KOM',48,'Printer',NULL),
('B','KOM',49,'Projektor',NULL),
('B','KOM',50,'Scanner',NULL),
('B','KOM',51,'OHP',NULL),
('B','OFC',52,'Pesawat telepon',NULL),
('B','OFC',53,'Handphone',NULL),
('B','MUL',54,'Handy-Talkie',NULL),
('B','OFC',55,'Mesin-Fotokopi',NULL),
('B','OFC',56,'Mesin-Fax',NULL),
('B','OFC',57,'Mesin-Laminating',NULL),
('B','OFC',58,'Mesin Penghancur Kertas',NULL),
('B','ERT',59,'Dispenser',NULL),
('B','ERT',60,'Kulkas',NULL),
('B','ERT',61,'AC',NULL),
('B','ERT',62,'Exhausted-Fan',NULL),
('C','RUA',63,'Jam Dinding',NULL),
('B','ERT',64,'Kipas Angin',NULL),
('B','ERT',65,'Pompa Air',NULL),
('B','ERT',66,'Vacuum Cleaner',NULL),
('C','KMR',67,'Kasur',NULL),
('C','KMR',68,'Bantal',NULL),
('C','KMR',69,'Selimut',NULL),
('C','RUA',70,'Karpet',NULL),
('C','DPR',72,'Kompor Gas',NULL),
('A','RAK',73,'Rak Piring',NULL),
('C','DPR',74,'Tabung Gas',NULL),
('C','DPR',75,'Piring',NULL),
('C','DPR',76,'Mangkuk',NULL),
('C','DPR',77,'Gelas',NULL),
('C','DPR',78,'Wajan',NULL),
('C','DPR',79,'Spatula',NULL),
('C','KBR',80,'Tempat Sampah Besar','<p>\n	Warna Kuning, Hijau, Abu-abu di sekitar Kelas</p>\n'),
('C','KBR',81,'Tempat Sampah Kecil',NULL),
('C','KBR',82,'Sapu Lantai',NULL),
('C','KBR',83,'Sapu Lidi',NULL),
('C','KBR',84,'Alat Pel Lantai',NULL),
('C','KBR',85,'Ember',NULL),
('C','KBR',86,'Lap Debu',NULL),
('C','KBR',87,'Lap Kanebo',NULL),
('C','RUA',88,'Salib',NULL),
('C','RUA',89,'Gambar Presiden',NULL),
('C','RUA',90,'Gambar Wapres',NULL),
('C','RUA',91,'Gambar Peta',NULL),
('C','RUA',92,'Gambar Lainnya',NULL),
('D','ELE',93,'Gitar Elektrik',NULL),
('D','ELE',94,'Keyboard',NULL),
('D','ELE',95,'Gitar Akustik Elektrik',NULL),
('D','MAN',96,'Gitar Akustik',NULL),
('D','MAN',97,'Drum',NULL),
('D','MAN',98,'Pianika',NULL),
('D','MAN',99,'Seruling',NULL),
('D','MAN',100,'Angklung',NULL),
('D','MAN',101,'Calung',NULL),
('D','MAN',102,'Arumba',NULL),
('D','MAN',103,'Gamelan',NULL),
('D','MAN',104,'Perkusi',NULL),
('D','MAN',105,'Ukulele',NULL),
('D','MAN',106,'Jimbe',NULL),
('E','VOL',107,'Bola Voli',NULL),
('E','VOL',108,'Net Voli',NULL),
('E','BAS',109,'Bola Basket',NULL),
('E','BAS',110,'Ring Basket',NULL),
('E','SBL',111,'Bola Sepak',NULL),
('E','SBL',112,'Tiang Gawang',NULL),
('E','SBL',113,'Cone',NULL),
('E','SBL',114,'Sarung Tangan Kiper',NULL),
('E','TMJ',115,'Bet Pingpong',NULL),
('E','TMJ',116,'Bola Pingpong',NULL),
('E','TMJ',117,'Meja Pingpong',NULL),
('E','TMJ',118,'Net Pingpong',NULL),
('E','BDM',119,'Net badminton',NULL),
('E','BDM',120,'Raket Badminton',NULL),
('E','ATL',121,'Matras',NULL),
('E','ATL',122,'Stop Watch',NULL),
('E','ATL',123,'Skipping',NULL),
('E','ATL',124,'Peluit',NULL),
('E','ATL',125,'Keranjang',NULL),
('E','ATL',126,'Lempar Lembing',NULL),
('A','PAN',127,'Papan Informasi',NULL),
('A','MJA',128,'Meja Guru',NULL),
('B','KOM',129,'Access Point','<p>\n	Merk Tenda</p>\n'),
('B','KOM',130,'Spliter VGA','<p>\n	Untuk output dari PC ke layar</p>\n'),
('B','KOM',131,'Mini PC',NULL),
('C','KBR',132,'Kemoceng',NULL),
('C','KBR',133,'Pengki',NULL),
('C','RUA',134,'Kotak HP',NULL),
('F','ALT',135,'Mikroskop',NULL),
('F','ALT',136,'Desikator','<p>\r\n	Tempat untuk menyimpan sampel</p>\r\n'),
('F','ALT',137,'Destilasi',NULL),
('F','LAB',138,'Gelas Ukur',NULL),
('F','LAB',139,'Tabung Reaksi',NULL),
('F','LAB',140,'Labu Ukur',NULL),
('F','LAB',141,'Erlenmeyer',NULL),
('F','LAB',142,'Gelas Beaker',NULL),
('F','LAB',143,'Pipet Tetes',NULL),
('F','LAB',144,'Pipet Ukur',NULL),
('F','LAB',145,'Pipet Gondok',NULL),
('F','LAB',146,'Rak Tabung Reaksi',NULL),
('F','LAB',147,'Penjepit Tabung Reaksi',NULL),
('F','LAB',148,'Plat Tetes',NULL),
('F','LAB',149,'Mortar dan Pestle',NULL),
('F','LAB',150,'Corong Pisah',NULL),
('F','LAB',151,'Kondensor',NULL),
('F','LAB',152,'Buret',NULL),
('C','RUA',153,'Layar Proyektor','<p>\n	Untuk Menampilkan Display dari Infokus</p>\n'),
('C','RUA',154,'Bendera',NULL),
('C','RUA',155,'Kalender',NULL),
('B','MUL',156,'Speaker Ruangan',NULL),
('B','MUL',157,'Kamera CCTV',NULL),
('C','RUA',158,'Hanger Tempel',NULL),
('C','RUA',159,'Gorden',NULL),
('C','DPR',160,'Galon Air',NULL),
('B','MUL',161,'DVR CCTV',NULL),
('A','PAN',162,'Softboard',NULL),
('C','MIS',163,'Pakaian misa',NULL),
('C','MIS',164,'Peralatan misa',NULL),
('A','LMR',165,'Lemari Dapur Gantung',NULL),
('A','MJA',166,'Meja Kerja',NULL),
('G','HAN',167,'Mesin Press PIN','<p>\n	Merk Talent</p>\n'),
('G','HAN',168,'Mesin ID Card',NULL),
('G','MSN',169,'Mesin Press Kaos',NULL),
('G','MSN',170,'Mesin Sablon Mug',NULL),
('G','MSN',171,'Printer Sublim','<p>\n	Epson L1110</p>\n'),
('G','MSN',172,'Mesin Laminating',NULL),
('A','KRS',173,'Kursi Kantor',NULL),
('A','KRS',174,'Kursi Kayu Kecil',NULL),
('A','KRS',175,'Kursi Kayu',NULL),
('A','KRS',176,'Kursi Plastik',NULL),
('A','LMR',177,'Lemari Besi Kaca',NULL),
('A','LMR',178,'Lemari Arsip Kecil',NULL),
('A','LMR',179,'Lemari Arsip Besar',NULL),
('A','LMR',180,'Brankas',NULL),
('B','MUL',181,'Speaker Pasif',NULL),
('C','RUA',182,'Jam Digital',NULL),
('A','MJA',183,'Meja kayu',NULL),
('B','ERT',184,'Water heater',NULL),
('A','RAK',185,'Rak jemuran Stainless',NULL),
('A','LOK',186,'Loker pakaian',NULL),
('B','KOM',187,'Aksesoris','<p>\n	Aksesoris komputer / device</p>\n'),
('A','MJA',188,'Meja Altar','<p>\n	Meja untuk di Kapel</p>\n'),
('A','LMR',189,'Lemari Buku',NULL),
('A','LMR',190,'Lemari Kayu',NULL),
('D','ELE',191,'Organ',NULL),
('D','ELE',192,'Piano',NULL),
('A','STN',193,'Standar Lektor',NULL),
('A','KRS',194,'Kursi Kapel',NULL),
('C','BUK',195,'Buku Misa',NULL),
('A','LMR',196,'Lemari Besi',NULL),
('C','TUK',197,'Tang Ampere',NULL),
('C','TUK',198,'Ampere AC',NULL),
('C','TUK',199,'Tang Potong',NULL),
('C','TUK',200,'Obeng',NULL),
('C','TUK',201,'Senter',NULL),
('C','TUK',202,'Mesin Bor',NULL),
('C','TUK',203,'Alat Potong Pipa',NULL),
('C','TUK',204,'Gunting kabel',NULL),
('C','TUK',205,'Multi Tester',NULL),
('H','MOB',206,'Mobil SUV',NULL),
('H','MOT',207,'Motor Matic',NULL),
('H','MOT',208,'Motor Manual',NULL),
('B','OFC',209,'Mesin Riso',NULL),
('B','KOM',210,'Stabilizer',NULL),
('C','ATK',211,'Alat Potong Kertas',NULL),
('B','OFC',212,'Panel PABX',NULL),
('A','RAK',213,'Rak Kayu',NULL),
('C','TUK',214,'Palu',NULL),
('C','TUK',215,'Kunci Sock',NULL),
('A','PAN',216,'Triblock','<p>\n	Untuk panggung</p>\n'),
('C','TUK',217,'Mesin Hydrant',NULL),
('C','TUK',218,'Genset',NULL),
('C','TUK',219,'Kunci Ring',NULL),
('C','DEK',220,'Tratak','<p>\n	Sejenis Tenda</p>\n'),
('A','MJA',221,'Meja Lipat',NULL),
('C','TUK',222,'Mesin Jahit',NULL),
('C','ATK',223,'Hekter Besar',NULL),
('A','LMR',224,'Etalase Kaca',NULL),
('C','DEK',225,'Tiang Panggung','<p>\n	Set tiang panggung</p>\n'),
('B','ERT',226,'AC Standing',NULL),
('E','BAS',227,'Papan Scoring',NULL),
('C','DEK',228,'Terpal',NULL),
('C','MMD',229,'Tripod',NULL),
('C','MMD',230,'Kabel Data Handycam',NULL),
('C','MMD',231,'Converter AV to USB','<p>\n	Untuk Handycam</p>\n'),
('B','KOM',232,'HDMI-Switcher',NULL),
('B','KOM',233,'VGA-Switcher',NULL),
('A','MJA',234,'Meja Proyektor',NULL),
('A','RAK',235,'Rak Rotan',NULL),
('A','RAK',236,'Rak Koran',NULL),
('B','KOM',237,'All In One PC',NULL),
('B','KOM',238,'Switch-Hub',NULL),
('B','KOM',239,'Hub-CCTV',NULL),
('A','MJA',240,'Meja Kecil',NULL),
('B','KOM',241,'Headset',NULL),
('B','KOM',242,'Video Capture Card for PC','<p>\n	Card Untuk Video Capture di PC (PCIe Slot)</p>\n'),
('B','KOM',243,'Stream Deck',NULL),
('C','AKS',244,'Mousepad',NULL),
('B','ERT',245,'Lampu Sorot',NULL),
('C','RUA',246,'Sekat Kain Hitam',NULL),
('A','MJA',247,'Meja Panjang',NULL),
('A','MJA',248,'Meja Kamera',NULL),
('A','MJA',249,'Meja Serbaguna',NULL),
('C','KBR',250,'Sprayer Disinfektan',NULL),
('B','MUL',251,'Sound Mixer',NULL),
('C','RUA',252,'Karpet Studio Warna Abu 15m',NULL),
('C','RUA',253,'Karpet Studio Warna Hijau 1 Roll',NULL),
('C','DEK',254,'Background Greenscreen 3x6','<p>\n	Background Bahan Kain untuk Green Screen</p>\n'),
('B','KOM',255,'Router Mikrotik',NULL),
('B','KOM',256,'UPS 1500 VA',NULL),
('B','KOM',257,'Kabel VGA',NULL),
('B','KOM',258,'USB Dongle Bluetooth',NULL),
('B','KOM',259,'Kabel HDMI 5m',NULL),
('B','KOM',260,'Kabel HDMI 10m',NULL),
('B','KOM',261,'Converter HDMI to VGA',NULL),
('B','MUL',262,'Power Supply CCTV',NULL),
('C','RUA',263,'Pemadam Kebakaran',NULL),
('B','KOM',264,'Kabel HDMI 30m',NULL),
('B','MUL',265,'Wireless Video Transmitter',NULL),
('B','MUL',266,'Baterai F970',NULL),
('B','MUL',267,'Chor Baterai F570/750/770/970',NULL),
('B','MUL',268,'Baterai SONY NP-F570',NULL),
('B','MUL',269,'Speaker Desktop',NULL),
('B','KOM',270,'HDMI-Splitter',NULL),
('B','KOM',271,'Kabel HDMI 15m',NULL),
('C','RUA',272,'Kaca cermin',NULL),
('C','RUA',273,'Kain Hijau 40m',NULL),
('C','RUA',274,'Banner Studio 2,2m',NULL),
('C','RUA',275,'Banner Studio 3,2m',NULL),
('A','MJA',276,'Meja Roda',NULL),
('C','DPR',277,'Kompor Gas Portable',NULL),
('A','LMR',278,'Lemari Kaca',NULL),
('A','MJA',279,'Meja Plastik',NULL),
('B','MUL',280,'Mic Set',NULL),
('B','MUL',281,'Mic',NULL),
('B','MUL',282,'Mic Gantung',NULL),
('B','OFC',283,'Mesin Hitung Uang',NULL),
('B','OFC',284,'Tablet',NULL),
('B','MUL',285,'Speaker Subwofer',NULL),
('B','KOM',286,'CD/DVD-External/Writer',NULL),
('C','TUK',287,'Mesin Las Listrik',NULL),
('C','TUK',288,'Mesin Gurinda',NULL),
('C','TUK',289,'Mesin Potong Besi Beton',NULL),
('C','TUK',290,'Mesin Kompresor',NULL),
('C','TUK',291,'Mesin Senso',NULL),
('C','TUK',292,'Takel 1 Ton',NULL),
('C','TUK',293,'Kunci Pipa Besar',NULL),
('C','TUK',294,'Kunci Pipa Kecil',NULL),
('C','TUK',295,'Stager Besar',NULL),
('C','TUK',296,'Pemotong Besi Manual',NULL),
('C','TUK',297,'Pompa Ban',NULL),
('C','TUK',298,'Gergaji Kayu Listrik',NULL),
('C','TUK',299,'Gergaji Kayu Manual',NULL),
('C','TUK',300,'Alat Cas ACCU',NULL),
('C','TUK',301,'Pahat Kayu',NULL),
('C','TUK',302,'Serut Kayu',NULL),
('C','TUK',303,'Gergaji Besi',NULL),
('C','TUK',304,'Roda Pasir',NULL),
('C','TUK',305,'Alat Service AC',NULL),
('C','TUK',306,'Mesin Hamer Besar',NULL),
('C','TUK',307,'Mesin Hamer Kecil',NULL),
('C','TUK',308,'Mesin Ampelas',NULL),
('C','TUK',309,'Mesin Potong Kayu Kecil',NULL),
('C','TUK',310,'Mesin Pompa Air',NULL),
('C','TUK',311,'Mesin Bor Duduk',NULL),
('C','TUK',312,'Mesin Pemadam',NULL),
('B','MUL',313,'Speaker QSC',NULL),
('B','MUL',314,'Speaker REAL',NULL),
('B','MUL',315,'Speaker BEHRINGER',NULL),
('B','MUL',316,'Speaker AC',NULL),
('B','MUL',317,'Speaker CARTER',NULL),
('B','MUL',318,'Speaker Manajemen DBX',NULL),
('B','MUL',319,'Mixer Besar',NULL),
('B','MUL',320,'Mixer Kecil',NULL),
('B','MUL',321,'Mixer Sedang',NULL),
('B','MUL',322,'Speaker SUB QSC',NULL),
('B','MUL',323,'Speaker SUB Huper',NULL),
('D','ELE',324,'Bas Elektrik',NULL),
('B','MUL',325,'Mic Wireless',NULL),
('B','MUL',326,'Kabel Mic',NULL),
('B','MUL',327,'Mic Kondensor',NULL),
('B','MUL',328,'Mic Drum',NULL),
('B','MUL',329,'Direct Input',NULL),
('B','ERT',330,'Lampu Lighting',NULL),
('B','ERT',331,'Mixer Lighting',NULL),
('B','ERT',332,'Power Lighting',NULL),
('C','AKS',333,'Box Aksesoris',NULL),
('C','AKS',334,'Box Power Real & AC',NULL),
('B','MUL',335,'Kabel Snake Panjang',NULL),
('B','MUL',336,'Kabel Snake Pendek',NULL),
('C','MMD',337,'Standar Mic',NULL),
('C','TUK',338,'Jerigen Solar',NULL),
('B','ERT',339,'Kabel 4x6 100m',NULL),
('B','KOM',340,'Kabel Power',NULL),
('B','ERT',341,'Kabel Jumper',NULL),
('B','MUL',342,'Kabel Jack to Jack',NULL),
('B','MUL',343,'Kabel Konektor',NULL),
('B','MUL',344,'Kabel RCA to RCA',NULL),
('B','MUL',345,'Kabel RCA to Jack',NULL),
('C','MMD',346,'Stand Box',NULL),
('B','MUL',347,'Mic Kondensor Sure',NULL),
('B','KOM',348,'UPS 600 VA',NULL),
('B','MUL',349,'Kiup',NULL),
('B','MUL',350,'Kabel A/V (XLR) 20 mtr',NULL),
('C','MMD',351,'Stand Gitar',NULL),
('C','MMD',352,'Stand Speaker',NULL),
('B','MUL',353,'Mic Wireless Clip On',NULL),
('A','LMR',354,'Kitchen Set',NULL),
('A','RAK',355,'Rak Plastik Susun',NULL),
('B','ERT',356,'Blender',NULL),
('B','ERT',357,'Magicom',NULL),
('C','DPR',358,'Alat Cheese Steak',NULL),
('B','ERT',359,'Alat Perekat Plastik',NULL),
('C','DPR',360,'Timbangan Kue',NULL),
('A','RAK',361,'Rak Susun',NULL),
('B','ERT',362,'Pemanas Air',NULL),
('B','ERT',363,'Oven Listrik',NULL),
('C','DPR',364,'Gerobak Jualan',NULL),
('C','DEK',365,'Hiasan Natal + Lampu',NULL),
('C','DEK',366,'Hiasan Imlek',NULL),
('C','DPR',367,'Gelas 319 pcs',NULL),
('A','RAK',368,'Rak Sepatu Plastik',NULL),
('C','PLG',369,'Perosotan',NULL),
('A','LMR',370,'Lemari Gantung',NULL),
('A','RAK',371,'Rak Plastik',NULL),
('C','PLG',372,'Mainan Rumah',NULL),
('A','MJA',373,'Meja Setrika',NULL),
('A','DIP',374,'Tempat Tidur','<p>\n	Ranjang Tempat tidur</p>\n'),
('A','DIP',375,'Dipan','<p>\n	Hanya Dipan</p>\n'),
('A','LMR',376,'Laci Baju',NULL),
('C','KMD',377,'Wastafel',NULL),
('B','ERT',378,'Pemanas Botol',NULL),
('A','LOK',379,'Loker Tas',NULL),
('A','KRS',380,'Kursi Bulat Kayu',NULL),
('A','RAK',381,'Kotak Obat P3K',NULL),
('A','RAK',382,'Rak Jemuran Kayu',NULL),
('A','KRS',383,'Kursi Plastik Kecil',NULL),
('B','ERT',384,'Mesin Cuci',NULL),
('B','KOM',385,'USB Switch Printer','<p>\n	USB Switch Printer 3 port</p>\n'),
('B','ERT',386,'Lampu Led',NULL),
('C','RUA',387,'Modul Pengharum Ruangan',NULL),
('B','MUL',388,'TV Monitor',NULL),
('C','AKS',389,'Payung',NULL),
('C','KBR',390,'Lap Pel',NULL),
('C','DPR',391,'Kompor Listrik',NULL),
('C','AKS',392,'Lampu Parkir',NULL),
('B','ERT',393,'Termometer Infrared',NULL),
('C','AKS',394,'Jas Hujan',NULL),
('C','AKS',395,'Rompi',NULL),
('B','KOM',396,'Modem Internet',NULL),
('B','KOM',397,'Hardisk External',NULL),
('B','KOM',398,'DVD External',NULL),
('B','KOM',399,'Card Reader',NULL),
('B','KOM',400,'Flashdisk USB',NULL),
('B','ERT',401,'Solder Listrik',NULL),
('C','TEK',402,'Tang Crimping',NULL),
('B','TNS',403,'AVO Meter',NULL),
('C','TEK',404,'Toolkit Obeng',NULL),
('B','TNS',405,'LAN Tester',NULL),
('C','TUK',406,'Stager Kecil',NULL),
('C','TUK',407,'Pijakan Stager',NULL),
('B','KOM',408,'WebCam',NULL),
('B','KOM',409,'UPS 650 VA',NULL),
('B','ERT',410,'Oximeter',NULL),
('B','KOM',411,'Monitor',NULL),
('B','OFC',412,'Printer Kalkulator',NULL),
('C','DEK',413,'Kain Dekorasi',NULL),
('C','DPR',414,'Cool Box',NULL),
('C','KBN',415,'Mesin Potong Rumput',NULL),
('C','KBN',416,'Gunting Rumput',NULL),
('C','KBN',417,'Kored','<p>\n	Alat Penyiang Rumput / Gulma</p>\n'),
('C','KBN',418,'Golok',NULL),
('C','KBN',419,'Sabit',NULL),
('C','KBN',420,'Seblang',NULL),
('C','KBN',421,'Pacul',NULL),
('C','ANG',422,'Gerobak Sampah',NULL),
('C','KBN',423,'Nozzle Air',NULL),
('C','KBN',424,'Gunting Ranting',NULL);

/*Table structure for table `tblkategori` */

DROP TABLE IF EXISTS `tblkategori`;

CREATE TABLE `tblkategori` (
  `kdkategori` char(1) NOT NULL,
  `namakategori` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`kdkategori`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tblkategori` */

insert  into `tblkategori`(`kdkategori`,`namakategori`) values 
('A','MEUBELAIR'),
('B','ELEKTRONIK'),
('C','PERLENGKAPAN-LAIN'),
('D','ALAT-MUSIK'),
('E','ALAT-OLAHRAGA'),
('F','LABORATORIUM'),
('G','TEKNOPRENEUR'),
('H','KENDARAAN');

/*Table structure for table `tblkondisi` */

DROP TABLE IF EXISTS `tblkondisi`;

CREATE TABLE `tblkondisi` (
  `idkondisi` int(11) NOT NULL AUTO_INCREMENT,
  `namakondisi` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idkondisi`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `tblkondisi` */

insert  into `tblkondisi`(`idkondisi`,`namakondisi`) values 
(1,'Baik'),
(2,'Rusak');

/*Table structure for table `tbllokasi` */

DROP TABLE IF EXISTS `tbllokasi`;

CREATE TABLE `tbllokasi` (
  `kdlokasi` char(7) NOT NULL,
  `namalokasi` varchar(50) DEFAULT NULL,
  `luasruangan` varchar(100) DEFAULT NULL,
  `unit` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`kdlokasi`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tbllokasi` */

insert  into `tbllokasi`(`kdlokasi`,`namalokasi`,`luasruangan`,`unit`) values 
('R-00001','Ruang Kepala Sekolah','10m x 10m','S02'),
('R-00002','Ruang Guru','4m x 7m','S02'),
('R-00003','Ruang Teknisi','5m x 5m','P01');

/*Table structure for table `tblmotherboard` */

DROP TABLE IF EXISTS `tblmotherboard`;

CREATE TABLE `tblmotherboard` (
  `idmotherboard` int(11) NOT NULL AUTO_INCREMENT,
  `motherboard` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idmotherboard`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

/*Data for the table `tblmotherboard` */

insert  into `tblmotherboard`(`idmotherboard`,`motherboard`) values 
(1,'Acer Veriton M4610'),
(2,'acer veriton M4620'),
(3,'giga byte G31M-ES2C'),
(4,'acer aspire'),
(5,'MSI-Z490'),
(6,'Acer Aspire TC 605'),
(7,'Gigabyte 945GCM-S2'),
(8,'Acer Aspire TC-705'),
(9,'Gigabyte G31M-ES2C'),
(10,'Lenovo V310-14IKB'),
(11,'Acer Aspire TC-860'),
(12,'Acer Aspire T3-780'),
(13,'Acer Aspire Z24-890 D18W8'),
(14,'Lenovo Yoga 300-11IBR'),
(15,'HP PC 14AN002AX'),
(16,'Acer Aspire V5'),
(17,'gigabyte c246mwu4');

/*Table structure for table `tblos` */

DROP TABLE IF EXISTS `tblos`;

CREATE TABLE `tblos` (
  `idos` int(11) NOT NULL AUTO_INCREMENT,
  `namaos` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`idos`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

/*Data for the table `tblos` */

insert  into `tblos`(`idos`,`namaos`) values 
(1,'Windows XP'),
(2,'Windows 7 32 bit'),
(3,'Windows 7 64 bit'),
(4,'Windows 8 32 bit'),
(5,'Windows 8 64 bit'),
(6,'Windows 10 32 bit'),
(7,'Windows 10 64 bit'),
(8,'Linux Ubuntu 16.04 64 bit'),
(9,'Proxmox'),
(10,'windows server 2008'),
(11,'windows server 2003');

/*Table structure for table `tblpeminjaman` */

DROP TABLE IF EXISTS `tblpeminjaman`;

CREATE TABLE `tblpeminjaman` (
  `nopinjam` int(11) NOT NULL AUTO_INCREMENT,
  `tglpinjam` date DEFAULT NULL,
  `kdbarang` varchar(20) DEFAULT NULL,
  `unit` varchar(20) DEFAULT NULL,
  `nmpeminjam` varchar(100) DEFAULT NULL,
  `unitpeminjam` enum('TK','SD','SMP','SMA','YYS') DEFAULT NULL,
  `acara` text DEFAULT NULL,
  `tglkembali` date DEFAULT NULL,
  `keterangan` text DEFAULT NULL,
  PRIMARY KEY (`nopinjam`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `tblpeminjaman` */

insert  into `tblpeminjaman`(`nopinjam`,`tglpinjam`,`kdbarang`,`unit`,`nmpeminjam`,`unitpeminjam`,`acara`,`tglkembali`,`keterangan`) values 
(1,'2021-11-10','2','P01','Pa Jojon','SD','<p>\n	Webinar</p>\n','2021-11-11',NULL);

/*Table structure for table `tblpengajuan` */

DROP TABLE IF EXISTS `tblpengajuan`;

CREATE TABLE `tblpengajuan` (
  `idpengajuan` int(11) NOT NULL AUTO_INCREMENT,
  `nopengajuan` varchar(13) DEFAULT NULL,
  `tglpengajuan` date DEFAULT NULL,
  `norab` varchar(50) DEFAULT NULL,
  `namaunit` enum('YYS','TTK','SSD','SMP','SMA') DEFAULT NULL,
  `namabarang` varchar(50) DEFAULT NULL,
  `satuan` enum('unit','pcs','pack','set','lusin','dus','roll') DEFAULT NULL,
  `jmlbarang` int(11) DEFAULT NULL,
  `hargasatuan` double DEFAULT NULL,
  `jmlharga` double DEFAULT NULL,
  `keterangan` text DEFAULT NULL,
  `unit` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`idpengajuan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tblpengajuan` */

/*Table structure for table `tblprocessor` */

DROP TABLE IF EXISTS `tblprocessor`;

CREATE TABLE `tblprocessor` (
  `idprocessor` int(11) NOT NULL AUTO_INCREMENT,
  `processor` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idprocessor`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

/*Data for the table `tblprocessor` */

insert  into `tblprocessor`(`idprocessor`,`processor`) values 
(1,'Intel Dual Core'),
(2,'Intel Core 2 Duo'),
(3,'Intel Core i3'),
(4,'Intel Core i5'),
(5,'Intel Core i7'),
(6,'AMD A8-7410'),
(7,'AMD'),
(8,'Intel Celeron'),
(9,'AMD Quad Core');

/*Table structure for table `tblsubkategori` */

DROP TABLE IF EXISTS `tblsubkategori`;

CREATE TABLE `tblsubkategori` (
  `kdkategori` char(1) DEFAULT NULL,
  `kdsubkategori` char(3) NOT NULL,
  `namasubkategori` varchar(50) DEFAULT NULL,
  `ket` text DEFAULT NULL,
  PRIMARY KEY (`kdsubkategori`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tblsubkategori` */

insert  into `tblsubkategori`(`kdkategori`,`kdsubkategori`,`namasubkategori`,`ket`) values 
('C','AKS','Aksesoris',NULL),
('F','ALT','Alat Laboratorium',NULL),
('C','ANG','Alat Angkut',NULL),
('C','ATK','Peralatan ATK',NULL),
('E','ATL','Atletik','<p>\r\n	Perlengkapan Atletik</p>\r\n'),
('E','BAS','Basket','<p>\r\n	Perlengkapan Basket</p>\r\n'),
('E','BDM','Badminton','<p>\r\n	Perlengkapan badminton</p>\r\n'),
('C','BUK','Buku',NULL),
('C','DEK','Dekorasi',NULL),
('A','DIP','Dipan','<p>\n	Ranjang Kasur / Tempat Tidur</p>\n'),
('C','DPR','Dapur','<p>\r\n	Perlengkapan Dapur</p>\r\n'),
('D','ELE','Elektrik','<p>\r\n	Alat Musik Elektrik</p>\r\n'),
('B','ERT','Rumah Tangga','<p>\r\n	Perangkat Rumah Tangga</p>\r\n'),
('G','HAN','Hand Tool','<p>\n	Hand Tool Teknopreneur</p>\n'),
('C','KBN','Alat Perkebunan',NULL),
('C','KBR','Kebersihan','<p>\n	Perlengkapan Kebersihan</p>\n'),
('C','KMD','Kamar Mandi',NULL),
('C','KMR','Kamar','<p>\r\n	Perlengkapan Kamar</p>\r\n'),
('B','KOM','Komputer','<p>\r\n	Perangkat Komputer</p>\r\n'),
('A','KRS','Kursi','<p>\n	Meubel Kursi</p>\n'),
('F','LAB','Aksesoris Laboratorium',NULL),
('A','LMR','Lemari','<p>\n	Meubel Lemari</p>\n'),
('A','LOK','Loker','<p>\r\n	Meubel Lemari Loker</p>\r\n'),
('D','MAN','Manual','<p>\r\n	Alat Musik Manual</p>\r\n'),
('C','MIS','Misa',NULL),
('A','MJA','Meja','<p>\n	Meubel Meja</p>\n'),
('C','MMD','Multimedia',NULL),
('H','MOB','Mobil',NULL),
('H','MOT','Motor',NULL),
('G','MSN','Mesin Teknopreneur',NULL),
('B','MUL','Multimedia','<p>\r\n	Elektronik fungsi Multimedia</p>\r\n'),
('B','OFC','Office','<p>\r\n	Peralatan Perkantoran</p>\r\n'),
('A','PAN','Papan','<p>\r\n	Meubel berupa Papan / Board</p>\r\n'),
('C','PLG','Playground',NULL),
('A','RAK','Rak','<p>\n	Meubel-Rak</p>\n'),
('C','RUA','Ruangan','<p>\r\n	Perlengkapan Ruangan</p>\r\n'),
('E','SBL','Sepak Bola','<p>\r\n	Perlengkapan Sepak Bola</p>\r\n'),
('A','STN','Stand','<p>\n	Standar</p>\n'),
('C','TEK','Teknisi',NULL),
('E','TMJ','Tenis Meja','<p>\r\n	Perlengkapan Tenis Meja</p>\r\n'),
('B','TNS','TEKNISI IT',NULL),
('C','TUK','Alat Pertukangan',NULL),
('E','VOL','Voli','<p>\r\n	Perlengkapan Voli</p>\r\n');

/*Table structure for table `tblsumberdana` */

DROP TABLE IF EXISTS `tblsumberdana`;

CREATE TABLE `tblsumberdana` (
  `kdsumberdana` varchar(3) NOT NULL,
  `nmsumberdana` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`kdsumberdana`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tblsumberdana` */

insert  into `tblsumberdana`(`kdsumberdana`,`nmsumberdana`) values 
('BOS','Bos'),
('SUM','Sumbangan'),
('YYS','Yayasan');

/*Table structure for table `tbltahun` */

DROP TABLE IF EXISTS `tbltahun`;

CREATE TABLE `tbltahun` (
  `idtahun` int(11) NOT NULL AUTO_INCREMENT,
  `namatahun` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`idtahun`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

/*Data for the table `tbltahun` */

insert  into `tbltahun`(`idtahun`,`namatahun`) values 
(1,'2010'),
(2,'2011'),
(3,'2012'),
(4,'2013'),
(5,'2014'),
(6,'2015'),
(7,'2016'),
(8,'2017'),
(9,'2018'),
(10,'2019'),
(11,'2020');

/*Table structure for table `unitypii` */

DROP TABLE IF EXISTS `unitypii`;

CREATE TABLE `unitypii` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `unitcode` varchar(20) NOT NULL,
  `unitname` varchar(200) NOT NULL,
  `address` varchar(200) DEFAULT NULL,
  `website` varchar(25) DEFAULT NULL,
  `email` varchar(25) DEFAULT NULL,
  `phone` varchar(25) DEFAULT NULL,
  `sarpras` varchar(50) DEFAULT NULL,
  `pimpinan` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4;

/*Data for the table `unitypii` */

insert  into `unitypii`(`id`,`unitcode`,`unitname`,`address`,`website`,`email`,`phone`,`sarpras`,`pimpinan`) values 
(1,'P01','YPII Kantor Pusat','Jl. Gang Pinggir No. 62 Semarang','www.ypiigroup.or.id',NULL,'(024) - 3550286','Sr. Laura','Sr. Cendrayani Tan, SDP'),
(2,'S01','YPII kantor Cabang Semarang','Jl. Gang Pinggir No. 62 Semarang','www.ypiigroup.or.id','ypiismg@gmail.com','(024) - 3550286','HJ Mujadi','Dra. Sr. Teresa Nani A., SDP'),
(3,'S02','TK Sinar Matahari','Jl. Gang Pinggir No. 44 Semarang','kebondalem.ypiigroup.or.i','tksinarmatahari@gmail.com','(024) - 3550737\r\n','Sr. Theodorin, SDP','Yoh. Suhermawan, S. Sos, S.Pd.\r\n'),
(4,'S03','SD Kebon Dalem\r\n',NULL,NULL,NULL,NULL,NULL,NULL),
(5,'S04','SMP Kebon Dalem\r\n',NULL,NULL,NULL,NULL,NULL,NULL),
(6,'S05','SMA Kebon Dalem\r\n',NULL,NULL,NULL,NULL,NULL,NULL),
(7,'S06','TK Kebon Dalem 2\r\n',NULL,NULL,NULL,NULL,NULL,NULL),
(8,'S07','SD Kebon Dalem 2\r\n',NULL,NULL,NULL,NULL,NULL,NULL),
(9,'S08','TK Marsudi Utami\r\n',NULL,NULL,NULL,NULL,NULL,NULL),
(10,'S09','SD Marsudi Utami\r\n',NULL,NULL,NULL,NULL,NULL,NULL),
(11,'S10','SMP Marsudi Utami\r\n',NULL,NULL,NULL,NULL,NULL,NULL),
(12,'S11','TK Cahaya Nur\r\n',NULL,NULL,NULL,NULL,NULL,NULL),
(13,'S12','SD Cahaya Nur\r\n',NULL,NULL,NULL,NULL,NULL,NULL),
(14,'S13','TK Cor Yesu\r\n',NULL,NULL,NULL,NULL,NULL,NULL),
(15,'S14','SD Pangudi Utami\r\n',NULL,NULL,NULL,NULL,NULL,NULL),
(16,'S15','School Lab\r\n',NULL,NULL,NULL,NULL,NULL,NULL);

/*Table structure for table `vbarangbos` */

DROP TABLE IF EXISTS `vbarangbos`;

/*!50001 DROP VIEW IF EXISTS `vbarangbos` */;
/*!50001 DROP TABLE IF EXISTS `vbarangbos` */;

/*!50001 CREATE TABLE  `vbarangbos`(
 `idbarang` int(10) unsigned ,
 `kdbarang` varchar(50) ,
 `namabarang` varchar(50) ,
 `namajenis` varchar(50) ,
 `namalokasi` varchar(50) ,
 `namakondisi` varchar(50) ,
 `tglmasuk` date ,
 `harga` double ,
 `kdsumberdana` varchar(3) ,
 `unit` varchar(20) 
)*/;

/*Table structure for table `vbaranglokasi` */

DROP TABLE IF EXISTS `vbaranglokasi`;

/*!50001 DROP VIEW IF EXISTS `vbaranglokasi` */;
/*!50001 DROP TABLE IF EXISTS `vbaranglokasi` */;

/*!50001 CREATE TABLE  `vbaranglokasi`(
 `idjenis` int(11) ,
 `kdlokasi` char(7) ,
 `idkondisi` int(11) 
)*/;

/*Table structure for table `vbarangpinjam` */

DROP TABLE IF EXISTS `vbarangpinjam`;

/*!50001 DROP VIEW IF EXISTS `vbarangpinjam` */;
/*!50001 DROP TABLE IF EXISTS `vbarangpinjam` */;

/*!50001 CREATE TABLE  `vbarangpinjam`(
 `nopinjam` int(11) ,
 `tglpinjam` date ,
 `kdbarang` varchar(20) ,
 `nmpeminjam` varchar(100) ,
 `unitpeminjam` enum('TK','SD','SMP','SMA','YYS') ,
 `acara` text ,
 `tglkembali` date ,
 `keterangan` text ,
 `unit` varchar(20) 
)*/;

/*Table structure for table `vbarangrusak` */

DROP TABLE IF EXISTS `vbarangrusak`;

/*!50001 DROP VIEW IF EXISTS `vbarangrusak` */;
/*!50001 DROP TABLE IF EXISTS `vbarangrusak` */;

/*!50001 CREATE TABLE  `vbarangrusak`(
 `idbarang` int(10) unsigned ,
 `namajenis` varchar(50) ,
 `kdbarang` varchar(50) ,
 `namabarang` varchar(50) ,
 `namalokasi` varchar(50) ,
 `namakondisi` varchar(50) ,
 `unit` varchar(20) 
)*/;

/*Table structure for table `vbarangsum` */

DROP TABLE IF EXISTS `vbarangsum`;

/*!50001 DROP VIEW IF EXISTS `vbarangsum` */;
/*!50001 DROP TABLE IF EXISTS `vbarangsum` */;

/*!50001 CREATE TABLE  `vbarangsum`(
 `idbarang` int(10) unsigned ,
 `kdbarang` varchar(50) ,
 `namabarang` varchar(50) ,
 `namajenis` varchar(50) ,
 `namalokasi` varchar(50) ,
 `namakondisi` varchar(50) ,
 `tglmasuk` date ,
 `harga` double ,
 `kdsumberdana` varchar(3) ,
 `unit` varchar(20) 
)*/;

/*Table structure for table `vbarangtahun` */

DROP TABLE IF EXISTS `vbarangtahun`;

/*!50001 DROP VIEW IF EXISTS `vbarangtahun` */;
/*!50001 DROP TABLE IF EXISTS `vbarangtahun` */;

/*!50001 CREATE TABLE  `vbarangtahun`(
 `tahun` int(4) 
)*/;

/*Table structure for table `vbarangyys` */

DROP TABLE IF EXISTS `vbarangyys`;

/*!50001 DROP VIEW IF EXISTS `vbarangyys` */;
/*!50001 DROP TABLE IF EXISTS `vbarangyys` */;

/*!50001 CREATE TABLE  `vbarangyys`(
 `idbarang` int(10) unsigned ,
 `kdbarang` varchar(50) ,
 `namabarang` varchar(50) ,
 `namajenis` varchar(50) ,
 `namalokasi` varchar(50) ,
 `namakondisi` varchar(50) ,
 `tglmasuk` date ,
 `harga` double ,
 `kdsumberdana` varchar(3) ,
 `unit` varchar(20) 
)*/;

/*Table structure for table `vlokasi` */

DROP TABLE IF EXISTS `vlokasi`;

/*!50001 DROP VIEW IF EXISTS `vlokasi` */;
/*!50001 DROP TABLE IF EXISTS `vlokasi` */;

/*!50001 CREATE TABLE  `vlokasi`(
 `kdlokasi` char(7) ,
 `namalokasi` varchar(50) ,
 `luasruangan` varchar(100) ,
 `unit` varchar(20) 
)*/;

/*Table structure for table `vperkategori` */

DROP TABLE IF EXISTS `vperkategori`;

/*!50001 DROP VIEW IF EXISTS `vperkategori` */;
/*!50001 DROP TABLE IF EXISTS `vperkategori` */;

/*!50001 CREATE TABLE  `vperkategori`(
 `kdkategori` char(1) ,
 `namakategori` varchar(50) 
)*/;

/*Table structure for table `vsumbarang` */

DROP TABLE IF EXISTS `vsumbarang`;

/*!50001 DROP VIEW IF EXISTS `vsumbarang` */;
/*!50001 DROP TABLE IF EXISTS `vsumbarang` */;

/*!50001 CREATE TABLE  `vsumbarang`(
 `kdkategori` varchar(50) ,
 `Jenis` varchar(50) ,
 `unit` varchar(20) ,
 `R-001` bigint(21) ,
 `R-002` bigint(21) ,
 `R-003` bigint(21) ,
 `R-004` bigint(21) ,
 `R-005` bigint(21) ,
 `R-006` bigint(21) ,
 `R-007` bigint(21) ,
 `R-008` bigint(21) ,
 `R-009` bigint(21) ,
 `R-010` bigint(21) ,
 `R-011` bigint(21) ,
 `R-012` bigint(21) ,
 `R-013` bigint(21) ,
 `R-014` bigint(21) ,
 `R-015` bigint(21) ,
 `R-016` bigint(21) ,
 `R-017` bigint(21) ,
 `R-018` bigint(21) ,
 `R-019` bigint(21) ,
 `R-020` bigint(21) ,
 `R-021` bigint(21) ,
 `R-022` bigint(21) ,
 `R-023` bigint(21) ,
 `R-024` bigint(21) ,
 `R-025` bigint(21) ,
 `R-026` bigint(21) ,
 `R-027` bigint(21) ,
 `R-028` bigint(21) ,
 `R-029` bigint(21) ,
 `R-030` bigint(21) ,
 `R-031` bigint(21) ,
 `R-032` bigint(21) ,
 `R-033` bigint(21) ,
 `R-034` bigint(21) ,
 `R-035` bigint(21) ,
 `R-036` bigint(21) ,
 `R-037` bigint(21) ,
 `R-038` bigint(21) ,
 `R-039` bigint(21) ,
 `R-040` bigint(21) ,
 `R-041` bigint(21) ,
 `R-042` bigint(21) ,
 `R-043` bigint(21) ,
 `R-044` bigint(21) ,
 `R-045` bigint(21) ,
 `R-046` bigint(21) ,
 `R-047` bigint(21) ,
 `R-048` bigint(21) ,
 `R-049` bigint(21) ,
 `R-050` bigint(21) ,
 `R-051` bigint(21) ,
 `R-052` bigint(21) ,
 `R-053` bigint(21) ,
 `R-054` bigint(21) ,
 `R-055` bigint(21) ,
 `R-056` bigint(21) ,
 `R-057` bigint(21) ,
 `R-058` bigint(21) ,
 `R-059` bigint(21) ,
 `R-060` bigint(21) ,
 `R-061` bigint(21) ,
 `R-062` bigint(21) ,
 `R-063` bigint(21) ,
 `R-064` bigint(21) ,
 `R-065` bigint(21) ,
 `R-066` bigint(21) ,
 `R-067` bigint(21) ,
 `R-068` bigint(21) 
)*/;

/*Table structure for table `vtglpengajuan` */

DROP TABLE IF EXISTS `vtglpengajuan`;

/*!50001 DROP VIEW IF EXISTS `vtglpengajuan` */;
/*!50001 DROP TABLE IF EXISTS `vtglpengajuan` */;

/*!50001 CREATE TABLE  `vtglpengajuan`(
 `tglpengajuan` date 
)*/;

/*View structure for view vbarangbos */

/*!50001 DROP TABLE IF EXISTS `vbarangbos` */;
/*!50001 DROP VIEW IF EXISTS `vbarangbos` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vbarangbos` AS (select `tblbarang`.`idbarang` AS `idbarang`,`tblbarang`.`kdbarang` AS `kdbarang`,`tblbarang`.`namabarang` AS `namabarang`,`tbljenis`.`namajenis` AS `namajenis`,`tbllokasi`.`namalokasi` AS `namalokasi`,`tblkondisi`.`namakondisi` AS `namakondisi`,`tblbarang`.`tglmasuk` AS `tglmasuk`,`tblbarang`.`harga` AS `harga`,`tblbarang`.`kdsumberdana` AS `kdsumberdana`,`tblbarang`.`unit` AS `unit` from (((`tblbarang` join `tbljenis` on(`tblbarang`.`idjenis` = `tbljenis`.`idjenis`)) join `tbllokasi` on(`tblbarang`.`kdlokasi` = `tbllokasi`.`kdlokasi`)) join `tblkondisi` on(`tblbarang`.`idkondisi` = `tblkondisi`.`idkondisi`)) where `tblbarang`.`kdsumberdana` = 'BOS') */;

/*View structure for view vbaranglokasi */

/*!50001 DROP TABLE IF EXISTS `vbaranglokasi` */;
/*!50001 DROP VIEW IF EXISTS `vbaranglokasi` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vbaranglokasi` AS (select `tblbarang`.`idjenis` AS `idjenis`,`tblbarang`.`kdlokasi` AS `kdlokasi`,`tblbarang`.`idkondisi` AS `idkondisi` from `tblbarang`) */;

/*View structure for view vbarangpinjam */

/*!50001 DROP TABLE IF EXISTS `vbarangpinjam` */;
/*!50001 DROP VIEW IF EXISTS `vbarangpinjam` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vbarangpinjam` AS (select `tblpeminjaman`.`nopinjam` AS `nopinjam`,`tblpeminjaman`.`tglpinjam` AS `tglpinjam`,`tblpeminjaman`.`kdbarang` AS `kdbarang`,`tblpeminjaman`.`nmpeminjam` AS `nmpeminjam`,`tblpeminjaman`.`unitpeminjam` AS `unitpeminjam`,`tblpeminjaman`.`acara` AS `acara`,`tblpeminjaman`.`tglkembali` AS `tglkembali`,`tblpeminjaman`.`keterangan` AS `keterangan`,`tblpeminjaman`.`unit` AS `unit` from `tblpeminjaman` where `tblpeminjaman`.`tglkembali` is null) */;

/*View structure for view vbarangrusak */

/*!50001 DROP TABLE IF EXISTS `vbarangrusak` */;
/*!50001 DROP VIEW IF EXISTS `vbarangrusak` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vbarangrusak` AS select `tblbarang`.`idbarang` AS `idbarang`,`tbljenis`.`namajenis` AS `namajenis`,`tblbarang`.`kdbarang` AS `kdbarang`,`tblbarang`.`namabarang` AS `namabarang`,`tbllokasi`.`namalokasi` AS `namalokasi`,`tblkondisi`.`namakondisi` AS `namakondisi`,`tblbarang`.`unit` AS `unit` from (((`tblbarang` join `tblkondisi` on(`tblbarang`.`idkondisi` = `tblkondisi`.`idkondisi`)) join `tbllokasi` on(`tblbarang`.`kdlokasi` = `tbllokasi`.`kdlokasi`)) join `tbljenis` on(`tblbarang`.`idjenis` = `tbljenis`.`idjenis`)) where `tblbarang`.`idkondisi` <> 1 */;

/*View structure for view vbarangsum */

/*!50001 DROP TABLE IF EXISTS `vbarangsum` */;
/*!50001 DROP VIEW IF EXISTS `vbarangsum` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vbarangsum` AS (select `tblbarang`.`idbarang` AS `idbarang`,`tblbarang`.`kdbarang` AS `kdbarang`,`tblbarang`.`namabarang` AS `namabarang`,`tbljenis`.`namajenis` AS `namajenis`,`tbllokasi`.`namalokasi` AS `namalokasi`,`tblkondisi`.`namakondisi` AS `namakondisi`,`tblbarang`.`tglmasuk` AS `tglmasuk`,`tblbarang`.`harga` AS `harga`,`tblbarang`.`kdsumberdana` AS `kdsumberdana`,`tblbarang`.`unit` AS `unit` from (((`tblbarang` join `tbljenis` on(`tblbarang`.`idjenis` = `tbljenis`.`idjenis`)) join `tbllokasi` on(`tblbarang`.`kdlokasi` = `tbllokasi`.`kdlokasi`)) join `tblkondisi` on(`tblbarang`.`idkondisi` = `tblkondisi`.`idkondisi`)) where `tblbarang`.`kdsumberdana` = 'SUM') */;

/*View structure for view vbarangtahun */

/*!50001 DROP TABLE IF EXISTS `vbarangtahun` */;
/*!50001 DROP VIEW IF EXISTS `vbarangtahun` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vbarangtahun` AS (select year(`tblbarang`.`tglmasuk`) AS `tahun` from `tblbarang` where `tblbarang`.`tglmasuk` <> 'NULL' and `tblbarang`.`harga` <> 'NULL' group by year(`tblbarang`.`tglmasuk`) order by year(`tblbarang`.`tglmasuk`) desc) */;

/*View structure for view vbarangyys */

/*!50001 DROP TABLE IF EXISTS `vbarangyys` */;
/*!50001 DROP VIEW IF EXISTS `vbarangyys` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vbarangyys` AS (select `tblbarang`.`idbarang` AS `idbarang`,`tblbarang`.`kdbarang` AS `kdbarang`,`tblbarang`.`namabarang` AS `namabarang`,`tbljenis`.`namajenis` AS `namajenis`,`tbllokasi`.`namalokasi` AS `namalokasi`,`tblkondisi`.`namakondisi` AS `namakondisi`,`tblbarang`.`tglmasuk` AS `tglmasuk`,`tblbarang`.`harga` AS `harga`,`tblbarang`.`kdsumberdana` AS `kdsumberdana`,`tblbarang`.`unit` AS `unit` from (((`tblbarang` join `tbljenis` on(`tblbarang`.`idjenis` = `tbljenis`.`idjenis`)) join `tbllokasi` on(`tblbarang`.`kdlokasi` = `tbllokasi`.`kdlokasi`)) join `tblkondisi` on(`tblbarang`.`idkondisi` = `tblkondisi`.`idkondisi`)) where `tblbarang`.`kdsumberdana` = 'YYS') */;

/*View structure for view vlokasi */

/*!50001 DROP TABLE IF EXISTS `vlokasi` */;
/*!50001 DROP VIEW IF EXISTS `vlokasi` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vlokasi` AS (select `tblbarang`.`kdlokasi` AS `kdlokasi`,`tbllokasi`.`namalokasi` AS `namalokasi`,`tbllokasi`.`luasruangan` AS `luasruangan`,`tblbarang`.`unit` AS `unit` from (`tblbarang` join `tbllokasi` on(`tbllokasi`.`kdlokasi` = `tblbarang`.`kdlokasi`)) group by `tblbarang`.`kdlokasi`) */;

/*View structure for view vperkategori */

/*!50001 DROP TABLE IF EXISTS `vperkategori` */;
/*!50001 DROP VIEW IF EXISTS `vperkategori` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vperkategori` AS (select `tblbarang`.`kdkategori` AS `kdkategori`,`tblkategori`.`namakategori` AS `namakategori` from (`tblbarang` join `tblkategori` on(`tblbarang`.`kdkategori` = `tblkategori`.`kdkategori`)) group by `tblbarang`.`kdkategori`) */;

/*View structure for view vsumbarang */

/*!50001 DROP TABLE IF EXISTS `vsumbarang` */;
/*!50001 DROP VIEW IF EXISTS `vsumbarang` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vsumbarang` AS select `tblkategori`.`namakategori` AS `kdkategori`,`tbljenis`.`namajenis` AS `Jenis`,`tblbarang`.`unit` AS `unit`,count(if(`tblbarang`.`kdlokasi` = 'R-001',`tblbarang`.`idjenis`,NULL)) AS `R-001`,count(if(`tblbarang`.`kdlokasi` = 'R-002',`tblbarang`.`idjenis`,NULL)) AS `R-002`,count(if(`tblbarang`.`kdlokasi` = 'R-003',`tblbarang`.`idjenis`,NULL)) AS `R-003`,count(if(`tblbarang`.`kdlokasi` = 'R-004',`tblbarang`.`idjenis`,NULL)) AS `R-004`,count(if(`tblbarang`.`kdlokasi` = 'R-005',`tblbarang`.`idjenis`,NULL)) AS `R-005`,count(if(`tblbarang`.`kdlokasi` = 'R-006',`tblbarang`.`idjenis`,NULL)) AS `R-006`,count(if(`tblbarang`.`kdlokasi` = 'R-007',`tblbarang`.`idjenis`,NULL)) AS `R-007`,count(if(`tblbarang`.`kdlokasi` = 'R-008',`tblbarang`.`idjenis`,NULL)) AS `R-008`,count(if(`tblbarang`.`kdlokasi` = 'R-009',`tblbarang`.`idjenis`,NULL)) AS `R-009`,count(if(`tblbarang`.`kdlokasi` = 'R-010',`tblbarang`.`idjenis`,NULL)) AS `R-010`,count(if(`tblbarang`.`kdlokasi` = 'R-011',`tblbarang`.`idjenis`,NULL)) AS `R-011`,count(if(`tblbarang`.`kdlokasi` = 'R-012',`tblbarang`.`idjenis`,NULL)) AS `R-012`,count(if(`tblbarang`.`kdlokasi` = 'R-013',`tblbarang`.`idjenis`,NULL)) AS `R-013`,count(if(`tblbarang`.`kdlokasi` = 'R-014',`tblbarang`.`idjenis`,NULL)) AS `R-014`,count(if(`tblbarang`.`kdlokasi` = 'R-015',`tblbarang`.`idjenis`,NULL)) AS `R-015`,count(if(`tblbarang`.`kdlokasi` = 'R-016',`tblbarang`.`idjenis`,NULL)) AS `R-016`,count(if(`tblbarang`.`kdlokasi` = 'R-017',`tblbarang`.`idjenis`,NULL)) AS `R-017`,count(if(`tblbarang`.`kdlokasi` = 'R-018',`tblbarang`.`idjenis`,NULL)) AS `R-018`,count(if(`tblbarang`.`kdlokasi` = 'R-019',`tblbarang`.`idjenis`,NULL)) AS `R-019`,count(if(`tblbarang`.`kdlokasi` = 'R-020',`tblbarang`.`idjenis`,NULL)) AS `R-020`,count(if(`tblbarang`.`kdlokasi` = 'R-021',`tblbarang`.`idjenis`,NULL)) AS `R-021`,count(if(`tblbarang`.`kdlokasi` = 'R-022',`tblbarang`.`idjenis`,NULL)) AS `R-022`,count(if(`tblbarang`.`kdlokasi` = 'R-023',`tblbarang`.`idjenis`,NULL)) AS `R-023`,count(if(`tblbarang`.`kdlokasi` = 'R-024',`tblbarang`.`idjenis`,NULL)) AS `R-024`,count(if(`tblbarang`.`kdlokasi` = 'R-025',`tblbarang`.`idjenis`,NULL)) AS `R-025`,count(if(`tblbarang`.`kdlokasi` = 'R-026',`tblbarang`.`idjenis`,NULL)) AS `R-026`,count(if(`tblbarang`.`kdlokasi` = 'R-027',`tblbarang`.`idjenis`,NULL)) AS `R-027`,count(if(`tblbarang`.`kdlokasi` = 'R-028',`tblbarang`.`idjenis`,NULL)) AS `R-028`,count(if(`tblbarang`.`kdlokasi` = 'R-029',`tblbarang`.`idjenis`,NULL)) AS `R-029`,count(if(`tblbarang`.`kdlokasi` = 'R-030',`tblbarang`.`idjenis`,NULL)) AS `R-030`,count(if(`tblbarang`.`kdlokasi` = 'R-031',`tblbarang`.`idjenis`,NULL)) AS `R-031`,count(if(`tblbarang`.`kdlokasi` = 'R-032',`tblbarang`.`idjenis`,NULL)) AS `R-032`,count(if(`tblbarang`.`kdlokasi` = 'R-033',`tblbarang`.`idjenis`,NULL)) AS `R-033`,count(if(`tblbarang`.`kdlokasi` = 'R-034',`tblbarang`.`idjenis`,NULL)) AS `R-034`,count(if(`tblbarang`.`kdlokasi` = 'R-035',`tblbarang`.`idjenis`,NULL)) AS `R-035`,count(if(`tblbarang`.`kdlokasi` = 'R-036',`tblbarang`.`idjenis`,NULL)) AS `R-036`,count(if(`tblbarang`.`kdlokasi` = 'R-037',`tblbarang`.`idjenis`,NULL)) AS `R-037`,count(if(`tblbarang`.`kdlokasi` = 'R-038',`tblbarang`.`idjenis`,NULL)) AS `R-038`,count(if(`tblbarang`.`kdlokasi` = 'R-039',`tblbarang`.`idjenis`,NULL)) AS `R-039`,count(if(`tblbarang`.`kdlokasi` = 'R-040',`tblbarang`.`idjenis`,NULL)) AS `R-040`,count(if(`tblbarang`.`kdlokasi` = 'R-041',`tblbarang`.`idjenis`,NULL)) AS `R-041`,count(if(`tblbarang`.`kdlokasi` = 'R-042',`tblbarang`.`idjenis`,NULL)) AS `R-042`,count(if(`tblbarang`.`kdlokasi` = 'R-043',`tblbarang`.`idjenis`,NULL)) AS `R-043`,count(if(`tblbarang`.`kdlokasi` = 'R-044',`tblbarang`.`idjenis`,NULL)) AS `R-044`,count(if(`tblbarang`.`kdlokasi` = 'R-045',`tblbarang`.`idjenis`,NULL)) AS `R-045`,count(if(`tblbarang`.`kdlokasi` = 'R-046',`tblbarang`.`idjenis`,NULL)) AS `R-046`,count(if(`tblbarang`.`kdlokasi` = 'R-047',`tblbarang`.`idjenis`,NULL)) AS `R-047`,count(if(`tblbarang`.`kdlokasi` = 'R-048',`tblbarang`.`idjenis`,NULL)) AS `R-048`,count(if(`tblbarang`.`kdlokasi` = 'R-049',`tblbarang`.`idjenis`,NULL)) AS `R-049`,count(if(`tblbarang`.`kdlokasi` = 'R-050',`tblbarang`.`idjenis`,NULL)) AS `R-050`,count(if(`tblbarang`.`kdlokasi` = 'R-051',`tblbarang`.`idjenis`,NULL)) AS `R-051`,count(if(`tblbarang`.`kdlokasi` = 'R-052',`tblbarang`.`idjenis`,NULL)) AS `R-052`,count(if(`tblbarang`.`kdlokasi` = 'R-053',`tblbarang`.`idjenis`,NULL)) AS `R-053`,count(if(`tblbarang`.`kdlokasi` = 'R-054',`tblbarang`.`idjenis`,NULL)) AS `R-054`,count(if(`tblbarang`.`kdlokasi` = 'R-055',`tblbarang`.`idjenis`,NULL)) AS `R-055`,count(if(`tblbarang`.`kdlokasi` = 'R-056',`tblbarang`.`idjenis`,NULL)) AS `R-056`,count(if(`tblbarang`.`kdlokasi` = 'R-057',`tblbarang`.`idjenis`,NULL)) AS `R-057`,count(if(`tblbarang`.`kdlokasi` = 'R-058',`tblbarang`.`idjenis`,NULL)) AS `R-058`,count(if(`tblbarang`.`kdlokasi` = 'R-059',`tblbarang`.`idjenis`,NULL)) AS `R-059`,count(if(`tblbarang`.`kdlokasi` = 'R-060',`tblbarang`.`idjenis`,NULL)) AS `R-060`,count(if(`tblbarang`.`kdlokasi` = 'R-061',`tblbarang`.`idjenis`,NULL)) AS `R-061`,count(if(`tblbarang`.`kdlokasi` = 'R-062',`tblbarang`.`idjenis`,NULL)) AS `R-062`,count(if(`tblbarang`.`kdlokasi` = 'R-063',`tblbarang`.`idjenis`,NULL)) AS `R-063`,count(if(`tblbarang`.`kdlokasi` = 'R-064',`tblbarang`.`idjenis`,NULL)) AS `R-064`,count(if(`tblbarang`.`kdlokasi` = 'R-065',`tblbarang`.`idjenis`,NULL)) AS `R-065`,count(if(`tblbarang`.`kdlokasi` = 'R-066',`tblbarang`.`idjenis`,NULL)) AS `R-066`,count(if(`tblbarang`.`kdlokasi` = 'R-067',`tblbarang`.`idjenis`,NULL)) AS `R-067`,count(if(`tblbarang`.`kdlokasi` = 'R-068',`tblbarang`.`idjenis`,NULL)) AS `R-068` from ((`tblbarang` join `tbljenis` on(`tblbarang`.`idjenis` = `tbljenis`.`idjenis`)) join `tblkategori` on(`tblbarang`.`kdkategori` = `tblkategori`.`kdkategori`)) group by `tblbarang`.`idjenis` order by `tblbarang`.`kdkategori` */;

/*View structure for view vtglpengajuan */

/*!50001 DROP TABLE IF EXISTS `vtglpengajuan` */;
/*!50001 DROP VIEW IF EXISTS `vtglpengajuan` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vtglpengajuan` AS (select `tblpengajuan`.`tglpengajuan` AS `tglpengajuan` from `tblpengajuan` group by `tblpengajuan`.`tglpengajuan` order by `tblpengajuan`.`tglpengajuan` desc) */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
