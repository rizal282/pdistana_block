<form class="form-horizontal" method="post" action="<?php echo $url; ?>">
	<div class="form-group">
		<label>Nama Wilayah</label>
		<input type="hidden" name="menu" value="tambahwilayah">
		<input type="text" name="nama_wilayah" class="form-control" required>
	</div>
	<div class="form-group">
		<label>Nominal Uang Jalan</label>
		<input onkeyup="format_angka(this)" type="text" name="nominal_uangjalan" class="form-control" required>
	</div>

	<button type="submit" class="btn btn-primary">Tambahkan</button>
</form>
<p></p>