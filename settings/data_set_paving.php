<div class="card">
  <div class="card-header">
    Data Setting Paving
  </div>
  <div class="card-body">
    <table id="cetakpaving" class="table table-bordered">
      <thead>
        <tr>
          <th>No</th>
          <th>Kode Barang</th>
          <th>Nama Barang</th>
          <th>Limit Stock</th>
          <th>Qty/Meter</th>
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
          $getdatasetpaving = mysqli_query($koneksi, "select * from setting_cetakpaving order by nama_paving asc");
          while ($rowdatasetpaving = mysqli_fetch_array($getdatasetpaving)) {
        ?>

          <tr>
            <td><?php echo $nomor; ?></td>
            <td><?php echo $rowdatasetpaving["kode_barang"]; ?></td>
            <td><?php echo $rowdatasetpaving["nama_paving"]; ?></td>
            <td><?php echo $rowdatasetpaving["limit_stock"]; ?></td>
            <td><?php echo $rowdatasetpaving["qtymeter"]; ?></td>
            <td><?php echo $rowdatasetpaving["range_paving"]; ?></td>
            <td><?php echo $rowdatasetpaving["toleransi"]; ?></td>
            <td><?php echo "Rp ".number_format($rowdatasetpaving["gaji"],1,",","."); ?></td>
            <td>
              <form action="<?php echo $url; ?>" method="post">
                <input type="hidden" name="menu" value="editsetcetakpaving">
                <input type="hidden" name="editid_settingpaving" value="<?php echo $rowdatasetpaving["id_settingpaving"]; ?>">
                <button type="submit" class="btn btn-success">Edit</button>
              </form>
            </td>
            <td>
              <form action="<?php echo $url; ?>" method="post">
                <input type="hidden" name="menu" value="hapussetpaving">
                <input type="hidden" name="hapus_id_settingpaving" value="<?php echo $rowdatasetpaving["id_settingpaving"]; ?>">
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
