<?php
	if(isset($_POST["notrbayar"])){
		$notrbayar = $_POST["notrbayar"];
		// mengambil sisa tagihan pembayaran tempo pembeli
		$sqlgetsisabayar = "select sisa_tagihan from pembayaran where no_transaksi = '".$notrbayar."' order by id_pembayaran desc";
		$aksigetsisabayar = mysqli_query($koneksi, $sqlgetsisabayar);
		$rowsisabayar = mysqli_fetch_array($aksigetsisabayar);
		$countsisabayar = mysqli_num_rows($aksigetsisabayar);

		// $no_tr_bayar = $_POST["no_tr_bayar"];
		$formattotaltgh = explode(".", $_POST["total_tgh"]);
		$total_tgh = implode($formattotaltgh);
		$formatsisatgh = explode(".", $_POST["sisa_tgh"]);
		$sisa_tgh = implode($formatsisatgh);
		$tgl_bayar = date("Y-m-d", strtotime($_POST["tgl_bayar"]));
		$format_angka = explode(".", $_POST["dp_nominalcash"]);
		$dp_nominalcash = implode($format_angka);
		$masukkan_ke = $_POST["masukkan_ke"];
		$ubahtgltempo = date("Y-m-d", strtotime($_POST["ubahtgltempo"]));

		// $ubahtgltempo = date("Y-m-d", strtotime($_POST["ubahtgltempo"]));
		
		if($countsisabayar == 0){
			$jenis_kirim = $_POST["jenis_kirim"];
		}

		// cek pembayaran pertama dalam tempo
		$sqlcekbayartempo = "select * from pembayaran where no_transaksi = '".$notrbayar."'";
		$aksicekbayartempo = mysqli_query($koneksi, $sqlcekbayartempo);
		$countcekbayartempo = mysqli_num_rows($aksicekbayartempo);

		// jika belum bayar pertama kali
		if($countcekbayartempo == 0){
			// hitung sisa tagihan
			$sisatagihan = $total_tgh - $dp_nominalcash;

			if($jenis_kirim == "Pilih Jenis Pengiriman"){
				echo '<div class="alert alert-danger">Jenis Pengiriman Belum Dipilih!</div>';
				include_once "pembayaran/form_pembayarantempo_pembeli.php";
			}else{
				// ambil total bayar pembeli
				$gettotalbayarpembeli = mysqli_query($koneksi, "select total_bayar from total_bayar_pembeli where no_transaksi = '".$notrbayar."'");
				$rowtotalbayar = mysqli_fetch_array($gettotalbayarpembeli);

				if($dp_nominalcash == $rowtotalbayar["total_bayar"]){
					mysqli_query($koneksi, "update total_bayar_pembeli set sts_lunas = 'Sudah Lunas' where no_transaksi = '".$notrbayar."'");
					
					// update jenis pengiriman
					$sqlupdatejeniskirim = "update total_bayar_pembeli set jns_pengiriman = '".$jenis_kirim."' where no_transaksi = '".$notrbayar."'";
					mysqli_query($koneksi, $sqlupdatejeniskirim);

					// ambil dana dari tabel kas
					$sqlgetkas = "select * from kas";
					$aksigetkas = mysqli_query($koneksi, $sqlgetkas);
					$rowkas = mysqli_fetch_array($aksigetkas);

					// jika pembayaran dimasukkan ke Kas Besar
					if($masukkan_ke == "Kas Besar"){
						// update dana kas besar
						$kasbesarbaru = $rowkas["kas_besar"] + $dp_nominalcash;

						// masukkan pembayaran pertama sebagai DP
						$sqlinsertbayarpertama = "insert into pembayaran(no_transaksi,nominal_dp,sisa_tagihan,tgl_bayar,masuk_ke) values('".$notrbayar."','".$dp_nominalcash."','".$sisatagihan."','".$tgl_bayar."', '".$masukkan_ke."')";
						mysqli_query($koneksi, $sqlinsertbayarpertama);

						$sqlupdatekasbesar = "update kas set kas_besar = '".$kasbesarbaru."' where id_kas = 1";
						mysqli_query($koneksi, $sqlupdatekasbesar);

					}else{
						$kasbesarbaru = $rowkas["kas_bank"] + $dp_nominalcash;

						// masukkan pembayaran pertama sebagai DP
						$sqlinsertbayarpertama = "insert into pembayaran(no_transaksi,nominal_dp,sisa_tagihan,tgl_bayar,masuk_ke) values('".$notrbayar."','".$dp_nominalcash."','".$sisatagihan."','".$tgl_bayar."', '".$masukkan_ke."')";
						mysqli_query($koneksi, $sqlinsertbayarpertama);

						$sqlupdatekasbank = "update kas set kas_bank = '".$kasbesarbaru."' where id_kas = 1";
						mysqli_query($koneksi, $sqlupdatekasbank);

						mysqli_query($koneksi, "insert into rekening_koran values('','".$tgl_bayar."','Pembayaran Tempo Order Pembeli','".$dp_nominalcash."','Kredit')");
					}

					mysqli_query($koneksi, "update order_pembeli set jatuh_tempo = '".$ubahtgltempo."' where no_transaksi = '".$notrbayar."'");

					echo '<div class="alert alert-success">Pembayaran Dibayar Lunas</div>';

					include_once "pembayaran/data_pembayaran_tempopembeli.php";
				}else{
					// update jenis pengiriman
					$sqlupdatejeniskirim = "update total_bayar_pembeli set jns_pengiriman = '".$jenis_kirim."' where no_transaksi = '".$notrbayar."'";
					mysqli_query($koneksi, $sqlupdatejeniskirim);

					// ambil dana dari tabel kas
					$sqlgetkas = "select * from kas";
					$aksigetkas = mysqli_query($koneksi, $sqlgetkas);
					$rowkas = mysqli_fetch_array($aksigetkas);

					// jika pembayaran dimasukkan ke Kas Besar
					if($masukkan_ke == "Kas Besar"){
						// update dana kas besar
						$kasbesarbaru = $rowkas["kas_besar"] + $dp_nominalcash;

						// masukkan pembayaran pertama sebagai DP
						$sqlinsertbayarpertama = "insert into pembayaran(no_transaksi,nominal_dp,sisa_tagihan,tgl_bayar,masuk_ke) values('".$notrbayar."','".$dp_nominalcash."','".$sisatagihan."','".$tgl_bayar."', '".$masukkan_ke."')";
						mysqli_query($koneksi, $sqlinsertbayarpertama);

						$sqlupdatekasbesar = "update kas set kas_besar = '".$kasbesarbaru."' where id_kas = 1";
						mysqli_query($koneksi, $sqlupdatekasbesar);
					}else{
						$kasbesarbaru = $rowkas["kas_bank"] + $dp_nominalcash;

						// masukkan pembayaran pertama sebagai DP
						$sqlinsertbayarpertama = "insert into pembayaran(no_transaksi,nominal_dp,sisa_tagihan,tgl_bayar,masuk_ke) values('".$notrbayar."','".$dp_nominalcash."','".$sisatagihan."','".$tgl_bayar."', '".$masukkan_ke."')";
						mysqli_query($koneksi, $sqlinsertbayarpertama);

						$sqlupdatekasbank = "update kas set kas_bank = '".$kasbesarbaru."' where id_kas = 1";
						mysqli_query($koneksi, $sqlupdatekasbank);

						mysqli_query($koneksi, "insert into rekening_koran values('','".$tgl_bayar."','Pembayaran Tempo Order Pembeli','".$dp_nominalcash."','Kredit')");
					}

					mysqli_query($koneksi, "update order_pembeli set jatuh_tempo = '".$ubahtgltempo."' where no_transaksi = '".$notrbayar."'");

					echo '<div class="alert alert-success">DP Sudah Dibayar</div>';

					include_once "pembayaran/data_pembayaran_tempopembeli.php";
				}
			}
		}else{
			// ambil sisa tagihan
			$sqlgetsisatagihan = "select sisa_tagihan from pembayaran where no_transaksi = '".$notrbayar."' order by id_pembayaran desc";
			$aksigetsisatagihan = mysqli_query($koneksi, $sqlgetsisatagihan);
			$rowsisatagihan = mysqli_fetch_array($aksigetsisatagihan);

			// hitung sisa tagihan jika ada pembayaran baru
			$sisatagihan = $rowsisatagihan["sisa_tagihan"] - $dp_nominalcash;

			if($sisatagihan != 0){
				// ambil dana dari tabel kas
				$sqlgetkas = "select * from kas";
				$aksigetkas = mysqli_query($koneksi, $sqlgetkas);
				$rowkas = mysqli_fetch_array($aksigetkas);

				// jika pembayaran dimasukkan ke Kas Besar
				if($masukkan_ke == "Kas Besar"){
					// update dana kas besar
					$kasbesarbaru = $rowkas["kas_besar"] + $dp_nominalcash;

					// masukkan pembayaran baru
				$sqlbayarbaru = "insert into pembayaran(no_transaksi,nominal_cash,sisa_tagihan,tgl_bayar,masuk_ke) values('".$notrbayar."','".$dp_nominalcash."','".$sisatagihan."','".$tgl_bayar."','".$masukkan_ke."')";
				mysqli_query($koneksi, $sqlbayarbaru);

					$sqlupdatekasbesar = "update kas set kas_besar = '".$kasbesarbaru."' where id_kas = 1";
					mysqli_query($koneksi, $sqlupdatekasbesar);
				}else{
					$kasbesarbaru = $rowkas["kas_bank"] + $dp_nominalcash;

					// masukkan pembayaran baru
				$sqlbayarbaru = "insert into pembayaran(no_transaksi,nominal_cash,sisa_tagihan,tgl_bayar,masuk_ke) values('".$notrbayar."','".$dp_nominalcash."','".$sisatagihan."','".$tgl_bayar."','".$masukkan_ke."')";
				mysqli_query($koneksi, $sqlbayarbaru);

					$sqlupdatekasbank = "update kas set kas_bank = '".$kasbesarbaru."' where id_kas = 1";
					mysqli_query($koneksi, $sqlupdatekasbank);

					mysqli_query($koneksi, "insert into rekening_koran values('','".$tgl_bayar."','Pembayaran Tempo Order Pembeli','".$dp_nominalcash."','Kredit')");
				}

				mysqli_query($koneksi, "update order_pembeli set jatuh_tempo = '".$ubahtgltempo."' where no_transaksi = '".$notrbayar."'");

				echo '<div class="alert alert-success">Sisa Tagihan Sudah Dibayar</div>';

				include_once "pembayaran/data_pembayaran_tempopembeli.php";
			}else{
				// update status lunas total pembayaran 
				$sqlupdatetotalbayar = "update total_bayar_pembeli set sts_lunas = 'Sudah Lunas' where no_transaksi = '".$notrbayar."'";
				mysqli_query($koneksi, $sqlupdatetotalbayar);

				

				// ambil dana dari tabel kas
				$sqlgetkas = "select * from kas";
				$aksigetkas = mysqli_query($koneksi, $sqlgetkas);
				$rowkas = mysqli_fetch_array($aksigetkas);

				// jika pembayaran dimasukkan ke Kas Besar
				if($masukkan_ke == "Kas Besar"){
					// update dana kas besar
					$kasbesarbaru = $rowkas["kas_besar"] + $dp_nominalcash;

					// masukkan pembayaran baru
				$sqlbayarbaru = "insert into pembayaran(no_transaksi,nominal_cash,sisa_tagihan,tgl_bayar,masuk_ke) values('".$notrbayar."','".$dp_nominalcash."','".$sisatagihan."','".$tgl_bayar."','".$masukkan_ke."')";
				mysqli_query($koneksi, $sqlbayarbaru);

					$sqlupdatekasbesar = "update kas set kas_besar = '".$kasbesarbaru."' where id_kas = 1";
					mysqli_query($koneksi, $sqlupdatekasbesar);
				}else{
					$kasbesarbaru = $rowkas["kas_bank"] + $dp_nominalcash;

					// masukkan pembayaran baru
				$sqlbayarbaru = "insert into pembayaran(no_transaksi,nominal_cash,sisa_tagihan,tgl_bayar,masuk_ke) values('".$notrbayar."','".$dp_nominalcash."','".$sisatagihan."','".$tgl_bayar."','".$masukkan_ke."')";
				mysqli_query($koneksi, $sqlbayarbaru);

					$sqlupdatekasbank = "update kas set kas_bank = '".$kasbesarbaru."' where id_kas = 1";
					mysqli_query($koneksi, $sqlupdatekasbank);

					mysqli_query($koneksi, "insert into rekening_koran values('','".$tgl_bayar."','Pembayaran Tempo Order Pembeli','".$dp_nominalcash."','Kredit')");
				}

				mysqli_query($koneksi, "update order_pembeli set jatuh_tempo = '".$ubahtgltempo."' where no_transaksi = '".$notrbayar."'");

				echo '<div class="alert alert-success">Sisa Tagihan Sudah Dibayar</div>';

				include_once "pembayaran/data_pembayaran_tempopembelilunas.php";
			}
		}
	}
