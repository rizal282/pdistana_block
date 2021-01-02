<?php
	include_once "koneksi.php";

	if(isset($_POST["limitkaskecil"])){
		$limitkaskecil = $_POST["limitkaskecil"];

		$sqlupdatekaskecil = "update setting set limit_kaskecil = '".$limitkaskecil."' where id_setting = 1";

		mysqli_query($koneksi, $sqlupdatekaskecil);

		$sqlgetkaskecil = "select * from setting";
		$aksigetkaskecil = mysqli_query($koneksi, $sqlgetkaskecil);
		$rowkaskecil = mysqli_fetch_array($aksigetkaskecil);

		echo "Rp ". number_format($rowkaskecil["limit_kaskecil"],1,",",".");
	}elseif(isset($_POST["settingtempopembeli"])){
		$settingtempopembeli = $_POST["settingtempopembeli"];

		$sqlupdatekaskecil = "update setting_tempo set limit_tempopembeli = '".$settingtempopembeli."' where id_settempo = 1";

		mysqli_query($koneksi, $sqlupdatekaskecil);

		$sqlgetlimittempopembeli = "select * from setting_tempo";
		$aksigetlimittempopembeli = mysqli_query($koneksi, $sqlgetlimittempopembeli);
		$rowlimittempopembeli = mysqli_fetch_array($aksigetlimittempopembeli);

		echo $rowlimittempopembeli["limit_tempopembeli"];
	}



















?>