<?php
	if(isset($_POST["id_histori"])){
		$id_histori = $_POST["id_histori"];

		$gethistorikerja = mysqli_query($koneksi, "select * from historikerjakaryawan inner join karyawan on historikerjakaryawan.id_kry = karyawan.id_kry inner join stock_barang on historikerjakaryawan.kode_brg = stock_barang.kode_barang where historikerjakaryawan.id_histori = '".$id_histori."'");
		$rowhistorkerja = mysqli_fetch_array($gethistorikerja);
	}

?>

<div class="card">
	<div class="card-header">Form Edit Hasil Produksi Karyawan</div>
	<div class="card-body">
		<form class="form-horizontal" action="<?php echo $url; ?>" method="post">
			<div class="form-group">
				<label>Nama Karyawan</label>
				<input type="hidden" name="menu" value="prosesedithistorikerjakry">
				<input type="hidden" name="id_edithistori" value="<?php echo $rowhistorkerja["id_histori"]; ?>">
				<input type="hidden" name="id_kry" id="id_kry" value="<?php echo $rowhistorkerja["id_kry"]; ?>">
				<input id="nama_karyawan" class="form-control" type="text" name="nm_kry" value="<?php echo $rowhistorkerja["nama_kry"] ?>" readonly>
			</div>
			<div class="form-group">
				<label>Tanggal Pekerjaan</label>
				<input id="tgl_kerja" class="form-control" type="text" name="tgl_kerja" value="<?php echo $rowhistorkerja["tgl"]; ?>">
			</div>

			<div class="form-group">
				<label>Nama Barang</label>
				<input type="hidden" name="kode_brg" id="kode_brg" value="<?php echo $rowhistorkerja["kode_barang"]; ?>">
				<input class="form-control" type="text" name="nama_brg" id="nama_brg" value="<?php echo $rowhistorkerja["nama_barang"]; ?>">
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
				<input class="form-control" type="text" name="qty_brg" value="<?php echo $rowhistorkerja["qty_brg"]; ?>">
			</div>
			<div class="form-group">
				<label>Quantity Semen</label>
				<input type="hidden" name="qtylast_semen" value="<?php echo $rowhistorkerja["qty_semen"]; ?>">
				<input class="form-control" type="text" name="qty_semen" value="<?php echo $rowhistorkerja["qty_semen"]; ?>">
			</div>
			<div class="form-group">
				<label>Pekerjaan</label>
				<select class="form-control"  name="pekerjaan" id="pekerjaan">
	              <option>Pilih :</option>
	              <option value="Cetak" <?php if ($rowhistorkerja["pekerjaan"] == "Cetak") echo ' selected="selected"'; ?>>Cetak</option>
	              <option value="Angkat" <?php if ($rowhistorkerja["pekerjaan"] == "Angkat") echo ' selected="selected"'; ?>>Angkat</option>
	              <option value="Cat" <?php if ($rowhistorkerja["pekerjaan"] == "Cat") echo ' selected="selected"'; ?>>Cat</option>
	              <option value="Lain-lain" <?php if ($rowhistorkerja["pekerjaan"] == "Lain-lain") echo ' selected="selected"'; ?>>Lain-lain</option>
	            </select>
				<!-- <input class="form-control" type="text" name="pekerjaan"> -->
			</div>
			<div class="form-group">
				<label>Keterangan</label>
				<input class="form-control" type="text" name="keterangan" value="<?php echo $rowhistorkerja["keterangan"]; ?>">
			</div>

			<button class="btn btn-primary" type="submit"><i class="fas fa-save"></i> Simpan</button>
		</form>
	</div>
</div>