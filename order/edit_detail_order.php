<?php
  $id_detail = $_POST["id_detail"];

  $ambildataorderbrg = mysqli_query($koneksi, "select * from detail_order_pembeli where id_detail_order = '".$id_detail."'");
  $roworder = mysqli_fetch_array($ambildataorderbrg);

  include "proses/edit_detail_barang.php";
?>

<h2>Form Edit Barang yang Dibeli</h2>

<form action="" method="post">
  <div class="form-group">
    <label for="">Kode Barang</label>
    <input type="hidden" name="menu" value="proses_edit_brg">
    <input type="hidden" name="edit_id_detail" value="<?php echo $roworder["id_detail_order"] ?>">
    <input type="hidden" name="notr_order" value="<?php echo $roworder["no_transaksi"]; ?>">
    <input class="form-control" type="text" name="edit_kode_brg" class="" id="kode_barang" value="<?php echo $roworder["kode_barang"] ?>" readonly>
  </div>

  <div class="form-group">
    <label for="">Nama Barang</label>
    <input class="form-control" type="text" name="nama_brg" class="" id="nama_brg" value="<?php echo $roworder["nama_barang"] ?>">
  </div>

  <div class="form-group">
    <label for="">Harga Barang/Pcs</label>
    <input autocomplete="off" class="form-control" type="text" name="hrg_brg" class="" id="hrg_brg" value="<?php echo $roworder["hrg_barang"] ?>">
  </div>

  <div class="form-group">
    <label for="">Jumlah Beli</label>
    <input type="hidden" name="jumlah_beli" value="<?php echo $roworder["jumlah_beli"]; ?>">
    <input autocomplete="off" class="form-control" type="text" name="editjumlah_beli" class="" id="jumlah_beli" value="<?php echo $roworder["jumlah_beli"] ?>">
  </div>

  <!-- <div class="form-group">
    <label for="">Total Harga</label>
    <input class="form-control" type="text" name="total_harga" class="" id="total_harga">
  </div> -->

  <div class="form-group">
    <label for="">Sumber Barang</label>
    <!-- <select class="form-control" name="sumber_brg">
      <option>Pilih :</option>
      <option value="Internal">Internal</option>
      <option value="Eksternal">Eksternal</option>
    </select> -->
    <input class="form-control" type="text" name="sumber_brg" class="" id="sumber_brg" value="<?php echo $roworder["sumber_brg"] ?>">
  </div>

  <button type="submit" class="btn btn-primary" name="editbarangbeli">Edit Barang</button> 
</form>