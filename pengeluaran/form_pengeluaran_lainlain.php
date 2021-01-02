<div class="card">
	<div class="card-header">Form Pengeluaran Lain-lain</div>
	<div class="card-body">
		<form class="form-horizontal" action="<?php echo $url; ?>" method="post">
			<div class="form-group">
				<label>Nama Beban</label>
				<input type="hidden" name="menu" value="prosesinputpengeluaranlain">
				<input autocomplete="off" type="text" name="namabeban" class="form-control" required>
			</div>
			<div class="form-group">
				<label>No Pelanggan</label>
				<input autocomplete="off" type="text" name="nopelanggan" class="form-control" required>
			</div>
			<div class="form-group">
				<label>Nominal</label>
				<input autocomplete="off" type="text" name="nominal" class="form-control" onkeyup="format_angka(this)" required>
			</div>
			<div class="form-group">
				<label>Keterangan</label>
				<input autocomplete="off" type="text" name="keterangan" class="form-control" >
			</div>

			<button type="submit" class="btn btn-primary">Simpan</button>
		</form>
	</div>
</div>
