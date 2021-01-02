<?php
	if(isset($_POST["id_kry"])){
		$id_kry = $_POST["id_kry"];
		$nama_supir = $_POST["nama_supir"];

		// mengambil data karyawan sesuai id nya
		$sqlgetdatakaryawan = "select * from karyawan where id_kry = '".$id_kry."'";
		$aksigetkaryawan = mysqli_query($koneksi, $sqlgetdatakaryawan);
		$rowdatakaryawan = mysqli_fetch_array($aksigetkaryawan);

		// mengambil data histori pekerjaan karyawan
		$sqlgethistoripekerjaan = "select * from surat_jalan inner join order_pembeli on surat_jalan.no_transaksi = order_pembeli.no_transaksi inner join total_bayar_pembeli on surat_jalan.no_transaksi = total_bayar_pembeli.no_transaksi inner join wilayah on surat_jalan.id_wilayah = wilayah.id_wilayah where surat_jalan.id_supir = '".$nama_supir."' and surat_jalan.uang_jalan = 'Ya' order by surat_jalan.id_surat_jalan desc";
		$aksigethistoripekerjaan = mysqli_query($koneksi, $sqlgethistoripekerjaan);
?>

<div class="card">
	<div class="card-header">Detail Pekerjaan Karyawan</div>
	<div class="card-body">
		<div class="alert alert-success">Data Diri Karyawan</div>
		<table class="table table-bordered">
			<tr>
				<th>ID Karyawan</th>
				<td><?php echo $rowdatakaryawan["id_kry"]; ?></td>
			</tr>
			<tr>
				<th>Nama Karyawan</th>
				<td><?php echo $rowdatakaryawan["nama_kry"]; ?></td>
			</tr>
			<tr>
				<th>Group</th>
				<td><?php echo $rowdatakaryawan["group_kry"]; ?></td>
			</tr>
			<tr>
				<th>Pekerjaan</th>
				<td>-</td>
			</tr>
		</table>

		<div class="alert alert-success">Data Pekerjaan</div>

		<div class="table-responsive">
			<table id="tbl_kerjasupir" class="table table-bordered" cellspacing="0" width="100%">
				<thead>
					<tr>
						<th>No</th>
						<th>Tanggal</th>
						<th>No Transaksi</th>
						<th>Tujuan</th>
						<th>Wilayah</th>
						<th>Nominal Uang Jalan</th>
					</tr>
				</thead>
				<tbody>
					<?php
						$nomor = 1;
						while ($rowhistoripekerjaan = mysqli_fetch_array($aksigethistoripekerjaan)) {
					?>
							<tr>
								<td><?php echo $nomor; ?></td>
								<td><?php echo date("d M Y", strtotime($rowhistoripekerjaan["tgl_dibuat"])); ?></td>
								<td><?php echo $rowhistoripekerjaan["no_transaksi"]; ?></td>
								<td><?php echo $rowhistoripekerjaan["alamat_pembeli"]; ?></td>
								<td><?php echo $rowhistoripekerjaan["wilayah"]; ?></td>
								<td>Rp <?php echo number_format($rowhistoripekerjaan["nominal_uangjalan"],0,",","."); ?></td>
							</tr>
					<?php
							$nomor ++;
						}
					?>
				</tbody>
			</table>
		</div>
	</div>
</div>
<p></p>
<div class="card">
	<div class="card-header"><i class="fas fa-list"></i> Data Pekerjaan Tambahan Supir</div>
	<div class="card-body">
		<div class="row">
			<div class="col-lg-12 aligntmbkerjasupir">
				<form action="<?php echo $url; ?>" method="post">
					<input type="hidden" name="menu" value="tambahpekerjaansupir">
					<input type="hidden" name="id_supir" value="<?php echo $id_kry; ?>">
					<button type="submit" class="btn btn-primary"><i class="fas fa-plus"></i> Tambah Pekerjaan Supir</button>
				</form>
			</div>
		</div>
		<table id="tbl_kerjatambahansupir" class="table table-bordered">
			<thead>
				<tr>
					<th>No</th>
					<th>Tanggal</th>
					<th>Nama Supir</th>
					<th>Pekerjaan</th>
					<th>Nominal</th>
				</tr>
			</thead>
			<tbody>
				<?php
					$sqlgetpekerjaantambahansupir = "select * from pekerjaansupir_tambahan inner join karyawan on pekerjaansupir_tambahan.id_supir = karyawan.id_kry where pekerjaansupir_tambahan.id_supir = '".$nama_supir."'";
					$aksigetpekerjaantambahansupir = mysqli_query($koneksi, $sqlgetpekerjaantambahansupir);
				?>

				<?php
					$nomor = 1;
					while($rowpekerjaantambahansupir = mysqli_fetch_array($aksigetpekerjaantambahansupir)){
				?>
						<tr>
							<td><?php echo $nomor; ?></td>
							<td><?php echo $rowpekerjaantambahansupir["tanggal"]; ?></td>
							<td><?php echo $rowpekerjaantambahansupir["nama_kry"]; ?></td>
							<td><?php echo $rowpekerjaantambahansupir["pekerjaan"]; ?></td>
							<td>Rp <?php echo number_format($rowpekerjaantambahansupir["nominal"],0,",","."); ?></td>
						</tr>
				<?php
						$nomor ++;
					}
				?>
			</tbody>
		</table>
	</div>
</div>

<?php
		
	}
?>