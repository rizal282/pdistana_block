<?php
	if(isset($_POST["tanggal"])){
		$tanggal = date("Y-m-d", strtotime($_POST["tanggal"]));
		$keterangan = $_POST["keterangan"];
		$format_angka = explode(".", $_POST["mutasi"]);
		$mutasi = implode($format_angka);
		$kreditdebit = $_POST["kreditdebit"];

		// ambil nominal dari kas bank
		$sqlgetkasbank = "select kas_bank from kas";
		$aksigetkasbank = mysqli_query($koneksi, $sqlgetkasbank);
		$rowkasbank = mysqli_fetch_array($aksigetkasbank);

		if($kreditdebit == "Kredit"){
			//tambahkan mutasi ke kas bank
			$kasbankbaru = $rowkasbank["kas_bank"] + $mutasi;

			// simpan mutasi ke tabel rekening koran
			$sqlinsertrekeningkoran = "insert into rekening_koran values('','".$tanggal."','".$keterangan."','".$mutasi."','".$kreditdebit."')";
			mysqli_query($koneksi, $sqlinsertrekeningkoran);

			// update kas bank
			$sqlupdatekasbank = "update kas set kas_bank = '".$kasbankbaru."' where id_kas = 1";
			mysqli_query($koneksi, $sqlupdatekasbank);

			echo '<div class="alert alert-success">Data Rekening Koran Sudah Disimpan</div>';
			include_once "keuangan/kas_keuangan.php";
		}else{
			//kurangi kas bank dengan mutasi
			$kasbankbaru = $rowkasbank["kas_bank"] - $mutasi;

			// simpan mutasi ke tabel rekening koran
			$sqlinsertrekeningkoran = "insert into rekening_koran values('','".$tanggal."','".$keterangan."','".$mutasi."','".$kreditdebit."')";
			mysqli_query($koneksi, $sqlinsertrekeningkoran);

			// update kas bank
			$sqlupdatekasbank = "update kas set kas_bank = '".$kasbankbaru."' where id_kas = 1";
			mysqli_query($koneksi, $sqlupdatekasbank);

			echo '<div class="alert alert-success">Data Rekening Koran Sudah Disimpan</div>';

			include_once "keuangan/kas_keuangan.php";
		}
	}
?>
