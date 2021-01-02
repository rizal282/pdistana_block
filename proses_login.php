<?php
	// session_start();

	// include_once "koneksi.php";

	if(isset($_POST["login"])){
		$username = $_POST["username"];
		$password = $_POST["password"];
		$level = $_POST["level"];

		if($level == "Admin"){
			$sqldatauser = "select * from user_admin where username = '".$username."' and password = '".$password."'";
			$getdatauser = mysqli_query($koneksi, $sqldatauser);
			$countdatauser = mysqli_num_rows($getdatauser);

			if($countdatauser == 1){
				$datauserlogin = mysqli_fetch_array($getdatauser);

				$_SESSION["id_user"] = $datauserlogin["id_useradmin"];
				$_SESSION["username"] = $datauserlogin["username"];
				$_SESSION["password"] = $datauserlogin["password"];
				$_SESSION["status_user"] = $datauserlogin["status_user"];

				// header("location:".$url);
			}else{
				header("location:".$url);
			}
		}else{
			$sqldatauser = "select * from karyawan where nama_kry = '".$username."' and password = '".$password."'";
			$getdatauser = mysqli_query($koneksi, $sqldatauser);
			$countdatauser = mysqli_num_rows($getdatauser);

			if($countdatauser == 1){
				$datauserlogin = mysqli_fetch_array($getdatauser);

				if($datauserlogin["group_kry"] == "Staff"){
					$_SESSION["id_user"] = $datauserlogin["id_kry"];
					$_SESSION["username"] = $datauserlogin["nama_kry"];
					$_SESSION["password"] = $datauserlogin["password"];
					$_SESSION["status_user"] = $datauserlogin["group_kry"];
				}else{
					header("location:".$url);
				}

				// header("location:".$url);
			}else{
				header("location:".$url);
			}
		}
	}
?>