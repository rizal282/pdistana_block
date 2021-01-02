<div class="card">
	<div class="card-header">
		Data Bayar Kasbon Karyawan
	</div>
	<div class="card-body">
		<table class="table table-bordered" id="tbl_kasbon" cellspacing="0" width="100%">
			<thead>
				<tr>
					<th>No</th>
					<th>Tgl Kasbon</th>
					<th>Nama Karyawan</th>
					<th>Group</th>
					<th>Total Kasbon</th>
					<th>Dibayar</th>
					<th>Sisa Kasbon</th>
					<th>Status Lunas</th>
					<th>Tgl Dibayar</th>
				</tr>
			</thead>
			<tbody>
				<?php
					$sqlgetkasbonkaryawan = "select * from kasbon_kry inner join karyawan on kasbon_kry.id_kry = karyawan.id_kry inner join bayar_kasbon on bayar_kasbon.id_kry = kasbon_kry.id_kry order by kasbon_kry.id_kasbon desc";
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
							<td><?php echo "Rp ". number_format($rowkasbon["nominal_bayar"],1,",","."); ?></td>
							<td><?php echo "Rp ". number_format($rowkasbon["sisa_kasbon"],1,",","."); ?></td>
							<td><?php echo $rowkasbon["sts_kasbon"]; ?></td>
							<td><?php echo date("d M Y", strtotime($rowkasbon["tgl_bayar"])); ?></td>
						</tr>
				<?php
						$nomor ++;
					}
				?>
			</tbody>
		</table>
	</div>
</div>