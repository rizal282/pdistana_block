<?php
	if(isset($_POST["id_wilayah"])){
		$id_wilayah = $_POST["id_wilayah"];

		$ambildatawilayah = mysqli_query($koneksi, "select * from wilayah where id_wilayah = '".$id_wilayah."'");
		$roweditwilayah = mysqli_fetch_array($ambildatawilayah);
	}
?>

<div class="card">
	<div class="card-header">Form Edit Wilayah</div>
	<div class="card-body">
		<form class="form-horizontal" method="post" action="<?php echo $url; ?>">
			<div class="form-group">
				<label>Nama Wilayah</label>
				<input type="hidden" name="menu" value="proseseditwilayah">
				<input type="hidden" name="id_wilayah" value="<?php echo $roweditwilayah["id_wilayah"]; ?>">
				<input type="text" name="nama_wilayah" class="form-control" value="<?php echo $roweditwilayah["nama_wilayah"]; ?>">
			</div>
			<div class="form-group">
				<label>Nominal Uang Jalan</label>
				<input type="text" name="nominal_uangjalan" class="form-control" value="<?php echo $roweditwilayah["nominal_uangjalan"]; ?>">
			</div>

			<button type="submit" class="btn btn-primary">Perbarui</button>
		</form>
	</div>
</div>