<form class="form-horizontal" action="" method="post">
	<div class="form-group">
		<label>Tanggal Faktur</label>
		<input type="hidden" name="menu" value="prosesbuatfaktur">
		<input type="date" name="tgl_faktur" class="form-control">
	</div>
	<div class="form-group">
		<label>Kepada</label>
		<input type="text" name="kepada" class="form-control">
	</div>
	<div class="form-group">
		<label>Alamat</label>
		<textarea name="alamat" class="form-control"></textarea>
	</div>
	<div class="form-group">
		<label>Catatan</label>
		<input type="text" name="catatan" class="form-control">
	</div>
	<div class="form-group">
		<label>No Transaksi</label>
		<input type="text" name="no_tr" class="form-control">
	</div>
	<div class="form-group">
		<label>No HP</label>
		<input type="text" name="no_hp" class="form-control">
	</div>

	<button type="submit" class="btn btn-primary">Buat Faktur</button>
</form>