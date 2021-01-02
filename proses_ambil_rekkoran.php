<table class="table table-bordered">
	<thead>
		<tr>
			<th>No</th>
			<th>Tanggal</th>
			<th>Keterangan</th>
			<th>Mutasi</th>
			<th>Kredit/Debit</th>
		</tr>
	</thead>
	<tbody>
		<?php
			include_once "koneksi.php";

			$tgl_awal = $_POST["tgl_awal"];
			$tgl_akhir = $_POST["tgl_akhir"];

			if(!empty($tgl_awal) && !empty($tgl_akhir)){
				$newtglawal = date("Y-m-d", strtotime($tgl_awal));
				$newtglakhir = date("Y-m-d", strtotime($tgl_akhir));

				$sqlgetrekkoran = "select * from rekening_koran where tanggal between '".$newtglawal."' and '".$newtglakhir."'";
				$aksigetrekkoran = mysqli_query($koneksi, $sqlgetrekkoran);
				$countrekkoran = mysqli_num_rows($aksigetrekkoran);

				if($countrekkoran >= 1){
					$nomor = 1;
					while($rowrekkoran = mysqli_fetch_array($aksigetrekkoran)){
		?>
						<tr>
							<td><?php echo $nomor; ?></td>
							<td><?php echo $rowrekkoran["tanggal"] ?></td>
							<td><?php echo $rowrekkoran["keterangan"] ?></td>
							<td><?php echo "Rp ".number_format($rowrekkoran["mutasi"],1,",",".") ?></td>
							<td><?php echo $rowrekkoran["kreditdebit"] ?></td>
						</tr>

		<?php
						$nomor ++;
					}
				}else{
					echo '<div class="alert alert-warning">Tidak Ada Data Rekening Koran</div>'; 
				}
			}else{
				echo '<div class="alert alert-warning">Tanggal Masih Kosong</div>';
			}
		?>
	</tbody>
</table>

<form action="<?php echo $url; ?>" method="post" target="_blank">
	<input type="hidden" name="menu" value="buatlaporanrekkoran">
	<input type="hidden" name="tgl_awal" value="<?php echo $tgl_awal; ?>">
	<input type="hidden" name="tgl_akhir" value="<?php echo $tgl_akhir; ?>">

	<button type="submit" class="btn btn-primary">Cetak Laporan</button>
</form>