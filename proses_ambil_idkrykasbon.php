<?php
	include "koneksi.php";

	$nama_kry = $_POST["nama_kry"];
	$sqlgetvalue = "select * from karyawan where nama_kry = '".$nama_kry."'";
	// $sqlgetvalue = "select kode_barang from stock_barang where nama_barang like '%PAVING BATA 6CM ABU%'";

	$aksigetvalue = mysqli_query($koneksi, $sqlgetvalue);
	// $countkode = mysqli_num_rows($aksigetvalue);

	$rowvalue = mysqli_fetch_assoc($aksigetvalue);

	// $kry = array(
	// 	"idkry" => $rowvalue["id_kry"],
	// 	"group" => $rowvalue["group_kry"]
	// );

	echo $rowvalue["id_kry"];
?>