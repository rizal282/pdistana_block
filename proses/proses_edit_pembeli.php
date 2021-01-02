<?php 
	$id_editorder = $_POST["id_editorder"];
	$tr_order = $_POST["tr_order"];
	$tgl_beli = date("Y-m-d", strtotime($_POST["tgl_beli"]));
	$pembeli = $_POST["pembeli"];
	$nohp_pembeli = $_POST["nohp_pembeli"];
	$alamat_pembeli = $_POST["alamat_pembeli"];
	$wilayah = $_POST["wilayah"];
	$pembayaran = $_POST["pembayaran"];

	// cek status lunas di total pembayaran

	$cekdatalunas = mysqli_query($koneksi, "select sts_lunas from total_bayar_pembeli where no_transaksi = '".$tr_order."'");
	$rowdatalunas = mysqli_fetch_array($cekdatalunas);

	$cekdatapembayaran = mysqli_query($koneksi, "select * from pembayaran where no_transaksi = '".$tr_order."'");
	$countdatapembayaran = mysqli_num_rows($cekdatapembayaran);

	if($rowdatalunas["sts_lunas"] == "Sudah Lunas" && $countdatapembayaran != 0){
		echo '<div class="alert alert-danger">Anda Tidak Bisa Mengganti Jenis Pembayaran</div>';
		include_once "order/data_order_pembeli.php";
	}else{
		if($pembayaran == "Tunai"){
			$tgl_tempo = "0000-00-00";
		}else{
			$tgl_tempo = date("Y-m-d", strtotime($_POST["tgl_tempo"]));
		}
		
		$keterangan = $_POST["keterangan"];

		$sqlupdatepembeli = "update order_pembeli set tgl_beli = '".$tgl_beli."', nama_pembeli = '".$pembeli."', nohp_pembeli = '".$nohp_pembeli."', alamat_pembeli = '".$alamat_pembeli."', wilayah = '".$wilayah."', pembayaran = '".$pembayaran."', jatuh_tempo = '".$tgl_tempo."', keterangan = '".$keterangan."' where id_order = '".$id_editorder."'";

		mysqli_query($koneksi, $sqlupdatepembeli);

		echo '<div class="alert alert-success">Data Pembeli Sudah Diperbarui</div>';

		include_once "order/data_order_pembeli.php";
	}



	
?>