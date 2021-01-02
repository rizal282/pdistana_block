<?php
	if(isset($_POST["id_bahanbaku"])){
		$id_bahanbaku = $_POST["id_bahanbaku"];

		mysqli_query($koneksi, "delete from bahan_baku where id_bahanbaku = ".$id_bahanbaku);

		echo '<div class="alert alert-success">Data Bahan Baku Sudah Dihapus!</div>';

		include_once "bahanbaku/data_bahanbaku.php";
	}
?>