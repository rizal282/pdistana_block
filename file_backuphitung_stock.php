<?php
	// $sqlupdatestock = "UPDATE stock_barang AS SI, tempstock_barangkry AS RAN SET SI.stock_masuk = RAN.qty_brg WHERE SI.kode_barang = RAN.kode_brg"; 
	// mysqli_query($koneksi, $sqlupdatestock);

	// echo '<div class="alert alert-success">Update Stock Barang Berhasil</div>';

	$sqlgetdstockbarangtemp = "select * from tempstock_barangkry";
	$aksigetstockbarangtemp = mysqli_query($koneksi, $sqlgetdstockbarangtemp);

	while($rowstockbarang = mysqli_fetch_array($aksigetstockbarangtemp)){
		// ambil jenis barang
		$sqlgetjenisbrg = "select jenis_brg, pekerjaan from tempstock_barangkry where kode_brg = '".$rowstockbarang["kode_brg"]."'";
		$aksigetjenisbrg = mysqli_query($koneksi, $sqlgetjenisbrg);
		$rowjenisbrg = mysqli_fetch_array($aksigetjenisbrg);

		// ambil limit toleransi barang yang pecah
		$sqlgettoleransi = "select * from setting";
		$aksigettoleransi = mysqli_query($koneksi, $sqlgettoleransi);
		$rowtoleransi = mysqli_fetch_array($aksigettoleransi);

		// hitung jumlah yang dibuat oleh karyawan berdasarkan kode barang
		$sqlgetstocktemp = "select sum(qty_brg) as total_qty from tempstock_barangkry where kode_brg = '".$rowstockbarang["kode_brg"]."'";
		$aksigetstocktemp = mysqli_query($koneksi, $sqlgetstocktemp);
		$rowstocktemp = mysqli_fetch_array($aksigetstocktemp);

		// if($rowjenisbrg["jenis_brg"] == "Genteng"){	
		// 	$sisa_qty = $rowstocktemp["total_qty"] - $rowtoleransi["t_pecah_genteng"];
		// }elseif($rowjenisbrg["jenis_brg"] == "Paving"){
		// 	$sisa_qty = $rowstocktemp["total_qty"] - $rowtoleransi["t_pecah_paving"];
		// }elseif($rowjenisbrg["jenis_brg"] == "Buis"){
		// 	$sisa_qty = $rowstocktemp["total_qty"] - $rowtoleransi["t_pecah_buis"];
		// }elseif($rowjenisbrg["jenis_brg"] == "Greffel"){
		// 	$sisa_qty = $rowstocktemp["total_qty"] - $rowtoleransi["t_pecah_greffel"];
		// }elseif($rowjenisbrg["jenis_brg"] == "U-Ditch"){
		// 	$sisa_qty = $rowstocktemp["total_qty"] - $rowtoleransi["t_pecah_uditch"];
		// }elseif($rowjenisbrg["jenis_brg"] == "Cover U-Ditch"){
		// 	$sisa_qty = $rowstocktemp["total_qty"] - $rowtoleransi["t_pecah_cuidtch"];
		// }elseif($rowjenisbrg["jenis_brg"] == "Cover Buis"){
		// 	$sisa_qty = $rowstocktemp["total_qty"] - $rowtoleransi["t_pecah_cbuis"];
		// }

		if($rowjenisbrg["jenis_brg"] == "Genteng" && $rowjenisbrg["pekerjaan"] == "Cetak"){	
			$divqty = $rowstocktemp["total_qty"] / $rowtoleransi["range_genteng"];

			$toleransigenteng = $rowtoleransi["t_pecah_genteng"] + $rowtoleransi["t_pecah_angkatgenteng"] + $rowtoleransi["t_pecah_catgenteng"];

			for($i = 1; $i <= floor($divqty); $i++){
				$arraysisa_qty[] = $rowstocktemp["total_qty"] / floor($divqty) - $toleransigenteng;
			}

			$sisa_qty = array_sum($arraysisa_qty);
			// update stock masuk di stock barang
			$updatestockbarang = "update stock_barang set stock_masuk = '".$sisa_qty."' where kode_barang = '".$rowstockbarang["kode_brg"]."'";
		}elseif($rowjenisbrg["jenis_brg"] == "Paving"){
			$divqty = $rowstocktemp["total_qty"] / $rowtoleransi["range_paving"];

			for($i = 1; $i <= floor($divqty); $i++){
				$arraysisa_qty[] = $rowstocktemp["total_qty"] / floor($divqty) - $rowtoleransi["t_pecah_paving"] ."<br>";
			}

			$sisa_qty = array_sum($arraysisa_qty);
			// update stock masuk di stock barang
			$updatestockbarang = "update stock_barang set stock_masuk = '".$sisa_qty."' where kode_barang = '".$rowstockbarang["kode_brg"]."'";
		}else{
			// update stock masuk di stock barang
			$updatestockbarang = "update stock_barang set stock_masuk = '".$rowstocktemp["total_qty"]."' where kode_barang = '".$rowstockbarang["kode_brg"]."'";
		}

		// $rowstocktemp["total_qty"];

		// update stock masuk di stock barang
		// $updatestockbarang = "update stock_barang set stock_masuk = '".$$rowstocktemp["total_qty"]."' where kode_barang = '".$rowstockbarang["kode_brg"]."'";

		mysqli_query($koneksi, $updatestockbarang);

		// // ambil stock akhir dari stock barang
		$getstockakhir = mysqli_query($koneksi, "select stock_akhir from stock_barang where kode_barang = '".$rowstockbarang["kode_brg"]."'");
		$rowstockakhir = mysqli_fetch_array($getstockakhir);

		// // // update stock awal di stock barang
		$sqlupdatestockawal = "update stock_barang set stock_awal = '".$rowstockakhir["stock_akhir"]."' where kode_barang = '".$rowstockbarang["kode_brg"]."'";
		// mysqli_query($koneksi, $sqlupdatestockawal);

		// // jumlahkan lagi stok masuk baru dan stok awal baru
		$getstokawalmasukbaru = mysqli_query($koneksi, "select stock_awal, stock_masuk from stock_barang where kode_barang = '".$rowstockbarang["kode_brg"]."'");
		$rowstockawalmasuk = mysqli_fetch_array($getstokawalmasukbaru);

		$stockakhirbaru = $rowstockawalmasuk["stock_awal"] + $rowstockawalmasuk["stock_masuk"];
		mysqli_query($koneksi, "update stock_barang set stock_akhir = '".$stockakhirbaru."' where kode_barang = '".$rowstockbarang["kode_brg"]."'");

		mysqli_query($koneksi, "delete from tempstock_barangkry where kode_brg = '".$rowstockbarang["kode_brg"]."'");
	}

	// mysqli_query($koneksi, "delete from tempstock_barangkry");

	echo '<div class="alert alert-success">Stock Barang Sudah Diperbarui</div>';

	include_once "stock_barang/data_stock_barang.php";
?>