<?php
	include_once "koneksi.php";

	if(isset($_POST["tambahlagibarang"])){
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

			$sqlgettemp = "insert into detail_order_pembeli(no_transaksi,kode_barang,nama_barang,warna_brg,hrg_barang,jumlah_beli,satuan_brg,total_hrg,sumber_brg) values('".$no_transaksi."','".$kode_barang."','".$nama_barang."','".$warna_brg."','".$hrg_barang."','".$jumlah_beli."','".$satuan."','".$total_hrg."','".$sumber_brg."')";

			mysqli_query($koneksi, $sqlgettemp);

			$sqlhitungjmldibeli = mysqli_query($koneksi, "select sum(total_hrg) as total_seluruh from detail_order_pembeli where no_transaksi = '".$no_transaksi."'");
			$rowtotalharga = mysqli_fetch_array($sqlhitungjmldibeli);

			$totalharusbayar = $rowtotalharga["total_seluruh"];

			mysqli_query($koneksi, "update total_bayar_pembeli set total_bayar = '".$totalharusbayar."' where no_transaksi = '".$no_transaksi."'");
		}else{

			if ($jenis_brg == "Paving") {
				$getqtymeter = mysqli_query($koneksi, "select qtymeter from setting_cetakpaving where kode_barang = '".$kode_barang."'");
				$rowqtymeter = mysqli_fetch_array($getqtymeter);

				$totalbeli = $jumlah_beli * $rowqtymeter["qtymeter"];
				$totalhargabeli = $jumlah_beli * $hrg_barang;

				$sqladdtemp = "insert into detail_order_pembeli(no_transaksi,kode_barang,nama_barang,warna_brg,hrg_barang,jumlah_beli,satuan_brg,total_hrg,sumber_brg) values('".$no_transaksi."','".$kode_barang."','".$nama_barang."','".$warna_brg."','".$hrg_barang."','".$jumlah_beli."','".$satuan."','".$totalhargabeli."','".$sumber_brg."')";

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
				

				$sqladdtemp = "insert into detail_order_pembeli(no_transaksi,kode_barang,nama_barang,warna_brg,hrg_barang,jumlah_beli,satuan_brg,total_hrg,sumber_brg) values('".$no_transaksi."','".$kode_barang."','".$nama_barang."','".$warna_brg."','".$hrg_barang."','".$jumlah_beli."','".$satuan."','".$total_hrg."','".$sumber_brg."')";

				mysqli_query($koneksi, $sqladdtemp);

				$ambilstockterjual = mysqli_query($koneksi, "select * from stock_terjual where tgl_terjual = '".date("Y-m-d")."' and kd_barang = '".$kode_barang."'");
				$rowstockterjual = mysqli_fetch_array($ambilstockterjual);

				$totalstok = $rowstokbarang["stock_akhir"];
				$sisastok = $totalstok - $jumlah_beli;
				$sisamodalstock = $sisastok * $rowstokbarang["harga"] ;

				// update kolom terjual stock barang
				$sqlupdatestockakhir = "update stock_barang set stock_akhir = '".$sisastok."', modal_stock = '".$sisamodalstock."' where kode_barang = '".$kode_barang."'";

				mysqli_query($koneksi, $sqlupdatestockakhir);

				mysqli_query($koneksi, "insert into stock_terjual values('','".date("Y-m-d")."','".$no_transaksi."','".$kode_barang."','".$jumlah_beli."')");
			}

			$sqlhitungjmldibeli = mysqli_query($koneksi, "select sum(total_hrg) as total_seluruh from detail_order_pembeli where no_transaksi = '".$no_transaksi."'");
			$rowtotalharga = mysqli_fetch_array($sqlhitungjmldibeli);

			$totalharusbayar = $rowtotalharga["total_seluruh"];

			mysqli_query($koneksi, "update total_bayar_pembeli set total_bayar = '".$totalharusbayar."' where no_transaksi = '".$no_transaksi."'");
			

			
		}
		

		$sqlgetbrg = mysqli_query($koneksi, "select * from detail_order_pembeli where no_transaksi = '".$no_transaksi."' order by id_detail_order desc limit 1");

		$count_barang = mysqli_num_rows($sqlgetbrg);
		$row = mysqli_fetch_array($sqlgetbrg);

		for($i = 1; $i <= $count_barang; $i++){
?>
				
				<tr>
					<td><?php echo $i; ?></td>
			        <td><?php echo $row["no_transaksi"]; ?></td>
			        <td><?php echo $row["kode_barang"]; ?></td>
			        <td><?php echo $row["nama_barang"]; ?></td>
			        <td><?php echo "Rp ". number_format($row["hrg_barang"],1,",","."); ?></td>
			        <td><?php echo $row["jumlah_beli"]; ?></td>
			        <td><?php echo $row["satuan_brg"]; ?></td>
			        <td><?php echo "Rp ". number_format($row["total_hrg"],1,",","."); ?></td>
			        <td><?php echo $row["sumber_brg"]; ?></td>
			        <td>
                              <form method="post" action="<?php echo $url; ?>">
                                <input type="hidden" name="id_detail" value="<?php echo $row["id_detail_order"]; ?>">
                                <input type="hidden" name="menu" value="edit_detailbrg">
                                <button type="submit" class="btn btn-success"><i class="fas fa-edit"></i></button>
                              </form>
                            </td>
                            <td>
                              <form action="" method="post">
                                <input type="hidden" id="id_detail" name="id_detail" value="<?php echo $row["id_detail_order"]; ?>">
                                <input type="hidden" id="hapus_kode_barang" name="hapus_kode_barang" value="<?php echo $row["kode_barang"]; ?>"> 
                                <input type="hidden" name="menu" value="hapus_detailbrg">
                                <button id="hapus_detailbrg" type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                              </form>
                            </td>
			    </tr>
<?php
			}
	}
?>