<div class="card">
	<div class="card-header">Data Bahan Baku</div>
	<div class="card-body">
		<div class="row">
			<div id="aligntambahbahanbaku" class="col-lg-12">
				<form action="<?php echo $url; ?>" method="post">
					<input type="hidden" name="menu" value="tambahbahanbaku">
					<button type="submit" class="btn btn-success"><i class="fas fa-plus"></i> Tambah Bahan Baku</button>
				</form>
			</div>
		</div>
		<div class="table-responsive">
			<table class="table table-bordered" id="table_bahanbaku">
				<thead>
					<tr>
						<th>No</th>
						<th>Tanggal</th>
						<th>Nama Bahan Baku</th>
						<th>Jumlah Barang</th>
						<th>Satuan</th>
						<th>Harga Barang</th>
						<th>Bongkar</th>
						<th>Jumlah</th>
						<th>Keterangan</th>
						<th>Edit</th>
						<th>Hapus</th>
					</tr>
				</thead>
				<tbody>
					<?php
						$sqlgetbahanbaku = "select * from bahan_baku";
						$aksigetbahanbaku = mysqli_query($koneksi, $sqlgetbahanbaku);

						$nomor = 1;
						while($rowbahanbaku = mysqli_fetch_array($aksigetbahanbaku)){
					?>
							<tr>
								<td><?php echo $nomor; ?></td>
								<td><?php echo date("d M Y", strtotime($rowbahanbaku["tanggal"])); ?></td>
								<td><?php echo $rowbahanbaku["nama_bahanbaku"]; ?></td>
								<td><?php echo $rowbahanbaku["jumlah_barang"]; ?></td>
								<td><?php echo $rowbahanbaku["satuan"]; ?></td>
								<td><?php echo "Rp ". number_format($rowbahanbaku["harga_barang"],1,",","."); ?></td>
								<td><?php echo $rowbahanbaku["bongkar"]; ?></td>
								<td><?php echo "Rp ". number_format($rowbahanbaku["total_harga"],1,",","."); ?></td>
								<td><?php echo $rowbahanbaku["keterangan"]; ?></td>
								<td>
									<form action="<?php echo $url; ?>" method="post">
										<input type="hidden" name="menu" value="editbahanbaku">
										<input type="hidden" name="id_bahanbaku" value="<?php echo $rowbahanbaku["id_bahanbaku"]; ?>">
										<button type="submit" class="btn btn-warning"><i class="fas fa-edit"></i> </button>
									</form>
								</td>
								<td>
									<form action="<?php echo $url; ?>" method="post">
										<input type="hidden" name="menu" value="hapusbahanbaku">
										<input type="hidden" name="id_bahanbaku" value="<?php echo $rowbahanbaku["id_bahanbaku"]; ?>">
										<button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i> </button>
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
</div>