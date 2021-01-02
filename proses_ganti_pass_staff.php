<?php
	include_once "koneksi.php";

	if(isset($_POST["ulangpass_baru"])){
		$id_staff = $_POST["id_staff"];
		$pass_lama = $_POST["pass_lama"];
		$pass_baru = $_POST["pass_baru"];
		$ulangpass_baru = $_POST["ulangpass_baru"];

		mysqli_query($koneksi, "update karyawan set password = '".$ulangpass_baru."' where id_kry = ".$id_staff);

		echo "Password Anda Sudah Diganti!";
	}
?>