<?php
	if(isset($_POST["id_kasbon"])){
		$id_kasbon = $_POST["id_kasbon"];

		$getdatakasbon = mysqli_query($koneksi, "select * from kasbon_kry inner join karyawan on kasbon_kry.id_kry = karyawan.id_kry where kasbon_kry.id_kasbon = ".$id_kasbon);
		$rowkasbonkry = mysqli_fetch_array($getdatakasbon);
	}
?>

<div class="card">
	<div class="card-header">
		Form Edit Kasbon Karyawan
	</div>
	<div class="card-body">
		<form class="form-horizontal" method="post" action="<?php echo $url; ?>">
			<div class="form-group">
				<label>Tanggal Kasbon</label>
				<input type="hidden" name="menu" value="proseseditkasbonkaryawan">
				<input type="hidden" name="id_kasbon" value="<?php echo $rowkasbonkry["id_kasbon"]; ?>">
				<input type="text" id="tgl_kasbon" name="tgl_kasbon" class="form-control" value="<?php echo $rowkasbonkry["tgl_kasbon"] ?>">
			</div>
			<div class="form-group">
				<label>Nama Karyawan</label>
				<input type="hidden" name="id_kryasal" value="<?php echo $rowkasbonkry["id_kry"] ?>" id="id_kry">
				<input type="hidden" name="id_kry" value="" id="id_kry">
				<input autocomplete="off" id="nama_karyawan" class="form-control" type="text" name="nm_kry" value="<?php echo $rowkasbonkry["nama_kry"] ?>">
			</div>

			<div class="form-group">
				<label>Nominal Kasbon</label>
				<input type="hidden" name="kasbon_asal" value="<?php echo $rowkasbonkry["nominal"] ?>">
				<input autocomplete="off" type="text" name="nominal" class="form-control" value="<?php echo number_format($rowkasbonkry["nominal"],0,",","."); ?>" onkeyup="format_angka(this)">
			</div>

			<button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan Kasbon</button>
		</form>
	</div>
</div>