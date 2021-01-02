<?php
	if(isset($_POST["id_surat"])){
		$id_surat = $_POST["id_surat"];

		$sqlupdatesuratjalan = "update order_pembeli set feedback = 'Feedback' where id_order = '".$id_surat."'";

		mysqli_query($koneksi, $sqlupdatesuratjalan);

		include_once "dokumen/data_suratjalan.php";
	}
?>