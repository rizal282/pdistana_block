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

	if($rowkaryawan["group_kry"] == "Produksi"){
		// ambil data histori kerja karyawan
		$sqlhistorikerja = "select * from historikerjakaryawan where tgl between '".$tgl_awalperiodegaji."' and '".$tgl_akhirperiodegaji."' and id_kry = '".$rowkaryawan["id_kry"]."'";
		$aksigethistori = mysqli_query($koneksi, $sqlhistorikerja);

		while($rowhistorikerja = mysqli_fetch_array($aksigethistori)){
			if($rowhistorikerja["jenis_brg"] == "Paving"){
				// hitung jumlah paving
				$gettotalpaving = mysqli_query($koneksi, "select sum(qty_brg) as total from historikerjakaryawan where tgl between '".$tgl_awalperiodegaji."' and '".$tgl_akhirperiodegaji."' and id_kry = '".$rowkaryawan["id_kry"]."' and jenis_brg = 'Paving'");
				$rowtotalpaving = mysqli_fetch_array($gettotalpaving);

				// ambil gaji paving
				$gaji = mysqli_query($koneksi, "select * from setting");
				$rowgaji = mysqli_fetch_array($gaji);

				

				if($rowtotalpaving["total"] != ""){
					// $totalgajipaving = $rowtotalpaving["total"] * $rowgaji["gaji_paving"];

					$divqty = $rowtotalpaving["total"] / $rowgaji["range_paving"];
					$kurangi_qty = floor($divqty) * $rowtoleransi["t_pecah_paving"];
					$sisa_qty = $rowtotalpaving["total"] - $kurangi_qty;

					// for($i = 1; $i <= floor($divqty); $i++){
					// 	$arraysisa_qty[] = floor($divqty) - $rowtoleransi["t_pecah_paving"];
					// }

					$totalgajipaving = $sisa_qty * $rowgaji["gaji_paving"];
				}else{
					$totalgajipaving = 0;
				}
			}

			if($rowhistorikerja["jenis_brg"] == "Genteng"){
				$getjeniskerjagenteng = mysqli_query($koneksi, "select pekerjaan from historikerjakaryawan where tgl between '".$tgl_awalperiodegaji."' and '".$tgl_akhirperiodegaji."' and id_kry = '".$id_kry."' and jenis_brg = 'Genteng'");
				$rowjeniskerjagenteng = mysqli_fetch_array($getjeniskerjagenteng);

				if($rowjeniskerjagenteng["pekerjaan"] == "Cetak"){
					// hitung jumlah paving
					$gettotalpaving = mysqli_query($koneksi, "select sum(qty_brg) as total from historikerjakaryawan where tgl between '".$tgl_awalperiodegaji."' and '".$tgl_akhirperiodegaji."' and id_kry = '".$rowkaryawan["id_kry"]."' and jenis_brg = 'Genteng' and pekerjaan = 'Cetak'");
					$rowtotalpaving = mysqli_fetch_array($gettotalpaving);

					// ambil gaji paving
					$gaji = mysqli_query($koneksi, "select * from setting");
					$rowgaji = mysqli_fetch_array($gaji);

					if($rowtotalpaving["total"] != ""){
						// $totalgajicetakgenteng = $rowtotalpaving["total"] * $rowgaji["gaji_cetakgenteng"];

						$divqty = $rowtotalpaving["total"] / $rowgaji["range_cetak"];
						$kurangi_qty = floor($divqty) * $rowtoleransi["t_pecah_genteng"];
						$sisa_qty = $rowtotalpaving["total"] - $kurangi_qty;
						// for($i = 1; $i <= floor($divqty); $i++){
						// 	$arraysisa_qty[] = floor($divqty) - $rowtoleransi["t_pecah_genteng"];
						// }

						$totalgajicetakgenteng = $sisa_qty * $rowgaji["gaji_cetakgenteng"];
					}else{
						$totalgajicetakgenteng = 0;
					}
				}

				if($rowjeniskerjagenteng["pekerjaan"] == "Angkat"){
					// hitung jumlah paving
					$gettotalpaving = mysqli_query($koneksi, "select sum(qty_brg) as total from historikerjakaryawan where tgl between '".$tgl_awalperiodegaji."' and '".$tgl_akhirperiodegaji."' and id_kry = '".$rowkaryawan["id_kry"]."' and jenis_brg = 'Genteng' and pekerjaan = 'Angkat'");
					$rowtotalpaving = mysqli_fetch_array($gettotalpaving);

					// ambil gaji paving
					$gaji = mysqli_query($koneksi, "select * from setting");
					$rowgaji = mysqli_fetch_array($gaji);

					if($rowtotalpaving["total"] != ""){
						// $totalgajiangkatgenteng = $rowtotalpaving["total"] * $rowgaji["gaji_angkatgenteng"];

						$divqty = $rowtotalpaving["total"] / $rowgaji["range_angkat"];
						$kurangi_qty = floor($divqty) * $rowtoleransi["t_pecah_angkatgenteng"];
						$sisa_qty = $rowtotalpaving["total"] - $kurangi_qty;
						// for($i = 1; $i <= floor($divqty); $i++){
						// 	$arraysisa_qty[] = floor($divqty) - $rowtoleransi["t_pecah_genteng"];
						// }

						$totalgajicetakgenteng = $sisa_qty * $rowgaji["gaji_cetakgenteng"];
					}else{
						$totalgajiangkatgenteng = 0;
					}
				}elseif($rowjeniskerjagenteng["pekerjaan"] == "Cat"){
					// hitung jumlah paving
					$gettotalpaving = mysqli_query($koneksi, "select sum(qty_brg) as total from historikerjakaryawan where tgl between '".$tgl_awalperiodegaji."' and '".$tgl_akhirperiodegaji."' and id_kry = '".$rowkaryawan["id_kry"]."' and jenis_brg = 'Genteng' and pekerjaan = 'Angkat'");
					$rowtotalpaving = mysqli_fetch_array($gettotalpaving);

					// ambil gaji paving
					$gaji = mysqli_query($koneksi, "select * from setting");
					$rowgaji = mysqli_fetch_array($gaji);

					if($rowtotalpaving["total"] != ""){
						// $totalgajicatgenteng = $rowtotalpaving["total"] * $rowgaji["gaji_catgenteng"];

						$divqty = $rowtotalpaving["total"] / $rowgaji["range_cat"];
						$kurangi_qty = floor($divqty) * $rowtoleransi["t_pecah_catatgenteng"];
						$sisa_qty = $rowtotalpaving["total"] - $kurangi_qty;
						// for($i = 1; $i <= floor($divqty); $i++){
						// 	$arraysisa_qty[] = floor($divqty) - $rowtoleransi["t_pecah_genteng"];
						// }

						$totalgajicetakgenteng = $sisa_qty * $rowgaji["gaji_catgenteng"];
					}else{
						$totalgajicatgenteng = 0;
					}
				}

				$totalgajigenteng = $totalgajicetakgenteng + $totalgajiangkatgenteng + $totalgajicatgenteng;

			}

			if($rowhistorikerja["jenis_brg"] == "Buis"){
				// hitung jumlah paving
				$gettotalpaving = mysqli_query($koneksi, "select sum(qty_brg) as total from historikerjakaryawan where tgl between '".$tgl_awalperiodegaji."' and '".$tgl_akhirperiodegaji."' and id_kry = '".$rowkaryawan["id_kry"]."' and jenis_brg = 'Buis'");
				$rowtotalpaving = mysqli_fetch_array($gettotalpaving);

				// ambil gaji paving
				$gaji = mysqli_query($koneksi, "select * from setting");
				$rowgaji = mysqli_fetch_array($gaji);

				if($rowtotalpaving["total"] != ""){
					$totalgajibuis = $rowtotalpaving["total"] * $rowgaji["gaji_buisbeton"];
				}else{
					$totalgajibuis = 0;
				}
			}

			if($rowhistorikerja["jenis_brg"] == "Greffel"){
				// hitung jumlah paving
				$gettotalpaving = mysqli_query($koneksi, "select sum(qty_brg) as total from historikerjakaryawan where tgl between '".$tgl_awalperiodegaji."' and '".$tgl_akhirperiodegaji."' and id_kry = '".$rowkaryawan["id_kry"]."' and jenis_brg = 'Greffel'");
				$rowtotalpaving = mysqli_fetch_array($gettotalpaving);

				// ambil gaji paving
				$gaji = mysqli_query($koneksi, "select * from setting");
				$rowgaji = mysqli_fetch_array($gaji);

				if($rowtotalpaving["total"] != ""){
					$totalgajigreffel = $rowtotalpaving["total"] * $rowgaji["gaji_greffel"];
				}else{
					$totalgajigreffel = 0;	
				}
			}

			if($rowhistorikerja["jenis_brg"] == "U-Ditch"){
				// hitung jumlah paving
				$gettotalpaving = mysqli_query($koneksi, "select sum(qty_brg) as total from historikerjakaryawan where tgl between '".$tgl_awalperiodegaji."' and '".$tgl_akhirperiodegaji."' and id_kry = '".$rowkaryawan["id_kry"]."' and jenis_brg = 'U-Ditch'");
				$rowtotalpaving = mysqli_fetch_array($gettotalpaving);

				// ambil gaji paving
				$gaji = mysqli_query($koneksi, "select * from setting");
				$rowgaji = mysqli_fetch_array($gaji);

				if($rowtotalpaving["total"] != ""){
					$totalgajiuditch = $rowtotalpaving["total"] * $rowgaji["gaji_uditch"];
				}else{
					$totalgajiuditch = 0;
				}

				
			}

			if($rowhistorikerja["jenis_brg"] == "Cover U-Ditch"){
				// hitung jumlah paving
				$gettotalpaving = mysqli_query($koneksi, "select sum(qty_brg) as total from historikerjakaryawan where tgl between '".$tgl_awalperiodegaji."' and '".$tgl_akhirperiodegaji."' and id_kry = '".$rowkaryawan["id_kry"]."' and jenis_brg = 'Cover U-Ditch'");
				$rowtotalpaving = mysqli_fetch_array($gettotalpaving);

				// ambil gaji paving
				$gaji = mysqli_query($koneksi, "select * from setting");
				$rowgaji = mysqli_fetch_array($gaji);

				if($rowtotalpaving["total"] != ""){
					$totalgajicuditch = $rowtotalpaving["total"] * $rowgaji["gaji_coveruditch"];
				}else{
					$totalgajicuditch = 0;
				}
			}

			if($rowhistorikerja["jenis_brg"] == "Cover Buis"){
				// hitung jumlah paving
				$gettotalpaving = mysqli_query($koneksi, "select sum(qty_brg) as total from historikerjakaryawan where tgl between '".$tgl_awalperiodegaji."' and '".$tgl_akhirperiodegaji."' and id_kry = '".$rowkaryawan["id_kry"]."' and jenis_brg = 'Cover Buis'");
				$rowtotalpaving = mysqli_fetch_array($gettotalpaving);

				// ambil gaji paving
				$gaji = mysqli_query($koneksi, "select * from setting");
				$rowgaji = mysqli_fetch_array($gaji);

				if($rowtotalpaving["total"] != ""){
					$totalgajicbuis = $rowtotalpaving["total"] * $rowgaji["gaji_coverbuisbeton"];
				}else{
					$totalgajicbuis = 0;
				}
			}
		}

		// ambil data kasbon
		$gettotalkasbon = mysqli_query($koneksi, "select * from kasbon_kry where sts_kasbon = 'Belum Lunas' and id_kry = ".$rowkaryawan["id_kry"]);
		$rowtotalkasbon = mysqli_fetch_array($gettotalkasbon);

		$temp_upah = $totalgajipaving + $totalgajigenteng + $totalgajibuis + $totalgajigreffel + $totalgajiuditch + $totalgajicuditch + $totalgajicbuis;
		$temp_kasbon = $rowtotalkasbon["nominal"];

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
?>