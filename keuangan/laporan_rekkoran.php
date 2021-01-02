<?php
	// include 'koneksi.php';
	ob_start();
	$tgl_awal = date("Y-m-d", strtotime($_POST["tgl_awal"]));
	$tgl_akhir = date("Y-m-d", strtotime($_POST["tgl_akhir"]));

	// memanggil library FPDF
	include_once('fpdf/fpdf.php');
	// intance object dan memberikan pengaturan halaman PDF
	$pdf = new FPDF('p','mm','A4');
	// membuat halaman baru
	$pdf->AddPage();
	// setting jenis font yang akan digunakan
	$pdf->SetFont('Arial','B',16);
	// mencetak string
	$pdf->Cell(210,7,'ISTANA BLOCK PURWAKARTA',0,1,'C');
	$pdf->SetFont('Arial','B',12);
	$pdf->Cell(210,7,'LAPORAN REKENING KORAN',0,1,'C');

	// Memberikan space kebawah agar tidak terlalu rapat
	$pdf->Cell(10,7,'',0,1);

	// tanggal laporan
	$pdf->Cell(40,8,'Tanggal Laporan',0,0);
	$pdf->Cell(30,8,date("d M Y"),0,0);
	$pdf->Cell(10,8,'Dari',0,0);
	$pdf->Cell(30,8,date("d M Y", strtotime($tgl_awal)),0,0);
	$pdf->Cell(20,8,'Sampai',0,0);
	$pdf->Cell(30,8,date("d M Y", strtotime($tgl_akhir)),0,1);

	$pdf->Cell(10,7,'',0,1);


	$pdf->SetFont('Arial','B',10);
	$pdf->Cell(18,6,'No',1,0);
	$pdf->Cell(30,6,'Tanggal',1,0);
	$pdf->Cell(70,6,'Keterangan',1,0);
	$pdf->Cell(40,6,'Mutasi',1,0);
	$pdf->Cell(30,6,'Kredit / Debit',1,1);


	$pdf->SetFont('Arial','',10);

	$sqlgetdatabetweendate = "select * from rekening_koran where tanggal between '".$tgl_awal."' and '".$tgl_akhir."'";
	$pemasukan = mysqli_query($koneksi, $sqlgetdatabetweendate);
	$nomor = 1;
	while ($row = mysqli_fetch_array($pemasukan)){
	    $pdf->Cell(18,6,$nomor,1,0);
	    $pdf->Cell(30,6,date("d M Y", strtotime($row['tanggal'])),1,0);
	    $pdf->Cell(70,6,$row['keterangan'],1,0);
	    $pdf->Cell(40,6,"Rp ".number_format($row['mutasi'],1,",","."),1,0);
	    $pdf->Cell(30,6,$row['kreditdebit'],1,1);

	    $nomor ++;
	}

	$getkasbank = mysqli_query($koneksi, "select kas_bank from kas");
	$rowkasbank = mysqli_fetch_array($getkasbank);

	$pdf->Cell(118,6,'Total Dana Kas Bank',1,0,'R');
	$pdf->Cell(70,6,'Rp '. number_format($rowkasbank["kas_bank"],1,",","."),1,1,'C');



	$pdf->Output("I","LAPORAN REKENING KORAN ISTANA BLOCK ".date("YmdHis").".pdf");
	ob_end_flush();
?>
