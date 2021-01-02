<?php
	include "koneksi.php";

	$nama_wilayah = $_POST["id_wilayah"];
	$sqlgetvalue = "select id_wilayah from wilayah where nama_wilayah = '".$nama_wilayah."'";
	// $sqlgetvalue = "select kode_barang from stock_barang where nama_barang like '%PAVING BATA 6CM ABU%'";

	$aksigetvalue = mysqli_query($koneksi, $sqlgetvalue);
	$countkode = mysqli_num_rows($aksigetvalue);

	if($countkode >= 1){
		$rowvalue = mysqli_fetch_assoc($aksigetvalue);

		// $kode_ = $rowvalue["id_wilayah"];

		echo $rowvalue["id_wilayah"];
	}else{
		echo "tidak ada";
	}
?>