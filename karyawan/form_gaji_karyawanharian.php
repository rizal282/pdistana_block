<div class="card">
	<div class="card-header">Form Penggajian Karyawan Harian</div>
	<div class="card-body">
		<form class="form-horizontal" action="<?php echo $url; ?>" method="post" target="_blank">
			<div class="form-group">
				<label>Tanggal</label>
				<input type="hidden" name="menu" value="prosesinputgajiharian">
				<input type="text" name="tgl_gaji" id="tgl_gaji" class="form-control" required>
			</div>
			<div class="form-group">
				<label>Nama Karyawan</label>
				<input autocomplete="off" type="text" name="nama_kry" class="form-control" required>
			</div>
			<div class="form-group">
				<label>Pekerjaan</label>
				<input autocomplete="off" type="text" name="pekerjaan" class="form-control" required>
			</div>
			<div class="form-group">
				<label>Total Upah</label>
				<input onkeyup="format_angka(this)" autocomplete="off" type="text" name="total_upah" class="form-control" required>
			</div>

			<button type="submit" class="btn btn-primary"><i class="fas fa-print"></i> Cetak Slip Gaji</button>
		</form>
	</div>
</div>