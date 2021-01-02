<?php
	if(isset($_POST["id_kendaraan"])){
		$id_kendaraan = $_POST["id_kendaraan"];

		mysqli_query($koneksi, "delete from inv_kendaraan where id_inv = '".$id_kendaraan."'");

		echo '<div class="alert alert-success">Data Kendaraan Sudah Dihapus</div>';

		include_once "inv_kendaraan/data_kendaraan.php";
	}
?>