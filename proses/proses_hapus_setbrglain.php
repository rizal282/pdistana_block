<?php 
    $hapus_id_settingbrglain = $_POST["hapus_id_settingbrglain"];

    mysqli_query($koneksi, "delete from setting_baranglain where id_settingbrglain = '".$hapus_id_settingbrglain."' ");
    
    echo '<div class="alert alert-success">Data Setting Barang Sudah Dihapus!</div>';
    include_once "settings/data_set_brglain.php";

?>