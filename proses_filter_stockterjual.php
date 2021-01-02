<?php
	include_once "koneksi.php";

	$tglterjualawal = date("Y-m-d", strtotime($_POST["tglterjualawal"]));
	$tglterjualakhir = date("Y-m-d", strtotime($_POST["tglterjualakhir"]));

	$ambildataterjual = mysqli_query($koneksi, "select * from stock_terjual left join stock_barang on stock_terjual.kd_barang = stock_barang.kode_barang where stock_terjual.tgl_terjual between '".$tglterjualawal."' and '".$tglterjualakhir."'");

	$nomor = 1;
	while ($rowstockbarang = mysqli_fetch_array($ambildataterjual)) {
?>
		<tr>
			<td><?php echo $nomor; ?></td>
			<td><?php echo date("d M Y", strtotime($rowstockbarang["tgl_terjual"])); ?></td>
			<td><?php echo $rowstockbarang["kd_barang"]; ?></td>
			<td><?php echo $rowstockbarang["nama_barang"]; ?></td>
			<td><?php echo $rowstockbarang["jml_terjual"]; ?></td>
		</tr>
<?php
		$nomor ++;
	}
?>