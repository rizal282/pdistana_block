<?php
	include_once "koneksi.php";

	$id_brgrusak = $_POST["id_brgrusak"];
	$no_trfeedback = $_POST["id_trbrgrusak"];

	// kembalikan jumlah barang ke stock barang

	// ambil dulu kode barang yang rusak
	$ambilbarangrusak = mysqli_query($koneksi, "select * from barang_rusak where no_transaksi = '".$no_trfeedback."' and id_barangrusak = '".$id_brgrusak."'");
	$rowbarangrusak = mysqli_fetch_array($ambilbarangrusak);

	if($rowbarangrusak["sumber_brg"] == "Internal"){
		// ambil stock barang sesuai dengan kode barang yg rusak
		$ambildatastockbarang = mysqli_query($koneksi, "select * from stock_barang where kode_barang = '".$rowbarangrusak["kode_brg"]."'");
		$rowstockbarang = mysqli_fetch_array($ambildatastockbarang);

		// kurangi jumlah stock barang yg terjual dengan jumlah barang yg akan dihapus
		// jumlahkan stock barang yg ada stock masuk dan stock awal
		$jumlahstockakhirskrg = $rowstockbarang["stock_akhir"] + $rowbarangrusak["qty_barang"];
		$jumlahterjualskrg = $rowstockbarang["terjual"] - $rowbarangrusak["qty_barang"];

		mysqli_query($koneksi, "update stock_barang set stock_akhir = '".$jumlahstockakhirskrg."', terjual = '".$jumlahterjualskrg."' where kode_barang = '".$rowbarangrusak["kode_brg"]."'");
	}

	// kembalikan uang refund
	if($rowbarangrusak["refund"] == "Ya"){
		$amiluangtotalbayar = mysqli_query($koneksi, "select * from total_bayar_pembeli where no_transaksi = '".$rowbarangrusak["kode_brg"]."'");
		$rowtotalbayar = mysqli_fetch_array($amiluangtotalbayar);

		if($rowtotalbayar["diskon"] == 0){
			$kembalitotalbayar = $rowtotalbayar["total_bayar"] + $rowbarangrusak["bayar_refund"];
			mysqli_query($koneksi, "update total_bayar_pembeli set total_bayar = '".$kembalitotalbayar."' where no_transaksi = '".$no_trfeedback."'");
		}else{
			$kembalitotalbayar = $rowtotalbayar["sisa_total"] + $rowbarangrusak["bayar_refund"];
			mysqli_query($koneksi, "update total_bayar_pembeli set sisa_total = '".$kembalitotalbayar."' where no_transaksi = '".$no_trfeedback."'");
		}
	}

	// hapus data barang rusak
	mysqli_query($koneksi, "delete from barang_rusak where id_barangrusak = '".$id_brgrusak."'");

	echo '<div class="alert alert-success">Data Feedback Barang Rusak Sudah Dihapus</div>';

	include_once "dokumen/data_feedback.php";

?>