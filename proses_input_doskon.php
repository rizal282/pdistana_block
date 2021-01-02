<?php
	error_reporting(0);

	include_once "koneksi.php";

	if(isset($_POST["diskon"])){
		$notrpembeli = $_POST["notrpembeli"];
		$format_diskon = explode(".", $_POST["diskon"]);
		$diskon = implode($format_diskon);

		$grandtotal = $_POST["grandtotal"];

		$total_sisa = $grandtotal - $diskon;
		$sudahdiskon = $_POST["sudahdiskon"];

		$sqlinputdiskon = "update total_bayar_pembeli set diskon = '".$diskon."', sisa_total = '".$total_sisa."', sts_diskon = '".$sudahdiskon ."' where no_transaksi = '".$notrpembeli."'";

		mysqli_query($koneksi, $sqlinputdiskon);

		// ambil sisa total
		$sqlgetsisatotal = "select sisa_total from total_bayar_pembeli where no_transaksi = '".$notrpembeli."'";
		$aksigetsisatotal = mysqli_query($koneksi, $sqlgetsisatotal);
		$rowsisatotal = mysqli_fetch_array($aksigetsisatotal);

		echo $rowsisatotal["sisa_total"];
	}
?>
