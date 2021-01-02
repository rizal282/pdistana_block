<?php
	if(isset($_POST["notrbahanbaku"])){
		$notrbahanbaku = $_POST["notrbahanbaku"];
		$tglbelibahanbaku = date("Y-m-d", strtotime($_POST["tglbelibahanbaku"]));
		$supplierbahanbaku = $_POST["supplierbahanbaku"];
		$pembayaranbahanbaku = $_POST["pembayaranbahanbaku"];
		$tgl_tempo = date("Y-m-d", strtotime($_POST["tgl_tempo"]));
		$keteranganbahanbaku = $_POST["keteranganbahanbaku"];

		$sqlinsertorderbahanbaku = "insert into order_bahanbaku values('','".$notrbahanbaku."','".$tglbelibahanbaku."','".$supplierbahanbaku."','".$pembayaranbahanbaku."','".$tgl_tempo."','".$keteranganbahanbaku."')";
		mysqli_query($koneksi, $sqlinsertorderbahanbaku);

		// pindahkan data dari temporary detail order bahan baku
		$sqlmovefromtemptodetailbahanbaku = "insert into detail_order_bahanbaku select * from temp_order_bahanbaku";
		mysqli_query($koneksi, $sqlmovefromtemptodetailbahanbaku);

		// pilih nama barang semen di temp order bahan baku
		// $getjumlahsemen = mysqli_query($koneksi, "select * from temp_order_bahanbaku where nama_barang = 'semen'");
		$getjumlahsemen = mysqli_query($koneksi, "select * from temp_order_bahanbaku");
		$databelisemen = mysqli_fetch_array($getjumlahsemen);

		if($databelisemen["nama_barang"] == "semen"){
			// ambil jumlah semen yang ada di bahan baku
			$getstoksemen = mysqli_query($koneksi, "select jumlah_barang from bahan_baku where nama_bahanbaku = 'semen'");
			$datastoksemen = mysqli_fetch_array($getstoksemen);

			$jumlah_baru = $datastoksemen["jumlah_barang"] + $databelisemen["jumlah_beli"];

			// $totalhargabaru = $databelisemen["hrg_barang"] * $databelisemen["jumlah_beli"];
			$totalhargabaru = $databelisemen["hrg_barang"] * $jumlah_baru;

			mysqli_query($koneksi, "update bahan_baku set harga_barang = '".$databelisemen["hrg_barang"]."', jumlah_barang = '".$jumlah_baru."', total_harga = '".$totalhargabaru."' where nama_bahanbaku = 'semen'");
		}elseif($databelisemen["nama_barang"] == "abu batu"){
			$getstockabubatu = mysqli_query($koneksi, "select jumlah_barang from bahan_baku where nama_bahanbaku = 'abu batu'");
			$datastockabubatu = mysqli_fetch_array($getstockabubatu);

			$jumlah_baru = $datastockabubatu["jumlah_barang"] + $databelisemen["jumlah_beli"];

			$totalhargabaru = $databelisemen["hrg_barang"] * $jumlah_baru;
			mysqli_query($koneksi, "update bahan_baku set harga_barang = '".$databelisemen["hrg_barang"]."', jumlah_barang = '".$jumlah_baru."', total_harga = '".$totalhargabaru."' where nama_bahanbaku = 'abu batu'");
		}elseif($databelisemen["nama_barang"] == "play as"){
			$getstockabubatu = mysqli_query($koneksi, "select jumlah_barang from bahan_baku where nama_bahanbaku = 'play as'");
			$datastockabubatu = mysqli_fetch_array($getstockabubatu);

			$jumlah_baru = $datastockabubatu["jumlah_barang"] + $databelisemen["jumlah_beli"];

			$totalhargabaru = $databelisemen["hrg_barang"] * $jumlah_baru;
			mysqli_query($koneksi, "update bahan_baku set harga_barang = '".$databelisemen["hrg_barang"]."', jumlah_barang = '".$jumlah_baru."', total_harga = '".$totalhargabaru."' where nama_bahanbaku = 'play as'");
		}elseif($databelisemen["nama_barang"] == "wermesh"){
			$getstockabubatu = mysqli_query($koneksi, "select jumlah_barang from bahan_baku where nama_bahanbaku = 'wermesh'");
			$datastockabubatu = mysqli_fetch_array($getstockabubatu);

			$jumlah_baru = $datastockabubatu["jumlah_barang"] + $databelisemen["jumlah_beli"];

			$totalhargabaru = $databelisemen["hrg_barang"] * $jumlah_baru;
			mysqli_query($koneksi, "update bahan_baku set harga_barang = '".$databelisemen["hrg_barang"]."', jumlah_barang = '".$jumlah_baru."', total_harga = '".$totalhargabaru."' where nama_bahanbaku = 'wermesh'");
		}elseif($databelisemen["nama_barang"] == "solar"){
			$getstockabubatu = mysqli_query($koneksi, "select jumlah_barang from bahan_baku where nama_bahanbaku = 'solar'");
			$datastockabubatu = mysqli_fetch_array($getstockabubatu);

			$jumlah_baru = $datastockabubatu["jumlah_barang"] + $databelisemen["jumlah_beli"];

			$totalhargabaru = $databelisemen["hrg_barang"] * $jumlah_baru;
			mysqli_query($koneksi, "update bahan_baku set harga_barang = '".$databelisemen["hrg_barang"]."', jumlah_barang = '".$jumlah_baru."', total_harga = '".$totalhargabaru."' where nama_bahanbaku = 'solar'");
		}

		// hapus data dari temporary order bahan baku
		$sqldeletetemporderbahanbaku = "delete from temp_order_bahanbaku";
		mysqli_query($koneksi, $sqldeletetemporderbahanbaku);

		// masukkan total nominal pembayaran bahan baku
		$sqlsumnominalbahanbaku = "select sum(total_harga) as total_harga from detail_order_bahanbaku where no_trbahanbaku = '".$notrbahanbaku."'";
		$aksisumbahanbaku = mysqli_query($koneksi, $sqlsumnominalbahanbaku);
		$rowsumbahanbaku = mysqli_fetch_array($aksisumbahanbaku);

		$sqlinserttotalbahanbaku = "insert into total_bayar_bahanbaku values('','".$notrbahanbaku."','".$rowsumbahanbaku["total_harga"]."','Belum Lunas')";
		mysqli_query($koneksi, $sqlinserttotalbahanbaku);

		// // ambil stok bahan baku semen
		// $getstoksemen = mysqli_query($koneksi, "select jumlah_barang from bahan_baku where nama_bahanbaku = 'semen'");
		// $rowstoksemen = mysqli_fetch_array($getstoksemen);

		// $jumlahsemen = $rowstoksemen["jumlah_barang"] +

		echo '<div class="alert alert-success">Data Order Bahan Baku Sudah Disimpan</div>';

		include_once "pengeluaran/data_pengeluaran.php";
	}
?>
