<?php
	if(isset($_POST["tr_order"])){
		$tr_order = $_POST["tr_order"];

		// mengambil jumlah beli dari detail pembelian dan mengembalikannya ke stock barang
		$getdetailbeli = mysqli_query($koneksi, "select * from detail_order_pembeli where no_transaksi = '".$tr_order."'");
		
		
		while($rowdetailbeli = mysqli_fetch_array($getdetailbeli)){
			// ambil jenis barang yang dibeli dari stock barang
			$getjenisbarang = mysqli_query($koneksi, "select * from stock_barang where kode_barang = '".$rowdetailbeli["kode_barang"]."'");
			$rowjenisbarang = mysqli_fetch_array($getjenisbarang);

			if($rowjenisbarang["jenis_brg"] == "Paving"){
				// ambil setting qty paving
				$getsettingpaving = mysqli_query($koneksi, "select * from setting_cetakpaving where kode_barang = '".$rowdetailbeli["kode_barang"]."'");
				$rowsettingpaving = mysqli_fetch_array($getsettingpaving);

				// ambil stock akhir terkini dari stock barang
				$getstockbarang = mysqli_query($koneksi, "select * from stock_barang where kode_barang = '".$rowdetailbeli["kode_barang"]."'");
				$rowstockbarang = mysqli_fetch_array($getstockbarang);

				// kalikan jumlah yang dibeli dengan qty per meter dan kembalikan ke stock barang
				$totalbelikembali = $rowdetailbeli["jumlah_beli"] * $rowsettingpaving["qtymeter"];
				$stockakhirkembali = $rowstockbarang["stock_akhir"] + $totalbelikembali;
				$modalstockkembali = $totalbelikembali * $rowstockbarang["harga"];

				// update kolom stock akhir di stock barang
				mysqli_query($koneksi, "update stock_barang set stock_akhir = '".$stockakhirkembali."', modal_stock = '".$modalstockkembali."' where kode_barang = '".$rowdetailbeli["kode_barang"]."'");
				mysqli_query($koneksi, "delete from stock_terjual where kd_barang = '".$rowdetailbeli["kode_barang"]."' and no_transaksi = '".$tr_order."'");
				mysqli_query($koneksi, "delete from detail_order_pembeli where kode_barang = '".$rowdetailbeli["kode_barang"]."' and no_transaksi = '".$tr_order."'");
			}else{
				// ambil stock akhir terkini dari stock barang
				$getstockbarang = mysqli_query($koneksi, "select * from stock_barang where kode_barang = '".$rowdetailbeli["kode_barang"]."'");
				$rowstockbarang = mysqli_fetch_array($getstockbarang);

				// kalikan jumlah yang dibeli dengan qty per meter dan kembalikan ke stock barang
				$stockakhirkembali = $rowstockbarang["stock_akhir"] + $rowdetailbeli["jumlah_beli"];
				$modalstockkembali = $rowdetailbeli["jumlah_beli"] * $rowstockbarang["harga"];

				// update kolom stock akhir di stock barang
				mysqli_query($koneksi, "update stock_barang set stock_akhir = '".$stockakhirkembali."', modal_stock = '".$modalstockkembali."' where kode_barang = '".$rowdetailbeli["kode_barang"]."'");
				mysqli_query($koneksi, "delete from stock_terjual where kd_barang = '".$rowdetailbeli["kode_barang"]."' and no_transaksi = '".$tr_order."'");
				mysqli_query($koneksi, "delete from detail_order_pembeli where kode_barang = '".$rowdetailbeli["kode_barang"]."' and no_transaksi = '".$tr_order."'");
			}
		}

		// ambil jenis pembayaran order dari order pembali
		$getjenisbayarorder = mysqli_query($koneksi, "select * from order_pembeli where no_transaksi = '".$tr_order."'");
		$rowjenisbayarorder = mysqli_fetch_array($getjenisbayarorder);

		// ambil dana kas bank
		$getkas = mysqli_query($koneksi, "select * from kas");
		$rowkas = mysqli_fetch_array($getkas);

		// ambil nominal pembayaran yang masuk ke kas bank dan kas besar dan kembalikan kas bank ke semula
		if($rowjenisbayarorder["pembayaran"] == "Tunai"){
			$getnominalcash = mysqli_query($koneksi, "select masuk_ke, sum(nominal_cash) as totalcash from pembayaran where no_transaksi = '".$tr_order."'");
			$rownominalcash = mysqli_fetch_array($getnominalcash);

			if($rownominalcash["masuk_ke"] == "Kas Bank"){
				$totalkasawal = $rowkas["kas_bank"] - $rownominalcash["totalcash"];
				mysqli_query($koneksi, "update kas set kas_bank = '".$totalkasawal."'");
			}else{
				$totalkasawal = $rowkas["kas_besar"] - $rownominalcash["totalcash"];
				mysqli_query($koneksi, "update kas set kas_besar = '".$totalkasawal."'");
			}

			
		}else{
			$getnominalcash = mysqli_query($koneksi, "select masuk_ke, sum(nominal_dp) + sum(nominal_cash) as totaltempo from pembayaran where no_transaksi = '".$tr_order."'");
			$rownominalcash = mysqli_fetch_array($getnominalcash);

			if($rownominalcash["masuk_ke"] == "Kas Bank"){
				$totalkasawal = $rowkas["kas_bank"] - $rownominalcash["totalcash"];
				mysqli_query($koneksi, "update kas set kas_bank = '".$totalkasawal."'");
			}else{
				$totalkasawal = $rowkas["kas_besar"] - $rownominalcash["totalcash"];
				mysqli_query($koneksi, "update kas set kas_besar = '".$totalkasawal."'");
			}
		}

		$gettglbayar = mysqli_query($koneksi, "select tgl_bayar from pembayaran where no_transaksi = '".$tr_order."' and masuk_ke = 'Kas Bank'");
		$rowtglbayar = mysqli_fetch_array($gettglbayar);

		mysqli_query($koneksi, "delete from rekening_koran where tanggal = '".$rowtglbayar["tgl_bayar"]."'");
		mysqli_query($koneksi, "delete from order_pembeli where no_transaksi = '".$tr_order."'");
		mysqli_query($koneksi, "delete from pembayaran where no_transaksi = '".$tr_order."'");
		mysqli_query($koneksi, "delete from total_bayar_pembeli where no_transaksi = '".$tr_order."'");		

		echo "<div class='alert alert-success'>Data Order Pembeli Sudah Dihapus</div>";

		include_once "order/data_order_pembeli.php";
	}
?>