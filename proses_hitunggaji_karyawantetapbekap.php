<?php
	error_reporting(0);
	include_once "koneksi.php";

	$id_kry = $_POST["id_kry"];
	$grup = $_POST["grupkry"];

	$tgl_awalperiodegaji = date("Y-m-d", strtotime($_POST["tgl_awalperiodegaji"]));
	$tgl_akhirperiodegaji = date("Y-m-d", strtotime($_POST["tgl_akhirperiodegaji"]));

	// ambil data karyawan
	$sqlkaryawan = "select * from karyawan where id_kry = '".$id_kry."'";
	$aksikaryawan = mysqli_query($koneksi, $sqlkaryawan);
	$rowkaryawan = mysqli_fetch_array($aksikaryawan);

	// ambil range tiap proses
	$rangeproses = mysqli_query($koneksi, "select * from setting");
	$datarange = mysqli_fetch_array($rangeproses);

	// ambil data histori kerja karyawan
	// $sqlhistorikerja = "select * from historikerjakaryawan where tgl between '".$tgl_awalperiodegaji."' and '".$tgl_akhirperiodegaji."' and id_kry = '".$rowkaryawan["id_kry"]."'";
	// $aksigethistori = mysqli_query($koneksi, $sqlhistorikerja);

	if($rowkaryawan["group_kry"] == "Produksi"){

		// ambil data histori kerja karyawan
		// cetak genteng
		$aksigethistoricetakgenteng = mysqli_query($koneksi, "select sum(qty_brg) as totalcetakgenteng from historikerjakaryawan where tgl between '".$tgl_awalperiodegaji."' and '".$tgl_akhirperiodegaji."' and id_kry = '".$rowkaryawan["id_kry"]."' and jenis_brg = 'Genteng' and pekerjaan = 'Cetak'");
		$datahistoricetakgenteng = mysqli_fetch_array($aksigethistoricetakgenteng);

		$divcetakgenteng = $datahistoricetakgenteng["totalcetakgenteng"] / $datarange["range_cetak"];
		$totalkalicetakgenteng = round($divcetakgenteng) * $datarange["t_pecah_genteng"];
		$totalkurangicetakgenteng = $datahistoricetakgenteng["totalcetakgenteng"] - $totalkalicetakgenteng;
		$gajicetakgenteng = $totalkurangicetakgenteng * $datarange["gaji_cetakgenteng"];

		// cat genteng
		$aksigethistoricatgenteng = mysqli_query($koneksi, "select sum(qty_brg) as totalcatgenteng from historikerjakaryawan where tgl between '".$tgl_awalperiodegaji."' and '".$tgl_akhirperiodegaji."' and id_kry = '".$rowkaryawan["id_kry"]."' and jenis_brg = 'Genteng' and pekerjaan = 'Cat'");
		$datahistoricatgenteng = mysqli_fetch_array($aksigethistoricatgenteng);

		$divcatgenteng = $datahistoricatgenteng["totalcatgenteng"] / $datarange["range_cat"];
		$totalkalicatgenteng = round($divcatgenteng) * $datarange["t_pecah_catgenteng"];
		$totalkurangicatgenteng = $datahistoricatgenteng["totalcatgenteng"] - $totalkalicatgenteng;
		$gajicatgenteng = $totalkurangicatgenteng * $datarange["gaji_catgenteng"];

		// angkat genteng
		$aksigethistoriangkatgenteng = mysqli_query($koneksi, "select sum(qty_brg) as totalangkatgenteng from historikerjakaryawan where tgl between '".$tgl_awalperiodegaji."' and '".$tgl_akhirperiodegaji."' and id_kry = '".$rowkaryawan["id_kry"]."' and jenis_brg = 'Genteng' and pekerjaan = 'Angkat'");
		$datahistoriangkatgenteng = mysqli_fetch_array($aksigethistoriangkatgenteng);

		$divangkatgenteng = $datahistoriangkatgenteng["totalangkatgenteng"] / $datarange["range_angkat"];
		$totalkaliangkatgenteng = round($divangkatgenteng) * $datarange["t_pecah_angkatgenteng"];
		$totalkurangiangkatgenteng = $datahistoriangkatgenteng["totalangkatgenteng"] - $totalkaliangkatgenteng;
		$gajiangkatgenteng = $totalkurangiangkatgenteng * $datarange["gaji_angkatgenteng"];

		$totalgajigenteng = $gajicetakgenteng + $gajiangkatgenteng + $gajicatgenteng;

		// cetak paving
		$aksigethistoricetakpaving = mysqli_query($koneksi, "select sum(qty_brg) as totalcetakpaving from historikerjakaryawan where tgl between '".$tgl_awalperiodegaji."' and '".$tgl_akhirperiodegaji."' and id_kry = '".$rowkaryawan["id_kry"]."' and jenis_brg = 'Paving' and pekerjaan = 'Cetak'");
		$datahistoricetakpaving = mysqli_fetch_array($aksigethistoricetakpaving);

		$divcetakpaving = $datahistoricetakpaving["totalcetakpaving"] / $datarange["range_paving"];
		$totalkalicetakpaving = round($divcetakpaving) * $datarange["t_pecah_paving"];
		$totalkurangicetakpaving = $datahistoricetakpaving["totalcetakpaving"] - $totalkalicetakpaving;
		$gajicetakpaving = $totalkurangicetakpaving * $datarange["gaji_paving"];

		// bagian buis
		$aksigethistoribuis = mysqli_query($koneksi, "select sum(qty_brg) as totalcetakbuis from historikerjakaryawan where tgl between '".$tgl_awalperiodegaji."' and '".$tgl_akhirperiodegaji."' and id_kry = '".$rowkaryawan["id_kry"]."' and jenis_brg = 'Buis'");
		$datahistoricetakbuis = mysqli_fetch_array($aksigethistoribuis);

		$gajicetakbuis = $datahistoricetakbuis["totalcetakbuis"] * $datarange["gaji_buisbeton"];

		// Greffel
		$aksigethistorigreffel = mysqli_query($koneksi, "select sum(qty_brg) as totalcetakgreffel from historikerjakaryawan where tgl between '".$tgl_awalperiodegaji."' and '".$tgl_akhirperiodegaji."' and id_kry = '".$rowkaryawan["id_kry"]."' and jenis_brg = 'Greffel'");
		$datahistoricetakgreffel = mysqli_fetch_array($aksigethistorigreffel);

		$gajicetakgreffel = $datahistoricetakgreffel["totalcetakgreffel"] * $datarange["gaji_greffel"];

		// U-Ditch
		$aksigethistoriuditch = mysqli_query($koneksi, "select sum(qty_brg) as totalcetakuditch from historikerjakaryawan where tgl between '".$tgl_awalperiodegaji."' and '".$tgl_akhirperiodegaji."' and id_kry = '".$rowkaryawan["id_kry"]."' and jenis_brg = 'U-Ditch'");
		$datahistoricetakuditch = mysqli_fetch_array($aksigethistoriuditch);

		$gajicetakuditch = $datahistoricetakuditch["totalcetakuditch"] * $datarange["gaji_uditch"];	
		// Cover U-Ditch
		$aksigethistoricuditch = mysqli_query($koneksi, "select sum(qty_brg) as totalcetakcuditch from historikerjakaryawan where tgl between '".$tgl_awalperiodegaji."' and '".$tgl_akhirperiodegaji."' and id_kry = '".$rowkaryawan["id_kry"]."' and jenis_brg = 'Cover U-Ditch'");
		$datahistoricetakcuditch = mysqli_fetch_array($aksigethistoricuditch);

		$gajicetakcuditch = $datahistoricetakcuditch["totalcetakcuditch"] * $datarange["gaji_coveruditch"];

		// Cover Buis
		$aksigethistoricbuis = mysqli_query($koneksi, "select sum(qty_brg) as totalcetakcbuis from historikerjakaryawan where tgl between '".$tgl_awalperiodegaji."' and '".$tgl_akhirperiodegaji."' and id_kry = '".$rowkaryawan["id_kry"]."' and jenis_brg = 'Cover Buis'");
		$datahistoricetakcbuis = mysqli_fetch_array($aksigethistoricbuis);

		$gajicetakcbuis = $datahistoricetakcbuis["totalcetakcbuis"] * $datarange["gaji_coverbuisbeton"];

		// ambil data kasbon
		$gettotalkasbon = mysqli_query($koneksi, "select sum(nominal) as nominal_kasbon from kasbon_kry where sts_kasbon = 'Belum Lunas' and id_kry = ".$rowkaryawan["id_kry"]);
		$rowtotalkasbon = mysqli_fetch_array($gettotalkasbon);

		$temp_upah = $gajicetakpaving + $totalgajigenteng + $gajicetakbuis + $gajicetakgreffel + $gajicetakuditch + $gajicetakcuditch + $gajicetakcbuis;
		$temp_kasbon = $rowtotalkasbon["nominal_kasbon"];

		$nominaltemp = array(
			"total_upah" => $temp_upah,
			"total_kasbon" => $temp_kasbon,
			"idkasbon" => $rowtotalkasbon["id_kasbon"],
			"idkry" => $rowvalue["id_kry"],
			"group" => $rowvalue["group_kry"]
		);

		echo json_encode($nominaltemp);
	}elseif($rowkaryawan["group_kry"] == "Supir"){
		// hitung gaji supir
		$sqlgajisupir = "select sum(wilayah.nominal_uangjalan) as totalgajisupir from wilayah inner join surat_jalan on wilayah.id_wilayah = surat_jalan.id_wilayah where surat_jalan.id_supir = '".$id_kry."'";
		$gajisupir = mysqli_query($koneksi, $sqlgajisupir);
		$rowgajisupir = mysqli_fetch_array($gajisupir);

		$getkerjatambahansupir = mysqli_query($koneksi, "select sum(nominal) as total_nominal from pekerjaansupir_tambahan where tanggal between '".$tgl_awalperiodegaji."' and '".$tgl_akhirperiodegaji."' and id_supir = '".$id_kry."'");
		$rowkerjatambahansupir = mysqli_fetch_array($getkerjatambahansupir);

		if($rowkerjatambahansupir["total_nominal"] == 0){
			$nominalkerjatambahan = 0;
		}else{
			$nominalkerjatambahan = $rowkerjatambahansupir["total_nominal"];
		}

		if($rowgajisupir["totalgajisupir"] == NULL){
			$subtotalgaji = 0;
		}else{
			$subtotalgaji = $rowgajisupir["totalgajisupir"];
		}

		$totalgaji = $subtotalgaji + $nominalkerjatambahan;

		

		// ambil data kasbon
		$gettotalkasbon = mysqli_query($koneksi, "select * from kasbon_kry where sts_kasbon = 'Belum Lunas' and id_kry = ".$rowkaryawan["id_kry"]);
		$rowtotalkasbon = mysqli_fetch_array($gettotalkasbon);

		// $temp_upah = $totalgajipaving + $totalgajigenteng + $totalgajibuis + $totalgajigreffel + $totalgajiuditch + $totalgajicuditch + $totalgajicbuis;
		// $temp_kasbon = $rowtotalkasbon["nominal"];
		// echo $totalgaji;
		$temp_upah = $totalgaji;
		$temp_kasbon = $rowtotalkasbon["nominal"];

		$nominaltemp = array(
			"total_upah" => $temp_upah,
			"total_kasbon" => $temp_kasbon,
			"idkasbon" => $rowtotalkasbon["id_kasbon"],
			"idkry" => $rowvalue["id_kry"],
			"group" => $rowvalue["group_kry"]
		);

		echo json_encode($nominaltemp);
	}



	// ambil settingan range, toleransi, dan gaji
	$ambilsettingcetak = mysqli_query($koneksi, "select * from setting_cetakgenteng where kode_barang = '".$datakodebrg["kode_brg"]."'");
	$datasettingcetak = mysqli_fetch_array($ambilsettingcetak);

	$divcetakgenteng = $rowhitungjumlah["totalbarang"] / $datasettingcetak["range_genteng"];
	$totalkalicetakgenteng = round($divcetakgenteng) * $datasettingcetak["toleransi"];
	$totalkurangicetakgenteng = $rowhitungjumlah["totalbarang"] - $totalkalicetakgenteng;
	$gajicetakgenteng = $totalkurangicetakgenteng * $datasettingcetak["gaji"];


	// ambil settingan range, toleransi, dan gaji
	$ambilsettingcat = mysqli_query($koneksi, "select * from setting_catgenteng where kode_barang = '".$datakodebrg["kode_brg"]."'");
	$datasettingcat = mysqli_fetch_array($ambilsettingcat);

	$divcatgenteng = $rowhitungjumlah["totalbarang"] / $datasettingcat["range_genteng"];
	$totalkalicatgenteng = round($divcatgenteng) * $datasettingcat["toleransi"];
	$totalkurangicatgenteng = $rowhitungjumlah["totalbarang"] - $totalkalicatgenteng;
	$gajicatgenteng = $totalkurangicatgenteng * $datasettingcat["gaji"];

	// ambil settingan range, toleransi, dan gaji
	$ambilsettingangkat = mysqli_query($koneksi, "select * from setting_angkatgenteng where kode_barang = '".$datakodebrg["kode_brg"]."'");
	$datasettingangkat = mysqli_fetch_array($ambilsettingangkat);

	$divangkatgenteng = $rowhitungjumlah["totalbarang"] / $datasettingangkat["range_genteng"];
	$totalkaliangkatgenteng = round($divangkatgenteng) * $datasettingangkat["toleransi"];
	$totalkurangiangkatgenteng = $rowhitungjumlah["totalbarang"] - $totalkaliangkatgenteng;
	$gajiangkatgenteng = $totalkurangiangkatgenteng * $datasettingangkat["gaji"];
	
	// ambil settingan range, toleransi, dan gaji
	$ambilsettingpaving = mysqli_query($koneksi, "select * from setting_cetakpaving where kode_barang = '".$datakodebrg["kode_brg"]."'");
	$datasettingpaving = mysqli_fetch_array($ambilsettingpaving);

	$divcetakpaving = $rowhitungjumlah["totalbarang"] / $datasettingpaving["range_paving"];
	$totalkalicetakpaving = round($divcetakpaving) * $datasettingpaving["toleransi"];
	$totalkurangicetakpaving = $rowhitungjumlah["totalbarang"] - $totalkalicetakpaving;
	$gajicetakpaving = $totalkurangicetakpaving * $datasettingpaving["gaji"];
?>