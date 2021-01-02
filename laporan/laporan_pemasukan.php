<?php
	// include 'koneksi.php';
	ob_start();
	$tgl_awal = $_POST["tgl_awal"];
	$tgl_akhir = $_POST["tgl_akhir"];

	// memanggil library FPDF
	include_once('fpdf/fpdf.php');
	class buatPdf extends FPDF{
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
			$this->Cell(297,7,'LAPORAN PEMASUKAN',0,1,'C');

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
			$this->Cell(18,6,'No',1,0);
			$this->Cell(30,6,'Tanggal',1,0);
			$this->Cell(27,6,'No Transaksi',1,0);
			$this->Cell(50,6,'Nama Pembeli',1,0);
			$this->Cell(60,6,'DP Masuk',1,0);
			$this->Cell(60,6,'Cash Masuk',1,1);

			$this->SetFont('Arial','',10);
		}
	}

	$pdf = new buatPdf('l','mm','A4');
	// membuat halaman baru
	$pdf->AddPage();

	$sqlgetdatabetweendate = "select * from pembayaran inner join order_pembeli on pembayaran.no_transaksi = order_pembeli.no_transaksi where pembayaran.tgl_bayar between '".$tgl_awal."' and '".$tgl_akhir."'";
	$pemasukan = mysqli_query($koneksi, $sqlgetdatabetweendate);
	$nomor = 1;
	while ($row = mysqli_fetch_array($pemasukan)){
	    $pdf->Cell(18,6,$nomor,1,0);
	    $pdf->Cell(30,6,date("d M Y", strtotime($row['tgl_bayar'])),1,0);
	    $pdf->Cell(27,6,$row['no_transaksi'],1,0);
	    $pdf->Cell(50,6,$row['nama_pembeli'],1,0);
	    $pdf->Cell(60,6,"Rp ". number_format($row['nominal_dp'],0,",","."),1,0);
	    $pdf->Cell(60,6,"Rp ". number_format($row['nominal_cash'],0,",","."),1,1);

	    $nomor ++;

	    if($nomor==30){$pdf->AddPage();}

	    $pemasukanDp[] = $row['nominal_dp'];
	    $pemasukanCash[] = $row['nominal_cash'];
	}

		$DpPemasukan = array_sum($pemasukanDp);
		$CashPemasukan = array_sum($pemasukanCash);

		$totalseluruhpemasukan = $DpPemasukan + $CashPemasukan;

	$pdf->Cell(185,6,"Total DP Masuk",1,0,"R");
	$pdf->Cell(60,6,"Rp ". number_format($DpPemasukan,0,".","."),1,1);
	$pdf->Cell(185,6,"Total Cash Masuk",1,0,"R");
	$pdf->Cell(60,6,"Rp ". number_format($CashPemasukan,0,".","."),1,1);
	$pdf->Cell(185,6,"Total Seluruh",1,0,"R");
	$pdf->Cell(60,6,"Rp ". number_format($totalseluruhpemasukan,0,".","."),1,1);

	$pdf->Output("I","LAPORAN PEMASUKAN KEUANGAN ISTANA BLOCK ".date("YmdHis").".pdf");
	ob_end_flush();
?>
