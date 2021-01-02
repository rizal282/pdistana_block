<?php
  // include_once "proses/hapus_order_temp.php";
?>

<form id="formtambahbarangbeli" method="post" class="form-horizontal" action="<?php echo $url; ?>" target="_Blank">
  <input type="hidden" name="menu" value="prosestambahpembeli">
  <div class="form-group">
    <div class="form-label-group">
       <input class="form-control" type="text" name="no_transaksi" value="<?php echo $no_tr; ?>" id="no_transaksi" readonly>
      <label for="inputEmail">No Transaksi</label>
    </div>
  </div>
  <div class="form-group">
    <div class="form-label-group">
      <input  class="form-control" type="text" name="tgl_beli" id="tgl_beli" required>
      <label for="inputPassword">Tanggal Beli</label>
    </div>
  </div>
  <div class="form-group">
    <div class="form-label-group">
      <input autocomplete="off" class="form-control" type="text" name="pembeli" required>
      <label for="inputPassword">Nama Pembeli</label>
    </div>
  </div>
  <div class="form-group">
    <div class="form-label-group">
      <input autocomplete="off" class="form-control" type="text" name="nohp_pembeli" required>
      <label for="inputPassword">No HP Pembeli</label>
    </div>
  </div>
  <div class="form-group">
    <div class="form-label-group">
      <input autocomplete="off" class="form-control" type="text" name="alamat_pembeli" required>
      <label for="inputPassword">Alamat Pembeli</label>
    </div>
  </div>
  <div class="form-group">
      <label for="inputPassword">Wilayah</label>
      <!--<input class="form-control" type="text" name="wilayah" class="" value="" required>-->
      <select class="form-control" name="wilayah">
        <option>Pilih :</option>
        <?php
          $getwilayah = mysqli_query($koneksi, "select nama_wilayah from wilayah");
          while($rownamawilayah = mysqli_fetch_array($getwilayah)){
        ?>
            <option value="<?php echo $rownamawilayah["nama_wilayah"]; ?>"><?php echo $rownamawilayah["nama_wilayah"]; ?></option>
        <?php
          }
        ?>
      </select>
  </div>
  <div class="form-group">
    <!-- <div class="form-label-group">
      <input class="form-control" type="text" name="pembayaran" class="" value="" required>
      <label for="inputPassword">Pembayaran</label>
    </div> -->
    <label>Pembayaran</label>
    <select id="pembayaran" class="form-control" name="pembayaran">
      <option value="Tunai">Tunai</option>
      <option value="Tempo">Tempo</option>
    </select>
  </div>

  <div id="tgl_tempopembeli" class="form-group">
    <label>Tanggal Tempo</label>
    <input class="form-control" type="text" id="tgl_tempo" name="tgl_tempo">
  </div>

  <div class="form-group">
    <div class="form-label-group">
      <input autocomplete="off" class="form-control" type="text" name="keterangan">
      <label for="inputPassword">Keterangan</label>
    </div>
  </div>
  <a id="tambah_barang" class="btn btn-success btn-block" data-toggle="modal" data-target="#myModal" href="#"><i class="fas fa-plus"></i> Tambah Barang</a>

  <?php include_once "assets/table_data_pembeli.php"; ?>

  <!-- Modal -->
  <div id="myModal" class="modal fade" role="dialog">
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

          <div id="btn_simpan">
            <button class="btn btn-primary" type="submit" id="tambah_beli" data-dismiss="modal">Tambahkan</button>
          </div>
        </div>
        <!-- footer modal -->
        <div class="modal-footer">
          <button id="selesaibeli" type="button" class="btn btn-danger" data-dismiss="modal">Selesai Tambah Barang</button>
        </div>
      </div>
    </div>
  </div>


  <!-- <input type="hidden" name="id_tr_pembeli" value="<?php echo $hasil['no_transaksi']; ?>"> -->

  <button id="simpan_barang" type="submit" name="simpan_pembeli" class="btn btn-success btn-block"><i class="fas fa-save"></i> Simpan</button>
</form>
