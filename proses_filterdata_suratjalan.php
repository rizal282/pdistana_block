<?php
	include_once "koneksi.php";

	$tgl_awalsuratjalan = date("Y-m-d", strtotime($_POST["tgl_awalsuratjalan"]));
	$tgl_akhirsuratjalan = date("Y-m-d", strtotime($_POST["tgl_akhirsuratjalan"]));

	$getdatasuratjalan = mysqli_query($koneksi, "select * from surat_jalan inner join order_pembeli on surat_jalan.no_transaksi = order_pembeli.no_transaksi inner join wilayah on surat_jalan.id_wilayah = wilayah.id_wilayah where surat_jalan.tgl_dibuat between '".$tgl_awalsuratjalan."' and '".$tgl_akhirsuratjalan."'");
	$countsuratjalan = mysqli_num_rows($getdatasuratjalan);

	if($countsuratjalan == 0){
		echo '<tr>
			<td colspan="10">Tidak Ada Data</td>
		</tr>';
	}else{
		$nomor = 1;
		while($rowsuratjalan = mysqli_fetch_array($getdatasuratjalan)){
?>
			<tr>
				<td><?php echo $nomor; ?></td>
				<td><?php echo $rowsuratjalan["no_surat_jalan"]; ?></td>
				<td><?php echo $rowsuratjalan["alamat_pembeli"]; ?></td>
				<td><?php echo $rowsuratjalan["wilayah"]; ?></td>
				<td><?php echo $rowsuratjalan["nama_pembeli"]; ?></td>
				<td>
					<form action="<?php echo $url; ?>" method="post" target="_blank">
						<input type="hidden" name="menu" value="lihatsuratjalan">
						<input type="hidden" name="suratjalan_tr" value="<?php echo $rowsuratjalan["no_transaksi"]; ?>">
						<button class="btn btn-info" type="submit"><i class="fas fa-eye"></i></button>
					</form>
				</td>
				<td>
					<button class="btn btn-default" ><i class="fas fa-check"></i></button>
					<!--
					<?php
						if($rowsuratjalan["sts_suratjalan"] == "Sudah"){
					?>	
							<form action="<?php echo $url; ?>" method="post">
								<input type="hidden" name="menu" value="dibuat">
								<input type="hidden" name="id_surat" value="<?php echo $rowsuratjalan["id_surat_jalan"]; ?>">
								<button type="submit" class="btn btn-success"><i class="fas fa-plus-square"></i></button>
							</form>
					<?php
						}else{
					?>
							<form action="<?php echo $url; ?>" method="post">
								<input type="hidden" name="menu" value="dibuat">
								<button type="submit" class="btn btn-success" disabled><i class="fas fa-plus-square"></i></button>
							</form>
					<?php
						}
					?>
					-->
				</td>
				<td align="center">
					<?php
						if($rowsuratjalan["sts_kirim"] == ""){
					?>
							<form action="<?php echo $url; ?>" method="post">
								<input type="hidden" name="menu" value="dikirim">
								<input type="hidden" name="id_surat" value="<?php echo $rowsuratjalan["id_order"]; ?>">
								<button title="Klik Jika Barang Sudah Dikirim" type="submit" class="btn btn-success"><i class="fas fa-mail-bulk"></i></button>
							</form>
					<?php
						}else{
					?>
							<button class="btn btn-default" ><i class="fas fa-check"></i></button>
							<!-- <form action="<?php echo $url; ?>" method="post">
								<input type="hidden" name="menu" value="dibuat">
								<button type="submit" class="btn btn-success" disabled><i class="fas fa-mail-bulk"></i></button>
							</form> -->
					<?php
						}
					?>
				</td>
				<td>
					<?php
						if($rowsuratjalan["feedback"] == ""){
							if($rowsuratjalan["sts_kirim"] == "Dikirim"){
					?>
								<form action="<?php echo $url; ?>" method="post">
									<input type="hidden" name="menu" value="feedback">
									<input type="hidden" name="id_surat" value="<?php echo $rowsuratjalan["id_surat_jalan"]; ?>">
									<input type="hidden" name="no_trsurat" value="<?php echo $rowsuratjalan["no_transaksi"]; ?>">
									<button type="submit" class="btn btn-success"><i class="fas fa-comment-dots"></i></button>
								</form>
					<?php
							}
						}else{
					?>
							<button class="btn btn-default" ><i class="fas fa-check"></i></button>
					<?php
						}
					?>
				</td>
				<td>
					<?php
						$sqlcekfeedback = "select * from feedback_brg where no_transaksi = '".$rowsuratjalan["no_transaksi"]."'";
						$aksicekfeedback = mysqli_query($koneksi, $sqlcekfeedback);
						$countcekfeedback = mysqli_num_rows($aksicekfeedback);

						if($countcekfeedback == 0){
					?>
							<!-- <button class="btn btn-danger" disabled><i class="fas fa-check-square"></i></button> -->

					<?php
						}else{
							if($rowsuratjalan["feedback"] == "Feedback"){
					?>
								<form action="<?php echo $url; ?>" method="post">
									<input type="hidden" name="menu" value="selesai">
									<input type="hidden" name="id_surat" value="<?php echo $rowsuratjalan["id_surat_jalan"]; ?>">
									<input type="hidden" name="no_trsurat" value="<?php echo $rowsuratjalan["no_transaksi"]; ?>">
									<button title="Klik Jika Surat Jalan Sudah Ada Feedback" type="submit" class="btn btn-success"><i class="fas fa-check-square"></i></button>
								</form>
					<?php
							}else{
					?>
								<!-- <button class="btn btn-danger"><i class="fas fa-check-square"></i></button> -->
					<?php
							}
						}
					?>
					
				</td>
			</tr>

<?php
			$nomor ++;
		}
	}
?>