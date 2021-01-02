<?php
  // ob_start();
  // include_once "koneksi.php";
  // include_once "assets/header_page.php";

  // mengambil semua order pembeli
  $sqlorderpembeli = "select * from order_pembeli order by id_order desc";
  $aksiorder = mysqli_query($koneksi, $sqlorderpembeli);
  $hitungorderpembeli = mysqli_num_rows($aksiorder);
?>

<?php // include_once "assets/sidebar_menu.php"; ?>

    <div id="content-wrapper">

      <div class="container-fluid">

        <div class="card mb-3">
    		  <div class="card-header">
    		    <div class="row">
              <div class="col-lg">
                <i class="fas fa-list"></i>
                Data Order Keseluruhan
              </div>
              <div class="col-lg tombol_order">

                <form method="post" action="<?php echo $url; ?>">
                  <input type="hidden" name="menu" value="tambah_order">
                  <button class="btn btn-primary" type="submit"><i class="fas fa-plus"></i> Tambah Order</button>
                </form>
              </div>
            </div>
          </div>
    		  <div class="card-body">
            <div class="row">
              <div class="col-lg-12">
                <div id="sortingtglpembeli" class="form-inline">
                  <div class="form-group">
                    <input type="text" name="tglawalfilterorder" id="tglawalfilterorder" class="form-control" placeholder="Masukkan Tanggal Awal">
                  </div>
                  <div class="form-group">
                    <input type="text" name="tglakhirfilterorder" id="tglakhirfilterorder" class="form-control" placeholder="Masukkan Tanggal Akhir">
                  </div>
                </div>
              </div>
            </div>

    		    <div class="table-responsive">
    		      <table class="table table-bordered" id="data_order" width="100%" cellspacing="0">
    		        <thead>
    		          <tr>
    		            <th>No</th>
    		            <th>No Transaksi</th>
    		            <th>Tgl Beli</th>
    		            <th>Nama Pembeli</th>
    		            <th>Pembayaran</th>
    		            <th>Keterangan</th>
                    <th>Detail</th>
                    <th>Edit</th>
                    <th>Hapus</th>
    		          </tr>
    		        </thead>
    		        <tbody id="datafilterorder">
    		            <?php
    		            	$no = 1;
    			          	while ($row_order = mysqli_fetch_assoc($aksiorder)) {
    			        ?>
    			        	<tr>
    			        		<td><?php echo $no; ?></td>
    			        		<td><?php echo $row_order["no_transaksi"]; ?></td>
    			        		<td><?php echo date("d M Y", strtotime($row_order["tgl_beli"])); ?></td>
    			        		<td><?php echo $row_order["nama_pembeli"]; ?></td>
    			        		<td><?php echo $row_order["pembayaran"]; ?></td>
    			        		<td><?php echo $row_order["keterangan"]; ?></td>
                      <td>
                        <form method="post" action="<?php echo $url; ?>">
                          <input type="hidden" name="menu" value="detail_order">
                          <input type="hidden" name="id_tr_order" value="<?php echo $row_order["no_transaksi"]; ?>">
                          <button type="submit" class="btn btn-success"><i class="fas fa-info-circle"></i> Detail</button>
                        </form>
                      </td>
                      <td>
                        <form action="<?php echo $url; ?>" method="post">
                          <input type="hidden" name="menu" value="edit_orderpembeli">
                          <input type="hidden" name="id_order" value="<?php echo $row_order["id_order"]; ?>">
                          <button type="submit" class="btn btn-warning"><i class="fas fa-edit"></i></button>
                        </form>
                      </td>
                      <td>
                        <form action="<?php echo $url; ?>" method="post">
                          <input type="hidden" name="menu" value="hapus_orderpembeli">
                          <input type="hidden" name="tr_order" value="<?php echo $row_order["no_transaksi"]; ?>">
                          <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                        </form>
                      </td>
    			        	</tr>
    			        <?php
    			        		$no ++;
    			          	}
    		            ?>
    		        </tbody>
    		      </table>
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
