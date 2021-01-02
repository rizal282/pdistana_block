<?php
	if(isset($_POST["no_tr_bayar"])){
		$no_tr_bayar = $_POST["no_tr_bayar"];
		$tgl_bayar = date("Y-m-d", strtotime($_POST["tgl_bayar"]));
		// $jns_pembayaran = $_POST["jns_pembayaran"];
		$format_angka = explode(".", $_POST["dp_nominalcash"]);
		$dp_nominalcash = implode($format_angka);
		$kasdari = $_POST["kasdari"];
		// $jenis_kirim = $_POST["jenis_kirim"];
		// $diskon = $_POST["diskon"];

		// ambil total bayar di tabel total pembayaran pembeli
		$sqlgettotalbayar = "select nominal from total_bayar_bahanbaku where no_trbahanbaku = '".$no_tr_bayar."'";
		$aksigettotalbayar = mysqli_query($koneksi, $sqlgettotalbayar);
		$rowtotalbayar = mysqli_fetch_array($aksigettotalbayar);

		// ambil dana dari tabel kas
		$sqlgetkas = "select * from kas";
		$aksigetkas = mysqli_query($koneksi, $sqlgetkas);
		$rowkas = mysqli_fetch_array($aksigetkas);

		if($rowtotalbayar["nominal"] == $dp_nominalcash){
			$uangkembalian = $dp_nominalcash - $rowtotalbayar["nominal"];

			// update jenis pengiriman dan status lunas di tabel total bayar
			mysqli_query($koneksi, "update total_bayar_bahanbaku set sts_lunas = 'Sudah Lunas' where no_trbahanbaku = '".$no_tr_bayar."'");

			// masukkan data pembayaran ke tabel pembayaran
			$sqlinsertpembayaran = "insert into pembayaran_bahanbaku(no_transaksi,nominal_cash,tgl_bayar) values('".$no_tr_bayar."','".$dp_nominalcash."','".$tgl_bayar."')";
			mysqli_query($koneksi, $sqlinsertpembayaran);

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

			echo '<div class="alert alert-success">No Transaksi '.$no_tr_bayar.', Sudah Dibayar dengan Uang Tunai Sebesar '.$dp_nominalcash.'</div>';
			include_once "pengeluaran/data_pengeluaran.php";

			// echo '<div class="alert alert-success">Uang Kembali : '.$uangkembalian.'</div>';
		}else{
			echo '<div class="alert alert-danger">Nominal Tunai yang Anda Masukkan Tidak Sama dengan Total yang Harus Dibayar!</div>';

			include_once "pengeluaran/data_pengeluaran.php";
		}
	}

	unset($_POST);
?>