<?php
	if(isset($_POST["id_kry"])){
		$id_kry = $_POST["id_kry"];

		// mengambil data karyawan sesuai id nya
		$sqlgetdatakaryawan = "select * from karyawan where id_kry = '".$id_kry."'";
		$aksigetkaryawan = mysqli_query($koneksi, $sqlgetdatakaryawan);
		$rowdatakaryawan = mysqli_fetch_array($aksigetkaryawan);

		// mengambil data histori pekerjaan karyawan
		$sqlgethistoripekerjaan = "select * from historikerjakaryawan inner join stock_barang on historikerjakaryawan.kode_brg = stock_barang.kode_barang where historikerjakaryawan.id_kry = '".$id_kry."' order by historikerjakaryawan.id_histori desc";
		$aksigethistoripekerjaan = mysqli_query($koneksi, $sqlgethistoripekerjaan);

		// $sqlgettemppekerjaan = "select * from tempstock_barangkry inner join stock_barang on tempstock_barangkry.kode_brg = stock_barang.kode_barang where tempstock_barangkry.id_kry = '".$id_kry."' order by tempstock_barangkry.id_tempstock desc";
		// $aksigettemppekerjaan = mysqli_query($koneksi, $sqlgettemppekerjaan);
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
				<th>Tempat Lahir</th>
				<td><?php echo $rowdatakaryawan["tempat_lhr"]; ?></td>
			</tr>
			<tr>
				<th>Tanggal Lahir</th>
				<td><?php echo date("d M Y", strtotime($rowdatakaryawan["tgl_lhr"])); ?></td>
			</tr>
			<tr>
				<th>Alamat</th>
				<td><?php echo $rowdatakaryawan["alamat_kry"]; ?></td>
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

		<div class="alert alert-success">Data Pekerjaan Karyawan</div>

			<div class="row">
				<div class="col-lg-12">
					<div class="form-inline">
						<div class="form-group">
							<input type="hidden" name="id_kryhistori" id="id_kryhistori" value="<?php echo $id_kry; ?>">
							<input type="text" name="tglhistoriproduksiawal" id="tglhistoriproduksiawal" class="form-control" placeholder="Tgl Filter Awal">
						</div>
						<div class="form-group">
							<input type="text" name="tglhistoriproduksiakhir" id="tglhistoriproduksiakhir" class="form-control" placeholder="Tgl Filter Akhir">
						</div>

						<button class="btn btn-info" type="submit" id="btnfilterhistori"><i class="fas fa-eye"></i> Lihat Data</button>
					</div>
				</div>
			</div>

			<table id="historistockkry" class="table table-bordered" cellspacing="0" width="100%">
				<thead>
					<tr>
						<th>No</th>
						<th>Tgl Pekerjaan</th>
						<th>Nama Barang</th>
						<th>Qty Barang</th>
						<th>Qty Semen</th>
						<th>Pekerjaan</th>
						<th>Keterangan</th>
						<th>Edit</th>
						<th>Hapus</th>
						<!-- <th>Opsi</th> -->
					</tr>
				</thead>
				<tbody id="filterproduksikry">
					<?php
						$nomor = 1;
						while ($rowhistoripekerjaan = mysqli_fetch_array($aksigethistoripekerjaan)) {
					?>
							<tr>
								<td><?php echo $nomor; ?></td>
								<td><?php echo date("d M Y", strtotime($rowhistoripekerjaan["tgl"])); ?></td>
								<td><?php echo $rowhistoripekerjaan["nama_barang"]; ?></td>
								<td><?php echo $rowhistoripekerjaan["qty_brg"]; ?></td>
								<td><?php echo $rowhistoripekerjaan["qty_semen"]; ?></td>
								<td><?php echo $rowhistoripekerjaan["pekerjaan"]; ?></td>
								<td><?php echo $rowhistoripekerjaan["keterangan"]; ?></td>
								<td>
									<form action="<?php echo $url; ?>" method="post">
										<input type="hidden" name="menu" value="edit_pekerjaan_kry">
										<input type="hidden" name="id_histori" value="<?php echo $rowhistoripekerjaan["id_histori"]; ?>">
										<button type="submit" class="btn btn-success"><i class="fas fa-edit"></i></button>
									</form>
								</td>
								<td>
									<form action="" method="post">
										<input type="hidden" name="menu" value="hapuskerjakry">
										<input id="id_histori" type="hidden" name="id_histori" value="<?php echo $rowhistoripekerjaan["id_histori"]; ?>">
										<button id="hapus_pekerjaan_kry" type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button>
									</form>
								</td>
								<!-- <td></td> -->
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