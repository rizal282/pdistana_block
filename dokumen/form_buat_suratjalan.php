<?php
	if(isset($_POST["suratjalan_tr"])){
		$suratjalan_tr = $_POST["suratjalan_tr"];

		$sqlgetdatapembeli = mysqli_query($koneksi, "select * from order_pembeli where no_transaksi = '".$suratjalan_tr."'");
		$rowpembeli = mysqli_fetch_array($sqlgetdatapembeli);
	}

	include_once "proses/proses_buat_suratjalan.php";
?>
<h4>Data Pembeli Barang</h4>

<table class="table">
	<tr>
		<th>No Transaksi</th>
		<td>
			<div class="row">
				<div class="col-lg-1">
				<form method="post" action="<?php echo $url; ?>">
					<input type="hidden" name="menu" value="lihatselengkapnya">
					<input type="hidden" name="id_tr_order" value="<?php echo $rowpembeli["no_transaksi"]; ?>">
					<button class="btn btn-link" type="submit"><?php echo $rowpembeli["no_transaksi"]; ?></button>
				</form>
			</div>
			<div class="col-lg-11">
				<small>* Klik Untuk Melihat Selengkapnya</small>
			</div>
			</div>
		</td>
	</tr>
	<tr>
		<th>Kepada</th>
		<td><?php echo $rowpembeli["nama_pembeli"]; ?></td>
	</tr>
	<tr>
		<th>Alamat</th>
		<td><?php echo $rowpembeli["alamat_pembeli"]; ?></td>
	</tr>
	<tr>
		<th>Wilayah</th>
		<td><?php echo $rowpembeli["wilayah"]; ?></td>
	</tr>
	<tr>
		<th>No HP</th>
		<td><?php echo $rowpembeli["nohp_pembeli"]; ?></td>
	</tr>
</table>

<h4>Form Buat Surat Jalan</h4>
<form action="<?php echo $url; ?>" method="post" class="form-horizontal" target="_blank">
	<div class="form-group">
		<label>Penanggung Jawab</label>
		<input type="hidden" name="menu" value="pagesuratjalan">
		<input type="hidden" id="suratjalan_tr" name="suratjalan_tr" value="<?php echo $rowpembeli["no_transaksi"]; ?>">
		<input autocomplete="off" type="text" name="png_jawab" id="png_jawab" class="form-control" required>
	</div>
	<div class="form-group">
		<label>Nama Supir</label>

		<?php
			$cekjeniskirim = mysqli_query($koneksi, "select jns_pengiriman from total_bayar_pembeli where no_transaksi = '".$rowpembeli["no_transaksi"]."' ");
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
		<input autocomplete="off" type="text" id="pembuat" name="pembuat" class="form-control" required>
	</div>
	<div class="form-group">
		<label>No Kendaraan</label>
		<input autocomplete="off" type="text" id="no_kendaraan" name="no_kendaraan" class="form-control" required>
	</div>
	<div class="form-group">
		<!-- <label>No Transaksi</label> -->
		<input type="hidden" name="no_transaksi_srtjalan" class="form-control" value="<?php echo $rowpembeli["no_transaksi"]; ?>" >
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
	<div class="form-group">
		<label>Catatan</label>
		<input autocomplete="off" type="text" name="catatan" id="catatan" class="form-control">
	</div>

	<button type="submit" class="btn btn-primary" name="btn_suratjalan" id="btn_suratjalan">Buat Surat Jalan</button>
</form>