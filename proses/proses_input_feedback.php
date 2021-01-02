<?php
	if(isset($_POST["no_trfeedback"])){
		$no_trfeedback = $_POST["no_trfeedback"];
		$confirm_rusak = $_POST["confirm_rusak"];

		if($confirm_rusak == "Ya"){
			$sqlconfirmrusak = "insert into feedback_brg values('','".$no_trfeedback."','".$confirm_rusak."')";

			$sqlupdatesuratjalan = "update order_pembeli set feedback = 'Feedback' where no_transaksi = '".$no_trfeedback."'"; 
			mysqli_query($koneksi, $sqlconfirmrusak);
			mysqli_query($koneksi, $sqlupdatesuratjalan);
		}else{
			$sqlconfirmrusak = "insert into feedback_brg values('','".$no_trfeedback."','".$confirm_rusak."')";
			// $sqlinputnotr = "insert into barang_rusak(no_transaksi) values('".$no_trfeedback."')";
			$sqlupdatesuratjalan = "update order_pembeli set feedback = 'Feedback' where no_transaksi = '".$no_trfeedback."'";

			mysqli_query($koneksi, $sqlconfirmrusak);
			// mysqli_query($koneksi, $sqlinputnotr);
			mysqli_query($koneksi, $sqlupdatesuratjalan);
		}

		// echo '<div class="alert alert-success">Feedback Kerusakan Barang Sudah Disimpan</div>';
		include_once "dokumen/data_suratjalan.php";
	}
?>