<?php
    if(isset($_POST["besargaji"])){
        $nama_staff = $_POST["nama_staff"];
        $format_gaji = explode(".", $_POST["besargaji"]);
        $besargaji = implode($format_gaji);

        mysqli_query($koneksi, "insert into setting_gajistaff values('','".$nama_staff."','".$besargaji."')");

        echo '<div class="alert alert-success">Data Gaji Staff Disimpan</div>';

        include_once "settings/settings_baru.php";
    }
?>