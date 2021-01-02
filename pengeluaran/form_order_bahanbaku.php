<div class="card">
	<div class="card-header">Form Order Bahan Baku</div>
	<div class="card-body">
		<form class="form-horizontal" action="<?php echo $url; ?>" method="post">
			<div class="form-group">
				<?php
					$getidbahanbaku = mysqli_query($koneksi, "select no_trbahanbaku from order_bahanbaku order by id_orderbahanbaku desc");
					$countidbahanbaku = mysqli_num_rows($getidbahanbaku);

					if($countidbahanbaku == 0){
						$no_trbb = "TRO-BB-1";
					}else{
						$rowtrbahanbaku = mysqli_fetch_array($getidbahanbaku);
						$pecahtrbahanbaku = explode("-", $rowtrbahanbaku["no_trbahanbaku"]);

						$nexttrbahanbaku = $pecahtrbahanbaku[2] + 1;
						$strbahanbaku = "TRO-BB-";
						$no_trbb = $strbahanbaku.$nexttrbahanbaku;
					}
				?>
				<label>No Transaksi</label>
				<input type="hidden" name="menu" value="prosesinputorderbahanbaku">
				<input autocomplete="off" id="notrbahanbaku" type="text" name="notrbahanbaku" class="form-control" value="<?php echo $no_trbb; ?>" readonly>
			</div>
			<div class="form-group">
				<label>Tanggal Beli</label>
				<input id="tglbelibahanbaku" type="text" name="tglbelibahanbaku" class="form-control" required>
			</div>
			<div class="form-group">
				<label>Nama Supplier</label>
				<input autocomplete="off" id="supplierbahanbaku" type="text" name="supplierbahanbaku" class="form-control" required>
			</div>
			<div class="form-group">
				<label>Pembayaran</label>
				<select id="pembayaranbahanbaku" name="pembayaranbahanbaku" class="form-control">
					<option>Pilih :</option>
					<option value="Tunai">Tunai</option>
					<option value="Tempo">Tempo</option>
				</select>
			</div>
			<div id="tgl_tempobahanbaku" class="form-group">
				<label>Tanggal Tempo</label>
				<input id="tgl_tempobb" type="text" name="tgl_tempo" class="form-control">
			</div>
			<div class="form-group">
				<label>Keterangan</label>
				<input autocomplete="off" id="keteranganbahanbaku" type="text" name="keteranganbahanbaku" class="form-control" >
			</div>

			<a id="tambah_barangbahanbaku" class="btn btn-success btn-block" data-toggle="modal" data-target="#formbelibahanbaku" href="#">Tambah</a>

			<!-- Modal -->
		    <div id="formbelibahanbaku" class="modal fade" role="dialog">
			    <div class="modal-dialog">
			      <!-- konten modal-->
			      <div class="modal-content">
			        <!-- heading modal -->
			        <div class="modal-header">
			          <h4 class="modal-title">Tambahkan Bahan Baku yang Dibeli</h4>
			        </div>
			        <!-- body modal -->
			        <div class="modal-body">
			          <!-- <div class="form-group">
			            <label for="">Kode Barang</label>
			            <input autocomplete="off" class="form-control" type="text" name="kode_brgbahanbaku" id="kode_brgbahanbaku">
			          </div> -->

			          <div class="form-group">
			            <label for="">Nama Barang</label>
			            <!-- <input autocomplete="off" class="form-control" type="text" name="nama_bahanbaku" id="nama_bahanbaku"> -->
						<select name="nama_bahanbaku" id="nama_bahanbaku" class="form-control">
							<option value="">Pilih Nama Bahan Baku :</option>
							<?php
								$getnamabhnbaku = mysqli_query($koneksi, "select nama_bahanbaku from bahan_baku order by nama_bahanbaku asc");
								while($rownamabhnbaku = mysqli_fetch_array($getnamabhnbaku)){
							?>
									<option value="<?php echo $rownamabhnbaku["nama_bahanbaku"]; ?>"><?php echo $rownamabhnbaku["nama_bahanbaku"]; ?></option>
							<?php
								}
							?>
						</select>
			          </div>

			          <div class="form-group">
			            <label for="">Harga Barang/Pcs</label>
			            <input autocomplete="off" class="form-control" type="text" name="hrg_bahanbaku" id="hrg_bahanbaku" onkeyup="format_angka(this)">
			          </div>

			          <div class="form-group">
			            <label for="">Jumlah Beli</label>
			            <input autocomplete="off" class="form-control" type="text" name="jumlah_bahanbaku" id="jumlah_bahanbaku">
			          </div>

			          <!-- <div class="form-group">
			            <label for="">Satuan Barang</label>
			            <input class="form-control" type="text" name="satuan_bahanbaku" id="satuan_bahanbaku">
			          </div>

			          <div class="form-group">
			            <label for="">Sumber Barang</label>
			            <select class="form-control"  name="sumber_brg" id="sumber_brg">
			              <option>Pilih :</option>
			              <option value="Internal">Internal</option>
			              <option value="Eksternal">Eksternal</option>
			            </select>
			             <input class="form-control" type="text" name="sumber_brg" id="sumber_brg">
			          </div> -->

			          <button class="btn btn-primary" id="tambah_bahanbaku" data-dismiss="modal">Tambahkan</button>
			        </div>
			        <!-- footer modal -->
			        <div class="modal-footer">
			          <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
			        </div>
			      </div>
			    </div>
			</div>

			<table class="table table-bordered" id="tbl_bahanbaku_dibeli" width="100%" cellspacing="0">
		        <thead>
		          <tr>
		            <th>No Transaksi</th>
		            <th>Nama Barang</th>
		            <th>Harga Barang</th>
		            <th>Jumlah Beli</th>
		            <th>Total Harga</th>
		          </tr>
		        </thead>
		        <tbody id="outputbelibahanbaku">

		        </tbody>
		    </table>

		    <button type="submit" class="btn btn-danger">Simpan</button>
		</form>
	</div>
</div>
