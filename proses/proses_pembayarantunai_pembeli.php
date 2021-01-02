<?php
	if(isset($_POST["notrbayar"])){
		$no_tr_bayar = $_POST["notrbayar"];
		$tgl_bayar = date("Y-m-d", strtotime($_POST["tgl_bayar"]));
		// $jns_pembayaran = $_POST["jns_pembayaran"];
		$formattotaltgh = explode(".", $_POST["total_tgh"]);
		$total_tgh = implode($formattotaltgh);
		$format_angka = explode(".", $_POST["dp_nominalcash"]);
		$dp_nominalcash = implode($format_angka);
		$masukkan_ke = $_POST["masukkan_ke"];
		$jenis_kirim = $_POST["jenis_kirim"];
		// $diskon = $_POST["diskon"];

		if($jenis_kirim == "Pilih Jenis Pengiriman"){
			echo '<div class="alert alert-danger">Jenis Pengiriman Belum Dipilih!</div>';
			include_once "pembayaran/form_pembayarantunai_pembeli.php";
		}else{
			if($dp_nominalcash < $total_tgh || $dp_nominalcash > $total_tgh){
				echo '<div class="alert alert-danger">Masukan Jumlah Pembayaran Dengan Uang Pas!</div>';
				include_once "pembayaran/form_pembayarantunai_pembeli.php";
			}else{
				// ambil total bayar di tabel total pembayaran pembeli
				$sqlgettotalbayar = "select sisa_total from total_bayar_pembeli where no_transaksi = '".$no_tr_bayar."'";
				$aksigettotalbayar = mysqli_query($koneksi, $sqlgettotalbayar);
				$rowtotalbayar = mysqli_fetch_array($aksigettotalbayar);

				// ambil dana dari tabel kas
				$sqlgetkas = "select * from kas";
				$aksigetkas = mysqli_query($koneksi, $sqlgetkas);
				$rowkas = mysqli_fetch_array($aksigetkas);

				$uangkembalian = $dp_nominalcash - $rowtotalbayar["sisa_total"];

				// update jenis pengiriman dan status lunas di tabel total bayar
				mysqli_query($koneksi, "update total_bayar_pembeli set jns_pengiriman = '".$jenis_kirim."', sts_lunas = 'Sudah Lunas' where no_transaksi = '".$no_tr_bayar."'");

				

				// jika pembayaran dimasukkan ke Kas Besar
				if($masukkan_ke == "Kas Besar"){

					// masukkan data pembayaran ke tabel pembayaran
					$sqlinsertpembayaran = "insert into pembayaran(no_transaksi,nominal_cash,tgl_bayar,masuk_ke) values('".$no_tr_bayar."','".$dp_nominalcash."','".$tgl_bayar."','".$masukkan_ke."')";
					mysqli_query($koneksi, $sqlinsertpembayaran);

					// update dana kas besar
					$kasbesarbaru = $rowkas["kas_besar"] + $dp_nominalcash;

					$sqlupdatekasbesar = "update kas set kas_besar = '".$kasbesarbaru."' where id_kas = 1";
					mysqli_query($koneksi, $sqlupdatekasbesar);
				}else{
					// masukkan data pembayaran ke tabel pembayaran
					$sqlinsertpembayaran = "insert into pembayaran(no_transaksi,nominal_cash,tgl_bayar,masuk_ke) values('".$no_tr_bayar."','".$dp_nominalcash."','".$tgl_bayar."','".$masukkan_ke."')";
					mysqli_query($koneksi, $sqlinsertpembayaran);
					
					$kasbesarbaru = $rowkas["kas_bank"] + $dp_nominalcash;

					$sqlupdatekasbank = "update kas set kas_bank = '".$kasbesarbaru."' where id_kas = 1";
					mysqli_query($koneksi, $sqlupdatekasbank);

					mysqli_query($koneksi, "insert into rekening_koran values('','".$tgl_bayar."','Pembayaran Cash Order Pembeli','".$dp_nominalcash."','Kredit')");
				}

				// if($dp_nominalcash > $total_tgh){
				// 	$uangkembalian = $dp_nominalcash - $total_tgh;
				// }else{
				// 	$uangkembalian = 0;
				// }

				echo '<div class="alert alert-success">No Transaksi '.$no_tr_bayar.', Sudah Dibayar dengan Uang Tunai Sebesar Rp '.number_format($dp_nominalcash,1,",",".").'</div>';

				include_once "pembayaran/data_pembayarantunai_lunas.php";
			}

			// echo '<div class="alert alert-success">Uang Kembali : '.$uangkembalian.'</div>';
		}
	}
?>