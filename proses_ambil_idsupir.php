<?php		
	include_once "koneksi.php";

	if(isset($_POST["nama_supir"])){
		$nama_supir = $_POST["nama_supir"];

		$ambilidsupir = mysqli_query($koneksi, "select id_kry from karyawan where nama_kry = '".$nama_supir."' and group_kry = 'Supir'");
		$rowidsupir = mysqli_fetch_array($ambilidsupir);

		echo $rowidsupir["id_kry"];
	}
?>

