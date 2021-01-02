<?php
	if(isset($_POST["idtr_bahanbaku"])){
		$idtr_bahanbaku = $_POST["idtr_bahanbaku"];

		// mengambil total tagihan pembayaran tempo pembeli
		$sqlgettotalbayar = "select nominal from total_bayar_bahanbaku where no_trbahanbaku = '".$idtr_bahanbaku."'";
		$aksigettotalbayar = mysqli_query($koneksi, $sqlgettotalbayar);
		$rowtotalbayar = mysqli_fetch_array($aksigettotalbayar);

		// mengambil sisa tagihan pembayaran tempo pembeli
		$sqlgetsisabayar = "select sisa_tagihan from pembayaran_bahanbaku where no_transaksi = '".$idtr_bahanbaku."' order by id_bayar_bahanbaku desc";
		$aksigetsisabayar = mysqli_query($koneksi, $sqlgetsisabayar);
		$rowsisabayar = mysqli_fetch_array($aksigetsisabayar);
		$countsisabayar = mysqli_num_rows($aksigetsisabayar);
	}
?>
<div class="card card-default">
	<div class="card-header">
		Form Pembayaran Tempo Pembeli
	</div>
	<div class="card-body">
		<form class="form-horizontal" method="post" action="<?php echo $url; ?>">
			<div class="form-group">
				<label>No Transaksi</label>
				<input type="hidden" name="menu" value="prosesbayartempobahanbaku">
				<input type="text" name="no_tr_bayar" class="form-control" value="<?php echo $idtr_bahanbaku; ?>" readonly>
			</div>
			<div class="form-group">
				<label>Total Tagihan</label>
				<input type="text" name="total_tgh" class="form-control" value="<?php echo number_format($rowtotalbayar["nominal"],0,",","."); ?>" readonly>
			</div>
			<div class="form-group">
				<label>Sisa Tagihan</label>
				<?php
					if($countsisabayar == 0){
				?>
						<input type="text" name="sisa_tgh" class="form-control" value="<?php echo number_format($rowtotalbayar["nominal"],0,",","."); ?>" readonly>
				<?php
					}else{
				?>
						<input type="text" name="sisa_tgh" class="form-control" value="<?php echo number_format($rowsisabayar["sisa_tagihan"],0,",","."); ?>" readonly>
				<?php
					}
				?>
			</div>
			
			<div class="form-group">
				<label>Tanggal Bayar</label>
				<input type="text" name="tgl_bayar" id="tgl_bayar" class="form-control" required>
			</div>
			
			<div class="form-group">
				<label>DP/Nominal Cash</label>
				<input onkeyup="format_angka(this)" autocomplete="off" type="text" name="dp_nominalcash" class="form-control" required>
			</div>

			<div class="form-group">
				<label>Kas Dari</label>
				<select name="kasdari" class="form-control">
					<option value="">Pilih Kas :</option>
					<option value="Kas Besar">Kas Besar</option>
					<option value="Kas Bank">Kas Bank</option>
				</select>
			</div>

			<button type="submit" class="btn btn-primary">Bayar</button>
		</form>
	</div>
</div>