<?php
	if(isset($_POST["simpan_pembeli"])){
		$no_transaksi = $_POST["no_transaksi"];
		$tgl_beli = date("Y-m-d", strtotime($_POST["tgl_beli"]));
		$pembeli = $_POST["pembeli"];
		$nohp_pembeli = $_POST["nohp_pembeli"];
		$alamat_pembeli = $_POST["alamat_pembeli"];
		$wilayah = $_POST["wilayah"];
		$pembayaran = $_POST["pembayaran"];
		// $tgl_tempo = date("Y-m-d", strtotime($_POST["tgl_tempo"]));
		$keterangan = $_POST["keterangan"];

		if($pembayaran == "Tunai"){
			$tgl_tempo = "0000-00-00";
		}else{
			$tgl_tempo = date("Y-m-d", strtotime($_POST["tgl_tempo"]));
		}

		$sqltambahpembeli = "insert into order_pembeli values('','".$no_transaksi."','".$tgl_beli."','".$pembeli."','".$nohp_pembeli."','".$alamat_pembeli."', '".$wilayah."','".$pembayaran."','".$tgl_tempo."','".$keterangan."','Proses','Belum','','','','Belum')";

		mysqli_query($koneksi, $sqltambahpembeli);

		$sqlpindahorder = "INSERT INTO detail_order_pembeli(no_transaksi,kode_barang,nama_barang,warna_brg,hrg_barang,jumlah_beli,satuan_brg,total_hrg,sumber_brg) SELECT no_transaksi,kode_barang,nama_barang,warna_brg,hrg_barang,jumlah_beli,satuan_brg,total_hrg,sumber_brg FROM temp_order";
		mysqli_query($koneksi, $sqlpindahorder);

		// hitung total bayar pembeli

		$sqlhitungjmldibeli = mysqli_query($koneksi, "select sum(total_hrg) as total_seluruh from detail_order_pembeli where no_transaksi = '".$no_transaksi."'");
		$rowtotalharga = mysqli_fetch_array($sqlhitungjmldibeli);

		$totalharusbayar = $rowtotalharga["total_seluruh"];

		mysqli_query($koneksi, "insert into total_bayar_pembeli(no_transaksi,total_bayar,sts_lunas) values('".$no_transaksi."','".$totalharusbayar."','Belum Lunas')");

		// mysqli_query($koneksi, "insert into total_bayar_pembeli values('','".$no_transaksi."','".$totalharusbayar."','','','Belum Lunas')");

		// buat faktur
		$cekdatafaktur = mysqli_query($koneksi, "select * from faktur order by id_faktur desc");
		$countdatafaktur = mysqli_num_rows($cekdatafaktur);
		$rowdatafaktur = mysqli_fetch_array($cekdatafaktur);

		if($countdatafaktur == 0){
			$no_faktur = "ISTNB-FA-1";
		}else{
			$exp_faktur = explode("-",$rowdatafaktur["no_faktur"]);
			$nextfaktur = $exp_faktur[2] + 1;
			$no_faktur = "ISTNB-FA-".$nextfaktur;
		}

		mysqli_query($koneksi, "insert into faktur values('','".$no_faktur."','".$no_transaksi."')");

		$hapustemp = "DELETE FROM temp_order";
		mysqli_query($koneksi, $hapustemp);

		//header("location:data_order_pembeli.php");

		echo '<div class="alert alert-success">Data Pembeli Sudah Disimpan</div>';
	}

	include_once("order/detail_order_pembeli.php");
?>