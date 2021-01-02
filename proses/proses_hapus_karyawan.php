<?php
	if(isset($_POST["id_kry"])){
		$id_kry = $_POST["id_kry"];

		mysqli_query($koneksi, "delete from karyawan where id_kry = '".$id_kry."'");

		echo '<div class="alert alert-success">Data Karyawan Sudah Dihapus</div>';
	}
?>