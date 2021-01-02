<?php
	$tgl_kasbon = date("Y-m-d", strtotime($_POST["tgl_kasbon"]));
	$id_kasbon = $_POST["id_kasbon"];
	$nm_kry = $_POST["nm_kry"];
	$id_kryasal = $_POST["id_kryasal"];
	$id_kry = $_POST["id_kry"];
	$format_angka = explode(".",$_POST["nominal"]);
	$nominal = implode($format_angka);
	$kasbon_asal = $_POST["kasbon_asal"];

	// ambil data kas besar
	$datakas = mysqli_query($koneksi, "select * from kas");
	$rowkas = mysqli_fetch_array($datakas);

	// tambah kas besar
	$tambahkasbesar = $rowkas["kas_besar"] + $kasbon_asal;
	// $kurangikaskecil = $rowkas["kas_kecil"] - $kasbon_asal;

	// update kas besar dan kas kecil
	mysqli_query($koneksi, "update kas set kas_besar = '".$tambahkasbesar."'");

	// update ulang kas
	$barukasbesar = $rowkas["kas_besar"] - $nominal;
	// $kurangikaskecil = $rowkas["kas_kecil"] - $kasbon_asal;

	// update kas besar dan kas kecil
	mysqli_query($koneksi, "update kas set kas_besar = '".$barukasbesar."'");

	if(!empty($id_kry)){
		// update pengeluaran 
		mysqli_query($koneksi, "update pengeluaran set nominal = '".$nominal."' where tgl_pengeluaran = '".$tgl_kasbon."' and id = ".$id_kry);

		mysqli_query($koneksi, "update kasbon_kry set tgl_kasbon = '".$tgl_kasbon."', id_kry = '".$id_kry."', nominal = '".$nominal."' where id_kasbon = ".$id_kasbon);
	}else{
		// update pengeluaran 
		mysqli_query($koneksi, "update pengeluaran set nominal = '".$nominal."' where tgl_pengeluaran = '".$tgl_kasbon."' and id = ".$id_kryasal);

		mysqli_query($koneksi, "update kasbon_kry set tgl_kasbon = '".$tgl_kasbon."', id_kry = '".$id_kryasal."', nominal = '".$nominal."' where id_kasbon = ".$id_kasbon);
	}

	

	echo '<div class="alert alert-success">Data Kasbon Sudah Diubah</div>';
	include_once 'karyawan/data_kasbon_karyawan.php';
?>