<div class="card">
	<div class="card-header">
		Form Kasbon Karyawan
	</div>
	<div class="card-body">
		<form class="form-horizontal" method="post" action="<?php echo $url; ?>">
			<div class="form-group">
				<label>Tanggal Kasbon</label>
				<input type="hidden" name="menu" value="proseskasbonkaryawan">
				<input type="text" name="tgl_kasbon" class="form-control" id="tgl_kasbon" required>
			</div>
			<div class="form-group">
				<label>Nama Karyawan</label>
				<!--<input type="hidden" name="id_kry" value="" id="id_kry">
				<input autocomplete="off" id="nama_karyawan" class="form-control" type="text" name="nm_kry">-->
				<select name="nm_kry" class="form-control">
					<option value="">Pilih :</option>

					<?php
						$stafflapangan = mysqli_query($koneksi, "select * from karyawan order by nama_kry asc");
						while($rowstafflapangan = mysqli_fetch_array($stafflapangan)){
					?>
							<option value="<?php echo $rowstafflapangan["id_kry"]; ?>"><?php echo $rowstafflapangan["nama_kry"]; ?></option>
					<?php
						}
					?>
				</select>
			</div>

			<div id="data"></div>
			<!-- <div class="form-group">
				<label>Group</label>
				<select class="form-control" name="group_kry">
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
			</div>-->
			<div class="form-group">
				<label>Nominal Kasbon</label>
				<input autocomplete="off" type="text" name="nominal" class="form-control" onkeyup="format_angka(this)" required>
			</div>

			<button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan Kasbon</button>
		</form>
	</div>
</div>
