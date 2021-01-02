<?php 
  ob_start();
  include_once "../koneksi.php"; 
 

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
    $sisatagihan = $rowtotaltagihan["total_bayar"] - $rowdpbayar["nominal_dp"];

  }else{
    // query untuk menampilkan data pembeli jika diakses dari detail order setelah transaksi
    $sqlgetdatapembeli = mysqli_query($koneksi, "select * from order_pembeli where no_transaksi = '".$no_tr_bayar."'");
    $datapembeli = mysqli_fetch_array($sqlgetdatapembeli);

    // query untuk menampilkan detail barang yg dibeli  jika diakses dari detail order setelah transaksi
    $sqlgetdetailbeli = mysqli_query($koneksi, "select * from detail_order_pembeli where no_transaksi = '".$no_tr_bayar."'");
  }
?>
<?php

$content = '
<div class="display_faktur">
  <div class="row">
    <div class="col-lg-2">
      <img src="'.$url .'img/logopdistana.png" width="140">
    </div>
    <div class="col-lg-6">
      <table width="100%" cellpadding="0" cellspacing="0">
        <tr>
          <td>PD.ISTANA BLOCK PURWAKARTA</td>
        </tr>
        <tr>
          <td>Paving Block, Grass Block, Genteng Beton</td>
        </tr>
        <tr>
          <td>Batako, U-Ditch, Buis Beton, Kastin, DLL</td>
        </tr>
        <tr>
          <td>Office : Jln. Terusan Kapten Halim No. 148</td>
        </tr>
        <tr>
          <td>Sawah Kulon Pasawahan Kab. Purwakarta Jawa Barat 41172</td>
        </tr>
        <tr>
          <td>Phone : (0264) 200 476 - 081294 411 105 - 081 909 450 025</td>
        </tr>
      </table>
    </div>
    <div class="col-lg-4">
      FAKTUR
    </div>
  </div>

  <div id="list_faktur" class="row">
    <div class="col-lg-12">
      <table width="100%" cellspacing="0" cellpadding="0">
        <thead>
          <tr>
            <th>NAMA BARANG</th>
            <th>SATUAN</th>
            <th>QUANTITY</th>
            <th>HARGA SATUAN (Rp)</th>
            <th>JUMLAH (Rp)</th>
          </tr>
        </thead>
        <tbody class="produk_beli">
          '; ?>
          <?php
            while($datadetailpembeli = mysqli_fetch_array($sqlgetdetailbeli)){
          ?>
              <tr>
                <td>'.$datadetailpembeli["nama_barang"].'</td>
                <td>'.$datadetailpembeli["satuan_brg"].'</td>
                <td>'. $datadetailpembeli["jumlah_beli"].'</td>
                <td>'."Rp ".number_format($datadetailpembeli["hrg_barang"],1,",",".").'</td>
                <td>'."Rp ".number_format($datadetailpembeli["total_hrg"],1,",",".").'</td>
              </tr>
          ?>
          <?php
              $jumlahhrgdibeli[] = $datadetailpembeli["total_hrg"];
            }

            $totalseluruh = array_sum($jumlahhrgdibeli);
          ?>
        
<?php $content = '
          </tbody>
        </table>
      </div>
  </div>
  <div id="page_faktur" class="row">
    <div class="col-lg-12">
      <table width="100%" cellspacing="0" cellpadding="0">
        <tr>
          <td colspan="3">Catatan :</td>
          <td>JUMLAH</td>
          <td>'."Rp ".number_format($totalseluruh,1,",",".").'</td>
        </tr>
        <tr>
          <td colspan="3">PERHATIAN</td>
          <td>UANG MUKA</td>
          <td>'."Rp ".number_format($rowdpbayar["nominal_dp"],1,",",".").'</td>
        </tr>
        <tr>
          <td>TANDA TERIMA</td>
          <td>Barang Yang Sudah Dibeli Tidak</td>
          <td>HORMAT KAMI</td>
          <td>SISA</td>
          <td>'."Rp ".number_format($sisatagihan,1,",",".").'</td>
        </tr>
        <tr>
          <td></td>
          <td>Dapat Dikembalikan atau Ditukar</td>
          <td></td>
          <td></td>
          <td></td>
        </tr>
        <tr>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
        </tr>
        <tr>
          <td></td>
          <td>Via Transfer</td>
          <td></td>
          <td></td>
          <td></td>
        </tr>
        <tr>
          <td></td>
          <td>Muhamad Abdulah</td>
          <td></td>
          <td></td>
          <td></td>
        </tr>
        <tr>
          <td></td>
          <td>2313303900 BCA</td>
          <td></td>
          <td></td>
          <td></td>
        </tr>
        <tr>
          <td>'.ucwords($datapembeli["nama_pembeli"]).'</td>
          <td></td>
          <td>HORMAT KAMI</td>
          <td></td>
          <td></td>
        </tr>
      </table>
    </div>
  </div>
</div>';

?>

<?php
  $filename="faktur-".$rowtotaltagihan["no_transaksi"].".pdf";
  $content = ob_get_clean();
  // $content = '<page style="font-family: freeserif">'.nl2br($content).'</page>';
  require_once('html2pdf/html2pdf.class.php');

  try
 {
  $html2pdf = new HTML2PDF('L','A4','en', false, 'UTF-8',array(30, 0, 20, 0));
  $html2pdf->setDefaultFont('Arial');
  $html2pdf->writeHTML($content, isset($_GET['vuehtml']));
  $html2pdf->Output($filename);
 }
 catch(HTML2PDF_exception $e) { echo $e; }
?>