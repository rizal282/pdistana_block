<div class="card">
	<div class="card-header">Form Penggajian Karyawan Staff & Lapangan</div>
	<div class="card-body">
		<form class="form-horizontal" action="<?php echo $url; ?>" method="post" target="_blank">
			<input type="hidden" name="menu" value="prosespenggajiankaryawanstafflapangan">
			<div class="form-group">
				<label>Tanggal Penggajian</label>
				<input type="text" name="tgl_gaji" id="tgl_gaji" class="form-control" required>
			</div>

			<div class="form-group">
				<label>Nama Karyawan</label>
				<!-- <input type="text" name="nama_kry" class="form-control" required> -->
				<input type="hidden" name="id_nudigajisl" value="" id="id_nudigajisl">
				<input type="hidden" name="group_kry" value="" id="group_kry">
				<!--<input autocomplete="off" id="nudigajisl" class="form-control" type="text" name="nudigajisl" required>-->
				<select id="nudigajisl" name="nudigajisl" class="form-control">
					<option value="">Pilih :</option>

					<?php
						$stafflapangan = mysqli_query($koneksi, "select * from karyawan where group_kry = 'Staff' or group_kry = 'Lapangan' order by nama_kry asc");
						while($rowstafflapangan = mysqli_fetch_array($stafflapangan)){
					?>
							<option value="<?php echo $rowstafflapangan["nama_kry"]; ?>"><?php echo $rowstafflapangan["nama_kry"]; ?></option>
					<?php
						}
					?>
				</select>
			</div>
			
			<div class="form-group">
				<label>Total Upah</label>
				<input id="total_upahsl" type="text" name="total_upahsl" class="form-control" readonly>
			</div>
			<div class="form-group">
				<label id="tem">Total Kasbon</label>
				<input id="total_kasbonsl" type="text" name="total_kasbonsl" class="form-control" readonly>
			</div>
			<div class="form-group">
				<label>Bayar Kasbon</label>
				<input onkeyup="format_angka(this)" autocomplete="off" type="text" id="bayar_kasbonsl" name="bayar_kasbonsl" class="form-control" placeholder="Isikan Jika Ada Pembayaran Kasbon atau Angka 0 Jika Tidak Ada" required>
			</div>
			<div class="form-group">
				<label>Sisa Upah</label>
				<input type="text" id="sisa_upahsl" name="sisa_upahsl" class="form-control" readonly>
			</div>
			<div class="form-group">
				<label>Sisa Kasbon</label>
				<input type="hidden" name="idkasbon" id="idkasbon">
				<input type="text" id="sisa_kasbonsl" name="sisa_kasbonsl" class="form-control" readonly>
			</div>
			<div class="form-group">
				<label>Keterangan</label>
				<textarea name="keterangan" class="form-control" required></textarea>
			</div>

			<button type="submit" class="btn btn-primary"><i class="fas fa-print"></i> Cetak Slip Gaji</button>
		</form>
	</div>
</div>