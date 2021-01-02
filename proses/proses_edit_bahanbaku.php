<?php
	$id_bahanbaku = $_POST["id_bahanbaku"];
	$tanggal = date("Y-m-d", strtotime($_POST["tanggal"]));
	$namabahanbaku = strtolower($_POST["namabahanbaku"]);
	$satuan = $_POST["satuan"];
	$hargabarang = $_POST["hargabarang"];
	$bongkar = $_POST["bongkar"];
	$jumlah = $_POST["jumlah"];
	$totalharga = $jumlah * $hargabarang;
	$keterangan = $_POST["keterangan"];

	$sqlupdatebahanbaku = "update bahan_baku set tanggal = '".$tanggal."', nama_bahanbaku = '".$namabahanbaku."', jumlah_barang = '".$jumlah."', satuan = '".$satuan."', harga_barang = '".$hargabarang."', bongkar = '".$bongkar."', total_harga = '".$totalharga."', keterangan = '".$keterangan."' where id_bahanbaku = '".$id_bahanbaku."'";

	mysqli_query($koneksi, $sqlupdatebahanbaku);

	echo '<div class="alert alert-success">Data Bahan Baku Sudah Diperarui</div>';

	include_once "bahanbaku/data_bahanbaku.php";
?>