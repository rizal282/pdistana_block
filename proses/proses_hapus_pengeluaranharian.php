<?php
	$id_editpengeluaranharian = $_POST["id_pengeluaranharian"];

	// ambil nominal kas besar
	$sqlgetnominalkasbesar = "select * from kas";
	$aksigetnominalkasbesar = mysqli_query($koneksi, $sqlgetnominalkasbesar);
	$rowkasbesar = mysqli_fetch_array($aksigetnominalkasbesar);

	// ambil nominal dari pengeluaran harian
	$sqlgetnominalpengeluaranharian = "select nominal from pengeluaran where id_pengeluaran = '".$id_editpengeluaranharian."'";
	$aksigetnominalpengeluaranharian = mysqli_query($koneksi, $sqlgetnominalpengeluaranharian);
	$rownominalpengeluaranharian = mysqli_fetch_array($aksigetnominalpengeluaranharian);

	// kembalikan uang ke kas besar
	$kasbesarbaru = $rowkasbesar["kas_besar"] + $rownominalpengeluaranharian["nominal"];
	mysqli_query($koneksi, "update kas set kas_besar = '".$kasbesarbaru."'");
	
	mysqli_query($koneksi, "delete from pengeluaran where id_pengeluaran = '".$id_editpengeluaranharian."'");

	echo '<div class="alert alert-success">Pengeluaran Harian Sudah Dihapus</div>';

	include_once "pengeluaran/data_pengeluaran_harian.php";

?>