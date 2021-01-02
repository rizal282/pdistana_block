<div id="rekening_koran" class="card">
	<div class="card-header"><i class="fas fa-list"></i> Data Rekening Koran</div>
	<div class="card-body">
		<div class="row">
			<div class="col-lg-6">
				<div id="sortingrekkoran" class="form-inline">
					<div class="form-group">
						<input type="text" name="tglawalfilterrekkoran" id="tglawalfilterrekkoran" class="form-control" placeholder="Masukkan Tanggal Awal">
					</div>
					<div class="form-group">
						<input type="text" name="tglakhirfilterrekkoran" id="tglakhirfilterrekkoran" class="form-control" placeholder="Masukkan Tanggal Akhir">
					</div>
				</div>
			</div>
		</div>
		<table class="table table-bordered" id="tbl_kasbank">
			<thead>
				<tr>
					<th>No</th>
					<th>Tanggal</th>
					<th>Keterangan</th>
					<th>Mutasi</th>
					<th>Kredit/Debit</th>
					<th>Edit</th>
					<th>Hapus</th>
				</tr>
			</thead>
			<tbody id="datafilterrekkoran">
				<?php
					$sqlgetrekeningkoran = "select * from rekening_koran order by id_rekeningkoran desc";
					$aksigetrekeningkoran = mysqli_query($koneksi, $sqlgetrekeningkoran);

					$nomor = 1;
					while($rowrekeningkoran = mysqli_fetch_array($aksigetrekeningkoran)){
				?>
						<tr>
							<td><?php echo $nomor; ?></td>
							<td><?php echo date("d M Y", strtotime($rowrekeningkoran["tanggal"])); ?></td>
							<td><?php echo $rowrekeningkoran["keterangan"]; ?></td>
							<td>Rp <?php echo number_format($rowrekeningkoran["mutasi"],1,",","."); ?></td>
							<td><?php echo $rowrekeningkoran["kreditdebit"]; ?></td>
							<td>
								<form action="<?php echo $url; ?>" method="post">
									<input type="hidden" name="menu" value="editrekkoran">
									<input type="hidden" name="idrekkoran" value="<?php echo $rowrekeningkoran["id_rekeningkoran"]; ?>">
									<button type="submit" class="btn btn-warning"><i class="fas fa-edit"></i></button>
								</form>
							</td>
							<td>
								<form action="<?php echo $url; ?>" method="post">
									<input type="hidden" name="menu" value="hapusrekkoran">
									<input type="hidden" name="idrekkoran" value="<?php echo $rowrekeningkoran["id_rekeningkoran"]; ?>">
									<input type="hidden" name="jenisrekkoran" value="<?php echo $rowrekeningkoran["kreditdebit"]; ?>">
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

		<form action="<?php echo $url; ?>" method="post">
			<input type="hidden" name="menu" value="cetakrekkoran">
			<button type="submit" class="btn btn-primary"><i class="fas fa-print"></i> Cetak Rek. Koran</button>
		</form>
	</div>
</div>
