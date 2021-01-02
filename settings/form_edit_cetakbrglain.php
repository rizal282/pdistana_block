<div class="card">
    <div class="card-header">Edit Angkat Genteng</div>
    <div class="card-body">
        <?php 
            $id_settingbrglain = $_POST["id_settingbrglain"];
            $getcetakgenteng = mysqli_query($koneksi, "select * from setting_baranglain where id_settingbrglain = '".$id_settingbrglain."'");
            $rowsetcetakgenteng = mysqli_fetch_array($getcetakgenteng);
        ?>

        <form action="<?php echo $url; ?>" method="post">
            <div class="form-group">
                <label for="">Kode Barang</label>
                <input type="hidden" name="menu" value="proseseditsetbrglain">
                <input type="hidden" name="eid_settingpaving" value="<?php echo $rowsetcetakgenteng["id_settingbrglain"]; ?>">
                <input type="text" name="ekode_barang" class="form-control" value="<?php echo $rowsetcetakgenteng["kode_barang"]; ?>">
            </div>

            <div class="form-group">
                <label for="">Nama Barang</label>
                <input type="text" name="enama_paving" class="form-control" value="<?php echo $rowsetcetakgenteng["nama_brglain"]; ?>">
            </div>

            <div class="form-group">
                <label for="">Limit</label>
                <input type="text" name="elimit_stock" class="form-control" value="<?php echo $rowsetcetakgenteng["limit_stock"]; ?>">
            </div>

            <div class="form-group">
                <label for="">Range</label>
                
                <input type="text" name="erange_paving" class="form-control" value="<?php echo $rowsetcetakgenteng["range_brglain"]; ?>">
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