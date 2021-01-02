<?php
	include "koneksi.php";

	$kode_brg = $_POST["kode_brg"];
	$jenis_brg = $_POST["jenis_brg"];
	$jumlah_beli = $_POST["jumlah_beli"];

	$sqlgetvalue = "select * from stock_barang where kode_barang = '".$kode_brg."'";
	// $sqlgetvalue = "select kode_barang from stock_barang where nama_barang like '%PAVING BATA 6CM ABU%'";

	$aksigetvalue = mysqli_query($koneksi, $sqlgetvalue);

	$rowvalue = mysqli_fetch_assoc($aksigetvalue);

	if($jenis_brg == "Paving"){
		$getqtymeter = mysqli_query($koneksi, "select qtymeter from setting_cetakpaving where kode_barang = '".$kode_brg."'");
		$rowqtymeter = mysqli_fetch_array($getqtymeter);

		$totalbeli = $jumlah_beli * $rowqtymeter["qtymeter"];

		if($totalbeli < $rowvalue["stock_akhir"]){
			$dataalert = "<div class='alert alert-success'>Stock Barang Masih Cukup Untuk Dibeli</div>";
			$databutton = $rowvalue["stock_akhir"];
		}else{
			$dataalert = "<div class='alert alert-danger'>Stock Barang Tidak Cukup Untuk Dibeli</div>";
			$databutton = $rowvalue["stock_akhir"];
		}
	
		$datakirim = array(
			"alert" => $dataalert,
			"btn" => $databutton
		);
	
		echo json_encode($datakirim);
	}else{
		if($jumlah_beli < $rowvalue["stock_akhir"]){
			$dataalert = "<div class='alert alert-success'>Stock Barang Masih Cukup Untuk Dibeli</div>";
			$databutton = $rowvalue["stock_akhir"];
		}else{
			$dataalert = "<div class='alert alert-danger'>Stock Barang Tidak Cukup Untuk Dibeli</div>";
			$databutton = $rowvalue["stock_akhir"];
		}
	
		$datakirim = array(
			"alert" => $dataalert,
			"btn" => $databutton
		);
	
		echo json_encode($datakirim);
	}

	// $val_barang = array(
	// 	"kode_barang" => $rowvalue["kode_barang"],
	// 	"stock_akhir" => $rowvalue["stock_akhir"],
	// );

	
?>