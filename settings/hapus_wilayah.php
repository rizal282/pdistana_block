<?php
	if(isset($_POST["id_wilayah"])){
		$id_wilayah = $_POST["id_wilayah"];

		mysqli_query($koneksi, "delete from wilayah where id_wilayah = '".$id_wilayah."'");

		echo '<div class="alert alert-success">Wilayah Sudah Dihapus</div>';

		include_once "settings/data_set_wilayah.php";
	}
?>