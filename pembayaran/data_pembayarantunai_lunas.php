<div class="card">
	<div class="card-header">
		<i class="fas fa-list"></i> Data Pembayaran Tunai Pembeli yang Sudah Lunas
	</div>
	<div class="card-body">
		<table class="table table-bordered" width="100%" cellspacing="0" id="tbl_bayartunai">
			<thead>
				<tr>
					<th>No</th>
					<th>No Transaksi</th>
					<th>Tgl Beli</th>
					<th>Nama Pembeli</th>
					<th>No HP</th>
					<th>Alamat</th>
					<th>Wilayah</th>
					<th>Pembayaran</th>
					<th>Ket</th>
					<th>Status Lunas</th>
					<th>Detail</th>
				</tr>
			</thead>
			<tbody>
				<?php
					$sqlgetdatapembelitunai = "select * from order_pembeli inner join total_bayar_pembeli on order_pembeli.no_transaksi = total_bayar_pembeli.no_transaksi where order_pembeli.pembayaran = 'Tunai' and total_bayar_pembeli.sts_lunas = 'Sudah Lunas' order by order_pembeli.id_order desc";
					$aksigetdatapembelitunai = mysqli_query($koneksi, $sqlgetdatapembelitunai);

					$nomor = 1;
					while($rowpembelitunai = mysqli_fetch_array($aksigetdatapembelitunai)){
				?>
						<tr>
							<td><?php echo $nomor; ?></td>
							<td><?php echo $rowpembelitunai["no_transaksi"]; ?></td>
							<td><?php echo date("d M Y", strtotime($rowpembelitunai["tgl_beli"])); ?></td>
							<td><?php echo $rowpembelitunai["nama_pembeli"]; ?></td>
							<td><?php echo $rowpembelitunai["nohp_pembeli"]; ?></td>
							<td><?php echo $rowpembelitunai["alamat_pembeli"]; ?></td>
							<td><?php echo $rowpembelitunai["wilayah"]; ?></td>
							<td><?php echo $rowpembelitunai["pembayaran"]; ?></td>
							<td><?php echo $rowpembelitunai["keterangan"]; ?></td>
							<td><?php echo $rowpembelitunai["sts_lunas"]; ?></td>
							<td>
								<form method="post" action="<?php echo $url; ?>">
									<input type="hidden" name="menu" value="detailpembeli">
									<input type="hidden" name="notrbeli" value="<?php echo $rowpembelitunai["no_transaksi"]; ?>">
									<button class="btn btn-primary" type="submit"><i class="fas fa-info-circle"></i></button>
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
