<?php
	if(isset($_POST["nm_kry"])){
		$id_edithistori = $_POST["id_edithistori"];
		$id_kry = $_POST["id_kry"];
		$nm_kry = $_POST["nm_kry"];
		$tgl_kerja = date("Y-m-d", strtotime($_POST["tgl_kerja"]));
		$kode_brg = $_POST["kode_brg"];
		$jenis_brg = $_POST["jenis_brg"];
		$qty_brg = $_POST["qty_brg"];
		$qtylast_semen = $_POST["qtylast_semen"];
		$qty_semen = $_POST["qty_semen"];
		$pekerjaan = $_POST["pekerjaan"];
		$keterangan = $_POST["keterangan"];

		// ambil qty stok bahan baku semen
		$getstocksemen = mysqli_query($koneksi, "select jumlah_barang from bahan_baku where nama_bahanbaku = 'semen'");
		$rowstoksemen = mysqli_fetch_array($getstocksemen);

		$totalstokawal = $rowstoksemen["jumlah_barang"] + $qtylast_semen;

		// update stok semen
		mysqli_query($koneksi, "update bahan_baku set jumlah_barang = '".$totalstokawal."' where nama_bahanbaku = 'semen'");

		// ambil lagi stok semen
		$getstocksemenlagi = mysqli_query($koneksi, "select jumlah_barang from bahan_baku where nama_bahanbaku = 'semen'");
		$rowstoksemenlagi = mysqli_fetch_array($getstocksemenlagi);

		$stoksemensekarang = $rowstoksemenlagi["jumlah_barang"] - $qty_semen;

		mysqli_query($koneksi, "update bahan_baku set jumlah_barang = '".$stoksemensekarang."' where nama_bahanbaku = 'semen'");

		mysqli_query($koneksi, "update tempstock_barangkry set tgl = '".$tgl_kerja."', kode_brg = '".$kode_brg."', jenis_brg = '".$jenis_brg."', qty_brg = '".$qty_brg."', qty_semen = '".$qty_semen."', pekerjaan = '".$pekerjaan."', keterangan = '".$keterangan."' where id_tempstock = '".$id_tempstock."'");

		echo '<div class="alert alert-success">Data Pekerjaan Karyawan Sudah Diperbarui</div>';

		include_once "karyawan/data_karyawan.php";
	}
?>