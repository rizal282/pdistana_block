    <div id="content-wrapper">

      <div class="container-fluid">

        <!-- form order pembeli -->
        <?php 

          // hapus data dari tabel temporary barang yg dibeli
          $getdatatemporder = mysqli_query($koneksi, "select * from temp_order");
          $countdatatemp = mysqli_num_rows($getdatatemporder);

          if($countdatatemp >= 1){
            while($rowdatatemporder = mysqli_fetch_array($getdatatemporder)){
              $getstockterjual = mysqli_query($koneksi, "select * from stock_barang where kode_barang = '".$rowdatatemporder["kode_barang"]."'");
              $rowstockterjual = mysqli_fetch_array($getstockterjual);

              $totalterjual = $rowstockterjual["terjual"] - $rowdatatemporder["jumlah_beli"];
              $totalstockakhir = $rowstockterjual["stock_akhir"] + $rowdatatemporder["jumlah_beli"];

              if($rowstockterjual["terjual"] == $rowdatatemporder["jumlah_beli"]){
                mysqli_query($koneksi, "update stock_barang set terjual = 0, stock_akhir = '".$totalstockakhir."' where kode_barang = '".$rowdatatemporder["kode_barang"]."'");
              }else{
                // update terjual dan stock akhir
                mysqli_query($koneksi, "update stock_barang set terjual = '".$totalterjual."', stock_akhir = '".$totalstockakhir."' where kode_barang = '".$rowdatatemporder["kode_barang"]."'");
              }

              mysqli_query($koneksi, "delete from temp_order where kode_barang = '".$rowdatatemporder["kode_barang"]."'"); 
            }
          }

          $sql_kode_tr = "select id_order from order_pembeli order by id_order desc";
          $aksi = mysqli_query($koneksi, $sql_kode_tr);
          $hitung_tr = mysqli_num_rows($aksi);

          if($hitung_tr == 0){
            $no_tr = "TR-1";
          }else{
            $hasil = mysqli_fetch_array($aksi);
            $no_tr_next = $hasil["id_order"] + 1;
            $no_tr = "TR-".$no_tr_next;
          }

          include_once "form_order_pembeli.php"; 
        ?>

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
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="login.html">Logout</a>
        </div>
      </div>
    </div>
  </div>

