<div class="card">
	<div class="card-header"><i class="fas fa-list"></i> Data Histori Surat Jalan</div>
	<div class="card-body">
		<div class="table-responsive">
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
				<tbody>
					<?php
						$sqlgetsuratjalan = "select * from surat_jalan inner join order_pembeli on surat_jalan.no_transaksi = order_pembeli.no_transaksi where order_pembeli.selesai = 'Selesai' order by surat_jalan.id_surat_jalan desc";
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
								<td align="center">
									<form action="<?php echo $url; ?>" method="post" target="_blank">
										<input type="hidden" name="menu" value="lihatsuratjalan">
										<input type="hidden" name="suratjalan_tr" value="<?php echo $rowsuratjalan["no_transaksi"]; ?>">
										<button class="btn btn-info" type="submit"><i class="fas fa-eye"></i></button>
									</form>
								</td>
								<td align="center">
									<button class="btn btn-default" ><i class="fas fa-check"></i></button>
								</td>
								<td align="center">
									<button class="btn btn-default" ><i class="fas fa-check"></i></button>
								</td>
								<td align="center">
									<!-- <i class="fas fa-check-square"></i> -->
									<form action="<?php echo $url; ?>" method="post">
										<input type="hidden" name="menu" value="feedback">
										<input type="hidden" name="id_surat" value="<?php echo $rowsuratjalan["id_surat_jalan"]; ?>">
										<input type="hidden" name="no_trsurat" value="<?php echo $rowsuratjalan["no_transaksi"]; ?>">
										<button title="Klik Untuk Melihat Data Feedback" type="submit" class="btn btn-success"><i class="fas fa-check"></i></button>
									</form>
								</td>
								<td align="center">
									<button class="btn btn-default"><i class="fas fa-check"></i></button>
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