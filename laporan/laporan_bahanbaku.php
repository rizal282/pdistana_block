<?php
	ob_start();

	// memanggil library FPDF
	include_once('fpdf/fpdf.php');

	class buatPdf extends FPDF{
		function Header(){
			$this->SetFont('Arial','B',16);
			// mencetak string 
			$this->Cell(356,7,'ISTANA BLOCK PURWAKARTA',0,1,'C');
			$this->SetFont('Arial','B',12);
			$this->Cell(356,7,'LAPORAN STOCK BAHAN BAKU',0,1,'C');

			// Memberikan space kebawah agar tidak terlalu rapat
			$this->Cell(10,7,'',0,1);

			// tanggal laporan
			$this->Cell(50,6,'Tanggal Laporan',0,0);
			$this->Cell(50,8,date("d M Y"),0,1);

			$this->Cell(10,7,'',0,1);

			$this->SetFont('Arial','B',10);
			$this->Cell(18,8,'No',1,0);
			$this->Cell(30,8,'Tanggal',1,0);
			$this->Cell(50,8,'Nama Bahan Baku',1,0);
			$this->Cell(30,8,'Jumlah',1,0);
			$this->Cell(30,8,'Satuan',1,0);
			$this->Cell(30,8,'Harga',1,0);
			$this->Cell(30,8,'Bongkar',1,0);
			$this->Cell(50,8,'Total Harga',1,0);
			$this->Cell(60,8,'Keterangan',1,1);

			$this->SetFont('Arial','',10);
		}
	}
	// intance object dan memberikan pengaturan halaman PDF
	$pdf = new buatPdf('l','mm','legal');
	// membuat halaman baru
	$pdf->AddPage();
	// setting jenis font yang akan digunakan
	

	$sqlbahanbaku = "select * from bahan_baku";
	$getbahanbaku = mysqli_query($koneksi, $sqlbahanbaku);
	$nomor = 1;
	while ($row = mysqli_fetch_array($getbahanbaku)){
	    $pdf->Cell(18,8,$nomor,1,0);
	    $pdf->Cell(30,8,date("d M Y", strtotime($row['tanggal'])),1,0);
	    $pdf->Cell(50,8,$row['nama_bahanbaku'],1,0);
	    $pdf->Cell(30,8,$row['jumlah_barang'],1,0); 
	    $pdf->Cell(30,8,$row['satuan'],1,0);
	    $pdf->Cell(30,8,"Rp ".number_format($row['harga_barang'],1,",","."),1,0); 
	    $pdf->Cell(30,8,$row['bongkar'],1,0); 
	    $pdf->Cell(50,8,"Rp ".number_format($row['total_harga'],1,",","."),1,0); 
	    $pdf->Cell(60,8,$row['keterangan'],1,1); 

	    $nomor ++;

	    if($nomor==20){$pdf->AddPage();}
	}

	$pdf->Output("I","LAPORAN BAHAN BAKU PD ISTANA BLOCK ".date("YmdHis").".pdf");
	ob_end_flush(); 
?>



