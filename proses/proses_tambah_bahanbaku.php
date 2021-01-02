<?php
	if(isset($_POST["tanggal"])){
		$tanggal = date("Y-m-d", strtotime($_POST["tanggal"]));
		$namabahanbaku = strtolower($_POST["namabahanbaku"]);
		$satuan = $_POST["satuan"];
		$formathargabarang = explode(".", $_POST["hargabarang"]);
		$hargabarang = implode($formathargabarang);
		$bongkar = $_POST["bongkar"];
		$jumlah = $_POST["jumlah"];
		$totalharga = $jumlah * $hargabarang;
		$keterangan = $_POST["keterangan"];

		$sqlinputbahanbaku = "insert into bahan_baku values('','".$tanggal."','".$namabahanbaku."','".$jumlah."','".$satuan."','".$hargabarang."','".$bongkar."','".$totalharga."','".$keterangan."')";

		mysqli_query($koneksi, $sqlinputbahanbaku);

		echo '<div class="alert alert-success">Data Bahan Baku Sudah Disimpan</div>';

		include_once "bahanbaku/data_bahanbaku.php";
	}
?>