<?php
	include_once "koneksi.php";

	$notrbayar = $_POST["notrbayar"];

	$sqlgetnotrbayar = "select * from detail_order_pembeli inner join order_pembeli on detail_order_pembeli.no_transaksi = order_pembeli.no_transaksi where detail_order_pembeli.no_transaksi = '".$notrbayar."' or order_pembeli.nama_pembeli = '".$notrbayar."'";
	$aksinotrbayar = mysqli_query($koneksi, $sqlgetnotrbayar);
	$hitungdata = mysqli_num_rows($aksinotrbayar);

	$sqlhitungjmldibeli = mysqli_query($koneksi, "select sum(total_hrg) as total_seluruh from detail_order_pembeli where no_transaksi = '".$notrbayar."'");
	$rowtotalharga = mysqli_fetch_array($sqlhitungjmldibeli);

	if($hitungdata == 0){
		echo "Tidak Ada Data";
	}else{
		while($rownotrbayar = mysqli_fetch_array($aksinotrbayar)){
?>
		<tr>
	        <td><?php echo $rownotrbayar["no_transaksi"]; ?></td>
	        <td><?php echo $rownotrbayar["kode_barang"]; ?></td>
	        <td><?php echo $rownotrbayar["nama_barang"]; ?></td>
	        <td><?php echo $rownotrbayar["hrg_barang"]; ?></td>
	        <td><?php echo $rownotrbayar["jumlah_beli"]; ?></td>
	        <td><?php echo $rownotrbayar["satuan_brg"]; ?></td>
	        <td><?php echo $rownotrbayar["total_hrg"]; ?></td>
	        <td><?php echo $rownotrbayar["sumber_brg"]; ?></td>
	    </tr>

<?php
		}
?>
		<tr>
			<td colspan="6">Total Harus Dibayar</td>
			<td colspan="2"><?php echo $rowtotalharga["total_seluruh"]; ?></td>
		</tr>
<?php
	}
?>