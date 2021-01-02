-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 19, 2019 at 04:38 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pd_istanablock`
--

-- --------------------------------------------------------

--
-- Table structure for table `backup_stock`
--

CREATE TABLE `backup_stock` (
  `id_barang` int(11) NOT NULL,
  `kode_barang` varchar(10) NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `jenis_brg` varchar(20) NOT NULL,
  `stock_awal` int(11) NOT NULL,
  `stock_masuk` int(11) NOT NULL,
  `terjual` int(11) NOT NULL,
  `stock_akhir` int(11) NOT NULL,
  `kondisi_stock` varchar(10) NOT NULL,
  `harga` int(11) NOT NULL,
  `modal_stock` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `backup_stock`
--

INSERT INTO `backup_stock` (`id_barang`, `kode_barang`, `nama_barang`, `jenis_brg`, `stock_awal`, `stock_masuk`, `terjual`, `stock_akhir`, `kondisi_stock`, `harga`, `modal_stock`) VALUES
(1, 'GT01', 'GENTENG BETON GARUDA', 'Genteng', 200, 350, 100, 450, '', 3500, 1575000),
(2, 'P01', 'PAVING BATA 6CM ABU HDR', 'Paving', 2400, 3000, 0, 5300, '', 3400, 18020000),
(4, 'GT01', 'GENTENG BETON GARUDA', 'Genteng', 200, 350, 100, 450, '', 3500, 1575000),
(5, 'P01', 'PAVING BATA 6CM ABU HDR', 'Paving', 2400, 3000, 0, 5300, '', 3400, 18020000);

-- --------------------------------------------------------

--
-- Table structure for table `bahan_baku`
--

CREATE TABLE `bahan_baku` (
  `id_bahanbaku` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `nama_bahanbaku` varchar(50) NOT NULL,
  `jumlah_barang` int(11) NOT NULL,
  `satuan` varchar(20) NOT NULL,
  `harga_barang` int(11) NOT NULL,
  `bongkar` varchar(50) NOT NULL,
  `total_harga` bigint(20) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bahan_baku`
--

INSERT INTO `bahan_baku` (`id_bahanbaku`, `tanggal`, `nama_bahanbaku`, `jumlah_barang`, `satuan`, `harga_barang`, `bongkar`, `total_harga`, `keterangan`) VALUES
(1, '2019-12-16', 'batu pasir', 12000, 'Rit', 120000, 'pabrrik', 1440000000, 'sd');

-- --------------------------------------------------------

--
-- Table structure for table `barang_rusak`
--

CREATE TABLE `barang_rusak` (
  `id_barangrusak` int(11) NOT NULL,
  `no_transaksi` varchar(20) NOT NULL,
  `kode_brg` varchar(50) NOT NULL,
  `qty_barang` int(11) NOT NULL,
  `satuan_brg` varchar(10) NOT NULL,
  `sumber_brg` varchar(20) NOT NULL,
  `refund` varchar(20) NOT NULL,
  `bayar_refund` varchar(10) NOT NULL,
  `nominal_refund` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `bayar_kasbon`
--

CREATE TABLE `bayar_kasbon` (
  `id_bayarkasbon` int(11) NOT NULL,
  `id_kry` int(11) NOT NULL,
  `nominal_bayar` int(11) NOT NULL,
  `sisa_kasbon` int(11) NOT NULL,
  `tgl_bayar` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `detail_order_bahanbaku`
--

CREATE TABLE `detail_order_bahanbaku` (
  `id_detailbahanbaku` int(11) NOT NULL,
  `no_trbahanbaku` varchar(50) NOT NULL,
  `kode_barang` varchar(20) NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `hrg_barang` int(11) NOT NULL,
  `jumlah_beli` int(11) NOT NULL,
  `total_harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_order_bahanbaku`
--

INSERT INTO `detail_order_bahanbaku` (`id_detailbahanbaku`, `no_trbahanbaku`, `kode_barang`, `nama_barang`, `hrg_barang`, `jumlah_beli`, `total_harga`) VALUES
(2, 'TRO-BB-1', '', 'batu pasir', 1234000, 12000, 2147483647);

-- --------------------------------------------------------

--
-- Table structure for table `detail_order_pembeli`
--

CREATE TABLE `detail_order_pembeli` (
  `id_detail_order` int(11) NOT NULL,
  `no_transaksi` varchar(20) NOT NULL,
  `kode_barang` varchar(50) NOT NULL,
  `nama_barang` text NOT NULL,
  `warna_brg` text NOT NULL,
  `hrg_barang` int(11) NOT NULL,
  `jumlah_beli` int(11) NOT NULL,
  `satuan_brg` varchar(10) NOT NULL,
  `total_hrg` int(11) NOT NULL,
  `sumber_brg` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `faktur`
--

CREATE TABLE `faktur` (
  `id_faktur` int(11) NOT NULL,
  `no_faktur` varchar(20) NOT NULL,
  `no_transaksi` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `feedback_brg`
--

CREATE TABLE `feedback_brg` (
  `id_feedback` int(11) NOT NULL,
  `no_transaksi` varchar(20) NOT NULL,
  `brg_rusak` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `gaji_karyawanharian`
--

CREATE TABLE `gaji_karyawanharian` (
  `id_gajiharian` int(11) NOT NULL,
  `tgl_gaji` date NOT NULL,
  `nama_kry` varchar(100) NOT NULL,
  `total_gaji` int(11) NOT NULL,
  `pekerjaan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `gaji_karyawantetap`
--

CREATE TABLE `gaji_karyawantetap` (
  `id_gaji` int(11) NOT NULL,
  `tgl_gaji` date NOT NULL,
  `tgl_awal_periode` date NOT NULL,
  `tgl_akhir_periode` date NOT NULL,
  `id_kry` int(11) NOT NULL,
  `total_gaji` int(11) NOT NULL,
  `bayar_kasbon` int(11) NOT NULL,
  `sisa_upah` int(11) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gaji_karyawantetap`
--

INSERT INTO `gaji_karyawantetap` (`id_gaji`, `tgl_gaji`, `tgl_awal_periode`, `tgl_akhir_periode`, `id_kry`, `total_gaji`, `bayar_kasbon`, `sisa_upah`, `keterangan`) VALUES
(1, '2019-12-19', '2019-12-15', '2019-12-16', 38, 1607400, 0, 1557400, 'ok');

-- --------------------------------------------------------

--
-- Table structure for table `historikerjakaryawan`
--

CREATE TABLE `historikerjakaryawan` (
  `id_histori` int(11) NOT NULL,
  `id_kry` int(11) NOT NULL,
  `tgl` date NOT NULL,
  `kode_brg` varchar(50) NOT NULL,
  `jenis_brg` varchar(100) NOT NULL,
  `qty_brg` int(11) NOT NULL,
  `qty_semen` int(11) NOT NULL,
  `pekerjaan` varchar(20) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `historikerjakaryawan`
--

INSERT INTO `historikerjakaryawan` (`id_histori`, `id_kry`, `tgl`, `kode_brg`, `jenis_brg`, `qty_brg`, `qty_semen`, `pekerjaan`, `keterangan`) VALUES
(1, 38, '2019-12-15', 'GT01', 'Genteng', 2000, 5, 'Cetak', ''),
(2, 38, '2019-12-16', 'GT01', 'Genteng', 1500, 5, 'Cetak', ''),
(3, 38, '2019-12-17', 'GT01', 'Genteng', 1000, 0, 'Cat', ''),
(4, 38, '2019-12-18', 'GT01', 'Genteng', 1000, 0, 'Angkat', ''),
(5, 41, '2019-12-15', 'P01', 'Paving', 3500, 5, 'Cetak', ''),
(6, 41, '2019-12-16', 'P01', 'Paving', 4500, 4, 'Cetak', ''),
(7, 41, '2019-12-17', 'P01', 'Paving', 3500, 4, 'Cetak', '');

-- --------------------------------------------------------

--
-- Table structure for table `hitung_gajikaryawan`
--

CREATE TABLE `hitung_gajikaryawan` (
  `id_hitunggaji` int(11) NOT NULL,
  `id_kry` int(11) NOT NULL,
  `tgl_gaji` date NOT NULL,
  `sub_totalgaji` int(11) NOT NULL,
  `kode_barang` text NOT NULL,
  `pekerjaan` text NOT NULL,
  `tgl_kerjaawal` date NOT NULL,
  `tgl_kerjaakhir` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hitung_gajikaryawan`
--

INSERT INTO `hitung_gajikaryawan` (`id_hitunggaji`, `id_kry`, `tgl_gaji`, `sub_totalgaji`, `kode_barang`, `pekerjaan`, `tgl_kerjaawal`, `tgl_kerjaakhir`) VALUES
(5, 38, '2019-12-20', 98000, 'GT01', 'Cat', '2019-12-17', '2019-12-18'),
(6, 38, '2019-12-20', 54450, 'GT01', 'Angkat', '2019-12-17', '2019-12-18'),
(11, 38, '2019-12-19', 1607400, 'GT01', 'Cetak', '2019-12-15', '2019-12-16');

-- --------------------------------------------------------

--
-- Table structure for table `inv_kendaraan`
--

CREATE TABLE `inv_kendaraan` (
  `id_inv` int(11) NOT NULL,
  `jns_kendaraan` varchar(50) NOT NULL,
  `merek` varchar(50) NOT NULL,
  `plat_nomor` varchar(15) NOT NULL,
  `tgl_servis` date NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `jenis_barang`
--

CREATE TABLE `jenis_barang` (
  `id_jenisbarang` int(11) NOT NULL,
  `nama_jenisbarang` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenis_barang`
--

INSERT INTO `jenis_barang` (`id_jenisbarang`, `nama_jenisbarang`) VALUES
(1, 'Paving'),
(3, 'U-Ditch'),
(5, 'Cover Buis'),
(6, 'Greffel'),
(7, 'Cover U-Ditch'),
(10, 'kanstin'),
(12, 'buis beton'),
(14, 'Grass block'),
(16, 'Genteng'),
(19, 'Abu batu');

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE `karyawan` (
  `id_kry` int(11) NOT NULL,
  `nama_kry` varchar(20) NOT NULL,
  `tempat_lhr` varchar(20) NOT NULL,
  `tgl_lhr` date NOT NULL,
  `alamat_kry` text NOT NULL,
  `group_kry` varchar(20) NOT NULL,
  `no_sim` varchar(20) NOT NULL,
  `jenis_sim` varchar(20) NOT NULL,
  `masa_berlaku` date NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`id_kry`, `nama_kry`, `tempat_lhr`, `tgl_lhr`, `alamat_kry`, `group_kry`, `no_sim`, `jenis_sim`, `masa_berlaku`, `password`) VALUES
(1, 'amin', 'purwakarta', '2019-08-22', 'purwakarta', 'Supir', '', '', '1970-01-01', ''),
(2, 'walid', 'purwakarta', '2019-08-20', 'purwakarta', 'Staff', '', '', '1970-01-01', '1234'),
(3, 'muhidin', 'purwakarta', '2019-08-06', 'purwakarta cisalada', 'Supir', '', '', '1970-01-01', ''),
(4, 'opik', 'purwakarta', '1982-05-02', 'purwakarta bongas patung kuda', 'Supir', '82051360772', 'B1', '2018-05-02', ''),
(5, 'sutisna', 'purwakarta', '1984-01-11', 'purwakart cisalada', 'Supir', '840113161423', 'BII umum', '2023-01-11', ''),
(7, 'mamat', 'purwakarta', '2019-08-01', 'purwakarta', 'Staff', '0', '0', '2019-08-21', '1234'),
(8, 'udin', 'purwakarta', '2019-09-02', 'purwakarta cisalada', 'Supir', '', '', '1970-01-01', ''),
(9, 'sumitra', 'cianjur', '2019-09-02', 'cianjur', 'Produksi', '', '', '1970-01-01', ''),
(10, 'bambam', 'cilacap', '2019-09-02', 'cilacap', 'Produksi', '', '', '1970-01-01', '1234'),
(11, 'gio', 'cilacap', '2019-09-03', 'cilacap', 'Produksi', '0', '0', '1970-01-01', ''),
(12, 'anton ulung', 'medan', '2019-09-03', 'medan', 'Produksi', '0', '0', '1970-01-01', ''),
(14, 'teguh', 'cilacap', '2019-09-03', 'cilacap', 'Produksi', '0', '0', '1970-01-01', ''),
(15, 'daka', 'purwakarta', '2019-09-03', 'purwakarta', 'Produksi', '0', '0', '1970-01-01', ''),
(16, 'nok', 'cilacap', '2019-09-03', 'cilacap', 'Produksi', '0', '0', '1970-01-01', ''),
(17, 'husen', 'indramayu', '2019-09-03', 'purwakarta', 'Produksi', '0', '0', '1970-01-01', ''),
(18, 'aan', 'purwakarta', '2019-09-03', 'purwakrta', 'Produksi', '0', '0', '1970-01-01', ''),
(19, 'pendi', 'purwakarta', '2019-09-03', 'purwakarta', 'Produksi', '0', '0', '1970-01-01', ''),
(20, 'jajang', 'purwakarta', '2019-09-03', 'purwakarta', 'Produksi', '0', '0', '1970-01-01', ''),
(21, 'alan', 'purwkarta', '2019-09-03', 'purwakarta', 'Produksi', '0', '0', '1970-01-01', ''),
(22, 'iman', 'purwakarta', '2019-09-03', 'purwakarta', 'Produksi', '0', '0', '1970-01-01', ''),
(23, 'gadil', 'purwakarta', '2019-09-03', 'purwakarta', 'Produksi', '0', '0', '1970-01-01', ''),
(25, 'nanang', 'purwakarta', '2019-09-03', 'purwakarta', 'Produksi', '0', '0', '1970-01-01', ''),
(26, 'asri', 'purwakarta', '2019-09-03', 'purwakarta', 'Produksi', '0', '0', '1970-01-01', ''),
(27, 'duloh', 'purwakarta', '2019-09-03', 'purwakarta', 'Produksi', '0', '0', '1970-01-01', ''),
(28, 'edi', 'purwakarta', '2019-09-03', 'purwakarta', 'Produksi', '0', '0', '1970-01-01', ''),
(29, 'lina', 'purwakarta', '2019-09-03', 'purwakarta', 'Staff', '0', '0', '1970-01-01', '1234'),
(30, 'jana', 'purwakarta', '2019-11-02', 'bongas purwakarta', 'Produksi', '0', '0', '1970-01-01', '1234'),
(31, 'junari', 'purwakarta', '2019-11-02', 'bongas purwakarta', 'Produksi', '0', '0', '1970-01-01', '1234'),
(32, 'adnan', 'purwakarta', '2019-11-02', 'citalang purwakarta', 'Produksi', '0', '0', '1970-01-01', '1234'),
(33, 'pepen', 'purwakarta', '2019-11-01', 'nagrak- purwakarta', 'Produksi', '0', '0', '1970-01-01', '1234'),
(34, 'waulung', 'medan', '2019-11-01', 'medan', 'Produksi', '0', '0', '1970-01-01', '1234'),
(35, 'rebing', 'purwakarta', '2019-11-01', 'cisalada-purwakarta', 'Lapangan', '0', '0', '1970-01-01', '1234'),
(36, 'muh', 'purwakarta', '2019-11-01', 'purwakarta', 'Lapangan', '0', '0', '1970-01-01', '1234'),
(37, 'samid', 'purwakarta', '2019-11-01', 'sawah kulon-purwakarta', 'Lapangan', '0', '0', '1970-01-01', '1234'),
(38, 'group genteng gio', 'purwakarta', '2019-11-01', 'istana block purwakarta', 'Produksi', '0', '0', '1970-01-01', '1234'),
(39, 'group genteng teguh', 'purwakarta', '2019-11-01', 'istana block purwakarta', 'Produksi', '0', '0', '1970-01-01', '1234'),
(40, 'group genteng husen', 'purwakarta', '2019-11-01', 'istana block purwakarta', 'Produksi', '0', '0', '1970-01-01', '1234'),
(41, 'group paving alan', 'purwakarta', '2019-11-01', 'istana block purwakarta', 'Produksi', '0', '0', '1970-01-01', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `kas`
--

CREATE TABLE `kas` (
  `id_kas` int(11) NOT NULL,
  `kas_kecil` int(11) NOT NULL,
  `kas_besar` int(11) NOT NULL,
  `kas_bank` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kas`
--

INSERT INTO `kas` (`id_kas`, `kas_kecil`, `kas_besar`, `kas_bank`) VALUES
(1, 96889700, -44580600, 56170000);

-- --------------------------------------------------------

--
-- Table structure for table `kasbon_kry`
--

CREATE TABLE `kasbon_kry` (
  `id_kasbon` int(11) NOT NULL,
  `tgl_kasbon` date NOT NULL,
  `id_kry` int(11) NOT NULL,
  `group_kry` varchar(20) NOT NULL,
  `nominal` int(11) NOT NULL,
  `sts_kasbon` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kasbon_kry`
--

INSERT INTO `kasbon_kry` (`id_kasbon`, `tgl_kasbon`, `id_kry`, `group_kry`, `nominal`, `sts_kasbon`) VALUES
(1, '2019-12-11', 18, '', 50000, 'Belum Lunas'),
(2, '2019-12-12', 32, '', 140000, 'Belum Lunas');

-- --------------------------------------------------------

--
-- Table structure for table `level_karyawan`
--

CREATE TABLE `level_karyawan` (
  `id_level` int(11) NOT NULL,
  `nama_level` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `level_karyawan`
--

INSERT INTO `level_karyawan` (`id_level`, `nama_level`) VALUES
(2, 'Lapangan'),
(3, 'Staff'),
(4, 'Supir'),
(6, 'Produksi');

-- --------------------------------------------------------

--
-- Table structure for table `menu_staff`
--

CREATE TABLE `menu_staff` (
  `id_menu` int(11) NOT NULL,
  `nama_menu` varchar(50) NOT NULL,
  `value` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu_staff`
--

INSERT INTO `menu_staff` (`id_menu`, `nama_menu`, `value`) VALUES
(1, 'Home', 'home'),
(2, 'Stock Barang', 'stokbarang'),
(3, 'Order Pembeli', 'order_pembeli'),
(4, 'Pembayaran', 'pembayaran'),
(5, 'Dokumen', 'dokumen'),
(6, 'Pengeluaran', 'pengeluaran'),
(7, 'Karyawan', 'karyawan'),
(8, 'Keuangan', 'keuangan'),
(9, 'Inv. Kendaraan', 'kendaraan'),
(10, 'Bahan Baku', 'bahanbaku'),
(11, 'Laporan', 'laporan');

-- --------------------------------------------------------

--
-- Table structure for table `order_bahanbaku`
--

CREATE TABLE `order_bahanbaku` (
  `id_orderbahanbaku` int(11) NOT NULL,
  `no_trbahanbaku` varchar(20) NOT NULL,
  `tgl_pembelian` date NOT NULL,
  `nama_supplier` varchar(100) NOT NULL,
  `pembayaran` varchar(50) NOT NULL,
  `tgl_tempo` date NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_bahanbaku`
--

INSERT INTO `order_bahanbaku` (`id_orderbahanbaku`, `no_trbahanbaku`, `tgl_pembelian`, `nama_supplier`, `pembayaran`, `tgl_tempo`, `keterangan`) VALUES
(3, 'TRO-BB-1', '2019-12-17', 'sdf', 'Tunai', '1970-01-01', 'sdf');

-- --------------------------------------------------------

--
-- Table structure for table `order_pembeli`
--

CREATE TABLE `order_pembeli` (
  `id_order` int(11) NOT NULL,
  `no_transaksi` varchar(20) NOT NULL,
  `tgl_beli` date NOT NULL,
  `nama_pembeli` varchar(50) NOT NULL,
  `nohp_pembeli` varchar(15) NOT NULL,
  `alamat_pembeli` text NOT NULL,
  `wilayah` varchar(50) NOT NULL,
  `pembayaran` varchar(20) NOT NULL,
  `jatuh_tempo` date NOT NULL,
  `keterangan` varchar(20) NOT NULL,
  `sts_order` varchar(20) NOT NULL,
  `sts_suratjalan` varchar(20) NOT NULL,
  `sts_kirim` varchar(20) NOT NULL,
  `feedback` varchar(20) NOT NULL,
  `selesai` varchar(20) NOT NULL,
  `baca_notif` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pekerjaansupir_tambahan`
--

CREATE TABLE `pekerjaansupir_tambahan` (
  `id_tambahansupir` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `id_supir` int(11) NOT NULL,
  `pekerjaan` text NOT NULL,
  `nominal` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `no_transaksi` varchar(20) NOT NULL,
  `nominal_dp` int(11) NOT NULL,
  `nominal_cash` int(11) NOT NULL,
  `sisa_tagihan` int(11) NOT NULL,
  `tgl_bayar` date NOT NULL,
  `masuk_ke` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran_bahanbaku`
--

CREATE TABLE `pembayaran_bahanbaku` (
  `id_bayar_bahanbaku` int(11) NOT NULL,
  `no_transaksi` varchar(20) NOT NULL,
  `nominal_dp` int(11) NOT NULL,
  `nominal_cash` int(11) NOT NULL,
  `sisa_tagihan` int(11) NOT NULL,
  `tgl_bayar` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pengeluaran`
--

CREATE TABLE `pengeluaran` (
  `id_pengeluaran` int(11) NOT NULL,
  `tgl_pengeluaran` date NOT NULL,
  `id` int(11) NOT NULL,
  `no_transaksi` varchar(20) NOT NULL,
  `nama_pengeluaran` text NOT NULL,
  `jenis_pengeluaran` text NOT NULL,
  `nominal` int(11) NOT NULL,
  `noreferensi` varchar(100) NOT NULL,
  `no_pelanggan` varchar(50) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengeluaran`
--

INSERT INTO `pengeluaran` (`id_pengeluaran`, `tgl_pengeluaran`, `id`, `no_transaksi`, `nama_pengeluaran`, `jenis_pengeluaran`, `nominal`, `noreferensi`, `no_pelanggan`, `keterangan`) VALUES
(1, '2019-12-11', 18, '', 'Kasbon Karyawan', 'Kasbon Karyawan', 100000, '', '', ''),
(2, '2019-12-12', 32, '', 'Kasbon Karyawan', 'Kasbon Karyawan', 140000, '', '', ''),
(3, '2019-12-19', 0, '', 'Gaji Karyawan Tetap group genteng gio', 'Penggajian Karyawan Staff dan Lapangan', 1557400, '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `pengeluaran_harian`
--

CREATE TABLE `pengeluaran_harian` (
  `id_pengeluaranharian` int(11) NOT NULL,
  `tgl_pengeluaran` date NOT NULL,
  `nama_beban` varchar(100) NOT NULL,
  `nominal` int(11) NOT NULL,
  `noreferensi` varchar(100) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pengeluaran_lain`
--

CREATE TABLE `pengeluaran_lain` (
  `id_pengeluaran_lain` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `nama_beban` varchar(50) NOT NULL,
  `no_pelanggan` varchar(50) NOT NULL,
  `nominal` bigint(20) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `rekening_koran`
--

CREATE TABLE `rekening_koran` (
  `id_rekeningkoran` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `keterangan` text NOT NULL,
  `mutasi` bigint(20) NOT NULL,
  `kreditdebit` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `setting_angkatgenteng`
--

CREATE TABLE `setting_angkatgenteng` (
  `id_settingangkat` int(11) NOT NULL,
  `kode_barang` varchar(20) NOT NULL,
  `nama_genteng` varchar(100) NOT NULL,
  `range_genteng` int(11) NOT NULL,
  `toleransi` int(11) NOT NULL,
  `gaji` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `setting_angkatgenteng`
--

INSERT INTO `setting_angkatgenteng` (`id_settingangkat`, `kode_barang`, `nama_genteng`, `range_genteng`, `toleransi`, `gaji`) VALUES
(8, 'GT01', 'GENTENG BETON GARUDA', 1000, 10, 55),
(9, 'GT02', 'NOK BETON GARUDA ', 1000, 10, 55),
(10, 'GT03', 'GENTENG BETON FLAT', 1000, 10, 55),
(11, 'GT04', 'NOK BETON FLAT', 1000, 10, 55),
(12, 'GT05', 'LISPLANG', 1000, 10, 55);

-- --------------------------------------------------------

--
-- Table structure for table `setting_baranglain`
--

CREATE TABLE `setting_baranglain` (
  `id_settingbrglain` int(11) NOT NULL,
  `kode_barang` varchar(20) NOT NULL,
  `nama_brglain` varchar(100) NOT NULL,
  `limit_stock` int(11) NOT NULL,
  `range_brglain` int(11) NOT NULL,
  `toleransi` int(11) NOT NULL,
  `gaji` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `setting_baranglain`
--

INSERT INTO `setting_baranglain` (`id_settingbrglain`, `kode_barang`, `nama_brglain`, `limit_stock`, `range_brglain`, `toleransi`, `gaji`) VALUES
(3, 'B03', 'BUIS BETON 40CM', 50, 1, 0, 12000),
(4, 'B07', 'BUIS BETON 80 X 100CM COR', 20, 1, 0, 25000),
(5, 'B04', 'BUIS BETON 80X50CM TUMBUK', 50, 1, 0, 15000),
(6, 'B02', 'BUIS BETON 30CM', 50, 1, 0, 10000),
(7, 'B01', 'BUIS BETON 20CM', 50, 1, 0, 9000),
(9, 'B06', 'BUIS BETON 80X50CM COR', 50, 1, 0, 15000),
(10, 'GF01', 'GREFFEL 20CM', 100, 1, 0, 9500),
(11, 'GF02', 'GREFFEL 30CM', 100, 1, 0, 10500),
(12, 'GF03', 'GREFFEL 40CM', 100, 1, 0, 12500),
(13, 'KS20', 'KANSTIN 40X20X10', 100, 1, 0, 1200),
(14, 'KS25', 'KANSTIN 40X25X12/15', 200, 1, 0, 2000),
(15, 'KS28', 'KANSTIN 40X28X12/15', 200, 1, 0, 2000),
(16, 'KS30', 'KANSTIN 60X30X18/22', 300, 1, 0, 3000),
(17, 'KS30B', 'KANSTIN 60X30X22/25', 100, 1, 0, 3500),
(18, 'KS BAN', 'STOPPER BAN', 150, 1, 0, 2000),
(19, 'C01', 'COVER BUIS BETON 80CM', 5, 1, 0, 7500),
(20, 'C02', 'COVER UDITCH 30X30', 200, 1, 0, 3000),
(21, 'C03', 'COVER UDITCH 40X40', 200, 1, 0, 3000),
(22, 'G01', 'GRASS BLOCK 8CM', 500, 200, 10, 1600),
(23, 'C05', 'COVER UDITCH 50X50', 100, 1, 0, 3000),
(24, 'B05', 'BUIS BETON 60X100CM COR', 50, 1, 0, 15000),
(25, 'KS S', 'KANSTIN S', 100, 1, 0, 2000),
(26, 'U03', 'UDITCH 40X60X100', 50, 1, 0, 20000),
(27, 'U01', 'UDITCH 30X30X120', 100, 1, 0, 12000),
(29, 'U02', 'U-DITCH 40X40X120', 100, 1, 0, 15000),
(30, 'U04', 'U-DITCH 50X50X100', 100, 1, 0, 17000),
(31, 'ABU01', 'ABU BATU  PICK UP', 1000, 1, 0, 0),
(32, 'ABU02', 'ABU BATU  COLDESEL ', 1000, 1, 0, 0),
(33, 'B08', 'BUIS BETON 60X100CM TUMBUK', 50, 1, 0, 17500);

-- --------------------------------------------------------

--
-- Table structure for table `setting_catgenteng`
--

CREATE TABLE `setting_catgenteng` (
  `id_settingcat` int(11) NOT NULL,
  `kode_barang` varchar(20) NOT NULL,
  `nama_genteng` varchar(100) NOT NULL,
  `range_genteng` int(11) NOT NULL,
  `toleransi` int(11) NOT NULL,
  `gaji` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `setting_catgenteng`
--

INSERT INTO `setting_catgenteng` (`id_settingcat`, `kode_barang`, `nama_genteng`, `range_genteng`, `toleransi`, `gaji`) VALUES
(8, 'GT01', 'GENTENG BETON GARUDA', 1000, 20, 100),
(9, 'GT02', 'NOK BETON GARUDA ', 1000, 20, 100),
(10, 'GT03', 'GENTENG BETON FLAT', 1000, 20, 100),
(11, 'GT04', 'NOK BETON FLAT', 1000, 20, 100),
(12, 'GT05', 'LISPLANG', 1000, 20, 100);

-- --------------------------------------------------------

--
-- Table structure for table `setting_cetakgenteng`
--

CREATE TABLE `setting_cetakgenteng` (
  `id_settingcetak` int(11) NOT NULL,
  `kode_barang` varchar(20) NOT NULL,
  `nama_genteng` varchar(100) NOT NULL,
  `range_genteng` int(11) NOT NULL,
  `toleransi` int(11) NOT NULL,
  `gaji` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `setting_cetakgenteng`
--

INSERT INTO `setting_cetakgenteng` (`id_settingcetak`, `kode_barang`, `nama_genteng`, `range_genteng`, `toleransi`, `gaji`) VALUES
(8, 'GT01', 'GENTENG BETON GARUDA', 1000, 20, 470),
(9, 'GT02', 'NOK BETON GARUDA ', 1000, 20, 550),
(10, 'GT03', 'GENTENG BETON FLAT', 1000, 20, 470),
(11, 'GT04', 'NOK BETON FLAT', 1000, 20, 550),
(12, 'GT05', 'LISPLANG', 1000, 20, 550);

-- --------------------------------------------------------

--
-- Table structure for table `setting_cetakpaving`
--

CREATE TABLE `setting_cetakpaving` (
  `id_settingpaving` int(11) NOT NULL,
  `kode_barang` varchar(20) NOT NULL,
  `nama_paving` varchar(100) NOT NULL,
  `limit_stock` int(11) NOT NULL,
  `qtymeter` int(11) NOT NULL,
  `range_paving` int(11) NOT NULL,
  `toleransi` int(11) NOT NULL,
  `gaji` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `setting_cetakpaving`
--

INSERT INTO `setting_cetakpaving` (`id_settingpaving`, `kode_barang`, `nama_paving`, `limit_stock`, `qtymeter`, `range_paving`, `toleransi`, `gaji`) VALUES
(3, 'P01', 'PAVING BATA 6CM ABU HDR', 44000, 44, 1200, 60, 1400),
(5, 'P02', 'PAVING BATA 6CM MERAH HDR', 22000, 44, 1200, 60, 1400),
(6, 'P03', 'PAVING BATA 8CM ABU HDR', 44000, 44, 1200, 60, 1500),
(7, 'P04', 'PAVING BATA 8CM MERAH HDR', 44000, 44, 1200, 60, 1500),
(8, 'P05', 'PAVING SEGI ENAM 6CM ABU HDR ', 27000, 27, 600, 30, 1400),
(9, 'P06', 'PAVING SEGI ENAM 6CM MERAH HDR', 13500, 27, 600, 30, 1400),
(10, 'P07', 'PAVING UBIN 6CM ABU HDR', 11000, 22, 600, 30, 1400),
(11, 'P08', 'PAVING UBIN 6CM MERAH HDR', 11000, 22, 600, 30, 1400),
(12, 'P09', 'PAVING ANTIK', 6750, 27, 100, 5, 250);

-- --------------------------------------------------------

--
-- Table structure for table `setting_gajistaff`
--

CREATE TABLE `setting_gajistaff` (
  `id_setting` int(11) NOT NULL,
  `id_kry` int(11) NOT NULL,
  `gaji_staff` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `setting_gajistaff`
--

INSERT INTO `setting_gajistaff` (`id_setting`, `id_kry`, `gaji_staff`) VALUES
(3, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `setting_limitstokgenteng`
--

CREATE TABLE `setting_limitstokgenteng` (
  `id_limit` int(11) NOT NULL,
  `kode_barang` varchar(20) NOT NULL,
  `nama_genteng` text NOT NULL,
  `jml_limit` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `setting_limitstokgenteng`
--

INSERT INTO `setting_limitstokgenteng` (`id_limit`, `kode_barang`, `nama_genteng`, `jml_limit`) VALUES
(8, 'GT01', 'GENTENG BETON GARUDA', 20000),
(9, 'GT02', 'NOK BETON GARUDA ', 10000),
(10, 'GT03', 'GENTENG BETON FLAT', 10000),
(11, 'GT04', 'NOK BETON FLAT', 5000),
(12, 'GT05', 'LISPLANG', 5000);

-- --------------------------------------------------------

--
-- Table structure for table `setting_menustaff`
--

CREATE TABLE `setting_menustaff` (
  `id_setmenu` int(11) NOT NULL,
  `id_kry` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `setting_menustaff`
--

INSERT INTO `setting_menustaff` (`id_setmenu`, `id_kry`, `id_menu`) VALUES
(1, 7, 2),
(2, 7, 3),
(3, 29, 2),
(4, 29, 3),
(5, 29, 4),
(6, 29, 6),
(7, 29, 9),
(8, 29, 10),
(9, 29, 5),
(10, 29, 7),
(12, 29, 8);

-- --------------------------------------------------------

--
-- Table structure for table `setting_tempo`
--

CREATE TABLE `setting_tempo` (
  `id_settempo` int(11) NOT NULL,
  `limit_tempopembeli` int(11) NOT NULL,
  `limit_tempobahanbaku` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `stock_barang`
--

CREATE TABLE `stock_barang` (
  `id_barang` int(11) NOT NULL,
  `kode_barang` varchar(10) NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `jenis_brg` varchar(20) NOT NULL,
  `stock_awal` int(11) NOT NULL,
  `stock_masuk` int(11) NOT NULL,
  `terjual` int(11) NOT NULL,
  `stock_akhir` int(11) NOT NULL,
  `kondisi_stock` varchar(10) NOT NULL,
  `harga` int(11) NOT NULL,
  `modal_stock` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stock_barang`
--

INSERT INTO `stock_barang` (`id_barang`, `kode_barang`, `nama_barang`, `jenis_brg`, `stock_awal`, `stock_masuk`, `terjual`, `stock_akhir`, `kondisi_stock`, `harga`, `modal_stock`) VALUES
(6, 'GT01', 'GENTENG BETON GARUDA', 'Genteng', 450, 2850, 100, 3300, '', 3500, 1575000),
(7, 'P01', 'PAVING BATA 6CM ABU HDR', 'Paving', 5300, 10900, 0, 16200, '', 3400, 18020000);

-- --------------------------------------------------------

--
-- Table structure for table `stock_terjual`
--

CREATE TABLE `stock_terjual` (
  `id_terjual` int(11) NOT NULL,
  `tgl_terjual` date NOT NULL,
  `no_transaksi` varchar(10) NOT NULL,
  `kd_barang` varchar(10) NOT NULL,
  `jml_terjual` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `surat_jalan`
--

CREATE TABLE `surat_jalan` (
  `id_surat_jalan` int(11) NOT NULL,
  `png_jawab` varchar(50) NOT NULL,
  `no_surat_jalan` varchar(20) NOT NULL,
  `id_supir` varchar(50) NOT NULL,
  `pembuat_surat_jln` varchar(20) NOT NULL,
  `no_kendaraan` varchar(10) NOT NULL,
  `no_transaksi` varchar(20) NOT NULL,
  `id_wilayah` int(11) NOT NULL,
  `uang_jalan` varchar(10) NOT NULL,
  `tgl_dibuat` date NOT NULL,
  `catatan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `surat_jalan_feedback`
--

CREATE TABLE `surat_jalan_feedback` (
  `id_surat_jalan` int(11) NOT NULL,
  `png_jawab` varchar(50) NOT NULL,
  `no_surat_jalan` varchar(20) NOT NULL,
  `id_supir` varchar(50) NOT NULL,
  `pembuat_surat_jln` varchar(20) NOT NULL,
  `no_kendaraan` varchar(10) NOT NULL,
  `no_transaksi` varchar(20) NOT NULL,
  `id_wilayah` int(11) NOT NULL,
  `tgl_dibuat` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tempstock_barangkry`
--

CREATE TABLE `tempstock_barangkry` (
  `id_tempstock` int(11) NOT NULL,
  `id_kry` int(11) NOT NULL,
  `tgl` date NOT NULL,
  `kode_brg` varchar(50) NOT NULL,
  `jenis_brg` varchar(100) NOT NULL,
  `qty_brg` int(11) NOT NULL,
  `qty_semen` int(11) NOT NULL,
  `pekerjaan` varchar(20) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tempstock_barangkry`
--

INSERT INTO `tempstock_barangkry` (`id_tempstock`, `id_kry`, `tgl`, `kode_brg`, `jenis_brg`, `qty_brg`, `qty_semen`, `pekerjaan`, `keterangan`) VALUES
(9, 38, '2019-12-15', 'GT01', 'Genteng', 2000, 5, 'Cetak', '');

-- --------------------------------------------------------

--
-- Table structure for table `temp_bayarkasbon`
--

CREATE TABLE `temp_bayarkasbon` (
  `id_tempbyr` int(11) NOT NULL,
  `id_kry` int(11) NOT NULL,
  `nominal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `temp_bayarkasbon`
--

INSERT INTO `temp_bayarkasbon` (`id_tempbyr`, `id_kry`, `nominal`) VALUES
(1, 18, 50000);

-- --------------------------------------------------------

--
-- Table structure for table `temp_order`
--

CREATE TABLE `temp_order` (
  `id_temp` int(11) NOT NULL,
  `no_transaksi` varchar(20) NOT NULL,
  `kode_barang` varchar(20) NOT NULL,
  `nama_barang` text NOT NULL,
  `warna_brg` text NOT NULL,
  `hrg_barang` int(11) NOT NULL,
  `jumlah_beli` int(11) NOT NULL,
  `satuan_brg` varchar(10) NOT NULL,
  `total_hrg` int(11) NOT NULL,
  `sumber_brg` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `temp_order_bahanbaku`
--

CREATE TABLE `temp_order_bahanbaku` (
  `id_detailbahanbaku` int(11) NOT NULL,
  `no_trbahanbaku` varchar(50) NOT NULL,
  `kode_barang` varchar(20) NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `hrg_barang` int(11) NOT NULL,
  `jumlah_beli` int(11) NOT NULL,
  `total_harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `total_bayar_bahanbaku`
--

CREATE TABLE `total_bayar_bahanbaku` (
  `id_total_bayar` int(11) NOT NULL,
  `no_trbahanbaku` varchar(50) NOT NULL,
  `nominal` bigint(20) NOT NULL,
  `sts_lunas` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `total_bayar_bahanbaku`
--

INSERT INTO `total_bayar_bahanbaku` (`id_total_bayar`, `no_trbahanbaku`, `nominal`, `sts_lunas`) VALUES
(3, 'TRO-BB-1', 2147483647, 'Belum Lunas');

-- --------------------------------------------------------

--
-- Table structure for table `total_bayar_pembeli`
--

CREATE TABLE `total_bayar_pembeli` (
  `id_total_bayar` int(11) NOT NULL,
  `no_transaksi` varchar(20) NOT NULL,
  `total_bayar` int(11) NOT NULL,
  `diskon` int(11) NOT NULL,
  `sisa_total` int(11) NOT NULL,
  `jns_pengiriman` varchar(20) NOT NULL,
  `sts_diskon` varchar(10) NOT NULL,
  `sts_lunas` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_admin`
--

CREATE TABLE `user_admin` (
  `id_useradmin` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `status_user` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_admin`
--

INSERT INTO `user_admin` (`id_useradmin`, `username`, `password`, `status_user`) VALUES
(1, 'admin', '1234', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `wilayah`
--

CREATE TABLE `wilayah` (
  `id_wilayah` int(11) NOT NULL,
  `nama_wilayah` varchar(50) NOT NULL,
  `nominal_uangjalan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wilayah`
--

INSERT INTO `wilayah` (`id_wilayah`, `nama_wilayah`, `nominal_uangjalan`) VALUES
(4, 'bekasi', 50000),
(5, 'bogor', 55000),
(6, 'purwakarta', 20000),
(7, 'cikalong wetan', 25000),
(8, 'cikampek', 25000),
(9, 'karawang', 35000),
(10, 'cikarang', 40000),
(11, 'cileunyi', 50000),
(12, 'wanayasa', 25000),
(13, 'depok', 50000),
(14, 'cipeundeuy', 35000),
(15, 'jakarta', 50000),
(16, 'jatiluhur', 25000),
(17, 'kalijati', 25000),
(18, 'padalarang', 40000),
(19, 'patrol', 50000),
(20, 'pamanukan', 35000),
(21, 'pondok gede', 50000),
(22, 'rengasdengklok', 35000),
(23, 'sadang', 20000),
(24, 'subang', 35000),
(25, 'sukamandi', 35000),
(26, 'tanggerang', 60000),
(27, 'wadas', 35000),
(28, 'darangdan', 30000),
(29, 'indramayu', 50000),
(30, 'cilamaya', 35000),
(31, 'plered', 25000),
(32, 'ciater', 40000),
(33, 'bandung', 50000),
(34, 'sumedang', 50000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `backup_stock`
--
ALTER TABLE `backup_stock`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `bahan_baku`
--
ALTER TABLE `bahan_baku`
  ADD PRIMARY KEY (`id_bahanbaku`);

--
-- Indexes for table `barang_rusak`
--
ALTER TABLE `barang_rusak`
  ADD PRIMARY KEY (`id_barangrusak`);

--
-- Indexes for table `bayar_kasbon`
--
ALTER TABLE `bayar_kasbon`
  ADD PRIMARY KEY (`id_bayarkasbon`);

--
-- Indexes for table `detail_order_bahanbaku`
--
ALTER TABLE `detail_order_bahanbaku`
  ADD PRIMARY KEY (`id_detailbahanbaku`);

--
-- Indexes for table `detail_order_pembeli`
--
ALTER TABLE `detail_order_pembeli`
  ADD PRIMARY KEY (`id_detail_order`);

--
-- Indexes for table `faktur`
--
ALTER TABLE `faktur`
  ADD PRIMARY KEY (`id_faktur`);

--
-- Indexes for table `feedback_brg`
--
ALTER TABLE `feedback_brg`
  ADD PRIMARY KEY (`id_feedback`);

--
-- Indexes for table `gaji_karyawanharian`
--
ALTER TABLE `gaji_karyawanharian`
  ADD PRIMARY KEY (`id_gajiharian`);

--
-- Indexes for table `gaji_karyawantetap`
--
ALTER TABLE `gaji_karyawantetap`
  ADD PRIMARY KEY (`id_gaji`);

--
-- Indexes for table `historikerjakaryawan`
--
ALTER TABLE `historikerjakaryawan`
  ADD PRIMARY KEY (`id_histori`);

--
-- Indexes for table `hitung_gajikaryawan`
--
ALTER TABLE `hitung_gajikaryawan`
  ADD PRIMARY KEY (`id_hitunggaji`);

--
-- Indexes for table `inv_kendaraan`
--
ALTER TABLE `inv_kendaraan`
  ADD PRIMARY KEY (`id_inv`);

--
-- Indexes for table `jenis_barang`
--
ALTER TABLE `jenis_barang`
  ADD PRIMARY KEY (`id_jenisbarang`);

--
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`id_kry`);

--
-- Indexes for table `kas`
--
ALTER TABLE `kas`
  ADD PRIMARY KEY (`id_kas`);

--
-- Indexes for table `kasbon_kry`
--
ALTER TABLE `kasbon_kry`
  ADD PRIMARY KEY (`id_kasbon`);

--
-- Indexes for table `level_karyawan`
--
ALTER TABLE `level_karyawan`
  ADD PRIMARY KEY (`id_level`);

--
-- Indexes for table `menu_staff`
--
ALTER TABLE `menu_staff`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indexes for table `order_bahanbaku`
--
ALTER TABLE `order_bahanbaku`
  ADD PRIMARY KEY (`id_orderbahanbaku`);

--
-- Indexes for table `order_pembeli`
--
ALTER TABLE `order_pembeli`
  ADD PRIMARY KEY (`id_order`);

--
-- Indexes for table `pekerjaansupir_tambahan`
--
ALTER TABLE `pekerjaansupir_tambahan`
  ADD PRIMARY KEY (`id_tambahansupir`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`);

--
-- Indexes for table `pembayaran_bahanbaku`
--
ALTER TABLE `pembayaran_bahanbaku`
  ADD PRIMARY KEY (`id_bayar_bahanbaku`);

--
-- Indexes for table `pengeluaran`
--
ALTER TABLE `pengeluaran`
  ADD PRIMARY KEY (`id_pengeluaran`);

--
-- Indexes for table `pengeluaran_harian`
--
ALTER TABLE `pengeluaran_harian`
  ADD PRIMARY KEY (`id_pengeluaranharian`);

--
-- Indexes for table `pengeluaran_lain`
--
ALTER TABLE `pengeluaran_lain`
  ADD PRIMARY KEY (`id_pengeluaran_lain`);

--
-- Indexes for table `rekening_koran`
--
ALTER TABLE `rekening_koran`
  ADD PRIMARY KEY (`id_rekeningkoran`);

--
-- Indexes for table `setting_angkatgenteng`
--
ALTER TABLE `setting_angkatgenteng`
  ADD PRIMARY KEY (`id_settingangkat`);

--
-- Indexes for table `setting_baranglain`
--
ALTER TABLE `setting_baranglain`
  ADD PRIMARY KEY (`id_settingbrglain`);

--
-- Indexes for table `setting_catgenteng`
--
ALTER TABLE `setting_catgenteng`
  ADD PRIMARY KEY (`id_settingcat`);

--
-- Indexes for table `setting_cetakgenteng`
--
ALTER TABLE `setting_cetakgenteng`
  ADD PRIMARY KEY (`id_settingcetak`);

--
-- Indexes for table `setting_cetakpaving`
--
ALTER TABLE `setting_cetakpaving`
  ADD PRIMARY KEY (`id_settingpaving`);

--
-- Indexes for table `setting_gajistaff`
--
ALTER TABLE `setting_gajistaff`
  ADD PRIMARY KEY (`id_setting`);

--
-- Indexes for table `setting_limitstokgenteng`
--
ALTER TABLE `setting_limitstokgenteng`
  ADD PRIMARY KEY (`id_limit`);

--
-- Indexes for table `setting_menustaff`
--
ALTER TABLE `setting_menustaff`
  ADD PRIMARY KEY (`id_setmenu`);

--
-- Indexes for table `setting_tempo`
--
ALTER TABLE `setting_tempo`
  ADD PRIMARY KEY (`id_settempo`);

--
-- Indexes for table `stock_barang`
--
ALTER TABLE `stock_barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `stock_terjual`
--
ALTER TABLE `stock_terjual`
  ADD PRIMARY KEY (`id_terjual`);

--
-- Indexes for table `surat_jalan`
--
ALTER TABLE `surat_jalan`
  ADD PRIMARY KEY (`id_surat_jalan`);

--
-- Indexes for table `surat_jalan_feedback`
--
ALTER TABLE `surat_jalan_feedback`
  ADD PRIMARY KEY (`id_surat_jalan`);

--
-- Indexes for table `tempstock_barangkry`
--
ALTER TABLE `tempstock_barangkry`
  ADD PRIMARY KEY (`id_tempstock`);

--
-- Indexes for table `temp_bayarkasbon`
--
ALTER TABLE `temp_bayarkasbon`
  ADD PRIMARY KEY (`id_tempbyr`);

--
-- Indexes for table `temp_order`
--
ALTER TABLE `temp_order`
  ADD PRIMARY KEY (`id_temp`);

--
-- Indexes for table `temp_order_bahanbaku`
--
ALTER TABLE `temp_order_bahanbaku`
  ADD PRIMARY KEY (`id_detailbahanbaku`);

--
-- Indexes for table `total_bayar_bahanbaku`
--
ALTER TABLE `total_bayar_bahanbaku`
  ADD PRIMARY KEY (`id_total_bayar`);

--
-- Indexes for table `total_bayar_pembeli`
--
ALTER TABLE `total_bayar_pembeli`
  ADD PRIMARY KEY (`id_total_bayar`);

--
-- Indexes for table `user_admin`
--
ALTER TABLE `user_admin`
  ADD PRIMARY KEY (`id_useradmin`);

--
-- Indexes for table `wilayah`
--
ALTER TABLE `wilayah`
  ADD PRIMARY KEY (`id_wilayah`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `backup_stock`
--
ALTER TABLE `backup_stock`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `bahan_baku`
--
ALTER TABLE `bahan_baku`
  MODIFY `id_bahanbaku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `barang_rusak`
--
ALTER TABLE `barang_rusak`
  MODIFY `id_barangrusak` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bayar_kasbon`
--
ALTER TABLE `bayar_kasbon`
  MODIFY `id_bayarkasbon` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `detail_order_bahanbaku`
--
ALTER TABLE `detail_order_bahanbaku`
  MODIFY `id_detailbahanbaku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `detail_order_pembeli`
--
ALTER TABLE `detail_order_pembeli`
  MODIFY `id_detail_order` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `faktur`
--
ALTER TABLE `faktur`
  MODIFY `id_faktur` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `feedback_brg`
--
ALTER TABLE `feedback_brg`
  MODIFY `id_feedback` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gaji_karyawanharian`
--
ALTER TABLE `gaji_karyawanharian`
  MODIFY `id_gajiharian` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gaji_karyawantetap`
--
ALTER TABLE `gaji_karyawantetap`
  MODIFY `id_gaji` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `historikerjakaryawan`
--
ALTER TABLE `historikerjakaryawan`
  MODIFY `id_histori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `hitung_gajikaryawan`
--
ALTER TABLE `hitung_gajikaryawan`
  MODIFY `id_hitunggaji` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `inv_kendaraan`
--
ALTER TABLE `inv_kendaraan`
  MODIFY `id_inv` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jenis_barang`
--
ALTER TABLE `jenis_barang`
  MODIFY `id_jenisbarang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `karyawan`
--
ALTER TABLE `karyawan`
  MODIFY `id_kry` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `kas`
--
ALTER TABLE `kas`
  MODIFY `id_kas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `kasbon_kry`
--
ALTER TABLE `kasbon_kry`
  MODIFY `id_kasbon` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `level_karyawan`
--
ALTER TABLE `level_karyawan`
  MODIFY `id_level` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `menu_staff`
--
ALTER TABLE `menu_staff`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `order_bahanbaku`
--
ALTER TABLE `order_bahanbaku`
  MODIFY `id_orderbahanbaku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `order_pembeli`
--
ALTER TABLE `order_pembeli`
  MODIFY `id_order` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pekerjaansupir_tambahan`
--
ALTER TABLE `pekerjaansupir_tambahan`
  MODIFY `id_tambahansupir` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pembayaran_bahanbaku`
--
ALTER TABLE `pembayaran_bahanbaku`
  MODIFY `id_bayar_bahanbaku` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pengeluaran`
--
ALTER TABLE `pengeluaran`
  MODIFY `id_pengeluaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pengeluaran_harian`
--
ALTER TABLE `pengeluaran_harian`
  MODIFY `id_pengeluaranharian` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pengeluaran_lain`
--
ALTER TABLE `pengeluaran_lain`
  MODIFY `id_pengeluaran_lain` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rekening_koran`
--
ALTER TABLE `rekening_koran`
  MODIFY `id_rekeningkoran` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `setting_angkatgenteng`
--
ALTER TABLE `setting_angkatgenteng`
  MODIFY `id_settingangkat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `setting_baranglain`
--
ALTER TABLE `setting_baranglain`
  MODIFY `id_settingbrglain` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `setting_catgenteng`
--
ALTER TABLE `setting_catgenteng`
  MODIFY `id_settingcat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `setting_cetakgenteng`
--
ALTER TABLE `setting_cetakgenteng`
  MODIFY `id_settingcetak` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `setting_cetakpaving`
--
ALTER TABLE `setting_cetakpaving`
  MODIFY `id_settingpaving` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `setting_gajistaff`
--
ALTER TABLE `setting_gajistaff`
  MODIFY `id_setting` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `setting_limitstokgenteng`
--
ALTER TABLE `setting_limitstokgenteng`
  MODIFY `id_limit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `setting_menustaff`
--
ALTER TABLE `setting_menustaff`
  MODIFY `id_setmenu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `setting_tempo`
--
ALTER TABLE `setting_tempo`
  MODIFY `id_settempo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `stock_barang`
--
ALTER TABLE `stock_barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `stock_terjual`
--
ALTER TABLE `stock_terjual`
  MODIFY `id_terjual` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `surat_jalan`
--
ALTER TABLE `surat_jalan`
  MODIFY `id_surat_jalan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `surat_jalan_feedback`
--
ALTER TABLE `surat_jalan_feedback`
  MODIFY `id_surat_jalan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tempstock_barangkry`
--
ALTER TABLE `tempstock_barangkry`
  MODIFY `id_tempstock` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `temp_bayarkasbon`
--
ALTER TABLE `temp_bayarkasbon`
  MODIFY `id_tempbyr` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `temp_order`
--
ALTER TABLE `temp_order`
  MODIFY `id_temp` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `temp_order_bahanbaku`
--
ALTER TABLE `temp_order_bahanbaku`
  MODIFY `id_detailbahanbaku` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `total_bayar_bahanbaku`
--
ALTER TABLE `total_bayar_bahanbaku`
  MODIFY `id_total_bayar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `total_bayar_pembeli`
--
ALTER TABLE `total_bayar_pembeli`
  MODIFY `id_total_bayar` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_admin`
--
ALTER TABLE `user_admin`
  MODIFY `id_useradmin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `wilayah`
--
ALTER TABLE `wilayah`
  MODIFY `id_wilayah` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
