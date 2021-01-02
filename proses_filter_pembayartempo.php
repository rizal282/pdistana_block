<?php
  include_once "koneksi.php";

  if (isset($_POST["tanggalAkhir"])) {
    $tanggalAwal = date("Y-m-d", strtotime($_POST["tanggalAwal"]));
    $tanggalAkhir = date("Y-m-d", strtotime($_POST["tanggalAkhir"]));

    $getfilterbayartunai = mysqli_query($koneksi, "select * from order_pembeli inner join total_bayar_pembeli on order_pembeli.no_transaksi = total_bayar_pembeli.no_transaksi where order_pembeli.pembayaran = 'Tempo' and total_bayar_pembeli.sts_lunas = 'Belum Lunas' and order_pembeli.tgl_beli between '".$tanggalAwal."' and '".$tanggalAkhir."'");
    $hitungdatafilterbayartunai = mysqli_num_rows($getfilterbayartunai);

    if($hitungdatafilterbayartunai == 0){
      echo '<tr>
        <td colspan="9">Tidak Ada Data Pembeli Tempo</td>
      </tr>';
    }else{
      $nomor = 1;
      while($rowpembelitunai = mysqli_fetch_array($getfilterbayartunai)){
?>
        <tr>
          <td><?php echo $nomor; ?></td>
          <td><?php echo $rowpembelitunai["no_transaksi"]; ?></td>
          <td><?php echo date("d M Y", strtotime($rowpembelitunai["tgl_beli"])); ?></td>
          <td><?php echo $rowpembelitunai["nama_pembeli"]; ?></td>
          <td><?php echo $rowpembelitunai["nohp_pembeli"]; ?></td>
          <td><?php echo $rowpembelitunai["alamat_pembeli"]; ?></td>
          <td><?php echo $rowpembelitunai["wilayah"]; ?></td>
          <td><?php echo $rowpembelitunai["pembayaran"]; ?></td>
          <td><?php echo $rowpembelitunai["keterangan"]; ?></td>
          <td><?php echo $rowpembelitunai["sts_lunas"]; ?></td>
          <td>
            <form method="post" action="<?php echo $url; ?>">
              <input type="hidden" name="menu" value="detailpembeli">
              <input type="hidden" name="notrbeli" value="<?php echo $rowpembelitunai["no_transaksi"]; ?>">
              <button class="btn btn-primary" type="submit"><i class="fas fa-info-circle"></i></button>
            </form>
          </td>
        </tr>
<?php
        $nomor ++;
      }
    }
  }
?>
