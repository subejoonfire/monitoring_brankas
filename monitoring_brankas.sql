-- Nonaktifkan pengecekan foreign key sementara
SET FOREIGN_KEY_CHECKS = 0;

-- Table: admin
DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `email` VARCHAR(255) NOT NULL,
  `password` VARCHAR(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Table: data_anggota
DROP TABLE IF EXISTS `data_anggota`;
CREATE TABLE `data_anggota` (
  `id_anggota` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `tag` VARCHAR(20) DEFAULT NULL,
  `nama_anggota` VARCHAR(255) DEFAULT NULL,
  PRIMARY KEY (`id_anggota`),
  UNIQUE KEY `tag` (`tag`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Table: riwayat_berhasil
DROP TABLE IF EXISTS `riwayat_berhasil`;
CREATE TABLE `riwayat_berhasil` (
  `id_riwayat_berhasil` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_anggota` INT(11) UNSIGNED DEFAULT NULL,
  `tanggal_akses` DATE DEFAULT NULL,
  `waktu_akses` TIME DEFAULT NULL,
  `foto` TEXT DEFAULT NULL,
  PRIMARY KEY (`id_riwayat_berhasil`),
  KEY `id_anggota` (`id_anggota`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Table: riwayat_gagal
DROP TABLE IF EXISTS `riwayat_gagal`;
CREATE TABLE `riwayat_gagal` (
  `id_riwayat_gagal` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `tanggal_percobaan` DATE DEFAULT NULL,
  `waktu_akses` TIME DEFAULT NULL,
  `tag_tidak_dikenal` VARCHAR(50) DEFAULT NULL,
  `foto` TEXT DEFAULT NULL,
  PRIMARY KEY (`id_riwayat_gagal`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Tambahkan foreign key
ALTER TABLE `riwayat_berhasil` 
ADD CONSTRAINT `riwayat_berhasil_ibfk_1` 
FOREIGN KEY (`id_anggota`) REFERENCES `data_anggota` (`id_anggota`) 
ON DELETE CASCADE ON UPDATE CASCADE;

-- Aktifkan kembali pengecekan foreign key
SET FOREIGN_KEY_CHECKS = 1;