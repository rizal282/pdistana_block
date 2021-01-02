<div class="card">
	<div class="card-header">Notifikasi Jatuh Tempo Pembayaran Pembeli</div>
	<div class="card-body">
		<table id="table_notifikasi" class="table table-bordered">
			<thead>
				<tr>
					<th>No</th>
					<th>Tanggal Beli</th>
					<th>No Transaksi</th>
					<th>Nama Pembeli</th>
					<th>No. HP</th>
					<th>Jatuh Tempo</th>
				</tr>
			</thead>
			<tbody>
				<?php
					$tglskrg = date("Y-m-d");
              		$tglnotif = date('Y-m-d', strtotime('+'.$limitnotif.' days', strtotime($tglskrg)));


					$sqlgetpembayartempo = "select * from order_pembeli inner join total_bayar_pembeli on order_pembeli.no_transaksi = total_bayar_pembeli.no_transaksi where order_pembeli.jatuh_tempo = '".$tglnotif."' and total_bayar_pembeli.sts_lunas = 'Belum Lunas' and order_pembeli.pembayaran = 'Tempo'";
					$aksigetpembayatempo = mysqli_query($koneksi, $sqlgetpembayartempo);

					$nomor = 1;
					while($rowtempopembeli = mysqli_fetch_array($aksigetpembayatempo)){
				?>
						<tr>
							<td><?php echo $nomor; ?></td>
							<td><?php echo date("d M Y", strtotime($rowtempopembeli["tgl_beli"])); ?></td>
							<td><?php echo $rowtempopembeli["no_transaksi"]; ?></td>
							<td><?php echo $rowtempopembeli["nama_pembeli"]; ?></td>
							<td><?php echo $rowtempopembeli["nohp_pembeli"]; ?></td>
							<td><?php echo date("d M Y", strtotime($rowtempopembeli["jatuh_tempo"])); ?></td>
						</tr>
				<?php
						$nomor ++;
					}
				?>
			</tbody>
		</table>
	</div>
</div>