<?php
	if(isset($_POST["nama_wilayah"])){
		$nama_wilayah = $_POST["nama_wilayah"];
		$formatuang = explode(".", $_POST["nominal_uangjalan"]);
		$nominal_uangjalan = implode($formatuang);

		$sqltambahwilayah = "insert into wilayah values('','".$nama_wilayah."','".$nominal_uangjalan."')";

		mysqli_query($koneksi, $sqltambahwilayah);

		echo '<div class="alert alert-success">Data Wilayah Sudah Disimpan</div>';

		include_once "settings/data_set_wilayah.php";
	}
?>