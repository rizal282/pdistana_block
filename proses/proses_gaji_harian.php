<?php
	if(isset($_POST["tgl_gaji"])){
		$tgl_gaji = date("Y-m-d", strtotime($_POST["tgl_gaji"]));
		$nama_kry = $_POST["nama_kry"];
		$pekerjaan = $_POST["pekerjaan"];
		$format_gaji = explode(".", $_POST["total_upah"]);
		$total_upah = implode($format_gaji);

		// ambil kas kecil untuk dikurangi dengan gaji harian
		$getkaskecil = mysqli_query($koneksi, "select kas_kecil from kas");
		$rowkaskecil = mysqli_fetch_array($getkaskecil);

		// masukkan gaji harian ke tabel gaji
		mysqli_query($koneksi, "insert into gaji_karyawanharian(tgl_gaji,nama_kry,total_gaji,pekerjaan) values('".$tgl_gaji."','".$nama_kry."','".$total_upah."','".$pekerjaan."')");

		$sisakaskecil = $rowkaskecil["kas_kecil"] + $total_upah;

		// update kas kecil
		mysqli_query($koneksi, "update kas set kas_kecil = '".$sisakaskecil."' where id_kas = 1");

		// input data kasbon ke pengeluaran perusahaan
		$sqlinputpengeluaran = "insert into pengeluaran values('','".$tgl_gaji."','','','Gaji Karyawan Harian ".$nama_kry."','Penggajian Harian','".$total_upah."','','','')";
		mysqli_query($koneksi, $sqlinputpengeluaran);

		include_once "karyawan/slipgaji_karyawanharian.php";
	}
?>
