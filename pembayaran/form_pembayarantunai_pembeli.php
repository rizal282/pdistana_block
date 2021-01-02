<?php
	if(isset($_POST["notrbayar"])){
		$notrbayar = $_POST["notrbayar"];

		// mengambil total tagihan pembayaran tempo pembeli
		$sqlgettotalbayar = "select * from total_bayar_pembeli where no_transaksi = '".$notrbayar."'";
		$aksigettotalbayar = mysqli_query($koneksi, $sqlgettotalbayar);
		$rowtotalbayar = mysqli_fetch_array($aksigettotalbayar);
	}
?>
<div class="card card-default">
	<div class="card-header">
		Form Pembayaran Tunai Pembeli
	</div>
	<div class="card-body">
		<form class="form-horizontal" method="post" action="<?php echo $url; ?>">
			<div class="form-group">
				<label>No Transaksi / Nama Pembeli</label>
				<input type="hidden" name="menu" value="prosesbayartunai">
				<input type="text" name="notrbayar" class="form-control" value="<?php echo $notrbayar; ?>" readonly>
			</div>
			<div class="form-group">
				<label>Total Tagihan</label>
				<input type="text" name="total_tgh" class="form-control" value="<?php echo number_format($rowtotalbayar["sisa_total"],0,",","."); ?>" readonly>
				
			</div>
			<!-- <div class="form-group">
				<div id="detail_beli">
					<table class="table table-bordered" width="100%" cellspacing="0">
				        <thead>
					        <tr>
						        <th>No Transaksi</th>
						        <th>Kode Barang</th>
						        <th>Nama Barang</th>
						        <th>Harga Barang</th>
						        <th>Jumlah Beli</th>
						        <th>Satuan</th>
						        <th>Total Harga</th>
						        <th>Sumber Barang</th>
					        </tr>
				        </thead>
				        <tbody id="listbrgpembeli">
				          
				        </tbody>
				    </table>
				</div>
			</div> -->
			<div class="form-group">
				<label>Tanggal Bayar</label>
				<input type="text" name="tgl_bayar" id="tgl_bayar" class="form-control" required>
			</div>
			<!-- <div class="form-group">
				<label>Jenis Pembayaran</label>
				<select name="jns_pembayaran" class="form-control">
					<option>Pilih Jenis Pembayaran :</option>
					<option value="Tunai">Tunai</option>
					<option value="Tempo">Tempo</option>
				</select>
			</div> -->
			<div class="form-group">
				<label>DP/Nominal Cash</label>
				<input onkeyup="format_angka(this)" autocomplete="off" type="text" name="dp_nominalcash" class="form-control" required>
			</div>
			<div class="form-group">
				<label>Masukkan Ke</label>
				<select name="masukkan_ke" class="form-control">
					<option value="Kas Besar">Kas Besar</option>
					<option value="Kas Bank">Kas Bank</option>
				</select>
			</div>
			<div class="form-group">
				<label>Jenis Pengiriman</label>
				<select name="jenis_kirim" class="form-control">
					<option>Pilih Jenis Pengiriman</option>
					<option value="Sendiri">Sendiri</option>
					<option value="Diantar">Diantar</option>
				</select>
			</div>
			<button type="submit" class="btn btn-primary"><i class="fas fa-cash-register"></i> Bayar</button>
		</form>
	</div>
</div>