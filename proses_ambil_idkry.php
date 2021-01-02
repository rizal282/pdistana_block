<?php
	include "koneksi.php";

	$nama_kry = $_POST["nama_kry"];
	$sqlgetvalue = "select * from karyawan where nama_kry = '".$nama_kry."'";
	// $sqlgetvalue = "select kode_barang from stock_barang where nama_barang like '%PAVING BATA 6CM ABU%'";

	$aksigetvalue = mysqli_query($koneksi, $sqlgetvalue);
	$rowvalue = mysqli_fetch_assoc($aksigetvalue);
	
	$ambiltglkasbon = mysqli_query($koneksi, "select tgl_kasbon from kasbon_kry where id_kry = '".$rowvalue["id_kry"]."'");
	$rowtglkasbon = mysqli_fetch_assoc($ambiltglkasbon);

	$kry = array(
		"idkry" => $rowvalue["id_kry"],
		"group" => $rowvalue["group_kry"],
		"tanggalkasbon" => $rowtglkasbon["tgl_kasbon"]
	);

	echo json_encode($kry);
?>