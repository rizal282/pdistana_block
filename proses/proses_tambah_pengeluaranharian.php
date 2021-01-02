<?php
	if(isset($_POST["nama_beban"])){
		// $tgl_pengeluaranharian = date("Y-m-d", strtotime($_POST["tgl_pengeluaranharian"]));
		$nama_beban = $_POST["nama_beban"];
		$format_angka = explode(".", $_POST["nominal"]);
		$nominal = implode($format_angka);
		$noreferensi = $_POST["noreferensi"];
		$keterangan = $_POST["keterangan"];

		// kurangi dari kas
		$sqlgetkas = "select * from kas";
		$aksigetkas = mysqli_query($koneksi, $sqlgetkas);
		$rowkasbesar = mysqli_fetch_array($aksigetkas);

		$sisakaskecil = $rowkasbesar["kas_kecil"] + $nominal;
		$sisakasbesar = $rowkasbesar["kas_besar"] - $nominal;


		// update kas besar
		$sqlupdatekasbesar = "update kas set kas_kecil = '".$sisakaskecil."', kas_besar = '".$sisakasbesar."' where id_kas = 1";
		mysqli_query($koneksi, $sqlupdatekasbesar);

		$sqlinsertpengeluaranharian = "insert into pengeluaran_harian values('','".date("Y-m-d")."','".$nama_beban."','".$nominal."','".$noreferensi."','".$keterangan."')";

		mysqli_query($koneksi, $sqlinsertpengeluaranharian);

		// input data kasbon ke pengeluaran perusahaan
		$sqlinputpengeluaran = "insert into pengeluaran values('','".date("Y-m-d")."','','','".$nama_beban."','Pengeluaran Harian','".$nominal."','".$noreferensi."','','".$keterangan."')";
		mysqli_query($koneksi, $sqlinputpengeluaran);

		echo '<div class="alert alert-success">Pengeluaran Harian Baru Sudah Disimpan</div>';

		include_once "pengeluaran/data_pengeluaran_harian.php";
	}
?>
