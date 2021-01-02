<?php
	if(isset($_POST["id_bahanbaku"])){
		$id_bahanbaku = $_POST["id_bahanbaku"];

		$sqlgetdatabahanbaku = "select * from bahan_baku where id_bahanbaku = '".$id_bahanbaku."'";
		$aksigetbahanbaku = mysqli_query($koneksi, $sqlgetdatabahanbaku);
		$rowdatabahanbaku = mysqli_fetch_array($aksigetbahanbaku);
	}
?>

<div class="card">
	<div class="card-header">Form Edit Bahan Baku</div>
	<div class="card-body">
		<form class="form-horizontal" action="<?php echo $url; ?>" method="post">
			<div class="form-group">
				<label>Tanggal</label>
				<input type="hidden" name="menu" value="proseseditbahanbaku">
				<input type="hidden" name="id_bahanbaku" value="<?php echo $rowdatabahanbaku["id_bahanbaku"]; ?>">
				<input id="tgl_awal" class="form-control" type="text" name="tanggal"  value="<?php echo $rowdatabahanbaku["tanggal"]; ?>">
			</div>
			<div class="form-group">
				<label>Nama Bahan Baku</label>
				<input class="form-control" type="text" name="namabahanbaku"  value="<?php echo $rowdatabahanbaku["nama_bahanbaku"]; ?>">
			</div>
			<div class="form-group">
				<label>Jumlah Barang</label>
				<input class="form-control" type="text" name="jumlah"  value="<?php echo $rowdatabahanbaku["jumlah_barang"]; ?>">
			</div>
			<div class="form-group">
				<label>Satuan</label>
				<select class="form-control" name="satuan">
					<option>Pilih :</option>
					<option value="Rit" <?php if ($rowdatabahanbaku["satuan"] == 'Rit') echo ' selected="selected"'; ?>>Rit</option>
					<option value="Sak" <?php if ($rowdatabahanbaku["satuan"] == 'Sak') echo ' selected="selected"'; ?>>Sak</option>
				</select>
			</div>
			<div class="form-group">
				<label>Harga Barang</label>
				<input class="form-control" type="text" name="hargabarang"  value="<?php echo $rowdatabahanbaku["harga_barang"]; ?>">
			</div>
			<div class="form-group">
				<label>Bongkar</label>
				<input class="form-control" type="text" name="bongkar" value="<?php echo $rowdatabahanbaku["bongkar"]; ?>">
			</div>
			<div class="form-group">
				<label>Keterangan</label>
				<!-- <input class="form-control" type="text" name="keterangan" value="<?php echo $rowdatabahanbaku["keterangan"]; ?>"> -->
				<textarea class="form-control" name="keterangan"><?php echo $rowdatabahanbaku["keterangan"]; ?></textarea>
			</div>

			<button type="submit" class="btn btn-primary"><i class="fas fa-pencil-alt"></i> Perbarui</button>
		</form>
	</div>
</div>