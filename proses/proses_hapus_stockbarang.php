<?php
	if(isset($_POST["idstokbarang"])){
		$idstokbarang = $_POST["idstokbarang"];

		mysqli_query($koneksi, "delete from stock_barang where id_barang = ".$idstokbarang);

		echo '<div class="alert alert-success">Stock Barang Sudah Dihapus</div>';

		include_once "stock_barang/data_stock_barang.php";
	}
?>