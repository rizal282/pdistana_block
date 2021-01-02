<?php
  include_once "koneksi.php";

  if (isset($_POST["tanggalAkhir"])) {
    $tanggalAwal = date("Y-m-d", strtotime($_POST["tanggalAwal"]));
    $tanggalAkhir = date("Y-m-d", strtotime($_POST["tanggalAkhir"]));

    $getfilterbayartunai = mysqli_query($koneksi, "select * from pengeluaran_harian where tgl_pengeluaran between '".$tanggalAwal."' and '".$tanggalAkhir."'");
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
          <td><?php echo date("d M Y", strtotime($rowpembelitunai["tgl_pengeluaran"])); ?></td>
          <td><?php echo $rowpembelitunai["nama_beban"]; ?></td>
          <td><?php echo "Rp ". number_format($rowpembelitunai["nominal"],1,",","."); ?></td>
          <td><?php echo $rowpembelitunai["keterangan"]; ?></td>
          <td>
            <form action="<?php echo $url; ?>" method="post">
              <input type="hidden" name="menu" value="editpengeluaranharian">
              <input type="hidden" name="id_pengeluaranharian" value="<?php echo $rowpembelitunai["id_pengeluaranharian"]; ?>">
              <button class="btn btn-warning" type="submit"><i class="fas fa-edit"></i> Edit</button>
            </form>
          </td>
          <td>
            <form action="<?php echo $url; ?>" method="post">
              <input type="hidden" name="menu" value="hapuspengeluaranharian">
              <input type="hidden" name="id_pengeluaranharian" value="<?php echo $rowpembelitunai["id_pengeluaranharian"]; ?>">
              <button class="btn btn-danger" type="submit"><i class="fas fa-trash"></i> Hapus</button>
            </form>
          </td>
        </tr>
<?php
        $nomor ++;
      }
    }
  }
?>
