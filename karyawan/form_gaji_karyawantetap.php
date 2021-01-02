<div class="card">
	<div class="card-header">Form Penggajian Karyawan Produksi & Supir</div>
	<div class="card-body">
		<form class="form-horizontal" action="<?php echo $url; ?>" method="post" target="_blank">
			<input type="hidden" name="menu" value="proseshitunggajikrytetap">
			<div class="form-group">
				<label>Tanggal Penggajian</label>
				<input type="text" name="tgl_gaji" id="tgl_gaji" class="form-control" required>
			</div>
			<div class="form-group">
				<label>Nama Karyawan</label>
				<input type="hidden" name="id_nudigaji" value="" id="id_nudigaji">
				<input type="hidden" name="group_kry" value="" id="group_kry">`
				<select name="nudigaji" class="form-control" id="nudigaji">
					<option value="">Pilih :</option>

					<?php
						$stafflapangan = mysqli_query($koneksi, "select * from karyawan where group_kry = 'Produksi' or group_kry = 'Supir' order by nama_kry asc");
						while($rowstafflapangan = mysqli_fetch_array($stafflapangan)){
					?>
							<option value="<?php echo $rowstafflapangan["nama_kry"]; ?>"><?php echo $rowstafflapangan["nama_kry"]; ?></option>
					<?php
						}
					?>
				</select>
			</div>
			<div id="periodegaji">
				<div class="form-group">
					<label>Periode Penggajian</label>
				</div>
				<div class="row">
					<div class="col-lg-6">
						<div class="form-group">
							<input class="form-control" type="text" name="tgl_awal" id="tgl_awalperiodegaji" placeholder="Masukkan Tanggal Awal" required>
						</div>
					</div>
					<div class="col-lg-6">
						<div class="form-group">
							<input class="form-control" type="text" name="tgl_akhir" id="tgl_akhirperiodegaji" placeholder="Masukkan Tanggal Akhir" required>
						</div>
					</div>
				</div>
			</div>

			<div class="form-group">
				<label>Total Upah</label>
				<input type="hidden" name="bayar_kasbon" id="bayar_kasbon" value="">
				<input id="total_upah" type="text" name="total_upah" class="form-control" readonly>
			</div>
			<!--<div class="form-group">
				<label id="tem">Total Kasbon</label>
				<input id="total_kasbon" type="text" name="total_kasbon" class="form-control" readonly>
			</div>
			 <div class="form-group">
				<label>Total Bayar Kasbon</label>
				<input type="hidden" name="idkasbon" id="idkasbon">
				<input onkeyup="format_angka(this)" autocomplete="off" type="text" id="bayar_kasbon" name="bayar_kasbon" class="form-control" readonly>
			</div> -->
			<div class="form-group">
				<div class="row">
					<div class="col-lg-12">
						<label for="">Pilih Kasbon Karyawan :</label>
						<select name="kasbonnmkaryawan" id="kasbonnmkaryawan" class="form-control">
							<option>Pilih :</option>
							<?php 
								$getkaryawan = mysqli_query($koneksi, "select * from karyawan order by nama_kry");
								while($rowkaryawan = mysqli_fetch_array($getkaryawan)){
							?>
									<option value="<?php echo $rowkaryawan["id_kry"] ?>"><?php echo $rowkaryawan["nama_kry"] ?></option>
							<?php
								}
							?>
						</select>
					</div>
				</div>
			</div>
			<div class="form-group">
				<label>Masukkan Nominal Bayar Kasbon</label>
				<input type="text" class="form-control" id="nominalbyrkasbon" onkeyup="format_angka(this)">
				<p></p>
				
			</div>
			<!-- tabel data kasbon yang akan dibayar -->
			<div class="form-group">
				<a id="tambahbyrkasbonkry" href="#" class="btn btn-primary">Add</a>
				<a id="lihatbyrkasbonkry" href="#" class="btn btn-primary">Lihat Data</a>
				<p></p>
				<table class="table table-bordered">
					<thead>
						<tr>
							<th>Nama Karyawan</th>
							<th>Nominal Kasbon</th>
							<th>Hapus</th>
						</tr>
					</thead>
					<tbody id="datatempkasbon"></tbody>
				</table>
			</div>
			<!-- end -->
			<div class="form-group">
				<label>Sisa Upah</label>
				<input type="text" id="sisa_upah" name="sisa_upah" class="form-control" readonly>
			</div>
			<!-- <div class="form-group">
				<label>Sisa Kasbon</label>
				<input type="text" id="sisa_kasbon" name="sisa_kasbon" class="form-control" readonly>
			</div> -->
			<div class="form-group">
				<label>Keterangan</label>
				<textarea name="keterangan" class="form-control" required></textarea>
			</div>

			<button type="submit" class="btn btn-primary"><i class="fas fa-print"></i> Cetak Slip Gaji</button>
		</form>
	</div>
</div>
