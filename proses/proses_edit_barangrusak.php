<?php
	$idbarangrusakedit = $_POST["idbarangrusakedit"];
	$no_treditrusak = $_POST["no_treditrusak"];
	$kode_brg_awal = $_POST["kode_brg_awal"];
	$kode_brg = $_POST["kode_brg"];
	$nama_brg = $_POST["nama_brg"];
	$qty_brg = $_POST["qty_brg"];
	$stn_brg = $_POST["stn_brg"];
	$sumber_brg = $_POST["sumber_brg"];
	$refund = $_POST["refund"];
	$byr_refund = $_POST["byr_refund"];
	$formatuangrefund = explode(".", $_POST["uangrefund"]);
	$uangrefund = implode($formatuangrefund);

	// mengembalikan stok barang dan ambil lagi
	$ambilstockbarang = mysqli_query($koneksi, "select * from stock_barang where kode_barang = '".$kode_brg_awal."'");
	$rowstockbarang = mysqli_fetch_array($ambilstockbarang);

	// ambil stok terjual
	$ambilstokterjual = mysqli_query($koneksi, "select jml_terjual from stock_terjual where kd_barang = '".$kode_brg_awal."'");
	$rowstokterjual = mysqli_fetch_array($ambilstokterjual);

	$totalstockbarang = $rowstockbarang["stock_awal"] + $rowstockbarang["stock_masuk"];
	$totalterjuallama = $rowstokterjual["jml_terjual"] - $qty_brg;
	$totalstockakhirlama = $rowstockbarang["stock_akhir"] + $qty_brg;

	// masukan kembali stok ke masing2
	mysqli_query($koneksi, "update stock_barang set stock_akhir = '".$$totalstockakhirlama."' where kode_barang = '".$kode_brg_awal."'");
	mysqli_query($koneksi, "update stock_terjual set jml_terjual = '".$totalstockakhirlama."' where kd_barang = '".$kode_brg_awal."'");

	// total terjual baru dan stock akhir baru jika ada perubahan

	$totalterjualkembali = $rowstokterjual["jml_terjual"] + $qty_brg;
	$totalstockakhirkembali = $rowstockbarang["stock_akhir"] - $qty_brg;


	if(!empty($kode_brg)){
		$kodebarang = $kode_brg;
		if($sumber_brg == "Internal"){
			mysqli_query($koneksi, "update stock_barang set stock_akhir = '".$totalstockakhirkembali."' where kode_barang = '".$kodebarang."'");
			mysqli_query($koneksi, "update stock_terjual set jml_terjual = '".$totalterjualkembali."' where kd_barang = '".$kodebarang."' and tgl_terjual = '".date("Y-m-d")."'");
		}
	}else{
		$kodebarang = $kode_brg_awal;
		if($sumber_brg == "Internal"){
			mysqli_query($koneksi, "update stock_barang set stock_akhir = '".$totalstockakhir."' where kode_barang = '".$kodebarang."'");
			mysqli_query($koneksi, "update stock_terjual set jml_terjual = '".$totalterjualkembali."' where kd_barang = '".$kodebarang."' and tgl_terjual = '".date("Y-m-d")."'");
		}
	}

	// mengembalikan dan merubah sisa total bayar dengan yg baru
	if($refund == "Refund Uang"){
		$ambilsisatotal = mysqli_query($koneksi, "select sisa_total from total_bayar_pembeli where no_transaksi = '".$no_treditrusak."'");
		$rowsisatotal = mysqli_fetch_array($ambilsisatotal);

		$sisatotalkembali = $rowsisatotal["sisa_total"] + $byr_refund;

		mysqli_query($koneksi, "update total_bayar_pembeli set sisa_total = '".$sisatotalkembali."' where no_transaksi = '".$no_treditrusak."'");

		$sisatotalbaru = $rowsisatotal["sisa_total"] - $byr_refund;

		mysqli_query($koneksi, "update total_bayar_pembeli set sisa_total = '".$sisatotalbaru."' where no_transaksi = '".$no_treditrusak."'");
		mysqli_query($koneksi, "update pengeluaran set nominal = '".$byr_refund."' where no_transaksi = '".$no_treditrusak."'");
	}

	mysqli_query($koneksi, "update barang_rusak set kode_brg = '".$kodebarang."', qty_barang = '".$qty_brg."', satuan_brg = '".$stn_brg."', sumber_brg = '".$sumber_brg."', refund = '".$refund."', bayar_refund = '".$byr_refund."', nominal_refund = '".$uangrefund."' where id_barangrusak = '".$idbarangrusakedit."'");

	echo '<div class="alert alert-success">Data Feedback Kerusakan Barang Sudah Diperbarui</div>';

	include_once "dokumen/data_feedback.php";
?>