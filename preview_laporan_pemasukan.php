<?php
	include_once "koneksi.php";

	$tgl_awal = date("Y-m-d", strtotime($_POST["tgl_awal"]));
	$tgl_akhir = date("Y-m-d", strtotime($_POST["tgl_akhir"]));

	$sqlgetdatabetweendate = "select * from pembayaran inner join order_pembeli on pembayaran.no_transaksi = order_pembeli.no_transaksi where pembayaran.tgl_bayar between '".$tgl_awal."' and '".$tgl_akhir."'";
	$aksigetalaporan = mysqli_query($koneksi, $sqlgetdatabetweendate);
	$countlaporan = mysqli_num_rows($aksigetalaporan);
?>

	<table class="table table-bordered">
		<thead>
			<tr>
				<th>No</th>
				<th>Tanggal</th>
				<th>No Transaksi</th>
				<th>Nama Pembeli</th>
				<th>DP Masuk</th>
				<th>Cash Masuk</th>
				<th>Hapus</th>
			</tr>
		</thead>
		<tbody>
			<?php
				if($countlaporan == 0){
			?>	
					<tr>
						<td colspan="6">Tidak Ada Data</td>
					</tr>
			<?php
				}else{
					$nomor = 1;
					while($rowdatalaporan = mysqli_fetch_array($aksigetalaporan)){
			?>
						<tr>
							<td><?php echo $nomor; ?></td>
							<td><?php echo date("d M Y", strtotime($rowdatalaporan["tgl_bayar"])); ?></td>
							<td><?php echo $rowdatalaporan["no_transaksi"]; ?></td>
							<td><?php echo $rowdatalaporan["nama_pembeli"]; ?></td>
							<td><?php echo "Rp ".number_format($rowdatalaporan["nominal_dp"],0,",","."); ?></td>
							<td><?php echo "Rp ". number_format($rowdatalaporan["nominal_cash"],0,",","."); ?></td>
							<td>
								<form action="<?php echo $url; ?>" method="post">
									<input type="hidden" name="menu" value="hapuspemasukan">
									<input type="hidden" name="idbayar" value="<?php echo $rowdatalaporan["id_pembayaran"]; ?>">
									<button class="btn btn-danger" type="submit">Hapus</button>
								</form>
							</td>
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
				<input type="hidden" name="menu" value="buatlaporanpemasukan">
				<input type="hidden" name="tgl_awal" value="<?php echo $tgl_awal; ?>">
				<input type="hidden" name="tgl_akhir" value="<?php echo $tgl_akhir; ?>">
				<button type="submit" class="btn btn-success">Buat Laporan</button>
			</form>
		</div>
	</div>