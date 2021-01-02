<div class="card">
	<div class="card-header">Form Feedback Kerusakan Barang</div>
	<div class="card-body">
		<?php
			// if(isset($_POST["id_surat"])){}
			$id_surat = $_POST["id_surat"];
			$sqlgetnotrorder = "select no_transaksi from surat_jalan where id_surat_jalan = '".$id_surat."'";
			$aksigetnotr = mysqli_query($koneksi, $sqlgetnotrorder);
			$rownotrorder = mysqli_fetch_array($aksigetnotr);

			$ambildatabrgbeli = mysqli_query($koneksi, "select * from detail_order_pembeli where no_transaksi = '".$rownotrorder["no_transaksi"]."'");
		?>

		<form class="form-horizontal" action="<?php echo $url; ?>" method="post">
			<div class="form-group">
				<label>No Transaksi</label>
				<input type="hidden" name="menu" value="inputconfirmrusak">
				<input class="form-control" type="text" name="no_trfeedback" value="<?php echo $rownotrorder["no_transaksi"]; ?>" id="no_trfeedback" readonly>
			</div>

			<div class="form-group">
				<table class="table table-bordered">
					<thead>
						<tr>
							<th>No</th>
							<th>Nama Barang</th>
							<th>Quantity</th>
							<th>Sumber Barang</th>
						</tr>
					</thead>
					<tbody>
						<?php
							$nomor = 1;
							while($databarangbeli = mysqli_fetch_array($ambildatabrgbeli)){
						?>
								<tr>
									<td><?php echo $nomor; ?></td>
									<td><?php echo $databarangbeli["nama_barang"]; ?></td>
									<td><?php echo $databarangbeli["jumlah_beli"]; ?></td>
									<td><?php echo $databarangbeli["sumber_brg"]; ?></td>
								</tr>
						<?php
								$nomor++;
							}
						?>
					</tbody>
				</table>
			</div>

			<div class="form-group">
				<label>Kerusakan Barang</label>
				<select id="barang_rusak" class="form-control" name="confirm_rusak">
					<option>Pilih :</option>
					<option value="Ada">Ada</option>
					<option value="Tidak">Tidak</option>
				</select>
			</div>

			<div id="formaddbarang">
				<div id="btntambahkan" class="form-group">
					<a id="tambahBrgRusak" href="#" class="btn btn-success" data-toggle="modal" data-target="#formFeedback" >Tambahkan</a>
				</div>

				<!-- Modal -->
				  <div id="formFeedback" class="modal fade" role="dialog">
				    <div class="modal-dialog">
				      <!-- konten modal-->
				      <div class="modal-content">
				        <!-- heading modal -->
				        <div class="modal-header">
				          <h4 class="modal-title">Form Tambah Barang Rusak</h4>
				        </div>
				        <!-- body modal -->
				        <div class="modal-body">
				          <div class="form-group">
				            <!-- <label for="">Kode Barang</label> -->
				          </div>

				          <div class="form-group">
				            <label for="">Nama Barang</label>
				            <input class="form-control" type="hidden" name="kode_brg" value="" id="kode_brg">
				            <!--<input autocomplete="off" class="form-control" type="text" name="nama_brg" id="nama_brg">-->
							<select id="nama_brg" name="nama_brg" class="form-control">
								<option value="">Pilih :</option>

								<?php
									$stafflapangan = mysqli_query($koneksi, "select * from stock_barang order by nama_barang asc");
									while($rowstafflapangan = mysqli_fetch_array($stafflapangan)){
								?>
										<option value="<?php echo $rowstafflapangan["kode_barang"]; ?>"><?php echo $rowstafflapangan["nama_barang"]; ?></option>
								<?php
									}
								?>
							</select>
				          </div>

				          <div class="form-group">
				            <label for="">Quantity Barang</label>
				            <input autocomplete="off" class="form-control" type="text" name="qty_brg" id="qty_brg">
				          </div>

				          <div class="form-group">
				            <label for="">Satuan Barang</label>
				            <input class="form-control" type="text" name="stn_brg" id="stn_brg" value="-">
				          </div>

				          <div class="form-group">
				            <label for="">Barang Rusak Dari</label>
				            <!-- <input class="form-control" type="text" name="sumber_brg" id="stn_brg" value="-"> -->
				            <select class="form-control" name="sumber_brg" id="sumber_brg">
				            	<option value="Internal">Internal</option>
				            	<option value="Eksternal">Eksternal</option>
				            </select>
				          </div>

				         <div class="form-group">
				            <label for="">Refund</label>
				            <select class="form-control" name="refund" id="refund">
				            	<option>Pilih :</option>
				            	<option value="Refund Uang">Refund Uang</option>
				            	<option value="Refund Barang">Refund Barang</option>
				            </select>
				          </div>

				          <div id="methodbayar" class="form-group">
				            <label for="">Bayar Refund Dengan</label>
				            <select class="form-control" name="byr_refund" id="byr_refund">
				            	<option>Pilih :</option>
				            	<option value="Cash">Cash</option>
				            	<option value="Transfer">Transfer</option>
				            </select>
				          </div>

				          <div id="inp_uangrefund" class="form-group">
				            <label for="">Uang Refund</label>
				            <input onkeyup="format_angka(this)" class="form-control" type="text" name="uangrefund" id="uangrefund" placeholder="Masukkan Uang Refund Cash Atau pun Transfer">
				          </div>

				          <a href="#" class="btn btn-primary" id="input_brgrusak" data-dismiss="modal">Tambahkan</a>
				        </div>
				        <!-- footer modal -->
				        <div class="modal-footer">
				          <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
				        </div>
				      </div>
				    </div>
				  </div>
			</div>

			  <table class="table table-bordered">
			  	<thead>
			  		<th>No</th>
			  		<th>No Transaksi</th>
			  		<th>Nama Barang</th>
			  		<th>Quantity Barang</th>
			  		<th>Refund</th>
			  		<th>Nominal Refund</th>
			  	</thead>
			  	<tbody id="databarangrusak">
			  		
			  	</tbody>
			  </table>

			<button type="submit" class="btn btn-primary">Simpan</button>
		</form>
	</div>
</div>