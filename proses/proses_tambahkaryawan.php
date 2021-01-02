<?php
	if(isset($_POST["nama_kry"])){
		$nama_kry = $_POST["nama_kry"];
		$tmp_lahir = $_POST["tmp_lahir"];
		$tgl_lahir = date("Y-m-d", strtotime($_POST["tgl_lahir"]));
		$alamat = $_POST["alamat"];
		$group = $_POST["group"];
		$no_sim = $_POST["no_sim"];
		$jns_sim = $_POST["jns_sim"];
		$expired = date("Y-m-d", strtotime($_POST["expired"]));
		$password = $_POST["password"];

		$sqltambahkaryawan = "insert into karyawan values('','".$nama_kry."','".$tmp_lahir."','".$tgl_lahir."','".$alamat."','".$group."','".$no_sim."','".$jns_sim."','".$expired."','".$password."')";

		mysqli_query($koneksi, $sqltambahkaryawan);

		include_once "karyawan/data_karyawan.php";
	}
?>