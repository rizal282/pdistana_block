<?php
	include_once "koneksi.php";

	//ambil nominal dari kas bank
	$sqlgetkasbank = mysqli_query($koneksi, "select kas_bank from kas where id_kas = 1");
	$rowkasbank = mysqli_fetch_assoc($sqlgetkasbank);

	//ambil nominal saat ini dari kas besar
	$sqlgetnominalkasbesar = mysqli_query($koneksi, "select kas_besar from kas where id_kas = 1");
	$rowkasbesar = mysqli_fetch_assoc($sqlgetnominalkasbesar);

	$nominaltopup = $_POST["nominaltopup"];
	$danakasbank = $rowkasbank["kas_bank"];

	// menghitung kas besar setelah di-top up
	$hasiltopup = $nominaltopup + $rowkasbesar["kas_besar"];

	//hitung kas bank setelah dikurangi nominal top up ke kas besar
	$nominalkasbank = $danakasbank - $nominaltopup;

	// update kas besar
	mysqli_query($koneksi, "update kas set kas_besar = '".$hasiltopup."' where id_kas = 1");

	// update kas bank
	mysqli_query($koneksi, "update kas set kas_bank = '".$nominalkasbank."' where id_kas = 1");

	// masukkan data top up kas besar ke rek koran
	mysqli_query($koneksi, "insert into rekening_koran values('','".date("Y-m-d")."','Top Up Kas Besar','".$nominaltopup."','Debit')");

	$getkaskecil = mysqli_query($koneksi, "select * from kas");
	$rowdatakaskecil = mysqli_fetch_array($getkaskecil);

	$kassemua = array(
		"kasbesar" => "Rp ".number_format($rowdatakaskecil["kas_besar"],1,",","."),
		"kasbank" => "Rp ".number_format($rowdatakaskecil["kas_bank"],1,",","."),
	);

	echo json_encode($kassemua);
	

?>