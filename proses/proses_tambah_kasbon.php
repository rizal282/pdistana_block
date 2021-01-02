<?php
	if(isset($_POST["tgl_kasbon"])){
		$tgl_kasbon = date("Y-m-d", strtotime($_POST["tgl_kasbon"]));
		$nm_kry = $_POST["nm_kry"];
		$id_kry = $_POST["id_kry"];
		$format_angka = explode(".", $_POST["nominal"]);
		$nominal = implode($format_angka);

		$cekkasbon = mysqli_query($koneksi, "select * from kasbon_kry where id_kry = '".$nm_kry."'");
		$datacekkasbon = mysqli_fetch_array($cekkasbon);

		if($datacekkasbon["sts_kasbon"] == "Belum Lunas"){
			echo '<div class="alert alert-danger">Anda Tidak Boleh Menambah Kasbon Karyawan Jika Belum Lunas!</div>';

			include_once "karyawan/data_kasbon_karyawan.php";
		}else{
			// ambil dana dari kas kecil
			$sqlgetkaskecil = "select * from kas where id_kas = 1";
			$aksigetkaskecil = mysqli_query($koneksi, $sqlgetkaskecil);
			$rowkaskecil = mysqli_fetch_array($aksigetkaskecil);

			$danakaskecilbaru = $rowkaskecil["kas_kecil"] + $nominal;
			$danakasbesarbaru = $rowkaskecil["kas_besar"] - $nominal;

			// masukkan kasbon
			$sqlinputkasbon = "insert into kasbon_kry(tgl_kasbon,id_kry,nominal,sts_kasbon) values('".$tgl_kasbon."','".$nm_kry."','".$nominal."','Belum Lunas')";
			mysqli_query($koneksi, $sqlinputkasbon);

			// update kas kecil
			$sqlupdatekaskecil = "update kas set kas_kecil = '".$danakaskecilbaru."', kas_besar = '".$danakasbesarbaru."' where id_kas = 1";
			mysqli_query($koneksi, $sqlupdatekaskecil);

			// input data kasbon ke pengeluaran perusahaan
			$sqlinputpengeluaran = "insert into pengeluaran(tgl_pengeluaran,id,nama_pengeluaran,jenis_pengeluaran,nominal) values('".$tgl_kasbon."','".$nm_kry."','Kasbon Karyawan','Kasbon Karyawan','".$nominal."')";
			mysqli_query($koneksi, $sqlinputpengeluaran);

			echo '<div class="alert alert-success">Data Kasbon Karyawan Disimpan</div>';

			include_once "karyawan/data_kasbon_karyawan.php";
		}
	}
?>
