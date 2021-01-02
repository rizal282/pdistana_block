<?php
	if(isset($_POST["kode_barang"])){
		$idstock = $_POST["idstock"];
		$kode_barang = $_POST["kode_barang"];
		$nama_barang = $_POST["nama_barang"];
		$stock_awal = $_POST["stock_awal"];
		$stock_masuk = $_POST["stock_masuk"];
		$terjual = $_POST["terjual"];
		$stock_akhir = $_POST["stock_akhir"];
		$harga = explode(".",$_POST["harga"]);
		$gabungkan = implode($harga);
		$format_angka = explode(".", $_POST["harga"]);
		$harga = implode($format_angka);
		$modal_stock = $stock_akhir * $harga;

		$sqledit = "update stock_barang set kode_barang = '".$kode_barang."', nama_barang = '".$nama_barang."', stock_awal = '".$stock_awal."', stock_masuk = '".$stock_masuk."', terjual = '".$terjual."', stock_akhir = '".$stock_akhir."', harga = '".$gabungkan."', harga = '".$harga."', modal_stock = '".$modal_stock."' where id_barang = '".$idstock."'";
		mysqli_query($koneksi, $sqledit);

		echo '<div class="alert alert-success">Data Sudah Diperbarui</div>';

		include_once "stock_barang/data_stock_barang.php";

	}
?>
