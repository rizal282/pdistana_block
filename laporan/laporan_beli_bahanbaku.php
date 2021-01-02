<?php
  ob_start();

  $tgl_awal = $_POST["tgl_awal"];
  $tgl_akhir = $_POST["tgl_akhir"];

  include_once('fpdf/fpdf.php');

  class LaporanTempo extends FPDF {
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
			$this->Cell(297,7,'LAPORAN BELI BAHAN BAKU',0,1,'C');

			// Memberikan space kebawah agar tidak terlalu rapat
			$this->Cell(10,7,'',0,1);

			// tanggal laporan
			$this->Cell(50,8,'Tanggal Laporan',0,0);
			$this->Cell(50,8,date("d M Y"),0,0);
			$this->Cell(50,8,'Dari',0,0);
			$this->Cell(30,8,$tgl_awal,0,0);
			$this->Cell(50,8,'Sampai',0,0);
			$this->Cell(30,8,$tgl_akhir,0,1);

			$this->Cell(10,7,'',0,1);

			$this->SetFont('Arial','B',10);

			$this->Cell(20,6,'No',1,0);
			$this->Cell(50,6,'Tgl Beli',1,0);
			$this->Cell(50,6,'Nama Supplier',1,0);
			$this->Cell(50,6,'No Transaksi',1,0);
			$this->Cell(60,6,'Total Harga',1,1);

			$this->SetFont('Arial','',10);
		}
  }

  $pdf = new LaporanTempo('l','mm','A4');

  $pdf->AddPage();

	$sqlgetdatabetweendate = "select * from order_bahanbaku inner join total_bayar_bahanbaku on order_bahanbaku.no_trbahanbaku = total_bayar_bahanbaku.no_trbahanbaku where order_bahanbaku.tgl_pembelian between '".$tgl_awal."' and '".$tgl_akhir."'";
	$pemasukan = mysqli_query($koneksi, $sqlgetdatabetweendate);
	$nomor = 1;
	while ($row = mysqli_fetch_array($pemasukan)){
	    $pdf->Cell(20,6,$nomor,1,0);
	    $pdf->Cell(50,6,date("d M Y", strtotime($row["tgl_pembelian"])),1,0);
	    $pdf->Cell(50,6,$row['nama_supplier'],1,0);
	    $pdf->Cell(50,6,$row["no_trbahanbaku"],1,0);
	    $pdf->Cell(60,6,"Rp ". number_format($row["nominal"],1,",","."),1,1);

	    $nomor ++;

	    if($nomor==30){$pdf->AddPage();}
	}

  $pdf->Output("I","LAPORAN PEMBELIAN BAHAN BAKU ".date("YmdHis").".pdf");
  ob_end_flush();
?>
