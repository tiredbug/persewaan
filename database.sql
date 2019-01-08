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

/*Table structure for table `booking` */

DROP TABLE IF EXISTS `booking`;

CREATE TABLE `booking` (
  `id_booking` varchar(50) NOT NULL,
  `id_karyawan` varchar(50) NOT NULL,
  `tgl_transaksi` date NOT NULL,
  `id_customer` varchar(50) NOT NULL,
  `id_produk` varchar(50) NOT NULL,
  `tgl_pinjam` date NOT NULL,
  `tgl_kembali` date NOT NULL,
  `jumlah` int(11) NOT NULL,
  `status` enum('Verifikasi','Belum Verifikasi') NOT NULL,
  PRIMARY KEY (`id_booking`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `booking` */

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

insert  into `customer`(`id_customer`,`nama`,`no_id`,`jenis_id`,`alamat`,`no_hp`) values 
('CUST-1901-0001','Elsa SN',2147483647,'KTM','Bogor, Indonesia',2147483647),
('CUST-1901-0002','Anisa Fatma',12345678,'BPJS','Mlati, Sleman, Yogyakarta',12345678);

/*Table structure for table `denda` */

DROP TABLE IF EXISTS `denda`;

CREATE TABLE `denda` (
  `id_denda` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `harga` int(11) NOT NULL,
  `keterangan` text NOT NULL,
  PRIMARY KEY (`id_denda`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `denda` */

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

/*Table structure for table `det_peminjaman` */

DROP TABLE IF EXISTS `det_peminjaman`;

CREATE TABLE `det_peminjaman` (
  `id_det_peminjaman` int(11) NOT NULL,
  `id_peminjaman` varchar(50) NOT NULL,
  `id_produk` varchar(50) NOT NULL,
  `id_paket` varchar(50) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `potongan` double NOT NULL,
  `biaya` double NOT NULL,
  `subtotal` double NOT NULL,
  PRIMARY KEY (`id_det_peminjaman`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `det_peminjaman` */

/*Table structure for table `det_pengembalian` */

DROP TABLE IF EXISTS `det_pengembalian`;

CREATE TABLE `det_pengembalian` (
  `id_det_pengembalian` int(11) NOT NULL,
  `id_pengembalian` varchar(50) NOT NULL,
  `denda` double NOT NULL,
  `harga_denda` double NOT NULL,
  `lebih_durasi` int(11) NOT NULL,
  `total_bayar` double NOT NULL,
  `keterangan` text NOT NULL,
  PRIMARY KEY (`id_det_pengembalian`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `det_pengembalian` */

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

insert  into `harga`(`id_harga`,`id_produk`,`id_paket`,`harga`) values 
('HRG-1901-0001','PRDK-1901-0001','PKT-1901-0001',90000),
('HRG-1901-0002','PRDK-1901-0001','PKT-1901-0002',135000),
('HRG-1901-0003','PRDK-1901-0001','PKT-1901-0003',180000);

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

insert  into `karyawan`(`id_karyawan`,`nama`,`id_user`,`alamat`,`no_hp`,`jabatan`) values 
('KY-1901-0001','Elsa Serli Nabila','elsasn','Bogor, Indonesia',2147483647,'Pegawai'),
('KY-1901-0002','Harry Mahardika','harry','Yogyakarta',12345678,'SPV');

/*Table structure for table `kategori` */

DROP TABLE IF EXISTS `kategori`;

CREATE TABLE `kategori` (
  `id_kategori` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  PRIMARY KEY (`id_kategori`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `kategori` */

insert  into `kategori`(`id_kategori`,`nama`) values 
('KTG-1901-0001','Kamera Foto'),
('KTG-1901-0002','GoPro/Xiaomi/ActionCam');

/*Table structure for table `paket` */

DROP TABLE IF EXISTS `paket`;

CREATE TABLE `paket` (
  `id_paket` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `durasi` varchar(50) NOT NULL,
  PRIMARY KEY (`id_paket`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `paket` */

insert  into `paket`(`id_paket`,`nama`,`durasi`) values 
('PKT-1901-0001','Paket 6 Jam','6 Jam'),
('PKT-1901-0002','Paket 12 Jam','12 Jam'),
('PKT-1901-0003','Paket 24 Jam','24 Jam');

/*Table structure for table `pembayaran` */

DROP TABLE IF EXISTS `pembayaran`;

CREATE TABLE `pembayaran` (
  `id_pembayaran` varchar(50) NOT NULL,
  `id_booking` varchar(50) NOT NULL,
  `subtotal` int(11) NOT NULL,
  `jumlah_bayar` int(11) NOT NULL,
  `jenis_bayar` int(11) NOT NULL,
  `status` enum('Lunas','Belum Lunas') NOT NULL,
  PRIMARY KEY (`id_pembayaran`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `pembayaran` */

/*Table structure for table `peminjaman` */

DROP TABLE IF EXISTS `peminjaman`;

CREATE TABLE `peminjaman` (
  `id_peminjaman` varchar(50) NOT NULL,
  `id_booking` varchar(50) NOT NULL,
  `id_karyawan` varchar(50) NOT NULL,
  `tgl_transaksi` date NOT NULL,
  `id_customer` varchar(50) NOT NULL,
  `tgl_pinjam` date NOT NULL,
  `tgl_kembali` date NOT NULL,
  `total_bayar` int(11) NOT NULL,
  PRIMARY KEY (`id_peminjaman`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `peminjaman` */

/*Table structure for table `pengembalian` */

DROP TABLE IF EXISTS `pengembalian`;

CREATE TABLE `pengembalian` (
  `id_pengembalian` varchar(50) NOT NULL,
  `id_peminjaman` varchar(50) NOT NULL,
  `tgl_pengembalian` date NOT NULL,
  `subtotal` double NOT NULL,
  PRIMARY KEY (`id_pengembalian`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `pengembalian` */

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

insert  into `produk`(`id_produk`,`nama`,`id_kategori`,`jumlah`,`stok`,`status`) values 
('PRDK-1901-0001','Canon DSLR 7D BO','KTG-1901-0001',10,10,'Milik Sendiri'),
('PRDK-1901-0002','Canon DSLR 60D BO','KTG-1901-0001',10,10,'Milik Sendiri');

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
(1,'superadmin','Elsa Serli Nabila','17c4520f6cfd1ab53d8745e84681eb49','elsa@gmail.com','12345678','user-default.png','Super Admin','aktif','2017-04-01 15:15:15','2019-01-08 05:21:13'),
(2,'kadina','Kadina Putri','202cb962ac59075b964b07152d234b70','kadinaputri@gmail.com','085680892909','kadina.png','Manajer','aktif','2017-04-01 15:15:15','2017-04-01 15:15:15'),
(3,'danang','Danang Kesuma','202cb962ac59075b964b07152d234b70','danang@gmail.com','085758858855','','Gudang','aktif','2017-04-01 15:15:15','2017-04-01 15:15:15');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
