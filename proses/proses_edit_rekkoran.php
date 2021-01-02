<?php
	$idrekkoran = $_POST["idrekkoran"];
	$tanggal = date("Y-m-d", strtotime($_POST["tanggal"]));
	$keterangan = $_POST["keterangan"];
	$mutasi = $_POST["mutasi"];
	$mutasiawal = $_POST["mutasiawal"];
	$kreditdebit = $_POST["kreditdebit"];

	$ambilkasbank = mysqli_query($koneksi, "select kas_bank from kas");
	$datakasbank = mysqli_fetch_array($ambilkasbank);

	if($kreditdebit == "Kredit"){
		$kasbankkurangi = $datakasbank["kas_bank"] - $mutasiawal;
		mysqli_query($koneksi, "update kas set kas_bank = '".$kasbankkurangi."'");

		$kasbanktambah = $datakasbank["kas_bank"] + $mutasi;
		mysqli_query($koneksi, "update kas set kas_bank = '".$kasbanktambah."'");

		mysqli_query($koneksi, "update rekening_koran set tanggal = '".$tanggal."', keterangan = '".$keterangan."', mutasi = '".$mutasi."', kreditdebit = '".$kreditdebit."' where id_rekeningkoran = '".$idrekkoran."'");
	}else{
		$kasbankkurangi = $datakasbank["kas_bank"] + $mutasiawal;
		mysqli_query($koneksi, "update kas set kas_bank = '".$kasbankkurangi."'");

		$kasbanktambah = $datakasbank["kas_bank"] - $mutasi;
		mysqli_query($koneksi, "update kas set kas_bank = '".$kasbanktambah."'");

		mysqli_query($koneksi, "update rekening_koran set tanggal = '".$tanggal."', keterangan = '".$keterangan."', mutasi = '".$mutasi."', kreditdebit = '".$kreditdebit."' where id_rekeningkoran = '".$idrekkoran."'");
	}

	// mysqli_query($koneksi, "update rekening_koran set tanggal = '".$tanggal."', keterangan = '".$keterangan."', mutasi = '".$mutasi."', kreditdebit = '".$kreditdebit."' where id_rekeningkoran = '".$idrekkoran."'");

	echo '<div class="alert alert-success">Data Rekening Koran Sudah Diperbarui</div>';

	include_once "keuangan/data_rekeningkoran.php";
?>