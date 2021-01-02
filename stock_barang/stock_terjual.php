<div class="card">
	<div class="card-header"><i class="fas fa-list"></i> Data Stock Terjual</div>
	<div class="card-body">
		<div id="formfilterterjual" class="form-inline">
			<div class="form-group">
				<input type="text" name="tglterjualawal" id="tglterjualawal" class="form-control" placeholder="Masukan tanggal awal">
			</div>
			<div class="form-group">
				<input type="text" name="tglterjualakhir" id="tglterjualakhir" class="form-control" placeholder="Masukan tanggal akhir">
			</div>
		</div>
		
		<table class="table table-bordered" id="tbl_stockterjual" width="100%" cellspacing="0">
			<thead>
				<tr>
					<th>No</th>
					<th>Tanggal Tejual</th>
					<th>Transaksi Pembeli</th>
					<th>Kode Barang</th>
					<th>Nama Barang</th>
					<th>Terjual</th>
				</tr>
			</thead>
			<tbody id="filterterjual">
				<?php
					$sqlgetstockbarang = "SELECT * FROM stock_terjual INNER JOIN  stock_barang on stock_barang.kode_barang = stock_terjual.kd_barang WHERE stock_terjual.tgl_terjual = '".date("Y-m-d")."'";
					$aksigetstockbarang = mysqli_query($koneksi, $sqlgetstockbarang);

					$nomor = 1;
					while ($rowstockbarang = mysqli_fetch_array($aksigetstockbarang)) {
				?>
						<tr>
							<td><?php echo $nomor; ?></td>
							<td><?php echo date("d M Y", strtotime($rowstockbarang["tgl_terjual"])); ?></td>
							<td><?php echo $rowstockbarang["no_transaksi"]; ?></td>
							<td><?php echo $rowstockbarang["kd_barang"]; ?></td>
							<td><?php echo $rowstockbarang["nama_barang"]; ?></td>
							<td><?php echo $rowstockbarang["jml_terjual"]; ?></td>
						</tr>
				<?php
						$nomor ++;
					}
				?>
			</tbody>
		</table>
	</div>
</div>