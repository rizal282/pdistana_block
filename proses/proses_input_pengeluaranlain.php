<?php
	if(isset($_POST["namabeban"])){
		$namabeban = $_POST["namabeban"];
		$nopelanggan = $_POST["nopelanggan"];
		$format_angka = explode(".", $_POST["nominal"]);
		$nominal = implode($format_angka);
		$keterangan = $_POST["keterangan"];

		// ambil kas kecil
		$sqlgetkaskecil = "select * from kas";
		$aksigetkaskecil = mysqli_query($koneksi, $sqlgetkaskecil);
		$rowkaskecil = mysqli_fetch_array($aksigetkaskecil);

		// hitung sisa kas kecil
		// $sisakaskecil = $rowkaskecil["kas_kecil"] + $nominal;
		$sisakasbesar = $rowkaskecil["kas_besar"] - $nominal;

		// masukkan nominal ke pengeluaran lain
		// $sqlinsertpengeluaranlain = "insert into pengeluaran_lain values('','".date("Y-m-d")."','".$namabeban."','".$nopelanggan."','".$nominal."','".$keterangan."')";
		// mysqli_query($koneksi, $sqlinsertpengeluaranlain);

		// update kas kecil
		$sqlupdatekaskecil = "update kas set kas_besar = '".$sisakasbesar."' where id_kas = 1";
		mysqli_query($koneksi, $sqlupdatekaskecil);

		// input data kasbon ke pengeluaran perusahaan
		$sqlinputpengeluaran = "insert into pengeluaran values('','".date("Y-m-d")."','','','".$namabeban."','Pengeluaran Lain-lain','".$nominal."','','".$nopelanggan."','".$keterangan."')";
		mysqli_query($koneksi, $sqlinputpengeluaran);

		echo '<div class="alert alert-success">Pengeluaran Lain-lain Sudah Disimpan</div>';

		include_once "pengeluaran/data_pengeluaran_lainlain.php";
	}
?>
