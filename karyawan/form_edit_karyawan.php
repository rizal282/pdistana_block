<?php
	if(isset($_POST["id_kry"])){
		$id_kry = $_POST["id_kry"];

		$dataeditkry = mysqli_query($koneksi, "select * from karyawan where id_kry = '".$id_kry."'");
		$rowkry = mysqli_fetch_array($dataeditkry);
	}
?>

<div class="card">
	<div class="card-header">Form Edit Karyawan</div>
	<div class="card-body">
		<form class="form-horizontal" method="post" action="<?php echo $url; ?>">
			<div class="form-group">
				<label>Nama Karyawan</label>
				<input type="hidden" name="menu" value="proseseditkry">
				<input type="hidden" name="id_editkry" value="<?php echo $rowkry["id_kry"]; ?>">
				<input type="text" name="nama_kry" class="form-control" value="<?php echo $rowkry["nama_kry"] ?>">
			</div>
			<div class="form-group">
				<label>Tempat Lahir</label>
				<input type="text" name="tmp_lahir" class="form-control" value="<?php echo $rowkry["tempat_lhr"] ?>">
			</div>
			<div class="form-group">
				<label>Tanggal Lahir</label>
				<input type="text" name="tgl_lahir" id="tgl_lahir" class="form-control" value="<?php echo $rowkry["tgl_lhr"] ?>">
			</div>
			<div class="form-group">
				<label>Alamat</label>
				<textarea name="alamat" class="form-control"><?php echo $rowkry["alamat_kry"] ?></textarea> 
			</div>
			<!--<div class="form-group">
				<label>Group</label>
				<input type="text" name="group" class="form-control" required>
			</div>-->
			<div class="form-group">
				<label>Group</label>
				<select class="form-control" name="group">
					<option>Pilih :</option>
					<?php
						$sqlgetlevelkaryawan = "select * from level_karyawan";
						$aksigetlevel = mysqli_query($koneksi, $sqlgetlevelkaryawan);
						while($rowlevelkaryawan = mysqli_fetch_array($aksigetlevel)){
					?>
							<option value="<?php echo $rowlevelkaryawan["nama_level"]; ?>" <?php if ($rowkry["group_kry"] == $rowlevelkaryawan["nama_level"]) echo ' selected="selected"'; ?>><?php echo $rowlevelkaryawan["nama_level"]; ?></option>
					<?php
						}
					?>
				</select>
			</div>
			<div class="form-group">
				<label>No SIM</label>
				<input type="text" name="no_sim" class="form-control" value="<?php echo $rowkry["no_sim"] ?>">
			</div>
			<div class="form-group">
				<label>Jenis SIM</label>
				<input type="text" name="jns_sim" class="form-control" value="<?php echo $rowkry["jenis_sim"] ?>">
			</div>
			<div class="form-group">
				<label>Masa Berlaku</label>
				<?php
					if($rowkry["masa_berlaku"] == "0000-00-00" || $rowkry["masa_berlaku"] == "1970-01-01"){
						$tglsim = "";
					}else{
						$tglsim = $rowkry["masa_berlaku"];
					}
				?>
				<input type="text" name="expired" id="expired" class="form-control" value="<?php echo $tglsim; ?>">
			</div>

			<div class="form-group">
				<label>Password</label>
				<input type="password" name="password" id="password" class="form-control" value="<?php echo $rowkry["password"] ?>">
			</div>

			<button class="btn btn-primary" type="submit">Perbarui</button>
		</form>
	</div>
</div>