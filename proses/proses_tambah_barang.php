<?php
	if(isset($_POST["kode_barang"])){
		$kode_barang = $_POST["kode_barang"];
		$nama_barang = $_POST["nama_barang"];
		$jenis_brg = $_POST["jenis_brg"];
		$stock_awal = $_POST["stock_awal"];
		$stock_masuk = $_POST["stock_masuk"];
		$terjual = $_POST["terjual"];
		$stock_akhir = $_POST["stock_akhir"];
		$format_angka = explode(".", $_POST["harga"]);
		$harga = implode($format_angka);
		$modalStock = $stock_akhir * $harga;

		// cek data di setting barang (genteng, paving, dll)
						if($jenis_brg == "Genteng"){
								// cek limit genteng
								$sqllimitstockgenteng = mysqli_query($koneksi, "select kode_barang from setting_limitstokgenteng where kode_barang = '".$kode_barang."'");
								$hitunglimitgenteng = mysqli_num_rows($sqllimitstockgenteng);
					
								// cek setting cetak genteng
								$sqlcetakgenteng = mysqli_query($koneksi, "select kode_barang from setting_cetakgenteng where kode_barang = '".$kode_barang."'");
								$hitungcetakgenteng = mysqli_num_rows($sqlcetakgenteng);
					
								// cek setting cat genteng
								$sqlcatgenteng = mysqli_query($koneksi, "select kode_barang from setting_catgenteng where kode_barang = '".$kode_barang."'");
								$hitungcatgenteng = mysqli_num_rows($sqlcatgenteng);
					
								// cek setting angkat genteng
								$sqlangkatgenteng = mysqli_query($koneksi, "select kode_barang from setting_angkatgenteng where kode_barang = '".$kode_barang."'");
								$hitungangkatgenteng = mysqli_num_rows($sqlangkatgenteng);
					
								if($hitunglimitgenteng == 0 && $hitungcetakgenteng == 0 && $hitungcatgenteng == 0 && $hitungangkatgenteng == 0){
									echo '<div class="alert alert-danger">Data Setting Genteng Belum Dimasukkan!</div>';
					
									include_once "stock_barang/data_stock_barang.php";
								}else{
									// cek di stock barang jika ada yang sama
					
									$cekdatastockbarang = mysqli_query($koneksi, "select * from stock_barang where kode_barang = '".$kode_barang."' and nama_barang = '".$nama_barang."'");
									$countdatastockbarang = mysqli_num_rows($cekdatastockbarang);
					
									if($countdatastockbarang == 1){
										echo '<div class="alert alert-danger">Data Dengan Kode dan Nama Barang Yang Anda Masukkan Sudah Ada!</div>';
					
										include_once "stock_barang/data_stock_barang.php";
									}else{
										mysqli_query($koneksi, "insert into stock_barang(kode_barang,nama_barang,jenis_brg,stock_awal,stock_masuk,stock_akhir,harga,modal_stock) values('".$kode_barang."','".$nama_barang."','".$jenis_brg."','".$stock_awal."','".$stock_masuk."','".$stock_akhir."','".$harga."','".$modalStock."')");
					
										// mysqli_query($koneksi, "insert into stock_terjual values('','".date("Y-m-d")."','".$kode_barang."','".$terjual."')");
					
										echo '<div class="alert alert-success">Data Barang Sudah Ditambahkan</div>';
					
										include_once "stock_barang/data_stock_barang.php";
									}
								}
							}elseif ($jenis_brg == "Paving") {
								// cek setting paving
								$sqlcetakpaving = mysqli_query($koneksi, "select kode_barang from setting_cetakpaving where kode_barang = '".$kode_barang."'");
								$hitungcetakpaving = mysqli_num_rows($sqlcetakpaving);
					
								if($hitungcetakpaving == 0){
									echo '<div class="alert alert-danger">Data Setting Paving Belum Dimasukkan!</div>';
					
									include_once "stock_barang/data_stock_barang.php";
								}else{
									// cek di stock barang jika ada yang sama
					
									$cekdatastockbarang = mysqli_query($koneksi, "select * from stock_barang where kode_barang = '".$kode_barang."' and nama_barang = '".$nama_barang."'");
									$countdatastockbarang = mysqli_num_rows($cekdatastockbarang);
					
									if($countdatastockbarang == 1){
										echo '<div class="alert alert-danger">Data Dengan Kode dan Nama Barang Yang Anda Masukkan Sudah Ada!</div>';
					
										include_once "stock_barang/data_stock_barang.php";
									}else{
										mysqli_query($koneksi, "insert into stock_barang(kode_barang,nama_barang,jenis_brg,stock_awal,stock_masuk,stock_akhir,harga,modal_stock) values('".$kode_barang."','".$nama_barang."','".$jenis_brg."','".$stock_awal."','".$stock_masuk."','".$stock_akhir."','".$harga."','".$modalStock."')");
					
										// mysqli_query($koneksi, "insert into stock_terjual values('','".date("Y-m-d")."','".$kode_barang."','".$terjual."')");
					
										echo '<div class="alert alert-success">Data Barang Sudah Ditambahkan</div>';
					
										include_once "stock_barang/data_stock_barang.php";
									}
								}
							}else{
								// cek jenis barang lain-lain
								$cekcetaklain = mysqli_query($koneksi, "select kode_barang from setting_baranglain where kode_barang = '".$kode_barang."'");
								$hitungcetaklain = mysqli_num_rows($cekcetaklain);
					
								if($hitungcetaklain == 0){
									echo '<div class="alert alert-danger">Data Setting Barang Lain Belum Dimasukkan!</div>';
					
									include_once "stock_barang/data_stock_barang.php";
								}else{
									// cek di stock barang jika ada yang sama
					
									$cekdatastockbarang = mysqli_query($koneksi, "select * from stock_barang where kode_barang = '".$kode_barang."' and nama_barang = '".$nama_barang."'");
									$countdatastockbarang = mysqli_num_rows($cekdatastockbarang);
					
									if($countdatastockbarang == 1){
										echo '<div class="alert alert-danger">Data Dengan Kode dan Nama Barang Yang Anda Masukkan Sudah Ada!</div>';
					
										include_once "stock_barang/data_stock_barang.php";
									}else{
										// cek di stock barang jika ada yang sama
					
										$cekdatastockbarang = mysqli_query($koneksi, "select * from stock_barang where kode_barang = '".$kode_barang."' and nama_barang = '".$nama_barang."'");
										$countdatastockbarang = mysqli_num_rows($cekdatastockbarang);
					
										if($countdatastockbarang == 1){
											echo '<div class="alert alert-danger">Data Dengan Kode dan Nama Barang Yang Anda Masukkan Sudah Ada!</div>';
					
											include_once "stock_barang/data_stock_barang.php";
										}else{
											mysqli_query($koneksi, "insert into stock_barang(kode_barang,nama_barang,jenis_brg,stock_awal,stock_masuk,stock_akhir,harga,modal_stock) values('".$kode_barang."','".$nama_barang."','".$jenis_brg."','".$stock_awal."','".$stock_masuk."','".$stock_akhir."','".$harga."','".$modalStock."')");
					
											// mysqli_query($koneksi, "insert into stock_terjual values('','".date("Y-m-d")."','".$kode_barang."','".$terjual."')");
					
											echo '<div class="alert alert-success">Data Barang Sudah Ditambahkan</div>';
					
											include_once "stock_barang/data_stock_barang.php";
										}
									}
								}
							}
					
	}
?>
