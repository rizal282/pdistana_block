<?php
  if(isset($_POST["suratjalan_tr"])){
    $suratjalan_tr = $_POST["suratjalan_tr"];

    // query untuk menampilkan data pembeli
    $sqlgetdatapembeli = mysqli_query($koneksi, "select * from order_pembeli where no_transaksi = '".$suratjalan_tr."'");
    $datapembeli = mysqli_fetch_array($sqlgetdatapembeli);

    // query untuk menampilkan detail barang yg dibeli
    $sqlgetdetailbeli = mysqli_query($koneksi, "select * from detail_order_pembeli where no_transaksi = '".$suratjalan_tr."'");

    $sqlgetsuratjalan = mysqli_query($koneksi, "select * from surat_jalan where no_transaksi = '".$suratjalan_tr."'");
    $rowsuratjalan = mysqli_fetch_array($sqlgetsuratjalan);
  }
?>
<div class="table-responsive">
  <table width="100%" border="1" cellpadding="0" cellspacing="0" style='width:1818.00pt;border-collapse:collapse;table-layout:fixed;'>
   <col width="64" style='width:48.00pt;'/>
   <col width="146" style='mso-width-source:userset;mso-width-alt:5339;'/>
   <col width="64" span="2" style='width:48.00pt;'/>
   <col width="108" style='mso-width-source:userset;mso-width-alt:3949;'/>
   <col width="309" style='mso-width-source:userset;mso-width-alt:11300;'/>
   <col width="274" style='mso-width-source:userset;mso-width-alt:10020;'/>
   <col width="231" style='mso-width-source:userset;mso-width-alt:8447;'/>
   <col width="211" style='mso-width-source:userset;mso-width-alt:7716;'/>
   <col width="64" style='width:48.00pt;'/>
   <col width="98" style='mso-width-source:userset;mso-width-alt:3583;'/>
   <col width="279" style='mso-width-source:userset;mso-width-alt:10203;'/>
   <col width="64" span="8" style='width:48.00pt;'/>
   <tr height="44" style='height:33.00pt;'>
    <td class="xl137" height="220" width="210" colspan="2" rowspan="5" style='height:165.00pt;width:157.50pt;border-right:none;border-bottom:none;text-align: center;' x:str>
      <img src="img/logopdistana.png" width="150" height="110"><br>
    ISTANA BLOCK
    </td>
    <td class="xl139" width="1050" colspan="6" style='width:787.50pt;border-right:none;border-bottom:none;text-align: center;' x:str><span style='mso-spacerun:yes;'>&nbsp;&nbsp;&nbsp;</span>PD.ISTANA BLOCK PURWAKARTA</td>
    <td class="xl160" width="652" colspan="4" style='width:489.00pt;border-right:1.0pt solid windowtext;border-bottom:none;' x:str>SURAT JALAN</td>
    <td width="64" style='width:48.00pt;'></td>
    <td width="64" style='width:48.00pt;'></td>
    <td width="64" style='width:48.00pt;'></td>
    <td width="64" style='width:48.00pt;'></td>
    <td width="64" style='width:48.00pt;'></td>
    <td width="64" style='width:48.00pt;'></td>
    <td width="64" style='width:48.00pt;'></td>
    <td width="64" style='width:48.00pt;'></td>
   </tr>
   <tr height="44" style='height:33.00pt;'>
    <td class="xl139" colspan="6" style='border-right:none;border-bottom:none;text-align: center;' x:str>Paving Block,Grass Block, Genteng Beton</td>
    <td class="xl163" x:str>TGL-BLN-THN</td>
    <td class="xl164" colspan="3" style='border-right:1.0pt solid windowtext;border-bottom:none;' x:num="43477">
      <?php echo date("d M Y", strtotime($datapembeli["tgl_beli"])); ?>    
    </td>
    <td colspan="8" style='mso-ignore:colspan;'></td>
   </tr>
   <tr height="44" style='height:33.00pt;'>
    <td class="xl139" colspan="6" style='border-right:none;border-bottom:none;text-align: center;' x:str>Batako,U-Ditch Buis Beton Kastin DLL</td>
    <td class="xl163" x:str>KEPADA</td>
    <td class="xl166" colspan="3" style='border-right:1.0pt solid windowtext;border-bottom:none;' x:str>
      <?php echo $datapembeli["nama_pembeli"] ?>
    </td>
    <td colspan="8" style='mso-ignore:colspan;'></td>
   </tr>
   <tr height="44" style='height:33.00pt;'>
    <td class="xl139" colspan="6" style='border-right:none;border-bottom:none;text-align: center;' x:str>Office : Jln.Terusan Kapten Halim No.148</td>
    <td class="xl163" x:str>ALAMAT</td>
    <td class="xl166" colspan="3" style='border-right:1.0pt solid windowtext;border-bottom:none;' x:str>
      <?php echo $datapembeli["alamat_pembeli"]; ?>
    </td>
    <td colspan="8" style='mso-ignore:colspan;'></td>
   </tr>
   <tr height="44" style='height:33.00pt;'>
    <td class="xl139" colspan="6" style='border-right:none;border-bottom:none;text-align: center;' x:str>Sawah Kulon Pasawahan Kab.Purwakarta Jawa Barat 41172</td>
    <td class="xl163"></td>
    <td class="xl166" colspan="3" style='border-right:1.0pt solid windowtext;border-bottom:none;'></td>
    <td colspan="8" style='mso-ignore:colspan;'></td>
   </tr>
   <tr height="45" style='height:33.75pt;'>
    <td class="xl139" height="45" colspan="8" style='height:33.75pt;border-right:none;border-bottom:none;text-align: center;' x:str><span style='mso-spacerun:yes;'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>Phone : (0264) 200 476 - 081 294 411 105 - 081 909 450 025</td>
    <td class="xl163" x:str>NO HP</td>
    <td class="xl168" x:str>
      <?php echo $datapembeli["nohp_pembeli"]; ?>
    </td>
    <td class="xl169" colspan="3" style='border-right:1.0pt solid windowtext;border-bottom:1.0pt solid windowtext;'></td>
    <td colspan="8" style='mso-ignore:colspan;'></td>
   </tr>
   <tr height="31" style='height:23.25pt;'>
    <td class="xl140" height="31" colspan="3" style='height:23.25pt;mso-ignore:colspan;' x:str>SURAT JALAN : <?php echo $rowsuratjalan["no_surat_jalan"]; ?> </td>
    <td class="xl138" colspan="9" style='border-right:none;border-bottom:none;'></td>
    <td colspan="8" style='mso-ignore:colspan;'></td>
   </tr>
   <tr height="45" style='height:33.75pt;'>
    <td class="xl141" height="45" colspan="7" style='height:33.75pt;mso-ignore:colspan;' x:str>Kami kirimkan barang-barang tersebut dibawah ini dengan kendaraan no Pol: ..<span style='display:none;'>....................</span></td>
    <td class="xl156" colspan="5" style='border-right:none;border-bottom:none;text-align: center;' x:str> <?php echo $rowsuratjalan["no_kendaraan"]; ?> </td>
    <td colspan="4" style='mso-ignore:colspan;'></td>
    <td class="xl174"></td>
    <td colspan="3" style='mso-ignore:colspan;'></td>
   </tr>
   <tr height="36" style='height:27.00pt;'>
    <td class="xl142" height="36" colspan="2" style='height:27.00pt;border-right:none;border-bottom:1.0pt solid windowtext;' x:str>BANYAKNYA</td>
    <td class="xl143" colspan="10" style='border-right:1.0pt solid windowtext;border-bottom:1.0pt solid windowtext;' x:str>NAMA BARANG<span style='mso-spacerun:yes;'>&nbsp;</span></td>
    <td colspan="8" style='mso-ignore:colspan;'></td>
   </tr>
   <tr height="42" style='height:31.50pt;'>
    <td class="xl144" height="42" colspan="2" style='height:31.50pt;border-right:none;border-bottom:none;'></td>
    <td class="xl145" colspan="10" style='border-right:none;border-bottom:none;'></td>
    <td colspan="8" style='mso-ignore:colspan;'></td>
   </tr>

   <?php
    while ($rowdetailbeli = mysqli_fetch_array($sqlgetdetailbeli)) {
   ?>
      <tr height="42" style='height:31.50pt;'>
        <td class="xl146" height="42" colspan="2" style='height:31.50pt;border-right:none;border-bottom:none;' x:str>
          <?php echo $rowdetailbeli["jumlah_beli"]; ?>
          <span style='mso-spacerun:yes;'>&nbsp; </span><?php echo $rowdetailbeli["satuan_brg"]; ?></td>
        <td class="xl145" colspan="10" style='border-right:none;border-bottom:none;' x:str><?php echo $rowdetailbeli["nama_barang"]; ?></td>
        <td colspan="8" style='mso-ignore:colspan;'></td>
     </tr>
   <?php
    }

   ?>

   <tr height="44" style='height:33.00pt;'>
    <td class="xl146" height="44" colspan="2" style='height:33.00pt;border-right:none;border-bottom:none;'></td>
    <td class="xl147" colspan="10" style='border-right:none;border-bottom:none;'></td>
    <td colspan="7" style='mso-ignore:colspan;'></td>
    <td class="xl174"></td>
   </tr>
   <tr height="44" style='height:33.00pt;'>
    <td class="xl148" height="44" colspan="2" style='height:33.00pt;border-right:none;border-bottom:none;'></td>
    <td class="xl147" colspan="10" style='border-right:none;border-bottom:none;'></td>
    <td colspan="8" style='mso-ignore:colspan;'></td>
   </tr>
   <tr height="44" style='height:33.00pt;'>
    <td class="xl148" height="44" colspan="2" style='height:33.00pt;border-right:none;border-bottom:none;'></td>
    <td class="xl147" colspan="10" style='border-right:none;border-bottom:none;'></td>
    <td colspan="8" style='mso-ignore:colspan;'></td>
   </tr>
   <tr height="44" style='height:33.00pt;'>
    <td class="xl148" height="44" colspan="2" style='height:33.00pt;border-right:none;border-bottom:none;'></td>
    <td class="xl147" colspan="10" style='border-right:none;border-bottom:none;'></td>
    <td colspan="8" style='mso-ignore:colspan;'></td>
   </tr>
   <tr height="44" style='height:33.00pt;'>
    <td class="xl148" height="44" colspan="2" style='height:33.00pt;border-right:none;border-bottom:none;'></td>
    <td class="xl147" colspan="10" style='border-right:none;border-bottom:none;'></td>
    <td colspan="8" style='mso-ignore:colspan;'></td>
   </tr>
   <tr height="44" style='height:33.00pt;'>
    <td class="xl148" height="44" colspan="2" style='height:33.00pt;border-right:none;border-bottom:none;'></td>
    <td class="xl147" colspan="10" style='border-right:none;border-bottom:none;'></td>
    <td colspan="8" style='mso-ignore:colspan;'></td>
   </tr>
   <tr height="42" style='height:31.50pt;'>
    <td class="xl145" height="42" colspan="2" style='height:31.50pt;border-right:none;border-bottom:none;'></td>
    <td class="xl149" colspan="10" style='border-right:none;border-bottom:none;'></td>
    <td colspan="8" style='mso-ignore:colspan;'></td>
   </tr>
   <tr height="42" style='height:31.50pt;'>
    <td class="xl150" height="42" colspan="12" style='height:31.50pt;border-right:none;border-bottom:none;' x:str>**Barang Sudah Dalam Keadaan Baik Dan Cukup Oleh(Tanda Tangan Dan Stempel Perusahan)</td>
    <td colspan="8" style='mso-ignore:colspan;'></td>
   </tr>
   <tr height="42" style='height:31.50pt;'>
    <td class="xl151" height="42" colspan="12" style='height:31.50pt;border-right:none;border-bottom:none;' x:str>**Barang Yang sudah Di beli Tidak Bisa Di Tukarkan Kembali</td>
    <td colspan="8" style='mso-ignore:colspan;'></td>
   </tr>
   <tr height="44" style='height:33.00pt;'>
    <td class="xl152" height="44" colspan="4" style='height:33.00pt;border-right:none;border-bottom:none;text-align: center;' x:str><span style='mso-spacerun:yes;'>&nbsp;&nbsp;</span>PENERIMA</td>
    <td class="xl152" colspan="3" style='border-right:none;border-bottom:none;text-align: center;' x:str><span style='mso-spacerun:yes;'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>PENGIRIM/SUPIR</td>
    <td class="xl153"></td>
    <td class="xl152" colspan="4" style='border-right:none;border-bottom:none;text-align: center;' x:str><span style='mso-spacerun:yes;'>&nbsp;&nbsp;&nbsp;&nbsp;</span>HORMAT KAMI</td>
    <td colspan="8" style='mso-ignore:colspan;'></td>
    <td class="xl152" colspan="4" style='border-right:none;border-bottom:none;text-align: center;' x:str><span style='mso-spacerun:yes;'>&nbsp;&nbsp;&nbsp;&nbsp;</span>PENANGGUNG JAWAB</td>
   </tr>
   <tr height="30.80" style='height:23.10pt;mso-height-source:userset;mso-height-alt:462;'>
    <td class="xl153" height="30.80" colspan="4" style='height:23.10pt;mso-ignore:colspan;'></td>
    <td class="xl156" colspan="3" style='mso-ignore:colspan;'></td>
    <td class="xl153" colspan="2" style='mso-ignore:colspan;'></td>
    <td class="xl156" colspan="3" style='mso-ignore:colspan;'></td>
    <td colspan="8" style='mso-ignore:colspan;'></td>
    <td colspan="8" style='mso-ignore:colspan;'></td>
   </tr>
   <tr height="22.80" style='height:17.10pt;mso-height-source:userset;mso-height-alt:342;'>
    <td class="xl153" height="22.80" colspan="12" style='height:17.10pt;mso-ignore:colspan;'></td>
    <td colspan="8" style='mso-ignore:colspan;'></td>
   </tr>
   <tr height="17.27" style='height:12.95pt;mso-height-source:userset;mso-height-alt:259;'>
    <td class="xl153" height="17.27" colspan="6" style='height:12.95pt;mso-ignore:colspan;'></td>
    <td class="xl157"></td>
    <td class="xl153" colspan="5" style='mso-ignore:colspan;'></td>
    <td colspan="8" style='mso-ignore:colspan;'></td>
    <td colspan="8" style='mso-ignore:colspan;'></td>
   </tr>
   <tr height="26.80" style='height:20.10pt;mso-height-source:userset;mso-height-alt:402;'>
    <td class="xl153" height="26.80" colspan="12" style='height:20.10pt;mso-ignore:colspan;'></td>
    <td colspan="8" style='mso-ignore:colspan;'></td>
   </tr>
   <tr height="44" style='height:33.00pt;'>
    <td class="xl153" height="44" colspan="5" style='height:33.00pt;mso-ignore:colspan;'><?php echo $datapembeli["nama_pembeli"]; ?></td>
    <td class="xl156" colspan="2" style='border-right:none;border-bottom:none;text-align: center;' x:str><?php echo $rowsuratjalan["nama_supir"]; ?></td>
    <td class="xl153" colspan="5" style='mso-ignore:colspan;'></td>
    <td colspan="8" style='mso-ignore:colspan;'></td>
    <td colspan="8" style='mso-ignore:colspan;'></td>
   </tr>
   <tr height="34.80" style='height:26.10pt;mso-height-source:userset;mso-height-alt:522;'>
    <td class="xl154" height="34.80" colspan="5" style='height:26.10pt;mso-ignore:colspan;'></td>
    <td class="xl153" colspan="5" style='mso-ignore:colspan;'></td>
    <td class="xl172" colspan="2" style='border-right:none;border-bottom:none;text-align: center;' x:str><?php echo $rowsuratjalan["pembuat_surat_jln"]; ?></td>
    <td colspan="8" style='mso-ignore:colspan;'></td>
    <td class="xl156" colspan="2" style='border-right:none;border-bottom:none;text-align: center;' x:str><?php echo $rowsuratjalan["png_jawab"]; ?></td>
   </tr>
   <tr height="42.80" style='height:32.10pt;mso-height-source:userset;mso-height-alt:642;'>
    <td class="xl152" height="42.80" colspan="4" style='height:32.10pt;border-right:none;border-bottom:none;text-align: center;' x:str>(<span style='mso-spacerun:yes;'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span>NAMA JELAS<span style='mso-spacerun:yes;'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span><span style='display:none;'><span style='mso-spacerun:yes;'>&nbsp;&nbsp;</span>)</span></td>
    <td class="xl158"></td>
    <td class="xl152" colspan="2" style='border-right:none;border-bottom:none;text-align: center;' x:str><span style='mso-spacerun:yes;'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>(<span style='mso-spacerun:yes;'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span>NAMA JELAS<span style='mso-spacerun:yes;'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span>)</td>
    <td class="xl159"></td>
    <td class="xl152" colspan="4" style='border-right:none;border-bottom:none;text-align: center;' x:str><span style='mso-spacerun:yes;'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>(<span style='mso-spacerun:yes;'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span>NAMA JELAS<span style='mso-spacerun:yes;'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span>)</td>
    <td colspan="8" style='mso-ignore:colspan;'></td>
    <td class="xl152" colspan="4" style='border-right:none;border-bottom:none;text-align: center;' x:str><span style='mso-spacerun:yes;'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>(<span style='mso-spacerun:yes;'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span>NAMA JELAS<span style='mso-spacerun:yes;'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span>)</td>
   </tr>
   <![if supportMisalignedColumns]>
    <tr width="0" style='display:none;'>
     <td width="146" style='width:110;'></td>
     <td width="108" style='width:81;'></td>
     <td width="309" style='width:232;'></td>
     <td width="274" style='width:206;'></td>
     <td width="231" style='width:173;'></td>
     <td width="211" style='width:158;'></td>
     <td width="98" style='width:74;'></td>
     <td width="279" style='width:209;'></td>
    </tr>
   <![endif]>
  </table>
</div>