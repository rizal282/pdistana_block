<?php
	if(isset($_POST["jns_kendaraan"])){
		$id_editkendaraan = $_POST["id_editkendaraan"];
		$jns_kendaraan = $_POST["jns_kendaraan"];
		$merek = $_POST["merek"];
		$plat_nomor = $_POST["plat_nomor"];
		$tgl_service = date("Y-m-d", strtotime($_POST["tgl_service"]));
		$keterangan = $_POST["keterangan"];

		$sqleditkendaraan = "update inv_kendaraan set jns_kendaraan = '".$jns_kendaraan."', merek = '".$merek."', plat_nomor = '".$plat_nomor."', tgl_servis = '".$tgl_service."', keterangan = '".$keterangan."' where id_inv = '".$id_editkendaraan."'";

		mysqli_query($koneksi, $sqleditkendaraan);

		echo '<div class="alert alert-success">Data Inventaris Kendaraan Sudah Diperbarui</div>';

		include_once "inv_kendaraan/data_kendaraan.php";
	}
?>