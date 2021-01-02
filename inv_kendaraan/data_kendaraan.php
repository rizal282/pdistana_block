<div class="card">
	<div class="card-header">
		Data Inventaris Kendaraan
	</div>
	<div class="card-body">
		<div class="row">
			<div class="col-lg-12 aligninv">
				<form action="<?php echo $url; ?>" method="post">
					<input type="hidden" name="menu" value="tambahinvkendaraan">
					<button type="submit" class="btn btn-primary"><i class="fas fa-plus"></i> Tambah Inventaris Kendaraan</button>
				</form>
			</div>
		</div>
		<table id="tbl_inventaris" class="table table-bordered" width="100%" cellspacing="0">
			<thead>
				<tr>
					<th>No</th>
					<th>Jenis Kendaraan</th>
					<th>Merek</th>
					<th>Plat Nomor</th>
					<th>Last Date Service</th>
					<th>Keterangan</th>
					<th>Edit</th>
					<th>Hapus</th>
				</tr>
			</thead>
			<tbody>
				<?php
					$sqlgetinvkendaraan = "select * from inv_kendaraan";
					$aksigetinvkendaraan = mysqli_query($koneksi, $sqlgetinvkendaraan);
					
					$nomor = 1;
					while ($rowinvkendaraan = mysqli_fetch_array($aksigetinvkendaraan)) {
				?>
						<tr>
							<td><?php echo $nomor; ?></td>
							<td><?php echo $rowinvkendaraan["jns_kendaraan"]; ?></td>
							<td><?php echo $rowinvkendaraan["merek"]; ?></td>
							<td><?php echo $rowinvkendaraan["plat_nomor"]; ?></td>
							<td><?php echo date("d M Y", strtotime($rowinvkendaraan["tgl_servis"])); ?></td>
							<td><?php echo $rowinvkendaraan["keterangan"]; ?></td>
							<td>
								<form action="" method="post">
									<input type="hidden" name="menu" value="editkendaraan">
									<input type="hidden" name="id_kendaraan" value="<?php echo $rowinvkendaraan["id_inv"] ?>">
									<button type="submit" class="btn btn-success"><i class="fas fa-edit"></i></button>
								</form>
							</td>
							<td>
								<form action="" method="post">
									<input type="hidden" name="menu" value="hapuskendaraan">
									<input type="hidden" name="id_kendaraan" value="<?php echo $rowinvkendaraan["id_inv"] ?>">
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
	</div>
</div>