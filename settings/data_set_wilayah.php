<div class="card">
	<div class="card-header">Wilayah</div>
	<div class="card-body">
		<?php include_once "settings/form_tambah_wilayah.php"; ?>

		<table id="table_wilayah" class="table table-bordered">
			<thead>
				<tr>
					<th>No</th>
					<th>Nama Wilayah</th>
					<th>Nominal Uang Jalan</th>
					<th>Edit</th>
					<th>Hapus</th>
				</tr>
			</thead>
			<tbody>
				<?php
					$getwilayah = mysqli_query($koneksi, "select * from wilayah");
					$nomor = 1;
					while($rowwilayah = mysqli_fetch_array($getwilayah)){
				?>
						<tr>
							<td><?php echo $nomor; ?></td>
							<td><?php echo $rowwilayah["nama_wilayah"]; ?></td>
							<td><?php echo "Rp ". number_format($rowwilayah["nominal_uangjalan"],1,",","."); ?></td>
							<td>
								<form action="<?php echo $url; ?>" method="post">
									<input type="hidden" name="menu" value="editwilayah">
									<input type="hidden" name="id_wilayah" value="<?php echo $rowwilayah["id_wilayah"]; ?>">
									<button type="submit" class="btn btn-success">Edit</button>
								</form>
							</td>
							<td>
								<form action="<?php echo $url; ?>" method="post">
									<input type="hidden" name="menu" value="hapuswilayah">
									<input type="hidden" name="id_wilayah" value="<?php echo $rowwilayah["id_wilayah"]; ?>">
									<button type="submit" class="btn btn-danger">Hapus</button>
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