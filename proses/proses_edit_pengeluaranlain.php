<?php
	if(isset($_POST["id_editpengeluaranlain"])){
		$id_editpengeluaranlain = $_POST["id_editpengeluaranlain"];
		$edit_nama_beban = $_POST["edit_nama_beban"];
		$nopelanggan = $_POST["nopelanggan"];
		$edit_nominal = $_POST["edit_nominal"];
		$edit_keterangan = $_POST["edit_keterangan"];

		// ambil nominal kas besar
		$sqlgetnominalkasbesar = "select * from kas";
		$aksigetnominalkasbesar = mysqli_query($koneksi, $sqlgetnominalkasbesar);
		$rowkasbesar = mysqli_fetch_array($aksigetnominalkasbesar);

		// ambil nominal dari pengeluaran lain
		$sqlgetnominalpengeluaranlain = "select nominal from pengeluaran_lain where id_pengeluaran_lain = '".$id_editpengeluaranlain."'";
		$aksigetnominalpengeluaranlain = mysqli_query($koneksi, $sqlgetnominalpengeluaranlain);
		$rownominalpengeluaranlain = mysqli_fetch_array($aksigetnominalpengeluaranlain);

		$kasbesarawal = $rowkasbesar["kas_besar"] + $rownominalpengeluaranlain["nominal"];
		// $kaskecilawal = $rowkasbesar["kas_kecil"] - $rownominalpengeluaranlain["nominal"];

		// update kas besar
		mysqli_query($koneksi, "update kas set kas_besar = '".$kasbesarawal."' where id_kas = 1");

		// ambil lagi nominal dari kas KECIL
		$sqlambillaginominalkasbesar = "select * from kas";
		$aksiambillaginominalkasbesar = mysqli_query($koneksi, $sqlambillaginominalkasbesar);
		$rowambillaginominalkasbesar = mysqli_fetch_array($aksiambillaginominalkasbesar);

		// $kaskecilsekarang = $rowambillaginominalkasbesar["kas_kecil"] + $edit_nominal;
		$kasbesarsekarang = $rowambillaginominalkasbesar["kas_besar"] - $edit_nominal;

		// update lagi kas besar setelah nominal pengeluaran lain dirubah
		mysqli_query($koneksi, "update kas set kas_besar = '".$kasbesarsekarang."' where id_kas = 1");

		// update data di pengeluaran lain 
		$sqlupdatepengeluaranlain = "update pengeluaran set nama_pengeluaran = '".$edit_nama_beban."', no_pelanggan = '".$nopelanggan."', nominal = '".$edit_nominal."', keterangan = '".$edit_keterangan."' where id_pengeluaran = '".$id_editpengeluaranlain."'";
		mysqli_query($koneksi, $sqlupdatepengeluaranlain);

		echo '<div class="alert alert-success">Pengeluaran lain Sudah Diperbarui</div>';

		include_once "pengeluaran/data_pengeluaran_lainlain.php";

	}
?>