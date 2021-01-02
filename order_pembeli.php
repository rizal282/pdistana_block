<?php 
  ob_start();
  include_once "koneksi.php"; 
  include_once "assets/header_page.php";
?>

  

    <?php include_once "assets/sidebar_menu.php"; ?>

    <div id="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">Dashboard</a>
          </li>
          <li class="breadcrumb-item active">Overview</li>
        </ol>

        

        <!-- form order pembeli -->
        <?php 

          $sql_kode_tr = "select no_transaksi from order_pembeli order by id_order desc";
          $aksi = mysqli_query($koneksi, $sql_kode_tr);
          $hitung_tr = mysqli_num_rows($aksi);

          if($hitung_tr == 0){
            $no_tr = "TR-1";
          }else{
            $hasil = mysqli_fetch_array($aksi);
            $pecah_tr = explode("-", $hasil["no_transaksi"]);
            $next_nomor = $pecah_tr[1] + 1;
            $no_tr_next = "TR-".$next_nomor;
            $no_tr = $no_tr_next;
          }

          include_once "assets/form_order_pembeli.php"; 
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

<?php
  include_once "assets/footer_page.php"; 
  ob_flush(); 
?>
 
