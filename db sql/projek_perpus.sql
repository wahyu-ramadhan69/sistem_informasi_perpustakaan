/*
SQLyog Ultimate v12.5.1 (64 bit)
MySQL - 10.4.14-MariaDB : Database - projek_perpus
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`projek_perpus` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `projek_perpus`;

/*Table structure for table `tbl_biaya_denda` */

DROP TABLE IF EXISTS `tbl_biaya_denda`;

CREATE TABLE `tbl_biaya_denda` (
  `id_biaya_denda` int(11) NOT NULL AUTO_INCREMENT,
  `harga_denda` varchar(255) NOT NULL,
  `stat` varchar(255) NOT NULL,
  `tgl_tetap` varchar(255) NOT NULL,
  PRIMARY KEY (`id_biaya_denda`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4;

/*Data for the table `tbl_biaya_denda` */

insert  into `tbl_biaya_denda`(`id_biaya_denda`,`harga_denda`,`stat`,`tgl_tetap`) values 
(1,'4000','Aktif','2021-06-01'),
(11,'5600','Tidak Aktif','2021-06-01');

/*Table structure for table `tbl_buku` */

DROP TABLE IF EXISTS `tbl_buku`;

CREATE TABLE `tbl_buku` (
  `id_buku` int(11) NOT NULL AUTO_INCREMENT,
  `buku_id` varchar(255) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `id_rak` int(11) NOT NULL,
  `isbn` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `penerbit` varchar(255) DEFAULT NULL,
  `pengarang` varchar(255) DEFAULT NULL,
  `thn_buku` varchar(255) DEFAULT NULL,
  `isi` text DEFAULT NULL,
  `jml` int(11) DEFAULT NULL,
  `tgl_masuk` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_buku`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4;

/*Data for the table `tbl_buku` */

insert  into `tbl_buku`(`id_buku`,`buku_id`,`id_kategori`,`id_rak`,`isbn`,`title`,`penerbit`,`pengarang`,`thn_buku`,`isi`,`jml`,`tgl_masuk`) values 
(8,'BK008',2,1,'132-123-234-231','CARA MUDAH BELAJAR PEMROGRAMAN C++','INFORMATIKA BANDUNG','BUDI RAHARJO ','2012','kontlloo',23,'2021-06-07 16:56:44'),
(11,'BK009',3,1,'3475893479','cara buat anak part 2','jepun .com','sugio','2020','bangkee',12,'2021-06-07 16:56:27');

/*Table structure for table `tbl_denda` */

DROP TABLE IF EXISTS `tbl_denda`;

CREATE TABLE `tbl_denda` (
  `id_denda` int(11) NOT NULL AUTO_INCREMENT,
  `pinjam_id` varchar(255) NOT NULL,
  `denda` varchar(255) NOT NULL,
  `lama_waktu` int(11) NOT NULL,
  `tgl_denda` varchar(255) NOT NULL,
  PRIMARY KEY (`id_denda`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;

/*Data for the table `tbl_denda` */

insert  into `tbl_denda`(`id_denda`,`pinjam_id`,`denda`,`lama_waktu`,`tgl_denda`) values 
(5,'PJ009','0',0,'2020-05-20'),
(6,'PJ0011','0',0,'2021-06-01'),
(7,'PJ0012','0',0,'2021-06-01'),
(8,'PJ001','0',0,'2021-06-01');

/*Table structure for table `tbl_kategori` */

DROP TABLE IF EXISTS `tbl_kategori`;

CREATE TABLE `tbl_kategori` (
  `id_kategori` int(11) NOT NULL AUTO_INCREMENT,
  `nama_kategori` varchar(255) NOT NULL,
  PRIMARY KEY (`id_kategori`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

/*Data for the table `tbl_kategori` */

insert  into `tbl_kategori`(`id_kategori`,`nama_kategori`) values 
(2,'Pemrograman'),
(3,'biologi');

/*Table structure for table `tbl_login` */

DROP TABLE IF EXISTS `tbl_login`;

CREATE TABLE `tbl_login` (
  `id_login` int(11) NOT NULL AUTO_INCREMENT,
  `anggota_id` varchar(255) NOT NULL,
  `user` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `level` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `tempat_lahir` varchar(255) NOT NULL,
  `tgl_lahir` varchar(255) NOT NULL,
  `jenkel` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `telepon` varchar(25) NOT NULL,
  `email` varchar(255) NOT NULL,
  `tgl_bergabung` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL,
  PRIMARY KEY (`id_login`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4;

/*Data for the table `tbl_login` */

insert  into `tbl_login`(`id_login`,`anggota_id`,`user`,`pass`,`level`,`nama`,`tempat_lahir`,`tgl_lahir`,`jenkel`,`alamat`,`telepon`,`email`,`tgl_bergabung`,`foto`) values 
(4,'AG003','irvan','202cb962ac59075b964b07152d234b70','Anggota','irvant','bengkuluuu','2000-06-01','Laki-Laki','bengkuluuuu','0823784728364','irvan123@gmail.com','2021-06-01','user_1622552708.png'),
(5,'AG005','charli','202cb962ac59075b964b07152d234b70','Petugas','charli','bengkullu','2000-11-02','Laki-Laki','kemumu','089327837234','charli@gmail.com','2021-06-01','user_1622552851.jpg'),
(7,'AG006','jauh','202cb962ac59075b964b07152d234b70','Petugas','joni','bengkulu','2021-06-07','Laki-Laki','euwhfyewgf','939485934','wahyu@gmail.com','2021-06-07','user_1623058689.jpeg'),
(8,'AG008','2u3iy4r2u3','e5f300ff9997e150e793a954e7efb226','Petugas','fgyewgu','hfwgeyfgyweg','2021-06-08','Laki-Laki','fywegyfwe','04569084569','wbjhbdwhb@gmail.com','2021-06-07','user_1623058788'),
(9,'AG009','jasdja','ad7544e47c9f480453c817e1f5d5c90b','Petugas','rono','behu','2021-06-09','Laki-Laki','hfuweuifwe','903593809453','hagsg@gmail.com','2021-06-07','user_1623062167'),
(12,'AG0010','charli123','202cb962ac59075b964b07152d234b70','Petugas','charli rahmat','Bengkulu','2021-06-10','Laki-Laki','jauhhh','09345893453','charlirahmat1@gmail.com','2021-06-11','user_1623380369'),
(13,'AG0013','wahyu123','54b7a3221f83ca9d17f3fb072738904f','Petugas','wahyu','bengkulu','2021-06-07','Laki-Laki','jauhhh','086745234234','wahyu.ramadhani6969@gmail.com','2021-06-11','user_1623381170');

/*Table structure for table `tbl_pinjam` */

DROP TABLE IF EXISTS `tbl_pinjam`;

CREATE TABLE `tbl_pinjam` (
  `id_pinjam` int(11) NOT NULL AUTO_INCREMENT,
  `pinjam_id` varchar(255) NOT NULL,
  `anggota_id` varchar(255) NOT NULL,
  `buku_id` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `tgl_pinjam` varchar(255) NOT NULL,
  `lama_pinjam` int(11) NOT NULL,
  `tgl_balik` varchar(255) NOT NULL,
  `tgl_kembali` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_pinjam`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4;

/*Data for the table `tbl_pinjam` */

insert  into `tbl_pinjam`(`id_pinjam`,`pinjam_id`,`anggota_id`,`buku_id`,`status`,`tgl_pinjam`,`lama_pinjam`,`tgl_balik`,`tgl_kembali`) values 
(14,'PJ001','AG005','BK008','Di Kembalikan','2021-05-01',2,'2021-06-03','2021-06-01'),
(15,'PJ0015','AG005','BK008','Dipinjam','2021-05-01',2,'2021-05-03','0'),
(16,'PJ0016','AG005','BK008','Dipinjam','2021-06-01',2,'2021-05-29','0');

/*Table structure for table `tbl_rak` */

DROP TABLE IF EXISTS `tbl_rak`;

CREATE TABLE `tbl_rak` (
  `id_rak` int(11) NOT NULL AUTO_INCREMENT,
  `nama_rak` varchar(255) NOT NULL,
  PRIMARY KEY (`id_rak`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

/*Data for the table `tbl_rak` */

insert  into `tbl_rak`(`id_rak`,`nama_rak`) values 
(1,'Rak Buku 1');

/*Table structure for table `user_token` */

DROP TABLE IF EXISTS `user_token`;

CREATE TABLE `user_token` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(128) DEFAULT NULL,
  `token` varchar(128) DEFAULT NULL,
  `tanggal_dibuat` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4;

/*Data for the table `user_token` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
