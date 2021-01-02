<?php
	include_once "koneksi.php";

	$sqlgetkasbesar = mysqli_query($koneksi, "select kas_besar from kas");
	$rowkasbesar = mysqli_fetch_assoc($sqlgetkasbesar);


	$sqllimitkaskecil = mysqli_query($koneksi, "select limit_kaskecil from setting");
  	$rowkaskecil = mysqli_fetch_assoc($sqllimitkaskecil);

  	$limit = $rowkaskecil["limit_kaskecil"] ;

	$selisihkaskecil = $_POST["selisihkaskecil"];

	$hasilkasbesarbaru = $rowkasbesar["kas_besar"] - $selisihkaskecil;

	$updatekasbesar = mysqli_query($koneksi, "update kas set kas_besar = '".$hasilkasbesarbaru."' where id_kas = 1");

	$updatekaskecil = mysqli_query($koneksi, "update kas set kas_kecil = '".$limit."' where id_kas = 1");

	$getkaskecil = mysqli_query($koneksi, "select kas_kecil from kas");
	$rowdatakaskecil = mysqli_fetch_array($getkaskecil);

	echo "Rp ".number_format($rowdatakaskecil["kas_kecil"],1,",",".");
?>