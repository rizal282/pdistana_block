<?php
  include_once "koneksi.php";

  if (isset($_POST["tanggalAkhir"])) {
    $tanggalAwal = date("Y-m-d", strtotime($_POST["tanggalAwal"]));
    $tanggalAkhir = date("Y-m-d", strtotime($_POST["tanggalAkhir"]));

    $getfilterbayartunai = mysqli_query($koneksi, "select * from order_bahanbaku inner join total_bayar_bahanbaku on order_bahanbaku.no_trbahanbaku = total_bayar_bahanbaku.no_trbahanbaku where total_bayar_bahanbaku.sts_lunas = 'Belum Lunas' and order_bahanbaku.tgl_pembelian between '".$tanggalAwal."' and '".$tanggalAkhir."'");
    $hitungdatafilterbayartunai = mysqli_num_rows($getfilterbayartunai);

    if($hitungdatafilterbayartunai == 0){
      echo '<tr>
        <td colspan="9">Tidak Ada Data Belanja Bahan Baku</td>
      </tr>';
    }else{
      $nomor = 1;
      while($rowpembelitunai = mysqli_fetch_array($getfilterbayartunai)){
?>
        <tr>
          <td><?php echo $nomor; ?></td>
          <td><?php echo $rowpembelitunai["no_trbahanbaku"]; ?></td>
          <td><?php echo date("d M Y", strtotime($rowpembelitunai["tgl_pembelian"])); ?></td>
          <td><?php echo $rowpembelitunai["nama_supplier"]; ?></td>
          <td><?php echo $rowpembelitunai["pembayaran"]; ?></td>
          <td>
            <?php
              if($rowpembelitunai["tgl_tempo"] == "0000-00-00" || $rowpembelitunai["tgl_tempo"] == "1970-01-01"){
                echo "-";
              }else{
                echo date("d M Y", strtotime($rowpembelitunai["tgl_tempo"]));
              }
            ?>
          </td>
          <td><?php echo $rowpembelitunai["keterangan"]; ?></td>
          <td>
            <form action="<?php echo $url; ?>" method="post">
              <input type="hidden" name="menu" value="bayarorderbhnbaku">
              <input type="hidden" name="tr_bahanbaku" value="<?php echo $rowpembelitunai["no_trbahanbaku"]; ?>">
              <button type="submit" class="btn btn-success"><i class="fas fa-info-circle"></i> Detail</button>
            </form>
          </td>
          <!-- <td>
            <form action="<?php echo $url; ?>" method="post">
              <input type="hidden" name="menu" value="bayarorderbhnbaku">
              <input type="hidden" name="tr_bahanbaku" value="<?php echo $roworderbahanbaku["no_trbahanbaku"]; ?>">
              <button type="submit" class="btn btn-primary">Bayar</button>
            </form>
          </td> -->
        </tr>
<?php
        $nomor ++;
      }
    }
  }
?>
