<?php
	if(isset($_POST["tr_bahanbaku"])){
		$tr_bahanbaku = $_POST["tr_bahanbaku"];

		// ambil data order bahan baku
		$sqlgetdataorderbahanbaku = "select * from order_bahanbaku where no_trbahanbaku = '".$tr_bahanbaku."'";
		$aksigetdataorderbahanbaku = mysqli_query($koneksi, $sqlgetdataorderbahanbaku);
		$rowdataorderbahanbaku = mysqli_fetch_array($aksigetdataorderbahanbaku);

		//ambil detail order bahan baku
		$sqlgetdetailorderbahanbaku = "select * from detail_order_bahanbaku where no_trbahanbaku = '".$tr_bahanbaku."'";
		$aksigetdetailorderbahanbaku = mysqli_query($koneksi, $sqlgetdetailorderbahanbaku);

		// ambil total bayar bahan baku
		$sqlgettotalbayar = "select * from total_bayar_bahanbaku where no_trbahanbaku = '".$tr_bahanbaku."'";
		$aksigettotalbayar = mysqli_query($koneksi, $sqlgettotalbayar);
		$rowtotalbayar = mysqli_fetch_array($aksigettotalbayar);
	}
?>
<div class="card">
	<div class="card-header"><i class="fas fa-info-circle"></i> Detail Order Bahan Baku</div>
	<div class="card-body">
		<div class="alert alert-secondary"><i class="fas fa-list"></i> Data Order</div>
		<table class="table table-bordered">
			<tr>
				<th>No Transaksi</th>
				<td><?php echo $rowdataorderbahanbaku["no_trbahanbaku"]; ?></td>
			</tr>
			<tr>
				<th>Tanggal Beli</th>
				<td><?php echo date("d M Y", strtotime($rowdataorderbahanbaku["tgl_pembelian"])); ?></td>
			</tr>
			<tr>
				<th>Nama Supplier</th>
				<td><?php echo $rowdataorderbahanbaku["nama_supplier"]; ?></td>
			</tr>
			<tr>
				<th>Pembayaran</th>
				<td><?php echo $rowdataorderbahanbaku["pembayaran"]; ?></td>
			</tr>
			<tr>
				<th>Keterangan</th>
				<td><?php echo $rowdataorderbahanbaku["keterangan"]; ?></td>
			</tr>
			<tr>
				<th>Total Bayar</th>
				<td><?php echo "Rp ". number_format($rowtotalbayar["nominal"],1,",","."); ?></td>
			</tr>
		</table>

		<div class="alert alert-secondary"><i class="fas fa-info-circle"></i> Detail Bahan Baku</div>

		<table class="table table-bordered" id="table_detail_bahanbaku">
			<thead>
				<tr>
					<th>No</th>
					<th>No Transaksi</th>
					<th>Nama Barang</th>
					<th>Harga Barang</th>
					<th>Jumlah Beli</th>
					<th>Total Harga</th>
				</tr>
			</thead>
			<tbody>
				<?php
					$nomor = 1;
					while($rowdetailorderbahanbaku = mysqli_fetch_array($aksigetdetailorderbahanbaku)){
				?>
						<tr>
							<td><?php echo $nomor; ?></td>
							<td><?php echo $rowdetailorderbahanbaku["no_trbahanbaku"]; ?></td>
							<td><?php echo $rowdetailorderbahanbaku["nama_barang"]; ?></td>
							<td><?php echo "Rp ".number_format($rowdetailorderbahanbaku["hrg_barang"],1,",","."); ?></td>
							<td><?php echo $rowdetailorderbahanbaku["jumlah_beli"]; ?></td>
							<td><?php echo "Rp ". number_format($rowdetailorderbahanbaku["total_harga"],1,",","."); ?></td>
						</tr>
				<?php
						$nomor ++;
					}
				?>
			</tbody>
		</table>

		<div class="row">
			<div class="col-lg-12">
				<div class="alert alert-success"><i class="fas fa-shopping-basket"></i> Catatan Pembayaran Angsuran Bahan Baku</div>


				<table id="table_bayar" class="table table-bordered">
		          <thead>
		            <tr>
		              <th>No</th>
		              <th>Tgl Bayar</th>
		              <th>No Transaksi</th>
		              <th>Total Bayar</th>
		              <th>Nominal DP</th>
		              <th>Nominal Cash</th>
		              <th>Sisa Tagihan</th>
		            </tr>
		          </thead>
		          <tbody>
		            <?php
		              $getcatatantagihan = mysqli_query($koneksi, "select * from total_bayar_bahanbaku inner join pembayaran_bahanbaku on total_bayar_bahanbaku.no_trbahanbaku = pembayaran_bahanbaku.no_transaksi where  total_bayar_bahanbaku.no_trbahanbaku = '".$rowdataorderbahanbaku["no_trbahanbaku"]."'");

		              $nomor = 1; 
		              while($rowcatatantagihan = mysqli_fetch_array($getcatatantagihan)){
		            ?>
		                <tr>
		                  <td><?php echo $nomor; ?></td>
		                  <td><?php echo date("d M Y", strtotime($rowcatatantagihan["tgl_bayar"])); ?></td>
		                  <td><?php echo $rowcatatantagihan["no_transaksi"]; ?></td>
		                  <td>
		                    <?php echo "Rp ".number_format($rowcatatantagihan["nominal"],1,",","."); ?>
		                  </td>
		                  
		                  <td><?php echo "Rp ".number_format($rowcatatantagihan["nominal_dp"],1,",","."); ?></td>
		                  <td><?php echo "Rp ".number_format($rowcatatantagihan["nominal_cash"],1,",","."); ?></td>
		                  <td><?php echo "Rp ".number_format($rowcatatantagihan["sisa_tagihan"],1,",","."); ?></td>
		                </tr>
		            <?php
		                $nomor ++;
		              }
		            ?>
		          </tbody>
		        </table>
			</div>
		</div>

		<div class="row">
			<div class="col-lg-12">
				<?php
					if($rowtotalbayar["sts_lunas"] == "Sudah Lunas"){
						echo '<div class="alert alert-success">Sudah Lunas</div>';
					}else{
				?>
						<form action="" method="post">
							<?php
								if($rowdataorderbahanbaku["pembayaran"] == "Tunai"){
							?>
									<input type="hidden" name="menu" value="bayarbahanbakutunai">
							<?php
								}else{
							?>
									<input type="hidden" name="menu" value="bayarbahanbakutempo">
							<?php
								}
							?>
							<input type="hidden" name="idtr_bahanbaku" value="<?php echo $rowdataorderbahanbaku["no_trbahanbaku"]; ?>">
							<button type="submit" class="btn btn-primary"><i class="fas fa-cash-register"></i> Bayar</button>
						</form>
				<?php
					}
				?>
			</div>
		</div>
	</div>
</div>