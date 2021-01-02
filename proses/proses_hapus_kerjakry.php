<?php
	include_once 'koneksi.php';

	if(isset($_POST["id_histori"])){
		$id_histori = $_POST["id_histori"];

		mysqli_query($koneksi, "delete from historikerjakaryawan where id_histori = '".$id_histori."'");

		echo "<div class='alert alert-success'>Pekerjaan Karyawan Sudah Dihapus</div>";

		include_once "karyawan/data_karyawan.php";
	}
?>