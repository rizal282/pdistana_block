<?php
	if(isset($_POST["idstokbarang"])){
		$idstokbarang = $_POST["idstokbarang"];
		$kodestock = $_POST["kodestock"];

		$getdatastokbarang = mysqli_query($koneksi, "select * from stock_barang where id_barang = '".$idstokbarang."'");
		$rowstokbarang = mysqli_fetch_array($getdatastokbarang);

		$ambilterjual = mysqli_query($koneksi, "select sum(jml_terjual) as terjual from stock_terjual where kd_barang = '".$kodestock."'");
		$rowterjual = mysqli_fetch_array($ambilterjual);
	}
?>

<div class="card">
	<div class="card-header">Form Edit Nama Barang</div>
	<div class="card-body">
		<form class="form-horizontal" action="<?php echo $url; ?>" method="post">
			<div class="form-group">
				<label>Kode Barang</label>
				<input type="hidden" name="menu" value="proseseditdatastockbarang">
				<input type="hidden" name="idstock" value="<?php echo $rowstokbarang["id_barang"]; ?>">
				<input type="text" name="kode_barang" class="form-control" value="<?php echo $rowstokbarang["kode_barang"]; ?>">
			</div>
			<div class="form-group">
				<label>Nama Barang</label>
				<input autocomplete="off" type="text" name="nama_barang" class="form-control" value="<?php echo $rowstokbarang["nama_barang"]; ?>">
			</div>
			<div class="form-group">
				<label>Stock Awal</label>
				<input autocomplete="off" type="text" name="stock_awal" class="form-control" id="stock_awal" value="<?php echo $rowstokbarang["stock_awal"]; ?>">
			</div>
			<div class="form-group">
				<label>Stock Masuk</label>
				<input autocomplete="off" type="text" name="stock_masuk" class="form-control" id="stock_masuk" value="<?php echo $rowstokbarang["stock_masuk"]; ?>">
			</div>
			<div class="form-group">
				<label>Terjual</label>
				<input autocomplete="off" type="text" name="terjual" class="form-control" id="terjual" value="<?php echo $rowterjual["terjual"]; ?>">
			</div>
			<div class="form-group">
				<label>Stock Akhir</label>
				<input type="text" name="stock_akhir" class="form-control" id="stock_akhir" value="<?php echo $rowstokbarang["stock_akhir"]; ?>" readonly>
			</div>
			<div class="form-group">
				<label>Harga</label>
				<input type="text" name="harga" class="form-control" id="harga" value="<?php echo number_format($rowstokbarang["harga"],0,",","."); ?>" onkeyup="format_angka(this)">
			</div>
			<!--<div class="form-group">
				<label>Modal</label>
				<input type="text" name="modal_stock" class="form-control" id="modal_stock" value="<?php echo $rowstokbarang["modal_stock"]; ?>" onkeyup="format_angka(this)">
			</div>-->


			<button type="submit" class="btn btn-primary">Perbarui</button>
		</form>
	</div>
</div>
