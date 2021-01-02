<?php
  if(isset($_POST["notrbeli"])){
    $id_tr_pembeli = $_POST["notrbeli"];
  }

  // mengambil data pembeli
  $sqldetailorder = "select * from order_pembeli where no_transaksi = '".$id_tr_pembeli."'";
  $aksiambildetail = mysqli_query($koneksi, $sqldetailorder);
  $rowdetailorder = mysqli_fetch_assoc($aksiambildetail);

  // mengambil data nominal yang harus dibayar
  $sqlgetnominalbayar = "select * from total_bayar_pembeli where no_transaksi = '".$id_tr_pembeli."'";
  $aksigetnominal = mysqli_query($koneksi, $sqlgetnominalbayar);
  $rownominalbayar = mysqli_fetch_array($aksigetnominal);
?>
  <div class="card mb-3">
  <div class="card-header">
    <div class="row">
      <div class="col-lg">
        <i class="fas fa-info-circle"></i>
        Detail Order Yang Harus Dibayar Oleh Pembeli
      </div>

    </div>
  </div>
  <div class="card-body">
    <div class="alert alert-info"><i class="fas fa-user"></i> Data Pembeli</div>

    <table class="table">
      <tr>
        <th>No Transaksi</th>
        <td>
          <p id="notrpembeli"><?php echo $rowdetailorder["no_transaksi"]; ?></p>
        </td>
      </tr>
      <tr>
        <th>Tanggal Beli</th>
        <td><?php echo date("d M Y", strtotime($rowdetailorder["tgl_beli"])); ?></td>
      </tr>
      <tr>
        <th>Nama Pembeli</th>
        <td><?php echo $rowdetailorder["nama_pembeli"]; ?></td>
      </tr>
      <tr>
        <th>No HP Pembeli</th>
        <td><?php echo $rowdetailorder["nohp_pembeli"]; ?></td>
      </tr>
      <tr>
        <th>Alamat Pembeli</th>
        <td><?php echo $rowdetailorder["alamat_pembeli"]; ?></td>
      </tr>
      <tr>
        <th>Pembayaran</th>
        <td><?php echo $rowdetailorder["pembayaran"]; ?></td>
      </tr>
      <tr>
        <th>Jatuh Tempo</th>
        <td>
          <?php
            if($rowdetailorder["jatuh_tempo"] == "0000-00-00"){
              echo "-";
            }else{
              echo date("d M Y", strtotime($rowdetailorder["jatuh_tempo"]));
            }
          ?>
        </td>
      </tr>
      <tr>
        <th>Keterangan</th>
        <td><?php echo $rowdetailorder["keterangan"]; ?></td>
      </tr>
    </table>

    <div class="alert alert-info"><i class="fas fa-shopping-basket"></i> Detail barang yang dibeli</div>

    <div class="table-responsive">
      <table class="table table-bordered" id="data_order" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>No</th>
            <th>No Transaksi</th>
            <th>Kode Barang</th>
            <th>Nama Barang</th>
            <th>Harga Barang</th>
            <th>Jumlah Beli</th>
            <th>Satuan Barang</th>
            <th>Total Harga</th>
            <th>Sumber Barang</th>
          </tr>
        </thead>
        <tbody>
            <?php
              $no = 1;
              $sqlambilbarang = "select * from detail_order_pembeli where no_transaksi = '".$rowdetailorder["no_transaksi"]."'";
              $aksiambilbarang = mysqli_query($koneksi, $sqlambilbarang);
              while ($row_order = mysqli_fetch_assoc($aksiambilbarang)) {
            ?>
              <tr>
                <td><?php echo $no; ?></td>
                <td><?php echo $row_order["no_transaksi"]; ?></td>
                <td><?php echo $row_order["kode_barang"]; ?></td>
                <td><?php echo $row_order["nama_barang"]; ?></td>
                <td><?php echo "Rp ".number_format($row_order["hrg_barang"],1,",","."); ?></td>
                <td><?php echo $row_order["jumlah_beli"]; ?></td>
                <td><?php echo $row_order["satuan_brg"]; ?></td>
                <td><?php echo "Rp ".number_format($row_order["total_hrg"],1,",","."); ?></td>
                <td><?php echo $row_order["sumber_brg"]; ?></td>
              </tr>
            <?php
                $no ++;
              }
            ?>
            <tr>
              <td colspan="7" align="right">Grand Total</td>
              <td colspan="2">
                <input type="hidden" name="grandtotal" id="grandtotal" value="<?php echo $rownominalbayar["total_bayar"]; ?>">
                <p><?php echo "Rp ".number_format($rownominalbayar["total_bayar"],1,",","."); ?></p>
              </td>
            </tr>
            <tr>
              <td colspan="7" align="right">Diskon</td>
              <td colspan="2">
                <?php
                  $cekdetailbeli = mysqli_query($koneksi, "select count(nama_barang) as total_barang from detail_order_pembeli where no_transaksi = '".$id_tr_pembeli."'");
                  $rowdetailbeli = mysqli_fetch_array($cekdetailbeli);

                  if($rowdetailbeli["total_barang"] == 0){
                    echo '<div class="alert alert-danger">Detail Barang Kosong!</div>';
                  }else{
                      if($rownominalbayar["diskon"] == 0){
                        $diskon = "";
                      }else{
                        $diskon = $rownominalbayar["diskon"];
                      }
                ?>
                      <input class="form-control" type="text" id="diskon" value="<?php echo $diskon; ?>" onkeyup="format_angka(this)">
                      <small class="notifdiskon">Tekan Enter Untuk Mengisi Diskon</small>
                <?php
                  }
                ?>
              </td>
            </tr>
            <tr>
              <td colspan="7" align="right">Total Bayar</td>
              <td colspan="2">
                <p id="sisa_total">
                  <?php
                    if($rownominalbayar["sisa_total"] != 0 || $rownominalbayar["sisa_total"] == 0){
                      echo "Rp ".number_format($rownominalbayar["sisa_total"],1,",",".");
                    }else{
                      echo "Rp ".number_format($rownominalbayar["total_bayar"],1,",",".");
                    }
                  ?>

                </p>
              </td>
            </tr>
        </tbody>
      </table>
    </div>

    <div class="row">
      <div class="col-lg-12">
        <div class="alert alert-info"><i class="fas fa-shopping-basket"></i> Catatan Pembayaran Angsuran</div>

        <table id="table_bayar" class="table table-bordered">
          <thead>
            <tr>
              <th>No</th>
              <th>Tgl Bayar</th>
              <th>No Transaksi</th>
              <th>Total Bayar</th>
              <th>Nominal DP</th>
              <th>Nominal Cash</th>
              <th>Sisa Tagihan</th>
              <th>Status Lunas</th>
            </tr>
          </thead>
          <tbody>
            <?php
              $getcatatantagihan = mysqli_query($koneksi, "select * from total_bayar_pembeli inner join pembayaran on total_bayar_pembeli.no_transaksi = pembayaran.no_transaksi where pembayaran.no_transaksi = '".$id_tr_pembeli."'");

              $nomor = 1;
              while($rowcatatantagihan = mysqli_fetch_array($getcatatantagihan)){
            ?>
                <tr>
                  <td><?php echo $nomor; ?></td>
                  <td><?php echo date("d M Y", strtotime($rowcatatantagihan["tgl_bayar"])); ?></td>
                  <td><?php echo $rowcatatantagihan["no_transaksi"]; ?></td>
                  <td>
                    <?php
                      if($rowcatatantagihan["sisa_total"] == 0){
                        echo "Rp ".number_format($rowcatatantagihan["total_bayar"],1,",",".");
                      }else{
                        echo "Rp ". number_format($rowcatatantagihan["sisa_total"],1,",",".");
                      }
                    ?>
                  </td>

                  <td><?php echo "Rp ".number_format($rowcatatantagihan["nominal_dp"],1,",","."); ?></td>
                  <td><?php echo "Rp ".number_format($rowcatatantagihan["nominal_cash"],1,",","."); ?></td>
                  <td><?php echo "Rp ".number_format($rowcatatantagihan["sisa_tagihan"],1,",","."); ?></td>
                  <td><?php echo $rowcatatantagihan["sts_lunas"]; ?></td>
                </tr>
            <?php
                $nomor ++;
              }
            ?>
          </tbody>
        </table>
      </div>
    </div>

    <div class="row">
        <div class="col-lg">
          <input type="hidden" name="url" id="url" value="<?php echo $url; ?>">
          <?php
            $sqlcekstslunas = "select sts_lunas from total_bayar_pembeli where no_transaksi = '".$rowdetailorder["no_transaksi"]."'";
            $aksiceklunas = mysqli_query($koneksi, $sqlcekstslunas);
            $rowstslunas = mysqli_fetch_array($aksiceklunas);

            if($rowstslunas["sts_lunas"] == "Sudah Lunas"){
              echo '<div class="alert alert-success">Sudah Dibayar Lunas</div>';
            }else{
              if($rownominalbayar["sts_diskon"] == ""){
                echo '<div class="alert alert-danger">Isi Diskon Terlebih Dahulu Untuk Melakukan Pembayaran</div>';
              }else{
          ?>
                <form action="<?php echo $url; ?>" method="post">
                  <?php
                    if($rowdetailorder["pembayaran"] == "Tunai"){
                  ?>
                      <input type="hidden" name="menu" value="frmbayartunai">
                  <?php
                    }else{
                  ?>
                      <input type="hidden" name="menu" value="frmbayartempo">
                  <?php
                    }
                  ?>
                  <input type="hidden" name="notrbayar" value="<?php echo $rowdetailorder["no_transaksi"]; ?>">
                  <button class="btn btn-primary" type="submit"><i class="fas fa-cash-register"></i> Bayar</button>
                </form>
          <?php
              }
            }
          ?>
        </div>
      </div>
    </div>
  </div>
