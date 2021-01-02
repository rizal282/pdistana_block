<div class="card">
	<div class="card-header">
		Tambah Data Inventaris Kendaraan
	</div>
	<div class="card-body">
		<form class="form-horizontal" action="<?php echo $url; ?>" method="post">
			<div class="form-group">
				<label>Jenis Kendaraan</label>
				<input type="hidden" name="menu" value="prosestambahinvkendaraan">
				<input class="form-control" type="text" name="jns_kendaraan" required>
			</div>
			<div class="form-group">
				<label>Merek</label>
				<input class="form-control" type="text" name="merek" required>
			</div>
			<div class="form-group">
				<label>Plat Nomor</label>
				<input class="form-control" type="text" name="plat_nomor" required>
			</div>
			<div class="form-group">
				<label>Tanggal Terakhir Service</label>
				<input class="form-control" type="text" name="tgl_service" id="tgl_service" required>
			</div>
			<div class="form-group">
				<label>Keterangan</label>
				<textarea class="form-control" name="keterangan"></textarea>
			</div>

			<button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
		</form>
	</div>
</div>