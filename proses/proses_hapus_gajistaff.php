<?php
    if(isset($_POST["id_setting"])){
        $id_setting = $_POST["id_setting"];

        mysqli_query($koneksi, "delete from setting_gajistaff where id_setting = '".$id_setting."'");

        echo '<div class="alert alert-success">Data Gaji Staff Dihapus</div>';

        include_once "settings/settings_baru.php";
    }
?>