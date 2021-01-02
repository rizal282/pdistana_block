<?php
	if(isset($_POST["editbarangbeli"])){
		$id_detail = $_POST["edit_id_detail"];
		$edit_kode_brg = $_POST["edit_kode_brg"];
		$notr_order = $_POST["notr_order"];
		$nama_brg = $_POST["nama_brg"];
		$hrg_brg = $_POST["hrg_brg"];
		$editjumlah_beli = $_POST["editjumlah_beli"];
		$jumlah_beli = $_POST["jumlah_beli"];
		$sumber_brg	= $_POST["sumber_brg"];

		if($sumber_brg == "Internal"){
			// ambil stock barang
			// $getstockbarang = mysqli_query($koneksi, "select * from stock_barang where kode_barang = '".$edit_kode_brg."'");
			$getstockbarang = mysqli_query($koneksi, "select * from stock_terjual where kd_barang = '".$edit_kode_brg."' and tgl_terjual = '".date("Y-m-d")."' and no_transaksi = '".$notr_order."'");
			$rowstcokbarang = mysqli_fetch_array($getstockbarang);

			$kurangiterjuallama = $rowstcokbarang["jml_terjual"] - $jumlah_beli;

			// update terjual
			mysqli_query($koneksi, "update stock_terjual set jml_terjual = '".$kurangiterjuallama."' where kd_barang = '".$edit_kode_brg."' and tgl_terjual = '".date("Y-m-d")."' and no_transaksi = '".$notr_order."'");

			// ambil lagi terjual
			$ambillagitotalstok = mysqli_query($koneksi, "select * from stock_barang where kode_barang = '".$edit_kode_brg."'");
			$rowambillagitotalstok = mysqli_fetch_array($ambillagitotalstok);

			$totalstockbarang = $rowambillagitotalstok["stock_awal"] + $rowambillagitotalstok["stock_masuk"];

			$ambillagiterjual = mysqli_query($koneksi, "select jml_terjual from stock_terjual where kd_barang = '".$edit_kode_brg."' and tgl_terjual = '".date("Y-m-d")."' and no_transaksi = '".$notr_order."'");
			$rowambillagiterjual = mysqli_fetch_array($ambillagiterjual);

			$terjualsaatini = $rowambillagiterjual["jml_terjual"] + $editjumlah_beli;

			$stockakhirskrg = $totalstockbarang - $terjualsaatini;

			// update lagi stock barang
			mysqli_query($koneksi, "update stock_barang set stock_akhir = '".$stockakhirskrg."' where kode_barang = '".$edit_kode_brg."'");

			mysqli_query($koneksi, "update stock_terjual set jml_terjual = '".$terjualsaatini."' where kd_barang = '".$edit_kode_brg."' and tgl_terjual = '".date("Y-m-d")."' and no_transaksi = '".$notr_order."'");

			$total_hrg_baru = $hrg_brg * $editjumlah_beli;

			$sql_edit_detail = "update detail_order_pembeli set nama_barang = '".$nama_brg."', hrg_barang = '".$hrg_brg."', jumlah_beli = '".$editjumlah_beli."', total_hrg = '".$total_hrg_baru."', sumber_brg = '".$sumber_brg."' where id_detail_order = '".$id_detail."'";
			mysqli_query($koneksi, $sql_edit_detail);

			// jumlahkan ulang total bayarnya
			$gettotalbayar = mysqli_query($koneksi, "select sum(total_hrg) as total_harga from detail_order_pembeli where no_transaksi = '".$notr_order."'");
			$rowtotalbayar = mysqli_fetch_array($gettotalbayar);
			// echo $rowtotalbayar["total_harga"];

			mysqli_query($koneksi, "update total_bayar_pembeli set total_bayar = '".$rowtotalbayar["total_harga"]."' where no_transaksi = '".$notr_order."'");
		}else{
			$getstockbarang = mysqli_query($koneksi, "select * from stock_terjual where kd_barang = '".$edit_kode_brg."' and tgl_terjual = '".date("Y-m-d")."' and no_transaksi = '".$notr_order."'");
			$rowstcokbarang = mysqli_fetch_array($getstockbarang);

			$kurangiterjuallama = $rowstcokbarang["jml_terjual"] - $jumlah_beli;

			// update terjual
			mysqli_query($koneksi, "update stock_terjual set jml_terjual = '".$kurangiterjuallama."' where kd_barang = '".$edit_kode_brg."' and tgl_terjual = '".date("Y-m-d")."' and no_transaksi = '".$notr_order."'");

			$ambillagiterjual = mysqli_query($koneksi, "select jml_terjual from stock_terjual where kd_barang = '".$edit_kode_brg."' and tgl_terjual = '".date("Y-m-d")."' and no_transaksi = '".$notr_order."'");
			$rowambillagiterjual = mysqli_fetch_array($ambillagiterjual);

			$terjualsaatini = $rowambillagiterjual["jml_terjual"] + $editjumlah_beli;

			mysqli_query($koneksi, "update stock_terjual set jml_terjual = '".$terjualsaatini."' where kd_barang = '".$edit_kode_brg."' and tgl_terjual = '".date("Y-m-d")."' and no_transaksi = '".$notr_order."'");

			$total_hrg_baru = $hrg_brg * $editjumlah_beli;

			$sql_edit_detail = "update detail_order_pembeli set nama_barang = '".$nama_brg."', hrg_barang = '".$hrg_brg."', jumlah_beli = '".$editjumlah_beli."', total_hrg = '".$total_hrg_baru."', sumber_brg = '".$sumber_brg."' where id_detail_order = '".$id_detail."'";
			mysqli_query($koneksi, $sql_edit_detail);

			// jumlahkan ulang total bayarnya
			$gettotalbayar = mysqli_query($koneksi, "select sum(total_hrg) as total_harga from detail_order_pembeli where no_transaksi = '".$notr_order."'");
			$rowtotalbayar = mysqli_fetch_array($gettotalbayar);
			// echo $rowtotalbayar["total_harga"];

			mysqli_query($koneksi, "update total_bayar_pembeli set total_bayar = '".$rowtotalbayar["total_harga"]."' where no_transaksi = '".$notr_order."'");
		}

		

		echo '<div class="alert alert-info">Data Barang yang Dibeli Sudah di Perbarui</div>';

		include_once "order/data_order_pembeli.php";
	}	
?>

