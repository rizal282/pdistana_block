<div class="card">
	<div class="card-header">Setting</div>
	<div class="card-body">

		<div id="set_passadmin" class="row">
			<div class="col-lg-4">
				<div class="alert alert-info">Ganti Password Admin</div>
				<div class="form-horizontal">
					<div class="form-group">
						<input type="password" name="pass_lama" id="pass_lama" class="form-control" placeholder="Masukkan Password Lama">
					</div>
					<div class="form-group">
						<input type="password" name="pass_baru" id="pass_baru" class="form-control" placeholder="Masukkan Password Baru">
					</div>
					<div class="form-group">
						<input type="password" name="ulangpass_baru" id="ulangpass_baru" class="form-control" placeholder="Masukkan Ulang Password Baru">
					</div>

					<button id="ganti_passadmin" class="btn btn-success">Ganti Password</button>
				</div>
			</div>
			<div class="col-lg-8">
				<div class="alert alert-info">Reset Password Staff</div>
				<table id="table_staff" class="table table-bordered">
					<thead>
						<tr>
							<th>No</th>
							<th>Nama Staff</th>
							<th>Password</th>
							<th>Reset</th>
						</tr>
					</thead>
					<tbody>
						<?php
							$getstaff = mysqli_query($koneksi, "select * from karyawan where group_kry = 'Staff'");

							$nomor = 1;
							while($rowstaff = mysqli_fetch_array($getstaff)){
						?>
								<tr>
									<td><?php echo $nomor; ?></td>
									<td><?php echo $rowstaff["nama_kry"]; ?></td>
									<td><?php echo $rowstaff["password"]; ?></td>
									<td>
										<form action="" method="post">
											<input type="hidden" name="menu" value="resetpassstaff">
											<input type="hidden" name="id_staff" value="<?php echo $rowstaff["id_kry"]; ?>">
											<button class="btn btn-success" type="submit">Reset</button>
										</form>
									</td>
								</tr>
						<?php
								$nomor++;
							}
						?>
					</tbody>
				</table>
			</div>
		</div>

		<div class="row">
			<div class="col-lg-6">
				<div class="form-horizontal">
					<div class="form-group">
						<?php 
							$getsettingtempo = mysqli_query($koneksi, "select * from setting_tempo");
							$rowsettingtempo = mysqli_fetch_array($getsettingtempo);
						?>
						<label for="">Setting Limit Tempo Pembeli</label>
						<input type="text" id="settingtempopembeli" class="form-control" name="settingtempopembeli" value="<?php echo $rowsettingtempo["limit_tempopembeli"] ?>">
					</div>
					<button type="submit" id="ubahsettingtempopembeli" class="btn btn-primary">Ubah</button>
				</div>
			</div>
		</div>
		<p></p>
		<!-- <div class="row">
			<div class="col-lg-12">
				<form action="<?php echo $url; ?>" method="post">
					<input type="hidden" name="menu" value="backupdata">
					<button class="btn btn-success" type="submit"><i class="fas fa-hdd-o"></i> Back Up Data</button>
				</form>
			</div>
		</div> -->

		<div class="alert alert-info">Setting Lainnya</div>

		<div class="row">
		<div class="col-xl-4 col-sm-6 mb-4">
			<div class="card text-white bg-primary o-hidden h-100">
			<div class="card-body">
				<div class="card-body-icon">
				<i class="fas fa-fw fa-cogs"></i>
				</div>
				<div class="mr-5">Setting Produk & Gaji Karyawan</div>
			</div>
			<form class="card-footer text-white clearfix small z-1" action="<?php echo $url; ?>" method="post">
				<input type="hidden" name="menu" value="pagesetgajistafflapangan">
				<button class="btn btn-primary" type="submit">
				<i class="fas fa-fw fa-eye"></i> Lihat Settings
				</button>
			</form>
			</div>
		</div>

		<div class="col-xl-4 col-sm-6 mb-4">
			<div class="card text-white bg-warning o-hidden h-100">
			<div class="card-body">
				<div class="card-body-icon">
				<i class="fas fa-fw fa-cogs"></i>
				</div>
				<div class="mr-5">Setting Level Karyawan</div>
			</div>
			<form class="card-footer text-white clearfix small z-1" action="<?php echo $url; ?>" method="post">
				<input type="hidden" name="menu" value="pagesetlevel">
				<button class="btn btn-warning" type="submit">
				<i class="fas fa-fw fa-eye"></i> Lihat Settings
				</button>
			</form>
			</div>
		</div>

		<div class="col-xl-4 col-sm-6 mb-4">
			<div class="card text-white bg-success o-hidden h-100">
			<div class="card-body">
				<div class="card-body-icon">
				<i class="fas fa-fw fa-cogs"></i>
				</div>
				<div class="mr-5">Setting Nominal Uang Jalan & Gaji per Wilayah</div>
			</div>
			<form class="card-footer text-white clearfix small z-1" action="<?php echo $url; ?>" method="post">
				<input type="hidden" name="menu" value="pagesetwilayah">
				<button class="btn btn-success" type="submit">
				<i class="fas fa-fw fa-eye"></i> Lihat Settings
				</button>
			</form>
			</div>
		</div>

		<div class="col-xl-4 col-sm-6 mb-4">
			<div class="card text-white bg-primary o-hidden h-100">
			<div class="card-body">
				<div class="card-body-icon">
				<i class="fas fa-fw fa-cogs"></i>
				</div>
				<div class="mr-5">Setting Menu Staff</div>
			</div>
			<form class="card-footer text-white clearfix small z-1" action="<?php echo $url; ?>" method="post">
				<input type="hidden" name="menu" value="pagesetmenustaff">
				<button class="btn btn-primary" type="submit">
				<i class="fas fa-fw fa-eye"></i> Lihat Settings
				</button>
			</form>
			</div>
		</div>

		<div class="col-xl-4 col-sm-6 mb-4">
			<div class="card text-white bg-warning o-hidden h-100">
				<div class="card-body">
					<div class="card-body-icon">
					<i class="fas fa-fw fa-cogs"></i>
					</div>
					<div class="mr-5">Back up Database</div>
				</div>
				<div class="card-footer">
					<a class="btn btn-warning" href="db_backup/bekap.php" target="_blank">Back up</a>
				</div>
			</div>
		</div>

		<div class="col-xl-4 col-sm-6 mb-4">
			<div class="card text-white bg-success o-hidden h-100">
				<div class="card-body">
					<div class="card-body-icon">
					<i class="fas fa-fw fa-cogs"></i>
					</div>
					<div class="mr-5">Restore Database</div>
				</div>
				<div class="card-footer">
					<a class="btn btn-success" href="db_backup/restore.php" target="_blank">Restore</a>
				</div>		
			</div>
		</div>

		
		</div>
	</div>
		

</div>















