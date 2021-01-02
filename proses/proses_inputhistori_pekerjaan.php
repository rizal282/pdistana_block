<?php
	if(isset($_POST["simpanhistorikerja"])){
		$id_kry = $_POST["id_kry"];
		// $nm_kry = $_POST["nm_kry"];
		$tgl_kerja = date("Y-m-d", strtotime($_POST["tgl_kerja"]));
		$kode_brg = $_POST["kode_brg"];
		$nama_brg = $_POST["nama_brg"];
		$jenis_brg = $_POST["jenis_brg"];
		$qty_brg = $_POST["qty_brg"];
		$qty_semen = $_POST["qty_semen"];
		$pekerjaan = $_POST["pekerjaan"];
		$keterangan = $_POST["keterangan"];

		$sqlgetstocksemen = "select * from bahan_baku where nama_bahanbaku = 'semen'";
		$getstocksemen = mysqli_query($koneksi, $sqlgetstocksemen);
		$rowstocksemen = mysqli_fetch_array($getstocksemen);

		// echo $rowstocksemen["nama_bahanbaku"];

		$sqlinputhistorikerjakry = "insert into historikerjakaryawan values(null,'".$id_kry."','".$tgl_kerja."','".$kode_brg."','".$jenis_brg."','".$qty_brg."','".$qty_semen."','".$pekerjaan."','".$keterangan."')";
		// $sqlinputhistorikerjakry = "insert into historikerjakaryawan values('','".$id_kry."','".$tgl_kerja."','".$kode_brg."','".$jenis_brg."','".$qty_brg."','".$qty_semen."','".$pekerjaan."','".$keterangan."')";
		mysqli_query($koneksi, $sqlinputhistorikerjakry);

		$sqlinputtempkerjakry = "insert into tempstock_barangkry values(null,'".$id_kry."','".$tgl_kerja."','".$kode_brg."', '".$jenis_brg."','".$qty_brg."','".$qty_semen."','".$pekerjaan."','".$keterangan."')";
		// $sqlinputtempkerjakry = "insert into tempstock_barangkry values('','".$id_kry."','".$tgl_kerja."','".$kode_brg."', '".$jenis_brg."','".$qty_brg."','".$qty_semen."','".$pekerjaan."','".$keterangan."')";
		mysqli_query($koneksi, $sqlinputtempkerjakry);

		if(!empty($qty_semen)){
			$totalsemen = $qty_semen;
			$sisastocksemen = $rowstocksemen["jumlah_barang"] - $totalsemen;
		}else{
			$totalsemen = 0;
			$sisastocksemen = $rowstocksemen["jumlah_barang"] - $totalsemen;
		}

		mysqli_query($koneksi, "update bahan_baku set jumlah_barang = '".$sisastocksemen."' where nama_bahanbaku = 'semen'");

		echo '<div class="alert alert-success">Pekerjaan Karyawan Sudah Disimpan!</div>';

		include_once "karyawan/data_karyawan.php";
	}	
?>
