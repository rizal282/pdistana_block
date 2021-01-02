<div class="alert alert-primary">Tekan Enter Untuk Merubah Setting</div>

<div id="setting_limitgaji">
	<?php
		$sqlgetkaskecil = "select * from setting";
		$aksigetkaskecil = mysqli_query($koneksi, $sqlgetkaskecil);
		$rowkaskecil = mysqli_fetch_array($aksigetkaskecil);
	?>

	<div class="alert alert-danger">Setting Gaji Produksi Barang, Staff, Lapangan & Limit Tempo Pembayaran Pembeli</div>

	<div id="line_setting" class="row">
		<!-- <div class="col-lg-3">
			<label>Set Limit Kas Kecil</label>
			<input type="text" id="set_limit_kaskecil" class="form-control">
		</div>
		<div class="col-lg-3">
			<label>Limit Kas Kecil  </label>
			<input id="current_limit" type="text" value="<?php echo "Rp ". number_format($rowkaskecil["limit_kaskecil"],1,",","."); ?>" class="form-control-plaintext" readonly>
		</div> -->

		<div class="col-lg-3">
			<label>Set Limit Tempo</label>
			<input type="text" id="set_limit_tempo" class="form-control">
		</div>
		<div class="col-lg-3">
			<label>Limit Tempo</label>
			<input id="current_limittempo" type="text" value="<?php echo $rowkaskecil["limit_tempo"]; ?>" class="form-control-plaintext" readonly>
		</div>
		<div class="col-lg-3">
			<label>Set Gaji Cat Genteng</label>
			<input type="text" id="set_gajicatgenteng" class="form-control">
		</div>
		<div class="col-lg-3">
			<label>Gaji Cat Genteng</label>
			<input id="current_gajicatgenteng" type="text" value="<?php echo "Rp ". number_format($rowkaskecil["gaji_catgenteng"],1,",","."); ?>" class="form-control-plaintext" readonly>
		</div>
	</div>
	<div id="line_setting" class="row">
		<div class="col-lg-3">
			<label>Set Gaji Angkat Genteng</label>
			<input type="text" id="set_gajiangkatgenteng" class="form-control">
		</div>
		<div class="col-lg-3">
			<label>Gaji Angkat Genteng</label>
			<input id="current_gajiangkatgenteng" type="text" value="<?php echo "Rp ". number_format($rowkaskecil["gaji_angkatgenteng"],1,",","."); ?>" class="form-control-plaintext" readonly>
		</div>
		<div class="col-lg-3">
			<label>Set Gaji Cetak Genteng</label>
			<input type="text" id="set_gajicetakgenteng" class="form-control">
		</div>
		<div class="col-lg-3">
			<label>Gaji Cetak Genteng</label>
			<input id="current_gajicetakgenteng" type="text" value="<?php echo "Rp ". number_format($rowkaskecil["gaji_cetakgenteng"],1,",","."); ?>" class="form-control-plaintext" readonly>
		</div>
	</div>
	<div id="line_setting" class="row">
		<div class="col-lg-3">
			<label>Set Gaji Buis</label>
			<input type="text" id="set_gajibuisl" class="form-control">
		</div>
		<div class="col-lg-3">
			<label>Gaji Buis</label>
			<input id="current_gajibuis" type="text" value="<?php echo "Rp ". number_format($rowkaskecil["gaji_buisbeton"],1,",","."); ?>" class="form-control-plaintext" readonly>
		</div>
		<div class="col-lg-3">
			<label>Set Gaji Paving</label>
			<input type="text" id="set_gajipaving" class="form-control">
		</div>
		<div class="col-lg-3">
			<label>Gaji Paving</label>
			<input id="current_gajipaving" type="text" value="<?php echo "Rp ". number_format($rowkaskecil["gaji_paving"],1,",","."); ?>" class="form-control-plaintext" readonly>
		</div>
	</div>
	<div id="line_setting" class="row">
		<div class="col-lg-3">
			<label>Set Gaji Greffel</label>
			<input type="text" id="set_gajigreffel" class="form-control">
		</div>
		<div class="col-lg-3">
			<label>Gaji Greffel</label>
			<input id="current_gajigreffel" type="text" value="<?php echo "Rp ". number_format($rowkaskecil["gaji_greffel"],1,",","."); ?>" class="form-control-plaintext" readonly>
		</div>
		<div class="col-lg-3">
			<label>Set Gaji U-Ditch</label>
			<input type="text" id="set_gajiuditch" class="form-control">
		</div>
		<div class="col-lg-3">
			<label>Gaji U-Ditch</label>
			<input id="current_gajiuditch" type="text" value="<?php echo "Rp ". number_format($rowkaskecil["gaji_uditch"],1,",","."); ?>" class="form-control-plaintext" readonly>
		</div>
	</div>
	<div id="line_setting" class="row">
		
		<div class="col-lg-3">
			<label>Set Gaji Cover Buis</label>
			<input type="text" id="set_gajicoverbuis" class="form-control">
		</div>
		<div class="col-lg-3">
			<label>Gaji Cover Buis</label>
			<input id="current_gajicbuis" type="text" value="<?php echo "Rp ". number_format($rowkaskecil["gaji_coverbuisbeton"],1,",","."); ?>" class="form-control-plaintext" readonly>
		</div>
		<div class="col-lg-3">
			<label>Set Gaji Cover U-Ditch</label>
			<input type="text" id="set_gajicoveruditch" class="form-control">
		</div>
		<div class="col-lg-3">
			<label>Gaji Cover U-Ditch</label>
			<input id="current_gajicoveruditch" type="text" value="<?php echo "Rp ". number_format($rowkaskecil["gaji_coveruditch"],1,",","."); ?>" class="form-control-plaintext" readonly>
		</div>
	</div>
	<div id="line_setting" class="row">
		<div class="col-lg-3">
			<label>Set Gaji Lapangan</label>
			<input type="text" id="set_gajilapangan" class="form-control">
		</div>
		<div class="col-lg-3">
			<label>Gaji Lapangan</label>
			<input id="current_gajilapangan" type="text" value="<?php echo "Rp ". number_format($rowkaskecil["gaji_lapangan"],1,",","."); ?>" class="form-control-plaintext" readonly>
		</div>
		<div class="col-lg-3">
			<label>Set Gaji Staff</label>
			<input type="text" id="set_gajistaff" class="form-control">
		</div>
		<div class="col-lg-3">
			<label>Gaji Staff</label>
			<input id="current_gajistaff" type="text" value="<?php echo "Rp ". number_format($rowkaskecil["gaji_staff"],1,",","."); ?>" class="form-control-plaintext" readonly>
		</div>
	</div>

	<div class="alert alert-danger">Setting Toleransi Pecah Genteng & Paving</div>

	<div id="line_setting" class="row">
		
		<div class="col-lg-3">
			<label>Set Toleransi Cetak Genteng</label>
			<input type="text" id="set_limit_genteng" class="form-control">
		</div>
		<div class="col-lg-3">
			<label>Toleransi Cetak Genteng</label>
			<input id="current_tgenteng" type="text" value="<?php echo $rowkaskecil["t_pecah_genteng"]; ?>" class="form-control-plaintext" readonly>
		</div>
		<div class="col-lg-3">
			<label>Set Toleransi Cat Genteng</label>
			<input type="text" id="set_tl_catgenteng" class="form-control">
		</div>
		<div class="col-lg-3">
			<label>Toleransi Cat Genteng</label>
			<input id="current_catgenteng" type="text" value="<?php echo $rowkaskecil["t_pecah_catgenteng"]; ?>" class="form-control-plaintext" readonly>
		</div>
	</div>

	<div id="line_setting" class="row">
		
		<div class="col-lg-3">
			<label>Set Toleransi Angkat Genteng</label>
			<input type="text" id="set_tl_angkatgenteng" class="form-control">
		</div>
		<div class="col-lg-3">
			<label>Toleransi Angkat Genteng</label>
			<input id="current_angkatgenteng" type="text" value="<?php echo $rowkaskecil["t_pecah_angkatgenteng"]; ?>" class="form-control-plaintext" readonly>
		</div>
		<div class="col-lg-3">
			<label>Set Toleransi Paving</label>
			<input type="text" id="set_limit_paving" class="form-control">
		</div>
		<div class="col-lg-3">
			<label>Toleransi Paving</label>
			<input id="current_tpaving" type="text" value="<?php echo $rowkaskecil["t_pecah_paving"]; ?>" class="form-control-plaintext" readonly>
		</div>
	</div>

	<div class="alert alert-danger">Setting Range Genteng & Paving</div>

	<div id="line_setting" class="row">
		
		<div class="col-lg-3">
			<label>Set Range Cetak Genteng</label>
			<input type="text" id="set_range_cetak" class="form-control">
		</div>
		<div class="col-lg-3">
			<label>Range Cetak Genteng</label>
			<input id="current_rgenteng" type="text" value="<?php echo $rowkaskecil["range_cetak"]; ?>" class="form-control-plaintext" readonly>
		</div>
		
		
		<div class="col-lg-3">
			<label>Set Range Cat Genteng</label>
			<input type="text" id="set_range_cat" class="form-control">
		</div>
		<div class="col-lg-3">
			<label>Range Cat Genteng</label>
			<input id="current_rcat" type="text" value="<?php echo $rowkaskecil["range_cat"]; ?>" class="form-control-plaintext" readonly>
		</div>

		<div class="col-lg-3">
			<label>Set Range Angkat Genteng</label>
			<input type="text" id="set_range_angkat" class="form-control">
		</div>
		<div class="col-lg-3">
			<label>Range Angkat Genteng</label>
			<input id="current_rangkat" type="text" value="<?php echo $rowkaskecil["range_angkat"]; ?>" class="form-control-plaintext" readonly>
		</div>
		<div class="col-lg-3">
			<label>Set Range Paving</label>
			<input type="text" id="set_range_paving" class="form-control">
		</div>
		<div class="col-lg-3">
			<label>Range Paving</label>
			<input id="current_rpaving" type="text" value="<?php echo $rowkaskecil["range_paving"]; ?>" class="form-control-plaintext" readonly>
		</div>
	</div>

	<div class="alert alert-danger">Setting Reminder Limit Stock Genteng & Paving</div>

	<div id="line_setting" class="row">
		<div class="col-lg-3">
			<label>Set Limit Stok Genteng</label>
			<input type="text" id="set_limit_sgenteng" class="form-control">
		</div>
		<div class="col-lg-3">
			<label>Limit Stok Genteng</label>
			<input id="current_sgenteng" type="text" value="<?php echo $rowkaskecil["limitstock_genteng"]; ?>" class="form-control-plaintext" readonly>
		</div>
		<div class="col-lg-3">
			<label>Set Limit Stok Paving</label>
			<input type="text" id="set_limit_spaving" class="form-control">
		</div>
		<div class="col-lg-3">
			<label>Limit Stok Paving</label>
			<input id="current_spaving" type="text" value="<?php echo $rowkaskecil["limitstock_paving"]; ?>" class="form-control-plaintext" readonly>
		</div>
	</div>
	<div id="line_setting" class="row">
		<div class="col-lg-3">
			<label>Set Limit Stok Greffel</label>
			<input type="text" id="set_limit_greffel" class="form-control">
		</div>
		<div class="col-lg-3">
			<label>Limit Stok Greffel</label>
			<input id="current_tgreffel" type="text" value="<?php echo $rowkaskecil["limitstock_greffel"]; ?>" class="form-control-plaintext" readonly>
		</div>
		<div class="col-lg-3">
			<label>Set Limit Stok Buis</label>
			<input type="text" id="set_limit_buis" class="form-control">
		</div>
		<div class="col-lg-3">
			<label>Limit Stok Buis</label>
			<input id="current_tbuis" type="text" value="<?php echo $rowkaskecil["limitstock_buis"]; ?>" class="form-control-plaintext" readonly>
		</div>
	</div>
	<div id="line_setting" class="row">
		<div class="col-lg-3">
			<label>Set Limit Stok Cover U-Ditch</label>
			<input type="text" id="set_limit_cuditch" class="form-control">
		</div>
		<div class="col-lg-3">
			<label>Limit Stok Cover U-Ditch</label>
			<input id="current_tcuditch" type="text" value="<?php echo $rowkaskecil["limitstock_cuidtch"]; ?>" class="form-control-plaintext" readonly>
		</div>
		<div class="col-lg-3">
			<label>Set Limit Stok U-Ditch</label>
			<input type="text" id="set_limit_uditch" class="form-control">
		</div>
		<div class="col-lg-3">
			<label>Limit Stok U-Ditch</label>
			<input id="current_tuditch" type="text" value="<?php echo $rowkaskecil["limitstock_uditch"]; ?>" class="form-control-plaintext" readonly>
		</div>
	</div>
	<div id="line_setting" class="row">
		<div class="col-lg-3">
			<label>Set Limit Stok Cover Buis</label>
			<input type="text" id="set_limit_cbuis" class="form-control">
		</div>
		<div class="col-lg-3">
			<label>Limit Stok Cover Buis</label>
			<input id="current_tcbuis" type="text" value="<?php echo $rowkaskecil["limitstock_cbuis"]; ?>" class="form-control-plaintext" readonly>
		</div>
		
	</div>
</div>	