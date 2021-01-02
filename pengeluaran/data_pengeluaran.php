<div class="card">
	<div class="card-header">
		<i class="fas fa-fw fa-list"></i> Data Pengeluaran
	</div>
	<div class="card-body">
		<?php
			if($_SESSION["id_user"] && $_SESSION["username"] && $_SESSION["password"] && $_SESSION["status_user"] && $_SESSION["status_user"] == "admin"){

				$tglskrg = date("Y-m-d");
				$tglnotif = date('Y-m-d', strtotime('+30 days', strtotime($tglskrg)));

				$getdatabahanbakuorder = mysqli_query($koneksi, "select * from order_bahanbaku inner join total_bayar_bahanbaku on order_bahanbaku.no_trbahanbaku = total_bayar_bahanbaku.no_trbahanbaku where total_bayar_bahanbaku.sts_lunas = 'Belum Lunas' and order_bahanbaku.tgl_tempo = '".$tglnotif."'");
				$countorderbahanbaku = mysqli_num_rows($getdatabahanbakuorder);
				$rowdatahutangorderbahanbaku = mysqli_fetch_array($getdatabahanbakuorder);

				if($countorderbahanbaku >= 1){
					$tgltempobaru = date('Y-m-d', strtotime('+30 days', strtotime($rowdatahutangorderbahanbaku["tgl_tempo"])));
		?>
				<div class="alert alert-success">
					Anda Memiliki <?php echo $countorderbahanbaku; ?> Hutang Order Bahan Baku Yang Menunggu Pembayaran.
					<form action="" method="post">
						<input type="hidden" name="menu" value="detailhutangbahanbaku">
						<input type="hidden" name="idvieworderbahanbaku" value="<?php echo $rowdatahutangorderbahanbaku["id_orderbahanbaku"]; ?>">
						<input type="hidden" name="edittgltempo" value="<?php echo $tgltempobaru; ?>">
						<button type="submit" class="btn btn-success">Lihat</button>
					</form>
				</div>
		<?php
			}
		?>

		<div class="row">
			<div class="col-lg-12 alignpengeluaran form-inline">
				<form action="" method="post">
					<input type="hidden" name="menu" value="orderbahanbaku">
					<button type="submit" class="btn btn-success"><i class="fas fa-plus"></i> Tambah Order Bahan Baku</button>
				</form>

				<form action="" method="post">
					<input type="hidden" name="menu" value="orderbahanbakulunas">
					<button type="submit" class="btn btn-success"><i class="fas fa-shopping-basket"></i> Order Bahan Baku Lunas</button>
				</form>

				<form action="" method="post">
					<input type="hidden" name="menu" value="pengeluaranharian">
					<button type="submit" class="btn btn-primary"><i class="fas fa-hand-holding-usd"></i> Pengeluaran Harian</button>
				</form>

				<form action="" method="post">
					<input type="hidden" name="menu" value="pengeluaranlainlain">
					<button type="submit" class="btn btn-secondary"><i class="fas fa-info-circle"></i> Lain-lain</button>
				</form>

				<form action="" method="post">
					<input type="hidden" name="menu" value="historipengeluaran">
					<button type="submit" class="btn btn-warning"><i class="fas fa-clock"></i> Histori Pengeluaran</button>
				</form>
			</div>
		</div>

		<div class="row">
			<div class="col-lg-6">
				<div id="sortingdatapengeluaran" class="form-inline">
					<div class="form-group">
						<input type="text" name="tglawalfilterbelanjabahanbaku" id="tglawalfilterbelanjabahanbaku" class="form-control" placeholder="Masukkan Tanggal Awal">
					</div>
					<div class="form-group">
						<input type="text" name="tglakhirfilterbelanjabahanbaku" id="tglakhirfilterbelanjabahanbaku" class="form-control" placeholder="Masukkan Tanggal Akhir">
					</div>
				</div>
			</div>
		</div>

		<div class="card">
			<div class="card-header">
				Data Hutang Order Bahan Baku
			</div>
			<div class="card-body">
				<div class="alert alert-info">Klik kolom data pada tabel untuk mengedit, kemudian Enter</div>
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
							<!-- <th>Edit</th> -->
							<th>Hapus</th>
							<!-- <th>Bayar</th> -->
						</tr>
					</thead>
					<tbody id="datafilterbljbahanbaku">
						<?php
							$sqlgetorderbahanbaku = "select * from order_bahanbaku inner join total_bayar_bahanbaku on order_bahanbaku.no_trbahanbaku = total_bayar_bahanbaku.no_trbahanbaku where total_bayar_bahanbaku.sts_lunas = 'Belum Lunas' order by order_bahanbaku.id_orderbahanbaku desc";
							$aksigetorderbahanbaku = mysqli_query($koneksi, $sqlgetorderbahanbaku);

							$nomor = 1;
							while($roworderbahanbaku = mysqli_fetch_array($aksigetorderbahanbaku)){
						?>
								<tr>
									<td><?php echo $nomor; ?></td>
									<td><?php echo $roworderbahanbaku["no_trbahanbaku"]; ?></td>
									<td>
										<span class="textbelibhnbaku"><?php echo date("d M Y", strtotime($roworderbahanbaku["tgl_pembelian"])); ?></span>
										<input data-id="<?php echo $roworderbahanbaku["id_orderbahanbaku"]; ?>" type="date" class="form-control editbelibhnbaku field-tglbeli" value="<?php echo date("d M Y", strtotime($roworderbahanbaku["tgl_pembelian"])); ?>">
									</td>
									<td>
										<span class="textbelibhnbaku"><?php echo $roworderbahanbaku["nama_supplier"]; ?></span>
										<input data-id="<?php echo $roworderbahanbaku["id_orderbahanbaku"]; ?>" type="text" class="form-control editbelibhnbaku field-supplier" value="<?php echo $roworderbahanbaku["nama_supplier"]; ?>">
									</td>
									<td>
										<span class="textbelibhnbaku"><?php echo $roworderbahanbaku["pembayaran"]; ?></span>
										<select data-id="<?php echo $roworderbahanbaku["id_orderbahanbaku"]; ?>" class="form-control editbelibhnbaku field-pembayaran" >
											<option value="">Pilih :</option>
											<option value="Tempo">Tempo</option>
											<option value="Tunai">Tunai</option>
										</select>
									</td>
									<td>
										<span class="textbelibhnbaku">
											<?php
												if($roworderbahanbaku["tgl_tempo"] == "0000-00-00" || $roworderbahanbaku["tgl_tempo"] == "1970-01-01"){
													
												}else{
													echo date("d M Y", strtotime($roworderbahanbaku["tgl_tempo"]));
												}
											?>
										</span>
										<input data-id="<?php echo $roworderbahanbaku["id_orderbahanbaku"]; ?>" type="date" class="form-control editbelibhnbaku field-tgltempo">
									</td>
									<td>
										<span class="textbelibhnbaku"><?php echo $roworderbahanbaku["keterangan"]; ?></span>
										<input data-id="<?php echo $roworderbahanbaku["id_orderbahanbaku"]; ?>" type="text" class="form-control editbelibhnbaku field-keterangan" value="<?php echo $roworderbahanbaku["keterangan"];  ?>">
									</td>
									<td>
										<form action="<?php echo $url; ?>" method="post">
											<input type="hidden" name="menu" value="bayarorderbhnbaku">
											<input type="hidden" name="tr_bahanbaku" value="<?php echo $roworderbahanbaku["no_trbahanbaku"]; ?>">
											<button type="submit" class="btn btn-success"><i class="fas fa-info-circle"></i></button>
										</form>
									</td>
									<!-- <td>
										<button class="btn btn-warning editorderbhnbaku"><i class="fas fa-edit"></i></button>
										<form action="<?php echo $url; ?>" method="post">
											<input type="hidden" name="menu" value="editorderbahanbaku">
											<input type="hidden" name="idorderbb" value="<?php echo $roworderbahanbaku["no_trbahanbaku"]; ?>">
											<button class="btn btn-warning editorderbhnbaku"><i class="fas fa-edit"></i></button>
										</form> 
									</td>-->
									<td>
										<form action="<?php echo $url; ?>" method="post">
											<input type="hidden" name="menu" value="hapusorderbahanbaku">
											<input type="hidden" name="id_trorderbb" value="<?php echo $roworderbahanbaku["no_trbahanbaku"]; ?>">
											<button class="btn btn-danger"><i class="fas fa-trash"></i></button>
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
						?>

					</tbody>
				</table>

				<?php
					}elseif($_SESSION["id_user"] && $_SESSION["username"] && $_SESSION["password"] && $_SESSION["status_user"] && $_SESSION["status_user"] == "Staff"){
						?>
						<div class="row">
							<div class="col-lg-12 alignpengeluaran form-inline">
								<form action="" method="post">
									<input type="hidden" name="menu" value="orderbahanbaku">
									<button type="submit" class="btn btn-success"><i class="fas fa-plus"></i> Tambah Order Bahan Baku</button>
								</form>

								<form action="" method="post">
									<input type="hidden" name="menu" value="orderbahanbakulunas">
									<button type="submit" class="btn btn-success"><i class="fas fa-shopping-basket"></i> Order Bahan Baku Lunas</button>
								</form>

								<form action="" method="post">
									<input type="hidden" name="menu" value="pengeluaranharian">
									<button type="submit" class="btn btn-primary"><i class="fas fa-hand-holding-usd"></i> Pengeluaran Harian</button>
								</form>
							</div>
						</div>

						<div class="row">
							<div class="col-lg-6">
								<div id="sortingdatapengeluaran" class="form-inline">
									<div class="form-group">
										<input type="text" name="tglawalfilterbelanjabahanbaku" id="tglawalfilterbelanjabahanbaku" class="form-control" placeholder="Masukkan Tanggal Awal">
									</div>
									<div class="form-group">
										<input type="text" name="tglakhirfilterbelanjabahanbaku" id="tglakhirfilterbelanjabahanbaku" class="form-control" placeholder="Masukkan Tanggal Akhir">
									</div>
								</div>
							</div>
						</div>

						<table id="tbl_historibhnbaku" class="table table-bordered" width="100%" cellspacing="0">
					<thead>
						<tr>
							<th>No</th>
							<th>No Transaksi</th>
							<th>Tanggal Beli</th>
							<th>Nama Supplier</th>
							<th>Pembayaran</th>
							<th>Jatuh Tempo</th>
							<th>Total Bayar</th>
							<th>Keterangan</th>
							<th>Detail</th>
							<!-- <th>Bayar</th> -->
						</tr>
					</thead>
					<tbody>
						<?php
							$sqlgetorderbahanbaku = "select * from order_bahanbaku inner join total_bayar_bahanbaku on order_bahanbaku.no_trbahanbaku = total_bayar_bahanbaku.no_trbahanbaku where total_bayar_bahanbaku.sts_lunas = 'Belum Lunas' order by order_bahanbaku.id_orderbahanbaku desc";
							$aksigetorderbahanbaku = mysqli_query($koneksi, $sqlgetorderbahanbaku);

							$nomor = 1;
							while($roworderbahanbaku = mysqli_fetch_array($aksigetorderbahanbaku)){
						?>
								<tr>
									<td><?php echo $nomor; ?></td>
									<td><?php echo $roworderbahanbaku["no_trbahanbaku"]; ?></td>
									<td><?php echo date("d M Y", strtotime($roworderbahanbaku["tgl_pembelian"])); ?></td>
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
									<td><?php echo "Rp ". number_format($roworderbahanbaku["nominal"],0,",",".") ?></td>
									<td><?php echo $roworderbahanbaku["keterangan"]; ?></td>
									<td>
										<form action="<?php echo $url; ?>" method="post">
											<input type="hidden" name="menu" value="bayarorderbhnbaku">
											<input type="hidden" name="tr_bahanbaku" value="<?php echo $roworderbahanbaku["no_trbahanbaku"]; ?>">
											<button type="submit" class="btn btn-success"><i class="fas fa-info-circle"></i></button>
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
						?>

					</tbody>
				</table>

				<?php } ?>
			</div>
		</div>
	</div>
</div>
