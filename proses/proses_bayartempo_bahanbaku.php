<?php
	if(isset($_POST["no_tr_bayar"])){
		$notrbayar = $_POST["no_tr_bayar"];
		// mengambil sisa tagihan pembayaran tempo pembeli
		$sqlgetsisabayar = "select sisa_tagihan from pembayaran_bahanbaku where no_transaksi = '".$notrbayar."' order by id_bayar_bahanbaku desc";
		$aksigetsisabayar = mysqli_query($koneksi, $sqlgetsisabayar);
		$rowsisabayar = mysqli_fetch_array($aksigetsisabayar);
		$countsisabayar = mysqli_num_rows($aksigetsisabayar);

		$no_tr_bayar = $_POST["no_tr_bayar"];
		$formattotaltgh = explode(".", $_POST["total_tgh"]);
		$total_tgh = implode($formattotaltgh);
		$format_sisa = explode(".", $_POST["sisa_tgh"]);
		$sisa_tgh = implode($format_sisa);
		$tgl_bayar = date("Y-m-d", strtotime($_POST["tgl_bayar"]));
		$format_angka = explode(".", $_POST["dp_nominalcash"]);
		$dp_nominalcash = implode($format_angka);
		$kasdari = $_POST["kasdari"];

		// cek pembayaran pertama dalam tempo
		$sqlcekbayartempo = "select * from pembayaran_bahanbaku where no_transaksi = '".$notrbayar."'";
		$aksicekbayartempo = mysqli_query($koneksi, $sqlcekbayartempo);
		$countcekbayartempo = mysqli_num_rows($aksicekbayartempo);

		// jika belum bayar pertama kali
		if($countcekbayartempo == 0){
			// hitung sisa tagihan
			$sisatagihan = $total_tgh - $dp_nominalcash;

			// update jenis pengiriman
			// $sqlupdatejeniskirim = "update total_bayar_bahanbaku set jns_pengiriman = '".$jenis_kirim."' where no_transaksi = '".$no_tr_bayar."'";
			// mysqli_query($koneksi, $sqlupdatejeniskirim);

			// masukkan pembayaran pertama sebagai DP
			$sqlinsertbayarpertama = "insert into pembayaran_bahanbaku(no_transaksi,nominal_dp,sisa_tagihan,tgl_bayar) values('".$no_tr_bayar."','".$dp_nominalcash."','".$sisatagihan."','".$tgl_bayar."')";
			mysqli_query($koneksi, $sqlinsertbayarpertama);

			if($kasdari == "Kas Besar"){
				// update dana kas kecil
				$kaskecilbaru = $rowkas["kas_kecil"] + $dp_nominalcash;
				$kasbesarbaru = $rowkas["kas_besar"] - $dp_nominalcash;

				$sqlupdatekasbesar = "update kas set kas_kecil = '".$kaskecilbaru."', kas_besar = '".$kasbesarbaru."' where id_kas = 1";
				mysqli_query($koneksi, $sqlupdatekasbesar);

				// input data kasbon ke pengeluaran perusahaan
				$sqlinputpengeluaran = "insert into pengeluaran(tgl_pengeluaran,no_transaksi,nama_pengeluaran,jenis_pengeluaran,nominal) values('".$tgl_bayar."','".$no_tr_bayar."','Bayar Tunai Bahan Baku','Belanja Bahan Baku','".$dp_nominalcash."')";
				mysqli_query($koneksi, $sqlinputpengeluaran);
			}else{
				// update dana kas kecil
				$kaskecilbaru = $rowkas["kas_kecil"] + $dp_nominalcash;
				$kasbankbaru = $rowkas["kas_bank"] - $dp_nominalcash;

				$sqlupdatekasbesar = "update kas set kas_kecil = '".$kaskecilbaru."', kas_bank = '".$kasbankbaru."' where id_kas = 1";
				mysqli_query($koneksi, $sqlupdatekasbesar);

				// input data kasbon ke pengeluaran perusahaan
				$sqlinputpengeluaran = "insert into pengeluaran(tgl_pengeluaran,no_transaksi,nama_pengeluaran,jenis_pengeluaran,nominal) values('".$tgl_bayar."','".$no_tr_bayar."','Bayar Tunai Bahan Baku','Belanja Bahan Baku','".$dp_nominalcash."')";
				mysqli_query($koneksi, $sqlinputpengeluaran);

				mysqli_query($koneksi, "insert into rekening_koran values('','".date("Y-m-d")."','Bayar Tunai Beli Bahan Baku','".$dp_nominalcash."','Debit')");
			}

			// input data kasbon ke pengeluaran perusahaan
			$sqlinputpengeluaran = "insert into pengeluaran values('','".$tgl_bayar."','','".$no_tr_bayar."','Bayar Tempo Bahan Baku','Belanja Bahan Baku','".$dp_nominalcash."','','','')";
			mysqli_query($koneksi, $sqlinputpengeluaran);

			echo '<div class="alert alert-success">DP Sudah Dibayar</div>';

			include_once "pengeluaran/data_pengeluaran.php";
		}else{
			// ambil sisa tagihan
			$sqlgetsisatagihan = "select sisa_tagihan from pembayaran_bahanbaku where no_transaksi = '".$no_tr_bayar."' order by id_bayar_bahanbaku desc";
			$aksigetsisatagihan = mysqli_query($koneksi, $sqlgetsisatagihan);
			$rowsisatagihan = mysqli_fetch_array($aksigetsisatagihan);

			// hitung sisa tagihan jika ada pembayaran baru
			$sisatagihan = $rowsisatagihan["sisa_tagihan"] - $dp_nominalcash;

			if($sisatagihan != 0){
				// masukkan pembayaran baru
				$sqlbayarbaru = "insert into pembayaran_bahanbaku(no_transaksi,nominal_cash,sisa_tagihan,tgl_bayar) values('".$no_tr_bayar."','".$dp_nominalcash."','".$sisatagihan."','".$tgl_bayar."')";
				mysqli_query($koneksi, $sqlbayarbaru);

				// ambil dana dari tabel kas
				$sqlgetkas = "select * from kas";
				$aksigetkas = mysqli_query($koneksi, $sqlgetkas);
				$rowkas = mysqli_fetch_array($aksigetkas);

				if($kasdari == "Kas Besar"){
					// update dana kas kecil
					$kaskecilbaru = $rowkas["kas_kecil"] + $dp_nominalcash;
					$kasbesarbaru = $rowkas["kas_besar"] - $dp_nominalcash;
	
					$sqlupdatekasbesar = "update kas set kas_kecil = '".$kaskecilbaru."', kas_besar = '".$kasbesarbaru."' where id_kas = 1";
					mysqli_query($koneksi, $sqlupdatekasbesar);
	
					// input data kasbon ke pengeluaran perusahaan
					$sqlinputpengeluaran = "insert into pengeluaran(tgl_pengeluaran,no_transaksi,nama_pengeluaran,jenis_pengeluaran,nominal) values('".$tgl_bayar."','".$no_tr_bayar."','Bayar Tunai Bahan Baku','Belanja Bahan Baku','".$dp_nominalcash."')";
					mysqli_query($koneksi, $sqlinputpengeluaran);
				}else{
					// update dana kas kecil
					$kaskecilbaru = $rowkas["kas_kecil"] + $dp_nominalcash;
					$kasbankbaru = $rowkas["kas_bank"] - $dp_nominalcash;
	
					$sqlupdatekasbesar = "update kas set kas_kecil = '".$kaskecilbaru."', kas_bank = '".$kasbankbaru."' where id_kas = 1";
					mysqli_query($koneksi, $sqlupdatekasbesar);
	
					// input data kasbon ke pengeluaran perusahaan
					$sqlinputpengeluaran = "insert into pengeluaran(tgl_pengeluaran,no_transaksi,nama_pengeluaran,jenis_pengeluaran,nominal) values('".$tgl_bayar."','".$no_tr_bayar."','Bayar Tunai Bahan Baku','Belanja Bahan Baku','".$dp_nominalcash."')";
					mysqli_query($koneksi, $sqlinputpengeluaran);
	
					mysqli_query($koneksi, "insert into rekening_koran values('','".date("Y-m-d")."','Bayar Tunai Beli Bahan Baku','".$dp_nominalcash."','Debit')");
				}
				// }

				// input data kasbon ke pengeluaran perusahaan
				$sqlinputpengeluaran = "insert into pengeluaran values('','".$tgl_bayar."','','".$no_tr_bayar."','Bayar Tempo Bahan Baku','Belanja Bahan Baku','".$dp_nominalcash."','','')";
				mysqli_query($koneksi, $sqlinputpengeluaran);

				echo '<div class="alert alert-success">Sisa Tagihan Sudah Dibayar</div>';

				include_once "pengeluaran/data_pengeluaran.php";
			}else{
				// update status lunas total pembayaran


				// masukkan pembayaran baru
				$sqlbayarbaru = "insert into pembayaran_bahanbaku(no_transaksi,nominal_cash,sisa_tagihan,tgl_bayar) values('".$no_tr_bayar."','".$dp_nominalcash."','".$sisatagihan."','".$tgl_bayar."')";
				mysqli_query($koneksi, $sqlbayarbaru);

				// ambil dana dari tabel kas
				$sqlgetkas = "select * from kas";
				$aksigetkas = mysqli_query($koneksi, $sqlgetkas);
				$rowkas = mysqli_fetch_array($aksigetkas);

				// jika pembayaran dimasukkan ke Kas Besar
				if($kasdari == "Kas Besar"){
					// update dana kas kecil
					$kaskecilbaru = $rowkas["kas_kecil"] + $dp_nominalcash;
					$kasbesarbaru = $rowkas["kas_besar"] - $dp_nominalcash;
	
					$sqlupdatekasbesar = "update kas set kas_kecil = '".$kaskecilbaru."', kas_besar = '".$kasbesarbaru."' where id_kas = 1";
					mysqli_query($koneksi, $sqlupdatekasbesar);
	
					// input data kasbon ke pengeluaran perusahaan
					$sqlinputpengeluaran = "insert into pengeluaran(tgl_pengeluaran,no_transaksi,nama_pengeluaran,jenis_pengeluaran,nominal) values('".$tgl_bayar."','".$no_tr_bayar."','Bayar Tunai Bahan Baku','Belanja Bahan Baku','".$dp_nominalcash."')";
					mysqli_query($koneksi, $sqlinputpengeluaran);
				}else{
					// update dana kas kecil
					$kaskecilbaru = $rowkas["kas_kecil"] + $dp_nominalcash;
					$kasbankbaru = $rowkas["kas_bank"] - $dp_nominalcash;
	
					$sqlupdatekasbesar = "update kas set kas_kecil = '".$kaskecilbaru."', kas_bank = '".$kasbankbaru."' where id_kas = 1";
					mysqli_query($koneksi, $sqlupdatekasbesar);
	
					// input data kasbon ke pengeluaran perusahaan
					$sqlinputpengeluaran = "insert into pengeluaran(tgl_pengeluaran,no_transaksi,nama_pengeluaran,jenis_pengeluaran,nominal) values('".$tgl_bayar."','".$no_tr_bayar."','Bayar Tunai Bahan Baku','Belanja Bahan Baku','".$dp_nominalcash."')";
					mysqli_query($koneksi, $sqlinputpengeluaran);
	
					mysqli_query($koneksi, "insert into rekening_koran values('','".date("Y-m-d")."','Bayar Tunai Beli Bahan Baku','".$dp_nominalcash."','Debit')");
				}

				// input data kasbon ke pengeluaran perusahaan
				$sqlinputpengeluaran = "insert into pengeluaran values('','".$tgl_bayar."','','".$no_tr_bayar."','Bayar Tempo Bahan Baku','Belanja Bahan Baku','".$dp_nominalcash."','','')";
				mysqli_query($koneksi, $sqlinputpengeluaran);

				$sqlupdatetotalbayar = "update total_bayar_bahanbaku set sts_lunas = 'Sudah Lunas' where no_trbahanbaku = '".$no_tr_bayar."'";
				mysqli_query($koneksi, $sqlupdatetotalbayar);

				echo '<div class="alert alert-success">Sisa Tagihan Terakhir Sudah Dibayar Lunas</div>';

				include_once "pengeluaran/data_pengeluaran.php";
			}
		}
	}

	unset($_POST);
?>
