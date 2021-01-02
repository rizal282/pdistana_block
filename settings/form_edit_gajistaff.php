<div class="card">
    <div class="card-header">Edit Gaji Staff</div>
    <div class="card-body">
        <?php
            if(isset($_POST["id_setting"])){
                $id_setting = $_POST["id_setting"];

                $getgajistaff = mysqli_query($koneksi, "select * from setting_gajistaff where id_setting = '".$id_setting."'");
                $rowgajistaff = mysqli_fetch_array($getgajistaff);
            }
        ?>

        <form action="<?php echo $url; ?>" method="post">
            <div class="form-group">
                <label for="">Nama Staff</label>
                <input type="hidden" name="menu" value="proseseditgajistaff">
                <input type="hidden" name="eid_setting" value="<?php echo $rowgajistaff["id_setting"]; ?>">
                <select name="nama_staff" id="nama_staff" class="form-control">
                    <option value="">Pilih :</option>
                    <?php 
                        $getnamastaff = mysqli_query($koneksi, "select id_kry, nama_kry from karyawan where group_kry = 'Staff' order by nama_kry asc");
                        while($rownamastaff = mysqli_fetch_array($getnamastaff)){
                    ?>
                            <option value="<?php echo $rownamastaff["id_kry"]; ?>"><?php echo $rownamastaff["nama_kry"]; ?></option>
                    <?php
                        }
                    ?>
                </select>
            </div>

            <div class="form-group">
                <label for="">Nominal Gaji</label>
                <input type="text" name="nominal_gaji" class="form-control" value="<?php echo number_format($rowgajistaff["gaji_staff"],0,",","."); ?>" onkeyup="format_angka(this)">
            </div>

            <button type="submit" class="btn btn-primary">Perbarui</button>
        </form>
    </div>
</div>