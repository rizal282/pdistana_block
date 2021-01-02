<?php 
    $hapus_setangkatgenteng = $_POST["hapus_setangkatgenteng"];

    mysqli_query($koneksi, "DELETE FROM setting_angkatgenteng where id_settingangkat = '".$hapus_setangkatgenteng."' ");
    
    echo '<div class="alert alert-success">Data Setting Angkat Genteng Sudah Dihapus!</div>';
    include_once "settings/data_set_genteng.php";

?>