<div class="card">
	<div class="card-header">Form Input Hasil Produksi Karyawan</div>
	<div class="card-body">
		<form class="form-horizontal" action="<?php echo $url; ?>" method="post">
			<div class="form-group">
				<label>Nama Karyawan</label>
				<input type="hidden" name="menu" value="prosesinputhistorikerjakry">
				<input type="hidden" name="id_kry" value="" id="id_kryproduksi">
				<!--<input autocomplete="off" id="nama_karyawanproduksi" class="form-control" type="text" name="nm_kry" required>-->
				<select id="nama_karyawanproduksi" name="nm_kry" class="form-control">
					<option value="">Pilih :</option>

					<?php
						$getkaryawan = mysqli_query($koneksi, "select nama_kry from karyawan where group_kry = 'Produksi' order by nama_kry asc");
						while($rowgetkaryawan = mysqli_fetch_array($getkaryawan)){
					?>
							<option value="<?php echo $rowgetkaryawan["nama_kry"]; ?>"><?php echo $rowgetkaryawan["nama_kry"]; ?></option>
					<?php
						}
					?>
				</select>

			</div>
			<div class="form-group">
				<label>Tanggal Pekerjaan</label>
				<input class="form-control" type="text" name="tgl_kerja" id="tgl_kerja" required>
			</div>

			<div class="form-group">
				<label>Nama Barang</label>
				<input type="hidden" name="kode_brg" id="kode_brg" value="">
				<!--<input autocomplete="off" class="form-control" type="text" name="nama_brg" id="nama_brg" required>-->
				<select id="nama_brg" name="nama_brg" class="form-control">
					<option value="">Pilih :</option>

					<?php
						$getkaryawan = mysqli_query($koneksi, "select nama_barang from stock_barang order by nama_barang asc");
						while($rowgetkaryawan = mysqli_fetch_array($getkaryawan)){
					?>
							<option value="<?php echo $rowgetkaryawan["nama_barang"]; ?>"><?php echo $rowgetkaryawan["nama_barang"]; ?></option>
					<?php
						}
					?>
				</select>
			</div>
			<div class="form-group">
				<label>Jenis Barang</label>
				<select id="jenisbarang" class="form-control" name="jenis_brg">
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
				<label>Quantity Barang</label>
				<input autocomplete="off" class="form-control" type="text" name="qty_brg" required>
			</div>
			<div class="form-group">
				<label>Quantity Semen</label>
				<input autocomplete="off" class="form-control" type="text" name="qty_semen">
			</div>
			<div id="pekerjaanpaving" class="form-group">
				<input type="text" name="pekerjaan" value="Cetak" class="form-control" readonly>
			</div>
			<div id="pekerjaannonpaving" class="form-group">
				<label>Pekerjaan</label>
				<select class="form-control" name="pekerjaan" id="pekerjaan">
				  <option value="Cetak">Cetak</option>
				  <option value="Cat">Cat</option>
	              <option value="Angkat">Angkat</option>
	            </select>
				<!-- <input class="form-control" type="text" name="pekerjaan"> -->
			</div>
			<div class="form-group">
				<label>Keterangan</label>
				<textarea name="keterangan" class="form-control"></textarea>
			</div>

			<button name="simpanhistorikerja" class="btn btn-primary" type="submit"><i class="fas fa-save"></i> Simpan</button>
		</form>
	</div>
</div>
