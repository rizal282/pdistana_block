<!-- Modal -->
  <div id="tambahlagibarangbeli" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <!-- konten modal-->
      <div class="modal-content">
        <!-- heading modal -->
        <div class="modal-header">
          <h4 class="modal-title">Form Order Detail Barang</h4>
        </div>
        <!-- body modal -->
        <div class="modal-body">
          <div class="form-group">
            <!-- <label for="">Kode Barang</label> -->
          </div>

          <div class="form-group">
            <label for="">Nama Barang</label>
            <input type="hidden" id="tambahlagibarang" value="tambahlagibarang">
            <input class="form-control" type="hidden" name="kode_brg" value="" id="kode_brg">
            <!-- <input autocomplete="off" class="form-control" type="text" name="nama_brg" id="nama_brg"> -->
            <select id="nama_brg" class="form-control" name="nama_brg">
              <option>Pilih :</option>
              <?php
                $namabarang = mysqli_query($koneksi, "select * from stock_barang");
                while($rownamabarang = mysqli_fetch_array($namabarang)){
              ?>
                  <option value="<?php echo $rownamabarang["nama_barang"]; ?>"><?php echo $rownamabarang["nama_barang"]; ?></option>
              <?php
                }
              ?>
            </select>
          </div>

          <div class="form-group">
            <label>Jenis Barang</label>
            <select class="form-control" name="jenis_brg" id="jenis_brg">
              <option>Pilih :</option>

              <?php
                $getjenisbarang = mysqli_query($koneksi, "select nama_jenisbarang from jenis_barang order by nama_jenisbarang asc");
                while($rowjenisbarang = mysqli_fetch_array($getjenisbarang)){
              ?>
                  <option value="<?php echo $rowjenisbarang["nama_jenisbarang"]; ?>"><?php echo $rowjenisbarang["nama_jenisbarang"]; ?></option>
              <?php
                }
              ?>
            </select>
          </div>

          <div class="form-group">
                <label for="">Warna Barang</label>
                <input autocomplete="off" id="warna_brg" type="text" name="warnabarang" class="form-control">
          </div>

          <div class="form-group">
            <label for="">Harga Barang/Pcs</label>
            <input autocomplete="off" class="form-control" type="text" name="hrg_brg" id="hrg_brg" onkeyup="format_angka(this)">
          </div>

          <div class="form-group">
            <label for="">Jumlah Beli</label>
            <input type="hidden" name="totalstock" id="totalstock" value="">
            <input autocomplete="off" class="form-control" type="text" name="jumlah_beli" id="jumlah_beli">
          </div>

          <div id="alert_stock" class="form-group">
            
          </div>

          <div class="form-group">
            <label for="">Satuan Barang</label>
            <input autocomplete="off" class="form-control" type="text" name="satuan" id="satuan" value="-">
          </div>

          <div class="form-group">
            <label for="">Sumber Barang</label>
            <select class="form-control"  name="sumber_brg" id="sumber_brg">
              <option value="Internal">Internal</option>
              <option value="Eksternal">Eksternal</option>
            </select>
            <!-- <input class="form-control" type="text" name="sumber_brg" id="sumber_brg" value="Internal"> -->
          </div>

          <button class="btn btn-primary" id="tambahlagi_beli" data-dismiss="modal">Tambahkan</button>
        </div>
        <!-- footer modal -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Selesai Tambah Barang</button>
        </div>
      </div>
    </div>
  </div>