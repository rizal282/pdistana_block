<?php 
  ob_start();
  include_once "koneksi.php"; 
  include_once "assets/header_page.php";

  // mengambil semua order pembeli
  $sqlorderpembeli = "select * from order_pembeli order by id_order desc";
  $aksiorder = mysqli_query($koneksi, $sqlorderpembeli);
  $hitungorderpembeli = mysqli_num_rows($aksiorder); 
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

        <div class="card mb-3">
          <div class="card-header">
            <div class="row">
              <div class="col-lg">
                <i class="fas fa-table"></i>
                Buat Surat Jalan
              </div> 
              <div class="col-lg">
               
              </div>   
            </div>
          </div>
          <div class="card-body">
            <form class="form-horizontal" method="post">
              <div class="form-group">
                <label>No Surat Jalan</label>
                <input class="form-control" type="text" name="no_surat">
              </div>
              <div class="form-group">
                <label>Kepada</label>
                <input class="form-control" type="text" name="kepada">
              </div>
              <div class="form-group">
                <label>Alamat</label>
                <textarea class="form-control" name="alamat"></textarea>
              </div>
              <div class="form-group">
                <label>Wilayah</label>
                <input class="form-control" type="text" name="wilayah">
              </div>
              <div class="form-group">
                <label>Penanggung Jawab</label>
                <input class="form-control" type="text" name="tg_jawab">
              </div>
              <div class="form-group">
                <label>Nama Supir</label>
                <input class="form-control" type="text" name="nama_supir">
              </div>
              <div class="form-group">
                <label>Nama Pembuat Surat Jalan</label>
                <input class="form-control" type="text" name="pembuat_srt">
              </div>
              <div class="form-group">
                <label>No HP</label>
                <input class="form-control" type="text" name="no_hp">
              </div>
              <div class="form-group">
                <label>No Kendaraan</label>
                <input class="form-control" type="text" name="no_kendaraan">
              </div>
              <div class="form-group">
                <label>No Transaksi</label>
                <input class="form-control" type="text" name="no_tr">
              </div>
              <div class="form-group">
                <label>Nominal Uang Jalan</label>
                <input class="form-control" type="text" name="uang_jln">
              </div>

              <button class="btn btn-primary" type="submit" name="buat_surat">Buat Surat</button>
            </form>
          </div>
          <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
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