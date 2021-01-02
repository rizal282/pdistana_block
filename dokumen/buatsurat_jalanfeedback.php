<h4>Form Buat Surat Jalan</h4>


<form action="<?php echo $url; ?>" method="post" class="form-horizontal" target="_blank">
	<div class="form-group">
		<label>Penanggung Jawab</label>
		<input type="hidden" name="menu" value="pagesuratjalanfeedback">
		<input type="hidden" name="suratjalan_tr" value="<?php echo $no_trsurat; ?>">
		<input autocomplete="off" type="text" name="png_jawab" class="form-control" required>
	</div>
	<div class="form-group">
		<label>Nama Supir</label>
		<?php
			$cekjeniskirim = mysqli_query($koneksi, "select jns_pengiriman from total_bayar_pembeli where no_transaksi = '".$no_trsurat."' ");
			$rowcekjeniskirim = mysqli_fetch_array($cekjeniskirim);

			if($rowcekjeniskirim["jns_pengiriman"] == "Diantar"){
		?>
				<input type="hidden" id="id_supir" name="id_supir" value="">
				<!--<input autocomplete="off" type="text" name="nama_supir" class="form-control" id="nama_supir" required>-->
				<select id="nama_supir" class="form-control" name="nama_supir">
					<option value="">Pilih :</option>
					<?php
						$namasupir = mysqli_query($koneksi, "select * from karyawan where group_kry = 'Supir' order by nama_kry asc");
						while($rownamasupir = mysqli_fetch_array($namasupir)){
					?>
							<option value="<?php echo $rownamasupir["nama_kry"]; ?>"><?php echo $rownamasupir["nama_kry"]; ?></option>
					<?php
						}
					?>
				</select>
		<?php
			}else{
		?>
				<input autocomplete="off" type="text" class="form-control" name="nama_supir" placeholder="Masukan Nama Supir">
		<?php
			}
		?>
		
		
	</div>
	<div class="form-group">
		<label>Nama Pembuat Surat Jalan</label>
		<input autocomplete="off" type="text" name="pembuat" class="form-control" required>
	</div>
	<div class="form-group">
		<label>No Kendaraan</label>
		<input autocomplete="off" type="text" name="no_kendaraan" class="form-control" required>
	</div>

	<div class="form-group">
		<div class="row">
			<div class="col-lg-6">
				<label>Wilayah</label>
				<input type="hidden" id="id_wilayah" name="id_wilayah" value="">
				<!--<input autocomplete="off" type="text" id="wilayah" name="wilayah" class="form-control" required>-->
				<select class="form-control" name="wilayah" id="wilayah">
					<option value="">Pilih :</option>
					<?php
						$namawilayah = mysqli_query($koneksi, "select * from wilayah order by nama_wilayah asc");
						while($rownamawilayah = mysqli_fetch_array($namawilayah)){
					?>
							<option value="<?php echo $rownamawilayah["nama_wilayah"]; ?>"><?php echo $rownamawilayah["nama_wilayah"]; ?></option>
					<?php
						}
					?>
				</select>
			</div>
			<div class="col-lg-6">
				<label>Status Uang Jalan</label>
				<!--<input type="hidden" id="id_wilayah" name="id_wilayah" value="">
				<input autocomplete="off" type="text" id="wilayah" name="wilayah" class="form-control" required>-->
				<select class="form-control" name="ytuangjalan" id="wilayah">
					<option value="">Pilih :</option>
					<option value="Ya">Ya</option>
					<option value="Tidak">Tidak</option>
				</select>
			</div>
		</div>
		
	</div>
	<div class="form-group">
		<label>Tanggal Surat Jalan</label>
		<input autocomplete="off" type="text" name="tgl_suratjln" id="tgl_suratjln" class="form-control" required>
	</div>

	<button type="submit" class="btn btn-primary">Buat Surat Jalan</button>
</form>