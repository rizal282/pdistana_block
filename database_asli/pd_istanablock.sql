-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 17, 2019 at 05:50 AM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.2.5

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

--
-- Dumping data for table `barang_rusak`
--

INSERT INTO `barang_rusak` (`id_barangrusak`, `no_transaksi`, `kode_brg`, `qty_barang`, `satuan_brg`, `sumber_brg`, `refund`, `bayar_refund`, `nominal_refund`) VALUES
(1, 'TR-2', 'G012', 10, '-', 'Internal', 'Refund Barang', 'Pilih :', 0),
(2, 'TR-3', 'G012', 9, '-', 'Internal', 'Refund Barang', 'Pilih :', 0);

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

--
-- Dumping data for table `detail_order_pembeli`
--

INSERT INTO `detail_order_pembeli` (`id_detail_order`, `no_transaksi`, `kode_barang`, `nama_barang`, `warna_brg`, `hrg_barang`, `jumlah_beli`, `satuan_brg`, `total_hrg`, `sumber_brg`) VALUES
(1, 'TR-1', 'G012', 'Genteng Beton', 'Natural', 1200, 100, '-', 120000, 'Internal'),
(2, 'TR-2', 'G012', 'Genteng Beton', 'Merah', 1200, 1000, '-', 1200000, 'Internal'),
(3, 'TR-3', 'G012', 'Genteng Beton', 'biru ', 1200, 100, '-', 120000, 'Internal'),
(4, 'TR-4', 'G012', 'Genteng Beton', 'Merah', 1200, 100, '-', 120000, 'Internal'),
(5, 'TR-5', 'G012', 'Genteng Beton', 'Biru', 1200, 100, '-', 120000, 'Internal'),
(6, 'TR-6', 'G012', 'Genteng Beton', 'Biru', 13000, 100, '-', 1300000, 'Internal');

-- --------------------------------------------------------

--
-- Table structure for table `faktur`
--

CREATE TABLE `faktur` (
  `id_faktur` int(11) NOT NULL,
  `no_faktur` varchar(20) NOT NULL,
  `no_transaksi` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faktur`
--

INSERT INTO `faktur` (`id_faktur`, `no_faktur`, `no_transaksi`) VALUES
(1, 'PD-ISTNB-FA-1', 'TR-1'),
(2, 'PD-ISTNB-FA-2', 'TR-2'),
(3, 'PD-ISTNB-FA-3', 'TR-3'),
(4, 'PD-ISTNB-FA-4', 'TR-4'),
(5, 'PD-ISTNB-FA-5', 'TR-5'),
(6, 'PD-ISTNB-FA-6', 'TR-6');

-- --------------------------------------------------------

--
-- Table structure for table `feedback_brg`
--

CREATE TABLE `feedback_brg` (
  `id_feedback` int(11) NOT NULL,
  `no_transaksi` varchar(20) NOT NULL,
  `brg_rusak` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedback_brg`
--

INSERT INTO `feedback_brg` (`id_feedback`, `no_transaksi`, `brg_rusak`) VALUES
(1, 'TR-1', 'Tidak'),
(2, 'TR-2', 'Ada'),
(3, 'TR-3', 'Ada');

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
(1, 'Genteng');

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
(1, 'tina', 'pwk', '2019-09-03', 'tes', 'Staff', '', '', '1970-01-01', '1234'),
(2, 'NANANG', 'PWK', '2019-09-03', 'TES', 'Supir', '1234', 'A', '2019-09-03', '');

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
(1, 27211002, 12891200, 77488000);

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

--
-- Dumping data for table `order_pembeli`
--

INSERT INTO `order_pembeli` (`id_order`, `no_transaksi`, `tgl_beli`, `nama_pembeli`, `nohp_pembeli`, `alamat_pembeli`, `wilayah`, `pembayaran`, `jatuh_tempo`, `keterangan`, `sts_order`, `sts_suratjalan`, `sts_kirim`, `feedback`, `selesai`, `baca_notif`) VALUES
(1, 'TR-1', '2019-09-03', 'tes', '1234', 'tes', 'Wanayasa', 'Tunai', '0000-00-00', '', 'Proses', 'Sudah', 'Dikirim', 'Feedback', 'Selesai', 'Belum'),
(2, 'TR-2', '2019-09-07', 'Deni', '1234', 'Purwakarta', 'Wanayasa', 'Tunai', '0000-00-00', '', 'Proses', 'Sudah', 'Dikirim', 'Feedback', 'Selesai', 'Belum'),
(3, 'TR-3', '2019-09-10', 'tes 2', '1234', 'wanayasa', 'Wanayasa', 'Tunai', '0000-00-00', '', 'Proses', 'Sudah', 'Dikirim', 'Feedback', 'Selesai', 'Belum'),
(4, 'TR-4', '2019-09-14', 'deni', '1234', 'wna', 'Wanayasa', 'Tempo', '2019-09-28', '', 'Proses', 'Sudah', '', '', '', 'Belum'),
(5, 'TR-5', '2019-09-16', 'abdul', '1234', 'sagala herang', 'Wanayasa', 'Tempo', '2019-09-28', '', 'Proses', 'Sudah', '', '', '', 'Belum'),
(6, 'TR-6', '2019-09-17', 'dani', '1234', 'wanayasa', 'Wanayasa', 'Tempo', '2019-09-27', '', 'Proses', 'Sudah', '', '', '', 'Belum');

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

--
-- Dumping data for table `pekerjaansupir_tambahan`
--

INSERT INTO `pekerjaansupir_tambahan` (`id_tambahansupir`, `tanggal`, `id_supir`, `pekerjaan`, `nominal`) VALUES
(1, '2019-09-07', 0, 'Antar Barang Pengganti yang Rusak', 200000),
(2, '2019-09-10', 0, 'Antar Barang Pengganti yang Rusak', 200000);

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
  `tgl_bayar` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `no_transaksi`, `nominal_dp`, `nominal_cash`, `sisa_tagihan`, `tgl_bayar`) VALUES
(1, 'TR-1', 0, 120000, 0, '2019-09-03'),
(2, 'TR-2', 0, 1200000, 0, '2019-09-07'),
(3, 'TR-3', 0, 120000, 0, '2019-09-10'),
(4, 'TR-4', 120000, 0, 0, '2019-09-14'),
(5, 'TR-5', 120000, 0, 0, '2019-09-16'),
(6, 'TR-6', 1300000, 0, 0, '2019-09-17');

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
(1, '2019-09-03', 0, 'TR-1', 'Uang Jalan Supir NANANG', 'Pengeluaran Uang Jalan', 200000, '', '', ''),
(2, '2019-09-07', 0, 'TR-2', 'Uang Jalan Supir NANANG', 'Pengeluaran Uang Jalan', 200000, '', '', ''),
(3, '2019-09-07', 0, 'TR-2', 'Uang Jalan Supir NANANG', 'Pengeluaran Uang Jalan', 200000, '', '', ''),
(4, '2019-09-10', 0, 'TR-3', 'Uang Jalan Supir NANANG', 'Pengeluaran Uang Jalan', 200000, '', '', ''),
(5, '2019-09-10', 0, 'TR-3', 'Uang Jalan Supir NANANG', 'Pengeluaran Uang Jalan', 200000, '', '', ''),
(6, '2019-09-14', 0, 'TR-4', 'Uang Jalan Supir NANANG', 'Pengeluaran Uang Jalan', 200000, '', '', ''),
(7, '2019-09-16', 0, 'TR-5', 'Uang Jalan Supir NANANG', 'Pengeluaran Uang Jalan', 200000, '', '', '');

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
(1, 'G012', 'Genteng Beton', 150, 5, 1000);

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
(1, 'G012', 'Genteng Beton', 150, 5, 1100);

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
(1, 'G012', 'Genteng Beton', 150, 5, 1200);

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

-- --------------------------------------------------------

--
-- Table structure for table `setting_gajistaff`
--

CREATE TABLE `setting_gajistaff` (
  `id_setting` int(11) NOT NULL,
  `id_kry` int(11) NOT NULL,
  `gaji_staff` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(1, 'G012', 'Genteng Beton', 130);

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
(1, 1, 8);

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
(1, 'G012', 'Genteng Beton', 'Genteng', 1200, 1200, 0, 1991, '', 1200, 2520000);

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

--
-- Dumping data for table `stock_terjual`
--

INSERT INTO `stock_terjual` (`id_terjual`, `tgl_terjual`, `no_transaksi`, `kd_barang`, `jml_terjual`) VALUES
(1, '2019-09-03', 'TR-1', 'G012', 100),
(2, '2019-09-06', 'TR-2', 'G012', 1010),
(3, '2019-09-10', 'TR-3', 'G012', 109),
(4, '2019-09-14', 'TR-4', 'G012', 100),
(5, '2019-09-16', 'TR-5', 'G012', 100),
(6, '2019-09-17', 'TR-6', 'G012', 100);

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

--
-- Dumping data for table `surat_jalan`
--

INSERT INTO `surat_jalan` (`id_surat_jalan`, `png_jawab`, `no_surat_jalan`, `id_supir`, `pembuat_surat_jln`, `no_kendaraan`, `no_transaksi`, `id_wilayah`, `uang_jalan`, `tgl_dibuat`, `catatan`) VALUES
(1, 'TES', 'PD-ISTNB-03092019-1', 'NANANG', 'TES', '1234 AS', 'TR-1', 1, 'Ya', '2019-09-03', 'TES'),
(2, 'dodi', 'PD-ISTNB-06092019-2', 'NANANG', 'tina', 'T 1234', 'TR-2', 1, 'Ya', '2019-09-07', 'tes'),
(3, 'tes', 'PD-ISTNB-10092019-3', 'NANANG', 'tes', 'T 1234 AX', 'TR-3', 1, 'Ya', '2019-09-10', 'TES'),
(4, 'tina', 'PD-ISTNB-14092019-4', 'NANANG', 'toni', 't 1234', 'TR-4', 1, 'Ya', '2019-09-14', 'dekat masjid'),
(5, 'ade', 'PD-ISTNB-16092019-5', 'NANANG', 'adi', 'A 123', 'TR-5', 1, 'Ya', '2019-09-16', 'testt'),
(6, 'deden', 'PD-ISTNB-17092019-6', 'joki', 'tina', 't 123 as', 'TR-6', 1, 'Tidak', '2019-09-17', 'dekat masjid');

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

--
-- Dumping data for table `surat_jalan_feedback`
--

INSERT INTO `surat_jalan_feedback` (`id_surat_jalan`, `png_jawab`, `no_surat_jalan`, `id_supir`, `pembuat_surat_jln`, `no_kendaraan`, `no_transaksi`, `id_wilayah`, `tgl_dibuat`) VALUES
(1, 'dodi', 'PD-ISTNB-06092019-1', 'NANANG', 'tina', 'T 123', 'TR-2', 1, '2019-09-07'),
(2, 'TES LAGI YA', 'PD-ISTNB-10092019-2', 'NANANG', 'TES INI LAGI', 'T 1234 AS', 'TR-3', 1, '2019-09-10');

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

--
-- Dumping data for table `total_bayar_pembeli`
--

INSERT INTO `total_bayar_pembeli` (`id_total_bayar`, `no_transaksi`, `total_bayar`, `diskon`, `sisa_total`, `jns_pengiriman`, `sts_diskon`, `sts_lunas`) VALUES
(1, 'TR-1', 120000, 0, 120000, 'Diantar', 'diskon', 'Sudah Lunas'),
(2, 'TR-2', 1200000, 0, 1200000, 'Diantar', 'diskon', 'Sudah Lunas'),
(3, 'TR-3', 120000, 0, 120000, 'Diantar', 'diskon', 'Sudah Lunas'),
(4, 'TR-4', 120000, 0, 120000, 'Diantar', 'diskon', 'Belum Lunas'),
(5, 'TR-5', 120000, 0, 120000, 'Diantar', 'diskon', 'Sudah Lunas'),
(6, 'TR-6', 1300000, 0, 1300000, 'Sendiri', 'diskon', 'Sudah Lunas');

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
(1, 'Wanayasa', 200000);

--
-- Indexes for dumped tables
--

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
-- AUTO_INCREMENT for table `bahan_baku`
--
ALTER TABLE `bahan_baku`
  MODIFY `id_bahanbaku` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `barang_rusak`
--
ALTER TABLE `barang_rusak`
  MODIFY `id_barangrusak` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `bayar_kasbon`
--
ALTER TABLE `bayar_kasbon`
  MODIFY `id_bayarkasbon` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `detail_order_bahanbaku`
--
ALTER TABLE `detail_order_bahanbaku`
  MODIFY `id_detailbahanbaku` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `detail_order_pembeli`
--
ALTER TABLE `detail_order_pembeli`
  MODIFY `id_detail_order` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `faktur`
--
ALTER TABLE `faktur`
  MODIFY `id_faktur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `feedback_brg`
--
ALTER TABLE `feedback_brg`
  MODIFY `id_feedback` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `gaji_karyawanharian`
--
ALTER TABLE `gaji_karyawanharian`
  MODIFY `id_gajiharian` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gaji_karyawantetap`
--
ALTER TABLE `gaji_karyawantetap`
  MODIFY `id_gaji` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `historikerjakaryawan`
--
ALTER TABLE `historikerjakaryawan`
  MODIFY `id_histori` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hitung_gajikaryawan`
--
ALTER TABLE `hitung_gajikaryawan`
  MODIFY `id_hitunggaji` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `inv_kendaraan`
--
ALTER TABLE `inv_kendaraan`
  MODIFY `id_inv` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jenis_barang`
--
ALTER TABLE `jenis_barang`
  MODIFY `id_jenisbarang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `karyawan`
--
ALTER TABLE `karyawan`
  MODIFY `id_kry` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `kas`
--
ALTER TABLE `kas`
  MODIFY `id_kas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `kasbon_kry`
--
ALTER TABLE `kasbon_kry`
  MODIFY `id_kasbon` int(11) NOT NULL AUTO_INCREMENT;

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
  MODIFY `id_orderbahanbaku` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_pembeli`
--
ALTER TABLE `order_pembeli`
  MODIFY `id_order` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pekerjaansupir_tambahan`
--
ALTER TABLE `pekerjaansupir_tambahan`
  MODIFY `id_tambahansupir` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pembayaran_bahanbaku`
--
ALTER TABLE `pembayaran_bahanbaku`
  MODIFY `id_bayar_bahanbaku` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pengeluaran`
--
ALTER TABLE `pengeluaran`
  MODIFY `id_pengeluaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
  MODIFY `id_settingangkat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `setting_baranglain`
--
ALTER TABLE `setting_baranglain`
  MODIFY `id_settingbrglain` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `setting_catgenteng`
--
ALTER TABLE `setting_catgenteng`
  MODIFY `id_settingcat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `setting_cetakgenteng`
--
ALTER TABLE `setting_cetakgenteng`
  MODIFY `id_settingcetak` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `setting_cetakpaving`
--
ALTER TABLE `setting_cetakpaving`
  MODIFY `id_settingpaving` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `setting_gajistaff`
--
ALTER TABLE `setting_gajistaff`
  MODIFY `id_setting` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `setting_limitstokgenteng`
--
ALTER TABLE `setting_limitstokgenteng`
  MODIFY `id_limit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `setting_menustaff`
--
ALTER TABLE `setting_menustaff`
  MODIFY `id_setmenu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `setting_tempo`
--
ALTER TABLE `setting_tempo`
  MODIFY `id_settempo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `stock_barang`
--
ALTER TABLE `stock_barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `stock_terjual`
--
ALTER TABLE `stock_terjual`
  MODIFY `id_terjual` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `surat_jalan`
--
ALTER TABLE `surat_jalan`
  MODIFY `id_surat_jalan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `surat_jalan_feedback`
--
ALTER TABLE `surat_jalan_feedback`
  MODIFY `id_surat_jalan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tempstock_barangkry`
--
ALTER TABLE `tempstock_barangkry`
  MODIFY `id_tempstock` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `temp_order`
--
ALTER TABLE `temp_order`
  MODIFY `id_temp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `temp_order_bahanbaku`
--
ALTER TABLE `temp_order_bahanbaku`
  MODIFY `id_detailbahanbaku` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `total_bayar_bahanbaku`
--
ALTER TABLE `total_bayar_bahanbaku`
  MODIFY `id_total_bayar` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `total_bayar_pembeli`
--
ALTER TABLE `total_bayar_pembeli`
  MODIFY `id_total_bayar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user_admin`
--
ALTER TABLE `user_admin`
  MODIFY `id_useradmin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `wilayah`
--
ALTER TABLE `wilayah`
  MODIFY `id_wilayah` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
