<?php
  include_once "koneksi.php";

  if (isset($_POST["tanggalAkhir"])) {
    $tanggalAwal = date("Y-m-d", strtotime($_POST["tanggalAwal"]));
    $tanggalAkhir = date("Y-m-d", strtotime($_POST["tanggalAkhir"]));

    $getfilterorderpembeli = mysqli_query($koneksi, "select * from order_pembeli where tgl_beli between '".$tanggalAwal."' and '".$tanggalAkhir."'");
    $hitungdatafilterorder = mysqli_num_rows($getfilterorderpembeli);

    if($hitungdatafilterorder == 0){
      echo '<tr>
        <td colspan="9">Tidak Ada Data Pembeli</td>
      </tr>';
    }else{
      $nomor = 1;
      while($row_order = mysqli_fetch_assoc($getfilterorderpembeli)){
?>
        <tr>
          <td><?php echo $nomor; ?></td>
          <td><?php echo $row_order["no_transaksi"]; ?></td>
          <td><?php echo date("d M Y", strtotime($row_order["tgl_beli"])); ?></td>
          <td><?php echo $row_order["nama_pembeli"]; ?></td>
          <td><?php echo $row_order["pembayaran"]; ?></td>
          <td><?php echo $row_order["keterangan"]; ?></td>
          <td>
            <form method="post" action="<?php echo $url; ?>">
              <input type="hidden" name="menu" value="detail_order">
              <input type="hidden" name="id_tr_order" value="<?php echo $row_order["no_transaksi"]; ?>">
              <button type="submit" class="btn btn-success"><i class="fas fa-info-circle"></i> Detail</button>
            </form>
          </td>
          <td>
            <form action="<?php echo $url; ?>" method="post">
              <input type="hidden" name="menu" value="edit_orderpembeli">
              <input type="hidden" name="id_order" value="<?php echo $row_order["id_order"]; ?>">
              <button type="submit" class="btn btn-warning"><i class="fas fa-edit"></i></button>
            </form>
          </td>
          <td>
            <form action="<?php echo $url; ?>" method="post">
              <input type="hidden" name="menu" value="hapus_orderpembeli">
              <input type="hidden" name="tr_order" value="<?php echo $row_order["no_transaksi"]; ?>">
              <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button>
            </form>
          </td>
        </tr>
<?php
        $nomor ++;
      }
    }
  }
?>
