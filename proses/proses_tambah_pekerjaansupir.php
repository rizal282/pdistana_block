<?php
	if(isset($_POST["tanggalkerjatambahan"])){
		$tanggal = date("Y-m-d", strtotime($_POST["tanggalkerjatambahan"]));
		$id_supir = $_POST["id_nudigaji"];
		$nudigaji = $_POST["nudigaji"];
		$pekerjaan = $_POST["pekerjaan"];
		$nominal = $_POST["nominal"];

		// ambil kas kecil
		$ambilkaskecil = mysqli_query($koneksi, "select kas_kecil from kas");
		$rowkaskecil = mysqli_fetch_array($ambilkaskecil);

		$sisakaskecil = $rowkaskecil["kas_kecil"] - $nominal;

		// update kas kecil
		mysqli_query($koneksi, "update kas set kas_kecil = '".$sisakaskecil."' where id_kas = 1");

		// masukan d9ata pekerjaan ke tabel
		mysqli_query($koneksi, "insert into pekerjaansupir_tambahan values('','".$tanggal."','".$nudigaji."','".$pekerjaan."','".$nominal."')");

		// input data kasbon ke pengeluaran perusahaan
		$sqlinputpengeluaran = "insert into pengeluaran(tgl_pengeluaran,nama_pengeluaran,jenis_pengeluaran,nominal) values('".$tanggal."','Bayar Pekerjaan Tambahan Supir ".$nudigaji."','Uang Pekerjaan Tambahan Supir','".$nominal."')";
		mysqli_query($koneksi, $sqlinputpengeluaran);

		echo '<div class="alert alert-success">Data Pekerjaan Tambahan Supir Ditambahkan</div>';

		include_once "karyawan/data_karyawan.php";
	}
?>
