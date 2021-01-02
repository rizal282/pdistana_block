<?php
	include_once "koneksi.php";

	$tgl_awalkeuangan =date("Y-m-d", strtotime($_POST["tgl_awalkeuangan"]));
	$tgl_akhirkeuangan = date("Y-m-d", strtotime($_POST["tgl_akhirkeuangan"]));

	$sqldatapengeluaran = "select * from pengeluaran where tgl_pengeluaran between '".$tgl_awalkeuangan."' and '".$tgl_akhirkeuangan."'";
	$getdatapengeluaran = mysqli_query($koneksi, $sqldatapengeluaran);
	$countdatapengeluaran = mysqli_num_rows($getdatapengeluaran);
?>

<table class="table table-bordered">
	<thead>
		<tr>
			<th>No</th>
			<th>Tanggal</th>
			<th>No Transaksi</th>
			<th>Nama Pengeluaran</th>
			<th>Jenis Pengeluaran</th>
			<th>Nominal</th>
		</tr>
	</thead>
	<tbody>
		<?php
			if($countdatapengeluaran == 0){
		?>
				<tr>
					<td colspan="6">Tidak Ada Data</td>
				</tr>
		<?php
			}else{
				$nomor = 1;
				while($rowdatapengeluaran = mysqli_fetch_array($getdatapengeluaran)){
		?>
					<tr>
						<td><?php echo $nomor; ?></td>
						<td><?php echo date("d M Y", strtotime($rowdatapengeluaran["tgl_pengeluaran"])); ?></td>
						<td><?php echo $rowdatapengeluaran["no_transaksi"]; ?></td>
						<td><?php echo $rowdatapengeluaran["nama_pengeluaran"]; ?></td>
						<td><?php echo $rowdatapengeluaran["jenis_pengeluaran"]; ?></td>
						<td><?php echo "Rp ". number_format($rowdatapengeluaran["nominal"],1,",","."); ?></td>
					</tr>
		<?php
					$nomor ++;
				}
			}
		?>
	</tbody>
</table>

<div class="row">
	<div class="col-lg-12">
		<form action="<?php echo $url; ?>" method="post" target="_blank">
			<input type="hidden" name="menu" value="buatlaporanpengeluarankeuangan">
			<input type="hidden" name="tgl_awal" value="<?php echo $tgl_awalkeuangan; ?>">
			<input type="hidden" name="tgl_akhir" value="<?php echo $tgl_akhirkeuangan; ?>">
			<button type="submit" class="btn btn-success">Buat Laporan</button>
		</form>
	</div>
</div>