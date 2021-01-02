<div class="card">
	<div class="card-header">Data Pengeluaran Harian</div>
	<div class="card-body">
		<div class="row">
			<div class="col-lg-6">
				<div id="sortingpengeluaranharian" class="form-inline">
					<div class="form-group">
						<input type="text" name="tglawalfilterpengeluaranharian" id="tglawalfilterpengeluaranharian" class="form-control" placeholder="Masukkan Tanggal Awal">
					</div>
					<div class="form-group">
						<input type="text" name="tglakhirfilterpengeluaranharian" id="tglakhirfilterpengeluaranharian" class="form-control" placeholder="Masukkan Tanggal Akhir">
					</div>
				</div>
			</div>
			<div class="col-lg-6 alignpengeluaranharian">
				<form action="<?php echo $url; ?>" method="post">
					<input type="hidden" name="menu" value="tambahpengeluaranharian">
					<button class="btn btn-primary" type="submit"><i class="fas fa-plus"></i> Tambah Pengeluaran Harian</button>
				</form>
			</div>
		</div>

		<table id="pengeluaran_harian" class="table table-bordered" width="100%" cellspacing="0">
			<thead>
				<tr>
					<th>No</th>
					<th>Tanggal</th>
					<th>Nama Beban</th>
					<th>Nominal</th>
					<th>No Referensi</th>
					<th>Keterangan</th>
					<th>Edit</th>
					<th>Hapus</th>
				</tr>
			</thead>
			<tbody id="datafilterpengeluaranharian">
				<?php
					$sqlgetpengeluaranharian = "select * from pengeluaran where tgl_pengeluaran = '".date("Y-m-d")."' and jenis_pengeluaran = 'Pengeluaran Harian' order by id_pengeluaran desc";
					$aksigetpengeluaranharian = mysqli_query($koneksi, $sqlgetpengeluaranharian);

					$nomor = 1;
					while($rowpengeluaranharian = mysqli_fetch_array($aksigetpengeluaranharian)){
				?>
						<tr>
							<td><?php echo $nomor; ?></td>
							<td><?php echo date("d M Y", strtotime($rowpengeluaranharian["tgl_pengeluaran"])); ?></td>
							<td><?php echo $rowpengeluaranharian["nama_pengeluaran"]; ?></td>
							<td><?php echo "Rp ". number_format($rowpengeluaranharian["nominal"],1,",","."); ?></td>
							<td><?php echo $rowpengeluaranharian["noreferensi"]; ?></td>
							<td><?php echo $rowpengeluaranharian["jenis_pengeluaran"]; ?></td>
							<td>
								<form action="<?php echo $url; ?>" method="post">
									<input type="hidden" name="menu" value="editpengeluaranharian">
									<input type="hidden" name="id_pengeluaranharian" value="<?php echo $rowpengeluaranharian["id_pengeluaran"]; ?>">
									<button class="btn btn-warning" type="submit"><i class="fas fa-edit"></i> Edit</button>
								</form>
							</td>
							<td>
								<form action="<?php echo $url; ?>" method="post">
									<input type="hidden" name="menu" value="hapuspengeluaranharian">
									<input type="hidden" name="id_pengeluaranharian" value="<?php echo $rowpengeluaranharian["id_pengeluaran"]; ?>">
									<button class="btn btn-danger" type="submit"><i class="fas fa-trash"></i> Hapus</button>
								</form>
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
