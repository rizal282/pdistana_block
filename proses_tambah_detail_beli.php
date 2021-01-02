<?php
	include_once "koneksi.php";

	if(isset($_POST["nama_barang"])){
		$no_transaksi = $_POST["no_transaksi"];
		$kode_barang = $_POST["kode_barang"];
		$nama_barang = $_POST["nama_barang"];
		$jenis_brg = $_POST["jenis_brg"];
		$warna_brg = $_POST["warna_brg"];
		$harga_brg = explode(".",$_POST["hrg_barang"]);
		$hrg_barang = implode($harga_brg);
		$jumlah_beli = $_POST["jumlah_beli"];
		$satuan = $_POST["satuan"];
		// $sumber_brg = $_POST["sumber_brg"];
		// $total_hrg = $_POST["total_hrg"];

		$total_hrg = $hrg_barang * $jumlah_beli;
		$sumber_brg = $_POST["sumber_brg"];

		// kurangi stok barang
		$sqlgetstok = "select * from stock_barang where kode_barang = '".$kode_barang."'";
		$aksigetstok = mysqli_query($koneksi, $sqlgetstok);
		$rowstokbarang = mysqli_fetch_array($aksigetstok);

		if($sumber_brg == "Eksternal"){
			// $ambilstockterjual = mysqli_query($koneksi, "select * from stock_terjual where kd_barang = '".$kode_barang."' and tgl_terjual = '".date("Y-m-d")."'");
			// $rowjumlahterjual = mysqli_fetch_array($ambilstockterjual);

			// $totalterjualbaru = $rowjumlahterjual["jml_terjual"] + $jumlah_beli;

			// mysqli_query($koneksi, "insert into stock_terjual set jml_terjual = '".$totalterjualbaru."' where kd_barang = '".$kode_barang."' and tgl_terjual = '".date("Y-m-d")."'");
			// $sql = "insert into detail_order_pembeli(no_transaksi,kode_barang) values('".$no_transaksi."','".$kode_barang."')";

			mysqli_query($koneksi, "insert into stock_terjual values('','".date("Y-m-d")."','".$no_transaksi."','".$kode_barang."','".$jumlah_beli."')");

			$sqlgettemp = "insert into temp_order(no_transaksi,kode_barang,nama_barang,warna_brg,hrg_barang,jumlah_beli,satuan_brg,total_hrg,sumber_brg) values('".$no_transaksi."','".$kode_barang."','".$nama_barang."','".$warna_brg."','".$hrg_barang."','".$jumlah_beli."','".$satuan."','".$total_hrg."','".$sumber_brg."')";

			mysqli_query($koneksi, $sqlgettemp);
		}else{

			if ($jenis_brg == "Paving") {
				$getqtymeter = mysqli_query($koneksi, "select qtymeter from setting_cetakpaving where kode_barang = '".$kode_barang."'");
				$rowqtymeter = mysqli_fetch_array($getqtymeter);

				$totalbeli = $jumlah_beli * $rowqtymeter["qtymeter"];
				$totalhargabeli = $jumlah_beli * $hrg_barang;

				$sqladdtemp = "insert into temp_order(no_transaksi,kode_barang,nama_barang,warna_brg,hrg_barang,jumlah_beli,satuan_brg,total_hrg,sumber_brg) values('".$no_transaksi."','".$kode_barang."','".$nama_barang."','".$warna_brg."','".$hrg_barang."','".$jumlah_beli."','".$satuan."','".$totalhargabeli."','".$sumber_brg."')";

				mysqli_query($koneksi, $sqladdtemp);

				$ambilstockterjual = mysqli_query($koneksi, "select * from stock_terjual where tgl_terjual = '".date("Y-m-d")."' and kd_barang = '".$kode_barang."'");
				$rowstockterjual = mysqli_fetch_array($ambilstockterjual);

				$totalstok = $rowstokbarang["stock_akhir"];
				$sisastok = $totalstok - $totalbeli;
				$sisamodalstock = $sisastok * $rowstokbarang["harga"];

				// update kolom terjual stock barang
				$sqlupdatestockakhir = "update stock_barang set stock_akhir = '".$sisastok."', modal_stock = '".$sisamodalstock."' where kode_barang = '".$kode_barang."'";

				mysqli_query($koneksi, $sqlupdatestockakhir);

				mysqli_query($koneksi, "insert into stock_terjual values('','".date("Y-m-d")."','".$no_transaksi."','".$kode_barang."','".$totalbeli."')");
			} else {
				

				$sqladdtemp = "insert into temp_order(no_transaksi,kode_barang,nama_barang,warna_brg,hrg_barang,jumlah_beli,satuan_brg,total_hrg,sumber_brg) values('".$no_transaksi."','".$kode_barang."','".$nama_barang."','".$warna_brg."','".$hrg_barang."','".$jumlah_beli."','".$satuan."','".$total_hrg."','".$sumber_brg."')";

				mysqli_query($koneksi, $sqladdtemp);

				$ambilstockterjual = mysqli_query($koneksi, "select * from stock_terjual where tgl_terjual = '".date("Y-m-d")."' and kd_barang = '".$kode_barang."'");
				$rowstockterjual = mysqli_fetch_array($ambilstockterjual);

				$totalstok = $rowstokbarang["stock_akhir"];
				$sisastok = $totalstok - $jumlah_beli;
				$sisamodalstock = $sisastok * $rowstokbarang["harga"];

				// update kolom terjual stock barang
				$sqlupdatestockakhir = "update stock_barang set stock_akhir = '".$sisastok."', modal_stock = '".$sisamodalstock."' where kode_barang = '".$kode_barang."'";

				mysqli_query($koneksi, $sqlupdatestockakhir);

				mysqli_query($koneksi, "insert into stock_terjual values('','".date("Y-m-d")."','".$no_transaksi."','".$kode_barang."','".$jumlah_beli."')");
			}
			

			
		}

		$sqlgetbrg = mysqli_query($koneksi, "select * from temp_order where no_transaksi = '".$no_transaksi."' order by id_temp desc limit 1");

		$count_barang = mysqli_num_rows($sqlgetbrg);
		$row = mysqli_fetch_array($sqlgetbrg);
		for($i = 1; $i <= $count_barang; $i++){
?>

				<tr>
			        <td><?php echo $row["no_transaksi"]; ?></td>
			        <td><?php echo $row["kode_barang"]; ?></td>
			        <td><?php echo $row["nama_barang"]; ?></td>
			        <td><?php echo "Rp ". number_format($row["hrg_barang"],1,",","."); ?></td>
			        <td><?php echo $row["jumlah_beli"]; ?></td>
			        <td><?php echo $row["satuan_brg"]; ?></td>
			        <td><?php echo "Rp ". number_format($row["total_hrg"],1,",","."); ?></td>
			        <td><?php echo $row["sumber_brg"]; ?></td>
			    </tr>
<?php

		}
	}elseif(isset($_POST["jumlah_beli"])){
		$kode_barang = $_POST["kode_brg"];
		$jumlah_beli = $_POST["jumlah_beli"];

		$gettotalstockbarang = mysqli_query($koneksi, "select * from stock_barang where kode_barang = '".$kode_barang."'");
		$rowtotalstockbarang = mysqli_fetch_array($gettotalstockbarang);

		$totalstockbarang = $rowtotalstockbarang["stock_awal"] + $rowtotalstockbarang["stock_masuk"];

		if($jumlah_beli > $totalstockbarang){
			echo "<div class='alert alert-danger'>Stock Barang ".$rowtotalstockbarang["nama_barang"]." Kurang dari Jumlah Beli</div>";
		}else{
			echo "<div class='alert alert-success'>Stock Barang ".$rowtotalstockbarang["nama_barang"]." Masih Cukup dari Jumlah Beli</div>";
		}
	}
	//echo "Berhasil disimpan";
?>
