<?php
	include_once "koneksi.php";

	if(isset($_POST["ulangpass_baru"])){
		$pass_lama = $_POST["pass_lama"];
		$pass_baru = $_POST["pass_baru"];
		$ulangpass_baru = $_POST["ulangpass_baru"];

		if(!empty($pass_lama) && !empty($pass_baru) && !empty($ulangpass_baru)){
			if($ulangpass_baru == $pass_baru){
				mysqli_query($koneksi, "update user_admin set password = '".$ulangpass_baru."'");

				echo "Password Admin Sudah Diganti!";
			}else{
				echo "Password Tidak Sama!";
			}
		}else{
			echo "Field Password Tidak Boleh Kosong!";
		}
	}
?>