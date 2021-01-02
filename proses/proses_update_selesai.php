<?php
	if(isset($_POST["no_trsurat"])){
		$no_trsurat = $_POST["no_trsurat"];

		mysqli_query($koneksi, "update order_pembeli set selesai = 'Selesai' where no_transaksi = '".$no_trsurat."'");

		include_once "dokumen/datahistori_suratjalan.php";
	}
?>