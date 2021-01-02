<div class="card">
  <div class="card-header"><i class="fas fa-fw fa-list"></i> Data Kas</div>
  <div class="card-body">
    <?php
    $getkaskecil = mysqli_query($koneksi, "select sum(nominal) as total_kaskecil from pengeluaran where tgl_pengeluaran = '" . date("Y-m-d") . "'");
    $rowdatakaskecil = mysqli_fetch_array($getkaskecil);
    ?>
    <div class="row">
      <div class="col-xl-4 col-sm-6 mb-4">
        <div class="card text-white bg-primary o-hidden h-100">
          <div class="card-body">
            <div class="card-body-icon">
              <i class="fas fa-hand-holding-usd"></i>
            </div>
            <div id="resetkaskecil" class="mr-5"><?php echo "Rp " . number_format($rowdatakaskecil["total_kaskecil"], 1, ",", "."); ?></div>
          </div>
          <div class="card-footer text-white clearfix small z-1" href="#" data-toggle="modal" data-target="#kaskecil">
          <span class="float-left">Kas Kecil</span>
            <?php
                if ($_SESSION["id_user"] && $_SESSION["username"] && $_SESSION["password"] && $_SESSION["status_user"] && $_SESSION["status_user"] == "admin") {
            ?>
            <span class="float-left">Kas Kecil</span>
              <span class="float-right">
                <form action="<?php echo $url; ?>" method="post">
                  <input type="hidden" name="menu" value="resetkaskecil">
                  <button class="btn btn-primary" type="submit">Reset</button>
                </form>
              </span>
                <?php } ?>
          </div>
        </div>
      </div>
      <?php
      $sqlkas = mysqli_query($koneksi, "select * from kas");

      while ($rowkas = mysqli_fetch_array($sqlkas)) {
        // $sqllimitkaskecil = mysqli_query($koneksi, "select limit_kaskecil from setting");
        // $rowkaskecil = mysqli_fetch_assoc($sqllimitkaskecil);

        // $selisihkaskecil = $rowkaskecil["limit_kaskecil"] - $rowkas["kas_kecil"];

        ?>


        <div class="col-xl-4 col-sm-6 mb-4">
          <div class="card text-white bg-warning o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fas fa-hand-holding-usd"></i>
              </div>
              <div id="resettopupkasbesar" class="mr-5"><?php echo "Rp " . number_format($rowkas["kas_besar"], 1, ",", "."); ?></div>
            </div>
            <div class="card-footer">
              
              <?php
                if ($_SESSION["id_user"] && $_SESSION["username"] && $_SESSION["password"] && $_SESSION["status_user"] && $_SESSION["status_user"] == "admin") {
                  ?>
                <div class="row">
                  <div class="col-lg-3">
                  Kas Besar
                  </div>
                  <div class="col-lg-3">
                    <a class="btn btn-warning text-white clearfix small z-1" href="#" data-toggle="modal" data-target="#kasbesar">
                      <span class="float-left">Top Up</span>
                    </a>
                  </div>
                  <div class="col-lg-3">
                    <form action="<?php echo $url; ?>" method="post">
                      <input type="hidden" name="menu" value="editkasbesar">
                      <button class="btn btn-warning text-white" type="submit">Edit</button>
                    </form> 
                  </div>
                  <div class="col-lg-3">
                    <form action="<?php echo $url; ?>" method="post">
                        <input type="hidden" name="menu" value="laporankasbesar">
                        <button class="btn btn-warning text-white" type="submit">Laporan</button>
                      </form>
                  </div>
                </div>
              <?php
                }else{
              ?>
                  <span class="float-left">Kas Besar</span>
              <?php
                }
                ?>

            </div>
          </div>
        </div>

        <!-- Modal -->
        <div id="kasbesar" class="modal fade" role="dialog">
          <div class="modal-dialog">
            <!-- konten modal-->
            <div class="modal-content">
              <!-- heading modal -->
              <div class="modal-header">
                <h4 class="modal-title">Kas Besar</h4>
              </div>
              <!-- body modal -->
              <div class="modal-body">
                <small>Anda akan menambahkan nominal Kas Besar, dan mengambil dana dari Kas Bank sebanyak :</small>
                <div class="form-group">
                  <label for="">Nominal Top Up</label>
                  <input class="form-control" type="text" name="nominaltopup" id="nominaltopup">
                </div>



                <!-- <a class="btn btn-primary" id="tambah_beli" href="#" data-dismiss="modal">Tambahkan</a> -->
              </div>
              <!-- footer modal -->
              <div class="modal-footer">
                <button id="topup" type="button" class="btn btn-success" data-dismiss="modal">Ya</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Tidak</button>
              </div>
            </div>
          </div>
        </div>

        
        <?php
          if ($_SESSION["id_user"] && $_SESSION["username"] && $_SESSION["password"] && $_SESSION["status_user"] && $_SESSION["status_user"] == "admin") {
            ?>
          <div class="col-xl-4 col-sm-6 mb-4">
            <div class="card text-white bg-success o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-hand-holding-usd"></i>
                </div>
                <div id="kasbankbaru" class="mr-5"><?php echo "Rp " . number_format($rowkas["kas_bank"], 1, ",", "."); ?></div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="#">
                <span class="float-left">Kas Bank</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>

    </div>

    <div class="row">
      <div class="col-lg-12">
        <a href="#" class="btn btn-success" data-toggle="modal" data-target="#rekkoran"><i class="fas fa-plus"></i> Tambah Rekening Koran</a>

        <!-- Modal -->
        <div id="rekkoran" class="modal fade" role="dialog">
          <div class="modal-dialog">
            <!-- konten modal-->
            <div class="modal-content">
              <!-- heading modal -->
              <div class="modal-header">
                <h4 class="modal-title">Tambah Rekening Koran</h4>
              </div>
              <!-- body modal -->
              <div class="modal-body">

                <form class="form-horizontal" action="<?php echo $url; ?>" method="post">
                  <div class="form-group">
                    <label>Tanggal</label>
                    <input type="hidden" name="menu" value="tambahrekeningkoran">
                    <input class="form-control" type="text" name="tanggal" id="tanggalrekkoran" required>
                  </div>
                  <div class="form-group">
                    <label>Keterangan</label>
                    <input class="form-control" type="text" name="keterangan" required>
                  </div>
                  <div class="form-group">
                    <label>Mutasi</label>
                    <input class="form-control" type="text" name="mutasi" onkeyup="format_angka(this)" required>
                  </div>
                  <div class="form-group">
                    <label>Kredit/Debit</label>
                    <select class="form-control" name="kreditdebit">
                      <option>Pilih :</option>
                      <option value="Kredit">Kredit</option>
                      <option value="Debit">Debit</option>
                    </select>
                    <!-- <input class="form-control" type="text" name="tanggal"> -->
                  </div>

                  <button id="simpanrekkoran" type="submit" class="btn btn-success"><i class="fas fa-save"></i> Simpan</button>
                </form>

                <!-- <a class="btn btn-primary" id="tambah_beli" href="#" data-dismiss="modal">Tambahkan</a> -->
              </div>
              <!-- footer modal -->
              <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-window-close"></i> Batal</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php include_once "data_rekeningkoran.php"; ?>
  <?php } ?>

<?php
}
?>


  </div>
</div>