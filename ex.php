<?php
require('fpdf/fpdf.php');
$pdf = new FPDF();
$pdf = new FPDF('l','mm','A4');
$pdf->AddPage();
// Logo
           $pdf->Image('img/logopdistana.png',10,15,40);
            // Arial bold 15
            $pdf->SetFont('Arial','B',9);
           

            // Move to the right
            $pdf->Cell(40);
            // Title
            $pdf->Cell(130,7,'PD.ISTANA BLOCK PURWAKARTA',0,0,'C');
            $pdf->Cell(100,7,'SURAT JALAN',1,1,'C');

            // Move to the right
            $pdf->Cell(40);

            $pdf->Cell(130,7,'Paving Block,Grass Block, Genteng Beton',0,0,'C');
            $pdf->Cell(30,7,'TGL-BLN-THN',1,0,'C');
            $pdf->Cell(70,7,'17 agustus 45',1,1,'C');

            // Move to the right
            $pdf->Cell(40);

            $pdf->Cell(130,7,'Batako,U-Ditch Buis Beton Kastin DLL',0,0,'C');
            $pdf->Cell(30,7,'KEPADA',1,0,'C');
            $pdf->Cell(70,7,'budi',1,1,'C');

            // Move to the right
            $pdf->Cell(40);

            $pdf->Cell(130,7,'Office : Jln.Terusan Kapten Halim No.148',0,0,'C');
            $pdf->Cell(30,7,'ALAMAT',1,0,'C');
            $pdf->Cell(70,7,'bandung',1,1,'C');

            // Move to the right
            $pdf->Cell(40,7,'ISTANA BLOCK',0,0,'C');

            $pdf->Cell(130,7,'Sawah Kulon Pasawahan Kab.Purwakarta Jawa Barat 41172',0,0,'C');
            $pdf->Cell(30,7,'',0,0,'C');
            $pdf->Cell(70,7,'',0,1,'C');

            // Move to the right
            $pdf->Cell(40);

            $pdf->Cell(130,7,'Phone : (0264) 200 476 - 081 294 411 105 - 081 909 450 025',0,0,'C');
            $pdf->Cell(30,7,'NO PHONE',1,0,'C');
            $pdf->Cell(70,7,'0845645',1,1,'C');

            // Line break
            $pdf->Ln(10);

            // KONTEN
            $pdf->Cell(130,7,'NAMA BARANG',1,0,'C');

            $pdf->Cell(40,7,'SATUAN',1,0,'C');

            $pdf->Cell(100,7,'QUANTITY',1,1,'C');

            // $pdf = new suratJalan('l','mm','A4');

            // $pdf->AddPage();
           
           
            

/*$myarray = array(1,2,3);

$pdf->SetFont('Arial','B',16);  
foreach($myarray as $value){
    $pdf->AddPage();
    $pdf->Cell(40,10,$value);

}*/	
			$mobil = array("a", "b","c","a", "b","c","a", "b","c","a", "b","c","a", "b","c","a", "b","c","a", "b","c","a", "b","c","a", "b","c","a", "b","c","a", "b","c","a", "b","c","a", "b","c","a", "b","c","a", "b","c","a", "b","c","a", "b","c","a", "b","c","a", "b","c","a", "b","c","a", "b","c","a", "b","c","a", "b","c","a", "b","c","a", "b","c","a", "b","c","a", "b","c","a", "b","c");
			$jmldata = count($mobil);
 			$i=0;
 			$batasminimal = 9;
 			$batas = 25;
 			$kakalian = 0;
 			if($jmldata>$batasminimal){

 				$kakalian = $jmldata / $batas;
 				if(round($kakalian)==0){
 					$kakalian=1;
 				}
 				$loop= ($batas *round($kakalian))+8;
 			}else{
 				$loop = $batasminimal;
 			}
            while ($i<$loop) {
            	if(empty($mobil[$i])){
            		$pdf->Cell(130,7,' ',1,0,'C');
            	}else{
            		$pdf->Cell(130,7,$mobil[$i],1,0,'C');
            	}
                
                $pdf->Cell(40,7,$i." ".round($kakalian),0,0,'C');
                $pdf->Cell(100,7,$jmldata." ".$loop,0,1,'C');
               
               if($jmldata<$batasminimal){
               		if($i==9){
               		    $pdf->AddPage();
               		    if(empty($mobil[$i])){
               		    	$pdf->Cell(130,7,' haha',1,0,'C');
               		    }else{
               		    	$pdf->Cell(130,7,$mobil[$i],1,0,'C');
               		    }
               	   }
               }
                $i++;
            }
            


            $pdf->SetY(-70);
           // Line break
            $pdf->Ln(2);

            // MENGETAHUI

            $pdf->Cell(50,7,'PENERIMA',0,0,'C');
            $pdf->Cell(70,7,'PENGIRIM/SUPIR',0,0,'C');
            $pdf->Cell(50,7,'PENANGGUNG JAWAB',0,0,'C');
            $pdf->Cell(70,7,'HORMAT KAMI',0,1,'C');
            

            // KOLOM MENGETAHUI
            $pdf->Cell(50,7,'',0,0,'C');
            $pdf->Cell(50,7,'',0,0,'C');
            $pdf->Cell(50,7,'',0,0,'C');
            $pdf->Cell(50,7,'',0,1,'C');

            $pdf->Cell(50,7,'',0,0,'C');
            $pdf->Cell(50,7,'',0,0,'C');
            $pdf->Cell(50,7,'',0,0,'C');
            $pdf->Cell(50,7,'',0,1,'C');

            $pdf->Cell(50,7,'',0,0,'C');
            $pdf->Cell(50,7,'',0,0,'C');
            $pdf->Cell(50,7,'',0,0,'C');
            $pdf->Cell(50,7,'',0,1,'C');

            // Line break
            $pdf->Ln(10);

            // NAMA YANG MENGETAHUI
            $pdf->Cell(50,7,'ujang',0,0,'C');
            $pdf->Cell(70,7,'feri',0,0,'C');
            $pdf->Cell(50,7,'seila',0,0,'C');
            $pdf->Cell(70,7,'joko',0,1,'C');

$pdf->Output();
?>
