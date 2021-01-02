<?php
	include_once "koneksi.php";

	$no_trfeedback = $_POST["no_trfeedback"];
	$kode_brg = $_POST["nama_brg"];
	$qty_brg = $_POST["qty_brg"];
	$stn_brg = $_POST["stn_brg"];
	$sumber_brg = $_POST["sumber_brg"];
	$refund = $_POST["refund"];
	$formatuangrefund = explode(".", $_POST["uangrefund"]);
	$uangrefund = implode($formatuangrefund);
	$byr_refund = $_POST["byr_refund"];

	$sqlinputbarangrusak = "insert into barang_rusak values('','".$no_trfeedback."','".$kode_brg."','".$qty_brg."','".$stn_brg."','".$sumber_brg."','".$refund."','".$byr_refund."','".$uangrefund."')";

	mysqli_query($koneksi, $sqlinputbarangrusak);

	$getkasbesar = mysqli_query($koneksi, "select * from kas");
	$rowkasbesar = mysqli_fetch_array($getkasbesar);

	if($refund == "Refund Barang"){
			// $sisakasbank = $rowkasbesar["kas_bank"] - $uangrefund;
			// mysqli_query($koneksi, "update kas set kas_bank = '".$sisakasbank."'");
			// mysqli_query($koneksi, "insert into rekening_koran values('','".date("Y-m-d")."','Transfer Uang Refund Pembeli','".$uangrefund."','Debit')");
			// mysqli_query($koneksi, "insert into pengeluaran(tgl_pengeluaran,no_transaksi,nama_pengeluaran,jenis_pengeluaran,nominal) values('".date("Y-m-d")."','".$no_trfeedback."','Pembayaran Transfer Refund','Pembayaran Refund','".$uangrefund."')");

			// mysqli_query($koneksi, "insert into rekening_koran values('','".date("Y-m-d")."','Transfer Uang Refund Pembeli','".$uangrefund."','Debit')");
				// mysqli_query($koneksi, "insert into pengeluaran(tgl_pengeluaran,no_transaksi,nama_pengeluaran,jenis_pengeluaran,nominal) values('".date("Y-m-d")."','".$no_trfeedback."','Pembayaran Transfer Refund','Pembayaran Refund','".$uangrefund."')");

			// if(!empty($uangrefund)){
			// 	$danarefund = $uangrefund;
			// }else{
			// 	$danarefund = 0;
			// }

			// $sisakasbank = $rowkasbesar["kas_bank"] - $danarefund;
			// mysqli_query($koneksi, "update kas set kas_bank = '".$sisakasbank."'");
			// mysqli_query($koneksi, "insert into rekening_koran values('','".date("Y-m-d")."','Transfer Uang Refund Pembeli','".$uangrefund."','Debit')");
			// 	mysqli_query($koneksi, "insert into pengeluaran(tgl_pengeluaran,no_transaksi,nama_pengeluaran,jenis_pengeluaran,nominal) values('".date("Y-m-d")."','".$no_trfeedback."','Pembayaran Transfer Refund','Pembayaran Refund','".$uangrefund."')");

			if($sumber_brg == "Internal"){
				$sqlgetstok = "select * from stock_barang where kode_barang = '".$kode_brg."'";
				$aksigetstok = mysqli_query($koneksi, $sqlgetstok);
				$rowstokbarang = mysqli_fetch_array($aksigetstok);

				$ambilterjual = mysqli_query($koneksi, "select jml_terjual from stock_terjual where kd_barang = '".$kode_brg."' and tgl_terjual = '".date("Y-m-d")."' and no_transaksi = '".$no_trfeedback."'");
				$rowambilterjual = mysqli_fetch_array($ambilterjual);

				$totalstok = $rowstokbarang["stock_awal"] + $rowstokbarang["stock_masuk"];
				$totalterjual = $rowambilterjual["jml_terjual"] + $qty_brg;

				$sisastok = $totalstok - $totalterjual;

				// update kolom terjual stock barang
				$sqlupdateterjual = "update stock_barang set stock_akhir = '".$sisastok."' where kode_barang = '".$kode_brg."'";

				mysqli_query($koneksi, $sqlupdateterjual);
				mysqli_query($koneksi, "update stock_terjual set jml_terjual = '".$totalterjual."' where kd_barang = '".$kode_brg."' and tgl_terjual = '".date("Y-m-d")."' and no_transaksi = '".$no_trfeedback."'");
			}else{
				$ambilterjual = mysqli_query($koneksi, "select jml_terjual from stock_terjual where kd_barang = '".$kode_brg."' and tgl_terjual = '".date("Y-m-d")."' and no_transaksi = '".$no_trfeedback."'");
				$rowambilterjual = mysqli_fetch_array($ambilterjual);
				$totalterjual = $rowambilterjual["jml_terjual"] + $qty_brg;

				mysqli_query($koneksi, "update stock_terjual set jml_terjual = '".$totalterjual."' where kd_barang = '".$kode_brg."' and tgl_terjual = '".date("Y-m-d")."' and no_transaksi = '".$no_trfeedback."'");
			}
				
		}else{

			if($sumber_brg == "Internal"){
				$sqlgetstok = "select * from stock_barang where kode_barang = '".$kode_brg."'";
				$aksigetstok = mysqli_query($koneksi, $sqlgetstok);
				$rowstokbarang = mysqli_fetch_array($aksigetstok);

				$ambilterjual = mysqli_query($koneksi, "select jml_terjual from stock_terjual where kd_barang = '".$kode_brg."' and tgl_terjual = '".date("Y-m-d")."' and no_transaksi = '".$no_trfeedback."'");
				$rowambilterjual = mysqli_fetch_array($ambilterjual);

				$totalstok = $rowstokbarang["stock_awal"] + $rowstokbarang["stock_masuk"];
				$totalterjual = $rowambilterjual["jml_terjual"] + $qty_brg;

				$sisastok = $totalstok - $totalterjual;

				// update kolom terjual stock barang
				$sqlupdateterjual = "update stock_barang set stock_akhir = '".$sisastok."' where kode_barang = '".$kode_brg."'";

				mysqli_query($koneksi, $sqlupdateterjual);
				mysqli_query($koneksi, "update stock_terjual set jml_terjual = '".$totalterjual."' where kd_barang = '".$kode_brg."' and tgl_terjual = '".date("Y-m-d")."' and no_transaksi = '".$no_trfeedback."'");
			}else{
				$ambilterjual = mysqli_query($koneksi, "select jml_terjual from stock_terjual where kd_barang = '".$kode_brg."' and tgl_terjual = '".date("Y-m-d")."' and no_transaksi = '".$no_trfeedback."'");
				$rowambilterjual = mysqli_fetch_array($ambilterjual);
				$totalterjual = $rowambilterjual["jml_terjual"] + $qty_brg;

				mysqli_query($koneksi, "update stock_terjual set jml_terjual = '".$totalterjual."' where kd_barang = '".$kode_brg."' and tgl_terjual = '".date("Y-m-d")."' and no_transaksi = '".$no_trfeedback."'");
			}

			if($byr_refund == "Cash"){

				$sisakasbesar = $rowkasbesar["kas_besar"] - $uangrefund;
				$tambahkaskecil = $rowkasbesar["kas_kecil"] + $uangrefund;

				mysqli_query($koneksi, "update kas set kas_kecil = '".$tambahkaskecil."', kas_besar = '".$sisakasbesar."'");

				mysqli_query($koneksi, "insert into pengeluaran(tgl_pengeluaran,no_transaksi,nama_pengeluaran,jenis_pengeluaran,nominal) values('".date("Y-m-d")."','".$no_trfeedback."','Pembayaran Cash Refund','Pembayaran Refund','".$uangrefund."')");
			}else{
				if(!empty($uangrefund)){
					$danarefund = $uangrefund;
				}else{
					$danarefund = 0;
				}

				$sisakasbank = $rowkasbesar["kas_bank"] - $danarefund;
				mysqli_query($koneksi, "update kas set kas_bank = '".$sisakasbank."'");
				mysqli_query($koneksi, "insert into rekening_koran values('','".date("Y-m-d")."','Transfer Uang Refund Pembeli','".$uangrefund."','Debit')");
				mysqli_query($koneksi, "insert into pengeluaran(tgl_pengeluaran,no_transaksi,nama_pengeluaran,jenis_pengeluaran,nominal) values('".date("Y-m-d")."','".$no_trfeedback."','Pembayaran Transfer Refund','Pembayaran Refund','".$uangrefund."')");

			}

			// if(!empty($uangrefund)){
			// 	$danarefund = $uangrefund;
			// }else{
			// 	$danarefund = 0;
			// }

			// $sisakasbank = $rowkasbesar["kas_besar"] - $danarefund;
			// 	mysqli_query($koneksi, "update kas set kas_besar = '".$sisakasbank."'");
			// 	// mysqli_query($koneksi, "insert into rekening_koran values('','".date("Y-m-d")."','Transfer Uang Refund Pembeli','".$uangrefund."','Debit')");
			// 	mysqli_query($koneksi, "insert into pengeluaran(tgl_pengeluaran,no_transaksi,nama_pengeluaran,jenis_pengeluaran,nominal) values('".date("Y-m-d")."','".$no_trfeedback."','Pembayaran Transfer Refund','Pembayaran Refund','".$uangrefund."')");
		}


	// tampilkan data barang yang rusak
	$getbarangrusak = mysqli_query($koneksi, "select * from barang_rusak inner join stock_barang on barang_rusak.kode_brg = stock_barang.kode_barang where barang_rusak.no_transaksi = '".$no_trfeedback."'");

	

	// ambil total pembayaran
	$ambiltotalbayar = mysqli_query($koneksi, "select * from total_bayar_pembeli where no_transaksi = '".$no_trfeedback."'");
	$rowtotalbayar = mysqli_fetch_array($ambiltotalbayar);

	// if($rowtotalbayar["diskon"] == 0){
		// $sisatotalbayar = $rowtotalbayar["total_bayar"] - $uangrefund;

		// mysqli_query($koneksi, "update total_bayar_pembeli set total_bayar = '".$sisatotalbayar."' where no_transaksi = '".$no_trfeedback."'");
	// }else{
	if(!empty($uangrefund)){
		$totaluangrefund = $uangrefund;
	}else{
		$totaluangrefund = 0;
	}
		
		$sisatotalbaru = $rowtotalbayar["sisa_total"] - $totaluangrefund;
		mysqli_query($koneksi, "update total_bayar_pembeli set sisa_total = '".$sisatotalbaru."' where no_transaksi = '".$no_trfeedback."'");
	// }

	mysqli_query($koneksi, "insert into pengeluaran values('','".date("Y-m-d")."','','".$no_trfeedback."','Refund Barang Rusak','Uang Refund','".$uangrefund."')");
	
	$nomor = 1;
	while($rowbarangrusak = mysqli_fetch_array($getbarangrusak)){
?>
		<tr>
			<td><?php echo $nomor; ?></td>
			<td><?php echo $rowbarangrusak["no_transaksi"]; ?></td>
			<td><?php echo $rowbarangrusak["nama_barang"]; ?></td>
			<td><?php echo $rowbarangrusak["qty_barang"]; ?></td>
			<td><?php echo $rowbarangrusak["refund"]; ?></td>
			<td><?php echo "Rp ".number_format($rowbarangrusak["nominal_refund"],1,",","."); ?></td>
		</tr>
<?php
		$nomor ++;
	}

	// echo "Barang Rusak Sudah Ditambahkan";


?>