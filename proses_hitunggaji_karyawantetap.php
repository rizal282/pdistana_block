<?php
error_reporting(0);
include_once "koneksi.php";

$id_kry = $_POST["id_kry"];
$namakry_gaji = $_POST["namakry_gaji"];
$group = $_POST["group_kry"];
$tgl_gaji = date("Y-m-d", strtotime($_POST["tgl_gaji"]));
$tgl_awal = date("Y-m-d", strtotime($_POST["tgl_awalperiodegaji"]));
$tgl_akhir = date("Y-m-d", strtotime($_POST["tgl_akhirperiodegaji"]));

$cektotalgaji = mysqli_query($koneksi, "select * from hitung_gajikaryawan where tgl_gaji = '".$tgl_gaji."' and id_kry = '".$id_kry."'");
$counttotalgaji = mysqli_fetch_array($cektotalgaji);

if($counttotalgaji >= 1){
	mysqli_query($koneksi, "delete from hitung_gajikaryawan where tgl_gaji = '".$tgl_gaji."' and id_kry = '".$id_kry."'");
}

// ambil data karyawan
$sqlkaryawan = "select * from karyawan where id_kry = '" . $id_kry . "'";
$aksikaryawan = mysqli_query($koneksi, $sqlkaryawan);
$rowkaryawan = mysqli_fetch_array($aksikaryawan);

if ($rowkaryawan["group_kry"] == "Produksi") {
	$getkodebarang = mysqli_query($koneksi, "select * from stock_barang");
	while ($rowkodebarang = mysqli_fetch_array($getkodebarang)) {
		if($rowkodebarang["jenis_brg"] == "Genteng"){
			// cetak genteng
			$cekhitunggajicetak = mysqli_query($koneksi, "select * from hitung_gajikaryawan where tgl_gaji = '".$tgl_gaji."' and id_kry = '".$id_kry."' and kode_barang = '".$rowkodebarang["kode_barang"]."' and pekerjaan = 'Cetak'");
			$hitungdatagajicetak = mysqli_num_rows($cekhitunggajicetak);

			if($hitungdatagajicetak == 0){
				$getjumlahproduksi = mysqli_query($koneksi, "select sum(qty_brg) as jumlahcetakgenteng from historikerjakaryawan where tgl between '" . $tgl_awal . "' and '" . $tgl_akhir . "' and id_kry = '" . $id_kry . "' and jenis_brg = 'Genteng' and pekerjaan = 'Cetak' and kode_brg = '" . $rowkodebarang["kode_barang"] . "'");
				$rowjumlahqty = mysqli_fetch_array($getjumlahproduksi);

				if ($rowjumlahqty["jumlahcetakgenteng"] != 0) {
					$settingcetakgenteng = mysqli_query($koneksi, "select * from setting_cetakgenteng where kode_barang = '" . $rowkodebarang["kode_barang"] . "'");
					$rowsettingcetakgenteng = mysqli_fetch_array($settingcetakgenteng);
	
					//bagi jumlah produksi dengan range
					$divtotalcetakgenteng = $rowjumlahqty["jumlahcetakgenteng"] / $rowsettingcetakgenteng["range_genteng"];
					$totalkalicetakgenteng = round($divtotalcetakgenteng) * $rowsettingcetakgenteng["toleransi"];
					$totalkurangicetakgenteng = $rowjumlahqty["jumlahcetakgenteng"] - $totalkalicetakgenteng;
					$gaji_gentengcetak = $totalkurangicetakgenteng * $rowsettingcetakgenteng["gaji"];
	
					mysqli_query($koneksi, "insert into hitung_gajikaryawan(id_kry,tgl_gaji,sub_totalgaji,kode_barang,pekerjaan,tgl_kerjaawal,tgl_kerjaakhir) values('".$id_kry."','".$tgl_gaji."','".$gaji_gentengcetak."','".$rowkodebarang["kode_barang"]."','Cetak','".$tgl_awal."','".$tgl_akhir."')");
				}
			}

			// cat genteng

			$cekhitunggajicat = mysqli_query($koneksi, "select * from hitung_gajikaryawan where tgl_gaji = '".$tgl_gaji."' and id_kry = '".$id_kry."' and kode_barang = '".$rowkodebarang["kode_barang"]."' and pekerjaan = 'Cat'");
			$hitungdatagajicat = mysqli_num_rows($cekhitunggajicat);

			if($hitungdatagajicat == 0){
				$getjumlahcatgenteng = mysqli_query($koneksi, "select sum(qty_brg) as jumlahcatgenteng from historikerjakaryawan where tgl between '" . $tgl_awal . "' and '" . $tgl_akhir . "' and id_kry = '" . $id_kry . "' and jenis_brg = 'Genteng' and pekerjaan = 'Cat' and kode_brg = '" . $rowkodebarang["kode_barang"] . "'");
				$rowjumlahcatgenteng = mysqli_fetch_array($getjumlahcatgenteng);

				if ($rowjumlahcatgenteng["jumlahcatgenteng"] != 0) {
					$settingcatgenteng = mysqli_query($koneksi, "select * from setting_catgenteng where kode_barang = '" . $rowkodebarang["kode_barang"] . "'");
					$rowsettingcatgenteng = mysqli_fetch_array($settingcatgenteng);

					$divtotalcatgenteng = $rowjumlahcatgenteng["jumlahcatgenteng"] / $rowsettingcatgenteng["range_genteng"];
					$totalkalicatgenteng = round($divtotalcatgenteng) * $rowsettingcatgenteng["toleransi"];
					$totalkurangicatgenteng = $rowjumlahcatgenteng["jumlahcatgenteng"] - $totalkalicatgenteng;
					$gajicatgenteng = $totalkurangicatgenteng * $rowsettingcatgenteng["gaji"];

					mysqli_query($koneksi, "insert into hitung_gajikaryawan(id_kry,tgl_gaji,sub_totalgaji,kode_barang,pekerjaan,tgl_kerjaawal,tgl_kerjaakhir) values('".$id_kry."','".$tgl_gaji."','".$gajicatgenteng."','".$rowkodebarang["kode_barang"]."','Cat','".$tgl_awal."','".$tgl_akhir."')");
				}
			}


			// angkat genteng

			$cekhitunggajiangkat = mysqli_query($koneksi, "select * from hitung_gajikaryawan where tgl_gaji = '".$tgl_gaji."' and id_kry = '".$id_kry."' and kode_barang = '".$rowkodebarang["kode_barang"]."' and pekerjaan = 'Angkat'");
			$hitungdatagajiangkat = mysqli_num_rows($cekhitunggajiangkat);

			if($hitungdatagajiangkat == 0){
				$getjumlahangkatgenteng = mysqli_query($koneksi, "select sum(qty_brg) as jumlahangkatgenteng from historikerjakaryawan where tgl between '" . $tgl_awal . "' and '" . $tgl_akhir . "' and id_kry = '" . $id_kry . "' and jenis_brg = 'Genteng' and pekerjaan = 'Angkat' and kode_brg = '" . $rowkodebarang["kode_barang"] . "'");
				$rowjumlahangkatgenteng = mysqli_fetch_array($getjumlahangkatgenteng);

				if ($rowjumlahangkatgenteng["jumlahangkatgenteng"] != 0) {
					$settingangkatgenteng = mysqli_query($koneksi, "select * from setting_angkatgenteng where kode_barang = '" . $rowkodebarang["kode_barang"] . "'");
					$rowsettingangkatgenteng = mysqli_fetch_array($settingangkatgenteng);

					$divtotalangkatgenteng = $rowjumlahangkatgenteng["jumlahangkatgenteng"] / $rowsettingangkatgenteng["range_genteng"];
					$totalkaliangkatgenteng = round($divtotalangkatgenteng) * $rowsettingangkatgenteng["toleransi"];
					$totalkurangiangkatgenteng = $rowjumlahangkatgenteng["jumlahangkatgenteng"] - $totalkaliangkatgenteng;
					$gajiangkatgenteng = $totalkurangiangkatgenteng * $rowsettingangkatgenteng["gaji"];

					mysqli_query($koneksi, "insert into hitung_gajikaryawan(id_kry,tgl_gaji,sub_totalgaji,kode_barang,pekerjaan,tgl_kerjaawal,tgl_kerjaakhir) values('".$id_kry."','".$tgl_gaji."','".$gajiangkatgenteng."','".$rowkodebarang["kode_barang"]."','Angkat','".$tgl_awal."','".$tgl_akhir."')");
				}
			}
			
		}elseif($rowkodebarang["jenis_brg"] == "Paving"){
			$cekhitunggajipaving = mysqli_query($koneksi, "select * from hitung_gajikaryawan where tgl_gaji = '".$tgl_gaji."' and id_kry = '".$id_kry."' and kode_barang = '".$rowkodebarang["kode_barang"]."' and pekerjaan = 'Cetak'");
			$hitungdatagajipaving = mysqli_num_rows($cekhitunggajipaving);

			if($hitungdatagajipaving == 0){
				// cetak paving
				$getjumlahcetakpaving = mysqli_query($koneksi, "select sum(qty_brg) as jumlahpaving from historikerjakaryawan where tgl between '" . $tgl_awal . "' and '" . $tgl_akhir . "' and id_kry = '" . $id_kry . "' and jenis_brg = 'Paving' and pekerjaan = 'Cetak' and kode_brg = '" . $rowkodebarang["kode_barang"] . "'");
				$rowjumlahpaving = mysqli_fetch_array($getjumlahcetakpaving);

				if ($rowjumlahpaving["jumlahpaving"] != 0) {
					$settingcetakpaving = mysqli_query($koneksi, "select * from setting_cetakpaving where kode_barang = '" . $rowkodebarang["kode_barang"] . "'");
					$rowsetpaving = mysqli_fetch_array($settingcetakpaving);

					$divtotalcetakpaving = $rowjumlahpaving["jumlahpaving"] / $rowsetpaving["range_paving"];
					$totalkalicetakpaving = round($divtotalcetakpaving) * $rowsetpaving["toleransi"];
					$totalkurangicetakpaving = $rowjumlahpaving["jumlahpaving"] - $totalkalicetakpaving;
					$gajicetakpaving = $totalkurangicetakpaving * $rowsetpaving["gaji"];

					mysqli_query($koneksi, "insert into hitung_gajikaryawan(id_kry,tgl_gaji,sub_totalgaji,kode_barang,pekerjaan,tgl_kerjaawal,tgl_kerjaakhir) values('".$id_kry."','".$tgl_gaji."','".$gajicetakpaving."','".$rowkodebarang["kode_barang"]."','Cetak','".$tgl_awal."','".$tgl_akhir."')");
				}
			}

			
		}else{
			$cekhitunggajibrglain = mysqli_query($koneksi, "select * from hitung_gajikaryawan where tgl_gaji = '".$tgl_gaji."' and id_kry = '".$id_kry."' and kode_barang = '".$rowkodebarang["kode_barang"]."' and pekerjaan = 'Cetak'");
			$hitungdatagajibrglain = mysqli_num_rows($cekhitunggajibrglain);

			if($hitungdatagajibrglain == 0){
				$getjumlahbrglain = mysqli_query($koneksi, "select sum(qty_brg) as jumlahbrglain from historikerjakaryawan where tgl between '" . $tgl_awal . "' and '" . $tgl_akhir . "' and id_kry = '" . $id_kry . "'  and pekerjaan = 'Cetak' and kode_brg = '" . $rowkodebarang["kode_barang"] . "'");
				$rowjumlahbrglain = mysqli_fetch_array($getjumlahbrglain);

				if($rowjumlahbrglain["jumlahbrglain"] != 0){
					$getsettingbrglain = mysqli_query($koneksi, "select * from setting_baranglain where kode_barang = '" . $rowkodebarang["kode_barang"] . "'");
					$rowsettingbrglain = mysqli_fetch_array($getsettingbrglain);

					$divtotalbrglain = $rowjumlahbrglain["jumlahbrglain"] / $rowsettingbrglain["range_brglain"];
					$totalkalibrglain =  round($divtotalbrglain) * $rowsettingbrglain["toleransi"];
					$totalkurangibrglain = $rowjumlahbrglain["jumlahbrglain"] - $totalkalibrglain;
					$gajibrglain = $totalkurangibrglain * $rowsettingbrglain["gaji"];

					mysqli_query($koneksi, "insert into hitung_gajikaryawan(id_kry,tgl_gaji,sub_totalgaji,kode_barang,pekerjaan,tgl_kerjaawal,tgl_kerjaakhir) values('".$id_kry."','".$tgl_gaji."','".$gajibrglain."','".$rowkodebarang["kode_barang"]."','Cetak','".$tgl_awal."','".$tgl_akhir."')");
				}
			}
			
			// cetak barang lain
			
		}

	}

	// hitung total gaji karyawan
	$gettotalgaji = mysqli_query($koneksi, "select sum(sub_totalgaji) as totalgaji from hitung_gajikaryawan where tgl_gaji = '".$tgl_gaji."' and id_kry = '".$id_kry."'");
	$rowtotalgaji = mysqli_fetch_array($gettotalgaji);

	// ambil data kasbon
	$getbayarkasbon = mysqli_query($koneksi, "select * from bayar_kasbon where id_kry = '" . $rowkaryawan["id_kry"] . "'");
	$countbayarkasbon = mysqli_num_rows($getbayarkasbon);

	if ($countbayarkasbon >= 1) {
		$rowbayarkasbon = mysqli_fetch_array($getbayarkasbon);
		$temp_kasbon = $rowbayarkasbon["sisa_kasbon"];
	} else {
		$gettotalkasbon = mysqli_query($koneksi, "select id_kasbon, nominal from kasbon_kry where sts_kasbon = 'Belum Lunas' and id_kry = " . $rowkaryawan["id_kry"]);
		$rowtotalkasbon = mysqli_fetch_array($gettotalkasbon);
		$temp_kasbon = $rowtotalkasbon["nominal"];
	}


	// $temp_upah = $gaji_gentengcetak + $gajicatgenteng + $gajiangkatgenteng + $gajicetakpaving + $gajibuis + $gajigreffel + $gajiuditch + $gajicuditch + $gajicbuis;


	$nominaltemp = array(
		// "total_upah" => number_format($rowtotalgaji["totalgaji"], 0, ",", "."),
		"total_upah" => $rowtotalgaji["totalgaji"],
		"total_kasbon" => number_format($temp_kasbon, 0, ",", "."),
		"idkasbon" => $rowtotalkasbon["id_kasbon"],
		"idkry" => $rowvalue["id_kry"],
		"group" => $rowvalue["group_kry"],
	);

	echo json_encode($nominaltemp);
} elseif ($rowkaryawan["group_kry"] == "Supir") {
	// hitung gaji supir
	$sqlgajisupir = "select sum(wilayah.nominal_uangjalan) as totalgajisupir from wilayah inner join surat_jalan on wilayah.id_wilayah = surat_jalan.id_wilayah where  surat_jalan.uang_jalan = 'Ya' and surat_jalan.id_supir = '" . $namakry_gaji . "'";
	$gajisupir = mysqli_query($koneksi, $sqlgajisupir);
	$rowgajisupir = mysqli_fetch_array($gajisupir);

	$getkerjatambahansupir = mysqli_query($koneksi, "select sum(nominal) as total_nominal from pekerjaansupir_tambahan where tanggal between '" . $tgl_awalperiodegaji . "' and '" . $tgl_akhirperiodegaji . "' and id_supir = '" . $namakry_gaji . "'");
	$rowkerjatambahansupir = mysqli_fetch_array($getkerjatambahansupir);

	if ($rowkerjatambahansupir["total_nominal"] == 0) {
		$nominalkerjatambahan = 0;
	} else {
		$nominalkerjatambahan = $rowkerjatambahansupir["total_nominal"];
	}

	if ($rowgajisupir["totalgajisupir"] == NULL) {
		$subtotalgaji = 0;
	} else {
		$subtotalgaji = $rowgajisupir["totalgajisupir"];
	}

	$totalgaji = $subtotalgaji + $nominalkerjatambahan;



	// ambil data kasbon
	$gettotalkasbon = mysqli_query($koneksi, "select id_kasbon, nominal from kasbon_kry where sts_kasbon = 'Belum Lunas' and id_kry = " . $rowkaryawan["id_kry"]);
	$rowtotalkasbon = mysqli_fetch_array($gettotalkasbon);

	// $temp_upah = $totalgajipaving + $totalgajigenteng + $totalgajibuis + $totalgajigreffel + $totalgajiuditch + $totalgajicuditch + $totalgajicbuis;
	// $temp_kasbon = $rowtotalkasbon["nominal"];
	// echo $totalgaji;

	$getbayarkasbon = mysqli_query($koneksi, "select * from bayar_kasbon where id_kry = '" . $rowkaryawan["id_kry"] . "'");
	$countbayarkasbon = mysqli_num_rows($getbayarkasbon);

	if ($countbayarkasbon >= 1) {
		$rowbayarkasbon = mysqli_fetch_array($getbayarkasbon);
		$temp_kasbon = $rowbayarkasbon["sisa_kasbon"];
	} else {
		$gettotalkasbon = mysqli_query($koneksi, "select id_kasbon, nominal from kasbon_kry where sts_kasbon = 'Belum Lunas' and id_kry = " . $rowkaryawan["id_kry"]);
		$rowtotalkasbon = mysqli_fetch_array($gettotalkasbon);
		$temp_kasbon = $rowtotalkasbon["nominal"];
	}
	$temp_upah = $totalgaji;
	// $temp_kasbon = $rowtotalkasbon["nominal"];

	$nominaltemp = array(
		// "total_upah" => number_format($temp_upah, 0, ",", "."),
		"total_upah" => $temp_upah,
		"total_kasbon" => number_format($temp_kasbon, 0, ",", "."),
		"idkasbon" => $rowtotalkasbon["id_kasbon"],
		"idkry" => $id_kry,
		"group" => $group
	);

	echo json_encode($nominaltemp);
}
