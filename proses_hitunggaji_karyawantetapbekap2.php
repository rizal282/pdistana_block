<?php
	error_reporting(0);
	include_once "koneksi.php";

	$id_kry = $_POST["id_kry"];
	$group = $_POST["group_kry"];
	$tgl_gaji = date("Y-m-d", strtotime($_POST["tgl_gaji"]));
	$tgl_awal = date("Y-m-d", strtotime($_POST["tgl_awalperiodegaji"]));
	$tgl_akhir = date("Y-m-d", strtotime($_POST["tgl_akhirperiodegaji"]));

	// ambil data karyawan
	$sqlkaryawan = "select * from karyawan where id_kry = '".$id_kry."'";
	$aksikaryawan = mysqli_query($koneksi, $sqlkaryawan);
	$rowkaryawan = mysqli_fetch_array($aksikaryawan);

	if($rowkaryawan["group_kry"] == "Produksi"){
		$getkodebarang = mysqli_query($koneksi, "select kode_barang from stock_barang");
		while($rowkodebarang = mysqli_fetch_array($getkodebarang)){
				// // cetak genteng
				// $getjumlahproduksi = mysqli_query($koneksi, "select sum(qty_brg) as jumlahcetakgenteng from historikerjakaryawan where tgl between '".$tgl_awal."' and '".$tgl_akhir."' and id_kry = '".$id_kry."' and jenis_brg = 'Genteng' and pekerjaan = 'Cetak' and kode_brg = '".$rowkodebarang["kode_barang"]."'");
				// $rowjumlahqty = mysqli_fetch_array($getjumlahproduksi);

				// if($rowjumlahqty["jumlahcetakgenteng"] != 0){
				// 		$settingcetakgenteng = mysqli_query($koneksi, "select * from setting_cetakgenteng where kode_barang = '".$rowkodebarang["kode_barang"]."'");
				// 		$rowsettingcetakgenteng = mysqli_fetch_array($settingcetakgenteng);

				// 		//bagi jumlah produksi dengan range
				// 		$divtotalcetakgenteng = $rowjumlahqty["jumlahcetakgenteng"] / $rowsettingcetakgenteng["range_genteng"];
				// 		$totalkalicetakgenteng = round($divtotalcetakgenteng) * $rowsettingcetakgenteng["toleransi"];
				// 		$totalkurangicetakgenteng = $rowjumlahqty["jumlahcetakgenteng"] - $totalkalicetakgenteng;
				// 		$gaji_gentengcetak = $totalkurangicetakgenteng * $rowsettingcetakgenteng["gaji"];

				// 		mysqli_query($koneksi, "insert into hitung_gajikaryawan(id_kry,tgl_gaji,sub_totalgaji,kode_barang,pekerjaan,tgl_kerjaawal,tgl_kerjaakhir) values('".$id_kry."','".$tgl_gaji."','".$gaji_gentengcetak."','".$rowkodebarang["kode_barang"]."','Cetak','".$tgl_awal."','".$tgl_akhir."')");
				// }

				// cat genteng
				// $getjumlahcatgenteng = mysqli_query($koneksi, "select sum(qty_brg) as jumlahcatgenteng from historikerjakaryawan where tgl between '".$tgl_awal."' and '".$tgl_akhir."' and id_kry = '".$id_kry."' and jenis_brg = 'Genteng' and pekerjaan = 'Cat' and kode_brg = '".$rowkodebarang["kode_barang"]."'");
				// $rowjumlahcatgenteng = mysqli_fetch_array($getjumlahcatgenteng);

				// if($rowjumlahcatgenteng["jumlahcatgenteng"] != 0){
				// 		$settingcatgenteng = mysqli_query($koneksi, "select * from setting_catgenteng where kode_barang = '".$rowkodebarang["kode_barang"]."'");
				// 		$rowsettingcatgenteng = mysqli_fetch_array($settingcatgenteng);

				// 		$divtotalcatgenteng = $rowjumlahcatgenteng["jumlahcatgenteng"] / $settingcatgenteng["range_genteng"];
				// 		$totalkalicatgenteng = round($divtotalcatgenteng) * $rowsettingcatgenteng["toleransi"];
				// 		$totalkurangicatgenteng = $rowjumlahcatgenteng["jumlahcatgenteng"] - $totalkalicatgenteng;
				// 		$gajicatgenteng = $totalkalicatgenteng * $rowsettingcatgenteng["gaji"];

				// 		mysqli_query($koneksi, "insert into hitung_gajikaryawan(id_kry,tgl_gaji,sub_totalgaji,kode_barang,pekerjaan,tgl_kerjaawal,tgl_kerjaakhir) values('".$id_kry."','".$tgl_gaji."','".$gaji_gentengcetak."','".$rowkodebarang["kode_barang"]."','Cat','".$tgl_awal."','".$tgl_akhir."')");
				// }

				

				// // angkat genteng
				// $getjumlahangkatgenteng = mysqli_query($koneksi, "select sum(qty_brg) as jumlahangkatgenteng from historikerjakaryawan where tgl between '".$tgl_awal."' and '".$tgl_akhir."' and id_kry = '".$id_kry."' and jenis_brg = 'Genteng' and pekerjaan = 'Angkat' and kode_brg = '".$rowkodebarang["kode_barang"]."'");
				// $rowjumlahangkatgenteng = mysqli_fetch_array($getjumlahangkatgenteng);

				// if($rowjumlahangkatgenteng["jumlahangkatgenteng"] != 0){
				// 		$settingangkatgenteng = mysqli_query($koneksi, "select * from setting_angkatgenteng where kode_barang = '".$rowkodebarang["kode_barang"]."'");
				// 		$rowsettingangkatgenteng = mysqli_fetch_array($settingangkatgenteng);

				// 		$divtotalangkatgenteng = $rowjumlahangkatgenteng["jumlahangkatgenteng"] / $rowsettingangkatgenteng["range_genteng"];
				// 		$totalkaliangkatgenteng = round($divtotalangkatgenteng) * $rowsettingangkatgenteng["toleransi"];
				// 		$totalkurangiangkatgenteng = $rowjumlahangkatgenteng["jumlahangkatgenteng"] - $totalkaliangkatgenteng;
				// 		$gajiangkatgenteng = $totalkaliangkatgenteng * $rowsettingangkatgenteng["gaji"];

				// 		mysqli_query($koneksi, "insert into hitung_gajikaryawan(id_kry,tgl_gaji,sub_totalgaji,kode_barang,pekerjaan,tgl_kerjaawal,tgl_kerjaakhir) values('".$id_kry."','".$tgl_gaji."','".$gaji_gentengcetak."','".$rowkodebarang["kode_barang"]."','Angkat','".$tgl_awal."','".$tgl_akhir."')");
				// }

				// // cetak paving
				// $getjumlahcetakpaving = mysqli_query($koneksi, "select sum(qty_brg) as jumlahpaving from historikerjakaryawan where tgl between '".$tgl_awal."' and '".$tgl_akhir."' and id_kry = '".$id_kry."' and jenis_brg = 'Paving' and pekerjaan = 'Cetak' and kode_brg = '".$rowkodebarang["kode_barang"]."'");
				// $rowjumlahpaving = mysqli_fetch_array($getjumlahcetakpaving);

				// if($rowjumlahpaving["jumlahpaving"] != 0){
				// 		$settingcetakpaving = mysqli_query($koneksi, "select * from setting_cetakpaving where kode_barang = '".$rowkodebarang["kode_barang"]."'");
				// 		$rowsetpaving = mysqli_fetch_array($settingcetakpaving);

				// 		$divtotalcetakpaving = $rowjumlahpaving["jumlahpaving"] / $rowsetpaving["range_paving"];
				// 		$totalkalicetakpaving = round($divtotalcetakpaving) * $rowsetpaving["toleransi"];
				// 		$totalkurangicetakpaving = $rowjumlahpaving["jumlahpaving"] - $totalkalicetakpaving;
				// 		$gajicetakpaving = $totalkurangicetakpaving * $rowsetpaving["gaji"];

				// 		mysqli_query($koneksi, "insert into hitung_gajikaryawan(id_kry,tgl_gaji,sub_totalgaji,kode_barang,pekerjaan,tgl_kerjaawal,tgl_kerjaakhir) values('".$id_kry."','".$tgl_gaji."','".$gajicetakpaving."','".$rowkodebarang["kode_barang"]."','Cetak','".$tgl_awal."','".$tgl_akhir."')");
				// }

				// // cetak buis
				// $getjumlahbuis = mysqli_query($koneksi, "select sum(qty_brg) as jumlahbuis from historikerjakaryawan where tgl between '".$tgl_awal."' and '".$tgl_akhir."' and id_kry = '".$id_kry."' and jenis_brg = 'Buis' and pekerjaan = 'Cetak' and kode_brg = '".$rowkodebarang["kode_barang"]."'");
				// $rowjumlahbuis = mysqli_fetch_array($getjumlahbuis);

				// if($rowjumlahbuis["jumlahbuis"] != 0){
				// 	$getsettingbuis = mysqli_query($koneksi, "select * from setting_baranglain where kode_barang = '".$rowkodebarang["kode_barang"]."'");
				// 	$rowsettingbuis = mysqli_fetch_array($getsettingbuis);

				// 	$divtotalbuis = $rowjumlahbuis["jumlahbuis"] / $rowsettingbuis["range_brglain"];
				// 	$totalkalibuis = round($divtotalbuis) * $rowsettingbuis["toleransi"];
				// 	$totalkurangibuis = $rowjumlahbuis["jumlahbuis"] - $totalkalibuis;
				// 	$gajibuis = $totalkurangibuis * $rowsettingbuis["gaji"];

				// 	mysqli_query($koneksi, "insert into hitung_gajikaryawan(id_kry,tgl_gaji,sub_totalgaji,kode_barang,pekerjaan,tgl_kerjaawal,tgl_kerjaakhir) values('".$id_kry."','".$tgl_gaji."','".$gajibuis."','".$rowkodebarang["kode_barang"]."','Cetak','".$tgl_awal."','".$tgl_akhir."')");
				// }

				// // cetak greffel
				// $getjumlahgreffel = mysqli_query($koneksi, "select sum(qty_brg) as jumlahgreffel from historikerjakaryawan where tgl between '".$tgl_awal."' and '".$tgl_akhir."' and id_kry = '".$id_kry."' and jenis_brg = 'Greffel' and pekerjaan = 'Cetak' and kode_brg = '".$rowkodebarang["kode_barang"]."'");
				// $rowjumlahgreffel = mysqli_fetch_array($getjumlahgreffel);

				// if($rowjumlahgreffel["jumlahbuis"] != 0){
				// 	$getsettinggreffel = mysqli_query($koneksi, "select * from setting_baranglain where kode_barang = '".$rowkodebarang["kode_barang"]."'");
				// 	$rowsettinggreffel = mysqli_fetch_array($getsettinggreffel);

				// 	$divtotalgreffel = $rowjumlahgreffel["jumlahgreffel"] / $rowsettinggreffel["range_brglain"];
				// 	$totalkaligreffel = round($divtotalgreffel) * $rowsettinggreffel["toleransi"];
				// 	$totalkurangigreffel = $rowjumlahgreffel["jumlahgreffel"] - $totalkaligreffel;
				// 	$gajigreffel = $totalkurangigreffel * $rowsettinggreffel["gaji"];

				// 	mysqli_query($koneksi, "insert into hitung_gajikaryawan(id_kry,tgl_gaji,sub_totalgaji,kode_barang,pekerjaan,tgl_kerjaawal,tgl_kerjaakhir) values('".$id_kry."','".$tgl_gaji."','".$gajigreffel."','".$rowkodebarang["kode_barang"]."','Cetak','".$tgl_awal."','".$tgl_akhir."')");
				// }

				// // cetak U-Ditch
				// $getjumlahuditch = mysqli_query($koneksi, "select sum(qty_brg) as jumlahuditch from historikerjakaryawan where tgl between '".$tgl_awal."' and '".$tgl_akhir."' and id_kry = '".$id_kry."' and jenis_brg = 'U-Ditch' and pekerjaan = 'Cetak' and kode_brg = '".$rowkodebarang["kode_barang"]."'");
				// $rowjumlahuditch = mysqli_fetch_array($getjumlahuditch);

				// if($rowjumlahuditch["jumlahuditch"] != 0){
				// 	$getsettinguditch = mysqli_query($koneksi, "select * from setting_baranglain where kode_barang = '".$rowkodebarang["kode_barang"]."'");
				// 	$rowsetuditch = mysqli_fetch_array($getjumlahuditch);

				// 	$divtotaluditch = $rowjumlahuditch["jumlahuditch"] / $rowsetuditch["range_brglain"];
				// 	$totalkaliuditch = round($divtotaluditch) * $rowsetuditch["toleransi"];
				// 	$totalkurangiuditch = $rowjumlahuditch["jumlahuditch"] - $totalkaliuditch;
				// 	$gajiuditch = $totalkurangiuditch * $rowsetuditch["gaji"];

				// 	mysqli_query($koneksi, "insert into hitung_gajikaryawan(id_kry,tgl_gaji,sub_totalgaji,kode_barang,pekerjaan,tgl_kerjaawal,tgl_kerjaakhir) values('".$id_kry."','".$tgl_gaji."','".$gajiuditch."','".$rowkodebarang["kode_barang"]."','Cetak','".$tgl_awal."','".$tgl_akhir."')");
				// }

				// // cetak Cover U-Ditch
				// $getjumlahcuditch = mysqli_query($koneksi, "select sum(qty_brg) as jumlahcuditch from historikerjakaryawan where tgl between '".$tgl_awal."' and '".$tgl_akhir."' and id_kry = '".$id_kry."' and jenis_brg = 'Cover U-Ditch' and pekerjaan = 'Cetak' and kode_brg = '".$rowkodebarang["kode_barang"]."'");
				// $rowjumlahcudtich = mysqli_fetch_array($getjumlahcuditch);

				// if($rowjumlahcudtich["jumlahcuditch"] != 0){
				// 	$getsettingcuditch = mysqli_query($koneksi, "select * from setting_baranglain where kode_barang = '".$rowkodebarang["kode_barang"]."'");
				// 	$rowsetcuditch = mysqli_fetch_array($getsettingcuditch);

				// 	$divtotalcuditch = $rowjumlahcudtich["jumlahcuditch"] / $rowsetcuditch["range_brglain"];
				// 	$totalkalicuditch = round($divtotalcuditch) * $rowsetcuditch["toleransi"];
				// 	$totalkurangicuditch = $rowjumlahcudtich["jumlahcuditch"] - $totalkalicuditch;
				// 	$gajicuditch = $totalkurangicuditch * $rowsetcuditch["gaji"];

				// 	mysqli_query($koneksi, "insert into hitung_gajikaryawan(id_kry,tgl_gaji,sub_totalgaji,kode_barang,pekerjaan,tgl_kerjaawal,tgl_kerjaakhir) values('".$id_kry."','".$tgl_gaji."','".$gajicuditch."','".$rowkodebarang["kode_barang"]."','Cetak','".$tgl_awal."','".$tgl_akhir."')");
				// }

				// // cetak Cover Buis
				// $getjumlahcbuis = mysqli_query($koneksi, "select sum(qty_brg) as jumlahcbuis from historikerjakaryawan where tgl between '".$tgl_awal."' and '".$tgl_akhir."' and id_kry = '".$id_kry."' and jenis_brg = 'Cover Buis' and pekerjaan = 'Cetak' and kode_brg = '".$rowkodebarang["kode_barang"]."'");
				// $rowjumlahcbuis = mysqli_fetch_array($getjumlahcbuis);

				// if($rowjumlahcbuis["jumlahcbuis"] != 0){
				// 	$getsetcbuis = mysqli_query($koneksi, "select * from setting_baranglain where kode_barang = '".$rowkodebarang["kode_barang"]."'");
				// 	$rowsetcbuis = mysqli_fetch_array($getsetcbuis);

				// 	$divtotalcbuis = $rowjumlahcbuis["jumlahcbuis"] / $rowsetcbuis["range_brglain"];
				// 	$totalkalicbuis = round($divtotalcbuis) * $rowsetcbuis["toleransi"];
				// 	$totalkurangicbuis = $rowjumlahcbuis["jumlahcbuis"] - $totalkalicbuis;
				// 	$gajicbuis = $totalkurangicbuis * $rowsetcbuis["gaji"];

				// 	mysqli_query($koneksi, "insert into hitung_gajikaryawan(id_kry,tgl_gaji,sub_totalgaji,kode_barang,pekerjaan,tgl_kerjaawal,tgl_kerjaakhir) values('".$id_kry."','".$tgl_gaji."','".$gajicbuis."','".$rowkodebarang["kode_barang"]."','Cetak','".$tgl_awal."','".$tgl_akhir."')");
				// }

		}

		// hitung total gaji karyawan
		// $gettotalgaji = mysqli_query($koneksi, "select sum(sub_totalgaji) as totalgaji from hitung_gajikaryawan where tgl_gaji = '".$tgl_gaji."' and id_kry = '".$id_kry."'");
		// $rowtotalgaji = mysqli_fetch_array($gettotalgaji);

		// ambil data kasbon
		$getbayarkasbon = mysqli_query($koneksi, "select * from bayar_kasbon where id_kry = '".$rowkaryawan["id_kry"]."'");
		$countbayarkasbon = mysqli_num_rows($getbayarkasbon);

		if($countbayarkasbon >= 1){
			$rowbayarkasbon = mysqli_fetch_array($getbayarkasbon);
			$temp_kasbon = $rowbayarkasbon["sisa_kasbon"];
		}else{
			$gettotalkasbon = mysqli_query($koneksi, "select id_kasbon, nominal from kasbon_kry where sts_kasbon = 'Belum Lunas' and id_kry = ".$rowkaryawan["id_kry"]);
			$rowtotalkasbon = mysqli_fetch_array($gettotalkasbon);
			$temp_kasbon = $rowtotalkasbon["nominal"];
		}
		

		$temp_upah = $gajicetakpaving + $gaji_gentengcetak + $gajicatgenteng + $gajiangkatgenteng + $gajicetakbuis + $gajicetakgreffel + $gajicetakuditch + $gajicetakcuditch + $gajicetakcbuis;
		

		$nominaltemp = array(
			"total_upah" => number_format($rowjumlahcatgenteng["qty_brg"],0,",","."),
			"total_kasbon" => number_format($temp_kasbon,0,",","."),
			"idkasbon" => $rowtotalkasbon["id_kasbon"],
			"idkry" => $rowvalue["id_kry"],
			"group" => $rowvalue["group_kry"],
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
		$gettotalkasbon = mysqli_query($koneksi, "select id_kasbon, nominal from kasbon_kry where sts_kasbon = 'Belum Lunas' and id_kry = ".$rowkaryawan["id_kry"]);
		$rowtotalkasbon = mysqli_fetch_array($gettotalkasbon);

		// $temp_upah = $totalgajipaving + $totalgajigenteng + $totalgajibuis + $totalgajigreffel + $totalgajiuditch + $totalgajicuditch + $totalgajicbuis;
		// $temp_kasbon = $rowtotalkasbon["nominal"];
		// echo $totalgaji;

		$getbayarkasbon = mysqli_query($koneksi, "select * from bayar_kasbon where id_kry = '".$rowkaryawan["id_kry"]."'");
		$countbayarkasbon = mysqli_num_rows($getbayarkasbon);

		if($countbayarkasbon >= 1){
			$rowbayarkasbon = mysqli_fetch_array($getbayarkasbon);
			$temp_kasbon = $rowbayarkasbon["sisa_kasbon"];
		}else{
			$gettotalkasbon = mysqli_query($koneksi, "select id_kasbon, nominal from kasbon_kry where sts_kasbon = 'Belum Lunas' and id_kry = ".$rowkaryawan["id_kry"]);
			$rowtotalkasbon = mysqli_fetch_array($gettotalkasbon);
			$temp_kasbon = $rowtotalkasbon["nominal"];
		}
		$temp_upah = $totalgaji;
		// $temp_kasbon = $rowtotalkasbon["nominal"];

		$nominaltemp = array(
			"total_upah" => number_format($temp_upah,0,",","."),
			"total_kasbon" => number_format($temp_kasbon,0,",","."),
			"idkasbon" => $rowtotalkasbon["id_kasbon"],
			"idkry" => $id_kry,
			"group" => $group
		);

		echo json_encode($nominaltemp);
	}
?>
