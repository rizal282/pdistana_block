<?php
	$id_level = $_POST["id_level"];

	mysqli_query($koneksi, "delete from level_karyawan where id_level = ". $id_level);

	echo '<div class="alert alert-success">Level Karyawan Sudah Dihapus!</div>';

	include_once 'settings/data_set_level.php';
?>