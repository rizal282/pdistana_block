<div class="card">
	<div class="card-header"><i class="fas fa-list"></i> Data Surat Jalan</div>
	<div class="card-body">
		<div class="table-responsive">
			<div class="row">
				<div class="col-lg-12">
					<form action="<?php echo $url; ?>" method="post">
						<input type="hidden" name="menu" value="historisuratjalan">
						<button id="btn-histori" type="submit" class="btn btn-success"><i class="fas fa-eye"></i> Lihat Histori Surat Jalan</button>
					</form>
				</div>
			</div>

			<div id="filtersuratjalan" class="form-inline">
				<div class="form-group">
					<input class="form-control" type="text" name="tgl_awalsuratjalan" id="tgl_awalsuratjalan" placeholder="Masukkan Tanggal Awal">
				</div>
				<div class="form-group">
					<input class="form-control" type="text" name="tgl_akhirsuratjalan" id="tgl_akhirsuratjalan" placeholder="Masukkan Tanggal Akhir">
				</div>
			</div>
			<table id="tbl_suratjalan" class="table table-bordered" width="100%">
				<thead>
					<tr>
						<th>No</th>
						<th>No Surat</th>
						<th>Tujuan</th>
						<th>Wilayah</th>
						<th>Kepada</th>
						<th>Lihat</th>
						<th>Dibuat</th>
						<th>Dikirim</th>
						<th>Feedback</th>
						<th>Selesai</th>
					</tr>
				</thead>
				<tbody id="filterdatasuratjalan">
					<?php
						$sqlgetsuratjalan = "select * from surat_jalan inner join order_pembeli on surat_jalan.no_transaksi = order_pembeli.no_transaksi where order_pembeli.selesai = '' order by surat_jalan.id_surat_jalan desc";
						$aksigetsuratjalan = mysqli_query($koneksi, $sqlgetsuratjalan);

						$nomor = 1;
						while($rowsuratjalan = mysqli_fetch_array($aksigetsuratjalan)){
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
					?>
				</tbody>
			</table>
		</div>
	</div>
</div>