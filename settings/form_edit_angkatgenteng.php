<div class="card">
    <div class="card-header">Edit Angkat Genteng</div>
    <div class="card-body">
        <?php 
            $idangkatgenteng = $_POST["idangkatgenteng"];
            $getcetakgenteng = mysqli_query($koneksi, "select * from setting_angkatgenteng where id_settingangkat = '".$idangkatgenteng."'");
            $rowsetcetakgenteng = mysqli_fetch_array($getcetakgenteng);
        ?>

        <form action="<?php echo $url; ?>" method="post">
            <div class="form-group">
                <label for="">Kode Barang</label>
                <input type="hidden" name="menu" value="proseseditsetangkatgenteng">
                <input type="hidden" name="id_settingangkat" value="<?php echo $rowsetcetakgenteng["id_settingangkat"]; ?>">
                <input type="text" name="ekodebarang" class="form-control" value="<?php echo $rowsetcetakgenteng["kode_barang"]; ?>">
            </div>

            <div class="form-group">
                <label for="">Nama Barang</label>
                <input type="text" name="enamagenteng" class="form-control" value="<?php echo $rowsetcetakgenteng["nama_genteng"]; ?>">
            </div>

            <div class="form-group">
                <label for="">Range</label>
                
                <input type="text" name="erangegenteng" class="form-control" value="<?php echo $rowsetcetakgenteng["range_genteng"]; ?>">
            </div>

            <div class="form-group">
                <label for="">Toleransi</label>
                
                <input type="text" name="etoleransi" class="form-control" value="<?php echo $rowsetcetakgenteng["toleransi"]; ?>">
            </div>

            <div class="form-group">
                <label for="">Gaji</label>
                <input type="text" name="egaji" class="form-control" value="<?php echo $rowsetcetakgenteng["gaji"]; ?>">
            </div>

            <button type="submit" class="btn btn-primary">Edit</button>
        </form>
    </div>
</div>