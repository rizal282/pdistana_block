<?php
	if(isset($_POST["tomboleditsuratjalan"])){
		$tr_pengeluaran = $_POST["tr_pengeluaran"];
		$id_wilayah = $_POST["idedit_wilayah"];
		$id_surat_jalan = $_POST["id_surat_jalan"];
		$png_jawab = $_POST["png_jawab"];
		$nama_supir = $_POST["id_supir"];
		$pembuat = $_POST["pembuat"];
		$no_kendaraan = $_POST["no_kendaraan"];
		// $nominaluangjalan = $_POST["nominaluangjalan"];
		$ytuangjalan = $_POST["ytuangjalan"];

		if($ytuangjalan == "Tidak"){
			// update data surat jalan
			mysqli_query($koneksi, "update surat_jalan set png_jawab = '".$png_jawab."', id_supir = '".$nama_supir."', pembuat_surat_jln = '".$pembuat."', no_kendaraan = '".$no_kendaraan."', id_wilayah = '".$id_wilayah."' where id_surat_jalan = '".$id_surat_jalan."'");
		}else{
			//  ambil uang jalan dari table wilayah
			$getuangjalan = mysqli_query($koneksi, "select nominal_uangjalan from wilayah where id_wilayah = '".$id_wilayah."'");
			$rowuangjalan = mysqli_fetch_array($getuangjalan);

			// kembalikan nilai kas kecil ke sebelum dipotong oleh uang jalan
			$sqluangkaskecil = mysqli_query($koneksi, "select kas_kecil from kas");
			$rowkaskecil = mysqli_fetch_array($sqluangkaskecil);
			$kaskecilawal = $rowkaskecil["kas_kecil"] + $rowuangjalan["nominal_uangjalan"];

			// update kas kecil
			mysqli_query($koneksi, "update kas set kas_kecil = '".$kaskecilawal."' where id_kas = 1");

			// ambil lagi kas kecil untuk dikurangi dengan uang jalan baru yg di edit
			$sqluangkaskecilbaru = mysqli_query($koneksi, "select kas_kecil from kas");
			$rowkaskecilbaru = mysqli_fetch_array($sqluangkaskecilbaru);
			$updatekaskecillagi = $rowkaskecilbaru["kas_kecil"] - $rowuangjalan["nominal_uangjalan"];

			// update kas kecil lagi
			mysqli_query($koneksi, "update kas set kas_kecil = '".$updatekaskecillagi."' where id_kas = 1");

			// update data surat jalan
			mysqli_query($koneksi, "update surat_jalan set png_jawab = '".$png_jawab."', id_supir = '".$nama_supir."', pembuat_surat_jln = '".$pembuat."', no_kendaraan = '".$no_kendaraan."', id_wilayah = '".$id_wilayah."' where id_surat_jalan = '".$id_surat_jalan."'");



			// update pengeluaran
			mysqli_query($koneksi, "update pengeluaran set nominal = '".$rowuangjalan["nominal_uangjalan"]."' where id_pengeluaran = '".$tr_pengeluaran."'");
		}

		
	}

	include_once "dokumen/page_surat_jalan.php";
?>