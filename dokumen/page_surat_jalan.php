<?php
    // include_once "koneksi.php";

    ob_start();

    if(isset($_POST["suratjalan_tr"])){
        $suratjalan_tr = $_POST["suratjalan_tr"];

        // query untuk menampilkan data pembeli
        $sqlgetdatapembeli = mysqli_query($koneksi, "select * from order_pembeli where no_transaksi = '".$suratjalan_tr."'");
        $datapembeli = mysqli_fetch_array($sqlgetdatapembeli);

        // query untuk menampilkan detail barang yg dibeli
        $sqlgetdetailbeli = mysqli_query($koneksi, "select * from detail_order_pembeli where no_transaksi = '".$suratjalan_tr."'");

        // $sqlgetsuratjalan = mysqli_query($koneksi, "select * from surat_jalan inner join karyawan on surat_jalan.id_supir = karyawan.id_kry where surat_jalan.no_transaksi = '".$suratjalan_tr."'");
        $sqlgetsuratjalan = mysqli_query($koneksi, "select * from surat_jalan where no_transaksi = '".$suratjalan_tr."'");
        $rowsuratjalan = mysqli_fetch_array($sqlgetsuratjalan);
    }

    // memanggil library Fpdf
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

    $pdf = new CustomPdf('l','mm',array(350, 140));
    $pdf->SetAutoPageBreak(0);
    $pdf->AddPage();
// Logo
           $pdf->Image('img/logopdistana.png',10,10,30);
            // Arial bold 15
            $pdf->SetFont('Arial','B',7);
           

            // Move to the right
            $pdf->Cell(20);
            // Title
            $pdf->SetFontSpacing(2.6);
            $pdf->Cell(180,5,'ISTANA BLOCK PURWAKARTA      ',0,0,'C');
            $pdf->Cell(130,5,'SURAT JALAN',1,1,'C');

            // Move to the right
            $pdf->Cell(20);

            $pdf->Cell(180,5,'Paving Block,Grass Block, Genteng Beton                      ',0,0,'C');
            $pdf->Cell(50,5,'TGL-BLN-THN',1,0,'C');
            $pdf->Cell(80,5,date("d M Y", strtotime($datapembeli["tgl_beli"])),1,1,'C');

            // Move to the right
            $pdf->Cell(20);

            $pdf->Cell(180,5,'Batako,U-Ditch Buis Beton Kastin DLL                   ',0,0,'C');
            $pdf->Cell(50,5,'KEPADA',1,0,'C');
            $pdf->Cell(80,5,ucwords($datapembeli["nama_pembeli"]),1,1,'C');

            // Move to the right
            $pdf->Cell(20);

            $pdf->Cell(180,5,'Office : Jln.Terusan Kapten Halim No.148                         ',0,0,'C');
            $pdf->Cell(50,5,'ALAMAT',1,0,'C');
            $pdf->Cell(80,5,$datapembeli["alamat_pembeli"],1,1,'C');

            // Move to the right
            $pdf->Cell(15,5,'ISTANA BLOCK',0,0,'C');

            $pdf->Cell(185,5,'Sawah Kulon Pasawahan Kab.Purwakarta Jawa Barat 41172                            ',0,0,'C');
            $pdf->Cell(50,5,'NO PHONE',1,0,'C');
            $pdf->Cell(80,5,$datapembeli["nohp_pembeli"],1,1,'C');

            // Move to the right
            $pdf->Cell(10);

            $pdf->Cell(190,5,'Phone : 0812 8177 7660 - 0878 8177 7660                            ',0,0,'C');
            $pdf->Cell(50,5,'NO SURAT JALAN',1,0,'C');
            $pdf->Cell(80,5,$rowsuratjalan["no_surat_jalan"],1,1,'C');

            // Line break
            $pdf->Ln(2);

            $pdf->SetFont('Arial','B',7.5);
            $pdf->Cell(330,7,"Kami kirimkan barang-barang tersebut dibawah ini dengan kendaraan No. Pol ".$rowsuratjalan["no_kendaraan"],0,1);

            // KONTEN
            $pdf->SetFont('Arial','B',7.5);
            $pdf->Cell(150,5,'NAMA BARANG',1,0,'C');
            $pdf->Cell(50,5,'SATUAN',1,0,'C');
            $pdf->Cell(130,5,'QUANTITY',1,1,'C');

            // $pdf = new suratJalan('l','mm','A4');

            // $pdf->AddPage();

            while ($rowdetailbeli = mysqli_fetch_array($sqlgetdetailbeli)) {
                $pdf->Cell(150,7,$rowdetailbeli["nama_barang"]." ".$rowdetailbeli["warna_brg"],0,0,'C');
                $pdf->Cell(50,7,$rowdetailbeli["satuan_brg"],0,0,'C');
                $pdf->Cell(130,7,$rowdetailbeli["jumlah_beli"],0,1,'C');
                
            }

            //atur posisi 1.5 cm dari bawah
            $pdf->SetY(-45);
           // Line break
            // $pdf->Ln(2);
            $pdf->SetFont('Arial','I',7.5);
            $pdf->Cell(330,7,"Barang Sudah Diterima Dalam Keadaan Baik Dan Cukup (Tanda Tangan dan Stempel Perusahaan)",0,1);

            $pdf->SetFont('Arial','B',7.5);
            $pdf->Cell(82,5,'CATATAN',0,0,'C');
            $pdf->Cell(248,5,$rowsuratjalan["catatan"],0,1,'L');
            // MENGETAHUI
            $pdf->Cell(82,5,'PENERIMA',0,0,'C');
            $pdf->Cell(82,5,'PENGIRIM/SUPIR',0,0,'C');
            $pdf->Cell(82,5,'PENANGGUNG JAWAB',0,0,'C');
            $pdf->Cell(82,5,'HORMAT KAMI',0,1,'C');
            

            // KOLOM MENGETAHUI
            // $pdf->Cell(50,5,'',1,0,'C');
            // $pdf->Cell(50,5,'',1,0,'C');
            // $pdf->Cell(50,5,'',1,0,'C');
            // $pdf->Cell(50,5,'',1,1,'C');


            $pdf->Cell(82,5,'',0,0,'C');
            $pdf->Cell(82,5,'',0,0,'C');
            $pdf->Cell(82,5,'',0,0,'C');
            $pdf->Cell(82,5,'',0,1,'C');

            $pdf->Cell(82,5,'',0,0,'C');
            $pdf->Cell(82,5,'',0,0,'C');
            $pdf->Cell(82,5,'',0,0,'C');
            $pdf->Cell(82,5,'',0,1,'C');

            // Line break
            $pdf->Ln(10);

            // NAMA YANG MENGETAHUI
            $pdf->Cell(82,5,ucwords($datapembeli["nama_pembeli"]),0,0,'C');
            $pdf->Cell(82,5,ucwords($rowsuratjalan["id_supir"]),0,0,'C');
            $pdf->Cell(82,5,ucwords($rowsuratjalan["png_jawab"]),0,0,'C');
            $pdf->Cell(82,5,ucwords($rowsuratjalan["pembuat_surat_jln"]),0,1,'C');
    

    // $pdf = new PDF('l','mm','A4');

    // $pdf->AddPage();

    $pdf->Output("I", "surat-jalan-".date("Y-m-dHis").".pdf");

    ob_end_flush(); 
?>