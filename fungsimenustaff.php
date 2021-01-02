<?php
          if(isset($_POST["menu"])){
            $menu = $_POST["menu"];

            if($menu == "pagenotifikasi"){
              include_once "page_notifikasi.php";
            }elseif($menu == "detail_notif"){
              include_once "page_notifikasi.php";
            }elseif($menu == "home"){
              include_once "home.php";
            }else if($menu == "stokbarang"){
              include_once "stock_barang/data_stock_barang.php";
            }elseif($menu == "updatestock"){
              include_once "proses/proses_update_stockbarang.php";
            }elseif($menu == "backupstock"){
              include_once "proses/proses_backup_stock.php";
            }elseif($menu == "prosesrestorestock"){
              include_once "proses/proses_restore_stock.php";
            }elseif($menu == "proseseditdatastockbarang"){
              include_once "proses/proses_edit_data_stockbarang.php";
            }elseif($menu == "tambahbarang"){
              include_once "stock_barang/form_tambah_barang.php";
            }elseif($menu == "prosestambahbarang"){
              include_once "proses/proses_tambah_barang.php";
            }elseif($menu == "editstokbarang"){
              include_once "stock_barang/form_edit_stockbarang.php";
            }elseif($menu == "hapusstokbarang"){
              include_once "proses/proses_hapus_stockbarang.php";
            }elseif($menu == "stockterjual"){
              include_once "stock_barang/stock_terjual.php";
            }else if($menu == "order_pembeli"){
               include_once "order/data_order_pembeli.php";
            }else if($menu == "prosestambahpembeli"){
              include_once "proses/proses_tambah_pembeli.php";
            }elseif($menu == "dokumen"){
              include_once "dokumen/data_suratjalan.php";
            }elseif($menu == "lihatsuratjalan"){
              include_once "dokumen/page_surat_jalan.php";
            }elseif($menu == "historisuratjalan"){
              include_once "dokumen/datahistori_suratjalan.php";
            }elseif($menu == "editbarangrusak"){
              include_once "dokumen/form_edit_barangrusak.php";
            }elseif($menu == "proseseditbrgrusak"){
              include_once "proses/proses_edit_barangrusak.php";
            }elseif($menu == "hapusbarangrusak"){
              include_once "proses/proses_hapus_barangrusak.php";
            }elseif($menu == "inputconfirmrusak"){
              include_once "proses/proses_input_feedback.php";
            }elseif($menu == "selesai"){
              include_once "proses/proses_update_selesai.php";
            }elseif($menu == "suratfeedback"){
              include_once "dokumen/page_surat_jalanfeedback.php";
            }elseif($menu == "pembayaran"){
              include_once "pembayaran/data_pembayaran_pembeli.php";
            }elseif($menu == "bayar_tunai"){
              include_once "pembayaran/data_pembayaran_tunaipembeli.php";
            }elseif($menu == "detailpembeli"){
              include_once "pembayaran/detail_beli.php";
            }elseif($menu == "frmbayartunai"){
              include_once "pembayaran/form_pembayarantunai_pembeli.php";
            }elseif($menu == "frmbayartempo"){
              include_once "pembayaran/form_pembayarantempo_pembeli.php";
            }elseif($menu == "bayar_tempo"){
              include_once "pembayaran/data_pembayaran_tempopembeli.php";
            }elseif($menu == "prosesbayartunai"){
              include_once "proses/proses_pembayarantunai_pembeli.php";
            }elseif($menu == "prosesbayartempo"){
              include_once "proses/proses_pembayarantempo_pembeli.php";
            }elseif($menu == "bayartunailunas"){
              include_once "pembayaran/data_pembayarantunai_lunas.php";
            }elseif($menu == "bayartempolunas"){
              include_once "pembayaran/data_pembayaran_tempopembelilunas.php";
            }elseif($menu == "pengeluaran"){
              include_once "pengeluaran/data_pengeluaran.php";
            }elseif($menu == "hapusorderbahanbaku"){
              include_once "proses/proses_hapusorder_bahanbaku.php";
            }elseif($menu == "detailhutangbahanbaku"){
              include_once "pengeluaran/detail_hutang_orderbahanbaku.php";
            }elseif($menu == "orderbahanbaku"){
              include_once "pengeluaran/form_order_bahanbaku.php";
            }elseif($menu == "prosesinputorderbahanbaku"){
              include_once "proses/proses_input_orderbahanbaku.php";
            }elseif($menu == "bayarorderbhnbaku"){
              include_once "pengeluaran/bayar_order_bahanbaku.php";
            }elseif($menu == "orderbahanbakulunas"){
              include_once "pengeluaran/data_orderbahanbaku_lunas.php";
            }elseif($menu == "pengeluaranharian"){
              include_once "pengeluaran/data_pengeluaran_harian.php";
            }elseif($menu == "tambahpengeluaranharian"){
              include_once "pengeluaran/form_pengeluaran_harian.php";
            }elseif($menu == "prosestambahpengeluaranharian"){
              include_once "proses/proses_tambah_pengeluaranharian.php";
            }elseif($menu == "editpengeluaranharian"){
              include_once "pengeluaran/form_edit_pengeluaran_harian.php";
            }elseif($menu == "proseseditpengeluaranharian"){
              include_once "proses/proses_edit_pengeluaranharian.php";
            }elseif($menu == "hapuspengeluaranharian"){
              include_once "proses/proses_hapus_pengeluaranharian.php";
            }elseif($menu == "pengeluaranlainlain"){
              include_once "pengeluaran/data_pengeluaran_lainlain.php";
            }elseif($menu == "tambahpengeluaranlain"){
              include_once "pengeluaran/form_pengeluaran_lainlain.php";
            }elseif($menu == "prosesinputpengeluaranlain"){
              include_once "proses/proses_input_pengeluaranlain.php";
            }elseif($menu == "editpengeluaranlain"){
              include_once "pengeluaran/form_edit_pengeluaran_lain.php";
            }elseif($menu == "proseseditpengeluaranlain"){
              include_once "proses/proses_edit_pengeluaranlain.php";
            }elseif($menu == "hapuspengeluaranlain"){
              include_once "proses/proses_hapus_pengeluaranlain.php";
            }elseif($menu == "historipengeluaran"){
              include_once "pengeluaran/data_histori_pengeluaran.php";
            }elseif($menu == "bayarbahanbakutunai"){
              include_once "pengeluaran/form_pembayarantunai_bahanbaku.php";
            }elseif($menu == "bayarbahanbakutempo"){
              include_once "pengeluaran/form_pembayarantempo_bahanbaku.php";
            }elseif($menu == "prosesbayartunaibahanbaku"){
              include_once "proses/proses_bayar_tunaibahanbaku.php";
            }elseif($menu == "prosesbayartempobahanbaku"){
              include_once "proses/proses_bayartempo_bahanbaku.php";
            }elseif($menu == "karyawan"){
              include_once "karyawan/data_karyawan.php";
            }elseif($menu == "hapuskerjakry"){
              include_once "proses/proses_hapus_kerjakry.php";
            }elseif($menu == "tambahkry"){
              include_once "karyawan/form_input_karyawanbaru.php";
            }elseif($menu == "prosestambahkry"){
              include_once "proses/proses_tambahkaryawan.php";
            }elseif($menu == "kasbonkaryawan"){
              include_once "karyawan/data_kasbon_karyawan.php";
            }elseif($menu == "databayarkasbonkaryawan"){
              include_once "karyawan/data_bayarkasbon_karyawan.php";
            }elseif($menu == "tambahkasbon"){
              include_once "karyawan/form_kasbon_karyawan.php";
            }elseif($menu == "editkasbonkaryawan"){
              include_once "karyawan/edit_kasbon_karyawan.php";
            }elseif($menu == "proseseditkasbonkaryawan"){
              include_once "proses/proses_editkasbon_karyawan.php";
            }elseif($menu == "hapuskasbonkaryawan"){
              include_once "proses/proses_hapus_kasbonkaryawan.php";
            }elseif($menu == "inputhasilproduksi"){
              include_once "karyawan/form_inputproduksi_karyawan.php";
            }elseif($menu == "detailkerjakry"){
              include_once "karyawan/detail_pekerjaan_karyawan.php";
            }elseif($menu == "edit_pekerjaan_kry"){
              include_once "karyawan/form_editproduksi_karyawan.php";
            }elseif($menu == "edit_temppekerjaan_kry"){
              include_once "karyawan/form_editproduksitemp_karyawan.php";
            }elseif($menu == "prosesedittempkerjakry"){
              include_once "proses/proses_edittemp_pekerjaankry.php";
            }elseif($menu == "hapustempkerjakry"){
              include_once "proses/proses_hapus_tempkerjakry.php";
            }elseif($menu == "prosesedithistorikerjakry"){
              include_once "proses/proses_edit_pekerjaankry.php";
            }elseif($menu == "detailkerjasupir"){
              include_once "karyawan/detail_pekerjaan_supir.php";
            }elseif($menu == "datapekerjaatambahannsupir"){
              include_once "karyawan/data_pekerjaan_tambahansupir.php";
            }elseif($menu == "tambahpekerjaansupir"){
              include_once "karyawan/form_tambah_pekerjaansupir.php";
            }elseif($menu == "prosestambahpekerjaansupir"){
              include_once "proses/proses_tambah_pekerjaansupir.php";
            }elseif($menu == "prosesinputhistorikerjakry"){
              include_once "proses/proses_inputhistori_pekerjaan.php";
            }elseif($menu == "proseskasbonkaryawan"){
              include_once "proses/proses_tambah_kasbon.php";
            }elseif($menu == "penggajiankaryawan"){
              include_once "karyawan/penggajian_karyawan.php";
            }elseif($menu == "formgajikaryawanstafflapangan"){
              include_once "karyawan/form_gaji_karyawanstafflapangan.php";
            }elseif($menu == "formgajikaryawantetap"){
              include_once "karyawan/form_gaji_karyawantetap.php";
            }elseif($menu == "prosespenggajiankaryawantetap"){
              include_once "proses/proses_gaji_krytetap.php";
            }elseif($menu == "proseshitunggajikrytetap"){
              // include_once "proses/proseshitunggajikrytetap.php";
              include_once "proses/proses_gaji_krytetap.php";
            }elseif($menu == "prosespenggajiankaryawanstafflapangan"){
              include_once "proses/proses_gaji_krystafflapangan.php";
            }elseif($menu == "formgajikaryawanharian"){
              include_once "karyawan/form_gaji_karyawanharian.php";
            }elseif($menu == "prosesinputgajiharian"){
              include_once "proses/proses_gaji_harian.php";
            }elseif($menu == "editkaryawan"){
              include_once "karyawan/form_edit_karyawan.php";
            }elseif($menu == "proseseditkry"){
              include_once "proses/proses_edit_karyawan.php";
            }elseif($menu == "hapuskaryawan"){
              include_once "proses/proses_hapus_karyawan.php";
            }elseif($menu == "keuangan"){
              include_once "keuangan/kas_keuangan.php";
            }elseif($menu == "tambahrekeningkoran"){
              include_once "proses/proses_input_rekeningkoran.php";
            }elseif($menu == "cetakrekkoran"){
              include_once "keuangan/form_cetak_rekkoran.php";
            }elseif($menu == "editrekkoran"){
              include_once 'keuangan/form_edit_rekkoran.php';
            }elseif($menu == "proseseditrekkoran"){
              include_once "proses/proses_edit_rekkoran.php";
            }elseif($menu == "hapusrekkoran"){
              include_once "proses/proses_hapus_rekkoran.php";
            }elseif($menu == "buatlaporanrekkoran"){
              include_once "keuangan/laporan_rekkoran.php";
            }elseif($menu == "laporankasbesar"){
              include_once "keuangan/form_laporan_kasbesar.php";
            }elseif($menu == "editkasbesar"){
              include_once "keuangan/form_edit_kasbesar.php";
            }elseif($menu == "prosesupdatekasbesar"){
              include_once "proses/proses_update_kasbesar.php";
            }elseif($menu == "buatlaporankasbesar"){
              include_once "keuangan/laporan_kasbesar.php";
            }elseif($menu == "kendaraan"){
              include_once "inv_kendaraan/data_kendaraan.php";
            }elseif($menu == "tambahinvkendaraan"){
              include_once "inv_kendaraan/form_tambah_invkendaraan.php";
            }elseif($menu == "prosestambahinvkendaraan"){
              include_once "proses/proses_tambah_invkendaraan.php";
            }elseif($menu == "editkendaraan"){
              include_once "inv_kendaraan/form_edit_kendaraan.php";
            }elseif($menu == "proseseditinvkendaraan"){
              include_once "proses/proses_edit_kendaraan.php";
            }elseif($menu == "hapuskendaraan"){
              include_once "proses/proses_hapus_kendaraan.php";
            }elseif($menu == "settings"){
              include_once "settings/data_settings.php";
            }elseif($menu == "backupdata"){
              include_once "backupdata.php";
            }elseif($menu == "pagesetgajistafflapangan"){
              include_once "settings/settings_baru.php";
            }elseif($menu == "pagesetlevel"){
              include_once "settings/data_set_level.php";
            }elseif($menu == "pagesetwilayah"){
              include_once "settings/data_set_wilayah.php";
            }elseif($menu == "pagesetmenustaff"){
              include_once "settings/data_setmenu_staff.php";
            }elseif($menu == "datamenustaff"){
              include_once "settings/data_menu_staff.php";
            }elseif($menu == "hapusmenustaff"){
              include_once "proses/proses_hapus_menustaff.php";
            }elseif($menu == "setgajikrysstaff"){
              include_once "proses/proses_setgaji_staff.php";
            }elseif($menu == "editgajistaff"){
              include_once "settings/form_edit_gajistaff.php"; 
            }elseif($menu == "proseseditgajistaff"){
              include_once "proses/proses_edit_gajistaff.php";
            }elseif($menu == "hapusgajistaff"){
              include_once "proses/proses_hapus_gajistaff.php";
            }elseif($menu == "hapus_level"){
              include_once 'proses/proses_hapus_levelkry.php';
            }elseif($menu == "tambahwilayah"){
              include_once "proses/proses_tambah_wilayah.php";
            }elseif($menu == "editwilayah"){
              include_once "settings/form_edit_wilayah.php";
            }elseif($menu == "proseseditwilayah"){
              include_once "proses/proses_edit_wilayah.php";
            }elseif($menu == "hapuswilayah"){
              include_once "settings/hapus_wilayah.php";
            }elseif($menu == "datasettinggenteng"){
              include_once "settings/data_set_genteng.php";
            }elseif($menu == "datasettingpaving"){
              include_once "settings/data_set_paving.php";
            }elseif($menu == "datasettingbrglain"){
              include_once "settings/data_set_brglain.php";
            }elseif($menu == "resetpassstaff"){
              include_once "proses/proses_reset_passstaff.php";
            }elseif($menu == "editsetcetakgenteng"){
              include_once "settings/form_edit_cetakgenteng.php";
            }elseif($menu == "proseseditsetcetakgenteng"){
              include_once "proses/proses_edit_cetakgenteng.php";
            }elseif($menu == "hapussetcetakgenteng"){
              include_once "proses/proses_hapus_setcetakgenteng.php";
            }elseif($menu == "editsetcatgenteng"){
              include_once "settings/form_edit_catgenteng.php";
            }elseif($menu == "proseseditsetcatgenteng"){
              include_once "proses/proses_edit_catgenteng.php";
            }elseif($menu == "hapussetcatgenteng"){
              include_once "proses/proses_hapus_setcatgenteng.php";
            }elseif($menu == "editsetangkatgenteng"){
              include_once "settings/form_edit_angkatgenteng.php";
            }elseif($menu == "proseseditsetangkatgenteng"){
              include_once "proses/proses_edit_angkatgenteng.php";
            }elseif($menu == "hapussetangkatgenteng"){
              include_once "proses/proses_hapus_setangkatgenteng.php";
            }elseif($menu == "editsetcetakpaving"){
              include_once "settings/form_edit_cetakpaving.php";
            }elseif($menu == "proseseditsetpaving"){
              include_once "proses/proses_edit_setpaving.php";
            }elseif($menu == "hapussetpaving"){
              include_once "proses/proses_hapus_setpaving.php";
            }elseif($menu == "editsetbrglain"){
              include_once "settings/form_edit_cetakbrglain.php";
            }elseif($menu == "proseseditsetbrglain"){
              include_once "proses/proses_edit_setbrglain.php";
            }elseif($menu == "hapussetbrglain"){
              include_once "proses/proses_hapus_setbrglain.php";
            }elseif($menu == "editlimitgenteng"){
              include_once "settings/form_edit_limitgenteng.php";
            }elseif($menu == "proseseditlimitgenteng"){
              include_once "proses/proses_edit_limitgenteng.php";
            }elseif($menu == "hapuslimitgenteng"){
              include_once "proses/proses_hapus_limitgenteng.php";
            }elseif($menu == "tambah_order"){
              include_once "order/order_pembeli.php";
            }elseif($menu == "edit_orderpembeli"){
              include_once "order/form_edit_orderpembeli.php";
            }elseif($menu == "proseseditpembeli"){
              include_once "proses/proses_edit_pembeli.php";
            }elseif($menu == "hapus_orderpembeli"){
              include_once "proses/proses_hapus_orderpembeli.php";
            }elseif($menu == "edit_detailbrg"){
              include_once "order/edit_detail_order.php";
            }elseif($menu == "hapus_detailbrg"){
              include_once "proses/proses_hapus_detailorder.php";
            }elseif($menu == "detail_order"){
              include_once "order/detail_order_pembeli.php";
            }elseif($menu == "suratjalan"){
              include_once "dokumen/form_buat_suratjalan.php";
            }elseif($menu == "pagesuratjalan"){
              include_once "proses/proses_buat_suratjalan.php";
            }elseif($menu == "pagesuratjalanfeedback"){
              include_once "proses/proses_buat_suratjalanfeedback.php";
            }elseif($menu == "dibuat"){
              include_once "proses/proses_update_dikirim.php";
            }elseif($menu == "dikirim"){
              include_once "proses/proses_update_dikirim.php";
              // include_once "proses/proses_update_feedback.php";
            }elseif($menu == "feedback"){
              include_once "dokumen/data_feedback.php";
            }elseif($menu == "faktur"){
              include_once "order/page_faktur.php";
            }elseif($menu == "proses_edit_brg"){
              include_once "proses/edit_detail_barang.php";
            }elseif ($menu == "lihatselengkapnya") {
              include_once "order/detail_order_pembeli.php";
            }elseif ($menu == "editsuratjalan") {
              include_once "dokumen/edit_surat_jalan.php";
            }elseif ($menu == "proseseditsuratjalan") {
              include_once "proses/proses_edit_suratjalan.php";
            }elseif($menu == "bahanbaku"){
              include_once "bahanbaku/data_bahanbaku.php";
            }elseif($menu == "tambahbahanbaku"){
              include_once "bahanbaku/form_tambah_bahanbaku.php";
            }elseif($menu == "prosestambahbahanbaku"){
              include_once "proses/proses_tambah_bahanbaku.php";
            }elseif($menu == "editbahanbaku"){
              include_once "bahanbaku/form_edit_bahanbaku.php";
            }elseif($menu == "proseseditbahanbaku"){
              include_once "proses/proses_edit_bahanbaku.php";
            }elseif($menu == "hapusbahanbaku"){
              include_once "proses/proses_hapus_bahanbaku.php";
            }elseif($menu == "laporan"){
              include_once "laporan/page_laporan.php";
            }elseif($menu == "formlaporanpemasukkan"){
              include_once "laporan/form_laporan_pemasukan.php";
            }elseif($menu == "buatlaporanpemasukan"){
              include_once "laporan/laporan_pemasukan.php";
            }elseif($menu == "laporanbahanbaku"){
              include_once "laporan/laporan_bahanbaku.php";
            }elseif($menu == "formlaporanstockbarang"){
              include_once "laporan/form_laporan_stockbarang.php";
            }elseif($menu == "buatlaporanstock"){
              include_once "laporan/laporan_stockbarang.php";
            }elseif($menu == "laporankeuangan"){
              include_once "laporan/form_laporan_keuangan.php";
            }elseif($menu == "buatlaporanpengeluarankeuangan"){
              include_once "laporan/laporan_pengeluaran_keuangan.php";
            }elseif($menu == "laporantempobelumlunas"){
              include_once "laporan/laporan_pembeli_tempo.php";
            }elseif($menu == "laporanbelibahanbaku"){
              include_once "laporan/form_laporan_beli_bahanbaku.php";
            }elseif($menu == "buatlaporanpembelitempo"){
              include_once "laporan/laporan_pembeli_tempo.php";
            }elseif($menu == "laporandatabelibahanbaku"){
              include_once "laporan/laporan_beli_bahanbaku.php";
            }elseif($menu == "backupdata"){
              include_once "db_backup/bekap.php";
            }elseif($menu == "restoredata"){
              include_once "db_backup/restore.php";
            }elseif($menu == "pagejenisbarang"){
              include_once "settings/data_jenis_barang.php";
            }elseif($menu == "hapusjenisbarang"){
              include_once "proses/proses_hapusjenisbarang.php";
            }elseif($menu == "hapuspemasukan"){
              include_once "proses/proseshapuspemasukan.php";
            }elseif($menu == "hapuskasbesar"){
              include_once "proses/proses_hapus_kasbesar.php";
            }elseif($menu == "resetkaskecil"){
              include_once "proses/proses_reset_kaskecil.php";
            }elseif($menu == "logoutstaff"){
              session_destroy();

              header("location:".$url);
            }elseif($menu == "gantipasswordstaff"){
              include_once "settings/ganti_password_staff.php";
            }
          }else{
            include_once "home.php";
          }
        ?>
