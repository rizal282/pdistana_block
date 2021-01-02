<?php
	if(isset($_POST["id_kendaraan"])){
		$id_kendaraan = $_POST["id_kendaraan"];

		$getdatakendaraan = mysqli_query($koneksi, "select * from inv_kendaraan where id_inv = '".$id_kendaraan."'");
		$rowdatakendaraan = mysqli_fetch_array($getdatakendaraan);
	}
?>

<div class="card">
	<div class="card-header">Form Edit Inventaris Kendaraan</div>
	<div class="card-body">
		<form class="form-horizontal" action="<?php echo $url; ?>" method="post">
			<div class="form-group">
				<label>Jenis Kendaraan</label>
				<input type="hidden" name="menu" value="proseseditinvkendaraan">
				<input type="hidden" name="id_editkendaraan" value="<?php echo $rowdatakendaraan["id_inv"]; ?>">
				<input class="form-control" type="text" name="jns_kendaraan" value="<?php echo $rowdatakendaraan["jns_kendaraan"]; ?>">
			</div>
			<div class="form-group">
				<label>Merek</label>
				<input class="form-control" type="text" name="merek" value="<?php echo $rowdatakendaraan["merek"]; ?>">
			</div>
			<div class="form-group">
				<label>Plat Nomor</label>
				<input class="form-control" type="text" name="plat_nomor" value="<?php echo $rowdatakendaraan["plat_nomor"]; ?>">
			</div>
			<div class="form-group">
				<label>Tanggal Terakhir Service</label>
				<input class="form-control" type="text" id="tgl_service" name="tgl_service" value="<?php echo $rowdatakendaraan["tgl_servis"]; ?>">
			</div>
			<div class="form-group">
				<label>Keterangan</label>
				<textarea class="form-control" name="keterangan"><?php echo $rowdatakendaraan["keterangan"]; ?></textarea>
			</div>

			<button type="submit" class="btn btn-primary"><i class="fas fa-pencil-alt"></i> Perbarui</button>
		</form>
	</div>
</div>