<?php
	error_reporting(0);
	include_once "koneksi.php";

	// $id_kry = $_POST["id_kry"];

	$nama_kry = $_POST["nama_kry"];
	$sqlgetvalue = "select * from karyawan where nama_kry = '".$nama_kry."'";
	// $sqlgetvalue = "select kode_barang from stock_barang where nama_barang like '%PAVING BATA 6CM ABU%'";

	$aksigetvalue = mysqli_query($koneksi, $sqlgetvalue);
	// $countkode = mysqli_num_rows($aksigetvalue);

	$rowvalue = mysqli_fetch_assoc($aksigetvalue);

	// $kry = array(
		
	// );

	// echo json_encode($kry);
	// $grup = $_POST["grupkry"];

	// $tgl_awalperiodegaji = date("Y-m-d", strtotime($_POST["tgl_awalperiodegaji"]));
	// $tgl_akhirperiodegaji = date("Y-m-d", strtotime($_POST["tgl_akhirperiodegaji"]));

	// ambil data karyawan
	// $sqlkaryawan = "select * from karyawan where id_kry = '".$rowvalue["id_kry"]."'";
	// $aksikaryawan = mysqli_query($koneksi, $sqlkaryawan);
	// $rowkaryawan = mysqli_fetch_array($aksikaryawan);

	if($rowvalue["group_kry"] == "Lapangan"){
		// ambil gaji paving
		$gaji = mysqli_query($koneksi, "select * from setting_gajistaff where id_kry = '".$rowvalue["id_kry"]."'");
		$rowgaji = mysqli_fetch_array($gaji);

		$getbayarkasbon = mysqli_query($koneksi, "select * from bayar_kasbon where id_kry = '".$rowvalue["id_kry"]."'");
		$countbayarkasbon = mysqli_num_rows($getbayarkasbon);

		if($countbayarkasbon >= 1){
			$rowbayarkasbon = mysqli_fetch_array($getbayarkasbon);
			$temp_kasbon = $rowbayarkasbon["sisa_kasbon"];
		}else{
			$gettotalkasbon = mysqli_query($koneksi, "select id_kasbon, nominal from kasbon_kry where sts_kasbon = 'Belum Lunas' and id_kry = ".$rowvalue["id_kry"]);
			$rowtotalkasbon = mysqli_fetch_array($gettotalkasbon);
			$temp_kasbon = $rowtotalkasbon["nominal"];
		}

		// $gettotalkasbon = mysqli_query($koneksi, "select * from kasbon_kry where sts_kasbon = 'Belum Lunas' and id_kry = ".$rowvalue["id_kry"]);
		// $rowtotalkasbon = mysqli_fetch_array($gettotalkasbon);

		// echo $rowgaji["gaji_lapangan"];
		$temp_upah = $rowgaji["gaji_staff"];
		$temp_kasbon = $rowtotalkasbon["nominal"];

		$nominaltemp = array(
			"total_upah" => number_format($temp_upah,0,",","."),
			"total_kasbon" => number_format($temp_kasbon,0,",","."),
			"idkasbon" => $rowtotalkasbon["id_kasbon"],
			"idkry" => $rowvalue["id_kry"],
			"group" => $rowvalue["group_kry"]
		);

		echo json_encode($nominaltemp);
	}elseif($rowvalue["group_kry"] == "Staff"){
		// ambil gaji paving
		$gaji = mysqli_query($koneksi, "select * from setting_gajistaff where id_kry = '".$rowvalue["id_kry"]."'");
		$rowgaji = mysqli_fetch_array($gaji);

		$getbayarkasbon = mysqli_query($koneksi, "select * from bayar_kasbon where id_kry = '".$rowvalue["id_kry"]."'");
		$countbayarkasbon = mysqli_num_rows($getbayarkasbon);

		if($countbayarkasbon >= 1){
			$rowbayarkasbon = mysqli_fetch_array($getbayarkasbon);
			$temp_kasbon = $rowbayarkasbon["sisa_kasbon"];
		}else{
			$gettotalkasbon = mysqli_query($koneksi, "select id_kasbon, nominal from kasbon_kry where sts_kasbon = 'Belum Lunas' and id_kry = ".$rowvalue["id_kry"]);
			$rowtotalkasbon = mysqli_fetch_array($gettotalkasbon);
			$temp_kasbon = $rowtotalkasbon["nominal"];
		}

		// echo $rowgaji["gaji_staff"];
		$temp_upah = $rowgaji["gaji_staff"];
		// $temp_kasbon = $rowtotalkasbon["nominal"];

		$nominaltemp = array(
			"total_upah" => number_format($temp_upah,0,",","."),
			"total_kasbon" => number_format($temp_kasbon,0,",","."),
			"idkasbon" => $rowtotalkasbon["id_kasbon"],
			"idkry" => $rowvalue["id_kry"],
			"group" => $rowvalue["group_kry"]
		);

		echo json_encode($nominaltemp);
	}
?>