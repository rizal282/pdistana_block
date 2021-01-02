<?php
	$idrekkoran = $_POST["idrekkoran"];
	$jenisrekkoran = $_POST["jenisrekkoran"];

	$getrekkoran = mysqli_query($koneksi, "select * from rekening_koran where id_rekeningkoran = '".$idrekkoran."'");
	$rowrekkoran = mysqli_fetch_array($getrekkoran);

	$getkasbank = mysqli_query($koneksi, "select kas_bank from kas");
	$rowkasbank = mysqli_fetch_array($getkasbank);

	if($jenisrekkoran == "Kredit"){
		$returnkasbank = $rowkasbank["kas_bank"] - $rowrekkoran["mutasi"];

		mysqli_query($koneksi, "update kas set kas_bank = '".$returnkasbank."'where id_kas = 1");

		mysqli_query($koneksi, "delete from rekening_koran where id_rekeningkoran = '".$idrekkoran."'");
	}else{
		$returnkasbank = $rowkasbank["kas_bank"] + $rowrekkoran["mutasi"];

		mysqli_query($koneksi, "update kas set kas_bank = '".$returnkasbank."'where id_kas = 1");

		mysqli_query($koneksi, "delete from rekening_koran where id_rekeningkoran = '".$idrekkoran."'");
	}

	echo '<div class="alert alert-success">Data Rekening Koran Sudah Dihapus</div>';

	include_once "keuangan/data_rekeningkoran.php";
?>