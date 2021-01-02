<div class="card">
	<div class="card-header">Data Pengeluaran Lain-lain</div>
	<div class="card-body">
		<div class="row">
			<div class="col-lg-6">
				<div id="sortingpengeluaranlain" class="form-inline">
					<div class="form-group">
						<input type="text" name="tglawalfilterpengeluaranlain" id="tglawalfilterpengeluaranlain" class="form-control" placeholder="Masukkan Tanggal Awal">
					</div>
					<div class="form-group">
						<input type="text" name="tglakhirfilterpengeluaranlain" id="tglakhirfilterpengeluaranlain" class="form-control" placeholder="Masukkan Tanggal Akhir">
					</div>
				</div>
			</div>
			<div class="col-lg-6 alignpengeluaranlain">
				<form action="<?php echo $url; ?>" method="post">
					<input type="hidden" name="menu" value="tambahpengeluaranlain">
					<button type="submit" class="btn btn-primary"><i class="fas fa-plus"></i> Tambah Pengeluaran Lain-lain</button>
				</form>
			</div>
		</div>
		<table class="table table-bordered" id="table_pengeluaranlain">
			<thead>
				<tr>
					<th>No</th>
					<th>Tanggal</th>
					<th>Nama Beban</th>
					<th>No Pelanggan</th>
					<th>Nominal</th>
					<th>Keterangan</th>
					<th>Edit</th>
					<th>Hapus</th>
				</tr>
			</thead>
			<tbody id="datafilterpengeluaranlain">
				<?php
					$sqlgetpengeluaranlain = "select * from pengeluaran where tgl_pengeluaran = '".date("Y-m-d")."' and jenis_pengeluaran = 'Pengeluaran Lain-lain' order by id_pengeluaran desc";
					$aksigetpengeluaranlain = mysqli_query($koneksi, $sqlgetpengeluaranlain);

					$nomor = 1;
					while($rowpengeluaranlain = mysqli_fetch_array($aksigetpengeluaranlain)){
				?>
						<tr>
							<td><?php echo $nomor; ?></td>
							<td><?php echo date("d M Y", strtotime($rowpengeluaranlain["tgl_pengeluaran"])); ?></td>
							<td><?php echo $rowpengeluaranlain["nama_pengeluaran"]; ?></td>
							<td><?php echo $rowpengeluaranlain["no_pelanggan"]; ?></td>
							<td><?php echo "Rp ". number_format($rowpengeluaranlain["nominal"],1,",","."); ?></td>
							<td><?php echo $rowpengeluaranlain["keterangan"]; ?></td>
							<td>
								<form action="<?php echo $url; ?>" method="post">
									<input type="hidden" name="menu" value="editpengeluaranlain">
									<input type="hidden" name="id_pengeluaran_lain" value="<?php echo $rowpengeluaranlain["id_pengeluaran"]; ?>">
									<button type="submit" class="btn btn-warning"><i class="fas fa-edit"></i> Edit</button>
								</form>
							</td>
							<td>
								<form action="<?php echo $url; ?>" method="post">
									<input type="hidden" name="menu" value="hapuspengeluaranlain">
									<input type="hidden" name="id_pengeluaran_lain" value="<?php echo $rowpengeluaranlain["id_pengeluaran"]; ?>">
									<button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i> Hapus</button>
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
