<div class="card">
	<div class="card-header">
		Data Kasbon Karyawan
	</div>
	<div class="card-body">
		<div class="row">
			<div class="col-lg-12 alignkasbon">
				<form action="<?php echo $url; ?>" method="post">
					<input type="hidden" name="menu" value="tambahkasbon">
					<button class="btn btn-primary" type="submit"><i class="fas fa-plus"></i> Tambah Kasbon</button>
				</form>
			</div>
		</div>
		<?php
			if($_SESSION["id_user"] && $_SESSION["username"] && $_SESSION["password"] && $_SESSION["status_user"] && $_SESSION["status_user"] == "admin"){
		?>
				<table class="table table-bordered" id="tbl_kasbon" cellspacing="0" width="100%">
					<thead>
						<tr>
							<th>No</th>
							<th>Tanggal</th>
							<th>Nama Karyawan</th>
							<th>Group</th>
							<th>Kasbon</th>
							<th>Status Lunas</th>
							<th>Edit</th>
							<th>Hapus</th>
						</tr>
					</thead>
					<tbody>
						<?php
							$sqlgetkasbonkaryawan = "select * from kasbon_kry inner join karyawan on kasbon_kry.id_kry = karyawan.id_kry order by kasbon_kry.id_kasbon desc";
							$aksigetkasbon = mysqli_query($koneksi, $sqlgetkasbonkaryawan);

							$nomor = 1;
							while($rowkasbon = mysqli_fetch_array($aksigetkasbon)){
						?>
								<tr>
									<td><?php echo $nomor; ?></td>
									<td><?php echo date("d M Y", strtotime($rowkasbon["tgl_kasbon"])); ?></td>
									<td><?php echo $rowkasbon["nama_kry"]; ?></td>
									<td><?php echo $rowkasbon["group_kry"]; ?></td>
									<td><?php echo "Rp ". number_format($rowkasbon["nominal"],1,",","."); ?></td>
									<td><?php echo $rowkasbon["sts_kasbon"]; ?></td>
									<td>
										<form action="<?php echo $url; ?>" method="post">
											<input type="hidden" name="menu" value="editkasbonkaryawan">
											<input type="hidden" name="id_kasbon" value="<?php echo $rowkasbon["id_kasbon"]; ?>">
											<button type="submit" class="btn btn-warning"><i class="fas fa-edit"></i></button>
										</form>
									</td>
									<td>
										<form action="<?php echo $url; ?>" method="post">
											<input type="hidden" name="menu" value="hapuskasbonkaryawan">
											<input type="hidden" name="id_krykasbon" value="<?php echo $rowkasbon["id_kry"]; ?>">
											<input type="hidden" name="tgl_kasbon" value="<?php echo $rowkasbon["tgl_kasbon"]; ?>">
											<input type="hidden" name="id_kasbon" value="<?php echo $rowkasbon["id_kasbon"]; ?>">
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
		<?php }else{ ?>
			<table class="table table-bordered" id="tbl_kasbon" cellspacing="0" width="100%">
				<thead>
					<tr>
						<th>No</th>
						<th>Tanggal</th>
						<th>Nama Karyawan</th>
						<th>Group</th>
						<th>Kasbon</th>
						<th>Status Lunas</th>
						
					</tr>
				</thead>
				<tbody>
					<?php
						$sqlgetkasbonkaryawan = "select * from kasbon_kry inner join karyawan on kasbon_kry.id_kry = karyawan.id_kry order by kasbon_kry.id_kasbon desc";
						$aksigetkasbon = mysqli_query($koneksi, $sqlgetkasbonkaryawan);

						$nomor = 1;
						while($rowkasbon = mysqli_fetch_array($aksigetkasbon)){
					?>
							<tr>
								<td><?php echo $nomor; ?></td>
								<td><?php echo date("d M Y", strtotime($rowkasbon["tgl_kasbon"])); ?></td>
								<td><?php echo $rowkasbon["nama_kry"]; ?></td>
								<td><?php echo $rowkasbon["group_kry"]; ?></td>
								<td><?php echo "Rp ". number_format($rowkasbon["nominal"],1,",","."); ?></td>
								<td><?php echo $rowkasbon["sts_kasbon"]; ?></td>
							</tr>
					<?php
							$nomor ++;
						}
					?>
				</tbody>
			</table>
		<?php } ?>
		
	</div>
</div>