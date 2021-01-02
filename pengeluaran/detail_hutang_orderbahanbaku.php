<div class="card">
			<div class="card-header">
				Detail Hutang Order Bahan Baku
			</div>
			<div class="card-body">
				
				<table id="tbl_historibhnbaku" class="table table-bordered" width="100%" cellspacing="0">
					<thead>
						<tr>
							<th>No</th>
							<th>No Transaksi</th>
							<th>Tanggal Beli</th>
							<th>Nama Supplier</th>
							<th>Pembayaran</th>
							<th>Jatuh Tempo</th>
							<th>Keterangan</th>
							<th>Detail</th>
							<!-- <th>Bayar</th> -->
						</tr>
					</thead>
					<tbody>
						<?php
							$idvieworderbahanbaku = $_POST["idvieworderbahanbaku"];
							$edittgltempo = $_POST["edittgltempo"];

							$tglskrg = date("Y-m-d");
							$tglnotif = date('Y-m-d', strtotime('+30 days', strtotime($tglskrg)));
							
							$sqlgetorderbahanbaku = "select * from order_bahanbaku inner join total_bayar_bahanbaku on order_bahanbaku.no_trbahanbaku = total_bayar_bahanbaku.no_trbahanbaku where total_bayar_bahanbaku.sts_lunas = 'Belum Lunas' and order_bahanbaku.tgl_tempo = '".$tglnotif."'";
							$aksigetorderbahanbaku = mysqli_query($koneksi, $sqlgetorderbahanbaku);

							$nomor = 1;
							while($roworderbahanbaku = mysqli_fetch_array($aksigetorderbahanbaku)){
						?>
								<tr>
									<td><?php echo $nomor; ?></td>
									<td><?php echo $roworderbahanbaku["no_trbahanbaku"]; ?></td>
									<td><?php echo $roworderbahanbaku["tgl_pembelian"]; ?></td>
									<td><?php echo $roworderbahanbaku["nama_supplier"]; ?></td>
									<td><?php echo $roworderbahanbaku["pembayaran"]; ?></td>
									<td>
										<?php 
											if($roworderbahanbaku["tgl_tempo"] == "0000-00-00" || $roworderbahanbaku["tgl_tempo"] == "1970-01-01"){
												echo "-";
											}else{
												echo date("d M Y", strtotime($roworderbahanbaku["tgl_tempo"]));
											}
										?>
									</td>
									<td><?php echo $roworderbahanbaku["keterangan"]; ?></td>
									<td>
										<form action="<?php echo $url; ?>" method="post">
											<input type="hidden" name="menu" value="bayarorderbhnbaku">
											<input type="hidden" name="tr_bahanbaku" value="<?php echo $roworderbahanbaku["no_trbahanbaku"]; ?>">
											<button type="submit" class="btn btn-success"><i class="fas fa-info-circle"></i> Detail</button>
										</form>
									</td>
									<!-- <td>
										<form action="<?php echo $url; ?>" method="post">
											<input type="hidden" name="menu" value="bayarorderbhnbaku">
											<input type="hidden" name="tr_bahanbaku" value="<?php echo $roworderbahanbaku["no_trbahanbaku"]; ?>">
											<button type="submit" class="btn btn-primary">Bayar</button>
										</form>
									</td> -->
								</tr>
						<?php
								$nomor ++;
							}

							mysqli_query($koneksi, "update order_bahanbaku set tgl_tempo = '".$edittgltempo."' where id_orderbahanbaku = ".$idvieworderbahanbaku);
						?>
					</tbody>
				</table>
			</div>
		</div>