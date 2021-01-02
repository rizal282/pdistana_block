<?php
	// include 'koneksi.php';
	ob_start();
	$tgl_awal = $_POST["tgl_awal"];
	$tgl_akhir = $_POST["tgl_akhir"];

	// memanggil library FPDF
	include_once('fpdf/fpdf.php');

	// class buatPdf extends FPDF{
	// 	function Header(){
	// 		$tgl_awal = date("d M Y", strtotime($_POST["tgl_awal"]));
	// 		$tgl_akhir = date("d M Y", strtotime($_POST["tgl_akhir"]));
	// 		// intance object dan memberikan pengaturan halaman PDF
	// 		// $this = new FPDF('p','mm','A4');
	// 		// membuat halaman baru
	// 		// $this->AddPage();
	// 		// setting jenis font yang akan digunakan
	// 		$this->SetFont('Arial','B',16);
	// 		// mencetak string 
	// 		$this->Cell(297,7,'PD ISTANA BLOCK PURWAKARTA',0,1,'C');
	// 		$this->SetFont('Arial','B',12);
	// 		$this->Cell(297,7,'LAPORAN PENGELUARAN KEUANGAN',0,1,'C');

	// 		// Memberikan space kebawah agar tidak terlalu rapat
	// 		$this->Cell(10,7,'',0,1);

	// 		// tanggal laporan
	// 		$this->Cell(50,8,'Tanggal Laporan',0,0);
	// 		$this->Cell(50,8,date("d M Y"),0,0);
	// 		$this->Cell(50,8,'Dari',0,0);
	// 		$this->Cell(50,8,$tgl_awal,0,0);
	// 		$this->Cell(50,8,'Sampai',0,0);
	// 		$this->Cell(50,8,$tgl_akhir,0,1);

	// 		$this->Cell(10,7,'',0,1);

	// 		$this->SetFont('Arial','B',10);
	// 		$this->Cell(18,6,'No',1,0);
	// 		$this->Cell(30,6,'Tanggal',1,0);
	// 		$this->Cell(30,6,'No Transaksi',1,0);
	// 		$this->Cell(75,6,'Nama Pengeluaran',1,0);
	// 		$this->Cell(75,6,'Jenis Pengeluaran',1,0);
	// 		$this->Cell(50,6,'Nominal',1,1);

	// 		$this->SetFont('Arial','',10);
	// 	}
	// }

	// $pdf = new buatPdf('l');
	// // membuat halaman baru
	// $pdf->AddPage();

	class myPdf extends FPDF{

		function Header(){
			$tgl_awal = date("d M Y", strtotime($_POST["tgl_awal"]));
			$tgl_akhir = date("d M Y", strtotime($_POST["tgl_akhir"]));
			// intance object dan memberikan pengaturan halaman PDF
			// $this = new FPDF('p','mm','A4');
			// membuat halaman baru
			// $this->AddPage();
			// setting jenis font yang akan digunakan
			$this->SetFont('Arial','B',16);
			// mencetak string 
			$this->Cell(297,7,'ISTANA BLOCK PURWAKARTA',0,1,'C');
			$this->SetFont('Arial','B',12);
			$this->Cell(297,7,'LAPORAN PENGELUARAN KEUANGAN',0,1,'C');

			// Memberikan space kebawah agar tidak terlalu rapat
			$this->Cell(10,7,'',0,1);

			// tanggal laporan
			$this->Cell(50,8,'Tanggal Laporan',0,0);
			$this->Cell(50,8,date("d M Y"),0,0);
			$this->Cell(50,8,'Dari',0,0);
			$this->Cell(50,8,$tgl_awal,0,0);
			$this->Cell(50,8,'Sampai',0,0);
			$this->Cell(50,8,$tgl_akhir,0,1);

			$this->Cell(10,7,'',0,1);

			$this->SetFont('Arial','B',10);
			// $this->Cell(18,6,'No',1,0);
			// $this->Cell(30,6,'Tanggal',1,0);
			// $this->Cell(30,6,'No Transaksi',1,0);
			// $this->Cell(75,6,'Nama Pengeluaran',1,0);
			// $this->Cell(75,6,'Jenis Pengeluaran',1,0);
			// $this->Cell(50,6,'Nominal',1,1);
			$w = 45;
			$h = 10;
			$x = $this->GetX();
			$this->myCell($w,$h,$x,"No");
			$x = $this->GetX();
			$this->myCell($w,$h,$x,"Tanggal");
			$x = $this->GetX();
			$this->myCell($w,$h,$x,"No Transaksi");
			$x = $this->GetX();
			$this->myCell($w,$h,$x,"Nama Pengeluaran");
			$x = $this->GetX();
			$this->myCell($w,$h,$x,"Jenis Pengeluaran");
			$x = $this->GetX();
			$this->myCell($w,$h,$x,"Nominal");
			$this->ln();
		}
		function myCell($w,$h,$x,$t){
			$height = $h / 4;
			$first = $height + 1;
			$second = $height + $height + $height + 1;
			$third = $height + $height + $height + $height + $height;
			$len = strlen($t);

			if($len > 20){
				$txt = str_split($t, 16);
				$this->SetX($x);
				$this->Cell($w, $first, $txt[0],"","","");

				$this->SetX($x);
				$this->Cell($w, $second, $txt[1],"","","");

				$this->SetX($x);
				$this->Cell($w, $third, $txt[2],"","","");

				$this->SetX($x);
				$this->Cell($w, $h, "","LTRB",0,"L",0);
			}else{
				$this->SetX($x);
				$this->Cell($w,$h,$t,"LTRB",0,"L",0);
			}
		}
	}

	$pdf = new myPdf('l','mm','A4');
	$pdf->AddPage();
	$pdf->SetFont("Arial","",10);

	$w = 45;
	$h = 17;

	$sqlgetdatabetweendate = "select * from pengeluaran where tgl_pengeluaran between '".$tgl_awal."' and '".$tgl_akhir."'";
	$pemasukan = mysqli_query($koneksi, $sqlgetdatabetweendate);
	$nomor = 1;
	while ($row = mysqli_fetch_array($pemasukan)){
	    // $pdf->Cell(18,6,$nomor,1,0);
	    // $pdf->Cell(30,6,date("d M Y", strtotime($row['tgl_pengeluaran'])),1,0);
	    // $pdf->Cell(30,6,$row['no_transaksi'],1,0);
	    // $pdf->Cell(75,6,$row['nama_pengeluaran'],1,0); 
	    // $pdf->Cell(75,6,$row['jenis_pengeluaran'],1,0);
	    // $pdf->Cell(50,6,"Rp ". number_format($row["nominal"],0,",","."),1,1); 

	    $x = $pdf->GetX();
		$pdf->myCell($w,$h,$x,$nomor);
		$x = $pdf->GetX();
		$pdf->myCell($w,$h,$x,date("d M Y", strtotime($row['tgl_pengeluaran'])));
		$x = $pdf->GetX();
		$pdf->myCell($w,$h,$x,$row['no_transaksi']);
		$x = $pdf->GetX();
		$pdf->myCell($w,$h,$x,$row['nama_pengeluaran']);
		$x = $pdf->GetX();
		$pdf->myCell($w,$h,$x,$row['jenis_pengeluaran']);
		$x = $pdf->GetX();
		$pdf->myCell($w,$h,$x,"Rp ". number_format($row["nominal"],0,",","."));
		$pdf->ln();

	    $nomor ++;

	    if($nomor==30){$pdf->AddPage();}

	    $totalpengeluaran[] = $row["nominal"];
	}

	$pengeluaran = array_sum($totalpengeluaran);

	$pdf->Cell(180,6,'Total Pengeluaran',1,0,'R');
	$pdf->Cell(90,6, "Rp ".number_format($pengeluaran,0,",","."),1,1);

	$pdf->Output("I","LAPORAN PENGELUARAN KEUANGAN ISTANA BLOCK ".date("YmdHis").".pdf");
	ob_end_flush(); 



	// $pdf = new myPdf();
	// $pdf->AddPage();
	// $pdf->SetFont("Arial","",16);
	// $pdf->ln();

	// $w = 45;
	// $h = 16;

	// $x = $pdf->GetX();
	// $pdf->myCell($w,$h,$x,"1.1 Satu titik satu");
	// $x = $pdf->GetX();
	// $pdf->myCell($w,$h,$x,"1.2 Satu titik dua");
	// $x = $pdf->GetX();
	// $pdf->myCell($w,$h,$x,"1.3 Satu titik tiga");
	// $x = $pdf->GetX();
	// $pdf->myCell($w,$h,$x,"1.4 Satu titik empat");
	// $pdf->ln();

	// $x = $pdf->GetX();
	// $pdf->myCell($w,$h,$x,"2.1 Dua titik satu");
	// $x = $pdf->GetX();
	// $pdf->myCell($w,$h,$x,"2.2 Dua titik dua");
	// $x = $pdf->GetX();
	// $pdf->myCell($w,$h,$x,"2.3 Dua titik tiga");
	// $x = $pdf->GetX();
	// $pdf->myCell($w,$h,$x,"2.4 Dua titik empat");
	// $pdf->ln();

	// $pdf->Output();
?>



