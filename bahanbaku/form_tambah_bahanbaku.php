<div class="card">
	<div class="card-header">Form Tambah Bahan Baku</div>
	<div class="card-body">
		<form class="form-horizontal" action="<?php echo $url; ?>" method="post">
			<div class="form-group">
				<label>Tanggal</label>
				<input type="hidden" name="menu" value="prosestambahbahanbaku">
				<input class="form-control" type="text" name="tanggal" id="tanggalbb" required>
			</div>
			<div class="form-group">
				<label>Nama Bahan Baku</label>
				<input autocomplete="off" class="form-control" type="text" name="namabahanbaku" required>
			</div>
			<div class="form-group">
				<label>Jumlah Barang</label>
				<input autocomplete="off" class="form-control" type="text" name="jumlah" required>
			</div>
			<div class="form-group">
				<label>Satuan</label>
				<select class="form-control" name="satuan" required>
					<option>Pilih :</option>
					<option value="Rit">Rit</option>
					<option value="Sak">Sak</option>
				</select>
			</div>
			<div class="form-group">
				<label>Harga Barang</label>
				<input onkeyup="format_angka(this)" autocomplete="off" class="form-control" type="text" name="hargabarang" required>
			</div>
			<div class="form-group">
				<label>Bongkar</label>
				<input autocomplete="off" class="form-control" type="text" name="bongkar">
			</div>
			<div class="form-group">
				<label>Keterangan</label>
				<!-- <input autocomplete="off" class="form-control" type="text" name="keterangan"> -->
				<textarea class="form-control" name="keterangan"></textarea>
			</div>

			<button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
		</form>
	</div>
</div>