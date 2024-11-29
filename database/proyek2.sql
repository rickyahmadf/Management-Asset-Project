-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 08, 2024 at 10:04 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `proyek2`
--

-- --------------------------------------------------------

--
-- Table structure for table `asset`
--

CREATE TABLE `asset` (
  `id_asset` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `kode_asset` varchar(20) NOT NULL,
  `merk` varchar(125) NOT NULL,
  `tgl_peroleh` varchar(15) NOT NULL,
  `harga_asset` varchar(15) NOT NULL,
  `gambar_asset` text NOT NULL,
  `jml_asset` int(11) NOT NULL,
  `kondisi` varchar(255) NOT NULL,
  `status_dipinjam` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `asset`
--

INSERT INTO `asset` (`id_asset`, `id_barang`, `id_user`, `kode_asset`, `merk`, `tgl_peroleh`, `harga_asset`, `gambar_asset`, `jml_asset`, `kondisi`, `status_dipinjam`) VALUES
(5, 6, 1, 'BK-1234', 'Buku Al Fatih', '2024-04-03', '50000', 'buku1.jpeg', 1, 'Bagus', 0),
(6, 3, 1, 'ACR-123', '.', '2024-08-05', '2300000', 'laptop8.jpeg', 1, 'Bagus', 0),
(7, 8, 3, 'IFNX-123', 'Infinix', '2025-08-05', '1500000', 'WhatsApp_Image_2024-06-27_at_13_54_24_9bfd4ba6.jpg', 1, 'Good', 0);

-- --------------------------------------------------------

--
-- Table structure for table `asset_kep`
--

CREATE TABLE `asset_kep` (
  `id_asset_kep` int(11) NOT NULL,
  `id_pengajuan` int(11) NOT NULL,
  `tgl_kep` varchar(15) NOT NULL,
  `nama_asset_kep` varchar(125) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `asset_kep`
--

INSERT INTO `asset_kep` (`id_asset_kep`, `id_pengajuan`, `tgl_kep`, `nama_asset_kep`) VALUES
(1, 1, '2022-11-20', 'Laptop Asus Seri-A');

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id_barang` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `nama_barang` varchar(125) NOT NULL,
  `tgl_terima` varchar(100) NOT NULL,
  `sumber` varchar(255) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_barang`, `id_kategori`, `nama_barang`, `tgl_terima`, `sumber`, `keterangan`) VALUES
(3, 4, 'Laptop Acer Nitro 5', '2024-08-05', 'Hibah', 'Sesuai'),
(6, 2, 'Buku', '2024-08-05', 'Hibah', 'Sesuai'),
(8, 4, 'Handphone', '2024-08-05', 'Prodi', 'Sesuai');

-- --------------------------------------------------------

--
-- Table structure for table `histori_pengecekan`
--

CREATE TABLE `histori_pengecekan` (
  `id_histori` int(11) NOT NULL,
  `id_monitoring` int(11) NOT NULL,
  `kondisi_pengecekan` varchar(255) NOT NULL,
  `tgl_histori` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `histori_pengecekan`
--

INSERT INTO `histori_pengecekan` (`id_histori`, `id_monitoring`, `kondisi_pengecekan`, `tgl_histori`) VALUES
(1, 1, 'masih bagus', '2024-08-09'),
(2, 3, 'Masih baik', '2024-08-03'),
(3, 4, 'Masih baik', '2024-08-04');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(125) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
(2, 'Buku buku'),
(4, 'Teknologi');

-- --------------------------------------------------------

--
-- Table structure for table `kep_peminjam`
--

CREATE TABLE `kep_peminjam` (
  `id_keputusan` int(11) NOT NULL,
  `id_peminjam` int(11) NOT NULL,
  `nama_asset_kep` varchar(255) NOT NULL,
  `tgl_kep` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kep_peminjam`
--

INSERT INTO `kep_peminjam` (`id_keputusan`, `id_peminjam`, `nama_asset_kep`, `tgl_kep`) VALUES
(1, 1, 'Asus Vivobook', '2024-08-10');

-- --------------------------------------------------------

--
-- Table structure for table `monitoring`
--

CREATE TABLE `monitoring` (
  `id_monitoring` int(11) NOT NULL,
  `id_asset` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `monitoring`
--

INSERT INTO `monitoring` (`id_monitoring`, `id_asset`) VALUES
(4, 6);

-- --------------------------------------------------------

--
-- Table structure for table `peminjam`
--

CREATE TABLE `peminjam` (
  `id_peminjam` int(11) NOT NULL,
  `merk` varchar(255) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nama_peminjam` varchar(255) NOT NULL,
  `tgl_pinjam` varchar(100) NOT NULL,
  `status_peminjaman` int(11) NOT NULL,
  `tgl_pengembalian` varchar(100) NOT NULL,
  `status_pengembalian` int(11) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `kondisi_pengembalian` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `peminjam`
--

INSERT INTO `peminjam` (`id_peminjam`, `merk`, `id_user`, `nama_peminjam`, `tgl_pinjam`, `status_peminjaman`, `tgl_pengembalian`, `status_pengembalian`, `keterangan`, `kondisi_pengembalian`) VALUES
(1, 'Asus Vivobook', 1, 'Ricky Ahmad', '2024-08-03', 1, '2024-08-07', 1, 'Bagus', 'good'),
(2, 'Asus Vivobook', 3, '', '2024-08-03', 1, '2024-08-05', 0, 'untuk proyek 2', 'okee'),
(3, 'Laptop Acer Nitro 5', 3, '', '2024-08-04', 0, '', 0, 'untuk proyek 2', '');

-- --------------------------------------------------------

--
-- Table structure for table `pengajuan`
--

CREATE TABLE `pengajuan` (
  `id_pengajuan` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nama_barang` varchar(255) NOT NULL,
  `tgl_pengajuan` varchar(15) NOT NULL,
  `total_pengajuan` int(11) NOT NULL,
  `status_pengajuan` int(11) NOT NULL,
  `alasan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pengajuan`
--

INSERT INTO `pengajuan` (`id_pengajuan`, `id_user`, `nama_barang`, `tgl_pengajuan`, `total_pengajuan`, `status_pengajuan`, `alasan`) VALUES
(1, 1, 'Buku', '2025-11-20', 1, 1, 'Untuk event'),
(2, 1, 'Obat', '2025-03-03', 1, 1, 'untuk persediaan'),
(3, 1, 'Laptop Acer Nitro 5', '2024-08-04', 1, 1, 'Untuk event'),
(4, 2, 'Handphone', '2024-08-04', 1, 1, 'untuk AAS'),
(5, 1, 'Keyboard Texas', '2024-08-06', 2, 0, 'Untuk di lab');

-- --------------------------------------------------------

--
-- Table structure for table `penyusutan`
--

CREATE TABLE `penyusutan` (
  `id_penyusutan` int(11) NOT NULL,
  `id_asset` int(11) NOT NULL,
  `ket_penyusutan` text NOT NULL,
  `min_harga` varchar(15) NOT NULL,
  `status_asset` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `penyusutan`
--

INSERT INTO `penyusutan` (`id_penyusutan`, `id_asset`, `ket_penyusutan`, `min_harga`, `status_asset`) VALUES
(1, 2, 'Melemahnya Kinerja Laptop', '100000', 0),
(2, 2, 'kinerja', '50000', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama_user` varchar(25) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `status` text NOT NULL,
  `username` varchar(125) NOT NULL,
  `password` varchar(125) NOT NULL,
  `level_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama_user`, `no_hp`, `status`, `username`, `password`, `level_user`) VALUES
(1, 'admin', '081000111000', 'Kepala Lab', 'admin', 'admin', 1),
(2, 'Kepala Prodi', '082000222000', 'Kaprodi', 'kaprodi', 'kaprodi', 2),
(3, 'Budi', '087654321435', 'Mahasiswa', 'budi123', 'budi123', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `asset`
--
ALTER TABLE `asset`
  ADD PRIMARY KEY (`id_asset`);

--
-- Indexes for table `asset_kep`
--
ALTER TABLE `asset_kep`
  ADD PRIMARY KEY (`id_asset_kep`);

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `histori_pengecekan`
--
ALTER TABLE `histori_pengecekan`
  ADD PRIMARY KEY (`id_histori`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `kep_peminjam`
--
ALTER TABLE `kep_peminjam`
  ADD PRIMARY KEY (`id_keputusan`);

--
-- Indexes for table `monitoring`
--
ALTER TABLE `monitoring`
  ADD PRIMARY KEY (`id_monitoring`);

--
-- Indexes for table `peminjam`
--
ALTER TABLE `peminjam`
  ADD PRIMARY KEY (`id_peminjam`);

--
-- Indexes for table `pengajuan`
--
ALTER TABLE `pengajuan`
  ADD PRIMARY KEY (`id_pengajuan`);

--
-- Indexes for table `penyusutan`
--
ALTER TABLE `penyusutan`
  ADD PRIMARY KEY (`id_penyusutan`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `asset`
--
ALTER TABLE `asset`
  MODIFY `id_asset` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `asset_kep`
--
ALTER TABLE `asset_kep`
  MODIFY `id_asset_kep` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `histori_pengecekan`
--
ALTER TABLE `histori_pengecekan`
  MODIFY `id_histori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `kep_peminjam`
--
ALTER TABLE `kep_peminjam`
  MODIFY `id_keputusan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `monitoring`
--
ALTER TABLE `monitoring`
  MODIFY `id_monitoring` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `peminjam`
--
ALTER TABLE `peminjam`
  MODIFY `id_peminjam` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pengajuan`
--
ALTER TABLE `pengajuan`
  MODIFY `id_pengajuan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `penyusutan`
--
ALTER TABLE `penyusutan`
  MODIFY `id_penyusutan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
