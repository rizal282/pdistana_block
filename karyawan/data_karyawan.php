<div class="card">
	<div class="card-header"><i class="fas fa-fw fa-list"></i> Data Semua Karyawan</div>
	<div class="card-body">
		<?php
			if($_SESSION["id_user"] && $_SESSION["username"] && $_SESSION["password"] && $_SESSION["status_user"] && $_SESSION["status_user"] == "admin"){
		?>
			<div class="row">
		      <div id="aligntambahkary" class="col-lg-12 form-inline">
		        <form action="<?php echo $url; ?>" method="post">
		          <input type="hidden" name="menu" value="tambahkry">
		          <button type="submit" class="btn btn-success"><i class="fas fa-user-plus"></i> Tambah Karyawan</button>
		        </form>
		        <form action="<?php echo $url; ?>" method="post">
		          <input type="hidden" name="menu" value="kasbonkaryawan">
		          <button type="submit" class="btn btn-danger"><i class="fas fa-plus"></i> Kasbon Karyawan</button>
		        </form>
		        <form action="<?php echo $url; ?>" method="post">
		          <input type="hidden" name="menu" value="databayarkasbonkaryawan">
		          <button type="submit" class="btn btn-danger"><i class="fas fa-plus"></i> Data Bayar Kasbon Karyawan</button>
		        </form>
		        <form action="<?php echo $url; ?>" method="post">
		          <input type="hidden" name="menu" value="penggajiankaryawan">
		          <button type="submit" class="btn btn-info"><i class="fas fa-receipt"></i> Penggajian Karyawan</button>
		        </form>
		        <form action="<?php echo $url; ?>" method="post">
		          <input type="hidden" name="menu" value="inputhasilproduksi">
		          <button type="submit" class="btn btn-primary"><i class="fas fa-plus"></i> Stock Harian</button>
		        </form>
		      </div>
		    </div>
		    
		      <div class="row">
		        <div class="col-lg-12">
		          <table class="table table-bordered" width="100%" id="tbl_karyawan" cellspacing="0">
		            <thead>
		              <tr>
		                <th>No</th>
		                <th>Nama</th>
		                <th>Tempat Lahir</th>
		                <th>Tgl Lahir</th>
		                <th>Alamat</th>
		                <th>Group</th>
		                <th>Detail</th>
		                <th>Edit</th>
		                <th>Hapus</th>
		              </tr>
		            </thead>
		            <tbody>
		              <?php
		                $sqlgetkaryawan = "select * from karyawan order by id_kry desc";
		                $aksigetkaryawan = mysqli_query($koneksi, $sqlgetkaryawan);
		                // $hitungkaryawan = mysqli_num_rows($aksigetkaryawan);

		                $nomor = 1;
		                while ($rowkaryawan = mysqli_fetch_assoc($aksigetkaryawan)) {
		              ?>
		                  <tr>
		                    <td><?php echo $nomor; ?></td>
		                    <td><?php echo ucwords($rowkaryawan["nama_kry"]); ?></td>
		                    <td><?php echo $rowkaryawan["tempat_lhr"]; ?></td>
		                    <td><?php echo date("d M Y", strtotime($rowkaryawan["tgl_lhr"])); ?></td>
		                    <td><?php echo $rowkaryawan["alamat_kry"]; ?></td>
		                    <td><?php echo $rowkaryawan["group_kry"]; ?></td>
		                    <td>
		                      
		                        <?php
		                          if($rowkaryawan["group_kry"] == "Supir"){
		                        ?>
		                            <form action="" method="post">
		                              <input type="hidden" name="menu" value="detailkerjasupir">
		                              <input type="hidden" name="id_kry" value="<?php echo $rowkaryawan["id_kry"]; ?>">
		                              <input type="hidden" id="nama_supir" name="nama_supir" value="<?php echo $rowkaryawan["nama_kry"]; ?>">
		                              <button type="submit" class="btn btn-primary"><i class="fas fa-info-circle"></i></button>
		                            </form>
		                        <?php
		                          }elseif($rowkaryawan["group_kry"] == "Produksi"){
		                        ?>
		                            <form action="" method="post">
		                              <input type="hidden" name="menu" value="detailkerjakry">
		                              <input type="hidden" name="id_kry" value="<?php echo $rowkaryawan["id_kry"]; ?>">
		                              <button type="submit" class="btn btn-primary"><i class="fas fa-info-circle"></i></button>
		                            </form>
		                        <?php
		                          }
		                        ?>
		      
		                        
		                    </td>
		                    <td>
		                      <form action="<?php echo $url; ?>" method="post">
		                        <input type="hidden" name="menu" value="editkaryawan">
		                        <input type="hidden" name="id_kry" value="<?php echo $rowkaryawan["id_kry"]; ?>">

		                        <button type="submit" class="btn btn-success"><i class="fas fa-edit"></i></button>
		                      </form>
		                    </td>
		                    <td>
		                      <form action="<?php echo $url; ?>" method="post">
		                        <input type="hidden" name="menu" value="hapuskaryawan">
		                        <input type="hidden" name="id_kry" value="<?php echo $rowkaryawan["id_kry"]; ?>">

		                        <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button>
		                      </form>
		                    </td>
		                  </tr>
		              <?php
		                  $nomor ++;
		                }
		              ?>
		            </tbody>
		          </table>
		        </div>
		      </div>


		<?php
			}elseif($_SESSION["id_user"] && $_SESSION["username"] && $_SESSION["password"] && $_SESSION["status_user"] && $_SESSION["status_user"] == "Staff"){
		?>
				<div class="card">
					<div class="card-header">
						Data Kasbon Karyawan
					</div>
					<div class="card-body">
						<div class="row">
					      <div id="aligntambahkary" class="col-lg-12 form-inline">
					        <form action="<?php echo $url; ?>" method="post">
					          <input type="hidden" name="menu" value="kasbonkaryawan">
					          <button type="submit" class="btn btn-danger"><i class="fas fa-plus"></i> Kasbon Karyawan</button>
					        </form>
							<form action="<?php echo $url; ?>" method="post">
								<input type="hidden" name="menu" value="penggajiankaryawan">
								<button type="submit" class="btn btn-info"><i class="fas fa-receipt"></i> Penggajian Karyawan</button>
							</form>
					        <form action="<?php echo $url; ?>" method="post">
					          <input type="hidden" name="menu" value="inputhasilproduksi">
					          <button type="submit" class="btn btn-primary"><i class="fas fa-plus"></i> Stock Harian</button>
					        </form>
					      </div>
					    </div>
					    
					    <div class="table-responsive">
					      <div class="row">
					        <div class="col-lg-12">
					          <table class="table table-bordered" width="100%" id="tbl_karyawan" cellspacing="0">
					            <thead>
					              <tr>
					                <th>No</th>
					                <th>Nama</th>
					                <th>Tempat Lahir</th>
					                <th>Tgl Lahir</th>
					                <th>Alamat</th>
					                <th>Group</th>
					                <th>No SIM</th>
					                <th>Jenis SIM</th>
					                <th>Masa Berlaku</th>
					                <th>Detail</th>
					              </tr>
					            </thead>
					            <tbody>
					              <?php
					                $sqlgetkaryawan = "select * from karyawan order by id_kry desc";
					                $aksigetkaryawan = mysqli_query($koneksi, $sqlgetkaryawan);
					                // $hitungkaryawan = mysqli_num_rows($aksigetkaryawan);

					                $nomor = 1;
					                while ($rowkaryawan = mysqli_fetch_assoc($aksigetkaryawan)) {
					              ?>
					                  <tr>
					                    <td><?php echo $nomor; ?></td>
					                    <td><?php echo ucwords($rowkaryawan["nama_kry"]); ?></td>
					                    <td><?php echo $rowkaryawan["tempat_lhr"]; ?></td>
					                    <td><?php echo date("d M Y", strtotime($rowkaryawan["tgl_lhr"])); ?></td>
					                    <td><?php echo $rowkaryawan["alamat_kry"]; ?></td>
					                    <td><?php echo $rowkaryawan["group_kry"]; ?></td>
					                    <td>
					                      <?php  
					                        if($rowkaryawan["no_sim"] == ""){
					                          echo "-";
					                        }else{
					                          echo $rowkaryawan["no_sim"];
					                        }
					                      ?>    
					                    </td>
					                    <td>
					                      <?php 
					                        if($rowkaryawan["jenis_sim"] == ""){
					                          echo "-";
					                        }else{
					                          echo $rowkaryawan["jenis_sim"]; 
					                        }
					                      ?>  
					                    </td>
					                    <td>
					                      <?php
					                        if($rowkaryawan["masa_berlaku"] == "1970-01-01" || $rowkaryawan["masa_berlaku"] == "0000-00-00"){
					                          echo "-";
					                        }else{
					                          echo date("d M Y", strtotime($rowkaryawan["masa_berlaku"]));
					                        }
					                      ?>
					                    </td>
					                    <td>
					                      
					                        <?php
					                          if($rowkaryawan["group_kry"] == "Supir"){
					                        ?>
					                            <form action="" method="post">
					                              <input type="hidden" name="menu" value="detailkerjasupir">
					                              <input type="hidden" name="id_kry" value="<?php echo $rowkaryawan["id_kry"]; ?>">
					                              <input type="hidden" id="nama_supir" name="nama_supir" value="<?php echo $rowkaryawan["nama_kry"]; ?>">
					                              <button type="submit" class="btn btn-primary"><i class="fas fa-info-circle"></i></button>
					                            </form>
					                        <?php
					                          }elseif($rowkaryawan["group_kry"] == "Produksi"){
					                        ?>
					                            <form action="" method="post">
					                              <input type="hidden" name="menu" value="detailkerjakry">
					                              <input type="hidden" name="id_kry" value="<?php echo $rowkaryawan["id_kry"]; ?>">
					                              <button type="submit" class="btn btn-primary"><i class="fas fa-info-circle"></i></button>
					                            </form>
					                        <?php
					                          }
					                        ?>
					      
					                        
					                    </td>
					                    
					                  </tr>
					              <?php
					                  $nomor ++;
					                }
					              ?>
					            </tbody>
					          </table>
					</div>
				</div>
		<?php } ?>
	</div>
</div>