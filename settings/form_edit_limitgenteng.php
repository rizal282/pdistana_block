<div class="card">
    <div class="card-header">Edit Limit Genteng</div>
    <div class="card-body">
        <?php 
            $idlimitgenteng = $_POST["idlimitgenteng"];
            $getcetakgenteng = mysqli_query($koneksi, "select * from setting_limitstokgenteng where id_limit = '".$idlimitgenteng."'");
            $rowsetcetakgenteng = mysqli_fetch_array($getcetakgenteng);
        ?>

        <form action="<?php echo $url; ?>" method="post">
            <div class="form-group">
                <label for="">Limit</label>
                <input type="hidden" name="menu" value="proseseditlimitgenteng">
                <input type="hidden" name="eid_settingpaving" value="<?php echo $rowsetcetakgenteng["id_limit"]; ?>">
                <input type="text" name="elimit_stock" class="form-control" value="<?php echo $rowsetcetakgenteng["jml_limit"]; ?>">
            </div>

            <button type="submit" class="btn btn-primary">Edit</button>
        </form>
    </div>
</div>