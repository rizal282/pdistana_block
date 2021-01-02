<div class="card">
	<div class="card-header">Form Tambah Pengeluaran Harian</div>
	<div class="card-body">
		<form class="form-horizontal" action="<?php echo $url; ?>" method="post">
			<!-- <div class="form-group">
				<label>Tanggal</label>
				<input type="hidden" name="menu" value="prosestambahpengeluaranharian">
				<input type="date" name="tgl_pengeluaranharian" class="form-control" required>
			</div> -->
			<div class="form-group">
				<label>Nama Beban</label>
				<input type="hidden" name="menu" value="prosestambahpengeluaranharian">
				<input autocomplete="off" type="text" name="nama_beban" class="form-control" required>
			</div>
			<div class="form-group">
				<label>Nominal</label>
				<input autocomplete="off" type="text" name="nominal" class="form-control" onkeyup="format_angka(this)" required>
			</div>
			<div class="form-group">
				<label>No Referensi</label>
				<input autocomplete="off" type="text" name="noreferensi" class="form-control">
			</div>
			<div class="form-group">
				<label>Keterangan</label>
				<input autocomplete="off" type="text" name="keterangan" class="form-control">
			</div>

			<button type="submit" class="btn btn-primary">Simpan</button>
		</form>
	</div>
</div>
