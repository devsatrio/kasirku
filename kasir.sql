-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.3.16-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for kasir
CREATE DATABASE IF NOT EXISTS `kasir` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `kasir`;

-- Dumping structure for table kasir.barang
CREATE TABLE IF NOT EXISTS `barang` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_barang` varchar(250) DEFAULT NULL,
  `harga` int(11) DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- Dumping data for table kasir.barang: ~4 rows (approximately)
DELETE FROM `barang`;
/*!40000 ALTER TABLE `barang` DISABLE KEYS */;
INSERT INTO `barang` (`id`, `nama_barang`, `harga`) VALUES
	(2, 'kopi hitam', 3000),
	(4, 'omlete manis', 4000),
	(5, 'mie sedap', 35000),
	(6, 'rokok surya', 16000);
/*!40000 ALTER TABLE `barang` ENABLE KEYS */;

-- Dumping structure for table kasir.detail_pembelian
CREATE TABLE IF NOT EXISTS `detail_pembelian` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode_pembelian` varchar(500) DEFAULT NULL,
  `barang` varchar(500) DEFAULT NULL,
  `jumlah` int(11) DEFAULT 0,
  `harga` int(11) DEFAULT 0,
  `subtotal` int(11) DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Dumping data for table kasir.detail_pembelian: ~3 rows (approximately)
DELETE FROM `detail_pembelian`;
/*!40000 ALTER TABLE `detail_pembelian` DISABLE KEYS */;
INSERT INTO `detail_pembelian` (`id`, `kode_pembelian`, `barang`, `jumlah`, `harga`, `subtotal`) VALUES
	(1, 'P20191105-001', 'omlete manis', 3, 4000, 12000),
	(2, 'P20191105-001', 'omlete manis', 1, 4000, 4000),
	(3, 'P20191105-001', 'kopi hitam', 1, 3000, 3000);
/*!40000 ALTER TABLE `detail_pembelian` ENABLE KEYS */;

-- Dumping structure for table kasir.pembelian
CREATE TABLE IF NOT EXISTS `pembelian` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) DEFAULT NULL,
  `tgl` date DEFAULT NULL,
  `kode` varchar(500) DEFAULT NULL,
  `subtotal` int(11) DEFAULT 0,
  `potongan` int(11) DEFAULT 0,
  `total` int(11) DEFAULT 0,
  `dibayar` int(11) DEFAULT 0,
  `kembali` int(11) DEFAULT 0,
  `status` enum('Y','N') DEFAULT 'N',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table kasir.pembelian: ~1 rows (approximately)
DELETE FROM `pembelian`;
/*!40000 ALTER TABLE `pembelian` DISABLE KEYS */;
INSERT INTO `pembelian` (`id`, `id_user`, `tgl`, `kode`, `subtotal`, `potongan`, `total`, `dibayar`, `kembali`, `status`) VALUES
	(1, NULL, NULL, 'P20191105-001', 0, 0, 0, 0, 0, 'N');
/*!40000 ALTER TABLE `pembelian` ENABLE KEYS */;

-- Dumping structure for table kasir.user
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` text DEFAULT NULL,
  `status` enum('Super Admin','Admin','Programmer') DEFAULT 'Admin',
  `telp` varchar(50) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Dumping data for table kasir.user: ~1 rows (approximately)
DELETE FROM `user`;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` (`id`, `nama`, `username`, `password`, `status`, `telp`, `alamat`) VALUES
	(1, 'deva satrio', 'devasatrio', '827ccb0eea8a706c4c34a16891f84e7b', 'Programmer', '14045', 'gurah'),
	(4, 'admin satu', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Admin', '0823847', 'gurah magersari');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
