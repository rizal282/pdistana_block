<?php
  include_once "koneksi.php";

  if (isset($_POST["tanggalAkhir"])) {
    $tanggalAwal = date("Y-m-d", strtotime($_POST["tanggalAwal"]));
    $tanggalAkhir = date("Y-m-d", strtotime($_POST["tanggalAkhir"]));

    $getfilterbayartunai = mysqli_query($koneksi, "select * from pengeluaran_lain where tanggal between '".$tanggalAwal."' and '".$tanggalAkhir."'");
    $hitungdatafilterbayartunai = mysqli_num_rows($getfilterbayartunai);

    if($hitungdatafilterbayartunai == 0){
      echo '<tr>
        <td colspan="9">Tidak Ada Data Pengeluaran Lain-lain</td>
      </tr>';
    }else{
      $nomor = 1;
      while($rowpembelitunai = mysqli_fetch_array($getfilterbayartunai)){
?>
        <tr>
          <td><?php echo $nomor; ?></td>
          <td><?php echo date("d M Y", strtotime($rowpembelitunai["tanggal"])); ?></td>
          <td><?php echo $rowpembelitunai["nama_beban"]; ?></td>
          <td><?php echo $rowpembelitunai["no_pelanggan"]; ?></td>
          <td><?php echo "Rp ". number_format($rowpembelitunai["nominal"],1,",","."); ?></td>
          <td><?php echo $rowpembelitunai["keterangan"]; ?></td>
          <td>
            <form action="<?php echo $url; ?>" method="post">
              <input type="hidden" name="menu" value="editpengeluaranlain">
              <input type="hidden" name="id_pengeluaran_lain" value="<?php echo $rowpembelitunai["id_pengeluaran_lain"]; ?>">
              <button type="submit" class="btn btn-warning"><i class="fas fa-edit"></i> Edit</button>
            </form>
          </td>
          <td>
            <form action="<?php echo $url; ?>" method="post">
              <input type="hidden" name="menu" value="hapuspengeluaranlain">
              <input type="hidden" name="id_pengeluaran_lain" value="<?php echo $rowpembelitunai["id_pengeluaran_lain"]; ?>">
              <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i> Hapus</button>
            </form>
          </td>
        </tr>
<?php
        $nomor ++;
      }
    }
  }
?>
