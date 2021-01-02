<div class="card">
	<div class="card-header">Setting</div>
	<div class="card-body">

	<div class="row">
		<div class="col-lg-4">
			<div class="alert alert-info">Ganti Password Anda</div>
			<div class="form-horizontal">
				<div class="form-group">
					<input type="hidden" name="id_staff" id="id_staff" value="<?php echo $_SESSION["id_user"]; ?>">
					<input type="password" name="pass_lama" id="pass_lama" class="form-control" placeholder="Masukkan Password Lama">
				</div>
				<div class="form-group">
					<input type="password" name="pass_baru" id="pass_baru" class="form-control" placeholder="Masukkan Password Baru">
				</div>
				<div class="form-group">
					<input type="password" name="ulangpass_baru" id="ulangpass_baru" class="form-control" placeholder="Masukkan Ulang Password Baru">
				</div>

				<button id="ganti_pass_staff" class="btn btn-success">Ganti Password</button>
			</div>
		</div>
	</div>
</div>
</div>















