<div class="card">
	<div class="card-header"><i class="fas fa-list"></i> Data Stock Barang</div>
	<div class="card-body">
		<div class="row">
			<div class="col-lg-12 alignupdatestock form-inline">
				<form action="<?php echo $url; ?>" method="post">
					<input type="hidden" name="menu" value="updatestock">
					<button class="btn btn-primary" type="submit"><i class="fa fa-edit"></i> Update Stock</button>
				</form>
				<form action="<?php echo $url; ?>" method="post">
					<input type="hidden" name="menu" value="tambahbarang">
					<button class="btn btn-success" type="submit"><i class="fas fa-plus"></i> Tambah Barang</button>
				</form>
				<form action="<?php echo $url; ?>" method="post">
					<input type="hidden" name="menu" value="stockterjual">
					<button class="btn btn-success" type="submit"><i class="fas fa-eye"></i> Stock Terjual</button>
				</form>
			</div>
		</div>
		<table class="table table-bordered" id="tbl_stock" width="100%" cellspacing="0">
			<thead>
				<tr>
					<th>No</th>
					<th>Kode Barang</th>
					<th>Nama Barang</th>
					<th>Stock Awal</th>
					<th>Stock Masuk</th>
					<!--<th>Terjual</th>-->
					<th>Stock Akhir</th>
					<th>Kondisi</th>
				</tr>
			</thead>
			<tbody>
				<?php
					$sqlgetstockbarang = "SELECT * FROM stock_barang";
					$aksigetstockbarang = mysqli_query($koneksi, $sqlgetstockbarang);

					$nomor = 1;
					while ($rowstockbarang = mysqli_fetch_array($aksigetstockbarang)) {
						// $ambilterjual = mysqli_query($koneksi, "select jml_terjual from stock_terjual where kd_barang = '".$rowstockbarang["kode_barang"]."' order by id_terjual desc limit 1");
						// $cterjual = mysqli_num_rows($ambilterjual);

						// if($cterjual == 0){
						// 	$tterjual = 0;
						// }else{
						// 	$rowterjual = mysqli_fetch_array($ambilterjual);
						// 	$tterjual = $rowterjual["jml_terjual"];
						// }
				?>
						<tr>
							<td><?php echo $nomor; ?></td>
							<td><?php echo $rowstockbarang["kode_barang"] ?></td>
							<td><?php echo $rowstockbarang["nama_barang"] ?></td>
							<td><?php echo $rowstockbarang["stock_awal"] ?></td>
							<td><?php echo $rowstockbarang["stock_masuk"] ?></td>
							<!--<td><?php echo $tterjual; ?></td>-->
							<td><?php echo $rowstockbarang["stock_akhir"] ?></td>
							<td>
								<?php
									$getlimitstock = mysqli_query($koneksi, "select * from setting");
									$rowlimitstock = mysqli_fetch_array($getlimitstock);

									if($rowstockbarang["jenis_brg"] == "Paving"){
										if($rowstockbarang["stock_akhir"] <= $rowlimitstock["limitstock_paving"]){
											echo '<div class="alert alert-danger">Kurang</div>';
										}else{
											echo 'Cukup';
										}
									}elseif($rowstockbarang["jenis_brg"] == "Genteng"){
										if($rowstockbarang["stock_akhir"] <= $rowlimitstock["limitstock_genteng"]){
											echo '<div class="alert alert-danger">Kurang</div>';
										}else{
											echo 'Cukup';
										}
									}elseif($rowstockbarang["jenis_brg"] == "Buis"){
										if($rowstockbarang["stock_akhir"] <= $rowlimitstock["limitstock_buis"]){
											echo '<div class="alert alert-danger">Kurang</div>';
										}else{
											echo 'Cukup';
										}
									}elseif($rowstockbarang["jenis_brg"] == "Greffel"){
										if($rowstockbarang["stock_akhir"] <= $rowlimitstock["limitstock_greffel"]){
											echo '<div class="alert alert-danger">Kurang</div>';
										}else{
											echo 'Cukup';;
										}
									}elseif($rowstockbarang["jenis_brg"] == "U-Ditch"){
										if($rowstockbarang["stock_akhir"] <= $rowlimitstock["limitstock_uditch"]){
											echo '<div class="alert alert-danger">Kurang</div>';
										}else{
											echo 'Cukup';
										}
									}elseif($rowstockbarang["jenis_brg"] == "Cover U-Ditch"){
										if($rowstockbarang["stock_akhir"] <= $rowlimitstock["limitstock_cuidtch"]){
											echo '<div class="alert alert-danger">Kurang</div>';
										}else{
											echo 'Cukup';
										}
									}elseif($rowstockbarang["jenis_brg"] == "Cover Buis"){
										if($rowstockbarang["stock_akhir"] <= $rowlimitstock["limitstock_cbuis"]){
											echo '<div class="alert alert-danger">Kurang</div>';
										}else{
											echo 'Cukup';
										}
									}
								?>

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
