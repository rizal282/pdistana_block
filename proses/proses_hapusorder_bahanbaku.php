<?php
	$id_trorderbb = $_POST["id_trorderbb"];

	mysqli_query($koneksi, "delete from order_bahanbaku where no_trbahanbaku = '".$id_trorderbb."'");

	mysqli_query($koneksi, "delete from detail_order_bahanbaku where no_trbahanbaku = '".$id_trorderbb."'");

	mysqli_query($koneksi, "delete from total_bayar_bahanbaku where no_trbahanbaku = '".$id_trorderbb."'");

	echo '<div class="alert alert-success">Order Bahan Baku Sudah Dihapus</div>';

	include_once "pengeluaran/data_pengeluaran.php";
?>