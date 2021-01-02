<?php
	if(isset($_POST["id_pengeluaran_lain"])){
		$id_pengeluaranlain = $_POST["id_pengeluaran_lain"];
		$sqlgetdatapengeluaranlain = "select * from pengeluaran where id_pengeluaran = '".$id_pengeluaranlain."'";
		$aksigetdatapengeluaranlain = mysqli_query($koneksi, $sqlgetdatapengeluaranlain);
		$rowdatapengeluaranlain = mysqli_fetch_array($aksigetdatapengeluaranlain);

		// $datatanggal = date("m/d/Y", strtotime($rowdatapengeluaranlain["tgl_pengeluaran"]));
	}
?>

<div class="card">
	<div class="card-header">Form Edit Pengeluaran lain</div>
	<div class="card-body">
		<form class="form-horizontal" action="<?php echo $url; ?>" method="post">
			<!-- <div class="form-group">
				<label>Tanggal</label>
				<input type="date" name="tgl_pengeluaranlain" class="form-control" value="<?php echo $datatanggal; ?>">
			</div> -->
			<div class="form-group">
				<label>Nama Beban</label>
				<input type="hidden" name="menu" value="proseseditpengeluaranlain">
				<input type="hidden" name="id_editpengeluaranlain" value="<?php echo $rowdatapengeluaranlain["id_pengeluaran"] ?>">
				<input type="text" name="edit_nama_beban" class="form-control" value="<?php echo $rowdatapengeluaranlain["nama_pengeluaran"]; ?>">
			</div>
			<div class="form-group">
				<label>No Pelanggan</label>
				<input type="text" name="nopelanggan" class="form-control" value="<?php echo $rowdatapengeluaranlain["no_pelanggan"]; ?>">
			</div>
			<div class="form-group">
				<label>Nominal</label>
				<input type="text" name="edit_nominal" class="form-control" value="<?php echo $rowdatapengeluaranlain["nominal"]; ?>">
			</div>
			<div class="form-group">
				<label>Keterangan</label>
				<input type="text" name="edit_keterangan" class="form-control" value="<?php echo $rowdatapengeluaranlain["keterangan"]; ?>">
			</div>

			<button type="submit" class="btn btn-primary">Simpan</button>
		</form>
	</div>
</div>