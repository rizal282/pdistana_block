<?php include_once "assets/sidebar_menu.php"; ?>

    <div id="content-wrapper">

      <div class="container-fluid">

     

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
            }elseif($menu == "inputconfirmrusak"){
              include_once "proses/proses_input_feedback.php";
            }elseif($menu == "selesai"){
              include_once "proses/proses_update_selesai.php";
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
            }elseif($menu == "pengeluaran"){
              include_once "pengeluaran/data_pengeluaran.php";
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
            }elseif($menu == "buatlaporanrekkoran"){
            	include_once "keuangan/laporan_rekkoran.php";
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
              include_once "settings/data_set_gaji.php";
            }elseif($menu == "pagesetlevel"){
              include_once "settings/data_set_level.php";
            }elseif($menu == "pagesetwilayah"){
              include_once "settings/data_set_wilayah.php";
            }elseif($menu == "tambahwilayah"){
              include_once "proses/proses_tambah_wilayah.php";
            }elseif($menu == "editwilayah"){
              include_once "settings/form_edit_wilayah.php";
            }elseif($menu == "proseseditwilayah"){
              include_once "proses/proses_edit_wilayah.php";
            }elseif($menu == "hapuswilayah"){
              include_once "settings/hapus_wilayah.php";
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
            }elseif($menu == "laporan"){
              include_once "laporan/page_laporan.php";
            }elseif($menu == "formlaporanpemasukkan"){
              include_once "laporan/form_laporan_pemasukan.php";
            }elseif($menu == "buatlaporanpemasukan"){
              include_once "laporan/laporan_pemasukan.php";
            }elseif($menu == "laporanbahanbaku"){
              include_once "laporan/laporan_bahanbaku.php";
            }elseif($menu == "laporanstockbarang"){
              include_once "laporan/laporan_stockbarang.php";
            }elseif($menu == "laporankeuangan"){
              include_once "laporan/form_laporan_keuangan.php";
            }elseif($menu == "buatlaporanpengeluarankeuangan"){
              include_once "laporan/laporan_pengeluaran_keuangan.php";
            }
          }else{
            include_once "home.php";
          }
        ?>
        
        

      </div>
      <!-- /.container-fluid -->

      <!-- Sticky Footer 
      <footer class="sticky-footer">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright © Your Website 2019</span>
          </div>
        </div>
      </footer> -->

    </div>
    <!-- /.content-wrapper -->

  </div>
  <!-- /#wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>


   class PDF extends FPDF{
        function Header(){
            $koneksi = mysqli_connect("localhost", "root", "", "pd_istana_block");
            if(isset($_POST["suratjalan_tr"])){
                $suratjalan_tr = $_POST["suratjalan_tr"];

                // query untuk menampilkan data pembeli
                $sqlgetdatapembeli = mysqli_query($koneksi, "select * from order_pembeli where no_transaksi = '".$suratjalan_tr."'");
                $datapembeli = mysqli_fetch_array($sqlgetdatapembeli);

                // query untuk menampilkan detail barang yg dibeli
                $sqlgetdetailbeli = mysqli_query($koneksi, "select * from detail_order_pembeli where no_transaksi = '".$suratjalan_tr."'");

                $sqlgetsuratjalan = mysqli_query($koneksi, "select * from surat_jalan inner join karyawan on surat_jalan.id_supir = karyawan.id_kry where surat_jalan.no_transaksi = '".$suratjalan_tr."'");
                $rowsuratjalan = mysqli_fetch_array($sqlgetsuratjalan);
            }

            // Logo
            $this->Image('img/logopdistana.png',10,15,40);
            // Arial bold 15
            $this->SetFont('Arial','B',9);
            // Move to the right
            $this->Cell(40);
            // Title
            $this->Cell(130,7,'PD.ISTANA BLOCK PURWAKARTA',0,0,'C');
            $this->Cell(100,7,'SURAT JALAN',1,1,'C');

            // Move to the right
            $this->Cell(40);

            $this->Cell(130,7,'Paving Block,Grass Block, Genteng Beton',0,0,'C');
            $this->Cell(30,7,'TGL-BLN-THN',1,0,'C');
            $this->Cell(70,7,date("d-M-Y", strtotime($datapembeli["tgl_beli"])),1,1,'C');

            // Move to the right
            $this->Cell(40);

            $this->Cell(130,7,'Batako,U-Ditch Buis Beton Kastin DLL',0,0,'C');
            $this->Cell(30,7,'KEPADA',1,0,'C');
            $this->Cell(70,7,ucwords($datapembeli["nama_pembeli"]),1,1,'C');

            // Move to the right
            $this->Cell(40);

            $this->Cell(130,7,'Office : Jln.Terusan Kapten Halim No.148',0,0,'C');
            $this->Cell(30,7,'ALAMAT',1,0,'C');
            $this->Cell(70,7,$datapembeli["alamat_pembeli"],1,1,'C');

            // Move to the right
            $this->Cell(40,7,'ISTANA BLOCK',0,0,'C');

            $this->Cell(130,7,'Sawah Kulon Pasawahan Kab.Purwakarta Jawa Barat 41172',0,0,'C');
            $this->Cell(30,7,'',0,0,'C');
            $this->Cell(70,7,'',0,1,'C');

            // Move to the right
            $this->Cell(40);

            $this->Cell(130,7,'Phone : (0264) 200 476 - 081 294 411 105 - 081 909 450 025',0,0,'C');
            $this->Cell(30,7,'NO PHONE',1,0,'C');
            $this->Cell(70,7,$datapembeli["nohp_pembeli"],1,1,'C');

            // Line break
            $this->Ln(10);

            // KONTEN
            $this->Cell(130,7,'NAMA BARANG',1,0,'C');

            $this->Cell(40,7,'SATUAN',1,0,'C');

            $this->Cell(100,7,'QUANTITY',1,1,'C');

            // $pdf = new suratJalan('l','mm','A4');

            // $pdf->AddPage();
        }

        function Footer(){
            $koneksi = mysqli_connect("localhost", "root", "", "pd_istana_block");
            if(isset($_POST["suratjalan_tr"])){
                $suratjalan_tr = $_POST["suratjalan_tr"];

                // query untuk menampilkan data pembeli
                $sqlgetdatapembeli = mysqli_query($koneksi, "select * from order_pembeli where no_transaksi = '".$suratjalan_tr."'");
                $datapembeli = mysqli_fetch_array($sqlgetdatapembeli);

                // query untuk menampilkan detail barang yg dibeli
                $sqlgetdetailbeli = mysqli_query($koneksi, "select * from detail_order_pembeli where no_transaksi = '".$suratjalan_tr."'");

                $sqlgetsuratjalan = mysqli_query($koneksi, "select * from surat_jalan inner join karyawan on surat_jalan.id_supir = karyawan.id_kry where surat_jalan.no_transaksi = '".$suratjalan_tr."'");
                $rowsuratjalan = mysqli_fetch_array($sqlgetsuratjalan);
            }

            $this->SetFont('Arial','B',10);

            while ($rowdetailbeli = mysqli_fetch_array($sqlgetdetailbeli)) {
                $this->Cell(130,7,$rowdetailbeli["nama_barang"],0,0,'C');
                $this->Cell(40,7,$rowdetailbeli["satuan_brg"],0,0,'C');
                $this->Cell(100,7,$rowdetailbeli["jumlah_beli"],0,1,'C');
                
            }

            //atur posisi 1.5 cm dari bawah
            $this->SetY(-65);
           // Line break
            $this->Ln(2);

            // MENGETAHUI
            $this->Cell(50,7,'PENERIMA',0,0,'C');
            $this->Cell(70,7,'PENGIRIM/SUPIR',0,0,'C');
            $this->Cell(50,7,'PENANGGUNG JAWAB',0,0,'C');
            $this->Cell(70,7,'HORMAT KAMI',0,1,'C');
            

            // KOLOM MENGETAHUI
            $this->Cell(50,7,'',0,0,'C');
            $this->Cell(50,7,'',0,0,'C');
            $this->Cell(50,7,'',0,0,'C');
            $this->Cell(50,7,'',0,1,'C');

            $this->Cell(50,7,'',0,0,'C');
            $this->Cell(50,7,'',0,0,'C');
            $this->Cell(50,7,'',0,0,'C');
            $this->Cell(50,7,'',0,1,'C');

            $this->Cell(50,7,'',0,0,'C');
            $this->Cell(50,7,'',0,0,'C');
            $this->Cell(50,7,'',0,0,'C');
            $this->Cell(50,7,'',0,1,'C');

            // Line break
            $this->Ln(10);

            // NAMA YANG MENGETAHUI
            $this->Cell(50,7,ucwords($datapembeli["nama_pembeli"]),0,0,'C');
            $this->Cell(70,7,ucwords($rowsuratjalan["nama_kry"]),0,0,'C');
            $this->Cell(50,7,ucwords($rowsuratjalan["png_jawab"]),0,0,'C');
            $this->Cell(70,7,ucwords($rowsuratjalan["pembuat_surat_jln"]),0,1,'C');
            
        }
    }

    $pdf = new PDF('l','mm','A4');

    $pdf->AddPage();

class PDF extends FPDF
    {
        function Header(){
            $koneksi = mysqli_connect("localhost", "root", "", "pd_istana_block");

            if (isset($_POST["faktur_tr"])) {
                $faktur_tr = $_POST["faktur_tr"];

                // query untuk menampilkan data pembeli jika diakses dari order pembeli
                $sqlgetdatapembeli = mysqli_query($koneksi, "select * from order_pembeli where no_transaksi = '".$faktur_tr."'");
                $datapembeli = mysqli_fetch_array($sqlgetdatapembeli);

                // query untuk menampilkan detail barang yg dibeli jika diakses dari order pembeli
                $sqlgetdetailbeli = mysqli_query($koneksi, "select * from detail_order_pembeli where no_transaksi = '".$faktur_tr."'");

                // ambil dp pembayaran jika jenisnya tempo
                $sqlgetdpbayar = "select nominal_dp from pembayaran where no_transaksi = '".$faktur_tr."'";
                $aksigetdpbayar = mysqli_query($koneksi, $sqlgetdpbayar);
                $rowdpbayar = mysqli_fetch_array($aksigetdpbayar);

                //ambli total tagihan
                $sqlgettotaltagihan = "select sisa_total from total_bayar_pembeli where no_transaksi = '".$faktur_tr."'";
                $aksigettotaltagihan = mysqli_query($koneksi, $sqlgettotaltagihan);
                $rowtotaltagihan = mysqli_fetch_array($aksigettotaltagihan);

                // hitung sisa tagihan
                $sisatagihan = $rowtotaltagihan["sisa_total"] - $rowdpbayar["nominal_dp"];

            }else{
                // query untuk menampilkan data pembeli jika diakses dari detail order setelah transaksi
                $sqlgetdatapembeli = mysqli_query($koneksi, "select * from order_pembeli where no_transaksi = '".$no_tr_bayar."'");
                $datapembeli = mysqli_fetch_array($sqlgetdatapembeli);

                // query untuk menampilkan detail barang yg dibeli  jika diakses dari detail order setelah transaksi
                $sqlgetdetailbeli = mysqli_query($koneksi, "select * from detail_order_pembeli where no_transaksi = '".$no_tr_bayar."'");
            }
            // Logo
            $this->Image('img/logopdistana.png',10,15,40);
            // Arial bold 15
            $this->SetFont('Arial','B',9);
            // Move to the right
            $this->Cell(40);
            // Title
            $this->Cell(130,7,'PD.ISTANA BLOCK PURWAKARTA',0,0,'C');
            $this->Cell(100,7,'FAKTUR PEMBELIAN',1,1,'C');

            // Move to the right
            $this->Cell(40);

            $this->Cell(130,7,'Paving Block,Grass Block, Genteng Beton',0,0,'C');
            $this->Cell(30,7,'TGL-BLN-THN',1,0,'C');
            $this->Cell(70,7,date("d M Y", strtotime($datapembeli["tgl_beli"])),1,1,'C');

            // Move to the right
            $this->Cell(40);

            $this->Cell(130,7,'Batako,U-Ditch Buis Beton Kastin DLL',0,0,'C');
            $this->Cell(30,7,'KEPADA',1,0,'C');
            $this->Cell(70,7,$datapembeli["nama_pembeli"],1,1,'C');

            // Move to the right
            $this->Cell(40);

            $this->Cell(130,7,'Office : Jln.Terusan Kapten Halim No.148',0,0,'C');
            $this->Cell(30,7,'ALAMAT',1,0,'C');
            $this->Cell(70,7,$datapembeli["alamat_pembeli"],1,1,'C');

            // Move to the right
            $this->Cell(40,7,'ISTANA BLOCK',0,0,'C');

            $this->Cell(130,7,'Sawah Kulon Pasawahan Kab.Purwakarta Jawa Barat 41172',0,0,'C');
            $this->Cell(30,7,'',0,0,'C');
            $this->Cell(70,7,'',0,1,'C');

            // Move to the right
            $this->Cell(40);

            $this->Cell(130,7,'Phone : (0264) 200 476 - 081 294 411 105 - 081 909 450 025',0,0,'C');
            $this->Cell(30,7,'NO PHONE',1,0,'C');
            $this->Cell(70,7,$datapembeli["nohp_pembeli"],1,1,'C');

            // Line break
            $this->Ln(5);

            // KONTEN
            $this->Cell(100,7,'NAMA BARANG',1,0,'C');

            $this->Cell(30,7,'SATUAN',1,0,'C');

            $this->Cell(30,7,'QUANTITY',1,0,'C');

            $this->Cell(55,7,'HARGA SATUAN(Rp)',1,0,'C');

            $this->Cell(55,7,'JUMLAH (Rp)',1,1,'C');

            // $pdf = new suratJalan('l','mm','A4');

            // $pdf->AddPage();
        }

     
        //Page footer
        function Footer()
        {
            $koneksi = mysqli_connect("localhost", "root", "", "pd_istana_block");
            if (isset($_POST["faktur_tr"])) {
                $faktur_tr = $_POST["faktur_tr"];

                // query untuk menampilkan data pembeli jika diakses dari order pembeli
                $sqlgetdatapembeli = mysqli_query($koneksi, "select * from order_pembeli where no_transaksi = '".$faktur_tr."'");
                $datapembeli = mysqli_fetch_array($sqlgetdatapembeli);

                // query untuk menampilkan detail barang yg dibeli jika diakses dari order pembeli
                $sqlgetdetailbeli = mysqli_query($koneksi, "select * from detail_order_pembeli where no_transaksi = '".$faktur_tr."'");

                // ambil dp pembayaran jika jenisnya tempo
                $sqlgetdpbayar = "select nominal_dp from pembayaran where no_transaksi = '".$faktur_tr."'";
                $aksigetdpbayar = mysqli_query($koneksi, $sqlgetdpbayar);
                $rowdpbayar = mysqli_fetch_array($aksigetdpbayar);

                //ambli total tagihan
                $sqlgettotaltagihan = "select * from total_bayar_pembeli where no_transaksi = '".$faktur_tr."'";
                $aksigettotaltagihan = mysqli_query($koneksi, $sqlgettotaltagihan);
                $rowtotaltagihan = mysqli_fetch_array($aksigettotaltagihan);

                // hitung sisa tagihan
                if($rowtotaltagihan["sisa_total"] != 0){
                    $sisatagihan = $rowtotaltagihan["sisa_total"] - $rowdpbayar["nominal_dp"];
                }else{
                    $sisatagihan = $rowtotaltagihan["total_bayar"] - $rowdpbayar["nominal_dp"];
                }

            }else{
                // query untuk menampilkan data pembeli jika diakses dari detail order setelah transaksi
                $sqlgetdatapembeli = mysqli_query($koneksi, "select * from order_pembeli where no_transaksi = '".$no_tr_bayar."'");
                $datapembeli = mysqli_fetch_array($sqlgetdatapembeli);

                // query untuk menampilkan detail barang yg dibeli  jika diakses dari detail order setelah transaksi
                $sqlgetdetailbeli = mysqli_query($koneksi, "select * from detail_order_pembeli where no_transaksi = '".$no_tr_bayar."'");
            }

             $this->SetFont('Arial','B',10);

            while($datadetailpembeli = mysqli_fetch_array($sqlgetdetailbeli)){
                $this->Cell(100,7,$datadetailpembeli["nama_barang"],0,0,'C');
                $this->Cell(30,7,$datadetailpembeli["satuan_brg"],0,0,'C');
                $this->Cell(30,7,$datadetailpembeli["jumlah_beli"],0,0,'C');
                $this->Cell(55,7, "Rp ".number_format($datadetailpembeli["hrg_barang"],1,",","."),0,0,'C');
                $this->Cell(55,7, "Rp ".number_format($datadetailpembeli["total_hrg"],1,",","."),0,1,'C');

                $jumlahhrgdibeli[] = $datadetailpembeli["total_hrg"];
            }

            $totalseluruh = array_sum($jumlahhrgdibeli);

            //atur posisi 1.5 cm dari bawah
            $this->SetY(-65);
           // Line break
            $this->Ln(2);

            $this->Cell(160,7,'Catatan : ',0,0);
            $this->Cell(55,7,'JUMLAH',0,0);
            $this->Cell(55,7,"Rp ".number_format($totalseluruh,1,",","."),0,1,'R');

            $this->Cell(40,7,'',0,0);
            $this->Cell(80,7,'PERHATIAN',0,0,'C');
            $this->Cell(40,7,'',0,0,'C');
            $this->Cell(55,7,'UANG MUKA',0,0);
            $this->Cell(55,7,"Rp ".number_format($rowdpbayar["nominal_dp"],1,",","."),0,1,'R');

            $this->SetFont('Arial','B',10);
            $this->Cell(40,7,'TANDA TERIMA',0,0,'C');
            $this->Cell(80,7,'barang yang sudah dibeli tidak',0,0,'C');
            $this->Cell(40,7,'HORMAT KAMI',0,0,'C');
            $this->Cell(55,7,'SISA',0,0);
            $this->Cell(55,7,"Rp ".number_format($sisatagihan,1,",","."),0,1,'R');

            $this->Cell(40,7,'',0,0);
            $this->Cell(80,7,'dapat dikembalikan atau ditukar',0,0,'C');
            $this->Cell(40,7,'',0,0);
            $this->Cell(55,7,'',0,0);
            $this->Cell(55,7,'',0,1);

            $this->Cell(40,7,'',0,0);
            $this->Cell(80,7,'via transfer',0,0,'C');
            $this->Cell(40,7,'',0,0,'C');
            $this->Cell(55,7,'',0,0,'C');
            $this->Cell(55,7,'',0,1);

            $this->Cell(40,7,'',0,0);
            $this->Cell(80,7,'muhamad abdulah',0,0,'C');
            $this->Cell(40,7,'',0,0,'C');
            $this->Cell(55,7,'',0,0);
            $this->Cell(55,7,'',0,1);

            $this->Cell(40,7,'',0,0);
            $this->Cell(80,7,'2313303900 BCA',0,0,'C');
            $this->Cell(40,7,'',0,0,'C');
            $this->Cell(55,7,'',0,0);
            $this->Cell(55,7,'',0,1);

            $this->Cell(40,7,ucwords($datapembeli["nama_pembeli"]),0,0,'C');
            $this->Cell(80,7,'',0,0);
            $this->Cell(40,7,'HORMAT KAMI',0,0,'C');
            $this->Cell(55,7,'',0,0);
            $this->Cell(55,7,'',0,1);
        }
    }


    $pdf = new PDF('l','mm','A4');

    $pdf->AddPage();

    // $pdf->Content();
  

  <div class="alert alert-success">Data Pekerjaan Karyawan yang Belum Masuk Stock</div>

    <div class="table-responsive">
      <table id="tempstockkry" class="table table-bordered" cellspacing="0" width="100%">
        <thead>
          <tr>
            <th>No</th>
            <th>Tgl Pekerjaan</th>
            <th>Nama Barang</th>
            <th>Qty Barang</th>
            <th>Qty Semen</th>
            <th>Pekerjaan</th>
            <th>Keterangan</th>
            <th>Edit</th>
            <th>Hapus</th>
            <!-- <th>Opsi</th> -->
          </tr>
        </thead>
        <tbody>
          <?php
            $nomor = 1;
            while ($rowtemppekerjaan = mysqli_fetch_array($aksigettemppekerjaan)) {
          ?>
              <tr>
                <td><?php echo $nomor; ?></td>
                <td><?php echo date("d M Y", strtotime($rowtemppekerjaan["tgl"])); ?></td>
                <td><?php echo $rowtemppekerjaan["nama_barang"]; ?></td>
                <td><?php echo $rowtemppekerjaan["qty_brg"]; ?></td>
                <td><?php echo $rowtemppekerjaan["qty_semen"]; ?></td>
                <td><?php echo $rowtemppekerjaan["pekerjaan"]; ?></td>
                <td><?php echo $rowtemppekerjaan["keterangan"]; ?></td>
                <td>
                  <form action="<?php echo $url; ?>" method="post">
                    <input type="hidden" name="menu" value="edit_temppekerjaan_kry">
                    <input type="hidden" name="id_tempstock" value="<?php echo $rowtemppekerjaan["id_tempstock"]; ?>">
                    <button type="submit" class="btn btn-success"><i class="fas fa-edit"></i></button>
                  </form>
                </td>
                <td>
                  <form action="" method="post">
                    <input type="hidden" name="menu" value="hapustempkerjakry">
                    <input id="id_histori" type="hidden" name="id_tempstock" value="<?php echo $rowtemppekerjaan["id_tempstock"]; ?>">
                    <button id="hapus_pekerjaan_kry" type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                  </form>
                </td>
                <!-- <td></td> -->
              </tr>
          <?php
              $nomor ++;
            }
          ?>
        </tbody>
      </table>
    </div>