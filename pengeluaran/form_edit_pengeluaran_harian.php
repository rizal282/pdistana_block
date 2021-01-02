<?php
	if(isset($_POST["id_pengeluaranharian"])){
		$id_pengeluaranharian = $_POST["id_pengeluaranharian"];
		$sqlgetdatapengeluaranharian = "select * from pengeluaran where id_pengeluaran = '".$id_pengeluaranharian."'";
		$aksigetdatapengeluaranharian = mysqli_query($koneksi, $sqlgetdatapengeluaranharian);
		$rowdatapengeluaranharian = mysqli_fetch_array($aksigetdatapengeluaranharian);

		$datatanggal = date("m/d/Y", strtotime($rowdatapengeluaranharian["tgl_pengeluaran"]));
	}
?>

<div class="card">
	<div class="card-header">Form Edit Pengeluaran Harian</div>
	<div class="card-body">
		<form class="form-horizontal" action="<?php echo $url; ?>" method="post">
			<!-- <div class="form-group">
				<label>Tanggal</label>
				<input type="date" name="tgl_pengeluaranharian" class="form-control" value="<?php echo $datatanggal; ?>">
			</div> -->
			<div class="form-group">
				<label>Nama Beban</label>
				<input type="hidden" name="menu" value="proseseditpengeluaranharian">
				<input type="hidden" name="id_editpengeluaranharian" value="<?php echo $rowdatapengeluaranharian["id_pengeluaran"]; ?>">
				<input autocomplete="off" type="text" name="edit_nama_beban" class="form-control" value="<?php echo $rowdatapengeluaranharian["nama_pengeluaran"]; ?>">
			</div>
			<div class="form-group">
				<label>Nominal</label>
				<input autocomplete="off" type="text" name="edit_nominal" class="form-control" value="<?php echo $rowdatapengeluaranharian["nominal"]; ?>">
			</div>
			<div class="form-group">
				<label>No Referensi</label>
				<input autocomplete="off" type="text" name="edit_ref" class="form-control" value="<?php echo $rowdatapengeluaranharian["noreferensi"]; ?>">
			</div>
			<div class="form-group">
				<label>Keterangan</label>
				<input autocomplete="off" type="text" name="edit_keterangan" class="form-control" value="<?php echo $rowdatapengeluaranharian["jenis_pengeluaran"]; ?>">
			</div>

			<button type="submit" class="btn btn-primary">Simpan</button>
		</form>
	</div>
</div>
