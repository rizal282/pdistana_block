<?php
	if(isset($_POST["id_editpengeluaranharian"])){
		$id_editpengeluaranharian = $_POST["id_editpengeluaranharian"];
		$edit_nama_beban = $_POST["edit_nama_beban"];
		$edit_nominal = $_POST["edit_nominal"];
		$edit_ref = $_POST["edit_ref"];
		$edit_keterangan = $_POST["edit_keterangan"];

		// ambil nominal kas besar
		$sqlgetnominalkasbesar = "select * from kas";
		$aksigetnominalkasbesar = mysqli_query($koneksi, $sqlgetnominalkasbesar);
		$rowkasbesar = mysqli_fetch_array($aksigetnominalkasbesar);

		// ambil nominal dari pengeluaran harian
		$sqlgetnominalpengeluaranharian = "select nominal from pengeluaran where id_pengeluaran = '".$id_editpengeluaranharian."'";
		$aksigetnominalpengeluaranharian = mysqli_query($koneksi, $sqlgetnominalpengeluaranharian);
		$rownominalpengeluaranharian = mysqli_fetch_array($aksigetnominalpengeluaranharian);

		$kasbesarawal = $rowkasbesar["kas_besar"] + $rownominalpengeluaranharian["nominal"];
		// $kaskecilawal = $rowkasbesar["kas_kecil"] + $rownominalpengeluaranharian["nominal"];

		// update kas besar
		mysqli_query($koneksi, "update kas set kas_besar = '".$kasbesarawal."' where id_kas = 1");

		// ambil lagi nominal dari kas besar
		$sqlambillaginominalkasbesar = "select * from kas";
		$aksiambillaginominalkasbesar = mysqli_query($koneksi, $sqlambillaginominalkasbesar);
		$rowambillaginominalkasbesar = mysqli_fetch_array($aksiambillaginominalkasbesar);

		$kasbesarsekarang = $rowambillaginominalkasbesar["kas_besar"] - $edit_nominal;
		// $kaskecilsekarang = $rowambillaginominalkasbesar["kas_kecil"] - $edit_nominal;

		// update lagi kas besar setelah nominal pengeluaran harian dirubah
		mysqli_query($koneksi, "update kas set kas_besar = '".$kasbesarsekarang."' where id_kas = 1");

		// update data di pengeluaran harian
		// $sqlupdatepengeluaranharian = "update pengeluaran set nama_beban = '".$edit_nama_beban."',  nominal = '".$edit_nominal."', keterangan = '".$edit_keterangan."' where id_pengeluaranharian = '".$id_editpengeluaranharian."'";
		// mysqli_query($koneksi, $sqlupdatepengeluaranharian);

		// update di tabel semua pengeluaran
		$sqleditpengeluaran = "update pengeluaran set nama_pengeluaran = '".$edit_nama_beban."', jenis_pengeluaran = '".$edit_keterangan."', nominal = '".$edit_nominal."', noreferensi = '".$edit_ref."' where id_pengeluaran = '".$id_editpengeluaranharian."'";
		mysqli_query($koneksi, $sqleditpengeluaran);

		echo '<div class="alert alert-success">Pengeluaran Harian Sudah Diperbarui</div>';

		include_once "pengeluaran/data_pengeluaran_harian.php";

	}
?>
