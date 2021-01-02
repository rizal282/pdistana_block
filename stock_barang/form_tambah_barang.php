<div class="card">
	<div class="card-header">Form Tambah Barang</div>
	<div class="card-body">
		<form class="form-horizontal" action="<?php echo $url ?>" method="post">
			<div class="form-group">
				<label>Kode Barang</label>
				<input type="hidden" name="menu" value="prosestambahbarang">
				<input autocomplete="off" type="text" name="kode_barang" class="form-control" required>
			</div>
			<div class="form-group">
				<label>Nama Barang</label>
				<input autocomplete="off" type="text" name="nama_barang" class="form-control" required>
			</div>
			<div class="form-group">
				<label>Jenis Barang</label>
				<select class="form-control" name="jenis_brg">
					<option>Pilih :</option>

					<?php
						$getjenisbarang = mysqli_query($koneksi, "select nama_jenisbarang from jenis_barang order by nama_jenisbarang asc");
						while($rowjenisbarang = mysqli_fetch_array($getjenisbarang)){
					?>
							<option value="<?php echo $rowjenisbarang["nama_jenisbarang"]; ?>"><?php echo $rowjenisbarang["nama_jenisbarang"]; ?></option>
					<?php
						}
					?>
				</select>
			</div>
			<div class="form-group">
				<label>Stock Awal</label>
				<input autocomplete="off" type="text" name="stock_awal" id="stock_awal" class="form-control" required>
			</div>
			<div class="form-group">
				<label>Stock Masuk</label>
				<input autocomplete="off" type="text" name="stock_masuk" id="stock_masuk" class="form-control" required>
			</div>
			<div class="form-group">
				<label>Terjual</label>
				<input autocomplete="off" type="text" name="terjual" id="terjual" class="form-control" required>
			</div>
			<div class="form-group">
				<label>Stock Akhir</label>
				<input autocomplete="off" type="text" name="stock_akhir" id="stock_akhir" class="form-control" readonly>
			</div>
			<div class="form-group">
				<label>Harga</label>
				<input onkeyup="format_angka(this)" autocomplete="off" type="text" name="harga" id="modalStock" class="form-control">
			</div>

			<button type="submit" class="btn btn-primary">Tambah</button>
		</form>
	</div>
</div>
