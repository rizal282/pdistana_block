<h2>Histori Semua Pengeluaran</h2>

<!-- <div class="row">
	<div class="col-lg-12 alignpengeluaranharian">
		<form class="form-inline" action="<?php echo $url; ?>" method="post">
			<div class="form-group mb-2">
				<input type="hidden" name="menu" name="filter_histori">
			    <input id="tgl_awal" type="text" class="form-control" placeholder="Tanggal Awal" name="tgl_awal" required>
			</div>
			<div class="form-group mx-sm-3 mb-2">
			    <input id="tgl_akhir" type="text" class="form-control" placeholder="Tanggal Akhir" name="tgl_akhir" required>
			</div>
			<button type="submit" class="btn btn-primary mb-2">Filter</button>
		</form>
	</div>
</div> -->

<div class="card paddingcardhistori">
	<div class="card-header">Histori Pembayaran Bahan Baku</div>
	<div class="card-body">
		<table id="historipembayaranbahanbaku" class="table table-bordered" width="100%" cellspacing="0">
			<thead>
				<tr>
					<th>No</th>
					<th>Tanggal Bayar</th>
					<th>Nomor Transaksi</th>
					<th>Nominal DP</th>
					<th>Nominal Cicilan/Cash</th>
					<th>Sisa Tagihan</th>
				</tr>
			</thead>
			<tbody>
				<?php 
					$sqlgetbayarbhnbaku = "select * from pembayaran_bahanbaku order by id_bayar_bahanbaku desc";
					$aksigetbayarbhnbaku = mysqli_query($koneksi, $sqlgetbayarbhnbaku);

					$nomor = 1;
					while($rowpengeluaranharian = mysqli_fetch_array($aksigetbayarbhnbaku)){
				?>
						<tr>
							<td><?php echo $nomor; ?></td>
							<td><?php echo date("d M Y", strtotime($rowpengeluaranharian["tgl_bayar"])); ?></td>
							<td><?php echo $rowpengeluaranharian["no_transaksi"]; ?></td>
							<td><?php echo "Rp ".number_format($rowpengeluaranharian["nominal_dp"],1,",","."); ?></td>
							<td><?php echo "Rp ".number_format($rowpengeluaranharian["nominal_cash"],1,",","."); ?></td>
							<td><?php echo "Rp ".number_format($rowpengeluaranharian["sisa_tagihan"],1,",","."); ?></td>
						</tr>
				<?php
						$nomor ++;
					}
				?>
			</tbody>
		</table>
	</div>
</div>

<div class="card paddingcardhistori">
	<div class="card-header">Histori Pengeluaran Harian</div>
	<div class="card-body">

		<table id="pengeluaran_harian" class="table table-bordered" width="100%" cellspacing="0">
			<thead>
				<tr>
					<th>No</th>
					<th>Tanggal</th>
					<th>Nama Beban</th>
					<th>Nominal</th>
					<th>Keterangan</th>
					<th>Edit</th>
					<th>Hapus</th>
				</tr>
			</thead>
			<tbody id="datafilterpengeluaranharian">
				<?php
					$sqlgetpengeluaranharian = "select * from pengeluaran where tgl_pengeluaran = '".date("Y-m-d")."' and jenis_pengeluaran = 'Pengeluaran Harian' order by id_pengeluaran desc";
					$aksigetpengeluaranharian = mysqli_query($koneksi, $sqlgetpengeluaranharian);

					$nomor = 1;
					while($rowpengeluaranharian = mysqli_fetch_array($aksigetpengeluaranharian)){
				?>
						<tr>
							<td><?php echo $nomor; ?></td>
							<td><?php echo date("d M Y", strtotime($rowpengeluaranharian["tgl_pengeluaran"])); ?></td>
							<td><?php echo $rowpengeluaranharian["nama_pengeluaran"]; ?></td>
							<td><?php echo "Rp ". number_format($rowpengeluaranharian["nominal"],1,",","."); ?></td>
							<td><?php echo $rowpengeluaranharian["jenis_pengeluaran"]; ?></td>
							<td>
								<form action="<?php echo $url; ?>" method="post">
									<input type="hidden" name="menu" value="editpengeluaranharian">
									<input type="hidden" name="id_pengeluaranharian" value="<?php echo $rowpengeluaranharian["id_pengeluaran"]; ?>">
									<button class="btn btn-warning" type="submit"><i class="fas fa-edit"></i> Edit</button>
								</form>
							</td>
							<td>
								<form action="<?php echo $url; ?>" method="post">
									<input type="hidden" name="menu" value="hapuspengeluaranharian">
									<input type="hidden" name="id_pengeluaranharian" value="<?php echo $rowpengeluaranharian["id_pengeluaran"]; ?>">
									<button class="btn btn-danger" type="submit"><i class="fas fa-trash"></i> Hapus</button>
								</form>
							</td>
						</tr>
				<?php
						$nomor ++;
					}
				?>
			</tbody>
		</table>
	</div>
</div>

<div class="card paddingcardhistori">
	<div class="card-header">Histori Pengeluaran Lain-lain</div>
	<div class="card-body">
		<table class="table table-bordered" id="table_pengeluaranlain">
			<thead>
				<tr>
					<th>No</th>
					<th>Tanggal</th>
					<th>Nama Beban</th>
					<th>No Pelanggan</th>
					<th>Nominal</th>
					<th>Keterangan</th>
					<th>Edit</th>
					<th>Hapus</th>
				</tr>
			</thead>
			<tbody id="datafilterpengeluaranlain">
				<?php
					$sqlgetpengeluaranlain = "select * from pengeluaran where tgl_pengeluaran = '".date("Y-m-d")."' and jenis_pengeluaran = 'Pengeluaran Lain-lain' order by id_pengeluaran desc";
					$aksigetpengeluaranlain = mysqli_query($koneksi, $sqlgetpengeluaranlain);

					$nomor = 1;
					while($rowpengeluaranlain = mysqli_fetch_array($aksigetpengeluaranlain)){
				?>
						<tr>
							<td><?php echo $nomor; ?></td>
							<td><?php echo date("d M Y", strtotime($rowpengeluaranlain["tgl_pengeluaran"])); ?></td>
							<td><?php echo $rowpengeluaranlain["nama_pengeluaran"]; ?></td>
							<td><?php echo $rowpengeluaranlain["no_pelanggan"]; ?></td>
							<td><?php echo "Rp ". number_format($rowpengeluaranlain["nominal"],1,",","."); ?></td>
							<td><?php echo $rowpengeluaranlain["keterangan"]; ?></td>
							<td>
								<form action="<?php echo $url; ?>" method="post">
									<input type="hidden" name="menu" value="editpengeluaranlain">
									<input type="hidden" name="id_pengeluaran_lain" value="<?php echo $rowpengeluaranlain["id_pengeluaran"]; ?>">
									<button type="submit" class="btn btn-warning"><i class="fas fa-edit"></i> Edit</button>
								</form>
							</td>
							<td>
								<form action="<?php echo $url; ?>" method="post">
									<input type="hidden" name="menu" value="hapuspengeluaranlain">
									<input type="hidden" name="id_pengeluaran_lain" value="<?php echo $rowpengeluaranlain["id_pengeluaran"]; ?>">
									<button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i> Hapus</button>
								</form>
							</td>
						</tr>
				<?php
						$nomor ++;
					}
				?>
			</tbody>
		</table>
	</div>
</div>

<div class="card paddingcardhistori">
	<div class="card-header">
		Histori Kasbon Karyawan
	</div>
	<div class="card-body">
		<table class="table table-bordered" id="tbl_kasbon" cellspacing="0" width="100%">
			<thead>
				<tr>
					<th>No</th>
					<th>Tanggal</th>
					<th>Nama Karyawan</th>
					<th>Group</th>
					<th>Kasbon</th>
					<th>Status Lunas</th>
					<th>Edit</th>
					<td>Hapus</td>
				</tr>
			</thead>
			<tbody>
				<?php
					$sqlgetkasbonkaryawan = "select * from kasbon_kry inner join karyawan on kasbon_kry.id_kry = karyawan.id_kry order by kasbon_kry.id_kasbon desc";
					$aksigetkasbon = mysqli_query($koneksi, $sqlgetkasbonkaryawan);

					$nomor = 1;
					while($rowkasbon = mysqli_fetch_array($aksigetkasbon)){
				?>
						<tr>
							<td><?php echo $nomor; ?></td>
							<td><?php echo date("d M Y", strtotime($rowkasbon["tgl_kasbon"])); ?></td>
							<td><?php echo $rowkasbon["nama_kry"]; ?></td>
							<td><?php echo $rowkasbon["group_kry"]; ?></td>
							<td><?php echo "Rp ". number_format($rowkasbon["nominal"],1,",","."); ?></td>
							<td><?php echo $rowkasbon["sts_kasbon"]; ?></td>
							<td>
								<form action="<?php echo $url; ?>" method="post">
									<input type="hidden" name="menu" value="editkasbonkaryawan">
									<input type="hidden" name="id_kasbon" value="<?php echo $rowkasbon["id_kasbon"]; ?>">
									<button type="submit" class="btn btn-warning"><i class="fas fa-edit"></i></button>
								</form>
							</td>
							<td>
								<form action="<?php echo $url; ?>" method="post">
									<input type="hidden" name="menu" value="hapuskasbonkaryawan">
									<input type="hidden" name="id_krykasbon" value="<?php echo $rowkasbon["id_kry"]; ?>">
									<input type="hidden" name="tgl_kasbon" value="<?php echo $rowkasbon["tgl_kasbon"]; ?>">
									<input type="hidden" name="id_kasbon" value="<?php echo $rowkasbon["id_kasbon"]; ?>">
									<button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button>
								</form>
							</td>
						</tr>
				<?php
						$nomor ++;
					}
				?>
			</tbody>
		</table>
	</div>
</div>

<div class="card paddingcardhistori">
	<div class="card-header">
		Histori Pengeluaran Uang Jalan
	</div>
	<div class="card-body">
		<table class="table table-bordered" id="tbl_historisuratjalan" cellspacing="0" width="100%">
			<thead>
				<tr>
					<th>No</th>
					<th>Tanggal</th>
					<th>No Surat Jalan</th>
					<th>Nama Supir</th>
					<th>No Transaksi</th>
					<th>Nominal</th>
				</tr>
			</thead>
			<tbody>
				<?php
					$sqlgetsuratjalan = "select * from surat_jalan inner join wilayah on surat_jalan.id_wilayah = wilayah.id_wilayah inner join karyawan on surat_jalan.id_supir = karyawan.id_kry order by surat_jalan.id_surat_jalan desc";
					$aksigetsuratjalan = mysqli_query($koneksi, $sqlgetsuratjalan);

					$nomor = 1;
					while($rowsuratjalan = mysqli_fetch_array($aksigetsuratjalan)){
				?>
						<tr>
							<td><?php echo $nomor; ?></td>
							<td><?php echo date("d M Y", strtotime($rowsuratjalan["tgl_dibuat"])); ?></td>
							<td><?php echo $rowsuratjalan["no_surat_jalan"]; ?></td>
							<td><?php echo $rowsuratjalan["nama_kry"]; ?></td>
							<td><?php echo $rowsuratjalan["no_transaksi"]; ?></td>
							<td><?php echo "Rp ". number_format($rowsuratjalan["nominal_uangjalan"],1,",","."); ?></td>
						</tr>
				<?php
						$nomor ++;
					}
				?>
			</tbody>
		</table>
	</div>
</div>