<?php
	include_once "koneksi.php";

	$tgl_awalstock = date("Y-m-d", strtotime($_POST["tgl_awalstock"]));
	$tgl_akhirstock = date("Y-m-d", strtotime($_POST["tgl_akhirstock"]));

	$sqlbahanbaku = "select * from stock_barang";
	$getbahanbaku = mysqli_query($koneksi, $sqlbahanbaku);

	
	$nomor = 1;
?>

<table class="table table-bordered">
	<thead>
		<tr>
			<th>No</th>
			<th>Kode Barang</th>
			<th>Nama Barang</th>
			<!--<th>Stock Awal</th>
			<th>Stock Masuk</th>-->
			<th>Total Seluruh</th>
			<th>Stock Terjual</th>
			<th>Stock Akhir</th>
			<th>Kondisi</th>
		</tr>
	</thead>
	<tbody>
<?php
	while ($rowstockbarang = mysqli_fetch_array($getbahanbaku)){
		if($rowstockbarang["jenis_brg"] == "Genteng"){
			$getlimitstockgenteng = mysqli_query($koneksi, "select * from setting_limitstokgenteng where kode_barang = '".$rowstockbarang["kode_barang"]."'");
			$rowlimitstockgenteng = mysqli_fetch_array($getlimitstockgenteng);

			if($rowstockbarang["stock_akhir"] < $rowlimitstockgenteng["jml_limit"]){
			  	$kondisi = '<div class="alert alert-danger">Kurang</div>';
			}else{
				$kondisi = "Cukup";
			}
		  }elseif($rowstockbarang["jenis_brg"] == "Paving"){
			$getlimitpaving = mysqli_query($koneksi, "select limit_stock from setting_cetakpaving where kode_barang = '".$rowstockbarang["kode_barang"]."'");
			$rowlimitpaving = mysqli_fetch_array($getlimitpaving);

			if($rowstockbarang["stock_akhir"] < $rowlimitpaving["limit_stock"]){
				$kondisi = '<div class="alert alert-danger">Kurang</div>';
			}else{
				$kondisi = "Cukup";
			}
		  }else{
			$getlimitlain = mysqli_query($koneksi, "select limit_stock from setting_baranglain where kode_barang = '".$rowstockbarang["kode_barang"]."'");
			$rowlimitlain = mysqli_fetch_array($getlimitlain);

			if($rowstockbarang["stock_akhir"] < $rowlimitlain["limit_stock"]){
				$kondisi = '<div class="alert alert-danger">Kurang</div>';
			}else{
				$kondisi = "Cukup";
			}
		  }
		$hitungterjual = mysqli_query($koneksi, "select sum(jml_terjual) as tterjual from stock_terjual where tgl_terjual between '".$tgl_awalstock."' and '".$tgl_akhirstock."' and kd_barang = '".$rowstockbarang["kode_barang"]."' order by id_terjual desc limit 1");
		$rowtterjual = mysqli_fetch_array($hitungterjual);

		
		$totalseluruh = $rowstockbarang['stock_awal'] + $rowstockbarang['stock_masuk'];
?>
	<tr>
		<td><?php echo $nomor; ?></td>
		<td><?php echo $rowstockbarang['kode_barang']; ?></td>
		<td><?php echo $rowstockbarang['nama_barang']; ?></td>
		<!--<td><?php echo $rowstockbarang['stock_awal']; ?></td>
		<td><?php echo $rowstockbarang['stock_masuk']; ?></td>-->
		<td><?php echo $totalseluruh; ?></td>
		<td><?php echo $rowtterjual['tterjual']; ?></td>
		<td><?php echo $rowstockbarang['stock_akhir']; ?></td>
		<td><?php echo $kondisi; ?></td>
	</tr>  
	     
<?php

	    $nomor ++;
	}

	$gettotalmodal = mysqli_query($koneksi, "select sum(modal_stock) as total from stock_barang");
	$rowtotalmodal = mysqli_fetch_array($gettotalmodal);
?>
	<tr>
		<td colspan="4">Total Modal</td>
		<td colspan="3">Rp <?php echo number_format($rowtotalmodal["total"],0,",",".") ?></td>
	</tr>
	</tbody>
</table>

	<div class="row">
		<div class="col-lg-12">
			<form action="<?php echo $url; ?>" method="post" target="_blank">
				<input type="hidden" name="menu" value="buatlaporanstock">
				<input type="hidden" name="tgl_awal" value="<?php echo $tgl_awalstock; ?>">
				<input type="hidden" name="tgl_akhir" value="<?php echo $tgl_akhirstock; ?>">
				<button type="submit" class="btn btn-success">Buat Laporan</button>
			</form>
		</div>
	</div>