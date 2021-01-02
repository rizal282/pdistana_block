<?php
	include_once 'koneksi.php';

	if(isset($_POST["id_tempstock"])){
		$id_tempstock = $_POST["id_tempstock"];

		mysqli_query($koneksi, "delete from tempstock_barangkry where id_tempstock = '".$id_tempstock."'");

		echo "<div class='alert alert-success'>Pekerjaan Karyawan Sudah Dihapus</div>";

		include_once "karyawan/data_karyawan.php";
	}
?>