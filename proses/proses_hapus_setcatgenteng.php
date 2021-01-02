<?php 
    $hapus_setcatgenteng = $_POST["hapus_setcatgenteng"];

    mysqli_query($koneksi, "DELETE FROM setting_catgenteng where id_settingcat = '".$hapus_setcatgenteng."' ");
    
    echo '<div class="alert alert-success">Data Setting Cat Genteng Sudah Dihapus!</div>';
    include_once "settings/data_set_genteng.php";

?>