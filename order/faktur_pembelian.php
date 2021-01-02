<?php 
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
    $sqlgettotaltagihan = "select total_bayar from total_bayar_pembeli where no_transaksi = '".$faktur_tr."'";
    $aksigettotaltagihan = mysqli_query($koneksi, $sqlgettotaltagihan);
    $rowtotaltagihan = mysqli_fetch_array($aksigettotaltagihan);

    // hitung sisa tagihan
    $sisatagihan = $rowtotaltagihan["total_bayar"] - $rowdpbayar["nominal_dp"];

  }else{
    // query untuk menampilkan data pembeli jika diakses dari detail order setelah transaksi
    $sqlgetdatapembeli = mysqli_query($koneksi, "select * from order_pembeli where no_transaksi = '".$no_tr_bayar."'");
    $datapembeli = mysqli_fetch_array($sqlgetdatapembeli);

    // query untuk menampilkan detail barang yg dibeli  jika diakses dari detail order setelah transaksi
    $sqlgetdetailbeli = mysqli_query($koneksi, "select * from detail_order_pembeli where no_transaksi = '".$no_tr_bayar."'");
  }
?>

<div class="table-responsive">

<table width="100%" border="0" cellpadding="0" cellspacing="0" style='width:100%;border-collapse:collapse;table-layout:fixed;'>
   
   <tr height="39" style='height:29.25pt;'>
    <td class="xl82" height="150" width="150" colspan="2" rowspan="5" style='height:122.25pt;width:158.25pt;border-right:none;,.border-bottom:none;'>
      <img src="img/logopdistana.png" width="150" height="100">
    </td>
    <td class="xl83" width="648" colspan="6" style='border-right:none;border-bottom:none; text-align: center;' x:str><span style='mso-spacerun:yes;'>&nbsp;&nbsp;&nbsp;&nbsp;</span>PD.ISTANA BLOCK PURWAKARTA</td>
    <td class="xl116" width="502" colspan="3" style='border-right:1.0pt solid windowtext;border-bottom:none; text-align: center;' x:str>FAKTUR</td>
   </tr>
   <tr height="31" style='height:23.25pt;'>
    <td class="xl84" colspan="6" style='border-right:none;border-bottom:none;text-align: center;' x:str>Paving Block,Grass Block, Genteng Beton</td>
    <td class="xl119" x:str>TGL-BLN-THN</td>
    <td class="xl120" colspan="2" style='border-right:1.0pt solid windowtext;border-bottom:none;' x:num="43463">
      <?php echo date("d-M-Y", strtotime($datapembeli["tgl_beli"])); ?></td>
   </tr>
   <tr height="31" style='height:23.25pt;'>
    <td class="xl84" colspan="6" style='border-right:none;border-bottom:none;text-align: center;' x:str>Batako,U-Ditch Buis Beton Kastin DLL</td>
    <td class="xl119" x:str>KEPADA</td>
    <td class="xl122" colspan="2" style='border-right:1.0pt solid windowtext;border-bottom:none;' x:str>
      <?php echo $datapembeli["nama_pembeli"]; ?>
    </td>
   </tr>
   <tr height="31" style='height:23.25pt;'>
    <td class="xl84" colspan="6" style='border-right:none;border-bottom:none;text-align: center;' x:str>Office : Jln.Terusan Kapten Halim No.148</td>
    <td class="xl124" style='border-right:none;border-bottom:none;' x:str>ALAMAT</td>
    <td class="xl122" colspan="2" style='border-right:1.0pt solid windowtext;border-bottom:none;' x:str>
      <?php echo $datapembeli["alamat_pembeli"]; ?>
    </td>
   </tr>
   <tr height="31" style='height:23.25pt;'>
    <td class="xl84" colspan="6" style='border-right:none;border-bottom:none;text-align: center;' x:str>Sawah Kulon Pasawahan Kab.Purwakarta Jawa Barat 41172</td>
    <td class="xl122" colspan="2" style='border-right:1.0pt solid windowtext;border-bottom:none;'></td>
   </tr>
   <tr height="32" style='height:24.00pt;'>
    <td class="xl85" height="32" colspan="2" style='height:24.00pt;border-right:none;border-bottom:none;' x:str>ISTANA BLOCK</td>
    <td class="xl84" colspan="6" style='border-right:none;border-bottom:none;text-align: center;' x:str>Phone : (0264) 200 476 - 081 294 411 105 - 081 909 450 025</td>
    <td class="xl119" x:str>NO PHONE</td>
    <td class="xl125" colspan="2" style='border-right:1.0pt solid windowtext;border-bottom:none;'><?php echo $datapembeli["nohp_pembeli"]; ?></td>
   </tr>
   <tr height="20" style='height:15.00pt;'>
    <td class="xl86" height="41" rowspan="2" style='height:30.75pt;border-right:none;border-bottom:1.0pt solid windowtext;' x:str>BANYAKNYA</td>
    <td class="xl67" rowspan="2" style='border-right:none;border-bottom:1.0pt solid windowtext;' x:str>SATUAN</td>
    <td class="xl67" colspan="6" rowspan="2" style='border-right:none;border-bottom:1.0pt solid windowtext;' x:str>NAMA BARANG</td>
    <td class="xl127" rowspan="2" style='border-right:none;border-bottom:1.0pt solid windowtext;' x:str>HARGA SATUAN (Rp)</td>
    <td class="xl67" colspan="2" rowspan="2" style='border-right:1.0pt solid windowtext;border-bottom:1.0pt solid windowtext;' x:str>JUMLAH (Rp)</td>
   </tr>
   <tr height="21" style='height:15.75pt;'/>
   <!-- detail data barang yg dibeli -->

   <?php
    while($datadetailpembeli = mysqli_fetch_array($sqlgetdetailbeli)){
      $jumlahhrgdibeli[] = $datadetailpembeli["total_hrg"];
  ?>
      <tr>
        <td><?php echo $datadetailpembeli["jumlah_beli"]; ?></td>
        <td><?php echo $datadetailpembeli["satuan_brg"]; ?></td>
        <td width="648"  colspan="6" ><?php echo $datadetailpembeli["nama_barang"]; ?></td>
        <td><?php echo $datadetailpembeli["hrg_barang"]; ?></td>
        <td><?php echo $datadetailpembeli["total_hrg"]; ?></td>
      </tr>

  <?php
    }

    $totalseluruh = array_sum($jumlahhrgdibeli);
   ?>
   
   <tr height="32" style='height:24.00pt;'>
    <td class="xl91" height="32" colspan="2" style='height:24.00pt;border-right:none;border-bottom:none;' x:str>CATATAN :</td>
    <td class="xl92" colspan="6" style='border-right:none;border-bottom:none;'></td>
    <td class="xl131" x:str>JUMLAH</td>
    <td class="xl132" colspan="2" style='border-right:1.0pt solid windowtext;border-bottom:1.0pt solid windowtext;' x:fmla="=SUM(J9+J10+J11+J12+J13+J14+J15+J16+J17+J18+J19+J20)" x:num="79590000"><span style='mso-spacerun:yes;'>&nbsp;</span>Rp<span style='mso-spacerun:yes;'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span>
        <?php echo $totalseluruh; ?>
      <span style='mso-spacerun:yes;'>&nbsp;</span></td>
   </tr>
   <tr height="32" style='height:24.00pt;'>
    <td class="xl93" height="32" colspan="2" style='height:24.00pt;border-right:none;border-bottom:none;'></td>
    <td></td>
    <td class="xl94" colspan="4" style='border-right:1.0pt solid windowtext;border-bottom:none;' x:str>PERHATIAN</td>
    <td class="xl93"></td>
    <td class="xl131" x:str>UANG MUKA</td>
    <td class="xl132" colspan="2" style='border-right:1.0pt solid windowtext;border-bottom:1.0pt solid windowtext;'><span style='mso-spacerun:yes;'>&nbsp;</span>Rp<span style='mso-spacerun:yes;'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span><?php echo $rowdpbayar["nominal_dp"]; ?></td>
   </tr>
   <tr height="32" style='height:24.00pt;'>
    <td class="xl93" height="32" colspan="2" style='height:24.00pt;border-right:none;border-bottom:none;' x:str>TANDA TERIMA,</td>
    <td class="xl95"></td>
    <td class="xl96" colspan="4" style='mso-ignore:colspan;border-right:1.0pt solid windowtext;border-bottom:none;' x:str>barang yang sudah di beli tidak</td>
    <td class="xl93" x:str>HORMAT KAMI,</td>
    <td class="xl134" x:str>SISA</td>
    <td class="xl135" colspan="2" style='border-right:1.0pt solid windowtext;border-bottom:1.0pt solid windowtext;' x:fmla="=SUM(J21-J22)" x:num="79590000"><span style='mso-spacerun:yes;'>&nbsp;</span>Rp<span style='mso-spacerun:yes;'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span><?php echo $sisatagihan; ?><span style='mso-spacerun:yes;'>&nbsp;</span></td>
   </tr>
   <tr height="26" style='height:19.50pt;'>
    <td height="26" colspan="2" style='height:19.50pt;mso-ignore:colspan;'></td>
    <td class="xl95"></td>
    <td class="xl97" colspan="4" style='mso-ignore:colspan;border-right:1.0pt solid windowtext;border-bottom:1.0pt solid windowtext;' x:str>dapat dikembalikan atau di tukar</td>
    <td></td>
    <td class="xl81"></td>
    <td colspan="2" style='mso-ignore:colspan;'></td>
   </tr>
   <tr height="21" style='height:15.75pt;'>
    <td height="21" colspan="3" style='height:15.75pt;mso-ignore:colspan;'></td>
    <td colspan="5" style='mso-ignore:colspan;'></td>
    <td class="xl81"></td>
    <td colspan="2" style='mso-ignore:colspan;'></td>
   </tr>
   <tr height="31" style='height:23.25pt;'>
    <td height="31" colspan="3" style='height:23.25pt;mso-ignore:colspan;'></td>
    <td class="xl98" colspan="4" style='border-right:1.0pt solid windowtext;border-bottom:none;' x:str>via transfer<span style='mso-spacerun:yes;'>&nbsp;</span></td>
    <td></td>
    <td class="xl81"></td>
    <td colspan="2" style='mso-ignore:colspan;'></td>
   </tr>
   <tr height="31" style='height:23.25pt;'>
    <td height="31" colspan="3" style='height:23.25pt;mso-ignore:colspan;'></td>
    <td class="xl99" colspan="4" style='border-right:1.0pt solid windowtext;border-bottom:none;' x:str>muhamad abdulah<span style='mso-spacerun:yes;'>&nbsp;</span></td>
    <td></td>
    <td class="xl81"></td>
    <td colspan="2" style='mso-ignore:colspan;'></td>
   </tr>
   <tr height="32" style='height:24.00pt;'>
    <td height="32" colspan="3" style='height:24.00pt;mso-ignore:colspan;'></td>
    <td class="xl100" colspan="4" style='border-right:1.0pt solid windowtext;border-bottom:1.0pt solid windowtext;' x:str>2313303900 BCA</td>
    <td></td>
    <td class="xl81"></td>
    <td colspan="2" style='mso-ignore:colspan;'></td>
   </tr>
   <tr height="20" style='height:15.00pt;'>
    <td height="20" colspan="8" style='height:15.00pt;mso-ignore:colspan;'></td>
    <td class="xl81"></td>
    <td colspan="2" style='mso-ignore:colspan;'></td>
   </tr>
   <tr height="20" style='height:15.00pt;'>
    <td height="20" colspan="8" style='height:15.00pt;mso-ignore:colspan;'></td>
    <td class="xl81"></td>
    <td colspan="2" style='mso-ignore:colspan;'></td>
   </tr>
   <tr height="20" style='height:15.00pt;'>
    <td height="20" colspan="8" style='height:15.00pt;mso-ignore:colspan;'></td>
    <td class="xl81"></td>
    <td colspan="2" style='mso-ignore:colspan;'></td>
   </tr>
   <tr height="19" style='height:14.25pt;mso-height-source:userset;mso-height-alt:285;'>
    <td height="19" colspan="8" style='height:14.25pt;mso-ignore:colspan;'></td>
    <td class="xl81"></td>
    <td colspan="2" style='mso-ignore:colspan;'></td>
   </tr>
   <tr height="28" style='height:21.00pt;'>
    <td class="xl101" height="28" colspan="2" style='height:21.00pt;border-right:none;border-bottom:none;' x:str>(<span style='mso-spacerun:yes;'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span>NAMA JELAS<span style='mso-spacerun:yes;'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span>)</td>
    <td class="xl102" colspan="5" style='mso-ignore:colspan;'></td>
     <td class="xl101" height="28" colspan="2" style='height:21.00pt;border-right:none;border-bottom:none;' x:str>(<span style='mso-spacerun:yes;'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span>NAMA JELAS<span style='mso-spacerun:yes;'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span>)</td>
    <td colspan="2" style='mso-ignore:colspan;'></td>
   </tr>
   <![if supportMisalignedColumns]>
    <tr width="0" style='display:none;'>
     <td width="126" style='width:95;'></td>
     <td width="85" style='width:64;'></td>
     <td width="93" style='width:70;'></td>
     <td width="303" style='width:227;'></td>
     <td width="213" style='width:160;'></td>
     <td width="226" style='width:170;'></td>
    </tr>
   <![endif]>
  </table>

  </div>