<?php
  include_once "koneksi.php";

  if(isset($_POST["tgl_akhirbelibahanbaku"])){
    $tgl_awal = date("Y-m-d", strtotime($_POST["tgl_awalbelibahanbaku"]));
    $tgl_akhir = date("Y-m-d", strtotime($_POST["tgl_akhirbelibahanbaku"]));

    $getdatabelibahanbaku = mysqli_query($koneksi, "select * from order_bahanbaku inner join total_bayar_bahanbaku on order_bahanbaku.no_trbahanbaku = total_bayar_bahanbaku.no_trbahanbaku where order_bahanbaku.tgl_pembelian between '".$tgl_awal."' and '".$tgl_akhir."'");



?>
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>No</th>
        <th>Tgl Beli</th>
        <th>Nama Supplier</th>
        <th>No Transaksi</th>
        <th>Total Harga</th>
      </tr>
    </thead>
    <tbody>
      <?php
          $nomor = 1;
          while ($rowdatabelibahanbaku = mysqli_fetch_array($getdatabelibahanbaku)) {
      ?>
            <tr>
              <td><?php echo $nomor; ?></td>
              <td><?php echo date("d M Y", strtotime($rowdatabelibahanbaku["tgl_pembelian"])); ?></td>
              <td><?php echo $rowdatabelibahanbaku["nama_supplier"]; ?></td>
              <td><?php echo $rowdatabelibahanbaku["no_trbahanbaku"]; ?></td>
              <td><?php echo number_format($rowdatabelibahanbaku["nominal"],1,",","."); ?></td>
            </tr>
      <?php
            $nomor ++;
          }
      ?>
          </tbody>
        </table>

        <form action="<?php echo $url; ?>" method="post" target="_blank">
          <input type="hidden" name="menu" value="laporandatabelibahanbaku">
          <input type="hidden" name="tgl_awal" value="<?php echo $tgl_awal; ?>">
          <input type="hidden" name="tgl_akhir" value="<?php echo $tgl_akhir; ?>">

          <button type="submit" class="btn btn-primary">Buat Laporan</button>
        </form>
      <?php

        }
      ?>
