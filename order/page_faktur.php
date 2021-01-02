<?php
	ob_start();

	if (isset($_POST["faktur_tr"])) {
        $faktur_tr = $_POST["faktur_tr"];

        // query untuk menampilkan data pembeli jika diakses dari order pembeli
        $sqlgetdatapembeli = mysqli_query($koneksi, "select * from order_pembeli where no_transaksi = '".$faktur_tr."'");
        $datapembeli = mysqli_fetch_array($sqlgetdatapembeli);

        // query untuk menampilkan detail barang yg dibeli jika diakses dari order pembeli
        $sqlgetdetailbeli = mysqli_query($koneksi, "select * from detail_order_pembeli where no_transaksi = '".$faktur_tr."'");

        // ambil dp pembayaran jika jenisnya tempo
        $sqlgetdpbayar = "select nominal_dp from pembayaran where no_transaksi = '".$faktur_tr."'";
        $aksigetdpbayar = mysqli_query($koneksi, $sqlgetdpbayar);
        $rowdpbayar = mysqli_fetch_array($aksigetdpbayar);

        //ambli total tagihan
        $sqlgettotaltagihan = "select * from total_bayar_pembeli where no_transaksi = '".$faktur_tr."'";
        $aksigettotaltagihan = mysqli_query($koneksi, $sqlgettotaltagihan);
        $rowtotaltagihan = mysqli_fetch_array($aksigettotaltagihan);

        // hitung sisa tagihan
        if($rowtotaltagihan["sisa_total"] == 0){
            $sisatagihan = $rowtotaltagihan["total_bayar"] - $rowdpbayar["nominal_dp"];
        }else{
            $sisatagihan = $rowtotaltagihan["sisa_total"] - $rowdpbayar["nominal_dp"];
        }

        $ambilnofaktur = mysqli_query($koneksi, "select no_faktur from faktur where no_transaksi = '".$faktur_tr."'");
        $datanofaktur = mysqli_fetch_array($ambilnofaktur);

    }else{
        // query untuk menampilkan data pembeli jika diakses dari detail order setelah transaksi
        $sqlgetdatapembeli = mysqli_query($koneksi, "select * from order_pembeli where no_transaksi = '".$no_tr_bayar."'");
        $datapembeli = mysqli_fetch_array($sqlgetdatapembeli);

        // query untuk menampilkan detail barang yg dibeli  jika diakses dari detail order setelah transaksi
        $sqlgetdetailbeli = mysqli_query($koneksi, "select * from detail_order_pembeli where no_transaksi = '".$no_tr_bayar."'");
    }
	// memanggil library FPDF
    include_once('fpdf/fpdf.php');
    class CustomPdf extends FPDF {
        protected $FontSpacingPt;
        protected $FontSpacing;

        function SetFontSpacing($size)
        {
            if($this->FontSpacingPt==$size)
                return;
            $this->FontSpacingPt = $size;
            $this->FontSpacing = $size/$this->k;
            if ($this->page>0)
                $this->_out(sprintf('BT %.3f Tc ET', $size));
        }

        protected function _dounderline($x, $y, $txt)
        {
            // Underline text
            $up = $this->CurrentFont['up'];
            $ut = $this->CurrentFont['ut'];
            $w = $this->GetStringWidth($txt)+$this->ws*substr_count($txt,' ')+(strlen($txt)-1)*$this->FontSpacing;
            return sprintf('%.2F %.2F %.2F %.2F re f',$x*$this->k,($this->h-($y-$up/1000*$this->FontSize))*$this->k,$w*$this->k,-$ut/1000*$this->FontSizePt);
        }
    }


    // df = new FPDF();
$pdf = new CustomPdf('l','mm',array(350, 140));
$pdf->AddPage();
$pdf->SetAutoPageBreak(0);
// Logo
           $pdf->Image('img/logopdistana.png',10,10,30);
            // Arial bold 15
            $pdf->SetFont('Arial','B',7);


            // Move to the right
            $pdf->Cell(20);
            // Title
            $pdf->SetFontSpacing(2.5);
            $pdf->Cell(180,5,'ISTANA BLOCK PURWAKARTA',0,0,'C');
            $pdf->Cell(130,5,'FAKTUR PEMBELIAN',1,1,'C');

            // Move to the right
            $pdf->Cell(20);

            $pdf->Cell(180,5,'Paving Block,Grass Block, Genteng Beton                      ',0,0,'C');
            $pdf->Cell(60,5,'TGL-BLN-THN',1,0,'C');
            $pdf->Cell(70,5,date("d M Y", strtotime($datapembeli["tgl_beli"])),1,1,'C');

            // Move to the right
            $pdf->Cell(20);

            $pdf->Cell(180,5,'Batako,U-Ditch Buis Beton Kastin DLL                      ',0,0,'C');
            $pdf->Cell(60,5,'KEPADA',1,0,'C');
            $pdf->Cell(70,5,ucwords($datapembeli["nama_pembeli"]),1,1,'C');

            // Move to the right
            $pdf->Cell(20);

            $pdf->Cell(180,5,'Office : Jln.Terusan Kapten Halim No.148                            ',0,0,'C');
            $pdf->Cell(60,5,'ALAMAT',1,0,'C');
            $pdf->Cell(70,5,$datapembeli["alamat_pembeli"],1,1,'C');

            // Move to the right
            $pdf->Cell(15,5,'ISTANA BLOCK',0,0,'C');

            $pdf->Cell(185,5,'Sawah Kulon Pasawahan Kab.Purwakarta Jawa Barat 41152                         ',0,0,'C');
            $pdf->Cell(60,5,'NO PHONE',1,0,'C');
            $pdf->Cell(70,5,$datapembeli["nohp_pembeli"],1,1,'C');

            // Move to the right
            $pdf->Cell(15);

            $pdf->Cell(185,5,'Phone : 0812 8177 7660 - 0878 8177 7660                              ',0,0,'C');
            $pdf->Cell(60,5,'NO FAKTUR',1,0,'C');
            $pdf->Cell(70,5,$datanofaktur["no_faktur"],1,1,'C');

            // Line break
            $pdf->Ln(4);

            // KONTEN
            $pdf->Cell(110,5,'NAMA BARANG',1,0,'C');
            $pdf->Cell(40,5,'SATUAN',1,0,'C');
            $pdf->Cell(50,5,'QUANTITY',1,0,'C');
            $pdf->Cell(60,5,'HARGA SATUAN(Rp)',1,0,'C');
            $pdf->Cell(70,5,'JUMLAH (Rp)',1,1,'C');

            // $pdf = new suratJalan('l','mm','A4');

            // $pdf->AddPage();




/*$myarray = array(1,2,3);

$pdf->SetFont('Arial','B',16);
foreach($myarray as $value){
    $pdf->AddPage();
    $pdf->Cell(40,10,$value);

}*/
            while($datadetailpembeli = mysqli_fetch_array($sqlgetdetailbeli)){
                $pdf->Cell(110,7,$datadetailpembeli["nama_barang"]." ".$datadetailpembeli["warna_brg"],0,0,'C');
                $pdf->Cell(40,7,$datadetailpembeli["satuan_brg"],0,0,'C');
                $pdf->Cell(50,7,$datadetailpembeli["jumlah_beli"],0,0,'C');
                $pdf->Cell(60,7, "Rp ".number_format($datadetailpembeli["hrg_barang"],1,",","."),0,0,'C');
                $pdf->Cell(70,7, "Rp ".number_format($datadetailpembeli["total_hrg"],1,",","."),0,1,'C');

                $jumlahhrgdibeli[] = $datadetailpembeli["total_hrg"];
            }

            $totalseluruh = array_sum($jumlahhrgdibeli);

            $pdf->SetY(-50);
           // Line break
            $pdf->Ln(1);

            $pdf->Cell(200,5,'',0,0);
            $pdf->Cell(60,5,'JUMLAH',0,0);
            if($rowtotaltagihan["diskon"] != 0){
                $pdf->Cell(70,5,"Rp ".number_format($rowtotaltagihan["sisa_total"],0,",","."),1,1,'L');
            }else{
                $pdf->Cell(70,5,"Rp ".number_format($totalseluruh,1,",","."),0,1,'L');
            }

            $pdf->Cell(60,5,'',0,0);
            $pdf->Cell(100,5,'PERHATIAN                        ','L,T,R',0,'C');
            $pdf->Cell(40,5,'',0,0,'C');
            $pdf->Cell(60,5,'UANG MUKA',0,0);
            $pdf->Cell(70,5,"Rp ".number_format($rowdpbayar["nominal_dp"],1,",","."),0,1,'L');

            $pdf->SetFont('Arial','B',7);
            $pdf->Cell(60,5,'TANDA TERIMA',0,0,'C');
            $pdf->Cell(100,5,'barang yang sudah dibeli tidak                                       ','L,R',0,'C');
            $pdf->Cell(40,5,'HORMAT KAMI',0,0,'C');
            $pdf->Cell(60,5,'SISA',0,0);
            $pdf->Cell(70,5,"Rp ".number_format($sisatagihan,1,",","."),0,1,'L');

            $pdf->Cell(60,5,'',0,0);
            $pdf->Cell(100,5,'dapat dikembalikan atau ditukar                                       ','L,B,R',0,'C');
            $pdf->Cell(40,5,'',0,0);
            $pdf->Cell(60,5,'',0,0);
            $pdf->Cell(70,5,'',0,1);

						// Line break
            $pdf->Ln(3);

            $pdf->Cell(60,5,'',0,0);
            $pdf->Cell(100,5,'via transfer                          ','T,L,R',0,'C');
            $pdf->Cell(40,5,'',0,0,'C');
            $pdf->Cell(60,5,'',0,0,'C');
            $pdf->Cell(70,5,'',0,1);

            $pdf->Cell(60,5,'',0,0);
            $pdf->Cell(100,5,'muhamad abdulah                          ','L,R',0,'C');
            $pdf->Cell(40,5,'',0,0,'C');
            $pdf->Cell(30,5,'',0,0);
            $pdf->Cell(40,5,'',0,1);

            $pdf->Cell(60,5,'',0,0);
            $pdf->Cell(100,5,'2313303900 BCA                          ','L,B,R',0,'C');
            $pdf->Cell(40,5,'',0,0,'C');
            $pdf->Cell(30,5,'',0,0);
            $pdf->Cell(40,5,'',0,1);

            $pdf->Cell(60,5,ucwords($datapembeli["nama_pembeli"]),0,0,'C');
            $pdf->Cell(100,5,'',0,0);
            $pdf->Cell(40,5,'.............',0,0,'C');
            $pdf->Cell(30,5,'',0,0);
            $pdf->Cell(40,5,'',0,1);
// $pdf->Output();

    $pdf->Output("I", "faktur-pembelian-".date("Y-m-dHis").".pdf");

    ob_end_flush();
?>
