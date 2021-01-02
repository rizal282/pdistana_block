<?php
    if($_SESSION["id_user"] && $_SESSION["username"] && $_SESSION["password"] && $_SESSION["status_user"] && $_SESSION["status_user"] == "admin"){
?>
<div class="card">
	<div class="card-header"><i class="fas fa-list"></i> Data Stock Barang</div>
	<div class="card-body">
		<div class="row">
			<div class="col-lg-12 alignupdatestock form-inline">
        		<form action="<?php echo $url; ?>" method="post">
					<input type="hidden" name="menu" value="updatestock">
					<button class="btn btn-primary" type="submit" id="updatestock"><i class="fa fa-edit"></i> Update Stock</button>
				</form>
				<!-- <form action="<?php echo $url; ?>" method="post">
					<input type="hidden" name="menu" value="backupstock"> -->
					<button class="btn btn-primary" type="submit" id="backupstock"><i class="fa fa-file"></i> Backup Stock</button>
				<!-- </form> -->
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

		<div class="row">
			<div class="col-lg-12">
				<h4>Restore Stock Lama</h4>
				<form action="<?php echo $url; ?>" method="post">
					<div class="form-group">
						<label for="">Pilih Kode Barang Stock Lama</label>
						<input type="hidden" name="menu" value="prosesrestorestock">
						<select name="kodebarang" class="form-control">
							<option value="">Pilih Kode :</option>
							<?php
								$getkodebarang = mysqli_query($koneksi, "select * from stock_barang order by kode_barang asc");
								while($rowkodebarang = mysqli_fetch_array($getkodebarang)){
							?>
									<option value="<?php echo $rowkodebarang["kode_barang"] ?>"><?php echo $rowkodebarang["kode_barang"] ?></option>
							<?php
								}
							?>
						</select>
					</div>
					<button type="submit" class="btn btn-primary">Restore</button>
				</form>
			</div>
		</div>
		<p></p>
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
					<th>Modal</th>
					<th>Edit</th>
					<th>Hapus</th>
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
                        if($rowstockbarang["jenis_brg"] == "Genteng"){
                          $getlimitstockgenteng = mysqli_query($koneksi, "select * from setting_limitstokgenteng where kode_barang = '".$rowstockbarang["kode_barang"]."'");
                          $rowlimitstockgenteng = mysqli_fetch_array($getlimitstockgenteng);

                          if($rowstockbarang["stock_akhir"] < $rowlimitstockgenteng["jml_limit"]){
                            echo '<div class="alert alert-danger">Kurang</div>';
                          }else{
                            echo "Cukup";
                          }
                        }elseif($rowstockbarang["jenis_brg"] == "Paving"){
                          $getlimitpaving = mysqli_query($koneksi, "select limit_stock from setting_cetakpaving where kode_barang = '".$rowstockbarang["kode_barang"]."'");
                          $rowlimitpaving = mysqli_fetch_array($getlimitpaving);

                          if($rowstockbarang["stock_akhir"] < $rowlimitpaving["limit_stock"]){
                            echo '<div class="alert alert-danger">Kurang</div>';
                          }else{
                            echo "Cukup";
                          }
                        }else{
                          $getlimitlain = mysqli_query($koneksi, "select limit_stock from setting_baranglain where kode_barang = '".$rowstockbarang["kode_barang"]."'");
                          $rowlimitlain = mysqli_fetch_array($getlimitlain);

                          if($rowstockbarang["stock_akhir"] < $rowlimitlain["limit_stock"]){
                            echo '<div class="alert alert-danger">Kurang</div>';
                          }else{
                            echo "Cukup";
                          }
                        }
                       ?>
							</td>
							<td><?php echo "Rp ". number_format($rowstockbarang["modal_stock"],1,",","."); ?></td>
							<td>
								<form action="<?php echo $url; ?>" method="post">
									<input type="hidden" name="menu" value="editstokbarang">
									<input type="hidden" name="idstokbarang" value="<?php echo $rowstockbarang["id_barang"]; ?>">
									<input type="hidden" name="kodestock" value="<?php echo $rowstockbarang["kode_barang"]; ?>">
									<button type="submit" class="btn btn-success"><i class="fa fa-edit"></i></button>
								</form>
							</td>
							<td>
								<form action="<?php echo $url; ?>" method="post">
									<input type="hidden" name="menu" value="hapusstokbarang">
									<input type="hidden" name="idstokbarang" value="<?php echo $rowstockbarang["id_barang"] ?>">
									<button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>
								</form>
							</td>
						</tr>
				<?php
						$nomor ++;
					}

					$gettotalmodal = mysqli_query($koneksi, "select sum(modal_stock) as total from stock_barang");
					$rowtotalmodal = mysqli_fetch_array($gettotalmodal);
				?>
			</tbody>
		</table>
		<table class="table table-bordered">
			<tr>
				<td colspan="8">Total Modal</td>
				<td colspan="2"><?php echo "Rp ". number_format($rowtotalmodal["total"],1,",","."); ?></td>
			</tr>
		</table>
	</div>
</div>
<?php
	}else{
		include_once "data_stock_barangstaff.php";
	}
?>
