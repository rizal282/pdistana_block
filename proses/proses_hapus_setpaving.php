<?php 
    $hapus_id_settingpaving = $_POST["hapus_id_settingpaving"];

    mysqli_query($koneksi, "delete from setting_cetakpaving where id_settingpaving = '".$hapus_id_settingpaving."' ");
    
    echo '<div class="alert alert-success">Data Setting Paving Sudah Dihapus!</div>';
    include_once "settings/data_set_paving.php";

?>