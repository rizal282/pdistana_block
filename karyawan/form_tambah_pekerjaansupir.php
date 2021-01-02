<?php
	if(isset($_POST["id_supir"])){
		$id_supir = $_POST["id_supir"];
		$getnamasupir = mysqli_query($koneksi, "select id_kry, nama_kry from karyawan where id_kry = '".$id_supir."'");
		$rownamasupir = mysqli_fetch_array($getnamasupir);
	}
?>
<div class="card">
	<div class="card-header">Form Tambah Pekerjaan Supir</div>
	<div class="card-body">
		<form class="form-horizontal" action="<?php echo $url; ?>" method="post">
			<div class="form-group">
				<label>Tanggal</label>
				<input type="hidden" name="menu" value="prosestambahpekerjaansupir">
				<input type="text" name="tanggalkerjatambahan" id="tanggalkerjatambahan" class="form-control" required>
			</div>
			<div class="form-group">
				<label>Nama Supir</label>
				<!-- <input type="text" name="nama_kry" class="form-control" required> -->
				<input type="hidden" name="id_nudigaji" value="<?php echo $rownamasupir["id_kry"]; ?>" id="id_nudigaji">
				<input class="form-control" type="text" name="nudigaji" value="<?php echo $rownamasupir["nama_kry"]; ?>" readonly>
			</div>
			<div class="form-group">
				<label>Pekerjaan</label>
				<input type="text" name="pekerjaan" class="form-control" required>
			</div>
			<div class="form-group">
				<label>Nominal</label>
				<input type="text" name="nominal" class="form-control" required>
			</div>

			<button class="btn btn-primary" type="submit"><i class="fas fa-save"></i> Simpan</button>
		</form>
	</div>
</div>