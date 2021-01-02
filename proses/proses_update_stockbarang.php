<?php
	$getkodestock = mysqli_query($koneksi, "select kode_barang, jenis_brg from stock_barang");
	while($rowkodebarang = mysqli_fetch_array($getkodestock)){
		if($rowkodebarang["jenis_brg"] == "Genteng"){
			// hitung stock yang diproduksi untuk masing2 proses
			// cetak
			$hitungcetak = mysqli_query($koneksi, "select sum(qty_brg) as total_cetak from tempstock_barangkry where kode_brg = '".$rowkodebarang["kode_barang"]."' and jenis_brg = 'Genteng' and pekerjaan = 'Cetak'");
			$datacetak = mysqli_fetch_array($hitungcetak);

			// angkat
			// $hitungangkat = mysqli_query($koneksi, "select sum(qty_brg) as total_angkat from tempstock_barangkry where kode_brg = '".$rowkodebarang["kode_barang"]."' and jenis_brg = 'Genteng' and pekerjaan = 'Angkat'");
			// $dataangkat = mysqli_fetch_array($hitungangkat);

			// cat
			// $hitungcat = mysqli_query($koneksi, "select sum(qty_brg) as total_cat from tempstock_barangkry where kode_brg = '".$rowkodebarang["kode_barang"]."' and jenis_brg = 'Genteng' and pekerjaan = 'Cat'");
			// $datacat = mysqli_fetch_array($hitungcat);

			if($datacetak["total_cetak"] != 0){
				// total tiap proses bagi dengan range proses dan kalikan dengan toleransi proses
				// cetak
				$settingcetakgenteng = mysqli_query($koneksi, "select * from setting_cetakgenteng where kode_barang = '".$rowkodebarang["kode_barang"]."'");
				$rowsettingcetakgenteng = mysqli_fetch_array($settingcetakgenteng);

				$totalcetak = $datacetak["total_cetak"] / $rowsettingcetakgenteng["range_genteng"];
				$totalkalicetak = round($totalcetak) * $rowsettingcetakgenteng["toleransi"];

				// angkat
				$settingangkatgenteng = mysqli_query($koneksi, "select * from setting_angkatgenteng where kode_barang = '".$rowkodebarang["kode_barang"]."'");
				$rowsettingangkatgenteng = mysqli_fetch_array($settingangkatgenteng);

				$totalangkat = $datacetak["total_cetak"] / $rowsettingangkatgenteng["range_genteng"];
				$totalkaliangkat = round($totalangkat) * $rowsettingangkatgenteng["toleransi"];

				// cat
				$settingcatgenteng = mysqli_query($koneksi, "select * from setting_catgenteng where kode_barang = '".$rowkodebarang["kode_barang"]."'");
				$rowsettingcatgenteng = mysqli_fetch_array($settingcatgenteng);

				$totalcat = $datacetak["total_cetak"] / $rowsettingcatgenteng["range_genteng"];
				$totalkalicat = round($totalcat) * $rowsettingcatgenteng["toleransi"];

				$totalpotongan = $totalkalicetak + $totalkaliangkat + $totalkalicat;

				$totalupdategenteng = $datacetak["total_cetak"] - $totalpotongan;

				mysqli_query($koneksi, "update stock_barang set stock_masuk = '".$totalupdategenteng."' where kode_barang = '".$rowkodebarang["kode_barang"]."'");

				// ambil stock akhir dari stock barang
				$getstockakhir = mysqli_query($koneksi, "select stock_akhir from stock_barang where kode_barang = '".$rowkodebarang["kode_barang"]."'");
				$rowstockakhir = mysqli_fetch_array($getstockakhir);

				// update stock awal di stock barang
				$sqlupdatestockawal = "update stock_barang set stock_awal = '".$rowstockakhir["stock_akhir"]."' where kode_barang = '".$rowkodebarang["kode_barang"]."'";
				mysqli_query($koneksi, $sqlupdatestockawal);

				// jumlahkan lagi stok masuk baru dan stok awal baru
				$getstokawalmasukbaru = mysqli_query($koneksi, "select stock_awal, stock_masuk from stock_barang where kode_barang = '".$rowkodebarang["kode_barang"]."'");
				$rowstockawalmasuk = mysqli_fetch_array($getstokawalmasukbaru);

				$stockakhirbaru = $rowstockawalmasuk["stock_awal"] + $rowstockawalmasuk["stock_masuk"];
				mysqli_query($koneksi, "update stock_barang set stock_akhir = '".$stockakhirbaru."' where kode_barang = '".$rowkodebarang["kode_barang"]."'");

				mysqli_query($koneksi, "delete from tempstock_barangkry where kode_brg = '".$rowkodebarang["kode_barang"]."'");
			}
		}elseif($rowkodebarang["jenis_brg"] == "Paving"){
			// cetak paving
			$hitungcetakpaving = mysqli_query($koneksi, "select sum(qty_brg) as total_cetakpaving from tempstock_barangkry where kode_brg = '".$rowkodebarang["kode_barang"]."' and jenis_brg = 'Paving' and pekerjaan = 'Cetak'");
			$datacetakpaving = mysqli_fetch_array($hitungcetakpaving);

			if($datacetakpaving["total_cetakpaving"] != 0){
				$settingcetakpaving = mysqli_query($koneksi, "select * from setting_cetakpaving where kode_barang = '".$rowkodebarang["kode_barang"]."'");
				$rowsetpaving = mysqli_fetch_array($settingcetakpaving);

				$totalcetakpaving = $datacetakpaving["total_cetakpaving"] / $rowsetpaving["range_paving"];
				$totalkalipaving = round($totalcetakpaving) * $rowsetpaving["toleransi"];

				$totalupdatepaving = $datacetakpaving["total_cetakpaving"] - $totalkalipaving;

				mysqli_query($koneksi, "update stock_barang set stock_masuk = '".$totalupdatepaving."' where kode_barang = '".$rowkodebarang["kode_barang"]."'");

				// ambil stock akhir dari stock barang
				$getstockakhir = mysqli_query($koneksi, "select stock_akhir from stock_barang where kode_barang = '".$rowkodebarang["kode_barang"]."'");
				$rowstockakhir = mysqli_fetch_array($getstockakhir);

				// update stock awal di stock barang
				$sqlupdatestockawal = "update stock_barang set stock_awal = '".$rowstockakhir["stock_akhir"]."' where kode_barang = '".$rowkodebarang["kode_barang"]."'";
				mysqli_query($koneksi, $sqlupdatestockawal);

				// jumlahkan lagi stok masuk baru dan stok awal baru
				$getstokawalmasukbaru = mysqli_query($koneksi, "select stock_awal, stock_masuk from stock_barang where kode_barang = '".$rowkodebarang["kode_barang"]."'");
				$rowstockawalmasuk = mysqli_fetch_array($getstokawalmasukbaru);

				$stockakhirbaru = $rowstockawalmasuk["stock_awal"] + $rowstockawalmasuk["stock_masuk"];
				mysqli_query($koneksi, "update stock_barang set stock_akhir = '".$stockakhirbaru."' where kode_barang = '".$rowkodebarang["kode_barang"]."'");

				mysqli_query($koneksi, "delete from tempstock_barangkry where kode_brg = '".$rowkodebarang["kode_barang"]."'");
			}
		}else{
			$hitungcetakbaranglain = mysqli_query($koneksi, "select sum(qty_brg) as total_cetaklain from tempstock_barangkry where kode_brg = '".$rowkodebarang["kode_barang"]."'");
			$datacetakbaranglain = mysqli_fetch_array($hitungcetakbaranglain);

			if($datacetakbaranglain["total_cetaklain"] != 0){
				$getsetbaranglain = mysqli_query($koneksi, "select * from setting_baranglain where kode_barang = '".$rowkodebarang["kode_barang"]."'");
				$rowsetbaranglain = mysqli_fetch_array($getsetbaranglain);

				$divtotalbaranglain = $datacetakbaranglain["total_cetaklain"] / $rowsetbaranglain["range_brglain"];
				$totalkalibaranglain = round($divtotalbaranglain) * $rowsetbaranglain["toleransi"];
				$totalkurangibaranglain = $datacetakbaranglain["total_cetaklain"] - $totalkalibaranglain;

				mysqli_query($koneksi, "update stock_barang set stock_masuk = '".$totalkurangibaranglain."' where kode_barang = '".$rowkodebarang["kode_barang"]."'");

				// ambil stock akhir dari stock barang
				$getstockakhir = mysqli_query($koneksi, "select stock_akhir from stock_barang where kode_barang = '".$rowkodebarang["kode_barang"]."'");
				$rowstockakhir = mysqli_fetch_array($getstockakhir);

				// update stock awal di stock barang
				$sqlupdatestockawal = "update stock_barang set stock_awal = '".$rowstockakhir["stock_akhir"]."' where kode_barang = '".$rowkodebarang["kode_barang"]."'";
				mysqli_query($koneksi, $sqlupdatestockawal);

				// jumlahkan lagi stok masuk baru dan stok awal baru
				$getstokawalmasukbaru = mysqli_query($koneksi, "select stock_awal, stock_masuk from stock_barang where kode_barang = '".$rowkodebarang["kode_barang"]."'");
				$rowstockawalmasuk = mysqli_fetch_array($getstokawalmasukbaru);

				$stockakhirbaru = $rowstockawalmasuk["stock_awal"] + $rowstockawalmasuk["stock_masuk"];
				mysqli_query($koneksi, "update stock_barang set stock_akhir = '".$stockakhirbaru."' where kode_barang = '".$rowkodebarang["kode_barang"]."'");

				mysqli_query($koneksi, "delete from tempstock_barangkry where kode_brg = '".$rowkodebarang["kode_barang"]."'");
			}
		}
	}

	echo '<div class="alert alert-success">Stock Barang Sudah Diperbarui</div>';

	include_once "stock_barang/data_stock_barang.php";
?>
