<?php
	if(isset($_POST["jns_kendaraan"])){
		$jns_kendaraan = $_POST["jns_kendaraan"];
		$merek = $_POST["merek"];
		$plat_nomor = $_POST["plat_nomor"];
		$tgl_service = date("Y-m-d", strtotime($_POST["tgl_service"]));
		$keterangan = $_POST["keterangan"];

		$sqlinsertinvkendaraan = "insert into inv_kendaraan values('','".$jns_kendaraan."','".$merek."','".$plat_nomor."','".$tgl_service."','".$keterangan."')";

		mysqli_query($koneksi, $sqlinsertinvkendaraan);

		include_once "inv_kendaraan/data_kendaraan.php";
	}
?>