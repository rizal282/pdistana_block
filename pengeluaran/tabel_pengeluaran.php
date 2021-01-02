<table id="tbl_pengeluaran" class="table table-bordered" width="100%" cellspacing="0">
	<thead>
		<tr>
			<th>No</th>
			<th>Tanggal</th>
			<th>No Transaksi</th>
			<th>Nama Pengeluaran</th>
			<th>Jenis Pengeluaran</th>
			<th>Nominal</th>
		</tr>
	</thead>
	<tbody>
		<?php
			$sqlgetpengeluaran = "select * from pengeluaran order by id_pengeluaran desc";
			$aksigetpengeluaran = mysqli_query($koneksi, $sqlgetpengeluaran);

			$nomor = 1;
			while($rowpengeluaran = mysqli_fetch_array($aksigetpengeluaran)){
		?>
				<tr>
					<td><?php echo $nomor; ?></td>
					<td><?php echo $rowpengeluaran["tgl_pengeluaran"]; ?></td>
					<td><?php echo $rowpengeluaran["no_transaksi"]; ?></td>
					<td><?php echo $rowpengeluaran["nama_pengeluaran"]; ?></td>
					<td><?php echo $rowpengeluaran["jenis_pengeluaran"]; ?></td>
					<td><?php echo $rowpengeluaran["nominal"]; ?></td>
				</tr>
		<?php
				$nomor ++;
			}
		?>
	</tbody>
</table>