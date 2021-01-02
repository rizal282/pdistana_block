<div class="card">
  <div class="card-header">
    Data Setting Cetak Genteng
  </div>
  <div class="card-body">
    <table id="cetakgenteng" class="table table-bordered">
      <thead>
        <tr>
          <th>No</th>
          <th>Kode Barang</th>
          <th>Nama Barang</th>
          <th>Range</th>
          <th>Toleransi</th>
          <th>Gaji</th>
          <th>Edit</th>
          <th>Hapus</th>
        </tr>
      </thead>
      <tbody>
        <?php
          $nomor = 1;
          $getdatasetpaving = mysqli_query($koneksi, "select * from setting_cetakgenteng order by nama_genteng asc");
          while ($rowdatasetpaving = mysqli_fetch_array($getdatasetpaving)) {
        ?>

          <tr>
            <td><?php echo $nomor; ?></td>
            <td><?php echo $rowdatasetpaving["kode_barang"]; ?></td>
            <td><?php echo $rowdatasetpaving["nama_genteng"]; ?></td>
            <td><?php echo $rowdatasetpaving["range_genteng"]; ?></td>
            <td><?php echo $rowdatasetpaving["toleransi"]; ?></td>
            <td><?php echo "Rp ".number_format($rowdatasetpaving["gaji"],1,",","."); ?></td>
            <td>
              <form action="<?php echo $url; ?>" method="post">
                <input type="hidden" name="menu" value="editsetcetakgenteng">
                <input type="hidden" name="idcetakgenteng" value="<?php echo $rowdatasetpaving["id_settingcetak"]; ?>">
                <button type="submit" class="btn btn-success">Edit</button>
              </form>
            </td>
            <td>
              <form action="<?php echo $url; ?>" method="post">
                <input type="hidden" name="menu" value="hapussetcetakgenteng">
                <input type="hidden" name="hapus_setcetakgenteng" value="<?php echo $rowdatasetpaving["id_settingcetak"]; ?>">
                <button type="submit" class="btn btn-danger">Hapus</button>
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

<div class="card">
  <div class="card-header">
    Data Setting Cat Genteng
  </div>
  <div class="card-body">
    <table id="catgenteng" class="table table-bordered">
      <thead>
        <tr>
          <th>No</th>
          <th>Kode Barang</th>
          <th>Nama Barang</th>
          <th>Range</th>
          <th>Toleransi</th>
          <th>Gaji</th>
          <th>Edit</th>
          <th>Hapus</th>
        </tr>
      </thead>
      <tbody>
        <?php
          $nomor = 1;
          $getdatasetpaving = mysqli_query($koneksi, "select * from setting_catgenteng order by nama_genteng asc");
          while ($rowdatasetpaving = mysqli_fetch_array($getdatasetpaving)) {
        ?>

          <tr>
            <td><?php echo $nomor; ?></td>
            <td><?php echo $rowdatasetpaving["kode_barang"]; ?></td>
            <td><?php echo $rowdatasetpaving["nama_genteng"]; ?></td>
            <td><?php echo $rowdatasetpaving["range_genteng"]; ?></td>
            <td><?php echo $rowdatasetpaving["toleransi"]; ?></td>
            <td><?php echo "Rp ".number_format($rowdatasetpaving["gaji"],1,",","."); ?></td>
            <td>
              <form action="<?php echo $url; ?>" method="post">
                <input type="hidden" name="menu" value="editsetcatgenteng">
                <input type="hidden" name="idcatgenteng" value="<?php echo $rowdatasetpaving["id_settingcat"]; ?>">
                <button type="submit" class="btn btn-success">Edit</button>
              </form>
            </td>
            <td>
              <form action="<?php echo $url; ?>" method="post">
                <input type="hidden" name="menu" value="hapussetcatgenteng">
                <input type="hidden" name="hapus_setcatgenteng" value="<?php echo $rowdatasetpaving["id_settingcat"]; ?>">
                <button type="submit" class="btn btn-danger">Hapus</button>
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

<div class="card">
  <div class="card-header">
    Data Setting Angkat Genteng
  </div>
  <div class="card-body">
    <table id="angkatgenteng" class="table table-bordered">
      <thead>
        <tr>
          <th>No</th>
          <th>Kode Barang</th>
          <th>Nama Barang</th>
          <th>Range</th>
          <th>Toleransi</th>
          <th>Gaji</th>
          <th>Edit</th>
          <th>Hapus</th>
        </tr>
      </thead>
      <tbody>
        <?php
          $nomor = 1;
          $getdatasetpaving = mysqli_query($koneksi, "select * from setting_angkatgenteng order by nama_genteng asc");
          while ($rowdatasetpaving = mysqli_fetch_array($getdatasetpaving)) {
        ?>

          <tr>
            <td><?php echo $nomor; ?></td>
            <td><?php echo $rowdatasetpaving["kode_barang"]; ?></td>
            <td><?php echo $rowdatasetpaving["nama_genteng"]; ?></td>
            <td><?php echo $rowdatasetpaving["range_genteng"]; ?></td>
            <td><?php echo $rowdatasetpaving["toleransi"]; ?></td>
            <td><?php echo "Rp ".number_format($rowdatasetpaving["gaji"],1,",","."); ?></td>
            <td>
              <form action="<?php echo $url; ?>" method="post">
                <input type="hidden" name="menu" value="editsetangkatgenteng">
                <input type="hidden" name="idangkatgenteng" value="<?php echo $rowdatasetpaving["id_settingangkat"]; ?>">
                <button type="submit" class="btn btn-success">Edit</button>
              </form>
            </td>
            <td>
              <form action="<?php echo $url; ?>" method="post">
                <input type="hidden" name="menu" value="hapussetangkatgenteng">
                <input type="hidden" name="hapus_setangkatgenteng" value="<?php echo $rowdatasetpaving["id_settingangkat"]; ?>">
                <button type="submit" class="btn btn-danger">Hapus</button>
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

<div class="card">
  <div class="card-header">
    Data Limit Stock Genteng
  </div>
  <div class="card-body">
    <table id="limitgenteng" class="table table-bordered">
      <thead>
        <tr>
          <th>No</th>
          <th>Kode Barang</th>
          <th>Nama Barang</th>
          <th>Limit</th>
          <th>Edit</th>
          <th>Hapus</th>
        </tr>
      </thead>
      <tbody>
        <?php
          $nomor = 1;
          $getdatasetpaving = mysqli_query($koneksi, "select * from setting_limitstokgenteng order by nama_genteng asc");
          while ($rowdatasetpaving = mysqli_fetch_array($getdatasetpaving)) {
        ?>

          <tr>
            <td><?php echo $nomor; ?></td>
            <td><?php echo $rowdatasetpaving["kode_barang"]; ?></td>
            <td><?php echo $rowdatasetpaving["nama_genteng"]; ?></td>
            <td><?php echo $rowdatasetpaving["jml_limit"]; ?></td>
            <td>
              <form action="<?php echo $url; ?>" method="post">
                <input type="hidden" name="menu" value="editlimitgenteng">
                <input type="hidden" name="idlimitgenteng" value="<?php echo $rowdatasetpaving["id_limit"]; ?>">
                <button type="submit" class="btn btn-success">Edit</button>
              </form>
            </td>
            <td>
              <form action="<?php echo $url; ?>" method="post">
                <input type="hidden" name="menu" value="hapuslimitgenteng">
                <input type="hidden" name="hapus_limitgenteng" value="<?php echo $rowdatasetpaving["id_limit"]; ?>">
                <button type="submit" class="btn btn-danger">Hapus</button>
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
