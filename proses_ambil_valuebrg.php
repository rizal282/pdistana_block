<?php
	include "koneksi.php";

	$nama_brg = $_POST["nama_brg"];
	$sqlgetvalue = "select kode_barang from stock_barang where nama_barang = '".$nama_brg."'";
	// $sqlgetvalue = "select kode_barang from stock_barang where nama_barang like '%PAVING BATA 6CM ABU%'";

	$aksigetvalue = mysqli_query($koneksi, $sqlgetvalue);

	$rowvalue = mysqli_fetch_assoc($aksigetvalue);

	// $val_barang = array(
	// 	"kode_barang" => $rowvalue["kode_barang"],
	// 	"stock_akhir" => $rowvalue["stock_akhir"],
	// );

	$kode = $rowvalue["kode_barang"];

	echo $kode;
?>