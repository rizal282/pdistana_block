<?php
	$id_brgrusak = $_POST["id_brgrusak"];
	$id_trbrgrusak = $_POST["id_trbrgrusak"];

	$ambildatabarangrusak = mysqli_query($koneksi, "select * from barang_rusak inner join stock_barang on barang_rusak.kode_brg = stock_barang.kode_barang where barang_rusak.id_barangrusak = '".$id_brgrusak."'");
	$rowbarangrusak = mysqli_fetch_array($ambildatabarangrusak);
?>

<div class="card">
	<div class="card-header">Form Edit Barang Rusak</div>
	<div class="card-body">
		<form class="form-horizontal" method="post" action="<?php echo $url; ?>">
			<div class="form-group">
	            <label for="">Nama Barang</label>
	            <input type="hidden" name="menu" value="proseseditbrgrusak">
	            <input type="hidden" name="idbarangrusakedit" value="<?php echo $rowbarangrusak["id_barangrusak"]; ?>">
	            <input type="hidden" name="kode_brg_awal" value="<?php echo $rowbarangrusak["kode_brg"]; ?>">
	            <input class="form-control" type="hidden" name="kode_brg" value="" id="kode_brg">
	            <input type="hidden" name="no_treditrusak" value="<?php echo $rowbarangrusak["no_transaksi"]; ?>">
	            <input autocomplete="off" class="form-control" type="text" name="nama_brg" id="nama_brg" value="<?php echo $rowbarangrusak["nama_barang"]; ?>">
	          </div>

	          <div class="form-group">
	            <label for="">Quantity Barang</label>
	            <input autocomplete="off" class="form-control" type="text" name="qty_brg" id="qty_brg" value="<?php echo $rowbarangrusak["qty_barang"]; ?>">
	          </div>

	          <div class="form-group">
	            <label for="">Satuan Barang</label>
	            <input class="form-control" type="text" name="stn_brg" id="stn_brg" value="<?php echo $rowbarangrusak["satuan_brg"]; ?>">
	          </div>

	          <div class="form-group">
	            <label for="">Barang Rusak Dari</label>
	            <!-- <input class="form-control" type="text" name="sumber_brg" id="stn_brg" value="-"> -->
	            <select class="form-control" name="sumber_brg" id="sumber_brg">
	            	<option value="Internal" <?php if($rowbarangrusak["sumber_brg"] == "Internal"){echo 'selected="selected"'; } ?>>Internal</option>
	            	<option value="Eksternal" <?php if($rowbarangrusak["sumber_brg"] == "Eksternal"){echo 'selected="selected"'; } ?>>Eksternal</option>
	            </select>
	          </div>

	         <div class="form-group">
	            <label for="">Refund Uang</label>
	            <select class="form-control" name="refund" id="refund">
	            	<option>Pilih :</option>
	            	<option value="Ya" <?php if($rowbarangrusak["refund"] == "Ya"){echo 'selected="selected"'; } ?>>Ya</option>
	            	<option value="Tidak" <?php if($rowbarangrusak["refund"] == "Tidak"){echo 'selected="selected"'; } ?>>Tidak</option>
	            </select>
	          </div>

	          <div id="" class="form-group">
	            <label for="">Bayar Refund Dengan</label>
	            <select class="form-control" name="byr_refund" id="byr_refund">
	            	<option>Pilih :</option>
	            	<option value="Cash" <?php if($rowbarangrusak["bayar_refund"] == "Cash"){echo 'selected="selected"'; } ?>>Cash</option>
	            	<option value="Transfer" <?php if($rowbarangrusak["bayar_refund"] == "Transfer"){echo 'selected="selected"'; } ?>>Transfer</option>
	            </select>
	          </div>

	          <div id="inp_uangrefund" class="form-group">
	            <label for="">Uang Refund</label>
	            <input class="form-control" type="text" name="uangrefund" id="uangrefund" value="<?php echo number_format($rowbarangrusak["nominal_refund"],0,",","."); ?>">
	          </div>

	          <button type="submit" class="btn btn-success">Simpan</button>
		</form>
	</div>
</div>