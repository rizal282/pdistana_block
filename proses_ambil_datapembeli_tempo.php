<?php
  include_once "koneksi.php";

  if(isset($_POST["tglakhirpembelitempo"])){
    $tglawalpembelitempo = date("Y-m-d", strtotime($_POST["tglawalpembelitempo"]));
    $tglakhirpembelitempo = date("Y-m-d", strtotime($_POST["tglakhirpembelitempo"]));

    $getdatatempopembeli = mysqli_query($koneksi, "select * from order_pembeli inner join pembayaran on order_pembeli.no_transaksi = pembayaran.no_transaksi inner join total_bayar_pembeli on order_pembeli.no_transaksi = total_bayar_pembeli.no_transaksi where total_bayar_pembeli.sts_lunas = 'Belum Lunas' order by pembayaran.id_pembayaran desc");
?>
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>No</th>
            <th>Nama Pembeli</th>
            <th>No Transaksi</th>
            <th>Jatuh Tempo</th>
            <th>Sisa Tagihan</th>
          </tr>
        </thead>
        <tbody>
          <?php
            $nomor = 1;
            while ($rowdatatempopembeli = mysqli_fetch_array($getdatatempopembeli)) {
          ?>
              <tr>
                <td><?php echo $nomor; ?></td>
                <td><?php echo $rowdatatempopembeli["nama_pembeli"]; ?></td>
                <td><?php echo $rowdatatempopembeli["no_transaksi"]; ?></td>
                <td><?php echo $rowdatatempopembeli["jatuh_tempo"]; ?></td>
                <td><?php echo $rowdatatempopembeli["sisa_tagihan"]; ?></td>
              </tr>
          <?php
            }
          ?>
        </tbody>
      </table>

      <form action="<?php echo $url; ?>" method="post" target="_blank">
        <input type="hidden" name="menu" value="buatlaporanpembelitempo">
        <input type="hidden" name="tgl_awal" value="<?php echo $tglawalpembelitempo ?>">
        <input type="hidden" name="tgl_akhir" value="<?php echo $tglakhirpembelitempo ?>">

        <button type="submit" class="btn btn-primary">Buat Laporan</button>
      </form>
<?php
  }
?>
