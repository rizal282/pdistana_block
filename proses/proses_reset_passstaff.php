<?php
	$id_staff = $_POST["id_staff"];

	mysqli_query($koneksi, "update karyawan set password = '1234' where id_kry = ".$id_staff);

	echo '<div class="alert alert-success">Password Staff Sudah Direset</div>';

	include_once "settings/data_settings.php";
?>