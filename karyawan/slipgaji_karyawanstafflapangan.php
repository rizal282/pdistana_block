<?php
	// include 'koneksi.php';
	ob_start();
	// $tgl_awal = $_POST["tgl_awal"];
	// $tgl_akhir = $_POST["tgl_akhir"];

	// memanggil library FPDF
	include_once('fpdf/fpdf.php');
	// intance object dan memberikan pengaturan halaman PDF
	$pdf = new FPDF('p','mm','A5');
	// membuat halaman baru
	$pdf->AddPage();

	// Logo
    $pdf->Image('img/logopdistana.png',10,11,20);

	// setting jenis font yang akan digunakan
	$pdf->SetFont('Arial','B',10);
	// mencetak string 
	$pdf->Cell(148.5,7,'ISTANA BLOCK PURWAKARTA',0,1,'L');
	$pdf->SetFont('Arial','B',12);
	$pdf->Cell(148.5,7,'SLIP GAJI KARYAWAN',0,1,'L');

	// Memberikan space kebawah agar tidak terlalu rapat
	$pdf->Cell(10,7,'',0,1);

	

	$getgajikaryawanharian = "select * from gaji_karyawantetap inner join karyawan on gaji_karyawantetap.id_kry = karyawan.id_kry order by gaji_karyawantetap.id_gaji desc limit 1";
	$aksigetgajikaryawanharian = mysqli_query($koneksi, $getgajikaryawanharian);
	$rowgajiharian = mysqli_fetch_array($aksigetgajikaryawanharian);

	if($rowgajiharian['sisa_upah'] == 0){
		$upah = $rowgajiharian['total_gaji'];
	}else{
		$upah = $rowgajiharian['sisa_upah'];
	}

	$pdf->SetFont('Arial','B',10);

	$pdf->Cell(40,7,'Periode Penggajian',0,0);
	$pdf->Cell(10,7,'Dari',0,0);
	$pdf->Cell(30,7,date("d M Y", strtotime($rowgajiharian["tgl_awal_periode"])),0,0);
	$pdf->Cell(20,7,'Sampai',0,0);
	$pdf->Cell(30,7,date("d M Y", strtotime($rowgajiharian["tgl_akhir_periode"])),0,1);

	// Memberikan space kebawah agar tidak terlalu rapat
	$pdf->Cell(10,7,'',0,1);

	$pdf->SetFont('Arial','',10);
	$pdf->Cell(30,6,'Tanggal',1,0);
	$pdf->Cell(30,6,date('d M Y', strtotime($rowgajiharian['tgl_gaji'])),1,1);
	$pdf->Cell(30,6,'Nama Karyawan',1,0);
	$pdf->Cell(30,6,ucwords($rowgajiharian['nama_kry']),1,1);
	$pdf->Cell(30,6,'Total Upah',1,0);
	$pdf->Cell(30,6,"Rp ".number_format($rowgajiharian['total_gaji'],1,",","."),1,1);
	$pdf->Cell(30,6,'Bayar Kasbon',1,0);
	$pdf->Cell(30,6,"Rp ".number_format($rowgajiharian['bayar_kasbon'],1,",","."),1,1);
	$pdf->Cell(30,6,'Sisa Upah',1,0);
	$pdf->Cell(30,6,'Rp '.number_format($upah,1,',','.'),1,1);
	$pdf->Cell(30,6,'Keterangan',1,0);
	$pdf->Cell(30,6,$rowgajiharian['keterangan'],1,1);



	$pdf->SetFont('Arial','',10);

	// Memberikan space kebawah agar tidak terlalu rapat
	$pdf->Cell(10,7,'',0,1);

	$pdf->Cell(30,6,'',0,0);
	$pdf->Cell(30,6,'',0,0);
	$pdf->Cell(60,6,'Mengetahui',0,0,'C');

	// Memberikan space kebawah agar tidak terlalu rapat
	$pdf->Cell(10,30,'',0,1);

	$pdf->Cell(30,6,'',0,0);
	$pdf->Cell(30,6,'',0,0);
	$pdf->Cell(60,6,'..........',0,0,'C');

	// $sqlgetdatabetweendate = "select * from pembayaran inner join order_pembeli on pembayaran.no_transaksi = order_pembeli.no_transaksi where pembayaran.tgl_bayar between '".$tgl_awal."' and '".$tgl_akhir."'";
	// $pemasukan = mysqli_query($koneksi, $sqlgetdatabetweendate);
	// $nomor = 1;
	// while ($row = mysqli_fetch_array($pemasukan)){
	//     $pdf->Cell(18,6,$nomor,1,0);
	//     $pdf->Cell(30,6,date("d M Y", strtotime($row['tgl_bayar'])),1,0);
	//     $pdf->Cell(27,6,$row['no_transaksi'],1,0);
	//     $pdf->Cell(50,6,$row['nama_pembeli'],1,0); 
	//     $pdf->Cell(30,6,$row['nominal_dp'],1,0);
	//     $pdf->Cell(30,6,$row['nominal_cash'],1,1); 

	//     $nomor ++;
	// }

	$pdf->Output();
	ob_end_flush(); 
?>