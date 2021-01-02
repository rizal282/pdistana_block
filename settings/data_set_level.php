<div class="card">
	<div class="card-header">Setting Karyawan</div>
	<div class="card-body">
		<div class="row">
			<div class="col-lg-4">
				<div class="alert alert-success">Tambah Level Karyawan</div>
				<label>Masukkan Level Karyawan</label>
				<input type="text" id="level_kry" class="form-control">
				<small>Tekan Enter Untuk Menambah Data</small>
			</div>
		</div>

		<div class="row">
			<div class="col-lg-4">
				<div id="tagline_level" class="alert alert-success">Level Karyawan</div>

				<table width="100%">
					<thead>
						<tr>
							<th>No</th>
							<th>Nama Level</th>
							<th>Hapus</th>
						</tr>
					</thead>
					<tbody id="namalevel">
						<?php
							$nomor = 1;
							$getlevel = mysqli_query($koneksi, "select * from level_karyawan");
							while($rowlevel = mysqli_fetch_array($getlevel)){
						?>
								<tr>
									<td><?php echo $nomor; ?></td>
									<td><?php echo $rowlevel["nama_level"]; ?></td>
									<td>
										<form action="<?php echo $url; ?>" method="post">
											<input type="hidden" name="menu" value="hapus_level">
											<input type="hidden" name="id_level" id="id_level" value="<?php echo $rowlevel["id_level"]; ?>">
											<button type="submit" class="btn btn-danger" id="btn_hapus"><i class="fas fa-trash"></i></button>
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
			<div class="col-lg-6">
				
			</div>
		</div>
	</div>
</div>