<?php
	if(isset($_POST["nama_wilayah"])){
		$id_wilayah = $_POST["id_wilayah"];
		$nama_wilayah = $_POST["nama_wilayah"];
		$nominal_uangjalan = $_POST["nominal_uangjalan"];

		$sqleditwilayah = "update wilayah set nama_wilayah = '".$nama_wilayah."', nominal_uangjalan = '".$nominal_uangjalan."'  where id_wilayah = '".$id_wilayah."'";

		mysqli_query($koneksi, $sqleditwilayah);

		echo '<div class="alert alert-success">Data Wilayah Sudah Diperbarui</div>';

		include_once "settings/data_set_wilayah.php";
	}
?>