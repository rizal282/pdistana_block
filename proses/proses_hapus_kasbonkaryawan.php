<?php
	if(isset($_POST["id_kasbon"])){
		$id_kasbon = $_POST["id_kasbon"];
		$id_krykasbon = $_POST["id_krykasbon"];
		$tgl_kasbon = $_POST["tgl_kasbon"];

		// ambil data kasbon karyawan
		$datakasbonkry = mysqli_query($koneksi, "select nominal from kasbon_kry where id_kry = ".$id_krykasbon);
		$rowdatakasbonkry = mysqli_fetch_array($datakasbonkry);

		// ambil data kas besar
		$datakas = mysqli_query($koneksi, "select * from kas");
		$rowkas = mysqli_fetch_array($datakas);

		// tambah kas besar
		$tambahkasbesar = $rowkas["kas_besar"] + $rowdatakasbonkry["nominal"];
		// $kurangikaskecil = $rowkas["kas_kecil"] - $rowdatakasbonkry["nominal"];

		mysqli_query($koneksi, "update kas set kas_besar = '".$tambahkasbesar."'");

		// hapus kasbon di pengeluaran 
		mysqli_query($koneksi, "delete from pengeluaran where tgl_pengeluaran = '".$tgl_kasbon."' and id = ".$id_krykasbon);

		mysqli_query($koneksi, "delete from kasbon_kry where id_kasbon = ".$id_kasbon);

		echo '<div class="alert alert-success">Kasbon Karyawan Sudah Dihapus</div>';

		include_once "karyawan/data_kasbon_karyawan.php";
	}
?>