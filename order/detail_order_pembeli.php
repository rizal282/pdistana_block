<?php 
  // ob_start();
  // include_once "koneksi.php"; 
  // include_once "assets/header_page.php";

  // mengambil semua order pembeli
  $sqlorderpembeli = "select * from order_pembeli order by id_order desc limit 1";
  $aksiorder = mysqli_query($koneksi, $sqlorderpembeli);
  $data_id_pembeli = mysqli_fetch_assoc($aksiorder);

  $id_tr_pembeli = "";

  if(isset($_POST["id_tr_order"])){
    $id_tr_pembeli = $_POST["id_tr_order"];
  }else{
    $id_tr_pembeli = $data_id_pembeli["no_transaksi"];
  }

  $sqldetailorder = "select * from order_pembeli where no_transaksi = '".$id_tr_pembeli."'";
  $aksiambildetail = mysqli_query($koneksi, $sqldetailorder);
  $rowdetailorder = mysqli_fetch_assoc($aksiambildetail);

  // ambil jenis pengiriman
  $sqlgetjnskirim = "select jns_pengiriman from total_bayar_pembeli where no_transaksi = '".$id_tr_pembeli."'";
  $aksigetjnskirim = mysqli_query($koneksi, $sqlgetjnskirim);
  $rowjeniskirim = mysqli_fetch_assoc($aksigetjnskirim);
?>

<?php include_once "assets/sidebar_menu.php"; ?>

    <div id="content-wrapper">

      <div class="container-fluid">

            <div class="card mb-3">
              <div class="card-header">
                <div class="row">
                  <div class="col-lg">
                    <i class="fas fa-table"></i>
                    Detail Order Pembeli
                  </div> 
 
                </div>
              </div>
              <div class="card-body">
                <div class="alert alert-info">Data Pembeli</div>

                <table class="table">
                  <tr>
                    <th>No Transaksi</th>
                    <td>
                      <p id="trdetailbeli"><?php echo $rowdetailorder["no_transaksi"]; ?></p>
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
                        if($rowdetailorder["jatuh_tempo"] == "0000-00-00" || $rowdetailorder["jatuh_tempo"] == "1970-01-01"){
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

                <div class="alert alert-info">Detail barang yang dibeli</div>

                <div class="row">
                  <div class="col-lg-12">
                     <button id="tambah_barang" type="submit" class="btn btn-success" data-toggle="modal" data-target="#tambahlagibarangbeli"><i class="fas fa-plus"></i> Tambah Barang</button>
                  </div>
                </div>

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
                        <th>Edit</th>
                        <th>Hapus</th>
                      </tr>
                    </thead>
                    <tbody id="detailbelibrg">
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
                            <td><?php echo "Rp ". number_format($row_order["hrg_barang"],1,",","."); ?></td>
                            <td><?php echo $row_order["jumlah_beli"]; ?></td>
                            <td><?php echo $row_order["satuan_brg"]; ?></td>
                            <td><?php echo "Rp ". number_format($row_order["total_hrg"],1,",","."); ?></td>
                            <td><?php echo $row_order["sumber_brg"]; ?></td>
                            <td>
                              <form method="post" action="<?php echo $url; ?>">
                                <input type="hidden" name="id_detail" value="<?php echo $row_order["id_detail_order"]; ?>">
                                <input type="hidden" name="menu" value="edit_detailbrg">
                                <button type="submit" class="btn btn-success"><i class="fas fa-edit"></i></button>
                              </form>
                            </td>
                            <td>
                              <form action="" method="post">
                                <input type="hidden" id="id_detail" name="id_detail" value="<?php echo $row_order["id_detail_order"]; ?>">
                                <input type="hidden" id="hapus_kode_barang" name="hapus_kode_barang" value="<?php echo $row_order["kode_barang"]; ?>"> 
                                <input type="hidden" name="menu" value="hapus_detailbrg">
                                <button id="hapus_detailbrg" type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                              </form>
                            </td>
                          </tr>
                        <?php
                            $no ++;
                          }
                        ?>
                    </tbody>
                  </table>

                  <?php include_once "order/form_tambahlagi_barangpembeli.php"; ?>

                  <div id="keterangan_kirim" class="row">
                    <div class="col-lg">
                      <form action="<?php echo $url; ?>" method="post" target="_blank">
                        <input type="hidden" name="menu" value="faktur">
                        <input type="hidden" name="faktur_tr" value="<?php echo $rowdetailorder["no_transaksi"]; ?>">
                        <button id="btn_faktur" class="btn btn-primary" type="submit">Buat Faktur</button>
                      </form>
                    </div>
                    <div class="col-lg">
                      <?php
                        if($rowdetailorder["sts_suratjalan"] == "Sudah"){
                          if($rowdetailorder["sts_kirim"] == "Dikirim"){
                            echo '<div class="alert alert-success">Barang Ini Sudah Dikirim</div>';
                          }else{
                      ?>
                          <form action="<?php echo $url; ?>" method="post">
                            <input type="hidden" name="menu" value="editsuratjalan">
                            <input type="hidden" name="edit_suratjalan" value="<?php echo $rowdetailorder["no_transaksi"]; ?>">
                            <button class="btn btn-success" type="submit">Edit Surat Jalan</button>
                          </form>
                      <?php
                          }
                        }else{
                          if($rowjeniskirim["jns_pengiriman"] == "Diantar" || $rowjeniskirim["jns_pengiriman"] == "Sendiri"){
                      ?>
                          <form action="<?php echo $url; ?>" method="post">
                            <input type="hidden" name="menu" value="suratjalan">
                            <input type="hidden" name="suratjalan_tr" value="<?php echo $rowdetailorder["no_transaksi"]; ?>">
                            <button class="btn btn-primary" type="submit">Buat Surat Jalan</button>
                          </form>
                      <?php
                          }elseif($rowjeniskirim["jns_pengiriman"] == ""){
                            echo '<div class="alert alert-info">Menunggu Pembayaran</div>';
                          }
                      
                        }
                      ?>
                    </div>
                  </div>
                </div>
                </div>
              </div>
            </div>
   
 

      </div>
      <!-- /.container-fluid -->

      <!-- Sticky Footer -->
      <footer class="sticky-footer">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright © Your Website 2019</span>
          </div>
        </div>
      </footer>

    </div>
    <!-- /.content-wrapper -->

  </div>
  <!-- /#wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
 

<?php
  // include_once "assets/footer_page.php"; 
  // ob_flush(); 
?>