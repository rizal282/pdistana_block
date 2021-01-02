<?php
	if(isset($_POST["namastock_barang"])){
		$kode_stockbrg = $_POST["kode_stockbrg"];
		$namastock_barang = $_POST["namastock_barang"];

		$cekstockproduksi = mysqli_query($koneksi, "select * from tempstock_barangkry where kode_brg = '".$kode_stockbrg."'");
		$hitungstockproduksi = mysqli_num_rows($cekstockproduksi);

		// ambil range tiap proses
		$rangeproses = mysqli_query($koneksi, "select * from setting");
		$datarange = mysqli_fetch_array($rangeproses);

		if($hitungstockproduksi >= 1){
			$ambiljenisbarang = mysqli_fetch_array($cekstockproduksi);

			if($ambiljenisbarang["jenis_brg"] == "Genteng"){

				// hitung stock yang diproduksi untuk masing2 proses
				// cetak
				$hitungcetak = mysqli_query($koneksi, "select sum(qty_brg) as total_cetak from tempstock_barangkry where kode_brg = '".$kode_stockbrg."' and pekerjaan = 'Cetak'");
				$datacetak = mysqli_fetch_array($hitungcetak);

				// angkat
				$hitungangkat = mysqli_query($koneksi, "select sum(qty_brg) as total_angkat from tempstock_barangkry where kode_brg = '".$kode_stockbrg."' and pekerjaan = 'Angkat'");
				$dataangkat = mysqli_fetch_array($hitungangkat);

				// cat
				$hitungcat = mysqli_query($koneksi, "select sum(qty_brg) as total_cat from tempstock_barangkry where kode_brg = '".$kode_stockbrg."' and pekerjaan = 'Cat'");
				$datacat = mysqli_fetch_array($hitungcat);

				// echo $datacetak["total_cetak"].' '.$dataangkat["total_angkat"].' '.$datacat["total_cat"];

				// total tiap proses bagi dengan range proses dan kalikan dengan toleransi proses
				$totalcetak = $datacetak["total_cetak"] / $datarange["range_cetak"];
				$totalkalicetak = round($totalcetak) * $datarange["t_pecah_genteng"];

				$totalangkat = $dataangkat["total_angkat"] / $datarange["range_angkat"];
				$totalkaliangkat = round($totalangkat) * $datarange["t_pecah_angkatgenteng"];

				$totalcat = $datacat["total_cat"] / $datarange["range_cat"];
				$totalkalicat = round($totalcat) * $datarange["t_pecah_catgenteng"];

				$totalpotongan = round($totalkalicetak) + round($totalkaliangkat) + round($totalkalicat);

				$totalupdategenteng = $datacetak["total_cetak"] - $totalpotongan;

				mysqli_query($koneksi, "update stock_barang set stock_masuk = '".$totalupdategenteng."' where kode_barang = '".$kode_stockbrg."'");

				// ambil stock akhir dari stock barang
				$getstockakhir = mysqli_query($koneksi, "select stock_akhir from stock_barang where kode_barang = '".$kode_stockbrg."'");
				$rowstockakhir = mysqli_fetch_array($getstockakhir);

				// update stock awal di stock barang
				$sqlupdatestockawal = "update stock_barang set stock_awal = '".$rowstockakhir["stock_akhir"]."' where kode_barang = '".$kode_stockbrg."'";
				mysqli_query($koneksi, $sqlupdatestockawal);

				// jumlahkan lagi stok masuk baru dan stok awal baru
				$getstokawalmasukbaru = mysqli_query($koneksi, "select stock_awal, stock_masuk from stock_barang where kode_barang = '".$kode_stockbrg."'");
				$rowstockawalmasuk = mysqli_fetch_array($getstokawalmasukbaru);

				$stockakhirbaru = $rowstockawalmasuk["stock_awal"] + $rowstockawalmasuk["stock_masuk"];
				mysqli_query($koneksi, "update stock_barang set stock_akhir = '".$stockakhirbaru."' where kode_barang = '".$kode_stockbrg."'");

				// mysqli_query($koneksi, "delete from tempstock_barangkry where kode_brg = '".$kode_stockbrg."'");
				 // and id_kry = '".$ambiljenisbarang["id_kry"]."'

				echo '<div class="alert alert-success">Stock Barang Sudah Diperbarui</div>';

				include_once "stock_barang/data_stock_barang.php";
			}elseif($ambiljenisbarang["jenis_brg"] == "Paving"){
				// cetak paving
				$hitungcetakpaving = mysqli_query($koneksi, "select sum(qty_brg) as total_cetakpaving from tempstock_barangkry where kode_brg = '".$kode_stockbrg."' and pekerjaan = 'Cetak'");
				$datacetakpaving = mysqli_fetch_array($hitungcetakpaving);

				$totalcetakpaving = $datacetakpaving["total_cetakpaving"] / $datarange["range_paving"];
				$totalkalipaving = round($totalcetakpaving) * $datarange["t_pecah_paving"];

				$totalupdatepaving = $datacetakpaving["total_cetakpaving"] - $totalkalipaving;

				mysqli_query($koneksi, "update stock_barang set stock_masuk = '".$totalupdatepaving."' where kode_barang = '".$kode_stockbrg."'");

				// ambil stock akhir dari stock barang
				$getstockakhir = mysqli_query($koneksi, "select stock_akhir from stock_barang where kode_barang = '".$kode_stockbrg."'");
				$rowstockakhir = mysqli_fetch_array($getstockakhir);

				// update stock awal di stock barang
				$sqlupdatestockawal = "update stock_barang set stock_awal = '".$rowstockakhir["stock_akhir"]."' where kode_barang = '".$kode_stockbrg."'";
				mysqli_query($koneksi, $sqlupdatestockawal);

				// jumlahkan lagi stok masuk baru dan stok awal baru
				$getstokawalmasukbaru = mysqli_query($koneksi, "select stock_awal, stock_masuk from stock_barang where kode_barang = '".$kode_stockbrg."'");
				$rowstockawalmasuk = mysqli_fetch_array($getstokawalmasukbaru);

				$stockakhirbaru = $rowstockawalmasuk["stock_awal"] + $rowstockawalmasuk["stock_masuk"];
				mysqli_query($koneksi, "update stock_barang set stock_akhir = '".$stockakhirbaru."' where kode_barang = '".$kode_stockbrg."'");

				// mysqli_query($koneksi, "delete from tempstock_barangkry where kode_brg = '".$kode_stockbrg."'");
				 // and id_kry = '".$ambiljenisbarang["id_kry"]

				echo '<div class="alert alert-success">Stock Barang Sudah Diperbarui</div>';

				include_once "stock_barang/data_stock_barang.php";
			}else{
				$hitungcetakbaranglain = mysqli_query($koneksi, "select sum(qty_brg) as total_cetaklain from tempstock_barangkry where kode_brg = '".$kode_stockbrg."'");
				$datacetakbaranglain = mysqli_fetch_array($hitungcetakbaranglain);

				mysqli_query($koneksi, "update stock_barang set stock_masuk = '".$datacetakbaranglain["total_cetaklain"]."' where kode_barang = '".$kode_stockbrg."'");

				// ambil stock akhir dari stock barang
				$getstockakhir = mysqli_query($koneksi, "select stock_akhir from stock_barang where kode_barang = '".$kode_stockbrg."'");
				$rowstockakhir = mysqli_fetch_array($getstockakhir);

				// update stock awal di stock barang
				$sqlupdatestockawal = "update stock_barang set stock_awal = '".$rowstockakhir["stock_akhir"]."' where kode_barang = '".$kode_stockbrg."'";
				mysqli_query($koneksi, $sqlupdatestockawal);

				// jumlahkan lagi stok masuk baru dan stok awal baru
				$getstokawalmasukbaru = mysqli_query($koneksi, "select stock_awal, stock_masuk from stock_barang where kode_barang = '".$kode_stockbrg."'");
				$rowstockawalmasuk = mysqli_fetch_array($getstokawalmasukbaru);

				$stockakhirbaru = $rowstockawalmasuk["stock_awal"] + $rowstockawalmasuk["stock_masuk"];
				mysqli_query($koneksi, "update stock_barang set stock_akhir = '".$stockakhirbaru."' where kode_barang = '".$kode_stockbrg."'");

				mysqli_query($koneksi, "delete from tempstock_barangkry where kode_brg = '".$kode_stockbrg."'");
				 // and id_kry = '".$ambiljenisbarang["id_kry"]

				echo '<div class="alert alert-success">Stock Barang Sudah Diperbarui</div>';

				include_once "stock_barang/data_stock_barang.php";
			}
		}else{
			echo '<div class="alert alert-danger">'.$namastock_barang.' Belum Diproduksi!</div>';

			include_once "stock_barang/data_stock_barang.php";
		}
	}
?>