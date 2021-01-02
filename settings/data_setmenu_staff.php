<div class="card">
	<div class="card-header">Setting Menu Staff</div>
	<div class="card-body">
		<form action="<?php echo $url; ?>" method="post">
			<input type="hidden" name="menu" value="datamenustaff">
			<button type="submit" class="btn btn-primary">Lihat Menu Staff</button>
		</form>
		<p></p>
		<form action="<?php echo $url; ?>" method="post">
			<div class="form-group">
					<label for="">Pilih Staff</label>
					<input type="hidden" name="menu" value="set_menustaff">
					<select name="nama_staff" class="form-control">
						<option value="">Pilih :</option>
						<?php
							$getstaff = mysqli_query($koneksi, "select * from karyawan where group_kry = 'Staff' order by nama_kry asc");
							while($rowgetstaff = mysqli_fetch_array($getstaff)){
						?>
								<option value="<?php echo $rowgetstaff["id_kry"]; ?>"><?php echo $rowgetstaff["nama_kry"]; ?></option>
						<?php
							}
						?>
					</select>
				</div>

				<div class="form-group">
					<label for="">Pilih Menu</label>
					<select class="form-control" name="menu_staff">
						<option value="">Pilih :</option>
						<?php
							$getmenustaff = mysqli_query($koneksi, "select * from menu_staff");
							while($rowmenustaff = mysqli_fetch_array($getmenustaff)){
						?>
								<option value="<?php echo $rowmenustaff["id_menu"]; ?>"><?php echo $rowmenustaff["nama_menu"]; ?></option>
						<?php
							}
						?>
					</select>
				</div>
				<button class="btn btn-primary" type="submit" name="setmenu">Set Menu</button>
		</form>
	</div>
</div>
