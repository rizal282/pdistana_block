

CREATE TABLE `bahan_baku` (
  `id_bahanbaku` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `nama_bahanbaku` varchar(50) NOT NULL,
  `jumlah_barang` int(11) NOT NULL,
  `satuan` varchar(20) NOT NULL,
  `harga_barang` int(11) NOT NULL,
  `bongkar` varchar(50) NOT NULL,
  `total_harga` bigint(20) NOT NULL,
  `keterangan` text NOT NULL,
  PRIMARY KEY (`id_bahanbaku`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO bahan_baku VALUES("1","2019-08-25","abu batu","300","Rit","1000","","300000","tes");



CREATE TABLE `barang_rusak` (
  `id_barangrusak` int(11) NOT NULL,
  `no_transaksi` varchar(20) NOT NULL,
  `kode_brg` varchar(50) NOT NULL,
  `qty_barang` int(11) NOT NULL,
  `satuan_brg` varchar(10) NOT NULL,
  `sumber_brg` varchar(20) NOT NULL,
  `refund` varchar(20) NOT NULL,
  `bayar_refund` varchar(10) NOT NULL,
  `nominal_refund` int(11) NOT NULL,
  PRIMARY KEY (`id_barangrusak`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




CREATE TABLE `bayar_kasbon` (
  `id_bayarkasbon` int(11) NOT NULL,
  `id_kry` int(11) NOT NULL,
  `nominal_bayar` int(11) NOT NULL,
  `sisa_kasbon` int(11) NOT NULL,
  `tgl_bayar` date NOT NULL,
  PRIMARY KEY (`id_bayarkasbon`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO bayar_kasbon VALUES("1","2","50000","50000","2019-08-27");



CREATE TABLE `detail_order_bahanbaku` (
  `id_detailbahanbaku` int(11) NOT NULL,
  `no_trbahanbaku` varchar(50) NOT NULL,
  `kode_barang` varchar(20) NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `hrg_barang` int(11) NOT NULL,
  `jumlah_beli` int(11) NOT NULL,
  `total_harga` int(11) NOT NULL,
  PRIMARY KEY (`id_detailbahanbaku`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO detail_order_bahanbaku VALUES("1","TRO-BB-1","","abu batu","1000","200","200000");



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
  `sumber_brg` varchar(50) NOT NULL,
  PRIMARY KEY (`id_detail_order`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO detail_order_pembeli VALUES("1","TR-1","P01","Paving","biru","2000","200","-","400000","Internal");



CREATE TABLE `faktur` (
  `id_faktur` int(11) NOT NULL,
  `no_faktur` varchar(20) NOT NULL,
  `no_transaksi` varchar(20) NOT NULL,
  PRIMARY KEY (`id_faktur`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO faktur VALUES("1","PD-ISTNB-FA-1","TR-1");



CREATE TABLE `feedback_brg` (
  `id_feedback` int(11) NOT NULL,
  `no_transaksi` varchar(20) NOT NULL,
  `brg_rusak` varchar(10) NOT NULL,
  PRIMARY KEY (`id_feedback`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




CREATE TABLE `gaji_karyawanharian` (
  `id_gajiharian` int(11) NOT NULL,
  `tgl_gaji` date NOT NULL,
  `nama_kry` varchar(100) NOT NULL,
  `total_gaji` int(11) NOT NULL,
  `pekerjaan` varchar(100) NOT NULL,
  PRIMARY KEY (`id_gajiharian`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




CREATE TABLE `gaji_karyawantetap` (
  `id_gaji` int(11) NOT NULL,
  `tgl_gaji` date NOT NULL,
  `tgl_awal_periode` date NOT NULL,
  `tgl_akhir_periode` date NOT NULL,
  `id_kry` int(11) NOT NULL,
  `total_gaji` int(11) NOT NULL,
  `bayar_kasbon` int(11) NOT NULL,
  `sisa_upah` int(11) NOT NULL,
  `keterangan` text NOT NULL,
  PRIMARY KEY (`id_gaji`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO gaji_karyawantetap VALUES("1","2019-08-27","2019-08-26","2019-08-27","2","1930000","50000","1880000","ok");



CREATE TABLE `historikerjakaryawan` (
  `id_histori` int(11) NOT NULL,
  `id_kry` int(11) NOT NULL,
  `tgl` date NOT NULL,
  `kode_brg` varchar(50) NOT NULL,
  `jenis_brg` varchar(100) NOT NULL,
  `qty_brg` int(11) NOT NULL,
  `qty_semen` int(11) NOT NULL,
  `pekerjaan` varchar(20) NOT NULL,
  `keterangan` text NOT NULL,
  PRIMARY KEY (`id_histori`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO historikerjakaryawan VALUES("1","1","2019-08-27","G01","Paving","1000","10","Cetak","");
INSERT INTO historikerjakaryawan VALUES("2","1","2019-08-27","G01","Genteng","600","0","Angkat","");
INSERT INTO historikerjakaryawan VALUES("3","1","2019-08-27","G01","Genteng","300","0","Cat","");
INSERT INTO historikerjakaryawan VALUES("4","2","2019-08-27","P01","Paving","1000","10","Cetak","");
INSERT INTO historikerjakaryawan VALUES("5","1","2019-08-28","G01","Genteng","600","5","Cetak","");
INSERT INTO historikerjakaryawan VALUES("6","1","2019-08-28","G01","Genteng","300","0","Angkat","");
INSERT INTO historikerjakaryawan VALUES("7","1","2019-08-28","G01","Genteng","300","0","Cat","");



CREATE TABLE `hitung_gajikaryawan` (
  `id_hitunggaji` int(11) NOT NULL,
  `id_kry` int(11) NOT NULL,
  `tgl_gaji` date NOT NULL,
  `sub_totalgaji` int(11) NOT NULL,
  `kode_barang` text NOT NULL,
  `pekerjaan` text NOT NULL,
  `tgl_kerjaawal` date NOT NULL,
  `tgl_kerjaakhir` date NOT NULL,
  PRIMARY KEY (`id_hitunggaji`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO hitung_gajikaryawan VALUES("1","2","2019-08-27","965000","P01","Cetak","2019-08-26","2019-08-28");
INSERT INTO hitung_gajikaryawan VALUES("2","1","2019-08-27","570000","G01","Cetak","2019-08-26","2019-08-28");
INSERT INTO hitung_gajikaryawan VALUES("3","1","2019-08-28","570000","G01","Cetak","2019-08-27","2019-08-28");
INSERT INTO hitung_gajikaryawan VALUES("4","2","2019-08-28","965000","P01","Cetak","2019-08-27","2019-08-28");
INSERT INTO hitung_gajikaryawan VALUES("5","2","2019-08-27","965000","P01","Cetak","2019-08-26","2019-08-27");



CREATE TABLE `inv_kendaraan` (
  `id_inv` int(11) NOT NULL,
  `jns_kendaraan` varchar(50) NOT NULL,
  `merek` varchar(50) NOT NULL,
  `plat_nomor` varchar(15) NOT NULL,
  `tgl_servis` date NOT NULL,
  `keterangan` text NOT NULL,
  PRIMARY KEY (`id_inv`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




CREATE TABLE `jenis_barang` (
  `id_jenisbarang` int(11) NOT NULL,
  `nama_jenisbarang` text NOT NULL,
  PRIMARY KEY (`id_jenisbarang`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO jenis_barang VALUES("1","Paving");
INSERT INTO jenis_barang VALUES("2","Genteng");



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
  `password` varchar(100) NOT NULL,
  PRIMARY KEY (`id_kry`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO karyawan VALUES("1","Asep","pwk","2019-08-22","pwk","Produksi","","","0000-00-00","");
INSERT INTO karyawan VALUES("2","sumi","pwk","2019-08-20","pwk","Produksi","","","1970-01-01","");
INSERT INTO karyawan VALUES("3","tina","pwk","2019-08-06","pwk","Staff","","","1970-01-01","1234");



CREATE TABLE `kas` (
  `id_kas` int(11) NOT NULL,
  `kas_kecil` int(11) NOT NULL,
  `kas_besar` int(11) NOT NULL,
  `kas_bank` int(11) NOT NULL,
  PRIMARY KEY (`id_kas`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO kas VALUES("1","4150000","18980000","72000000");



CREATE TABLE `kasbon_kry` (
  `id_kasbon` int(11) NOT NULL,
  `tgl_kasbon` date NOT NULL,
  `id_kry` int(11) NOT NULL,
  `group_kry` varchar(20) NOT NULL,
  `nominal` int(11) NOT NULL,
  `sts_kasbon` varchar(20) NOT NULL,
  PRIMARY KEY (`id_kasbon`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO kasbon_kry VALUES("1","2019-08-27","1","","500000","Belum Lunas");
INSERT INTO kasbon_kry VALUES("2","2019-08-27","2","","100000","Belum Lunas");



CREATE TABLE `level_karyawan` (
  `id_level` int(11) NOT NULL,
  `nama_level` varchar(50) NOT NULL,
  PRIMARY KEY (`id_level`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO level_karyawan VALUES("2","Lapangan");
INSERT INTO level_karyawan VALUES("3","Staff");
INSERT INTO level_karyawan VALUES("4","Supir");
INSERT INTO level_karyawan VALUES("6","Produksi");



CREATE TABLE `menu_staff` (
  `id_menu` int(11) NOT NULL,
  `nama_menu` varchar(50) NOT NULL,
  `value` varchar(50) NOT NULL,
  PRIMARY KEY (`id_menu`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO menu_staff VALUES("1","Home","home");
INSERT INTO menu_staff VALUES("2","Stock Barang","stokbarang");
INSERT INTO menu_staff VALUES("3","Order Pembeli","order_pembeli");
INSERT INTO menu_staff VALUES("4","Pembayaran","pembayaran");
INSERT INTO menu_staff VALUES("5","Dokumen","dokumen");
INSERT INTO menu_staff VALUES("6","Pengeluaran","pengeluaran");
INSERT INTO menu_staff VALUES("7","Karyawan","karyawan");
INSERT INTO menu_staff VALUES("8","Keuangan","keuangan");
INSERT INTO menu_staff VALUES("9","Inv. Kendaraan","kendaraan");
INSERT INTO menu_staff VALUES("10","Bahan Baku","bahanbaku");
INSERT INTO menu_staff VALUES("11","Laporan","laporan");



CREATE TABLE `order_bahanbaku` (
  `id_orderbahanbaku` int(11) NOT NULL,
  `no_trbahanbaku` varchar(20) NOT NULL,
  `tgl_pembelian` date NOT NULL,
  `nama_supplier` varchar(100) NOT NULL,
  `pembayaran` varchar(50) NOT NULL,
  `tgl_tempo` date NOT NULL,
  `keterangan` text NOT NULL,
  PRIMARY KEY (`id_orderbahanbaku`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO order_bahanbaku VALUES("1","TRO-BB-1","2019-08-25","tdf","Tempo","2019-08-29","wef");



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
  `baca_notif` varchar(10) NOT NULL,
  PRIMARY KEY (`id_order`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO order_pembeli VALUES("1","TR-1","2019-08-25","tes","123","wanayasa","wanayasa","Tempo","2019-08-28","tes","Proses","Belum","","","","Belum");



CREATE TABLE `pekerjaansupir_tambahan` (
  `id_tambahansupir` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `id_supir` int(11) NOT NULL,
  `pekerjaan` text NOT NULL,
  `nominal` bigint(20) NOT NULL,
  PRIMARY KEY (`id_tambahansupir`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




CREATE TABLE `pembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `no_transaksi` varchar(20) NOT NULL,
  `nominal_dp` int(11) NOT NULL,
  `nominal_cash` int(11) NOT NULL,
  `sisa_tagihan` int(11) NOT NULL,
  `tgl_bayar` date NOT NULL,
  PRIMARY KEY (`id_pembayaran`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO pembayaran VALUES("1","TR-1","150000","0","250000","2019-08-25");



CREATE TABLE `pembayaran_bahanbaku` (
  `id_bayar_bahanbaku` int(11) NOT NULL,
  `no_transaksi` varchar(20) NOT NULL,
  `nominal_dp` int(11) NOT NULL,
  `nominal_cash` int(11) NOT NULL,
  `sisa_tagihan` int(11) NOT NULL,
  `tgl_bayar` date NOT NULL,
  PRIMARY KEY (`id_bayar_bahanbaku`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO pembayaran_bahanbaku VALUES("1","TRO-BB-1","100000","0","100000","2019-08-25");



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
  `keterangan` text NOT NULL,
  PRIMARY KEY (`id_pengeluaran`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO pengeluaran VALUES("1","2019-08-25","0","TRO-BB-1","Bayar Tempo Bahan Baku","Belanja Bahan Baku","100000","","","");
INSERT INTO pengeluaran VALUES("2","2019-08-27","1","","Kasbon Karyawan","Kasbon Karyawan","500000","","","");
INSERT INTO pengeluaran VALUES("3","2019-08-27","2","","Kasbon Karyawan","Kasbon Karyawan","100000","","","");
INSERT INTO pengeluaran VALUES("4","2019-08-27","0","","Gaji Karyawan Tetap sumi","Penggajian Karyawan Staff dan Lapangan","1880000","","","");



CREATE TABLE `pengeluaran_harian` (
  `id_pengeluaranharian` int(11) NOT NULL,
  `tgl_pengeluaran` date NOT NULL,
  `nama_beban` varchar(100) NOT NULL,
  `nominal` int(11) NOT NULL,
  `noreferensi` varchar(100) NOT NULL,
  `keterangan` text NOT NULL,
  PRIMARY KEY (`id_pengeluaranharian`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




CREATE TABLE `pengeluaran_lain` (
  `id_pengeluaran_lain` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `nama_beban` varchar(50) NOT NULL,
  `no_pelanggan` varchar(50) NOT NULL,
  `nominal` bigint(20) NOT NULL,
  `keterangan` text NOT NULL,
  PRIMARY KEY (`id_pengeluaran_lain`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




CREATE TABLE `rekening_koran` (
  `id_rekeningkoran` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `keterangan` text NOT NULL,
  `mutasi` bigint(20) NOT NULL,
  `kreditdebit` varchar(20) NOT NULL,
  PRIMARY KEY (`id_rekeningkoran`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO rekening_koran VALUES("1","2019-08-27","kas","2000000","Kredit");



CREATE TABLE `setting_angkatgenteng` (
  `id_settingangkat` int(11) NOT NULL,
  `kode_barang` varchar(20) NOT NULL,
  `nama_genteng` varchar(100) NOT NULL,
  `range_genteng` int(11) NOT NULL,
  `toleransi` int(11) NOT NULL,
  `gaji` int(11) NOT NULL,
  PRIMARY KEY (`id_settingangkat`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO setting_angkatgenteng VALUES("1","G01","Genteng Beton","150","5","1000");



CREATE TABLE `setting_baranglain` (
  `id_settingbrglain` int(11) NOT NULL,
  `kode_barang` varchar(20) NOT NULL,
  `nama_brglain` varchar(100) NOT NULL,
  `limit_stock` int(11) NOT NULL,
  `range_brglain` int(11) NOT NULL,
  `toleransi` int(11) NOT NULL,
  `gaji` int(11) NOT NULL,
  PRIMARY KEY (`id_settingbrglain`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




CREATE TABLE `setting_catgenteng` (
  `id_settingcat` int(11) NOT NULL,
  `kode_barang` varchar(20) NOT NULL,
  `nama_genteng` varchar(100) NOT NULL,
  `range_genteng` int(11) NOT NULL,
  `toleransi` int(11) NOT NULL,
  `gaji` int(11) NOT NULL,
  PRIMARY KEY (`id_settingcat`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO setting_catgenteng VALUES("1","G01","Genteng Beton","150","5","1000");



CREATE TABLE `setting_cetakgenteng` (
  `id_settingcetak` int(11) NOT NULL,
  `kode_barang` varchar(20) NOT NULL,
  `nama_genteng` varchar(100) NOT NULL,
  `range_genteng` int(11) NOT NULL,
  `toleransi` int(11) NOT NULL,
  `gaji` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO setting_cetakgenteng VALUES("1","G01","Genteng Beton","200","10","1000");



CREATE TABLE `setting_cetakpaving` (
  `id_settingpaving` int(11) NOT NULL,
  `kode_barang` varchar(20) NOT NULL,
  `nama_paving` varchar(100) NOT NULL,
  `limit_stock` int(11) NOT NULL,
  `range_paving` int(11) NOT NULL,
  `toleransi` int(11) NOT NULL,
  `gaji` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO setting_cetakpaving VALUES("1","P01","Paving","100","150","5","1000");



CREATE TABLE `setting_gajistaff` (
  `id_setting` int(11) NOT NULL,
  `id_kry` int(11) NOT NULL,
  `gaji_staff` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO setting_gajistaff VALUES("1","4","2500000");



CREATE TABLE `setting_limitstokgenteng` (
  `id_limit` int(11) NOT NULL,
  `kode_barang` varchar(20) NOT NULL,
  `nama_genteng` text NOT NULL,
  `jml_limit` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO setting_limitstokgenteng VALUES("1","G01","Genteng Beton","100");



CREATE TABLE `setting_menustaff` (
  `id_setmenu` int(11) NOT NULL,
  `id_kry` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO setting_menustaff VALUES("2","4","2");
INSERT INTO setting_menustaff VALUES("3","3","2");
INSERT INTO setting_menustaff VALUES("4","3","3");



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

INSERT INTO stock_barang VALUES("2","G01","Genteng Beton","Genteng","2025","520","0","2545","","4000","0");
INSERT INTO stock_barang VALUES("3","P01","Paving","Paving","4060","965","0","5025","","0","5000");



CREATE TABLE `stock_terjual` (
  `id_terjual` int(11) NOT NULL,
  `tgl_terjual` date NOT NULL,
  `no_transaksi` varchar(10) NOT NULL,
  `kd_barang` varchar(10) NOT NULL,
  `jml_terjual` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO stock_terjual VALUES("1","2019-08-25","TR-1","P01","200");



CREATE TABLE `surat_jalan` (
  `id_surat_jalan` int(11) NOT NULL,
  `png_jawab` varchar(50) NOT NULL,
  `no_surat_jalan` varchar(20) NOT NULL,
  `id_supir` int(11) NOT NULL,
  `pembuat_surat_jln` varchar(20) NOT NULL,
  `no_kendaraan` varchar(10) NOT NULL,
  `no_transaksi` varchar(20) NOT NULL,
  `id_wilayah` int(11) NOT NULL,
  `tgl_dibuat` date NOT NULL,
  `catatan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




CREATE TABLE `surat_jalan_feedback` (
  `id_surat_jalan` int(11) NOT NULL,
  `png_jawab` varchar(50) NOT NULL,
  `no_surat_jalan` varchar(20) NOT NULL,
  `id_supir` int(11) NOT NULL,
  `pembuat_surat_jln` varchar(20) NOT NULL,
  `no_kendaraan` varchar(10) NOT NULL,
  `no_transaksi` varchar(20) NOT NULL,
  `id_wilayah` int(11) NOT NULL,
  `tgl_dibuat` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




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




CREATE TABLE `temp_order_bahanbaku` (
  `id_detailbahanbaku` int(11) NOT NULL,
  `no_trbahanbaku` varchar(50) NOT NULL,
  `kode_barang` varchar(20) NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `hrg_barang` int(11) NOT NULL,
  `jumlah_beli` int(11) NOT NULL,
  `total_harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




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

INSERT INTO tempstock_barangkry VALUES("1","1","2019-08-27","G01","Paving","1000","10","Cetak","");
INSERT INTO tempstock_barangkry VALUES("2","1","2019-08-27","G01","Genteng","600","0","Angkat","");
INSERT INTO tempstock_barangkry VALUES("3","1","2019-08-27","G01","Genteng","300","0","Cat","");
INSERT INTO tempstock_barangkry VALUES("4","2","2019-08-27","P01","Paving","1000","10","Cetak","");
INSERT INTO tempstock_barangkry VALUES("5","1","2019-08-28","G01","Genteng","600","5","Cetak","");
INSERT INTO tempstock_barangkry VALUES("6","1","2019-08-28","G01","Genteng","300","0","Angkat","");
INSERT INTO tempstock_barangkry VALUES("7","1","2019-08-28","G01","Genteng","300","0","Cat","");



CREATE TABLE `total_bayar_bahanbaku` (
  `id_total_bayar` int(11) NOT NULL,
  `no_trbahanbaku` varchar(50) NOT NULL,
  `nominal` bigint(20) NOT NULL,
  `sts_lunas` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO total_bayar_bahanbaku VALUES("1","TRO-BB-1","200000","Belum Lunas");



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

INSERT INTO total_bayar_pembeli VALUES("1","TR-1","400000","0","400000","Diantar","diskon","Belum Lunas");



CREATE TABLE `user_admin` (
  `id_useradmin` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `status_user` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO user_admin VALUES("1","admin","1234","admin");



CREATE TABLE `wilayah` (
  `id_wilayah` int(11) NOT NULL,
  `nama_wilayah` varchar(50) NOT NULL,
  `nominal_uangjalan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO wilayah VALUES("1","wanayasa","200000");

