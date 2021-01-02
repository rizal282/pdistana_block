<?php 
    if(isset($_POST["nominal_gaji"])){
        $id_setting = $_POST["eid_setting"];
        $nama_staff = $_POST["nama_staff"];
        $format_gaji = explode(".", $_POST["nominal_gaji"]);
        $nominal_gaji = implode($format_gaji);

        mysqli_query($koneksi, "update setting_gajistaff set id_kry = '".$nama_staff."', gaji_staff = '".$nominal_gaji."' where id_setting = '".$id_setting."'");

        echo '<div class="alert alert-success">Data Gaji Staff Diperbarui</div>';

        include_once "settings/settings_baru.php";
    }
?>