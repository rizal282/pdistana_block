<div class="card">
	<div class="card-header">Data Feedback</div>
	<div class="card-body">
		<?php
			if(isset($_POST["id_surat"])){
				$id_surat = $_POST["id_surat"];
				$no_trsurat = $_POST["no_trsurat"];

				// cek data pada tabel feedback sesuai no transaksi
				$sqlcekdatafeedback = "select * from feedback_brg where no_transaksi = '".$no_trsurat."'";
				$aksicekdatafeedback = mysqli_query($koneksi, $sqlcekdatafeedback);
				$countdatafeedback = mysqli_num_rows($aksicekdatafeedback);

				if($countdatafeedback == 0){
					include_once "dokumen/form_feedback.php";
				}else{
		?>
					<table class="table table-bordered" width="100%" cellspacing="0">
						<thead>
							<tr>
								<th>No</th>
								<th>No Transaksi</th>
								<th>Barang Rusak</th>
								<th>Nama Barang</th>
								<th>Qty Barang</th>
								<th>Sumber Barang</th>
								<th>Refund</th>
								<th>Nominal Refund</th>
								<th>Lihat Surat</th>
								<th>Edit</th>
								<th>Hapus</th>
							</tr>
						</thead>
						<tbody>
							<?php
								$sqlgetdatafeedback = "select * from feedback_brg inner join barang_rusak on feedback_brg.no_transaksi = barang_rusak.no_transaksi inner join stock_barang on barang_rusak.kode_brg = stock_barang.kode_barang where feedback_brg.no_transaksi = '".$no_trsurat."'";
								$aksigetfeedback = mysqli_query($koneksi, $sqlgetdatafeedback);

								$nomor = 1;
								while($rowdatafeedback = mysqli_fetch_array($aksigetfeedback)){
							?>
									<tr>
										<td><?php echo $nomor; ?></td>
										<td><?php echo $rowdatafeedback["no_transaksi"]; ?></td>
										<td><?php echo $rowdatafeedback["brg_rusak"]; ?></td>
										<td><?php echo $rowdatafeedback["nama_barang"]; ?></td>
										<td><?php echo $rowdatafeedback["qty_barang"]; ?></td>
										<td><?php echo $rowdatafeedback["sumber_brg"]; ?></td>
										<td><?php echo $rowdatafeedback["refund"]; ?></td>
										<td><?php echo "Rp ".number_format($rowdatafeedback["nominal_refund"],0,",","."); ?></td>
										<td>
											<?php
												// ambil no transaksi di surat jalan feedback
												$getdatasuratfeedback = mysqli_query($koneksi, "select * from surat_jalan_feedback where no_transaksi = '".$rowdatafeedback["no_transaksi"]."'");
												$countdata = mysqli_num_rows($getdatasuratfeedback);
												
												if($countdata == 0){
													echo "-";
												}else{
											?>
													<form action="<?php echo $url; ?>" method="post" target="_blank">
														<input type="hidden" name="menu" value="suratfeedback">
														<input type="hidden" name="id_surat" value="<?php echo $id_surat; ?>">
														<input type="hidden" name="suratjalan_tr" value="<?php echo $no_trsurat; ?>">
														<button type="submit" class="btn btn-success"><i class="fas fa-eye"></i></button>
													</form>
											<?php } ?>
										</td>
										<td>
											<form action="<?php echo $url; ?>" method="post">
												<input type="hidden" name="menu" value="editbarangrusak">
												<input type="hidden" name="id_brgrusak" value="<?php echo $rowdatafeedback["id_barangrusak"] ?>">
												<input type="hidden" name="id_trbrgrusak" value="<?php echo $rowdatafeedback["no_transaksi"]; ?>">
												<button type="submit" class="btn btn-warning"><i class="fas fa-edit"></i></button>
											</form>
										</td>
										<td>
											<form action="<?php echo $url; ?>" method="post">
												<input type="hidden" name="menu" value="hapusbarangrusak">
												<input type="hidden" name="id_brgrusak" value="<?php echo $rowdatafeedback["id_barangrusak"] ?>">
												<input type="hidden" name="id_trbrgrusak" value="<?php echo $rowdatafeedback["no_transaksi"]; ?>">
												<button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button>
											</form>
										</td>
									</tr>
							<?php
									$nomor ++;
								}
							?>
						</tbody>
					</table>

					<?php
						$cekdatasuratfeedback = mysqli_query($koneksi, "select no_transaksi from surat_jalan_feedback where no_transaksi = '".$no_trsurat."'");
						$countsuratfeddback = mysqli_num_rows($cekdatasuratfeedback);

						if($countsuratfeddback == 0){
							$cekrefund = "select refund from barang_rusak where no_transaksi = '".$no_trsurat."'";
							$ambiljenisrefund = mysqli_query($koneksi, $cekrefund);
							$rowrefund = mysqli_fetch_array($ambiljenisrefund);

							if($rowrefund["refund"] == "Refund Barang"){
					?>
							<div class="row">
								<div class="col-lg-12">
									<form action="<?php echo $url; ?>" method="post">
										<input type="hidden" name="menu" value="suratjalan">
										<input type="hidden" name="tr_barangrusak" value="<?php echo $no_trsurat; ?>">
										<input type="hidden" name="cekfeedback" value="feedback">
									</form>
									<button id="btn_suratjalanfeedback" class="btn btn-success" type="submit">Buat Surat Jalan</button>
								</div>
							</div>
					<?php
						}
					?>
						
						
						
						

		<?php
					}else{	
							echo '<div class="alert alert-info">Sudah Dibuat Surat Jalan</div>';
						}
				}
			}
		?>

		<div id="suratjalanfeedback">
			<?php include_once "dokumen/buatsurat_jalanfeedback.php"; ?>
		</div>
	</div>
</div>