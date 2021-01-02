<?php
  include_once "koneksi.php";

  if (isset($_POST["tanggalAkhir"])) {
    $tanggalAwal = date("Y-m-d", strtotime($_POST["tanggalAwal"]));
    $tanggalAkhir = date("Y-m-d", strtotime($_POST["tanggalAkhir"]));

    $getfilterbayartunai = mysqli_query($koneksi, "select * from rekening_koran where tanggal between '".$tanggalAwal."' and '".$tanggalAkhir."'");
    $hitungdatafilterbayartunai = mysqli_num_rows($getfilterbayartunai);

    if($hitungdatafilterbayartunai == 0){
      echo '<tr>
        <td colspan="9">Tidak Ada Data Rekening Koran</td>
      </tr>';
    }else{
      $nomor = 1;
      while($rowpembelitunai = mysqli_fetch_array($getfilterbayartunai)){
?>
        <tr>
          <td><?php echo $nomor; ?></td>
          <td><?php echo date("d M Y", strtotime($rowpembelitunai["tanggal"])); ?></td>
          <td><?php echo $rowpembelitunai["keterangan"]; ?></td>
          <td>Rp <?php echo number_format($rowpembelitunai["mutasi"],1,",","."); ?></td>
          <td><?php echo $rowpembelitunai["kreditdebit"]; ?></td>
        </tr>
<?php
        $nomor ++;
      }
    }
  }
?>
