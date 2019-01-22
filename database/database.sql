/*
SQLyog Ultimate v12.4.3 (64 bit)
MySQL - 10.1.36-MariaDB : Database - iframe
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`iframe` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `iframe`;

/*Table structure for table `cart` */

DROP TABLE IF EXISTS `cart`;

CREATE TABLE `cart` (
  `id_produk` varchar(50) NOT NULL,
  `id_paket` varchar(50) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `potongan` double NOT NULL,
  `biaya` double NOT NULL,
  `subtotal` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `cart` */

insert  into `cart`(`id_produk`,`id_paket`,`jumlah`,`potongan`,`biaya`,`subtotal`) values 
('1','1',1,1,1,1);

/*Table structure for table `customer` */

DROP TABLE IF EXISTS `customer`;

CREATE TABLE `customer` (
  `id_customer` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `no_id` int(11) NOT NULL,
  `jenis_id` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `no_hp` int(11) NOT NULL,
  PRIMARY KEY (`id_customer`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `customer` */

/*Table structure for table `det_pembayaran` */

DROP TABLE IF EXISTS `det_pembayaran`;

CREATE TABLE `det_pembayaran` (
  `id_det_pembayaran` int(11) NOT NULL,
  `id_pembayaran` varchar(50) NOT NULL,
  `status` enum('Lunas','Belum Lunas') NOT NULL,
  `subtotal` int(11) NOT NULL,
  PRIMARY KEY (`id_det_pembayaran`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `det_pembayaran` */

/*Table structure for table `det_sewa` */

DROP TABLE IF EXISTS `det_sewa`;

CREATE TABLE `det_sewa` (
  `id_det_sewa` int(11) NOT NULL,
  `id_sewa` varchar(50) NOT NULL,
  `id_produk` varchar(50) NOT NULL,
  `id_paket` varchar(50) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `potongan` double NOT NULL,
  `biaya` double NOT NULL,
  `subtotal` double NOT NULL,
  `status` enum('Booking','Pinjam','Kembali','Batal') NOT NULL DEFAULT 'Booking',
  PRIMARY KEY (`id_det_sewa`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `det_sewa` */

/*Table structure for table `harga` */

DROP TABLE IF EXISTS `harga`;

CREATE TABLE `harga` (
  `id_harga` varchar(50) NOT NULL,
  `id_produk` varchar(50) NOT NULL,
  `id_paket` varchar(50) NOT NULL,
  `harga` int(11) NOT NULL,
  PRIMARY KEY (`id_harga`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `harga` */

/*Table structure for table `karyawan` */

DROP TABLE IF EXISTS `karyawan`;

CREATE TABLE `karyawan` (
  `id_karyawan` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `id_user` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `no_hp` int(11) NOT NULL,
  `jabatan` varchar(50) NOT NULL,
  PRIMARY KEY (`id_karyawan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `karyawan` */

/*Table structure for table `kategori` */

DROP TABLE IF EXISTS `kategori`;

CREATE TABLE `kategori` (
  `id_kategori` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  PRIMARY KEY (`id_kategori`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `kategori` */

/*Table structure for table `paket` */

DROP TABLE IF EXISTS `paket`;

CREATE TABLE `paket` (
  `id_paket` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `durasi` varchar(50) NOT NULL,
  PRIMARY KEY (`id_paket`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `paket` */

/*Table structure for table `pembayaran` */

DROP TABLE IF EXISTS `pembayaran`;

CREATE TABLE `pembayaran` (
  `id_pembayaran` varchar(50) NOT NULL,
  `id_sewa` varchar(50) NOT NULL,
  `subtotal` int(11) NOT NULL,
  `jumlah_bayar` int(11) NOT NULL,
  `jenis_bayar` int(11) NOT NULL,
  `status` enum('Lunas','Belum Lunas') NOT NULL,
  PRIMARY KEY (`id_pembayaran`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `pembayaran` */

/*Table structure for table `produk` */

DROP TABLE IF EXISTS `produk`;

CREATE TABLE `produk` (
  `id_produk` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `id_kategori` varchar(50) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `stok` int(11) NOT NULL,
  `status` enum('Milik Sendiri','Sewa') NOT NULL,
  PRIMARY KEY (`id_produk`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `produk` */

/*Table structure for table `sewa` */

DROP TABLE IF EXISTS `sewa`;

CREATE TABLE `sewa` (
  `id_sewa` varchar(50) NOT NULL,
  `id_karyawan` varchar(50) NOT NULL,
  `tgl_transaksi` date NOT NULL,
  `id_customer` varchar(50) NOT NULL,
  `tgl_pinjam` date NOT NULL,
  `tgl_kembali` date NOT NULL,
  `dp` int(11) NOT NULL,
  `subtotal` int(11) NOT NULL,
  PRIMARY KEY (`id_sewa`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `sewa` */

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id_user` int(3) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `nama_user` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `telepon` varchar(13) DEFAULT NULL,
  `foto` varchar(100) DEFAULT NULL,
  `hak_akses` enum('Super Admin','Manajer','Gudang') NOT NULL,
  `status` enum('aktif','blokir') NOT NULL DEFAULT 'aktif',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_user`),
  KEY `level` (`hak_akses`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `users` */

insert  into `users`(`id_user`,`username`,`nama_user`,`password`,`email`,`telepon`,`foto`,`hak_akses`,`status`,`created_at`,`updated_at`) values 
(1,'indrasatya','Indra Setyawantoro','41504508b3cec65b1313905001118579','indra.styawantoro@gmail.com','085669919769','indrasatya.jpg','Super Admin','aktif','2017-04-01 15:15:15','2017-04-01 15:15:15'),
(2,'kadina','Kadina Putri','202cb962ac59075b964b07152d234b70','kadinaputri@gmail.com','085680892909','kadina.png','Manajer','aktif','2017-04-01 15:15:15','2017-04-01 15:15:15'),
(3,'danang','Danang Kesuma','202cb962ac59075b964b07152d234b70','danang@gmail.com','085758858855','','Gudang','aktif','2017-04-01 15:15:15','2017-04-01 15:15:15');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
