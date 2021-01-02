<div class="card">
	<div class="card-header">Form Input Karyawan Baru</div>
	<div class="card-body">
		<form class="form-horizontal" method="post" action="<?php echo $url; ?>">
			<div class="form-group">
				<label>Nama Karyawan</label>
				<input type="hidden" name="menu" value="prosestambahkry">
				<input autocomplete="off" type="text" name="nama_kry" class="form-control" required>
			</div>
			<div class="form-group">
				<label>Tempat Lahir</label>
				<input autocomplete="off" type="text" name="tmp_lahir" class="form-control" required>
			</div>
			<div class="form-group">
				<label>Tanggal Lahir</label>
				<input autocomplete="off" type="text" id="tgl_lahir" name="tgl_lahir" class="form-control" required>
			</div>
			<div class="form-group">
				<label>Alamat</label>
				<textarea name="alamat" class="form-control" required></textarea> 
			</div>
			<!--<div class="form-group">
				<label>Group</label>
				<input type="text" name="group" class="form-control" required>
			</div>-->
			<div class="form-group">
				<label>Group</label>
				<select class="form-control" name="group" id="group_kry">
					<option>Pilih :</option>
					<?php
						$sqlgetlevelkaryawan = "select * from level_karyawan";
						$aksigetlevel = mysqli_query($koneksi, $sqlgetlevelkaryawan);
						while($rowlevelkaryawan = mysqli_fetch_array($aksigetlevel)){
					?>
							<option value="<?php echo $rowlevelkaryawan["nama_level"]; ?>"><?php echo $rowlevelkaryawan["nama_level"]; ?></option>
					<?php
						}
					?>
				</select>
			</div>
			<div class="form-group">
				<label>No SIM</label>
				<input autocomplete="off" type="text" name="no_sim" class="form-control" >
			</div>
			<div class="form-group">
				<label>Jenis SIM</label>
				<input autocomplete="off" type="text" name="jns_sim" class="form-control" >
			</div>
			<div class="form-group">
				<label>Masa Berlaku</label>
				<input autocomplete="off" type="text" id="expired" name="expired" class="form-control" >
			</div>
			<div id="pass_staff" class="form-group">
				<label>Password Staff</label>
				<input autocomplete="off" type="password" name="password" class="form-control" >
			</div>

			<button class="btn btn-primary" type="submit"><i class="fas fa-save"></i> Simpan</button>
		</form>
	</div>
</div>