<?php
	ob_start();

	// memanggil library FPDF
	include_once('fpdf/fpdf.php');

	class buatPdf extends FPDF{
		function Header(){
			$tgl_awal = $_POST["tgl_awal"];
			$tgl_akhir = $_POST["tgl_akhir"];
			
			// setting jenis font yang akan digunakan
			$this->SetFont('Arial','B',18);
			// mencetak string 
			$this->Cell(358,7,'ISTANA BLOCK PURWAKARTA',0,1,'C');
			$this->SetFont('Arial','B',12);
			$this->Cell(358,7,'LAPORAN STOCK BARANG',0,1,'C');

			// Memberikan space kebawah agar tidak terlalu rapat
			$this->Cell(10,7,'',0,1);

			// tanggal laporan
			$this->Cell(50,8,'Tanggal Laporan',0,0);
			$this->Cell(50,8,date("d M Y"),0,0);
			$this->Cell(50,8,'Tanggal Laporan',0,0);
			$this->Cell(50,8,date("d M Y", strtotime($tgl_awal)),0,0);
			$this->Cell(50,8,'Tanggal Laporan',0,0);
			$this->Cell(50,8,date("d M Y", strtotime($tgl_akhir)),0,1);

			$this->Cell(10,7,'',0,1);

			$this->SetFont('Arial','B',10);
			$this->Cell(12,8,'No',1,0);
			$this->Cell(30,8,'Kode Barang',1,0);
			$this->Cell(80,8,'Nama Barang',1,0);
			$this->Cell(30,8,'Total Seluruh',1,0);
			// $this->Cell(30,8,'Stock Masuk',1,0);
			$this->Cell(30,8,'Terjual',1,0);
			$this->Cell(30,8,'Stock Akhir',1,0);
			$this->Cell(30,8,'Kondisi',1,0);
			$this->Cell(30,8,'Harga',1,1);

			$this->SetFont('Arial','',10);
		}
	}





	// intance object dan memberikan pengaturan halaman PDF
	$pdf = new buatPdf('l','mm','legal');
	// membuat halaman baru
	$pdf->AddPage();
	
	$tgl_awal = $_POST["tgl_awal"];
	$tgl_akhir = $_POST["tgl_akhir"];

	$sqlbahanbaku = "select * from stock_barang";
	$getbahanbaku = mysqli_query($koneksi, $sqlbahanbaku);
	$nomor = 1;
	while ($row = mysqli_fetch_array($getbahanbaku)){
		$hitungterjual = mysqli_query($koneksi, "select sum(jml_terjual) as tterjual from stock_terjual where tgl_terjual between '".$tgl_awal."' and '".$tgl_akhir."' and kd_barang = '".$row["kode_barang"]."' order by id_terjual desc limit 1");
		$rowtterjual = mysqli_fetch_array($hitungterjual);
		$totalseluruh = $row["stock_awal"] + $row["stock_masuk"];

		if($row["stock_akhir"] <= 30){
			$kondisi = "Kurang";
		}else{
			$kondisi = "Cukup";
		}

	    $pdf->Cell(12,8,$nomor,1,0);
	    $pdf->Cell(30,8,$row['kode_barang'],1,0);
	    $pdf->Cell(80,8,$row['nama_barang'],1,0);
	    $pdf->Cell(30,8,$totalseluruh,1,0); 
	    // $pdf->Cell(30,8,$row['stock_masuk'],1,0);
	    $pdf->Cell(30,8,$rowtterjual['tterjual'],1,0); 
	    $pdf->Cell(30,8,$row['stock_akhir'],1,0); 
	    $pdf->Cell(30,8,$kondisi,1,0); 
	    $pdf->Cell(30,8,"Rp ".number_format($row['modal_stock'],0,",","."),1,1); 

	    $nomor ++;

	    if($nomor==30){$pdf->AddPage();}
	}

	$gettotalmodal = mysqli_query($koneksi, "select sum(modal_stock) as total from stock_barang");
	$rowtotalmodal = mysqli_fetch_array($gettotalmodal);

	$pdf->Cell(152,8,"Total Modal",1,0,"R");
	$pdf->Cell(120,8,"Rp ".number_format($rowtotalmodal["total"],1,",","."),1,1); 

	$pdf->Output("I","LAPORAN STOCK BARANG ISTANA BLOCK ".date("YmdHis").".pdf");
	ob_end_flush(); 

	
?>



