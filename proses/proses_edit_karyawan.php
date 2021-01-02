<?php
	if(isset($_POST["nama_kry"])){
		$id_kry = $_POST["id_editkry"];
		$nama_kry = $_POST["nama_kry"];
		$tmp_lahir = $_POST["tmp_lahir"];
		$tgl_lahir = date("Y-m-d", strtotime($_POST["tgl_lahir"]));
		$alamat = $_POST["alamat"];
		$group = $_POST["group"];
		$no_sim = $_POST["no_sim"];
		$jns_sim = $_POST["jns_sim"];
		$expired = date("Y-m-d", strtotime($_POST["expired"]));
		
		$password = $_POST["password"];

		$sqleditkaryawan = "update karyawan set nama_kry = '".$nama_kry."', tempat_lhr = '".$tmp_lahir."', tgl_lhr = '".$tgl_lahir."', alamat_kry = '".$alamat."', group_kry = '".$group."', no_sim = '".$no_sim."', jenis_sim = '".$jns_sim."', masa_berlaku = '".$expired."', password = '".$password."' where id_kry = '".$id_kry."'";

		mysqli_query($koneksi, $sqleditkaryawan);

		echo '<div class="alert alert-success">Data Karyawan Sudah Diperbarui</div>';

		include_once "karyawan/data_karyawan.php";
	}
?>