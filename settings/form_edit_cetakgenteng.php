<div class="card">
    <div class="card-header">Edit Cetak Genteng</div>
    <div class="card-body">
        <?php 
            $idsetcetakgenteng = $_POST["idcetakgenteng"];
            $getcetakgenteng = mysqli_query($koneksi, "select * from setting_cetakgenteng where id_settingcetak = '".$idsetcetakgenteng."'");
            $rowsetcetakgenteng = mysqli_fetch_array($getcetakgenteng);
        ?>

        <form action="<?php echo $url; ?>" method="post">
            <div class="form-group">
                <label for="">Kode Barang</label>
                <input type="hidden" name="menu" value="proseseditsetcetakgenteng">
                <input type="hidden" name="id_settingcetak" value="<?php echo $rowsetcetakgenteng["id_settingcetak"]; ?>">
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