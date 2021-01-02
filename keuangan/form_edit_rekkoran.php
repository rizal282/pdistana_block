<?php
  if(isset($_POST["idrekkoran"])){
    $idrekkoran = $_POST["idrekkoran"];

    $ambildatarekkoran = mysqli_query($koneksi, "select * from rekening_koran where id_rekeningkoran = '".$idrekkoran."'");
    $rowrekkoran = mysqli_fetch_array($ambildatarekkoran);
  }
?>

<div class="card">
  <div class="card-header">Edit Rekening Koran</div>
  <div class="card-body">   
    <form class="form-horizontal" action="<?php echo $url; ?>" method="post">
      <div class="form-group">
        <label>Tanggal</label>
        <input type="hidden" name="menu" value="proseseditrekkoran">
        <input type="hidden" name="idrekkoran" value="<?php echo $rowrekkoran["id_rekeningkoran"]; ?>">
        <input class="form-control" type="text" name="tanggal" id="tanggalrekkoran" value="<?php echo $rowrekkoran["tanggal"]; ?>">
      </div>
      <div class="form-group">
        <label>Keterangan</label>
        <input class="form-control" type="text" name="keterangan" value="<?php echo $rowrekkoran["keterangan"]; ?>">
      </div>
      <div class="form-group">
        <label>Mutasi</label>
        <input class="form-control" type="hidden" name="mutasiawal" value="<?php echo $rowrekkoran["mutasi"]; ?>">
        <input class="form-control" type="text" name="mutasi" value="<?php echo $rowrekkoran["mutasi"]; ?>">
      </div>
      <div class="form-group">
        <label>Kredit/Debit</label>
        <select class="form-control" name="kreditdebit">
          <option>Pilih :</option>
          <option value="Kredit" <?php if($rowrekkoran["kreditdebit"] == "Kredit"){ echo "selected='selected'"; } ?>>Kredit</option>
          <option value="Debit" <?php if($rowrekkoran["kreditdebit"] == "Debit"){ echo "selected='selected'"; } ?>>Debit</option>
        </select>
        <!-- <input class="form-control" type="text" name="tanggal"> -->
      </div>

      <button id="simpanrekkoran" type="submit" class="btn btn-success"><i class="fas fa-save"></i> Simpan</button>
    </form>
  </div>
</div>